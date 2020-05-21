<?php
require '../php/functions.php';

$buku = cariAdmin($_GET["keyword"]);

?>

<table border="1" cellpadding="13" cellspacing="0" class="striped">
  <tr>
    <th>#</th>
    <th>opsi</th>
    <th>Gambar</th>
    <th>Nama Buku</th>
    <th>Penulis</th>
    <th>Penerbit</th>
    <th>Jumlah Halaman</th>
    <th>Tahun Terbit</th>
    <th>ISBN</th>
    <th>Harga</th>
  </tr>
  <?php if (empty($buku)) : ?>
    <tr>
      <td colspan="7">
        <h1>Data tidak Ditemukan</h1>
      </td>
    </tr>
  <?php else : ?>
    <?php $i = 1; ?>
    <?php foreach ($buku as $book) : ?>
      <tr>
        <td><?= $i; ?></td>
        <td>
          <a class="waves-effect brown darken-1 btn" href="ubah.php?id=<?= $book['id']; ?>">Ubah</a>
          <a class="waves-effect red darken-1 btn" href="hapus.php?id=<?= $book['id']; ?>" onclick="return confirm('Hapus Data?')">Hapus</a>
        </td>
        <td><img src="../assets/img/<?= $book["foto"]; ?>" width="100px"></td>
        <td><?= $book['nama_buku']; ?></td>
        <td><?= $book["penulis"]; ?></td>
        <td><?= $book["penerbit"]; ?></td>
        <td><?= $book["jumlah_halaman"]; ?></td>
        <td><?= $book["tahun_terbit"]; ?></td>
        <td><?= $book["isbn"]; ?></td>
        <td><?= $book["harga"]; ?></td>
      </tr>
      <?php $i++; ?>
    <?php endforeach; ?>
  <?php endif; ?>
</table>