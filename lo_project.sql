-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2024 at 03:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lo_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_lo`
--

CREATE TABLE `admin_lo` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_lo`
--

INSERT INTO `admin_lo` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `data_alatsensor`
--

CREATE TABLE `data_alatsensor` (
  `id` int(255) NOT NULL,
  `kec_oli` int(255) NOT NULL,
  `total_liter` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_alatsensor`
--

INSERT INTO `data_alatsensor` (`id`, `kec_oli`, `total_liter`) VALUES
(19, 1, 1000),
(20, 0, 1400),
(21, 1, 2000),
(19, 0, 800);

-- --------------------------------------------------------

--
-- Table structure for table `data_lube_oil`
--

CREATE TABLE `data_lube_oil` (
  `id` varchar(255) NOT NULL,
  `id_mobil` int(255) NOT NULL,
  `nama_oli` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_lube_oil`
--

INSERT INTO `data_lube_oil` (`id`, `id_mobil`, `nama_oli`) VALUES
('Q1002', 1003, 'Tes nama oli'),
('H1003', 1005, 'Lube Oil 123'),
('Q1002', 1, 'tes oli'),
('H100378', 3, 'Lube Oil 123');

-- --------------------------------------------------------

--
-- Table structure for table `data_lube_oil2`
--

CREATE TABLE `data_lube_oil2` (
  `id` int(255) NOT NULL,
  `id_mobil` int(255) NOT NULL,
  `id_lube_oil` varchar(255) NOT NULL,
  `nama_lube_oil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_lube_oil2`
--

INSERT INTO `data_lube_oil2` (`id`, `id_mobil`, `id_lube_oil`, `nama_lube_oil`) VALUES
(19, 8, 'SAE30', 'SAE30'),
(20, 8, 'SAE85', 'SAE85'),
(21, 9, 'SAE30', 'SAE30');

-- --------------------------------------------------------

--
-- Table structure for table `data_mobil`
--

CREATE TABLE `data_mobil` (
  `id` varchar(255) NOT NULL,
  `nama_mobil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_mobil`
--

INSERT INTO `data_mobil` (`id`, `nama_mobil`) VALUES
('1001', 'Mobil A'),
('1002', 'Mobil B'),
('1003', 'Mobil 3'),
('', ''),
('1005', 'Mobil 5');

-- --------------------------------------------------------

--
-- Table structure for table `data_mobil2`
--

CREATE TABLE `data_mobil2` (
  `id` int(255) NOT NULL,
  `id_mobil` varchar(255) NOT NULL,
  `nama_mobil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_mobil2`
--

INSERT INTO `data_mobil2` (`id`, `id_mobil`, `nama_mobil`) VALUES
(8, 'LO201', 'LO201'),
(9, 'LO125', 'LO125');

-- --------------------------------------------------------

--
-- Table structure for table `data_pemakaian`
--

CREATE TABLE `data_pemakaian` (
  `no` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `nama_oli` varchar(255) NOT NULL,
  `bulan` varchar(255) NOT NULL,
  `liter_awal` float NOT NULL,
  `liter_akhir` float NOT NULL,
  `liter` float NOT NULL,
  `total_harga` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_lube_oil2`
--
ALTER TABLE `data_lube_oil2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_constraint` (`id_mobil`);

--
-- Indexes for table `data_mobil2`
--
ALTER TABLE `data_mobil2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_lube_oil2`
--
ALTER TABLE `data_lube_oil2`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `data_mobil2`
--
ALTER TABLE `data_mobil2`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_lube_oil2`
--
ALTER TABLE `data_lube_oil2`
  ADD CONSTRAINT `car_constraint` FOREIGN KEY (`id_mobil`) REFERENCES `data_mobil2` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
