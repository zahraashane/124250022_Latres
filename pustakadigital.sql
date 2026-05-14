-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2026 at 10:00 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pustakadigital`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `kode_buku` varchar(20) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `pengarang` varchar(255) DEFAULT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `kode_buku`, `judul`, `pengarang`, `kategori`, `stok`) VALUES
(1, 'BK001', 'Bungo Stray Dogs', 'Asagiri Kafka', 'Fiksi', 9),
(2, 'BK002', 'Fisika Dasar', 'Halliday & Resnick', 'Sains', 5),
(3, 'BK003', 'The Magic of Reality', 'Richard Dawkins.', 'Sains', 2),
(4, 'BK004', 'Algoritma dan Struktur Data', 'Sukamto', 'Teknologi', 12),
(5, 'BK005', 'And Then There Were None', 'Agatha Christie', 'Fiksi', 1),
(6, 'BK006', 'Masquerade Hotel', 'Keigo Higashino', 'Fiksi', 2),
(7, 'BK007', 'No Longer Human', 'Dazai Osamu', 'Fiksi', 0),
(8, 'BK008', 'Astrophysics for People in a Hurry', 'Neil deGrasse Tyson', 'Sains', 6);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `kode_peminjaman` varchar(20) DEFAULT NULL,
  `nama_peminjam` varchar(100) DEFAULT NULL,
  `judul_buku` varchar(255) DEFAULT NULL,
  `tanggal_peminjaman` date DEFAULT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `kode_peminjaman`, `nama_peminjam`, `judul_buku`, `tanggal_peminjaman`, `tanggal_pengembalian`, `status`) VALUES
(1, 'PJ001', 'Hanif', 'Algoritma dan Struktur Data', '2026-05-14', '2026-05-21', 'Dikembalikan'),
(2, 'PJ002', 'Arjuna', 'Astrophysics for People in a Hurry', '2026-05-15', '2026-05-16', 'Dikembalikan'),
(3, 'PJ003', 'Alaika', 'Fisika Dasar', '2026-05-15', '2026-05-23', 'Dipinjam'),
(4, 'PJ004', 'Harris', 'Masquerade Hotel', '2026-05-17', '2026-05-21', 'Dipinjam'),
(5, 'PJ005', 'Zahra', 'Bungo Stray Dogs', '2026-05-18', '2026-05-19', 'Dikembalikan'),
(6, 'PJ006', 'Shaleeha', 'Algoritma dan Struktur Data', '2026-05-20', '2026-05-28', 'Dipinjam'),
(7, 'PJ007', 'Sena', 'The Magic of Reality', '2026-05-20', '2026-05-25', 'Dikembalikan'),
(9, 'PJ008', 'Nazwa', 'Fisika Dasar', '2026-05-21', '2026-05-22', 'Dipinjam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_buku` (`kode_buku`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_peminjaman` (`kode_peminjaman`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
