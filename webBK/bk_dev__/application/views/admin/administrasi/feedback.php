   <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <div class="pageheader hidden-xs">
                        <h3><i class="fa fa-calendar"></i> Feedback </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li class="active"> Feedback </li>
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
                                                <li class="active"> <a data-toggle="tab" href="#demo-dt-basic">Feeback</a> </li>
                                            </ul>
                                            <!--Tabs Content-->
                                            <div class="tab-content">

                                                  <?php $message = $this->session->flashdata("status"); ?>
                                                  <?=isset($message)?'<div class="alert alert-mint media fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><div class="media-left"><span class="icon-wrap icon-wrap-xs alert-icon"><i class="fa fa-check fa-lg"></i></span> </div><div class="media-body"><h4 class="alert-title">Sukses !</h4><p class="alert-message">'.$message.'</p></div></div>':''; ?>
                                                  <?php $pesan = $this->session->flashdata("warning"); ?>
                                                  <?=isset($pesan)?'<div class="alert alert-danger media fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><div class="media-left"><span class="icon-wrap icon-wrap-xs alert-icon"><i class="fa fa-remove fa-lg"></i></span> </div><div class="media-body"><h4 class="alert-title">Gagal !</h4><p class="alert-message">'.$pesan.'</p></div></div>':''; ?>
                                              
                                                <div id="demo-lft-tab-2"  id="demo-dt-basic" class="tab-pane active in table-responsive">
                                        


                                                  <table id="tableRekap" class="table table-bordered table-vcenter" style="width: 100%">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 5%; text-align: center;">No</th>
                                                                <th>Konselor</th>
                                                                <th style="width: 15%; text-align: center;">Jumlah Feeback</th>
                                                                <th style="width: 5%">Aksi</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            
                                                            <?php $i=0; foreach ($feedback as $key): $i++; ?>
                                                                
                                                                <tr>
                                                                    <td style="text-align: center;"><?= $i; ?></td>
                                                                    <td><?= $key->gelar_depan.' '.$key->nama_lengkap.' '.$key->gelar_belakang ?></td>
                                                                    <td style="text-align: center;"><?= $key->jumlah_feeback ?></td>
                                                                    <td>
                                                                        <?php if ($key->jumlah_feeback > 0): ?>
                                                                            <a href="<?= base_url('admin/feedbackdetail/').$key->id_user ?>" class="btn btn-success btn-sm"><i class="fa fa-search"></i></a>
                                                                        <?php endif ?>
                                                                    </td>
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

