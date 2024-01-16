-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 15, 2024 at 03:02 PM
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
  `role` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `role`, `username`, `password`) VALUES
(1, 'manager', 'manager', '123Manager$$'),
(3, 'employee', 'employee', '123Employee$$');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(128) NOT NULL,
  `customer_id` int(128) NOT NULL,
  `phone` int(128) NOT NULL,
  `vehicle` varchar(128) NOT NULL,
  `serviceType` varchar(128) NOT NULL,
  `carType` varchar(128) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `special` varchar(128) NOT NULL,
  `bookingStatus` varchar(128) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `customer_id`, `phone`, `vehicle`, `serviceType`, `carType`, `date`, `time`, `special`, `bookingStatus`) VALUES
(14, 2, 172310267, 'SAA 9763 A', 'carWash', 'smallCar', '2024-01-19', '09:30:00', 'Testing', 'Cancelled'),
(15, 2, 324334324, 'SAA 9763 A', 'carRepair', 'SUV', '2024-01-27', '14:30:00', 'Hey', 'Approved'),
(17, 6, 172310267, 'SAA 9763 A', 'carRepair', 'SUV', '2024-01-20', '08:30:00', 'Fid', 'Approved'),
(18, 6, 172310267, 'SAA 9763 A', 'carRepair', 'van', '2024-01-26', '16:00:00', 'TEST', 'Approved'),
(19, 2, 54554, 'SAA 9763 V', 'carWash', 'smallCar', '2024-01-26', '15:00:00', 'Awim bawe', 'Cancelled'),
(20, 6, 172310267, '34', 'carRepair', 'SUV', '2024-01-18', '12:00:00', 'Hey', 'Approved'),
(23, 7, 172310267, 'SAA 9763 A', 'carRepair', 'SUV', '2024-01-31', '08:30:00', 'MANAGER TESTING', 'Approved'),
(24, 7, 172310267, 'SAA 9763 A', 'carRepair', 'van', '2024-01-31', '09:00:00', 'MANAGER', 'Pending');

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
(2, 'admin', 'taco0267@gmail.com', '$2y$10$NmtB2mPGAI8ibfU/w0T5M.6QBbmVsfU95vDbv1UG3NkgpLk2BgZRK'),
(4, 'Ali', 'fidelyong12@gmail.com', '$2y$10$w/TY1UtyzhCc6HDBXRauze4iaOHaqbJYoccIxeiiiy46gDBVAfXwG'),
(6, 'Fid', 'fidelyong22@gmail.com', '$2y$10$C/lv1THjJm6aud1cexBAV.MnNKCVnvu05TwykD2aH4kQU.rvGg7q2'),
(7, 'Manager', 'Manager', '-');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

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
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
