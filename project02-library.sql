-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2023 at 02:40 PM
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
-- Database: `project02-library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(10000) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `name`) VALUES
(1, 'admin@admin.com', '$2y$10$ul2b1JV/ajGy.DbeuXkjM.QVF31QXrl0LGrWHpRjSr9nEL9fn7WEK', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(32) DEFAULT NULL,
  `author_surname` varchar(32) DEFAULT NULL,
  `author_CV` varchar(2000) DEFAULT NULL,
  `author_status` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `author_name`, `author_surname`, `author_CV`, `author_status`) VALUES
(1, 'Timothy', 'Knapman', '', 'DELETED'),
(3, 'Ernest', 'Hemingway', '', 'ACTIVE'),
(4, 'George', 'Orwell', 'Eric Arthur Blair, better known by his pen name George Orwell, was an English novelist, essayist, journalist, and critic. His work is characterized by lucid prose, social criticism, opposition to totalitarianism, and support of democratic socialism.\nOrwell produced literary criticism, poetry, fiction and polemical journalism. He is known for the allegorical novella Animal Farm (1945) and the dystopian novel Nineteen Eighty-Four (1949). His non-fiction works, including The Road to Wigan Pier (1937), documenting his experience of working-class life in the industrial north of England, and Homage to Catalonia (1938), an account of his experiences soldiering for the Republican faction of the Spanish Civil War (1936–1939), are as critically respected as his essays on politics, literature, language and culture.\nOrwell\'s work remains influential in popular culture and in political culture, and the adjective \"Orwellian\"—describing totalitarian and authoritarian social practices—is part of the English language, like many of his neologisms, such as \"Big Brother\", \"Thought Police\", \"Room 101\", \"Newspeak\", \"memory hole\", \"doublethink\", and \"thoughtcrime\".[3][4] In 2008, The Times ranked George Orwell second among \"The 50 greatest British writers since 1945\".', 'ACTIVE'),
(5, 'Joanne', 'Rowling', 'Joanne Rowling CH OBE FRSL (/ˈroʊlɪŋ/ \"rolling\";[1] born 31 July 1965), also known by her pen name J. K. Rowling, is a British author, philanthropist, producer, and screenwriter. She wrote Harry Potter, a seven-volume children\'s fantasy series published from 1997 to 2007. The series has sold over 500 million copies, been translated into at least 70 languages, and spawned a global media franchise including films and video games. The Casual Vacancy (2012) was her first novel for adults. She writes Cormoran Strike, an ongoing crime fiction series, as Robert Galbraith.\nRowling concluded the Harry Potter series with Harry Potter and the Deathly Hallows (2007). The novels follow a boy called Harry Potter as he attends Hogwarts, a school for wizards, and battles Lord Voldemort. Death and the divide between good and evil are the central themes of the series. Its influences include: Bildungsroman (the coming-of-age genre), school stories, fairy tales, and Christian allegory. The series revived fantasy as a genre in the children\'s market, spawned a host of imitators, and inspired an active fandom. Critical reception has been more mixed. Many reviewers see Rowling\'s writing as conventional; some regard her portrayal of gender and social division as regressive. There were also religious debates over Harry Potter.', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_title` varchar(1000) DEFAULT NULL,
  `author_id` varchar(1000) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `publication_year` int(11) DEFAULT NULL,
  `no_of_pages` int(11) DEFAULT NULL,
  `book_image` varchar(1000) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `book_status` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_title`, `author_id`, `category_id`, `publication_year`, `no_of_pages`, `book_image`, `created`, `book_status`) VALUES
(46, 'Adventure Tales', '1', 1, 1928, 180, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-17 09:42:37', 'ACTIVE'),
(47, 'Adventure Tales', '1', 1, 1928, 180, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-17 09:42:41', 'ACTIVE'),
(48, 'Book 2', '1', 1, 2000, 180, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-19 13:21:30', 'ACTIVE'),
(55, 'Book 3', '1', 3, 1950, 200, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-17 09:42:43', 'ACTIVE'),
(56, 'Book 16', '1', 1, 2000, 180, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-19 13:21:33', 'DELETED'),
(57, 'Book IIIII', '1', 2, 1940, 150, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-17 09:42:46', 'ACTIVE'),
(58, 'TEST asdasdsad', '1', 2, 1928, 180, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-17 10:26:07', 'DELETED'),
(59, 'TEST 987', '1', 2, 1987, 180, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-19 12:00:04', 'DELETED'),
(60, 'TEST OOOOO', '1', 3, 1950, 180, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-19 12:00:08', 'ACTIVE'),
(61, 'Book 111', '1', 3, 1928, 180, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-17 10:25:52', 'DELETED'),
(62, 'Book 222', '1', 1, 1928, 180, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-16 10:02:10', 'ACTIVE'),
(63, 'Adventure Tales', '1', 1, 1928, 180, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-16 10:02:12', 'DELETED'),
(64, 'Classic Stories', '1', 2, 1928, 180, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-17 10:26:12', 'ACTIVE'),
(65, 'Book 2', '1', 1, 1928, 180, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-17 10:26:25', 'DELETED'),
(66, 'Adventure Tales', '1', 1, 2000, 180, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-17 10:26:17', 'ACTIVE'),
(67, 'Adventure Tales', '1', 2, 2000, 180, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-17 10:26:19', 'ACTIVE'),
(68, 'Adventure Tales', '1', 3, 1928, 180, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-12 20:38:19', 'ACTIVE'),
(69, 'Adventure Tales', '1', 2, 1928, 180, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-17 09:57:59', 'DELETED'),
(70, 'Adventure Tales', '1', 2, 1928, 180, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-14 18:07:47', 'ACTIVE'),
(71, 'Test book', '1', 2, 1923, 80, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-16 10:23:43', 'ACTIVE'),
(72, 'Adventure Tales', '1', 1, 1987, 180, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-16 13:40:03', 'ACTIVE'),
(73, 'Book 3', '1', 1, 1928, 180, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-19 11:49:44', 'ACTIVE'),
(74, 'TEST', '1', 1, 2000, 180, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-16 13:46:05', 'ACTIVE'),
(75, 'Adventure Tales', '1', 1, 1950, 180, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-16 13:46:36', 'ACTIVE'),
(76, 'The Great Gatsby', '1', 2, 1950, 180, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-16 16:14:10', 'DELETED'),
(77, 'Adventure Tales', '1', 2, 1987, 180, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-17 10:28:40', 'DELETED'),
(78, 'Classic Stories', '1', 2, 2000, 180, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-17 10:26:30', 'DELETED'),
(79, 'The Great Gatsby', '1', 2, 1987, 180, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-16 16:13:51', 'ACTIVE'),
(80, 'Classic Stories', '1', 2, 1950, 180, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-17 10:42:54', 'ACTIVE'),
(81, 'Book 2', '1', 2, 1940, 200, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-17 10:43:14', 'ACTIVE'),
(82, 'Book 2', '1', 2, 1940, 150, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-17 10:43:38', 'ACTIVE'),
(83, 'TEST', '1', 3, 1940, 150, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-19 12:02:03', 'DELETED'),
(84, 'Book 1', '1', 2, 1987, 200, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-17 10:44:30', 'ACTIVE'),
(85, 'Book 2', '1', 2, 1940, 200, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-17 10:44:53', 'ACTIVE'),
(86, 'Book 1', '1', 3, 1987, 180, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-17 10:45:17', 'ACTIVE'),
(87, 'Adventure Tales', '1', 2, 1940, 200, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-17 10:46:48', 'ACTIVE'),
(88, 'Adventure Tales', '1', 2, 2000, 200, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-17 10:48:06', 'ACTIVE'),
(89, 'Book 1', '1', 3, 1987, 200, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-17 10:48:45', 'ACTIVE'),
(90, 'TEST', '1', 2, 1950, 150, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-17 11:10:27', 'ACTIVE'),
(91, 'Adventure Tales', '1', 2, 1940, 150, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-17 10:50:00', 'ACTIVE'),
(92, 'TEST', '1', 2, 1987, 150, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-17 10:50:57', 'ACTIVE'),
(93, 'TEST', '1', 3, 1950, 200, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-17 10:51:32', 'ACTIVE'),
(94, 'Book 1', '1', 3, 2000, 180, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-17 11:10:40', 'ACTIVE'),
(96, 'Adventure Tales', '4', 1, 1940, 180, 'https://www.google.com/imgres?imgurl=https%3A%2F%2F146.20.176.192%2Fr%2Fw1200%2Fupload%2F3b%2F05%2F33%2Fshutterstock-466404632.jpg&imgrefurl=https%3A%2F%2Fwww.worldatlas.com%2Farticles%2Fbest-selling-book-series.html&tbnid=0dNygOx4X7wRlM&vet=12ahUKEwj0rLyohM_8AhU8xrsIHYaHByQQMygaegUIARD4AQ..i&docid=hxiv2K0_vxI77M&w=1100&h=825&q=famous%20book%20images&ved=2ahUKEwj0rLyohM_8AhU8xrsIHYaHByQQMygaegUIARD4AQ', '2023-01-17 16:43:27', 'ACTIVE'),
(97, 'TEST', '4', 8, 1928, 180, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1490528560l/4671._SY475_.jpg', '2023-01-19 11:28:22', 'ACTIVE'),
(98, 'The Great Gatsby', '4', 7, 2000, 150, 'https://www.google.com/imgres?imgurl=https%3A%2F%2F146.20.176.192%2Fr%2Fw1200%2Fupload%2F3b%2F05%2F33%2Fshutterstock-466404632.jpg&imgrefurl=https%3A%2F%2Fwww.worldatlas.com%2Farticles%2Fbest-selling-book-series.html&tbnid=0dNygOx4X7wRlM&vet=12ahUKEwj0rLyohM_8AhU8xrsIHYaHByQQMygaegUIARD4AQ..i&docid=hxiv2K0_vxI77M&w=1100&h=825&q=famous%20book%20images&ved=2ahUKEwj0rLyohM_8AhU8xrsIHYaHByQQMygaegUIARD4AQ', '2023-01-19 12:02:15', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `book_comments`
--

CREATE TABLE `book_comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `comment` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `book_notes`
--

CREATE TABLE `book_notes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `category_status` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category`, `category_status`) VALUES
(1, 'Adventure', 'ACTIVE'),
(2, 'Classics', 'ACTIVE'),
(3, 'Crime', 'ACTIVE'),
(4, 'Fairy tales, fables, and folk tales.', 'ACTIVE'),
(5, 'Fantasy', 'ACTIVE'),
(6, 'Historical fiction', 'ACTIVE'),
(7, 'Horror', 'ACTIVE'),
(8, 'Humour and satire', 'ACTIVE'),
(9, 'Literary fiction', 'DELETED'),
(10, 'Mystery', 'ACTIVE'),
(11, 'Poetry', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `surname`) VALUES
(9, 'Jane@agoodcompany.com', '$2y$10$TaddwVxCFM9XAPEVY4U8TOfxUNOwKlPnSmHAABrRIXhLP048Dpzra', 'Jane', ' D Owe'),
(10, 'saso.dodevski.1@gmail.com', '$2y$10$AcjCLgzXR52cEWZeGRD3/.NFQgGoqY5VQnlhvYOa4iKLTUNEzrxwC', 'Sasho', 'Dodevski');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_comments`
--
ALTER TABLE `book_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `book_notes`
--
ALTER TABLE `book_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `book_comments`
--
ALTER TABLE `book_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_notes`
--
ALTER TABLE `book_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_comments`
--
ALTER TABLE `book_comments`
  ADD CONSTRAINT `book_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `book_comments_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`);

--
-- Constraints for table `book_notes`
--
ALTER TABLE `book_notes`
  ADD CONSTRAINT `book_notes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `book_notes_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
