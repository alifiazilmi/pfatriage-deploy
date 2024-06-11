<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Bimbingan Konseling | Direktorat Kemahasiswaan ITB </title>
        <link rel="shortcut icon" href="https://kemahasiswaan.itb.ac.id/assets/img/icon.png">
        <!--STYLESHEET-->
        <!--=================================================-->
        <!--Roboto Slab Font [ OPTIONAL ] -->
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:500,400italic,100,700italic,300,700,500italic,400" rel="stylesheet">
        <!--Bootstrap Stylesheet [ REQUIRED ]-->
        <link href="<?= base_url('assets/admin/') ?>/css/bootstrap.min.css" rel="stylesheet">
        <!--Jasmine Stylesheet [ REQUIRED ]-->
        <link href="<?= base_url('assets/admin/') ?>/css/style.css" rel="stylesheet">
        <!--Font Awesome [ OPTIONAL ]-->
        <link href="<?= base_url('assets/admin/') ?>/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!--Switchery [ OPTIONAL ]-->
        <!--Bootstrap Select [ OPTIONAL ]-->
        <link href="<?= base_url('assets/admin/') ?>/css/demo/jquery-steps.min.css" rel="stylesheet">
        <!--Summernote [ OPTIONAL ]-->
        <link href="<?= base_url('assets/admin/') ?>/plugins/summernote/summernote.min.css" rel="stylesheet">
        <!--Demo [ DEMONSTRATION ]-->
        <link href="<?= base_url('assets/admin/') ?>/css/demo/jasmine.css" rel="stylesheet">

        <link href="<?= base_url('assets/admin/') ?>/plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="<?= base_url('assets/admin/') ?>/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet">
         <!--FooTable [ OPTIONAL ]-->
        <link href="<?= base_url('assets/admin/') ?>/plugins/fooTable/css/footable.core.css" rel="stylesheet">
        <!--SCRIPT-->
        <!--=================================================-->
        <!--Page Load Progress Bar [ OPTIONAL ]-->
        <link href="<?= base_url('assets/admin/') ?>/plugins/pace/pace.min.css" rel="stylesheet">
        <script src="<?= base_url('assets/admin/') ?>/plugins/pace/pace.min.js"></script>
    </head>
    <!--TIPS-->
    <!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
    <body>
        <div id="container" class="effect mainnav-sm navbar-fixed mainnav-fixed">

        	<?php 

        		$ci    =& get_instance();
                $ci->load->model('admin/UsersModel','m_users');
                $user  = $ci->m_users->getuserbyid($this->session->userdata('bk_id_user'));



        	 ?>
            <!--NAVBAR-->
            <!--===================================================-->
            <header id="navbar">
                <div id="navbar-container" class="boxed">
                    <!--Navbar Dropdown-->
                    <!--================================-->
                    <div class="navbar-content clearfix">
                        <ul class="nav navbar-top-links pull-left">
                            <!--Navigation toogle button-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                           
                            <li class="tgl-menu-btn">
                                <a class="mainnav-toggle" href="#"> <i class="fa fa-navicon fa-lg"></i> </a>
                            </li>

                             <?php if ($this->session->userdata('bk_id_role') == 3): ?>
                          
                            <li >
                                <a href="<?= base_url('konselor/jadwal') ?>" > <i class="fa fa-calendar fa-lg"></i> </a>
                            </li>

                             <li >
                                <?php //konselor hitung jadwal akan konsultasi
                                $this->load->model('konselor/KonselorModel');
                                $temp=$this->KonselorModel->get_jadwal_pengajuan_konseling();
                                $konsul=count($temp);?>

                             <a href="<?= base_url('konselor/konseling') ?>" > <i class="fa fa-list fa-lg"></i> <?php if ($konsul > 0){?><span class="badge badge-header badge-danger"><?php echo $konsul;?></span> <?php } ?></a>
                            </li>
                               <?php endif ?>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End notifications dropdown-->
                        </ul>
                        <ul class="nav navbar-top-links pull-right">
                            <!--Profile toogle button-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <li class="hidden-xs" id="toggleFullscreen">
                                <a class="fa fa-expand" data-toggle="fullscreen" href="#" role="button">
                                <span class="sr-only">Toggle fullscreen</span>
                                </a>
                            </li>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End Profile toogle button-->
                            <!--User dropdown-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <li id="dropdown-user" class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                    <span class="pull-right"> 

                                    	 <?php if (isset($user->foto) || !is_dir('./assets/admin/uploads/profile_pic/'.$user->foto) ): ?>
                                    	 <img class="img-circle img-user media-object" src="<?= base_url('assets/admin/uploads/profile_pic/').$user->foto ?>" alt="Profile Picture"> 
                                        <?php else: ?>
                                            <img class="img-circle img-user media-object" src="<?= base_url('assets/admin/') ?>img/user.png" alt="Profile Picture"> 
                                        <?php endif ?>
                                    	

                                    </span>
                                    <div class="username hidden-xs"><?= $this->session->userdata('bk_nama') ?></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right with-arrow">
                                    <!-- User dropdown menu -->
                                    <ul class="head-list">
                                        <?php if ($this->session->userdata('bk_id_role') == 3): ?>

                                        <li>
                                            <a href="<?= base_url('konselor/profile') ?>"> <i class="fa fa-user fa-fw"></i> Profile </a>
                                        </li>
                                            
                                        <?php endif ?>
                                       
                                        <li>
                                            <a href="<?= base_url('logout/').$this->session->userdata('bk_id_user') ?>"> <i class="fa fa-sign-out fa-fw"></i> Logout </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End user dropdown-->
                        </ul>
                    </div>
                    <!--================================-->
                    <!--End Navbar Dropdown-->
                </div>
            </header>

