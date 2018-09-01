-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2018 at 09:50 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db748051903`
--

-- --------------------------------------------------------

--
-- Table structure for table `spicialitys`
--

CREATE TABLE `spicialitys` (
  `id` int(10) UNSIGNED NOT NULL,
  `namespi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imspi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spicialitys`
--

INSERT INTO `spicialitys` (`id`, `namespi`, `imspi`, `created_at`, `updated_at`) VALUES
(1, 'Telecommunication', 'telecommunications.png', '2018-08-01 04:00:00', '2018-08-01 04:00:00'),
(2, 'Accounting', 'accounting.png', NULL, NULL),
(3, 'Arts and Humanities', 'art and humanities.png', NULL, NULL),
(4, 'Engineering', 'engineering.png', NULL, NULL),
(5, 'Health and Medical', 'health and medical.png', NULL, NULL),
(6, 'Law', 'law.png', NULL, NULL),
(7, 'Languages', 'language.png', NULL, NULL),
(8, 'Mathemathics ', 'mathematics.png', NULL, NULL),
(9, 'Physical and Life Sciences', 'physical and life science.png', NULL, NULL),
(10, 'Statistics', 'statistics.png', NULL, NULL),
(11, 'Teaching and Education', 'teaching and education.png', NULL, NULL),
(12, 'Computer Science', 'computer.png', NULL, NULL),
(13, 'Zoology and Wildlife Conservat', 'zoology.png', NULL, NULL),
(14, 'Psychology', 'psychologist.png', NULL, NULL),
(15, 'Nutrition', 'nutrition.png', NULL, NULL),
(16, 'History of Art, Archaeology, a', 'history.png', NULL, NULL),
(17, 'Geological Sciences', 'geologie.png', NULL, NULL),
(18, 'Chemistry and Chemical Biology', 'chemistry.png', NULL, NULL),
(19, 'Astronomy and Space Sciences', 'astronomy.png', NULL, NULL),
(20, 'Archaeology', 'Sociology.png', NULL, NULL),
(21, 'Pharmacology', 'Pharmacology.png', NULL, NULL),
(22, 'Sociology', 'Sociology.png', NULL, NULL),
(24, 'Microbiology', 'Microbiology.png', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `spicialitys`
--
ALTER TABLE `spicialitys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `spicialitys_namespi_unique` (`namespi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `spicialitys`
--
ALTER TABLE `spicialitys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
