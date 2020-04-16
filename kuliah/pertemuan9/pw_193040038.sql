-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Apr 2020 pada 17.41
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
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
