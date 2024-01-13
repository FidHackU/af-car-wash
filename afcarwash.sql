-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 13, 2024 at 09:15 PM
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
  `bookingStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `customer_id`, `phone`, `vehicle`, `serviceType`, `carType`, `date`, `time`, `special`, `bookingStatus`) VALUES
(14, 2, 172310267, 'SAA 9763 A', 'carWash', 'smallCar', '2024-01-19', '09:30:00', 'Testing', 0),
(15, 2, 324334324, 'SAA 9763 A', 'carRepair', 'SUV', '2024-01-27', '14:30:00', 'Hey', 0),
(16, 5, 54554, 'SAA 9763 A', 'carWash', 'SUV', '2024-01-19', '11:30:00', 'Mayonis', 0);

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
(2, 'admin', 'taco0267@gmail.com', '$2y$10$NmtB2mPGAI8ibfU/w0T5M.6QBbmVsfU95vDbv1UG3NkgpLk2BgZRK'),
(4, 'Ali', 'fidelyong12@gmail.com', '$2y$10$w/TY1UtyzhCc6HDBXRauze4iaOHaqbJYoccIxeiiiy46gDBVAfXwG'),
(5, 'Abu', 'abu@gmail.com', '$2y$10$AmxxM6.18rYcCGjQcVuTcu6oeXKTv5qbfnX0fEKNgpN5ttfAD00Ei');

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
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
