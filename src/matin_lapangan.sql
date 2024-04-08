-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 08, 2024 at 07:28 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matin_lapangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
);

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`) VALUES
(1, 'tes', '28b662d883b6d76fd96e4ddc5e9ba780');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int NOT NULL,
  `id_lapangan` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telepon` char(15) NOT NULL,
  `tanggal_transaksi` timestamp NOT NULL,
  `tanggal_sewa` date NOT NULL,
  `total_harga` int NOT NULL,
  `lama_sewa` int NOT NULL,
  `jam_sewa` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `tidak_bayar` tinyint(1) NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `id` int NOT NULL,
  `jenis_lapangan` varchar(50) NOT NULL,
  `tipe_lapangan` varchar(50) NOT NULL,
  `harga` int NOT NULL
);

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`id`, `jenis_lapangan`, `tipe_lapangan`, `harga`) VALUES
(1, 'Indoor', 'Reguler', 300000),
(2, 'Indoor', 'Matras', 250000),
(3, 'Indoor', 'Rumput', 200000),
(4, 'Outdoor', 'Reguler', 250000),
(5, 'Outdoor', 'Matras', 200000),
(6, 'Outdoor', 'Rumput', 150000),
(7, 'tes', 'tes', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id` int NOT NULL,
  `id_lapangan` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telepon` char(15) NOT NULL,
  `tanggal_transaksi` timestamp NOT NULL,
  `tanggal_sewa` date NOT NULL,
  `total_harga` int NOT NULL,
  `lama_sewa` int NOT NULL,
  `jam_sewa` time NOT NULL,
  `jam_selesai` time NOT NULL
);

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id`, `id_lapangan`, `nama`, `telepon`, `tanggal_transaksi`, `tanggal_sewa`, `total_harga`, `lama_sewa`, `jam_sewa`, `jam_selesai`) VALUES
(1, 1, 'tes', '089767', '2024-04-02 17:00:00', '2024-04-30', 600000, 0, '00:00:00', '02:00:00'),
(2, 1, 'wikwok', '0976', '2024-04-02 17:00:00', '2024-02-21', 600000, 0, '00:00:00', '02:00:00'),
(3, 1, 'bang', '09876', '2024-04-02 17:00:00', '2024-09-21', 600000, 0, '00:00:00', '02:00:00'),
(4, 1, 'tes', '09876', '2024-04-02 17:00:00', '2024-08-21', 600000, 0, '00:00:00', '02:00:00'),
(5, 1, 'awikwok', '98765', '2024-04-02 17:00:00', '2024-04-30', 600000, 0, '00:00:00', '02:00:00'),
(6, 1, 'awikwok', '9876', '2024-04-03 11:48:14', '2024-04-29', 600000, 0, '00:00:00', '02:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lapangan` (`id_lapangan`);

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lapangan` (`id_lapangan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_lapangan`) REFERENCES `lapangan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD CONSTRAINT `riwayat_ibfk_1` FOREIGN KEY (`id_lapangan`) REFERENCES `lapangan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
