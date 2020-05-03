<?php
//menghubungkan dengan file php lainnya
require 'php/functions.php';

//pengkondisian untuk mengubah query pengisi variabel
if (isset($_GET['carikan'])) {
    $kata = $_GET['kata'];
    $buku = query("SELECT * FROM buku WHERE
            nama_buku LIKE '%$kata%' ");
} else {
    //melakukan query
    $buku = query("SELECT * FROM buku");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AQUASIA BOOK STORE</title>
</head>

<body>
    <nav>
        <div class="nav-wrapper  pink darken-1">
            <a href="#" class="brand-logo">AQUASIA BOOK STORE</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="php/login.php" class="waves-effect green darken-3 btn">LOGIN</a></li>
                <li>
                    <form action="" method="GET">
                        <button class="waves-effect blue darken-4 btn" type="text" name="carikan">Cari!</button>
                </li>
                <li>
                    <div class="row col pink darken-2">
                        <div class="input-field col s12">
                            <input type="text" id="kata" name="kata" class="validate" autofocus>
                            <label for="kata" class="active">CARI</label>
                        </div>
                    </div>
                    </form>
                </li>

            </ul>
        </div>
    </nav>

    <div class="row">

        <div class="container">
            <center>
                <h1>JUDUL BUKU</h1>
            </center>
            <?php if (empty($buku)) : ?>
                <tr>
                    <td colspan="7">
                        <h1>Data tidak Ditemukan</h1>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($buku as $book) : ?>

                    <center>
                        <img src="assets/img/<?= $book["foto"]; ?>" width="100px">
                        <br>
                        <a class="waves-effect blue-grey darken-1 btn" href="php\detail.php?id=<?= $book['id'] ?>">
                            <?= $book["nama_buku"] ?>
                        </a>
                    </center>
                    <br>
                <?php endforeach; ?>
        </div>
    <?php endif; ?>


    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>