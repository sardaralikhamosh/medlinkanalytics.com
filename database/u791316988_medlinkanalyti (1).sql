-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 30, 2026 at 04:55 PM
-- Server version: 11.8.3-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u791316988_medlinkanalyti`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `attendance_date` date NOT NULL,
  `checkin_time` time DEFAULT NULL,
  `checkout_time` time DEFAULT NULL,
  `total_hours` decimal(5,2) DEFAULT NULL,
  `status` enum('Present','Absent','Late','Half Day','On Leave') DEFAULT 'Absent',
  `late_minutes` int(11) DEFAULT 0,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `employee_id`, `employee_name`, `attendance_date`, `checkin_time`, `checkout_time`, `total_hours`, `status`, `late_minutes`, `notes`, `created_at`, `updated_at`) VALUES
(1, 103, 'sardar ali', '2026-01-04', '22:47:55', '22:49:47', 0.02, 'Late', 812, NULL, '2026-01-04 22:47:55', '2026-01-04 22:49:47');

-- --------------------------------------------------------

--
-- Table structure for table `contact_submissions`
--

CREATE TABLE `contact_submissions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `practice` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `message` text NOT NULL,
  `source` varchar(50) DEFAULT 'contact_page',
  `submitted_at` timestamp NULL DEFAULT current_timestamp(),
  `is_read` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `contact_submissions`
--

INSERT INTO `contact_submissions` (`id`, `name`, `email`, `practice`, `phone`, `message`, `source`, `submitted_at`, `is_read`) VALUES
(1, 'Test User', 'test@example.com', NULL, NULL, 'This is a test message', 'setup_script', '2025-12-12 01:46:41', 0),
(2, 'Test User', 'test@example.com', NULL, NULL, 'This is a test message', 'setup_script', '2025-12-12 01:47:52', 0),
(3, 'Sardar Ali', 'sardaralikhamosh@gmail.com', 'test', '03415336669', 'test', 'contact_page', '2025-12-12 01:57:44', 0),
(4, 't1', 'ts@gmail.com', 'test', 'test', 'test', 'contact_page', '2025-12-12 01:59:15', 0),
(5, 'ttt', 'sardaralikhamosh@gmail.com', 'sdfsdfsda', '03415336669', 'asdfasdfsd', 'contact_page', '2025-12-12 02:00:30', 0),
(6, 'homett', 'sardaralikhamosh@gmail.com', 'ttttt', '03415336669', 'ttttt', 'homepage', '2025-12-12 02:02:19', 0),
(7, 'tft', 'sardaralikhamosh@gmail.com', 'tft', '03415336669', 'tft', 'homepage', '2025-12-12 02:04:47', 0),
(8, 'tfttt', 'sardaralikhamosh@gmail.com', 'tfttt', '03415336669', 'tfttt', 'contact_page', '2025-12-12 02:05:41', 0),
(9, 'emailspam', 'emailspam@emailspam.com', 'emailspam', '03415336669', 'emailspam', 'contact_page', '2025-12-12 02:07:32', 0),
(10, 'nospam', 'nospam@nospam.com', 'nospam', '03485832844', 'nospam', 'contact_page', '2025-12-12 02:08:25', 0),
(11, 'ewrtewrtwert', 'sardaralikhamosh@gmail.com', 'erfetewrgtwer', '03415336669', 'ewrteryrtyrwty', 'contact_page', '2025-12-12 02:18:54', 0),
(12, 'Sardar Ali', 'sardaralikhamosh@gmail.com', 'testing email', '03415336669', 'testttt', 'contact_page', '2025-12-12 02:25:46', 0),
(13, 'sd', 'sdfcs@sdfsdf.vb', 'sadfsd', 'sadfsad', 'sadfsad', 'homepage', '2025-12-12 14:09:27', 0),
(14, 'Sardar Ali', 'sardaralikhamosh@gmail.com', '--', '03415336669', 'are you looking for billing?', 'homepage', '2026-01-04 23:39:51', 0),
(15, 'Sardar Ali', 'sardaralikhamosh@gmail.com', '--', '03415336669', 'test', 'homepage', '2026-01-04 23:45:20', 0),
(16, 'dsff', 'sdfsdfsdf@f.com', 'sdff', 'sdfsdfsdf', 'sdfsdfds', 'homepage', '2026-01-23 09:38:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `department` varchar(50) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `hire_date` date DEFAULT NULL,
  `status` enum('Active','Inactive','On Leave') DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `name`, `email`, `department`, `position`, `hire_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 101, 'John Doe', 'john@example.com', 'IT', 'Developer', '2025-01-04', 'Active', '2026-01-04 22:45:05', '2026-01-04 22:45:05'),
(2, 102, 'Jane Smith', 'jane@example.com', 'HR', 'Manager', '2025-01-04', 'Active', '2026-01-04 22:45:05', '2026-01-04 22:45:05'),
(3, 103, 'Robert Johnson', 'robert@example.com', 'Sales', 'Executive', '2025-01-04', 'Active', '2026-01-04 22:45:05', '2026-01-04 22:45:05'),
(4, 104, 'Emily Davis', 'emily@example.com', 'Marketing', 'Specialist', '2025-01-04', 'Active', '2026-01-04 22:45:05', '2026-01-04 22:45:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_employee_date` (`employee_id`,`attendance_date`),
  ADD KEY `idx_date_status` (`attendance_date`,`status`);

--
-- Indexes for table `contact_submissions`
--
ALTER TABLE `contact_submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_submissions`
--
ALTER TABLE `contact_submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
