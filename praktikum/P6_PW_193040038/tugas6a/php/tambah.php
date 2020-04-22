<?php
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
  <title>Document</title>
</head>

<body>
  <div class="container grey lighten-3">
    <center>
      <h3>Form Tambah Data Buku</h3>
    </center>
    <div class="row">
      <form action="" method="POST">

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
            <label for="isbn">ISBN</label><br>
            <input type="text" name="isbn" required>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 offset-s3">
            <label for="foto">Foto</label><br>
            <input type="text" name="foto" required>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 offset-s3">
            <label for="harga">Harga</label><br>
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
</body>

</html>