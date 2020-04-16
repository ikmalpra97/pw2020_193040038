<?php
require 'functions.php';
$mahasiswa = query("SELECT * FROM Mahasiswa");
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
    <center>
      <h3>Daftar Mahasiswa</h3>
    </center>
    <a href="tambah.php" class="waves-effect waves-light btn">Tambah Data Mahasiswa</a>
    <br>
    <table border="1" cellpadding="10" cellspacing="0" class="striped">
      <tr>
        <th>#</th>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Aksi</th>
      </tr>

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
  <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>