  <!--END NAVBAR-->
  <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <div class="pageheader hidden-xs">
                        <h3><i class="fa fa-list"></i>Panel Control Konseling </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li class="active"> Riwayat Konseling </li> <br>
                            </ol>
                        </div>
                    </div>
                  

                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                    <div class="pull-right"><a href="#" onclick="close_window();" class="btn btn-danger btn-labeled fa fa-times"> Tutup</a></div><br><br>
                         <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="userWidget-1">
                                    <div class="avatar bg-info">
                                        <?php if($default_profiles->photo=="") { ?>
                                            <img class="img-responsive img-circle" src="<?= base_url('assets/admin/') ?>img/user.png" alt="avatar">
                                        <?php } else { ?>
                                          <!-- <?php $cek_foto="https://kemahasiswaan.itb.ac.id/assets/upload/".$default_profiles->nim."/".$default_profiles->photo;?> -->
                                          <?php if($default_profiles->nim!="") { ?>
                                                <img  class="img-responsive img-circle" src="https://kemahasiswaan.itb.ac.id/assets/upload/<?php echo $default_profiles->nim;?>/<?php echo $default_profiles->photo;?>" alt="avatar">
                                          <?php } else {?>
                                                <img class="img-responsive img-circle" src="https://kemahasiswaan.itb.ac.id/assets/upload/<?php echo $default_profiles->nim_tpb;?>/<?php echo $default_profiles->photo;?>" alt="avatar">
                                          <?php } ?>
                                        <?php } ?>
                                        <div class="name osLight"> <?php echo $default_profiles->display_name;?></div>
                                    </div>
                                    <div class="title">  <?php echo $default_profiles->prodi_jenjang;?>| <?php echo $default_profiles->nama_prodi;?> | <?php if(!empty($default_profiles->nim)){echo $default_profiles->nim;}else{echo $default_profiles->nim_tpb;}?> | <?php  $result=$this->KonselorModel->get_data_mhs_service($default_profiles->user_id); if(!empty($result->data->no_hp)){ echo  $result->data->no_hp;}else{echo"No HP Tidak Tersedia";}?> | <?php  $result=$this->KonselorModel->get_data_mhs_service($default_profiles->user_id); if(!empty($result->data->email)){ echo  $result->data->email;}else{echo"Email Tidak Tersedia";}?></div>
                                    <div class="address">  </div>
                                    <ul class="fullstats"></ul>
                                    <div class="clearfix"> </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-control">
                                          <!--   <button class="btn btn-default" data-click="panel-collapse"><i class="fa fa-chevron-down"></i></button> -->
                                        </div>
                                        <h3 class="panel-title"><i class="fa fa-table"> </i> Detail Konseling</h3>
                                    </div>
                                    <div class="panel-body">
                                    <?php if (isset($kategori_masalah)) {?>
                                        <p><b>Kategori Masalah: <ul><?php foreach($kategori_masalah as $fetch){?><li><?php echo $fetch->kategori_masalah;?></li><?php } ?></ul> </b></p><br>
                                    <?php } ?>
                                    <?php if (!empty($riwayat_konseling->kategori_kasus) || !empty($riwayat_konseling->kategori_kasus_lainnya)) { ?>
                                        <p><b>Kesimpulan Kategori Kasus: 
                                            <ul>
                                                <?php if(!empty($riwayat_konseling->kategori_kasus)) {
                                                 $temp=json_decode($riwayat_konseling->kategori_kasus); ?>
                                                 <?php foreach($temp as $fetch) { ?>
                                                    <li><?php echo $fetch;?></li>
                                                <?php }?>
                                                <?php } ?>
                                                <?php if (!empty($riwayat_konseling->kategori_kasus_lainnya)) { ?>
                                                    <li><?php echo $riwayat_konseling->kategori_kasus_lainnya;?></li>
                                                <?php } ?>
                                            </ul> 
                                        </b></p><br>
                                    <?php } ?>
                                    <p><b>Tanggal Konsultasi: <?php echo $data_konseling->tanggal_disetujui;?> </b></p><br>
                                    <p><b>Jam Konsultasi: <?php echo $data_konseling->jam_disetujui;?> </b></p><br>
                                    <p><b>Durasi Konseling: <?php echo $data_konseling->durasi_konseling;?> </b></p><br>
                                    <p><b>Konselor: <?php echo $konselor->gelar_depan?> <?php echo $konselor->nama_lengkap?> <?php echo $konselor->gelar_belakang;?> </b></p><br>
                                    </div>
                                </div>
                                
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-control">
                                          <!--   <button class="btn btn-default" data-click="panel-collapse"><i class="fa fa-chevron-down"></i></button> -->
                                        </div>
                                        <h3 class="panel-title"><i class="fa fa-table"> </i> Alasan Konsultasi</h3>
                                    </div>
                                    <div class="panel-body">
                                        <?php if(!empty($riwayat_konseling->alasan_konsultasi)) {echo $riwayat_konseling->alasan_konsultasi;}else{echo"Tidak Ada Data";}?>
                                    </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-control">
                                          <!--   <button class="btn btn-default" data-click="panel-collapse"><i class="fa fa-chevron-down"></i></button> -->
                                        </div>
                                        <h3 class="panel-title"><i class="fa fa-table"> </i> Ringkasan Analisa Permasalahan</h3>
                                    </div>
                                    <div class="panel-body">
                                        <?php if(!empty($riwayat_konseling->ringkasan_analisa_permasalahan)) {echo $riwayat_konseling->ringkasan_analisa_permasalahan;}else{echo"Tidak Ada Data";}?>
                                    </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-control">
                                          <!--   <button class="btn btn-default" data-click="panel-collapse"><i class="fa fa-chevron-down"></i></button> -->
                                        </div>
                                        <h3 class="panel-title"><i class="fa fa-table"> </i> Tindakan Kuratif yang Dilakukan</h3>
                                    </div>
                                    <div class="panel-body">
                                        <?php if(!empty($riwayat_konseling->tindakan_kuratif)) {echo $riwayat_konseling->tindakan_kuratif;}else{echo"Tidak Ada Data";}?>
                                    </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-control">
                                          <!--   <button class="btn btn-default" data-click="panel-collapse"><i class="fa fa-chevron-down"></i></button> -->
                                        </div>
                                        <h3 class="panel-title"><i class="fa fa-table"> </i> Rekomendasi</h3>
                                    </div>
                                    <div class="panel-body">
                                        <?php if(!empty($riwayat_konseling->rekomendasi)) {echo $riwayat_konseling->rekomendasi;}else{echo"Tidak Ada Data";}?>
                                    </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-control">
                                          <!--   <button class="btn btn-default" data-click="panel-collapse"><i class="fa fa-chevron-down"></i></button> -->
                                        </div>
                                        <h3 class="panel-title"><i class="fa fa-table"> </i> Catatan lain selama proses konseling (observasi jika ada)</h3>
                                    </div>
                                    <div class="panel-body">
                                        <?php if(!empty($riwayat_konseling->catatan_observasi)) {echo $riwayat_konseling->catatan_observasi;}else{echo"Tidak Ada Data";}?>
                                    </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-control">
                                          <!--   <button class="btn btn-default" data-click="panel-collapse"><i class="fa fa-chevron-down"></i></button> -->
                                        </div>
                                        <h3 class="panel-title"><i class="fa fa-table"> </i> Lampiran Konseling</h3>
                                    </div>
                                    <div class="panel-body">
                                        <?php if(!empty($data_konseling->lampiran_konseling)) { ?>
                                            <a target="_blank" href="<?= base_url('assets/lampiran_konseling/'.$data_konseling->lampiran_konseling);?>" class="btn btn-success btn-labeled fa fa-search">Tinjau</a>
                                        <?php } else { echo "Tidak ada"; }?>
                                    </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-control">
                                          <!--   <button class="btn btn-default" data-click="panel-collapse"><i class="fa fa-chevron-down"></i></button> -->
                                        </div>
                                        <h3 class="panel-title"><i class="fa fa-table"> </i> Resume Konseling</h3>
                                    </div>
                                    <div class="panel-body">
                                        <?php if(!empty($riwayat_konseling->resume_konsultasi)) {echo $riwayat_konseling->resume_konsultasi;}else{echo"Tidak Ada Data";}?>
                                    </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-control">
                                          <!--   <button class="btn btn-default" data-click="panel-collapse"><i class="fa fa-chevron-down"></i></button> -->
                                        </div>
                                        <h3 class="panel-title"><i class="fa fa-table"> </i> Catatan Dosen Wali</h3>
                                    </div>
                                    <div class="panel-body">
                                        <?php if(!empty($riwayat_konseling->catatan_dosen_wali)) {echo $riwayat_konseling->catatan_dosen_wali;}else{echo"Tidak Ada Data";}?>
                                    </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-control">
                                          <!--   <button class="btn btn-default" data-click="panel-collapse"><i class="fa fa-chevron-down"></i></button> -->
                                        </div>
                                        <h3 class="panel-title"><i class="fa fa-table"> </i> Catatan Kepada Orang Tua</h3>
                                    </div>
                                    <div class="panel-body">
                                        <?php if(!empty($riwayat_konseling->catatan_orang_tua)) {echo $riwayat_konseling->catatan_orang_tua;}else{echo"Tidak Ada Data";}?>
                                    </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-control">
                                          <!--   <button class="btn btn-default" data-click="panel-collapse"><i class="fa fa-chevron-down"></i></button> -->
                                        </div>
                                        <h3 class="panel-title"><i class="fa fa-table"> </i> Saran</h3>
                                    </div>
                                    <div class="panel-body">
                                        <?php if(!empty($riwayat_konseling->saran)) {echo $riwayat_konseling->saran;}else{echo"Tidak Ada Data";}?>
                                    </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-control">
                                          <!--   <button class="btn btn-default" data-click="panel-collapse"><i class="fa fa-chevron-down"></i></button> -->
                                        </div>
                                        <h3 class="panel-title"><i class="fa fa-table"> </i> Kesimpulan</h3>
                                    </div>
                                    <div class="panel-body">
                                        <?php if(!empty($riwayat_konseling->kesimpulan)) {echo $riwayat_konseling->kesimpulan;}else{echo"Tidak Ada Data";}?>
                                    </div>
                                </div>

                            </div>
                      
                       
                    </div>


                   
                    </div>


                    <!--===================================================-->
                    <!--End page content-->
                </div>
                <script>
                    function close_window() {
                        if (confirm("Anda Yakin Ingin Menutup Tab Ini?")) {
                            close();
                        }
                    }
                </script>