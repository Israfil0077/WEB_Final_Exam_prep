-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2026 at 07:09 AM
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
-- Database: `campus_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_loans`
--

CREATE TABLE `book_loans` (
  `LoanID` int(11) NOT NULL,
  `StudentName` varchar(20) NOT NULL,
  `BookTitle` varchar(20) NOT NULL,
  `DaysOverdue` int(11) NOT NULL,
  `PenaltyFee` double NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_loans`
--

INSERT INTO `book_loans` (`LoanID`, `StudentName`, `BookTitle`, `DaysOverdue`, `PenaltyFee`, `Status`) VALUES
(101, 'Abdul', 'Data Structure', 0, 0, 'Returned'),
(102, 'Jabbar', 'Data Structures', 12, 24, 'Overdue'),
(103, 'Barkat', 'Discreate Math', 5, 10, 'overdue'),
(104, 'Rahim', 'Linear Algebra', 2, 4, 'overdue'),
(105, 'Karim', 'Data Structures', 15, 30, 'Lost'),
(106, 'Fahim', 'Operating System', 0, 0, 'Returned');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_loans`
--
ALTER TABLE `book_loans`
  ADD PRIMARY KEY (`LoanID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
