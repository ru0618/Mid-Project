-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-07-14 17:54:00
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
-- 資料表結構 `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(11) UNSIGNED NOT NULL,
  `coupon_code` varchar(200) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `discount_type` varchar(30) NOT NULL,
  `discount_amount` int(30) UNSIGNED NOT NULL,
  `discount` float UNSIGNED NOT NULL,
  `usage_limit` int(30) UNSIGNED NOT NULL,
  `valid` tinyint(4) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `coupon_code`, `start_date`, `end_date`, `discount_type`, `discount_amount`, `discount`, `usage_limit`, `valid`, `level`) VALUES
(1, '100minus', '2023-07-05 00:00:00', '2023-07-14 00:00:00', 'minus', 100, 100, 1000, 1, '2'),
(2, '10%offcoupon', '2023-01-01 00:00:00', '2023-02-01 00:00:00', 'off', 500, 0.9, 100, 1, '1'),
(3, '15%offcoupon', '2023-01-15 00:00:00', '2023-02-15 00:00:00', 'off', 500, 0.85, 100, 1, '2'),
(4, '20%offcoupon', '2023-02-01 00:00:00', '2023-03-01 00:00:00', 'off', 500, 0.8, 100, 1, '3'),
(5, '25%offcoupon', '2023-02-15 00:00:00', '2023-03-15 00:00:00', 'off', 500, 0.75, 50, 1, '1'),
(6, '30%offcoupon', '2023-03-20 00:00:00', '2023-04-05 00:00:00', 'off', 500, 0.7, 50, 1, '2'),
(7, '35%offcoupon', '2023-04-12 00:00:00', '2023-05-06 00:00:00', 'off', 500, 0.65, 50, 1, '3'),
(8, '40%offcoupon', '2023-05-26 00:00:00', '2023-06-07 00:00:00', 'off', 500, 0.6, 50, 1, '1'),
(9, '45%offcoupon', '2023-06-12 00:00:00', '2023-07-08 00:00:00', 'off', 500, 0.55, 50, 1, '2'),
(10, '50%offcoupon', '2023-06-26 00:00:00', '2023-07-09 00:00:00', 'off', 500, 0.5, 50, 1, '3'),
(11, '56%offcoupon', '2023-07-09 00:00:00', '2023-08-10 00:00:00', 'off', 500, 0.44, 10, 1, '1'),
(12, '60%offcoupon', '2023-07-23 00:00:00', '2023-08-11 00:00:00', 'off', 1000, 0.4, 10, 1, '2'),
(13, '65%offcoupon', '2023-08-07 00:00:00', '2023-08-12 00:00:00', 'off', 1000, 0.35, 10, 1, '3'),
(14, '70%offcoupon', '2023-08-21 00:00:00', '2023-09-13 00:00:00', 'off', 1000, 0.3, 10, 1, '1'),
(15, '75%offcoupon', '2023-09-04 00:00:00', '2023-09-14 00:00:00', 'off', 1000, 0.25, 10, 1, '2'),
(16, '80%offcoupon', '2023-09-18 00:00:00', '2023-10-20 00:00:00', 'off', 1000, 0.2, 10, 1, '3'),
(17, '85%offcoupon', '2023-10-02 00:00:00', '2023-10-16 00:00:00', 'off', 1000, 0.15, 10, 1, '1'),
(18, 'minus100coupon', '2023-10-16 00:00:00', '2023-11-17 00:00:00', 'minus', 100, 100, 100, 1, '2'),
(19, 'minus200coupon', '2023-10-30 00:00:00', '2023-11-18 00:00:00', 'minus', 200, 200, 50, 1, '3'),
(20, 'minus300coupon', '2023-11-13 00:00:00', '2023-12-19 00:00:00', 'minus', 300, 300, 30, 1, '1'),
(21, 'minus400coupon', '2023-11-27 00:00:00', '2023-12-20 00:00:00', 'minus', 400, 400, 20, 1, '2'),
(22, 'minus500coupon', '2023-12-10 00:00:00', '2023-12-21 00:00:00', 'minus', 500, 500, 20, 1, '3'),
(23, 'minus600coupon', '2023-09-24 00:00:00', '2023-12-22 00:00:00', 'minus', 600, 600, 10, 1, '1'),
(24, 'minus700coupon', '2023-10-08 00:00:00', '2023-12-23 00:00:00', 'minus', 700, 700, 10, 1, '2'),
(25, 'minus800coupon', '2023-10-22 00:00:00', '2023-11-24 00:00:00', 'minus', 800, 800, 10, 1, '3'),
(26, 'minus900coupon', '2023-11-05 00:00:00', '2023-12-25 00:00:00', 'minus', 900, 900, 10, 1, '2'),
(27, '10%offcoupon', '2023-07-05 00:00:00', '2023-07-28 00:00:00', 'off', 1000, 0.9, 10, 1, '2'),
(28, '11%offcoupon', '2023-07-08 00:00:00', '2023-07-22 00:00:00', 'off', 500, 0.89, 10, 1, '1'),
(29, '1%offcoupon', '2023-07-06 00:00:00', '2023-07-13 00:00:00', 'off', 500, 0.99, 10, 1, '3'),
(30, '2000minus', '2023-07-28 00:00:00', '2023-07-29 00:00:00', 'minus', 2000, 2000, 5, 1, '3');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
