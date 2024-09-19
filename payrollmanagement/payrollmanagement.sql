-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2023 at 04:14 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payrollmanagement`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `employee1` (IN `emailId` VARCHAR(50))  select * from employee ,salary  where email=emailId and id=eid$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `accountant`
--

CREATE TABLE `accountant` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accountant`
--

INSERT INTO `accountant` (`id`, `name`, `email`, `password`) VALUES
(1, 'accountant', 'accountant@gmail.com', 'apple');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `password`, `mobile`, `address`) VALUES
(1, 'sanjana', 'sanjana@gmail.com', '123', '9954658468', 'bangalore'),
(2, 'rakshita', 'rakshita@gmail.com', '456', '9482852770', 'bangalore'),
(3, 'carol', 'carol@gmail.com', '789', '8988754658', 'bangalore');

--
-- Triggers `employee`
--
DELIMITER $$
CREATE TRIGGER `Trigger2` AFTER INSERT ON `employee` FOR EACH ROW INSERT INTO log(action, cdate) VALUES('inserted',now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `funds`
--

CREATE TABLE `funds` (
  `id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `funds`
--

INSERT INTO `funds` (`id`, `amount`, `date`) VALUES
(9, 100000000, '2023-02-05 12:23:15'),
(17, 10000, '2023-02-07 12:40:56'),
(18, 663822, '2023-03-29 23:59:23'),
(19, 673822, '2023-03-30 00:07:54'),
(20, 50859, '2023-03-30 20:50:55'),
(21, 100, '2023-03-31 12:55:24'),
(22, 1000, '2023-03-31 18:08:22');

-- --------------------------------------------------------

--
-- Table structure for table `hr`
--

CREATE TABLE `hr` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr`
--

INSERT INTO `hr` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `insertlog`
--

CREATE TABLE `insertlog` (
  `id` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `action` varchar(20) NOT NULL,
  `cdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `action` varchar(20) NOT NULL,
  `cdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `action`, `cdate`) VALUES
(1, 'inserted', '2022-02-07 10:01:50'),
(2, 'inserted', '2022-02-07 10:03:50'),
(3, 'inserted', '2022-03-30 00:00:38'),
(4, 'inserted', '2022-03-30 00:09:05'),
(6, 'inserted', '2022-03-30 20:48:42'),
(7, 'inserted', '2022-03-31 12:54:19'),
(8, 'inserted', '2022-03-31 18:05:55');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `sid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `accNo` varchar(25) NOT NULL,
  `basic` double NOT NULL,
  `bonus` double NOT NULL,
  `commutation` double NOT NULL,
  `grpallw` double NOT NULL,
  `hra` double NOT NULL,
  `variablepay` double NOT NULL,
  `cellphn` double NOT NULL,
  `it` double NOT NULL,
  `medclaim` double NOT NULL,
  `pf` double NOT NULL,
  `pt` double NOT NULL,
  `netpay` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`sid`, `eid`, `accNo`, `basic`, `bonus`, `commutation`, `grpallw`, `hra`, `variablepay`, `cellphn`, `it`, `medclaim`, `pf`, `pt`, `netpay`) VALUES
(2, 2, '555555555', 545544, 2600, 1600, 12617, 8985, 11550, 100, 2500, 3211, 2156, 200, 574729),
(3, 3, '656464132', 52246, 2251, 1254, 2154, 542, 541, 120, 2546, 2120, 2130, 1213, 50859),
(5, 1, '1234577999', 85214, 2500, 1500, 12654, 357, 1588, 1000, 2000, 1500, 100, 120, 99093);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `accountant` varchar(25) NOT NULL,
  `employee` varchar(25) NOT NULL,
  `paydate` timestamp NOT NULL DEFAULT current_timestamp(),
  `payamount` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `accountant`, `employee`, `paydate`, `payamount`) VALUES
(33, 'accountant', '2', '2023-02-07 04:55:40', '574729'),
(35, 'accountant', '1', '2023-02-07 07:13:36', '99093'),
(36, 'accountant', '1', '2023-03-29 18:29:34', '99093'),
(37, 'accountant', '2', '2023-03-29 18:36:07', '574729'),
(38, 'accountant', '3', '2023-03-30 09:30:54', '50859'),
(39, 'accountant', '2', '2023-03-31 07:25:36', '574729');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountant`
--
ALTER TABLE `accountant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funds`
--
ALTER TABLE `funds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr`
--
ALTER TABLE `hr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insertlog`
--
ALTER TABLE `insertlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountant`
--
ALTER TABLE `accountant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `funds`
--
ALTER TABLE `funds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `hr`
--
ALTER TABLE `hr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `insertlog`
--
ALTER TABLE `insertlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
