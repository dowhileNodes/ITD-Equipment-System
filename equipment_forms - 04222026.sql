-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2026 at 07:45 AM
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
  `signed_file_path` varchar(255) DEFAULT NULL,
  `business_unit` varchar(255) DEFAULT NULL,
  `name_prepared` varchar(100) DEFAULT NULL,
  `name_checked` varchar(100) DEFAULT NULL,
  `name_approved` varchar(100) DEFAULT NULL,
  `name_received` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment_forms`
--

INSERT INTO `equipment_forms` (`id`, `recipient`, `issued_from`, `issue_date`, `created_at`, `signed_file_path`, `business_unit`, `name_prepared`, `name_checked`, `name_approved`, `name_received`) VALUES
(109, 'Deltech', 'TSI - UPARK', '2026-04-13', '2026-04-13 04:06:25', NULL, 'IT Department', 'Arvie Oliva', 'Anjo Fuentes', 'Anjo Fuentes', ''),
(111, 'Ericka Garcia and Jon Uvero', 'IT Department', '2026-04-13', '2026-04-13 04:46:22', NULL, 'itd', 'Arvie Oliva', 'Arvie Oliva', 'Arvie Oliva', ''),
(112, 'Pio', 'IT Department', '2026-04-13', '2026-04-13 04:54:54', NULL, 'itd', 'Arvie Oliva', 'Judette Gonzales', 'Anjo Fuentes', ''),
(113, 'Deltech', 'IT Department', '2026-04-13', '2026-04-13 05:01:39', NULL, 'itd', 'Arvie Oliva', 'Anjo Fuentes', 'Anjo Fuentes', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipment_forms`
--
ALTER TABLE `equipment_forms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipment_forms`
--
ALTER TABLE `equipment_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
