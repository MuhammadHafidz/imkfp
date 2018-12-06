-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2018 at 01:07 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kemah`
--

-- --------------------------------------------------------

--
-- Table structure for table `destinasi`
--

CREATE TABLE `destinasi` (
  `ID_DESTINASI` int(11) NOT NULL,
  `NAMA` varchar(1024) DEFAULT NULL,
  `DESKRIPSI` varchar(1024) DEFAULT NULL,
  `HARGA` int(11) DEFAULT NULL,
  `LOKASI` varchar(1024) DEFAULT NULL,
  `ALAMAT` varchar(1024) DEFAULT NULL,
  `KOTA` varchar(1024) DEFAULT NULL,
  `PROVINSI` varchar(1024) DEFAULT NULL,
  `GAMBAR` varchar(1024) DEFAULT NULL,
  `TANGGAL` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `RATE` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `destinasi`
--

INSERT INTO `destinasi` (`ID_DESTINASI`, `NAMA`, `DESKRIPSI`, `HARGA`, `LOKASI`, `ALAMAT`, `KOTA`, `PROVINSI`, `GAMBAR`, `TANGGAL`, `RATE`) VALUES
(4, 'Ranu Kumbolo', NULL, 100000, 'Gunung', NULL, 'Tulung Agung', 'Jawa Timur', 'ranu', '2018-12-06 05:03:41', 4.6),
(5, 'Kondang Merak', 'Pantai Selatan Malang yang indah', 99000, 'Pantai', 'Pantai selatan ', 'Malang', 'Jawa Timur', 'kondang-merak', '2018-12-06 05:07:20', 4),
(6, 'Bale Kambang', 'Pantai Selatan malang dengan sebutan Kuta-nya Malang', 112000, 'Pantai', 'Pantai selatan malang', 'Malang', 'Jawa Timur', 'bale', '2018-12-06 05:07:20', 5),
(7, 'Gunung Kelud', NULL, 10000, 'Gunung', NULL, 'Kediri', 'Jawa Timur', 'kelud', '2018-12-06 05:09:48', 3.9),
(8, 'Mandala Wangi', 'Tempatnya indah, lingkunganya bersahabat, dan lebih cocok lagi tempat ini dapat digunakan untuk camping keluarga.', 27500, 'Bumi Perkemahan', NULL, 'Tangerang', 'Banten', 'mandalawangi', '2018-12-06 05:13:34', 4.6),
(9, 'Gunung Papandayan', 'Bogor punya Cerita', 40000, 'Gunung', NULL, 'Bogor', 'Jawa Barat', 'papandayan.jpg', '2018-12-06 05:15:26', 4);

-- --------------------------------------------------------

--
-- Table structure for table `perlengkapan`
--

CREATE TABLE `perlengkapan` (
  `ID_PERLENGKAPAN` int(11) NOT NULL,
  `NAMA_PERLENGKAPAN` varchar(1024) DEFAULT NULL,
  `HARGA` decimal(11,0) DEFAULT NULL,
  `GAMBAR` varchar(1024) DEFAULT NULL,
  `DESKRIPSI` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perlengkapan`
--

INSERT INTO `perlengkapan` (`ID_PERLENGKAPAN`, `NAMA_PERLENGKAPAN`, `HARGA`, `GAMBAR`, `DESKRIPSI`) VALUES
(4, 'Tenda', '20000', 'tenda-camping-1', 'Muat 10 orang'),
(5, 'Barak', '99000', 'tenda-peleton', NULL),
(6, 'Tenda Lucu', '15000', 'tenda-camping-4', 'Kapasitas 5 orang'),
(7, 'Kamera', '30000', 'kamera1', 'Canon Eos 77D'),
(8, 'Carrier Consina', '30000', 'tas-75-liter', '75 Liter'),
(9, 'Matras', '10000', 'matras', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(1024) NOT NULL,
  `password` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('admin', 'admin\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`ID_DESTINASI`),
  ADD UNIQUE KEY `DESTINASI_PK` (`ID_DESTINASI`);

--
-- Indexes for table `perlengkapan`
--
ALTER TABLE `perlengkapan`
  ADD PRIMARY KEY (`ID_PERLENGKAPAN`),
  ADD UNIQUE KEY `PERLENGKAPAN_PK` (`ID_PERLENGKAPAN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `destinasi`
--
ALTER TABLE `destinasi`
  MODIFY `ID_DESTINASI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `perlengkapan`
--
ALTER TABLE `perlengkapan`
  MODIFY `ID_PERLENGKAPAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
