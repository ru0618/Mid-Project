-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2023 年 07 月 14 日 13:15
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
-- 資料表結構 `order_details`
--

CREATE TABLE `order_details` (
  `order_detail_id` int(30) NOT NULL,
  `order_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `quantity` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `order_details`
--

INSERT INTO `order_details` (`order_detail_id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 1, 65, 1),
(2, 1, 54, 2),
(3, 1, 22, 1),
(4, 2, 18, 1),
(5, 2, 33, 1),
(6, 3, 68, 2),
(7, 3, 4, 3),
(8, 4, 2, 5),
(9, 4, 22, 3),
(10, 5, 7, 4),
(11, 5, 31, 6),
(12, 6, 22, 2),
(13, 6, 29, 4),
(14, 7, 3, 7),
(15, 7, 19, 1),
(16, 7, 77, 6),
(17, 8, 5, 2),
(18, 8, 78, 1),
(19, 9, 10, 1),
(20, 9, 45, 1),
(21, 9, 35, 6),
(22, 10, 57, 5),
(23, 10, 60, 1),
(24, 10, 65, 2),
(25, 10, 67, 2),
(26, 11, 13, 1),
(27, 11, 15, 1),
(28, 12, 23, 1),
(29, 12, 26, 1),
(30, 12, 47, 2),
(31, 13, 2, 4),
(32, 13, 44, 2),
(33, 14, 4, 2),
(34, 15, 15, 1),
(35, 16, 3, 5),
(36, 16, 32, 2),
(37, 17, 18, 1),
(38, 17, 19, 2),
(39, 18, 24, 1),
(40, 18, 27, 1),
(41, 18, 29, 1),
(42, 19, 37, 3),
(43, 19, 42, 3),
(44, 20, 45, 1),
(45, 20, 25, 2),
(46, 21, 28, 3),
(47, 21, 14, 1),
(48, 22, 18, 5),
(49, 22, 33, 1),
(50, 23, 46, 1),
(51, 23, 52, 4),
(52, 23, 58, 2),
(53, 24, 1, 1),
(54, 24, 18, 2),
(55, 24, 84, 2),
(56, 24, 7, 2),
(57, 24, 47, 1),
(58, 25, 4, 1),
(59, 25, 20, 3),
(60, 25, 30, 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_id` (`order_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
