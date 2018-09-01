-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Host: db748051903.db.1and1.com
-- Generation Time: Sep 01, 2018 at 01:53 PM
-- Server version: 5.5.60-0+deb7u1-log
-- PHP Version: 5.4.45-0+deb7u14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db748051903`
--

-- --------------------------------------------------------

--
-- Table structure for table `spicialitys`
--

CREATE TABLE IF NOT EXISTS `spicialitys` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `namespi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `spicialitys_namespi_unique` (`namespi`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `spicialitys`
--

INSERT INTO `spicialitys` (`id`, `namespi`, `created_at`, `updated_at`) VALUES
(1, 'Telecommunication', '2018-08-01 04:00:00', '2018-08-01 04:00:00'),
(2, 'Accounting', NULL, NULL),
(3, 'Arts and Humanities', NULL, NULL),
(4, 'Engineering', NULL, NULL),
(5, 'Health and Medical', NULL, NULL),
(6, 'Law', NULL, NULL),
(7, 'Languages', NULL, NULL),
(8, 'Mathemathics ', NULL, NULL),
(9, 'Physical and Life Sciences', NULL, NULL),
(10, 'Statistics', NULL, NULL),
(11, 'Teaching and Education', NULL, NULL),
(12, 'Computer Science', NULL, NULL),
(13, 'Zoology and Wildlife Conservat', NULL, NULL),
(14, 'Psychology', NULL, NULL),
(15, 'Nutrition', NULL, NULL),
(16, 'History of Art, Archaeology, a', NULL, NULL),
(17, 'Geological Sciences', NULL, NULL),
(18, 'Chemistry and Chemical Biology', NULL, NULL),
(19, 'Astronomy and Space Sciences', NULL, NULL),
(20, 'Archaeology', NULL, NULL),
(21, 'Pharmacology', NULL, NULL),
(22, 'Sociology', NULL, NULL),
(24, 'Microbiology', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
