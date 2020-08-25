-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 25, 2020 at 08:29 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `claim_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `overtime_teaching`
--

CREATE TABLE `overtime_teaching` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `faculty_of` varchar(50) DEFAULT NULL,
  `emp_no` varchar(50) DEFAULT NULL,
  `dept_name` varchar(50) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `semester` varchar(50) DEFAULT NULL,
  `total_contact` decimal(10,2) DEFAULT NULL,
  `total_excess_252` decimal(10,2) DEFAULT NULL,
  `diploma_lecture_rate` decimal(10,2) DEFAULT NULL,
  `diploma_tutorial_rate` decimal(10,2) DEFAULT NULL,
  `degree_lecture_rate` decimal(10,2) DEFAULT NULL,
  `degree_tutorial_rate` decimal(10,2) DEFAULT NULL,
  `signature_hod` varchar(50) DEFAULT NULL,
  `signature_dean` varchar(50) DEFAULT NULL,
  `signature_deputy_vc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `overtime_teaching`
--

INSERT INTO `overtime_teaching` (`id`, `name`, `faculty_of`, `emp_no`, `dept_name`, `position`, `semester`, `total_contact`, `total_excess_252`, `diploma_lecture_rate`, `diploma_tutorial_rate`, `degree_lecture_rate`, `degree_tutorial_rate`, `signature_hod`, `signature_dean`, `signature_deputy_vc`) VALUES
(1, 'fdfsd', 'dfdsf', '44', 'dsfdsf', 'dfdf', 'sdfdsf', '322.00', '3343.00', '3.00', '76.00', '6.00', '6.00', 'dfdfdg', 'ffgfgfg', 'fgfgf');

-- --------------------------------------------------------

--
-- Table structure for table `overtime_teaching_data`
--

CREATE TABLE `overtime_teaching_data` (
  `id` int(11) NOT NULL,
  `added_date` date DEFAULT NULL,
  `cur_day` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `sub_code` varchar(50) DEFAULT NULL,
  `no_of_std` decimal(10,2) DEFAULT NULL,
  `deg_diploma_level` varchar(50) DEFAULT NULL,
  `lecture` decimal(10,2) DEFAULT NULL,
  `tutorial` decimal(10,2) DEFAULT NULL,
  `overtime_teaching_tbl_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `overtime_teaching_data`
--

INSERT INTO `overtime_teaching_data` (`id`, `added_date`, `cur_day`, `subject`, `sub_code`, `no_of_std`, `deg_diploma_level`, `lecture`, `tutorial`, `overtime_teaching_tbl_id`) VALUES
(1, '2020-08-12', 'dsfsdf', 'dhhtre', 'erere', '33.00', 'dfdsffgr', '3.00', '54.00', 1),
(2, '2020-08-06', 'dfdf', 'dfbft', 'dfddv', '5.00', 'rer4erewr', '3.00', '435.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `part_time_teaching`
--

CREATE TABLE `part_time_teaching` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `school_of` varchar(50) DEFAULT NULL,
  `month_name` varchar(50) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `lecture_per_hour` decimal(10,2) DEFAULT NULL,
  `tutorial_per_hour` decimal(10,2) DEFAULT NULL,
  `traveling_reimbursement_days` int(11) DEFAULT NULL,
  `signature_hod` varchar(50) DEFAULT NULL,
  `signature_dean` varchar(50) DEFAULT NULL,
  `added_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `part_time_teaching`
--

INSERT INTO `part_time_teaching` (`id`, `name`, `school_of`, `month_name`, `department`, `lecture_per_hour`, `tutorial_per_hour`, `traveling_reimbursement_days`, `signature_hod`, `signature_dean`, `added_date`) VALUES
(1, 'fdfdf', 'fdsdfddf', 'fdsfsdf', 'dfdfdsf', '1.00', '1.00', 1, 'dfdsfds', 'dfsdf', '2020-08-17'),
(2, 'Car waste metal', 'fdsdfddf', 'dfsdsf', 'dfdfdsf', '34.00', '3434.00', 4343, 'dfdfd', 'sfdsfdsf', '2020-08-12');

-- --------------------------------------------------------

--
-- Table structure for table `part_time_teaching_data`
--

CREATE TABLE `part_time_teaching_data` (
  `id` int(11) NOT NULL,
  `added_date` date DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `lectur_hour` int(11) DEFAULT NULL,
  `lecture_type` int(11) DEFAULT NULL,
  `varified_by_hod` varchar(50) DEFAULT NULL,
  `part_time_teaching_tbl_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `part_time_teaching_data`
--

INSERT INTO `part_time_teaching_data` (`id`, `added_date`, `subject`, `lectur_hour`, `lecture_type`, `varified_by_hod`, `part_time_teaching_tbl_id`) VALUES
(1, '2020-08-13', 'dfdfdf', 3, 1, 'yes', 1),
(2, '2020-08-13', 'dfdfdf', 2, 1, '3334', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `user_type` smallint(6) DEFAULT NULL,
  `active_status` tinyint(1) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `user_type`, `active_status`, `pass`) VALUES
(1, 'fuadashraful', 'fuadashraful16@gmail.com', 2, 1, '123456'),
(2, 'anikvai', 'anik@gmail.com', 2, 1, '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `overtime_teaching`
--
ALTER TABLE `overtime_teaching`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overtime_teaching_data`
--
ALTER TABLE `overtime_teaching_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `overtime_teaching_tbl_id` (`overtime_teaching_tbl_id`);

--
-- Indexes for table `part_time_teaching`
--
ALTER TABLE `part_time_teaching`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `part_time_teaching_data`
--
ALTER TABLE `part_time_teaching_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `part_time_teaching_tbl_id` (`part_time_teaching_tbl_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `overtime_teaching`
--
ALTER TABLE `overtime_teaching`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `overtime_teaching_data`
--
ALTER TABLE `overtime_teaching_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `part_time_teaching`
--
ALTER TABLE `part_time_teaching`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `part_time_teaching_data`
--
ALTER TABLE `part_time_teaching_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `overtime_teaching_data`
--
ALTER TABLE `overtime_teaching_data`
  ADD CONSTRAINT `overtime_teaching_data_ibfk_1` FOREIGN KEY (`overtime_teaching_tbl_id`) REFERENCES `overtime_teaching` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `part_time_teaching_data`
--
ALTER TABLE `part_time_teaching_data`
  ADD CONSTRAINT `part_time_teaching_data_ibfk_1` FOREIGN KEY (`part_time_teaching_tbl_id`) REFERENCES `part_time_teaching` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
