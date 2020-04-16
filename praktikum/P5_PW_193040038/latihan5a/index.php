<?php
    //melakukan koneksi ke database
    $conn =mysqli_connect("localhost", "root","") or die ("koneksi ke DB gagal");

    //memilih database
    mysqli_select_db($conn, "pw_193040038") or die ("Database salah!");

    //query mengambil objek dari tabel didalam database
    $result = mysqli_query($conn, "SELECT * FROM buku");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tugas 2</title>
</head>
<body>
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
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $i?></td>
            <td><img width="200px" src="assets/img/<?= $row ["foto"] ?>"></td>
            <td><?= $row ["nama_buku"] ?></td>
            <td><?= $row ["penulis"] ?></td>
            <td><?= $row ["penerbit"] ?></td>
            <td><?= $row ["jumlah_halaman"] ?></td>
            <td><?= $row ["tahun_terbit"] ?></td>
            <td><?= $row ["isbn"] ?></td>
            <td><?= $row ["harga"] ?></td>
        </tr>
        <?php $i++?>
        <?php endwhile; ?>
        
    </table>
</body>
</html>