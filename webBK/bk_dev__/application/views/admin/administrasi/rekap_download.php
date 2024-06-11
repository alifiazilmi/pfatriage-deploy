<?php
 
 header("Content-type: application/vnd-ms-excel");
 
 header("Content-Disposition: attachment; filename=datakonseling.xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>
 
 <table border="1" width="100%">
 
      <thead>
                                                            <th>No</th>
                                                            <?php if (isset($_GET['status2'])): ?>
                                                            <th>Status</th>
                                                            <?php endif ?>
                                                             <?php if (isset($_GET['waktu_pengajuan'])): ?>
                                                            <th>Tanggal Pengajuan</th>
                                                            <?php endif ?>
                                                           
                                                             <?php if (isset($_GET['display_name'])): ?>
                                                            <th>Nama Mahasiswa</th>
                                                            <?php endif ?>
                                                              <?php if (isset($_GET['jenjang'])): ?>
                                                            <th>Jenjang</th>
                                                            <?php endif ?>
                                                              <?php if (isset($_GET['fakultas'])): ?>
                                                            <th>Fakultas</th>
                                                            <?php endif ?>
                                                              <?php if (isset($_GET['prodi'])): ?>
                                                            <th>Prodi</th>
                                                            <?php endif ?>
                                                             <?php if (isset($_GET['nama_lengkap'])): ?>
                                                            <th>Nama Konselor</th>
                                                            <?php endif ?>
                                                             <?php if (isset($_GET['venue'])): ?>
                                                            <th>Tempat</th>
                                                            <?php endif ?>
                                                             <?php if (isset($_GET['no_hp'])): ?>
                                                            <th>No Hp</th>
                                                            <?php endif ?>
                                                             <?php if (isset($_GET['email'])): ?>
                                                            <th>Email</th>
                                                            <?php endif ?>
                                                             <?php if (isset($_GET['waktu_mulai_konseling'])): ?>
                                                                <th>Waktu Mulai Konseling</th>
                                                            <?php endif ?>
                                                             <?php if (isset($_GET['waktu_akhir_konseling'])): ?>
                                                            <th>Waktu Akhir Konseling</th>
                                                            <?php endif ?>
                                                             <?php if (isset($_GET['durasi_konseling'])): ?>
                                                            <th>Durasi Konseling</th>
                                                            <?php endif ?>
                                                             <?php if (isset($_GET['kategori_permasalahan'])): ?>
                                                            <th>Kategori Permasalahan</th>
                                                            <?php endif ?>
                                                             <?php if (isset($_GET['resume_konsultasi'])): ?>
                                                            <th>Resume Konsultasi</th>
                                                            <?php endif ?>
                                                             <?php if (isset($_GET['catatan_dosen_wali'])): ?>
                                                            <th>Catatan Dosen Wali</th>
                                                            <?php endif ?>
                                                             <?php if (isset($_GET['catatan_orang_tua'])): ?>
                                                            <th>Catatan Orang Tua</th>
                                                            <?php endif ?>
                                                             <?php if (isset($_GET['saran'])): ?>
                                                            <th>Saran</th>
                                                            <?php endif ?>
                                                             <?php if (isset($_GET['kesimpulan'])): ?>
                                                            <th>Kesimpulan</th>
                                                            <?php endif ?>
                                                             <?php if (isset($_GET['alasan_konsultasi'])): ?>
                                                            <th>Alasan Konsultasi</th>
                                                            <?php endif ?>
                                                             <?php if (isset($_GET['ringkasan_analisa_permasalahan'])): ?>
                                                            <th>Ringkasan Analisa Permasalahan</th>
                                                            <?php endif ?>
                                                             <?php if (isset($_GET['tindakan_kuratif'])): ?>
                                                            <th>Tindakan Kuratif</th>
                                                            <?php endif ?>
                                                             <?php if (isset($_GET['rekomendasi'])): ?>
                                                            <th>Rekomendasi</th>
                                                            <?php endif ?>
                                                             <?php if (isset($_GET['catatan_observasi'])): ?>
                                                            <th>Catatan Observasi</th>
                                                            <?php endif ?>
                                                             <?php if (isset($_GET['kategori_kasus'])): ?>
                                                            <th>Kategori Kasus</th>
                                                            <?php endif ?>
                                                             <?php if (isset($_GET['kategori_kasus_lainnya'])): ?>
                                                            <th>Kategori Kasus Lainnya</th>
                                                            <?php endif ?>
                                                             <?php if (isset($_GET['level_kasus'])): ?>
                                                            <th>Level Kasus</th>
                                                            <?php endif ?>
 
      </thead>
 
      <tbody>
 
          <?php $i=0; foreach ($rekap as $key): $i++; ?>
                                                                <tr>
                                                                        <td><?= $i; ?></td>
                                                                     <?php if (isset($_GET['status2'])): ?>
                                                                        <td><?= $key->status ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['waktu_pengajuan'])): ?>
                                                                        <td><?= format_date_form($key->waktu_pengajuan) ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['display_name'])): ?>
                                                                        <td><?= $key->display_name ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['nama_lengkap'])): ?>
                                                                        <td><?= $key->nama_lengkap ?></td>
                                                                    <?php endif ?>
                                                                    <?php if (isset($_GET['jenjang'])): ?>
                                                                        <td><?= $key->prodi_jenjang ?></td>
                                                                    <?php endif ?>
                                                                    <?php if (isset($_GET['fakultas'])): ?>
                                                                        <td><?= $key->nama_fakultas ?></td>
                                                                    <?php endif ?>
                                                                    <?php if (isset($_GET['prodi'])): ?>
                                                                        <td><?= $key->nama_prodi ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['venue'])): ?>
                                                                        <td><?= $key->venue ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['no_hp'])): ?>
                                                                        <td><?= $key->no_hp ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['email'])): ?>
                                                                        <td><?= $key->email ?></td>
                                                                    <?php endif ?>
                                                                    <?php if (isset($_GET['waktu_mulai_konseling'])): ?>
                                                                        <td><?= $key->waktu_mulai_konseling ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['waktu_akhir_konseling'])): ?>
                                                                        <td><?= $key->waktu_akhir_konseling ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['durasi_konseling'])): ?>
                                                                        <td><?= $key->durasi_konseling ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['kategori_permasalahan'])): ?>
                                                                        <td><?= $key->kategori_permasalahan ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['resume_konsultasi'])): ?>
                                                                        <td><?= strip_tags($key->resume_konsultasi) ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['catatan_dosen_wali'])): ?>
                                                                        <td><?= strip_tags($key->catatan_dosen_wali) ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['catatan_orang_tua'])): ?>
                                                                        <td><?= strip_tags($key->catatan_orang_tua) ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['saran'])): ?>
                                                                        <td><?= strip_tags($key->saran) ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['kesimpulan'])): ?>
                                                                        <td><?= strip_tags($key->kesimpulan)?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['alasan_konsultasi'])): ?>
                                                                        <td><?= strip_tags($key->alasan_konsultasi) ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['ringkasan_analisa_permasalahan'])): ?>
                                                                        <td><?= strip_tags($key->ringkasan_analisa_permasalahan) ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['tindakan_kuratif'])): ?>
                                                                        <td><?= strip_tags($key->tindakan_kuratif) ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['rekomendasi'])): ?>
                                                                        <td><?= strip_tags($key->rekomendasi) ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['catatan_observasi'])): ?>
                                                                        <td><?= strip_tags($key->catatan_observasi) ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['kategori_kasus'])): ?>
                                                                        <td><?= strip_tags($key->kategori_kasus) ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['kategori_kasus_lainnya'])): ?>
                                                                        <td><?= strip_tags($key->kategori_kasus_lainnya) ?></td>
                                                                    <?php endif ?>
                                                                     <?php if (isset($_GET['level_kasus'])): ?>
                                                                        <td><?= strip_tags($key->level_kasus) ?></td>
                                                                    <?php endif ?>
                                                                </tr>
                                                                <?php endforeach ?>
 
      </tbody>
 
 </table>