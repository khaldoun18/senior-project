-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2023 at 06:11 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gymmanagment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `admin_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `admin_email`, `password`) VALUES
(1, 'admin', 'admin@admin.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `bmi`
--

CREATE TABLE `bmi` (
  `bmi_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `height` double NOT NULL,
  `weight` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bmi`
--

INSERT INTO `bmi` (`bmi_id`, `client_id`, `height`, `weight`, `date`) VALUES
(34, 32, 1.7, 90, '2023-04-13 15:25:57');

-- --------------------------------------------------------

--
-- Table structure for table `class_request`
--

CREATE TABLE `class_request` (
  `class_request_id` int(11) NOT NULL,
  `sport_name` text NOT NULL,
  `played` text NOT NULL,
  `goal` text NOT NULL,
  `disability` text NOT NULL,
  `client_id` int(11) NOT NULL,
  `years` int(11) NOT NULL,
  `class_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_request`
--

INSERT INTO `class_request` (`class_request_id`, `sport_name`, `played`, `goal`, `disability`, `client_id`, `years`, `class_level`) VALUES
(39, 'kickboxing', 'yes', 'fitness', 'no', 32, 1, 1),
(40, 'zumba', 'yes', 'fitness', 'no', 32, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `join_date` timestamp NULL DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(40) NOT NULL,
  `gender` text NOT NULL,
  `client_dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `name`, `email`, `password`, `phone`, `address`, `join_date`, `approved`, `image`, `gender`, `client_dob`) VALUES
(32, 'FAYEZ', 'FAYEZSLIM18@GMAIL.COM', '123', '70545492', 'haret hreik', '2023-04-13 15:26:09', 1, 'userimage/download.jpg', 'male', '1997-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `client_level`
--

CREATE TABLE `client_level` (
  `client_level_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `sport_name` varchar(255) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `sessions` int(11) NOT NULL,
  `package_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `price`, `sessions`, `package_description`) VALUES
(11, 120, 6, 'swimm'),
(12, 150, 10, 'boxing');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE `sport` (
  `sport_id` int(11) NOT NULL,
  `sport_name` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `class_date` varchar(255) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `class_time` time NOT NULL,
  `class_approve` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sport`
--

INSERT INTO `sport` (`sport_id`, `sport_name`, `level`, `class_date`, `trainer_id`, `class_time`, `class_approve`) VALUES
(108, 'kickboxing', 1, 'monday 8:00:00', 50, '08:00:00', 1),
(109, 'zumba', 1, 'tuesday 8:00:00', 50, '08:00:00', 1),
(110, 'kickboxing', 1, 'monday 8:00:00', 51, '08:00:00', 1),
(111, 'kickboxing', 1, 'monday 9:30:00', 51, '09:30:00', 1),
(112, 'kickboxing', 1, 'monday 17:00:00', 51, '17:00:00', 1),
(113, 'kickboxing', 1, 'monday 18:30:00', 51, '18:30:00', 1),
(114, 'kickboxing', 1, 'monday 20:00:00', 51, '20:00:00', 1),
(115, 'zumba', 1, 'tuesday 20:00:00', 51, '20:00:00', 1),
(116, 'zumba', 1, 'tuesday 18:30:00', 51, '18:30:00', 1),
(117, 'zumba', 1, 'tuesday 17:00:00', 51, '17:00:00', 1),
(118, 'zumba', 1, 'tuesday 9:30:00', 51, '09:30:00', 1),
(119, 'zumba', 1, 'tuesday 8:00:00', 51, '08:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sport_client`
--

CREATE TABLE `sport_client` (
  `sport_client_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `sport_id` int(11) NOT NULL,
  `class_date` varchar(255) NOT NULL,
  `trainer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sport_client`
--

INSERT INTO `sport_client` (`sport_client_id`, `client_id`, `sport_id`, `class_date`, `trainer_id`) VALUES
(126, 32, 108, 'monday 8:00:00', 50),
(127, 32, 109, 'tuesday 8:00:00', 50),
(128, 32, 112, 'monday 17:00:00', 51),
(129, 32, 117, 'tuesday 17:00:00', 51),
(130, 32, 118, 'tuesday 9:30:00', 51);

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `trainer_id` int(11) NOT NULL,
  `trainer_name` varchar(255) NOT NULL,
  `trainer_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `yoe` int(11) NOT NULL,
  `cover_letter` longtext NOT NULL,
  `resume` varchar(40) NOT NULL,
  `image` varchar(40) NOT NULL,
  `phone` int(11) NOT NULL,
  `join_date` date NOT NULL,
  `trainer_dob` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`trainer_id`, `trainer_name`, `trainer_email`, `password`, `specialization`, `approved`, `yoe`, `cover_letter`, `resume`, `image`, `phone`, `join_date`, `trainer_dob`) VALUES
(50, 'fayez slim', 'fayezslim18@gmail.com', '1234', 'zumba', 1, 2, 'test', 'resume/download.jpg', 'trainerpic/download.jpg', 70545492, '2023-04-13', 1997),
(51, 'ali', 'ali@ali.com', '12345', 'kickboxing', 1, 1, 'dfaf', 'resume/download.jpg', 'trainerpic/download.jpg', 12345678, '2023-04-13', 1918);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`admin_email`);

--
-- Indexes for table `bmi`
--
ALTER TABLE `bmi`
  ADD PRIMARY KEY (`bmi_id`);

--
-- Indexes for table `class_request`
--
ALTER TABLE `class_request`
  ADD PRIMARY KEY (`class_request_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `client_level`
--
ALTER TABLE `client_level`
  ADD PRIMARY KEY (`client_level_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`sport_id`);

--
-- Indexes for table `sport_client`
--
ALTER TABLE `sport_client`
  ADD PRIMARY KEY (`sport_client_id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`trainer_id`),
  ADD UNIQUE KEY `email` (`trainer_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bmi`
--
ALTER TABLE `bmi`
  MODIFY `bmi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `class_request`
--
ALTER TABLE `class_request`
  MODIFY `class_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `client_level`
--
ALTER TABLE `client_level`
  MODIFY `client_level_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sport`
--
ALTER TABLE `sport`
  MODIFY `sport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `sport_client`
--
ALTER TABLE `sport_client`
  MODIFY `sport_client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `trainer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
