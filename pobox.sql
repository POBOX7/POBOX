-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 22, 2020 at 10:03 AM
-- Server version: 5.7.31-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pobox`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `heading_image` varchar(500) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(500) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `heading_image`, `title`, `content`, `image`, `is_deleted`, `status`, `created_at`, `updated_at`) VALUES
(1, '1597823392_1.jpg', 'Who we are', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.<br />\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.<br />\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.<br />\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>', '1594229831_2.jpeg', 0, 1, '2020-06-20 07:00:32', '2020-09-11 10:04:37');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `image` varchar(225) NOT NULL,
  `page_id` int(11) NOT NULL DEFAULT '1' COMMENT '1 for home page 2 for new arrival 3 for trending 4 for kurties 5 for kurta set 6 for dress  7 myaccount',
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `page_id`, `url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1593273665.png', 1, 'https://raisinglobal.com/collections/kurta-set', '2020-05-31 04:29:58', '2020-06-27 16:01:05', NULL),
(13, '1600440895.png', 2, NULL, '2020-06-09 10:33:22', '2020-09-18 14:54:55', NULL),
(24, '1593273637.png', 1, NULL, '2020-06-25 10:09:29', '2020-06-27 16:00:37', NULL),
(26, '1600440956.png', 3, NULL, '2020-06-09 10:33:22', '2020-09-18 14:55:56', NULL),
(27, '1600440858.png', 4, NULL, '2020-06-09 10:33:22', '2020-09-18 14:54:18', NULL),
(28, '1600440809.png', 5, NULL, '2020-06-09 10:33:22', '2020-09-18 14:53:29', NULL),
(30, '1593273595.png', 7, NULL, '2020-06-09 10:33:22', '2020-06-17 16:18:30', NULL),
(31, '1593273595.png', 8, NULL, '2020-06-09 10:33:22', '2020-06-17 16:18:30', NULL),
(34, '1599715569.jpg', 1, 'http://3.7.41.47/pobox_new/pobox/public/new-arrival', '2020-09-10 05:26:12', '2020-09-10 10:31:55', NULL),
(37, '1599715629.jpg', 1, 'http://3.7.41.47/pobox_new/pobox/public/trending', '2020-09-10 05:27:11', '2020-09-10 10:33:06', NULL),
(38, '1599734115.jpg', 1, 'http://3.7.41.47/pobox_new/pobox/public/contact-us', '2020-09-10 10:35:22', '2020-09-10 10:35:22', NULL),
(39, '1600440756.png', 6, NULL, '2020-09-10 10:38:57', '2020-09-18 14:52:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `blog_image` varchar(500) NOT NULL,
  `blog_date` timestamp NULL DEFAULT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_description` longtext NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `post_category` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blog_image`, `blog_date`, `blog_title`, `blog_description`, `category_id`, `post_category`, `author`, `slug`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'blog1.jpg', '2020-05-15 00:00:00', 'A look at some of the post-lockdown measures that can be taken by the Fashion Retail Industry.', '<p>With the corona pandemic looming all over the world resulting in a complete lockdown in several countries, industries in all sectors everywhere have taken quite a hit especially the F&amp;B sector and the retail industry. With malls and retail outlets being shut a drop-down in sales is inevitable moreover with the factories also being on a standstill one can witness disruption in the supply chain.</p>\r\n\r\n<p>The impact of the lockdown is one of the biggest crises that the apparel industry has seen in a long time. Amid these inescapable crises of declining demands and inventory build-ups, online platforms are a way to keep sales afloat. But this too has its own set of drawbacks, delayed deliveries being one of the biggest ones. The scenario right now may look bleak however we will eventually see a gradual pick-up in sales once the lockdown is over.</p>\r\n\r\n<p>While the conditions seem to be quite unpredictable at this point of time, but once the lockdown is over, we will surely witness a surge in offers ranging from major discounts to cashbacks and promotional offers to entice people and make up for the lost sales. The lockdown has led to an increase in the screen time of users where you can find people thoroughly active across the various social media platforms.</p>\r\n\r\n<p>Branding will a major role in the scenario since all the brands will be vying for customer attention, what is important here is to stand out and provide the customers with the most engaging content that is relevant to the current atmosphere. The brands will then have to swiftly recover from this state and transition proactively into building content that is relevant and keeps the user interested even after lockdown is over. It may require some time for people to bounce back to their pre-pandemic sales behaviour in such a scenario, omni-channel marketing is a great mechanism to leverage on for pushing sales.</p>\r\n\r\n<p>Since the customers today are omnichannel, it is imperative to adopt this means to serve customers efficiently and effectively. The post lockdown period will witness aggressive marketing strategies from brands to win the goodwill of customers and recover the loses.</p>', 3, 'ORGANIC', 'Rakesh', 'tt', 1, 0, '2020-05-16 11:32:55', '2020-08-19 05:18:21'),
(2, 'blog2.jpg', '2020-05-15 00:00:00', 'Why brands should follow their niche and cater the market accordingly?', '<p>&ldquo;A niche market is a small part of a larger market that has its own specific needs, which are different from the larger market in some way.&rdquo; Defining who your target market is one of the foremost and the most fundamental step of a business.&nbsp;</p>\r\n\r\n<p>The old adage &ldquo;Jack of all trades, masters of none&rdquo; will help you understand the concept of niche marketing better. A business cannot serve everyone and all their needs otherwise hence one needs to be specific when defining your audience. A niche is a specialised portion of a broader market that a brand should target and optimise in order to achieve success in their particular field of business.</p>', 1, 'ORGANIC', 'Bhargav', 'aaa', 1, 0, '2020-05-16 11:33:14', '2020-08-19 05:20:56'),
(4, '159781544413.jpg', '2020-05-15 00:00:00', 'Ashwagandha: The #1 Herb in the World for Anxiety?', '<p>Did you know that red-staining foods are excellent lymph-movers? In fact, many plants that were historically used as dyes...</p>', 1, 'Kurta Sets', 'Yatin', 'aa', 1, 0, '2020-05-16 11:33:14', '2020-08-19 05:37:24'),
(12, '159973997511.jpg', '2020-09-10 00:00:00', 'Internet Purchase', '<p>This is a test blog to see how it works.&nbsp;</p>', NULL, 'new blog category one', 'Vinit', NULL, 1, 0, '2020-09-10 12:12:55', '2020-09-10 12:12:55');

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`id`, `category_name`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(2, 'new blog category one', 1, 0, '2020-08-19 13:18:30', '2020-08-19 13:18:30'),
(3, 'new blog category two', 1, 0, '2020-08-19 13:43:06', '2020-08-19 13:43:24');

-- --------------------------------------------------------

--
-- Table structure for table `blog_leave_reply`
--

CREATE TABLE `blog_leave_reply` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` longtext NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_leave_reply`
--

INSERT INTO `blog_leave_reply` (`id`, `user_id`, `blog_id`, `name`, `comment`, `email`, `created_at`, `updated_at`, `is_deleted`) VALUES
(2, 99, 1, 'Tarun', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab officia culpa corporis, quidem placeat minima unde vel veniam laboriosam et animi, inventore delectus, officiis doloribus ex amet illum ea suscipit!', 'tarun@gmail.com', '2020-08-15 03:40:47', '2020-08-15 03:40:47', 0),
(5, 100, 1, 'Urvesh', 'Test comment blog', 'urvesh@gmail.com', '2020-08-15 12:02:18', '2020-08-15 12:02:18', 0),
(6, 81, 2, 'Tia', 'test', 'test@rs.com', '2020-08-17 06:56:15', '2020-08-17 06:56:15', 0),
(8, 81, 2, 'Test T', 'test test test test ttest test test test test test test test test test test test test test test\r\ntest', 'test@rs.com', '2020-08-17 06:57:46', '2020-08-17 06:57:46', 0),
(9, 81, 2, 'Maggie maria ', 'Your email address will not be published. Required fields are marked *\r\n\r\nComment', 'hg@ghgh', '2020-08-17 07:01:45', '2020-08-17 07:01:45', 0),
(11, 81, 1, 'Maggie', 'test Since the customers today are omnichannel, it is imperative to adopt this means to serve customers efficiently and effectively. The post lockdown period will witness aggressive marketing strategies from brands to win the goodwill of customers and recover the loses.', 'khyatip.rs@gmail.com', '2020-08-17 07:11:58', '2020-08-17 07:11:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `status`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'brand new', 1, 1, '2020-06-12 06:20:23', '2020-06-11 13:47:43', '2020-06-08 12:26:27'),
(2, 'brand2', 1, 1, '2020-06-12 06:20:23', '2020-06-12 06:09:41', '2020-06-08 12:26:42'),
(3, 'Melange', 1, 0, '2020-06-12 06:20:23', '2020-06-22 11:14:12', '2020-06-08 12:26:42'),
(4, 'Indiya', 1, 0, '2020-06-12 06:20:23', '2020-06-22 11:14:27', '2020-06-08 12:26:42'),
(5, 'Biba', 1, 0, '2020-06-12 06:20:23', '2020-06-17 16:58:32', '2020-06-08 12:26:42'),
(6, 'Puma', 1, 0, '2020-06-12 06:20:23', '2020-06-19 09:44:51', '2020-06-08 12:26:42'),
(7, 'brand7', 1, 1, '2020-06-12 06:20:23', '2020-06-11 13:51:13', '2020-06-08 12:26:42'),
(8, 'brand8', 1, 1, '2020-06-12 06:20:23', '2020-06-17 07:03:25', '2020-06-08 12:26:42'),
(9, 'Zara', 1, 1, '2020-06-12 06:54:23', '2020-06-17 10:09:27', '2020-06-12 06:54:23'),
(10, 'Test1', 1, 1, '2020-06-12 06:56:53', '2020-06-17 07:11:51', '2020-06-12 06:56:53'),
(11, 'Testn', 1, 1, '2020-06-13 07:07:04', '2020-06-13 07:07:58', '2020-06-13 07:07:04'),
(12, 'test', 1, 1, '2020-06-15 07:58:25', '2020-06-17 07:00:46', '2020-06-15 07:58:25'),
(13, 'Levies', 1, 1, '2020-06-17 07:01:08', '2020-06-17 07:01:19', '2020-06-17 07:01:08'),
(14, 'skjhdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddewkaeiwoewhdsnfkcndfoeirheosfnsknfionwownds cidnsdsd', 1, 1, '2020-06-19 07:14:22', '2020-06-19 12:30:12', '2020-06-19 07:14:22'),
(15, 'test hhhhknnknk', 0, 1, '2020-06-22 09:32:21', '2020-09-10 10:29:06', '2020-06-22 09:32:21'),
(16, 'njdsjdbsj ni111', 1, 1, '2020-06-22 09:32:39', '2020-06-22 09:32:44', '2020-06-22 09:32:39'),
(17, 'laxmipati saree', 1, 0, '2020-06-24 07:02:49', '2020-06-24 13:01:33', '2020-06-24 07:02:49'),
(18, 'vedik', 1, 0, '2020-06-24 13:01:46', '2020-06-24 13:01:46', '2020-06-24 13:01:46'),
(19, 'vedik', 1, 1, '2020-07-09 05:41:57', '2020-07-09 05:42:02', '2020-07-09 05:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `cart_total_mrp_price` int(11) NOT NULL DEFAULT '0',
  `cart_total_price` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `size`, `qty`, `cart_total_mrp_price`, `cart_total_price`, `created_at`, `updated_at`) VALUES
(87, '141', 33, '1', 1, 0, 0, '2020-07-19 17:18:20', '2020-07-19 17:18:20'),
(89, '141', 30, '1', 1, 0, 0, '2020-07-19 17:22:01', '2020-07-19 17:22:01'),
(90, '147', 30, '1', 1, 0, 0, '2020-07-20 03:26:06', '2020-07-20 03:26:06'),
(91, '147', 60, '1', 1, 0, 0, '2020-07-20 03:35:08', '2020-07-20 03:35:08'),
(92, '147', 50, '1', 1, 0, 0, '2020-07-20 03:36:02', '2020-07-20 03:36:02'),
(93, '147', 35, '1', 1, 0, 0, '2020-07-20 03:37:38', '2020-07-20 03:37:38'),
(94, '148', 35, '1', 1, 0, 0, '2020-07-20 07:40:00', '2020-07-20 07:40:00'),
(95, '148', 33, '1', 1, 0, 0, '2020-07-20 07:40:00', '2020-07-20 07:40:00'),
(105, '101', 30, '1', 1, 0, 0, '2020-07-20 12:06:52', '2020-07-20 12:06:52'),
(106, '101', 60, '3', 1, 0, 0, '2020-07-20 12:08:55', '2020-07-20 12:08:55'),
(180, '100', 33, '1', 1, 1500, 800, '2020-09-08 12:36:19', '2020-09-08 12:36:24'),
(181, '100', 34, '1', 1, 5000, 3750, '2020-09-08 12:36:19', '2020-09-08 12:36:19'),
(189, '79', 33, '1', 1, 1500, 800, '2020-09-18 14:37:48', '2020-09-18 14:37:48'),
(198, 'VpJWCnGUr7T8qp3NAQiBVyVcv5mbeCMb7KdNXKPd', 43, '3', 1, 1500, 1200, '2020-09-19 06:52:34', '2020-09-19 06:52:34'),
(199, 'ZBtH1ZdyMtRLWG13k6agO6uuP8EdC4k9tixJA2bf', 44, '4', 2, 2000, 1600, '2020-09-19 06:56:21', '2020-09-19 06:56:21'),
(201, 'ZBtH1ZdyMtRLWG13k6agO6uuP8EdC4k9tixJA2bf', 63, '2', 2, 5000, 4500, '2020-09-19 06:56:58', '2020-09-19 06:56:58'),
(202, 'ZBtH1ZdyMtRLWG13k6agO6uuP8EdC4k9tixJA2bf', 52, '1', 1, 2200, 1760, '2020-09-19 06:57:12', '2020-09-19 06:57:12');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `product_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `size_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `image` varchar(225) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `status`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kurties', '1599716577.jpg', 1, 0, '2020-05-30 20:15:11', '2020-09-10 05:42:57', NULL),
(2, 'Kurta Sets', '1594290634.webp', 1, 0, '2020-05-30 20:15:24', '2020-07-09 10:30:34', NULL),
(3, 'Dress', '1599716739.webp', 1, 0, '2020-05-30 20:15:11', '2020-09-10 05:45:39', NULL),
(4, 'c1', 'download.jpg', 1, 1, '2020-06-05 06:27:55', '2020-06-05 06:28:06', NULL),
(5, 'd', 'download.jpg', 1, 1, '2020-06-05 06:31:09', '2020-06-05 06:31:15', NULL),
(6, 'Testing', '100939_2.jpg', 1, 1, '2020-06-06 06:51:07', '2020-06-06 06:51:12', NULL),
(7, 'Test', 'pexels-photo-220453.jpeg', 1, 1, '2020-06-08 05:10:04', '2020-06-08 05:10:04', NULL),
(8, 'Test', 'download (1).jpg', 1, 1, '2020-06-08 06:21:27', '2020-06-08 06:21:52', NULL),
(9, 'test', 'pexels-photo-220453.jpeg', 1, 1, '2020-06-08 11:35:17', '2020-06-08 11:36:01', NULL),
(10, 'TESTINGggg', 'ISSUE_3.png', 1, 1, '2020-06-08 12:07:20', '2020-06-08 12:07:47', NULL),
(11, 'SHIVANI', 'ISSUE_3.png', 1, 1, '2020-06-08 12:57:58', '2020-06-08 12:58:33', NULL),
(12, 'test', 'images.jpg', 1, 1, '2020-06-09 05:39:16', '2020-06-09 05:39:38', NULL),
(13, 'c1', 'download.jpg', 1, 1, '2020-06-09 06:40:29', '2020-06-09 06:40:33', NULL),
(14, 'Kurties', '1593001180.png', 1, 1, '2020-06-12 10:41:13', '2020-06-24 12:19:40', NULL),
(15, 'testing', 'ISSUE_3.png', 1, 1, '2020-06-17 06:58:43', '2020-06-17 07:00:13', NULL),
(16, 'test', 'ISSUE_6.png', 1, 1, '2020-06-17 07:00:27', '2020-06-17 07:00:31', NULL),
(17, 'Test1sadsasadsakjbkjasjlnlkasnklasnkldnaskldnlkasndlknsakdnlasndklasndlkasndlnaslkdnlkasndklasnklnasslkdnaslknaslkndlkasndlksa', 'maxresdefault.jpg', 1, 1, '2020-06-17 07:23:50', '2020-06-17 07:26:11', NULL),
(18, 'sadasdasndlknasndklsandklnasdnlksandklanlsdnlansklnlksanlknandnaslkdnlaknsd', 'maxresdefault.jpg', 1, 1, '2020-06-17 07:26:28', '2020-06-17 07:26:45', NULL),
(19, 'Test1sadsasadsakjbkjasjlnlkasnklasnkldnaskldnlkasndlknsakdnlasndklasndlkasndlnaslkdnlkasndklasnklnasslkdnaslknaslkndlkasndlksa', 'maxresdefault.jpg', 1, 1, '2020-06-17 07:27:05', '2020-06-17 07:27:13', NULL),
(20, 'Test1sadsasadsakjbkjasjlnlkasnklasnkldnaskldnlkasndlknsakdnlasndklasndlkasndlnaslkdnlkasndklasnklnasslkdnaslknaslkndlkasndlksa', 'maxresdefault.jpg', 0, 1, '2020-06-17 07:27:26', '2020-06-17 11:14:14', NULL),
(21, 'Mariadsjdkhskhshffhkdlfhkdlhflkdhflkdshflskflksdfkldkfhdjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjfkkkkkkkllllllljddddddjkhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhshfkldhfdlhgllllllllllllllllllllllllllllllllll', '1592550811.jpg', 1, 1, '2020-06-19 07:13:31', '2020-06-19 09:44:11', NULL),
(22, 'fdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', '1592559123.jpg', 1, 1, '2020-06-19 09:32:03', '2020-06-19 12:20:47', NULL),
(23, 'Maria Character limit', '1592569276.jpg', 1, 1, '2020-06-19 09:40:56', '2020-06-22 11:13:38', NULL),
(24, 'Ready Made', '1592569302.jpg', 1, 1, '2020-06-19 12:21:42', '2020-06-27 16:01:35', NULL),
(25, 'Fabric', '1593273800.jpg', 1, 0, '2020-06-19 12:23:09', '2020-06-27 16:03:20', NULL),
(26, 'vccccccccccccvvvvvxd', '1592818277.jpg', 1, 1, '2020-06-22 09:31:17', '2020-06-22 10:39:57', NULL),
(27, 'New Test', '1593001196.jpg', 1, 1, '2020-06-24 12:19:56', '2020-06-24 12:20:00', NULL),
(28, 'sarees', '1593001794.jpg', 1, 1, '2020-06-24 12:29:54', '2020-06-27 16:01:27', NULL),
(29, 'Designer ware', '1593273825.png', 1, 0, '2020-06-27 16:03:45', '2020-06-27 16:03:45', NULL),
(30, 'Western wear', '1593273874.jpg', 0, 0, '2020-06-27 16:04:34', '2020-07-01 16:21:50', NULL),
(31, 'Tops', '1593414503.jpg', 1, 1, '2020-06-29 07:08:23', '2020-07-01 13:24:02', NULL),
(32, 'Skirt', '1593620608.jpg', 1, 0, '2020-07-01 16:23:29', '2020-07-01 16:23:29', NULL),
(33, 'test', '1594273281.jpg', 1, 1, '2020-07-09 05:41:21', '2020-07-09 05:41:40', NULL),
(34, 'test', '1594273295.jpg', 1, 1, '2020-07-09 05:41:35', '2020-07-09 05:41:43', NULL),
(35, 'dddd', '1599464962.png', 1, 1, '2020-09-07 07:49:22', '2020-09-07 07:49:28', NULL),
(36, 'aaaa', '1599650786.jpg', 1, 1, '2020-09-09 11:26:26', '2020-09-09 11:26:30', NULL),
(37, 'dsdsd', '1599652766.jpg', 1, 1, '2020-09-09 11:59:26', '2020-09-09 11:59:31', NULL),
(38, 'aaa', '1599658204.png', 1, 1, '2020-09-09 13:30:09', '2020-09-09 13:36:50', NULL),
(39, 'ssds', '1599658432.png', 1, 1, '2020-09-09 13:33:57', '2020-09-09 13:36:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `hex_code` varchar(10) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `hex_code`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Black', '#000000', 1, 0, '2020-06-09 09:10:32', '2020-07-01 16:40:10'),
(2, 'Green', '#139a2a', 1, 0, '2020-06-09 09:11:53', '2020-07-01 16:40:09'),
(3, 'Red', '#e60a0a', 1, 0, '2020-06-09 09:41:24', '2020-07-01 16:40:08'),
(4, 'Orange', '#e86721', 1, 0, '2020-06-09 12:51:49', '2020-07-01 16:40:08'),
(5, 'Pink', '#d41c7e', 1, 0, '2020-06-09 12:52:01', '2020-07-08 07:26:37'),
(6, 'White', NULL, 1, 1, '2020-06-09 12:52:20', '2020-06-09 12:52:20'),
(7, 'cream', NULL, 1, 1, '2020-06-09 12:52:28', '2020-06-15 10:03:17'),
(8, 'Blue', NULL, 1, 1, '2020-06-11 13:52:40', '2020-06-11 13:53:00'),
(9, 'brown', '#6f4444', 1, 1, '2020-06-12 06:31:15', '2020-06-17 16:59:23'),
(10, 'Snow white', '#f5f5f5', 1, 0, '2020-06-12 06:37:18', '2020-07-01 16:40:46'),
(11, 'Black1', NULL, 1, 1, '2020-06-12 07:10:27', '2020-06-15 08:06:06'),
(12, 'purple', '#9729c7', 1, 1, '2020-06-15 07:58:48', '2020-06-17 16:59:09'),
(13, 'Baby pink', '#dfb9d9', 1, 1, '2020-06-15 09:07:14', '2020-06-17 16:59:59'),
(14, 'Grey', '#ccc7c7', 1, 1, '2020-06-15 10:32:34', '2020-06-17 13:05:36'),
(15, 'biege', '#ffffff', 1, 1, '2020-06-15 12:19:55', '2020-06-17 12:12:46'),
(16, 'yellow', '#ffff80', 1, 1, '2020-06-15 12:33:30', '2020-06-17 07:29:24'),
(17, 'Sky bluee', '#207c7e', 1, 1, '2020-06-17 07:13:25', '2020-06-17 07:13:39'),
(18, 'Neon', '#d1fa05', 0, 0, '2020-06-17 17:04:03', '2020-07-01 16:40:06'),
(19, 'Mariajwkkkkkkkkkkk', '#000000', 1, 1, '2020-06-24 06:12:53', '2020-06-24 13:04:33'),
(20, 'Maria', '#d39797', 1, 1, '2020-06-24 07:03:11', '2020-06-24 13:04:44'),
(21, 'Light B', '#85e0ff', 1, 0, '2020-07-01 16:25:52', '2020-07-02 06:31:27'),
(22, 'Bluee', '#05407f', 1, 0, '2020-07-08 10:30:50', '2020-07-08 10:30:50');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` bigint(20) NOT NULL,
  `contact_message` longtext NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `phone_number`, `contact_message`, `is_deleted`, `status`, `created_at`, `updated_at`) VALUES
(2, 'test', 'testemail@gmail.com', 9856656344, 'test message', 0, 1, '2020-06-30 14:13:20', '2020-06-30 14:13:20'),
(3, 'Ramesh', 'rakeshsathwara.rc@gmail.com', 9856236589, 'testts', 0, 1, '2020-07-01 10:24:04', '2020-07-01 10:24:04'),
(4, 'Ramesh', 'rakeshsathwara.rc@gmail.com', 9856236589, 'testts', 0, 1, '2020-07-01 10:24:34', '2020-07-01 10:24:34'),
(5, 'Rakesh', 'rakeshsathwara.rc@gmail.com', 9856236589, 'test', 0, 1, '2020-07-01 10:36:14', '2020-07-01 10:36:14'),
(6, 'Rakesh', 'rakeshsathwara.rc@gmail.com', 8956546565, 'tests', 0, 1, '2020-07-01 10:50:21', '2020-07-01 10:50:21'),
(7, 'sdsdsds', 'ss@sdd.sddsds', 2332323232, 'sdsds', 0, 1, '2020-09-09 11:16:32', '2020-09-09 11:16:32'),
(8, 'vinti', 'modyvinit@gmail.com', 9978532586, 'test', 0, 1, '2020-09-10 12:03:29', '2020-09-10 12:03:29'),
(9, 'Tia', 'tia@test.com', 6870987670, 'nothing', 0, 1, '2020-09-11 06:35:53', '2020-09-11 06:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_detail`
--

CREATE TABLE `contact_us_detail` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` bigint(20) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `twitter_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `linkedin_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact_us_detail`
--

INSERT INTO `contact_us_detail` (`id`, `email`, `phone_number`, `address`, `facebook_link`, `twitter_link`, `linkedin_link`, `created_at`, `updated_at`) VALUES
(1, 'info@poboxfashion.com', 9865326598, 'aaaa', 'aaa', 'aaaa', 'aa', '2020-08-20 09:38:33', '2020-09-11 09:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  `country_api_code` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `country_api_code`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'Afghanistan', 'AFG', NULL, '2018-07-19 14:06:58'),
(2, 'AL', 'Albania', 'ALB', NULL, '2018-07-19 14:06:58'),
(3, 'DZ', 'Algeria', 'DZA', NULL, '2018-07-19 14:06:58'),
(4, 'DS', 'American Samoa', 'ASM', NULL, '2018-07-19 14:06:58'),
(5, 'AD', 'Andorra', 'AND', NULL, '2018-07-19 14:06:58'),
(6, 'AO', 'Angola', 'AGO', NULL, '2018-07-19 14:06:58'),
(7, 'AI', 'Anguilla', 'AIA', NULL, '2018-07-19 14:06:58'),
(8, 'AQ', 'Antarctica', 'ATA', NULL, '2018-07-19 14:06:58'),
(9, 'AG', 'Antigua and Barbuda', 'ATG', NULL, '2018-07-19 14:06:58'),
(10, 'AR', 'Argentina', 'ARG', NULL, '2018-07-19 14:06:58'),
(11, 'AM', 'Armenia', 'ARM', NULL, '2018-07-19 14:06:58'),
(12, 'AW', 'Aruba', 'ABW', NULL, '2018-07-19 14:02:03'),
(13, 'AU', 'Australia', 'AUS', NULL, '2018-07-19 14:06:58'),
(14, 'AT', 'Austria', 'AUT', NULL, '2018-07-19 14:06:58'),
(15, 'AZ', 'Azerbaijan', 'AZE', NULL, '2018-07-19 14:06:58'),
(16, 'BS', 'Bahamas', 'BHS', NULL, '2018-07-19 14:06:58'),
(17, 'BH', 'Bahrain', 'BHR', NULL, '2018-07-19 14:06:58'),
(18, 'BD', 'Bangladesh', 'BGD', NULL, '2018-07-19 14:06:58'),
(19, 'BB', 'Barbados', 'BRB', NULL, '2018-07-19 14:06:58'),
(20, 'BY', 'Belarus', 'BLR', NULL, '2018-07-19 14:06:58'),
(21, 'BE', 'Belgium', 'BEL', NULL, '2018-07-19 14:06:58'),
(22, 'BZ', 'Belize', 'BLZ', NULL, '2018-07-19 14:06:58'),
(23, 'BJ', 'Benin', 'BEN', NULL, '2018-07-19 14:06:58'),
(24, 'BM', 'Bermuda', 'BMU', NULL, '2018-07-19 14:06:58'),
(25, 'BT', 'Bhutan', 'BTN', NULL, '2018-07-19 14:06:58'),
(26, 'BO', 'Bolivia', 'BOL', NULL, '2018-07-19 14:06:58'),
(27, 'BA', 'Bosnia and Herzegovina', 'BIH', NULL, '2018-07-19 14:06:58'),
(28, 'BW', 'Botswana', 'BWA', NULL, '2018-07-19 14:06:58'),
(29, 'BV', 'Bouvet Island', 'BVT', NULL, '2018-07-19 14:06:58'),
(30, 'BR', 'Brazil', 'BRA', NULL, '2018-07-19 14:06:58'),
(31, 'IO', 'British Indian Ocean Territory', 'IOT', NULL, '2018-07-19 14:06:58'),
(32, 'BN', 'Brunei Darussalam', NULL, NULL, NULL),
(33, 'BG', 'Bulgaria', 'BGR', NULL, '2018-07-19 14:06:58'),
(34, 'BF', 'Burkina Faso', 'BFA', NULL, '2018-07-19 14:06:58'),
(35, 'BI', 'Burundi', 'BDI', NULL, '2018-07-19 14:06:58'),
(36, 'KH', 'Cambodia', 'KHM', NULL, '2018-07-19 14:06:58'),
(37, 'CM', 'Cameroon', 'CMR', NULL, '2018-07-19 14:06:58'),
(38, 'CA', 'Canada', 'CAN', NULL, '2018-07-19 14:06:58'),
(39, 'CV', 'Cape Verde', 'CPV', NULL, '2018-07-19 14:06:58'),
(40, 'KY', 'Cayman Islands', 'CYM', NULL, '2018-07-19 14:06:58'),
(41, 'CF', 'Central African Republic', 'CAF', NULL, '2018-07-19 14:06:58'),
(42, 'TD', 'Chad', 'TCD', NULL, '2018-07-19 14:06:58'),
(43, 'CL', 'Chile', 'CHL', NULL, '2018-07-19 14:06:58'),
(44, 'CN', 'China', 'CHN', NULL, '2018-07-19 14:06:58'),
(45, 'CX', 'Christmas Island', 'CXR', NULL, '2018-07-19 14:06:58'),
(46, 'CC', 'Cocos (Keeling) Islands', 'CCK', NULL, '2018-07-19 14:06:58'),
(47, 'CO', 'Colombia', 'COL', NULL, '2018-07-19 14:06:58'),
(48, 'KM', 'Comoros', 'COM', NULL, '2018-07-19 14:06:58'),
(49, 'CG', 'Congo', 'COG', NULL, '2018-07-19 14:06:58'),
(50, 'CK', 'Cook Islands', 'COK', NULL, '2018-07-19 14:06:58'),
(51, 'CR', 'Costa Rica', 'CRI', NULL, '2018-07-19 14:06:58'),
(52, 'HR', 'Croatia (Hrvatska)', NULL, NULL, NULL),
(53, 'CU', 'Cuba', 'CUB', NULL, '2018-07-19 14:06:58'),
(54, 'CY', 'Cyprus', 'CYP', NULL, '2018-07-19 14:06:58'),
(55, 'CZ', 'Czech Republic', 'CZE', NULL, '2018-07-19 14:06:58'),
(56, 'DK', 'Denmark', 'DNK', NULL, '2018-07-19 14:06:58'),
(57, 'DJ', 'Djibouti', 'DJI', NULL, '2018-07-19 14:06:58'),
(58, 'DM', 'Dominica', 'DMA', NULL, '2018-07-19 14:06:58'),
(59, 'DO', 'Dominican Republic', 'DOM', NULL, '2018-07-19 14:06:58'),
(60, 'TP', 'East Timor', 'TMP', NULL, '2018-07-19 14:06:58'),
(61, 'EC', 'Ecuador', 'ECU', NULL, '2018-07-19 14:06:58'),
(62, 'EG', 'Egypt', 'EGY', NULL, '2018-07-19 14:06:58'),
(63, 'SV', 'El Salvador', 'SLV', NULL, '2018-07-19 14:06:58'),
(64, 'GQ', 'Equatorial Guinea', 'GNQ', NULL, '2018-07-19 14:06:58'),
(65, 'ER', 'Eritrea', 'ERI', NULL, '2018-07-19 14:06:58'),
(66, 'EE', 'Estonia', 'EST', NULL, '2018-07-19 14:06:58'),
(67, 'ET', 'Ethiopia', 'ETH', NULL, '2018-07-19 14:06:58'),
(68, 'FK', 'Falkland Islands (Malvinas)', NULL, NULL, NULL),
(69, 'FO', 'Faroe Islands', 'FRO', NULL, '2018-07-19 14:06:58'),
(70, 'FJ', 'Fiji', NULL, NULL, NULL),
(71, 'FI', 'Finland', 'FIN', NULL, '2018-07-19 14:06:58'),
(72, 'FR', 'France', 'FRA', NULL, '2018-07-19 14:06:58'),
(73, 'FX', 'France, Metropolitan', NULL, NULL, NULL),
(74, 'GF', 'French Guiana', 'GUF', NULL, '2018-07-19 14:06:58'),
(75, 'PF', 'French Polynesia', 'PYF', NULL, '2018-07-19 14:06:58'),
(76, 'TF', 'French Southern Territories', NULL, NULL, NULL),
(77, 'GA', 'Gabon', 'GAB', NULL, '2018-07-19 14:06:58'),
(78, 'GM', 'Gambia', 'GMB', NULL, '2018-07-19 14:06:58'),
(79, 'GE', 'Georgia', 'GEO', NULL, '2018-07-19 14:06:58'),
(80, 'DE', 'Germany', 'DEU', NULL, '2018-07-19 14:06:58'),
(81, 'GH', 'Ghana', 'GHA', NULL, '2018-07-19 14:06:58'),
(82, 'GI', 'Gibraltar', 'GIB', NULL, '2018-07-19 14:06:58'),
(83, 'GK', 'Guernsey', 'GGY', NULL, '2018-07-19 14:06:58'),
(84, 'GR', 'Greece', 'GRC', NULL, '2018-07-19 14:06:58'),
(85, 'GL', 'Greenland', 'GRL', NULL, '2018-07-19 14:06:58'),
(86, 'GD', 'Grenada', 'GRD', NULL, '2018-07-19 14:06:58'),
(87, 'GP', 'Guadeloupe', 'GLP', NULL, '2018-07-19 14:06:58'),
(88, 'GU', 'Guam', 'GUM', NULL, '2018-07-19 14:06:58'),
(89, 'GT', 'Guatemala', 'GTM', NULL, '2018-07-19 14:06:58'),
(90, 'GN', 'Guinea', 'GIN', NULL, '2018-07-19 14:06:58'),
(91, 'GW', 'Guinea-Bissau', 'GNB', NULL, '2018-07-19 14:06:58'),
(92, 'GY', 'Guyana', 'GUY', NULL, '2018-07-19 14:06:58'),
(93, 'HT', 'Haiti', 'HTI', NULL, '2018-07-19 14:06:58'),
(94, 'HM', 'Heard and Mc Donald Islands', NULL, NULL, NULL),
(95, 'HN', 'Honduras', 'HND', NULL, '2018-07-19 14:06:58'),
(96, 'HK', 'Hong Kong', 'HKG', NULL, '2018-07-19 14:06:58'),
(97, 'HU', 'Hungary', 'HUN', NULL, '2018-07-19 14:06:58'),
(98, 'IS', 'Iceland', 'ISL', NULL, '2018-07-19 14:06:58'),
(99, 'IN', 'India', 'IND', NULL, '2018-07-19 14:06:58'),
(100, 'IM', 'Isle of Man', 'IMN', NULL, '2018-07-19 14:06:58'),
(101, 'ID', 'Indonesia', 'IDN', NULL, '2018-07-19 14:06:58'),
(102, 'IR', 'Iran (Islamic Republic of)', NULL, NULL, NULL),
(103, 'IQ', 'Iraq', 'IRQ', NULL, '2018-07-19 14:06:58'),
(104, 'IE', 'Ireland', 'IRL', NULL, '2018-07-19 14:06:58'),
(105, 'IL', 'Israel', 'ISR', NULL, '2018-07-19 14:06:58'),
(106, 'IT', 'Italy', 'ITA', NULL, '2018-07-19 14:06:58'),
(107, 'CI', 'Ivory Coast', NULL, NULL, NULL),
(108, 'JE', 'Jersey', 'JEY', NULL, '2018-07-19 14:06:58'),
(109, 'JM', 'Jamaica', 'JAM', NULL, '2018-07-19 14:06:58'),
(110, 'JP', 'Japan', 'JPN', NULL, '2018-07-19 14:06:58'),
(111, 'JO', 'Jordan', 'JOR', NULL, '2018-07-19 14:06:58'),
(112, 'KZ', 'Kazakhstan', NULL, NULL, NULL),
(113, 'KE', 'Kenya', 'KEN', NULL, '2018-07-19 14:06:58'),
(114, 'KI', 'Kiribati', 'KIR', NULL, '2018-07-19 14:06:58'),
(115, 'KP', 'Korea, Democratic People\'s Republic of', NULL, NULL, NULL),
(116, 'KR', 'Korea, Republic of', NULL, NULL, NULL),
(117, 'XK', 'Kosovo', NULL, NULL, NULL),
(118, 'KW', 'Kuwait', 'KWT', NULL, '2018-07-19 14:06:58'),
(119, 'KG', 'Kyrgyzstan', 'KGZ', NULL, '2018-07-19 14:06:58'),
(120, 'LA', 'Lao People\'s Democratic Republic', NULL, NULL, NULL),
(121, 'LV', 'Latvia', 'LVA', NULL, '2018-07-19 14:06:58'),
(122, 'LB', 'Lebanon', 'LBN', NULL, '2018-07-19 14:06:58'),
(123, 'LS', 'Lesotho', 'LSO', NULL, '2018-07-19 14:06:58'),
(124, 'LR', 'Liberia', 'LBR', NULL, '2018-07-19 14:06:58'),
(125, 'LY', 'Libyan Arab Jamahiriya', NULL, NULL, NULL),
(126, 'LI', 'Liechtenstein', 'LIE', NULL, '2018-07-19 14:06:58'),
(127, 'LT', 'Lithuania', 'LTU', NULL, '2018-07-19 14:06:58'),
(128, 'LU', 'Luxembourg', 'LUX', NULL, '2018-07-19 14:06:58'),
(129, 'MO', 'Macau', NULL, NULL, NULL),
(130, 'MK', 'Macedonia', 'MKD', NULL, '2018-07-19 14:06:58'),
(131, 'MG', 'Madagascar', 'MDG', NULL, '2018-07-19 14:06:58'),
(132, 'MW', 'Malawi', 'MWI', NULL, '2018-07-19 14:06:58'),
(133, 'MY', 'Malaysia', 'MYS', NULL, '2018-07-19 14:06:58'),
(134, 'MV', 'Maldives', 'MDV', NULL, '2018-07-19 14:06:58'),
(135, 'ML', 'Mali', 'MLI', NULL, '2018-07-19 14:06:58'),
(136, 'MT', 'Malta', 'MLT', NULL, '2018-07-19 14:06:58'),
(137, 'MH', 'Marshall Islands', 'MHL', NULL, '2018-07-19 14:06:58'),
(138, 'MQ', 'Martinique', 'MTQ', NULL, '2018-07-19 14:06:58'),
(139, 'MR', 'Mauritania', 'MRT', NULL, '2018-07-19 14:06:58'),
(140, 'MU', 'Mauritius', 'MUS', NULL, '2018-07-19 14:06:58'),
(141, 'TY', 'Mayotte', 'MYT', NULL, '2018-07-19 14:06:58'),
(142, 'MX', 'Mexico', 'MEX', NULL, '2018-07-19 14:06:58'),
(143, 'FM', 'Micronesia, Federated States of', NULL, NULL, NULL),
(144, 'MD', 'Moldova, Republic of', NULL, NULL, NULL),
(145, 'MC', 'Monaco', 'MCO', NULL, '2018-07-19 14:06:58'),
(146, 'MN', 'Mongolia', 'MNG', NULL, '2018-07-19 14:06:58'),
(147, 'ME', 'Montenegro', 'MNE', NULL, '2018-07-19 14:06:58'),
(148, 'MS', 'Montserrat', 'MSR', NULL, '2018-07-19 14:06:58'),
(149, 'MA', 'Morocco', 'MAR', NULL, '2018-07-19 14:06:58'),
(150, 'MZ', 'Mozambique', 'MOZ', NULL, '2018-07-19 14:06:58'),
(151, 'MM', 'Myanmar', 'MMR', NULL, '2018-07-19 14:06:58'),
(152, 'NA', 'Namibia', 'NAM', NULL, '2018-07-19 14:06:58'),
(153, 'NR', 'Nauru', 'NRU', NULL, '2018-07-19 14:06:58'),
(154, 'NP', 'Nepal', 'NPL', NULL, '2018-07-19 14:06:58'),
(155, 'NL', 'Netherlands', 'NLD', NULL, '2018-07-19 14:06:58'),
(156, 'AN', 'Netherlands Antilles', 'ANT', NULL, '2018-07-19 14:06:58'),
(157, 'NC', 'New Caledonia', 'NCL', NULL, '2018-07-19 14:06:58'),
(158, 'NZ', 'New Zealand', 'NZL', NULL, '2018-07-19 14:06:58'),
(159, 'NI', 'Nicaragua', 'NIC', NULL, '2018-07-19 14:06:58'),
(160, 'NE', 'Niger', 'NER', NULL, '2018-07-19 14:06:58'),
(161, 'NG', 'Nigeria', 'NGA', NULL, '2018-07-19 14:06:58'),
(162, 'NU', 'Niue', 'NIU', NULL, '2018-07-19 14:06:58'),
(163, 'NF', 'Norfolk Island', 'NFK', NULL, '2018-07-19 14:06:58'),
(164, 'MP', 'Northern Mariana Islands', 'MNP', NULL, '2018-07-19 14:06:58'),
(165, 'NO', 'Norway', 'NOR', NULL, '2018-07-19 14:06:58'),
(166, 'OM', 'Oman', 'OMN', NULL, '2018-07-19 14:06:58'),
(167, 'PK', 'Pakistan', 'PAK', NULL, '2018-07-19 14:06:58'),
(168, 'PW', 'Palau', 'PLW', NULL, '2018-07-19 14:06:58'),
(169, 'PS', 'Palestine', 'PSE', NULL, '2018-07-19 14:06:58'),
(170, 'PA', 'Panama', 'PAN', NULL, '2018-07-19 14:06:58'),
(171, 'PG', 'Papua New Guinea', 'PNG', NULL, '2018-07-19 14:06:58'),
(172, 'PY', 'Paraguay', 'PRY', NULL, '2018-07-19 14:06:58'),
(173, 'PE', 'Peru', 'PER', NULL, '2018-07-19 14:06:58'),
(174, 'PH', 'Philippines', 'PHL', NULL, '2018-07-19 14:06:58'),
(175, 'PN', 'Pitcairn', 'PCN', NULL, '2018-07-19 14:06:58'),
(176, 'PL', 'Poland', 'POL', NULL, '2018-07-19 14:06:58'),
(177, 'PT', 'Portugal', 'PRT', NULL, '2018-07-19 14:06:58'),
(178, 'PR', 'Puerto Rico', 'PRI', NULL, '2018-07-19 14:06:58'),
(179, 'QA', 'Qatar', 'QAT', NULL, '2018-07-19 14:06:58'),
(180, 'RE', 'Reunion', NULL, NULL, NULL),
(181, 'RO', 'Romania', 'ROM', NULL, '2018-07-19 14:06:58'),
(182, 'RU', 'Russian Federation', NULL, NULL, NULL),
(183, 'RW', 'Rwanda', 'RWA', NULL, '2018-07-19 14:06:58'),
(184, 'KN', 'Saint Kitts and Nevis', 'KNA', NULL, '2018-07-19 14:06:58'),
(185, 'LC', 'Saint Lucia', 'LCA', NULL, '2018-07-19 14:06:58'),
(186, 'VC', 'Saint Vincent and the Grenadines', 'VCT', NULL, '2018-07-19 14:06:58'),
(187, 'WS', 'Samoa', 'WSM', NULL, '2018-07-19 14:06:58'),
(188, 'SM', 'San Marino', 'SMR', NULL, '2018-07-19 14:06:58'),
(189, 'ST', 'Sao Tome and Principe', 'STP', NULL, '2018-07-19 14:06:58'),
(190, 'SA', 'Saudi Arabia', 'SAU', NULL, '2018-07-19 14:06:58'),
(191, 'SN', 'Senegal', 'SEN', NULL, '2018-07-19 14:06:58'),
(192, 'RS', 'Serbia', 'SRB', NULL, '2018-07-19 14:06:58'),
(193, 'SC', 'Seychelles', 'SYC', NULL, '2018-07-19 14:06:58'),
(194, 'SL', 'Sierra Leone', 'SLE', NULL, '2018-07-19 14:06:58'),
(195, 'SG', 'Singapore', 'SGP', NULL, '2018-07-19 14:06:58'),
(196, 'SK', 'Slovakia', 'SVK', NULL, '2018-07-19 14:06:58'),
(197, 'SI', 'Slovenia', 'SVN', NULL, '2018-07-19 14:06:58'),
(198, 'SB', 'Solomon Islands', 'SLB', NULL, '2018-07-19 14:06:58'),
(199, 'SO', 'Somalia', 'SOM', NULL, '2018-07-19 14:06:58'),
(200, 'ZA', 'South Africa', 'ZAF', NULL, '2018-07-19 14:06:58'),
(201, 'GS', 'South Georgia South Sandwich Islands', NULL, NULL, NULL),
(202, 'ES', 'Spain', 'ESP', NULL, '2018-07-19 14:06:58'),
(203, 'LK', 'Sri Lanka', 'LKA', NULL, '2018-07-19 14:06:58'),
(204, 'SH', 'St. Helena', NULL, NULL, NULL),
(205, 'PM', 'St. Pierre and Miquelon', NULL, NULL, NULL),
(206, 'SD', 'Sudan', 'SDN', NULL, '2018-07-19 14:06:58'),
(207, 'SR', 'Suriname', 'SUR', NULL, '2018-07-19 14:06:58'),
(208, 'SJ', 'Svalbard and Jan Mayen Islands', NULL, NULL, NULL),
(209, 'SZ', 'Swaziland', 'SWZ', NULL, '2018-07-19 14:06:58'),
(210, 'SE', 'Sweden', 'SWE', NULL, '2018-07-19 14:06:58'),
(211, 'CH', 'Switzerland', 'CHE', NULL, '2018-07-19 14:06:58'),
(212, 'SY', 'Syrian Arab Republic', NULL, NULL, NULL),
(213, 'TW', 'Taiwan', 'TWN', NULL, '2018-07-19 14:06:58'),
(214, 'TJ', 'Tajikistan', 'TJK', NULL, '2018-07-19 14:06:58'),
(215, 'TZ', 'Tanzania, United Republic of', NULL, NULL, NULL),
(216, 'TH', 'Thailand', 'THA', NULL, '2018-07-19 14:06:58'),
(217, 'TG', 'Togo', 'TGO', NULL, '2018-07-19 14:06:58'),
(218, 'TK', 'Tokelau', 'TKL', NULL, '2018-07-19 14:06:58'),
(219, 'TO', 'Tonga', 'TON', NULL, '2018-07-19 14:06:58'),
(220, 'TT', 'Trinidad and Tobago', 'TTO', NULL, '2018-07-19 14:06:58'),
(221, 'TN', 'Tunisia', 'TUN', NULL, '2018-07-19 14:06:58'),
(222, 'TR', 'Turkey', 'TUR', NULL, '2018-07-19 14:06:58'),
(223, 'TM', 'Turkmenistan', 'TKM', NULL, '2018-07-19 14:06:58'),
(224, 'TC', 'Turks and Caicos Islands', 'TCA', NULL, '2018-07-19 14:06:58'),
(225, 'TV', 'Tuvalu', 'TUV', NULL, '2018-07-19 14:06:58'),
(226, 'UG', 'Uganda', 'UGA', NULL, '2018-07-19 14:06:58'),
(227, 'UA', 'Ukraine', 'UKR', NULL, '2018-07-19 14:06:58'),
(228, 'AE', 'United Arab Emirates', 'ARE', NULL, '2018-07-19 14:06:58'),
(229, 'GB', 'United Kingdom', 'GBR', NULL, '2018-07-19 14:06:58'),
(230, 'US', 'United States', 'USA', NULL, NULL),
(231, 'UM', 'United States minor outlying islands', NULL, NULL, NULL),
(232, 'UY', 'Uruguay', 'URY', NULL, '2018-07-19 14:06:58'),
(233, 'UZ', 'Uzbekistan', 'UZB', NULL, '2018-07-19 14:06:58'),
(234, 'VU', 'Vanuatu', 'VUT', NULL, '2018-07-19 14:06:58'),
(235, 'VA', 'Vatican City State', NULL, NULL, NULL),
(236, 'VE', 'Venezuela', 'VEN', NULL, '2018-07-19 14:06:58'),
(237, 'VN', 'Vietnam', 'VNM', NULL, '2018-07-19 14:06:58'),
(238, 'VG', 'Virgin Islands (British)', NULL, NULL, NULL),
(239, 'VI', 'Virgin Islands (U.S.)', NULL, NULL, NULL),
(240, 'WF', 'Wallis and Futuna Islands', NULL, NULL, NULL),
(241, 'EH', 'Western Sahara', 'ESH', NULL, '2018-07-19 14:06:58'),
(242, 'YE', 'Yemen', 'YEM', NULL, '2018-07-19 14:06:58'),
(243, 'ZR', 'Zaire', NULL, NULL, NULL),
(244, 'ZM', 'Zambia', 'ZMB', NULL, '2018-07-19 14:06:58'),
(245, 'ZW', 'Zimbabwe', 'ZWE', NULL, '2018-07-19 14:06:58');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `valid_form` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `valid_to` timestamp NULL DEFAULT NULL,
  `usage` int(11) NOT NULL,
  `total_used` int(11) DEFAULT NULL,
  `conditions` text,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `code`, `total`, `valid_form`, `valid_to`, `usage`, `total_used`, `conditions`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test2020', 10, '2020-09-01 16:06:43', '2020-09-30 18:30:00', 99, 1, 'aa', 1, 0, '2020-09-01 16:06:43', '2020-09-01 16:06:43'),
(3, 'new test coupon', 'test2019', 5, '2020-09-10 11:45:22', '2020-09-30 00:00:00', 9, 1, 'aaa', 1, 0, '2020-09-10 11:45:22', '2020-09-10 11:45:22'),
(4, '20% off on purchase', 'rain20', 20, '2020-08-19 00:00:00', '2020-09-30 00:00:00', 5, NULL, 'test', 1, 0, '2020-09-08 12:52:27', '2020-09-08 12:52:27'),
(5, 'Monsoon discount 2020', 'pobox2020', 10, '2020-08-19 00:00:00', '2020-08-30 00:00:00', 1, NULL, 'monsoon2020', 1, 0, '2020-08-19 15:59:20', '2020-08-19 15:59:20'),
(6, 'Po box', 'po', 10, '2020-09-07 09:40:02', '2020-09-30 00:00:00', 4, 1, NULL, 1, 0, '2020-09-07 09:40:02', '2020-09-07 09:40:02'),
(7, 'test', 't', 10, '2020-09-08 12:58:12', '2020-11-06 00:00:00', 4, 1, NULL, 1, 0, '2020-09-08 12:58:12', '2020-09-08 12:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `discount_banner`
--

CREATE TABLE `discount_banner` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discount_banner`
--

INSERT INTO `discount_banner` (`id`, `image`, `url`, `created_at`, `updated_at`) VALUES
(1, '1593622992.jpg', 'http://3.7.41.47/pobox_new/pobox/public/new-arrival', '2020-06-09 13:36:37', '2020-09-10 05:42:24');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 2),
(4, '2019_12_17_062907_create_admins_table', 2),
(5, '2020_07_17_141357_create_cart_details_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` bigint(225) NOT NULL,
  `address_id` bigint(225) NOT NULL,
  `coupon_id` int(11) DEFAULT NULL,
  `coupon_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coupon_amount` int(11) DEFAULT NULL,
  `ordernumber` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `bag_total` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `saveAmount` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `gstAmount` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `totalamount` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `payment_option` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `isGuest` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `address_id`, `coupon_id`, `coupon_code`, `coupon_amount`, `ordernumber`, `bag_total`, `saveAmount`, `gstAmount`, `totalamount`, `payment_option`, `status`, `isGuest`, `is_deleted`, `updated_at`, `created_at`) VALUES
(25, 142, 44, NULL, NULL, NULL, '863543', '0', '0', '0', '1070', 2, 0, 0, 0, '2020-07-21 09:56:28', '2019-07-21 09:56:28'),
(26, 142, 46, NULL, NULL, NULL, '501754', '0', '0', '0', '2000', NULL, 0, 0, 0, '2020-07-21 11:23:08', '2020-07-21 11:23:08'),
(27, 142, 44, NULL, NULL, NULL, '603157', '0', '0', '0', '2000', 2, 0, 0, 0, '2020-07-21 11:33:46', '2018-07-21 11:33:46'),
(28, 142, 44, NULL, NULL, NULL, '933673', '0', '0', '0', '270', 2, 0, 0, 0, '2020-07-21 11:36:28', '2020-07-21 11:36:28'),
(29, 142, 44, NULL, NULL, NULL, '983732', '0', '0', '0', '1710', 2, 0, 0, 0, '2020-07-21 11:40:10', '2020-07-21 11:40:10'),
(30, 142, 44, NULL, NULL, NULL, '597941', '0', '0', '0', '1070', NULL, 0, 0, 0, '2020-07-21 11:50:43', '2020-07-21 11:50:43'),
(31, 101, 42, NULL, NULL, NULL, '583211', '0', '0', '0', '2880', 5, 0, 0, 0, '2020-07-21 12:30:37', '2020-07-21 12:30:37'),
(32, 101, 38, NULL, NULL, NULL, '211717', '0', '0', '0', '8890', 5, 0, 0, 0, '2020-07-21 13:02:42', '2020-07-21 13:02:42'),
(33, 142, 44, NULL, NULL, NULL, '828151', '0', '0', '0', '11880', NULL, 0, 0, 0, '2020-07-21 13:27:13', '2020-07-21 13:27:13'),
(34, 142, 46, NULL, NULL, NULL, '550369', '0', '0', '0', '8270', 2, 0, 0, 0, '2020-07-22 10:27:10', '2020-07-22 10:27:10'),
(35, 142, 44, NULL, NULL, NULL, '727200', '0', '0', '0', '7200', NULL, 0, 0, 0, '2020-07-22 12:35:54', '2020-07-22 12:35:54'),
(36, 142, 44, NULL, NULL, NULL, '506655', '0', '0', '0', '270', NULL, 0, 0, 0, '2020-07-22 15:28:47', '2020-07-22 15:28:47'),
(37, 142, 44, NULL, NULL, NULL, '411618', '0', '0', '0', '2800', NULL, 0, 0, 0, '2020-07-22 15:29:59', '2020-07-22 15:29:59'),
(38, 142, 44, NULL, NULL, NULL, '981923', '0', '0', '0', '11220', NULL, 0, 0, 0, '2020-07-23 05:37:55', '2020-07-23 05:37:55'),
(39, 142, 44, NULL, NULL, NULL, '605156', '0', '0', '0', '8740', NULL, 0, 0, 0, '2020-07-23 12:48:29', '2020-07-23 12:48:29'),
(40, 142, 44, NULL, NULL, NULL, '360004', '0', '0', '0', '800', NULL, 0, 0, 0, '2020-07-24 02:34:53', '2020-07-24 02:34:53'),
(41, 142, 44, NULL, NULL, NULL, '747219', '0', '0', '0', '1340', NULL, 0, 0, 0, '2020-07-24 09:00:27', '2020-07-24 09:00:27'),
(42, 142, 44, NULL, NULL, NULL, '340184', '0', '0', '0', '270', NULL, 0, 0, 0, '2020-07-24 09:38:36', '2020-07-24 09:38:36'),
(43, 142, 44, NULL, NULL, NULL, '104224', '0', '0', '0', '270', NULL, 0, 0, 0, '2020-07-24 09:40:14', '2020-07-24 09:40:14'),
(44, 142, 46, NULL, NULL, NULL, '709190', '0', '0', '0', '1070', NULL, 0, 0, 0, '2020-07-24 09:47:00', '2020-07-24 09:47:00'),
(45, 142, 44, NULL, NULL, NULL, '660832', '0', '0', '0', '4550', NULL, 0, 0, 0, '2020-07-24 09:49:57', '2020-07-24 09:49:57'),
(46, 142, 44, NULL, NULL, NULL, '445753', '0', '0', '0', '1070', NULL, 0, 0, 0, '2020-07-24 09:50:55', '2020-07-24 09:50:55'),
(47, 142, 46, NULL, NULL, NULL, '310297', '0', '0', '0', '1070', NULL, 0, 0, 0, '2020-07-24 11:18:12', '2020-07-24 11:18:12'),
(48, 142, 44, NULL, NULL, NULL, '938646', '0', '0', '0', '1070', NULL, 0, 0, 0, '2020-07-24 11:52:09', '2020-07-24 11:52:09'),
(49, 142, 46, NULL, NULL, NULL, '362788', '0', '0', '0', '1070', NULL, 0, 0, 0, '2020-07-24 12:05:42', '2020-07-24 12:05:42'),
(50, 142, 44, NULL, NULL, NULL, '211510', '0', '0', '0', '8640', NULL, 0, 0, 0, '2020-07-24 13:20:39', '2020-07-24 13:20:39'),
(51, 142, 44, NULL, NULL, NULL, '765855', '0', '0', '0', '9710', NULL, 0, 0, 0, '2020-07-24 13:37:24', '2020-07-24 13:37:24'),
(52, 142, 44, NULL, NULL, NULL, '622331', '0', '0', '0', '270', NULL, 0, 0, 0, '2020-07-24 14:15:35', '2020-07-24 14:15:35'),
(53, 100, 19, NULL, NULL, NULL, '826212', '0', '0', '0', '1070', NULL, 0, 0, 0, '2020-07-24 14:30:31', '2020-07-24 14:30:31'),
(54, 149, 53, NULL, NULL, NULL, '832380', '0', '0', '0', '2400', NULL, 0, 0, 0, '2020-07-24 15:02:49', '2020-07-24 15:02:49'),
(55, 100, 19, NULL, NULL, NULL, '101584', '0', '0', '0', '4820', NULL, 0, 0, 0, '2020-07-24 15:16:56', '2020-07-24 15:16:56'),
(56, 100, 19, NULL, NULL, NULL, '829061', '0', '0', '0', '4820', NULL, 0, 0, 0, '2020-07-24 15:17:11', '2020-07-24 15:17:11'),
(57, 149, 53, NULL, NULL, NULL, '272008', '0', '0', '0', '2400', NULL, 0, 0, 0, '2020-07-24 16:08:43', '2020-07-24 16:08:43'),
(58, 149, 53, NULL, NULL, NULL, '928841', '0', '0', '0', '6400', NULL, 0, 0, 0, '2020-07-24 16:30:16', '2020-07-24 16:30:16'),
(59, 142, 44, NULL, NULL, NULL, '269242', '0', '0', '0', '2000', NULL, 0, 0, 0, '2020-07-24 19:04:52', '2020-07-24 19:04:52'),
(60, 142, 44, NULL, NULL, NULL, '383245', '0', '0', '0', '2000', NULL, 0, 0, 0, '2020-07-24 19:18:50', '2020-07-24 19:18:50'),
(61, 1, 46, NULL, NULL, NULL, '874686', '0', '0', '0', '283.5', NULL, 0, 1, 0, '2020-08-01 16:31:54', '2020-08-01 16:31:54'),
(62, 1, 47, NULL, NULL, NULL, '509035', '0', '0', '0', '283.5', NULL, 0, 1, 0, '2020-08-01 16:32:33', '2020-08-01 16:32:33'),
(63, 1, 41, NULL, NULL, NULL, '837363', '0', '0', '0', '840', NULL, 1, 0, 0, '2020-08-01 16:37:42', '2020-08-01 16:33:27'),
(64, 149, 48, NULL, NULL, NULL, '201863', '0', '0', '0', '2100', NULL, 0, 0, 0, '2020-08-04 07:20:23', '2020-08-04 07:20:23'),
(65, 142, 44, NULL, NULL, NULL, '916625', '0', '0', '0', '840', NULL, 0, 0, 0, '2020-08-04 07:22:58', '2020-08-04 07:22:58'),
(66, 1, 49, NULL, NULL, NULL, '831788', '0', '0', '0', '7275', NULL, 0, 1, 0, '2020-08-04 07:28:50', '2020-08-04 07:28:50'),
(67, 149, 48, NULL, NULL, NULL, '459611', '0', '0', '0', '8937.5', NULL, 0, 0, 0, '2020-08-04 07:32:52', '2020-08-04 07:32:52'),
(68, 149, 48, NULL, NULL, NULL, '293896', '0', '0', '0', '7560', NULL, 0, 0, 0, '2020-08-04 07:35:08', '2020-08-04 07:35:08'),
(69, 136, 20, NULL, NULL, NULL, '782685', '0', '0', '0', '9660', NULL, 0, 0, 0, '2020-08-13 15:32:05', '2020-08-13 15:32:05'),
(70, 100, 19, NULL, NULL, NULL, '993420', '0', '0', '0', '283.5', NULL, 0, 0, 0, '2020-08-15 12:59:19', '2020-08-15 12:59:19'),
(71, 1, 51, NULL, NULL, NULL, '346487', '0', '0', '0', '3937.5', NULL, 0, 1, 0, '2020-08-19 05:51:49', '2020-08-19 05:51:49'),
(72, 1, 52, NULL, NULL, NULL, '808119', '0', '0', '0', '2415', NULL, 0, 1, 0, '2020-08-19 06:31:23', '2020-08-19 06:31:23'),
(73, 1, 53, 1, 'test2020', 375, '748466', '0', '0', '0', '3562.5', NULL, 0, 1, 0, '2020-08-19 07:09:10', '2020-08-19 07:09:10'),
(74, 81, 23, NULL, NULL, NULL, '282079', '0', '0', '0', '840', NULL, 0, 0, 0, '2020-08-19 07:11:48', '2020-08-19 07:11:48'),
(75, 1, 54, 3, 'test2019', 28, '844890', '0', '0', '0', '570', NULL, 0, 1, 0, '2020-08-19 07:19:25', '2020-08-19 07:19:25'),
(76, 149, 48, NULL, NULL, NULL, '413803', '0', '0', '0', '1543.5', NULL, 0, 0, 0, '2020-08-19 15:30:55', '2020-08-19 15:30:55'),
(77, 149, 48, 1, 'test2020', 720, '359911', '0', '0', '0', '6840', NULL, 3, 0, 0, '2020-09-06 07:04:08', '2020-08-19 16:03:58'),
(78, 154, 57, NULL, NULL, NULL, '590986', '11500', '2800', '435', '9135', NULL, 0, 1, 0, '2020-09-01 15:59:56', '2020-09-01 15:59:56'),
(79, 100, 19, 1, 'test2020', 1335, '871611', '18500', '5150', '668', '12683', NULL, 0, 0, 0, '2020-09-01 16:06:43', '2020-09-01 16:06:43'),
(80, 155, 59, NULL, NULL, NULL, '135025', '6100', '660', '272', '5712', NULL, 0, 1, 0, '2020-09-07 09:27:40', '2020-09-07 09:27:40'),
(81, 156, 60, NULL, NULL, NULL, '476352', '6100', '660', '272', '5712', NULL, 0, 1, 0, '2020-09-07 09:28:28', '2020-09-07 09:28:28'),
(82, 158, 61, NULL, NULL, NULL, '770137', '6100', '660', '272', '5712', NULL, 2, 1, 0, '2020-09-07 09:30:16', '2020-09-07 09:29:42'),
(83, 81, 25, 6, 'po', 347, '972787', '4300', '830', '174', '3297', NULL, 1, 0, 0, '2020-09-07 11:31:56', '2020-09-07 09:40:02'),
(84, 81, 30, NULL, NULL, NULL, '919427', '10300', '2530', '389', '8159', NULL, 2, 0, 0, '2020-09-07 12:07:54', '2020-09-07 12:07:26'),
(85, 81, 25, NULL, NULL, NULL, '871813', '1500', '700', '40', '840', NULL, 1, 0, 0, '2020-09-07 12:26:48', '2020-09-07 12:26:48'),
(86, 159, 62, NULL, NULL, NULL, '745359', '1000', '0', '50', '1050', NULL, 1, 1, 0, '2020-09-07 13:28:56', '2020-09-07 13:28:56'),
(87, 81, 23, NULL, NULL, NULL, '656584', '1500', '700', '40', '840', NULL, 3, 0, 0, '2020-09-08 06:08:52', '2020-09-08 06:06:36'),
(88, 100, 63, NULL, NULL, NULL, '146282', '1500', '700', '40', '840', NULL, 1, 0, 0, '2020-09-08 10:27:15', '2020-09-08 10:27:15'),
(89, 100, 64, NULL, NULL, NULL, '760451', '1500', '700', '40', '840', NULL, 1, 0, 0, '2020-09-08 10:28:35', '2020-09-08 10:28:35'),
(90, 100, 65, NULL, NULL, NULL, '217219', '1500', '700', '40', '840', NULL, 1, 0, 0, '2020-09-08 10:32:35', '2020-09-08 10:32:35'),
(91, 81, 25, 7, 't', 540, '734548', '6500', '1100', '270', '5130', NULL, 1, 0, 0, '2020-09-08 13:00:32', '2020-09-08 12:58:12'),
(92, 149, 48, 3, 'test2019', 216, '866864', '4800', '480', '216', '4320', NULL, 2, 0, 0, '2020-09-10 11:51:04', '2020-09-10 11:45:22'),
(93, 164, 66, NULL, NULL, NULL, '123817', '5000', '1250', '188', '3938', NULL, 1, 1, 0, '2020-09-11 05:28:42', '2020-09-11 05:28:42'),
(94, 165, 67, NULL, NULL, NULL, '562857', '1500', '300', '60', '1260', NULL, 1, 1, 0, '2020-09-11 05:31:04', '2020-09-11 05:31:04'),
(95, 81, 23, NULL, NULL, NULL, '748193', '5500', '900', '230', '4830', NULL, 3, 0, 0, '2020-09-18 14:55:34', '2020-09-18 14:51:55'),
(96, 81, 23, NULL, NULL, NULL, '111531', '13000', '3100', '495', '10395', NULL, 3, 0, 0, '2020-09-18 15:13:13', '2020-09-18 15:11:21'),
(97, 81, 23, NULL, NULL, NULL, '948361', '3000', '2100', '45', '945', NULL, 3, 0, 0, '2020-09-18 16:07:32', '2020-09-18 16:05:28'),
(98, 136, 68, NULL, NULL, NULL, '966757', '1000', '100', '45', '945', NULL, 1, 0, 0, '2020-09-18 19:42:25', '2020-09-18 19:42:25'),
(99, 81, 69, NULL, NULL, NULL, '673949', '17200', '2440', '738', '15498', NULL, 3, 0, 0, '2020-09-19 07:08:34', '2020-09-19 07:05:55'),
(100, 169, 70, NULL, NULL, NULL, '161834', '11100', '4210', '345', '7235', NULL, 3, 1, 0, '2020-09-19 07:24:10', '2020-09-19 07:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `orderDetails`
--

CREATE TABLE `orderDetails` (
  `id` int(11) NOT NULL,
  `order_id` bigint(225) NOT NULL,
  `product_id` bigint(225) NOT NULL,
  `qty` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `size_name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `mrp` double NOT NULL,
  `hex_code` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `discount` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderDetails`
--

INSERT INTO `orderDetails` (`id`, `order_id`, `product_id`, `qty`, `size_name`, `price`, `mrp`, `hex_code`, `discount`, `created_at`, `updated_at`, `status`) VALUES
(30, 25, 30, '1', 'S', 270, 300, '#000000', '10', '2020-07-21 09:56:28', '2020-07-21 09:56:28', 0),
(31, 25, 33, '1', 'S', 800, 1500, '#f5f5f5', '47', '2020-07-21 09:56:28', '2020-07-21 09:56:28', 0),
(32, 26, 44, '1', 'M', 800, 1000, '#000000', '20', '2020-07-21 11:23:08', '2020-07-21 11:23:08', 0),
(33, 26, 43, '1', 'S', 1200, 1500, '#e60a0a', '5', '2020-07-21 11:23:08', '2020-07-21 11:23:08', 0),
(34, 27, 44, '1', 'M', 800, 1000, '#000000', '20', '2020-07-21 11:33:46', '2020-07-21 11:33:46', 0),
(35, 27, 43, '1', 'S', 1200, 1500, '#e60a0a', '5', '2020-07-21 11:33:46', '2020-07-21 11:33:46', 0),
(36, 28, 30, '1', 'S', 270, 300, '#000000', '10', '2020-07-21 11:36:28', '2020-07-21 11:36:28', 0),
(37, 29, 30, '1', 'S', 270, 300, '#000000', '10', '2020-07-21 11:40:10', '2020-07-21 11:40:10', 0),
(38, 29, 42, '1', 'S', 1440, 1600, '#e86721', '10', '2020-07-21 11:40:10', '2020-07-21 11:40:10', 0),
(39, 30, 30, '1', 'M', 270, 300, '#000000', '10', '2020-07-21 11:50:43', '2020-07-21 11:50:43', 0),
(40, 30, 33, '1', 'M', 800, 1500, '#f5f5f5', '47', '2020-07-21 11:50:43', '2020-07-21 11:50:43', 0),
(41, 31, 42, '2', 'L', 1440, 1600, '#e86721', '10', '2020-07-21 12:30:37', '2020-07-21 12:30:37', 0),
(42, 32, 30, '2', 'L', 270, 300, '#000000', '10', '2020-07-21 13:02:42', '2020-07-21 13:02:42', 0),
(43, 32, 34, '1', 'S', 3750, 5000, '#139a2a', '25', '2020-07-21 13:02:42', '2020-07-21 13:02:42', 0),
(44, 32, 43, '1', 'S', 1200, 1500, '#e60a0a', '5', '2020-07-21 13:02:42', '2020-07-21 13:02:42', 0),
(45, 32, 43, '2', 'S', 1200, 1500, '#e60a0a', '5', '2020-07-21 13:02:42', '2020-07-21 13:02:42', 0),
(46, 32, 50, '1', 'S', 1000, 1000, '#000000', '0', '2020-07-21 13:02:42', '2020-07-21 13:02:42', 0),
(47, 33, 33, '1', 'M', 800, 1500, '#f5f5f5', '47', '2020-07-21 13:27:13', '2020-07-21 13:27:13', 0),
(48, 33, 30, '1', 'S', 270, 300, '#000000', '10', '2020-07-21 13:27:13', '2020-07-21 13:27:13', 0),
(49, 33, 33, '1', 'S', 800, 1500, '#f5f5f5', '47', '2020-07-21 13:27:13', '2020-07-21 13:27:13', 0),
(50, 33, 30, '1', 'M', 270, 300, '#000000', '10', '2020-07-21 13:27:13', '2020-07-21 13:27:13', 0),
(51, 33, 34, '2', 'M', 3750, 5000, '#139a2a', '25', '2020-07-21 13:27:13', '2020-07-21 13:27:13', 0),
(52, 33, 42, '1', 'L', 1440, 1600, '#e86721', '10', '2020-07-21 13:27:13', '2020-07-21 13:27:13', 0),
(53, 33, 44, '1', 'M', 800, 1000, '#000000', '20', '2020-07-21 13:27:13', '2020-07-21 13:27:13', 0),
(54, 34, 33, '1', 'S', 800, 1500, '#f5f5f5', '47', '2020-07-22 10:27:10', '2020-07-22 10:27:10', 0),
(55, 34, 30, '1', 'S', 270, 300, '#000000', '10', '2020-07-22 10:27:10', '2020-07-22 10:27:10', 0),
(56, 34, 35, '1', 'S', 7200, 9000, '#85e0ff', '20', '2020-07-22 10:27:10', '2020-07-22 10:27:10', 0),
(57, 35, 35, '1', 'S', 7200, 9000, '#85e0ff', '20', '2020-07-22 12:35:54', '2020-07-22 12:35:54', 0),
(58, 36, 30, '1', 'L', 270, 300, '#000000', '10', '2020-07-22 15:28:47', '2020-07-22 15:28:47', 0),
(59, 37, 50, '2', 'M', 1000, 1000, '#000000', '0', '2020-07-22 15:29:59', '2020-07-22 15:29:59', 0),
(60, 37, 44, '1', 'M', 800, 1000, '#000000', '20', '2020-07-22 15:29:59', '2020-07-22 15:29:59', 0),
(61, 38, 35, '1', 'S', 7200, 9000, '#85e0ff', '20', '2020-07-23 05:37:55', '2020-07-23 05:37:55', 0),
(62, 38, 30, '1', 'S', 270, 300, '#000000', '10', '2020-07-23 05:37:55', '2020-07-23 05:37:55', 0),
(63, 38, 34, '1', 'M', 3750, 5000, '#139a2a', '25', '2020-07-23 05:37:55', '2020-07-23 05:37:55', 0),
(64, 39, 50, '1', 'S', 1000, 1000, '#000000', '0', '2020-07-23 12:48:29', '2020-07-23 12:48:29', 0),
(65, 39, 30, '1', 'S', 270, 300, '#000000', '10', '2020-07-23 12:48:29', '2020-07-23 12:48:29', 0),
(66, 39, 35, '1', 'S', 7200, 9000, '#85e0ff', '20', '2020-07-23 12:48:29', '2020-07-23 12:48:29', 0),
(67, 39, 30, '1', 'M', 270, 300, '#000000', '10', '2020-07-23 12:48:29', '2020-07-23 12:48:29', 0),
(68, 40, 33, '1', 'S', 800, 1500, '#f5f5f5', '47', '2020-07-24 02:34:53', '2020-07-24 02:34:53', 0),
(69, 41, 30, '1', 'M', 270, 300, '#000000', '10', '2020-07-24 09:00:27', '2020-07-24 09:00:27', 0),
(70, 41, 30, '1', 'M', 270, 300, '#000000', '10', '2020-07-24 09:00:27', '2020-07-24 09:00:27', 0),
(71, 41, 33, '1', 'S', 800, 1500, '#f5f5f5', '47', '2020-07-24 09:00:27', '2020-07-24 09:00:27', 0),
(72, 42, 30, '1', 'M', 270, 300, '#000000', '10', '2020-07-24 09:38:36', '2020-07-24 09:38:36', 0),
(73, 43, 30, '1', 'M', 270, 300, '#000000', '10', '2020-07-24 09:40:14', '2020-07-24 09:40:14', 0),
(74, 44, 33, '1', 'S', 800, 1500, '#f5f5f5', '47', '2020-07-24 09:47:00', '2020-07-24 09:47:00', 0),
(75, 44, 30, '1', 'M', 270, 300, '#000000', '10', '2020-07-24 09:47:00', '2020-07-24 09:47:00', 0),
(76, 45, 33, '1', 'S', 800, 1500, '#f5f5f5', '47', '2020-07-24 09:49:57', '2020-07-24 09:49:57', 0),
(77, 45, 34, '1', 'S', 3750, 5000, '#139a2a', '25', '2020-07-24 09:49:57', '2020-07-24 09:49:57', 0),
(78, 46, 30, '1', 'M', 270, 300, '#000000', '10', '2020-07-24 09:50:55', '2020-07-24 09:50:55', 0),
(79, 46, 33, '1', 'S', 800, 1500, '#f5f5f5', '47', '2020-07-24 09:50:55', '2020-07-24 09:50:55', 0),
(80, 47, 30, '1', 'M', 270, 300, '#000000', '10', '2020-07-24 11:18:12', '2020-07-24 11:18:12', 0),
(81, 47, 33, '1', 'S', 800, 1500, '#f5f5f5', '47', '2020-07-24 11:18:12', '2020-07-24 11:18:12', 0),
(82, 48, 30, '1', 'M', 270, 300, '#000000', '10', '2020-07-24 11:52:09', '2020-07-24 11:52:09', 0),
(83, 48, 33, '1', 'S', 800, 1500, '#f5f5f5', '47', '2020-07-24 11:52:09', '2020-07-24 11:52:09', 0),
(84, 49, 30, '1', 'M', 270, 300, '#000000', '10', '2020-07-24 12:05:42', '2020-07-24 12:05:42', 0),
(85, 49, 33, '1', 'S', 800, 1500, '#f5f5f5', '47', '2020-07-24 12:05:42', '2020-07-24 12:05:42', 0),
(86, 50, 35, '1', 'S', 7200, 9000, '#85e0ff', '20', '2020-07-24 13:20:39', '2020-07-24 13:20:39', 0),
(87, 50, 42, '1', 'S', 1440, 1600, '#e86721', '10', '2020-07-24 13:20:39', '2020-07-24 13:20:39', 0),
(88, 51, 35, '1', 'S', 7200, 9000, '#85e0ff', '20', '2020-07-24 13:37:24', '2020-07-24 13:37:24', 0),
(89, 51, 42, '1', 'S', 1440, 1600, '#e86721', '10', '2020-07-24 13:37:24', '2020-07-24 13:37:24', 0),
(90, 51, 30, '1', 'M', 270, 300, '#000000', '10', '2020-07-24 13:37:24', '2020-07-24 13:37:24', 0),
(91, 51, 44, '1', 'M', 800, 1000, '#000000', '20', '2020-07-24 13:37:24', '2020-07-24 13:37:24', 0),
(92, 52, 30, '1', 'M', 270, 300, '#000000', '10', '2020-07-24 14:15:35', '2020-07-24 14:15:35', 0),
(93, 53, 30, '1', 'M', 270, 300, '#000000', '10', '2020-07-24 14:30:31', '2020-07-24 14:30:31', 0),
(94, 53, 33, '1', 'S', 800, 1500, '#f5f5f5', '47', '2020-07-24 14:30:31', '2020-07-24 14:30:31', 0),
(95, 54, 33, '3', 'S', 800, 1500, '#f5f5f5', '47', '2020-07-24 15:02:49', '2020-07-24 15:02:49', 0),
(96, 55, 30, '1', 'M', 270, 300, '#000000', '10', '2020-07-24 15:16:56', '2020-07-24 15:16:56', 0),
(97, 55, 33, '1', 'S', 800, 1500, '#f5f5f5', '47', '2020-07-24 15:16:56', '2020-07-24 15:16:56', 0),
(98, 55, 34, '1', 'S', 3750, 5000, '#139a2a', '25', '2020-07-24 15:16:56', '2020-07-24 15:16:56', 0),
(99, 56, 30, '1', 'M', 270, 300, '#000000', '10', '2020-07-24 15:17:11', '2020-07-24 15:17:11', 0),
(100, 56, 33, '1', 'S', 800, 1500, '#f5f5f5', '47', '2020-07-24 15:17:11', '2020-07-24 15:17:11', 0),
(101, 56, 34, '1', 'S', 3750, 5000, '#139a2a', '25', '2020-07-24 15:17:11', '2020-07-24 15:17:11', 0),
(102, 57, 33, '3', 'S', 800, 1500, '#f5f5f5', '47', '2020-07-24 16:08:43', '2020-07-24 16:08:43', 0),
(103, 58, 33, '3', 'S', 800, 1500, '#f5f5f5', '47', '2020-07-24 16:30:16', '2020-07-24 16:30:16', 0),
(104, 58, 60, '2', 'M', 2000, 2500, '#e60a0a', '20', '2020-07-24 16:30:16', '2020-07-24 16:30:16', 0),
(105, 59, 33, '1', 'S', 800, 1500, '#f5f5f5', '47', '2020-07-24 19:04:52', '2020-07-24 19:04:52', 0),
(106, 59, 43, '1', 'S', 1200, 1500, '#e60a0a', '5', '2020-07-24 19:04:52', '2020-07-24 19:04:52', 0),
(107, 60, 33, '1', 'S', 800, 1500, '#f5f5f5', '47', '2020-07-24 19:18:50', '2020-07-24 19:18:50', 0),
(108, 60, 43, '1', 'S', 1200, 1500, '#e60a0a', '5', '2020-07-24 19:18:50', '2020-07-24 19:18:50', 0),
(109, 62, 30, '1', 'M', 270, 300, '#000000', '10', '2020-08-01 16:32:33', '2020-08-01 16:32:33', 0),
(110, 63, 33, '1', 'S', 800, 1500, '#f5f5f5', '47', '2020-08-01 16:33:27', '2020-08-01 16:33:27', 0),
(111, 64, 60, '1', 'S', 2000, 2500, '#e60a0a', '20', '2020-08-04 07:20:23', '2020-08-04 07:20:23', 0),
(112, 65, 33, '1', 'S', 800, 1500, '#f5f5f5', '47', '2020-08-04 07:22:58', '2020-08-04 07:22:58', 0),
(113, 66, 43, '5', 'M', 1200, 1500, '#e60a0a', '5', '2020-08-04 07:28:50', '2020-08-04 07:28:50', 0),
(114, 67, 34, '2', 'M', 3750, 5000, '#139a2a', '25', '2020-08-04 07:32:52', '2020-08-04 07:32:52', 0),
(115, 68, 35, '1', 'S', 7200, 9000, '#85e0ff', '20', '2020-08-04 07:35:08', '2020-08-04 07:35:08', 0),
(116, 69, 35, '1', 'S', 7200, 9000, '#85e0ff', '20', '2020-08-13 15:32:05', '2020-08-13 15:32:05', 0),
(117, 69, 60, '1', 'S', 2000, 2500, '#e60a0a', '20', '2020-08-13 15:32:05', '2020-08-13 15:32:05', 0),
(118, 70, 30, '1', 'M', 270, 300, '#000000', '10', '2020-08-15 12:59:19', '2020-08-15 12:59:19', 0),
(119, 71, 34, '1', 'S', 3750, 5000, '#139a2a', '25', '2020-08-19 05:51:50', '2020-08-19 05:51:50', 0),
(120, 72, 33, '2', 'S', 800, 1500, '#f5f5f5', '47', '2020-08-19 06:31:23', '2020-08-19 06:31:23', 0),
(121, 73, 34, '1', 'S', 3750, 5000, '#139a2a', '25', '2020-08-19 07:09:10', '2020-08-19 07:09:10', 0),
(122, 74, 33, '1', 'L', 800, 1500, '#f5f5f5', '47', '2020-08-19 07:11:48', '2020-08-19 07:11:48', 0),
(123, 75, 30, '2', 'L', 270, 300, '#000000', '10', '2020-08-19 07:19:25', '2020-08-19 07:19:25', 0),
(124, 76, 30, '5', 'L', 270, 300, '#000000', '10', '2020-08-19 15:30:55', '2020-08-19 15:30:55', 0),
(125, 77, 35, '1', 'S', 7200, 9000, '#85e0ff', '20', '2020-08-19 16:03:58', '2020-08-19 16:03:58', 0),
(126, 78, 34, '2', 'S', 3750, 5000, '#139a2a', '25', '2020-09-01 15:59:56', '2020-09-01 15:59:56', 0),
(127, 78, 43, '1', 'S', 1200, 1500, '#e60a0a', '5', '2020-09-01 15:59:56', '2020-09-01 15:59:56', 0),
(128, 79, 34, '1', 'S', 3750, 5000, '#139a2a', '25', '2020-09-01 16:06:43', '2020-09-01 16:06:43', 0),
(129, 79, 33, '2', 'M', 800, 1500, '#f5f5f5', '47', '2020-09-01 16:06:43', '2020-09-01 16:06:43', 0),
(130, 79, 33, '1', 'S', 800, 1500, '#f5f5f5', '47', '2020-09-01 16:06:43', '2020-09-01 16:06:43', 0),
(131, 79, 35, '1', 'S', 7200, 9000, '#85e0ff', '20', '2020-09-01 16:06:43', '2020-09-01 16:06:43', 0),
(132, 82, 60, '1', 'S', 2000, 2500, '#e60a0a', '20', '2020-09-07 09:29:42', '2020-09-07 09:29:42', 0),
(133, 82, 50, '2', 'M', 1000, 1000, '#000000', '0', '2020-09-07 09:29:42', '2020-09-07 09:29:42', 0),
(134, 82, 42, '1', 'S', 1440, 1600, '#e86721', '10', '2020-09-07 09:29:42', '2020-09-07 09:29:42', 0),
(135, 83, 43, '1', 'M', 1200, 1500, '#e60a0a', '5', '2020-09-07 09:40:03', '2020-09-07 09:40:03', 0),
(136, 83, 60, '1', 'S', 2000, 2500, '#e60a0a', '20', '2020-09-07 09:40:03', '2020-09-07 09:40:03', 0),
(137, 83, 30, '1', 'XL', 270, 300, '#000000', '10', '2020-09-07 09:40:03', '2020-09-07 09:40:03', 0),
(138, 84, 34, '2', 'M', 3750, 5000, '#139a2a', '25', '2020-09-07 12:07:26', '2020-09-07 12:07:26', 0),
(139, 84, 30, '1', 'S', 270, 300, '#000000', '10', '2020-09-07 12:07:26', '2020-09-07 12:07:26', 0),
(140, 85, 33, '1', 'S', 800, 1500, '#f5f5f5', '47', '2020-09-07 12:26:48', '2020-09-07 12:26:48', 0),
(141, 86, 50, '1', 'L', 1000, 1000, '#000000', '0', '2020-09-07 13:28:56', '2020-09-07 13:28:56', 0),
(142, 87, 33, '1', 'L', 800, 1500, '#f5f5f5', '47', '2020-09-08 06:06:36', '2020-09-08 06:06:36', 0),
(143, 90, 33, '1', 'S', 800, 1500, '#f5f5f5', '47', '2020-09-08 10:32:35', '2020-09-08 10:32:35', 0),
(144, 91, 43, '2', 'S', 1200, 1500, '#e60a0a', '5', '2020-09-08 12:58:12', '2020-09-08 12:58:12', 0),
(145, 91, 43, '1', 'M', 1200, 1500, '#e60a0a', '5', '2020-09-08 12:58:12', '2020-09-08 12:58:12', 0),
(146, 91, 44, '1', 'M', 800, 1000, '#000000', '20', '2020-09-08 12:58:12', '2020-09-08 12:58:12', 0),
(147, 91, 50, '1', 'M', 1000, 1000, '#000000', '0', '2020-09-08 12:58:12', '2020-09-08 12:58:12', 0),
(148, 92, 42, '3', 'L', 1440, 1600, '#e86721', '10', '2020-09-10 11:45:22', '2020-09-10 11:45:22', 0),
(149, 93, 34, '1', 'S', 3750, 5000, '#139a2a', '25', '2020-09-11 05:28:42', '2020-09-11 05:28:42', 0),
(150, 94, 43, '1', 'S', 1200, 1500, '#e60a0a', '5', '2020-09-11 05:31:04', '2020-09-11 05:31:04', 0),
(151, 95, 50, '1', 'S', 1000, 1000, '#000000', '0', '2020-09-18 14:51:55', '2020-09-18 14:51:55', 0),
(152, 95, 51, '2', 'L', 1200, 1500, '#85e0ff', '20', '2020-09-18 14:51:56', '2020-09-18 14:51:56', 0),
(153, 95, 51, '1', 'S', 1200, 1500, '#85e0ff', '20', '2020-09-18 14:51:56', '2020-09-18 14:51:56', 0),
(154, 96, 34, '2', 'M', 3750, 5000, '#139a2a', '25', '2020-09-18 15:11:21', '2020-09-18 15:11:21', 0),
(155, 96, 43, '2', 'S', 1200, 1500, '#e60a0a', '5', '2020-09-18 15:11:22', '2020-09-18 15:11:22', 0),
(156, 97, 33, '2', 'S', 800, 1500, '#f5f5f5', '47', '2020-09-18 16:05:28', '2020-09-18 16:05:28', 0),
(157, 97, 33, '1', 'M', 800, 1500, '#f5f5f5', '47', '2020-09-18 16:05:28', '2020-09-18 16:05:28', 0),
(158, 98, 50, '1', 'S', 900, 1000, '#000000', '10', '2020-09-18 19:42:25', '2020-09-18 19:42:25', 0),
(159, 99, 63, '2', 'S', 2250, 2500, '#e86721', '10', '2020-09-19 07:05:55', '2020-09-19 07:05:55', 0),
(160, 99, 52, '1', 'S', 1760, 2200, '#139a2a', '20', '2020-09-19 07:05:55', '2020-09-19 07:05:55', 0),
(161, 99, 60, '2', 'M', 2000, 2500, '#e60a0a', '20', '2020-09-19 07:05:55', '2020-09-19 07:05:55', 0),
(162, 99, 63, '2', 'M', 2250, 2500, '#e86721', '10', '2020-09-19 07:05:55', '2020-09-19 07:05:55', 0),
(163, 100, 30, '2', 'M', 270, 300, '#000000', '10', '2020-09-19 07:21:10', '2020-09-19 07:21:10', 0),
(164, 100, 33, '2', 'M', 800, 1500, '#f5f5f5', '47', '2020-09-19 07:21:10', '2020-09-19 07:21:10', 0),
(165, 100, 33, '2', 'L', 800, 1500, '#f5f5f5', '47', '2020-09-19 07:21:10', '2020-09-19 07:21:10', 0),
(166, 100, 35, '1', 'S', 3150, 4500, '#f5f5f5', '30', '2020-09-19 07:21:10', '2020-09-19 07:21:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_billing_address`
--

CREATE TABLE `order_billing_address` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_line_one` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_line_two` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_billing_address`
--

INSERT INTO `order_billing_address` (`id`, `order_id`, `name`, `last_name`, `company_name`, `phone_number`, `email`, `pincode`, `address_line_one`, `address_line_two`, `city`, `state`, `country`, `created_at`, `updated_at`) VALUES
(1, 63, 'Suresh', NULL, NULL, '8765432109', NULL, '776688', 'Ahmedabad, Gujarat, India', 'xcv', 'Ahmedabad', 'Gujarat', NULL, '2020-08-19 15:05:26', '2020-08-19 15:05:26'),
(2, 107, 'm', 'q', NULL, '2123432123', NULL, '1', 'q', NULL, 'qa', 'Assam', NULL, '2020-08-25 06:41:58', '2020-08-25 06:41:58'),
(3, 118, 'aaaa', 'aaaa', NULL, '9865326598', NULL, '986532', 'cc', 'ccc', 'ccc', 'Gujarat', NULL, '2020-08-27 10:42:39', '2020-08-27 10:42:39'),
(4, 133, 'bill name', 'dfdfdd', NULL, '9865326598', NULL, '986523', 'cfdf', 'dfdfdf', 'fdfd', 'billi state', NULL, '2020-08-27 18:42:25', '2020-08-27 18:42:25'),
(5, 162, 'bbb', 'bbb', NULL, '9865326598', NULL, '986532', 'bb', 'bbb', 'bbb', NULL, NULL, '2020-08-29 13:29:16', '2020-08-29 13:29:16'),
(6, 167, 'bf', 'bl', NULL, '9865326598', NULL, '9865326598', 'baaaaa', 'sdd', 'ddsds', NULL, NULL, '2020-08-29 14:18:57', '2020-08-29 14:18:57'),
(7, 168, 'dsdsdd', 'sdsds', 'ssss', '9865236598', NULL, '986532', 'ddddd', 'dddd', 'ddfdf', NULL, '17', '2020-08-29 14:22:24', '2020-08-29 14:22:24'),
(8, 169, 'fdffdf', 'df', 'fdff', '9865236598', NULL, '986532', 'fdffdd', 'fdf', 'dffd', NULL, 'India', '2020-08-29 14:26:18', '2020-08-29 14:26:18'),
(9, 170, 'fdfdf', 'ff', 'fdffdf', '9865236598', NULL, '986532', 'sdsds', 'sds', 'dsd', 'Tasmania', 'Australia', '2020-08-29 14:30:55', '2020-08-29 14:30:55'),
(10, 171, 'asasa', 'asasas', 'asasas', '8965326598', NULL, '895623', 'asa', 'sds', 'sddss', 'Goa', 'India', '2020-08-30 05:27:06', '2020-08-30 05:27:06'),
(11, 190, 'bbb', 'bbb', 'bbb', '9865236598', NULL, '896532', 'bbb', 'bbb', 'bb', 'Goa', 'India', '2020-09-02 11:45:52', '2020-09-02 11:45:52'),
(12, 199, 'dffddf', 'dfdfdf', 'dfdffdf', '9865326598', NULL, '986532', 'ffdfd', 'dffdfdfd', 'dfdfd', 'Shirak', 'Armenia', '2020-09-08 10:18:05', '2020-09-08 10:18:05'),
(13, 90, 'dfdfdf', 'dfdfd', 'dfdfd', '865236598', NULL, '986532', 'ddfd', 'fdfdf', 'dfdf', 'Daykondi', 'Afghanistan', '2020-09-08 10:32:35', '2020-09-08 10:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `heading_image` varchar(500) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 = inactive, 1 = active',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `heading_image`, `title`, `content`, `active`, `is_delete`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'colorful-fabrics-5872.jpg', 'Term & Condition', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec porttitor lectus. Morbi suscipit imperdiet egestas. Etiam sollicitudin velit vitae nibh lacinia sodales. Aenean fringilla odio eu venenatis maximus. Nullam porta, erat porta auctor malesuada, mi tortor blandit neque, at blandit leo nisl nec nibh. Mauris sed iaculis nulla. Nullam dictum nec nunc at molestie. Phasellus sollicitudin eu elit a convallis. Pellentesque pulvinar nec lectus eget consequat. Integer ullamcorper ipsum sem, id dignissim metus interdum non.</p>\r\n\r\n<p><strong>TEST TEST TEST TETS</strong></p>\r\n\r\n<p>Quisque condimentum pretium tempor. Suspendisse ornare molestie purus, id porta purus convallis nec. Duis sit amet ante ante. Quisque feugiat ornare magna eu efficitur. Integer ut est eu elit suscipit faucibus. In a volutpat sapien, in varius massa. Curabitur faucibus a lectus sed hendrerit. Curabitur volutpat quis metus sed maximus. Cras est tortor, convallis volutpat magna at, euismod interdum arcu. Nulla vel volutpat nisl. Duis et scelerisque neque. Sed non molestie eros, eu scelerisque nibh. Aliquam dapibus, lorem ac tincidunt feugiat, augue augue scelerisque lectus, ac scelerisque urna urna vel erat. Nulla a orci neque. Maecenas turpis est, mollis ullamcorper augue id, pharetra semper sem.</p>\r\n\r\n<p>Sed sit amet euismod ipsum. Ut ut tellus purus. Ut sollicitudin metus at posuere laoreet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas varius pulvinar porta. Etiam non ligula mi. Donec eget dui mollis, interdum risus non, tincidunt nisi. Vivamus et nunc at justo volutpat sodales nec in leo. Proin ac lorem hendrerit, vulputate nisl sit amet, varius eros.</p>\r\n\r\n<p>Suspendisse a lectus est. Donec consequat mauris sit amet accumsan finibus. Ut congue consequat auctor. Nunc a neque justo. Etiam interdum condimentum nunc, a sollicitudin mauris elementum sit amet. Mauris sit amet congue quam. Etiam ac molestie leo, id pellentesque nunc.</p>', 1, 0, NULL, '2020-07-01 16:57:07', '2020-07-01 16:57:07'),
(3, 'colorful-fabrics-5872.jpg', 'Return Policy', '<p>Term &amp; Condition Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec porttitor lectus. Morbi suscipit imperdiet egestas. Etiam sollicitudin velit vitae nibh lacinia sodales. Aenean fringilla odio eu venenatis maximus. Nullam porta, erat porta auctor malesuada, mi tortor blandit neque, at blandit leo nisl nec nibh. Mauris sed iaculis nulla. Nullam dictum nec nunc at molestie. Phasellus sollicitudin eu elit a convallis. Pellentesque pulvinar nec lectus eget consequat. Integer ullamcorper ipsum sem, id dignissim metus interdum non.</p>\r\n\r\n<p>Quisque condimentum pretium tempor. Suspendisse ornare molestie purus, id porta purus convallis nec. Duis sit amet ante ante. Quisque feugiat ornare magna eu efficitur. Integer ut est eu elit suscipit faucibus. In a volutpat sapien, in varius massa. Curabitur faucibus a lectus sed hendrerit. Curabitur volutpat quis metus sed maximus. Cras est tortor, convallis volutpat magna at, euismod interdum arcu. Nulla vel volutpat nisl. Duis et scelerisque neque. Sed non molestie eros, eu scelerisque nibh. Aliquam dapibus, lorem ac tincidunt feugiat, augue augue scelerisque lectus, ac scelerisque urna urna vel erat. Nulla a orci neque. Maecenas turpis est, mollis ullamcorper augue id, pharetra semper sem.</p>\r\n\r\n<p>Sed sit amet euismod ipsum. Ut ut tellus purus. Ut sollicitudin metus at posuere laoreet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas varius pulvinar porta. Etiam non ligula mi. Donec eget dui mollis, interdum risus non, tincidunt nisi. Vivamus et nunc at justo volutpat sodales nec in leo. Proin ac lorem hendrerit, vulputate nisl sit amet, varius eros.</p>\r\n\r\n<p>Suspendisse a lectus est. Donec consequat mauris sit amet accumsan finibus. Ut congue consequat auctor. Nunc a neque justo. Etiam interdum condimentum nunc, a sollicitudin mauris elementum sit amet. Mauris sit amet congue quam. Etiam ac molestie leo, id pellentesque nunc.</p>\r\n\r\n<ol>\r\n	<li>Suspendisse a lectus est. Donec consequat mauris sit amet accumsan finibus. Ut congue consequat auctor. Nunc a neque justo. Etiam interdum condimentum nunc, a sollicitudin mauris elementum sit amet. Mauris sit amet congue quam. Etiam ac molestie leo, id pellentesque nunc.</li>\r\n	<li>Suspendisse a lectus est. Donec consequat mauris sit amet accumsan finibus. Ut congue consequat auctor. Nunc a neque justo. Etiam interdum condimentum nunc, a sollicitudin mauris elementum sit amet. Mauris sit amet congue quam. Etiam ac molestie leo, id pellentesque nunc.</li>\r\n	<li>Suspendisse a lectus est. Donec consequat mauris sit amet accumsan finibus. Ut congue consequat auctor. Nunc a neque justo. Etiam interdum condimentum nunc, a sollicitudin mauris elementum sit amet. Mauris sit amet congue quam. Etiam ac molestie leo, id pellentesque nunc.</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 1, 0, NULL, '2020-06-27 16:38:18', '2020-06-27 16:38:18'),
(4, 'colorful-fabrics-5872.jpg', 'How to order', '<h1>How to order</h1>\r\n\r\n<h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec porttitor lectus. Morbi suscipit imperdiet egestas. Etiam sollicitudin velit vitae nibh lacinia sodales. Aenean fringilla odio eu venenatis maximus. Nullam porta, erat porta auctor malesuada, mi tortor blandit neque, at blandit leo nisl nec nibh. Mauris sed iaculis nulla. Nullam dictum nec nunc at molestie. Phasellus sollicitudin eu elit a convallis. Pellentesque pulvinar nec lectus eget consequat. Integer ullamcorper ipsum sem, id dignissim metus interdum non.</h2>\r\n\r\n<p>Quisque condimentum pretium tempor. Suspendisse ornare molestie purus, id porta purus convallis nec. Duis sit amet ante ante. Quisque feugiat ornare magna eu efficitur. Integer ut est eu elit suscipit faucibus. In a volutpat sapien, in varius massa. Curabitur faucibus a lectus sed hendrerit. Curabitur volutpat quis metus sed maximus. Cras est tortor, convallis volutpat magna at, euismod interdum arcu. Nulla vel volutpat nisl. Duis et scelerisque neque. Sed non molestie eros, eu scelerisque nibh. Aliquam dapibus, lorem ac tincidunt feugiat, augue augue scelerisque lectus, ac scelerisque urna urna vel erat. Nulla a orci neque. Maecenas turpis est, mollis ullamcorper augue id, pharetra semper sem.</p>\r\n\r\n<p>Sed sit amet euismod ipsum. Ut ut tellus purus. Ut sollicitudin metus at posuere laoreet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas varius pulvinar porta. Etiam non ligula mi. Donec eget dui mollis, interdum risus non, tincidunt nisi. Vivamus et nunc at justo volutpat sodales nec in leo. Proin ac lorem hendrerit, vulputate nisl sit amet, varius eros.</p>\r\n\r\n<p>Suspendisse a lectus est. Donec consequat mauris sit amet accumsan finibus. Ut congue consequat auctor. Nunc a neque justo. Etiam interdum condimentum nunc, a sollicitudin mauris elementum sit amet. Mauris sit amet congue quam. Etiam ac molestie leo, id pellentesque nunc.</p>', 1, 0, NULL, '2020-06-27 16:38:32', '2020-06-27 16:38:32'),
(5, 'colorful-fabrics-5872.jpg', 'How to track', '<h1><strong>How to track </strong></h1>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec porttitor lectus. Morbi suscipit imperdiet egestas. Etiam sollicitudin velit vitae nibh lacinia sodales. Aenean fringilla odio eu venenatis maximus. Nullam porta, erat porta auctor malesuada, mi tortor blandit neque, at blandit leo nisl nec nibh. Mauris sed iaculis nulla. Nullam dictum nec nunc at molestie. Phasellus sollicitudin eu elit a convallis. Pellentesque pulvinar nec lectus eget consequat. Integer ullamcorper ipsum sem, id dignissim metus interdum non.</p>\r\n\r\n<p>Quisque condimentum pretium tempor. Suspendisse ornare molestie purus, id porta purus convallis nec. Duis sit amet ante ante. Quisque feugiat ornare magna eu efficitur. Integer ut est eu elit suscipit faucibus. In a volutpat sapien, in varius massa. Curabitur faucibus a lectus sed hendrerit. Curabitur volutpat quis metus sed maximus. Cras est tortor, convallis volutpat magna at, euismod interdum arcu. Nulla vel volutpat nisl. Duis et scelerisque neque. Sed non molestie eros, eu scelerisque nibh. Aliquam dapibus, lorem ac tincidunt feugiat, augue augue scelerisque lectus, ac scelerisque urna urna vel erat. Nulla a orci neque. Maecenas turpis est, mollis ullamcorper augue id, pharetra semper sem.</p>\r\n\r\n<ol>\r\n	<li>Sed sit amet euismod ipsum. Ut ut tellus purus. Ut sollicitudin metus at posuere laoreet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas varius pulvinar porta. Etiam non ligula mi. Donec eget dui mollis, interdum risus non, tincidunt nisi. Vivamus et nunc at justo volutpat sodales nec in leo. Proin ac lorem hendrerit, vulputate nisl sit amet, varius eros.</li>\r\n	<li>Suspendisse a lectus est. Donec consequat mauris sit amet accumsan finibus. Ut congue consequat auctor. Nunc a neque justo. Etiam interdum condimentum nunc, a sollicitudin mauris elementum sit amet. Mauris sit amet congue quam. Etiam ac molestie leo, id pellentesque nunc.</li>\r\n</ol>', 1, 0, NULL, '2020-06-27 16:38:39', '2020-06-27 16:38:39'),
(6, 'colorful-fabrics-5872.jpg', 'Privacy Policy', '<p><strong>Privacy Policy&nbsp;</strong></p>\r\n\r\n<p>Quisque condimentum pretium tempor. Suspendisse ornare molestie purus, id porta purus convallis nec. Duis sit amet ante ante. Quisque feugiat ornare magna eu efficitur. Integer ut est eu elit suscipit faucibus. In a volutpat sapien, in varius massa. Curabitur faucibus a lectus sed hendrerit. Curabitur volutpat quis metus sed maximus. Cras est tortor, convallis volutpat magna at, euismod interdum arcu. Nulla vel volutpat nisl. Duis et scelerisque neque. Sed non molestie eros, eu scelerisque nibh. Aliquam dapibus, lorem ac tincidunt feugiat, augue augue scelerisque lectus, ac scelerisque urna urna vel erat. Nulla a orci neque. Maecenas turpis est, mollis ullamcorper augue id, pharetra semper sem.</p>\r\n\r\n<p>Sed sit amet euismod ipsum. Ut ut tellus purus. Ut sollicitudin metus at posuere laoreet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas varius pulvinar porta. Etiam non ligula mi. Donec eget dui mollis, interdum risus non, tincidunt nisi. Vivamus et nunc at justo volutpat sodales nec in leo. Proin ac lorem hendrerit, vulputate nisl sit amet, varius eros.</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.msn.com/en-in/news/other/army-rushes-more-troops-to-ladakh-after-galwan-clash/ar-BB15K2IP?ocid=spartan-ntp-feeds\" style=\"float:left\" />Suspendisse a lectus est. Donec consequat mauris sit amet accumsan finibus. Ut congue consequat auctor. Nunc a neque justo. Etiam interdum condimentum nunc, a sollicitudin mauris elementum sit amet. Mauris sit amet congue quam. Etiam ac molestie leo, id pellentesque nunc.</p>', 1, 0, NULL, '2020-06-29 07:34:46', '2020-06-29 07:34:46'),
(7, 'hero_bg.jpg', 'Fashion Blogger', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec porttitor lectus. Morbi suscipit imperdiet egestas. Etiam sollicitudin velit vitae nibh lacinia sodales. Aenean fringilla odio eu venenatis maximus. Nullam porta, erat porta auctor malesuada, mi tortor blandit neque, at blandit leo nisl nec nibh. Mauris sed iaculis nulla. Nullam dictum nec nunc at molestie. Phasellus sollicitudin eu elit a convallis. Pellentesque pulvinar nec lectus eget consequat. Integer ullamcorper ipsum sem, id dignissim metus interdum non.</p>\r\n\r\n<p>Quisque condimentum pretium tempor. Suspendisse ornare molestie purus, id porta purus convallis nec. Duis sit amet ante ante. Quisque feugiat ornare magna eu efficitur. Integer ut est eu elit suscipit faucibus. In a volutpat sapien, in varius massa. Curabitur faucibus a lectus sed hendrerit. Curabitur volutpat quis metus sed maximus. Cras est tortor, convallis volutpat magna at, euismod interdum arcu. Nulla vel volutpat nisl. Duis et scelerisque neque. Sed non molestie eros, eu scelerisque nibh. Aliquam dapibus, lorem ac tincidunt feugiat, augue augue scelerisque lectus, ac scelerisque urna urna vel erat. Nulla a orci neque. Maecenas turpis est, mollis ullamcorper augue id, pharetra semper sem.</p>\r\n\r\n<ul>\r\n	<li>Sed sit amet euismod ipsum. Ut ut tellus purus. Ut sollicitudin metus at posuere laoreet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas varius pulvinar porta. Etiam non ligula mi. Donec eget dui mollis, interdum risus non, tincidunt nisi. Vivamus et nunc at justo volutpat sodales nec in leo. Proin ac lorem hendrerit, vulputate nisl sit amet, varius eros.</li>\r\n	<li>Suspendisse a lectus est. Donec consequat mauris sit amet accumsan finibus. Ut congue consequat auctor. Nunc a neque justo. Etiam interdum condimentum nunc, a sollicitudin mauris elementum sit amet. Mauris sit amet congue quam. Etiam ac molestie leo, id pellentesque nunc.</li>\r\n</ul>', 1, 0, NULL, '2020-06-26 07:12:39', '2020-06-26 07:12:39'),
(8, 'colorful-fabrics-5872.jpg', 'Affiliate', '<ol>\r\n	<li><em><strong>Affiliate Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec porttitor lectus. Morbi suscipit imperdiet egestas. Etiam sollicitudin velit vitae nibh lacinia sodales. Aenean fringilla odio eu venenatis maximus. Nullam porta, erat porta auctor malesuada, mi tortor blandit neque, at blandit leo nisl nec nibh. Mauris sed iaculis nulla. Nullam dictum nec nunc at molestie. Phasellus sollicitudin eu elit a convallis. Pellentesque pulvinar nec lectus eget consequat. Integer ullamcorper ipsum sem, id dignissim metus interdum non.</strong></em></li>\r\n</ol>\r\n\r\n<p>Quisque condimentum pretium tempor. Suspendisse ornare molestie purus, id porta purus convallis nec. Duis sit amet ante ante. Quisque feugiat ornare magna eu efficitur. Integer ut est eu elit suscipit faucibus. In a volutpat sapien, in varius massa. Curabitur faucibus a lectus sed hendrerit. Curabitur volutpat quis metus sed maximus. Cras est tortor, convallis volutpat magna at, euismod interdum arcu. Nulla vel volutpat nisl. Duis et scelerisque neque. Sed non molestie eros, eu scelerisque nibh. Aliquam dapibus, lorem ac tincidunt feugiat, augue augue scelerisque lectus, ac scelerisque urna urna vel erat. Nulla a orci neque. Maecenas turpis est, mollis ullamcorper augue id, pharetra semper sem.</p>\r\n\r\n<p>Sed sit amet euismod ipsum. Ut ut tellus purus. Ut sollicitudin metus at posuere laoreet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas varius pulvinar porta. Etiam non ligula mi. Donec eget dui mollis, interdum risus non, tincidunt nisi. Vivamus et nunc at justo volutpat sodales nec in leo. Proin ac lorem hendrerit, vulputate nisl sit amet, varius eros.</p>\r\n\r\n<p>Suspendisse a lectus est. Donec consequat mauris sit amet accumsan finibus. Ut congue consequat auctor. Nunc a neque justo. Etiam interdum condimentum nunc, a sollicitudin mauris elementum sit amet. Mauris sit amet congue quam. Etiam ac molestie leo, id pellentesque nunc.</p>\r\n\r\n<p>Sed sit amet euismod ipsum. Ut ut tellus purus. Ut sollicitudin metus at posuere laoreet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas varius pulvinar porta. Etiam non ligula mi. Donec eget dui mollis, interdum risus non, tincidunt nisi. Vivamus et nunc at justo volutpat sodales nec in leo. Proin ac lorem hendrerit, vulputate nisl sit amet, varius eros.</p>\r\n\r\n<p>Suspendisse a lectus est. Donec consequat mauris sit amet accumsan finibus. Ut congue consequat auctor. Nunc a neque justo. Etiam interdum condimentum nunc, a sollicitudin mauris elementum sit amet. Mauris sit amet congue quam. Etiam ac molestie leo, id pellentesque nunc.</p>\r\n\r\n<ol>\r\n	<li>Suspendisse a lectus est. Donec consequat mauris sit amet accumsan finibus.</li>\r\n	<li>Ut congue consequat auctor. Nunc a neque justo.</li>\r\n	<li>Etiam interdum condimentum nunc, a sollicitudin mauris elementum sit amet.</li>\r\n	<li>Mauris sit amet congue quam. Etiam ac molestie leo, id pellentesque nunc.</li>\r\n</ol>\r\n\r\n<p>Sed sit amet euismod ipsum. Ut ut tellus purus. Ut sollicitudin metus at posuere laoreet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas varius pulvinar porta. Etiam non ligula mi. Donec eget dui mollis, interdum risus non, tincidunt nisi. Vivamus et nunc at justo volutpat sodales nec in leo. Proin ac lorem hendrerit, vulputate nisl sit amet, varius eros.</p>', 1, 0, NULL, '2020-06-27 16:37:36', '2020-06-27 16:37:36'),
(9, 'colorful-fabrics-5872.jpg', 'Shipping Info', '<p>Quisque condimentum pretium tempor. Suspendisse ornare molestie purus, id porta purus convallis nec. Duis sit amet ante ante. Quisque feugiat ornare magna eu efficitur. Integer ut est eu elit suscipit faucibus. In a volutpat sapien, in varius massa. Curabitur faucibus a lectus sed hendrerit. Curabitur volutpat quis metus sed maximus. Cras est tortor, convallis volutpat magna at, euismod interdum arcu. Nulla vel volutpat nisl. Duis et scelerisque neque. Sed non molestie eros, eu scelerisque nibh. Aliquam dapibus, lorem ac tincidunt feugiat, augue augue scelerisque lectus, ac scelerisque urna urna vel erat. Nulla a orci neque. Maecenas turpis est, mollis ullamcorper augue id, pharetra semper sem.</p>\r\n\r\n<p>Sed sit amet euismod ipsum. Ut ut tellus purus. Ut sollicitudin metus at posuere laoreet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas varius pulvinar porta. Etiam non ligula mi. Donec eget dui mollis, interdum risus non, tincidunt nisi. Vivamus et nunc at justo volutpat sodales nec in leo. Proin ac lorem hendrerit, vulputate nisl sit amet, varius eros.</p>\r\n\r\n<p>Suspendisse a lectus est. Donec consequat mauris sit amet accumsan finibus. Ut congue consequat auctor. Nunc a neque justo. Etiam interdum condimentum nunc, a sollicitudin mauris elementum sit amet. Mauris sit amet congue quam. Etiam ac molestie leo, id pellentesque nunc.</p>\r\n\r\n<p>Sed sit amet euismod ipsum. Ut ut tellus purus. Ut sollicitudin metus at posuere laoreet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas varius pulvinar porta. Etiam non ligula mi. Donec eget dui mollis, interdum risus non, tincidunt nisi. Vivamus et nunc at justo volutpat sodales nec in leo. Proin ac lorem hendrerit, vulputate nisl sit amet, varius eros.</p>\r\n\r\n<p>Suspendisse a lectus est. Donec consequat mauris sit amet accumsan finibus. Ut congue consequat auctor. Nunc a neque justo. Etiam interdum condimentum nunc, a sollicitudin mauris elementum sit amet. Mauris sit amet congue quam. Etiam ac molestie leo, id pellentesque nunc.</p>\r\n\r\n<ol>\r\n	<li>Suspendisse a lectus est. Donec consequat mauris sit amet accumsan finibus.</li>\r\n	<li>Ut congue consequat auctor. Nunc a neque justo.</li>\r\n	<li>Etiam interdum condimentum nunc, a sollicitudin mauris elementum sit amet.</li>\r\n	<li>Mauris sit amet congue quam. Etiam ac molestie leo, id pellentesque nunc.</li>\r\n</ol>\r\n\r\n<p>Sed sit amet euismod ipsum. Ut ut tellus purus. Ut sollicitudin metus at posuere laoreet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas varius pulvinar porta. Etiam non ligula mi. Donec eget dui mollis, interdum risus non, tincidunt nisi. Vivamus et nunc at justo volutpat sodales nec in leo. Proin ac lorem hendrerit, vulputate nisl sit amet, varius eros.</p>', 1, 0, NULL, '2020-06-27 16:38:01', '2020-06-27 16:38:01');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymenthistory`
--

CREATE TABLE `paymenthistory` (
  `id` int(225) NOT NULL,
  `user_id` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_id` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `order_id` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `isGuest` int(11) NOT NULL DEFAULT '0',
  `status` int(225) NOT NULL DEFAULT '0' COMMENT '0 =  Failed    1= Success',
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paymenthistory`
--

INSERT INTO `paymenthistory` (`id`, `user_id`, `payment_id`, `order_id`, `isGuest`, `status`, `created_at`, `updated_at`) VALUES
(1, '142', 'pay_FJUk59XgJ1AkKV', '997774', 0, 1, '2020-07-27 11:00:27.000000', '2020-07-27 11:00:27.000000'),
(2, '142', 'pay_FJW1ngJRj80h7d', '180313', 0, 1, '2020-07-27 12:12:36.000000', '2020-07-27 12:12:36.000000'),
(3, '142', 'pay_FJWFz0oahd9Wle', '496749', 0, 1, '2020-07-27 12:26:06.000000', '2020-07-27 12:26:06.000000'),
(4, '142', 'pay_FJWICbapdh9Qkb', '295081', 0, 1, '2020-07-27 12:28:09.000000', '2020-07-27 12:28:09.000000'),
(5, '142', 'pay_FJWLA99w02maq5', '190090', 0, 1, '2020-07-27 12:30:58.000000', '2020-07-27 12:30:58.000000'),
(6, '142', 'pay_FJWRTPqgrVVrKe', '603740', 0, 1, '2020-07-27 12:36:59.000000', '2020-07-27 12:36:59.000000'),
(7, '142', 'pay_FJnbLj6UyWKHnl', '468441', 0, 1, '2020-07-28 05:24:03.000000', '2020-07-28 05:24:03.000000'),
(8, '142', 'pay_FJpdfgJHDzvMH0', '208546', 0, 1, '2020-07-28 07:23:38.000000', '2020-07-28 07:23:38.000000'),
(9, '142', 'pay_FJq05Cvo7jz3Kb', '727251', 0, 1, '2020-07-28 07:44:54.000000', '2020-07-28 07:44:54.000000'),
(10, '142', 'pay_FJrqVuGregtQze', '568274', 0, 1, '2020-07-28 09:33:11.000000', '2020-07-28 09:33:11.000000'),
(11, NULL, 'pay_FKCTelZkZTJqIz', '98', 0, 1, '2020-07-29 05:44:44.000000', '2020-07-29 05:44:44.000000'),
(12, NULL, 'pay_FKHorgriYF8Pzs', '100', 0, 1, '2020-07-29 10:57:40.000000', '2020-07-29 10:57:40.000000'),
(13, '142', 'pay_FKJKjBXwTPhnUm', '101', 0, 1, '2020-07-29 12:26:32.000000', '2020-07-29 12:26:32.000000'),
(14, '1', 'pay_FKdBUI9BSP3zAy', '102', 0, 1, '2020-07-30 07:52:14.000000', '2020-07-30 07:52:14.000000'),
(15, '1', 'pay_FKdPA6Po6H0bZq', '103', 0, 1, '2020-07-30 08:04:35.000000', '2020-07-30 08:04:35.000000'),
(16, '149', 'pay_FKdToXHfMsYHvB', '104', 0, 1, '2020-07-30 08:09:00.000000', '2020-07-30 08:09:00.000000'),
(17, '149', 'pay_FKfSV5BN6du0im', '105', 0, 1, '2020-07-30 10:05:11.000000', '2020-07-30 10:05:11.000000'),
(18, '149', 'pay_FKjtL6AfLB1F1J', '106', 0, 1, '2020-07-30 14:25:20.000000', '2020-07-30 14:25:20.000000'),
(19, '137', 'pay_FL2i8PeXoPY8ej', '107', 0, 1, '2020-07-31 08:50:11.000000', '2020-07-31 08:50:11.000000'),
(20, '81', 'pay_FL5XgG1xJynzZh', '108', 0, 1, '2020-07-31 11:36:05.000000', '2020-07-31 11:36:05.000000'),
(21, '1', 'pay_FL6eOQ9yGiKRIK', '109', 0, 1, '2020-07-31 12:41:09.000000', '2020-07-31 12:41:09.000000'),
(22, '81', 'pay_FL7HO0nxbDZNYf', '110', 0, 1, '2020-07-31 13:18:04.000000', '2020-07-31 13:18:04.000000'),
(23, '142', 'pay_FL7NAsdUPEUU3I', '111', 0, 1, '2020-07-31 13:23:30.000000', '2020-07-31 13:23:30.000000'),
(24, '142', 'pay_FL7O1TWwcqeK1h', '112', 0, 1, '2020-07-31 13:24:18.000000', '2020-07-31 13:24:18.000000'),
(25, '142', 'pay_FL7PKkq5yltRiu', '113', 0, 1, '2020-07-31 13:25:32.000000', '2020-07-31 13:25:32.000000'),
(26, '142', 'pay_FL7RwVhIWO4xxS', '114', 0, 1, '2020-07-31 13:28:02.000000', '2020-07-31 13:28:02.000000'),
(27, '142', 'pay_FL7bhzcJahUFtr', '115', 0, 1, '2020-07-31 13:37:17.000000', '2020-07-31 13:37:17.000000'),
(28, '142', 'pay_FL7dDjBbxCs3FT', '116', 0, 1, '2020-07-31 13:38:43.000000', '2020-07-31 13:38:43.000000'),
(29, '1', 'pay_FL7j4HDQkhTKTA', '117', 0, 1, '2020-07-31 13:44:15.000000', '2020-07-31 13:44:15.000000'),
(30, '1', 'pay_FLMxROxlT3xDwT', '118', 0, 1, '2020-08-01 04:38:15.000000', '2020-08-01 04:38:15.000000'),
(31, '1', 'pay_FLN2qS6JyrwdIB', '119', 0, 1, '2020-08-01 04:43:22.000000', '2020-08-01 04:43:22.000000'),
(32, '142', 'pay_FLN3jcEWAI7g2B', '120', 0, 1, '2020-08-01 04:44:12.000000', '2020-08-01 04:44:12.000000'),
(33, '142', 'pay_FLN9kWfHw1lIaG', '121', 0, 1, '2020-08-01 04:49:54.000000', '2020-08-01 04:49:54.000000'),
(34, '1', 'pay_FLVFZTJTNaj4Vc', '122', 0, 1, '2020-08-01 12:44:58.000000', '2020-08-01 12:44:58.000000'),
(35, '1', 'pay_FLYxSZmuMZmaaG', '62', 0, 1, '2020-08-01 16:32:33.000000', '2020-08-01 16:32:33.000000'),
(36, '1', 'pay_FLZ8wkNegpqQgM', '63', 0, 1, '2020-08-01 16:33:27.000000', '2020-08-01 16:33:27.000000'),
(37, '149', 'pay_FMbJy0z00cwvbs', '64', 0, 1, '2020-08-04 07:20:23.000000', '2020-08-04 07:20:23.000000'),
(38, '142', 'pay_FMbMmQWYjjqnSc', '65', 0, 1, '2020-08-04 07:22:58.000000', '2020-08-04 07:22:58.000000'),
(39, '1', 'pay_FMbSzpXUZepB74', '66', 0, 1, '2020-08-04 07:28:50.000000', '2020-08-04 07:28:50.000000'),
(40, '149', 'pay_FMbXGf4GthA40B', '67', 0, 1, '2020-08-04 07:32:52.000000', '2020-08-04 07:32:52.000000'),
(41, '149', 'pay_FMbZfZwP1HIKp9', '68', 0, 1, '2020-08-04 07:35:08.000000', '2020-08-04 07:35:08.000000'),
(42, '136', 'pay_FQIVWPp1GsegA5', '69', 0, 1, '2020-08-13 15:32:05.000000', '2020-08-13 15:32:05.000000'),
(43, '100', 'pay_FR2yPteWBIEJSW', '70', 0, 1, '2020-08-15 12:59:19.000000', '2020-08-15 12:59:19.000000'),
(44, '1', 'pay_FSVpIjAewIXj7k', '71', 0, 1, '2020-08-19 05:51:50.000000', '2020-08-19 05:51:50.000000'),
(45, '1', 'pay_FSWV2Cd2SbVG4i', '72', 0, 1, '2020-08-19 06:31:23.000000', '2020-08-19 06:31:23.000000'),
(46, '1', 'pay_FSX90p3O2oskLt', '73', 0, 1, '2020-08-19 07:09:10.000000', '2020-08-19 07:09:10.000000'),
(47, '81', 'pay_FSXBjVcLCVV6xP', '74', 0, 1, '2020-08-19 07:11:48.000000', '2020-08-19 07:11:48.000000'),
(48, '1', 'pay_FSXJmvq4ovX4hW', '75', 0, 1, '2020-08-19 07:19:25.000000', '2020-08-19 07:19:25.000000'),
(49, '149', 'pay_FSfggsTHmDdVah', '76', 0, 1, '2020-08-19 15:30:55.000000', '2020-08-19 15:30:55.000000'),
(50, '149', 'pay_FSgFxUjsy6ovSc', '77', 0, 1, '2020-08-19 16:03:58.000000', '2020-08-19 16:03:58.000000'),
(51, '154', 'pay_FXp8GK522rIlKz', '78', 0, 1, '2020-09-01 15:59:56.000000', '2020-09-01 15:59:56.000000'),
(52, '100', 'pay_FXpFPJgSssK7oU', '79', 0, 1, '2020-09-01 16:06:43.000000', '2020-09-01 16:06:43.000000'),
(53, '158', 'pay_Fa5gkLOIRmSDBf', '82', 0, 1, '2020-09-07 09:29:42.000000', '2020-09-07 09:29:42.000000'),
(54, '81', 'pay_Fa5rfH64d5laiW', '83', 0, 1, '2020-09-07 09:40:03.000000', '2020-09-07 09:40:03.000000'),
(55, '81', 'pay_Fa8NMyKGtXPj7Z', '84', 0, 1, '2020-09-07 12:07:26.000000', '2020-09-07 12:07:26.000000'),
(56, '81', 'pay_Fa8hq1Kf8FDouU', '85', 0, 1, '2020-09-07 12:26:48.000000', '2020-09-07 12:26:48.000000'),
(57, '159', 'pay_Fa9lRHX3dXrjj7', '86', 0, 1, '2020-09-07 13:28:56.000000', '2020-09-07 13:28:56.000000'),
(58, '81', 'pay_FaQlJ39EouzwWP', '87', 0, 1, '2020-09-08 06:06:36.000000', '2020-09-08 06:06:36.000000'),
(59, '100', 'pay_FaVI3YJKIqAKJW', '90', 0, 1, '2020-09-08 10:32:35.000000', '2020-09-08 10:32:35.000000'),
(60, '81', 'pay_FaXm5QmkcCf4Gh', '91', 0, 1, '2020-09-08 12:58:12.000000', '2020-09-08 12:58:12.000000'),
(61, '149', 'pay_FbJbRiWRcGDvdA', '92', 0, 1, '2020-09-10 11:45:22.000000', '2020-09-10 11:45:22.000000'),
(62, '164', 'pay_FbbifPyLsN4zaG', '93', 0, 1, '2020-09-11 05:28:42.000000', '2020-09-11 05:28:42.000000'),
(63, '165', 'pay_FbblBBDyo4Et5L', '94', 0, 1, '2020-09-11 05:31:04.000000', '2020-09-11 05:31:04.000000'),
(64, '81', 'pay_FeX3RC6bNYbOlJ', '95', 0, 1, '2020-09-18 14:51:55.000000', '2020-09-18 14:51:55.000000'),
(65, '81', 'pay_FeXNytx5wT7tiU', '96', 0, 1, '2020-09-18 15:11:21.000000', '2020-09-18 15:11:21.000000'),
(66, '81', 'pay_FeYJ7ssuCxRqv5', '97', 0, 1, '2020-09-18 16:05:28.000000', '2020-09-18 16:05:28.000000'),
(67, '136', 'pay_Fec0LOFFHObwiA', '98', 0, 1, '2020-09-18 19:42:25.000000', '2020-09-18 19:42:25.000000'),
(68, '81', 'pay_FeneGx7pSYmHyu', '99', 0, 1, '2020-09-19 07:05:55.000000', '2020-09-19 07:05:55.000000'),
(69, '169', 'pay_FenuPbKR1tbpZH', '100', 0, 1, '2020-09-19 07:21:10.000000', '2020-09-19 07:21:10.000000');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `name` varchar(225) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `description` text,
  `slider_image` varchar(500) DEFAULT NULL,
  `image` varchar(225) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `mrp` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `gst` decimal(10,2) NOT NULL DEFAULT '0.00',
  `gstper` int(11) NOT NULL DEFAULT '5',
  `sku` varchar(255) DEFAULT NULL,
  `barcode` varchar(100) DEFAULT NULL,
  `highlight` int(11) NOT NULL DEFAULT '1',
  `is_featured` tinyint(4) DEFAULT '0',
  `is_trending` tinyint(4) NOT NULL DEFAULT '1',
  `is_new_arrival` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `color_id`, `name`, `sub_title`, `short_description`, `description`, `slider_image`, `image`, `price`, `mrp`, `discount`, `gst`, `gstper`, `sku`, `barcode`, `highlight`, `is_featured`, `is_trending`, `is_new_arrival`, `is_deleted`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 14, 6, 4, 'Kurti', 'test1 ksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnn', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.', '<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.</p>', 'offer-banner-desktop.PNG', '15929800238.jpg', 500, 100, 10, '0.00', 5, '#123', NULL, 1, 0, 1, 0, 1, 0, '2020-05-30 19:52:10', '2020-07-01 10:13:57', NULL),
(2, 3, 12, 2, 'Long Dress', NULL, 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.', '<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.2</p>', 'banner.png', 'img-product7.png', 80, 100, 20, '0.00', 5, '#123', NULL, 1, 0, 0, 1, 1, 1, '2020-05-30 19:52:10', '2020-07-01 10:14:06', NULL),
(3, 3, 4, 5, 'Pink Dress', NULL, 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.', '<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.3</p>', 'offer-banner-desktop.PNG', 'Shop Kurta Sets.png', 70, 30, 30, '0.00', 5, '#6789', NULL, 1, 1, 0, 1, 1, 0, '2020-05-30 19:54:47', '2020-07-01 10:14:16', NULL),
(4, 2, 4, 1, 'Kurta pajama set', 'This is great', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.', '<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.</p>', NULL, 'A10I5725 copy.jpg', 275, 500, 45, '0.00', 5, '#123', NULL, 1, 1, 0, 1, 1, 1, '2020-05-30 20:02:36', '2020-07-01 10:15:01', NULL),
(5, 2, 3, 5, 'Kurta 7', 'test1 ksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnn', 'ksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnnksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnnksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnn', '<p>ksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnnksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnnksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnnksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnnksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnnksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnnksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnnksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnnksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnnksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnnksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnn</p>', NULL, 'Shop Kurta Sets.png', 1000, 1100, 10, '0.00', 5, '#123', NULL, 1, 0, 1, 1, 1, 1, '2020-06-01 15:04:12', '2020-07-01 10:13:20', NULL),
(6, 3, 3, 1, 'Kurti 8', NULL, NULL, NULL, NULL, 'A10I5915 copy.jpg', 100, 90, 10, '0.00', 5, '#123', NULL, 1, 1, 1, 1, 1, 1, '2020-06-01 15:04:12', '2020-07-01 10:17:25', NULL),
(7, 28, 17, 5, 'Kurti 1', 'test1 ksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnn', 'ksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnnksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnnksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnn', NULL, NULL, 'pobox_1_black.jpg', 90, 100, 10, '0.00', 5, '#56778', NULL, 1, 0, 1, 1, 1, 1, '2020-06-01 15:05:49', '2020-07-01 10:13:45', NULL),
(8, 2, 4, 1, 'kurta 12', NULL, NULL, NULL, 'banner.png', 'pobox_1_black.jpg', 80, 90, 10, '0.00', 5, NULL, NULL, 1, 1, 0, 1, 1, 0, '2020-06-01 15:05:49', NULL, NULL),
(9, 2, 1, NULL, 'kurta 13', NULL, NULL, NULL, NULL, 'kurta_1.jpg', 90, 100, 10, '0.00', 5, NULL, NULL, 1, 0, 0, 1, 1, 0, '2020-06-01 15:07:24', '2020-06-09 12:45:31', NULL),
(10, 3, 3, 4, 'Orange dress', NULL, 'This two-piece kurta set in blazing orange is made from supreme quality of cotton. The straight checkered design on the....', '<p>This two-piece kurta set in blazing orange is made from supreme quality of cotton. The straight checkered design on the....This two-piece kurta set in blazing orange is made from supreme quality of cotton. The straight checkered design on the....</p>', NULL, 'pobox_5_black.jpg', 2599, 2699, 10, '0.00', 5, '#6789', NULL, 1, 0, 0, 1, 1, 1, '2020-06-09 12:04:10', '2020-07-01 10:17:33', NULL),
(11, 2, 3, 9, 'Blaze Cotton Kurta', NULL, 'This two-piece kurta set in blazing orange is made from supreme quality of cotton. The straight checkered design on the....', '<p>This two-piece kurta set in blazing orange is made from supreme quality of cotton. The straight checkered design on the....This two-piece kurta set in blazing orange is made from supreme quality of cotton. The straight checkered design on the....</p>', NULL, 'pobox_5_black.jpg', 2599, 2699, 10, '0.00', 5, '#6789', NULL, 1, 0, 1, 1, 1, 0, '2020-06-09 12:04:38', '2020-07-01 10:13:32', NULL),
(12, 2, 3, NULL, 'Blaze Orange Plain Polly Cotton Straight Kurta Set', NULL, 'This two-piece kurta set in blazing orange is made from supreme quality of cotton. The straight checkered design on the....', '<p>This two-piece kurta set in blazing orange is made from supreme quality of cotton. The straight checkered design on the....This two-piece kurta set in blazing orange is made from supreme quality of cotton. The straight checkered design on the....</p>', NULL, 'pobox_1_black.jpg', 2599, 2699, 10, '0.00', 5, '#6789', NULL, 1, 0, 1, 1, 1, 1, '2020-06-09 12:05:12', '2020-06-15 12:14:10', NULL),
(13, 3, 7, 5, 'Test', NULL, 'hlhklk', '<p>khlh ;jl;j lkhkh</p>', NULL, 'pobox_5_black.jpg', 2000, 2300, 15, '0.00', 5, '#5678', NULL, 1, 0, 0, 1, 1, 1, '2020-06-11 11:02:04', '2020-06-11 13:53:55', NULL),
(14, 2, 4, 4, 'Long kuta', 'shade in orange', 'good color', '<p>Test</p>\r\n\r\n<ol>\r\n	<li>test <strong>color </strong>good text LONG descriptiontfdl</li>\r\n	<li>&nbsp;text text</li>\r\n	<li><strong>color </strong>good text LONG descriptiontfdl</li>\r\n	<li>\r\n	<h1>&nbsp;text text</h1>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', NULL, '159248017412.jpg', 100, 900, 10, '0.00', 5, '67677', NULL, 1, 0, 1, 1, 1, 0, '2020-06-12 07:28:43', '2020-07-01 10:17:40', NULL),
(15, 1, 4, 4, 'Tunics', 'subtunics', 'Test', '<p>Test now test</p>\r\n\r\n<p>admin</p>\r\n\r\n<p>test</p>', NULL, 'mytri-women-27s-mustard-jacquard-design-angrakha-kurta-500x500.jpg', 700, 900, 22, '0.00', 5, '7689', NULL, 1, 0, 0, 0, 1, 1, '2020-06-15 09:05:45', '2020-07-09 06:50:33', NULL),
(16, 28, 17, 3, 'sarees', NULL, 'test', '<p>kljkl sdf;ldjl</p>', NULL, '159316588413.jpg', 1300, 1500, 13, '0.00', 5, '#67898', NULL, 1, 1, 1, 1, 1, 0, '2020-06-15 10:38:32', '2020-07-01 10:17:54', NULL),
(17, 2, 5, 1, 'Cotton Kurta', 'kurti', 'indian kurti', '<p>test</p>\r\n\r\n<p><strong>test</strong></p>\r\n\r\n<p><strong>1234</strong></p>\r\n\r\n<p><strong>test</strong></p>', NULL, '159301569915.jpg', 500, 1500, 67, '0.00', 5, '134', NULL, 1, 0, 0, 1, 1, 0, '2020-06-15 12:05:05', '2020-07-01 10:18:02', NULL),
(18, 2, 3, 1, 'black kurta', 'black', 'Black Kkkkk', '<p>Test</p>\r\n\r\n<p>da;sd;lasl;asd</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>dmsal;m;samdl;masd</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>daslm;asmdl;asm</p>', NULL, 'A10I5695 copy.jpg', 10, 1000, 99, '0.00', 5, '19009', NULL, 1, 0, 0, 1, 1, 1, '2020-06-15 12:39:54', '2020-06-17 16:07:05', NULL),
(19, 1, 3, 1, 'Black Kurti', 'Test', 'ndksanlknsakdnksankl', '<p>skndlksanasnnsa</p>\r\n\r\n<p>ndlkasnlasnknasnasn</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>dnaslkndlsannas</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>dnkalsnlksanlknsa</p>', NULL, 'pobox_5_black.jpg', 450, 500, 10, '0.00', 5, '12456', NULL, 1, 0, 0, 1, 1, 1, '2020-06-17 07:31:08', '2020-07-04 04:53:02', NULL),
(20, 2, 3, 14, 'Test2', 'testing222', 'andksakd;lsamdl;msal;dmsal', '<p>skadnklansdkn</p>\r\n\r\n<p>dasd;kas&#39;;kd&#39;ask</p>\r\n\r\n<p>d;lasmd;lma</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>dnkslaldnlskandknas</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>dnklalsnlkasnd</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>dkasndlkasndklnas</p>', NULL, 'pobox_5_black.jpg', 1000, 1250, 20, '0.00', 5, '1234', NULL, 1, 0, 0, 1, 1, 1, '2020-06-17 07:46:11', '2020-06-17 16:01:10', NULL),
(21, 1, 3, 10, 'kurti', 'Testing33', 'dksandknskadnlaksndknaslkn', '<p>ksnakldnakslndknas</p>\r\n\r\n<p>dklsanklasndklasndkasnkas</p>\r\n\r\n<p>nldklasnlkdnaskldnkslandklsndkas</p>\r\n\r\n<p>dnaslknlksnadknsakdnasndlksanlkdnasnd</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>kldasndlkanslkdnasndlkasnda</p>', NULL, '159422988615.jpg', 1200, 1500, 20, '0.00', 5, '123', NULL, 1, 0, 0, 1, 0, 0, '2020-06-17 07:54:25', '2020-09-18 16:45:58', NULL),
(22, 3, 5, 18, 'Neon Dress', 'Perfect for all occasion', 'Can be used for marathon', '<p>Marathon Dress</p>', NULL, '15925696868.png', 995, 1020, 2, '0.00', 5, 'nion995', NULL, 1, 1, 1, 1, 1, 0, '2020-06-17 17:06:38', '2020-07-01 10:18:13', NULL),
(23, 2, 3, 1, 'Maria', 't', 'test', '<p>test</p>', NULL, '159283219415.jpg', 10, 2000, 100, '0.00', 5, 'test', NULL, 1, 0, 0, 0, 1, 1, '2020-06-22 13:23:14', '2020-06-22 13:23:20', NULL),
(24, 14, 3, 5, 'indo kurti', 'dsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 'test test test test te ts jkdsjkdgbsjdbskbskjfskfskdnsgauegdakda\r\nadjsgdsjsjbsbdsjgfhbsdbs test teef ewvds dsjdbsjfg fg \r\ndjsugfjsbfndbfndsbf dsbf ds dvshfvhdfvdf', '<p>test</p>', NULL, '15929219615.jpg', 4000, 5800, 31, '200.00', 5, 'test', NULL, 1, 0, 0, 0, 1, 0, '2020-06-23 14:19:21', '2020-07-01 10:18:21', NULL),
(25, 2, 3, 2, 'Anarkali Kurti', 'New yesy', 'klhlk', '<p>lhjkshf</p>', NULL, '159292870415.jpg', 2399, 2599, 8, '119.95', 5, '#7890', NULL, 1, 0, 1, 1, 1, 0, '2020-06-23 16:11:44', '2020-07-01 10:18:27', NULL),
(26, 14, 4, 4, 'test', 'test', 'test', '<p>Test</p>', NULL, '15929793378.jpg', 433, 433, 0, '21.65', 5, 'test', NULL, 1, 1, 0, 0, 1, 0, '2020-06-24 06:15:37', '2020-07-01 10:18:34', NULL),
(27, 3, 3, 4, 'dress', 'indian dress', 'Black art silk salwar suit with embroidered floral patterns on the kameez.Comes with matching black bottom and dupatta.This product consists of semistitched top', '<p>Black art silk salwar suit with embroidered floral patterns on the kameez.Comes with matching black bottom and dupatta.</p>\r\n\r\n<ul>\r\n	<li><em>This product consists of semistitched top,&nbsp;</em>\r\n\r\n	<p>Black art silk salwar suit with embroidered floral patterns on the kameez.Comes with matching black bottom and dupatta.</p>\r\n	</li>\r\n	<li><em>This product consists of semistitched top,&nbsp;</em>\r\n	<p>Black art silk salwar suit with embroidered floral patterns on the kameez.Comes with matching black bottom and dupatta.</p>\r\n	</li>\r\n	<li><em>This product consists of semistitched top,&nbsp;</em></li>\r\n</ul>', NULL, '159300320214.jpeg', 4500, 6000, 25, '225.00', 5, 'test', NULL, 1, 0, 1, 0, 1, 0, '2020-06-24 12:53:22', '2020-07-01 10:18:40', NULL),
(28, 29, 6, 4, 'Western top', 'western top sutitle', 'Only Rs.379.0, Buy Jaipur Vastra Womens/girls Rayon Printed Western Top (grey) at Club Factory Online. Free Shipping. Test', '<p>Only Rs.379.0, Buy Jaipur Vastra Womens/girls Rayon Printed Western Top (grey) at Club Factory Online. Free Shipping. test test test dummy</p>\r\n\r\n<p>Only Rs.379.0, Buy Jaipur Vastra Womens/girls Rayon Printed Western Top (grey) at Club Factory Online. Free Shipping.</p>\r\n\r\n<p>Only Rs.379.0, Buy Jaipur Vastra Womens/girls Rayon Printed Western Top (grey) at Club Factory Online. Free Shipping.</p>\r\n\r\n<p>Only Rs.379.0, Buy Jaipur Vastra Womens/girls Rayon Printed Western Top (grey) at Club Factory Online. Free Shipping.</p>\r\n\r\n<p>Only Rs.379.0, Buy Jaipur Vastra Womens/girls Rayon Printed Western Top (grey) at Club Factory Online. Free Shipping.</p>\r\n\r\n<p>Only Rs.379.0, Buy Jaipur Vastra Womens/girls Rayon Printed Western Top (grey) at Club Factory Online. Free Shipping.</p>\r\n\r\n<p>Only Rs.379.0, Buy Jaipur Vastra Womens/girls Rayon Printed Western Top (grey) at Club Factory Online. Free Shipping.</p>\r\n\r\n<p>Material : Handloom Cotton, Color : Blue, Pattern : Embroidered<br />\r\nNeck Type : Round Neck, Item Length : Calf Length<br />\r\nPackage Contents : 1 Straight Kurti and 1 Printed Palazzo<br />\r\nOccasion : Party Wear, Sleeves : 3/4 Sleeve<br />\r\nDisclaimer : Slight Color Variation is possible due to photographic effect &amp; printing limitations.</p>\r\n\r\n<p>Material : Handloom Cotton, Color : Blue, Pattern : Embroidered<br />\r\nNeck Type : Round Neck, Item Length : Calf Length<br />\r\nPackage Contents : 1 Straight Kurti and 1 Printed Palazzo<br />\r\nOccasion : Party Wear, Sleeves : 3/4 Sleeve<br />\r\nDisclaimer : Slight Color Variation is possible due to photographic effect &amp; printing limitations.</p>\r\n\r\n<p>Material : Handloom Cotton, Color : Blue, Pattern : Embroidered<br />\r\nNeck Type : Round Neck, Item Length : Calf Length<br />\r\nPackage Contents : 1 Straight Kurti and 1 Printed Palazzo<br />\r\nOccasion : Party Wear, Sleeves : 3/4 Sleeve<br />\r\nDisclaimer : Slight Color Variation is possible due to photographic effect &amp; printing limitations.</p>\r\n\r\n<p>Material : Handloom Cotton, Color : Blue, Pattern : Embroidered<br />\r\nNeck Type : Round Neck, Item Length : Calf Length<br />\r\nPackage Contents : 1 Straight Kurti and 1 Printed Palazzo<br />\r\nOccasion : Party Wear, Sleeves : 3/4 Sleeve<br />\r\nDisclaimer : Slight Color Variation is possible due to photographic effect &amp; printing limitations.</p>\r\n\r\n<p>Material : Handloom Cotton, Color : Blue, Pattern : Embroidered<br />\r\nNeck Type : Round Neck, Item Length : Calf Length<br />\r\nPackage Contents : 1 Straight Kurti and 1 Printed Palazzo<br />\r\nOccasion : Party Wear, Sleeves : 3/4 Sleeve<br />\r\nDisclaimer : Slight Color Variation is possible due to photographic effect &amp; printing limitations.</p>\r\n\r\n<p>Material : Handloom Cotton, Color : Blue, Pattern : Embroidered<br />\r\nNeck Type : Round Neck, Item Length : Calf Length<br />\r\nPackage Contents : 1 Straight Kurti and 1 Printed Palazzo<br />\r\nOccasion : Party Wear, Sleeves : 3/4 Sleeve<br />\r\nDisclaimer : Slight Color Variation is possible due to photographic effect &amp; printing limitations.</p>\r\n\r\n<p>nn</p>\r\n\r\n<p>Material : Handloom Cotton, Color : Blue, Pattern : Embroidered<br />\r\nNeck Type : Round Neck, Item Length : Calf Length<br />\r\nPackage Contents : 1 Straight Kurti and 1 Printed Palazzo<br />\r\nOccasion : Party Wear, Sleeves : 3/4 Sleeve<br />\r\nDisclaimer : Slight Color Variation is possible due to photographic effect &amp; printing limitations.</p>\r\n\r\n<p>&nbsp;</p>', NULL, '15931484347.jpg', 1000, 1000, 0, '20.00', 5, 'test', NULL, 1, 0, 0, 1, 1, 1, '2020-06-26 05:13:54', '2020-07-04 04:58:59', NULL),
(29, 14, 4, 2, 'Blue Top', NULL, 'Miss Chase Women\'s  Round Neck Half Sleeved Relaxed Fit Striped Cold Shoulder Top', '<ul>\r\n	<li>Care Instructions: Cold machine wash with similar colors, do not bleach, tumble dry low, warm iron</li>\r\n	<li>Fit Type: regular fit</li>\r\n	<li>Material: Cotton</li>\r\n	<li>Color: Black and White</li>\r\n	<li>Neck Type: Round Neck; Sleeve Type: Half Sleeve</li>\r\n	<li>Package Contents: 1 Cut-Out Top</li>\r\n	<li>Occasion: Casual; Fit Type: Regular Fit</li>\r\n</ul>', NULL, '159317665714.jpg', 700, 900, 22, '35.00', 5, 'test', NULL, 1, 0, 0, 1, 1, 1, '2020-06-26 13:00:45', '2020-07-04 04:59:12', NULL),
(30, 2, 4, 1, 'Simply cotton', 'test subtitle', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sem arcu, egestas vel elit gravida, vehicula venenatis justo. Morbi tempus, velit vehicula vo', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sem arcu, egestas vel elit gravida, vehicula venenatis justo. Morbi tempus, velit vehicula volutpat viverra, felis nisl dapibus ipsum, sit amet ultrices enim augue ac urna. Mauris vitae aliquam nunc, nec eleifend ante. Morbi interdum est efficitur diam luctus posuere. Suspendisse consequat diam felis, sit amet posuere purus dictum quis. Maecenas condimentum diam vitae est lacinia facilisis. Cras aliquam faucibus nunc id finibus. Integer tempus vulputate libero euismod posuere.</p>\r\n\r\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc in malesuada urna, eu pretium erat. Praesent sed nibh imperdiet nulla iaculis lobortis. Donec mauris tortor, eleifend id consequat sit amet, dictum id diam. Nulla condimentum arcu mi, non aliquet nisi fringilla eget. Pellentesque interdum lorem nunc, at posuere tellus lobortis at. Vivamus lacinia interdum neque non cursus. Sed blandit ligula eget ligula blandit, vitae consectetur metus rhoncus. Mauris a metus arcu. Mauris suscipit risus sit amet sodales elementum. Fusce sem arcu, pellentesque sed nulla eget, viverra tempus elit. Etiam rutrum accumsan dui, facilisis porta mauris iaculis quis. Duis convallis, neque at finibus volutpat, odio magna pellentesque enim, sit amet porta metus purus porta magna. Fusce eget diam sit amet nulla hendrerit laoreet sed non tellus. Mauris nibh diam, congue non quam eu, finibus mollis neque.</p>', NULL, '159948003110.jpg', 270, 300, 10, '283.50', 5, '134', '4556', 1, 0, 0, 1, 0, 1, '2020-06-30 05:10:35', '2020-09-07 12:00:31', NULL),
(31, 14, 6, 10, 'White top', 'test1 ksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnn', 'Lorem ipsum is a name for a common type of placeholder text. Also known as filler or dummy text, this is simply copy that serves to fill a space without actuall', '<p><strong>Lorem ipsum</strong>&nbsp;is a name for a common type of placeholder&nbsp;<strong>text</strong>. Also known as filler or dummy&nbsp;<strong>text</strong>, this is simply copy that serves to fill a space without actually saying anything meaningful. It&#39;s essentially nonsense&nbsp;<strong>text</strong>, but gives an idea of what real&nbsp;<strong>text</strong>&nbsp;will look like in the final product.</p>\r\n\r\n<p><strong>Lorem ipsum</strong>&nbsp;is a name for a common type of placeholder&nbsp;<strong>text</strong>. Also known as filler or dummy&nbsp;<strong>text</strong>, this is simply copy that serves to fill a space without actually saying anything meaningful. It&#39;s essentially nonsense&nbsp;<strong>text</strong>, but gives an idea of what real&nbsp;<strong>text</strong>&nbsp;will look like in the final product.</p>\r\n\r\n<p><strong>Lorem ipsum</strong>&nbsp;is a name for a common type of placeholder&nbsp;<strong>text</strong>. Also known as filler or dummy&nbsp;<strong>text</strong>, this is simply copy that serves to fill a space without actually saying anything meaningful. It&#39;s essentially nonsense&nbsp;<strong>text</strong>, but gives an idea of what real&nbsp;<strong>text</strong>&nbsp;will look like in the final product.</p>', NULL, '159350098111.jpg', 2, 8, 75, '0.10', 5, '134', NULL, 1, 1, 1, 0, 1, 0, '2020-06-30 05:41:43', '2020-07-01 16:45:58', NULL),
(32, 3, 4, 2, 'test hhhhknnknk hdsssssss', 'dsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 'dsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', '<p>dsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</p>', NULL, '159350707810.jpg', 600, 700, 14, '30.00', 5, 'dsfdfdffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffweeeeeeeeeeeeeeeeeeeeeeeeeeeee', NULL, 1, 0, 0, 0, 1, 1, '2020-06-30 08:51:18', '2020-06-30 09:02:32', NULL),
(33, 1, 5, 10, 'casual top', 'Material : Handloom Cotton, Color : Blue, Pattern : Embroide', 'Material : Handloom Cotton, Color : Blue, Pattern : Embroidered\r\nNeck Type : Round Neck, Item Length : Calf Length\r\nPackage Contents : 1 Straight Kurti and 1 Prin', '<p>Material : Handloom Cotton, Color : Blue, Pattern : Embroidered<br />\r\nNeck Type : Round Neck, Item Length : Calf Length<br />\r\nPackage Contents : 1 Straight Kurti and 1 Printed Palazzo<br />\r\nOccasion : Party Wear, Sleeves : 3/4 Sleeve<br />\r\nDisclaimer : Slight Color Variation is possible due to photographic effect &amp; printing limitations.</p>\r\n\r\n<ul>\r\n	<li>Material : Handloom Cotton, Color : Blue, Pattern : Embroidered</li>\r\n	<li>Neck Type : Round Neck, Item Length : Calf Length</li>\r\n	<li>Package Contents : 1 Straight Kurti and 1 Printed Palazzo</li>\r\n	<li>Occasion : Party Wear, Sleeves : 3/4 Sleeve</li>\r\n	<li>Disclaimer : Slight Color Variation is possible due to photographic effect &amp; printing limitations.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', NULL, '159947991214.jpg', 800, 1500, 47, '840.00', 5, '134', '4556', 1, 0, 0, 1, 0, 1, '2020-06-30 10:55:56', '2020-09-10 13:47:35', NULL),
(34, 1, 5, 2, 'Cotton kurti', 'Material : Handloom Cotton, Color : Blue, Pattern : Embroide', 'Material : Handloom Cotton, Color : Blue, Pattern : Embroidered\r\nNeck Type : Round Neck, Item Length : Calf Length\r\nPackage Contents : 1 Straight Kurti and 1 Prin', '<p>Material : Handloom Cotton, Color : Blue, Pattern : Embroidered<br />\r\nNeck Type : Round Neck, Item Length : Calf Length<br />\r\nPackage Contents : 1 Straight Kurti and 1 Printed Palazzo<br />\r\nOccasion : Party Wear, Sleeves : 3/4 Sleeve<br />\r\nDisclaimer : Slight Color Variation is possible due to photographic effect &amp; printing limitations.</p>\r\n\r\n<p>Material : Handloom Cotton, Color : Blue, Pattern : Embroidered<br />\r\nNeck Type : Round Neck, Item Length : Calf Length<br />\r\nPackage Contents : 1 Straight Kurti and 1 Printed Palazzo<br />\r\nOccasion : Party Wear, Sleeves : 3/4 Sleeve<br />\r\nDisclaimer : Slight Color Variation is possible due to photographic effect &amp; printing limitations.</p>\r\n\r\n<p>&nbsp;</p>', NULL, '15994794575.webp', 3750, 5000, 25, '3937.50', 5, '134', '4556', 1, 1, 0, 1, 0, 1, '2020-06-30 10:57:27', '2020-09-07 11:50:57', NULL),
(35, 1, 5, 10, 'Handloom Kurti', 'Biege Kurti', 'Material : Handloom Cotton, Color : Blue, Pattern : Embroidered Neck Type : Round Neck, Item Length : Calf Length Package Contents : 1 Straight Kurti and 1 Prin', '<p>Material : Handloom Cotton, Color : Blue, Pattern : Embroidered Neck Type : Round Neck, Item Length : Calf Length Package Contents : 1 Straight Kurti and 1 Prin</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sem arcu, egestas vel elit gravida, vehicula venenatis justo. Morbi tempus, velit vehicula volutpat viverra, felis nisl dapibus ipsum, sit amet ultrices enim augue ac urna. Mauris vitae aliquam nunc, nec eleifend ante. Morbi interdum est efficitur diam luctus posuere. Suspendisse consequat diam felis, sit amet posuere purus dictum quis. Maecenas condimentum diam vitae est lacinia facilisis. Cras aliquam faucibus nunc id finibus. Integer tempus vulputate libero euismod posuere.</p>\r\n\r\n<ul>\r\n	<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>\r\n	<li>Proin quis lacus scelerisque, faucibus augue quis, faucibus leo.</li>\r\n	<li>Donec malesuada mi eu ultrices feugiat.</li>\r\n	<li>Nam malesuada massa at velit scelerisque efficitur.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Nunc et ipsum vel turpis interdum tempus.</li>\r\n	<li>Maecenas nec odio faucibus, condimentum massa tempor, fringilla felis.</li>\r\n	<li>Cras et dui vel mauris aliquet faucibus.</li>\r\n</ul>', NULL, '15994791287.webp', 3150, 4500, 30, '7560.00', 5, '134', '1234', 1, 0, 1, 1, 0, 1, '2020-06-30 11:02:02', '2020-09-08 12:09:23', NULL),
(36, 31, 6, 4, 'women\'s shirt', 'causal shirt', 'solid', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>', NULL, '159359392412.jpg', 999, 1500, 33, '49.95', 5, '#ABCD', NULL, 1, 1, 1, 1, 1, 1, '2020-07-01 08:58:44', '2020-07-01 08:58:44', NULL),
(37, 31, 6, 3, 'women\'s shirt', 'causal shirt', 'solid', '<p><strong>rem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h</p>', NULL, '159359409611.jpg', 500, 1500, 67, '25.00', 5, '#ABCD', NULL, 1, 1, 1, 1, 1, 1, '2020-07-01 09:01:36', '2020-07-01 12:05:16', NULL),
(38, 31, 6, 1, 'women\'s shirt', 'causal shirt', 'solid', '<p><strong>rem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h</p>', NULL, '159359437711.jpg', 999, 1500, 33, '49.95', 5, '#ABCD', NULL, 1, 1, 1, 1, 1, 1, '2020-07-01 09:06:17', '2020-07-01 09:06:17', NULL),
(39, 2, 3, 10, 'demo', 'demo', 'demo test', '<p>demo test</p>', NULL, '15936214259.jpg', 99, 100, 1, '4.95', 5, 'demo1234', NULL, 1, 1, 1, 1, 1, 1, '2020-07-01 16:37:06', '2020-07-16 11:38:54', NULL),
(40, 2, 4, 21, 'demo', 'demo', 'demo test', '<p>demo test</p>', NULL, '15936214259.jpg', 990, 1000, 1, '4.95', 5, 'demo1234', NULL, 1, 1, 1, 1, 1, 1, '2020-07-01 16:37:06', '2020-07-03 14:27:02', NULL),
(41, 3, 6, 1, 'women\'s shirt', 'causal shirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce at ornare nisl. Suspendisse vitae laoreet nisi.', '<p><strong>Lorem ipsum dolor sit amet</strong>, consectetur adipiscing elit. Fusce at ornare nisl. Suspendisse vitae laoreet nisi. In ullamcorper laoreet risus, vel elementum felis ultricies et. Vestibulum scelerisque lobortis posuere. In et elementum ipsum. Morbi mattis ligula eu purus posuere congue. Maecenas euismod scelerisque purus, vel lobortis felis vestibulum et. Nam porta turpis vitae porta finibus.</p>\r\n\r\n<ol>\r\n	<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>\r\n	<li>Proin quis lacus scelerisque, faucibus augue quis, faucibus leo.</li>\r\n	<li>Donec malesuada mi eu ultrices feugiat.</li>\r\n	<li>Nam malesuada massa at velit scelerisque efficitur.</li>\r\n</ol>', NULL, '15941945035.jpg', 1500, 1500, 0, '75.00', 5, '#dress', NULL, 1, 0, 0, 1, 1, 1, '2020-07-01 09:06:17', '2020-07-08 11:54:15', NULL),
(42, 3, 6, 4, 'Women\'s Midi', 'Women\'s Midi', 'solid', '<p><strong>rem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h</p>', NULL, '15994783675.jpg', 1440, 1600, 10, '1512.00', 5, '#dress', '1234', 1, 0, 0, 1, 0, 1, '2020-07-01 09:01:36', '2020-09-10 13:26:10', NULL),
(43, 2, 6, 3, 'Pink Straight Kurta', 'causal shirt', 'solid', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>', NULL, '159947817110.jpg', 1200, 1500, 5, '1260.00', 5, '#dress', '3122', 1, 1, 1, 1, 0, 1, '2020-07-01 08:58:44', '2020-09-08 05:57:17', NULL),
(44, 1, 5, 1, 'Melange Solid Kurti', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Melange brown kurti with style and grace. Perfect for festive mood. and Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sem arcu, egestas vew', '<h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>\r\n\r\n<p><strong>Phasellus sem arcu, egestas vel elit gravida</strong>, vehicula venenatis justo. Morbi tempus, velit vehicula volutpat viverra, felis nisl dapibus ipsum, sit amet ultrices enim augue ac urna. <span class=\"marker\">Mauris vitae aliquam nunc</span>, nec eleifend ante. Morbi interdum est efficitur diam luctus posuere. Suspendisse consequat diam felis, sit amet posuere purus dictum quis. Maecenas condimentum diam vitae est lacinia facilisis. Cras aliquam faucibus nunc id finibus. Integer tempus vulputate libero euismod posuere.</p>\r\n\r\n<ul>\r\n	<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>\r\n	<li>Proin quis lacus scelerisque, faucibus augue quis, faucibus leo.</li>\r\n	<li>Donec malesuada mi eu ultrices feugiat.</li>\r\n	<li>Nam malesuada massa at velit scelerisque efficitur.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Nunc et ipsum vel turpis interdum tempus.</li>\r\n	<li>Maecenas nec odio faucibus, condimentum massa tempor, fringilla felis.</li>\r\n	<li>Cras et dui vel mauris aliquet faucibus.</li>\r\n</ul>', NULL, '159947781414.webp', 800, 1000, 20, '840.00', 5, '1', '4321', 1, 0, 1, 1, 0, 1, '2020-07-03 05:45:50', '2020-09-10 10:55:09', NULL),
(45, 1, 4, 1, 'dsfsf', 'dsfsdfsdf', 'dsfdsafsadfsfsdfsdf', '<p>sdfdsfsdaf</p>', NULL, '15937594536.jpg', 300, 432, 31, '15.00', 5, 'yrty', NULL, 1, 1, 1, 1, 1, 1, '2020-07-03 06:57:33', '2020-07-03 07:56:39', NULL),
(46, 1, 3, 2, 'dfgdf', NULL, 'fdgfdgdfsgfdgfdsgdsfgdf', '<p>dgdfsgfgdfgfdsgdsf</p>', NULL, '15937596578.jpg', 2000, 1000, -100, '100.00', 5, 'yrtyfgfdg', NULL, 1, 0, 0, 0, 1, 1, '2020-07-03 07:00:57', '2020-07-03 07:45:42', NULL),
(47, 1, 3, 10, 'Maria', NULL, 'test', '<p>test</p>', NULL, '159375968413.jpg', 2000, 1000, -100, '100.00', 5, '134', NULL, 1, 0, 0, 0, 1, 1, '2020-07-03 07:01:24', '2020-07-03 07:45:32', NULL),
(48, 1, 4, 2, 'test', NULL, 'It is a long kurti, with beautiful curved neck line and tie and dye print and pockets on both sides Size Chart - S - Chest: 34\'\', Shoulder: 14.5\'\'', '<h2>It is a long kurti, with beautiful curved neck line and tie and dye print and pockets on both sides Size Chart - S - Chest: 34&#39;&#39;, Shoulder: 14.5&#39;&#39;</h2>\r\n\r\n<h2>It is a long kurti, with beautiful curved neck line and tie and dye print and pockets on both sides Size Chart - S - Chest: 34&#39;&#39;, Shoulder: 14.5&#39;&#39;</h2>\r\n\r\n<h2>It is a long kurti, with beautiful curved neck line and tie and dye print and pockets on both sides Size Chart - S - Chest: 34&#39;&#39;, Shoulder: 14.5&#39;&#39;</h2>', NULL, '159376243310.jpg', 2000, 1000, -100, '100.00', 5, '1', NULL, 1, 0, 0, 0, 1, 1, '2020-07-03 07:47:13', '2020-07-03 07:48:49', NULL),
(49, 1, 3, 21, 'school1', 'dsfdsf', 'dfsdafsadf', '<p>sdafsadfsadfsda</p>', NULL, '15937725325.jpg', 900, 1000, 10, '45.00', 5, 'dsfsadf', NULL, 1, 0, 0, 0, 1, 0, '2020-07-03 10:35:32', '2020-07-08 10:48:21', NULL),
(50, 1, 6, 1, 'Women Kurta Set', 'Women Pink & White Printed Asymmetric A-Line Kurta', NULL, '<p>PRODUCT DETAILS&nbsp;</p>\r\n\r\n<p>Pink and white printed A-line kurta, has a mandarin collar, long sleeves, asymmetric hem, side slits</p>\r\n\r\n<p>Size &amp; Fit</p>\r\n\r\n<p>The model (height 5&#39;8&quot;) is wearing a size S</p>\r\n\r\n<p>Material &amp; Care</p>\r\n\r\n<p>Cotton<br />\r\nMachine-wash</p>', NULL, '159947759813.webp', 900, 1000, 10, '1050.00', 5, '123XYZ1', '4556', 1, 1, 1, 1, 0, 1, '2020-07-03 10:39:00', '2020-09-18 16:16:51', NULL),
(51, 1, 4, 21, 'Tunic', 'Class aptent taciti sociosqu', 'Material : Silk, Color : Grey, Pattern : Embellished Neck Type : V Neck, Item Length : Calf Length Package....Material : Silk, Color : Grey, Pattern : Embellish', '<p>Material : Silk, Color : Grey, Pattern : Embellished<br />\r\nNeck Type : V Neck, Item Length : Calf Length<br />\r\nPackage Contents : 1 Straight Kurti and 1 Pant<br />\r\nOccasion : Party Wear, Sleeves : 3/4 Sleeve<br />\r\nDisclaimer : Slight Color Variation is possible due to photographic effect &amp; printing limitations</p>', NULL, '159947744810.webp', 1200, 1500, 20, '4987.50', 5, '1', '1234', 1, 1, 0, 1, 0, 1, '2020-07-03 13:44:48', '2020-09-08 12:10:28', NULL),
(52, 1, 6, 2, 'Green Dress', 'Women Green Printed Asymmetric A-Line Kurta', NULL, '<p>PRODUCT DETAILS&nbsp;</p>\r\n\r\n<p>Pink and white printed A-line kurta, has a mandarin collar, long sleeves, asymmetric hem, side slits</p>\r\n\r\n<p>Size &amp; Fit</p>\r\n\r\n<p>The model (height 5&#39;8&quot;) is wearing a size S</p>\r\n\r\n<p>Material &amp; Care</p>\r\n\r\n<p>Cotton<br />\r\nMachine-wash</p>', NULL, '159947729314.webp', 1760, 2200, 20, '1050.00', 5, '123XYZ1', '1234', 1, 1, 1, 1, 0, 1, '2020-07-04 08:25:22', '2020-09-18 16:19:33', NULL),
(53, 1, 5, 21, 'Long Kurta', NULL, 'Long pink stylish latest kurta with best design and material for festive collection or party wear.comfortable to wear', '<p>Lorem Ipsum is simply&nbsp;<em>dummy text</em>&nbsp;of the printing and typesetting industry.&nbsp;Lorem Ipsum is simply&nbsp;<em>dummy text</em>&nbsp;of the printing and typesetting industry.&nbsp;Lorem Ipsum is simply&nbsp;<em>dummy text</em>&nbsp;of the printing and typesetting industry.&nbsp;Lorem Ipsum is simply&nbsp;<em>dummy text</em>&nbsp;of the printing and typesetting industry.&nbsp;Lorem Ipsum is simply&nbsp;<em>dummy text</em>&nbsp;of the printing and typesetting industry.&nbsp;Lorem Ipsum is simply&nbsp;<em>dummy text</em>&nbsp;of the printing and typesetting industry.&nbsp;Lorem Ipsum is simply&nbsp;<em>dummy text</em>&nbsp;of the printing and typesetting industry.&nbsp;Lorem Ipsum is simply&nbsp;<em>dummy text</em>&nbsp;of the printing and typesetting industry.&nbsp;Lorem Ipsum is simply&nbsp;<em>dummy text</em>&nbsp;of the printing and typesetting industry.&nbsp;Lorem Ipsum is simply&nbsp;<em>dummy text</em>&nbsp;of the printing and typesetting industry.&nbsp;Lorem Ipsum is simply&nbsp;<em>dummy text</em>&nbsp;of the printing and typesetting industry.&nbsp;Lorem Ipsum is simply&nbsp;<em>dummy text</em>&nbsp;of the printing and typesetting industry.&nbsp;Lorem Ipsum is simply&nbsp;<em>dummy text</em>&nbsp;of the printing and typesetting industry.&nbsp;</p>', NULL, '159947717213.jpeg', 1600, 1600, 0, '1680.00', 5, '1235', '1234', 1, 0, 1, 1, 0, 1, '2020-07-07 11:33:22', '2020-09-18 16:18:52', NULL),
(54, 3, 4, 4, 'Flared Maxi dress', NULL, 'Material : Cotton, Color : Yellow, Pattern : Printed Neck Type : Round Neck, Item Length : Floor Length Package.', '<p>Material : Cotton, Color : Yellow, Pattern : Printed<br />\r\nNeck Type : Round Neck, Item Length : Floor Length<br />\r\nPackage Contents : 1 A-line Dress<br />\r\nOccasion : Party Wear, Sleeves : Long Sleeve<br />\r\nDisclaimer : Slight Color Variation is possible due to photographic effect &amp; printing limitations.</p>\r\n\r\n<p>Material : Cotton, Color : Yellow, Pattern : Printed<br />\r\nNeck Type : Round Neck, Item Length : Floor Length<br />\r\nPackage Contents : 1 A-line Dress<br />\r\nOccasion : Party Wear, Sleeves : Long Sleeve<br />\r\nDisclaimer : Slight Color Variation is possible due to photographic effect &amp; printing limitations.</p>\r\n\r\n<p>&nbsp;</p>', NULL, '159419298710.webp', 2550, 3000, 15, '127.50', 5, '1', NULL, 1, 0, 0, 1, 1, 1, '2020-07-07 13:32:24', '2020-07-09 06:50:27', NULL),
(55, 2, 5, 5, 'White Embroidered Cotton', NULL, 'White Embroidered Cotton Straight Kurti With Pant', '<p>Material : Cotton Printed, Color : White, Pattern : Embroidered and Printed<br />\r\nNeck Type : Round Neck, Item Length : Knee Long<br />\r\nPackage Contents : 1 Straight Kurti and 1 Pant<br />\r\nOccasion : Casual, Sleeves : Short Sleeve<br />\r\nDisclaimer : Slight Color Variation is possible due to photographic effect &amp; printing limitations.</p>\r\n\r\n<p>Material : Cotton Printed, Color : White, Pattern : Embroidered and Printed<br />\r\nNeck Type : Round Neck, Item Length : Knee Long<br />\r\nPackage Contents : 1 Straight Kurti and 1 Pant<br />\r\nOccasion : Casual, Sleeves : Short Sleeve<br />\r\nDisclaimer : Slight Color Variation is possible due to photographic effect &amp; printing limitations.</p>\r\n\r\n<p>&nbsp;</p>', NULL, '159419342812.webp', 1800, 2000, 10, '90.00', 5, '1', NULL, 1, 0, 0, 1, 1, 1, '2020-07-08 07:30:28', '2020-07-09 06:50:24', NULL),
(56, 2, 6, 10, 'arthur', NULL, 'hh', '<p>jj</p>', NULL, '15941937646.jpg', 0, 900, 100, '0.00', 5, '1', NULL, 1, 0, 0, 1, 1, 1, '2020-07-08 07:36:04', '2020-07-08 07:37:28', NULL),
(57, 29, 17, 3, 'Red silk saree', NULL, 'beautiful red woven traditional silk saree', '<p>beautiful red woven traditional silk sareebeautiful red woven traditional silk sareebeautiful red woven traditional silk sareebeautiful red woven traditional silk sareebeautiful red woven traditional silk sareebeautiful red woven traditional silk sareebeautiful red woven traditional silk saree</p>', NULL, '15942036025.webp', 6300, 7000, 10, '315.00', 5, 'saree', NULL, 1, 0, 0, 1, 1, 1, '2020-07-08 10:20:02', '2020-07-09 06:50:21', NULL),
(58, 29, 4, 22, 'Blue woven saree', NULL, 'Beautiful blue woven elegent saree', '<p>Beautiful blue woven saree silk saree&nbsp;</p>', NULL, '159420441711.webp', 6000, 6000, 0, '300.00', 5, 'saree', NULL, 1, 0, 0, 1, 1, 1, '2020-07-08 10:33:37', '2020-07-09 06:50:16', NULL),
(59, 2, 3, 21, 'Maria', NULL, 'teatt ff teatt ffv teatt ff teatt ff teatt ff teatt ff teatt ff teatt ff teatt ff teatt ff teatt ff teatt ff teatt ff teatt ff teatt ff teatt ff teatt ff teatt', '<p>&nbsp;teatt ff&nbsp;teatt ff&nbsp;teatt ff&nbsp;teatt ff&nbsp;teatt ff&nbsp;teatt ff&nbsp;teatt ff&nbsp;teatt ff&nbsp;teatt ff&nbsp;teatt ff&nbsp;teatt ff&nbsp;teatt ff&nbsp;teatt ff&nbsp;teatt ff&nbsp;teatt ff&nbsp;teatt ff&nbsp;teatt ff&nbsp;teatt ff&nbsp;teatt ff</p>', NULL, '159421306411.jpg', 1200, 6000, 80, '60.00', 5, 'dsfdfdffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffweeeeeeeeeeeeeeeeeeeeeeeeeeeee', NULL, 1, 0, 0, 0, 1, 1, '2020-07-08 12:57:44', '2020-07-08 12:59:29', NULL),
(60, 2, 18, 3, 'Red Jacket Kurta', NULL, 'Red Jacket Kurta', '<p>Material : Rayon And Chanderi, Color : Cream and Grey, Pattern : Printed<br />\r\nNeck Type : Round Neck, Item Length : Ankel Length<br />\r\nPackage Contents : 1 Straight Kurti and 1 Printed Long Jacket<br />\r\nOccasion : Party Wear, Sleeves : 3/4 Sleeve<br />\r\nDisclaimer : Slight Color Variation is possible due to photographic effect &amp; printing limitations.</p>\r\n\r\n<p>&nbsp;</p>', NULL, '15994770597.webp', 2000, 2500, 20, '2100.00', 5, '2', '1234', 1, 0, 1, 1, 0, 1, '2020-07-16 11:30:36', '2020-09-07 12:33:12', NULL),
(61, 1, 4, 3, 'Maroon Jacket Tunic', NULL, 'Marron Jacket Tunic  Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since', '<p>Marron Jacket Tunic</p>\r\n\r\n<p>Material : Rayon And Chanderi, Color : Cream and Grey, Pattern : Printed<br />\r\nNeck Type : Round Neck, Item Length : Ankel Length<br />\r\nPackage Contents : 1 Straight Kurti and 1 Printed Long Jacket<br />\r\nOccasion : Party Wear, Sleeves : 3/4 Sleeve<br />\r\nDisclaimer : Slight Color Variation is possible due to photographic effect &amp; printing limitations.</p>\r\n\r\n<p>&nbsp;</p>', NULL, '159947687511.webp', 1800, 2000, 10, '1890.00', 5, '2', '4181533093', 1, 0, 0, 1, 0, 1, '2020-07-16 11:59:04', '2020-09-07 12:32:10', NULL),
(62, 1, 4, 4, 'test', NULL, 'test', '<p>test</p>', NULL, '15950506069.webp', 3600, 4000, 10, '180.00', 5, '2', NULL, 1, 0, 0, 1, 1, 1, '2020-07-18 05:36:46', '2020-08-08 17:37:23', NULL),
(63, 3, 5, 4, 'Yellow Flared Dress', 'Yellow Flared Dress', 'Yellow Flared Dress', '<p>Material : Cotton, Color : musturd, Pattern : Solid Neck Type : Mandarin Collar, Item Length : Calf Length Package.</p>', NULL, '159948230810.webp', 2250, 2500, 10, '2362.50', 5, '5', '4556', 1, 0, 0, 1, 0, 1, '2020-09-07 12:38:28', '2020-09-19 05:53:39', NULL),
(64, 2, 4, 3, 'sddss', 'sdsdsdsdsds', 'dsddsdsds', '<p>dsds</p>', NULL, '159965865913.png', 1800, 2000, 10, '90.00', 5, '#sdsdds', 'WY54HMWUxK', 1, 0, 0, 1, 1, 1, '2020-09-09 13:37:42', '2020-09-09 13:38:29', NULL),
(65, 1, 3, 2, 'sdssds', 'dsdsdsdsds', 'dsdsdsdsd', '<p>sdsdsds</p>', NULL, '159965887815.png', 1800, 2000, 10, '90.00', 5, '#dsdsds', 'TQ59QETj72', 1, 0, 0, 1, 1, 1, '2020-09-09 13:41:22', '2020-09-18 16:02:41', NULL),
(66, 1, 4, 1, 'aaabbbccc', 'aaa', 'aaaa', '<p>aaa</p>', NULL, '159965911412.png', 2000, 2222, 10, '99.99', 5, '#dsds', 'uDUuX8WEvp', 1, 0, 0, 1, 1, 1, '2020-09-09 13:45:19', '2020-09-18 16:02:35', NULL),
(67, 1, 4, 2, 'xxxx', 'xxx', 'xxxx', '<p>xxxx</p>', NULL, '15998173125.jpg', 900, 1000, 10, '45.00', 5, '#ddddd', 'Nmenj1vLP5', 1, 0, 0, 1, 1, 1, '2020-09-11 09:41:54', '2020-09-11 09:43:09', NULL),
(68, 1, 3, 1, 'aaaa', 'aaaa', 'aaaa', '<p>aaa</p>', NULL, '16004475149.png', 1080, 1200, 10, '54.00', 5, '#dddd', '3182047235', 1, 0, 0, 1, 1, 1, '2020-09-18 16:45:22', '2020-09-18 16:45:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `product_image`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 'kurta_1.jpg', 1, 0, '2020-06-08 12:02:40', '2020-06-08 12:02:40'),
(2, 1, 'kurta_3.jpg', 1, 0, '2020-06-08 12:03:17', '2020-06-08 12:03:17'),
(3, 1, 'kurta_1.jpg', 1, 0, '2020-06-08 13:47:22', '2020-06-08 13:47:22'),
(4, 2, 'kurta_3.jpg', 1, 0, '2020-06-08 13:47:41', '2020-06-08 13:47:41'),
(5, 11, 'kurta_1.jpg', 1, 0, '2020-06-08 13:47:41', '2020-06-08 13:47:41'),
(6, 1, 'kurta_1.jpg', 1, 0, '2020-06-08 13:47:41', '2020-06-08 13:47:41'),
(7, 11, 'pobox_2_black.jpg', 1, 0, '2020-06-09 12:04:38', '2020-06-09 12:04:38'),
(8, 16, 'pobox_1_black.jpg', 1, 0, '2020-06-09 12:04:38', '2020-06-09 12:04:38'),
(9, 12, 'pobox_2_black.jpg', 1, 0, '2020-06-09 12:05:12', '2020-06-09 12:05:12'),
(10, 12, 'pobox_1_black.jpg', 1, 0, '2020-06-09 12:05:12', '2020-06-09 12:05:12'),
(12, 7, 'pobox_1_black.jpg', 1, 0, '2020-06-11 10:14:09', '2020-06-11 10:14:09'),
(13, 13, 'pobox_3_black.jpg', 1, 0, '2020-06-11 11:02:04', '2020-06-11 11:02:04'),
(20, 14, 'images.jpg', 1, 0, '2020-06-12 08:07:39', '2020-06-12 08:07:39'),
(21, 17, 'pobox_3_black.jpg', 1, 0, '2020-06-15 12:24:01', '2020-06-15 12:24:01'),
(22, 19, 'pobox_3_black.jpg', 1, 0, '2020-06-17 07:31:08', '2020-06-17 07:31:08'),
(23, 20, 'pobox_3_black.jpg', 1, 0, '2020-06-17 07:46:11', '2020-06-17 07:46:11'),
(28, 22, 'A10I5918 copy.jpg', 1, 0, '2020-06-17 17:06:38', '2020-06-17 17:06:38'),
(29, 6, 'A10I5915 copy.jpg', 1, 0, '2020-06-17 17:06:38', '2020-06-17 17:06:38'),
(30, 22, 'A10I5913 copy.jpg', 1, 0, '2020-06-17 17:06:38', '2020-06-17 17:06:38'),
(31, 26, '159297933710.jpg', 1, 0, '2020-06-24 06:15:37', '2020-06-24 06:15:37'),
(32, 4, '15930638405.webp', 1, 0, '2020-06-25 05:44:00', '2020-06-25 05:44:00'),
(33, 4, '15930638405.jpeg', 1, 0, '2020-06-25 05:44:00', '2020-06-25 05:44:00'),
(34, 4, '159306384015.jpg', 1, 0, '2020-06-25 05:44:00', '2020-06-25 05:44:00'),
(36, 29, 'image1.jpg', 1, 0, '2020-06-26 13:00:45', '2020-06-26 13:00:45'),
(37, 29, '159317644511.jpg', 1, 0, '2020-06-26 13:00:45', '2020-06-26 13:00:45'),
(38, 29, '15931764456.jpg', 1, 0, '2020-06-26 13:00:45', '2020-06-26 13:00:45'),
(39, 38, '159359437715.jpg', 1, 0, '2020-07-01 09:06:17', '2020-07-01 09:06:17'),
(40, 39, '15936214269.jpg', 1, 0, '2020-07-01 16:37:07', '2020-07-01 16:37:07'),
(41, 39, '159362142714.jpg', 1, 0, '2020-07-01 16:37:08', '2020-07-01 16:37:08'),
(42, 39, '159362142814.jpg', 1, 0, '2020-07-01 16:37:09', '2020-07-01 16:37:09'),
(48, 30, '159383726312.jpg', 1, 0, '2020-07-04 04:34:24', '2020-07-04 04:34:24'),
(49, 30, '15938372645.jpg', 1, 0, '2020-07-04 04:34:25', '2020-07-04 04:34:25'),
(50, 30, '159383726514.jpg', 1, 0, '2020-07-04 04:34:26', '2020-07-04 04:34:26'),
(51, 30, '159383726611.jpg', 1, 0, '2020-07-04 04:34:27', '2020-07-04 04:34:27'),
(67, 33, '159383912012.jpg', 1, 0, '2020-07-04 05:05:20', '2020-07-04 05:05:20'),
(68, 33, '159383912013.jpg', 1, 0, '2020-07-04 05:05:21', '2020-07-04 05:05:21'),
(69, 33, '159383912114.jpg', 1, 0, '2020-07-04 05:05:22', '2020-07-04 05:05:22'),
(70, 33, '159383912213.jpg', 1, 0, '2020-07-04 05:05:23', '2020-07-04 05:05:23'),
(75, 42, '159384109615.jpg', 1, 0, '2020-07-04 05:38:16', '2020-07-04 05:38:16'),
(76, 42, '159384109611.jpg', 1, 0, '2020-07-04 05:38:17', '2020-07-04 05:38:17'),
(77, 42, '159384109711.jpg', 1, 0, '2020-07-04 05:38:18', '2020-07-04 05:38:18'),
(78, 42, '15938410989.jpg', 1, 0, '2020-07-04 05:38:19', '2020-07-04 05:38:19'),
(87, 53, '15941216878.jpeg', 1, 0, '2020-07-07 11:34:47', '2020-07-07 11:34:47'),
(88, 21, '159412798315.jpg', 1, 0, '2020-07-07 13:19:43', '2020-07-07 13:19:43'),
(89, 21, '15941279837.jpg', 1, 0, '2020-07-07 13:19:43', '2020-07-07 13:19:43'),
(91, 21, '159412806612.jpg', 1, 0, '2020-07-07 13:21:06', '2020-07-07 13:21:06'),
(92, 21, '15941280669.jpg', 1, 0, '2020-07-07 13:21:06', '2020-07-07 13:21:06'),
(94, 21, '15941280667.jpg', 1, 0, '2020-07-07 13:21:06', '2020-07-07 13:21:06'),
(95, 21, '159412811710.jpg', 1, 0, '2020-07-07 13:21:57', '2020-07-07 13:21:57'),
(97, 21, '159412835113.jpg', 1, 0, '2020-07-07 13:25:51', '2020-07-07 13:25:51'),
(98, 21, '159412835112.jpg', 1, 0, '2020-07-07 13:25:51', '2020-07-07 13:25:51'),
(103, 54, '159419298710.webp', 1, 0, '2020-07-08 07:23:07', '2020-07-08 07:23:07'),
(104, 54, '159419298711.webp', 1, 0, '2020-07-08 07:23:07', '2020-07-08 07:23:07'),
(105, 54, '15941929875.webp', 1, 0, '2020-07-08 07:23:07', '2020-07-08 07:23:07'),
(106, 55, '159419342811.webp', 1, 0, '2020-07-08 07:30:28', '2020-07-08 07:30:28'),
(107, 55, '159419342810.webp', 1, 0, '2020-07-08 07:30:28', '2020-07-08 07:30:28'),
(108, 55, '159419342814.webp', 1, 0, '2020-07-08 07:30:29', '2020-07-08 07:30:29'),
(109, 55, '15941934298.webp', 1, 0, '2020-07-08 07:30:29', '2020-07-08 07:30:29'),
(110, 55, '159419342912.webp', 1, 0, '2020-07-08 07:30:29', '2020-07-08 07:30:29'),
(111, 55, '15941934299.webp', 1, 0, '2020-07-08 07:30:29', '2020-07-08 07:30:29'),
(113, 41, '15941945048.jpg', 1, 0, '2020-07-08 07:48:24', '2020-07-08 07:48:24'),
(114, 41, '159419456510.jpg', 1, 0, '2020-07-08 07:49:25', '2020-07-08 07:49:25'),
(115, 41, '15941945655.jpg', 1, 0, '2020-07-08 07:49:25', '2020-07-08 07:49:25'),
(116, 57, '15942036029.webp', 1, 0, '2020-07-08 10:20:02', '2020-07-08 10:20:02'),
(117, 58, '15942044179.webp', 1, 0, '2020-07-08 10:33:37', '2020-07-08 10:33:37'),
(118, 58, '15942044176.webp', 1, 0, '2020-07-08 10:33:37', '2020-07-08 10:33:37'),
(119, 58, '159420441713.webp', 1, 0, '2020-07-08 10:33:37', '2020-07-08 10:33:37'),
(124, 21, '159489886211.jpg', 1, 0, '2020-07-16 11:27:42', '2020-07-16 11:27:42'),
(125, 60, '15948990369.webp', 1, 0, '2020-07-16 11:30:36', '2020-07-16 11:30:36'),
(126, 60, '159489903611.webp', 1, 0, '2020-07-16 11:30:37', '2020-07-16 11:30:37'),
(127, 60, '15948990377.webp', 1, 0, '2020-07-16 11:30:37', '2020-07-16 11:30:37'),
(128, 60, '15948990379.webp', 1, 0, '2020-07-16 11:30:37', '2020-07-16 11:30:37'),
(129, 60, '15948990377.webp', 1, 0, '2020-07-16 11:30:37', '2020-07-16 11:30:37'),
(135, 62, '15950506066.webp', 1, 0, '2020-07-18 05:36:46', '2020-07-18 05:36:46'),
(136, 62, '15950506069.webp', 1, 0, '2020-07-18 05:36:46', '2020-07-18 05:36:46'),
(139, 62, '15950506068.webp', 1, 0, '2020-07-18 05:36:46', '2020-07-18 05:36:46'),
(140, 62, '159505060612.webp', 1, 0, '2020-07-18 05:36:46', '2020-07-18 05:36:46'),
(141, 61, '15994768757.webp', 1, 0, '2020-09-07 11:07:55', '2020-09-07 11:07:55'),
(142, 61, '15994768756.webp', 1, 0, '2020-09-07 11:07:55', '2020-09-07 11:07:55'),
(143, 61, '159947687514.webp', 1, 0, '2020-09-07 11:07:55', '2020-09-07 11:07:55'),
(147, 53, '159947717212.jpeg', 1, 0, '2020-09-07 11:12:52', '2020-09-07 11:12:52'),
(148, 53, '159947717214.jpeg', 1, 0, '2020-09-07 11:12:52', '2020-09-07 11:12:52'),
(149, 52, '159948206615.webp', 1, 0, '2020-09-07 11:14:53', '2020-09-07 11:14:53'),
(151, 52, '15994772937.webp', 1, 0, '2020-09-07 11:14:53', '2020-09-07 11:14:53'),
(152, 51, '15994774489.webp', 1, 0, '2020-09-07 11:17:28', '2020-09-07 11:17:28'),
(153, 51, '159947744812.webp', 1, 0, '2020-09-07 11:17:28', '2020-09-07 11:17:28'),
(154, 51, '15994774486.webp', 1, 0, '2020-09-07 11:17:28', '2020-09-07 11:17:28'),
(155, 50, '15994775987.webp', 1, 0, '2020-09-07 11:19:58', '2020-09-07 11:19:58'),
(156, 50, '159947759811.webp', 1, 0, '2020-09-07 11:19:58', '2020-09-07 11:19:58'),
(157, 50, '159947759815.webp', 1, 0, '2020-09-07 11:19:58', '2020-09-07 11:19:58'),
(158, 44, '15994778146.webp', 1, 0, '2020-09-07 11:23:34', '2020-09-07 11:23:34'),
(159, 44, '159947781414.webp', 1, 0, '2020-09-07 11:23:34', '2020-09-07 11:23:34'),
(160, 44, '159947781410.webp', 1, 0, '2020-09-07 11:23:34', '2020-09-07 11:23:34'),
(161, 43, '159947811213.jpg', 1, 0, '2020-09-07 11:28:32', '2020-09-07 11:28:32'),
(162, 43, '15994781126.jpg', 1, 0, '2020-09-07 11:28:32', '2020-09-07 11:28:32'),
(164, 43, '159947811312.jpg', 1, 0, '2020-09-07 11:28:33', '2020-09-07 11:28:33'),
(165, 43, '15994781137.jpg', 1, 0, '2020-09-07 11:28:33', '2020-09-07 11:28:33'),
(166, 43, '15994781136.jpg', 1, 0, '2020-09-07 11:28:33', '2020-09-07 11:28:33'),
(167, 43, '159947811314.jpg', 1, 0, '2020-09-07 11:28:33', '2020-09-07 11:28:33'),
(168, 35, '159947912815.webp', 1, 0, '2020-09-07 11:45:28', '2020-09-07 11:45:28'),
(169, 35, '15994791289.webp', 1, 0, '2020-09-07 11:45:28', '2020-09-07 11:45:28'),
(170, 35, '159947912811.webp', 1, 0, '2020-09-07 11:45:28', '2020-09-07 11:45:28'),
(172, 34, '15994793569.webp', 1, 0, '2020-09-07 11:49:16', '2020-09-07 11:49:16'),
(173, 34, '15994793568.webp', 1, 0, '2020-09-07 11:49:16', '2020-09-07 11:49:16'),
(174, 34, '159947935613.webp', 1, 0, '2020-09-07 11:49:17', '2020-09-07 11:49:17'),
(175, 34, '15994794578.webp', 1, 0, '2020-09-07 11:50:57', '2020-09-07 11:50:57'),
(176, 52, '159947729312.webp', 1, 0, '2020-09-07 12:34:26', '2020-09-07 12:34:26'),
(177, 63, '159948230815.webp', 1, 0, '2020-09-07 12:38:28', '2020-09-07 12:38:28'),
(178, 63, '15994823086.webp', 1, 0, '2020-09-07 12:38:28', '2020-09-07 12:38:28'),
(179, 63, '15994823088.webp', 1, 0, '2020-09-07 12:38:29', '2020-09-07 12:38:29'),
(180, 63, '15994823097.webp', 1, 0, '2020-09-07 12:38:29', '2020-09-07 12:38:29'),
(181, 64, '159965866211.png', 1, 0, '2020-09-09 13:37:42', '2020-09-09 13:37:42'),
(182, 66, '159965911913.png', 1, 0, '2020-09-09 13:45:21', '2020-09-09 13:45:21'),
(183, 67, '15998173148.jpg', 1, 0, '2020-09-11 09:41:55', '2020-09-11 09:41:55'),
(184, 68, '160044752214.jpg', 1, 0, '2020-09-18 16:45:23', '2020-09-18 16:45:23');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`id`, `product_id`, `size_id`, `qty`, `created_at`, `updated_at`) VALUES
(13, 13, 1, 5, '2020-06-11 11:02:04', NULL),
(41, 15, 2, 10, '2020-06-15 10:29:27', NULL),
(56, 2, 2, 10, '2020-06-16 09:37:04', NULL),
(66, 20, 2, 2, '2020-06-17 07:56:38', NULL),
(76, 18, 4, 1, '2020-06-17 16:02:30', NULL),
(77, 18, 3, 5, '2020-06-17 16:02:30', NULL),
(78, 18, 1, 10, '2020-06-17 16:02:30', NULL),
(98, 14, 1, 1, '2020-06-22 06:54:53', NULL),
(100, 23, 2, 3, '2020-06-22 13:23:14', NULL),
(107, 22, 1, 5, '2020-06-23 11:33:02', NULL),
(108, 22, 2, 10, '2020-06-23 11:33:02', NULL),
(109, 22, 3, 5, '2020-06-23 11:33:02', NULL),
(126, 7, 3, 10, '2020-06-25 05:17:10', NULL),
(127, 27, 2, 2, '2020-06-25 05:34:59', NULL),
(128, 27, 4, 1, '2020-06-25 05:34:59', NULL),
(132, 26, 3, 4, '2020-06-25 08:50:14', NULL),
(133, 1, 1, 10, '2020-06-25 08:51:44', NULL),
(134, 24, 1, 1, '2020-06-25 09:40:54', NULL),
(146, 16, 1, 10, '2020-06-26 10:04:44', NULL),
(147, 17, 5, 2, '2020-06-26 10:24:07', NULL),
(148, 10, 2, 10, '2020-06-26 12:02:54', NULL),
(149, 10, 3, 10, '2020-06-26 12:02:54', NULL),
(158, 6, 2, 15, '2020-06-29 04:34:38', NULL),
(174, 31, 2, 1, '2020-06-30 07:09:41', NULL),
(175, 32, 3, 3, '2020-06-30 08:51:18', NULL),
(176, 5, 3, 5, '2020-06-30 09:04:37', NULL),
(177, 25, 2, 10, '2020-06-30 09:10:21', NULL),
(178, 4, 1, 10, '2020-06-30 09:11:21', NULL),
(179, 4, 2, 15, '2020-06-30 09:11:21', NULL),
(180, 4, 3, 20, '2020-06-30 09:11:21', NULL),
(201, 36, 1, 10, '2020-07-01 08:58:44', NULL),
(202, 36, 2, 10, '2020-07-01 08:58:44', NULL),
(203, 36, 3, 10, '2020-07-01 08:58:44', NULL),
(207, 38, 1, 10, '2020-07-01 09:06:17', NULL),
(208, 38, 2, 10, '2020-07-01 09:06:17', NULL),
(209, 38, 3, 10, '2020-07-01 09:06:17', NULL),
(213, 37, 1, 10, '2020-07-01 12:05:16', NULL),
(214, 37, 2, 15, '2020-07-01 12:05:16', NULL),
(215, 37, 3, 10, '2020-07-01 12:05:16', NULL),
(242, 29, 2, 20, '2020-07-02 06:42:09', NULL),
(264, 45, 2, 2, '2020-07-03 06:57:33', NULL),
(265, 46, 2, 10, '2020-07-03 07:00:57', NULL),
(266, 47, 1, 1, '2020-07-03 07:01:24', NULL),
(270, 48, 1, 0, '2020-07-03 07:48:44', NULL),
(271, 19, 3, 5, '2020-07-03 07:57:20', NULL),
(280, 28, 1, 5, '2020-07-03 10:49:07', NULL),
(281, 28, 2, 10, '2020-07-03 10:49:07', NULL),
(282, 28, 3, 15, '2020-07-03 10:49:07', NULL),
(283, 28, 4, 20, '2020-07-03 10:49:07', NULL),
(293, 39, 1, 5, '2020-07-03 11:56:10', NULL),
(294, 39, 5, 10, '2020-07-03 11:56:10', NULL),
(295, 49, 1, 1, '2020-07-03 12:03:02', NULL),
(408, 55, 1, 5, '2020-07-08 07:30:29', NULL),
(409, 55, 2, 10, '2020-07-08 07:30:29', NULL),
(411, 56, 2, 2, '2020-07-08 07:36:33', NULL),
(412, 54, 1, 5, '2020-07-08 07:39:57', NULL),
(413, 54, 2, 10, '2020-07-08 07:39:57', NULL),
(414, 54, 3, 15, '2020-07-08 07:39:57', NULL),
(424, 41, 1, 10, '2020-07-08 07:49:25', NULL),
(425, 41, 3, 10, '2020-07-08 07:49:25', NULL),
(426, 41, 2, 10, '2020-07-08 07:49:25', NULL),
(441, 59, 1, 0, '2020-07-08 12:59:16', NULL),
(442, 59, 6, 0, '2020-07-08 12:59:16', NULL),
(455, 58, 2, 5, '2020-07-09 05:44:33', NULL),
(460, 57, 1, 3, '2020-07-09 05:48:29', NULL),
(470, 21, 3, 5, '2020-07-16 11:27:42', NULL),
(471, 21, 2, 10, '2020-07-16 11:27:42', NULL),
(472, 21, 1, 15, '2020-07-16 11:27:42', NULL),
(501, 62, 1, 10, '2020-07-18 05:41:29', NULL),
(502, 62, 2, 5, '2020-07-18 05:41:29', NULL),
(584, 53, 2, 1, '2020-09-07 11:12:52', NULL),
(612, 34, 1, 1, '2020-09-07 11:50:57', '2020-09-11 05:28:42'),
(613, 34, 2, 6, '2020-09-07 11:50:57', '2020-09-18 15:11:21'),
(618, 30, 2, 14, '2020-09-07 12:00:31', '2020-09-19 07:21:10'),
(619, 30, 1, 10, '2020-09-07 12:00:31', '2020-09-11 06:38:17'),
(620, 30, 3, 17, '2020-09-07 12:00:31', NULL),
(621, 30, 4, 9, '2020-09-07 12:00:31', NULL),
(622, 30, 5, 10, '2020-09-07 12:00:31', NULL),
(623, 61, 1, 5, '2020-09-07 12:32:10', NULL),
(624, 61, 2, 5, '2020-09-07 12:32:10', NULL),
(625, 61, 3, 5, '2020-09-07 12:32:10', NULL),
(626, 61, 4, 5, '2020-09-07 12:32:10', NULL),
(627, 61, 5, 5, '2020-09-07 12:32:10', NULL),
(631, 60, 1, 1, '2020-09-07 12:33:12', NULL),
(632, 60, 2, 8, '2020-09-07 12:33:12', '2020-09-19 07:05:55'),
(633, 60, 3, 5, '2020-09-07 12:33:12', NULL),
(647, 43, 1, 0, '2020-09-08 05:57:17', '2020-09-18 15:11:22'),
(648, 43, 3, 10, '2020-09-08 05:57:17', NULL),
(649, 43, 2, 8, '2020-09-08 05:57:17', '2020-09-08 12:58:12'),
(651, 42, 1, 9, '2020-09-08 12:07:47', NULL),
(652, 42, 3, 7, '2020-09-08 12:07:47', '2020-09-10 11:45:22'),
(653, 35, 1, 5, '2020-09-08 12:09:23', '2020-09-19 07:21:10'),
(654, 51, 1, 0, '2020-09-08 12:10:28', '2020-09-18 14:51:56'),
(655, 51, 6, 5, '2020-09-08 12:10:28', NULL),
(656, 51, 3, 1, '2020-09-08 12:10:28', '2020-09-18 14:51:56'),
(657, 52, 1, 4, '2020-09-08 12:11:58', '2020-09-19 07:05:55'),
(658, 52, 2, 5, '2020-09-08 12:11:58', NULL),
(659, 52, 3, 5, '2020-09-08 12:11:58', NULL),
(660, 64, 3, 10, '2020-09-09 13:37:42', NULL),
(661, 66, 3, 10, '2020-09-09 13:45:21', NULL),
(662, 44, 2, 1, '2020-09-10 10:55:09', NULL),
(663, 44, 4, 3, '2020-09-10 10:55:09', NULL),
(664, 33, 1, 0, '2020-09-10 13:47:35', '2020-09-18 16:05:28'),
(665, 33, 2, 5, '2020-09-10 13:47:35', '2020-09-19 07:21:10'),
(666, 33, 3, 12, '2020-09-10 13:47:35', '2020-09-19 07:21:10'),
(667, 33, 4, 20, '2020-09-10 13:47:35', NULL),
(668, 67, 1, 10, '2020-09-11 09:41:55', NULL),
(669, 50, 1, 6, '2020-09-18 16:16:51', '2020-09-18 19:42:25'),
(670, 50, 2, 7, '2020-09-18 16:16:51', NULL),
(671, 50, 3, 4, '2020-09-18 16:16:51', NULL),
(672, 68, 1, 10, '2020-09-18 16:45:23', NULL),
(673, 63, 1, 0, '2020-09-19 05:53:39', '2020-09-19 07:05:55'),
(674, 63, 2, 0, '2020-09-19 05:53:39', '2020-09-19 07:05:55'),
(675, 63, 3, 8, '2020-09-19 05:53:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_stock_history`
--

CREATE TABLE `product_stock_history` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 for purchase and 2 for ordr',
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_stock_history`
--

INSERT INTO `product_stock_history` (`id`, `product_id`, `size_id`, `qty`, `type`, `description`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 30, 1, 10, 1, 'Purchase', NULL, '2020-08-13 11:09:59', '2020-08-13 11:09:59'),
(2, 33, 3, 5, 1, 'Purchase', NULL, '2020-08-13 11:09:59', '2020-08-13 11:09:59'),
(3, 61, 1, 10, 1, 'Purchase (Bill No.3)', NULL, '2020-08-13 11:32:15', '2020-08-13 11:32:15'),
(4, 53, 4, 5, 1, 'Purchase (Bill No.3)', NULL, '2020-08-13 11:32:15', '2020-08-13 11:32:15'),
(5, 61, 1, 10, 2, 'Purchase (Bill No.3)', NULL, '2020-08-13 11:33:18', '2020-08-13 11:33:18'),
(6, 53, 4, 5, 3, 'Purchase', NULL, '2020-08-13 11:34:40', '2020-08-13 11:34:40'),
(7, 61, 1, 15, 2, 'Purchase (Bill No.3)', NULL, '2020-08-13 11:37:08', '2020-08-13 11:37:08'),
(8, 30, 1, 100, 1, 'Purchase (Bill No.qqqq)', NULL, '2020-08-13 11:43:47', '2020-08-13 11:43:47'),
(9, 30, 1, 15, 2, 'Purchase (Bill No.qqqq)', NULL, '2020-08-13 11:44:26', '2020-08-13 11:44:26'),
(10, 61, 1, 15, 2, 'Purchase (Bill No.3)', NULL, '2020-08-13 11:58:21', '2020-08-13 11:58:21'),
(11, 61, 5, 8, 2, 'Purchase (Bill No.3)', NULL, '2020-08-13 11:58:21', '2020-08-13 11:58:21'),
(12, 53, 1, 1, 1, 'Purchase (Bill No.1)', NULL, '2020-08-14 09:19:42', '2020-08-14 09:19:42'),
(13, 53, 1, 10, 2, 'Purchase (Bill No.1)', NULL, '2020-08-15 17:50:12', '2020-08-15 17:50:12'),
(14, 53, 1, 10, 3, 'Purchase', NULL, '2020-08-15 17:54:38', '2020-08-15 17:54:38'),
(15, 53, 2, 5, 2, 'Purchase (Bill No.1)', NULL, '2020-08-15 17:54:51', '2020-08-15 17:54:51'),
(16, 53, 2, 5, 3, 'Purchase', NULL, '2020-08-15 18:02:34', '2020-08-15 18:02:34'),
(17, 30, 1, 15, 2, 'Purchase (Bill No.1234)', NULL, '2020-08-17 09:17:46', '2020-08-17 09:17:46'),
(18, 33, 2, 8, 2, 'Purchase (Bill No.1234)', NULL, '2020-08-17 09:17:46', '2020-08-17 09:17:46'),
(19, 30, 1, 15, 2, 'Purchase (Bill No.1234)', NULL, '2020-08-17 09:18:32', '2020-08-17 09:18:32'),
(20, 33, 2, -10, 2, 'Purchase (Bill No.1234)', NULL, '2020-08-17 09:18:32', '2020-08-17 09:18:32'),
(21, 61, 1, 15, 3, 'Purchase', NULL, '2020-08-17 09:28:00', '2020-08-17 09:28:00'),
(22, 61, 5, 8, 2, 'Purchase (Bill No.3)', NULL, '2020-08-17 09:28:02', '2020-08-17 09:28:02'),
(23, 61, 5, 8, 2, 'Purchase (Bill No.3)', NULL, '2020-08-17 09:29:19', '2020-08-17 09:29:19'),
(24, 50, 1, 2, 2, 'Purchase (Bill No.3)', NULL, '2020-08-17 09:29:19', '2020-08-17 09:29:19'),
(25, 50, 1, 2, 3, 'Purchase', NULL, '2020-08-17 09:29:51', '2020-08-17 09:29:51'),
(26, 61, 5, 8, 2, 'Purchase (Bill No.3)', NULL, '2020-08-17 09:29:53', '2020-08-17 09:29:53'),
(27, 30, 1, 15, 2, 'Purchase (Bill No.1234)', NULL, '2020-08-17 09:30:29', '2020-08-17 09:30:29'),
(28, 33, 2, -10, 2, 'Purchase (Bill No.1234)', NULL, '2020-08-17 09:30:29', '2020-08-17 09:30:29'),
(29, 50, 4, 3, 2, 'Purchase (Bill No.1234)', NULL, '2020-08-17 09:30:29', '2020-08-17 09:30:29'),
(30, 50, 4, 3, 3, 'Purchase', NULL, '2020-08-17 09:31:04', '2020-08-17 09:31:04'),
(31, 30, 1, 15, 2, 'Purchase (Bill No.1234)', NULL, '2020-08-17 09:31:07', '2020-08-17 09:31:07'),
(32, 33, 2, -10, 2, 'Purchase (Bill No.1234)', NULL, '2020-08-17 09:31:07', '2020-08-17 09:31:07'),
(33, 50, 4, 2, 1, 'Purchase (Bill No.456657)', NULL, '2020-08-17 09:36:52', '2020-08-17 09:36:52'),
(34, 50, 4, 2, 3, 'Purchase', NULL, '2020-08-17 09:39:38', '2020-08-17 09:39:38'),
(35, 30, 1, 15, 2, 'Purchase (Bill No.1234)', NULL, '2020-08-17 09:40:43', '2020-08-17 09:40:43'),
(36, 33, 2, 1, 2, 'Purchase (Bill No.1234)', NULL, '2020-08-17 09:40:43', '2020-08-17 09:40:43'),
(37, 50, 4, 2, 2, 'Purchase (Bill No.1234)', NULL, '2020-08-17 09:40:43', '2020-08-17 09:40:43'),
(38, 50, 4, 2, 3, 'Purchase', NULL, '2020-08-17 09:42:55', '2020-08-17 09:42:55'),
(39, 30, 1, 15, 2, 'Purchase (Bill No.1234)', NULL, '2020-08-17 09:42:57', '2020-08-17 09:42:57'),
(40, 33, 2, 1, 2, 'Purchase (Bill No.1234)', NULL, '2020-08-17 09:42:57', '2020-08-17 09:42:57'),
(41, 61, 5, 8, 3, 'Purchase', NULL, '2020-08-17 12:03:16', '2020-08-17 12:03:16'),
(42, 61, 5, 3, 1, 'Purchase (Bill No.233)', NULL, '2020-08-17 12:04:31', '2020-08-17 12:04:31'),
(43, 61, 5, 3, 3, 'Delete Purchase ', NULL, '2020-08-17 12:04:43', '2020-08-17 12:04:43'),
(44, 30, 1, 1, 2, 'Purchase (Bill No.4566579000)', NULL, '2020-08-17 12:23:01', '2020-08-17 12:23:01'),
(45, 30, 1, 1, 3, 'Purchase', NULL, '2020-08-17 12:26:03', '2020-08-17 12:26:03'),
(46, 30, 1, 15, 3, 'Purchase', NULL, '2020-08-19 07:26:31', '2020-08-19 07:26:31'),
(47, 33, 2, 1, 2, 'Purchase (Bill No.1234)', NULL, '2020-08-19 07:26:42', '2020-08-19 07:26:42'),
(48, 30, 2, 15, 2, 'Purchase (Bill No.1234)', NULL, '2020-08-19 07:26:42', '2020-08-19 07:26:42'),
(49, 30, 3, 10, 1, 'Purchase (Bill No.501)', NULL, '2020-08-19 14:50:10', '2020-08-19 14:50:10'),
(50, 34, 1, 2, 4, 'Order', 78, '2020-09-01 15:59:56', '2020-09-01 15:59:56'),
(51, 43, 1, 1, 4, 'Order', 78, '2020-09-01 15:59:56', '2020-09-01 15:59:56'),
(52, 34, 1, 1, 4, 'Order', 79, '2020-09-01 16:06:43', '2020-09-01 16:06:43'),
(53, 33, 2, 2, 4, 'Order', 79, '2020-09-01 16:06:43', '2020-09-01 16:06:43'),
(54, 33, 1, 1, 4, 'Order', 79, '2020-09-01 16:06:43', '2020-09-01 16:06:43'),
(55, 35, 1, 1, 4, 'Order', 79, '2020-09-01 16:06:43', '2020-09-01 16:06:43'),
(56, 50, 1, 3, 1, 'Purchase (Bill No.123)', NULL, '2020-09-07 07:31:44', '2020-09-07 07:31:44'),
(57, 60, 1, 1, 4, 'Order', 82, '2020-09-07 09:29:42', '2020-09-07 09:29:42'),
(58, 50, 2, 2, 4, 'Order', 82, '2020-09-07 09:29:42', '2020-09-07 09:29:42'),
(59, 42, 1, 1, 4, 'Order', 82, '2020-09-07 09:29:42', '2020-09-07 09:29:42'),
(60, 43, 2, 1, 4, 'Order', 83, '2020-09-07 09:40:03', '2020-09-07 09:40:03'),
(61, 60, 1, 1, 4, 'Order', 83, '2020-09-07 09:40:03', '2020-09-07 09:40:03'),
(62, 30, 4, 1, 4, 'Order', 83, '2020-09-07 09:40:03', '2020-09-07 09:40:03'),
(63, 34, 2, 2, 4, 'Order', 84, '2020-09-07 12:07:26', '2020-09-07 12:07:26'),
(64, 30, 1, 1, 4, 'Order', 84, '2020-09-07 12:07:26', '2020-09-07 12:07:26'),
(65, 33, 1, 1, 4, 'Order', 85, '2020-09-07 12:26:48', '2020-09-07 12:26:48'),
(66, 44, 4, 3, 1, 'Purchase (Bill No.456657)', NULL, '2020-09-07 13:24:52', '2020-09-07 13:24:52'),
(67, 50, 3, 1, 4, 'Order', 86, '2020-09-07 13:28:56', '2020-09-07 13:28:56'),
(68, 33, 3, 1, 4, 'Order', 87, '2020-09-08 06:06:36', '2020-09-08 06:06:36'),
(69, 33, 1, 1, 4, 'Order', 90, '2020-09-08 10:32:35', '2020-09-08 10:32:35'),
(70, 43, 1, 2, 4, 'Order', 91, '2020-09-08 12:58:12', '2020-09-08 12:58:12'),
(71, 43, 2, 1, 4, 'Order', 91, '2020-09-08 12:58:12', '2020-09-08 12:58:12'),
(72, 44, 2, 1, 4, 'Order', 91, '2020-09-08 12:58:12', '2020-09-08 12:58:12'),
(73, 50, 2, 1, 4, 'Order', 91, '2020-09-08 12:58:12', '2020-09-08 12:58:12'),
(74, 42, 3, 3, 4, 'Order', 92, '2020-09-10 11:45:22', '2020-09-10 11:45:22'),
(75, 34, 1, 1, 4, 'Order', 93, '2020-09-11 05:28:42', '2020-09-11 05:28:42'),
(76, 43, 1, 1, 4, 'Order', 94, '2020-09-11 05:31:04', '2020-09-11 05:31:04'),
(77, 30, 1, 1, 1, 'Purchase (Bill No.5566)', NULL, '2020-09-11 06:38:17', '2020-09-11 06:38:17'),
(78, 50, 1, 1, 4, 'Order', 95, '2020-09-18 14:51:55', '2020-09-18 14:51:55'),
(79, 51, 3, 2, 4, 'Order', 95, '2020-09-18 14:51:56', '2020-09-18 14:51:56'),
(80, 51, 1, 1, 4, 'Order', 95, '2020-09-18 14:51:56', '2020-09-18 14:51:56'),
(81, 34, 2, 2, 4, 'Order', 96, '2020-09-18 15:11:21', '2020-09-18 15:11:21'),
(82, 43, 1, 2, 4, 'Order', 96, '2020-09-18 15:11:22', '2020-09-18 15:11:22'),
(83, 33, 1, 2, 4, 'Order', 97, '2020-09-18 16:05:28', '2020-09-18 16:05:28'),
(84, 33, 2, 1, 4, 'Order', 97, '2020-09-18 16:05:28', '2020-09-18 16:05:28'),
(85, 50, 1, 1, 4, 'Order', 98, '2020-09-18 19:42:25', '2020-09-18 19:42:25'),
(86, 63, 1, 2, 4, 'Order', 99, '2020-09-19 07:05:55', '2020-09-19 07:05:55'),
(87, 52, 1, 1, 4, 'Order', 99, '2020-09-19 07:05:55', '2020-09-19 07:05:55'),
(88, 60, 2, 2, 4, 'Order', 99, '2020-09-19 07:05:55', '2020-09-19 07:05:55'),
(89, 63, 2, 2, 4, 'Order', 99, '2020-09-19 07:05:55', '2020-09-19 07:05:55'),
(90, 30, 2, 2, 4, 'Order', 100, '2020-09-19 07:21:10', '2020-09-19 07:21:10'),
(91, 33, 2, 2, 4, 'Order', 100, '2020-09-19 07:21:10', '2020-09-19 07:21:10'),
(92, 33, 3, 2, 4, 'Order', 100, '2020-09-19 07:21:10', '2020-09-19 07:21:10'),
(93, 35, 1, 1, 4, 'Order', 100, '2020-09-19 07:21:10', '2020-09-19 07:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `bill_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `bill_date` date NOT NULL,
  `payment_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 for cash and 2 for credit',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `supplier_id`, `bill_no`, `bill_date`, `payment_type`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '2020-08-14', 2, 0, '2018-08-13 11:09:59', '2020-09-07 12:56:24'),
(2, 5, '3', '2020-08-14', 2, 1, '2019-08-13 11:32:15', '2020-09-07 12:56:30'),
(3, 1, '1234', '2020-08-12', 1, 0, '2020-08-13 11:43:47', '2020-08-19 07:26:42'),
(4, 1, '1', '2020-08-14', 1, 1, '2020-08-14 09:19:42', '2020-08-15 18:02:33'),
(5, 1, '4566579000', '2020-08-03', 1, 1, '2020-08-17 09:36:52', '2020-08-17 12:26:28'),
(6, 5, '233', '2020-08-16', 2, 1, '2020-08-17 12:04:31', '2020-08-17 12:04:43'),
(7, 9, '501', '2020-08-19', 1, 0, '2019-08-19 14:50:10', '2020-09-08 06:45:54'),
(8, 1, '123', '2020-09-04', 1, 0, '2020-09-07 07:31:44', '2020-09-08 06:46:51'),
(9, 1, '456657', '2020-09-07', 1, 0, '2020-09-07 13:24:51', '2020-09-07 13:24:51'),
(10, 10, '5566', '2020-09-16', 1, 0, '2020-09-11 06:38:17', '2020-09-11 06:38:17');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_product`
--

CREATE TABLE `purchase_product` (
  `id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `purchase_product`
--

INSERT INTO `purchase_product` (`id`, `purchase_id`, `product_id`, `size_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 30, 1, 10, '1000', '2020-08-13 11:09:59', NULL),
(2, 1, 33, 3, 5, '1500', '2020-08-13 11:09:59', NULL),
(9, 3, 33, 2, 1, '800', '2020-08-17 09:17:46', '2020-08-19 07:26:42'),
(10, 3, 30, 2, 15, '270', '2020-08-19 07:26:42', NULL),
(11, 7, 30, 3, 10, '780', '2020-08-19 14:50:10', NULL),
(12, 8, 50, 1, 3, '800', '2020-09-07 07:31:44', NULL),
(13, 9, 44, 4, 3, '1000', '2020-09-07 13:24:51', NULL),
(14, 10, 30, 1, 1, '150', '2020-09-11 06:38:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `flag` enum('1','2') NOT NULL COMMENT '1:new arrival     2:trends',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `product_id`, `name`, `email`, `rating`, `comment`, `title`, `flag`, `is_deleted`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'test new arrival', 'test@gmail.com', 3, 'test comment arrival', 'test title arrival', '1', 0, 1, '2020-06-06 13:02:11', '2020-06-06 13:02:11'),
(2, 2, 'test2', 'test2@gmail.com', 4, 'test', 'test title', '1', 0, 1, '2020-06-08 10:07:36', '2020-06-08 10:07:36');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` int(11) NOT NULL,
  `from_km` double NOT NULL,
  `to_km` double NOT NULL,
  `rate` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `from_km`, `to_km`, `rate`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 0, 25, 5, 1, 0, '2020-07-10 08:52:59', '2020-07-10 09:15:32'),
(2, -1233, -2345, 23333, 1, 1, '2020-07-10 09:15:57', '2020-07-10 09:16:03'),
(3, 12313, 12312, 32123, 0, 0, '2020-07-10 09:17:52', '2020-07-10 12:40:40'),
(4, 5.5, 5.5, 5.5, 1, 0, '2020-07-10 09:18:22', '2020-07-10 09:18:22'),
(5, 3, 33, 33, 1, 0, '2020-07-10 09:24:52', '2020-07-10 09:24:52'),
(6, 3.3, 3.3, 3.3, 1, 0, '2020-07-10 09:27:03', '2020-07-10 09:27:03'),
(7, 4, 43, 4, 1, 0, '2020-07-10 09:28:25', '2020-07-10 09:28:41'),
(8, 10.1, 10.1, 10.1, 1, 1, '2020-07-10 09:31:09', '2020-07-10 09:31:39'),
(9, 0.007, 0.008, 0.809, 1, 0, '2020-07-10 12:25:10', '2020-07-10 12:38:38'),
(10, 909.9, 5.555, 87000, 1, 1, '2020-07-10 12:27:46', '2020-07-10 12:37:43'),
(11, 900, -2345, 15, 1, 0, '2020-07-10 12:43:19', '2020-07-10 12:43:41'),
(12, 10.99, 55.55, 0, 1, 0, '2020-07-10 12:44:02', '2020-07-10 12:44:02'),
(13, -1233, -2345, 23333, 1, 1, '2020-07-10 12:44:56', '2020-07-10 12:45:02');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'S', 1, 0, '2020-06-09 07:23:45', '2020-07-07 12:02:47'),
(2, 'M', 1, 0, '2020-06-09 07:23:50', '2020-07-07 11:15:34'),
(3, 'L', 1, 0, '2020-06-09 07:23:55', '2020-07-07 11:15:22'),
(4, 'XL', 1, 0, '2020-06-09 07:24:04', '2020-07-07 11:15:05'),
(5, '2XL', 1, 0, '2020-06-10 05:54:38', '2020-07-07 11:14:53'),
(6, '3XL', 1, 0, '2020-06-10 05:54:51', '2020-07-07 11:14:41'),
(7, 'Testn', 0, 1, '2020-06-11 13:48:20', '2020-06-11 13:48:32'),
(8, '4XL', 1, 0, '2020-06-15 07:58:39', '2020-07-07 11:14:29'),
(9, 'tes', 1, 1, '2020-06-15 07:59:43', '2020-06-17 11:09:28'),
(10, 'ASs', 1, 1, '2020-06-17 07:11:20', '2020-06-17 11:09:24'),
(11, 'sd', 1, 1, '2020-06-17 12:08:54', '2020-06-17 12:08:58'),
(12, '5XL', 1, 0, '2020-06-17 16:47:15', '2020-08-04 12:08:13'),
(13, '6XL', 1, 0, '2020-06-17 16:47:33', '2020-09-10 10:29:29'),
(14, '677', 1, 1, '2020-06-24 07:02:59', '2020-06-24 13:02:33'),
(15, 'p', 1, 1, '2020-06-24 13:02:21', '2020-06-24 13:02:27');

-- --------------------------------------------------------

--
-- Table structure for table `size_information`
--

CREATE TABLE `size_information` (
  `id` int(11) NOT NULL,
  `size_id` int(11) DEFAULT NULL,
  `chest` varchar(45) DEFAULT NULL,
  `waist` varchar(45) DEFAULT NULL,
  `hips` varchar(45) DEFAULT NULL,
  `length` varchar(45) DEFAULT NULL,
  `shoulder` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size_information`
--

INSERT INTO `size_information` (`id`, `size_id`, `chest`, `waist`, `hips`, `length`, `shoulder`, `created_at`, `updated_at`) VALUES
(1, 6, '36', '34', '40', '24', '14', '2020-06-16 06:21:47', '2020-07-08 11:17:13'),
(4, 5, '32', '32', '32', '32', '32', '2020-06-19 08:42:21', '2020-07-08 11:16:29'),
(5, 4, '32', '26', '30', '12', '15', '2020-06-22 09:34:04', '2020-07-08 09:17:36'),
(6, 3, '78', '89', '87', '90', '10', '2020-06-23 11:45:31', '2020-07-08 11:16:21'),
(7, 2, '212', '221', '789', '890', '90', '2020-06-24 07:03:59', '2020-07-08 10:21:46'),
(8, 1, '26', '28', '28', '30', '15', '2020-06-24 13:05:12', '2020-07-08 11:15:53');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_api_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `state_api_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 412, 'Kabol', '2018-07-21 13:39:32', '2018-07-21 13:39:32'),
(2, 1, 1367, 'Herat', '2018-07-21 13:39:32', '2018-07-21 13:39:32'),
(3, 1, 1743, 'Vardak', '2018-07-21 13:39:32', '2018-07-21 13:39:32'),
(4, 1, 1915, 'Zabol', '2018-07-21 13:39:32', '2018-07-21 13:39:32'),
(5, 1, 2158, 'Kandahar', '2018-07-21 13:39:32', '2018-07-21 13:39:32'),
(6, 1, 2372, 'Kondoz', '2018-07-21 13:39:32', '2018-07-21 13:39:32'),
(7, 1, 2420, 'Ghazni', '2018-07-21 13:39:32', '2018-07-21 13:39:32'),
(8, 1, 2928, 'Daykondi', '2018-07-21 13:39:32', '2018-07-21 13:39:32'),
(9, 2, 569, 'Fier', '2018-07-21 13:39:32', '2018-07-21 13:39:32'),
(10, 2, 811, 'Durres', '2018-07-21 13:39:32', '2018-07-21 13:39:32'),
(11, 2, 827, 'Elbasan', '2018-07-21 13:39:32', '2018-07-21 13:39:32'),
(12, 2, 828, 'Tirane', '2018-07-21 13:39:32', '2018-07-21 13:39:32'),
(13, 2, 1237, 'Korce', '2018-07-21 13:39:32', '2018-07-21 13:39:32'),
(14, 2, 1275, 'Berat', '2018-07-21 13:39:32', '2018-07-21 13:39:32'),
(15, 2, 1364, 'Diber', '2018-07-21 13:39:32', '2018-07-21 13:39:32'),
(16, 2, 1592, 'Shkoder', '2018-07-21 13:39:32', '2018-07-21 13:39:32'),
(17, 2, 2031, 'Gjirokaster', '2018-07-21 13:39:32', '2018-07-21 13:39:32'),
(18, 2, 2367, 'Vlore', '2018-07-21 13:39:32', '2018-07-21 13:39:32'),
(19, 2, 2430, 'Lezhe', '2018-07-21 13:39:32', '2018-07-21 13:39:32'),
(20, 3, 1, 'Djelfa', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(21, 3, 459, 'Oran', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(22, 3, 514, 'Alger', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(23, 3, 568, 'Tlemcen', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(24, 3, 589, 'Tiaret', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(25, 3, 643, 'Batna', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(26, 3, 658, 'Setif', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(27, 3, 699, 'Mascara', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(28, 3, 706, 'Constantine', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(29, 3, 755, 'Adrar', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(30, 3, 797, 'Bechar', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(31, 3, 850, 'Biskra', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(32, 3, 918, 'Skikda', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(33, 3, 1019, 'Tebessa', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(34, 3, 1045, 'Mila', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(35, 3, 1128, 'Relizane', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(36, 3, 1130, 'Jijel', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(37, 3, 1153, 'Chlef', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(38, 3, 1160, 'Mostaganem', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(39, 3, 1192, 'Bejaia', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(40, 3, 1207, 'Laghouat', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(41, 3, 1255, 'Blida', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(42, 3, 1265, 'Annaba', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(43, 3, 1517, 'Boumerdes', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(44, 3, 1639, 'Tipaza', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(45, 3, 1686, 'Tizi Ouzou', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(46, 3, 2037, 'Ouargla', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(47, 3, 2106, 'Medea', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(48, 3, 2107, 'Saida', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(49, 3, 2108, 'Tindouf', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(50, 3, 2185, 'Khenchela', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(51, 3, 2186, 'Ain Defla', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(52, 3, 2451, 'El Bayadh', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(53, 3, 2452, 'Oum el Bouaghi', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(54, 3, 2456, 'El Oued', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(55, 3, 2473, 'Bordj Bou Arreridj', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(56, 3, 2710, 'Naama', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(57, 3, 2716, 'Bouira', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(58, 3, 2723, 'Sidi Bel Abbes', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(59, 3, 2724, 'M\'sila', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(60, 3, 2725, 'Tissemsilt', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(61, 3, 2840, 'Tamanghasset', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(62, 3, 2903, 'Illizi', '2018-07-21 13:39:33', '2018-07-21 13:39:33'),
(63, 5, 1461, 'Escaldes-Engordany', '2018-07-21 13:39:34', '2018-07-21 13:39:34'),
(64, 5, 1464, 'Andorra la Vella', '2018-07-21 13:39:34', '2018-07-21 13:39:34'),
(65, 5, 1512, 'Canillo', '2018-07-21 13:39:34', '2018-07-21 13:39:34'),
(66, 5, 1637, 'La Massana', '2018-07-21 13:39:34', '2018-07-21 13:39:34'),
(67, 5, 1802, 'Encamp', '2018-07-21 13:39:34', '2018-07-21 13:39:34'),
(68, 5, 1903, 'Sant Julia de Loria', '2018-07-21 13:39:34', '2018-07-21 13:39:34'),
(69, 5, 2044, 'Ordino', '2018-07-21 13:39:34', '2018-07-21 13:39:34'),
(70, 6, 791, 'Luanda', '2018-07-21 13:39:35', '2018-07-21 13:39:35'),
(71, 6, 1475, 'Benguela', '2018-07-21 13:39:35', '2018-07-21 13:39:35'),
(72, 6, 1813, 'Huila', '2018-07-21 13:39:35', '2018-07-21 13:39:35'),
(73, 6, 1962, 'Bie', '2018-07-21 13:39:35', '2018-07-21 13:39:35'),
(74, 6, 1985, 'Cabinda', '2018-07-21 13:39:35', '2018-07-21 13:39:35'),
(75, 6, 2025, 'Malanje', '2018-07-21 13:39:35', '2018-07-21 13:39:35'),
(76, 6, 2026, 'Zaire', '2018-07-21 13:39:35', '2018-07-21 13:39:35'),
(77, 6, 2497, 'Huambo', '2018-07-21 13:39:35', '2018-07-21 13:39:35'),
(78, 6, 2656, 'Cuanza Sul', '2018-07-21 13:39:35', '2018-07-21 13:39:35'),
(79, 6, 2672, 'Uige', '2018-07-21 13:39:35', '2018-07-21 13:39:35'),
(80, 6, 2720, 'Namibe', '2018-07-21 13:39:35', '2018-07-21 13:39:35'),
(81, 6, 2794, 'Cuanza Norte', '2018-07-21 13:39:35', '2018-07-21 13:39:35'),
(82, 6, 2797, 'Bengo', '2018-07-21 13:39:35', '2018-07-21 13:39:35'),
(83, 6, 2909, 'Lunda Sul', '2018-07-21 13:39:35', '2018-07-21 13:39:35'),
(84, 6, 2910, 'Cunene', '2018-07-21 13:39:35', '2018-07-21 13:39:35'),
(85, 9, 916, 'Saint John', '2018-07-21 13:39:36', '2018-07-21 13:39:36'),
(86, 9, 1731, 'Saint Philip', '2018-07-21 13:39:36', '2018-07-21 13:39:36'),
(87, 9, 1761, 'Saint Peter', '2018-07-21 13:39:36', '2018-07-21 13:39:36'),
(88, 9, 1763, 'Saint Paul', '2018-07-21 13:39:36', '2018-07-21 13:39:36'),
(89, 9, 2143, 'Saint George', '2018-07-21 13:39:36', '2018-07-21 13:39:36'),
(90, 9, 2642, 'Saint Mary', '2018-07-21 13:39:36', '2018-07-21 13:39:36'),
(91, 10, 38, 'Buenos Aires', '2018-07-21 13:39:37', '2018-07-21 13:39:37'),
(92, 10, 95, 'Santa Fe', '2018-07-21 13:39:37', '2018-07-21 13:39:37'),
(93, 10, 134, 'Distrito Federal', '2018-07-21 13:39:37', '2018-07-21 13:39:37'),
(94, 10, 139, 'Entre Rios', '2018-07-21 13:39:37', '2018-07-21 13:39:37'),
(95, 10, 188, 'Cordoba', '2018-07-21 13:39:37', '2018-07-21 13:39:37'),
(96, 10, 927, 'Neuquen', '2018-07-21 13:39:37', '2018-07-21 13:39:37'),
(97, 10, 976, 'Jujuy', '2018-07-21 13:39:37', '2018-07-21 13:39:37'),
(98, 10, 1082, 'Tucuman', '2018-07-21 13:39:37', '2018-07-21 13:39:37'),
(99, 10, 1132, 'Mendoza', '2018-07-21 13:39:37', '2018-07-21 13:39:37'),
(100, 10, 1174, 'Catamarca', '2018-07-21 13:39:37', '2018-07-21 13:39:37'),
(101, 10, 1270, 'Rio Negro', '2018-07-21 13:39:37', '2018-07-21 13:39:37'),
(102, 10, 1369, 'Salta', '2018-07-21 13:39:37', '2018-07-21 13:39:37'),
(103, 10, 1476, 'San Juan', '2018-07-21 13:39:37', '2018-07-21 13:39:37'),
(104, 10, 1548, 'Corrientes', '2018-07-21 13:39:37', '2018-07-21 13:39:37'),
(105, 10, 1552, 'Misiones', '2018-07-21 13:39:37', '2018-07-21 13:39:37'),
(106, 10, 1619, 'Tierra del Fuego', '2018-07-21 13:39:37', '2018-07-21 13:39:37'),
(107, 10, 1712, 'La Pampa', '2018-07-21 13:39:37', '2018-07-21 13:39:37'),
(108, 10, 1721, 'San Luis', '2018-07-21 13:39:37', '2018-07-21 13:39:37'),
(109, 10, 1738, 'Santiago del Estero', '2018-07-21 13:39:37', '2018-07-21 13:39:37'),
(110, 10, 1891, 'Formosa', '2018-07-21 13:39:37', '2018-07-21 13:39:37'),
(111, 10, 1925, 'Chaco', '2018-07-21 13:39:37', '2018-07-21 13:39:37'),
(112, 10, 1956, 'Santa Cruz', '2018-07-21 13:39:37', '2018-07-21 13:39:37'),
(113, 10, 2006, 'Chubut', '2018-07-21 13:39:37', '2018-07-21 13:39:37'),
(114, 10, 2123, 'La Rioja', '2018-07-21 13:39:37', '2018-07-21 13:39:37'),
(115, 11, 359, 'Yerevan', '2018-07-21 13:39:38', '2018-07-21 13:39:38'),
(116, 11, 789, 'Kotayk\'', '2018-07-21 13:39:38', '2018-07-21 13:39:38'),
(117, 11, 1405, 'Ararat', '2018-07-21 13:39:38', '2018-07-21 13:39:38'),
(118, 11, 1615, 'Lorri', '2018-07-21 13:39:38', '2018-07-21 13:39:38'),
(119, 11, 1711, 'Syunik\'', '2018-07-21 13:39:38', '2018-07-21 13:39:38'),
(120, 11, 1770, 'Armavir', '2018-07-21 13:39:38', '2018-07-21 13:39:38'),
(121, 11, 1845, 'Shirak', '2018-07-21 13:39:38', '2018-07-21 13:39:38'),
(122, 11, 2021, 'Aragatsotn', '2018-07-21 13:39:38', '2018-07-21 13:39:38'),
(123, 11, 2062, 'Geghark\'unik\'', '2018-07-21 13:39:38', '2018-07-21 13:39:38'),
(124, 11, 2603, 'Tavush', '2018-07-21 13:39:38', '2018-07-21 13:39:38'),
(125, 13, 4, 'New South Wales', '2018-07-21 13:39:39', '2018-07-21 13:39:39'),
(126, 13, 53, 'Northern Territory', '2018-07-21 13:39:39', '2018-07-21 13:39:39'),
(127, 13, 54, 'Victoria', '2018-07-21 13:39:39', '2018-07-21 13:39:39'),
(128, 13, 79, 'Western Australia', '2018-07-21 13:39:39', '2018-07-21 13:39:39'),
(129, 13, 180, 'Queensland', '2018-07-21 13:39:39', '2018-07-21 13:39:39'),
(130, 13, 250, 'Australian Capital Territory', '2018-07-21 13:39:39', '2018-07-21 13:39:39'),
(131, 13, 491, 'South Australia', '2018-07-21 13:39:39', '2018-07-21 13:39:39'),
(132, 13, 993, 'Tasmania', '2018-07-21 13:39:39', '2018-07-21 13:39:39'),
(133, 14, 366, 'Wien', '2018-07-21 13:39:39', '2018-07-21 13:39:39'),
(134, 14, 470, 'Tirol', '2018-07-21 13:39:39', '2018-07-21 13:39:39'),
(135, 14, 622, 'Steiermark', '2018-07-21 13:39:39', '2018-07-21 13:39:39'),
(136, 14, 690, 'Oberosterreich', '2018-07-21 13:39:39', '2018-07-21 13:39:39'),
(137, 14, 739, 'Salzburg', '2018-07-21 13:39:39', '2018-07-21 13:39:39'),
(138, 14, 771, 'Niederosterreich', '2018-07-21 13:39:39', '2018-07-21 13:39:39'),
(139, 14, 869, 'Vorarlberg', '2018-07-21 13:39:39', '2018-07-21 13:39:39'),
(140, 14, 876, 'Karnten', '2018-07-21 13:39:39', '2018-07-21 13:39:39'),
(141, 14, 921, 'Burgenland', '2018-07-21 13:39:39', '2018-07-21 13:39:39'),
(142, 15, 313, 'Baki', '2018-07-21 13:39:40', '2018-07-21 13:39:40'),
(143, 15, 585, 'Lankaran', '2018-07-21 13:39:40', '2018-07-21 13:39:40'),
(144, 15, 2159, 'Ismayilli', '2018-07-21 13:39:40', '2018-07-21 13:39:40'),
(145, 15, 2209, 'Sumqayit', '2018-07-21 13:39:40', '2018-07-21 13:39:40'),
(146, 15, 2271, 'Abseron', '2018-07-21 13:39:40', '2018-07-21 13:39:40'),
(147, 15, 2295, 'Ganca', '2018-07-21 13:39:40', '2018-07-21 13:39:40'),
(148, 15, 2298, 'Quba', '2018-07-21 13:39:40', '2018-07-21 13:39:40'),
(149, 15, 2299, 'Qusar', '2018-07-21 13:39:40', '2018-07-21 13:39:40'),
(150, 15, 2377, 'Zaqatala', '2018-07-21 13:39:40', '2018-07-21 13:39:40'),
(151, 15, 2450, 'Qazax', '2018-07-21 13:39:40', '2018-07-21 13:39:40'),
(152, 15, 2462, 'Xanlar', '2018-07-21 13:39:40', '2018-07-21 13:39:40'),
(153, 15, 2471, 'Calilabad', '2018-07-21 13:39:40', '2018-07-21 13:39:40'),
(154, 15, 2483, 'Ucar', '2018-07-21 13:39:40', '2018-07-21 13:39:40'),
(155, 15, 2488, 'Kurdamir', '2018-07-21 13:39:40', '2018-07-21 13:39:40'),
(156, 15, 2561, 'Naxcivan', '2018-07-21 13:39:40', '2018-07-21 13:39:40'),
(157, 15, 2648, 'Neftcala', '2018-07-21 13:39:40', '2018-07-21 13:39:40'),
(158, 15, 2711, 'Yevlax', '2018-07-21 13:39:40', '2018-07-21 13:39:40'),
(159, 15, 2717, 'Samkir', '2018-07-21 13:39:40', '2018-07-21 13:39:40'),
(160, 15, 2744, 'Saki', '2018-07-21 13:39:40', '2018-07-21 13:39:40'),
(161, 15, 2745, 'Goycay', '2018-07-21 13:39:40', '2018-07-21 13:39:40'),
(162, 15, 2851, 'Goranboy', '2018-07-21 13:39:40', '2018-07-21 13:39:40'),
(163, 15, 2857, 'Xacmaz', '2018-07-21 13:39:40', '2018-07-21 13:39:40'),
(164, 16, 297, 'New Providence', '2018-07-21 13:39:40', '2018-07-21 13:39:40'),
(165, 16, 960, 'Freeport', '2018-07-21 13:39:40', '2018-07-21 13:39:40'),
(166, 16, 1912, 'Harbour Island', '2018-07-21 13:39:40', '2018-07-21 13:39:40'),
(167, 16, 1984, 'Marsh Harbour', '2018-07-21 13:39:40', '2018-07-21 13:39:40'),
(168, 16, 2008, 'Governor\'s Harbour', '2018-07-21 13:39:40', '2018-07-21 13:39:40'),
(169, 16, 2560, 'Fresh Creek', '2018-07-21 13:39:40', '2018-07-21 13:39:40'),
(170, 17, 759, 'Al Manamah', '2018-07-21 13:39:41', '2018-07-21 13:39:41'),
(171, 17, 1215, 'Al Mintaqah ash Shamaliyah', '2018-07-21 13:39:41', '2018-07-21 13:39:41'),
(172, 17, 1708, 'Madinat', '2018-07-21 13:39:41', '2018-07-21 13:39:41'),
(173, 17, 1768, 'Al Hadd', '2018-07-21 13:39:41', '2018-07-21 13:39:41'),
(174, 17, 1795, 'Al Mintaqah al Wusta', '2018-07-21 13:39:41', '2018-07-21 13:39:41'),
(175, 17, 1812, 'Sitrah', '2018-07-21 13:39:41', '2018-07-21 13:39:41'),
(176, 17, 2210, 'Ar Rifa', '2018-07-21 13:39:41', '2018-07-21 13:39:41'),
(177, 17, 2229, 'Jidd Hafs', '2018-07-21 13:39:41', '2018-07-21 13:39:41'),
(178, 17, 2374, 'Al Mintaqah al Gharbiyah', '2018-07-21 13:39:41', '2018-07-21 13:39:41'),
(179, 17, 2875, 'Al Muharraq', '2018-07-21 13:39:41', '2018-07-21 13:39:41'),
(180, 17, 2879, 'Al Asimah', '2018-07-21 13:39:41', '2018-07-21 13:39:41'),
(181, 17, 2888, 'Ash Shamaliyah', '2018-07-21 13:39:41', '2018-07-21 13:39:41'),
(182, 17, 2913, 'Al Wusta', '2018-07-21 13:39:41', '2018-07-21 13:39:41'),
(183, 18, 222, 'Dhaka', '2018-07-21 13:39:42', '2018-07-21 13:39:42'),
(184, 18, 1217, 'Barisal', '2018-07-21 13:39:42', '2018-07-21 13:39:42'),
(185, 18, 1361, 'Rajshahi', '2018-07-21 13:39:42', '2018-07-21 13:39:42'),
(186, 18, 1893, 'Sylhet', '2018-07-21 13:39:42', '2018-07-21 13:39:42'),
(187, 18, 2385, 'Chittagong', '2018-07-21 13:39:42', '2018-07-21 13:39:42'),
(188, 18, 2387, 'Khulna', '2018-07-21 13:39:42', '2018-07-21 13:39:42'),
(189, 19, 577, 'Saint Michael', '2018-07-21 13:39:42', '2018-07-21 13:39:42'),
(190, 19, 966, 'Christ Church', '2018-07-21 13:39:42', '2018-07-21 13:39:42'),
(191, 19, 1273, 'Saint Lucy', '2018-07-21 13:39:42', '2018-07-21 13:39:42'),
(192, 19, 2115, 'Saint Thomas', '2018-07-21 13:39:42', '2018-07-21 13:39:42'),
(193, 19, 2518, 'Saint James', '2018-07-21 13:39:42', '2018-07-21 13:39:42'),
(194, 20, 324, 'Minsk', '2018-07-21 13:39:43', '2018-07-21 13:39:43'),
(195, 20, 365, 'Vitsyebskaya Voblasts\'', '2018-07-21 13:39:43', '2018-07-21 13:39:43'),
(196, 20, 386, 'Homyel\'skaya Voblasts\'', '2018-07-21 13:39:43', '2018-07-21 13:39:43'),
(197, 20, 408, 'Brestskaya Voblasts\'', '2018-07-21 13:39:43', '2018-07-21 13:39:43'),
(198, 20, 574, 'Mahilyowskaya Voblasts\'', '2018-07-21 13:39:43', '2018-07-21 13:39:43'),
(199, 20, 896, 'Hrodzyenskaya Voblasts\'', '2018-07-21 13:39:43', '2018-07-21 13:39:43'),
(200, 20, 2549, 'Minskaya Voblasts\'', '2018-07-21 13:39:43', '2018-07-21 13:39:43'),
(201, 21, 119, 'Liege', '2018-07-21 13:39:43', '2018-07-21 13:39:43'),
(202, 21, 341, 'Limburg', '2018-07-21 13:39:43', '2018-07-21 13:39:43'),
(203, 21, 361, 'Brussels Hoofdstedelijk Gewest', '2018-07-21 13:39:43', '2018-07-21 13:39:43'),
(204, 21, 411, 'Oost-Vlaanderen', '2018-07-21 13:39:43', '2018-07-21 13:39:43'),
(205, 21, 512, 'West-Vlaanderen', '2018-07-21 13:39:43', '2018-07-21 13:39:43'),
(206, 21, 533, 'Antwerpen', '2018-07-21 13:39:43', '2018-07-21 13:39:43'),
(207, 21, 576, 'Vlaams-Brabant', '2018-07-21 13:39:43', '2018-07-21 13:39:43'),
(208, 21, 678, 'Luxembourg', '2018-07-21 13:39:43', '2018-07-21 13:39:43'),
(209, 21, 710, 'Hainaut', '2018-07-21 13:39:43', '2018-07-21 13:39:43'),
(210, 21, 834, 'Namur', '2018-07-21 13:39:43', '2018-07-21 13:39:43'),
(211, 21, 1594, 'Brabant Wallon', '2018-07-21 13:39:43', '2018-07-21 13:39:43'),
(212, 22, 749, 'Belize', '2018-07-21 13:39:44', '2018-07-21 13:39:44'),
(213, 22, 1113, 'Corozal', '2018-07-21 13:39:44', '2018-07-21 13:39:44'),
(214, 22, 1899, 'Cayo', '2018-07-21 13:39:44', '2018-07-21 13:39:44'),
(215, 22, 2437, 'Orange Walk', '2018-07-21 13:39:44', '2018-07-21 13:39:44'),
(216, 22, 2621, 'Stann Creek', '2018-07-21 13:39:44', '2018-07-21 13:39:44'),
(217, 23, 902, 'Littoral', '2018-07-21 13:39:44', '2018-07-21 13:39:44'),
(218, 23, 2015, 'Atakora', '2018-07-21 13:39:44', '2018-07-21 13:39:44'),
(219, 23, 2201, 'Borgou', '2018-07-21 13:39:44', '2018-07-21 13:39:44'),
(220, 23, 2453, 'Oueme', '2018-07-21 13:39:44', '2018-07-21 13:39:44'),
(221, 23, 2856, 'Mono', '2018-07-21 13:39:44', '2018-07-21 13:39:44'),
(222, 23, 2887, 'Atlanyique', '2018-07-21 13:39:44', '2018-07-21 13:39:44'),
(223, 24, 1424, 'Hamilton', '2018-07-21 13:39:45', '2018-07-21 13:39:45'),
(224, 24, 2552, 'Sandys', '2018-07-21 13:39:45', '2018-07-21 13:39:45'),
(225, 24, 2627, 'Devonshire', '2018-07-21 13:39:45', '2018-07-21 13:39:45'),
(226, 25, 1508, 'Thimphu', '2018-07-21 13:39:45', '2018-07-21 13:39:45'),
(227, 25, 2531, 'Mongar', '2018-07-21 13:39:45', '2018-07-21 13:39:45'),
(228, 25, 2536, 'Paro', '2018-07-21 13:39:45', '2018-07-21 13:39:45'),
(229, 25, 2701, 'Chhukha', '2018-07-21 13:39:45', '2018-07-21 13:39:45'),
(230, 25, 2761, 'Punakha', '2018-07-21 13:39:45', '2018-07-21 13:39:45'),
(231, 26, 109, 'Cochabamba', '2018-07-21 13:39:46', '2018-07-21 13:39:46'),
(232, 26, 612, 'La Paz', '2018-07-21 13:39:46', '2018-07-21 13:39:46'),
(233, 26, 913, 'El Beni', '2018-07-21 13:39:46', '2018-07-21 13:39:46'),
(234, 26, 1030, 'Oruro', '2018-07-21 13:39:46', '2018-07-21 13:39:46'),
(235, 26, 1428, 'Chuquisaca', '2018-07-21 13:39:46', '2018-07-21 13:39:46'),
(236, 26, 1659, 'Tarija', '2018-07-21 13:39:46', '2018-07-21 13:39:46'),
(237, 26, 2131, 'Potosi', '2018-07-21 13:39:46', '2018-07-21 13:39:46'),
(238, 26, 2629, 'Pando', '2018-07-21 13:39:46', '2018-07-21 13:39:46'),
(239, 27, 59, 'Federation of Bosnia and Herzegovina', '2018-07-21 13:39:47', '2018-07-21 13:39:47'),
(240, 27, 311, 'Republika Srpska', '2018-07-21 13:39:47', '2018-07-21 13:39:47'),
(241, 28, 478, 'South-East', '2018-07-21 13:39:47', '2018-07-21 13:39:47'),
(242, 28, 1318, 'North-East', '2018-07-21 13:39:47', '2018-07-21 13:39:47'),
(243, 28, 1766, 'North-West', '2018-07-21 13:39:47', '2018-07-21 13:39:47'),
(244, 28, 1968, 'Southern', '2018-07-21 13:39:47', '2018-07-21 13:39:47'),
(245, 28, 2651, 'Kgatleng', '2018-07-21 13:39:47', '2018-07-21 13:39:47'),
(246, 30, 37, 'Rio de Janeiro', '2018-07-21 13:39:48', '2018-07-21 13:39:48'),
(247, 30, 46, 'Ceara', '2018-07-21 13:39:48', '2018-07-21 13:39:48'),
(248, 30, 78, 'Santa Catarina', '2018-07-21 13:39:48', '2018-07-21 13:39:48'),
(249, 30, 80, 'Espirito Santo', '2018-07-21 13:39:48', '2018-07-21 13:39:48'),
(250, 30, 121, 'Bahia', '2018-07-21 13:39:48', '2018-07-21 13:39:48'),
(251, 30, 155, 'Sao Paulo', '2018-07-21 13:39:48', '2018-07-21 13:39:48'),
(252, 30, 561, 'Rio Grande do Sul', '2018-07-21 13:39:48', '2018-07-21 13:39:48'),
(253, 30, 586, 'Minas Gerais', '2018-07-21 13:39:48', '2018-07-21 13:39:48'),
(254, 30, 701, 'Para', '2018-07-21 13:39:48', '2018-07-21 13:39:48'),
(255, 30, 773, 'Parana', '2018-07-21 13:39:48', '2018-07-21 13:39:48'),
(256, 30, 808, 'Pernambuco', '2018-07-21 13:39:48', '2018-07-21 13:39:48'),
(257, 30, 838, 'Amazonas', '2018-07-21 13:39:48', '2018-07-21 13:39:48'),
(258, 30, 970, 'Goias', '2018-07-21 13:39:48', '2018-07-21 13:39:48'),
(259, 30, 1011, 'Sergipe', '2018-07-21 13:39:48', '2018-07-21 13:39:48'),
(260, 30, 1102, 'Mato Grosso do Sul', '2018-07-21 13:39:48', '2018-07-21 13:39:48'),
(261, 30, 1269, 'Rio Grande do Norte', '2018-07-21 13:39:48', '2018-07-21 13:39:48'),
(262, 30, 1293, 'Paraiba', '2018-07-21 13:39:48', '2018-07-21 13:39:48'),
(263, 30, 1297, 'Piaui', '2018-07-21 13:39:48', '2018-07-21 13:39:48'),
(264, 30, 1335, 'Maranhao', '2018-07-21 13:39:48', '2018-07-21 13:39:48'),
(265, 30, 1457, 'Mato Grosso', '2018-07-21 13:39:48', '2018-07-21 13:39:48'),
(266, 30, 1568, 'Alagoas', '2018-07-21 13:39:48', '2018-07-21 13:39:48'),
(267, 30, 1673, 'Tocantins', '2018-07-21 13:39:48', '2018-07-21 13:39:48'),
(268, 30, 1714, 'Roraima', '2018-07-21 13:39:48', '2018-07-21 13:39:48'),
(269, 30, 1723, 'Rondonia', '2018-07-21 13:39:48', '2018-07-21 13:39:48'),
(270, 30, 2113, 'Amapa', '2018-07-21 13:39:48', '2018-07-21 13:39:48'),
(271, 30, 2116, 'Acre', '2018-07-21 13:39:48', '2018-07-21 13:39:48'),
(272, 33, 360, 'Ruse', '2018-07-21 13:39:50', '2018-07-21 13:39:50'),
(273, 33, 380, 'Grad Sofiya', '2018-07-21 13:39:50', '2018-07-21 13:39:50'),
(274, 33, 393, 'Veliko Turnovo', '2018-07-21 13:39:50', '2018-07-21 13:39:50'),
(275, 33, 440, 'Dobrich', '2018-07-21 13:39:50', '2018-07-21 13:39:50'),
(276, 33, 458, 'Blagoevgrad', '2018-07-21 13:39:50', '2018-07-21 13:39:50'),
(277, 33, 477, 'Pazardzhik', '2018-07-21 13:39:50', '2018-07-21 13:39:50'),
(278, 33, 500, 'Plovdiv', '2018-07-21 13:39:50', '2018-07-21 13:39:50'),
(279, 33, 565, 'Varna', '2018-07-21 13:39:50', '2018-07-21 13:39:50'),
(280, 33, 639, 'Sliven', '2018-07-21 13:39:50', '2018-07-21 13:39:50'),
(281, 33, 648, 'Burgas', '2018-07-21 13:39:50', '2018-07-21 13:39:50'),
(282, 33, 666, 'Stara Zagora', '2018-07-21 13:39:50', '2018-07-21 13:39:50'),
(283, 33, 720, 'Pleven', '2018-07-21 13:39:50', '2018-07-21 13:39:50'),
(284, 33, 841, 'Sofiya', '2018-07-21 13:39:50', '2018-07-21 13:39:50'),
(285, 33, 851, 'Khaskovo', '2018-07-21 13:39:50', '2018-07-21 13:39:50'),
(286, 33, 911, 'Lovech', '2018-07-21 13:39:50', '2018-07-21 13:39:50'),
(287, 33, 1009, 'Vidin', '2018-07-21 13:39:50', '2018-07-21 13:39:50'),
(288, 33, 1015, 'Kurdzhali', '2018-07-21 13:39:50', '2018-07-21 13:39:50'),
(289, 33, 1040, 'Yambol', '2018-07-21 13:39:50', '2018-07-21 13:39:50'),
(290, 33, 1059, 'Gabrovo', '2018-07-21 13:39:50', '2018-07-21 13:39:50'),
(291, 33, 1094, 'Kyustendil', '2018-07-21 13:39:50', '2018-07-21 13:39:50'),
(292, 33, 1134, 'Smolyan', '2018-07-21 13:39:50', '2018-07-21 13:39:50'),
(293, 33, 1219, 'Shumen', '2018-07-21 13:39:50', '2018-07-21 13:39:50'),
(294, 33, 1258, 'Razgrad', '2018-07-21 13:39:50', '2018-07-21 13:39:50'),
(295, 33, 1488, 'Silistra', '2018-07-21 13:39:50', '2018-07-21 13:39:50'),
(296, 33, 1492, 'Montana', '2018-07-21 13:39:50', '2018-07-21 13:39:50'),
(297, 33, 1533, 'Vratsa', '2018-07-21 13:39:50', '2018-07-21 13:39:50'),
(298, 33, 1573, 'Pernik', '2018-07-21 13:39:50', '2018-07-21 13:39:50'),
(299, 33, 1789, 'Turgovishte', '2018-07-21 13:39:50', '2018-07-21 13:39:50'),
(300, 33, 1940, 'Mikhaylovgrad', '2018-07-21 13:39:50', '2018-07-21 13:39:50'),
(301, 34, 520, 'Kadiogo', '2018-07-21 13:39:52', '2018-07-21 13:39:52'),
(302, 34, 2187, 'Houet', '2018-07-21 13:39:52', '2018-07-21 13:39:52'),
(303, 34, 2654, 'Kouritenga', '2018-07-21 13:39:52', '2018-07-21 13:39:52'),
(304, 34, 2774, 'Yatenga', '2018-07-21 13:39:52', '2018-07-21 13:39:52'),
(305, 34, 2787, 'Bale', '2018-07-21 13:39:52', '2018-07-21 13:39:52'),
(306, 34, 2905, 'Boulgou', '2018-07-21 13:39:52', '2018-07-21 13:39:52'),
(307, 35, 1860, 'Bujumbura', '2018-07-21 13:39:53', '2018-07-21 13:39:53'),
(308, 36, 226, 'Phnum Penh', '2018-07-21 13:39:53', '2018-07-21 13:39:53'),
(309, 36, 1649, 'Takeo', '2018-07-21 13:39:53', '2018-07-21 13:39:53'),
(310, 36, 1904, 'Kampong Chhnang', '2018-07-21 13:39:53', '2018-07-21 13:39:53'),
(311, 36, 2068, 'Kampong Thum', '2018-07-21 13:39:53', '2018-07-21 13:39:53'),
(312, 36, 2135, 'Svay Rieng', '2018-07-21 13:39:53', '2018-07-21 13:39:53'),
(313, 36, 2142, 'Kampot', '2018-07-21 13:39:53', '2018-07-21 13:39:53'),
(314, 36, 2306, 'Kandal', '2018-07-21 13:39:53', '2018-07-21 13:39:53'),
(315, 36, 2864, 'Banteay Meanchey', '2018-07-21 13:39:53', '2018-07-21 13:39:53'),
(316, 36, 2896, 'Kampong Speu', '2018-07-21 13:39:53', '2018-07-21 13:39:53'),
(317, 37, 724, 'Centre', '2018-07-21 13:39:54', '2018-07-21 13:39:54'),
(318, 37, 1537, 'Sud-Ouest', '2018-07-21 13:39:54', '2018-07-21 13:39:54'),
(319, 37, 1569, 'Nord', '2018-07-21 13:39:54', '2018-07-21 13:39:54'),
(320, 37, 1671, 'Ouest', '2018-07-21 13:39:54', '2018-07-21 13:39:54'),
(321, 37, 1839, 'Nord-Ouest', '2018-07-21 13:39:54', '2018-07-21 13:39:54'),
(322, 37, 2729, 'Est', '2018-07-21 13:39:54', '2018-07-21 13:39:54'),
(323, 37, 2730, 'Adamaoua', '2018-07-21 13:39:54', '2018-07-21 13:39:54'),
(324, 38, 7, 'Quebec', '2018-07-21 13:39:54', '2018-07-21 13:39:54'),
(325, 38, 36, 'Newfoundland', '2018-07-21 13:39:54', '2018-07-21 13:39:54'),
(326, 38, 45, 'Alberta', '2018-07-21 13:39:54', '2018-07-21 13:39:54'),
(327, 38, 60, 'Ontario', '2018-07-21 13:39:54', '2018-07-21 13:39:54'),
(328, 38, 113, 'Nova Scotia', '2018-07-21 13:39:54', '2018-07-21 13:39:54'),
(329, 38, 170, 'British Columbia', '2018-07-21 13:39:54', '2018-07-21 13:39:54'),
(330, 38, 328, 'Manitoba', '2018-07-21 13:39:54', '2018-07-21 13:39:54'),
(331, 38, 632, 'New Brunswick', '2018-07-21 13:39:54', '2018-07-21 13:39:54'),
(332, 38, 833, 'Nunavut', '2018-07-21 13:39:54', '2018-07-21 13:39:54'),
(333, 38, 857, 'Saskatchewan', '2018-07-21 13:39:55', '2018-07-21 13:39:55'),
(334, 38, 1298, 'Prince Edward Island', '2018-07-21 13:39:55', '2018-07-21 13:39:55'),
(335, 38, 1465, 'Northwest Territories', '2018-07-21 13:39:55', '2018-07-21 13:39:55'),
(336, 38, 1636, 'Yukon Territory', '2018-07-21 13:39:55', '2018-07-21 13:39:55'),
(337, 39, 2179, 'Sao Domingos', '2018-07-21 13:39:55', '2018-07-21 13:39:55'),
(338, 41, 2098, 'Bangui', '2018-07-21 13:39:56', '2018-07-21 13:39:56'),
(339, 42, 2028, 'Guera', '2018-07-21 13:39:57', '2018-07-21 13:39:57'),
(340, 42, 2097, 'Logone Occidental', '2018-07-21 13:39:57', '2018-07-21 13:39:57'),
(341, 42, 2892, 'Chari-Baguirmi', '2018-07-21 13:39:57', '2018-07-21 13:39:57'),
(342, 43, 70, 'Region Metropolitana', '2018-07-21 13:39:57', '2018-07-21 13:39:57'),
(343, 43, 224, 'Valparaiso', '2018-07-21 13:39:57', '2018-07-21 13:39:57'),
(344, 43, 814, 'Coquimbo', '2018-07-21 13:39:57', '2018-07-21 13:39:57'),
(345, 43, 843, 'Los Lagos', '2018-07-21 13:39:57', '2018-07-21 13:39:57'),
(346, 43, 870, 'Bio-Bio', '2018-07-21 13:39:57', '2018-07-21 13:39:57'),
(347, 43, 1138, 'Araucania', '2018-07-21 13:39:57', '2018-07-21 13:39:57'),
(348, 43, 1435, 'Tarapaca', '2018-07-21 13:39:57', '2018-07-21 13:39:57'),
(349, 43, 1437, 'Libertador General Bernardo O\'Higgins', '2018-07-21 13:39:57', '2018-07-21 13:39:57'),
(350, 43, 1672, 'Antofagasta', '2018-07-21 13:39:57', '2018-07-21 13:39:57'),
(351, 43, 1740, 'Atacama', '2018-07-21 13:39:57', '2018-07-21 13:39:57'),
(352, 43, 1757, 'Maule', '2018-07-21 13:39:57', '2018-07-21 13:39:57'),
(353, 43, 1877, 'Magallanes y de la Antartica Chilena', '2018-07-21 13:39:57', '2018-07-21 13:39:57'),
(354, 43, 2328, 'Aisen del General Carlos Ibanez del Campo', '2018-07-21 13:39:57', '2018-07-21 13:39:57'),
(355, 43, 2344, 'Los Rios', '2018-07-21 13:39:57', '2018-07-21 13:39:57'),
(356, 43, 2458, 'Arica y Parinacota', '2018-07-21 13:39:57', '2018-07-21 13:39:57'),
(357, 44, 6, 'Beijing', '2018-07-21 13:39:58', '2018-07-21 13:39:58'),
(358, 44, 11, 'Hebei', '2018-07-21 13:39:58', '2018-07-21 13:39:58'),
(359, 44, 12, 'Jiangsu', '2018-07-21 13:39:58', '2018-07-21 13:39:58'),
(360, 44, 17, 'Guangdong', '2018-07-21 13:39:58', '2018-07-21 13:39:58'),
(361, 44, 48, 'Zhejiang', '2018-07-21 13:39:58', '2018-07-21 13:39:58'),
(362, 44, 52, 'Liaoning', '2018-07-21 13:39:58', '2018-07-21 13:39:58'),
(363, 44, 62, 'Shanghai', '2018-07-21 13:39:58', '2018-07-21 13:39:58'),
(364, 44, 64, 'Tianjin', '2018-07-21 13:39:58', '2018-07-21 13:39:58'),
(365, 44, 77, 'Fujian', '2018-07-21 13:39:58', '2018-07-21 13:39:58'),
(366, 44, 90, 'Guangxi', '2018-07-21 13:39:58', '2018-07-21 13:39:58'),
(367, 44, 94, 'Shandong', '2018-07-21 13:39:58', '2018-07-21 13:39:58'),
(368, 44, 97, 'Chongqing', '2018-07-21 13:39:58', '2018-07-21 13:39:58'),
(369, 44, 99, 'Hubei', '2018-07-21 13:39:58', '2018-07-21 13:39:58'),
(370, 44, 123, 'Heilongjiang', '2018-07-21 13:39:58', '2018-07-21 13:39:58'),
(371, 44, 156, 'Shanxi', '2018-07-21 13:39:58', '2018-07-21 13:39:58'),
(372, 44, 161, 'Hunan', '2018-07-21 13:39:58', '2018-07-21 13:39:58'),
(373, 44, 178, 'Hainan', '2018-07-21 13:39:58', '2018-07-21 13:39:58'),
(374, 44, 182, 'Sichuan', '2018-07-21 13:39:58', '2018-07-21 13:39:58'),
(375, 44, 196, 'Henan', '2018-07-21 13:39:58', '2018-07-21 13:39:58'),
(376, 44, 236, 'Anhui', '2018-07-21 13:39:58', '2018-07-21 13:39:58'),
(377, 44, 268, 'Shaanxi', '2018-07-21 13:39:58', '2018-07-21 13:39:58'),
(378, 44, 307, 'Nei Mongol', '2018-07-21 13:39:58', '2018-07-21 13:39:58'),
(379, 44, 334, 'Jilin', '2018-07-21 13:39:58', '2018-07-21 13:39:58'),
(380, 44, 600, 'Guizhou', '2018-07-21 13:39:58', '2018-07-21 13:39:58'),
(381, 44, 1178, 'Yunnan', '2018-07-21 13:39:58', '2018-07-21 13:39:58'),
(382, 44, 1231, 'Jiangxi', '2018-07-21 13:39:58', '2018-07-21 13:39:58'),
(383, 44, 1310, 'Gansu', '2018-07-21 13:39:58', '2018-07-21 13:39:58'),
(384, 44, 1736, 'Xizang', '2018-07-21 13:39:58', '2018-07-21 13:39:58'),
(385, 44, 1741, 'Ningxia', '2018-07-21 13:39:58', '2018-07-21 13:39:58'),
(386, 44, 1751, 'Xinjiang', '2018-07-21 13:39:58', '2018-07-21 13:39:58'),
(387, 44, 1753, 'Qinghai', '2018-07-21 13:39:58', '2018-07-21 13:39:58'),
(388, 47, 22, 'Cundinamarca', '2018-07-21 13:39:59', '2018-07-21 13:39:59'),
(389, 47, 221, 'Santander', '2018-07-21 13:40:00', '2018-07-21 13:40:00'),
(390, 47, 623, 'Atlantico', '2018-07-21 13:40:00', '2018-07-21 13:40:00'),
(391, 47, 726, 'Valle del Cauca', '2018-07-21 13:40:00', '2018-07-21 13:40:00'),
(392, 47, 752, 'Antioquia', '2018-07-21 13:40:00', '2018-07-21 13:40:00'),
(393, 47, 912, 'Risaralda', '2018-07-21 13:40:00', '2018-07-21 13:40:00'),
(394, 47, 935, 'Meta', '2018-07-21 13:40:00', '2018-07-21 13:40:00'),
(395, 47, 1287, 'Magdalena', '2018-07-21 13:40:00', '2018-07-21 13:40:00'),
(396, 47, 1291, 'Bolivar', '2018-07-21 13:40:00', '2018-07-21 13:40:00'),
(397, 47, 1365, 'Caldas', '2018-07-21 13:40:00', '2018-07-21 13:40:00'),
(398, 47, 1380, 'Boyaca', '2018-07-21 13:40:00', '2018-07-21 13:40:00'),
(399, 47, 1471, 'Tolima', '2018-07-21 13:40:00', '2018-07-21 13:40:00'),
(400, 47, 1580, 'Quindio', '2018-07-21 13:40:00', '2018-07-21 13:40:00'),
(401, 47, 1605, 'Cauca', '2018-07-21 13:40:00', '2018-07-21 13:40:00'),
(402, 47, 1626, 'Norte de Santander', '2018-07-21 13:40:00', '2018-07-21 13:40:00'),
(403, 47, 1871, 'Sucre', '2018-07-21 13:40:00', '2018-07-21 13:40:00'),
(404, 47, 1941, 'Casanare', '2018-07-21 13:40:00', '2018-07-21 13:40:00'),
(405, 47, 1955, 'Narino', '2018-07-21 13:40:00', '2018-07-21 13:40:00'),
(406, 47, 2004, 'San Andres y Providencia', '2018-07-21 13:40:00', '2018-07-21 13:40:00'),
(407, 47, 2129, 'Putumayo', '2018-07-21 13:40:00', '2018-07-21 13:40:00'),
(408, 47, 2323, 'Distrito Especial', '2018-07-21 13:40:00', '2018-07-21 13:40:00'),
(409, 47, 2333, 'Cesar', '2018-07-21 13:40:00', '2018-07-21 13:40:00'),
(410, 47, 2352, 'Caqueta', '2018-07-21 13:40:00', '2018-07-21 13:40:00'),
(411, 47, 2609, 'La Guajira', '2018-07-21 13:40:00', '2018-07-21 13:40:00'),
(412, 47, 2789, 'Choco', '2018-07-21 13:40:00', '2018-07-21 13:40:00'),
(413, 47, 2906, 'Guaviare', '2018-07-21 13:40:00', '2018-07-21 13:40:00'),
(414, 47, 2915, 'Vaupes', '2018-07-21 13:40:00', '2018-07-21 13:40:00'),
(415, 47, 2916, 'Guainia', '2018-07-21 13:40:00', '2018-07-21 13:40:00'),
(416, 48, 2244, 'Grande Comore', '2018-07-21 13:40:00', '2018-07-21 13:40:00'),
(417, 49, 1870, 'Kouilou', '2018-07-21 13:40:01', '2018-07-21 13:40:01'),
(418, 49, 1981, 'Brazzaville', '2018-07-21 13:40:01', '2018-07-21 13:40:01'),
(419, 51, 243, 'San Jose', '2018-07-21 13:40:02', '2018-07-21 13:40:02'),
(420, 51, 289, 'Guanacaste', '2018-07-21 13:40:02', '2018-07-21 13:40:02'),
(421, 51, 906, 'Cartago', '2018-07-21 13:40:02', '2018-07-21 13:40:02'),
(422, 51, 1251, 'Alajuela', '2018-07-21 13:40:02', '2018-07-21 13:40:02'),
(423, 51, 1374, 'Heredia', '2018-07-21 13:40:02', '2018-07-21 13:40:02'),
(424, 51, 1756, 'Puntarenas', '2018-07-21 13:40:02', '2018-07-21 13:40:02'),
(425, 51, 2133, 'Limon', '2018-07-21 13:40:02', '2018-07-21 13:40:02'),
(426, 53, 1143, 'Camaguey', '2018-07-21 13:40:03', '2018-07-21 13:40:03'),
(427, 53, 1689, 'Ciego de Avila', '2018-07-21 13:40:03', '2018-07-21 13:40:03'),
(428, 53, 1694, 'Santiago de Cuba', '2018-07-21 13:40:03', '2018-07-21 13:40:03'),
(429, 53, 2105, 'Ciudad de la Habana', '2018-07-21 13:40:03', '2018-07-21 13:40:03'),
(430, 53, 2125, 'Guantanamo', '2018-07-21 13:40:03', '2018-07-21 13:40:03'),
(431, 53, 2126, 'Matanzas', '2018-07-21 13:40:03', '2018-07-21 13:40:03'),
(432, 53, 2414, 'Holguin', '2018-07-21 13:40:03', '2018-07-21 13:40:03'),
(433, 53, 2427, 'Las Tunas', '2018-07-21 13:40:03', '2018-07-21 13:40:03'),
(434, 53, 2780, 'Villa Clara', '2018-07-21 13:40:03', '2018-07-21 13:40:03'),
(435, 53, 2795, 'Sancti Spiritus', '2018-07-21 13:40:03', '2018-07-21 13:40:03'),
(436, 53, 2839, 'Pinar del Rio', '2018-07-21 13:40:03', '2018-07-21 13:40:03'),
(437, 53, 2850, 'Cienfuegos', '2018-07-21 13:40:03', '2018-07-21 13:40:03'),
(438, 53, 2853, 'Isla de la Juventud', '2018-07-21 13:40:03', '2018-07-21 13:40:03'),
(439, 53, 2858, 'Granma', '2018-07-21 13:40:03', '2018-07-21 13:40:03'),
(440, 54, 256, 'Larnaca', '2018-07-21 13:40:04', '2018-07-21 13:40:04'),
(441, 54, 286, 'Nicosia', '2018-07-21 13:40:04', '2018-07-21 13:40:04'),
(442, 54, 288, 'Limassol', '2018-07-21 13:40:04', '2018-07-21 13:40:04'),
(443, 54, 634, 'Paphos', '2018-07-21 13:40:04', '2018-07-21 13:40:04'),
(444, 54, 760, 'Kyrenia', '2018-07-21 13:40:04', '2018-07-21 13:40:04'),
(445, 54, 985, 'Famagusta', '2018-07-21 13:40:04', '2018-07-21 13:40:04'),
(446, 55, 399, 'Karlovarsky kraj', '2018-07-21 13:40:04', '2018-07-21 13:40:04'),
(447, 55, 427, 'Hlavni mesto Praha', '2018-07-21 13:40:04', '2018-07-21 13:40:04'),
(448, 55, 456, 'Vysocina', '2018-07-21 13:40:04', '2018-07-21 13:40:04'),
(449, 55, 523, 'Jihomoravsky kraj', '2018-07-21 13:40:04', '2018-07-21 13:40:04'),
(450, 55, 661, 'Pardubicky kraj', '2018-07-21 13:40:04', '2018-07-21 13:40:04'),
(451, 55, 859, 'Jihocesky kraj', '2018-07-21 13:40:04', '2018-07-21 13:40:04'),
(452, 55, 926, 'Moravskoslezsky kraj', '2018-07-21 13:40:04', '2018-07-21 13:40:04'),
(453, 55, 930, 'Stredocesky kraj', '2018-07-21 13:40:04', '2018-07-21 13:40:04'),
(454, 55, 978, 'Zlinsky kraj', '2018-07-21 13:40:04', '2018-07-21 13:40:04'),
(455, 55, 1095, 'Ustecky kraj', '2018-07-21 13:40:04', '2018-07-21 13:40:04'),
(456, 55, 1337, 'Plzensky kraj', '2018-07-21 13:40:04', '2018-07-21 13:40:04'),
(457, 55, 1350, 'Liberecky kraj', '2018-07-21 13:40:04', '2018-07-21 13:40:04'),
(458, 55, 1368, 'Olomoucky kraj', '2018-07-21 13:40:04', '2018-07-21 13:40:04'),
(459, 55, 1575, 'Kralovehradecky kraj', '2018-07-21 13:40:04', '2018-07-21 13:40:04'),
(460, 56, 349, 'Sjelland', '2018-07-21 13:40:05', '2018-07-21 13:40:05'),
(461, 56, 607, 'Nordjylland', '2018-07-21 13:40:05', '2018-07-21 13:40:05'),
(462, 56, 669, 'Hovedstaden', '2018-07-21 13:40:05', '2018-07-21 13:40:05'),
(463, 56, 703, 'Syddanmark', '2018-07-21 13:40:05', '2018-07-21 13:40:05'),
(464, 56, 758, 'Midtjylland', '2018-07-21 13:40:05', '2018-07-21 13:40:05'),
(465, 59, 304, 'Distrito Nacional', '2018-07-21 13:40:06', '2018-07-21 13:40:06'),
(466, 59, 1136, 'Monte Plata', '2018-07-21 13:40:06', '2018-07-21 13:40:06'),
(467, 59, 1289, 'Santiago', '2018-07-21 13:40:06', '2018-07-21 13:40:06'),
(468, 59, 1299, 'Espaillat', '2018-07-21 13:40:06', '2018-07-21 13:40:06'),
(469, 59, 1400, 'Duarte', '2018-07-21 13:40:06', '2018-07-21 13:40:06'),
(470, 59, 1675, 'Puerto Plata', '2018-07-21 13:40:06', '2018-07-21 13:40:06'),
(471, 59, 1794, 'El Seibo', '2018-07-21 13:40:06', '2018-07-21 13:40:06'),
(472, 59, 1801, 'Sanchez Ramirez', '2018-07-21 13:40:06', '2018-07-21 13:40:06'),
(473, 59, 1810, 'San Cristobal', '2018-07-21 13:40:06', '2018-07-21 13:40:06'),
(474, 59, 1815, 'Maria Trinidad Sanchez', '2018-07-21 13:40:06', '2018-07-21 13:40:06'),
(475, 59, 1817, 'Peravia', '2018-07-21 13:40:06', '2018-07-21 13:40:06'),
(476, 59, 1836, 'Monsenor Nouel', '2018-07-21 13:40:06', '2018-07-21 13:40:06'),
(477, 59, 1881, 'San Pedro De Macoris', '2018-07-21 13:40:06', '2018-07-21 13:40:06'),
(478, 59, 1920, 'La Vega', '2018-07-21 13:40:06', '2018-07-21 13:40:06'),
(479, 59, 1929, 'La Altagracia', '2018-07-21 13:40:06', '2018-07-21 13:40:06'),
(480, 59, 2090, 'Valverde', '2018-07-21 13:40:06', '2018-07-21 13:40:06'),
(481, 59, 2119, 'La Romana', '2018-07-21 13:40:06', '2018-07-21 13:40:06'),
(482, 59, 2606, 'Azua', '2018-07-21 13:40:06', '2018-07-21 13:40:06'),
(483, 59, 2630, 'Barahona', '2018-07-21 13:40:06', '2018-07-21 13:40:06'),
(484, 59, 2696, 'Hato Mayor', '2018-07-21 13:40:06', '2018-07-21 13:40:06'),
(485, 59, 2876, 'Monte Cristi', '2018-07-21 13:40:06', '2018-07-21 13:40:06'),
(486, 59, 2925, 'Independencia', '2018-07-21 13:40:06', '2018-07-21 13:40:06'),
(487, 61, 303, 'Pichincha', '2018-07-21 13:40:07', '2018-07-21 13:40:07'),
(488, 61, 818, 'Guayas', '2018-07-21 13:40:07', '2018-07-21 13:40:07'),
(489, 61, 1054, 'El Oro', '2018-07-21 13:40:07', '2018-07-21 13:40:07'),
(490, 61, 1263, 'Azuay', '2018-07-21 13:40:07', '2018-07-21 13:40:07'),
(491, 61, 1384, 'Chimborazo', '2018-07-21 13:40:07', '2018-07-21 13:40:07'),
(492, 61, 1419, 'Napo', '2018-07-21 13:40:07', '2018-07-21 13:40:07'),
(493, 61, 1432, 'Loja', '2018-07-21 13:40:07', '2018-07-21 13:40:07'),
(494, 61, 1625, 'Imbabura', '2018-07-21 13:40:07', '2018-07-21 13:40:07'),
(495, 61, 1780, 'Pastaza', '2018-07-21 13:40:07', '2018-07-21 13:40:07'),
(496, 61, 1799, 'Tungurahua', '2018-07-21 13:40:07', '2018-07-21 13:40:07'),
(497, 61, 1976, 'Manabi', '2018-07-21 13:40:07', '2018-07-21 13:40:07'),
(498, 61, 2337, 'Sucumbios', '2018-07-21 13:40:07', '2018-07-21 13:40:07'),
(499, 61, 2383, 'Canar', '2018-07-21 13:40:07', '2018-07-21 13:40:07'),
(500, 61, 2537, 'Esmeraldas', '2018-07-21 13:40:07', '2018-07-21 13:40:07'),
(501, 61, 2610, 'Galapagos', '2018-07-21 13:40:07', '2018-07-21 13:40:07'),
(502, 61, 2689, 'Carchi', '2018-07-21 13:40:07', '2018-07-21 13:40:07'),
(503, 61, 2690, 'Morona-Santiago', '2018-07-21 13:40:07', '2018-07-21 13:40:07'),
(504, 61, 2695, 'Orellana', '2018-07-21 13:40:07', '2018-07-21 13:40:07'),
(505, 61, 2863, 'Cotopaxi', '2018-07-21 13:40:07', '2018-07-21 13:40:07'),
(506, 61, 2868, 'Zamora-Chinchipe', '2018-07-21 13:40:07', '2018-07-21 13:40:07'),
(507, 62, 96, 'Al Qahirah', '2018-07-21 13:40:08', '2018-07-21 13:40:08'),
(508, 62, 115, 'Al Jizah', '2018-07-21 13:40:08', '2018-07-21 13:40:08'),
(509, 62, 246, 'Al Iskandariyah', '2018-07-21 13:40:08', '2018-07-21 13:40:08'),
(510, 62, 630, 'Qina', '2018-07-21 13:40:08', '2018-07-21 13:40:08'),
(511, 62, 641, 'Ad Daqahliyah', '2018-07-21 13:40:08', '2018-07-21 13:40:08'),
(512, 62, 897, 'Bani Suwayf', '2018-07-21 13:40:08', '2018-07-21 13:40:08'),
(513, 62, 919, 'Ash Sharqiyah', '2018-07-21 13:40:08', '2018-07-21 13:40:08'),
(514, 62, 920, 'Al Minya', '2018-07-21 13:40:08', '2018-07-21 13:40:08'),
(515, 62, 1013, 'Al Gharbiyah', '2018-07-21 13:40:08', '2018-07-21 13:40:08'),
(516, 62, 1123, 'Bur Sa\'id', '2018-07-21 13:40:08', '2018-07-21 13:40:08'),
(517, 62, 1256, 'Al Isma\'iliyah', '2018-07-21 13:40:08', '2018-07-21 13:40:08'),
(518, 62, 1281, 'Asyut', '2018-07-21 13:40:08', '2018-07-21 13:40:08'),
(519, 62, 1286, 'Al Qalyubiyah', '2018-07-21 13:40:08', '2018-07-21 13:40:08'),
(520, 62, 1319, 'Al Minufiyah', '2018-07-21 13:40:08', '2018-07-21 13:40:08'),
(521, 62, 1321, 'Dumyat', '2018-07-21 13:40:08', '2018-07-21 13:40:08'),
(522, 62, 1323, 'Al Buhayrah', '2018-07-21 13:40:08', '2018-07-21 13:40:08'),
(523, 62, 1342, 'As Suways', '2018-07-21 13:40:08', '2018-07-21 13:40:08'),
(524, 62, 1491, 'Al Bahr al Ahmar', '2018-07-21 13:40:08', '2018-07-21 13:40:08'),
(525, 62, 1571, 'Aswan', '2018-07-21 13:40:08', '2018-07-21 13:40:08'),
(526, 62, 1986, 'Kafr ash Shaykh', '2018-07-21 13:40:08', '2018-07-21 13:40:08'),
(527, 62, 1990, 'Al Fayyum', '2018-07-21 13:40:08', '2018-07-21 13:40:08'),
(528, 62, 2111, 'Suhaj', '2018-07-21 13:40:08', '2018-07-21 13:40:08'),
(529, 62, 2151, 'Matruh', '2018-07-21 13:40:08', '2018-07-21 13:40:08'),
(530, 62, 2777, 'Janub Sina\'', '2018-07-21 13:40:08', '2018-07-21 13:40:08'),
(531, 62, 2881, 'Shamal Sina\'', '2018-07-21 13:40:08', '2018-07-21 13:40:08'),
(532, 63, 159, 'San Salvador', '2018-07-21 13:40:09', '2018-07-21 13:40:09'),
(533, 63, 1151, 'La Libertad', '2018-07-21 13:40:09', '2018-07-21 13:40:09'),
(534, 63, 1550, 'Santa Ana', '2018-07-21 13:40:09', '2018-07-21 13:40:09'),
(535, 63, 1781, 'San Vicente', '2018-07-21 13:40:09', '2018-07-21 13:40:09'),
(536, 63, 1816, 'Usulutan', '2018-07-21 13:40:09', '2018-07-21 13:40:09'),
(537, 63, 2087, 'Sonsonate', '2018-07-21 13:40:09', '2018-07-21 13:40:09'),
(538, 63, 2120, 'Chalatenango', '2018-07-21 13:40:09', '2018-07-21 13:40:09'),
(539, 63, 2346, 'Morazan', '2018-07-21 13:40:09', '2018-07-21 13:40:09'),
(540, 63, 2347, 'Cuscatlan', '2018-07-21 13:40:09', '2018-07-21 13:40:09'),
(541, 63, 2616, 'Ahuachapan', '2018-07-21 13:40:09', '2018-07-21 13:40:09'),
(542, 63, 2693, 'Cabanas', '2018-07-21 13:40:09', '2018-07-21 13:40:09'),
(543, 63, 2867, 'San Miguel', '2018-07-21 13:40:09', '2018-07-21 13:40:09'),
(544, 64, 2202, 'Litoral', '2018-07-21 13:40:10', '2018-07-21 13:40:10'),
(545, 64, 2640, 'Bioko Norte', '2018-07-21 13:40:10', '2018-07-21 13:40:10'),
(546, 64, 2847, 'Wele-Nzas', '2018-07-21 13:40:10', '2018-07-21 13:40:10'),
(547, 66, 124, 'Harjumaa', '2018-07-21 13:40:11', '2018-07-21 13:40:11'),
(548, 66, 344, 'Laane-Virumaa', '2018-07-21 13:40:11', '2018-07-21 13:40:11'),
(549, 66, 651, 'Tartumaa', '2018-07-21 13:40:11', '2018-07-21 13:40:11'),
(550, 66, 1069, 'Parnumaa', '2018-07-21 13:40:11', '2018-07-21 13:40:11'),
(551, 66, 1241, 'Hiiumaa', '2018-07-21 13:40:11', '2018-07-21 13:40:11'),
(552, 66, 1383, 'Polvamaa', '2018-07-21 13:40:11', '2018-07-21 13:40:11'),
(553, 66, 1434, 'Ida-Virumaa', '2018-07-21 13:40:11', '2018-07-21 13:40:11'),
(554, 66, 1539, 'Saaremaa', '2018-07-21 13:40:11', '2018-07-21 13:40:11'),
(555, 66, 1676, 'Viljandimaa', '2018-07-21 13:40:11', '2018-07-21 13:40:11'),
(556, 66, 1755, 'Jarvamaa', '2018-07-21 13:40:11', '2018-07-21 13:40:11'),
(557, 66, 1868, 'Vorumaa', '2018-07-21 13:40:11', '2018-07-21 13:40:11'),
(558, 66, 1876, 'Jogevamaa', '2018-07-21 13:40:11', '2018-07-21 13:40:11'),
(559, 66, 1917, 'Valgamaa', '2018-07-21 13:40:11', '2018-07-21 13:40:11'),
(560, 66, 2052, 'Laanemaa', '2018-07-21 13:40:11', '2018-07-21 13:40:11'),
(561, 66, 2053, 'Raplamaa', '2018-07-21 13:40:11', '2018-07-21 13:40:11'),
(562, 67, 2356, 'Adis Abeba', '2018-07-21 13:40:11', '2018-07-21 13:40:11'),
(563, 67, 2395, 'Dire Dawa', '2018-07-21 13:40:11', '2018-07-21 13:40:11'),
(564, 67, 2713, 'Amara', '2018-07-21 13:40:11', '2018-07-21 13:40:11'),
(565, 67, 2784, 'Oromiya', '2018-07-21 13:40:11', '2018-07-21 13:40:11'),
(566, 67, 2907, 'YeDebub Biheroch Bihereseboch na Hizboch', '2018-07-21 13:40:11', '2018-07-21 13:40:11'),
(567, 67, 2918, 'Sumale', '2018-07-21 13:40:11', '2018-07-21 13:40:11'),
(568, 71, 190, 'Southern Finland', '2018-07-21 13:40:15', '2018-07-21 13:40:15'),
(569, 71, 278, 'Western Finland', '2018-07-21 13:40:15', '2018-07-21 13:40:15'),
(570, 71, 318, 'Oulu', '2018-07-21 13:40:15', '2018-07-21 13:40:15'),
(571, 71, 526, 'Lapland', '2018-07-21 13:40:15', '2018-07-21 13:40:15'),
(572, 71, 997, 'Eastern Finland', '2018-07-21 13:40:15', '2018-07-21 13:40:15'),
(573, 72, 34, 'Ile-de-France', '2018-07-21 13:40:16', '2018-07-21 13:40:16'),
(574, 72, 112, 'Midi-Pyrenees', '2018-07-21 13:40:16', '2018-07-21 13:40:16'),
(575, 72, 116, 'Picardie', '2018-07-21 13:40:16', '2018-07-21 13:40:16'),
(576, 72, 296, 'Franche-Comte', '2018-07-21 13:40:16', '2018-07-21 13:40:16'),
(577, 72, 315, 'Alsace', '2018-07-21 13:40:16', '2018-07-21 13:40:16'),
(578, 72, 409, 'Languedoc-Roussillon', '2018-07-21 13:40:16', '2018-07-21 13:40:16'),
(579, 72, 469, 'Champagne-Ardenne', '2018-07-21 13:40:16', '2018-07-21 13:40:16'),
(580, 72, 471, 'Bretagne', '2018-07-21 13:40:16', '2018-07-21 13:40:16'),
(581, 72, 544, 'Rhone-Alpes', '2018-07-21 13:40:16', '2018-07-21 13:40:16'),
(582, 72, 555, 'Nord-Pas-de-Calais', '2018-07-21 13:40:16', '2018-07-21 13:40:16'),
(583, 72, 556, 'Lorraine', '2018-07-21 13:40:16', '2018-07-21 13:40:16'),
(584, 72, 563, 'Provence-Alpes-Cote d\'Azur', '2018-07-21 13:40:16', '2018-07-21 13:40:16'),
(585, 72, 598, 'Limousin', '2018-07-21 13:40:16', '2018-07-21 13:40:16'),
(586, 72, 635, 'Haute-Normandie', '2018-07-21 13:40:16', '2018-07-21 13:40:16'),
(587, 72, 649, 'Poitou-Charentes', '2018-07-21 13:40:16', '2018-07-21 13:40:16'),
(588, 72, 708, 'Basse-Normandie', '2018-07-21 13:40:16', '2018-07-21 13:40:16'),
(589, 72, 729, 'Aquitaine', '2018-07-21 13:40:16', '2018-07-21 13:40:16'),
(590, 72, 798, 'Auvergne', '2018-07-21 13:40:16', '2018-07-21 13:40:16'),
(591, 72, 822, 'Pays de la Loire', '2018-07-21 13:40:16', '2018-07-21 13:40:16'),
(592, 72, 937, 'Bourgogne', '2018-07-21 13:40:16', '2018-07-21 13:40:16'),
(593, 72, 1483, 'Corse', '2018-07-21 13:40:16', '2018-07-21 13:40:16'),
(594, 77, 1511, 'Estuaire', '2018-07-21 13:40:19', '2018-07-21 13:40:19'),
(595, 77, 2093, 'Ogooue-Maritime', '2018-07-21 13:40:19', '2018-07-21 13:40:19'),
(596, 78, 821, 'Banjul', '2018-07-21 13:40:19', '2018-07-21 13:40:19'),
(597, 78, 1964, 'Western', '2018-07-21 13:40:19', '2018-07-21 13:40:19'),
(598, 79, 406, 'Dushet\'is Raioni', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(599, 79, 1478, 'Goris Raioni', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(600, 79, 1862, 'Sagarejos Raioni', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(601, 79, 1916, 'Ch\'okhatauris Raioni', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(602, 79, 2170, 'Khobis Raioni', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(603, 79, 2260, 'Tsalkis Raioni', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(604, 79, 2291, 'Ajaria', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(605, 79, 2378, 'Akhmetis Raioni', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(606, 79, 2447, 'Zugdidis Raioni', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(607, 79, 2461, 'Mts\'khet\'is Raioni', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(608, 79, 2467, 'Samtrediis Raioni', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(609, 79, 2482, 'Borjomis Raioni', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(610, 79, 2649, 'Zestap\'onis Raioni', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(611, 79, 2714, 'Khashuris Raioni', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(612, 79, 2740, 'Vanis Raioni', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(613, 79, 2747, 'K\'ut\'aisi', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(614, 79, 2750, 'Abashis Raioni', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(615, 79, 2751, 'Tsalenjikhis Raioni', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(616, 79, 2758, 'T\'ianet\'is Raioni', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(617, 79, 2763, 'Kaspis Raioni', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(618, 79, 2764, 'Tsqaltubo', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(619, 79, 2766, 'Qazbegis Raioni', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(620, 79, 2817, 'Onis Raioni', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(621, 79, 2899, 'Abkhazia', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(622, 80, 58, 'Baden-Wurttemberg', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(623, 80, 89, 'Berlin', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(624, 80, 200, 'Bayern', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(625, 80, 285, 'Hamburg', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(626, 80, 333, 'Nordrhein-Westfalen', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(627, 80, 339, 'Rheinland-Pfalz', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(628, 80, 398, 'Niedersachsen', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(629, 80, 402, 'Schleswig-Holstein', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(630, 80, 453, 'Hessen', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(631, 80, 464, 'Brandenburg', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(632, 80, 493, 'Sachsen-Anhalt', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(633, 80, 496, 'Thuringen', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(634, 80, 557, 'Saarland', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(635, 80, 633, 'Sachsen', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(636, 80, 783, 'Bremen', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(637, 80, 1159, 'Mecklenburg-Vorpommern', '2018-07-21 13:40:20', '2018-07-21 13:40:20'),
(638, 81, 629, 'Ashanti', '2018-07-21 13:40:21', '2018-07-21 13:40:21'),
(639, 81, 665, 'Greater Accra', '2018-07-21 13:40:21', '2018-07-21 13:40:21'),
(640, 81, 1574, 'Volta', '2018-07-21 13:40:21', '2018-07-21 13:40:21'),
(641, 81, 2154, 'Northern', '2018-07-21 13:40:21', '2018-07-21 13:40:21'),
(642, 81, 2358, 'Eastern', '2018-07-21 13:40:21', '2018-07-21 13:40:21'),
(643, 81, 2558, 'Central', '2018-07-21 13:40:21', '2018-07-21 13:40:21'),
(644, 81, 2641, 'Upper West', '2018-07-21 13:40:21', '2018-07-21 13:40:21'),
(645, 81, 2923, 'Upper East', '2018-07-21 13:40:21', '2018-07-21 13:40:21'),
(646, 81, 2924, 'Brong-Ahafo', '2018-07-21 13:40:21', '2018-07-21 13:40:21'),
(647, 84, 13, 'Imathia', '2018-07-21 13:40:22', '2018-07-21 13:40:22'),
(648, 84, 114, 'Attiki', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(649, 84, 292, 'Korinthia', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(650, 84, 336, 'Larisa', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(651, 84, 425, 'Thessaloniki', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(652, 84, 461, 'Kerkira', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(653, 84, 519, 'Messinia', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(654, 84, 528, 'Kardhitsa', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(655, 84, 610, 'Aitolia kai Akarnania', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(656, 84, 638, 'Drama', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(657, 84, 650, 'Iraklion', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(658, 84, 675, 'Levkas', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(659, 84, 700, 'Kavala', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(660, 84, 721, 'Rethimni', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(661, 84, 792, 'Ioannina', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(662, 84, 804, 'Khania', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(663, 84, 847, 'Akhaia', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(664, 84, 865, 'Trikala', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(665, 84, 886, 'Rodhopi', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(666, 84, 934, 'Ilia', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(667, 84, 942, 'Xanthi', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(668, 84, 987, 'Evvoia', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(669, 84, 1078, 'Dhodhekanisos', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(670, 84, 1108, 'Arkadhia', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(671, 84, 1124, 'Khios', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(672, 84, 1127, 'Kilkis', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(673, 84, 1133, 'Pella', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(674, 84, 1139, 'Kastoria', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(675, 84, 1198, 'Serrai', '2018-07-21 13:40:23', '2018-07-21 13:40:23');
INSERT INTO `states` (`id`, `country_id`, `state_api_id`, `name`, `created_at`, `updated_at`) VALUES
(676, 84, 1211, 'Magnisia', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(677, 84, 1218, 'Lakonia', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(678, 84, 1238, 'Lasithi', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(679, 84, 1259, 'Kozani', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(680, 84, 1316, 'Pieria', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(681, 84, 1349, 'Lesvos', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(682, 84, 1352, 'Voiotia', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(683, 84, 1406, 'Evros', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(684, 84, 1416, 'Kikladhes', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(685, 84, 1445, 'Argolis', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(686, 84, 1454, 'Grevena', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(687, 84, 1481, 'Thesprotia', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(688, 84, 1538, 'Khalkidhiki', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(689, 84, 1572, 'Fthiotis', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(690, 84, 1614, 'Zakinthos', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(691, 84, 1624, 'Florina', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(692, 84, 1668, 'Kefallinia', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(693, 84, 1692, 'Arta', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(694, 84, 1857, 'Samos', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(695, 84, 2529, 'Preveza', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(696, 84, 2804, 'Fokis', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(697, 85, 1807, 'Ostgronland', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(698, 85, 1847, 'Vestgronland', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(699, 85, 2355, 'Nordgronland', '2018-07-21 13:40:23', '2018-07-21 13:40:23'),
(700, 86, 1154, 'Saint Andrew', '2018-07-21 13:40:24', '2018-07-21 13:40:24'),
(701, 86, 2232, 'Saint David', '2018-07-21 13:40:24', '2018-07-21 13:40:24'),
(702, 86, 2742, 'Saint Patrick', '2018-07-21 13:40:24', '2018-07-21 13:40:24'),
(703, 89, 716, 'Guatemala', '2018-07-21 13:40:25', '2018-07-21 13:40:25'),
(704, 89, 839, 'Sacatepequez', '2018-07-21 13:40:25', '2018-07-21 13:40:25'),
(705, 89, 1091, 'Huehuetenango', '2018-07-21 13:40:25', '2018-07-21 13:40:25'),
(706, 89, 1577, 'Santa Rosa', '2018-07-21 13:40:25', '2018-07-21 13:40:25'),
(707, 89, 1878, 'Jutiapa', '2018-07-21 13:40:25', '2018-07-21 13:40:25'),
(708, 89, 1965, 'San Marcos', '2018-07-21 13:40:25', '2018-07-21 13:40:25'),
(709, 89, 2092, 'Peten', '2018-07-21 13:40:25', '2018-07-21 13:40:25'),
(710, 89, 2117, 'Zacapa', '2018-07-21 13:40:25', '2018-07-21 13:40:25'),
(711, 89, 2335, 'Chimaltenango', '2018-07-21 13:40:25', '2018-07-21 13:40:25'),
(712, 89, 2336, 'Solola', '2018-07-21 13:40:25', '2018-07-21 13:40:25'),
(713, 89, 2345, 'Quetzaltenango', '2018-07-21 13:40:25', '2018-07-21 13:40:25'),
(714, 89, 2350, 'Escuintla', '2018-07-21 13:40:25', '2018-07-21 13:40:25'),
(715, 89, 2457, 'Baja Verapaz', '2018-07-21 13:40:25', '2018-07-21 13:40:25'),
(716, 89, 2547, 'El Progreso', '2018-07-21 13:40:25', '2018-07-21 13:40:25'),
(717, 89, 2612, 'Alta Verapaz', '2018-07-21 13:40:25', '2018-07-21 13:40:25'),
(718, 89, 2613, 'Suchitepequez', '2018-07-21 13:40:25', '2018-07-21 13:40:25'),
(719, 89, 2614, 'Jalapa', '2018-07-21 13:40:25', '2018-07-21 13:40:25'),
(720, 89, 2620, 'Totonicapan', '2018-07-21 13:40:25', '2018-07-21 13:40:25'),
(721, 89, 2694, 'Chiquimula', '2018-07-21 13:40:25', '2018-07-21 13:40:25'),
(722, 89, 2770, 'Izabal', '2018-07-21 13:40:25', '2018-07-21 13:40:25'),
(723, 89, 2771, 'Retalhuleu', '2018-07-21 13:40:25', '2018-07-21 13:40:25'),
(724, 89, 2870, 'Quiche', '2018-07-21 13:40:25', '2018-07-21 13:40:25'),
(725, 90, 1322, 'Conakry', '2018-07-21 13:40:26', '2018-07-21 13:40:26'),
(726, 90, 2410, 'Kindia', '2018-07-21 13:40:26', '2018-07-21 13:40:26'),
(727, 91, 2157, 'Bissau', '2018-07-21 13:40:26', '2018-07-21 13:40:26'),
(728, 92, 953, 'Demerara-Mahaica', '2018-07-21 13:40:27', '2018-07-21 13:40:27'),
(729, 92, 1902, 'Upper Demerara-Berbice', '2018-07-21 13:40:27', '2018-07-21 13:40:27'),
(730, 92, 2085, 'Pomeroon-Supenaam', '2018-07-21 13:40:27', '2018-07-21 13:40:27'),
(731, 92, 2615, 'East Berbice-Corentyne', '2018-07-21 13:40:27', '2018-07-21 13:40:27'),
(732, 93, 1828, 'Sud', '2018-07-21 13:40:27', '2018-07-21 13:40:27'),
(733, 93, 2348, 'Sud-Est', '2018-07-21 13:40:27', '2018-07-21 13:40:27'),
(734, 93, 2399, 'Artibonite', '2018-07-21 13:40:27', '2018-07-21 13:40:27'),
(735, 93, 2628, 'Nord-Est', '2018-07-21 13:40:27', '2018-07-21 13:40:27'),
(736, 95, 790, 'Cortes', '2018-07-21 13:40:29', '2018-07-21 13:40:29'),
(737, 95, 895, 'Francisco Morazan', '2018-07-21 13:40:29', '2018-07-21 13:40:29'),
(738, 95, 1540, 'Atlantida', '2018-07-21 13:40:29', '2018-07-21 13:40:29'),
(739, 95, 2009, 'Yoro', '2018-07-21 13:40:29', '2018-07-21 13:40:29'),
(740, 95, 2156, 'El Paraiso', '2018-07-21 13:40:29', '2018-07-21 13:40:29'),
(741, 95, 2349, 'Santa Barbara', '2018-07-21 13:40:29', '2018-07-21 13:40:29'),
(742, 95, 2431, 'Choluteca', '2018-07-21 13:40:29', '2018-07-21 13:40:29'),
(743, 95, 2444, 'Comayagua', '2018-07-21 13:40:29', '2018-07-21 13:40:29'),
(744, 95, 2478, 'Islas de la Bahia', '2018-07-21 13:40:29', '2018-07-21 13:40:29'),
(745, 95, 2617, 'Copan', '2018-07-21 13:40:29', '2018-07-21 13:40:29'),
(746, 95, 2618, 'Olancho', '2018-07-21 13:40:29', '2018-07-21 13:40:29'),
(747, 95, 2897, 'Gracias a Dios', '2018-07-21 13:40:29', '2018-07-21 13:40:29'),
(748, 97, 219, 'Szabolcs-Szatmar-Bereg', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(749, 97, 347, 'Budapest', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(750, 97, 401, 'Tolna', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(751, 97, 414, 'Veszprem', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(752, 97, 439, 'Bacs-Kiskun', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(753, 97, 448, 'Baranya', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(754, 97, 495, 'Pecs', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(755, 97, 529, 'Miskolc', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(756, 97, 552, 'Pest', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(757, 97, 637, 'Csongrad', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(758, 97, 837, 'Zala', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(759, 97, 882, 'Gyor', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(760, 97, 1017, 'Borsod-Abauj-Zemplen', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(761, 97, 1041, 'Heves', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(762, 97, 1149, 'Fejer', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(763, 97, 1164, 'Nograd', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(764, 97, 1196, 'Debrecen', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(765, 97, 1202, 'Bekes', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(766, 97, 1240, 'Komarom-Esztergom', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(767, 97, 1404, 'Szeged', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(768, 97, 1426, 'Hajdu-Bihar', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(769, 97, 1482, 'Gyor-Moson-Sopron', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(770, 97, 1509, 'Somogy', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(771, 97, 1588, 'Vas', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(772, 97, 1609, 'Jasz-Nagykun-Szolnok', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(773, 98, 142, 'Gullbringusysla', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(774, 98, 1044, 'Eyjafjardarsysla', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(775, 98, 1500, 'Borgarfjardarsysla', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(776, 98, 1641, 'Arnessysla', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(777, 98, 1710, 'Skagafjardarsysla', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(778, 98, 1772, 'Sudur-Tingeyjarsysla', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(779, 98, 1829, 'Myrasysla', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(780, 98, 1914, 'Austur-Skaftafellssysla', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(781, 98, 1931, 'Austur-Hunavatnssysla', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(782, 98, 1945, 'Rangarvallasysla', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(783, 98, 2061, 'Snafellsnes- og Hnappadalssysla', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(784, 98, 2309, 'Nordur-Tingeyjarsysla', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(785, 98, 2599, 'Vestur-Isafjardarsysla', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(786, 98, 2600, 'Vestur-Skaftafellssysla', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(787, 98, 2686, 'Sudur-Mulasysla', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(788, 98, 2687, 'Vestur-Hunavatnssysla', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(789, 98, 2801, 'Norourland Eystra', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(790, 98, 2802, 'Suournes', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(791, 98, 2807, 'Suourland', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(792, 98, 2812, 'Vesturland', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(793, 98, 2822, 'Vestfiroir', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(794, 98, 2823, 'Norourland Vestra', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(795, 98, 2836, 'Austurland', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(796, 98, 2845, 'Nordur-Mulasysla', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(797, 98, 2878, 'Hofuoborgarsvaoio', '2018-07-21 13:40:30', '2018-07-21 13:40:30'),
(798, 99, 56, 'Haryana', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(799, 99, 85, 'Andhra Pradesh', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(800, 99, 100, 'Delhi', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(801, 99, 128, 'Tamil Nadu', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(802, 99, 138, 'Uttar Pradesh', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(803, 99, 160, 'Karnataka', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(804, 99, 187, 'Maharashtra', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(805, 99, 206, 'Kerala', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(806, 99, 225, 'Chhattisgarh', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(807, 99, 258, 'West Bengal', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(808, 99, 274, 'Madhya Pradesh', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(809, 99, 284, 'Gujarat', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(810, 99, 306, 'Rajasthan', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(811, 99, 317, 'Orissa', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(812, 99, 355, 'Jharkhand', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(813, 99, 363, 'Chandigarh', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(814, 99, 377, 'Punjab', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(815, 99, 416, 'Assam', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(816, 99, 676, 'Daman and Diu', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(817, 99, 728, 'Bihar', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(818, 99, 1008, 'Himachal Pradesh', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(819, 99, 1200, 'Uttarakhand', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(820, 99, 1203, 'Meghalaya', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(821, 99, 1312, 'Jammu and Kashmir', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(822, 99, 1334, 'Goa', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(823, 99, 1596, 'Puducherry', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(824, 99, 1654, 'Manipur', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(825, 99, 1791, 'Mizoram', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(826, 99, 1846, 'Dadra and Nagar Haveli', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(827, 99, 1874, 'Arunachal Pradesh', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(828, 99, 1918, 'Tripura', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(829, 99, 2320, 'Sikkim', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(830, 99, 2370, 'Nagaland', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(831, 99, 2594, 'Andaman and Nicobar Islands', '2018-07-21 13:40:31', '2018-07-21 13:40:31'),
(832, 101, 27, 'Jawa Barat', '2018-07-21 13:40:32', '2018-07-21 13:40:32'),
(833, 101, 111, 'Jakarta Raya', '2018-07-21 13:40:32', '2018-07-21 13:40:32'),
(834, 101, 137, 'Sumatera Utara', '2018-07-21 13:40:32', '2018-07-21 13:40:32'),
(835, 101, 205, 'Sumatera Selatan', '2018-07-21 13:40:32', '2018-07-21 13:40:32'),
(836, 101, 217, 'Jawa Timur', '2018-07-21 13:40:32', '2018-07-21 13:40:32'),
(837, 101, 338, 'Jawa Tengah', '2018-07-21 13:40:32', '2018-07-21 13:40:32'),
(838, 101, 379, 'Riau', '2018-07-21 13:40:32', '2018-07-21 13:40:32'),
(839, 101, 736, 'Kalimantan Timur', '2018-07-21 13:40:32', '2018-07-21 13:40:32'),
(840, 101, 813, 'Yogyakarta', '2018-07-21 13:40:32', '2018-07-21 13:40:32'),
(841, 101, 952, 'Nusa Tenggara Timur', '2018-07-21 13:40:32', '2018-07-21 13:40:32'),
(842, 101, 969, 'Sulawesi Selatan', '2018-07-21 13:40:32', '2018-07-21 13:40:32'),
(843, 101, 1121, 'Jambi', '2018-07-21 13:40:32', '2018-07-21 13:40:32'),
(844, 101, 1144, 'Sumatera Barat', '2018-07-21 13:40:32', '2018-07-21 13:40:32'),
(845, 101, 1179, 'Bali', '2018-07-21 13:40:32', '2018-07-21 13:40:32'),
(846, 101, 1180, 'Kalimantan Tengah', '2018-07-21 13:40:32', '2018-07-21 13:40:32'),
(847, 101, 1379, 'Maluku', '2018-07-21 13:40:32', '2018-07-21 13:40:32'),
(848, 101, 1506, 'Papua', '2018-07-21 13:40:32', '2018-07-21 13:40:32'),
(849, 101, 1534, 'Aceh', '2018-07-21 13:40:32', '2018-07-21 13:40:32'),
(850, 101, 1583, 'Banten', '2018-07-21 13:40:32', '2018-07-21 13:40:32'),
(851, 101, 1613, 'Sulawesi Tenggara', '2018-07-21 13:40:32', '2018-07-21 13:40:32'),
(852, 101, 1651, 'Kalimantan Barat', '2018-07-21 13:40:32', '2018-07-21 13:40:32'),
(853, 101, 1688, 'Sulawesi Utara', '2018-07-21 13:40:32', '2018-07-21 13:40:32'),
(854, 101, 1703, 'Nusa Tenggara Barat', '2018-07-21 13:40:32', '2018-07-21 13:40:32'),
(855, 101, 1809, 'Kalimantan Selatan', '2018-07-21 13:40:32', '2018-07-21 13:40:32'),
(856, 101, 1882, 'Sulawesi Tengah', '2018-07-21 13:40:32', '2018-07-21 13:40:32'),
(857, 101, 1995, 'Lampung', '2018-07-21 13:40:32', '2018-07-21 13:40:32'),
(858, 101, 2304, 'Kepulauan Riau', '2018-07-21 13:40:32', '2018-07-21 13:40:32'),
(859, 101, 2388, 'Bengkulu', '2018-07-21 13:40:32', '2018-07-21 13:40:32'),
(860, 101, 2389, 'Irian Jaya Barat', '2018-07-21 13:40:32', '2018-07-21 13:40:32'),
(861, 101, 2390, 'Gorontalo', '2018-07-21 13:40:32', '2018-07-21 13:40:32'),
(862, 101, 2443, 'Kepulauan Bangka Belitung', '2018-07-21 13:40:32', '2018-07-21 13:40:32'),
(863, 101, 2741, 'Maluku Utara', '2018-07-21 13:40:32', '2018-07-21 13:40:32'),
(864, 101, 2752, 'Sulawesi Barat', '2018-07-21 13:40:32', '2018-07-21 13:40:32'),
(865, 103, 185, 'Ninawa', '2018-07-21 13:40:33', '2018-07-21 13:40:33'),
(866, 103, 350, 'Arbil', '2018-07-21 13:40:33', '2018-07-21 13:40:33'),
(867, 103, 602, 'Baghdad', '2018-07-21 13:40:33', '2018-07-21 13:40:33'),
(868, 103, 696, 'Al Basrah', '2018-07-21 13:40:33', '2018-07-21 13:40:33'),
(869, 103, 1075, 'Dahuk', '2018-07-21 13:40:33', '2018-07-21 13:40:33'),
(870, 103, 1272, 'At Ta\'mim', '2018-07-21 13:40:33', '2018-07-21 13:40:33'),
(871, 103, 1414, 'Al Anbar', '2018-07-21 13:40:33', '2018-07-21 13:40:33'),
(872, 103, 1447, 'Diyala', '2018-07-21 13:40:33', '2018-07-21 13:40:33'),
(873, 103, 1785, 'Salah ad Din', '2018-07-21 13:40:33', '2018-07-21 13:40:33'),
(874, 103, 2172, 'As Sulaymaniyah', '2018-07-21 13:40:33', '2018-07-21 13:40:33'),
(875, 103, 2174, 'Dhi Qar', '2018-07-21 13:40:33', '2018-07-21 13:40:33'),
(876, 103, 2231, 'Wasit', '2018-07-21 13:40:33', '2018-07-21 13:40:33'),
(877, 103, 2685, 'Babil', '2018-07-21 13:40:33', '2018-07-21 13:40:33'),
(878, 103, 2739, 'An Najaf', '2018-07-21 13:40:33', '2018-07-21 13:40:33'),
(879, 103, 2743, 'Maysan', '2018-07-21 13:40:33', '2018-07-21 13:40:33'),
(880, 103, 2805, 'Karbala\'', '2018-07-21 13:40:33', '2018-07-21 13:40:33'),
(881, 104, 43, 'Dublin', '2018-07-21 13:40:34', '2018-07-21 13:40:34'),
(882, 104, 558, 'Waterford', '2018-07-21 13:40:34', '2018-07-21 13:40:34'),
(883, 104, 722, 'Kildare', '2018-07-21 13:40:34', '2018-07-21 13:40:34'),
(884, 104, 852, 'Tipperary', '2018-07-21 13:40:34', '2018-07-21 13:40:34'),
(885, 104, 856, 'Westmeath', '2018-07-21 13:40:34', '2018-07-21 13:40:34'),
(886, 104, 872, 'Louth', '2018-07-21 13:40:34', '2018-07-21 13:40:34'),
(887, 104, 908, 'Sligo', '2018-07-21 13:40:34', '2018-07-21 13:40:34'),
(888, 104, 1027, 'Limerick', '2018-07-21 13:40:34', '2018-07-21 13:40:34'),
(889, 104, 1053, 'Donegal', '2018-07-21 13:40:34', '2018-07-21 13:40:34'),
(890, 104, 1057, 'Cork', '2018-07-21 13:40:34', '2018-07-21 13:40:34'),
(891, 104, 1141, 'Galway', '2018-07-21 13:40:34', '2018-07-21 13:40:34'),
(892, 104, 1150, 'Kilkenny', '2018-07-21 13:40:34', '2018-07-21 13:40:34'),
(893, 104, 1266, 'Wicklow', '2018-07-21 13:40:34', '2018-07-21 13:40:34'),
(894, 104, 1356, 'Carlow', '2018-07-21 13:40:34', '2018-07-21 13:40:34'),
(895, 104, 1373, 'Monaghan', '2018-07-21 13:40:34', '2018-07-21 13:40:34'),
(896, 104, 1395, 'Meath', '2018-07-21 13:40:34', '2018-07-21 13:40:34'),
(897, 104, 1397, 'Wexford', '2018-07-21 13:40:34', '2018-07-21 13:40:34'),
(898, 104, 1418, 'Kerry', '2018-07-21 13:40:34', '2018-07-21 13:40:34'),
(899, 104, 1422, 'Mayo', '2018-07-21 13:40:34', '2018-07-21 13:40:34'),
(900, 104, 1514, 'Laois', '2018-07-21 13:40:34', '2018-07-21 13:40:34'),
(901, 104, 1549, 'Offaly', '2018-07-21 13:40:34', '2018-07-21 13:40:34'),
(902, 104, 1616, 'Clare', '2018-07-21 13:40:34', '2018-07-21 13:40:34'),
(903, 104, 1618, 'Cavan', '2018-07-21 13:40:34', '2018-07-21 13:40:34'),
(904, 104, 1696, 'Roscommon', '2018-07-21 13:40:34', '2018-07-21 13:40:34'),
(905, 104, 1706, 'Longford', '2018-07-21 13:40:34', '2018-07-21 13:40:34'),
(906, 104, 1849, 'Leitrim', '2018-07-21 13:40:34', '2018-07-21 13:40:34'),
(907, 105, 276, 'Tel Aviv', '2018-07-21 13:40:34', '2018-07-21 13:40:34'),
(908, 105, 348, 'HaZafon', '2018-07-21 13:40:34', '2018-07-21 13:40:34'),
(909, 105, 351, 'HaMerkaz', '2018-07-21 13:40:34', '2018-07-21 13:40:34'),
(910, 105, 624, 'Hefa', '2018-07-21 13:40:34', '2018-07-21 13:40:34'),
(911, 105, 694, 'HaDarom', '2018-07-21 13:40:34', '2018-07-21 13:40:34'),
(912, 105, 914, 'Yerushalayim', '2018-07-21 13:40:34', '2018-07-21 13:40:34'),
(913, 106, 2, 'Piemonte', '2018-07-21 13:40:35', '2018-07-21 13:40:35'),
(914, 106, 40, 'Marche', '2018-07-21 13:40:35', '2018-07-21 13:40:35'),
(915, 106, 92, 'Lombardia', '2018-07-21 13:40:35', '2018-07-21 13:40:35'),
(916, 106, 169, 'Sicilia', '2018-07-21 13:40:35', '2018-07-21 13:40:35'),
(917, 106, 184, 'Emilia-Romagna', '2018-07-21 13:40:35', '2018-07-21 13:40:35'),
(918, 106, 260, 'Puglia', '2018-07-21 13:40:35', '2018-07-21 13:40:35'),
(919, 106, 369, 'Toscana', '2018-07-21 13:40:35', '2018-07-21 13:40:35'),
(920, 106, 407, 'Veneto', '2018-07-21 13:40:35', '2018-07-21 13:40:35'),
(921, 106, 424, 'Lazio', '2018-07-21 13:40:35', '2018-07-21 13:40:35'),
(922, 106, 562, 'Campania', '2018-07-21 13:40:35', '2018-07-21 13:40:35'),
(923, 106, 595, 'Friuli-Venezia Giulia', '2018-07-21 13:40:35', '2018-07-21 13:40:35'),
(924, 106, 713, 'Liguria', '2018-07-21 13:40:35', '2018-07-21 13:40:35'),
(925, 106, 718, 'Sardegna', '2018-07-21 13:40:35', '2018-07-21 13:40:35'),
(926, 106, 731, 'Basilicata', '2018-07-21 13:40:35', '2018-07-21 13:40:35'),
(927, 106, 770, 'Calabria', '2018-07-21 13:40:35', '2018-07-21 13:40:35'),
(928, 106, 781, 'Valle d\'Aosta', '2018-07-21 13:40:35', '2018-07-21 13:40:35'),
(929, 106, 794, 'Molise', '2018-07-21 13:40:35', '2018-07-21 13:40:35'),
(930, 106, 805, 'Trentino-Alto Adige', '2018-07-21 13:40:35', '2018-07-21 13:40:35'),
(931, 106, 1018, 'Abruzzi', '2018-07-21 13:40:35', '2018-07-21 13:40:35'),
(932, 106, 1107, 'Umbria', '2018-07-21 13:40:35', '2018-07-21 13:40:35'),
(933, 109, 950, 'Saint Catherine', '2018-07-21 13:40:36', '2018-07-21 13:40:36'),
(934, 109, 1758, 'Manchester', '2018-07-21 13:40:36', '2018-07-21 13:40:36'),
(935, 109, 1787, 'Portland', '2018-07-21 13:40:36', '2018-07-21 13:40:36'),
(936, 109, 1850, 'Clarendon', '2018-07-21 13:40:36', '2018-07-21 13:40:36'),
(937, 109, 1855, 'Saint Ann', '2018-07-21 13:40:36', '2018-07-21 13:40:36'),
(938, 109, 2012, 'Hanover', '2018-07-21 13:40:36', '2018-07-21 13:40:36'),
(939, 109, 2144, 'Westmoreland', '2018-07-21 13:40:36', '2018-07-21 13:40:36'),
(940, 109, 2145, 'Saint Elizabeth', '2018-07-21 13:40:36', '2018-07-21 13:40:36'),
(941, 109, 2570, 'Trelawny', '2018-07-21 13:40:36', '2018-07-21 13:40:36'),
(942, 109, 2809, 'Kingston', '2018-07-21 13:40:36', '2018-07-21 13:40:36'),
(943, 110, 61, 'Aichi', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(944, 110, 1242, 'Akita', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(945, 110, 979, 'Aomori', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(946, 110, 271, 'Chiba', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(947, 110, 1527, 'Ehime', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(948, 110, 481, 'Fukui', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(949, 110, 71, 'Fukuoka', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(950, 110, 1068, 'Fukushima', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(951, 110, 165, 'Gifu', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(952, 110, 944, 'Gumma', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(953, 110, 390, 'Hiroshima', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(954, 110, 21, 'Hokkaido', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(955, 110, 325, 'Hyogo', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(956, 110, 245, 'Ibaraki', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(957, 110, 1195, 'Ishikawa', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(958, 110, 995, 'Iwate', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(959, 110, 1413, 'Kagawa', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(960, 110, 490, 'Kagoshima', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(961, 110, 242, 'Kanagawa', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(962, 110, 1438, 'Kochi', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(963, 110, 208, 'Kumamoto', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(964, 110, 518, 'Kyoto', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(965, 110, 1232, 'Mie', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(966, 110, 1229, 'Miyagi', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(967, 110, 1590, 'Miyazaki', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(968, 110, 232, 'Nagano', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(969, 110, 1446, 'Nagasaki', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(970, 110, 1070, 'Nara', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(971, 110, 1186, 'Niigata', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(972, 110, 825, 'Oita', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(973, 110, 941, 'Okayama', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(974, 110, 460, 'Okinawa', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(975, 110, 162, 'Osaka', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(976, 110, 939, 'Saga', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(977, 110, 384, 'Saitama', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(978, 110, 879, 'Shiga', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(979, 110, 1678, 'Shimane', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(980, 110, 525, 'Shizuoka', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(981, 110, 391, 'Tochigi', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(982, 110, 1296, 'Tokushima', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(983, 110, 83, 'Tokyo', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(984, 110, 1385, 'Tottori', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(985, 110, 1554, 'Toyama', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(986, 110, 980, 'Wakayama', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(987, 110, 1388, 'Yamagata', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(988, 110, 437, 'Yamaguchi', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(989, 110, 1382, 'Yamanashi', '2018-07-21 13:40:37', '2018-07-21 13:40:37'),
(990, 111, 41, 'Amman Governorate', '2018-07-21 13:40:38', '2018-07-21 13:40:38'),
(991, 111, 1460, 'Irbid', '2018-07-21 13:40:38', '2018-07-21 13:40:38'),
(992, 111, 1630, 'Al Mafraq', '2018-07-21 13:40:38', '2018-07-21 13:40:38'),
(993, 111, 1886, 'Az Zarqa', '2018-07-21 13:40:38', '2018-07-21 13:40:38'),
(994, 111, 1972, 'Al Balqa\'', '2018-07-21 13:40:38', '2018-07-21 13:40:38'),
(995, 111, 2439, 'Al Karak', '2018-07-21 13:40:38', '2018-07-21 13:40:38'),
(996, 111, 2849, 'Ma', '2018-07-21 13:40:38', '2018-07-21 13:40:38'),
(997, 113, 345, 'Nairobi Area', '2018-07-21 13:40:39', '2018-07-21 13:40:39'),
(998, 113, 1064, 'Coast', '2018-07-21 13:40:39', '2018-07-21 13:40:39'),
(999, 113, 1444, 'Rift Valley', '2018-07-21 13:40:39', '2018-07-21 13:40:39'),
(1000, 113, 1805, 'Nyanza', '2018-07-21 13:40:39', '2018-07-21 13:40:39'),
(1001, 118, 290, 'Al Kuwayt', '2018-07-21 13:40:41', '2018-07-21 13:40:41'),
(1002, 118, 1823, 'Al Jahra', '2018-07-21 13:40:41', '2018-07-21 13:40:41'),
(1003, 119, 452, 'Bishkek', '2018-07-21 13:40:42', '2018-07-21 13:40:42'),
(1004, 119, 1873, 'Jalal-Abad', '2018-07-21 13:40:42', '2018-07-21 13:40:42'),
(1005, 119, 1935, 'Naryn', '2018-07-21 13:40:42', '2018-07-21 13:40:42'),
(1006, 119, 2046, 'Talas', '2018-07-21 13:40:42', '2018-07-21 13:40:42'),
(1007, 119, 2047, 'Ysyk-Kol', '2018-07-21 13:40:42', '2018-07-21 13:40:42'),
(1008, 119, 2048, 'Osh', '2018-07-21 13:40:42', '2018-07-21 13:40:42'),
(1009, 119, 2049, 'Batken', '2018-07-21 13:40:42', '2018-07-21 13:40:42'),
(1010, 119, 2050, 'Chuy', '2018-07-21 13:40:42', '2018-07-21 13:40:42'),
(1011, 121, 82, 'Riga', '2018-07-21 13:40:43', '2018-07-21 13:40:43'),
(1012, 121, 687, 'Daugavpils', '2018-07-21 13:40:43', '2018-07-21 13:40:43'),
(1013, 121, 689, 'Aizkraukles', '2018-07-21 13:40:43', '2018-07-21 13:40:43'),
(1014, 121, 772, 'Liepaja', '2018-07-21 13:40:43', '2018-07-21 13:40:43'),
(1015, 121, 803, 'Ogres', '2018-07-21 13:40:43', '2018-07-21 13:40:43'),
(1016, 121, 994, 'Tukuma', '2018-07-21 13:40:43', '2018-07-21 13:40:43'),
(1017, 121, 1117, 'Jelgavas', '2018-07-21 13:40:43', '2018-07-21 13:40:43'),
(1018, 121, 1157, 'Balvu', '2018-07-21 13:40:43', '2018-07-21 13:40:43'),
(1019, 121, 1193, 'Bauskas', '2018-07-21 13:40:43', '2018-07-21 13:40:43'),
(1020, 121, 1235, 'Ventspils', '2018-07-21 13:40:43', '2018-07-21 13:40:43'),
(1021, 121, 1331, 'Liepajas', '2018-07-21 13:40:43', '2018-07-21 13:40:43'),
(1022, 121, 1351, 'Valmieras', '2018-07-21 13:40:43', '2018-07-21 13:40:43'),
(1023, 121, 1420, 'Ludzas', '2018-07-21 13:40:43', '2018-07-21 13:40:43'),
(1024, 121, 1421, 'Madonas', '2018-07-21 13:40:43', '2018-07-21 13:40:43'),
(1025, 121, 1468, 'Rigas', '2018-07-21 13:40:43', '2018-07-21 13:40:43'),
(1026, 121, 1523, 'Kuldigas', '2018-07-21 13:40:43', '2018-07-21 13:40:43'),
(1027, 121, 1535, 'Jekabpils', '2018-07-21 13:40:43', '2018-07-21 13:40:43'),
(1028, 121, 1541, 'Saldus', '2018-07-21 13:40:43', '2018-07-21 13:40:43'),
(1029, 121, 1650, 'Cesu', '2018-07-21 13:40:43', '2018-07-21 13:40:43'),
(1030, 121, 1664, 'Talsu', '2018-07-21 13:40:43', '2018-07-21 13:40:43'),
(1031, 121, 1690, 'Rezekne', '2018-07-21 13:40:43', '2018-07-21 13:40:43'),
(1032, 121, 1704, 'Valkas', '2018-07-21 13:40:43', '2018-07-21 13:40:43'),
(1033, 121, 1724, 'Limbazu', '2018-07-21 13:40:43', '2018-07-21 13:40:43'),
(1034, 121, 1776, 'Gulbenes', '2018-07-21 13:40:43', '2018-07-21 13:40:43'),
(1035, 121, 1930, 'Dobeles', '2018-07-21 13:40:43', '2018-07-21 13:40:43'),
(1036, 121, 1967, 'Kraslavas', '2018-07-21 13:40:43', '2018-07-21 13:40:43'),
(1037, 121, 1997, 'Aluksnes', '2018-07-21 13:40:43', '2018-07-21 13:40:43'),
(1038, 121, 2032, 'Rezeknes', '2018-07-21 13:40:43', '2018-07-21 13:40:43'),
(1039, 121, 2100, 'Preilu', '2018-07-21 13:40:43', '2018-07-21 13:40:43'),
(1040, 122, 81, 'Beyrouth', '2018-07-21 13:40:44', '2018-07-21 13:40:44'),
(1041, 122, 962, 'Mont-Liban', '2018-07-21 13:40:44', '2018-07-21 13:40:44'),
(1042, 122, 1084, 'Liban-Nord', '2018-07-21 13:40:44', '2018-07-21 13:40:44'),
(1043, 122, 1214, 'Al Janub', '2018-07-21 13:40:44', '2018-07-21 13:40:44'),
(1044, 123, 1208, 'Maseru', '2018-07-21 13:40:45', '2018-07-21 13:40:45'),
(1045, 123, 2728, 'Mafeteng', '2018-07-21 13:40:45', '2018-07-21 13:40:45'),
(1046, 123, 2842, 'Leribe', '2018-07-21 13:40:45', '2018-07-21 13:40:45'),
(1047, 124, 1118, 'Montserrado', '2018-07-21 13:40:45', '2018-07-21 13:40:45'),
(1048, 124, 2022, 'Grand Bassa', '2018-07-21 13:40:45', '2018-07-21 13:40:45'),
(1049, 124, 2634, 'Nimba', '2018-07-21 13:40:45', '2018-07-21 13:40:45'),
(1050, 126, 1498, 'Vaduz', '2018-07-21 13:40:46', '2018-07-21 13:40:46'),
(1051, 126, 1700, 'Gamprin', '2018-07-21 13:40:46', '2018-07-21 13:40:46'),
(1052, 126, 1726, 'Triesen', '2018-07-21 13:40:46', '2018-07-21 13:40:46'),
(1053, 126, 1843, 'Mauren', '2018-07-21 13:40:46', '2018-07-21 13:40:46'),
(1054, 126, 1889, 'Schaan', '2018-07-21 13:40:46', '2018-07-21 13:40:46'),
(1055, 126, 1892, 'Schellenberg', '2018-07-21 13:40:46', '2018-07-21 13:40:46'),
(1056, 126, 1947, 'Eschen', '2018-07-21 13:40:46', '2018-07-21 13:40:46'),
(1057, 126, 2029, 'Triesenberg', '2018-07-21 13:40:46', '2018-07-21 13:40:46'),
(1058, 126, 2030, 'Balzers', '2018-07-21 13:40:46', '2018-07-21 13:40:46'),
(1059, 126, 2054, 'Ruggell', '2018-07-21 13:40:46', '2018-07-21 13:40:46'),
(1060, 126, 2911, 'Planken', '2018-07-21 13:40:46', '2018-07-21 13:40:46'),
(1061, 127, 370, 'Klaipedos Apskritis', '2018-07-21 13:40:47', '2018-07-21 13:40:47'),
(1062, 127, 374, 'Panevezio Apskritis', '2018-07-21 13:40:47', '2018-07-21 13:40:47'),
(1063, 127, 479, 'Kauno Apskritis', '2018-07-21 13:40:47', '2018-07-21 13:40:47'),
(1064, 127, 510, 'Vilniaus Apskritis', '2018-07-21 13:40:47', '2018-07-21 13:40:47'),
(1065, 127, 645, 'Marijampoles Apskritis', '2018-07-21 13:40:47', '2018-07-21 13:40:47'),
(1066, 127, 1188, 'Siauliu Apskritis', '2018-07-21 13:40:47', '2018-07-21 13:40:47'),
(1067, 127, 1268, 'Alytaus Apskritis', '2018-07-21 13:40:47', '2018-07-21 13:40:47'),
(1068, 127, 1278, 'Taurages Apskritis', '2018-07-21 13:40:47', '2018-07-21 13:40:47'),
(1069, 127, 1502, 'Telsiu Apskritis', '2018-07-21 13:40:47', '2018-07-21 13:40:47'),
(1070, 127, 1842, 'Utenos Apskritis', '2018-07-21 13:40:47', '2018-07-21 13:40:47'),
(1071, 128, 732, 'Diekirch', '2018-07-21 13:40:47', '2018-07-21 13:40:47'),
(1072, 128, 1359, 'Grevenmacher', '2018-07-21 13:40:47', '2018-07-21 13:40:47'),
(1073, 130, 429, 'Karpos', '2018-07-21 13:40:48', '2018-07-21 13:40:48'),
(1074, 130, 719, 'Kumanovo', '2018-07-21 13:40:48', '2018-07-21 13:40:48'),
(1075, 130, 1016, 'Stip', '2018-07-21 13:40:48', '2018-07-21 13:40:48'),
(1076, 130, 1060, 'Zrnovci', '2018-07-21 13:40:48', '2018-07-21 13:40:48'),
(1077, 130, 1067, 'Bogdanci', '2018-07-21 13:40:48', '2018-07-21 13:40:48'),
(1078, 130, 1104, 'Bitola', '2018-07-21 13:40:48', '2018-07-21 13:40:48'),
(1079, 130, 1167, 'Gevgelija', '2018-07-21 13:40:48', '2018-07-21 13:40:48'),
(1080, 130, 1243, 'Strumica', '2018-07-21 13:40:48', '2018-07-21 13:40:48'),
(1081, 130, 1309, 'Veles', '2018-07-21 13:40:48', '2018-07-21 13:40:48'),
(1082, 130, 1376, 'Gostivar', '2018-07-21 13:40:48', '2018-07-21 13:40:48'),
(1083, 130, 1398, 'Probistip', '2018-07-21 13:40:48', '2018-07-21 13:40:48'),
(1084, 130, 1399, 'Kavadarci', '2018-07-21 13:40:48', '2018-07-21 13:40:48'),
(1085, 130, 1524, 'Makedonski Brod', '2018-07-21 13:40:48', '2018-07-21 13:40:48'),
(1086, 130, 1589, 'Tetovo', '2018-07-21 13:40:48', '2018-07-21 13:40:48'),
(1087, 130, 1599, 'Berovo', '2018-07-21 13:40:48', '2018-07-21 13:40:48'),
(1088, 130, 1603, 'Kicevo', '2018-07-21 13:40:48', '2018-07-21 13:40:48'),
(1089, 130, 1747, 'Struga', '2018-07-21 13:40:48', '2018-07-21 13:40:48'),
(1090, 130, 1773, 'Kocani', '2018-07-21 13:40:48', '2018-07-21 13:40:48'),
(1091, 130, 1788, 'Kratovo', '2018-07-21 13:40:48', '2018-07-21 13:40:48'),
(1092, 130, 1803, 'Aracinovo', '2018-07-21 13:40:48', '2018-07-21 13:40:48'),
(1093, 130, 1840, 'Novo Selo', '2018-07-21 13:40:48', '2018-07-21 13:40:48'),
(1094, 130, 1851, 'Labunista', '2018-07-21 13:40:48', '2018-07-21 13:40:48'),
(1095, 130, 1867, 'Sveti Nikole', '2018-07-21 13:40:48', '2018-07-21 13:40:48'),
(1096, 130, 1885, 'Ohrid', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1097, 130, 1900, 'Prilep', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1098, 130, 1921, 'Studenicani', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1099, 130, 1959, 'Radovis', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1100, 130, 1970, 'Kriva Palanka', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1101, 130, 1999, 'Star Dojran', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1102, 130, 2000, 'Resen', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1103, 130, 2001, 'Samokov', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1104, 130, 2043, 'Debar', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1105, 130, 2055, 'Krusevo', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1106, 130, 2060, 'Kondovo', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1107, 130, 2063, 'Delcevo', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1108, 130, 2064, 'Valandovo', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1109, 130, 2065, 'Zelino', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1110, 130, 2422, 'Demir Hisar', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1111, 130, 2440, 'Petrovec', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1112, 130, 2476, 'Caska', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1113, 130, 2484, 'Negotino', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1114, 130, 2490, 'Orizari', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1115, 130, 2514, 'Bogovinje', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1116, 130, 2533, 'Ilinden', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1117, 130, 2598, 'Cucer-Sandevo', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1118, 130, 2662, 'Novaci', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1119, 130, 2793, 'Pehcevo', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1120, 130, 2796, 'Zletovo', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1121, 130, 2803, 'Kuklis', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1122, 130, 2810, 'Plasnica', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1123, 130, 2811, 'Karbinci', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1124, 130, 2814, 'Lozovo', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1125, 131, 1774, 'Antananarivo', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1126, 131, 2181, 'Toliara', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1127, 131, 2196, 'Mahajanga', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1128, 131, 2197, 'Toamasina', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1129, 131, 2726, 'Antsiranana', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1130, 131, 2862, 'Fianarantsoa', '2018-07-21 13:40:49', '2018-07-21 13:40:49'),
(1131, 132, 1702, 'Lilongwe', '2018-07-21 13:40:50', '2018-07-21 13:40:50'),
(1132, 132, 1943, 'Blantyre', '2018-07-21 13:40:50', '2018-07-21 13:40:50'),
(1133, 132, 2095, 'Zomba', '2018-07-21 13:40:50', '2018-07-21 13:40:50'),
(1134, 132, 2562, 'Nkhata Bay', '2018-07-21 13:40:50', '2018-07-21 13:40:50'),
(1135, 132, 2563, 'Mchinji', '2018-07-21 13:40:50', '2018-07-21 13:40:50'),
(1136, 132, 2848, 'Chiradzulu', '2018-07-21 13:40:50', '2018-07-21 13:40:50'),
(1137, 133, 8, 'Kuala Lumpur', '2018-07-21 13:40:50', '2018-07-21 13:40:50'),
(1138, 133, 42, 'Johor', '2018-07-21 13:40:50', '2018-07-21 13:40:50'),
(1139, 133, 63, 'Negeri Sembilan', '2018-07-21 13:40:50', '2018-07-21 13:40:50'),
(1140, 133, 65, 'Selangor', '2018-07-21 13:40:50', '2018-07-21 13:40:50'),
(1141, 133, 106, 'Pulau Pinang', '2018-07-21 13:40:50', '2018-07-21 13:40:50'),
(1142, 133, 130, 'Perak', '2018-07-21 13:40:50', '2018-07-21 13:40:50'),
(1143, 133, 252, 'Sarawak', '2018-07-21 13:40:50', '2018-07-21 13:40:50'),
(1144, 133, 298, 'Sabah', '2018-07-21 13:40:50', '2018-07-21 13:40:50'),
(1145, 133, 383, 'Kedah', '2018-07-21 13:40:50', '2018-07-21 13:40:50'),
(1146, 133, 517, 'Melaka', '2018-07-21 13:40:50', '2018-07-21 13:40:50'),
(1147, 133, 747, 'Pahang', '2018-07-21 13:40:50', '2018-07-21 13:40:50'),
(1148, 133, 1106, 'Perlis', '2018-07-21 13:40:50', '2018-07-21 13:40:50'),
(1149, 133, 1301, 'Terengganu', '2018-07-21 13:40:50', '2018-07-21 13:40:50'),
(1150, 133, 1822, 'Labuan', '2018-07-21 13:40:50', '2018-07-21 13:40:50'),
(1151, 133, 1958, 'Kelantan', '2018-07-21 13:40:50', '2018-07-21 13:40:50'),
(1152, 133, 2646, 'Putrajaya', '2018-07-21 13:40:50', '2018-07-21 13:40:50'),
(1153, 134, 640, 'Maale', '2018-07-21 13:40:51', '2018-07-21 13:40:51'),
(1154, 134, 2782, 'Seenu', '2018-07-21 13:40:51', '2018-07-21 13:40:51'),
(1155, 135, 474, 'Mopti', '2018-07-21 13:40:51', '2018-07-21 13:40:51'),
(1156, 135, 1564, 'Bamako', '2018-07-21 13:40:51', '2018-07-21 13:40:51'),
(1157, 135, 2109, 'Kayes', '2018-07-21 13:40:51', '2018-07-21 13:40:51'),
(1158, 135, 2368, 'Koulikoro', '2018-07-21 13:40:51', '2018-07-21 13:40:51'),
(1159, 135, 2493, 'Sikasso', '2018-07-21 13:40:51', '2018-07-21 13:40:51'),
(1160, 135, 2846, 'Segou', '2018-07-21 13:40:51', '2018-07-21 13:40:51'),
(1161, 139, 538, 'Trarza', '2018-07-21 13:40:54', '2018-07-21 13:40:54'),
(1162, 140, 785, 'Grand Port', '2018-07-21 13:40:54', '2018-07-21 13:40:54'),
(1163, 140, 984, 'Port Louis', '2018-07-21 13:40:54', '2018-07-21 13:40:54'),
(1164, 140, 1227, 'Black River', '2018-07-21 13:40:54', '2018-07-21 13:40:54'),
(1165, 140, 1248, 'Plaines Wilhems', '2018-07-21 13:40:54', '2018-07-21 13:40:54'),
(1166, 140, 1326, 'Flacq', '2018-07-21 13:40:54', '2018-07-21 13:40:54'),
(1167, 140, 1433, 'Riviere du Rempart', '2018-07-21 13:40:54', '2018-07-21 13:40:54'),
(1168, 140, 1632, 'Savanne', '2018-07-21 13:40:54', '2018-07-21 13:40:54'),
(1169, 140, 1832, 'Pamplemousses', '2018-07-21 13:40:54', '2018-07-21 13:40:54'),
(1170, 140, 1982, 'Moka', '2018-07-21 13:40:55', '2018-07-21 13:40:55'),
(1171, 140, 2655, 'Rodrigues', '2018-07-21 13:40:55', '2018-07-21 13:40:55'),
(1172, 142, 146, 'Chiapas', '2018-07-21 13:40:56', '2018-07-21 13:40:56'),
(1173, 142, 227, 'Queretaro de Arteaga', '2018-07-21 13:40:56', '2018-07-21 13:40:56'),
(1174, 142, 257, 'Quintana Roo', '2018-07-21 13:40:56', '2018-07-21 13:40:56'),
(1175, 142, 283, 'Baja California', '2018-07-21 13:40:56', '2018-07-21 13:40:56'),
(1176, 142, 372, 'Nuevo Leon', '2018-07-21 13:40:56', '2018-07-21 13:40:56'),
(1177, 142, 388, 'Chihuahua', '2018-07-21 13:40:56', '2018-07-21 13:40:56'),
(1178, 142, 420, 'Tabasco', '2018-07-21 13:40:56', '2018-07-21 13:40:56'),
(1179, 142, 541, 'Jalisco', '2018-07-21 13:40:56', '2018-07-21 13:40:56'),
(1180, 142, 795, 'Mexico', '2018-07-21 13:40:56', '2018-07-21 13:40:56'),
(1181, 142, 815, 'Puebla', '2018-07-21 13:40:56', '2018-07-21 13:40:56'),
(1182, 142, 840, 'Guanajuato', '2018-07-21 13:40:56', '2018-07-21 13:40:56'),
(1183, 142, 898, 'Sinaloa', '2018-07-21 13:40:56', '2018-07-21 13:40:56'),
(1184, 142, 909, 'San Luis Potosi', '2018-07-21 13:40:56', '2018-07-21 13:40:56'),
(1185, 142, 925, 'Aguascalientes', '2018-07-21 13:40:56', '2018-07-21 13:40:56'),
(1186, 142, 954, 'Yucatan', '2018-07-21 13:40:56', '2018-07-21 13:40:56'),
(1187, 142, 1096, 'Campeche', '2018-07-21 13:40:56', '2018-07-21 13:40:56'),
(1188, 142, 1100, 'Tamaulipas', '2018-07-21 13:40:56', '2018-07-21 13:40:56'),
(1189, 142, 1126, 'Zacatecas', '2018-07-21 13:40:56', '2018-07-21 13:40:56'),
(1190, 142, 1145, 'Sonora', '2018-07-21 13:40:56', '2018-07-21 13:40:56'),
(1191, 142, 1156, 'Michoacan de Ocampo', '2018-07-21 13:40:56', '2018-07-21 13:40:56'),
(1192, 142, 1168, 'Colima', '2018-07-21 13:40:56', '2018-07-21 13:40:56'),
(1193, 142, 1170, 'Hidalgo', '2018-07-21 13:40:56', '2018-07-21 13:40:56'),
(1194, 142, 1172, 'Coahuila de Zaragoza', '2018-07-21 13:40:56', '2018-07-21 13:40:56'),
(1195, 142, 1177, 'Veracruz-Llave', '2018-07-21 13:40:56', '2018-07-21 13:40:56'),
(1196, 142, 1267, 'Nayarit', '2018-07-21 13:40:56', '2018-07-21 13:40:56'),
(1197, 142, 1303, 'Oaxaca', '2018-07-21 13:40:56', '2018-07-21 13:40:56'),
(1198, 142, 1313, 'Guerrero', '2018-07-21 13:40:56', '2018-07-21 13:40:56'),
(1199, 142, 1439, 'Morelos', '2018-07-21 13:40:56', '2018-07-21 13:40:56'),
(1200, 142, 1546, 'Durango', '2018-07-21 13:40:56', '2018-07-21 13:40:56'),
(1201, 142, 1622, 'Baja California Sur', '2018-07-21 13:40:56', '2018-07-21 13:40:56'),
(1202, 142, 1826, 'Tlaxcala', '2018-07-21 13:40:56', '2018-07-21 13:40:56'),
(1203, 146, 2926, 'Arhangay', '2018-07-21 13:40:58', '2018-07-21 13:40:58'),
(1204, 146, 2902, 'Bayan-Olgiy', '2018-07-21 13:40:58', '2018-07-21 13:40:58'),
(1205, 146, 2919, 'Bayanhongor', '2018-07-21 13:40:58', '2018-07-21 13:40:58'),
(1206, 146, 2230, 'Bulgan', '2018-07-21 13:40:58', '2018-07-21 13:40:58'),
(1207, 146, 2688, 'Darhan-Uul', '2018-07-21 13:40:58', '2018-07-21 13:40:58'),
(1208, 146, 2788, 'Dornod', '2018-07-21 13:40:58', '2018-07-21 13:40:58'),
(1209, 146, 2898, 'Dornogovi', '2018-07-21 13:40:58', '2018-07-21 13:40:58'),
(1210, 146, 2900, 'Dundgovi', '2018-07-21 13:40:58', '2018-07-21 13:40:58'),
(1211, 146, 2901, 'Dzavhan', '2018-07-21 13:40:58', '2018-07-21 13:40:58'),
(1212, 146, 2920, 'Govisumber', '2018-07-21 13:40:58', '2018-07-21 13:40:58'),
(1213, 146, 1661, 'Hentiy', '2018-07-21 13:40:58', '2018-07-21 13:40:58'),
(1214, 146, 2927, 'Hovsgol', '2018-07-21 13:40:58', '2018-07-21 13:40:58'),
(1215, 146, 2914, 'Omnogovi', '2018-07-21 13:40:58', '2018-07-21 13:40:58'),
(1216, 146, 2469, 'Orhon', '2018-07-21 13:40:58', '2018-07-21 13:40:58'),
(1217, 146, 1863, 'Selenge', '2018-07-21 13:40:58', '2018-07-21 13:40:58'),
(1218, 146, 2419, 'Suhbaatar', '2018-07-21 13:40:58', '2018-07-21 13:40:58'),
(1219, 146, 55, 'Ulaanbaatar', '2018-07-21 13:40:58', '2018-07-21 13:40:58'),
(1220, 146, 2798, 'Uvs', '2018-07-21 13:40:58', '2018-07-21 13:40:58'),
(1221, 148, 2703, 'Saint Anthony', '2018-07-21 13:40:59', '2018-07-21 13:40:59'),
(1222, 149, 2183, 'Grand Casablanca', '2018-07-21 13:40:59', '2018-07-21 13:40:59'),
(1223, 149, 2184, 'Gharb-Chrarda-Beni Hssen', '2018-07-21 13:40:59', '2018-07-21 13:40:59'),
(1224, 149, 2188, 'Rabat-Sale-Zemmour-Zaer', '2018-07-21 13:40:59', '2018-07-21 13:40:59'),
(1225, 149, 2189, 'Tanger-Tetouan', '2018-07-21 13:40:59', '2018-07-21 13:40:59'),
(1226, 149, 2190, 'Fes-Boulemane', '2018-07-21 13:40:59', '2018-07-21 13:40:59'),
(1227, 149, 2191, 'Meknes-Tafilalet', '2018-07-21 13:40:59', '2018-07-21 13:40:59'),
(1228, 149, 2192, 'Oriental', '2018-07-21 13:40:59', '2018-07-21 13:40:59'),
(1229, 149, 2193, 'Souss-Massa-Dr,a', '2018-07-21 13:40:59', '2018-07-21 13:40:59'),
(1230, 149, 2194, 'Marrakech-Tensift-Al Haouz', '2018-07-21 13:40:59', '2018-07-21 13:40:59'),
(1231, 149, 2195, 'Chaouia-Ouardigha', '2018-07-21 13:40:59', '2018-07-21 13:40:59'),
(1232, 149, 2206, 'Doukkala-Abda', '2018-07-21 13:40:59', '2018-07-21 13:40:59'),
(1233, 149, 2207, 'Tadla-Azilal', '2018-07-21 13:40:59', '2018-07-21 13:40:59'),
(1234, 149, 2391, 'Guelmim-Es Smara', '2018-07-21 13:40:59', '2018-07-21 13:40:59'),
(1235, 149, 2587, 'Taza-Al Hoceima-Taounate', '2018-07-21 13:40:59', '2018-07-21 13:40:59'),
(1236, 150, 855, 'Nampula', '2018-07-21 13:41:00', '2018-07-21 13:41:00'),
(1237, 150, 1026, 'Maputo', '2018-07-21 13:41:00', '2018-07-21 13:41:00'),
(1238, 150, 1343, 'Sofala', '2018-07-21 13:41:00', '2018-07-21 13:41:00'),
(1239, 150, 2041, 'Tete', '2018-07-21 13:41:00', '2018-07-21 13:41:00'),
(1240, 150, 2199, 'Zambezia', '2018-07-21 13:41:00', '2018-07-21 13:41:00'),
(1241, 150, 2373, 'Niassa', '2018-07-21 13:41:00', '2018-07-21 13:41:00'),
(1242, 150, 2623, 'Manica', '2018-07-21 13:41:00', '2018-07-21 13:41:00'),
(1243, 150, 2626, 'Cabo Delgado', '2018-07-21 13:41:00', '2018-07-21 13:41:00'),
(1244, 151, 1720, 'Yangon', '2018-07-21 13:41:01', '2018-07-21 13:41:01'),
(1245, 151, 2843, 'Mandalay', '2018-07-21 13:41:01', '2018-07-21 13:41:01'),
(1246, 151, 2895, 'Karan State', '2018-07-21 13:41:01', '2018-07-21 13:41:01'),
(1247, 151, 2904, 'Shan State', '2018-07-21 13:41:01', '2018-07-21 13:41:01'),
(1248, 152, 1097, 'Erongo', '2018-07-21 13:41:01', '2018-07-21 13:41:01'),
(1249, 152, 1320, 'Windhoek', '2018-07-21 13:41:01', '2018-07-21 13:41:01'),
(1250, 152, 1620, 'Otjozondjupa', '2018-07-21 13:41:01', '2018-07-21 13:41:01'),
(1251, 152, 1748, 'Oshana', '2018-07-21 13:41:01', '2018-07-21 13:41:01'),
(1252, 152, 1895, 'Karas', '2018-07-21 13:41:01', '2018-07-21 13:41:01'),
(1253, 152, 1988, 'Okavango', '2018-07-21 13:41:01', '2018-07-21 13:41:01'),
(1254, 152, 1989, 'Kunene', '2018-07-21 13:41:01', '2018-07-21 13:41:01'),
(1255, 152, 2470, 'Oshikoto', '2018-07-21 13:41:01', '2018-07-21 13:41:01'),
(1256, 152, 2515, 'Ohangwena', '2018-07-21 13:41:01', '2018-07-21 13:41:01'),
(1257, 152, 2555, 'Hardap', '2018-07-21 13:41:01', '2018-07-21 13:41:01'),
(1258, 152, 2653, 'Omaheke', '2018-07-21 13:41:01', '2018-07-21 13:41:01'),
(1259, 152, 2922, 'Omusati', '2018-07-21 13:41:01', '2018-07-21 13:41:01'),
(1260, 155, 26, 'Noord-Brabant', '2018-07-21 13:41:03', '2018-07-21 13:41:03'),
(1261, 155, 248, 'Groningen', '2018-07-21 13:41:03', '2018-07-21 13:41:03'),
(1262, 155, 394, 'Noord-Holland', '2018-07-21 13:41:03', '2018-07-21 13:41:03'),
(1263, 155, 463, 'Utrecht', '2018-07-21 13:41:03', '2018-07-21 13:41:03'),
(1264, 155, 465, 'Gelderland', '2018-07-21 13:41:03', '2018-07-21 13:41:03'),
(1265, 155, 549, 'Zuid-Holland', '2018-07-21 13:41:03', '2018-07-21 13:41:03'),
(1266, 155, 608, 'Friesland', '2018-07-21 13:41:03', '2018-07-21 13:41:03'),
(1267, 155, 664, 'Overijssel', '2018-07-21 13:41:03', '2018-07-21 13:41:03'),
(1268, 155, 801, 'Flevoland', '2018-07-21 13:41:03', '2018-07-21 13:41:03'),
(1269, 155, 829, 'Drenthe', '2018-07-21 13:41:03', '2018-07-21 13:41:03'),
(1270, 155, 883, 'Zeeland', '2018-07-21 13:41:03', '2018-07-21 13:41:03'),
(1271, 158, 74, 'Canterbury', '2018-07-21 13:41:05', '2018-07-21 13:41:05'),
(1272, 158, 108, 'Auckland', '2018-07-21 13:41:05', '2018-07-21 13:41:05'),
(1273, 158, 131, 'Gisborne', '2018-07-21 13:41:05', '2018-07-21 13:41:05'),
(1274, 158, 183, 'Waikato', '2018-07-21 13:41:05', '2018-07-21 13:41:05'),
(1275, 158, 280, 'Otago', '2018-07-21 13:41:05', '2018-07-21 13:41:05'),
(1276, 158, 511, 'Marlborough', '2018-07-21 13:41:05', '2018-07-21 13:41:05'),
(1277, 158, 564, 'Wellington', '2018-07-21 13:41:05', '2018-07-21 13:41:05'),
(1278, 158, 866, 'Manawatu-Wanganui', '2018-07-21 13:41:05', '2018-07-21 13:41:05'),
(1279, 158, 972, 'Taranaki', '2018-07-21 13:41:05', '2018-07-21 13:41:05'),
(1280, 158, 990, 'Nelson', '2018-07-21 13:41:05', '2018-07-21 13:41:05'),
(1281, 158, 1033, 'Hawke\'s Bay', '2018-07-21 13:41:05', '2018-07-21 13:41:05'),
(1282, 158, 1315, 'Southland', '2018-07-21 13:41:05', '2018-07-21 13:41:05'),
(1283, 158, 1479, 'Bay of Plenty', '2018-07-21 13:41:05', '2018-07-21 13:41:05'),
(1284, 158, 1725, 'West Coast', '2018-07-21 13:41:05', '2018-07-21 13:41:05'),
(1285, 158, 2310, 'Northland', '2018-07-21 13:41:05', '2018-07-21 13:41:05'),
(1286, 159, 201, 'Managua', '2018-07-21 13:41:05', '2018-07-21 13:41:05'),
(1287, 159, 255, 'Esteli', '2018-07-21 13:41:05', '2018-07-21 13:41:05'),
(1288, 159, 1381, 'Granada', '2018-07-21 13:41:05', '2018-07-21 13:41:05'),
(1289, 159, 1600, 'Masaya', '2018-07-21 13:41:05', '2018-07-21 13:41:05'),
(1290, 159, 1604, 'Chontales', '2018-07-21 13:41:05', '2018-07-21 13:41:05'),
(1291, 159, 1796, 'Carazo', '2018-07-21 13:41:05', '2018-07-21 13:41:05'),
(1292, 159, 2441, 'Leon', '2018-07-21 13:41:05', '2018-07-21 13:41:05'),
(1293, 159, 2498, 'Chinandega', '2018-07-21 13:41:05', '2018-07-21 13:41:05'),
(1294, 159, 2526, 'Matagalpa', '2018-07-21 13:41:05', '2018-07-21 13:41:05'),
(1295, 159, 2530, 'Boaco', '2018-07-21 13:41:05', '2018-07-21 13:41:05'),
(1296, 159, 2691, 'Region Autonoma Atlantico Sur', '2018-07-21 13:41:05', '2018-07-21 13:41:05'),
(1297, 159, 2692, 'Rivas', '2018-07-21 13:41:05', '2018-07-21 13:41:05'),
(1298, 159, 2697, 'Nueva Segovia', '2018-07-21 13:41:05', '2018-07-21 13:41:05'),
(1299, 159, 2698, 'Jinotega', '2018-07-21 13:41:05', '2018-07-21 13:41:05'),
(1300, 159, 2699, 'Autonoma Atlantico Norte', '2018-07-21 13:41:05', '2018-07-21 13:41:05'),
(1301, 160, 1752, 'Niamey', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1302, 161, 233, 'Lagos', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1303, 161, 740, 'Imo', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1304, 161, 753, 'Rivers', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1305, 161, 816, 'Oyo', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1306, 161, 988, 'Federal Capital Territory', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1307, 161, 1283, 'Ogun', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1308, 161, 1363, 'Kano', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1309, 161, 1507, 'Delta', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1310, 161, 1621, 'Plateau', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1311, 161, 1713, 'Kebbi', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1312, 161, 1719, 'Abia', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1313, 161, 1727, 'Cross River', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1314, 161, 1728, 'Edo', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1315, 161, 1729, 'Osun', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1316, 161, 1880, 'Anambra', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1317, 161, 1975, 'Bauchi', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1318, 161, 2016, 'Ebonyi', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1319, 161, 2017, 'Sokoto', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1320, 161, 2018, 'Benue', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1321, 161, 2023, 'Gombe', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1322, 161, 2024, 'Jigawa', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1323, 161, 2033, 'Enugu', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1324, 161, 2034, 'Kwara', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1325, 161, 2040, 'Kaduna', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1326, 161, 2178, 'Niger', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1327, 161, 2182, 'Kogi', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1328, 161, 2204, 'Adamawa', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1329, 161, 2366, 'Ondo', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1330, 161, 2446, 'Akwa Ibom', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1331, 161, 2624, 'Katsina', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1332, 161, 2625, 'Yobe', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1333, 161, 2650, 'Nassarawa', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1334, 161, 2719, 'Bayelsa', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1335, 161, 2731, 'Borno', '2018-07-21 13:41:06', '2018-07-21 13:41:06'),
(1336, 165, 505, 'Hedmark', '2018-07-21 13:41:08', '2018-07-21 13:41:08'),
(1337, 165, 509, 'Telemark', '2018-07-21 13:41:08', '2018-07-21 13:41:08'),
(1338, 165, 605, 'Vestfold', '2018-07-21 13:41:08', '2018-07-21 13:41:08'),
(1339, 165, 614, 'Ostfold', '2018-07-21 13:41:08', '2018-07-21 13:41:08'),
(1340, 165, 688, 'Oslo', '2018-07-21 13:41:08', '2018-07-21 13:41:08');
INSERT INTO `states` (`id`, `country_id`, `state_api_id`, `name`, `created_at`, `updated_at`) VALUES
(1341, 165, 730, 'Hordaland', '2018-07-21 13:41:08', '2018-07-21 13:41:08'),
(1342, 165, 763, 'Sor-Trondelag', '2018-07-21 13:41:08', '2018-07-21 13:41:08'),
(1343, 165, 819, 'Troms', '2018-07-21 13:41:08', '2018-07-21 13:41:08'),
(1344, 165, 894, 'Nordland', '2018-07-21 13:41:08', '2018-07-21 13:41:08'),
(1345, 165, 923, 'Akershus', '2018-07-21 13:41:08', '2018-07-21 13:41:08'),
(1346, 165, 1023, 'Oppland', '2018-07-21 13:41:08', '2018-07-21 13:41:08'),
(1347, 165, 1052, 'Buskerud', '2018-07-21 13:41:08', '2018-07-21 13:41:08'),
(1348, 165, 1114, 'Rogaland', '2018-07-21 13:41:08', '2018-07-21 13:41:08'),
(1349, 165, 1148, 'More og Romsdal', '2018-07-21 13:41:08', '2018-07-21 13:41:08'),
(1350, 165, 1213, 'Vest-Agder', '2018-07-21 13:41:08', '2018-07-21 13:41:08'),
(1351, 165, 1358, 'Sogn og Fjordane', '2018-07-21 13:41:08', '2018-07-21 13:41:08'),
(1352, 165, 1423, 'Aust-Agder', '2018-07-21 13:41:08', '2018-07-21 13:41:08'),
(1353, 165, 1496, 'Finnmark', '2018-07-21 13:41:08', '2018-07-21 13:41:08'),
(1354, 165, 1576, 'Nord-Trondelag', '2018-07-21 13:41:08', '2018-07-21 13:41:08'),
(1355, 166, 122, 'Masqat', '2018-07-21 13:41:09', '2018-07-21 13:41:09'),
(1356, 166, 1392, 'Zufar', '2018-07-21 13:41:09', '2018-07-21 13:41:09'),
(1357, 166, 2165, 'Musandam', '2018-07-21 13:41:09', '2018-07-21 13:41:09'),
(1358, 166, 2173, 'Al Batinah', '2018-07-21 13:41:09', '2018-07-21 13:41:09'),
(1359, 166, 2754, 'Az Zahirah', '2018-07-21 13:41:09', '2018-07-21 13:41:09'),
(1360, 167, 153, 'Islamabad', '2018-07-21 13:41:10', '2018-07-21 13:41:10'),
(1361, 167, 195, 'Sindh', '2018-07-21 13:41:10', '2018-07-21 13:41:10'),
(1362, 167, 229, 'North-West Frontier', '2018-07-21 13:41:10', '2018-07-21 13:41:10'),
(1363, 167, 854, 'Balochistan', '2018-07-21 13:41:10', '2018-07-21 13:41:10'),
(1364, 167, 1074, 'Azad Kashmir', '2018-07-21 13:41:10', '2018-07-21 13:41:10'),
(1365, 167, 2631, 'Northern Areas', '2018-07-21 13:41:10', '2018-07-21 13:41:10'),
(1366, 167, 2869, 'Federally Administered Tribal Areas', '2018-07-21 13:41:10', '2018-07-21 13:41:10'),
(1367, 169, 2435, 'Gaza', '2018-07-21 13:41:11', '2018-07-21 13:41:11'),
(1368, 170, 931, 'Chiriqui', '2018-07-21 13:41:11', '2018-07-21 13:41:11'),
(1369, 170, 1116, 'Darien', '2018-07-21 13:41:11', '2018-07-21 13:41:11'),
(1370, 170, 1161, 'Colon', '2018-07-21 13:41:11', '2018-07-21 13:41:11'),
(1371, 170, 1262, 'Panama', '2018-07-21 13:41:11', '2018-07-21 13:41:11'),
(1372, 170, 1366, 'Veraguas', '2018-07-21 13:41:11', '2018-07-21 13:41:11'),
(1373, 170, 1693, 'Los Santos', '2018-07-21 13:41:11', '2018-07-21 13:41:11'),
(1374, 170, 1991, 'Bocas del Toro', '2018-07-21 13:41:11', '2018-07-21 13:41:11'),
(1375, 170, 2088, 'San Blas', '2018-07-21 13:41:11', '2018-07-21 13:41:11'),
(1376, 170, 2132, 'Herrera', '2018-07-21 13:41:11', '2018-07-21 13:41:11'),
(1377, 170, 2351, 'Cocle', '2018-07-21 13:41:11', '2018-07-21 13:41:11'),
(1378, 171, 929, 'National Capital', '2018-07-21 13:41:12', '2018-07-21 13:41:12'),
(1379, 171, 2415, 'Morobe', '2018-07-21 13:41:12', '2018-07-21 13:41:12'),
(1380, 171, 2433, 'Milne Bay', '2018-07-21 13:41:12', '2018-07-21 13:41:12'),
(1381, 171, 2632, 'Madang', '2018-07-21 13:41:12', '2018-07-21 13:41:12'),
(1382, 171, 2633, 'Enga', '2018-07-21 13:41:12', '2018-07-21 13:41:12'),
(1383, 171, 2718, 'Western Highlands', '2018-07-21 13:41:12', '2018-07-21 13:41:12'),
(1384, 171, 2737, 'Eastern Highlands', '2018-07-21 13:41:12', '2018-07-21 13:41:12'),
(1385, 171, 2781, 'East New Britain', '2018-07-21 13:41:12', '2018-07-21 13:41:12'),
(1386, 172, 1499, 'Alto Parana', '2018-07-21 13:41:12', '2018-07-21 13:41:12'),
(1387, 172, 2134, 'Itapua', '2018-07-21 13:41:12', '2018-07-21 13:41:12'),
(1388, 172, 2398, 'Cordillera', '2018-07-21 13:41:12', '2018-07-21 13:41:12'),
(1389, 172, 2423, 'Amambay', '2018-07-21 13:41:12', '2018-07-21 13:41:12'),
(1390, 172, 2479, 'Guaira', '2018-07-21 13:41:12', '2018-07-21 13:41:12'),
(1391, 172, 2894, 'Alto Paraguay', '2018-07-21 13:41:12', '2018-07-21 13:41:12'),
(1392, 173, 126, 'Lima', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1393, 173, 971, 'Ica', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1394, 173, 1119, 'Arequipa', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1395, 173, 1277, 'Huancavelica', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1396, 173, 1372, 'Cusco', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1397, 173, 1458, 'Callao', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1398, 173, 1469, 'Tacna', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1399, 173, 1470, 'Ancash', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1400, 173, 1522, 'Piura', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1401, 173, 1754, 'Ucayali', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1402, 173, 1804, 'San Martin', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1403, 173, 1835, 'Lambayeque', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1404, 173, 1908, 'Puno', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1405, 173, 1939, 'Cajamarca', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1406, 173, 2003, 'Ayacucho', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1407, 173, 2118, 'Loreto', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1408, 173, 2121, 'Junin', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1409, 173, 2122, 'Huanuco', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1410, 173, 2418, 'Pasco', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1411, 173, 2489, 'Moquegua', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1412, 173, 2611, 'Apurimac', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1413, 173, 2799, 'Tumbes', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1414, 173, 2883, 'Madre de Dios', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1415, 174, 69, 'Manila', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1416, 174, 149, 'Bacolod', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1417, 174, 150, 'Cebu City', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1418, 174, 209, 'Benguet', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1419, 174, 216, 'General Santos', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1420, 174, 240, 'Quezon City', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1421, 174, 259, 'Batangas', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1422, 174, 270, 'Rizal', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1423, 174, 275, 'Cavite City', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1424, 174, 387, 'Quezon', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1425, 174, 389, 'Laguna', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1426, 174, 438, 'Dumaguete', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1427, 174, 487, 'Bulacan', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1428, 174, 494, 'Pasay', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1429, 174, 609, 'Pampanga', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1430, 174, 680, 'Zamboanga', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1431, 174, 683, 'Davao City', '2018-07-21 13:41:13', '2018-07-21 13:41:13'),
(1432, 174, 734, 'Zamboanga del Sur', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1433, 174, 877, 'Naga', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1434, 174, 936, 'Batangas City', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1435, 174, 943, 'Cagayan de Oro', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1436, 174, 955, 'Iloilo City', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1437, 174, 967, 'Butuan', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1438, 174, 973, 'Albay', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1439, 174, 1029, 'Iligan', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1440, 174, 1098, 'Zambales', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1441, 174, 1181, 'Gingoog', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1442, 174, 1190, 'Cavite', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1443, 174, 1223, 'Davao', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1444, 174, 1264, 'Dipolog', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1445, 174, 1295, 'Pangasinan', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1446, 174, 1300, 'Tacloban', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1447, 174, 1305, 'Bataan', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1448, 174, 1325, 'Iloilo', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1449, 174, 1353, 'Toledo', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1450, 174, 1387, 'Caloocan', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1451, 174, 1430, 'Nueva Ecija', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1452, 174, 1431, 'Olongapo', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1453, 174, 1436, 'Angeles', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1454, 174, 1451, 'San Pablo', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1455, 174, 1452, 'Masbate', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1456, 174, 1473, 'Negros Oriental', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1457, 174, 1490, 'Ormoc', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1458, 174, 1505, 'Lapu-Lapu', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1459, 174, 1529, 'Lucena', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1460, 174, 1558, 'Ilocos Sur', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1461, 174, 1570, 'Baguio', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1462, 174, 1585, 'Davao del Sur', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1463, 174, 1587, 'Lipa', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1464, 174, 1593, 'La Union', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1465, 174, 1595, 'Negros Occidental', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1466, 174, 1606, 'Isabela', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1467, 174, 1628, 'Camarines Sur', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1468, 174, 1634, 'Cebu', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1469, 174, 1643, 'Cagayan', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1470, 174, 1644, 'Puerto Princesa', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1471, 174, 1647, 'Roxas', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1472, 174, 1660, 'Surigao', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1473, 174, 1666, 'Tarlac', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1474, 174, 1697, 'Quirino', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1475, 174, 1699, 'Sorsogon', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1476, 174, 1718, 'Samar', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1477, 174, 1732, 'Mandaue', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1478, 174, 1734, 'Tagbilaran', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1479, 174, 1818, 'Bohol', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1480, 174, 1821, 'Misamis Occidental', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1481, 174, 1827, 'Tagaytay', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1482, 174, 1848, 'Legaspi', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1483, 174, 1896, 'South Cotabato', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1484, 174, 1907, 'Cotabato', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1485, 174, 1924, 'Davao Oriental', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1486, 174, 1926, 'Leyte', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1487, 174, 1948, 'Ozamis', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1488, 174, 1960, 'Aklan', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1489, 174, 1961, 'Nueva Vizcaya', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1490, 174, 1971, 'Laoag', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1491, 174, 2066, 'Dagupan', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1492, 174, 2069, 'Eastern Samar', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1493, 174, 2075, 'Mindoro Oriental', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1494, 174, 2077, 'North Cotabato', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1495, 174, 2078, 'Antique', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1496, 174, 2079, 'Mindoro Occidental', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1497, 174, 2080, 'Abra', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1498, 174, 2137, 'Agusan del Norte', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1499, 174, 2147, 'Northern Samar', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1500, 174, 2380, 'Ifugao', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1501, 174, 2386, 'Silay', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1502, 174, 2445, 'Cabanatuan', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1503, 174, 2513, 'Marinduque', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1504, 174, 2519, 'Trece Martires', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1505, 174, 2546, 'San Jose del Monte', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1506, 174, 2557, 'Ilocos Norte', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1507, 174, 2597, 'Kalinga', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1508, 174, 2604, 'Palayan', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1509, 174, 2605, 'Sarangani', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1510, 174, 2643, 'Palawan', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1511, 174, 2677, 'Camarines Norte', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1512, 174, 2678, 'Bago', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1513, 174, 2679, 'Cadiz', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1514, 174, 2680, 'Capiz', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1515, 174, 2681, 'San Carlos', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1516, 174, 2702, 'Camiguin', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1517, 174, 2707, 'Bukidnon', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1518, 174, 2765, 'Oroquieta', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1519, 174, 2783, 'Dapitan', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1520, 174, 2806, 'Malaybalay', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1521, 174, 2818, 'Canlaon', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1522, 174, 2821, 'Maguindanao', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1523, 174, 2824, 'Romblon', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1524, 174, 2827, 'Siquijor', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1525, 174, 2832, 'Surigao del Sur', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1526, 174, 2837, 'La Carlota', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1527, 174, 2860, 'Marawi', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1528, 174, 2861, 'Iriga', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1529, 174, 2866, 'Tawitawi', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1530, 174, 2871, 'Zamboanga del Norte', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1531, 174, 2872, 'Lanao del Sur', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1532, 174, 2874, 'Sultan Kudarat', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1533, 174, 2882, 'Misamis Oriental', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1534, 174, 2890, 'Compostela Valley', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1535, 174, 2893, 'Davao del Norte', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1536, 174, 2921, 'Lanao del Norte', '2018-07-21 13:41:14', '2018-07-21 13:41:14'),
(1537, 176, 308, 'Slaskie', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1538, 176, 367, 'Lodzkie', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1539, 176, 415, 'Pomorskie', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1540, 176, 422, 'Dolnoslaskie', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1541, 176, 423, 'Wielkopolskie', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1542, 176, 428, 'Podlaskie', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1543, 176, 430, 'Mazowieckie', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1544, 176, 449, 'Kujawsko-Pomorskie', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1545, 176, 455, 'Swietokrzyskie', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1546, 176, 504, 'Opolskie', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1547, 176, 579, 'Zachodniopomorskie', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1548, 176, 611, 'Malopolskie', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1549, 176, 746, 'Warminsko-Mazurskie', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1550, 176, 767, 'Lubuskie', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1551, 176, 809, 'Lubelskie', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1552, 176, 1007, 'Podkarpackie', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1553, 177, 211, 'Lisboa', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1554, 177, 507, 'Setubal', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1555, 177, 567, 'Santarem', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1556, 177, 621, 'Viseu', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1557, 177, 709, 'Faro', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1558, 177, 723, 'Azores', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1559, 177, 766, 'Porto', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1560, 177, 780, 'Braga', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1561, 177, 884, 'Viana do Castelo', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1562, 177, 904, 'Coimbra', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1563, 177, 1103, 'Aveiro', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1564, 177, 1204, 'Madeira', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1565, 177, 1212, 'Leiria', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1566, 177, 1216, 'Braganca', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1567, 177, 1222, 'Evora', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1568, 177, 1245, 'Castelo Branco', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1569, 177, 1346, 'Portalegre', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1570, 177, 1494, 'Beja', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1571, 177, 1544, 'Vila Real', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1572, 177, 1674, 'Guarda', '2018-07-21 13:41:15', '2018-07-21 13:41:15'),
(1573, 179, 295, 'Ad Dawhah', '2018-07-21 13:41:17', '2018-07-21 13:41:17'),
(1574, 179, 1407, 'Al Khawr', '2018-07-21 13:41:17', '2018-07-21 13:41:17'),
(1575, 179, 1655, 'Al Wakrah Municipality', '2018-07-21 13:41:17', '2018-07-21 13:41:17'),
(1576, 179, 2401, 'Ar Rayyan', '2018-07-21 13:41:17', '2018-07-21 13:41:17'),
(1577, 179, 2506, 'Al Wakrah', '2018-07-21 13:41:17', '2018-07-21 13:41:17'),
(1578, 181, 1012, 'Alba', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1579, 181, 806, 'Arad', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1580, 181, 516, 'Arges', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1581, 181, 756, 'Bacau', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1582, 181, 499, 'Bihor', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1583, 181, 1043, 'Bistrita-Nasaud', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1584, 181, 291, 'Botosani', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1585, 181, 1184, 'Braila', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1586, 181, 467, 'Brasov', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1587, 181, 337, 'Bucuresti', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1588, 181, 1089, 'Buzau', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1589, 181, 653, 'Calarasi', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1590, 181, 1086, 'Caras-Severin', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1591, 181, 522, 'Cluj', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1592, 181, 287, 'Constanta', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1593, 181, 1687, 'Covasna', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1594, 181, 832, 'Dambovita', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1595, 181, 986, 'Dolj', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1596, 181, 807, 'Galati', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1597, 181, 521, 'Giurgiu', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1598, 181, 671, 'Gorj', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1599, 181, 741, 'Harghita', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1600, 181, 91, 'Hunedoara', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1601, 181, 1135, 'Ialomita', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1602, 181, 468, 'Iasi', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1603, 181, 762, 'Ilfov', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1604, 181, 546, 'Maramures', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1605, 181, 668, 'Mehedinti', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1606, 181, 540, 'Mures', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1607, 181, 1194, 'Neamt', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1608, 181, 1080, 'Olt', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1609, 181, 352, 'Prahova', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1610, 181, 1456, 'Salaj', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1611, 181, 1201, 'Satu Mare', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1612, 181, 269, 'Sibiu', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1613, 181, 545, 'Suceava', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1614, 181, 1562, 'Teleorman', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1615, 181, 581, 'Timis', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1616, 181, 1163, 'Tulcea', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1617, 181, 802, 'Valcea', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1618, 181, 357, 'Vaslui', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1619, 181, 1360, 'Vrancea', '2018-07-21 13:41:18', '2018-07-21 13:41:18'),
(1620, 183, 1049, 'Kigali', '2018-07-21 13:41:19', '2018-07-21 13:41:19'),
(1621, 183, 2203, 'Butare', '2018-07-21 13:41:19', '2018-07-21 13:41:19'),
(1622, 183, 2727, 'Kibungo', '2018-07-21 13:41:19', '2018-07-21 13:41:19'),
(1623, 184, 1520, 'Saint George Basseterre', '2018-07-21 13:41:19', '2018-07-21 13:41:19'),
(1624, 184, 1841, 'Saint Anne Sandy Point', '2018-07-21 13:41:19', '2018-07-21 13:41:19'),
(1625, 184, 1890, 'Christ Church Nichola Town', '2018-07-21 13:41:19', '2018-07-21 13:41:19'),
(1626, 184, 1963, 'Saint James Windward', '2018-07-21 13:41:19', '2018-07-21 13:41:19'),
(1627, 184, 1978, 'Saint Mary Cayon', '2018-07-21 13:41:19', '2018-07-21 13:41:19'),
(1628, 184, 2011, 'Saint John Figtree', '2018-07-21 13:41:19', '2018-07-21 13:41:19'),
(1629, 184, 2705, 'Saint Thomas Middle Island', '2018-07-21 13:41:19', '2018-07-21 13:41:19'),
(1630, 185, 1109, 'Castries', '2018-07-21 13:41:20', '2018-07-21 13:41:20'),
(1631, 185, 2556, 'Gros-Islet', '2018-07-21 13:41:20', '2018-07-21 13:41:20'),
(1632, 185, 2659, 'Choiseul', '2018-07-21 13:41:20', '2018-07-21 13:41:20'),
(1633, 185, 2704, 'Soufriere', '2018-07-21 13:41:20', '2018-07-21 13:41:20'),
(1634, 185, 2709, 'Anse-la-Raye', '2018-07-21 13:41:20', '2018-07-21 13:41:20'),
(1635, 185, 2792, 'Laborie', '2018-07-21 13:41:20', '2018-07-21 13:41:20'),
(1636, 185, 2835, 'Vieux-Fort', '2018-07-21 13:41:20', '2018-07-21 13:41:20'),
(1637, 186, 2706, 'Grenadines', '2018-07-21 13:41:21', '2018-07-21 13:41:21'),
(1638, 186, 2831, 'Charlotte', '2018-07-21 13:41:21', '2018-07-21 13:41:21'),
(1639, 188, 1977, 'Chiesanuova', '2018-07-21 13:41:22', '2018-07-21 13:41:22'),
(1640, 188, 2241, 'Serravalle', '2018-07-21 13:41:22', '2018-07-21 13:41:22'),
(1641, 188, 2589, 'Acquaviva', '2018-07-21 13:41:22', '2018-07-21 13:41:22'),
(1642, 188, 2908, 'San Marino', '2018-07-21 13:41:22', '2018-07-21 13:41:22'),
(1643, 189, 2838, 'Sao Tome', '2018-07-21 13:41:22', '2018-07-21 13:41:22'),
(1644, 190, 20, 'Makkah', '2018-07-21 13:41:23', '2018-07-21 13:41:23'),
(1645, 190, 199, 'Ar Riyad', '2018-07-21 13:41:23', '2018-07-21 13:41:23'),
(1646, 190, 820, 'Jizan', '2018-07-21 13:41:23', '2018-07-21 13:41:23'),
(1647, 190, 1489, 'Al Hudud ash Shamaliyah', '2018-07-21 13:41:23', '2018-07-21 13:41:23'),
(1648, 190, 1792, 'Ha\'il', '2018-07-21 13:41:23', '2018-07-21 13:41:23'),
(1649, 190, 2155, 'Al Jawf', '2018-07-21 13:41:23', '2018-07-21 13:41:23'),
(1650, 190, 2212, 'Tabuk', '2018-07-21 13:41:23', '2018-07-21 13:41:23'),
(1651, 190, 2311, 'Al Madinah', '2018-07-21 13:41:23', '2018-07-21 13:41:23'),
(1652, 190, 2361, 'Al Qasim', '2018-07-21 13:41:23', '2018-07-21 13:41:23'),
(1653, 190, 2877, 'Asir Province', '2018-07-21 13:41:23', '2018-07-21 13:41:23'),
(1654, 191, 887, 'Dakar', '2018-07-21 13:41:23', '2018-07-21 13:41:23'),
(1655, 191, 1543, 'Thies', '2018-07-21 13:41:23', '2018-07-21 13:41:23'),
(1656, 191, 1923, 'Kolda', '2018-07-21 13:41:23', '2018-07-21 13:41:23'),
(1657, 191, 1937, 'Ziguinchor', '2018-07-21 13:41:23', '2018-07-21 13:41:23'),
(1658, 191, 1973, 'Matam', '2018-07-21 13:41:23', '2018-07-21 13:41:23'),
(1659, 191, 2104, 'Saint-Louis', '2018-07-21 13:41:23', '2018-07-21 13:41:23'),
(1660, 191, 2112, 'Kaolack', '2018-07-21 13:41:23', '2018-07-21 13:41:23'),
(1661, 191, 2491, 'Tambacounda', '2018-07-21 13:41:23', '2018-07-21 13:41:23'),
(1662, 191, 2721, 'Diourbel', '2018-07-21 13:41:23', '2018-07-21 13:41:23'),
(1663, 191, 2722, 'Fatick', '2018-07-21 13:41:23', '2018-07-21 13:41:23'),
(1664, 191, 2732, 'Louga', '2018-07-21 13:41:23', '2018-07-21 13:41:23'),
(1665, 192, 652, 'Vojvodina', '2018-07-21 13:41:24', '2018-07-21 13:41:24'),
(1666, 193, 1782, 'Beau Vallon', '2018-07-21 13:41:24', '2018-07-21 13:41:24'),
(1667, 193, 2880, 'Saint Louis', '2018-07-21 13:41:24', '2018-07-21 13:41:24'),
(1668, 194, 1513, 'Western Area', '2018-07-21 13:41:25', '2018-07-21 13:41:25'),
(1669, 196, 281, 'Trnava', '2018-07-21 13:41:26', '2018-07-21 13:41:26'),
(1670, 196, 332, 'Presov', '2018-07-21 13:41:26', '2018-07-21 13:41:26'),
(1671, 196, 356, 'Bratislava', '2018-07-21 13:41:26', '2018-07-21 13:41:26'),
(1672, 196, 382, 'Zilina', '2018-07-21 13:41:26', '2018-07-21 13:41:26'),
(1673, 196, 698, 'Nitra', '2018-07-21 13:41:26', '2018-07-21 13:41:26'),
(1674, 196, 712, 'Banska Bystrica', '2018-07-21 13:41:26', '2018-07-21 13:41:26'),
(1675, 196, 764, 'Trencin', '2018-07-21 13:41:26', '2018-07-21 13:41:26'),
(1676, 196, 1004, 'Kosice', '2018-07-21 13:41:26', '2018-07-21 13:41:26'),
(1677, 197, 419, 'Brezovica', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1678, 197, 450, 'Bohinj', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1679, 197, 2167, 'Ljubljana', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1680, 197, 2211, 'Kranj', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1681, 197, 2213, 'Grosuplje', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1682, 197, 2214, 'Sevnica', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1683, 197, 2215, 'Brezice', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1684, 197, 2216, 'Celje', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1685, 197, 2217, 'Smarje pri Jelsah', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1686, 197, 2218, 'Crnomelj', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1687, 197, 2219, 'Krsko', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1688, 197, 2221, 'Trebnje', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1689, 197, 2222, 'Ptuj Urban', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1690, 197, 2223, 'Piran', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1691, 197, 2224, 'Izola-Isola', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1692, 197, 2225, 'Slovenj Gradec', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1693, 197, 2227, 'Trbovlje', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1694, 197, 2228, 'Velenje', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1695, 197, 2234, 'Ribnica', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1696, 197, 2235, 'Domzale', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1697, 197, 2236, 'Medvode', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1698, 197, 2237, 'Vrhnika', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1699, 197, 2238, 'Kamnik', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1700, 197, 2239, 'Radovljica', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1701, 197, 2243, 'Koper-Capodistria', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1702, 197, 2247, 'Maribor', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1703, 197, 2248, 'Videm', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1704, 197, 2249, 'Lasko', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1705, 197, 2250, 'Moravske Toplice', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1706, 197, 2252, 'Ljutomer', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1707, 197, 2253, 'Borovnica', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1708, 197, 2254, 'Sencur', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1709, 197, 2255, 'Ajdovscina', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1710, 197, 2256, 'Menges', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1711, 197, 2258, 'Bled', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1712, 197, 2259, 'Mezica', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1713, 197, 2262, 'Slovenska Bistrica', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1714, 197, 2263, 'Idrija', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1715, 197, 2264, 'Divaca', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1716, 197, 2265, 'Beltinci', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1717, 197, 2274, 'Nova Gorica', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1718, 197, 2275, 'Sostanj', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1719, 197, 2276, 'Zalec', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1720, 197, 2277, 'Dol pri Ljubljani', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1721, 197, 2278, 'Rogaska Slatina', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1722, 197, 2279, 'Skofljica', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1723, 197, 2280, 'Novo Mesto', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1724, 197, 2281, 'Sezana', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1725, 197, 2282, 'Vipava', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1726, 197, 2283, 'Postojna', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1727, 197, 2284, 'Ormoz', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1728, 197, 2285, 'Semic', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1729, 197, 2286, 'Pivka', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1730, 197, 2288, 'Ziri', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1731, 197, 2308, 'Miren-Kostanjevica', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1732, 197, 2313, 'Kocevje', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1733, 197, 2314, 'Sentjur pri Celju', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1734, 197, 2315, 'Vojnik', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1735, 197, 2339, 'Ilirska Bistrica', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1736, 197, 2340, 'Sentjernej', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1737, 197, 2341, 'Metlika', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1738, 197, 2342, 'Cerknica', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1739, 197, 2353, 'Zelezniki', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1740, 197, 2354, 'Racam', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1741, 197, 2364, 'Velike Lasce', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1742, 197, 2369, 'Zagorje ob Savi', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1743, 197, 2392, 'Podcetrtek', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1744, 197, 2403, 'Vodice', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1745, 197, 2424, 'Dobrepolje', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1746, 197, 2434, 'Skofja Loka', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1747, 197, 2449, 'Naklo', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1748, 197, 2464, 'Murska Sobota', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1749, 197, 2466, 'Vuzenica', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1750, 197, 2472, 'Logatec', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1751, 197, 2485, 'Litija', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1752, 197, 2486, 'Radlje ob Dravi', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1753, 197, 2495, 'Jesenice', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1754, 197, 2499, 'Muta', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1755, 197, 2500, 'Dravograd', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1756, 197, 2501, 'Trzic', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1757, 197, 2504, 'Gornja Radgona', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1758, 197, 2509, 'Sentilj', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1759, 197, 2512, 'Ivancna Gorica', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1760, 197, 2522, 'Ptuj', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1761, 197, 2524, 'Lukovica', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1762, 197, 2532, 'Cerkno', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1763, 197, 2541, 'Smartno ob Paki', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1764, 197, 2542, 'Ig', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1765, 197, 2544, 'Nazarje', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1766, 197, 2550, 'Kidricevo', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1767, 197, 2554, 'Mislinja', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1768, 197, 2559, 'Hrastnik', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1769, 197, 2568, 'Gorisnica', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1770, 197, 2569, 'Slovenske Konjice', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1771, 197, 2572, 'Zrece', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1772, 197, 2573, 'Tolmin', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1773, 197, 2574, 'Radenci', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1774, 197, 2575, 'Kranjska Gora', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1775, 197, 2576, 'Cerklje na Gorenjskem', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1776, 197, 2577, 'Kanal', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1777, 197, 2579, 'Puconci', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1778, 197, 2580, 'Sveti Jurij', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1779, 197, 2581, 'Ljubno', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1780, 197, 2582, 'Apace', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1781, 197, 2583, 'Komen', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1782, 197, 2584, 'Bloke', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1783, 197, 2585, 'Duplek', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1784, 197, 2588, 'Kozje', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1785, 197, 2622, 'Bovec', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1786, 197, 2635, 'Gornji Petrovci', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1787, 197, 2645, 'Turnisce', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1788, 197, 2657, 'Dornava', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1789, 197, 2658, 'Radece', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1790, 197, 2660, 'Mozirje', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1791, 197, 2661, 'Crna na Koroskem', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1792, 197, 2663, 'Hrpelje-Kozina', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1793, 197, 2664, 'Kungota', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1794, 197, 2665, 'Jursinci', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1795, 197, 2666, 'Lenart', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1796, 197, 2667, 'Brda', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1797, 197, 2669, 'Luce', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1798, 197, 2670, 'Pesnica', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1799, 197, 2671, 'Preddvor', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1800, 197, 2673, 'Crensovci', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1801, 197, 2674, 'Osilnica', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1802, 197, 2675, 'Mirna Pec', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1803, 197, 2738, 'Ribnica na Pohorju', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1804, 197, 2746, 'Store', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1805, 197, 2748, 'Gorenja Vas-Poljane', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1806, 197, 2749, 'Moravce', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1807, 197, 2753, 'Loska Dolina', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1808, 197, 2755, 'Dobrova-Horjul-Polhov Gradec', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1809, 197, 2756, 'Smartno pri Litiji', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1810, 197, 2759, 'Vitanje', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1811, 197, 2760, 'Kuzma', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1812, 197, 2762, 'Gornji Grad', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1813, 197, 2772, 'Cirkulane', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1814, 197, 2775, 'Odranci', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1815, 197, 2785, 'Starse', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1816, 197, 2813, 'Majsperk', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1817, 197, 2820, 'Kobarid', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1818, 197, 2825, 'Kostel', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1819, 197, 2844, 'Podvelka', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1820, 197, 2855, 'Rogasovci', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1821, 197, 2885, 'Skocjan', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1822, 197, 2886, 'Zirovnica', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1823, 197, 2889, 'Trzin', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1824, 197, 2891, 'Lendava-Lendva', '2018-07-21 13:41:27', '2018-07-21 13:41:27'),
(1825, 198, 1302, 'Makira', '2018-07-21 13:41:28', '2018-07-21 13:41:28'),
(1826, 199, 702, 'Banaadir', '2018-07-21 13:41:28', '2018-07-21 13:41:28'),
(1827, 199, 2684, 'Woqooyi Galbeed', '2018-07-21 13:41:28', '2018-07-21 13:41:28'),
(1828, 200, 207, 'Gauteng', '2018-07-21 13:41:29', '2018-07-21 13:41:29'),
(1829, 200, 320, 'KwaZulu-Natal', '2018-07-21 13:41:29', '2018-07-21 13:41:29'),
(1830, 200, 417, 'Mpumalanga', '2018-07-21 13:41:29', '2018-07-21 13:41:29'),
(1831, 200, 442, 'Western Cape', '2018-07-21 13:41:29', '2018-07-21 13:41:29'),
(1832, 200, 454, 'Eastern Cape', '2018-07-21 13:41:29', '2018-07-21 13:41:29'),
(1833, 200, 998, 'Limpopo', '2018-07-21 13:41:29', '2018-07-21 13:41:29'),
(1834, 200, 1205, 'Free State', '2018-07-21 13:41:29', '2018-07-21 13:41:29'),
(1835, 200, 1597, 'Northern Cape', '2018-07-21 13:41:29', '2018-07-21 13:41:29'),
(1836, 202, 198, 'Madrid', '2018-07-21 13:41:30', '2018-07-21 13:41:30'),
(1837, 202, 212, 'Catalonia', '2018-07-21 13:41:30', '2018-07-21 13:41:30'),
(1838, 202, 262, 'Asturias', '2018-07-21 13:41:30', '2018-07-21 13:41:30'),
(1839, 202, 432, 'Comunidad Valenciana', '2018-07-21 13:41:30', '2018-07-21 13:41:30'),
(1840, 202, 441, 'Castilla y Leon', '2018-07-21 13:41:30', '2018-07-21 13:41:30'),
(1841, 202, 489, 'Aragon', '2018-07-21 13:41:30', '2018-07-21 13:41:30'),
(1842, 202, 508, 'Murcia', '2018-07-21 13:41:30', '2018-07-21 13:41:30'),
(1843, 202, 527, 'Navarra', '2018-07-21 13:41:30', '2018-07-21 13:41:30'),
(1844, 202, 537, 'Andalucia', '2018-07-21 13:41:30', '2018-07-21 13:41:30'),
(1845, 202, 542, 'Pais Vasco', '2018-07-21 13:41:30', '2018-07-21 13:41:30'),
(1846, 202, 617, 'Canarias', '2018-07-21 13:41:30', '2018-07-21 13:41:30'),
(1847, 202, 626, 'Extremadura', '2018-07-21 13:41:30', '2018-07-21 13:41:30'),
(1848, 202, 631, 'Galicia', '2018-07-21 13:41:30', '2018-07-21 13:41:30'),
(1849, 202, 674, 'Islas Baleares', '2018-07-21 13:41:30', '2018-07-21 13:41:30'),
(1850, 202, 738, 'Castilla-La Mancha', '2018-07-21 13:41:30', '2018-07-21 13:41:30'),
(1851, 202, 1166, 'Cantabria', '2018-07-21 13:41:30', '2018-07-21 13:41:30'),
(1852, 203, 1191, 'Sabaragamuwa', '2018-07-21 13:41:30', '2018-07-21 13:41:30'),
(1853, 203, 1486, 'North Western', '2018-07-21 13:41:30', '2018-07-21 13:41:30'),
(1854, 203, 1790, 'Uva', '2018-07-21 13:41:30', '2018-07-21 13:41:30'),
(1855, 203, 2402, 'North Central', '2018-07-21 13:41:30', '2018-07-21 13:41:30'),
(1856, 206, 476, 'Darfur', '2018-07-21 13:41:32', '2018-07-21 13:41:32'),
(1857, 206, 1093, 'Central Equatoria State', '2018-07-21 13:41:32', '2018-07-21 13:41:32'),
(1858, 206, 1450, 'Al Khartum', '2018-07-21 13:41:32', '2018-07-21 13:41:32'),
(1859, 206, 2152, 'Kurdufan', '2018-07-21 13:41:32', '2018-07-21 13:41:32'),
(1860, 206, 2316, 'Al Wahadah State', '2018-07-21 13:41:32', '2018-07-21 13:41:32'),
(1861, 207, 158, 'Paramaribo', '2018-07-21 13:42:13', '2018-07-21 13:42:13'),
(1862, 207, 2528, 'Commewijne', '2018-07-21 13:42:13', '2018-07-21 13:42:13'),
(1863, 207, 2538, 'Nickerie', '2018-07-21 13:42:13', '2018-07-21 13:42:13'),
(1864, 209, 1563, 'Hhohho', '2018-07-21 13:42:14', '2018-07-21 13:42:14'),
(1865, 209, 1837, 'Manzini', '2018-07-21 13:42:14', '2018-07-21 13:42:14'),
(1866, 209, 2200, 'Shiselweni', '2018-07-21 13:42:14', '2018-07-21 13:42:14'),
(1867, 210, 68, 'Skane Lan', '2018-07-21 13:42:14', '2018-07-21 13:42:14'),
(1868, 210, 343, 'Stockholms Lan', '2018-07-21 13:42:14', '2018-07-21 13:42:14'),
(1869, 210, 404, 'Vastra Gotaland', '2018-07-21 13:42:14', '2018-07-21 13:42:14'),
(1870, 210, 485, 'Sodermanlands Lan', '2018-07-21 13:42:14', '2018-07-21 13:42:14'),
(1871, 210, 492, 'Vastmanlands Lan', '2018-07-21 13:42:14', '2018-07-21 13:42:14'),
(1872, 210, 573, 'Orebro Lan', '2018-07-21 13:42:14', '2018-07-21 13:42:14'),
(1873, 210, 596, 'Dalarnas Lan', '2018-07-21 13:42:14', '2018-07-21 13:42:14'),
(1874, 210, 628, 'Uppsala Lan', '2018-07-21 13:42:14', '2018-07-21 13:42:14'),
(1875, 210, 670, 'Vasternorrlands Lan', '2018-07-21 13:42:14', '2018-07-21 13:42:14'),
(1876, 210, 711, 'Jonkopings Lan', '2018-07-21 13:42:14', '2018-07-21 13:42:14'),
(1877, 210, 737, 'Vasterbottens Lan', '2018-07-21 13:42:14', '2018-07-21 13:42:14'),
(1878, 210, 784, 'Ostergotlands Lan', '2018-07-21 13:42:14', '2018-07-21 13:42:14'),
(1879, 210, 830, 'Varmlands Lan', '2018-07-21 13:42:14', '2018-07-21 13:42:14'),
(1880, 210, 867, 'Gavleborgs Lan', '2018-07-21 13:42:14', '2018-07-21 13:42:14'),
(1881, 210, 991, 'Hallands Lan', '2018-07-21 13:42:14', '2018-07-21 13:42:14'),
(1882, 210, 1014, 'Kronobergs Lan', '2018-07-21 13:42:14', '2018-07-21 13:42:14'),
(1883, 210, 1111, 'Kalmar Lan', '2018-07-21 13:42:14', '2018-07-21 13:42:14'),
(1884, 210, 1152, 'Jamtlands Lan', '2018-07-21 13:42:14', '2018-07-21 13:42:14'),
(1885, 210, 1329, 'Gotlands Lan', '2018-07-21 13:42:14', '2018-07-21 13:42:14'),
(1886, 210, 1330, 'Norrbottens Lan', '2018-07-21 13:42:14', '2018-07-21 13:42:14'),
(1887, 210, 1467, 'Blekinge Lan', '2018-07-21 13:42:14', '2018-07-21 13:42:14'),
(1888, 211, 277, 'Ticino', '2018-07-21 13:42:15', '2018-07-21 13:42:15'),
(1889, 211, 326, 'Basel-Stadt', '2018-07-21 13:42:15', '2018-07-21 13:42:15'),
(1890, 211, 445, 'Zurich', '2018-07-21 13:42:15', '2018-07-21 13:42:15'),
(1891, 211, 462, 'Graubunden', '2018-07-21 13:42:15', '2018-07-21 13:42:15'),
(1892, 211, 486, 'Geneve', '2018-07-21 13:42:15', '2018-07-21 13:42:15'),
(1893, 211, 603, 'Valais', '2018-07-21 13:42:15', '2018-07-21 13:42:15'),
(1894, 211, 606, 'Bern', '2018-07-21 13:42:15', '2018-07-21 13:42:15'),
(1895, 211, 615, 'Fribourg', '2018-07-21 13:42:15', '2018-07-21 13:42:15'),
(1896, 211, 705, 'Solothurn', '2018-07-21 13:42:15', '2018-07-21 13:42:15'),
(1897, 211, 824, 'Vaud', '2018-07-21 13:42:15', '2018-07-21 13:42:15'),
(1898, 211, 868, 'Aargau', '2018-07-21 13:42:15', '2018-07-21 13:42:15'),
(1899, 211, 940, 'Sankt Gallen', '2018-07-21 13:42:15', '2018-07-21 13:42:15'),
(1900, 211, 1020, 'Zug', '2018-07-21 13:42:15', '2018-07-21 13:42:15'),
(1901, 211, 1028, 'Thurgau', '2018-07-21 13:42:15', '2018-07-21 13:42:15'),
(1902, 211, 1105, 'Luzern', '2018-07-21 13:42:15', '2018-07-21 13:42:15'),
(1903, 211, 1142, 'Neuchatel', '2018-07-21 13:42:15', '2018-07-21 13:42:15'),
(1904, 211, 1233, 'Schaffhausen', '2018-07-21 13:42:15', '2018-07-21 13:42:15'),
(1905, 211, 1236, 'Obwalden', '2018-07-21 13:42:15', '2018-07-21 13:42:15'),
(1906, 211, 1257, 'Schwyz', '2018-07-21 13:42:15', '2018-07-21 13:42:15'),
(1907, 211, 1443, 'Ausser-Rhoden', '2018-07-21 13:42:15', '2018-07-21 13:42:15'),
(1908, 211, 1484, 'Inner-Rhoden', '2018-07-21 13:42:15', '2018-07-21 13:42:15'),
(1909, 211, 1525, 'Basel-Landschaft', '2018-07-21 13:42:15', '2018-07-21 13:42:15'),
(1910, 211, 1556, 'Jura', '2018-07-21 13:42:15', '2018-07-21 13:42:15'),
(1911, 211, 1561, 'Nidwalden', '2018-07-21 13:42:15', '2018-07-21 13:42:15'),
(1912, 211, 1611, 'Glarus', '2018-07-21 13:42:15', '2018-07-21 13:42:15'),
(1913, 211, 1913, 'Uri', '2018-07-21 13:42:15', '2018-07-21 13:42:15'),
(1914, 213, 86, 'T\'ai-pei', '2018-07-21 13:42:16', '2018-07-21 13:42:16'),
(1915, 213, 105, 'T\'ai-wan', '2018-07-21 13:42:16', '2018-07-21 13:42:16'),
(1916, 213, 1946, 'Fu-chien', '2018-07-21 13:42:16', '2018-07-21 13:42:16'),
(1917, 213, 2808, 'Kao-hsiung', '2018-07-21 13:42:16', '2018-07-21 13:42:16'),
(1918, 214, 1646, 'Khatlon', '2018-07-21 13:42:17', '2018-07-21 13:42:17'),
(1919, 214, 1952, 'Sughd', '2018-07-21 13:42:17', '2018-07-21 13:42:17'),
(1920, 214, 2917, 'Kuhistoni Badakhshon', '2018-07-21 13:42:17', '2018-07-21 13:42:17'),
(1921, 216, 335, 'Amnat Charoen', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1922, 216, 2540, 'Ang Thong', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1923, 216, 413, 'Buriram', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1924, 216, 1253, 'Chachoengsao', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1925, 216, 2460, 'Chai Nat', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1926, 216, 1866, 'Chaiyaphum', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1927, 216, 1938, 'Chanthaburi', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1928, 216, 273, 'Chiang Mai', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1929, 216, 1607, 'Chiang Rai', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1930, 216, 238, 'Chon Buri', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1931, 216, 1928, 'Chumphon', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1932, 216, 1838, 'Kalasin', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1933, 216, 2432, 'Kamphaeng Phet', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1934, 216, 321, 'Kanchanaburi', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1935, 216, 951, 'Khon Kaen', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1936, 216, 1681, 'Krabi', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1937, 216, 75, 'Krung Thep', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1938, 216, 1048, 'Lampang', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1939, 216, 999, 'Lamphun', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1940, 216, 1825, 'Loei', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1941, 216, 1429, 'Lop Buri', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1942, 216, 2595, 'Mae Hong Son', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1943, 216, 1833, 'Maha Sarakham', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1944, 216, 2162, 'Mukdahan', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1945, 216, 2070, 'Nakhon Nayok', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1946, 216, 1584, 'Nakhon Pathom', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1947, 216, 1951, 'Nakhon Phanom', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1948, 216, 378, 'Nakhon Ratchasima', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1949, 216, 1176, 'Nakhon Sawan', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1950, 216, 1185, 'Nakhon Si Thammarat', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1951, 216, 1996, 'Nan', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1952, 216, 2074, 'Narathiwat', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1953, 216, 1717, 'Nong Bua Lamphu', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1954, 216, 1685, 'Nong Khai', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1955, 216, 264, 'Nonthaburi', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1956, 216, 748, 'Pathum Thani', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1957, 216, 2322, 'Pattani', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1958, 216, 1648, 'Phangnga', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1959, 216, 2480, 'Phatthalung', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1960, 216, 1417, 'Phayao', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1961, 216, 1662, 'Phetchabun', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1962, 216, 444, 'Phetchaburi', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1963, 216, 1210, 'Phichit', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1964, 216, 1378, 'Phitsanulok', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1965, 216, 1477, 'Phra Nakhon Si Ayutthaya', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1966, 216, 1927, 'Phrae', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1967, 216, 958, 'Phuket', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1968, 216, 1735, 'Prachin Buri', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1969, 216, 1586, 'Prachuap Khiri Khan', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1970, 216, 2436, 'Ranong', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1971, 216, 975, 'Ratchaburi', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1972, 216, 1039, 'Rayong', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1973, 216, 2426, 'Roi Et', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1974, 216, 2083, 'Sa Kaeo', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1975, 216, 1582, 'Sakon Nakhon', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1976, 216, 1304, 'Samut Prakan', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1977, 216, 376, 'Samut Sakhon', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1978, 216, 1884, 'Samut Songkhram', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1979, 216, 2416, 'Saraburi', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1980, 216, 2553, 'Satun', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1981, 216, 2160, 'Sing Buri', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1982, 216, 1640, 'Sisaket', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1983, 216, 168, 'Songkhla', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1984, 216, 1327, 'Sukhothai', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1985, 216, 2375, 'Suphan Buri', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1986, 216, 956, 'Surat Thani', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1987, 216, 1308, 'Surin', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1988, 216, 996, 'Tak', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1989, 216, 1875, 'Trang', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1990, 216, 2321, 'Trat', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1991, 216, 1744, 'Ubon Ratchathani', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1992, 216, 1307, 'Udon Thani', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1993, 216, 2496, 'Uthai Thani', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1994, 216, 2139, 'Uttaradit', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1995, 216, 2073, 'Yala', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1996, 216, 1306, 'Yasothon', '2018-07-21 13:42:18', '2018-07-21 13:42:18'),
(1997, 217, 2800, 'Maritime', '2018-07-21 13:42:19', '2018-07-21 13:42:19');
INSERT INTO `states` (`id`, `country_id`, `state_api_id`, `name`, `created_at`, `updated_at`) VALUES
(1998, 219, 2360, 'Tongatapu', '2018-07-21 13:42:20', '2018-07-21 13:42:20'),
(1999, 219, 2601, 'Vava', '2018-07-21 13:42:20', '2018-07-21 13:42:20'),
(2000, 220, 860, 'Port-of-Spain', '2018-07-21 13:42:20', '2018-07-21 13:42:20'),
(2001, 220, 1226, 'Caroni', '2018-07-21 13:42:20', '2018-07-21 13:42:20'),
(2002, 220, 1292, 'Tobago', '2018-07-21 13:42:20', '2018-07-21 13:42:20'),
(2003, 220, 1339, 'San Fernando', '2018-07-21 13:42:20', '2018-07-21 13:42:20'),
(2004, 220, 1579, 'Arima', '2018-07-21 13:42:20', '2018-07-21 13:42:20'),
(2005, 220, 2084, 'Nariva', '2018-07-21 13:42:20', '2018-07-21 13:42:20'),
(2006, 221, 426, 'Tunis', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2007, 221, 560, 'Bizerte', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2008, 221, 796, 'Nabeul', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2009, 221, 858, 'Sfax', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2010, 221, 1099, 'Sousse', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2011, 221, 1869, 'Al Mahdia', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2012, 221, 1901, 'Al Munastir', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2013, 221, 1936, 'Kairouan', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2014, 221, 2110, 'Bajah', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2015, 221, 2205, 'Madanin', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2016, 221, 2357, 'Jendouba', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2017, 221, 2567, 'Tataouine', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2018, 221, 2700, 'Sidi Bou Zid', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2019, 221, 2734, 'Kebili', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2020, 221, 2735, 'Gabes', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2021, 221, 2736, 'Kasserine', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2022, 221, 2776, 'Zaghouan', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2023, 221, 2778, 'El Kef', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2024, 221, 2865, 'Manouba', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2025, 222, 30, 'Izmir', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2026, 222, 39, 'Ankara', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2027, 222, 88, 'Trabzon', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2028, 222, 172, 'Samsun', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2029, 222, 174, 'Istanbul', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2030, 222, 330, 'Malatya', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2031, 222, 331, 'Sivas', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2032, 222, 362, 'Adana', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2033, 222, 397, 'Antalya', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2034, 222, 434, 'Usak', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2035, 222, 436, 'Bursa', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2036, 222, 475, 'Hatay', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2037, 222, 480, 'Mugla', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2038, 222, 482, 'Eskisehir', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2039, 222, 502, 'Mersin', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2040, 222, 531, 'Erzincan', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2041, 222, 534, 'Denizli', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2042, 222, 535, 'Diyarbakir', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2043, 222, 543, 'Kocaeli', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2044, 222, 547, 'Isparta', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2045, 222, 587, 'Gaziantep', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2046, 222, 593, 'Konya', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2047, 222, 594, 'Tokat', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2048, 222, 601, 'Giresun', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2049, 222, 616, 'Balikesir', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2050, 222, 644, 'Bolu', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2051, 222, 647, 'Aydin', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2052, 222, 660, 'Tekirdag', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2053, 222, 663, 'Nigde', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2054, 222, 672, 'Kayseri', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2055, 222, 735, 'Afyonkarahisar', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2056, 222, 810, 'Van', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2057, 222, 861, 'Kahramanmaras', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2058, 222, 885, 'Sakarya', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2059, 222, 891, 'Artvin', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2060, 222, 915, 'Ordu', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2061, 222, 933, 'Ardahan', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2062, 222, 945, 'Manisa', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2063, 222, 1024, 'Sanliurfa', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2064, 222, 1036, 'Nevsehir', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2065, 222, 1038, 'Yozgat', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2066, 222, 1046, 'Rize', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2067, 222, 1065, 'Sirnak', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2068, 222, 1077, 'Edirne', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2069, 222, 1088, 'Bilecik', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2070, 222, 1125, 'Corum', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2071, 222, 1137, 'Erzurum', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2072, 222, 1228, 'Batman', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2073, 222, 1247, 'Canakkale', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2074, 222, 1250, 'Elazig', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2075, 222, 1252, 'Amasya', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2076, 222, 1280, 'Yalova', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2077, 222, 1294, 'Sinop', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2078, 222, 1328, 'Agri', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2079, 222, 1371, 'Karaman', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2080, 222, 1390, 'Burdur', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2081, 222, 1427, 'Kastamonu', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2082, 222, 1442, 'Kutahya', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2083, 222, 1466, 'Kirklareli', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2084, 222, 1493, 'Mardin', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2085, 222, 1531, 'Siirt', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2086, 222, 1532, 'Bitlis', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2087, 222, 1567, 'Gumushane', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2088, 222, 1746, 'Kilis', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2089, 222, 1779, 'Tunceli', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2090, 222, 1806, 'Bingol', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2091, 222, 1814, 'Hakkari', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2092, 222, 1944, 'Adiyaman', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2093, 222, 2027, 'Mus', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2094, 222, 2045, 'Osmaniye', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2095, 222, 2171, 'Kars', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2096, 222, 2208, 'Duzce', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2097, 222, 2270, 'Aksaray', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2098, 222, 2300, 'Karabuk', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2099, 222, 2301, 'Kirsehir', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2100, 222, 2302, 'Zonguldak', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2101, 222, 2312, 'Bartin', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2102, 222, 2404, 'Igdir', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2103, 222, 2455, 'Cankiri', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2104, 222, 2505, 'Kirikkale', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2105, 222, 2543, 'Bayburt', '2018-07-21 13:42:21', '2018-07-21 13:42:21'),
(2106, 223, 2371, 'Ahal', '2018-07-21 13:42:22', '2018-07-21 13:42:22'),
(2107, 226, 323, 'Kampala', '2018-07-21 13:42:24', '2018-07-21 13:42:24'),
(2108, 226, 2362, 'Kalangala', '2018-07-21 13:42:24', '2018-07-21 13:42:24'),
(2109, 226, 2381, 'Wakiso', '2018-07-21 13:42:24', '2018-07-21 13:42:24'),
(2110, 226, 2773, 'Tororo', '2018-07-21 13:42:24', '2018-07-21 13:42:24'),
(2111, 227, 117, 'Rivnens\'ka Oblast\'', '2018-07-21 13:42:24', '2018-07-21 13:42:24'),
(2112, 227, 135, 'Kiev Oblast\'', '2018-07-21 13:42:24', '2018-07-21 13:42:24'),
(2113, 227, 166, 'L\'vivs\'ka Oblast\'', '2018-07-21 13:42:24', '2018-07-21 13:42:24'),
(2114, 227, 235, 'Kiev City', '2018-07-21 13:42:24', '2018-07-21 13:42:24'),
(2115, 227, 322, 'Kharkivs\'ka Oblast\'', '2018-07-21 13:42:24', '2018-07-21 13:42:24'),
(2116, 227, 327, 'Khersons\'ka Oblast\'', '2018-07-21 13:42:24', '2018-07-21 13:42:24'),
(2117, 227, 354, 'Krym', '2018-07-21 13:42:24', '2018-07-21 13:42:24'),
(2118, 227, 364, 'Odes\'ka Oblast\'', '2018-07-21 13:42:24', '2018-07-21 13:42:24'),
(2119, 227, 381, 'Dnipropetrovs\'ka Oblast\'', '2018-07-21 13:42:24', '2018-07-21 13:42:24'),
(2120, 227, 395, 'Ivano-Frankivs\'ka Oblast\'', '2018-07-21 13:42:24', '2018-07-21 13:42:24'),
(2121, 227, 410, 'Donets\'ka Oblast\'', '2018-07-21 13:42:24', '2018-07-21 13:42:24'),
(2122, 227, 484, 'Zaporiz\'ka Oblast\'', '2018-07-21 13:42:24', '2018-07-21 13:42:24'),
(2123, 227, 501, 'Vinnyts\'ka Oblast\'', '2018-07-21 13:42:24', '2018-07-21 13:42:24'),
(2124, 227, 571, 'Chernihivs\'ka Oblast\'', '2018-07-21 13:42:24', '2018-07-21 13:42:24'),
(2125, 227, 580, 'Ternopil\'s\'ka Oblast\'', '2018-07-21 13:42:24', '2018-07-21 13:42:24'),
(2126, 227, 620, 'Sums\'ka Oblast\'', '2018-07-21 13:42:24', '2018-07-21 13:42:24'),
(2127, 227, 636, 'Luhans\'ka Oblast\'', '2018-07-21 13:42:24', '2018-07-21 13:42:24'),
(2128, 227, 717, 'Poltavs\'ka Oblast\'', '2018-07-21 13:42:24', '2018-07-21 13:42:24'),
(2129, 227, 733, 'Cherkas\'ka Oblast\'', '2018-07-21 13:42:24', '2018-07-21 13:42:24'),
(2130, 227, 761, 'Zakarpats\'ka Oblast\'', '2018-07-21 13:42:24', '2018-07-21 13:42:24'),
(2131, 227, 831, 'Sevastopol\'', '2018-07-21 13:42:24', '2018-07-21 13:42:24'),
(2132, 227, 853, 'Mykolayivs\'ka Oblast\'', '2018-07-21 13:42:24', '2018-07-21 13:42:24'),
(2133, 227, 1276, 'Chernivets\'ka Oblast\'', '2018-07-21 13:42:24', '2018-07-21 13:42:24'),
(2134, 227, 1288, 'Volyns\'ka Oblast\'', '2018-07-21 13:42:24', '2018-07-21 13:42:24'),
(2135, 227, 1332, 'Zhytomyrs\'ka Oblast\'', '2018-07-21 13:42:24', '2018-07-21 13:42:24'),
(2136, 227, 1516, 'Khmel\'nyts\'ka Oblast\'', '2018-07-21 13:42:24', '2018-07-21 13:42:24'),
(2137, 227, 1545, 'Kirovohrads\'ka Oblast\'', '2018-07-21 13:42:24', '2018-07-21 13:42:24'),
(2138, 228, 110, 'Dubai', '2018-07-21 13:42:25', '2018-07-21 13:42:25'),
(2139, 228, 230, 'Fujairah', '2018-07-21 13:42:25', '2018-07-21 13:42:25'),
(2140, 228, 234, 'Sharjah', '2018-07-21 13:42:25', '2018-07-21 13:42:25'),
(2141, 228, 263, 'Abu Dhabi', '2018-07-21 13:42:25', '2018-07-21 13:42:25'),
(2142, 228, 1002, 'Ras Al Khaimah', '2018-07-21 13:42:25', '2018-07-21 13:42:25'),
(2143, 228, 2317, 'Ajman', '2018-07-21 13:42:25', '2018-07-21 13:42:25'),
(2144, 228, 2757, 'Umm Al Quwain', '2018-07-21 13:42:25', '2018-07-21 13:42:25'),
(2145, 229, 1220, 'Aberdeen City', '2018-07-21 13:42:25', '2018-07-21 13:42:25'),
(2146, 229, 757, 'Aberdeenshire', '2018-07-21 13:42:25', '2018-07-21 13:42:25'),
(2147, 229, 1344, 'Angus', '2018-07-21 13:42:25', '2018-07-21 13:42:25'),
(2148, 229, 1521, 'Antrim', '2018-07-21 13:42:25', '2018-07-21 13:42:25'),
(2149, 229, 1282, 'Ards', '2018-07-21 13:42:25', '2018-07-21 13:42:25'),
(2150, 229, 1764, 'Argyll and Bute', '2018-07-21 13:42:25', '2018-07-21 13:42:25'),
(2151, 229, 1370, 'Armagh', '2018-07-21 13:42:25', '2018-07-21 13:42:25'),
(2152, 229, 1771, 'Ballymena', '2018-07-21 13:42:25', '2018-07-21 13:42:25'),
(2153, 229, 2169, 'Ballymoney', '2018-07-21 13:42:25', '2018-07-21 13:42:25'),
(2154, 229, 1677, 'Banbridge', '2018-07-21 13:42:25', '2018-07-21 13:42:25'),
(2155, 229, 1608, 'Barking and Dagenham', '2018-07-21 13:42:25', '2018-07-21 13:42:25'),
(2156, 229, 1932, 'Barnet', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2157, 229, 1403, 'Barnsley', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2158, 229, 167, 'Bath and North East Somerset', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2159, 229, 583, 'Bedfordshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2160, 229, 1092, 'Belfast', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2161, 229, 1271, 'Bexley', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2162, 229, 536, 'Birmingham', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2163, 229, 1542, 'Blackburn with Darwen', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2164, 229, 1110, 'Blackpool', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2165, 229, 1730, 'Blaenau Gwent', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2166, 229, 880, 'Bolton', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2167, 229, 1336, 'Bournemouth', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2168, 229, 578, 'Bracknell Forest', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2169, 229, 627, 'Bradford', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2170, 229, 625, 'Brent', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2171, 229, 673, 'Bridgend', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2172, 229, 656, 'Brighton and Hove', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2173, 229, 901, 'Bristol, City of', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2174, 229, 1254, 'Bromley', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2175, 229, 50, 'Buckinghamshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2176, 229, 907, 'Bury', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2177, 229, 1224, 'Caerphilly', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2178, 229, 1459, 'Calderdale', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2179, 229, 679, 'Cambridgeshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2180, 229, 2267, 'Camden', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2181, 229, 812, 'Cardiff', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2182, 229, 890, 'Carmarthenshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2183, 229, 1800, 'Carrickfergus', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2184, 229, 1858, 'Castlereagh', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2185, 229, 2551, 'Central Bedfordshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2186, 229, 1557, 'Ceredigion', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2187, 229, 575, 'Cheshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2188, 229, 2523, 'Cheshire East', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2189, 229, 2521, 'Cheshire West and Chester', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2190, 229, 1146, 'Clackmannanshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2191, 229, 1480, 'Coleraine', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2192, 229, 1566, 'Conwy', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2193, 229, 1983, 'Cookstown', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2194, 229, 946, 'Cornwall', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2195, 229, 845, 'Coventry', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2196, 229, 572, 'Craigavon', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2197, 229, 788, 'Croydon', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2198, 229, 1158, 'Cumbria', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2199, 229, 1591, 'Darlington', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2200, 229, 1425, 'Denbighshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2201, 229, 899, 'Derby', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2202, 229, 646, 'Derbyshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2203, 229, 1050, 'Derry', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2204, 229, 559, 'Devon', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2205, 229, 127, 'Doncaster', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2206, 229, 524, 'Dorset', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2207, 229, 1797, 'Down', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2208, 229, 1066, 'Dudley', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2209, 229, 1474, 'Dumfries and Galloway', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2210, 229, 498, 'Dundee City', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2211, 229, 1798, 'Dungannon', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2212, 229, 948, 'Durham', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2213, 229, 686, 'Ealing', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2214, 229, 1122, 'East Ayrshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2215, 229, 1819, 'East Dunbartonshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2216, 229, 1463, 'East Lothian', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2217, 229, 1528, 'East Renfrewshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2218, 229, 1638, 'East Riding of Yorkshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2219, 229, 745, 'East Sussex', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2220, 229, 692, 'Edinburgh, City of', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2221, 229, 1969, 'Eilean Siar', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2222, 229, 1175, 'Enfield', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2223, 229, 488, 'Essex', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2224, 229, 1037, 'Falkirk', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2225, 229, 704, 'Fermanagh', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2226, 229, 965, 'Fife', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2227, 229, 1221, 'Flintshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2228, 229, 1290, 'Gateshead', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2229, 229, 1083, 'Glasgow City', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2230, 229, 591, 'Gloucestershire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2231, 229, 1919, 'Greenwich', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2232, 229, 1519, 'Gwynedd', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2233, 229, 1793, 'Hackney', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2234, 229, 1495, 'Halton', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2235, 229, 1994, 'Hammersmith and Fulham', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2236, 229, 768, 'Hampshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2237, 229, 2099, 'Haringey', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2238, 229, 1396, 'Harrow', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2239, 229, 1129, 'Hartlepool', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2240, 229, 949, 'Havering', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2241, 229, 582, 'Herefordshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2242, 229, 403, 'Hertford', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2243, 229, 1234, 'Highland', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2244, 229, 1131, 'Hillingdon', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2245, 229, 120, 'Hounslow', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2246, 229, 1501, 'Inverclyde', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2247, 229, 1909, 'Isle of Anglesey', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2248, 229, 1559, 'Isle of Wight', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2249, 229, 1859, 'Islington', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2250, 229, 2036, 'Kensington and Chelsea', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2251, 229, 371, 'Kent', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2252, 229, 715, 'Kingston upon Hull, City of', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2253, 229, 900, 'Kingston upon Thames', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2254, 229, 1487, 'Kirklees', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2255, 229, 1872, 'Knowsley', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2256, 229, 1934, 'Lambeth', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2257, 229, 618, 'Lancashire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2258, 229, 1722, 'Larne', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2259, 229, 743, 'Leeds', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2260, 229, 800, 'Leicester', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2261, 229, 878, 'Leicestershire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2262, 229, 1820, 'Lewisham', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2263, 229, 2058, 'Limavady', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2264, 229, 530, 'Lincolnshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2265, 229, 1665, 'Lisburn', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2266, 229, 599, 'Liverpool', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2267, 229, 2511, 'London', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2268, 229, 1034, 'Luton', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2269, 229, 1933, 'Magherafelt', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2270, 229, 1518, 'Medway', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2271, 229, 1635, 'Merthyr Tydfil', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2272, 229, 1663, 'Merton', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2273, 229, 1274, 'Middlesbrough', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2274, 229, 1324, 'Midlothian', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2275, 229, 707, 'Milton Keynes', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2276, 229, 1526, 'Monmouthshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2277, 229, 1408, 'Moray', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2278, 229, 1853, 'Moyle', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2279, 229, 849, 'Neath Port Talbot', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2280, 229, 203, 'Newcastle upon Tyne', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2281, 229, 1411, 'Newham', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2282, 229, 655, 'Newport', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2283, 229, 1617, 'Newry and Mourne', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2284, 229, 1347, 'Newtownabbey', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2285, 229, 881, 'Norfolk', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2286, 229, 1362, 'North Ayrshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2287, 229, 1767, 'North Down', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2288, 229, 1115, 'North East Lincolnshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2289, 229, 1171, 'North Lanarkshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2290, 229, 835, 'North Lincolnshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2291, 229, 826, 'North Somerset', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2292, 229, 1462, 'North Tyneside', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2293, 229, 1311, 'North Yorkshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2294, 229, 657, 'Northamptonshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2295, 229, 799, 'Northumberland', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2296, 229, 23, 'Nottingham', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2297, 229, 457, 'Nottinghamshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2298, 229, 873, 'Oldham', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2299, 229, 2051, 'Omagh', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2300, 229, 1854, 'Orkney', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2301, 229, 118, 'Oxfordshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2302, 229, 466, 'Pembrokeshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2303, 229, 961, 'Perth and Kinross', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2304, 229, 1101, 'Peterborough', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2305, 229, 1453, 'Plymouth', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2306, 229, 1165, 'Poole', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2307, 229, 684, 'Portsmouth', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2308, 229, 1598, 'Powys', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2309, 229, 451, 'Reading', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2310, 229, 910, 'Redbridge', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2311, 229, 2059, 'Redcar and Cleveland', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2312, 229, 1333, 'Renfrewshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2313, 229, 888, 'Rhondda Cynon Taff', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2314, 229, 769, 'Richmond upon Thames', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2315, 229, 1455, 'Rochdale', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2316, 229, 483, 'Rotherham', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2317, 229, 1510, 'Rutland', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2318, 229, 1601, 'Salford', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2319, 229, 1375, 'Sandwell', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2320, 229, 787, 'Scottish Borders, The', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2321, 229, 1249, 'Sefton', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2322, 229, 774, 'Sheffield', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2323, 229, 1864, 'Shetland Islands', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2324, 229, 932, 'Shropshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2325, 229, 147, 'Slough', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2326, 229, 1393, 'Solihull', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2327, 229, 892, 'Somerset', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2328, 229, 1348, 'South Ayrshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2329, 229, 1169, 'South Gloucestershire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2330, 229, 862, 'South Lanarkshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2331, 229, 750, 'South Tyneside', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2332, 229, 817, 'Southampton', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2333, 229, 1560, 'Southend-on-Sea', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2334, 229, 1653, 'Southwark', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2335, 229, 848, 'St. Helens', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2336, 229, 3, 'Staffordshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2337, 229, 1394, 'Stirling', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2338, 229, 697, 'Stockport', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2339, 229, 751, 'Stockton-on-Tees', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2340, 229, 905, 'Stoke-on-Trent', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2341, 229, 1865, 'Strabane', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2342, 229, 597, 'Suffolk', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2343, 229, 1515, 'Sunderland', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2344, 229, 503, 'Surrey', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2345, 229, 1415, 'Sutton', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2346, 229, 1021, 'Swansea', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2347, 229, 1749, 'Swindon', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2348, 229, 1669, 'Tameside', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2349, 229, 744, 'Telford and Wrekin', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2350, 229, 917, 'Thurrock', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2351, 229, 1051, 'Torbay', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2352, 229, 1162, 'Torfaen', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2353, 229, 1980, 'Tower Hamlets', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2354, 229, 267, 'Trafford', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2355, 229, 102, 'Vale of Glamorgan, The', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2356, 229, 871, 'Wakefield', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2357, 229, 742, 'Walsall', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2358, 229, 1657, 'Waltham Forest', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2359, 229, 1949, 'Wandsworth', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2360, 229, 1085, 'Warrington', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2361, 229, 191, 'Warwickshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2362, 229, 1354, 'West Berkshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2363, 229, 1448, 'West Dunbartonshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2364, 229, 1317, 'West Lothian', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2365, 229, 725, 'West Sussex', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2366, 229, 1897, 'Westminster', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2367, 229, 613, 'Wigan', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2368, 229, 405, 'Wiltshire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2369, 229, 823, 'Windsor and Maidenhead', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2370, 229, 1536, 'Wirral', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2371, 229, 1355, 'Wokingham', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2372, 229, 864, 'Wolverhampton', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2373, 229, 1010, 'Worcestershire', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2374, 229, 928, 'Wrexham', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2375, 229, 775, 'York', '2018-07-21 13:42:26', '2018-07-21 13:42:26'),
(2376, 230, 5, 'California', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2377, 230, 9, 'Iowa', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2378, 230, 10, 'New York', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2379, 230, 14, 'New Jersey', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2380, 230, 15, 'Massachusetts', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2381, 230, 16, 'Connecticut', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2382, 230, 19, 'Florida', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2383, 230, 24, 'Texas', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2384, 230, 28, 'Armed Forces US', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2385, 230, 32, 'Tennessee', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2386, 230, 33, 'Kentucky', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2387, 230, 35, 'Georgia', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2388, 230, 44, 'Illinois', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2389, 230, 47, 'Colorado', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2390, 230, 49, 'Utah', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2391, 230, 57, 'Maryland', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2392, 230, 72, 'South Carolina', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2393, 230, 76, 'Louisiana', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2394, 230, 84, 'Washington', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2395, 230, 87, 'Pennsylvania', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2396, 230, 93, 'North Carolina', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2397, 230, 98, 'Michigan', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2398, 230, 101, 'Arkansas', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2399, 230, 107, 'Wisconsin', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2400, 230, 129, 'Ohio', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2401, 230, 132, 'New Mexico', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2402, 230, 133, 'Kansas', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2403, 230, 136, 'Oregon', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2404, 230, 140, 'Nebraska', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2405, 230, 143, 'West Virginia', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2406, 230, 144, 'Virginia', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2407, 230, 145, 'Missouri', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2408, 230, 148, 'Mississippi', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2409, 230, 151, 'Rhode Island', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2410, 230, 163, 'Indiana', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2411, 230, 164, 'Oklahoma', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2412, 230, 175, 'Minnesota', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2413, 230, 176, 'Alabama', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2414, 230, 181, 'Arizona', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2415, 230, 186, 'South Dakota', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2416, 230, 192, 'Nevada', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2417, 230, 215, 'New Hampshire', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2418, 230, 218, 'Maine', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2419, 230, 220, 'Hawaii', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2420, 230, 249, 'District of Columbia', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2421, 230, 254, 'Delaware', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2422, 230, 305, 'Idaho', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2423, 230, 667, 'Wyoming', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2424, 230, 924, 'North Dakota', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2425, 230, 959, 'Vermont', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2426, 230, 1061, 'Alaska', '2018-07-21 13:42:27', '2018-07-21 13:42:27'),
(2427, 232, 874, 'Montevideo', '2018-07-21 13:42:28', '2018-07-21 13:42:28'),
(2428, 232, 1279, 'Lavalleja', '2018-07-21 13:42:28', '2018-07-21 13:42:28'),
(2429, 232, 1602, 'Canelones', '2018-07-21 13:42:28', '2018-07-21 13:42:28'),
(2430, 232, 2010, 'Maldonado', '2018-07-21 13:42:28', '2018-07-21 13:42:28'),
(2431, 232, 2089, 'Rocha', '2018-07-21 13:42:28', '2018-07-21 13:42:28'),
(2432, 232, 2329, 'Rivera', '2018-07-21 13:42:28', '2018-07-21 13:42:28'),
(2433, 232, 2330, 'Colonia', '2018-07-21 13:42:28', '2018-07-21 13:42:28'),
(2434, 232, 2331, 'Cerro Largo', '2018-07-21 13:42:28', '2018-07-21 13:42:28'),
(2435, 232, 2332, 'Flores', '2018-07-21 13:42:28', '2018-07-21 13:42:28'),
(2436, 232, 2510, 'Paysandu', '2018-07-21 13:42:28', '2018-07-21 13:42:28'),
(2437, 232, 2607, 'Salto', '2018-07-21 13:42:28', '2018-07-21 13:42:28'),
(2438, 232, 2608, 'Durazno', '2018-07-21 13:42:28', '2018-07-21 13:42:28'),
(2439, 232, 2826, 'Tacuarembo', '2018-07-21 13:42:28', '2018-07-21 13:42:28'),
(2440, 233, 472, 'Toshkent', '2018-07-21 13:42:28', '2018-07-21 13:42:28'),
(2441, 233, 1155, 'Andijon', '2018-07-21 13:42:28', '2018-07-21 13:42:28'),
(2442, 233, 1389, 'Farghona', '2018-07-21 13:42:28', '2018-07-21 13:42:28'),
(2443, 233, 1610, 'Nawoiy', '2018-07-21 13:42:28', '2018-07-21 13:42:28'),
(2444, 233, 1769, 'Namangan', '2018-07-21 13:42:28', '2018-07-21 13:42:28'),
(2445, 233, 1856, 'Samarqand', '2018-07-21 13:42:28', '2018-07-21 13:42:28'),
(2446, 233, 2365, 'Bukhoro', '2018-07-21 13:42:28', '2018-07-21 13:42:28'),
(2447, 233, 2417, 'Surkhondaryo', '2018-07-21 13:42:28', '2018-07-21 13:42:28'),
(2448, 233, 2786, 'Qashqadaryo', '2018-07-21 13:42:29', '2018-07-21 13:42:29'),
(2449, 234, 1953, 'Efate', '2018-07-21 13:42:29', '2018-07-21 13:42:29'),
(2450, 234, 2873, 'Shefa', '2018-07-21 13:42:29', '2018-07-21 13:42:29'),
(2451, 236, 1072, 'Zulia', '2018-07-21 13:42:30', '2018-07-21 13:42:30'),
(2452, 236, 1079, 'Tachira', '2018-07-21 13:42:30', '2018-07-21 13:42:30'),
(2453, 236, 1120, 'Lara', '2018-07-21 13:42:30', '2018-07-21 13:42:30'),
(2454, 236, 1140, 'Carabobo', '2018-07-21 13:42:30', '2018-07-21 13:42:30'),
(2455, 236, 1183, 'Aragua', '2018-07-21 13:42:30', '2018-07-21 13:42:30'),
(2456, 236, 1187, 'Miranda', '2018-07-21 13:42:30', '2018-07-21 13:42:30'),
(2457, 236, 1652, 'Vargas', '2018-07-21 13:42:30', '2018-07-21 13:42:30'),
(2458, 236, 1716, 'Merida', '2018-07-21 13:42:30', '2018-07-21 13:42:30'),
(2459, 236, 1750, 'Anzoategui', '2018-07-21 13:42:30', '2018-07-21 13:42:30'),
(2460, 236, 1852, 'Barinas', '2018-07-21 13:42:30', '2018-07-21 13:42:30'),
(2461, 236, 1888, 'Falcon', '2018-07-21 13:42:30', '2018-07-21 13:42:30'),
(2462, 236, 1905, 'Guarico', '2018-07-21 13:42:30', '2018-07-21 13:42:30'),
(2463, 236, 1974, 'Apure', '2018-07-21 13:42:30', '2018-07-21 13:42:30'),
(2464, 236, 2005, 'Monagas', '2018-07-21 13:42:30', '2018-07-21 13:42:30'),
(2465, 236, 2127, 'Nueva Esparta', '2018-07-21 13:42:30', '2018-07-21 13:42:30'),
(2466, 236, 2128, 'Trujillo', '2018-07-21 13:42:30', '2018-07-21 13:42:30'),
(2467, 236, 2338, 'Portuguesa', '2018-07-21 13:42:30', '2018-07-21 13:42:30'),
(2468, 236, 2619, 'Yaracuy', '2018-07-21 13:42:30', '2018-07-21 13:42:30'),
(2469, 236, 2712, 'Cojedes', '2018-07-21 13:42:30', '2018-07-21 13:42:30'),
(2470, 236, 2828, 'Delta Amacuro', '2018-07-21 13:42:30', '2018-07-21 13:42:30'),
(2471, 237, 25, 'Tien Giang', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2472, 237, 29, 'Dac Lac', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2473, 237, 66, 'Nghe An', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2474, 237, 125, 'Ho Chi Minh', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2475, 237, 154, 'Ha Tinh', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2476, 237, 157, 'Da Nang', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2477, 237, 177, 'Thanh Hoa', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2478, 237, 244, 'An Giang', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2479, 237, 253, 'Quang Ninh', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2480, 237, 400, 'Hai Phong', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2481, 237, 551, 'Dong Thap', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2482, 237, 566, 'Hai Duong', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2483, 237, 922, 'Vinh Phuc', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2484, 237, 974, 'Binh Dinh', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2485, 237, 989, 'Ben Tre', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2486, 237, 1025, 'Ha Giang', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2487, 237, 1090, 'Nam Dinh', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2488, 237, 1182, 'Phu Yen', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2489, 237, 1261, 'Long An', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2490, 237, 1377, 'Lang Son', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2491, 237, 1410, 'Thua Thien', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2492, 237, 1440, 'Ha Noi', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2493, 237, 1472, 'Quang Ngai', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2494, 237, 1551, 'Tra Vinh', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2495, 237, 1581, 'Phu Tho', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2496, 237, 1631, 'Hoa Binh', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2497, 237, 1633, 'Ba Ria-Vung Tau', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2498, 237, 1670, 'Soc Trang', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2499, 237, 1709, 'Dong Nai', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2500, 237, 1739, 'Nam Ha', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2501, 237, 1742, 'Ninh Binh', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2502, 237, 1759, 'Quang Nam', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2503, 237, 1775, 'Hung Yen', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2504, 237, 1879, 'Khanh Hoa', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2505, 237, 1910, 'Tay Ninh', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2506, 237, 2067, 'Son La', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2507, 237, 2082, 'Binh Thuan', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2508, 237, 2140, 'Vinh Long', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2509, 237, 2148, 'Thai Binh', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2510, 237, 2149, 'Kien Giang', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2511, 237, 2161, 'Quang Tri', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2512, 237, 2307, 'Thai Nguyen', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2513, 237, 2393, 'Dac Lak', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2514, 237, 2394, 'Can Tho', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2515, 237, 2442, 'Lam Dong', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2516, 237, 2459, 'Quang Binh', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2517, 237, 2463, 'Ninh Thuan', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2518, 237, 2481, 'Lao Cai', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2519, 237, 2503, 'Dak Nong', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2520, 237, 2520, 'Binh Duong', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2521, 237, 2527, 'Thua Thien-Hue', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2522, 237, 2534, 'Bac Giang', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2523, 237, 2535, 'Vinh Puc Province', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2524, 237, 2539, 'Bac Ninh', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2525, 237, 2590, 'Yen Bai', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2526, 237, 2591, 'Bac Kan', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2527, 237, 2592, 'Tuyen Quang', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2528, 237, 2593, 'Ca Mau', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2529, 237, 2636, 'Vinh Phu', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2530, 237, 2637, 'Ha Tay', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2531, 237, 2638, 'Kon Tum', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2532, 237, 2639, 'Dak Lak', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2533, 237, 2682, 'Dien Bien', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2534, 237, 2683, 'Ha Nam', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2535, 237, 2816, 'Gia Lai', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2536, 237, 2819, 'Song Be', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2537, 237, 2833, 'Cao Bang', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2538, 237, 2834, 'Bac Lieu', '2018-07-21 13:42:31', '2018-07-21 13:42:31'),
(2539, 242, 947, 'Hadramawt', '2018-07-21 13:42:34', '2018-07-21 13:42:34'),
(2540, 242, 1698, 'San', '2018-07-21 13:42:34', '2018-07-21 13:42:34'),
(2541, 242, 2038, 'San\'a\'', '2018-07-21 13:42:34', '2018-07-21 13:42:34'),
(2542, 242, 2272, 'Dhamar', '2018-07-21 13:42:34', '2018-07-21 13:42:34'),
(2543, 242, 2273, 'Adan', '2018-07-21 13:42:34', '2018-07-21 13:42:34'),
(2544, 242, 2382, 'Al Hudaydah', '2018-07-21 13:42:34', '2018-07-21 13:42:34'),
(2545, 244, 1345, 'Lusaka', '2018-07-21 13:42:35', '2018-07-21 13:42:35'),
(2546, 244, 1808, 'Luapula', '2018-07-21 13:42:35', '2018-07-21 13:42:35'),
(2547, 244, 2566, 'Copperbelt', '2018-07-21 13:42:35', '2018-07-21 13:42:35'),
(2548, 245, 893, 'Mashonaland East', '2018-07-21 13:42:35', '2018-07-21 13:42:35'),
(2549, 245, 1341, 'Mashonaland Central', '2018-07-21 13:42:35', '2018-07-21 13:42:35'),
(2550, 245, 2198, 'Matabeleland North', '2018-07-21 13:42:35', '2018-07-21 13:42:35'),
(2551, 245, 2242, 'Matabeleland South', '2018-07-21 13:42:35', '2018-07-21 13:42:35');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'rakeshsathwara1994@gmail.com', '2020-05-23 12:25:05', '2020-05-23 12:25:05'),
(3, 'shivaniank.rs@gmail.com', '2020-05-26 05:41:04', '2020-05-26 05:41:04'),
(11, 'rakeshsathwara.rc@gmail.com', '2020-06-08 06:57:13', '2020-06-08 06:57:13'),
(12, 'rakeshsathwara.rc@gmail.com', '2020-06-08 06:58:13', '2020-06-08 06:58:13'),
(13, 'rakeshsathwara.rc@gmail.com', '2020-06-08 06:59:13', '2020-06-08 06:59:13'),
(14, 'rakeshsathwara.rc@gmail.com', '2020-06-08 07:00:22', '2020-06-08 07:00:22'),
(15, 'khyatip.rs@gmail.com', '2020-06-08 07:04:23', '2020-06-08 07:04:23'),
(16, 'shivani.anklesh@gmail.com', '2020-06-08 13:02:49', '2020-06-08 13:02:49'),
(17, 'k@k.com', '2020-06-09 05:01:24', '2020-06-09 05:01:24'),
(18, 'khyatip.rs@gmail.com', '2020-06-09 05:05:10', '2020-06-09 05:05:10'),
(19, 'khyatip.rs@gmail.com', '2020-06-09 05:14:49', '2020-06-09 05:14:49'),
(20, 't@t.com', '2020-06-09 06:41:43', '2020-06-09 06:41:43'),
(21, 'diyaupa@gmail.com', '2020-06-09 09:00:29', '2020-06-09 09:00:29'),
(22, 'kbc@gmail.com', '2020-06-09 09:00:48', '2020-06-09 09:00:48'),
(23, 'jayesh.cloudover@gmail.com', '2020-06-10 09:19:44', '2020-06-10 09:19:44'),
(24, 'bgoswami57@gmail.com', '2020-06-11 13:11:11', '2020-06-11 13:11:11'),
(25, 'test@test.com', '2020-06-12 10:59:48', '2020-06-12 10:59:48'),
(26, 'test@test.com', '2020-06-12 10:59:50', '2020-06-12 10:59:50'),
(27, 'rakeshsahwara.rc@gmail.com', '2020-06-22 09:24:49', '2020-06-22 09:24:49'),
(28, 'rakeshsahwara.rc@gmail.com', '2020-06-22 09:24:52', '2020-06-22 09:24:52'),
(29, 'test@test.co', '2020-06-22 13:46:29', '2020-06-22 13:46:29'),
(30, 'test@test.com', '2020-06-23 05:54:24', '2020-06-23 05:54:24'),
(31, 'kavit@ddd.in', '2020-06-23 15:16:12', '2020-06-23 15:16:12'),
(32, 'hitart.rc@gmail.com', '2020-06-23 16:32:04', '2020-06-23 16:32:04'),
(33, 'hitart.rc@gmail.com', '2020-06-23 16:35:40', '2020-06-23 16:35:40'),
(34, 'hitarth.rc@gmail.ocom', '2020-06-23 16:36:54', '2020-06-23 16:36:54'),
(35, 'aa@aa.in', '2020-06-23 16:37:00', '2020-06-23 16:37:00'),
(36, 't@t.com', '2020-06-24 05:27:23', '2020-06-24 05:27:23'),
(37, 't@t.com', '2020-06-24 05:27:24', '2020-06-24 05:27:24'),
(45, 'rakesh1994@gmail.com', '2020-06-25 13:52:04', '2020-06-25 13:52:04'),
(46, 'manoj@gmail.com', '2020-06-25 13:54:00', '2020-06-25 13:54:00'),
(47, 'm@m.com', '2020-09-07 13:15:46', '2020-09-07 13:15:46'),
(48, 'modyvinit@gmail.com', '2020-09-10 12:08:58', '2020-09-10 12:08:58'),
(49, 'm@m.com', '2020-09-11 06:35:07', '2020-09-11 06:35:07'),
(50, 'm@m.com', '2020-09-11 07:27:53', '2020-09-11 07:27:53'),
(51, 'khyatip.rs@gmail.com', '2020-09-11 07:28:11', '2020-09-11 07:28:11'),
(52, 'w@e.co', '2020-09-11 07:29:30', '2020-09-11 07:29:30');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `gst_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adhar_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pan_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ifsc_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `address`, `gst_no`, `adhar_no`, `pan_no`, `bank_name`, `account_no`, `ifsc_code`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Maruti pvt ltd', 'Kotak', 'Maruti ptd ltd', '345678901312', '4567891312', 'Kotak', '456789', 'KBB980', 1, 0, '2020-08-08 07:24:09', '2020-09-07 13:20:23'),
(2, 'testtttttttttttttttttttttttttttttttttttttttttttttttttttssssssssssssssssssssssssssssssss', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2020-08-13 05:12:38', '2020-08-13 05:30:00'),
(3, 'testtttttttttttttttttttttttttttttttttttttttttttttttttttssssssssssssssssssssssssssssssss', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2020-08-13 05:12:38', '2020-08-13 05:29:51'),
(4, 'NAME', 'ADDRESS', 'GST NO', 'ADHAR', 'PAN', 'BANK', 'ACCOUNT', 'sbsjbd3284934', 1, 1, '2020-08-13 05:30:38', '2020-08-15 12:00:29'),
(5, 'dsaas', 'dsaas', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2020-08-13 06:18:53', '2020-09-07 07:30:37'),
(6, 'Test 1', 'TES 2', 'TES 3', 'TES 4', 'TES 5', 'TES 6', 'TES 7', 'HH', 1, 1, '2020-08-15 11:50:52', '2020-08-15 12:01:34'),
(7, 'testtttttttttttttttttttttttttt', 'https://testflight.apple.com/join/jkKMJJhrhttps://testflight.apple.com/join/jkKMJJhrhttps://testflig', 'https://testflight.a', 'https://testflight.a', 'https://testflight.a', 'https://testflight.a', 'https://testflight.a', 'https://testflight.a', 1, 0, '2020-08-17 09:11:25', '2020-08-17 09:11:25'),
(8, 'https://testflight.apple.com/j', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2020-08-17 09:11:42', '2020-08-17 09:12:37'),
(9, 'Vinit', 'Ahmedabad', '145248', '14785214', 'd4d5g2d45', 'test', '145874', 'gd541', 1, 0, '2020-08-19 14:49:44', '2020-08-19 14:49:44'),
(10, 'Bluedart', 'India', '43545464645443', '3545423424', 'ppbss2345f', 'ICICI', '9794794739749', 'icici', 1, 0, '2020-09-07 13:31:02', '2020-09-07 13:31:02');

-- --------------------------------------------------------

--
-- Table structure for table `testinomial`
--

CREATE TABLE `testinomial` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `description` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testinomial`
--

INSERT INTO `testinomial` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Neha Jain', 'Good collection. I mostly prefered for my concerts.', '1599717030.jpg', '2020-05-31 04:27:30', '2020-09-10 05:50:30', NULL),
(17, 'Tony stark', 'Get the latest fashion tips and outfit ideas.', '1599716904.jpg', '2020-06-18 12:00:15', '2020-09-10 05:48:24', NULL),
(21, 'Maria williams', 'A bridal saree is more than an outfit. It is a narration of a deep-rooted legacy, the perpetuity of traditions and an 12', '1599717074.jpg', '2020-06-24 12:36:52', '2020-09-10 05:51:14', NULL),
(22, 'Mona Dave', 'Nice work. Simple and sober', '1599716924.png', '2020-06-24 12:59:12', '2020-09-10 05:48:44', NULL),
(23, 'Chandani Singh', 'Colours of the actual piece may vary slightly or may not vary at all , from what you see on your monitor. This may be be', '1599716882.webp', '2020-06-24 13:08:53', '2020-09-10 05:48:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` bigint(20) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `device_token` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `phone_number`, `address`, `email`, `email_verified_at`, `password`, `status`, `is_deleted`, `device_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', NULL, NULL, 'admin@admin.com', NULL, '$2y$10$OaFtPU7VEK2uR7f9oHS0AeN6x8NdEyaqPXrIQFc/iK3n3JQ.GlJB6', 1, 0, '', NULL, '2019-11-13 13:00:00', '2020-06-23 13:05:26'),
(28, 1, 'Badal', NULL, NULL, 'bgoswami578@gmail.com', NULL, '$2y$10$h7aZ/rPEN3ZJiuIyE1ALGOaGJPWe/Wnsn998d00Ig3AI8xv5EgwHC', 1, 0, NULL, NULL, '2020-05-27 15:15:26', '2020-06-22 11:38:23'),
(70, 2, 'shivani', 123456788, 'test', 'shivarths@gmail.com', NULL, '$2y$10$XJnhPUR.HN.l36BI/wWtZexLJHPX09zUpsQXSzzo.hjjlwSRUs78.', 1, 0, NULL, NULL, '2020-06-01 13:44:47', '2020-06-01 13:44:47'),
(75, 0, 'tarun patel', 9865236598, 'ahmedabad', 'tarun@gmail.com', NULL, '$2y$10$IM43gjWEcbxTo1Q4RzFr/OzwSlkdyU.9tzBTEfZDvlg15TeFPI/Gi', 1, 0, NULL, NULL, '2020-06-08 06:36:15', '2020-06-08 06:36:15'),
(76, 0, 'kalpesh', 9865326598, 'ahmedabad', 'kalpesh@gmail.com', NULL, '$2y$10$r4AC51suEFzxb/C.clEnVuVXMpGgAI/T1TaEMf7jy8r/r01EOvptW', 1, 0, NULL, NULL, '2020-06-08 06:45:29', '2020-06-08 06:45:29'),
(77, 0, 'pintu', 9865326598, 'ahmedabad', 'pintu@gmail.com', NULL, '$2y$10$x9KdgVODQ2PFBm0mYx6zqOjEEk1ytrKv7yD6IvQ5riuqFiyNBbSFK', 1, 0, NULL, NULL, '2020-06-08 06:49:10', '2020-06-08 06:49:10'),
(78, 0, 'Marrie', 9825098250, 'jhj', 'marie@marrie.com', NULL, '$2y$10$XdooVDKqvgSLsr.bVGoWmuylYfw08tjflDYXk9ntCDZ4FIhnnrwHO', 1, 0, NULL, NULL, '2020-06-08 06:52:48', '2020-06-08 06:52:48'),
(79, 2, 'rakesh', 9865326556, 'ahmedabad', 'rakeshsathwara.rc@gmail.com', NULL, '$2y$10$AmrzEM42JMh24i/cLFuCu.O7B3P0AReJ0HTN5X6c2I2UFxuky7fBi', 1, 0, NULL, NULL, '2020-06-08 09:47:22', '2020-06-08 15:19:58'),
(80, 2, 'Tia', 9825098250, 'ahmedabad', 'tia@po.com', NULL, '$2y$10$HX0hfoLmc4veugOxbAmu/u.L4eMUycFfcH37RPTasL.XhPNiZAQy2', 1, 0, NULL, NULL, '2020-06-08 09:51:22', '2020-06-08 09:51:44'),
(81, 2, 'Kia T', 9979775508, 'ahmedabad', 'khyatip.rs@gmail.com', NULL, '$2y$10$1VXQNM0mmi11GS5N.j29hemMl/TtVvSEP8PS8eKuWErj2JbZW1Eqm', 1, 0, NULL, NULL, '2020-06-08 10:08:29', '2020-09-18 14:55:22'),
(85, 2, 'yatin', 9865323256, 'ahmedabad', 'yatin@gmail.com', NULL, '$2y$10$WWgfUNLWspqBBj4xr8uUneDvxwiBauKSyi6h7AtArD0g9tYa83EN2', 1, 0, NULL, NULL, '2020-06-08 14:35:57', '2020-06-08 14:35:57'),
(86, 2, 'bhavesh', 9865326598, 'ahmedabad', 'bhavesh@gmail.com', NULL, '$2y$10$ypjmsAQSEYO0WsG/zPslT.crkQrfrupkDAawUbwA8AJj1hD7ZrvC2', 1, 0, NULL, NULL, '2020-06-08 14:54:06', '2020-06-08 14:54:06'),
(87, 2, 'mahesh', 9856236588, 'ahmedabad', 'mahesh@gmail.com', NULL, '$2y$10$Rfzkr9hIJtx0AzVQJpaNluKFHb2mVuZv1e44Iz6Ncm9hD7owSgQje', 1, 0, NULL, NULL, '2020-06-08 16:46:51', '2020-06-08 16:46:51'),
(88, 2, 'dnsmd', 123458909, 'hhff', 'dsdsm@djsd.co', NULL, '$2y$10$xBT6H2s0fLp/pk5vB35BpO/SGVwQ3jfQluVJfyRAwCdJiSuhlU406', 0, 0, NULL, NULL, '2020-06-09 04:53:58', '2020-06-09 05:51:26'),
(90, 2, 'test', 9876787909, 'india', 'test@test.co', NULL, '$2y$10$E8oJ8eBuZT508MZdiB7QXOTVe/n4WBT7yKJ2FQwjliAKkkg4sLRh2', 1, 0, NULL, NULL, '2020-06-09 06:44:04', '2020-06-09 06:44:04'),
(91, 1, 'Deepika', NULL, NULL, 'diyaupa@gmail.com', NULL, '$2y$10$oGOGxXDlic2FNQ.AwMQvPekOubbN2CXd7TnkilDm24W7sDs9t4vgy', 1, 0, NULL, NULL, '2020-06-09 08:41:26', '2020-06-09 08:41:26'),
(92, 2, 'Jayesh Barot', 9429856233, 'Maruti Park Society,Regiment road,Opp. jalaram temple,', 'jayesh.cloudover@gmail.com', NULL, '$2y$10$962o.NOaIYvIDgFX4Z/1Z.yVCLzu08w9qpuRUX6sORrbBXrNE22me', 1, 0, NULL, NULL, '2020-06-10 09:19:26', '2020-06-10 09:22:25'),
(93, 2, 'Aanal Barot', 9429856233, 'Maruti Park Society,Regiment road,Opp. jalaram temple,', 'aanal.cloudover@gmail.com', NULL, '$2y$10$j4ZGsL8Es1HYAxShbgMWiezVfNMxglFe2s0sWgYh2wSkwRRoO9ls2', 1, 0, NULL, NULL, '2020-06-10 09:41:21', '2020-06-10 09:41:21'),
(95, 2, 'test', 9825098250, 'india', 'test@po.com', NULL, '$2y$10$nZE5mJd81k4ZgmswmxbN/.loEm921uKfMLevRalwbKhDCg3s1LhC6', 1, 0, NULL, NULL, '2020-06-15 10:11:03', '2020-06-15 10:11:03'),
(96, 2, 'Marrie', 9825098250, 'India', 'marrie@po.com', NULL, '$2y$10$T9Odqnbo1Nvp2Y3s5A783eRtClcnrsRaMGFjI2kPnNnxr2PwrscRm', 1, 0, NULL, NULL, '2020-06-15 10:12:19', '2020-06-15 10:12:19'),
(97, 2, 'Kia', 9825098250, 'Test Now test test now teshdskdhskdhskdhskdhskhdkshdkshdksdksd557557bnsdbsd*&jgjdjdsdjshdjsdjsdsdshdj8897272786868-6728272=26762627587878&8789tetsy test it now tets address', 'test7887@test.com', NULL, '$2y$10$IbiYBAgwMoPSvmb4vGTIgevCBP.5htRZw0lolT5TrhstKJYVoSoNm', 1, 0, NULL, NULL, '2020-06-15 10:16:46', '2020-06-15 10:16:46'),
(98, 2, 'pinkesh', 1234567897, 'ahmedabad', 'pinkesh@gmail.com', NULL, '$2y$10$C8MZ3vX/WJV.UecO0.7wdehbBKenqd0kFVeCIzyYInYbk8yPUzHF2', 1, 0, NULL, NULL, '2020-06-15 10:32:51', '2020-06-15 10:32:51'),
(99, 2, 'Cloud', 9033440605, 'test', 'bgoswami579@gmail.com', NULL, '$2y$10$6ff4.COhbSvgOF/3OmkHB.uSGFVoXvtz1cs2n7GOqu8Qwm9V.hO4e', 1, 0, NULL, NULL, '2020-06-15 12:04:35', '2020-06-15 12:04:35'),
(100, 2, 'pratik', 9865326556, 'test', 'pp@gmail.com', NULL, '$2y$10$JrLGrxNdkLaLrCalM4oSSubRyvohzG98va9vE9bpoyBAV.KnvYJ2G', 1, 0, NULL, NULL, '2020-06-15 12:48:42', '2020-06-15 12:48:42'),
(101, 2, 'test', 9825098250, 'ahmedabad', 'test@rs.com', NULL, '$2y$10$0TAahXUYC84YrTurc5D3..hENQjS55MacFjkGLlT7WggmhQcj/WQK', 1, 0, NULL, NULL, '2020-06-15 13:27:51', '2020-07-20 11:50:58'),
(102, 2, 'aaa', 8965652332, 'ahmedabad', 'aa@gmail.com', NULL, '$2y$10$2w/aBpij.1k7vbInQehyTuoPTqeU05x2CyPgsQb4TwgH0c48S5L2q', 1, 0, NULL, NULL, '2020-06-15 13:44:19', '2020-06-19 09:51:45'),
(103, 2, 'Test', 9825098250, 'Ahmedabad', 'test@test.com', NULL, '$2y$10$htZMKDwXn8iZsGl3R2Svfe9sWNxxnLXPpT36wLdHbo1IH06fzUPsO', 1, 0, NULL, NULL, '2020-06-16 08:24:23', '2020-06-16 08:24:23'),
(106, 1, 'sfvsdf', NULL, NULL, 'shivaniank.rs@gmail.com', NULL, '$2y$10$.Cpi3mBy6YQFJ/.vA7/qrOkzghU3Gyrn6d3hWv5MviAwLNvP.nsvW', 1, 0, NULL, NULL, '2020-06-17 12:06:24', '2020-06-17 12:06:29'),
(110, 2, 'jayesh', 9429856233, '13<marutipark society,nr.regiment road', '123@gmail.com', NULL, '$2y$10$fYGoO6eQRU/XYD/oSjcT8.9JSp4mK9FJvTjWH4QdGqpWyYU2nGita', 1, 0, NULL, NULL, '2020-06-22 11:12:27', '2020-06-22 11:12:27'),
(111, 2, 'jayesh', 9429856233, '13,marutipark society,nr.regiment road', '465@gmail.com', NULL, '$2y$10$eEf9Ky6JFWHx8NfzQAW75ufwF9hGjJaw.p0myHpmTDYGBTtJSXrdu', 1, 0, NULL, NULL, '2020-06-22 11:13:05', '2020-06-22 11:13:05'),
(112, 2, 'jayesh', 9429856233, '13,marutipark society,nr.regiment road', 'jayeshec01@gmail.com', NULL, '$2y$10$DlZID1iIgd15AMCrVeX6z.qjkmW8tVkH4iwaQfM6cahfS5d3zMVte', 1, 0, NULL, NULL, '2020-06-22 11:15:10', '2020-06-22 11:15:10'),
(113, 2, 'test', 9876656789, 'india', 't@te.com', NULL, '$2y$10$vnMG/1wMt4pgPCH4Zuzm/u.JFym1APyM2qLp/y6dOM29wbTcI06h6', 1, 0, NULL, NULL, '2020-06-22 13:45:51', '2020-06-22 13:45:51'),
(114, 2, 'hitrath', 1234567890, 'qw', 'hitarth.rc@gmail.com', NULL, '$2y$10$QZ4YKTNlWxabo1Fwep.hKekSiQMQApwTXDCKjV9P8HCxFcZ4YN9e2', 1, 0, NULL, NULL, '2020-06-23 10:13:24', '2020-06-23 10:13:24'),
(118, 2, 'Marrie', 9828092909, 'ahmedabad', 'm@mm.com', NULL, '$2y$10$KctCpHhMSzmP7gKCi239GOry2uq450xEeIRdTUfWhlDrKE4UgEQiS', 1, 0, NULL, NULL, '2020-06-24 10:59:47', '2020-06-24 10:59:47'),
(120, 2, 'manoj', 8652332568, 'ahmedabad', 'manoj@gmail.com', NULL, '$2y$10$UkfdV33Im691m0dulvhq7e7nDvuvKSeYo6mvNyZ2J37eRUVaD1GAq', 1, 0, NULL, NULL, '2020-06-25 13:54:40', '2020-06-25 13:54:40'),
(121, 2, 'manish', 9856235698, 'ahmedabad', 'manish@gmail.com', NULL, '$2y$10$t/a5O9Ap35DNBuQ1T30dYOP9oZeHJ5nV3ac2p0YImFKmZty27KyHO', 1, 0, NULL, NULL, '2020-06-25 13:56:47', '2020-06-25 13:56:47'),
(122, 2, 'test', 9825098250, 'ahmedabad', 't@tt.com', NULL, '$2y$10$K4qD1L6uOHgQT72ltvhvQuV67KgoibuyKVzUV3xWaXwJLSxjLNHAi', 1, 0, NULL, NULL, '2020-06-25 14:01:57', '2020-06-25 14:01:57'),
(123, 2, 'labhesh', 9865323256, 'ahmedabad', 'labhesh@gmail.com', NULL, '$2y$10$3sI0zPYBWdZ/XV83Xfmdhe0YUylixOPBiF2IkW57.3D3MlJEKZdpS', 1, 0, NULL, NULL, '2020-06-25 14:08:16', '2020-06-25 14:08:16'),
(124, 2, 'gaurang', 9865323256, 'ahmedabad', 'gaurang@gmail.com', NULL, '$2y$10$pIvz4/drMayKidZXdgQouuSsPMAlUqTamYcpzDI62A8mjv4oaG6cq', 1, 0, NULL, NULL, '2020-06-25 14:11:19', '2020-06-25 14:11:19'),
(125, 2, 'Marrie', 9825098251, 'india', 'm@am.com', NULL, '$2y$10$TdxoqplMEare.V1w2N8cQOCVePuBP5YJ2htOpoYaDOB0ZwKeAGIDO', 1, 0, NULL, NULL, '2020-06-25 14:14:21', '2020-06-25 14:14:21'),
(126, 2, 'haresh', 9866544788, 'ahmedabad', 'haresh@gmail.com', NULL, '$2y$10$24.4Wmb9ZQqFgGMteUgnBuGBzeYCqJcWjhe0AF4G4vJSu1I2Ds.ju', 1, 0, NULL, NULL, '2020-06-25 14:18:22', '2020-06-25 14:18:22'),
(127, 2, 'Kavit', 1374848484, 'Sbbdnd', 'aa@aa.in', NULL, '$2y$10$6mUIP2HlxDAPkvnPhaqKHOA7KL9tXM9MBa0fB9TiaeqSN6snSflzq', 1, 0, NULL, NULL, '2020-06-25 14:45:00', '2020-06-25 14:45:00'),
(129, 2, 'bhargavsdfdsfdf', 5435454535, 'ssdsadsadsad', 'bhargavkachhot.rs@gmail.com', NULL, 'admin123', 1, 0, NULL, NULL, '2020-07-15 11:19:21', '2020-07-15 12:05:26'),
(130, 2, 'Pooja Maity', 7043725736, '2-a-8, First Pulia', 'poojamaity.rs@gmail.com', NULL, '$2y$10$fPX1EwfBU3H3ZeXf47739.FlAMw8zHDk.M4cVsBr9sewCerpMx.nC', 1, 0, NULL, NULL, '2020-07-15 12:14:50', '2020-07-17 11:32:52'),
(131, 2, 'dsfsdfxcxczxcxzcc', 5435454535, 'bhargavkachhot.rs@gmail.com', 'bhargavkachhot.rs@gmail.comdfdf', NULL, '123456789', 1, 0, NULL, NULL, '2020-07-16 04:59:30', '2020-07-16 05:41:17'),
(132, 2, 'jayraj', 9998989898, 'Rajkot', 'rathodjayraj94@gmail.com', NULL, '$2y$10$J8EDnJ.0g4zgxAMBKrwE/OrXCrulGTnABIsWT4/AReYsLJcXFguNK', 1, 0, NULL, NULL, '2020-07-16 05:15:02', '2020-07-16 05:15:02'),
(133, 2, 'dsfsdf', 5435454535, '3432sdfdsf, fdsfsdf', 'bhargavkachhot.rs123@gmail.com', NULL, '$2y$10$PIFqkMJNN9JDijpZkDXPpeuvMh19afmC22MQlC6LKtZLH.EMu1bOK', 1, 0, NULL, NULL, '2020-07-16 09:54:57', '2020-07-16 09:54:57'),
(134, 2, 'K', 9091234568, 'India', 'k@gmail.com', NULL, '$2y$10$Kyj3bs4sFKI0oJawEvA8OewynFTtTpd9FuYgV8O.lSvWmg1lKSeUW', 1, 0, NULL, NULL, '2020-07-17 04:38:18', '2020-07-17 04:38:18'),
(135, 2, 'test', 9890989098, 'india', 'te@te.com', NULL, '$2y$10$zp.Nq/Z3I5SpAv/XsL4UueLdK8w.I07cfeeAFoSfoNuU0BL80XZ0u', 1, 1, NULL, NULL, '2020-07-17 05:01:15', '2020-09-07 13:21:32'),
(136, 2, 'Badal', 9033440605, 'Test', 'bgoswami57@gmail.com', NULL, '$2y$10$qM3fwB9JGiRelYi7tJi7muoSwImIwbyzkIAyujLO1M2NEsbiz9kZC', 1, 0, NULL, NULL, '2020-07-17 06:49:31', '2020-07-17 06:49:31'),
(137, 2, 'Kia k', 3456777433, 'Test', 'kia@kia.com', NULL, '$2y$10$Su6yZjPTUnI1fY5vKtkbC.kjKTYRIMZfYo9eIsdKioeV7fDV18Tdm', 1, 0, NULL, NULL, '2020-07-17 07:35:19', '2020-07-17 11:37:41'),
(138, 2, 'Pooja', 9898989898, '2-a-8, First Pulia', 'poojamaity80@gmail.com', NULL, '$2y$10$ZDKduJkQxMTiFjYaZomxPuwCDEKxRNfnedNyx1Y0kpqDO9kPqGGM.', 1, 0, NULL, NULL, '2020-07-17 10:28:07', '2020-07-17 10:28:07'),
(139, 2, 'kanu', 1212121212, NULL, 'kanu@gmail.com', NULL, '$2y$10$86c2Ct9HBM5pxl1hNC.L1upYeDXOHLhJ/ej0tKCaVy8tVTWsshQTO', 1, 0, NULL, NULL, '2020-07-17 11:47:13', '2020-07-17 11:47:13'),
(140, 2, 'kavit', 1234567890, NULL, 'kavit@live.in', NULL, '$2y$10$e6eifG0WGH3YHnnAJL1GtOccCHlRJSXMvgQ5fIiRrxszA8cQEWy9e', 1, 0, NULL, NULL, '2020-07-17 18:47:54', '2020-07-17 18:47:54'),
(141, 2, 'Chirag T', 1111111111, NULL, 'tannachirag1@gmail.com', NULL, '$2y$10$c/rXOVY0oq6ZhhL.LSUgse6hj4/pgs1uRA8KxmhTsGPkrNAlVxHj.', 1, 0, NULL, NULL, '2020-07-18 09:14:28', '2020-07-18 09:14:28'),
(142, 2, 'kavit', 1234567890, NULL, 'kavit.varma@gmail.com', NULL, '$2y$10$YlbmyhapA7YZ.W863hRE5OsLmHmwu4R.FCDWYCVDfWQYlhPcQaSUG', 1, 0, NULL, NULL, '2020-07-18 12:37:04', '2020-08-08 17:47:07'),
(143, 2, 'Test', 9999999999, NULL, 'test@mailinator.com', NULL, '$2y$10$LyiG3YOTv0ZSWgKWI/VwyOofzxCwB1HSJKJAhQ2N9KzfWlXOEqqga', 1, 0, NULL, NULL, '2020-07-19 16:12:47', '2020-07-19 16:12:47'),
(144, 2, 'Test', 9999999999, NULL, 'chirag@mailinator.com', NULL, '$2y$10$N.Ppy9nnWxOdIChbrB6g9.yGmPb2T7cm1nVnfqYQgqfYu/HnKDFKW', 1, 0, NULL, NULL, '2020-07-19 16:14:08', '2020-07-19 16:14:08'),
(145, 2, 'chirag', 1111111111, NULL, 'chirag3@mailinator.com', NULL, '$2y$10$tL2ett/.NQ1YvRQI5fIl8uPivDpL855Plv83smnuokExSQn5Z98Be', 1, 1, NULL, NULL, '2020-07-19 16:17:54', '2020-09-10 11:58:02'),
(146, 2, 'chirag', 1111111111, NULL, 'chirag4@mailinator.com', NULL, '$2y$10$X.dpayYfV4zH/nOAslc7bu.m6ybLEx3AhQ.gEgxbM393ya8XH4Qim', 1, 1, NULL, NULL, '2020-07-19 16:19:26', '2020-09-10 11:57:55'),
(147, 2, 'chirag', 1111111111, NULL, 'chirag5@mailinator.com', NULL, '$2y$10$KizboytCEJTV0v1KeaxcbOzgHmwNDOIwjLk9oew6zXi/NvZiagPiW', 1, 1, NULL, 'KnDKdQrmpWeVTz7S0PYvN77vEB2mYxK3M6YOA29hru4fIdBQbzMAvidLVx6f', '2020-07-19 16:22:27', '2020-09-10 11:57:59'),
(148, 2, 'JInank', 9737142926, NULL, 'jinankdthakker@gmail.com', NULL, '$2y$10$QtV35CweCh7S9KJaXICGDOqMwqHJ50VXuIaBbFx3hhl3wbcQdn3Vi', 1, 0, NULL, 'T3LzRfpWdpoGofhRb8EnFexILiLzAwJGupDVbw4kAINyJJzaFzJyqCWE441i', '2020-07-20 07:40:00', '2020-07-20 07:40:00'),
(149, 2, 'Vinit Mody', 9978532586, NULL, 'modyvinit@gmail.com', NULL, '$2y$10$FETAqfiuiG42uc4yxHgj6.g6en5D0dJvAYKfd9/FhVGUdEgxW9Wg6', 1, 0, NULL, NULL, '2020-08-04 07:06:01', '2020-09-10 11:54:23'),
(150, 2, 'rakesh', 9865236598, NULL, 'rakeshsathwara.rc1@gmail.com', NULL, '$2y$10$1VXQNM0mmi11GS5N.j29hemMl/TtVvSEP8PS8eKuWErj2JbZW1Eqm', 1, 0, NULL, 'Ys8lj8FJA6JAnivYPZa8hiAnrlZb9hEvUS5s8n0B6aPyOre0FifLeXHOyc69', '2020-08-19 07:00:31', '2020-08-19 07:00:31'),
(151, 3, 'rakesh sathwara', 9865326598, NULL, 'Guest@gmail.com', NULL, NULL, 1, 0, NULL, NULL, '2020-09-01 15:55:31', '2020-09-01 15:55:31'),
(153, 3, 'rakesh sathwara', 9865326598, NULL, 'Guest123@gmail.com', NULL, NULL, 1, 0, NULL, NULL, '2020-09-01 15:56:55', '2020-09-01 15:56:55'),
(154, 3, 'rakesh sathwara', 9865326598, NULL, 'Guest1234@gmail.com', NULL, NULL, 1, 0, NULL, NULL, '2020-09-01 15:59:56', '2020-09-01 15:59:56'),
(155, 3, 'guest g', 9825098657, NULL, 'guest@gg.co', NULL, NULL, 1, 0, NULL, NULL, '2020-09-07 09:27:39', '2020-09-07 09:27:39'),
(156, 3, 'guest g', 9825098657, NULL, 'cvcv@gg.co', NULL, NULL, 1, 0, NULL, NULL, '2020-09-07 09:28:28', '2020-09-07 09:28:28'),
(158, 3, 'guest g', 9825098657, NULL, 'wwwwddds@gg.co', NULL, NULL, 1, 0, NULL, NULL, '2020-09-07 09:29:42', '2020-09-07 09:29:42'),
(159, 3, 'Rs P', 9825098250, NULL, 'khyati@k.co', NULL, NULL, 1, 0, NULL, NULL, '2020-09-07 13:28:56', '2020-09-07 13:28:56'),
(164, 3, 'sa sdsdd', 9889898989, NULL, 'pp@gmail.coms', NULL, NULL, 1, 0, NULL, NULL, '2020-09-11 05:28:42', '2020-09-11 05:28:42'),
(165, 3, 'aaaa ssassa', 9898989898, NULL, 'pp@gmail.coma', NULL, NULL, 1, 0, NULL, NULL, '2020-09-11 05:31:04', '2020-09-11 05:31:04'),
(168, 2, 'k', 9293043404, NULL, 'dhhsj.rs@gmail.com', NULL, '$2y$10$jKMeabheC2vFI/OAq3I4D.oXOIo0egKzF/mTESnkdD0ewHKO3Exhe', 1, 0, NULL, 'E7lr7CD2GQ8WWmoCe6PYzzXqWCSwVb57hMyfqowTTpkOOpgpHMD7SQPgdgor', '2020-09-18 14:45:55', '2020-09-18 14:45:55'),
(169, 3, 'test t', 8989898989, NULL, 'khyati_at_18@yahoo.co.in', NULL, NULL, 1, 0, NULL, NULL, '2020-09-19 07:21:10', '2020-09-19 07:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_line_one` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_line_two` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_line_three` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isGuest` tinyint(1) NOT NULL DEFAULT '0',
  `address_type` int(11) NOT NULL COMMENT '1:home 2:work 3:others',
  `is_permanent` int(11) NOT NULL COMMENT '0:no 1:yes',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `user_id`, `name`, `last_name`, `company_name`, `phone_number`, `email`, `pincode`, `address_line_one`, `address_line_two`, `address_line_three`, `city`, `state`, `country`, `isGuest`, `address_type`, `is_permanent`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 129, 'dsfsdf', NULL, NULL, '5435454535', NULL, '32434', '3432sdfdsf', 'fdsfsdf', 'dsfdsf', 'dfsdfsd', 'dsfdsf', NULL, 0, 1, 0, '2020-07-15 12:50:57', '2020-07-15 12:50:57', '2020-07-15 12:50:57'),
(2, 129, 'dsfsdfsdsadsa', NULL, NULL, '5435454535', NULL, '32434', '3432sdfdsf', 'fdsfsdf', 'dsfdsf', 'dfsdfsd', 'dsfdsf', NULL, 0, 2, 0, '2020-07-15 13:18:11', '2020-07-15 13:18:11', '2020-07-15 13:18:11'),
(3, 131, 'dsfsdf', NULL, NULL, '5435454535', NULL, '32434', '3432sdfdsf', 'fdsfsdf', 'dsfdsf', 'dfsdfsd', 'vcxvcxvzxc', NULL, 0, 1, 0, '2020-07-16 05:40:39', '2020-07-16 05:40:39', '2020-07-16 05:40:39'),
(4, 131, 'dsfsdf', NULL, NULL, '5435454535', NULL, '32434', '3432sdfdsf', 'fdsfsdf', 'dsfdsf', 'dfsdfsd', 'dsfdsf', NULL, 0, 1, 0, '2020-07-16 05:40:52', '2020-07-16 05:40:52', '2020-07-16 05:40:52'),
(5, 131, 'dsfsdf', NULL, NULL, '5435454535', NULL, '32434', '3432sdfdsf', 'fdsfsdf', 'dsfdsf', 'dfsdfsd', 'dsfdsf', NULL, 0, 1, 0, '2020-07-16 05:41:00', '2020-07-16 05:41:00', '2020-07-16 05:41:00'),
(11, 133, 'aaaaa', NULL, NULL, '1111111', NULL, '111111', 'aaaaaaaaaaaaaaaaaa', 'aaaaaaa', 'aaaaaaa', 'aaaaaaaaa', 'aaaaaaaa', NULL, 0, 2, 0, '2020-07-16 10:11:10', '2020-07-16 10:41:22', '2020-07-16 10:11:10'),
(12, 133, 'aaaaaqaaaaaaaaaaaaaa', NULL, NULL, '1111111', NULL, '111111', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaa', NULL, 0, 1, 0, '2020-07-16 10:43:12', '2020-07-16 10:43:12', '2020-07-16 10:43:12'),
(13, 133, 'aaaaaqaaaaaaaaaaaaaa', NULL, NULL, '1111111', NULL, '111111', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaa', 'dsfdsf', NULL, 0, 1, 0, '2020-07-16 10:43:34', '2020-07-16 10:43:34', '2020-07-16 10:43:34'),
(14, 133, 'aaaaaqaaaaaaaaaaaaaa', NULL, NULL, '1111111', NULL, '111111', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaa', 'sssss', NULL, 0, 1, 0, '2020-07-16 10:44:05', '2020-07-16 10:44:05', '2020-07-16 10:44:05'),
(15, 133, 'aaaaaqaaaaaaaaaaaaaa', NULL, NULL, '1111111', NULL, '111111', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaa', 'ssssss', NULL, 0, 1, 0, '2020-07-16 10:44:13', '2020-07-16 10:44:13', '2020-07-16 10:44:13'),
(19, 100, 'manish', NULL, NULL, '9865326589', NULL, '384275', 'Ahmedabad', 'Ahmedabad', 'Ahmedabad', 'Ahmedabad', 'gujarat', NULL, 0, 1, 0, '2020-07-17 06:13:56', '2020-07-17 06:54:58', '2020-07-17 06:13:56'),
(20, 136, 'Badal', NULL, NULL, '9033440605', NULL, '370201', 'Gandhidham', '888', 'Main market', 'Gandhidham', 'Gujarat', NULL, 0, 1, 0, '2020-07-17 06:53:08', '2020-07-17 06:53:08', '2020-07-17 06:53:08'),
(21, 100, 'Tarun', NULL, NULL, '8965326556', NULL, '986589', 'Patan', 'Patan', 'Patan', 'Patan', 'Gujarat', NULL, 0, 1, 1, '2020-07-17 06:53:23', '2020-07-17 06:54:58', '2020-07-17 06:53:23'),
(23, 81, 'Kia T', NULL, NULL, '9825098250', NULL, '398943', 'Test area', '10 street', 'Test land', 'City', 'State', NULL, 0, 1, 0, '2020-07-17 07:06:25', '2020-07-17 09:02:35', '2020-07-17 07:06:25'),
(24, 81, 'Marry', NULL, NULL, '5675435678', NULL, '345765', 'Satellite', '10', 'Near Pakwan', 'Ahmedabad', 'gujarat', NULL, 0, 3, 0, '2020-07-17 07:07:35', '2020-07-17 09:02:35', '2020-07-17 07:07:35'),
(25, 81, 'Test T', NULL, NULL, '9805678909', NULL, '321098', 'Locality', '10', 'Near Collage', 'Ahmedabad', 'gujarat', NULL, 0, 1, 1, '2020-07-17 07:10:17', '2020-07-17 09:02:35', '2020-07-17 07:10:17'),
(26, 81, 'Ronald T', NULL, NULL, '8906789076', NULL, '678905', 'satellite', 'venus', 'Sg road', 'Ahmedabad', 'Gujarat', NULL, 0, 2, 0, '2020-07-17 07:23:56', '2020-07-17 09:02:35', '2020-07-17 07:23:56'),
(27, 100, 'bhavesh', NULL, NULL, '8956556565', NULL, '564645', 'Ahmedabad', 'Ahmedabad', 'Ahmedabad', 'Ahmedabad', 'Gujaravt', NULL, 0, 1, 0, '2020-07-17 07:29:46', '2020-07-17 07:29:46', '2020-07-17 07:29:46'),
(28, 137, 'Kia k', NULL, NULL, '3456777433', NULL, '577558', 'Satellite', '10 venus', 'SG highway', 'Ahmedabad', 'Gujarat', NULL, 0, 2, 0, '2020-07-17 07:36:52', '2020-07-17 10:21:31', '2020-07-17 07:36:52'),
(29, 100, 'kalpesh', NULL, NULL, '9886565965', NULL, '556656', 'patan', 'patan', 'patan', 'patan', 'gujarat', NULL, 0, 1, 0, '2020-07-17 07:42:53', '2020-07-17 07:42:53', '2020-07-17 07:42:53'),
(30, 81, 'krishnaveni', NULL, NULL, '6789568900', NULL, '370201', 'Test', '46', 'Near temple', 'Ahmedabad', 'Gujarat', NULL, 0, 1, 0, '2020-07-17 09:02:14', '2020-07-17 09:02:35', '2020-07-17 09:02:14'),
(31, 137, 'Marry', NULL, NULL, '5675435678', NULL, '345765', 'Satellite', '10', 'Near Pakwan', 'Ahmedabad', 'gujarat', NULL, 0, 2, 0, '2020-07-17 09:30:30', '2020-07-17 10:21:31', '2020-07-17 09:30:30'),
(32, 137, 'Maggie', NULL, NULL, '9825098657', NULL, '145674', 'Bodakdev', 'B 105', 'Opp.Pakwan', 'Ahmedabad', 'gujarat', NULL, 0, 3, 1, '2020-07-17 09:30:51', '2020-07-17 10:21:31', '2020-07-17 09:30:51'),
(34, 137, 'Test T', NULL, NULL, '9805678909', NULL, '321098', 'Locality', '10', 'Near Collage', 'Ahmedabad', 'Test land', NULL, 0, 2, 0, '2020-07-17 10:20:35', '2020-07-17 10:21:31', '2020-07-17 10:20:35'),
(35, 137, 'Maggie', NULL, NULL, '9825098657', NULL, '145674', 'Bodakdev', 'B 105', 'Opp.Pakwan', 'Ahmedabad', 'Near Pakwan', NULL, 0, 3, 0, '2020-07-17 10:20:56', '2020-07-17 10:21:31', '2020-07-17 10:20:56'),
(36, 103, 'Jarry', NULL, NULL, '5678908790', NULL, '677235', 'Test', '25', 'Test', 'Ahmedabad', 'Gujarat', NULL, 0, 2, 0, '2020-07-17 10:49:44', '2020-07-17 10:50:02', '2020-07-17 10:49:44'),
(37, 103, 'Tedt', NULL, NULL, '1345789097', NULL, '356778', 'Street', '16', 'Stay', 'Ahmedabad', 'Gujarat', NULL, 0, 1, 0, '2020-07-17 10:51:03', '2020-07-17 10:51:03', '2020-07-17 10:51:03'),
(38, 101, 'Marry', NULL, NULL, '5675435678', NULL, '345765', 'Satellite', '10', 'Near Pakwan', 'Ahmedabad', 'Gujarat', NULL, 0, 2, 1, '2020-07-18 10:59:42', '2020-07-18 11:00:16', '2020-07-18 10:59:42'),
(41, 1, 'kavit', NULL, NULL, '8866767167', NULL, '380007', 'Paldi,', '11 Yogita', 'Nr flat', 'AHMEDABAD', 'Gujarat', NULL, 0, 1, 0, '2020-07-18 13:58:52', '2020-07-18 13:58:52', '2020-07-18 13:58:52'),
(42, 101, 'Tia', NULL, NULL, '6870987670', NULL, '789098', 'Areana', '10', 'Landmark', 'ahmedabad', 'Gujarat', NULL, 0, 2, 0, '2020-07-19 05:38:30', '2020-07-19 05:38:30', '2020-07-19 05:38:30'),
(43, 136, 'Prabhas', NULL, NULL, '9898123123', NULL, '234566', 'New SG Road', 'B-8899', 'Near tower', 'Ahmedabad', 'Gujarat', NULL, 0, 3, 0, '2020-07-19 12:12:29', '2020-07-19 12:12:29', '2020-07-19 12:12:29'),
(44, 142, 'Kavit', NULL, NULL, '9909647399', NULL, '380007', 'Paldi', '11 Yogita Flat', 'Near Sugam', 'Ahmedabad', 'Gujarat', NULL, 0, 1, 0, '2020-07-19 12:28:11', '2020-07-19 12:28:11', '2020-07-19 12:28:11'),
(45, 1, 'Jinank', NULL, NULL, '9737142926', 'jinank.thakker@gmail.com', '380013', 'Thakker', 'Thakker', 'Thakker', 'Ahmedabad', 'Gujarat', NULL, 1, 3, 0, '2020-08-01 16:28:30', '2020-08-01 16:28:30', '2020-08-01 16:28:30'),
(46, 1, 'Jinank', NULL, NULL, '9737142926', 'jinank.thakker@gmail.com', '380013', 'Thakker', 'Thakker', 'Thakker', 'Ahmedabad', 'Gujarat', NULL, 1, 3, 0, '2020-08-01 16:31:54', '2020-08-01 16:31:54', '2020-08-01 16:31:54'),
(47, 1, 'Jinank', NULL, NULL, '9737142926', 'jinank.thakker@gmail.com', '380013', 'Thakker', 'Thakker', 'Thakker', 'Ahmedabad', 'Gujarat', NULL, 1, 3, 0, '2020-08-01 16:32:33', '2020-08-01 16:32:33', '2020-08-01 16:32:33'),
(48, 149, 'Vinit Mody', 'Mody', 'ABC', '9978532586', NULL, '380058', 'Bopal', 'Binori', NULL, 'Ahmedabad', 'Gujarat', 'India', 0, 3, 1, '2020-08-04 07:20:23', '2020-09-10 11:54:58', '2020-08-04 07:20:23'),
(49, 1, 'Vinit Mody', NULL, NULL, '1254547854', 'modyvinit@gmail.com', '380058', 'Bopal', 'Bopal', 'Bopal', 'Ahmedabad', 'Kabir enclave', NULL, 1, 3, 0, '2020-08-04 07:28:50', '2020-08-04 07:28:50', '2020-08-04 07:28:50'),
(50, 1, 'Tia', NULL, NULL, '8973689079', 'T@t.co', '788937', 'Ahmedabad', NULL, NULL, 'Ahmedabad', 'Andhra Pradesh', NULL, 1, 3, 0, '2020-08-19 05:40:56', '2020-08-19 05:40:56', '2020-08-19 05:40:56'),
(51, 1, 'rakesh', NULL, NULL, '9865326598', 'aa@gmail.com', '986532', 'krushnanagar society', 'relway station road', NULL, 'patan', 'Gujarat', NULL, 1, 3, 0, '2020-08-19 05:51:49', '2020-08-19 05:51:49', '2020-08-19 05:51:49'),
(52, 1, 'Test', NULL, NULL, '5675435678', 'erol@jk.co.uk', '345765', 'test', '10', NULL, 'Ahmedabad', 'Gujarat', NULL, 1, 3, 0, '2020-08-19 06:31:23', '2020-08-19 06:31:23', '2020-08-19 06:31:23'),
(53, 1, 'rakesh', NULL, NULL, '9865236598', 'rakesh@gmail.com', '986523', 'aa', 'aa', NULL, 'aa', 'Gujarat', NULL, 1, 3, 0, '2020-08-19 07:09:10', '2020-08-19 07:09:10', '2020-08-19 07:09:10'),
(54, 1, 'test', NULL, NULL, '9825098657', 'test@rs.com', '145674', 'Bodakdev', 'B 105', NULL, 'Ahmedabad', 'Jharkhand', NULL, 1, 3, 0, '2020-08-19 07:19:25', '2020-08-19 07:19:25', '2020-08-19 07:19:25'),
(55, 151, 'rakesh', 'sathwara', 'rs', '9865326598', 'Guest@gmail.com', '986523', 'Chankaypury', 'Ahmedabad', NULL, 'Ahmedabad', 'Gujarat', 'India', 1, 3, 0, '2020-09-01 15:55:31', '2020-09-01 15:55:31', '2020-09-01 15:55:31'),
(56, 153, 'rakesh', 'sathwara', 'rs', '9865326598', 'Guest123@gmail.com', '986523', 'Chankaypury', 'Ahmedabad', NULL, 'Ahmedabad', 'Gujarat', 'India', 1, 3, 0, '2020-09-01 15:56:55', '2020-09-01 15:56:55', '2020-09-01 15:56:55'),
(57, 154, 'rakesh', 'sathwara', 'rs', '9865326598', 'Guest1234@gmail.com', '986523', 'Chankaypury', 'Ahmedabad', NULL, 'Ahmedabad', 'Gujarat', 'India', 1, 3, 0, '2020-09-01 15:59:56', '2020-09-01 15:59:56', '2020-09-01 15:59:56'),
(58, 149, 'test', 'test', 'test', '254', NULL, '14587', 'test', 'test', NULL, 'Nathwara', 'Rajasthan', 'India', 0, 3, 0, '2020-09-06 07:02:59', '2020-09-10 11:54:58', '2020-09-06 07:02:59'),
(59, 155, 'guest', 'g', NULL, '9825098657', 'guest@gg.co', '145674', 'gokul residency', 'ahmedabad', NULL, 'Ahmedabad', 'Gujarat', 'India', 1, 3, 0, '2020-09-07 09:27:40', '2020-09-07 09:27:40', '2020-09-07 09:27:40'),
(60, 156, 'guest', 'g', NULL, '9825098657', 'cvcv@gg.co', '145674', 'gokul residency', 'ahmedabad', NULL, 'Ahmedabad', 'Gujarat', 'India', 1, 3, 0, '2020-09-07 09:28:28', '2020-09-07 09:28:28', '2020-09-07 09:28:28'),
(61, 158, 'guest', 'g', NULL, '9825098657', 'wwwwddds@gg.co', '145674', 'gokul residency', 'ahmedabad', NULL, 'Ahmedabad', 'Gujarat', 'India', 1, 3, 0, '2020-09-07 09:29:42', '2020-09-07 09:29:42', '2020-09-07 09:29:42'),
(62, 159, 'Rs', 'P', NULL, '9825098250', 'khyati@k.co', '398943', 'Test area', '10 street', NULL, 'City', 'Gujarat', 'India', 1, 3, 0, '2020-09-07 13:28:56', '2020-09-07 13:28:56', '2020-09-07 13:28:56'),
(63, 100, 'sdsdsd', 'sddsd', 'sdsd', '9865326598', NULL, '986532', 'ssdsddsd', 'sdsdsdsd', NULL, 'sdsdsds', 'Tasmania', 'Australia', 0, 3, 0, '2020-09-08 10:27:15', '2020-09-08 10:27:15', '2020-09-08 10:27:15'),
(64, 100, 'sdsdsd', 'sddsd', 'sdsd', '9865326598', NULL, '986532', 'ssdsddsd', 'sdsdsdsd', NULL, 'sdsdsds', 'Tasmania', 'Australia', 0, 3, 0, '2020-09-08 10:28:35', '2020-09-08 10:28:35', '2020-09-08 10:28:35'),
(65, 100, 'sdsdsd', 'sddsd', 'sdsd', '9865326598', NULL, '986532', 'ssdsddsd', 'sdsdsdsd', NULL, 'sdsdsds', 'Tasmania', 'Australia', 0, 3, 0, '2020-09-08 10:32:35', '2020-09-08 10:32:35', '2020-09-08 10:32:35'),
(66, 164, 'sa', 'sdsdd', 'dsdsss', '9889898989', 'pp@gmail.coms', '986532', 'sdsdsdsd', 'sdsddsd', NULL, 'dsdsds', 'Goa', 'India', 1, 3, 0, '2020-09-11 05:28:42', '2020-09-11 05:28:42', '2020-09-11 05:28:42'),
(67, 165, 'aaaa', 'ssassa', 'aaaaaa', '9898989898', 'pp@gmail.coma', '986532', 'a', 'aaaa', NULL, 'aaa', 'Kerala', 'India', 1, 3, 0, '2020-09-11 05:31:04', '2020-09-11 05:31:04', '2020-09-11 05:31:04'),
(68, 136, 'Sonu', 'Sood', 'TTee', '9879879870', NULL, '380013', 'Ahmedabad, Gujarat, India', 'xcv', NULL, 'Ahmedabad', 'Gujarat', 'India', 0, 3, 0, '2020-09-18 19:42:25', '2020-09-18 19:42:25', '2020-09-18 19:42:25'),
(69, 81, 'test', 't', NULL, '4344543234', NULL, '433234', 'test', NULL, NULL, 'ahmedabad', 'Hessen', 'Germany', 0, 3, 0, '2020-09-19 07:05:55', '2020-09-19 07:05:55', '2020-09-19 07:05:55'),
(70, 169, 'test', 't', NULL, '8989898989', 'khyati_at_18@yahoo.co.in', '380007', 'test', NULL, NULL, 'ahmedabad', 'Gujarat', 'India', 1, 3, 0, '2020-09-19 07:21:10', '2020-09-19 07:21:10', '2020-09-19 07:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `user_coupons`
--

CREATE TABLE `user_coupons` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `usage` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_coupons`
--

INSERT INTO `user_coupons` (`id`, `order_id`, `user_id`, `coupon_id`, `usage`, `status`, `created_at`, `updated_at`) VALUES
(2, 84, 81, 4, 1, 1, '2020-08-21 06:10:03', '2020-08-21 06:10:03'),
(7, 91, 81, 13, 1, 1, '2020-08-21 10:37:21', '2020-08-21 10:37:21'),
(8, 92, 101, 13, 1, 1, '2020-08-21 10:40:08', '2020-08-21 10:40:08'),
(9, 93, 165, 13, 1, 1, '2020-08-21 10:47:55', '2020-08-21 10:47:55'),
(17, 107, 81, 3, 1, 1, '2020-08-25 06:41:58', '2020-08-25 06:41:58'),
(21, 114, 81, 1, 1, 1, '2020-08-26 14:40:29', '2020-08-26 14:40:29'),
(30, 187, 81, 16, 1, 1, '2020-09-01 13:50:16', '2020-09-01 13:50:16'),
(31, 79, 100, 1, 1, 1, '2020-09-01 16:06:43', '2020-09-01 16:06:43'),
(32, 83, 81, 6, 1, 1, '2020-09-07 09:40:03', '2020-09-07 09:40:03'),
(33, 91, 81, 7, 1, 1, '2020-09-08 12:58:12', '2020-09-08 12:58:12'),
(34, 92, 149, 3, 1, 1, '2020-09-10 11:45:22', '2020-09-10 11:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(5, 137, 30, '2020-07-17 10:57:42', '2020-07-17 10:57:42'),
(6, 137, 33, '2020-07-17 11:08:49', '2020-07-17 11:08:49'),
(7, 137, 35, '2020-07-17 11:09:17', '2020-07-17 11:09:17'),
(8, 137, 42, '2020-07-17 11:17:06', '2020-07-17 11:17:06'),
(9, 103, 60, '2020-07-17 11:32:19', '2020-07-17 11:32:19'),
(10, 103, 61, '2020-07-17 11:32:35', '2020-07-17 11:32:35'),
(11, 103, 52, '2020-07-17 11:33:46', '2020-07-17 11:33:46'),
(12, 103, 43, '2020-07-17 11:34:17', '2020-07-17 11:34:17'),
(13, 103, 34, '2020-07-17 11:35:06', '2020-07-17 11:35:06'),
(14, 103, 44, '2020-07-17 12:32:31', '2020-07-17 12:32:31'),
(15, 137, 50, '2020-07-17 12:37:12', '2020-07-17 12:37:12'),
(16, 137, 51, '2020-07-17 12:38:07', '2020-07-17 12:38:07'),
(17, 130, 61, '2020-07-17 12:43:18', '2020-07-17 12:43:18'),
(20, 136, 62, '2020-07-18 05:48:26', '2020-07-18 05:48:26'),
(104, 130, 35, '2020-07-18 13:52:48', '2020-07-18 13:52:48'),
(105, 130, 35, '2020-07-18 13:52:48', '2020-07-18 13:52:48'),
(106, 130, 33, '2020-07-18 14:00:50', '2020-07-18 14:00:50'),
(107, 130, 33, '2020-07-18 14:00:50', '2020-07-18 14:00:50'),
(159, 141, 60, '2020-07-19 14:40:17', '2020-07-19 14:40:17'),
(201, 141, 52, '2020-07-19 16:58:21', '2020-07-19 16:58:21'),
(202, 141, 61, '2020-07-19 16:58:23', '2020-07-19 16:58:23'),
(203, 141, 50, '2020-07-19 16:58:31', '2020-07-19 16:58:31'),
(221, 141, 44, '2020-07-19 17:08:04', '2020-07-19 17:08:04'),
(223, 141, 43, '2020-07-19 17:08:10', '2020-07-19 17:08:10'),
(233, 141, 35, '2020-07-19 17:21:49', '2020-07-19 17:21:49'),
(259, 101, 50, '2020-07-20 11:52:35', '2020-07-20 11:52:35'),
(262, 101, 30, '2020-07-21 09:57:48', '2020-07-21 09:57:48'),
(276, 81, 61, '2020-09-08 12:38:57', '2020-09-08 12:38:57'),
(279, 100, 60, '2020-09-08 12:52:44', '2020-09-08 12:52:44'),
(280, 100, 61, '2020-09-08 12:52:56', '2020-09-08 12:52:56'),
(282, 100, 52, '2020-09-08 12:56:30', '2020-09-08 12:56:30'),
(283, 100, 63, '2020-09-08 12:59:02', '2020-09-08 12:59:02'),
(285, 81, 42, '2020-09-08 13:04:40', '2020-09-08 13:04:40'),
(287, 100, 42, '2020-09-08 13:07:59', '2020-09-08 13:07:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_leave_reply`
--
ALTER TABLE `blog_leave_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us_detail`
--
ALTER TABLE `contact_us_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_banner`
--
ALTER TABLE `discount_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderDetails`
--
ALTER TABLE `orderDetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_billing_address`
--
ALTER TABLE `order_billing_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `paymenthistory`
--
ALTER TABLE `paymenthistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_stock_history`
--
ALTER TABLE `product_stock_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_product`
--
ALTER TABLE `purchase_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size_information`
--
ALTER TABLE `size_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testinomial`
--
ALTER TABLE `testinomial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_coupons`
--
ALTER TABLE `user_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `blog_leave_reply`
--
ALTER TABLE `blog_leave_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;
--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `contact_us_detail`
--
ALTER TABLE `contact_us_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;
--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `discount_banner`
--
ALTER TABLE `discount_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `orderDetails`
--
ALTER TABLE `orderDetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;
--
-- AUTO_INCREMENT for table `order_billing_address`
--
ALTER TABLE `order_billing_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `paymenthistory`
--
ALTER TABLE `paymenthistory`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;
--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=676;
--
-- AUTO_INCREMENT for table `product_stock_history`
--
ALTER TABLE `product_stock_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `purchase_product`
--
ALTER TABLE `purchase_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `size_information`
--
ALTER TABLE `size_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2552;
--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `testinomial`
--
ALTER TABLE `testinomial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;
--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `user_coupons`
--
ALTER TABLE `user_coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=288;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
