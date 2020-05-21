<?php
require '../php/functions.php';

$search = $_GET["search"];
$query = "SELECT * FROM buku WHERE nama_buku LIKE '%$search%' ";
$buku = cariIndeks($query);

?>

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
    <div class="row">
      <?php foreach ($buku as $book) : ?>
        <div class="col l4 m6 s12">
          <div class="card">
            <div class="card-image">
              <img src="assets/img/<?= $book["foto"]; ?>">
            </div>
            <div class="card-content">
              <span class="card-title"><?= $book["nama_buku"] ?></span>
            </div>
            <div class="card-action">
              <a href="php\detail.php?id=<?= $book['id'] ?>">CLICK HERE FOR MORE INFORMATION</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>