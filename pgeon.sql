-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 25, 2018 at 05:10 AM
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
  `answer` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `manually_chosen_as_top` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `question_id`, `answer`, `created_at`, `updated_at`, `manually_chosen_as_top`) VALUES
(1, 3, 1, 'ruff', '2018-04-20 06:14:33', '2018-04-20 06:14:33', 0),
(2, 4, 3, 'jacgma', '2018-04-24 00:43:42', '2018-04-24 00:43:42', 0),
(3, 4, 5, 'my answer', '2018-04-28 03:20:10', '2018-04-28 03:20:10', 0),
(4, 4, 10, 'wha tis ths?', '2018-07-20 20:26:24', '2018-07-20 20:26:24', 0),
(6, 59, 12, 'marktest answer', '2018-07-22 02:05:00', '2018-07-22 02:05:00', 0),
(7, 4, 12, 'nice body', '2018-07-22 02:48:27', '2018-07-22 02:48:27', 0);

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
-- Table structure for table `local_coupons`
--

CREATE TABLE `local_coupons` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(100) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `max_redemptions` int(4) NOT NULL,
  `coupon_validity` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `local_coupons`
--

INSERT INTO `local_coupons` (`id`, `coupon_code`, `description`, `max_redemptions`, `coupon_validity`, `created_at`, `updated_at`) VALUES
(2, 'L', 'lfioe', 10, '2018-03-30 18:30:00', '2018-03-29 00:26:54', '2018-03-29 00:26:54');

-- --------------------------------------------------------

--
-- Table structure for table `local_coupon_usages`
--

CREATE TABLE `local_coupon_usages` (
  `id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `local_coupon_usages`
--

INSERT INTO `local_coupon_usages` (`id`, `coupon_id`, `user_id`, `created_at`, `updated_at`) VALUES
(10, 2, 4, '2018-03-29 00:36:43', '2018-03-29 00:36:43'),
(11, 2, 59, '2018-03-29 00:37:22', '2018-03-29 00:37:22');

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
(138, 6, 0, 1519210860, 'user_followed', '{\"followed_by\": 79}', '2018-02-21 16:31:00'),
(139, 6, 0, 1519211857, 'question_posted', '{\"created_by\": 4, \"question_id\": 111}', '2018-02-21 16:47:37'),
(140, 59, 0, 1519211857, 'question_posted', '{\"created_by\": 4, \"question_id\": 111}', '2018-02-21 16:47:37'),
(141, 6, 0, 1519213506, 'answer_accepted', '{\"question_id\": 111}', '2018-02-21 17:15:06'),
(142, 6, 0, 1519213917, 'question_posted', '{\"created_by\": 4, \"question_id\": 112}', '2018-02-21 17:21:57'),
(143, 59, 0, 1519213917, 'question_posted', '{\"created_by\": 4, \"question_id\": 112}', '2018-02-21 17:21:57'),
(144, 6, 0, 1519214972, 'question_posted', '{\"created_by\": 4, \"question_id\": 113}', '2018-02-21 17:39:32'),
(145, 59, 0, 1519214972, 'question_posted', '{\"created_by\": 4, \"question_id\": 113}', '2018-02-21 17:39:32'),
(147, 6, 0, 1519217916, 'user_followed', '{\"followed_by\": 59}', '2018-02-21 18:28:36'),
(149, 5, 0, 1519218425, 'votes_earned', '{\"votes\": 1, \"question_id\": 107}', '2018-02-21 18:37:04'),
(150, 71, 0, 1519307523, 'user_followed', '{\"followed_by\": 4}', '2018-02-22 19:22:03'),
(151, 6, 0, 1519307546, 'user_followed', '{\"followed_by\": 4}', '2018-02-22 19:22:26'),
(153, 5, 0, 1519309193, 'question_posted', '{\"created_by\": 6, \"question_id\": 114}', '2018-02-22 19:49:53'),
(154, 59, 0, 1519309193, 'question_posted', '{\"created_by\": 6, \"question_id\": 114}', '2018-02-22 19:49:53'),
(155, 79, 0, 1519309193, 'question_posted', '{\"created_by\": 6, \"question_id\": 114}', '2018-02-22 19:49:53'),
(157, 5, 0, 1519310030, 'question_posted', '{\"created_by\": 6, \"question_id\": 115}', '2018-02-22 20:03:50'),
(158, 59, 0, 1519310030, 'question_posted', '{\"created_by\": 6, \"question_id\": 115}', '2018-02-22 20:03:50'),
(159, 79, 0, 1519310030, 'question_posted', '{\"created_by\": 6, \"question_id\": 115}', '2018-02-22 20:03:50'),
(161, 83, 0, 1519310113, 'question_posted', '{\"created_by\": 59, \"question_id\": 116}', '2018-02-22 20:05:13'),
(163, 83, 0, 1519363473, 'question_posted', '{\"created_by\": 59, \"question_id\": 117}', '2018-02-23 10:54:33'),
(164, 59, 0, 1519364030, 'answer_accepted', '{\"question_id\": 115}', '2018-02-23 11:03:50'),
(166, 6, 0, 1519817135, 'question_posted', '{\"created_by\": 4, \"question_id\": 118}', '2018-02-28 16:55:35'),
(167, 59, 0, 1519817135, 'question_posted', '{\"created_by\": 4, \"question_id\": 118}', '2018-02-28 16:55:35'),
(168, 6, 0, 1521628407, 'question_posted', '{\"created_by\": 4, \"question_id\": 119}', '2018-03-21 16:03:27'),
(169, 59, 0, 1521628407, 'question_posted', '{\"created_by\": 4, \"question_id\": 119}', '2018-03-21 16:03:27'),
(171, 5, 0, 1522757085, 'question_posted', '{\"created_by\": 6, \"question_id\": 120}', '2018-04-03 17:34:45'),
(172, 59, 0, 1522757085, 'question_posted', '{\"created_by\": 6, \"question_id\": 120}', '2018-04-03 17:34:45'),
(173, 79, 0, 1522757085, 'question_posted', '{\"created_by\": 6, \"question_id\": 120}', '2018-04-03 17:34:45'),
(176, 6, 0, 1522827415, 'question_posted', '{\"created_by\": 4, \"question_id\": 121}', '2018-04-04 13:06:55'),
(177, 59, 0, 1522827415, 'question_posted', '{\"created_by\": 4, \"question_id\": 121}', '2018-04-04 13:06:55'),
(178, 6, 0, 1522844705, 'votes_earned', '{\"votes\": -1, \"question_id\": 121}', '2018-04-04 17:55:05'),
(181, 5, 0, 1523071044, 'question_posted', '{\"created_by\": 6, \"question_id\": 122}', '2018-04-07 08:47:24'),
(182, 59, 0, 1523071044, 'question_posted', '{\"created_by\": 6, \"question_id\": 122}', '2018-04-07 08:47:24'),
(183, 79, 0, 1523071044, 'question_posted', '{\"created_by\": 6, \"question_id\": 122}', '2018-04-07 08:47:24'),
(184, 6, 0, 1523275054, 'user_followed', '{\"followed_by\": 3}', '2018-04-09 17:27:34'),
(188, 6, 0, 1524198085, 'question_posted', '{\"created_by\": 4, \"question_id\": 126}', '2018-04-20 09:51:25'),
(189, 59, 0, 1524198085, 'question_posted', '{\"created_by\": 4, \"question_id\": 126}', '2018-04-20 09:51:25'),
(190, 6, 0, 1524200133, 'question_posted', '{\"created_by\": 4, \"question_id\": 127}', '2018-04-20 10:25:33'),
(191, 59, 0, 1524200133, 'question_posted', '{\"created_by\": 4, \"question_id\": 127}', '2018-04-20 10:25:33'),
(192, 6, 0, 1524202888, 'question_posted', '{\"created_by\": 4, \"question_id\": 128}', '2018-04-20 11:11:28'),
(193, 59, 0, 1524202888, 'question_posted', '{\"created_by\": 4, \"question_id\": 128}', '2018-04-20 11:11:28'),
(194, 5, 0, 1524202972, 'answer_accepted', '{\"question_id\": 127}', '2018-04-20 11:12:52'),
(195, 5, 0, 1524203037, 'answer_accepted', '{\"question_id\": 127}', '2018-04-20 11:13:57'),
(196, 5, 0, 1524203053, 'answer_accepted', '{\"question_id\": 128}', '2018-04-20 11:14:13'),
(197, 6, 0, 1524203203, 'question_posted', '{\"created_by\": 4, \"question_id\": 129}', '2018-04-20 11:16:43'),
(198, 59, 0, 1524203203, 'question_posted', '{\"created_by\": 4, \"question_id\": 129}', '2018-04-20 11:16:43'),
(199, 6, 0, 1524203361, 'question_posted', '{\"created_by\": 4, \"question_id\": 130}', '2018-04-20 11:19:21'),
(200, 59, 0, 1524203361, 'question_posted', '{\"created_by\": 4, \"question_id\": 130}', '2018-04-20 11:19:21'),
(201, 6, 0, 1524203454, 'question_posted', '{\"created_by\": 4, \"question_id\": 131}', '2018-04-20 11:20:54'),
(202, 59, 0, 1524203454, 'question_posted', '{\"created_by\": 4, \"question_id\": 131}', '2018-04-20 11:20:54'),
(203, 5, 0, 1524204672, 'answer_accepted', '{\"question_id\": 131}', '2018-04-20 11:41:12'),
(204, 5, 0, 1524204810, 'answer_accepted', '{\"question_id\": 129}', '2018-04-20 11:43:30'),
(205, 6, 0, 1524204838, 'question_posted', '{\"created_by\": 4, \"question_id\": 132}', '2018-04-20 11:43:58'),
(206, 59, 0, 1524204838, 'question_posted', '{\"created_by\": 4, \"question_id\": 132}', '2018-04-20 11:43:58'),
(207, 5, 0, 1524204875, 'answer_accepted', '{\"question_id\": 132}', '2018-04-20 11:44:35'),
(209, 108, 0, 1524222555, 'user_followed', '{\"followed_by\": 4}', '2018-04-20 16:39:15'),
(218, 3, 0, 1524889093, 'user_followed', '{\"followed_by\": 4}', '2018-04-28 09:48:13'),
(219, 3, 0, 1524905352, 'question_posted', '{\"created_by\": 4, \"question_id\": 6}', '2018-04-28 14:19:12'),
(220, 4, 0, 1524905976, 'user_followed', '{\"followed_by\": 6}', '2018-04-28 14:29:36'),
(221, 3, 0, 1525012212, 'question_posted', '{\"created_by\": 4, \"question_id\": 7}', '2018-04-29 20:00:12'),
(222, 6, 0, 1525012212, 'question_posted', '{\"created_by\": 4, \"question_id\": 7}', '2018-04-29 20:00:12'),
(223, 3, 0, 1525012275, 'question_posted', '{\"created_by\": 4, \"question_id\": 8}', '2018-04-29 20:01:15'),
(224, 6, 0, 1525012275, 'question_posted', '{\"created_by\": 4, \"question_id\": 8}', '2018-04-29 20:01:15'),
(225, 4, 0, 1532076095, 'question_posted', '{\"created_by\": 6, \"question_id\": 9}', '2018-07-20 14:11:35'),
(226, 4, 0, 1532079864, 'question_posted', '{\"created_by\": 6, \"question_id\": 10}', '2018-07-20 15:14:24'),
(227, 4, 0, 1532079917, 'question_posted', '{\"created_by\": 6, \"question_id\": 11}', '2018-07-20 15:15:17'),
(228, 4, 0, 1532138220, 'answer_accepted', '{\"question_id\": 10}', '2018-07-21 07:27:00'),
(229, 4, 0, 1532167599, 'question_posted', '{\"created_by\": 6, \"question_id\": 12}', '2018-07-21 15:36:39');

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
  `question` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 4, 'firind?', '2018-04-20 06:14:18', '2018-04-20 06:14:54', 'PUBLISHED', NULL, 1524224694, 1, 2),
(3, 3, 'RF quesiotn ?', '2018-04-24 00:08:37', '2018-04-24 01:07:48', 'PUBLISHED', NULL, 1524550578, 2, 3),
(4, 3, 'fine mawy?', '2018-04-24 01:06:35', '2018-04-24 01:10:43', 'PUBLISHED', NULL, 1524638195, 0, 1),
(5, 3, 'fowlwlign >?', '2018-04-27 06:49:36', '2018-04-28 03:22:22', 'PUBLISHED', NULL, 1524917976, 0, 1),
(6, 4, 'good big qu?', '2018-04-28 03:19:12', '2018-07-22 06:46:25', 'PUBLISHED', NULL, 1539899999, 0, 8),
(7, 4, '? what?', '2018-04-29 09:00:12', '2018-04-29 09:00:12', 'PUBLISHED', NULL, 1539999999, 0, 0),
(8, 4, '🐽 ?', '2018-04-29 09:01:15', '2018-07-20 20:25:28', 'PUBLISHED', NULL, 1539899999, 0, 1),
(9, 6, 'what live?', '2018-07-20 03:11:35', '2018-07-20 03:11:56', 'PUBLISHED', NULL, 1532076116, 0, 1),
(10, 6, 'shat?', '2018-07-20 04:14:24', '2018-07-23 05:49:26', 'PUBLISHED', NULL, 1532138219, 4, 6),
(11, 6, 'kjhskfd?', '2018-07-20 04:15:17', '2018-07-21 06:17:34', 'PUBLISHED', NULL, 1532166317, 0, 2),
(12, 6, 'what is that?', '2018-07-21 04:36:39', '2018-07-23 23:10:34', 'PUBLISHED', NULL, 1532599599, 0, 8);

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
(3, '2018-04-27 06:49:36'),
(4, '2018-04-29 09:01:15'),
(6, '2018-07-21 04:36:38');

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
(57, 'invoice.payment_succeeded', '{\"created\":1326853478,\"livemode\":false,\"id\":\"evt_00000000000000\",\"type\":\"invoice.payment_succeeded\",\"object\":\"event\",\"request\":null,\"pending_webhooks\":1,\"api_version\":\"2018-02-28\",\"data\":{\"object\":{\"id\":\"in_00000000000000\",\"object\":\"invoice\",\"amount_due\":500,\"amount_paid\":0,\"amount_remaining\":500,\"application_fee\":null,\"attempt_count\":4,\"attempted\":true,\"billing\":\"charge_automatically\",\"charge\":\"_00000000000000\",\"closed\":true,\"currency\":\"usd\",\"customer\":\"cus_00000000000000\",\"date\":1521003463,\"description\":null,\"discount\":null,\"due_date\":null,\"ending_balance\":0,\"forgiven\":false,\"lines\":{\"data\":[{\"id\":\"sub_B0o9q01Ydo8iZh\",\"object\":\"line_item\",\"amount\":500,\"currency\":\"usd\",\"description\":\"1 \\u00d7 Monthly (at $5.00 \\/ month)\",\"discountable\":true,\"livemode\":false,\"metadata\":[],\"period\":{\"end\":1528816404,\"start\":1526138004},\"plan\":{\"id\":\"pgeon_monthly\",\"object\":\"plan\",\"amount\":500,\"billing_scheme\":\"per_unit\",\"created\":1496192036,\"currency\":\"usd\",\"interval\":\"month\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":null,\"product\":\"prod_BUd9Htv5hfVqHC\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"proration\":false,\"quantity\":1,\"subscription\":null,\"subscription_item\":\"si_1AemWmDsm8J3jd1lX14bsPYJ\",\"type\":\"subscription\"}],\"has_more\":false,\"object\":\"list\",\"url\":\"\\/v1\\/invoices\\/in_1C5RgJDsm8J3jd1loihOPy1I\\/lines\"},\"livemode\":false,\"metadata\":[],\"next_payment_attempt\":null,\"number\":\"FD1FA79-0009\",\"paid\":true,\"period_end\":1521003336,\"period_start\":1518584136,\"receipt_number\":null,\"starting_balance\":0,\"statement_descriptor\":null,\"subscription\":\"sub_00000000000000\",\"subtotal\":500,\"tax\":null,\"tax_percent\":null,\"total\":500,\"webhooks_delivered_at\":1521003463}}}', NULL, '2018-04-25 03:45:21', '2018-04-25 03:45:21'),
(58, 'invoice.payment_succeeded', '{\"created\":1326853478,\"livemode\":false,\"id\":\"evt_00000000000000\",\"type\":\"invoice.payment_succeeded\",\"object\":\"event\",\"request\":null,\"pending_webhooks\":1,\"api_version\":\"2018-02-28\",\"data\":{\"object\":{\"id\":\"in_00000000000000\",\"object\":\"invoice\",\"amount_due\":500,\"amount_paid\":0,\"amount_remaining\":500,\"application_fee\":null,\"attempt_count\":4,\"attempted\":true,\"billing\":\"charge_automatically\",\"charge\":\"_00000000000000\",\"closed\":true,\"currency\":\"usd\",\"customer\":\"cus_00000000000000\",\"date\":1521003463,\"description\":null,\"discount\":null,\"due_date\":null,\"ending_balance\":0,\"forgiven\":false,\"lines\":{\"data\":[{\"id\":\"sub_B0o9q01Ydo8iZh\",\"object\":\"line_item\",\"amount\":500,\"currency\":\"usd\",\"description\":\"1 \\u00d7 Monthly (at $5.00 \\/ month)\",\"discountable\":true,\"livemode\":false,\"metadata\":[],\"period\":{\"end\":1528816404,\"start\":1526138004},\"plan\":{\"id\":\"pgeon_monthly\",\"object\":\"plan\",\"amount\":500,\"billing_scheme\":\"per_unit\",\"created\":1496192036,\"currency\":\"usd\",\"interval\":\"month\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":null,\"product\":\"prod_BUd9Htv5hfVqHC\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"proration\":false,\"quantity\":1,\"subscription\":null,\"subscription_item\":\"si_1AemWmDsm8J3jd1lX14bsPYJ\",\"type\":\"subscription\"}],\"has_more\":false,\"object\":\"list\",\"url\":\"\\/v1\\/invoices\\/in_1C5RgJDsm8J3jd1loihOPy1I\\/lines\"},\"livemode\":false,\"metadata\":[],\"next_payment_attempt\":null,\"number\":\"FD1FA79-0009\",\"paid\":true,\"period_end\":1521003336,\"period_start\":1518584136,\"receipt_number\":null,\"starting_balance\":0,\"statement_descriptor\":null,\"subscription\":\"sub_00000000000000\",\"subtotal\":500,\"tax\":null,\"tax_percent\":null,\"total\":500,\"webhooks_delivered_at\":1521003463}}}', NULL, '2018-04-25 04:26:19', '2018-04-25 04:26:20'),
(59, 'invoice.payment_succeeded', '{\"created\":1326853478,\"livemode\":false,\"id\":\"evt_00000000000000\",\"type\":\"invoice.payment_succeeded\",\"object\":\"event\",\"request\":null,\"pending_webhooks\":1,\"api_version\":\"2018-02-28\",\"data\":{\"object\":{\"id\":\"in_00000000000000\",\"object\":\"invoice\",\"amount_due\":500,\"amount_paid\":0,\"amount_remaining\":500,\"application_fee\":null,\"attempt_count\":4,\"attempted\":true,\"billing\":\"charge_automatically\",\"charge\":\"_00000000000000\",\"closed\":true,\"currency\":\"usd\",\"customer\":\"cus_00000000000000\",\"date\":1521003463,\"description\":null,\"discount\":null,\"due_date\":null,\"ending_balance\":0,\"forgiven\":false,\"lines\":{\"data\":[{\"id\":\"sub_B0o9q01Ydo8iZh\",\"object\":\"line_item\",\"amount\":500,\"currency\":\"usd\",\"description\":\"1 \\u00d7 Monthly (at $5.00 \\/ month)\",\"discountable\":true,\"livemode\":false,\"metadata\":[],\"period\":{\"end\":1528816404,\"start\":1526138004},\"plan\":{\"id\":\"pgeon_monthly\",\"object\":\"plan\",\"amount\":500,\"billing_scheme\":\"per_unit\",\"created\":1496192036,\"currency\":\"usd\",\"interval\":\"month\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":null,\"product\":\"prod_BUd9Htv5hfVqHC\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"proration\":false,\"quantity\":1,\"subscription\":null,\"subscription_item\":\"si_1AemWmDsm8J3jd1lX14bsPYJ\",\"type\":\"subscription\"}],\"has_more\":false,\"object\":\"list\",\"url\":\"\\/v1\\/invoices\\/in_1C5RgJDsm8J3jd1loihOPy1I\\/lines\"},\"livemode\":false,\"metadata\":[],\"next_payment_attempt\":null,\"number\":\"FD1FA79-0009\",\"paid\":true,\"period_end\":1521003336,\"period_start\":1518584136,\"receipt_number\":null,\"starting_balance\":0,\"statement_descriptor\":null,\"subscription\":\"sub_00000000000000\",\"subtotal\":500,\"tax\":null,\"tax_percent\":null,\"total\":500,\"webhooks_delivered_at\":1521003463}}}', NULL, '2018-04-25 04:28:21', '2018-04-25 04:28:21'),
(60, 'invoice.payment_succeeded', '{\"created\":1326853478,\"livemode\":false,\"id\":\"evt_00000000000000\",\"type\":\"invoice.payment_succeeded\",\"object\":\"event\",\"request\":null,\"pending_webhooks\":1,\"api_version\":\"2018-02-28\",\"data\":{\"object\":{\"id\":\"in_00000000000000\",\"object\":\"invoice\",\"amount_due\":500,\"amount_paid\":0,\"amount_remaining\":500,\"application_fee\":null,\"attempt_count\":4,\"attempted\":true,\"billing\":\"charge_automatically\",\"charge\":\"_00000000000000\",\"closed\":true,\"currency\":\"usd\",\"customer\":\"cus_00000000000000\",\"date\":1521003463,\"description\":null,\"discount\":null,\"due_date\":null,\"ending_balance\":0,\"forgiven\":false,\"lines\":{\"data\":[{\"id\":\"sub_B0o9q01Ydo8iZh\",\"object\":\"line_item\",\"amount\":500,\"currency\":\"usd\",\"description\":\"1 \\u00d7 Monthly (at $5.00 \\/ month)\",\"discountable\":true,\"livemode\":false,\"metadata\":[],\"period\":{\"end\":1528816404,\"start\":1526138004},\"plan\":{\"id\":\"pgeon_monthly\",\"object\":\"plan\",\"amount\":500,\"billing_scheme\":\"per_unit\",\"created\":1496192036,\"currency\":\"usd\",\"interval\":\"month\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":null,\"product\":\"prod_BUd9Htv5hfVqHC\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"proration\":false,\"quantity\":1,\"subscription\":null,\"subscription_item\":\"si_1AemWmDsm8J3jd1lX14bsPYJ\",\"type\":\"subscription\"}],\"has_more\":false,\"object\":\"list\",\"url\":\"\\/v1\\/invoices\\/in_1C5RgJDsm8J3jd1loihOPy1I\\/lines\"},\"livemode\":false,\"metadata\":[],\"next_payment_attempt\":null,\"number\":\"FD1FA79-0009\",\"paid\":true,\"period_end\":1521003336,\"period_start\":1518584136,\"receipt_number\":null,\"starting_balance\":0,\"statement_descriptor\":null,\"subscription\":\"sub_00000000000000\",\"subtotal\":500,\"tax\":null,\"tax_percent\":null,\"total\":500,\"webhooks_delivered_at\":1521003463}}}', NULL, '2018-04-25 04:40:46', '2018-04-25 04:40:46'),
(61, 'invoice.payment_succeeded', '{\"created\":1326853478,\"livemode\":false,\"id\":\"evt_00000000000000\",\"type\":\"invoice.payment_succeeded\",\"object\":\"event\",\"request\":null,\"pending_webhooks\":1,\"api_version\":\"2018-02-28\",\"data\":{\"object\":{\"id\":\"in_00000000000000\",\"object\":\"invoice\",\"amount_due\":500,\"amount_paid\":0,\"amount_remaining\":500,\"application_fee\":null,\"attempt_count\":4,\"attempted\":true,\"billing\":\"charge_automatically\",\"charge\":\"_00000000000000\",\"closed\":true,\"currency\":\"usd\",\"customer\":\"cus_00000000000000\",\"date\":1521003463,\"description\":null,\"discount\":null,\"due_date\":null,\"ending_balance\":0,\"forgiven\":false,\"lines\":{\"data\":[{\"id\":\"sub_B0o9q01Ydo8iZh\",\"object\":\"line_item\",\"amount\":500,\"currency\":\"usd\",\"description\":\"1 \\u00d7 Monthly (at $5.00 \\/ month)\",\"discountable\":true,\"livemode\":false,\"metadata\":[],\"period\":{\"end\":1528816404,\"start\":1526138004},\"plan\":{\"id\":\"pgeon_monthly\",\"object\":\"plan\",\"amount\":500,\"billing_scheme\":\"per_unit\",\"created\":1496192036,\"currency\":\"usd\",\"interval\":\"month\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":null,\"product\":\"prod_BUd9Htv5hfVqHC\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"proration\":false,\"quantity\":1,\"subscription\":null,\"subscription_item\":\"si_1AemWmDsm8J3jd1lX14bsPYJ\",\"type\":\"subscription\"}],\"has_more\":false,\"object\":\"list\",\"url\":\"\\/v1\\/invoices\\/in_1C5RgJDsm8J3jd1loihOPy1I\\/lines\"},\"livemode\":false,\"metadata\":[],\"next_payment_attempt\":null,\"number\":\"FD1FA79-0009\",\"paid\":true,\"period_end\":1521003336,\"period_start\":1518584136,\"receipt_number\":null,\"starting_balance\":0,\"statement_descriptor\":null,\"subscription\":\"sub_00000000000000\",\"subtotal\":500,\"tax\":null,\"tax_percent\":null,\"total\":500,\"webhooks_delivered_at\":1521003463}}}', NULL, '2018-04-25 05:11:37', '2018-04-25 05:11:38'),
(62, 'invoice.payment_succeeded', '{\"created\":1326853478,\"livemode\":false,\"id\":\"evt_00000000000000\",\"type\":\"invoice.payment_succeeded\",\"object\":\"event\",\"request\":null,\"pending_webhooks\":1,\"api_version\":\"2018-02-28\",\"data\":{\"object\":{\"id\":\"in_00000000000000\",\"object\":\"invoice\",\"amount_due\":500,\"amount_paid\":0,\"amount_remaining\":500,\"application_fee\":null,\"attempt_count\":4,\"attempted\":true,\"billing\":\"charge_automatically\",\"charge\":\"_00000000000000\",\"closed\":true,\"currency\":\"usd\",\"customer\":\"cus_00000000000000\",\"date\":1521003463,\"description\":null,\"discount\":null,\"due_date\":null,\"ending_balance\":0,\"forgiven\":false,\"lines\":{\"data\":[{\"id\":\"sub_B0o9q01Ydo8iZh\",\"object\":\"line_item\",\"amount\":500,\"currency\":\"usd\",\"description\":\"1 \\u00d7 Monthly (at $5.00 \\/ month)\",\"discountable\":true,\"livemode\":false,\"metadata\":[],\"period\":{\"end\":1528816404,\"start\":1526138004},\"plan\":{\"id\":\"pgeon_monthly\",\"object\":\"plan\",\"amount\":500,\"billing_scheme\":\"per_unit\",\"created\":1496192036,\"currency\":\"usd\",\"interval\":\"month\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":null,\"product\":\"prod_BUd9Htv5hfVqHC\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"proration\":false,\"quantity\":1,\"subscription\":null,\"subscription_item\":\"si_1AemWmDsm8J3jd1lX14bsPYJ\",\"type\":\"subscription\"}],\"has_more\":false,\"object\":\"list\",\"url\":\"\\/v1\\/invoices\\/in_1C5RgJDsm8J3jd1loihOPy1I\\/lines\"},\"livemode\":false,\"metadata\":[],\"next_payment_attempt\":null,\"number\":\"FD1FA79-0009\",\"paid\":true,\"period_end\":1521003336,\"period_start\":1518584136,\"receipt_number\":null,\"starting_balance\":0,\"statement_descriptor\":null,\"subscription\":\"sub_00000000000000\",\"subtotal\":500,\"tax\":null,\"tax_percent\":null,\"total\":500,\"webhooks_delivered_at\":1521003463}}}', NULL, '2018-04-25 05:21:23', '2018-04-25 05:21:23'),
(63, 'invoice.payment_succeeded', '{\"created\":1326853478,\"livemode\":false,\"id\":\"evt_00000000000000\",\"type\":\"invoice.payment_succeeded\",\"object\":\"event\",\"request\":null,\"pending_webhooks\":1,\"api_version\":\"2018-02-28\",\"data\":{\"object\":{\"id\":\"in_00000000000000\",\"object\":\"invoice\",\"amount_due\":500,\"amount_paid\":0,\"amount_remaining\":500,\"application_fee\":null,\"attempt_count\":4,\"attempted\":true,\"billing\":\"charge_automatically\",\"charge\":\"_00000000000000\",\"closed\":true,\"currency\":\"usd\",\"customer\":\"cus_00000000000000\",\"date\":1521003463,\"description\":null,\"discount\":null,\"due_date\":null,\"ending_balance\":0,\"forgiven\":false,\"lines\":{\"data\":[{\"id\":\"sub_B0o9q01Ydo8iZh\",\"object\":\"line_item\",\"amount\":500,\"currency\":\"usd\",\"description\":\"1 \\u00d7 Monthly (at $5.00 \\/ month)\",\"discountable\":true,\"livemode\":false,\"metadata\":[],\"period\":{\"end\":1528816404,\"start\":1526138004},\"plan\":{\"id\":\"pgeon_monthly\",\"object\":\"plan\",\"amount\":500,\"billing_scheme\":\"per_unit\",\"created\":1496192036,\"currency\":\"usd\",\"interval\":\"month\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":null,\"product\":\"prod_BUd9Htv5hfVqHC\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"proration\":false,\"quantity\":1,\"subscription\":null,\"subscription_item\":\"si_1AemWmDsm8J3jd1lX14bsPYJ\",\"type\":\"subscription\"}],\"has_more\":false,\"object\":\"list\",\"url\":\"\\/v1\\/invoices\\/in_1C5RgJDsm8J3jd1loihOPy1I\\/lines\"},\"livemode\":false,\"metadata\":[],\"next_payment_attempt\":null,\"number\":\"FD1FA79-0009\",\"paid\":true,\"period_end\":1521003336,\"period_start\":1518584136,\"receipt_number\":null,\"starting_balance\":0,\"statement_descriptor\":null,\"subscription\":\"sub_00000000000000\",\"subtotal\":500,\"tax\":null,\"tax_percent\":null,\"total\":500,\"webhooks_delivered_at\":1521003463}}}', NULL, '2018-04-25 05:22:49', '2018-04-25 05:22:49'),
(64, 'invoice.payment_succeeded', '{\"created\":1326853478,\"livemode\":false,\"id\":\"evt_00000000000000\",\"type\":\"invoice.payment_succeeded\",\"object\":\"event\",\"request\":null,\"pending_webhooks\":1,\"api_version\":\"2018-02-28\",\"data\":{\"object\":{\"id\":\"in_00000000000000\",\"object\":\"invoice\",\"amount_due\":500,\"amount_paid\":0,\"amount_remaining\":500,\"application_fee\":null,\"attempt_count\":4,\"attempted\":true,\"billing\":\"charge_automatically\",\"charge\":\"_00000000000000\",\"closed\":true,\"currency\":\"usd\",\"customer\":\"cus_00000000000000\",\"date\":1521003463,\"description\":null,\"discount\":null,\"due_date\":null,\"ending_balance\":0,\"forgiven\":false,\"lines\":{\"data\":[{\"id\":\"sub_B0o9q01Ydo8iZh\",\"object\":\"line_item\",\"amount\":500,\"currency\":\"usd\",\"description\":\"1 \\u00d7 Monthly (at $5.00 \\/ month)\",\"discountable\":true,\"livemode\":false,\"metadata\":[],\"period\":{\"end\":1528816404,\"start\":1526138004},\"plan\":{\"id\":\"pgeon_monthly\",\"object\":\"plan\",\"amount\":500,\"billing_scheme\":\"per_unit\",\"created\":1496192036,\"currency\":\"usd\",\"interval\":\"month\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":null,\"product\":\"prod_BUd9Htv5hfVqHC\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"proration\":false,\"quantity\":1,\"subscription\":null,\"subscription_item\":\"si_1AemWmDsm8J3jd1lX14bsPYJ\",\"type\":\"subscription\"}],\"has_more\":false,\"object\":\"list\",\"url\":\"\\/v1\\/invoices\\/in_1C5RgJDsm8J3jd1loihOPy1I\\/lines\"},\"livemode\":false,\"metadata\":[],\"next_payment_attempt\":null,\"number\":\"FD1FA79-0009\",\"paid\":true,\"period_end\":1521003336,\"period_start\":1518584136,\"receipt_number\":null,\"starting_balance\":0,\"statement_descriptor\":null,\"subscription\":\"sub_00000000000000\",\"subtotal\":500,\"tax\":null,\"tax_percent\":null,\"total\":500,\"webhooks_delivered_at\":1521003463}}}', NULL, '2018-04-25 05:59:24', '2018-04-25 05:59:24'),
(65, 'invoice.payment_succeeded', '{\"created\":1326853478,\"livemode\":false,\"id\":\"evt_00000000000000\",\"type\":\"invoice.payment_succeeded\",\"object\":\"event\",\"request\":null,\"pending_webhooks\":1,\"api_version\":\"2018-02-28\",\"data\":{\"object\":{\"id\":\"in_00000000000000\",\"object\":\"invoice\",\"amount_due\":500,\"amount_paid\":0,\"amount_remaining\":500,\"application_fee\":null,\"attempt_count\":4,\"attempted\":true,\"billing\":\"charge_automatically\",\"charge\":\"_00000000000000\",\"closed\":true,\"currency\":\"usd\",\"customer\":\"cus_00000000000000\",\"date\":1521003463,\"description\":null,\"discount\":null,\"due_date\":null,\"ending_balance\":0,\"forgiven\":false,\"lines\":{\"data\":[{\"id\":\"sub_B0o9q01Ydo8iZh\",\"object\":\"line_item\",\"amount\":500,\"currency\":\"usd\",\"description\":\"1 \\u00d7 Monthly (at $5.00 \\/ month)\",\"discountable\":true,\"livemode\":false,\"metadata\":[],\"period\":{\"end\":1528816404,\"start\":1526138004},\"plan\":{\"id\":\"pgeon_monthly\",\"object\":\"plan\",\"amount\":500,\"billing_scheme\":\"per_unit\",\"created\":1496192036,\"currency\":\"usd\",\"interval\":\"month\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":null,\"product\":\"prod_BUd9Htv5hfVqHC\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"proration\":false,\"quantity\":1,\"subscription\":null,\"subscription_item\":\"si_1AemWmDsm8J3jd1lX14bsPYJ\",\"type\":\"subscription\"}],\"has_more\":false,\"object\":\"list\",\"url\":\"\\/v1\\/invoices\\/in_1C5RgJDsm8J3jd1loihOPy1I\\/lines\"},\"livemode\":false,\"metadata\":[],\"next_payment_attempt\":null,\"number\":\"FD1FA79-0009\",\"paid\":true,\"period_end\":1521003336,\"period_start\":1518584136,\"receipt_number\":null,\"starting_balance\":0,\"statement_descriptor\":null,\"subscription\":\"sub_00000000000000\",\"subtotal\":500,\"tax\":null,\"tax_percent\":null,\"total\":500,\"webhooks_delivered_at\":1521003463}}}', NULL, '2018-04-25 06:04:10', '2018-04-25 06:04:10'),
(66, 'invoice.payment_succeeded', '{\"created\":1326853478,\"livemode\":false,\"id\":\"evt_00000000000000\",\"type\":\"invoice.payment_succeeded\",\"object\":\"event\",\"request\":null,\"pending_webhooks\":1,\"api_version\":\"2018-02-28\",\"data\":{\"object\":{\"id\":\"in_00000000000000\",\"object\":\"invoice\",\"amount_due\":500,\"amount_paid\":0,\"amount_remaining\":500,\"application_fee\":null,\"attempt_count\":4,\"attempted\":true,\"billing\":\"charge_automatically\",\"charge\":\"_00000000000000\",\"closed\":true,\"currency\":\"usd\",\"customer\":\"cus_00000000000000\",\"date\":1521003463,\"description\":null,\"discount\":null,\"due_date\":null,\"ending_balance\":0,\"forgiven\":false,\"lines\":{\"data\":[{\"id\":\"sub_B0o9q01Ydo8iZh\",\"object\":\"line_item\",\"amount\":500,\"currency\":\"usd\",\"description\":\"1 \\u00d7 Monthly (at $5.00 \\/ month)\",\"discountable\":true,\"livemode\":false,\"metadata\":[],\"period\":{\"end\":1528816404,\"start\":1526138004},\"plan\":{\"id\":\"pgeon_monthly\",\"object\":\"plan\",\"amount\":500,\"billing_scheme\":\"per_unit\",\"created\":1496192036,\"currency\":\"usd\",\"interval\":\"month\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":null,\"product\":\"prod_BUd9Htv5hfVqHC\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"proration\":false,\"quantity\":1,\"subscription\":null,\"subscription_item\":\"si_1AemWmDsm8J3jd1lX14bsPYJ\",\"type\":\"subscription\"}],\"has_more\":false,\"object\":\"list\",\"url\":\"\\/v1\\/invoices\\/in_1C5RgJDsm8J3jd1loihOPy1I\\/lines\"},\"livemode\":false,\"metadata\":[],\"next_payment_attempt\":null,\"number\":\"FD1FA79-0009\",\"paid\":true,\"period_end\":1521003336,\"period_start\":1518584136,\"receipt_number\":null,\"starting_balance\":0,\"statement_descriptor\":null,\"subscription\":\"sub_00000000000000\",\"subtotal\":500,\"tax\":null,\"tax_percent\":null,\"total\":500,\"webhooks_delivered_at\":1521003463}}}', NULL, '2018-04-25 06:04:44', '2018-04-25 06:04:44'),
(67, 'invoice.payment_succeeded', '{\"created\":1326853478,\"livemode\":false,\"id\":\"evt_00000000000000\",\"type\":\"invoice.payment_succeeded\",\"object\":\"event\",\"request\":null,\"pending_webhooks\":1,\"api_version\":\"2018-02-28\",\"data\":{\"object\":{\"id\":\"in_00000000000000\",\"object\":\"invoice\",\"amount_due\":500,\"amount_paid\":0,\"amount_remaining\":500,\"application_fee\":null,\"attempt_count\":4,\"attempted\":true,\"billing\":\"charge_automatically\",\"charge\":\"_00000000000000\",\"closed\":true,\"currency\":\"usd\",\"customer\":\"cus_00000000000000\",\"date\":1521003463,\"description\":null,\"discount\":null,\"due_date\":null,\"ending_balance\":0,\"forgiven\":false,\"lines\":{\"data\":[{\"id\":\"sub_B0o9q01Ydo8iZh\",\"object\":\"line_item\",\"amount\":500,\"currency\":\"usd\",\"description\":\"1 \\u00d7 Monthly (at $5.00 \\/ month)\",\"discountable\":true,\"livemode\":false,\"metadata\":[],\"period\":{\"end\":1528816404,\"start\":1526138004},\"plan\":{\"id\":\"pgeon_monthly\",\"object\":\"plan\",\"amount\":500,\"billing_scheme\":\"per_unit\",\"created\":1496192036,\"currency\":\"usd\",\"interval\":\"month\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":null,\"product\":\"prod_BUd9Htv5hfVqHC\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"proration\":false,\"quantity\":1,\"subscription\":null,\"subscription_item\":\"si_1AemWmDsm8J3jd1lX14bsPYJ\",\"type\":\"subscription\"}],\"has_more\":false,\"object\":\"list\",\"url\":\"\\/v1\\/invoices\\/in_1C5RgJDsm8J3jd1loihOPy1I\\/lines\"},\"livemode\":false,\"metadata\":[],\"next_payment_attempt\":null,\"number\":\"FD1FA79-0009\",\"paid\":true,\"period_end\":1521003336,\"period_start\":1518584136,\"receipt_number\":null,\"starting_balance\":0,\"statement_descriptor\":null,\"subscription\":\"sub_00000000000000\",\"subtotal\":500,\"tax\":null,\"tax_percent\":null,\"total\":500,\"webhooks_delivered_at\":1521003463}}}', NULL, '2018-04-25 06:06:34', '2018-04-25 06:06:34'),
(68, 'invoice.payment_succeeded', '{\"created\":1326853478,\"livemode\":false,\"id\":\"evt_00000000000000\",\"type\":\"invoice.payment_succeeded\",\"object\":\"event\",\"request\":null,\"pending_webhooks\":1,\"api_version\":\"2018-02-28\",\"data\":{\"object\":{\"id\":\"in_00000000000000\",\"object\":\"invoice\",\"amount_due\":500,\"amount_paid\":0,\"amount_remaining\":500,\"application_fee\":null,\"attempt_count\":4,\"attempted\":true,\"billing\":\"charge_automatically\",\"charge\":\"_00000000000000\",\"closed\":true,\"currency\":\"usd\",\"customer\":\"cus_00000000000000\",\"date\":1521003463,\"description\":null,\"discount\":null,\"due_date\":null,\"ending_balance\":0,\"forgiven\":false,\"lines\":{\"data\":[{\"id\":\"sub_B0o9q01Ydo8iZh\",\"object\":\"line_item\",\"amount\":500,\"currency\":\"usd\",\"description\":\"1 \\u00d7 Monthly (at $5.00 \\/ month)\",\"discountable\":true,\"livemode\":false,\"metadata\":[],\"period\":{\"end\":1528816404,\"start\":1526138004},\"plan\":{\"id\":\"pgeon_monthly\",\"object\":\"plan\",\"amount\":500,\"billing_scheme\":\"per_unit\",\"created\":1496192036,\"currency\":\"usd\",\"interval\":\"month\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":null,\"product\":\"prod_BUd9Htv5hfVqHC\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"proration\":false,\"quantity\":1,\"subscription\":null,\"subscription_item\":\"si_1AemWmDsm8J3jd1lX14bsPYJ\",\"type\":\"subscription\"}],\"has_more\":false,\"object\":\"list\",\"url\":\"\\/v1\\/invoices\\/in_1C5RgJDsm8J3jd1loihOPy1I\\/lines\"},\"livemode\":false,\"metadata\":[],\"next_payment_attempt\":null,\"number\":\"FD1FA79-0009\",\"paid\":true,\"period_end\":1521003336,\"period_start\":1518584136,\"receipt_number\":null,\"starting_balance\":0,\"statement_descriptor\":null,\"subscription\":\"sub_00000000000000\",\"subtotal\":500,\"tax\":null,\"tax_percent\":null,\"total\":500,\"webhooks_delivered_at\":1521003463}}}', NULL, '2018-04-25 06:14:23', '2018-04-25 06:14:23');

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
(27, 3, 'main', 'sub_CffFMNh4zbWqBS', 'pgeon_yearly', 1, NULL, '2018-04-12 23:36:38', '2018-04-12 23:23:48', '2018-04-12 23:36:38'),
(28, 3, 'main', 'sub_Cffhf5a1UTdEnF', 'pgeon_monthly', 1, NULL, '2018-04-19 01:46:47', '2018-04-12 23:51:46', '2018-04-19 01:46:47'),
(29, 3, 'main', 'sub_ChwyEP7zrOaTER', 'pgeon_monthly', 1, NULL, '2018-04-19 01:52:23', '2018-04-19 01:50:59', '2018-04-19 01:52:23'),
(30, 3, 'main', 'sub_ChyMpV41fiXlkW', 'pgeon_monthly', 1, NULL, '2018-04-19 03:16:46', '2018-04-19 03:16:25', '2018-04-19 03:16:46'),
(31, 3, 'main', 'sub_ChyZjeHaF5JnaI', 'pgeon_monthly', 1, NULL, NULL, '2018-04-19 03:30:00', '2018-04-19 03:30:00');

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
(1, 1, '', 'admin@admin.com', '', '2.png', '$2y$10$QXCKwWMssG4XZfY30UTnberfWKkzDmRkZjdT5pQVxQWXrsF//3DDS', 'JHcZgWnXfltsWozl21Ey2YHGlaEBuahD0jiWbrULfaIr2QznyjPOr5IMJT0j', '2017-05-17 02:07:07', '2018-03-29 01:46:09', NULL, NULL, NULL, NULL, 'my bio goes here', NULL, NULL, '1', NULL, 0, 0),
(2, 2, 'ramme', 'ram@gmail.com', '1508823967.png', '1.png', '$2y$10$bhMuTRz8Vr70AprzSkkXi./RWpfM5.3G8Zs9P2IM3GEeL.EnU3a86', 'kBMplCjNogK7Ej2cFxLMRs9jIiXMUC4cMKmOtGhrAxSAdoaOVmVHVC97uVEK', '2017-05-22 15:01:01', '2018-01-19 07:00:27', 'cus_B0fFoa4B6OFnhD', 'Visa', '4242', NULL, 'I am not a good guy', NULL, NULL, 'ramgm', NULL, 1, 0),
(3, 3, 'russ franklin', 'rameshkumar86@gmail.com', '', '2.png', '$2y$10$ysX1GdSeXjV/UTAA99vaaeHUxeIE0Av.QRGrgYYNb0cEea62AZBM2', 'Ssbd1PgOycYdVwH4syPSUgFEO3P8n1insJTmJmk4ZzFll7OH2wWnS4NLC99q', '2017-06-01 03:14:59', '2018-04-19 03:30:01', 'cus_Ca9fOKr4mujcAQ', 'Visa', '4242', NULL, 'good bal', NULL, NULL, 'russfr', NULL, 1, 0),
(4, 2, 'jj', 'jack@gmail.com', '1524116422.png', '1519815583.png', '$2y$10$Ph5OzpEqnURGN.8dsYcc4eiUpMd19cLHteO.e4qxCHWQrEsSyz64K', 'zR8g9jISjFfxGKjwPcoMc8yA950IfSeBkL4qTTPBD8THnDaTEi26Tq4O5HSN', '2017-06-01 03:21:55', '2018-04-19 00:10:22', 'cus_CXV8GegZq4MRi5', 'Visa', '4242', NULL, 'what..', NULL, NULL, 'jacgm', NULL, 1, 0),
(6, 3, '', 'jc@test.com', '1499249439.jpg', '1.png', '$2y$10$p1Skwv4hHcvtuuDkw5FPSO0iicnZYwPRCFRt.2L831VtNrLaglOTG', 'S3TcMeqrIBb8SiepLBTLVde3N864weSvZkttSRLff7jH2EAznyiH7wcJ4rvw', '2017-06-19 13:22:24', '2018-04-03 06:33:27', 'cus_Cc1uODnOjrez1C', 'Visa', '4242', NULL, 'around the galaxy', NULL, NULL, 'jac', 0, 1, 0),
(59, 3, NULL, 'mark@tes.com', '', '2.png', '$2y$10$TJvCoT7QsGdFbiL1RjNDU.6u267SvoMBQE38HRfVYW/dFohKwaLt6', 'p78O1ALJkb35A4wLvXzZjnJcvSs9hiD0bvvRHMbJAsUuwXceIrogVBQU4vko', '2017-12-26 20:06:36', '2018-03-29 01:48:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'marktes', NULL, 1, 0),
(109, 2, 'wha tis this a', 'dsmin@admin.co', NULL, NULL, '$2y$10$FPlXsSTtme9OhUJDLamkq.E0M/k.SNuekjaFszK5J2R0e78PftKwG', 'Grgl0hSghZXhnQq1MGTr8XryfctIqUz9pKkabl1N5tl3c0pSYUObvp2qETXZ', '2018-04-25 01:02:01', '2018-04-25 01:08:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '109', NULL, 0, 0),
(110, 2, 'uiu mat', 'adln@admin.com', NULL, NULL, '$2y$10$9hNimVSti4wz5Hfm3Gs.XuZwVeb5JzfAvPXBl4E13n61wO8eYDSfe', 'W4x9j5IkxY9GlOLGwB1I09ohKNtVwkXkSU1HzRziqRIS0hGuaKZZNlG38ny1', '2018-04-25 01:34:48', '2018-04-25 01:35:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'uiu110', NULL, 0, 0),
(111, 2, NULL, 'adlkn@admin.com', NULL, NULL, '$2y$10$cF.wYs.YLxP866KgTlS2s.sUT2FqsLbbQFmQkRiQTO0WxiC6OowU6', 'XQwbeOkCvncXkSFWciZQWomWWRncLpRI0sJ79U7aD5swvi42A9b0dwKq49PV', '2018-04-25 01:35:29', '2018-04-25 01:35:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '111', NULL, 0, 0),
(112, 2, 'deerk okm', 'admoi@aimin.com', NULL, NULL, '$2y$10$PUf9BqEB80.FIxbqBnsNHeNTFXFQa6RQbUi.BSTWUsBsiq1EHwXNm', NULL, '2018-04-25 01:36:49', '2018-04-25 01:54:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mar112', NULL, 0, 0),
(113, 2, 'rameshkumar', NULL, NULL, NULL, NULL, 'q4LmSZK4k25rclcJlURiLwO7cwgNWjr0laCZSJIa6HP4XpjI8Cvbu8f1nUQE', '2018-07-18 22:57:58', '2018-07-18 22:57:59', NULL, NULL, NULL, NULL, NULL, 'twitter', '39559531', 'ram113', NULL, 0, 0),
(114, 2, NULL, 'admllin@admin.com', NULL, NULL, '$2y$10$14lCj/c2mjSdYpcl7IaGJOZKIpQ7.PDxfb1yXaS7IBky8fS0a0yMO', 'aKRVUvhTvbs6ec47id8oyPPME9DVio1kxKk10Q0OkXC3e2kNhygAXKHA5sc7', '2018-07-19 04:57:17', '2018-07-19 04:57:17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '114', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_activations`
--

CREATE TABLE `user_activations` (
  `new_email` varchar(150) NOT NULL,
  `act_code` varchar(6) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_activations`
--

INSERT INTO `user_activations` (`new_email`, `act_code`, `user_id`, `created_at`, `updated_at`) VALUES
('rameshkumar86@gmail.com', '2e47', 3, '2018-04-19 00:50:45', '2018-04-19 00:50:45'),
('bala223344@gmail.com', '85d7', 3, '2018-04-24 04:40:16', '2018-04-24 04:40:16');

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
(6, 4, 3),
(46, 4, 6),
(35, 6, 4);

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
(3, 5, 1, NULL, NULL),
(6, 3, 1, NULL, NULL);

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
-- Indexes for table `local_coupons`
--
ALTER TABLE `local_coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupon_code` (`coupon_code`);

--
-- Indexes for table `local_coupon_usages`
--
ALTER TABLE `local_coupon_usages`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT for table `local_coupons`
--
ALTER TABLE `local_coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `local_coupon_usages`
--
ALTER TABLE `local_coupon_usages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `question_counters`
--
ALTER TABLE `question_counters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `user_followings`
--
ALTER TABLE `user_followings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
