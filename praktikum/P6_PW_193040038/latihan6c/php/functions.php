<?php
//function untuk melakukan koneksi ke database
function koneksi()
{
    $conn = mysqli_connect("localhost", "root", "") or die("koneksi ke DB gagal");
    mysqli_select_db($conn, "pw_193040038") or die("Database salah!");

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
