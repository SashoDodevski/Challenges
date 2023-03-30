-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2023 at 01:49 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `challenge_27-laravel-vehicles_registrations`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_25_085748_create_vehicles_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'api_key', 'd3ff72c4c62d3bc67bc33d57b759e698866e4e10c35a3663266be3303bd50a08', '[\"*\"]', '2023-03-25 17:21:36', NULL, '2023-03-25 17:20:12', '2023-03-25 17:21:36'),
(2, 'App\\Models\\User', 3, 'api_key', 'db4f7ebaee0433d67810e0cf0dec122c09bc63e13f1c06ae7be1c5cfb31a90b9', '[\"*\"]', '2023-03-25 17:41:32', NULL, '2023-03-25 17:22:33', '2023-03-25 17:41:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'John', 'john@doe.com', NULL, '$2y$10$Pk3V8K75uovF7QRt/VZmb.OTOkMS1PpU1pUDxmprV7/SDkz5gLHk2', NULL, '2023-03-25 12:54:47', '2023-03-25 12:54:47'),
(3, 'Jane', 'jane@doe.com', NULL, '$2y$10$6djq2Q/SgmuOpu44wKIMxONv.sVuonhvEPo3eaARiPCqs189DU5eK', NULL, '2023-03-25 17:22:22', '2023-03-25 17:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plate_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insurance_date` date NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `brand`, `model`, `plate_number`, `insurance_date`, `deleted_at`, `created_at`, `updated_at`) VALUES
(14, 'Datsun', '306', 'ZGD-097', '2022-12-15', NULL, '2023-03-25 18:36:45', '2023-03-26 10:49:23'),
(15, 'Adler', 'FQ', 'LNZ-761', '2022-10-03', NULL, '2023-03-25 18:36:45', '2023-03-25 18:36:45'),
(16, 'Lamborghini', 'MP4', 'BWW-439', '2023-01-05', NULL, '2023-03-25 18:36:45', '2023-03-25 18:36:45'),
(17, 'Smart', 'Esteem', 'USO-722', '2022-05-13', NULL, '2023-03-25 18:36:45', '2023-03-25 18:36:45'),
(19, 'FUQI', 'H3X', 'WOB-373', '2022-09-12', NULL, '2023-03-25 18:36:45', '2023-03-25 18:36:45'),
(20, 'Hyundai', 'Tracker', 'ECC-121', '2022-07-25', NULL, '2023-03-25 18:36:45', '2023-03-25 18:36:45'),
(21, 'Ram', 'S7', 'PUP-335', '2022-09-20', NULL, '2023-03-25 18:36:45', '2023-03-25 18:36:45'),
(22, 'Fornasari', 'Golden Spirit', 'MNC-007', '2023-01-02', NULL, '2023-03-25 18:36:46', '2023-03-25 18:36:46'),
(24, 'Pininfarina', 'Beast', 'DTP-695', '2022-12-04', NULL, '2023-03-25 18:36:46', '2023-03-25 18:36:46'),
(26, 'Volkswagen', '6', 'JLJ-122', '2023-01-23', NULL, '2023-03-25 18:36:46', '2023-03-25 18:36:46'),
(29, 'De Lorean', 'DMC', 'APJ-638', '2023-01-01', NULL, '2023-03-25 18:36:46', '2023-03-25 18:36:46'),
(30, 'Fisker', 'Baby', 'SUZ-052', '2022-09-27', NULL, '2023-03-25 18:36:46', '2023-03-25 18:36:46'),
(32, 'Brand', 'Model 1', 'REG-111', '2023-03-25', NULL, '2023-03-25 20:19:53', '2023-03-25 20:19:53'),
(37, 'Aixam', 'Favorit', 'JSI-837', '2022-06-03', NULL, '2023-03-26 11:32:50', '2023-03-26 11:32:50'),
(39, 'Nissan', 'Metro', 'FPE-350', '2022-04-30', NULL, '2023-03-26 11:32:50', '2023-03-26 11:32:50'),
(40, 'Soyat', 'Mohave', 'VTV-984', '2022-12-10', NULL, '2023-03-26 11:32:50', '2023-03-26 11:32:50'),
(41, 'Maruti', 'Talon', 'LWS-635', '2022-04-30', NULL, '2023-03-26 11:32:50', '2023-03-26 11:32:50'),
(42, 'Lancia', 'Maestro', 'XCR-194', '2022-10-27', NULL, '2023-03-26 11:32:50', '2023-03-26 11:32:50'),
(43, 'Miles', 'Baby', 'MDA-169', '2022-08-10', NULL, '2023-03-26 11:32:50', '2023-03-26 11:32:50'),
(44, 'Dr. Motor', '6371 груз.', 'ETM-888', '2022-11-21', NULL, '2023-03-26 11:32:50', '2023-03-26 11:32:50'),
(45, 'MINI', 'TX', 'ANO-272', '2022-09-30', NULL, '2023-03-26 11:32:51', '2023-03-26 11:32:51'),
(47, 'Rezvani', 'Datsun', 'EBA-551', '2022-11-14', NULL, '2023-03-26 11:32:51', '2023-03-26 11:32:51'),
(48, 'Triumph', 'Black Max', 'AFC-344', '2023-01-01', NULL, '2023-03-26 11:32:51', '2023-03-26 11:32:51'),
(49, 'Maybach', 'PS 160', 'ZXK-368', '2022-09-24', NULL, '2023-03-26 11:32:51', '2023-03-26 11:32:51'),
(50, 'Norster', 'Eunos Cosmo', 'MZE-174', '2022-05-29', NULL, '2023-03-26 11:32:51', '2023-03-26 11:32:51'),
(54, 'Fiat-Abarth', 'CCXR Trevita', 'SHA-894', '2022-05-03', NULL, '2023-03-26 11:32:51', '2023-03-26 11:32:51'),
(56, 'FAW', 'Matrix', 'VOP-879', '2023-01-18', NULL, '2023-03-26 11:32:52', '2023-03-26 11:32:52'),
(57, 'Smart', 'City', 'EWF-665', '2022-05-13', NULL, '2023-03-26 11:32:52', '2023-03-26 11:32:52'),
(59, 'Saipa', 'Vandura пасс.', 'MZU-838', '2022-07-03', NULL, '2023-03-26 11:32:52', '2023-03-26 11:32:52'),
(63, 'Kia', 'Daily пасс.', 'IPZ-501', '2022-10-03', NULL, '2023-03-26 11:32:52', '2023-03-26 11:32:52'),
(64, 'SouEast', 'Karma', 'MDX-217', '2022-09-16', NULL, '2023-03-26 11:32:52', '2023-03-26 11:32:52'),
(65, 'Daewoo', 'DMC', 'MIM-610', '2022-11-13', NULL, '2023-03-26 11:35:05', '2023-03-26 11:35:05'),
(66, 'Dagger', 'PS 160', 'LUP-918', '2023-01-09', NULL, '2023-03-26 11:35:05', '2023-03-26 11:35:05'),
(67, 'Hafei', 'xD', 'IDD-867', '2022-11-04', NULL, '2023-03-26 11:35:05', '2023-03-26 11:35:05'),
(68, 'Oltcit', 'GTA', 'ADD-870', '2022-04-03', NULL, '2023-03-26 11:35:05', '2023-03-26 11:35:05'),
(69, 'Morris', 'Cobra Mk III', 'MML-241', '2022-03-27', NULL, '2023-03-26 11:35:05', '2023-03-26 11:35:05'),
(70, 'Saleen', 'ILX', 'UUK-304', '2022-03-05', '2023-03-04 23:00:00', '2023-03-26 11:35:05', '2023-03-26 11:35:05'),
(71, 'Maruti', '200', 'JRQ-717', '2022-11-15', NULL, '2023-03-26 11:35:05', '2023-03-26 11:35:05'),
(72, 'Dagger', 'Unique Van', 'GTG-699', '2022-07-07', NULL, '2023-03-26 11:35:05', '2023-03-26 11:35:05'),
(73, 'Xiaolong', 'Club', 'ZDX-026', '2022-02-17', '2023-02-16 23:00:00', '2023-03-26 11:35:05', '2023-03-26 11:35:05'),
(74, 'Beijing', 'DMC', 'ARU-969', '2022-06-23', NULL, '2023-03-26 11:35:05', '2023-03-26 11:35:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
