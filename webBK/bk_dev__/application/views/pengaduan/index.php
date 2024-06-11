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

    <title>Pengaduan & Feedback</title>

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
       <h3 class="blue" style="color:white;margin-left:10px"><img class="responsive" width="30px" height="30px" src="https://kemahasiswaan.itb.ac.id/images/itb.png">&nbsp;Pilihan Menu</h3>
       <div class="pull-right"><a href="<?php echo base_url('Login/logout');?>"><font size="4"><i style="left:100px" class="fas fa-sign-out-alt">Logout</font></a></i></div>
    </div>
      <?php $message = $this->session->flashdata("status_berhasil"); ?>
                                <?=isset($message)?' <div class="alert alert-success">
                                                        <span><b> Sukses - </b> '.$message.'</span>
                                                    </div>':''; ?>
                                <?php $pesan = $this->session->flashdata("status_gagal"); ?>
                                <?=isset($pesan)?' <div class="alert alert-danger">
                                                        <span><b> Gagal - </b> '.$pesan.'</span>
                                                    </div>':''; ?>
	<div class="container">
		<div class="panel panel-default">
		  <div class="panel-body" style="margin:10px">
          <table style="width:100%">
              <tbody>
                  <tr>
                      <td onclick="location.href = '<?php echo base_url('Pengaduan/mahasiswa_bermasalah');?>';" href="<?php echo base_url('Pengaduan/mahasiswa_bermasalah');?>" class="btn-warning" aria-haspopup="true" aria-expanded="false" style="width:50%;height:350px;text-align:center;padding:10px 0 10px 0;cursor:pointer">
                          <font size="6">Laporkan Mahasiswa</font> <br> <font size="8"><i class="fas fa-sad-tear"></i></font>
                      </td>
                      <td onclick="location.href = '<?php echo base_url('Pengaduan/feedback_institusi');?>';" class="btn-success" ng-click="Proceed()" aria-haspopup="true" aria-expanded="false" style="width:50%;height:350px;text-align:center;padding:10px 0 10px 0;cursor:pointer">
                          <font size="6">Feedback Untuk Institusi BK</font> <br>  <font size="8"><i class="fas fa-comments"></i></font>
                      </td>
                  </tr>
              </tbody>
          </table>
		  </div>
		  <div class="panel-footer">
		  	<center> <small><b>&copy; Direktorat Kemahasiswaan Institut Teknologi Bandung</b></small></center>
		  </div>
		</div>
	</div>

  <script src="https://kemahasiswaan.itb.ac.id/assets/dashboard/js/bootstrap.min.js"></script>
</body>
</html>