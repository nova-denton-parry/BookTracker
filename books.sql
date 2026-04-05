-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 05, 2026 at 06:27 AM
-- Server version: 8.4.7
-- PHP Version: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `books`
--
CREATE DATABASE IF NOT EXISTS `books` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `books`;

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
CREATE TABLE IF NOT EXISTS `authors` (
  `author_id` int NOT NULL AUTO_INCREMENT,
  `author_name` varchar(100) NOT NULL,
  PRIMARY KEY (`author_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `author_name`) VALUES
(1, 'Mark Lawrence'),
(2, 'Stephen King'),
(3, 'Samantha Shannon'),
(4, 'Suzanne Collins'),
(10, 'Tamsyn Muir'),
(8, 'Lemony Snicket'),
(21, 'T. J. Klune'),
(22, 'Lemony Snicket'),
(20, 'Samantha Shannon');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `format` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `source` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `rating` int DEFAULT NULL,
  `comments` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`book_id`),
  KEY `books_author_fk` (`author`),
  KEY `books_formats_fk` (`format`),
  KEY `books_genre_fk` (`genre`),
  KEY `books_source_fk` (`source`),
  KEY `books_status_fk` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `title`, `author`, `genre`, `format`, `source`, `status`, `rating`, `comments`) VALUES
(24, 'The House in the Cerulean Sea', 'T. J. Klune', 'fantasy', 'physical book', 'physical copy owned', 'completed', 10, 'Beautifully written and heartwarming. it covers several emotionally difficult situations while tying them off nicely.'),
(2, 'Misery', 'Stephen King', 'horror', 'physical book', 'physical copy owned', 'completed', 7, 'realistic horror story focused on a serial killer who has kidnapped their idol'),
(3, 'The Book That Wouldn\'t Burn', 'Mark Lawrence', 'fantasy', 'audiobook', 'audible', 'completed', 9, 'similar to Red Sister with the dystopian sci-fi presented as fantasy because the characters in the world view the technology as magic due to lack of understanding. also utilizes the assumptions of the reader in an interesting way'),
(4, 'The Priory of the Orange Tree', 'Samantha Shannon', 'fantasy', 'physical book', 'library', 'completed', 10, 'an inclusive novel with impressive world-building and a complex plot. very long but worth the read'),
(5, 'Sunrise on the Reaping', 'Suzanne Collins', 'dystopian', 'audiobook', 'audible', 'completed', 8, 'a devastating prequel to the Hunger Games series'),
(12, 'The Book That Broke the World', 'Mark Lawrence', 'fantasy', 'audiobook', 'audible', 'completed', 8, 'Also very good'),
(16, 'The Bad Beginning', 'Lemony Snicket', 'youth fiction', 'physical book', 'physical copy owned', 'completed', 6, ''),
(21, 'Holy Sister', 'Mark Lawrence', 'fantasy', 'audiobook', 'audible', 'completed', 8, ''),
(17, 'Gideon the Ninth', 'Tamsyn Muir', 'science-fiction', 'audiobook', 'audible', 'completed', 9, ''),
(20, 'Grey Sister', 'Mark Lawrence', 'fantasy', 'audiobook', 'audible', 'completed', 8, '');

-- --------------------------------------------------------

--
-- Table structure for table `formats`
--

DROP TABLE IF EXISTS `formats`;
CREATE TABLE IF NOT EXISTS `formats` (
  `format_id` int NOT NULL AUTO_INCREMENT,
  `format_name` varchar(50) NOT NULL,
  PRIMARY KEY (`format_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `formats`
--

INSERT INTO `formats` (`format_id`, `format_name`) VALUES
(1, 'ebook'),
(3, 'audiobook'),
(4, 'physical book');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
CREATE TABLE IF NOT EXISTS `genres` (
  `genre_id` int NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(100) NOT NULL,
  PRIMARY KEY (`genre_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genre_id`, `genre_name`) VALUES
(1, 'general fiction'),
(2, 'fantasy'),
(3, 'science-fiction'),
(4, 'dystopian fiction'),
(5, 'romance'),
(6, 'non-fiction'),
(7, 'horror'),
(9, 'youth fiction');

-- --------------------------------------------------------

--
-- Table structure for table `sources`
--

DROP TABLE IF EXISTS `sources`;
CREATE TABLE IF NOT EXISTS `sources` (
  `source_id` int NOT NULL AUTO_INCREMENT,
  `source_name` varchar(100) NOT NULL,
  PRIMARY KEY (`source_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sources`
--

INSERT INTO `sources` (`source_id`, `source_name`) VALUES
(1, 'library'),
(2, 'physical copy owned'),
(3, 'audible');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
CREATE TABLE IF NOT EXISTS `statuses` (
  `status_id` int NOT NULL AUTO_INCREMENT,
  `status_name` varchar(50) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`status_id`, `status_name`) VALUES
(1, 'to read'),
(2, 'currently reading'),
(3, 'completed');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
