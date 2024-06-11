<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>Yth, <?= $nama_mahasiswa ?> .</p>
<p>Dengan Ini Kami Informasikan bahwa Pengajuan Konseling Anda telah disetujui & dijadwalkan sebagai Berikut : </p>
<hr>
	<table>
		<tr>
			<td>Konselor :</td>
			<td><?= $nama_konselor ?></td>
		</tr>
		<tr>
			<td>Tanggal :</td>
			<td><?= format_date_form($tanggal_disetujui) ?></td>
		</tr>
		<tr>
			<td>Jam :</td>
			<td><?= $jam_disetujui ?></td>
		</tr>
		<tr>
			<td>Online/Offline :</td>
			<td><?= $venue ?></td>
		</tr>
		<tr>
			<td>Tempat / Media Konsultasi:</td>
			<td><?= $media_konsultasi ?></td>
		</tr>
	</table>
<hr />
<p>Silahkan Hubungi Hotline Direktorat Kemahasiswaan untuk Informasi & Konfirmasi Lebih Lanjut, Pada Nomer Berikut : 08112111446.</p>
<hr>
<p>E-mail ini dikirimkan secara otomatis oleh sistem, Bapak/Ibu tidak diharapkan me-reply e-mail ini.</p>
<p>Wassalam. <br />Bimbingan Konseling Direktorat Kemahasiswaan <br />Institut Teknologi Bandung <br />Gedung CC Barat, Lantai 1. <br />Telp : (022)2534275<br />Email : informasi@kemahasiswaan.itb.ac.id</p>
</body>
</html>