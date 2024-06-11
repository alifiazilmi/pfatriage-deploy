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
                                <li class="active"> Sudah Konseling </li>

                            </ol>
                        </div>
                    </div>


                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                    <div class="pull-right"><a href="#" onclick="window.history.go(-1)" class="btn btn-warning btn-labeled fa fa-arrow-left"> Kembali</a></div><br><br>
                        <?php $message_berhasil = $this->session->flashdata("status_berhasil"); ?>
                        <?=isset($message_berhasil)?'<div class="alert alert-success alert-dismissible">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                            <h4><i class="icon fa fa-check"></i> Sukses!</h4>'.$message_berhasil.'</div>':''; ?>
                        <?php $message_gagal = $this->session->flashdata("status_gagal"); ?>
                        <?=isset($message_gagal)?'<div class="alert alert-danger alert-dismissible">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                            <h4><i class="icon fa fa-check"></i> Gagal!</h4>'.$message_gagal.'</div>':''; ?>

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
                                    <div class="title">  <?php echo $default_profiles->prodi_jenjang;?>| <?php echo $default_profiles->nama_prodi;?> | <?php if(!empty($default_profiles->nim)){echo $default_profiles->nim;}else{echo $default_profiles->nim_tpb;}?></div>
                                    <div class="address">  </div>
                                    <ul class="fullstats">
                                        <li> <span><?php if(!empty($data_konseling->durasi_konseling)) { echo $data_konseling->durasi_konseling; } else { ?>00:00:00<?php }?></span>Durasi Konseling </li>
                                        <li> 
                                            <?php if(empty($data_konseling->waktu_akhir_konseling)) { ?>
                                               <?php if(!empty($data_konseling->waktu_mulai_konseling)) { ?>
                                                 <a onclick="return confirm('Apakah Anda Yakin Ingin Mengakhiri Sesi Konseling Ini ?')" href="<?php echo base_url('Konselor/stop_konseling/'.$data_konseling->id_konseling);?>" type="submit" class="btn btn-danger btn-icon icon-lg fa fa-stop" title="Stop Konseling" ></a>
                                               <?php } else {?>
                                                <button onclick="alert('Anda Belum Memulai Sesi Konseling.')" href="#" type="submit" class="btn btn-danger btn-icon icon-lg fa fa-stop" title="Stop Konseling" disabled></button>
                                               <?php } ?>
                                            <?php } else { ?>
                                              <!-- <button onclick="alert('Anda Sudah Mengakhiri Sesi Konseling.')" href="#" type="submit" class="btn btn-danger btn-icon icon-lg fa fa-stop" title="Stop Konseling" disabled></button> -->
                                            <?php } ?>
                                        </li>
                                        <li>  
                                            <?php if(empty($data_konseling->waktu_mulai_konseling)) { ?>
                                               &nbsp;  <a onclick="return confirm('Anda Yakin Ingin Memulai Konseling Sekarang ?')" href="<?php echo base_url('Konselor/mulai_konseling/'.$data_konseling->id_konseling);?>" class="btn btn-success btn-icon icon-lg fa fa-play" title="Mulai Konseling"></a> 
                                            <?php } else { ?>
                                               <!-- &nbsp; <button onclick="alert('Anda Sudah Memulai Konseling')" href="#" type="submit" class="btn btn-success btn-icon icon-lg fa fa-play" title="Mulai Konseling" disabled></button> -->
                                            <?php } ?> 
                                        </li>
                                    </ul>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-control">
                                          <!--   <button class="btn btn-default" data-click="panel-collapse"><i class="fa fa-chevron-down"></i></button> -->
                                        </div>
                                        <h3 class="panel-title"><i class="fa fa-table"> </i> Riwayat Konseling</h3>
                                    </div>
                                    <div class="panel-body">
                                    <div class="table-responsive">
                                            <table id="demo-dt-basic4" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td style="width:5px">No</td>
                                                        <td> Waktu</td>
                                                        <td> Konselor </td>
                                                        <td> Data Riwayat Konseling</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i=0; foreach ($riwayat_konseling as $fetch) { $i++ ?>
                                                    <tr>
                                                        <td><?php echo $i;?></td>
                                                        <td> <span class="text-semibold"><?php $tanggal_disetujui=$fetch->tanggal_disetujui; echo date("d-m-Y",strtotime($tanggal_disetujui));?></span>
                                                                <br>
                                                            <small class="text-muted"><?php echo $fetch->jam_disetujui;?></small>
                                                        </td>
                                                        <td> <?php echo $fetch->gelar_depan;?> <?php echo $fetch->nama_lengkap;?> <?php echo $fetch->gelar_belakang;?></td>
                                                        <td><a target="_blank" href="<?= base_url('konselor/riwayat_konseling/'.$fetch->id_konseling) ?>" class="btn btn-success btn-labeled fa fa-search">Tinjau</a></td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                              <?php  if(!empty($kategori_masalah)) { ?>
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <div class="panel-control">
                                            <!--   <button class="btn btn-default" data-click="panel-collapse"><i class="fa fa-chevron-down"></i></button> -->
                                            </div>
                                            <h3 class="panel-title"><i class="fa fa-table"> </i> Hasil Screening</h3>
                                        </div>
                                        <div class="panel-body">
                                            <p><b>Kategori Masalah:  <ul><?php foreach($kategori_masalah as $fetch){?><li><?php echo $fetch->kategori_masalah;?></li><?php } ?></ul> </b></p>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td style="width:5px">No Pertanyaan</td>
                                                        <td>Pertanyaan</td>
                                                        <td>Jawaban</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i=0; foreach ($hasil_screening as $fetch) { $i++ ?>
                                                    <tr>
                                                        <td><?php echo $fetch->no_pertanyaan;?></td>
                                                        <td> <?php echo $fetch->pertanyaan;?> </td>
                                                        <td> <span class="text-semibold"><?php if ($fetch->jawaban!=""){echo $fetch->jawaban;} else {echo "-";}?></span></td>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                              <?php } ?>

                            </div>
                      
                       
                    </div>


                    <div class="row">
                            <div class="col-lg-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                    
                                        <h3 class="panel-title">Rekam Konseling/Medis</h3>
                                    </div>

                                    <form method="POST" action="<?php echo base_url('Konselor/proc_update_konsultasi');?>" class="panel-body form-horizontal">
                                         <input type="hidden" name="id_konseling" value="<?php echo $data_konseling->id_konseling;?>">
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-textarea-input">Alasan Konsultasi :</label>
                                            <div class="col-md-9">
                                                <textarea id="demo-textarea-input"   rows="40" name="alasan_konsultasi" class="form-control alasan_konsultasi" placeholder="Your content here.."><?php echo $hasil_konseling->alasan_konsultasi;?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-textarea-input">Ringkasan Analisa Permasalahan :</label>
                                            <div class="col-md-9">
                                                <textarea id="demo-textarea-input"   rows="40" name="ringkasan_analisa_permasalahan" class="form-control ringkasan_analisa_permasalahan" placeholder="Your content here.."><?php echo $hasil_konseling->ringkasan_analisa_permasalahan;?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-textarea-input">Tindakan Kuratif yang Dilakukan :</label>
                                            <div class="col-md-9">
                                                <textarea id="demo-textarea-input"   rows="40" name="tindakan_kuratif" class="form-control tindakan_kuratif" placeholder="Your content here.."><?php echo $hasil_konseling->tindakan_kuratif;?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-textarea-input">Rekomendasi :</label>
                                            <div class="col-md-9">
                                                <textarea id="demo-textarea-input"   rows="40" name="rekomendasi" class="form-control rekomendasi" placeholder="Your content here.."><?php echo $hasil_konseling->rekomendasi;?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-textarea-input">Catatan lain selama proses konseling (observasi jika ada) :</label>
                                            <div class="col-md-9">
                                                <textarea id="demo-textarea-input"   rows="40" name="catatan_observasi" class="form-control catatan_observasi" placeholder="Your content here.."><?php echo $hasil_konseling->catatan_observasi;?></textarea>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-textarea-input">Catatan Konseling :</label>
                                            <div class="col-md-9">
                                                <textarea id="demo-textarea-input"  rows="40" name="resume_konsultasi" class="form-control rekam" placeholder="Your content here.."><?php echo $hasil_konseling->resume_konsultasi;?></textarea>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-textarea-input">Saran kepada Pasien :</label>
                                            <div class="col-md-9">
                                                <textarea id="demo-textarea-input"  name="saran" rows="10" class="form-control saran" placeholder="Your content here.."><?php echo $hasil_konseling->saran;?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-textarea-input">Catatan Kepada Dosen Wali :</label>
                                            <div class="col-md-9">
                                                <textarea id="demo-textarea-input"  name="catatan_dosen_wali" rows="10" class="form-control catatan_dosen_wali" placeholder="Your content here.."><?php echo $hasil_konseling->catatan_dosen_wali;?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-textarea-input">Catatan Kepada Orang Tua :</label>
                                            <div class="col-md-9">
                                                <textarea id="demo-textarea-input"  name="catatan_orang_tua" rows="10" class="form-control catatan_orang_tua" placeholder="Your content here.."><?php echo $hasil_konseling->catatan_orang_tua;?></textarea>
                                            </div>
                                        </div>
                                        
                                        <?php if (!empty($data_konseling->foto_konseling)) { ?>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-textarea-input">Foto Konseling :</label>
                                            <div class="col-md-9">
                                            <a target="_blank" href="<?php echo base_url('assets/foto_konseling/'.$data_konseling->foto_konseling)?>"  class="btn btn-info btn-labeled fa fa-image"> Lihat Foto Konseling</a>
                                            </div>
                                        </div>
                                        <?php } ?>

                                        <?php if (!empty($data_konseling->lampiran_konseling)) { ?>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-textarea-input">Lampiran Konseling :</label>
                                            <div class="col-md-9">
                                            <a target="_blank" href="<?php echo base_url('assets/lampiran_konseling/'.$data_konseling->lampiran_konseling)?>"  class="btn btn-info btn-labeled fa fa-file"> Lihat Lampiran Konseling</a>
                                            </div>
                                        </div>
                                        <?php } ?>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-textarea-input">Kategori Kasus:</label>
                                            <div class="col-md-9">
                                                <input type="checkbox" <?php if(!empty($hasil_konseling->kategori_kasus)){$temp=json_decode($hasil_konseling->kategori_kasus); foreach($temp as $fetch){if($fetch=="Emosi"){echo "checked";}}}?> name="kategori_kasus[]" value="Emosi">
                                                <label> Emosi</label><br>
                                                <input type="checkbox" <?php if(!empty($hasil_konseling->kategori_kasus)){$temp=json_decode($hasil_konseling->kategori_kasus); foreach($temp as $fetch){if($fetch=="Akademik"){echo "checked";}}}?>  name="kategori_kasus[]" value="Akademik">
                                                <label> Akademik</label><br>
                                                <input type="checkbox" <?php if(!empty($hasil_konseling->kategori_kasus)){$temp=json_decode($hasil_konseling->kategori_kasus); foreach($temp as $fetch){if($fetch=="Keluarga"){echo "checked";}}}?>  name="kategori_kasus[]" value="Keluarga">
                                                <label> Keluarga</label><br>
                                                <input type="checkbox" <?php if(!empty($hasil_konseling->kategori_kasus)){$temp=json_decode($hasil_konseling->kategori_kasus); foreach($temp as $fetch){if($fetch=="Interaksi Sosial"){echo "checked";}}}?>  name="kategori_kasus[]" value="Interaksi Sosial">
                                                <label> Interaksi Sosial</label><br>
                                                <input type="checkbox" <?php if(!empty($hasil_konseling->kategori_kasus)){$temp=json_decode($hasil_konseling->kategori_kasus); foreach($temp as $fetch){if($fetch=="Pemahaman Diri"){echo "checked";}}}?>  name="kategori_kasus[]" value="Pemahaman Diri">
                                                <label> Pemahaman Diri</label><br>
                                                <input type="checkbox" <?php if(!empty($hasil_konseling->kategori_kasus)){$temp=json_decode($hasil_konseling->kategori_kasus); foreach($temp as $fetch){if($fetch=="Motivasi"){echo "checked";}}}?>  name="kategori_kasus[]" value="Motivasi">
                                                <label> Motivasi</label><br>
                                                <input type="checkbox" <?php if(!empty($hasil_konseling->kategori_kasus)){$temp=json_decode($hasil_konseling->kategori_kasus); foreach($temp as $fetch){if($fetch=="Penyesuaian Diri"){echo "checked";}}}?>  name="kategori_kasus[]" value="Penyesuaian Diri">
                                                <label> Penyesuaian Diri</label><br>
                                                <input type="checkbox" <?php if(!empty($hasil_konseling->kategori_kasus)){$temp=json_decode($hasil_konseling->kategori_kasus); foreach($temp as $fetch){if($fetch=="Pengelolaan Diri"){echo "checked";}}}?>  name="kategori_kasus[]" value="Pengelolaan Diri">
                                                <label> Pengelolaan Diri</label><br>
                                                <input type="checkbox" <?php if(!empty($hasil_konseling->kategori_kasus)){$temp=json_decode($hasil_konseling->kategori_kasus); foreach($temp as $fetch){if($fetch=="Kesulitan Belajar Daring"){echo "checked";}}}?>  name="kategori_kasus[]" value="Kesulitan Belajar Daring">
                                                <label> Kesulitan Belajar Daring</label><br>
                                                <input type="checkbox" <?php if(!empty($hasil_konseling->kategori_kasus)){$temp=json_decode($hasil_konseling->kategori_kasus); foreach($temp as $fetch){if($fetch=="Kepercayaan Diri"){echo "checked";}}}?>  name="kategori_kasus[]" value="Kepercayaan Diri">
                                                <label> Kepercayaan Diri</label><br>
                                                <input type="checkbox" <?php if(!empty($hasil_konseling->kategori_kasus)){$temp=json_decode($hasil_konseling->kategori_kasus); foreach($temp as $fetch){if($fetch=="Perencanaan Karir"){echo "checked";}}}?>  name="kategori_kasus[]" value="Perencanaan Karir">
                                                <label> Perencanaan Karir</label><br>
                                                <input onclick="kategori_kasus_show_isian();" type="checkbox" <?php if(!empty($hasil_konseling->kategori_kasus_lainnya)){echo "checked";}?> id="kategori_kasus_lainnya" value="Lainnya">
                                                <label> Lainnya</label><br>
                                                <?php if(empty($hasil_konseling->kategori_kasus_lainnya)){?>
                                                    <input style="display:none;" placeholder="Isi Lainnya ...." type="text" id="kategori_kasus_lainnya_isian" name="kategori_kasus_lainnya" class="form-control">
                                                <?php } else { ?>
                                                    <input placeholder="Isi Lainnya ...." type="text" id="kategori_kasus_lainnya_isian" value="<?php echo $hasil_konseling->kategori_kasus_lainnya;?>" name="kategori_kasus_lainnya" class="form-control">
                                                <?php } ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                                <label class="control-label col-md-3"> Level Kasus </label>
                                                <div class="col-md-9">
                                                    <select class="form-control" required name="level_kasus" data-style="btn-primary" tabindex="-98">
                                                            <option value="">-- PILIH LEVEL KASUS --</option>
                                                            <option <?php if ($hasil_konseling->level_kasus=="Ringan"){echo"Selected";}?> value="Ringan">Ringan</option>
                                                            <option <?php if ($hasil_konseling->level_kasus=="Sedang"){echo"Selected";}?> value="Sedang">Sedang</option>
                                                            <option <?php if ($hasil_konseling->level_kasus=="Berat"){echo"Selected";}?> value="Berat">Berat</option>
                                                    </select>
                                                </div>
                                        </div>

                                        <div class="form-group">
                                                <label class="control-label col-md-3"> Apakah Isian Lengkap </label>
                                                <div class="col-md-9">
                                                    <select class="form-control" required name="is_lengkap" data-style="btn-primary" tabindex="-98">
                                                            <option <?php if ($hasil_konseling->is_lengkap=="0"){echo"Selected";}?> value="0">Belum Lengkap</option>
                                                            <option <?php if ($hasil_konseling->is_lengkap=="1"){echo"Selected";}?> value="1">Sudah Lengkap</option>
                                                    </select>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <label class="control-label col-md-3"> Saran Lanjutan </label>
                                                <div class="col-md-9">
                                                <select class="form-control selectpicker" required name="kesimpulan" data-style="btn-primary" tabindex="-98">
                                                        <option <?php if ($hasil_konseling->kesimpulan=="Jadwalkan Konseling Lanjutan"){echo"Selected";}?> value="Jadwalkan Konseling Lanjutan">Jadwalkan Konseling Lanjutan</option>
                                                        <option <?php if ($hasil_konseling->kesimpulan=="Perlu Rujukan"){echo"Selected";}?> value="Perlu Rujukan">Perlu Rujukan</option>
                                                        <option <?php if ($hasil_konseling->kesimpulan=="Selesai"){echo"Selected";}?> value="Selesai">Selesai</option>
                                                    </select></div>
                                                    <!--===================================================-->
                                        </div>

                                    </div>
                                    <div class="panel-footer text-right">
                                                <button onclick="return confirm('Anda Yakin Simpan ?')" class="btn btn-success btn-block" type="submit">Update Data</button>
                                    </div>
                                    </form>

                                    
                                </div>
                            </div>
                    </div>


                    <!--===================================================-->
                    <!--End page content-->
                </div>

                <script>
                     //show isian kalo kategori kasus diceklis lainnya
                     function kategori_kasus_show_isian(){
                        x = document.getElementById('kategori_kasus_lainnya');
                        y = document.getElementById('kategori_kasus_lainnya_isian');

                        if (x.checked){
                            y.style.display="block";
                        } else {
                            y.style.display="none";
                        }
                    }
                </script>