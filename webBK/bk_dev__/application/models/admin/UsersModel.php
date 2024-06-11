<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersModel extends CI_Model {

	public function getallusers()
	{
				$this->db->join('bk_role','bk_role.id_role = bk_users.id_role');
		$data = $this->db->get('bk_users');

		return $data->result();
	}

	public function getkuesioner($id='')
	{
		$data = $this->db->query('	SELECT * FROM bk_pertanyaan
								JOIN bk_jawaban
								ON bk_pertanyaan.id_pertanyaan = bk_jawaban.id_pertanyaan
								WHERE id_konseling = '.$id);

		return $data->result();
	}

	public function getnodarurat()
	{
		$data = $this->db->query('SELECT * FROM bk_no_darurat where keterangan="no_darurat"');

		return $data->result();
	}


	public function getwedo()
	{
		$data = $this->db->query('SELECT * FROM bk_wedo WHERE id = 1');

		return $data->row();
	}

	public function getuserid($username='')
	{
		$data = $this->db->query('SELECT * FROM users WHERE username = "'.$username.'" ');

		return $data->row();
	}
	

	public function getrekapitulasi($start_date='', $end_date='')
	{
				
		$data = $this->db->query('
										SELECT 	bk_users.gelar_depan,bk_users.nama_lengkap as full_name ,bk_users.gelar_belakang, 
												COALESCE(COUNT(bk_data_konseling.id_konseling),0) as jumlah_menangani,
												SEC_TO_TIME(SUM(TIME_TO_SEC(durasi_konseling))) as jumlah_menit_menengani
										FROM `bk_data_konseling`
										JOIN default_profiles ON bk_data_konseling.user_id = default_profiles.user_id
										JOIN prodi ON default_profiles.id_prodi = prodi.id_prodi
										JOIN fakultas ON prodi.kode_fakultas = fakultas.kode_fakultas
										JOIN bk_users ON bk_data_konseling.ditangani_oleh = bk_users.id_user
										WHERE bk_data_konseling.waktu_mulai_konseling BETWEEN "'.$start_date.'" AND "'.$end_date.'"
										AND bk_users.nama_lengkap != "agung"
										AND bk_data_konseling.id_status_konseling IN (3,4,5)
										GROUP BY bk_users.id_user
								');

			return $data->result();
	
		
	}

	function getrekapkonseling($start_date='', $end_date='',$status=''){

		if ($status == 'semua') {
			$data = $this->db->query(' SELECT bk_data_konseling.*, bk_data_konseling.id_konseling, bk_data_konseling.tanggal_disetujui, 
    								DATE(bk_data_konseling.created_date) as waktu_pengajuan,  bk_users.nama_lengkap, bk_status_konseling.status,
    								default_profiles.display_name, default_profiles.nim,default_profiles.nim_tpb, prodi.prodi_jenjang, prodi.nama_prodi, fakultas.nama_fakultas,
    								id_kategori_masalah, bk_hasil_konseling.*
                                    FROM bk_data_konseling 
									JOIN default_profiles ON bk_data_konseling.user_id = default_profiles.user_id
									JOIN prodi ON default_profiles.id_prodi = prodi.id_prodi
									JOIN fakultas ON prodi.kode_fakultas = fakultas.kode_fakultas
									JOIN bk_status_konseling ON bk_status_konseling.id_status_konseling = bk_data_konseling.id_status_konseling
									LEFT JOIN bk_users ON bk_users.id_user = bk_data_konseling.ditangani_oleh
                                    LEFT JOIN bk_hasil_konseling ON bk_data_konseling.id_konseling = bk_hasil_konseling.id_konseling
									WHERE bk_users.nama_lengkap != "agung"
									AND bk_data_konseling.created_date BETWEEN "'.$start_date.'" AND "'.$end_date.'"
									ORDER BY fakultas.kode_fakultas, `bk_data_konseling`.`waktu_mulai_konseling`
								');
		}else{


			$data = $this->db->query(' SELECT bk_data_konseling.*, bk_data_konseling.id_konseling, bk_data_konseling.tanggal_disetujui, bk_status_konseling.status,
    								DATE(bk_data_konseling.created_date) as waktu_pengajuan,  bk_users.nama_lengkap,
    								default_profiles.display_name, default_profiles.nim,default_profiles.nim_tpb, prodi.prodi_jenjang, prodi.nama_prodi, fakultas.nama_fakultas,
    								id_kategori_masalah, bk_hasil_konseling.*
                                    FROM bk_data_konseling 
									JOIN default_profiles ON bk_data_konseling.user_id = default_profiles.user_id
									JOIN prodi ON default_profiles.id_prodi = prodi.id_prodi
									JOIN fakultas ON prodi.kode_fakultas = fakultas.kode_fakultas
									JOIN bk_status_konseling ON bk_status_konseling.id_status_konseling = bk_data_konseling.id_status_konseling
									LEFT JOIN bk_users ON bk_users.id_user = bk_data_konseling.ditangani_oleh
                                    LEFT JOIN bk_hasil_konseling ON bk_data_konseling.id_konseling = bk_hasil_konseling.id_konseling
									WHERE bk_data_konseling.id_status_konseling = "'.$status.'"
									AND bk_users.nama_lengkap != "agung"
									AND bk_data_konseling.created_date BETWEEN "'.$start_date.'" AND "'.$end_date.'"
									ORDER BY fakultas.kode_fakultas, `bk_data_konseling`.`waktu_mulai_konseling`
								');
		}
		
		

			return $data->result();
	}

	 public function getlistkonselingdetail($date1='', $date2='')
    {
    	$query = $this->db->query('	SELECT bk_data_konseling.id_konseling, bk_data_konseling.tanggal_disetujui, 
    								DATE(bk_data_konseling.waktu_mulai_konseling) as waktu_konseling,
    								default_profiles.display_name, default_profiles.nim,default_profiles.nim_tpb, prodi.prodi_jenjang, prodi.nama_prodi, fakultas.nama_fakultas,
    								id_kategori_masalah, bk_users.nama_lengkap, 
    								bk_hasil_konseling.alasan_konsultasi,  
    								bk_hasil_konseling.ringkasan_analisa_permasalahan,  
    								bk_hasil_konseling.catatan_observasi,
    								bk_hasil_konseling.kategori_kasus,
    								bk_hasil_konseling.kategori_kasus_lainnya,
    								bk_hasil_konseling.level_kasus
    								FROM bk_data_konseling 
									JOIN default_profiles ON bk_data_konseling.user_id = default_profiles.user_id
									JOIN prodi ON default_profiles.id_prodi = prodi.id_prodi
									JOIN fakultas ON prodi.kode_fakultas = fakultas.kode_fakultas
									JOIN bk_users ON bk_users.id_user = bk_data_konseling.ditangani_oleh
									JOIN bk_hasil_konseling ON bk_data_konseling.id_konseling = bk_hasil_konseling.id_konseling
									WHERE bk_data_konseling.id_status_konseling IN (3,4,5)
									AND bk_users.nama_lengkap != "agung"
									AND DATE(bk_data_konseling.waktu_mulai_konseling) BETWEEN "'.$date1.'" AND "'.$date2.'" 
									ORDER BY fakultas.kode_fakultas, bk_data_konseling.waktu_mulai_konseling');

    	return $query->result();
    }

    public function getlistkonselingfakultas($date1='', $date2='')
    {
									$query = $this->db->query('	SELECT fakultas.nama_fakultas, COUNT(bk_data_konseling.id_konseling) as jumlah
									FROM bk_data_konseling
									JOIN default_profiles ON bk_data_konseling.user_id = default_profiles.user_id
									JOIN prodi ON default_profiles.id_prodi = prodi.id_prodi
									JOIN fakultas ON prodi.kode_fakultas = fakultas.kode_fakultas
									JOIN bk_users ON bk_users.id_user = bk_data_konseling.ditangani_oleh
									WHERE bk_data_konseling.id_status_konseling IN (3,4,5)
									AND bk_users.nama_lengkap != "agung"
									AND DATE(bk_data_konseling.waktu_mulai_konseling) BETWEEN "'.$date1.'" AND "'.$date2.'" 
									GROUP BY fakultas.kode_fakultas');

		return $query->result();
    }

     public function getlistkonselingkonselor($date1='', $date2='')
    {
									$query = $this->db->query('	SELECT bk_users.nama_lengkap, bk_users.gelar_depan, bk_users.gelar_belakang, COUNT(bk_data_konseling.id_konseling) as jumlah
									FROM bk_data_konseling
									JOIN default_profiles ON bk_data_konseling.user_id = default_profiles.user_id
									JOIN prodi ON default_profiles.id_prodi = prodi.id_prodi
									JOIN fakultas ON prodi.kode_fakultas = fakultas.kode_fakultas
									JOIN bk_users ON bk_users.id_user = bk_data_konseling.ditangani_oleh
									WHERE bk_data_konseling.id_status_konseling IN (3,4,5)
									AND DATE(bk_data_konseling.waktu_mulai_konseling) BETWEEN "'.$date1.'" AND "'.$date2.'"  
									AND bk_users.nama_lengkap != "agung"
									GROUP BY bk_data_konseling.ditangani_oleh');

		return $query->result();
    }


	public function getfeedback()
	{
				
		$data = $this->db->query('
										SELECT bk_users.id_user,bk_users.gelar_depan, bk_users.gelar_belakang,bk_users.nama_lengkap, COUNT(bk_feedback_konselor.id_feedback_konselor) as jumlah_feeback FROM bk_users
										LEFT JOIN bk_feedback_konselor ON bk_users.id_user = bk_feedback_konselor.userid_konselor
										WHERE bk_users.id_role = 3
										AND bk_users.nama_lengkap != "agung"
										GROUP BY id_user
										ORDER BY jumlah_feeback DESC
								');

			return $data->result();
	
		
	}


	public function getemailnonitb($id='')
	{
		
			$data = $this->db->query('
										SELECT default_profiles.email_non_itb, default_profiles.display_name FROM `bk_data_konseling`
										JOIN default_profiles ON bk_data_konseling.user_id = default_profiles.user_id
										WHERE bk_data_konseling.id_konseling = "'.$id.'"
								');

			return $data->row();
	}




	public function getallpendaftaran()
	{
				
		$data = $this->db->query('
									SELECT b.nim,b.display_name,d.nama_prodi,e.nama_fakultas,f.status,a.* 
									FROM `bk_data_konseling` as a
									JOIN default_profiles as b
									ON a.user_id = b.user_id
									JOIN prodi d 
									ON b.id_prodi = d.id_prodi
									JOIN fakultas e
									ON e.kode_fakultas = d.kode_fakultas
									JOIN bk_status_konseling f 
									ON a.id_status_konseling = f.id_status_konseling
									WHERE a.id_status_konseling IN (1)
									ORDER BY a.tanggal_diajukan DESC
								');

			return $data->result();
	
		
	}

	public function getallpendaftaranterjadwal()
	{
				
		$data = $this->db->query('
									SELECT a.user_id,g.id_user,g.nama_lengkap,g.gelar_belakang, g.gelar_depan, b.nim,b.display_name,d.nama_prodi,e.nama_fakultas,f.status,a.* 
									FROM `bk_data_konseling` as a
									JOIN default_profiles as b
									ON a.user_id = b.user_id
									JOIN prodi d 
									ON b.id_prodi = d.id_prodi
									JOIN fakultas e
									ON e.kode_fakultas = d.kode_fakultas
									JOIN bk_status_konseling f 
									ON a.id_status_konseling = f.id_status_konseling
									JOIN bk_users as g
									ON g.id_user = a.ditangani_oleh
									WHERE a.id_status_konseling IN (2,5)
									AND durasi_konseling IS NULL
									ORDER BY a.created_date DESC
								');

			return $data->result();
	
		
	}

	public function getallpendaftaranrujukan()
	{
				
		$data = $this->db->query('
									SELECT g.nama_lengkap,g.gelar_belakang, g.gelar_depan, b.nim,b.display_name,d.nama_prodi,e.nama_fakultas,f.status,a.* 
									FROM `bk_data_konseling` as a
									JOIN default_profiles as b
									ON a.user_id = b.user_id
									JOIN prodi d 
									ON b.id_prodi = d.id_prodi
									JOIN fakultas e
									ON e.kode_fakultas = d.kode_fakultas
									JOIN bk_status_konseling f 
									ON a.id_status_konseling = f.id_status_konseling
									JOIN bk_users as g
									ON g.id_user = a.ditangani_oleh
									WHERE a.id_status_konseling IN (4)
									ORDER BY a.created_date DESC
								');

			return $data->result();
	
		
	}

	public function getallpendaftaranselesai()
	{
				
		$data = $this->db->query('
									SELECT g.nama_lengkap,g.gelar_belakang, g.gelar_depan, b.nim,b.display_name,d.nama_prodi,e.nama_fakultas,f.status,a.* 
									FROM `bk_data_konseling` as a
									JOIN default_profiles as b
									ON a.user_id = b.user_id
									JOIN prodi d 
									ON b.id_prodi = d.id_prodi
									JOIN fakultas e
									ON e.kode_fakultas = d.kode_fakultas
									JOIN bk_status_konseling f 
									ON a.id_status_konseling = f.id_status_konseling
									JOIN bk_users as g
									ON g.id_user = a.ditangani_oleh
									WHERE a.id_status_konseling IN (3,5)
									AND durasi_konseling IS NOT NULL
									ORDER BY a.created_date DESC
								');

			return $data->result();
	
		
	}

	public function getcountpendaftaranbystatus($id='')
	{
				
		$data = $this->db->query('
									SELECT b.nim,b.display_name,d.nama_prodi,e.nama_fakultas,f.status,a.* 
									FROM `bk_data_konseling` as a
									JOIN default_profiles as b
									ON a.user_id = b.user_id
									JOIN prodi d 
									ON b.id_prodi = d.id_prodi
									JOIN fakultas e
									ON e.kode_fakultas = d.kode_fakultas
									JOIN bk_status_konseling f 
									ON a.id_status_konseling = f.id_status_konseling
									WHERE a.id_status_konseling = '.$id.'
									ORDER BY a.created_date DESC
								');


		return $data->num_rows();
		
		
	}

	public function getcountpendaftaranbystatusselesai($id='')
	{
				
		$data = $this->db->query('
									SELECT b.nim,b.display_name,d.nama_prodi,e.nama_fakultas,f.status,a.* 
									FROM `bk_data_konseling` as a
									JOIN default_profiles as b
									ON a.user_id = b.user_id
									JOIN prodi d 
									ON b.id_prodi = d.id_prodi
									JOIN fakultas e
									ON e.kode_fakultas = d.kode_fakultas
									JOIN bk_status_konseling f 
									ON a.id_status_konseling = f.id_status_konseling
									WHERE a.id_status_konseling IN (3,5)
									AND durasi_konseling IS NOT NULL
									ORDER BY a.created_date DESC
								');


		return $data->num_rows();
		
		
	}

	public function getcountpendaftaranbyterjadwal($id='')
	{
				
		$data = $this->db->query('
									SELECT b.nim,b.display_name,d.nama_prodi,e.nama_fakultas,f.status,a.* 
									FROM `bk_data_konseling` as a
									JOIN default_profiles as b
									ON a.user_id = b.user_id
									JOIN prodi d 
									ON b.id_prodi = d.id_prodi
									JOIN fakultas e
									ON e.kode_fakultas = d.kode_fakultas
									JOIN bk_status_konseling f 
									ON a.id_status_konseling = f.id_status_konseling
									WHERE a.id_status_konseling IN (2,5)
									AND durasi_konseling IS NULL
									ORDER BY a.created_date DESC
								');


		return $data->num_rows();
		
		
	}



	public function getcountpendaftaranbystatuspendaftaran()
	{
				
		$data = $this->db->query('
									SELECT b.nim,b.display_name,d.nama_prodi,e.nama_fakultas,f.status,a.* 
									FROM `bk_data_konseling` as a
									JOIN default_profiles as b
									ON a.user_id = b.user_id
									JOIN prodi d 
									ON b.id_prodi = d.id_prodi
									JOIN fakultas e
									ON e.kode_fakultas = d.kode_fakultas
									JOIN bk_status_konseling f 
									ON a.id_status_konseling = f.id_status_konseling
									WHERE a.id_status_konseling IN (1)
									ORDER BY a.created_date DESC
								');


		return $data->num_rows();
		
		
	}

	public function getpendaftaranbyid($id='')
	{
				
		$data = $this->db->query('
									SELECT i.nama_lengkap as konselor_pilihan, b.nim, b.nim_tpb,d.prodi_jenjang,b.email_non_itb,b.telp, h.nama_lengkap as penangan, g.nama_lengkap as penjadwal, i.gelar_belakang as gelar_belakang_pilihan, h.gelar_belakang as gelar_belakang_konselor,  b.photo,b.nim,b.display_name,d.nama_prodi,e.nama_fakultas,f.status,a.* , a.no_hp, a.email
									FROM `bk_data_konseling` as a
									JOIN default_profiles as b
									ON a.user_id = b.user_id
									JOIN prodi d 
									ON b.id_prodi = d.id_prodi
									JOIN fakultas e
									ON e.kode_fakultas = d.kode_fakultas
									JOIN bk_status_konseling f 
									ON a.id_status_konseling = f.id_status_konseling
									LEFT JOIN bk_users g 
									ON a.dijadwalkan_oleh = g.id_user
									LEFT JOIN bk_users h 
									ON a.ditangani_oleh = h.id_user 
									LEFT JOIN bk_users i
									ON a.iduser_konselor_pilihan = i.id_user
									WHERE a.id_konseling = "'.$id.'"
									ORDER BY a.id_konseling DESC

								');

		return $data->row();
	}

	public function getemailpasienbyid($id='')
	{
				
		$data = $this->db->query('
									SELECT email
									FROM `bk_data_konseling`
									WHERE id_konseling = "'.$id.'"
								');

		return $data->row();
	}

	public function gethistorymedis($id='')
	{
				
		$data = $this->db->query('
									SELECT * FROM `bk_data_konseling`
									JOIN bk_hasil_konseling
									ON bk_data_konseling.id_konseling = bk_hasil_konseling.id_konseling
									JOIN bk_status_konseling 
									ON bk_status_konseling.id_status_konseling = bk_data_konseling.id_status_konseling
									JOIN default_profiles
									ON default_profiles.user_id = bk_data_konseling.user_id
									JOIN bk_users
									ON bk_data_konseling.ditangani_oleh = bk_users.id_user 
									WHERE default_profiles.user_id = "'.$id.'"
									AND bk_status_konseling.id_status_konseling = 3

								');

		return $data->result();
	}

	public function updpenjadwalan($data='',$id='')
	{
		$this->db->where('id_konseling',$id);
		$this->db->update('bk_data_konseling',$data);
		return $this->db->affected_rows();
	}

	public function updatebanner($data='',$id='')
	{
		$this->db->where('id_banner',$id);
		$this->db->update('bk_banner',$data);
		return $this->db->affected_rows();
	}

	public function updwedo($wedo='')
	{

		$this->db->where('id',1);
		$this->db->set('wedo', $wedo);
		$this->db->update('bk_wedo',$data);
		return $this->db->affected_rows();
	}

	public function updsetujui($id_konseling='',$upd='')
	{

		$this->db->where('id_konseling',$id_konseling);
		
		$this->db->update('bk_data_konseling',$upd);
		return $this->db->affected_rows();
	}

	public function updno($data='')
	{
		$this->db->update_batch('bk_no_darurat',$data, 'bk_id_no'); 
		return $this->db->affected_rows();
	}

	public function updusers($data='',$id='')
	{
		$this->db->where('id_user',$id);
		$this->db->update('bk_users',$data);
		return $this->db->affected_rows();
	}

	public function saveusers($data='')
	{
		$this->db->insert('bk_users',$data);
		return $this->db->affected_rows();
	}

	public function savependaftar($data='')
	{
		$this->db->insert('bk_data_konseling',$data);
		return $this->db->affected_rows();
	}

	public function savependaftarnew($data='')
	{
		$this->db->insert('bk_data_konseling',$data);
		return $this->db->insert_id();
	}

	public function savehasilkonseling($data='')
	{
		$this->db->insert('bk_hasil_konseling',$data);
		return $this->db->insert_id();
	}

	public function savehistokonseling($data='')
	{
		$this->db->insert('bk_history_konseling',$data);
		return $this->db->insert_id();
	}

	public function saveartikel($data='')
	{
		$this->db->insert('bk_artikel',$data);
		return $this->db->affected_rows();
	}

	public function savehistoryjadwal($data='')
	{
		$this->db->insert('bk_history_konseling',$data);
		return $this->db->affected_rows();
	}

	public function savebanner($data='')
	{
		$this->db->insert('bk_banner',$data);
		return $this->db->affected_rows();
	}

	public function savependidikan($data='')
	{
		$this->db->insert('bk_pendidikan',$data);
		return $this->db->affected_rows();
	}

	public function savepengalaman($data='')
	{
		$this->db->insert('bk_pengalaman',$data);
		return $this->db->affected_rows();
	}

	public function getallmasalah($value='')
	{
		
		$data = $this->db->get('bk_kategori_masalah');

		return $data->result();
	}

	public function savejadwal($data='')
	{
		$this->db->insert('bk_jadwal_piket',$data);
		return $this->db->affected_rows();
	}

	public function deleteusers($id_user='')
	{
		$this->db->where('id_user',$id_user);
		$this->db->delete('bk_users');
		return $this->db->affected_rows();
	}

	public function deletejadwal($id='')
	{
		$this->db->where('id_jadwal_piket',$id);
		$this->db->delete('bk_jadwal_piket');
		return $this->db->affected_rows();
	}

	public function deletependidikan($id_pendidikan='')
	{
		$this->db->where('id_pendidikan',$id_pendidikan);
		$this->db->delete('bk_pendidikan');
		return $this->db->affected_rows();
	}

	public function deletepengalaman($id_pengalaman='')
	{
		$this->db->where('id_pengalaman',$id_pengalaman);
		$this->db->delete('bk_pengalaman');
		return $this->db->affected_rows();
	}

	public function batalpengajuankonseling($id_konseling='')
	{
		$this->db->where('id_konseling',$id_konseling);
		$this->db->set('id_status_konseling', 6);
		$this->db->update('bk_data_konseling');
		return $this->db->affected_rows();
	}

	public function kosongkanjadwal($ditangani_oleh='',$user_id='',$tanggal='',$jam_mulai='')
	{

		
		$this->db->set('is_booked', 0);
		$this->db->set('booked_by', NULL);
		$this->db->where('id_user',$ditangani_oleh);
		$this->db->where('booked_by',$user_id);
		$this->db->where('tanggal',$tanggal);
		$this->db->where('jam_mulai',$jam_mulai);
		$this->db->update('bk_jadwal_piket');
		return $this->db->affected_rows();
	}

	public function bookedjadwal($user_id='',$tanggal='',$jam_mulai='')
	{

		$this->db->where('tanggal',$tanggal);
		$this->db->where('jam_mulai',$jam_mulai);
		$this->db->set('is_booked', 1);
		$this->db->set('booked_by', $user_id);
		$this->db->update('bk_jadwal_piket');
		return $this->db->affected_rows();
	}

	public function getuserbyid($id_user='')
	{
				$this->db->where('id_user',$id_user);
				$this->db->join('bk_role','bk_role.id_role = bk_users.id_role');
		$data = $this->db->get('bk_users');

		return $data->row();
	}

	public function gethasilkonselingbyid($id_konseling='')
	{
				$this->db->where('id_konseling',$id_konseling);
		$data = $this->db->get('bk_hasil_konseling');

		return $data->row();
	}


	public function getfeedbackdetail($value='')
	{
			 $data =  $this->db->query('
							SELECT bk_users.nama_lengkap,bk_users.gelar_depan,bk_users.gelar_belakang, 
							default_profiles.display_name,default_profiles.nim,default_profiles.nim_tpb, 
							bk_feedback_konselor.*
							FROM `bk_feedback_konselor`
							JOIN bk_users ON bk_feedback_konselor.userid_konselor = bk_users.id_user
							JOIN default_profiles ON default_profiles.user_id = bk_feedback_konselor.created_by
							WHERE bk_users.id_user = '.$value.'
							ORDER BY created_date DESC
						');

		return $data->result();
	}

	public function getbanner()
	{
		$this->db->order_by('id_banner','DESC');
		$this->db->where('aktif',1);
		$data = $this->db->get('bk_banner',3);


		return $data->result();
	}

	public function getbannerpengumuman()
	{

		$data = $this->db->query('SELECT * FROM bk_banner WHERE CURDATE() >= tgl_mulai and CURDATE() <= tgl_berakhir AND aktif = 1 AND id_jenis_konten = 1 AND aktif = 1 order by tgl_berakhir asc ');

		return $data->result();
	}

	public function getbannerberita()
	{

		$this->db->order_by('id_banner','DESC');
		$this->db->where('id_jenis_konten',0);
		$this->db->where('aktif',1);
		$data = $this->db->get('bk_banner');


		return $data->result();
	}

	public function getallbanner()
	{
		$this->db->order_by('id_banner','DESC');
		$data = $this->db->get('bk_banner');


		return $data->result();
	}

	public function getartikel()
	{
		$data = $this->db->get('bk_artikel');

		return $data->result();
	}

	public function getartikelbyid($id='')
	{
		$this->db->where('id_artikel',$id);
		$data = $this->db->get('bk_artikel');

		return $data->row();
	}

	public function getbannerbyid($id='')
	{
		$this->db->where('id_banner',$id);

		$data = $this->db->get('bk_banner');


		return $data->row();
	}

	public function deletebanner($id='')
	{
		$this->db->where('id_banner',$id);
		$this->db->delete('bk_banner');
		return $this->db->affected_rows();
	}

	public function deleteartikel($id='')
	{
		$this->db->where('id_artikel',$id);
		$this->db->delete('bk_artikel');
		return $this->db->affected_rows();
	}

	public function getallstaf()
	{
				$role = array(3,4);
				$this->db->where('hide',0);
				$this->db->where('is_aktif',1);
				$this->db->where_in('bk_role.id_role',$role);
				// $this->db->not_like('gelar_belakang','Mahasiswa Magister');
				$this->db->join('bk_role','bk_role.id_role = bk_users.id_role');
		$data = $this->db->get('bk_users');

		return $data->result();
	}

	public function getallstafbyid($id_staf='')
	{
				$role = array(3,4);
				$this->db->where('id_user',$id_staf);
				$this->db->where('hide',0);
				$this->db->where('is_aktif',1);
				$this->db->where_in('bk_role.id_role',$role);
				$this->db->join('bk_role','bk_role.id_role = bk_users.id_role');
		$data = $this->db->get('bk_users');

		return $data->row();
	}

	public function gethistorybyidkonseling($id_konseling='')
	{
				$this->db->where('id_konseling',$id_konseling);
				$this->db->where('status',2);
		$data = $this->db->get('bk_history_konseling');

		return $data->num_rows();
	}

	public function getallkonselor()
	{
				$this->db->where('bk_users.id_role',3);
		$data = $this->db->get('bk_users');

		return $data->result();
	}

	public function getallspesialiskonselor()
	{

		$data = $this->db->get('bk_spesialis_konselor');

		return $data->result();
	}

	public function getalljadwal($id_user='')
	{
		$this->db->order_by('id_jadwal_piket','desc');
		if ($id_user != '') {
			
			$this->db->where('bk_users.id_user',$id_user);
			$this->db->where('bk_jadwal_piket.tanggal >=',date('Y-m-d', strtotime('first day of -3 week')));

		}else{

			$this->db->where('bk_jadwal_piket.tanggal >=',date('Y-m-d', strtotime('first day of -2 week')));

		}
				
				$this->db->join('bk_users','bk_users.id_user = bk_jadwal_piket.id_user');
		$data = $this->db->get('bk_jadwal_piket');

		return $data->result();
	}

	public function getalljadwalaktif($id_user='',$tanggal = '')
	{

		if ($id_user != '' && $tanggal != '') {
			$this->db->where('bk_users.id_user',$id_user);
		}

		

		if ($id_user != '' && $tanggal == '') {
			$this->db->group_by('bk_jadwal_piket.tanggal');
			$this->db->where('bk_users.id_user',$id_user);

		}

		if ($tanggal != '') {
			
			$this->db->where('bk_jadwal_piket.tanggal',$tanggal);
			$this->db->where('bk_jadwal_piket.is_booked',0);

		}else{

			//$this->db->where('bk_jadwal_piket.tanggal >=',date('Y-m-d'));
			$this->db->where('bk_jadwal_piket.is_booked',0);

		}
				
			$this->db->join('bk_users','bk_users.id_user = bk_jadwal_piket.id_user');
			
			$data = $this->db->get('bk_jadwal_piket');
		
		return $data->result();
	}

	public function getjadwalbyid($id_user='',$tanggal='',$jam='')
	{
		$in = array(1,2);
		$this->db->where('ditangani_oleh',$id_user);
		$this->db->where('jam_diajukan',$jam);
		$this->db->where_in('id_status_konseling',$in);
		$this->db->where('tanggal_diajukan',$tanggal);
		$data = $this->db->get('bk_data_konseling');

		return $data->num_rows();
	}

	public function getpendidikanbyiduser($id_user='')
	{
		$this->db->where('bk_users.id_user',$id_user);
				$this->db->join('bk_users','bk_users.id_user = bk_pendidikan.id_user');
		$data = $this->db->get('bk_pendidikan');

		return $data->result();
	}

	public function getpengalambyiduser($id_user='')
	{
		$this->db->where('bk_users.id_user',$id_user);
				$this->db->join('bk_users','bk_users.id_user = bk_pengalaman.id_user');
		$data = $this->db->get('bk_pengalaman');

		return $data->result();
	}

	public function getroom()
	{
		$mrbs = $this->load->database('mrbs', TRUE);
		return $mrbs->get('mrbs_room')->result();

	}

	 public function getpengumuman($is_utama=0,$is_bk=0)
    {
        if($is_utama == 1 && $is_bk == 0){

            $query = $this->db->query('SELECT * FROM `cms` WHERE CURDATE() >= tanggal_awal and CURDATE() <= tanggal_akhir AND status = "Published" AND id_kategori_cms = 1 AND is_utama = 1 order by tanggal_akhir asc LIMIT 3 ');
        
        }else if($is_utama == 0 && $is_bk == 1){

            $query = $this->db->query('SELECT * FROM `cms` WHERE CURDATE() >= tanggal_awal and CURDATE() <= tanggal_akhir AND status = "Published" AND id_kategori_cms = 1 AND is_bk = 1 order by tanggal_akhir asc LIMIT 3 ');

        }else{

             $query = $this->db->query('SELECT * FROM `cms` WHERE CURDATE() >= tanggal_awal and CURDATE() <= tanggal_akhir AND status = "Published" AND id_kategori_cms = 1 order by tanggal_akhir asc');
        }
        
        // $this->db->order_by('tanggal_akhir','desc');
        return $query->result();
    }

    public function getDetBerita($id_cms)
    {
        $this->db->select('*')->from('cms as c');
        $this->db->join('admin_login a','a.id_admin=c.pengirim','left');
        $this->db->where('status','Published');
        $this->db->where('id_cms',$id_cms);

        $query = $this->db->get();
        
        return ($query->num_rows() > 0) ? $query->row() : FALSE;
    }

    public function hint($id='')
    {
        $query = $this->db->query('UPDATE cms SET hint = hint + 1 WHERE id_cms = '.$id);
        // $this->db->order_by('tanggal_akhir','desc');
    }

     public function getberita()
    {
        

         $query = $this->db->query('SELECT * FROM `cms` WHERE status = "Published" AND id_kategori_cms IN (0,5) AND is_bk = 1 order by tgl_kirim desc');
        
        return $query->result();
    
    }

    public function simpan($data = array())
	{
	
		$this->db->insert('users', $data);
	
		$query = $this->db->insert_id();

		return $query;

	}
	public function simpan_profil($data = array())
	{
		
		$this->db->insert('default_profiles', $data);
		
		$query = $this->db->insert_id();

		return $query;
	}

	public function getuseridfirst($username='')
	{
		$data = $this->db->query('SELECT * FROM users WHERE username ="'.$username.'"');

		return $data->row();
	}

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

   



}