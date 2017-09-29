-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 28, 2017 at 05:15 PM
-- Server version: 5.7.18-log
-- PHP Version: 7.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pgeon`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `manually_chosen_as_top` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `question_id`, `answer`, `created_at`, `updated_at`, `manually_chosen_as_top`) VALUES
(1, 5, 1, 'this is bala\'s answer take it or leave it', '2017-08-22 01:00:59', '2017-08-22 01:00:59', 0),
(2, 2, 1, 'ram@gmail.com answer', '2017-08-22 01:01:52', '2017-08-22 01:01:52', 0),
(3, 7, 1, 'this is mark', '2017-08-22 03:56:20', '2017-08-22 03:56:20', 0),
(4, 8, 1, 'real mark here', '2017-08-22 05:39:26', '2017-08-22 05:39:26', 0),
(5, 2, 2, 'ram@gmil again', '2017-08-23 08:30:21', '2017-08-23 08:30:21', 0),
(6, 8, 2, 'mark here get me some votes', '2017-08-23 08:30:59', '2017-08-23 08:30:59', 0),
(7, 5, 2, 'bala here dont expect votes', '2017-08-23 08:31:11', '2017-08-23 08:31:11', 0),
(8, 8, 3, 'mark here', '2017-08-23 08:35:47', '2017-08-23 08:35:47', 0),
(9, 6, 3, 'jc@test.com here', '2017-08-23 08:36:00', '2017-08-23 08:36:00', 0),
(10, 5, 3, 'bala herer', '2017-08-23 08:36:06', '2017-08-23 08:36:06', 0),
(23, 2, 25, 'rame;s answer', '2017-09-12 09:25:49', '2017-09-12 09:25:49', 0),
(26, 5, 30, 'my first answer', '2017-09-18 20:33:13', '2017-09-18 20:33:13', 0),
(27, 5, 31, 'take msy ans', '2017-09-19 04:50:32', '2017-09-25 02:33:50', 1),
(28, 6, 32, 'want my answers', '2017-09-20 09:58:50', '2017-09-20 09:58:50', 0),
(29, 4, 33, 'will garner some votes', '2017-09-25 02:34:48', '2017-09-25 02:34:48', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `order`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Category 1', 'category-1', '2017-05-17 07:37:07', '2017-05-17 07:37:07'),
(2, NULL, 1, 'Category 2', 'category-2', '2017-05-17 07:37:07', '2017-05-17 07:37:07');

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '', 1),
(2, 1, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, '', 2),
(3, 1, 'category_id', 'text', 'Category', 1, 0, 1, 1, 1, 0, '', 3),
(4, 1, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '', 4),
(5, 1, 'excerpt', 'text_area', 'excerpt', 1, 0, 1, 1, 1, 1, '', 5),
(6, 1, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, '', 6),
(7, 1, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '\n{\n    \"resize\": {\n        \"width\": \"1000\",\n        \"height\": \"null\"\n    },\n    \"quality\": \"70%\",\n    \"upsize\": true,\n    \"thumbnails\": [\n        {\n            \"name\": \"medium\",\n            \"scale\": \"50%\"\n        },\n        {\n            \"name\": \"small\",\n            \"scale\": \"25%\"\n        },\n        {\n            \"name\": \"cropped\",\n            \"crop\": {\n                \"width\": \"300\",\n                \"height\": \"250\"\n            }\n        }\n    ]\n}', 7),
(8, 1, 'slug', 'text', 'slug', 1, 0, 1, 1, 1, 1, '\n{\n    \"slugify\": {\n        \"origin\": \"title\",\n        \"forceUpdate\": true\n    }\n}', 8),
(9, 1, 'meta_description', 'text_area', 'meta_description', 1, 0, 1, 1, 1, 1, '', 9),
(10, 1, 'meta_keywords', 'text_area', 'meta_keywords', 1, 0, 1, 1, 1, 1, '', 10),
(11, 1, 'status', 'select_dropdown', 'status', 1, 1, 1, 1, 1, 1, '\n{\n    \"default\": \"DRAFT\",\n    \"options\": {\n        \"PUBLISHED\": \"published\",\n        \"DRAFT\": \"draft\",\n        \"PENDING\": \"pending\"\n    }\n}', 11),
(12, 1, 'created_at', 'timestamp', 'created_at', 0, 1, 1, 0, 0, 0, '', 12),
(13, 1, 'updated_at', 'timestamp', 'updated_at', 0, 0, 0, 0, 0, 0, '', 13),
(14, 2, 'id', 'number', 'id', 1, 0, 0, 0, 0, 0, '', 1),
(15, 2, 'author_id', 'text', 'author_id', 1, 0, 0, 0, 0, 0, '', 2),
(16, 2, 'title', 'text', 'title', 1, 1, 1, 1, 1, 1, '', 3),
(17, 2, 'excerpt', 'text_area', 'excerpt', 1, 0, 1, 1, 1, 1, '', 4),
(18, 2, 'body', 'rich_text_box', 'body', 1, 0, 1, 1, 1, 1, '', 5),
(19, 2, 'slug', 'text', 'slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\"}}', 6),
(20, 2, 'meta_description', 'text', 'meta_description', 1, 0, 1, 1, 1, 1, '', 7),
(21, 2, 'meta_keywords', 'text', 'meta_keywords', 1, 0, 1, 1, 1, 1, '', 8),
(22, 2, 'status', 'select_dropdown', 'status', 1, 1, 1, 1, 1, 1, '{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}', 9),
(23, 2, 'created_at', 'timestamp', 'created_at', 1, 1, 1, 0, 0, 0, '', 10),
(24, 2, 'updated_at', 'timestamp', 'updated_at', 1, 0, 0, 0, 0, 0, '', 11),
(25, 2, 'image', 'image', 'image', 0, 1, 1, 1, 1, 1, '', 12),
(26, 3, 'id', 'number', 'id', 1, 0, 0, 0, 0, 0, '', 1),
(27, 3, 'name', 'text', 'name', 1, 1, 1, 1, 1, 1, '', 2),
(28, 3, 'email', 'text', 'email', 1, 1, 1, 1, 1, 1, '', 3),
(29, 3, 'password', 'password', 'password', 1, 0, 0, 1, 1, 0, '', 4),
(30, 3, 'remember_token', 'text', 'remember_token', 0, 0, 0, 0, 0, 0, '', 5),
(31, 3, 'created_at', 'timestamp', 'created_at', 0, 1, 1, 0, 0, 0, '', 6),
(32, 3, 'updated_at', 'timestamp', 'updated_at', 0, 0, 0, 0, 0, 0, '', 7),
(33, 3, 'avatar', 'image', 'avatar', 0, 1, 1, 1, 1, 1, '', 8),
(34, 5, 'id', 'number', 'id', 1, 0, 0, 0, 0, 0, '', 1),
(35, 5, 'name', 'text', 'name', 1, 1, 1, 1, 1, 1, '', 2),
(36, 5, 'created_at', 'timestamp', 'created_at', 0, 0, 0, 0, 0, 0, '', 3),
(37, 5, 'updated_at', 'timestamp', 'updated_at', 0, 0, 0, 0, 0, 0, '', 4),
(38, 4, 'id', 'number', 'id', 1, 0, 0, 0, 0, 0, '', 1),
(39, 4, 'parent_id', 'select_dropdown', 'parent_id', 0, 0, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 2),
(40, 4, 'order', 'text', 'order', 1, 1, 1, 1, 1, 1, '{\"default\":1}', 3),
(41, 4, 'name', 'text', 'name', 1, 1, 1, 1, 1, 1, '', 4),
(42, 4, 'slug', 'text', 'slug', 1, 1, 1, 1, 1, 1, '', 5),
(43, 4, 'created_at', 'timestamp', 'created_at', 0, 0, 1, 0, 0, 0, '', 6),
(44, 4, 'updated_at', 'timestamp', 'updated_at', 0, 0, 0, 0, 0, 0, '', 7),
(45, 6, 'id', 'number', 'id', 1, 0, 0, 0, 0, 0, '', 1),
(46, 6, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '', 2),
(47, 6, 'created_at', 'timestamp', 'created_at', 0, 0, 0, 0, 0, 0, '', 3),
(48, 6, 'updated_at', 'timestamp', 'updated_at', 0, 0, 0, 0, 0, 0, '', 4),
(49, 6, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, '', 5),
(50, 1, 'seo_title', 'text', 'seo_title', 0, 1, 1, 1, 1, 1, '', 14),
(51, 1, 'featured', 'checkbox', 'featured', 1, 1, 1, 1, 1, 1, '', 15),
(52, 3, 'role_id', 'text', 'role_id', 1, 1, 1, 1, 1, 1, '', 9);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `controller`, `description`, `generate_permissions`, `server_side`, `created_at`, `updated_at`) VALUES
(1, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', '', '', 1, 0, '2017-05-17 07:37:06', '2017-05-17 07:37:06'),
(2, 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', '', '', 1, 0, '2017-05-17 07:37:06', '2017-05-17 07:37:06'),
(3, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', '', '', 1, 0, '2017-05-17 07:37:06', '2017-05-17 07:37:06'),
(4, 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', '', '', 1, 0, '2017-05-17 07:37:06', '2017-05-17 07:37:06'),
(5, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', '', '', 1, 0, '2017-05-17 07:37:06', '2017-05-17 07:37:06'),
(6, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', '', '', 1, 0, '2017-05-17 07:37:06', '2017-05-17 07:37:06');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2017-05-17 07:37:06', '2017-05-17 07:37:06');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '/admin', '_self', 'voyager-boat', NULL, NULL, 1, '2017-05-17 07:37:06', '2017-05-17 07:37:06', NULL, NULL),
(4, 1, 'Users', '/admin/users', '_self', 'voyager-person', NULL, NULL, 4, '2017-05-17 07:37:07', '2017-06-01 09:05:17', NULL, NULL),
(7, 1, 'Roles', '/admin/roles', '_self', 'voyager-lock', NULL, NULL, 3, '2017-05-17 07:37:07', '2017-06-01 09:05:17', NULL, NULL),
(9, 1, 'Menu Builder', '/admin/menus', '_self', 'voyager-list', NULL, NULL, 6, '2017-05-17 07:37:07', '2017-06-01 09:05:17', NULL, NULL),
(11, 1, 'Settings', '/admin/settings', '_self', 'voyager-settings', NULL, NULL, 5, '2017-05-17 07:37:07', '2017-06-01 09:05:17', NULL, NULL),
(12, 1, 'Questions', 'admin/questions', '_self', 'voyager-question', '#000000', NULL, 2, '2017-06-01 09:05:02', '2017-06-01 09:05:17', NULL, '');

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
(21, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `target_user` int(11) NOT NULL,
  `seen` int(1) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `target_user`, `seen`, `created_at`) VALUES
(60, 1, 0, 1505091266),
(61, 5, 0, 1505091266),
(72, 1, 0, 1505129976),
(73, 5, 0, 1505129976),
(76, 1, 0, 1505208463),
(77, 5, 0, 1505208463),
(78, 1, 0, 1505214338),
(79, 5, 0, 1505214338),
(80, 1, 0, 1505216053),
(81, 5, 0, 1505216053),
(82, 3, 0, 1505708944),
(83, 5, 0, 1505708944),
(84, 3, 0, 1505709002),
(85, 5, 0, 1505709002),
(90, 1, 0, 1505786033),
(91, 5, 0, 1505786033),
(92, 1, 0, 1505816342),
(93, 5, 0, 1505816342),
(94, 3, 0, 1505921276),
(95, 5, 0, 1505921276),
(96, 1, 0, 1506326670),
(97, 5, 0, 1506326671);

-- --------------------------------------------------------

--
-- Table structure for table `notification_question_expired`
--

CREATE TABLE `notification_question_expired` (
  `question_id` int(11) NOT NULL,
  `notification_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification_question_posted`
--

CREATE TABLE `notification_question_posted` (
  `question_id` int(11) NOT NULL,
  `notification_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_question_posted`
--

INSERT INTO `notification_question_posted` (`question_id`, `notification_id`) VALUES
(14, 60),
(14, 61),
(20, 72),
(20, 73),
(22, 76),
(22, 77),
(23, 78),
(23, 79),
(24, 80),
(24, 81),
(26, 82),
(26, 83),
(27, 84),
(27, 85),
(30, 90),
(30, 91),
(31, 92),
(31, 93),
(32, 94),
(32, 95),
(33, 96),
(33, 97);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ramrumram@gmail.com', '$2y$10$.DnoSb4ozttWzd/pBQYRxOINWnLgKGBJZDPST.6.fxG9wQQhhz5lO', '2017-08-10 03:28:41'),
('test@test.com', '$2y$10$/yImiD5YBFqOFPvFLJ29u.rWdk/MlN65.7DWIcGbj8HPMImHCaZPS', '2017-09-19 06:45:07'),
('bala@gmail.com', '$2y$10$ArbZxee/1lHAq31slmGMB.flWsqeF8vt9tPZobaZeQx4Srbc6ac6K', '2017-09-19 06:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permission_group_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`, `permission_group_id`) VALUES
(1, 'browse_admin', NULL, '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(2, 'browse_database', NULL, '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(3, 'browse_media', NULL, '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(4, 'browse_settings', NULL, '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(5, 'browse_menus', 'menus', '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(6, 'read_menus', 'menus', '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(7, 'edit_menus', 'menus', '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(8, 'add_menus', 'menus', '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(9, 'delete_menus', 'menus', '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(10, 'browse_pages', 'pages', '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(11, 'read_pages', 'pages', '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(12, 'edit_pages', 'pages', '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(13, 'add_pages', 'pages', '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(14, 'delete_pages', 'pages', '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(15, 'browse_roles', 'roles', '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(16, 'read_roles', 'roles', '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(17, 'edit_roles', 'roles', '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(18, 'add_roles', 'roles', '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(19, 'delete_roles', 'roles', '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(20, 'browse_users', 'users', '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(21, 'read_users', 'users', '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(22, 'edit_users', 'users', '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(23, 'add_users', 'users', '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(24, 'delete_users', 'users', '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(25, 'browse_posts', 'posts', '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(26, 'read_posts', 'posts', '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(27, 'edit_posts', 'posts', '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(28, 'add_posts', 'posts', '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(29, 'delete_posts', 'posts', '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(30, 'browse_categories', 'categories', '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(31, 'read_categories', 'categories', '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(32, 'edit_categories', 'categories', '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(33, 'add_categories', 'categories', '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(34, 'delete_categories', 'categories', '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL),
(35, 'can_be_followed', NULL, NULL, NULL, NULL),
(36, 'can_reply_to_questions', NULL, NULL, NULL, NULL),
(37, 'can_post_questions', NULL, NULL, NULL, NULL),
(38, 'can_have_vanity_url', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_groups`
--

CREATE TABLE `permission_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `solved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'PUBLISHED',
  `published_at` timestamp NULL DEFAULT NULL,
  `expiring_at` int(11) DEFAULT NULL,
  `accepted_answer` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `user_id`, `question`, `solved`, `created_at`, `updated_at`, `status`, `published_at`, `expiring_at`, `accepted_answer`) VALUES
(24, 6, 'firs jdfh ksdjfhsdtsquest', 0, '2017-09-12 06:04:13', '2017-09-12 06:04:13', 'PUBLISHED', NULL, 1505227033, 0),
(25, 8, 'marks\'s question', 0, '2017-09-12 09:09:31', '2017-09-12 10:26:13', 'PUBLISHED', NULL, 1505231773, 0),
(27, 2, 'fitst uest', 0, '2017-09-17 23:00:02', '2017-09-17 23:00:02', 'PUBLISHED', NULL, 1505745062, 0),
(30, 6, 'eexpeeting som answsres bor', 0, '2017-09-18 20:23:53', '2017-09-20 10:13:04', 'PUBLISHED', NULL, 1505814893, 26),
(31, 6, 'another question..some one answer pls', 0, '2017-09-19 04:49:02', '2017-09-25 02:33:59', 'PUBLISHED', NULL, 1505899202, 27),
(32, 2, 'my times wat what', 0, '2017-09-20 09:57:56', '2017-09-20 09:59:43', 'PUBLISHED', NULL, 1505921353, 28),
(33, 6, 'gonna give you some points', 0, '2017-09-25 02:34:30', '2017-09-25 02:35:50', 'PUBLISHED', NULL, 1506326729, 29);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2017-05-17 07:37:07', '2017-05-17 07:37:07'),
(2, 'user', 'Standar Account', '2017-05-17 07:37:07', '2017-06-19 18:50:02'),
(3, 'member', 'Member Account', '2017-06-19 18:50:39', '2017-06-19 18:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`) VALUES
(1, 'title', 'Site Title', 'Pgeon', '', 'text', 1),
(2, 'description', 'Site Description', 'Site Description', '', 'text', 2),
(3, 'logo', 'Site Logo', '', '', 'image', 3),
(4, 'admin_bg_image', 'Admin Background Image', '', '', 'image', 9),
(5, 'admin_title', 'Admin Title', 'Pgeon', '', 'text', 4),
(6, 'admin_description', 'Admin Description', 'Admin', '', 'text', 5),
(7, 'admin_loader', 'Admin Loader', '', '', 'image', 6),
(8, 'admin_icon_image', 'Admin Icon Image', '', '', 'image', 7),
(9, 'google_analytics_client_id', 'Google Analytics Client ID', '', '', 'text', 9);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `name`, `stripe_id`, `stripe_plan`, `quantity`, `trial_ends_at`, `ends_at`, `created_at`, `updated_at`) VALUES
(1, 2, 'main', 'sub_B0o9q01Ydo8iZh', 'pgeon_monthly', 1, NULL, NULL, '2017-07-12 09:43:24', '2017-07-12 09:43:24');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 1, 'pt', 'Post', '2017-05-17 07:37:07', '2017-05-17 07:37:07'),
(2, 'data_types', 'display_name_singular', 2, 'pt', 'Página', '2017-05-17 07:37:07', '2017-05-17 07:37:07'),
(3, 'data_types', 'display_name_singular', 3, 'pt', 'Utilizador', '2017-05-17 07:37:07', '2017-05-17 07:37:07'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2017-05-17 07:37:07', '2017-05-17 07:37:07'),
(5, 'data_types', 'display_name_singular', 5, 'pt', 'Menu', '2017-05-17 07:37:07', '2017-05-17 07:37:07'),
(6, 'data_types', 'display_name_singular', 6, 'pt', 'Função', '2017-05-17 07:37:07', '2017-05-17 07:37:07'),
(7, 'data_types', 'display_name_plural', 1, 'pt', 'Posts', '2017-05-17 07:37:07', '2017-05-17 07:37:07'),
(8, 'data_types', 'display_name_plural', 2, 'pt', 'Páginas', '2017-05-17 07:37:07', '2017-05-17 07:37:07'),
(9, 'data_types', 'display_name_plural', 3, 'pt', 'Utilizadores', '2017-05-17 07:37:07', '2017-05-17 07:37:07'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2017-05-17 07:37:07', '2017-05-17 07:37:07'),
(11, 'data_types', 'display_name_plural', 5, 'pt', 'Menus', '2017-05-17 07:37:07', '2017-05-17 07:37:07'),
(12, 'data_types', 'display_name_plural', 6, 'pt', 'Funções', '2017-05-17 07:37:07', '2017-05-17 07:37:07'),
(13, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2017-05-17 07:37:07', '2017-05-17 07:37:07'),
(14, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2017-05-17 07:37:07', '2017-05-17 07:37:07'),
(15, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2017-05-17 07:37:07', '2017-05-17 07:37:07'),
(16, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2017-05-17 07:37:07', '2017-05-17 07:37:07'),
(17, 'menu_items', 'title', 2, 'pt', 'Media', '2017-05-17 07:37:07', '2017-05-17 07:37:07'),
(18, 'menu_items', 'title', 3, 'pt', 'Publicações', '2017-05-17 07:37:07', '2017-05-17 07:37:07'),
(19, 'menu_items', 'title', 4, 'pt', 'Utilizadores', '2017-05-17 07:37:07', '2017-05-17 07:37:07'),
(20, 'menu_items', 'title', 5, 'pt', 'Categorias', '2017-05-17 07:37:07', '2017-05-17 07:37:07'),
(21, 'menu_items', 'title', 6, 'pt', 'Páginas', '2017-05-17 07:37:07', '2017-05-17 07:37:07'),
(22, 'menu_items', 'title', 7, 'pt', 'Funções', '2017-05-17 07:37:07', '2017-05-17 07:37:07'),
(23, 'menu_items', 'title', 8, 'pt', 'Ferramentas', '2017-05-17 07:37:07', '2017-05-17 07:37:07'),
(24, 'menu_items', 'title', 9, 'pt', 'Menus', '2017-05-17 07:37:07', '2017-05-17 07:37:07'),
(25, 'menu_items', 'title', 10, 'pt', 'Base de dados', '2017-05-17 07:37:07', '2017-05-17 07:37:07'),
(26, 'menu_items', 'title', 11, 'pt', 'Configurações', '2017-05-17 07:37:07', '2017-05-17 07:37:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `bio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `password`, `remember_token`, `created_at`, `updated_at`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`, `bio`, `provider`, `provider_id`, `slug`) VALUES
(1, 1, 'Admin', 'admin@admin.com', '', '$2y$10$QXCKwWMssG4XZfY30UTnberfWKkzDmRkZjdT5pQVxQWXrsF//3DDS', 'HtPURCERWnMjdk56baUK6da2iyqcM07hgfhN9VUfDgEqoeI21rmVKHJkIGu5', '2017-05-17 02:07:07', '2017-05-17 02:07:07', NULL, NULL, NULL, NULL, 'my bio goes here', NULL, NULL, '1'),
(2, 3, 'ram', 'ram@gmail.com', '', '$2y$10$bhMuTRz8Vr70AprzSkkXi./RWpfM5.3G8Zs9P2IM3GEeL.EnU3a86', 'bnOmeS4Ld9eFLbEDlwAbH7pATtejnzM4SqKOi28RFEx1bcqRoaHxq2ucCDFJ', '2017-05-22 15:01:01', '2017-07-12 04:13:22', 'cus_B0fFoa4B6OFnhD', 'Visa', '4242', NULL, 'I am not a good guy', NULL, NULL, 'dras'),
(3, 2, 'bal', 'bala223344@gmail.com', '', '$2y$10$dehD5gC99eX/mGW003Pc7uaIF0b5KN/ZmDR.0epSy9WisLABY4gOG', 'YBmZiDh7KrQ2kZzpkmTl9rzftYquJSrwEUmXqLFA3c5MXUUVbFMnMq4J8H3k', '2017-06-01 03:14:59', '2017-09-19 07:04:18', NULL, NULL, NULL, NULL, 'good bal', NULL, NULL, ''),
(4, 2, 'jac', 'jack@gmail.com', '1505825657.png', '$2y$10$waOUu3GoLt6MT6Fp4ySSguYMIzaqpuz65j88i3wbRBvj90vt8nQ22', 'l5eQJH9IV6Qz5JEGK6vxNaePpHpJU1e5t0MX5TGNIWKqfKWVyoWaZi00aPaQ', '2017-06-01 03:21:55', '2017-09-19 07:26:16', NULL, NULL, NULL, NULL, 'what..', NULL, NULL, '45'),
(5, 2, 'ba', 'bal@gmail.com', '', '$2y$10$D3kFGVEp0w/IljuUJRShEuLJjnIliPypWqGqq5C266TY8Pmd8dnoy', 'FeLHEdTuAaZfXWkPNJ6EuX7F0XQUedwbac0UwSWM9uDo7n4aQTa5bYQs8WbK', '2017-06-09 22:44:43', '2017-08-11 04:05:06', NULL, NULL, NULL, NULL, '', NULL, NULL, 'LAS'),
(6, 3, 'Jacob Thornton', 'jc@test.com', '1499249439.jpg', '$2y$10$OR1bEfvmMmMgqngCB7Auqujr8S8lwzceOF2OsD2eeZN2ogcXYpFaG', '1gr7Za5lturZNsESejbqZxyCjW72sOEk5W15EQxOXgECAExoDe0bhjelZJ5J', '2017-06-19 13:22:24', '2017-06-19 13:22:24', NULL, NULL, NULL, NULL, 'around the galaxy', NULL, NULL, 'jac'),
(7, 3, 'jak Dave Gamache', 'dave@test.com', '', '$2y$10$qyb/rnJ3yOyYlePczbsCguuc01fv9Uyoq39as/.rNAXvq/RdV7lZm', 'gDSThYaE6BPcUvVHiOmWKwm1kTdejNhSkdODf8vNOSK7v7QOrd2rc86wZuKP', '2017-06-19 13:34:11', '2017-06-19 13:34:11', NULL, NULL, NULL, NULL, 'sailing into dreams', NULL, NULL, '7'),
(8, 3, 'Mark Otto', 'mark@tes.com', '', '$2y$10$5CVkPSQbNPLuAQPlFEfPUumiqRTwUffPdS/r1ryKukemBRswio1Qu', 'wMlWpZ9BFDG5O5vc0oyNhaHoMcgQiErLwUWg47k7eWvVUQhkqp00kGlPZpC3', '2017-06-19 13:35:49', '2017-06-19 13:35:49', NULL, NULL, NULL, NULL, 'Love nature', NULL, NULL, '8'),
(9, 2, 'Ram Kumar', 'ramrumram@gmail.com', '', NULL, 'L1F7QQuGGxJqD1vs7sO8KbavngM8SGDx7CysXfEUQyWJy9OWtgmYfO0ypN10', '2017-06-20 23:50:50', '2017-06-20 23:50:51', NULL, NULL, NULL, NULL, NULL, 'facebook', '544005219110827', '9'),
(10, 2, 'prasanth', NULL, '', NULL, '0YCCpR1Mn08bfb9cGcSzHV2s21QbOgmep3AnV2EVMj22GyF128RzaJBEaSiO', '2017-06-21 00:29:01', '2017-07-05 03:01:31', NULL, NULL, NULL, NULL, 'dfdf', 'twitter', '877457031795326976', ''),
(11, 2, 'one', 'on3@gmil.com', '1499249565.png', '$2y$10$FOzNS/rj6FJ9.d8oc/TGSO.6qz1RgPa8hzzRx.cArfOP7hgePbxr.', 'J2WEMRCq9yFGGDGF1G1o0PsUE8yKynaspVFD05mBOxyMY3rF2w2RG0Jpw1Y1', '2017-07-04 22:00:52', '2017-07-04 23:12:45', NULL, NULL, NULL, NULL, 'dfd', NULL, NULL, 'g'),
(12, 2, 'Яuss', NULL, '', NULL, 'snKOSsEZjFOBj3X65dxbzsW38RyQVFNagO7c5aPi0UiuuQxqfPZ2IfZQKWC6', '2017-09-01 00:42:59', '2017-09-01 00:42:59', NULL, NULL, NULL, NULL, NULL, 'twitter', '267011945', NULL),
(13, 2, 'test', 'test@test.com', '', '$2y$10$0ns0Hw2.PJU2ekrYV895UOI9omfLWYfxkqR4FlaRuEIkBCQ0F2K0m', NULL, '2017-09-07 12:43:49', '2017-09-07 12:43:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 2, 'testtest', 'test2@test.com', '', '$2y$10$AfrKfNfQKcrAPx2bsXOsxeOQwkuvMZVRd6ymqLXg4z8Y2eSGWNH8S', NULL, '2017-09-10 14:36:02', '2017-09-10 14:36:02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_followings`
--

CREATE TABLE `user_followings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `followed_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_followings`
--

INSERT INTO `user_followings` (`id`, `user_id`, `followed_by`) VALUES
(20, 2, 3),
(33, 4, 1),
(40, 4, 5),
(31, 5, 2),
(34, 6, 1),
(39, 6, 5),
(19, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `user_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `vote` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`user_id`, `answer_id`, `vote`, `created_at`, `updated_at`) VALUES
(2, 13, 1, NULL, NULL),
(2, 15, 1, NULL, NULL),
(2, 22, 1, NULL, NULL),
(2, 29, 1, NULL, NULL),
(5, 2, 1, NULL, NULL),
(5, 5, -1, NULL, NULL),
(5, 6, 1, NULL, NULL),
(5, 8, 1, NULL, NULL),
(5, 23, 1, NULL, NULL),
(6, 8, 1, NULL, NULL),
(6, 11, 1, NULL, NULL),
(7, 1, 1, NULL, NULL),
(7, 2, 1, NULL, NULL),
(7, 12, 1, NULL, NULL),
(8, 10, 1, NULL, NULL),
(8, 12, 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

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
-- Indexes for table `notification_question_expired`
--
ALTER TABLE `notification_question_expired`
  ADD KEY `question_expired` (`notification_id`);

--
-- Indexes for table `notification_question_posted`
--
ALTER TABLE `notification_question_posted`
  ADD KEY `question_potsed` (`notification_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Indexes for table `permission_groups`
--
ALTER TABLE `permission_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permission_groups_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_followings`
--
ALTER TABLE `user_followings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`followed_by`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`user_id`,`answer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `permission_groups`
--
ALTER TABLE `permission_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user_followings`
--
ALTER TABLE `user_followings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notification_question_expired`
--
ALTER TABLE `notification_question_expired`
  ADD CONSTRAINT `question_expired` FOREIGN KEY (`notification_id`) REFERENCES `notifications` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notification_question_posted`
--
ALTER TABLE `notification_question_posted`
  ADD CONSTRAINT `question_potsed` FOREIGN KEY (`notification_id`) REFERENCES `notifications` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
