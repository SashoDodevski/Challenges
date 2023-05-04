-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2023 at 04:22 PM
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
-- Database: `project_03-brainster`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `application_status_id` bigint(20) UNSIGNED NOT NULL,
  `history_status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `entry_date` date NOT NULL,
  `archived_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `client_id`, `application_status_id`, `history_status_id`, `created_at`, `updated_at`, `entry_date`, `archived_at`) VALUES
(4, 24, 3, 1, '2023-04-26 15:21:28', '2023-05-03 12:00:18', '2023-05-03', NULL),
(15, 32, 3, 2, '2023-04-27 17:18:37', '2023-05-03 12:00:01', '2023-05-03', '2023-05-03'),
(17, 34, 3, 1, '2023-04-27 17:53:13', '2023-05-03 12:37:21', '2023-04-27', NULL),
(19, 36, 1, 2, '2023-05-03 07:30:39', '2023-05-03 07:50:37', '2023-05-03', '2023-05-03'),
(20, 37, 3, 1, '2023-05-04 12:10:02', '2023-05-04 12:18:54', '2023-05-04', NULL),
(21, 38, 1, 1, '2023-05-04 12:11:53', '2023-05-04 12:11:53', '2023-05-04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `application_donations`
--

CREATE TABLE `application_donations` (
  `application_id` bigint(20) UNSIGNED NOT NULL,
  `donation_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `application_donations`
--

INSERT INTO `application_donations` (`application_id`, `donation_id`, `created_at`, `updated_at`) VALUES
(4, 23, '2023-05-01 16:41:55', '2023-05-01 16:41:55'),
(4, 24, '2023-05-01 16:43:51', '2023-05-01 16:43:51'),
(15, 26, '2023-05-03 07:53:10', '2023-05-03 07:53:10'),
(17, 29, '2023-05-03 12:37:21', '2023-05-03 12:37:21'),
(20, 30, '2023-05-04 12:18:54', '2023-05-04 12:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `application_statuses`
--

CREATE TABLE `application_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `application_statuses`
--

INSERT INTO `application_statuses` (`id`, `application_status`, `created_at`, `updated_at`) VALUES
(1, 'new', NULL, NULL),
(2, 'invalid', NULL, NULL),
(3, 'completed', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `image`, `text`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum dolor sit amet', 'uploads/639181bbda99402731918379185deaa2.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2023-04-21 16:50:43', '2023-04-28 17:22:55'),
(4, 'Blog 123', 'uploads/581e7ab55b165dabcdff61b666af9eee.jpg', 'Some text here', 1, '2023-04-28 16:40:31', '2023-04-28 16:40:31');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Blog', '2023-04-21 13:38:36', '2023-04-21 13:38:36'),
(2, 'Video', '2023-04-21 13:41:57', '2023-04-21 13:53:28'),
(5, 'Other', '2023-04-28 16:48:34', '2023-04-28 16:48:34');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `first_name`, `last_name`, `city`, `email`, `phone_number`, `created_at`, `updated_at`) VALUES
(24, 'Alice', 'Burton', 'Atlanta', 'alice2@burton.com', '+1111111', '2023-04-26 15:21:28', '2023-05-01 16:44:48'),
(32, 'Alice', 'Burton', 'Jacksonvile', 'alice@burton.com', '+123456', '2023-04-27 17:18:36', '2023-05-03 07:42:48'),
(34, 'Jack', 'Smith', 'New York', 'jack@smith.com', '+10101010', '2023-04-27 17:53:13', '2023-04-27 17:53:13'),
(36, 'Jim', 'Something', 'Charlotte', 'jim@something.com', '+98754612', '2023-05-03 07:30:39', '2023-05-03 07:30:39'),
(37, 'Jack', 'Smith', 'Skopje', 'jack@smithsomething.com', '+1111111', '2023-05-04 12:10:02', '2023-05-04 12:10:02'),
(38, 'Jane', 'Doe', 'New York', 'Jane@agoodcompany.com', '+38972', '2023-05-04 12:11:53', '2023-05-04 12:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `client_donations`
--

CREATE TABLE `client_donations` (
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `donation_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_donations`
--

INSERT INTO `client_donations` (`client_id`, `donation_id`, `created_at`, `updated_at`) VALUES
(24, 23, '2023-05-01 16:41:55', '2023-05-01 16:41:55'),
(24, 24, '2023-05-01 16:43:51', '2023-05-01 16:43:51'),
(32, 26, '2023-05-03 07:53:10', '2023-05-03 07:53:10'),
(34, 29, '2023-05-03 12:37:21', '2023-05-03 12:37:21'),
(37, 30, '2023-05-04 12:18:54', '2023-05-04 12:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `client_equipment`
--

CREATE TABLE `client_equipment` (
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `equipment_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_equipment`
--

INSERT INTO `client_equipment` (`client_id`, `equipment_id`, `created_at`, `updated_at`) VALUES
(24, 1, '2023-04-26 15:21:28', '2023-05-03 12:00:18'),
(32, 1, '2023-04-27 17:18:36', '2023-05-03 12:00:01'),
(34, 1, '2023-04-27 17:53:13', '2023-04-27 17:53:13'),
(36, 2, '2023-05-03 07:30:39', '2023-05-03 07:50:37'),
(37, 1, '2023-05-04 12:10:02', '2023-05-04 12:10:44'),
(38, 2, '2023-05-04 12:11:53', '2023-05-04 12:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `client_id`, `comment`, `created_at`, `updated_at`) VALUES
(4, 24, 'Comment comment', '2023-04-26 15:21:28', '2023-04-26 15:21:28'),
(13, 32, 'Comment com comment', '2023-04-27 17:18:37', '2023-04-27 17:18:37'),
(15, 34, 'This is awesome', '2023-04-27 17:53:13', '2023-04-27 17:53:13'),
(17, 36, 'Application application', '2023-05-03 07:30:39', '2023-05-03 07:30:39'),
(18, 37, 'I really need the following... in order to improove...', '2023-05-04 12:10:02', '2023-05-04 12:10:44'),
(19, 38, 'Commenttttt....', '2023-05-04 12:11:53', '2023-05-04 12:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `message`, `message_status`, `created_at`, `updated_at`) VALUES
(2, 'Jane', 'Doe', 'jane@doe.com', '+22222', 'Excellent excellent', 'New', '2023-04-27 16:20:34', '2023-05-03 14:13:58'),
(8, 'Jane', 'Doe', 'alice@burton.com', '+22222', 'Seccond message', 'Read', '2023-04-27 16:30:11', '2023-05-03 12:00:26'),
(9, 'Jack', 'Smith', 'jack@smith.com', '+1235874', 'Message message 1 2 3', 'New', '2023-04-29 08:35:33', '2023-04-29 14:14:21'),
(11, 'Alice', 'Burton', 'alice@burton2.com', '+5554554', 'Message message message!', 'Read', '2023-04-29 08:36:07', '2023-05-04 12:21:01'),
(12, 'Alice', 'Burton', 'alice@burton.com', '+5554554', 'Message message message!', 'New', '2023-04-29 08:37:42', '2023-05-01 18:08:41'),
(13, 'Jack', 'Black', 'jack@black.com', '+88524457', 'This is my awesome message!', 'Read', '2023-04-29 09:17:00', '2023-04-29 09:17:17');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `doc1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `client_id`, `doc1`, `doc2`, `created_at`, `updated_at`) VALUES
(4, 24, NULL, NULL, '2023-04-26 15:21:28', '2023-05-01 16:44:48'),
(15, 32, NULL, NULL, '2023-04-27 17:18:37', '2023-05-03 12:00:01'),
(17, 34, NULL, NULL, '2023-04-27 17:53:13', '2023-04-27 17:53:13'),
(19, 36, NULL, NULL, '2023-05-03 07:30:39', '2023-05-03 07:48:55'),
(20, 37, 'uploads/f245913750babec7bf21a4aed1ef5f01.docx', 'uploads/41616d065aeb2364d953aae915e56f4f.docx', '2023-05-04 12:10:02', '2023-05-04 12:10:44'),
(21, 38, 'uploads/20a5a0954a999ff9049a6b0d3cdd470a.docx', 'uploads/fea1d598991eb40c3f8b2b9517e63b84.docx', '2023-05-04 12:11:53', '2023-05-04 12:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `donation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `donation`, `created_at`, `updated_at`) VALUES
(23, 'Donation 2332', '2023-05-01 16:41:55', '2023-05-03 14:10:40'),
(24, 'Donation 3', '2023-05-01 16:43:51', '2023-05-01 16:43:51'),
(25, 'Computer 1\r\nEarplugs', '2023-05-01 18:08:07', '2023-05-01 18:08:07'),
(26, 'Computer something something', '2023-05-03 07:53:10', '2023-05-03 07:53:10'),
(27, 'Computer Dell\r\nMonitor HP', '2023-05-03 12:33:24', '2023-05-03 12:33:24'),
(28, 'Computer Dell\r\nMonitor HP', '2023-05-03 12:33:49', '2023-05-03 12:33:49'),
(29, 'Computer DELL', '2023-05-03 12:37:21', '2023-05-03 12:37:21'),
(30, 'Computer\r\nEquipment', '2023-05-04 12:18:54', '2023-05-04 12:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `donation_equipment`
--

CREATE TABLE `donation_equipment` (
  `donation_id` bigint(20) UNSIGNED NOT NULL,
  `equipment_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donation_equipment`
--

INSERT INTO `donation_equipment` (`donation_id`, `equipment_id`, `created_at`, `updated_at`) VALUES
(23, 1, '2023-05-01 16:41:55', '2023-05-01 16:41:55'),
(24, 1, '2023-05-01 16:43:51', '2023-05-01 16:43:51'),
(25, 1, '2023-05-01 18:08:07', '2023-05-01 18:08:07'),
(26, 1, '2023-05-03 07:53:10', '2023-05-03 07:53:10'),
(29, 1, '2023-05-03 12:37:21', '2023-05-03 12:37:21'),
(30, 1, '2023-05-04 12:18:54', '2023-05-04 12:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `equipment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `equipment_type`, `created_at`, `updated_at`) VALUES
(1, 'computer', NULL, NULL),
(2, 'equipment', NULL, NULL);

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
-- Table structure for table `history_statuses`
--

CREATE TABLE `history_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `history_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history_statuses`
--

INSERT INTO `history_statuses` (`id`, `history_status`, `created_at`, `updated_at`) VALUES
(1, 'active', NULL, NULL),
(2, 'archived', NULL, NULL);

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
(6, '2023_04_21_122828_create_videos_table', 2),
(9, '2023_04_21_151738_create_blog_categories_table', 3),
(11, '2023_04_21_175626_create_blogs_table', 4),
(12, '2023_04_22_113517_create_partner_types_table', 5),
(14, '2023_04_22_114232_create_partners_table', 6),
(58, '2023_04_22_140434_create_equipment_table', 7),
(59, '2023_04_23_132810_create_application_statuses_table', 8),
(60, '2023_04_23_133812_create_history_statuses_table', 9),
(61, '2023_04_24_090438_create_clients_table', 10),
(69, '2023_04_24_113902_create_client_equipment_table', 11),
(70, '2023_04_24_114310_create_documents_table', 12),
(71, '2023_04_24_114537_create_comments_table', 13),
(72, '2023_04_24_114722_create_applications_table', 14),
(74, '2023_04_27_091006_create_contacts_table', 15),
(75, '2023_04_27_172917_create_roles_table', 16),
(76, '2023_04_27_173440_alter_table_users-add_role_id_column', 17),
(82, '2023_04_27_200733_create_volunteer_positions_table', 18),
(83, '2023_04_27_201958_create_volunteers_table', 19),
(84, '2023_04_29_100126_alter_contacts_table-add_message_status_column', 20),
(85, '2023_04_29_113714_alter_volunteers_table-add_volunteer_status_column', 21),
(86, '2023_04_29_161835_create_donations_table', 22),
(96, '2023_05_01_090344_create_application_donations_table', 23),
(97, '2023_05_01_090443_create_donation_equipment_table', 23),
(98, '2023_05_01_090518_create_client_donations_table', 23);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partner_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partner_type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name`, `image`, `partner_url`, `partner_type_id`, `created_at`, `updated_at`) VALUES
(5, 'Филолошки Факултет', 'uploads/690fdad9c5498bc3cda231bec5ed322a.jpg', 'https://flf.ukim.mk/', 3, '2023-04-26 15:18:30', '2023-04-26 15:18:30'),
(6, 'Аква Нет', 'uploads/4af37ade55af93b6e7b4ce0cf05c743c.jpg', 'https://www.akvanet.mk/', 1, '2023-04-26 15:18:49', '2023-04-26 15:18:49'),
(7, 'Триглав осигурување', 'uploads/24f0c846de7088ab3aeedd41d1a852b9.png', 'https://www.triglav.mk/', 1, '2023-05-04 12:20:39', '2023-05-04 12:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `partner_types`
--

CREATE TABLE `partner_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `partner_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partner_types`
--

INSERT INTO `partner_types` (`id`, `partner_type`) VALUES
(1, 'regional'),
(2, 'international'),
(3, 'official');

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
(1, 'App\\Models\\User', 2, 'api_key', '3697ec550c4e54c012df211520c074a1006d9ddcb53cbe65c5011c951876d36b', '[\"*\"]', '2023-05-01 18:03:22', NULL, '2023-04-27 15:54:28', '2023-05-01 18:03:22');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'Admin', 'admin@admin.com', '$2y$10$uzh3.VMksBQwzYqBgkYTUOlnAKnJWIXvlf5VgGTUhVIgz4JU8W3VK', NULL, '2023-04-20 15:44:05', '2023-04-20 15:44:05'),
(2, 0, 'John Doe', 'john@doe.com', '$2y$10$as0SGtCtygN0morCLw9ue.Npc6pnxXzH2ZzZyfbb.Z7exQ4bRnCBW', NULL, '2023-04-27 15:54:12', '2023-04-27 15:54:12'),
(3, 0, 'Jane Doe', 'jane@doe.com', '$2y$10$psLpk/dGYMpJYfsI2Av1OeDq7FR/B6CVpwimkLvpuXAiiQ4wD3XLK', NULL, '2023-04-27 16:09:40', '2023-04-27 16:09:40');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `name`, `image`, `video_url`, `created_at`, `updated_at`) VALUES
(4, 'Донирај компјутер', 'uploads/644922c12be371b0fbd5e591c4b246d1.jpg', 'https://www.youtube.com/watch?v=hkVRVEXV9_E&t=3s', '2023-04-26 15:20:26', '2023-04-26 15:20:26'),
(5, 'Video 1', 'uploads/d142c035b3620389fc0b6f688cd2115f.jpg', 'www.google.com', '2023-04-28 16:34:00', '2023-04-28 16:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE `volunteers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `volunteer_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `volunteer_position_id` bigint(20) UNSIGNED NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `volunteers`
--

INSERT INTO `volunteers` (`id`, `volunteer_status`, `name`, `city`, `email`, `phone_number`, `volunteer_position_id`, `details`, `doc1`, `created_at`, `updated_at`) VALUES
(2, 'Active', 'Jim Beans', 'Los Angeles', 'jom@beans.com', '+999777', 2, 'Something something', NULL, '2023-04-27 18:37:56', '2023-05-03 14:54:20'),
(6, 'Request', 'Alice Burton', 'San Francisco', 'alice@burton2.com', '+99977799977', 2, 'Something something sadadadadadadadadadsssssssssssssssssssssssssssssssadadadadadadadadadsssssssssssssssssssssssssssssssadadadadadadadadadsssssssssssssssssssssssssssssssadadadadadadadadadsssssssssssssssssssssssssssssssadadadadadadadadadsssssssssssssssssssssssssssssssadadadadadadadadadsssssssssssssssssssssssssssssssadadadadadadadadadsssssssssssssssssssssssssssssssadadadadadadadadadsssssssssssssssssssssssssssssssadadadadadadadadadsssssssssssssssssssssssssssssssadadadadadadadadadsssssssssssssssssssssssssssssssadadadadadadadadadsssssssssssssssssssssssssssssssadadadadadadadadadsssssssssssssssssssssssssssssssadadadadadadadadadsssssssssssssssssssssssssssssssadadadadadadadadadsssssssssssssssssssssssssssssssadadadadadadadadadsssssssssssssssssssssssssssssssadadadadadadadadadsssssssssssssssssssssssssssssssadadadadadadadadadsssssssssssssssssssssssssssssssadadadadadadadadadssssssssssssssssssssssssssssssabout me...', NULL, '2023-04-29 11:15:58', '2023-05-03 15:04:12');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_positions`
--

CREATE TABLE `volunteer_positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `volunteer_position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `volunteer_positions`
--

INSERT INTO `volunteer_positions` (`id`, `volunteer_position`, `created_at`, `updated_at`) VALUES
(1, 'Volunteer 1', NULL, NULL),
(2, 'Volunteer 2', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applications_client_id_foreign` (`client_id`),
  ADD KEY `applications_application_status_id_foreign` (`application_status_id`),
  ADD KEY `applications_history_status_id_foreign` (`history_status_id`);

--
-- Indexes for table `application_donations`
--
ALTER TABLE `application_donations`
  ADD KEY `application_donations_application_id_foreign` (`application_id`),
  ADD KEY `application_donations_donation_id_foreign` (`donation_id`);

--
-- Indexes for table `application_statuses`
--
ALTER TABLE `application_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_category_id_foreign` (`category_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `client_donations`
--
ALTER TABLE `client_donations`
  ADD KEY `client_donations_client_id_foreign` (`client_id`),
  ADD KEY `client_donations_donation_id_foreign` (`donation_id`);

--
-- Indexes for table `client_equipment`
--
ALTER TABLE `client_equipment`
  ADD KEY `client_equipment_client_id_foreign` (`client_id`),
  ADD KEY `client_equipment_equipment_id_foreign` (`equipment_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_client_id_foreign` (`client_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_client_id_foreign` (`client_id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation_equipment`
--
ALTER TABLE `donation_equipment`
  ADD KEY `donation_equipment_donation_id_foreign` (`donation_id`),
  ADD KEY `donation_equipment_equipment_id_foreign` (`equipment_id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `history_statuses`
--
ALTER TABLE `history_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partners_partner_type_id_foreign` (`partner_type_id`);

--
-- Indexes for table `partner_types`
--
ALTER TABLE `partner_types`
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
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `volunteers_email_unique` (`email`),
  ADD KEY `volunteers_volunteer_position_id_foreign` (`volunteer_position_id`);

--
-- Indexes for table `volunteer_positions`
--
ALTER TABLE `volunteer_positions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `application_statuses`
--
ALTER TABLE `application_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history_statuses`
--
ALTER TABLE `history_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `partner_types`
--
ALTER TABLE `partner_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `volunteers`
--
ALTER TABLE `volunteers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `volunteer_positions`
--
ALTER TABLE `volunteer_positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_application_status_id_foreign` FOREIGN KEY (`application_status_id`) REFERENCES `application_statuses` (`id`),
  ADD CONSTRAINT `applications_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `applications_history_status_id_foreign` FOREIGN KEY (`history_status_id`) REFERENCES `history_statuses` (`id`);

--
-- Constraints for table `application_donations`
--
ALTER TABLE `application_donations`
  ADD CONSTRAINT `application_donations_application_id_foreign` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `application_donations_donation_id_foreign` FOREIGN KEY (`donation_id`) REFERENCES `donations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`id`);

--
-- Constraints for table `client_donations`
--
ALTER TABLE `client_donations`
  ADD CONSTRAINT `client_donations_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `client_donations_donation_id_foreign` FOREIGN KEY (`donation_id`) REFERENCES `donations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `client_equipment`
--
ALTER TABLE `client_equipment`
  ADD CONSTRAINT `client_equipment_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `client_equipment_equipment_id_foreign` FOREIGN KEY (`equipment_id`) REFERENCES `equipment` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `donation_equipment`
--
ALTER TABLE `donation_equipment`
  ADD CONSTRAINT `donation_equipment_donation_id_foreign` FOREIGN KEY (`donation_id`) REFERENCES `donations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `donation_equipment_equipment_id_foreign` FOREIGN KEY (`equipment_id`) REFERENCES `equipment` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `partners`
--
ALTER TABLE `partners`
  ADD CONSTRAINT `partners_partner_type_id_foreign` FOREIGN KEY (`partner_type_id`) REFERENCES `partner_types` (`id`);

--
-- Constraints for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD CONSTRAINT `volunteers_volunteer_position_id_foreign` FOREIGN KEY (`volunteer_position_id`) REFERENCES `volunteer_positions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
