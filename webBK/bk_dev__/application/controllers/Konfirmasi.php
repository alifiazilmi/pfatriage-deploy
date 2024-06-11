<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasi extends CI_Controller {

	 function __construct()
	{
		parent::__construct();
		$this->load->model('konselor/KonselorModel');
		$this->load->model('admin/UsersModel','m_users');
		
	}

	public function permohonan($id_konseling_encrypt){
		$id_konseling= $this->decode_url($id_konseling_encrypt);

		//get data konseling
		$temp_data=$this->db->query('select * from bk_data_konseling where id_konseling='.$id_konseling.'');
		$data_konseling=$temp_data->row();

		if (!empty($data_konseling)) {

			$data['permohonan_konseling']=$this->KonselorModel->get_jadwal_permohonan_konseling_byid($data_konseling->id_konseling,$data_konseling->ditangani_oleh);

			$this->load->view('admin/konselor/form_konfirmasi',$data);
		} else {
			echo "Konseling Dibatalkan oleh Mahasiswa";
		}
      
		
	}

	public function konfirmasi_konseling($id_konseling){
		
		//get data konseling
		$temp_data=$this->db->query('select * from bk_data_konseling where id_konseling='.$id_konseling.'');
		$data_konseling=$temp_data->row();
        
		if($data_konseling->id_status_konseling==1) {
				//update bk_data_konseling
				$field['tanggal_disetujui'] = $data_konseling->tanggal_diajukan;
				$field['jam_disetujui'] = $data_konseling->jam_diajukan;
				$field['dijadwalkan_oleh'] = $data_konseling->ditangani_oleh;
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
				$field2['created_by']=$data_konseling->ditangani_oleh;
				$field2['status']=2;
				$retval2=$this->KonselorModel->simpanData('bk_history_konseling',$field2);

				//send email to mahasiswa
				//get detail mahasiswa
				$temp_mhs=$this->db->query('select * from default_profiles where user_id='.$data_konseling->user_id.'');
				$data_mhs=$temp_mhs->row();

				//get detail konselor
				$temp_konselor=$this->db->query('select * from bk_users where id_user='.$data_konseling->ditangani_oleh.'');
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

				//encrypt id_konseling untuk redirect
				$encrypt= $this->encode_url($id_konseling);

				if($retval>0 && $retval2>0){
					$this->session->set_flashdata('sukses','Berhasil Dikonfirmasi !');
					redirect(base_url().'konfirmasi/permohonan/'.$encrypt);
				} else {
					$this->session->set_flashdata('gagal','Gagal Dikonfirmasi !');
					redirect(base_url().'konfirmasi/permohonan/'.$encrypt);
				}
		} else {
			$this->session->set_flashdata('gagal','Permohonan Konseling Telah Dikonfirmasi Oleh Admin BK !');
			redirect(base_url().'konfirmasi/permohonan/'.$encrypt);
		}


	}

	public function tolak_permohonan_konseling($id_konseling){
		//get data konseling
		$temp_data=$this->db->query('select * from bk_data_konseling where id_konseling='.$id_konseling.'');
		$data_konseling=$temp_data->row();
        
		if($data_konseling->id_status_konseling==1) {
				//get jadwal piket
				$temp_piket=$this->db->query('select * from bk_jadwal_piket where date(tanggal)="'.$data_konseling->tanggal_diajukan.'" and jam_mulai="'.$data_konseling->jam_diajukan.'" and id_user='.$data_konseling->ditangani_oleh.'');
				$data_piket=$temp_piket->row();

				//update bk_data_konseling
				
				$field['id_status_konseling'] = 6;
				$retval=$this->KonselorModel->update($id_konseling,'id_konseling',$field,'bk_data_konseling');

				//insert bk_history
				$field2['id_konseling']=$id_konseling;
				$field2['created_by']=$data_konseling->ditangani_oleh;
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

				//encrypt id_konseling untuk redirect
				$encrypt= $this->encode_url($id_konseling);
				
				if($retval>0 && $retval2>0 && $retval3>0 && $retval4>0){
					$this->session->set_flashdata('sukses','Berhasil Dikonfirmasi !');
					redirect(base_url().'konfirmasi/permohonan/'.$encrypt);
				} else {
					$this->session->set_flashdata('gagal','Gagal Dikonfirmasi !');
					redirect(base_url().'konfirmasi/permohonan/'.$encrypt);
				}
			} else {
				$this->session->set_flashdata('gagal','Permohonan Konseling Telah Dikonfirmasi Oleh Admin BK !');
				redirect(base_url().'konfirmasi/permohonan/'.$encrypt);
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

		function decode_url($string)
		{
			    $this->load->library('encryption');
				$string = strtr(
						$string,
						array(
							'.' => '+',
							'-' => '=',
							'~' => '/'
						)
					);

				return $this->encryption->decrypt($string);
		}

		function encode_url($string)
			{
				    $this->load->library('encryption');
					$ret = $this->encryption->encrypt($string);

					
						$ret = strtr(
								$ret,
								array(
									'+' => '.',
									'=' => '-',
									'/' => '~'
								)
							);
					

					return $ret;
			}

}
