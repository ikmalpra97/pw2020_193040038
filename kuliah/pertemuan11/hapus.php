<?php
require 'functions.php';

//mengambil id dari url
$id = $_GET['id'];

if (hapus($_GET['id'])) {
  echo "<script>
          alert('data berhasil dihapus');
          document.location.href = 'index.php';
          </script>";
} else {
  echo "data gagal dihapus";
}
