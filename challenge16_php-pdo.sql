-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2022 at 10:21 PM
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
-- Database: `challenge16_php-pdo`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_descriptions`
--

CREATE TABLE `business_descriptions` (
  `user_id` int(11) DEFAULT NULL,
  `image_url_1` text DEFAULT NULL,
  `business_1_description` varchar(1024) DEFAULT NULL,
  `image_url_2` text DEFAULT NULL,
  `business_2_description` varchar(1024) DEFAULT NULL,
  `image_url_3` text DEFAULT NULL,
  `business_3_description` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_descriptions`
--

INSERT INTO `business_descriptions` (`user_id`, `image_url_1`, `business_1_description`, `image_url_2`, `business_2_description`, `image_url_3`, `business_3_description`) VALUES
(27, 'https://www.guacamayoecolodge.com/wp-content/uploads/2021/11/guacamayo-cuyabeno-lodge-amazon20.png', 'Description  1', 'http://elevatedestinations.com/wp-content/uploads/2014/09/uacari1.jpg', 'Description 2', 'https://lp-cms-production.imgix.net/features/2013/02/Amazon_tour_Manaus-97746aabd084.jpg', 'Description 3'),
(28, 'https://images.thrillophilia.com/image/upload/s--HTDZP-5M--/c_fill,g_auto,h_600,q_auto,w_975/f_auto,fl_strip_profile/v1/images/photos/000/084/783/original/1556011667_shutterstock_631736717.jpg.jpg', 'Bali (/ˈbɑːli/) is a province of Indonesia and the westernmost of the Lesser Sunda Islands. East of Java and west of Lombok, the province includes the island of Bali and a few smaller neighbouring islands, notably Nusa Penida, Nusa Lembongan, and Nusa Ceningan. The provincial capital, Denpasar,[7] is the most populous city in the Lesser Sunda Islands and the second-largest, after Makassar, in Eastern Indonesia. The upland town of Ubud in Greater Denpasar is considered Bali\'s cultural centre. The province is Indonesia\'s main tourist destination, with a significant rise in tourism since the 1980s.[8] Tourism-related business makes up 80% of its economy.', 'https://cf-images.us-east-1.prod.boltdns.net/v1/static/3281700261001/6f82c2d5-6c75-4dba-ae17-120fdf8add57/3312551a-0e39-4672-af3f-cb189ffb3b9b/1280x720/match/image.jpg', 'Bali is the only Hindu-majority province in Indonesia, with 86.9% of the population adhering to Balinese Hinduism.[3] It is renowned for its highly developed arts, including traditional and modern dance, sculpture, painting, leather, metalworking, and music. The Indonesian International Film Festival is held every year in Bali. Other international events held in Bali include the Miss World 2013 and 2018 Annual Meetings of the International Monetary Fund and the World Bank Group. In March 2017, TripAdvisor named Bali as the world\'s top destination in its Traveller\'s Choice award, which it also earned in January 2021.', 'https://www.easyvillas.net/wp-content/uploads/2013/01/Bali-Tourism.jpg', 'Bali is part of the Coral Triangle, the area with the highest biodiversity of marine species, especially fish and turtles.[12] In this area alone, over 500 reef-building coral species can be found. For comparison, this is about seven times as many as in the entire Caribbean.[13] Bali is the home of the Subak irrigation system, a UNESCO World Heritage Site.[14] It is also home to a unified confederation of kingdoms composed of 10 traditional royal Balinese houses, each house ruling a specific geographic area. The confederation is the successor of the Bali Kingdom. The royal houses are not recognised by the government of Indonesia; however, they originated before Dutch colonisation.'),
(29, 'https://images.thrillophilia.com/image/upload/s--HTDZP-5M--/c_fill,g_auto,h_600,q_auto,w_975/f_auto,fl_strip_profile/v1/images/photos/000/084/783/original/1556011667_shutterstock_631736717.jpg.jpg', 'Bali (/ˈbɑːli/) is a province of Indonesia and the westernmost of the Lesser Sunda Islands. East of Java and west of Lombok, the province includes the island of Bali and a few smaller neighbouring islands, notably Nusa Penida, Nusa Lembongan, and Nusa Ceningan. The provincial capital, Denpasar,[7] is the most populous city in the Lesser Sunda Islands and the second-largest, after Makassar, in Eastern Indonesia. The upland town of Ubud in Greater Denpasar is considered Bali\'s cultural centre. The province is Indonesia\'s main tourist destination, with a significant rise in tourism since the 1980s.[8] Tourism-related business makes up 80% of its economy.', 'https://cf-images.us-east-1.prod.boltdns.net/v1/static/3281700261001/6f82c2d5-6c75-4dba-ae17-120fdf8add57/3312551a-0e39-4672-af3f-cb189ffb3b9b/1280x720/match/image.jpg', 'Bali is the only Hindu-majority province in Indonesia, with 86.9% of the population adhering to Balinese Hinduism.[3] It is renowned for its highly developed arts, including traditional and modern dance, sculpture, painting, leather, metalworking, and music. The Indonesian International Film Festival is held every year in Bali. Other international events held in Bali include the Miss World 2013 and 2018 Annual Meetings of the International Monetary Fund and the World Bank Group. In March 2017, TripAdvisor named Bali as the world\'s top destination in its Traveller\'s Choice award, which it also earned in January 2021.', 'https://www.easyvillas.net/wp-content/uploads/2013/01/Bali-Tourism.jpg', 'Bali is part of the Coral Triangle, the area with the highest biodiversity of marine species, especially fish and turtles.[12] In this area alone, over 500 reef-building coral species can be found. For comparison, this is about seven times as many as in the entire Caribbean.[13] Bali is the home of the Subak irrigation system, a UNESCO World Heritage Site.[14] It is also home to a unified confederation of kingdoms composed of 10 traditional royal Balinese houses, each house ruling a specific geographic area. The confederation is the successor of the Bali Kingdom. The royal houses are not recognised by the government of Indonesia; however, they originated before Dutch colonisation.'),
(30, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS3so5pe4YdDfYYKOBq9zvGeobw3Sb4Equ-F1tr_BEybrxi4VctMK-CoBXTzOZ_XErX73U&usqp=CAU', 'Building 1', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-XvGp-7YSQM8ehmNnxguD0sugsp5Qb64WWg&usqp=CAU', 'Building 2', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-XvGp-7YSQM8ehmNnxguD0sugsp5Qb64WWg&usqp=CAU', 'Building 3'),
(31, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS3so5pe4YdDfYYKOBq9zvGeobw3Sb4Equ-F1tr_BEybrxi4VctMK-CoBXTzOZ_XErX73U&usqp=CAU', '1', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-XvGp-7YSQM8ehmNnxguD0sugsp5Qb64WWg&usqp=CAU', '2', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-XvGp-7YSQM8ehmNnxguD0sugsp5Qb64WWg&usqp=CAU', '3'),
(32, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS3so5pe4YdDfYYKOBq9zvGeobw3Sb4Equ-F1tr_BEybrxi4VctMK-CoBXTzOZ_XErX73U&usqp=CAU', '11', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-XvGp-7YSQM8ehmNnxguD0sugsp5Qb64WWg&usqp=CAU', '22', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-XvGp-7YSQM8ehmNnxguD0sugsp5Qb64WWg&usqp=CAU', '33'),
(33, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS3so5pe4YdDfYYKOBq9zvGeobw3Sb4Equ-F1tr_BEybrxi4VctMK-CoBXTzOZ_XErX73U&usqp=CAU', '1', 'https://cf-images.us-east-1.prod.boltdns.net/v1/static/3281700261001/6f82c2d5-6c75-4dba-ae17-120fdf8add57/3312551a-0e39-4672-af3f-cb189ffb3b9b/1280x720/match/image.jpg', '2', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-XvGp-7YSQM8ehmNnxguD0sugsp5Qb64WWg&usqp=CAU', '3'),
(34, 'https://ichef.bbci.co.uk/news/976/cpsprodpb/494C/production/_121246781_gettyimages-1348843962-1.jpg', '1', 'https://voltagreens.com/wp-content/uploads/2019/03/igh.jpg', '2', 'https://www.worldconstructiontoday.com/wp-content/uploads/2019/10/Tokyos_tryst_construction-218x150.jpg', '3'),
(35, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTT8SUXvDwsgMlhX2PnAZ7yOnECt5pgOZeCBg&usqp=CAU', 'House 1', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR0TubdQjQJsK3VRhcUWxqcNrgYcqyZVpCqEA&usqp=CAU', 'House 2', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRC6QpEqT8qYm65h9FZw6zZV7vfJAhDw4Xajg&usqp=CAU', 'House 3'),
(36, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTT8SUXvDwsgMlhX2PnAZ7yOnECt5pgOZeCBg&usqp=CAU', 'House 1', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR0TubdQjQJsK3VRhcUWxqcNrgYcqyZVpCqEA&usqp=CAU', 'House 2', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRC6QpEqT8qYm65h9FZw6zZV7vfJAhDw4Xajg&usqp=CAU', 'House 3'),
(37, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTT8SUXvDwsgMlhX2PnAZ7yOnECt5pgOZeCBg&usqp=CAU', 'House 1', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR0TubdQjQJsK3VRhcUWxqcNrgYcqyZVpCqEA&usqp=CAU', 'House 2', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRC6QpEqT8qYm65h9FZw6zZV7vfJAhDw4Xajg&usqp=CAU', 'House 3'),
(38, 'https://images.thrillophilia.com/image/upload/s--HTDZP-5M--/c_fill,g_auto,h_600,q_auto,w_975/f_auto,fl_strip_profile/v1/images/photos/000/084/783/original/1556011667_shutterstock_631736717.jpg.jpg', 'afgfag', 'https://cf-images.us-east-1.prod.boltdns.net/v1/static/3281700261001/6f82c2d5-6c75-4dba-ae17-120fdf8add57/3312551a-0e39-4672-af3f-cb189ffb3b9b/1280x720/match/image.jpg', 'afdgfadg', 'https://www.easyvillas.net/wp-content/uploads/2013/01/Bali-Tourism.jpg', 'afgfaga'),
(39, 'https://images.thrillophilia.com/image/upload/s--HTDZP-5M--/c_fill,g_auto,h_600,q_auto,w_975/f_auto,fl_strip_profile/v1/images/photos/000/084/783/original/1556011667_shutterstock_631736717.jpg.jpg', 'dsafsdaf', 'https://cf-images.us-east-1.prod.boltdns.net/v1/static/3281700261001/6f82c2d5-6c75-4dba-ae17-120fdf8add57/3312551a-0e39-4672-af3f-cb189ffb3b9b/1280x720/match/image.jpg', 'sdasdfsdf', 'https://www.easyvillas.net/wp-content/uploads/2013/01/Bali-Tourism.jpg', 'sadffdsafds'),
(40, 'https://images.thrillophilia.com/image/upload/s--HTDZP-5M--/c_fill,g_auto,h_600,q_auto,w_975/f_auto,fl_strip_profile/v1/images/photos/000/084/783/original/1556011667_shutterstock_631736717.jpg.jpg', 'dsafsdaf', 'https://cf-images.us-east-1.prod.boltdns.net/v1/static/3281700261001/6f82c2d5-6c75-4dba-ae17-120fdf8add57/3312551a-0e39-4672-af3f-cb189ffb3b9b/1280x720/match/image.jpg', 'sdasdfsdf', 'https://www.easyvillas.net/wp-content/uploads/2013/01/Bali-Tourism.jpg', 'sadffdsafds');

-- --------------------------------------------------------

--
-- Table structure for table `business_types`
--

CREATE TABLE `business_types` (
  `id` int(11) NOT NULL,
  `business_type` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_types`
--

INSERT INTO `business_types` (`id`, `business_type`) VALUES
(1, 'Products'),
(2, 'Services');

-- --------------------------------------------------------

--
-- Table structure for table `social_networks`
--

CREATE TABLE `social_networks` (
  `user_id` int(11) DEFAULT NULL,
  `linked_in` text DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `instagram` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social_networks`
--

INSERT INTO `social_networks` (`user_id`, `linked_in`, `facebook`, `twitter`, `instagram`) VALUES
(27, 'LinkedIn', 'Facebook', 'Twitter', 'Instagram'),
(28, 'LinkedIn.com', 'Facebook.com', 'Twitter.com', 'Instagram.com'),
(29, 'LinkedIn.com', 'Facebook.com', 'Twitter.com', 'Instagram'),
(30, 'LinkedIn.com', 'Facebook.com', 'Twitter.com', 'Instagram.com'),
(31, 'LinkedIn.com', 'Facebook.com', 'Twitter.com', 'Instagram.com'),
(32, 'LinkedIn.com', 'Facebook.com', 'Twitter.com', 'Instagram.com'),
(33, 'LinkedIn.com', 'Facebook.com', 'Twitter.com', 'Instagram.com'),
(34, 'LinkedIn.com', 'Facebook.com', 'Twitter.com', 'Instagram.com'),
(35, 'LinkedIn.com', 'Facebook.com', 'Twitter.com', 'Instagram.com'),
(36, 'LinkedIn.com', 'Facebook.com', 'Twitter.com', 'Instagram.com'),
(37, 'LinkedIn.com', 'Facebook.com', 'Twitter.com', 'Instagram.com'),
(38, 'LinkedIn', 'Facebook', 'Twitter', 'Instagram'),
(39, 'LinkedIn', 'Facebook', 'Twitter', 'Instagram'),
(40, 'LinkedIn', 'Facebook', 'Twitter', 'Instagram');

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `id` int(11) NOT NULL,
  `short_info` varchar(256) DEFAULT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `location` varchar(128) DEFAULT NULL,
  `full_info` text DEFAULT NULL,
  `business_type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`id`, `short_info`, `phone`, `location`, `full_info`, `business_type_id`) VALUES
(27, 'Short info of the company', '+089 123 4567 890', 'Skopje - Center', 'description of your company', 2),
(28, 'The Agency working exclusively tours to Bali', '123 852852', 'Skopje', 'A travel agency is a private retailer or public service that provides travel and tourism-related services to the general public on behalf of accommodation or travel suppliers to offer different kinds of travelling packages for each destination. Travel agencies can provide outdoor recreation activities, airlines, car rentals, cruise lines, hotels, railways, travel insurance, package tours, insurance, guide books, VIP airport lounge access, arranging logistics for luggage and medical items delivery for travellers upon request, public transport timetables, car rentals, and bureau de change services. Travel agencies can also serve as general sales agents for airlines that do not have offices in a specific region. A travel agency\'s main function is to act as an agent, selling travel products and services on behalf of a supplier. They are also called Travel Advisors. They do not keep inventory in-hand unless they have pre-booked hotel rooms or cabins on a cruise ship for a group travel event such as a wedding, honeymoon, or other group event.', 2),
(29, 'Short info of the company', '111111 22 333', 'Skopje', 'A travel agency is a private retailer or public service that provides travel and tourism-related services to the general public on behalf of accommodation or travel suppliers to offer different kinds of travelling packages for each destination. Travel agencies can provide outdoor recreation activities, airlines, car rentals, cruise lines, hotels, railways, travel insurance, package tours, insurance, guide books, VIP airport lounge access, arranging logistics for luggage and medical items delivery for travellers upon request, public transport timetables, car rentals, and bureau de change services. Travel agencies can also serve as general sales agents for airlines that do not have offices in a specific region. A travel agency\'s main function is to act as an agent, selling travel products and services on behalf of a supplier. They are also called Travel Advisors. They do not keep inventory in-hand unless they have pre-booked hotel rooms or cabins on a cruise ship for a group travel event such as a wedding, honeymoon, or other group event.', 2),
(30, 'Some short info for the company that sells buildings', '963147', 'Skopje', 'The Selling Building, also known as the Oregon National Building,[3][4] is a building located in downtown Portland, Oregon, listed on the National Register of Historic Places.[5] It was built in 1910 for Ben Selling & Associates, composed of Ben Selling and partners Charles Moore and Moses Blum.[6]\r\n\r\nIn 1967, when the Oregon National Life Company became a new, major tenant, the Selling Building was renamed the Oregon National Building.', 1),
(31, 'Short info of the company', '111111', 'Skopje', 'description of your company, something people should be aware of before they contact you', 1),
(32, 'Short info of the company', '111111', 'Skopje', 'description of your company, something people shoud be aware of before they contact you:', 1),
(33, 'Short info of the company', '111111', 'Skopje', 'description of your company, something people shoud be aware of before they contact you:', 1),
(34, 'This is the company that sells buildings', '963147', 'Skopje', 'This is the company that sells buildings LONG STORY', 1),
(35, 'House selling company', '852852 654984', 'Dallas, TX', 'The selling age is ........', 1),
(36, 'House selling company', '852852 654984', 'Dallas, TX', 'The selling age is ........', 1),
(37, 'House selling company', '852852 654984', 'Dallas, TX', 'The selling age is ........', 2),
(38, 'dfsgafg', '123', 'Skopje', 'fasgafg', 1),
(39, 'asfsadfd', '111111', 'Skopje', 'sdfdssdf', 1),
(40, 'asfsadfd', '111111', 'Skopje', 'sdfdssdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_banners`
--

CREATE TABLE `user_banners` (
  `user_id` int(11) DEFAULT NULL,
  `cover_img_url` text DEFAULT NULL,
  `main_title` varchar(256) DEFAULT NULL,
  `subtitle` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_banners`
--

INSERT INTO `user_banners` (`user_id`, `cover_img_url`, `main_title`, `subtitle`) VALUES
(27, 'https://www.telegraph.co.uk/content/dam/Travel/2018/September/El-Yunque-morning-mist-iStock-535499464.jpg', 'Jungle experience', 'Have the jungle time of your life!'),
(28, 'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/long-boat-docked-on-beach-in-krabi-thailand-summers-royalty-free-image-1622044679.jpg', 'What a place', 'Experience Bali like never before'),
(29, 'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/long-boat-docked-on-beach-in-krabi-thailand-summers-royalty-free-image-1622044679.jpg', 'What a place', 'Experience Bali like never before'),
(30, 'https://www.arch2o.com/wp-content/uploads/2017/05/Arch2O-5-buildings-by-world-famous-architects-that-have-experienced-serious-failures-1.jpg', 'Buildings for sale', 'Buy the best buildings'),
(31, 'https://www.arch2o.com/wp-content/uploads/2017/05/Arch2O-5-buildings-by-world-famous-architects-that-have-experienced-serious-failures-1.jpg', 'Buildings for sale', 'Buy the best buildings'),
(32, 'https://www.arch2o.com/wp-content/uploads/2017/05/Arch2O-5-buildings-by-world-famous-architects-that-have-experienced-serious-failures-1.jpg', 'Buildings for sale', 'Buy the best buildings'),
(33, 'https://www.arch2o.com/wp-content/uploads/2017/05/Arch2O-5-buildings-by-world-famous-architects-that-have-experienced-serious-failures-1.jpg', 'Buildings for sale', 'Buy the best buildings'),
(34, 'https://www.arch2o.com/wp-content/uploads/2017/05/Arch2O-5-buildings-by-world-famous-architects-that-have-experienced-serious-failures-1.jpg', 'Buildings for sale', 'Buy the best buildings'),
(35, 'https://images.adsttc.com/media/images/62de/d6a6/c8bb/b201/6567/7513/newsletter/houses-in-the-forest-architekturos-linija_16.jpg?1658771505', 'Houses for sale', 'Best houses for sale are here!'),
(36, 'https://images.adsttc.com/media/images/62de/d6a6/c8bb/b201/6567/7513/newsletter/houses-in-the-forest-architekturos-linija_16.jpg?1658771505', 'Houses for sale', 'Best houses for sale are here!'),
(37, 'https://images.adsttc.com/media/images/62de/d6a6/c8bb/b201/6567/7513/newsletter/houses-in-the-forest-architekturos-linija_16.jpg?1658771505', 'Houses for sale', 'Best houses for sale are here!'),
(38, 'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/long-boat-docked-on-beach-in-krabi-thailand-summers-royalty-free-image-1622044679.jpg', 'What a place', 'This is a subtitle'),
(39, 'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/long-boat-docked-on-beach-in-krabi-thailand-summers-royalty-free-image-1622044679.jpg', 'What a place', 'This is a subtitle'),
(40, 'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/long-boat-docked-on-beach-in-krabi-thailand-summers-royalty-free-image-1622044679.jpg', 'What a place', 'This is a subtitle');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business_descriptions`
--
ALTER TABLE `business_descriptions`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `business_types`
--
ALTER TABLE `business_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_networks`
--
ALTER TABLE `social_networks`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `business_type_id` (`business_type_id`);

--
-- Indexes for table `user_banners`
--
ALTER TABLE `user_banners`
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_types`
--
ALTER TABLE `business_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `business_descriptions`
--
ALTER TABLE `business_descriptions`
  ADD CONSTRAINT `business_descriptions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_networks`
--
ALTER TABLE `social_networks`
  ADD CONSTRAINT `social_networks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_info`
--
ALTER TABLE `users_info`
  ADD CONSTRAINT `users_info_ibfk_1` FOREIGN KEY (`business_type_id`) REFERENCES `business_types` (`id`);

--
-- Constraints for table `user_banners`
--
ALTER TABLE `user_banners`
  ADD CONSTRAINT `user_banners_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_info` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
