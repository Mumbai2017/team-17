-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2017 at 11:55 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maw`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(20) NOT NULL,
  `users_id` int(20) NOT NULL,
  `hospital` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `users_id`, `hospital`) VALUES
(1, 1, 'Hinduja'),
(2, 2, 'Lilavathi');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `parent_name` varchar(40) NOT NULL,
  `phone` int(10) NOT NULL,
  `age` int(10) NOT NULL,
  `mother_tongue` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `education` varchar(30) NOT NULL,
  `temp_address` varchar(40) NOT NULL,
  `permanent_address` varchar(40) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `doc_id`, `dob`, `parent_name`, `phone`, `age`, `mother_tongue`, `gender`, `education`, `temp_address`, `permanent_address`, `city`, `state`) VALUES
(1, 'Ryan', 1, '20081994', 'John', 2147483647, 13, 'english', 'male', '7th', 'adwwadw,wdawd,awdwa,dw', 'dwadwd,ad,wdw,dwad', 'thane', 'maharashtra'),
(2, 'Rupali', 2, '19052000', 'Jadhav', 2147483647, 18, 'tamil', 'female', '5 th', 'sadawd,awdwd,w,dwad', 'wdwad,adwwd,wd,w', 'mulund', 'maharashtra'),
(5, '', 0, '', '', 0, 0, '', '', '', '', '', '', 'maharashtra'),
(6, '', 0, '', '', 0, 0, '', '', '', '', '', '', 'maharashtra'),
(7, '', 0, '', '', 0, 0, '', '', '', '', '', '', 'punjab'),
(8, '', 0, '', '', 0, 0, '', '', '', '', '', '', 'punjab'),
(9, '', 0, '', '', 0, 0, '', '', '', '', '', '', 'gujarat'),
(10, '', 0, '', '', 0, 0, '', '', '', '', '', '', 'gujarat'),
(11, '', 0, '', '', 0, 0, '', '', '', '', '', '', 'mp');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `dob`, `country`, `state`, `city`, `address`, `type`) VALUES
(1, 'Sandesh', 's@gmail.com', '123', '20081994', 'india', 'maharashtra', 'kalyan', 'hdwhbdw,aduwnd,wduwn', '0'),
(2, 'Suraj', 'su@gmail.com', '123', '5131993', 'india', 'maharashtra', 'thane', 'asdsad,asdsad,', '0'),
(3, 'Videet', 'v@gmail.com', '123', '15121994', 'india', 'maharashtra', 'kalyan', 'sdasd,wdwd,adwwdw', '1'),
(4, 'Abhijeet', 'a@gmail.com', '123', '03081996', 'india', 'maharashtra', 'kalyan', 'asdw,dws,adwd,', '1'),
(5, 'Rahul', 'r@gmail.com', '123', '06131997', 'India', 'Maharashtra', 'Goregaon', 'asdasd,adwd,wa', '2'),
(6, 'Divita', 'd@gmail.com', '123', '06131997', 'India', 'Maharashtra', 'Mulund', 'asdawd,wdwa,dwd,d', '2');

-- --------------------------------------------------------

--
-- Table structure for table `v1`
--

CREATE TABLE `v1` (
  `id` int(20) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `v1`
--

INSERT INTO `v1` (`id`, `users_id`) VALUES
(1, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `v2`
--

CREATE TABLE `v2` (
  `id` int(20) NOT NULL,
  `users_id` int(20) NOT NULL,
  `availability` varchar(20) NOT NULL,
  `frequency` int(11) NOT NULL DEFAULT '0',
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `v2`
--

INSERT INTO `v2` (`id`, `users_id`, `availability`, `frequency`, `name`) VALUES
(1, 5, 'monday', 7, 'Amit'),
(2, 6, 'tuesday', 6, 'Sunil'),
(3, 23, 'asd', 5, 'Akshay'),
(4, 2, 'sdf', 56, 'Ram'),
(5, 3, 'asd', 56, 'Shyam');

-- --------------------------------------------------------

--
-- Table structure for table `wish`
--

CREATE TABLE `wish` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `v1_id` int(11) NOT NULL,
  `v2_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `type` int(11) NOT NULL,
  `reason` varchar(30) NOT NULL,
  `isValid` int(11) NOT NULL,
  `admn_date` varchar(20) NOT NULL,
  `ident_date` varchar(20) NOT NULL,
  `isGranted` int(11) NOT NULL,
  `isCompleted` int(11) NOT NULL DEFAULT '0',
  `isAssigned` int(11) NOT NULL DEFAULT '0',
  `year` int(11) NOT NULL,
  `notified` int(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wish`
--

INSERT INTO `wish` (`id`, `patient_id`, `v1_id`, `v2_id`, `doc_id`, `description`, `status`, `type`, `reason`, `isValid`, `admn_date`, `ident_date`, `isGranted`, `isCompleted`, `isAssigned`, `year`, `notified`) VALUES
(1, 1, 1, 1, 1, 'Something Something Something Something Something ', 'Validating', 1, 'Something Something Something ', 0, '', '', 0, 0, 1, 2015, 0),
(2, 2, 2, 2, 2, 'Something Something Something Something Something ', 'In process', 0, 'Something Something Something ', 0, '', '', 0, 0, 0, 2015, 0),
(3, 232, 23, 0, 0, '', '', 0, '', 0, '', '', 0, 0, 0, 2016, 0),
(4, 0, 0, 0, 0, '', '', 0, '', 0, '', '', 0, 0, 0, 2015, 0),
(5, 0, 0, 0, 0, '', '', 0, '', 0, '', '', 0, 0, 0, 2014, 0),
(6, 0, 0, 0, 0, '', '', 0, '', 0, '', '', 0, 0, 0, 2015, 0),
(7, 0, 0, 0, 0, '', '', 0, '', 0, '', '', 0, 0, 0, 2015, 0),
(8, 0, 0, 0, 0, '', '', 0, '', 0, '', '', 0, 0, 0, 2016, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v1`
--
ALTER TABLE `v1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v2`
--
ALTER TABLE `v2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wish`
--
ALTER TABLE `wish`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `v1`
--
ALTER TABLE `v1`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `v2`
--
ALTER TABLE `v2`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `wish`
--
ALTER TABLE `wish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
