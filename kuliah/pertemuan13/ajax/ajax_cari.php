<?php

require '../functions.php';
$mahasiswa = cari($_GET['keyword']);

?>

<table border="1" cellpadding="10" cellspacing="0" class="striped">
  <tr>
    <th>#</th>
    <th>Gambar</th>
    <th>Nama</th>
    <th>Aksi</th>
  </tr>
  <?php if (empty($mahasiswa)) : ?>
    <tr>
      <td colspan="4">
        <h2>DATA MAHASISWA TIDAK DITEMUKAN</h2>
      </td>
    </tr>
  <?php endif; ?>
  <?php $i = 1;
  foreach ($mahasiswa as $mhs) : ?>
    <tr>
      <td><?= $i++ ?></td>
      <td><img width="100px" src="img/<?= $mhs['gambar']; ?>" alt=""></td>
      <td><?= $mhs['nama']; ?></td>
      <td>
        <a class="waves-effect waves-light btn" href="detail.php?id=<?= $mhs['id']; ?>">lihat detail</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>