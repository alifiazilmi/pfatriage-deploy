<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="SHORCUT ICON" href="https://kemahasiswaan.itb.ac.id/assets/img/icon.png">

    <title>Pengaduan Mahasiswa</title>

    <!-- Bootstrap core CSS -->
    <link href="https://kemahasiswaan.itb.ac.id/assets/dashboard/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="https://kemahasiswaan.itb.ac.id/assets/dashboard/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="https://kemahasiswaan.itb.ac.id/assets/dashboard/css/font-awesome.min.css">

    <link href="https://kemahasiswaan.itb.ac.id/assets/dashboard/css/carousel.css" rel="stylesheet">
    <link href="https://kemahasiswaan.itb.ac.id/assets/dashboard/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="https://kemahasiswaan.itb.ac.id/assets/dashboard/js/ie-emulation-modes-warning.js'"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style type="text/css">
    		.jumbotron{
    			 background:#0F466E;
			     background:-webkit-linear-gradient(right,#0F466E 0%,#5093C4 50%);
			     background:-moz-linear-gradient(right,#0F466E 0%,#5093C4 50%);
			     background:-o-linear-gradient(right,#0F466E 0%,#5093C4 50%);
			     background:-ms-linear-gradient(right,#0F466E 0%,#5093C4 50%);

    		}
			.responsive {
				  width: 100%;
				  height: auto;
				  width: auto;
           }
    </style>
</head>
<body>
	 <div class="jumbotron">
       <h3 class="blue" style="color:white;margin-left:10px"><img class="responsive" width="30px" height="30px" src="https://kemahasiswaan.itb.ac.id/images/itb.png">&nbsp;Pengaduan Mahasiswa</h3>
       <div class="pull-right"><a href="<?php echo base_url('Login/logout');?>"><font size="4"><i style="left:100px" class="fas fa-sign-out-alt">Logout</font></a></i></div>
    </div>
      <?php $message = $this->session->flashdata("status"); ?>
                                <?=isset($message)?' <div class="alert alert-success">
                                                        <span><b> Sukses - </b> '.$message.'</span>
                                                    </div>':''; ?>
                                <?php $pesan = $this->session->flashdata("warning"); ?>
                                <?=isset($pesan)?' <div class="alert alert-danger">
                                                        <span><b> Gagal - </b> '.$pesan.'</span>
                                                    </div>':''; ?>
	<div class="container">
		<div class="panel panel-default">
		  <div class="panel-body" style="margin:10px">
		  <div class="pull-right"><button onclick="window.history.back();" class="btn btn-md btn-warning"><i class="fas fa-arrow-left"></i> Kembali</button></div>
          <br>
		  <br>
		  	<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?= base_url('Pengaduan/proc_add_mahasiswa_bermasalah') ?>">
				  <div class="form-group">
				    <label for="exampleInputEmail1">NIM</label>
				    <input name="nim" type="text" oninput="cek_input();" id="nim" class="form-control" required>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Nama</label>
				    <input name="nama" type="text" id="nama" readonly class="form-control" required>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">No HP</label>
					<input name="no_hp" type="text" id="no_hp" readonly class="form-control" required>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Email</label>
				    <input name="email" id="email" type="text" readonly class="form-control" required>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Fakultas</label>
				    <input name="fakultas" type="text" id="fakultas" readonly class="form-control" required>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Prodi</label>
				    <input name="prodi" id="prodi" type="text" readonly class="form-control" required>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Jenjang</label>
				    <input name="jenjang" id="jenjang" type="text" readonly class="form-control" required>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Deskripsi</label>
				    <textarea rows="6" name="keterangan_masalah" class="form-control" required></textarea>
				  </div>
				  <hr>
				  <div class="form-group">
				  <button onclick="return confirm('Anda Yakin Submit ?');" type="submit" class="btn btn-info">Simpan</button>
				  </div>
			</form>
		  </div>
		  <div class="panel-footer">
		  	<center> <small><b>&copy; Direktorat Kemahasiswaan Institut Teknologi Bandung</b></small></center>
		  </div>
		</div>
	</div>

  <script src="https://kemahasiswaan.itb.ac.id/assets/dashboard/js/bootstrap.min.js"></script>
</body>
<script>
$( document ).ready(function() {
    
});

    function cek_input(){
		var nim = $('#nim').val().length;
		if(nim==8){
			get_detail_mahasiswa(); 
		}
	}
	function get_detail_mahasiswa() {
				$.ajax({
							type: "POST",
							url: "<?= base_url('pengaduan/get_data_mahasiswa')?>",
							dataType:'json',
							data: {nim: $( "#nim" ).val()},
							cache: false,
							beforeSend: function(){
								//showLoading();
							},
							complete: function(){
							//  $('#image2').hide();
							},
							success:function(data){
								console.log(data);
								if (data[0].nama==null){
									//var obj = $.parseJSON(data);
									//alert(obj.notfound);
									data_mahasiswa_tdkada();
									$("#nama").val("");
									$("#no_hp").val("");
									$("#email").val("");
									$("#fakultas").val("");
									$("#prodi").val("");
									$("#jenjang").val("");
								} else {
									$("#nama").val(data[0].nama);
									$("#no_hp").val(data[0].no_hp);
									$("#email").val(data[0].email);
									$("#fakultas").val(data[0].fakultas);
									$("#prodi").val(data[0].prodi);
									$("#jenjang").val(data[0].jenjang);
								}
							}
						});      
	}

	function data_mahasiswa_tdkada(){
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Data Mahasiswa Tidak Ditemukan !',
			//footer: '<a href>Why do I have this issue?</a>'
		});
   }



</script>
</html>