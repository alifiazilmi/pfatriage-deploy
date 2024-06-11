   <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <div class="pageheader hidden-xs">
                        <h3><i class="fa fa-calendar"></i> Jadwal </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li class="active"> Jadwal Piket </li>
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
                                                <li class="active"> <a data-toggle="tab" href="#demo-dt-basic">Daftar Jadwal Piket</a> </li>
                                            </ul>
                                            <!--Tabs Content-->
                                            <div class="tab-content">
                                             <!--    <div class="form-group">
                                                                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Jadwal</button>
                                                            </div> -->
                                              
                                                <div id="demo-lft-tab-2"  id="demo-dt-basic" class="tab-pane active in table-responsive">
                                                    
                                                    
                                                  <?php $message = $this->session->flashdata("status"); ?>
                                                  <?=isset($message)?'<div class="alert alert-mint media fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><div class="media-left"><span class="icon-wrap icon-wrap-xs alert-icon"><i class="fa fa-check fa-lg"></i></span> </div><div class="media-body"><h4 class="alert-title">Sukses !</h4><p class="alert-message">'.$message.'</p></div></div>':''; ?>
                                                  <?php $pesan = $this->session->flashdata("warning"); ?>
                                                  <?=isset($pesan)?'<div class="alert alert-danger media fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><div class="media-left"><span class="icon-wrap icon-wrap-xs alert-icon"><i class="fa fa-remove fa-lg"></i></span> </div><div class="media-body"><h4 class="alert-title">Gagal !</h4><p class="alert-message">'.$pesan.'</p></div></div>':''; ?>

                                                  <table id="demo-dt-basic" class="table table-hover table-vcenter" style="width: 100%">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 5%">No</th>
                                                                <th style="width: 50%">Jadwal</th>
                                                                <th class="hidden-xs">Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                          <?php if(!empty($jadwal_piket)) { ?>
                                                          <?php $no=0; foreach ($jadwal_piket as $fetch)  {  $no++;?>
                                                            <tr>
                                                                <td  style="text-align: center"><?php echo $no;?></td>
                                                                <td>
                                                                    <span class="text-semibold"><?php $tanggal=$fetch->tanggal; echo date("d-m-Y",strtotime($tanggal));?></span>
                                                                    <br>
                                                                    <small class="text-muted"><?php echo $fetch->jam_mulai;?> sd <?php echo $fetch->jam_akhir;?></small>
                                                                </td>
                                                                <td class="hidden-xs">
                                                                    <div class="label label-table label-info">Terjadwal</div>
                                                                </td>
                                                            </tr>
                                                          <?php } ?>
                                                          <?php } ?>
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
                      <form class="form-horizontal" method="POST" action="<?= base_url('admin/simpanjadwalself') ?>">
                      <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                                
                                                
                                                      
                                                            <div class="panel-body">
                                                             
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