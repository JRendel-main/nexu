-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2023 at 02:20 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
  `adminid` int(11) NOT NULL,
  `admin_name` varchar(50) DEFAULT NULL,
  `auth_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminid`, `admin_name`, `auth_id`) VALUES
(1, 'Rendel', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_auth`
--

CREATE TABLE `tbl_auth` (
  `auth_id` int(11) NOT NULL,
  `acc_status` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `catid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_auth`
--

INSERT INTO `tbl_auth` (`auth_id`, `acc_status`, `username`, `password`, `catid`) VALUES
(1, '0', 'rendel', '123', 2),
(2, '1', 'ken', '123', 1),
(3, '1', 'admin', '123', 0),
(4, '1', 'rendell', '123', 2),
(5, '1', 'carlos', '123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catid` int(11) NOT NULL,
  `category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expertise`
--

CREATE TABLE `tbl_expertise` (
  `expertiseid` int(11) NOT NULL,
  `tutorid` int(11) DEFAULT NULL,
  `expertise` varchar(50) DEFAULT NULL,
  `expertise_level` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `requestid` int(11) NOT NULL,
  `tutorid` int(11) DEFAULT NULL,
  `tuteeid` int(11) DEFAULT NULL,
  `scheduleid` int(11) DEFAULT NULL,
  `request_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_request`
--

INSERT INTO `tbl_request` (`requestid`, `tutorid`, `tuteeid`, `scheduleid`, `request_status`) VALUES
(1, 2, 3, 1, '1'),
(2, 1, 3, 1, '1'),
(3, 1, 3, 2, '1'),
(4, 1, 3, 1, '1'),
(5, 1, 3, 1, '2'),
(6, 1, 3, 1, '0'),
(7, 1, 3, 1, '0'),
(8, 1, 3, 1, '0'),
(9, 1, 3, 250, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule`
--

CREATE TABLE `tbl_schedule` (
  `scheduleid` int(11) NOT NULL,
  `tutorid` int(11) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  `topic` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `max_tutee` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_schedule`
--

INSERT INTO `tbl_schedule` (`scheduleid`, `tutorid`, `start_time`, `end_time`, `date`, `topic`, `description`, `max_tutee`) VALUES
(1, 1, '09:25:42', '16:25:42', '2023-04-04', 'PHP', 'adawda', 2),
(2, 1, '15:42:36', '17:42:36', '2023-04-04', 'League', 'test123', 5),
(250, 1, '17:00:00', '18:00:00', '2023-04-12', 'Dota', 'Deny', 2),
(251, 1, '14:20:00', '14:20:00', '2023-04-12', 'Python', 'Looping', 2),
(252, 2, '14:00:00', '16:00:00', '2023-04-13', 'How to Rizz', 'rizz in one minute', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tutee`
--

CREATE TABLE `tbl_tutee` (
  `tuteeid` int(11) NOT NULL,
  `tutee_fname` varchar(50) DEFAULT NULL,
  `tutee_mname` varchar(50) DEFAULT NULL,
  `tutee_lname` varchar(50) DEFAULT NULL,
  `tutee_stunum` varchar(50) NOT NULL,
  `tutee_sex` char(1) DEFAULT NULL,
  `tutee_email` varchar(50) DEFAULT NULL,
  `tutee_course` varchar(50) DEFAULT NULL,
  `tutee_year` int(11) DEFAULT NULL,
  `tutee_bday` date DEFAULT NULL,
  `auth_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tutee`
--

INSERT INTO `tbl_tutee` (`tuteeid`, `tutee_fname`, `tutee_mname`, `tutee_lname`, `tutee_stunum`, `tutee_sex`, `tutee_email`, `tutee_course`, `tutee_year`, `tutee_bday`, `auth_id`) VALUES
(1, 'awda', 'awda', 'adwa', '1231313', 'F', 'rendel@gmail.com', 'BSIS', 1, '2023-04-11', NULL),
(2, 'asdaw', 'awda', 'awda', '123131', 'F', 'rendel@gmail.com', 'BSIS', 1, '2023-04-11', NULL),
(3, 'ken', 'dizon', 'yamagishi', '123131', 'F', 'ken@gmail.com', 'BSIS', 1, '2023-04-04', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tutor`
--

CREATE TABLE `tbl_tutor` (
  `tutorid` int(11) NOT NULL,
  `tutor_fname` varchar(50) DEFAULT NULL,
  `tutor_mname` varchar(50) DEFAULT NULL,
  `tutor_lname` varchar(50) DEFAULT NULL,
  `tutor_bio` text NOT NULL,
  `tutor_stunum` varchar(50) NOT NULL,
  `tutor_sex` char(1) DEFAULT NULL,
  `tutor_email` varchar(50) DEFAULT NULL,
  `tutor_course` varchar(50) DEFAULT NULL,
  `tutor_year` int(11) DEFAULT NULL,
  `tutor_bday` date DEFAULT NULL,
  `auth_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tutor`
--

INSERT INTO `tbl_tutor` (`tutorid`, `tutor_fname`, `tutor_mname`, `tutor_lname`, `tutor_bio`, `tutor_stunum`, `tutor_sex`, `tutor_email`, `tutor_course`, `tutor_year`, `tutor_bday`, `auth_id`) VALUES
(1, 'Rendel', 'San Luis', 'Maningas', 'Proficient on PHP and Python', '123131', 'F', 'rendel@gmail.com', 'BSBA', 1, '2023-03-29', 4),
(2, 'Carlos', 'Mari', 'Ellerma', 'Proficient in English and Writing', '', 'M', 'carlos@gmail.com', 'BSBA', 1, '2023-03-28', 5);

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
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_auth`
--
ALTER TABLE `tbl_auth`
  MODIFY `auth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_expertise`
--
ALTER TABLE `tbl_expertise`
  MODIFY `expertiseid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `requestid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  MODIFY `scheduleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `tbl_tutee`
--
ALTER TABLE `tbl_tutee`
  MODIFY `tuteeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_tutor`
--
ALTER TABLE `tbl_tutor`
  MODIFY `tutorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
