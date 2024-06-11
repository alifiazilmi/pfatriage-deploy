   <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <div class="pageheader hidden-xs">
                        <h3><i class="fa fa-user"></i> Edit Profile </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li> Pengguna </li>
                                <li class="active"> Edit Profile </li>
                            </ol>
                        </div>
                    </div>
                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                                <div class="userWidget-1">
                                    <div class="avatar bg-info">
                                        <?php if (isset($user->foto) || !is_dir('./assets/admin/uploads/profile_pic/'.$user->foto) ): ?>
                                            <img src="<?= base_url('assets/admin/uploads/profile_pic/').$user->foto ?>" alt="avatar">
                                        <?php else: ?>
                                            <img src="<?= base_url('assets/admin/') ?>img/user.png" alt="avatar">
                                        <?php endif ?>
                                        
                                        <div class="name osLight"> <?= $user->nama_lengkap ?> </div>
                                    </div>
                                    <div class="title">  <?= $user->role_name ?> </div>
                                    <div class="address">  </div>
                                    <ul class="fullstats">
                                        <li> <span>&nbsp;</span>&nbsp; </li>
                                        <li> <span>&nbsp;</span>&nbsp; </li>
                                        <li> <span>&nbsp;</span>&nbsp; </li>
                                    </ul>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-user"> </i> User Information</h3>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td><i class="fa fa-envelope-o ph-5"></i></td>
                                                 
                                                    <td> <?= $user->email ?></td>
                                                </tr>
                                              
                                               
                                            </tbody>
                                        </table>
                                    </div>
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
                                                <li class="active"> <a data-toggle="tab" href="#demo-lft-tab-2">Edit Profile</a> </li>
                                                <?php if ($user->id_role == 3 || $user->id_role == 4): ?>
                                                <li > <a data-toggle="tab" href="#demo-lft-tab-3">Pendidikan</a> </li>
                                                <li > <a data-toggle="tab" href="#demo-lft-tab-4">Pengalaman & Penelitian</a> </li>
                                                <?php endif ?>
                                            </ul>
                                            <!--Tabs Content-->
                                            <div class="tab-content">

                                                  <?php $message = $this->session->flashdata("status"); ?>
                                                          <?=isset($message)?'<div class="alert alert-mint media fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><div class="media-left"><span class="icon-wrap icon-wrap-xs alert-icon"><i class="fa fa-check fa-lg"></i></span> </div><div class="media-body"><h4 class="alert-title">Sukses !</h4><p class="alert-message">'.$message.'</p></div></div>':''; ?>
                                                          <?php $pesan = $this->session->flashdata("warning"); ?>
                                                          <?=isset($pesan)?'<div class="alert alert-danger media fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><div class="media-left"><span class="icon-wrap icon-wrap-xs alert-icon"><i class="fa fa-remove fa-lg"></i></span> </div><div class="media-body"><h4 class="alert-title">Gagal !</h4><p class="alert-message">'.$pesan.'</p></div></div>':''; ?>
                                              
                                                <div id="demo-lft-tab-2" class="tab-pane active in">
                                                   <form class="form-horizontal" method="POST" action="<?= base_url('admin/updatepengguna') ?>" enctype='multipart/form-data'>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label" for="demo-hor-inputpass">Tipe User</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="id_role">
                                                            <option <?= ($user->id_role == 2 ?"selected":"" ) ?> value="2">Admin</option>
                                                            <option <?= ($user->id_role == 3 ?"selected":"" ) ?> value="3">Konselor</option>
                                                            <option <?= ($user->id_role == 4 ?"selected":"" ) ?> value="4">Staf Ahli</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label" for="demo-hor-inputpass">Specialis</label>
                                                    <div class="col-sm-9">

                                                            <?php $arr_spesialis = json_decode($user->spesialis); ?>

                                                            <?php foreach ($spesialis as $spesialis_key){ ?>
                                                        
                                                                
                                                                        <input type="checkbox" <?= (!empty($arr_spesialis)? (in_array($spesialis_key->nama_specialis, $arr_spesialis)?'checked':''):'' ) ?> name="spesialis[]" id="<?=$spesialis_key->nama_specialis?>" value="<?=$spesialis_key->nama_specialis?>"> 
                                                                        <label for="<?=$spesialis_key->nama_specialis?>"><?=$spesialis_key->nama_specialis?></label>

                                                            <?php } ?>
                                                    </div>
                                                </div>

                                                <?php if ($user->id_role == 3): ?>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label" for="demo-hor-inputpass">Penugasan</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="penugasan">
                                                            <option <?= ($user->penugasan == 'Kampus Ganesha' ?"selected":"" ) ?> value="Kampus Ganesha">Kampus Ganesha</option>
                                                            <option <?= ($user->penugasan == 'Kampus Jatinangor' ?"selected":"" ) ?> value="Kampus Jatinangor">Kampus Jatinangor</option>
                                                            <option <?= ($user->penugasan == 'Kampus Cirebon' ?"selected":"" ) ?> value="Kampus Cirebon">Kampus Cirebon</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                    
                                                <?php endif ?>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label" >Nama</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="nama_lengkap" placeholder="Nama Lengkap"  class="form-control" value="<?= $user->nama_lengkap ?>">
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label class="col-sm-3 control-label" >Gelar Depan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="gelar_depan" placeholder="Gelar Depan"  class="form-control" value="<?= $user->gelar_depan ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label" >Gelar Belakang</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="gelar_belakang" placeholder="Gelar Belakang"  class="form-control" value="<?= $user->gelar_belakang ?>">
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label class="col-sm-3 control-label" >Foto</label>
                                                    <div class="col-sm-9">
                                                        <input type="file" name="foto"  class="form-control 2mb"  accept="image/*">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label" >Email</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" name="email" placeholder="Email"  class="form-control" value="<?= $user->email ?>">
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label class="col-sm-3 control-label" for="demo-hor-inputpass">Username</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="username" placeholder="Username" id="demo-hor-inputpass" class="form-control" value="<?= $user->username ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label" for="demo-hor-inputpass"></label>
                                                    <div class="col-sm-9" style="margin-bottom: 10px">
                                                        <input type="checkbox" name="is_ganti_pass" value="1">
                                                        <small >Ganti Password ?</small>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label" for="demo-hor-inputpass">Password</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="password" placeholder="Password" id="passid" class="form-control" disabled="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label" for="demo-hor-inputpass">Status</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="is_aktif">
                                                            <option <?= ($user->is_aktif == 1 ?"selected":"" ) ?>  value="1">Active</option>
                                                            <option <?= ($user->is_aktif == 0 ?"selected":"" ) ?>  value="0">Non-Active</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                         <input type="hidden" name="id_user" value="<?= $user->id_user ?>">
                                                        <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                                                    </div>
                                                </div>
                                                <br>



                                                   </form>
                                                </div>

                                                <div id="demo-lft-tab-3" class="tab-pane fade in">

                                                    <div class="row">
                                                    <div class="col-sm-12">
                                                        <button type="button" class="btn btn-success pull-right fa fa-plus" data-toggle="modal" data-target="#modalpendidikan"></button>
                                                    </div>
                                                    </div>
                                                    <br>

                                                     <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle" data-page-size="7">
                                                        <thead>
                                                            <tr style="width: 100%">
                                                                <th style="width: 10%" data-sort-initial="true" data-toggle="true">No</th>
                                                                <th style="width: 20%">Jenjang Pendidikan</th>
                                                                <th  data-hide="phone, tablet">Deksripsi</th>
                                                                <th style="width: 15%" data-hide="phone, tablet">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i=0; foreach ($pendidikan as $val_pend): $i++; ?>

                                                                <tr>
                                                                    <td><?= $i; ?></td>
                                                                    <td><?= $val_pend->tingkat ?></td>
                                                                    <td><?= $val_pend->deskripsi_pendidikan ?></td>
                                                                    <td>
                                                                     
                                                                        <a href="<?= base_url('admin/hapuspendidikan/').$val_pend->id_pendidikan.'/'.$val_pend->id_user ?>" onclick="return confirm('Yakin akan menghapus pendidikan ini ?')" class="btn btn-danger btn-xs fa fa-trash"></a>
                                                                    </td>
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

                                                <div id="demo-lft-tab-4" class="tab-pane fade in">

                                                    <div class="row">
                                                    <div class="col-sm-12">
                                                        <button type="button" class="btn btn-success pull-right fa fa-plus" data-toggle="modal" data-target="#modalpengalaman"></button>
                                                    </div>
                                                    </div>
                                                    <br>

                                                      <table id="demo-foo-filtering" class="table table-bordered table-hover toggle-circle" data-page-size="7">
                                                        <thead>
                                                            <tr style="width: 100%">
                                                                <th style="width: 10%" data-sort-initial="true" data-toggle="true">No</th>
                                                                <th style="width: 20%">Periode</th>
                                                                <th data-hide="phone, tablet">Pengalaman</th>
                                                                <th data-hide="phone, tablet">Deksripsi</th>
                                                                <th style="width: 20%" data-hide="phone, tablet">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i=0; foreach ($pengalaman as $pengalaman_key): $i++; ?>

                                                                <tr>
                                                                    <td><?= $i; ?></td>
                                                                    <?php if ($pengalaman_key->is_today == 1): ?>
                                                                        <td><?= substr(format_date_form($pengalaman_key->tgl_mulai), 3).' s/d Sekarang'?></td>
                                                                    <?php else: ?>
                                                                        <td><?= substr(format_date_form($pengalaman_key->tgl_mulai), 3).' s/d '.substr(format_date_form($pengalaman_key->tgl_akhir), 3) ?></td>
                                                                    <?php endif ?>
                                                                    
                                                                    <td><?= $pengalaman_key->pengalaman ?></td>
                                                                    <td><?= $pengalaman_key->deskripsi_pengalaman ?></td>

                                                                    <td>
                                                                     
                                                                        <a href="<?= base_url('admin/hapuspengalaman/').$pengalaman_key->id_pengalaman.'/'.$pengalaman_key->id_user ?>" onclick="return confirm('Yakin akan menghapus pengguna ini ?')" class="btn btn-danger btn-xs fa fa-trash"></a>
                                                                    </td>
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



                <!-- Modal -->
<div class="modal fade" id="modalpendidikan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Pendidikan</h4>
      </div>
      <form class="form-horizontal" method="POST" action="<?= base_url('admin/simpanpendidikan') ?>">
      <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                                
                                
                                      
                                            <div class="panel-body">
                                                 <div class="form-group">
                                                    <label class="col-sm-3 control-label" for="demo-hor-inputpass">Jejang Pendidikan</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="tingkat">
                                                            <option value="S1">S1</option>
                                                            <option value="S2">S2</option>
                                                            <option value="S3">S3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            
                                            
                                                 <div class="form-group">
                                                    <label class="col-sm-3 control-label" for="demo-hor-inputpass">Deskripsi</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="deskripsi_pendidikan" placeholder="Institusi/prodi/jurusan" id="demo-hor-inputpass" class="form-control">
                                                    </div>
                                                </div>
                                            
                                            </div>
                                         
                                       
                              

                    </div>
                </div>

      </div>
      <div class="modal-footer">
        <input type="hidden" name="id_user" value="<?= $user->id_user ?>">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
     </form>
    </div>
  </div>
</div>


<div class="modal fade" id="modalpengalaman" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Pengalaman/Penelitian</h4>
      </div>
      <form class="form-horizontal" method="POST" action="<?= base_url('admin/simpanpengalaman') ?>">
      <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                                
                                
                                      
                                            <div class="panel-body">
                                                 <div class="form-group">
                                                    <label class="col-sm-4 control-label" for="demo-hor-inputpass">Tanggal Mulai</label>
                                                    <div class="col-sm-7">
                                                        <input type="date" name="tgl_mulai" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label" for="demo-hor-inputpass">Tanggal Selesai</label>
                                                    <div class="col-sm-7">
                                                        <input type="date" name="tgl_akhir" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label" for="demo-hor-inputpass">Hingga Sekarang ?</label>
                                                    <div class="col-sm-7">
                                                        <input type="radio" name="is_today" value="1" id="labelYa"> <label for="labelYa">Ya</label>
                                                        <input type="radio" name="is_today" value="0" id="labelNo"> <label for="labelNo">Tidak</label>
                                                    </div>
                                                </div>

                                                    <div class="form-group">
                                                    <label class="col-sm-4 control-label" for="demo-hor-inputpass">Pengalaman/Penelitian</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="pengalaman" placeholder="Judul Penelitian/Pengalaman" id="demo-hor-inputpass" class="form-control">
                                                    </div>
                                                </div>
                                            
                                            
                                                 <div class="form-group">
                                                    <label class="col-sm-4 control-label" for="demo-hor-inputpass">Deskripsi</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="deskripsi_pengalaman" placeholder="Deskripsi Penelitian/Pengalaman" id="demo-hor-inputpass" class="form-control">
                                                    </div>
                                                </div>
                                            
                                            </div>
                                         
                                       
                              

                    </div>
                </div>

      </div>
      <div class="modal-footer">
        <input type="hidden" name="id_user" value="<?= $user->id_user ?>">

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
     </form>
    </div>
  </div>
</div>
