  <!--END NAVBAR-->
  <div  class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <div class="pageheader hidden-xs">
                        <h3><i class="fa fa-home"></i>Konseling </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li class="active"> Permohonan Konseling </li>
                            </ol>
                        </div>
                    </div>
                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                       <div class="row">
                             <div class="col-md-12">
                             <?php $message_berhasil = $this->session->flashdata("status_berhasil"); ?>
                            <?=isset($message_berhasil)?'<div class="alert alert-success alert-dismissible">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                                <h4><i class="icon fa fa-check"></i> Sukses!</h4>'.$message_berhasil.'</div>':''; ?>
                            <?php $message_gagal = $this->session->flashdata("status_gagal"); ?>
                            <?=isset($message_gagal)?'<div class="alert alert-danger alert-dismissible">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                                <h4><i class="icon fa fa-check"></i> Gagal!</h4>'.$message_gagal.'</div>':''; ?>

                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#permohonan_konsul" data-toggle="tab">Konfirmasi Permohonan Konseling</a></li>
                             </ul>

                        <!-- Basic Data Tables -->
                        <!--===================================================-->
                        <div class="tab-content">
                            <div class="tab-pane active" id="permohonan_konsul">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Permohonan Konseling</h3>
                                        </div>
                                        <div class="panel-body">
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
                                                            <a href="<?= base_url('konselor/tolak_permohonan_konseling/'.$fetch->id_konseling) ?>" onclick="return confirm('Anda Yakin Tolak Permohonan Ini?')" class="btn btn-danger btn-labeled fa fa-times">Tolak Permohonan</a>
                                                        </td>
                                                        <td> <span class="text-semibold"><?php $tanggal_diajukan=$fetch->tanggal_diajukan; echo date("d-m-Y",strtotime($tanggal_diajukan));?></span>
                                                            <br>
                                                        <small class="text-muted"><?php echo $fetch->jam_diajukan?></small></td>
                                                        <td> 
                                                                <span class="text-semibold"><?php echo $fetch->display_name;?> / <?php if(!empty($fetch->nim)){echo $fetch->nim;}else{echo $fetch->nim_tpb;}?></span><br>
                                                                <span class="text-semibold"><?php  $result=$this->KonselorModel->service_ditdik($fetch->user_id); if(!empty($result[0]->no_hp)){ echo  $result[0]->no_hp;}else{echo"No HP Tidak Tersedia";}?> / <?php  $result=$this->KonselorModel->service_ditdik($fetch->user_id); if(!empty($result[0]->email)){ echo  $result[0]->email;}else{echo"Email Tidak Tersedia";}?></span><br>
                                                                <small class="text-muted"><div class="label label-table label-warning">Scheduled</div></small>
                                                        </td>
                                                        <td><?php echo $fetch->venue;?> (<?php echo ($fetch->daring_luring == 2 ? 'Luring' : 'Daring');?>)</td>
                                                        <td><?php if ($fetch->no_hp!=""){ echo $fetch->no_hp;}else {echo"-";}?></td>
                                                        <td><?php if ($fetch->email!=""){ echo $fetch->email;}else {echo"-";}?></td>
                                                    </tr>
                                                    <?php } ?>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
					</div>
				</div>
                      
                       
                    </div>
                    <!--===================================================-->
                    <!--End page content-->
                </div>
                
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
                                <form method="post" action="<?php echo base_url('Konselor/konfirmasi_konseling/'.$fetch->id_konseling);?>">
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

               

