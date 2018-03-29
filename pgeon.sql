-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 23, 2018 at 09:16 AM
-- Server version: 5.7.18-log
-- PHP Version: 7.1.8

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
  `answer` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `manually_chosen_as_top` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `question_id`, `answer`, `created_at`, `updated_at`, `manually_chosen_as_top`) VALUES
(3, 6, 2, 'dummy', '2018-01-02 20:38:00', '2018-01-02 20:38:00', 0),
(6, 4, 5, 'dummy', '2018-01-02 21:28:47', '2018-01-02 21:28:47', 0),
(10, 4, 7, 'dummy', '2018-01-08 03:18:47', '2018-01-08 03:18:47', 0),
(11, 59, 7, 'dummy', '2018-01-08 03:21:35', '2018-01-08 03:21:35', 0),
(14, 4, 9, 'dummy', '2018-01-10 08:53:46', '2018-01-10 08:53:46', 0),
(21, 59, 11, 'dummy', '2018-01-15 07:21:25', '2018-01-15 07:21:25', 0),
(24, 4, 49, 'dummy', '2018-01-31 04:08:17', '2018-01-31 04:08:17', 0),
(25, 5, 49, 'dummy', '2018-01-31 04:08:23', '2018-01-31 04:08:23', 0),
(26, 6, 59, 'dummy', '2018-02-02 00:45:32', '2018-02-02 00:45:32', 0),
(27, 6, 60, 'dummy', '2018-02-02 05:07:52', '2018-02-02 05:07:52', 0),
(29, 59, 61, 'dummy', '2018-02-02 05:25:11', '2018-02-02 05:25:11', 0),
(33, 59, 71, 'dummy', '2018-02-06 08:41:40', '2018-02-06 08:41:40', 0),
(47, 80, 81, 'dummy', '2018-02-09 02:12:38', '2018-02-09 02:12:38', 0),
(48, 79, 82, 'dummy', '2018-02-09 02:33:17', '2018-02-09 02:33:17', 0),
(52, 59, 105, 'wjksdjf slkfjslkfjslkfj sfkjslfkjslfkjslkfj slkfj slfkjslkfj slkf jslfkjslkfjlskfjs kfjsflksj flkjsflksjf %%^%^%^%^lksjf', '2018-02-15 09:49:08', '2018-02-15 09:49:08', 0),
(62, 4, 107, 'dfjskfjhsdfsfsfdfjskfjhsdfsfsfdfjskfjhsdfsfsfdfjskfjhsdfsfsfdfjskfjhsdfsfsfdfjskfjhsdfsfsfdfjskfjhsdfsfsfdfjskfjhsdfsfsf', '2018-02-21 05:48:38', '2018-02-21 10:05:10', 0),
(63, 6, 111, 'some an swer', '2018-02-21 06:10:39', '2018-02-21 06:10:39', 0),
(64, 5, 107, 'bala answser', '2018-02-21 07:28:15', '2018-02-21 10:05:10', 1),
(65, 59, 107, 'mar test answer', '2018-02-21 07:28:42', '2018-02-21 10:05:10', 0),
(66, 59, 115, 'marksn ansfer', '2018-02-23 00:02:18', '2018-02-23 00:02:18', 0),
(67, 4, 117, 'all r check', '2018-02-23 00:14:16', '2018-02-23 00:14:16', 0),
(68, 6, 119, 'is it good?', '2018-03-21 05:28:23', '2018-03-21 05:28:23', 0);

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
(7, 1, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 7),
(8, 1, 'slug', 'text', 'slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true}}', 8),
(9, 1, 'meta_description', 'text_area', 'meta_description', 1, 0, 1, 1, 1, 1, '', 9),
(10, 1, 'meta_keywords', 'text_area', 'meta_keywords', 1, 0, 1, 1, 1, 1, '', 10),
(11, 1, 'status', 'select_dropdown', 'status', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}', 11),
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
(29, 3, 'password', 'password', 'password', 0, 0, 0, 1, 1, 0, '', 4),
(30, 3, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"roles\",\"pivot\":\"0\"}', 10),
(31, 3, 'remember_token', 'text', 'remember_token', 0, 0, 0, 0, 0, 0, '', 5),
(32, 3, 'created_at', 'timestamp', 'created_at', 0, 1, 1, 0, 0, 0, '', 6),
(33, 3, 'updated_at', 'timestamp', 'updated_at', 0, 0, 0, 0, 0, 0, '', 7),
(34, 3, 'avatar', 'image', 'avatar', 0, 1, 1, 1, 1, 1, '', 8),
(35, 5, 'id', 'number', 'id', 1, 0, 0, 0, 0, 0, '', 1),
(36, 5, 'name', 'text', 'name', 1, 1, 1, 1, 1, 1, '', 2),
(37, 5, 'created_at', 'timestamp', 'created_at', 0, 0, 0, 0, 0, 0, '', 3),
(38, 5, 'updated_at', 'timestamp', 'updated_at', 0, 0, 0, 0, 0, 0, '', 4),
(39, 4, 'id', 'number', 'id', 1, 0, 0, 0, 0, 0, '', 1),
(40, 4, 'parent_id', 'select_dropdown', 'parent_id', 0, 0, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 2),
(41, 4, 'order', 'text', 'order', 1, 1, 1, 1, 1, 1, '{\"default\":1}', 3),
(42, 4, 'name', 'text', 'name', 1, 1, 1, 1, 1, 1, '', 4),
(43, 4, 'slug', 'text', 'slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\"}}', 5),
(44, 4, 'created_at', 'timestamp', 'created_at', 0, 0, 1, 0, 0, 0, '', 6),
(45, 4, 'updated_at', 'timestamp', 'updated_at', 0, 0, 0, 0, 0, 0, '', 7),
(46, 6, 'id', 'number', 'id', 1, 0, 0, 0, 0, 0, '', 1),
(47, 6, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '', 2),
(48, 6, 'created_at', 'timestamp', 'created_at', 0, 0, 0, 0, 0, 0, '', 3),
(49, 6, 'updated_at', 'timestamp', 'updated_at', 0, 0, 0, 0, 0, 0, '', 4),
(50, 6, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, '', 5),
(51, 1, 'seo_title', 'text', 'seo_title', 0, 1, 1, 1, 1, 1, '', 14),
(52, 1, 'featured', 'checkbox', 'featured', 1, 1, 1, 1, 1, 1, '', 15),
(53, 3, 'role_id', 'text', 'role_id', 1, 1, 1, 1, 1, 1, '', 9);

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
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `created_at`, `updated_at`) VALUES
(1, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', '', '', 1, 0, '2018-03-21 06:50:02', '2018-03-21 06:50:02'),
(2, 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, '', '', 1, 0, '2018-03-21 06:50:02', '2018-03-21 06:50:02'),
(3, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', '', '', 1, 0, '2018-03-21 06:50:02', '2018-03-21 06:50:02'),
(4, 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, '', '', 1, 0, '2018-03-21 06:50:02', '2018-03-21 06:50:02'),
(5, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, '2018-03-21 06:50:02', '2018-03-21 06:50:02'),
(6, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, '', '', 1, 0, '2018-03-21 06:50:02', '2018-03-21 06:50:02');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `k` varchar(500) NOT NULL,
  `v` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `k`, `v`, `created_at`, `updated_at`) VALUES
(1, 'mamamam', 'what valu', '2018-03-21 07:53:02', '2018-03-21 07:53:02');

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
(1, 'admin', '2018-03-21 06:50:04', '2018-03-21 06:50:04');

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
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2018-03-21 06:50:04', '2018-03-21 06:50:04', 'voyager.dashboard', NULL),
(2, 1, 'Roles', '/admin/roles', '_self', 'voyager-lock', '#000000', NULL, 4, '2018-03-21 06:50:04', '2018-03-21 21:29:42', NULL, ''),
(4, 1, 'Users', '/admin/users', '_self', 'voyager-person', '#000000', NULL, 3, '2018-03-21 06:50:04', '2018-03-21 21:27:03', NULL, ''),
(7, 1, 'Questions', 'admin/questions', '_self', 'voyager-question', '#000000', NULL, 2, '2018-03-21 06:50:05', '2018-03-21 21:26:01', NULL, ''),
(9, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, NULL, 8, '2018-03-21 06:50:05', '2018-03-21 21:29:42', 'voyager.menus.index', NULL),
(10, 1, 'Database', '', '_self', 'voyager-data', NULL, 8, 1, '2018-03-21 06:50:05', '2018-03-21 21:29:42', 'voyager.database.index', NULL),
(11, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 8, 2, '2018-03-21 06:50:05', '2018-03-21 21:29:42', 'voyager.compass.index', NULL),
(12, 1, 'Settings', '/admin/settings', '_self', 'voyager-settings', '#000000', NULL, 10, '2018-03-21 06:50:05', '2018-03-21 21:29:42', NULL, ''),
(13, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 8, 3, '2018-03-21 06:50:08', '2018-03-21 21:29:42', 'voyager.hooks', NULL),
(14, 1, 'Coupons', 'admin/coupons', '_self', 'voyager-tag', '#00ffff', NULL, 11, '2018-03-22 09:38:56', '2018-03-22 09:38:56', NULL, '');

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
(2, '2016_01_01_000000_add_voyager_user_fields', 2),
(3, '2016_01_01_000000_create_data_types_table', 2),
(4, '2016_01_01_000000_create_pages_table', 2),
(5, '2016_01_01_000000_create_posts_table', 2),
(6, '2016_02_15_204651_create_categories_table', 2),
(7, '2016_05_19_173453_create_menu_table', 2),
(8, '2016_10_21_190000_create_roles_table', 2),
(9, '2016_10_21_190000_create_settings_table', 2),
(10, '2016_11_30_135954_create_permission_table', 2),
(11, '2016_11_30_141208_create_permission_role_table', 2),
(12, '2016_12_26_201236_data_types__add__server_side', 2),
(13, '2017_01_13_000000_add_route_to_menu_items_table', 2),
(14, '2017_01_14_005015_create_translations_table', 2),
(15, '2017_01_15_000000_add_permission_group_id_to_permissions_table', 2),
(16, '2017_01_15_000000_create_permission_groups_table', 2),
(17, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 2),
(18, '2017_03_06_000000_add_controller_to_data_types_table', 2),
(19, '2017_04_11_000000_alter_post_nullable_fields_table', 2),
(20, '2017_04_21_000000_add_order_to_data_rows_table', 2),
(21, '2017_07_05_210000_add_policyname_to_data_types_table', 2),
(22, '2017_08_05_000000_add_group_to_settings_table', 2),
(23, '2018_03_22_083751_create_stripe_webhook_calls_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `target_user` int(11) NOT NULL,
  `seen` int(1) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `type` varchar(50) NOT NULL COMMENT 'question_posted,answer_accepted,user_followed,general,votes_earned',
  `meta` json NOT NULL COMMENT 'will be a json of all data',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `target_user`, `seen`, `created_at`, `type`, `meta`, `updated_at`) VALUES
(2, 59, 0, 1516105969, 'question_posted', '{\"created_by\": 6, \"question_id\": 20}', '2018-01-16 18:02:49'),
(4, 59, 0, 1516105991, 'question_posted', '{\"created_by\": 6, \"question_id\": 21}', '2018-01-16 18:03:11'),
(6, 59, 0, 1516198643, 'question_posted', '{\"created_by\": 6, \"question_id\": 22}', '2018-01-17 19:47:23'),
(7, 59, 0, 1516279622, 'user_followed', '{\"followed_by\": 6}', '2018-01-18 18:17:02'),
(9, 59, 0, 1516290650, 'user_followed', '{\"followed_by\": 4}', '2018-01-18 21:20:50'),
(11, 59, 0, 1516364565, 'question_posted', '{\"created_by\": 6, \"question_id\": 23}', '2018-01-19 17:52:45'),
(12, 68, 0, 1516586821, 'user_followed', '{\"followed_by\": 4}', '2018-01-22 07:37:01'),
(13, 70, 0, 1516587349, 'user_followed', '{\"followed_by\": 4}', '2018-01-22 07:45:49'),
(14, 2, 0, 1516587399, 'user_followed', '{\"followed_by\": 4}', '2018-01-22 07:46:39'),
(16, 59, 0, 1516606565, 'question_posted', '{\"created_by\": 6, \"question_id\": 25}', '2018-01-22 13:06:05'),
(36, 59, 0, 1516632251, 'question_posted', '{\"created_by\": 4, \"question_id\": 42}', '2018-01-22 20:14:11'),
(38, 59, 0, 1516632264, 'question_posted', '{\"created_by\": 4, \"question_id\": 43}', '2018-01-22 20:14:24'),
(40, 59, 0, 1516686500, 'question_posted', '{\"created_by\": 4, \"question_id\": 44}', '2018-01-23 11:18:20'),
(42, 59, 0, 1516686505, 'question_posted', '{\"created_by\": 4, \"question_id\": 45}', '2018-01-23 11:18:25'),
(44, 59, 0, 1516686511, 'question_posted', '{\"created_by\": 4, \"question_id\": 46}', '2018-01-23 11:18:31'),
(45, 59, 0, 1516686728, 'question_posted', '{\"created_by\": 4, \"question_id\": 47}', '2018-01-23 11:22:08'),
(50, 59, 0, 1517483304, 'answer_accepted', '{\"question_id\": 11}', '2018-02-01 16:38:24'),
(52, 5, 0, 1517483336, 'answer_accepted', '{\"question_id\": 6}', '2018-02-01 16:38:56'),
(61, 59, 0, 1517552067, 'question_posted', '{\"created_by\": 4, \"question_id\": 59}', '2018-02-02 11:44:27'),
(64, 59, 0, 1517567815, 'question_posted', '{\"created_by\": 4, \"question_id\": 60}', '2018-02-02 16:06:55'),
(67, 59, 0, 1517568803, 'question_posted', '{\"created_by\": 4, \"question_id\": 61}', '2018-02-02 16:23:23'),
(69, 59, 0, 1517920378, 'question_posted', '{\"created_by\": 4, \"question_id\": 62}', '2018-02-06 18:02:58'),
(71, 59, 0, 1517920391, 'question_posted', '{\"created_by\": 4, \"question_id\": 63}', '2018-02-06 18:03:11'),
(81, 75, 0, 1518088195, 'user_followed', '{\"followed_by\": 4}', '2018-02-08 16:39:55'),
(82, 75, 0, 1518088215, 'user_followed', '{\"followed_by\": 6}', '2018-02-08 16:40:15'),
(102, 80, 0, 1518162203, 'answer_accepted', '{\"question_id\": 81}', '2018-02-09 13:13:23'),
(125, 59, 0, 1518692041, 'question_posted', '{\"created_by\": 4, \"question_id\": 103}', '2018-02-15 16:24:01'),
(127, 59, 0, 1518692065, 'question_posted', '{\"created_by\": 4, \"question_id\": 104}', '2018-02-15 16:24:25'),
(129, 59, 0, 1518705228, 'question_posted', '{\"created_by\": 4, \"question_id\": 105}', '2018-02-15 20:03:48'),
(131, 59, 0, 1519121699, 'question_posted', '{\"created_by\": 4, \"question_id\": 106}', '2018-02-20 15:44:59'),
(134, 6, 0, 1519181391, 'user_followed', '{\"followed_by\": 5}', '2018-02-21 08:19:51'),
(135, 5, 0, 1519181429, 'user_followed', '{\"followed_by\": 6}', '2018-02-21 08:20:29'),
(136, 59, 0, 1519181657, 'user_followed', '{\"followed_by\": 83}', '2018-02-21 08:24:17'),
(137, 4, 0, 1519182152, 'question_posted', '{\"created_by\": 6, \"question_id\": 110}', '2018-02-21 08:32:32'),
(138, 6, 0, 1519210860, 'user_followed', '{\"followed_by\": 79}', '2018-02-21 16:31:00'),
(139, 6, 0, 1519211857, 'question_posted', '{\"created_by\": 4, \"question_id\": 111}', '2018-02-21 16:47:37'),
(140, 59, 0, 1519211857, 'question_posted', '{\"created_by\": 4, \"question_id\": 111}', '2018-02-21 16:47:37'),
(141, 6, 0, 1519213506, 'answer_accepted', '{\"question_id\": 111}', '2018-02-21 17:15:06'),
(142, 6, 0, 1519213917, 'question_posted', '{\"created_by\": 4, \"question_id\": 112}', '2018-02-21 17:21:57'),
(143, 59, 0, 1519213917, 'question_posted', '{\"created_by\": 4, \"question_id\": 112}', '2018-02-21 17:21:57'),
(144, 6, 0, 1519214972, 'question_posted', '{\"created_by\": 4, \"question_id\": 113}', '2018-02-21 17:39:32'),
(145, 59, 0, 1519214972, 'question_posted', '{\"created_by\": 4, \"question_id\": 113}', '2018-02-21 17:39:32'),
(146, 4, 0, 1519215678, 'user_followed', '{\"followed_by\": 59}', '2018-02-21 17:51:18'),
(147, 6, 0, 1519217916, 'user_followed', '{\"followed_by\": 59}', '2018-02-21 18:28:36'),
(148, 4, 0, 1519218425, 'votes_earned', '{\"votes\": 2, \"question_id\": 107}', '2018-02-21 18:37:04'),
(149, 5, 0, 1519218425, 'votes_earned', '{\"votes\": 1, \"question_id\": 107}', '2018-02-21 18:37:04'),
(150, 71, 0, 1519307523, 'user_followed', '{\"followed_by\": 4}', '2018-02-22 19:22:03'),
(151, 6, 0, 1519307546, 'user_followed', '{\"followed_by\": 4}', '2018-02-22 19:22:26'),
(152, 4, 0, 1519309193, 'question_posted', '{\"created_by\": 6, \"question_id\": 114}', '2018-02-22 19:49:53'),
(153, 5, 0, 1519309193, 'question_posted', '{\"created_by\": 6, \"question_id\": 114}', '2018-02-22 19:49:53'),
(154, 59, 0, 1519309193, 'question_posted', '{\"created_by\": 6, \"question_id\": 114}', '2018-02-22 19:49:53'),
(155, 79, 0, 1519309193, 'question_posted', '{\"created_by\": 6, \"question_id\": 114}', '2018-02-22 19:49:53'),
(156, 4, 0, 1519310030, 'question_posted', '{\"created_by\": 6, \"question_id\": 115}', '2018-02-22 20:03:50'),
(157, 5, 0, 1519310030, 'question_posted', '{\"created_by\": 6, \"question_id\": 115}', '2018-02-22 20:03:50'),
(158, 59, 0, 1519310030, 'question_posted', '{\"created_by\": 6, \"question_id\": 115}', '2018-02-22 20:03:50'),
(159, 79, 0, 1519310030, 'question_posted', '{\"created_by\": 6, \"question_id\": 115}', '2018-02-22 20:03:50'),
(160, 4, 0, 1519310113, 'question_posted', '{\"created_by\": 59, \"question_id\": 116}', '2018-02-22 20:05:13'),
(161, 83, 0, 1519310113, 'question_posted', '{\"created_by\": 59, \"question_id\": 116}', '2018-02-22 20:05:13'),
(162, 4, 0, 1519363473, 'question_posted', '{\"created_by\": 59, \"question_id\": 117}', '2018-02-23 10:54:33'),
(163, 83, 0, 1519363473, 'question_posted', '{\"created_by\": 59, \"question_id\": 117}', '2018-02-23 10:54:33'),
(164, 59, 0, 1519364030, 'answer_accepted', '{\"question_id\": 115}', '2018-02-23 11:03:50'),
(165, 4, 0, 1519364693, 'answer_accepted', '{\"question_id\": 117}', '2018-02-23 11:14:53'),
(166, 6, 0, 1519817135, 'question_posted', '{\"created_by\": 4, \"question_id\": 118}', '2018-02-28 16:55:35'),
(167, 59, 0, 1519817135, 'question_posted', '{\"created_by\": 4, \"question_id\": 118}', '2018-02-28 16:55:35'),
(168, 6, 0, 1521628407, 'question_posted', '{\"created_by\": 4, \"question_id\": 119}', '2018-03-21 16:03:27'),
(169, 59, 0, 1521628407, 'question_posted', '{\"created_by\": 4, \"question_id\": 119}', '2018-03-21 16:03:27');

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
(1, 'browse_admin', NULL, '2018-03-21 06:50:05', '2018-03-21 06:50:05', NULL),
(2, 'browse_database', NULL, '2018-03-21 06:50:05', '2018-03-21 06:50:05', NULL),
(3, 'browse_media', NULL, '2018-03-21 06:50:05', '2018-03-21 06:50:05', NULL),
(4, 'browse_compass', NULL, '2018-03-21 06:50:05', '2018-03-21 06:50:05', NULL),
(5, 'browse_menus', 'menus', '2018-03-21 06:50:05', '2018-03-21 06:50:05', NULL),
(6, 'read_menus', 'menus', '2018-03-21 06:50:05', '2018-03-21 06:50:05', NULL),
(7, 'edit_menus', 'menus', '2018-03-21 06:50:05', '2018-03-21 06:50:05', NULL),
(8, 'add_menus', 'menus', '2018-03-21 06:50:05', '2018-03-21 06:50:05', NULL),
(9, 'delete_menus', 'menus', '2018-03-21 06:50:05', '2018-03-21 06:50:05', NULL),
(10, 'browse_pages', 'pages', '2018-03-21 06:50:05', '2018-03-21 06:50:05', NULL),
(11, 'read_pages', 'pages', '2018-03-21 06:50:05', '2018-03-21 06:50:05', NULL),
(12, 'edit_pages', 'pages', '2018-03-21 06:50:05', '2018-03-21 06:50:05', NULL),
(13, 'add_pages', 'pages', '2018-03-21 06:50:06', '2018-03-21 06:50:06', NULL),
(14, 'delete_pages', 'pages', '2018-03-21 06:50:06', '2018-03-21 06:50:06', NULL),
(15, 'browse_roles', 'roles', '2018-03-21 06:50:06', '2018-03-21 06:50:06', NULL),
(16, 'read_roles', 'roles', '2018-03-21 06:50:06', '2018-03-21 06:50:06', NULL),
(17, 'edit_roles', 'roles', '2018-03-21 06:50:06', '2018-03-21 06:50:06', NULL),
(18, 'add_roles', 'roles', '2018-03-21 06:50:06', '2018-03-21 06:50:06', NULL),
(19, 'delete_roles', 'roles', '2018-03-21 06:50:06', '2018-03-21 06:50:06', NULL),
(20, 'browse_users', 'users', '2018-03-21 06:50:06', '2018-03-21 06:50:06', NULL),
(21, 'read_users', 'users', '2018-03-21 06:50:06', '2018-03-21 06:50:06', NULL),
(22, 'edit_users', 'users', '2018-03-21 06:50:06', '2018-03-21 06:50:06', NULL),
(23, 'add_users', 'users', '2018-03-21 06:50:06', '2018-03-21 06:50:06', NULL),
(24, 'delete_users', 'users', '2018-03-21 06:50:06', '2018-03-21 06:50:06', NULL),
(25, 'browse_posts', 'posts', '2018-03-21 06:50:06', '2018-03-21 06:50:06', NULL),
(26, 'read_posts', 'posts', '2018-03-21 06:50:06', '2018-03-21 06:50:06', NULL),
(27, 'edit_posts', 'posts', '2018-03-21 06:50:06', '2018-03-21 06:50:06', NULL),
(28, 'add_posts', 'posts', '2018-03-21 06:50:06', '2018-03-21 06:50:06', NULL),
(29, 'delete_posts', 'posts', '2018-03-21 06:50:06', '2018-03-21 06:50:06', NULL),
(30, 'browse_categories', 'categories', '2018-03-21 06:50:06', '2018-03-21 06:50:06', NULL),
(31, 'read_categories', 'categories', '2018-03-21 06:50:06', '2018-03-21 06:50:06', NULL),
(32, 'edit_categories', 'categories', '2018-03-21 06:50:06', '2018-03-21 06:50:06', NULL),
(33, 'add_categories', 'categories', '2018-03-21 06:50:06', '2018-03-21 06:50:06', NULL),
(34, 'delete_categories', 'categories', '2018-03-21 06:50:06', '2018-03-21 06:50:06', NULL),
(35, 'browse_settings', 'settings', '2018-03-21 06:50:06', '2018-03-21 06:50:06', NULL),
(36, 'read_settings', 'settings', '2018-03-21 06:50:06', '2018-03-21 06:50:06', NULL),
(37, 'edit_settings', 'settings', '2018-03-21 06:50:06', '2018-03-21 06:50:06', NULL),
(38, 'add_settings', 'settings', '2018-03-21 06:50:06', '2018-03-21 06:50:06', NULL),
(39, 'delete_settings', 'settings', '2018-03-21 06:50:06', '2018-03-21 06:50:06', NULL),
(40, 'browse_hooks', NULL, '2018-03-21 06:50:08', '2018-03-21 06:50:08', NULL);

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
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1);

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
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'PUBLISHED',
  `published_at` timestamp NULL DEFAULT NULL,
  `expiring_at` int(11) DEFAULT NULL,
  `accepted_answer` int(11) DEFAULT '0',
  `hits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `user_id`, `question`, `created_at`, `updated_at`, `status`, `published_at`, `expiring_at`, `accepted_answer`, `hits`) VALUES
(2, 3, 'balgmail com??', '2018-01-02 20:36:52', '2018-01-02 20:39:00', 'PUBLISHED', NULL, 1514945340, 3, 1),
(5, 6, 'unpubslishe dqu?', '2018-01-02 21:28:30', '2018-01-10 06:18:27', 'PUBLISHED', NULL, 1515584907, 6, 0),
(7, 6, 'two more quesir?', '2018-01-08 03:18:35', '2018-01-31 03:56:19', 'PUBLISHED', NULL, 1515584903, 11, 7),
(9, 6, 'thrie?', '2018-01-10 08:53:24', '2018-02-01 05:38:31', 'PUBLISHED', NULL, 1517483311, 14, 1),
(10, 6, 'what is th?', '2018-01-11 05:52:26', '2018-01-11 06:29:23', 'PUBLISHED', NULL, 1515756146, 0, 2),
(11, 6, 'fine quest?', '2018-01-13 07:25:15', '2018-02-08 20:25:35', 'PUBLISHED', NULL, 1517483304, 21, 20),
(12, 6, 'oe mre?', '2018-01-15 06:38:19', '2018-01-15 06:38:19', 'PUBLISHED', NULL, 1516104499, 0, 0),
(13, 6, 'one mroe?', '2018-01-15 06:38:44', '2018-01-15 06:38:44', 'PUBLISHED', NULL, 1516104524, 0, 0),
(14, 6, 'two more?', '2018-01-15 06:40:38', '2018-01-15 06:43:40', 'PUBLISHED', NULL, 1516104638, 0, 1),
(15, 6, 'posting one mrore ques?', '2018-01-16 06:21:11', '2018-01-16 06:21:11', 'PUBLISHED', NULL, 1516189871, 0, 0),
(16, 6, 'seodn ques?', '2018-01-16 06:21:43', '2018-01-16 06:28:38', 'PUBLISHED', NULL, 1516103918, 0, 1),
(19, 6, 'delet q?', '2018-01-16 07:01:09', '2018-01-16 07:01:09', 'PUBLISHED', NULL, 1516192269, 0, 0),
(20, 6, 'dlet hsi t?', '2018-01-16 07:02:49', '2018-01-16 07:02:49', 'PUBLISHED', NULL, 1516192369, 0, 0),
(22, 6, 'live q?', '2018-01-17 08:47:23', '2018-01-17 08:47:23', 'PUBLISHED', NULL, 1516285043, 0, 0),
(23, 6, 'bro my first featured live q?', '2018-01-19 06:52:45', '2018-01-19 06:52:45', 'PUBLISHED', NULL, 1516623765, 0, 0),
(24, 5, 'bala non feat quest?', '2018-01-19 07:02:13', '2018-01-19 07:02:13', 'PUBLISHED', NULL, 1516451533, 0, 0),
(25, 6, 'what?', '2018-01-22 02:06:05', '2018-01-22 02:06:05', 'PUBLISHED', NULL, 1516609865, 0, 0),
(27, 4, 'woog?', '2018-01-22 07:59:40', '2018-01-22 07:59:40', 'PUBLISHED', NULL, 1516714180, 0, 0),
(28, 4, 'what?', '2018-01-22 08:02:33', '2018-01-22 08:02:33', 'PUBLISHED', NULL, 1516627953, 0, 0),
(29, 4, 'what?', '2018-01-22 08:04:26', '2018-01-22 08:04:26', 'PUBLISHED', NULL, 1516800866, 0, 0),
(30, 4, 'soidsfj?', '2018-01-22 08:04:38', '2018-01-22 08:04:38', 'PUBLISHED', NULL, 1516628078, 0, 0),
(31, 4, 'sdfkljl?', '2018-01-22 08:04:51', '2018-01-22 08:04:51', 'PUBLISHED', NULL, 1516628091, 0, 0),
(32, 4, 'seoind?', '2018-01-22 08:07:09', '2018-01-22 08:07:09', 'PUBLISHED', NULL, 1516801029, 0, 0),
(33, 4, 'th8er\r\n?', '2018-01-22 08:07:16', '2018-01-22 08:07:16', 'PUBLISHED', NULL, 1516628236, 0, 0),
(34, 4, 'fir?', '2018-01-22 08:19:13', '2018-01-22 08:19:13', 'PUBLISHED', NULL, 1516628953, 0, 0),
(35, 4, 'sedon?', '2018-01-22 08:19:18', '2018-01-22 08:19:18', 'PUBLISHED', NULL, 1516628958, 0, 0),
(36, 4, 'thri?', '2018-01-22 08:19:22', '2018-01-22 08:19:22', 'PUBLISHED', NULL, 1516628962, 0, 0),
(37, 6, 'mama?', '2018-01-22 09:02:50', '2018-01-24 01:01:07', 'PUBLISHED', NULL, 1516804370, 0, 1),
(38, 6, 'sdoncdi?', '2018-01-22 09:03:24', '2018-01-22 09:03:24', 'PUBLISHED', NULL, 1516631604, 0, 0),
(39, 6, 'gesf?', '2018-01-22 09:03:28', '2018-01-22 09:03:28', 'PUBLISHED', NULL, 1516631608, 0, 0),
(40, 6, 'kjhkjh?', '2018-01-22 09:03:32', '2018-01-22 09:03:32', 'PUBLISHED', NULL, 1516631612, 0, 0),
(41, 4, 'thre?', '2018-01-22 09:14:08', '2018-01-22 09:42:49', 'PUBLISHED', NULL, 1516632248, 0, 1),
(42, 4, 'two?', '2018-01-22 09:14:11', '2018-01-22 09:14:11', 'PUBLISHED', NULL, 1516632251, 0, 0),
(43, 4, 'oe?', '2018-01-22 09:14:24', '2018-01-22 09:14:24', 'PUBLISHED', NULL, 1516632264, 0, 0),
(44, 4, 'sdf?', '2018-01-23 00:18:20', '2018-01-23 00:18:20', 'PUBLISHED', NULL, 1516686500, 0, 0),
(45, 4, 'jkh?', '2018-01-23 00:18:25', '2018-01-23 00:18:25', 'PUBLISHED', NULL, 1516686505, 0, 0),
(46, 4, 'kjhkj?', '2018-01-23 00:18:31', '2018-01-23 00:18:31', 'PUBLISHED', NULL, 1516686511, 0, 0),
(47, 4, 'fir stq?', '2018-01-23 00:22:08', '2018-01-23 00:22:08', 'PUBLISHED', NULL, 1516686728, 0, 0),
(48, 6, 'featured qu?', '2018-01-29 09:54:00', '2018-01-30 09:42:57', 'PUBLISHED', NULL, 1517325840, 0, 1),
(49, 6, 'one tea??', '2018-01-31 01:06:50', '2018-02-01 00:09:27', 'PUBLISHED', NULL, 1517553410, 0, 3),
(52, 6, 'one more?', '2018-02-01 05:48:02', '2018-02-06 06:51:40', 'PUBLISHED', NULL, 1517743082, 0, 1),
(53, 6, 'two more?', '2018-02-01 05:48:08', '2018-02-01 05:48:08', 'PUBLISHED', NULL, 1517743088, 0, 0),
(54, 6, 'there mo?', '2018-02-01 05:48:17', '2018-02-01 05:48:17', 'PUBLISHED', NULL, 1517829497, 0, 0),
(55, 6, 'kjlk?', '2018-02-01 05:48:23', '2018-02-01 05:48:23', 'PUBLISHED', NULL, 1517829503, 0, 0),
(56, 6, 'jkhkjhk?', '2018-02-01 05:48:28', '2018-02-01 05:48:28', 'PUBLISHED', NULL, 1517743108, 0, 0),
(59, 4, 'jc test answer me?', '2018-02-02 00:44:27', '2018-02-08 20:05:54', 'PUBLISHED', NULL, 1517552165, 26, 4),
(60, 4, 'jacmg will jac test answer?', '2018-02-02 05:06:55', '2018-02-09 02:03:41', 'PUBLISHED', NULL, 1517567900, 27, 2),
(61, 4, 'voting test?', '2018-02-02 05:23:23', '2018-02-02 06:57:22', 'PUBLISHED', NULL, 1517745323, 0, 4),
(62, 4, 'ok guru my quest?', '2018-02-06 07:02:58', '2018-02-06 07:02:58', 'PUBLISHED', NULL, 1517920378, 0, 0),
(63, 4, 'my quesT?', '2018-02-06 07:03:11', '2018-02-07 05:56:44', 'PUBLISHED', NULL, 1518006791, 0, 1),
(64, 6, 'one qu?', '2018-02-06 07:16:36', '2018-02-06 07:49:44', 'PUBLISHED', NULL, 1517923184, 0, 0),
(65, 6, 'two wuqsT?', '2018-02-06 07:16:41', '2018-02-06 07:50:08', 'PUBLISHED', NULL, 1517923208, 0, 0),
(66, 6, 'three que?', '2018-02-06 07:16:48', '2018-02-06 07:46:22', 'PUBLISHED', NULL, 1517922982, 0, 2),
(67, 6, 'first?', '2018-02-06 07:50:38', '2018-02-06 07:55:28', 'PUBLISHED', NULL, 1517923528, 0, 0),
(68, 6, 'seocnf?', '2018-02-06 07:50:44', '2018-02-06 07:59:22', 'PUBLISHED', NULL, 1517923762, 0, 0),
(69, 6, 'fhsfsf?', '2018-02-06 07:50:49', '2018-02-06 07:54:35', 'PUBLISHED', NULL, 1517923475, 0, 0),
(70, 6, 'lkjlkj?', '2018-02-06 07:50:56', '2018-02-06 07:51:08', 'PUBLISHED', NULL, 1517923268, 0, 0),
(94, 6, 'finr e?', '2018-02-09 06:44:15', '2018-02-09 06:44:15', 'PUBLISHED', NULL, 1518178455, 0, 0),
(95, 6, 'master?', '2018-02-09 06:51:05', '2018-02-09 06:51:05', 'PUBLISHED', NULL, 1518178865, 0, 0),
(96, 6, 'go dmgoog?', '2018-02-09 07:02:08', '2018-02-09 07:16:47', 'PUBLISHED', NULL, 1518352328, 0, 2),
(97, 6, 'first que?', '2018-02-12 06:32:11', '2018-02-12 06:32:27', 'PUBLISHED', NULL, 1518523331, 0, 2),
(98, 6, 'true?', '2018-02-13 07:15:03', '2018-02-14 23:56:39', 'PUBLISHED', NULL, 1518698703, 0, 3),
(99, 6, 'second?', '2018-02-13 07:15:12', '2018-02-13 07:15:12', 'PUBLISHED', NULL, 1518612312, 0, 0),
(100, 6, 'three?', '2018-02-13 07:15:18', '2018-02-13 07:15:18', 'PUBLISHED', NULL, 1518612318, 0, 0),
(101, 6, 'dflk?', '2018-02-13 07:15:24', '2018-02-13 07:15:24', 'PUBLISHED', NULL, 1518698724, 0, 0),
(102, 6, 'sderocn?', '2018-02-13 07:41:20', '2018-02-13 07:41:20', 'PUBLISHED', NULL, 1518613880, 0, 0),
(105, 4, 'fsfsf?', '2018-02-15 09:03:48', '2018-02-15 09:04:20', 'PUBLISHED', NULL, 1518791628, 0, 1),
(106, 4, 'runing?', '2018-02-20 04:44:59', '2018-02-20 05:15:18', 'PUBLISHED', NULL, 1519208099, 0, 1),
(107, 6, 'jc test qu?', '2018-02-20 20:10:41', '2018-02-23 02:36:04', 'PUBLISHED', NULL, 1519218424, 0, 13),
(109, 3, 'bala quer?', '2018-02-20 20:11:27', '2018-02-20 20:11:27', 'PUBLISHED', NULL, 1519263687, 0, 0),
(110, 6, 'jac test?', '2018-02-20 21:32:32', '2018-02-21 07:36:50', 'PUBLISHED', NULL, 1519268552, 0, 1),
(111, 4, 'whsitisflksflksjflksfjlskfjlskdflj;lajf;ksjf;ksjf;ksjf;ksjflskdfjsjfdhsjdfhlajfhlsjfhlsajfhljdfhljasfdhlsdjfhlsjfhlsjfhlajsfhljasfdhlajfhlajfhljafhlajfhwhsitisflksflksjflksfjlskfjlskdflj;lajf;ksjf;ksjf;ksjf;ksjflskdfjsjfdhsjdfhlajfhlsjfhlsajfhljdfhljasfdh', '2018-02-21 05:47:37', '2018-02-21 06:15:06', 'PUBLISHED', NULL, 1519213506, 63, 5),
(112, 4, 'sdfoisfd?', '2018-02-21 06:21:56', '2018-02-22 06:12:40', 'PUBLISHED', NULL, 1519300316, 0, 1),
(113, 4, 'two?', '2018-02-21 06:39:32', '2018-02-21 06:39:32', 'PUBLISHED', NULL, 1519301372, 0, 0),
(114, 6, 'sdsdfkl?', '2018-02-22 08:49:53', '2018-02-22 23:48:01', 'PUBLISHED', NULL, 1519395593, 0, 1),
(115, 6, 'sood?', '2018-02-22 09:03:50', '2018-02-23 00:03:50', 'PUBLISHED', NULL, 1519364030, 66, 2),
(116, 59, 'mare?', '2018-02-22 09:05:13', '2018-02-22 23:57:55', 'PUBLISHED', NULL, 1519363481, 0, 4),
(117, 59, 'mark runing?', '2018-02-22 23:54:33', '2018-02-23 00:14:53', 'PUBLISHED', NULL, 1519364693, 67, 2),
(118, 4, 'jac gm qust?', '2018-02-28 05:55:35', '2018-02-28 05:55:49', 'PUBLISHED', NULL, 1519903535, 0, 1),
(119, 4, 'what?', '2018-03-21 05:03:27', '2018-03-21 05:28:59', 'PUBLISHED', NULL, 1521801207, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `question_counters`
--

CREATE TABLE `question_counters` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `questions_posted` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_counters`
--

INSERT INTO `question_counters` (`id`, `user_id`, `questions_posted`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '2018-03-21 05:03:27', '2018-03-21 05:03:27');

-- --------------------------------------------------------

--
-- Table structure for table `question_last_posted`
--

CREATE TABLE `question_last_posted` (
  `user_id` int(11) NOT NULL,
  `posted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_last_posted`
--

INSERT INTO `question_last_posted` (`user_id`, `posted_at`) VALUES
(3, '2018-02-20 20:11:27'),
(6, '2018-02-22 09:03:50'),
(59, '2018-02-22 23:54:33'),
(4, '2018-03-21 05:03:27');

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
(1, 'admin', 'Administrator', '2018-03-21 06:50:05', '2018-03-21 06:50:05'),
(2, 'user', 'Normal User', '2018-03-21 06:50:05', '2018-03-21 06:50:05'),
(3, 'member', 'Member Account', '2018-03-21 21:36:30', '2018-03-21 21:36:30');

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
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Pgeon', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', '', '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Pgeon', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Admin', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', '', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', '', '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `stripe_webhook_calls`
--

CREATE TABLE `stripe_webhook_calls` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci,
  `exception` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stripe_webhook_calls`
--

INSERT INTO `stripe_webhook_calls` (`id`, `type`, `payload`, `exception`, `created_at`, `updated_at`) VALUES
(1, 'charge.captured', '{\"created\":1326853478,\"livemode\":false,\"id\":\"evt_00000000000000\",\"type\":\"charge.captured\",\"object\":\"event\",\"request\":null,\"pending_webhooks\":1,\"api_version\":\"2018-02-28\",\"data\":{\"object\":{\"id\":\"ch_00000000000000\",\"object\":\"charge\",\"amount\":500,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_00000000000000\",\"captured\":true,\"created\":1521712500,\"currency\":\"usd\",\"customer\":\"cus_00000000000000\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":\"in_00000000000000\",\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1C8Q8ODsm8J3jd1lr4dZNVh3\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_00000000000000\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_00000000000000\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":1,\"exp_year\":2019,\"fingerprint\":\"ISDWpXUCSB3C06Vz\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null}}}', '{\"code\":0,\"message\":\"Could not process webhook id `1` of type `charge.captured because the configured jobclass `App\\\\Jobs\\\\StripeWebhooks\\\\HandleChargeCaptured` does not exist.\",\"trace\":\"#0 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/spatie\\/laravel-stripe-webhooks\\/src\\/StripeWebhookCall.php(35): Spatie\\\\StripeWebhooks\\\\Exceptions\\\\WebhookFailed::jobClassDoesNotExist(\'App\\\\\\\\Jobs\\\\\\\\Stripe...\', Object(Spatie\\\\StripeWebhooks\\\\StripeWebhookCall))\\n#1 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/spatie\\/laravel-stripe-webhooks\\/src\\/StripeWebhooksController.php(29): Spatie\\\\StripeWebhooks\\\\StripeWebhookCall->process()\\n#2 [internal function]: Spatie\\\\StripeWebhooks\\\\StripeWebhooksController->__invoke(Object(Illuminate\\\\Http\\\\Request))\\n#3 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Controller.php(54): call_user_func_array(Array, Array)\\n#4 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/ControllerDispatcher.php(45): Illuminate\\\\Routing\\\\Controller->callAction(\'__invoke\', Array)\\n#5 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Route.php(212): Illuminate\\\\Routing\\\\ControllerDispatcher->dispatch(Object(Illuminate\\\\Routing\\\\Route), Object(Spatie\\\\StripeWebhooks\\\\StripeWebhooksController), \'__invoke\')\\n#6 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Route.php(169): Illuminate\\\\Routing\\\\Route->runController()\\n#7 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Router.php(658): Illuminate\\\\Routing\\\\Route->run()\\n#8 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Pipeline.php(30): Illuminate\\\\Routing\\\\Router->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\\n#9 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/spatie\\/laravel-stripe-webhooks\\/src\\/Middlewares\\/VerifySignature.php(24): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\\n#10 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(149): Spatie\\\\StripeWebhooks\\\\Middlewares\\\\VerifySignature->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\\n#11 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\\n#12 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Middleware\\/SubstituteBindings.php(41): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\\n#13 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(149): Illuminate\\\\Routing\\\\Middleware\\\\SubstituteBindings->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\\n#14 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\\n#15 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Middleware\\/VerifyCsrfToken.php(67): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\\n#16 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(149): Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\VerifyCsrfToken->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\\n#17 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\\n#18 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/View\\/Middleware\\/ShareErrorsFromSession.php(49): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\\n#19 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(149): Illuminate\\\\View\\\\Middleware\\\\ShareErrorsFromSession->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\\n#20 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\\n#21 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Session\\/Middleware\\/StartSession.php(63): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\\n#22 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(149): Illuminate\\\\Session\\\\Middleware\\\\StartSession->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\\n#23 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\\n#24 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Cookie\\/Middleware\\/AddQueuedCookiesToResponse.php(37): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\\n#25 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(149): Illuminate\\\\Cookie\\\\Middleware\\\\AddQueuedCookiesToResponse->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\\n#26 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\\n#27 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Cookie\\/Middleware\\/EncryptCookies.php(59): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\\n#28 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(149): Illuminate\\\\Cookie\\\\Middleware\\\\EncryptCookies->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\\n#29 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\\n#30 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(102): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\\n#31 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Router.php(660): Illuminate\\\\Pipeline\\\\Pipeline->then(Object(Closure))\\n#32 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Router.php(635): Illuminate\\\\Routing\\\\Router->runRouteWithinStack(Object(Illuminate\\\\Routing\\\\Route), Object(Illuminate\\\\Http\\\\Request))\\n#33 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Router.php(601): Illuminate\\\\Routing\\\\Router->runRoute(Object(Illuminate\\\\Http\\\\Request), Object(Illuminate\\\\Routing\\\\Route))\\n#34 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Router.php(590): Illuminate\\\\Routing\\\\Router->dispatchToRoute(Object(Illuminate\\\\Http\\\\Request))\\n#35 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Kernel.php(176): Illuminate\\\\Routing\\\\Router->dispatch(Object(Illuminate\\\\Http\\\\Request))\\n#36 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Pipeline.php(30): Illuminate\\\\Foundation\\\\Http\\\\Kernel->Illuminate\\\\Foundation\\\\Http\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\\n#37 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/fideloper\\/proxy\\/src\\/TrustProxies.php(56): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\\n#38 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(149): Fideloper\\\\Proxy\\\\TrustProxies->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\\n#39 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\\n#40 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Middleware\\/TransformsRequest.php(30): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\\n#41 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(149): Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\TransformsRequest->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\\n#42 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\\n#43 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Middleware\\/TransformsRequest.php(30): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\\n#44 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(149): Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\TransformsRequest->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\\n#45 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\\n#46 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Middleware\\/ValidatePostSize.php(27): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\\n#47 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(149): Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\ValidatePostSize->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\\n#48 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\\n#49 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Middleware\\/CheckForMaintenanceMode.php(46): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\\n#50 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(149): Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\CheckForMaintenanceMode->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\\n#51 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\\n#52 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(102): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\\n#53 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Kernel.php(151): Illuminate\\\\Pipeline\\\\Pipeline->then(Object(Closure))\\n#54 \\/Library\\/WebServer\\/Documents\\/pgeon\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Kernel.php(116): Illuminate\\\\Foundation\\\\Http\\\\Kernel->sendRequestThroughRouter(Object(Illuminate\\\\Http\\\\Request))\\n#55 \\/Library\\/WebServer\\/Documents\\/pgeon\\/public\\/index.php(55): Illuminate\\\\Foundation\\\\Http\\\\Kernel->handle(Object(Illuminate\\\\Http\\\\Request))\\n#56 \\/Library\\/WebServer\\/Documents\\/pgeon\\/server.php(21): require_once(\'\\/Library\\/WebSer...\')\\n#57 {main}\"}', '2018-03-22 04:33:05', '2018-03-22 04:33:05'),
(2, 'charge.captured', '{\"created\":1326853478,\"livemode\":false,\"id\":\"evt_00000000000000\",\"type\":\"charge.captured\",\"object\":\"event\",\"request\":null,\"pending_webhooks\":1,\"api_version\":\"2018-02-28\",\"data\":{\"object\":{\"id\":\"ch_00000000000000\",\"object\":\"charge\",\"amount\":500,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_00000000000000\",\"captured\":true,\"created\":1521712500,\"currency\":\"usd\",\"customer\":\"cus_00000000000000\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":\"in_00000000000000\",\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1C8Q8ODsm8J3jd1lr4dZNVh3\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_00000000000000\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_00000000000000\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":1,\"exp_year\":2019,\"fingerprint\":\"ISDWpXUCSB3C06Vz\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null}}}', NULL, '2018-03-22 04:35:07', '2018-03-22 04:35:07'),
(3, 'charge.succeeded', '{\"id\":\"evt_1C8PotDsm8J3jd1lLJtmotwx\",\"object\":\"event\",\"api_version\":\"2018-02-28\",\"created\":1521711291,\"data\":{\"object\":{\"id\":\"ch_1C8PorDsm8J3jd1loDGU4nnU\",\"object\":\"charge\",\"amount\":500,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1C8PosDsm8J3jd1lqjGFYTuo\",\"captured\":true,\"created\":1521711289,\"currency\":\"usd\",\"customer\":\"cus_CXUBVgnfwRXJXh\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":\"in_1C8PorDsm8J3jd1lZG3EQwM7\",\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1C8PorDsm8J3jd1loDGU4nnU\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1C8PoeDsm8J3jd1lEZueNS9x\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_CXUBVgnfwRXJXh\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":1,\"exp_year\":2019,\"fingerprint\":\"ISDWpXUCSB3C06Vz\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null}},\"livemode\":false,\"pending_webhooks\":1,\"request\":{\"id\":\"req_tX5yr3cued4bPr\",\"idempotency_key\":null},\"type\":\"charge.succeeded\"}', NULL, '2018-03-22 05:13:50', '2018-03-22 05:13:50'),
(4, 'charge.succeeded', '{\"id\":\"evt_1C8PxVDsm8J3jd1lyRocCzHn\",\"object\":\"event\",\"api_version\":\"2018-02-28\",\"created\":1521711825,\"data\":{\"object\":{\"id\":\"ch_1C8PxUDsm8J3jd1lm4wnNCTQ\",\"object\":\"charge\",\"amount\":500,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1C8PxUDsm8J3jd1lT08OxilB\",\"captured\":true,\"created\":1521711824,\"currency\":\"usd\",\"customer\":\"cus_CXUBVgnfwRXJXh\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":\"in_1C8PxUDsm8J3jd1lDMsnPcfq\",\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1C8PxUDsm8J3jd1lm4wnNCTQ\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1C8PxIDsm8J3jd1ls4R6pVas\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_CXUBVgnfwRXJXh\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":1,\"exp_year\":2019,\"fingerprint\":\"ISDWpXUCSB3C06Vz\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null}},\"livemode\":false,\"pending_webhooks\":1,\"request\":{\"id\":\"req_b73qIxFWT3FavB\",\"idempotency_key\":null},\"type\":\"charge.succeeded\"}', NULL, '2018-03-22 05:17:42', '2018-03-22 05:17:42'),
(5, 'charge.succeeded', '{\"id\":\"evt_1C8Pz9Dsm8J3jd1l17SnvOwK\",\"object\":\"event\",\"api_version\":\"2018-02-28\",\"created\":1521711927,\"data\":{\"object\":{\"id\":\"ch_1C8Pz8Dsm8J3jd1lomOxgDHy\",\"object\":\"charge\",\"amount\":500,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1C8Pz8Dsm8J3jd1lkzn5EqQN\",\"captured\":true,\"created\":1521711926,\"currency\":\"usd\",\"customer\":\"cus_CXUBVgnfwRXJXh\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":\"in_1C8Pz8Dsm8J3jd1l5mr6k3hu\",\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1C8Pz8Dsm8J3jd1lomOxgDHy\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1C8PyvDsm8J3jd1lrQvR06Ck\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_CXUBVgnfwRXJXh\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":1,\"exp_year\":2019,\"fingerprint\":\"ISDWpXUCSB3C06Vz\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null}},\"livemode\":false,\"pending_webhooks\":1,\"request\":{\"id\":\"req_PNrzekIy1Za1Ap\",\"idempotency_key\":null},\"type\":\"charge.succeeded\"}', NULL, '2018-03-22 05:39:22', '2018-03-22 05:39:22'),
(6, 'charge.succeeded', '{\"id\":\"evt_1C8Q5ZDsm8J3jd1l6CH3aRAI\",\"object\":\"event\",\"api_version\":\"2018-02-28\",\"created\":1521712325,\"data\":{\"object\":{\"id\":\"ch_1C8Q5YDsm8J3jd1ldoJf18GS\",\"object\":\"charge\",\"amount\":500,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1C8Q5YDsm8J3jd1lzcb1euBk\",\"captured\":true,\"created\":1521712324,\"currency\":\"usd\",\"customer\":\"cus_CXUBVgnfwRXJXh\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":\"in_1C8Q5YDsm8J3jd1lOxESCx7n\",\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1C8Q5YDsm8J3jd1ldoJf18GS\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1C8Q5LDsm8J3jd1lEAbUaNaC\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_CXUBVgnfwRXJXh\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":3,\"exp_year\":2019,\"fingerprint\":\"ISDWpXUCSB3C06Vz\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null}},\"livemode\":false,\"pending_webhooks\":1,\"request\":{\"id\":\"req_Y3MZZ9gCSFv7mb\",\"idempotency_key\":null},\"type\":\"charge.succeeded\"}', NULL, '2018-03-22 05:59:36', '2018-03-22 05:59:37'),
(7, 'charge.succeeded', '{\"id\":\"evt_1C8Q8PDsm8J3jd1lZI6wnmr7\",\"object\":\"event\",\"api_version\":\"2018-02-28\",\"created\":1521712501,\"data\":{\"object\":{\"id\":\"ch_1C8Q8ODsm8J3jd1lr4dZNVh3\",\"object\":\"charge\",\"amount\":500,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1C8Q8ODsm8J3jd1lNFWYNhOi\",\"captured\":true,\"created\":1521712500,\"currency\":\"usd\",\"customer\":\"cus_CXV8GegZq4MRi5\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":\"in_1C8Q8ODsm8J3jd1l9PlfUBmL\",\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1C8Q8ODsm8J3jd1lr4dZNVh3\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1C8Q8EDsm8J3jd1l3UEDDpLT\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_CXV8GegZq4MRi5\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":1,\"exp_year\":2019,\"fingerprint\":\"ISDWpXUCSB3C06Vz\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null}},\"livemode\":false,\"pending_webhooks\":1,\"request\":{\"id\":\"req_IAje4khmxFDmX5\",\"idempotency_key\":null},\"type\":\"charge.succeeded\"}', NULL, '2018-03-22 06:08:28', '2018-03-22 06:08:28'),
(8, 'charge.captured', '{\"created\":1326853478,\"livemode\":false,\"id\":\"evt_00000000000000\",\"type\":\"charge.captured\",\"object\":\"event\",\"request\":null,\"pending_webhooks\":1,\"api_version\":\"2018-02-28\",\"data\":{\"object\":{\"id\":\"ch_00000000000000\",\"object\":\"charge\",\"amount\":500,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_00000000000000\",\"captured\":true,\"created\":1521712500,\"currency\":\"usd\",\"customer\":\"cus_00000000000000\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":\"in_00000000000000\",\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1C8Q8ODsm8J3jd1lr4dZNVh3\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_00000000000000\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_00000000000000\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":1,\"exp_year\":2019,\"fingerprint\":\"ISDWpXUCSB3C06Vz\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null}}}', NULL, '2018-03-22 06:18:22', '2018-03-22 06:18:22'),
(9, 'charge.succeeded', '{\"id\":\"evt_1C8PxVDsm8J3jd1lyRocCzHn\",\"object\":\"event\",\"api_version\":\"2018-02-28\",\"created\":1521711825,\"data\":{\"object\":{\"id\":\"ch_1C8PxUDsm8J3jd1lm4wnNCTQ\",\"object\":\"charge\",\"amount\":500,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1C8PxUDsm8J3jd1lT08OxilB\",\"captured\":true,\"created\":1521711824,\"currency\":\"usd\",\"customer\":\"cus_CXUBVgnfwRXJXh\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":\"in_1C8PxUDsm8J3jd1lDMsnPcfq\",\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1C8PxUDsm8J3jd1lm4wnNCTQ\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1C8PxIDsm8J3jd1ls4R6pVas\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_CXUBVgnfwRXJXh\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":1,\"exp_year\":2019,\"fingerprint\":\"ISDWpXUCSB3C06Vz\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null}},\"livemode\":false,\"pending_webhooks\":1,\"request\":{\"id\":\"req_b73qIxFWT3FavB\",\"idempotency_key\":null},\"type\":\"charge.succeeded\"}', NULL, '2018-03-22 06:32:11', '2018-03-22 06:32:12'),
(10, 'charge.succeeded', '{\"id\":\"evt_1C8PotDsm8J3jd1lLJtmotwx\",\"object\":\"event\",\"api_version\":\"2018-02-28\",\"created\":1521711291,\"data\":{\"object\":{\"id\":\"ch_1C8PorDsm8J3jd1loDGU4nnU\",\"object\":\"charge\",\"amount\":500,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1C8PosDsm8J3jd1lqjGFYTuo\",\"captured\":true,\"created\":1521711289,\"currency\":\"usd\",\"customer\":\"cus_CXUBVgnfwRXJXh\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":\"in_1C8PorDsm8J3jd1lZG3EQwM7\",\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1C8PorDsm8J3jd1loDGU4nnU\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1C8PoeDsm8J3jd1lEZueNS9x\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_CXUBVgnfwRXJXh\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":1,\"exp_year\":2019,\"fingerprint\":\"ISDWpXUCSB3C06Vz\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null}},\"livemode\":false,\"pending_webhooks\":1,\"request\":{\"id\":\"req_tX5yr3cued4bPr\",\"idempotency_key\":null},\"type\":\"charge.succeeded\"}', NULL, '2018-03-22 07:04:14', '2018-03-22 07:04:15'),
(11, 'charge.succeeded', '{\"id\":\"evt_1C8Q8PDsm8J3jd1lZI6wnmr7\",\"object\":\"event\",\"api_version\":\"2018-02-28\",\"created\":1521712501,\"data\":{\"object\":{\"id\":\"ch_1C8Q8ODsm8J3jd1lr4dZNVh3\",\"object\":\"charge\",\"amount\":500,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1C8Q8ODsm8J3jd1lNFWYNhOi\",\"captured\":true,\"created\":1521712500,\"currency\":\"usd\",\"customer\":\"cus_CXV8GegZq4MRi5\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":\"in_1C8Q8ODsm8J3jd1l9PlfUBmL\",\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1C8Q8ODsm8J3jd1lr4dZNVh3\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1C8Q8EDsm8J3jd1l3UEDDpLT\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_CXV8GegZq4MRi5\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":1,\"exp_year\":2019,\"fingerprint\":\"ISDWpXUCSB3C06Vz\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null}},\"livemode\":false,\"pending_webhooks\":1,\"request\":{\"id\":\"req_IAje4khmxFDmX5\",\"idempotency_key\":null},\"type\":\"charge.succeeded\"}', NULL, '2018-03-22 07:25:38', '2018-03-22 07:25:38'),
(12, 'charge.succeeded', '{\"id\":\"evt_1C8Q5ZDsm8J3jd1l6CH3aRAI\",\"object\":\"event\",\"api_version\":\"2018-02-28\",\"created\":1521712325,\"data\":{\"object\":{\"id\":\"ch_1C8Q5YDsm8J3jd1ldoJf18GS\",\"object\":\"charge\",\"amount\":500,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1C8Q5YDsm8J3jd1lzcb1euBk\",\"captured\":true,\"created\":1521712324,\"currency\":\"usd\",\"customer\":\"cus_CXUBVgnfwRXJXh\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":\"in_1C8Q5YDsm8J3jd1lOxESCx7n\",\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1C8Q5YDsm8J3jd1ldoJf18GS\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1C8Q5LDsm8J3jd1lEAbUaNaC\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_CXUBVgnfwRXJXh\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":3,\"exp_year\":2019,\"fingerprint\":\"ISDWpXUCSB3C06Vz\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null}},\"livemode\":false,\"pending_webhooks\":1,\"request\":{\"id\":\"req_Y3MZZ9gCSFv7mb\",\"idempotency_key\":null},\"type\":\"charge.succeeded\"}', NULL, '2018-03-22 07:32:31', '2018-03-22 07:32:31'),
(13, 'charge.succeeded', '{\"id\":\"evt_1C8Pz9Dsm8J3jd1l17SnvOwK\",\"object\":\"event\",\"api_version\":\"2018-02-28\",\"created\":1521711927,\"data\":{\"object\":{\"id\":\"ch_1C8Pz8Dsm8J3jd1lomOxgDHy\",\"object\":\"charge\",\"amount\":500,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1C8Pz8Dsm8J3jd1lkzn5EqQN\",\"captured\":true,\"created\":1521711926,\"currency\":\"usd\",\"customer\":\"cus_CXUBVgnfwRXJXh\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":\"in_1C8Pz8Dsm8J3jd1l5mr6k3hu\",\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1C8Pz8Dsm8J3jd1lomOxgDHy\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1C8PyvDsm8J3jd1lrQvR06Ck\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_CXUBVgnfwRXJXh\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":1,\"exp_year\":2019,\"fingerprint\":\"ISDWpXUCSB3C06Vz\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null}},\"livemode\":false,\"pending_webhooks\":1,\"request\":{\"id\":\"req_PNrzekIy1Za1Ap\",\"idempotency_key\":null},\"type\":\"charge.succeeded\"}', NULL, '2018-03-22 07:33:28', '2018-03-22 07:33:28'),
(14, 'charge.succeeded', '{\"id\":\"evt_1C8PxVDsm8J3jd1lyRocCzHn\",\"object\":\"event\",\"api_version\":\"2018-02-28\",\"created\":1521711825,\"data\":{\"object\":{\"id\":\"ch_1C8PxUDsm8J3jd1lm4wnNCTQ\",\"object\":\"charge\",\"amount\":500,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1C8PxUDsm8J3jd1lT08OxilB\",\"captured\":true,\"created\":1521711824,\"currency\":\"usd\",\"customer\":\"cus_CXUBVgnfwRXJXh\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":\"in_1C8PxUDsm8J3jd1lDMsnPcfq\",\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1C8PxUDsm8J3jd1lm4wnNCTQ\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1C8PxIDsm8J3jd1ls4R6pVas\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_CXUBVgnfwRXJXh\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":1,\"exp_year\":2019,\"fingerprint\":\"ISDWpXUCSB3C06Vz\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null}},\"livemode\":false,\"pending_webhooks\":1,\"request\":{\"id\":\"req_b73qIxFWT3FavB\",\"idempotency_key\":null},\"type\":\"charge.succeeded\"}', NULL, '2018-03-22 07:45:50', '2018-03-22 07:45:50'),
(15, 'charge.succeeded', '{\"id\":\"evt_1C8Q5ZDsm8J3jd1l6CH3aRAI\",\"object\":\"event\",\"api_version\":\"2018-02-28\",\"created\":1521712325,\"data\":{\"object\":{\"id\":\"ch_1C8Q5YDsm8J3jd1ldoJf18GS\",\"object\":\"charge\",\"amount\":500,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1C8Q5YDsm8J3jd1lzcb1euBk\",\"captured\":true,\"created\":1521712324,\"currency\":\"usd\",\"customer\":\"cus_CXUBVgnfwRXJXh\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":\"in_1C8Q5YDsm8J3jd1lOxESCx7n\",\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1C8Q5YDsm8J3jd1ldoJf18GS\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1C8Q5LDsm8J3jd1lEAbUaNaC\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_CXUBVgnfwRXJXh\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":3,\"exp_year\":2019,\"fingerprint\":\"ISDWpXUCSB3C06Vz\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null}},\"livemode\":false,\"pending_webhooks\":1,\"request\":{\"id\":\"req_Y3MZZ9gCSFv7mb\",\"idempotency_key\":null},\"type\":\"charge.succeeded\"}', NULL, '2018-03-22 08:48:43', '2018-03-22 08:48:43'),
(16, 'charge.succeeded', '{\"id\":\"evt_1C8PxVDsm8J3jd1lyRocCzHn\",\"object\":\"event\",\"api_version\":\"2018-02-28\",\"created\":1521711825,\"data\":{\"object\":{\"id\":\"ch_1C8PxUDsm8J3jd1lm4wnNCTQ\",\"object\":\"charge\",\"amount\":500,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1C8PxUDsm8J3jd1lT08OxilB\",\"captured\":true,\"created\":1521711824,\"currency\":\"usd\",\"customer\":\"cus_CXUBVgnfwRXJXh\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":\"in_1C8PxUDsm8J3jd1lDMsnPcfq\",\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1C8PxUDsm8J3jd1lm4wnNCTQ\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1C8PxIDsm8J3jd1ls4R6pVas\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_CXUBVgnfwRXJXh\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":1,\"exp_year\":2019,\"fingerprint\":\"ISDWpXUCSB3C06Vz\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null}},\"livemode\":false,\"pending_webhooks\":1,\"request\":{\"id\":\"req_b73qIxFWT3FavB\",\"idempotency_key\":null},\"type\":\"charge.succeeded\"}', NULL, '2018-03-22 08:56:02', '2018-03-22 08:56:02'),
(17, 'charge.captured', '{\"created\":1326853478,\"livemode\":false,\"id\":\"evt_00000000000000\",\"type\":\"charge.captured\",\"object\":\"event\",\"request\":null,\"pending_webhooks\":1,\"api_version\":\"2018-02-28\",\"data\":{\"object\":{\"id\":\"ch_00000000000000\",\"object\":\"charge\",\"amount\":500,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_00000000000000\",\"captured\":true,\"created\":1521712500,\"currency\":\"usd\",\"customer\":\"cus_00000000000000\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":\"in_00000000000000\",\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1C8Q8ODsm8J3jd1lr4dZNVh3\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_00000000000000\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_00000000000000\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":1,\"exp_year\":2019,\"fingerprint\":\"ISDWpXUCSB3C06Vz\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null}}}', NULL, '2018-03-22 09:06:25', '2018-03-22 09:06:25');

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
(8, 93, 'main', 'sub_CXV5xiX4YqnZlk', 'pgeon_monthly', 1, NULL, NULL, '2018-03-22 04:22:06', '2018-03-22 04:22:06'),
(9, 4, 'main', 'sub_CXV8Ly2SmeKnz4', 'pgeon_monthly', 1, NULL, NULL, '2018-03-22 04:25:02', '2018-03-22 04:25:02'),
(10, 94, 'main', 'sub_CXZsED6j3g6ail', 'pgeon_monthly', 1, NULL, NULL, '2018-03-22 09:18:21', '2018-03-22 09:18:21');

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `slug` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscribed_to_newsletter` tinyint(1) DEFAULT NULL,
  `featured` tinyint(1) DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `banner`, `password`, `remember_token`, `created_at`, `updated_at`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`, `bio`, `provider`, `provider_id`, `slug`, `subscribed_to_newsletter`, `featured`, `deleted`) VALUES
(1, 1, '', 'admin@admin.com', '', '2.png', '$2y$10$QXCKwWMssG4XZfY30UTnberfWKkzDmRkZjdT5pQVxQWXrsF//3DDS', 'NP3mZHB6BivPIZgsQGBXhzkE9tP54kLVeu5TyEnasZUFLyrnTWZoIUm15mZb', '2017-05-17 02:07:07', '2017-05-17 02:07:07', NULL, NULL, NULL, NULL, 'my bio goes here', NULL, NULL, '1', NULL, 0, 0),
(2, 2, '', 'ram@gmail.com', '1508823967.jpg', '1.png', '$2y$10$bhMuTRz8Vr70AprzSkkXi./RWpfM5.3G8Zs9P2IM3GEeL.EnU3a86', '1Q44ngfGT9UKLAPrZljixV1midCxK2XMncdldgrva588AYQEMiEZ2wszBGlZ', '2017-05-22 15:01:01', '2018-01-19 07:00:27', 'cus_B0fFoa4B6OFnhD', 'Visa', '4242', NULL, 'I am not a good guy', NULL, NULL, 'ramgm', NULL, 1, 0),
(3, 3, '', 'bala223344@gmail.com', '', '2.png', '$2y$10$dehD5gC99eX/mGW003Pc7uaIF0b5KN/ZmDR.0epSy9WisLABY4gOG', 'cMv1DVJhnV6RFmGBjxHaoWLcfenxFUf3pEtu3SKODBeIi2dLSNVBuDZI6Ysd', '2017-06-01 03:14:59', '2017-09-19 07:04:18', NULL, NULL, NULL, NULL, 'good bal', NULL, NULL, 'bal', NULL, 0, 0),
(4, 3, '', 'jack@gmail.com', '1519816292.jpeg', '1519815583.png', '$2y$10$Ph5OzpEqnURGN.8dsYcc4eiUpMd19cLHteO.e4qxCHWQrEsSyz64K', 'Q63Qgs94j7fUjifHl6ixVRFWnzrHSaizocOJ03gVYb6hY5cdN7ynPmP1oZni', '2017-06-01 03:21:55', '2018-03-22 04:25:02', 'cus_CXV8GegZq4MRi5', 'Visa', '4242', NULL, 'what..', NULL, NULL, 'jacgm', NULL, 0, 0),
(5, 3, '', 'bal@gmail.com', '1517919220.jpeg', '2.png', '$2y$10$D3kFGVEp0w/IljuUJRShEuLJjnIliPypWqGqq5C266TY8Pmd8dnoy', 'cgd2hxg9hTPSAhSdxfPo1RMklgwlLT0Jx8gQwObiEqsUNOgs72m0QbhJIVPm', '2017-06-09 22:44:43', '2018-02-06 06:43:40', NULL, NULL, NULL, NULL, '', NULL, NULL, '', NULL, 0, 0),
(6, 3, '', 'jc@test.com', '1499249439.jpg', '1.png', '$2y$10$OR1bEfvmMmMgqngCB7Auqujr8S8lwzceOF2OsD2eeZN2ogcXYpFaG', 'Ua9eaf8KTROHD9CG4KeLD9YpLwKGEVtFWAewKGkLUtR1jWdtwPKZgkSZEaRe', '2017-06-19 13:22:24', '2018-01-19 06:53:01', NULL, NULL, NULL, NULL, 'around the galaxy', NULL, NULL, 'jac', 0, 1, 0),
(59, 3, NULL, 'mark@tes.com', '', '2.png', '$2y$10$TJvCoT7QsGdFbiL1RjNDU.6u267SvoMBQE38HRfVYW/dFohKwaLt6', 'YOx7qUpa87RtR9e7lieHLRqgPkXSJmKURBst2FltKV61BxU3G6dFp7gfaDSM', '2017-12-26 20:06:36', '2017-12-26 20:06:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'marktes', NULL, 1, 0),
(60, 2, NULL, 'on3@gmail.com', '', '1.png', '$2y$10$QYiVfc6/HfLfrQOLErg.4e3l2r/AMg4XAGexwVnafnQmfNnYFC1C.', 'JmOPisSr3RhiocM2ZQJqPyNEQdeF8gAqbtrxfqnVsMTUShL3T60EJQkLWuUD', '2017-12-26 20:07:20', '2017-12-26 20:07:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 0, 0),
(85, 2, NULL, NULL, '', '2.png', NULL, 'urV1ViGDC9MyfdjodmBWqmbhrPddtcvursCETT6R9Fi89Lh2F6GpFE83uvFN', '2018-02-23 04:57:01', '2018-02-23 04:57:01', NULL, NULL, NULL, NULL, NULL, 'twitter', '877457031795326976', NULL, NULL, 0, 0),
(93, 3, NULL, 'sdf@admin.com', NULL, '1.png', '$2y$10$yuUg27Uy5I4lqmpu3/pWs.CFSQs6BiXFOr2GWhT/Ik/PyeNWpD8wu', NULL, '2018-03-22 03:24:59', '2018-03-22 03:27:36', 'cus_CXUBVgnfwRXJXh', 'Visa', '4242', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(94, 3, NULL, 'coupon@gmail.com', NULL, '1.png', '$2y$10$v3VT4YgefkOfISEKu1lO/ulA0FFg6iKs86CQV5w6QkheZHXs/TpPa', 'RJd3BawOsGHLs3DSTtlbP5gfn3ZDJB97q2M4XHbxA6VID7muFfS9KzGRbB4M', '2018-03-22 08:52:22', '2018-03-22 09:18:21', 'cus_CXZr2SF579NaRi', 'Visa', '4242', NULL, NULL, NULL, NULL, 'copoun', NULL, 0, 0);

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
(2, 4, 6),
(12, 4, 59),
(9, 5, 6),
(16, 6, 4),
(13, 6, 5),
(14, 6, 59),
(11, 6, 79),
(5, 59, 4),
(10, 59, 83);

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
(4, 33, 1, NULL, NULL),
(5, 62, 1, NULL, NULL),
(59, 48, -1, NULL, NULL),
(59, 62, 1, NULL, NULL),
(59, 64, 1, NULL, NULL),
(75, 33, 1, NULL, NULL);

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
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

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
-- Indexes for table `question_counters`
--
ALTER TABLE `question_counters`
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
-- Indexes for table `stripe_webhook_calls`
--
ALTER TABLE `stripe_webhook_calls`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `question_counters`
--
ALTER TABLE `question_counters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `stripe_webhook_calls`
--
ALTER TABLE `stripe_webhook_calls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `user_followings`
--
ALTER TABLE `user_followings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
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
