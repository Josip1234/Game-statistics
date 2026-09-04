-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2026 at 09:49 AM
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
-- Database: `game_statistics`
--

-- --------------------------------------------------------

--
-- Table structure for table `advanced_statistics`
--

CREATE TABLE `advanced_statistics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `statistic_id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `file_url` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advanced_statistics`
--

INSERT INTO `advanced_statistics` (`id`, `statistic_id`, `file_name`, `file_url`, `created_at`, `updated_at`) VALUES
(1, 1, 'GtaSanAndreas_6a155940116f3.json', 'uploads/GtaSanAndreas_6a155940116f3.json.json', '2026-05-26 06:31:09', '2026-05-26 06:31:09'),
(2, 2, 'Granturismo4_6a155e73a83af.json', 'uploads/Granturismo4_6a155e73a83af.json.json', '2026-05-26 06:48:59', '2026-05-26 06:48:59'),
(4, 5, 'GtaSanAndreas_6a15637436608.json', 'uploads/GtaSanAndreas_6a15637436608.json.json', '2026-05-26 07:10:45', '2026-05-26 07:10:45'),
(5, 1, 'GtaSanAndreas_6a1563ab53ab4.json', 'uploads/GtaSanAndreas_6a1563ab53ab4.json.json', '2026-05-26 07:11:12', '2026-05-26 07:11:12'),
(6, 1, 'GtaSanAndreas_6a156472815fe.json', 'uploads/GtaSanAndreas_6a156472815fe.json', '2026-05-26 07:14:36', '2026-05-26 07:14:36');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-jbosnjak@gmail.com|127.0.0.1', 'i:2;', 1787235198),
('laravel-cache-jbosnjak@gmail.com|127.0.0.1:timer', 'i:1787235198;', 1787235198),
('laravel-cache-jbosnjak3@gmail.com|127.0.0.1', 'i:1;', 1787235157),
('laravel-cache-jbosnjak3@gmail.com|127.0.0.1:timer', 'i:1787235157;', 1787235157);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `yearOrRangeOfProduction` longtext NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `have_sequel` char(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `genre_id` bigint(20) UNSIGNED DEFAULT NULL,
  `platform_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id`, `name`, `yearOrRangeOfProduction`, `user_id`, `have_sequel`, `created_at`, `updated_at`, `genre_id`, `platform_id`) VALUES
(1, 'Gta Series', '1997 Grand Theft Auto, 1999 Grand Theft Auto: London 1969,Grand Theft Auto: London 1961,Grand Theft Auto 2,2001 Grand Theft Auto III, 2002 Grand Theft Auto: Vice City, 2004 Grand Theft Auto: San Andreas Grand Theft Auto Advance, 2005 Grand Theft Auto: Liberty City Stories, 2006 Grand Theft Auto: Vice City Stories,2008 Grand Theft Auto IV, 2009 Grand Theft Auto IV: The Lost and Damned Grand Theft Auto: Chinatown Wars  Grand Theft Auto: The Ballad of Gay Tony 2013 Grand Theft Auto V Grand Theft Auto Online, 2026 Grand Theft Auto VI', 1, '1', '2026-04-18 08:46:27', '2026-08-03 09:56:25', 2, 6),
(3, 'Gran turismo', '1997	Gran Turismo 1999	Gran Turismo 2 2001	Gran Turismo 3: A-Spec 2002	Gran Turismo Concept 2003	Gran Turismo 4 Prologue 2004	Gran Turismo 4 2006	Gran Turismo HD Concept 2007	Gran Turismo 5 Prologue 2009	Gran Turismo (PSP) 2010	Gran Turismo 5 2013	Gran Turismo 6 2017	Gran Turismo Sport 2022	Gran Turismo 7 2024	My First Gran Turismo', 1, '1', '2026-04-20 05:23:36', '2026-06-30 07:29:29', 1, 8),
(4, 'Mashed: Drive to Survive', 'Mashed is a vehicular combat racing video game developed by Supersonic Software. The game was originally released in Europe for PlayStation 2, Xbox and Microsoft Windows in June 2004.', 1, '0', '2026-04-26 06:20:17', '2026-05-07 06:39:25', 1, 6),
(5, 'Trackmania', '2003	TrackMania , 2004	TrackMania: Power Up!, 2005	TrackMania Sunrise TrackMania Original TrackMania Sunrise eXtreme,  2006	TrackMania Nations ESWC TrackMania United, 2008	TrackMania United Forever TrackMania Nations Forever TrackMania DS,  2010	TrackMania: Build to Race TrackMania Turbo,  2011	TrackMania²: Canyon,  2013	TrackMania²: Stadium ShootMania Storm TrackMania²: Valley,  2016	TrackMania Turbo 2017	TrackMania²: Lagoon, 2020	Trackmania', 1, '1', '2026-07-08 07:27:13', '2026-07-08 07:27:13', 1, 6),
(10, 'test', 'test', 1, '0', '2026-07-08 08:06:06', '2026-07-08 08:06:06', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `game_genre`
--

CREATE TABLE `game_genre` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `game_id` bigint(20) UNSIGNED NOT NULL,
  `genre_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `game_genre`
--

INSERT INTO `game_genre` (`id`, `game_id`, `genre_id`, `created_at`, `updated_at`) VALUES
(81, 4, 2, '2026-07-04 08:14:56', '2026-07-04 08:14:56'),
(88, 1, 1, '2026-07-05 09:06:58', '2026-07-05 09:06:58'),
(89, 3, 3, '2026-07-06 07:31:54', '2026-07-06 07:31:54'),
(91, 1, 6, '2026-07-06 07:46:03', '2026-07-06 07:46:03'),
(96, 5, 5, '2026-07-08 07:27:13', '2026-07-08 07:27:13'),
(97, 5, 6, '2026-07-08 07:27:13', '2026-07-08 07:27:13'),
(99, 10, 2, '2026-07-08 08:06:06', '2026-07-08 08:06:06'),
(100, 10, 3, '2026-07-08 08:06:06', '2026-07-08 08:06:06'),
(101, 10, 4, '2026-07-08 08:06:06', '2026-07-08 08:06:06'),
(102, 10, 5, '2026-07-08 08:06:06', '2026-07-08 08:06:06'),
(103, 10, 6, '2026-07-08 08:06:06', '2026-07-08 08:06:06'),
(104, 1, 4, '2026-08-03 09:16:05', '2026-08-03 09:16:05');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Racing', '2026-04-30 12:35:59', '2026-05-02 10:16:52'),
(2, 'Action', '2026-04-30 12:35:59', '2026-05-02 10:17:02'),
(3, 'Simulation', '2026-04-30 12:35:59', '2026-05-02 10:18:11'),
(4, 'Fighting', '2026-04-30 12:35:59', '2026-05-02 10:17:34'),
(5, 'Platformer', '2026-04-30 12:35:59', '2026-05-02 10:17:46'),
(6, 'Shooting', '2026-05-02 09:34:19', '2026-05-02 09:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mdetails`
--

CREATE TABLE `mdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `file_url` varchar(255) DEFAULT NULL,
  `mod_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mdetails`
--

INSERT INTO `mdetails` (`id`, `description`, `file_url`, `mod_id`, `created_at`, `updated_at`) VALUES
(1, 'It randomizes traffic, vehicle colors, mission objectives, ped models, and weapon stats,', 'uploads/config.toml', 6, '2026-05-12 06:40:03', '2026-05-15 10:28:43'),
(3, 'nova modifikcija', NULL, 9, '2026-05-13 05:52:55', '2026-05-13 05:52:55');

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
(7, '0001_01_01_000000_create_users_table', 1),
(8, '0001_01_01_000001_create_cache_table', 1),
(10, '0001_01_01_000002_create_jobs_table', 2),
(11, '2026_04_16_142250_create_game_table', 3),
(12, '2026_04_18_180820_create_sequel_table', 4),
(13, '2026_04_18_202150_update_sequel_table', 5),
(14, '2026_04_18_204124_edit_game_table', 6),
(20, '2026_04_20_074704_create_statistics_table', 7),
(25, '2026_04_21_173220_update_statistics_table', 8),
(26, '2026_04_23_100656_update_statistic_table', 8),
(27, '2026_04_26_080426_update_game_table', 9),
(28, '2026_04_30_135723_create_genre_table', 10),
(29, '2026_04_30_140105_update_game_table', 11),
(33, '2026_05_03_132553_create_platform_table', 12),
(34, '2026_05_03_133402_update_game_table', 13),
(36, '2026_05_04_115813_create_profile_table', 14),
(37, '2026_05_07_171527_create_modification_table', 15),
(38, '2026_05_10_083447_create_mdetails_table', 16),
(40, '2026_05_17_111859_create_table_advanced_statistics', 17),
(43, '2026_06_12_184728_create_game_genre_table', 18),
(44, '2026_07_12_075435_update_users_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `modification`
--

CREATE TABLE `modification` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `game_id` bigint(20) UNSIGNED NOT NULL,
  `sequel_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modification`
--

INSERT INTO `modification` (`id`, `name`, `game_id`, `sequel_id`, `created_at`, `updated_at`) VALUES
(6, 'Rainbomizer', 1, 1, '2026-05-09 11:40:03', '2026-05-09 11:40:03'),
(7, 'Gran turismo 4 Spec II v 1.10', 3, 3, '2026-05-09 11:44:49', '2026-05-09 11:44:49'),
(9, 'test', 4, NULL, '2026-05-11 07:10:22', '2026-05-11 07:10:22');

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
-- Table structure for table `platform`
--

CREATE TABLE `platform` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `platform_history` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `platform`
--

INSERT INTO `platform` (`id`, `name`, `platform_history`, `created_at`, `updated_at`) VALUES
(1, 'PlayStation 1', 'Manufacturer: Sony\r\nVersion: PlayStation 1\r\nPlayStation 1 in black color\r\nPSOne\r\nGeneration: 5th generation\r\nFirst available 3. December 1994. Japan\r\n9. September 1995. USA\r\n29. September 1995. EU\r\nJuly 1997. HR[1]\r\nMedium	CD\r\nController 	controller\r\nOnline service	no\r\nSold items 100 million (2005.)\r\nMost saled game:	Final Fantasy VII', '2026-05-03 16:46:14', '2026-05-05 08:49:05'),
(6, 'PC - Personal Computer', 'A personal computer game, or abbreviated PC game, also known as a computer game,[a] is a video game played on a personal computer (PC). The term PC game has been popularly used since the 1990s referring specifically to games on \"Wintel\" (Microsoft Windows software/Intel hardware) which has dominated the computer industry since. Mainframe and minicomputer games are a precursor to personal computer games. Home computer games became popular following the video game crash of 1983. In the 1990s, PC games lost mass market traction to console games on the fifth generation such as the Sega Saturn, Nintendo 64 and PlayStation.[citation needed] They are enjoying a resurgence in popularity since the mid-2000s through digital distribution on online service providers.[1][2] Personal computers as well as general computer software are considered synonymous with IBM PC compatible systems; while mobile devices – smartphones and tablets, such as those running on Android or iOS platforms – are also PCs in the general sense as opposed to console or arcade machine. Historically, it also included games on systems from Apple Computer, Atari Corporation, Commodore International and others. Microsoft Windows utilizing Direct3D become the most popular operating system for PC games in the 2000s. Games utilizing 3D graphics generally require a form of graphics processing unit, and PC games have been a major influencing factor for the development and marketing of graphics cards. Emulators are able to play games developed for other platforms. The demoscene originated from computer game cracking.', '2026-05-04 08:02:53', '2026-05-04 08:10:35'),
(8, 'Play Station 2', 'Manufacturer: Sony\r\nVersion: PS2\r\nPS2 Slimline\r\nGeneration:	6th\r\nFirst available 4. March 2000.\r\nMedium:	DVD, CD\r\nController:  DualShock 2\r\nOnline service	-\r\nSold copies:	approx. 150 milion\r\nMost sales game:	Grand Theft Auto: San Andreas', '2026-05-07 06:39:00', '2026-05-09 11:53:18');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profile_name` varchar(255) NOT NULL,
  `game_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sequel_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `profile_name`, `game_id`, `sequel_id`, `created_at`, `updated_at`) VALUES
(1, 'Zeda', 4, NULL, '2026-05-06 05:30:35', '2026-05-07 05:50:08'),
(3, 'NATURAL holiday', 3, 3, '2026-05-07 06:30:09', '2026-05-07 06:59:35'),
(6, 'Novi profil', 4, NULL, '2026-05-07 07:19:07', '2026-05-07 07:19:07');

-- --------------------------------------------------------

--
-- Table structure for table `sequel`
--

CREATE TABLE `sequel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `game_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `game_version` varchar(50) DEFAULT NULL,
  `version_history` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `publish_year` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sequel`
--

INSERT INTO `sequel` (`id`, `game_id`, `name`, `game_version`, `version_history`, `created_at`, `updated_at`, `publish_year`) VALUES
(1, 1, 'Gta San Andreas', 'V1.0', 'The original edition = October 26, 2004, Mobile version = December 13, 2013, \"Remastered\" version = October 26, 2014, for Xbox 360 = December 1, 2015, for PlayStation 3), and The Definitive Edition on November 11, 2021.', '2026-04-18 18:32:20', '2026-05-03 11:49:57', 2004),
(3, 3, 'Gran turismo 4', 'V1.0', 'Gran Turismo 4 Prologue 2003 Gran Turismo 4 Online Test Version 2006', '2026-04-20 05:25:58', '2026-04-20 05:25:58', 2004);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('bPExhLGMwLDs6HnYGzn7Vcg4akb5Ev4HK2sOVECr', NULL, '93.139.222.167', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSm5udERVY2F4UmRpcU9seVNiWTN4akN6UlJ2T3MyRGFZVzF1dWduViI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vZ2FtZXN0YXQuZ3JlYXQtc2l0ZS5uZXQiO3M6NToicm91dGUiO047fX0=', 1788197875),
('byULdG8Mx0FL4g3jO20yjTEwd8kIDxVyKyT4aVuc', NULL, '93.142.115.152', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVUdXWkVndVZFM2xiNGZ3czBJM1I5TWtEOWVCZWlFNG80Zlk1VTZUTiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vZ2FtZXN0YXQuZ3JlYXQtc2l0ZS5uZXQiO3M6NToicm91dGUiO047fX0=', 1788291229),
('ccddFQOohenGKleosL8GF7WcLqQ3Kz131X9g5Nrg', 1, '93.142.115.152', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidDhtYUtydUpKMnRzcWU4RWpMZjAxbTlEdDZRZUhsb0xXbzJYajVsOCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8vZ2FtZXN0YXQuZ3JlYXQtc2l0ZS5uZXQvZGFzaGJvYXJkIjtzOjU6InJvdXRlIjtzOjk6ImRhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1788259327),
('DmCmQ0XEwTuBjxoVUat2HZ3Lv7wQr18N2qcZCI8l', 137, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYW1Jd2luRnNnSEdqNVB4MFZraXRVeER2ZEZuRXZaTzE3UkJzNVAwSCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbl91c2Vycy9hZG1pbi91c2Vycz9wYWdlPTEiO3M6NToicm91dGUiO3M6MTc6ImFkbWluLnVzZXJzLmluZGV4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTM3O30=', 1788508008),
('gnxy26xTT5C9gHjjIpX5DwEwS2dNe3YpNX12LHGJ', NULL, '93.139.205.85', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSHVweUNmcFJRWWdvWE1oc1Y4cDVCTTFXS3E1NXpYNm11Q2g1eVdiTSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzY6Imh0dHBzOi8vZ2FtZXN0YXQuZ3JlYXQtc2l0ZS5uZXQvP2k9MSI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1788507683),
('mrslJ1NBnWNLBa7JWrgG1ApLJxhMZgSz3Acg2umK', NULL, '93.141.189.158', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT2FQdENIWjVMbmZ0Zm5jbExxR2RjMWhTZExjczBPYXFURlhVY0VhZyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vZ2FtZXN0YXQuZ3JlYXQtc2l0ZS5uZXQiO3M6NToicm91dGUiO047fX0=', 1788471845),
('uC982UmcmF8TjuUpVHmnervKwPH3EY68YYLF4TDh', NULL, '93.142.115.152', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZG1ack54elozV3pXUW1hNjBqdkUxQ1ZBQVljdzNkc1MwcWoxSkN1dCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vZ2FtZXN0YXQuZ3JlYXQtc2l0ZS5uZXQiO3M6NToicm91dGUiO047fX0=', 1788275826),
('yADngYUG1WPWy3zAeD5zd2dn3DeuAoim4p8jOJDY', NULL, '93.139.222.167', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSHREM0YydFBYUG9OSklCemFJNVpSbFQ5NWU0WWJmcDZGZ1VMSmxheCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vZ2FtZXN0YXQuZ3JlYXQtc2l0ZS5uZXQiO3M6NToicm91dGUiO047fX0=', 1788210724),
('YJrzMMK2JZeuNDwhLOqorNWhJByZWyJdxdswgotm', NULL, '93.142.115.152', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSUk2dnpheDI5aFFXZEo0NHVEZVpCUDdhRDdUTzJYY3Z1Q3pkbzJ2VCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vZ2FtZXN0YXQuZ3JlYXQtc2l0ZS5uZXQiO3M6NToicm91dGUiO047fX0=', 1788276909);

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `game_progress` varchar(50) DEFAULT NULL,
  `hours_played` int(11) NOT NULL,
  `started_playing` date DEFAULT NULL,
  `ended_playing` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sequel_id` bigint(20) UNSIGNED DEFAULT NULL,
  `game_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`id`, `game_progress`, `hours_played`, `started_playing`, `ended_playing`, `created_at`, `updated_at`, `sequel_id`, `game_id`) VALUES
(1, '80.75%', 59, '2025-01-15', '2026-04-14', '2026-04-23 14:31:57', '2026-04-29 07:17:45', 1, NULL),
(2, '0.0%', 50, '2026-04-20', '2026-04-20', '2026-04-25 09:47:07', '2026-04-25 11:21:47', 3, NULL),
(5, '85.03%', 66, '2026-04-14', '2026-05-03', '2026-05-03 11:24:12', '2026-05-03 11:24:12', 1, NULL),
(6, '0.00', 0, '2026-05-09', '2026-05-09', '2026-05-09 09:34:06', '2026-05-09 09:34:06', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `userType` tinyint(4) DEFAULT NULL,
  `dbirth` date NOT NULL,
  `nickname` varchar(69) NOT NULL,
  `profilePicture` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `userType`, `dbirth`, `nickname`, `profilePicture`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Josip Bošnjak', 'jbosnjak@mail.com', 1, '1992-11-05', 'jobo', 'uploads/dbModel13.png', '2026-04-14 06:24:37', '$2y$12$/7K.LMyQGSYkQbzFE1ZGGeCnakDUnAGRJaf072sqhKd8QcFQz5ozS', 'jXLAoPX0OVsrulCOJLp3V48rZ8JAbih5DQ9kZEg2Bz56HPHvyxppJqREamGb', '2026-04-14 06:24:38', '2026-07-15 09:07:44'),
(5, 'Kill me', 'kontakt@kaufland.hr', 0, '1965-05-05', 'killme', 'uploads/9e9006a6d6b3c6bfe09d3b389cc6821f.png', NULL, '$2y$12$pktrOeHRPZbi8JyxV9jE6Oqplee8KUcTihUGxrCLSzQS1Zrya1ZAa', NULL, '2026-04-16 11:55:17', '2026-07-15 09:07:44'),
(7, 'Petra Dragović', 'petra.dragovic@hotmail.com', 0, '1972-04-29', 'lana84', 'uploads/30m6b6r.jpg', NULL, '$2y$12$TDVHcY9DNrvpCFUTXIJNs.lUeM2oOaHJXx3hltuMc670mQNdYAo2O', NULL, '2026-07-15 09:58:36', '2026-07-15 10:16:16'),
(8, 'Rafael', 'fran37@kovacevic.org', 0, '1970-09-25', 'zbroz', NULL, '2026-09-01 07:23:26', '$2y$12$yVNClH41O1oL71gTpaaRcOQAQcNKSC6STVg3R9YUBkimSvfBOjt/a', 'zQlMgj9Xuf', '2004-01-27 23:00:00', '2026-09-01 07:23:27'),
(9, 'Lorena', 'stankovic.hana@yahoo.com', 1, '2009-05-13', 'patrik95', NULL, '2026-09-01 07:23:27', '$2y$12$BR6gaQf1Hlig9uJm3IcQ8.4N7FwW2VouGe4E7SepS/fOuh6Zh0xVu', 'qruJNyyKUh', '1973-11-19 23:00:00', '2026-09-01 07:23:27'),
(10, 'Leonardo', 'rivanovic@filipovic.info', 0, '1971-11-04', 'antic.nikolina', NULL, '2026-09-01 07:23:27', '$2y$12$XljzsniAe4G5mfCJrArdRuxNtq20uqarFro4YgbcGB3iZ8u2qvlpG', 'PB3HY4kSV9', '1995-11-06 23:00:00', '2026-09-01 07:23:27'),
(11, 'Nela', 'fdragic@yahoo.com', 0, '1981-07-09', 'petrovic.marta', NULL, '2026-09-01 07:23:27', '$2y$12$vLkYn4eJ6tDukgWegR.1cOHOP./BgkY6LABokpQF97TKaV1foaR26', 'inb0docyTO', '1971-12-15 23:00:00', '2026-09-01 07:23:28'),
(12, 'Hrvoje', 'mmilic@knezevic.biz', 0, '2016-09-28', 'vfilipovic', NULL, '2026-09-01 07:23:28', '$2y$12$hSSkHV/DExe6EL5i6wV6Z.1Nzqfj3z7SI3.kc3DGuuAMTJqEe3RLm', 'w0rfMxMbaF', '2014-04-14 22:00:00', '2026-09-01 07:23:28'),
(13, 'Benjamin', 'dragovic.ivana@juric.com', 0, '1986-12-04', 'ema.perkovic', NULL, '2026-09-01 07:23:28', '$2y$12$Skd.PXylljZ4B8bYXLHLDO53aKoy6XQVekZX1g8xL3wNz3gqgfuN6', 'wA0mIpPjeS', '2009-12-07 23:00:00', '2026-09-01 07:23:28'),
(14, 'Tea', 'anamarija.perkovic@broz.com', 0, '2022-08-09', 'stela.kosar', NULL, '2026-09-01 07:23:28', '$2y$12$xRzp43jTNNdjUxhLjc1mauV7DDZ3ICGZ2KiMssc94OtTHOcu8cFja', '2CqnD2IhcT', '1997-06-23 22:00:00', '2026-09-01 07:23:28'),
(15, 'Jelena', 'dragovic.matea@filipovic.net', 0, '2002-12-17', 'vuka.marija', NULL, '2026-09-01 07:23:28', '$2y$12$JPllNS9dirfKu21oW8qpY.nO5V2EShoseUtSVZTpW08xZgKrZeAuq', 'ybaXMfDg30', '2000-05-20 22:00:00', '2026-09-01 07:23:29'),
(16, 'Matej', 'andrija32@yahoo.com', 1, '2019-09-24', 'maja56', NULL, '2026-09-01 07:23:29', '$2y$12$wuYfHvwquii8WnTyIv2z5.Kj/bxjNFbeis.U0qkbfhYt.N0FY6Euy', 'IyPsQjIu0b', '1986-08-15 22:00:00', '2026-09-01 07:23:29'),
(17, 'Maša', 'marina.tomic@neretljak.com', 1, '2011-05-07', 'kosar.emil', NULL, '2026-09-01 07:23:29', '$2y$12$COfcXxg1Q3hUrw1hBnBGOOwHgkq9VH3xpyG6h3ULfZJxfFXm0xWji', '8hlMWrv0dg', '1993-04-03 22:00:00', '2026-09-01 07:23:29'),
(18, 'Valentino', 'lmodric@marusic.info', 0, '2021-03-25', 'maric.dunja', NULL, '2026-09-01 07:24:28', '$2y$12$u9Ek6KGqiARIabFHzGQX.u5ZzW36E120QEBC7nAglBpk4WQmORBRu', 'tGDfItSjk7', '1985-05-31 21:46:02', '2026-09-01 07:24:28'),
(19, 'Mila', 'nika55@modric.com', 0, '2003-10-19', 'nela69', NULL, '2026-09-01 07:24:28', '$2y$12$kD15QqT5/EDb0a.tcxvUJue1s8SZ/wBoYHiV5DsBqJ/5pIVuRIWhy', 'E9AtaXGy1y', '1998-02-05 23:27:58', '2026-09-01 07:24:29'),
(20, 'Helena', 'kmarkovic@horvatincic.biz', 0, '1982-07-20', 'cbogdanovic', NULL, '2026-09-01 07:24:29', '$2y$12$qJRJfoyP038a5Z5V6mns.eE6trW6Z8cR5./4vmXviEwIzwfqGhaWe', 'iN87484HG5', '1988-06-12 00:41:43', '2026-09-01 07:24:29'),
(21, 'Roko', 'ivuka@perkovic.com', 1, '1989-02-15', 'tnikolic', NULL, '2026-09-01 07:24:29', '$2y$12$U5xUpjvESpRPhgeB/HL6J.TaHjs86j3T1JZm3Fvx0xMcdptgwnvJC', 'yegEWZbhKF', '2012-04-05 14:40:52', '2026-09-01 07:24:29'),
(22, 'Hrvoje', 'cupic.hrvoje@bozic.info', 1, '1977-01-14', 'amarusic', NULL, '2026-09-01 07:24:29', '$2y$12$RhaQKguWVae2tpLGGAAmU.ZKMoJABuQyIdPWs0ytCj8mjFSWJPZe.', 'UwL7xuzrkf', '2023-07-04 05:10:01', '2026-09-01 07:24:29'),
(23, 'Matko', 'nino02@horvat.org', 0, '1995-10-17', 'magdalena04', NULL, '2026-09-01 07:24:29', '$2y$12$FlzORhLLTQOG1vt4iU4kcOPiiFTouUgeXYCtbGLEaqsYgwleyXgGm', '0dKoLA4ZZW', '1981-04-08 09:12:38', '2026-09-01 07:24:30'),
(24, 'Martina', 'ivincetic@milic.com', 1, '2019-05-10', 'xcorluka', NULL, '2026-09-01 07:24:30', '$2y$12$/iHsCam4RHz3b8qN5Lb94uzxgh9ZaFWrRxnG3JKtsbCCkaStjr1BC', '7EJUas453Q', '1989-10-30 00:22:52', '2026-09-01 07:24:30'),
(25, 'Dora', 'cupic.matea@hotmail.com', 0, '1977-09-28', 'ivan50', NULL, '2026-09-01 07:24:30', '$2y$12$xhyiLgvReJBXCq7yIXTtHelW9269gx2vt.p7pSmXiAc3Q2PZTEULe', 'apS9Cee3KA', '2005-03-21 14:38:47', '2026-09-01 07:24:30'),
(26, 'Veronika', 'josip19@gmail.com', 0, '1973-12-30', 'kranjcar.branislav', NULL, '2026-09-01 07:24:30', '$2y$12$AhaGJ302R0tSQFp1Mw/kx.Y4auDCFP/X1gEV5vW0X/ukZmmPWyBoy', 'YOdzZcY3es', '1979-08-01 18:30:06', '2026-09-01 07:24:31'),
(27, 'Gabrijela', 'antic.ivana@adamic.com', 0, '1970-01-27', 'kovacic.korina', NULL, '2026-09-01 07:24:31', '$2y$12$.7LgDAb1.G6NkKJNjq7/uO2Hy8/xuktokCIlqE8gVq9KCcIxXCOMW', 'NLZ27agkID', '2001-09-11 02:06:34', '2026-09-01 07:24:31'),
(28, 'Šimun', 'ante.kranjcar@pavic.org', 1, '1979-09-24', 'valentino.mlakar', NULL, '2026-09-01 07:43:50', '$2y$12$eqe80dGe0t/wL7YUgZlKJe6Mzfd.iIaOd5FdmtTkrnfID9UZw2Cve', 'jRUYBee99O', '2022-11-30 13:15:10', '2026-09-01 07:43:50'),
(29, 'Antonija', 'iris73@hotmail.com', 0, '2018-06-03', 'radic.andrea', NULL, '2026-09-01 07:43:50', '$2y$12$GTpFv6yP1riy327CnbB6xeq7KlQI0boRgCSVGndze2vp2VZl69P3G', 'cGUu9YBCoK', '1985-07-22 02:37:05', '2026-09-01 07:43:51'),
(30, 'Manuela', 'kranjcar.mara@hotmail.com', 1, '1989-04-24', 'raicsudar.vedran', NULL, '2026-09-01 07:43:51', '$2y$12$nOvTgLaAHpsSdm2M4a4wAulrgujsoMx9F5HLnSWZUHM/3famijE3K', 'VdFyaT3g0t', '1977-03-05 10:57:42', '2026-09-01 07:43:51'),
(31, 'Daniel', 'franko.abramovic@modric.com', 1, '1993-09-19', 'matija.raicsudar', NULL, '2026-09-01 07:43:51', '$2y$12$2JjLoLwqVO.J9FfjixLOQ..lk29IShrN2wZk1WPw9ECL7OCCzl5mK', 'x9pO9uQvz3', '1988-11-29 01:06:36', '2026-09-01 07:43:51'),
(32, 'Gabriel', 'matej77@antic.com', 0, '2017-12-07', 'enovakovic', NULL, '2026-09-01 07:43:51', '$2y$12$Nfn7y1qcsIgXdZWBrXTtX.PGsMJ9AhE/9VeRUg4REQ9YqVoVhaaXK', 'GK0mavbLdv', '1992-04-26 07:26:04', '2026-09-01 07:43:52'),
(33, 'Katja', 'nvlasic@ratkovic.com', 1, '1970-01-21', 'manuela.jankovic', NULL, '2026-09-01 07:43:52', '$2y$12$5wg6yl160/dnkstAvDGy7ephO7lhOtgIM5o0P681AjDeOoJz0qXNq', 'J3actnf7ON', '2001-09-01 17:43:39', '2026-09-01 07:43:52'),
(34, 'Ema', 'horvat.nora@markovic.com', 1, '2018-08-02', 'rmarusic', NULL, '2026-09-01 07:43:52', '$2y$12$5f8EB0pLrXlHlrGIsw16Oe.lV.DGFcxLqpGVm.OLgtjo45Pw3mKku', '7Ivk1g70zc', '2008-10-21 06:35:56', '2026-09-01 07:43:52'),
(35, 'Mihaela', 'ovlasic@zupan.info', 1, '1999-08-31', 'radic.tena', NULL, '2026-09-01 07:43:52', '$2y$12$PB.AhIodqwyGg80HqFlwp.G.eXpWKhz.0MrEIHhVNKP5eu5Fz0Ts2', 'ySVuvje48k', '1979-08-25 04:59:20', '2026-09-01 07:43:53'),
(36, 'Nina', 'wantic@novakovic.biz', 0, '1984-05-08', 'alen.filipovic', NULL, '2026-09-01 07:43:53', '$2y$12$L154X8gcy548SUASyM6L7eWR5ZSNmiy9V6g/y5tjF4sOAUV/j6mEe', '93Hktc48Ve', '2005-10-17 16:52:56', '2026-09-01 07:43:53'),
(37, 'Leonardo', 'pavic.jakov@hotmail.com', 1, '2003-03-02', 'leona.zoric', NULL, '2026-09-01 07:43:53', '$2y$12$vm2rVzmckVpiHM4bdZ0QWeTnKIkNSTbuEfB4LL5u9lKiB3jXRXUNK', 'nwYuv5j3v4', '2011-04-20 03:37:14', '2026-09-01 07:43:53'),
(38, 'Šime', 'antonija00@hotmail.com', 0, '1989-11-08', 'qvinkovic', NULL, '2026-09-01 13:18:54', '$2y$12$FP8LvqZ9hbYMddG8Nhoi7OrEVZrk8aUuP13HqlCoH2HUzQZo/U79K', 'DvBP6fpRNp', '2009-11-14 18:51:29', '2026-09-01 13:18:55'),
(39, 'Luka', 'iris60@hotmail.com', 1, '2020-12-18', 'ujurisa', NULL, '2026-09-01 13:18:55', '$2y$12$f5JPEcRzAve1Z7kiVI3oYO9RiP3LCnEF1yuwgmdHwdd1xQuYmcywa', 'nsT0Nw95iY', '2024-04-29 05:16:13', '2026-09-01 13:18:55'),
(40, 'Tena', 'ema.nikolic@radic.com', 1, '1989-08-02', 'corluka.fran', NULL, '2026-09-01 13:18:55', '$2y$12$XcqIyZ/ytfKryKa9F.Fr/eRWOw12qkcZ4ROIv1XcRgoh085ONBFmi', 'QXdpbuy8g6', '2023-03-11 08:40:47', '2026-09-01 13:18:56'),
(41, 'Mate', 'edragovic@gmail.com', 1, '1992-02-29', 'hvlahovic', NULL, '2026-09-01 13:18:56', '$2y$12$XhsgjInzsflxFgRVEZv3hezXEbUSAIDHql0O0NSYViYIeTY59Dlle', 'N0HULrYutx', '2021-08-28 20:42:17', '2026-09-01 13:18:56'),
(42, 'Lena', 'akasun@franjic.com', 0, '2007-12-30', 'vid52', NULL, '2026-09-01 13:18:56', '$2y$12$9u.3dsTAgxmD1thS/KLBV.HrjiWTYN4ZGbq9hOhP1MygQvzOtglSi', 'hZssXdomGw', '1989-06-30 17:28:38', '2026-09-01 13:18:56'),
(43, 'Martina', 'dunja67@hotmail.com', 1, '1990-05-03', 'filipovic.marko', NULL, '2026-09-01 13:18:56', '$2y$12$4HSN0pHFOxo7C8nVd3Ccy.bbu2ZTKQbFFbfHbHE3W8JRn0wLFTlym', 'kBO1Ezam1M', '2006-01-03 07:04:58', '2026-09-01 13:18:56'),
(44, 'Elena', 'ena77@yahoo.com', 0, '2003-08-17', 'iris.stankovic', NULL, '2026-09-01 13:18:56', '$2y$12$BB9s51xl5WeY3vIB0jmU3.Vy.g3lbb1RhBIfwxT2tbyn4KSEXTPti', 'Xq5gnpBMjb', '2022-04-26 12:22:39', '2026-09-01 13:18:57'),
(45, 'Anja', 'noa31@horvatincic.com', 0, '2026-08-22', 'niko.vukovic', NULL, '2026-09-01 13:18:57', '$2y$12$NUdlQ1BK/3vyXZroxLnkMuNs7/pYOI7bEPbXs0IENb2ykI8COT3p6', 'JBVUP5cfLZ', '2002-10-08 08:46:05', '2026-09-01 13:18:57'),
(46, 'Tena', 'skovac@hotmail.com', 0, '1985-12-25', 'xjurisa', NULL, '2026-09-01 13:18:57', '$2y$12$6agfsKmsoXFa4ukDaBslnu7VZ13TvKQT5Vg4txypER3.S3zqwD1IW', 'wOTLHGC5N9', '1970-08-16 11:14:01', '2026-09-01 13:18:57'),
(47, 'Vanja', 'paula.kosar@gmail.com', 0, '1986-10-04', 'domagoj.maras', NULL, '2026-09-01 13:18:57', '$2y$12$WJZfher8OEhu/pbWmtNR3.tnVMgf1fzr0ECfHTPKJI/akVmWpfaO6', 'mYZH2ngxsL', '1973-01-19 19:14:23', '2026-09-01 13:18:58'),
(48, 'Franjo', 'antic.toni@neretljak.com', 0, '1983-02-01', 'valentina.neretljak', NULL, '2026-09-01 13:18:58', '$2y$12$hF6t5b1IBeHxEIhZhkAQrenSxxcs0NA5gsJb6rCU2hmlAMZauvkPy', 'kVOF0QltHS', '2014-05-13 03:11:40', '2026-09-01 13:18:58'),
(49, 'Adam', 'rmarkovic@hotmail.com', 1, '1982-08-27', 'kfranjic', NULL, '2026-09-01 13:18:58', '$2y$12$Vf.zspHcMjN/4hdMWzkyKe.9hAb3NjOErNc2kt3F0ZBo4v7.nFL6S', 'vqyzd3niST', '2009-10-23 00:56:40', '2026-09-01 13:18:58'),
(50, 'Stella', 'rlovren@mandzukic.com', 0, '1989-09-18', 'mila.juric', NULL, '2026-09-01 13:18:58', '$2y$12$3A6YKfcLMb2cjQ.mGMlZg.0sxXG3yC3k5cuWZ9xwSuuwVdVtdvfNi', 'EzCSpEOoif', '2012-08-28 11:53:57', '2026-09-01 13:18:59'),
(51, 'Adam', 'korina12@hotmail.com', 0, '2023-08-12', 'eva71', NULL, '2026-09-01 13:18:59', '$2y$12$IxPskcDOnd3SicSWJ3xK5egLqchtskZjP318MIoJeLcUKzHqwMEJO', 'A8Q5efOEw1', '2024-03-24 02:04:23', '2026-09-01 13:18:59'),
(52, 'Veronika', 'ebogdanovic@ivanovic.info', 1, '2006-06-07', 'tena.ivanovic', NULL, '2026-09-01 13:18:59', '$2y$12$KU.HQkbq7rXlDgb2ZFIm6Ox7tc9.mfL.LO9X9z1QHK9Ucg8ESmIrK', 'pF5C1Xzv7Q', '1999-01-03 05:47:06', '2026-09-01 13:18:59'),
(53, 'Elena', 'yradic@hotmail.com', 0, '1970-03-11', 'tvinkovic', NULL, '2026-09-01 13:18:59', '$2y$12$Rfddom8sA02CEoaRXtgoHe8tJHct/g1JI7GupiLW68nJSPcH2wZWq', 'mebwGeK7Fv', '2016-11-15 13:26:14', '2026-09-01 13:18:59'),
(54, 'Marija', 'fpetrovic@pavic.com', 1, '1980-06-17', 'ines11', NULL, '2026-09-01 13:18:59', '$2y$12$PT0v1QsEFUUo5VGpu28iWOsXyh8J5QnffZIT3EpPF47i1GdoSXlNe', '4oN8WACRXT', '1973-12-09 23:15:21', '2026-09-01 13:19:00'),
(55, 'Ivona', 'vlahovic.ivan@hotmail.com', 0, '2013-08-31', 'vanesa43', NULL, '2026-09-01 13:19:00', '$2y$12$Zj8LOu.lVkDoiMF8lUpxTuHRAIu7cqPmsh4PPLYDJvxS/WnHKKN9y', 'zGIJtuGxNV', '1986-01-25 18:44:12', '2026-09-01 13:19:00'),
(56, 'Elena', 'kovacevic.nina@marusic.com', 1, '2008-03-31', 'dorotea18', NULL, '2026-09-01 13:19:00', '$2y$12$ZiQhbekb8JJLFcBMCyFsO.H2uZpQ5UQAeUygb3C2AJmUwgl5V8EFG', 'hxkrPlW3Ex', '1981-06-28 00:05:18', '2026-09-01 13:19:00'),
(57, 'Ena', 'vlahovic.ivan@franjic.com', 1, '2018-05-14', 'jstankovic', NULL, '2026-09-01 13:19:00', '$2y$12$ljKAE3zxbC7LxFxVStn27uyHBXNxSpqffyLWsNs6fRBgDLovPbcyy', 'gflTRVujmM', '1983-06-14 19:09:38', '2026-09-01 13:19:01'),
(58, 'Manuela', 'dorotea.stankovic@gmail.com', 0, '1983-11-08', 'lora16', NULL, '2026-09-01 13:19:01', '$2y$12$j0E7pH/e/NIu0l0D0AFe4Ojxo6IAP4YUekPvLeuQthwD1PsmbpSLm', '8x3SjulJqL', '1976-01-14 11:24:49', '2026-09-01 13:19:01'),
(59, 'Vanja', 'kristijan97@hotmail.com', 0, '2004-06-11', 'modric.ana', NULL, '2026-09-01 13:19:01', '$2y$12$E5KfGa4K6iJQdxFkjleQC.o26mMDMWuBvbmZ9OBPcrFKjXHtS2Qju', 'OFldpTeyFS', '2009-02-20 16:04:40', '2026-09-01 13:19:01'),
(60, 'Jelena', 'dino.mlakar@yahoo.com', 1, '1981-08-16', 'zupan.petra', NULL, '2026-09-01 13:19:01', '$2y$12$NRjokYsuANNyNP/LoaavPuNRiowr3TRVeaDr82zgZDpZ28WQ.mvIi', 'VDHXxJDNA5', '1981-06-08 08:01:03', '2026-09-01 13:19:02'),
(61, 'Ilija', 'sara.blazevic@franjic.org', 0, '1979-03-24', 'qmlakar', NULL, '2026-09-01 13:19:02', '$2y$12$Mpsowgz4ulLuepkUud4FLecXfM4Q4xRjtCqVDNfmxGzlq9ugiL8Wy', 'caqsB3NJkK', '1977-06-21 15:47:21', '2026-09-01 13:19:02'),
(62, 'Damjan', 'babic.andrija@modric.com', 0, '2011-06-01', 'umlakar', NULL, '2026-09-01 13:19:02', '$2y$12$9c.M8Eo6n06VfnRXrHyILeOuwZLQncG2zM/CLcECaKjaG/WgCdJ0W', 'xMWkYImDLQ', '1993-04-21 20:24:36', '2026-09-01 13:19:02'),
(63, 'Dominik', 'marija.dragovic@gmail.com', 1, '1979-02-03', 'mario52', NULL, '2026-09-01 13:19:02', '$2y$12$inYS987ZzxhFCtMN0mC9JO1XRT.CCQHXyd.HubgC/FWZPL80mLYVy', 'gXsdpaqW5s', '2025-04-05 03:04:28', '2026-09-01 13:19:02'),
(64, 'Dorotea', 'anja.kovacic@yahoo.com', 1, '1980-02-22', 'vice48', NULL, '2026-09-01 13:19:02', '$2y$12$SCIiWVSBa7XGuOyfjU.qO.fYQ5lcdtsavjN69rNmseRRqUzYHe0r2', 'TcYIHArIuM', '2006-09-23 19:57:28', '2026-09-01 13:19:03'),
(65, 'Dora', 'patrik.mlakar@mandzukic.info', 0, '1988-05-16', 'josipa51', NULL, '2026-09-01 13:19:03', '$2y$12$vA8Y44D8v6B2tYuy2gmH.uN0rEi9OrUfCMQyqrpo2JMNGHFDb2QCa', 'gl9aKO9inv', '1975-03-10 02:10:46', '2026-09-01 13:19:03'),
(66, 'Paola', 'martina13@gmail.com', 0, '1998-12-06', 'vlahovic.bartol', NULL, '2026-09-01 13:19:03', '$2y$12$aLiB.t24F0VcDnChvEAcJ.9OiJok/efqJO4rQ6Mge2E4eyNBB9cKm', 'jPbawydc1v', '2004-04-23 01:19:18', '2026-09-01 13:19:03'),
(67, 'Marija', 'anja.neretljak@yahoo.com', 0, '1981-06-22', 'andrija67', NULL, '2026-09-01 13:19:03', '$2y$12$bzqqbCf2D0yINdd0cUdxrOKL9h15Y85Bp0cPpa0wgqh/TFXQl6p.O', '4PGZHREkVt', '2006-10-30 11:02:54', '2026-09-01 13:19:04'),
(68, 'Sara', 'nora.ivanovic@hotmail.com', 1, '2015-10-23', 'tomcic.dominik', NULL, '2026-09-01 13:19:04', '$2y$12$o0nO5z8NLXD4DLxgbI5K0.wV0q2uZkJZWNbdiBNgug0qT.no/2Rdq', 'slpebkwdYt', '2007-05-13 20:28:47', '2026-09-01 13:19:04'),
(69, 'Laura', 'unovak@hotmail.com', 1, '1978-10-17', 'fran.kovacevic', NULL, '2026-09-01 13:19:04', '$2y$12$lIE0EuiQM8omIvsA2R9T/uQLjVNYAlxUP0nb2EHxw1iQtk87HPF1y', 'rpFN4tz0tX', '1984-06-05 22:22:04', '2026-09-01 13:19:04'),
(70, 'Korina', 'ibozic@hotmail.com', 1, '2022-07-20', 'patrik.franic', NULL, '2026-09-01 13:19:04', '$2y$12$Bib5/rxvbQEQewzzT4MbX.QylhJiO53VJ1pbzHZvn6NlqFPu.LmlC', '1sA6smQWrw', '2010-05-27 23:03:56', '2026-09-01 13:19:04'),
(71, 'Antun', 'monika.kasun@marusic.com', 0, '1987-02-10', 'ena.knezevic', NULL, '2026-09-01 13:19:04', '$2y$12$v.8XBbebrGbRUB1WfD9Lq.QrfPBbEPfhkq5Cp0U93y9eOpIX3zq52', 'qztOC8ezYK', '1998-01-26 23:07:09', '2026-09-01 13:19:05'),
(72, 'Gabrijela', 'vuka.dora@peric.net', 1, '2011-10-06', 'antonija63', NULL, '2026-09-01 13:19:05', '$2y$12$MZHPl0/5/OHim62Z2jKLKuDzL5sWDP4LwojpdLJwgRY9B7PUZ9F7K', 'dUDVKgyrqg', '1992-01-25 06:03:34', '2026-09-01 13:19:05'),
(73, 'Tea', 'dperic@vinkovic.com', 1, '1978-04-13', 'ocorluka', NULL, '2026-09-01 13:19:05', '$2y$12$R/z2Z3uqBMm3YpXlDOPN4..FekoMv4EqaHKciMPjqHhg9F.fd.jCa', '5zT9a1pK1F', '2012-02-11 21:12:48', '2026-09-01 13:19:05'),
(74, 'Nikolina', 'tia16@gmail.com', 0, '1988-06-26', 'gabrijela.grgic', NULL, '2026-09-01 13:19:05', '$2y$12$zZ.PzuAXjpZTBSFKIIoVregVrt2xGvc3j4Z99J0nb7MGjDBqM4TE2', 'swizvFSn2u', '1972-05-27 15:16:49', '2026-09-01 13:19:06'),
(75, 'Korina', 'marusic.robert@maric.com', 0, '1980-11-25', 'david67', NULL, '2026-09-01 13:19:06', '$2y$12$/DZ9qyp146DGN006kxNTveOGdOHMFodMOhvxJ/umuWT/D2MpYoI16', 'yqSxV91XuF', '1988-07-31 00:52:19', '2026-09-01 13:19:06'),
(76, 'Josipa', 'dunja26@yahoo.com', 0, '1983-09-14', 'vuka.vanesa', NULL, '2026-09-01 13:19:06', '$2y$12$KMeeDZeAoYRA28Ml.tLHEebSQnlHR4l6TcjktgwikEAax5C.loGXG', 'IQQKabG558', '1991-10-10 02:16:48', '2026-09-01 13:19:06'),
(77, 'Ante', 'vid.zoric@marusic.com', 0, '2022-09-01', 'nikolina.raicsudar', NULL, '2026-09-01 13:19:06', '$2y$12$Ot8g/V5ejEyvGhDdCwj2/.eR6CGAwK1o4/lc0N9pLlEl8GL9f12ae', 'Maobn31stj', '2018-09-27 05:14:25', '2026-09-01 13:19:07'),
(78, 'Kristijan', 'bartol09@yahoo.com', 0, '1996-06-22', 'stela30', NULL, '2026-09-01 13:19:07', '$2y$12$y2DA1f7sdYxLVp8jRkv1H.Vaj6gEM9ReM377iUg.fwsajDG/0QSJy', 'de3X5AcO53', '2001-11-28 05:34:12', '2026-09-01 13:19:07'),
(79, 'Marijan', 'ajankovic@yahoo.com', 0, '2009-09-26', 'simun78', NULL, '2026-09-01 13:19:07', '$2y$12$atANyq9ZhwWeqtKOlVLYE.9kX9JtFNAhLzU3G4cl2XD0gytnAOek.', 'XZ8I9XVTwC', '2024-05-20 15:11:19', '2026-09-01 13:19:07'),
(80, 'Marin', 'sven.maras@abramovic.com', 0, '1974-11-13', 'barbara.kasun', NULL, '2026-09-01 13:19:07', '$2y$12$NZjAkFv0nd43v6tXOHZ2u.2qxJ7NKp5zhzqZwPnVtExOWPwSYQxn6', '3vBLNuGA8Z', '1990-11-10 03:57:38', '2026-09-01 13:19:07'),
(81, 'Ema', 'denis.maras@gmail.com', 1, '1992-03-24', 'stankovic.melani', NULL, '2026-09-01 13:19:07', '$2y$12$gLecMZ9j2q2PZei9yHYYze8IbsPGqbbEdZTLrRSQFx8YfSlp9fjve', 'SDEeCLUfxf', '1987-07-28 14:05:24', '2026-09-01 13:19:08'),
(82, 'Karla', 'jankovic.lora@radic.org', 1, '1994-11-04', 'antonela37', NULL, '2026-09-01 13:19:08', '$2y$12$D57hNfkuIrlvUA/ceW.5oOGpkKgXKXR0DC5.4iUn3KY4JhKs5cg3i', 'f64LVKcY98', '1977-04-24 08:18:09', '2026-09-01 13:19:08'),
(83, 'Kristina', 'dmarusic@broz.com', 0, '2010-02-28', 'vlahovic.korina', NULL, '2026-09-01 13:19:08', '$2y$12$JfLyPvKEBbAoeQoTOCZVceuOmTPDLkqaoLTra1m1kcOoIygNm1BiO', 'TEIoQcB3ZO', '1975-08-17 12:19:10', '2026-09-01 13:19:08'),
(84, 'Ema', 'nvuka@gmail.com', 1, '2016-12-21', 'bartol47', NULL, '2026-09-01 13:19:08', '$2y$12$uLGDmTStqzOJvTbwkJtYtu90xGp4jTwox1cZsHcn4jv8lS.4G19i.', 'CyCOekhCzs', '2004-08-16 15:25:00', '2026-09-01 13:19:09'),
(85, 'Mate', 'lora.stankovic@yahoo.com', 0, '1984-08-09', 'franjic.maja', NULL, '2026-09-01 13:19:09', '$2y$12$cBr57FqSVpdTmfz1f2qVxOVcqud2uCirdzhPJ8mWKe/f3byzAXT/S', 'fBgm5dpFEv', '1988-10-14 12:41:08', '2026-09-01 13:19:09'),
(86, 'Toni', 'tamara.ivanovic@yahoo.com', 0, '2000-06-19', 'bjurisa', NULL, '2026-09-01 13:19:09', '$2y$12$yQ9G.yqNGFyNVQkkpTWe6eG/it3ZK0pomugcnvOYdAaRjCmGN/mjy', '0N8c1VYbcE', '1988-05-15 09:01:40', '2026-09-01 13:19:09'),
(87, 'Korina', 'laura.milic@adamic.com', 1, '1975-03-10', 'bogdanic.daniel', NULL, '2026-09-01 13:19:09', '$2y$12$wKSLJE.mzcVSiamUZE/2sOImDe6zDcFBStDS/N4kiFS8TiCmWbdNW', '1AOgz8oJtW', '2014-09-16 23:25:47', '2026-09-01 13:19:10'),
(88, 'Sebastijan', 'melanie25@hotmail.com', 1, '2016-03-25', 'vanesa.pavic', NULL, '2026-09-01 13:19:10', '$2y$12$0m0hsMlEwHDcjr/aUPTZiuGwEYfAw3lZO6YKCPKrphwe0IUXFiOwG', 'aKc45q9jUE', '1982-05-17 07:02:39', '2026-09-01 13:19:10'),
(89, 'Tena', 'jankovic.tara@knezevic.org', 1, '2018-09-09', 'anikolic', NULL, '2026-09-01 13:19:10', '$2y$12$ZaPzTA5vUIBoYEeB5JJMOeZzOR77OtwDrwAPYi/ilKe7udjAaVXl6', 'w802dnuJZM', '1972-03-20 09:24:46', '2026-09-01 13:19:10'),
(90, 'Stela', 'bogdanic.nika@hotmail.com', 1, '2019-10-20', 'dora.grgic', NULL, '2026-09-01 13:19:10', '$2y$12$MWeZPE10BQKNgFb7fzquHudYXAMTwPSAuzQME1rMhCiTur94xytUK', 'Gkn3KNaPH2', '2005-06-21 07:38:25', '2026-09-01 13:19:11'),
(91, 'Aleksandar', 'kovac.branislav@yahoo.com', 0, '2002-04-23', 'nino.babic', NULL, '2026-09-01 13:19:11', '$2y$12$95sqKWaN5zmAayz7XyJuReuzx29KljaCN2vYO2EIENwF6ibjEngE2', 'iwyayQiNkl', '1995-03-17 11:55:54', '2026-09-01 13:19:11'),
(92, 'Josipa', 'ymaras@hotmail.com', 0, '1992-03-21', 'martina.abramovic', NULL, '2026-09-01 13:19:11', '$2y$12$s1JjlSP0Fk39yeEqzHLPYu6navoZJQ3eiD9djr8NyD89/ld0W4iyK', 'U1velqACEk', '2001-11-06 21:44:41', '2026-09-01 13:19:11'),
(93, 'Tamara', 'patrik.perkovic@gmail.com', 1, '2015-02-20', 'vukovic.josipa', NULL, '2026-09-01 13:19:11', '$2y$12$FlXaUipi0ccoqGKs89ug9eC3ZhojW8S3m0wRw22goUidzoRoPFxwG', 'P1MHwW37hX', '2017-11-30 05:09:17', '2026-09-01 13:19:11'),
(94, 'Stela', 'bruno80@gmail.com', 1, '2005-11-19', 'novakovic.aleksandar', NULL, '2026-09-01 13:19:11', '$2y$12$ykLC7R/LX3uf2t/u0JTVMuKxmLgQFy6N7gCApBaC3306Z845HTsOm', 'UqRsyzh6dQ', '1979-10-05 04:14:38', '2026-09-01 13:19:12'),
(95, 'Toni', 'vlahovic.benjamin@gmail.com', 1, '2020-01-17', 'tia.tomcic', NULL, '2026-09-01 13:19:12', '$2y$12$XIdkKcL/n12J0W4j4q956eQwVtg.BaDT2faEydRhDh/MVne4VXPlW', 'fArIPdkiXw', '2024-08-06 01:28:55', '2026-09-01 13:19:12'),
(96, 'Niko', 'josip38@hotmail.com', 1, '2014-02-11', 'maja.broz', NULL, '2026-09-01 13:19:12', '$2y$12$KPhjCD/yfowtAzPGx6xjIuze.vak4OeSoTvbfWgyNz.0AmpZfh.1K', 'SjHELqE1yS', '2022-07-20 07:11:17', '2026-09-01 13:19:12'),
(97, 'Franka', 'ante64@tomcic.info', 1, '1975-10-04', 'ivan.zupan', NULL, '2026-09-01 13:19:12', '$2y$12$enYoupePpeBD0Rr3tx70dOSk.dNivBgkwRfPHsKlEDUckFqheB5vy', 'HNhKA09owq', '1974-04-10 07:49:34', '2026-09-01 13:19:13'),
(98, 'Marija', 'alen.horvat@zupan.com', 0, '1979-02-06', 'bvinkovic', NULL, '2026-09-01 13:19:13', '$2y$12$0TweonVhBDpvp45agMbN4Oi5NurvVrAbbJGCsvV.UcW.wG1Eq0SyW', 'OcFYEY0m2J', '2015-07-31 08:27:01', '2026-09-01 13:19:13'),
(99, 'Hrvoje', 'ublazevic@yahoo.com', 0, '1997-12-26', 'lkovacic', NULL, '2026-09-01 13:19:13', '$2y$12$9fL/HXwhgo9SL400oMF5Ee..Lvv8lq0KbUo98x7RC7sZmjKFkk/D.', 'XC4iWkGnU3', '2004-02-09 21:10:24', '2026-09-01 13:19:13'),
(100, 'Marta', 'xratkovic@hotmail.com', 1, '2025-11-20', 'gabrijela.novakovic', NULL, '2026-09-01 13:19:13', '$2y$12$N39LDmsci.Vs0evBc1xymuof5NwI8DcIYu8qB.Xia3H/Y3Qo7AJOS', 'mIfl0DUst5', '1993-12-09 12:19:22', '2026-09-01 13:19:13'),
(101, 'Šimun', 'lara98@modric.net', 0, '2022-04-26', 'vfilipovic', NULL, '2026-09-01 13:19:13', '$2y$12$tSzrDQdii9JeRP4MfUCXy.DOBP0UCIiAxOLp5F..TYJn9YPegff7q', 'kGgiqaefgm', '1976-12-05 00:08:40', '2026-09-01 13:19:14'),
(102, 'Vedran', 'marina20@ratkovic.com', 0, '2025-04-14', 'anja.horvatincic', NULL, '2026-09-01 13:19:14', '$2y$12$eo2UZAcvsBq2T5/l.vAsE.v3PEv14w0tkl5ZYLQlnxoAEyRnyS6Va', 'YppWJoGpQu', '1977-04-28 05:28:57', '2026-09-01 13:19:14'),
(103, 'Kristina', 'perkovic.katja@hotmail.com', 1, '2010-04-09', 'broz.fran', NULL, '2026-09-01 13:19:14', '$2y$12$BDCJxMpUEB0Ejzz.0jE4T.Ajysm6v/78qkNzBYLlgTW.KyePikMFa', 'uhUv93fifw', '1996-03-09 06:47:12', '2026-09-01 13:19:14'),
(104, 'Karlo', 'bozic.valentina@yahoo.com', 0, '2014-04-15', 'robert09', NULL, '2026-09-01 13:19:14', '$2y$12$ubPufuxNuI7y7bwVTnkwperPM7V.LVOZiaJBw84bpCXfiyKV9VkyO', 'sgcNwTDUDW', '1976-08-30 17:49:40', '2026-09-01 13:19:15'),
(105, 'Ivano', 'babic.franka@gmail.com', 1, '2023-03-01', 'stipe73', NULL, '2026-09-01 13:19:15', '$2y$12$hOKo6tzFXaaHdxMg5Z2Hrufw9csxlJXOjqvj8YRaNqzFTKjDk2DQy', 'cQg7xaQzn7', '1975-12-30 08:05:13', '2026-09-01 13:19:15'),
(106, 'Zvonimir', 'dblazevic@gmail.com', 0, '1986-08-24', 'eva33', NULL, '2026-09-01 13:19:15', '$2y$12$wr39Exs.Hv3EY2v5xX59euluH.JCD14FtlyCMag.6.wT7q/WA1JS6', 'rxtPL9TOll', '2017-05-22 18:07:29', '2026-09-01 13:19:15'),
(107, 'Valentina', 'robert68@yahoo.com', 1, '2001-03-27', 'qpetrovic', NULL, '2026-09-01 13:19:15', '$2y$12$RB71ZXmpRJdu.SeXfpUEtu65HwGbI168EsQn5o7o/3HsmrGNfLnpi', 'mQyb1mT3cX', '2008-07-28 09:08:58', '2026-09-01 13:19:16'),
(108, 'Nina', 'novak.simun@yahoo.com', 1, '1997-04-24', 'marino11', NULL, '2026-09-01 13:19:16', '$2y$12$hTVVYz/yKr/Us0gj7BIfj.jcFhzy57WMjIvfswmMvoHM2ZFKdoFXW', 'SYKDMa35oB', '2008-07-08 00:41:38', '2026-09-01 13:19:16'),
(109, 'Ema', 'roko.knezevic@nikolic.com', 0, '2006-02-02', 'imodric', NULL, '2026-09-01 13:19:16', '$2y$12$I3zKvDLwzSHri7tfTKs6sepTWg4ZE/mdGvt9QDERicDgqqHrl.l0e', 'ItyJcxtjZn', '2012-05-03 01:50:25', '2026-09-01 13:19:16'),
(110, 'Maša', 'danijel65@grgic.com', 0, '2014-10-18', 'ymarusic', NULL, '2026-09-01 13:19:16', '$2y$12$J.XjEGYRMVaDSz6guHVQeeINfLUUVjhEOWlGJ/A8.MHcbjIsQkvm.', '9QyNmr6BxP', '2011-11-07 19:00:48', '2026-09-01 13:19:16'),
(111, 'Bartol', 'petar.srna@gmail.com', 1, '1998-04-01', 'lara26', NULL, '2026-09-01 13:19:16', '$2y$12$XXsay9cExm02C7KDdQ.G9.3PEV6dG.KSP.UoQn7WXTByTk4pEiQXO', 'JcN332tF0d', '2010-05-27 00:25:15', '2026-09-01 13:19:17'),
(112, 'Petar', 'luka92@jankovic.com', 1, '1989-02-12', 'kraicsudar', NULL, '2026-09-01 13:19:17', '$2y$12$Ki8EDhgUNZ4x6lHF6Eh6G.5MSkcQ1Ub14GBOxiQRSshTenRn7l2na', 'o2RzRDDGs2', '2015-11-21 15:23:43', '2026-09-01 13:19:17'),
(113, 'Teo', 'marta07@modric.com', 0, '1980-08-22', 'tina.bogdanic', NULL, '2026-09-01 13:19:17', '$2y$12$ozWpHgXwqJueMtxWK3tMuOBKOCRTzz..e0BhratYFHQlBRGqejubK', 'hORwZapVoX', '1973-01-22 00:00:12', '2026-09-01 13:19:17'),
(114, 'Vice', 'matej.blazevic@yahoo.com', 0, '2019-12-29', 'borna17', NULL, '2026-09-01 13:19:17', '$2y$12$83DrUspXdzu1g.SvISQvG.zCRe89MtWpm0xubrIVQlW3nswQ9JsCS', 'MnacSrxjc1', '2026-05-15 01:19:52', '2026-09-01 13:19:18'),
(115, 'Lora', 'nika.mandzukic@vinkovic.com', 0, '2006-10-24', 'franic.ena', NULL, '2026-09-01 13:19:18', '$2y$12$nrVTm1WFOi6xptoSy.d7E.FtrMbPz83qMlyj9Tb4/wWGw1ytxCBJS', 'hNG7n6gBWV', '1971-11-01 14:41:20', '2026-09-01 13:19:18'),
(116, 'Filip', 'luka.modric@modric.com', 1, '1972-02-14', 'juric.adam', NULL, '2026-09-01 13:19:18', '$2y$12$RcGooZLk6MZmFJFu.BaxTOwTek6xm2F64lhTPu0HKt3cVvzvMz84q', 'CHCgQnopU8', '2016-12-23 07:42:20', '2026-09-01 13:19:18'),
(117, 'Lara', 'katarina41@yahoo.com', 1, '2005-05-30', 'bmarusic', NULL, '2026-09-01 13:19:18', '$2y$12$ov0rT2LEA8WCUzsm4oc4Ee6ieKsTCU5v4HBEeMmMIHB.kO3.8Ruge', 'CD2mbZixpE', '2024-06-07 19:01:19', '2026-09-01 13:19:19'),
(118, 'Josipa', 'vanessa43@hotmail.com', 1, '1981-10-13', 'gabriel28', NULL, '2026-09-01 13:19:19', '$2y$12$.bFZdcBANMZP7Y1l6NRqTOAD7hwWPAe/huptq93raPRMLj1Xc0ERm', 'kKGbe4VqCr', '2022-12-21 19:08:04', '2026-09-01 13:19:19'),
(119, 'Anja', 'elena.abramovic@kasun.net', 0, '1991-03-29', 'karlo08', NULL, '2026-09-01 13:19:19', '$2y$12$7aTafWZ.peKs1oOYtT6OEepUWWe7UE2UIFQN92SnuD9b9oxfYewmG', 'd7vV8oBFHB', '1976-05-18 10:21:22', '2026-09-01 13:19:19'),
(120, 'Elena', 'maras.ela@gmail.com', 0, '1989-04-11', 'mara35', NULL, '2026-09-01 13:19:19', '$2y$12$f2mrEbaDXQQbR61oFKy4uu5tSqteNyDiQ3.aSeDHJODHvTkeQyEk2', '1hUMPcD2RJ', '2011-03-19 11:33:21', '2026-09-01 13:19:19'),
(121, 'Benjamin', 'gabrijela73@horvat.info', 0, '2003-10-05', 'dunja.bogdanic', NULL, '2026-09-01 13:19:19', '$2y$12$aUJ9eJYv4kb94o9jA/2RzuLAFhmN1Or6U0FwUfLuK4HhWsXbaqwTa', 'QsStMyJdRM', '2009-11-17 05:07:09', '2026-09-01 13:19:20'),
(122, 'Juraj', 'sdragovic@matic.biz', 0, '1977-02-09', 'pbogdanic', NULL, '2026-09-01 13:19:20', '$2y$12$qQpxYcqIEZ28bImni1TbauR1YbHrxTKfCQxL.357vsNJv6ZnsxYzG', 'ebanuwIS0C', '1982-10-09 15:58:44', '2026-09-01 13:19:20'),
(123, 'Antonela', 'valentino17@cupic.net', 1, '1997-10-06', 'tamara43', NULL, '2026-09-01 13:19:20', '$2y$12$cO8Oz0HMMwTs3l8t0M6ey.iEu4GjxVQY62Up69wZpH9dcpcVZCZci', 'wMHY7jtEzR', '2012-01-25 07:31:34', '2026-09-01 13:19:20'),
(124, 'Ena', 'cupic.nora@raicsudar.com', 0, '2018-09-19', 'franjic.david', NULL, '2026-09-01 13:19:20', '$2y$12$5teYVWs2cM1iwJYfGBSYwO8nlyVAMvVvqXoP9lOdin2JWMrOPrN5.', 'VHViA4VDkX', '2010-03-27 14:32:47', '2026-09-01 13:19:21'),
(125, 'Nora', 'peric.toma@srna.com', 1, '2023-07-13', 'vlasic.masa', NULL, '2026-09-01 13:19:21', '$2y$12$sRBfWtb8Gu9j7qBwimWaz.ye4IzdRVSlic03JnbRtqOM7NbDr8qM6', '0hZ6ZepogR', '1976-01-22 07:14:59', '2026-09-01 13:19:21'),
(126, 'Mateo', 'marin.ivanovic@yahoo.com', 1, '2024-06-22', 'lcupic', NULL, '2026-09-01 13:19:21', '$2y$12$jYXzL1caNThJwl9ikiMVf.XPzpxxLG4bfXSCXi19wo26Ty3U2zFZK', 'hDrxawu8OW', '1982-04-05 19:04:21', '2026-09-01 13:19:21'),
(127, 'Dorian', 'hperic@gmail.com', 0, '1997-06-15', 'alen.srna', NULL, '2026-09-01 13:19:21', '$2y$12$an005BRPrSByzAPS6CEMS.XihaNZnsZSAkrEmG3wrphP9o6GrQKFu', 'A77tnDCbah', '1983-09-16 14:41:42', '2026-09-01 13:19:21'),
(128, 'Vanesa', 'osrna@zoric.com', 0, '2023-04-15', 'matej86', NULL, '2026-09-01 13:19:21', '$2y$12$6k1Kth6wHHH1m7JeWQBipOAZ2AgdeTJl8vz/YegMOjl2/zn7.QzDq', 'rql3ArAOGg', '1999-07-26 06:06:26', '2026-09-01 13:19:22'),
(129, 'Katja', 'zvonimir.marusic@tomic.com', 0, '2026-07-12', 'kosar.martina', NULL, '2026-09-01 13:19:22', '$2y$12$Gxc5mWQC0xVUoVSupx84q./n3JyLQdAikV0u3mVS5ZPpaMZKn6jFy', 'cQC5itisHF', '2024-03-03 07:04:40', '2026-09-01 13:19:22'),
(130, 'Roko', 'karla.horvatincic@gmail.com', 0, '2006-05-31', 'ekovac', NULL, '2026-09-01 13:19:22', '$2y$12$BQI5cQ3bpJKKmaCWvE6vN.kBXd8bAE.95N0oV2lX.eCsdHSm9nRmu', '9ztc427R8R', '2024-05-02 15:25:51', '2026-09-01 13:19:22'),
(131, 'Emil', 'gfranic@markovic.com', 1, '2001-12-20', 'ivan04', NULL, '2026-09-01 13:19:22', '$2y$12$xeG.lk49xvost0EF/5iaWui62JKMTS/EBUjKXfV0Rb/3lnZXLWXEq', 'tL6X4joTrw', '2001-03-07 17:20:57', '2026-09-01 13:19:23'),
(132, 'Matej', 'bogdanovic.tomislav@yahoo.com', 1, '2007-09-04', 'yzupan', NULL, '2026-09-01 13:19:23', '$2y$12$dATzdxX5Zawwf8Uz/fVyEuFrDZqWEDQ5p2MOpueNSreKbV.skKVeq', 'pMYnigkwGQ', '2018-10-21 11:41:13', '2026-09-01 13:19:23'),
(133, 'Mila', 'nika.kosar@mlakar.net', 0, '1996-05-08', 'tomic.mislav', NULL, '2026-09-01 13:19:23', '$2y$12$Isk3LHLJARXFMDW/hjfPpO7WuUoUvcRGyQM9xigIv3qXL3hwcLU9y', '5woU0X3P5A', '1982-07-18 20:20:13', '2026-09-01 13:19:23'),
(134, 'Vanesa', 'ktomcic@gmail.com', 0, '1987-06-13', 'vzupan', NULL, '2026-09-01 13:19:23', '$2y$12$EiJbgkETAAr5pbddTgLQ.udCt1tWXtr7ISKOu3vny4CDXvVYc2F06', 'NYQT3S9xgH', '2017-11-14 05:25:40', '2026-09-01 13:19:24'),
(135, 'Franko', 'horvatincic.tina@dragic.com', 1, '2009-06-16', 'nina96', NULL, '2026-09-01 13:19:24', '$2y$12$cSL0BEnunYoCAqf8Z8chOuwtoCQkZQNMNuZqYPWsW.o2qjHFU4jy6', 'ySYtaLW8Jt', '1973-08-26 20:04:15', '2026-09-01 13:19:24'),
(136, 'David', 'karla.lovren@gmail.com', 0, '2006-01-19', 'kristijan.raicsudar', NULL, '2026-09-01 13:19:24', '$2y$12$zlI86fO/M2rJK7EbaACP5eDAGEGbFkiH3KmFPdweF/sugC2TleMY2', 'bDF7llMk4i', '1974-03-23 03:56:54', '2026-09-01 13:19:24'),
(137, 'Vedran', 'martin.lovren@yahoo.com', 1, '2016-05-08', 'katarina60', NULL, '2026-09-01 13:19:24', '$2y$12$QyalOJPXVa2qm.kDUVeJBurhD7ovZkqBIqsXIctM/ScPnn3RiLLju', 'QuFXsA9FpC', '2000-01-14 11:53:22', '2026-09-01 13:19:25'),
(138, 'Branimir Netrebašić', 'branimir.netrebasic@gmail.com', 1, '2026-04-16', 'Brane', 'uploads/gray-wolf-closeup_3x4.jpg', NULL, '$2y$12$/OqqEuf1sMRBZJH4IlK6RugxZkzndECaGgGG6Oi/F.nLyoZkzdV56', NULL, '2026-08-23 16:22:51', '2026-08-24 01:37:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advanced_statistics`
--
ALTER TABLE `advanced_statistics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advanced_statistics_statistic_id_foreign` (`statistic_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_user_id_foreign` (`user_id`),
  ADD KEY `game_genre_id_foreign` (`genre_id`),
  ADD KEY `game_platform_id_foreign` (`platform_id`);

--
-- Indexes for table `game_genre`
--
ALTER TABLE `game_genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_genre_game_id_foreign` (`game_id`),
  ADD KEY `game_genre_genre_id_foreign` (`genre_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mdetails`
--
ALTER TABLE `mdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mdetails_mod_id_foreign` (`mod_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modification`
--
ALTER TABLE `modification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modification_game_id_foreign` (`game_id`),
  ADD KEY `modification_sequel_id_foreign` (`sequel_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `platform`
--
ALTER TABLE `platform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_game_id_foreign` (`game_id`),
  ADD KEY `profile_sequel_id_foreign` (`sequel_id`);

--
-- Indexes for table `sequel`
--
ALTER TABLE `sequel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sequel_game_id_foreign` (`game_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `statistics_sequel_id_foreign` (`sequel_id`),
  ADD KEY `statistics_game_id_foreign` (`game_id`);

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
-- AUTO_INCREMENT for table `advanced_statistics`
--
ALTER TABLE `advanced_statistics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `game_genre`
--
ALTER TABLE `game_genre`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mdetails`
--
ALTER TABLE `mdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `modification`
--
ALTER TABLE `modification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `platform`
--
ALTER TABLE `platform`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sequel`
--
ALTER TABLE `sequel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advanced_statistics`
--
ALTER TABLE `advanced_statistics`
  ADD CONSTRAINT `advanced_statistics_statistic_id_foreign` FOREIGN KEY (`statistic_id`) REFERENCES `statistics` (`id`);

--
-- Constraints for table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `game_platform_id_foreign` FOREIGN KEY (`platform_id`) REFERENCES `platform` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `game_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `game_genre`
--
ALTER TABLE `game_genre`
  ADD CONSTRAINT `game_genre_game_id_foreign` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `game_genre_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mdetails`
--
ALTER TABLE `mdetails`
  ADD CONSTRAINT `mdetails_mod_id_foreign` FOREIGN KEY (`mod_id`) REFERENCES `modification` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `modification`
--
ALTER TABLE `modification`
  ADD CONSTRAINT `modification_game_id_foreign` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `modification_sequel_id_foreign` FOREIGN KEY (`sequel_id`) REFERENCES `sequel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_game_id_foreign` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profile_sequel_id_foreign` FOREIGN KEY (`sequel_id`) REFERENCES `sequel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sequel`
--
ALTER TABLE `sequel`
  ADD CONSTRAINT `sequel_game_id_foreign` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `statistics`
--
ALTER TABLE `statistics`
  ADD CONSTRAINT `statistics_game_id_foreign` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `statistics_sequel_id_foreign` FOREIGN KEY (`sequel_id`) REFERENCES `sequel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
