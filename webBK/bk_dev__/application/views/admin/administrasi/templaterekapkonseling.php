<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		th,td {
			padding: 5px;
		}
		.tx-right {
			text-align: right;
			width: 20px
			font-size:12em;
		}
		h2,h5{
			margin-bottom: 5px;
		}
	</style>
</head>
<body>
<center><h2>Rekapitulasi Konselor Berdasarkan Jumlah Konseling dan Jam Penanganan</h2></center>
<h5>Periode : <?= $start_date.' - '.$end_date ?></h5>
<hr>
	<table border="1" width="100%" cellspacing="0">
		<tr>
			<th>No</th>
			<th style="width: 40%">Konselor</th>
			<th>Jumlah Konseling</th>
			<th>Jumlah Jam Konseling</th>
		</tr>
		<?php $no=0; foreach ($rekap as $key): $no++; ?>
			  <tr>
                  <td style="width: 10px; text-align:  center;"><?= $no; ?></td>
                  <td style="width: 30px"><?= $key->full_name ?></td>
                  <td class="tx-right"><?= $key->jumlah_menangani ?></td>
                  <td class="tx-right"><?= $key->jumlah_menit_menengani ?></td>
              </tr>
		<?php endforeach ?>
	</table>

<hr />

<center><h2>Rekapitulasi Pelayanan Konseling</h2></center>
<h5>Periode : <?= $start_date.' - '.$end_date ?></h5>
<hr>
	<table border="1" width="100%" cellspacing="0">
		<tr>
			 <th style="width: 5px; text-align:  center;">No</th>
             <th style="width: 30%">Tanggal</th>
             <th style="width: 15%">Nama</th>
             <th style="width: 10%">NIM</th>
             <th style="width: 10%">Fakultas/Sekolah</th>
             <th style="width: 10%">Jenis Masalah</th>
             <th style="width: 10%">Psikolog</th>
		</tr>
		 
         <?php $i=0; foreach ($rekap_detail as $key2): $i++; ?>
                                                                

            <tr>
                <td style="width: 5px; text-align:  center;"><?= $i; ?></td>
                <td><?= tanggal_indo_lengkap($key2->waktu_konseling, TRUE)?></td>
                <td><?= $key2->display_name ?></td>
                <td><?= ($key2->nim != '' ?$key2->nim :$key2->nim_tpb ) ?></td>
                <td><?= $key2->prodi_jenjang.'/'.$key2->nama_prodi.'/'.$key2->nama_fakultas ?></td>
                <td>
                <?php $arr_masalah = json_decode($key2->id_kategori_masalah); ?>
                                                             
                  <?php foreach ($masalah as $masalah_key){ ?>
                      <?php if (!empty($arr_masalah)){ ?>

                            <?php if (in_array($masalah_key->id_kategori_masalah, $arr_masalah)): ?>
                              <b><?=$masalah_key->kategori_masalah?>,</b>
                                                                                      
                            <?php endif ?>
                                                                                
                      <?php } ?>
                                                                              
                  <?php } ?>
            </td>
            <td><?= $key2->nama_lengkap ?></td>
        </tr>

    <?php endforeach ?>
                                                           
	</table>
<hr />

<center><h2>Rincian Pelayanan Konseling BK Per Fakultas</h2></center>
<h5>Periode : <?= $start_date.' - '.$end_date ?></h5>
<hr>
	<table border="1" width="100%" cellspacing="0">
		<tr>
			<th style="width: 5px; text-align:  center;">No</th>
            <th style="width: 30%">Fakultas/Sekolah</th>
            <th style="width: 15%">Volume</th>
            <th style="width: 10%">Satuan</th>
		</tr>
        <?php $i=0; foreach ($rekap_fakultas as $key3): $i++; ?>
                                                                
            <tr>
                <td><?= $i; ?></td>
                <td><?= $key3->nama_fakultas ?></td>
                <td class="tx-right"><?= $key3->jumlah ?></td>
                <td style="text-align:  center;">Pelayanan</td>
            </tr>

        <?php endforeach ?>
	</table>

<hr />

<center><h2>Beban Kerja Psikolog</h2></center>
<h5>Periode : <?= $start_date.' - '.$end_date ?></h5>
<hr>
	<table border="1" width="100%" cellspacing="0">
		<tr>
            <th style="width: 5px; text-align:  center;">No</th>
            <th style="width: 15%">Nama</th>
            <th style="width: 10%">Rincian Kegiatan</th>
            <th style="width: 10%">Volume</th>
            <th style="width: 10px; text-align:  center;">Satuan</th>
        </tr>
         <?php $i=0; foreach ($rekap_konselor as $key4): $i++; ?>
                                                                
            <tr>
                <td><?= $i; ?></td>
                <td><?= $key4->gelar_depan.' '.$key4->nama_lengkap.' '.$key4->gelar_belakang ?></td>
                <td style="text-align:  center;">Konseling</td>
                <td class="tx-right"><?= $key4->jumlah ?></td>
                <td style="text-align:  center;">Layanan</td>
            </tr>

        <?php endforeach ?>
	</table>

<hr />


</body>
</html>