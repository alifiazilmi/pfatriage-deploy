<style type="text/css">
    body {
        background-color: #282828;
    }
</style>


<section class="carousel slide cid-s2t4Uazc7s" data-interval="false" id="slider1-l" style="margin-top: 4%">

    

    <div class="full-screen">
        <div class="mbr-slider slide carousel" data-pause="true" data-keyboard="false" data-ride="carousel" data-interval="6000">
            <ol class="carousel-indicators">
                <?php $active1 = '';  ?>
                <?php $i = 0; foreach ($banner_pengumuman as $values1): ?>
             
                <li data-app-prevent-settings="" data-target="#slider1-l" class="<?= ($active1==''? 'active':'') ?>" data-slide-to="<?=$i; ?>"></li>

                <?php $active1 = 'end'; $i++; ?>


                <?php endforeach ?>

                <?php foreach ($berita as $values2): ?>

                         <li data-app-prevent-settings="" class="<?= ($active1==''? 'active':'') ?>" data-target="#slider1-l" data-slide-to="<?=$i; ?>"></li>
                       
                <?php $active1 = 'end'; $i++; ?>

                <?php endforeach ?>

                <?php foreach ($pengumuman as $values3): ?>
        
                         <li data-app-prevent-settings="" class="<?= ($active1==''? 'active':'') ?>" data-target="#slider1-l" data-slide-to="<?=$i; ?>"></li>

                <?php $active1 = 'end'; $i++; ?>

                
                <?php endforeach ?>
            </ol>
            <div class="carousel-inner" role="listbox">

                <?php $active = ''; foreach ($banner_pengumuman as $values): ?>

               
                    <div class="carousel-item slider-fullscreen-image <?= ($active==''? 'active':'') ?>" data-bg-video-slide="false" style="background-image: url(assets/front/upload/kegiatan/<?= $values->img ?>);">
                        <a href="<?= base_url('front/pengumuman_bk/').$values->id_banner ?>">
                        <div class="container container-slide">
                            <div class="image_wrapper">
                                <div class="mbr-overlay" style="opacity: 0.5;"></div>
                                    
                                    <div class="carousel-caption justify-content-center">
                                        <div class="col-10 align-center">
                                            <h2 class="mbr-fonts-style display-5">&nbsp;</h2>
                                            <?php if ($values->id_jenis_konten == 0): ?>
                                                <span class="badge badge-info" style="font-size: 1.1em; color: white; box-shadow: 0px;">Berita</span>
                                            <?php else: ?>
                                                <span  class="badge badge-success" style="font-size: 1.1em; color: white">Pengumuman</span> 
                                            <?php endif ?>
                                             <p class="lead mbr-text mbr-fonts-style display-6"><?= $values->judul ?></p>
                                        </div>
                                    </div>
                                </div>
                        </div>
                           </a>
                    </div>
             
                <?php $active = 'end'; ?>
                
                
                <?php endforeach ?>


                  <?php foreach ($berita as $berita_values): ?>
                    <div class="carousel-item slider-fullscreen-image <?= ($active==''? 'active':'') ?>" data-bg-video-slide="false" style="background-image: url('https://kemahasiswaan.itb.ac.id/assets/cms/uploads/berita/<?= $berita_values->img ?>');">
                     <a href="<?= base_url('front/berita/').$berita_values->id_cms ?>">
                    <div class="container container-slide">
                        <div class="image_wrapper">
                            <div class="mbr-overlay" style="opacity: 0.5;"></div>
                                
                                <div class="carousel-caption justify-content-center">
                                    <div class="col-10 align-center">
                                        
                                        <h2 class="mbr-fonts-style display-5">&nbsp;</h2>
                                        <span class="badge badge-info" style="font-size: 1.1em; color: white; box-shadow: 0px;">Berita</span>
                                         <p class="lead mbr-text mbr-fonts-style display-6"><?= $berita_values->judul ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                         </a>
                    </div>

                      <?php $active = 'end'; ?>
                <?php endforeach ?>
                

                  <?php foreach ($pengumuman as $pengumuman_values): ?>
                    <div class="carousel-item slider-fullscreen-image <?= ($active==''? 'active':'') ?>" data-bg-video-slide="false" style="background-image: url('https://kemahasiswaan.itb.ac.id/assets/cms/uploads/berita/<?= $pengumuman_values->img ?>');">
                     <a href="<?= base_url('front/pengumuman/').$pengumuman_values->id_cms ?>">
                    <div class="container container-slide">
                        <div class="image_wrapper">
                            <div class="mbr-overlay" style="opacity: 0.5;"></div>
                                
                                <div class="carousel-caption justify-content-center">
                                    <div class="col-10 align-center">                                       
                                        <h2 class="mbr-fonts-style display-5">&nbsp;</h2>
                                        <span  class="badge badge-success" style="font-size: 1.1em; color: white">Pengumuman</span> 
                                         <p class="lead mbr-text mbr-fonts-style display-6"><?= $pengumuman_values->judul ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                         </a>
                    </div>

                      <?php $active = 'end'; ?>
            
                <?php endforeach ?>


                
         
       
            </div>
    <a data-app-prevent-settings="" class="carousel-control carousel-control-prev" role="button" data-slide="prev" href="#slider1-l">
        <span aria-hidden="true" class="mbri-left mbr-iconfont"></span>
        <span class="sr-only">Previous</span></a>
        <a data-app-prevent-settings="" class="carousel-control carousel-control-next" role="button" data-slide="next" href="#slider1-l">
            <span aria-hidden="true" class="mbri-right mbr-iconfont"></span>
            <span class="sr-only">Next</span></a></div>
        </div>

</section>




<section class="mbr-section content4 cid-s2l5zBgSIW" id="content4-a">
    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
               <!--  <h2 class="align-center pb-3 mbr-fonts-style display-5">
                    What We Do</h2> -->
                <h3 class="mbr-section-subtitle align-left mbr-light mbr-fonts-style display-5" style="text-align: justify;">
                    <?= $wedo->wedo ?>
                </h3>
                <br>
                
            </div>
        </div>
    </div>
</section>

<!-- <section class="mbr-section article content11 cid-s2l5xxkbGW" id="content11-9">
     

    <div class="container">
        <div class="media-container-row">
            <div class="mbr-text counter-container col-12 col-md-8 mbr-fonts-style display-7">
                <ol>
                    <li><strong>MOBILE FRIENDLY</strong> - no special actions required, all sites you make with Mobirise are mobile-friendly. You don't have to create a special mobile version of your site, it will adapt automagically. <a href="https://mobirise.co/" class="text-black">Try it now!</a></li>
                    <li><strong>EASY AND SIMPLE</strong> - cut down the development time with drag-and-drop website builder. Drop the blocks into the page, edit content inline and publish - no technical skills required. <a href="https://mobirise.co/">Try it now!</a></li>
                    <li><strong>UNIQUE STYLES</strong> - choose from the large selection of latest pre-made blocks - full-screen intro, bootstrap carousel, content slider, responsive image gallery with lightbox, parallax scrolling, video backgrounds, hamburger menu, sticky header and more. <a href="https://mobirise.co/">Try it now!</a></li>
                </ol>
            </div>
        </div>
    </div>
</section> -->


<!-- <section class="features13 cid-s2tg3C7qZT" id="features13-s"  >
    
    <div class="container">
        <h2 class="mbr-section-title pb-3 mbr-fonts-style align-center display-5" style="color: black">
            PENGUMUMAN</h2>

        <div class="media-container-row">

            <table class="table" >
                <?php foreach ($banner_pengumuman as $values): ?>
                <tr>
                    <td ><a style="color: black" href="<?= base_url('front/pengumuman_bk/').$values->id_banner ?>"><i class="fa fa-newspaper"></i><?= $values->judul ?></a></td>
                </tr>
                 <?php endforeach ?>

                  <?php foreach ($pengumuman as $peng_val): ?>
                <tr>
                    <td><a style="color: black" href="<?= base_url('front/pengumuman').'/'.$peng_val->id_cms ?>"><?= $peng_val->judul ?></a></td>
                </tr>
                 <?php endforeach ?>

            </table> -->


          <!--   <?php foreach ($banner as $values): ?>

                  <div class="card col-12 col-md-6 align-center col-lg-4">
                <a href="<?= base_url('front/pengumuman_bk/').$values->id_banner ?>">
                <div class="card-wrap">
                    <div class="card-img">
                        <img src="<?= base_url('assets/front/upload/kegiatan/'.$values->img )?>" alt="<?= $values->judul ?>" title="">
                    </div>
                    <div class="card-box p-5">
                        <?php if ($values->id_jenis_konten == 0): ?>
                                                <span class="badge badge-info" style="font-size: 1.1em; color: white; box-shadow: 0px;">Berita</span>
                                            <?php else: ?>
                                                <span  class="badge badge-success" style="font-size: 1.1em; color: white">Pengumuman</span> 
                                            <?php endif ?>
                        <h4 class="card-title py-2 mbr-fonts-style align-center mbr-white display-5"><?= substr(strip_tags($values->judul), 0,50) ?></h4>
                    </div>
                </div>
                
            </div>

                
            <?php endforeach ?>
            
            <?php foreach ($pengumuman as $peng_val): ?>

                  <div class="card col-12 col-md-6 align-center col-lg-4">
                <a href="<?= base_url('front/pengumuman').'/'.$peng_val->id_cms ?>">
                <div class="card-wrap">
                    <div class="card-img">
                        <img src="https://kemahasiswaan.itb.ac.id/assets/cms/uploads/berita/<?= $peng_val->img ?>" alt="<?= $peng_val->judul ?>" title="">
                    </div>
                    <div class="card-box p-5">
                        <span class="badge badge-success" style="font-size: 1.1em; color: white; box-shadow: 0px;">Pengumuman</span>
                        <h4 class="card-title py-2 mbr-fonts-style align-center mbr-white display-5"><?= substr(strip_tags($peng_val->judul), 0,70) ?></h4>
                    </div>
                </div>
                
            </div>

                
            <?php endforeach ?> -->


            
 <!--         
        </div>
    </div>
</section>

 -->

<!-- <section class="features13 cid-s2tg3C7qZT" id="features13-s" style="background-color: white">

    

    
    <div class="container">
        <h2 class="mbr-section-title pb-3 mbr-fonts-style align-center display-5" style="color: black">
            BERITA</h2>


        <div class="media-container-row">


              <?php foreach ($berita as $ber_val): ?>

                  <div class="card col-12 col-md-6 align-center col-lg-4">
                <a href="<?= base_url('front/berita').'/'.$ber_val->id_cms ?>">
                <div class="card-wrap">
                    <div class="card-img">
                        <img src="https://kemahasiswaan.itb.ac.id/assets/cms/uploads/berita/<?= $ber_val->img ?>" alt="<?= $ber_val->judul ?>" title="">
                    </div>
                    <div class="card-box p-5">
                        <h4 class="card-title py-2 mbr-fonts-style align-center mbr-white display-5"><?= substr(strip_tags($ber_val->judul), 0,50) ?></h4>
                    </div>
                </div>
                
            </div>

                
            <?php endforeach ?>

              
            
          

         
        </div>
    </div>
</section>
 -->


<section class="features13 cid-s2tg3C7qZT" id="features13-s" >

    

    
    <div class="container">
  
        <h2 class="mbr-section-title pb-3 mbr-fonts-style align-center display-5" style="color: black">
            ARTIKEL</h2>
   

        <div class="media-container-row">
            <div class="row">
                
            
            <?php foreach ($artikel as $keyAr): ?>

                  <div class="card col-12 col-md-6 align-center col-lg-4">
                <a href="<?= base_url('front/artikel').'/'.$keyAr->id_artikel ?>">
                <div class="card-wrap">
                    <div class="card-img">
                        <img src="<?= base_url('assets/front/images').'/'.$keyAr->background ?>" alt="<?= $keyAr->judul ?>" title="" style="min-height: 400px;">
                    </div>
                    <div class="card-box p-5">
                        <h4 class="card-title py-2 mbr-fonts-style align-center mbr-white display-5"><?= $keyAr->judul ?></h4>
                        <p class="mbr-text mbr-fonts-style mbr-white display-7"><?= substr(strip_tags($keyAr->artikel), 0,20) ?> ... </p>
                    </div>
                </div>
                
            </div>

                
            <?php endforeach ?>
            
            </div>
          

         
        </div>
    </div>
</section>

<!-- <section class="toggle1 cid-s2sY9sjEnb" id="toggle1-h">

    

    
        <div class="container">
            <div class="media-container-row">
                <div class="col-12 col-md-12">
                    <div class="section-head text-center space30">
                          <h2 class="mbr-section-title pb-3 mbr-fonts-style align-center display-5" style="color: black">
            FAQ</h2>
                    </div>
                    <div class="clearfix"></div>
                    <div id="bootstrap-toggle" class="toggle-panel accordionStyles tab-content">
                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne">
                                <a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-core="" href="#collapse1_5" aria-expanded="false" aria-controls="collapse1">
                                    <h4 class="mbr-fonts-style display-7">
                                        <span class="sign mbr-iconfont mbri-arrow-down inactive"></span>Pertanyaan 1 ?</h4>
                                </a>
                            </div>
                            <div id="collapse1_5" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body p-4">
                                    <p class="mbr-fonts-style panel-text display-4">
                                       Jawaban 1</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" id="headingTwo">
                                <a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-core="" href="#collapse2_5" aria-expanded="false" aria-controls="collapse2">
                                    <h4 class="mbr-fonts-style display-7">
                                        <span class="sign mbr-iconfont mbri-arrow-down inactive"></span>Pertanyaan 2 ?</h4>
                                </a>

                            </div>
                            <div id="collapse2_5" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body p-4">
                                    <p class="mbr-fonts-style panel-text display-4">
                                       Jawaban 2</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" id="headingThree">
                                <a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-core="" href="#collapse3_5" aria-expanded="false" aria-controls="collapse3">
                                    <h4 class="mbr-fonts-style display-7">
                                        <span class="sign mbr-iconfont mbri-arrow-down inactive"></span>Pertanyaan 3 ?</h4>
                                </a>
                            </div>
                            <div id="collapse3_5" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body p-4">
                                    <p class="mbr-fonts-style panel-text display-4">Jawaban 3</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" id="headingThree">
                                <a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-core="" href="#collapse4_5" aria-expanded="false" aria-controls="collapse4">
                                    <h4 class="mbr-fonts-style display-7">
                                        <span class="sign mbr-iconfont mbri-arrow-down inactive"></span>Pertanyaan 4 ?</h4>
                                </a>
                            </div>
                            <div id="collapse4_5" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body p-4">
                                    <p class="mbr-fonts-style panel-text display-4">
                                       Jawaban 4</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" id="headingThree">
                                <a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-core="" href="#collapse5_5" aria-expanded="false" aria-controls="collapse5">
                                    <h4 class="mbr-fonts-style display-7">
                                        <span class="sign mbr-iconfont mbri-arrow-down inactive"></span>Pertanyaan 5 ?</h4>
                                </a>
                            </div>
                            <div id="collapse5_5" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body p-4">
                                    <p class="mbr-fonts-style panel-text display-4">
                                       Jawaban 5</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
</section> -->

<section class="carousel slide testimonials-slider cid-s2td0LhCZH" data-interval="false" id="testimonials-slider1-q" style="background-color:white">
    
    

    

    <div class="container text-center">
        <h2 class="pb-5 mbr-fonts-style display-2" style="color: black">
            MEET OUR THERAPIST</h2>

        <div class="carousel slide" role="listbox" data-pause="true" data-keyboard="false" data-ride="carousel" data-interval="5000">
            <div class="carousel-inner">
                
                <?php foreach ($staf as $key ): ?>
                    
                         <div class="carousel-item">
                           
                            <div class="user col-md-8">
                                 <a href="<?= base_url('staf-detail/').$key->id_user.'/'.$key->nama_lengkap ?>">
                                <div class="user_image">
                                     <?php if (file_exists('./assets/admin/profile_pic/').$key->foto && !is_dir('./assets/admin/profile_pic/')){ ?>    
                                        <img src="<?= base_url('assets/admin/uploads/profile_pic/').$key->foto ?>" alt="" title="">
                                    <?php }else{ ?>
                                        <img src="<?= base_url('assets/admin/uploads/profile_pic/default_pic.png')?>" alt="" title="">
                                    <?php } ?>
                                </div>
                                 </a>
                                <div class="user_text pb-3">
                                    <p class="mbr-fonts-style display-7">
                                        <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae nostrum, quos voluptas fugiat blanditiis, temporibus expedita cumque doloribus ea, officiis consequuntur repellat minus ad veritatis? Facere similique accusamus, accusantium sunt! -->
                                    </p>
                                </div>
                                <a href="<?= base_url('staf-detail/').$key->id_user.'/'.$key->nama_lengkap ?>">
                                <div class="user_name mbr-bold pb-2 mbr-fonts-style display-7"><div><span style="font-size: 1rem;color: black"><?= $key->nama_lengkap.' '.$key->gelar_belakang ?></span></div></div>
                                <div class="user_desk mbr-light mbr-fonts-style display-7" style="color: black"><?= $key->public_name ?></div>
                                </a>
                            </div>
                             
                        </div>
                  
                    
                <?php endforeach ?>

            </div>

            <div class="carousel-controls">
                <a class="carousel-control-prev" role="button" data-slide="prev">
                  <span aria-hidden="true" class="mbri-arrow-prev mbr-iconfont"></span>
                  <span class="sr-only">Previous</span>
                </a>
                
                <a class="carousel-control-next" role="button" data-slide="next">
                  <span aria-hidden="true" class="mbri-arrow-next mbr-iconfont"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="mbr-section contacts1 cid-s2l4vHr3N0" id="contacts1-7">
    <!---->
    
    <!---->
    <!--Overlay-->
    
    <!--Container-->
    <div class="container">
        <div class="row">
            <!--Titles-->
            <div class="title col-12">
                <h2 class="align-left mbr-fonts-style display-5">CONTACT US</h2>
                
            </div>
            <!--Left-->
            <div class="col-12 col-md-6">
                <div class="left-block wrapper">
                    <div class="b b-adress">
                        <h5 class="align-left mbr-fonts-style m-0 display-5">
                            Address:
                        </h5>
                        <p class="mbr-text align-left mbr-fonts-style display-7">Gedung CC Timur, Lantai 2
                        <br>Jalan Ganesa No 10
                        <br>Bandung, Jawabarat. Indonesia.</p>
                    </div>
                    <div class="b b-phone">
                        <h5 class="align-left mbr-fonts-style m-0 display-5">
                            Phone:
                        </h5>
                        <p class="mbr-text align-left mbr-fonts-style display-7">Telp         : (022) 2534275
                        <br>Telp/Fax : (022) 2504814</p>
                    </div>
                    <div class="b b-mail">
                        <h5 class="align-left mbr-fonts-style m-0 display-5">
                            E-mail:
                        </h5>
                        <p class="mbr-text align-left mbr-fonts-style display-7">
                            bk@kemahasiswaan.itb.ac.id
                        </p>
                    </div>
                     <div class="b b-mail">
                        <h5 class="align-left mbr-fonts-style m-0 display-5">
                            Social Media:
                        </h5>
                        <p class="mbr-text align-left mbr-fonts-style display-7">
                             <div class="mbr-social-likes " style="text-align: left;">

                                   <a href="https://www.instagram.com/itbwellbeingcenter/" target="_blank">
                                    <span style="width: 35px; height: 35px" class="btn btn-social instagram socicon-bg-instagram mx-1" title="Share link on Instagram">
                                       <i class="socicon socicon-instagram"></i>
                                    </span>
                                </a> 

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

                                 <a href="https://www.tiktok.com/@kemahasiswaanitb" target="_blank">
                                    <span style="width: 35px; height: 35px" class="btn btn-social googleplus socicon-bg-googleplus mx-1" title="Tiktok ">
                                        <i class="socicon socicon-tiktok"></i>
                                    </span>
                                </a> 


                            </div>
                        </p>
                    </div>
                </div>
            </div>
            <!--Right-->
            <div class="col-12 col-md-6">
                 <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=itb%20campus%20center%20timur&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-org.net">123movies</a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div></div>
            </div>
        </div>
    </div>
</section>

