-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2018 at 03:13 PM
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
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `filename` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `downloads` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `namespi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `filename`, `author`, `title`, `description`, `location`, `downloads`, `size`, `namespi`, `created_at`, `updated_at`) VALUES
(5, 'pixastic-master.zip', 'theghost', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'usersdata/ce0abb2b343a4297e34faff5428edf3c/fc203d85e4c0299893746a2621b60cab.zip', 32, 1, 'Computer Science', '2018-08-24 10:01:55', '2018-08-24 10:01:55'),
(8, 'Croppie-2.6.2.zip', 'hichinf', 'a small test', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'usersdata/02fbeb95e6cd3f041dc9af21646cb404/fbad6036190e35ac7e337d56d8c04419.zip', 3000, 1, 'Computer Science', '2018-08-29 14:03:01', '2018-08-29 14:03:01'),
(12, '79bde4e9bc13f18774609716fdae10c6', 'hichinf', 'a test', 'small test', 'https://drive.google.com/open?id=1XhR2E7G4dJXTzBmYcM6prR7GY8', 1, 0, 'Computer Science', '2018-08-31 14:12:42', '2018-08-31 14:12:42'),
(13, 'dda5805d6fdbccf1a52daf2da9b07580', 'hichinf', 'a test', 'test', 'https://drive.google.com/open?id=1XhR2E7G4dJXTzBmYcM6prR7GY8ZAYnxp', 1, 0, 'Computer Science', '2018-08-31 14:17:22', '2018-08-31 14:17:22'),
(14, '435df0816acac7a5f7db3452e8b207e8', 'theghost', 'a test', 'test', 'https://drive.google.com/file/d/1XhR2E7G4dJXTzBmYcM6prR7GY8ZAYnxp', 0, 0, 'Computer Science', '2018-08-31 14:20:02', '2018-08-31 14:20:02');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `groupid` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `members` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `pmembers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `chat` int(11) NOT NULL,
  `key` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `groupid`, `admin`, `members`, `pmembers`, `type`, `chat`, `key`, `created_at`, `updated_at`) VALUES
(2, 'first group ever', 'group-29efb19356b7711e0e74b8d97fffc0b3', 'theghost', '', 'walidvirus,hichinf', 0, 1, 4300, '2018-09-12 08:35:59', '2018-09-12 08:35:59');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_07_26_143822_create_spicialitys-table', 1),
(4, '2018_07_28_214503_fileupload', 1),
(5, '2018_08_12_141632_notifications', 1),
(6, '2018_09_11_164720_groups', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `creator` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `seen` int(11) NOT NULL,
  `improfile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `creator`, `message`, `target`, `seen`, `improfile`, `created_at`, `updated_at`) VALUES
(1, 'walidvirus', '<a href=\"/walidvirus\">walidvirus</a> is following you follow him back', 'theghost', 1, 'uploads/default.png', '2018-09-11 16:38:58', '2018-09-11 16:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imgpath` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namespi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nfiles` int(11) NOT NULL,
  `tsize` int(11) NOT NULL,
  `gender` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `followers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `imgpath`, `namespi`, `status`, `code`, `type`, `nfiles`, `tsize`, `gender`, `bio`, `followers`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sofiane', 'khoudour', 'theghost', 'khoudoursofiane75@gmail.com', '$2y$10$QNSIh1zNurfxdFSv1kmsj.4G.hBa/bfPhbpCgd3KtAl4bIVhzC8c6', 'usersdata/ce0abb2b343a4297e34faff5428edf3c/ca797f5221abe99f5d2f6f73eedda6b4.jpg', 'Computer Science', 1, 9070, 'basic', 95, 95, 'male', 'A telecommunication engineer', 'hichinf,walidvirus', 'IasGz3LlkDRLRT86IGNHh0KuOIS1rJRw99KRUc2VcBwakOcFCl1v38QGXlhW', '2018-08-19 08:54:23', '2018-08-19 08:54:23'),
(2, 'Hichem', 'Merniz', 'hichinf', 's.kbrowser@gmail.com', '$2y$10$uocW462szaU.hTy9ICMSEe7DKLoFaJ3OwJvo1JWLHEPEgHKNicNQK', 'usersdata/196e9db0328d6b451ebcd418786ee4b7/53e65a3a6678b81fb5c7e9a09cba2e5a.jpg', 'Computer Science', 1, 4263, 'basic', 100, 100, 'male', '', 'walidvirus', 'xiuRaXkY4l625w4oU8LCUZpOr7Yp55SKZpjhOotMKdUx2ffKqMpXOdRdJ7L9', '2018-09-11 09:43:30', '2018-09-11 09:43:30'),
(3, 'walid', 'micili', 'walidvirus', 'aa@google.com', '$2y$10$9ru4YsdI.5f3HS07pgAEB.0y.Amzp3joNnmp6O2s8S66kEydQSO7G', 'uploads/default.png', 'default', 1, 6427, 'basic', 100, 100, 'male', '', '', 'jNB8PXgOw7xqLnyexVuSiCLZnQb59UHYGGheCSjR5AkcYw2D7Mkb5HmyvK1r', '2018-09-11 16:34:06', '2018-09-11 16:34:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `files_filename_unique` (`filename`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `spicialitys`
--
ALTER TABLE `spicialitys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `spicialitys_namespi_unique` (`namespi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `spicialitys`
--
ALTER TABLE `spicialitys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
