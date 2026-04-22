-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2026 at 10:51 AM
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
(113, 103, 1, 'test', '2026-04-04 09:08:20'),
(119, 109, 1, 'Dell OptiPlex 7060\r\nCore I5\r\nfor setup by vendor Deltech\r\nCPU - only Via Lalamove\r\nDP/N: TF1V2 A00', '2026-04-13 04:06:25'),
(121, 111, 1, 'Asus Laptop SN:MCN0CV11F348509 Asset Tag: LGI-00467', '2026-04-13 04:46:22'),
(122, 111, 1, 'Laptop Bag', '2026-04-13 04:46:22'),
(123, 111, 1, 'Laptop Charger', '2026-04-13 04:46:22'),
(124, 111, 1, 'HDD 500GB for Sir Jon', '2026-04-13 04:46:22'),
(125, 112, 1, 'AOC 21.5 inch Monitor SN: 230RAHA005307', '2026-04-13 04:54:54'),
(126, 112, 1, 'CPU GMKTec	G3 Pro AMD Ryzen 7 SN: G3R26060502', '2026-04-13 04:54:54'),
(127, 112, 1, 'Wireless Keyboard', '2026-04-13 04:54:54'),
(128, 112, 1, 'Wireless Mouse', '2026-04-13 04:54:54'),
(129, 112, 1, 'UPS SECURE 650VA SN: 310026736G35082300430', '2026-04-13 04:54:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipment_items`
--
ALTER TABLE `equipment_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_id` (`form_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipment_items`
--
ALTER TABLE `equipment_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `equipment_items`
--
ALTER TABLE `equipment_items`
  ADD CONSTRAINT `equipment_items_ibfk_1` FOREIGN KEY (`form_id`) REFERENCES `equipment_forms` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
