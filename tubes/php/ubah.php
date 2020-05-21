<?php
session_start();

if (!isset($_SESSION["username"])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

$id = $_GET['id'];
$buku = query("SELECT * FROM buku WHERE id = $id");

if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
            alert('Data Berhasil Diubah!');
            document.location.href = 'admin.php';
          </script>";
  } else {
    echo "<script>
            alert ('Data Gagal Diubah!');
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
  <title>Ubah Data</title>
</head>

<body>
  <div class="container grey lighten-3">
    <center>
      <h3>Form Ubah Data Buku</h3>
    </center>
    <div class="row">
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="input-field col s6 offset-s3">
            <input type="hidden" name="id" id="id" value="<?= $buku['id']; ?>">
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 offset-s3">
            <label for="nama_buku">Nama Buku :</label>
            <input type="text" name="nama_buku" id="nama_buku" required value="<?= $buku['nama_buku']; ?>"><br><br>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 offset-s3">
            <label for="penulis">Penulis :</label>
            <input type="text" name="penulis" required value="<?= $buku['penulis']; ?>">
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 offset-s3">
            <label for="penerbit">Penerbit :</label>
            <input type="text" name="penerbit" required value="<?= $buku['penerbit']; ?>">
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 offset-s3">
            <label for="jumlah_halaman">Jumlah Halaman :</label>
            <input type="text" name="jumlah_halaman" required value="<?= $buku['jumlah_halaman']; ?>">
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 offset-s3">
            <label for="tahun_terbit">Tahun Terbit :</label>
            <input type="text" name="tahun_terbit" required value="<?= $buku['tahun_terbit']; ?>">
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 offset-s3">
            <label for="isbn">ISBN :</label>
            <input type="text" name="isbn" required value="<?= $buku['isbn']; ?>">
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 offset-s3">
            <input type="hidden" name="gambar_lama" value="<?= $buku["foto"]; ?>">
            <label class="active">Foto :</label>
            <input class="gambar" type="file" name="gambar" id="gambar" onchange="previewImage()">
            <img class="img-preview" src="../assets/img/<?= $buku["foto"]; ?>" width="200px" style="display: block;">
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 offset-s3">
            <label for="harga">Harga :</label>
            <input type="text" name="harga" required value="<?= $buku['harga']; ?>">
          </div>
        </div>
        <br>
        <center><button class="waves-effect green darken-3 btn" type="submit" name="ubah">Ubah Data</button></center>
        <center><a class="waves-effect blue darken-4 btn" href="admin.php">Kembali</a></center>
      </form>

    </div>
  </div>


  <script type="text/javascript" src="../js/materialize.min.js"></script>
  <script src="../js/preview.js"></script>
</body>

</html>