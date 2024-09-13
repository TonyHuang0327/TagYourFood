-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-09-13 09:59:00
-- 伺服器版本： 10.4.22-MariaDB
-- PHP 版本： 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `a1093310`
--

-- --------------------------------------------------------

--
-- 資料表結構 `categories`
--

CREATE TABLE `categories` (
  `Categories_Number` int(11) NOT NULL,
  `Categories_Name` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `categories`
--

INSERT INTO `categories` (`Categories_Number`, `Categories_Name`, `amount`) VALUES
(1, '休息日', 3),
(2, '健身', 2),
(3, '日式', 1),
(4, '水果', 1),
(5, '油炸', 1),
(6, '清淡', 1),
(7, '炒', 1),
(8, '牛肉', 2),
(9, '美式', 1),
(10, '蒸煮', 2),
(11, '蔬菜', 1),
(12, '蛋類', 1),
(13, '豬肉', 1),
(14, '雞肉', 1),
(15, '零食', 1),
(16, '韓式', 1),
(17, '飯', 1),
(18, '飲料', 2),
(19, '高熱量', 1),
(20, '高蛋白質', 1),
(21, '麵', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `connection`
--

CREATE TABLE `connection` (
  `Food_Id` int(11) NOT NULL,
  `Sup_Id` int(11) NOT NULL,
  `Update_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `connection`
--

INSERT INTO `connection` (`Food_Id`, `Sup_Id`, `Update_Date`) VALUES
(1, 1, '2022-06-19'),
(2, 3, '2022-06-20'),
(3, 2, '2022-06-20'),
(17, 14, '2022-06-20'),
(18, 15, '2022-06-20'),
(26, 15, '2022-06-20'),
(27, 24, '2022-06-20'),
(28, 25, '2022-06-20'),
(29, 26, '2022-06-20'),
(30, 27, '2022-06-20'),
(31, 28, '2022-06-20'),
(32, 29, '2022-06-20'),
(33, 29, '2022-06-20'),
(34, 31, '2022-06-20'),
(35, 25, '2022-06-20'),
(36, 33, '2022-06-20'),
(37, 34, '2022-06-20'),
(38, 35, '2022-06-20'),
(39, 36, '2022-06-20'),
(40, 37, '2022-06-20'),
(41, 38, '2022-06-20'),
(42, 39, '2022-06-20'),
(43, 40, '2022-06-20'),
(44, 41, '2022-06-20'),
(45, 42, '2022-06-20'),
(46, 43, '2022-06-20'),
(47, 44, '2022-06-20'),
(48, 45, '2022-06-20'),
(49, 46, '2022-06-21'),
(51, 48, '2022-06-21');

-- --------------------------------------------------------

--
-- 資料表結構 `foods`
--

CREATE TABLE `foods` (
  `Food_Id` int(11) NOT NULL COMMENT '食物編號',
  `Food_Name` text COLLATE utf8_unicode_ci NOT NULL COMMENT '食物名稱',
  `Calories` int(11) NOT NULL COMMENT '卡洛里',
  `Protein` int(11) NOT NULL COMMENT '蛋白質',
  `Fat` int(11) NOT NULL COMMENT '脂肪',
  `Being_Selected` int(11) NOT NULL DEFAULT 0,
  `Being_Liked` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `foods`
--

INSERT INTO `foods` (`Food_Id`, `Food_Name`, `Calories`, `Protein`, `Fat`, `Being_Selected`, `Being_Liked`) VALUES
(1, '多力多滋-超濃起司', 816, 13, 41, 2, 1),
(2, 'MARS水解乳清蛋白-香蕉風味', 135, 26, 2, 3, 2),
(3, '阿舍意麵(原味)', 313, 11, 3, 1, 3),
(26, 'test', 12, 12, 12, 0, 0),
(27, '夏威夷披薩', 500, 20, 30, 2, 1),
(28, '雞胸肉', 150, 40, 12, 0, 2),
(29, '鮪魚壽司', 300, 15, 15, 0, 1),
(30, '香蕉', 150, 20, 10, 0, 0),
(31, '炸雞', 500, 20, 30, 1, 3),
(32, '番茄炒蛋', 300, 40, 10, 0, 2),
(33, '炒羊肉', 500, 20, 30, 1, 1),
(34, '牛肉捲', 300, 12, 15, 5, 1),
(35, '美式炸雞', 500, 12, 30, 1, 0),
(36, '燒賣', 300, 20, 15, 1, 2),
(37, '水煮空心菜', 150, 15, 10, 1, 1),
(38, '陶鍋蛋', 300, 40, 15, 1, 0),
(39, '打拋豬', 300, 20, 15, 0, 1),
(40, '33世紀風味烤雞', 500, 20, 29, 0, 0),
(41, '洋芋片', 300, 12, 30, 0, 0),
(42, '韓式拌飯', 300, 20, 15, 2, 0),
(43, '咖哩飯', 300, 20, 15, 0, 1),
(44, '柳橙汁', 150, 12, 10, 0, 0),
(45, '聖代', 584, 12, 15, 0, 0),
(46, '超高蛋白大豆', 300, 40, 10, 0, 2),
(47, '牛肉麵', 500, 20, 29, 0, 1),
(48, '牛排', 900, 65, 40, 2, 2),
(49, '薯條', 300, 12, 15, 1, 0),
(51, '咖啡', 150, 12, 12, 0, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `food_categories`
--

CREATE TABLE `food_categories` (
  `Food_Id` int(11) NOT NULL,
  `Food_Categories` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `food_categories`
--

INSERT INTO `food_categories` (`Food_Id`, `Food_Categories`) VALUES
(26, 10),
(27, 1),
(28, 2),
(29, 3),
(30, 4),
(31, 5),
(32, 6),
(33, 7),
(34, 8),
(35, 9),
(36, 10),
(37, 11),
(38, 12),
(39, 13),
(40, 14),
(41, 15),
(42, 16),
(43, 17),
(44, 18),
(45, 19),
(46, 20),
(47, 21),
(48, 8),
(1, 15),
(2, 2),
(3, 21),
(49, 1),
(49, 1),
(51, 18);

-- --------------------------------------------------------

--
-- 資料表結構 `likes_foods`
--

CREATE TABLE `likes_foods` (
  `usr_account` text NOT NULL,
  `Food_Id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `likes_foods`
--

INSERT INTO `likes_foods` (`usr_account`, `Food_Id`) VALUES
('test', '42'),
('001', '47'),
('001', '2'),
('005', '31'),
('005', '48'),
('005', '31'),
('005', '51'),
('012', '36'),
('012', '3'),
('012', '48'),
('008', '43'),
('008', '32'),
('008', '3'),
('014', '37'),
('014', '29'),
('014', '34'),
('014', '1'),
('014', '3'),
('011', '31'),
('011', '27'),
('011', '2'),
('011', '33'),
('011', '32');

-- --------------------------------------------------------

--
-- 資料表結構 `suppliers`
--

CREATE TABLE `suppliers` (
  `Sup_Id` int(11) NOT NULL COMMENT '供應商編號',
  `Sup_Name` text COLLATE utf8_unicode_ci NOT NULL COMMENT '供應商名稱',
  `Sup_Location` text COLLATE utf8_unicode_ci NOT NULL COMMENT '供應商地址',
  `Being_Selected` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `suppliers`
--

INSERT INTO `suppliers` (`Sup_Id`, `Sup_Name`, `Sup_Location`, `Being_Selected`) VALUES
(1, '台灣百事食品股份有限公司', '台南市新市區中山路181號', 2),
(2, '阿舍食品企業股份有限公司', '台南市永康區環工路15號', 1),
(3, '創欣實業有限公司', '桃園市蘆竹區吉林路163號5樓', 3),
(14, '維力食品工業股份有限公司', '811高雄市楠梓區大學56街8巷5號', 0),
(24, 'Tony Pizza', '811高雄市楠梓區大學56街8巷5號', 1),
(25, 'Tony Cicken', '811高雄市楠梓區大學56街8巷5號', 1),
(26, 'Tony Sushi', '811高雄市楠梓區大學56街8巷5號', 0),
(27, 'Tony Banana', '811高雄市楠梓區大學56街8巷5號', 0),
(28, 'Tony Chicken', '811高雄市楠梓區大學56街8巷5號', 1),
(29, 'Tony Restaurant', '811高雄市楠梓區大學56街8巷5號', 1),
(30, 'Tony Restaurant', '811高雄市楠梓區大學56街8巷5號', 0),
(31, 'Tony Beef', '811高雄市楠梓區大學56街8巷5號', 2),
(32, 'Tony Cicken', '811高雄市楠梓區大學56街8巷5號', 0),
(33, 'Tony Lunch', '811高雄市楠梓區大學56街8巷5號', 1),
(34, 'Tony Vegatable', '811高雄市楠梓區大學56街8巷5號', 1),
(35, 'Tony Egg', '811高雄市楠梓區大學56街8巷5號', 1),
(36, 'Tony Thai', '811高雄市楠梓區大學56街8巷5號', 0),
(37, 'Tony 33rd', '811高雄市楠梓區大學56街8巷5號', 0),
(38, 'Tony Chip', '811高雄市楠梓區大學56街8巷5號', 0),
(39, 'Tony Korea', '811高雄市楠梓區大學56街8巷5號', 0),
(40, 'Tony Curry', '811高雄市楠梓區大學56街8巷5號', 0),
(41, 'Tony Juice', '811高雄市楠梓區大學56街8巷5號', 0),
(42, 'Tony Ice', '811高雄市楠梓區大學56街8巷5號', 0),
(43, 'Tony Beans', '811高雄市楠梓區大學56街8巷5號', 0),
(44, 'Tony Noodle', '811高雄市楠梓區大學56街8巷5號', 0),
(45, '黃以文', '811高雄市楠梓區大學56街8巷5號', 1),
(46, 'Tony Fries', '811高雄市楠梓區大學56街8巷5號', 1),
(47, 'Tony Fries', '811高雄市楠梓區大學56街8巷5號', 0),
(48, 'Tony Coffee', '811高雄市楠梓區大學56街8巷5號', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `User_Account` char(15) COLLATE utf8_unicode_ci NOT NULL COMMENT '使用者帳號',
  `User_Password` char(15) COLLATE utf8_unicode_ci NOT NULL COMMENT '使用者密碼',
  `User_Email` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '使用者信箱'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`User_Account`, `User_Password`, `User_Email`) VALUES
('a1093310', '0327', 'tony23046176@gmail.com');

-- --------------------------------------------------------

--
-- 資料表結構 `user_bodyindex`
--

CREATE TABLE `user_bodyindex` (
  `User_Account` char(15) COLLATE utf8_unicode_ci NOT NULL,
  `Height` int(11) NOT NULL,
  `Weight` int(11) NOT NULL,
  `Age` int(11) NOT NULL,
  `Exercise_Frequency` text COLLATE utf8_unicode_ci NOT NULL,
  `Body_Fat` int(11) NOT NULL COMMENT '體脂率',
  `WHR` int(11) NOT NULL COMMENT '腰臀比'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `user_bodyindex`
--

INSERT INTO `user_bodyindex` (`User_Account`, `Height`, `Weight`, `Age`, `Exercise_Frequency`, `Body_Fat`, `WHR`) VALUES
('a1093310', 0, 0, 0, '0', 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `user_eatdiary`
--

CREATE TABLE `user_eatdiary` (
  `usr_account` text NOT NULL,
  `Food_Id` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `user_eatdiary`
--

INSERT INTO `user_eatdiary` (`usr_account`, `Food_Id`, `Date`) VALUES
('test', 3, '2022-06-20'),
('test', 2, '2022-06-20'),
('test', 1, '2022-06-19'),
('910102', 48, '2022-06-20'),
('test', 42, '2022-06-20'),
('test', 0, '2022-06-20'),
('test', 0, '2022-06-20'),
('test', 0, '2022-06-20'),
('test', 0, '2022-06-20'),
('test', 0, '2022-06-20'),
('test', 0, '2022-06-20'),
('test', 0, '2022-06-20'),
('test', 0, '2022-06-21'),
('test', 0, '2022-06-21'),
('test', 0, '2022-06-21'),
('test', 0, '2022-06-21'),
('test', 0, '2022-06-21'),
('test', 0, '2022-06-21'),
('test', 0, '2022-06-21'),
('test', 0, '2022-06-21'),
('test', 0, '2022-06-21'),
('910102', 0, '2022-06-21'),
('910102', 0, '2022-06-21'),
('910102', 0, '2022-06-21'),
('910102', 0, '2022-06-21'),
('910102', 0, '2022-06-21'),
('910102', 0, '2022-06-21'),
('910102', 0, '2022-06-21'),
('910102', 0, '2022-06-21'),
('910102', 48, '2022-06-21'),
('910102', 0, '2022-06-21'),
('910102', 0, '2022-06-21'),
('910102', 27, '2022-06-21'),
('910102', 37, '2022-06-21'),
('test', 31, '2022-06-21'),
('001', 34, '2022-06-21'),
('001', 1, '2022-06-21'),
('001', 2, '2022-06-21'),
('002', 48, '2022-06-21'),
('002', 33, '2022-06-21'),
('002', 36, '2022-06-22'),
('002', 27, '2022-06-22'),
('002', 38, '2022-06-22'),
('012', 49, '2022-06-22'),
('014', 1, '2022-06-22'),
('011', 35, '2022-06-22'),
('011', 3, '2022-06-22'),
('011', 2, '2022-06-22'),
('011', 2, '2022-06-22');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Categories_Name`);

--
-- 資料表索引 `connection`
--
ALTER TABLE `connection`
  ADD PRIMARY KEY (`Food_Id`,`Sup_Id`),
  ADD KEY `Sup_Id` (`Sup_Id`);

--
-- 資料表索引 `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`Food_Id`);

--
-- 資料表索引 `food_categories`
--
ALTER TABLE `food_categories`
  ADD KEY `Food_Id` (`Food_Id`);

--
-- 資料表索引 `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`Sup_Id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_Account`);

--
-- 資料表索引 `user_bodyindex`
--
ALTER TABLE `user_bodyindex`
  ADD PRIMARY KEY (`User_Account`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `foods`
--
ALTER TABLE `foods`
  MODIFY `Food_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '食物編號', AUTO_INCREMENT=52;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `Sup_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '供應商編號', AUTO_INCREMENT=49;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `user_bodyindex`
--
ALTER TABLE `user_bodyindex`
  ADD CONSTRAINT `User_BodyIndex_ibfk_1` FOREIGN KEY (`User_Account`) REFERENCES `user` (`User_Account`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
