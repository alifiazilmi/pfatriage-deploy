<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
class Admin extends CI_Controller {

	function __construct()
	{
		 parent::__construct();
         
		 $user 	= $this->session->userdata('bk_id_user');

		// print_r($user);
		 //exit;

		 if (isset($user)) {
		    return true;
		 }else{
			
		 	$this->session->sess_destroy();
		 	redirect('login',TRUE);
		 }
	}

	public function index()
	{
		

		// echo"<pre>";
		// print_r($this->session->all_userdata());
		// echo"</pre>";
		// exit;
		$this->load->view('admin/common/header');
		$this->load->view('admin/administrasi/dashboard');
		$this->load->view('admin/common/footer');
	}

	public function serviceditsti($value='')
	{
				
		 return '';
				
	}

	public function jsonditsti()
	{
				
		echo '';
	}

	public function serviceditditk($nim='')
	{
		// API KE DITDIK
				  echo null;
			
	}

	public function underconstruction()
	{
		echo "underconstruction";
	}

	public function jadwal()
	{
		
		$this->load->model('admin/UsersModel','m_users');
		$data['konselor'] 		= $this->m_users->getallkonselor();
		
		if (isset($_GET['id'])) {
			
			$data['jadwal'] = $this->m_users->getalljadwal($_GET['id']);

		}else{

			$data['jadwal'] = $this->m_users->getalljadwal();
		}

		$this->load->view('admin/common/header');
		$this->load->view('admin/administrasi/jadwal',$data);
		$this->load->view('admin/common/footer');
	}

	public function rekap($value='')
	{	

		$this->load->model('admin/UsersModel','m_users');
		
		if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
			
			$data['rekap'] = $this->m_users->getrekapitulasi($_GET['start_date'],$_GET['end_date']);

			$data['rekap_detail'] = $this->m_users->getlistkonselingdetail($_GET['start_date'],$_GET['end_date']);

			$data['rekap_fakultas'] = $this->m_users->getlistkonselingfakultas($_GET['start_date'],$_GET['end_date']);

			$data['rekap_konselor'] = $this->m_users->getlistkonselingkonselor($_GET['start_date'],$_GET['end_date']);

			$data['masalah'] 	= $this->m_users->getallmasalah();
			

		}else{

			$data['rekap'] = array();
			$data['rekap_detail'] = array();
			$data['rekap_fakultas'] = array();
			$data['rekap_konselor'] = array();
		
		}

		$this->load->view('admin/common/header');
		$this->load->view('admin/administrasi/rekapitulasi',$data);
		$this->load->view('admin/common/footer');
	}

	public function data_konseling()
	{	

		$this->load->model('admin/UsersModel','m_users');
		$data['status_konseling'] = $this->db->get('bk_status_konseling')->result();
		
		if (isset($_GET['start_date']) && isset($_GET['end_date']) && isset($_GET['status'])) {
			
			$data['rekap'] = $this->m_users->getrekapkonseling($_GET['start_date'],$_GET['end_date'],$_GET['status']);

		}else{

			$data['rekap'] = array();
		
		}

		//$this->output->enable_profiler(TRUE); 

		$this->load->view('admin/common/header');
		$this->load->view('admin/administrasi/data_konseling',$data);
		$this->load->view('admin/common/footer');
	}

	function downloadexcel($start_date='',$end_date=''){
		// ob_clean
		$this->load->model('admin/UsersModel','m_users');
		// $this->load->libraries('excel');
		// include APPPATH.'third_party/PHPExcel/Classes/PHPExcel.php';
    
        $objPHPExcel = new Spreadsheet();

        $objPHPExcel->getProperties()->setCreator('Bimbingan Konseling DITMAWA ITB')
                 ->setLastModifiedBy('Bimbingan Konseling DITMAWA ITB')
                 ->setTitle("Data Rekapitulasi")
                 ->setSubject("Konseling")
                 ->setDescription("Laporan Data Konseling")
                 ->setKeywords("Data Konseling");

         $style_col = array(
	      'font' => array('bold' => true), // Set font nya jadi bold
	      'alignment' => array(
	        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
	        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	      ),
	      'borders' => array(
	        'top' => array('style'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN), // Set border top dengan garis tipis
	        'right' => array('style'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN),  // Set border right dengan garis tipis
	        'bottom' => array('style'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN), // Set border bottom dengan garis tipis
	        'left' => array('style'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN) // Set border left dengan garis tipis
	      )
    	);
    
	    $style_row = array(
	      'alignment' => array(
	        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	      ),
	      'borders' => array(
	        'top' => array('style'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN), // Set border top dengan garis tipis
	        'right' => array('style'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN),  // Set border right dengan garis tipis
	        'bottom' => array('style'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN), // Set border bottom dengan garis tipis
	        'left' => array('style'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN) // Set border left dengan garis tipis
	      )
	    );
        
	   	$objPHPExcel->createSheet(0);
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setTitle("Rekapitulasi 1");

        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Rekapitulasi Konselor Berdasarkan Jumlah Konseling dan Jam Penanganan');
        $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'No');
        $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'Fakultas/Sekolah');
        $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'Volume');
        $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'Satuan');

        $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
    	$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
        $objPHPExcel->getActiveSheet()->mergeCells('A1:D1');
        $objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('A2')->applyFromArray($style_col);
	    $objPHPExcel->getActiveSheet()->getStyle('B2')->applyFromArray($style_col);
	    $objPHPExcel->getActiveSheet()->getStyle('C2')->applyFromArray($style_col);
	    $objPHPExcel->getActiveSheet()->getStyle('D2')->applyFromArray($style_col);


        $rowCount = 3;
        $i=1;
        $rekap = $this->m_users->getrekapitulasi($start_date,$end_date);
        foreach ($rekap as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $i);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->gelar_depan.' '.$list->full_name.' '.$list->gelar_belakang);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->jumlah_menangani);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->jumlah_menit_menengani);

            $objPHPExcel->getActiveSheet()->getStyle('A'.$rowCount)->applyFromArray($style_row);
      		$objPHPExcel->getActiveSheet()->getStyle('B'.$rowCount)->applyFromArray($style_row);
      		$objPHPExcel->getActiveSheet()->getStyle('C'.$rowCount)->applyFromArray($style_row);
      		$objPHPExcel->getActiveSheet()->getStyle('D'.$rowCount)->applyFromArray($style_row);
            $rowCount++;
            $i++;
        }

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(3); // Set width kolom A
	    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(50); // Set width kolom B
	    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20); // Set width kolom C
	    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D


	    //2
	    $objPHPExcel->createSheet();
		$objPHPExcel->setActiveSheetIndex(1);
        $objPHPExcel->getActiveSheet()->setTitle("Rekapitulasi 2");
        
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Rekapitulasi Pelayanan Konseling');
        $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'Tanggal');
        $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'Nama');
        $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'NIM');
        $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'Fakultas/Sekolah');
        $objPHPExcel->getActiveSheet()->SetCellValue('E2', 'Jenis Masalah');
        $objPHPExcel->getActiveSheet()->SetCellValue('F2', 'Psikolog');
        $objPHPExcel->getActiveSheet()->SetCellValue('G2', 'Kategori Masalah Dari Psikolog');
        $objPHPExcel->getActiveSheet()->SetCellValue('H2', 'Status (Berat, Ringan, Sedang)');
        $objPHPExcel->getActiveSheet()->SetCellValue('I2', 'Alasan Konsultasi');
        $objPHPExcel->getActiveSheet()->SetCellValue('J2', 'Ringkasan Konsultasi');
        $objPHPExcel->getActiveSheet()->SetCellValue('K2', 'Catatan Konsultasi');

        $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
    	$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
        $objPHPExcel->getActiveSheet()->mergeCells('A1:G1');
        $objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('A2')->applyFromArray($style_col);
	    $objPHPExcel->getActiveSheet()->getStyle('B2')->applyFromArray($style_col);
	    $objPHPExcel->getActiveSheet()->getStyle('C2')->applyFromArray($style_col);
	    $objPHPExcel->getActiveSheet()->getStyle('D2')->applyFromArray($style_col);
	    $objPHPExcel->getActiveSheet()->getStyle('E2')->applyFromArray($style_col);
	    $objPHPExcel->getActiveSheet()->getStyle('F2')->applyFromArray($style_col);
	    $objPHPExcel->getActiveSheet()->getStyle('G2')->applyFromArray($style_col);
	    $objPHPExcel->getActiveSheet()->getStyle('H2')->applyFromArray($style_col);
	    $objPHPExcel->getActiveSheet()->getStyle('I2')->applyFromArray($style_col);
	    $objPHPExcel->getActiveSheet()->getStyle('J2')->applyFromArray($style_col);
	    $objPHPExcel->getActiveSheet()->getStyle('K2')->applyFromArray($style_col);

	    $wizard = new  PhpOffice\PhpSpreadsheet\Helper\Html();
        $rowCount = 3;

        $masalah		= $this->m_users->getallmasalah();
        $rekap_detail 	= $this->m_users->getlistkonselingdetail($start_date,$end_date);

		
        foreach ($rekap_detail as $rekap_detail_list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, tanggal_indo_lengkap($rekap_detail_list->waktu_konseling, TRUE));
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $rekap_detail_list->display_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, ($rekap_detail_list->nim != '' ?$rekap_detail_list->nim :$rekap_detail_list->nim_tpb ));
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $rekap_detail_list->prodi_jenjang.'/'.$rekap_detail_list->nama_prodi.'/'.$rekap_detail_list->nama_fakultas);
			
			$list_masalah = '';
			$arr_masalah = json_decode($rekap_detail_list->id_kategori_masalah);
            foreach ($masalah as $masalah_key){ 
                if (!empty($arr_masalah)){ 
                    if (in_array($masalah_key->id_kategori_masalah, $arr_masalah)){
                    	if ($list_masalah == '') {
                    		$list_masalah = $masalah_key->kategori_masalah;
                    	}else{
                    	 	$list_masalah = $list_masalah.','.$masalah_key->kategori_masalah;
                    	}
                    }                                                               
                } 
            } 

            // $replace = array('[',']','"');
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list_masalah);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $rekap_detail_list->nama_lengkap);
            // $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, str_replace($replace, '', $rekap_detail_list->kategori_kasus).','.$rekap_detail_list->kategori_kasus_lainnya);
			$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $rekap_detail_list->kategori_kasus.','.$rekap_detail_list->kategori_kasus_lainnya);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $rekap_detail_list->level_kasus);
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $wizard->toRichTextObject($rekap_detail_list->alasan_konsultasi));
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $wizard->toRichTextObject($rekap_detail_list->ringkasan_analisa_permasalahan));
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $wizard->toRichTextObject($rekap_detail_list->catatan_observasi));

             if ($rekap_detail_list->level_kasus == 'Berat') {

            	 $objPHPExcel->getActiveSheet()
		        ->getStyle('I'.$rowCount)
		        ->getFill()
		        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
		        ->getStartColor()
		        ->setRGB('FF0000');

		          $objPHPExcel->getActiveSheet()->getStyle('A'.$rowCount) ->getFill()
		        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
		        ->getStartColor()
		        ->setRGB('FF0000');
		      		$objPHPExcel->getActiveSheet()->getStyle('B'.$rowCount) ->getFill()
		        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
		        ->getStartColor()
		        ->setRGB('FF0000');
		      		$objPHPExcel->getActiveSheet()->getStyle('C'.$rowCount) ->getFill()
		        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
		        ->getStartColor()
		        ->setRGB('FF0000');
		      		$objPHPExcel->getActiveSheet()->getStyle('D'.$rowCount) ->getFill()
		        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
		        ->getStartColor()
		        ->setRGB('FF0000');
		      		$objPHPExcel->getActiveSheet()->getStyle('E'.$rowCount) ->getFill()
		        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
		        ->getStartColor()
		        ->setRGB('FF0000');
		      		$objPHPExcel->getActiveSheet()->getStyle('F'.$rowCount) ->getFill()
		        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
		        ->getStartColor()
		        ->setRGB('FF0000');
		      		$objPHPExcel->getActiveSheet()->getStyle('G'.$rowCount) ->getFill()
		        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
		        ->getStartColor()
		        ->setRGB('FF0000');
		          $objPHPExcel->getActiveSheet()->getStyle('H'.$rowCount)->getFill()
				        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
				        ->getStartColor()
				        ->setRGB('FF0000');
		      		$objPHPExcel->getActiveSheet()->getStyle('I'.$rowCount) ->getFill()
		        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
		        ->getStartColor()
		        ->setRGB('FF0000');
		      		$objPHPExcel->getActiveSheet()->getStyle('J'.$rowCount) ->getFill()
		        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
		        ->getStartColor()
		        ->setRGB('FF0000');
		      		$objPHPExcel->getActiveSheet()->getStyle('K'.$rowCount) ->getFill()
		        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
		        ->getStartColor()
		        ->setRGB('FF0000');

            }elseif($rekap_detail_list->level_kasus == 'Sedang'){

            	$objPHPExcel->getActiveSheet()
		        ->getStyle('I'.$rowCount)
		        ->getFill()
		        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
		        ->getStartColor()
		        ->setRGB('FFFF00');

		             $objPHPExcel->getActiveSheet()->getStyle('A'.$rowCount)->getFill()
				        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
				        ->getStartColor()
				        ->setRGB('FFFF00');
		      		$objPHPExcel->getActiveSheet()->getStyle('B'.$rowCount)->getFill()
				        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
				        ->getStartColor()
				        ->setRGB('FFFF00');
		      		$objPHPExcel->getActiveSheet()->getStyle('C'.$rowCount)->getFill()
				        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
				        ->getStartColor()
				        ->setRGB('FFFF00');
		      		$objPHPExcel->getActiveSheet()->getStyle('D'.$rowCount)->getFill()
				        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
				        ->getStartColor()
				        ->setRGB('FFFF00');
		      		$objPHPExcel->getActiveSheet()->getStyle('E'.$rowCount)->getFill()
				        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
				        ->getStartColor()
				        ->setRGB('FFFF00');
		      		$objPHPExcel->getActiveSheet()->getStyle('F'.$rowCount)->getFill()
				        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
				        ->getStartColor()
				        ->setRGB('FFFF00');
		      		$objPHPExcel->getActiveSheet()->getStyle('G'.$rowCount)->getFill()
				        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
				        ->getStartColor()
				        ->setRGB('FFFF00');
				    $objPHPExcel->getActiveSheet()->getStyle('H'.$rowCount)->getFill()
				        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
				        ->getStartColor()
				        ->setRGB('FFFF00');
		      		$objPHPExcel->getActiveSheet()->getStyle('I'.$rowCount)->getFill()
				        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
				        ->getStartColor()
				        ->setRGB('FFFF00');
		      		$objPHPExcel->getActiveSheet()->getStyle('J'.$rowCount)->getFill()
				        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
				        ->getStartColor()
				        ->setRGB('FFFF00');
		      		$objPHPExcel->getActiveSheet()->getStyle('K'.$rowCount)->getFill()
				        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
				        ->getStartColor()
				        ->setRGB('FFFF00');
		      	



            }else{

            	$objPHPExcel->getActiveSheet()
		        ->getStyle('I'.$rowCount)
		        ->getFill()
		        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
		        ->getStartColor()
		        ->setRGB('008000');

		            $objPHPExcel->getActiveSheet()->getStyle('A'.$rowCount)  ->getFill()
		        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
		        ->getStartColor()
		        ->setRGB('008000');
		      		$objPHPExcel->getActiveSheet()->getStyle('B'.$rowCount)  ->getFill()
		        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
		        ->getStartColor()
		        ->setRGB('008000');
		      		$objPHPExcel->getActiveSheet()->getStyle('C'.$rowCount)  ->getFill()
		        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
		        ->getStartColor()
		        ->setRGB('008000');
		      		$objPHPExcel->getActiveSheet()->getStyle('D'.$rowCount)  ->getFill()
		        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
		        ->getStartColor()
		        ->setRGB('008000');
		      		$objPHPExcel->getActiveSheet()->getStyle('E'.$rowCount)  ->getFill()
		        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
		        ->getStartColor()
		        ->setRGB('008000');
		      		$objPHPExcel->getActiveSheet()->getStyle('F'.$rowCount)  ->getFill()
		        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
		        ->getStartColor()
		        ->setRGB('008000');
		      		$objPHPExcel->getActiveSheet()->getStyle('G'.$rowCount)  ->getFill()
		        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
		        ->getStartColor()
		        ->setRGB('008000');
		        	$objPHPExcel->getActiveSheet()->getStyle('H'.$rowCount)  ->getFill()
		        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
		        ->getStartColor()
		        ->setRGB('008000');
		      		$objPHPExcel->getActiveSheet()->getStyle('I'.$rowCount)  ->getFill()
		        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
		        ->getStartColor()
		        ->setRGB('008000');
		      		$objPHPExcel->getActiveSheet()->getStyle('J'.$rowCount)  ->getFill()
		        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
		        ->getStartColor()
		        ->setRGB('008000');
		      		$objPHPExcel->getActiveSheet()->getStyle('K'.$rowCount)  ->getFill()
		        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
		        ->getStartColor()
		        ->setRGB('008000');

            }


        

            $rowCount++;
    
        }

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20); // Set width kolom A
	    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(50); // Set width kolom B
	    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20); // Set width kolom C
	    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
	    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom D
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(50); // Set width kolom D
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25); // Set width kolom D
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(50); // Set width kolom D
		$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(50); // Set width kolom D
		$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(50); // Set width kolom D
		$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(50); // Set width kolom D


		//3

		$objPHPExcel->createSheet();
        $objPHPExcel->setActiveSheetIndex(2);
        $objPHPExcel->getActiveSheet()->setTitle("Rekapitulasi 3");

        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Rekapitulasi Pelayanan Konseling');
        $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'No');
        $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'Fakultas/Sekolah');
        $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'Jumlah Konseling');
        $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'Satuan');

        $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
    	$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
        $objPHPExcel->getActiveSheet()->mergeCells('A1:D1');
        $objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('A2')->applyFromArray($style_col);
	    $objPHPExcel->getActiveSheet()->getStyle('B2')->applyFromArray($style_col);
	    $objPHPExcel->getActiveSheet()->getStyle('C2')->applyFromArray($style_col);
	    $objPHPExcel->getActiveSheet()->getStyle('D2')->applyFromArray($style_col);


        $rowCount = 3;
        $j=1;
        $rekap_fakultas = $this->m_users->getlistkonselingfakultas($start_date,$end_date);
        foreach ($rekap_fakultas as $rekap_fakultas_list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $j);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $rekap_fakultas_list->nama_fakultas);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $rekap_fakultas_list->jumlah);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, 'Pelayanan');

            $objPHPExcel->getActiveSheet()->getStyle('A'.$rowCount)->applyFromArray($style_row);
      		$objPHPExcel->getActiveSheet()->getStyle('B'.$rowCount)->applyFromArray($style_row);
      		$objPHPExcel->getActiveSheet()->getStyle('C'.$rowCount)->applyFromArray($style_row);
      		$objPHPExcel->getActiveSheet()->getStyle('D'.$rowCount)->applyFromArray($style_row);
            $rowCount++;
            $j++;
        }

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(3); // Set width kolom A
	    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(50); // Set width kolom B
	    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20); // Set width kolom C
	    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D


	    //4

		$objPHPExcel->createSheet();
        $objPHPExcel->setActiveSheetIndex(3);
        $objPHPExcel->getActiveSheet()->setTitle("Rekapitulasi 4");
        
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Beban Kerja Psikolog');
        $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'No');
        $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'Nama');
        $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'Rincian Kegiatan');
        $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'Volume');
        $objPHPExcel->getActiveSheet()->SetCellValue('E2', 'Satuan');

        $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
    	$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
        $objPHPExcel->getActiveSheet()->mergeCells('A1:E1');
        $objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('A2')->applyFromArray($style_col);
	    $objPHPExcel->getActiveSheet()->getStyle('B2')->applyFromArray($style_col);
	    $objPHPExcel->getActiveSheet()->getStyle('C2')->applyFromArray($style_col);
	    $objPHPExcel->getActiveSheet()->getStyle('D2')->applyFromArray($style_col);
	    $objPHPExcel->getActiveSheet()->getStyle('E2')->applyFromArray($style_col);

        $rowCount = 3;
        $k=1;
        $rekap_konselor = $this->m_users->getlistkonselingkonselor($start_date,$end_date);
        foreach ($rekap_konselor as $rekap_konselor_list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $k);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $rekap_konselor_list->gelar_depan.' '.$rekap_konselor_list->nama_lengkap.' '.$rekap_konselor_list->gelar_belakang);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, 'Konseling');
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $rekap_konselor_list->jumlah);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, 'Layanan');

            $objPHPExcel->getActiveSheet()->getStyle('A'.$rowCount)->applyFromArray($style_row);
      		$objPHPExcel->getActiveSheet()->getStyle('B'.$rowCount)->applyFromArray($style_row);
      		$objPHPExcel->getActiveSheet()->getStyle('C'.$rowCount)->applyFromArray($style_row);
      		$objPHPExcel->getActiveSheet()->getStyle('D'.$rowCount)->applyFromArray($style_row);
      		$objPHPExcel->getActiveSheet()->getStyle('E'.$rowCount)->applyFromArray($style_row);
            $rowCount++;
            $k++;
        }

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(3); // Set width kolom A
	    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(50); // Set width kolom B
	    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20); // Set width kolom C
	    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
	    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20); // Set width kolom D


        $filename = "Rekapitulasi". date("Y-m-d-H-i-s").".xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');

		$writer = new Xlsx($objPHPExcel);
		$writer->save('php://output');
	}


	function downloadexcelrange(){

		$this->load->model('admin/UsersModel','m_users');
		include APPPATH.'third_party/PHPExcel/Classes/PHPExcel.php';
   
        $data['rekap'] = $this->m_users->getrekapkonseling($_GET['start_date'],$_GET['end_date'],$_GET['status']);

        $this->load->view('admin/administrasi/rekap_download',$data);

	}

	public function feedback($value='')
	{	

		$this->load->model('admin/UsersModel','m_users');
		
			
		$data['feedback'] = $this->m_users->getfeedback();
			


		$this->load->view('admin/common/header');
		$this->load->view('admin/administrasi/feedback',$data);
		$this->load->view('admin/common/footer');
	}

	public function feedbackdetail($value='')
	{	

		$this->load->model('admin/UsersModel','m_users');
			
		$data['feedback_detail'] = $this->m_users->getfeedbackdetail($value);

		$this->load->view('admin/common/header');
		$this->load->view('admin/administrasi/detail_feedback',$data);
		$this->load->view('admin/common/footer');
	}

	public function downloadrekap($start_date='',$end_date='')
	{

		$this->load->model('admin/UsersModel','m_users');

		$data['rekap'] 		= $this->m_users->getrekapitulasi($start_date,$end_date);
		$data['rekap_detail'] = $this->m_users->getlistkonselingdetail($start_date,$end_date);
		$data['rekap_fakultas'] = $this->m_users->getlistkonselingfakultas($start_date,$end_date);
		$data['rekap_konselor'] = $this->m_users->getlistkonselingkonselor($start_date,$end_date);
		$data['masalah'] 	= $this->m_users->getallmasalah();
		$data['start_date'] = format_date_form($start_date);
		$data['end_date']	= format_date_form($end_date);

		$pdf = $this->load->view('admin/administrasi/templaterekapkonseling',$data,TRUE);

		//print_r($pdf);

		$pdfFilePath = "Rekap_".$start_date."-".$end_date.".pdf";

        //load mPDF library
		$mpdf = new \Mpdf\Mpdf();

        // $this->load->library('m_pdf');

        //generate the PDF from the given html
        $mpdf->WriteHTML($pdf);

        //$this->img_dpi = 40;
        //download it.
        $mpdf->Output($pdfFilePath, "D");

	}

	public function pengguna($value='')
	{
		$this->load->model('admin/UsersModel','m_users');
		$data['allusers'] = $this->m_users->getallusers();
		$this->load->view('admin/common/header');
		$this->load->view('admin/administrasi/pengguna',$data);
		$this->load->view('admin/common/footer');
	}



	public function pendaftar($value='')
	{
		
		$this->load->model('admin/UsersModel','m_users');
		$data['allpendaftar'] 		= $this->m_users->getallpendaftaran();
		$data['status']				= 'Terdaftar';
		$this->load->view('admin/common/header',$data);
		$this->load->view('admin/administrasi/pendaftar',$data);
		$this->load->view('admin/common/footer',$data);
	}

	public function terjadwal($value='')
	{
		$this->load->model('admin/UsersModel','m_users');
		$data['allpendaftar'] 		= $this->m_users->getallpendaftaranterjadwal();
		$data['status']				= 'Terjadwal';
		$this->load->view('admin/common/header',$data);
		$this->load->view('admin/administrasi/pendaftar',$data);
		$this->load->view('admin/common/footer',$data);
	}

	public function rujukan($value='')
	{
		
		$this->load->model('admin/UsersModel','m_users');
		$data['allpendaftar'] 		= $this->m_users->getallpendaftaranrujukan();
		$data['status']				= 'Perlu Rujukan';
		$this->load->view('admin/common/header',$data);
		$this->load->view('admin/administrasi/pendaftar',$data);
		$this->load->view('admin/common/footer',$data);
	}

	public function selesai($value='')
	{
		$this->load->model('admin/UsersModel','m_users');
		$data['allpendaftar'] 		= $this->m_users->getallpendaftaranselesai();
		$data['status']				= 'Selesai';
		$this->load->view('admin/common/header',$data);
		$this->load->view('admin/administrasi/pendaftar',$data);
		$this->load->view('admin/common/footer',$data);
	}

	public function editprofil($id='')
	{
		$this->load->model('admin/UsersModel','m_users');
		$data['user'] 			= $this->m_users->getuserbyid($id);
		$data['pendidikan'] 	= $this->m_users->getpendidikanbyiduser($id);
		$data['pengalaman'] 	= $this->m_users->getpengalambyiduser($id);
		$data['spesialis'] 		= $this->m_users->getallspesialiskonselor();
		$this->load->view('admin/common/header');
		$this->load->view('admin/administrasi/profile',$data);
		$this->load->view('admin/common/footer');
	}

	 public function sendEmail($SendTo,$subject,$Content,$cc)
        {
            
            $config = Array(

                    'protocol'      => 'smtp',
                    'smtp_host'     => 'smtp.itb.ac.id',
                    'smtp_port'     => 587,
                    'smtp_user'     => 'informasi@kemahasiswaan.itb.ac.id',
                    'mailtype'      => 'html',
                    'wordwrap'      => TRUE, 
                    'charset'       => 'iso-8859-1',
                    'newline'       => "\r\n",
                    'smtp_timeout'  => '10',
                    'smtp_encypt'   => 'ssl'

            );

                $this->load->library('email', $config);

                $this->email->from('informasi@kemahasiswaan.itb.ac.id', 'DITMAWA ITB');
                $this->email->to($SendTo);
                $list = array($cc,'zulfah@itb.ac.id'); 
                $this->email->cc($list); 

                $this->email->subject($subject);
                $this->email->message($Content);  

                $this->email->send();
		}

	public function konten($id='')
	{
		$this->load->model('admin/UsersModel','m_users');
		$data['telp_darurat'] 	= $this->m_users->getnodarurat();
		$data['wedo'] 			= $this->m_users->getwedo();
		$data['banner'] 		= $this->m_users->getallbanner();
		$data['artikel'] 		= $this->m_users->getartikel();
		$this->load->view('admin/common/header');
		$this->load->view('admin/administrasi/konten',$data);
		$this->load->view('admin/common/footer');
	}

	public function pendaftarmanual()
	{
		$this->load->model('admin/UsersModel','m_users');
		$data['konselor'] 	= $this->m_users->getallkonselor();
		$data['masalah'] 	= $this->m_users->getallmasalah();
		$data['room'] 		= $this->m_users->getroom();
		//$data['six_mhs'] = [];

		 
		$this->load->view('admin/common/header');
		$this->load->view('admin/administrasi/penjadwalan_manual',$data);
		$this->load->view('admin/common/footer');
	}


	public function editpendaftar($id='')
	{
		$this->load->model('admin/UsersModel','m_users');
		$data['pendaftar'] 	= $this->m_users->getpendaftaranbyid($id);
		$data['konselor'] 	= $this->m_users->getallkonselor();
		$data['masalah'] 	= $this->m_users->getallmasalah();
		$data['kuesioner'] 	= $this->m_users->getkuesioner($id);
		$data['room'] 		= $this->m_users->getroom();
		$data['hasil'] 		= $this->m_users->gethasilkonselingbyid($id);
		$data['catatanmedis'] 		= $this->m_users->gethistorymedis($data['pendaftar']->user_id);
		//$data['six_mhs'] = [];

		 if (isset($data['pendaftar']->nim)) {
		 	$var1 = $this->serviceditditk($data['pendaftar']->nim);
		 	//$serv = json_decode($var1);

		 	if (!empty($serv)) {
		 		$data['six_mhs'] = json_decode($var1)[0];
		 	}else{
		 		$data['six_mhs'] = [];
		 	}
		 	
		 
		 }else{
		 	$var2 = $this->serviceditditk($data['pendaftar']->nim_tpb);
		 	//$serv = json_decode($var2);

		 	if (!empty($serv)) {
		 		$data['six_mhs'] = json_decode($var2)[0];
		 	}else{
		 		$data['six_mhs'] = [];
		 	}
		 
		 
		 }

		 if (is_img('https://kemahasiswaan.itb.ac.id/assets/upload/'.(isset($data['pendaftar']->nim)?$data['pendaftar']->nim:$data['pendaftar']->nim_tpb).'/'.$data['pendaftar']->photo)) {
		 	$data['pendaftar']->is_photo = '1';
		 }else{
		 	$data['pendaftar']->is_photo = '0';
		 }
		 
		$this->load->view('admin/common/header');
		$this->load->view('admin/administrasi/penjadwalan',$data);
		$this->load->view('admin/common/footer');
	}

	public function jsonjadwalkonselor()
	{
		$id_user = $_POST['id'];
		$this->load->model('admin/UsersModel','m_users');
		$data = $this->m_users->getalljadwalaktif($id_user);

		echo json_encode($data);
	}

	public function jsonjamkonselor()
	{
		$id_user = $_POST['id'];
		$tanggal = $_POST['tanggal'];
		$this->load->model('admin/UsersModel','m_users');
		$data = $this->m_users->getalljadwalaktif($id_user,$tanggal);

		echo json_encode($data);
	}

	public function jsonuserid()
	{
		$id_user = $_POST['id'];
		$this->load->model('admin/UsersModel','m_users');
		$data = $this->m_users->getuserid($id_user);

		if (isset($data)) {
			echo json_encode($data);
		}else{
			echo '';
		}
		
	}

	public function jsonditdik()
	{
		//API DITDIK
		 echo '';
			
	}




	public function simpanpengguna()
	{
		$data = $this->input->post();
		$data['created_user'] 	= $this->session->userdata('bk_id_user');
		$data['password'] 		= md5($this->input->post('password'));

		$this->load->model('admin/UsersModel','um');

		$submitted = $this->um->saveusers($data);

		if($submitted){
			$this->session->set_flashdata('status','Pengguna Berhasil Disimpan.');
			redirect('admin/pengguna');

		}else{
			$this->session->set_flashdata('warning','Pengguna Gagal Disimpan.');
			redirect('admin/pengguna');

		}


	}

	public function simpanpendaftar()
	{
		$data['user_id'] 				= $this->input->post('userid');
		$data['tanggal_diajukan'] 		= $this->input->post('tanggal');
		$data['tanggal_disetujui'] 		= $this->input->post('tanggal');
		$data['jam_diajukan'] 			= $this->input->post('jam');
		$data['jam_disetujui'] 			= $this->input->post('jam');
		$data['no_hp'] 					= $this->input->post('no_hp');
		$data['email'] 					= $this->input->post('email');
		$data['venue'] 					= $this->input->post('tempat');
		$data['ditangani_oleh']			= $this->input->post('ditangani_oleh');
		$data['id_status_konseling'] 	= 2;
		$data['dijadwalkan_oleh'] 		= $this->session->userdata('bk_id_user');
		$data['media_konsultasi'] 		= $this->input->post('media_konsultasi');
		$nim 							= $this->input->post('nim');
		$nama 							= $this->input->post('nama');

		$this->load->model('konselor/KonselorModel','km');
		$this->load->model('admin/UsersModel','um');

		$is_baru = $this->input->post('is_baru');

		if (isset($_POST['status_konseling'])) {

			if ($_POST['status_konseling'] == 3 || $_POST['status_konseling'] == 4) {

				$data['id_status_konseling'] 		= $_POST['status_konseling'];
				$data['waktu_mulai_konseling'] 		= $_POST['waktu_mulai_konseling'];
				$data['waktu_akhir_konseling'] 		= $_POST['waktu_selesai_konseling'];
				$data['durasi_konseling'] 			= '01:00:00';

			}else{
				$data['id_status_konseling'] 		= $_POST['status_konseling'];
			}
			
		}else{
			$data['id_status_konseling'] 		= 2;
		}

		if ($data['user_id'] == '' && $is_baru == 1) {
			

				$ai3 = $_POST['username'];

				$reg_userdata['username'] 	= $ai3;
				$reg_userdata['group_id'] 	= 2;
				$reg_userdata['email'] 		= $data['email'];

				$this->um->simpan($reg_userdata);

				$id_pendaftar = $this->um->getuseridfirst($ai3)->id;

				$reg_userdata_profil['user_id'] 		= $id_pendaftar;
				$reg_userdata_profil['nim'] 			= $nim;
				$reg_userdata_profil['nim_tpb'] 		= $nim;
				$reg_userdata_profil['id_prodi'] 		= substr($nim,0,3);
				$reg_userdata_profil['display_name'] 	= $nama;

				$this->um->simpan_profil($reg_userdata_profil);

				$data['user_id'] 				= $id_pendaftar;
				
			}
		
		

		$konselor 		= $this->km->user_profile_konselor_byid($data['ditangani_oleh']);
		$nama_konselor 	= $konselor->gelar_depan.' '.$konselor->nama_lengkap.' '.$konselor->gelar_belakang;
		$contentemail['nama_mahasiswa'] 		= $this->input->post('nama');
		$contentemail['tanggal_disetujui'] 		= $this->input->post('tanggal');
		$contentemail['jam_disetujui']			= $this->input->post('jam');
		$contentemail['venue'] 					= $this->input->post('tempat');
		$contentemail['nama_konselor'] 			= $nama_konselor;
		$contentemail['media_konsultasi']		= $this->input->post('media_konsultasi');
		
		if (isset($_POST['status_konseling'])) {
			if ($_POST['status_konseling'] == 2) {

				$SendTo		= $this->input->post('email');
				//$SendTo		= 'zulfah@itb.ac.id';
				$subject	= "Permohonan Konseling Anda Disetujui";
				$Content=$this->load->view('admin/konselor/templateemail',$contentemail,TRUE);

				$this->sendEmail($SendTo,$subject,$Content,$cc="");

			}
		}


		$id_konseling = $this->um->savependaftarnew($data);

		if (isset($_POST['status_konseling'])) {

			if ($_POST['status_konseling'] == 3 || $_POST['status_konseling'] == 4) {

				$hasil['id_konseling'] 				= $id_konseling;
				$hasil['created_by']				= $this->session->userdata('bk_id_user');
				$hasil['resume_konsultasi'] 		= '-';
				$hasil['kesimpulan'] 				= '-';
				$hasil['saran']						= '-';

				$this->um->savehasilkonseling($hasil);

				$history['id_konseling'] 				= $id_konseling;
				$history['created_by']					= $this->session->userdata('bk_id_user');
				$history['status'] 						= $_POST['status_konseling'];
				$history['catatan']						= 'backdate';

				$this->um->savehistokonseling($history);

			}
			
		}


		$submitted = $this->um->bookedjadwal($this->input->post('ditangani_oleh'),$this->input->post('tanggal'),$this->input->post('jam'));

		if($submitted){
			$this->session->set_flashdata('status','Konseling Berhasil Disimpan.');
			redirect('admin/terjadwal');

		}else{
			$this->session->set_flashdata('warning','Konseling Gagal Disimpan.');
			redirect('admin/terjadwal');

		}


	}

	public function simpanjadwal()
	{
		$data = $this->input->post();
		$data['created_by'] 	= $this->session->userdata('bk_id_user');

		$this->load->model('admin/UsersModel','um');

		$submitted = $this->um->savejadwal($data);

		

		if($submitted){

			$this->session->set_flashdata('status','Jadwal Berhasil Disimpan.');
			redirect('admin/jadwal');

		}else{

			$this->session->set_flashdata('warning','Jadwal Gagal Disimpan.');
			redirect('admin/jadwal');

		}


	}

	public function simpanjadwaldurasi()
	{
		$data = array();
		$data['created_by'] 	= $this->session->userdata('bk_id_user');

		$this->load->model('admin/UsersModel','um');

		$first_hour = $_POST['jam_mulai'];

		for ($i=0; $i < $_POST['durasi'] ; $i++) { 
			$timestamp = strtotime($first_hour) + 60*60;
			$time = date('H:i:s', $timestamp);

			$data['id_user'] = $_POST['id_user'];
			$data['tanggal'] = $_POST['tanggal'];
			$data['jam_mulai'] = $first_hour;
			$data['jam_akhir'] = $time;
			$first_hour = $time;
			$submitted = $this->um->savejadwal($data);
			

		}

		if($submitted){

			$this->session->set_flashdata('status','Jadwal Berhasil Disimpan.');
			redirect('admin/jadwal');

		}else{

			$this->session->set_flashdata('warning','Jadwal Gagal Disimpan.');
			redirect('admin/jadwal');

		}


	}

	public function simpanjadwalself()
	{
		$data = $this->input->post();
		$data['created_by'] 	= $this->session->userdata('bk_id_user');
		$data['id_user'] 	= $this->session->userdata('bk_id_user');

		$this->load->model('admin/UsersModel','um');

		$submitted = $this->um->savejadwal($data);

		

		if($submitted){

			$this->session->set_flashdata('status','Jadwal Berhasil Disimpan.');
			redirect('konselor/jadwal');

		}else{

			$this->session->set_flashdata('warning','Jadwal Gagal Disimpan.');
			redirect('konselor/jadwal');

		}


	}

	public function simpanpendidikan()
	{
		$data = $this->input->post();

		$this->load->model('admin/UsersModel','um');

		$submitted = $this->um->savependidikan($data);

		if($submitted){

			$this->session->set_flashdata('status','Pendidikan Berhasil Disimpan.');
			redirect('admin/editprofil/'.$_POST['id_user']);

		}else{
			$this->session->set_flashdata('warning','Pendidikan Gagal Disimpan.');
			redirect('admin/editprofil/'.$_POST['id_user']);

		}


	}

	public function simpanpengalaman()
	{
		$data = $this->input->post();

		$this->load->model('admin/UsersModel','um');

		$submitted = $this->um->savepengalaman($data);

		if($submitted){

			$this->session->set_flashdata('status','Pengalaman Berhasil Disimpan.');
			redirect('admin/editprofil/'.$_POST['id_user']);

		}else{
			$this->session->set_flashdata('warning','Pengalaman Gagal Disimpan.');
			redirect('admin/editprofil/'.$_POST['id_user']);

		}


	}


	

	public function updatepengguna()
	{
		$data 					= $this->input->post();
		$id_user 				= $data['id_user'];
		$data['spesialis'] 		= json_encode($this->input->post('spesialis'));

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// exit;
		
		$config['upload_path']          = './assets/admin/uploads/profile_pic/';
        $config['allowed_types']        = 'jpg|png|jpeg|PNG|PNG|JPEG';

        $this->upload->initialize($config);

		 if ($this->upload->do_upload('foto')) {

		    $files = $this->upload->data();
		                    
		    $foto = $data['id_user'].'_'.date("Ymd")."_foto_profile_".$files['file_name'];
		    rename($config['upload_path'].$files['file_name'], './assets/admin/uploads/profile_pic/'.$foto);
		                	

		    $data['foto']	= $foto;

		}else{
			echo $this->upload->display_errors();
			//exit;
		}

		unset($data['id_user']);
		unset($data['is_ganti_pass']);

		if (isset($_POST['password'])) {
			$data['password'] = md5($data['password']);
		}

		$this->load->model('admin/UsersModel','um');

		$submitted = $this->um->updusers($data,$id_user);

		if($submitted){
			$this->session->set_flashdata('status','Pengguna Berhasil Diperbaharui.');
			redirect('admin/pengguna');

		}else{
			$this->session->set_flashdata('warning','Pengguna Gagal Diperbaharui.');
			redirect('admin/pengguna');

		}
	}

	public function simpanbanner()
	{
		$data 							= $this->input->post();

		$config['upload_path']          = './assets/front/upload/kegiatan/';
        $config['allowed_types']        = 'jpg|png|jpeg|PNG|PNG|JPEG';

        $this->upload->initialize($config);

		 if ($this->upload->do_upload('img')) {

		    $files = $this->upload->data();
		                    
		    $foto = date("Ymd")."_banner_".$files['file_name'];
		    rename($config['upload_path'].$files['file_name'], './assets/front/upload/kegiatan/'.$foto);

		    $data['img']	= $foto;
		    $data['aktif']	= 1;

		}else{
			echo $this->upload->display_errors();
			//exit;
		}

	
		$this->load->model('admin/UsersModel','um');

		$submitted = $this->um->savebanner($data);

		if($submitted){
			$this->session->set_flashdata('status','Berita/Pengumuman Berhasil Ditambahkan.');
			redirect('admin/konten');

		}else{
			$this->session->set_flashdata('warning','Berita/Pengumuman Gagal Ditambahkan.');
			redirect('admin/konten');

		}
	}


	public function updatebanner()
	{
		$data 							= $this->input->post();
		$id_banner 						= $_POST['id_banner'];
		unset($data['id_banner']);

		$config['upload_path']          = './assets/front/upload/kegiatan/';
        $config['allowed_types']        = 'jpg|png|jpeg|PNG|PNG|JPEG';

        $this->upload->initialize($config);

		 if ($this->upload->do_upload('img')) {

		    $files = $this->upload->data();
		                    
		    $foto = date("Ymd")."_banner_".$files['file_name'];
		    rename($config['upload_path'].$files['file_name'], './assets/front/upload/kegiatan/'.$foto);

		    $data['img']	= $foto;
		    

		}else{
			echo $this->upload->display_errors();
			//exit;
		}

	
		$this->load->model('admin/UsersModel','um');

		$submitted = $this->um->updatebanner($data,$id_banner);

		if($submitted){
			$this->session->set_flashdata('status','Berita/Pengumuman Berhasil Diperbaharui.');
			redirect('admin/konten');

		}else{
			$this->session->set_flashdata('warning','Berita/Pengumuman Gagal Diperbaharui.');
			redirect('admin/konten');

		}
	}


	public function simpanartikel()
	{
		$data 							= $this->input->post();

		$config['upload_path']          = './assets/front/images/';
        $config['allowed_types']        = 'jpg|png|jpeg|PNG|PNG|JPEG';

        $this->upload->initialize($config);

		 if ($this->upload->do_upload('background')) {

		    $files = $this->upload->data();
		                    
		    $foto = date("Ymd")."_artikel_".$files['file_name'];
		    rename($config['upload_path'].$files['file_name'], './assets/front/images/'.$foto);

		    $data['background']	= $foto;
		    $data['aktif']	= 1;

		}else{
			echo $this->upload->display_errors();
			exit;
		}

	
		$this->load->model('admin/UsersModel','um');

		$submitted = $this->um->saveartikel($data);

		if($submitted){
			$this->session->set_flashdata('status','Artikel Berhasil Ditambahkan.');
			redirect('admin/konten');

		}else{
			$this->session->set_flashdata('warning','Artikel Gagal Ditambahkan.');
			redirect('admin/konten');

		}
	}

	// public function mkdir()
	// {
		
	// 	mkdir("./assets/admin/uploads/profile_pic", 0775);

	// }

	public function updno()
	{
		$this->load->model('admin/UsersModel','um');
		$noall = array();

		$no1 = array(
						'bk_id_no' 		=> 1,
						'no_darurat'	=> $_POST['val_1'] 
					);

		array_push($noall, $no1);

		$no2 = array(
						'bk_id_no' 		=> 2,
						'no_darurat'	=> $_POST['val_2'] 
					);

		array_push($noall, $no2);

		$no3 = array(
						'bk_id_no' 		=> 3,
						'no_darurat'	=> $_POST['val_3'] 
					);

		array_push($noall, $no3);

		$submitted = $this->um->updno($noall);

		if($submitted){
			$this->session->set_flashdata('status','No Darurat Berhasil Disimpan.');
			redirect('admin/konten/');

		}else{
			$this->session->set_flashdata('warning','No Darurat Gagal Disimpan.');
			redirect('admin/konten/');

		}


	}


	public function updwedo()
	{
		$this->load->model('admin/UsersModel','um');
		
		

		$submitted = $this->um->updwedo($_POST['wedo']);

		if($submitted){
			$this->session->set_flashdata('status','Data Berhasil Disimpan.');
			redirect('admin/konten/');

		}else{
			$this->session->set_flashdata('warning','Data Gagal Disimpan.');
			redirect('admin/konten/');

		}


	}

	public function updsetujui()
	{
		$id_konseling 		= $_POST['id_konseling'];
		$venue 				= $_POST['venue'];
		$media_konsultasi 	= $_POST['media_konsultasi'];
		$tgl 				= $_POST['tanggal'];
		$jam 				= $_POST['jam'];
		$luring_daring 				= $_POST['luring_daring'];

		$upd = array(	'jam_disetujui'	=> $jam,
						'tanggal_disetujui' => $tgl,
						'daring_luring' => $luring_daring, 
						'venue' => $venue, 
					 	'media_konsultasi' => $media_konsultasi,
					 	'id_status_konseling' => 2);
		
		$temp_data=$this->db->query('select * from bk_data_konseling where id_konseling='.$id_konseling.'');
		
		$data_konseling = $temp_data->row();

		$SendTo=$data_konseling->email;
		$subject="Permohonan Konseling Anda Disetujui";
		$Content=$this->load->view('admin/konselor/templateemail',$contentemail,TRUE);
		$this->sendEmail($SendTo,$subject,$Content,$cc="");
		
		$this->load->model('admin/UsersModel','um');

		$submitted = $this->um->updsetujui($id_konseling,$upd);

		if($submitted){
			$this->session->set_flashdata('status','Pengajuan Berhasil Disetujui.');
			redirect('admin/pendaftar/');

		}else{
			$this->session->set_flashdata('warning','Pengajuan Gagal Disetujui.');
			redirect('admin/pendaftar/');

		}


	}

	public function batalkan($id_konseling='',$ditangani_oleh='',$user_id='',$tanggal='',$jam_mulai='')
	{
		$this->load->model('admin/UsersModel','um');
		
		
		$this->um->kosongkanjadwal($ditangani_oleh,$user_id,$tanggal,$jam_mulai);
		
		$submitted = $this->um->batalpengajuankonseling($id_konseling);
	    
		//catat pembatalan
		$field4['tanggal_konseling']=$tanggal;
		$field4['jam_konseling']=$jam_mulai;
		$field4['id_konselor']=$ditangani_oleh;
		$field4['dibatalkan_oleh_admin']=$this->session->userdata('bk_id_user');
		$field4['id_konseling']=$id_konseling;
		$field4['alasan_dibatalkan']=$_POST['alasan_pembatalan'];
		$this->um->simpanData('bk_history_pembatalan',$field4);
		
		

		if($submitted){
			$this->session->set_flashdata('status','Konseling Berhasil Dibatalkan.');
			redirect('admin/terjadwal/');

		}else{
			$this->session->set_flashdata('warning','Konseling Gagal Dibatalkan.');
			redirect('admin/terjadwal/');

		}


	}


	public function updpenjadwalan()
	{
		$this->load->model('admin/UsersModel','um');

		$data = array(
						'ditangani_oleh' 		=> $this->input->post('ditangani_oleh'),
						'tanggal_disetujui' 	=> $this->input->post('tanggal'),
						'jam_disetujui'			=> $this->input->post('jam'),
						'dijadwalkan_oleh'  	=> $this->session->userdata('bk_id_user'),
						'venue'					=> $this->input->post('tempat'),
						'luring_daring'					=> $this->input->post('luring_daring'),
						'id_status_konseling'	=> 2,
						'media_konsultasi'		=> $this->input->post('media_konsultasi')			
					);

		$id_konseling 	= $this->input->post('id_konseling');

		$this->um->bookedjadwal($this->input->post('user_id'),$this->input->post('tanggal'),$this->input->post('jam'));

		$cek 		= $this->um->gethistorybyidkonseling($id_konseling);
		$person 	= $this->um->getemailnonitb($id_konseling);
		$konselor 	= $this->um->getuserbyid($this->input->post('ditangani_oleh'));
		$pasien 	= $this->um->getemailpasienbyid($id_konseling);

	
			$email_six = $this->input->post('email_six');

			$email_non_itb 			= (isset($email_six) ? $email_six:$person->email_non_itb);
			
			$data['display_name'] 	= $person->display_name;
			$data['konselor_name']	= $konselor->nama_lengkap.' '.$konselor->gelar_belakang;
			$data['media_konsultasi'] = $this->input->post('media_konsultasi');
			$SendTo 	= $email_non_itb;
			$subject	= '[BIMBINGAN KONSELING] Pemberitahuan Pengajuan Konseling telah Dijadwalkan.';
			$Content 	= $this->load->view('admin/administrasi/templateemail',$data,TRUE);
			$cc 		= 'zulfah@itb.ac.id';
			$this->sendEmail($SendTo,$subject,$Content,$cc);

			unset($data['display_name']);
			unset($data['konselor_name']);	

		if ($cek == 0) {

			$history = array(
							'id_konseling' 	=> $id_konseling, 
							'created_by'	=> $this->session->userdata('bk_id_user'),
							'status'		=> 2
						);

			$this->um->savehistoryjadwal($history);
			
		}


		$submitted = $this->um->updpenjadwalan($data,$id_konseling);

		if($submitted){
			$this->session->set_flashdata('status','Penjadwalan Berhasil Disimpan.');
			redirect('admin/editpendaftar/'.$id_konseling);

		}else{
			$this->session->set_flashdata('warning','Penjadwalan Gagal Disimpan.');
			redirect('admin/editpendaftar/'.$id_konseling);

		}


	}


	public function hapususer($id_user='')
	{
		$this->load->model('admin/UsersModel','um');

		$submitted = $this->um->deleteusers($id_user);


		if($submitted){
			$this->session->set_flashdata('status','Pengguna Berhasil Dihapus.');
			redirect('admin/pengguna');

		}else{
			$this->session->set_flashdata('warning','Pengguna Gagal Dihapus.');
			redirect('admin/pengguna');

		}
	}

	public function hapusartikel($id_artikel='')
	{
		$this->load->model('admin/UsersModel','um');

		$submitted = $this->um->deleteartikel($id_artikel);


		if($submitted){
			$this->session->set_flashdata('status','Artikel Berhasil Dihapus.');
			redirect('admin/konten');

		}else{
			$this->session->set_flashdata('warning','Artikel Gagal Dihapus.');
			redirect('admin/konten');

		}
	}

	public function hapusbanner($id_banner='')
	{
		$this->load->model('admin/UsersModel','um');

		$item 		= $this->um->getbannerbyid($id_banner);

		if (!is_dir('./assets/front/upload/kegiatan/'.$item->img) && file_exists('./assets/front/upload/kegiatan/'.$item->img)) {
			
			unlink('./assets/front/upload/kegiatan/'.$item->img);

		}

	
		$submitted 	= $this->um->deletebanner($id_banner);


		if($submitted){
			$this->session->set_flashdata('status','Berita/Pengumuman Berhasil Dihapus.');
			redirect('admin/konten');

		}else{
			$this->session->set_flashdata('warning','Berita/Pengumuman Gagal Dihapus.');
			redirect('admin/konten');

		}
	}

	public function hapusjadwal($id='',$id_user='',$tanggal='',$jam='')
	{
		$this->load->model('admin/UsersModel','um');

		$jml_jadwal = $this->um->getjadwalbyid($id_user,$tanggal,$jam);
		
		if ($jml_jadwal > 0) {
			$submitted = 0;
			$pesan = 'Jadwal tidak dapat dihapus, Mohon batalkan seluruh Konseling Pengajuan & Terjadwal terlebih dahulu.';
		}else{
			$submitted = $this->um->deletejadwal($id);
			$pesan = 'Jadwal Gagal Dihapus.';
		}	


		if($submitted){
			$this->session->set_flashdata('status','Jadwal Berhasil Dihapus.');
			redirect('admin/jadwal');

		}else{
			$this->session->set_flashdata('warning',$pesan);
			redirect('admin/jadwal');

		}
	}

	public function kosongkanjadwal($id='')
	{
		$data = array(
	        'is_booked' => 0,
	        'booked_by' => NULL
		);

					 $this->db->where('id_jadwal_piket', $id);
					 $this->db->update('bk_jadwal_piket', $data);
		$submitted = $this->db->affected_rows();	
		
		if($submitted){
			$this->session->set_flashdata('status','Jadwal Berhasil Dikosongkan.');
			redirect('admin/jadwal');

		}else{
			$this->session->set_flashdata('warning','Jadwal Gagal Dikosongkan');
			redirect('admin/jadwal');

		}
	}


	public function hapuspendidikan($id_pendidikan='',$id_user='')
	{
		$this->load->model('admin/UsersModel','um');

		$submitted = $this->um->deletependidikan($id_pendidikan);


		if($submitted){
			$this->session->set_flashdata('status','Pendidikan Berhasil Dihapus.');
			redirect('admin/editprofil/'.$id_user);

		}else{
			$this->session->set_flashdata('warning','Pendidikan Gagal Dihapus.');
			redirect('admin/editprofil/'.$id_user);

		}
	}

	public function hapuspengalaman($id_pengalaman='',$id_user='')
	{
		$this->load->model('admin/UsersModel','um');

		$submitted = $this->um->deletepengalaman($id_pengalaman);


		if($submitted){
			$this->session->set_flashdata('status','Pengalaman Berhasil Dihapus.');
			redirect('admin/editprofil/'.$id_user);

		}else{
			$this->session->set_flashdata('warning','Pengalaman Gagal Dihapus.');
			redirect('admin/editprofil/'.$id_user);

		}
	}

		private function getIpkMhs($nim)
	{
    	
                  echo "Data mahasiswa Tidak Ditemukan";
     
	}

	public function getIpMhs($nim)
	{
    	
        echo "Data mahasiswa Tidak Ditemukan";
          
	}

	public function editkonten($id_banner='')
	{
		$this->load->model('admin/UsersModel','um');
		$data['konten'] = $this->um->getbannerbyid($id_banner);

		$this->load->view('admin/common/header',$data);
		$this->load->view('admin/administrasi/edit_konten',$data);
		$this->load->view('admin/common/footer',$data);

		
	}

}
