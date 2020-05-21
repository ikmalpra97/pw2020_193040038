<?php
session_start();

if (!isset($_SESSION["username"])) {
  header("Location: login.php");
  exit;
}


//menghubungkan dengan file php lainnya
require 'functions.php';


//cek search untuk query buku
$buku = query("SELECT * FROM buku");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="../css/style.css" media="screen,projection" />
  <link rel="shortcut icon" href="../assets/logo/icon.png">
  <title>Admin Page</title>
</head>

<body>

  <nav>
    <div class="nav-wrapper grey darken-1">
      <div class="container">
        <a href="#" class="brand-logo">ADMIN</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="tambah.php" class="waves-effect green darken-3 btn">Tambah Data</a></li>
          <li><a href="logout.php" class="waves-effect red darken-1 btn btn">LOGOUT</a></li>
        </ul>
      </div>
    </div>
  </nav>


  <div class="container">

    <form action="" method="GET">
      <div class="row">
        <div class="input-field col s6">
          <input type="search" id="cari" name="search" placeholder="Masukkan Kata Pencarian" class="validate keyword" size="60" autocomplete="off">
          <i class="material-icons">close</i>
        </div>
      </div>
    </form>

    </form>
    <div id="kontener">
      <table border="1" cellpadding="13" cellspacing="0" class="striped">
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
        <?php if (empty($buku)) : ?>
          <tr>
            <td colspan="7">
              <h1>Data tidak Ditemukan</h1>
            </td>
          </tr>
        <?php else : ?>
          <?php $i = 1; ?>
          <?php foreach ($buku as $book) : ?>
            <tr>
              <td><?= $i; ?></td>
              <td>
                <a class="waves-effect brown darken-1 btn" href="ubah.php?id=<?= $book['id']; ?>">Ubah</a>
                <a class="waves-effect red darken-1 btn" href="hapus.php?id=<?= $book['id']; ?>" onclick="return confirm('Hapus Data?')">Hapus</a>
              </td>
              <td><img src="../assets/img/<?= $book["foto"]; ?>" width="100px"></td>
              <td><?= $book['nama_buku']; ?></td>
              <td><?= $book["penulis"]; ?></td>
              <td><?= $book["penerbit"]; ?></td>
              <td><?= $book["jumlah_halaman"]; ?></td>
              <td><?= $book["tahun_terbit"]; ?></td>
              <td><?= $book["isbn"]; ?></td>
              <td><?= $book["harga"]; ?></td>
            </tr>
            <?php $i++; ?>
          <?php endforeach; ?>
        <?php endif; ?>
      </table>
    </div>
  </div>

  <script type="text/javascript" src="../js/materialize.min.js"></script>
  <script type="text/javascript" src="../js/scriptAdmin.js"></script>
</body>

</html>