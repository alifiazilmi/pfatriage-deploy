<?php 
                 $ci    =& get_instance();
                 $ci->load->model('admin/UsersModel','m_users');
                 $sumpendaftarbaru  = $ci->m_users->getcountpendaftaranbystatus(1);


              	//konselor hitung jadwal akan konsultasi
	             $ci->load->model('konselor/KonselorModel');
	             $temp=$ci->KonselorModel->get_jadwal_pengajuan_konseling();
	             $konsul=count($temp);
       
                 

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
                                        <li> <a href="<?= base_url('konselor') ?>"> <i class="fa fa-home"></i> <span class="menu-title"> Dashboard </span> </a> </li>
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
                                               Konseling
                                            <?php if ($konsul>0) { ?>
                                                <span class="label label-pink pull-right"><?php echo $konsul;?></span>
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
                                               Pendaftaran
                                            <span class="label label-pink pull-right"><?= $sumpendaftarbaru ?></span>
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


                                        <li>
                                            <a href="<?= base_url('admin/underconstruction') ?>">
                                            <i class="fa fa-newspaper-o"></i>
                                            <span class="menu-title">
                                            Artikel
                                            </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="<?= base_url('admin/underconstruction') ?>">
                                            <i class="fa fa-comments-o"></i>
                                            <span class="menu-title">
                                            Faq
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

            $('.catatan_orang_tua').summernote({
               placeholder: 'your Message',
               tabsize: 2,
               height: 300
            });

            $('.alasan_konsultasi').summernote({
               placeholder: 'your Message',
               tabsize: 2,
               height: 300
            });

            $('.ringkasan_analisa_permasalahan').summernote({
               placeholder: 'your Message',
               tabsize: 2,
               height: 300
            });
            
            $('.tindakan_kuratif').summernote({
               placeholder: 'your Message',
               tabsize: 2,
               height: 300
            });

            $('.rekomendasi').summernote({
               placeholder: 'your Message',
               tabsize: 2,
               height: 300
            });

            $('.catatan_observasi').summernote({
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

                        $('#demo-dt-basic3').dataTable({
                        "bPaginate": true,
                        "pageLength": 5,
                        "bLengthChange": false,
                        "bFilter": true,
                        "bInfo": false,
                        "bAutoWidth": false });

                        $('#demo-dt-basic4').dataTable({
                        "bPaginate": true,
                        "pageLength": 5,
                        "bLengthChange": false,
                        "bFilter": true,
                        "bInfo": false,
                        "bAutoWidth": false });

                        clearTimeout(t);
                        $('#stop').hide();
                       // $('#form').hide();

                });


         $("#start").click(function(){
            $.ajax({
                                  method: "GET",
                                  url: "<?= base_url('Konselor/mulai_konseling/'.$data_konseling->id_konseling) ?>",
                                });

            $('#start').attr("disabled", true);
            $('#start').remove('#start');
            $('#stop').show();
        });

        $("#stop").click(function(){
            $.ajax({
                                  method: "GET",
                                  url: "<?= base_url('Konselor/stop_konseling/'.$data_konseling->id_konseling);?>",
                                });

            $('#stop').attr("disabled", true);
            $('#stop').remove('#stop');
            //$('#form').show();
           // alert('Silahkan Isi Resume Konseling.');
        });
       
            window.onbeforeunload = confirmExit;
            function confirmExit() {
                return "Anda Ingin Meninggalkan Halaman Ini ? Jangan Tinggalkan Halaman Ini Sebelum Anda Mengisi Resume Konseling.";
            }

        </script>
    </body>
</html>