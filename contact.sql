-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 03:24 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contact`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_contact`
--

CREATE TABLE `user_contact` (
  `id` int(11) NOT NULL,
  `cname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `sub` varchar(150) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_contact`
--

INSERT INTO `user_contact` (`id`, `cname`, `email`, `sub`, `message`) VALUES
(1, 'gian', 'gianjethromasaa@gmail.com', 'try lang', 'dasda'),
(2, 'gian', 'gianjethromasaa@gmail.com', 'request', 'dasda'),
(3, 'gian', 'gianjethromasa@gmail.com', 'request', 'hello sir johnny'),
(4, 'gian', 'gianjethromasa@gmail.com', 'request', 'hello po'),
(6, 'Leonah', 'gianjethromasa@gmail.com', 'hatdog na bilog', 'hello si mark tahimik lang'),
(7, 'gian', 'gianethromasa@gmail.com', 'hatdog na bilog', 'bananaan'),
(8, 'von', 'betokis123@gmail.com', 'request', 'gbb'),
(9, 'gian', 'betokis123@gmail.com', 'wala lang', 'hilabyo'),
(10, 'gian', 'betokis123@gmail.com', 'wala lang', 'hilabyo'),
(11, 'gian', 'betokis123@gmail.com', 'wala lang', 'hilabyo'),
(12, 'gian', 'betokis123@gmail.com', 'wala lang', 'hilabyo'),
(13, 'mewo', 'mewo@gmail.com', 'wala', 'trying'),
(14, 'mewo', 'ensong@gmail.com', 'hatdog na bilog', 'isapa'),
(15, 'sun', 'flower@gmail.com', 'down', 'up');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_contact`
--
ALTER TABLE `user_contact`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_contact`
--
ALTER TABLE `user_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
