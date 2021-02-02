-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2020 at 07:13 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `status`) VALUES
(1, 'Sohel', 'mhsohel017@gmail.com', '12345', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `unit`, `photo`) VALUES
(40, 'Durian', '130', '70', 'durian.jpg'),
(43, 'Lichi', '120', '10', '1558176969702-jpg-500x500.jpg'),
(44, 'Mango', '140', '50', 'mango-fruits.jpg'),
(45, 'Avocardo', '340', '100', 'avocados.webp');

-- --------------------------------------------------------

--
-- Table structure for table `return_table`
--

CREATE TABLE `return_table` (
  `id` bigint(20) NOT NULL,
  `productid` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `return_table`
--

INSERT INTO `return_table` (`id`, `productid`, `quantity`, `total`, `date`) VALUES
(18, 40, 9, '1170', '2020-02-20'),
(19, 40, 900, '117000', '2020-02-19'),
(20, 40, 12, '1560', '2020-02-21'),
(21, 40, 12, '1560', '2020-02-21'),
(22, 40, 130, '16900', '2020-02-20');

-- --------------------------------------------------------

--
-- Table structure for table `stock_in`
--

CREATE TABLE `stock_in` (
  `id` bigint(20) NOT NULL,
  `invoice_no` bigint(20) NOT NULL,
  `adminid` bigint(20) NOT NULL,
  `productid` bigint(20) NOT NULL,
  `quentity` int(11) NOT NULL,
  `sub_total` decimal(10,0) NOT NULL,
  `discount` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_in`
--

INSERT INTO `stock_in` (`id`, `invoice_no`, `adminid`, `productid`, `quentity`, `sub_total`, `discount`, `total`, `date`) VALUES
(51, 1, 1, 40, 10, '1300', 9, '1183', '2020-02-21'),
(53, 2, 1, 43, 5, '600', 5, '570', '2020-02-19'),
(55, 3, 1, 43, 10, '1200', 10, '1080', '0000-00-00'),
(56, 4, 1, 43, 0, '0', 0, '0', '0000-00-00'),
(57, 5, 1, 40, 78, '10140', 80, '2028', '2020-02-21');

-- --------------------------------------------------------

--
-- Table structure for table `stock_out`
--

CREATE TABLE `stock_out` (
  `id` bigint(20) NOT NULL,
  `invoice_no` bigint(20) NOT NULL,
  `adminid` bigint(20) NOT NULL,
  `productid` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sub_total` decimal(10,0) NOT NULL,
  `discount` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `customer_info` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_out`
--

INSERT INTO `stock_out` (`id`, `invoice_no`, `adminid`, `productid`, `quantity`, `sub_total`, `discount`, `total`, `customer_info`, `date`) VALUES
(36, 1, 1, 40, 10, '1300', 20, '1040', 'Sorna,Taj Mohal Road,Dhaka', '2020-02-20'),
(39, 4, 1, 43, 10, '130', 10, '124', 'Hridoy Islam,Jigatola,Dhaka', '2020-02-19'),
(42, 5, 1, 40, 23, '2990', 90, '299', 'Mariya', '2020-02-21'),
(45, 7, 1, 40, 10, '1300', 9, '1183', 'Viba', '2020-02-21');

-- --------------------------------------------------------

--
-- Table structure for table `wastage`
--

CREATE TABLE `wastage` (
  `id` bigint(20) NOT NULL,
  `productid` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wastage`
--

INSERT INTO `wastage` (`id`, `productid`, `quantity`, `total`, `date`) VALUES
(19, 40, 100, '1300', '2020-02-19'),
(20, 40, 10, '1300', '2020-02-20'),
(28, 40, 12, '1560', '2020-02-21'),
(29, 40, 10, '1300', '2020-02-21'),
(31, 40, 12, '1560', '2020-02-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_table`
--
ALTER TABLE `return_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `stock_in`
--
ALTER TABLE `stock_in`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoiceid` (`invoice_no`),
  ADD KEY `adminid` (`adminid`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `stock_out`
--
ALTER TABLE `stock_out`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_no` (`invoice_no`),
  ADD KEY `adminid` (`adminid`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `wastage`
--
ALTER TABLE `wastage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productid` (`productid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `return_table`
--
ALTER TABLE `return_table`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `stock_in`
--
ALTER TABLE `stock_in`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `stock_out`
--
ALTER TABLE `stock_out`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `wastage`
--
ALTER TABLE `wastage`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `return_table`
--
ALTER TABLE `return_table`
  ADD CONSTRAINT `return_table_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock_in`
--
ALTER TABLE `stock_in`
  ADD CONSTRAINT `stock_in_ibfk_1` FOREIGN KEY (`adminid`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_in_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock_out`
--
ALTER TABLE `stock_out`
  ADD CONSTRAINT `stock_out_ibfk_1` FOREIGN KEY (`adminid`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_out_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wastage`
--
ALTER TABLE `wastage`
  ADD CONSTRAINT `wastage_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
