   <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <div class="pageheader hidden-xs">
                        <h3><i class="fa fa-user"></i> Tinjau Pendaftar </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li> Pengguna </li>
                                <li class="active"> Tinjau Pendaftar </li>
                            </ol>
                        </div>
                    </div>
                    <!--Page content-->
                    <!--===================================================-->

                    <div id="page-content">

                        <div class="row">
                            <div class="col-lg-3 col-sm-12 col-md-6 col-xs-12">

                            <!--Profile Widget-->
                            <!--===================================================-->
                            <div class="panel widget">
                                <div class="widget-header bg-purple">
                                         <img class="widget-bg img-responsive" src="<?= base_url('assets/admin/') ?>img/thumbs/img3.jpg" alt="Image">
                                          
                                </div>
                                <div class="widget-body text-center">
                                    <?php if ($pendaftar->is_photo && $pendaftar->photo != ''): ?>
                                            <img alt="<?= $pendaftar->display_name ?>" class="widget-img img-border-light" src="https://kemahasiswaan.itb.ac.id/assets/upload/<?= (isset($pendaftar->nim)?$pendaftar->nim:$pendaftar->nim_tpb).'/'.$pendaftar->photo ?>">
                                    <?php else: ?>

                                            <img alt="Profile Picture" class="widget-img img-border-light" src="<?= base_url('assets/admin/') ?>img/user.png">
                                    
                                    <?php endif ?>
                                    
                                    <h4 class="mar-no"><?= $pendaftar->display_name ?></h4>
                                    <p class="text-muted mar-btm"><div class="label label-table label-<?= ($pendaftar->id_status_konseling == 1 ? 'danger' : ($pendaftar->id_status_konseling == 2 ? 'warning' : 'success'))  ?>" style="max-width: 170px;"><?= $pendaftar->status ?></div></p>
                                </div>
                               
                                <!--===================================================-->
                            </div>
                        </div>
                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                                <div class="panel">
                                    <div class="panel-body pad-no">
                                        <!--Default Tabs (Left Aligned)--> 
                                        <!--===================================================-->
                                        <div class="tab-base">
                                            <!--Nav Tabs-->
                                            <ul class="nav nav-tabs">
                                                <li class="active"> <a data-toggle="tab" href="#demo-lft-tab-2">Informasi & Penjadwalan</a> </li>
                                                <li > <a data-toggle="tab" href="#demo-lft-tab-1">Hasil Konseling</a> </li>
                                                <li > <a data-toggle="tab" href="#demo-lft-tab-3">History Konseling</a> </li>
                                            </ul>
                                            <!--Tabs Content-->
                                            <div class="tab-content">

                                                <div id="demo-lft-tab-1" class="tab-pane fade in">

                                                    <div class="row"> 
                                                      <hr>
                                                      &nbsp;&nbsp;
                                                          <label class="control-label ">Konselor : </label> 
                                                           <?php if (isset($pendaftar->ditangani_oleh)): ?>
                                                                               <label class="control-label ">
                                                                                    <?= $pendaftar->penangan.' '.$pendaftar->gelar_belakang_konselor  ?>
                                                                               </label>
                                                                        <?php else: ?>
                                                                                <div class="label label-table label-danger" style="max-width: 170px;">Belum Dijadwalkan</div>
                                                                        <?php endif ?>
                                                                        <hr>
                                                    </div>  

                                                     <div class="row">
                                                        <div class="col-sm-12">

                                                            <div class="form-group">
                                                                <h4>Resume Konsultasi : </h4> 
                                                                
                                                                <p><?= (isset($hasil->resume_konsultasi) ? $hasil->resume_konsultasi : "") ?></p>
                                                            </div>
                                                        </div>
                                                      </div>

                                                        <div class="row">
                                                        <div class="col-sm-12">

                                                            <div class="form-group">
                                                                <h4>Catatan Dosen Wali : </h4> 
                                                                
                                                                 <p><?= (isset($hasil->catatan_dosen_wali) ? $hasil->catatan_dosen_wali : "") ?></p>
                                                            </div>
                                                        </div>
                                                      </div>

                                                         <div class="row">
                                                        <div class="col-sm-12">

                                                            <div class="form-group">
                                                                <h4>Kesimpulan: </h4> 
                                                                
                                                                 <p><?= (isset($hasil->kesimpulan) ? $hasil->kesimpulan : "") ?></p>
                                                            </div>
                                                        </div>
                                                      </div>


                                                         <div class="row">
                                                        <div class="col-sm-12">

                                                            <div class="form-group">
                                                                <h4>Saran: </h4> 
                                                                
                                                                 <p><?= (isset($hasil->saran) ? $hasil->saran : "") ?></p>
                                                            </div>
                                                        </div>
                                                      </div>


                                                         <div class="row">
                                                        <div class="col-sm-12">

                                                            <div class="form-group">
                                                                <h4>Alasan Konsultasi: </h4> 
                                                                
                                                                 <p><?= (isset($hasil->alasan_konsultasi) ? $hasil->alasan_konsultasi : "") ?></p>
                                                            </div>
                                                        </div>
                                                      </div>


                                                         <div class="row">
                                                        <div class="col-sm-12">

                                                            <div class="form-group">
                                                                <h4>Ringkasan Analisa Permasalahan: </h4> 
                                                                
                                                                 <p><?= (isset($hasil->ringkasan_analisa_permasalahan) ? $hasil->ringkasan_analisa_permasalahan : "") ?></p>
                                                            </div>
                                                        </div>
                                                      </div>

                                                      <div class="row">
                                                        <div class="col-sm-12">

                                                            <div class="form-group">
                                                                <h4>Tindakan Kuratif: </h4> 
                                                                
                                                                 <p><?= (isset($hasil->tindakan_kuratif) ? $hasil->tindakan_kuratif : "") ?></p>
                                                            </div>
                                                        </div>
                                                      </div>

                                                        <div class="row">
                                                        <div class="col-sm-12">

                                                            <div class="form-group">
                                                                <h4>Rekomendasi: </h4> 
                                                                
                                                                 <p><?= (isset($hasil->rekomendasi) ? $hasil->rekomendasi : "") ?></p>
                                                            </div>
                                                        </div>
                                                      </div>

                                                        <div class="row">
                                                        <div class="col-sm-12">

                                                            <div class="form-group">
                                                                <h4>Catatan Observasi: </h4> 
                                                                
                                                                 <p><?= (isset($hasil->catatan_observasi) ? $hasil->catatan_observasi : "") ?></p>
                                                            </div>
                                                        </div>
                                                      </div>

                                                </div>
                                              
                                                <div id="demo-lft-tab-2" class="tab-pane active in">

                                                          <?php $message = $this->session->flashdata("status"); ?>
                                                          <?=isset($message)?'<div class="alert alert-mint media fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><div class="media-left"><span class="icon-wrap icon-wrap-xs alert-icon"><i class="fa fa-check fa-lg"></i></span> </div><div class="media-body"><h4 class="alert-title">Sukses !</h4><p class="alert-message">'.$message.'</p></div></div>':''; ?>
                                                          <?php $pesan = $this->session->flashdata("warning"); ?>
                                                          <?=isset($pesan)?'<div class="alert alert-danger media fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><div class="media-left"><span class="icon-wrap icon-wrap-xs alert-icon"><i class="fa fa-remove fa-lg"></i></span> </div><div class="media-body"><h4 class="alert-title">Gagal !</h4><p class="alert-message">'.$pesan.'</p></div></div>':''; ?>

                                                       <div class="row">
                                                        <div class="col-sm-12">

                                                            <h3>Profil Mahasiswa</h3>
                                                            <hr>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4"> <b>NIM</b> </label>
                                                                <div class="col-md-8">
                                                           
                                                                   <label class="control-label ">
                                                                       : <?= (isset($pendaftar->nim)?$pendaftar->nim:$pendaftar->nim_tpb) ?>
                                                                   </label>
                                                                    <!--===================================================-->
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4"> <b>Jenjang/Prodi/Fakultas</b> </label>
                                                                <div class="col-md-8">
                                                           
                                                                   <label class="control-label ">
                                                                       : <?= $pendaftar->prodi_jenjang.'/'.$pendaftar->nama_prodi.'/'.$pendaftar->nama_fakultas ?>
                                                                   </label>
                                                                    <!--===================================================-->
                                                                </div>
                                                            </div>
                                                              <div class="form-group">
                                                                <label class="control-label col-md-4"> <b>Email</b>  </label>
                                                                <div class="col-md-8">
                                                           
                                                                   <label class="control-label ">
                                                                       : <?= (isset($pendaftar->email_non_itb)?$pendaftar->email_non_itb:'-') ?> 
                                                                   </label>
                                                                    <!--===================================================-->
                                                                </div>
                                                            </div>
                                                              <div class="form-group">
                                                                <label class="control-label col-md-4"> <b>Telp</b> </label>
                                                                <div class="col-md-8">
                                                           
                                                                   <label class="control-label ">
                                                                       : <?= (isset($pendaftar->telp)?$pendaftar->telp:'-') ?>
                                                                   </label>
                                                                    <!--===================================================-->
                                                                </div>
                                                            </div>

                                                             <div class="form-group">
                                                                <label class="control-label col-md-4"> <b>No Hp</b> </label>
                                                                <div class="col-md-8">
                                                           
                                                                   <label class="control-label ">
                                                                       : <?= $pendaftar->no_hp ?>
                                                                   </label>
                                                                    <!--===================================================-->
                                                                </div>
                                                            </div>
                                                           
                                                         
                                                          
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12">

                                                            <h3>Data Mahasiswa [SIX]</h3>
                                                            <hr>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4"> <b>NIM</b> </label>
                                                                <div class="col-md-8">
                                                           
                                                                   <label class="control-label ">
                                                                       : <?= isset($six_mhs->nim)?$six_mhs->nim:'data tidak ditemukan' ?>
                                                                   </label>
                                                                    <!--===================================================-->
                                                                </div>
                                                            </div>
                                                              <div class="form-group">
                                                                <label class="control-label col-md-4"> <b>Email</b>  </label>
                                                                <div class="col-md-8">
                                                           
                                                                   <label class="control-label ">
                                                                       : <?= isset($six_mhs->email)?$six_mhs->email:'data tidak ditemukan' ?>
                                                                   </label>
                                                                    <!--===================================================-->
                                                                </div>
                                                            </div>
                                                              <div class="form-group">
                                                                <label class="control-label col-md-4"> <b>No Hp</b> </label>
                                                                <div class="col-md-8">
                                                           
                                                                   <label class="control-label ">
                                                                       : <?= isset($six_mhs->no_hp)?$six_mhs->no_hp:'data tidak ditemukan' ?>
                                                                   </label>
                                                                    <!--===================================================-->
                                                                </div>
                                                            </div>
                                                             <div class="form-group">
                                                                <label class="control-label col-md-4"> <b>IPK</b> </label>
                                                                <div class="col-md-8">
                                                           
                                                                   <label class="control-label ">
                                                                       : <?= isset($six_mhs->ipk)?$six_mhs->ipk:'data tidak ditemukan' ?>
                                                                   </label>
                                                                    <!--===================================================-->
                                                                </div>
                                                            </div>

                                                           
                                                         
                                                          
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        
                                                        <div class="col-lg-12">
                                                            
                                                                <h3>Pra Konsultasi</h3>
                                                                <hr>
                                                                   <div class="form-group">
                                                                <label class="control-label col-md-4"> <b>Kategori Permasalahan </b> </label>
                                                                <div class="col-md-8">
                                                           
                                                                   <label class="control-label ">
                                                                       :  <?php $arr_masalah = json_decode($pendaftar->id_kategori_masalah); ?>
                                                             
                                                                          <?php foreach ($masalah as $masalah_key){ ?>
                                                                              <?php if (!empty($arr_masalah)){ ?>

                                                                                    <?php if (in_array($masalah_key->id_kategori_masalah, $arr_masalah)): ?>
                                                                                      <b><?=$masalah_key->kategori_masalah?>,</b>
                                                                                      
                                                                                    <?php endif ?>
                                                                                
                                                                              <?php } ?>
                                                                              
                                                                          <?php } ?>
                                                                       
                                                                   </label>
                                                                    <!--===================================================-->
                                                                </div>
                                                                <br>
                                                            </div>
                                                       

                                                            
                                                         
                                                        
                                                                <div class="form-group">
                                                                    
                                                                    <div class="col-lg-12">
                                                                        <?php $i=0; foreach ($kuesioner as $kue): $i++; ?>
                                                                        <div class="media">
                                                                            <div class="media-body">
                                                                                <h5 class="media-heading"><b><?= $i.'. '; ?><?= $kue->pertanyaan ?></b></h5>
                                                                                <p> - <?= (isset($kue->jawaban) ?$kue->jawaban:'-'  ) ?> </p>
                                                                            </div>
                                                                        </div>
                                                                       <?php endforeach ?>
                                                                   </div>

                                                                </div>

                                                        </div>

                                                    </div>


                                                    <div class="row">
                                                        <div class="col-sm-12">

                                                            <h3>Permintaan Jadwal</h3>
                                                            <hr>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-4"> <b>Permintaan Tanggal / Jam Konseling </b></label>
                                                                <div class="col-md-8">
                                                                    
                                                                    <label class="control-label ">
                                                                       : <?= format_date_form($pendaftar->tanggal_diajukan) ?> / <?= $pendaftar->jam_diajukan ?>
                                                                   </label>
                                                                    <!--===================================================-->
                                                                </div>
                                                            </div>

                                                             <div class="form-group">
                                                                <label class="control-label col-md-4"><b> Tempat</b></label>
                                                                <div class="col-md-8">
                                                                    
                                                                    <label class="control-label ">
                                                                       : <?= $pendaftar->venue ?> (<?= ($pendaftar->daring_luring == 2 ? 'Luring':'Daring') ?>) 
                                                                   </label>
                                                                    <!--===================================================-->
                                                                </div>
                                                            </div>

                                                               <div class="form-group">
                                                                <label class="control-label col-md-4"><b> Konselor</b></label>
                                                                <div class="col-md-8"> 
                                                                    
                                                                     <?php if (isset($pendaftar->ditangani_oleh)): ?>
                                                                               <label class="control-label ">
                                                                                   : <?= $pendaftar->penangan.' '.$pendaftar->gelar_belakang_konselor  ?>
                                                                               </label>
                                                                        <?php else: ?>
                                                                                <div class="label label-table label-danger" style="max-width: 170px;">: Belum Dijadwalkan</div>
                                                                        <?php endif ?>
                                                                    <!--===================================================-->
                                                                </div>
                                                            </div>

                                                            <br>
                                                            <br>
                                                            <br>
                                                              

                                                            <hr>

                                                            <?php if ($pendaftar->id_status_konseling != 1): ?>
                                                                
                                                          

                                                            <h3>Jadwal Disetujui </h3>
                                                            <hr>
                                                  
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4"> <b>Konselor </b> </label>
                                                                <div class="col-md-8">
                                                                    :
                                                                   <label class="control-label ">
                                                                        <?php if (isset($pendaftar->ditangani_oleh)): ?>
                                                                               <label class="control-label ">
                                                                                    <?= $pendaftar->penangan.' '.$pendaftar->gelar_belakang_konselor  ?>
                                                                               </label>
                                                                        <?php else: ?>
                                                                                <div class="label label-table label-danger" style="max-width: 170px;">Belum Dijadwalkan</div>
                                                                        <?php endif ?>
                                                                       
                                                                   </label>
                                                                    <!--===================================================-->
                                                                </div>
                                                            </div>
                                                           <div class="form-group">
                                                                <label class="control-label col-md-4"> <b>Tanggal / Jam Konseling </b></label>
                                                                <div class="col-md-8">
                                                                    
                                                                    <label class="control-label ">
                                                                       : <?= format_date_form($pendaftar->tanggal_disetujui) ?> / <?= $pendaftar->jam_disetujui ?>
                                                                   </label>
                                                                    <!--===================================================-->
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-4"><b> Venue </b> </label>
                                                                <div class="col-md-8">
                                                                    :
                                                                     <label class="control-label ">
                                                                        <?php if (isset($pendaftar->venue)): ?>
                                                                               <label class="control-label ">
                                                                                    <?= $pendaftar->venue ?>  (<?= ($pendaftar->daring_luring == 2 ? 'Luring':'Daring') ?>) 
                                                                               </label>
                                                                        <?php else: ?>
                                                                                <div class="label label-table label-danger" style="max-width: 170px;">Belum Dijadwalkan</div>
                                                                        <?php endif ?>
                                                                       
                                                                   </label>
                                                                </div>
                                                            </div>


                                                            <div class="form-group">
                                                                <label class="control-label col-md-4"><b> Tempat/Media Konsultasi </b> </label>
                                                                <div class="col-md-8">
                                                                    :
                                                                     <label class="control-label ">
                                                                        <?php if (isset($pendaftar->media_konsultasi)): ?>
                                                                               <label class="control-label ">
                                                                                    <?= $pendaftar->media_konsultasi ?>
                                                                               </label>
                                                                        <?php else: ?>
                                                                                <div class="label label-table label-danger" style="max-width: 170px;">-</div>
                                                                        <?php endif ?>
                                                                       
                                                                   </label>
                                                                </div>
                                                            </div>
                                                            <?php endif ?>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-12">

                                                                <?php if ($pendaftar->id_status_konseling == 1 || $pendaftar->id_status_konseling == 2): ?>
                                                                      
                                                                  <?php if (isset($pendaftar->ditangani_oleh) && $pendaftar->id_status_konseling == 1){ ?>

                                                                          <form class="form-horizontal" method="POST" action="<?= base_url('admin/updsetujui') ?>">

                                                                             <div class="form-group">
                                                                                <label class="col-sm-4 control-label" for="demo-hor-inputemail"><b>Venue</b></label>
                                                                                <div class="col-sm-8">
                                                                                   <select class="form-control" name="venue"  required="">
                                                                                        <option value="">- Pilih Venue -</option>
                                                                                            <option value="Kampus Ganesha">Kampus Ganesha</option>
                                                                                            <option value="Kampus Jatinangor">Kampus Jatinangor</option>
                                                                                             <option value="Kampus Cirebon">Kampus Cirebon</option>
                                                                                   </select >
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="col-sm-4 control-label" for="demo-hor-inputemail"><b>Kategori</b></label>
                                                                                <div class="col-sm-8">
                                                                                   <select class="form-control" name="luring_daring" id="jad_venue2" required="">
                                                                                        <option value="">- Pilih Kategori -</option>
                                                                                            <option value="2">Luring</option>
                                                                                            <option value="1">Daring</option>
                                                                                   </select >
                                                                                </div>
                                                                            </div>

                                                                             <div class="form-group">
                                                                                <label class="col-sm-4 control-label" for="demo-hor-inputpass"><b id="jad_medkom">Media Konsultasi</b></label>
                                                                                <div class="col-sm-8">
                                                                                     <input type="text" name="media_konsultasi" class="form-control">
                                                                                     <input type="hidden" name="jam" value="<?= $pendaftar->jam_diajukan ?>" class="form-control">
                                                                                      <input type="hidden" name="tanggal" value="<?= $pendaftar->tanggal_diajukan ?>" class="form-control">
                                                                                </div>
                                                                            </div>

                                                                             <div class="panel-footer text-right">
                                                                            <input type="hidden" name="id_konseling" value="<?= $pendaftar->id_konseling ?>">
                                                                                <button class="btn btn-info" type="submit" onclick="return confirm('Anda yakin akan mensetujui Jadwal ini ?')">Setujui</button>
                                                                            </div>
                                                                        </form>
                                                                  
                                                                    
                                                                  <?php }else{ ?>

                                                                    <form class="form-horizontal" method="POST" action="<?= base_url('admin/updpenjadwalan') ?>">
                                                                      <input type="hidden" name="user_id" value="<?=$pendaftar->user_id ?>">
                                                                      <input type="hidden" name="email_six" value="<?=isset($six_mhs->email)?$six_mhs->email:'' ?>">
                                                                        <div class="panel-body">
                                                                            <div class="form-group">
                                                                                <label class="col-sm-4 control-label" for="demo-hor-inputemail"><b>Konselor</b></label>
                                                                                <div class="col-sm-8">
                                                                                   <select class="form-control" name="ditangani_oleh" required="">
                                                                                        <option value="">- Pilih Konselor -</option>
                                                                                        <?php foreach ($konselor as $key_konselor): ?>
                                                                                            <option value="<?= $key_konselor->id_user ?>"><?= $key_konselor->nama_lengkap.' '.$key_konselor->gelar_belakang ?>
                                                                                              
                                                                                              <?php $arr_spesialis = json_decode($key_konselor->spesialis); ?>
                                                                                              <?php if (isset($arr_spesialis)){ ?>
                                                                                                    (<?php foreach ($arr_spesialis as $spesialis_key){ ?>
                                                                                                        <?= $spesialis_key.',' ?>
                                                                                                    <?php } ?>)
                                                                                              <?php } ?>
                                                                                            
                                                                                            </option>
                                                                                        <?php endforeach ?>
                                                                                   </select >
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-4 control-label" for="demo-hor-inputpass"><b>Tanggal</b></label>
                                                                                <div class="col-sm-8">
                                                                                     <select class="form-control" name="tanggal" required="">
                                                                                        <option value="">- Tanggal -</option>
                                                                                       
                                                                                   </select >

                                                                                </div>
                                                                            </div>

                                                                             <div class="form-group">
                                                                                <label class="col-sm-4 control-label" for="demo-hor-inputpass"><b>Jam</b></label>
                                                                                <div class="col-sm-8">
                                                                                     <select class="form-control" name="jam" required="">
                                                                                        <option value="">- Jam -</option>
                                                                                       
                                                                                   </select >

                                                                                </div>
                                                                            </div>
                                                                              <div class="form-group">
                                                                                <label class="col-sm-4 control-label" for="demo-hor-inputemail"><b>Venue</b></label>
                                                                                <div class="col-sm-8">
                                                                                   <select class="form-control" name="tempat" required="">
                                                                                        <option value="">- Pilih Venue -</option>
                                                                                         <option value="Kampus Ganesha">Kampus Ganesha</option>
                                                                                            <option value="Kampus Jatinangor">Kampus Jatinangor</option>
                                                                                             <option value="Kampus Cirebon">Kampus Cirebon</option>
                                                                                           
                                                                                     
                                                                                   </select >
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="col-sm-4 control-label" for="demo-hor-inputemail"><b>Kategori</b></label>
                                                                                <div class="col-sm-8">
                                                                                   <select class="form-control" name="luring_daring" id="jad_venue2" required="">
                                                                                        <option value="">- Pilih Kategori -</option>
                                                                                            <option value="2">Luring</option>
                                                                                            <option value="1">Daring</option>
                                                                                   </select >
                                                                                </div>
                                                                            </div>


                                                                             <div class="form-group">
                                                                                <label class="col-sm-4 control-label" for="demo-hor-inputpass"><b id="jad_medkom">Media Konsultasi</b></label>
                                                                                <div class="col-sm-8">
                                                                                     <input type="text" name="media_konsultasi" class="form-control">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="panel-footer text-right">
                                                                        <input type="hidden" name="id_konseling" value="<?= $pendaftar->id_konseling ?>">

                                                                            <button class="btn btn-info" type="submit">Perbaharui</button>
                                                                        </div>
                                                                    </form>

                                                                  <?php } ?>

                                                                    <?php endif ?>
                                                            
                                                        </div>
                                                    </div>
                                                    <br>
                                                </div>

                                                <div id="demo-lft-tab-3" class="tab-pane fade in">

                                               

                                                     <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle" data-page-size="7">
                                                        <thead>
                                                            <tr style="width: 100%">
                                                                <th style="width: 10%" data-sort-initial="true" data-toggle="true">No</th>
                                                                <th style="width: 20%">Tanggal/Jam</th>
                                                                <th>Konselor</th>
                                                                <th>Kesimpulan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                          <?php $no=0; foreach  ($catatanmedis as $key): $no++; ?>
                                                              <tr>
                                                                <td><?= $no; ?></td>
                                                                <td><?= tanggal_indo_lengkap($key->tanggal_disetujui,TRUE) ?>
                                                                  <br>
                                                                    <small class="text-muted"><?= trimDate($key->waktu_mulai_konseling) ?> sd <?= trimDate($key->waktu_akhir_konseling) ?></small>
                                                                </td>
                                                                <td><?= $key->nama_lengkap ?></td>
                                                                <td><?= $key->kesimpulan ?></td>
                                                              </tr>
                                                          <?php endforeach ?>
                                                          
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="6">
                                                                    <div class="text-right">
                                                                        <ul class="pagination"></ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>

                                                </div>

                                            </div>
                                        </div>
                                        <!--===================================================--> 
                                        <!--End Default Tabs (Left Aligned)--> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--===================================================-->
                    <!--End page content-->
                </div>

               