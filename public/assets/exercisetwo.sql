-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2024 at 02:55 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exercisetwo`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `classdate` date NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `attcode` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `classdate`, `post_id`, `attcode`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2023-12-18', 2, 'EFG', 1, '2023-12-16 12:01:36', '2023-12-16 12:01:36'),
(2, '2023-12-16', 2, 'EFG', 2, '2023-12-16 12:02:15', '2023-12-16 12:02:15'),
(3, '2023-12-16', 2, 'EFG', 3, '2023-12-16 12:02:58', '2023-12-16 12:02:58'),
(4, '2023-12-16', 2, 'EFG', 4, '2023-12-16 12:03:43', '2023-12-16 12:03:43'),
(5, '2024-01-03', 4, 'EE', 2, '2024-01-03 01:16:02', '2024-01-03 01:16:02');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `user_id`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'test 1', 'test-1', 1, 3, '2024-01-12 09:17:36', '2024-01-12 09:17:36'),
(2, 'test 2', 'test-2', 1, 3, '2024-01-12 09:18:01', '2024-01-12 09:18:01'),
(3, 'test 3', 'test-3', 1, 3, '2024-01-12 09:18:09', '2024-01-12 09:18:09');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `slug`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Yangon', 'yangon', 1, '2023-12-09 10:57:58', '2023-12-09 10:57:58'),
(2, 'Mandalay', 'mandalay', 1, '2023-12-09 10:58:05', '2023-12-09 10:58:05'),
(3, 'Mawlamying', 'mawlamying', 1, '2023-12-09 10:58:14', '2023-12-09 10:58:14');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `commentable_id` bigint(20) UNSIGNED NOT NULL,
  `commentable_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `description`, `user_id`, `commentable_id`, `commentable_type`, `created_at`, `updated_at`) VALUES
(1, 'Hello Nice Class 1', 1, 2, 'App\\Models\\Post', '2023-12-09 11:01:54', '2023-12-09 11:01:54'),
(2, 'Hello Nice Class 2', 1, 2, 'App\\Models\\Post', '2023-12-09 11:02:06', '2023-12-09 11:02:06');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `relative_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `firstname`, `lastname`, `birthday`, `relative_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Aung', 'Kyaw', '2024-01-01', 4, 1, '2024-01-14 13:02:59', '2024-01-14 13:02:59'),
(2, 'Zaw', 'Myo', '2024-01-16', 0, 1, '2024-01-14 13:05:58', '2024-01-17 01:08:16'),
(5, 'Hla', 'Hla', '2024-01-16', 8, 1, '2024-01-17 01:09:59', '2024-01-17 01:09:59'),
(6, 'Myo', 'Myo', '2024-01-16', 6, 1, '2024-01-17 01:10:36', '2024-01-17 01:10:36'),
(7, 'Hla', 'Maung', NULL, 12, 1, '2024-01-17 01:13:59', '2024-01-17 01:13:59'),
(8, 'Myo', 'Ko', NULL, 13, 1, '2024-01-17 01:14:08', '2024-01-17 01:14:08'),
(9, 'Myint', 'Myint', NULL, 0, 1, '2024-01-17 01:14:17', '2024-01-17 01:14:17'),
(10, 'Zaw', 'Myo', '2024-01-17', 12, 1, '2024-01-17 01:14:41', '2024-01-17 01:14:41'),
(11, 'Kyaw', 'Myint', '2024-01-10', 0, 1, '2024-01-17 01:15:06', '2024-01-17 01:15:06'),
(12, 'Hla Maung', 'Ko', '2024-01-15', 10, 1, '2024-01-17 01:15:20', '2024-01-17 01:15:20'),
(13, 'Hla Myo', 'Hlaing', NULL, 9, 1, '2024-01-17 01:40:29', '2024-01-17 01:40:29'),
(14, 'Myo', 'Hlaing Kyaw', '2024-01-09', 9, 1, '2024-01-17 01:40:59', '2024-01-17 01:40:59'),
(15, 'Tun', 'Kyaw', '2024-01-09', 9, 1, '2024-01-17 01:41:13', '2024-01-17 01:41:13'),
(16, 'Thu', 'Zar', '2024-01-16', 9, 1, '2024-01-17 01:41:27', '2024-01-17 01:41:27'),
(17, 'Hnin Hnin', 'Khaing', '2024-01-15', 9, 1, '2024-01-17 01:41:45', '2024-01-17 01:41:45'),
(18, 'Hla Myint', 'Maung', '2024-01-10', 9, 1, '2024-01-17 01:41:58', '2024-01-17 01:41:58');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `slug`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Myanmar', 'myanmar', 1, '2023-12-09 10:58:31', '2023-12-09 10:58:31'),
(2, 'Thailand', 'thailand', 1, '2023-12-09 10:58:39', '2024-01-09 08:43:24'),
(3, 'Indonesia', 'indonesia', 1, '2023-12-09 10:58:50', '2023-12-09 10:58:50');

-- --------------------------------------------------------

--
-- Table structure for table `dayables`
--

CREATE TABLE `dayables` (
  `day_id` int(11) NOT NULL,
  `dayable_id` int(11) NOT NULL,
  `dayable_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dayables`
--

INSERT INTO `dayables` (`day_id`, `dayable_id`, `dayable_type`) VALUES
(2, 1, 'App\\Models\\Post'),
(3, 1, 'App\\Models\\Post'),
(1, 2, 'App\\Models\\Post'),
(2, 2, 'App\\Models\\Post'),
(3, 2, 'App\\Models\\Post'),
(4, 2, 'App\\Models\\Post'),
(6, 2, 'App\\Models\\Post'),
(1, 3, 'App\\Models\\Post'),
(2, 3, 'App\\Models\\Post'),
(4, 3, 'App\\Models\\Post'),
(7, 3, 'App\\Models\\Post'),
(1, 4, 'App\\Models\\Post'),
(2, 4, 'App\\Models\\Post'),
(3, 4, 'App\\Models\\Post'),
(4, 4, 'App\\Models\\Post'),
(5, 4, 'App\\Models\\Post'),
(6, 4, 'App\\Models\\Post'),
(7, 4, 'App\\Models\\Post');

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `name`, `slug`, `status_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Sunday', 'sunday', 3, 1, '2023-12-09 10:54:10', '2023-12-09 10:54:10'),
(2, 'Monday', 'monday', 3, 1, '2023-12-09 10:54:17', '2023-12-09 10:54:17'),
(3, 'Tuesday', 'tuesday', 3, 1, '2023-12-09 10:54:35', '2023-12-09 10:54:35'),
(4, 'Wednesday', 'wednesday', 3, 1, '2023-12-09 10:54:45', '2023-12-09 10:54:45'),
(5, 'Thursday', 'thursday', 3, 1, '2023-12-09 10:54:55', '2023-12-09 10:54:55'),
(6, 'Friday', 'friday', 3, 1, '2023-12-09 10:55:03', '2023-12-09 10:55:03'),
(7, 'Saturday', 'saturday', 3, 1, '2023-12-09 10:55:11', '2023-12-09 10:55:11');

-- --------------------------------------------------------

--
-- Table structure for table `edulinks`
--

CREATE TABLE `edulinks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `classdate` date NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `edulinks`
--

INSERT INTO `edulinks` (`id`, `classdate`, `post_id`, `url`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2024-01-01', 1, 'https://www.mediafire.com/file/y30la0qm6n43zq7/12Nov2022MYSQL2.mp4', 1, '2024-01-12 12:18:17', '2024-01-12 12:18:17'),
(2, '2024-01-02', 2, 'https://www.mediafire.com/file/y30la0qm6n43zq7/12Nov2022MYSQL2.mp4', 1, '2024-01-12 12:51:32', '2024-01-12 12:51:32'),
(3, '2024-01-03', 3, 'https://www.mediafire.com/file/y30la0qm6n43zq7/12Nov2022MYSQL2.mp4', 1, '2024-01-12 12:51:41', '2024-01-12 12:51:41'),
(4, '2024-01-04', 4, 'https://www.mediafire.com/file/y30la0qm6n43zq7/12Nov2022MYSQL2.mp4', 1, '2024-01-12 12:51:48', '2024-01-12 12:51:48'),
(5, '2024-01-05', 4, 'https://www.mediafire.com/file/y30la0qm6n43zq7/12Nov2022MYSQL2.mp4', 1, '2024-01-12 12:52:08', '2024-01-12 12:52:08'),
(6, '2024-01-06', 1, 'https://www.mediafire.com/file/y30la0qm6n43zq7/12Nov2022MYSQL2.mp4', 1, '2024-01-12 12:52:16', '2024-01-12 12:52:16'),
(7, '2024-01-07', 4, 'https://www.mediafire.com/file/y30la0qm6n43zq7/12Nov2022MYSQL2.mp4', 1, '2024-01-12 12:52:25', '2024-01-12 12:52:25'),
(8, '2024-01-08', 4, 'https://www.mediafire.com/file/y30la0qm6n43zq7/12Nov2022MYSQL2.mp4', 1, '2024-01-12 12:52:33', '2024-01-12 12:52:33'),
(9, '2024-01-09', 1, 'https://www.mediafire.com/file/y30la0qm6n43zq7/12Nov2022MYSQL2.mp4', 1, '2024-01-12 12:52:38', '2024-01-12 12:52:38'),
(10, '2024-01-10', 4, 'https://www.mediafire.com/file/y30la0qm6n43zq7/12Nov2022MYSQL2.mp4', 1, '2024-01-12 12:52:45', '2024-01-12 12:52:45'),
(11, '2024-01-11', 2, 'https://www.mediafire.com/file/y30la0qm6n43zq7/12Nov2022MYSQL2.mp4', 1, '2024-01-12 12:52:53', '2024-01-12 12:52:53'),
(12, '2024-01-12', 2, 'https://www.mediafire.com/file/y30la0qm6n43zq7/12Nov2022MYSQL2.mp4', 1, '2024-01-12 12:53:03', '2024-01-12 12:53:03'),
(13, '2024-01-13', 3, 'https://www.mediafire.com/file/y30la0qm6n43zq7/12Nov2022MYSQL2.mp4', 1, '2024-01-12 12:53:11', '2024-01-12 12:53:11'),
(14, '2024-01-14', 4, 'https://www.mediafire.com/file/y30la0qm6n43zq7/12Nov2022MYSQL2.mp4', 1, '2024-01-12 12:53:23', '2024-01-12 12:53:23'),
(15, '2024-01-15', 3, 'https://www.mediafire.com/file/y30la0qm6n43zq7/12Nov2022MYSQL2.mp4', 1, '2024-01-12 12:53:34', '2024-01-12 12:53:34'),
(16, '2024-01-05', 3, 'https://www.mediafire.com/file/y30la0qm6n43zq7/12Nov2022MYSQL2.mp4', 1, '2024-01-12 12:53:47', '2024-01-12 12:53:47'),
(17, '2024-01-15', 3, 'https://www.mediafire.com/file/y30la0qm6n43zq7/12Nov2022MYSQL2.mp4', 1, '2024-01-12 12:53:58', '2024-01-12 12:53:58'),
(18, '2024-01-10', 2, 'https://www.mediafire.com/file/y30la0qm6n43zq7/12Nov2022MYSQL2.mp4', 1, '2024-01-12 12:54:19', '2024-01-12 12:54:19'),
(19, '2024-01-10', 2, 'https://www.mediafire.com/file/y30la0qm6n43zq7/12Nov2022MYSQL2.mp4', 1, '2024-01-12 12:54:24', '2024-01-12 12:54:24'),
(20, '2024-01-02', 3, 'https://www.mediafire.com/file/y30la0qm6n43zq7/12Nov2022MYSQL2.mp4', 1, '2024-01-12 12:54:31', '2024-01-12 12:54:31'),
(21, '2024-01-08', 2, 'https://www.mediafire.com/file/y30la0qm6n43zq7/12Nov2022MYSQL2.mp4', 1, '2024-01-12 12:54:45', '2024-01-12 12:54:45'),
(22, '2024-01-03', 4, 'https://www.mediafire.com/file/y30la0qm6n43zq7/12Nov2022MYSQL2.mp4', 1, '2024-01-12 12:54:52', '2024-01-12 12:54:52'),
(23, '2024-01-04', 4, 'https://www.mediafire.com/file/y30la0qm6n43zq7/12Nov2022MYSQL2.mp4', 1, '2024-01-12 12:54:59', '2024-01-12 12:54:59'),
(24, '2024-01-09', 1, 'https://www.mediafire.com/file/y30la0qm6n43zq7/12Nov2022MYSQL2.mp4', 1, '2024-01-12 12:55:06', '2024-01-12 12:55:06'),
(25, '2024-01-09', 3, 'https://www.mediafire.com/file/y30la0qm6n43zq7/12Nov2022MYSQL2.mp4', 1, '2024-01-12 12:55:18', '2024-01-12 12:55:18'),
(26, '2024-01-10', 4, 'https://www.mediafire.com/file/y30la0qm6n43zq7/12Nov2022MYSQL2.mp4', 1, '2024-01-12 12:55:48', '2024-01-13 14:16:27'),
(27, '2024-01-06', 3, 'https://www.mediafire.com/file/y30la0qm6n43zq7/12Nov2022MYSQL2.mp4', 1, '2024-01-12 12:55:57', '2024-01-12 12:55:57'),
(28, '2024-01-08', 4, 'https://www.mediafire.com/file/y30la0qm6n43zq7/12Nov2022MYSQL2.mp4', 1, '2024-01-12 12:56:03', '2024-01-13 14:16:16'),
(29, '2024-01-20', 4, 'https://www.mediafire.com/file/y30la0qm6n43zq7/12Nov2022MYSQL2.mp4', 1, '2024-01-13 14:17:09', '2024-01-13 14:17:09'),
(30, '2024-01-20', 4, 'https://www.mediafire.com/file/y30la0qm6n43zq7/12Nov2022MYSQL2.mp4', 1, '2024-01-13 14:21:47', '2024-01-13 14:21:47');

-- --------------------------------------------------------

--
-- Table structure for table `enrolls`
--

CREATE TABLE `enrolls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `stage_id` enum('1','2','3') NOT NULL DEFAULT '2' COMMENT '0 = Approved, 2 = Pending , 3 = Reject',
  `remark` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enrolls`
--

INSERT INTO `enrolls` (`id`, `image`, `post_id`, `user_id`, `stage_id`, `remark`, `created_at`, `updated_at`) VALUES
(1, 'assets/img/enrolls/16594ba20db997viber_image_2022-08-11_06-46-44-901.jpg', 1, 1, '2', 'Hello Sir', '2024-01-03 01:36:32', '2024-01-03 01:36:32'),
(2, NULL, 4, 2, '2', 'Hello Aung Aung', '2024-01-06 09:05:00', '2024-01-06 09:05:00'),
(3, NULL, 3, 2, '2', 'Hello Aung Aung', '2024-01-06 09:05:18', '2024-01-06 09:05:18'),
(4, NULL, 2, 2, '2', 'Hello Aung Aung', '2024-01-06 09:05:35', '2024-01-06 09:05:35'),
(5, NULL, 4, 3, '2', 'Hello Su Su', '2024-01-06 09:06:15', '2024-01-06 09:06:15'),
(6, NULL, 4, 3, '2', 'Hello Su Su', '2024-01-06 09:06:16', '2024-01-06 09:06:16'),
(7, NULL, 3, 3, '2', 'Hello Su Su', '2024-01-06 09:06:32', '2024-01-06 09:06:32'),
(8, NULL, 2, 3, '1', 'Hello How Are You', '2024-01-06 09:06:49', '2024-01-06 10:51:44'),
(9, NULL, 2, 3, '2', 'Hello Su SU', '2024-01-06 09:06:50', '2024-01-06 09:06:50'),
(10, NULL, 4, 1, '2', 'Hello Admin', '2024-01-06 09:07:40', '2024-01-06 09:07:40'),
(11, NULL, 3, 1, '1', NULL, '2024-01-06 09:07:54', '2024-01-06 10:49:57');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `name`, `slug`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Male', 'male', 1, '2023-12-09 10:57:28', '2023-12-09 10:57:28'),
(2, 'Female', 'female', 1, '2023-12-09 10:57:33', '2023-12-09 10:57:33'),
(3, 'Other', 'other', 1, '2023-12-09 10:57:39', '2023-12-09 10:57:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_28_135443_create_students_table', 1),
(6, '2023_10_28_135558_create_statuses_table', 1),
(7, '2023_11_18_211209_create_roles_table', 1),
(8, '2023_11_19_093636_create_cities_table', 1),
(9, '2023_11_19_103300_create_countries_table', 1),
(10, '2023_11_19_110019_create_genders_table', 1),
(11, '2023_11_20_165012_create_tags_table', 1),
(12, '2023_11_20_175621_create_categories_table', 1),
(13, '2023_11_22_072228_create_types_table', 1),
(14, '2023_11_23_074159_create_posts_table', 1),
(15, '2023_11_23_075816_create_attendances_table', 1),
(16, '2023_11_25_205533_create_comments_table', 1),
(17, '2023_11_25_214640_create_days_table', 1),
(18, '2023_12_02_183557_create_dayables_table', 1),
(19, '2023_12_09_191436_create_stages_table', 2),
(20, '2023_12_09_193447_create_enrolls_table', 3),
(21, '2024_01_12_180942_create_edulinks_table', 4),
(22, '2024_01_14_183655_create_relatives_table', 5),
(23, '2024_01_14_183844_create_contacts_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `fee` decimal(8,2) NOT NULL DEFAULT 0.00,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `attshow` bigint(20) UNSIGNED NOT NULL DEFAULT 4,
  `status_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `image`, `title`, `slug`, `content`, `fee`, `startdate`, `enddate`, `starttime`, `endtime`, `type_id`, `tag_id`, `attshow`, `status_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'assets/img/posts/1657448db43350Screenshot (1).png', 'WDF batch 2', 'wdf-batch-2', 'Hello Sir', 0.00, '2023-12-06', '2023-12-11', '19:30:00', '21:30:00', 1, 1, 3, 7, 1, '2023-12-09 11:00:43', '2023-12-09 13:21:20'),
(2, 'assets/img/posts/16574490c1e34dScreenshot (1).png', 'CSS Immediate', 'css-immediate', 'Hello Sir', 50000.00, '2023-12-07', '2023-12-13', '20:31:00', '22:31:00', 2, 2, 3, 7, 1, '2023-12-09 11:01:32', '2023-12-09 11:01:32'),
(3, 'assets/img/posts/1657d857e4dfb2656c04d5757ef1701577941logobo.jpg', 'Js Small App(batch-2)', 'js-small-appbatch-2', 'Hello Sir', 50000.00, '2023-12-16', '2023-12-19', '20:39:00', '20:39:00', 2, 3, 3, 7, 1, '2023-12-16 11:09:50', '2023-12-16 11:09:50'),
(4, 'assets/img/posts/16592105b6b911viber_image_2022-08-11_06-46-44-901.jpg', 'Ubuntu Linux Batch 2', 'ubuntu-linux-batch-2', '<p><span style=\"color: rgb(104, 116, 127); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">The fastest way to get </span><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 0);\">Summernot</span><span style=\"color: rgb(104, 116, 127); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">e is to download the <a href=\"https:www.google.com\" target=\"_blank\">precompiled</a> and minified versions of our CSS and JavaScript. No<b> documentation </b>or origina<u>l source code files </u>are included.</span><span style=\"background-color: rgb(255, 255, 255); color: rgb(104, 116, 127); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">The fastest way to get </span><span style=\"color: rgb(104, 116, 127); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align); background-color: rgb(0, 0, 255);\">Summernote</span><span style=\"background-color: rgb(255, 255, 255); color: rgb(104, 116, 127); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\"> is to download the</span><span style=\"background-color: rgb(255, 255, 255); color: rgb(104, 116, 127); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; text-align: var(--bs-body-text-align);\"><b> precompiled </b></span><span style=\"background-color: rgb(255, 255, 255); color: rgb(104, 116, 127); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">and minified versions of our CSS and JavaScript. No documentation or original source code files are included.</span><span style=\"background-color: rgb(255, 255, 255); color: rgb(104, 116, 127); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">The fastest way to get Summernote is to download the precompiled and minified versions of our CSS and JavaScript. No documentation or original source code files are included.</span><span style=\"background-color: rgb(255, 255, 255); color: rgb(104, 116, 127); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">The fastest way to get Summernote is to download the precompiled and minified versions of our CSS and JavaScript. No documentation or original source code files are included.</span><br></p>', 2500.00, '2024-01-01', '2024-01-01', '07:35:00', '07:36:00', 2, 6, 3, 7, 1, '2024-01-01 01:07:39', '2024-01-01 01:07:39');

-- --------------------------------------------------------

--
-- Table structure for table `relatives`
--

CREATE TABLE `relatives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `relatives`
--

INSERT INTO `relatives` (`id`, `name`, `slug`, `status_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Mother', 'mother', 3, 1, '2023-11-21 15:45:34', '2024-01-23 12:33:24'),
(2, 'Father', 'father', 3, 1, '2024-01-15 12:33:24', '2024-01-14 12:33:24'),
(3, 'Parents', 'parents', 3, 1, '2023-11-24 11:33:52', '2023-11-24 13:21:53'),
(4, 'Brother', 'brother', 3, 1, '2023-11-24 13:21:53', '2023-11-24 11:33:52'),
(5, 'Sister', 'sister', 3, 1, '2023-12-03 04:08:37', '2023-11-24 08:01:00'),
(6, 'Son', 'son', 3, 1, '2023-11-24 08:01:00', '2023-11-24 08:01:00'),
(7, 'Daughter', 'daughter', 3, 1, '2024-01-02 12:34:03', '2024-01-08 12:34:03'),
(8, 'Child', 'child', 3, 1, '2024-01-09 12:35:38', '2024-01-08 12:35:38'),
(9, 'Friend', 'friend', 3, 1, '2024-01-08 12:35:38', '2024-01-08 12:35:38'),
(10, 'Spouse', 'spouse', 3, 1, '2024-01-15 12:35:38', '2024-01-09 12:35:38'),
(11, 'Partner', 'partner', 3, 1, '2024-01-15 12:35:38', '2024-01-16 12:35:38'),
(12, 'Assistant', 'assistant', 3, 1, '2024-01-08 12:35:38', '2024-01-09 12:35:38'),
(13, 'Manager', 'manager', 3, 1, '2024-01-08 12:35:38', '2024-01-10 12:35:38'),
(14, 'Other', 'other', 3, 1, '2024-01-08 12:35:38', '2024-01-08 12:35:38'),
(15, 'Sweet Heart', 'sweet-heart', 3, 1, '2024-01-08 12:35:38', '2024-01-08 12:35:38');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `image`, `name`, `slug`, `status_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'assets/img/roles/1659d1065cba77viber_image_2022-08-11_06-46-44-901.jpg', 'Admin', 'admin', 3, 1, '2024-01-09 09:22:45', '2024-01-09 09:22:45'),
(2, 'assets/img/roles/1659d10750a298viber_image_2022-08-11_06-46-44-901.jpg', 'Teacher', 'teacher', 4, 1, '2024-01-09 09:23:01', '2024-01-09 09:23:36'),
(3, 'assets/img/roles/1659d1083f0e47viber_image_2022-08-11_06-46-44-901.jpg', 'Student', 'student', 3, 1, '2024-01-09 09:23:15', '2024-01-09 09:23:15'),
(4, 'assets/img/roles/1659d10900c026viber_image_2022-08-11_06-46-44-901.jpg', 'Guest', 'guest', 3, 1, '2024-01-09 09:23:28', '2024-01-09 09:23:28');

-- --------------------------------------------------------

--
-- Table structure for table `stages`
--

CREATE TABLE `stages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stages`
--

INSERT INTO `stages` (`id`, `name`, `slug`, `user_id`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'Approved', 'approved', 1, 3, '2023-12-09 12:58:07', '2023-12-09 12:58:07'),
(2, 'Pending', 'pending', 1, 3, '2023-12-09 12:58:17', '2023-12-09 12:58:17'),
(3, 'Reject', 'reject', 1, 3, '2023-12-09 12:58:25', '2023-12-09 12:58:25'),
(4, 'Complete', 'complete', 1, 3, '2023-12-09 12:58:36', '2023-12-09 12:58:36'),
(5, 'Incomplete', 'incomplete', 1, 3, '2023-12-09 12:58:43', '2023-12-09 12:58:43'),
(6, 'Loading', 'loading', 1, 3, '2023-12-09 12:58:52', '2023-12-09 12:58:52'),
(7, 'Processing', 'processing', 1, 3, '2023-12-09 12:59:06', '2023-12-09 12:59:06'),
(8, 'Passed', 'passed', 1, 3, '2023-12-09 12:59:22', '2023-12-09 12:59:22'),
(9, 'Request', 'request', 1, 3, '2023-12-09 12:59:32', '2023-12-09 12:59:32'),
(10, 'Waiting', 'waiting', 1, 3, '2023-12-09 12:59:43', '2023-12-09 12:59:43'),
(11, 'Verifying', 'verifying', 1, 3, '2023-12-09 12:59:57', '2023-12-09 12:59:57'),
(12, 'Verified', 'verified', 1, 3, '2023-12-09 13:00:07', '2023-12-09 13:00:07');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `slug`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Active', 'active', 1, '2023-12-09 10:51:24', '2023-12-09 10:51:24'),
(2, 'Inactive', 'inactive', 1, '2023-12-09 10:51:31', '2023-12-09 10:51:31'),
(3, 'On', 'on', 1, '2023-12-09 10:51:38', '2023-12-09 10:51:38'),
(4, 'Off', 'off', 1, '2023-12-09 10:51:44', '2023-12-09 10:51:44'),
(5, 'Online', 'online', 1, '2023-12-09 10:51:51', '2023-12-09 10:51:51'),
(6, 'Offline', 'offline', 1, '2023-12-09 10:51:58', '2023-12-09 10:51:58'),
(7, 'Public', 'public', 1, '2023-12-09 10:52:04', '2023-12-09 10:52:04'),
(8, 'Private', 'private', 1, '2023-12-09 10:52:12', '2023-12-09 10:52:12'),
(9, 'Friend Only', 'friend-only', 1, '2023-12-09 10:52:23', '2023-12-09 10:52:23'),
(10, 'Member Only', 'member-only', 1, '2023-12-09 10:52:35', '2023-12-09 10:52:35'),
(11, 'Only Me', 'only-me', 1, '2023-12-09 10:52:44', '2023-12-09 10:52:44'),
(12, 'Enable', 'enable', 1, '2023-12-09 10:52:58', '2023-12-09 10:52:58'),
(13, 'Disable', 'disable', 1, '2023-12-09 10:53:09', '2023-12-09 10:53:09'),
(14, 'Ban', 'ban', 1, '2023-12-09 10:53:15', '2023-12-09 10:53:15'),
(15, 'Unban', 'unban', 1, '2023-12-09 10:53:22', '2023-12-09 10:53:22'),
(16, 'Block', 'block', 1, '2023-12-09 10:53:28', '2023-12-09 10:53:28'),
(17, 'Unblock', 'unblock', 1, '2023-12-09 10:53:47', '2023-12-09 10:53:47'),
(18, 'Terminate', 'terminate', 1, '2023-12-09 10:53:56', '2023-12-09 10:53:56');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `regnumber` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `remark` text DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `regnumber`, `firstname`, `lastname`, `slug`, `remark`, `status_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'WDF1001', 'Admin', 'Bot', 'adminbot', 'dolores recusandae doloremque dignissimos officia itaque possimus incidunt delectus, obcaecati officiis ullam, consequuntur pariatur nam. Quos sit maxime eius.', 1, 1, '2023-12-16 11:54:00', '2023-12-16 11:54:01'),
(2, 'WDF1002', 'Aung', 'Aung', 'aungaung', 'dolores recusandae doloremque dignissimos officia itaque possimus incidunt delectus, obcaecati officiis ullam, consequuntur pariatur nam. Quos sit maxime eius.', 1, 2, '2023-12-16 11:54:00', '2023-12-16 11:54:01'),
(3, 'WDF1003', 'Su', 'Su', 'susu', 'dolores recusandae doloremque dignissimos officia itaque possimus incidunt delectus, obcaecati officiis ullam, consequuntur pariatur nam. Quos sit maxime eius.', 1, 3, '2023-12-16 11:54:00', '2023-12-16 11:54:01'),
(4, 'WDF1004', 'Yu', 'Yu', 'yuyu', 'dolores recusandae doloremque dignissimos officia itaque possimus incidunt delectus, obcaecati officiis ullam, consequuntur pariatur nam. Quos sit maxime eius.', 1, 4, '2023-12-16 11:54:00', '2023-12-16 11:54:01');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `status_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'WDF', 'wdf', 3, 1, '2023-12-09 10:56:06', '2023-12-09 10:56:06'),
(2, 'CSS immedirate', 'css-immedirate', 3, 1, '2023-12-09 10:56:29', '2023-12-09 10:56:29'),
(3, 'Jquery', 'jquery', 3, 1, '2023-12-09 10:56:38', '2024-01-12 09:18:56'),
(4, 'Javascript Small App', 'javascript-small-app', 3, 1, '2023-12-09 10:56:45', '2024-01-12 09:19:11'),
(5, 'Bootstrap Projects', 'bootstrap-projects', 3, 1, '2023-12-09 10:56:53', '2024-01-12 09:19:33'),
(6, 'Mysql', 'mysql', 3, 1, '2024-01-01 01:04:20', '2024-01-12 09:19:46'),
(7, 'Tailwind CSS', 'tailwind-css', 3, 1, '2024-01-12 09:20:00', '2024-01-12 09:20:00'),
(8, 'JSON & Firebase', 'json-firebase', 3, 1, '2024-01-12 09:20:14', '2024-01-12 09:20:14'),
(9, 'ES 6', 'es-6', 3, 1, '2024-01-12 09:20:22', '2024-01-12 09:20:22'),
(10, 'PHP', 'php', 3, 1, '2024-01-12 09:20:28', '2024-01-12 09:20:28'),
(11, 'Laravel', 'laravel', 3, 1, '2024-01-12 09:20:54', '2024-01-12 09:20:54'),
(12, 'React', 'react', 3, 1, '2024-01-12 09:21:00', '2024-01-12 09:21:00'),
(13, 'Node', 'node', 3, 1, '2024-01-12 09:21:07', '2024-01-12 09:21:07'),
(14, 'Linux (Ubuntu)', 'linux-ubuntu', 3, 1, '2024-01-12 09:21:15', '2024-01-12 09:21:15'),
(15, 'AWS', 'aws', 3, 1, '2024-01-12 09:21:20', '2024-01-12 09:21:20'),
(16, 'News', 'news', 3, 1, '2024-01-12 09:21:25', '2024-01-12 09:21:25');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `slug`, `status_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Free', 'free', 3, 1, '2023-12-09 10:55:32', '2023-12-09 10:55:32'),
(2, 'Paid', 'paid', 3, 1, '2023-12-09 10:55:40', '2023-12-09 10:55:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$1IJOPwzRt17qan.mQ1tcAOzoE1EuPKk5Um9990vart4nJ9KD2fiJK', '7eclTEqz8v3cr12rTOQSRLv0JvD7iaeeozm2n1FsrYh82Vr13I8yA0aWQ8ez', '2023-12-09 10:50:23', '2023-12-09 10:50:23'),
(2, 'aung aung', 'aungaung@gmail.com', NULL, '$2y$10$1IJOPwzRt17qan.mQ1tcAOzoE1EuPKk5Um9990vart4nJ9KD2fiJK', 'JdSK7rFsDtNT0bHIDWpItX2wEoFtCNf1RkgBA5BQn5sRWETuCJvR2AF8WQHG', '2023-12-09 10:50:23', '2023-12-09 10:50:23'),
(3, 'su su', 'susu@gmail.com', NULL, '$2y$10$1IJOPwzRt17qan.mQ1tcAOzoE1EuPKk5Um9990vart4nJ9KD2fiJK', 'gVRYzSL0dWfef463EykskN1uA1KgJeGYYCwODGKHNk0dgzNCHDcBK8OtSxZz', '2023-12-09 10:50:23', '2023-12-09 10:50:23'),
(4, 'yu yu', 'yuyu@gmail.com', NULL, '$2y$10$1IJOPwzRt17qan.mQ1tcAOzoE1EuPKk5Um9990vart4nJ9KD2fiJK', 'qtmkq8krJU4NFL29WzPsFY2lZ0pm6SuHM5pVBK23zYvB3zk4Rsi1B7bG44aq', '2023-12-09 10:50:23', '2023-12-09 10:50:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_users_id` (`user_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `days_name_unique` (`name`);

--
-- Indexes for table `edulinks`
--
ALTER TABLE `edulinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrolls`
--
ALTER TABLE `enrolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relatives`
--
ALTER TABLE `relatives`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `relatives_name_unique` (`name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_regnumber_unique` (`regnumber`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `types_name_unique` (`name`);

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
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `edulinks`
--
ALTER TABLE `edulinks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `enrolls`
--
ALTER TABLE `enrolls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `relatives`
--
ALTER TABLE `relatives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_users_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
