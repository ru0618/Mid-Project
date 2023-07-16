-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2023 年 07 月 14 日 13:14
-- 伺服器版本： 10.4.28-MariaDB
-- PHP 版本： 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `pet`
--

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `order_id` int(30) NOT NULL,
  `vendor_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `status_id` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `total_amount` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`order_id`, `vendor_id`, `user_id`, `status_id`, `created_at`, `total_amount`) VALUES
(1, 80, 5, '1', '2023-05-17 00:49:50', 1530),
(2, 80, 8, '2', '2023-05-01 00:33:50', 980),
(3, 80, 25, '1', '2023-05-23 00:50:04', 524),
(4, 80, 18, '1', '2023-05-26 12:50:04', 1965),
(5, 80, 17, '2', '2023-05-28 07:32:27', 1184),
(6, 80, 23, '4', '2023-05-28 15:45:27', 3480),
(7, 80, 15, '2', '2023-05-31 00:51:58', 14516),
(8, 80, 3, '2', '2023-05-31 12:30:58', 3960),
(9, 80, 48, '2', '2023-05-31 19:38:39', 2690),
(10, 80, 34, '3', '2023-06-02 02:52:39', 1668),
(11, 80, 12, '4', '2023-06-03 00:53:53', 2700),
(12, 80, 29, '2', '2023-06-03 09:53:53', 16606),
(13, 80, 35, '4', '2023-06-04 00:54:20', 2640),
(14, 80, 25, '4', '2023-06-07 10:54:20', 96),
(15, 80, 23, '4', '2023-06-08 09:32:45', 1200),
(16, 80, 52, '2', '2023-06-10 12:33:45', 680),
(17, 80, 37, '4', '2023-06-10 15:55:58', 1560),
(18, 80, 26, '2', '2023-06-13 07:28:58', 1580),
(19, 80, 34, '3', '2023-06-15 00:56:22', 2760),
(20, 80, 25, '2', '2023-06-18 02:56:22', 1660),
(21, 80, 31, '4', '2023-06-18 05:26:17', 2255),
(22, 80, 28, '4', '2023-07-01 08:33:30', 4180),
(23, 80, 16, '2', '2023-07-03 19:05:35', 4948),
(24, 80, 7, '2', '2023-07-06 02:09:10', 11965),
(25, 80, 10, '4', '2023-07-13 00:58:08', 943);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `user_id` (`user_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
