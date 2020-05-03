<?php
//menghubungkan dengan file php lainnya
require 'functions.php';


//pengkondisian untuk mengubah query pengisi variabel
if (isset($_GET['cari'])) {
  $keyword = $_GET['keyword'];
  $buku = query("SELECT * FROM buku WHERE
          nama_buku LIKE '%$keyword%' OR
          penulis LIKE '%$keyword%' OR
          penerbit LIKE '%$keyword%' OR
          jumlah_halaman LIKE '%$keyword%' OR
          tahun_terbit LIKE '%$keyword%' OR
          isbn LIKE '%$keyword%' OR
          harga LIKE '%$keyword%' ");
} else {
  //melakukan query
  $buku = query("SELECT * FROM buku");
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
  <nav>
    <div class="nav-wrapper grey darken-1">
      <a href="#" class="brand-logo">ADMIN</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="tambah.php" class="waves-effect green darken-3 btn">Tambah Data</a></li>
        <li><a href="logout.php" class="waves-effect red darken-1 btn btn">LOGOUT</a></li>
      </ul>
    </div>
  </nav>

  <div class="container">

    <form action="" method="GET">
      <div class="row">
        <div class="input-field col s6">
          <input type="text" id="keyword" name="keyword" class="validate" autofocus>
          <label for="keyword" class="active">CARI</label>
          <button class="waves-effect blue darken-4 btn" type="text" name="cari">Cari!</button>
        </div>
      </div>
    </form>

    </form>
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
            <td><?= $book["nama_buku"]; ?></td>
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


  <script type="text/javascript" src="../js/materialize.min.js"></script>
</body>

</html>