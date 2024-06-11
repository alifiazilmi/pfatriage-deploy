<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_service extends CI_Model
{
  
    function __construct()
    {
        parent::__construct();
    }

    public function cekToken($token = '',$endpoint = '')
    {
    	
        $this->db->join('token_akses', 'token.id = token_akses.id_token');
        $this->db->join('service_list', 'token_akses.id_service_list = service_list.id_service_list');
        $this->db->where('token', $token);
        $this->db->where('endpoint', $endpoint);
		$query = $this->db->get('token');
		return ($query->num_rows() > 0) ? TRUE : FALSE;
    }
	
	//fungsi delete general
   public function hapus($column_hapus,$id_hapus,$table){
	  $this->db->where($column_hapus,$id_hapus);
      $this->db->delete($table);
	  return $this->db->affected_rows(); 
	 }
	 
  //insert table general
   public function simpanData($table,$data) {
        $this->db->insert($table, $data);
        return $this->db->affected_rows();
    }
	//fungsi update general
   public function update($id,$column,$field,$table){
	   $this->db->where($column,$id);
       $this->db->update($table, $field);
       return $this->db->affected_rows();
  }
	
  

}