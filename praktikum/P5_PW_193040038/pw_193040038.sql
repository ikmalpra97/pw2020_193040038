-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Apr 2020 pada 07.46
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw_193040038`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `nama_buku` varchar(50) DEFAULT NULL,
  `penulis` varchar(50) DEFAULT NULL,
  `penerbit` varchar(50) DEFAULT NULL,
  `jumlah_halaman` int(11) DEFAULT NULL,
  `tahun_terbit` int(11) DEFAULT NULL,
  `isbn` char(15) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `nama_buku`, `penulis`, `penerbit`, `jumlah_halaman`, `tahun_terbit`, `isbn`, `foto`, `harga`) VALUES
(1, 'Negeri 5 Menara', 'Ahmad Fuadi', 'Gramedia', 416, 2009, '9789792248616', 'negeri.jpg', 50000),
(2, 'Di Sudut Hati', 'Nenny Makmun', 'Rumah Oranye', 226, 2013, '9786021588024', 'sudut.jpg', 37500),
(3, 'Infinity', 'Mayang Aeni', 'Grasindo', 250, 2016, '9786023757657', 'infinity.jpeg', 70000),
(4, 'Lamia Gadis Yang Terluka', 'Navila', 'Navila', 193, 2010, '9789793065564', 'lamia.jpg', 40000),
(5, 'Jatuh Cinta Harus Pintar', 'Febriansyah Ramadhan', 'Dua Selaras', 188, 2019, '9786237211044', 'jatuh.jpg', 86000),
(6, 'Jika Kita Tak Pernah Jadi Apa-Apa', 'Alvi Syahrin', 'GagasMedia', 252, 2019, '9789797809485', 'tak.jpg', 88000),
(7, 'Ketika Perempuan Meninggalkan Laki-Laki', 'A\'yat Khalili', 'Bhumi Anoma', 160, 2019, '9789237211211', 'perempuan.jpg', 110000),
(8, 'Sebuah Seni Untuk Bersikap Bodo Amat', 'Mark Manson', 'Gramedia', 256, 2016, '9786024526986', 'sebuahseni.jpg', 67000),
(9, 'A Brief History Of Time', 'Stephen Hawking', 'Gramedia', 292, 2017, '9789792292121', 'time.jpg', 70000),
(10, 'AVIAPEDIA : Ensiklopedia Umum Penerbangan', 'Singgih Handoyo & Dudi Sudibyo', 'Kompas', 260, 2011, '9789797095475', 'pedia.png', 115000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nrp` char(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nrp`, `email`, `jurusan`, `gambar`) VALUES
(1, 'Ilham', '193040038', 'ilham@gmail.com', 'Teknik Informatika', 'ilham.jpg'),
(2, 'akmal', '193040001', 'akmal@gmail.com', 'Teknik Industri', 'akmal.jpg'),
(3, 'Rafi', '193010002', 'rafi@gmail.com', 'Teknik Mesin', 'rafi.jpg'),
(4, 'Pramudya', '193020003', 'pramudya@gmail.com', 'Teknologi Pangan', 'pramudya.jpg'),
(5, 'Siti', '193040004', 'siti@gmail.com', 'Teknik Informatika', 'siti.jpg'),
(6, 'Nurlaella', '193010005', 'nur@gmail.com', 'Teknik Mesin', 'nur.jpg'),
(7, 'Septian', '193020048', 'septian@gmail.com', 'Teknologi Pangan', 'septian.jpg'),
(8, 'Naufal', '193040010', 'naufal@gmail.com', 'Teknik Informatika', 'naufal.jpg'),
(9, 'Ahmad', '193040107', 'ahmad@gmail.com', 'Teknik Informatika', 'ahmad.jpg'),
(10, 'Fauzi', '193010107', 'fauzi@gmail.com', 'Teknik Mesin', 'fauzi.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
