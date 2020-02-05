-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2020 at 07:44 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ted`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `aid` int(10) NOT NULL,
  `aname` varchar(100) NOT NULL,
  `apass` varchar(100) NOT NULL,
  `aemail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`aid`, `aname`, `apass`, `aemail`) VALUES
(1, 'kavya', 'kavya123', 'imanthikavya@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bid` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `cid` int(10) NOT NULL,
  `cyear` varchar(100) NOT NULL,
  `cmonth` varchar(100) NOT NULL,
  `cdate` varchar(100) NOT NULL,
  `cplace` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bid`, `uid`, `cid`, `cyear`, `cmonth`, `cdate`, `cplace`) VALUES
(17, 19, 2, '2020', '1', '28', 'Nelum Pokuna'),
(18, 19, 5, '2020', '1', '31', 'SLTC'),
(19, 19, 6, '2020', '4', '9', 'Colombo University'),
(20, 19, 7, '2020', '9', '5', 'Wayamba University'),
(21, 19, 8, '2020', '2', '5', 'Moratuwa University '),
(22, 19, 9, '2020', '3', '8', 'Peradeniya University'),
(23, 19, 8, '2020', '4', '8', 'Jafna University'),
(24, 19, 7, '2020', '5', '8', 'SLIIT'),
(25, 19, 1, '2020', '4', '8', 'Open University');

-- --------------------------------------------------------

--
-- Table structure for table `celebrities`
--

CREATE TABLE `celebrities` (
  `cid` int(10) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `cpass` varchar(100) NOT NULL,
  `cemail` varchar(100) NOT NULL,
  `cpn` varchar(100) NOT NULL,
  `cage` varchar(100) NOT NULL,
  `cprice` varchar(10) NOT NULL,
  `aid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `celebrities`
--

INSERT INTO `celebrities` (`cid`, `cname`, `cpass`, `cemail`, `cpn`, `cage`, `cprice`, `aid`) VALUES
(1, 'Hemal Ranasinghe', 'hemal123', 'hemalr123@gmail.com', '0767543205', '35', '35000', 1),
(2, 'Mahela jayawardhana', 'mahela123', 'mahela123@gmail.com', '0767612345', '42', '64000', 1),
(5, 'Saranga Disasekara', 'saranga123', 'sarangad123@gmail.com', '0715896455', '38', '25000', 1),
(6, 'Randhir Witana', 'rv123', 'randhirw123@gmail.com', '0765896542', '32', '50000', 1),
(7, 'Umaria Sinhawansha', 'um123', 'umarias@gmail.com', '0785689253', '25', '35000', 1),
(8, 'Sangakkara', 'san123', 'sangakkara@gmail.com', '0715468956', '42', '60000', 1),
(9, 'Bathiya & Santhush', 'b&s23', 'bathiyasanthush@gmail.com', '0785656892', '44,43', '100000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(10) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `upass` varchar(100) NOT NULL,
  `uemail` varchar(100) NOT NULL,
  `upn` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uname`, `upass`, `uemail`, `upn`) VALUES
(1, 'yasiru', 'yasiru123', 'yasiruswaris@gmail.com', '0773837819'),
(19, 'imanthi', 'kavyaa', 'imanthikavya1998@gmail.com', '07125256');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `celebrities`
--
ALTER TABLE `celebrities`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `aid` (`aid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `aid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `celebrities`
--
ALTER TABLE `celebrities`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `celebrities` (`cid`);

--
-- Constraints for table `celebrities`
--
ALTER TABLE `celebrities`
  ADD CONSTRAINT `celebrities_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `admins` (`aid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
