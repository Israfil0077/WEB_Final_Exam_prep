-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2026 at 10:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sundarban`
--

-- --------------------------------------------------------

--
-- Table structure for table `sales_data`
--

CREATE TABLE `sales_data` (
  `SaleID` int(11) NOT NULL,
  `ProductName` varchar(20) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(20) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Revenue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_data`
--

INSERT INTO `sales_data` (`SaleID`, `ProductName`, `CategoryID`, `CategoryName`, `Quantity`, `Revenue`) VALUES
(1, 'Laptop', 301, 'Electronics', 5, 350000),
(2, 'Mouse', 301, 'Electronics', 15, 45000),
(3, 'Chair', 302, 'Furniture', 8, 64000),
(4, 'Desk', 302, 'Furniture', 6, 72000),
(5, 'Bottle', 303, 'Accessories', 20, 30000),
(6, 'Pen', 303, 'Accessories', 25, 20000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sales_data`
--
ALTER TABLE `sales_data`
  ADD PRIMARY KEY (`SaleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
