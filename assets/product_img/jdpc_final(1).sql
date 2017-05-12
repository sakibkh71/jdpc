-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 22, 2016 at 12:47 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jdpc_final`
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
(5, 10, 1, '2016-10-03', '2016-10-04', '', 'test', 1);

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
  `bar_code` varchar(100) NOT NULL,
  `img1` varchar(50) NOT NULL,
  `img2` varchar(50) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `specification` varchar(250) NOT NULL,
  `over_view` varchar(500) NOT NULL,
  `quantity` int(2) NOT NULL,
  `features` varchar(500) NOT NULL,
  `stall_location` varchar(1000) NOT NULL,
  `weight` varchar(15) NOT NULL,
  `price` float NOT NULL,
  `discount_id` int(11) NOT NULL,
  `display` int(1) NOT NULL,
  `post_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=117 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `item_code`, `bar_code`, `img1`, `img2`, `cate_id`, `merchant_id`, `specification`, `over_view`, `quantity`, `features`, `stall_location`, `weight`, `price`, `discount_id`, `display`, `post_by`) VALUES
(8, 'Ladies bag', 'JDPC002', '', 'img1_13_10_16_07_10_03.jpg', '', 1, 17, '', '', 40, '', '', '200 gm', 520, 0, 1, 7),
(9, 'Ladies bag', 'JDPC003', '', 'img1_13_10_16_07_10_31.jpg', '', 1, 17, '', '', 30, '', '', '200 gm', 520, 0, 1, 7),
(10, 'Mobile Carry Bag', 'JDPC004', '', 'img1_13_10_16_07_10_44.jpg', '', 1, 20, '', '', 35, '', '', '125 gm ', 200, 0, 1, 7),
(11, 'Mobile Carry Bag', 'JDPC005', '', 'img1_13_10_16_07_10_24.jpg', '', 1, 19, '', '', 45, '', '', '125 gm ', 200, 0, 1, 7),
(12, 'Mobile Carry Bag', 'JDPC006', '', 'img1_13_10_16_07_10_19.jpg', '', 1, 17, '', '', 25, '', '', '125 gm ', 220, 0, 1, 7),
(13, 'Passport Carry Bag', 'JDPC007', '', 'img1_13_10_16_07_10_16.jpg', '', 1, 19, '', '', 30, '', '', '125 gm ', 220, 0, 1, 7),
(14, 'Ladies bag', 'JDPC008', '', 'img1_13_10_16_07_10_00.jpg', '', 1, 20, '', '', 25, '', '', '250 gm', 600, 0, 1, 7),
(15, 'Ladies bag', 'JDPC009', '', 'img1_13_10_16_07_10_52.jpg', '', 1, 17, '', '', 50, '', '', '200 gm', 500, 0, 1, 7),
(16, 'Ladies bag', 'JDPC010', '', 'img1_13_10_16_07_10_51.jpg', '', 1, 19, '', '', 10, '', '', '200 gm', 500, 0, 1, 7),
(17, 'Ladies bag', 'JDPC0011', '', 'img1_13_10_16_07_10_52.jpg', '', 1, 17, '', '', 50, '', '', '300 gm', 650, 0, 1, 7),
(18, 'Ladies bag', 'JDPC012', '', 'img1_13_10_16_07_10_11.jpg', '', 1, 19, '', '', 30, '', '', '300 gm', 640, 0, 1, 7),
(19, 'Ladies bag', 'JDPC0013', '', 'img1_13_10_16_07_10_12.jpg', '', 1, 20, '', '', 25, '', '', '220 gm', 550, 0, 1, 7),
(20, 'Ladies bag', 'JDPC0014', '', 'img1_11_11_16_09_11_42.jpg', '', 1, 17, '', '', 23, '', '', '220 gm', 500, 0, 0, 7),
(21, 'Executive Bag', 'JDPC0015', '', 'img1_13_10_16_07_10_23.jpg', '', 8, 19, '', '', 150, '', '', '300 gm', 850, 0, 1, 7),
(22, 'Desktop Items', 'JDPC0016', '', 'img1_13_10_16_08_10_28.jpg', '', 8, 17, '', '', 500, '', '', '360 gm', 60, 0, 1, 7),
(23, 'Desktop Items', 'JDPC0017', '', 'img1_13_10_16_08_10_10.jpg', '', 8, 20, '', '', 800, '', '', '300 gm', 60, 0, 1, 7),
(24, 'Lunch Bag', 'JDPC0018', '', 'img1_13_10_16_08_10_52.jpg', '', 8, 17, '', '', 800, '', '', '50 gm', 120, 0, 1, 7),
(25, 'Lunch Bag', 'JDPC0019', '', 'img1_13_10_16_08_10_03.jpg', '', 8, 19, '<p>basic material: FJF Fabric Size: 10X18 Color: Red, Pink</p>', '', 1000, '', '', '60 gm', 115, 0, 1, 7),
(26, 'Back Pack bag', 'JB-150108', '', 'img1_11_11_16_09_11_14.jpg', '', 1, 17, '<p>Color: Black Chamber: Two Chambers (With 15&#39;&#39; Laptop Pocket)</p>', '', 3, '', '', '', 1195, 0, 1, 7),
(27, 'Back Pack Bag', 'JB-150105', '', 'img1_11_11_16_09_11_18.jpg', '', 1, 17, '<p>Color: Black Chamber: Single Chambers (With 8&#39;&#39; Tab Pocket)</p>', '', 3, '', '', '', 595, 0, 0, 7),
(28, 'School Bag', 'BB-00255', '', 'img1_31_10_16_10_10_53.jpg', '', 1, 17, '<p>Color: Multi; Size : T-age Chamber: Single Chamber (With 15&#39;&#39; Laptop Pocket)</p>', '', 2, '', '', '', 645, 0, 0, 7),
(29, 'Laptop Bag', 'BB-00205', '', 'img1_31_10_16_10_10_55.jpg', '', 1, 17, 'Color: Multi\r\nSize: 15'''' Laptop size\r\nDesign: 2ply 6 LBS Jute and Pure Leather Combination', '', 3, '', '', '', 1795, 0, 1, 7),
(30, 'Laptop Bag', 'BB-BJRI-16', '', 'img1_31_10_16_10_10_00.jpg', '', 1, 17, 'Color: Multi Size: 14'''' Laptop size; Design: 2ply 6 LBS Jute and Cotton CanvasCombination', '', 3, '', '', '', 1195, 0, 1, 7),
(31, 'Executive Bag', 'BB-Un-16', '', 'img1_31_10_16_10_10_06.jpg', '', 1, 17, 'Color: Cream; Size: 15'''' Laptop Size; Design: 2ply 6 LBS Jute and Artificial Leather Combination.', '', 3, '', '', '', 1795, 0, 1, 7),
(33, 'Folder File', 'H-BJRI', '', 'img1_31_10_16_11_10_33.jpg', '', 1, 17, 'Color: Natural;\r\nSize: Reular Size;\r\nDesign: Union Jute and Artificial Leather Combination.', '', 3, '', '', '', 545, 0, 1, 7),
(34, 'Folder File', 'N-BJRI', '', 'img1_31_10_16_11_10_56.jpg', '', 1, 17, 'Color: Natural; Size: Reular Size; Design: Union Jute and Artificial Leather Combination.', '', 0, '', '', '4', 495, 0, 1, 7),
(35, 'Travel Bag', 'BB SP-16-2', '', 'img1_31_10_16_11_10_13.jpg', '', 1, 17, '<p>Color: Green &amp; Pink; Size: Regular Size; Design: Union Jute and Cotton Canvas Combination.</p>', '', 4, '', '', '', 495, 0, 0, 7),
(36, 'Travel Bag', 'BB-T-16-L1', '', 'img1_31_10_16_11_10_35.jpg', '', 1, 17, 'Color: Multi;\r\nSize: Large', '', 3, '', '', '', 445, 0, 1, 7),
(37, 'Travel Bag', 'BB-T-16-m1', '', 'img1_31_10_16_11_10_26.jpg', '', 1, 17, 'Color: Multi;\r\nSize: Medium', '', 3, '', '', '', 345, 0, 1, 7),
(38, 'Travel Bag', 'BB-T-16-S1', '', 'img1_31_10_16_11_10_41.jpg', '', 1, 17, '<p>Color: Multi; Size: Small</p>', '', 3, '', '', '', 295, 0, 0, 7),
(39, 'Lunch Carrier Bag', 'BB-LC-16-NL1', '', 'img1_31_10_16_12_10_44.jpg', '', 1, 17, 'Color: Multi;\r\nSize: Regular Size', '', 10, '', '', '', 165, 0, 1, 7),
(40, 'H parse Bag', 'BB_H-6-1', '', 'img1_31_10_16_12_10_10.jpg', '', 1, 17, '', '', 10, '', '', '', 195, 0, 0, 7),
(41, 'Tissue Box', 'BB-TS-1601', '', 'img1_31_10_16_11_10_43.jpg', '', 1, 17, '', '', 6, '', '', '', 445, 0, 1, 7),
(42, 'Mobile Bag', 'BB-T-00247', '', 'img1_31_10_16_11_10_32.jpg', '', 1, 17, '', '', 10, '', '', '', 175, 0, 1, 7),
(43, 'Jute Espadrille Shoe', 'JONAS', '', 'img1_11_11_16_06_11_01.jpg', '', 10, 21, '<ul><li>Diversified Jute Product 80% Jute</li><li>Color: LEO</li></ul>', '', 7, '', '', '', 600, 0, 1, 7),
(44, 'Jute Espadrille Shoe', 'JONAS', '', 'img1_11_11_16_06_11_55.jpg', '', 10, 21, 'Diversified Jute Product\r\n80% Jute\r\nColor: Black', '', 3, '', '', '', 600, 0, 1, 7),
(45, 'Jute Espadrille Shoe', 'JASPE', '', 'img1_11_11_16_06_11_59.jpg', '', 10, 21, 'Diversified Jute Product \r\n80% Jute \r\nColor: Black', '', 7, '', '', '', 600, 0, 1, 7),
(46, 'Jute Espadrille Shoe', 'JASPE', '', 'img1_11_11_16_06_11_51.jpg', '', 10, 21, 'Diversified Jute Product\r\n80% Jute\r\nColor: Red', '', 3, '', '', '', 600, 0, 1, 7),
(47, 'Jute Espadrille Shoe', 'JANIK', '', 'img1_11_11_16_06_11_32.jpg', '', 10, 21, 'Diversified Jute Product\r\n 80% Jute \r\nColor: COR', '', 3, '', '', '', 500, 0, 1, 7),
(48, 'Jute Espadrille Shoe', 'JANIK', '', 'img1_11_11_16_06_11_39.jpg', '', 10, 21, 'Diversified Jute Product\r\n80% Jute\r\nColor: TUR', '', 10, '', '', '', 500, 0, 1, 7),
(49, 'Jute Espadrille Shoe', 'JANIK', '', 'img1_11_11_16_06_11_55.jpg', '', 10, 21, '<ul><li>Diversified Jute Product 80% Jute</li><li>Color: LEO</li></ul>', '', 4, '', '', '', 500, 0, 1, 7),
(50, 'Jute Bag', 'IZ-1927', '', 'img1_11_11_16_09_11_25.jpg', '', 1, 21, 'Diversified Jute Product \r\n80% Jute \r\nColor: Natural', '', 10, '', '', '', 500, 0, 1, 7),
(51, 'Jute Bag', 'IZ-1926', '', 'img1_11_11_16_09_11_27.jpg', '', 1, 21, '<ul><li>Diversified Jute Product</li><li>80% Jute</li><li>Color: R Blue</li></ul>', '', 4, '', '', '', 1200, 0, 1, 7),
(52, 'Jute Bag', 'IZ-1926', '', 'img1_11_11_16_09_11_03.jpg', '', 1, 21, '<ul><li>Diversified Jute Product</li><li>80% Jute</li><li>Color: P. Green</li></ul>', '', 3, '', '', '', 1200, 0, 1, 7),
(53, 'Jute Bag', 'IZ-1926', '', 'img1_11_11_16_09_11_13.jpg', '', 1, 21, '<ul><li>Diversified Jute Product</li><li>80% Jute</li><li>Color: Bleashed</li></ul>', '', 3, '', '', '', 1200, 0, 1, 7),
(54, 'Jute Bag', 'IZ-1919', '', 'img1_11_11_16_09_11_41.jpg', '', 1, 21, '<ul><li>Diversified Jute Product</li><li>80% Jute</li><li>Color: C Brown</li></ul>', '', 4, '', '', '', 600, 0, 1, 7),
(55, 'Jute Bag', 'IZ-1919', '', 'img1_11_11_16_09_11_58.jpg', '', 1, 21, '<ul><li>Diversified Jute Product</li><li>80% Jute</li><li>Color: Navy</li></ul>', '', 3, '', '', '', 600, 0, 1, 7),
(56, 'Jute Bag', 'IZ-1919', '', 'img1_11_11_16_09_11_13.jpg', '', 1, 21, '<ul><li>Diversified Jute Product</li><li>80% Jute</li><li>Color: Khaki</li></ul>', '', 3, '', '', '', 600, 0, 1, 7),
(57, 'Jute Bag', 'IZ-1930', '', 'img1_11_11_16_09_11_31.jpg', '', 1, 21, '<ul><li>Diversified Jute Product</li><li>80% Jute</li><li>Color: R Blue</li></ul>', '', 5, '', '', '', 1800, 0, 1, 7),
(58, 'Jute Bag', 'IZ-1930', '', 'img1_11_11_16_09_11_05.jpg', '', 1, 21, '<ul><li>Diversified Jute Product</li><li>80% Jute</li><li>Color: Red/Brown</li></ul>', '', 5, '', '', '', 1800, 0, 1, 7),
(59, 'Jute Cushion Cover', 'CS198', '', 'img1_11_11_16_09_11_02.jpg', '', 9, 21, '<ul><li>Diversified Jute Product</li><li>80% Jute</li><li>Color: C. Brown</li></ul>', '', 10, '', '', '', 260, 0, 1, 7),
(60, 'Jute Cushion Cover', 'CS198', '', 'img1_11_11_16_09_11_57.jpg', '', 9, 21, '<ul><li>Diversified Jute Product</li><li>80% Jute</li><li>Color: Natural</li></ul>', '', 10, '', '', '', 260, 0, 1, 7),
(61, 'Jute Cushion Cover', 'CS198', '', 'img1_11_11_16_09_11_52.jpg', '', 9, 21, '<ul><li>Diversified Jute Product</li><li>80% Jute</li><li>Color: R. Blue</li></ul>', '', 10, '', '', '', 260, 0, 1, 7),
(62, 'Jute Cushion Cover', 'CS198', '', 'img1_11_11_16_09_11_30.jpg', '', 9, 21, '<ul><li>Diversified Jute Product</li><li>80% Jute</li><li>Color: Ash</li></ul>', '', 10, '', '', '', 260, 0, 1, 7),
(63, 'Jute Cushion Cover', 'CS198', '', 'img1_11_11_16_10_11_31.jpg', '', 9, 21, '<ul><li>Diversified Jute Product</li><li>80% Jute</li><li>Color: Red</li></ul>', '', 10, '', '', '', 260, 0, 1, 7),
(64, 'Raw Jute Basket', '', '', 'img1_11_11_16_11_11_42.jpg', '', 7, 22, '<ul><li>Size: 17&#39;&#39; x 11&#39;&#39; (0.96 sqm)</li><li>Big size</li></ul>', '', 2, '', '', '', 800, 0, 1, 7),
(65, 'Raw Jute Basket', '', '', 'img1_11_11_16_11_11_26.jpg', '', 11, 22, '<ul><li>Size: 13&#39;&#39; x 9&#39;&#39; (0.60 sqm)</li><li>Medium size</li></ul>', '', 2, '', '', '', 600, 0, 1, 7),
(66, 'Raw Jute Basket', '', '', 'img1_11_11_16_11_11_46.jpg', '', 7, 22, '<ul><li>Size: 9&#39;&#39; x 7&#39;&#39; (0.32 sqm)</li><li>Small size</li></ul>', '', 2, '', '', '', 400, 0, 1, 7),
(67, '4 Pix Jute Mat Recto', '', '', 'img1_11_11_16_11_11_48.jpg', '', 11, 22, '<ul><li>Size: 20&#39;&#39; x 30&#39; (3.90 sqm)</li><li>Color: Mix</li></ul>', '', 10, '', '', '', 350, 0, 1, 7),
(68, '4 Pix Jute Mat Recto', '', '', 'img1_11_11_16_11_11_31.jpg', '', 11, 22, '<ul><li>Size: 20&#39;&#39; x 30&#39; (3.90 sqm)</li><li>Color: Mix</li></ul>', '', 10, '', '', '', 350, 0, 1, 7),
(69, '4 Pix Jute Mat Recto', '', '', 'img1_11_11_16_11_11_25.jpg', '', 11, 22, '<ul><li>Size: 20&#39;&#39; x 30&#39; (3.90 sqm)</li><li>Color: Mix</li></ul>', '', 10, '', '', '', 350, 0, 1, 7),
(70, '4 Pix Jute Mat Recto', '', '', 'img1_11_11_16_11_11_16.jpg', '', 11, 22, '<ul><li>Size: 20&#39;&#39; x 30&#39; (3.90 sqm)</li><li>Color: Mix</li></ul>', '', 350, '', '', '', 350, 0, 1, 7),
(71, '4 Pix Jute Mat Recto', '', '', 'img1_11_11_16_11_11_01.jpg', '', 11, 22, '<ul><li>Size: 20&#39;&#39; x 30&#39; (3.90 sqm)</li><li>Color: Mix</li></ul>', '', 10, '', '', '', 350, 0, 1, 7),
(72, '4 Pix Jute Mat Recto', '', '', 'img1_11_11_16_11_11_29.jpg', '', 11, 22, '<ul><li>Size: 20&#39;&#39; x 30&#39; (3.90 sqm)</li><li>Color: Mix</li></ul>', '', 10, '', '', '', 350, 0, 1, 7),
(73, '4 Pix Jute Mat Recto', '', '', 'img1_11_11_16_11_11_21.jpg', '', 11, 22, '<ul><li>Size: 20&#39;&#39; x 30&#39; (3.90 sqm)</li><li>Color: Mix</li></ul>', '', 10, '', '', '', 350, 0, 1, 7),
(74, '4 Pix Jute Mat Recto', '', '', 'img1_11_11_16_11_11_03.jpg', '', 11, 22, '<ul><li>Size: 20&#39;&#39; x 30&#39; (3.90 sqm)</li><li>Color: Mix</li></ul>', '', 10, '', '', '', 350, 0, 1, 7),
(75, 'Braided Jute Mat', '', '', 'img1_11_11_16_11_11_26.jpg', '', 11, 22, '<ul><li>Size: 20&#39;&#39; x 30&#39; (round)</li><li>Color: Mix</li></ul>', '', 10, '', '', '', 400, 0, 1, 7),
(76, 'Braided Jute Mat', '', '', 'img1_11_11_16_11_11_05.jpg', '', 11, 22, '<ul><li>Size: 20&#39;&#39; x 30&#39; (round)</li><li>Color: Mix</li></ul>', '', 10, '', '', '', 400, 0, 1, 7),
(77, 'Braided Jute Mat', '', '', 'img1_11_11_16_11_11_00.jpg', '', 11, 22, '<ul><li>Size: 20&#39;&#39; x 30&#39; (round)</li><li>Color: Mix</li></ul>', '', 10, '', '', '', 400, 0, 1, 7),
(78, 'Braided Jute Mat', '', '', 'img1_11_11_16_11_11_40.jpg', '', 11, 22, '<ul><li>Size: 20&#39;&#39; x 30&#39; (round)</li><li>Color: Mix</li></ul>', '', 10, '', '', '', 400, 0, 1, 7),
(79, 'Braided Jute Mat', '', '', 'img1_11_11_16_11_11_15.jpg', '', 11, 22, '<ul><li>Size: 20&#39;&#39; x 30&#39; (round)</li><li>Color: Mix</li></ul>', '', 10, '', '', '', 400, 0, 1, 7),
(80, 'Braided Jute Mat', '', '', 'img1_11_11_16_11_11_33.jpg', '', 11, 22, '<ul><li>Size: 20&#39;&#39; x 30&#39; (round)</li><li>Color: Mix</li></ul>', '', 10, '', '', '', 400, 0, 1, 7),
(81, 'Braided Jute Mat', '', '', 'img1_11_11_16_11_11_35.jpg', '', 11, 22, '<ul><li>Size: 20&#39;&#39; x 30&#39; (round)</li><li>Color: Mix</li></ul>', '', 10, '', '', '', 400, 0, 1, 7),
(82, 'Braided Jute Mat', '', '', 'img1_11_11_16_11_11_13.jpg', '', 11, 22, '<ul><li>Size: 20&#39;&#39; x 30&#39; (round)</li><li>Color: Mix</li></ul>', '', 10, '', '', '', 400, 0, 1, 7),
(83, 'Braided Jute Mat', '', '', 'img1_11_11_16_11_11_13.jpg', '', 11, 22, '<ul><li>Size: 20&#39;&#39; x 30&#39; (round)</li><li>Color: Mix</li></ul>', '', 10, '', '', '', 400, 0, 1, 7),
(84, 'Braided Jute Mat', '', '', 'img1_11_11_16_11_11_54.jpg', '', 11, 22, '<ul><li>Size: 20&#39;&#39; x 30&#39; (round)</li><li>Color: Mix</li></ul>', '', 10, '', '', '', 400, 0, 1, 7),
(85, 'Braided Jute Mat (Flower Rugs) Oval', '', '', 'img1_11_11_16_11_11_11.jpg', '', 11, 22, '<ul><li>Size: 4&#39; x 4&#39; (1.49&nbsp; sq.m)</li><li>Color: Mix</li></ul>', '', 1, '', '', '', 1500, 0, 1, 7),
(86, 'Braided Jute Mat (Round) Oval', '', '', 'img1_11_11_16_11_11_59.jpg', '', 11, 22, '<ul><li>Size: 4&#39; x 4&#39; (1.49&nbsp; sq.m)</li><li>Color: Mix</li></ul>', '', 1, '', '', '', 2050, 0, 1, 7),
(87, 'Braided Jute Mat (Random)', '', '', 'img1_11_11_16_11_11_25.jpg', '', 11, 22, '<ul><li>Size: 4&#39; x 6&#39; (2.23 sqm)</li><li>Big size</li></ul>', '', 1, '', '', '', 2050, 0, 1, 7),
(88, 'Braided Jute Mat (Random)', '', '', 'img1_11_11_16_11_11_36.jpg', '', 11, 22, '<ul><li>Size: 3&#39; x 5&#39; (1.40 sqm)</li><li>Big size</li></ul>', '', 1, '', '', '', 1400, 0, 1, 7),
(89, '4 Pix Jute Mat (Solid Color)', '', '', 'img1_11_11_16_11_11_10.jpg', '', 11, 22, '<ul><li>Size: 3&#39; x 5&#39; (5.60 sqm)</li><li>Big size</li></ul>', '', 1, '', '', '', 1100, 0, 1, 7),
(90, '4 Pix Jute Mat (Solid Color)', '', '', 'img1_11_11_16_11_11_16.jpg', '', 11, 22, '<ul><li>Size: 3&#39; x 5&#39;&#39; (5.60 sqm)</li></ul>', '', 1, '', '', '', 1100, 0, 1, 7),
(91, '4 Pix Jute Mat (Solid Color)', '', '', 'img1_11_11_16_11_11_25.jpg', '', 11, 22, '<ul><li>Size: 3&#39; x 5&#39;&#39; (5.60 sqm)</li></ul>', '', 1, '', '', '', 1100, 0, 1, 7),
(92, '4 Pix Jute Mat (Solid Color)', '', '', 'img1_11_11_16_11_11_51.jpg', '', 11, 22, '<ul><li>Size: 3&#39; x 5&#39;&#39; (5.60 sqm)</li></ul>', '', 1, '', '', '', 1100, 0, 1, 7),
(93, 'Braided Jute Mat (Conti:) Oval', '', '', 'img1_11_11_16_11_11_02.jpg', '', 11, 22, '<ul><li>Size: 5&#39; x 8&#39;&#39;</li><li>(3.72 sqm)</li></ul>', '', 1, '', '', '', 3720, 0, 1, 7),
(94, 'Braided Jute Mat (Flower Rugs)', '', '', 'img1_11_11_16_11_11_06.jpg', '', 11, 22, '<ul><li>Size: 3&#39; x 3&#39;&#39; (0.84 sqm)</li></ul>', '', 1, '', '', '', 850, 0, 1, 7),
(95, 'Raw Jute Rect.', '', '', 'img1_11_11_16_11_11_56.jpg', '', 11, 22, '<ul><li>Size: 5&#39; x 8&#39;&#39; (3.72 sqm)</li></ul>', '', 1, '', '', '', 3500, 0, 1, 7),
(96, '4 Pix Jute Mat (Color Zone)', '', '', 'img1_11_11_16_11_11_02.jpg', '', 11, 22, '<ul><li>Size: 3&#39; x 5&#39;&#39; (2.80 sqm)</li></ul>', '', 1, '', '', '', 1200, 0, 1, 7),
(97, '4 Pix Jute Mat (Color Zone)', '', '', 'img1_11_11_16_11_11_44.jpg', '', 11, 22, '<ul><li>Size: 3&#39; x 5&#39;&#39; (2.80 sqm)</li></ul>', '', 1, '', '', '', 1200, 0, 1, 7),
(98, 'Jute Table Mat (Honey Comb)', '', '', 'img1_11_11_16_12_11_53.jpg', '', 11, 23, '', '', 1, '', '', '', 160, 0, 1, 7),
(99, 'Jute Table Mat (Honey Comb)', '', '', 'img1_11_11_16_12_11_45.jpg', '', 11, 23, '', '', 1, '', '', '', 160, 0, 1, 7),
(100, 'Jute Table Mat (Honey Comb)', '', '', 'img1_11_11_16_12_11_13.jpg', '', 11, 23, '', '', 1, '', '', '', 160, 0, 1, 7),
(101, 'Jute Table Mat (Honey Comb)', '', '', 'img1_11_11_16_12_11_42.jpg', '', 11, 23, '', '', 1, '', '', '', 160, 0, 1, 7),
(102, 'Jute Table Mat (Honey Comb)', '', '', 'img1_11_11_16_12_11_10.jpg', '', 9, 23, '', '', 1, '', '', '', 160, 0, 1, 7),
(103, 'Jute Table Mat (Honey Comb)', '', '', 'img1_11_11_16_12_11_41.jpg', '', 9, 23, '', '', 1, '', '', '', 160, 0, 1, 7),
(104, 'Jute Table Mat (Honey Comb)', '', '', 'img1_11_11_16_12_11_06.jpg', '', 9, 23, '', '', 1, '', '', '', 160, 0, 1, 7),
(106, 'Jute Table Mat', '', '', 'img1_11_11_16_12_11_08.jpg', '', 9, 23, '', '', 1, '', '', '', 550, 0, 1, 7),
(107, 'Jute Table Mat', '', '', 'img1_11_11_16_12_11_49.jpg', '', 9, 23, '', '', 1, '', '', '', 550, 0, 1, 7),
(111, 'Jute Table Mat', '', '', 'img1_11_11_16_12_11_52.jpg', '', 9, 23, '', '', 1, '', '', '', 550, 0, 1, 7),
(112, 'Jute Table Mat', '', '', 'img1_11_11_16_12_11_12.jpg', '', 9, 23, '', '', 1, '', '', '', 550, 0, 1, 7),
(113, 'Jute Table Mat', '', '', 'img1_11_11_16_12_11_37.jpg', '', 9, 23, '', '', 1, '', '', '', 550, 0, 1, 7),
(115, 'Jute (Look Payel)', '', '', 'img1_21_11_16_09_11_16.png', '', 6, 20, '', '', 13, '', '', '', 130, 0, 1, 7),
(116, 'demo', '', '', 'img1_22_11_16_05_55_55.jpeg', 'No img', 4, 19, '<ul><li>sdfsdf</li></ul>', '', 34, '', '', '', 0, 0, 1, 7);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `name`, `details`, `display`) VALUES
(1, 'Bags', 'All types of jute bag', 1),
(4, 'Decoration item', 'test', 1),
(6, 'Fashion and Textile', '', 1),
(7, 'Busket', 'test', 1),
(8, 'Office Item', '', 1),
(9, 'Home Textile', '', 1),
(10, 'Various Shoes', '', 1),
(11, 'Craft / Floor Mat', '', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=56 ;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 3, 5, '2016-08-23 02:53:20', '2016-08-23 02:53:20'),
(5, 4, 7, '2016-08-23 03:06:41', '2016-08-23 03:06:41'),
(24, 5, 8, '2016-09-30 16:43:29', '2016-09-30 16:43:29'),
(41, 7, 19, '2016-10-13 13:47:38', '2016-10-13 13:47:38'),
(45, 7, 20, '2016-10-13 14:04:56', '2016-10-13 14:04:56'),
(49, 7, 17, '2016-10-13 14:07:20', '2016-10-13 14:07:20'),
(50, 5, 9, '2016-10-31 13:53:45', '2016-10-31 13:53:45'),
(52, 7, 21, '2016-11-11 12:03:10', '2016-11-11 12:03:10'),
(53, 7, 22, '2016-11-11 16:57:12', '2016-11-11 16:57:12'),
(55, 7, 23, '2016-11-11 18:01:17', '2016-11-11 18:01:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `img1`, `company_name`, `website`, `email`, `password`, `address`, `mob`, `details`, `display`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Super admin', '', '', '', 'superadmin@revinr.com', '$2y$10$biL.dwusctWhu1L1YQVpAeYqJ.TZXtdJdpEAaRgKGLeeTvCSnGkc6', 'UttarKhan', '01923524524', 'UttarKhan, Dhaka', 1, 'Xiia5NS27qdCSlvBvHxFzfelihDBQSTtyUiN5Wl24mGyIn2vOzE8uRKCX0vq', '2016-08-23 02:53:20', '2016-10-25 09:43:51'),
(7, 'Admin', '', '', '', 'admin@gmail.com', '$2y$10$ij50PvyeQ6kQh7.fnshJLOhjBV4ermY9xzyJwz8l2lTPXusv6YDea', 'Dhaka', '90899899', 'Programmer', 1, 'lVrM1E3fUZe36uYKfqZdmoVNzu5Zrt6QghIZf2e7RYN6owYr2LdSW7RwrUCb', '2016-08-23 03:06:41', '2016-11-21 22:30:18'),
(8, 'Sakib', '', '', '', 'sakib@gmail.com', '$2y$10$bU95ug7opsZSGewKbhVMouao9CeV8IHa7SldrhjtL0VzRdCpb/c.G', 'Dhaka', '01717172271', 'Lorem ipsum', 1, 'jQDCakJUl14J3UD8O16Wlt2jwBovdCwFN2mmP4q0GjyxMJWqaBXARixV4ttn', '2016-08-23 05:19:50', '2016-10-25 09:41:45'),
(9, 'Shumon', '', '', '', 'shumon.shahadat@revinr.com', '$2y$10$fOWM7uTk8jLAvsrgPL6vR.WCh1W7B5MVAT9mHI.ooVOm.Nz4ertvC', 'Comilla', '01715864162', 'SEO', 1, 'AwfIwaZ7aCmYdRhoBV0YekGRq0AuH7PrcwGNbs3hvSnwWc6fUzWmGddYB2dz', '2016-08-24 00:58:22', '2016-11-14 02:42:41'),
(17, 'Bag Bazar', 'img1_13_10_16_08_10_43.png', '', 'http://www.bagbazaarbd.com', 'mokter.aiman@gmail.com', '$2y$10$omjO6T2cK0TwNgHzRplFfeRvR9zJ4RvQFqMN4yqlXtTAOo/cKF5EO', 'House: 90, Kadamtola Road, East Basabo', '01712538606', 'N/A', 1, NULL, '2016-10-13 11:50:46', '2016-10-13 14:07:19'),
(19, 'Peerless Enterprise', 'img1_13_10_16_08_10_21.png', '', 'http://peerlessbd.com/en/', 'peerless_06@yahoo.com', '$2y$10$nrVTp/Zdgg0wtHIOd/Q1z.pcUXKJI1W0XENvJfLJO64uGxt198JpC', 'Ka 20/2, Olipara, Joar Shahara, Badda, Dhaka 1229, Bangladesh.', '+880-1617524521', 'N/A', 1, NULL, '2016-10-13 13:34:44', '2016-10-13 13:47:38'),
(20, 'Jute Crafts', 'img1_13_10_16_08_10_04.jpg', '', 'http://jutecrafts.com/', 'afzal.craft@gmail.com', '$2y$10$nGeG563rLppfs1u.8nUNI..uzWGS2RAwxWulm.BaRHDzJjCpsjPEa', 'House No.: 90\r\nKadamtola Road (Bridge)\r\nEast Basabo. \r\nDhaka-1214', '01727100100', 'N/A', 1, NULL, '2016-10-13 13:42:10', '2016-10-13 14:04:56'),
(21, 'Sonali Aansh Industries Limited', 'img1_11_11_16_06_11_09.png', '', '', 'info@sonaliaansh.com', '$2y$10$2oWw/vH82buNr/o3I.1uW.Z9eSLmcDoTtI0dY5dF2Ncm7GWWBOFCW', 'Lal Bhaban (1st floor), 18, Rajuk Avenue, GPO Box-515, Dhaka-1000', '9556251', '', 1, NULL, '2016-11-11 12:01:16', '2016-11-11 12:03:10'),
(22, 'Bengal Braided Rugs Limited', '', '', '', 'BengalBraided@gmail.com', '$2y$10$62yhlbM9Vxm0qz.F4PyRw.OPtAqoWPk7eAyjPTkfiiUue2xla8jwW', 'BSEC Bhaban (1st floor), 102 Kazi Nazrul Islam Avenue, Kawran Bazar, Dhaka - 1215', '', '', 1, NULL, '2016-11-11 16:57:12', '2016-11-11 16:57:12'),
(23, 'Charushy', '', '', '', 'Charushi@gmail.com', '$2y$10$cu3fcRvVgqFjmsVfxKdrzOi0a0olT/yOoMAKxMVAwDdchb4ru0ZgW', 'Charushi, Rangpur', '', '', 1, NULL, '2016-11-11 17:57:15', '2016-11-11 18:01:17');

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
