-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 03:23 PM
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
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'gian', 'gian123456');

-- --------------------------------------------------------

--
-- Stand-in structure for view `log-in`
-- (See below for the actual view)
--
CREATE TABLE `log-in` (
`name` varchar(255)
,`email` varchar(255)
,`password` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `usertype`) VALUES
(1, 'ens', 'ensong@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'user'),
(2, 'evet', 'yvette.masayes16@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'user'),
(3, 'gian', 'gianjethromasa@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user'),
(4, 'betok1', 'betokis123@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'user'),
(5, 'jesrill', '0322-2200@lspu.edu.ph', '827ccb0eea8a706c4c34a16891f84e7b', 'user'),
(6, 'NinongJay', 'NinoBuetang@gmail.com', '51486ba06c8541048d977fe4061cb80c', 'user'),
(10, 'ganda', 'gandamo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user'),
(16, 'admin', 'admin@gmail.com', '4acb4bc224acbbe3c2bfdcaa39a4324e', 'admin');

-- --------------------------------------------------------

--
-- Structure for view `log-in`
--
DROP TABLE IF EXISTS `log-in`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user_login`@`%` SQL SECURITY DEFINER VIEW `log-in`  AS SELECT `users`.`name` AS `name`, `users`.`email` AS `email`, `users`.`password` AS `password` FROM `users` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
