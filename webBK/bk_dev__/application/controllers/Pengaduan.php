<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan extends CI_Controller 
{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('M_form_pengaduan');
            if (!$this->session->userdata('akun_id'))
            {
                redirect("https://kemahasiswaan.itb.ac.id/bk");
            }
        }

        public function index(){
            // echo"<pre>";
            // print_r($this->session->all_userdata());
            // echo"</pre>";
            // exit;
           $this->load->view('pengaduan/index');
        }

        // Mahasiswa Bermasalah
        public function mahasiswa_bermasalah(){
            $this->load->view('pengaduan/mahasiswa_bermasalah'); 
        }

        public function proc_add_mahasiswa_bermasalah(){
            // echo"<pre>";
            // print_r($this->session->all_userdata());
            // echo"</pre>";
            // exit;
            $data['nim']=$_POST['nim'];
            $data['nama']=$_POST['nama'];
            $data['no_hp']=$_POST['no_hp'];
            $data['email']=$_POST['email'];
            $data['fakultas']=$_POST['fakultas'];
            $data['prodi']=$_POST['prodi'];
            $data['jenjang']=$_POST['jenjang'];
            $data['keterangan_masalah']=$_POST['keterangan_masalah'];
            if(!empty($this->session->userdata('profile')['nip'])){
                $data['created_by_nip_nim']=$this->session->userdata('profile')['nip'];
            } else{
                if(!empty($this->session->userdata('profile')['nim'])){
                    $data['created_by_nip_nim']=$this->session->userdata('profile')['nim'];
                } else {
                    $data['created_by_nip_nim']=$this->session->userdata('profile')['nim_tpb'];
                }
            }
            $data['created_by_nama']=$this->session->userdata('profile')['nama'];
            $data['created_by_unit']=$this->session->userdata('profile')['unit'];
            $data['created_by_jeniscivitas']=$this->session->userdata('profile')['jenis_civitas'];
            $data['created_by_email']=$this->session->userdata('profile')['email'];

            $retval=$this->M_form_pengaduan->simpanData('bk_form_pengaduan_mhs_bermasalah',$data);

            if($retval>0){
              $this->session->set_flashdata('status_berhasil','Pengaduan Anda Berhasil Disimpan dan Akan Segera Ditindak Lanjuti');
              redirect(base_url().'Pengaduan/index');
            } else {
              $this->session->set_flashdata('status_gagal','Pengaduan Anda Gagal Disimpan !');
              redirect(base_url().'Pengaduan/index');
            }

        }

        //feedback Institusi
        public function feedback_institusi(){
            $this->load->view('pengaduan/feedback_institusi'); 
        }

        public function proc_add_feedback_institusi(){
            $data['q1']=$_POST['q1'];
            $data['q2']=$_POST['q2'];
            $data['kesan_pesan']=$_POST['kesan_pesan'];
            if(!empty($this->session->userdata('profile')['nip'])){
                $data['created_by_nip_nim']=$this->session->userdata('profile')['nip'];
            } else{
                if(!empty($this->session->userdata('profile')['nim'])){
                    $data['created_by_nip_nim']=$this->session->userdata('profile')['nim'];
                } else {
                    $data['created_by_nip_nim']=$this->session->userdata('profile')['nim_tpb'];
                }
            }
            $data['created_by_nama']=$this->session->userdata('profile')['nama'];
            $data['created_by_unit']=$this->session->userdata('profile')['unit'];
            $data['created_by_jeniscivitas']=$this->session->userdata('profile')['jenis_civitas'];

            $retval=$this->M_form_pengaduan->simpanData('bk_form_pengaduan_feedback_institusi',$data);

            if($retval>0){
              $this->session->set_flashdata('status_berhasil','Feedback Anda Berhasil Disimpan, Terima Kasih Atas Masukannya.');
              redirect(base_url().'Pengaduan/index');
            } else {
              $this->session->set_flashdata('status_gagal','Feedback Gagal Disimpan !');
              redirect(base_url().'Pengaduan/index');
            }

        }

         //ambil data mahasiswa dari service dirdik
        public function service_dirdik($nim){
           
                        $res=null;
    
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

	
}





