-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2021 at 07:12 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appt_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment_list`
--

CREATE TABLE `appointment_list` (
  `id` int(30) NOT NULL,
  `doctor_id` int(30) NOT NULL,
  `patient_id` int(30) NOT NULL,
  `schedule` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0= for verification, 1=confirmed,2= reschedule,3=done',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment_list`
--

INSERT INTO `appointment_list` (`id`, `doctor_id`, `patient_id`, `schedule`, `status`, `date_created`) VALUES
(10, 2, 1, '2021-02-03 14:10:18', 1, '2021-02-03 14:10:18'),
(11, 2, 7, '2021-02-03 14:39:52', 0, '2021-02-03 14:39:52'),
(12, 1, 8, '2021-02-03 14:40:03', 0, '2021-02-03 14:40:03'),
(13, 2, 9, '2021-02-03 14:44:00', 1, '2021-02-03 14:44:00'),
(14, 2, 8, '2021-02-03 14:57:17', 1, '2021-02-03 14:57:17'),
(26, 2, 7, '2021-02-04 18:55:23', 0, '2021-02-04 18:55:23'),
(27, 10, 7, '2021-02-04 18:55:50', 0, '2021-02-04 18:55:50'),
(28, 2, 7, '2021-02-04 18:58:54', 0, '2021-02-04 18:58:54'),
(29, 2, 12, '2021-02-04 18:59:55', 0, '2021-02-04 18:59:55'),
(30, 10, 12, '2021-02-04 19:00:08', 1, '2021-02-04 19:00:08'),
(31, 19, 20, '2021-02-04 19:22:08', 1, '2021-02-04 19:22:08'),
(32, 2, 20, '2021-02-04 19:24:51', 0, '2021-02-04 19:24:51'),
(33, 2, 20, '2021-02-04 19:25:56', 0, '2021-02-04 19:25:56');

-- --------------------------------------------------------

--
-- Table structure for table `doctors_schedule`
--

CREATE TABLE `doctors_schedule` (
  `id` int(30) NOT NULL,
  `doctor_id` int(30) NOT NULL,
  `day` varchar(20) NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors_schedule`
--

INSERT INTO `doctors_schedule` (`id`, `doctor_id`, `day`, `time_from`, `time_to`) VALUES
(3, 2, 'Monday', '10:00:00', '17:00:00'),
(4, 2, 'Wednesday', '10:00:00', '17:00:00'),
(5, 3, 'Monday', '10:00:00', '15:00:00'),
(6, 3, 'Tuesday', '10:00:00', '15:00:00'),
(7, 3, 'Wednesday', '10:00:00', '15:00:00'),
(8, 3, 'Thursday', '10:00:00', '15:00:00'),
(9, 3, 'Friday', '10:00:00', '15:00:00'),
(10, 10, 'Friday', '10:00:00', '15:00:00'),
(11, 10, 'Thursday', '10:00:00', '15:00:00'),
(19, 19, 'Friday', '10:00:00', '15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `medical_specialty`
--

CREATE TABLE `medical_specialty` (
  `id` int(30) NOT NULL,
  `fk_UID` int(30) NOT NULL,
  `specialty` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medical_specialty`
--

INSERT INTO `medical_specialty` (`id`, `fk_UID`, `specialty`) VALUES
(2, 2, 'dumm2'),
(3, 10, 'X'),
(6, 19, 'massage');

-- --------------------------------------------------------

--
-- Table structure for table `system_tbl`
--

CREATE TABLE `system_tbl` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_tbl`
--

INSERT INTO `system_tbl` (`id`, `name`, `email`, `contact`, `about_content`) VALUES
(1, 'Doctor&#x2019;s Appointment System', 'info@sample.com', '+6948 8542 623', '                        asdasdasdasdasd        \r\n                        asdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbbbbbbbbbbbbbbbbbbbbBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBB');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `contact` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=admin , 2 = doctor,3=patient'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `contact`, `username`, `password`, `type`) VALUES
(1, 'Administrator', '', '', 'admin@gmail.com', 'admin123', 1),
(2, 'DR.James Smith, M.D.1', 'Sample Clinic Address', '+1456 554 55623', 'jsmith@sample.com', 'jsmith123', 2),
(10, 'DR.Claire Blake, M.D.', 'Sample Only', '+5465 555 6232333333', 'cblake@sample.com', 'blake1231t', 2),
(16, 'asd', 'asd23', '7415466', 'alikkk', 'password', 3),
(17, 'asd', 'ads', 'asd', 'asd', 'asd', 3),
(20, 'bruce', 'oldyork', '756669122', 'bruces', 'passwordds', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment_list`
--
ALTER TABLE `appointment_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors_schedule`
--
ALTER TABLE `doctors_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_specialty`
--
ALTER TABLE `medical_specialty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_tbl`
--
ALTER TABLE `system_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment_list`
--
ALTER TABLE `appointment_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `doctors_schedule`
--
ALTER TABLE `doctors_schedule`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `medical_specialty`
--
ALTER TABLE `medical_specialty`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `system_tbl`
--
ALTER TABLE `system_tbl`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
