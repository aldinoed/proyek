-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jun 2023 pada 18.03
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(255) NOT NULL,
  `image_barang` blob NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tersedia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `image_barang`, `nama_barang`, `jumlah`, `tersedia`) VALUES
('5946433f-0156-11ee-826e-005056c00001', 0x2e2e2f75706c6f6164732f646f776e6c6f61642e6a7067, 'Speaker', 22, 22),
('7b7e0104-004d-11ee-9f39-005056c00001', 0x4172726179, 'Penggaris', 20, 19),
('a2f96cc0-0086-11ee-a19c-005056c00001', 0x2e2e2f75706c6f6164732f4d6163426f6f6b5f50726f5f31355f696e63685f2832303137295f546f7563685f4261722e6a7067, 'Laptop Macbook', 27, 22),
('fcc9b68f-0045-11ee-9f39-005056c00001', 0x33626536623037622d363234342d343662652d623165372d6163356265393334636238352e6a7067, 'Kalkulator', 12, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id_peminjaman` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `tanggal_peminjaman` date DEFAULT NULL,
  `status_diambil` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id_peminjaman`, `id_user`, `id_barang`, `quantity`, `tanggal_pengembalian`, `status`, `tanggal_peminjaman`, `status_diambil`) VALUES
('334227558', '3122500058', 'a2f96cc0-0086-11ee-a19c-005056c00001', 3, '2023-06-04', 'Approved', '2023-06-03', 'picked'),
('1654206534', '3122500057', 'a2f96cc0-0086-11ee-a19c-005056c00001', 2, '2023-06-26', 'Approved', '2023-06-19', 'picked'),
('1654206534', '3122500057', '7b7e0104-004d-11ee-9f39-005056c00001', 1, '2023-06-26', 'Approved', '2023-06-19', 'picked'),
('1842896076', '3122500060', 'a2f96cc0-0086-11ee-a19c-005056c00001', 1, '2023-06-29', 'Waiting', '2023-06-22', 'belum'),
('1842896076', '3122500060', '7b7e0104-004d-11ee-9f39-005056c00001', 2, '2023-06-29', 'Waiting', '2023-06-22', 'belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(255) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telepon` bigint(20) NOT NULL,
  `user_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `telepon`, `user_role`) VALUES
('11', 'Admin', 'admin', 'd338b3f0f405eb5e51c8cc1e5ca66f02', 628121831982789, 'Admin'),
('3122500057', 'Aldino Erlangga Desiariyanto', 'aldinoed', 'ed4ebef242780abac25e0acea8160f71', 6283811051466, 'Mahasiswa'),
('3122500058', 'Surya Tegar Prasetya', 'surya', 'aff8fbcbf1363cd7edc85a1e11391173', 62831283729829, 'Mahasiswa'),
('3122500060', 'Aaron Febrian Prakoso', 'aaron', '449a36b6689d841d7d27f31b4b7cc73a', 6281213786722, 'Mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD KEY `uKey` (`id_user`),
  ADD KEY `bKey` (`id_barang`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD CONSTRAINT `bKey` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `uKey` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
