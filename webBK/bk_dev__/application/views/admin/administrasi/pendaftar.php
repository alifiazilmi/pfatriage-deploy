  <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <div class="pageheader hidden-xs">
                        <h3><i class="fa fa-home"></i>Konseling </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li class="active"> Konseling </li>
                            </ol>
                        </div>
                    </div>
                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                       <div class="row">
                             <div class="col-md-12">

                        <!-- Basic Data Tables -->
                        <!--===================================================-->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data Konseling <?= $status ?> </h3>

                            </div>
                            <div class="panel-body">
                                    <?php $message = $this->session->flashdata("status"); ?>
                                                          <?=isset($message)?'<div class="alert alert-mint media fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><div class="media-left"><span class="icon-wrap icon-wrap-xs alert-icon"><i class="fa fa-check fa-lg"></i></span> </div><div class="media-body"><h4 class="alert-title">Sukses !</h4><p class="alert-message">'.$message.'</p></div></div>':''; ?>
                                                          <?php $pesan = $this->session->flashdata("warning"); ?>
                                                          <?=isset($pesan)?'<div class="alert alert-danger media fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><div class="media-left"><span class="icon-wrap icon-wrap-xs alert-icon"><i class="fa fa-remove fa-lg"></i></span> </div><div class="media-body"><h4 class="alert-title">Gagal !</h4><p class="alert-message">'.$pesan.'</p></div></div>':''; ?>


                                <?php if ($status == 'Terjadwal'): ?>
                                    <div class="pad-btm form-inline">
                                                    <div class="row">

                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <a href="<?= base_url('admin/pendaftarmanual/') ?>" class="btn btn-primary btn-labeled fa fa-plus">Penjadwalan Manual</a> 
                                                            </div>

                                                        </div>
                                                

                                                    </div>
                                    </div>
                                <?php endif ?>
                            	<div class="table-responsive">
                                <table id="demo-dt-basic" class="table table-striped table-bordered" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th style="width: 2%;">No</th>
                                            <th class="hidden-xs" style="width: 12%">Aksi</th>
                                            <th class="min-tablet" style="width: 20%;">Info Pendaftaran</th>
                                             <?php if ($status == 'Terdaftar'): ?>
                                            <th class="min-tablet" style="width: 20%;">Pengajuan Konseling</th>
                                              <?php endif ?>
                                            <th class="min-tablet" style="width: 20%;">Jadwal Konseling</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; foreach ($allpendaftar as $key): $i++; ?>

                                        <tr>
                                            <td style="text-align: center;"><?= $i ?></td>

                                            <td >
                                                <a href="<?= base_url('admin/editpendaftar/').$key->id_konseling ?>" class="btn btn-success btn-labeled fa fa-pencil">Edit</a> &nbsp;
                                                <?php //if ($key->id_status_konseling == 2): ?>
                                                    <a class="btn btn-danger btn-labeled fa fa-trash" data-toggle="modal" data-target="#batal<?php echo $key->id_konseling;?>">Batalkan</a>

                                            <?php //endif ?>
                                            </td>
                                            <td> <span class="text-semibold"><?= $key->display_name ?></span>
                                                <br>
                                            <small class="text-muted"><?=  tanggal_indo_lengkap($key->created_date,TRUE); ?></small>
                                             <br>
                                            <small class="text-muted"><?= trimDate($key->created_date); ?></small>
                                            </td>
                                            <?php if ($key->id_status_konseling == 1): ?>
                                            <td> 
                                                <span class="text-semibold"><?= tanggal_indo_lengkap($key->tanggal_diajukan,TRUE) ?></span>
                                                <br>
                                                <small class="text-muted"><?= $key->jam_diajukan ?></small>
                                            </td>
                                            
                                            <?php endif ?>
                                            <td> 
                                                <?php if ($key->id_status_konseling == 1): ?>
                                                        <small class="text-muted"> 
                                                        	<div class="label label-table label-danger" style="max-width: 170px;">
                                                        		<?= $key->status ?>
                                                        	</div>
                                                        </small>
                                                <?php else: ?>
                                                     <span class="text-semibold">
                                                            <?= $key->gelar_depan.' '.$key->nama_lengkap.' '.$key->gelar_belakang ?>
                                                        </span>
                                                        <br>
                                                        <span class="text-semibold">
                                                         	<?= tanggal_indo_lengkap($key->tanggal_disetujui,TRUE) ?>
                                                        </span>
                                                        <br>
                                                        <small class="text-muted"><?= $key->jam_disetujui ?></small>
                                                        <br>
                                                        <small class="text-muted"><div class="label label-table label-<?= ($key->id_status_konseling == 2 ? 'warning' : 'success')  ?>" style="max-width: 170px;"><?= $key->status ?></div>
                                                        </small>
                                                <?php endif ?>
                                           </td>
                                        </tr>

                                        <div id="batal<?php echo $key->id_konseling;?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Konfirmasi Pembatalan</h4>
                                                    </div>
                                                    <form method="post" action="<?= base_url('admin/batalkan').'/'.$key->id_konseling.'/'.$key->ditangani_oleh.'/'.$key->user_id.'/'.$key->tanggal_diajukan.'/'.$key->jam_diajukan ?>">
                                                        <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="demo-hor-inputemail">Alasan Pembatalan</label>
                                                                    <div class="col-sm-9">
                                                                        <textarea required name="alasan_pembatalan" class="form-control"> </textarea>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success" onclick="return confirm('Anda Yakin Batalkan ?')">Simpan</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                        </div>

                                        <?php endforeach ?>

                                      
                                       
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
                      
                       
                    </div>
                    <!--===================================================-->
                    <!--End page content-->
                </div>


               
