<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';
$mahasiswa = query("SELECT * FROM Mahasiswa");

//ketika tombol cari di klik
if (isset($_POST['cari'])) {
  $mahasiswa = cari($_POST['keyword']);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <title>Daftar Mahasiswa</title>
</head>

<body>
  <div class="container">
    <a href="logout.php" class="waves-effect waves-light btn">logout</a>
    <center>
      <h3>Daftar Mahasiswa</h3>
    </center>
    <a href="tambah.php" class="waves-effect waves-light btn">Tambah Data Mahasiswa</a>
    <br>
    <br>

    <form action="" method="POST">
      <div class="row">
        <div class="input-field col s4 ">
          <input type="text" name="keyword" placeholder="masukkan keyword pencarian.." autofocus autocomplete="off" class="keyword">
          <button class="waves-effect waves-light btn tombol-cari" type="submit" name="cari">Cari!</button>
        </div>
      </div>
    </form>
    <br>

    <div class="container1">
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
    </div>
  </div>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>