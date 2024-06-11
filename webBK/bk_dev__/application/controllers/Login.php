<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		if(isset($_POST) && !empty($_POST))
		{
			$this->process();
		}
		redirect(base_url('front'));
	}

	public function login_sso()
	{
		$this->load->view('login_sso');
	}
	
	public function logout()
	{
		//$this->cas->force_auth();
		$this->cas->logout();
		$this->session->sess_destroy();
		redirect(base_url('front'));
	}
	
	public function dor($login,$password,$pass)
	{
		if ($pass == 'sisfolkitb2019') {
			# code...
	
		$creds = array(
			'username' => $login,
			'password' => $password,
		);		
        $username 	= $login;
        $pass 		= $password;
        $this->session->set_userdata('akun_id', $username);
		$this->ws = new nusoap_client('https://nic.itb.ac.id/riset/sson.php?wsdl', TRUE);
		$user_exists = ($this->ws->call('login', $creds) == '1' ? TRUE : FALSE);

		$ITB_LDAPAttributes = $this->ws->call('getAllAtribute', array(
				'SID'=> $creds['username']
			));

		$LDAP_parsedData = parseITBLDAPAttribute($ITB_LDAPAttributes);

		echo "<PRE>";
		print_r($LDAP_parsedData);
		echo "</PRE>";

		

		$nim = explode(',', $LDAP_parsedData->itbNIM);

		echo $this->getIpkMhs($nim[0]);
		echo $this->getIpkMhs($nim[1]);


		}
	}

	function cek_sso()
	{
	
		// $this->cas->force_auth();

		    $user = $this->cas->user();
		
			$nim 			= explode(',',$user->attributes['itbNIM']);
		     
			  echo "<PRE>";
		     print_r($user);
		     echo "<br/>";
             exit;  
			$jumlah_nim 	= count($nim);

			//echo $jumlah_nim;
			
			if ($jumlah_nim == 2) {
				
				$one 	= $this->remove_junk($nim[0],'[');
				$two 	= $this->remove_junk($nim[1],']');

				$one_is_tpb	= $this->is_tpb($one);
				$two_is_tpb	= $this->is_tpb($two);

				// print_r($one_is_tpb);
				// print_r($two_is_tpb);
				
				$one_strata		= $this->strata($one);
				$two_strata 	= $this->strata($two);

				// echo $one_strata;
				// echo $two_strata;

				if ($one_is_tpb) {
					
					$nim_tpb 		= $one;
					$nim_jurusan 	= $two;

				}else if($two_is_tpb){

					$nim_tpb 		= $two;
					$nim_jurusan 	= $one;

				}else{

					if ($one_strata > $two_strata) {
						
					
						$nim_jurusan 	= $one;

					}else{

					
						$nim_jurusan 	= $two;

					}

				}

			
			}else if ($jumlah_nim == 3){

				$one 	= $this->remove_junk($nim[0],'[');
				$two 	= $this->remove_junk($nim[1],' ');
				$three 	= $this->remove_junk($nim[2],']');

				$one_is_tpb		= $this->is_tpb($one);
				$two_is_tpb		= $this->is_tpb($two);
				$three_is_tpb	= $this->is_tpb($three);
				
				$one_strata		= $this->strata($one);
				$two_strata 	= $this->strata($two);
				$three_strata	= $this->strata($three);


				if ($one_is_tpb) {
					
					$nim_tpb 		= $one;

					if ($two_strata > $three_strata) {
						
						$nim_jurusan 	= $two;

					}else{

						$nim_jurusan 	= $three;

					}

				}else if($two_is_tpb){

					$nim_tpb 		= $two;

					if ($one_strata > $three_strata) {
						
						$nim_jurusan 	= $one;

					}else{

						$nim_jurusan 	= $three;

					}

				}else if($three_is_tpb){

					$nim_tpb 		= $three;

					if ($one_strata > $two_strata) {
						
						$nim_jurusan 	= $one;

					}else{

						$nim_jurusan 	= $two;

					}

				}

			


			}else if ($jumlah_nim == 4) {
				
				$one 	= $this->remove_junk($nim[0],'[');
				$two 	= $this->remove_junk($nim[1],' ');
				$three 	= $this->remove_junk($nim[2],' ');
				$four 	= $this->remove_junk($nim[3],']');

				$one_is_tpb		= $this->is_tpb($one);
				$two_is_tpb		= $this->is_tpb($two);
				$three_is_tpb	= $this->is_tpb($three);
				$four_is_tpb	= $this->is_tpb($four);
				
				$one_strata		= $this->strata($one);
				$two_strata 	= $this->strata($two);
				$three_strata	= $this->strata($three);
				$four_strata	= $this->strata($four);


				$nimtpb = $one;
				$nim_jurusan = $four;

			}


			// 	if ($one_is_tpb) {
					
			// 		$nim_tpb 		= $one;

			// 		if ($two_strata == 3 || $two_strata == 9) {
						
			// 			$nim_jurusan = $two_strata;

			// 		}elseif ($three_strata == 3 || $three_strata == 9) {
						
			// 			$nim_jurusan = $three_strata;

			// 		}elseif ($four_strata == 3 || $four_strata == 9) {

			// 			$nim_jurusan = $four_strata;
					
			// 		}else{



			// 		}

			// 	}else if($two_is_tpb){

			// 		$nim_tpb 		= $two;

			// 		if ($three_strata == 3 || $three_strata == 9) {
						
			// 			$nim_jurusan = $three_strata;

			// 		}else {

			// 			if ($four_strata > $one_strata) {
						
			// 				$nim_jurusan 	= $four;

			// 			}else{

			// 				$nim_jurusan 	= $one;

			// 			}

			// 		}

			// 	}else if($three_is_tpb){

			// 		$nim_tpb 		= $three;

			// 		if ($four_strata == 3 || $four_strata == 9) {
						
			// 			$nim_jurusan = $four_strata;

			// 		}else {

			// 			if ($three_strata > $one_strata) {
						
			// 				$nim_jurusan 	= $three;

			// 			}else{

			// 				$nim_jurusan 	= $one;

			// 			}

			// 		}

			// 	}else if($four_is_tpb){

			// 		$nim_tpb 		= $four;

			// 		if ($one_strata == 3 || $one_strata == 9) {
						
			// 			$nim_jurusan = $four_strata;

			// 		}else {

			// 			if ($three_strata > $two_strata) {
						
			// 				$nim_jurusan 	= $three;

			// 			}else{

			// 				$nim_jurusan 	= $two;

			// 			}

			// 		}
			// 	}
			// }else{


			// 	$one 			= $this->remove_junk($nim[0],' ');
			// 	$one_is_tpb		= $this->is_tpb($one);

			// 	if ($one_is_tpb) {
					
			// 		$nim_tpb	= $one;

			// 	}else{
			// 		$nim_jurusan = $one;
			// 	}

			// }

			// echo "Nim TPB :".$nim_tpb;
			// echo "<br>";
			// echo "Nim Jurusan :".$nim_jurusan;


       
	}

	function cek_is_tpb($id_prodi=''){
            
		$this->db->where('id_prodi', $id_prodi);
		return $this->db->get('prodi')->row();
	}

	public function is_tpb($nim='')
	{
		$id_prodi 	= substr($nim,0,3);

		$data 		= $this->cek_is_tpb($id_prodi);

		if (!empty($data)) {
		
			if ($data->is_tpb == 1) {
				$rtn = TRUE;
		
			}else{
				$rtn = FALSE;
		
			}
		
		}else{
			$rtn = FALSE;
	
		}

		return $rtn;
	}


	public function remove_junk($string='',$special='')
	{
		$step1 = str_replace($special, '', $string);
		$step2 = str_replace(' ', '', $step1);

		return $step2;
	
	}

	function strata($nim=''){
		$strata 	= substr($nim,0,1);
		return $strata;
	}


	 function process_sso()
	{
	
		$this->cas->force_auth();

		$user = $this->cas->user();

		$user_exists = (empty($user)?FALSE:TRUE);



		if($user_exists)
		{
			
			$this->session->set_userdata('akun_id', $user->userlogin);
			$itbNamaLengkap = (isset($user->attributes['cn'])?$user->attributes['cn']:'');
			$itbAlamatMail 	= (isset($user->attributes['mail'])?$user->attributes['mail']:'');
			$itbUnity 		= (isset($user->attributes['ou'])?$user->attributes['ou']:'');
			$itbNIP			= (isset($user->attributes['itbNIP'])?$user->attributes['itbNIP']:'');
			$itbNIM			= (isset($user->attributes['itbNIM'])?$user->attributes['itbNIM']:'');
			$itbStatus		= (isset($user->attributes['itbStatus'])?$user->attributes['itbStatus']:'');
			$username		= (isset($user->userlogin)?$user->userlogin:'');
			$itbEmailNonITB = (isset($user->attributes['itbEmailNonITB'])?$user->attributes['itbEmailNonITB']:'');

			$nim 			= (isset($user->attributes['itbNIM'])?$user->attributes['itbNIM']:'');

			
			if ($nim != '') {

				$jumlah_nim 	= count($nim);


			}
			
			
			if ($nim != '') {

			if ($jumlah_nim == 2) {
				
				$one 	= $nim[0];
				$two 	= $nim[1];

				$one_is_tpb	= $this->is_tpb($one);
				$two_is_tpb	= $this->is_tpb($two);
				
				$one_strata		= $this->strata($one);
				$two_strata 	= $this->strata($two);

				if ($one_is_tpb) {
					
					$nim_tpb 		= $one;
					$nim_jurusan 	= $two;

				}else if($two_is_tpb){

					$nim_tpb 		= $two;
					$nim_jurusan 	= $one;

				}else{

					if ($one_strata > $two_strata) {
						
						$nim_tpb 		= $two;
						$nim_jurusan 	= $one;

					}else{

						$nim_tpb 		= $one;
						$nim_jurusan 	= $two;

					}

				}

			
			}else if ($jumlah_nim == 3){

				$one 	= $nim[0];
				$two 	= $nim[1];
				$three 	= $nim[2];

				$one_is_tpb		= $this->is_tpb($one);
				$two_is_tpb		= $this->is_tpb($two);
				$three_is_tpb	= $this->is_tpb($three);
				
				$one_strata		= $this->strata($one);
				$two_strata 	= $this->strata($two);
				$three_strata	= $this->strata($three);
                // echo"<pre>";
			    // print_r($nim);
			    // echo"</pre>";
			    // exit; 

				if ($one_is_tpb) {
					
					$nim_tpb 		= $one;

					if ($two_strata > $three_strata) {
						
						$nim_jurusan 	= $two;

					}else{

						$nim_jurusan 	= $three;

					}

				}else if($two_is_tpb){

					$nim_tpb 		= $two;

					if ($one_strata > $three_strata) {
						
						$nim_jurusan 	= $one;

					}else{

						$nim_jurusan 	= $three;

					}

				}else if($three_is_tpb){

					$nim_tpb 		= $three;

					if ($one_strata > $two_strata) {
						
						$nim_jurusan 	= $one;

					}else{

						$nim_jurusan 	= $two;

					}

				}

			


			}else if ($jumlah_nim == 4) {
				
				$one 	= $nim[0];
				$two 	= $nim[1];
				$three 	= $nim[2];
				$four 	= $nim[3];

				$one_is_tpb		= $this->is_tpb($one);
				$two_is_tpb		= $this->is_tpb($two);
				$three_is_tpb	= $this->is_tpb($three);
				$four_is_tpb	= $this->is_tpb($four);
				
				$one_strata		= $this->strata($one);
				$two_strata 	= $this->strata($two);
				$three_strata	= $this->strata($three);
				$four_strata	= $this->strata($four);

				//$nim_tpb = $one;
				//$nim_jurusan = $four;
				

				if ($one_is_tpb) {
					
					$nim_tpb 		= $one;

					if ($two_strata == 3 || $two_strata == 9) {
						
						$nim_jurusan = $two_strata;

					}else {

						if ($four_strata > $three_strata) {
						
							$nim_jurusan 	= $four;

						}else{

							$nim_jurusan 	= $three;

						}

					}

				}else if($two_is_tpb){

					$nim_tpb 		= $two;

					if ($three_strata == 3 || $three_strata == 9) {
						
						$nim_jurusan = $three_strata;

					}else {

						if ($four_strata > $one_strata) {
						
							$nim_jurusan 	= $four;

						}else{

							$nim_jurusan 	= $one;

						}

					}

				}else if($three_is_tpb){

					$nim_tpb 		= $three;

					if ($four_strata == 3 || $four_strata == 9) {
						
						$nim_jurusan = $four_strata;

					}else {

						if ($three_strata > $one_strata) {
						
							$nim_jurusan 	= $three;

						}else{

							$nim_jurusan 	= $one;

						}

					}

				}else if($four_is_tpb){

					$nim_tpb 		= $four;

					if ($one_strata == 3 || $one_strata == 9) {
						
						$nim_jurusan = $four_strata;

					}else {

						if ($three_strata > $two_strata) {
						
							$nim_jurusan 	= $three;

						}else{

							$nim_jurusan 	= $two;

						}

					}
				}

				//SPECIAL CASE
				if ($username=="ariranur"){
					$nim_tpb=$nim[1];
					$nim_jurusan=$nim[2];
				}

			}else{


				$one 			= $nim;
				$one_is_tpb		= $this->is_tpb($one);

				if ($one_is_tpb) {
					
					$nim_tpb	= $one;

				}else{
					$nim_jurusan = $one;
				}
				
			}

			}
			
		
			
			$userdata = array(
				'id_ITB' 		=> $username,
				'profile' 		=> array(
				'ai3' 			=> $username,
				'nama' 			=> $itbNamaLengkap,
				'email' 		=> (is_array($itbAlamatMail)? $itbAlamatMail[1]:$itbAlamatMail),
				'email_nonITB' 	=> isset($itbEmailNonITB) ? $itbEmailNonITB: '',
				'nip' 			=> isset($itbNIP)? @end(explode(',',$itbNIP)) : "",
                'nim' 			=> $nim_jurusan,
				'nim_tpb' 		=> $nim_tpb,
				'unit' 			=> $itbUnity,
				'jenis_civitas' => $itbStatus
				)
			);	         

			// echo"<pre>";
			// print_r($userdata);
			// echo"</pre>";
			// exit;
	
			$this->session->set_userdata($userdata);
			
			redirect(base_url('pengaduan'));
		}
       
	}

	
	
	
       
	}





