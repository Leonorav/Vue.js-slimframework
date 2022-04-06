-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2020 at 12:24 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vita`
--

-- --------------------------------------------------------

--
-- Table structure for table `dairies_vita`
--

CREATE TABLE `dairies_vita` (
  `id_dairyVITA` int(11) NOT NULL,
  `product_dairyVITA` varchar(200) NOT NULL,
  `measurement_dairyVITA` varchar(100) NOT NULL,
  `realprice_dairyVITA` double NOT NULL,
  `discountedprice_dairyVITA` double NOT NULL,
  `bestbefore_dairyVITA` date NOT NULL,
  `fat_dairyVITA` varchar(10) NOT NULL,
  `calories_dairyVITA` varchar(10) NOT NULL,
  `market_dairyVITA` varchar(200) DEFAULT NULL,
  `city_dairyVITA` varchar(100) DEFAULT NULL,
  `packing_dairyVITA` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dairies_vita`
--

INSERT INTO `dairies_vita` (`id_dairyVITA`, `product_dairyVITA`, `measurement_dairyVITA`, `realprice_dairyVITA`, `discountedprice_dairyVITA`, `bestbefore_dairyVITA`, `fat_dairyVITA`, `calories_dairyVITA`, `market_dairyVITA`, `city_dairyVITA`, `packing_dairyVITA`) VALUES
(1, 'Qumesht', '1 liter', 0.89, 0.79, '2020-05-30', '0,5%', '435 KJ', 'Viva fresh store', 'Gjilan', '100'),
(2, 'Schmand', '180g', 0.53, 0.35, '2020-05-26', '12%', '569 KJ', 'Interex', 'Gjilan', '50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dairies_vita`
--
ALTER TABLE `dairies_vita`
  ADD PRIMARY KEY (`id_dairyVITA`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dairies_vita`
--
ALTER TABLE `dairies_vita`
  MODIFY `id_dairyVITA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
