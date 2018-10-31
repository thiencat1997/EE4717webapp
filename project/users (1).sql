-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 31, 2018 at 04:18 PM
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
(1, 'Ms', 'test', 'test', 'test', '1111tE', '2@w.co', 11111111),
(2, 'Ms', 'testa', 'testa', 'testa', '1testA', '2@e.co', 22222222),
(3, 'Mr', 'testb', 'testb', 'testb', '1testB', 'e150058@e.ntu.edu.sg', 33333333),
(4, 'Mr', 'testc', 'testc', 'testc', '1testC', 'e150058@e.ntu.edu.sg', 33333333),
(5, 'Mr', 'a', 'a', 'a', '1111aA', '1@2.co', 22222222),
(6, 'Miss', 'b', 'b', 'b', '1111bB', '1@w.co', 11111111),
(7, 'Mrs', 'd', 'd', 'd', '1111dD', '1@e.nt', 12345678),
(8, 'null', 'eee', 'eee', 'eee', '11eeEE', 'e150058@e.ntu.edu.sg', 11111111),
(9, 'Ms', 'teste', 'teste', 'teste', '$2y$10$VjXVhl42.skfW', '2@e.ee', 11111111),
(10, 'Ms', 'teste', 'teste', 'teste', '$2y$10$6ULviqqaAdjRd', '2@e.ee', 11111111),
(11, 'Ms', 'teste', 'teste', 'teste', '$2y$10$Dfy2uxKsDrwCI', '2@e.ee', 11111111),
(12, 'Mr', 'eeee', 'eeee', 'eeee', '$2y$10$4R/adU8EFP0AF', '1@E.EE', 2222222),
(13, 'Ms', 'teste', 'teste', 'teste', '$2y$10$vn5R2nTZ971E8', '2@e.ee', 11111111);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
