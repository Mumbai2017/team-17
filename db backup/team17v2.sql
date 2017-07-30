-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2017 at 07:56 PM
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
(1, 1, 'Hinduja');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `father_name` varchar(40) NOT NULL,
  `phone` int(10) NOT NULL,
  `age` int(10) NOT NULL,
  `mother_tongue` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `education` varchar(30) NOT NULL,
  `temp_address` varchar(40) NOT NULL,
  `permanent_address` varchar(40) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `docid` int(11) NOT NULL,
  `mother_name` varchar(20) NOT NULL,
  `contactno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `dob`, `father_name`, `phone`, `age`, `mother_tongue`, `gender`, `education`, `temp_address`, `permanent_address`, `city`, `state`, `status`, `docid`, `mother_name`, `contactno`) VALUES
(1, 'Vineeth', '20081994', 'sdawd', 0, 18, '', '', '', '', '', '', '', 'pending', 1, '', 0);

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
(1, 'sandesh', 'sandes@gmail.com', 'sandesh', '20081994', 'india', 'maharashtra', 'kalyan', 'asdasdad', 'doc');

-- --------------------------------------------------------

--
-- Table structure for table `v1`
--

CREATE TABLE `v1` (
  `id` int(20) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `v2`
--

CREATE TABLE `v2` (
  `id` int(20) NOT NULL,
  `users_id` int(20) NOT NULL,
  `availability` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `isGranted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `v1`
--
ALTER TABLE `v1`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `v2`
--
ALTER TABLE `v2`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wish`
--
ALTER TABLE `wish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
