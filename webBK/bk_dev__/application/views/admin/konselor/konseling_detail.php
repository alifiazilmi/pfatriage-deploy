 <style>
     #start {
        animation: blinker 1s linear infinite;
    }

    @keyframes blinker {
    50% {
        opacity: 0;
    }
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
 <!--END NAVBAR-->
  <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div onload="showDiv();" id="content-container">
                    <div class="pageheader hidden-xs">
                        <h3><i class="fa fa-list"></i>Panel Control Konseling </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li class="active"> Akan Konseling </li>

                            </ol>
                        </div>
                    </div>


                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                    <div class="pull-right"><a href="#" onclick="window.history.go(-1)" class="btn btn-warning btn-labeled fa fa-arrow-left"> Kembali</a></div><br><br>
                        <?php $message_berhasil = $this->session->flashdata("status_berhasil"); ?>
                        <?=isset($message_berhasil)?'<div class="alert alert-success alert-dismissible">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                            <h4><i class="icon fa fa-check"></i> Sukses!</h4>'.$message_berhasil.'</div>':''; ?>
                        <?php $message_gagal = $this->session->flashdata("status_gagal"); ?>
                        <?=isset($message_gagal)?'<div class="alert alert-danger alert-dismissible">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                            <h4><i class="icon fa fa-check"></i> Gagal!</h4>'.$message_gagal.'</div>':''; ?>

                         <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="userWidget-1">
                                    <div class="avatar bg-info">
                                        <?php if($default_profiles->photo=="") { ?>
                                            <img class="img-responsive img-circle" src="<?= base_url('assets/admin/') ?>img/user.png" alt="avatar">
                                        <?php } else { ?>
                                          <!-- <?php $cek_foto="https://kemahasiswaan.itb.ac.id/assets/upload/".$default_profiles->nim."/".$default_profiles->photo;?> -->
                                          <?php if($default_profiles->nim!="") { ?>
                                                <img  class="img-responsive img-circle" src="https://kemahasiswaan.itb.ac.id/assets/upload/<?php echo $default_profiles->nim;?>/<?php echo $default_profiles->photo;?>" alt="avatar">
                                          <?php } else {?>
                                                <img class="img-responsive img-circle" src="https://kemahasiswaan.itb.ac.id/assets/upload/<?php echo $default_profiles->nim_tpb;?>/<?php echo $default_profiles->photo;?>" alt="avatar">
                                          <?php } ?>
                                        <?php } ?>
                                        <div class="name osLight"> <?php echo $default_profiles->display_name;?></div>
                                    </div>
                                    <div class="title">  <?php echo $default_profiles->prodi_jenjang;?>| <?php echo $default_profiles->nama_prodi;?> | <?php if(!empty($default_profiles->nim)){echo $default_profiles->nim;}else{echo $default_profiles->nim_tpb;}?> | <?php  $result=$this->KonselorModel->service_ditdik($default_profiles->user_id); if(!empty($result[0]->no_hp)){ echo  $result[0]->no_hp;}else{echo"No HP Tidak Tersedia";}?> | <?php  $result=$this->KonselorModel->service_ditdik($default_profiles->user_id); if(!empty($result[0]->email)){ echo  $result[0]->email;}else{echo"Email Tidak Tersedia";}?></div>
                                    <div class="address">  </div>
                                    <ul class="fullstats">
                                        <li><span><?php if(!empty($data_konseling->durasi_konseling)) { echo $data_konseling->durasi_konseling; echo"Durasi Konseling";} else { ?><!--<p><time>00:00:00</time></p>--><?php }?></span></li>
                                        <li> 
                                            <?php if(empty($data_konseling->waktu_akhir_konseling)) { ?>
                                                <!-- <a onclick="return confirm('Apakah Anda Yakin Ingin Mengakhiri Sesi Konseling Ini ?')" href="<?php echo base_url('Konselor/stop_konseling/'.$data_konseling->id_konseling);?>" type="submit" class="btn btn-danger btn-icon icon-lg fa fa-stop" title="Stop Konseling" ></a> -->
                                                <a id="stop" class="btn btn-danger btn-icon icon-lg fa fa-stop" title="Stop Konseling"></a>
                                            <?php } else { ?>
                                               <!-- <button onclick="alert('Anda Sudah Mengakhiri Sesi Konseling.')" href="#" type="submit" class="btn btn-danger btn-icon icon-lg fa fa-stop" title="Stop Konseling" disabled></button> -->
                                            <?php } ?>
                                        </li>
                                        <li>  
                                            <?php if(empty($data_konseling->waktu_mulai_konseling)) { ?>
                                               &nbsp;  <!-- <a onclick="return confirm('Anda Yakin Ingin Memulai Konseling Sekarang ?')" href="<?php echo base_url('Konselor/mulai_konseling/'.$data_konseling->id_konseling);?>" class="btn btn-success btn-icon icon-lg fa fa-play" title="Mulai Konseling"></a> -->
                                               <a id="start" class="btn btn-success btn-icon icon-lg fa fa-play" title="Mulai Konseling"></a>
                                            <?php } else { ?>
                                               <!-- &nbsp; <button onclick="alert('Anda Sudah Memulai Konseling')" href="#" type="submit" class="btn btn-success btn-icon icon-lg fa fa-play" title="Mulai Konseling" disabled></button> -->
                                            <?php } ?> 
                                        </li>
                                    </ul>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-control">
                                          <!--   <button class="btn btn-default" data-click="panel-collapse"><i class="fa fa-chevron-down"></i></button> -->
                                        </div>
                                        <h3 class="panel-title"><i class="fa fa-table"> </i> Riwayat Konseling</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table id="demo-dt-basic3" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td style="width:5px">No</td>
                                                        <td> Waktu</td>
                                                        <td> Konselor </td>
                                                        <td> Data Riwayat Konseling</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i=0; foreach ($riwayat_konseling as $fetch) { $i++ ?>
                                                    <tr>
                                                        <td><?php echo $i;?></td>
                                                        <td> <span class="text-semibold"><?php $tanggal_disetujui=$fetch->tanggal_disetujui; echo date("d-m-Y",strtotime($tanggal_disetujui));?></span>
                                                                <br>
                                                            <small class="text-muted"><?php echo $fetch->jam_disetujui;?></small>
                                                        </td>
                                                        <td> <?php echo $fetch->gelar_depan;?> <?php echo $fetch->nama_lengkap;?> <?php echo $fetch->gelar_belakang;?></td>
                                                        <td><a target="_blank" href="<?= base_url('konselor/riwayat_konseling/'.$fetch->id_konseling) ?>" class="btn btn-success btn-labeled fa fa-search">Tinjau</a></td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <?php if (!empty($kategori_masalah)){?>
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <div class="panel-control">
                                            <!--   <button class="btn btn-default" data-click="panel-collapse"><i class="fa fa-chevron-down"></i></button> -->
                                            </div>
                                            <h3 class="panel-title"><i class="fa fa-table"> </i> Hasil Screening</h3>
                                        </div>
                                        <div class="panel-body">
                                            <p><b>Kategori Masalah: <ul><?php foreach($kategori_masalah as $fetch){?><li><?php echo $fetch->kategori_masalah;?></li><?php } ?></ul> </b></p>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td style="width:5px">No Pertanyaan</td>
                                                        <td>Pertanyaan</td>
                                                        <td>Jawaban</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i=0; foreach ($hasil_screening as $fetch) { $i++ ?>
                                                    <tr>
                                                        <td><?php echo $fetch->no_pertanyaan;?></td>
                                                        <td> <?php echo $fetch->pertanyaan;?> </td>
                                                        <td> <span class="text-semibold"><?php if ($fetch->jawaban!=""){echo $fetch->jawaban;} else {echo "-";}?></span></td>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                      
                       
                    </div>


                    <div id="form" class="row">
                            <div class="col-lg-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                    
                                        <h3 class="panel-title">Rekam Konseling/Medis</h3>
                                    </div>

                                    <form method="POST" enctype='multipart/form-data' action="<?php echo base_url('Konselor/proc_konsultasi');?>" class="panel-body form-horizontal">
                                         <input type="hidden" name="id_konseling" value="<?php echo $data_konseling->id_konseling;?>">
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-textarea-input">Alasan Konsultasi :</label>
                                            <div class="col-md-9">
                                                <textarea id="demo-textarea-input"   rows="40" name="alasan_konsultasi" class="form-control alasan_konsultasi" placeholder="Your content here.."></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-textarea-input">Ringkasan Analisa Permasalahan :</label>
                                            <div class="col-md-9">
                                                <textarea id="demo-textarea-input"   rows="40" name="ringkasan_analisa_permasalahan" class="form-control ringkasan_analisa_permasalahan" placeholder="Your content here.."></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-textarea-input">Tindakan Kuratif yang Dilakukan :</label>
                                            <div class="col-md-9">
                                                <textarea id="demo-textarea-input"   rows="40" name="tindakan_kuratif" class="form-control tindakan_kuratif" placeholder="Your content here.."></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-textarea-input">Rekomendasi :</label>
                                            <div class="col-md-9">
                                                <textarea id="demo-textarea-input"   rows="40" name="rekomendasi" class="form-control rekomendasi" placeholder="Your content here.."></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-textarea-input">Catatan lain selama proses konseling (observasi jika ada) :</label>
                                            <div class="col-md-9">
                                                <textarea id="demo-textarea-input"   rows="40" name="catatan_observasi" class="form-control catatan_observasi" placeholder="Your content here.."></textarea>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-textarea-input">Catatan Konseling :</label>
                                            <div class="col-md-9">
                                                <textarea id="demo-textarea-input"   rows="40" name="resume_konsultasi" class="form-control rekam" placeholder="Your content here.."></textarea>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-textarea-input">Saran kepada Pasien :</label>
                                            <div class="col-md-9">
                                                <textarea id="demo-textarea-input"  name="saran" rows="10" class="form-control saran" placeholder="Your content here.."></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-textarea-input">Sampaikan Catatan Ke:</label>
                                            <div class="col-md-9">
                                                <input type="checkbox" onchange="show_dosenwali();"  id="cek_dosenwali" name="dosenwali" value="1">
                                                <label> Dosen Wali</label><br>
                                                <input type="checkbox" onchange="show_orangtua();" id="cek_orangtua" name="orangtua" value="1">
                                                <label> Orang Tua</label><br>
                                            </div>
                                        </div>

                                        <div style="display: none;" id="isian_dosenwali" class="form-group">
                                            <label class="col-md-3 control-label" for="demo-textarea-input">Catatan Kepada Dosen Wali:</label>
                                            <div class="col-md-9">
                                                <textarea id="demo-textarea-input"  name="catatan_dosen_wali" rows="10" class="form-control catatan_dosen_wali" placeholder="Your content here.."></textarea>
                                            </div>
                                        </div>

                
                                        <div style="display: none;" id="isian_orangtua" class="form-group">
                                            <label class="col-md-3 control-label" for="demo-textarea-input">Catatan Kepada Orang Tua:</label>
                                            <div class="col-md-9">
                                                <textarea id="demo-textarea-input"  name="catatan_orang_tua" rows="10" class="form-control catatan_orang_tua" placeholder="Your content here.."></textarea>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-textarea-input">Foto Konseling(*jpg/jpeg/png Maks 2 MB) :</label>
                                            <div class="col-md-9">
                                               <input type="file" name="foto_konseling" capture="environment" class="form-control" accept="image/jpg, image/jpeg, image/png" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-textarea-input">Lampiran Konseling(*pdf Maks 2 MB) :</label>
                                            <div class="col-md-9">
                                               <input type="file" name="lampiran_konseling" class="form-control" accept="application/pdf" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-textarea-input">Kategori Kasus:</label>
                                            <div class="col-md-9">
                                                <input type="checkbox" name="kategori_kasus[]" value="Emosi">
                                                <label> Emosi</label><br>
                                                <input type="checkbox" name="kategori_kasus[]" value="Akademik">
                                                <label> Akademik</label><br>
                                                <input type="checkbox" name="kategori_kasus[]" value="Keluarga">
                                                <label> Keluarga</label><br>
                                                <input type="checkbox" name="kategori_kasus[]" value="Interaksi Sosial">
                                                <label> Interaksi Sosial</label><br>
                                                <input type="checkbox" name="kategori_kasus[]" value="Pemahaman Diri">
                                                <label> Pemahaman Diri</label><br>
                                                <input type="checkbox" name="kategori_kasus[]" value="Motivasi">
                                                <label> Motivasi</label><br>
                                                <input type="checkbox" name="kategori_kasus[]" value="Penyesuaian Diri">
                                                <label> Penyesuaian Diri</label><br>
                                                <input type="checkbox" name="kategori_kasus[]" value="Pengelolaan Diri">
                                                <label> Pengelolaan Diri</label><br>
                                                <input type="checkbox" name="kategori_kasus[]" value="Kesulitan Belajar Daring">
                                                <label> Kesulitan Belajar Daring</label><br>
                                                <input type="checkbox" name="kategori_kasus[]" value="Kepercayaan Diri">
                                                <label> Kepercayaan Diri</label><br>
                                                <input type="checkbox" name="kategori_kasus[]" value="Perencanaan Karir">
                                                <label> Perencanaan Karir</label><br>
                                                <input onclick="kategori_kasus_show_isian();" type="checkbox" id="kategori_kasus_lainnya" value="Lainnya">
                                                <label> Lainnya</label><br>
                                                <input style="display:none;" placeholder="Isi Lainnya ...." type="text" id="kategori_kasus_lainnya_isian" name="kategori_kasus_lainnya" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                                <label class="control-label col-md-3"> Level Kasus </label>
                                                <div class="col-md-9">
                                                    <select class="form-control" required name="level_kasus" data-style="btn-primary" tabindex="-98">
                                                            <option value="">-- PILIH LEVEL KASUS --</option>
                                                            <option value="Ringan">Ringan</option>
                                                            <option value="Sedang">Sedang</option>
                                                            <option value="Berat">Berat</option>
                                                    </select>
                                                </div>
                                        </div>

                                        <div class="form-group">
                                                <label class="control-label col-md-3"> Apakah Isian Lengkap </label>
                                                <div class="col-md-9">
                                                    <select class="form-control" required name="is_lengkap" data-style="btn-primary" tabindex="-98">
                                                            <option value="0">Belum Lengkap</option>
                                                            <option value="1">Sudah Lengkap</option>
                                                    </select>
                                                </div>
                                        </div>

                                        <div class="form-group">
                                                <label class="control-label col-md-3"> Saran Lanjutan </label>
                                                <div class="col-md-9">
                                                    <select onchange="showDiv('tanggal_konsul_lanjutan', this)" class="form-control selectpicker" required name="kesimpulan" data-style="btn-primary" tabindex="-98">
                                                            <option value="Jadwalkan Konseling Lanjutan">Jadwalkan Konseling Lanjutan</option>
                                                            <option value="Perlu Rujukan">Perlu Rujukan</option>
                                                            <option value="Selesai">Selesai</option>
                                                    </select>
                                                </div>
                                        </div>
                                        
                                        <div style="diaplay:none;" id="tanggal_konsul_lanjutan">
                                                <!-- <div class="form-group">
                                                    <label class="col-md-3 control-label" for="demo-textarea-input">Tanggal Konseling lanjutan :</label>
                                                    <div class="col-md-9">
                                                        <input type="date"  name="tanggal_konsul_lanjutan"  class="form-control"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="demo-textarea-input">Jam Konseling lanjutan :</label>
                                                    <div class="col-md-9">
                                                        <input type="time"  name="jam_konsul_lanjutan"  class="form-control"></textarea>
                                                    </div>
                                                </div> -->

                                                <div class="form-group">
                                                    <label class="control-label col-md-3"> Pilih Konselor </label>
                                                    <div class="col-md-9">
                                                        <select onchange="get_jadwal_konselor();" class="form-control"  id="konselor_konsultasi_lanjutan" name="konselor_konsultasi_lanjutan" data-style="btn-primary" tabindex="-98">
                                                                <option value=""> -- Pilih Jadwal Konselor --</option>
                                                                <option value="<?php echo $data_konseling->ditangani_oleh;?>">Saya Sendiri</option>
                                                                <?php foreach($list_konselor as $fetch){ ?>
                                                                    <option value="<?php echo $fetch->id_user;?>"><?php echo $fetch->gelar_depan;?> <?php echo $fetch->nama_lengkap;?> <?php echo $fetch->gelar_belakang;?></option>
                                                                <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div style="margin:3px" class="form-group">
                                                    <label class="col-md-3 control-label" for="demo-textarea-input">Pilih Jadwal Konsultasi :</label>
                                                    <div class="col-md-9">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                            <th>Konselor</th>
                                                            <th>Tanggal</th>
                                                            <th>Jam Mulai</th>
                                                            <th>Jam Akhir</th>
                                                            <th>Boooking</th>
                                                            </tr>
                                                            </thead>                                         
                                                            <tbody id="jadwal_konselor"></tbody>
                                                        </table>
                                                    </div>
                                                 </div> 

                                                <!-- <div class="form-group">
                                                    <label class="col-md-3 control-label" for="demo-textarea-input">Venue :</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control selectpicker" name="venue" data-style="btn-primary" tabindex="-98">
                                                                <?php foreach ($room as $rooms){ ?>
                                                                    <option value="<?php echo $rooms->room_name;?>"><?php echo $rooms->room_name;?></option>
                                                                <?php } ?>
                                                        </select>
                                                    </div>
                                                </div> -->
                                        </div>
                                    </div>
                                    <div class="panel-footer text-right">
                                                <button onclick="return confirm('Anda Yakin Simpan ?')" class="btn btn-success btn-block" type="submit">Simpan</button>
                                    </div>
                                    </form>

                                    
                                </div>
                            </div>
                    </div>


                    <!--===================================================-->
                    <!--End page content-->
                </div>

                <script>
                   function showDiv(divId, element){
                           document.getElementById(divId).style.display = element.value == "Jadwalkan Konseling Lanjutan" ? 'block' : 'none';
                        }

                    //stopwatch
                    var h1 = document.getElementsByTagName('p')[0],
                        start = document.getElementById('start'),
                        stop = document.getElementById('stop'),
                        clear = document.getElementById('clear'),
                        seconds = 0, minutes = 0, hours = 0,
                        t;

                    function add() {
                        seconds++;
                        if (seconds >= 60) {
                            seconds = 0;
                            minutes++;
                            if (minutes >= 60) {
                                minutes = 0;
                                hours++;
                            }
                        }
                        
                        h1.textContent = (hours ? (hours > 9 ? hours : "0" + hours) : "00") + ":" + (minutes ? (minutes > 9 ? minutes : "0" + minutes) : "00") + ":" + (seconds > 9 ? seconds : "0" + seconds);

                        timer();
                    }
                    function timer() {
                        t = setTimeout(add, 1000);
                    }
                    timer();


                    /* Start button */
                    start.onclick = timer;

                    /* Stop button */
                    stop.onclick = function() {
                        clearTimeout(t);
                    }

                    /* Clear button */
                    clear.onclick = function() {
                        h1.textContent = "00:00:00";
                        seconds = 0; minutes = 0; hours = 0;
                    }

                    //hidden show catatan orang tua dan wali
                    function show_orangtua(){
                        x = document.getElementById('cek_orangtua');
                        y = document.getElementById('isian_orangtua');

                        if (x.checked){
                            y.style.display="block";
                        } else {
                            y.style.display="none";
                        }
                    }

                    function show_dosenwali(){
                        x = document.getElementById('cek_dosenwali');
                        y = document.getElementById('isian_dosenwali');

                        if (x.checked){
                            y.style.display="block";
                        } else {
                            y.style.display="none";
                        }
                    }

                    //show isian kalo kategori kasus diceklis lainnya
                    function kategori_kasus_show_isian(){
                        x = document.getElementById('kategori_kasus_lainnya');
                        y = document.getElementById('kategori_kasus_lainnya_isian');

                        if (x.checked){
                            y.style.display="block";
                        } else {
                            y.style.display="none";
                        }
                    }
                    
                    //ajax cek jadwal konselor apabila konsultasi lanjutan
                    function get_jadwal_konselor() {
                            $.ajax({
                                        type: "POST",
                                        url: "<?= base_url('Konselor/get_jadwal_konselor')?>",
                                        dataType:'json',
                                        data: {konselor_konsultasi_lanjutan: $( "#konselor_konsultasi_lanjutan" ).val()},
                                        cache: false,
                                        beforeSend: function(){
                                            //showLoading();
                                        },
                                        complete: function(){
                                        //  $('#image2').hide();
                                        },
                                        success:function(data){
                                            console.log(data);
                                            if (data[0].nama==null){
                                                //var obj = $.parseJSON(data);
                                                //alert(obj.notfound);
                                                jadwal_konselor_tdkada();
                                                trHTML='';
                                                $('#jadwal_konselor').html(trHTML);
                                            } else {
                                                let trHTML = ''; 
                                                $.each(data, function(index) {
                                                    trHTML += '<tr>';
                                                    trHTML += '<td>'+data[index].gelar_depan+' '+data[index].nama+' '+data[index].gelar_belakang+'</td>';
                                                    trHTML += '<td>'+data[index].tanggal+'</td>';
                                                    trHTML += '<td>'+data[index].jam_mulai+'</td>';
                                                    trHTML += '<td>'+data[index].jam_akhir+'</td>';
                                                    trHTML += '<td>'+'<input type="radio" id="id_jadwal_piket" name="id_jadwal_piket" required value="'+data[index].id_jadwal_piket+'">'+'</td>';
                                                    trHTML += '</tr>';
                                                });
                                                //$('#listRail').html(raildata);                                 
                                                $('#jadwal_konselor').html(trHTML);

                                            }
                                        }
                                    });      
                    }

                    function jadwal_konselor_tdkada(){
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Jadwal Konselor Tidak Ada !',
                            //footer: '<a href>Why do I have this issue?</a>'
                        });
                    }
                </script>