<?php
//menghubungkan dengan file php lainnya
require 'php/functions.php';

// pagination
$jumlahDataPerHalaman = 3;
$conn = koneksi();
$jumlahData = count(cariIndeks("SELECT * FROM buku"));


//cek search tidak ada isinya untuk jumlah data
if (isset($_GET["search"])) {
    $jumlahData = count(jumlahCari($_GET["search"]));
} else {
    $jumlahData = count(cariIndeks("SELECT * FROM buku"));
}

$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);

//cek apakah halaman 1
$halamanAktif = (isset($_GET['page'])) ? $_GET["page"] : 1;

$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

//cek search untuk query buku
if (isset($_GET["search"])) {
    $search = ($_GET["search"]);
    $buku = cari($search, $awalData, $jumlahDataPerHalaman);
} else {
    $buku = cariIndeks("SELECT * FROM buku LIMIT $awalData, $jumlahDataPerHalaman");
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <!-- my CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Import Font Awesome Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" integrity="sha384-REHJTs1r2ErKBuJB0fCK99gCYsVjwxHrSU0N7I1zl9vZbggVJXRMsv/sLlOAGb4M" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/logo/icon.png">
    <title>AQUASIA BOOK STORE</title>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="teal darken-4">
        <div class=" container">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo"><img class="pictlogo" src="assets/logo/icon.png">
                    <p class="book">BOOK STORE</p>
                </a>
                <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li>
                        <div class="container">
                            <div class="nav-wrapper">
                                <form action="" method="GET">
                                    <div class="input-field">
                                        <input id="search" type="search" name="search" placeholder="Cari Judul Buku" class="validate" size="50" autocomplete="off">
                                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                        <i class="material-icons">close</i>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </li>
                    <li><a href="php/login.php">Masuk</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- sidenav -->
    <ul class="sidenav" id="mobile-nav">
        <li><a href="php/login.php">Masuk</a></li>
        <li><a class="link" href="">Tentang Kami</a></li>
        <li><a class="link" href="">Kerjasama</a></li>
    </ul>

    <!-- Slider -->
    <div class="slider">
        <ul class="slides">
            <li>
                <img src="assets/slider/1.jpeg">
                <div class="caption center-align">
                    <h3>WELCOME TO AQUASIA BOOK STORE</h3>
                </div>
            </li>
            <li>
                <img src="assets/slider/1.jpeg">
                <div class="caption left-align">
                    <h3>GOOD BOOKS, GOOD WORLD</h3>
                    <h5 class="light grey-text text-lighten-3">Search what you want in here!</h5>
                </div>
            </li>
        </ul>
    </div>

    <div id="konte">
        <div class="container">
            <h3>BUKU-BUKU POPULER</h3>
            <?php if (empty($buku)) : ?>
                <tr>
                    <td colspan="7">
                        <h1>Data tidak Ditemukan</h1>
                    </td>
                </tr>
            <?php else : ?>
                <div class="row">
                    <?php foreach ($buku as $book) : ?>
                        <div class="col l4 m6 s12">
                            <div class="card">
                                <div class="card-image">
                                    <img src="assets/img/<?= $book["foto"]; ?>">
                                </div>
                                <div class="card-content">
                                    <span class="card-title"><?= $book["nama_buku"] ?></span>
                                    <p><?= $book["penulis"]; ?></p>
                                    <a href="php\detail.php?id=<?= $book['id'] ?>">
                                        <h5>Rp.<?= $book["harga"]; ?></h5>
                                    </a>
                                </div>
                                <div class="card-action ">
                                    <a href="php\detail.php?id=<?= $book['id'] ?>">CLICK HERE FOR MORE DETAIL</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>



    <!-- Navigasi -->
    <div class="center">
        <ul class="pagination">
            <!-- FIRST PAGE -->
            <?php if ($halamanAktif != 1) : ?>
                <li>
                    <a href="?page=1" ; ?>FIRST</a>
                </li>
            <?php endif; ?>


            <?php if (isset($_GET["search"])) : ?>
                <?php if ($halamanAktif > 1) : ?>
                    <li>
                        <a href="?page=<?= $halamanAktif - 1; ?>"><i class="material-icons">chevron_left</i></a>
                    </li>
                <?php endif; ?>


                <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>

                    <?php if ($i == $halamanAktif) : ?>
                        <li class="active">
                            <a href="?page=<?= $i; ?>&search=<?= $_GET["search"]; ?>"><?= $i; ?></a>
                        </li>
                    <?php else : ?>
                        <li>
                            <a href="?page=<?= $i; ?>&search=<?= $_GET["search"]; ?>"><?= $i; ?></a>
                        </li>
                    <?php endif; ?>

                <?php endfor; ?>

                <?php if ($halamanAktif < $jumlahHalaman) : ?>
                    <li>
                        <a href="?page=<?= $halamanAktif + 1; ?>&search=<?= $_GET["search"]; ?>"><i class="material-icons">chevron_right</i></a>
                    </li>
                <?php endif; ?>
            <?php elseif (!isset($_GET["search"])) : ?>
                <?php if ($halamanAktif > 1) : ?>
                    <li>
                        <a href="?page=<?= $halamanAktif - 1; ?>"><i class="material-icons">chevron_left</i></a>
                    </li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                    <?php if ($i == $halamanAktif) : ?>
                        <li class="active">
                            <a href="?page=<?= $i; ?>"><?= $i; ?></a>
                        </li>
                    <?php else : ?>
                        <li>
                            <a href="?page=<?= $i; ?>"><?= $i; ?></a>
                        </li>
                    <?php endif; ?>
                <?php endfor; ?>

                <?php if ($halamanAktif < $jumlahHalaman) : ?>
                    <li>
                        <a href="?page=<?= $halamanAktif + 1; ?>"><i class="material-icons">chevron_right</i></a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
            <!-- LAST PAGE -->
            <?php if ($halamanAktif !=  $jumlahHalaman) : ?>
                <li>
                    <a href="?page=<?= $jumlahHalaman; ?>">LAST</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>


    <!-- footer -->
    <footer class="page-footer blue-grey darken-1">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <a class="link" href=""><img class="aquasiafooter" src="assets/logo/aquasia.jpg"></a>
                    <ul>
                        <li><a class="link" href="">Tentang Kami</a></li>
                        <li><a class="link" href="">Kerjasama</a></li>
                    </ul>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Ikuti Kami</h5>
                    <a class="waves-effect  blue darken-4 btn sosmed" href=""><i class="fab fa-facebook"></i></a>
                    <a class="waves-effect red accent-3 btn sosmed" href=""><i class="fab fa-instagram"></i></a>
                    <a class="waves-effect blue accent-2 btn sosmed" href=""><i class="fab fa-twitter"></i></a>
                    <a class="waves-effect red accent-4 btn sosmed" href=""><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-copyright blue-grey darken-3">
            <div class="container center">
                © 2019 AQUASIA CORP - All Rights Reserved.
            </div>
        </div>
    </footer>

    <!-- SCRIPT -->
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript">
        const slider = document.querySelectorAll('.slider');
        M.Slider.init(slider, {
            indicators: false,
            height: 600,
            transition: 600,
            interval: 3000
        });

        const sidenav = document.querySelectorAll('.sidenav');
        M.Sidenav.init(sidenav);
    </script>

</body>

</html>