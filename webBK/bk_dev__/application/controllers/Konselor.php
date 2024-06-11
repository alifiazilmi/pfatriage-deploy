<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konselor extends CI_Controller {

	 function __construct()
	{
		parent::__construct();
		$this->load->model('konselor/KonselorModel');
		$this->load->model('admin/UsersModel','m_users');
		if (!$this->session->userdata('bk_is_login'))
        {
            redirect('admin/login');
        }
	}

	public function index()
	{
		$this->load->view('admin/common/header');
		$this->load->view('admin/konselor/dashboard');
		$this->load->view('admin/common/footer');
	}

	public function jadwal()
	{
		$data['jadwal_piket']=$this->KonselorModel->get_jadwal_piket();

		$this->load->view('admin/common/header');
		$this->load->view('admin/konselor/jadwal',$data);
		$this->load->view('admin/common/footer');
	}

	public function profile($value='')
	{
		$data['user_profile_konselor']=$this->KonselorModel->user_profile_konselor();
		$data['jadwal_piket']=$this->KonselorModel->get_jadwal_piket();
		$data['total_durasi_konseling']=$this->KonselorModel->total_durasi_konseling();
   
		$temp2=$this->KonselorModel->get_jadwal_piket();
		$data['jml_jadwal_piket']=count($temp2);

		$temp=$this->KonselorModel->get_data_sdh_konseling();
		$data['jml_sdh_konseling']=count($temp);
		
		$this->load->view('admin/common/header');
		$this->load->view('admin/konselor/profile',$data);
		$this->load->view('admin/common/footer');
	}

	public function konseling()
	{
		
		$data['pengajuan_konseling']=$this->KonselorModel->get_jadwal_pengajuan_konseling();
		$data['sdh_konseling']=$this->KonselorModel->get_data_sdh_konseling();
		// echo"<pre>";
		// print_r($data);
		// echo"</pre>";
		// exit;
		$this->load->view('admin/common/header');
		$this->load->view('admin/konselor/konseling',$data);
		$this->load->view('admin/common/footer');
	}

	public function permohonan_konseling()
	{
		// echo"<pre>";
		// print_r($this->session->all_userdata());
		// echo"</pre>";
		// exit;
		$data['permohonan_konseling']=$this->KonselorModel->get_jadwal_permohonan_konseling();

		$this->load->view('admin/common/header');
		$this->load->view('admin/konselor/permohonan_konseling',$data);
		$this->load->view('admin/common/footer');
	}

	public function detail_akan_konsul($id_konseling)
	{
		//get user id
		$temp=$this->db->query('select user_id from bk_data_konseling where id_konseling='.$id_konseling.'');
		$user_id=$temp->row()->user_id;

		$data['hasil_screening']=$this->KonselorModel->hasil_screening($id_konseling);
		$data['riwayat_konseling']=$this->KonselorModel->riwayat_konseling_by_userid($user_id);
		$data['default_profiles']=$this->KonselorModel->default_profiles($user_id);
		$data['data_konseling']=$this->KonselorModel->data_konseling_by_idkonseling($id_konseling);
		$id_saya=$data['data_konseling']->ditangani_oleh;
		$data['list_konselor']=$this->KonselorModel->list_konselor($id_saya);
		
		//oleh json id_kategori_masalah
		if(!empty($data['data_konseling']->id_kategori_masalah)){
			$temp_kategori_masalah=json_decode($data['data_konseling']->id_kategori_masalah);
			$id_kategori_masalah=implode(",",$temp_kategori_masalah);
			$data['kategori_masalah']=$this->KonselorModel->get_kategori_masalah_detail($id_kategori_masalah);
		}
			
		
		$data['room'] 		= $this->m_users->getroom();
		// echo"<pre>";
		// print_r($default_profiles);
		// echo"</pre>";
		// exit;



		//$this->load->view('admin/konselor/footer_header/header_konselor');
		$this->load->view('admin/common/header');
		$this->load->view('admin/konselor/konseling_detail',$data);
		$this->load->view('admin/konselor/footer_header/footer_konselor',$data);

		//$this->output->enable_profiler(TRUE);
	}

	public function detail_sdh_konsul($id_konseling)
	{
		//get user id
		$temp=$this->db->query('select user_id from bk_data_konseling where id_konseling='.$id_konseling.'');
		$user_id=$temp->row()->user_id;

		$data['hasil_screening']=$this->KonselorModel->hasil_screening($id_konseling);
		$data['riwayat_konseling']=$this->KonselorModel->riwayat_konseling_by_userid($user_id);
		$data['default_profiles']=$this->KonselorModel->default_profiles($user_id);
		$data['data_konseling']=$this->KonselorModel->data_konseling_by_idkonseling($id_konseling);
		$data['hasil_konseling']=$this->KonselorModel->hasil_konseling($id_konseling);

		//oleh json id_kategori_masalah
		if(!empty($data['data_konseling']->id_kategori_masalah)){
			$temp_kategori_masalah=json_decode($data['data_konseling']->id_kategori_masalah);
			$id_kategori_masalah=implode(",",$temp_kategori_masalah);
			$data['kategori_masalah']=$this->KonselorModel->get_kategori_masalah_detail($id_kategori_masalah);
		}
			
		
		$data['room'] 		= $this->m_users->getroom();
		// echo"<pre>";
		// print_r($data);
		// echo"</pre>";
		// exit

		$this->load->view('admin/common/header');
		$this->load->view('admin/konselor/konseling_detail_sdh_konsul',$data);
		//$this->load->view('admin/common/footer');
		$this->load->view('admin/konselor/footer_header/footer_konselor',$data);
	}

	public function mulai_konseling($id_konseling){
		$field['waktu_mulai_konseling']=date("Y-m-d H:i:s"); 
		$retval=$this->KonselorModel->update($id_konseling,'id_konseling',$field,'bk_data_konseling');

		// if($retval>0){
		// 	$this->session->set_flashdata('status_berhasil','Konseling Dimulai !');
		// 	redirect(base_url().'Konselor/detail_akan_konsul/'.$id_konseling);
		// } else {
		// 	$this->session->set_flashdata('status_gagal','Konseling Gagagl Dimulai !');
		// 	redirect(base_url().'Konselor/detail_akan_konsul/'.$id_konseling);
		// }
	}

	public function stop_konseling($id_konseling){
		//get waktu awal konseling
		$temp=$this->db->query('select waktu_mulai_konseling from bk_data_konseling where id_konseling='.$id_konseling.'');
		$temp_awal=$temp->row()->waktu_mulai_konseling;
		$temp_akhir=date("Y-m-d H:i:s"); 
		$awal=strtotime(''.$temp_awal.'');
		$akhir=strtotime(''.$temp_akhir.'');

		$diff  = $akhir - $awal;
        $jam   = floor($diff / (60 * 60));
        $temp_menit = $diff - $jam * (60 * 60);
		
		$field['waktu_akhir_konseling']=date("Y-m-d H:i:s"); 
		$field['durasi_konseling']=''.$jam.':'.floor($temp_menit/60).':00';
		
		$retval=$this->KonselorModel->update($id_konseling,'id_konseling',$field,'bk_data_konseling');

		if($retval>0){
			$this->session->set_flashdata('status_berhasil','Data Berhasil Disimpan !');
			redirect(base_url().'Konselor/detail_akan_konsul/'.$id_konseling);
		} else {
			$this->session->set_flashdata('status_gagal','Data Gagal Disimpan !');
			redirect(base_url().'Konselor/detail_akan_konsul/'.$id_konseling);
		}
	}

	public function proc_konsultasi(){
		//cek apakah sudah melakukan konsultasi
		//$temp=$this->KonselorModel->data_konseling_by_idkonseling($_POST['id_konseling']);
		//$is_konsultasi=$temp->durasi_konseling;
		
		//if($is_konsultasi!=""){
				//get data_konseling by id konseling
				$data_konseling=$this->KonselorModel->data_konseling_by_idkonseling($_POST['id_konseling']);
				$user_id_mhs=$data_konseling->user_id;
				if(!empty($data_konseling->id_kategori_masalah)){
					$id_kategori_masalah=$data_konseling->id_kategori_masalah;
				}

				//isi table bk_hasil_konseling
				$field['id_konseling']=$_POST['id_konseling'];
				$field['created_by']=$this->session->userdata('bk_id_user');
				$field['resume_konsultasi']=$_POST['resume_konsultasi'];
				$field['saran']=$_POST['saran'];
				$field['kesimpulan']=$_POST['kesimpulan'];
				$field['catatan_dosen_wali']=$_POST['catatan_dosen_wali'];
				$field['catatan_orang_tua']=$_POST['catatan_orang_tua'];
				$field['alasan_konsultasi']=$_POST['alasan_konsultasi'];
				$field['ringkasan_analisa_permasalahan']=$_POST['ringkasan_analisa_permasalahan'];
				$field['tindakan_kuratif']=$_POST['tindakan_kuratif'];
				$field['rekomendasi']=$_POST['rekomendasi'];
				$field['catatan_observasi']=$_POST['catatan_observasi'];
				$field['is_lengkap']=$_POST['is_lengkap'];
				$field['level_kasus']=$_POST['level_kasus'];
				if(!empty($_POST['kategori_kasus'])){
					$field['kategori_kasus']=json_encode($_POST['kategori_kasus']);
				}
				if(!empty($_POST['kategori_kasus_lainnya'])){
					$field['kategori_kasus_lainnya']=$_POST['kategori_kasus_lainnya'];
				}
				$retval=$this->KonselorModel->simpanData('bk_hasil_konseling',$field);

				//update status di table bk_data_konseling menjadi selesai & upload gambar foto konseling && upload lampiran konseling
				// if(empty($_POST['tanggal_konsul_lanjutan'])){
				// 	$field3['id_status_konseling']=3;
				// } else {
				// 	$field3['id_status_konseling']=5;
				// }
				
				//Timer STOP Konsultasi
                $temp=$this->db->query('select waktu_mulai_konseling from bk_data_konseling where id_konseling='.$_POST['id_konseling'].'');
				$temp_awal=$temp->row()->waktu_mulai_konseling;
				$temp_akhir=date("Y-m-d H:i:s"); 
				$awal=strtotime(''.$temp_awal.'');
				$akhir=strtotime(''.$temp_akhir.'');

				$diff  = $akhir - $awal;
				$jam   = floor($diff / (60 * 60));
				$temp_menit = $diff - $jam * (60 * 60);
				
				$field3['waktu_akhir_konseling']=date("Y-m-d H:i:s"); 
				$field3['durasi_konseling']=''.$jam.':'.floor($temp_menit/60).':00';

				if($_POST['kesimpulan']=="Selesai"){
					$field3['id_status_konseling']=3;
				} else if($_POST['kesimpulan']=="Perlu Rujukan"){
					$field3['id_status_konseling']=4;
				} else if($_POST['kesimpulan']=="Jadwalkan Konseling Lanjutan"){
					$field3['id_status_konseling']=5;
				}

				if(!empty($_FILES['foto_konseling']['name'])){
					if (!is_dir('assets/foto_konseling'))
					{
						mkdir('./assets/foto_konseling');
					}	
					$config['upload_path'] = './assets/foto_konseling';
					$config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG';
					$config['max_size'] = '2097152';
					$config['max_width'] = '';
					$config['max_height'] = '';
					$config['remove_spaces']= TRUE;
					$this->upload->initialize($config);
					if ($this->upload->do_upload('foto_konseling')) {
							$f = $this->upload->data();
							//compress
							$config['image_library']='gd2';
							$config['source_image']= './assets/foto_konseling/'.$f['file_name'];
							$config['maintain_ratio']= FALSE;
							$config['quality']= '80%';
							$config['width']= 1280;
							$config['height']= 720;
							$config['new_image']= './assets/foto_konseling/'.$f['file_name'];
							$this->load->library('image_lib', $config);
							$this->image_lib->resize();
							$nf = $_POST['id_konseling']."_".uniqid().$f['file_ext'];
							rename( $config['upload_path'].'/'.$f['file_name'], './assets/foto_konseling/'.$nf);
							
							$field3['foto_konseling'] = $nf;
						} else{
						   $error= $this->upload->display_errors();
						   echo $error;
						   exit;
						}
				}

				if(!empty($_FILES['lampiran_konseling']['name'])){
					if (!is_dir('assets/lampiran_konseling'))
					{
						mkdir('./assets/lampiran_konseling');
					}	
					$config['upload_path'] = './assets/lampiran_konseling';
					$config['allowed_types'] = 'pdf|PDF';
					$config['max_size'] = '2097152';
					$config['max_width'] = '';
					$config['max_height'] = '';
					$config['remove_spaces']= TRUE;
					$this->upload->initialize($config);
					if ($this->upload->do_upload('lampiran_konseling')) {
							$f = $this->upload->data();
							$nf = $_POST['id_konseling']."_".uniqid().$f['file_ext'];
							rename( $config['upload_path'].'/'.$f['file_name'], './assets/lampiran_konseling/'.$nf);
							
							$field3['lampiran_konseling'] = $nf;
						} else{
						   $error= $this->upload->display_errors();
						   echo $error;
						   exit;
						}
				}

		        $retval3=$this->KonselorModel->update($_POST['id_konseling'],'id_konseling',$field3,'bk_data_konseling');

				//isi table bk_history_konseling
				$field2['id_konseling']=$_POST['id_konseling'];
				$field2['created_by']=$this->session->userdata('bk_id_user');
				$field2['status']=3;
				$retval2=$this->KonselorModel->simpanData('bk_history_konseling',$field2);
				if(isset($_POST['id_jadwal_piket']) && !empty($_POST['id_jadwal_piket'])){
					$field6['id_konseling']=$_POST['id_konseling'];
					$field6['created_by']=$this->session->userdata('bk_id_user');
					$field6['status']=5;
					$this->KonselorModel->simpanData('bk_history_konseling',$field6);

				}

				// kalo milih konsultasi lanjutan isi bk_data_konseling 1 row lagi
				if(isset($_POST['id_jadwal_piket']) && !empty($_POST['id_jadwal_piket'])){
					//get jadwal piket
					$jadwal_piket=$this->db->query('select * from bk_jadwal_piket where id_jadwal_piket='.$_POST['id_jadwal_piket'].'')->row();
					// echo"<pre>";
					// print_r($jadwal_piket);
					// echo"</pre>";
					// exit;

				   //isi bk_data_konseling
				   $field4['user_id']=$user_id_mhs;
				   if(!empty($data_konseling->id_kategori_masalah)){
						$field4['id_kategori_masalah']=$id_kategori_masalah;
				   }
				   $field4['tanggal_diajukan']=$jadwal_piket->tanggal;
				   $field4['jam_diajukan']=$jadwal_piket->jam_mulai;
				   $field4['tanggal_disetujui']=$jadwal_piket->tanggal;
				   $field4['jam_disetujui']=$jadwal_piket->jam_mulai;
				   $field4['dijadwalkan_oleh']=$this->session->userdata('bk_id_user');
				   $field4['ditangani_oleh']=$jadwal_piket->id_user;
				   $field4['id_status_konseling']=1;
				   $this->KonselorModel->simpanData('bk_data_konseling',$field4);
				   $last_insert_id=$this->db->insert_id();
				   
				   //isi bk_history
				   $field5['id_konseling']=$last_insert_id;
				   $field5['created_by']=$this->session->userdata('bk_id_user');
				   $field5['status']=1;
				   $this->KonselorModel->simpanData('bk_history_konseling',$field5);

				   //update jadwal is_booked
				   $field7['is_booked']=1;
				   $field7['booked_by']=$this->session->userdata('bk_id_user');
				   $this->KonselorModel->update($jadwal_piket->id_jadwal_piket,'id_jadwal_piket',$field7,'bk_jadwal_piket');

				}

                if(isset($_POST['orangtua']) || isset($_POST['dosenwali'])){
					//send email to mahasiswa
					//get detail mahasiswa
					$temp_mhs=$this->db->query('select * from default_profiles where user_id='.$user_id_mhs.'');
					$data_mhs=$temp_mhs->row();

					//get detail konselor
					$temp_konselor=$this->db->query('select * from bk_users where id_user='.$this->session->userdata('bk_id_user').'');
					$data_konselor=$temp_konselor->row();

					$contentemail['nama_mahasiswa']=$data_mhs->display_name;
					if($data_mhs->nim!=""){
						$contentemail['nim']=$data_mhs->nim;	
					} else {
						$contentemail['nim']=$data_mhs->nim_tpb;	
					}
					$contentemail['nama_konselor']=$data_konselor->gelar_depan.' '.$data_konselor->nama_lengkap.' '.$data_konselor->gelar_belakang;
					$contentemail['tanggal_disetujui']=$data_konseling->tanggal_disetujui;
					$contentemail['jam_disetujui']=$data_konseling->jam_disetujui;
					
					
					if(isset($_POST['orangtua'])){
						if(!empty($_POST['catatan_orang_tua'])){
							$contentemail['catatan']=$_POST['catatan_orang_tua'];
							$SendTo="bobynlp@gmail.com";
							$subject="Hasil Konseling Mahasiswa,$data_mhs->display_name";
							$Content=$this->load->view('admin/konselor/templateemailortu',$contentemail,TRUE);
							$this->sendEmail($SendTo,$subject,$Content,$cc="");
						}
					}

					if(isset($_POST['dosenwali'])){
						if(!empty($_POST['catatan_dosen_wali'])){
							$contentemail['catatan']=$_POST['catatan_dosen_wali'];
							$SendTo="bobby.alamsyah@itb.ac.id";
							$subject="Hasil Konseling Mahasiswa, $data_mhs->display_name";
							$Content=$this->load->view('admin/konselor/templateemailortu',$contentemail,TRUE);
							$this->sendEmail($SendTo,$subject,$Content,$cc="");
						}
					}
                
				}
					
				if($retval>0 && $retval2>0 && $retval3>0){
					$this->session->set_flashdata('status_berhasil','Berhasil Disimpan !');
					redirect(base_url().'Konselor/konseling');
				} else {
					$this->session->set_flashdata('status_gagal','Gagal Disimpan !');
					redirect(base_url().'Konselor/detail/'.$_POST['id_konseling']);
				}
			//} else {
			//	$this->session->set_flashdata('status_gagal','Anda Belum Melakukan Konseling !');
			//	redirect(base_url().'Konselor/detail_akan_konsul/'.$_POST['id_konseling']);
			//}
	}

	public function proc_update_konsultasi(){
				//isi table bk_hasil_konseling
				$field['created_by']=$this->session->userdata('bk_id_user');
				$field['resume_konsultasi']=$_POST['resume_konsultasi'];
				$field['saran']=$_POST['saran'];
				$field['kesimpulan']=$_POST['kesimpulan'];
				if(isset($_POST['catatan_dosen_wali'])) {
					$field['catatan_dosen_wali']=$_POST['catatan_dosen_wali'];
				}
				if(isset($_POST['catatan_orang_tua'])) {
					$field['catatan_orang_tua']=$_POST['catatan_orang_tua'];
				}
				if(!empty($_POST['kategori_kasus'])){
					$field['kategori_kasus']=json_encode($_POST['kategori_kasus']);
				}
				if(!empty($_POST['kategori_kasus_lainnya'])){
					$field['kategori_kasus_lainnya']=$_POST['kategori_kasus_lainnya'];
				} else {
					$field['kategori_kasus_lainnya']=null;
				}
				$field['alasan_konsultasi']=$_POST['alasan_konsultasi'];
				$field['ringkasan_analisa_permasalahan']=$_POST['ringkasan_analisa_permasalahan'];
				$field['tindakan_kuratif']=$_POST['tindakan_kuratif'];
				$field['rekomendasi']=$_POST['rekomendasi'];
				$field['catatan_observasi']=$_POST['catatan_observasi'];
				$field['is_lengkap']=$_POST['is_lengkap'];
				$field['level_kasus']=$_POST['level_kasus'];
				$retval=$this->KonselorModel->update($_POST['id_konseling'],'id_konseling',$field,'bk_hasil_konseling');

				//update status di table bk_data_konseling menjadi selesai
				//$field3['id_status_konseling']=3;
		        //$retval3=$this->KonselorModel->update($_POST['id_konseling'],'id_konseling',$field3,'bk_data_konseling');

				//isi table bk_history_konseling
				//$field2['id_konseling']=$_POST['id_konseling'];
				//$field2['created_by']=$this->session->userdata('bk_id_user');
				//$field2['status']=3;
				//$retval2=$this->KonselorModel->simpanData('bk_history_konseling',$field2);

				if($retval>0){
					$this->session->set_flashdata('status_berhasil','Berhasil Disimpan !');
					redirect(base_url().'Konselor/konseling');
				} else {
					$this->session->set_flashdata('status_gagal','Gagal Disimpan !');
					redirect(base_url().'Konselor/detail_sdh_konsul/'.$_POST['id_konseling']);
				}

	}

	public function riwayat_konseling($id_konseling){
		//get user id
		$temp=$this->db->query('select user_id from bk_data_konseling where id_konseling='.$id_konseling.'');
		$user_id=$temp->row()->user_id;


		$data['riwayat_konseling']=$this->KonselorModel->hasil_konseling($id_konseling);
		$data['default_profiles']=$this->KonselorModel->default_profiles($user_id);
		$data['data_konseling']=$this->KonselorModel->data_konseling_by_idkonseling($id_konseling);
		$data['konselor']=$this->KonselorModel->get_data_konselor2($id_konseling);

		if(!empty($data['data_konseling']->id_kategori_masalah)){
			//oleh json id_kategori_masalah
			$temp_kategori_masalah=json_decode($data['data_konseling']->id_kategori_masalah);
			$id_kategori_masalah=implode(",",$temp_kategori_masalah);
				
			$data['kategori_masalah']=$this->KonselorModel->get_kategori_masalah_detail($id_kategori_masalah);
		}

		// echo"<pre>";
		// print_r($data);
		// echo"</pre>";
		// exit;

		$this->load->view('admin/common/header');
		$this->load->view('admin/konselor/hasil_konseling',$data);
		$this->load->view('admin/common/footer');
	}

	public function test_jwt($user_id){
		
        $res=null;
        return $res;
			 
	}

	public function konfirmasi_konseling($id_konseling){
		
		//get data konseling
		$temp_data=$this->db->query('select * from bk_data_konseling where id_konseling='.$id_konseling.'');
		$data_konseling=$temp_data->row();

		//update bk_data_konseling
		$field['tanggal_disetujui'] = $data_konseling->tanggal_diajukan;
		$field['jam_disetujui'] = $data_konseling->jam_diajukan;
		$field['dijadwalkan_oleh'] = $this->session->userdata('bk_id_user');
		$field['id_status_konseling'] = 2;
		$field['venue']=$_POST['venue'];
		if($_POST['media_konsultasi_offline']!=""){
			$field['media_konsultasi']=$_POST['media_konsultasi_offline'];
		} else {
			$field['media_konsultasi']=$_POST['media_konsultasi_online'];
		}
		$retval=$this->KonselorModel->update($id_konseling,'id_konseling',$field,'bk_data_konseling');

		//insert bk_history
		$field2['id_konseling']=$id_konseling;
		$field2['created_by']=$this->session->userdata('bk_id_user');
		$field2['status']=2;
		$retval2=$this->KonselorModel->simpanData('bk_history_konseling',$field2);

		//send email to mahasiswa
		//get detail mahasiswa
		$temp_mhs=$this->db->query('select * from default_profiles where user_id='.$data_konseling->user_id.'');
		$data_mhs=$temp_mhs->row();

		//get detail konselor
		$temp_konselor=$this->db->query('select * from bk_users where id_user='.$this->session->userdata('bk_id_user').'');
		$data_konselor=$temp_konselor->row();

		$contentemail['nama_mahasiswa']=$data_mhs->display_name;
		$contentemail['nama_konselor']=$data_konselor->gelar_depan.' '.$data_konselor->nama_lengkap.' '.$data_konselor->gelar_belakang;
		$contentemail['tanggal_disetujui']=$data_konseling->tanggal_diajukan;
		$contentemail['jam_disetujui']=$data_konseling->jam_diajukan;
		$contentemail['venue']=$_POST['venue'];
		if($_POST['media_konsultasi_offline']!=""){
			$contentemail['media_konsultasi']=$_POST['media_konsultasi_offline'];
		} else {
			$contentemail['media_konsultasi']=$_POST['media_konsultasi_online'];
		}
		$SendTo=$data_konseling->email;
		$subject="Permohonan Konseling Anda Disetujui";
		$Content=$this->load->view('admin/konselor/templateemail',$contentemail,TRUE);
		$this->sendEmail($SendTo,$subject,$Content,$cc="");

		if($retval>0 && $retval2>0){
			$this->session->set_flashdata('status_berhasil','Berhasil Disimpan !');
			redirect(base_url().'Konselor/permohonan_konseling');
		} else {
			$this->session->set_flashdata('status_gagal','Gagal Disimpan !');
			redirect(base_url().'Konselor/permohonan_konseling');
		}


	}

	public function tolak_permohonan_konseling($id_konseling){
		//get data konseling
		$temp_data=$this->db->query('select * from bk_data_konseling where id_konseling='.$id_konseling.'');
		$data_konseling=$temp_data->row();

		//get jadwal piket
		$temp_piket=$this->db->query('select * from bk_jadwal_piket where date(tanggal)="'.$data_konseling->tanggal_diajukan.'" and jam_mulai="'.$data_konseling->jam_diajukan.'" and id_user='.$data_konseling->ditangani_oleh.'');
		$data_piket=$temp_piket->row();

		//update bk_data_konseling
		$field['id_status_konseling'] = 6;
		$retval=$this->KonselorModel->update($id_konseling,'id_konseling',$field,'bk_data_konseling');

		//insert bk_history
		$field2['id_konseling']=$id_konseling;
		$field2['created_by']=$this->session->userdata('bk_id_user');
		$field2['status']=6;
		$retval2=$this->KonselorModel->simpanData('bk_history_konseling',$field2);

		//update atau balikin jadwal piket di tabel bk_jadwal_piket
        $field3['is_booked']=0;
		$field3['booked_by']=null;
		$retval3=$this->KonselorModel->update($data_piket->id_jadwal_piket,'id_jadwal_piket',$field3,'bk_jadwal_piket');

		//catat pembatalan
		$field4['tanggal_konseling']=$data_piket->tanggal;
		$field4['jam_konseling']=$data_piket->jam_mulai;
		$field4['id_konselor']=$data_konseling->ditangani_oleh;
		$field4['dibatalkan_oleh_admin']=$data_konseling->ditangani_oleh;
		$field4['id_konseling']=$data_konseling->id_konseling;
		$retval4=$this->KonselorModel->simpanData('bk_history_pembatalan',$field4);

		if($retval>0 && $retval2>0 && $retval3>0 && $retval4>0){
			$this->session->set_flashdata('status_berhasil','Berhasil Disimpan !');
			redirect(base_url().'Konselor/permohonan_konseling');
		} else {
			$this->session->set_flashdata('status_gagal','Gagal Disimpan !');
			redirect(base_url().'Konselor/permohonan_konseling');
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
                $list = array($cc,'wowowarsono@gmail.com'); 
                $this->email->cc($list); 

                $this->email->subject($subject);
                $this->email->message($Content);  

                $this->email->send();
				
		}

		// cek API jadwal konselor
		function get_jadwal_konselor(){
			$id_user=$this->input->post('konselor_konsultasi_lanjutan');
			$data= $this->KonselorModel->get_jadwal_konselor($id_user);
			//  echo'<pre>';
			// print_r($data);
			// echo'</pre>';
			// exit; 
			if (!empty($data[0]->tanggal)) {
						 /*  $user_id=echo $data->user_id;
						  $nama=echo $data->display_name; */
						$a=[];
						 foreach ($data as $data) {
						 $b=array('id_jadwal_piket'=>$data->id_jadwal_piket,'tanggal'=>$data->tanggal,'jam_mulai'=>$data->jam_mulai,'jam_akhir'=>$data->jam_akhir,'nama'=>$data->nama_lengkap,'gelar_depan'=>$data->gelar_depan,'gelar_belakang'=>$data->gelar_belakang);array_push($a,$b);
						 }
						 echo json_encode($a);
			
			} else {
				$warning=json_encode(array("notfound"=>''));
                echo json_encode($warning);
			}
		}

}
