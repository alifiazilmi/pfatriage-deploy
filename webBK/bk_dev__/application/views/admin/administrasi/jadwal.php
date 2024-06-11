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

                                                  <?php $message = $this->session->flashdata("status"); ?>
                                                  <?=isset($message)?'<div class="alert alert-mint media fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><div class="media-left"><span class="icon-wrap icon-wrap-xs alert-icon"><i class="fa fa-check fa-lg"></i></span> </div><div class="media-body"><h4 class="alert-title">Sukses !</h4><p class="alert-message">'.$message.'</p></div></div>':''; ?>
                                                  <?php $pesan = $this->session->flashdata("warning"); ?>
                                                  <?=isset($pesan)?'<div class="alert alert-danger media fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><div class="media-left"><span class="icon-wrap icon-wrap-xs alert-icon"><i class="fa fa-remove fa-lg"></i></span> </div><div class="media-body"><h4 class="alert-title">Gagal !</h4><p class="alert-message">'.$pesan.'</p></div></div>':''; ?>
                                              
                                                <div id="demo-lft-tab-2"  id="demo-dt-basic" class="tab-pane active in table-responsive">
                                                    

                                                 <div class="pad-btm form-inline">
                                                    <div class="row">

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Jadwal (jam) </button>

                                                                 <button class="btn btn-primary" data-toggle="modal" data-target="#myModal2"><span class="fa fa-plus"></span> Jadwal (Sesi) </button>
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-6 text-xs-center text-right">
                                                            
                                                            <div class="form-group">
                                                                <form action="">
                                                                <select class="form-control" name="id" onchange="this.form.submit()">
                                                                    <option value="">- Pilih Konselor -</option>
                                                                    <?php foreach ($konselor as $value): ?>
                                                                    <option <?= (isset($_GET['id'])?($_GET['id'] == $value->id_user ? 'selected':''):'') ?> value="<?= $value->id_user ?>">
                                                                        <?= $value->nama_lengkap.' '.$value->gelar_belakang ?>        
                                                                    </option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                                </form>
                                                            </div>
                                                            <div class="form-group" class="pull-right">
                                                                <input id="demo-input-search2" type="text" placeholder="Search" class="form-control" autocomplete="off">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                                  <table id="demo-foo-addrow" class="table table-hover table-vcenter" style="width: 100%">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 5%">No</th>
                                                                <th style="width: 40%">Konselor</th>
                                                                <th style="width: 25%">Jadwal</th>
                                                                <th style="width: 15%">Booking</th>
                                                                <th style="width: 20%">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i=0; foreach ($jadwal as $key_value): $i++; ?>

                                                                 <tr>
                                                                <td style="text-align: center"><?= $i ?></td>
                                                                <td><?= $key_value->nama_lengkap ?></td>
                                                                <td>
                                                                    <span class="text-semibold"><?= tanggal_indo_lengkap($key_value->tanggal,TRUE) ?></span>
                                                                    <br>
                                                                    <small class="text-muted"><?= $key_value->jam_mulai ?> sd <?= $key_value->jam_akhir ?></small>
                                                                </td>
                                                                <td>
                                                                    <?php if ($key_value->is_booked == 1){ ?>
                                                                        Jadwal Terisi
                                                                    <?php }else{ ?>
                                                                        Jadwal Kosong
                                                                    <?php } ?>
                                                                </td>
                                                                <td>
                                                                     <?php if ($key_value->is_booked == 1){ ?>
                                                                        <a href="<?= base_url('admin/kosongkanjadwal/').$key_value->id_jadwal_piket ?>" class="btn btn-warning btn-xs" onclick="return confirm('Yakin akan mengosokan jadwal ini ?')"> Kosongkan Jadwal</a>
                                                                    <?php } ?>

                                                                    <a href="<?= base_url('admin/hapusjadwal/').$key_value->id_jadwal_piket.'/'.$key_value->id_user.'/'.$key_value->tanggal.'/'.$key_value->jam_mulai  ?>" onclick="return confirm('Yakin akan menghapus pengguna ini ?')" class="btn btn-danger btn-xs fa fa-trash"></a>
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


                     <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        
                        <h4 class="modal-title" id="myModalLabel">Tambah Jadwal (Durasi) </h4>
                      </div>
                      <form class="form-horizontal" method="POST" action="<?= base_url('admin/simpanjadwaldurasi') ?>">
                      <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                                
                                                
                                                      
                                                            <div class="panel-body">
                                                                
                                                                 <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="demo-hor-inputpass">Konselor</label>
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
                                                                    <label class="col-sm-3 control-label" for="demo-hor-inputemail">Jumlah Sesi</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="number" min="1" name="durasi" class="form-control">
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


                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        
                        <h4 class="modal-title" id="myModalLabel">Tambah Jadwal </h4>
                      </div>
                      <form class="form-horizontal" method="POST" action="<?= base_url('admin/simpanjadwal') ?>">
                      <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                                
                                                
                                                      
                                                            <div class="panel-body">
                                                                
                                                                 <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="demo-hor-inputpass">Konselor</label>
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


<script type="text/javascript">
    
    function ubahbook(argument) {
        if (confirm("Yakin kan Mengubah Status Jadwal ?") == true) {
              alert('YA');
        } else {
              alert('CANCEL');
        }
    }

</script>