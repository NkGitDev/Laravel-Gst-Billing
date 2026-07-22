-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2026 at 03:33 PM
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
-- Database: `gst_billing`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('rahul1820@gmail.com|127.0.0.1', 'i:4;', 1754938304),
('rahul1820@gmail.com|127.0.0.1:timer', 'i:1754938304;', 1754938304);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gst_bills`
--

CREATE TABLE `gst_bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `party_id` int(11) DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `item_description` text DEFAULT NULL,
  `total_amount` float DEFAULT NULL,
  `cgst_rate` float DEFAULT NULL,
  `sgst_rate` float DEFAULT NULL,
  `igst_rate` float DEFAULT NULL,
  `cgst_amount` float DEFAULT NULL,
  `sgst_amount` float DEFAULT NULL,
  `igst_amount` float DEFAULT NULL,
  `tax_amount` float DEFAULT NULL,
  `net_amount` float DEFAULT NULL,
  `declaration` text DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gst_bills`
--

INSERT INTO `gst_bills` (`id`, `party_id`, `invoice_date`, `invoice_number`, `item_description`, `total_amount`, `cgst_rate`, `sgst_rate`, `igst_rate`, `cgst_amount`, `sgst_amount`, `igst_amount`, `tax_amount`, `net_amount`, `declaration`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-04-02', '1201', 'computer', 86000, 2, 4, 4, 1720, 3440, 3440, 8600, 94600, 'this is hardware materials', 0, '2025-04-09 13:24:59', '2025-04-19 14:53:14'),
(2, 3, '2025-04-15', '1202', 'computer', 98500, 2, 4, 4, 1970, 3940, 3940, 9850, 108350, 'this is hardware materials', 1, '2025-04-11 13:27:05', '2025-04-19 14:51:45'),
(4, 15, '2025-04-16', '1203', 'Computer Assecciories', 56000, 3, 3, 4, 1680, 1680, 2240, 5600, 61600, 'this is hardware materials', 0, '2025-04-14 12:59:05', '2025-04-18 13:27:32'),
(5, 13, '2025-04-20', '1204', 'Scanner', 75500, 2, 5, 3, 1510, 3775, 2265, 7550, 83050, 'this is hardware materials', 0, '2025-04-14 13:02:11', '2025-04-23 01:39:00'),
(6, 11, '2025-04-20', '1207', 'Paper', 1500, 2, 4, 2, 30, 60, 30, 120, 1620, 'this is stationary materials', 0, '2025-04-15 12:10:03', '2025-04-19 14:48:41'),
(7, 20, '2025-07-04', '123', 'Hardware', 12500, 5, 5, 10, 625, 625, 1250, 2500, 15000, 'this is hardware materials', 0, '2025-07-08 13:28:17', '2025-07-08 13:28:17'),
(8, 24, '2025-08-13', '1100', 'computer', 76000, 2, 3, 4, 1520, 2280, 3040, 6840, 82840, 'this is hardware materials', 0, '2025-08-11 13:55:06', '2025-08-11 13:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_22_173839_create_parties_table', 1),
(5, '2025_02_25_094150_create_gst_bills_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parties`
--

CREATE TABLE `parties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `party_type` enum('vendor','client','employee') DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `mobile_number` varchar(10) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `account_holder_name` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `ifsc_code` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `branch_name` varchar(255) DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parties`
--

INSERT INTO `parties` (`id`, `user_id`, `party_type`, `full_name`, `mobile_number`, `address`, `account_holder_name`, `account_number`, `bank_name`, `ifsc_code`, `zip_code`, `state`, `branch_name`, `is_deleted`, `created_at`, `updated_at`) VALUES
(20, 3, 'client', 'Rohan', '9879879879', 'nandishwar colony', 'Rohan', '123123123', 'Union Bank', 'UNI1234546', '456000', 'Uttar Pradesh', 'UP Branch', 0, '2025-07-08 13:27:02', '2025-07-08 13:27:02'),
(21, 3, 'client', 'Jay', '7878787878', 'vikash nagar', 'Jay', '121245451212', 'UCO Bank', 'UCB12345464', '451200', 'Rajasthan', 'Rajasthan Branch', 1, '2025-07-08 14:09:18', '2025-07-08 14:12:23'),
(22, 3, 'client', 'Jay', '7878787878', 'vikash nagar', 'Jay', '121245451212', 'UCO Bank', 'UCB12345464', '451200', 'Rajasthan', 'Rajasthan Branch', 1, '2025-07-08 14:10:52', '2025-07-08 14:12:18'),
(23, 3, 'client', 'vikash', '7575757575', 'ajad nagar colony', 'vikash', '121223456', 'Fino Bank', 'FNO001122', '4561200', 'Uttar Pradesh', 'UP Branch', 0, '2025-07-08 14:13:11', '2025-07-08 14:13:11'),
(24, 3, 'client', 'Karan', '7878454545', 'Vinod kunj', 'Karan', '1212232323', 'Bank of baroda', 'BOB1234564', '451212', 'Uttar Pradesh', 'UP Branch', 0, '2025-07-08 14:50:26', '2025-07-08 14:50:26'),
(25, 4, 'client', 'Mohit jain', '7788774455', 'main market', 'Mohit jain', '112233112233', 'Union Bank', 'UNI1234546', '441100', 'Indore', 'Indore Branch', 1, '2025-08-11 13:46:10', '2025-08-11 13:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('GWkYLt8ayJcATC1ZaQVbZm4nxPSzRVWghucvUlaN', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTzRzYktVaTg4ek9DYWNLYVU2dEtCQ2Q1bEV3Y0ZDdkV3NDA4ak9yNiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9qcy9hcHAuanMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc1NDk0MDI2ODt9fQ==', 1754940308),
('LLTQTFzg1wK96YWXtjlLjplJNUqFiLemFqSihXGN', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicW9oOEt3YzdmMU9zNThvUHJYU1RzN0VrNzhZVUdJa29VaWNSdXVUUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9qcy9hcHAuanMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc1NTEwNjY1NDt9fQ==', 1755110816),
('Xg3xxzBNyq2FzAQeHftUiZsZWv09A3OEnX08xRLK', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR1J1aE5rZVVZRXVsYmM3THRmcTVWRnVqbVlTMlV5SEN5a0xTMHRkUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9qcy9hcHAuanMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1754938355);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `email_verified_at`, `password`, `mobile_number`, `gender`, `address`, `state`, `country`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'First Admin', NULL, 'firstadmin@test.com', NULL, '$2y$12$Md8rtdxoSeHHM0BbEQk3buKh9NH4d4FTv6dYEmDl5mZdLls237YtC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-08 13:25:49', '2025-07-08 13:25:49'),
(4, 'Ram', NULL, 'ram1280@gmail.com', NULL, '$2y$12$KuzVnP5pnhVZtG0en5kg/.2ldTTPhcIZYgQ98apwvT99vP7EOMYje', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 13:45:11', '2025-08-11 13:45:11');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_invoices`
--

CREATE TABLE `vendor_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `party_id` int(11) DEFAULT NULL,
  `account_holder_name` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `invoice_number` varchar(255) DEFAULT NULL,
  `item_description` mediumtext DEFAULT NULL,
  `total_amount` float NOT NULL DEFAULT 0,
  `declaration` text DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `ifsc_code` varchar(255) DEFAULT NULL,
  `branch_name` text DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_invoices`
--

INSERT INTO `vendor_invoices` (`id`, `party_id`, `account_holder_name`, `account_number`, `invoice_date`, `invoice_number`, `item_description`, `total_amount`, `declaration`, `bank_name`, `ifsc_code`, `branch_name`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 5, 'Rajesh', '222244445555', '2025-04-09', '1301', 'computer materials', 54200, 'no need sign', 'Au Bank', 'AU445512', 'Bhopal Branch', 0, '2025-04-09 14:00:35', '2025-04-19 14:36:58'),
(2, 6, 'Atharva', '225544557788', '2025-04-05', '1302', 'Scanner materials', 96000, 'no need sign', 'Union Bank', 'UNI1234546', 'Delhi branch', 0, '2025-04-11 12:22:25', '2025-04-19 14:36:18'),
(3, 7, 'Yashraj', '221155446655', '2025-04-12', '1304', 'computer materials', 75800, 'no need sign', 'Union Bank', 'UNI1234546', 'Delhi branch', 0, '2025-04-11 12:28:51', '2025-04-19 14:53:03'),
(4, 8, 'Hemant', '225544665588', '2025-04-14', '1305', 'Scanner materials', 55600, 'no need sign', 'Axis bank', 'AXI1234564', 'MP Branch', 1, '2025-04-11 12:35:06', '2025-04-19 14:37:39'),
(5, 9, 'Romit', '225544665588', '2025-04-15', '1306', 'keyoard materials', 13000, 'no need sign', 'Fino Bank', 'FNO001122', 'MH Branch', 1, '2025-04-11 12:36:55', '2025-04-19 14:38:36'),
(6, 10, 'Prithvi', '225544887755', '2025-04-18', '1307', 'electric materials', 65000, 'no need sign', 'UCO Bank', 'UCB12345464', 'MP Branch', 0, '2025-04-11 12:38:28', '2025-04-19 14:38:29'),
(7, 19, 'Jagdish', '222244445555', '2025-04-23', '1309', 'Sound items', 63200, 'no need sign', 'Union Bank', 'UNI1234546', 'Rajasthan Branch', 0, '2025-04-23 12:27:51', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gst_bills`
--
ALTER TABLE `gst_bills`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gst_bills_invoice_number_unique` (`invoice_number`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parties`
--
ALTER TABLE `parties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parties_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendor_invoices`
--
ALTER TABLE `vendor_invoices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gst_bills`
--
ALTER TABLE `gst_bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `parties`
--
ALTER TABLE `parties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendor_invoices`
--
ALTER TABLE `vendor_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `parties`
--
ALTER TABLE `parties`
  ADD CONSTRAINT `parties_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
