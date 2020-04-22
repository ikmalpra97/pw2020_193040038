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
  <title>Document</title>
</head>

<body>
  <h3>Form Tambah Data Buku</h3>
  <form action="" method="POST">
    <ul>
      <li>
        <label for="nama_buku">Nama Buku :</label><br>
        <input type="text" name="nama_buku" required><br><br>
      </li>
      <li>
        <label for="penulis">Penulis :</label><br>
        <input type="text" name="penulis" required><br><br>
      </li>
      <li>
        <label for="penerbit">Penerbit :</label><br>
        <input type="text" name="penerbit" required><br><br>
      </li>
      <li>
        <label for="jumlah_halaman">Jumlah Halaman :</label><br>
        <input type="text" name="jumlah_halaman" required><br><br>
      </li>
      <li>
        <label for="tahun_terbit">Tahun Terbit :</label><br>
        <input type="text" name="tahun_terbit" required><br><br>
      </li>
      <li>
        <label for="isbn">ISBN :</label><br>
        <input type="text" name="isbn" required><br><br>
      </li>
      <li>
        <label for="foto">Foto :</label><br>
        <input type="text" name="foto" required><br><br>
      </li>
      <li>
        <label for="harga">Harga :</label><br>
        <input type="text" name="harga" required>
      </li>
      <br>
      <button type="submit" name="tambah">Tambah Data</button>
      <button type="submit">
        <a href="admin.php">Kembali</a>
      </button>
    </ul>
  </form>
</body>

</html>