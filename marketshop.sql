-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 01, 2021 at 09:40 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `gatepass`
--

CREATE TABLE `gatepass` (
  `id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `issue_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gatepass`
--

INSERT INTO `gatepass` (`id`, `active`, `issue_date`, `expiry_date`) VALUES
(2, 1, '2021-10-01', '2022-10-01'),
(3, 1, '2020-10-21', '2022-01-01'),
(4, 0, NULL, NULL),
(5, 1, '2021-10-10', '2022-01-01'),
(6, 1, '2021-10-10', '2022-01-13'),
(7, 1, '2021-10-10', '2022-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `licenserequest`
--

CREATE TABLE `licenserequest` (
  `sno` int(11) NOT NULL,
  `skid` int(11) NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `issue` date DEFAULT NULL,
  `expiry` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `licenserequest`
--

INSERT INTO `licenserequest` (`sno`, `skid`, `approved`, `issue`, `expiry`) VALUES
(103, 2, 1, '2021-01-01', '2021-12-01'),
(104, 3, 0, NULL, NULL),
(105, 4, 0, NULL, NULL),
(105, 3, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Performance`
--

CREATE TABLE `Performance` (
  `sno` int(3) NOT NULL,
  `admin_rating` int(11) DEFAULT 7,
  `shops_rating` int(11) DEFAULT 7,
  `monthh` int(11) DEFAULT NULL,
  `yearr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Performance`
--

INSERT INTO `Performance` (`sno`, `admin_rating`, `shops_rating`, `monthh`, `yearr`) VALUES
(101, 7, 7, 0, 0),
(104, 6, NULL, 11, 2021),
(103, 9, 8, 11, 2021),
(105, 9, 9, 10, 2021),
(106, 7, 8, 11, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `Shop`
--

CREATE TABLE `Shop` (
  `sno` int(11) NOT NULL,
  `sname` varchar(20) DEFAULT NULL,
  `Manager` int(11) NOT NULL,
  `address` varchar(30) DEFAULT NULL,
  `contact` bigint(10) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `Active` tinyint(1) DEFAULT 0,
  `License_Start_Date` date DEFAULT NULL,
  `License_Expiry_Date` date DEFAULT NULL,
  `Shop_Rent` int(11) DEFAULT NULL,
  `Electricity_Rent` int(11) DEFAULT NULL,
  `Pending_Charges` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Shop`
--

INSERT INTO `Shop` (`sno`, `sname`, `Manager`, `address`, `contact`, `area`, `Active`, `License_Start_Date`, `License_Expiry_Date`, `Shop_Rent`, `Electricity_Rent`, `Pending_Charges`) VALUES
(103, 'Discovery', 2, 'Food Court', 4567895678, 1, 1, '2021-11-01', '2021-12-01', 10000, 2000, 350),
(104, 'Amul', 0, 'Next to asima hostel', 8798678977, 2, 1, '2021-11-01', '2023-11-01', 4500, 345, 234),
(105, 'NIght Canteen', 2, 'Behind APJ', 1010101010, 3, 1, '2021-11-01', '2025-11-01', 2345, 567, 345),
(106, 'Nescafe', 2, 'Next to APJ', 2345623456, 3, 1, '2021-11-01', '2023-11-01', 2300, 1400, 345),
(107, 'Cycle Repair', 2, 'Next to Asime', 2345623456, 2, 1, '2021-11-01', '2022-11-01', 100, 101, 0),
(108, 'Fresco', 2, 'A-417, Food Court', 5435498789, 1, 0, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Shopkeeper`
--

CREATE TABLE `Shopkeeper` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `gender` char(1) NOT NULL,
  `address` varchar(30) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `dob` date NOT NULL,
  `sno` int(3) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Shopkeeper`
--

INSERT INTO `Shopkeeper` (`id`, `name`, `gender`, `address`, `mobile`, `dob`, `sno`, `password`) VALUES
(2, 'Aditi Goel', 'F', 'Gurgaon, Haryana', 9898989898, '2001-04-17', 101, 'helloworld'),
(3, 'Rahul Kumar', 'M', 'Bihta, BIhar', 8766788767, '1990-09-04', 102, 'hellojiji'),
(4, 'Vinod', 'M', 'Bihta, BIhar', 7658769876, '1974-10-15', 106, 'hshshs'),
(5, 'Hitesh', 'M', 'Ranchi', 8989898989, '1984-11-15', 1, 'heyman'),
(6, 'Shubham', 'M', 'Patna, Bihar', 4567845678, '2001-04-17', 104, 'huehuehue'),
(7, 'Shivam Sahu', 'M', 'Banaras', 1010101010, '1996-10-16', 105, 'huehueghi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Shop`
--
ALTER TABLE `Shop`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `Shopkeeper`
--
ALTER TABLE `Shopkeeper`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Shop`
--
ALTER TABLE `Shop`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `Shopkeeper`
--
ALTER TABLE `Shopkeeper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
