<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

//jika tidak ada id di url
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

//ambil id dari url
$id = $_GET['id'];

//query mahasiswa berdasarkan id

$mhs = query("SELECT * FROM mahasiswa WHERE id =$id");


// cek apakah tombol ubah sudah ditekan
if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
          alert('data berhasil diubah');
          document.location.href = 'index.php';
          </script>";
  } else {
    echo "data gagal diubah";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <title>Ubah Data Mahasiswa</title>
</head>

<body>
  <center>
    <h3>Form Ubah Data Mahasiswa</h3>
  </center>
  <div class="row">
    <form action="" method="POST" class="col s12" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $mhs['id']; ?>">
      <div class="row">
        <div class="input-field col s4 offset-s4">
          <input class="validate" type="text" name="nama" autofocus required value="<?= $mhs['nama']; ?>">
          <label class="active">Nama</label>
        </div>
        <div class="input-field col s4 offset-s4">
          <input class="validate" type="text" name="nrp" required value="<?= $mhs['nrp']; ?>">
          <label class="active">NRP</label>
        </div>
        <div class="input-field col s4 offset-s4">
          <input class="validate" type="text" name="email" required value="<?= $mhs['email']; ?>">
          <label class="active">Email</label>
        </div>
        <div class="input-field col s4 offset-s4">
          <input class="validate" type="text" name="jurusan" required value="<?= $mhs['jurusan']; ?>">
          <label class="active">Jurusan</label>
        </div>
        <div class="input-field col s4 offset-s4">
          <input type="hidden" name="gambar_lama" value="<?= $mhs['gambar']; ?>">
          <input class="validate gambar" type="file" name="gambar" onchange="previewImage()">
          <label class="active">Gambar</label>
          <img class="img-preview" src="img/<?= $mhs['gambar']; ?>" width="200" style="display: block;">
          <button class="waves-effect waves-light btn col s2 offset-s5" type="submit" name="ubah">Ubah Data</button>
        </div>
      </div>


    </form>

    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="js/preview.js"></script>
</body>

</html>