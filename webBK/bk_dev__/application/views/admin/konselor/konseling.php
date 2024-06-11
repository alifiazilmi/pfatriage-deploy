  <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <div class="pageheader hidden-xs">
                        <h3><i class="fa fa-home"></i>Konseling </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li class="active"> Konseling </li>
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
                                <li class="active"><a href="#akan_konsul" data-toggle="tab">Akan Konsultasi</a></li>
                                <li><a href="#sdh_konsul" data-toggle="tab">Sudah Konsultasi</a></li>
                             </ul>

                        <!-- Basic Data Tables -->
                        <!--===================================================-->
                        <div class="tab-content">
                            <div class="tab-pane active" id="akan_konsul">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Akan Konseling</h3>
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
                                                    <?php if (!empty($pengajuan_konseling)) { ?>
                                                    <?php $i=0; foreach($pengajuan_konseling as $fetch) { $i++?>
                                                    <tr>
                                                        <td style="text-align: center;"><?php echo $i;?></td>

                                                        <td ><a href="<?= base_url('konselor/detail_akan_konsul/'.$fetch->id_konseling) ?>" class="btn btn-success btn-labeled fa fa-search">Tinjau</a></td>
                                                        <td> <span class="text-semibold"><?php $tanggal_disetujui=$fetch->tanggal_disetujui; echo date("d-m-Y",strtotime($tanggal_disetujui));?></span>
                                                            <br>
                                                        <small class="text-muted"><?php echo $fetch->jam_disetujui?></small></td>
                                                        <td> 
                                                                <span class="text-semibold"><?php echo $fetch->display_name;?> / <?php if(!empty($fetch->nim)){echo $fetch->nim;}else{echo $fetch->nim_tpb;}?></span><br>
                                                                <span class="text-semibold"><?php  
                                                                $result=$this->KonselorModel->service_ditdik($fetch->user_id); 
                                                                if(!empty($result[0]->no_hp))
                                                                    { echo  $result[0]->no_hp;}
                                                                else{echo"No HP Tidak Tersedia";}?> / 
                                                                <?php  $result=$this->KonselorModel->service_ditdik($fetch->user_id); 
                                                                if(!empty($result[0]->email))
                                                                    { echo  $result[0]->email;}
                                                                else{ echo"Email Tidak Tersedia";}?></span><br>
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
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="sdh_konsul">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Sudah Konseling</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                            <table id="demo-dt-basic2" class="table table-striped table-bordered" style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 5%;">No</th>
                                                        <th class="hidden-xs" style="width: 10%">Aksi</th>
                                                        <th class="min-tablet" style="width: 25%;">Jadwal</th>
                                                        <th>Nama</th>
                                                        <th>Durasi</th>
                                                        <th>Venue</th>
                                                        <th>No Whatsapp</th>
                                                        <th>Email</th>
                                                        <th>Level Kasus</th>
                                                        <th>Apakah Lengkap?</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (!empty($sdh_konseling)) { ?>
                                                    <?php $i=0; foreach($sdh_konseling as $fetch) { $i++?>
                                                        <?php if ($fetch->is_lengkap==0) { ?>
                                                            <tr style="background-color:#FF4C4C;">
                                                        <?php } else { ?>
                                                            <tr>
                                                        <?php } ?>
                                                                <td style="text-align: center;"><?php echo $i;?></td>

                                                                <td ><a href="<?= base_url('konselor/detail_sdh_konsul/'.$fetch->id_konseling) ?>" class="btn btn-success btn-labeled fa fa-search">Tinjau</a></td>
                                                                <td> <span class="text-semibold"><?php $tanggal_disetujui=$fetch->tanggal_disetujui; echo date("d-m-Y",strtotime($tanggal_disetujui));?></span>
                                                                    <br>
                                                                <small class="text-muted"><?php echo $fetch->jam_disetujui?></small></td>
                                                                <td> 
                                                                        <span class="text-semibold"><?php echo $fetch->display_name;?> / <?php if(!empty($fetch->nim)){echo $fetch->nim;}else{echo $fetch->nim_tpb;}?></span><br>
                                                                        <span class="text-semibold">
                                                                          
                                                                            <?php  $result=$this->KonselorModel->service_ditdik($fetch->user_id); 
                                                                           
                                                                             if (!empty($result)) {
                                                                                   if(!empty($result[0]->no_hp)){ 
                                                                                    echo  $result[0]->no_hp;
                                                                                    }else{ 
                                                                                        echo"No HP Tidak Tersedia"; 
                                                                                    }?> / 
                                                                             <?php } ?>
                                                                            
                                                                               


                                                                            <?php  $result=$this->KonselorModel->service_ditdik($fetch->user_id); 
                                                                            if(!empty($result[0]->email)){ echo  $result[0]->email;}else{echo"Email Tidak Tersedia";}?></span><br>
                                                                        <small class="text-muted"><div class="label label-table label-success">Done</div></small>
                                                                </td>
                                                                <td><?php echo $fetch->waktu_mulai_konseling;?> s.d <?php echo $fetch->waktu_akhir_konseling;?> Total Durasi : <?php echo $fetch->durasi_konseling;?></td>
                                                                <td><?php echo $fetch->venue;?></td>
                                                                <td><?php if ($fetch->no_hp!=""){ echo $fetch->no_hp;}else {echo"-";}?></td>
                                                                <td><?php if ($fetch->email!=""){ echo $fetch->email;}else {echo"-";}?></td>
                                                                <td><?php if ($fetch->email!=""){ echo $fetch->level_kasus;}else {echo"-";}?></td>
                                                                <td><?php if ($fetch->is_lengkap==1){ echo "Sudah Lengkap";}else {echo"Belum Lengkap";}?></td>
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
                
               

