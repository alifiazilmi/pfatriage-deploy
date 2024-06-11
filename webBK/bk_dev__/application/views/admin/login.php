<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login Page | Bimbingan Konseling</title>
    <meta name="robots" content="noindex, nofollow" />
    <meta name="googlebot" content="noindex, nofollow" />
    <link rel="shortcut icon" href="img/favicon.ico">
    <link href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100,700" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto:500,400italic,100,700italic,300,700,500italic,400" rel="stylesheet">
    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="<?= base_url('assets/admin/')?>css/bootstrap.min.css" rel="stylesheet">
    <!--Jasmine Stylesheet [ REQUIRED ]-->
    <link href="<?= base_url('assets/admin/')?>css/style.css" rel="stylesheet">
    <!--Font Awesome [ OPTIONAL ]-->
    <link href="<?= base_url('assets/admin/')?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!--Switchery [ OPTIONAL ]-->
   
    <link href="<?= base_url('assets/admin/')?>plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
    <!--Demo [ DEMONSTRATION ]-->
    <link href="<?= base_url('assets/admin/')?>css/demo/jasmine.css" rel="stylesheet">
    <!--SCRIPT-->
    <!--=================================================-->
    <!--Page Load Progress Bar [ OPTIONAL ]-->
    <link href="<?= base_url('assets/admin/')?>plugins/pace/pace.min.css" rel="stylesheet">
    <script src="<?= base_url('assets/admin/')?>plugins/pace/pace.min.js"></script>
</head>
<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body>
    <div id="container">
          <?php $message = $this->session->flashdata("status"); ?>
                                      <?=isset($message)?'<div class="alert alert-mint media fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><div class="media-left"><span class="icon-wrap icon-wrap-xs alert-icon"><i class="fa fa-check fa-lg"></i></span> </div><div class="media-body"><h4 class="alert-title">Sukses !</h4><p class="alert-message">'.$message.'</p></div></div>':''; ?>
                                      <?php $pesan = $this->session->flashdata("warning"); ?>
                                      <?=isset($pesan)?'<div class="alert alert-danger media fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><div class="media-left"><span class="icon-wrap icon-wrap-xs alert-icon"><i class="fa fa-remove fa-lg"></i></span> </div><div class="media-body"><h4 class="alert-title">Gagal !</h4><p class="alert-message">'.$pesan.'</p></div></div>':''; ?>
        <div class="lock-wrapper">
            <div class="row">
                <div class="col-xs-12">

                    <div class="lock-box">
                        <div class="main">

                            <br>
                            <center>
                                 <img src="https://kemahasiswaan.itb.ac.id/bk/assets/front/images/logo-itb-1024px-400x400.png" title="" style="height: 3.8rem;">
                            </center>
                            <h4><b>Bimbingan Konseling</b></h4>
                            <h4><b>Direktorat Kemahasiswaan ITB</b></h4>
                            
                            <div class="login-or">
                                <hr class="hr-or">
                                <span class="span-or"></span>

                            </div>
                            <form role="form" action="<?= base_url('front/auth') ?>" method="POST">
                                <div class="form-group">
                                    <label for="inputUsernameEmail"><b>Username</b></label>
                                    <input type="text" class="form-control" name="usr" id="inputUsernameEmail">
                                     <input type="hidden" class="form-control" name="is_sop" id="inputUsernameEmail" value="<?= (isset($_GET['sop']) ? $_GET['sop'] : 0 )?>">
                                </div>
                                <div class="form-group">
                                 
                                    <label for="inputPassword"><b>Password</b></label>
                                    <input type="password" class="form-control" name="pwd" id="inputPassword">
                                </div>
                                <button type="submit" class="btn btn btn-primary btn-block">
                                    Log In
                                </button>
                            </form>
                            <br>
                            <br>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!--===================================================-->
        <!-- END OF CONTAINER -->
        <!--JAVASCRIPT-->
        <!--=================================================-->
        <!--jQuery [ REQUIRED ]-->

        <script src="<?= base_url('assets/admin/')?>js/jquery-2.1.1.min.js"></script>
        <!--BootstrapJS [ RECOMMENDED ]-->
        <script src="<?= base_url('assets/admin/')?>js/bootstrap.min.js"></script>
        <!--Fast Click [ OPTIONAL ]-->
        <script src="<?= base_url('assets/admin/')?>plugins/fast-click/fastclick.min.js"></script>

        <script src="<?= base_url('assets/admin/')?>plugins/bootstrap-select/bootstrap-select.min.js"></script>
</body>

</html>