<?php 
    

    $ci =&get_instance();
    $ci2 =&get_instance();
    $ci->load->model('admin/UsersModel','m_users');
    $telp_darurat = $ci->m_users->getnodarurat();


 ?>

<!DOCTYPE html>
<html  >
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Bimbingan Konseling, BK, Direktorat Kemahaswaan ITB, kemahasiswaan.itb.ac.id,Institut Tekonolgi Bandung, itb.ac.id">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logo-itb-1024px-400x400.png" type="image/x-icon">
  <meta name="description" content="Bimbingan Konseling Direktorat Kemahaswaan ITB">
  <meta name="robots" content="index, follow" />
  <meta name="googlebot" content="index, follow" />
  <title>Bimbingan Konseling | Direktorat Kemahasiswaan ITB | ITB</title>
  <link rel="stylesheet" href="<?= base_url('assets/front') ?>/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="<?= base_url('assets/front') ?>/tether/tether.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/front') ?>/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/front') ?>/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/front') ?>/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/front') ?>/dropdown/css/style.css">
  <link rel="stylesheet" href="<?= base_url('assets/front') ?>/socicon/css/styles.css">
  <link rel="stylesheet" href="<?= base_url('assets/front') ?>/theme/css/style.css">
  <link rel="stylesheet" href="<?= base_url('assets/front') ?>/mobirise/css/mbr-additional2.css" type="text/css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  
    <style type="text/css">
        
         @media screen and (max-width: 1199px) {
          .cid-s2qp71jrFG {
             margin-top: 5%!important;
          }
        }

          @media screen and (max-width: 1024px) {
          .cid-s2qp71jrFG {
             margin-top: 6%!important;
          }
        }

          @media screen and (max-width: 768px) {
          .cid-s2qp71jrFG {
             margin-top: 10%!important;
          }

          .cid-s2HW3rAJgr{
              padding-top: 11%!important;
          }
        
        }

          @media screen and (max-width: 414px) {
          .cid-s2qp71jrFG {
             margin-top: 60%!important;
          }

          .cid-s2HW3rAJgr{
              padding-top: 19%!important;
          }
        
        }


         @media screen and (max-width: 375px) {
          .cid-s2qp71jrFG {
             margin-top: 52%!important;
          }

          .cid-s2HW3rAJgr{
              padding-top: 19%!important;
          }
        
        }


    </style> 

    <style type="text/css">
    body {
        background-color: #282828;
    }

</style>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-215539787-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-215539787-1');
</script>

  
</head>
<body>

  <section class="cid-s2tALSRAk6" id="social-buttons3-v"  style="position: fixed; top: 0; padding-bottom: 0!important; padding-top: 0px; overflow: hidden;z-index: 99; left: 0; right: 0">

    <div class="container-fluid" style="margin-top: 5px; margin-left: 0px; ">
        <div class="media-container-row">
            <div class="col-md-2" style="margin-top: 5px; padding:0px; margin: 0px">
                <center>
                <h4 style="color: #FFFFFF; margin-top:13px">NOMOR DARURAT</h4>
                </center>
                
            </div>
        
            <?php echo date('D'); ?>

            <?php $i = 1; foreach ($telp_darurat as $value): ?>

            <?php if ( (date('H:i:s') > '15:45:00' && date('H:i:s') < '07:45:00') || date('D') == 'Sat' || date('D') == 'Sun' ){ ?>
                
                <?php if ($i == 3): ?>
                      <div class="col-md-2" style="margin-top: 2px; padding:0px; margin: 0px">
                      <div class="navbar-buttons mbr-section-btn">
                        <a class="btn btn-sm btn-primary display-3" href="tel:<?= $value->no_darurat ?>">
                                    <span class="btn-icon mbri-mobile mbr-iconfont mbr-iconfont-btn">
                                    </span>
                                    <?= $value->no_darurat ?>
                                </a>
                          </div>
                      </div>

                        <div class="col-md-2" style="margin-top: 2px; padding:0px; margin: 0px">
                      <div class="navbar-buttons mbr-section-btn">
                      
                        </div>
                      </div> 


                <?php endif ?>

            <?php }else{ ?>

                    <?php if ($i != 3): ?>

                      <div class="col-md-2" style="margin-top: 2px; padding:0px; margin: 0px">
                      <div class="navbar-buttons mbr-section-btn">
                        <a class="btn btn-sm btn-primary display-3" href="tel:<?= $value->no_darurat ?>">
                                    <span class="btn-icon mbri-mobile mbr-iconfont mbr-iconfont-btn">
                                    </span>
                                    <?= $value->no_darurat ?>
                                </a>
                          </div>
                      </div>

        

                <?php endif ?>

            <?php } ?>
                
            <?php $i++; endforeach ?>
                
            <!--  <div class="col-md-2" style="margin-top: 5px; padding:0px; margin: 0px">
                 <div class="navbar-buttons mbr-section-btn">
                    <a class="btn btn-sm btn-primary display-3" href="tel:+62-821-1511-1262">
                                <span class="btn-icon mbri-mobile mbr-iconfont mbr-iconfont-btn">
                                </span>
                                +62-812-2404-2081
                            </a>
                </div>
            </div>
              <div class="col-md-2" style="margin-top: 5px; padding:0px; margin: 0px">
                 <div class="navbar-buttons mbr-section-btn">
                    <a class="btn btn-sm btn-primary display-3" href="tel:+62-813-2121-0645">
                                <span class="btn-icon mbri-mobile mbr-iconfont mbr-iconfont-btn">
                                </span>
                                +62-813-2121-0645
                            </a>
                </div>
            </div> -->
            <div class="col-md-4">
                <div>
                     
                    <div class="mbr-social-likes " style="text-align: center;">

                        <a href="https://wa.me/628112111446" target="_blank">
                            <span style="width: 35px; height: 35px" class="btn btn-social line socicon-bg-line mx-1" title="Share link on line">
                                <i class="socicon socicon-whatsapp" ></i>
                            </span>
                        </a>
                        <a href="https://line.me/R/ti/p/%40ditmawa_itb" target="_blank">
                            <span style="width: 35px; height: 35px" class="btn btn-social line socicon-bg-line mx-1" title="Share link on line">
                                <i class="socicon socicon-line"></i>
                            </span>
                        </a> 
                         <a href="https://www.instagram.com/ditmawa.itb/" target="_blank">
                            <span style="width: 35px; height: 35px" class="btn btn-social instagram socicon-bg-instagram mx-1" title="Share link on Instagram">
                               <i class="socicon socicon-instagram"></i>
                            </span>
                        </a> 
                        <a href="https://www.facebook.com/ditmawaITB" target="_blank">
                            <span style="width: 35px; height: 35px" class="btn btn-social socicon-bg-facebook facebook mx-1" title="Share link on Facebook">
                                <i class="socicon socicon-facebook"></i>
                            </span>
                        </a> 
                        <a href="https://twitter.com/ditmawa_itb" target="_blank">
                            <span style="width: 35px; height: 35px" class="btn btn-social twitter socicon-bg-twitter mx-1" title="Share link on Twitter">
                                <i class="socicon socicon-twitter"></i>
                            </span>
                        </a> 
                       
                          <a href="https://www.instagram.com/ditmawa.itb/" target="_blank">
                            <span style="width: 35px; height: 35px" class="btn btn-social googleplus socicon-bg-googleplus mx-1" title="Instagram ">
                                <i class="socicon socicon-youtube"></i>
                            </span>
                        </a> 


                    </div>
                </div>
            </div>

        </div>
    </div>
</section>



<section class="menu cid-s2qp71jrFG" once="menu" id="menu2-g" style=" z-index: 80; margin-top: 5%;">

    

    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-toggleable-sm" style="background-color: #282828;">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span style="background-color: white"></span>
                <span style="background-color: white"></span>
                <span style="background-color: white"></span>
                <span style="background-color: white"></span>
            </div>
        </button>
           <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="#">
                        <img src="<?= base_url('assets/front/images/logo-itb-1024px-400x400.png') ?>" alt="Mobirise" title="" style="height: 3.8rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-4" href="https://kemahasiswaan.itb.ac.id/bk">
                        Bimbingan Konseling<br>Direktorat Kemahasiswaan</a></span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent2">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">

                 <li class="nav-item">
                     <a class="nav-link link display-4" href="<?= base_url('darurat') ?>" aria-expanded="true">
                        LAYANAN DARURAT
                    </a>
                </li>

                 <li class="nav-item">
                     <a class="nav-link link display-4" href="<?= base_url('peer') ?>" aria-expanded="true">
                        PEER COUNSELOR
                    </a>
                </li>

                 <li class="nav-item">
                     <a class="nav-link link display-4" href="<?= base_url('ruang') ?>" aria-expanded="true">
                        RUANG KONSELING
                    </a>
                </li>

                   <li class="nav-item">
                     <a class="nav-link link display-4" href="<?= base_url('sop') ?>" aria-expanded="true">
                        SOP
                    </a>
                </li>
                
                <li class="nav-item">
                     <a class="nav-link link display-4" href="<?= base_url('staf') ?>" aria-expanded="true">
                        STAF
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link display-4" href="https://kemahasiswaan.itb.ac.id/admin/login/process_sso" target="_black" aria-expanded="true">
                        PENJADWALAN
                    </a>
                </li>

                <li class="nav-item">
                    <a style="color:red; animation:blinker 1s linear infinite;" class="nav-link link display-4" href="https://kemahasiswaan.itb.ac.id/bk/login/process_sso" target="_black" aria-expanded="true">
                       <i class="fas fa-whistle"></i> &nbsp; PENGADUAN
                    </a>
                </li>

            </ul>
         
        </div>
    </nav>
</section>
