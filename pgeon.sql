-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 31, 2017 at 04:33 PM
-- Server version: 5.7.19-0ubuntu0.16.04.1-log
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `question_id`, `answer`, `created_at`, `updated_at`) VALUES
(2, 6, 2, 'Test', '2017-08-17 17:16:48', '2017-08-17 17:16:48'),
(3, 3, 2, 'Test', '2017-08-17 17:18:02', '2017-08-17 17:18:02'),
(4, 14, 3, 'Hi Pearl', '2017-08-18 06:18:09', '2017-08-18 06:18:09'),
(5, 6, 4, 'reply', '2017-08-18 19:59:39', '2017-08-18 19:59:39'),
(7, 6, 6, 'Hey', '2017-08-19 18:15:07', '2017-08-19 18:15:07'),
(9, 6, 9, 'This is another vote', '2017-08-21 02:24:26', '2017-08-21 02:24:26'),
(10, 5, 14, 'this is from bala', '2017-08-23 16:22:01', '2017-08-23 16:22:01'),
(11, 24, 14, 'twitter ramrumram@gmail.com', '2017-08-23 16:22:47', '2017-08-23 16:22:47'),
(12, 2, 16, 'My Response', '2017-08-23 17:22:35', '2017-08-23 17:22:35'),
(13, 3, 16, 'No My Response', '2017-08-23 17:23:17', '2017-08-23 17:23:17'),
(15, 3, 17, 'Very cool', '2017-08-23 17:28:52', '2017-08-23 17:28:52'),
(16, 25, 18, 'Cool test', '2017-08-25 23:36:41', '2017-08-25 23:36:41'),
(17, 26, 20, 'Woohoo I made it!', '2017-08-25 23:44:49', '2017-08-25 23:44:49'),
(18, 25, 22, 'You should feel so special...', '2017-08-25 23:50:22', '2017-08-25 23:50:22'),
(19, 14, 23, 'Response yo.', '2017-08-25 23:56:55', '2017-08-25 23:56:55'),
(20, 26, 24, 'Another etst', '2017-08-27 05:27:45', '2017-08-27 05:27:45');

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
('ramrumram@gmail.com', '$2y$10$jJxGGbUkU.lXw4Zeqhrs7.RVOnHeXhioAXdjhHnmQk4.0vYQ6Bqb2', '2017-08-10 09:16:07');

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
  `expiring_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `accepted_answer` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `user_id`, `question`, `solved`, `created_at`, `updated_at`, `status`, `published_at`, `expiring_at`, `accepted_answer`) VALUES
(1, 14, '<p>test</p>', 0, '2017-08-17 17:14:20', '2017-08-17 17:14:20', 'PUBLISHED', NULL, '2017-08-17 17:14:20', 0),
(2, 14, '<p>testt</p>', 0, '2017-08-17 17:14:46', '2017-08-17 17:14:46', 'PUBLISHED', NULL, '2017-08-17 17:17:46', 0),
(3, 2, '<p>Test Question</p>', 0, '2017-08-18 06:17:57', '2017-08-18 06:17:57', 'PUBLISHED', NULL, '2017-08-18 07:20:57', 0),
(4, 14, '<p>some test</p>', 0, '2017-08-18 19:58:58', '2017-08-18 19:58:58', 'PUBLISHED', NULL, '2017-08-18 20:01:58', 0),
(5, 14, 'Test', 0, '2017-08-19 17:34:41', '2017-08-19 17:34:41', 'PUBLISHED', NULL, '2017-08-19 17:34:41', 0),
(6, 14, '<p>Tes test</p>', 0, '2017-08-19 18:13:17', '2017-08-19 18:13:17', 'PUBLISHED', NULL, '2017-08-19 18:16:17', 0),
(7, 14, '<p>More tests.</p>', 0, '2017-08-20 17:43:01', '2017-08-20 17:43:01', 'PUBLISHED', NULL, '2017-08-20 17:46:01', 0),
(8, 14, '<p>Hey hey&nbsp;</p>', 0, '2017-08-21 02:23:09', '2017-08-21 02:23:09', 'PUBLISHED', NULL, '2017-08-21 02:23:09', 0),
(9, 14, '<p>Test</p>', 0, '2017-08-21 02:23:23', '2017-08-21 02:23:23', 'PUBLISHED', NULL, '2017-08-21 02:26:23', 0),
(10, 14, '<p>Another test</p>', 0, '2017-08-21 18:07:05', '2017-08-21 18:07:05', 'PUBLISHED', NULL, '2017-08-21 18:10:05', 0),
(11, 14, 'Test', 0, '2017-08-22 16:06:48', '2017-08-22 16:06:48', 'PUBLISHED', NULL, '2017-08-22 16:09:48', 0),
(12, 6, '<p>15 mins test by jc@test.com</p>', 0, '2017-08-22 16:23:30', '2017-08-22 16:23:30', 'PUBLISHED', NULL, '2017-08-22 16:38:30', 0),
(13, 14, '<p>More tests</p>', 0, '2017-08-23 00:54:27', '2017-08-23 00:54:27', 'PUBLISHED', NULL, '2017-08-23 00:57:27', 0),
(14, 6, '<p>question from jac</p>', 0, '2017-08-23 16:21:32', '2017-08-23 16:21:32', 'PUBLISHED', NULL, '2017-08-23 16:24:32', 0),
(15, 14, '<p>Test 1</p>', 0, '2017-08-23 17:18:47', '2017-08-23 17:18:47', 'PUBLISHED', NULL, '2017-08-23 17:21:47', 0),
(16, 14, '<p>Test</p>', 0, '2017-08-23 17:22:17', '2017-08-23 17:22:17', 'PUBLISHED', NULL, '2017-08-23 17:25:17', 0),
(17, 14, '<p>Test 2</p>', 0, '2017-08-23 17:27:58', '2017-08-23 17:27:58', 'PUBLISHED', NULL, '2017-08-23 17:30:58', 0),
(18, 14, '<p>More tests =(</p>', 0, '2017-08-25 23:34:38', '2017-08-25 23:38:40', 'PUBLISHED', NULL, '2017-08-25 23:37:38', 16),
(19, 14, '<p>I got questions?</p>', 0, '2017-08-25 23:41:51', '2017-08-25 23:41:51', 'PUBLISHED', NULL, '2017-08-25 23:41:51', 0),
(20, 14, '<p>Forgot to add time...</p>', 0, '2017-08-25 23:42:10', '2017-08-25 23:42:10', 'PUBLISHED', NULL, '2017-08-25 23:45:10', 0),
(21, 26, '<p>Now I get to ask the questions!</p>', 0, '2017-08-25 23:49:32', '2017-08-25 23:49:32', 'PUBLISHED', NULL, '2017-08-25 23:49:32', 0),
(22, 26, '<p><span style=\"color: rgb(51, 51, 51); background-color: rgb(221, 223, 226);\"><b><i><u>Now I get to ask the questions!</u></i></b></span><br></p>', 0, '2017-08-25 23:49:56', '2017-08-25 23:49:56', 'PUBLISHED', NULL, '2017-08-25 23:52:56', 0),
(23, 26, '<p>I like to make tests.</p>', 0, '2017-08-25 23:54:59', '2017-08-25 23:54:59', 'PUBLISHED', NULL, '2017-08-25 23:57:59', 0),
(24, 14, '<p>This is a new test</p>', 0, '2017-08-27 05:27:30', '2017-08-27 05:30:44', 'PUBLISHED', NULL, '2017-08-27 05:30:30', 20),
(25, 14, 'Test', 0, '2017-08-29 17:12:29', '2017-08-29 17:12:29', 'PUBLISHED', NULL, '2017-08-29 17:15:29', 0);

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
(1, 2, 'main', 'sub_B1ORiQWZncSLzY', 'pgeon_monthly', 1, NULL, NULL, '2017-07-14 04:44:11', '2017-07-14 04:44:11'),
(2, 14, 'main', 'sub_B1OdZoI3azIaER', 'pgeon_monthly', 1, NULL, NULL, '2017-07-14 04:55:37', '2017-07-14 04:55:37'),
(3, 15, 'main', 'sub_B4amSJqYPUrQm9', 'pgeon_monthly', 1, NULL, NULL, '2017-07-22 17:40:43', '2017-07-22 17:40:43'),
(4, 26, 'main', 'sub_BHQONK5J8QSLhQ', 'pgeon_monthly', 1, NULL, NULL, '2017-08-25 23:49:15', '2017-08-25 23:49:15');

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
(1, 1, 'Admin', 'admin@admin.com', '', '$2y$10$QXCKwWMssG4XZfY30UTnberfWKkzDmRkZjdT5pQVxQWXrsF//3DDS', 'xxiAdUL6mgKEGw4psyqk45oaomI5WKnf1mplxzjehQn0Uk4ll0ywSUUUYOp5', '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL, NULL, NULL, NULL, 'my bio goes here', NULL, NULL, '1'),
(2, 3, 'ram', 'ram@gmail.com', '', '$2y$10$bhMuTRz8Vr70AprzSkkXi./RWpfM5.3G8Zs9P2IM3GEeL.EnU3a86', 'oaNBAnZc4bpZPlc6Zbr3ZaWTyNmOYyyJ5GRprDl7R5LkqFrTmu18uovxzFlL', '2017-05-22 20:31:01', '2017-07-14 04:44:21', 'cus_B1ORhMdx3Fy92o', 'Visa', '4242', NULL, 'I am not a good guy', NULL, NULL, 'ram'),
(3, 2, 'bal', 'bala@gmail.com', '', '$2y$10$qHvf4G84gqqvnkcErNXz0uqj9jaaKfeFcmbiSbFDxr31xmDYgOsrW', 'WMy8xzuuvTlELnMDumSSd4lBIaoXnSC9wudtfy4ALhN5sABc1Zy02FLj6vMs', '2017-06-01 08:44:59', '2017-08-23 17:26:07', NULL, NULL, NULL, NULL, 'Some cool things about me', NULL, NULL, '3'),
(4, 2, 'jac', 'jack@gmail.com', '', '$2y$10$waOUu3GoLt6MT6Fp4ySSguYMIzaqpuz65j88i3wbRBvj90vt8nQ22', NULL, '2017-06-01 08:51:55', '2017-06-01 08:51:55', NULL, NULL, NULL, NULL, '', NULL, NULL, '4'),
(5, 2, 'ba', 'bal@gmail.com', '', '$2y$10$D3kFGVEp0w/IljuUJRShEuLJjnIliPypWqGqq5C266TY8Pmd8dnoy', 'Mu9zcVD3XztXhuYFWHhlARkZVfdSKOtwrZONk0qNw50UCCsqbiQ95sGRa906', '2017-06-10 04:14:43', '2017-06-10 04:14:43', NULL, NULL, NULL, NULL, '', NULL, NULL, '5'),
(6, 3, 'Jacob Thornton', 'jc@test.com', '', '$2y$10$OR1bEfvmMmMgqngCB7Auqujr8S8lwzceOF2OsD2eeZN2ogcXYpFaG', '6xXOeqDs2ETW995mMKDbg21gah08IUCsUHEsYVbsSdv2scNrRF37YrwlXkjv', '2017-06-19 18:52:24', '2017-06-19 18:52:24', NULL, NULL, NULL, NULL, 'around the galaxy', NULL, NULL, '6'),
(7, 3, 'jak Dave Gamache', 'dave@test.com', '', '$2y$10$qyb/rnJ3yOyYlePczbsCguuc01fv9Uyoq39as/.rNAXvq/RdV7lZm', NULL, '2017-06-19 19:04:11', '2017-06-19 19:04:11', NULL, NULL, NULL, NULL, 'sailing into dreams', NULL, NULL, '7'),
(8, 3, 'Mark Otto', 'mark@tes.com', '', '$2y$10$5CVkPSQbNPLuAQPlFEfPUumiqRTwUffPdS/r1ryKukemBRswio1Qu', NULL, '2017-06-19 19:05:49', '2017-06-19 19:05:49', NULL, NULL, NULL, NULL, 'Love nature', NULL, NULL, '8'),
(11, 2, 'one', 'on3@gmil.com', '1499249565.jpg', '$2y$10$FOzNS/rj6FJ9.d8oc/TGSO.6qz1RgPa8hzzRx.cArfOP7hgePbxr.', 'J2WEMRCq9yFGGDGF1G1o0PsUE8yKynaspVFD05mBOxyMY3rF2w2RG0Jpw1Y1', '2017-07-05 03:30:52', '2017-07-05 04:42:45', NULL, NULL, NULL, NULL, 'dfd', NULL, NULL, 'g'),
(12, 2, 'prasanth', NULL, '', NULL, '9ufcBmmGzfDIRXDzum902rjOltLcd2aJZyqiQQpPoIuhpXDrnTd1UbFXUxjs', '2017-07-05 15:23:15', '2017-07-05 15:27:17', NULL, NULL, NULL, NULL, 'what', 'twitter', '877457031795326976', NULL),
(13, 2, 'Bala Bala', 'bala223344@gmail.com', '', NULL, '6ssECFETTAtsvXR9BliJiBvmD5kmQ6malMpgQkHcRqaCXwy9DhYai0MUfs4q', '2017-07-05 15:33:01', '2017-07-05 15:33:01', NULL, NULL, NULL, NULL, NULL, 'facebook', '1983433158560439', NULL),
(14, 3, 'Russ', NULL, '', NULL, 'L5gSZjqPHGsKYCjloydNqSWCreWsLwCuuuWsMhhQb71m91WolmFupwZf0ojy', '2017-07-05 15:35:42', '2017-07-22 17:36:40', 'cus_B1OdrXXwBQKRHK', 'Visa', '4242', NULL, 'My mom thinks I\'m cool', 'twitter', '267011945', 'russ'),
(15, 3, 'Cody', 'navalinvestor@gmail.com', '', '$2y$10$hE9vchyuJDs4So0ZVOGXdOhkSEWoAKOtC0UA/YcprArVWMQZq7pAm', NULL, '2017-07-22 17:34:57', '2017-07-22 17:41:02', 'cus_B4amObq4px2JWP', 'Visa', '4242', NULL, 'Poop', NULL, NULL, 'Cody'),
(16, 2, 'demo', 'demo@demo.com', '', '$2y$10$j1Sdxo0PdKTlN7gTXJzUouzzE1Acd01ImT5Vp21aOYtcyboUsVDnO', 'Dk7F9Mo00mrpl2XvqwUNIn4MpyCxvbPC2OJZ1F693eOrhJvJIlvJWcMFdouv', '2017-07-27 19:02:24', '2017-07-27 19:02:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 2, 'demo2', 'demo@demo2.com', '', '$2y$10$7wVaGWCykvlYXSAz/VJjH.6olcBMbnU5hAixA7e9eypGBbxUE93f2', 'KoHaSGZbzJWNLxDuE9kwGBTTrWd4WDxn6QSj5vGghVSoXs0K1dTQ8SmjrXG0', '2017-07-27 19:04:21', '2017-07-27 19:04:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 2, 'testtest', '123@456.com', '', '$2y$10$0tUpSQ/EMrVqeNVXRez5I.9floXDCAEk4djNUJOy9GenA8vBQHzRS', NULL, '2017-07-29 15:53:25', '2017-07-29 15:55:25', NULL, NULL, NULL, NULL, 'Prasanth is so cool', NULL, NULL, NULL),
(19, 2, 'Jeffy Lube', NULL, '', NULL, '8aofbLYF7O3SRZ35rGE4KNDCBxENC4lxUzXAXeNWMQgIt4HwmX2aOA0Zfb4B', '2017-08-02 19:22:32', '2017-08-02 19:22:33', NULL, NULL, NULL, NULL, NULL, 'twitter', '12673262', NULL),
(20, 2, 'ram', 'ramrumram@gmail.com', '', '$2y$10$efUp13yXGVqXrlkXcW/VtuyJBnQLiNGy6vYGefiLifoVUydSRsDWm', 'aFE0hjHxNR5hwj2UsgSyDCl7wm8MRq0DsaaQZHWwdqgiIcLmCdXxap1nt15P', '2017-08-09 10:39:40', '2017-08-09 10:39:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 2, 'Another', '123@123.COM', '', '$2y$10$UPk9MKMtuIs0n/v0dCYS8.EcEr7Fsvix7MA6KQX3xTWQFL016sHaW', NULL, '2017-08-15 06:20:05', '2017-08-15 06:20:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '123'),
(22, 2, 'Refit', NULL, '', NULL, 'UXv4OLA8v4C3AbuDNBQitH2kM8oAIMyHnfKcQGMjA1CrYU5dDu2xiZVaK0EO', '2017-08-15 17:22:39', '2017-08-15 17:22:39', NULL, NULL, NULL, NULL, NULL, 'twitter', '3343045918', NULL),
(23, 2, 'Jyoti', 'speak2pearl@gmail.com', '', '$2y$10$aUw8oSDApnRcmSW19Ap2UOxHGzM1v7YuVlIsaobqpFH21vp/Ncoha', 'VuOwI9bEmBV1u5HJhdICwP3p4SHOwpt0Lm9DS1QgLhWvPJg2fJfk9esK9cXo', '2017-08-18 06:16:17', '2017-08-18 06:16:17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 2, 'rameshkumar', NULL, '', NULL, '2gbTJgUH0Lz8UKGwg44ZcVUmk8DVfLmEHTGTexEta3qdVhychJZDcRglrpJs', '2017-08-23 16:22:33', '2017-08-23 16:22:33', NULL, NULL, NULL, NULL, NULL, 'twitter', '39559531', NULL),
(25, 2, 'demo1', 'demo1@demo1.com', '', '$2y$10$lolrCluYV.jlH6IVv9gKbuCwX.s/GK0InRspWUVAc.ZwYVn2.xtqe', 'em7SieJ3mCe6qBbEOAWe2tr2z4svznKDKHKGWzAB3XFyzr9dJ3UGp5JBvqxn', '2017-08-25 23:35:54', '2017-08-25 23:52:23', NULL, NULL, NULL, NULL, 'I\'m not real either', NULL, NULL, 'demo1'),
(26, 3, 'demo2', 'demo2@demo2.com', 'users/August2017/97tcMWe93HzJtgEkblec.png', '$2y$10$MYRvPFZIH9CcCYKsBGROq.BucWmDjO589Rxi1MeQPEsDyiYPNcpHW', 'KfH48GOzAto4wYtsyBcGmYzpcEGSJvtJEL5ojLBokYt4X3JPoJEWKQt9bTnw', '2017-08-25 23:40:03', '2017-08-29 06:08:56', 'cus_BHQOYwqymWHT92', 'Visa', '4242', NULL, 'I\'m not real', NULL, NULL, 'demo2'),
(27, 2, 'Pgeon App', NULL, '', NULL, '3GJ8EhCFl1uy41wFqxqm09kER1g6BAN9vHjWeIbVDMIKsTepMeW8VEglU6lr', '2017-08-29 06:10:13', '2017-08-29 06:10:13', NULL, NULL, NULL, NULL, NULL, 'twitter', '895433051852996608', NULL);

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
(31, 1, 14),
(45, 1, 22),
(59, 1, 27),
(30, 2, 3),
(23, 2, 5),
(20, 2, 14),
(46, 2, 22),
(61, 2, 27),
(32, 3, 14),
(47, 3, 22),
(62, 3, 27),
(33, 4, 14),
(63, 4, 27),
(34, 5, 14),
(48, 5, 22),
(64, 5, 27),
(18, 6, 2),
(21, 6, 14),
(49, 6, 22),
(65, 6, 27),
(19, 7, 1),
(35, 7, 14),
(50, 7, 22),
(66, 7, 27),
(36, 8, 14),
(51, 8, 22),
(67, 8, 27),
(37, 11, 14),
(69, 11, 27),
(38, 12, 14),
(70, 12, 27),
(39, 13, 14),
(71, 13, 27),
(53, 14, 2),
(25, 14, 16),
(26, 14, 17),
(28, 14, 18),
(29, 14, 19),
(52, 14, 22),
(56, 14, 26),
(72, 14, 27),
(24, 15, 5),
(22, 15, 14),
(27, 15, 18),
(73, 15, 27),
(40, 16, 14),
(74, 16, 27),
(41, 17, 14),
(75, 17, 27),
(42, 18, 14),
(78, 18, 27),
(43, 19, 14),
(77, 19, 27),
(44, 20, 14),
(76, 20, 27),
(79, 21, 27),
(54, 22, 14),
(80, 22, 27),
(81, 23, 27),
(82, 24, 27),
(55, 25, 26),
(83, 25, 27),
(57, 26, 14),
(58, 26, 25),
(84, 26, 27);

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
(2, 4, 1, NULL, NULL),
(2, 6, 1, NULL, NULL),
(3, 2, 1, NULL, NULL),
(3, 12, 1, NULL, NULL),
(5, 11, 1, NULL, NULL),
(14, 18, 1, NULL, NULL),
(24, 10, 1, NULL, NULL),
(25, 19, 1, NULL, NULL),
(25, 20, 1, NULL, NULL);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `user_followings`
--
ALTER TABLE `user_followings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
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
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
