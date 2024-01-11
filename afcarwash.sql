-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 11, 2024 at 04:54 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `afcarwash`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(128) NOT NULL,
  `role` varchar(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(128) NOT NULL,
  `phone` int(128) NOT NULL,
  `vehicle` varchar(128) NOT NULL,
  `serviceType` varchar(128) NOT NULL,
  `carType` int(128) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `special` varchar(128) NOT NULL,
  `bookingStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `phone`, `vehicle`, `serviceType`, `carType`, `date`, `time`, `special`, `bookingStatus`) VALUES
(1, 172310267, 'QAA 1979 A', 'carWash', 0, '2024-01-31', '16:30:00', 'dffss', 0),
(2, 172310267, 'QAA 1979 A', 'carWash', 0, '2024-01-12', '17:00:00', 'Hey', 0),
(3, 172310267, 'QAA 1979 A', 'carWash', 0, '2024-01-11', '10:30:00', 'fdfd', 0),
(4, 172310267, 'QAA 1979 A', 'carRepair', 0, '2024-01-11', '08:00:00', '', 0),
(5, 172310267, 'QAA 1979 A', 'carWash', 0, '2024-01-11', '13:30:00', '', 0),
(6, 172310267, 'QAA 1979 A', 'carRepair', 0, '2024-01-13', '16:30:00', '', 0),
(7, 172310267, 'QAA 1979 A', 'carWash', 0, '2024-01-27', '13:00:00', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `email`, `password`) VALUES
(1, 'Yogi', '73882@siswa.unimas.my', '1'),
(2, 'admin', 'taco0267@gmail.com', '$2y$10$NmtB2mPGAI8ibfU/w0T5M.6QBbmVsfU95vDbv1UG3NkgpLk2BgZRK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
