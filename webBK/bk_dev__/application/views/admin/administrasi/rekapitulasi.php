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
                                                        <form>
                                                        <div class="col-sm-12">
                                                             <div class="form-group">
                                                                <form action="">
                                                                    <input type="date" class="form-control" name="start_date" value="<?=(isset($_GET['start_date'])?$_GET['start_date']:'') ?>">
                                                                    <input type="date" class="form-control" name="end_date" value="<?=(isset($_GET['end_date'])?$_GET['end_date']:'') ?>">
                                                                </form>
                                                            </div>
                                                            <div class="form-group">
                                                                <button class="btn btn-primary" type="submit"><span class="fa fa-search"></span> Cari</button>

                                                            </div>
                                                             <div class="form-group">
                                                                <a class="btn btn-success" href="<?= base_url('admin/downloadrekap/') ?><?=(isset($_GET['start_date'])?$_GET['start_date']:date('Y-m-d')).'/'.(isset($_GET['end_date'])?$_GET['end_date']:date('Y-m-d')) ?>"><span class="fa fa-download"></span> PDF</a>

                                                                 <a class="btn btn-success" href="<?= base_url('admin/downloadexcel/') ?><?=(isset($_GET['start_date'])?$_GET['start_date']:date('Y-m-d')).'/'.(isset($_GET['end_date'])?$_GET['end_date']:date('Y-m-d')) ?>"><span class="fa fa-download"></span> Excel</a>
                                                            </div>
                                                        </div>
                                                        </form>

                                                    </div>
                                                </div>

                                                    <hr>
                                                    <h4>1. Rekapitulasi Konselor Berdasarkan Jumlah Konseling dan Jam Penanganan</h4>
                                                    <hr>
                                                  <table id="tableRekap" class="table table-hover table-vcenter" style="width: 100%">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 5%">No</th>
                                                                <th style="width: 30%">Konselor</th>
                                                                <th style="width: 15%">Jumlah Konseling</th>
                                                                <th style="width: 10%">Jumlah Jam Penanganan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            
                                                            <?php $i=0; foreach ($rekap as $key): $i++; ?>
                                                                
                                                                <tr>
                                                                    <td><?= $i; ?></td>
                                                                    <td><?= $key->gelar_depan.' '.$key->full_name.' '.$key->gelar_belakang ?></td>
                                                                    <td><?= $key->jumlah_menangani ?></td>
                                                                    <td><?= $key->jumlah_menit_menengani ?></td>
                                                                </tr>

                                                            <?php endforeach ?>
                                                           
                                                      
                                                        </tbody>
                                                    </table>

                                                    <hr>
                                                    <h4>2. Rekapitulasi Pelayanan Konseling</h4>
                                                    <hr>
                                                    <br>

                                                     <table id="tableRekap2" class="table table-hover table-vcenter" style="width: 100%">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 5%">No</th>
                                                                <th style="width: 30%">Tanggal</th>
                                                                <th style="width: 15%">Nama</th>
                                                                <th style="width: 10%">NIM</th>
                                                                <th style="width: 10%">Fakultas/Sekolah</th>
                                                                <th style="width: 10%">Jenis Masalah</th>
                                                                <th style="width: 10%">Psikolog</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            
                                                            <?php $i=0; foreach ($rekap_detail as $key2): $i++; ?>
                                                                
                                                                <tr>
                                                                    <td><?= $i; ?></td>
                                                                    <td><?= tanggal_indo_lengkap($key2->waktu_konseling, TRUE)?></td>
                                                                    <td><?= $key2->display_name ?></td>
                                                                    <td><?= ($key2->nim != '' ?$key2->nim :$key2->nim_tpb ) ?></td>
                                                                    <td><?= $key2->prodi_jenjang.'/'.$key2->nama_prodi.'/'.$key2->nama_fakultas ?></td>
                                                                    <td>
                                                                        <?php $arr_masalah = json_decode($key2->id_kategori_masalah); ?>
                                                             
                                                                          <?php foreach ($masalah as $masalah_key){ ?>
                                                                              <?php if (!empty($arr_masalah)){ ?>

                                                                                    <?php if (in_array($masalah_key->id_kategori_masalah, $arr_masalah)): ?>
                                                                                      <b><?=$masalah_key->kategori_masalah?>,</b>
                                                                                      
                                                                                    <?php endif ?>
                                                                                
                                                                              <?php } ?>
                                                                              
                                                                          <?php } ?>
                                                                    </td>
                                                                    <td><?= $key2->nama_lengkap ?></td>
                                                                </tr>

                                                            <?php endforeach ?>
                                                           
                                                      
                                                        </tbody>
                                                    </table>


                                                    <hr>
                                                    <h4>3. Rincian Pelayanan Konseling BK Per Fakultas</h4>
                                                    <hr>
                                                  <table id="tableRekap3" class="table table-hover table-vcenter" style="width: 100%">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 5%">No</th>
                                                                <th style="width: 30%">Fakultas/Sekolah</th>
                                                                <th style="width: 15%">Volume</th>
                                                                <th style="width: 10%">Satuan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            
                                                            <?php $i=0; foreach ($rekap_fakultas as $key3): $i++; ?>
                                                                
                                                                <tr>
                                                                    <td><?= $i; ?></td>
                                                                    <td><?= $key3->nama_fakultas ?></td>
                                                                    <td><?= $key3->jumlah ?></td>
                                                                    <td>Pelayanan</td>
                                                                </tr>

                                                            <?php endforeach ?>
                                                           
                                                      
                                                        </tbody>
                                                    </table>

                                                    <hr>
                                                    <h4>4. Beban Kerja Psikolog</h4>
                                                    <hr>
                                                    <br>

                                                     <table id="tableRekap2" class="table table-hover table-vcenter" style="width: 100%">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 5%">No</th>
                                                                <th style="width: 15%">Nama</th>
                                                                <th style="width: 10%">Rincian Kegiatan</th>
                                                                <th style="width: 10%">Volume</th>
                                                                <th style="width: 10%">Satuan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            
                                                            <?php $i=0; foreach ($rekap_konselor as $key4): $i++; ?>
                                                                
                                                                <tr>
                                                                    <td><?= $i; ?></td>
                                                                    <td><?= $key4->gelar_depan.' '.$key4->nama_lengkap.' '.$key4->gelar_belakang ?></td>
                                                                    <td>Konseling</td>
                                                                    <td><?= $key4->jumlah ?></td>
                                                                    <td>Layanan</td>
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