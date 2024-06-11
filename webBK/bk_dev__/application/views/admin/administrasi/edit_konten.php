
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <div class="pageheader hidden-xs">
                        <h3><i class="fa fa-user"></i> Berita/Pengumuman </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li class="active"> Edit Konten </li>
                            </ol>
                        </div>
                    </div>
                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <div class="row">
                         
                            <div class="col-sm-12">



                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Edit Konten</h3>
                            </div>
                            <div class="panel-body">
                            	 	  <?php $message = $this->session->flashdata("status"); ?>
							          <?=isset($message)?'<div class="alert alert-mint media fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><div class="media-left"><span class="icon-wrap icon-wrap-xs alert-icon"><i class="fa fa-check fa-lg"></i></span> </div><div class="media-body"><h4 class="alert-title">Sukses !</h4><p class="alert-message">'.$message.'</p></div></div>':''; ?>
							          <?php $pesan = $this->session->flashdata("warning"); ?>
							          <?=isset($pesan)?'<div class="alert alert-danger media fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><div class="media-left"><span class="icon-wrap icon-wrap-xs alert-icon"><i class="fa fa-remove fa-lg"></i></span> </div><div class="media-body"><h4 class="alert-title">Gagal !</h4><p class="alert-message">'.$pesan.'</p></div></div>':''; ?>

                                             <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?= base_url('admin/updatebanner') ?>">
                                                <input type="hidden" name="id_banner" value="<?= $konten->id_banner ?>">


                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="demo-hor-inputemail">Status Aktif</label>
                                                    <div class="col-sm-9">
                                                       <select class="form-control" name="aktif" id="jen_ko" required>
                                                            <option value="#">-pilih-</option>
                                                            <option <?= ($konten->aktif == 0 ?'selected':'') ?> value="0">Non Aktif</option>
                                                            <option <?= ($konten->aktif == 1 ?'selected':'') ?> value="1">Aktif</option>
                                                
                                                       </select>
                                                    </div>
                                                </div>
                                           

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="demo-hor-inputemail">Jenis Konten</label>
                                                    <div class="col-sm-9">
                                                       <select class="form-control" name="id_jenis_konten" id="jen_ko" required>
                                                            <option value="#">-pilih-</option>
                                                            <option <?= ($konten->id_jenis_konten == 0 ?'selected':'') ?> value="0">Berita</option>
                                                            <option <?= ($konten->id_jenis_konten == 1 ?'selected':'') ?> value="1">Pengumuman</option>
                                                
                                                       </select>
                                                    </div>
                                                </div>
                                               

                                               

                                                 <div class="form-group">
                                                        <label class="col-sm-2 control-label" for="demo-hor-inputemail">Tanggal Awal</label>
                                                        <div class="col-sm-9">
                                                            <input type="date" name="tgl_mulai" value="<?= (isset($konten->tgl_mulai) ?$konten->tgl_mulai:'') ?>" class="form-control" >
                                                            <b>*khusus pengumuman</b>
                                                        </div>

                                                        
                                                    </div>

                                                 <br>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label" for="demo-hor-inputemail">Tanggal Berakhir</label>
                                                        <div class="col-sm-9">
                                                            <input type="date" name="tgl_berakhir" value="<?= (isset($konten->tgl_berakhir) ?$konten->tgl_berakhir:'') ?>" class="form-control" >

                                                        <b>*khusus pengumuman</b>
                                                        </div>
                                                    </div>

                                                   <br>
                                               
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="demo-hor-inputemail">Gambar</label>
                                                    <div class="col-sm-9">
                                                        <input type="file" name="img" class="form-control">
                                                        <b>*foto/gambar dengan Perbandingan Resolusi 16:9</b>
                                                    </div>
                                                </div>
                                     
                                                <br>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="demo-hor-inputemail">Judul</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="judul" class="form-control" value="<?= (isset($konten->judul) ?$konten->judul:'') ?>"  required>
                                                    </div>
                                                </div>
                                                


                                                  <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="demo-hor-inputpass">Konten</label>
                                                    <div class="col-sm-9">
                                                       <textarea class="form-control" id="artikelpane2" name="quotes" rows="10" ><?= (isset($konten->quotes) ?$konten->quotes:'') ?> </textarea>
                                                    </div>
                                                </div>





                                                        <div class="row">


                                                            <div class="col-sm-12" style="text-align: center; margin-top: 10px">
                                                                <div class="form-group">
                                                                    <button class="btn btn-success" type="submit"> Perbaharui</button>
                                                                </div>
                                                            </div>
                                                           
                                                        </div>

                                                    </form>
                                                      


                               
                            </div>
                            <!--===================================================-->
                            <!-- End Foo Table - Add & Remove Rows -->
                        </div>
                             
                              
                            </div>
                        </div>
                   
                    </div>
                    <!--===================================================-->
                    <!--End page content-->
                </div>




