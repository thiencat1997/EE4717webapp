-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 02, 2018 at 03:04 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `f31ee`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `BookID` int(100) NOT NULL,
  `UserID` int(100) NOT NULL,
  `Service` varchar(30) NOT NULL,
  `DrName` varchar(10) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `SlotID` int(100) NOT NULL,
  `DrName` varchar(20) NOT NULL,
  `Time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`SlotID`, `DrName`, `Time`) VALUES
(1, 'A', '09:00-09:30'),
(2, 'A', '09:30-10:00'),
(4, 'A', '10:00-10:30'),
(5, 'A', '10:30-11:00'),
(6, 'A', '11:00-11:30'),
(7, 'A', '11:30-12:00'),
(8, 'A', '12:00-12:30'),
(9, 'A', '14:00-14:30'),
(10, 'A', '14:30-15:00'),
(11, 'A', '15:00-15:30'),
(12, 'A', '15:30-16:00'),
(13, 'B', '09:00-09:30'),
(14, 'B', '09:30-10:00'),
(15, 'B', '10:00-10:30'),
(16, 'B', '10:30-11:00'),
(17, 'B', '11:00-11:30'),
(18, 'B', '11:30-12:00'),
(19, 'B', '12:00-12:30'),
(20, 'B', '14:00-14:30'),
(21, 'B', '14:30-15:00'),
(22, 'B', '15:00-15:30'),
(23, 'B', '15:30-16:00'),
(24, 'C', '09:00-09:30'),
(25, 'C', '09:30-10:00'),
(26, 'C', '10:00-10:30'),
(27, 'C', '10:30-11:00'),
(28, 'C', '11:00-11:30'),
(29, 'C', '11:30-12:00'),
(30, 'C', '12:00-12:30'),
(31, 'C', '14:00-14:30'),
(32, 'C', '14:30-15:00'),
(33, 'C', '15:00-15:30'),
(34, 'C', '15:30-16:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(100) NOT NULL,
  `Title` varchar(10) NOT NULL,
  `Firstname` varchar(20) NOT NULL,
  `Lastname` varchar(20) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Phone` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Title`, `Firstname`, `Lastname`, `Username`, `Password`, `Email`, `Phone`) VALUES
(9, 'Ms', 'teste', 'teste', 'teste', '$2y$10$VjXVhl42.skfW', '2@e.ee', 11111111),
(10, 'Ms', 'teste', 'teste', 'teste', '$2y$10$6ULviqqaAdjRd', '2@e.ee', 11111111),
(11, 'Ms', 'teste', 'teste', 'teste', '$2y$10$Dfy2uxKsDrwCI', '2@e.ee', 11111111),
(12, 'Mr', 'eeee', 'eeee', 'eeee', '$2y$10$4R/adU8EFP0AF', '1@E.EE', 2222222),
(13, 'Ms', 'teste', 'teste', 'teste', '$2y$10$vn5R2nTZ971E8', '2@e.ee', 11111111),
(14, 'Mr', 'qqq', 'qqq', 'qqq', '$2y$10$Kr7OvTmF/hIWF', '2@W.CO', 33333333),
(15, 'Mr', 'kkk', 'kkk', 'kkk', '$2y$10$RCqkfwyadXSOo', '2@e.co', 22222222),
(16, 'Ms', 'test', 'test', 'test', '$2y$10$MQDJgASAYxT4s', 'e150058@e.ntu.edu.sg', 11111111);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BookID`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`SlotID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `BookID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `SlotID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
