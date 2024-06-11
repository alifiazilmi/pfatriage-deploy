<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {

	public function auth($usr, $pass)
	{			
				$this->db->where('is_aktif',1);
				$this->db->where('username',$usr);
				$this->db->where('password',md5($pass));
				$this->db->join('bk_role','bk_role.id_role = bk_users.id_role');
		$data = $this->db->get('bk_users');

		return ($data->num_rows() > 0 ? $data->row():0);
	}

	public function user($id_user='')
	{			
				$this->db->where('id_user',$id_user);
				$this->db->join('bk_role','bk_role.id_role = bk_users.id_role');
		$data = $this->db->get('bk_users');

		return ($data->num_rows() > 0 ? $data->row():0);
	}

	public function upd_log($id_user,$logout=FALSE)
	{
		if ($logout) {

			$log = array('is_login' => 0);

		}else{

			$log = array('login_date' => date('Y-m-d H:i:s'));

		}

				$this->db->where('id_user',$id_user);
				$this->db->update('bk_users',$log);

		return $this->db->affected_rows();
	}

}