
<style type="text/css">
    .container a {
        color: blue;
    }

    .container a:hover{
        color: grey;
    }

    .container iframe{
        width: 100%

    }
</style>

<section class="mbr-section info2 cid-s2IccM2DXR" id="info2-1t">

    

    

    <div class="container">
        <div class="row main justify-content-center">
            <div class="media-container-column col-12 col-lg-3 col-md-4">
                <div class="mbr-section-btn align-left py-4"><a class="btn btn-primary display-4" href="https://kemahasiswaan.itb.ac.id/bk"><span class="mbri-left mbr-iconfont mbr-iconfont-btn"></span>
                    
                    KEMBALI</a></div>
            </div>
            <div class="media-container-column title col-12 col-lg-7 col-md-6">
                <h3 class="mbr-bold pb-3 mbr-fonts-style display-4" style="margin-bottom: -10px; color: white">
                    <?php if ($pengumuman->id_kategori_cms == 1): ?>
                        <a href="#" class="badge badge-success" style="font-size: 1.1em; color: white">Pengumuman</a>
                    <?php else: ?>
                        <a href="#" class="badge badge-info" style="font-size: 1.1em; color: white">Berita</a>
                    <?php endif ?>
                     
                </h3>
                <h2 class="align-right mbr-bold mbr-white pb-3 mbr-fonts-style display-2"><?= $pengumuman->judul ?></h2>
                
            </div>
        </div>
    </div>
</section>


<section class="step1 cid-s2I8Tsqjda" id="step1-1q">

     
    
    
    <div class="container" style="text-align: justify!important;">
                <h4 class="mbr-bold mbr-black pb-3 mbr-fonts-style display-4">
                    <?php 
                            list($date, $time) = explode(' ', $pengumuman->tgl_kirim);
                            $tgl = tanggal_indo_lengkap($date, TRUE);
                     ?>

                     <?php echo $tgl;?> - <?php echo $pengumuman->nama_admin?>
                </h4>
                <center>
                <div class="mbr-figure" style="width: 100%;">
                    
                            <img src="https://kemahasiswaan.itb.ac.id/assets/cms/uploads/berita/<?= $pengumuman->img ?>" alt="" title="">
                </div>
              
                </center>
                <br>
                 
                
                    <?= $pengumuman->isi ?>

           
                    
    </div>
</section>

