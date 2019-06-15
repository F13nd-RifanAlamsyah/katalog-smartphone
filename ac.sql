-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2019 at 08:45 PM
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
  `role` enum('admin','user') NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `nama_akun`, `email_akun`, `password`, `role`, `gambar`) VALUES
(1, 'Rifan Alamsyah', 'rifan.alamsyah02@gmail.com', '$2y$10$RQKR3s33p2xrm1i0IBoKue3ATpdRYNV7ldVV93kmHO1q6iWzI4ujC', 'admin', '1.jpg'),
(2, 'user', 'user@ac.com', '123', 'user', ''),
(3, 'sinta dianti', 'sintaa@ac.com', '$2y$10$qTsKRCWNbxa.8BnYtJbiRucYrswRpr/0L.bqXj/iS6YtgoZ28FXzi', 'user', ''),
(5, 'kaka', 'kaka@ac.com', '$2y$10$.9JL01dRKUnNm8u.4J/lSeOhxAZpZpT.9xhemlL9/FswhuXq.YSzu', 'user', 'img_5cf0ee0051945.jpg'),
(7, 'sinta dianti', '1606009@sttgarut.ac.id', '$2y$10$p3xZPoEHonua3D.od9wYFu1fOG7FR6D2AQgRm38.B1vNg4QtMugym', 'admin', ''),
(8, 'dinaa', 'dina@ac.com', '$2y$10$/sbnXjQuuChgOtRwfWC3tezuM6J4ibFoEEt0HdY2j54eiFwRO//NS', 'user', 'img_5d01c38394a9c.jpg');

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
(1, 'Samsung', 'Samsung galaxy m20', 1900000, 'smartphone untuk anak muda', '6', '1080x1920', '7.0 Nougat', 'snapdragon 636', 'oktacore 2 ghz', 'adreno 560', 3, 64, '5', '13', '4000', 'img_5cea24d1e9d3c.jpg', 5),
(2, 'Xiaomi', 'Xiaomi Redmi Note 4x', 1900000, 'smartphone', '5,5', '3000', '7.1 Nougat', 'Snapdragon 625', 'octa core 2ghz', 'adreno 560', 3, 32, '5 Mp', '13 Mp', '4100', 'a.jpg', 100),
(3, 'Oppo', 'Oppo find x', 6000000, 'baik', '6.4', '1080x1920', '6.0 Marsmallow', 'Mediatek', 'octa core 2ghz', 'adreno 560', 4, 128, '5', '21', '30000', 'd.jpg', 5),
(5, 'Samsung', 'Samsung galaxy note 10', 1200000, 'bagus', '7.0', '1444x2640', '9.0 Pie', 'Snapdragon 855', 'Oktacore 2.4 ghz', 'adreno 600', 8, 256, '13', '21', '5000', 'img_5cecdb9036ef2.jpg', 4),
(6, 'Lava', 'Lava iris 505', 999000, 'ini adalah hp lava', '3.5', '480x800', 'android', 'mediatek', 'dualcore 5 ghz', 'adreno 400', 1, 2, '2', '1', '3000', 'img_5d01c3169ecf0.jpg', -1);

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `nomor_rekening` varchar(35) NOT NULL,
  `atas_nama` varchar(255) NOT NULL,
  `no_telepon` varchar(25) NOT NULL,
  `whatsapp` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `instagram_link` varchar(1000) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `facebook_link` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `logo`, `nomor_rekening`, `atas_nama`, `no_telepon`, `whatsapp`, `email`, `instagram`, `instagram_link`, `facebook`, `facebook_link`) VALUES
(1, 'Agung Cellular', 'img_5d03b67a54e9f.png', '10231234', 'Rifan Alamsyah', '0899999999', '0899999999', 'rifan.alamsyah02@gmail.com', '@agung_cell', 'instagram.com/agung_cell', 'agung cell', 'facebook.com/agung_cell');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `status` enum('pending','kirim','tolak','sampai','selesai','dibayar') NOT NULL,
  `bukti_bayar` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `resi` varchar(255) NOT NULL,
  `review` varchar(1000) NOT NULL,
  `alasan_tolak` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_akun`, `id_produk`, `status`, `bukti_bayar`, `no_telp`, `alamat`, `resi`, `review`, `alasan_tolak`) VALUES
(1, 2, 2, 'selesai', 'img.jpg', '8989', 'sadang', '9786564', 'yhvjn', 'vhjvn'),
(2, 3, 1, 'selesai', 'img_5cfbacaf471da.jpg', '8988888', 'kp sadang', '92929291jsn', 'dadah', ''),
(3, 3, 3, 'tolak', '', '0', '', '', '', 'barang jelek'),
(7, 3, 5, 'kirim', 'img_5cfd264b9bfad.png', '089699922923', 'Kp Sadang Rt 04/02 Sucinaraja Garut/Rt ibu enung dekat kebon awi warung seblak', '1111111111111111', '', ''),
(8, 3, 2, 'tolak', '', '0', '', '', '', 'barang kemahalan uang saya tidak cukup\r\n'),
(9, 3, 2, 'tolak', 'img_5cfe033cea058.jpg', '8999369197988', 'sadang', '', '', 'Admin : pembatalan dari pihak admin'),
(10, 3, 5, 'tolak', '', '', '', '', '', 'barangna mahal\r\n'),
(11, 8, 6, 'selesai', 'img_5d01c3bb414a3.jpg', '089999999', 'sukapadang', '123sq', 'bgus bagus', ''),
(12, 3, 1, 'tolak', '', '', '', '', '', 'Admin : aaa'),
(14, 3, 6, 'kirim', '', '', '', '123', '', ''),
(15, 8, 2, 'tolak', 'img_5d04eda961f22.jpg', '08988888', '123', '', '', 'Admin : bayaran kurang nanti ada refund'),
(16, 8, 5, 'sampai', 'img_5d04eda961f22.jpg', '821111092', 'sadang', '123jnt', '', ''),
(17, 8, 2, 'dibayar', 'img_5d0530915b873.jpg', '0262222', 'hasdasd', '', '', ''),
(18, 8, 3, 'dibayar', 'img_5d04f325170ea.png', '082121212', 'sukamenak', '', '', ''),
(19, 3, 1, 'tolak', '', '', '', '', '', 'asas'),
(20, 3, 1, 'tolak', '', '', '', '', '', 'aaaa'),
(21, 3, 1, 'tolak', '', '', '', '', '', 'ls'),
(22, 3, 2, 'tolak', '', '', '', '', '', 'ass'),
(23, 3, 5, 'pending', '', '', '', '', '', ''),
(24, 8, 2, 'pending', '', '', '', '', '', ''),
(25, 8, 3, 'pending', '', '', '', '', '', '');

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
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

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
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
