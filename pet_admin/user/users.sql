-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-07-14 17:32:41
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
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `valid` tinyint(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `created_at`, `updated_at`, `valid`) VALUES
(1, 'Amy', '827ccb0eea8a706c4c34a16891f84e', 'Amy@test.com', '2023-06-01 12:00:00', '2023-06-01 12:00:00', 1),
(2, 'Gary', '827ccb0eea8a706c4c34a16891f84e', 'Gary@test.com', '2023-06-02 12:00:00', '2023-06-02 12:00:00', 1),
(3, 'Eric', '827ccb0eea8a706c4c34a16891f84e', 'Eric@test.com', '2023-06-03 12:00:00', '2023-06-03 12:00:00', 1),
(4, 'Amy', '827ccb0eea8a706c4c34a16891f84e', 'Amy@test.com', '2023-06-04 12:00:00', '2023-06-04 12:00:00', 1),
(5, 'Carol', '827ccb0eea8a706c4c34a16891f84e', 'Carol@test.com', '2023-06-05 12:00:00', '2023-06-05 12:00:00', 1),
(6, 'Carrie', '827ccb0eea8a706c4c34a16891f84e', 'Carrie@test.com', '2023-06-06 12:00:00', '2023-06-06 12:00:00', 1),
(7, 'Amy', '827ccb0eea8a706c4c34a16891f84e', 'Amy@test.com', '2023-06-07 12:00:00', '2023-06-07 12:00:00', 1),
(8, 'Alice', '827ccb0eea8a706c4c34a16891f84e', 'Alice@test.com', '2023-06-08 12:00:00', '2023-06-08 12:00:00', 1),
(9, 'Carla', '827ccb0eea8a706c4c34a16891f84e', 'Carla@test.com', '2023-06-09 12:00:00', '2023-06-09 12:00:00', 1),
(10, 'Anne', '827ccb0eea8a706c4c34a16891f84e', 'Anne@test.com', '2023-06-10 12:00:00', '2023-06-10 12:00:00', 1),
(11, 'Annie', '827ccb0eea8a706c4c34a16891f84e', 'Annie@test.com', '2023-06-11 12:00:00', '2023-06-11 12:00:00', 1),
(12, 'Antonia', '827ccb0eea8a706c4c34a16891f84e', 'Antonia@test.com', '2023-06-12 12:00:00', '2023-06-12 12:00:00', 1),
(13, 'Alma', '827ccb0eea8a706c4c34a16891f84e', 'Alma@test.com', '2023-06-13 12:00:00', '2023-06-13 12:00:00', 1),
(14, 'Aspasia', '827ccb0eea8a706c4c34a16891f84e', 'Aspasia@test.com', '2023-06-14 12:00:00', '2023-06-14 12:00:00', 1),
(15, 'Avis', '827ccb0eea8a706c4c34a16891f84e', 'Avis@test.com', '2023-06-15 12:00:00', '2023-06-15 12:00:00', 1),
(16, 'Babs', '827ccb0eea8a706c4c34a16891f84e', 'Babs@test.com', '2023-06-16 12:00:00', '2023-06-16 12:00:00', 1),
(17, 'Becky', '827ccb0eea8a706c4c34a16891f84e', 'Becky@test.com', '2023-06-17 12:00:00', '2023-06-17 12:00:00', 1),
(18, 'Doris', '827ccb0eea8a706c4c34a16891f84e', 'Doris@test.com', '2023-06-18 12:00:00', '2023-06-18 12:00:00', 1),
(19, 'Elva', '827ccb0eea8a706c4c34a16891f84e', 'Elva@test.com', '2023-06-19 12:00:00', '2023-06-19 12:00:00', 1),
(20, 'Eileen', '827ccb0eea8a706c4c34a16891f84e', 'Eileen@test.com', '2023-06-20 12:00:00', '2023-06-20 12:00:00', 1),
(21, 'Ella', '827ccb0eea8a706c4c34a16891f84e', 'Ella@test.com', '2023-06-21 12:00:00', '2023-06-21 12:00:00', 1),
(22, 'Elsa', '827ccb0eea8a706c4c34a16891f84e', 'Elsa@test.com', '2023-06-22 12:00:00', '2023-06-22 12:00:00', 1),
(23, 'Emily', '827ccb0eea8a706c4c34a16891f84e', 'Emily@test.com', '2023-06-23 12:00:00', '2023-06-23 12:00:00', 1),
(24, 'Amy', '827ccb0eea8a706c4c34a16891f84e', 'Amy@test.com', '2023-06-24 12:00:00', '2023-06-24 12:00:00', 1),
(25, 'Diane', '827ccb0eea8a706c4c34a16891f84e', 'Diane@test.com', '2023-06-25 12:00:00', '2023-06-25 12:00:00', 1),
(26, 'Dora', '827ccb0eea8a706c4c34a16891f84e', 'Dora@test.com', '2023-06-26 12:00:00', '2023-06-26 12:00:00', 1),
(27, 'Edith', '827ccb0eea8a706c4c34a16891f84e', 'Edith@test.com', '2023-06-27 12:00:00', '2023-06-27 12:00:00', 1),
(28, 'Elaine', '827ccb0eea8a706c4c34a16891f84e', 'Elaine@test.com', '2023-06-28 12:00:00', '2023-06-28 12:00:00', 1),
(29, 'Amy', '827ccb0eea8a706c4c34a16891f84e', 'Amy@test.com', '2023-06-29 12:00:00', '2023-06-29 12:00:00', 1),
(30, 'Ellen', '827ccb0eea8a706c4c34a16891f84e', 'Ellen@test.com', '2023-06-30 12:00:00', '2023-06-30 12:00:00', 1),
(31, 'Elsie', '827ccb0eea8a706c4c34a16891f84e', 'Elsie@test.com', '2023-07-01 12:00:00', '2023-07-01 12:00:00', 1),
(32, 'Emma', '827ccb0eea8a706c4c34a16891f84e', 'Emma@test.com', '2023-07-02 12:00:00', '2023-07-02 12:00:00', 1),
(33, 'Jenny', '827ccb0eea8a706c4c34a16891f84e', 'Jenny@test.com', '2023-07-03 12:00:00', '2023-07-03 12:00:00', 1),
(34, 'Jessie', '827ccb0eea8a706c4c34a16891f84e', 'Jessie@test.com', '2023-07-04 12:00:00', '2023-07-04 12:00:00', 1),
(35, 'Joan', '827ccb0eea8a706c4c34a16891f84e', 'Joan@test.com', '2023-07-05 12:00:00', '2023-07-05 12:00:00', 1),
(36, 'Amy', '827ccb0eea8a706c4c34a16891f84e', 'Amy@test.com', '2023-07-06 12:00:00', '2023-07-06 12:00:00', 1),
(37, 'Jode', '827ccb0eea8a706c4c34a16891f84e', 'Jode@test.com', '2023-07-07 12:00:00', '2023-07-07 12:00:00', 1),
(38, 'Judy', '827ccb0eea8a706c4c34a16891f84e', 'Judy@test.com', '2023-07-08 12:00:00', '2023-07-08 12:00:00', 1),
(39, 'Joyce', '827ccb0eea8a706c4c34a16891f84e', 'Joyce@test.com', '2023-07-09 12:00:00', '2023-07-09 12:00:00', 1),
(40, 'Julia', '827ccb0eea8a706c4c34a16891f84e', 'Julia@test.com', '2023-07-10 12:00:00', '2023-07-10 12:00:00', 1),
(41, 'Lily', '827ccb0eea8a706c4c34a16891f84e', 'Lily@test.com', '2023-07-11 12:00:00', '2023-07-11 12:00:00', 1),
(42, 'Lisa', '827ccb0eea8a706c4c34a16891f84e', 'Lisa@test.com', '2023-07-12 12:00:00', '2023-07-12 12:00:00', 1),
(43, 'Lois', '827ccb0eea8a706c4c34a16891f84e', 'Lois@test.com', '2023-07-13 12:00:00', '2023-07-13 12:00:00', 1),
(44, 'Amy', '827ccb0eea8a706c4c34a16891f84e', 'Amy@test.com', '2023-07-14 12:00:00', '2023-07-14 12:00:00', 1),
(45, 'Amy', '827ccb0eea8a706c4c34a16891f84e', 'Amy@test.com', '2023-07-15 12:00:00', '2023-07-15 12:00:00', 1),
(46, 'Lynn', '827ccb0eea8a706c4c34a16891f84e', 'Lynn@test.com', '2023-07-16 12:00:00', '2023-07-16 12:00:00', 1),
(47, 'LuLu', '827ccb0eea8a706c4c34a16891f84e', 'LuLu@test.com', '2023-07-17 12:00:00', '2023-07-17 12:00:00', 1),
(48, 'Madge', '827ccb0eea8a706c4c34a16891f84e', 'Madge@test.com', '2023-07-18 12:00:00', '2023-07-18 12:00:00', 1),
(49, 'Mandy', '827ccb0eea8a706c4c34a16891f84e', 'Mandy@test.com', '2023-07-19 12:00:00', '2023-07-19 12:00:00', 1),
(50, 'Linda', '827ccb0eea8a706c4c34a16891f84e', 'Linda@test.com', '2023-07-20 12:00:00', '2023-07-20 12:00:00', 1),
(51, 'Livia', '827ccb0eea8a706c4c34a16891f84e', 'Livia@test.com', '2023-07-21 12:00:00', '2023-07-21 12:00:00', 1),
(52, 'Lori', '827ccb0eea8a706c4c34a16891f84e', 'Lori@test.com', '2023-07-22 12:00:00', '2023-07-22 12:00:00', 1),
(53, 'Louise', '827ccb0eea8a706c4c34a16891f84e', 'Louise@test.com', '2023-07-23 12:00:00', '2023-07-23 12:00:00', 1),
(54, 'Lucy', '827ccb0eea8a706c4c34a16891f84e', 'Lucy@test.com', '2023-07-24 12:00:00', '2023-07-24 12:00:00', 1),
(55, 'Amy', '827ccb0eea8a706c4c34a16891f84e', 'Amy@test.com', '2023-07-25 12:00:00', '2023-07-25 12:00:00', 1),
(56, 'Amy', '827ccb0eea8a706c4c34a16891f84e', 'Amy@test.com', '2023-07-26 12:00:00', '2023-07-26 12:00:00', 1),
(57, 'Maggie', '827ccb0eea8a706c4c34a16891f84e', 'Maggie@test.com', '2023-07-27 12:00:00', '2023-07-27 12:00:00', 1),
(58, 'Marcia', '827ccb0eea8a706c4c34a16891f84e', 'Marcia@test.com', '2023-07-28 12:00:00', '2023-07-28 12:00:00', 1),
(59, 'Nicole', '827ccb0eea8a706c4c34a16891f84e', 'Nicole@test.com', '2023-07-29 12:00:00', '2023-07-29 12:00:00', 1),
(60, 'Nita', '827ccb0eea8a706c4c34a16891f84e', 'Nita@test.com', '2023-07-30 12:00:00', '2023-07-30 12:00:00', 1),
(61, 'Olive', '827ccb0eea8a706c4c34a16891f84e', 'Olive@test.com', '2023-07-31 12:00:00', '2023-07-31 12:00:00', 1),
(62, 'Pancy', '827ccb0eea8a706c4c34a16891f84e', 'Pancy@test.com', '2023-08-01 12:00:00', '2023-08-01 12:00:00', 1),
(63, 'Paula', '827ccb0eea8a706c4c34a16891f84e', 'Paula@test.com', '2023-08-02 12:00:00', '2023-08-02 12:00:00', 1),
(64, 'Peggie', '827ccb0eea8a706c4c34a16891f84e', 'Peggie@test.com', '2023-08-03 12:00:00', '2023-08-03 12:00:00', 1),
(65, 'Rose', '827ccb0eea8a706c4c34a16891f84e', 'Rose@test.com', '2023-08-04 12:00:00', '2023-08-04 12:00:00', 1),
(66, 'Ruby', '827ccb0eea8a706c4c34a16891f84e', 'Ruby@test.com', '2023-08-05 12:00:00', '2023-08-05 12:00:00', 1),
(67, 'Katie', '827ccb0eea8a706c4c34a16891f84e', 'Katie@test.com', '2023-08-06 12:00:00', '2023-08-06 12:00:00', 1),
(68, 'Kim', '827ccb0eea8a706c4c34a16891f84e', 'Kim@test.com', '2023-08-07 12:00:00', '2023-08-07 12:00:00', 1),
(69, 'Kitty', '827ccb0eea8a706c4c34a16891f84e', 'Kitty@test.com', '2023-08-08 12:00:00', '2023-08-08 12:00:00', 1),
(70, 'Amy', '827ccb0eea8a706c4c34a16891f84e', 'Amy@test.com', '2023-08-09 12:00:00', '2023-08-09 12:00:00', 1),
(71, 'Sandy', '827ccb0eea8a706c4c34a16891f84e', 'Sandy@test.com', '2023-08-10 12:00:00', '2023-08-10 12:00:00', 1),
(72, 'Sheila', '827ccb0eea8a706c4c34a16891f84e', 'Sheila@test.com', '2023-08-11 12:00:00', '2023-08-11 12:00:00', 1),
(73, 'Amy', '827ccb0eea8a706c4c34a16891f84e', 'Amy@test.com', '2023-08-12 12:00:00', '2023-08-12 12:00:00', 1),
(74, 'Sophia', '827ccb0eea8a706c4c34a16891f84e', 'Sophia@test.com', '2023-08-13 12:00:00', '2023-08-13 12:00:00', 1),
(75, 'Stella', '827ccb0eea8a706c4c34a16891f84e', 'Stella@test.com', '2023-08-14 12:00:00', '2023-08-14 12:00:00', 1),
(76, 'Vivian', '827ccb0eea8a706c4c34a16891f84e', 'Vivian@test.com', '2023-08-15 12:00:00', '2023-08-15 12:00:00', 1),
(77, 'Valerie', '827ccb0eea8a706c4c34a16891f84e', 'Valerie@test.com', '2023-08-16 12:00:00', '2023-08-16 12:00:00', 1),
(78, 'Veronica', '827ccb0eea8a706c4c34a16891f84e', 'Veronica@test.com', '2023-08-17 12:00:00', '2023-08-17 12:00:00', 1),
(79, 'Amy', '827ccb0eea8a706c4c34a16891f84e', 'Amy@test.com', '2023-08-18 12:00:00', '2023-08-18 12:00:00', 1),
(80, 'Zoe', '827ccb0eea8a706c4c34a16891f84e', 'Zoe@test.com', '2023-08-19 12:00:00', '2023-08-19 12:00:00', 1),
(81, 'Max', '827ccb0eea8a706c4c34a16891f84e', 'Max@test.com', '2023-08-20 12:00:00', '2023-08-20 12:00:00', 1),
(82, 'Kevin', '827ccb0eea8a706c4c34a16891f84e', 'Kevin@test.com', '2023-08-21 12:00:00', '2023-08-21 12:00:00', 1),
(83, 'Nick', '827ccb0eea8a706c4c34a16891f84e', 'Nick@test.com', '2023-08-22 12:00:00', '2023-08-22 12:00:00', 1),
(84, 'Jack', '827ccb0eea8a706c4c34a16891f84e', 'Jack@test.com', '2023-08-23 12:00:00', '2023-08-23 12:00:00', 1),
(85, 'Jacky', '827ccb0eea8a706c4c34a16891f84e', 'Jacky@test.com', '2023-08-24 12:00:00', '2023-08-24 12:00:00', 1),
(86, 'Jason', '827ccb0eea8a706c4c34a16891f84e', 'Jason@test.com', '2023-08-25 12:00:00', '2023-08-25 12:00:00', 1),
(87, 'John', '827ccb0eea8a706c4c34a16891f84e', 'John@test.com', '2023-08-26 12:00:00', '2023-08-26 12:00:00', 1),
(88, 'Tom', '827ccb0eea8a706c4c34a16891f84e', 'Tom@test.com', '2023-08-27 12:00:00', '2023-08-27 12:00:00', 1),
(89, 'Tim', '827ccb0eea8a706c4c34a16891f84e', 'Tim@test.com', '2023-08-28 12:00:00', '2023-08-28 12:00:00', 1),
(90, 'David', '827ccb0eea8a706c4c34a16891f84e', 'David@test.com', '2023-08-29 12:00:00', '2023-08-29 12:00:00', 1),
(91, 'Peter', '827ccb0eea8a706c4c34a16891f84e', 'Peter@test.com', '2023-08-30 12:00:00', '2023-08-30 12:00:00', 1),
(92, 'Jay', '827ccb0eea8a706c4c34a16891f84e', 'Jay@test.com', '2023-08-31 12:00:00', '2023-08-31 12:00:00', 1),
(93, 'Johnny', '827ccb0eea8a706c4c34a16891f84e', 'Johnny@test.com', '2023-09-01 12:00:00', '2023-09-01 12:00:00', 1),
(94, 'Ted', '827ccb0eea8a706c4c34a16891f84e', 'Ted@test.com', '2023-09-02 12:00:00', '2023-09-02 12:00:00', 1),
(95, 'Scott', '827ccb0eea8a706c4c34a16891f84e', 'Scott@test.com', '2023-09-03 12:00:00', '2023-09-03 12:00:00', 1),
(96, 'Ricky', '827ccb0eea8a706c4c34a16891f84e', 'Ricky@test.com', '2023-09-04 12:00:00', '2023-09-04 12:00:00', 1),
(97, 'Louis', '827ccb0eea8a706c4c34a16891f84e', 'Louis@test.com', '2023-09-05 12:00:00', '2023-09-05 12:00:00', 1),
(98, 'Mark', '827ccb0eea8a706c4c34a16891f84e', 'Mark@test.com', '2023-09-06 12:00:00', '2023-09-06 12:00:00', 1),
(99, 'Mike ', '827ccb0eea8a706c4c34a16891f84e', 'Mike @test.com', '2023-09-07 12:00:00', '2023-09-07 12:00:00', 1),
(100, 'Joe', '827ccb0eea8a706c4c34a16891f84e', 'Joe@test.com', '2023-09-08 12:00:00', '2023-09-08 12:00:00', 1),
(101, 'Jeremy', '827ccb0eea8a706c4c34a16891f84e', 'Jeremy@test.com', '2023-09-09 12:00:00', '2023-09-09 12:00:00', 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
