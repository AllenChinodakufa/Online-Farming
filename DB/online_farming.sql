-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2021 at 06:07 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_farming`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_animals`
--

CREATE TABLE `tbl_animals` (
  `ANIMAL_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `NAME` varchar(50) DEFAULT NULL,
  `DATE_BORN` varchar(12) DEFAULT NULL,
  `WEIGHT` varchar(12) DEFAULT NULL,
  `DATE_CREATED` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_crops`
--

CREATE TABLE `tbl_crops` (
  `CROP_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `NAME` varchar(50) DEFAULT NULL,
  `DIMENSIONS` varchar(12) DEFAULT NULL,
  `CATEGORY` varchar(12) DEFAULT NULL,
  `DATE_CREATED` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inventory`
--

CREATE TABLE `tbl_inventory` (
  `STOCK_ID` int(11) NOT NULL,
  `USER_ID` int(11) DEFAULT NULL,
  `ITEM` varchar(50) DEFAULT NULL,
  `CATEGORY` varchar(12) DEFAULT NULL,
  `COST` varchar(12) DEFAULT NULL,
  `TYPE` varchar(50) DEFAULT NULL,
  `DATE_CREATED` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `TBL_ID` int(11) NOT NULL,
  `USER_ID` int(11) DEFAULT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` text DEFAULT NULL,
  `ACCOUNT_TYPE` varchar(12) DEFAULT NULL,
  `DATE_CREATED` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`TBL_ID`, `USER_ID`, `USERNAME`, `PASSWORD`, `ACCOUNT_TYPE`, `DATE_CREATED`) VALUES
(5, 1625929660, 'Allen Chinodakufa', 'e8b2e911f7e2bf257728260b4b6f7b47', 'basic', 1625929660);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_animals`
--
ALTER TABLE `tbl_animals`
  ADD PRIMARY KEY (`ANIMAL_ID`);

--
-- Indexes for table `tbl_crops`
--
ALTER TABLE `tbl_crops`
  ADD PRIMARY KEY (`CROP_ID`);

--
-- Indexes for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  ADD PRIMARY KEY (`STOCK_ID`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`TBL_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_animals`
--
ALTER TABLE `tbl_animals`
  MODIFY `ANIMAL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_crops`
--
ALTER TABLE `tbl_crops`
  MODIFY `CROP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  MODIFY `STOCK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `TBL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
