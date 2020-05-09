<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

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
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <link rel="stylesheet" href="css/style.css">
  <title>Detail Mahasiswa</title>
</head>

<body>
  <div class="container">
    <center>
      <h3>Detail Mahsiswa</h3>

      <img src="img/<?= $mhs['gambar']; ?>" width="400px" alt="">
    </center>
    <table>
      <tr>

      </tr>
      <tr>
        <th>Nama</th>
        <th>:</th>
        <th><?= $mhs['nama']; ?></th>
      </tr>
      <tr>
        <th>NRP</th>
        <th>:</th>
        <th><?= $mhs['nrp']; ?></th>
      </tr>
      <tr>
        <th>Email</th>
        <th>:</th>
        <th><?= $mhs['email']; ?></th>
      </tr>
      <tr>
        <th>Jurusan</th>
        <th>:</th>
        <th><?= $mhs['jurusan']; ?></th>
      </tr>
    </table>
    <br>
    <center>
      <a href="ubah.php?id=<?= $mhs['id']; ?>" class="waves-effect waves-light btn">ubah</a> | <a href="hapus.php?id=<?= $mhs['id']; ?>" class="waves-effect waves-light btn" onclick="return confirm('apakah anda yakin?'); ">hapus</a>
      <p>---</p>
      <a href="index.php" class="waves-effect waves-light btn">kembali ke daftar mahasiswa</a>
    </center>
  </div>

  <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>