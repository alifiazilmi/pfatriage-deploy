   <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <div class="pageheader hidden-xs">
                        <h3><i class="fa fa-home"></i> User Profile </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li class="active"> User Profile </li>
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
                                        <img src="<?= base_url('assets/admin/') ?>img/av7.png" alt="avatar">
                                        <div class="name osLight"> <?= $this->session->userdata('bk_nama') ?> </div>
                                    </div>
                                    <div class="title">  <?= $this->session->userdata('bk_role_name') ?> </div>
                                    <div class="address">  </div>
                                    <ul class="fullstats">
                                        <li> <span><?php echo $jml_sdh_konseling;?></span>Konseling </li>
                                        <li> <span><?php echo $total_durasi_konseling->totaltime;?></span>Total Durasi Konseling </li>
                                        <li> <span><?php echo $jml_jadwal_piket;?></span>Piket </li>
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
                                                    <td> Email </td>
                                                    <td> <?= $this->session->userdata('bk_email') ?></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fa fa-phone ph-5"></i></td>
                                                    <td> Role Name </td>
                                                    <td> <?= $this->session->userdata('bk_role_name') ?> </td>
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
                                                <li class="active"> <a data-toggle="tab" href="#demo-lft-tab-2">Jadwal</a> </li>
                                            </ul>
                                            <!--Tabs Content-->
                                            <div class="tab-content">
                                                

                                              
                                                <div id="demo-lft-tab-2" class="tab-pane active in">

                                                    <!--Hover Rows-->
                                                    <!--===================================================-->
                                                  <table class="table table-hover table-vcenter">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Jadwal</th>
                                                                <th class="hidden-xs">Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                         <?php if (!empty($jadwal_piket)) { ?>
                                                         <?php foreach ($jadwal_piket as $fetch) {?>
                                                            <tr>
                                                                <td>1</td>
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

