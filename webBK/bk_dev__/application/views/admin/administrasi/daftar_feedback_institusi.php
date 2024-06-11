  <!--END NAVBAR-->
  <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <div class="pageheader hidden-xs">
                        <h3><i class="fa fa-home"></i>Daftar Feedback Institusi Bimbingan Konseling</h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li class="active"> Daftar Feedback Institusi Bimbingan Konseling</li>
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
                                <h3 class="panel-title">Daftar Feedback Institusi Bimbingan Konseling </h3>

                            </div>
                            <div class="panel-body">
                                    <?php $message = $this->session->flashdata("status"); ?>
                                                          <?=isset($message)?'<div class="alert alert-mint media fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><div class="media-left"><span class="icon-wrap icon-wrap-xs alert-icon"><i class="fa fa-check fa-lg"></i></span> </div><div class="media-body"><h4 class="alert-title">Sukses !</h4><p class="alert-message">'.$message.'</p></div></div>':''; ?>
                                                          <?php $pesan = $this->session->flashdata("warning"); ?>
                                                          <?=isset($pesan)?'<div class="alert alert-danger media fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><div class="media-left"><span class="icon-wrap icon-wrap-xs alert-icon"><i class="fa fa-remove fa-lg"></i></span> </div><div class="media-body"><h4 class="alert-title">Gagal !</h4><p class="alert-message">'.$pesan.'</p></div></div>':''; ?>

                            	<div class="table-responsive">
                                <table id="demo-dt-basic" class="table table-striped table-bordered" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th style="width: 2%;">No</th>
                                            <th class="min-tablet" style="width: 20%;">Seberapa Penting Layanan BK ITB</th>
                                            <th class="min-tablet" style="width: 20%;">Seberapa Puas dengan Layanan BK ITB</th>
                                            <th class="min-tablet" style="width: 20%;">Pesan dan Kesan</th>
                                            <th class="min-tablet" style="width: 20%;">Nama Pelapor</th>
                                            <th class="min-tablet" style="width: 20%;">NIP/NIM Pelapor</th>
                                            <th class="min-tablet" style="width: 20%;">Unit Pelapor</th>
                                            <th class="min-tablet" style="width: 20%;">Status Pelapor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; foreach ($daftar_feedback_institusi as $key): $i++; ?>

                                        <tr>
                                            <td style="text-align: center;"><?= $i ?></td>
                                            <td>
                                                <?php echo $key->q1;?>
                                            </td>
                                            <td>
                                                <?php echo $key->q2;?>
                                            </td>
                                            <td>
                                                <?php echo $key->kesan_pesan;?>
                                            </td>
                                            <td>
                                                <?php echo $key->created_by_nama;?>
                                            </td>
                                            <td>
                                                <?php echo $key->created_by_nip_nim;?>
                                            </td>
                                            <td>
                                                <?php echo $key->created_by_unit;?>
                                            </td>
                                            <td>
                                                <?php echo $key->created_by_jeniscivitas;?>
                                            </td>
                                        </tr>

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



