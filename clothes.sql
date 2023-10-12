-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2023 at 04:18 AM
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
-- Database: `clothes`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL,
  `category_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_status`) VALUES
(11, 'ชุดเดรส', 'เปิดการใช้งาน'),
(12, 'เสื้อผ้าผู้หญิง', 'เปิดการใช้งาน'),
(13, 'เสื้อผ้าเด็ก', 'เปิดการใช้งาน');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id_con` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `map` varchar(500) NOT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `line` varchar(30) DEFAULT NULL,
  `tol` varchar(10) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id_con`, `name`, `map`, `facebook`, `line`, `tol`, `email`, `address`) VALUES
(1, 'Jaruwan Shops', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3820.5775725404455!2d100.18935867432643!3d16.747916320913646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30dfbe986affc42d%3A0xf04fb558f3130f0!2z4Lih4Lir4Liy4Lin4Li04LiX4Lii4Liy4Lil4Lix4Lii4LiZ4LmA4Lij4Lio4Lin4Lij!5e0!3m2!1sth!2sth!4v1688142033360!5m2!1sth!2sth\" width=\"100%\" height=\"450px\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'https://www.facebook.com/clotho.kit', 'clotho.kit', '0123456789', 'clothokit@gmail.com', 'CLOTHO KIT, Naresuan U. 99 Moo. 9, Phitsanulok-Nakornsawan Rd, Tha Pho, Muang, Phitsanulok  65000');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `price` double NOT NULL,
  `num` int(10) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `product_status` varchar(100) NOT NULL,
  `ctgo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `product_name`, `price`, `num`, `photo`, `product_status`, `ctgo`) VALUES
(106, 12, 'BENKAI  JS-W17 สำหรับผู้หญิง', 1240, 0, '479876858.jpg', 'เปิดการใช้งาน', 0),
(107, 11, 'เสื้อกีฬา Niki', 1240, 0, '1138366632.jpg', 'เปิดการใช้งาน', 0),
(108, 12, 'BENKAI  JS-W20 สำหรับผู้หญิง', 1240, 11, '151298733.jpg', 'เปิดการใช้งาน', 0),
(109, 12, 'BENKAI  JS-W21 สำหรับผู้หญิง', 1240, 9, '1701528809.jpg', 'เปิดการใช้งาน', 0),
(110, 11, 'BENKAI  JS-W17 สำหรับผู้ชาย', 1240, 4, '1050931139.jpg', 'เปิดการใช้งาน', 0),
(111, 11, 'BENKAI  JS-W18 สำหรับผู้ชาย', 1240, 10, '1106316299.jpg', 'เปิดการใช้งาน', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchaseid` int(11) NOT NULL,
  `q_id` varchar(10) NOT NULL,
  `ID` varchar(50) NOT NULL,
  `date_purchase` datetime NOT NULL,
  `stu` int(1) NOT NULL,
  `name_booking` varchar(100) NOT NULL,
  `tel_booking` varchar(10) NOT NULL,
  `add_booking` varchar(300) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `transport` int(1) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchaseid`, `q_id`, `ID`, `date_purchase`, `stu`, `name_booking`, `tel_booking`, `add_booking`, `email`, `transport`, `img`) VALUES
(29, '100001', '', '2023-03-12 15:37:54', 5, 'Admin Admin', '0969067557', '-', 'admin@gmail.com', 2, ''),
(30, '100002', '3', '2023-03-12 15:52:42', 4, 'user1 1234', '0943483750', '-', 'user@gmail.com', 2, '631302311.png'),
(31, '100003', '2', '2023-07-23 17:42:55', 5, 'Admin Admin', '0969067557', '-', 'admin@gmail.com', 2, ''),
(32, '100004', '2', '2023-08-01 15:12:54', 1, 'Admin Admin', '0969067557', '-', 'admin@gmail.com', 2, ''),
(33, '100005', '2', '2023-08-01 15:40:23', 1, 'Admin Admin', '0969067557', '-', 'admin@gmail.com', 2, ''),
(34, '100006', '2', '2023-08-01 18:48:12', 1, 'Admin Admin', '0969067557', '-', 'admin@gmail.com', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `pdid` int(11) NOT NULL,
  `q_id` varchar(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `purchase_detail`
--

INSERT INTO `purchase_detail` (`pdid`, `q_id`, `product_id`, `price`, `quantity`) VALUES
(33, '100001', 106, 1240, 1),
(34, '100001', 106, 1240, 1),
(35, '100001', 106, 1240, 1),
(36, '100001', 106, 1240, 1),
(37, '100001', 106, 1240, 1),
(38, '100001', 106, 1240, 1),
(39, '100001', 106, 1240, 1),
(40, '100001', 106, 1240, 1),
(41, '100001', 106, 1240, 1),
(42, '100001', 106, 1240, 1),
(43, '100001', 106, 1240, 1),
(44, '100001', 106, 1240, 1),
(45, '100001', 106, 1240, 1),
(46, '100002', 106, 1240, 1),
(47, '100003', 107, 1240, 1),
(48, '100004', 108, 1240, 1),
(49, '100005', 109, 1240, 1),
(50, '100006', 111, 1240, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id_slide` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img_slide` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slide`, `name`, `img_slide`) VALUES
(2, '1', '945189158.png');

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE `story` (
  `id_story` int(11) NOT NULL,
  `story` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_counters`
--

CREATE TABLE `tbl_counters` (
  `no` int(11) NOT NULL,
  `userIP` varchar(50) NOT NULL COMMENT 'IP ของผู้เข้าเว็บ',
  `dateCreate` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'วันเวลาที่เข้าชม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_counters`
--

INSERT INTO `tbl_counters` (`no`, `userIP`, `dateCreate`) VALUES
(30, '::1', '2022-09-21 05:02:18'),
(31, '::1', '2022-09-21 07:53:37'),
(32, '::1', '2022-09-22 08:34:53'),
(33, '::1', '2022-09-26 06:08:32'),
(34, '::1', '2022-09-26 08:21:03'),
(35, '::1', '2022-10-05 02:55:20'),
(36, '::1', '2022-10-06 13:28:29'),
(37, '::1', '2022-10-07 04:37:03'),
(38, '::1', '2022-11-03 09:17:33'),
(39, '::1', '2022-11-03 10:40:00'),
(40, '::1', '2022-11-03 10:51:55'),
(41, '::1', '2022-11-03 11:12:17'),
(42, '::1', '2022-11-03 11:20:21'),
(43, '::1', '2022-11-03 11:20:52'),
(44, '::1', '2022-11-05 08:39:01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `Tel` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Add_user` varchar(30) NOT NULL,
  `Userlevel` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Username`, `Password`, `Firstname`, `Lastname`, `Tel`, `email`, `Add_user`, `Userlevel`) VALUES
(2, 'Admin', '1234', 'Admin', 'Admin', '0969067557', 'admin@gmail.com', '-', 1),
(3, 'user1', '1234', 'user1', '1234', '0943483750', '', '', 2),
(5, 'test', '7890', 'กันหัว', 'น็อกพื้น', '0559326535', '', '374 สาธร กทม. 65199', 2),
(513, 'nishi', '1234', 'ช่างชาย', 'kata', '0952872216', '', '', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchaseid`);

--
-- Indexes for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD PRIMARY KEY (`pdid`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slide`);

--
-- Indexes for table `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`id_story`);

--
-- Indexes for table `tbl_counters`
--
ALTER TABLE `tbl_counters`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchaseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  MODIFY `pdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_counters`
--
ALTER TABLE `tbl_counters`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=514;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
