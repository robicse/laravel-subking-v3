-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 04, 2020 at 11:19 PM
-- Server version: 10.3.24-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `staritd_subking`
--

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `title`, `slug`, `education`, `experience`, `deadline`, `detail`, `created_at`, `updated_at`) VALUES
(1, 'Executive, Marketing', 'executive-marketing', 'Executive, Marketing', 'At Least 3 Years', '2020-09-30', '<h2><strong>Executive, Marketing</strong></h2>\r\n\r\n<h2>Subking</h2>\r\n\r\n<p><strong>Vacancy</strong></p>\r\n\r\n<p>01</p>\r\n\r\n<p><strong>Job Context</strong></p>\r\n\r\n<p>A Marketing Executive plays a key role in the success and failure of an organization through their feedback, personality and ability to develop relationships and earn the trust of customers for company`s image. He is the one who plays a pivotal role in achieving the sales targets and eventually generates revenue for the organization.</p>\r\n\r\n<p><strong>Job Description / Responsibility</strong></p>\r\n\r\n<ul>\r\n	<li>Responsible for achieving area sales objective through his Sales Officer&rsquo;s team.</li>\r\n	<li>People development.</li>\r\n	<li>Execution of marketing strategies.</li>\r\n	<li>New brand launch &amp; availability.</li>\r\n	<li>Customer relationship management.</li>\r\n	<li>Periodic feedback to reporting authorities and develop market intelligence.</li>\r\n</ul>\r\n\r\n<p><strong>Job Nature</strong></p>\r\n\r\n<p>Full-time</p>\r\n\r\n<p><strong>Educational Requirements</strong></p>\r\n\r\n<p>Pharmacist/Chemist /B.Sc/BSS (If have experience in pharmaceutical indenting than qualification is ISC also ok)</p>\r\n\r\n<p><strong>Experience Requirements</strong></p>\r\n\r\n<ul>\r\n	<li>At least 3 year(s)</li>\r\n	<li>The applicants should have experience in the following business area(s):<br />\r\n	Pharmaceuticals Raw Material, Coating Material, Packing Material Etc.</li>\r\n</ul>\r\n\r\n<p><strong>Job Requirements</strong></p>\r\n\r\n<ul>\r\n	<li>Age 25 to 40 year(s)</li>\r\n	<li>Having 3 years experience in the similar positions in a reputed pharmaceutical indenting company.</li>\r\n	<li>Excellent presentation and communication skill both in English and in Bengali</li>\r\n	<li>Analytical and planning skills</li>\r\n	<li>Maintain confidentiality in all area of work</li>\r\n</ul>\r\n\r\n<p><strong>Job Location</strong></p>\r\n\r\n<p>Dhaka</p>\r\n\r\n<p><strong>Salary Range</strong></p>\r\n\r\n<p>Negotiable</p>\r\n\r\n<p><strong>Apply Now</strong></p>\r\n\r\n<p>Send your CV &amp; Photo To: alexparera.starit@gmail.com</p>\r\n\r\n<p>Application Deadline :&nbsp;<strong>September 30, 2019</strong></p>', '2020-09-24 11:42:41', '2020-09-27 03:47:36');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Subs', 'subs', '2020-09-03-5f50d349f3472.png', '2020-08-26 05:47:21', '2020-09-03 21:28:10'),
(2, 'Burgers', 'burgers', '2020-09-03-5f50d862eda46.jpg', '2020-08-26 05:49:39', '2020-09-03 21:49:55'),
(3, 'Sides', 'sides', '2020-09-03-5f50d4188bfdf.png', '2020-09-03 21:31:37', '2020-09-03 21:31:37'),
(4, 'Kids menu', 'kids-menu', '2020-10-01-5f7503f962bf7.png', '2020-09-03 21:32:07', '2020-10-01 08:17:29'),
(5, 'MILK SHAKES/SMOOTHIES', 'milk-shakessmoothies', '2020-09-21-5f68e034abc90.jpg', '2020-09-22 03:17:40', '2020-09-22 03:17:40'),
(6, 'COFFEE AND TEA', 'coffee-and-tea', '2020-09-21-5f68e392de3f1.jpg', '2020-09-22 03:32:03', '2020-09-22 03:32:03');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `discount_type` enum('flat','percentage') COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `expired_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `discount_type`, `code`, `amount`, `expired_date`, `created_at`, `updated_at`) VALUES
(1, 'flat', '123', 5.00, '2020-11-20 00:00:00', '2020-09-01 11:13:43', '2020-09-01 11:13:43'),
(2, 'percentage', '456', 2.00, '2020-11-20 12:00:00', '2020-09-01 11:14:20', '2020-09-01 11:19:42');

-- --------------------------------------------------------

--
-- Table structure for table `email_clubs`
--

CREATE TABLE `email_clubs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_clubs`
--

INSERT INTO `email_clubs` (`id`, `email`, `country`, `created_at`, `updated_at`) VALUES
(1, 'robicse8@gmail.com', 'Bangladesh', '2020-09-06 06:24:41', '2020-09-06 06:24:41');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `side_category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_status` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `side_category_id`, `name`, `slug`, `price_status`, `price`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, 5, 'Burger Sauce', 'burger-sauce', 0, 0.00, '2020-09-01-5f4de7e1dee6f.png', 1, '2020-09-01 06:19:14', '2020-09-27 03:57:52'),
(4, 5, 'Truffle Aioli', 'truffle-aioli', 1, 2.00, '2020-09-01-5f4de80e1f61c.png', 1, '2020-09-01 06:19:58', '2020-09-01 06:19:58'),
(5, 2, 'White Cheddar', 'white-cheddar', 0, 0.00, '2020-09-01-5f4df0dd0a8a7.png', 1, '2020-09-01 06:57:33', '2020-09-01 06:57:33'),
(8, 5, 'Garlic Aioli', 'garlic-aioli', 0, 0.80, '2020-09-22-5f6901d2174e7.png', 1, '2020-09-22 05:41:06', '2020-09-22 05:41:06'),
(9, 5, 'Cheese Sauce', 'cheese-sauce', 0, 2.00, '2020-09-22-5f6901f56508f.png', 1, '2020-09-22 05:41:41', '2020-09-22 05:41:52'),
(10, 5, 'Bbq Sauce', 'bbq-sauce', 0, 0.30, '2020-09-22-5f690233bef5f.png', 1, '2020-09-22 05:42:43', '2020-09-22 05:42:43'),
(11, 5, 'Ketchup', 'ketchup', 0, 0.35, '2020-09-22-5f690269e4ce2.png', 1, '2020-09-22 05:43:38', '2020-09-22 05:43:38'),
(12, 5, 'Yellow Mustard', 'yellow-mustard', 0, 0.30, '2020-09-22-5f69028bf4025.png', 1, '2020-09-22 05:44:12', '2020-09-22 05:44:12'),
(13, 5, 'Mayonnaise', 'mayonnaise', 0, 0.35, '2020-09-22-5f6902d99235c.png', 1, '2020-09-22 05:44:51', '2020-09-22 05:45:29'),
(14, 5, 'Hot Sauce', 'hot-sauce', 0, 0.35, '2020-09-22-5f6902ee77d19.png', 1, '2020-09-22 05:45:50', '2020-09-22 05:45:50'),
(15, 5, 'Maple Syrup', 'maple-syrup', 0, 0.30, '2020-09-22-5f6903314df7e.png', 1, '2020-09-22 05:46:57', '2020-09-22 05:46:57'),
(16, 5, 'Honey Bbq', 'honey-bbq', 0, 0.30, '2020-09-22-5f690354a3d9a.png', 1, '2020-09-22 05:47:32', '2020-09-22 05:47:32'),
(17, 6, 'Bacon', 'bacon', 0, 2.00, '2020-09-22-5f6906ada61ae.png', 1, '2020-09-22 06:01:49', '2020-09-22 06:01:49'),
(18, 6, 'Grilled Mushrooms', 'grilled-mushrooms', 0, 1.50, '2020-09-22-5f6906c337eb4.png', 1, '2020-09-22 06:02:11', '2020-09-22 06:02:11'),
(19, 6, 'Hash Browns', 'hash-browns', 0, 0.99, '2020-09-22-5f691440686c6.png', 1, '2020-09-22 06:59:44', '2020-09-22 06:59:44'),
(20, 6, 'Chili', 'chili', 0, 0.99, '2020-09-22-5f69145e47ab8.png', 1, '2020-09-22 07:00:14', '2020-09-22 07:00:14'),
(21, 6, 'Fried Egg', 'fried-egg', 0, 0.99, '2020-09-22-5f69147cd1079.png', 1, '2020-09-22 07:00:44', '2020-09-22 07:00:44'),
(22, 6, 'Onion Ring', 'onion-ring', 0, 0.99, '2020-09-22-5f69149c72513.png', 1, '2020-09-22 07:01:16', '2020-09-22 07:01:16'),
(23, 6, 'Tomato-Bacon Jam', 'tomato-bacon-jam', 0, 0.99, '2020-09-22-5f6914b3000de.png', 1, '2020-09-22 07:01:39', '2020-09-22 07:01:39'),
(24, 6, 'Fried Avocado', 'fried-avocado', 0, 1.82, '2020-09-22-5f6914cb73d79.png', 1, '2020-09-22 07:02:03', '2020-09-22 07:02:44'),
(25, 6, 'Sauerkraut', 'sauerkraut', 0, 0.45, '2020-09-22-5f691533b9133.png', 1, '2020-09-22 07:03:47', '2020-09-22 07:03:47'),
(26, 6, 'Pickles', 'pickles', 0, 0.30, '2020-09-22-5f69154c69241.png', 1, '2020-09-22 07:04:12', '2020-09-22 07:04:12'),
(27, 6, 'Diced Onions', 'diced-onions', 0, 0.30, '2020-09-22-5f6915652498d.png', 1, '2020-09-22 07:04:37', '2020-09-22 07:04:37'),
(28, 6, 'Grilled Onions', 'grilled-onions', 0, 0.30, '2020-09-22-5f69157be2d65.png', 1, '2020-09-22 07:05:00', '2020-09-22 07:05:00'),
(29, 6, 'Relish', 'relish', 0, 0.30, '2020-09-22-5f69159e56b39.png', 1, '2020-09-22 07:05:34', '2020-09-22 07:05:34'),
(30, 6, 'Jalapeno Peppers', 'jalapeno-peppers', 0, 0.30, '2020-09-22-5f6915bf9dfc8.png', 1, '2020-09-22 07:06:07', '2020-09-22 07:06:07'),
(39, 1, 'Regular sub roll', 'regular-sub-roll', 0, 0.00, '2020-10-01-5f74ede48db84.png', 1, '2020-10-01 06:43:16', '2020-10-01 06:43:16'),
(40, 1, 'Wheat sub roll', 'wheat-sub-roll', 0, 0.00, '2020-10-01-5f74eebf5a5c7.png', 1, '2020-10-01 06:46:55', '2020-10-01 06:46:55'),
(41, 1, 'multigrain sub roll', 'multigrain-sub-roll', 0, 0.00, '2020-10-01-5f74ef3d17747.png', 1, '2020-10-01 06:49:01', '2020-10-01 06:49:01'),
(42, 2, 'Cheese', 'cheese', 0, 0.00, '2020-10-01-5f74f80d9f5aa.png', 1, '2020-10-01 07:26:37', '2020-10-01 07:26:37'),
(43, 2, 'lettuce', 'lettuce', 0, 0.00, '2020-10-01-5f74f8f76452e.png', 1, '2020-10-01 07:30:31', '2020-10-01 07:30:31'),
(44, 2, 'Tomato', 'tomato', 0, 0.00, '2020-10-01-5f74f9a9a8175.png', 1, '2020-10-01 07:33:29', '2020-10-01 07:33:29'),
(45, 2, 'Subking sauce', 'subking-sauce', 0, 0.00, '2020-10-01-5f74fa3c464b8.png', 1, '2020-10-01 07:35:56', '2020-10-01 07:35:56'),
(46, 3, 'Swiss', 'swiss', 0, 0.00, '2020-10-01-5f74fa9d02270.png', 1, '2020-10-01 07:37:33', '2020-10-01 07:37:33'),
(47, 3, 'Provolone', 'provolone', 0, 0.00, '2020-10-01-5f74faea33ffd.png', 1, '2020-10-01 07:38:50', '2020-10-01 07:38:50'),
(48, 3, 'American Cheese', 'american-cheese', 0, 0.00, '2020-10-01-5f74fb488be31.png', 1, '2020-10-01 07:40:24', '2020-10-01 07:40:24'),
(49, 4, 'American Cheese', 'american-cheese', 0, 1.00, '2020-10-01-5f74fc10a26a3.png', 1, '2020-10-01 07:43:44', '2020-10-01 07:51:41'),
(50, 4, 'Provalone', 'provalone', 0, 1.00, '2020-10-01-5f74fd05e8c59.png', 1, '2020-10-01 07:47:50', '2020-10-01 07:47:50'),
(51, 4, 'American Cheese', 'american-cheese', 0, 1.00, '2020-10-01-5f74fdb3613e7.png', 1, '2020-10-01 07:49:27', '2020-10-01 07:50:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_11_000000_create_roles_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_02_19_132349_create_categories_table', 1),
(4, '2020_02_19_145338_create_sub_categories_table', 1),
(5, '2020_08_13_100755_create_shop_location_table', 1),
(6, '2020_08_17_101444_create_side_categories_table', 1),
(7, '2020_08_22_113906_create_users_table', 1),
(8, '2020_08_22_162138_create_ingredients_table', 1),
(9, '2020_08_25_174847_create_products_table', 1),
(11, '2020_08_26_162242_create_product_singles_table', 2),
(12, '2020_08_26_170937_create_product_doubles_table', 3),
(14, '2020_08_27_113603_create_product_side_category_ingredients_table', 4),
(15, '2020_08_30_163959_create_orders_table', 5),
(16, '2020_08_30_164337_create_order_details_table', 6),
(17, '2020_09_01_162325_create_coupons_table', 7),
(18, '2020_09_03_171845_create_email_clubs_table', 8),
(19, '2020_09_23_105450_create_settings_table', 9),
(20, '2020_09_24_165007_create_careers_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_process` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_information` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_discount_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_discount_amount` double(8,2) NOT NULL DEFAULT 0.00,
  `total_amount` double(8,2) NOT NULL,
  `pay_online` int(11) NOT NULL DEFAULT 0,
  `calculated_statement_descriptor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_amount` double(8,2) DEFAULT NULL,
  `transaction_amount_refunded` double(8,2) DEFAULT NULL,
  `transaction_currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `first_name`, `last_name`, `email`, `phone`, `shipping_process`, `shipping_information`, `coupon_discount_type`, `coupon_discount_amount`, `total_amount`, `pay_online`, `calculated_statement_descriptor`, `transaction_amount`, `transaction_amount_refunded`, `transaction_currency`, `transaction_status`, `created_at`, `updated_at`) VALUES
(1, 'aa', 'ss', 'robeul.starit@gmail.com', '01700000000', '', '{\"delivery_time\":\"As Soon As Possible\",\"delivery_schedule_day\":\"\",\"delivery_schedule_time\":\"\",\"location_title\":\"Kallyanpur\",\"address\":\"Kallyanpur, Dhaka, Bangladesh\",\"phn_no\":\"01723144515\",\"lat\":\"23.7822036\",\"lng\":\"90.35953719999999\"}', NULL, 0.00, 16.00, 0, NULL, NULL, NULL, NULL, NULL, '2020-09-02 06:01:49', '2020-09-02 06:01:49'),
(2, 'aa', 'ss', 'robeul.starit@gmail.com', '01700000000', '', '{\"delivery_time\":\"As Soon As Possible\",\"delivery_schedule_day\":\"\",\"delivery_schedule_time\":\"\",\"location_title\":\"Kallyanpur\",\"address\":\"Kallyanpur, Dhaka, Bangladesh\",\"phn_no\":\"01723144515\",\"lat\":\"23.7822036\",\"lng\":\"90.35953719999999\"}', NULL, 0.00, 16.00, 0, NULL, NULL, NULL, NULL, NULL, '2020-09-02 06:05:17', '2020-09-02 06:05:17'),
(3, 'Robeul', 'Islam', 'robeul.starit@gmail.com', '01725930111', '', '{\"delivery_time\":\"Customized Time\",\"delivery_schedule_day\":\"Tomorrow\",\"delivery_schedule_time\":\"02:00PM\",\"location_title\":\"Kallyanpur\",\"address\":\"Kallyanpur, Dhaka, Bangladesh\",\"phn_no\":\"01723144515\",\"lat\":\"23.7822036\",\"lng\":\"90.35953719999999\"}', NULL, 0.00, 13.00, 1, 'Stripe', 1300.00, 0.00, 'usd', 'succeeded', '2020-09-02 06:48:26', '2020-09-02 06:48:27'),
(4, 'Robeul', 'Islam', 'robeul.starit@gmail.com', '01725930111', 'picked', '{\"delivery_time\":\"As Soon As Possible\",\"delivery_schedule_day\":\"\",\"delivery_schedule_time\":\"\",\"location_title\":\"Kallyanpur\",\"address\":\"Kallyanpur, Dhaka, Bangladesh\",\"phn_no\":\"01723144515\",\"lat\":\"23.7822036\",\"lng\":\"90.35953719999999\"}', NULL, 0.00, 14.00, 1, 'Stripe', 14.00, 0.00, 'usd', 'succeeded', '2020-09-02 10:38:12', '2020-09-02 10:38:16'),
(5, 'bhuban', 'bbn', 'a@a.com', '01771449900', 'picked', '{\"delivery_time\":\"Customized Time\",\"delivery_schedule_day\":\"Today\",\"delivery_schedule_time\":\"02:00PM\",\"location_title\":\"Kallyanpur\",\"address\":\"Kallyanpur, Dhaka, Bangladesh\",\"phn_no\":\"01723144515\",\"lat\":\"23.7822036\",\"lng\":\"90.35953719999999\"}', NULL, 0.00, 32.00, 1, 'Stripe', 32.00, 0.00, 'usd', 'succeeded', '2020-09-02 21:28:41', '2020-09-02 21:28:42'),
(6, 'robi', 'hasan', 'robicse8@gmail.com', '01725930131', 'picked', '{\"delivery_time\":\"As Soon As Possible\",\"delivery_schedule_day\":\"\",\"delivery_schedule_time\":\"\",\"location_title\":\"Shymoli\",\"address\":\"Shyamoli, Dhaka, Bangladesh\",\"phn_no\":\"01723144516\",\"lat\":\"23.771007\",\"lng\":\"90.3639255\"}', NULL, 0.00, 14.00, 1, 'Stripe', 14.00, 0.00, 'usd', 'succeeded', '2020-09-03 03:57:07', '2020-09-03 03:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `ingredient_ids` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `price`, `ingredient_ids`, `created_at`, `updated_at`) VALUES
(1, 1, 18, 1, 10.00, '[\"Potato Bun\",\"Green Style\",\"Extra American\",\"Burgerfi Sauce\",\"Truffle Aioli\"]', '2020-09-02 06:01:49', '2020-09-02 06:01:49'),
(2, 2, 18, 1, 10.00, '[\"Potato Bun\",\"Green Style\",\"Extra American\",\"Burgerfi Sauce\",\"Truffle Aioli\"]', '2020-09-02 06:05:17', '2020-09-02 06:05:17'),
(3, 3, 18, 1, 10.00, '[\"Potato Bun\",\"Green Style\",\"Burgerfi Sauce\",\"Truffle Aioli\"]', '2020-09-02 06:48:26', '2020-09-02 06:48:26'),
(4, 4, 16, 1, 14.00, '[\"Burgerfi Sauce\"]', '2020-09-02 10:38:12', '2020-09-02 10:38:12'),
(5, 5, 18, 2, 10.00, '[\"Potato Bun\",\"Green Style\",\"Extra American\",\"Burgerfi Sauce\",\"Truffle Aioli\"]', '2020-09-02 21:28:41', '2020-09-02 21:28:41'),
(6, 6, 16, 1, 14.00, '[\"Burgerfi Sauce\"]', '2020-09-03 03:57:07', '2020-09-03 03:57:07');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `single` int(11) NOT NULL DEFAULT 0,
  `double` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `category_id`, `sub_category_id`, `price`, `image`, `single`, `double`, `status`, `created_at`, `updated_at`) VALUES
(16, 'EATING REAL PAIRING', 'eating-real-pairing', 2, NULL, 10.00, '2020-09-03-5f50d830d92a7.jpg', 0, 0, 1, '2020-09-01 06:21:31', '2020-09-03 21:49:05'),
(17, 'VEGEFI BURGER', 'vegefi-burger', 2, NULL, 0.00, '2020-09-01-5f4de95389e64.jpg', 1, 1, 1, '2020-09-01 06:25:23', '2020-09-01 06:25:23'),
(18, 'Sub Hot Product 1', 'sub-hot-product-1', 1, 1, 14.00, '2020-09-01-5f4dea19ef4c6.jpg', 0, 0, 1, '2020-09-01 06:28:42', '2020-09-01 06:28:42'),
(19, 'Cold Sub Product 1', 'cold-sub-product-1', 1, 2, 15.00, '2020-09-01-5f4dea968a940.jpg', 0, 0, 1, '2020-09-01 06:30:46', '2020-09-01 06:30:46'),
(20, 'HAND-CUT FRIES (REGULAR)', 'hand-cut-fries-regular', 3, NULL, 4.57, '2020-09-03-5f50d960e884f.png', 0, 0, 1, '2020-09-03 21:54:09', '2020-09-03 21:54:09'),
(21, 'KIDS BURGER MEAL', 'kids-burger-meal', 4, NULL, 7.97, '2020-09-03-5f50d9da3e058.png', 0, 0, 1, '2020-09-03 21:56:10', '2020-09-03 21:56:10'),
(22, 'SUBKING STEAK SUB #1', 'subking-steak-sub-1', 1, 1, 15.00, '2020-09-19-5f6519e04ff08.jpg', 0, 0, 1, '2020-09-19 06:34:40', '2020-09-19 06:34:40'),
(23, 'SUBKING CHOPPED STEAK #2 (mothered in mozzarella cheese, mushrooms, onions, peppers.)', 'subking-chopped-steak-2-mothered-in-mozzarella-cheese-mushrooms-onions-peppers', 1, 1, 9.99, '2020-09-19-5f651ab8e4bbb.jpg', 0, 0, 1, '2020-09-19 06:38:17', '2020-09-19 06:38:17'),
(24, 'THE ITALIAN SUB #3( Grilled with 4 different meats smothered in mozzarella cheese.)', 'the-italian-sub-3-grilled-with-4-different-meats-smothered-in-mozzarella-cheese', 1, 1, 9.99, '2020-09-19-5f651c4d34994.jpg', 0, 0, 1, '2020-09-19 06:45:02', '2020-09-19 06:45:02'),
(25, 'ITALIAN KING MEAT BALL SUB #4 (King Meatballs With Marinara Sauce, mozzarella Cheese)', 'italian-king-meat-ball-sub-4-king-meatballs-with-marinara-sauce-mozzarella-cheese', 1, 1, 9.99, '2020-09-19-5f651c8edd4f7.jpg', 0, 0, 1, '2020-09-19 06:46:07', '2020-09-19 06:46:07'),
(26, 'THE CUBAN KING SUB #5 ( Marinated Pork, Sliced ham, Swiss Cheese, Mayonnaise, Mustard, Pickles)', 'the-cuban-king-sub-5-marinated-pork-sliced-ham-swiss-cheese-mayonnaise-mustard-pickles', 1, 1, 8.99, '2020-09-19-5f651d11829e7.jpg', 0, 0, 1, '2020-09-19 06:48:17', '2020-09-19 06:48:17'),
(27, 'GRILLED CHICKEN SUB #6 ( Chunky fresh chicken, smothered with caramelized onions Iceberg lettuce/ Mayo/ Vinaigrette)', 'grilled-chicken-sub-6-chunky-fresh-chicken-smothered-with-caramelized-onions-iceberg-lettuce-mayo-vinaigrette', 1, 1, 8.99, '2020-09-19-5f651dbec298e.jpg', 0, 0, 1, '2020-09-19 06:51:10', '2020-09-19 06:51:10'),
(28, 'TURKEY CLUB #7 ( Turkey, bacon, lettuce and tomato)', 'turkey-club-7-turkey-bacon-lettuce-and-tomato', 1, 1, 8.99, '2020-09-19-5f651e31a4c4f.png', 0, 0, 1, '2020-09-19 06:53:06', '2020-09-19 06:53:06'),
(29, 'SUBKING REUBEN #8 (Grilled thick Pastrami, smothered in swiss topped with sauerkraut served on rye bread)', 'subking-reuben-8-grilled-thick-pastrami-smothered-in-swiss-topped-with-sauerkraut-served-on-rye-bread', 1, 1, 9.99, '2020-09-19-5f651e6738bb5.jpg', 0, 0, 1, '2020-09-19 06:53:59', '2020-09-19 06:53:59'),
(30, 'PASTRAMI SUB #9 ( Served with Pastrami Brisket melted provolone cheese)', 'pastrami-sub-9-served-with-pastrami-brisket-melted-provolone-cheese', 1, 1, 9.99, '2020-09-19-5f651e9981073.jpg', 0, 0, 1, '2020-09-19 06:54:49', '2020-09-19 06:54:49'),
(31, 'ROAST BEEF & SWISS MELT #10', 'roast-beef-swiss-melt-10', 1, 1, 8.99, '2020-09-19-5f651edf06c98.jpg', 0, 0, 1, '2020-09-19 06:55:59', '2020-09-19 06:55:59'),
(32, 'HAM AND CHEESE MELT till #11 (Garlic grilled subroll boars head ham with tons of melted cheese)', 'ham-and-cheese-melt-till-11-garlic-grilled-subroll-boars-head-ham-with-tons-of-melted-cheese', 1, 1, 8.99, '2020-09-19-5f651f1d17c6a.jpg', 0, 0, 1, '2020-09-19 06:57:01', '2020-09-19 06:57:01'),
(33, 'ALL AMERICAN ROAST BEEF AND SWISS SUB #21 (comes with Boars Head roast beef, Swiss cheese, Shredded iceberg lettuce olive oil vinegar and mayo)', 'all-american-roast-beef-and-swiss-sub-21-comes-with-boars-head-roast-beef-swiss-cheese-shredded-iceberg-lettuce-olive-oil-vinegar-and-mayo', 1, 2, 8.99, '2020-09-19-5f651faab09b3.jpg', 0, 0, 1, '2020-09-19 06:59:22', '2020-09-19 06:59:22'),
(34, 'THE ITALIAN SUB #22 ( salami, mortadella, capicola and ham along with provolone, tomato, onion, sour pickle, green pepper, Greek olives)', 'the-italian-sub-22-salami-mortadella-capicola-and-ham-along-with-provolone-tomato-onion-sour-pickle-green-pepper-greek-olives', 1, 2, 8.99, '2020-09-19-5f652000d6c53.jpeg', 0, 0, 1, '2020-09-19 07:00:49', '2020-09-19 07:00:49'),
(35, 'CHICKEN SALAD SUB #23 (Made from our very own fresh grilled chicken, the best chicken salad your going to find on the market)', 'chicken-salad-sub-23-made-from-our-very-own-fresh-grilled-chicken-the-best-chicken-salad-your-going-to-find-on-the-market', 1, 2, 8.99, '2020-09-19-5f652048c5137.jpeg', 0, 0, 1, '2020-09-19 07:02:01', '2020-09-19 07:02:01'),
(36, 'TUNA FISH SALAD SUB #24 (Made with the best ingredients)', 'tuna-fish-salad-sub-24-made-with-the-best-ingredients', 1, 2, 8.99, '2020-09-19-5f6520a9a4d78.jpg', 0, 0, 1, '2020-09-19 07:03:38', '2020-09-19 07:03:38'),
(37, 'SALAD BAR SUB #25 ( Your choice of meat, your choice of toppings. Caesar Salad with chicken, Chopped Salad with Chicken)', 'salad-bar-sub-25-your-choice-of-meat-your-choice-of-toppings-caesar-salad-with-chicken-chopped-salad-with-chicken', 1, 2, 7.99, '2020-09-19-5f65225882f78.jpg', 0, 0, 1, '2020-09-19 07:10:48', '2020-09-19 07:10:48'),
(38, 'JUMBO SHRIMP SALAD #26 (Caesar Salad or Grilled Chopped salad with monster shrimp)', 'jumbo-shrimp-salad-26-caesar-salad-or-grilled-chopped-salad-with-monster-shrimp', 1, 2, 15.00, '2020-09-19-5f65231c2a92c.jpg', 0, 0, 1, '2020-09-19 07:14:04', '2020-09-19 07:14:04'),
(39, 'SHRIMP KING ROLL #27 (Comes with Sweet & Sour and Horseradish sauce)', 'shrimp-king-roll-27-comes-with-sweet-sour-and-horseradish-sauce', 1, 2, 8.00, '2020-09-19-5f65237d15886.jpg', 0, 0, 1, '2020-09-19 07:15:41', '2020-09-19 07:15:41'),
(40, 'SUBKING SPECIAL CHILI (Famous award winning special Chili, the best you’ll ever have.)', 'subking-special-chili-famous-award-winning-special-chili-the-best-youll-ever-have', 1, 2, 9.99, '2020-09-19-5f6523e7cebd4.jpg', 0, 0, 1, '2020-09-19 07:17:27', '2020-09-19 07:17:27'),
(41, 'Steak Fries', 'steak-fries', 1, 2, 3.00, '2020-09-19-5f65243503ae2.jpg', 0, 0, 1, '2020-09-19 07:18:45', '2020-09-19 07:18:45'),
(42, 'Sweet Potato Steak Fries', 'sweet-potato-steak-fries', 1, 1, 3.00, '2020-09-19-5f652473a9094.jpg', 0, 0, 1, '2020-09-19 07:19:47', '2020-09-19 07:19:47'),
(43, 'Subking Cole Slaw, the best', 'subking-cole-slaw-the-best', 1, 2, 3.00, '2020-09-19-5f652515bff0b.jpg', 0, 0, 1, '2020-09-19 07:22:29', '2020-09-19 07:22:29'),
(44, 'Subking Potato Salad, the best', 'subking-potato-salad-the-best', 1, 2, 3.00, '2020-09-19-5f6525501def7.jpg', 0, 0, 1, '2020-09-19 07:23:28', '2020-09-19 07:23:28'),
(45, 'Subking Onion Rings, the best', 'subking-onion-rings-the-best', 1, 2, 3.00, '2020-09-19-5f65258a3bc8a.jpg', 0, 0, 1, '2020-09-19 07:24:26', '2020-09-19 07:24:26'),
(46, 'Fried Pickles', 'fried-pickles', 3, NULL, 1.00, '2020-09-19-5f6528c43f35b.jpg', 0, 0, 1, '2020-09-19 07:38:12', '2020-09-19 07:38:12'),
(47, 'Homemade Fries', 'homemade-fries', 3, NULL, 1.00, '2020-09-19-5f652945af7e8.jpg', 0, 0, 1, '2020-09-19 07:40:21', '2020-09-19 07:40:21'),
(48, 'Onion Rings', 'onion-rings', 3, NULL, 1.00, '2020-09-19-5f6529a9a2c90.jpg', 0, 0, 1, '2020-09-19 07:42:01', '2020-09-19 07:42:01'),
(49, 'Sweet Potato Fries', 'sweet-potato-fries', 3, NULL, 1.00, '2020-09-19-5f652a1ee4eca.jpg', 0, 0, 1, '2020-09-19 07:43:59', '2020-09-19 07:43:59'),
(50, 'BURGER KING #18 ( Famous Fat Boy Burger, the baddest burger in town, let us show you how to make a whopper. comes with steak fries)', 'burger-king-18-famous-fat-boy-burger-the-baddest-burger-in-town-let-us-show-you-how-to-make-a-whopper-comes-with-steak-fries', 2, NULL, 12.00, '2020-09-19-5f65346fecb7e.jpg', 0, 0, 1, '2020-09-19 08:28:00', '2020-09-19 08:28:00'),
(51, 'BURGER BOMB SUB #20 ( Chunky Chopped Burger smothered in onions, mushrooms and I lots of melted cheese)', 'burger-bomb-sub-20-chunky-chopped-burger-smothered-in-onions-mushrooms-and-i-lots-of-melted-cheese', 2, NULL, 8.99, '2020-09-19-5f653500989c9.jpg', 0, 0, 1, '2020-09-19 08:30:24', '2020-09-19 08:30:24'),
(52, 'Choice of Entree, Side + Drink', 'choice-of-entree-side-drink', 4, NULL, 16.99, '2020-09-19-5f653549c8858.jpg', 0, 0, 1, '2020-09-19 08:31:37', '2020-09-19 08:31:37'),
(53, 'Banana', 'banana', 5, NULL, 5.99, '2020-09-21-5f68e15408e1e.jpg', 0, 0, 1, '2020-09-22 03:22:28', '2020-09-22 03:22:28'),
(54, 'Strawberry', 'strawberry', 5, NULL, 1.00, '2020-09-21-5f68e28b61aab.jpg', 0, 0, 1, '2020-09-22 03:27:40', '2020-09-22 03:27:40'),
(55, 'Ground Coffee', 'ground-coffee', 6, NULL, 1.00, '2020-09-21-5f68e43d6ab1e.jpg', 0, 0, 1, '2020-09-22 03:34:53', '2020-09-22 03:34:53'),
(56, 'Holiday Coffees', 'holiday-coffees', 6, NULL, 1.00, '2020-09-21-5f68e4a35f77a.jpg', 0, 0, 1, '2020-09-22 03:36:35', '2020-09-22 03:36:35'),
(57, 'Iced Teas', 'iced-teas', 6, NULL, 1.00, '2020-09-21-5f68e4f93780e.jpg', 0, 0, 1, '2020-09-22 03:38:01', '2020-09-22 03:38:01'),
(58, 'Tea Lattes', 'tea-lattes', 6, NULL, 1.00, '2020-09-21-5f68e554363ab.jpg', 0, 0, 1, '2020-09-22 03:39:32', '2020-09-22 03:39:32'),
(59, 'test', 'test', 2, NULL, 100.00, '2020-09-24-5f6c61db5dd80.jpg', 0, 0, 1, '2020-09-24 19:07:39', '2020-09-24 19:07:39'),
(60, 'asdfasd', 'asdfasd', 2, NULL, 500.00, '2020-10-05-5f7ac4fc59a99.jpg', 0, 0, 1, '2020-10-05 17:02:20', '2020-10-05 17:02:20');

-- --------------------------------------------------------

--
-- Table structure for table `product_doubles`
--

CREATE TABLE `product_doubles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `double_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `double_price` double(8,2) DEFAULT NULL,
  `double_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `double_active_inactive` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_doubles`
--

INSERT INTO `product_doubles` (`id`, `product_id`, `double_name`, `double_price`, `double_image`, `double_active_inactive`, `created_at`, `updated_at`) VALUES
(1, 19, 'Double Burger', 8.00, '2020-09-01-5f4de95415967.png', 1, '2020-09-01 06:25:24', '2020-09-01 06:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `product_side_category_ingredients`
--

CREATE TABLE `product_side_category_ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `side_category_id` bigint(20) UNSIGNED NOT NULL,
  `ingredient_ids` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_side_category_ingredients`
--

INSERT INTO `product_side_category_ingredients` (`id`, `product_id`, `side_category_id`, `ingredient_ids`, `created_at`, `updated_at`) VALUES
(1, 16, 1, '1,2', '2020-09-01 06:22:03', '2020-09-01 06:22:03'),
(2, 16, 5, '3,4', '2020-09-01 06:22:13', '2020-09-01 06:22:13'),
(3, 17, 1, '2', '2020-09-01 06:25:46', '2020-09-01 06:25:46'),
(4, 17, 5, '4', '2020-09-01 06:26:01', '2020-09-01 06:26:01'),
(5, 18, 5, '3', '2020-09-01 06:29:12', '2020-09-01 06:29:12');

-- --------------------------------------------------------

--
-- Table structure for table `product_singles`
--

CREATE TABLE `product_singles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `single_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `single_price` double(8,2) DEFAULT NULL,
  `single_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `single_active_inactive` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_singles`
--

INSERT INTO `product_singles` (`id`, `product_id`, `single_name`, `single_price`, `single_image`, `single_active_inactive`, `created_at`, `updated_at`) VALUES
(1, 19, 'Single Burger', 6.00, '2020-09-01-5f4de953ccc10.png', 1, '2020-09-01 06:25:24', '2020-09-01 06:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2019-09-05 05:13:00', '2019-09-05 05:13:00'),
(2, 'User', '2019-09-05 05:13:00', '2019-09-05 05:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `created_at`, `updated_at`) VALUES
(2, '2020-09-23-5f6ae767233ae.png', '2020-09-23 16:12:55', '2020-09-23 16:12:55');

-- --------------------------------------------------------

--
-- Table structure for table `shop_location`
--

CREATE TABLE `shop_location` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phn_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_close_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pick_up` int(11) NOT NULL,
  `delivery` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_location`
--

INSERT INTO `shop_location` (`id`, `location_title`, `address`, `phn_no`, `lat`, `lng`, `open_close_time`, `pick_up`, `delivery`, `created_at`, `updated_at`) VALUES
(1, 'CU-1 Palmetto Bay', 'Palmetto Bay, FL, USA', '01723144515', '25.6217715', '-80.3247748', '10:00am-09:00pm', 1, 1, '2020-09-22 15:51:28', '2020-09-22 15:51:28');

-- --------------------------------------------------------

--
-- Table structure for table `side_categories`
--

CREATE TABLE `side_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `side_categories`
--

INSERT INTO `side_categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'ON A', 'on-a', '2020-08-27 07:04:36', '2020-08-30 06:41:25'),
(2, 'INCLUDED TOPPINGS', 'included-toppings', '2020-08-30 06:41:44', '2020-08-30 06:41:44'),
(3, 'SUBSTITUTE', 'substitute', '2020-08-30 06:41:58', '2020-08-30 06:41:58'),
(4, 'ADD CHEESE', 'add-cheese', '2020-08-30 06:42:18', '2020-08-30 06:42:18'),
(5, 'SAUCES', 'sauces', '2020-08-30 06:42:30', '2020-08-30 06:42:30'),
(6, 'SUBKING TOPPINGS', 'subking-toppings', '2020-09-22 06:00:53', '2020-09-22 09:21:37');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hot Sub', 'hot-sub', '2020-09-03-5f50d676d1d32.png', '2020-08-29 05:25:12', '2020-09-03 21:41:43'),
(2, 1, 'Cold Sub', 'cold-sub', '2020-09-03-5f50d665a7609.png', '2020-08-29 06:12:50', '2020-09-03 21:41:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 2,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'default.png',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `mobile_number`, `email_verified_at`, `password`, `image`, `address`, `lat`, `lng`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@starit.com', '01711111111', NULL, '$2y$10$AIJzIfv.YxGRFmuWDnj.Ie5IX5YoKmb8q0qOvtswybGYRSqcJtS2e', 'default.png', NULL, NULL, NULL, NULL, '2019-09-05 05:13:00', '2019-09-05 05:13:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
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
-- Indexes for table `email_clubs`
--
ALTER TABLE `email_clubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingredients_side_category_id_foreign` (`side_category_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_doubles`
--
ALTER TABLE `product_doubles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_doubles_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_side_category_ingredients`
--
ALTER TABLE `product_side_category_ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_side_category_ingredients_product_id_foreign` (`product_id`),
  ADD KEY `product_side_category_ingredients_side_category_id_foreign` (`side_category_id`);

--
-- Indexes for table `product_singles`
--
ALTER TABLE `product_singles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_singles_product_id_foreign` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_location`
--
ALTER TABLE `shop_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `side_categories`
--
ALTER TABLE `side_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_categories_slug_unique` (`slug`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_number_unique` (`mobile_number`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `email_clubs`
--
ALTER TABLE `email_clubs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `product_doubles`
--
ALTER TABLE `product_doubles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_side_category_ingredients`
--
ALTER TABLE `product_side_category_ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_singles`
--
ALTER TABLE `product_singles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shop_location`
--
ALTER TABLE `shop_location`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `side_categories`
--
ALTER TABLE `side_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_side_category_id_foreign` FOREIGN KEY (`side_category_id`) REFERENCES `side_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_doubles`
--
ALTER TABLE `product_doubles`
  ADD CONSTRAINT `product_doubles_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_side_category_ingredients`
--
ALTER TABLE `product_side_category_ingredients`
  ADD CONSTRAINT `product_side_category_ingredients_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_side_category_ingredients_side_category_id_foreign` FOREIGN KEY (`side_category_id`) REFERENCES `side_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_singles`
--
ALTER TABLE `product_singles`
  ADD CONSTRAINT `product_singles_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
