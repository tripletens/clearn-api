-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2020 at 01:51 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clearn_real`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faculty_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `image1`, `image2`, `image3`, `department_id`, `faculty_id`, `created_at`, `updated_at`) VALUES
(1, 'Python', 'pic1.jpg', 'pic2.jpg', 'pic3.jpg', '1', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_01_02_172358_create_posts_table', 1),
(5, '2020_01_03_191435_add_user_id_to_posts', 1),
(6, '2020_01_03_203250_add_video_to_posts', 1),
(7, '2020_02_12_032648_create_past_questions_table', 2),
(8, '2020_02_12_033354_create_courses_table', 2),
(9, '2020_02_12_033738_create_topics_table', 2),
(10, '2020_02_12_034727_create_faculty_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `past_questions`
--

CREATE TABLE `past_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topic_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `past_questions`
--

INSERT INTO `past_questions` (`id`, `title`, `course_id`, `topic_id`, `author_id`, `pdf`, `image1`, `image2`, `image3`, `created_at`, `updated_at`) VALUES
(3, NULL, '1', '1', '2', 'Kalu-Chinonso-cv_1582907850.pdf', 'Yearn invitation card_1582907848.jpg', 'pexels-photo-875514_1582907850.jpeg', 'adult-agency-business-380769_1582907850.jpg', '2020-02-28 15:37:30', '2020-02-28 15:37:30'),
(4, NULL, NULL, '2', '2', 'Coverletter_1582909001.pdf', 'IMG-20171227-WA0002_1582909001.jpg', 'IMG-20171226-WA0006_1582909001.jpg', 'IMG-20171226-WA0007_1582909001.jpg', '2020-02-28 15:56:41', '2020-02-28 15:56:41'),
(5, 'Test Tutorial Video', '1', '1', '2', 'Kalu-Chinonso-cv_1582910067.pdf', 'FB_IMG_15218159588842756_1582910067.jpg', 'FB_IMG_15218159673966476_1582910067.jpg', 'FB_IMG_15218159754579521_1582910067.jpg', '2020-02-28 16:14:27', '2020-02-28 16:14:27');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `created_at`, `updated_at`, `user_id`, `video`) VALUES
(11, 'Test Tutorial Video', 'This a cool video', '2020-02-27 22:12:29', '2020-02-27 22:12:29', 2, 'JSON Web Token (JWT) API Authentication_1582845149.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `title`, `course_id`, `department_id`, `image1`, `pdf`, `created_at`, `updated_at`) VALUES
(1, 'Introduction to Python', '1', '1', 'pic1.jpg', NULL, NULL, NULL),
(2, 'Introduction to Nonso', '1', '1', 'pic1.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kalu Chinonso', 'nonny@gmail.com', NULL, '$2y$10$5nnJPWGQwCCD5TqSEViOTu/6wPYwmT2V01j/oIBDcRR.8OellukpG', NULL, '2020-01-16 07:10:02', '2020-01-16 07:10:02'),
(2, 'John Mark', 'tripletens.kc@gmail.com', NULL, '$2y$10$JLds7U6pWmlr.2ZPE5XokOo0.raAlbcxMA05KYsjdnV2yr3jbLxW.', NULL, '2020-02-11 00:19:17', '2020-02-11 00:19:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `past_questions`
--
ALTER TABLE `past_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `past_questions`
--
ALTER TABLE `past_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
