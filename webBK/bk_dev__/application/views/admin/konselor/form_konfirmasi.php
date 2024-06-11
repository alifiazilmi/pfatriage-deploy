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

    <title>Konfirmasi Permohonan Konseling</title>

    <!-- Bootstrap core CSS -->
    <link href="https://kemahasiswaan.itb.ac.id/assets/dashboard/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="https://kemahasiswaan.itb.ac.id/assets/dashboard/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="https://kemahasiswaan.itb.ac.id/assets/dashboard/css/font-awesome.min.css">

    <link href="https://kemahasiswaan.itb.ac.id/assets/dashboard/css/carousel.css" rel="stylesheet">
    <link href="https://kemahasiswaan.itb.ac.id/assets/dashboard/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet"> 
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
           <h3 class="blue" style="color:white;margin-left:10px"><img class="responsive" width="30px" height="30px" src="https://kemahasiswaan.itb.ac.id/images/itb.png">&nbsp;Konfirmasi Permohonan Konseling</h3>
     </div>
     <?php $message = $this->session->flashdata("sukses"); ?>
          <?=isset($message)?'<div class="alert alert-success alert-dismissible">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
          <h4><i class="icon fa fa-check"></i> Sukses!</h4>'.$message.'</div>':''; ?>
          <?php $pesan = $this->session->flashdata("gagal"); ?>
          <?=isset($pesan)?'<div class="alert alert-danger alert-dismissible">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
          <h4><i class="icon fa fa-check"></i> Gagal!</h4>'.$pesan.'</div>':''; ?>
	<div class="container">
		
		<div class="panel panel-default">
		  <div class="panel-body" style="margin:10px">
            <br>
		  	<form class="form-horizontal">
              <div class="table-responsive">
                                            <table id="demo-dt-basic" class="table table-striped table-bordered" style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 5%;">No</th>
                                                        <th class="hidden-xs" style="width: 10%">Aksi</th>
                                                        <th class="min-tablet" style="width: 25%;">Jadwal</th>
                                                        <th>Nama</th>
                                                        <th>Venue</th>
                                                        <th>No Whatsapp</th>
                                                        <th>Email</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (!empty($permohonan_konseling)) { ?>
                                                    <?php $i=0; foreach($permohonan_konseling as $fetch) { $i++?>
                                                    <tr>
                                                        <td style="text-align: center;"><?php echo $i;?></td>

                                                        <td >
                                                            <button type="button" data-toggle="modal" data-target="#myModal<?php echo $i;?>" class="btn btn-success btn-labeled fa fa-check">Konfirmasi</button> <br><br>
                                                            <a href="<?= base_url('konfirmasi/tolak_permohonan_konseling/'.$fetch->id_konseling) ?>" onclick="return confirm('Anda Yakin Tolak Permohonan Ini?')" class="btn btn-danger btn-labeled fa fa-times">Tolak Permohonan</a>
                                                        </td>
                                                        <td> <span class="text-semibold"><?php $tanggal_diajukan=$fetch->tanggal_diajukan; echo date("d-m-Y",strtotime($tanggal_diajukan));?></span>
                                                            <br>
                                                        <small class="text-muted"><?php echo $fetch->jam_diajukan?></small></td>
                                                        <td> 
                                                                <span class="text-semibold"><?php echo $fetch->display_name;?> / <?php if(!empty($fetch->nim)){echo $fetch->nim;}else{echo $fetch->nim_tpb;}?></span><br>
                                                                <span class="text-semibold"><?php  $result=$this->KonselorModel->service_ditdik($fetch->user_id); if(!empty($result[0]->no_hp)){ echo  $result[0]->no_hp;}else{echo"No HP Tidak Tersedia";}?> / <?php  $result=$this->KonselorModel->service_ditdik($fetch->user_id); if(!empty($result[0]->email)){ echo  $result[0]->email;}else{echo"Email Tidak Tersedia";}?></span><br>
                                                                <small class="text-muted"><div class="label label-table label-warning">Scheduled</div></small>
                                                        </td>
                                                        <td><?php echo $fetch->venue;?></td>
                                                        <td><?php if ($fetch->no_hp!=""){ echo $fetch->no_hp;}else {echo"-";}?></td>
                                                        <td><?php if ($fetch->email!=""){ echo $fetch->email;}else {echo"-";}?></td>
                                                    </tr>
                                                    <?php } ?>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
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
<!-- MODAL -->
<?php if (!empty($permohonan_konseling)) { ?>
               <?php $i=0; foreach($permohonan_konseling as $fetch) { $i++?>
                                            <!-- Modal -->
                        <div id="myModal<?php echo $i;?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Konfirmasi Konseling</h4>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="<?php echo base_url('Konfirmasi/konfirmasi_konseling/'.$fetch->id_konseling);?>">
                                    <div class="form-group">
                                    <label for="sel1">Pilihan Konsultasi:</label>
                                    <select onchange="show_media_konsul<?php echo $i;?>();" class="form-control" name="venue" id="sel<?php echo $i;?>">
                                        <option value="">--PILIH KONSULTASI--</option>
                                        <option value="Online">Online</option>
                                        <option value="Offline">Offline</option>
                                    </select>
                                    </div>

                                    <div style="display:none;" id="offline<?php echo $i;?>" class="form-group">
                                        <label for="usr">Nama Tempat:</label>
                                        <input type="text" class="form-control" name="media_konsultasi_offline">
                                    </div>

                                    <div style="display:none;"  id="online<?php echo $i;?>" class="form-group">
                                        <label for="usr">Masukkan No Whatsapp/Link Zoom/Google Meet:</label>
                                        <input type="text" class="form-control" name="media_konsultasi_online">
                                    </div>

                                    <button type="submit" onclick="return confirm('Anda Yakin Ingin Konfirmasi Konseling Ini ?');" class="btn btn-md btn-success">Simpan</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                            </div>

                        </div>
                        </div>
                        <script>
                          function show_media_konsul<?php echo $i;?>(){
                                var select=document.getElementById("sel<?php echo $i;?>");
                                if(select.options[select.selectedIndex].value=="Online"){
                                      document.getElementById("online<?php echo $i;?>").style.display = "block";
                                      document.getElementById("offline<?php echo $i;?>").style.display = "none";
                                } else {
                                      document.getElementById("online<?php echo $i;?>").style.display = "none";
                                      document.getElementById("offline<?php echo $i;?>").style.display = "block";

                                }
                          }

                        </script>
               <?php } ?>
               <?php } ?>

</html>