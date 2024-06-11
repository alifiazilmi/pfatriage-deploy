<?php 
                 $ci    =& get_instance();
                 $ci->load->model('admin/UsersModel','m_users');
                 $sumpendaftarbaru  = $ci->m_users->getcountpendaftaranbystatuspendaftaran();
                 $sumterjadwal  = $ci->m_users->getcountpendaftaranbyterjadwal(2);
                 $sumrujukan = $ci->m_users->getcountpendaftaranbystatus(4);
                 $sumselesai  = $ci->m_users->getcountpendaftaranbystatusselesai(3);

              	//konselor hitung jadwal akan konsultasi
	             $ci->load->model('konselor/KonselorModel');
	             $temp=$ci->KonselorModel->get_jadwal_pengajuan_konseling();
	             $konsul=count($temp);

                 //konselor hitung permohonan konsultasi
                 $temp=$ci->KonselorModel->get_jadwal_permohonan_konseling();
	             $permohonan=count($temp);
                 

    ?>

    <nav id="mainnav-container">
                
                    <div id="mainnav">
                        <!--Menu-->
                        <!--================================-->
                        <div id="mainnav-menu-wrap">
                            <div class="nano">
                                <div class="nano-content">
                                    <ul id="mainnav-menu" class="list-group">
                                        <!--Category name-->
                                        <li class="list-header">Navigasi</li>
                                        <!--Menu list item-->
                                        <li> <a href="<?= base_url('admin') ?>"> <i class="fa fa-home"></i> <span class="menu-title"> Dashboard </span> </a> </li>
                                        <!--Category name-->
                                   
                                        <li class="list-divider"></li>
                                        <!--Category name-->
                                        <li class="list-header">Menu Utama</li>
                                        <!--Menu list item-->
                                        <?php if ($this->session->userdata('bk_id_role') == 3 || $this->session->userdata('bk_id_role') == 1): ?>
                                            
                                     
                                        <li>
                                            <a href="<?= base_url('konselor/jadwal') ?>">
                                            <i class="fa fa-calendar"></i>
                                            <span class="menu-title">
                                            Jadwal Piket
                                            </span>
                                            </a>
                                        </li>
                                        <!--Menu list item-->
                                        <li>
                                            <a href="<?= base_url('konselor/konseling') ?>">
                                            <i class="fa fa-list "></i>
                                            <span class="menu-title">
                                              Jadwal Konseling
                                            <?php if ($konsul>0) { ?>
                                                <span class="label label-pink pull-right"><?php echo $konsul;?></span>
                                            <?php } ?>
                                            </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="<?= base_url('konselor/permohonan_konseling') ?>">
                                            <i class="fa fa-list "></i>
                                            <span class="menu-title">
                                             Permohonan Konseling
                                            <?php if ($konsul>0) { ?>
                                                <span class="label label-pink pull-right"><?php echo $permohonan;?></span>
                                            <?php } ?>
                                            </span>
                                            </a>
                                        </li>

                                        <?php endif ?>

                                        <?php if ($this->session->userdata('bk_id_role') == 1 || $this->session->userdata('bk_id_role') == 2 ): ?>



                                        <li>
                                            <a href="<?= base_url('admin/jadwal') ?>">
                                            <i class="fa fa-calendar"></i>
                                            <span class="menu-title">
                                            Jadwal Piket
                                            </span>
                                            </a>
                                        </li>
                                        <!--Menu list item-->
                                        <li>
                                            <a href="<?= base_url('admin/pendaftar') ?>">
                                            <i class="fa fa-list "></i>
                                            <span class="menu-title">
                                               Pengajuan
                                            <span class="label label-pink pull-right"><?= $sumpendaftarbaru ?></span>
                                            </span>
                                            </a>
                                        </li>

                                         <li>
                                            <a href="<?= base_url('admin/terjadwal') ?>">
                                            <i class="fa fa-book "></i>
                                            <span class="menu-title">
                                               Terjadwal
                                            <span class="label label-pink pull-right"><?= $sumterjadwal ?></span>
                                            </span>
                                            </a>
                                        </li>

                                         <li>
                                            <a href="<?= base_url('admin/rujukan') ?>">
                                            <i class="fa fa-ambulance "></i>
                                            <span class="menu-title">
                                               Perlu Rujukan
                                            <span class="label label-pink pull-right"><?= $sumrujukan ?></span>
                                            </span>
                                            </a>
                                        </li>


                                         <li>
                                            <a href="<?= base_url('admin/selesai') ?>">
                                            <i class="fa fa-check-circle-o "></i>
                                            <span class="menu-title">
                                               Selesai
                                            <span class="label label-pink pull-right"><?= $sumselesai ?></span>
                                            </span>
                                            </a>
                                        </li>


                                          <li>
                                            <a href="<?= base_url('admin/rekap') ?>">
                                            <i class="fa fa-file "></i>
                                            <span class="menu-title">
                                               Rekapitulasi
                                            </span>
                                            </a>
                                        </li>

                                          <li>
                                            <a href="<?= base_url('admin/feedback') ?>">
                                            <i class="fa fa-comments"></i>
                                            <span class="menu-title">
                                               Feedback
                                            </span>
                                            </a>
                                        </li>



                                         <li class="list-divider"></li>
                                        <!--Category name-->
                                        <li class="list-header">Manajemen Pengguna </li>


                                        <li>
                                            <a href="<?= base_url('admin/pengguna') ?>">
                                            <i class="fa fa-users"></i>
                                            <span class="menu-title">
                                            Daftar Pengguna
                                            </span>
                                            </a>
                                        </li>

                                         <li class="list-header">Manajemen Konten </li>

                                         <li>
                                            <a href="<?= base_url('admin/konten') ?>">
                                            <i class="fa fa-file-text-o"></i>
                                            <span class="menu-title">
                                            Konten Utama
                                            </span>
                                            </a>
                                        </li>

                                        <li class="list-header">Pengaduan </li>

                                        <li>
                                            <a href="<?= base_url('Pengaduan_admin/daftar_mhs_bermasalah') ?>">
                                            <i class="fa fa-users"></i>
                                            <span class="menu-title">
                                                Mahasiswa Bermasalah
                                            </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="<?= base_url('Pengaduan_admin/daftar_feedback') ?>">
                                            <i class="fa fa-comments"></i>
                                            <span class="menu-title">
                                                Feedback Institusi BK
                                            </span>
                                            </a>
                                        </li>


                                            
                                        <?php endif ?>
                                       
                                    </ul>
                                
                                </div>
                            </div>
                        </div>
                        <!--================================-->
                        <!--End menu-->
                    </div>
                </nav>
                <!--===================================================-->
                <!--END MAIN NAVIGATION-->
            </div>
            <!-- FOOTER -->
            <!--===================================================-->
            <footer id="footer">
                <!-- Visible when footer positions are fixed -->
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <div class="show-fixed pull-right">
                    <ul class="footer-list list-inline">
                        <li>
                            <p class="text-sm">SEO Proggres</p>
                            <div class="progress progress-sm progress-light-base">
                                <div style="width: 80%" class="progress-bar progress-bar-danger"></div>
                            </div>
                        </li>
                        <li>
                            <p class="text-sm">Online Tutorial</p>
                            <div class="progress progress-sm progress-light-base">
                                <div style="width: 80%" class="progress-bar progress-bar-primary"></div>
                            </div>
                        </li>
                        <li>
                            <button class="btn btn-sm btn-dark btn-active-success">Checkout</button>
                        </li>
                    </ul>
                </div>
                <!-- Visible when footer positions are static -->
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <div class="hide-fixed pull-right pad-rgt">Currently v1.0</div>
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <!-- Remove the class name "show-fixed" and "hide-fixed" to make the content always appears. -->
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <p class="pad-lft">&#0169; 2019 Direktorat Kemahasiswaan ITB</p>
            </footer>
            <!--===================================================-->
            <!-- END FOOTER -->
            <!-- SCROLL TOP BUTTON -->
            <!--===================================================-->
            <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
            <!--===================================================-->
        </div>
        <!--===================================================-->
        <!-- END OF CONTAINER -->
        <!--JAVASCRIPT-->
        <!--=================================================-->
        <!--jQuery [ REQUIRED ]-->
        <script src="<?= base_url('assets/admin') ?>/js/jquery-2.1.1.min.js"></script>
        <!--BootstrapJS [ RECOMMENDED ]-->
           <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
        <script src="<?= base_url('assets/admin') ?>/js/bootstrap.min.js"></script>
        <!--Fast Click [ OPTIONAL ]-->
        <script src="<?= base_url('assets/admin') ?>/plugins/fast-click/fastclick.min.js"></script>
        <!--Jquery Nano Scroller js [ REQUIRED ]-->
        <script src="<?= base_url('assets/admin') ?>/plugins/nanoscrollerjs/jquery.nanoscroller.min.js"></script>
        <!--Metismenu js [ REQUIRED ]-->
        <script src="<?= base_url('assets/admin') ?>/plugins/metismenu/metismenu.min.js"></script>

          <!--DataTables [ OPTIONAL ]-->
        <script src="<?= base_url('assets/admin') ?>/plugins/datatables/media/js/jquery.dataTables.js"></script>
        <script src="<?= base_url('assets/admin') ?>/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
        <script src="<?= base_url('assets/admin') ?>/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
        <!--Jasmine Admin [ RECOMMENDED ]-->
        <script src="<?= base_url('assets/admin') ?>/js/scripts.js"></script>
        <!--Switchery [ OPTIONAL ]-->
        <script src="<?= base_url('assets/admin') ?>/plugins/switchery/switchery.min.js"></script>
        <!--Jquery Steps [ OPTIONAL ]-->
        <script src="<?= base_url('assets/admin') ?>/plugins/parsley/parsley.min.js"></script>
        <!--Jquery Steps [ OPTIONAL ]-->
        <script src="<?= base_url('assets/admin') ?>/plugins/jquery-steps/jquery-steps.min.js"></script>
        <!--Bootstrap Select [ OPTIONAL ]-->
       
        <script src="<?= base_url('assets/admin') ?>/plugins/moment/moment.min.js"></script>
        <script src="<?= base_url('assets/admin') ?>/plugins/moment-range/moment-range.js"></script>
      
        <script src="<?= base_url('assets/admin') ?>/plugins/summernote/summernote.min.js"></script>
        <!--FooTable [ OPTIONAL ]-->
        <script src="<?= base_url('assets/admin') ?>/plugins/fooTable/dist/footable.all.min.js"></script>
        <!--Fullscreen jQuery [ OPTIONAL ]-->
        <script src="<?= base_url('assets/admin') ?>/plugins/screenfull/screenfull.js"></script>
        <!--FooTable Example [ SAMPLE ]-->
        <script src="<?= base_url('assets/admin') ?>/js/demo/tables-footable.js"></script>
        <script src="<?= base_url('assets/admin') ?>/plugins/jquery-ui/jquery-ui.js"></script>

        <script src="<?= base_url('assets/admin') ?>/plugins/blueimp/blueimp-file-upload/js/jquery.fileupload.js"></script>

        <script src="<?= base_url('assets/admin') ?>/js/jquery.LoadingBox.js"></script>

     

        <script type="text/javascript">
            $('#fileupload').fileupload();
        </script>
        

        <script type="text/javascript">
             $('.rekam').summernote({
               placeholder: 'your Message',
               tabsize: 2,
               height: 300
            });

             $('.saran').summernote({
               placeholder: 'your Message',
               tabsize: 2,
               height: 300
            });

            $('.catatan_dosen_wali').summernote({
               placeholder: 'your Message',
               tabsize: 2,
               height: 300
            });

                $('#artikelpane').summernote({
               placeholder: 'your Message',
               tabsize: 2,
               height: 300
            });


            $('#artikelpane2').summernote({
               placeholder: 'your Message',
               tabsize: 2,
               height: 300
            });

             $(document).ready( function () {
                    $('#demo-dt-basic').dataTable({
                        "bPaginate": true,
                        "bLengthChange": false,
                        "bFilter": true,
                        "bInfo": false,
                        "bAutoWidth": false });

                        $('#demo-dt-basic2').dataTable({
                        "bPaginate": true,
                        "bLengthChange": false,
                        "bFilter": true,
                        "bInfo": false,
                        "bAutoWidth": false });

                          $('#tableBanner').dataTable({
                        "bPaginate": true,
                        "bLengthChange": false,
                        "bFilter": true,
                        "bInfo": false,
                        "bAutoWidth": false });

                            $('#tableArtikel').dataTable({
                        "bPaginate": true,
                        "bLengthChange": false,
                        "bFilter": true,
                        "bInfo": false,
                        "bAutoWidth": false });

                            $('#tableRekap').dataTable({
                        "bPaginate": true,
                        "bLengthChange": false,
                        "bFilter": true,
                        "bInfo": false,
                        "bAutoWidth": false });


                            $('#tableRekap2').dataTable({
                        "bPaginate": true,
                        "bLengthChange": false,
                        "bFilter": true,
                        "bInfo": false,
                        "bAutoWidth": false });

                              $('#tableRekap3').dataTable({
                        "bPaginate": true,
                        "bLengthChange": false,
                        "bFilter": true,
                        "bInfo": false,
                        "bAutoWidth": false });

                                $('#tableRekap4').dataTable({
                        "bPaginate": true,
                        "bLengthChange": false,
                        "bFilter": true,
                        "bInfo": false,
                        "bAutoWidth": false });
                });



        </script>
      
                <script type="text/javascript">
                    
                   $("input[type='checkbox'][name='is_ganti_pass']").change(function() {
                        if ($("input[type='checkbox'][name='is_ganti_pass']:checked").length){
                            $('#passid').prop("disabled", false );
                            $('#passid').prop('required',true);
                        }else{
                            $('#passid').prop( "disabled", true );
                            $('#passid').prop('required',false);
                        }
                    })

                     $("select[name='ditangani_oleh']").change(function() {
                            
                            if (this.value != '') {
                                //alert(this.value);
                                $.ajax({
                                  method: "POST",
                                  url: "<?= base_url('admin/jsonjadwalkonselor/') ?>",
                                  data: { id: this.value }
                                })
                                .success(function( msg ) {

                                    $("select[name='tanggal']")
                                        .find('option')
                                        .remove()
                                        .end()
                                        .append('<option value="">- Tanggal -</option>')
                                        .val("");

                                    $.each(JSON.parse(msg), function(k, v) {
                                      
                                         $("select[name='tanggal']").append(new Option(moment(v.tanggal).format("DD/MM/YYYY"),v.tanggal));

                                    });
                                    
                                });


                             }
                        
                    })

                      $("select[name='tanggal']").change(function() {
                            
                            if (this.value != '') {
                                //alert(this.value);
                                $.ajax({
                                  method: "POST",
                                  url: "<?= base_url('admin/jsonjamkonselor/') ?>",
                                  data: { id: $("select[name='ditangani_oleh']").val() ,tanggal : this.value }
                                })
                                .success(function( msg ) {

                                    $("select[name='jam']")
                                        .find('option')
                                        .remove()
                                        .end()
                                        .append('<option value="">- Jam -</option>')
                                        .val("");

                                    $.each(JSON.parse(msg), function(k, v) {
                                      
                                         $("select[name='jam']").append(new Option(v.jam_mulai+' s/d '+v.jam_akhir,v.jam_mulai));

                                    });
                                    
                                });


                             }
                        
                    })

                      $("#nim").ready(function() {

                            $nim = $("#nim").val();

                            cekuserdbsix($nim);
                      
                        
                    });


                      function cekuserdbkemahasiswaan(nim) {
                            var data = '';
                          $.ajax({
                                  method: "POST",
                                  url: "<?= base_url('admin/jsonuserid/') ?>",
                                  data: { id: nim  }
                                })
                                .success(function( msg ) {
                                    if (msg != '') {
                                         data = JSON.parse(msg);
                                    }
                                    
                                    return data;
                      });
                  }



                      function cekuserdbsix(nim) {

                    

                            var $radios = $('input:radio[name=is_baru]');

                            if (nim == '') {
                                $('#simpanbtn').prop('disabled', true);
                                $('#nama').val('');
                                $('#email').val('');
                                $('#no_hp').val('');
                                $('#userid').val('');
                                $('#username').val('');
                                return false;


                            }

                            
                          $.ajax({
                                  method: "POST",
                                  url: "<?= base_url('admin/jsonditdik/') ?>",
                                  data: { id: nim  },
                                  beforeSend: function() { 
                                                            $.LoadingOverlay("show", {
                                                                image       : "",
                                                                fontawesome : "fa fa-cog fa-spin"
                                                            });
                                                         },
                                  success : function(msg) {
                                    var data = JSON.parse(msg);
                                    var data_kemahasiswaan = '';

                                      setTimeout(function(){
                                            $.LoadingOverlay("hide");
                                        }, 1000);

                                    if (data.length > 0) {
                                       

                                                $('#nama').val(data[0].nama_lengkap);
                                                $('#email').val(data[0].email);
                                                $('#no_hp').val(data[0].no_hp);

                                                        $.ajax({
                                                            method: "POST",
                                                            url: "<?= base_url('admin/jsonditsti/') ?>",
                                                            data: { id: nim  },
                                                            beforeSend: function() { 
                                                                            $.LoadingOverlay("show", {
                                                                                image       : "",
                                                                                fontawesome : "fa fa-cog fa-spin"
                                                                            });
                                                                         },
                                                            success:function( retur ) {
                                                                 $('#userid').val('');
                                                                 setTimeout(function(){
                                                                    $.LoadingOverlay("hide");
                                                                }, 3000);
                                                                    
                                                                    if (retur != '') {
                                                                        $data_dsti1 = JSON.parse(retur);
                                                                        console.log($data_dsti1);
                                                                        $('#username').val($data_dsti1.data[0].account_id);
                                                                                      $.ajax({
                                                                                              method: "POST",
                                                                                              url: "<?= base_url('admin/jsonuserid/') ?>",
                                                                                              data: { id: $data_dsti1.data[0].account_id }
                                                                                            })
                                                                                         .success(function( msg2 ) {
                                                                                                    if (msg2 != '') {
                                                                                                         data_kemahasiswaan = JSON.parse(msg2);
                                                                                                    }


                                                                                                      
                                                                                                if (data_kemahasiswaan != '') {
                                                                                                    $radios.filter('[value=0]').prop('checked', true);
                                                                                                    $('#userid').val(data_kemahasiswaan.id);
                                                                                                    $('#username').val(data_kemahasiswaan.username);
                                                                                                    $('#simpanbtn').prop('disabled', false);

                                                                                                      
                                                                                                }else{
                                                                                                    $('#userid').val('');
                                                                                                    $radios.filter('[value=1]').prop('checked', true);
                                                                                                    $('#simpanbtn').prop('disabled', false);
                                                                                                     
                                                                                                   
                                                                                                }

                                                                                              

                                                                                         });


                                                                    }else{

                                                                             setTimeout(function(){
                                                                                $.LoadingOverlay("hide");
                                                                            }, 1000);
                                                                           
                                                                            alert('Akun INA Belum Terdaftar di Direktorat Teknologi Informasi (DITSTI)');
                                                                            $('#nama').val('');
                                                                            $('#email').val('');
                                                                            $('#no_hp').val('');
                                                                             $('#userid').val('');
                                                                             $('#username').val('');
                                                                            $('#simpanbtn').prop('disabled', true);
                                                                    }

                                                                   
                                                                    
                                                            


                                                            }
                                                        });



                                    }else{

                                        $('#nama').val('');
                                        $('#email').val('');
                                        $('#no_hp').val('');
                                        $('#userid').val('');
                                        $('#username').val('');
                                        $('#simpanbtn').prop('disabled', true);

                                        
                                    }
                                }

                            });

                    }






                </script>

                 <script type="text/javascript">
                      
                      $('#jad_venue').on('change', function() {
                        
                        if(this.value == 'offline'){
                              $('#jad_medkom').html('Tempat');
                        }else{
                              $('#jad_medkom').html('Media Konsultasi');
                        }

                      });


                </script>

                 <script type="text/javascript">
                      
                      $('#jen_ko').on('change', function() {
                        
                        if(this.value == 1){

                              $('#box-hide').html('<div class="form-group">'+
                                                        '<label class="col-sm-2 control-label" for="demo-hor-inputemail">Tanggal Awal</label>'+
                                                        '<div class="col-sm-9">'+
                                                            '<input type="date" name="tgl_mulai" class="form-control" >'+
                                                        '</div>'+
                                                    '</div>'+
                                                    '<div class="form-group">'+
                                                        '<label class="col-sm-2 control-label" for="demo-hor-inputemail">Tanggal Berakhir</label>'+
                                                        '<div class="col-sm-9">'+
                                                            '<input type="date" name="tgl_berakhir" class="form-control" >'+
                                                        '</div>'+
                                                    '</div>');

                        }else{

                              $('#box-hide').html('');

                        }

                      });


                </script>

                <script type="text/javascript">
                $('.2mb').bind('change', function() {
                    if (this.files[0].size/1024/1024 > 2) {
                      alert('File Melebihin 2 MB');
                      this.value=null;
                    };
                });
            </script>

            <script type="text/javascript">
                $('.1mb').bind('change', function() {
                    if (this.files[0].size/1024/1024 > 1) {
                      alert('File Melebihin 1 MB');
                      this.value=null;
                    };
                });
            </script>
              <script type="text/javascript">
                $('.3mb').bind('change', function() {
                    if (this.files[0].size/1024/1024 > 3) {
                      alert('File Melebihin 3 MB');
                      this.value=null;
                    };
                });
            </script>


                
    </body>
</html>
