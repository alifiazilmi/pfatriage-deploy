   <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <div class="pageheader hidden-xs">
                        <h3><i class="fa fa-calendar"></i> Detail </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li class="active"> Detail Feedback </li>
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
                                                <li class="active"> <a data-toggle="tab" href="#demo-dt-basic">Detail Feedback Konselor</a> </li>
                                                 <a style="margin:5px;" href="<?= base_url('admin/feedback') ?>" class="btn btn-success pull-right"> <i class="fa fa-backward"></i> Kembali</a>
                                            </ul>
                                            <!--Tabs Content-->
                                            <div class="tab-content">

                                           

                                                 <div class="pad-btm form-inline">
                                                    <div class="row">

                                                        <h5><b>Nama Konselor</b></h5>
                                                        <ul>
                                                            <li><?= $feedback_detail[0]->gelar_depan.' '.$feedback_detail[0]->nama_lengkap.' '.$feedback_detail[0]->gelar_belakang ?></li>
                                                        </ul>
                                                        <h5><b>Keterangan :</b></h5>
                                                        <ol>
                                                            <li>q1 : Seberapa penting layanan Bimbingan Konseling bagi Anda ? </li>
                                                            <li>q2 : Seberapa puas Anda dengan layanan di Bimbingan Konseling ITB ? </li>
                                                            <li>q3 : Bagaimana pendapat Anda tentang kemampuan konselor dalam membantu menyelesaikan masalah ?</li>
                                                            <li>q4 : Bagaimana pendapat Anda tentang keramahan konselor selama sesi konseling ? </li>
                                                            <li>q5 : Bagaimana pendapat Anda tentang tingkat kenyamanan selama konseling</li>
                                                        </ol>
                                                        <br>

                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <th>No</th>
                                                                <th valign="middle" style="text-align: center;">Tanggal / Mahasiswa</th>
                                                                <th valign="middle" style="text-align: center;">q1</th>
                                                                <th valign="middle" style="text-align: center;">q2</th>
                                                                <th valign="middle" style="text-align: center;">q3</th>
                                                                <th valign="middle" style="text-align: center;">q4</th>
                                                                <th valign="middle" style="text-align: center;">q5</th>
                                                                <th valign="middle" style="text-align: center;">Feedback Konselor</th>
                                                                <th valign="middle" style="text-align: center;">Nilai Konselor (0-100)</th>
                                                                <th valign="middle" style="text-align: center;">Feedback Institusi</th>
                                                            </tr>
                                                            <?php $i=0; foreach ($feedback_detail as $key): $i++; ?>
                                                             
                                                                <tr>
                                                                    <td><?= $i; ?></td>
                                                                    <td style="width: 15%;">
                                                                        <ul>
                                                                            <li><?= format_date_form($key->created_date) ?></li>
                                                                            <li><?= $key->display_name ?></li>
                                                                        </ul>
                                                                       
                                                                    </td>
                                                                    <td><?= $key->q1 ?></td>
                                                                    <td><?= $key->q2 ?></td>
                                                                    <td><?= $key->q3 ?></td>
                                                                    <td><?= $key->q4 ?></td>
                                                                    <td><?= $key->q5 ?></td>
                                                                    <td><?= $key->feedback_konselor ?></td>
                                                                    <td style="text-align: center;"><?= $key->nilai_kepuasan_konselor ?></td>
                                                                    <td><?= $key->feedback_institusi_bk ?></td>
                                                                </tr>
                                                            <?php endforeach ?>
                                                        </table>
                                                    </div>
                                                </div>


                                                
                                            
                                                    <!--===================================================-->
                                                    <!--End Hover Rows-->
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

