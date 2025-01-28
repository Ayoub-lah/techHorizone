-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 28, 2025 at 11:30 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'hold',
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `magazine_id` bigint UNSIGNED DEFAULT NULL,
  `theme_id` bigint UNSIGNED DEFAULT NULL,
  `is_public` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `state`, `user_id`, `created_at`, `updated_at`, `magazine_id`, `theme_id`, `is_public`, `image`) VALUES
(1, 'L\'avenir de l\'IA générative', 'Cet article explore les dernières avancées en matière d\'IA générative et leurs implications pour l\'avenir de la technologie et de la société...', 'recomand', 30, '2025-01-19 17:06:15', '2025-01-27 21:14:53', 4, 36, 'active', 'ac.jpg'),
(2, 'Les tendances du développement web en 2024', 'Découvrez les nouvelles tendances en développement web pour l\'année 2024, y compris les frameworks populaires et les meilleures pratiques...', 'recomand', 22, '2025-01-19 17:06:15', '2025-01-28 12:21:34', 3, 36, 'active', 'ac.jpg'),
(3, 'L\'impact de la blockchain sur la finance', 'La blockchain révolutionne le secteur financier. Cet article examine ses avantages, ses défis et son avenir...', 'publie', 26, '2025-01-19 17:06:15', '2025-01-25 22:49:38', 2, 36, 'active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('admin@gmail.com|127.0.0.1', 'i:1;', 1737805203),
('admin@gmail.com|127.0.0.1:timer', 'i:1737805203;', 1737805203),
('jallitobenaaros@gmail.com|127.0.0.1', 'i:2;', 1736860948),
('jallitobenaaros@gmail.com|127.0.0.1:timer', 'i:1736860948;', 1736860948),
('omar@gmail.com|127.0.0.1', 'i:1;', 1737314722),
('omar@gmail.com|127.0.0.1:timer', 'i:1737314722;', 1737314722);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `article_id` bigint UNSIGNED DEFAULT NULL,
  `magazine_id` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `created_at`, `updated_at`, `user_id`, `article_id`, `magazine_id`) VALUES
(6, 'g:g!:gi!', '2025-01-21 18:00:20', '2025-01-21 18:00:20', 16, 1, NULL),
(8, 'good article', '2025-01-21 19:46:10', '2025-01-21 19:46:10', 16, 1, NULL),
(9, 'hi', '2025-01-25 21:37:25', '2025-01-25 21:37:25', 38, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb3_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `magazines`
--

DROP TABLE IF EXISTS `magazines`;
CREATE TABLE IF NOT EXISTS `magazines` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `number` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_public` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `magazines`
--

INSERT INTO `magazines` (`id`, `number`, `created_at`, `updated_at`, `is_public`) VALUES
(1, 5, '2025-01-25 00:11:09', '2025-01-25 00:23:15', 1),
(2, 8, '2025-01-26 00:19:42', '2025-01-26 00:19:42', 1),
(3, 7, '2025-01-26 00:44:34', '2025-01-26 00:44:34', 1),
(4, 89, '2025-01-27 11:29:44', '2025-01-27 11:29:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_05_135327_create_articles_table', 1),
(5, '2025_01_05_153510_create_comments_table', 1),
(6, '2025_01_05_154156_create_notes_table', 1),
(7, '2025_01_05_154803_create_visits_table', 1),
(8, '2025_01_05_155644_create_themes_table', 1),
(9, '2025_01_05_160158_create_subscriptions_table', 1),
(10, '2025_01_05_171130_create_magazines_table', 1),
(11, '2025_01_05_184803_modify_themes_table', 1),
(12, '2025_01_06_123150_modify_themes_table', 1),
(13, '2025_01_06_185824_modify_articles_table', 1),
(14, '2025_01_07_123439_modify_magazines_table', 1),
(15, '2025_01_07_124527_create_recommendations_table', 1),
(16, '2025_01_08_185824_modify_articles_table', 1),
(17, '2025_01_08_190513_modify_comment_table', 1),
(18, '2025_01_08_190515_modify_comment_table ', 1),
(19, '2025_01_19_211819_add_image_to_articles_table', 2),
(20, '2025_01_23_162836_add_status_to_users_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `rating` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `article_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `rating`, `created_at`, `updated_at`, `user_id`, `article_id`) VALUES
(1, 4, '2025-01-25 21:37:37', '2025-01-25 21:37:37', 38, 1),
(2, 4, '2025-01-28 12:24:32', '2025-01-28 12:24:32', 43, 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recommendations`
--

DROP TABLE IF EXISTS `recommendations`;
CREATE TABLE IF NOT EXISTS `recommendations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `reason` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `article_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb3_unicode_ci,
  `payload` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('DyJ7upEbS4OTVZChqmFZe42N227wa1zkiAC1Hc8h', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUHc4RjhBdXlXTmFINGVsU0taS0FhanZSV24yOVVOM3UwSEQxU3U4SyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1738070792),
('qAceZQbGuVnLhoBSWiwt10JLNsjGnicVvOgkkd8x', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQUZWeEtvbU40dmJMTFlYbVNUZWFGVHBSdTVRdVM3RXJTd0p5ak1LUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1738085277),
('RsW6x7ev4fjiskPK1s4kcawjW2rqej82n5IsIyhL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSFZnMDd1Q2loMFpIUTBwZ1BOVk1YcndBeE43TlFGeFdKVXBmTlJjRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZWdpc3RlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1738094383);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `theme_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `created_at`, `updated_at`, `user_id`, `theme_id`) VALUES
(1, '2025-01-13 21:08:11', '2025-01-13 21:08:11', 22, 40),
(2, '2025-01-13 21:08:11', '2025-01-13 21:08:11', 22, 39),
(5, '2025-01-13 21:09:17', '2025-01-13 21:09:17', 23, 41),
(8, '2025-01-13 23:14:56', '2025-01-13 23:14:56', 24, 38),
(9, '2025-01-13 23:14:56', '2025-01-13 23:14:56', 24, 39),
(10, '2025-01-14 00:08:21', '2025-01-14 00:08:21', 25, 37),
(11, '2025-01-14 00:08:21', '2025-01-14 00:08:21', 25, 38),
(12, '2025-01-14 00:08:21', '2025-01-14 00:08:21', 25, 39),
(16, '2025-01-14 18:57:07', '2025-01-14 18:57:07', 27, 37),
(17, '2025-01-14 18:57:07', '2025-01-14 18:57:07', 27, 38),
(19, '2025-01-14 19:09:27', '2025-01-14 19:09:27', 28, 37),
(20, '2025-01-14 19:09:27', '2025-01-14 19:09:27', 28, 38),
(21, '2025-01-14 22:41:37', '2025-01-14 22:41:37', 29, 36),
(22, '2025-01-14 22:41:37', '2025-01-14 22:41:37', 29, 38),
(23, '2025-01-14 22:41:37', '2025-01-14 22:41:37', 29, 37),
(24, '2025-01-14 22:41:38', '2025-01-14 22:41:38', 29, 41),
(25, '2025-01-19 16:08:21', '2025-01-19 16:08:21', 30, 40),
(26, '2025-01-19 16:08:21', '2025-01-19 16:08:21', 30, 38),
(27, '2025-01-19 16:08:21', '2025-01-19 16:08:21', 30, 37),
(28, '2025-01-19 16:08:21', '2025-01-19 16:08:21', 30, 36),
(31, '2025-01-19 16:19:29', '2025-01-19 16:19:29', 31, 38),
(32, '2025-01-19 16:19:29', '2025-01-19 16:19:29', 31, 39),
(33, '2025-01-19 18:25:14', '2025-01-19 18:25:14', 32, 37),
(35, '2025-01-19 18:25:14', '2025-01-19 18:25:14', 32, 38),
(36, '2025-01-19 18:25:14', '2025-01-19 18:25:14', 32, 39),
(37, '2025-01-22 14:45:49', '2025-01-22 14:45:49', 33, 36),
(38, '2025-01-22 14:45:49', '2025-01-22 14:45:49', 33, 37),
(39, '2025-01-22 14:45:49', '2025-01-22 14:45:49', 33, 38),
(40, '2025-01-22 14:45:49', '2025-01-22 14:45:49', 33, 40),
(41, '2025-01-24 23:48:51', '2025-01-24 23:48:51', 35, 36),
(42, '2025-01-24 23:49:18', '2025-01-24 23:49:18', 35, 38),
(43, '2025-01-24 23:49:31', '2025-01-24 23:49:31', 35, 40),
(44, '2025-01-25 01:03:26', '2025-01-25 01:03:26', 36, 38),
(45, '2025-01-25 01:03:26', '2025-01-25 01:03:26', 36, 37),
(46, '2025-01-25 11:05:19', '2025-01-25 11:05:19', 37, 36),
(47, '2025-01-25 11:05:22', '2025-01-25 11:05:22', 37, 38),
(48, '2025-01-25 21:36:32', '2025-01-25 21:36:32', 38, 38),
(49, '2025-01-26 21:49:32', '2025-01-26 21:49:32', 39, 38),
(50, '2025-01-27 11:22:28', '2025-01-27 11:22:28', 40, 36),
(51, '2025-01-27 11:22:28', '2025-01-27 11:22:28', 40, 40),
(52, '2025-01-27 11:43:05', '2025-01-27 11:43:05', 41, 38),
(53, '2025-01-27 21:15:47', '2025-01-27 21:15:47', 42, 38),
(54, '2025-01-27 21:15:47', '2025-01-27 21:15:47', 42, 39),
(55, '2025-01-28 12:23:37', '2025-01-28 12:23:37', 43, 38),
(56, '2025-01-28 12:24:09', '2025-01-28 12:24:09', 43, 37),
(57, '2025-01-28 12:24:12', '2025-01-28 12:24:12', 43, 40);

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

DROP TABLE IF EXISTS `themes`;
CREATE TABLE IF NOT EXISTS `themes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `name`, `created_at`, `updated_at`, `user_id`, `description`) VALUES
(36, 'Programmation', '2025-01-13 20:27:51', '2025-01-13 20:27:51', 16, 'Thème sur la programmation'),
(37, 'Science des données', '2025-01-13 20:27:51', '2025-01-13 20:27:51', 19, 'Thème sur la science des données'),
(38, 'Technologie', '2025-01-13 20:27:51', '2025-01-13 20:27:51', 17, 'Thème sur la technologie'),
(39, 'Développement personnel', '2025-01-13 20:27:51', '2025-01-13 20:27:51', 20, 'Thème sur le développement personnel'),
(40, 'Écriture', '2025-01-13 20:27:51', '2025-01-13 20:27:51', 15, 'Thème sur l\'écriture'),
(41, 'Relations', '2025-01-13 20:27:51', '2025-01-13 20:27:51', 21, 'Thème sur les relations');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `role` tinyint NOT NULL DEFAULT '2',
  `status` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'non bloque',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'oussama benaaros', 'benaaros.oussama@etu.uae.ac.ma', 2, 'non bloque', NULL, '$2y$12$y7MjLYINg9ki0y7C7At91ODGn5FG.8Yx.mCfTm675FKsM.ESgKnTG', NULL, '2025-01-11 17:06:01', '2025-01-26 21:42:43'),
(3, 'Science des données', 'sciencedesdonnees@gmail.com', 1, 'non bloque', NULL, '$2y$12$XaoJ0pw94zBqRDqRaIo3MeP4IMWQfaIqK4Z/4/kgCRKpSf6mJcO9K', NULL, '2025-01-13 20:02:21', '2025-01-13 20:02:21'),
(16, 'Programmation', 'programmation@gmail.com', 1, 'non bloque', NULL, '$2y$12$3ySFD0BIcFp2dCOPdlRwcOaKUlysZNw/2UdvvKRaJIMjjqaZ207ya', NULL, '2025-01-13 19:58:06', '2025-01-23 17:01:30'),
(17, 'Technologie', 'technologie@gmail.com', 1, 'non bloque', NULL, '$2y$12$jOaPsFrapSpkQs9wERe/quUFO/0q1uTbCC4RncIESBOZDldbrRTLa', NULL, '2025-01-13 20:03:33', '2025-01-13 20:03:33'),
(18, 'Développement personnel', 'devlopementpersonnel@gmail.com', 1, 'non bloque', NULL, '$2y$12$vIatu2/hVEHO1MXnQEfKeuNdYIA8iagixplQmED7/fAI5FI53Q4wS', NULL, '2025-01-13 20:05:10', '2025-01-13 20:05:10'),
(19, 'Écriture', 'ecriture@gmail.com', 1, 'non bloque', NULL, '$2y$12$5jcjLkDv4PAL2LvYzaP5/.zLTAQa2h0Yk6SvwYgwB9UhBXRZtjQY6', NULL, '2025-01-13 20:05:53', '2025-01-13 20:05:53'),
(20, 'Relations', 'relation@gmail.com', 1, 'non bloque', NULL, '$2y$12$wCSVYx80ONJqYml0rgf.vei4HNW0FDHXc.Q6uQLPuomQjh9weF6fW', NULL, '2025-01-13 20:07:04', '2025-01-13 20:07:04'),
(21, 'Productivité', 'productivite@gmail.com', 1, 'non bloque', NULL, '$2y$12$xCFDiPhFuStdRIjk1z9rKOgUabcYO46n86HvryO9JKb0yhJNmAqoy', NULL, '2025-01-13 20:09:11', '2025-01-13 20:09:11'),
(22, 'oussama benaaros', 'ossama@gmail.com', 2, 'non bloque', NULL, '$2y$12$JSLdn/ZSbB90sqb/b0tixe0czZhrKVueTiXrgr.8elZht7efuZJ6m', NULL, '2025-01-13 21:08:06', '2025-01-13 21:08:06'),
(23, 'kawtar', 'kawtar@gmail.com', 2, 'non bloque', NULL, '$2y$12$Z8Gzhf8bXS4kbmAon/gX9.ITSTwRmhBn00pGGESIxZNeIv12yF3X6', NULL, '2025-01-13 21:09:11', '2025-01-13 21:09:11'),
(24, 'ayoub', 'ayoub@gmail.com', 2, 'non bloque', NULL, '$2y$12$sBauCoikN6IPTQSvdvtwHOjknnd4dbpkBvThdAv4lyQX48JkOgIEq', NULL, '2025-01-13 23:14:43', '2025-01-13 23:14:43'),
(25, 'mehdi', 'mehdi@gmailcom', 2, 'non bloque', NULL, '$2y$12$IUVJ6FC98rIcVosR2KTAV.r1uP8MW/Uo0tFAyIWsmU2Pu5KjA9GMO', NULL, '2025-01-14 00:08:00', '2025-01-14 00:08:00'),
(26, 'ben aaros oussama', 'jefkjmnv@erkjgnzlrk.com', 2, 'non bloque', NULL, '$2y$12$mQwREuRj.712wVOfqImko.lB4YlBXx0W/TRHb296KcfKIG0WgkEX6', NULL, '2025-01-14 12:21:41', '2025-01-14 12:21:41'),
(27, 'farouk', 'elouassif@gmail.com', 2, 'non bloque', NULL, '$2y$12$WRx6S1MKRUu46jxCHWxl6OazK352.X6cuGcwAbG8Fr7VNE/pRwp3K', NULL, '2025-01-14 18:56:47', '2025-01-14 18:56:47'),
(28, 'zakarya', 'zakarya@gmail.com', 2, 'non bloque', NULL, '$2y$12$nO0zY/k6lyj32gDv4r/hSuvLgYV4acOua85HgQKHhy5hklrzRSmLS', NULL, '2025-01-14 19:09:22', '2025-01-14 19:09:22'),
(29, 'houssain', 'houssain@gmail.com', 2, 'non bloque', NULL, '$2y$12$JQ5cMe/J.AU4VOv2fNmHmeATvUuxJDlAxYybXPhtA4WKKAfj.Pyv.', NULL, '2025-01-14 22:41:08', '2025-01-14 22:41:08'),
(30, 'marwan', 'marwan@gmail.com', 2, 'non bloque', NULL, '$2y$12$sfe4baNw09DsBoQA9kJBaOLmVPc4cdvxJZ0T8FV2bY7l7WctUTS8K', NULL, '2025-01-19 16:07:59', '2025-01-19 16:07:59'),
(31, 'kjyufkyuk', 'ytyjryjry@trrtjjtr.com', 2, 'non bloque', NULL, '$2y$12$hmSbGyFdANUryp.fklOo8eeSL9TlGQNWCUNU6hURZqly5qRY8KlPG', NULL, '2025-01-19 16:19:17', '2025-01-19 16:19:17'),
(32, 'rtrgtgtgt', 'fydgrfhyfyfy@gjuy.com', 2, 'non bloque', NULL, '$2y$12$TZZ/nX810a0svYUDhmbbW./oHgnsjB8m7U.jU2HZt6jKqeeeouw.m', NULL, '2025-01-19 18:24:53', '2025-01-19 18:24:53'),
(33, 'driss', 'driss@gmail.com', 2, 'non bloque', NULL, '$2y$12$c9M6nROe4ymBGCwTXnqgPeuZQB7R59owyZ2uXSLv.ucha6YJwv3rW', NULL, '2025-01-22 14:45:36', '2025-01-22 14:45:36'),
(34, 'admin', 'admin1@gmail.com', 0, 'non bloque', NULL, '$2y$12$jblZGJvOKjwejOgvyFQ/Z.RG0QV3sjHbrxERc1pkR3a7MIfjO4VIS', NULL, '2025-01-23 15:39:12', '2025-01-23 15:39:12'),
(35, 'ayoub', 'ayoub1@gmail.com', 2, 'non bloque', NULL, '$2y$12$1HUpK.XKFYL01Y4fI3urku/7ZQiySlxc9It0f3CFkKNYhbOnXK966', NULL, '2025-01-24 23:48:30', '2025-01-24 23:48:30'),
(36, 'ayoub', 'ayoublahlo@gmail.com', 2, 'bloque', NULL, '$2y$12$VHFiYr1vP1PA.7czCu5JqeFpvyvX9t5pDnXoLEI02R9n8W21LXffe', NULL, '2025-01-25 01:03:19', '2025-01-27 16:45:51'),
(37, 'ayoub15', 'ayoubaa@gmail.com', 2, 'non bloque', NULL, '$2y$12$Z2pm68mkF5z3BD1s1lPilegpuYCQ.srdZS6LNgVnPq7xlX5PO6zxO', NULL, '2025-01-25 11:05:00', '2025-01-25 11:05:00'),
(38, 'ayoubayoub', 'ayoublala@gmail.com', 2, 'non bloque', NULL, '$2y$12$qXveXKqNA6Xc4Eo9jv8rAO6FVFDBPxUiK7qGf0JdWu8guciy64Vje', NULL, '2025-01-25 21:36:21', '2025-01-25 21:46:03'),
(39, 'ayoub', 'ayoubdd@gmail.com', 2, 'non bloque', NULL, '$2y$12$T4xlNs/G9l2UFVEq/c0oJejkWbUSTVrVKSwbTJ5qsImeTYB162O4K', NULL, '2025-01-26 21:49:25', '2025-01-26 21:49:25'),
(40, 'admin', 'admin@gmail.com', 2, 'non bloque', NULL, '$2y$12$wWbvUZDEfankwsHGlLcgrebQ5oX22fmzKXG3llTtsxq2gkkPDIF8u', NULL, '2025-01-27 11:22:15', '2025-01-27 11:22:15'),
(41, 'ayoub', 'ayoubissam@gmail.com', 2, 'non bloque', NULL, '$2y$12$XjAmzhz724g37jYdn/6aWOec1pzQo5FAGFO8GF2KqMn/J2n1pnhoa', NULL, '2025-01-27 11:43:01', '2025-01-27 11:43:01'),
(42, 'ayoub', 'ayoubmahmad@gmail.com', 2, 'non bloque', NULL, '$2y$12$EveOE4X.Ug2pdZMFR5W.h.8Hihhnagg/PyJpF7CsUGdcEL7qV23yC', NULL, '2025-01-27 21:15:41', '2025-01-27 21:15:41'),
(43, 'ayoub', 'ayoub12@gmail.com', 2, 'non bloque', NULL, '$2y$12$lleYBM.5g2hd/3nxJnN2HOjdi2ETDB.CDU9WsGQ6VghLZ2rvGYgVm', NULL, '2025-01-28 12:23:27', '2025-01-28 12:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

DROP TABLE IF EXISTS `visits`;
CREATE TABLE IF NOT EXISTS `visits` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `article_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`id`, `created_at`, `updated_at`, `user_id`, `article_id`) VALUES
(1, '2025-01-25 21:37:14', '2025-01-25 21:37:14', 38, 1),
(2, '2025-01-25 21:37:25', '2025-01-25 21:37:25', 38, 1),
(3, '2025-01-25 21:37:37', '2025-01-25 21:37:37', 38, 1),
(4, '2025-01-28 12:24:22', '2025-01-28 12:24:22', 43, 2),
(5, '2025-01-28 12:24:33', '2025-01-28 12:24:33', 43, 2),
(6, '2025-01-28 12:25:26', '2025-01-28 12:25:26', 43, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
