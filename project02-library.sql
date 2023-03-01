-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2023 at 09:34 AM
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
  `author_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `author_name`, `author_surname`, `author_CV`, `author_status`) VALUES
(1, 'Timothy', 'Knapman', 'Timothy Knapman\'s first book for Macmillan was Little Ogre\'s Surprise Supper, illustrated by Ben Cort and the topsy-turvy pop-up book Fantastical Flying Machines illustrated by Simon Wild. He is also the author of the popular Mungo series, illustrated by Adam Stower and Guess What I Found in Dragon Wood, illustrated by Gwen Millward. Also a playwright, Tim\'s work on various musicals, operas and plays has taken him all over the world. Timothy lives in Surrey.', 2),
(3, 'Ernest', 'Hemingway', 'Ernest Miller Hemingway (July 21, 1899 – July 2, 1961) was an American novelist, short-story writer, and journalist. His economical and understated style—which he termed the iceberg theory—had a strong influence on 20th-century fiction, while his adventurous lifestyle and public image brought him admiration from later generations. Hemingway produced most of his work between the mid-1920s and the mid-1950s, and he was awarded the 1954 Nobel Prize in Literature. He published seven novels, six short-story collections, and two nonfiction works. Three of his novels, four short-story collections, and three nonfiction works were published posthumously. Many of his works are considered classics of American literature.\nHemingway was raised in Oak Park, Illinois. After high school, he was a reporter for a few months for The Kansas City Star before leaving for the Italian Front to enlist as an ambulance driver in World War I. In 1918, he was seriously wounded and returned home. His wartime experiences formed the basis for his novel A Farewell to Arms (1929).\n\nIn 1921, he married Hadley Richardson, the first of four wives. They moved to Paris, where he worked as a foreign correspondent and fell under the influence of the modernist writers and artists of the 1920s\' \"Lost Generation\" expatriate community. Hemingway\'s debut novel The Sun Also Rises was published in 1926. He divorced Richardson in 1927, and married Pauline Pfeiffer. They divorced after he returned from the Spanish Civil War (1936–1939), which he covered as a journalist and which was the basis for his novel For Whom the Bell Tolls (1940). Martha Gellhorn became his third wife in 1940. He and Gellhorn separated after he met Mary Welsh in London during World War II. Hemingway was present with Allied troops as a journalist at the Normandy landings and the liberation of Paris.\n\nHe maintained permanent residences in Key West, Florida (in the 1930s) and in Cuba (in the 1940s and 1950s). He almost died in 1954 after two pl', 1),
(4, 'George', 'Orwell', 'Eric Arthur Blair, better known by his pen name George Orwell, was an English novelist, essayist, journalist, and critic. His work is characterized by lucid prose, social criticism, opposition to totalitarianism, and support of democratic socialism.\nOrwell produced literary criticism, poetry, fiction and polemical journalism. He is known for the allegorical novella Animal Farm (1945) and the dystopian novel Nineteen Eighty-Four (1949). His non-fiction works, including The Road to Wigan Pier (1937), documenting his experience of working-class life in the industrial north of England, and Homage to Catalonia (1938), an account of his experiences soldiering for the Republican faction of the Spanish Civil War (1936–1939), are as critically respected as his essays on politics, literature, language and culture.\nOrwell\'s work remains influential in popular culture and in political culture, and the adjective \"Orwellian\"—describing totalitarian and authoritarian social practices—is part of the English language, like many of his neologisms, such as \"Big Brother\", \"Thought Police\", \"Room 101\", \"Newspeak\", \"memory hole\", \"doublethink\", and \"thoughtcrime\".[3][4] In 2008, The Times ranked George Orwell second among \"The 50 greatest British writers since 1945\".', 1),
(5, 'Joanne', 'Rowling', 'Joanne Rowling CH OBE FRSL (/ˈroʊlɪŋ/ \"rolling\";[1] born 31 July 1965), also known by her pen name J. K. Rowling, is a British author, philanthropist, producer, and screenwriter. She wrote Harry Potter, a seven-volume children\'s fantasy series published from 1997 to 2007. The series has sold over 500 million copies, been translated into at least 70 languages, and spawned a global media franchise including films and video games. The Casual Vacancy (2012) was her first novel for adults. She writes Cormoran Strike, an ongoing crime fiction series, as Robert Galbraith.\nRowling concluded the Harry Potter series with Harry Potter and the Deathly Hallows (2007). The novels follow a boy called Harry Potter as he attends Hogwarts, a school for wizards, and battles Lord Voldemort. Death and the divide between good and evil are the central themes of the series. Its influences include: Bildungsroman (the coming-of-age genre), school stories, fairy tales, and Christian allegory. The series revived fantasy as a genre in the children\'s market, spawned a host of imitators, and inspired an active fandom. Critical reception has been more mixed. Many reviewers see Rowling\'s writing as conventional; some regard her portrayal of gender and social division as regressive. There were also religious debates over Harry Potter.', 1),
(6, 'John Ronald Ruel', 'Tolkien', 'John Ronald Reuel Tolkien CBE FRSL (/ˈruːl ˈtɒlkiːn/, ROOL TOL-keen;[a] 3 January 1892 – 2 September 1973) was an English writer and philologist. He was the author of the high fantasy works The Hobbit and The Lord of the Rings.\n\nFrom 1925 to 1945, Tolkien was the Rawlinson and Bosworth Professor of Anglo-Saxon and a Fellow of Pembroke College, both at the University of Oxford. He then moved within the same university to become the Merton Professor of English Language and Literature and Fellow of Merton College, and held these positions from 1945 until his retirement in 1959. Tolkien was a close friend of C. S. Lewis, a co-member of the informal literary discussion group The Inklings. He was appointed a Commander of the Order of the British Empire by Queen Elizabeth II on 28 March 1972.\n\nAfter Tolkien\'s death, his son Christopher published a series of works based on his father\'s extensive notes and unpublished manuscripts, including The Silmarillion. These, together with The Hobbit and The Lord of the Rings, form a connected body of tales, poems, fictional histories, invented languages, and literary essays about a fantasy world called Arda and, within it, Middle-earth. Between 1951 and 1955, Tolkien applied the term legendarium to the larger part of these writings.\n\nWhile many other authors had published works of fantasy before Tolkien, the great success of The Hobbit and The Lord of the Rings led directly to a popular resurgence of the genre. This has caused him to be popularly identified as the \"father\" of modern fantasy literature—or, more precisely, of high fantasy.', 1),
(7, 'Lav', 'Tolstoy', 'Count Lev Nikolayevich Tolstoy[note 1] (/ˈtoʊlstɔɪ, ˈtɒl-/;[2] Russian: Лев Николаевич Толстой,[note 2] IPA: [ˈlʲef nʲɪkɐˈla(j)ɪvʲɪtɕ tɐlˈstoj] (listen); 9 September [O.S. 28 August] 1828 – 20 November [O.S. 7 November] 1910), usually referred to in English as Leo Tolstoy, was a Russian writer who is regarded as one of the greatest authors of all time.[3] He received nominations for the Nobel Prize in Literature every year from 1902 to 1906 and for the Nobel Peace Prize in 1901, 1902, and 1909; the fact that he never won is a major controversy.[4][5][6][7]\n\nBorn to an aristocratic Russian family in 1828,[3] Tolstoy\'s notable works include the novels War and Peace (1869) and Anna Karenina (1878),[8] often cited as pinnacles of realist fiction.[3] He first achieved literary acclaim in his twenties with his semi-autobiographical trilogy, Childhood, Boyhood, and Youth (1852–1856), and Sevastopol Sketches (1855), based upon his experiences in the Crimean War. His fiction includes dozens of short stories and several novellas such as The Death of Ivan Ilyich (1886), Family Happiness (1859), \"After the Ball\" (1911), and Hadji Murad (1912). He also wrote plays and numerous philosophical essays.\n\nIn the 1870s, Tolstoy experienced a profound moral crisis, followed by what he regarded as an equally profound spiritual awakening, as outlined in his non-fiction work A Confession (1882). His literal interpretation of the ethical teachings of Jesus, centering on the Sermon on the Mount, caused him to become a fervent Christian anarchist and pacifist.[3] His ideas on nonviolent resistance, expressed in such works as The Kingdom of God Is Within You (1894), had a profound impact on such pivotal 20th-century figures as Mahatma Gandhi[9] and Martin Luther King Jr.[10] He also became a dedicated advocate of Georgism, the economic philosophy of Henry George, which he incorporated into his writing, particularly Resurrection (1899).', 1),
(8, 'Neil ', 'Gaiman', 'Neil Richard MacKinnon Gaiman[2] /ˈɡeɪmən/[3] (born Neil Richard Gaiman;[2] born 10 November 1960)[4] is an English author of short fiction, novels, comic books, graphic novels, nonfiction, audio theatre, and films. His works include the comic book series The Sandman and novels Stardust, American Gods, Coraline, and The Graveyard Book. He has won numerous awards, including the Hugo, Nebula, and Bram Stoker awards, as well as the Newbery and Carnegie medals. He is the first author to win both the Newbery and the Carnegie medals for the same work, The Graveyard Book (2008).[5][6] In 2013, The Ocean at the End of the Lane was voted Book of the Year in the British National Book Awards.[7] It was later adapted into a critically acclaimed stage play at the Royal National Theatre in London, England that The Independent called \"...theatre at its best\".', 1),
(9, 'Colleen ', 'Hoover', 'Colleen Hoover is the #1 New York Times bestselling author of twenty two novels and novellas. Hoover’s novels fall into the New Adult and Young Adult contemporary romance categories, as well as psychological thriller.   Colleen Hoover is published by Montlake Romance, Grand Central Publishing and Atria Books. Colleen also has several indie titles, including Heart Bones.  In 2015, Colleen’s novel CONFESS won the Goodreads Choice Award for Best Romance. That was followed up in 2016 with her latest title, It Ends With Us, also winning the Choice Award for Best Romance. In 2017, her title WITHOUT MERIT won best romance.  Her novel CONFESS has been filmed as a series by Awestruck and is available on Prime Video via Amazon and iTunes. Katie Leclerc and Ryan Cooper star in the series.', 1),
(10, 'Bonnie', 'Garmus', 'Bonnie Garmus is an American author and former copywriter.  Garmus is from Seattle.[1] She has worked as a copywriter and creative director in the US, and in Switzerland and Colombia.[1]  In 2022, her debut novel, Lessons in Chemistry was published.[2] The Guardian noted its \"polished, funny, thought-provoking story ... it\'s hard to believe it\'s a debut\".[2] The New York Times commented on its \"entertaining subplots and witty dialogue\".[3] As of January 2022, Lessons in Chemistry had been sold into 35 territories and has a television adaptation under way', 1),
(11, 'Jennette', 'McCurdy', 'Jennette Michelle Faye McCurdy (born June 26, 1992) is an American writer, director, podcaster, singer and former actress.[1][2] McCurdy\'s breakthrough role as Sam Puckett in the Nickelodeon sitcom iCarly (2007–2012) earned her various awards, including four Nickelodeon Kids\' Choice Awards. She reprised the character in the iCarly spin-off series Sam & Cat (2013–2014) before leaving Nickelodeon. McCurdy also appeared in the television series Malcolm in the Middle (2003–2005), Zoey 101 (2005), Lincoln Heights (2007), True Jackson, VP (2009–2010), and Victorious (2012). She produced, wrote, and starred in her own webseries, What\'s Next for Sarah? (2014), and led the science-fiction series Between (2015–2016).[3]  McCurdy independently released her debut single, \"So Close\", in 2009.[4] She released her debut EP, Not That Far Away, in 2010, followed in 2012 by the Jennette McCurdy EP and the Jennette McCurdy album. The lead single, \"Generation Love\", reached number 44 on the Billboard Hot Country Songs.[5]  In 2017, McCurdy quit acting and decided to pursue a career in writing and directing. In early 2020 she performed a one-woman show, I\'m Glad My Mom Died, in Los Angeles and New York City; further dates were canceled due to the COVID-19 pandemic. In 2020, she began hosting an interview podcast, Empty Inside.[6][7] In 2022, she released a well-reviewed and best-selling memoir, I\'m Glad My Mom Died, describing her career as a child star and the abusive behavior of her deceased mother', 1),
(12, 'Ana', 'Reyes', 'Ana Reyes has an MFA from Louisiana State University and a BA from the University of Massachusetts, Amherst. Her work has appeared in Bodega, Pear Noir!, The New Delta Review, and elsewhere. She lives in Los Angeles with her husband and teaches creative writing to older adults at Santa Monica College. The House in the Pines in her first novel.', 1),
(14, 'Alan', 'Gratz', 'Alan Gratz is the #1 New York Times bestselling author of nineteen novels and graphic novels for young readers, including Two Degrees, Captain America: The Ghost Army, Ground Zero, Refugee, Allies, Prisoner B-3087, and Ban This Book. A Knoxville, Tennessee native, Alan is now a full-time writer living in Asheville, North Carolina with his wife and daughter. Learn more about him online at www.alangratz.com.', 1),
(15, 'Jacqueline', 'Woodson', 'Jacqueline Woodson (born February 12, 1963) is an American writer of books for children and adolescents. She is best known for Miracle\'s Boys, and her Newbery Honor-winning titles Brown Girl Dreaming, After Tupac and D Foster, Feathers, and Show Way. After serving as the Young People\'s Poet Laureate from 2015 to 2017,[1] she was named the National Ambassador for Young People\'s Literature, by the Library of Congress, for 2018–19. She was named a MacArthur Fellow in 2020.', 1),
(16, 'Frank', 'Herbert', 'Franklin Patrick Herbert Jr. (October 8, 1920 – February 11, 1986) was an American science fiction author best known for the 1965 novel Dune and its five sequels. Though he became famous for his novels, he also wrote short stories and worked as a newspaper journalist, photographer, book reviewer, ecological consultant, and lecturer.\n\nThe Dune saga, set in the distant future, and taking place over millennia, explores complex themes, such as the long-term survival of the human species, human evolution, planetary science and ecology, and the intersection of religion, politics, economics and power in a future where humanity has long since developed interstellar travel and settled many thousands of worlds. Dune is the best-selling science fiction novel of all time,[3] and the entire series is considered to be among the classics of the genre', 1),
(17, 'Laurie', 'Frankel', 'Laurie Frankel is the New York Times bestselling, award-winning author of four novels. Her writing has also appeared in The New York Times, The Guardian, Publisher’s Weekly, People Magazine, Lit Hub, The Sydney Morning Herald, and other publications. She is the recipient of the Washington State Book Award and the Endeavor Award. Her novels have been translated into more than twenty-five languages and been optioned for film and TV. A former college professor, she now writes full-time in Seattle, Washington where she lives with her family and makes good soup.', 1);

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
  `book_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_title`, `author_id`, `category_id`, `publication_year`, `no_of_pages`, `book_image`, `created`, `book_status`) VALUES
(108, 'Lessons in Chemistry', '10', 27, 2022, 400, 'https://static.wixstatic.com/media/51f67a_ba070aede5314870a33587fb1923c0e4~mv2.jpg/v1/fill/w_269,h_425,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/51f67a_ba070aede5314870a33587fb1923c0e4~mv2.jpg', '2023-02-04 12:28:34', 1),
(109, 'Red at the Bone', '15', 9, 2019, 208, 'https://m.media-amazon.com/images/I/41cjbSYGRCL._SX316_BO1,204,203,200_.jpg', '2023-02-03 09:47:55', 1),
(111, 'All Your Perfects', '9', 19, 2018, 320, 'https://m.media-amazon.com/images/I/71WV8HvH6gL.jpg', '2023-02-04 17:26:26', 1),
(112, 'High-Opp', '16', 20, 2012, 198, 'https://m.media-amazon.com/images/I/41nZ7tZiEHL._SX322_BO1,204,203,200_.jpg', '2023-02-03 09:57:56', 1),
(113, 'The Atlas of Love', '17', 27, 2010, 331, 'https://www.lauriefrankel.net/uploads/3/0/8/4/30847815/new-atlas-cover_orig.jpg', '2023-02-04 11:03:12', 1),
(115, 'Fantasy Baseball', '14', 1, 2012, 336, 'https://www.alangratz.com/wp-content/uploads/2016/03/image_cover_fb_web-1.jpg', '2023-02-04 11:03:16', 1),
(117, 'The House in the Pines', '12', 9, 2023, 330, 'https://m.media-amazon.com/images/I/517t0JwN4GL.jpg', '2023-02-03 10:27:32', 1),
(123, 'The Sandman: Book One', '8', 9, 2022, 549, 'https://m.media-amazon.com/images/I/517zkmqE67L.jpg', '2023-02-04 16:42:37', 1),
(124, 'Hero of the Five Points: A Tor.Com Original', '14', 10, 2014, 57, 'https://m.media-amazon.com/images/I/51MU695uyFL.jpg', '2023-02-04 16:44:57', 1),
(125, 'Maybe Someday', '9', 27, 2014, 384, 'https://m.media-amazon.com/images/I/51g6ez+ML5L._SX320_BO1,204,203,200_.jpg', '2023-02-04 17:02:54', 1),
(126, 'Dune', '16', 20, 1965, 412, 'https://www.elnacional.cat/uploads/s1/16/77/49/94/dune-portada-cartone-foto-raig-verd-mai-mes.jpeg', '2023-02-04 16:56:21', 1),
(127, '1984 Nineteen Eighty-Four', '4', 20, 1949, 328, 'https://m.media-amazon.com/images/I/81kElPFJD9L.jpg', '2023-02-04 17:02:37', 1),
(128, 'Flying Lessons & Other Stories', '15', 27, 2001, 232, 'https://m.media-amazon.com/images/I/51g5f9vDgYL.jpg', '2023-02-04 17:00:18', 1),
(129, 'Layla', '9', 23, 2020, 303, 'https://m.media-amazon.com/images/I/51-0Oys+YYL._SX331_BO1,204,203,200_.jpg', '2023-02-04 17:08:24', 1),
(130, 'The Ocean at the End of the Lane', '8', 27, 2013, 259, 'https://m.media-amazon.com/images/I/41JRy1ZJx-L.jpg', '2023-02-04 17:09:07', 1),
(131, 'Animal Farm', '4', 8, 1945, 128, 'https://m.media-amazon.com/images/I/41f3ICwz-9L._SX324_BO1,204,203,200_.jpg', '2023-02-04 17:16:44', 1),
(132, 'Captain America: The Ghost Army', '14', 9, 2023, 179, 'https://www.alangratz.com/wp-content/uploads/2021/09/Ghost-Army-Cover-01-680x1006.jpg', '2023-02-04 17:13:55', 1),
(133, 'One Two Three', '17', 27, 2022, 416, 'https://m.media-amazon.com/images/I/81QwVrA1GGL._AC_UF700,800_QL80_.jpg', '2023-02-04 17:16:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `category_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category`, `category_status`) VALUES
(1, 'Adventure', 1),
(2, 'Classics', 1),
(3, 'Crime', 2),
(5, 'Fantasy', 1),
(6, 'Historical fiction', 1),
(8, 'Humour and satire', 1),
(9, 'Literary fiction', 1),
(10, 'Mystery', 1),
(11, 'Poetry', 1),
(19, 'Romance', 1),
(20, 'Science fiction', 1),
(23, 'Thrillers', 1),
(24, 'Autobiography and memoir', 1),
(25, 'Biography', 1),
(26, 'Essays', 1),
(27, 'Non-fiction novel', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `comment` varchar(1000) DEFAULT NULL,
  `comment_status` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `book_id`, `comment`, `comment_status`, `created`) VALUES
(65, 9, 112, 'Woow, what a book! I really liked it.', 1, '2023-02-04 17:44:38'),
(66, 9, 117, 'I loved the climax of the book!', 2, '2023-02-04 18:09:58'),
(67, 9, 108, 'Really easy to read.', 1, '2023-02-04 09:46:00'),
(68, 9, 109, 'Nice read', 1, '2023-02-05 19:13:27'),
(69, 9, 115, 'I recommend the book', 1, '2023-02-04 08:49:45'),
(70, 14, 126, 'great book!', 1, '2023-02-04 17:27:00'),
(71, 14, 111, 'wow', 1, '2023-02-05 19:13:39'),
(72, 14, 113, 'What a book to read', 3, '2023-02-07 08:34:12'),
(73, 10, 115, 'Nice book to read', 2, '2023-02-05 19:13:45'),
(78, 10, 113, 'New comment ', 1, '2023-02-05 19:07:14'),
(81, 10, 124, 'Comment', 3, '2023-02-05 19:46:23');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `note_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`note_id`, `user_id`, `book_id`, `note`) VALUES
(119, 9, 112, 'Note 1'),
(120, 9, 117, 'Really good'),
(121, 9, 108, 'Note 1'),
(122, 9, 108, 'Note 2'),
(123, 9, 109, 'Note 3'),
(125, 9, 115, 'Note 2'),
(126, 14, 126, 'hello'),
(127, 14, 111, 'wow'),
(128, 14, 111, 'page 202'),
(129, 10, 115, 'Note 1'),
(131, 10, 115, 'Note 3'),
(132, 10, 115, 'Note 4');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `status_id` int(11) NOT NULL,
  `status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`status_id`, `status`) VALUES
(1, 'ACTIVE'),
(2, 'DELETED'),
(3, 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `name`, `surname`) VALUES
(9, 'Jane@agoodcompany.com', '$2y$10$TaddwVxCFM9XAPEVY4U8TOfxUNOwKlPnSmHAABrRIXhLP048Dpzra', 'Jane', ' D Owe'),
(10, 'saso.dodevski.1@gmail.com', '$2y$10$AcjCLgzXR52cEWZeGRD3/.NFQgGoqY5VQnlhvYOa4iKLTUNEzrxwC', 'Sasho', 'Dodevski'),
(11, 'johny@somecompany.com', '$2y$10$u4seyDhYiNZSQw9KDqVqtegvBTbZdHR6LWtwtDgLMh059yAn8HUOK', 'Johny', 'Doe'),
(12, 'alice@sommail.com', '$2y$10$IY7S48L9pn9lFNsx03qJ0eaK5VGq1IuRGsSrGs3RLcKO1OzvKqTRi', 'Alice', 'Burton'),
(13, 'mike@rowe.com', '$2y$10$oGYQzurQkfVywdBxGXLFEuzL9M7Bd5XZYAgQlMrWZoBw9t0p/4eAy', 'Mike', 'Rowe'),
(14, 'test@yahoo.com', '$2y$10$kYUa/2dqKFprRbLoP7thaujTPwdT6ELqvZ1s3wCHm/sHAnKybTmra', 'Elena', 'Doe');

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
  ADD PRIMARY KEY (`author_id`),
  ADD KEY `author_status` (`author_status`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `category_status` (`category_status`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_status` (`comment_status`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`note_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id_notes` (`book_id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

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
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authors`
--
ALTER TABLE `authors`
  ADD CONSTRAINT `authors_ibfk_1` FOREIGN KEY (`author_status`) REFERENCES `statuses` (`status_id`);

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `book_status` FOREIGN KEY (`book_status`) REFERENCES `statuses` (`status_id`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `category_status` FOREIGN KEY (`category_status`) REFERENCES `statuses` (`status_id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `book_id` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_status` FOREIGN KEY (`comment_status`) REFERENCES `statuses` (`status_id`),
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`comment_status`) REFERENCES `statuses` (`status_id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `book_id_notes` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
