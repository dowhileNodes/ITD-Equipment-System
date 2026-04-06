-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2026 at 03:13 AM
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
(2, 'Arvie', 'Pedro', '2026-02-16', '2026-02-16 07:23:00', 'uploads/gatepass/gatepass_2.pdf', '', '', '', '', ''),
(3, 'Arvie', 'Juan', '2026-02-16', '2026-02-16 08:04:21', NULL, '', '', '', '', ''),
(4, 'Arvie', 'Juan', '2026-02-16', '2026-02-16 08:16:14', NULL, '', '', '', '', ''),
(5, 'Arvie', 'Juan', '2026-02-17', '2026-02-16 08:24:11', 'uploads/gatepass/gatepass_5.pdf', '', '', '', '', ''),
(6, 'Arvie', 'Juan', '2026-02-23', '2026-02-23 02:00:02', NULL, '', '', '', '', ''),
(7, 'Arvie', 'Juan', '2026-02-23', '2026-02-23 04:03:31', NULL, '', '', '', '', ''),
(8, 'Arvie', 'Juan', '2026-02-23', '2026-02-23 04:49:10', NULL, '', '', '', '', ''),
(9, 'Arvie', 'Juan', '2026-02-23', '2026-02-23 04:51:09', NULL, '', '', '', '', ''),
(10, 'Arvie', 'Juan', '2026-02-23', '2026-02-23 05:22:20', NULL, '', '', '', '', ''),
(11, 'Arvie', 'Juan', '2026-02-23', '2026-02-23 06:11:26', 'uploads/gatepass/1772360179_test.pdf', 'itd', 'arvie', 'arvie', 'arvie', 'arvie'),
(12, 'Arvie', 'Juan', '2026-02-23', '2026-02-23 07:12:35', NULL, 'itd', 'arvie', 'arvie', 'arvie', 'arvie'),
(13, 'Arvie', 'Juan', '2026-02-23', '2026-02-23 07:13:04', NULL, 'itd', 'arvie', 'arvie', 'arvie', 'arvie'),
(14, 'Arvie', 'Juan', '2026-02-23', '2026-02-23 08:09:06', NULL, 'itd', 'arvie', 'arvie', 'arvie', 'arvie'),
(15, 'Arvie', 'Juan', '2026-02-23', '2026-02-23 08:26:02', NULL, 'itd', 'arvie', 'arvie', 'arvie', 'arvie'),
(16, 'Arvie', 'Juan', '2026-02-23', '2026-02-23 08:26:10', NULL, 'itd', 'arvie', 'arvie', 'arvie', 'arvie'),
(17, 'Arvie', 'Juan', '2026-02-24', '2026-02-24 00:51:23', 'uploads/gatepass/gatepass_17.pdf', 'itd', '', '', '', ''),
(18, 'Arvie', 'Juan', '2026-02-25', '2026-02-25 00:48:29', NULL, 'itd', 'arvie', 'arvie', 'arvie', 'arvie'),
(19, 'Arvie', 'Juan', '2026-02-25', '2026-02-25 07:37:42', 'uploads/gatepass/1772005130_test.pdf', 'itd', 'arvie', 'arvie', 'arvie', 'arvie'),
(20, 'Arvie', 'Juan', '2026-03-01', '2026-03-01 07:48:35', NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Arvie', 'Juan', '2026-03-01', '2026-03-01 07:54:58', NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Arvie', 'Juan', '2026-03-01', '2026-03-01 07:56:29', NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Arvie', 'Juan', '2026-03-01', '2026-03-01 07:58:39', NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Arvie', 'Juan', '2026-03-01', '2026-03-01 08:02:24', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Arvie', 'Juan', '2026-03-01', '2026-03-01 08:06:03', NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Arvie', 'Juan', '2026-03-01', '2026-03-01 08:08:46', NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Arvie', 'Juan', '2026-03-01', '2026-03-01 08:10:55', NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'Arvie', 'Juan', '2026-03-01', '2026-03-01 08:14:39', NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Arvie', 'Juan', '2026-03-01', '2026-03-01 08:17:29', NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'Arvie', 'Juan', '2026-03-01', '2026-03-01 08:18:34', NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'Arvie', 'Juan', '2026-03-01', '2026-03-01 08:30:40', NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'Arvie', 'Juan', '2026-03-01', '2026-03-01 08:31:04', NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'Arvie', 'Juan', '2026-03-01', '2026-03-01 08:32:14', NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'Arvie', 'Juan', '2026-03-01', '2026-03-01 08:43:36', NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'Arvie', 'Juan', '2026-03-01', '2026-03-01 08:45:32', NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'Kai', 'Pablo', '2026-03-01', '2026-03-01 09:26:06', NULL, 'tli', 'Kai', 'Kai', 'Kai', 'Kai'),
(39, 'Kai', 'Pablo', '2026-03-01', '2026-03-01 10:11:33', 'uploads/gatepass/1772360210_gatepass_39.pdf', 'tli', 'Kai', 'Kai', 'Kai', 'Kai'),
(40, 'Kai', 'Pablo', '2026-03-01', '2026-03-01 10:13:38', NULL, 'itd', 'Kai', 'Kai', 'Kai', 'Kai'),
(41, 'Kai', 'Pablo', '2026-03-01', '2026-03-01 10:20:32', NULL, 'itd', 'Kai', 'Kai', 'Kai', 'Kai'),
(42, 'Kai', 'Pablo', '2026-03-01', '2026-03-01 10:21:06', NULL, 'itd', 'Ken', 'Kai', 'Kai', 'Kai'),
(43, 'Kai', 'Pablo', '2026-03-01', '2026-03-01 10:21:38', 'uploads/gatepass/Equipment_Form_43.pdf', 'itd', 'Kai', 'Kai', 'Kai', 'Kai'),
(44, 'Kai', 'Pablo', '2026-03-01', '2026-03-01 10:43:27', NULL, 'itd', 'Kai', 'Kai', 'Kai', 'Kai'),
(45, 'Kai', 'Pablo', '2026-03-01', '2026-03-01 10:44:28', NULL, 'itd', 'Kai', 'Kai', 'Kai', 'Kai'),
(46, 'Kai', 'Pablo', '2026-03-01', '2026-03-01 10:44:38', NULL, 'itd', 'Kai', 'Kai', 'Kai', 'Kai'),
(47, 'Kai', 'Pablo', '2026-03-01', '2026-03-01 10:45:54', NULL, 'itd', 'Kai', 'Kai', 'Kai', 'Kai'),
(48, 'Kai', 'Pablo', '2026-03-01', '2026-03-01 10:46:33', NULL, 'itd', 'Kai', 'Kai', 'Kai', 'Kai'),
(49, 'Kai', 'Pablo', '2026-03-01', '2026-03-01 10:49:50', NULL, 'itd', 'Kai', 'Kai', 'Kai', 'Kai'),
(50, 'Kai', 'Pablo', '2026-03-01', '2026-03-01 10:50:27', NULL, 'itd', 'Kai', 'Kai', 'Kai', 'Kai'),
(51, 'Kai', 'Pablo', '2026-03-01', '2026-03-01 12:10:06', NULL, 'itd', 'Kai', 'Kai', 'Kai', 'Kai'),
(52, 'Kai', 'Pablo', '2026-03-01', '2026-03-01 12:13:42', NULL, 'itd', 'Kai', 'Kai', 'Kai', 'Kai'),
(53, 'Kai', 'Pablo', '2026-03-01', '2026-03-01 12:17:26', 'uploads/gatepass/Equipment_Form_53.pdf', 'itd', 'Kai', 'Kai', 'Kai', 'Kai'),
(54, 'Kai', 'Pablo', '2026-03-01', '2026-03-01 12:25:48', NULL, 'itd', 'Kai', 'Kai', 'Kai', 'Kai'),
(55, 'Kai', 'Pablo', '2026-03-01', '2026-03-01 12:28:03', NULL, 'itd', 'Kai', 'Kai', 'Kai', 'Kai'),
(56, 'Kai', 'Pablo', '2026-03-01', '2026-03-01 12:29:42', NULL, 'itd', 'Kai', 'Kai', 'Kai', 'Kai'),
(57, 'Kai', 'Pablo', '2026-03-01', '2026-03-01 12:30:56', NULL, 'itd', 'Kai', 'Kai', 'Kai', 'Kai'),
(58, 'Kai', 'Pablo', '2026-03-01', '2026-03-01 12:31:29', NULL, 'itd', 'Kai', 'Kai', 'Kai', 'Kai'),
(59, 'Kai', 'Pablo', '2026-03-01', '2026-03-01 12:32:25', NULL, 'itd', 'Kai', 'Kai', 'Kai', 'Kai'),
(60, 'Kai', 'Pablo', '2026-03-01', '2026-03-01 12:36:40', NULL, 'itd', 'Kai', 'Kai', 'Kai', 'Kai'),
(61, 'Kai', 'Pablo', '2026-03-01', '2026-03-01 12:37:24', NULL, 'itd', 'Kai', 'Kai', 'Kai', 'Kai'),
(62, 'Kai', 'Pablo', '2026-03-01', '2026-03-01 12:38:43', NULL, 'itd', 'Kai', 'Kai', 'Kai', 'Kai'),
(63, 'Kai', 'Pablo', '2026-03-01', '2026-03-01 13:37:59', NULL, 'itd', 'Kai', 'Kai', 'Kai', 'Kai'),
(64, 'Kai', 'Pablo', '2026-03-01', '2026-03-01 13:39:59', 'uploads/gatepass/Equipment_Form_64.pdf', 'itd', 'Kai', 'Kai', 'Kai', 'Kai'),
(65, 'Kai', 'Pablo', '2026-03-02', '2026-03-02 08:30:39', NULL, 'itd', 'Kai', 'Kai', 'Kai', 'Kai'),
(66, 'Kai', 'Pablo', '2026-03-02', '2026-03-02 08:33:19', NULL, 'itd', 'Kai', 'Kai', 'Kai', 'Kai'),
(67, 'Kai', 'Pablo', '2026-03-02', '2026-03-02 09:00:10', NULL, 'itd', 'Kai', 'Kai', 'Kai', 'Kai'),
(68, 'Kai', 'Pablo', '2026-03-02', '2026-03-02 09:03:05', NULL, 'itd', 'Kai', 'Kai', 'Kai', 'Kai'),
(69, 'Kai', 'Pablo', '2026-03-01', '2026-03-02 09:03:44', NULL, 'itd', 'Kai', 'Kai', 'Kai', 'Kai'),
(70, 'Kai', 'Pablo', '2026-03-01', '2026-03-02 10:02:18', NULL, 'itd', 'Kai', 'Kai', 'Kai', 'Kai'),
(71, 'Kai', 'Pablo', '2026-03-01', '2026-03-02 10:06:51', NULL, 'itd', 'Kai', 'Kai', 'Kai', 'Kai'),
(72, 'Kai', 'Pablo', '2026-03-01', '2026-03-02 10:06:58', NULL, 'itd', 'Kai', 'Kai', 'Kai', 'Kai'),
(73, 'Gary David', 'IT Department', '2026-03-04', '2026-03-04 03:01:14', NULL, 'Toplis Logistics', 'Arvie Oliva', 'Anjo Fuentes', 'Anjo Fuentes', 'Gary David'),
(74, 'Gary David', 'IT Department', '2026-03-04', '2026-03-04 03:06:09', 'uploads/gatepass/Equipment_Form_74.pdf', 'Toplis Logistics', 'Arvie Oliva', 'Anjo Fuentes', 'Anjo Fuentes', 'Gary David'),
(75, 'Arvie', 'Juan', '2026-03-04', '2026-03-04 03:17:43', NULL, 'IT Department', 'ARVIE', 'ARVIE', 'ARVIE', 'ARVIE'),
(76, 'Arvie', 'Juan', '2026-03-04', '2026-03-04 03:19:23', NULL, 'IT Department', 'ARVIE', 'ARVIE', 'ARVIE', 'ARVIE'),
(77, 'Arvie', 'Pedro', '2026-03-04', '2026-03-04 03:20:32', NULL, 'IT Department', 'ARVIE', 'ARVIE', 'ARVIE', 'ARVIE'),
(78, 'Jonathan Villaluz Ancheta', 'IT Department', '2026-03-11', '2026-03-11 00:47:31', NULL, 'Toplis Logistics', 'Arvie Oliva', 'Arvie Oliva', 'Judette Gonzales', ''),
(79, 'Jonathan Villaluz Ancheta', 'IT Department', '2026-03-11', '2026-03-11 01:06:22', NULL, 'Toplis Logistics', 'Arvie Oliva', 'Arvie Oliva', 'Judette Gonzales', ''),
(80, 'Jonathan Villaluz Ancheta', 'IT Department', '2026-03-11', '2026-03-11 01:41:02', NULL, 'Toplis Logistics', 'Arvie Oliva', 'Arvie Oliva', 'Judette Gonzales', ''),
(81, 'Jonathan Villaluz Ancheta', 'IT Department', '2026-03-11', '2026-03-11 01:43:09', NULL, 'Toplis Logistics', 'Arvie Oliva', 'Arvie Oliva', 'Judette Gonzales', ''),
(82, 'Jonathan Villaluz Ancheta', 'IT Department', '2026-03-11', '2026-03-11 01:46:31', NULL, 'Toplis Logistics', 'Arvie Oliva', 'Arvie Oliva', 'Judette Gonzales', ''),
(83, 'Jonathan Villaluz Ancheta', 'IT Department', '2026-03-11', '2026-03-11 01:48:51', NULL, 'Toplis Logistics', 'Arvie Oliva', 'Arvie Oliva', 'Judette Gonzales', ''),
(84, 'Jonathan Villaluz Ancheta', 'IT Department', '2026-03-11', '2026-03-11 01:50:59', NULL, 'Toplis Logistics', 'Arvie Oliva', 'Arvie Oliva', 'Judette Gonzales', ''),
(85, 'Jonathan Villaluz Ancheta', 'IT Department', '2026-03-11', '2026-03-11 01:52:29', NULL, 'Toplis Logistics', 'Arvie Oliva', 'Arvie Oliva', 'Judette Gonzales', ''),
(86, 'Jonathan Villaluz Ancheta', 'IT Department', '2026-03-11', '2026-03-11 01:54:20', NULL, 'Toplis Logistics', 'Arvie Oliva', 'Arvie Oliva', 'Judette Gonzales', ''),
(87, 'Jonathan Villaluz Ancheta', 'IT Department', '2026-03-11', '2026-03-11 01:54:22', NULL, 'Toplis Logistics', 'Arvie Oliva', 'Arvie Oliva', 'Judette Gonzales', ''),
(88, 'Jonathan Villaluz Ancheta', 'IT Department', '2026-03-11', '2026-03-11 01:54:23', NULL, 'Toplis Logistics', 'Arvie Oliva', 'Arvie Oliva', 'Judette Gonzales', ''),
(89, 'Jonathan Villaluz Ancheta', 'IT Department', '2026-03-11', '2026-03-11 01:56:35', NULL, 'Toplis Logistics', 'Arvie Oliva', 'Arvie Oliva', 'Judette Gonzales', ''),
(90, 'Jonathan Villaluz Ancheta', 'IT Department', '2026-03-11', '2026-03-11 02:01:13', NULL, 'Toplis Logistics', 'Arvie Oliva', 'Arvie Oliva', 'Judette Gonzales', ''),
(91, 'Jonathan Villaluz Ancheta', ' IT Department', '2026-03-11', '2026-03-11 02:02:54', NULL, 'Toplis Logistics', 'Arvie Oliva', 'Arvie Oliva', 'Judetted Gonzales', ''),
(92, 'Jonathan Villaluz Ancheta', 'IT Department', '2026-03-11', '2026-03-11 02:24:50', NULL, 'Toplis Logistics', 'Arvie Oliva', 'Arvie Oliva', 'Judette Gonzales', ''),
(93, 'Jonathan Villaluz Ancheta', 'IT Department', '2026-03-11', '2026-03-11 02:27:23', NULL, 'Toplis Logistics', 'Arvie Oliva', 'Arvie Oliva', 'Judette Gonzales', ''),
(94, 'Jonathan Villaluz Ancheta', 'IT Department', '2026-03-11', '2026-03-11 02:28:45', NULL, 'TOTC', 'Arvie Oliva', 'Arvie Oliva', 'Judette Gonzales', ''),
(95, 'Arvie', 'Pablo', '2026-03-12', '2026-03-20 02:15:04', NULL, 'itd', 'ARVIE', 'ARVIE', 'ARVIE', 'ARVIE'),
(96, 'Arvie', 'Scarlet', '2026-03-20', '2026-03-20 02:21:16', NULL, 'itd', 'Arvie Oliva', 'ARVIE', 'ARVIE', 'ARVIE'),
(97, 'test', 'test', '2026-04-06', '2026-04-04 08:17:28', NULL, 'itd', 'test', 'TEST', 'TEST', 'TEST'),
(98, 'test', 'test', '2026-04-06', '2026-04-04 08:18:35', NULL, 'IT Department', 'test', 'TEST', 'TEST', 'TEST'),
(99, 'test', 'test', '2026-04-06', '2026-04-04 08:39:49', NULL, 'IT Department', 'test', 'TEST', 'TEST', 'TEST'),
(100, 'test', 'test', '2026-04-06', '2026-04-04 08:40:29', NULL, 'IT Department', 'test', 'TEST', 'TEST', 'TEST'),
(101, 'test', 'test', '2026-04-06', '2026-04-04 08:42:37', 'ITD Inhouse folders/gatepass formsEquipment_Form_101.pdf', 'IT Department', 'test', 'TEST', 'TEST', 'TEST'),
(102, 'test', 'test', '2026-04-04', '2026-04-04 08:47:18', 'uploads/gatepass/Equipment_Form_102.pdf', 'itd', 'test', 'test', 'test', 'test'),
(103, 'test', 'test', '2026-04-03', '2026-04-04 09:08:20', NULL, 'itd', 'test', 'test', 'test', 'test'),
(104, 'test', 'test', '2026-04-06', '2026-04-04 09:18:15', NULL, 'itd', 'test', 'test', 'test', 'test'),
(105, 'Arvie', 'IT Department', '2026-04-06', '2026-04-06 00:28:00', NULL, 'TOTCI', 'sdfas', 'fasda', 'fasd', 'fasda');

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
(6, 6, 1, 'test', '2026-02-23 02:00:02'),
(7, 7, 1, 'laptop', '2026-02-23 04:03:31'),
(8, 8, 1, 'laptop', '2026-02-23 04:49:10'),
(9, 9, 1, 'laptop', '2026-02-23 04:51:09'),
(10, 10, 1, 'laptop', '2026-02-23 05:22:20'),
(11, 11, 1, 'laptop', '2026-02-23 06:11:26'),
(12, 12, 1, 'laptop', '2026-02-23 07:12:35'),
(13, 13, 1, 'laptop', '2026-02-23 07:13:04'),
(14, 14, 1, 'laptop', '2026-02-23 08:09:06'),
(15, 15, 1, 'laptop', '2026-02-23 08:26:02'),
(16, 16, 1, 'laptop', '2026-02-23 08:26:10'),
(17, 17, 1, 'KEYBOARD', '2026-02-24 00:51:23'),
(18, 18, 1, 'LAPTOP', '2026-02-25 00:48:29'),
(19, 19, 1, 'LAPTOP', '2026-02-25 07:37:42'),
(20, 20, 1, '', '2026-03-01 07:48:35'),
(21, 21, 1, '', '2026-03-01 07:54:58'),
(22, 22, 1, '', '2026-03-01 07:56:29'),
(23, 23, 1, '', '2026-03-01 07:58:39'),
(24, 24, 1, '', '2026-03-01 08:02:24'),
(25, 25, 1, '', '2026-03-01 08:06:03'),
(26, 26, 1, '', '2026-03-01 08:08:46'),
(27, 27, 1, '', '2026-03-01 08:10:55'),
(28, 28, 1, '', '2026-03-01 08:14:39'),
(29, 29, 1, '', '2026-03-01 08:17:29'),
(30, 30, 1, '', '2026-03-01 08:18:34'),
(31, 33, 1, '', '2026-03-01 08:30:40'),
(32, 34, 1, '', '2026-03-01 08:31:04'),
(33, 35, 1, '', '2026-03-01 08:32:14'),
(34, 36, 1, '', '2026-03-01 08:43:37'),
(35, 37, 1, '', '2026-03-01 08:45:32'),
(36, 38, 1, 'test', '2026-03-01 09:26:06'),
(37, 39, 1, 'test', '2026-03-01 10:11:33'),
(38, 40, 1, 'test', '2026-03-01 10:13:38'),
(39, 41, 1, 'test', '2026-03-01 10:20:32'),
(40, 42, 1, 'test', '2026-03-01 10:21:06'),
(41, 43, 1, 'test', '2026-03-01 10:21:38'),
(42, 44, 1, 'test', '2026-03-01 10:43:27'),
(43, 45, 1, 'test', '2026-03-01 10:44:28'),
(44, 46, 1, 'test', '2026-03-01 10:44:38'),
(45, 47, 1, 'test', '2026-03-01 10:45:54'),
(46, 48, 1, 'test', '2026-03-01 10:46:33'),
(47, 49, 1, 'test', '2026-03-01 10:49:50'),
(48, 50, 1, 'test', '2026-03-01 10:50:27'),
(49, 51, 1, 'test', '2026-03-01 12:10:06'),
(50, 52, 1, 'test', '2026-03-01 12:13:42'),
(51, 53, 1, 'test', '2026-03-01 12:17:26'),
(52, 54, 1, 'test', '2026-03-01 12:25:48'),
(53, 55, 1, 'test', '2026-03-01 12:28:03'),
(54, 56, 1, 'test', '2026-03-01 12:29:42'),
(55, 57, 1, 'test', '2026-03-01 12:30:56'),
(56, 58, 1, 'test', '2026-03-01 12:31:29'),
(57, 59, 1, 'test', '2026-03-01 12:32:25'),
(58, 60, 1, 'test', '2026-03-01 12:36:40'),
(59, 61, 1, 'test', '2026-03-01 12:37:24'),
(60, 62, 1, 'test', '2026-03-01 12:38:43'),
(61, 63, 1, 'test', '2026-03-01 13:37:59'),
(62, 64, 1, 'test', '2026-03-01 13:39:59'),
(63, 65, 1, 'mouse', '2026-03-02 08:30:39'),
(64, 66, 1, 'mouse', '2026-03-02 08:33:19'),
(65, 67, 1, 'mouse', '2026-03-02 09:00:10'),
(66, 68, 1, 'mouse', '2026-03-02 09:03:05'),
(67, 69, 1, 'test', '2026-03-02 09:03:44'),
(68, 70, 1, 'test', '2026-03-02 10:02:18'),
(69, 71, 1, 'test', '2026-03-02 10:06:51'),
(70, 72, 1, 'test', '2026-03-02 10:06:58'),
(71, 73, 1, 'Laptop Asus SN: RAN0CV024926404', '2026-03-04 03:01:14'),
(72, 73, 1, 'Laptop Charger Asus', '2026-03-04 03:01:14'),
(73, 73, 1, 'Defective battery of laptop', '2026-03-04 03:01:14'),
(74, 73, 1, 'Multiple keys', '2026-03-04 03:01:14'),
(75, 73, 1, 'Documents to Sir Orman/Ma\'am Grace', '2026-03-04 03:01:14'),
(76, 74, 1, 'ASUS Laptop SN RAN0CV024926404', '2026-03-04 03:06:09'),
(77, 74, 1, 'Asus Laptop charger', '2026-03-04 03:06:09'),
(78, 74, 1, 'Asus Defective laptop battery', '2026-03-04 03:06:09'),
(79, 74, 1, 'Multiple keys', '2026-03-04 03:06:09'),
(80, 74, 1, 'Documents for Sir Orma/Ma\'am Grace', '2026-03-04 03:06:09'),
(81, 74, 1, 'Biometrics SN: ZJW2252000059', '2026-03-04 03:06:09'),
(82, 75, 1, '23121', '2026-03-04 03:17:43'),
(83, 76, 1, 'sdfas', '2026-03-04 03:19:23'),
(84, 77, 1, 'afsa', '2026-03-04 03:20:32'),
(85, 78, 1, 'Asus Laptop SN: N5NXCV03K176193. With Asus Charger and bag', '2026-03-11 00:47:31'),
(86, 79, 1, 'Asus Laptop SN: N5NXCV03K176193. With Asus Charger and bag', '2026-03-11 01:06:22'),
(87, 80, 1, 'Asus Laptop SN: N5NXCV03K176193. With Asus Charger and bag', '2026-03-11 01:41:02'),
(88, 81, 1, 'Asus Laptop SN: N5NXCV03K176193. With Asus Charger and bag', '2026-03-11 01:43:09'),
(89, 82, 1, 'Asus Laptop SN: N5NXCV03K176193. With Asus Charger and bag', '2026-03-11 01:46:31'),
(90, 83, 1, 'Asus Laptop SN: N5NXCV03K176193. With Asus Charger and bag', '2026-03-11 01:48:51'),
(91, 84, 1, 'Asus Laptop SN: N5NXCV03K176193. With Asus Charger and bag', '2026-03-11 01:50:59'),
(92, 85, 1, 'Asus Laptop SN: N5NXCV03K176193. With Asus Charger and bag', '2026-03-11 01:52:29'),
(93, 86, 1, 'Asus Laptop SN: N5NXCV03K176193. With Asus Charger and bag', '2026-03-11 01:54:20'),
(94, 87, 1, 'Asus Laptop SN: N5NXCV03K176193. With Asus Charger and bag', '2026-03-11 01:54:22'),
(95, 88, 1, 'Asus Laptop SN: N5NXCV03K176193. With Asus Charger and bag', '2026-03-11 01:54:23'),
(96, 89, 1, 'Asus Laptop SN: N5NXCV03K176193. With Asus Charger and bag', '2026-03-11 01:56:35'),
(97, 90, 1, 'Asus Laptop SN: N5NXCV03K176193. With Asus Charger and bag', '2026-03-11 02:01:13'),
(98, 91, 1, 'Asus Laptop SN: N5NXCV03K176193. With Asus Charger and bag', '2026-03-11 02:02:54'),
(99, 92, 1, ' Asus Laptop SN: N5NXCV03K176193. With Asus Charger and bag', '2026-03-11 02:24:50'),
(100, 93, 1, ' Asus Laptop SN: N5NXCV03K176193. With Asus Charger and bag', '2026-03-11 02:27:23'),
(101, 94, 1, 'Asus Laptop SN: N5NXCV03K176193. With Asus Charger and bag', '2026-03-11 02:28:45'),
(102, 95, 1, 'adfasd', '2026-03-20 02:15:04'),
(103, 95, 1, 'asdfas', '2026-03-20 02:15:04'),
(104, 96, 1, 'blah', '2026-03-20 02:21:16'),
(105, 96, 1, 'blah', '2026-03-20 02:21:16'),
(106, 97, 1, 'test', '2026-04-04 08:17:28'),
(107, 97, 2, 'test', '2026-04-04 08:17:28'),
(108, 98, 1, 'REWSRDFGHV', '2026-04-04 08:18:35'),
(109, 99, 1, 'REWSRDFGHV', '2026-04-04 08:39:49'),
(110, 100, 1, 'REWSRDFGHV', '2026-04-04 08:40:29'),
(111, 101, 1, 'REWSRDFGHV', '2026-04-04 08:42:37'),
(112, 102, 1, 'test', '2026-04-04 08:47:18'),
(113, 103, 1, 'test', '2026-04-04 09:08:20'),
(114, 104, 1, 'test', '2026-04-04 09:18:15'),
(115, 105, 1, 'asdfa', '2026-04-06 00:28:00');

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

--
-- Dumping data for table `it_equipment_logs`
--

INSERT INTO `it_equipment_logs` (`id`, `email`, `borrower_name`, `business_unit`, `item_id`, `action`, `items`, `borrow_date`, `return_date`, `created_at`) VALUES
(1, 'aholiva@toplislogistics.com', 'arvie', 'TOPLIS Solutions', 'lgi004', 'borrow', 'Laptop', '2026-03-02', '0000-00-00', '2026-03-01 07:35:00'),
(2, 'aholiva@toplislogistics.com', 'Arvie', 'TOPLIS Solutions', 'LG00111', 'borrow', 'Laptop', '2026-03-02', '2026-03-01', '2026-03-01 10:41:09'),
(3, 'aholiva@toplislogistics.com', 'Arvie', 'TOPLIS Solutions', 'LG00111', 'borrow', 'Laptop', '2026-03-02', '2026-03-01', '2026-03-01 10:41:35'),
(4, 'aholiva@toplislogistics.com', 'Arvie', 'TOPLIS Solutions', 'LG00111', 'borrow', 'Laptop', '2026-03-02', '2026-03-01', '2026-03-01 10:42:26'),
(5, 'aholiva@toplislogistics.com', 'Arvie', 'TOPLIS Logistics', 'LG00111', 'borrow', 'Keyboard', '2026-03-02', '2026-03-01', '2026-03-01 12:42:10'),
(6, 'aholiva@toplislogistics.com', 'Arvie', 'TOPLIS Logistics', 'LG00111', 'borrow', 'Keyboard', '2026-03-02', '2026-03-01', '2026-03-01 12:42:52'),
(7, 'aholiva@toplislogistics.com', 'Arvie', 'TOPLIS Logistics', 'LG00111', 'borrow', 'Keyboard', '2026-03-02', '2026-03-01', '2026-03-01 12:43:17'),
(8, 'aholiva@toplislogistics.com', 'Arvie', 'TOPLIS Logistics', 'LG00111', 'borrow', 'Keyboard', '2026-03-02', '2026-03-01', '2026-03-01 12:45:11'),
(9, 'aholiva@toplislogistics.com', 'Arvie', 'TOPLIS Logistics', 'LG00111', 'borrow', 'Keyboard', '2026-03-02', '2026-03-01', '2026-03-01 12:45:31'),
(10, 'aholiva@toplislogistics.com', 'Arvie', 'TOPLIS Logistics', 'LG00111', 'borrow', 'Keyboard', '2026-03-02', '2026-03-01', '2026-03-01 12:46:20'),
(11, 'aholiva@toplislogistics.com', 'Arvie', 'TOPLIS Logistics', 'LG00111', 'borrow', 'Keyboard', '2026-03-02', '2026-03-01', '2026-03-01 12:49:29'),
(12, 'aholiva@toplislogistics.com', 'Arvie', 'TOPLIS Logistics', 'LG00111', 'borrow', 'Keyboard', '2026-03-02', '2026-03-01', '2026-03-01 12:52:16'),
(13, 'aholiva@toplislogistics.com', 'Arvie', 'TOPLIS Logistics', 'LG00111', 'borrow', 'Keyboard', '2026-03-02', '2026-03-01', '2026-03-01 12:53:06'),
(14, 'aholiva@toplislogistics.com', 'Arvie', 'TOPLIS Solutions', 'LG00111', 'borrow', 'Keyboard', '2026-03-02', '2026-03-01', '2026-03-01 13:40:36');

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
-- Dumping data for table `signatures`
--

INSERT INTO `signatures` (`id`, `form_id`, `role`, `file_path`, `created_at`) VALUES
(1, 20, 'prepared', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/prepared_20.png', '2026-03-01 07:48:35'),
(2, 20, 'checked', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/checked_20.png', '2026-03-01 07:48:35'),
(3, 20, 'approved', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/approved_20.png', '2026-03-01 07:48:35'),
(4, 20, 'received', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/received_20.png', '2026-03-01 07:48:35'),
(5, 21, 'prepared', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/prepared_21.png', '2026-03-01 07:54:58'),
(6, 21, 'checked', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/checked_21.png', '2026-03-01 07:54:58'),
(7, 21, 'approved', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/approved_21.png', '2026-03-01 07:54:58'),
(8, 21, 'received', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/received_21.png', '2026-03-01 07:54:58'),
(9, 22, 'prepared', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/prepared_22.png', '2026-03-01 07:56:29'),
(10, 22, 'checked', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/checked_22.png', '2026-03-01 07:56:29'),
(11, 22, 'approved', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/approved_22.png', '2026-03-01 07:56:29'),
(12, 22, 'received', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/received_22.png', '2026-03-01 07:56:29'),
(13, 23, 'prepared', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/prepared_23.png', '2026-03-01 07:58:39'),
(14, 23, 'checked', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/checked_23.png', '2026-03-01 07:58:39'),
(15, 23, 'approved', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/approved_23.png', '2026-03-01 07:58:39'),
(16, 23, 'received', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/received_23.png', '2026-03-01 07:58:39'),
(17, 24, 'prepared', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/prepared_24.png', '2026-03-01 08:02:24'),
(18, 24, 'checked', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/checked_24.png', '2026-03-01 08:02:24'),
(19, 24, 'approved', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/approved_24.png', '2026-03-01 08:02:24'),
(20, 24, 'received', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/received_24.png', '2026-03-01 08:02:24'),
(21, 25, 'prepared', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/prepared_25.png', '2026-03-01 08:06:03'),
(22, 25, 'checked', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/checked_25.png', '2026-03-01 08:06:03'),
(23, 25, 'approved', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/approved_25.png', '2026-03-01 08:06:03'),
(24, 25, 'received', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/received_25.png', '2026-03-01 08:06:03'),
(25, 26, 'prepared', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/prepared_26.png', '2026-03-01 08:08:46'),
(26, 26, 'checked', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/checked_26.png', '2026-03-01 08:08:46'),
(27, 26, 'approved', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/approved_26.png', '2026-03-01 08:08:46'),
(28, 26, 'received', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/received_26.png', '2026-03-01 08:08:46');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `equipment_items`
--
ALTER TABLE `equipment_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `it_equipment_logs`
--
ALTER TABLE `it_equipment_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `signatures`
--
ALTER TABLE `signatures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
