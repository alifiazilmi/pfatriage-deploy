


<section class="mbr-section content5 cid-s2HW3rAJgr mbr-parallax-background" id="content5-1j" style="padding-top: 8% ">

    

    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(35, 35, 35);">
    </div>

    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-5">
                    STAF BIMBINGAN KONSELING</h2>
                
                
                
            </div>
        </div>
    </div>
</section>

<section class="services3 cid-s2HS0WZY6Z" id="services3-1i" style="padding-top: 0px">
    <!---->
    
    <!---->
    <!--Overlay-->
    
    <!--Container-->
    <div class="container">
        <div class="row">
            <!--Titles-->
            <div class="title pb-5 col-12">
                
                
            </div>
            
            <?php foreach ($staf as $staf_key): ?>

                                <div class="card px-3 col-12 col-md-6">
                                    <div class="card-wrapper media-container-row media-container-row">
                                        <div class="card-box" style="display:inline;">
                                            <div class="top-line pb-4">
                                                 <a href="<?= base_url('staf-detail/').$staf_key->id_user.'/'. str_replace("'", "", $staf_key->nama_lengkap)  ?>" class="text-black">
                                                <h4 class="card-title mbr-fonts-style display-5"><?= $staf_key->nama_lengkap.' '.$staf_key->gelar_belakang ?></h4>
                                                 </a>
                                            </div>
                                            <div class="bottom-line">
                                                <p class="mbr-text mbr-fonts-style display-7"><?= $staf_key->public_name ?><br></p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>

            <?php endforeach ?>

        </div>
    </div>
</section>

