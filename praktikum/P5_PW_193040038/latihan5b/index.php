<?php
    //menghubungkan dengan file php lainnya
    require 'php/functions.php';

    //melakukan query
    $buku = query("SELECT * FROM buku")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tugas 2</title>
</head>
<body>
<div class="container">
    <center>Daftar Buku</center>
    <table border="1" cellspacing="0" cellpadding="5">
        <tr>
            <td><center>No.</center></td>
            <td><center>Foto</center></td>
            <td><center>Nama Buku</center></td>
            <td><center>Penulis</center></td>
            <td><center>Penerbit</center></td>
            <td><center>Jumlah Halaman</center></td>
            <td><center>Tahun Diterbitkan</center></td>
            <td><center>ISBN</center></td>
            <td><center>Harga</center></td>
        </tr>
        <?php $i=1;?>
        <?php foreach ($buku as $book) : ?>
        <tr>
            <td><?= $i?></td>
            <td><img width="200px" src="assets/img/<?= $book ["foto"] ?>"></td>
            <td><?= $book ["nama_buku"] ?></td>
            <td><?= $book ["penulis"] ?></td>
            <td><?= $book ["penerbit"] ?></td>
            <td><?= $book ["jumlah_halaman"] ?></td>
            <td><?= $book ["tahun_terbit"] ?></td>
            <td><?= $book ["isbn"] ?></td>
            <td><?= $book ["harga"] ?></td>
        </tr>
        <?php $i++?>
        <?php endforeach; ?>
        
    </table>
    </div>
</body>
</html>