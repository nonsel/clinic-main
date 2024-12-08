-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 29, 2024 at 05:08 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `port_hcmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int NOT NULL,
  `category` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `category`, `status`) VALUES
(1, 'Internal Medicine', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `tblinventory`
--

CREATE TABLE `tblinventory` (
  `id` int NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `supplier_id` int DEFAULT NULL,
  `stock_quantity` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblinventory`
--

INSERT INTO `tblinventory` (`id`, `product_name`, `price`, `supplier_id`, `stock_quantity`) VALUES
(2, 'Bioflu', 10.00, 3, 500);

-- --------------------------------------------------------

--
-- Table structure for table `tbllogs`
--

CREATE TABLE `tbllogs` (
  `id` int NOT NULL,
  `user` varchar(50) NOT NULL,
  `logdate` datetime NOT NULL,
  `action` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(26, 'Administrator', '2024-09-14 03:24:06', 'Added Product named Bioflu');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  `transno` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer` varchar(100) DEFAULT NULL,
  `total` int DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cash` int DEFAULT NULL,
  `change` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`id`, `product_id`, `quantity`, `date_updated`, `user_id`, `transno`, `customer`, `total`, `date_created`, `cash`, `change`) VALUES
(1, 1, 10, '2024-09-13 19:07:46', 1, '09142024-0001', 'Juan Dela Cruz', 100, '2024-09-13 19:07:46', 500, 400),
(2, 1, 1, '2024-09-22 19:08:44', 1, '09232024-0001', 'Pepito Manaloto', 15, '2024-09-22 19:08:44', 100, 85);

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

CREATE TABLE `tblpatient` (
  `id` int NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middlename` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneno` varchar(20) DEFAULT NULL,
  `adddate` date DEFAULT NULL,
  `sino` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblpatient`
--

INSERT INTO `tblpatient` (`id`, `firstname`, `lastname`, `middlename`, `phoneno`, `adddate`, `sino`) VALUES
(1, 'Juans', 'Cruzs', 'Delas', '09123456879', '2024-09-09', 'Samples');

-- --------------------------------------------------------

--
-- Table structure for table `tblprescription`
--

CREATE TABLE `tblprescription` (
  `id` int NOT NULL,
  `patient_id` int DEFAULT NULL,
  `prescription_date` date DEFAULT NULL,
  `details` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `qty` int NOT NULL DEFAULT '1',
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `description` text NOT NULL,
  `image` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cat_id` int NOT NULL,
  `supplier_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `price`, `qty`, `status`, `description`, `image`, `date_created`, `date_updated`, `cat_id`, `supplier_id`) VALUES
(1, 'Bioflu', 15, 489, 'ACTIVE', 'This medicine is used for the relief of clogged nose, runny nose, cough from postnasal drip, itchy and watery eyes, sneezing, headache, sore throat, body aches, and fever associated with the common cold, allergic rhinitis, sinusitis, flu and other minor respiratory tract infections', '1726253889050_bioflu.png', '2024-09-14 02:58:09', '2024-09-14 02:58:09', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tblsales`
--

CREATE TABLE `tblsales` (
  `id` int NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `down_payment` decimal(10,2) DEFAULT '0.00',
  `total_amount` decimal(10,2) NOT NULL,
  `remaining_balance` decimal(10,2) NOT NULL,
  `status` enum('paid','partial') DEFAULT 'partial',
  `sale_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblsms`
--

CREATE TABLE `tblsms` (
  `id` int NOT NULL,
  `patient_id` int DEFAULT NULL,
  `message` text,
  `sent_date` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblsupplier`
--

CREATE TABLE `tblsupplier` (
  `id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `products_ordered` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblsupplier`
--

INSERT INTO `tblsupplier` (`id`, `name`, `contact_number`, `products_ordered`) VALUES
(3, 'Juan Dela Cruz', '09123546789', 'Medicines');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `active` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `name`, `username`, `password`, `role`, `active`, `photo`) VALUES
(1, 'ADMINISTRATOR', 'admin@info.com', '12345678', 'ADMINISTRATOR', 'ACTIVE', '1.png');

-- --------------------------------------------------------

--
-- Table structure for table `tblvisithistory`
--

CREATE TABLE `tblvisithistory` (
  `id` int NOT NULL,
  `patient_id` int DEFAULT NULL,
  `visit_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwsupplier`
-- (See below for the actual view)
--
CREATE TABLE `vwsupplier` (
`id` int
,`product_name` varchar(100)
,`price` decimal(10,2)
,`stock_quantity` int
,`supplier_id` int
,`supplier` varchar(123)
);

-- --------------------------------------------------------

--
-- Structure for view `vwsupplier`
--
DROP TABLE IF EXISTS `vwsupplier`;

CREATE ALGORITHM=UNDEFINED DEFINER=`rec12`@`%` SQL SECURITY DEFINER VIEW `vwsupplier`  AS SELECT `i`.`id` AS `id`, `i`.`product_name` AS `product_name`, `i`.`price` AS `price`, `i`.`stock_quantity` AS `stock_quantity`, `i`.`supplier_id` AS `supplier_id`, concat(`s`.`name`,' | ',`s`.`contact_number`) AS `supplier` FROM (`tblinventory` `i` join `tblsupplier` `s` on((`s`.`id` = `i`.`supplier_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblinventory`
--
ALTER TABLE `tblinventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `tbllogs`
--
ALTER TABLE `tbllogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblprescription`
--
ALTER TABLE `tblprescription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsales`
--
ALTER TABLE `tblsales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsms`
--
ALTER TABLE `tblsms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `tblsupplier`
--
ALTER TABLE `tblsupplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblvisithistory`
--
ALTER TABLE `tblvisithistory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblinventory`
--
ALTER TABLE `tblinventory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbllogs`
--
ALTER TABLE `tbllogs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblprescription`
--
ALTER TABLE `tblprescription`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblsales`
--
ALTER TABLE `tblsales`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblsms`
--
ALTER TABLE `tblsms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblsupplier`
--
ALTER TABLE `tblsupplier`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblvisithistory`
--
ALTER TABLE `tblvisithistory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

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