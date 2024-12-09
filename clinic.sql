-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 09, 2024 at 05:05 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

DROP TABLE IF EXISTS `tblcategory`;
CREATE TABLE IF NOT EXISTS `tblcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `category`, `status`) VALUES
(1, 'Internal Medicine', 'ACTIVE'),
(2, 'lens', 'ACTIVE'),
(3, 'frame ', 'ACTIVE'),
(4, 'accessories', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `tblinventory`
--

DROP TABLE IF EXISTS `tblinventory`;
CREATE TABLE IF NOT EXISTS `tblinventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `stock_quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `supplier_id` (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblinventory`
--

INSERT INTO `tblinventory` (`id`, `product_name`, `price`, `supplier_id`, `stock_quantity`) VALUES
(2, 'Bioflu', '10.00', 3, 500);

-- --------------------------------------------------------

--
-- Table structure for table `tbllogs`
--

DROP TABLE IF EXISTS `tbllogs`;
CREATE TABLE IF NOT EXISTS `tbllogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `logdate` datetime NOT NULL,
  `action` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllogs`
--

INSERT INTO `tbllogs` (`id`, `user`, `logdate`, `action`) VALUES
(1, 'Administrator', '2024-09-09 02:06:09', 'Added patient with firstname: Juan, lastname: Cruz, middlename: Dela , phone number: 09123456879, add date: 2024-09-09, sino: Sample'),
(2, 'Administrator', '2024-09-09 02:22:07', 'Updated patient with ID: 1 to firstname: Juans, lastname: Cruzs, middlename: Delas, phone number: 09123456879, add date: 2024-09-09, sino: Samples'),
(10, '1', '2024-09-14 00:38:45', 'Added Supplier with Name: Juan Dela Cruz, Contact Number: 09123456789, Products Ordered: Sample'),
(11, '1', '2024-09-14 00:38:52', 'Edited Supplier with ID: 1, Name: Juan Dela Cruz, Contact Number: 09123456789, Products Ordered: Samples'),
(12, '1', '2024-09-14 00:40:27', 'Deleted Supplier with Name: Juan Dela Cruz'),
(13, '1', '2024-09-14 00:43:10', 'Added Supplier with Name: Juan Dela Cruz, Contact Number: 09123456789, Products Ordered: Samples'),
(14, '1', '2024-09-14 00:43:17', 'Edited Supplier with ID: 2, Name: Juan Dela Cruz, Contact Number: 09123456789, Products Ordered: Sample'),
(15, '1', '2024-09-14 00:43:21', 'Deleted Supplier with Name: Juan Dela Cruz'),
(16, '1', '2024-09-14 01:04:46', 'Added Supplier with Name: Juan Dela Cruz, Contact Number: 09123546789, Products Ordered: Medicines'),
(17, '1', '2024-09-14 01:14:20', 'Added Inventory Item with Product Name: Bioflu'),
(18, '1', '2024-09-14 01:15:46', 'Deleted Inventory Item with Product Name: Bioflu'),
(19, '1', '2024-09-14 01:18:34', 'Added Inventory Item with Product Name: Bioflu'),
(20, '1', '2024-09-14 01:39:48', 'Edited Inventory Item with ID: 2, Product Name: Bioflus, Price: 20.00, Supplier ID: 3, Stock Quantity: 600'),
(21, '1', '2024-09-14 01:40:09', 'Edited Inventory Item with ID: 2, Product Name: Bioflu, Price: 10.00, Supplier ID: 3, Stock Quantity: 500'),
(22, 'Administrator', '2024-09-14 02:52:09', 'Added Product named Bioflue'),
(23, 'Administrator', '2024-09-14 02:53:25', 'Added Product named Bioflue'),
(24, 'Administrator', '2024-09-14 02:57:06', 'Added Product named Bioflu'),
(25, 'Administrator', '2024-09-14 02:58:09', 'Added Product named Bioflu'),
(26, 'Administrator', '2024-09-14 03:24:06', 'Added Product named Bioflu'),
(27, 'Administrator', '2024-12-08 08:58:36', 'Added patient with firstname: test, lastname: test3, middlename: test2, phone number: 2, add date: , sino: '),
(28, 'Administrator', '2024-12-08 08:59:58', 'Added patient with firstname: test, lastname: test3, middlename: test2, phone number: 2, add date: , sino: '),
(29, 'Administrator', '2024-12-08 09:00:04', 'Added patient with firstname: test, lastname: test3, middlename: test2, phone number: 2, add date: , sino: '),
(30, 'Administrator', '2024-12-08 09:00:27', 'Added patient with firstname: 1, lastname: 3, middlename: 2, phone number: 5, add date: , sino: '),
(31, 'Administrator', '2024-12-08 09:14:20', 'Added patient with firstname: 1, middlename: 2,lastname: 3, suffix: 4, phone number: 5, Date of Birth: 2024-12-09, PWD Citizent No: 6, Senior Citizen No: 7, Home Address: 8, Medical History: 9'),
(32, 'Administrator', '2024-12-08 09:28:48', 'Updated patient with ID: 1 to firstname: Juans, middlename: Delas,lastname: Cruzs, suffix: , phone number: 09123456879, Date of Birth: 2024-12-11, PWD Citizent No: 111, Senior Citizen No: 222, Home Address: 333, Medical History: 444'),
(33, 'Administrator', '2024-12-08 09:29:04', 'Updated patient with ID: 1 to firstname: Juans, middlename: Delas,lastname: Cruzs, suffix: , phone number: 09123456879, Date of Birth: 2024-12-11, PWD Citizent No: 111, Senior Citizen No: 222, Home Address: 333, Medical History: 444'),
(34, 'Administrator', '2024-12-08 09:30:51', 'Updated patient with ID: 1 to firstname: Juans, middlename: Delas,lastname: Cruzs, suffix: 111, phone number: 09123456879, Date of Birth: 2024-12-04, PWD Citizent No: 333, Senior Citizen No: 445, Home Address: 555, Medical History: 888'),
(35, 'Administrator', '2024-12-08 09:31:47', 'Updated patient with ID: 1 to firstname: Juans, middlename: Delas,lastname: Cruzs, suffix: 112, phone number: 09123456879, Date of Birth: 2024-12-19, PWD Citizent No: 222, Senior Citizen No: 333, Home Address: 444, Medical History: 555'),
(36, 'Administrator', '2024-12-08 09:32:10', 'Updated patient with ID: 1 to firstname: Juans, middlename: Delas,lastname: Cruzs, suffix: 112, phone number: 09123456879, Date of Birth: 2024-12-19, PWD Citizent No: 222, Senior Citizen No: 333, Home Address: 444, Medical History: 555'),
(37, 'Administrator', '2024-12-08 09:32:15', 'Updated patient with ID: 1 to firstname: Juans, middlename: Delas,lastname: Cruzs, suffix: 112, phone number: 09123456879, Date of Birth: 2024-12-19, PWD Citizent No: 222, Senior Citizen No: 333, Home Address: 444, Medical History: 555'),
(38, 'Administrator', '2024-12-08 09:32:17', 'Updated patient with ID: 1 to firstname: Juans, middlename: Delas,lastname: Cruzs, suffix: 112, phone number: 09123456879, Date of Birth: 2024-12-19, PWD Citizent No: 222, Senior Citizen No: 333, Home Address: 444, Medical History: 555'),
(39, 'Administrator', '2024-12-08 09:32:50', 'Updated patient with ID: 1 to firstname: Juans, middlename: Delas,lastname: Cruzs, suffix: 11, phone number: 09123456879, Date of Birth: 2024-12-15, PWD Citizent No: 22, Senior Citizen No: 33, Home Address: 44, Medical History: 55'),
(40, 'Administrator', '2024-12-08 09:35:11', 'Updated patient with ID: 1 to firstname: Juans, middlename: Delas,lastname: Cruzs, suffix: 1111, phone number: 09123456879, Date of Birth: 2024-12-17, PWD Citizent No: 3, Senior Citizen No: 4, Home Address: 5, Medical History: 6'),
(41, 'Administrator', '2024-12-08 09:36:28', 'Updated patient with ID: 1 to firstname: Juans, middlename: Delas,lastname: Cruzs, suffix: 1111, phone number: 09123456879, Date of Birth: 2024-12-17, PWD Citizent No: 3, Senior Citizen No: 4, Home Address: 5, Medical History: 6'),
(42, 'Administrator', '2024-12-08 09:36:48', 'Updated patient with ID: 2 to firstname: 12, middlename: 22,lastname: 32, suffix: 42, phone number: 52, Date of Birth: 2024-12-13, PWD Citizent No: 62, Senior Citizen No: 72, Home Address: 82, Medical History: 92'),
(43, 'Administrator', '2024-12-08 09:56:30', 'Deleted patient with ID: 0'),
(44, 'Administrator', '2024-12-08 09:56:42', 'Deleted patient with ID: 0'),
(45, 'Administrator', '2024-12-08 09:57:14', 'Deleted patient with ID: 2'),
(46, 'Administrator', '2024-12-08 09:58:07', 'Added patient with firstname: 1, middlename: 2,lastname: 3, suffix: 4, phone number: 5, Date of Birth: 2024-12-24, PWD Citizent No: 6, Senior Citizen No: 7, Home Address: 89, Medical History: 9'),
(47, 'Administrator', '2024-12-08 09:58:13', 'Deleted patient with ID: 3'),
(48, 'Administrator', '2024-12-08 09:58:29', 'Added patient with firstname: 2, middlename: 3,lastname: 4, suffix: 5, phone number: 6, Date of Birth: 2024-12-12, PWD Citizent No: 7, Senior Citizen No: 8, Home Address: 9, Medical History: 00000'),
(49, 'Administrator', '2024-12-08 09:58:42', 'Updated patient with ID: 4 to firstname: 21111, middlename: 31111,lastname: 4111, suffix: 5111, phone number: 6111, Date of Birth: 2024-12-12, PWD Citizent No: 71111, Senior Citizen No: 8111, Home Address: 9111, Medical History: 00000111'),
(50, '1', '2024-12-08 10:03:46', 'Added Supplier with Name: 1, Contact Number: 2, Address: 3'),
(51, '1', '2024-12-08 10:04:46', 'Edited Supplier with ID: 4, Name: 11, Contact Number: 21, Address: 31'),
(52, '1', '2024-12-08 10:05:16', 'Deleted Supplier with Name: 11'),
(53, '1', '2024-12-08 10:17:40', 'Added Supplier with Name: 1, Contact Number: 2, Address: 3'),
(54, '1', '2024-12-08 10:21:57', 'Added Supplier with Name: 2, Contact Number: 2, Address: 2'),
(55, '1', '2024-12-08 10:24:57', 'Deleted Supplier with Name: 2'),
(56, '1', '2024-12-08 10:25:08', 'Deleted Supplier with Name: 1'),
(57, '1', '2024-12-08 10:25:20', 'Added Supplier with Name: 1, Contact Number: 2, Address: 3'),
(58, '1', '2024-12-08 10:25:29', 'Deleted Supplier with Name: 1'),
(59, 'Administrator', '2024-12-08 10:26:11', 'Added patient with firstname: 2, middlename: 2,lastname: 2, suffix: 2, phone number: 2, Date of Birth: 2024-12-08, PWD Citizent No: 2, Senior Citizen No: 2, Home Address: 2, Medical History: 2'),
(60, 'Administrator', '2024-12-08 10:26:33', 'Deleted patient with ID: 5'),
(61, '1', '2024-12-08 10:28:07', 'Added Supplier with Name: 1, Contact Number: 1, Address: 1'),
(62, '1', '2024-12-08 10:28:13', 'Added Supplier with Name: 2, Contact Number: 2, Address: 2'),
(63, 'Administrator', '2024-12-08 10:33:38', 'Deleted Supplier with Name: '),
(64, 'Administrator', '2024-12-08 10:41:26', 'Added Product named Bioflu'),
(65, 'Administrator', '2024-12-08 10:42:04', 'Added Product named Bioflu'),
(66, 'Administrator', '2024-12-08 10:42:52', 'Added Product named Bioflu'),
(67, 'Administrator', '2024-12-08 11:01:39', 'Added Product Category: 1'),
(68, 'Administrator', '2024-12-08 11:01:48', 'Added Product Category: 1'),
(69, 'Administrator', '2024-12-08 11:01:50', 'Added Product Category: 1'),
(70, 'Administrator', '2024-12-08 11:03:03', 'Added Product Category: 1'),
(71, 'Administrator', '2024-12-08 11:03:17', 'Added Product Category: 1'),
(72, 'Administrator', '2024-12-08 11:03:31', 'Added Product Category: 1'),
(73, 'Administrator', '2024-12-08 11:04:20', 'Added Product Category: 1'),
(74, 'Administrator', '2024-12-08 11:05:16', 'Added Product Category: 1'),
(75, 'Administrator', '2024-12-08 11:05:19', 'Added Product Category: 1'),
(76, 'Administrator', '2024-12-08 11:05:37', 'Added Product Category: 2'),
(77, 'Administrator', '2024-12-08 11:05:53', 'Added Product Category: 2'),
(78, 'Administrator', '2024-12-08 11:06:02', 'Added Product Category: 2'),
(79, 'Administrator', '2024-12-08 11:06:15', 'Added Product Category: 2'),
(80, 'Administrator', '2024-12-08 11:06:29', 'Added Product Category: 1'),
(81, 'Administrator', '2024-12-08 11:07:50', 'Added Product Category: 1'),
(82, 'Administrator', '2024-12-08 11:08:06', 'Added Product Category: 1'),
(83, 'Administrator', '2024-12-08 11:08:16', 'Added Product Category: 1'),
(84, 'Administrator', '2024-12-08 11:08:30', 'Added Product Category: 1'),
(85, 'Administrator', '2024-12-08 11:08:39', 'Added Product Category: 1'),
(86, 'Administrator', '2024-12-08 11:11:17', 'Added Product named Bioflu'),
(87, 'Administrator', '2024-12-08 11:11:33', 'Added Product named 1'),
(88, 'Administrator', '2024-12-08 11:11:46', 'Added Product Category: 1'),
(89, 'Administrator', '2024-12-08 11:12:28', 'Added Product Category: 1'),
(90, 'Administrator', '2024-12-08 11:22:18', 'Added Product named '),
(91, 'Administrator', '2024-12-08 11:25:28', 'Added Category: '),
(92, 'Administrator', '2024-12-08 11:25:47', 'Added Category: '),
(93, 'Administrator', '2024-12-08 11:26:02', 'Added Category: '),
(94, 'Administrator', '2024-12-08 11:26:11', 'Added Category: '),
(95, 'Administrator', '2024-12-08 11:26:32', 'Added Category: 2'),
(96, 'Administrator', '2024-12-08 11:27:43', 'Added Category: 1'),
(97, 'Administrator', '2024-12-08 11:28:17', 'Added Category: 2'),
(98, 'Administrator', '2024-12-08 11:28:33', 'Added Category: 1'),
(99, 'Administrator', '2024-12-08 11:28:53', 'Added Category: 1'),
(100, 'Administrator', '2024-12-08 11:29:02', 'Added Category: 1'),
(101, 'Administrator', '2024-12-08 11:29:18', 'Added Category: 2'),
(102, 'Administrator', '2024-12-08 11:29:34', 'Added Category: 2'),
(103, 'Administrator', '2024-12-08 11:29:51', 'Added Category: 1'),
(104, 'Administrator', '2024-12-08 11:30:03', 'Added Category: 1'),
(105, 'Administrator', '2024-12-08 11:30:52', 'Added Category: 1'),
(106, 'Administrator', '2024-12-08 11:31:10', 'Added Category: 1'),
(107, 'Administrator', '2024-12-08 11:31:19', 'Added Category: 1'),
(108, 'Administrator', '2024-12-08 11:31:55', 'Added Category: 1'),
(109, 'Administrator', '2024-12-08 11:32:05', 'Added Category: 2'),
(110, 'Administrator', '2024-12-08 11:32:24', 'Added Category: 2'),
(111, 'Administrator', '2024-12-08 11:32:51', 'Added Category: 1'),
(112, 'Administrator', '2024-12-08 11:33:26', 'Added Category: 3'),
(113, 'Administrator', '2024-12-08 11:34:16', 'Added Category: 1'),
(114, 'Administrator', '2024-12-08 11:34:52', 'Added Product Category: 2'),
(115, 'Administrator', '2024-12-08 11:35:05', 'Added Product Category: 1'),
(116, 'Administrator', '2024-12-08 11:37:40', 'Added Category: 1'),
(117, 'Administrator', '2024-12-08 11:37:53', 'Added Product Category: 1'),
(118, 'Administrator', '2024-12-08 11:39:28', 'Added Category: 3'),
(119, 'Administrator', '2024-12-08 11:39:47', 'Added Category: 2'),
(120, 'Administrator', '2024-12-08 11:40:01', 'Added Category: 1'),
(121, 'Administrator', '2024-12-08 11:44:11', 'Added Category: 1'),
(122, 'Administrator', '2024-12-08 11:45:30', 'Added Product Category: 1'),
(123, 'Administrator', '2024-12-08 11:46:05', 'Added Product Category: 1'),
(124, 'Administrator', '2024-12-08 11:46:20', 'Added Product Category: 1'),
(125, 'Administrator', '2024-12-08 11:46:26', 'Added Product Category: 1'),
(126, 'Administrator', '2024-12-08 11:46:33', 'Added Product Category: 2'),
(127, 'Administrator', '2024-12-08 11:58:53', 'Added Teacher with name of test, test, T'),
(128, 'Administrator', '2024-12-08 11:59:27', 'Added Teacher with name of test'),
(129, 'Administrator', '2024-12-08 12:02:10', 'Added Teacher with name of test'),
(130, 'Administrator', '2024-12-08 12:02:19', 'Added Teacher with name of test'),
(131, 'Administrator', '2024-12-08 12:02:43', 'Update Teacher with name of test'),
(132, 'Administrator', '2024-12-08 12:03:02', 'Added Teacher with name of test1'),
(133, 'Administrator', '2024-12-08 12:03:06', 'Added Teacher with name of test1'),
(134, 'Administrator', '2024-12-08 12:03:25', 'Added Teacher with name of test1'),
(135, 'Administrator', '2024-12-08 12:05:05', 'Update Teacher with name of test12'),
(136, 'Administrator', '2024-12-08 12:07:25', 'Update Teacher with name of test12'),
(137, 'Administrator', '2024-12-08 12:07:47', 'Update Teacher with name of test12'),
(138, 'Administrator', '2024-12-08 12:08:07', 'Update Teacher with name of test123'),
(139, 'Administrator', '2024-12-08 12:08:16', 'Update Teacher with name of test123'),
(140, 'Administrator', '2024-12-08 12:08:24', 'Update Teacher with name of test123'),
(141, 'Administrator', '2024-12-08 12:10:08', 'Update Teacher with name of test123 12312312'),
(142, 'Administrator', '2024-12-08 12:10:15', 'Update Teacher with name of test123 12312312'),
(143, 'Administrator', '2024-12-08 12:10:39', 'Update Teacher with name of test123 12312312'),
(144, 'Administrator', '2024-12-08 12:58:23', 'Added patient with firstname: 1, middlename: 2,lastname: 3, suffix: , phone number: 4, Date of Birth: 2024-12-08, PWD Citizent No: 5, Senior Citizen No: 6, Home Address: 7, Medical History: 8'),
(145, 'Administrator', '2024-12-08 12:59:10', 'Added patient with firstname: test1, middlename: 1,lastname: 2, suffix: , phone number: 3, Date of Birth: 2024-12-17, PWD Citizent No: , Senior Citizen No: , Home Address: 4, Medical History: 5'),
(146, 'Administrator', '2024-12-08 13:09:28', 'Added patient with firstname: test3, middlename: ,lastname: test33, suffix: , phone number: 3, Date of Birth: 2024-12-20, PWD Citizent No: , Senior Citizen No: , Home Address: 4, Medical History: 5'),
(147, 'Administrator', '2024-12-08 13:09:36', 'Updated patient with ID: 8 to firstname: test3, middlename: ,lastname: test33, suffix: , phone number: 3, Date of Birth: 2024-12-20, PWD Citizent No: , Senior Citizen No: , Home Address: 4, Medical History: 5'),
(148, 'Administrator', '2024-12-08 13:09:43', 'Updated patient with ID: 8 to firstname: test33333, middlename: ,lastname: test3333333, suffix: , phone number: 333333, Date of Birth: 2024-12-20, PWD Citizent No: , Senior Citizen No: , Home Address: 4333, Medical History: 5333'),
(149, 'Administrator', '2024-12-08 13:41:00', 'Added Product Category: 1'),
(150, 'Administrator', '2024-12-08 13:41:22', 'Added Product Category: 1'),
(151, 'Administrator', '2024-12-08 13:43:15', 'Added Category: 2'),
(152, 'Administrator', '2024-12-08 13:49:25', 'Added Product Category: 2'),
(153, 'Administrator', '2024-12-08 13:50:18', 'Added Category: 2'),
(154, 'Administrator', '2024-12-08 13:50:30', 'Added Category: 2'),
(155, 'Administrator', '2024-12-08 13:50:44', 'Added Category: 2'),
(156, 'Administrator', '2024-12-08 13:50:56', 'Added Category: 1'),
(157, 'Administrator', '2024-12-08 13:54:09', 'Added Category: 1'),
(158, 'Administrator', '2024-12-08 13:54:15', 'Added Category: 1'),
(159, 'Administrator', '2024-12-08 13:54:23', 'Added Category: 2'),
(160, 'Administrator', '2024-12-08 13:54:28', 'Added Category: 1'),
(161, '1', '2024-12-08 17:05:59', 'Added Prescription ID: '),
(162, '', '2024-12-08 19:41:23', 'Added Special Prescription ID: '),
(163, '', '2024-12-08 19:42:03', 'Added Special Prescription ID: '),
(164, 'Administrator', '2024-12-09 11:00:27', 'Added Product Category: 2'),
(165, 'Administrator', '2024-12-09 11:01:02', 'Added Product Category: 1'),
(166, 'Administrator', '2024-12-09 11:01:29', 'Added Product Category: 1'),
(167, 'Administrator', '2024-12-09 11:02:21', 'Added Product Category: 1'),
(168, 'Administrator', '2024-12-09 11:02:34', 'Added Category: 1'),
(169, 'Administrator', '2024-12-09 11:02:44', 'Added Category: 2'),
(170, 'Administrator', '2024-12-09 11:15:38', 'Added Category: 2');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

DROP TABLE IF EXISTS `tblorder`;
CREATE TABLE IF NOT EXISTS `tblorder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `transno` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cash` int(11) DEFAULT NULL,
  `change` int(11) DEFAULT NULL,
  `si_no` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`id`, `product_id`, `quantity`, `date_updated`, `user_id`, `transno`, `customer`, `total`, `date_created`, `cash`, `change`, `si_no`) VALUES
(1, 1, 10, '2024-09-13 19:07:46', 1, '09142024-0001', 'Juan Dela Cruz', 100, '2024-09-13 19:07:46', 500, 400, NULL),
(2, 1, 1, '2024-09-22 19:08:44', 1, '09232024-0001', 'Pepito Manaloto', 15, '2024-09-22 19:08:44', 100, 85, NULL),
(5, 12, 1, '2024-12-09 03:15:58', 1, '12092024-0001', '', 63, '2024-12-09 03:15:58', 63, 0, NULL),
(6, 12, 1, '2024-12-09 03:16:19', 1, '12092024-0002', '', 63, '2024-12-09 03:16:19', 63, 0, NULL),
(7, 12, 1, '2024-12-09 03:17:41', 1, '12092024-0003', '', 63, '2024-12-09 03:17:41', 63, 0, '2024120911451733715919');

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

DROP TABLE IF EXISTS `tblpatient`;
CREATE TABLE IF NOT EXISTS `tblpatient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middlename` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneno` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adddate` date DEFAULT NULL,
  `sino` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suffix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd_citizen_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senior_citizen_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `medical_history` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblpatient`
--

INSERT INTO `tblpatient` (`id`, `firstname`, `lastname`, `middlename`, `phoneno`, `adddate`, `sino`, `suffix`, `date_of_birth`, `pwd_citizen_no`, `senior_citizen_no`, `home_address`, `medical_history`) VALUES
(1, 'Juans', 'Cruzs', 'Delas', '09123456879', '2024-09-09', 'Samples', '1111', '2024-12-17', '3', '4', '5', '6'),
(4, '21111', '4111', '31111', '6111', NULL, NULL, '5111', '2024-12-12', '71111', '8111', '9111', '00000111'),
(6, '1', '3', '2', '4', NULL, NULL, '', '2024-12-08', '5', '6', '7', '8'),
(7, 'test1', '2', '1', '3', NULL, NULL, '', '2024-12-17', '', '', '4', '5'),
(8, 'test33333', 'test3333333', '', '333333', NULL, NULL, '', '2024-12-20', '', '', '4333', '5333');

-- --------------------------------------------------------

--
-- Table structure for table `tblprescription`
--

DROP TABLE IF EXISTS `tblprescription`;
CREATE TABLE IF NOT EXISTS `tblprescription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `prescription_date` date DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `refraction_od_sph` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refraction_od_cyl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refraction_od_axis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refraction_od_add` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refraction_od_prism_base` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refraction_od_pd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refraction_os_sph` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refraction_os_cyl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refraction_os_axis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refraction_os_add` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refraction_os_prism_base` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refraction_os_pd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spectacle_od_sph` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spectacle_od_cyl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spectacle_od_axis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spectacle_od_add` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spectacle_od_prism_base` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spectacle_od_pd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spectacle_os_sph` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spectacle_os_cyl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spectacle_os_axis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spectacle_os_add` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spectacle_os_prism_base` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spectacle_os_pd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_lens_od_sph` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_lens_od_cyl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_lens_od_axis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_lens_od_add` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_lens_od_prism_base` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_lens_od_pd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_lens_os_sph` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_lens_os_cyl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_lens_os_axis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_lens_os_add` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_lens_os_prism_base` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_lens_os_pd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnosis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frame_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `patient_id` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblprescription`
--

INSERT INTO `tblprescription` (`id`, `patient_id`, `prescription_date`, `details`, `refraction_od_sph`, `refraction_od_cyl`, `refraction_od_axis`, `refraction_od_add`, `refraction_od_prism_base`, `refraction_od_pd`, `refraction_os_sph`, `refraction_os_cyl`, `refraction_os_axis`, `refraction_os_add`, `refraction_os_prism_base`, `refraction_os_pd`, `spectacle_od_sph`, `spectacle_od_cyl`, `spectacle_od_axis`, `spectacle_od_add`, `spectacle_od_prism_base`, `spectacle_od_pd`, `spectacle_os_sph`, `spectacle_os_cyl`, `spectacle_os_axis`, `spectacle_os_add`, `spectacle_os_prism_base`, `spectacle_os_pd`, `contact_lens_od_sph`, `contact_lens_od_cyl`, `contact_lens_od_axis`, `contact_lens_od_add`, `contact_lens_od_prism_base`, `contact_lens_od_pd`, `contact_lens_os_sph`, `contact_lens_os_cyl`, `contact_lens_os_axis`, `contact_lens_os_add`, `contact_lens_os_prism_base`, `contact_lens_os_pd`, `diagnosis`, `frame_type`, `is_delete`) VALUES
(1, NULL, NULL, NULL, '1.1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2', 1),
(2, 8, '2024-12-08', NULL, '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31', '32', '33', '34', '35', '36', 'asdasdasdasdasd', '3', 0),
(3, 8, '2024-12-08', NULL, '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31', '32', '33', '34', '35', '36', 'asdasdasdasdasd', '3', 0),
(4, 4, '2024-12-08', NULL, '1.1', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31', '32', '33', '34', '35', '36', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

DROP TABLE IF EXISTS `tblproduct`;
CREATE TABLE IF NOT EXISTS `tblproduct` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` float DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT '1',
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cat_id` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `model_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frame_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frame_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lens_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lens_coating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sph` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `i_add` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `price`, `qty`, `status`, `description`, `image`, `date_created`, `date_updated`, `cat_id`, `supplier_id`, `model_number`, `frame_brand`, `frame_type`, `lens_type`, `lens_coating`, `sph`, `i_add`) VALUES
(1, 'Bioflu', 15, 489, 'ARCHIVED', 'This medicine is used for the relief of clogged nose, runny nose, cough from postnasal drip, itchy and watery eyes, sneezing, headache, sore throat, body aches, and fever associated with the common cold, allergic rhinitis, sinusitis, flu and other minor respiratory tract infections', '1726253889050_bioflu.png', '2024-09-14 02:58:09', '2024-12-08 00:00:00', 1, 3, '88', '88', '88', '88', '88', '88', '88'),
(2, 'asd', 2, 1, 'ACTIVE', '3', NULL, '2024-12-08 00:00:00', '2024-12-08 00:00:00', 2, 8, '9', '9', '9', '9', '9', '9', '9'),
(3, '11111', 5, 1, 'ACTIVE', NULL, NULL, '2024-12-08 00:00:00', '2024-12-08 00:00:00', 1, 3, '1', '2', '3', '4', '5', '6', '7'),
(4, NULL, NULL, 1, 'ARCHIVED', NULL, NULL, '2024-12-08 00:00:00', '2024-12-08 00:00:00', 1, 3, '4', '4', '4', '4', '4', '4', '4'),
(5, NULL, NULL, 1, 'ARCHIVED', NULL, NULL, '2024-12-08 00:00:00', '2024-12-08 00:00:00', 1, 3, '6', '6', '6', '6', '6', '6', '6'),
(6, '2222', 5, 1, 'ACTIVE', NULL, NULL, '2024-12-08 00:00:00', '2024-12-08 00:00:00', 1, 8, '1', '1', '1', '1', '1', '1', '1'),
(7, '3333', 6, 1, 'ACTIVE', NULL, NULL, '2024-12-08 00:00:00', '2024-12-08 00:00:00', 1, 8, '1', '1', '1', '1', '1', '1', '1'),
(8, '123123', 50, 10, 'ACTIVE', NULL, NULL, '2024-12-08 00:00:00', '2024-12-08 00:00:00', 2, 3, '1', '1', '1', '1', '1', '1', '1'),
(9, NULL, NULL, 1, 'ARCHIVED', NULL, NULL, '2024-12-08 00:00:00', '2024-12-08 11:46:33', 2, 3, '2', '2', '2', '2', '2', '2', '2'),
(10, '123123', 100, 5, 'ACTIVE', NULL, NULL, '2024-12-08 00:00:00', '2024-12-08 00:00:00', 1, 8, '123', '123', '123', '213', '123', '123', '123'),
(11, 'test1', 1, 2, 'ACTIVE', NULL, NULL, '2024-12-08 00:00:00', '2024-12-08 13:49:25', 2, 3, '1', '1', '1', '1', '1', '1', '1'),
(12, 'test333', 63, 7, 'ACTIVE', NULL, NULL, '2024-12-09 00:00:00', '2024-12-09 00:00:00', 2, 8, '13', NULL, '23', NULL, '33', '43', '53');

-- --------------------------------------------------------

--
-- Table structure for table `tblsales`
--

DROP TABLE IF EXISTS `tblsales`;
CREATE TABLE IF NOT EXISTS `tblsales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `down_payment` decimal(10,2) DEFAULT '0.00',
  `total_amount` decimal(10,2) NOT NULL,
  `remaining_balance` decimal(10,2) NOT NULL,
  `status` enum('paid','partial') COLLATE utf8mb4_unicode_ci DEFAULT 'partial',
  `sale_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblsms`
--

DROP TABLE IF EXISTS `tblsms`;
CREATE TABLE IF NOT EXISTS `tblsms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `sent_date` date DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `patient_id` (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblspecialprescription`
--

DROP TABLE IF EXISTS `tblspecialprescription`;
CREATE TABLE IF NOT EXISTS `tblspecialprescription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(255) NOT NULL,
  `supplier_id` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `due_date` varchar(255) NOT NULL,
  `od_sph` varchar(255) NOT NULL,
  `od_cyl` varchar(255) NOT NULL,
  `od_axis` varchar(255) NOT NULL,
  `od_add` varchar(255) NOT NULL,
  `od_prism_base` varchar(255) NOT NULL,
  `od_pd` varchar(255) NOT NULL,
  `od_quantity` varchar(255) NOT NULL,
  `os_sph` varchar(255) NOT NULL,
  `os_cyl` varchar(255) NOT NULL,
  `os_axis` varchar(255) NOT NULL,
  `os_add` varchar(255) NOT NULL,
  `os_prism_base` varchar(255) NOT NULL,
  `os_pd` varchar(255) NOT NULL,
  `os_quantity` varchar(255) NOT NULL,
  `dbc` varchar(255) NOT NULL,
  `lfv` varchar(255) NOT NULL,
  `tint` varchar(255) NOT NULL,
  `lens` varchar(255) NOT NULL,
  `frame_code` varchar(255) NOT NULL,
  `frame_type` varchar(255) NOT NULL,
  `frame_material` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `claimed_date` varchar(255) NOT NULL,
  `date_created` varchar(255) NOT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblspecialprescription`
--

INSERT INTO `tblspecialprescription` (`id`, `patient_id`, `supplier_id`, `date`, `due_date`, `od_sph`, `od_cyl`, `od_axis`, `od_add`, `od_prism_base`, `od_pd`, `od_quantity`, `os_sph`, `os_cyl`, `os_axis`, `os_add`, `os_prism_base`, `os_pd`, `os_quantity`, `dbc`, `lfv`, `tint`, `lens`, `frame_code`, `frame_type`, `frame_material`, `description`, `remarks`, `status`, `claimed_date`, `date_created`, `is_delete`) VALUES
(1, '4', '3', '2024-12-01', '2024-12-02', '11', '21', '31', '41', '51', '61', '71', '', '', '', '', '', '', '', '81', '91', '101', '111', '121', '2', '2', '131', '141', '1', '2024-12-03', '2024-12-08', 1),
(2, '1', '3', '2024-12-20', '2025-01-02', '1', '1', '1', '1', '1', '1', '11', '', '', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2', '', '2024-12-08', 0),
(3, '7', '8', '2024-12-18', '2024-12-25', '1', '1', '1', '1', '1', '1', '1', '', '', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '2024-12-08', 0),
(4, '1', '3', '2025-01-01', '2024-12-18', '1', '2', '3', '4', '5', '6', '7', '88', '99', '1010', '1111', '1212', '1313', '1414', '15', '16', '17', '18', '19', '1', '1', '20', '21', '2', '', '2024-12-09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblsupplier`
--

DROP TABLE IF EXISTS `tblsupplier`;
CREATE TABLE IF NOT EXISTS `tblsupplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `products_ordered` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblsupplier`
--

INSERT INTO `tblsupplier` (`id`, `name`, `contact_number`, `products_ordered`, `address`, `date_created`) VALUES
(3, 'Juan Dela Cruz', '09123546789', 'Medicines', '', ''),
(8, '1', '1', NULL, '1', '2024-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

DROP TABLE IF EXISTS `tbluser`;
CREATE TABLE IF NOT EXISTS `tbluser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `name`, `username`, `password`, `role`, `active`, `photo`) VALUES
(1, 'ADMINISTRATOR', 'admin@info.com', '12345678', 'ADMINISTRATOR', 'ACTIVE', '1.png'),
(2, 'test', 'test', 'test', 'ADMINISTRATOR', 'ACTIVE', ''),
(3, 'test', 'test', 'test', '', 'ACTIVE', ''),
(4, 'test1', 'test1', 'test1', '', 'ACTIVE', ''),
(5, 'test1', 'test1', 'test1', '', 'ACTIVE', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblvisithistory`
--

DROP TABLE IF EXISTS `tblvisithistory`;
CREATE TABLE IF NOT EXISTS `tblvisithistory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `visit_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `patient_id` (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwsupplier`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vwsupplier`;
CREATE TABLE IF NOT EXISTS `vwsupplier` (
`id` int(11)
,`product_name` varchar(100)
,`price` decimal(10,2)
,`stock_quantity` int(11)
,`supplier_id` int(11)
,`supplier` varchar(123)
);

-- --------------------------------------------------------

--
-- Structure for view `vwsupplier`
--
DROP TABLE IF EXISTS `vwsupplier`;

CREATE ALGORITHM=UNDEFINED DEFINER=`rec12`@`%` SQL SECURITY DEFINER VIEW `vwsupplier`  AS  select `i`.`id` AS `id`,`i`.`product_name` AS `product_name`,`i`.`price` AS `price`,`i`.`stock_quantity` AS `stock_quantity`,`i`.`supplier_id` AS `supplier_id`,concat(`s`.`name`,' | ',`s`.`contact_number`) AS `supplier` from (`tblinventory` `i` join `tblsupplier` `s` on((`s`.`id` = `i`.`supplier_id`))) ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblinventory`
--
ALTER TABLE `tblinventory`
  ADD CONSTRAINT `tblinventory_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `tblsupplier` (`id`);

--
-- Constraints for table `tblprescription`
--
ALTER TABLE `tblprescription`
  ADD CONSTRAINT `tblprescription_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `tblpatient` (`id`);

--
-- Constraints for table `tblsms`
--
ALTER TABLE `tblsms`
  ADD CONSTRAINT `tblsms_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `tblpatient` (`id`);

--
-- Constraints for table `tblvisithistory`
--
ALTER TABLE `tblvisithistory`
  ADD CONSTRAINT `tblvisithistory_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `tblpatient` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
