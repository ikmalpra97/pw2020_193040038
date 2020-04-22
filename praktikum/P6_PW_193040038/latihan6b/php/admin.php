<?php
//menghubungkan dengan file php lainnya
require 'functions.php';

//melakukan query
$buku = query("SELECT * FROM buku");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div>
    <a href="tambah.php"><button>Tambah Data</button></a>
  </div>
  <table border="1" cellpadding="13" cellspacing="0">
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
    <?php $i = 1; ?>
    <?php foreach ($buku as $book) : ?>
      <tr>
        <td><?= $i; ?></td>
        <td>
          <a href=""><button>Ubah</button></a>
          <a href=""><button>Hapus</button></a>
        </td>
        <td><img src="../assets/img/<?= $book["foto"]; ?>" width="200px"></td>
        <td><?= $book["nama_buku"]; ?></td>
        <td><?= $book["penulis"]; ?></td>
        <td><?= $book["penerbit"]; ?></td>
        <td><?= $book["jumlah_halaman"]; ?></td>
        <td><?= $book["tahun_terbit"]; ?></td>
        <td><?= $book["isbn"]; ?></td>
        <td><?= $book["harga"]; ?></td>
      </tr>
      <?php $i++; ?>
    <?php endforeach; ?>
  </table>
</body>

</html>