<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan_admin extends CI_Controller 
{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('M_form_pengaduan');
            if (!$this->session->userdata('bk_id_user'))
            {
                redirect('admin/login',TRUE);
            }
        }


        // Modul ADMIN

        //daftar mahasiswa bermasalah
        public function daftar_mhs_bermasalah(){
            $data['daftar_mhs_blmdisetujui']=$this->M_form_pengaduan->daftar_mhs_bermasalah_blm_disetujui();
            $data['daftar_mhs_diproses']=$this->M_form_pengaduan->daftar_mhs_bermasalah_proses();
            $data['daftar_mhs_approve']=$this->M_form_pengaduan->daftar_mhs_bermasalah_approve();
            $data['daftar_mhs_ditolak']=$this->M_form_pengaduan->daftar_mhs_bermasalah_tolak();
            // echo"<pre>";
            // print_r($data);
            // echo"</pre>";
            // exit;
            $this->load->view('admin/common/header');
		    $this->load->view('admin/administrasi/daftar_mhs_bermasalah',$data);
		    $this->load->view('admin/common/footer');
        }

        //tolak mhs bermasalah
        public function tolak_mhs_bermasalah($id_bk_form_pengaduan_mhs_bermasalah){
            //get detail pengaduan
            $detail_pengaduan=$this->db->query('select * from bk_form_pengaduan_mhs_bermasalah where id_bk_form_pengaduan_mhs_bermasalah="'.$id_bk_form_pengaduan_mhs_bermasalah.'"')->result();
            // echo"<pre>";
            // print_r($_POST['alasan_ditolak']);
            // echo"</pre>";
            // exit;
            //send email
            $contentemail['created_by_nama'] 		= $detail_pengaduan[0]->created_by_nama;
            $contentemail['nama_mahasiswa'] 		= $detail_pengaduan[0]->nama;
            $contentemail['nim']			        = $detail_pengaduan[0]->nim;
            $contentemail['jenjang'] 				= $detail_pengaduan[0]->jenjang;
            $contentemail['fakultas'] 			    = $detail_pengaduan[0]->fakultas;
            $contentemail['prodi']		            = $detail_pengaduan[0]->prodi;
            $contentemail['alasan_ditolak']		    = $_POST['alasan_ditolak'];
            $SendTo		= $detail_pengaduan[0]->created_by_email;
            $subject	= "Pengaduan Anda Ditolak";
            $Content=$this->load->view('admin/administrasi/templateemailbyform',$contentemail,TRUE);
            $this->sendEmail($SendTo,$subject,$Content,$cc="");

            //update field
            $field['status']=2;
            $field['alasan_ditolak']=$_POST['alasan_ditolak'];
            $retval=$this->M_form_pengaduan->update($id_bk_form_pengaduan_mhs_bermasalah,'id_bk_form_pengaduan_mhs_bermasalah',$field,'bk_form_pengaduan_mhs_bermasalah');

            if($retval){

                $this->session->set_flashdata('status','Pengaduan Berhasil Ditolak.');
                redirect('Pengaduan_admin/daftar_mhs_bermasalah');
    
            }else{
    
                $this->session->set_flashdata('warning','Pengaduan Gagal Ditolak.');
                redirect('Pengaduan_admin/daftar_mhs_bermasalah');
    
            }

        }

         //Adukan Ke Dosen Wali
         public function adukan_ke_dosenwali($id_bk_form_pengaduan_mhs_bermasalah){
            //get detail pengaduan
            $detail_pengaduan=$this->db->query('select * from bk_form_pengaduan_mhs_bermasalah where id_bk_form_pengaduan_mhs_bermasalah="'.$id_bk_form_pengaduan_mhs_bermasalah.'"')->result();
            
            //call service
            $data_dosen_wali=$this->service_dirdik($detail_pengaduan[0]->nim);
            
            //send email
            $contentemail['nama_dosen_wali'] 		= $data_dosen_wali[0]->nama_wali;
            $contentemail['nama_mahasiswa'] 		= $detail_pengaduan[0]->nama;
            $contentemail['nim']			        = $detail_pengaduan[0]->nim;
            $contentemail['jenjang'] 				= $detail_pengaduan[0]->jenjang;
            $contentemail['fakultas'] 			    = $detail_pengaduan[0]->fakultas;
            $contentemail['prodi']		            = $detail_pengaduan[0]->prodi;
            $contentemail['keterangan_masalah']		    = $detail_pengaduan[0]->keterangan_masalah;
            $contentemail['isi_pesan']		    = $_POST['isi_pesan'];
            $SendTo		= "bobynlp@gmail.com";
            $subject	= "Mahasiswa Anda Membutuhkan Konseling";
            $Content=$this->load->view('admin/administrasi/templateemailbyform_aduankedosenwali',$contentemail,TRUE);
            // echo"<pre>";
            // print_r($Content);
            // echo"</pre>";
            // exit;
            $this->sendEmail($SendTo,$subject,$Content,$cc="");

            //update field
            $field['status']=3;
            $field['isi_pesan_ke_dosenwali']=$_POST['isi_pesan'];
            $retval=$this->M_form_pengaduan->update($id_bk_form_pengaduan_mhs_bermasalah,'id_bk_form_pengaduan_mhs_bermasalah',$field,'bk_form_pengaduan_mhs_bermasalah');

            if($retval){

                $this->session->set_flashdata('status','Pesan Ke Dosen Wali Berhasil Dikirim.');
                redirect('Pengaduan_admin/daftar_mhs_bermasalah');
    
            }else{
    
                $this->session->set_flashdata('warning','Pesan Ke Dosen Wali Gagal Dikirim.');
                redirect('Pengaduan_admin/daftar_mhs_bermasalah');
    
            }

        }

            public function pendaftarmanualform($nim,$id_bk_form_pengaduan_mhs_bermasalah)
        {
            $this->load->model('admin/UsersModel','m_users');
            $data['konselor'] 	= $this->m_users->getallkonselor();
            $data['masalah'] 	= $this->m_users->getallmasalah();
            $data['room'] 		= $this->m_users->getroom();
            $data['nim'] = $nim;
            $data['id_bk_form_pengaduan_mhs_bermasalah']=$id_bk_form_pengaduan_mhs_bermasalah;
            //$data['six_mhs'] = [];

            
            $this->load->view('admin/common/header');
            $this->load->view('admin/administrasi/penjadwal_manual_form',$data);
            $this->load->view('admin/common/footer_pengaduan_form');
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
		
		// $SendTo		= $this->input->post('email');
		$SendTo		= 'zulfah@itb.ac.id';
		$subject	= "Permohonan Konseling Anda Disetujui";
		$Content=$this->load->view('admin/konselor/templateemail',$contentemail,TRUE);

		$this->sendEmail($SendTo,$subject,$Content,$cc="");


		$submitted = $this->um->savependaftar($data);
		$this->um->bookedjadwal($this->input->post('ditangani_oleh'),$this->input->post('tanggal'),$this->input->post('jam'));

        //update table bk_form_pengaduan_mhs_bermasalah status menjadi 1
        $status['status']=1;
        $this->M_form_pengaduan->update($_POST['id_bk_form_pengaduan_mhs_bermasalah'],'id_bk_form_pengaduan_mhs_bermasalah',$status,'bk_form_pengaduan_mhs_bermasalah');


		if($submitted){
			$this->session->set_flashdata('status','Konseling Berhasil Disimpan.');
			redirect('Pengaduan_admin/daftar_mhs_bermasalah');

		}else{
			$this->session->set_flashdata('warning','Konseling Gagal Disimpan.');
			redirect('Pengaduan_admin/daftar_mhs_bermasalah');

		}


	}

         //daftar feedback institusi BK
         public function daftar_feedback(){
            $data['daftar_feedback_institusi']=$this->M_form_pengaduan->daftar_feedback_institusi();
            $this->load->view('admin/common/header');
		    $this->load->view('admin/administrasi/daftar_feedback_institusi',$data);
		    $this->load->view('admin/common/footer');
        }

         //ambil data mahasiswa dari service dirdik
         public function service_dirdik($nim){
                        
            $res = null;
            return $res;
    
        }


    //service get data mahasiswa
    public function get_data_mahasiswa(){
        $nim=$this->input->post('nim');

        //get service from dirdik
        $data_dirdik=$this->service_dirdik($nim);
        
        //get detail prodi fakultas
        $id_prodi=substr($nim,0,3);
        $data_prodi_fakultas= $this->db->query('select a.nama_prodi,a.prodi_jenjang,b.nama_fakultas from prodi a join fakultas b on a.kode_fakultas=b.kode_fakultas where a.id_prodi="'.$id_prodi.'" ')->row();
        // echo"<pre>";
        // print_r($data_prodi_fakultas);
        // echo"</pre>";
        // exit;
        
        if (!empty($data_dirdik)) {
                     $a=[];
                     $b=array('nama'=>$data_dirdik[0]->nama_lengkap,'no_hp'=>$data_dirdik[0]->no_hp,'email'=>$data_dirdik[0]->email,'fakultas'=>$data_prodi_fakultas->nama_fakultas,'prodi'=>$data_prodi_fakultas->nama_prodi,'jenjang'=>$data_prodi_fakultas->prodi_jenjang);array_push($a,$b);
                     echo json_encode($a);
        
        } else {
            $warning=json_encode(array("notfound"=>''));
            echo json_encode($warning);
        }
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

	
}





