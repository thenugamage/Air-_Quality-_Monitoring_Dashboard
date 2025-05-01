-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2025 at 02:31 PM
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
-- Database: `aqi_colombo`
--

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

CREATE TABLE `alerts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `sensor_id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(255) NOT NULL,
  `status` enum('active','resolved') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alerts`
--

INSERT INTO `alerts` (`id`, `title`, `sensor_id`, `location`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Unhealthy Air Quality Detected', 1, 'Colombo Central', 'active', '2025-05-01 11:44:48', '2025-05-01 11:44:48'),
(7, 'Very Unhealthy Air Quality Detected', 1, 'East Side', 'active', '2025-05-01 11:44:48', '2025-05-01 11:44:48'),
(8, 'Hazardous Air Quality Detected', 1, 'Galle Road', 'active', '2025-05-01 11:44:48', '2025-05-01 11:44:48'),
(9, 'Moderate Air Quality Detected', 1, 'Malabe', 'active', '2025-05-01 11:44:48', '2025-05-01 11:44:48'),
(10, 'Unhealthy for Sensitive Groups Detected', 1, 'Kandy City', 'active', '2025-05-01 11:44:48', '2025-05-01 11:44:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_05_01_082042_create_sensors_table', 1),
(2, '2025_05_01_082051_create_sensor_data_table', 1),
(3, '2025_05_01_103727_create_users_table', 2),
(4, '2025_05_01_111411_add_active_to_sensors_table', 3),
(5, '2025_05_01_112213_create_alerts_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `sensors`
--

CREATE TABLE `sensors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `lan` varchar(255) NOT NULL,
  `lon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sensors`
--

INSERT INTO `sensors` (`id`, `location`, `active`, `lan`, `lon`, `created_at`, `updated_at`) VALUES
(1, 'Colombos', 0, '6.8444', '80.0028', '2025-05-01 08:44:42', '2025-05-01 04:24:38');

-- --------------------------------------------------------

--
-- Table structure for table `sensor_data`
--

CREATE TABLE `sensor_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sensor_id` bigint(20) UNSIGNED NOT NULL,
  `timestamp` datetime NOT NULL,
  `aqi` int(11) DEFAULT NULL,
  `pm25` double DEFAULT NULL,
  `pm10` double DEFAULT NULL,
  `no2` double DEFAULT NULL,
  `so2` double DEFAULT NULL,
  `co` double DEFAULT NULL,
  `ozone` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sensor_data`
--

INSERT INTO `sensor_data` (`id`, `sensor_id`, `timestamp`, `aqi`, `pm25`, `pm10`, `no2`, `so2`, `co`, `ozone`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-05-01 14:05:21', 120, 35.5, 60.2, 18.3, 4.5, 0.9, 22.1, '2025-05-01 08:40:21', '2025-05-01 08:40:21'),
(2, 1, '2025-05-01 14:06:21', 65, 45.2, 75.8, 22.7, 6.1, 1.1, 26.3, '2025-05-01 08:40:21', '2025-05-01 08:40:21'),
(3, 1, '2025-05-01 14:07:21', 70, 50, 80.1, 24.9, 7, 1.4, 29.2, '2025-05-01 08:40:21', '2025-05-01 08:40:21'),
(4, 1, '2025-05-01 14:08:21', 55, 38.6, 62, 19.1, 5, 1, 23.8, '2025-05-01 08:40:21', '2025-05-01 08:40:21'),
(5, 1, '2025-05-01 14:09:21', 60, 41.9, 68.4, 20.5, 5.6, 1.2, 25, '2025-05-01 08:40:21', '2025-05-01 08:40:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `last_login` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `last_login`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '23233', 'dularapramod88@gmail.com', '$2y$12$vYPIrM31plw5VbhYTr3S9.13X9URKnGWcV3IKuBm65kXQ9hNUIU6W', 'admin', NULL, NULL, '2025-05-01 05:26:48', '2025-05-01 05:28:35'),
(2, 'test', 'test@gmail.com', '$2y$12$SrWSdSvzOw4qrwVFKhMDae2lbT5qm/fgUBe94wlgarNRgKF/XpKZm', 'admin', NULL, NULL, '2025-05-01 06:36:30', '2025-05-01 06:36:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alerts_sensor_id_foreign` (`sensor_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sensors`
--
ALTER TABLE `sensors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sensor_data`
--
ALTER TABLE `sensor_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sensor_data_sensor_id_foreign` (`sensor_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alerts`
--
ALTER TABLE `alerts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sensors`
--
ALTER TABLE `sensors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sensor_data`
--
ALTER TABLE `sensor_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alerts`
--
ALTER TABLE `alerts`
  ADD CONSTRAINT `alerts_sensor_id_foreign` FOREIGN KEY (`sensor_id`) REFERENCES `sensors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sensor_data`
--
ALTER TABLE `sensor_data`
  ADD CONSTRAINT `sensor_data_sensor_id_foreign` FOREIGN KEY (`sensor_id`) REFERENCES `sensors` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
