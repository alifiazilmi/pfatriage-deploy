<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_form_pengaduan extends CI_Model
{
  
    function __construct()
    {
        parent::__construct();
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

  //daftar_mhs_bermasalah
  public function daftar_mhs_bermasalah_blm_disetujui(){
      $query=$this->db->query('select * from bk_form_pengaduan_mhs_bermasalah where status=0 order by created_date asc');
      return $query->result();
  }

  public function daftar_mhs_bermasalah_approve(){
    $query=$this->db->query('select * from bk_form_pengaduan_mhs_bermasalah where status=1 order by created_date asc');
    return $query->result();
  }

  public function daftar_mhs_bermasalah_tolak(){
    $query=$this->db->query('select * from bk_form_pengaduan_mhs_bermasalah where status=2 order by created_date asc');
    return $query->result();
  }

  //diproses msh dilaporkan ke dosen wali.
  public function daftar_mhs_bermasalah_proses(){
    $query=$this->db->query('select * from bk_form_pengaduan_mhs_bermasalah where status=3 order by created_date asc');
    return $query->result();
  }


  //daftar_feedback_institusi
  public function daftar_feedback_institusi(){
    $query=$this->db->query('select * from bk_form_pengaduan_feedback_institusi order by created_date asc');
    return $query->result();
}
	
  

}