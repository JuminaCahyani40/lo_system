-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2024 at 02:52 PM
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
-- Database: `lubecar_system`
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
  `id` varchar(255) NOT NULL,
  `kec_oli` int(255) NOT NULL,
  `total_liter` float NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_alatsensor`
--

INSERT INTO `data_alatsensor` (`id`, `kec_oli`, `total_liter`, `created_at`) VALUES
('LO125', 1, 0, '2024-11-17'),
('SAE30', 1, 40000, '2024-11-17'),
('125-SAE30', 1, 2000, '2024-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `data_lube_oil`
--

CREATE TABLE `data_lube_oil` (
  `no` int(11) NOT NULL,
  `id_mobil` varchar(255) NOT NULL,
  `id_lube_oil` varchar(255) NOT NULL,
  `nama_lube_oil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_lube_oil`
--

INSERT INTO `data_lube_oil` (`no`, `id_mobil`, `id_lube_oil`, `nama_lube_oil`) VALUES
(3, 'LO125', '125-SAE30', 'LO125-SAE30'),
(4, 'LO125', '125-SAE85', 'LO125-SAE85'),
(5, 'LO125', '125-SAE15W-40', 'LO125-SAE15W-40'),
(6, 'LO125', '125-TURALIX46', 'LO125-TURALIX46'),
(7, 'LO193', '193-SAE30', 'LO193-SAE30'),
(8, 'LO193', '193-SAE85', 'LO193-SAE85'),
(9, 'LO193', '193-SAE15W-40', 'LO193-SAE15W-40'),
(10, 'LO193', '193-TURALIX46', 'LO193-TURALIX46'),
(11, 'LO201', '201-SAE30', 'LO201-SAE30'),
(12, 'LO201', '201-SAE85', 'LO201-SAE85'),
(13, 'LO201', '201-SAE15W-40', 'LO201-SAE15W-40'),
(14, 'LO201', '201-TURALIX46', 'LO201-TURALIX46');

-- --------------------------------------------------------

--
-- Table structure for table `data_mobil`
--

CREATE TABLE `data_mobil` (
  `no` int(255) NOT NULL,
  `id_mobil` varchar(255) NOT NULL,
  `nama_mobil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_mobil`
--

INSERT INTO `data_mobil` (`no`, `id_mobil`, `nama_mobil`) VALUES
(11, 'LO193', 'Car LO193'),
(12, 'LO125', 'Car LO125'),
(13, 'LO201', 'Car LO201');

-- --------------------------------------------------------

--
-- Table structure for table `data_pemakaian`
--

CREATE TABLE `data_pemakaian` (
  `no` int(255) NOT NULL,
  `id_lube_oil` varchar(255) NOT NULL,
  `nama_oli` varchar(255) NOT NULL,
  `bulan` varchar(255) NOT NULL,
  `liter_awal` float NOT NULL,
  `liter_akhir` float NOT NULL,
  `liter` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_pemakaian`
--

INSERT INTO `data_pemakaian` (`no`, `id_lube_oil`, `nama_oli`, `bulan`, `liter_awal`, `liter_akhir`, `liter`) VALUES
(1, 'SAE30', 'LO-SAE30', 'januari', 0, 4000, 4000),
(8, 'SAE30', 'LO-SAE30', 'Agustus', 4000, 40000, 36000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_lube_oil`
--
ALTER TABLE `data_lube_oil`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `data_mobil`
--
ALTER TABLE `data_mobil`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `data_pemakaian`
--
ALTER TABLE `data_pemakaian`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_lube_oil`
--
ALTER TABLE `data_lube_oil`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `data_mobil`
--
ALTER TABLE `data_mobil`
  MODIFY `no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `data_pemakaian`
--
ALTER TABLE `data_pemakaian`
  MODIFY `no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
