-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2023 at 09:46 PM
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
-- Database: `challenge_25-laravel-forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`id`, `title`, `category_id`, `image`, `description`, `user_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Forum 111', 1, 'uploads/f5cbc8a704c2185a880d08d3f51cd5ab.png', 'This is forum with general topics', 2, 1, '2023-03-11 20:06:11', '2023-03-12 19:36:29'),
(5, 'Forum 23', 4, 'uploads/f1f80b412f4a3b24a1185228e2040060.png', 'Discussion for Forum 23', 2, 0, '2023-03-11 20:25:26', '2023-03-12 19:35:01'),
(6, 'Cars Discussion 1', 6, 'uploads/a588db12da42bf00b9fffe588a1ab8a1.png', 'Car 1 is cool', 3, 1, '2023-03-12 10:46:03', '2023-03-12 10:46:03'),
(7, 'Movie 122', 4, 'uploads/a3b0f45d21949f1f08ffae578f02a7e9.png', 'Discussion about Movie 122', 1, 0, '2023-03-12 11:30:10', '2023-03-12 19:17:11'),
(8, 'Movie 111', 4, 'uploads/735ddf10eda01e53fd929c81d704b1e0.png', 'Discussion about Movie 111', 1, 0, '2023-03-12 11:33:27', '2023-03-12 19:19:49'),
(9, 'Sports 1', 3, 'uploads/92a78de7e1df457d51498f3787274ee4.jpg', 'Discussion about Sports 1', 3, 1, '2023-03-12 13:40:20', '2023-03-12 13:40:20'),
(10, 'Entertainment 123', 2, 'uploads/8a8e56fce3d7b409db8341724b1be28d.png', 'Discussion about Entertainment 123', 3, 1, '2023-03-12 13:45:21', '2023-03-12 19:34:20'),
(11, 'Sports 1234', 3, 'uploads/759dfa23b516ff7e7d1fda495cbe0f20.jpg', 'Description of Sports 1234', 1, 0, '2023-03-12 19:02:57', '2023-03-12 19:05:29'),
(14, 'Discussion 111111', 1, 'uploads/26fb73fdb6fd4d6305f89f27ea52efa8.png', 'Desc for Discussion 111111', 1, 1, '2023-03-12 19:10:52', '2023-03-12 19:11:58'),
(15, 'Discussion 777', 1, 'uploads/3c16fececaf46c7c028e66dcd6bd3e77.png', 'Desc for Discussion 777', 1, 0, '2023-03-12 19:11:46', '2023-03-12 19:11:46'),
(16, 'Test 123', 4, 'uploads/d04d48928a9c5a5e5fd7ba32e253f9ad.png', 'Test desc', 1, 1, '2023-03-12 19:12:58', '2023-03-12 19:34:24'),
(17, 'Test 000', 6, 'uploads/5fc41a827b5140380a07effcf88b1919.png', 'Test 0000000000', 4, 0, '2023-03-12 19:32:19', '2023-03-12 19:32:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forums_user_id_foreign` (`user_id`),
  ADD KEY `forums_category_id_foreign` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `forums`
--
ALTER TABLE `forums`
  ADD CONSTRAINT `forums_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `forums_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
