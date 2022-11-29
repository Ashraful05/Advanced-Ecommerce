-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2022 at 02:02 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `advanced-ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupons` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orders` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `returns` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reports` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `all_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_user_role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(25) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `brand`, `category`, `product`, `slider`, `coupons`, `shipping`, `orders`, `stock`, `blog`, `setting`, `returns`, `review`, `reports`, `all_user`, `admin_user_role`, `type`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2022-06-17 00:06:47', '$2y$10$6prk2/wxhZYyIOnFPG.IXeg3kPIIcCQ80nlLHcUVFeGvJ.jii4Dmu', '01278875332', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, 'hsfp0WlTZaVzFd2fONMr2LUvWzoq2w5Y4d3M5vQIqr6BwUIjOvjdYNsC3KR8', NULL, '2022_06_17_0607_ASH.jpg', '2022-06-17 00:06:47', '2022-10-06 07:38:33'),
(2, 'sakil', 'sakil@gmail.com', NULL, '$2y$10$w6XWngdlNKRZCQWFqVOWqO3SgbzWucdYieLRUmo0yAe6wj9bAdYKi', '+88-016-2130-0099', '1', '1', '1', '1', '1', NULL, NULL, '1', '1', '1', NULL, '1', '1', NULL, NULL, 2, NULL, NULL, 'upload/admin_images/2022_10_04_1502_sak.jpg', NULL, NULL),
(3, 'simee', 'simee@outlook.com', NULL, '$2y$10$JN0W3M56Q3QqwGhDsE036eSofbX3iT6puBV7TO9762/ZLcudd95JO', '+88-015-2130-0099', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', NULL, NULL, '1', '1', NULL, 2, NULL, NULL, 'upload/admin_images/2022_10_06_1320_apple_logo.png', '2022-10-04 09:15:04', '2022-10-06 07:28:38');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_category_id` int(11) NOT NULL,
  `post_title_english` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title_bangla` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_slug_bangla` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_slug_english` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_details_english` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_details_bangla` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `blog_category_id`, `post_title_english`, `post_title_bangla`, `post_slug_bangla`, `post_slug_english`, `post_image`, `post_details_english`, `post_details_bangla`, `created_at`, `updated_at`) VALUES
(1, 2, 'How to make wealth', 'কিভাবে সম্পদ করা যায়', 'কিভাবে_সম্পদ_করা_যায়', 'how_to_make_wealth', 'upload/blog_post_images/2022_09_26_1552_we.jpg', '<p>How to make wealthHow to make wealthHow to make wealthHow to make wealthHow to make wealthHow to make wealthHow to make wealthHow to make wealthHow to make wealthHow to make wealthHow to make wealthHow to make wealthHow to make wealth</p>', '<p>&nbsp;কিভাবে সম্পদ করা যায়&nbsp;কিভাবে সম্পদ করা যায়&nbsp;কিভাবে সম্পদ করা যায়&nbsp;কিভাবে সম্পদ করা যায়&nbsp;কিভাবে সম্পদ করা যায়&nbsp;কিভাবে সম্পদ করা যায়&nbsp;কিভাবে সম্পদ করা যায়&nbsp;কিভাবে সম্পদ করা যায়&nbsp;কিভাবে সম্পদ করা যায়</p>', '2022-09-25 09:53:48', '2022-09-26 09:52:53'),
(2, 1, 'How to learn Technology', 'কিভাবে প্রযুক্তি শিখবেন', 'কিভাবে_প্রযুক্তি_শিখবেন', 'how_to_learn_technology', 'upload/blog_post_images/2022_09_26_1552_tech1.jpg', '<p>How to learn Technology.How to learn Technology.How to learn Technology.How to learn Technology.How to learn Technology.How to learn Technology.How to learn Technology.</p>', '<p>&nbsp;কিভাবে প্রযুক্তি শিখবেন|&nbsp;কিভাবে প্রযুক্তি শিখবেন|&nbsp;কিভাবে প্রযুক্তি শিখবেন|&nbsp;কিভাবে প্রযুক্তি শিখবেন|&nbsp;কিভাবে প্রযুক্তি শিখবেন|&nbsp;কিভাবে প্রযুক্তি শিখবেন|&nbsp;কিভাবে প্রযুক্তি শিখবেন|</p>', '2022-09-25 09:56:42', '2022-09-26 09:52:42'),
(5, 3, 'Digital Marketing', 'প্রযুক্তিমূলক বাজারজাত', 'প্রযুক্তিমূলক_বাজারজাত', 'digital_marketing', 'upload/blog_post_images/2022_09_26_1552_dg.jpg', '<p>Digital Marketing.&nbsp;Digital Marketing Digital Marketing Digital Marketing Digital Marketing Digital Marketing.</p>', '<p>প্রযুক্তিমূলক বাজারজাত&nbsp;&nbsp;প্রযুক্তিমূলক বাজারজাত&nbsp;&nbsp;প্রযুক্তিমূলক বাজারজাত&nbsp;&nbsp;প্রযুক্তিমূলক বাজারজাত&nbsp;&nbsp;প্রযুক্তিমূলক বাজারজাত&nbsp;&nbsp;প্রযুক্তিমূলক বাজারজাত&nbsp;&nbsp;প্রযুক্তিমূলক বাজারজাত&nbsp;&nbsp;প্রযুক্তিমূলক বাজারজাত&nbsp;&nbsp;</p>', '2022-09-26 09:45:42', '2022-09-27 03:43:39');

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_categories`
--

CREATE TABLE `blog_post_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_category_name_english` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_category_name_bangla` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_category_slug_english` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_category_slug_bangla` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_post_categories`
--

INSERT INTO `blog_post_categories` (`id`, `blog_category_name_english`, `blog_category_name_bangla`, `blog_category_slug_english`, `blog_category_slug_bangla`, `created_at`, `updated_at`) VALUES
(1, 'Technology', 'প্রযুক্তি', 'technology', 'প্রযুক্তি', NULL, '2022-09-24 09:13:01'),
(2, 'Wealth', 'ধন', 'wealth', 'ধন', '2022-09-24 09:03:31', NULL),
(3, 'Marketing', 'মার্কেটিং', 'marketing', 'মার্কেটিং', '2022-09-24 09:04:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name_english` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_name_hindi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_name_bangla` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug_english` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_slug_hindi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_slug_bangla` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name_english`, `brand_name_hindi`, `brand_name_bangla`, `brand_slug_english`, `brand_slug_hindi`, `brand_slug_bangla`, `brand_image`, `created_at`, `updated_at`) VALUES
(1, 'Samsung', 'सैमसंग', 'স্যামসাং', 'samsung', 'सैमसंग', 'স্যামসাং', 'upload/brand_images/2022_06_17_1251_sm_logo.png', '2022-06-17 06:51:16', '2022-06-17 06:51:16'),
(2, 'xiaomi', 'सैमसंग', 'শাওমি', 'xiaomi', 'सैमसंग', 'শাওমি', 'upload/brand_images/2022_06_17_1252_xiaomi_logo.png', '2022-06-17 06:52:06', '2022-06-17 06:52:06'),
(3, 'Vivo', 'विवो', 'ভিভো', 'vivo', 'विवो', 'ভিভো', 'upload/brand_images/2022_06_17_1255_vivo_logo_1.jpg', '2022-06-17 06:52:27', '2022-06-17 06:55:48'),
(4, 'walton', 'वॉल्टन', 'ওয়ালটন', 'walton', 'वॉल्टन', 'ওয়ালটন', 'upload/brand_images/2022_06_17_1253_walton_logo.png', '2022-06-17 06:53:03', '2022-06-17 06:53:03'),
(5, 'apple', 'सेब', 'আপেল', 'apple', 'सेब', 'আপেল', 'upload/brand_images/2022_06_17_1253_apple_logo.png', '2022-06-17 06:53:35', '2022-06-17 06:53:35'),
(6, 'adidas', 'एडिडास', 'এডিডাস', 'adidas', 'एडिडास', 'এডিডাস', 'upload/brand_images/2022_06_17_1253_adidas_logo.png', '2022-06-17 06:53:50', '2022-06-17 06:53:50');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name_english` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_bangla` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug_english` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug_bangla` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name_english`, `category_name_bangla`, `category_slug_english`, `category_slug_bangla`, `category_icon`, `created_at`, `updated_at`) VALUES
(1, 'Fashion', 'ফ্যাশন', 'fashion', 'ফ্যাশন', 'fa fa-paw', NULL, NULL),
(2, 'Electronics', 'ইলেকট্রনিক্স', 'electronics', 'ইলেকট্রনিক্স', 'fa fa-user', NULL, NULL),
(4, 'Sweet Home', 'সুইট হোম', 'sweet-home', 'সুইট-হোম', 'fa fa-shopping-cart', NULL, NULL),
(5, 'Appliances', 'যন্ত্রপাতি', 'appliances', 'যন্ত্রপাতি', 'fa fa-shopping-bag', NULL, '2022-07-03 06:21:23'),
(6, 'Beauty', 'সৌন্দর্য', 'beauty', 'সৌন্দর্য', 'fa fa-paw', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_discount` int(11) NOT NULL,
  `coupon_validity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_discount`, `coupon_validity`, `status`, `created_at`, `updated_at`) VALUES
(1, 'HAPPY NEW YEAR', 15, '2022-09-24', 1, '2022-08-07 08:36:42', '2022-09-02 09:22:58'),
(3, 'TEST', 10, '2022-10-25', 1, '2022-08-12 08:06:36', '2022-09-23 09:25:18'),
(4, 'RANGPUR', 5, '2022-08-27', 1, '2022-08-12 08:06:49', '2022-08-12 08:06:49'),
(5, 'SATAN', 15, '2022-10-31', 1, '2022-08-22 10:23:05', '2022-09-23 09:25:01');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_06_03_163936_create_sessions_table', 1),
(7, '2022_06_04_060541_create_admins_table', 2),
(9, '2022_06_16_143948_create_brands_table', 3),
(10, '2022_06_18_042251_create_categories_table', 4),
(11, '2022_06_19_041200_create_sub_categories_table', 5),
(13, '2022_06_20_160257_create_sub_sub_categories_table', 6),
(14, '2022_06_20_154418_create_products_table', 7),
(15, '2022_06_21_143353_create_multi_image_table', 8),
(16, '2022_06_24_123605_create_multi_images_table', 9),
(17, '2022_06_27_104530_create_sliders_table', 10),
(18, '2022_07_31_142125_create_wish_lists_table', 11),
(19, '2022_08_07_134734_create_coupons_table', 12),
(20, '2022_08_09_050148_create_shipping_divisions_table', 13),
(21, '2022_08_11_160413_create_shipping_districts_table', 14),
(22, '2022_08_12_104430_create_shipping_areas_table', 15),
(23, '2022_09_04_101721_create_shippings_table', 16),
(24, '2022_09_05_152127_create_orders_table', 17),
(25, '2022_09_05_152302_create_order_items_table', 17),
(27, '2022_09_24_140406_create_blog_post_categories_table', 18),
(29, '2022_09_25_125958_create_blog_posts_table', 19),
(30, '2022_09_27_161209_create_site_settings_table', 20),
(31, '2022_09_28_132839_create_seos_table', 21),
(33, '2022_10_01_125824_create_review_products_table', 22);

-- --------------------------------------------------------

--
-- Table structure for table `multi_images`
--

CREATE TABLE `multi_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `photo_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_images`
--

INSERT INTO `multi_images` (`id`, `product_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(2, 1, 'upload/product_images/multi_images/2022_06_25_1825_m-1jgrfdotstpwh-nvy-jugular-original-imafhhakyypxr7av.jpeg', NULL, NULL),
(3, 1, 'upload/product_images/multi_images/2022_06_25_1825_s-1jgrfdotstpwh-nvy-jugular-original-imafhhajsn6yzg2a.jpeg', NULL, NULL),
(4, 1, 'upload/product_images/multi_images/2022_06_25_1825_xxl-1jgrfdotstpwh-nvy-jugular-original-imafhhak6nzwd4dn.jpeg', NULL, NULL),
(5, 1, 'upload/product_images/multi_images/2022_06_25_1825_xxl-1jgrfdotstpwh-nvy-jugular-original-imafhhakxfghf7aa.jpeg', NULL, NULL),
(6, 2, 'upload/product_images/multi_images/2022_06_26_1237_sa4.jpg', NULL, '2022-06-26 06:37:44'),
(7, 2, 'upload/product_images/multi_images/2022_06_25_1826_sa3.jpg', NULL, NULL),
(8, 2, 'upload/product_images/multi_images/2022_06_25_1826_sa2.jpg', NULL, NULL),
(9, 2, 'upload/product_images/multi_images/2022_06_25_1826_sa1.jpg', NULL, NULL),
(14, 4, 'upload/product_images/multi_images/2022_10_13_1754_red4.jpg', NULL, NULL),
(15, 4, 'upload/product_images/multi_images/2022_10_13_1754_red3.jpg', NULL, NULL),
(16, 4, 'upload/product_images/multi_images/2022_10_13_1754_red2.jpg', NULL, NULL),
(17, 4, 'upload/product_images/multi_images/2022_10_13_1754_red1.jpg', NULL, NULL),
(18, 5, 'upload/product_images/multi_images/2022_10_14_1536_gx-3.jpg', NULL, NULL),
(19, 5, 'upload/product_images/multi_images/2022_10_14_1536_gx-2.jpg', NULL, NULL),
(20, 5, 'upload/product_images/multi_images/2022_10_14_1536_gx-1.jpg', NULL, NULL),
(21, 6, 'upload/product_images/multi_images/2022_10_14_1540_gx-a2.jpg', NULL, NULL),
(22, 6, 'upload/product_images/multi_images/2022_10_14_1540_gx-a1.jpg', NULL, NULL),
(23, 6, 'upload/product_images/multi_images/2022_10_14_1540_gx-a01.jpg', NULL, NULL),
(24, 7, 'upload/product_images/multi_images/2022_10_14_1544_02.jpg', NULL, NULL),
(25, 7, 'upload/product_images/multi_images/2022_10_14_1544_02-1.jpg', NULL, NULL),
(26, 7, 'upload/product_images/multi_images/2022_10_14_1544_0202.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `area_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` int(11) DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processing_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picked_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipped_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivered_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `division_id`, `district_id`, `area_id`, `name`, `email`, `phone`, `post_code`, `notes`, `payment_type`, `payment_method`, `transaction_id`, `currency`, `amount`, `order_number`, `invoice_no`, `order_date`, `order_month`, `order_year`, `confirmed_date`, `processing_date`, `picked_date`, `shipped_date`, `delivered_date`, `cancel_date`, `return_date`, `return_reason`, `return_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 6, 4, 'User', 'user@gmail.com', '+88-016-2130-0099', 53100, 'test', 'card_1LfLmcK8JfhPfqMXxHdJvq6x', 'Stripe', 'txn_3LfLmeK8JfhPfqMX1l4lrccU', 'usd', 760.00, '631876a75d628', 'EOS36487648', '07 September 2022', 'September', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'delivered', '2022-09-07 04:47:05', '2022-09-30 10:29:04'),
(2, 1, 1, 14, 11, 'User', 'user@gmail.com', '+88-016-2130-0099', 53100, 'test', 'card_1LfLrJK8JfhPfqMXcEMhXAkL', 'Stripe', 'txn_3LfLrKK8JfhPfqMX0igacQIt', 'usd', 800.00, '631877ca3d93c', 'EOS55983879', '07 September 2022', 'September', '2022', NULL, NULL, NULL, NULL, NULL, NULL, '30 September 2022', 'wrong product', '2', 'delivered', '2022-09-07 04:51:55', '2022-09-30 11:27:16'),
(3, 1, 8, 10, 9, 'User', 'user@gmail.com', '+88-016-2130-0099', 53100, 'asfdas', 'card_1LfLvtK8JfhPfqMXoTwC5PZ9', 'Stripe', 'txn_3LfLvuK8JfhPfqMX0X1z2OBW', 'usd', 340.00, '631878e5e99c5', 'EOS64189275', '07 September 2022', 'September', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'confirm', '2022-09-07 04:56:39', '2022-09-15 13:08:06'),
(4, 1, 5, 8, 7, 'User', 'user@gmail.com', '+88-016-2130-0099', 53100, 'test', 'card_1LfQcVK8JfhPfqMXBtAzdhc6', 'Stripe', 'txn_3LfQcXK8JfhPfqMX0ZGMQck1', 'usd', 720.00, '6318bf47c61b6', 'EOS28378372', '07 September 2022', 'September', '2022', NULL, NULL, NULL, NULL, NULL, NULL, '30 September 2022', 'Not good', '2', 'delivered', '2022-09-07 09:56:57', '2022-09-30 11:24:59'),
(5, 1, 8, 7, 5, 'User', 'user@gmail.com', '+88-016-2130-0099', 53100, 'test', 'card_1LfQf3K8JfhPfqMXa4L4cWNJ', 'Stripe', 'txn_3LfQf5K8JfhPfqMX15XvEGgu', 'usd', 760.00, '6318bfe6198ec', 'EOS52444053', '07 September 2022', 'September', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'picked', '2022-09-07 09:59:35', '2022-09-15 11:21:22'),
(6, 1, 1, 14, 11, 'User', 'user@gmail.com', '+88-016-2130-0099', 5310, 'test', 'card_1LfQrxK8JfhPfqMXgmu25YkV', 'Stripe', 'txn_3LfQryK8JfhPfqMX1sylose2', 'usd', 780.00, '6318c3057dc4c', 'EOS10023506', '07 September 2022', 'September', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'picked', '2022-09-07 10:12:55', '2022-09-14 05:39:53'),
(7, 1, 3, 1, 1, 'User', 'user@gmail.com', '+88-016-2130-0099', 53100, 'test', 'card_1LfnPEK8JfhPfqMXw5RbyDJO', 'Stripe', 'txn_3LfnPHK8JfhPfqMX10nl3nGH', 'usd', 720.00, '631a156d152ce', 'EOS68925527', '08 September 2022', 'September', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2022-09-08 10:16:50', NULL),
(8, 1, 2, 11, 10, 'User', 'user@gmail.com', '+88-016-2130-0099', 53100, 'test', 'card_1LfndFK8JfhPfqMXVqIZc3RL', 'Stripe', 'txn_3LfndHK8JfhPfqMX149A6rk3', 'usd', 760.00, '631a18d1a76bc', 'EOS73306338', '08 September 2022', 'September', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2022-09-08 10:31:15', NULL),
(9, 3, 8, 7, 5, 'Jamil', 'jamil@yahoo.com', '+88-015-2130-0099', 53100, 'test', 'card_1LfnggK8JfhPfqMXAayzG90U', 'Stripe', 'txn_3LfnghK8JfhPfqMX072BBRuK', 'usd', 760.00, '631a19a6214f7', 'EOS83225217', '08 September 2022', 'September', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'delivered', '2022-09-08 10:34:47', '2022-09-15 11:42:57'),
(10, 2, 2, 2, 3, 'Jamil', 'jamil@gmail.com', '9809343433', 53100, 'test', 'card_1LfnjMK8JfhPfqMXBORVEdeF', 'Stripe', 'txn_3LfnjOK8JfhPfqMX0VdpClc5', 'usd', 760.00, '631a1a4ce240a', 'EOS75027977', '08 September 2022', 'September', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'delivered', '2022-09-08 10:37:34', '2022-10-02 07:46:56'),
(11, 2, 1, 14, 11, 'Jamil', 'jamil@gmail.com', '9809343433', 53100, 'test', 'card_1Lfno4K8JfhPfqMXpO3Dbvka', 'Stripe', 'txn_3Lfno6K8JfhPfqMX1fXAeRFs', 'usd', 680.00, '631a1b7071b06', 'EOS39521128', '08 September 2022', 'September', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'delivered', '2022-09-08 10:42:26', NULL),
(12, 2, 5, 8, 7, 'Jamil', 'jamil@gmail.com', '9809343433', 53100, 'test', 'card_1LfnqiK8JfhPfqMXc1CHzqbl', 'Stripe', 'txn_3LfnqkK8JfhPfqMX1VrMvmvg', 'usd', 342.00, '631a1c14a16a4', 'EOS12232907', '08 September 2022', 'September', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'delivered', '2022-09-08 10:45:10', '2022-09-16 10:28:53'),
(13, 1, 2, 2, 3, 'User', 'user@gmail.com', '+88-016-2130-0099', 53100, 'test', 'Cash On Delivery', 'Cash On Delivery', NULL, 'USD', 1800.00, NULL, 'EOS23399494', '12 September 2022', 'September', '2022', NULL, NULL, NULL, NULL, NULL, NULL, '30 September 2022', 'Poor Quality', '1', 'delivered', '2022-09-12 07:28:28', '2022-09-30 07:48:52'),
(14, 3, 8, 7, 5, 'Jamil', 'jamil@yahoo.com', '+88-015-2130-0099', 43100, 'test', 'Cash On Delivery', 'Cash On Delivery', NULL, 'USD', 969.00, NULL, 'EOS60430885', '12 September 2022', 'September', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'delivered', '2022-09-12 07:32:24', '2022-09-15 12:56:07'),
(15, 2, 2, 2, 3, 'Jamil', 'jamil@gmail.com', '9809343433', 5310, 'test', 'Cash On Delivery', 'Cash On Delivery', NULL, 'USD', 1700.00, NULL, 'EOS53979903', '13 September 2022', 'September', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'processing', '2022-09-13 08:10:32', NULL),
(16, 1, 8, 7, 5, 'User', 'user@gmail.com', '+88-016-2130-0099', 5310, 'SmartPhone', 'Cash On Delivery', 'Cash On Delivery', NULL, 'USD', 15500.00, NULL, 'EOS55838283', '13 October 2022', 'October', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'confirm', '2022-10-13 12:14:33', '2022-10-13 12:22:45');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `color`, `size`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'gold', NULL, '2', 380.00, '2022-09-07 04:47:05', NULL),
(2, 2, 1, 'black', 'Medium', '2', 400.00, '2022-09-07 04:51:56', NULL),
(3, 3, 1, 'black', 'Small', '1', 400.00, '2022-09-07 04:56:39', NULL),
(4, 4, 1, 'white', 'Large', '2', 400.00, '2022-09-07 09:56:57', NULL),
(5, 5, 2, 'white', NULL, '2', 380.00, '2022-09-07 09:59:35', NULL),
(6, 6, 1, 'black', 'Small', '1', 400.00, '2022-09-07 10:12:55', NULL),
(7, 6, 2, 'white', NULL, '1', 380.00, '2022-09-07 10:12:55', NULL),
(8, 7, 1, 'black', 'Small', '1', 400.00, '2022-09-08 10:16:56', NULL),
(9, 7, 1, 'black', 'Large', '1', 400.00, '2022-09-08 10:16:56', NULL),
(10, 8, 2, 'white', NULL, '2', 380.00, '2022-09-08 10:31:19', NULL),
(11, 9, 2, 'white', NULL, '2', 380.00, '2022-09-08 10:34:52', NULL),
(12, 10, 2, 'white', NULL, '2', 380.00, '2022-09-08 10:37:39', NULL),
(13, 11, 1, 'black', 'Small', '2', 400.00, '2022-09-08 10:42:31', NULL),
(14, 12, 2, 'white', NULL, '1', 380.00, '2022-09-08 10:45:15', NULL),
(15, 13, 1, 'black', 'Small', '5', 400.00, '2022-09-12 07:28:36', NULL),
(16, 14, 2, 'white', NULL, '3', 380.00, '2022-09-12 07:32:29', NULL),
(17, 15, 1, 'black', 'Medium', '5', 400.00, '2022-09-13 08:10:42', NULL),
(18, 16, 4, '--Choose Color--', '--Choose Size--', '1', 15500.00, '2022-10-13 12:14:40', NULL);

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
('jamil@gmail.com', '$2y$10$31y9ehc.isxQlmQa6ITEuu7DxIpsNSOm1ucbwmKWMjSC0rmo1uTWS', '2022-06-08 22:30:45'),
('user@gmail.com', '$2y$10$/55c0cE62WYrNf6osnskQew4ae3Suyvhuo7MADV/l1RtT6h3VdLLi', '2022-09-08 10:02:51');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `sub_subcategory_id` int(11) NOT NULL,
  `product_name_english` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name_bangla` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_english` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_bangla` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tag_english` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_tag_bangla` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size_english` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size_bangla` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color_bangla` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color_english` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description_english` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description_bangla` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_description_bangla` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_description_english` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hot_deals` int(11) DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `special_offer` int(11) DEFAULT NULL,
  `special_deals` int(11) DEFAULT NULL,
  `digital_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `subcategory_id`, `sub_subcategory_id`, `product_name_english`, `product_name_bangla`, `product_slug_english`, `product_slug_bangla`, `product_code`, `product_quantity`, `product_tag_english`, `product_tag_bangla`, `product_size_english`, `product_size_bangla`, `product_color_bangla`, `product_color_english`, `selling_price`, `discount_price`, `short_description_english`, `short_description_bangla`, `long_description_bangla`, `long_description_english`, `product_thumbnail`, `hot_deals`, `featured`, `special_offer`, `special_deals`, `digital_file`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 1, 41, 'Adidas Casual Tshirt', 'অ্যাডিডাস ক্যাজুয়াল টিশার্ট', 'adidas-casual-tshirt', 'অ্যাডিডাস-ক্যাজুয়াল-টিশার্ট', 'adidas-09', '200', 'addidas,casual,tshirt', 'addidas,casual,tshirt', 'Small,Medium,Large', 'Small,Medium,Large', 'black,white,red', 'black,white,red', '450', '400', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '1500 এর দশক থেকে ব্যবহৃত Lorem Ipsum-এর আদর্শ খণ্ডটি আগ্রহীদের জন্য নীচে পুনরুত্পাদন করা হয়েছে। সিসেরোর \"ডি ফিনিবাস বোনোরাম এট ম্যালোরাম\" এর বিভাগ 1.10.32 এবং 1.10.33ও তাদের সঠিক মূল আকারে পুনরুত্পাদন করা হয়েছে, এইচ. র্যাকহ্যামের 1914 সালের অনুবাদ থেকে ইংরেজি সংস্করণ সহ।', '<pre>\r\nএটা কোথা থেকে এসেছে?\r\nজনপ্রিয় বিশ্বাসের বিপরীতে, Lorem Ipsum কেবল এলোমেলো পাঠ্য নয়। এটি 45 খ্রিস্টপূর্বাব্দের ধ্রুপদী ল্যাটিন সাহিত্যের একটি অংশে শিকড় রয়েছে, এটি 2000 বছরেরও বেশি পুরানো। ভার্জিনিয়ার হ্যাম্পডেন-সিডনি কলেজের একজন ল্যাটিন অধ্যাপক রিচার্ড ম্যাকক্লিনটক লোরেম ইপসাম প্যাসেজ থেকে আরও অস্পষ্ট ল্যাটিন শব্দ কনসেক্টুরের সন্ধান করেছিলেন এবং শাস্ত্রীয় সাহিত্যে এই শব্দের উদ্ধৃতিগুলির মধ্য দিয়ে গিয়ে সন্দেহাতীত উত্সটি আবিষ্কার করেছিলেন। লোরেম ইপসাম 45 খ্রিস্টপূর্বাব্দে লেখা সিসেরোর &quot;ডি ফিনিবাস বোনোরাম এট ম্যালোরাম&quot; (দ্য এক্সট্রিমস অফ গুড অ্যান্ড ইভিল) এর বিভাগ 1.10.32 এবং 1.10.33 থেকে এসেছে। এই বইটি নৈতিকতার তত্ত্বের উপর একটি গ্রন্থ, রেনেসাঁর সময় খুব জনপ্রিয়। Lorem Ipsum এর প্রথম লাইন, &quot;Lorem ipsum dolor sit amet..&quot;, 1.10.32 ধারার একটি লাইন থেকে এসেছে।\r\n\r\n1500 এর দশক থেকে ব্যবহৃত Lorem Ipsum-এর আদর্শ খণ্ডটি আগ্রহীদের জন্য নীচে পুনরুত্পাদন করা হয়েছে। সিসেরোর &quot;ডি ফিনিবাস বোনোরাম এট ম্যালোরাম&quot; এর বিভাগ 1.10.32 এবং 1.10.33ও তাদের সঠিক মূল আকারে পুনরুত্পাদন করা হয়েছে, এইচ. র্যাকহ্যামের 1914 সালের অনুবাদ থেকে ইংরেজি সংস্করণ সহ।</pre>', '<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'upload/product_images/thumbnail_images/2022_06_25_1825_s-1jgrfdotstpwh-nvy-jugular-original-imafhhajsn6yzg2a.jpeg', 1, 1, 1, 1, NULL, 1, NULL, '2022-09-23 09:20:33'),
(2, 1, 2, 6, 23, 'Galaxy A13 transparent phone case', 'Galaxy A13 স্বচ্ছ ফোন কেস', 'galaxy-a13-transparent-phone-case', 'Galaxy-A13-স্বচ্ছ-ফোন-কেস', 'sgn-5', '298', 'white,gold,black', 'white,gold,black', NULL, 'Small,Medium,Large', 'Small,Medium,Large', 'white,gold,black', '400', '380', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '1500 এর দশক থেকে ব্যবহৃত Lorem Ipsum-এর আদর্শ খণ্ডটি আগ্রহীদের জন্য নীচে পুনরুত্পাদন করা হয়েছে। সিসেরোর \"ডি ফিনিবাস বোনোরাম এট ম্যালোরাম\" এর বিভাগ 1.10.32 এবং 1.10.33ও তাদের সঠিক মূল আকারে পুনরুত্পাদন করা হয়েছে, এইচ. র্যাকহ্যামের 1914 সালের অনুবাদ থেকে ইংরেজি সংস্করণ সহ।', '<pre>\r\nএটা কোথা থেকে এসেছে?\r\nজনপ্রিয় বিশ্বাসের বিপরীতে, Lorem Ipsum কেবল এলোমেলো পাঠ্য নয়। এটি 45 খ্রিস্টপূর্বাব্দের ধ্রুপদী ল্যাটিন সাহিত্যের একটি অংশে শিকড় রয়েছে, এটি 2000 বছরেরও বেশি পুরানো। ভার্জিনিয়ার হ্যাম্পডেন-সিডনি কলেজের একজন ল্যাটিন অধ্যাপক রিচার্ড ম্যাকক্লিনটক লোরেম ইপসাম প্যাসেজ থেকে আরও অস্পষ্ট ল্যাটিন শব্দ কনসেক্টুরের সন্ধান করেছিলেন এবং শাস্ত্রীয় সাহিত্যে এই শব্দের উদ্ধৃতিগুলির মধ্য দিয়ে গিয়ে সন্দেহাতীত উত্সটি আবিষ্কার করেছিলেন। লোরেম ইপসাম 45 খ্রিস্টপূর্বাব্দে লেখা সিসেরোর &quot;ডি ফিনিবাস বোনোরাম এট ম্যালোরাম&quot; (দ্য এক্সট্রিমস অফ গুড অ্যান্ড ইভিল) এর বিভাগ 1.10.32 এবং 1.10.33 থেকে এসেছে। এই বইটি নৈতিকতার তত্ত্বের উপর একটি গ্রন্থ, রেনেসাঁর সময় খুব জনপ্রিয়। Lorem Ipsum এর প্রথম লাইন, &quot;Lorem ipsum dolor sit amet..&quot;, 1.10.32 ধারার একটি লাইন থেকে এসেছে।\r\n\r\n1500 এর দশক থেকে ব্যবহৃত Lorem Ipsum-এর আদর্শ খণ্ডটি আগ্রহীদের জন্য নীচে পুনরুত্পাদন করা হয়েছে। সিসেরোর &quot;ডি ফিনিবাস বোনোরাম এট ম্যালোরাম&quot; এর বিভাগ 1.10.32 এবং 1.10.33ও তাদের সঠিক মূল আকারে পুনরুত্পাদন করা হয়েছে, এইচ. র্যাকহ্যামের 1914 সালের অনুবাদ থেকে ইংরেজি সংস্করণ সহ।</pre>', '<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'upload/product_images/thumbnail_images/2022_06_26_1604_sa1.jpg', 1, 1, 1, 1, NULL, 1, NULL, '2022-10-02 07:46:55'),
(4, 2, 2, 17, 49, 'Redmi 10', 'Redmi 10', 'redmi-10', 'Redmi-10', 'redmi-10', '50', 'Lorem,Ipsum,Amet', 'Lorem,Ipsum,Amet', 'Small,Medium,Large', 'Small,Medium,Large', 'Small,Medium,Large', 'Small,Medium,Large', '16000', '15500', 'Short Description', 'Short Description Bangla', '<h5>Long Description Bangla&nbsp;&nbsp;Long Description Bangla&nbsp;&nbsp;Long Description Bangla&nbsp;&nbsp;Long Description Bangla&nbsp;&nbsp;Long Description Bangla&nbsp;&nbsp;Long Description Bangla&nbsp;&nbsp;</h5>', '<h5>Long Description English&nbsp;Long Description EnglishLong Description EnglishLong Description EnglishLong Description EnglishLong Description English</h5>', 'upload/product_images/thumbnail_images/2022_10_13_1754_red4.jpg', 1, 1, NULL, NULL, '2022_10_13_1754_.pdf', 1, NULL, NULL),
(5, 1, 2, 17, 49, 'Galaxy A13', 'Galaxy A13', 'galaxy-a13', 'Galaxy-A13', 'sgx-13', '10', 'Lorem,Ipsum,Amet', 'Lorem,Ipsum,Amet', 'large', 'large', 'black,gold,white', 'black,gold,white', '12000', '11500', 'Galaxy A13  Galaxy A13  Galaxy A13  Galaxy A13', 'Galaxy A13  Galaxy A13  Galaxy A13  Galaxy A13  Galaxy A13  Galaxy A13', '<p>Galaxy A13 &nbsp;Galaxy A13 &nbsp;Galaxy A13 &nbsp;Galaxy A13&nbsp; &nbsp;Galaxy A13 &nbsp;Galaxy A13 &nbsp;Galaxy A13 &nbsp;Galaxy A13&nbsp; &nbsp;Galaxy A13 &nbsp;Galaxy A13 &nbsp;Galaxy A13 &nbsp;Galaxy A13&nbsp; &nbsp;Galaxy A13 &nbsp;Galaxy A13 &nbsp;Galaxy A13 &nbsp;Galaxy A13&nbsp; &nbsp;Galaxy A13 &nbsp;Galaxy A13 &nbsp;Galaxy A13 &nbsp;Galaxy A13&nbsp; &nbsp;</p>', '<p>Galaxy A13 &nbsp;Galaxy A13 &nbsp;Galaxy A13 &nbsp;Galaxy A13&nbsp; &nbsp;Galaxy A13 &nbsp;Galaxy A13 &nbsp;Galaxy A13 &nbsp;Galaxy A13&nbsp; &nbsp;Galaxy A13 &nbsp;Galaxy A13 &nbsp;Galaxy A13 &nbsp;Galaxy A13&nbsp; &nbsp;Galaxy A13 &nbsp;Galaxy A13 &nbsp;Galaxy A13 &nbsp;Galaxy A13&nbsp; &nbsp;Galaxy A13 &nbsp;Galaxy A13 &nbsp;Galaxy A13 &nbsp;Galaxy A13&nbsp; &nbsp;</p>', 'upload/product_images/thumbnail_images/2022_10_14_1536_gx-1.jpg', 1, 1, 1, NULL, '2022_10_14_1536_.pdf', 1, NULL, NULL),
(6, 1, 2, 17, 49, 'Galaxy A01', 'Galaxy A01', 'galaxy-a01', 'Galaxy-A01', 'sgx-a01', '10', 'Lorem,Ipsum,Amet', 'lorem,amet', '6.6', '6.6', 'gold,white', 'gold,white', '13400', '13000', 'Galaxy A01  Galaxy A01  Galaxy A01  Galaxy A01', 'Galaxy A01  Galaxy A01  Galaxy A01  Galaxy A01  Galaxy A01', '<p>Galaxy A01 &nbsp;Galaxy A01 &nbsp;Galaxy A01 &nbsp;Galaxy A01 &nbsp;Galaxy A01 &nbsp;Galaxy A01 &nbsp;Galaxy A01 &nbsp;Galaxy A01 &nbsp;Galaxy A01 &nbsp;Galaxy A01 &nbsp;</p>', '<p>Galaxy A01 &nbsp;Galaxy A01 &nbsp;Galaxy A01 &nbsp;Galaxy A01 &nbsp;Galaxy A01 &nbsp;Galaxy A01 &nbsp;Galaxy A01 &nbsp;</p>', 'upload/product_images/thumbnail_images/2022_10_14_1540_gx-a01.jpg', 1, 1, 1, 1, '2022_10_14_1540_.pdf', 1, NULL, NULL),
(7, 1, 2, 17, 49, 'galaxy 02', 'galaxy 02', 'galaxy-02', 'galaxy-02', 'sgx-02', '10', 'Lorem,Ipsum,Amet', 'Lorem,Ipsum,Amet', 'Large', 'Large', 'black,gold,white', 'black,gold,white', '14000', '13500', 'galaxy 02  galaxy 02  galaxy 02', 'galaxy 02  galaxy 02  galaxy 02  galaxy 02', '<p>galaxy 02 &nbsp;galaxy 02 &nbsp;galaxy 02 &nbsp;galaxy 02 &nbsp;galaxy 02 &nbsp;galaxy 02 &nbsp;galaxy 02 &nbsp;galaxy 02 &nbsp;galaxy 02 &nbsp;galaxy 02 &nbsp;galaxy 02 &nbsp;galaxy 02 &nbsp;galaxy 02 &nbsp;galaxy 02 &nbsp;galaxy 02 &nbsp;galaxy 02 &nbsp;galaxy 02 &nbsp;galaxy 02 &nbsp;galaxy 02 &nbsp;galaxy 02 &nbsp;galaxy 02 &nbsp;galaxy 02 &nbsp;</p>', '<p>galaxy 02 &nbsp;galaxy 02 &nbsp;galaxy 02 &nbsp;galaxy 02 &nbsp;galaxy 02 &nbsp;galaxy 02 &nbsp;galaxy 02 &nbsp;galaxy 02 &nbsp;galaxy 02 &nbsp;galaxy 02 &nbsp;galaxy 02 &nbsp;galaxy 02 &nbsp;</p>', 'upload/product_images/thumbnail_images/2022_10_14_1544_02.jpg', NULL, 1, 1, 1, '2022_10_14_1544_.pdf', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `review_products`
--

CREATE TABLE `review_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `review_products`
--

INSERT INTO `review_products` (`id`, `product_id`, `user_id`, `comment`, `rating`, `summary`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'Really it\'s a very good product at this price.', NULL, 'nice product', '1', '2022-10-01 07:43:26', '2022-10-01 09:15:52'),
(2, 1, 3, 'feels very comfortable, when it wears.', NULL, 'very good tshirt', '0', '2022-10-01 07:46:46', NULL),
(4, 2, 1, 'very good phone coververy good phone coververy good phone cover', NULL, 'very good phone cover', '1', '2022-10-13 09:18:45', '2022-10-13 10:07:52'),
(5, 2, 1, 'very good tshirt   very good tshirt   very good tshirt   very good tshirt', 3, 'very good tshirt', '0', '2022-10-13 10:06:49', NULL),
(6, 2, 1, 'good backpart   good backpart   good backpart   good backpart   good backpart', 5, 'good backpart', '1', '2022-10-13 10:10:24', '2022-10-13 10:10:32'),
(7, 1, 1, 'very good tshirt  very good tshirt  very good tshirt  very good tshirt', 4, 'very good tshirt', '1', '2022-10-13 10:11:59', '2022-10-13 10:12:06');

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_analytics` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `meta_title`, `meta_author`, `meta_keyword`, `meta_description`, `google_analytics`, `created_at`, `updated_at`) VALUES
(1, 'Easy Online Shop', 'Easy Shop', 'best online shop, best ecommerce site, best online product,  best online product site', 'best online shop, best ecommerce site, best online product,  best online product site', 'window.dataLayer = window.dataLayer || [];   function gtag(){dataLayer.push(arguments);}   gtag(\'js\', new Date());    gtag(\'config\', \'UA-84816806-1\');', '2022-09-28 07:47:38', '2022-09-29 10:55:42'),
(2, 'Miss', 'Jeanie Daugherty DVM', 'miss', 'Beatae incidunt illo commodi nihil ratione. Incidunt consequatur consequatur necessitatibus distinctio officia eum iste molestiae.', 'google_analytics', '2022-09-28 07:47:38', '2022-09-28 07:47:38'),
(3, 'Prof.', 'Dr. Kiley Romaguera', 'miss', 'Reprehenderit soluta nisi porro. Beatae inventore optio dolor esse et. Omnis debitis repellat suscipit quia excepturi.', 'google_analytics', '2022-09-28 07:47:38', '2022-09-28 07:47:38'),
(4, 'Prof.', 'Jayce Rodriguez', 'mrs.', 'Eum ullam omnis ducimus voluptatem in. Ipsa corporis tempora non ipsam veritatis et sapiente nihil. Sunt saepe id itaque hic vitae non quod. Et velit aliquam atque iste et qui consequatur.', 'google_analytics', '2022-09-28 07:47:38', '2022-09-28 07:47:38'),
(5, 'Ms.', 'Keely Cormier', 'prof.', 'Dolorem est aut quia eveniet beatae sequi ut. Corrupti iure asperiores facilis sunt. Quia hic suscipit aut ut ut ipsum aut voluptas. Ut aut delectus veritatis qui consequatur.', 'google_analytics', '2022-09-28 07:47:38', '2022-09-28 07:47:38'),
(6, 'Prof.', 'Karlee Wiza', 'dr.', 'Quaerat incidunt nostrum natus sed. Molestiae natus et est tempora.', 'google_analytics', '2022-09-28 07:47:38', '2022-09-28 07:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('cnTQLpgFrAgsW0tjNy205EpY4epVMhbZQeZklcOG', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidWVUUW9rMlEwbzJ6VWVJSXd6SHczSUJHd2pDS084a2VPMEF4VmVBYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzY6Imh0dHA6Ly9sb2NhbGhvc3QvQWR2YW5jZWQtRWNvbW1lcmNlL3B1YmxpYy9zdWJjYXRlZ29yeS1wcm9kdWN0LzE3L3NtYXJ0cGhvbmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjg6Imxhbmd1YWdlIjtzOjc6ImVuZ2xpc2giO30=', 1665943505),
('fBP27yo2Byix8W1FFpoRTATrvR8rxSo8xDXXdgXB', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieHNZdkJZSTF2TkZjWGY1Ymgyc3lWenpmQmVZVnhFVjdXYlVkQkliQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly9sb2NhbGhvc3QvQWR2YW5jZWQtRWNvbW1lcmNlL3B1YmxpYy9zaG9wIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo4OiJsYW5ndWFnZSI7czo3OiJlbmdsaXNoIjt9', 1665940811);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_areas`
--

CREATE TABLE `shipping_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `area_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_areas`
--

INSERT INTO `shipping_areas` (`id`, `division_id`, `district_id`, `area_name`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Pirajpur Sadar', '2022-08-12 05:06:35', '2022-08-12 05:16:22'),
(3, 2, 2, 'Fatulla', '2022-09-04 06:08:57', NULL),
(4, 5, 6, 'Halisahar', '2022-09-04 06:09:17', NULL),
(5, 8, 7, 'Benapol', '2022-09-04 06:10:13', '2022-09-04 07:32:07'),
(6, 5, 6, 'Sitacundo', '2022-09-04 06:14:42', NULL),
(7, 5, 8, 'Rangamati Sadar', '2022-09-04 06:17:00', NULL),
(8, 3, 9, 'Patualkhali Sadar', '2022-09-04 07:29:28', NULL),
(9, 8, 10, 'Chuadanga Sadar', '2022-09-04 07:31:14', NULL),
(10, 2, 11, 'chourasta', '2022-09-04 07:32:51', NULL),
(11, 1, 14, 'Saidpur', '2022-09-04 07:34:11', NULL),
(12, 1, 15, 'Sadar', '2022-09-04 07:34:56', NULL),
(13, 1, 16, 'Sadar', '2022-09-04 07:35:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_districts`
--

CREATE TABLE `shipping_districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_districts`
--

INSERT INTO `shipping_districts` (`id`, `division_id`, `district_name`, `created_at`, `updated_at`) VALUES
(1, 3, 'Pirajpur', '2022-08-11 23:53:18', '2022-08-12 04:29:47'),
(2, 2, 'Narayanganj', '2022-08-12 00:03:05', '2022-08-12 04:30:05'),
(6, 5, 'Chittagong', '2022-08-12 04:41:06', '2022-08-12 04:41:06'),
(7, 8, 'Jessore', '2022-09-04 06:09:49', '2022-09-04 06:09:49'),
(8, 5, 'Rangamati', '2022-09-04 06:16:15', '2022-09-04 06:16:15'),
(9, 3, 'Patukhali', '2022-09-04 07:29:03', '2022-09-04 07:29:03'),
(10, 8, 'Chuadanga', '2022-09-04 07:30:06', '2022-09-04 07:30:06'),
(11, 2, 'Gazipur', '2022-09-04 07:30:18', '2022-09-04 07:30:18'),
(12, 7, 'Jamalpur', '2022-09-04 07:30:43', '2022-09-04 07:30:43'),
(13, 7, 'Mymensingh', '2022-09-04 07:30:55', '2022-09-04 07:30:55'),
(14, 1, 'Nilphamari', '2022-09-04 07:33:59', '2022-09-04 07:33:59'),
(15, 1, 'Dinajpur', '2022-09-04 07:34:22', '2022-09-04 07:34:22'),
(16, 1, 'Rangpur', '2022-09-04 07:34:27', '2022-09-04 07:34:27');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_divisions`
--

CREATE TABLE `shipping_divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_divisions`
--

INSERT INTO `shipping_divisions` (`id`, `division_name`, `created_at`, `updated_at`) VALUES
(1, 'Rangpur', '2022-08-08 23:19:20', '2022-08-08 23:19:20'),
(2, 'Dhaka', '2022-08-08 23:19:27', '2022-08-08 23:19:27'),
(3, 'Barisal', '2022-08-08 23:19:32', '2022-08-08 23:19:32'),
(5, 'Chittagong', '2022-08-08 23:19:44', '2022-08-08 23:19:44'),
(6, 'Rajshahi', '2022-08-08 23:19:52', '2022-08-08 23:19:52'),
(7, 'Mymensingh', '2022-08-08 23:19:58', '2022-08-08 23:19:58'),
(8, 'Khulna', '2022-08-08 23:20:15', '2022-08-08 23:35:45');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `logo`, `phone_one`, `phone_two`, `email`, `company_name`, `company_address`, `facebook`, `twitter`, `linkedin`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'upload/logo/2022_09_27_1845_logo.png', '01872342310', '01772342409', 'easyshop@gmail.coom', 'Easy Shop', 'Dhaka', 'easyshop.facebook', 'easyshop.twitter', 'easyshop.linkedin', 'easyshop.youtube', NULL, '2022-09-27 12:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_image`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'upload/slider_images/2022_06_27_1118_0d3f9452916609.5921c4e206fcc.jpg', 'Slider One', 'Slider One Description Slider One Description Slider One Description Slider One Description', '1', '2022-06-27 05:18:53', '2022-06-27 06:07:56'),
(2, 'upload/slider_images/2022_06_27_1214_8.jpg', 'Slider Two', 'Slider Two Description Slider Two DescriptionSlider Two DescriptionSlider Two Description', '1', '2022-06-27 06:14:53', '2022-06-27 06:14:53'),
(3, 'upload/slider_images/2022_06_27_1235_91a7d4e5ff72168406b799977c717c0e.jpg', 'Slider Three', 'Slider Three Description Slider Three Description Slider Three Description Slider Three Description', '1', '2022-06-27 06:15:19', '2022-06-27 06:36:30');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name_english` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_name_bangla` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug_english` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug_bangla` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name_english`, `subcategory_name_bangla`, `subcategory_slug_english`, `subcategory_slug_bangla`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mans Top Ware', 'ম্যানস টপ ওয়্যার', 'mans-top-ware', 'ম্যানস-টপ-ওয়্যার', NULL, NULL),
(2, 1, 'Mans Bottom Ware', 'ম্যানস বটম ওয়ার', 'mans-bottom-ware', 'ম্যানস-বটম-ওয়ার', NULL, NULL),
(3, 1, 'Mans Footwear', 'মানস পাদুকা', 'mans-footwear', 'মানস-পাদুকা', NULL, NULL),
(4, 1, 'Women Footwear', 'মহিলাদের পাদুকা', 'women-footwear', 'মহিলাদের-পাদুকা', NULL, NULL),
(5, 2, 'Computer Peripherals', 'কম্পিউটার পেরিফেরাল', 'computer-peripherals', 'কম্পিউটার-পেরিফেরাল', NULL, NULL),
(6, 2, 'Mobile Accessory', 'মোবাইল অ্যাকসেসরি', 'mobile-accessory', 'মোবাইল-অ্যাকসেসরি', NULL, NULL),
(7, 2, 'Gaming', 'গেমিং', 'gaming', 'গেমিং', NULL, NULL),
(8, 4, 'Home Furnishings', 'বাড়ির আসবাবপত্র', 'home-furnishings', 'বাড়ির-আসবাবপত্র', NULL, NULL),
(9, 4, 'Living Room', 'বসার ঘর', 'living-room', 'বসার-ঘর', NULL, NULL),
(10, 4, 'Home Decoration', 'বাড়ির সাজসজ্জা', 'home-decoration', 'বাড়ির-সাজসজ্জা', NULL, NULL),
(11, 5, 'Televisions', 'টেলিভিশন', 'televisions', 'টেলিভিশন', NULL, NULL),
(12, 5, 'Washing Machines', 'ওয়াশিং মেশিন', 'washing-machines', 'ওয়াশিং-মেশিন', NULL, NULL),
(13, 5, 'Refrigerators', 'রেফ্রিজারেটর', 'refrigerators', 'রেফ্রিজারেটর', NULL, NULL),
(14, 6, 'Beauty and Personal Care', 'সৌন্দর্য এবং ব্যক্তিগত যত্ন', 'beauty-and-personal-care', 'সৌন্দর্য-এবং-ব্যক্তিগত-যত্ন', NULL, NULL),
(15, 6, 'Food and Drinks', 'খাদ্য ও পানীয়', 'food-and-drinks', 'খাদ্য-ও-পানীয়', NULL, NULL),
(16, 6, 'Baby Care', 'শিশুর যত্ন', 'baby-care', 'শিশুর-যত্ন', NULL, NULL),
(17, 2, 'smartphone', 'স্মার্টফোন', 'smartphone', 'স্মার্টফোন', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_categories`
--

CREATE TABLE `sub_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_name_english` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_name_bangla` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_slug_english` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_slug_bangla` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_sub_categories`
--

INSERT INTO `sub_sub_categories` (`id`, `category_id`, `subcategory_id`, `subsubcategory_name_english`, `subsubcategory_name_bangla`, `subsubcategory_slug_english`, `subsubcategory_slug_bangla`, `created_at`, `updated_at`) VALUES
(1, 5, 11, 'Big Screen TVs', 'বড় পর্দার টিভি', 'big-screen-tvs', 'বড়-পর্দার-টিভি', NULL, NULL),
(2, 5, 11, 'Smart TVs', 'স্মার্ট টিভি', 'smart-tvs', 'স্মার্ট-টিভি', NULL, NULL),
(3, 5, 11, 'OLED TVs', 'OLED টিভি', 'oled-tvs', 'OLED-টিভি', NULL, NULL),
(4, 5, 12, 'Washer Dryers', 'ওয়াশার ড্রায়ার', 'washer-dryers', 'ওয়াশার-ড্রায়ার', NULL, NULL),
(5, 5, 12, 'Washer Only', 'শুধুমাত্র ধোয়ার', 'washer-only', 'শুধুমাত্র-ধোয়ার', NULL, '2022-06-23 10:22:31'),
(6, 5, 12, 'Energy Efficient', 'শক্তি দক্ষ', 'energy-efficient', 'শক্তি-দক্ষ', NULL, NULL),
(7, 5, 13, 'Single Door', 'একক দরজা', 'single-door', 'একক-দরজা', NULL, NULL),
(8, 5, 13, 'Double Door', 'ডবল দরজা', 'double-door', 'ডবল-দরজা', NULL, NULL),
(9, 5, 13, 'Mini Rerigerators', 'মিনি রেরিজারেটর', 'mini-rerigerators', 'মিনি-রেরিজারেটর', NULL, NULL),
(10, 6, 14, 'Eys Makeup', 'চোখের মেকআপ', 'eys-makeup', 'চোখের-মেকআপ', NULL, NULL),
(11, 6, 14, 'Lip Makeup', 'ঠোঁটের মেকআপ', 'lip-makeup', 'ঠোঁটের-মেকআপ', NULL, NULL),
(12, 6, 14, 'Hair Care', 'চুলের যত্ন', 'hair-care', 'চুলের-যত্ন', NULL, NULL),
(13, 6, 15, 'Beverages', 'পানীয়', 'beverages', 'পানীয়', NULL, NULL),
(14, 6, 15, 'Chocolates', 'চকলেট', 'chocolates', 'চকলেট', NULL, NULL),
(15, 6, 15, 'Snacks', 'স্ন্যাকস', 'snacks', 'স্ন্যাকস', NULL, NULL),
(16, 6, 16, 'Baby Diapers', 'শিশুর ডায়াপার', 'baby-diapers', 'শিশুর-ডায়াপার', NULL, NULL),
(17, 6, 16, 'Baby Wipes', 'বেবি ওয়াইপস', 'baby-wipes', 'বেবি-ওয়াইপস', NULL, NULL),
(18, 6, 16, 'Baby Food', 'শিশুর খাদ্য', 'baby-food', 'শিশুর-খাদ্য', NULL, NULL),
(19, 2, 5, 'Printers', 'প্রিন্টার', 'printers', 'প্রিন্টার', NULL, NULL),
(20, 2, 5, 'Monitors', 'মনিটর', 'monitors', 'মনিটর', NULL, NULL),
(21, 2, 5, 'Projectors', 'প্রজেক্টর', 'projectors', 'প্রজেক্টর', NULL, NULL),
(22, 2, 6, 'Plain Cases', 'প্লেইন কেস', 'plain-cases', 'প্লেইন-কেস', NULL, NULL),
(23, 2, 6, 'Designer Cases', 'ডিজাইনার কেস', 'designer-cases', 'ডিজাইনার-কেস', NULL, NULL),
(24, 2, 6, 'Screen Guards', 'স্ক্রিন গার্ড', 'screen-guards', 'স্ক্রিন-গার্ড', NULL, NULL),
(25, 2, 7, 'Gaming Mouse', 'গেমিং মাউস', 'gaming-mouse', 'গেমিং-মাউস', NULL, NULL),
(26, 2, 7, 'Gaming Keyboards', 'গেমিং কীবোর্ড', 'gaming-keyboards', 'গেমিং-কীবোর্ড', NULL, NULL),
(27, 2, 7, 'Gaming Mousepads', 'গেমিং মাউসপ্যাড', 'gaming-mousepads', 'গেমিং-মাউসপ্যাড', NULL, NULL),
(28, 4, 8, 'Bed Liners', 'বিছানা লাইনার', 'bed-liners', 'বিছানা-লাইনার', NULL, NULL),
(29, 4, 8, 'Bedsheets', 'বিছানার চাদর', 'bedsheets', 'বিছানার-চাদর', NULL, NULL),
(30, 4, 8, 'Blankets', 'কম্বল', 'blankets', 'কম্বল', NULL, NULL),
(31, 4, 9, 'Tv Units', 'টিভি ইউনিট', 'tv-units', 'টিভি-ইউনিট', NULL, NULL),
(32, 4, 9, 'Dining Sets', 'ডাইনিং সেট', 'dining-sets', 'ডাইনিং-সেট', NULL, NULL),
(33, 4, 9, 'Coffee Tables', 'কফি টেবিল', 'coffee-tables', 'কফি-টেবিল', NULL, NULL),
(34, 4, 10, 'Lightings', 'আলো', 'lightings', 'আলো', NULL, NULL),
(35, 4, 10, 'Clocks', 'ঘড়ি', 'clocks', 'ঘড়ি', NULL, NULL),
(36, 4, 10, 'Wall Decoration', 'দেয়াল সজ্জা', 'wall-decoration', 'দেয়াল-সজ্জা', NULL, NULL),
(37, 1, 2, 'Mans Jeans', 'ম্যানস জিন্স', 'mans-jeans', 'ম্যানস-জিন্স', NULL, NULL),
(38, 1, 2, 'Mans Trousers', 'মানস ট্রাউজার্স', 'mans-trousers', 'মানস-ট্রাউজার্স', NULL, NULL),
(39, 1, 2, 'Mans Cargos', 'ম্যানস কার্গোস', 'mans-cargos', 'ম্যানস-কার্গোস', NULL, NULL),
(40, 1, 1, 'Mans Tshirt', 'মানুষ টিশার্ট', 'mans-tshirt', 'মানুষ-টিশার্ট', NULL, NULL),
(41, 1, 1, 'Mans Casual Shirts', 'ম্যানস ক্যাজুয়াল শার্ট', 'mans-casual-shirts', 'ম্যানস-ক্যাজুয়াল-শার্ট', NULL, NULL),
(42, 1, 1, 'Mans Kurtas', 'মানুষ কুর্তা', 'mans-kurtas', 'মানুষ-কুর্তা', NULL, NULL),
(43, 1, 3, 'Mans Sports Shoes', 'মানস ক্রীড়া জুতা', 'mans-sports-shoes', 'মানস-ক্রীড়া-জুতা', NULL, NULL),
(44, 1, 3, 'Mans Casual Shoes', 'ম্যানস ক্যাজুয়াল জুতা', 'mans-casual-shoes', 'ম্যানস-ক্যাজুয়াল-জুতা', NULL, NULL),
(45, 1, 3, 'Mans Formal Shoes', 'মানস ফরমাল জুতা', 'mans-formal-shoes', 'মানস-ফরমাল-জুতা', NULL, NULL),
(46, 1, 4, 'Women Flats', 'মহিলা ফ্ল্যাট', 'women-flats', 'মহিলা-ফ্ল্যাট', NULL, NULL),
(47, 1, 4, 'Women Heels', 'মহিলাদের হিল', 'women-heels', 'মহিলাদের-হিল', NULL, NULL),
(48, 1, 4, 'Woman Sheakers', 'মহিলা Sheakers', 'woman-sheakers', 'মহিলা-Sheakers', NULL, NULL),
(49, 2, 17, '4G Smartphone', '4G Smartphone', '4g-smartphone', '4G-Smartphone', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_seen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `last_seen`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user@gmail.com', '+88-016-2130-0099', '2022-10-13 18:23:47', NULL, '$2y$10$HwUUdSQ.8cAUINiVYaoY3OtHgVcQvzNh30/jBjwkau.4SrWMqCiwe', NULL, NULL, NULL, 'tJpAr6yHP1b03WAf9YMULM7VX3XgU0MDoJAS1FoZ5JZOVIbjlmyynSJsChvd', NULL, '2022_06_15_1441_arrow-1.jpg', '2022-06-03 10:58:44', '2022-10-13 12:23:47'),
(2, 'Jamil', 'jamil@gmail.com', '9809343433', '2022-10-10 15:11:30', NULL, '$2y$10$ENO/Web7OKu408BSpT693e2aH.cdwPTaTONboprK9MBXGNjbRpun2', NULL, NULL, NULL, NULL, NULL, '2022_06_15_1439_arrow-2.jpg', '2022-06-08 08:38:01', '2022-10-10 09:11:30'),
(3, 'Jamil', 'jamil@yahoo.com', '+88-015-2130-0099', '2022-10-11 12:24:58', NULL, '$2y$10$bYfh/nSw2MuzSoSxhPi.BeE483RLaevxWLUaDaFBEVOacPGpSxWFW', NULL, NULL, NULL, NULL, NULL, '2022_06_15_1437_arrow-3.jpg', '2022-06-15 06:39:57', '2022-10-11 06:24:58'),
(4, 'shuvo41453967', 'shuvo@gmail.com', '+88-016-2130-1122', '2022-10-08 17:22:06', NULL, '$2y$10$.pnkplgHn73EvRWsbKkJ4uza8q/7Uy2iSVZtcbodDg8WJIm/OC/Ey', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-08 11:14:48', '2022-10-08 11:22:06'),
(5, 'sakib69045368', 'sakib@gmail.com', '+88-015-2130-7744', '2022-10-08 17:16:17', NULL, '$2y$10$o/S8//mWIJtyK7HJFgw.5u0tqJ1vW5LqVUFaqDGBroZwjXI3tHALG', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-08 11:15:49', '2022-10-08 11:16:17'),
(6, 'ashraf86193935', 'ashraf@gmail.com', '+88-012-2130-0077', '2022-10-08 17:40:15', NULL, '$2y$10$.m0oDKv3.h6cWT9wANDptOfMcDE9jt4WnZoML1fZ1RS13BMn49M8S', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-08 11:34:43', '2022-10-08 11:40:15'),
(7, 'Aqib11934165', 'aqib@gmail.com', '+88-011-2130-6623', '2022-10-08 17:44:39', NULL, '$2y$10$GN2ApT.wT/ctj6LAaKh8QuD/CBsAuyzZaH/UkugmjyC.4kEgKJqZm', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-08 11:40:50', '2022-10-08 11:44:39'),
(8, 'sabuj78310019', 'sabuj@gmail.com', '+88-012-2130-8822', NULL, NULL, '$2y$10$BhQ9ymlKmU9NQiSBZwYlKOy19ph6T7PNdb/yoIIczjzDdrqxGCz8C', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-08 11:45:39', '2022-10-08 11:45:39'),
(9, 'safiiq38455525', 'safiq@outlook.com', '+88-011-2130-400', '2022-10-08 17:48:48', NULL, '$2y$10$/9cDIr87eOH/YOBHh0jcI.DLfnsjukk/8nJqFA624TPcdSXFcx7se', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-08 11:47:28', '2022-10-08 11:48:48'),
(10, 'Rahul', 'rahul@outlook.com', '+91-015-2130-4461', '2022-10-16 17:31:31', NULL, '$2y$10$tuVvP4exokEdPuXct/YIQ.kegXzAErZQ2HAM5LqCcwkHsv7lva.DW', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-16 11:31:19', '2022-10-16 11:31:31'),
(11, 'rubel', 'rubel@outlook.com', '+88-011-2130-230', '2022-10-16 17:35:13', NULL, '$2y$10$nEkmUxXZmwz5CPWt3kBOe.wK9bqf1S3cUJ5zoyPObVJt7fn6TVpZK', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-16 11:33:25', '2022-10-16 11:35:13'),
(12, 'sabbir', 'sabbir@gmail.com', '+88-010-2130-0099', '2022-10-16 17:35:49', NULL, '$2y$10$lcOJ/bCi1R2bw47aopLB.e6PPNh8XtZFOpWpiUwMsdzIcYjCJDzCC', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-16 11:35:47', '2022-10-16 11:35:49'),
(13, 'sabina', 'sabina@gmail.com', '+88-011-2130-500', '2022-10-16 17:36:46', NULL, '$2y$10$U8maf9cPLq4Asp.8X3e5uOdhBH1JXxbp4IiREo0IpRLuAf30sYrL6', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-16 11:36:32', '2022-10-16 11:36:46');

-- --------------------------------------------------------

--
-- Table structure for table `wish_lists`
--

CREATE TABLE `wish_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wish_lists`
--

INSERT INTO `wish_lists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(3, 1, 1, '2022-08-05 07:53:11', '2022-08-05 07:53:11'),
(4, 1, 2, '2022-08-05 07:53:14', '2022-08-05 07:53:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_post_categories`
--
ALTER TABLE `blog_post_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multi_images`
--
ALTER TABLE `multi_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_products`
--
ALTER TABLE `review_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `review_products_product_id_foreign` (`product_id`),
  ADD KEY `review_products_user_id_foreign` (`user_id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shipping_areas`
--
ALTER TABLE `shipping_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_districts`
--
ALTER TABLE `shipping_districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_divisions`
--
ALTER TABLE `shipping_divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog_post_categories`
--
ALTER TABLE `blog_post_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `multi_images`
--
ALTER TABLE `multi_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `review_products`
--
ALTER TABLE `review_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shipping_areas`
--
ALTER TABLE `shipping_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `shipping_districts`
--
ALTER TABLE `shipping_districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `shipping_divisions`
--
ALTER TABLE `shipping_divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `wish_lists`
--
ALTER TABLE `wish_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `review_products`
--
ALTER TABLE `review_products`
  ADD CONSTRAINT `review_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `review_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
