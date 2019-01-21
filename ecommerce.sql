-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2016 at 06:22 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `order_id` int(11) NOT NULL,
  `order_no` varchar(20) DEFAULT NULL,
  `customer_id` varchar(50) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `shipping_address` varchar(100) NOT NULL,
  `receiver_name` varchar(150) NOT NULL,
  `tot_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`order_id`, `order_no`, `customer_id`, `order_date`, `shipping_address`, `receiver_name`, `tot_amount`) VALUES
(58, '14626628801', '1', '2016-05-07 19:14:40', '', '', '0.00'),
(59, '14626631121', '1', '2016-05-07 19:18:32', '', '', '0.00'),
(60, '14626640221', '1', '2016-05-07 19:33:42', '', '', '0.00'),
(61, '14627071541', '1', '2016-05-08 07:32:34', '', '', '0.00'),
(62, '14627460921', '1', '2016-05-08 18:21:32', '', '', '0.00'),
(63, '14627460981', '1', '2016-05-08 18:21:38', '', '', '0.00'),
(64, '14627461141', '1', '2016-05-08 18:21:54', '', '', '0.00'),
(65, '146274647013', '13', '2016-05-08 18:27:50', '', '', '0.00'),
(66, '146274654913', '13', '2016-05-08 18:29:09', '', '', '0.00'),
(67, '146274655013', '13', '2016-05-08 18:29:10', '', '', '0.00'),
(68, '146274655213', '13', '2016-05-08 18:29:12', '', '', '0.00'),
(69, '146274661313', '13', '2016-05-08 18:30:13', '', '', '0.00'),
(70, '146274685013', '13', '2016-05-08 18:34:10', '', '', '0.00'),
(71, '146274687113', '13', '2016-05-08 18:34:31', '', '', '0.00'),
(72, '146274697313', '13', '2016-05-08 18:36:13', '', '', '0.00'),
(73, '146274737013', '13', '2016-05-08 18:42:50', '', '', '0.00'),
(74, '146274780513', '13', '2016-05-08 18:50:05', '', '', '0.00'),
(75, '146274786213', '13', '2016-05-08 18:51:02', '', '', '0.00'),
(76, '8787878', '13', '2016-05-08 19:14:30', 'Apt 2W,30 West Harriet Ave,Palisades Park,NJ 07650', 'Nipuni N Perera', '2500.00'),
(77, '146274965913', '13', '2016-05-08 19:20:59', 'test add', 'Nipuni N Perera', '2050.00'),
(78, '146275190013', '13', '2016-05-08 19:58:20', 'test add', 'Nipuni N Perera', '6050.00'),
(79, '146275220213', '13', '2016-05-08 20:03:22', 'test add', 'Nipuni N Perera', '6050.00'),
(80, '146282729413', '13', '2016-05-09 16:54:54', 'test add', 'Nipuni N Perera', '2050.00'),
(81, '146282747113', '13', '2016-05-09 16:57:51', 'test add', 'Nipuni N Perera', '2000.00'),
(82, '146282765913', '13', '2016-05-09 17:00:59', 'test add', 'Nipuni N Perera', '0.00'),
(83, '146282788113', '13', '2016-05-09 17:04:41', 'test add', 'Nipuni N Perera', '2000.00'),
(84, '146282795113', '13', '2016-05-09 17:05:51', 'test add', 'Nipuni N Perera', '2050.00'),
(85, '146282811213', '13', '2016-05-09 17:08:32', 'Apt 2W 30 West Harriet Ave Palisades Park NJ 07650', 'Nipuni N Perera', '2000.00'),
(86, '146282838513', '13', '2016-05-09 17:13:05', 'Apt 2W 30 West Harriet Ave Palisades Park NJ 07650', 'Nipuni N Perera', '2050.00'),
(87, '146282860013', '13', '2016-05-09 17:16:40', 'Apt 2W 30 West Harriet Ave Palisades Park NJ 07650', 'Nipuni N Perera', '2050.00'),
(88, '146282872213', '13', '2016-05-09 17:18:42', 'Apt 2W 30 West Harriet Ave Palisades Park NJ 07650', 'Nipuni N Perera', '2050.00'),
(89, '146282874113', '13', '2016-05-09 17:19:01', 'Apt 2W 30 West Harriet Ave Palisades Park NJ 07650', 'Nipuni N Perera', '2050.00'),
(90, '146282882713', '13', '2016-05-09 17:20:27', 'Apt 2W 30 West Harriet Ave Palisades Park NJ 07650', 'Nipuni N Perera', '2050.00'),
(91, '146282898013', '13', '2016-05-09 17:23:00', 'Apt 2W 30 West Harriet Ave Palisades Park NJ 07650', 'Nipuni N Perera', '2050.00'),
(92, '146282932413', '13', '2016-05-09 17:28:44', 'Apt 2W 30 West Harriet Ave Palisades Park NJ 07650', 'Nipuni N Perera', '2100.00'),
(93, '14772124641', '1', '2016-10-23 14:17:44', 'test test test AL 12345', 'test', '16320.00'),
(94, '1477545809', '', '2016-10-27 10:53:29', 'tttt ttttt tttttt AZ 213123123', 'ttstt', '3150.00');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `record_id` int(11) NOT NULL,
  `order_no` varchar(20) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `sold_quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`record_id`, `order_no`, `product_id`, `sold_quantity`) VALUES
(15, '14626628801', '2', 1),
(16, '14626628801', '3', 2),
(17, '14626631121', '2', 1),
(18, '14626631121', '3', 2),
(19, '14626640221', '2', 1),
(20, '14626640221', '3', 2),
(21, '14627071541', '2', 1),
(22, '14627071541', '3', 2),
(23, '146274697313', '0', 1),
(24, '146274737013', '5', 1),
(25, '146274780513', '5', 1),
(26, '146274786213', '5', 1),
(27, '146274965913', '5', 1),
(28, '146275190013', '5', 1),
(29, '146275190013', '8', 2),
(30, '146275220213', '5', 1),
(31, '146275220213', '8', 2),
(32, '146282729413', '5', 1),
(33, '146282747113', '8', 1),
(34, '146282788113', '8', 1),
(35, '146282795113', '5', 1),
(36, '146282811213', '8', 1),
(37, '146282838513', '5', 1),
(38, '146282860013', '5', 1),
(39, '146282872213', '5', 1),
(40, '146282874113', '5', 1),
(41, '146282882713', '5', 1),
(42, '146282898013', '5', 1),
(43, '146282932413', '3', 1),
(44, '14772124641', '9', 1),
(45, '14772124641', '26', 10),
(46, '14772124641', '3', 1),
(47, '1477545809', '10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `ProductCategory_Id` int(100) NOT NULL,
  `ProductCategory_Name` varchar(100) NOT NULL,
  `Active` bit(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`ProductCategory_Id`, `ProductCategory_Name`, `Active`) VALUES
(1, 'Arabian Dates', b'1'),
(2, 'Kharek\n', b'1'),
(3, 'Khimiya Dates', b'1'),
(4, 'Medjoul Dates', b'1'),
(5, 'Oman Dates', b'1'),
(6, 'Black Dates', b'1'),
(7, 'Dry Dates', b'1'),
(8, 'Bumaan Dates', b'1'),
(9, 'Deglet Nour Dates\r\n', b'1'),
(10, 'Ajwa Al Madina Dates\r\n', b'1'),
(11, 'Barrari Dates', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `product_category_old`
--

CREATE TABLE `product_category_old` (
  `ProductCategory_Id` int(100) NOT NULL,
  `ProductCategory_Name` varchar(100) NOT NULL,
  `Active` bit(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category_old`
--

INSERT INTO `product_category_old` (`ProductCategory_Id`, `ProductCategory_Name`, `Active`) VALUES
(1, 'Sarees', b'1'),
(2, 'Salwar suits', b'1'),
(3, 'Lehengas', b'1'),
(4, 'Ghagharas', b'1'),
(5, 'Kurthis', b'1'),
(6, 'Designer blouses', b'1'),
(7, 'Dress matirials', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `Product_id` int(100) NOT NULL,
  `ProductCategory_Id` int(100) NOT NULL,
  `Price` decimal(65,0) NOT NULL,
  `name` varchar(25) NOT NULL,
  `Product_image` varchar(100) NOT NULL,
  `Description` varchar(100) CHARACTER SET koi8u COLLATE koi8u_bin NOT NULL,
  `Size` enum('X','L','M','S') NOT NULL,
  `prod_quan` int(4) NOT NULL,
  `Active` char(5) NOT NULL DEFAULT '1',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `shippingCharge` decimal(10,0) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`Product_id`, `ProductCategory_Id`, `Price`, `name`, `Product_image`, `Description`, `Size`, `prod_quan`, `Active`, `date_added`, `shippingCharge`) VALUES
(1, 1, '1100', 'Arabian dates', '1477539476.jpg', 'Arabian dates', 'S', 1000, '1', '2016-10-27 03:37:56', '0'),
(2, 2, '1000', 'KHAREK', '1477539606.jpg', 'KHAREK\r\n', 'S', 100, '1', '2016-10-27 03:40:06', '0'),
(3, 3, '2000', 'Khimiya Dates', '1477539668.jpg', 'Khimiya Dates', 'S', 100, '1', '2016-10-27 03:41:08', '0'),
(4, 4, '1200', 'Medjoul Dates', '1477539693.jpg', 'Medjoul Dates', 'S', 100, '1', '2016-10-27 03:41:33', '0'),
(5, 5, '1700', 'Oman Dates', '1477539715.jpg', 'Oman Dates', 'S', 100, '1', '2016-10-27 03:41:55', '0'),
(6, 6, '1900', 'Black Dates', '1477539740.jpg', 'Black Dates', 'S', 100, '1', '2016-10-27 03:42:20', '0'),
(7, 7, '2100', 'Dry Dates', '1477539761.jpg', 'Dry Dates', 'S', 100, '1', '2016-10-27 03:42:42', '0'),
(8, 8, '3500', 'Bumaan Dates', '1477539978.jpg', 'Bumaan Dates', 'S', 100, '1', '2016-10-27 03:46:18', '0'),
(9, 9, '2500', 'Deglet Nour Dates', '1477540009.jpg', 'Deglet Nour Dates\r\n', 'S', 100, '1', '2016-10-27 03:46:49', '0'),
(10, 10, '3150', 'Ajwa Al Madina Dates', '1477540034.jpg', 'Ajwa Al Madina Dates\r\n', 'S', 99, '1', '2016-10-27 03:47:14', '0'),
(11, 11, '2800', 'Barrari Dates', '1477540053.jpg', 'Barrari Dates', 'S', 100, '1', '2016-10-27 03:47:33', '0');

-- --------------------------------------------------------

--
-- Table structure for table `product_detail_old`
--

CREATE TABLE `product_detail_old` (
  `Product_id` int(100) NOT NULL,
  `ProductCategory_Id` int(100) NOT NULL,
  `Price` decimal(65,0) NOT NULL,
  `name` varchar(25) NOT NULL,
  `Product_image` varchar(100) NOT NULL,
  `Description` varchar(100) CHARACTER SET koi8u COLLATE koi8u_bin NOT NULL,
  `Size` enum('X','L','M','S') NOT NULL,
  `prod_quan` int(4) NOT NULL,
  `Active` char(5) NOT NULL DEFAULT '1',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `shippingCharge` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_detail_old`
--

INSERT INTO `product_detail_old` (`Product_id`, `ProductCategory_Id`, `Price`, `name`, `Product_image`, `Description`, `Size`, `prod_quan`, `Active`, `date_added`, `shippingCharge`) VALUES
(3, 2, '2000', 'Kurti', '1477242926.jpg', 'Your Description Here', 'S', 10, '1', '2016-05-01 19:22:24', '100'),
(5, 3, '2000', 'Sari', '5.jpg', 'Your Description Here', 'S', 2, '1', '2016-05-01 19:22:24', '50'),
(8, 3, '2000', 'Sari', '1.jpg', 'this is test', 'S', 18, '1', '2016-05-04 19:29:45', '0'),
(9, 4, '2000', 'Sari', '4.jpg', 'this is test', 'X', 20, '1', '2016-05-04 19:30:12', '0'),
(10, 3, '2500', 'Sari', '6.jpg', 'this is test', 'X', 21, '1', '2016-05-04 19:30:32', '0'),
(11, 2, '2000', 'test', '4.jpg', 'testtsts', 'S', 12, '1', '2016-05-04 20:31:40', '0'),
(26, 2, '1222', 'test', '9.jpg', 'dhdhuidhi', 'L', 0, '1', '2016-05-05 18:13:18', '0'),
(27, 3, '2000', 'dbyd', '8.jpg', 'ljljl', 'L', 100, '1', '2016-05-05 18:14:47', '0'),
(28, 3, '2200', 'hdhd', '10.jpg', 'udhuiud', 'L', 10, '1', '2016-05-05 18:16:04', '0'),
(24, 2, '1000', 'test', '3.jpg', 'desc', 'M', 12, '1', '2016-05-05 18:01:23', '0'),
(25, 2, '2000', 'final', '5.jpg', 'gjhjh', 'S', 10, '1', '2016-05-05 18:09:40', '0'),
(32, 2, '1000', 'testing', '1462830337.jpg', 'Description', 'M', 50, '1', '2016-05-09 21:45:37', '0'),
(30, 3, '2000', 'teststt', '1462830189.jpg', 'hhguidhiushd', 'S', 30, '1', '2016-05-05 18:21:07', '0'),
(33, 2, '1232', 'test', '1477244028.jpg', 'testts', 'S', 12, '1', '2016-10-23 17:33:48', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(50) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `usertype_id` int(50) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password`, `first_name`, `last_name`, `email_id`, `usertype_id`) VALUES
(1, 'Admin', '4a4f25497ebfc1fcb27dc67ae26acb633af6d084', 'Admin', 'Admin', 'bshriya92@gmail.com', 3),
(2, 'Employee', 'f1dd70e0231b94052fcc3e4df47fd4b29714726b', 'Employee', 'Employee', 'nipuninamali@gmail.com', 2),
(3, 'Developer', 'cac25a74aac106fc2ed6228f127e92f13609ed07', 'Developer', 'Developer', 'h.vashi13@gmail.com', 4),
(4, 'Client', 'ac50ad688b544ed3a41533271e2058e84fb80960', 'Client', 'Client', 'client@client.com', 1),
(5, 'xyz', 'a938dfdfbaa1f25ccbc39e16060f73c44e5ef0dd', 'XYZ', 'ggg', 'ggg', 3),
(6, 'Nipu', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Nipuni', 'Perera', 'nipuninamali@gmail.com', 1),
(7, 'sneha', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'sneha', 'v', 'sneha@gmail.com', 3),
(8, 'mno', '8cb2237d0679ca88db6464eac60da96345513964', 'Nik', 'perera', 'nipuni_90@yahoo.com', 0),
(9, 'DEF', '8cb2237d0679ca88db6464eac60da96345513964', 'Nish', 'perera', 'nipuni_90@yahoo.com', 0),
(10, 'MM', '8cb2237d0679ca88db6464eac60da96345513964', 'MM', 'pp', 'nipuni_90@yahoo.com', 0),
(11, 'MSD', '6325821b2e6523b9951cdf50cfd5cfb8b602998a', 'XXX', 'maduu', 'nipuni_90@yahoo.com', 2),
(12, 'max', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'MAX', 'p', 'nipuni_90@yahoo.com', 0),
(13, 'nik', '252a1dedd02cdd18392f0defc7f156525971f6b4', 'Josh', 'nipuni', 'nipuni_90@yahoo.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `usertype_id` int(50) NOT NULL,
  `usertype_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`usertype_id`, `usertype_name`) VALUES
(1, 'Client'),
(2, 'Employee'),
(3, 'Administrator'),
(4, 'Developer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`ProductCategory_Id`);

--
-- Indexes for table `product_category_old`
--
ALTER TABLE `product_category_old`
  ADD PRIMARY KEY (`ProductCategory_Id`);

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`Product_id`);

--
-- Indexes for table `product_detail_old`
--
ALTER TABLE `product_detail_old`
  ADD PRIMARY KEY (`Product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`usertype_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `ProductCategory_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `product_category_old`
--
ALTER TABLE `product_category_old`
  MODIFY `ProductCategory_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `Product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `product_detail_old`
--
ALTER TABLE `product_detail_old`
  MODIFY `Product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
