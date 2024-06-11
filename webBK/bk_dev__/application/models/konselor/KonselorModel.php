<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KonselorModel extends CI_Model {

    //FUNCTION GENERAL

    public function hapus($column_hapus,$id_hapus,$table){
        $this->db->where($column_hapus,$id_hapus);
        $this->db->delete($table);
        return $this->db->affected_rows(); 
       }
       
     //Fungsi update general
     public function update($id,$column,$field,$table){
         $this->db->where($column,$id);
         $this->db->update($table, $field);
         return $this->db->affected_rows();
    }
     public function simpanData($table,$data) {
          $this->db->insert($table, $data);
          return $this->db->affected_rows();
      
     }
     
     public function simpanDataBatch($table,$data) {
          $this->db->insert_batch($table, $data);
          return $this->db->affected_rows();
      }

    public function get_jadwal_pengajuan_konseling(){
        $query=$this->db->query('select a.no_hp,a.email,a.venue,a.tanggal_disetujui,a.jam_disetujui,a.user_id,a.id_konseling,b.nim,b.nim_tpb,b.display_name 
                                 from bk_data_konseling a join default_profiles b on a.user_id=b.user_id 
                                 where a.id_status_konseling=2 and a.tanggal_disetujui is not null and a.jam_disetujui is not null and a.ditangani_oleh='.$this->session->userdata('bk_id_user').' 
                                    AND YEAR(a.created_date)='.date('Y').'
                                 order by a.tanggal_disetujui and a.jam_disetujui asc');
        return $query->result();
    }

    public function get_jadwal_permohonan_konseling(){
      $query=$this->db->query('select a.no_hp,a.email,a.venue, a.daring_luring,a.tanggal_diajukan,a.jam_diajukan,a.user_id,a.id_konseling,b.nim,b.nim_tpb,b.display_name 
                               from bk_data_konseling a join default_profiles b on a.user_id=b.user_id 
                               where a.id_status_konseling=1 and a.ditangani_oleh='.$this->session->userdata('bk_id_user').' order by a.tanggal_diajukan and a.jam_diajukan desc');
      return $query->result();
  }

  public function get_jadwal_permohonan_konseling_byid($id_konseling,$id_user){
    $query=$this->db->query('select a.no_hp,a.email,a.venue,a.tanggal_diajukan,a.jam_diajukan,a.user_id,a.id_konseling,b.nim,b.nim_tpb,b.display_name 
                             from bk_data_konseling a join default_profiles b on a.user_id=b.user_id 
                             where a.id_konseling='.$id_konseling.' and a.id_status_konseling=1 and a.ditangani_oleh='.$id_user.' order by a.tanggal_diajukan and a.jam_diajukan asc');
    return $query->result();
}

    public function get_data_sdh_konseling(){
        $query=$this->db->query('select a.no_hp,a.email,a.durasi_konseling,a.venue,a.tanggal_disetujui,a.jam_disetujui,a.user_id,a.id_konseling,b.nim,b.nim_tpb,b.display_name,a.waktu_mulai_konseling,a.waktu_akhir_konseling,c.level_kasus,c.is_lengkap 
                                 from bk_data_konseling a join default_profiles b on a.user_id=b.user_id join bk_hasil_konseling c on a.id_konseling=c.id_konseling
                                 where a.id_status_konseling in (3,4,5) and a.tanggal_disetujui is not null and a.jam_disetujui is not null and a.ditangani_oleh='.$this->session->userdata('bk_id_user').' 
                                 and YEAR(a.created_date)='.date('Y').'
                                 order by a.tanggal_disetujui desc');
        return $query->result();
    }

    public function hasil_konseling($id_konseling){
        $query=$this->db->query('select * from bk_hasil_konseling where id_konseling='.$id_konseling.'');
        return $query->row();
    }

    public function hasil_screening($id_konseling){
        $query=$this->db->query('select a.*,b.no_pertanyaan,b.pertanyaan from bk_jawaban a join bk_pertanyaan b on a.id_pertanyaan=b.id_pertanyaan where a.id_konseling='.$id_konseling.' order by b.no_pertanyaan asc');
        return $query->result();
    }

    public function riwayat_konseling_by_userid($user_id){
        $query=$this->db->query('select a.tanggal_disetujui,a.jam_disetujui,a.id_konseling, b.nama_lengkap,b.gelar_depan,b.gelar_belakang from bk_data_konseling a join bk_users b on a.ditangani_oleh=b.id_user where a.user_id='.$user_id.' and a.tanggal_disetujui is not null and a.jam_disetujui is not null order by a.tanggal_disetujui asc');
        return $query->result();
    }

    public function default_profiles($user_id){
        $query=$this->db->query('select a.*,c.nama_fakultas,b.nama_prodi,b.prodi_jenjang from default_profiles a join prodi b on a.id_prodi=b.id_prodi join fakultas c on b.kode_fakultas=c.kode_fakultas where a.user_id='.$user_id.'');
        return $query->row();
    }

    public function data_konseling_by_idkonseling($id_konseling){
        $query=$this->db->query('select a.* from bk_data_konseling a where a.id_konseling='.$id_konseling.'');
        return $query->row();

    }

    public function get_data_konselor($id_konseling){
        $query=$this->db->query('select b.id_user,b.gelar_depan,b.gelar_belakang,b.nama_lengkap from bk_data_konseling a left join bk_users b on a.ditangani_oleh=b.id_user');
        return $query->row();
    }

    public function get_data_konselor2($id_konseling){
        $query=$this->db->query('select b.id_user,b.gelar_depan,b.gelar_belakang,b.nama_lengkap from bk_data_konseling a left join bk_users b on a.ditangani_oleh=b.id_user where a.id_konseling = '.$id_konseling);
        return $query->row();
    }

    public function user_profile_konselor(){
       $query=$this->db->query('select * from bk_users where id_user='.$this->session->userdata('bk_id_user').'');
       return $query->row();
    }

     public function user_profile_konselor_byid($id=''){
       $query=$this->db->query('select * from bk_users where id_user='.$id.'');
       return $query->row();
    }

    //get kategori masalah
		public function get_kategori_masalah_detail($id_kategori_masalah){
			$query=$this->db->query('select * from bk_kategori_masalah where id_kategori_masalah in ('.$id_kategori_masalah.') order by id_kategori_masalah asc');
			return $query->result();
        }
        
    //get jadwal piket
      public function get_jadwal_piket(){
        $query=$this->db->query('select tanggal,jam_mulai,jam_akhir from bk_jadwal_piket where id_user='.$this->session->userdata('bk_id_user').' and tanggal >= CURDATE() order by tanggal and jam_mulai asc');
        return $query->result();
      }

    //Total Durasi Konseling Per Konselor
    public function total_durasi_konseling(){
        $query=$this->db->query('SELECT SEC_TO_TIME( SUM( TIME_TO_SEC( durasi_konseling ) ) ) AS totaltime from bk_data_konseling where ditangani_oleh ='.$this->session->userdata('bk_id_user').'');
        return $query->row();
    }

    //API Ambil Data Mhs
    public function get_data_mhs_service($user_id){
       
        $res=null;
        return $res;
              
    }

    public function service_ditdik($user_id){
     
        return null;       
         
    }

    //MODEL SERVICE ANDROID
    public function service_get_jadwal_pengajuan_konseling($bk_id_user){
      $query=$this->db->query('select a.no_hp,a.email,a.venue,a.tanggal_disetujui,a.jam_disetujui,a.user_id,a.id_konseling,b.nim,b.nim_tpb,b.display_name 
                               from bk_data_konseling a join default_profiles b on a.user_id=b.user_id 
                               where a.id_status_konseling=2 and a.tanggal_disetujui is not null and a.jam_disetujui is not null and a.ditangani_oleh='.$bk_id_user.' order by a.tanggal_disetujui and a.jam_disetujui asc');
      return $query->result();
  }

  public function service_get_data_sdh_konseling($bk_id_user){
    $query=$this->db->query('select a.no_hp,a.email,a.durasi_konseling,a.venue,a.tanggal_disetujui,a.jam_disetujui,a.user_id,a.id_konseling,b.nim,b.nim_tpb,b.display_name 
                             from bk_data_konseling a join default_profiles b on a.user_id=b.user_id 
                             where a.id_status_konseling in (3,4,5) and a.tanggal_disetujui is not null and a.jam_disetujui is not null and a.ditangani_oleh='.$bk_id_user.' order by a.tanggal_disetujui and a.jam_disetujui asc');
    return $query->result();
  }

  public function list_konselor($id_saya){
    $query=$this->db->query('select * from bk_users where id_role=3 and id_user not in ('.$id_saya.') order by nama_lengkap asc');
    return $query->result();
  }

  //AJAX GET JADWAL KONSELOR
  public function get_jadwal_konselor($id_user){
    $query=$this->db->query('select a.*,b.nama_lengkap,b.gelar_depan,b.gelar_belakang from bk_jadwal_piket a join bk_users b on a.id_user=b.id_user where a.id_user="'.$id_user.'" and a.is_booked=0 and a.tanggal>= SYSDATE() order by a.tanggal and a.jam_mulai asc');
    return $query->result();
  }


	

}