   <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <div class="pageheader hidden-xs">
                        <h3><i class="fa fa-user"></i> Pendaftar </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li> Penjadwalan </li>
                                <li class="active"> Penjadwalan/Pendaftaran Manual </li>
                            </ol>
                        </div>
                    </div>
                    <!--Page content-->
                    <!--===================================================-->

                    <div id="page-content">

                        <div class="row">
                            
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="panel">
                                    <div class="panel-body pad-no">
                                        <!--Default Tabs (Left Aligned)--> 
                                        <!--===================================================-->
                                        <div class="tab-base">
                                            <!--Nav Tabs-->
                                            <ul class="nav nav-tabs">
                                                <li class="active"> <a data-toggle="tab" href="#demo-lft-tab-2">Penjadwalan Manual</a> </li>
                                            </ul>
                                            <!--Tabs Content-->
                                            <div class="tab-content">
                                              
                                                <div id="demo-lft-tab-2" class="tab-pane active in">

                                                    <form class="form-horizontal" method="POST" action="<?= base_url('admin/simpanpendaftar') ?>">

                                                    <div class="row">
                                                        <div class="col-sm-12">

                                                            <h3>Penjadwalan Manual</h3>
                                                            <hr>
                                                                     <div class="panel-body">
                                                                             <div class="form-group">
                                                                                <label class="col-sm-4 control-label" for="demo-hor-inputpass"><b >NIM</b></label>
                                                                                <div class="col-sm-8">
                                                                                     <input type="text" name="nim" class="form-control" id="nim" required>
                                                                                </div>
                                                                            </div>

                                                                             <div class="form-group hidden">
                                                                                <label class="col-sm-4 control-label" for="demo-hor-inputpass"><b >Userid</b></label>
                                                                                <div class="col-sm-8">
                                                                                     <input type="text" name="userid" class="form-control" id="userid">

                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group hidden">
                                                                                <label class="col-sm-4 control-label" for="demo-hor-inputpass"><b >username</b></label>
                                                                                <div class="col-sm-8">
                                                                                     <input type="text" name="username" class="form-control" id="username">
                                                                                </div>
                                                                            </div>



                                                                             <div class="form-group hidden">
                                                                                <label class="col-sm-4 control-label" for="demo-hor-inputpass"><b id="jad_medkom1">Is Baru</b></label>
                                                                                <div class="col-sm-8">
                                                                                     <input type="radio" name="is_baru" checked value="0"> 0
                                                                                     <br>
                                                                                     <input type="radio" name="is_baru" value="1"> 1
                                                                                </div>  
                                                                            </div>

                                                                             <div class="form-group">
                                                                                <label class="col-sm-4 control-label" for="demo-hor-inputpass"><b >Nama</b></label>
                                                                                <div class="col-sm-8">
                                                                                     <input type="text" name="nama" class="form-control" id="nama" required>

                                                                                </div>
                                                                            </div>

                                                                          

                                                                             <div class="form-group">
                                                                                <label class="col-sm-4 control-label" for="demo-hor-inputpass"><b >No Hp</b></label>
                                                                                <div class="col-sm-8">
                                                                                     <input type="text" name="no_hp" class="form-control" id="no_hp" required>

                                                                                </div>
                                                                            </div>

                                                                          

                                                                              <div class="form-group">
                                                                                <label class="col-sm-4 control-label" for="demo-hor-inputpass"><b >Email</b></label>
                                                                                <div class="col-sm-8">
                                                                                     <input type="text" name="email" class="form-control" id="email" required>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                          
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                                  
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
                                                                                   <select class="form-control" name="tempat" id="jad_venue" required="">
                                                                                        <option value="">- Pilih Venue -</option>
                                                                                            <option value="Kampus Ganesha">Kampus Ganesha</option>
                                                                                            <option value="Kampus Jatinangor">Kampus Jatinangor</option>
                                                                                             <option value="Kampus Cirebon">Kampus Cirebon</option>
                                                                                            <option value="online">Online</option>
                                                                                     
                                                                                   </select >
                                                                                </div>
                                                                            </div>


                                                                             <div class="form-group">
                                                                                <label class="col-sm-4 control-label" for="demo-hor-inputpass"><b id="jad_medkom">Media Konsultasi</b></label>
                                                                                <div class="col-sm-8">
                                                                                     <input type="text" name="media_konsultasi" class="form-control">

                                                                                </div>
                                                                            </div>

                                                                             <div class="form-group">
                                                                                <label class="col-sm-4 control-label" for="demo-hor-inputpass"><b>Status Konseling</b></label>
                                                                                <div class="col-sm-8">
                                                                                    <select class="form-control" name="status_konseling" id="stats" required="">
                                                                                        <option value="">-Pilih Status-</option>
                                                                                        <option value="2">Jadwalkan</option>
                                                                                        <option value="3">Selesai</option>
                                                                                    </select>

                                                                                </div>
                                                                            </div>

                                                                            <div id="boxtambahan" class="hidden">
                                                                              <div class="form-group">
                                                                                <label class="col-sm-4 control-label" for="demo-hor-inputpass"><b>Waktu Mulai Konseling</b></label>
                                                                                <div class="col-sm-8">
                                                                                        <input type="text" name="waktu_mulai_konseling" class="form-control" id="zmulai" >
                                                                                </div>
                                                                            </div>

                                                                              <div class="form-group">
                                                                                <label class="col-sm-4 control-label" for="demo-hor-inputpass"><b>Waktu Selesai Konseling</b></label>
                                                                                <div class="col-sm-8">
                                                                                        <input type="text" name="waktu_selesai_konseling" class="form-control" id="zselesai" >

                                                                                </div>
                                                                            </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="panel-footer text-right">
                                                                            <button id="simpanbtn" class="btn btn-info" type="submit">Simpan</button>
                                                                        </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <br>
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



               