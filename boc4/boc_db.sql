-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2026 at 06:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_banks`
--

CREATE TABLE `blood_banks` (
  `bank_id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `bank_name` varchar(150) NOT NULL,
  `license_no` varchar(50) DEFAULT NULL,
  `location` text DEFAULT NULL,
  `photo` longblob DEFAULT NULL,
  `latitude` decimal(10,6) DEFAULT NULL,
  `longitude` decimal(10,6) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blood_requests`
--

CREATE TABLE `blood_requests` (
  `request_id` int(11) NOT NULL,
  `seeker_id` varchar(50) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `blood_group` enum('A+','A-','B+','B-','AB+','AB-','O+','O-') DEFAULT NULL,
  `units_needed` int(11) NOT NULL,
  `request_date` datetime DEFAULT current_timestamp(),
  `Remarks` text DEFAULT NULL,
  `status` enum('pending','approved','rejected','completed') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blood_stocks`
--

CREATE TABLE `blood_stocks` (
  `id` int(10) NOT NULL,
  `bank_id` int(10) NOT NULL,
  `mgr_id` varchar(50) NOT NULL,
  `group` varchar(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `current_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donation_history`
--

CREATE TABLE `donation_history` (
  `donation_id` int(11) NOT NULL,
  `donor_id` varchar(50) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `donation_date` date NOT NULL,
  `units_donated` int(11) DEFAULT 1,
  `status` enum('completed','pending','cancelled') DEFAULT 'completed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donor_connections`
--

CREATE TABLE `donor_connections` (
  `connection_id` int(11) NOT NULL,
  `requester_id` varchar(50) NOT NULL,
  `donor_id` varchar(50) NOT NULL,
  `request_date` datetime DEFAULT current_timestamp(),
  `status` enum('pending','approved','rejected') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donor_details`
--

CREATE TABLE `donor_details` (
  `donor_id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `blood_group` enum('A+','A-','B+','B-','AB+','AB-','O+','O-') DEFAULT NULL,
  `weight` decimal(5,2) DEFAULT NULL,
  `last_donation_date` date DEFAULT NULL,
  `medical_conditions` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medical_assessments`
--

CREATE TABLE `medical_assessments` (
  `assessment_id` int(11) NOT NULL,
  `donor_id` varchar(50) NOT NULL,
  `assessed_by` varchar(50) DEFAULT NULL,
  `assessment_date` datetime DEFAULT current_timestamp(),
  `blood_group` varchar(100) DEFAULT NULL,
  `hemoglobin_level` varchar(50) DEFAULT NULL,
  `blood_pressure` varchar(50) DEFAULT NULL,
  `pulse` varchar(50) DEFAULT NULL,
  `vital_signs` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `sendTo` varchar(50) NOT NULL,
  `sendFrom` varchar(50) NOT NULL,
  `Message` text NOT NULL,
  `dates` date NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mytable`
--

CREATE TABLE `mytable` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `qty` int(10) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mytable2`
--

CREATE TABLE `mytable2` (
  `id` int(10) NOT NULL,
  `fk_t1` int(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `message` text NOT NULL,
  `type` enum('stock_alert','urgent_requirement','recommendation') NOT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recommendations`
--

CREATE TABLE `recommendations` (
  `rec_id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `reason` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(50) NOT NULL,
  `age` int(10) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `blood_group` varchar(50) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `donation_date` date DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `role` varchar(50) NOT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_banks`
--
ALTER TABLE `blood_banks`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `blood_requests`
--
ALTER TABLE `blood_requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `blood_stocks`
--
ALTER TABLE `blood_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_assessments`
--
ALTER TABLE `medical_assessments`
  ADD PRIMARY KEY (`assessment_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mytable`
--
ALTER TABLE `mytable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mytable2`
--
ALTER TABLE `mytable2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_banks`
--
ALTER TABLE `blood_banks`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blood_requests`
--
ALTER TABLE `blood_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blood_stocks`
--
ALTER TABLE `blood_stocks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medical_assessments`
--
ALTER TABLE `medical_assessments`
  MODIFY `assessment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mytable`
--
ALTER TABLE `mytable`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mytable2`
--
ALTER TABLE `mytable2`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
