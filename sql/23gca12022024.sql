-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2024 at 08:03 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `23gca`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agfa_checkin`
--

DROP TABLE IF EXISTS `tbl_agfa_checkin`;
CREATE TABLE `tbl_agfa_checkin` (
  `id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `checkin_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_agfa_checkin`
--

INSERT INTO `tbl_agfa_checkin` (`id`, `member_id`, `name`, `email`, `checkin_date`) VALUES
(2, 1, NULL, NULL, '2024-02-11 23:16:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gca_cpd`
--

DROP TABLE IF EXISTS `tbl_gca_cpd`;
CREATE TABLE `tbl_gca_cpd` (
  `id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `checkin_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gca_day1`
--

DROP TABLE IF EXISTS `tbl_gca_day1`;
CREATE TABLE `tbl_gca_day1` (
  `id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `checkin_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_gca_day1`
--

INSERT INTO `tbl_gca_day1` (`id`, `member_id`, `name`, `email`, `checkin_date`) VALUES
(1, 1, NULL, NULL, '2024-02-11 23:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gca_day2`
--

DROP TABLE IF EXISTS `tbl_gca_day2`;
CREATE TABLE `tbl_gca_day2` (
  `id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `checkin_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_gca_day2`
--

INSERT INTO `tbl_gca_day2` (`id`, `member_id`, `name`, `email`, `checkin_date`) VALUES
(1, 1, NULL, NULL, '2024-02-11 23:11:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_agfa_checkin`
--
ALTER TABLE `tbl_agfa_checkin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gca_cpd`
--
ALTER TABLE `tbl_gca_cpd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gca_day1`
--
ALTER TABLE `tbl_gca_day1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gca_day2`
--
ALTER TABLE `tbl_gca_day2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_agfa_checkin`
--
ALTER TABLE `tbl_agfa_checkin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_gca_cpd`
--
ALTER TABLE `tbl_gca_cpd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_gca_day1`
--
ALTER TABLE `tbl_gca_day1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_gca_day2`
--
ALTER TABLE `tbl_gca_day2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
