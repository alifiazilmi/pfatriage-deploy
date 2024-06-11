
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <div class="pageheader hidden-xs">
                        <h3><i class="fa fa-user"></i> Pengguna </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li class="active"> Pengguna </li>
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
                                <h3 class="panel-title">Daftar Pengguna</h3>
                            </div>
                            <div class="panel-body">
                            	 	  <?php $message = $this->session->flashdata("status"); ?>
							          <?=isset($message)?'<div class="alert alert-mint media fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><div class="media-left"><span class="icon-wrap icon-wrap-xs alert-icon"><i class="fa fa-check fa-lg"></i></span> </div><div class="media-body"><h4 class="alert-title">Sukses !</h4><p class="alert-message">'.$message.'</p></div></div>':''; ?>
							          <?php $pesan = $this->session->flashdata("warning"); ?>
							          <?=isset($pesan)?'<div class="alert alert-danger media fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><div class="media-left"><span class="icon-wrap icon-wrap-xs alert-icon"><i class="fa fa-remove fa-lg"></i></span> </div><div class="media-body"><h4 class="alert-title">Gagal !</h4><p class="alert-message">'.$pesan.'</p></div></div>':''; ?>

                                    <div class="pad-btm form-inline">
                                        <div class="row">

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Pengguna</button>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 text-xs-center text-right">
                                                <div class="form-group">
                                                    <input id="demo-input-search2" type="text" placeholder="Search" class="form-control" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle" data-page-size="7">
                                    <thead>
                                        <tr style="width: 100%">
                                            <th style="width: 5%" data-toggle="true">No</th>
                                            <th>Nama</th>
                                            <th style="width: 20%" data-hide="phone, tablet">Tipe Pengguna</th>
                                            <th style="width: 10%" data-hide="phone, tablet">Status</th>
                                            <th style="width: 20%" data-hide="phone, tablet">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php $i=0; foreach ($allusers as $key): $i++; ?>

	                                    	<tr>
	                                            <td><?= $i; ?></td>
	                                            <td><?= $key->gelar_depan.' '.$key->nama_lengkap.' '.$key->gelar_belakang ?></td>
	                                            <td><?= $key->role_name ?></td>
	                                            <td>
	                                            	<?php if ($key->is_aktif == 1): ?>
	                                            		<span class="label label-table label-success">Active</span>
	                                            	<?php else: ?>
	                                            		<span class="label label-table label-warning">Non Active</span>
	                                            	<?php endif ?>

	                                            </td>
	                                            <td>
	                                            	<a href="<?= base_url('admin/editprofil/').$key->id_user ?>" class="btn btn-success btn-xs fa fa-pencil"></a>
	                                                <a href="<?= base_url('admin/hapususer/').$key->id_user ?>" onclick="return confirm('Yakin akan menghapus pengguna ini ?')" class="btn btn-danger btn-xs fa fa-trash"></a>
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
                            <!--===================================================-->
                            <!-- End Foo Table - Add & Remove Rows -->
                        </div>
                             
                              
                            </div>
                        </div>
                   
                    </div>
                    <!--===================================================-->
                    <!--End page content-->
                </div>




<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Pengguna</h4>
      </div>
      <form class="form-horizontal" method="POST" action="<?= base_url('admin/simpanpengguna') ?>">
      <div class="modal-body">
        		<div class="row">
        			<div class="col-sm-12">
        						
        						
                                      
                                            <div class="panel-body">
                                            	 <div class="form-group">
                                                    <label class="col-sm-3 control-label" for="demo-hor-inputpass">Tipe User</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="id_role" id="role">
                                                        	<option value="2">Admin</option>
                                                        	<option value="3">Konselor</option>
                                                        	<option value="4">Staf Ahli</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div id="temp_penugasan">
                                                    
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label" for="demo-hor-inputemail">Nama</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" id="demo-hor-inputemail" class="form-control">
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label class="col-sm-3 control-label" for="demo-hor-inputemail">Gelar Depan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="gelar_depan" placeholder="Gelar Depan" id="demo-hor-inputemail" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label" for="demo-hor-inputemail">Gelar Belakang</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="gelar_belakang" placeholder="Gelar Belakang" id="demo-hor-inputemail" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label" for="demo-hor-inputemail">Email</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" name="email" placeholder="Email" id="demo-hor-inputemail" class="form-control">
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label class="col-sm-3 control-label" for="demo-hor-inputpass">Username</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="username" placeholder="Username" id="demo-hor-inputpass" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label" for="demo-hor-inputpass">Password</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="password" placeholder="Password"  class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label" for="demo-hor-inputpass">Status</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="is_aktif">
                                                        	<option value="1">Active</option>
                                                        	<option value="0">Non-Active</option>
                                                        </select>
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
