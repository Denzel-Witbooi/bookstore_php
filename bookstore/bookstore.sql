-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2022 at 11:26 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--
CREATE DATABASE IF NOT EXISTS `bookstore` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bookstore`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--
-- Creation: Jul 02, 2022 at 01:42 PM
-- Last update: Jul 03, 2022 at 09:22 PM
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--
-- Creation: Jul 02, 2022 at 01:45 PM
-- Last update: Jul 03, 2022 at 09:17 PM
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(11, 5, 'Jane', 'jane@mail.com', '0923456678', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--
-- Creation: Jul 02, 2022 at 05:41 PM
-- Last update: Jul 03, 2022 at 08:53 PM
--

DROP TABLE IF EXISTS `tbladmin`;
CREATE TABLE `tbladmin` (
  `admin_id` int(100) NOT NULL,
  `admin_firstname` varchar(255) DEFAULT NULL,
  `admin_lastname` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_role` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`admin_id`, `admin_firstname`, `admin_lastname`, `username`, `admin_email`, `admin_password`, `admin_role`) VALUES
(1, '', '', 'admin', 'admin@mail.com', '696d29e0940a4957748fe3fc9efd22a3', 'admin'),
(2, NULL, NULL, 'janedoe', 'jane@mail.com', 'e10adc3949ba59abbe56e057f20f883e', 'pending'),
(3, NULL, NULL, 'name', 'name@mail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tblbook`
--
-- Creation: Jul 02, 2022 at 01:46 PM
-- Last update: Jul 03, 2022 at 08:41 PM
--

DROP TABLE IF EXISTS `tblbook`;
CREATE TABLE `tblbook` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbook`
--

INSERT INTO `tblbook` (`id`, `name`, `price`, `image`) VALUES
(8, 'nightshade', 1200, 'nightshade.jpg'),
(9, 'clever lands', 12000, 'clever_lands.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--
-- Creation: Jul 02, 2022 at 01:50 PM
--

DROP TABLE IF EXISTS `tblorder`;
CREATE TABLE `tblorder` (
  `order_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--
-- Creation: Jul 02, 2022 at 01:07 PM
-- Last update: Jul 03, 2022 at 08:52 PM
--

DROP TABLE IF EXISTS `tbluser`;
CREATE TABLE `tbluser` (
  `user_id` int(100) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `studentnumber` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL DEFAULT 'pending',
  `user_password` varchar(255) NOT NULL,
  `user_status` varchar(255) NOT NULL DEFAULT 'unverified'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`user_id`, `user_firstname`, `studentnumber`, `username`, `user_role`, `user_password`, `user_status`) VALUES
(5, '', 'ST101@mail.com', 'Jane', 'student', '5f4dcc3b5aa765d61d8327deb882cf99', 'verified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tblbook`
--
ALTER TABLE `tblbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblbook`
--
ALTER TABLE `tblbook`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
