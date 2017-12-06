-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2017 at 12:14 PM
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
-- Database: `rma_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Username` varchar(16) NOT NULL,
  `Password` varchar(16) NOT NULL,
  `Position` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Username`, `Password`, `Position`) VALUES
('admin', '12345678', 'head');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_name` varchar(20) NOT NULL,
  `Customer_contact` int(11) NOT NULL,
  `Customer_add` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `Serial_no` varchar(32) NOT NULL,
  `Item` varchar(20) NOT NULL,
  `Brand` varchar(20) NOT NULL,
  `Model` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `joborderstatus`
--

CREATE TABLE `joborderstatus` (
  `Job_order_no` int(11) NOT NULL,
  `Date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Customer_name` varchar(20) NOT NULL,
  `Contact_no` varchar(40) NOT NULL,
  `Customer_add` varchar(32) NOT NULL,
  `Item_code` varchar(32) NOT NULL,
  `Item` varchar(32) NOT NULL,
  `Brand` varchar(32) NOT NULL,
  `Model` varchar(32) NOT NULL,
  `Serial_no` varchar(32) NOT NULL,
  `Quantity` smallint(10) NOT NULL,
  `Date_purchased` date NOT NULL,
  `Accessories` varchar(32) NOT NULL,
  `Problem` varchar(32) NOT NULL,
  `Remark` varchar(32) NOT NULL,
  `Service_by` varchar(32) NOT NULL,
  `Supplier_add` varchar(32) NOT NULL,
  `Supplier_cont_no` varchar(40) NOT NULL,
  `Waybill` varchar(32) NOT NULL,
  `Status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `joborderstatus`
--

INSERT INTO `joborderstatus` (`Job_order_no`, `Date_received`, `Customer_name`, `Contact_no`, `Customer_add`, `Item_code`, `Item`, `Brand`, `Model`, `Serial_no`, `Quantity`, `Date_purchased`, `Accessories`, `Problem`, `Remark`, `Service_by`, `Supplier_add`, `Supplier_cont_no`, `Waybill`, `Status`) VALUES
(1, '2017-12-03 14:16:53', 'JALLEN JAMES BOQUE', '9218100555', 'N/A', 'N/A', 'VIDEO CARD', 'POWER COLOR', '6570 2GB', 'DG1508032977', 1, '2017-12-03', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Pending'),
(12, '2017-12-03 16:17:30', 'Jane', '9981553070', 'N/A', 'N/A', 'PRINTER', 'EPSON', 'L220 3N1', 'VGWK049498', 1, '2017-11-29', 'dummy', 'PAPER JAMMED', 'N/A', 'GOLLY TECHNOLOGY SERVICE CENTER', 'N/A', '1111111111', 'N/A', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `servicereport`
--

CREATE TABLE `servicereport` (
  `Job_order_no` int(11) NOT NULL,
  `Customer_name` varchar(20) NOT NULL,
  `Customer_contact` int(11) NOT NULL,
  `Customer_add` varchar(32) NOT NULL,
  `Item_code` varchar(32) NOT NULL,
  `Item` varchar(32) NOT NULL,
  `Brand` varchar(32) NOT NULL,
  `Model` varchar(32) NOT NULL,
  `Serial_no` varchar(32) NOT NULL,
  `Quantity` smallint(10) NOT NULL,
  `Date_purchased` date NOT NULL,
  `Accesories` varchar(20) NOT NULL,
  `Problem` varchar(20) NOT NULL,
  `Replacement` varchar(32) NOT NULL,
  `Released_by` varchar(20) NOT NULL,
  `Received_by` varchar(23) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `Supplier_name` varchar(20) NOT NULL,
  `Supplier_contact` int(11) NOT NULL,
  `Supplier_add` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_name`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`Serial_no`);

--
-- Indexes for table `joborderstatus`
--
ALTER TABLE `joborderstatus`
  ADD PRIMARY KEY (`Job_order_no`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Supplier_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
