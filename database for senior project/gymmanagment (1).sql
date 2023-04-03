-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2023 at 08:49 PM
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
(1, 'admin', 'admin@admin.com', '123'),
(2, 'admin', 'admin@ADMIN.COM', '70545492fF');

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
(5, 12, 1.8, 60, '2023-03-15 17:30:35'),
(6, 13, 1.8, 60, '2023-03-17 13:39:55'),
(7, 14, 1.8, 60, '2023-04-01 08:33:42'),
(8, 15, 1.8, 60, '2023-04-01 11:21:31');

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
  `years` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(13, 'khaldoun', 'khaldounkhishin7@gmail.com', '', '70820049', 'beirut', '2023-04-03 15:48:07', 4, 'userimage/per.jpg', 'male', '2023-03-12'),
(14, 'beirut', 'khaldounkhhin7@gmail.com', '1234', '70811049', 'beirut', '2023-04-03 14:13:52', 1, 'userimage/per.jpg', 'male', '2023-04-03'),
(15, 'khs', 'khaldkhishin7@gmail.com', '', '70820222', 'beirut', '2023-04-03 14:14:01', 4, 'userimage/per.jpg', 'male', '2023-04-10');

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
(14, 15, 9, 'test'),
(15, 456, 665, 'ads'),
(16, 100, 5, 'adad'),
(17, 51, 5212, '5'),
(18, 54562, 25, '2165');

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
  `class_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sport`
--

INSERT INTO `sport` (`sport_id`, `sport_name`, `level`, `class_date`, `trainer_id`, `class_time`) VALUES
(34, 'kickboxing', 1, 'monday 8:00:00', 27, '08:00:00'),
(35, 'zumba', 1, 'monday 9:30:00', 27, '09:30:00');

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
(91, 14, 34, 'monday 8:00:00', 27),
(92, 14, 35, 'monday 9:30:00', 27);

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
(27, 'khaldoun khishin', 'khaldounkhishin7@gmail.com', '123', 'kickboxing', 1, 2, 'gr', 'resume/per.jpg', 'trainerpic/per.jpg', 70820049, '2023-04-03', 1970);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bmi`
--
ALTER TABLE `bmi`
  MODIFY `bmi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `class_request`
--
ALTER TABLE `class_request`
  MODIFY `class_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `client_level`
--
ALTER TABLE `client_level`
  MODIFY `client_level_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `sport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `sport_client`
--
ALTER TABLE `sport_client`
  MODIFY `sport_client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `trainer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
