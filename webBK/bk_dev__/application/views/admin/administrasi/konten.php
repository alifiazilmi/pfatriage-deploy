   <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <div class="pageheader hidden-xs">
                        <h3><i class="fa fa-user"></i> Konten Utama </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li class="active"> Konten </li>
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
                                                <li class="active"> <a data-toggle="tab" href="#demo-lft-tab-1">No Darurat</a> </li>
                                                <li > <a data-toggle="tab" href="#demo-lft-tab-3">What We Do</a> </li>
                                                <li > <a data-toggle="tab" href="#demo-lft-tab-2">Berita/Pengumuman</a> </li>
                                                <li > <a data-toggle="tab" href="#demo-lft-tab-4">Artikel</a> </li>
                                                
                                            </ul>
                                            <!--Tabs Content-->
                                            <div class="tab-content">
                                              
                                                <div id="demo-lft-tab-1" class="tab-pane active in">

                                                          <?php $message = $this->session->flashdata("status"); ?>
                                                          <?=isset($message)?'<div class="alert alert-mint media fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><div class="media-left"><span class="icon-wrap icon-wrap-xs alert-icon"><i class="fa fa-check fa-lg"></i></span> </div><div class="media-body"><h4 class="alert-title">Sukses !</h4><p class="alert-message">'.$message.'</p></div></div>':''; ?>
                                                          <?php $pesan = $this->session->flashdata("warning"); ?>
                                                          <?=isset($pesan)?'<div class="alert alert-danger media fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><div class="media-left"><span class="icon-wrap icon-wrap-xs alert-icon"><i class="fa fa-remove fa-lg"></i></span> </div><div class="media-body"><h4 class="alert-title">Gagal !</h4><p class="alert-message">'.$pesan.'</p></div></div>':''; ?>

                                                          <form class="form-horizontal" method="POST" action="<?= base_url('admin/updno') ?>">
                                                            <div class="panel-body">
                                                                <?php $i=0; foreach ($telp_darurat as $key): $i++ ?>

                                                                <div class="form-group">
                                                                    <label class="col-sm-1 control-label" for="demo-hor-inputemail"><?= $i; ?>.</label>
                                                                    <div class="col-sm-11">
                                                                        <input type="text" value="<?= $key->no_darurat; ?>" name="val_<?= $key->bk_id_no; ?>" placeholder="No Darurat 1" id="<?= $key->bk_id_no; ?>" class="form-control">
                                                                        <input type="hidden" value="<?= $key->bk_id_no; ?>" name="<?= $key->bk_id_no; ?>" placeholder="No Darurat 1" id="<?= $key->bk_id_no; ?>" class="form-control">
                                                                    </div>
                                                                </div>
                                                                    
                                                                <?php endforeach ?>
                                                                
                                                               
                                                            </div>
                                                            <div class="panel-footer text-right">
                                                                <button class="btn btn-info" type="submit">Update</button>
                                                            </div>
                                                            </form>
                                                        </form>

                                                </div>

                                                <div id="demo-lft-tab-2" class="tab-pane fade in">

                                                      <?php $message = $this->session->flashdata("status"); ?>
                                                          <?=isset($message)?'<div class="alert alert-mint media fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><div class="media-left"><span class="icon-wrap icon-wrap-xs alert-icon"><i class="fa fa-check fa-lg"></i></span> </div><div class="media-body"><h4 class="alert-title">Sukses !</h4><p class="alert-message">'.$message.'</p></div></div>':''; ?>
                                                          <?php $pesan = $this->session->flashdata("warning"); ?>
                                                          <?=isset($pesan)?'<div class="alert alert-danger media fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><div class="media-left"><span class="icon-wrap icon-wrap-xs alert-icon"><i class="fa fa-remove fa-lg"></i></span> </div><div class="media-body"><h4 class="alert-title">Gagal !</h4><p class="alert-message">'.$pesan.'</p></div></div>':''; ?>
                                                           <form class="form-horizontal" method="POST" action="<?= base_url('admin/updwedo') ?>">
                                                            <div class="panel-body">

                                                                    <div class="pad-btm form-inline">
                                                                        <div class="row">

                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <a class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Berita/Pengumuman</a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6 text-xs-center text-right">
                                                                                <div class="form-group">
                                                                                    <input id="demo-input-search2" type="text" placeholder="Search" class="form-control" autocomplete="off">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <table id="tableBanner" class="table table-hover table-vcenter" style="width: 100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 5%">No</th>
                                                                        <th style="width: 30%">Judul</th>
                                                                        <th style="width: 10%">Jenis Konten</th>
                                                                        <th style="width: 30%">Status</th>
                                                                        <th style="width: 10%">Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    <?php $i=0; foreach ($banner as $key ): $i++; ?>
                                                                        
                                                                        <tr>
                                                                            <td><?= $i; ?></td>
                                                                             <td><?= $key->judul; ?></td>
                                                                            <td>
                                                                                <?php if ($key->id_jenis_konten == 0): ?>
                                                                                    <?= 'Berita' ?>
                                                                                <?php else: ?>
                                                                                    <?= 'Pengumuman' ?>
                                                                                <?php endif ?>
                                                                            </td>

                                                                             <td>
                                                                                <?php if ($key->aktif == 0): ?>
                                                                                    <?= '<b style="color:red">Nonaktif<b>' ?>
                                                                                <?php else: ?>
                                                                                    <?= '<b style="color:green">Aktif<b>' ?>
                                                                                <?php endif ?>
                                                                            </td>
                                                                           
                                                                            <td>
                                                                                 <a href="<?= base_url('admin/editkonten').'/'.$key->id_banner ?>" class="btn btn-success"><span class="fa fa-pencil"></span></a>
                                                                                <a onclick="return confirm('Anda Yakin akan Menghapus Foto Kegiatan ini ?')" href="<?= base_url('admin/hapusbanner').'/'.$key->id_banner ?>" class="btn btn-danger"><span class="fa fa-remove"></span></a>





                                                                            </td>
                                                                        </tr>


                                                                    <?php endforeach ?>
                                                            
                                                              
                                                                </tbody>
                                                            </table>
                                                               
                                                            </div>
                                                            <div class="panel-footer text-right">
                                                            </div>
                                                        </form>

                                                </div>

                                                 <div id="demo-lft-tab-3" class="tab-pane fade in">

                                                          <?php $message = $this->session->flashdata("status"); ?>
                                                          <?=isset($message)?'<div class="alert alert-mint media fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><div class="media-left"><span class="icon-wrap icon-wrap-xs alert-icon"><i class="fa fa-check fa-lg"></i></span> </div><div class="media-body"><h4 class="alert-title">Sukses !</h4><p class="alert-message">'.$message.'</p></div></div>':''; ?>
                                                          <?php $pesan = $this->session->flashdata("warning"); ?>
                                                          <?=isset($pesan)?'<div class="alert alert-danger media fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><div class="media-left"><span class="icon-wrap icon-wrap-xs alert-icon"><i class="fa fa-remove fa-lg"></i></span> </div><div class="media-body"><h4 class="alert-title">Gagal !</h4><p class="alert-message">'.$pesan.'</p></div></div>':''; ?>


                                                            <form class="form-horizontal" method="POST" action="<?= base_url('admin/updwedo') ?>">
                                                            <div class="panel-body">
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label" for="demo-hor-inputemail">What We Do</label>
                                                                    <div class="col-sm-10">
                                                                        <textarea class="form-control" name="wedo" id="wedo" rows="12"><?= $wedo->wedo ?></textarea>
                                                                    </div>
                                                                </div>
                                                               
                                                            </div>
                                                            <div class="panel-footer text-right">
                                                                <button class="btn btn-info" type="submit">Simpan</button>
                                                            </div>
                                                        </form>

                                                </div>


                                                  <div id="demo-lft-tab-4" class="tab-pane fade in">

                                                      <?php $message = $this->session->flashdata("status"); ?>
                                                          <?=isset($message)?'<div class="alert alert-mint media fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><div class="media-left"><span class="icon-wrap icon-wrap-xs alert-icon"><i class="fa fa-check fa-lg"></i></span> </div><div class="media-body"><h4 class="alert-title">Sukses !</h4><p class="alert-message">'.$message.'</p></div></div>':''; ?>
                                                          <?php $pesan = $this->session->flashdata("warning"); ?>
                                                          <?=isset($pesan)?'<div class="alert alert-danger media fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><div class="media-left"><span class="icon-wrap icon-wrap-xs alert-icon"><i class="fa fa-remove fa-lg"></i></span> </div><div class="media-body"><h4 class="alert-title">Gagal !</h4><p class="alert-message">'.$pesan.'</p></div></div>':''; ?>
                                                           <form class="form-horizontal" method="POST" action="<?= base_url('admin/updwedo') ?>">
                                                            <div class="panel-body">

                                                                    <div class="pad-btm form-inline">
                                                                        <div class="row">

                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <a class="btn btn-primary" data-toggle="modal" data-target="#myModalArtikel"><span class="fa fa-plus"></span> Artikel</a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6 text-xs-center text-right">
                                                                                <div class="form-group">
                                                                                    <input id="demo-input-search2" type="text" placeholder="Search" class="form-control" autocomplete="off">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <table id="tableArtikel" class="table table-hover table-vcenter" style="width: 100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 5%">No</th>
                                                                        <th style="width: 20%">Background</th>
                                                                        <th style="width: 15%">Judul</th>
                                                                        <th >Artikel</th>
                                                                        <th style="width: 10%">Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    <?php $z=0; foreach ($artikel as $keyArtikel): $z++; ?>
                                                                        <tr>
                                                                            <td><?= $z ?></td>
                                                                             <td><img src="<?= base_url('assets/front/images').'/'.$keyArtikel->background  ?>" width="300px" height="200px">
                                                                            <td><?= $keyArtikel->judul ?></td>
                                                                            <td><?= strip_tags($keyArtikel->artikel) ?></td>
                                                                            <td><a onclick="return confirm('Anda Yakin akan Menghapus Artikel ini ?')" href="<?= base_url('admin/hapusartikel').'/'.$keyArtikel->id_artikel ?>" class="btn btn-danger"><span class="fa fa-remove"></span></a></td>
                                                                        </tr>
                                                                    <?php endforeach ?>

                                                              
                                                                </tbody>
                                                            </table>
                                                               
                                                            </div>
                                                            <div class="panel-footer text-right">
                                                               
                                                            </div>
                                                        </form>

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
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Berita/Pengumuman</h4>
      </div>
      <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?= base_url('admin/simpanbanner') ?>">
      <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                                 <div class="panel-body">

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="demo-hor-inputemail">Jenis Konten</label>
                                                    <div class="col-sm-9">
                                                       <select class="form-control" name="id_jenis_konten" id="jen_ko" required>
                                                            <option value="#">-pilih-</option>
                                                            <option value="0">Berita</option>
                                                            <option value="1">Pengumuman</option>
                                                
                                                       </select>
                                                    </div>
                                                </div>

                                                <div id="box-hide">
                                                    
                                                </div>
                                               
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="demo-hor-inputemail">Gambar</label>
                                                    <div class="col-sm-9">
                                                        <input type="file" name="img" class="form-control" required>
                                                        <b>*foto/gambar dengan Perbandingan Resolusi 16:9</b>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="demo-hor-inputemail">Judul</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="judul" class="form-control" required>
                                                    </div>
                                                </div>


                                                  <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="demo-hor-inputpass">Konten</label>
                                                    <div class="col-sm-9">
                                                       <textarea class="form-control" id="artikelpane2" name="quotes" rows="10" ></textarea>
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


                <div class="modal fade " id="myModalArtikel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Artikel</h4>
      </div>
      <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?= base_url('admin/simpanartikel') ?>">
      <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                                
                                
                                      
                                            <div class="panel-body">
                                               
                                                <div class="form-group">

                                                    <label class="col-sm-2 control-label" for="demo-hor-inputemail">Gambar</label>
                                                    <div class="col-sm-9">
                                                        <input type="file" name="background" class="form-control" required>
                                                        <b>*foto/gambar dengan Perbandingan Resolusi 16:9</b>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="demo-hor-inputemail">Judul</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="judul" class="form-control" required>
                                                    </div>
                                                </div>

                                                  <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="demo-hor-inputpass">Artikel</label>
                                                    <div class="col-sm-9">
                                                       <textarea class="form-control" id="artikelpane" name="artikel" rows="6"></textarea>
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