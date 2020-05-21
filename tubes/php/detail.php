<?php

//mengecek apakah ada id yang dikirimkan
//jika tidak maka akan dikembalikan ke halaman index.php
if (!isset($_GET['id'])) {
    header("location:../index.php");
    exit;
}

require 'functions.php';

//mengambil id dari url
$id = $_GET['id'];

//melakukan query dengan parameter id yang diambil dari url
$buku = query("SELECT * FROM buku WHERE id = $id")[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="../css/style.css" media="screen,projection" />
    <title>Detail</title>
    <link rel="shortcut icon" href="../assets/logo/icon.png">
</head>

<body class="grey lighten-4">
    <div class="container ">
        <div class="gambar">
            <center><img width="200" src="../assets/img/<?= $buku["foto"]; ?>" alt=""></center>
        </div>
        <div class="keterangan">
            <table>

                <tr>
                    <td>
                        <p>Nama Buku</p>
                    </td>
                    <td>
                        <p>:</p>
                    </td>
                    <td>
                        <p><?= $buku["nama_buku"]; ?></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Penulis</p>
                    </td>
                    <td>
                        <p>:</p>
                    </td>
                    <td>
                        <p><?= $buku["penulis"]; ?></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Penerbit</p>
                    </td>
                    <td>
                        <p>:</p>
                    </td>
                    <td>
                        <p><?= $buku["penerbit"]; ?></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Jumlah Halaman</p>
                    </td>
                    <td>
                        <p>:</p>
                    </td>
                    <td>
                        <p><?= $buku["jumlah_halaman"]; ?></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Tahun Terbit</p>
                    </td>
                    <td>
                        <p>:</p>
                    </td>
                    <td>
                        <p><?= $buku["tahun_terbit"]; ?></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>ISBN</p>
                    </td>
                    <td>
                        <p>:</p>
                    </td>
                    <td>
                        <p><?= $buku["isbn"]; ?></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Harga</p>
                    </td>
                    <td>
                        <p>:</p>
                    </td>
                    <td>
                        <p>Rp.<?= $buku["harga"]; ?></p>
                    </td>
                </tr>

            </table>
        </div>

        <center><a href="../index.php" class="waves-effect waves-light btn tombol-kembali">Kembali</a></center>
    </div>
</body>

</html>