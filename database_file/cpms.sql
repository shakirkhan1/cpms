-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2019 at 01:28 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpms`
--

-- --------------------------------------------------------

--
-- Table structure for table `check_space`
--

CREATE TABLE `check_space` (
  `v_id` int(11) NOT NULL,
  `park_date` date NOT NULL,
  `park_in` time NOT NULL,
  `park_space_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `check_space`
--

INSERT INTO `check_space` (`v_id`, `park_date`, `park_in`, `park_space_id`) VALUES
(47, '2019-01-09', '02:56:00', 3),
(49, '2019-01-10', '02:57:00', 5),
(50, '2019-01-12', '02:56:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user_id`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `park_space`
--

CREATE TABLE `park_space` (
  `park_space_id` int(255) NOT NULL,
  `slot_id` int(255) NOT NULL,
  `availability` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `park_space`
--

INSERT INTO `park_space` (`park_space_id`, `slot_id`, `availability`) VALUES
(1, 1, 0),
(2, 2, 1),
(3, 3, 0),
(4, 4, 1),
(5, 5, 0),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 12, 1),
(13, 13, 1),
(14, 14, 1),
(15, 15, 1),
(16, 16, 1),
(17, 17, 1),
(18, 18, 1),
(19, 19, 1),
(20, 20, 1),
(21, 21, 1),
(22, 22, 1),
(23, 23, 1),
(24, 24, 1),
(25, 25, 1),
(26, 26, 1),
(27, 27, 1),
(28, 28, 1),
(29, 29, 1),
(30, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `total_space`
--

CREATE TABLE `total_space` (
  `total_available` int(10) NOT NULL,
  `total_reserved` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `total_space`
--

INSERT INTO `total_space` (`total_available`, `total_reserved`) VALUES
(27, 3);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_details`
--

CREATE TABLE `vehicle_details` (
  `id` int(11) NOT NULL,
  `vehicle_model` varchar(100) NOT NULL,
  `vehicle_no` varchar(100) NOT NULL,
  `wheeler_type` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile_no` varchar(100) NOT NULL,
  `slot_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_details`
--

INSERT INTO `vehicle_details` (`id`, `vehicle_model`, `vehicle_no`, `wheeler_type`, `name`, `mobile_no`, `slot_id`) VALUES
(35, 'asds', '321', '12', 'sassak', '2389786756', 47),
(37, 'asds', '321', 'qwe', 'rehana khan', '2289786756', 49),
(38, 'asds', '1223', '2', 'sassak', '9089786756', 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `check_space`
--
ALTER TABLE `check_space`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `park_space`
--
ALTER TABLE `park_space`
  ADD PRIMARY KEY (`park_space_id`);

--
-- Indexes for table `total_space`
--
ALTER TABLE `total_space`
  ADD PRIMARY KEY (`total_available`);

--
-- Indexes for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `check_space`
--
ALTER TABLE `check_space`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `park_space`
--
ALTER TABLE `park_space`
  MODIFY `park_space_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `total_space`
--
ALTER TABLE `total_space`
  MODIFY `total_available` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
