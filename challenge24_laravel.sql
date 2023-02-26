-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2023 at 01:11 PM
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
-- Database: `challenge24_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'ABCDEF', 'Jane@agoodcompany.com', '123', '2023-02-25 12:30:27', '2023-02-25 12:30:27');

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
(6, '2023_02_17_103127_create_projects_table', 2),
(14, '2023_02_23_113415_create_roles_table', 3),
(15, '2023_02_23_113636_alter_table_users-add_role_id_column', 4),
(17, '2023_02_25_123850_create_companies_table', 5);

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

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `subtitle`, `description`, `image`, `url`, `created_at`, `updated_at`) VALUES
(29, 'Што ќе бидеш сега кога порасна?', 'Што ќе бидеш сега кога порасна?', 'Изборот на образование и кариера се одлуки кои имаат големо влијание на квалитетот на твојот живот. Креиравме моќна алатка која ќе ти помогне во донесувањето на оваа важна одлука.', 'https://brainster.co/wp-content/uploads/2021/06/%D0%9A%D0%B0%D1%80%D0%B8%D0%B5%D1%80%D0%B5%D0%BD-%D0%BA%D0%B2%D0%B8%D0%B7.png', 'https://careers.brainster.co/quiz?utm_source=facebook%2C%20instagram&utm_medium=web&utm_campaign=codepreneurs%20mk', '2023-02-26 10:39:05', '2023-02-26 10:39:36'),
(30, 'Pandemic Disease Tracker', 'Продукт кој го тестираа нашите студенти', 'Веб решение, изработено за COVID-19 пандемијата од  студентите на Академијата за програмирање, тестирано од студентите на Академијата за Software Testing.', 'https://brainster.co/wp-content/uploads/2021/07/covidTracker-1.png', 'https://blog.brainster.co/qa-proekt-tracker/?fbclid=IwAR3D7bba2bmTZr7CQnQrKqgAL5Hd8v89jRHWyqmZ62dK0UmqUobuH7WRJMk', '2023-02-26 10:44:06', '2023-02-26 10:44:06'),
(31, 'Komunicira.me', 'Brainster ја освои Националната награда за општествено одговорна практика за 2019', 'Апликација која е изработена од учесниците на Академијата за програмирање на Brainster', 'https://brainster.co/wp-content/uploads/2021/06/Komunicira.me_.png', 'https://blog.brainster.co/brainster-studenti-akademija-za-programiranje-nagrada/', '2023-02-26 10:45:31', '2023-02-26 10:45:31'),
(32, 'dolore quo odit', 'Voluptatem iste cum doloribus ut.', 'Quia non voluptate nobis. Atque vel quos mollitia blanditiis cumque quam earum. Dolores eaque exercitationem nihil enim.', 'https://via.placeholder.com/640x480.png/008888?text=ullam', 'http://www.upton.com/ut-voluptatibus-saepe-iusto-delectus', '2023-02-26 10:47:31', '2023-02-26 10:47:31'),
(33, 'dolore velit odit', 'Mollitia nesciunt itaque similique ab maiores.', 'Sint expedita non soluta ratione. Dolorum omnis dolorem quidem voluptatibus aut. Iste dolores dolorem molestiae qui cumque voluptas.', 'https://via.placeholder.com/640x480.png/0033dd?text=ab', 'http://doyle.org/', '2023-02-26 10:47:31', '2023-02-26 10:47:31'),
(34, 'alias consequatur dignissimos', 'Placeat quos officia reiciendis ut et.', 'Ratione non officiis hic et optio aliquam rerum. Quae possimus cumque illum ab quam voluptatem id. Aut non quisquam nam est voluptatem voluptatem.', 'https://via.placeholder.com/640x480.png/0033aa?text=possimus', 'http://www.krajcik.net/est-ut-ullam-voluptatem-quia', '2023-02-26 10:47:31', '2023-02-26 10:47:31'),
(35, 'placeat numquam sit', 'Dolores nulla laudantium vel ut voluptatem delectus.', 'Dolorum enim in et quo explicabo. Doloremque voluptatem consequuntur facere ipsum veritatis expedita. Nesciunt illum ab harum consequatur qui iure totam.', 'https://via.placeholder.com/640x480.png/00ff66?text=velit', 'http://www.larson.com/ut-labore-alias-aut-voluptatibus-odio-et', '2023-02-26 10:47:31', '2023-02-26 10:47:31'),
(36, 'est assumenda et', 'Quaerat asperiores sint eum rerum.', 'Sunt qui animi aspernatur laboriosam. Nam rerum aspernatur nisi voluptatibus. Voluptates est vero qui et aut assumenda.', 'https://via.placeholder.com/640x480.png/00ddaa?text=nihil', 'http://www.johns.com/laborum-eveniet-quia-odio-est-omnis-ipsam-repudiandae.html', '2023-02-26 10:47:31', '2023-02-26 10:47:31'),
(39, 'qui ut quisquam', 'Ab culpa nobis perspiciatis fuga.', 'Qui ad ea aperiam vero. Expedita quia et et aut nemo. Sit aliquam illum veritatis expedita exercitationem maiores excepturi.', 'https://via.placeholder.com/640x480.png/003366?text=et', 'http://www.kutch.com/', '2023-02-26 11:01:43', '2023-02-26 11:01:43');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'user');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 'Admin', 'admin@email.com', NULL, '$2y$10$fgfCPjjDMgO7sIMk53jT1uq2jesM0KcgjsoH8mkNqUQ47PGfWCfoC', NULL, '2023-02-23 09:40:27', '2023-02-23 10:32:36', 1),
(2, 'John Doe', 'john@mail.com', NULL, '$2y$10$1XOqgAaQTkw22Sv0ywLn5.Rw3F/X7aN.NatZ3ysByGVTChKecDwa2', NULL, '2023-02-23 10:32:02', '2023-02-23 10:32:02', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
