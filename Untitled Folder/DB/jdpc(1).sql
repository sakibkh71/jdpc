-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 31, 2016 at 03:14 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jdpc`
--

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE IF NOT EXISTS `discount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `percent` int(4) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `img1` varchar(50) NOT NULL,
  `details` varchar(500) NOT NULL,
  `display` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `percent`, `cate_id`, `start`, `end`, `img1`, `details`, `display`) VALUES
(3, 2, 2, '2016-08-19', '2016-09-08', 'img1_29_08_16_11_08_34.jpg', 'sfsdfs', 1),
(4, 56, 3, '2016-08-02', '2016-08-26', 'img1_29_08_16_11_08_12.png', 'dssdfsdfds sdfs dfs', 1),
(5, 23, 1, '2016-08-02', '2016-08-31', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_01_15_105324_create_roles_table', 1),
('2015_01_15_114412_create_role_user_table', 1),
('2015_01_26_115212_create_permissions_table', 1),
('2015_01_26_115523_create_permission_role_table', 1),
('2015_02_09_132439_create_permission_user_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE IF NOT EXISTS `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE IF NOT EXISTS `permission_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_user_permission_id_index` (`permission_id`),
  KEY `permission_user_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `item_code` varchar(50) NOT NULL,
  `img1` varchar(50) NOT NULL,
  `img2` varchar(50) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `specification` varchar(250) NOT NULL,
  `over_view` varchar(500) NOT NULL,
  `quantity` int(2) NOT NULL,
  `features` varchar(500) NOT NULL,
  `weight` varchar(15) NOT NULL,
  `price` float NOT NULL,
  `discount_id` int(11) NOT NULL,
  `display` int(1) NOT NULL,
  `post_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `item_code`, `img1`, `img2`, `cate_id`, `merchant_id`, `specification`, `over_view`, `quantity`, `features`, `weight`, `price`, `discount_id`, `display`, `post_by`) VALUES
(3, 'test', 'E3245', 'img1_26_08_16_08_08_55.jpg', 'img2_26_08_16_06_08_14.png', 1, 10, 'section sjflkdsjf', 'ovsresjl sdlfjlsdjfls ovsresjl sdlfjlsdjfls ovsresjl sdlfjlsdjfls ovsresjl sdlfjlsdjfls ovsresjl sdlfjlsdjfls ovsresjl sdlfjlsdjfls ovsresjl sdlfjlsdjfls ovsresjl sdlfjlsdjfls ovsresjl sdlfjlsdjfls ', 34, 'features ovsresjl sdlfjlsdjfls ovsresjl sdlfjlsdjfls ovsresjl sdlfjlsdjfls ovsresjl sdlfjlsdjfls ovsresjl sdlfjlsdjfls ovsresjl sdlfjlsdjfls ovsresjl sdlfjlsdjfls ovsresjl sdlfjlsdjfls ovsresjl sdlfjlsdjfls ', '1.3 gm', 1205, 0, 1, 7),
(4, 'another one', '34UI', 'img1_26_08_16_06_08_48.jpg', 'img2_26_08_16_08_08_37.jpg', 1, 11, 'jslfj sdjfl ', '', 5, 'feaj', '12kg', 125, 5, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `display` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `name`, `details`, `display`) VALUES
(1, 'Bags', 'All types of jute bags', 1),
(4, 'Decoration item', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `level`, `created_at`, `updated_at`) VALUES
(3, 'Super admin', 'superadmin', '', 1, '2016-08-22 04:23:54', '2016-08-22 04:23:54'),
(4, 'Admin', 'admin', '', 1, '2016-08-22 04:23:54', '2016-08-22 04:23:54'),
(5, 'Data entry operator', 'dataentry', '', 1, '2016-08-22 04:23:54', '2016-08-22 04:23:54'),
(6, 'Client', 'client', '', 1, '2016-08-22 04:23:54', '2016-08-22 04:23:54'),
(7, 'Merchant', 'merchant', '', 1, '2016-08-22 04:23:54', '2016-08-22 04:23:54');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE IF NOT EXISTS `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_index` (`role_id`),
  KEY `role_user_user_id_index` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 3, 5, '2016-08-23 02:53:20', '2016-08-23 02:53:20'),
(5, 4, 7, '2016-08-23 03:06:41', '2016-08-23 03:06:41'),
(7, 5, 9, '2016-08-24 00:58:22', '2016-08-24 00:58:22'),
(10, 4, 8, '2016-08-24 02:28:06', '2016-08-24 02:28:06'),
(11, 7, 10, '2016-08-25 03:26:06', '2016-08-25 03:26:06'),
(12, 7, 11, '2016-08-25 22:02:55', '2016-08-25 22:02:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `mob` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `display` int(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `mob`, `details`, `display`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Super admin', 'superadmin@revinr.com', '$2y$10$biL.dwusctWhu1L1YQVpAeYqJ.TZXtdJdpEAaRgKGLeeTvCSnGkc6', 'UttarKhan', '01923524524', 'UttarKhan, Dhaka', 1, NULL, '2016-08-23 02:53:20', '2016-08-23 02:53:20'),
(7, 'Admin', 'admin@gmail.com', '$2y$10$ij50PvyeQ6kQh7.fnshJLOhjBV4ermY9xzyJwz8l2lTPXusv6YDea', 'Dhaka', '90899899', 'Programmer', 1, 'h8vwjk0Tok3hJB1oVQSz4tvyOkvzvPuTQIa3BHK5Fg9NqkXJ53pgdyobWpmN', '2016-08-23 03:06:41', '2016-08-26 03:12:29'),
(8, 'Sakib', 'sakib@gmail.com', '$2y$10$bU95ug7opsZSGewKbhVMouao9CeV8IHa7SldrhjtL0VzRdCpb/c.G', '', '018989', '', 1, NULL, '2016-08-23 05:19:50', '2016-08-24 02:18:25'),
(9, 'Sumon', 'sumon@gmail.com', '$2y$10$Tafg/EdmIggP3JAI0tZa1e/ifape4qq4S640nagE4q5JkDYpWPtQ2', 'CUmilla', '', 'SEO', 1, 'aQeFyoNdTOEsV40uXQU4CVXQ82ag5T9lrTS3O9HbR7SaXAduIBX5R5SyFDRg', '2016-08-24 00:58:22', '2016-08-24 02:56:02'),
(10, 'merchent 01', 'merchant01@gmail.com', '$2y$10$bP4jtaD79HOoKwymPQM7cegXqkw94LmGh/mYSmYO4X8uJaBWGAI7G', '', '', '', 1, NULL, '2016-08-25 03:26:06', '2016-08-25 03:26:06'),
(11, 'marchant 032', 'marchant02@gmial.com', '$2y$10$3v13b4IumJBdcFujV44hBe.KjQPZ5gdRX1wvu5g9jouCOzEnyYhP.', '', '', '', 1, NULL, '2016-08-25 22:02:55', '2016-08-25 22:02:55');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
