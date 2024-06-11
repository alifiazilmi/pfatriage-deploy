<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	function __construct()
	{
		 parent::__construct();
	}

	public function index()
	{
		$this->load->model('admin/UsersModel','m_users');
		$data['staf'] 				= $this->m_users->getallstaf();
		$data['wedo'] 				= $this->m_users->getwedo();
		$data['banner'] 			= $this->m_users->getbanner();
		$data['banner_pengumuman']	= $this->m_users->getbannerpengumuman();
		$data['banner_berita']		= $this->m_users->getbannerberita();
		$data['pengumuman'] 		= $this->m_users->getpengumuman(0,1);
		$data['berita'] 			= $this->m_users->getberita();
		$data['artikel'] 			= $this->m_users->getartikel();
		$this->load->view('front/common/header');
		$this->load->view('front/index',$data);
		$this->load->view('front/common/footer');
	}

	public function jadwal()
	{
		$this->load->view('front/common/header');
		$this->load->view('front/jadwal');
		$this->load->view('front/common/footer');
	}

	public function sop()
	{

		//  $user 	= $this->session->userdata('bk_id_user');

		//  if (isset($user)) {

		//  	$this->load->view('front/common/header');
		// 	$this->load->view('front/sop');
		// 	$this->load->view('front/common/footer');
		 
		//  }else{
		//  	$this->session->sess_destroy();
		//  	redirect('admin/login?sop=1',TRUE);
		//  }

		$this->load->view('front/common/header');
		$this->load->view('front/sop_tampil');
		$this->load->view('front/common/footer');

		
	}

	public function staf()
	{
		$this->load->model('admin/UsersModel','m_users');
		$data['staf'] 		= $this->m_users->getallstaf();
		$this->load->view('front/common/header');
		$this->load->view('front/staf',$data);
		$this->load->view('front/common/footer');
	}

	public function peercounselor()
	{
		$this->load->view('front/common/header');
		$this->load->view('front/peercounselor');
		$this->load->view('front/common/footer');
	}

	public function darurat()
	{
		$this->load->view('front/common/header');
		$this->load->view('front/darurat');
		$this->load->view('front/common/footer');
	}

	public function ruang()
	{
		$this->load->view('front/common/header');
		$this->load->view('front/ruang');
		// $this->load->view('front/common/footer');
	}

	public function staf_detail($id='',$nama='')
	{
		$this->load->model('admin/UsersModel','m_users');
		$data['staf'] 		= $this->m_users->getallstafbyid($id);
		$data['pendidikan'] = $this->m_users->getpendidikanbyiduser($id);
		$data['pengalaman'] = $this->m_users->getpengalambyiduser($id);
		$this->load->view('front/common/header');
		$this->load->view('front/stafdetail',$data);
		$this->load->view('front/common/footer');

	}

	public function artikel($id='',$judul='')
	{

		$this->load->model('admin/UsersModel','m_users');
		$data['artikel'] = $this->m_users->getartikelbyid($id);
		$this->load->view('front/common/header');
		$this->load->view('front/artikel',$data);
		$this->load->view('front/common/footer');
	}

	public function berita($id='',$judul='')
	{

		$this->load->model('admin/UsersModel','m_users');
		$berita=$this->m_users->getDetBerita($id);
        $this->m_users->hint($id);
        $vars = array(
            'pengumuman'=>$berita
        );
		$this->load->view('front/common/header');
		$this->load->view('front/berita_pengumuman',$vars);
		$this->load->view('front/common/footer');
	}

	public function pengumuman($id='',$judul='')
	{

		$this->load->model('admin/UsersModel','m_users');
		$pengumuman=$this->m_users->getDetBerita($id);
        $this->m_users->hint($id);
        $vars = array(
            'pengumuman'=>$pengumuman
        );
		$this->load->view('front/common/header');
		$this->load->view('front/berita_pengumuman',$vars);
		$this->load->view('front/common/footer');
	}

	public function pengumuman_bk($id='',$judul='')
	{

		$this->load->model('admin/UsersModel','m_users');
		$pengumuman=$this->m_users->getbannerbyid($id);
        $vars = array(
            'pengumuman_bk'=>$pengumuman
        );
		$this->load->view('front/common/header');
		$this->load->view('front/pengumuman_bk',$vars);
		$this->load->view('front/common/footer');
	}

	public function login()
	{
		$this->load->view('admin/login');
	}

	public function auth()
	{
		$usr = $this->input->post('usr');
		$pwd = $this->input->post('pwd');

		$this->load->model('authModel','am');

		$valid_data = $this->am->auth($usr,$pwd);

		

		if($valid_data){
		
			$session_data = array(
										'bk_id_user'  => $valid_data->id_user,
								        'bk_username'  => $usr,
								        'bk_nama'     	=> $valid_data->nama_lengkap,
								        'bk_email'     => $valid_data->email,
								        'bk_is_login' 	=> 1,
								        'bk_id_role'	=> $valid_data->id_role,
								        'bk_role_name' => $valid_data->role_name
								);

			$this->session->set_userdata($session_data);
			$this->am->upd_log($valid_data->id_user);

			if ($_POST['is_sop'] == 1) {
					redirect('sop',TRUE);
			}
		
			if ($valid_data->id_role == 1) {
				 redirect('admin',TRUE);
			}else if($valid_data->id_role == 3){
				 redirect('konselor',TRUE);
			}else{
				 redirect('admin',TRUE);
			}


		

           
        }else{
            $this->session->set_flashdata('warning','Mohon Periksa Username/Password Anda.');
            redirect('admin/login',TRUE);
        }

		
	}



	public function logout($id_user='')
	{
		$this->load->model('authModel','am');
		$this->am->upd_log($id_user,TRUE);
		$this->session->sess_destroy();

		redirect('admin/login',TRUE);
	}
}
