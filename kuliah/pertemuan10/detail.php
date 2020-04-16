<?php
require 'functions.php';

//ambil id dari URL
$id = $_GET['id'];

// query mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa where id = $id");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Mahasiswa</title>
</head>

<body>
  <h3>Detail Mahsiswa</h3>
  <ul>
    <li><img src="img/<?= $mhs['gambar']; ?>" width="250px" alt=""></li>
    <li><?= $mhs['nama']; ?></li>
    <li><?= $mhs['nrp']; ?></li>
    <li><?= $mhs['email']; ?></li>
    <li><?= $mhs['jurusan']; ?></li>
    <li><a href="">ubah</a></li> | <a href="">hapus</a>
    <li><a href="latihan3.php">kembali ke daftar mahasiswa</a></li>
  </ul>
</body>

</html>