-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 29, 2017 at 10:52 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bilal_caters`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_items`
--

CREATE TABLE `booking_items` (
  `events_code` int(11) NOT NULL,
  `items_code` varchar(150) NOT NULL,
  `quantity_booked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_items`
--

INSERT INTO `booking_items` (`events_code`, `items_code`, `quantity_booked`) VALUES
(1000012, 'TNT_10001', 5),
(10000001, 'TNT_10001', 10),
(10000004, 'TNT_10001', 5),
(10000004, 'TNT_10002', 4),
(10000005, 'TNT_10001', 5),
(10000006, 'TNT_10001', 3),
(10000006, 'TNT_10002', 4),
(10000007, 'TNT_10001', 3),
(10000007, 'TNT_10002', 4),
(10000008, 'TNT_10001', 3),
(10000008, 'TNT_10002', 4),
(10000009, 'TNT_10001', 3),
(10000009, 'TNT_10002', 4),
(10000010, 'TNT_10001', 3),
(10000010, 'TNT_10002', 4),
(10000011, 'TNT_10001', 3),
(10000011, 'TNT_10002', 4),
(10000012, 'TNT_10001', 11),
(10000012, 'TNT_10002', 3),
(10000013, 'TNT_10001', 3),
(10000013, 'TNT_10002', 3),
(10000014, 'TNT_10001', 5),
(10000014, 'TNT_10002', 2),
(10000015, '0', 1),
(10000015, 'TNT_10001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cost_booking`
--

CREATE TABLE `cost_booking` (
  `events_code` int(11) NOT NULL,
  `gross_amount` double NOT NULL,
  `discount_amount` double NOT NULL,
  `total_amount` double NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `balance` double NOT NULL,
  `advance` double NOT NULL,
  `recieved_amount` double NOT NULL,
  `recieved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cost_booking`
--

INSERT INTO `cost_booking` (`events_code`, `gross_amount`, `discount_amount`, `total_amount`, `date`, `balance`, `advance`, `recieved_amount`, `recieved`) VALUES
(1000012, 20, 0, 20, '2017-10-14 23:19:03', 20, 0, 0, 0),
(10000001, 40, 10, 30, '2017-09-30 17:24:44', 10, 20, 0, 0),
(10000002, 8300, 0, 8300, '2017-10-15 13:31:18', 0, 8300, 0, 0),
(10000003, 8300, 0, 8300, '2017-10-15 13:32:23', 0, 8300, 0, 0),
(10000004, 8300, 0, 8300, '2017-10-15 13:36:17', 0, 8300, 0, 0),
(10000005, 3500, 200, 3500, '2017-10-15 13:45:03', 0, 3500, 0, 0),
(10000006, 6900, 0, 6900, '2017-10-15 14:14:25', 0, 6900, 0, 0),
(10000007, 6900, 0, 6900, '2017-10-15 14:15:06', 0, 6900, 0, 0),
(10000008, 6900, 0, 6900, '2017-10-15 14:16:11', 0, 6900, 0, 0),
(10000009, 6900, 0, 6900, '2017-10-15 14:16:34', 0, 6900, 0, 0),
(10000010, 6900, 0, 6900, '2017-10-15 14:17:13', 0, 6900, 0, 0),
(10000011, 6900, 0, 6900, '2017-10-15 14:23:08', 0, 6900, 0, 0),
(10000012, 11300, 500, 11300, '2017-10-15 20:30:15', 0, 11300, 0, 0),
(10000013, 5700, 10, 5700, '2017-10-26 22:57:39', 0, 5700, 0, 0),
(10000014, 5900, 0, 5900, '2017-10-28 00:26:59', 0, 5900, 0, 0),
(10000015, 4243, 100, 4243, '2017-10-29 08:33:42', 1143, 4243, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `events_code` int(50) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_number` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_booking`
--

CREATE TABLE `event_booking` (
  `S.No` int(11) NOT NULL,
  `events_code` int(11) NOT NULL,
  `event_name` varchar(200) NOT NULL,
  `event_date_start` datetime NOT NULL,
  `event_date_end` datetime NOT NULL,
  `booking_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `location` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_booking`
--

INSERT INTO `event_booking` (`S.No`, `events_code`, `event_name`, `event_date_start`, `event_date_end`, `booking_date`, `location`) VALUES
(3, 10000001, 'ABC Function', '2017-10-25 19:00:00', '2017-09-26 00:00:00', '2017-09-30 17:24:55', ''),
(9, 10000002, 'dd', '2017-11-06 12:00:00', '2017-11-28 00:00:00', '2017-10-15 13:31:18', ''),
(10, 10000003, 'dd', '2017-11-06 12:00:00', '2017-11-28 00:00:00', '2017-10-15 13:32:23', ''),
(12, 10000004, 'dd', '2017-11-06 12:00:00', '2017-11-28 00:00:00', '2017-10-15 13:36:17', ''),
(13, 10000005, 'dd', '2017-11-06 12:00:00', '2017-11-28 00:00:00', '2017-10-15 13:45:03', ''),
(14, 10000006, 'fdfdd', '2017-10-15 12:00:00', '2017-10-15 20:00:00', '2017-10-15 14:14:25', ''),
(15, 10000007, 'fdfdd', '2017-10-15 12:00:00', '2017-10-15 20:00:00', '2017-10-15 14:15:06', ''),
(16, 10000008, 'fdfdd', '2017-10-15 12:00:00', '2017-10-15 20:00:00', '2017-10-15 14:16:11', ''),
(17, 10000009, 'fdfdd', '2017-10-15 12:00:00', '2017-10-15 20:00:00', '2017-10-15 14:16:34', ''),
(18, 10000010, 'fdfdd', '2017-10-15 12:00:00', '2017-10-15 20:00:00', '2017-10-15 14:17:13', ''),
(19, 10000011, 'fdfdd', '2017-10-15 12:00:00', '2017-10-15 20:00:00', '2017-10-15 14:23:08', ''),
(20, 10000012, 'BCD FUNCTION ', '2017-10-18 21:00:00', '2017-10-19 02:00:00', '2017-10-15 20:30:15', ''),
(21, 10000013, 'ndknee', '2017-10-27 18:00:00', '2017-10-28 00:00:00', '2017-10-26 22:57:39', ''),
(22, 10000014, 'dddd', '2017-10-28 12:00:00', '2017-10-29 00:00:00', '2017-10-28 00:26:59', ''),
(23, 10000015, 'jnknk', '2017-10-30 12:00:00', '2017-10-31 00:00:00', '2017-10-29 08:33:42', '');

-- --------------------------------------------------------

--
-- Table structure for table `Items`
--

CREATE TABLE `Items` (
  `items_code` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `allow_back_order` tinyint(1) NOT NULL,
  `Price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Items`
--

INSERT INTO `Items` (`items_code`, `name`, `quantity`, `allow_back_order`, `Price`) VALUES
('0', 'sknn4', 343, 0, 3443),
('TNT_10001', 'Tent', 20, 1, 800),
('TNT_10002', 'Banquet Style Tent', 10, 0, 1100),
('TNT_10003', 'tsxved', 2, 0, 23),
('tnt_20', 'fnnk', 23, 0, 32),
('tnt_203', 'fnkdnkd', 23, 0, 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_items`
--
ALTER TABLE `booking_items`
  ADD PRIMARY KEY (`events_code`,`items_code`),
  ADD KEY `items_code` (`items_code`);

--
-- Indexes for table `cost_booking`
--
ALTER TABLE `cost_booking`
  ADD PRIMARY KEY (`events_code`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`events_code`),
  ADD KEY `events_code` (`events_code`);

--
-- Indexes for table `event_booking`
--
ALTER TABLE `event_booking`
  ADD PRIMARY KEY (`S.No`,`events_code`),
  ADD KEY `events_code` (`events_code`);

--
-- Indexes for table `Items`
--
ALTER TABLE `Items`
  ADD PRIMARY KEY (`items_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event_booking`
--
ALTER TABLE `event_booking`
  MODIFY `S.No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_items`
--
ALTER TABLE `booking_items`
  ADD CONSTRAINT `booking_items_ibfk_1` FOREIGN KEY (`events_code`) REFERENCES `cost_booking` (`events_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_items_ibfk_2` FOREIGN KEY (`items_code`) REFERENCES `Items` (`items_code`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`events_code`) REFERENCES `cost_booking` (`events_code`) ON UPDATE NO ACTION;

--
-- Constraints for table `event_booking`
--
ALTER TABLE `event_booking`
  ADD CONSTRAINT `event_booking_ibfk_1` FOREIGN KEY (`events_code`) REFERENCES `cost_booking` (`events_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
