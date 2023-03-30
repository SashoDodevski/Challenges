-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2023 at 01:19 PM
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
-- Database: `movie_industry_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `agent_code_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`id`, `first_name`, `last_name`, `nickname`, `date_of_birth`, `agent_code_id`) VALUES
(1, 'Actor', 'One', '001', '1980-03-01', 1),
(2, 'Actor', 'Two', '002', '1980-03-02', 2),
(3, 'Actor', 'Three', '003', '1980-03-03', 3),
(4, 'Actor', 'Four', '004', '1980-03-04', 4),
(5, 'Actor', 'Five', '005', '1980-03-05', 5),
(6, 'Actor', 'Six', '006', '1980-03-06', 1),
(7, 'Actor', 'Seven', '007', '1980-03-07', 2),
(8, 'Actor', 'Eight', '008', '1980-03-08', 3),
(9, 'Actor', 'Nine', '009', '1980-03-09', 4),
(10, 'Actor', 'Ten', '010', '1980-03-10', 5),
(11, 'Actor', 'Eleven', '011', '2020-01-01', 1),
(12, 'Actor', 'Twelve', '012', '2020-01-01', 1),
(13, 'Actor', 'Thirteen', '013', '2020-01-01', 1),
(14, 'Actor', 'Fourteen', '014', '2020-01-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `actors_critics`
--

CREATE TABLE `actors_critics` (
  `actor_id` int(11) DEFAULT NULL,
  `critic_id` int(11) DEFAULT NULL,
  `film_id` int(11) DEFAULT NULL,
  `actors_acting` int(11) DEFAULT NULL,
  `actors_expression` int(11) DEFAULT NULL,
  `actors_naturalness` int(11) DEFAULT NULL,
  `actors_devotion` int(11) DEFAULT NULL,
  `average_grade` int(11) GENERATED ALWAYS AS ((`actors_acting` + `actors_expression` + `actors_naturalness` + `actors_devotion`) / 4) VIRTUAL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actors_critics`
--

INSERT INTO `actors_critics` (`actor_id`, `critic_id`, `film_id`, `actors_acting`, `actors_expression`, `actors_naturalness`, `actors_devotion`) VALUES
(1, 1, 6, 4, 5, 4, 5),
(2, 2, 7, 5, 5, 4, 5),
(3, 3, 8, 3, 4, 4, 5),
(4, 4, 9, 2, 3, 3, 5),
(5, 5, 10, 3, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `actors_movies`
--

CREATE TABLE `actors_movies` (
  `actor_id` int(11) DEFAULT NULL,
  `movie_id` int(11) DEFAULT NULL,
  `actor_salary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actors_movies`
--

INSERT INTO `actors_movies` (`actor_id`, `movie_id`, `actor_salary`) VALUES
(1, 1, 1000),
(2, 2, 2000),
(3, 3, 3000),
(4, 4, 4000),
(5, 5, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `agents_codes`
--

CREATE TABLE `agents_codes` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agents_codes`
--

INSERT INTO `agents_codes` (`id`, `first_name`, `last_name`) VALUES
(1, 'Agent', 'One'),
(2, 'Agent', 'Two'),
(3, 'Agent', 'Three'),
(4, 'Agent', 'Four'),
(5, 'Agent', 'Five');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`) VALUES
(1, 'Country 1'),
(2, 'Country 2'),
(3, 'Country 3'),
(4, 'Country 4'),
(5, 'Country 5');

-- --------------------------------------------------------

--
-- Table structure for table `critics`
--

CREATE TABLE `critics` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `critics`
--

INSERT INTO `critics` (`id`, `first_name`, `last_name`, `username`, `password`) VALUES
(1, 'Critic', 'One', 'CriticOne', 'passwordOne'),
(2, 'Critic', 'Two', 'CriticTwo', 'passwordTwo'),
(3, 'Critic', 'Three', 'CriticThree', 'passwordThree'),
(4, 'Critic', 'Four', 'CriticFour', 'passwordFour'),
(5, 'Critic', 'Five', 'CriticFive', 'passworFive');

-- --------------------------------------------------------

--
-- Table structure for table `critics_films`
--

CREATE TABLE `critics_films` (
  `critic_id` int(11) DEFAULT NULL,
  `film_id` int(11) DEFAULT NULL,
  `critics_rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `critics_films`
--

INSERT INTO `critics_films` (`critic_id`, `film_id`, `critics_rating`) VALUES
(1, 6, 10),
(2, 7, 9),
(3, 8, 8),
(4, 9, 7),
(5, 10, 6);

-- --------------------------------------------------------

--
-- Table structure for table `directors`
--

CREATE TABLE `directors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `movie_genre` int(11) DEFAULT NULL,
  `expertise` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `directors`
--

INSERT INTO `directors` (`id`, `first_name`, `last_name`, `movie_genre`, `expertise`) VALUES
(1, 'Director', 'One', 1, 'Very good on type 1 movies'),
(2, 'Director', 'Two', 2, 'Very good on type 2 movies'),
(3, 'Director', 'Three', 3, 'Very good on type 3 movies'),
(4, 'Director', 'Four', 4, 'Very good on type 4 movies'),
(5, 'Director', 'Five', 5, 'Very good on type 5 movies');

-- --------------------------------------------------------

--
-- Table structure for table `directors_salaries`
--

CREATE TABLE `directors_salaries` (
  `director_id` int(11) DEFAULT NULL,
  `film_id` int(11) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `directors_salaries`
--

INSERT INTO `directors_salaries` (`director_id`, `film_id`, `salary`) VALUES
(1, 6, 1000),
(2, 7, 2000),
(3, 8, 3000),
(4, 9, 4000),
(5, 10, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) DEFAULT NULL,
  `city_of_premiere` varchar(255) DEFAULT NULL,
  `first_week_of_premiere_income` int(11) DEFAULT NULL,
  `premiere_format_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `movie_id`, `city_of_premiere`, `first_week_of_premiere_income`, `premiere_format_id`) VALUES
(6, 1, 'City One', 1000, 1),
(7, 2, 'City Two', 2000, 2),
(8, 4, 'City Three', 3000, 1),
(9, 5, 'City Four', 4000, 2),
(10, 7, 'City Five', 5000, 2),
(11, 8, 'City Six', 6000, 2),
(12, 10, 'City Seven', 7000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `movie_type_id` int(11) DEFAULT NULL,
  `movie_name` varchar(255) DEFAULT NULL,
  `premiere_date` date DEFAULT NULL,
  `genre_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `name_of_production` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `movie_type_id`, `movie_name`, `premiere_date`, `genre_id`, `country_id`, `name_of_production`) VALUES
(1, 1, 'Film 1', '2021-05-20', 1, 3, 'Production One'),
(2, 1, 'Film 2', '2022-07-15', 3, 5, 'Production Awesome'),
(3, 2, 'TV Serie One', '2022-01-06', 4, 1, 'Production Something'),
(4, 1, 'Film 3', '2020-10-21', 1, 4, 'Production Rabbit'),
(5, 1, 'Film 4', '2022-01-03', 5, 3, 'Production House'),
(6, 2, 'TV Serie Two', '2021-10-30', 2, 2, 'Production Two'),
(7, 1, 'Film Five', '2022-02-18', 4, 2, 'Production production'),
(8, 1, 'Film Six', '2021-09-15', 1, 1, 'Production for Movies'),
(9, 2, 'TV Serie Three', '2020-04-04', 2, 1, 'Production for series'),
(10, 1, 'Film Seven', '2022-11-27', 4, 3, 'Production House'),
(11, 2, 'Serie Four', '2020-10-10', 5, 1, 'Production Some'),
(12, 2, 'Serie Five', '2021-11-11', 4, 2, 'Production Just');

-- --------------------------------------------------------

--
-- Table structure for table `movie_genres`
--

CREATE TABLE `movie_genres` (
  `id` int(11) NOT NULL,
  `genre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie_genres`
--

INSERT INTO `movie_genres` (`id`, `genre`) VALUES
(1, 'comedy'),
(2, 'drama'),
(3, 'thriller'),
(4, 'adventure'),
(5, 'science fiction');

-- --------------------------------------------------------

--
-- Table structure for table `movie_types`
--

CREATE TABLE `movie_types` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie_types`
--

INSERT INTO `movie_types` (`id`, `type`) VALUES
(1, 'films'),
(2, 'tv series');

-- --------------------------------------------------------

--
-- Table structure for table `oscar_winners`
--

CREATE TABLE `oscar_winners` (
  `actor_id` int(11) DEFAULT NULL,
  `film_id` int(11) DEFAULT NULL,
  `film_role` varchar(255) DEFAULT NULL,
  `year` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `oscar_winners`
--

INSERT INTO `oscar_winners` (`actor_id`, `film_id`, `film_role`, `year`) VALUES
(1, 6, 'Johny', 2021),
(2, 7, 'Jane', 2022),
(3, 8, 'James', 2020),
(4, 9, 'Jaqueline', 2022),
(5, 10, 'Jack', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `premiere_formats`
--

CREATE TABLE `premiere_formats` (
  `id` int(11) NOT NULL,
  `format` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `premiere_formats`
--

INSERT INTO `premiere_formats` (`id`, `format`) VALUES
(1, '2D'),
(2, '3D');

-- --------------------------------------------------------

--
-- Table structure for table `sequels`
--

CREATE TABLE `sequels` (
  `sequel_film_id` int(11) DEFAULT NULL,
  `film_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sequels`
--

INSERT INTO `sequels` (`sequel_film_id`, `film_id`) VALUES
(11, 10),
(10, 9),
(9, 8),
(8, 7),
(7, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tv_series`
--

CREATE TABLE `tv_series` (
  `movie_id` int(11) DEFAULT NULL,
  `tv_channel_premiere` varchar(255) DEFAULT NULL,
  `episodes` int(11) DEFAULT NULL,
  `expected_seasons` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tv_series`
--

INSERT INTO `tv_series` (`movie_id`, `tv_channel_premiere`, `episodes`, `expected_seasons`) VALUES
(3, 'Channel 1', 30, 2),
(6, 'Channel 2', 60, 4),
(9, 'Channel 3', 40, 1),
(11, 'Channel 4', 50, 4),
(12, 'Channel 5', 70, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agent_code_id` (`agent_code_id`);

--
-- Indexes for table `actors_critics`
--
ALTER TABLE `actors_critics`
  ADD KEY `actor_id` (`actor_id`),
  ADD KEY `critic_id` (`critic_id`),
  ADD KEY `film_id` (`film_id`);

--
-- Indexes for table `actors_movies`
--
ALTER TABLE `actors_movies`
  ADD KEY `actor_id` (`actor_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `agents_codes`
--
ALTER TABLE `agents_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `critics`
--
ALTER TABLE `critics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `critics_films`
--
ALTER TABLE `critics_films`
  ADD KEY `critic_id` (`critic_id`),
  ADD KEY `film_id` (`film_id`);

--
-- Indexes for table `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_genre` (`movie_genre`);

--
-- Indexes for table `directors_salaries`
--
ALTER TABLE `directors_salaries`
  ADD KEY `director_id` (`director_id`),
  ADD KEY `film_id` (`film_id`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `premiere_format_id` (`premiere_format_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `movie_type_id` (`movie_type_id`);

--
-- Indexes for table `movie_genres`
--
ALTER TABLE `movie_genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_types`
--
ALTER TABLE `movie_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oscar_winners`
--
ALTER TABLE `oscar_winners`
  ADD KEY `actor_id` (`actor_id`),
  ADD KEY `film_id` (`film_id`);

--
-- Indexes for table `premiere_formats`
--
ALTER TABLE `premiere_formats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sequels`
--
ALTER TABLE `sequels`
  ADD KEY `sequel_film_id` (`sequel_film_id`),
  ADD KEY `film_id` (`film_id`);

--
-- Indexes for table `tv_series`
--
ALTER TABLE `tv_series`
  ADD KEY `movie_id` (`movie_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `agents_codes`
--
ALTER TABLE `agents_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `critics`
--
ALTER TABLE `critics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `directors`
--
ALTER TABLE `directors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `movie_genres`
--
ALTER TABLE `movie_genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `movie_types`
--
ALTER TABLE `movie_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `premiere_formats`
--
ALTER TABLE `premiere_formats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actors`
--
ALTER TABLE `actors`
  ADD CONSTRAINT `actors_ibfk_1` FOREIGN KEY (`agent_code_id`) REFERENCES `agents_codes` (`id`);

--
-- Constraints for table `actors_critics`
--
ALTER TABLE `actors_critics`
  ADD CONSTRAINT `actors_critics_ibfk_1` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`),
  ADD CONSTRAINT `actors_critics_ibfk_2` FOREIGN KEY (`critic_id`) REFERENCES `critics` (`id`),
  ADD CONSTRAINT `actors_critics_ibfk_3` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`);

--
-- Constraints for table `actors_movies`
--
ALTER TABLE `actors_movies`
  ADD CONSTRAINT `actors_movies_ibfk_1` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`),
  ADD CONSTRAINT `actors_movies_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`);

--
-- Constraints for table `critics_films`
--
ALTER TABLE `critics_films`
  ADD CONSTRAINT `critics_films_ibfk_1` FOREIGN KEY (`critic_id`) REFERENCES `critics` (`id`),
  ADD CONSTRAINT `critics_films_ibfk_2` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`);

--
-- Constraints for table `directors`
--
ALTER TABLE `directors`
  ADD CONSTRAINT `directors_ibfk_1` FOREIGN KEY (`movie_genre`) REFERENCES `movie_genres` (`id`);

--
-- Constraints for table `directors_salaries`
--
ALTER TABLE `directors_salaries`
  ADD CONSTRAINT `directors_salaries_ibfk_1` FOREIGN KEY (`director_id`) REFERENCES `directors` (`id`),
  ADD CONSTRAINT `directors_salaries_ibfk_2` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`);

--
-- Constraints for table `films`
--
ALTER TABLE `films`
  ADD CONSTRAINT `films_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `films_ibfk_2` FOREIGN KEY (`premiere_format_id`) REFERENCES `premiere_formats` (`id`);

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `movie_genres` (`id`),
  ADD CONSTRAINT `movies_ibfk_3` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `movies_ibfk_4` FOREIGN KEY (`movie_type_id`) REFERENCES `movie_types` (`id`);

--
-- Constraints for table `oscar_winners`
--
ALTER TABLE `oscar_winners`
  ADD CONSTRAINT `oscar_winners_ibfk_1` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`),
  ADD CONSTRAINT `oscar_winners_ibfk_2` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`);

--
-- Constraints for table `sequels`
--
ALTER TABLE `sequels`
  ADD CONSTRAINT `sequels_ibfk_1` FOREIGN KEY (`sequel_film_id`) REFERENCES `films` (`id`),
  ADD CONSTRAINT `sequels_ibfk_2` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`);

--
-- Constraints for table `tv_series`
--
ALTER TABLE `tv_series`
  ADD CONSTRAINT `tv_series_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
