-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2023 at 05:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pet`
--

-- --------------------------------------------------------

--
-- Table structure for table `article_images`
--

CREATE TABLE `article_images` (
  `id` int(5) NOT NULL,
  `article_id` int(5) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article_images`
--

INSERT INTO `article_images` (`id`, `article_id`, `img`) VALUES
(1, 1, '1568.jpg'),
(2, 2, '02.jpg'),
(3, 3, '03.jpg'),
(4, 4, '04.jpg'),
(5, 5, '05.jpg'),
(6, 6, '4Yz2Ang.webp'),
(7, 7, '07.jpg'),
(8, 8, '08.jpg'),
(9, 9, '09.jpg'),
(10, 10, '10.jpg'),
(11, 11, '11.jpg'),
(12, 12, '12.jpg'),
(13, 13, '13.jpg'),
(14, 14, '14.jpg'),
(15, 15, '15.jpg'),
(16, 16, '16.jpg'),
(17, 17, '17.jpg'),
(18, 18, '18.jpg'),
(19, 19, '19.jpg'),
(20, 20, '20.jpg'),
(21, 21, '21.jpg'),
(22, 22, '22.jpg'),
(23, 23, '23.jpg'),
(24, 24, '24.jpg'),
(25, 25, '25.jpg'),
(26, 26, '26.jpg'),
(27, 27, '27.jpg'),
(28, 28, '28.jpg'),
(29, 29, '29.jpg'),
(30, 30, '30.jpg'),
(31, 39, '02156.jpg'),
(32, 32, '456.jpg'),
(33, 42, '4567856.jpg'),
(34, 43, '001.jpg.jpg'),
(35, 44, 'batmanQ.jpg'),
(36, 45, 'solar.jpg'),
(37, 46, 'ironman2.jpg'),
(38, 47, 'supermanQ.jpg'),
(39, 48, 'supermantest.jpg'),
(40, 49, 'supermantest.jpg'),
(41, 50, 'ironmantest.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article_images`
--
ALTER TABLE `article_images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article_images`
--
ALTER TABLE `article_images`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
