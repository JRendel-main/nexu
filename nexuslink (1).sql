-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 06, 2023 at 06:09 PM
-- Server version: 8.0.32
-- PHP Version: 7.4.3-4ubuntu2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nexuslink`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminid` int NOT NULL,
  `admin_name` varchar(50) DEFAULT NULL,
  `auth_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_auth`
--

CREATE TABLE `tbl_auth` (
  `auth_id` int NOT NULL,
  `acc_status` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `catid` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_auth`
--

INSERT INTO `tbl_auth` (`auth_id`, `acc_status`, `username`, `password`, `catid`) VALUES
(1, '1', 'rendel', '123', 2),
(2, '1', 'ken', '123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catid` int NOT NULL,
  `category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expertise`
--

CREATE TABLE `tbl_expertise` (
  `expertiseid` int NOT NULL,
  `tutorid` int DEFAULT NULL,
  `expertise` varchar(50) DEFAULT NULL,
  `expertise_level` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `requestid` int NOT NULL,
  `tutorid` int DEFAULT NULL,
  `tuteeid` int DEFAULT NULL,
  `scheduleid` int DEFAULT NULL,
  `request_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule`
--

CREATE TABLE `tbl_schedule` (
  `scheduleid` int NOT NULL,
  `tutorid` int DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  `topic` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `max_tutee` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tutee`
--

CREATE TABLE `tbl_tutee` (
  `tuteeid` int NOT NULL,
  `tutee_fname` varchar(50) DEFAULT NULL,
  `tutee_mname` varchar(50) DEFAULT NULL,
  `tutee_lname` varchar(50) DEFAULT NULL,
  `tutee_sex` char(1) DEFAULT NULL,
  `tutee_email` varchar(50) DEFAULT NULL,
  `tutee_course` varchar(50) DEFAULT NULL,
  `tutee_year` int DEFAULT NULL,
  `tutee_bday` date DEFAULT NULL,
  `auth_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_tutee`
--

INSERT INTO `tbl_tutee` (`tuteeid`, `tutee_fname`, `tutee_mname`, `tutee_lname`, `tutee_sex`, `tutee_email`, `tutee_course`, `tutee_year`, `tutee_bday`, `auth_id`) VALUES
(1, 'awda', 'awda', 'adwa', 'F', 'rendel@gmail.com', 'BSIS', 1, '2023-04-11', NULL),
(2, 'asdaw', 'awda', 'awda', 'F', 'rendel@gmail.com', 'BSIS', 1, '2023-04-11', NULL),
(3, 'ken', 'dizon', 'yamagishi', 'F', 'ken@gmail.com', 'BSIS', 1, '2023-04-04', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tutor`
--

CREATE TABLE `tbl_tutor` (
  `tutorid` int NOT NULL,
  `tutor_fname` varchar(50) DEFAULT NULL,
  `tutor_mname` varchar(50) DEFAULT NULL,
  `tutor_lname` varchar(50) DEFAULT NULL,
  `tutor_sex` char(1) DEFAULT NULL,
  `tutor_email` varchar(50) DEFAULT NULL,
  `tutor_course` varchar(50) DEFAULT NULL,
  `tutor_year` int DEFAULT NULL,
  `tutor_bday` date DEFAULT NULL,
  `auth_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `tbl_auth`
--
ALTER TABLE `tbl_auth`
  ADD PRIMARY KEY (`auth_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `tbl_expertise`
--
ALTER TABLE `tbl_expertise`
  ADD PRIMARY KEY (`expertiseid`);

--
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`requestid`);

--
-- Indexes for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  ADD PRIMARY KEY (`scheduleid`);

--
-- Indexes for table `tbl_tutee`
--
ALTER TABLE `tbl_tutee`
  ADD PRIMARY KEY (`tuteeid`);

--
-- Indexes for table `tbl_tutor`
--
ALTER TABLE `tbl_tutor`
  ADD PRIMARY KEY (`tutorid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_auth`
--
ALTER TABLE `tbl_auth`
  MODIFY `auth_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_expertise`
--
ALTER TABLE `tbl_expertise`
  MODIFY `expertiseid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `requestid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  MODIFY `scheduleid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tutee`
--
ALTER TABLE `tbl_tutee`
  MODIFY `tuteeid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_tutor`
--
ALTER TABLE `tbl_tutor`
  MODIFY `tutorid` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
