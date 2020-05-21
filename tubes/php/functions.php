<?php
//function untuk melakukan koneksi ke database
function koneksi()
{
    $conn = mysqli_connect("localhost", "root", "") or die("koneksi ke DB gagal");
    mysqli_select_db($conn, "tubes_193040038") or die("Database salah!");

    return $conn;
}

//function untuk melakukan query ke database
function query($sql)
{
    $conn = koneksi();
    $result = mysqli_query($conn, "$sql");

    // jika hanya 1 data
    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    }

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}


//fungsi untuk menambahkan data di dalam database
function tambah($data)
{
    $conn = koneksi();

    $nama_buku = htmlspecialchars($data['nama_buku']);
    $penulis = htmlspecialchars($data['penulis']);
    $penerbit = htmlspecialchars($data['penerbit']);
    $jumlah_halaman = htmlspecialchars($data['jumlah_halaman']);
    $isbn = htmlspecialchars($data['isbn']);
    $harga = htmlspecialchars($data['harga']);
    $tahun_terbit = htmlspecialchars($data['tahun_terbit']);

    // upload gambar
    $foto = upload();

    if (!$foto) {
        return false;
    }

    $query = "INSERT INTO buku 
                    VALUES 
                    ('','$nama_buku','$penulis','$penerbit','$jumlah_halaman','$tahun_terbit','$isbn','$foto','$harga')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function upload()
{
    $nama_file = $_FILES['gambar']['name'];
    $tipe_file = $_FILES['gambar']['type'];
    $ukuran_file = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmp_file = $_FILES['gambar']['tmp_name'];

    // ketika tidak ada gambar yang dipilih
    if ($error == 4) {
        return 'nophoto.jpg';
    }

    // cek ekstensi file
    $daftar_gambar = ['jpg', 'jpeg', 'png'];
    $ekstensi_file = explode('.', $nama_file);
    $ekstensi_file = strtolower(end($ekstensi_file));
    if (!in_array($ekstensi_file, $daftar_gambar)) {
        echo "<script>
          alert('Yang anda pilih bukan gambar!');
        </script>";
        return false;
    }

    // cek type file
    if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {
        echo "<script>
          alert('Yang anda pilih bukan gambar!');
        </script>";
        return false;
    }

    // cek ukuran file
    // maksimal 5 MB == 5000000
    if ($ukuran_file > 5000000) {
        echo "<script>
          alert('Ukuran Terlalu Besar!');
        </script>";
        return false;
    }

    //lolos pengecekan
    //siap upload file
    //generate nama file baru
    $nama_file_baru = uniqid();
    $nama_file_baru .= '.';
    $nama_file_baru .= $ekstensi_file;
    move_uploaded_file($tmp_file, '../assets/img/' . $nama_file_baru);

    return $nama_file_baru;
}




//fungsi menghapus data
function hapus($id)
{
    $conn = koneksi();

    //menghapus gambar di folder img
    $book = query("SELECT * FROM buku WHERE id = $id ");

    if ($book["foto"] != 'nophoto.jpg') {
        unlink('../assets/img/' . $book["foto"]);
    }

    mysqli_query($conn, "DELETE FROM buku WHERE id = $id") or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}

//fungsi untuk mengubah data di dalam database
function ubah($data)
{
    $conn = koneksi();

    $id = htmlspecialchars($data['id']);
    $nama_buku = htmlspecialchars($data['nama_buku']);
    $penulis = htmlspecialchars($data['penulis']);
    $penerbit = htmlspecialchars($data['penerbit']);
    $jumlah_halaman = htmlspecialchars($data['jumlah_halaman']);
    $isbn = htmlspecialchars($data['isbn']);
    $harga = htmlspecialchars($data['harga']);
    $tahun_terbit = htmlspecialchars($data['tahun_terbit']);
    $gambar_lama = htmlspecialchars($data['gambar_lama']);

    //cek apakah user pilih gambar baru atau tidak
    $foto = upload();
    if (!$foto) {
        return false;
        // $foto = $gambar_lama;
    }
    if ($foto == 'nophoto.jpg') {
        $foto = $gambar_lama;
    }

    $query = "UPDATE buku 
                SET 
                nama_buku = '$nama_buku',
                penulis = '$penulis',
                penerbit = '$penerbit',
                jumlah_halaman = '$jumlah_halaman',
                tahun_terbit = '$tahun_terbit',
                isbn = '$isbn',
                foto = '$foto',
                harga = '$harga'
                WHERE id = '$id'
                ";

    mysqli_query($conn, $query) or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}

function registrasi($data)
{
    $conn = koneksi();
    $username = strtolower(stripcslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);

    //cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username' ");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username sudah digunakan');
                </script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambah user baru
    $query_tambah = "INSERT INTO user VALUES ('','$username','$password')";
    mysqli_query($conn, $query_tambah);

    return mysqli_affected_rows($conn);
}

function cariIndeks($sql)
{
    $conn = koneksi();
    $result = mysqli_query($conn, "$sql");

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function pagination()
{
    $conn = koneksi();
    $result = mysqli_query($conn, "SELECT * FROM buku");
    $jumlahData = mysqli_num_rows($result);
    var_dump($jumlahData);
}

function jumlahCari($search)
{
    $query = "SELECT * FROM buku WHERE 
                nama_buku LIKE '%$search%' ";

    return query($query);
}


//fungsi untuk mencari data dengan limit
function cari($search, $awalData, $jumlahDataPerHalaman)
{
    $query = "SELECT * FROM buku WHERE nama_buku LIKE '%$search%' LIMIT $awalData, $jumlahDataPerHalaman";
    return query($query);
}

function cariAdmin($keyword)
{
    $conn = koneksi();

    $query = "SELECT * FROM buku WHERE
              nama_buku LIKE '%$keyword%' OR
              penulis LIKE '%$keyword%' OR
              penerbit LIKE '%$keyword%' OR
              jumlah_halaman LIKE '%$keyword%' OR
              tahun_terbit LIKE '%$keyword%' OR
              isbn LIKE '%$keyword%' OR
              harga LIKE '%$keyword%' ";

    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}
