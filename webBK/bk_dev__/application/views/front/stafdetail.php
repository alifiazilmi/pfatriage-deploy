



<section class="mbr-section info2 cid-s2IccM2DXR" id="info2-1t">

    

    

    <div class="container">
        <div class="row main justify-content-center">
            <div class="media-container-column col-12 col-lg-3 col-md-4">
                <div class="mbr-section-btn align-left py-4"><a class="btn btn-primary display-4" href="<?= base_url('staf') ?>"><span class="mbri-left mbr-iconfont mbr-iconfont-btn"></span>
                    
                    KEMBALI</a></div>
            </div>
            <div class="media-container-column title col-12 col-lg-7 col-md-6">
                <h2 class="align-right mbr-bold mbr-white pb-3 mbr-fonts-style display-2">PROFIL STAF</h2>
                
            </div>
        </div>
    </div>
</section>

<section class="services2 cid-s2IaIzX0zO" id="services2-1r">
    <!---->
    
    <!---->
    <!--Overlay-->
    
    <!--Container-->
    <div class="container">
        <div class="col-md-12">
            <div class="media-container-row">
                <div class="mbr-figure" style="width: 20%;">
                        <?php if (file_exists('./assets/admin/profile_pic/').$staf->foto && !is_dir('./assets/admin/profile_pic/')): ?>    
                            <img src="<?= base_url('assets/admin/uploads/profile_pic/').$staf->foto ?>" alt="" title="">
                        <?php else: ?>
                            <img src="<?= base_url('assets/admin/uploads/profile_pic/default_pic.png')?>" alt="" title="">
                        <?php endif ?>
                </div>
                <div class="align-left aside-content">
                   
                    <h2 class="mbr-title pt-2 mbr-fonts-style display-2">
                        <?= $staf->nama_lengkap.' '.$staf->gelar_belakang ?>
                    </h2>
                   
                    <div class="mbr-section-text">
                        <p class="mbr-text text1 pt-2 mbr-light mbr-fonts-style display-7">
                        - <?= $staf->public_name ?>
                        </p>
                    </div>

                    <div class="mbr-section-text">
                        <p class="mbr-text text1 pt-2 mbr-light mbr-fonts-style display-7">
                            <b>Spesialisasi : </b>
                            <?php $arr_spesialis = json_decode($staf->spesialis); ?>
                            <?php if (isset($arr_spesialis)): ?>
                                 <ul>
                                     <?php foreach ($arr_spesialis as $spesialis_key){ ?>
                                        <li><?= $spesialis_key ?></li>
                                    <?php } ?>
                                </ul>
                            <?php else: ?>
                            -                        
                            <?php endif ?>
                           
                        </p>
                    </div>


                    <!--Btn-->
                    
                </div>
            </div>
        </div>
    </div>
</section>

<section class="step1 cid-s2I8Tsqjda" id="step1-1q">

    

    
    
    <div class="container">
        <h2 class="mbr-section-title pb-3 mbr-fonts-style align-center display-5">
            PENDIDIKAN</h2>


            <?php $i=0; foreach ($pendidikan as $value): $i++; ?>


                <div class="step-container">
                    <div class="card separline pb-4">
                        <div class="step-element d-flex">
                            <div class="step-wrapper pr-3">
                                <h3 class="step d-flex align-items-center justify-content-center">
                                    <?= $i; ?>
                                </h3>
                            </div>          
                            <div class="step-text-content">
                                <h4 class="mbr-step-title pb-3 mbr-fonts-style display-5"><?= $value->tingkat ?>
                                </h4>
                                <p class="mbr-step-text mbr-fonts-style display-7">
                                    <?= $value->deskripsi_pendidikan ?>                           
                                    
                                </p>
                            </div>
                        </div>
                    </div>
                
            <?php endforeach ?>


            
        </div>
    </div>
</section>

<section class="services5 cid-s2IbGNTtC4" id="services5-1s" style="padding-top: 0px">
    <!---->
    
    <!---->
    <!--Overlay-->
    
    <!--Container-->
    <div class="container">
        <div class="row">
            <!--Titles-->
            <div class="title pb-5 col-12">
                <h2 class="align-center mbr-fonts-style m-0 display-5">Pegalaman &amp; Penelitan</h2>
                
            </div>


            <?php foreach ($pengalaman as $value_peng): ?>
            <!--Card-1-->
            <div class="card px-3 col-12">
                <div class="card-wrapper media-container-row media-container-row">
                    <div class="card-box">
                        <div class="top-line pb-3">
                            <h4 class="card-title mbr-fonts-style display-5">
                                <?= $value_peng->pengalaman ?> 
                            </h4>
                        </div>
                        <div class="bottom-line">
                            <p class="mbr-text mbr-fonts-style m-0 b-descr display-7">
                                 <?= $value_peng->deskripsi_pengalaman ?> ( <?= substr($value_peng->tgl_mulai, 0,4).' - '.substr($value_peng->tgl_akhir, 0,4); ?> )               
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <?php endforeach ?>
      
         
            
        </div>
    </div>
</section>

