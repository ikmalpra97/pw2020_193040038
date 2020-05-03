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
    $foto = htmlspecialchars($data['foto']);
    $harga = htmlspecialchars($data['harga']);
    $tahun_terbit = htmlspecialchars($data['tahun_terbit']);

    $query = "INSERT INTO buku 
                    VALUES 
                    ('','$nama_buku','$penulis','$penerbit','$jumlah_halaman','$tahun_terbit','$isbn','$foto','$harga')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//fungsi menghapus data
function hapus($id)
{
    $conn = koneksi();
    mysqli_query($conn, "DELETE FROM buku WHERE id = $id");

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
    $foto = htmlspecialchars($data['foto']);
    $harga = htmlspecialchars($data['harga']);
    $tahun_terbit = htmlspecialchars($data['tahun_terbit']);

    $query = "UPDATE buku 
                SET 
                nama_buku = '$nama_buku',
                penulis = '$penulis',
                penerbit = '$penerbit',
                jumlah_halaman = '$jumlah_halaman',
                tahun_terbit = '$tahun_terbit',
                isbn = '$isbn',
                foto = '$foto',
                harga = '$harga',
                WHERE id = '$id'
                ";

    mysqli_query($conn, $query);

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
