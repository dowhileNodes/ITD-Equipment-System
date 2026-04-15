-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2026 at 03:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it_equipment_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipment_forms`
--

CREATE TABLE `equipment_forms` (
  `id` int(11) NOT NULL,
  `recipient` varchar(255) NOT NULL,
  `issued_from` varchar(255) NOT NULL,
  `issue_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `signed_file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment_forms`
--

INSERT INTO `equipment_forms` (`id`, `recipient`, `issued_from`, `issue_date`, `created_at`, `signed_file_path`) VALUES
(2, 'Arvie', 'Pedro', '2026-02-16', '2026-02-16 07:23:00', 'uploads/gatepass/gatepass_2.pdf'),
(3, 'Arvie', 'Juan', '2026-02-16', '2026-02-16 08:04:21', NULL),
(4, 'Arvie', 'Juan', '2026-02-16', '2026-02-16 08:16:14', NULL),
(5, 'Arvie', 'Juan', '2026-02-17', '2026-02-16 08:24:11', 'uploads/gatepass/gatepass_5.pdf'),
(6, 'Arvie', 'Juan', '2026-02-23', '2026-02-23 02:00:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `equipment_items`
--

CREATE TABLE `equipment_items` (
  `id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment_items`
--

INSERT INTO `equipment_items` (`id`, `form_id`, `quantity`, `description`, `created_at`) VALUES
(2, 2, 1, 'test', '2026-02-16 07:23:00'),
(3, 3, 1, 'test', '2026-02-16 08:04:21'),
(4, 4, 1, 'test', '2026-02-16 08:16:14'),
(5, 5, 1, 'laptop', '2026-02-16 08:24:11'),
(6, 6, 1, 'test', '2026-02-23 02:00:02');

-- --------------------------------------------------------

--
-- Table structure for table `it_equipment_logs`
--

CREATE TABLE `it_equipment_logs` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `borrower_name` varchar(255) NOT NULL,
  `business_unit` varchar(255) NOT NULL,
  `item_id` varchar(100) NOT NULL,
  `action` enum('borrow','return') NOT NULL,
  `items` text DEFAULT NULL,
  `borrow_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `signatures`
--

CREATE TABLE `signatures` (
  `id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `role` enum('prepared','checked','approved','received') NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipment_forms`
--
ALTER TABLE `equipment_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment_items`
--
ALTER TABLE `equipment_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_id` (`form_id`);

--
-- Indexes for table `it_equipment_logs`
--
ALTER TABLE `it_equipment_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_email` (`email`),
  ADD KEY `idx_item_id` (`item_id`),
  ADD KEY `idx_action` (`action`);

--
-- Indexes for table `signatures`
--
ALTER TABLE `signatures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_id` (`form_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipment_forms`
--
ALTER TABLE `equipment_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `equipment_items`
--
ALTER TABLE `equipment_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `it_equipment_logs`
--
ALTER TABLE `it_equipment_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `signatures`
--
ALTER TABLE `signatures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `equipment_items`
--
ALTER TABLE `equipment_items`
  ADD CONSTRAINT `equipment_items_ibfk_1` FOREIGN KEY (`form_id`) REFERENCES `equipment_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `signatures`
--
ALTER TABLE `signatures`
  ADD CONSTRAINT `signatures_ibfk_1` FOREIGN KEY (`form_id`) REFERENCES `equipment_forms` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
