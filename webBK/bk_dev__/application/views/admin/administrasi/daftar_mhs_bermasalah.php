  <!--END NAVBAR-->
  <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <div class="pageheader hidden-xs">
                        <h3><i class="fa fa-home"></i>Mahasiswa Bermasalah </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li class="active"> Mahasiswa Bermasalah </li>
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
                                <h3 class="panel-title">Daftar Pengaduan Mahasiswa </h3>

                            </div>
                            <div class="panel-body">
                                    <?php $message = $this->session->flashdata("status"); ?>
                                                          <?=isset($message)?'<div class="alert alert-mint media fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><div class="media-left"><span class="icon-wrap icon-wrap-xs alert-icon"><i class="fa fa-check fa-lg"></i></span> </div><div class="media-body"><h4 class="alert-title">Sukses !</h4><p class="alert-message">'.$message.'</p></div></div>':''; ?>
                                                          <?php $pesan = $this->session->flashdata("warning"); ?>
                                                          <?=isset($pesan)?'<div class="alert alert-danger media fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><div class="media-left"><span class="icon-wrap icon-wrap-xs alert-icon"><i class="fa fa-remove fa-lg"></i></span> </div><div class="media-body"><h4 class="alert-title">Gagal !</h4><p class="alert-message">'.$pesan.'</p></div></div>':''; ?>

                                <div class="tab-base">
                                            <!--Nav Tabs-->
                                            <ul class="nav nav-tabs">
                                                <li class="active"> <a data-toggle="tab" href="#blm_disetujui">Belum Ditanggapi</a> </li>
                                                <li> <a data-toggle="tab" href="#diproses">Diproses Dosen Wali</a> </li>
                                                <li> <a data-toggle="tab" href="#selesai">Selesai</a> </li>
                                                <li> <a data-toggle="tab" href="#ditolak">Ditolak</a> </li>
                                            </ul>
                                            <!--Tabs Content-->
                                            <div class="tab-content">

                                                <!--blm disetujui -->
                                                <div id="blm_disetujui" class="tab-pane active in table-responsive">
                                                    <div class="table-responsive">
                                                        <table id="pengaduan_blm_disetujui" class="table table-striped table-bordered" style="width: 100%">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 2%;">No</th>
                                                                    <th class="hidden-xs" style="width: 12%">Aksi</th>
                                                                    <th class="min-tablet" style="width: 20%;">NIM</th>
                                                                    <th class="min-tablet" style="width: 20%;">Nama</th>
                                                                    <th class="min-tablet" style="width: 20%;">No HP</th>
                                                                    <th class="min-tablet" style="width: 20%;">Email</th>
                                                                    <th class="min-tablet" style="width: 20%;">Keterangan Masalah</th>
                                                                    <th class="min-tablet" style="width: 20%;">Nama Pelapor</th>
                                                                    <th class="min-tablet" style="width: 20%;">Email Pelapor</th>
                                                                    <th class="min-tablet" style="width: 20%;">NIP/NIM Pelapor</th>
                                                                    <th class="min-tablet" style="width: 20%;">Unit Pelapor</th>
                                                                    <th class="min-tablet" style="width: 20%;">Status Pelapor</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php if (!empty($daftar_mhs_blmdisetujui)) { ?>
                                                                <?php $i=0; foreach ($daftar_mhs_blmdisetujui as $key): $i++; ?>

                                                                <tr>
                                                                    <td style="text-align: center;"><?= $i ?></td>
                                                                    <td>
                                                                        <a href="<?= base_url('Pengaduan_admin/pendaftarmanualform/'.$key->nim.'/'.$key->id_bk_form_pengaduan_mhs_bermasalah)?>" class="btn btn-success btn-labeled fa fa-pencil">Jadwalkan Konseling</a> &nbsp; <br>
                                                                        <button data-toggle="modal" data-target="#myModalDosenWali<?php echo $key->id_bk_form_pengaduan_mhs_bermasalah?>" class="btn btn-success btn-labeled fa fa-pencil">Adukan ke Dosen Wali</button> &nbsp; <br>
                                                                        <button data-toggle="modal" data-target="#myModal<?php echo $key->id_bk_form_pengaduan_mhs_bermasalah?>" class="btn btn-danger btn-labeled fa fa-times">Ditolak</button> &nbsp;
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $key->nim;?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $key->nama;?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $key->no_hp;?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $key->email;?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $key->keterangan_masalah;?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $key->created_by_nama;?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $key->created_by_email;?>
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
                                                            <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <!-- diproses -->
                                                <div id="diproses" class="tab-pane in table-responsive">
                                                    <div class="table-responsive">
                                                        <table id="pengaduan_diproses" class="table table-striped table-bordered" style="width: 100%">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 2%;">No</th>
                                                                    <th class="hidden-xs" style="width: 12%">Aksi</th>
                                                                    <th class="hidden-xs" style="width: 12%">Pesan Ke Dosen Wali</th>
                                                                    <th class="min-tablet" style="width: 20%;">NIM</th>
                                                                    <th class="min-tablet" style="width: 20%;">Nama</th>
                                                                    <th class="min-tablet" style="width: 20%;">No HP</th>
                                                                    <th class="min-tablet" style="width: 20%;">Email</th>
                                                                    <th class="min-tablet" style="width: 20%;">Keterangan Masalah</th>
                                                                    <th class="min-tablet" style="width: 20%;">Nama Pelapor</th>
                                                                    <th class="min-tablet" style="width: 20%;">Email Pelapor</th>
                                                                    <th class="min-tablet" style="width: 20%;">NIP/NIM Pelapor</th>
                                                                    <th class="min-tablet" style="width: 20%;">Unit Pelapor</th>
                                                                    <th class="min-tablet" style="width: 20%;">Status Pelapor</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php if (!empty($daftar_mhs_diproses)) { ?>
                                                                <?php $i=0; foreach ($daftar_mhs_diproses as $key): $i++; ?>

                                                                <tr>
                                                                    <td style="text-align: center;"><?= $i ?></td>
                                                                    <td>
                                                                        <a href="<?= base_url('Pengaduan_admin/pendaftarmanualform/'.$key->nim.'/'.$key->id_bk_form_pengaduan_mhs_bermasalah)?>" class="btn btn-success btn-labeled fa fa-pencil">Jadwalkan Konseling</a> &nbsp; <br>
                                                                        <!-- <a onclick="return confirm('Anda Yakin Menolak ?')" href="<?= base_url('Pengaduan_admin/tolak_mhs_bermasalah/'.$key->id_bk_form_pengaduan_mhs_bermasalah)?>" class="btn btn-danger btn-labeled fa fa-times">Ditolak</a> &nbsp; -->
                                                                        <!-- <button data-toggle="modal" data-target="#myModal<?php echo $key->id_bk_form_pengaduan_mhs_bermasalah?>" class="btn btn-danger btn-labeled fa fa-times">Ditolak</button> &nbsp; -->
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $key->isi_pesan_ke_dosenwali;?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $key->nim;?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $key->nama;?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $key->no_hp;?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $key->email;?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $key->keterangan_masalah;?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $key->created_by_nama;?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $key->created_by_email;?>
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
                                                            <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <!-- selesai -->
                                                <div id="selesai" class="tab-pane in table-responsive">
                                                    <div class="table-responsive">
                                                        <table id="pengaduan_selesai" class="table table-striped table-bordered" style="width: 100%">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 2%;">No</th>
                                                                    <!-- <th class="hidden-xs" style="width: 12%">Aksi</th> -->
                                                                    <th class="min-tablet" style="width: 20%;">NIM</th>
                                                                    <th class="min-tablet" style="width: 20%;">Nama</th>
                                                                    <th class="min-tablet" style="width: 20%;">No HP</th>
                                                                    <th class="min-tablet" style="width: 20%;">Email</th>
                                                                    <th class="min-tablet" style="width: 20%;">Keterangan Masalah</th>
                                                                    <th class="min-tablet" style="width: 20%;">Nama Pelapor</th>
                                                                    <th class="min-tablet" style="width: 20%;">Email Pelapor</th>
                                                                    <th class="min-tablet" style="width: 20%;">NIP/NIM Pelapor</th>
                                                                    <th class="min-tablet" style="width: 20%;">Unit Pelapor</th>
                                                                    <th class="min-tablet" style="width: 20%;">Status Pelapor</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php if (!empty($daftar_mhs_approve)) { ?>
                                                                <?php $i=0; foreach ($daftar_mhs_approve as $key): $i++; ?>

                                                                <tr>
                                                                    <td style="text-align: center;"><?= $i ?></td>
                                                                    <!-- <td>
                                                                        <a href="<?= base_url('Pengaduan_admin/pendaftarmanualform/'.$key->nim.'/'.$key->id_bk_form_pengaduan_mhs_bermasalah)?>" class="btn btn-success btn-labeled fa fa-pencil">Tindak Lanjuti</a> &nbsp; <br>
                                                                        <a onclick="return confirm('Anda Yakin Menolak ?')" href="<?= base_url('Pengaduan_admin/tolak_mhs_bermasalah/'.$key->id_bk_form_pengaduan_mhs_bermasalah)?>" class="btn btn-danger btn-labeled fa fa-times">Ditolak</a> &nbsp;
                                                                        <button data-toggle="modal" data-target="#myModal<?php echo $key->id_bk_form_pengaduan_mhs_bermasalah?>" class="btn btn-danger btn-labeled fa fa-times">Ditolak</button> &nbsp;
                                                                    </td> -->
                                                                    <td>
                                                                        <?php echo $key->nim;?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $key->nama;?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $key->no_hp;?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $key->email;?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $key->keterangan_masalah;?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $key->created_by_nama;?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $key->created_by_email;?>
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
                                                            <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <!--ditolak -->
                                                <div id="ditolak" class="tab-pane in table-responsive">
                                                    <div class="table-responsive">
                                                        <table id="pengaduan_ditolak" class="table table-striped table-bordered" style="width: 100%">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 2%;">No</th>
                                                                    <!-- <th class="hidden-xs" style="width: 12%">Aksi</th> -->
                                                                    <th class="hidden-xs" style="width: 12%">Alasan Ditolak</th>
                                                                    <th class="min-tablet" style="width: 20%;">NIM</th>
                                                                    <th class="min-tablet" style="width: 20%;">Nama</th>
                                                                    <th class="min-tablet" style="width: 20%;">No HP</th>
                                                                    <th class="min-tablet" style="width: 20%;">Email</th>
                                                                    <th class="min-tablet" style="width: 20%;">Keterangan Masalah</th>
                                                                    <th class="min-tablet" style="width: 20%;">Nama Pelapor</th>
                                                                    <th class="min-tablet" style="width: 20%;">Email Pelapor</th>
                                                                    <th class="min-tablet" style="width: 20%;">NIP/NIM Pelapor</th>
                                                                    <th class="min-tablet" style="width: 20%;">Unit Pelapor</th>
                                                                    <th class="min-tablet" style="width: 20%;">Status Pelapor</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php if (!empty($daftar_mhs_ditolak)) { ?>
                                                                <?php $i=0; foreach ($daftar_mhs_ditolak as $key): $i++; ?>

                                                                <tr>
                                                                    <td style="text-align: center;"><?= $i ?></td>
                                                                    <!-- <td>
                                                                        <a href="<?= base_url('Pengaduan_admin/pendaftarmanualform/'.$key->nim.'/'.$key->id_bk_form_pengaduan_mhs_bermasalah)?>" class="btn btn-success btn-labeled fa fa-pencil">Jadwalkan Konseling</a> &nbsp; <br>
                                                                        <button data-toggle="modal" data-target="#myModalDosenWali<?php echo $key->id_bk_form_pengaduan_mhs_bermasalah?>" class="btn btn-success btn-labeled fa fa-pencil">Adukan ke Dosen Wali</button> &nbsp; <br>
                                                                        <button data-toggle="modal" data-target="#myModal<?php echo $key->id_bk_form_pengaduan_mhs_bermasalah?>" class="btn btn-danger btn-labeled fa fa-times">Ditolak</button> &nbsp;
                                                                    </td> -->
                                                                    <td>
                                                                        <?php echo $key->alasan_ditolak;?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $key->nim;?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $key->nama;?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $key->no_hp;?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $key->email;?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $key->keterangan_masalah;?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $key->created_by_nama;?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $key->created_by_email;?>
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
                                                            <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                </div>

                                        
                            </div>
                        </div>
					</div>
				</div>
                      
                       
                    </div>
                    <!--===================================================-->
                    <!--End page content-->
                </div>

                <!--MOdal Jadwalkan Konseling Manual -->
                <?php if (!empty($daftar_mhs_blmdisetujui)) { ?>
                    <?php $i=0; foreach ($daftar_mhs_blmdisetujui as $key): $i++; ?>
                        <div id="myModal<?php echo $key->id_bk_form_pengaduan_mhs_bermasalah?>" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Tolak Pengaduan</h4>
                                    </div>
                                    <form method="post" action="<?php echo base_url('Pengaduan_admin/tolak_mhs_bermasalah/'.$key->id_bk_form_pengaduan_mhs_bermasalah);?>">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="demo-hor-inputpass"><b >Alasan Ditolak</b></label>
                                            <div class="col-md-10">
                                                <textarea rows="4" class="form-control" name="alasan_ditolak" required></textarea>
                                            </div>
                                        </div><br><br><br><br>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                        <button onclick="return confirm('Anda Yakin Tolak ?')" type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    <?php endforeach ?>
                <?php } ?>

                <!-- Modal Adukan Ke Dosen Wali -->
                <?php if (!empty($daftar_mhs_blmdisetujui)) { ?>
                    <?php $i=0; foreach ($daftar_mhs_blmdisetujui as $key): $i++; ?>
                        <div id="myModalDosenWali<?php echo $key->id_bk_form_pengaduan_mhs_bermasalah?>" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Adukan ke Dosen Wali</h4>
                                    </div>
                                    <form method="post" action="<?php echo base_url('Pengaduan_admin/adukan_ke_dosenwali/'.$key->id_bk_form_pengaduan_mhs_bermasalah);?>">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="demo-hor-inputpass"><b >Isi Pesan</b></label>
                                            <div class="col-md-10">
                                                <textarea rows="4" class="form-control" name="isi_pesan" required></textarea>
                                            </div>
                                        </div><br><br><br><br>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                        <button onclick="return confirm('Anda Yakin Tolak ?')" type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    <?php endforeach ?>
                <?php } ?>



