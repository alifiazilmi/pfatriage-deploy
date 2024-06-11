   <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <div class="pageheader hidden-xs">
                        <h3><i class="fa fa-calendar"></i> Rekapitulasi </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li class="active"> Rekapitulasi </li>
                            </ol>
                        </div>
                    </div>
                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <div class="row">
                     
                            <div class="col-lg-12 col-md-9 col-sm-8 col-xs-12">
                                <div class="panel">
                                    <div class="panel-body pad-no">
                                        <!--Default Tabs (Left Aligned)--> 
                                        <!--===================================================-->
                                        <div class="tab-base">
                                            <!--Nav Tabs-->
                                            <ul class="nav nav-tabs">
                                                <li class="active"> <a data-toggle="tab" href="#demo-dt-basic">Rekapitulasi</a> </li>
                                            </ul>
                                            <!--Tabs Content-->
                                            <div class="tab-content">

                                                  <?php $message = $this->session->flashdata("status"); ?>
                                                  <?=isset($message)?'<div class="alert alert-mint media fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><div class="media-left"><span class="icon-wrap icon-wrap-xs alert-icon"><i class="fa fa-check fa-lg"></i></span> </div><div class="media-body"><h4 class="alert-title">Sukses !</h4><p class="alert-message">'.$message.'</p></div></div>':''; ?>
                                                  <?php $pesan = $this->session->flashdata("warning"); ?>
                                                  <?=isset($pesan)?'<div class="alert alert-danger media fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><div class="media-left"><span class="icon-wrap icon-wrap-xs alert-icon"><i class="fa fa-remove fa-lg"></i></span> </div><div class="media-body"><h4 class="alert-title">Gagal !</h4><p class="alert-message">'.$pesan.'</p></div></div>':''; ?>
                                              
                                                <div id="demo-lft-tab-2"  id="demo-dt-basic" class="tab-pane active in table-responsive">
                                                    

                                                 <div class="pad-btm form-inline">
                                                    <div class="row">
                                                        <form action="" method="GET">
                                                        <div class="col-sm-12">
                                                             <div class="form-group">
                                                      
                                                                    <input type="date" class="form-control" name="start_date" value="<?=(isset($_GET['start_date'])?$_GET['start_date']:'') ?>" required>
                                                                    <input type="date" class="form-control" name="end_date" value="<?=(isset($_GET['end_date'])?$_GET['end_date']:'') ?>" required>
                                                                    <div class="form-group">
                                                                    <select class="form-control" name="status">
                                                                        <option <?=(isset($_GET['status'])?($_GET['status'] == 'semua'? 'selected' :'' ):'') ?> value="semua">Semua</option>
                                                                        <?php foreach ($status_konseling as $key): ?>
                                                                            <option <?=(isset($_GET['status'])?($_GET['status'] == $key->id_status_konseling ? 'selected':'' ):'') ?> value="<?= $key->id_status_konseling ?>">
                                                                                <?= $key->status ?>
                                                                            </option>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                <button class="btn btn-primary" type="submit"><span class="fa fa-search"></span> Cari</button>

                                                            </div>
                                                             <div class="form-group">
                                                                 <button class="btn btn-success" formaction="<?= base_url('admin/downloadexcelrange') ?>" type="submit"><span class="fa fa-download"></span> Excel</button>
                                                            </div>

                                                            <div class="row">
                                                                
                                                         
                                                            <div class="col-sm-6">  


                                                                    <br>
                                                                    <input type="checkbox" value="1" <?= isset($_GET['waktu_pengajuan']) ? 'checked':'' ?> name="waktu_pengajuan"> Tanggal Pengajuan
                                                                    <br>
                                                                    
                                                                     <input type="checkbox" value="1" <?= isset($_GET['display_name']) ? 'checked':'' ?> name="display_name"> Nama Mahasiswa
                                                                    <br>
                                                                     <input type="checkbox" value="1" <?= isset($_GET['jenjang']) ? 'checked':'' ?> name="jenjang"> Jenjang
                                                                    <br>
                                                                     <input type="checkbox" value="1" <?= isset($_GET['fakultas']) ? 'checked':'' ?> name="fakultas"> Fakultas
                                                                    <br>
                                                                     <input type="checkbox" value="1" <?= isset($_GET['prodi']) ? 'checked':'' ?> name="prodi"> Prodi
                                                                    <br>
                                                                     <input type="checkbox" value="1" <?= isset($_GET['nama_lengkap']) ? 'checked':'' ?> name="nama_lengkap"> Nama Konselor
                                                                    <br>
                                                                    <input type="checkbox" value="1" <?= isset($_GET['venue']) ? 'checked':'' ?> name="venue"> Tempat
                                                                    <br>
                                                                    <input type="checkbox" value="1" <?= isset($_GET['no_hp']) ? 'checked':'' ?> name="no_hp"> No Hp
                                                                    <br>
                                                                    <input type="checkbox" value="1" <?= isset($_GET['email']) ? 'checked':'' ?> name="email"> Email
                                                                    <br>
                                                                    <input type="checkbox" value="1" <?= isset($_GET['waktu_mulai_konseling']) ? 'checked':'' ?> name="waktu_mulai_konseling"> Waktu Mulai Konseling
                                                                    <br>
                                                                    <input type="checkbox" value="1" <?= isset($_GET['waktu_akhir_konseling']) ? 'checked':'' ?> name="waktu_akhir_konseling"> Waktu Akhir Konseling 
                                                                    <br>
                                                                    <input type="checkbox" value="1" <?= isset($_GET['durasi_konseling']) ? 'checked':'' ?> name="durasi_konseling"> Durasi Konseling
                                                                    <br>
                                                                    <input type="checkbox" value="1" <?= isset($_GET['resume_konsultasi']) ? 'checked':'' ?> name="resume_konsultasi"> Resume Konsultasi
                                                                    <br>
                                                                    <input type="checkbox" value="1" <?= isset($_GET['catatan_dosen_wali']) ? 'checked':'' ?> name="catatan_dosen_wali"> Catatan Dosen Wali
                                                                    <br>
                                                                    <input type="checkbox" value="1" <?= isset($_GET['catatan_orang_tua']) ? 'checked':'' ?> name="catatan_orang_tua"> Catatan orang Tua
                                                                    <br>
                                                                    <input type="checkbox" value="1" <?= isset($_GET['saran']) ? 'checked':'' ?> name="saran"> Saran
                                                                
                                                            </div>

                                                             <div class="col-sm-6">

                                                                    <br>
                                                                    <input type="checkbox" value="1" <?= isset($_GET['kesimpulan']) ? 'checked':'' ?> name="kesimpulan"> Kesimpulan
                                                                    <br>
                                                                    <input type="checkbox" value="1" <?= isset($_GET['alasan_konsultasi']) ? 'checked':'' ?> name="alasan_konsultasi"> Alasan Konsultasi
                                                                    <br>
                                                                    <input type="checkbox" value="1" <?= isset($_GET['ringkasan_analisa_permasalahan']) ? 'checked':'' ?> name="ringkasan_analisa_permasalahan"> Ringkasan Analisa Permasalahan
                                                                    <br>
                                                                    <input type="checkbox" value="1" <?= isset($_GET['tindakan_kuratif']) ? 'checked':'' ?> name="tindakan_kuratif"> Tindakan Kuratif
                                                                    <br>
                                                                    <input type="checkbox" value="1" <?= isset($_GET['rekomendasi']) ? 'checked':'' ?> name="rekomendasi"> Rekomendasi
                                                                    <br>
                                                                    <input type="checkbox" value="1" <?= isset($_GET['catatan_observasi']) ? 'checked':'' ?> name="catatan_observasi"> Catatan Observasi
                                                                    <br>
                                                                    <input type="checkbox" value="1" <?= isset($_GET['kategori_kasus']) ? 'checked':'' ?> name="kategori_kasus"> Kategori Kasus
                                                                    <br>
                                                                    <input type="checkbox" value="1" <?= isset($_GET['kategori_kasus_lainnya']) ? 'checked':'' ?> name="kategori_kasus_lainnya"> Kategori Kasus Lainnya
                                                                    <br>
                                                                    <input type="checkbox" value="1" <?= isset($_GET['level_kasus']) ? 'checked':'' ?> name="level_kasus"> Level Kasus
                                                                    <br>
                                                                    <input type="checkbox" value="1" <?= isset($_GET['status2']) ? 'checked':'' ?> name="status2"> Status
                                                                
                                                            </div>

                                                               </div>
                                                                    
                                                                  
                                                          
                                                            </div>

                                                            
                                                        </div>
                                                        </form>

                                                    </div>
                                                </div>

                                                    <hr>
                                                    <h4>Data Konseling</h4>
                                                    <hr>
                                                  <table id="tableRekap" class="table table-hover table-vcenter" style="width: 100%">
                                                        <thead>

                                                            <th>No</th>
                                                            <?php if (isset($_GET['status2'])): ?>
                                                            <th>Status</th>
                                                            <?php endif ?>

                                                             <?php if (isset($_GET['waktu_pengajuan'])): ?>
                                                            <th>Tanggal Pengajuan</th>
                                                            <?php endif ?>

                                                             <?php if (isset($_GET['display_name'])): ?>
                                                            <th>Nama Mahasiswa</th>
                                                            <?php endif ?>

                                                              <?php if (isset($_GET['jenjang'])): ?>
                                                            <th>Jenjang</th>
                                                            <?php endif ?>

                                                            <?php if (isset($_GET['fakultas'])): ?>
                                                            <th>Fakultas</th>
                                                            <?php endif ?>

                                                              <?php if (isset($_GET['prodi'])): ?>
                                                            <th>Prodi</th>
                                                            <?php endif ?>

                                                             <?php if (isset($_GET['nama_lengkap'])): ?>
                                                            <th>Nama Konselor</th>
                                                            <?php endif ?>

                                                             <?php if (isset($_GET['venue'])): ?>
                                                            <th>Tempat</th>
                                                            <?php endif ?>

                                                             <?php if (isset($_GET['no_hp'])): ?>
                                                            <th>No Hp</th>
                                                            <?php endif ?>

                                                             <?php if (isset($_GET['email'])): ?>
                                                            <th>Email</th>
                                                            <?php endif ?>

                                                             <?php if (isset($_GET['waktu_mulai_konseling'])): ?>
                                                                <th>Waktu Mulai Konseling</th>
                                                            <?php endif ?>

                                                             <?php if (isset($_GET['waktu_akhir_konseling'])): ?>
                                                            <th>Waktu Akhir Konseling</th>
                                                            <?php endif ?>

                                                             <?php if (isset($_GET['durasi_konseling'])): ?>
                                                            <th>Durasi Konseling</th>
                                                            <?php endif ?>

                                                             <?php if (isset($_GET['kategori_permasalahan'])): ?>
                                                            <th>Kategori Permasalahan</th>
                                                            <?php endif ?>

                                                             <?php if (isset($_GET['resume_konsultasi'])): ?>
                                                            <th>Resume Konsultasi</th>
                                                            <?php endif ?>

                                                             <?php if (isset($_GET['catatan_dosen_wali'])): ?>
                                                            <th>Catatan Dosen Wali</th>
                                                            <?php endif ?>

                                                             <?php if (isset($_GET['catatan_orang_tua'])): ?>
                                                            <th>Catatan Orang Tua</th>
                                                            <?php endif ?>

                                                             <?php if (isset($_GET['saran'])): ?>
                                                            <th>Saran</th>
                                                            <?php endif ?>

                                                             <?php if (isset($_GET['kesimpulan'])): ?>
                                                            <th>Kesimpulan</th>
                                                            <?php endif ?>

                                                             <?php if (isset($_GET['alasan_konsultasi'])): ?>
                                                            <th>Alasan Konsultasi</th>
                                                            <?php endif ?>

                                                             <?php if (isset($_GET['ringkasan_analisa_permasalahan'])): ?>
                                                            <th>Ringkasan Analisa Permasalahan</th>
                                                            <?php endif ?>

                                                             <?php if (isset($_GET['tindakan_kuratif'])): ?>
                                                            <th>Tindakan Kuratif</th>
                                                            <?php endif ?>

                                                             <?php if (isset($_GET['rekomendasi'])): ?>
                                                            <th>Rekomendasi</th>
                                                            <?php endif ?>

                                                             <?php if (isset($_GET['catatan_observasi'])): ?>
                                                            <th>Catatan Observasi</th>
                                                            <?php endif ?>

                                                             <?php if (isset($_GET['kategori_kasus'])): ?>
                                                            <th>Kategori Kasus</th>
                                                            <?php endif ?>
                                                             <?php if (isset($_GET['kategori_kasus_lainnya'])): ?>
                                                            <th>Kategori Kasus Lainnya</th>
                                                            <?php endif ?>
                                                             <?php if (isset($_GET['level_kasus'])): ?>
                                                            <th>Level Kasus</th>
                                                            <?php endif ?>

                                                            
                                                        </thead>
                                                        <tbody>

                                                            <?php $i=0; foreach ($rekap as $key): $i++; ?>
                                                                <tr>
                                                                    <td><?= $i; ?></td>
                                                                    <?php if (isset($_GET['status2'])): ?>
                                                                        <td><?= $key->status ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['waktu_pengajuan'])): ?>
                                                                        <td><?= format_date_form($key->waktu_pengajuan) ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['display_name'])): ?>
                                                                        <td><?= $key->display_name ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['nama_lengkap'])): ?>
                                                                        <td><?= $key->nama_lengkap ?></td>
                                                                    <?php endif ?>
                                                                    <?php if (isset($_GET['jenjang'])): ?>
                                                                        <td><?= $key->prodi_jenjang ?></td>
                                                                    <?php endif ?>
                                                                    <?php if (isset($_GET['fakultas'])): ?>
                                                                        <td><?= $key->nama_fakultas ?></td>
                                                                    <?php endif ?>
                                                                    <?php if (isset($_GET['prodi'])): ?>
                                                                        <td><?= $key->nama_prodi ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['venue'])): ?>
                                                                        <td><?= $key->venue ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['no_hp'])): ?>
                                                                        <td><?= $key->no_hp ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['email'])): ?>
                                                                        <td><?= $key->email ?></td>
                                                                    <?php endif ?>
                                                                    <?php if (isset($_GET['waktu_mulai_konseling'])): ?>
                                                                        <td><?= $key->waktu_mulai_konseling ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['waktu_akhir_konseling'])): ?>
                                                                        <td><?= $key->waktu_akhir_konseling ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['durasi_konseling'])): ?>
                                                                        <td><?= $key->durasi_konseling ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['kategori_permasalahan'])): ?>
                                                                        <td><?= $key->kategori_permasalahan ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['resume_konsultasi'])): ?>
                                                                        <td><?= $key->resume_konsultasi ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['catatan_dosen_wali'])): ?>
                                                                        <td><?= $key->catatan_dosen_wali ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['catatan_orang_tua'])): ?>
                                                                        <td><?= $key->catatan_orang_tua ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['saran'])): ?>
                                                                        <td><?= $key->saran ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['kesimpulan'])): ?>
                                                                        <td><?= $key->kesimpulan ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['alasan_konsultasi'])): ?>
                                                                        <td><?= $key->alasan_konsultasi ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['ringkasan_analisa_permasalahan'])): ?>
                                                                        <td><?= $key->ringkasan_analisa_permasalahan ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['tindakan_kuratif'])): ?>
                                                                        <td><?= $key->tindakan_kuratif ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['rekomendasi'])): ?>
                                                                        <td><?= $key->rekomendasi ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['catatan_observasi'])): ?>
                                                                        <td><?= $key->catatan_observasi ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['kategori_kasus'])): ?>
                                                                        <td><?= $key->kategori_kasus ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['kategori_kasus_lainnya'])): ?>
                                                                        <td><?= $key->kategori_kasus_lainnya ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['level_kasus'])): ?>
                                                                        <td><?= $key->level_kasus ?></td>
                                                                    <?php endif ?>
                                                                </tr>
                                                                <?php endforeach ?>
                                                            
                                                           
                                                      
                                                        </tbody>
                                                    </table>



                                                    <!--===================================================-->
                                                    <!--End Hover Rows-->
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


                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Jadwal</h4>
                      </div>
                      <form class="form-horizontal" method="POST" action="<?= base_url('admin/simpanjadwal') ?>">
                      <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                                
                                                
                                                      
                                                            <div class="panel-body">
                                                                
                                                                 <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="demo-hor-inputpass">Status</label>
                                                                    <div class="col-sm-9">
                                                                        <select class="form-control" name="id_user">
                                                                            <?php foreach ($konselor as $value): ?>
                                                                                <option value="<?= $value->id_user ?>"><?= $value->nama_lengkap ?></option>
                                                                            <?php endforeach ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="demo-hor-inputemail">Tanggal</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="date" name="tanggal" class="form-control">
                                                                    </div>
                                                                </div>
                                                               <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="demo-hor-inputemail">Jam Mulai</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="time" name="jam_mulai" class="form-control">
                                                                    </div>
                                                                </div>
                                                                  <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="demo-hor-inputemail">Jam Selesai</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="time" name="jam_akhir" class="form-control">
                                                                    </div>
                                                                </div>
                                                                
                                                               
                                                            </div>
                                                         
                                                       
                                              

                                    </div>
                                </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
     </form>
    </div>
  </div>
</div>