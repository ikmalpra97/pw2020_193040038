<?php
session_start();

if (!isset($_SESSION["username"])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

if (isset($_POST['tambah'])) {

  if (tambah($_POST) > 0) {
    echo "<script>
            alert('Data Berhasil Ditambahkan!');
            document.location.href = 'admin.php';
          </script>";
  } else {
    echo "<script>
            alert ('Data Gagal Ditambahkan!');
            document.location.href = 'admin.php';
          </script>";
  }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
  <link rel="shortcut icon" href="../assets/logo/icon.png">
  <title>Tambah Data</title>
</head>

<body>
  <div class="container grey lighten-3">
    <center>
      <h3>Form Tambah Data Buku</h3>
    </center>
    <div class="row">
      <form action="" method="POST" enctype="multipart/form-data">

        <div class="row">
          <div class="input-field col s6 offset-s3">
            <label for="nama_buku">Nama Buku</label>
            <input type="text" name="nama_buku" required>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 offset-s3">
            <label for="penulis">Penulis</label>
            <input type="text" name="penulis" required>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 offset-s3">
            <label for="penerbit">Penerbit</label>
            <input type="text" name="penerbit" required>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 offset-s3">
            <label for="jumlah_halaman">Jumlah Halaman</label>
            <input type="text" name="jumlah_halaman" required>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 offset-s3">
            <label for="tahun_terbit">Tahun Terbit</label>
            <input type="text" name="tahun_terbit" required>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 offset-s3">
            <label for="isbn">ISBN</label>
            <input type="text" name="isbn" required>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s4 offset-s3">
            <input class="gambar" type="file" name="gambar" onchange="previewImage()">
            <label class="active">Foto</label>
            <img class="img-preview" src="../assets/img/nophoto.jpg" width="200" style="display: block;">
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 offset-s3">
            <label for="harga">Harga</label>
            <input type="text" name="harga" required>
          </div>
        </div>
        <br>
        <center><button class="waves-effect green darken-3 btn" type="submit" name="tambah">Tambah Data</button></center>
        <center>
          <a class="waves-effect blue darken-4 btn" href="admin.php">Kembali</a>
        </center>
        </ul>
      </form>
    </div>
  </div>
  <script type="text/javascript" src="../js/materialize.min.js"></script>
  <script type="text/javascript" src="../js/preview.js"></script>
</body>

</html>