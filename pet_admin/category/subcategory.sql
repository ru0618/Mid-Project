-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2023 年 07 月 14 日 09:55
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
-- 資料表結構 `subcategory`
--

CREATE TABLE `subcategory` (
  `subcategory_id` int(30) UNSIGNED NOT NULL,
  `subcategory_name` varchar(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `valid` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `subcategory`
--

INSERT INTO `subcategory` (`subcategory_id`, `subcategory_name`, `category_id`, `valid`) VALUES
(1, '罐頭', 1, 1),
(2, '飼料', 1, 1),
(3, '點心', 1, 1),
(4, '保健品', 1, 1),
(5, '飲水/餵食', 2, 1),
(6, '貓草', 2, 1),
(7, '逗貓棒', 2, 1),
(8, '貓跳台', 2, 1),
(9, '貓窩', 2, 1),
(10, '貓抓板', 2, 1),
(11, '礦砂', 3, 1),
(12, '豆腐砂', 3, 1),
(13, '木屑砂', 3, 1),
(14, '除臭劑', 3, 1),
(15, '半開貓砂盆', 4, 1),
(16, '全罩貓砂盆', 4, 1),
(17, '自動貓砂盆', 4, 1),
(18, '貓砂鏟', 4, 1),
(19, '皮毛清潔護理', 5, 1),
(20, '口腔清潔護理', 5, 1),
(21, '指甲剪', 5, 1),
(22, '刷毛梳', 5, 1),
(23, '烘毛機', 5, 1),
(24, '運輸籠', 6, 1),
(25, '寵物推車', 6, 1),
(26, '寵物提包', 6, 1),
(27, '寵物雙肩包', 6, 1),
(28, '寵物牽繩', 6, 1),
(29, '項圈', 5, 1),
(30, '寵物領巾', 6, 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcategory_id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
