-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2017 at 10:41 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rasicomputers`
--

-- --------------------------------------------------------

--
-- Table structure for table `customerinformations`
--

CREATE TABLE `customerinformations` (
  `name` varchar(50) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customerservicecenter`
--

CREATE TABLE `customerservicecenter` (
  `cscnumber` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contactinformation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `generalinformation`
--

CREATE TABLE `generalinformation` (
  `joborder_no` int(11) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `customer_name` varchar(50) NOT NULL,
  `customer_contact` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_quantitiy` int(11) NOT NULL,
  `item_serial_number` varchar(50) NOT NULL,
  `item_code` varchar(50) NOT NULL,
  `item_brand` varchar(50) NOT NULL,
  `item_model` varchar(50) NOT NULL,
  `item_accessories` int(11) NOT NULL,
  `item_problem` int(11) NOT NULL,
  `item_remark` text NOT NULL,
  `date_purchased` date NOT NULL,
  `item_status` enum('A- in office','B- with supplier','C-on the way','D-repaired','E-replaced','F-advance replace','R-return to client') NOT NULL,
  `service_by` varchar(50) NOT NULL,
  `csc_contact_number` int(11) NOT NULL,
  `csc_address` varchar(100) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `waybill` varchar(100) NOT NULL,
  `date_released` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `released_by` varchar(50) NOT NULL,
  `received_by` varchar(50) NOT NULL,
  `repair_details/replacement` text NOT NULL,
  `service_report` text NOT NULL,
  `service_unit` varchar(50) NOT NULL,
  `received_by_rasi` varchar(50) NOT NULL,
  `received_by_customer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iteminformations`
--

CREATE TABLE `iteminformations` (
  `itemname` varchar(50) NOT NULL,
  `productcode` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplierinformations`
--

CREATE TABLE `supplierinformations` (
  `suppliername` varchar(50) NOT NULL,
  `contactnumber` int(11) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE `useraccount` (
  `username` text NOT NULL,
  `password` text NOT NULL,
  `position` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customerinformations`
--
ALTER TABLE `customerinformations`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `customerservicecenter`
--
ALTER TABLE `customerservicecenter`
  ADD PRIMARY KEY (`cscnumber`);

--
-- Indexes for table `generalinformation`
--
ALTER TABLE `generalinformation`
  ADD PRIMARY KEY (`joborder_no`);

--
-- Indexes for table `iteminformations`
--
ALTER TABLE `iteminformations`
  ADD PRIMARY KEY (`productcode`);

--
-- Indexes for table `supplierinformations`
--
ALTER TABLE `supplierinformations`
  ADD PRIMARY KEY (`suppliername`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
