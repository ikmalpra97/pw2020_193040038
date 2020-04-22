<?php
require 'functions.php';

$id = $_GET['id'];
$buku = query("SELECT * FROM buku WHERE id = $id")[0];

if (isset($_POST['ubah'])) {
  if (tambah($_POST) > 0) {
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
  <title>Document</title>
</head>

<body>
  <h3>Form Ubah Data Buku</h3>
  <form action="" method="POST">
    <ul>
      <input type="hidden" name="id" id="id" value="<?= $buku['id']; ?>">
      <li>
        <label for="nama_buku">Nama Buku :</label><br>
        <input type="text" name="nama_buku" id="nama_buku" required value="<?= $buku['nama_buku']; ?>"><br><br>
      </li>
      <li>
        <label for="penulis">Penulis :</label><br>
        <input type="text" name="penulis" required value="<?= $buku['penulis']; ?>"><br><br>
      </li>
      <li>
        <label for="penerbit">Penerbit :</label><br>
        <input type="text" name="penerbit" required value="<?= $buku['penerbit']; ?>"><br><br>
      </li>
      <li>
        <label for="jumlah_halaman">Jumlah Halaman :</label><br>
        <input type="text" name="jumlah_halaman" required value="<?= $buku['jumlah_halaman']; ?>"><br><br>
      </li>
      <li>
        <label for="tahun_terbit">Tahun Terbit :</label><br>
        <input type="text" name="tahun_terbit" required value="<?= $buku['tahun_terbit']; ?>"><br><br>
      </li>
      <li>
        <label for="isbn">ISBN :</label><br>
        <input type="text" name="isbn" required value="<?= $buku['isbn']; ?>"><br><br>
      </li>
      <li>
        <label for="foto">Foto :</label><br>
        <input type="text" name="foto" required value="<?= $buku['foto']; ?>"><br><br>
      </li>
      <li>
        <label for="harga">Harga :</label><br>
        <input type="text" name="harga" required value="<?= $buku['harga']; ?>">
      </li>
      <br>
      <button type="submit" name="ubah">Ubah Data</button>
      <button type="submit">
        <a href="admin.php">Kembali</a>
      </button>
    </ul>
  </form>
</body>

</html>