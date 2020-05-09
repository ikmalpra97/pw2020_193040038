<?php
session_start();

if (isset($_SESSION['login'])) {
  header("Location: index.php");
  exit;
}

require 'functions.php';

//ketika tombol login ditekan
if (isset($_POST['login'])) {
  $login = login($_POST);
}


?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <title>Login</title>
</head>

<body>
  <div class="container">
    <center>
      <h3>Form Login</h3>
    </center>
    <?php if (isset($login['error'])) : ?>
      <p style="color: red; font-style:italic; "><?= $login['pesan']; ?></p>
    <?php endif; ?>
    <div class="row">
      <form action="" method="POST">
        <div class="row">
          <div class="input-field col s4 offset-s4">
            <input type="text" name="username" autofocus autocomplete="off" required>
            <label class="active" for="username">Username</label>
          </div>
          <div class="input-field col s4 offset-s4">
            <input type="password" name="password">
            <label class="active" for="username">NRP</label>
          </div>
          <button class="waves-effect waves-light btn col s2 offset-s5" type="submit" name="login">Login</button>
        </div>
        <a class="waves-effect waves-light btn col s2 offset-s5" href="registrasi.php">tambah user baru</a>
      </form>
    </div>



    <script type="text/javascript" src="js/materialize.min.js"></script>

</body>

</html>