<?php
require 'functions.php';

if (isset($_POST["register"])) {
  if (registrasi($_POST) > 0) {
    echo "<script>
          alert('Registrasi Berhasil');
          document.location.href = 'login.php';
          </script>";
  } else {
    echo "<script>
          alert('Registrasi Gagal');
          </script>";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div class="container">
    <center>
      <h3>Form Registrasi</h3>
    </center>
    <div class="row">
      <form action="" method="POST">
        <div class="row">
          <div class="input-field col s6 offset-s3">
            <label for="username">Username</label>
            <input type="text" name="username">
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 offset-s3">
            <label for="password">Password</label>
            <input type="password" name="password">
          </div>
        </div>
        <center>
          <button class="waves-effect blue darken-4 btn" type="submit" name="register">REGISTER</button>
        </center>
      </form>
    </div>
  </div>



  <script type="text/javascript" src="../js/materialize.min.js"></script>

</body>

</html>