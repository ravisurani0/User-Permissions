-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2023 at 08:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_permissions`
--

-- --------------------------------------------------------

--
-- Table structure for table `permission_tables`
--

CREATE TABLE `permission_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_tables`
--

INSERT INTO `permission_tables` (`id`, `name`, `key`, `created_at`, `updated_at`) VALUES
(1, 'Products', 'products', NULL, NULL),
(2, 'Stores', 'stores', NULL, NULL),
(3, 'User', 'user', NULL, NULL),
(4, 'Employee', 'employee', NULL, NULL),
(5, 'Permission Table', 'permission-table', NULL, NULL),
(6, 'User Permeations', 'user-permeations', NULL, NULL),
(8, 'Role Permeations', 'role-permeations', '2023-11-30 13:22:44', '2023-11-30 13:22:44'),
(9, 'Roles', 'roles', '2023-11-30 13:26:11', '2023-11-30 13:30:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `permission_tables`
--
ALTER TABLE `permission_tables`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permission_tables`
--
ALTER TABLE `permission_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
