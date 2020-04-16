<?php
require 'functions.php';

// cek apakah tombol tambah sudah ditekan
if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
          alert('data berhasil ditambahkan');
          document.location.href = 'latihan3.php';
          </script>";
  } else {
    echo "data gagal diitambahkan";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <title>Tambah Data Mahasiswa</title>
</head>

<body>
  <center>
    <h3>Form Tambah Data Mahasiswa</h3>
  </center>
  <div class="row">
    <form action="" method="POST" class="col s12">
      <div class="row">
        <div class="input-field col s4 offset-s4">
          <input class="validate" type="text" name="nama" autofocus required>
          <label class="active">Nama</label>
        </div>
        <div class="input-field col s4 offset-s4">
          <input class="validate" type="text" name="nrp" required>
          <label class="active">NRP</label>
        </div>
        <div class="input-field col s4 offset-s4">
          <input class="validate" type="text" name="email" required>
          <label class="active">Email</label>
        </div>
        <div class="input-field col s4 offset-s4">
          <input class="validate" type="text" name="jurusan" required>
          <label class="active">Jurusan</label>
        </div>
        <div class="input-field col s4 offset-s4">
          <input class="validate" type="text" name="gambar" required>
          <label class="active">Gambar</label>
        </div>
        <button class="waves-effect waves-light btn col s2 offset-s5" type="submit" name="tambah">Tambah Data</button>
      </div>
  </div>


  </form>

  <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>