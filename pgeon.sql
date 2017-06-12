-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 12, 2017 at 12:11 PM
-- Server version: 5.7.18
-- PHP Version: 5.6.30

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

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Hello World', 'Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.', '<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', 'pages/AAgCCnqHfLlRub9syUdw.jpg', 'hello-world', 'Yar Meta Description', 'Keyword1, Keyword2', 'ACTIVE', '2017-05-17 07:37:07', '2017-05-17 07:37:07');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, 'Lorem Ipsum Post', NULL, 'This is the excerpt for the Lorem Ipsum Post', '<p>This is the body of the lorem ipsum post</p>', 'posts/nlje9NZQ7bTMYOUG4lF1.jpg', 'lorem-ipsum-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2017-05-17 07:37:07', '2017-05-17 07:37:07'),
(2, 0, NULL, 'My Sample Post', NULL, 'This is the excerpt for the sample Post', '<p>This is the body for the sample post, which includes the body.</p>\n                <h2>We can use all kinds of format!</h2>\n                <p>And include a bunch of other stuff.</p>', 'posts/7uelXHi85YOfZKsoS6Tq.jpg', 'my-sample-post', 'Meta Description for sample post', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2017-05-17 07:37:07', '2017-05-17 07:37:07'),
(3, 0, NULL, 'Latest Post', NULL, 'This is the excerpt for the latest post', '<p>This is the body for the latest post</p>', 'posts/9txUSY6wb7LTBSbDPrD9.jpg', 'latest-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2017-05-17 07:37:07', '2017-05-17 07:37:07'),
(4, 0, NULL, 'Yarr Post', NULL, 'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.', '<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>\n<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>\n<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>', 'posts/yuk1fBwmKKZdY2qR1ZKM.jpg', 'yarr-post', 'this be a meta descript', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2017-05-17 07:37:07', '2017-05-17 07:37:07');

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
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `user_id`, `question`, `solved`, `created_at`, `updated_at`, `status`) VALUES
(1, 5, 'kjhkjh', 0, '2017-06-12 05:18:10', '2017-06-12 05:18:10', 'PENDING');

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
(2, 'user', 'Normal User', '2017-05-17 07:37:07', '2017-05-17 07:37:07');

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

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags_questions`
--

CREATE TABLE `tags_questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tags_questions`
--

INSERT INTO `tags_questions` (`id`, `tag_id`, `question_id`, `created_at`, `updated_at`) VALUES
(1, 0, 3, NULL, NULL),
(2, 0, 4, NULL, NULL),
(3, 0, 5, NULL, NULL),
(4, 0, 6, NULL, NULL),
(5, 0, 1, NULL, NULL);

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
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `password`, `remember_token`, `created_at`, `updated_at`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`) VALUES
(1, 1, 'Admin', 'admin@admin.com', 'users/default.png', '$2y$10$QXCKwWMssG4XZfY30UTnberfWKkzDmRkZjdT5pQVxQWXrsF//3DDS', '61wi4D8w8OcGGTZDB4C5Tpax9qZEn31PTbCzg35zfYW01HrjOjKZ02sIKq2J', '2017-05-17 07:37:07', '2017-05-17 07:37:07', NULL, NULL, NULL, NULL),
(2, 2, 'ram', 'ram@gmail.com', 'users/default.png', '$2y$10$bhMuTRz8Vr70AprzSkkXi./RWpfM5.3G8Zs9P2IM3GEeL.EnU3a86', '9pFm0PsV0hpo33hHHxBmSAKmJhcnhYnYYq16mVf7uRjrTmdsmGiPN5bxhFRH', '2017-05-22 20:31:01', '2017-05-22 20:31:01', NULL, NULL, NULL, NULL),
(3, 2, 'bal', 'bala@gmail.com', 'users/default.png', '$2y$10$qHvf4G84gqqvnkcErNXz0uqj9jaaKfeFcmbiSbFDxr31xmDYgOsrW', 'EECLN152wKVUXWAmO3sNt1c27uykw0dnIBYTC4ZzjMJC2ibQBLhUfCXcJG11', '2017-06-01 08:44:59', '2017-06-01 08:44:59', NULL, NULL, NULL, NULL),
(4, 2, 'jac', 'jack@gmail.com', 'users/default.png', '$2y$10$waOUu3GoLt6MT6Fp4ySSguYMIzaqpuz65j88i3wbRBvj90vt8nQ22', NULL, '2017-06-01 08:51:55', '2017-06-01 08:51:55', NULL, NULL, NULL, NULL),
(5, 2, 'ba', 'bal@gmail.com', 'users/default.png', '$2y$10$D3kFGVEp0w/IljuUJRShEuLJjnIliPypWqGqq5C266TY8Pmd8dnoy', 'Mu9zcVD3XztXhuYFWHhlARkZVfdSKOtwrZONk0qNw50UCCsqbiQ95sGRa906', '2017-06-10 04:14:43', '2017-06-10 04:14:43', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `answer_id` int(11) DEFAULT NULL,
  `vote` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags_questions`
--
ALTER TABLE `tags_questions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_questions_tag_id_question_id_unique` (`tag_id`,`question_id`);

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
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tags_questions`
--
ALTER TABLE `tags_questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
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
