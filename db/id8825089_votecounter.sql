-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 26, 2019 at 11:30 PM
-- Server version: 10.3.13-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id8825089_votecounter`
--

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `state` varchar(11) NOT NULL,
  `apc` int(11) NOT NULL,
  `pdp` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `state`, `apc`, `pdp`) VALUES
(1, 'Osun', 347634, 337377),
(2, 'Ekiti', 219231, 154032),
(3, 'Abuja', 152224, 259997),
(4, 'Kwara', 308984, 138184),
(5, 'Nassarawa', 289903, 283847),
(6, 'Kogi', 285894, 218207),
(7, 'Gombe', 402961, 138484),
(8, 'Ondo', 241769, 275901),
(9, 'Abia', 85058, 219698),
(10, 'Yobe', 497914, 50763),
(11, 'Enugu', 54423, 355553),
(12, 'Ebonyi', 90726, 258573),
(13, 'Niger', 612371, 218052),
(14, 'Jigawa', 794738, 289895),
(15, 'Kaduna', 993445, 649612),
(16, 'Anambra', 33298, 524738),
(17, 'Oyo', 365229, 366690),
(18, 'Adamawa', 378078, 410266),
(19, 'Bauchi', 798428, 209313),
(20, 'Lagos', 580825, 448015),
(21, 'Ogun', 281762, 194655),
(22, 'Edo', 267842, 275691),
(23, 'Benue', 347668, 356817),
(24, 'Imo', 140463, 334923),
(25, 'Plateau', 468555, 548665),
(26, 'Kano', 1464768, 391593),
(27, 'Katsina', 1232133, 308056),
(28, 'Taraba', 324906, 374743),
(29, 'Cross River', 117302, 295737),
(30, 'Akwa Ibom', 175429, 395832),
(31, 'Borno', 836496, 71788),
(32, 'Delta', 221292, 594068),
(33, 'Bayelsa', 118821, 197933),
(34, 'Sokoto', 490333, 361604),
(35, 'Kebbi', 581552, 154282),
(36, 'Zamfara', 438682, 125423),
(37, 'Rivers', 150710, 473971);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
