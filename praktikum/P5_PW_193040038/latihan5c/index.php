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
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body class="grey lighten-2">
    <div class="container">
        <center>
            <h1>JUDUL BUKU</h1>
        </center>
        <?php foreach ($buku as $book) : ?>
            <ul>
                <li>
                    <p class="nama">
                        <a class="waves-effect waves-light btn" href="php\detail.php?id=<?= $book['id'] ?>">
                            <?= $book["nama_buku"] ?>
                        </a>
                    </p>
                </li>
            </ul>
        <?php endforeach; ?>
    </div>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>