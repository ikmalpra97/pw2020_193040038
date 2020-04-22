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
<h1>JUDUL BUKU</h1>
        <?php foreach ($buku as $book) : ?>
            <ul>
                <li>
                    <p class="nama">       
                        <a href="php\detail.php?id=<?= $book['id'] ?>">
                            <?= $book["nama_buku"] ?>
                        </a>               
                    </p>
                </li>
            </ul>
        <?php endforeach; ?>
    </div>
</body>
</html>