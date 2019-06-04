-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2019 at 04:21 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ac`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nama_akun` varchar(255) NOT NULL,
  `email_akun` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(8) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` int(12) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL,
  `layar` varchar(255) NOT NULL,
  `resolusi_layar` varchar(255) NOT NULL,
  `os` varchar(255) NOT NULL,
  `chipset` varchar(255) NOT NULL,
  `cpu` varchar(255) NOT NULL,
  `gpu` varchar(255) NOT NULL,
  `ram` int(11) NOT NULL,
  `internal` int(11) NOT NULL,
  `fcamera` varchar(200) NOT NULL,
  `mcamera` varchar(200) NOT NULL,
  `baterai` varchar(10) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `merk`, `nama_produk`, `harga`, `deskripsi`, `layar`, `resolusi_layar`, `os`, `chipset`, `cpu`, `gpu`, `ram`, `internal`, `fcamera`, `mcamera`, `baterai`, `gambar`, `stok`) VALUES
(1, 'Samsung', 'Samsung galaxy m20', 1900000, 'smartphone untuk anak muda', '6', '1080x1920', '7.0 Nougat', 'snapdragon 636', 'oktacore 2 ghz', 'adreno 560', 3, 64, '5', '13', '4000', 'img_5cea24d1e9d3c.jpg', 0),
(2, 'Xiaomi', 'Xiaomi Redmi Note 4x', 1900000, 'smartphone', '5,5', '3000', '7.1 Nougat', 'Snapdragon 625', 'octa core 2ghz', 'adreno 560', 3, 32, '5 Mp', '13 Mp', '4100', 'a.jpg', 0),
(3, 'Oppo', 'Oppo find x', 6000000, 'baik', '6.4', '1080x1920', '6.0 Marsmallow', 'Mediatek', 'octa core 2ghz', 'adreno 560', 4, 128, '5', '21', '30000', 'd.jpg', 0),
(5, 'Samsung', 'Samsung galaxy note 10', 1200000, 'bagus', '7.0', '1444x2640', '9.0 Pie', 'Snapdragon 855', 'Oktacore 2.4 ghz', 'adreno 600', 8, 256, '13', '21', '5000', 'img_5cea2eb947142.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `status` enum('pending','accept','reject') NOT NULL,
  `no_telp` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `resi` int(255) NOT NULL,
  `bukti_bayar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_akun` (`id_akun`),
  ADD KEY `id_produk` (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
