-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 03, 2024 at 01:56 PM
-- Server version: 10.11.7-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u936666569_edu_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'gian', 'gian123456');

-- --------------------------------------------------------

--
-- Table structure for table `pdf_file`
--

CREATE TABLE `pdf_file` (
  `pdf` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pdf_file`
--

INSERT INTO `pdf_file` (`pdf`) VALUES
('6.IEE1-EE-AC-Circuits-Part2-2324-2NDSEM.pdf'),
('6.IEE1-MATH-DifferentialEquation-2324-2NDSEM.pdf'),
('7.IEE1-MATH-ProbabilityStatistics-2324-2NDSEM.pdf'),
('Call-of-Duty-Mobile-Tournament-General-Guidelines-Banned-items-1.docx'),
('Chemistry_Script.docx');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(16, 'admin', 'admin@gmail.com', '4acb4bc224acbbe3c2bfdcaa39a4324e', 'admin'),
(0, 'Raymart Mirador Dingcon', '0322-1837@lspu.edu.ph', '202cb962ac59075b964b07152d234b70', 'user'),
(0, 'panget', 'panget@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(15, 'sun', 'flower@gmail.com', 'down', 'up'),
(16, 'gian', 'betokis123@gmail.com', 'wala lang', 'adadadas'),
(18, 'Leonah', 'betokis123@gmail.com', 'hatdog na bilog', 'hilo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pdf_file`
--
ALTER TABLE `pdf_file`
  ADD PRIMARY KEY (`pdf`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
