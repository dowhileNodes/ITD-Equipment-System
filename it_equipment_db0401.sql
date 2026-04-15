-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2026 at 02:42 AM
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
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `name_prepared` varchar(255) DEFAULT NULL,
  `name_checked` varchar(255) DEFAULT NULL,
  `name_approved` varchar(255) DEFAULT NULL,
  `name_received` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment_forms`
--

INSERT INTO `equipment_forms` (`id`, `recipient`, `issued_from`, `issue_date`, `created_at`, `signed_file_path`, `business_unit`, `name_prepared`, `name_checked`, `name_approved`, `name_received`) VALUES
(2, 'Arvie', 'Pedro', '2026-02-16', '2026-02-16 07:23:00', 'uploads/gatepass/gatepass_2.pdf', NULL, NULL, NULL, NULL, NULL),
(3, 'Arvie', 'Juan', '2026-02-16', '2026-02-16 08:04:21', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Arvie', 'Juan', '2026-02-16', '2026-02-16 08:16:14', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Arvie', 'Juan', '2026-02-17', '2026-02-16 08:24:11', 'uploads/gatepass/gatepass_5.pdf', NULL, NULL, NULL, NULL, NULL),
(6, 'Arvie', 'Juan', '2026-02-23', '2026-02-23 02:00:02', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'ANDREI', 'TOPLIS', '2026-02-24', '2026-02-24 05:54:59', NULL, 'KMC', 'andrei', 'arjo', 'arvie', 'andrei'),
(26, 'arvie', 'TOPLIS', '2026-02-24', '2026-02-24 06:15:01', NULL, 'IT Department', 'arvie', 'ARJO', 'andrei', 'ARJO'),
(27, 'arvie', 'TOPLIS', '2026-02-24', '2026-02-24 06:25:11', NULL, 'IT Department', 'arvie', 'ARJO', 'andrei', 'ARJO'),
(28, 'arvie', 'TOPLIS', '2026-02-24', '2026-02-24 06:31:06', NULL, 'IT Department', 'arvie', 'ARJO', 'andrei', 'ARJO'),
(29, 'arvie', 'TOPLIS', '2026-02-24', '2026-02-24 06:31:33', NULL, 'IT Department', 'arvie', 'ARJO', 'andrei', 'ARJO'),
(30, 'arvie', 'TOPLIS', '2026-02-24', '2026-02-24 06:32:15', NULL, 'IT Department', 'arvie', 'ARJO', 'andrei', 'ARJO'),
(31, 'arvie', 'TOPLIS', '2026-02-24', '2026-02-24 06:39:47', NULL, 'IT Department', 'arvie', 'ARJO', 'andrei', 'ARJO'),
(32, 'arvie', 'TOPLIS', '2026-02-24', '2026-02-24 06:43:10', NULL, 'IT Department', 'arvie', 'ARJO', 'andrei', 'ARJO'),
(33, 'arvie', 'TOPLIS', '2026-02-24', '2026-02-24 06:43:48', NULL, 'IT Department', 'arvie', 'ARJO', 'andrei', 'ARJO'),
(34, 'arvie', 'TOPLIS', '2026-02-24', '2026-02-24 06:47:10', NULL, 'IT Department', 'arvie', 'ARJO', 'andrei', 'ARJO'),
(35, 'arvie', 'TOPLIS', '2026-02-24', '2026-02-24 06:47:42', NULL, 'IT Department', 'arvie', 'ARJO', 'andrei', 'ARJO'),
(36, 'arvie', 'TOPLIS', '2026-02-24', '2026-02-24 06:53:39', NULL, 'IT Department', 'arvie', 'ARJO', 'andrei', 'ARJO'),
(37, 'arvie', 'TOPLIS', '2026-02-24', '2026-02-24 07:02:32', NULL, 'IT Department', 'arvie', 'ARJO', 'andrei', 'ARJO'),
(38, 'arvie', 'TOPLIS', '2026-02-24', '2026-02-24 07:06:35', NULL, 'IT Department', 'arvie', 'ARJO', 'andrei', 'ARJO'),
(39, 'arvie', 'TOPLIS', '2026-02-24', '2026-02-24 07:07:38', 'uploads/gatepass/gatepass_39.pdf', 'IT Department', 'arvie', 'ARJO', 'andrei', 'ARJO'),
(40, 'ANDREI', 'ARVIE', '2026-02-24', '2026-02-24 07:39:54', NULL, 'IT Department', 'toplis', 'toplis', 'toplis', 'toplis'),
(41, 'ANDREI', 'ARVIE', '2026-02-24', '2026-02-24 07:41:55', NULL, 'IT Department', 'toplis', 'toplis', 'toplis', 'toplis'),
(42, 'TLL-ALABANG', 'TSI GROUP', '2026-02-24', '2026-02-24 07:54:49', NULL, 'IT Department', 'ARJO', 'MAKABUHAT', 'TOPLIS', 'TOPL'),
(43, 'TLL-ALABANG', 'TOPLIS', '2026-02-24', '2026-02-24 08:11:03', NULL, 'KMC', 'andrei manzanes', 'andrei manzanes', 'andrei manzanes', 'andrei manzanes'),
(44, 'ANDREI', 'TOPLIS', '2026-02-24', '2026-02-24 08:24:31', NULL, 'Toplis Logistics', 'ANDREI', 'ANDREI', 'ANDREI', 'ANDREI'),
(45, 'ANDREI', 'TOPLIS', '2026-02-24', '2026-02-24 08:26:31', NULL, 'Toplis Logistics', 'ANDREI', 'ANDREI', 'ANDREI', 'ANDREI'),
(46, 'TLL-ALABANG', 'TOPLIS', '2026-03-13', '2026-02-24 08:30:41', NULL, 'KMC', 'ARJO', 'arvie', 'ANDREI', 'arvie'),
(47, 'TLL-ALABANG', 'TOPLIS', '2026-03-13', '2026-02-24 08:37:45', NULL, 'KMC', 'ARJO', 'arvie', 'ANDREI', 'arvie'),
(48, 'TLL-ALABANG', 'TOPLIS', '2026-03-13', '2026-02-24 08:43:50', NULL, 'KMC', 'ARJO', 'arvie', 'ANDREI', 'arvie'),
(49, 'ANDREI', 'TOPLIS', '2026-02-24', '2026-02-24 08:44:32', NULL, 'Toplis Solutions', 'ARJO', 'arvie', 'arvie', 'arjo'),
(50, 'ANDREI', 'TOPLIS', '2026-02-24', '2026-02-24 08:48:14', NULL, 'Toplis Solutions', 'ARJO', 'arvie', 'arvie', 'arjo'),
(51, 'ANDREI', 'TOPLIS', '2026-02-24', '2026-02-24 08:55:28', NULL, 'Toplis Solutions', 'ARJO', 'arvie', 'arvie', 'arjo'),
(52, 'ANDREI', 'TOPLIS', '2026-02-24', '2026-02-24 09:01:31', NULL, 'Toplis Solutions', 'ARJO', 'arvie', 'arvie', 'arjo'),
(53, 'ANDREI', 'TOPLIS', '2026-02-24', '2026-02-24 09:04:04', NULL, 'Toplis Solutions', 'ARJO', 'arvie', 'arvie', 'arjo'),
(54, 'ANDREI', 'TOPLIS', '2026-02-24', '2026-02-24 09:05:38', NULL, 'Toplis Solutions', 'ARJO', 'arvie', 'arvie', 'arjo'),
(55, 'ANDREI', 'TOPLIS', '2026-02-24', '2026-02-24 09:11:31', NULL, 'Toplis Solutions', 'ARJO', 'arvie', 'arvie', 'arjo'),
(56, 'ANDREI', 'TOPLIS', '2026-02-24', '2026-02-24 09:12:49', NULL, 'Toplis Solutions', 'ARJO', 'arvie', 'arvie', 'arjo'),
(57, 'ANDREI', 'TOPLIS', '2026-02-24', '2026-02-24 09:30:40', 'uploads/gatepass/gatepass_57.pdf', 'Toplis Solutions', 'ARJO', 'arvie', 'arvie', 'arjo'),
(58, 'ANDREI', 'TOPLIS', '2026-02-24', '2026-02-24 09:35:38', NULL, 'Toplis Solutions', 'ARJO', 'arvie', 'arvie', 'arjo'),
(59, 'ANDREI', 'TOPLIS', '2026-02-24', '2026-02-24 09:51:40', 'uploads/gatepass/gatepass_59.pdf', 'KMC', 'arvie', 'ARJO', 'TOPLIS', 'andrei'),
(60, 'ANDREI', 'TOPLIS', '2026-02-25', '2026-02-25 00:21:50', NULL, 'IT Department', 'arjo', 'arvie', 'andrei', 'toplis'),
(61, 'arvie', 'Juan', '2026-02-25', '2026-02-25 00:26:29', 'uploads/gatepass/gatepass_61.pdf', 'IT Department', 'ARVIE', 'ARVIE', 'ARVIE', 'ARVIE'),
(62, 'TLL-ALABANG', 'TSI GROUP', '2026-02-25', '2026-02-25 00:32:05', NULL, 'IT Department', 'ARJO', 'MAKABUHAT', 'MARK', 'ANDREI'),
(63, 'TLL-ALABANG', 'TOPLIS', '2026-02-25', '2026-02-25 00:38:47', NULL, 'IT Department', 'ANDREI', 'ARJO', 'TOPLIS', 'ANDREI'),
(64, 'ANDREI', 'TOPLIS', '2026-02-25', '2026-02-25 01:15:32', NULL, 'IT Department', 'ANDREI', 'ARJO', 'MARK', 'arvie'),
(65, 'ANDREI', 'TOPLIS', '2026-02-25', '2026-02-25 01:23:38', NULL, 'IT Department', 'ANDREI', 'ARJO', 'MARK', 'arvie'),
(66, 'ANDREI', 'TOPLIS', '2026-02-25', '2026-02-25 01:25:13', NULL, 'IT Department', 'ANDREI', 'ARJO', 'MARK', 'arvie'),
(67, 'ANDREI', 'TOPLIS', '2026-02-25', '2026-02-25 01:40:31', 'uploads/gatepass/gatepass_67.pdf', 'IT Department', 'ANDREI', 'ARJO', 'MARK', 'arvie'),
(68, 'ANDREI', 'TSI GROUP', '2026-02-12', '2026-02-25 02:58:13', NULL, 'KMC', 'toplis', 'ANDREI', 'arvie', 'arvie'),
(69, 'ANDREI', 'TSI GROUP', '2026-02-12', '2026-02-25 02:59:26', NULL, 'KMC', 'toplis', 'ANDREI', 'arvie', 'arvie'),
(70, 'ANDREI', 'andrei', '2026-02-18', '2026-02-25 03:03:34', 'uploads/gatepass/gatepass_70.pdf', 'IT Department', 'arvie', 'ANDREI', 'arjo', 'arvie'),
(71, 'ANDREI', 'andrei', '2026-02-18', '2026-02-25 03:03:59', NULL, 'IT Department', 'arvie', 'ANDREI', 'arjo', 'arvie'),
(72, 'ANDREI', 'TOPLIS', '2026-02-25', '2026-02-25 03:05:11', 'uploads/gatepass/gatepass_72.pdf', 'IT Department', '', '', '', ''),
(73, 'ANDREI', 'TOPLIS', '2026-02-25', '2026-02-25 03:13:38', 'uploads/gatepass/gatepass_73.pdf', 'IT Department', 'toplis', 'arvie', 'arvie', 'ANDREI'),
(74, 'ANDREI', 'TOPLIS', '2026-02-25', '2026-02-25 03:19:55', 'uploads/gatepass/gatepass_74.pdf', 'IT Department', 'toplis', 'arvie', 'arvie', 'ANDREI'),
(75, 'ANDREI', 'TOPLIS', '2026-02-25', '2026-02-25 03:28:31', 'uploads/gatepass/gatepass_75.pdf', 'IT Department', 'toplis', 'arvie', 'arvie', 'ANDREI'),
(76, 'ANDREI', 'TOPLIS', '2026-02-25', '2026-02-25 03:29:09', 'uploads/gatepass/gatepass_76.pdf', 'IT Department', 'arvie', 'MAKABUHAT', 'TOPLIS', 'ARJO'),
(77, 'ANDREI', 'TOPLIS', '2026-02-25', '2026-02-25 05:19:12', 'uploads/gatepass/gatepass_77.pdf', 'IT Department', 'ARJO', 'MAKABUHAT', 'TOPLIS', 'arvie'),
(90, 'ANDREI', 'TOPLIS', '2026-02-27', '2026-02-27 02:43:35', NULL, NULL, NULL, NULL, NULL, NULL),
(91, 'ANDREI', 'TOPLIS', '2026-02-27', '2026-02-27 02:45:52', NULL, NULL, NULL, NULL, NULL, NULL),
(92, 'ANDREI', 'TOPLIS', '2026-02-27', '2026-02-27 02:46:46', NULL, NULL, NULL, NULL, NULL, NULL),
(93, 'ANDREI', 'TOPLIS', '2026-02-27', '2026-02-27 02:51:44', NULL, NULL, NULL, NULL, NULL, NULL),
(94, 'ANDREI', 'TOPLIS', '2026-02-27', '2026-02-27 02:56:28', NULL, NULL, NULL, NULL, NULL, NULL),
(95, 'ANDREI', 'TOPLIS', '2026-02-27', '2026-02-27 02:59:30', NULL, NULL, NULL, NULL, NULL, NULL),
(96, 'ANDREI', 'TOPLIS', '2026-02-27', '2026-02-27 03:01:21', NULL, NULL, NULL, NULL, NULL, NULL),
(97, 'ANDREI', 'TOPLIS', '2026-02-27', '2026-02-27 03:03:52', NULL, 'IT Department', '1', '1', '1', '1'),
(98, 'ANDREI', 'TOPLIS', '2026-02-27', '2026-02-27 03:09:00', NULL, NULL, NULL, NULL, NULL, NULL),
(99, 'ANDREI', 'TOPLIS', '2026-02-27', '2026-02-27 03:12:53', NULL, NULL, NULL, NULL, NULL, NULL),
(100, 'ANDREI', 'TOPLIS', '2026-02-27', '2026-02-27 03:12:56', NULL, NULL, NULL, NULL, NULL, NULL),
(101, 'ANDREI', 'TOPLIS', '2026-02-27', '2026-02-27 03:13:57', NULL, NULL, NULL, NULL, NULL, NULL),
(102, 'ANDREI', 'TOPLIS', '2026-02-27', '2026-02-27 03:14:30', NULL, NULL, NULL, NULL, NULL, NULL),
(103, 'ANDREI', 'TOPLIS', '2026-02-27', '2026-02-27 03:15:56', NULL, NULL, NULL, NULL, NULL, NULL),
(104, 'ANDREI', '1', '2026-02-27', '2026-02-27 03:19:27', NULL, 'IT Department', '1', '1', '1', '1'),
(105, 'ANDREI', 'andrei', '2026-02-27', '2026-02-27 03:34:38', NULL, 'itd', '1', NULL, NULL, NULL),
(106, 'ANDREI', 'andrei', '2026-02-27', '2026-02-27 03:36:32', NULL, 'itd', '1', NULL, NULL, NULL),
(107, '1', '1', '2026-02-27', '2026-02-27 03:42:29', NULL, 'IT Department', '1', '1', '1', '1'),
(108, 'ANDREI', 'TOPLIS', '2026-02-27', '2026-02-27 04:44:01', NULL, 'KMC', '1', '1', '1', '1'),
(109, 'ANDREI', 'TOPLIS', '2026-02-27', '2026-02-27 04:46:54', NULL, 'KMC', '1', '1', '1', '1'),
(110, 'ANDREI', 'TOPLIS', '2026-02-27', '2026-02-27 04:46:56', NULL, 'KMC', '1', '1', '1', '1'),
(111, 'ANDREI', 'TOPLIS', '2026-02-27', '2026-02-27 04:47:51', NULL, 'KMC', '1', '1', '1', '1'),
(112, 'ANDREI', 'TOPLIS', '2026-02-27', '2026-02-27 04:49:13', NULL, 'KMC', '1', '1', '1', '1'),
(113, '1', '1', '2026-02-27', '2026-02-27 05:01:30', NULL, 'tsi', '1', '1', '1', '1'),
(114, '1', '1', '2026-02-27', '2026-02-27 05:03:07', NULL, 'tsi', '1', '1', '1', '1'),
(115, '1', '1', '2026-02-27', '2026-02-27 05:03:24', NULL, 'itd', '1', '1', '1', '1'),
(116, '11', '11', '2026-02-27', '2026-02-27 05:08:35', NULL, 'itd', '1', '1', '1', '1'),
(117, 'ANDREI', 'TOPLIS', '2026-02-27', '2026-02-27 05:11:54', NULL, 'KMC', '1', '1', '1', '1'),
(118, '1', '1', '2026-02-27', '2026-02-27 05:12:25', NULL, 'itd', '1', '1', '1', '1'),
(119, 'ANDREI', 'TOPLIS', '2026-02-27', '2026-02-27 05:12:48', NULL, 'KMC', '1', '1', '1', '1'),
(120, '1', '1', '2026-02-27', '2026-02-27 05:15:51', NULL, 'itd', '1', '1', '1', '1'),
(121, '1', '1', '2026-02-27', '2026-02-27 05:19:10', NULL, 'itd', '1', '1', '1', '1'),
(122, '1', '1', '2026-02-27', '2026-02-27 05:22:10', NULL, 'itd', '1', '1', '1', '1'),
(123, '1', '1', '2026-02-27', '2026-02-27 05:24:48', NULL, 'itd', '1', '1', '1', '1'),
(124, '1', '1', '2026-02-27', '2026-02-27 05:25:09', NULL, 'itd', '1', '1', '1', '1'),
(125, '1', '1', '2026-02-27', '2026-02-27 05:25:44', NULL, 'itd', '1', '1', '1', '1'),
(126, '1', '1', '2026-02-27', '2026-02-27 05:28:00', NULL, 'kmc', '1', '1', '1', '1'),
(127, '1', '1', '2026-02-27', '2026-02-27 05:28:22', NULL, 'itd', '1', '1', '1', '1'),
(128, '1', '1', '2026-02-27', '2026-02-27 05:36:36', NULL, 'itd', '1', '1', '1', '1'),
(129, '1', '1', '2026-02-27', '2026-02-27 05:37:46', NULL, 'itd', '1', '1', '1', '1'),
(130, 'ANDREI', 'TOPLIS', '2026-02-27', '2026-02-27 05:39:26', NULL, 'KMC', '1', '1', '1', '1'),
(131, 'ANDREI', 'TOPLIS', '2026-02-27', '2026-02-27 05:41:45', NULL, 'KMC', '1', '1', '1', '1'),
(132, 'ANDREI', 'TOPLIS', '2026-02-27', '2026-02-27 05:44:25', NULL, 'KMC', '1', '1', '1', '1'),
(133, 'ANDREI', 'TOPLIS', '2026-02-27', '2026-02-27 05:46:23', NULL, 'KMC', '1', '1', '1', '1'),
(134, 'ANDREI', 'TOPLIS', '2026-02-27', '2026-02-27 05:48:08', NULL, 'KMC', '1', '1', '1', '1'),
(135, 'ANDREI', 'TOPLIS', '2026-02-27', '2026-02-27 05:48:26', NULL, 'KMC', '1', '1', '1', '1'),
(136, '1', '1', '2026-02-27', '2026-02-27 05:54:34', NULL, 'itd', '1', '1', '1', '1'),
(137, '1', '1', '2026-02-27', '2026-02-27 05:58:35', NULL, 'itd', '1', '1', '1', '1'),
(138, '1', '1', '2026-02-27', '2026-02-27 06:07:16', NULL, 'itd', '1', NULL, NULL, NULL),
(139, '1', '1', '2026-02-27', '2026-02-27 06:08:54', NULL, 'IT Department', '1', '1', '1', '1'),
(140, '1', '1', '2026-02-27', '2026-02-27 06:09:48', NULL, 'IT Department', '1', '1', '1', '1'),
(141, '1', '1', '2026-02-27', '2026-02-27 06:15:04', NULL, 'itd', '1', NULL, NULL, NULL),
(142, '1', '1', '2026-02-27', '2026-02-27 06:16:36', NULL, 'itd', '1', NULL, NULL, NULL),
(143, '1', '1', '2026-02-27', '2026-02-27 06:16:49', NULL, 'IT Department', '1', '1', '1', '1'),
(144, '1', '1', '2026-02-27', '2026-02-27 06:18:12', NULL, 'itd', '1', NULL, NULL, NULL),
(145, '1', '1', '2026-02-27', '2026-02-27 06:18:41', NULL, 'IT Department', '1', '1', '1', '1'),
(146, 'q', 'q', '2026-02-27', '2026-02-27 06:21:27', NULL, 'tsi', '123', NULL, NULL, NULL),
(147, 'q', 'q', '2026-02-27', '2026-02-27 06:21:58', NULL, 'tsi', '123', NULL, NULL, NULL),
(148, 'q', 'q', '2026-02-27', '2026-02-27 06:22:37', NULL, 'tsi', '123', NULL, NULL, NULL),
(149, 'q', 'q', '2026-02-27', '2026-02-27 06:23:32', NULL, 'tsi', '123', NULL, NULL, NULL),
(150, '1', '1', '2026-02-27', '2026-02-27 06:24:06', NULL, 'IT Department', '1', '1', '1', '1'),
(151, '1', '1', '2026-02-27', '2026-02-27 06:24:17', NULL, 'IT Department', '1', '1', '1', '1'),
(152, '1', '1', '2026-02-27', '2026-02-27 06:42:27', NULL, 'IT Department', '1', '1', '1', '1'),
(153, 'ANDREI', 'TOPLIS', '2026-02-27', '2026-02-27 06:45:45', NULL, NULL, NULL, NULL, NULL, NULL),
(154, 'ANDREI', 'TOPLIS', '2026-02-27', '2026-02-27 06:45:49', NULL, NULL, NULL, NULL, NULL, NULL),
(155, 'ANDREI', 'TOPLIS', '2026-02-27', '2026-02-27 06:49:42', NULL, NULL, NULL, NULL, NULL, NULL),
(156, 'ANDREI', '1', '2026-02-27', '2026-02-27 06:53:43', NULL, NULL, '1', NULL, NULL, NULL),
(157, 'ANDREI', '1', '2026-02-27', '2026-02-27 06:54:42', NULL, NULL, '1', NULL, NULL, NULL),
(158, 'ANDREI', '1', '2026-02-27', '2026-02-27 06:55:30', NULL, NULL, '1', NULL, NULL, NULL),
(159, 'ANDREI', '1', '2026-02-27', '2026-02-27 06:57:00', NULL, NULL, '1', NULL, NULL, NULL),
(160, 'ANDREI', '1', '2026-02-27', '2026-02-27 06:58:13', NULL, NULL, '1', NULL, NULL, NULL),
(161, 'ANDREI', '1', '2026-02-27', '2026-02-27 06:58:30', NULL, NULL, '1', NULL, NULL, NULL),
(162, '1', '1', '2026-02-27', '2026-02-27 07:04:50', NULL, 'IT Department', '1', '1', '1', '1'),
(163, '1', '1', '2026-02-27', '2026-02-27 07:05:55', NULL, 'IT Department', '1', '1', '1', '1'),
(164, '1', '1', '2026-02-27', '2026-02-27 07:24:43', NULL, 'IT Department', '1', '1', '1', '1'),
(165, '1', '1', '2026-02-27', '2026-02-27 07:29:15', NULL, 'IT Department', '1', '1', '1', '1'),
(166, '1', '1', '2026-02-27', '2026-02-27 07:29:23', NULL, 'IT Department', '1', '1', '1', '1'),
(167, '1', '1', '2026-02-27', '2026-02-27 07:30:33', NULL, 'IT Department', '1', '1', '1', '1'),
(168, '1', '1', '2026-02-27', '2026-02-27 07:30:45', NULL, 'IT Department', '1', '1', '1', '1'),
(169, 'ANDREI', 'TSI GROUP', '2026-02-27', '2026-02-27 08:45:55', NULL, 'IT Department', '1', '1', '1', '1'),
(170, '1', '1', '2026-02-27', '2026-02-27 08:52:39', NULL, 'IT Department', '1', '1', '1', '1'),
(171, '1', '1', '2026-02-27', '2026-02-27 08:55:14', NULL, 'IT Department', '1', '1', '1', '1'),
(172, '1', '1', '2026-02-27', '2026-02-27 08:55:35', NULL, 'IT Department', '1', '1', '1', '1'),
(173, 'a', 'a', '2026-02-27', '2026-02-27 08:56:27', NULL, 'KMC', '1', '1', '1', '1'),
(174, 'KAI', 'KAI', '2026-03-02', '2026-03-02 08:23:30', 'uploads/gatepass/Equipment_Form_174.pdf', 'itd', 'KAI', 'KAI', 'KAI', 'KAI'),
(175, 'KAI', 'KAI', '2026-03-02', '2026-03-02 08:25:02', NULL, 'itd', 'KAI', 'KAI', 'KAI', 'KAI'),
(176, 'ANDREI', 'ARVIE', '2026-03-05', '2026-03-05 07:36:22', NULL, 'IT Department', 'anjo', 'anjo', 'anjo ', 'anjo'),
(177, 'ANDREI', 'TSI GROUP', '2026-03-27', '2026-03-05 08:22:32', NULL, 'KMC', 'arvie', 'andrei', 'TOPLIS', 'ANDREI'),
(178, '1', '1', '2026-03-05', '2026-03-05 08:30:58', NULL, 'IT Department', '1', '1', '1', '1'),
(179, 'ERICKA GARCIA', 'IT DEPARTMENT', '2026-03-16', '2026-03-16 03:12:36', NULL, 'Toplis Logistics', 'ARVIE OLIVA', 'ANJO FUENTES', 'ANJO FUENTES', 'GARY CADUCOY'),
(180, 'ERICKA GARCIA', 'IT DEPARTMENT', '2026-03-16', '2026-03-16 03:16:05', NULL, 'Toplis Logistics', 'ARVIE OLIVA', 'ANJO FUENTES', 'ANJO FUENTES', 'GARY CADUCOY'),
(181, 'ERICA GARCIA', 'IT DEPARTMENT', '2026-03-16', '2026-03-16 03:16:16', NULL, 'Toplis Logistics', 'ARVIE OLIVA', 'ANJO FUENTES', 'ANJO FUENTES', 'GARY CADUCOY'),
(182, 'ANDREI', 'TSI GROUP', '2026-03-17', '2026-03-17 01:01:03', NULL, 'IT Department', 'andrei', 'andrei', 'andrei', 'andrei'),
(183, 'ANDREI', 'TSI GROUP', '2026-03-17', '2026-03-17 01:01:11', NULL, 'IT Department', 'andrei', 'andrei', 'andrei', 'andrei'),
(184, 'ANDREI', 'TSI GROUP', '2026-03-17', '2026-03-17 01:11:19', NULL, 'IT Department', 'andrei', 'andrei', 'andrei', 'andrei'),
(185, 'ANDREI', 'TOPLIS', '2026-03-17', '2026-03-17 01:16:34', NULL, 'KMC', 'ANDREI', 'ANDREI', 'ANDREI', 'ANDREI'),
(186, 'ANDREI', 'TOPLIS', '2026-03-17', '2026-03-17 01:23:46', NULL, 'KMC', 'ANDREI', 'ANDREI', 'ANDREI', 'ANDREI'),
(187, 'ANDREI', 'TOPLIS', '2026-03-17', '2026-03-17 01:27:20', NULL, 'KMC', 'ANDREI', 'ANDREI', 'ANDREI', 'ANDREI'),
(188, 'ANDREI', 'TOPLIS', '2026-03-17', '2026-03-17 01:27:52', NULL, 'KMC', 'ANDREI', 'ANDREI', 'ANDREI', 'ANDREI'),
(189, 'ANDREI', 'TOPLIS', '2026-03-17', '2026-03-17 01:28:10', NULL, 'KMC', 'ANDREI', 'ANDREI', 'ANDREI', 'ANDREI'),
(190, 'ANDREI', 'TOPLIS', '2026-03-17', '2026-03-17 01:29:04', NULL, 'KMC', 'ANDREI', 'ANDREI', 'ANDREI', 'ANDREI'),
(191, 'ANDREI', 'TOPLIS', '2026-03-17', '2026-03-17 01:31:48', NULL, 'KMC', 'ANDREI', 'ANDREI', 'ANDREI', 'ANDREI'),
(192, 'ANDREI', 'TOPLIS', '2026-03-17', '2026-03-17 01:32:11', NULL, 'KMC', 'ANDREI', 'ANDREI', 'ANDREI', 'ANDREI'),
(193, 'ANDREI', 'TOPLIS', '2026-03-17', '2026-03-17 01:32:26', NULL, 'KMC', 'ANDREI', 'ANDREI', 'ANDREI', 'ANDREI'),
(194, 'ANDREI', 'TOPLIS', '2026-03-17', '2026-03-17 01:34:11', NULL, 'KMC', 'ANDREI', 'ANDREI', 'ANDREI', 'ANDREI'),
(195, 'ANDREI', 'TOPLIS', '2026-03-17', '2026-03-17 01:42:52', NULL, 'KMC', 'ANDREI', 'ANDREI', 'ANDREI', 'ANDREI'),
(196, 'ANDREI', 'TOPLIS', '2026-03-17', '2026-03-17 01:44:40', NULL, 'KMC', 'ANDREI', 'ANDREI', 'ANDREI', 'ANDREI'),
(197, 'ANDREI', 'TOPLIS', '2026-03-17', '2026-03-17 01:49:09', NULL, 'KMC', 'ANDREI', 'ANDREI', 'ANDREI', 'ANDREI'),
(198, 'ANDREI', 'TOPLIS', '2026-03-17', '2026-03-17 01:49:35', NULL, 'KMC', 'ANDREI', 'ANDREI', 'ANDREI', 'ANDREI'),
(199, 'ANDREI', 'ARVIE', '2026-03-17', '2026-03-17 01:51:52', NULL, 'IT Department', '1', '1', '1', '1'),
(200, '', 'IT DEPARTMENT', '2026-03-17', '2026-03-17 07:15:42', NULL, 'TOTCI', 'ARVIE OLIVA', 'ARVIE OLIVA', 'ARVIE OLIVA', ''),
(201, 'ANDREI', 'TOPLIS', '2026-03-19', '2026-03-19 00:21:46', NULL, 'TOTCI', 'ANDREI', 'ANJO', 'ARVIE OLIVA', 'ANDREI'),
(202, 'ANDREI', 'TOPLIS', '2026-03-19', '2026-03-19 00:36:06', NULL, 'TOTCI', 'ANDREI', 'ANJO', 'ARVIE OLIVA', 'ANDREI'),
(203, 'ANDREI', 'TOPLIS', '2026-03-19', '2026-03-19 00:37:19', NULL, 'TOTCI', 'ANDREI', 'ANJO', 'ARVIE OLIVA', 'ANDREI'),
(204, 'ANDREI', 'TOPLIS', '2026-03-19', '2026-03-19 00:47:40', NULL, 'TOTCI', 'ANDREI', 'ANJO', 'ARVIE OLIVA', 'ANDREI'),
(205, 'ANDREI', 'TOPLIS', '2026-03-19', '2026-03-19 01:10:01', NULL, 'TOTCI', 'ANDREI', 'ANJO', 'ARVIE OLIVA', 'ANDREI'),
(206, 'ANDREI', 'TOPLIS', '2026-03-19', '2026-03-19 01:23:12', NULL, 'TOTCI', 'ANDREI', 'ANJO', 'ARVIE OLIVA', 'ANDREI'),
(207, 'ANDREI', 'TOPLIS', '2026-03-19', '2026-03-19 01:36:10', NULL, 'TOTCI', 'ANDREI', 'ANJO', 'ARVIE OLIVA', 'ANDREI'),
(208, 'ANDREI', 'TOPLIS', '2026-03-19', '2026-03-19 01:42:37', NULL, 'TOTCI', 'ANDREI', 'ANJO', 'ARVIE OLIVA', 'ANDREI'),
(209, 'ANDREI', 'TOPLIS', '2026-03-19', '2026-03-19 01:43:32', NULL, 'IT Department', 'ARJO', 'ANDREI', 'ARVIE OLIVA', 'ARJO'),
(210, 'ANDREI', 'TOPLIS', '2026-03-19', '2026-03-19 01:59:49', NULL, 'IT Department', 'ARJO', 'ANDREI', 'ARVIE OLIVA', 'ARJO'),
(211, 'ANDREI', 'TOPLIS', '2026-03-19', '2026-03-19 02:01:11', NULL, 'IT Department', 'ARJO', 'ANDREI', 'ARVIE OLIVA', 'ARJO'),
(212, 'ANDREI', 'TOPLIS', '2026-03-19', '2026-03-19 02:17:25', NULL, 'IT Department', 'ARJO', 'ANDREI', 'ARVIE OLIVA', 'ARJO'),
(213, 'ANDREI', 'TOPLIS', '2026-03-19', '2026-03-19 02:19:52', NULL, 'IT Department', 'ARJO', 'ANDREI', 'ARVIE OLIVA', 'ARJO'),
(214, 'ANDREI', 'TOPLIS', '2026-03-19', '2026-03-19 02:20:14', NULL, 'IT Department', 'ARJO', 'ANDREI', 'ARVIE OLIVA', 'ARJO'),
(215, 'ANDREI', 'TOPLIS', '2026-03-19', '2026-03-19 02:20:53', NULL, 'IT Department', 'ARJO', 'ANDREI', 'ARVIE OLIVA', 'ARJO'),
(216, 'ANDREI', 'TOPLIS', '2026-03-19', '2026-03-19 02:21:17', NULL, 'IT Department', 'ARJO', 'ANDREI', 'ARVIE OLIVA', 'ARJO'),
(217, 'ANDREI', 'TOPLIS', '2026-03-19', '2026-03-19 02:21:55', NULL, 'IT Department', 'ARJO', 'ANDREI', 'ARVIE OLIVA', 'ARJO'),
(218, 'ANDREI', 'ARVIE', '2026-03-19', '2026-03-19 05:13:32', NULL, 'IT Department', '1', '1', '1', '1'),
(219, 'ANDREI', 'ARVIE', '2026-03-23', '2026-03-23 00:45:13', NULL, 'IT Department', 'andrei', 'andrei', 'andrei', 'andrei'),
(220, 'ANDREI', 'ARVIE', '2026-03-23', '2026-03-23 03:30:23', NULL, 'TOTCI', 'ANDREI', 'ANDREI', 'ANDREI', 'ANDREI'),
(221, 'ANDREI', 'TOPLIS', '2026-03-25', '2026-03-25 04:05:59', NULL, 'TOTCI', 'andrei', 'andrei', 'andrei', 'andrei'),
(222, 'ANDREI', 'TOPLIS', '2026-03-25', '2026-03-25 05:15:51', NULL, 'TOTCI', 'andrei', 'andrei', 'andrei', 'andrei'),
(223, 'andrei', 'toplis', '2026-03-25', '2026-03-25 05:29:50', NULL, 'IT Department', 'andrei', 'andrei', 'andrei', 'andrei'),
(224, 'andrei', 'TOPLIS', '2026-03-25', '2026-03-25 05:54:32', NULL, 'TOTCI', 'jjj', 'ARJO', 'TOPLIS', 'arjo'),
(225, 'ñÑñÑ', 'ñÑñÑ', '2026-03-25', '2026-03-25 06:47:32', NULL, 'TOTCI', 'ñÑ.-', 'ñÑ', 'ñÑ.-', 'ñÑ.-'),
(226, 'Andrei', 'Arvie', '2026-03-25', '2026-03-25 07:56:50', NULL, 'TOTCI', 'juan', 'juan', 'juan', 'juan'),
(227, 'Gary Caducoy', 'IT DEPARTMENT', '2026-03-30', '2026-03-30 04:57:10', NULL, 'Toplis Logistics', 'Anjo S. Fuentes', 'Anjo S. Fuentes', 'Anjo S. Fuentes', 'Anjo S. Fuentes'),
(228, 'Andrei', 'Andrei', '2026-03-30', '2026-03-30 05:08:07', NULL, 'TOTCI', 'Anjo S. Fuentes', 'Anjo S. Fuentes', 'Anjo S. Fuentes', 'Anjo S. Fuentes'),
(229, 'Andrei', 'Andrei', '2026-03-30', '2026-03-30 05:10:50', NULL, 'TOTCI', 'Anjo S. Fuentes', 'Anjo S. Fuentes', 'Anjo S. Fuentes', 'Anjo S. Fuentes'),
(230, 'Andrei', 'Andrei', '2026-03-30', '2026-03-30 05:14:15', NULL, 'TOTCI', 'Anjo S. Fuentes', 'Anjo S. Fuentes', 'Anjo S. Fuentes', 'Anjo S. Fuentes'),
(231, 'Andrei', 'Andrei', '2026-03-30', '2026-03-30 05:33:33', NULL, 'TOTCI', 'Anjo S. Fuentes', 'Anjo S. Fuentes', 'Anjo S. Fuentes', 'Anjo S. Fuentes'),
(232, 'Andrei', 'andrei', '2026-03-31', '2026-03-31 00:07:30', NULL, 'TOTCI', 'Andrei', 'Andrei', 'Andrei', 'Andrei'),
(233, 'AÑdrei', 'aÑdrei', '2026-03-31', '2026-03-31 00:08:38', NULL, 'TOTCI', 'AÑdrei', 'AÑdrei', 'AÑdrei', 'AÑdrei'),
(234, 'ANDREI', 'IT DEPARTMENT', '2026-03-31', '2026-03-31 01:18:28', NULL, 'tsi', 'ANDREI', 'ANDREI', 'ANDREI', 'ARVIE'),
(235, 'ANDREI', 'IT DEPARTMENT', '2026-03-31', '2026-03-31 01:19:14', NULL, 'kmc', 'ANDREI', 'ANDREI', 'ANDREI', 'ARVIE'),
(236, 'Andrei', 'IT DEPARTMENT', '2026-03-31', '2026-03-31 02:07:28', NULL, 'TOTCI', 'Andrei', 'juan', 'Andrei', 'juan'),
(237, 'Andrei', 'IT DEPARTMENT', '2026-03-31', '2026-03-31 02:07:59', NULL, 'IT Department', 'Anjo S. Fuentes', 'Andrei', 'Anjo S. Fuentes', 'Andrei');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_items`
--

CREATE TABLE `equipment_items` (
  `id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
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
(71, 25, 1, 'mouse', '2026-02-24 05:54:59'),
(72, 25, 2, 'keyboard', '2026-02-24 05:54:59'),
(73, 25, 3, 'bag', '2026-02-24 05:54:59'),
(74, 26, 3, 'bagg', '2026-02-24 06:15:01'),
(75, 26, 4, 'laptop', '2026-02-24 06:15:01'),
(76, 26, 5, 'chair', '2026-02-24 06:15:01'),
(77, 27, 3, 'bagg', '2026-02-24 06:25:11'),
(78, 27, 4, 'laptop', '2026-02-24 06:25:11'),
(79, 27, 5, 'chair', '2026-02-24 06:25:11'),
(80, 28, 3, 'bagg', '2026-02-24 06:31:06'),
(81, 28, 4, 'laptop', '2026-02-24 06:31:06'),
(82, 28, 5, 'chair', '2026-02-24 06:31:06'),
(83, 29, 3, 'bagg', '2026-02-24 06:31:33'),
(84, 29, 4, 'laptop', '2026-02-24 06:31:33'),
(85, 29, 5, 'chair', '2026-02-24 06:31:33'),
(86, 30, 3, 'bagg', '2026-02-24 06:32:15'),
(87, 30, 4, 'laptop', '2026-02-24 06:32:15'),
(88, 30, 5, 'chair', '2026-02-24 06:32:15'),
(89, 31, 3, 'bagg', '2026-02-24 06:39:47'),
(90, 31, 4, 'laptop', '2026-02-24 06:39:47'),
(91, 31, 5, 'chair', '2026-02-24 06:39:47'),
(92, 32, 3, 'bagg', '2026-02-24 06:43:10'),
(93, 32, 4, 'laptop', '2026-02-24 06:43:10'),
(94, 32, 5, 'chair', '2026-02-24 06:43:10'),
(95, 33, 3, 'bagg', '2026-02-24 06:43:48'),
(96, 33, 4, 'laptop', '2026-02-24 06:43:48'),
(97, 33, 5, 'chair', '2026-02-24 06:43:48'),
(98, 34, 3, 'bagg', '2026-02-24 06:47:10'),
(99, 34, 4, 'laptop', '2026-02-24 06:47:10'),
(100, 34, 5, 'chair', '2026-02-24 06:47:10'),
(101, 35, 3, 'bagg', '2026-02-24 06:47:42'),
(102, 35, 4, 'laptop', '2026-02-24 06:47:42'),
(103, 35, 5, 'chair', '2026-02-24 06:47:42'),
(104, 36, 3, 'bagg', '2026-02-24 06:53:39'),
(105, 36, 4, 'laptop', '2026-02-24 06:53:39'),
(106, 36, 5, 'chair', '2026-02-24 06:53:39'),
(107, 37, 3, 'bagg', '2026-02-24 07:02:32'),
(108, 37, 4, 'laptop', '2026-02-24 07:02:32'),
(109, 37, 5, 'chair', '2026-02-24 07:02:32'),
(110, 38, 3, 'bagg', '2026-02-24 07:06:35'),
(111, 38, 4, 'laptop', '2026-02-24 07:06:35'),
(112, 38, 5, 'chair', '2026-02-24 07:06:35'),
(113, 39, 3, 'bagg', '2026-02-24 07:07:38'),
(114, 39, 4, 'laptop', '2026-02-24 07:07:38'),
(115, 39, 5, 'chair', '2026-02-24 07:07:38'),
(116, 40, 2, 'LAPTOP', '2026-02-24 07:39:54'),
(117, 40, 4, 'MOUSE', '2026-02-24 07:39:54'),
(118, 40, 6, 'CAR', '2026-02-24 07:39:54'),
(119, 41, 2, 'LAPTOP', '2026-02-24 07:41:55'),
(120, 41, 4, 'MOUSE', '2026-02-24 07:41:55'),
(121, 41, 6, 'CAR', '2026-02-24 07:41:55'),
(122, 42, 1, 'mini PC Ryzen 7 16 GB 512 ssp SN:M5ST25141369 Monitor: AUC 215 SN: 23OR2HA003949 USB, MOOUSE, And KEYBOARD UPS ; Serve- 1set Mini PC - Ryzen 7 16 GB 112SSD SN: 213ORHAO03952 USB MOUSE AND KEYBOARD Secure ups SN: T2NCU141995 LAPTOP RYZEN 16 GB SSD', '2026-02-24 07:54:49'),
(123, 43, 1, 'm', '2026-02-24 08:11:03'),
(124, 43, 1, 'i', '2026-02-24 08:11:03'),
(125, 44, 1, '<', '2026-02-24 08:24:31'),
(126, 44, 1, '!', '2026-02-24 08:24:31'),
(127, 45, 1, '<', '2026-02-24 08:26:31'),
(128, 45, 1, '!', '2026-02-24 08:26:31'),
(129, 46, 2, '<', '2026-02-24 08:30:41'),
(130, 46, 4, '!', '2026-02-24 08:30:41'),
(131, 46, 1, '-', '2026-02-24 08:30:41'),
(132, 47, 2, '<', '2026-02-24 08:37:45'),
(133, 47, 4, '!', '2026-02-24 08:37:45'),
(134, 47, 1, '-', '2026-02-24 08:37:45'),
(135, 48, 2, '<', '2026-02-24 08:43:50'),
(136, 48, 4, '!', '2026-02-24 08:43:50'),
(137, 48, 1, '-', '2026-02-24 08:43:50'),
(138, 49, 2, '<', '2026-02-24 08:44:32'),
(139, 49, 2, '!', '2026-02-24 08:44:32'),
(140, 50, 2, '<', '2026-02-24 08:48:14'),
(141, 50, 2, '!', '2026-02-24 08:48:14'),
(142, 51, 2, '<', '2026-02-24 08:55:28'),
(143, 51, 2, '!', '2026-02-24 08:55:28'),
(144, 52, 2, '', '2026-02-24 09:01:31'),
(145, 52, 2, '', '2026-02-24 09:01:31'),
(146, 53, 2, '', '2026-02-24 09:04:04'),
(147, 53, 2, '', '2026-02-24 09:04:04'),
(148, 54, 2, '', '2026-02-24 09:05:38'),
(149, 54, 2, '', '2026-02-24 09:05:38'),
(150, 55, 2, '', '2026-02-24 09:11:31'),
(151, 55, 2, '', '2026-02-24 09:11:31'),
(152, 56, 2, '', '2026-02-24 09:12:49'),
(153, 56, 2, '', '2026-02-24 09:12:49'),
(154, 57, 2, '<', '2026-02-24 09:30:40'),
(155, 57, 2, '!', '2026-02-24 09:30:40'),
(156, 58, 2, '', '2026-02-24 09:35:38'),
(157, 58, 2, '', '2026-02-24 09:35:38'),
(158, 59, 2, '', '2026-02-24 09:51:40'),
(159, 59, 3, '', '2026-02-24 09:51:40'),
(160, 59, 4, '', '2026-02-24 09:51:40'),
(161, 60, 1, '', '2026-02-25 00:21:50'),
(162, 60, 1, '', '2026-02-25 00:21:50'),
(163, 60, 2, '', '2026-02-25 00:21:50'),
(164, 60, 2, '', '2026-02-25 00:21:50'),
(165, 61, 2, '', '2026-02-25 00:26:29'),
(166, 61, 2, '', '2026-02-25 00:26:29'),
(167, 61, 2, '', '2026-02-25 00:26:29'),
(168, 62, 1, '', '2026-02-25 00:32:05'),
(169, 63, 1, '', '2026-02-25 00:38:47'),
(170, 63, 1, '', '2026-02-25 00:38:47'),
(171, 65, 1, 'MINI PC RYZEN 7 16GB 512 SSD\r\nSN:M5ST25141369\r\nMONITOR: AUC 215\r\nSN:23OR2HA003949\r\nUSB, MOUSE AND KEYBOARD\r\nUPS-SERVE\r\nMINI PC RYZEN 7 16GB 512SSD\r\nSN:MSST2527813\r\nMONITOR AOC 21.5 \"\r\nSN: 23OR2HAO03952\r\nUSB, MONITOR & KEYBOARD\r\nSECURE 650 VA UPs\r\nSN:T2NCU', '2026-02-25 01:23:38'),
(172, 65, 1, 'MINI PC RYZEN 7 16GB 512 SSD\r\nSN:M5ST25141369\r\nMONITOR: AUC 215\r\nSN:23OR2HA003949\r\nUSB, MOUSE AND KEYBOARD\r\nUPS-SERVE\r\nMINI PC RYZEN 7 16GB 512SSD\r\nSN:MSST2527813\r\nMONITOR AOC 21.5 \"\r\nSN: 23OR2HAO03952\r\nUSB, MONITOR & KEYBOARD\r\nSECURE 650 VA UPs\r\nSN:T2NCU', '2026-02-25 01:23:38'),
(173, 65, 1, 'MINI PC RYZEN 7 16GB 512 SSD\r\nSN:M5ST25141369\r\nMONITOR: AUC 215\r\nSN:23OR2HA003949\r\nUSB, MOUSE AND KEYBOARD\r\nUPS-SERVE\r\nMINI PC RYZEN 7 16GB 512SSD\r\nSN:MSST2527813\r\nMONITOR AOC 21.5 \"\r\nSN: 23OR2HAO03952\r\nUSB, MONITOR & KEYBOARD\r\nSECURE 650 VA UPs\r\nSN:T2NCU', '2026-02-25 01:23:38'),
(174, 66, 1, '', '2026-02-25 01:25:13'),
(175, 66, 1, '', '2026-02-25 01:25:13'),
(176, 66, 1, '', '2026-02-25 01:25:13'),
(177, 67, 1, 'MINI PC RYZEN 7 16GB 512 SSD\r\nSN:M5ST25141369\r\nMONITOR: AUC 215\r\nSN:23OR2HA003949\r\nUSB, MOUSE AND KEYBOARD\r\nUPS-SERVE\r\nMINI PC RYZEN 7 16GB 512SSD\r\nSN:MSST2527813\r\nMONITOR AOC 21.5 \"\r\nSN: 23OR2HAO03952\r\nUSB, MONITOR & KEYBOARD\r\nSECURE 650 VA UPs\r\nSN:T2NCU', '2026-02-25 01:40:31'),
(178, 67, 1, 'MINI PC RYZEN 7 16GB 512 SSD\r\nSN:M5ST25141369\r\nMONITOR: AUC 215\r\nSN:23OR2HA003949\r\nUSB, MOUSE AND KEYBOARD\r\nUPS-SERVE\r\nMINI PC RYZEN 7 16GB 512SSD\r\nSN:MSST2527813\r\nMONITOR AOC 21.5 \"\r\nSN: 23OR2HAO03952\r\nUSB, MONITOR & KEYBOARD\r\nSECURE 650 VA UPs\r\nSN:T2NCU', '2026-02-25 01:40:31'),
(179, 67, 1, 'MINI PC RYZEN 7 16GB 512 SSD\r\nSN:M5ST25141369\r\nMONITOR: AUC 215\r\nSN:23OR2HA003949\r\nUSB, MOUSE AND KEYBOARD\r\nUPS-SERVE\r\nMINI PC RYZEN 7 16GB 512SSD\r\nSN:MSST2527813\r\nMONITOR AOC 21.5 \"\r\nSN: 23OR2HAO03952\r\nUSB, MONITOR & KEYBOARD\r\nSECURE 650 VA UPs\r\nSN:T2NCU', '2026-02-25 01:40:31'),
(180, 68, 1, 'laptop', '2026-02-25 02:58:13'),
(181, 68, 1, 'laptop', '2026-02-25 02:58:13'),
(182, 69, 1, 'laptop', '2026-02-25 02:59:26'),
(183, 69, 1, 'laptop', '2026-02-25 02:59:26'),
(184, 70, 1, '', '2026-02-25 03:03:34'),
(185, 70, 1, '', '2026-02-25 03:03:34'),
(186, 70, 1, '', '2026-02-25 03:03:34'),
(187, 71, 1, '', '2026-02-25 03:03:59'),
(188, 71, 1, '', '2026-02-25 03:03:59'),
(189, 71, 1, '', '2026-02-25 03:03:59'),
(190, 72, 1, '1', '2026-02-25 03:05:11'),
(191, 72, 1, '1', '2026-02-25 03:05:11'),
(192, 72, 1, '1', '2026-02-25 03:05:11'),
(193, 73, 4, 'laptop', '2026-02-25 03:13:38'),
(194, 73, 1, 'laptop', '2026-02-25 03:13:38'),
(195, 73, 1, 'laptop', '2026-02-25 03:13:38'),
(196, 74, 4, 'laptop', '2026-02-25 03:19:55'),
(197, 74, 1, 'laptop', '2026-02-25 03:19:55'),
(198, 74, 1, 'laptop', '2026-02-25 03:19:55'),
(199, 75, 4, 'laptop', '2026-02-25 03:28:31'),
(200, 75, 1, 'laptop', '2026-02-25 03:28:31'),
(201, 75, 1, 'laptop', '2026-02-25 03:28:31'),
(202, 76, 1, '11', '2026-02-25 03:29:09'),
(203, 76, 1, '1', '2026-02-25 03:29:09'),
(204, 76, 1, '1', '2026-02-25 03:29:09'),
(205, 77, 1, 'laptop', '2026-02-25 05:19:12'),
(206, 77, 1, 'laptop', '2026-02-25 05:19:12'),
(207, 77, 1, 'laptop', '2026-02-25 05:19:12'),
(235, 90, 1, '', '2026-02-27 02:43:35'),
(236, 91, 1, '', '2026-02-27 02:45:52'),
(237, 92, 1, '', '2026-02-27 02:46:46'),
(238, 93, 1, '', '2026-02-27 02:51:44'),
(239, 94, 1, '', '2026-02-27 02:56:28'),
(240, 95, 1, '', '2026-02-27 02:59:30'),
(241, 96, 1, '', '2026-02-27 03:01:21'),
(242, 97, 1, '1', '2026-02-27 03:03:52'),
(243, 98, 1, '', '2026-02-27 03:09:00'),
(244, 99, 1, '', '2026-02-27 03:12:53'),
(245, 100, 1, '', '2026-02-27 03:12:56'),
(246, 101, 1, '', '2026-02-27 03:13:57'),
(247, 102, 1, '', '2026-02-27 03:14:30'),
(248, 103, 1, '', '2026-02-27 03:15:56'),
(249, 104, 1, '1', '2026-02-27 03:19:27'),
(250, 105, 1, '1', '2026-02-27 03:34:38'),
(251, 106, 1, '1', '2026-02-27 03:36:32'),
(252, 107, 1, '1', '2026-02-27 03:42:29'),
(253, 108, 1, '1', '2026-02-27 04:44:01'),
(254, 109, 1, '1', '2026-02-27 04:46:54'),
(255, 110, 1, '1', '2026-02-27 04:46:56'),
(256, 111, 1, '1', '2026-02-27 04:47:51'),
(257, 112, 1, '1', '2026-02-27 04:49:13'),
(258, 113, 1, '1', '2026-02-27 05:01:30'),
(259, 114, 1, '1', '2026-02-27 05:03:07'),
(260, 115, 1, '1', '2026-02-27 05:03:24'),
(261, 116, 1, '1', '2026-02-27 05:08:35'),
(262, 117, 1, '1', '2026-02-27 05:11:54'),
(263, 118, 1, '1', '2026-02-27 05:12:25'),
(264, 119, 1, '1', '2026-02-27 05:12:48'),
(265, 120, 1, '1', '2026-02-27 05:15:51'),
(266, 121, 1, '1', '2026-02-27 05:19:10'),
(267, 122, 1, '1', '2026-02-27 05:22:10'),
(268, 123, 1, '1', '2026-02-27 05:24:48'),
(269, 124, 1, '1', '2026-02-27 05:25:09'),
(270, 125, 1, '1', '2026-02-27 05:25:44'),
(271, 126, 1, '1', '2026-02-27 05:28:00'),
(272, 127, 1, '1', '2026-02-27 05:28:22'),
(273, 128, 1, '1', '2026-02-27 05:36:36'),
(274, 129, 1, '1', '2026-02-27 05:37:46'),
(275, 130, 1, '1', '2026-02-27 05:39:26'),
(276, 131, 1, '1', '2026-02-27 05:41:45'),
(277, 132, 1, '1', '2026-02-27 05:44:25'),
(278, 133, 1, '1', '2026-02-27 05:46:23'),
(279, 134, 1, '1', '2026-02-27 05:48:08'),
(280, 135, 1, '1', '2026-02-27 05:48:26'),
(281, 136, 1, '1', '2026-02-27 05:54:34'),
(282, 137, 1, '1', '2026-02-27 05:58:35'),
(283, 138, 1, '1', '2026-02-27 06:07:16'),
(284, 139, 1, '1', '2026-02-27 06:08:54'),
(285, 139, 1, '1', '2026-02-27 06:08:54'),
(286, 140, 1, '1', '2026-02-27 06:09:48'),
(287, 140, 1, '1', '2026-02-27 06:09:48'),
(288, 141, 1, '1', '2026-02-27 06:15:04'),
(289, 142, 1, '1', '2026-02-27 06:16:36'),
(290, 143, 1, '1', '2026-02-27 06:16:49'),
(291, 143, 1, '1', '2026-02-27 06:16:49'),
(292, 144, 1, '1', '2026-02-27 06:18:12'),
(293, 145, 1, '1', '2026-02-27 06:18:41'),
(294, 145, 1, '1', '2026-02-27 06:18:41'),
(295, 146, 1, '1s2s', '2026-02-27 06:21:27'),
(296, 147, 1, '1s2s', '2026-02-27 06:21:58'),
(297, 148, 1, '1s2s', '2026-02-27 06:22:37'),
(298, 149, 1, '1s2s', '2026-02-27 06:23:32'),
(299, 150, 1, '1', '2026-02-27 06:24:06'),
(300, 150, 1, '1', '2026-02-27 06:24:06'),
(301, 151, 1, '1', '2026-02-27 06:24:17'),
(302, 151, 1, '1', '2026-02-27 06:24:17'),
(303, 152, 1, '1', '2026-02-27 06:42:27'),
(304, 152, 1, '1', '2026-02-27 06:42:27'),
(305, 152, 1, '1', '2026-02-27 06:42:27'),
(306, 153, 1, '', '2026-02-27 06:45:45'),
(307, 154, 1, '', '2026-02-27 06:45:49'),
(308, 155, 1, '', '2026-02-27 06:49:42'),
(309, 156, 1, '', '2026-02-27 06:53:43'),
(310, 157, 1, '', '2026-02-27 06:54:42'),
(311, 158, 1, '', '2026-02-27 06:55:30'),
(312, 159, 1, '', '2026-02-27 06:57:00'),
(313, 160, 1, '', '2026-02-27 06:58:13'),
(314, 161, 1, '', '2026-02-27 06:58:30'),
(315, 162, 1, '1', '2026-02-27 07:04:50'),
(316, 163, 1, '1', '2026-02-27 07:05:55'),
(317, 164, 1, '1', '2026-02-27 07:24:43'),
(318, 165, 1, '1', '2026-02-27 07:29:15'),
(319, 165, 1, '1', '2026-02-27 07:29:15'),
(320, 165, 1, '1', '2026-02-27 07:29:15'),
(321, 166, 1, '1', '2026-02-27 07:29:23'),
(322, 167, 1, '1', '2026-02-27 07:30:33'),
(323, 167, 1, '1', '2026-02-27 07:30:33'),
(324, 167, 1, '1', '2026-02-27 07:30:33'),
(325, 168, 1, '1', '2026-02-27 07:30:45'),
(326, 169, 1, '1', '2026-02-27 08:45:55'),
(327, 170, 1, '1', '2026-02-27 08:52:39'),
(328, 171, 1, '1', '2026-02-27 08:55:14'),
(329, 172, 1, '1', '2026-02-27 08:55:35'),
(330, 173, 1, '1', '2026-02-27 08:56:27'),
(331, 174, 1, 'LAPTOP', '2026-03-02 08:23:30'),
(332, 175, 1, 'LAPTOP', '2026-03-02 08:25:02'),
(333, 176, 1, 'ryzen', '2026-03-05 07:36:22'),
(334, 177, 1, '1', '2026-03-05 08:22:32'),
(335, 178, 1, '1', '2026-03-05 08:30:58'),
(336, 179, 1, 'LAPTOP ACER \r\nSN:NXKS9SP0024100061E4500', '2026-03-16 03:12:36'),
(337, 180, 1, 'LAPTOP ACER \r\nSN:NXKS9SP0024100061E4500 -PREPARED HINGES', '2026-03-16 03:16:05'),
(338, 181, 1, 'LAPTOP ACER \r\nSN:NXKS9SP0024100061E4500 -PREPARED HINGES', '2026-03-16 03:16:16'),
(339, 182, 1, '1', '2026-03-17 01:01:03'),
(340, 183, 1, '1', '2026-03-17 01:01:11'),
(341, 184, 1, '1', '2026-03-17 01:11:19'),
(342, 185, 1, '1', '2026-03-17 01:16:34'),
(343, 186, 1, '1', '2026-03-17 01:23:46'),
(344, 187, 1, '1', '2026-03-17 01:27:20'),
(345, 188, 1, '1', '2026-03-17 01:27:53'),
(346, 189, 1, '1', '2026-03-17 01:28:10'),
(347, 190, 1, '1', '2026-03-17 01:29:04'),
(348, 191, 1, '1', '2026-03-17 01:31:48'),
(349, 192, 1, '1', '2026-03-17 01:32:11'),
(350, 193, 1, '1', '2026-03-17 01:32:26'),
(351, 194, 1, '1', '2026-03-17 01:34:11'),
(352, 195, 1, '1', '2026-03-17 01:42:52'),
(353, 196, 1, '1', '2026-03-17 01:44:40'),
(354, 197, 1, '1', '2026-03-17 01:49:09'),
(355, 198, 1, '1', '2026-03-17 01:49:35'),
(356, 199, 1, '1', '2026-03-17 01:51:52'),
(357, 200, 2, 'SN:5CD537BTTQ\r\n-BAG\r\n-WIRE MOUSE\r\nSN:5CD5377TSJ\r\n-BAG\r\n-WIRE MOUSE', '2026-03-17 07:15:42'),
(358, 201, 1, 'SN: 5CD537BTTQ -BAG -WIREMOUSE\r\nSN: 5CD5377TSJ -BAG -WIREMOUSE\r\nSN: 5CD537BTTQ -BAG -WIREMOUSE\r\nSN: 5CD5377TSJ -BAG -WIREMOUSE\r\nSN: 5CD537BTTQ -BAG -WIREMOUSE\r\nSN: 5CD5377TSJ -BAG -WIREMOUSE\r\nSN: 5CD537BTTQ -BAG -WIREMOUSE\r\nSN: 5CD5377TSJ -BAG -WIREMOUSE\r', '2026-03-19 00:21:46'),
(359, 202, 1, 'SN: 5CD537BTTQ -BAG -WIREMOUSE\r\nSN: 5CD5377TSJ -BAG -WIREMOUSE\r\nSN: 5CD537BTTQ -BAG -WIREMOUSE\r\nSN: 5CD5377TSJ -BAG -WIREMOUSE\r\nSN: 5CD537BTTQ -BAG -WIREMOUSE\r\nSN: 5CD5377TSJ -BAG -WIREMOUSE\r\nSN: 5CD537BTTQ -BAG -WIREMOUSE\r\nSN: 5CD5377TSJ -BAG -WIREMOUSE\r', '2026-03-19 00:36:06'),
(360, 203, 1, 'SN: 5CD537BTTQ -BAG -WIREMOUSE\r\nSN: 5CD5377TSJ -BAG -WIREMOUSE\r\nSN: 5CD537BTTQ -BAG -WIREMOUSE\r\nSN: 5CD5377TSJ -BAG -WIREMOUSE\r\nSN: 5CD537BTTQ -BAG -WIREMOUSE\r\nSN: 5CD5377TSJ -BAG -WIREMOUSE\r\nSN: 5CD537BTTQ -BAG -WIREMOUSE\r\nSN: 5CD5377TSJ -BAG -WIREMOUSE\r', '2026-03-19 00:37:19'),
(361, 204, 1, 'SN: 5CD537BTTQ -BAG -WIREMOUSE SN: 5CD5377TSJ -BAG -WIREMOUSE SN: 5CD537BTTQ -BAG -\r\nWIREMOUSE SN: 5CD5377TSJ -BAG -WIREMOUSE SN: 5CD537BTTQ -BAG -WIREMOUSE SN:\r\n5CD5377TSJ -BAG -WIREMOUSE SN: 5CD537BTTQ -BAG -WIREMOUSE SN: 5CD5377TSJ -BAG -\r\nWIREMOUSE\r\nS', '2026-03-19 00:47:40'),
(362, 205, 1, 'The air in the Archive of Lost Echoes didn’t smell like old paper; it smelled like ozone and forgotten thunderstorms.\r\nElias was a \"Memory Scavenger.\" In a world where the sun had dimmed to a pale violet ember, humanity had moved underground, trading phys', '2026-03-19 01:10:01'),
(363, 206, 1, 'The air in the Archive of Lost Echoes didn’t smell like old paper; it smelled like ozone and forgotten thunderstorms.\r\nElias was a \"Memory Scavenger.\" In a world where the sun had dimmed to a pale violet ember, humanity had moved underground, trading phys', '2026-03-19 01:23:12'),
(364, 207, 1, 'The air in the Archive of Lost Echoes didn’t smell like old paper; it smelled like ozone and forgotten thunderstorms.\r\nElias was a \"Memory Scavenger.\" In a world where the sun had dimmed to a pale violet ember, humanity had moved underground, trading phys', '2026-03-19 01:36:10'),
(365, 207, 1, 'The air in the Archive of Lost Echoes didn’t smell like old paper; it smelled like ozone and forgotten thunderstorms.\r\nElias was a \"Memory Scavenger.\" In a world where the sun had dimmed to a pale violet ember, humanity had moved underground, trading phys', '2026-03-19 01:36:10'),
(366, 208, 1, 'The air in the Archive of Lost Echoes didn’t smell like old paper; it smelled like ozone and forgotten thunderstorms.\r\nElias was a \"Memory Scavenger.\" In a world where the sun had dimmed to a pale violet ember, humanity had moved underground, trading phys', '2026-03-19 01:42:37'),
(367, 208, 1, 'The air in the Archive of Lost Echoes didn’t smell like old paper; it smelled like ozone and forgotten thunderstorms.\r\nElias was a \"Memory Scavenger.\" In a world where the sun had dimmed to a pale violet ember, humanity had moved underground, trading phys', '2026-03-19 01:42:37'),
(368, 208, 1, 'The air in the Archive of Lost Echoes didn’t smell like old paper; it smelled like ozone and forgotten thunderstorms.\r\nElias was a \"Memory Scavenger.\" In a world where the sun had dimmed to a pale violet ember, humanity had moved underground, trading phys', '2026-03-19 01:42:37'),
(369, 209, 1, 'The air in the Archive of Lost Echoes didn’t smell like old paper; it smelled like ozone and forgotten thunderstorms.\r\nElias was a \"Memory Scavenger.\" In a world where the sun had dimmed to a pale violet ember, humanity had moved underground, trading phys', '2026-03-19 01:43:32'),
(370, 210, 1, 'The air in the Archive of Lost Echoes didn’t smell like old paper; it smelled like ozone and forgotten thunderstorms.\r\nElias was a \"Memory Scavenger.\" In a world where the sun had dimmed to a pale violet ember, humanity had moved underground, trading physical possessions for digital nostalgia. People didn’t own houses anymore; they owned the feeling of a warm hearth. They didn’t buy coffee; they bought the scent of a Sunday morning in 1998.\r\nElias’s job was to find the raw files—the \"Unspoken Mo', '2026-03-19 01:59:49'),
(371, 211, 1, 'The air in the Archive of Lost Echoes didn’t smell like old paper; it smelled like ozone and forgotten thunderstorms.\r\nElias was a \"Memory Scavenger.\" In a world where the sun had dimmed to a pale violet ember, humanity had moved underground, trading physical possessions for digital nostalgia. People didn’t own houses anymore; they owned the feeling of a warm hearth. They didn’t buy coffee; they bought the scent of a Sunday morning in 1998.\r\nElias’s job was to find the raw files—the \"Unspoken Mo', '2026-03-19 02:01:11'),
(372, 212, 1, 'The air in the Archive of Lost Echoes didn’t smell like old paper; it smelled like ozone and forgotten thunderstorms.\r\nElias was a \"Memory Scavenger.\" In a world where the sun had dimmed to a pale violet ember, humanity had moved underground, trading physical possessions for digital nostalgia. People didn’t own houses anymore; they owned the feeling of a warm hearth. They didn’t buy coffee; they bought the scent of a Sunday morning in 1998.\r\nElias’s job was to find the raw files—the \"Unspoken Mo', '2026-03-19 02:17:25'),
(373, 213, 1, 'The air in the Archive of Lost Echoes didn’t smell like old paper; it smelled like ozone and forgotten thunderstorms.\r\nElias was a \"Memory Scavenger.\" In a world where the sun had dimmed to a pale violet ember, humanity had moved underground, trading physical possessions for digital nostalgia. People didn’t own houses anymore; they owned the feeling of a warm hearth. They didn’t buy coffee; they bought the scent of a Sunday morning in 1998.\r\nElias’s job was to find the raw files—the \"Unspoken Mo', '2026-03-19 02:19:52'),
(374, 213, 1, 'The air in the Archive of Lost Echoes didn’t smell like old paper; it smelled like ozone and forgotten thunderstorms.\r\nElias was a \"Memory Scavenger.\" In a world where the sun had dimmed to a pale violet ember, humanity had moved underground, trading physical possessions for digital nostalgia. People didn’t own houses anymore; they owned the feeling of a warm hearth. They didn’t buy coffee; they bought the scent of a Sunday morning in 1998.\r\nElias’s job was to find the raw files—the \"Unspoken Mo', '2026-03-19 02:19:52'),
(375, 213, 1, 'The air in the Archive of Lost Echoes didn’t smell like old paper; it smelled like ozone and forgotten thunderstorms.\r\nElias was a \"Memory Scavenger.\" In a world where the sun had dimmed to a pale violet ember, humanity had moved underground, trading physical possessions for digital nostalgia. People didn’t own houses anymore; they owned the feeling of a warm hearth. They didn’t buy coffee; they bought the scent of a Sunday morning in 1998.\r\nElias’s job was to find the raw files—the \"Unspoken Mo', '2026-03-19 02:19:52'),
(376, 214, 1, 'The air in the Archive of Lost Echoes didn’t smell like old paper; it smelled like ozone and forgotten thunderstorms.\r\nElias was a \"Memory Scavenger.\" In a world where the sun had dimmed to a pale violet ember, humanity had moved underground, trading physical possessions for digital nostalgia. People didn’t own houses anymore; they owned the feeling of a warm hearth. They didn’t buy coffee; they bought the scent of a Sunday morning in 1998.\r\nElias’s job was to find the raw files—the \"Unspoken Moments\"—that hadn\'t been digitized yet.\r\nOne Tuesday, deep in the rusted bowels of Sector 4, Elias found a brass cylinder. It wasn\'t electronic. It didn\'t have a port. It was purely mechanical, etched with a name that made his heart skip: Lyra.\r\nLyra had been the last \"Natural Architect,\" a woman rumored to have built the last garden on the surface before the Great Dimming. When Elias cracked the cylinder, a holographic projection didn\'t pop out. Instead, a real, physical map unfurled, made of dr', '2026-03-19 02:20:14'),
(377, 214, 1, 'The air in the Archive of Lost Echoes didn’t smell like old paper; it smelled like ozone and forgotten thunderstorms.\r\nElias was a \"Memory Scavenger.\" In a world where the sun had dimmed to a pale violet ember, humanity had moved underground, trading physical possessions for digital nostalgia. People didn’t own houses anymore; they owned the feeling of a warm hearth. They didn’t buy coffee; they bought the scent of a Sunday morning in 1998.\r\nElias’s job was to find the raw files—the \"Unspoken Moments\"—that hadn\'t been digitized yet.\r\nOne Tuesday, deep in the rusted bowels of Sector 4, Elias found a brass cylinder. It wasn\'t electronic. It didn\'t have a port. It was purely mechanical, etched with a name that made his heart skip: Lyra.\r\nLyra had been the last \"Natural Architect,\" a woman rumored to have built the last garden on the surface before the Great Dimming. When Elias cracked the cylinder, a holographic projection didn\'t pop out. Instead, a real, physical map unfurled, made of dr', '2026-03-19 02:20:14'),
(378, 214, 1, 'The air in the Archive of Lost Echoes didn’t smell like old paper; it smelled like ozone and forgotten thunderstorms.\r\nElias was a \"Memory Scavenger.\" In a world where the sun had dimmed to a pale violet ember, humanity had moved underground, trading physical possessions for digital nostalgia. People didn’t own houses anymore; they owned the feeling of a warm hearth. They didn’t buy coffee; they bought the scent of a Sunday morning in 1998.\r\nElias’s job was to find the raw files—the \"Unspoken Moments\"—that hadn\'t been digitized yet.\r\nOne Tuesday, deep in the rusted bowels of Sector 4, Elias found a brass cylinder. It wasn\'t electronic. It didn\'t have a port. It was purely mechanical, etched with a name that made his heart skip: Lyra.\r\nLyra had been the last \"Natural Architect,\" a woman rumored to have built the last garden on the surface before the Great Dimming. When Elias cracked the cylinder, a holographic projection didn\'t pop out. Instead, a real, physical map unfurled, made of dr', '2026-03-19 02:20:14'),
(379, 215, 1, 'The air in the Archive of Lost Echoes didn’t smell like old paper; it smelled like ozone and forgotten thunderstorms.\r\nElias was a \"Memory Scavenger.\" In a world where the sun had dimmed to a pale violet ember, humanity had moved underground, trading physical possessions for digital nostalgia. People didn’t own houses anymore; they owned the feeling of a warm hearth. They didn’t buy coffee; they bought the scent of a Sunday morning in 1998.\r\nElias’s job was to find the raw files—the \"Unspoken Moments\"—that hadn\'t been digitized yet.\r\nOne Tuesday, deep in the rusted bowels of Sector 4, Elias found a brass cylinder. It wasn\'t electronic. It didn\'t have a port. It was purely mechanical, etched with a name that made his heart skip: Lyra.\r\nLyra had been the last \"Natural Architect,\" a woman rumored to have built the last garden on the surface before the Great Dimming. When Elias cracked the cylinder, a holographic projection didn\'t pop out. Instead, a real, physical map unfurled, made of dr', '2026-03-19 02:20:53'),
(380, 215, 1, 'The air in the Archive of Lost Echoes didn’t smell like old paper; it smelled like ozone and forgotten thunderstorms.\r\nElias was a \"Memory Scavenger.\" In a world where the sun had dimmed to a pale violet ember, humanity had moved underground, trading physical possessions for digital nostalgia. People didn’t own houses anymore; they owned the feeling of a warm hearth. They didn’t buy coffee; they bought the scent of a Sunday morning in 1998.\r\nElias’s job was to find the raw files—the \"Unspoken Moments\"—that hadn\'t been digitized yet.\r\nOne Tuesday, deep in the rusted bowels of Sector 4, Elias found a brass cylinder. It wasn\'t electronic. It didn\'t have a port. It was purely mechanical, etched with a name that made his heart skip: Lyra.\r\nLyra had been the last \"Natural Architect,\" a woman rumored to have built the last garden on the surface before the Great Dimming. When Elias cracked the cylinder, a holographic projection didn\'t pop out. Instead, a real, physical map unfurled, made of dr', '2026-03-19 02:20:53'),
(381, 215, 1, 'The air in the Archive of Lost Echoes didn’t smell like old paper; it smelled like ozone and forgotten thunderstorms.\r\nElias was a \"Memory Scavenger.\" In a world where the sun had dimmed to a pale violet ember, humanity had moved underground, trading physical possessions for digital nostalgia. People didn’t own houses anymore; they owned the feeling of a warm hearth. They didn’t buy coffee; they bought the scent of a Sunday morning in 1998.\r\nElias’s job was to find the raw files—the \"Unspoken Moments\"—that hadn\'t been digitized yet.\r\nOne Tuesday, deep in the rusted bowels of Sector 4, Elias found a brass cylinder. It wasn\'t electronic. It didn\'t have a port. It was purely mechanical, etched with a name that made his heart skip: Lyra.\r\nLyra had been the last \"Natural Architect,\" a woman rumored to have built the last garden on the surface before the Great Dimming. When Elias cracked the cylinder, a holographic projection didn\'t pop out. Instead, a real, physical map unfurled, made of dr', '2026-03-19 02:20:53'),
(382, 216, 1, 'The air in the Archive of Lost Echoes didn’t smell like old paper; it smelled like ozone and forgotten thunderstorms.\r\nElias was a \"Memory Scavenger.\" In a world where the sun had dimmed to a pale violet ember, humanity had moved underground, trading physical possessions for digital nostalgia. People didn’t own houses anymore; they owned the feeling of a warm hearth. They didn’t buy coffee; they bought the scent of a Sunday morning in 1998.\r\nElias’s job was to find the raw files—the \"Unspoken Moments\"—that hadn\'t been digitized yet.\r\nOne Tuesday, deep in the rusted bowels of Sector 4, Elias found a brass cylinder. It wasn\'t electronic. It didn\'t have a port. It was purely mechanical, etched with a name that made his heart skip: Lyra.\r\nLyra had been the last \"Natural Architect,\" a woman rumored to have built the last garden on the surface before the Great Dimming. When Elias cracked the cylinder, a holographic projection didn\'t pop out. Instead, a real, physical map unfurled, made of dr', '2026-03-19 02:21:17'),
(383, 216, 1, 'The air in the Archive of Lost Echoes didn’t smell like old paper; it smelled like ozone and forgotten thunderstorms.\r\nElias was a \"Memory Scavenger.\" In a world where the sun had dimmed to a pale violet ember, humanity had moved underground, trading physical possessions for digital nostalgia. People didn’t own houses anymore; they owned the feeling of a warm hearth. They didn’t buy coffee; they bought the scent of a Sunday morning in 1998.\r\nElias’s job was to find the raw files—the \"Unspoken Moments\"—that hadn\'t been digitized yet.\r\nOne Tuesday, deep in the rusted bowels of Sector 4, Elias found a brass cylinder. It wasn\'t electronic. It didn\'t have a port. It was purely mechanical, etched with a name that made his heart skip: Lyra.\r\nLyra had been the last \"Natural Architect,\" a woman rumored to have built the last garden on the surface before the Great Dimming. When Elias cracked the cylinder, a holographic projection didn\'t pop out. Instead, a real, physical map unfurled, made of dr', '2026-03-19 02:21:17'),
(384, 216, 1, 'The air in the Archive of Lost Echoes didn’t smell like old paper; it smelled like ozone and forgotten thunderstorms.\r\nElias was a \"Memory Scavenger.\" In a world where the sun had dimmed to a pale violet ember, humanity had moved underground, trading physical possessions for digital nostalgia. People didn’t own houses anymore; they owned the feeling of a warm hearth. They didn’t buy coffee; they bought the scent of a Sunday morning in 1998.\r\nElias’s job was to find the raw files—the \"Unspoken Moments\"—that hadn\'t been digitized yet.\r\nOne Tuesday, deep in the rusted bowels of Sector 4, Elias found a brass cylinder. It wasn\'t electronic. It didn\'t have a port. It was purely mechanical, etched with a name that made his heart skip: Lyra.\r\nLyra had been the last \"Natural Architect,\" a woman rumored to have built the last garden on the surface before the Great Dimming. When Elias cracked the cylinder, a holographic projection didn\'t pop out. Instead, a real, physical map unfurled, made of dr', '2026-03-19 02:21:17'),
(385, 217, 1, 'The air in the Archive of Lost Echoes didn’t smell like old paper; it smelled like ozone and forgotten thunderstorms.\r\nElias was a \"Memory Scavenger.\" In a world where the sun had dimmed to a pale violet ember, humanity had moved underground, trading physical possessions for digital nostalgia. People didn’t own houses anymore; they owned the feeling of a warm hearth. They didn’t buy coffee; they bought the scent of a Sunday morning in 1998.\r\nElias’s job was to find the raw files—the \"Unspoken Moments\"—that hadn\'t been digitized yet.\r\nOne Tuesday, deep in the rusted bowels of Sector 4, Elias found a brass cylinder. It wasn\'t electronic. It didn\'t have a port. It was purely mechanical, etched with a name that made his heart skip: Lyra.\r\nLyra had been the last \"Natural Architect,\" a woman rumored to have built the last garden on the surface before the Great Dimming. When Elias cracked the cylinder, a holographic projection didn\'t pop out. Instead, a real, physical map unfurled, made of dr', '2026-03-19 02:21:55'),
(386, 217, 1, '!@#$%^&*()_-+={}[]\\|:;\"\'<>,.?/!@#$%^&*()_-+={}[]\\|:;\"\'<>,.?/!@#$%^&*()_-+={}[]\\|:;\"\'<>,.?/', '2026-03-19 02:21:55'),
(387, 217, 1, '!@#$%^&*()_-+={}[]\\|:;\"\'<>,.?/', '2026-03-19 02:21:55'),
(388, 218, 1, '1', '2026-03-19 05:13:32'),
(389, 219, 1, 'laptop', '2026-03-23 00:45:13'),
(390, 220, 1, 'laptop', '2026-03-23 03:30:23'),
(391, 221, 1, 'laptop', '2026-03-25 04:05:59'),
(392, 222, 1, 'laptop', '2026-03-25 05:15:51'),
(393, 223, 1, 'acer', '2026-03-25 05:29:50'),
(394, 224, 9, 'lplplpl', '2026-03-25 05:54:32'),
(395, 225, 1, 'w', '2026-03-25 06:47:32'),
(396, 226, 1, 'acer', '2026-03-25 07:56:50'),
(397, 226, 2, 'asus', '2026-03-25 07:56:50'),
(398, 226, 3, 'lenovo', '2026-03-25 07:56:50'),
(399, 227, 1, 'Keys', '2026-03-30 04:57:10'),
(400, 228, 1, 'laptop', '2026-03-30 05:08:07'),
(401, 228, 1, 'cp', '2026-03-30 05:08:07'),
(402, 229, 1, 'laptop', '2026-03-30 05:10:50'),
(403, 229, 1, 'cp', '2026-03-30 05:10:50'),
(404, 230, 1, 'laptop', '2026-03-30 05:14:15'),
(405, 231, 1, 'laptop', '2026-03-30 05:33:33'),
(406, 231, 1, 'charger', '2026-03-30 05:33:33'),
(407, 231, 2, 'mouse', '2026-03-30 05:33:33'),
(408, 232, 123123, '12321312;,;d.sf.ds.f,.ds', '2026-03-31 00:07:30'),
(409, 232, 6, 'ñÑ.-,', '2026-03-31 00:07:30'),
(410, 232, 5, 'ñÑ.-,', '2026-03-31 00:07:30'),
(411, 232, 4, 'ñÑ.-,', '2026-03-31 00:07:30'),
(412, 232, 3, 'ñÑ.-,', '2026-03-31 00:07:30'),
(413, 232, 2, 'ñÑ.-,', '2026-03-31 00:07:30'),
(414, 232, 1, 'ñÑ.-,', '2026-03-31 00:07:30'),
(415, 233, 123123, '12321312;,;d.sf.ds.f,.ds', '2026-03-31 00:08:38'),
(416, 233, 6, 'ñÑ.-,', '2026-03-31 00:08:38'),
(417, 233, 5, 'ñÑ.-,', '2026-03-31 00:08:38'),
(418, 233, 4, 'ñÑ.-,', '2026-03-31 00:08:38'),
(419, 233, 3, 'ñÑ.-,', '2026-03-31 00:08:38'),
(420, 233, 2, 'ñÑ.-,', '2026-03-31 00:08:38'),
(421, 233, 1, 'ñÑ.-,', '2026-03-31 00:08:38'),
(422, 234, 1, 'LAPTOP RYZEN', '2026-03-31 01:18:28'),
(423, 234, 2, 'LAPTOP ASUS', '2026-03-31 01:18:28'),
(424, 234, 3, 'LAPTOP ACER', '2026-03-31 01:18:28'),
(425, 235, 1, 'LAPTOP RYZEN', '2026-03-31 01:19:14'),
(426, 235, 2, 'LAPTOP ASUS', '2026-03-31 01:19:14'),
(427, 235, 3, 'LAPTOP ACER', '2026-03-31 01:19:14'),
(428, 236, 1, 'laptop', '2026-03-31 02:07:28'),
(429, 236, 1, 'laptop', '2026-03-31 02:07:28'),
(430, 237, 1, 'LAPTOP RYZEN', '2026-03-31 02:07:59');

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
(14, 'manzanes.a.bsinfotech@gmail.com', 'andrei', 'Newtec Certified Inc', '090909', 'return', 'Laptop, Mouse, Keyboard', '2026-02-27', '2027-02-27', '2026-02-27 07:52:34'),
(15, 'manzanes.a.bsinfotech@gmail.com', 'A', 'TOPLIS Solutions', '11', 'borrow', '', '2026-02-27', '2026-02-27', '2026-02-27 08:51:37'),
(16, 'manzanes.a.bsinfotech@gmail.com', 'andrei', 'Newtec Certified Inc', '222', 'borrow', 'Laptop, Mouse, Keyboard', '2026-03-05', '2026-03-05', '2026-03-05 07:39:17'),
(17, 'manzanes.a.bsinfotech@gmail.com', 'andrei', 'TOPLIS Solutions', '123', 'borrow', 'Laptop, Mouse, Keyboard, Charger, Headset, Others', '2026-03-30', '2026-03-30', '2026-03-30 09:34:21'),
(18, 'manzanes.a.bsinfotech@gmail.com', 'andrei', 'TOPLIS Logistics', 'ITD-0299', 'borrow', 'Laptop, Mouse, Keyboard, Charger, Headset, MOUSE PAD', '2026-03-31', '2026-04-01', '2026-03-31 00:43:57'),
(19, 'manzanes.a.bsinfotech@gmail.com', 'andrei', 'TOPLIS Solutions', 'ITD-123', 'borrow', 'Laptop, Mouse, Keyboard, Charger, Headset, earpods', '2026-03-31', '2026-06-09', '2026-03-31 03:45:55'),
(20, 'manzanes.a.bsinfotech@gmail.com', 'andrei', 'TOPLIS Logistics', 'ITD-000', 'return', 'Laptop, Mouse, Keyboard, Charger, Headset, MONITOR', '2026-03-31', '2026-03-31', '2026-03-31 05:46:57'),
(21, 'manzanes.a.bsinfotech@gmail.com', 'andrei', 'TOPLIS Solutions', 'ITD-001', 'borrow', 'Laptop (1), Mouse (4), Keyboard (2), Charger (5), Headset (3), MONITOR (6)', '0000-00-00', '0000-00-00', '2026-03-31 06:30:34');

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
(1, 90, 'prepared', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/prepared_90.png', '2026-02-27 02:43:35'),
(2, 90, 'checked', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/checked_90.png', '2026-02-27 02:43:35'),
(3, 90, 'approved', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/approved_90.png', '2026-02-27 02:43:35'),
(4, 90, 'received', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/received_90.png', '2026-02-27 02:43:35'),
(5, 91, 'prepared', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/prepared_91.png', '2026-02-27 02:45:52'),
(6, 91, 'checked', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/checked_91.png', '2026-02-27 02:45:52'),
(7, 91, 'approved', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/approved_91.png', '2026-02-27 02:45:52'),
(8, 91, 'received', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/received_91.png', '2026-02-27 02:45:52'),
(9, 92, 'prepared', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/prepared_92.png', '2026-02-27 02:46:46'),
(10, 92, 'checked', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/checked_92.png', '2026-02-27 02:46:46'),
(11, 92, 'approved', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/approved_92.png', '2026-02-27 02:46:46'),
(12, 92, 'received', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/received_92.png', '2026-02-27 02:46:46'),
(13, 93, 'prepared', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/prepared_93.png', '2026-02-27 02:51:44'),
(14, 93, 'checked', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/checked_93.png', '2026-02-27 02:51:44'),
(15, 93, 'approved', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/approved_93.png', '2026-02-27 02:51:44'),
(16, 93, 'received', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/received_93.png', '2026-02-27 02:51:44'),
(17, 94, 'prepared', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/prepared_94.png', '2026-02-27 02:56:28'),
(18, 94, 'checked', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/checked_94.png', '2026-02-27 02:56:28'),
(19, 94, 'approved', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/approved_94.png', '2026-02-27 02:56:28'),
(20, 94, 'received', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/received_94.png', '2026-02-27 02:56:28'),
(21, 95, 'prepared', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/prepared_95.png', '2026-02-27 02:59:30'),
(22, 95, 'checked', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/checked_95.png', '2026-02-27 02:59:30'),
(23, 95, 'approved', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/approved_95.png', '2026-02-27 02:59:30'),
(24, 95, 'received', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/received_95.png', '2026-02-27 02:59:30'),
(25, 96, 'prepared', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/prepared_96.png', '2026-02-27 03:01:21'),
(26, 96, 'checked', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/checked_96.png', '2026-02-27 03:01:21'),
(27, 96, 'approved', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/approved_96.png', '2026-02-27 03:01:21'),
(28, 96, 'received', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/received_96.png', '2026-02-27 03:01:21'),
(29, 98, 'prepared', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/prepared_98.png', '2026-02-27 03:09:00'),
(30, 98, 'checked', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/checked_98.png', '2026-02-27 03:09:00'),
(31, 98, 'approved', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/approved_98.png', '2026-02-27 03:09:00'),
(32, 98, 'received', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/received_98.png', '2026-02-27 03:09:00'),
(33, 99, 'prepared', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/prepared_99.png', '2026-02-27 03:12:53'),
(34, 99, 'checked', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/checked_99.png', '2026-02-27 03:12:53'),
(35, 99, 'approved', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/approved_99.png', '2026-02-27 03:12:53'),
(36, 99, 'received', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/received_99.png', '2026-02-27 03:12:53'),
(37, 100, 'prepared', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/prepared_100.png', '2026-02-27 03:12:56'),
(38, 100, 'checked', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/checked_100.png', '2026-02-27 03:12:56'),
(39, 100, 'approved', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/approved_100.png', '2026-02-27 03:12:56'),
(40, 100, 'received', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/received_100.png', '2026-02-27 03:12:56'),
(41, 101, 'prepared', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/prepared_101.png', '2026-02-27 03:13:57'),
(42, 101, 'checked', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/checked_101.png', '2026-02-27 03:13:57'),
(43, 101, 'approved', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/approved_101.png', '2026-02-27 03:13:57'),
(44, 101, 'received', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/received_101.png', '2026-02-27 03:13:57'),
(45, 102, 'prepared', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/prepared_102.png', '2026-02-27 03:14:30'),
(46, 102, 'checked', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/checked_102.png', '2026-02-27 03:14:30'),
(47, 102, 'approved', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/approved_102.png', '2026-02-27 03:14:30'),
(48, 102, 'received', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/received_102.png', '2026-02-27 03:14:30'),
(49, 103, 'prepared', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/prepared_103.png', '2026-02-27 03:15:56'),
(50, 103, 'checked', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/checked_103.png', '2026-02-27 03:15:56'),
(51, 103, 'approved', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/approved_103.png', '2026-02-27 03:15:56'),
(52, 103, 'received', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/received_103.png', '2026-02-27 03:15:56'),
(53, 153, 'prepared', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/prepared_153.png', '2026-02-27 06:45:45'),
(54, 153, 'checked', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/checked_153.png', '2026-02-27 06:45:45'),
(55, 153, 'approved', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/approved_153.png', '2026-02-27 06:45:45'),
(56, 153, 'received', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/received_153.png', '2026-02-27 06:45:45'),
(57, 154, 'prepared', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/prepared_154.png', '2026-02-27 06:45:49'),
(58, 154, 'checked', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/checked_154.png', '2026-02-27 06:45:49'),
(59, 154, 'approved', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/approved_154.png', '2026-02-27 06:45:49'),
(60, 154, 'received', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/received_154.png', '2026-02-27 06:45:49'),
(61, 155, 'prepared', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/prepared_155.png', '2026-02-27 06:49:42'),
(62, 155, 'checked', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/checked_155.png', '2026-02-27 06:49:42'),
(63, 155, 'approved', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/approved_155.png', '2026-02-27 06:49:42'),
(64, 155, 'received', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/received_155.png', '2026-02-27 06:49:42'),
(65, 156, 'checked', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/checked_156.png', '2026-02-27 06:53:43'),
(66, 156, 'approved', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/approved_156.png', '2026-02-27 06:53:43'),
(67, 156, 'received', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/received_156.png', '2026-02-27 06:53:43'),
(68, 157, 'checked', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/checked_157.png', '2026-02-27 06:54:42'),
(69, 157, 'approved', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/approved_157.png', '2026-02-27 06:54:42'),
(70, 157, 'received', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/received_157.png', '2026-02-27 06:54:42'),
(71, 158, 'checked', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/checked_158.png', '2026-02-27 06:55:30'),
(72, 158, 'approved', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/approved_158.png', '2026-02-27 06:55:30'),
(73, 158, 'received', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/received_158.png', '2026-02-27 06:55:30'),
(74, 159, 'checked', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/checked_159.png', '2026-02-27 06:57:00'),
(75, 159, 'approved', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/approved_159.png', '2026-02-27 06:57:00'),
(76, 159, 'received', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/received_159.png', '2026-02-27 06:57:00'),
(77, 160, 'checked', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/checked_160.png', '2026-02-27 06:58:13'),
(78, 160, 'approved', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/approved_160.png', '2026-02-27 06:58:13'),
(79, 160, 'received', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/received_160.png', '2026-02-27 06:58:13'),
(80, 161, 'checked', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/checked_161.png', '2026-02-27 06:58:30'),
(81, 161, 'approved', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/approved_161.png', '2026-02-27 06:58:30'),
(82, 161, 'received', 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass/signatures/received_161.png', '2026-02-27 06:58:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `employee_id`, `password`) VALUES
(11, 'OJT100', '$2y$10$E6z9aFn0g3iLvLqoykd/Yu5ADKwvvQFdELMzHwqjm5Y3S0CVl8V9.'),
(12, 'LG28911', '$2y$10$GaLFvx9xJXJ23PHaAJ1iH.VnE2iip.YdvaEmkT17Dofuk648cO4Tq'),
(13, 'ojt200', '$2y$10$Mdrdr9uf2gPPzr.NcINIB.98dYyEmoMep7lM4I8ovMqcL9VXdlZVa'),
(14, 'ojt300', '$2y$10$T2xkb0AZ76aIN8stxS1o8evcpKJv0ud7QtAUfiKbinExKRV/tewAm'),
(15, 'OJT101', '$2y$10$TBVSSKrZmQagLSrEyCJ4JuVS4xnsJ1BEPtJvS.QzxeW9vIN1rPRP.');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `youtube_link` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `youtube_link`, `category`, `created_at`) VALUES
(1, 'How to Install Windows 11', 'https://www.youtube.com/embed/xDHLM-FnwJQ', 'Software', '2026-03-03 20:05:53'),
(2, 'How To Upload Project On GitHub ', 'https://www.youtube.com/embed/w3_RCT0O1oM', 'Software', '2026-03-03 20:29:03'),
(4, 'Python Full Course for Beginners', 'https://www.youtube.com/embed/K5KVEU3aaeQ', 'Software', '2026-03-03 21:49:41'),
(6, 'HTML Tutorial for Beginners: HTML Crash Course', 'https://www.youtube.com/embed/qz0aGYrrlhU', 'Software', '2026-03-03 21:54:17'),
(7, 'How To Diagnose A Motherboard - Basic Troubleshooting', 'https://www.youtube.com/embed/p6BJvS3nrb0', 'Hardware', '2026-03-03 22:16:30'),
(9, 'How To Repair a Computer Power Supply', 'https://www.youtube.com/embed/HcYFbCqM61g', 'Hardware', '2026-03-03 22:18:57'),
(10, 'Disassemble and Assemble Computer Hardware Full Tutorial (COC1)', 'https://www.youtube.com/embed/_AXlEyiEJNI', 'Hardware', '2026-03-03 22:27:32'),
(12, 'PARTS AND FUNCTION OF A MOTHERBOARD! DETAILED EXPLANATION', 'https://www.youtube.com/embed/KXc8JaIOx-E', 'Hardware', '2026-03-03 22:29:10'),
(15, 'Build a network with me for free using Cisco Packet Tracer (FREE CCNA 200-301 Course 2025)', 'https://www.youtube.com/embed/jW5GhNhBReA', 'Network', '2026-03-03 22:33:26'),
(16, 'Basic network Configuration tutorial | Cisco packet tracer | Step by Step | Simple PDU', 'https://www.youtube.com/embed/1KPyAQNhztM', 'Network', '2026-03-03 22:33:58'),
(17, 'Troubleshooting the most common Printer issues | Real World IT Tickets ', 'https://www.youtube.com/embed/B02YvWsKHAE', 'Network', '2026-03-03 22:37:09'),
(19, 'How to Set up a Cisco Switch in 15 MINUTES | CCNA Basics', 'https://www.youtube.com/embed/4FYeIGM_1hc', 'Network', '2026-03-03 22:46:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `equipment_forms`
--
ALTER TABLE `equipment_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `equipment_items`
--
ALTER TABLE `equipment_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=431;

--
-- AUTO_INCREMENT for table `it_equipment_logs`
--
ALTER TABLE `it_equipment_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `signatures`
--
ALTER TABLE `signatures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
