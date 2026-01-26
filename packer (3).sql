-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2026 at 01:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `packer`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `zone_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `area_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `merchant_id` bigint(20) UNSIGNED NOT NULL,
  `booking_operator_id` bigint(20) UNSIGNED DEFAULT NULL,
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` varchar(255) DEFAULT NULL,
  `product_type_id` bigint(20) UNSIGNED NOT NULL,
  `delivery_type_id` bigint(20) UNSIGNED NOT NULL,
  `pathao_consignment_ids` varchar(255) DEFAULT NULL,
  `recipient_name` varchar(255) NOT NULL,
  `recipient_phone` varchar(255) NOT NULL,
  `recipient_secondary_phone` varchar(255) DEFAULT NULL,
  `recipient_address` text NOT NULL,
  `courier_status` varchar(255) DEFAULT NULL,
  `courier_service` varchar(255) DEFAULT NULL,
  `amount_to_collect` varchar(255) DEFAULT NULL,
  `item_description` varchar(255) DEFAULT NULL,
  `order_amount` varchar(225) DEFAULT NULL,
  `total_weight` varchar(255) DEFAULT NULL,
  `total_fee` varchar(255) DEFAULT NULL,
  `discount_amount` varchar(255) DEFAULT NULL,
  `cod_fee` varchar(255) DEFAULT NULL,
  `delivery_fee` varchar(255) DEFAULT NULL,
  `city_name` varchar(225) DEFAULT NULL,
  `zone_name` varchar(255) DEFAULT NULL,
  `area_name` varchar(255) DEFAULT NULL,
  `order_status` varchar(255) DEFAULT NULL,
  `store_name` varchar(255) DEFAULT NULL,
  `order_type` varchar(255) DEFAULT NULL,
  `item_type` varchar(255) DEFAULT NULL,
  `item_quantity` varchar(255) DEFAULT NULL,
  `is_incomplete` varchar(255) DEFAULT NULL,
  `cash_on_delivery` varchar(255) DEFAULT NULL,
  `short_link` varchar(255) DEFAULT NULL,
  `billing_status` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '''0''',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `area_id` bigint(20) UNSIGNED DEFAULT NULL,
  `zone_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `order_id`, `merchant_id`, `booking_operator_id`, `store_id`, `invoice_id`, `product_type_id`, `delivery_type_id`, `pathao_consignment_ids`, `recipient_name`, `recipient_phone`, `recipient_secondary_phone`, `recipient_address`, `courier_status`, `courier_service`, `amount_to_collect`, `item_description`, `order_amount`, `total_weight`, `total_fee`, `discount_amount`, `cod_fee`, `delivery_fee`, `city_name`, `zone_name`, `area_name`, `order_status`, `store_name`, `order_type`, `item_type`, `item_quantity`, `is_incomplete`, `cash_on_delivery`, `short_link`, `billing_status`, `status`, `created_at`, `updated_at`, `area_id`, `zone_id`, `city_id`) VALUES
(1, '20251212143606JQJJFS', 1, 1, 1, NULL, 2, 48, 'DR121225WAR4R7', 'Jasmin', '01516173275', NULL, 'House No - 06, Road No - 01', 'Delivered', 'pathao', '2001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-12-12 08:36:06', '2025-12-25 10:33:10', 15872, 405, 2),
(2, '20251212155722TZRO7O', 1, 1, 1, NULL, 2, 48, 'DR121225RHBNE4', 'Jasmin', '01516173275', NULL, 'House No - 06, Road No - 01', 'Pickup Cancel', 'pathao', '2000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-12-12 09:57:22', '2025-12-25 10:33:11', 15872, 405, 2),
(3, 'ORD_693d523a5b0b0', 1, 1, 1, NULL, 2, 48, 'DR131225FE64GA', 'Faisal A Salam', '01312361494', NULL, 'House no. 6, Chawkbazar', 'Pickup Cancel', 'pathao', '2000', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2025-12-13 05:47:06', '2025-12-25 10:33:12', NULL, 78, 2),
(4, 'ORD_693db1485e70f', 1, 1, 1, NULL, 2, 48, 'DR131225KWMFRR', 'Faisal', '01312361494', NULL, 'House no. 6, 2nd Road', 'Pickup Cancel', 'pathao', '1000', 'This is a note', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2025-12-13 12:32:40', '2025-12-25 10:33:13', NULL, 612, 3),
(5, 'ORD_693db14880559', 1, 1, 1, NULL, 2, 48, 'DR131225HCHCRB', 'Jasmin', '01312361496', NULL, 'House no. 6, 2nd Road', 'Pickup Cancel', 'pathao', '3000', 'This is a note', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2025-12-13 12:32:40', '2025-12-25 10:33:14', NULL, 73, 2),
(6, 'ORD_693db1488535c', 1, 1, 1, NULL, 2, 48, 'DR131225EN6A5Z', 'Farzana', '01312361497', NULL, 'House no. 6, 2nd Road', 'Pickup Cancel', 'pathao', '4000', 'This is a note', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2025-12-13 12:32:40', '2025-12-25 10:33:14', NULL, 1765, 1),
(7, 'ORD_693eda33beb38', 1, 1, 1, NULL, 2, 48, 'DR1412257FPDDT', 'Faisal', '01312361494', NULL, 'House no. 6, Chawkbazar', 'Pickup Cancel', 'pathao', '2000', 'This is a note', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2025-12-14 09:39:31', '2025-12-25 10:33:15', NULL, 1538, 1),
(8, 'ORD_693eda341cd2d', 1, 1, 1, NULL, 2, 48, 'DR141225CRLN7F', 'Farhad', '01312361478', NULL, 'House no. 10, Chawkbazar', 'Pickup Cancel', 'pathao', '3000', 'This is a note', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2025-12-14 09:39:32', '2025-12-25 10:33:16', NULL, 79, 2),
(9, 'ORD_693eda34215cb', 1, 1, 1, NULL, 2, 48, 'DR141225FPBPCH', 'Fahim', '01312361498', NULL, 'Road no. 2, House 12', 'Pickup Cancel', 'pathao', '4000', 'This is a note', '4000', '1', '185', NULL, '40', '145', 'Sylhet', 'Kajal Shah', NULL, 'Pickup Cancel', 'rayluxeo', 'Delivery', 'Parcel', '1', '0', 'Yes', NULL, 'Unpaid', '1', '2025-12-14 09:39:32', '2026-01-10 00:14:27', NULL, 2651, 3),
(10, 'ORD_693eda34250ac', 1, 1, 1, NULL, 2, 48, 'DR141225VLVFKP', 'Fatema', '01312361494', NULL, 'Road no. 12, House 20, Section 2B', 'Returned', 'pathao', '5000', 'This is a note', '5000', '1', '195', NULL, '50', '145', 'Bogra', 'Shantaher', NULL, 'Pickup Cancel', 'rayluxeo', 'Delivery', 'Parcel', '2', '0', 'Yes', NULL, 'Unpaid', '1', '2025-12-14 09:39:32', '2026-01-10 00:14:00', NULL, 757, 9),
(11, 'ORD_693edc3b7b499', 1, 1, 1, NULL, 2, 48, 'DR1412258M7R3L', 'Jasmin', '01312361494', NULL, 'House no. 6, Chawkbazar', 'Returned', 'pathao', '4000', 'This is a note', '4000', '2', '210', NULL, '40', '170', 'Dhaka', 'Ashulia Bazar', NULL, 'Pickup Cancel', 'rayluxeo', 'Delivery', 'Parcel', '2', '0', 'Yes', NULL, 'Unpaid', '1', '2025-12-14 09:48:11', '2026-01-09 23:59:47', NULL, 1538, 1),
(12, 'ORD_693edc3b87212', 1, 1, 1, NULL, 2, 48, 'DR141225JFCHKE', 'Farjana', '01312361494', NULL, 'Road no. 12, House 20, Section 2B', 'Pickup Cancel', 'pathao', '1000', 'This is a note', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2025-12-14 09:48:11', '2025-12-31 09:30:02', NULL, 757, 9),
(13, '20251215070150IIYFUL', 1, 1, 1, NULL, 2, 48, 'DR0801266LFWT9', 'Jasmine', '01727656531', '01727656531', 'House No - 06, Road No - 01', 'pending', 'pathao', '2000', 'this is an item', '2000', '1', '150', '0', '20', '130', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Unpaid', '0', '2025-12-15 01:01:50', '2026-01-08 03:55:10', 4161, 79, 2),
(14, '20251216131103BCYUII', 5, 5, 5, NULL, 2, 48, 'DR271225VU5G66', 'Jasmine', '01312361494', '01727656532', 'House No - 06, Road No - 01', 'Delivered', 'pathao', '2000', 'These are item description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-12-16 07:11:03', '2025-12-16 07:11:03', 5435, 69, 2),
(15, '20251216131317XS7HDU', 5, 5, 6, NULL, 1, 48, 'DR271225VU5G66', 'Farjana', '01516173275', '01516173275', 'NUR ALI SAWDAGAR BARI, BATHUA, WARD NO-04, POST OFFICE- NURALI BARI', 'Assigned for delivery', 'pathao', '2000', '2001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-12-16 07:13:17', '2025-12-16 07:13:17', 14842, 417, 2),
(16, '20251216132608RKPH7P', 5, 5, 6, NULL, 2, 48, 'DR271225VU5G66', 'Fahad', '01516173275', '01516173275', 'NUR ALI SAWDAGAR BARI, BATHUA, WARD NO-04, POST OFFICE- NURALI BARI', 'Pickup Cancel', 'pathao', '2000', '2000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-12-16 07:26:08', '2025-12-31 09:30:03', 15872, 405, 2),
(17, '20251216132903F6PCZH', 5, 7, 6, NULL, 2, 48, 'DR2412252EZE8B', 'Jasmin', '01516173275', '01516173275', 'NUR ALI SAWDAGAR BARI, BATHUA, WARD NO-04, POST OFFICE- NURALI BARI', 'Pickup Cancel', 'pathao', '2000', '2000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-12-16 07:29:03', '2025-12-25 10:33:21', 15872, 405, 2),
(18, '2025121616514408H0FP', 1, NULL, 1, NULL, 2, 48, 'DR1612253U2ZTP', 'Jasmine', '01516173275', '01516173275', 'Muradpurqqq', 'Pickup Cancel', 'pathao', '2000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-12-16 10:51:44', '2025-12-25 10:33:22', 20058, 400, 2),
(19, '2025123114522806VWZC', 1, NULL, 1, NULL, 2, 48, 'DT311225M9BGST', 'Jasmine', '01312361494', NULL, 'House no. 12, road 12, Andorkilla, Chattogram', 'pending', 'pathao', '2000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-12-31 08:52:28', '2025-12-31 08:52:43', NULL, NULL, NULL),
(20, '202512311505200W6HEO', 1, NULL, 1, NULL, 2, 12, 'DT311225KXC454', 'Jasmine', '01312361494', NULL, 'House no. 12, road 12, Andorkilla, Chattogram', 'pending', 'pathao', '2000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-12-31 09:05:20', '2025-12-31 09:10:17', 5436, 69, 2),
(21, '2025123115254038UYLI', 1, NULL, 1, NULL, 2, 48, 'DR311225FZAR4L', 'Jasmine', '01312361494', NULL, 'House no. 12, road 12, Andorkilla, Chattogram', 'Pickup Cancel', 'pathao', '2000', '2001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-12-31 09:25:40', '2025-12-31 09:30:06', NULL, NULL, NULL),
(22, '202512311539268HCVFX', 1, NULL, 1, NULL, 2, 48, 'DR3112256XQU2K', 'Jasmine', '01312361494', NULL, 'House no. 12, road 12, Andorkilla, Chattogram', 'Pickup Cancel', 'pathao', '2000', '2001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-12-31 09:39:26', '2025-12-31 10:00:02', NULL, NULL, NULL),
(23, '202512311804119UQ2MB', 1, NULL, 1, NULL, 2, 48, 'DR311225VHCFDA', 'Jasmine', '01312361494', NULL, 'House no. 12, road 12, Andorkilla, Chattogram', 'Pickup Cancel', 'pathao', '2000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-12-31 12:04:11', '2025-12-31 12:30:02', NULL, NULL, NULL),
(24, '202512311811588A1UA9', 1, NULL, 1, NULL, 2, 48, 'DR311225FHJYMQ', 'Farjana', '01312361494', NULL, 'House no. 12, road 12, Andorkilla, Chattogram', 'Pickup Cancel', 'pathao', '2000', NULL, '2000', '1', '90', NULL, '20', '70', 'Chittagong', 'Andarkilla', NULL, 'Pickup Cancel', 'rayluxeo', 'Delivery', 'Parcel', '1', '0', 'Yes', NULL, 'Unpaid', '0', '2025-12-31 12:11:58', '2026-01-09 23:03:22', NULL, NULL, NULL),
(25, '20251231182008IAIVYI', 1, NULL, 1, NULL, 2, 48, 'DR311225ZMZ6J5', 'Fahad', '01312361494', NULL, 'NUR ALI SAWDAGAR BARI, BATHUA, WARD NO-04, POST OFFICE- NURALI BARI', 'Pickup Cancel', 'pathao', '2000', NULL, '2000', '1', '150', '0', '20', '130', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Unpaid', '0', '2025-12-31 12:20:08', '2025-12-31 12:45:02', NULL, NULL, NULL),
(26, '20260106091514GSGYNH', 1, NULL, 1, NULL, 2, 48, 'DR060126Z7ZDEK', 'Lavinia Garcia', '01312361494', NULL, 'Possimus dolorem el, andorkilla, Chittagong', 'pending', 'pathao', '2000', NULL, '2000', '1', '90', '0', '20', '70', 'Chittagong', 'Andarkilla', NULL, 'Pickup Cancel', 'rayluxeo', 'Delivery', 'Parcel', '1', '0', 'Yes', NULL, 'Unpaid', '0', '2026-01-06 03:15:14', '2026-01-09 22:55:17', NULL, NULL, NULL),
(27, '20260106092036BWLIVM', 1, NULL, 1, NULL, 2, 48, 'DR060126U2AAG2', 'Jasmine', '01312361494', NULL, 'Hosue no. 6, Adorkilla, CTG', 'pending', 'pathao', '2000', NULL, '2000', '1', '90', '0', '20', '70', 'Chittagong', 'Andarkilla', NULL, 'Pickup Cancel', 'rayluxeo', 'Delivery', 'Parcel', '1', '0', 'Yes', NULL, 'Unpaid', '0', '2026-01-06 03:20:36', '2026-01-08 06:58:14', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking_products`
--

CREATE TABLE `booking_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `weight` decimal(8,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `description_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_products`
--

INSERT INTO `booking_products` (`id`, `booking_id`, `product_id`, `weight`, `quantity`, `amount`, `description_price`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1.00, 1, NULL, NULL, '2025-12-12 08:36:06', '2025-12-12 08:36:06'),
(2, 2, 1, 1.00, 1, NULL, NULL, '2025-12-12 09:57:22', '2025-12-12 09:57:22'),
(3, 3, 1, 1.00, 2, NULL, NULL, '2025-12-13 05:47:06', '2025-12-13 05:47:06'),
(4, 3, 1, 1.00, 2, NULL, NULL, '2025-12-13 05:47:06', '2025-12-13 05:47:06'),
(5, 4, 2, 1.00, 2, NULL, NULL, '2025-12-13 12:32:40', '2025-12-13 12:32:40'),
(6, 4, 1, 1.00, 1, NULL, NULL, '2025-12-13 12:32:40', '2025-12-13 12:32:40'),
(7, 5, 2, 1.00, 2, NULL, NULL, '2025-12-13 12:32:40', '2025-12-13 12:32:40'),
(8, 6, 1, 1.00, 1, NULL, NULL, '2025-12-13 12:32:40', '2025-12-13 12:32:40'),
(9, 7, 2, 1.00, 2, NULL, NULL, '2025-12-14 09:39:32', '2025-12-14 09:39:32'),
(10, 8, 1, 1.00, 1, NULL, NULL, '2025-12-14 09:39:32', '2025-12-14 09:39:32'),
(11, 9, 1, 1.00, 1, NULL, NULL, '2025-12-14 09:39:32', '2025-12-14 09:39:32'),
(12, 10, 2, 1.00, 2, NULL, NULL, '2025-12-14 09:39:32', '2025-12-14 09:39:32'),
(13, 11, 2, 1.00, 1, NULL, NULL, '2025-12-14 09:48:11', '2025-12-14 09:48:11'),
(14, 11, 1, 1.00, 1, NULL, NULL, '2025-12-14 09:48:11', '2025-12-14 09:48:11'),
(15, 12, 2, 1.00, 1, NULL, NULL, '2025-12-14 09:48:11', '2025-12-14 09:48:11'),
(16, 13, 2, 1.00, 1, NULL, NULL, '2025-12-15 01:01:50', '2025-12-15 01:01:50'),
(17, 14, 6, 1.00, 5, NULL, NULL, '2025-12-16 07:11:03', '2025-12-16 07:11:03'),
(18, 15, 4, 0.50, 1, NULL, NULL, '2025-12-16 07:13:17', '2025-12-16 07:13:17'),
(19, 16, 4, 0.50, 1, NULL, NULL, '2025-12-16 07:26:08', '2025-12-16 07:26:08'),
(20, 17, 4, 0.50, 1, NULL, NULL, '2025-12-16 07:29:03', '2025-12-16 07:29:03'),
(21, 18, 2, 1.00, 1, NULL, NULL, '2025-12-16 10:51:44', '2025-12-16 10:51:44'),
(22, 19, 2, 1.00, 1, NULL, NULL, '2025-12-31 08:52:28', '2025-12-31 08:52:28'),
(23, 20, 1, 1.00, 1, NULL, NULL, '2025-12-31 09:05:20', '2025-12-31 09:05:20'),
(24, 21, 2, 1.00, 1, NULL, NULL, '2025-12-31 09:25:40', '2025-12-31 09:25:40'),
(25, 22, 2, 1.00, 1, NULL, NULL, '2025-12-31 09:39:26', '2025-12-31 09:39:26'),
(26, 23, 2, 1.00, 1, NULL, NULL, '2025-12-31 12:04:11', '2025-12-31 12:04:11'),
(27, 24, 1, 1.00, 1, NULL, NULL, '2025-12-31 12:11:58', '2025-12-31 12:11:58'),
(28, 25, 2, 1.00, 1, NULL, NULL, '2025-12-31 12:20:08', '2025-12-31 12:20:08'),
(29, 26, 2, 1.00, 1, NULL, NULL, '2026-01-06 03:15:14', '2026-01-06 03:15:14'),
(30, 27, 2, 1.00, 1, NULL, NULL, '2026-01-06 03:20:36', '2026-01-06 03:20:36');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('faisaltez@gmail.com|127.0.0.1', 'i:1;', 1767856449),
('faisaltez@gmail.com|127.0.0.1:timer', 'i:1767856449;', 1767856449),
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:5:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"group_name\";s:1:\"d\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:17:{i:0;a:5:{s:1:\"a\";i:9;s:1:\"b\";s:12:\"booking.menu\";s:1:\"c\";s:7:\"booking\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:4:{i:0;i:5;i:1;i:10;i:2;i:11;i:3;i:12;}}i:1;a:5:{s:1:\"a\";i:10;s:1:\"b\";s:23:\"booking.operator.create\";s:1:\"c\";s:7:\"booking\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:5;i:1;i:11;i:2;i:12;}}i:2;a:5:{s:1:\"a\";i:11;s:1:\"b\";s:12:\"order.create\";s:1:\"c\";s:7:\"booking\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:10;i:1;i:11;i:2;i:12;}}i:3;a:5:{s:1:\"a\";i:12;s:1:\"b\";s:10:\"store.menu\";s:1:\"c\";s:5:\"store\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:5;i:1;i:9;i:2;i:12;}}i:4;a:5:{s:1:\"a\";i:13;s:1:\"b\";s:12:\"store.create\";s:1:\"c\";s:5:\"store\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:5;i:1;i:9;i:2;i:12;}}i:5;a:5:{s:1:\"a\";i:14;s:1:\"b\";s:18:\"store.admin.create\";s:1:\"c\";s:5:\"store\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:5;i:1;i:9;i:2;i:12;}}i:6;a:5:{s:1:\"a\";i:15;s:1:\"b\";s:8:\"hub.menu\";s:1:\"c\";s:3:\"hub\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:12;}}i:7;a:5:{s:1:\"a\";i:16;s:1:\"b\";s:10:\"hub.create\";s:1:\"c\";s:3:\"hub\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:12;}}i:8;a:5:{s:1:\"a\";i:17;s:1:\"b\";s:19:\"hub.incharge.create\";s:1:\"c\";s:3:\"hub\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:12;}}i:9;a:5:{s:1:\"a\";i:18;s:1:\"b\";s:21:\"store.incharge.create\";s:1:\"c\";s:3:\"hub\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:12;}}i:10;a:5:{s:1:\"a\";i:19;s:1:\"b\";s:24:\"dispatch.incharge.create\";s:1:\"c\";s:3:\"hub\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:12;}}i:11;a:5:{s:1:\"a\";i:20;s:1:\"b\";s:12:\"setting.menu\";s:1:\"c\";s:7:\"setting\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:12;}}i:12;a:5:{s:1:\"a\";i:21;s:1:\"b\";s:9:\"role.menu\";s:1:\"c\";s:4:\"role\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:12;}}i:13;a:5:{s:1:\"a\";i:22;s:1:\"b\";s:12:\"product.menu\";s:1:\"c\";s:7:\"product\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:5;i:1;i:12;}}i:14;a:5:{s:1:\"a\";i:23;s:1:\"b\";s:15:\"merchant.manage\";s:1:\"c\";s:8:\"merchant\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:12;}}i:15;a:5:{s:1:\"a\";i:24;s:1:\"b\";s:12:\"admin.create\";s:1:\"c\";s:7:\"setting\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:12;}}i:16;a:5:{s:1:\"a\";i:31;s:1:\"b\";s:14:\"courier.assign\";s:1:\"c\";s:7:\"courier\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:12;}}}s:5:\"roles\";a:5:{i:0;a:3:{s:1:\"a\";i:5;s:1:\"b\";s:8:\"Merchant\";s:1:\"d\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:10;s:1:\"b\";s:16:\"Booking Operator\";s:1:\"d\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:11;s:1:\"b\";s:21:\"Merchant Fullfillment\";s:1:\"d\";s:3:\"web\";}i:3;a:3:{s:1:\"a\";i:12;s:1:\"b\";s:5:\"Admin\";s:1:\"d\";s:3:\"web\";}i:4;a:3:{s:1:\"a\";i:9;s:1:\"b\";s:11:\"Store Admin\";s:1:\"d\";s:3:\"web\";}}}', 1768281167),
('xopu@mailinator.com|127.0.0.1', 'i:2;', 1768071358),
('xopu@mailinator.com|127.0.0.1:timer', 'i:1768071358;', 1768071358);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `thumb_image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_id`, `city_name`, `created_at`, `updated_at`) VALUES
(3, 1, 'Dhaka', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 2, 'Chittagong', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 3, 'Sylhet', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 4, 'Rajshahi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 5, 'Cumilla', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 6, 'Feni', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 7, 'Noakhali', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 8, 'Chandpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 9, 'Bogra', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 10, 'Sirajganj', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 11, 'Cox\'s Bazar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 12, 'Moulvibazar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 13, 'Tangail', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 14, 'Natore', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 15, 'Chapainawabganj', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 16, 'Manikganj', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 17, 'Barisal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 18, 'Faridpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 19, 'Jashore', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 20, 'Khulna', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 21, 'Narayanganj', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 22, 'Gazipur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 23, 'Munsiganj', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 24, 'Pabna', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 25, 'Rangpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 26, 'Mymensingh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 27, 'Jhalokathi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 28, 'Kushtia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 29, 'Patuakhali', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 30, 'Habiganj', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 31, 'Pirojpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 32, 'B. Baria', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 33, 'Sherpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 34, 'Barguna ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 35, 'Dinajpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 36, 'Thakurgaon ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 37, 'Panchagarh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 38, 'Gaibandha', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 39, 'Nilphamari', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 40, 'Lakshmipur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 41, 'Jamalpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 42, 'Kishoreganj', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 43, 'Madaripur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 44, 'Netrakona', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 45, 'Sunamganj', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 46, 'Naogaon', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 47, 'Narshingdi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 48, 'Joypurhat', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 49, 'Jhenidah', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 50, 'Meherpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 51, 'Satkhira', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 52, 'Bagerhat', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 53, 'Bhola', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 54, 'Narail ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 55, 'Kurigram ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 56, 'Gopalgonj ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 57, 'Lalmonirhat ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 58, 'Rajbari ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 59, 'Rangamati ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 60, 'Magura ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 61, 'Chuadanga', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 62, 'Bandarban ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 63, 'Khagrachari', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 64, 'Shariatpur ', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `courier_platforms`
--

CREATE TABLE `courier_platforms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courier_platforms`
--

INSERT INTO `courier_platforms` (`id`, `name`, `value`, `logo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pathao', 'pathao', 'assets/img/logo/pathao.svg', 1, '2025-12-12 01:58:43', '2025-12-12 01:58:43'),
(2, 'Steadfast', 'steadfast', 'assets/img/logo/steadfast.svg', 1, '2025-12-12 01:58:43', '2025-12-12 01:58:43');

-- --------------------------------------------------------

--
-- Table structure for table `courier_stores`
--

CREATE TABLE `courier_stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `courier_platform_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` varchar(255) DEFAULT NULL,
  `client_secret` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL COMMENT 'username/email',
  `password` varchar(255) DEFAULT NULL,
  `store_id` varchar(255) DEFAULT NULL,
  `store_name` varchar(255) DEFAULT NULL,
  `token` text DEFAULT NULL,
  `refresh_token` text DEFAULT NULL,
  `expires_in` varchar(255) DEFAULT NULL,
  `store_token` varchar(255) NOT NULL COMMENT 'For site to connect store with users.',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courier_stores`
--

INSERT INTO `courier_stores` (`id`, `user_id`, `courier_platform_id`, `client_id`, `client_secret`, `username`, `password`, `store_id`, `store_name`, `token`, `refresh_token`, `expires_in`, `store_token`, `created_at`, `updated_at`) VALUES
(6, 1, 1, 'zPdyXpnbQr', 'FmSXd6pivDme8Nbe9zkbIZzYSIL7GRcQQ8HpkXMz', 'jasmineakther62@gmail.com', 'eyJpdiI6IlMwdXZqK2hOQzJXREVONDRjSU9LRlE9PSIsInZhbHVlIjoidEpUQWVPbXVHd1paUVE3MTFJRFFwNGd0d0hFN1RVb0VicUNUSmlNbC9pOD0iLCJtYWMiOiI1MDUwZTQ4OTQwMWJkYTQ2YjhmMzkxMDNhOWIyZWMxNTAxNzJhODcwNjUwOWQyZjM4ZWMzMmI4ZTM1YjcwNThlIiwidGFnIjoiIn0=', '322143', 'TAABIR', 'eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMDUyNjciLCJhdWQiOlsiMTQwMTMiXSwiZXhwIjoxNzc0OTY4MDEyLCJuYmYiOjE3NjcxOTIwMTIsImlhdCI6MTc2NzE5MjAxMiwianRpIjoiNmE2NjY3MTZkZTdiMDc5ZmIxMDZjMjkzMzk5ZTBhMGMxYmJmNDhjMjNlZmY2MWQwMDFkZTFmOGJiY2Y0NWVlNSIsIm1lcmNoYW50X2lkIjoiM1lhT1l5Sk5keCIsInNjb3BlcyI6W119.KF-8UljVMzIy0vsB3Al4BBGqnib26eXhHfJK3XG4NrzJW7uBGCWscV1ukwazmD9QRsl9_7sWlEYQVOpHwmswLh9XZ-XXdb61x28BjEbZylMjpHq1R8k35z5Q8SRCAtbUj2LC5nOK3aVfHiUpUiIl9yTC8jnBo54ISkOcJoNyQy54hNbptCXgTWg36waVl10f9Y4AY5Nt141wDeKbKKW985cTTLtio62nXN6YA42vBicfA9smD3OctMvMh0u8NF33Lf35MV7YRyKWyFgIDIYs9suk_rRxGtq9ZZ5rWPh65g_UwV-HIb4mbV4l9REYeFVMOrujZA9zWYnF2zhDTzsMOXg86PB5CNY8KC0hUveC55c66fNrP7TQh2jBGocajSeskrmzDEM1NZLOapLM-LMNh33jMdnSRUmscwehi8Fre4JPwE9hYHJt_iefAQ5Irve5Sc8oRjcsBhaHlozIW5m7SlYD3dX0H2BIRVHeus_-XLv3e2zCh8dU3JzsEBtE5cqzMoTBU-gY_Blph8Ze-Jj6JY99g0_3po5LBrcsXtk9ymWSIcmdPG0rrzb4ZqUaXcJulOt6o6bMv_UmB_7pqrMHOnuIYesMWSswYJwLxo4NDsQgjmnfG1kZLooC1xxaVZ6LCOMzC8jcCNILk4BuJJIGKZeyj54ZKYNqCqoW9ts8-bE', 'def50200e30088138fd267a838001de5ffa29deea30055b40f14bd4ae037a23bf215bf25a3516b5c42d06003c47c84dcf32b429d671e5a8e57fdc64a01ee8d7d9a1a8b10c462c2a0343f5ebbd790ec772462dbc1f636fc15f53d4ad205c3b2dcce42bc6e74e7f1b3c17abea860078745dd2005bab9a477ce3bdc4c1241f7e37dbc4f5ddfa69e3d3ad31a6a73d254ce00ba996237a6fc698d724d0574565f922433040227710babf37fb4182293e52dfc9fe324a04ca8c9c25a844d493c88055a74b2d56aaad5fb418ee3130ce2a588ef3fc101e4b7422675b63e9d7b2657be4b43f11b8809d32aa2beeaad959bfc4072b9d97a6ed662f4da5a3ccacc015f042cbe0471a4e8ba84bb981848da146265dfb43c65331d9eac2bc561b318c83e20548dd2a02b7cb1d0fe82cabcf8c65e4403e3136835baded9f5645178a8666500f06a63443be56f5fb832c772a8e2090d18eb996b1ffc86f3b780d227a8', '1774968012', '1c614127-fe6f-4cbf-a5bd-15ca7e026bb4', '2025-12-31 08:40:12', '2025-12-31 08:40:12'),
(7, 1, 1, 'lNbWqWxeyg', 'wxROBa8wehcqhcSKcaOEgAONuEt4Gk4DCoGbSPri', 'khaledrayan40@gmail.com', 'eyJpdiI6IndhZ2hrb0tRZFVGODR5ZFVEdVIrSVE9PSIsInZhbHVlIjoiZHRZc1VwY3UzbERUSFpMOXNXMUFsMW1BOGRYbXJFZUlyOGFWNmJJdWI2cz0iLCJtYWMiOiI2NGMzMWFhYmZkMzhjZjc5MDgxMDI4NDc0MDU5YWRhMDJkNjI5NmEwZmZmMDAyYjdlNjRhMmZiMjg3NmEyNmY2IiwidGFnIjoiIn0=', '345173', 'rayluxeo', 'eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIzODI3NjYiLCJhdWQiOlsiMTQwMzAiXSwiZXhwIjoxNzc0OTcwMjA3LCJuYmYiOjE3NjcxOTQyMDcsImlhdCI6MTc2NzE5NDIwNywianRpIjoiYjlmNGFjZDA3NjNjN2MzZDIwMGNjMTAxYzFiMDQyMTI4YTA2NjgwNDk4OTBkYzAxMmI3OWUzOTM3MDczOTJkMCIsIm1lcmNoYW50X2lkIjoiV1pkUDdaTm5iSyIsInNjb3BlcyI6W119.lsWaTaFftyLyqqs6h5TnP48aRJnbrcNuMtDaMApOrkcHKzLOH6wSvhFqez5a8AAjyIu1F-dSQaZZ9HrT2qlhRnFQY2Hc3tyGWbiabhpk2v19dm_YBrJ6rq4ezqWSv2Mq1lZ0K5zQBLFwoN0hjx_wMYvPD8zFx_mK-WmYqUJXA6Az7mb1qY93prj5ciWhsti36m05ePuTM4rzPLeb3XR4XxFgj9P3h-Brn9SXCN8hKm2Xs_QVoJ3j3IbCwbUKjLJMZoXWzZU1Py7IRlU2O3qyCO06PFgSz5WTejRsEVkCSeEj2p_GXp4Guep2leN31lH7SSdjOpkL3G74dTAgC0LhMuWvPhqq3lWIxAtneOB2hg2eK2O3E4gqcviZeEeFp-uv2iRvoRMLCR9y_kKe814sEmbURw-MoYh2KkHU7AWONvObts8opBLa3xYNo2VDhQ_ltbGGUPMjIiQhQ3jhAtll0w16Q14zt6HwJp1DpPF8HzIP-NwH5JWa95xIUX-0yZ07szevoQUGHlWXr9qLKz8Yu058_nmqs4sGD1h4wBdmPnX0Ynl2SqZKNuxPcFV7CQDt44q7Xxn9fYt0QB_nQyWkSGFVPd0e_iUrk_nAzetPPkILQodn8arv8JDDaH0ZvwNL0fyqX4FdeqhwESa-D9LU_8FeEj801GHKSNKsTEubkTM', 'def50200c53a62bf1180987e3860736cfee5ac41ab3b5f4937c6709a3399c28daa299356697bd1550629a063edc0964ba72849a26cc9876b87e4ab7c11d9a6989a6806b106f21cee51142fd9c88b3f71e18d77ebd18fa33a44ea3b8ab965daf6f2031dadd76142afc35f4fd092cc3fde3fce904a97757b71392ff6821deb984a323a8dfc5dc8688c0362c670e21c14a63f77a518b833a1ddfd720a8dd38a3869a8364db84c15a456351849d4672104b977b4a99b025093a0ca41694cebe9d4485f01ba0ed59cadc8d2acd8293e6e292ade85ec8876573d3cc74350994652779611853a0e0720d43ff4359df11f53391cfdbc7d0101bc66cecd1abe557225eb3d31ac8ef881a062a7884c2f7b1b21f12c911e646f02f4990dd2bad60f6437c87dc3f4c7ae93a48d7ebc29a5341f8784316bb5d92616b2d7e93f7b655dce22e343847fa40e14c383a71a4837713d19f0b5bfae21b49366b6c418b2e83b', '1774970215', 'f901ec29-3940-462d-b9d8-7abe699d557d', '2025-12-31 09:16:55', '2025-12-31 09:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_types`
--

CREATE TABLE `delivery_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_types`
--

INSERT INTO `delivery_types` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(12, 'Demand Delivery', 'demand-delivery', 1, '2025-11-24 20:39:13', '2025-11-24 20:39:13'),
(48, 'Normal Delivery', 'normal-delivery', 1, '2025-11-15 22:07:54', '2025-11-15 22:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hubs`
--

CREATE TABLE `hubs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hubs`
--

INSERT INTO `hubs` (`id`, `user_id`, `name`, `location`, `phone`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Chattogram Central Hub', 'Chittagong', '01516173275', 'Muradpur', 1, '2026-01-03 23:32:04', '2026-01-03 23:32:04'),
(2, 1, 'Dhaka Central Hub', 'Dhaka', '01838906073', 'House No - 06, Road No - 01', 1, '2026-01-03 23:32:28', '2026-01-03 23:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `merchant_id` varchar(255) NOT NULL,
  `order_consignment_id` varchar(255) DEFAULT NULL,
  `merchant_order_id` varchar(255) DEFAULT NULL,
  `order_created_at` timestamp NULL DEFAULT NULL,
  `order_description` text DEFAULT NULL,
  `order_status` varchar(255) DEFAULT NULL,
  `order_status_updated_at` timestamp NULL DEFAULT NULL,
  `recipient_name` varchar(255) NOT NULL,
  `recipient_address` text NOT NULL,
  `recipient_phone` varchar(20) NOT NULL,
  `recipient_secondary_phone` varchar(20) DEFAULT NULL,
  `customer_city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_zone_id` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_area_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_name` varchar(255) DEFAULT NULL,
  `zone_name` varchar(255) DEFAULT NULL,
  `area_name` varchar(255) DEFAULT NULL,
  `order_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_fee` decimal(10,2) NOT NULL DEFAULT 0.00,
  `promo_discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `cod_fee` decimal(10,2) NOT NULL DEFAULT 0.00,
  `additional_charge` decimal(10,2) NOT NULL DEFAULT 0.00,
  `compensation_cost` decimal(10,2) NOT NULL DEFAULT 0.00,
  `delivery_fee` decimal(10,2) NOT NULL DEFAULT 0.00,
  `delivery_type` int(11) DEFAULT NULL,
  `total_weight` int(11) NOT NULL DEFAULT 0,
  `cash_on_delivery` varchar(10) DEFAULT NULL,
  `order_delivery_hub_id` bigint(20) UNSIGNED DEFAULT NULL,
  `delivery_string` varchar(255) DEFAULT NULL,
  `delivery_method` int(11) NOT NULL DEFAULT 0,
  `pickup_method` int(11) NOT NULL DEFAULT 0,
  `pickup_string` varchar(255) DEFAULT NULL,
  `store_name` varchar(255) DEFAULT NULL,
  `store_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_type` varchar(255) DEFAULT NULL,
  `item_type` varchar(255) DEFAULT NULL,
  `order_type_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `item_type_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `item_quantity` int(11) NOT NULL DEFAULT 1,
  `item_description` text DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `billing_status` varchar(255) NOT NULL DEFAULT 'Unpaid',
  `modification_notes` text DEFAULT NULL,
  `failed_reason` text DEFAULT NULL,
  `delivery_instruction` text DEFAULT NULL,
  `is_incomplete` tinyint(1) NOT NULL DEFAULT 0,
  `is_recipient_flagged` tinyint(1) NOT NULL DEFAULT 0,
  `is_point_delivery` tinyint(1) NOT NULL DEFAULT 0,
  `can_place_execution_request` tinyint(1) NOT NULL DEFAULT 0,
  `short_link` varchar(255) DEFAULT NULL,
  `ticket_id` varchar(255) DEFAULT NULL,
  `invoice_id` varchar(255) DEFAULT NULL,
  `delivery_slip` varchar(255) DEFAULT NULL,
  `execution_request_type` varchar(255) DEFAULT NULL,
  `sorted_at` timestamp NULL DEFAULT NULL,
  `contact_collectable_amount_update_status` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`contact_collectable_amount_update_status`)),
  `c2c_info` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`c2c_info`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `order_id`, `merchant_id`, `order_consignment_id`, `merchant_order_id`, `order_created_at`, `order_description`, `order_status`, `order_status_updated_at`, `recipient_name`, `recipient_address`, `recipient_phone`, `recipient_secondary_phone`, `customer_city_id`, `customer_zone_id`, `customer_area_id`, `city_name`, `zone_name`, `area_name`, `order_amount`, `total_fee`, `promo_discount`, `discount`, `cod_fee`, `additional_charge`, `compensation_cost`, `delivery_fee`, `delivery_type`, `total_weight`, `cash_on_delivery`, `order_delivery_hub_id`, `delivery_string`, `delivery_method`, `pickup_method`, `pickup_string`, `store_name`, `store_id`, `order_type`, `item_type`, `order_type_id`, `item_type_id`, `item_quantity`, `item_description`, `color`, `billing_status`, `modification_notes`, `failed_reason`, `delivery_instruction`, `is_incomplete`, `is_recipient_flagged`, `is_point_delivery`, `can_place_execution_request`, `short_link`, `ticket_id`, `invoice_id`, `delivery_slip`, `execution_request_type`, `sorted_at`, `contact_collectable_amount_update_status`, `c2c_info`, `created_at`, `updated_at`) VALUES
(1, 'DR271225VU5G66', '1', 'DR271225VU5G66', '20251216132608RKPH7P', '2025-12-27 12:36:19', '2000', 'Pending', '2025-12-27 12:36:19', 'Fahad', 'NUR ALI SAWDAGAR BARI, BATHUA, WARD NO-04, POST OFFICE- NURALI BARI', '01516173275', NULL, 1, 1, 1, 'Dhaka', 'Banani', 'Road 01', 2000.00, 130.00, 0.00, 0.00, 20.00, 0.00, 0.00, 110.00, 48, 1, 'Yes', 1, '', 0, 0, '', 'Test 5', 346731, 'Delivery', 'Parcel', 1, 2, 1, '2000', 'blue', 'Unpaid', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '{\"can_update\":true,\"phone_updated\":false,\"address_updated\":false,\"amount_to_collect_updated\":false,\"can_update_amount_to_collect\":true}', NULL, '2025-12-27 12:36:20', '2025-12-27 12:36:20'),
(2, 'DR1612253U2ZTP', '1', 'DR1612253U2ZTP', '2025121616514408H0FP', '2025-12-16 10:52:17', NULL, 'Pickup Cancel', '2025-12-16 10:53:14', 'Jasmine', 'Muradpurqqq', '01516173275', NULL, 2, 400, 20058, 'Chittagong', 'East Joara', 'Gachbaria', 2000.00, 90.00, 0.00, 0.00, 20.00, 0.00, 0.00, 70.00, 48, 1, 'Yes', 7, '', 0, 0, '', 'Test 5', 346731, 'Delivery', 'Parcel', 1, 2, 1, '', 'red', 'Unpaid', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '{\"can_update\":false,\"phone_updated\":false,\"address_updated\":false,\"amount_to_collect_updated\":false,\"can_update_amount_to_collect\":false}', NULL, '2025-12-28 14:16:15', '2025-12-28 14:17:46'),
(3, 'DR311225FZAR4L', '1', 'DR311225FZAR4L', '2025123115254038UYLI', '2025-12-31 09:26:11', '2001', 'Pickup Cancel', '2025-12-31 09:27:01', 'Jasmine', 'House no. 12, road 12, Andorkilla, Chattogram', '01312361494', NULL, 2, 69, NULL, 'Chittagong', 'Andarkilla', NULL, 2000.00, 90.00, 0.00, 0.00, 20.00, 0.00, 0.00, 70.00, 48, 1, 'Yes', 7, '', 0, 0, '', 'rayluxeo', 345173, 'Delivery', 'Parcel', 1, 2, 1, '2001', 'red', 'Unpaid', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '{\"can_update\":false,\"phone_updated\":false,\"address_updated\":false,\"amount_to_collect_updated\":false,\"can_update_amount_to_collect\":false}', NULL, '2025-12-31 09:37:40', '2025-12-31 09:37:40'),
(4, 'DR3112256XQU2K', '1', 'DR3112256XQU2K', '202512311539268HCVFX', '2025-12-31 09:40:18', '2001', 'Pending', '2025-12-31 09:40:18', 'Jasmine', 'House no. 12, road 12, Andorkilla, Chattogram', '01312361494', NULL, 2, 69, NULL, 'Chittagong', 'Andarkilla', NULL, 2000.00, 90.00, 0.00, 0.00, 20.00, 0.00, 0.00, 70.00, 48, 1, 'Yes', 7, '', 0, 0, '', 'rayluxeo', 345173, 'Delivery', 'Parcel', 1, 2, 1, '2001', 'blue', 'Unpaid', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '{\"can_update\":true,\"phone_updated\":false,\"address_updated\":false,\"amount_to_collect_updated\":false,\"can_update_amount_to_collect\":true}', NULL, '2025-12-31 09:40:19', '2025-12-31 09:40:19'),
(5, 'DR311225ZMZ6J5', '1', 'DR311225ZMZ6J5', '20251231182008IAIVYI', '2025-12-31 12:30:25', NULL, 'Pickup Cancel', '2025-12-31 12:30:43', 'Fahad', 'NUR ALI SAWDAGAR BARI, BATHUA, WARD NO-04, POST OFFICE- NURALI BARI', '01312361494', NULL, 1, 1, 1, 'Dhaka', 'Banani', 'Road 01', 2000.00, 150.00, 0.00, 0.00, 20.00, 0.00, 0.00, 130.00, 48, 1, 'Yes', 1, '', 0, 0, '', 'rayluxeo', 345173, 'Delivery', 'Parcel', 1, 2, 1, '', 'red', 'Unpaid', NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '{\"can_update\":false,\"phone_updated\":false,\"address_updated\":false,\"amount_to_collect_updated\":false,\"can_update_amount_to_collect\":false}', NULL, '2025-12-31 12:47:15', '2026-01-05 06:22:00'),
(6, 'DR060126U2AAG2', '1', 'DR060126U2AAG2', '20260106092036BWLIVM', '2026-01-06 03:24:31', NULL, 'Pickup Cancel', '2026-01-06 03:24:55', 'Jasmine', 'Hosue no. 6, Adorkilla, CTG', '01312361494', NULL, 2, 69, NULL, 'Chittagong', 'Andarkilla', NULL, 2000.00, 90.00, 0.00, 0.00, 20.00, 0.00, 0.00, 70.00, 48, 1, 'Yes', 7, '', 0, 0, '', 'rayluxeo', 345173, 'Delivery', 'Parcel', 1, 2, 1, '', 'red', 'Unpaid', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '{\"can_update\":false,\"phone_updated\":false,\"address_updated\":false,\"amount_to_collect_updated\":false,\"can_update_amount_to_collect\":false}', NULL, '2026-01-08 02:37:40', '2026-01-08 04:02:29');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kycs`
--

CREATE TABLE `kycs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bin` varchar(255) DEFAULT NULL,
  `trade` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nid` varchar(255) DEFAULT NULL,
  `selfie` varchar(255) DEFAULT NULL,
  `verify_phone` int(11) NOT NULL DEFAULT 0,
  `verify_email` int(11) NOT NULL DEFAULT 0,
  `email_otp` text DEFAULT NULL,
  `email_otp_expires_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kycs`
--

INSERT INTO `kycs` (`id`, `user_id`, `bin`, `trade`, `phone`, `email`, `nid`, `selfie`, `verify_phone`, `verify_email`, `email_otp`, `email_otp_expires_at`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 'AE123123', 'TRDX1231288U9', '01312361494', 'nayem@gmail.com', 'uploads/kyc/nid/6940f0549c7d4.jpg', 'uploads/selfies/selfie_1765863508.png', 1, 1, NULL, NULL, 1, '2025-12-15 23:38:28', '2025-12-15 23:41:35'),
(3, 1, NULL, NULL, NULL, 'faisaltez@gmail.com', NULL, NULL, 0, 0, '622731', '2025-12-31 11:17:07', 0, '2025-12-23 03:20:52', '2025-12-31 11:12:07');

-- --------------------------------------------------------

--
-- Table structure for table `merchant_couriers`
--

CREATE TABLE `merchant_couriers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `merchant_id` bigint(20) UNSIGNED NOT NULL,
  `courier_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `merchant_couriers`
--

INSERT INTO `merchant_couriers` (`id`, `merchant_id`, `courier_id`, `created_at`, `updated_at`) VALUES
(2, 3, 6, '2026-01-05 00:51:45', '2026-01-05 00:51:45'),
(4, 3, 7, '2026-01-05 01:19:12', '2026-01-05 01:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(339, '0001_01_01_000000_create_users_table', 1),
(340, '0001_01_01_000001_create_cache_table', 1),
(341, '0001_01_01_000002_create_jobs_table', 1),
(342, '2023_12_13_071536_create_pathao_courier_table', 1),
(343, '2025_07_09_104959_create_categories_table', 1),
(344, '2025_09_04_055702_create_permission_tables', 1),
(345, '2025_10_10_041750_create_stores_table', 1),
(346, '2025_10_10_044952_create_designations_table', 1),
(347, '2025_10_14_090755_create_products_table', 1),
(348, '2025_10_20_015325_create_hubs_table', 1),
(349, '2025_10_21_122947_create_stock_movements_table', 1),
(350, '2025_10_24_015700_create_kycs_table', 1),
(351, '2025_10_24_054847_create_payment_details_table', 1),
(352, '2025_11_07_043402_create_divisions_table', 1),
(353, '2025_11_07_043650_create_districts_table', 1),
(354, '2025_11_07_043822_create_thanas_table', 1),
(355, '2025_11_07_103421_create_product_types_table', 1),
(356, '2025_11_07_103431_create_delivery_types_table', 1),
(357, '2025_11_13_165411_add_owner_name_to_stores_table', 1),
(358, '2025_11_19_123306_add_pathao_store_id_to_stores_table', 1),
(359, '2025_11_21_180442_create_cities_table', 1),
(360, '2025_11_21_180445_create_zones_table', 1),
(361, '2025_11_21_180454_create_areas_table', 1),
(362, '2025_12_04_182924_create_setup_charges_table', 1),
(363, '2025_12_04_182925_create_bookings_table', 1),
(364, '2025_12_04_182926_create_booking_products_table', 1),
(365, '2025_12_12_074935_create_courier_platforms_table', 2),
(366, '2025_12_12_130106_create_courier_stores_table', 3),
(367, '2025_12_23_120544_make_location_ids_nullable_in_bookings_table', 4),
(368, '2025_12_26_112612_create_invoices_table', 4),
(369, '2026_01_05_063413_create_merchant_couriers_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(9, 'App\\Models\\User', 1),
(10, 'App\\Models\\User', 1),
(11, 'App\\Models\\User', 1),
(12, 'App\\Models\\User', 1),
(13, 'App\\Models\\User', 1),
(14, 'App\\Models\\User', 1),
(15, 'App\\Models\\User', 1),
(16, 'App\\Models\\User', 1),
(17, 'App\\Models\\User', 1),
(18, 'App\\Models\\User', 1),
(19, 'App\\Models\\User', 1),
(20, 'App\\Models\\User', 1),
(21, 'App\\Models\\User', 1),
(22, 'App\\Models\\User', 1),
(23, 'App\\Models\\User', 1),
(24, 'App\\Models\\User', 1),
(31, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(5, 'App\\Models\\User', 3),
(5, 'App\\Models\\User', 5),
(6, 'App\\Models\\User', 9),
(6, 'App\\Models\\User', 10),
(7, 'App\\Models\\User', 11),
(8, 'App\\Models\\User', 12),
(9, 'App\\Models\\User', 2),
(9, 'App\\Models\\User', 4),
(9, 'App\\Models\\User', 6),
(9, 'App\\Models\\User', 8),
(9, 'App\\Models\\User', 13),
(10, 'App\\Models\\User', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pathao-courier`
--

CREATE TABLE `pathao-courier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `secret_token` char(36) NOT NULL,
  `token` text NOT NULL,
  `refresh_token` text NOT NULL,
  `expires_in` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pathao-courier`
--

INSERT INTO `pathao-courier` (`id`, `secret_token`, `token`, `refresh_token`, `expires_in`, `created_at`, `updated_at`) VALUES
(1, 'WAIN4FwWxZHZJjRmw9F9', 'eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIzODI3NjYiLCJhdWQiOlsiMTQwMzAiXSwiZXhwIjoxNzczMjk0NTQ2LCJuYmYiOjE3NjU1MTg1NDYsImlhdCI6MTc2NTUxODU0NiwianRpIjoiNjJjZGIyOTIzNzlhNDVkNzlhNjQ4NjRlZmI4MTIyNzdmZGM2MzRhNzQ2ZjU0ZWE5Zjg4NjhmNmRhYTQ5ZTQxNCIsIm1lcmNoYW50X2lkIjoiV1pkUDdaTm5iSyIsInNjb3BlcyI6W119.IQTEN9YF6LzyuCaik_gzriEE5cuYm11yUOL00fAaV8megIwwJ5fm2O9UECjU_4iCtpbDOhi3vIVDcMZ5b7mui25be7EVuygTL-WrbxApzVGkeLbirQ-EEiiUjmvwcRqbl7h29VneFiWfOp83FfBfnvVD9aPUNk1iUYiIKJKk5yDHLHknz9cvjScH0RgCLmV35WxxH-3y9Q_EUw882eEbCCiqQQxGeGTM45exwCktmnDPcu0lHN1ICelKyhxeGhwVNyrCxEYdgYAkmSG0aL0MBz_KazEOGdvHH1iEcQT3jE1EnNRTMCRu5nz1xVUhHFsYGbs9aBT7MLuY8uE6bI2aJLpYOUtXIHfHpx-0MPqepqzWBGKxVZ-nhZct6Svre6jr3wqNB3hQ4MXyarduuCIMSm_FjT_5fZ1No7ta6P6R6-EahtUfyfEPFzxoUYqFC2qIp38EQiFndJOk9SbwIsfl9EEPPYnW9w-Wbq39CdU8nU7uItxY-GpGC4RrORkJHO37ABgkSNp0-o9CPAIylvuygSXiC_AFQ8uptTIC-xvR1WVkSNl7MXPA0iIOE25zcubRsLKZP-GmStz91JSllTHprB_HEfkjnGuzr5gmFpuUQ3QKEEtKe6VB8sDUBTOmtDrAWvdsIMER1W8uyTfi-HNQX2MMUPfbfbvobl3yQzE1Uqg', 'def5020032321362c448ac711e174e75e444762992b2b6797d6a0fc6169ec197dfaf8620202c0a075471eafdf4e916823234891291bd20915f1b11cd838c011f692830e952574b5028c6a9a3cea7853bb46254e648bd4d122558481665abb429ab6acd645d0a76430782ac6fc5565c42aae4efd8a6aaef488d8174dd8dd68f8c45a048e134540998985d6a9dc39b965ec5b34815269b50b58237a515d18f8bd3a608d106010d55959a9d4755eb439145e9dd89aff36a1a373caf622bd4ce0fb9fc86efb68035cca2e94a0fe668f570e4ee4ceecfb51936d479b0f5cd19c9247f325f28cb9962d34c6a92aeb221266cf64afeac7f26871e9b23274a2b0a158df26da3e4f9e1d66a39e222c9c3c54891e70e3d96f5731f86ffb50f029a4b707a26728bf44039e77ba5fa1ae4c6683204d3858dec734b9fa970ab23eb87bce3b15d7c9df79b1c3ebc0a6c73644d1f4f1198470298d8f94d9464d6c83a0e', '1773294576', '2025-12-11 23:49:36', '2025-12-11 23:49:36'),
(2, 'QeLoVYjoAYX2mNjZqP2w', 'eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIzODI3NjYiLCJhdWQiOlsiMTQwMzAiXSwiZXhwIjoxNzczMzkxNzU3LCJuYmYiOjE3NjU2MTU3NTcsImlhdCI6MTc2NTYxNTc1NywianRpIjoiYTU3ZTExMWRjOWM5MDU3ZGYzOTdkMTQ5MWYyNmJjZDJmYjQyMWU4ZmJiMzJiMTFhMjljODU3ZmFhOGE1MzMxMiIsIm1lcmNoYW50X2lkIjoiV1pkUDdaTm5iSyIsInNjb3BlcyI6W119.mOy9RAWNVd0X14XEhkUisoRvuVxwK4xshUYDifNy7Zq_iNHGB5q5w1xMWzSXgfbyW84BA8twMjFjFQJ4wNnNUvaWDJFw3p8VORvDa12Ma4Ox8ygBh5NHMVBdCFxrEcImL9JSO407UAPO3VjSMq-mR7u4qtHbkaVGdg7YiYNCm0vU4a4EMMrnfn2mURNC23C4ySioNNwG9RsIh2YoI2UbbxLsjt8FbaCZRBaWsH6YKU4xh0yUpZgCPwSVS8vmKLaSORujPnmgYfZ2jC5_R2Zt3Ycv_xcTjDwygLgwUZzbDuILu0QOfRX6QCoW88H0Kuuza4lUFO78ZE2rw8h8L2TPI2nENfY-E2p7SH4q_Xf32l5WiDo8YBdw8XRFHg-tsqWbZrJ7eG-VI-vnHtkPfTZHu_ODkfIRr4WUAnJkxCPBIlXLUSzhletf_LidGQzcBDN2mSIuv7s_jSTTLHY_bmVe_Bmfl6BJzHD9Ovaauj9ohb6NLLedXkeERQ7ntX7msHz5KEF77RC0GW-2ZDKWztcILTAy-qS1dfwEMZlVx3Hgjgt1NLT3p8O8uTqfFFJOZ1mMersAT59V76ETKh03I_tlrA7ZWKWosSIkLU1mLYs_MWyhKGq6_Nesx_khRwk-R3_rt3WzRXP2UI0ExrRO-pUGP8pYWHLUJvKIGW5a44hOFd4', 'def50200edd20a306edbcc5d2e50a7f228b0fda4bca2c85f2fed541db00d5ca6bc9539574b032f0ac018e37e46c2e41c1129416424194750c5a48b8d727ff0b9db1e727f27cecd0753995fe90504887ccf7dad3faa72e643f020ea1a42e681ceac4d7d260df70227cdba0fd6839180f645ddbe077acb78d1b98b2ea107b2f8d1c308b72e806545fe00abc0c112a530acec9a887e7d3a6e40114eb102f2cd2226c5e1f64c84642ec187c040f03dbb44c22b2fbfb63ae0c81b2627dcb7a4df8624dfe33f1c031663301c087763dc7ce6d8af1c746e60517e380ce729045c9493654bcf5e0c4f8a593eb31f3a1c413b6bed80e767d53d304f2d48c3ee03bd7c6f51a376856c6159a39d6c37c1bf874cd3859256429fb516ca5e23ba1d912c3e85b4e2704d0689f62f28e237368a4be50d174c821e4ffe76a42308ef435069e804770abc77635be40a313455ab558e782e4f37d8f21027b65281400bff06', '1773391758', '2025-12-13 02:49:18', '2025-12-13 02:49:18');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bkash` varchar(255) DEFAULT NULL,
  `nagod` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_account` varchar(255) DEFAULT NULL,
  `branch_name` varchar(255) DEFAULT NULL,
  `account_holder` varchar(255) DEFAULT NULL,
  `account_no` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`id`, `user_id`, `bkash`, `nagod`, `bank_name`, `bank_account`, `branch_name`, `account_holder`, `account_no`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, '01312361494', '01312361494', 'Dutch-Bangla Bank', 'AA123123EEE5', 'Chalkbazar', 'Faisal', '090909012221', 0, '2025-12-15 23:41:08', '2025-12-15 23:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `group_name`, `guard_name`, `created_at`, `updated_at`) VALUES
(9, 'booking.menu', 'booking', 'web', '2025-12-08 12:14:23', '2025-12-08 12:14:23'),
(10, 'booking.operator.create', 'booking', 'web', '2025-12-08 12:14:23', '2025-12-08 12:14:23'),
(11, 'order.create', 'booking', 'web', '2025-12-08 12:14:23', '2025-12-08 12:14:23'),
(12, 'store.menu', 'store', 'web', '2025-12-08 12:14:23', '2025-12-08 12:14:23'),
(13, 'store.create', 'store', 'web', '2025-12-08 12:14:23', '2025-12-08 12:14:23'),
(14, 'store.admin.create', 'store', 'web', '2025-12-08 12:14:23', '2025-12-08 12:14:23'),
(15, 'hub.menu', 'hub', 'web', '2025-12-08 12:14:23', '2025-12-08 12:14:23'),
(16, 'hub.create', 'hub', 'web', '2025-12-08 12:14:23', '2025-12-08 12:14:23'),
(17, 'hub.incharge.create', 'hub', 'web', '2025-12-08 12:14:23', '2025-12-08 12:14:23'),
(18, 'store.incharge.create', 'hub', 'web', '2025-12-08 12:14:23', '2025-12-08 12:14:23'),
(19, 'dispatch.incharge.create', 'hub', 'web', '2025-12-08 12:14:23', '2025-12-08 12:14:23'),
(20, 'setting.menu', 'setting', 'web', '2025-12-08 12:14:23', '2025-12-08 12:14:23'),
(21, 'role.menu', 'role', 'web', '2025-12-08 12:14:23', '2025-12-08 12:14:23'),
(22, 'product.menu', 'product', 'web', '2025-12-08 12:14:23', '2025-12-08 12:14:23'),
(23, 'merchant.manage', 'merchant', 'web', '2025-12-08 12:14:23', '2025-12-08 12:14:23'),
(24, 'admin.create', 'setting', 'web', '2025-12-08 12:14:23', '2025-12-08 12:14:23'),
(31, 'courier.assign', 'courier', 'web', '2025-12-16 08:35:27', '2025-12-16 09:23:49');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `dimensions` varchar(255) DEFAULT NULL,
  `stock` varchar(255) NOT NULL DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `name`, `sku`, `category`, `weight`, `dimensions`, `stock`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tab. Peptica', 'SKU_250524030609', 'Pharmaceutical', '1', '12x12x12', '-2', NULL, '2025-12-12 08:15:42', '2025-12-31 12:11:58'),
(2, 1, 'T-Shirt', 'SKU_250408043436', 'T-shirt', '1', '12x12x12', '-9', NULL, '2025-12-12 08:15:55', '2026-01-06 03:20:36'),
(3, 3, 'Black T-shirt', NULL, 'T-shirt', '1', '12x12x12', '0', NULL, '2025-12-13 02:47:15', '2025-12-13 02:47:15'),
(4, 5, 'Watch', '123123', 'Ladies Watch', '.5', NULL, '7', 'uploads/products/20251216_062903_download (20).png', '2025-12-16 00:29:03', '2025-12-16 07:29:03'),
(5, 5, 'Black T-shirt', 'SKU-20251216065032-LOQXQFJP-5', 'T-shirt', '.5', NULL, '10', NULL, '2025-12-16 00:50:32', '2025-12-16 06:33:46'),
(6, 5, 'Black Shoes', 'SKU-20251216065351-HBWP1STY-5', 'Mens Shoe', '1', '12x12x13', '19', 'uploads/products/20251216_065500_imgi_47_O1CN01St1FzZ26WSTD0hptc__2628477669-0-cib.webp', '2025-12-16 00:53:51', '2025-12-16 07:11:03');

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Document', 'document', 1, '2025-11-15 22:06:29', '2025-11-24 20:38:15'),
(2, 'Parcel', 'parcel', 1, '2025-11-24 20:38:27', '2025-11-24 20:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(5, 'Merchant', 'web', '2025-12-08 12:14:23', '2025-12-08 12:14:23'),
(6, 'Hub Incharge', 'web', '2025-12-08 12:14:23', '2025-12-08 12:14:23'),
(7, 'Store Incharge', 'web', '2025-12-08 12:14:23', '2025-12-08 12:14:23'),
(8, 'Dispatch Incharge', 'web', '2025-12-08 12:14:23', '2025-12-08 12:14:23'),
(9, 'Store Admin', 'web', '2025-12-08 12:14:23', '2025-12-08 12:14:23'),
(10, 'Booking Operator', 'web', '2025-12-08 12:14:23', '2025-12-08 12:14:23'),
(11, 'Merchant Fullfillment', 'web', '2025-12-08 12:14:23', '2025-12-08 12:14:23'),
(12, 'Admin', 'web', '2025-12-16 07:47:19', '2025-12-16 07:47:19');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(9, 5),
(9, 10),
(9, 11),
(9, 12),
(10, 5),
(10, 11),
(10, 12),
(11, 10),
(11, 11),
(11, 12),
(12, 5),
(12, 9),
(12, 12),
(13, 5),
(13, 9),
(13, 12),
(14, 5),
(14, 9),
(14, 12),
(15, 12),
(16, 12),
(17, 12),
(18, 12),
(19, 12),
(20, 12),
(21, 12),
(22, 5),
(22, 12),
(23, 12),
(24, 12),
(31, 12);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('mYL9T6k7GBEVOFfwxboY3zWsxQFbL9VTcV66EJfx', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQ0o1N01qU0dvNjl3ZWdiajhKa2lGbWM2dFdLcXp1Z3pmbW05VVNvTyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo2MDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL2ludm9pY2UvcGRmLzIwMjYwMTA2MDkyMDM2QldMSVZNIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1768215725);

-- --------------------------------------------------------

--
-- Table structure for table `setup_charges`
--

CREATE TABLE `setup_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fulfilment_fee` decimal(8,2) DEFAULT NULL,
  `product_charges` decimal(8,2) DEFAULT NULL,
  `delivery_charges` decimal(8,2) DEFAULT NULL,
  `cod_fee` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_charges`
--

INSERT INTO `setup_charges` (`id`, `fulfilment_fee`, `product_charges`, `delivery_charges`, `cod_fee`, `created_at`, `updated_at`) VALUES
(1, 1000.00, 100.00, 180.00, 10.00, '2025-12-28 14:17:34', '2026-01-08 03:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `stock_movements`
--

CREATE TABLE `stock_movements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_movements`
--

INSERT INTO `stock_movements` (`id`, `store_id`, `product_id`, `type`, `qty`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'in', 1, 'this is first order', '2025-12-12 08:20:46', '2025-12-12 08:20:46'),
(2, 1, 1, 'in', 10, NULL, '2025-12-12 08:20:55', '2025-12-12 08:20:55'),
(3, 1, 2, 'in', 10, NULL, '2025-12-12 12:04:43', '2025-12-12 12:04:43'),
(4, 3, 6, 'in', 10, 'this is a note', '2025-12-16 06:21:14', '2025-12-16 06:21:14'),
(5, 3, 5, 'in', 10, 'this is a note', '2025-12-16 06:33:46', '2025-12-16 06:33:46'),
(6, 3, 4, 'in', 10, 'this is a note', '2025-12-16 06:34:09', '2025-12-16 06:34:09'),
(7, 3, 6, 'in', 10, NULL, '2025-12-16 06:40:36', '2025-12-16 06:40:36'),
(8, 3, 6, 'out', 2, NULL, '2025-12-16 06:41:39', '2025-12-16 06:41:39'),
(9, 6, 6, 'in', 6, NULL, '2025-12-16 06:43:58', '2025-12-16 06:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `merchant_id` varchar(255) NOT NULL,
  `store_admin_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `owner_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `owner_phone` varchar(255) DEFAULT NULL,
  `primary_phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zone` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pathao_store_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `merchant_id`, `store_admin_id`, `name`, `owner_name`, `email`, `owner_phone`, `primary_phone`, `address`, `logo`, `city`, `zone`, `area`, `status`, `created_at`, `updated_at`, `pathao_store_id`) VALUES
(1, '1', '2', 'Taabir', NULL, 'faisaltez@gmail.com', NULL, '01516173275', 'House No - 06, Road No - 01', NULL, '2', '405', '16306', 1, '2025-12-11 23:52:25', '2026-01-10 13:04:19', NULL),
(2, '3', '4', 'Taabir BD', NULL, 'jasmine@gmail.com', NULL, '01312361494', 'Andarkilla, Chittagong', NULL, '52', '156', '13193', 0, '2025-12-13 02:56:22', '2025-12-16 02:05:48', NULL),
(3, '5', NULL, 'Al Hira', 'Juwel', 'juwel@gmail.com', NULL, '01312361494', 'Andarkilla, Chittagong', 'uploads/store/store_1765879638_Th8E0i.png', '2', '79', '15868', 1, '2025-12-16 01:55:08', '2025-12-16 05:53:49', NULL),
(4, '5', NULL, 'Metro', NULL, 'samee@gmail.com', NULL, '01312361494', 'Andarkilla, Chittagong', NULL, '2', '1032', NULL, 1, '2025-12-16 02:13:19', '2025-12-16 05:53:43', NULL),
(5, '5', NULL, 'XYZ', 'Samee', 'samee1@gmail.com', NULL, '01312361494', 'Andarkilla, Chittagong', 'uploads/store/1765887047_69414c475f7d0.jpeg', '18', '929', '15856', 1, '2025-12-16 06:10:47', '2025-12-16 06:45:16', NULL),
(6, '5', '6', 'ABCD', 'Faisal', 'faisaltez@gmail.com', NULL, '01727656531', 'Jalan Perbandaran SS 7', 'uploads/store/1765887198_69414cded9714.jpeg', '2', '69', '5435', 1, '2025-12-16 06:13:18', '2025-12-16 06:18:51', NULL),
(7, '1', '8', 'Galvin Burns', 'Yetta Carlson', 'xopu@mailinator.com', NULL, '01312361494', 'Qui nisi quos libero', NULL, '64', '662', '13844', 1, '2026-01-03 23:31:27', '2026-01-03 23:31:40', NULL),
(8, '1', '13', 'Diana Rich', 'Paki Patterson', 'sifetohebe@mailinator.com', NULL, '01312361494', 'Suscipit ab proident', 'uploads/store/1768071539_6962a1737ed2d.png', '33', '526', '4591', 1, '2026-01-10 12:58:59', '2026-01-10 12:59:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `thanas`
--

CREATE TABLE `thanas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `nid` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'Merchant',
  `user_id` int(11) DEFAULT NULL,
  `hub_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `address`, `image`, `nid`, `role`, `user_id`, `hub_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Packer Panda', 'admin@gmail.com', NULL, '$2y$12$lZWyxBJThzWoceb6Fx9UN.FPBlwkcyF4Qrk5iH0bng/qV757ng5V.', '01700000000', 'Dhaka, Bangladesh', 'uploads/admin_images/20251214_162017_Packer_Panda_Icon-04.svg', NULL, 'Admin', NULL, NULL, 1, NULL, '2025-12-08 12:14:23', '2025-12-14 10:20:17'),
(2, 'Kaiser Uddin', 'kaiser@gmail.com', NULL, '$2y$12$ENuDOdvqKnWe9vDau4wB4uWQPKMq3PHi8hJMzXKBfR/Q/xC43xhAm', '01838906073', 'House No - 06, Road No - 01', NULL, NULL, 'Store Admin', 1, NULL, 1, NULL, '2025-12-11 23:52:53', '2025-12-11 23:52:56'),
(3, 'Fahad', 'fahad65@gmail.com', NULL, '$2y$12$YpOozqY6ad1byenUWVc5z.ZeLhT7X1whzcIWD8tiPahe2IMbgA68q', NULL, NULL, NULL, NULL, 'Merchant', NULL, NULL, 1, NULL, '2025-12-13 02:45:27', '2026-01-05 00:20:31'),
(4, 'Kutub Al Din', 'kutubal@gmail.com', NULL, '$2y$12$qW7BlV16GlvgI623p6L0ZOOaxJ1CT1MnkbkhulCRy0o6x0hVLjNQy', '01312361494', 'Andarkilla', NULL, NULL, 'Store Admin', 3, NULL, 1, NULL, '2025-12-13 03:54:49', '2025-12-13 03:54:54'),
(5, 'Nayem Islam', 'nayem@gmail.com', NULL, '$2y$12$fhS9IjXAHxJCeU1uhUPZNO8GMzfxQvg1f6Y12goJ/LfuCrOgSBD9O', '01312361494', 'House No - 06, Road No - 01', 'uploads/admin_images/20251216_054247_logo (2).png', 'uploads/nid_images/20251216_054649_1.jpg', 'Merchant', NULL, NULL, 1, NULL, '2025-12-15 23:37:40', '2025-12-31 10:55:28'),
(6, 'New Store Admin', 'newstore@gmail.com', NULL, '$2y$12$.Wh/nKvrkBfnFnwf.w/oneUp4cwftWSxBPzZrignrh7tWdvMnGh/y', '01312361494', 'Andarkilla, Chittagong', NULL, NULL, 'Store Admin', 5, NULL, 1, NULL, '2025-12-16 01:28:45', '2025-12-16 01:41:23'),
(7, 'Nafiz Karim', 'nafiz@gmail.com', NULL, '$2y$12$qGXw7z/RguBuhEah8MLusO1NbLwZJqKop9.A6P0/M6QK5r0DQGdLm', '01312361494', 'Andarkilla, Chittagong', NULL, NULL, 'Booking Operator', 5, NULL, 1, NULL, '2025-12-16 06:49:12', '2025-12-16 07:04:41'),
(8, 'Jasmine Akther', 'jasmine@gmail.com', NULL, '$2y$12$0D2jRFVCxM.buA9661rDFe/2V9TU/5B0OJ1k.71SD.HbvbsWQWxXm', '01516173275', 'Muradpur', NULL, NULL, 'Store Admin', 1, NULL, 1, NULL, '2026-01-03 23:30:26', '2026-01-03 23:30:32'),
(9, 'Kaiser Uddin', 'kaiserhub@gmail.com', NULL, '$2y$12$9B.GmXEfOO7X1ADP1sycUecFTqNdgJlyx5lj6ZojGG7fF/pSUrv4O', '01838906073', 'House No - 06, Road No - 01', NULL, NULL, 'Hub Incharge', 1, 1, 1, NULL, '2026-01-03 23:33:03', '2026-01-03 23:33:31'),
(10, 'Korim', 'korim@gmail.com', NULL, '$2y$12$h6moD/TShPIzRpTpgL1N1.K353YjvozHYDfZLC1xn2DhFqU1Eg6/K', '01516173275', 'Muradpur', NULL, NULL, 'Hub Incharge', 1, 2, 1, NULL, '2026-01-03 23:33:19', '2026-01-03 23:33:28'),
(11, 'Faisal Salam', 'faisalsalam@gmail.com', NULL, '$2y$12$eMOLYnDcDDnuAzQMJaH8POCLu9fGvjQgZ.OwOaar18RpH4X2KfWOq', '0172765653', 'Jalan Perbandaran SS 7\r\nB308', NULL, NULL, 'Store Incharge', 1, 2, 1, NULL, '2026-01-03 23:36:19', '2026-01-03 23:36:50'),
(12, 'Dispatch Incharge', 'dispatch@gmail.com', NULL, '$2y$12$sQYSgCUPIV6COXHcdnXx5uDK6eAVu953kn1Evs6S8K2OLTRcUuD7m', '01516173275', 'Muradpur', NULL, NULL, 'Dispatch Incharge', 1, 1, 1, NULL, '2026-01-03 23:37:25', '2026-01-03 23:37:33'),
(13, 'Hanif', 'hanif@gmail.com', NULL, '$2y$12$rPCnl6a6uJxZ95VvyvMLj.P6QLn05pGT5LOKqjSr1VhE/fIN2Ok7S', '01516173275', 'Muradpur', NULL, NULL, 'Store Admin', 1, NULL, 1, NULL, '2026-01-10 12:58:10', '2026-01-10 12:58:19');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `zone_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `city_id`, `zone_id`, `zone_name`, `created_at`, `updated_at`) VALUES
(1, 52, 156, 'Bagerhat Sadar', '2025-11-21 12:23:02', '2025-11-21 12:23:02'),
(2, 52, 594, 'Chitalmari', '2025-11-21 12:23:02', '2025-11-21 12:23:02'),
(3, 52, 989, 'Dacope', '2025-11-21 12:23:02', '2025-11-21 12:23:02'),
(4, 52, 595, 'Fakirhat', '2025-11-21 12:23:02', '2025-11-21 12:23:02'),
(5, 52, 596, 'Kachua', '2025-11-21 12:23:02', '2025-11-21 12:23:02'),
(6, 52, 593, 'Mollahat', '2025-11-21 12:23:02', '2025-11-21 12:23:02'),
(7, 52, 868, 'Mongla', '2025-11-21 12:23:02', '2025-11-21 12:23:02'),
(8, 52, 2129, 'Mongla Sadar', '2025-11-21 12:23:02', '2025-11-21 12:23:02'),
(9, 52, 597, 'Morelganj', '2025-11-21 12:23:02', '2025-11-21 12:23:02'),
(10, 52, 598, 'Rampal', '2025-11-21 12:23:02', '2025-11-21 12:23:02'),
(11, 52, 599, 'Rayenda', '2025-11-21 12:23:02', '2025-11-21 12:23:02'),
(12, 52, 984, 'Sarankhola', '2025-11-21 12:23:02', '2025-11-21 12:23:02'),
(13, 62, 714, 'Alikadam', '2025-11-21 12:23:02', '2025-11-21 12:23:02'),
(14, 62, 166, 'Bandarban Sadar', '2025-11-21 12:23:02', '2025-11-21 12:23:02'),
(15, 62, 692, 'Kalaghata', '2025-11-21 12:23:02', '2025-11-21 12:23:02'),
(16, 62, 696, 'Lama', '2025-11-21 12:23:02', '2025-11-21 12:23:02'),
(17, 62, 1008, 'Naikhong', '2025-11-21 12:23:02', '2025-11-21 12:23:02'),
(18, 62, 693, 'Roanchhari', '2025-11-21 12:23:02', '2025-11-21 12:23:02'),
(19, 62, 695, 'Thanchi', '2025-11-21 12:23:02', '2025-11-21 12:23:02'),
(20, 34, 931, 'Amtali', '2025-11-21 12:23:03', '2025-11-21 12:23:03'),
(21, 34, 933, 'Bamna', '2025-11-21 12:23:03', '2025-11-21 12:23:03'),
(22, 34, 135, 'Barguna Sadar', '2025-11-21 12:23:03', '2025-11-21 12:23:03'),
(23, 34, 932, 'Betagi', '2025-11-21 12:23:03', '2025-11-21 12:23:03'),
(24, 34, 934, 'Patharghata', '2025-11-21 12:23:03', '2025-11-21 12:23:03'),
(25, 34, 930, 'Taltoli', '2025-11-21 12:23:03', '2025-11-21 12:23:03'),
(26, 17, 911, 'Agailzhara', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(27, 17, 916, 'Babuganj', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(28, 17, 915, 'Bakergonj', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(29, 17, 914, 'Banaripara', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(30, 17, 1014, 'Barisal Bandor Thana', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(31, 17, 113, 'Barisal Sadar', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(32, 17, 910, 'Gauronodi', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(33, 17, 912, 'Hizla', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(34, 17, 909, 'Kotowali', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(35, 17, 607, 'Mahendiganj', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(36, 17, 913, 'Muladi', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(37, 17, 917, 'Wazirpur Powrosova', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(38, 32, 2678, 'Ajampur', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(39, 32, 546, 'Akhaura', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(40, 32, 2677, 'Akhaura Checkpost', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(41, 32, 728, 'Ashuganj Sadar', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(42, 32, 2661, 'Austagram Ashuganj', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(43, 32, 133, 'Banchharampur', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(44, 32, 748, 'Bijoynagar', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(45, 32, 547, 'Brahamanbaria Sadar', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(46, 32, 2660, 'Char Chartola', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(47, 32, 2672, 'Chargachh', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(48, 32, 548, 'Kasba', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(49, 32, 2666, 'Kasba Sadar', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(50, 32, 2667, 'Kasba West', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(51, 32, 2671, 'Kharera', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(52, 32, 2676, 'Khorompur', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(53, 32, 2669, 'Kuti', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(54, 32, 2663, 'Lalpur Ashuganj', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(55, 32, 2674, 'Mogra Bazar', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(56, 32, 2670, 'Mojlishpur-kasba', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(57, 32, 2673, 'Moniondha', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(58, 32, 549, 'Nabinagar', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(59, 32, 551, 'Nasirnagar', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(60, 32, 2668, 'Noyanpur', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(61, 32, 2665, 'Panishwar-Sarail', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(62, 32, 550, 'Sarail', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(63, 32, 2662, 'Sohagpur', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(64, 32, 2664, 'Talshahar', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(65, 32, 2675, 'Tontor Bazar', '2025-11-21 12:23:04', '2025-11-21 12:23:04'),
(66, 53, 157, 'Bhola Sadar', '2025-11-21 12:23:05', '2025-11-21 12:23:05'),
(67, 53, 900, 'Burhanuddin', '2025-11-21 12:23:05', '2025-11-21 12:23:05'),
(68, 53, 903, 'Char fashion', '2025-11-21 12:23:05', '2025-11-21 12:23:05'),
(69, 53, 904, 'Dokkhin aicha', '2025-11-21 12:23:05', '2025-11-21 12:23:05'),
(70, 53, 899, 'Doulatkhan', '2025-11-21 12:23:05', '2025-11-21 12:23:05'),
(71, 53, 901, 'Lalmohon', '2025-11-21 12:23:05', '2025-11-21 12:23:05'),
(72, 53, 2453, 'Monpura', '2025-11-21 12:23:05', '2025-11-21 12:23:05'),
(73, 53, 2128, 'Soshibushion', '2025-11-21 12:23:05', '2025-11-21 12:23:05'),
(74, 53, 902, 'Tazumuddin', '2025-11-21 12:23:05', '2025-11-21 12:23:05'),
(75, 9, 753, 'Adamdighi', '2025-11-21 12:23:06', '2025-11-21 12:23:06'),
(76, 9, 480, 'Bogra - Gabtoli', '2025-11-21 12:23:06', '2025-11-21 12:23:06'),
(77, 9, 104, 'Bogra Sadar', '2025-11-21 12:23:06', '2025-11-21 12:23:06'),
(78, 9, 756, 'Dhunat', '2025-11-21 12:23:06', '2025-11-21 12:23:06'),
(79, 9, 719, 'Dupchachia', '2025-11-21 12:23:06', '2025-11-21 12:23:06'),
(80, 9, 479, 'Kahalu', '2025-11-21 12:23:06', '2025-11-21 12:23:06'),
(81, 9, 754, 'Nandigram', '2025-11-21 12:23:06', '2025-11-21 12:23:06'),
(82, 9, 752, 'Sariakandi', '2025-11-21 12:23:06', '2025-11-21 12:23:06'),
(83, 9, 1488, 'Shahjahanpur', '2025-11-21 12:23:06', '2025-11-21 12:23:06'),
(84, 9, 751, 'Shajahanpur-Bogra', '2025-11-21 12:23:06', '2025-11-21 12:23:06'),
(85, 9, 757, 'Shantaher', '2025-11-21 12:23:06', '2025-11-21 12:23:06'),
(86, 9, 478, 'Sherpur', '2025-11-21 12:23:06', '2025-11-21 12:23:06'),
(87, 9, 481, 'Shibganj', '2025-11-21 12:23:06', '2025-11-21 12:23:06'),
(88, 9, 755, 'Sonatola', '2025-11-21 12:23:06', '2025-11-21 12:23:06'),
(89, 8, 102, 'Chandpur Sadar', '2025-11-21 12:23:06', '2025-11-21 12:23:06'),
(90, 8, 563, 'Faridganj', '2025-11-21 12:23:06', '2025-11-21 12:23:06'),
(91, 8, 565, 'Hayemchar', '2025-11-21 12:23:06', '2025-11-21 12:23:06'),
(92, 8, 564, 'Haziganj', '2025-11-21 12:23:06', '2025-11-21 12:23:06'),
(93, 8, 566, 'Kachua', '2025-11-21 12:23:06', '2025-11-21 12:23:06'),
(94, 8, 667, 'Matlab', '2025-11-21 12:23:06', '2025-11-21 12:23:06'),
(95, 8, 749, 'Matlab-Uttar', '2025-11-21 12:23:06', '2025-11-21 12:23:06'),
(96, 8, 567, 'Shahrasti', '2025-11-21 12:23:06', '2025-11-21 12:23:06'),
(97, 15, 558, 'Bholahat', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(98, 15, 111, 'Chapainawabganj Sadar', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(99, 15, 508, 'Gomastapur', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(100, 15, 559, 'Nachole', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(101, 15, 509, 'Shibganj', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(102, 2, 78, 'Akbarsha', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(103, 2, 434, 'Anawara', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(104, 2, 69, 'Andarkilla', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(105, 2, 453, 'Anowara', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(106, 2, 83, 'Bakoliya thana', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(107, 2, 459, 'Bashkhali', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(108, 2, 80, 'Bayazid', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(109, 2, 394, 'Bibir Hat - Fatikchori', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(110, 2, 681, 'Boalkhali', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(111, 2, 1027, 'Bondor', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(112, 2, 73, 'CEPZ', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(113, 2, 1015, 'Chandanaish', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(114, 2, 375, 'Chandgaon', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(115, 2, 79, 'Chawkbazar (Chattogram)', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(116, 2, 460, 'CTG - Lohagara', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(117, 2, 1032, 'Dohajari', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(118, 2, 86, 'Double mooring', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(119, 2, 400, 'East Joara', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(120, 2, 405, 'Enayet bazar', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(121, 2, 417, 'Fatikchhari', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(122, 2, 75, 'Halishahar', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(123, 2, 81, 'Hathazari', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(124, 2, 2467, 'Karnaphuli EPZ - Potenga', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(125, 2, 993, 'Karnophuli', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(126, 2, 2714, 'Karolia-Takia Fatikchori', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(127, 2, 2721, 'Kazirhat Borobill-Fatikchori', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(128, 2, 716, 'Keranihat', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(129, 2, 84, 'Khulshi', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(130, 2, 2468, 'Korean EPZ - Anwara ', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(131, 2, 364, 'Kotowali Chittagong', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(132, 2, 987, 'Kotwali (Chattogram)', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(133, 2, 70, 'Lalkhan Bazar', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(134, 2, 87, 'Mirsharai', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(135, 2, 2476, 'Muradpur - Bibirhat', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(136, 2, 685, 'Nasirabad', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(137, 2, 703, 'Nazirhat', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(138, 2, 72, 'New Market CTG', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(139, 2, 2713, 'On-Demand-Chattogram', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(140, 2, 986, 'Pahartoli-Halishahar', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(141, 2, 2658, 'Pahartoli-Raozan', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(142, 2, 333, 'Panchlaish ctg', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(143, 2, 457, 'Patia', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(144, 2, 378, 'Rangunia', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(145, 2, 2475, 'Rangunia - Ranirhat', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(146, 2, 68, 'Raozan', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(147, 2, 365, 'Sadarghat (Chattogram)', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(148, 2, 705, 'Sandwip', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(149, 2, 371, 'Satkaniya', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(150, 2, 420, 'Sitakunda', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(151, 2, 1026, 'Vatiary', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(152, 2, 730, 'Zorarganj', '2025-11-21 12:23:07', '2025-11-21 12:23:07'),
(153, 61, 647, 'Alamdanga', '2025-11-21 12:23:08', '2025-11-21 12:23:08'),
(154, 61, 165, 'Chuadanga Sadar', '2025-11-21 12:23:08', '2025-11-21 12:23:08'),
(155, 61, 591, 'Damurhuda', '2025-11-21 12:23:08', '2025-11-21 12:23:08'),
(156, 61, 968, 'Darshana', '2025-11-21 12:23:08', '2025-11-21 12:23:08'),
(157, 61, 592, 'Doulatganj', '2025-11-21 12:23:08', '2025-11-21 12:23:08'),
(158, 61, 646, 'Jiban nagar', '2025-11-21 12:23:08', '2025-11-21 12:23:08'),
(159, 11, 107, 'Chakaria', '2025-11-21 12:23:08', '2025-11-21 12:23:08'),
(160, 11, 106, 'Cox\'s bazar Sadar', '2025-11-21 12:23:08', '2025-11-21 12:23:08'),
(161, 11, 898, 'Eidgah', '2025-11-21 12:23:08', '2025-11-21 12:23:08'),
(162, 11, 638, 'Kutubdia', '2025-11-21 12:23:08', '2025-11-21 12:23:08'),
(163, 11, 896, 'Moheshkhali', '2025-11-21 12:23:08', '2025-11-21 12:23:08'),
(164, 11, 560, 'Pakua', '2025-11-21 12:23:08', '2025-11-21 12:23:08'),
(165, 11, 561, 'Ramu', '2025-11-21 12:23:08', '2025-11-21 12:23:08'),
(166, 11, 897, 'Teknaf', '2025-11-21 12:23:08', '2025-11-21 12:23:08'),
(167, 11, 562, 'Ukhia', '2025-11-21 12:23:08', '2025-11-21 12:23:08'),
(168, 5, 2019, 'Adarsha Sadar', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(169, 5, 2139, 'Bagmaranorth', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(170, 5, 2140, 'Bagmara South', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(171, 5, 2258, 'Bakoi', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(172, 5, 534, 'Barura', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(173, 5, 738, 'Batakandi', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(174, 5, 2236, 'Belghar south', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(175, 5, 2218, 'Belghar Uttor ', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(176, 5, 2261, 'Bhuloin North ', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(177, 5, 91, 'B.Para', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(178, 5, 92, 'B. Para - Burichang', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(179, 5, 98, 'Chandina', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(180, 5, 2134, 'chandina bazar', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(181, 5, 97, 'Chauddagram', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(182, 5, 1497, 'Chayfullakandi', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(183, 5, 732, 'Comilla Companigonj', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(184, 5, 741, 'Cumilla Cantonment', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(185, 5, 93, 'Cumilla Sadar', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(186, 5, 734, 'Cumilla Sadar Dakkhin ', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(187, 5, 545, 'Daudkandi', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(188, 5, 1528, 'Delivery Cumilla City A', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(189, 5, 1529, 'Delivery Cumilla City B', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(190, 5, 99, 'Devidwar', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(191, 5, 736, 'Eliotgonj', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(192, 5, 1496, 'Farry Ghat', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(193, 5, 737, 'Gouripur', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(194, 5, 96, 'Homna', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(195, 5, 2020, 'Kangshanagar ', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(196, 5, 731, 'Kotbari', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(197, 5, 2135, 'Kutumpur', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(198, 5, 94, 'Laksam', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(199, 5, 735, 'Lalmai', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(200, 5, 2132, 'Madaiya Bazar', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(201, 5, 740, 'Meghna ', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(202, 5, 552, 'Mia-Bazar', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(203, 5, 733, 'Monohorgonj', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(204, 5, 2034, 'Moynamoti', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(205, 5, 103, 'Muddafarganj', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(206, 5, 553, 'Muradnagar', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(207, 5, 95, 'Nangolkot', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(208, 5, 2021, 'Nimshar', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(209, 5, 2259, 'Perul North', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(210, 5, 2260, 'Perul South', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(211, 5, 1494, 'Ruposhdi', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(212, 5, 1495, 'Sonarampur', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(213, 5, 2455, 'Sultanpur Union', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(214, 5, 739, 'Titash', '2025-11-21 12:23:09', '2025-11-21 12:23:09'),
(215, 1, 298, '60 feet', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(216, 1, 1070, 'Abdullahpur Uttara', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(217, 1, 1066, 'Abul Hotel', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(218, 1, 52, 'Adabor', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(219, 1, 1094, 'Adarsha Nagar - Kutubpur', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(220, 1, 300, 'Aftab Nagar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(221, 1, 1764, 'Aganagar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(222, 1, 17, 'Agargaon', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(223, 1, 1108, 'Agargaon-Taltola', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(224, 1, 1757, 'Akran Bazar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(225, 1, 2700, 'Ali Nagar Bazar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(226, 1, 1465, 'Amin Bazar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(227, 1, 1765, 'Amritopur', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(228, 1, 1749, 'Amtola', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(229, 1, 317, 'Arambag', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(230, 1, 965, 'Ashkona', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(231, 1, 1538, 'Ashulia Bazar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(232, 1, 1041, 'azampur (Uttara)', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(233, 1, 55, 'Azimpur (Lalbag)', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(234, 1, 30, 'Badda', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(235, 1, 312, 'Baily Road', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(236, 1, 1476, 'Baipail', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(237, 1, 274, 'Bakshi Bazar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(238, 1, 1466, 'Bakurta', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(239, 1, 292, 'Balughat', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(240, 1, 1, 'Banani', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(241, 1, 181, 'Banani DOHS', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(242, 1, 1763, 'banani hq', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(243, 1, 24, 'Banasree (Block A-G)', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(244, 1, 1058, 'Banasree (Block H-J)', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(245, 1, 40, 'Bangla bazar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(246, 1, 355, 'Banglamotor', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(247, 1, 250, 'Bangshal', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(248, 1, 1531, 'Bank Colony, Savar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(249, 1, 958, 'Baridhara Diplomatic Zone', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(250, 1, 959, 'Baridhara DOHS', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(251, 1, 960, 'Baridhara J Block', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(252, 1, 1747, 'Barobaria', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(253, 1, 1477, 'Baroipara', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(254, 1, 303, 'Bashabo', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(255, 1, 6, 'Bashundhara R/A', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(256, 1, 176, 'Bawnia', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(257, 1, 1138, 'Begunbari', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(258, 1, 1132, 'Benaroshi Polli', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(259, 1, 1169, 'Benaroshi polli Blok A', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(260, 1, 1170, 'Benaroshi polli Blok B,C', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(261, 1, 1171, 'Benaroshi polli Blok D', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(262, 1, 981, 'Beraid', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(263, 1, 1554, 'Bibir Bagicha', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(264, 1, 1167, 'Block A,B, Mirpur 6', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(265, 1, 1154, 'Block A, C, Mirpur 11', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(266, 1, 1155, 'Block B, D, Mirpur 11', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(267, 1, 1166, 'Block D,E , Mirpur 6', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(268, 1, 1165, 'Block-E, Mirpur 12', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(269, 1, 1759, 'Bolivodro', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(270, 1, 1503, 'Borobag', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(271, 1, 2705, 'Borogram', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(272, 1, 964, 'Boro Moghbazar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(273, 1, 1499, 'Bosila', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(274, 1, 1785, 'Brahmonkitta', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(275, 1, 351, 'BUET', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(276, 1, 1168, 'Bulk Merchant', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(277, 1, 2752, 'Central Fulfillment', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(278, 1, 972, 'Central Road', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(279, 1, 1478, 'Chakraborty', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(280, 1, 1539, 'Charabag, Ashulia', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(281, 1, 630, 'ChawkBazar (Dhaka)', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(282, 1, 1766, 'Chunkutia', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(283, 1, 2708, 'Company Ghat', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(284, 1, 15, 'Dakshinkhan', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(285, 1, 287, 'Darussalam', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(286, 1, 245, 'Demra', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(287, 1, 1533, 'Deogao, Savar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(288, 1, 342, 'Dhaka cantonment', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(289, 1, 1056, 'Dhaka Medical', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(290, 1, 1501, 'Dhaka Uddyan', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(291, 1, 200, 'Dhaka University', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(292, 1, 1744, 'Dhamrai', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(293, 1, 1016, 'Dhamrai , Savar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(294, 1, 62, 'Dhanmondi', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(295, 1, 1552, 'Dholaipar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(296, 1, 979, 'Dholpur', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(297, 1, 264, 'Dhonia', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(298, 1, 1745, 'Dhulivita', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(299, 1, 1045, 'Diabari', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(300, 1, 966, 'DIT Road', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(301, 1, 1948, 'Document-Central', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(302, 1, 1075, 'Dohar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(303, 1, 23, 'ECB', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(304, 1, 967, 'Elephant Road', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(305, 1, 1479, 'EPZ', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(306, 1, 1079, 'Equria Thana', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(307, 1, 311, 'Eskaton', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(308, 1, 1149, 'Estern Housing', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(309, 1, 1131, 'Extension Pallabi', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(310, 1, 13, 'Faidabad', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(311, 1, 978, 'Faridabad', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(312, 1, 46, 'Farmgate', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(313, 1, 1469, 'Fulbariya', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(314, 1, 293, 'Gabtoli', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(315, 1, 42, 'Gandaria', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(316, 1, 1537, 'Ganda, Savar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(317, 1, 1767, 'GhatarChar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(318, 1, 1097, 'Giridhara Abashik', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(319, 1, 1541, 'Gobindopur', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(320, 1, 1768, 'Golam Bazar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(321, 1, 254, 'Gopibagh', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(322, 1, 308, 'Goran', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(323, 1, 1062, 'Gulbagh', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(324, 1, 35, 'Gulisthan', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(325, 1, 4, 'Gulshan 1', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(326, 1, 5, 'Gulshan 2', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(327, 1, 2706, 'Hasan Nagar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(328, 1, 1769, 'Hasnabad', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(329, 1, 213, 'Hatirpool', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(330, 1, 56, 'Hazaribagh', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(331, 1, 1467, 'Hemayetpur', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(332, 1, 1043, 'house building', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(333, 1, 1935, 'Huzurbari Gate', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(334, 1, 1035, 'Ibrahimpur', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(335, 1, 1984, 'Islambag', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(336, 1, 257, 'Islampur', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(337, 1, 243, 'Islampur (Dhamrai)', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(338, 1, 1520, 'Jahangirnagar, Savar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(339, 1, 1473, 'Jamgora', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(340, 1, 1054, 'Jhauchor', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(341, 1, 2704, 'Jhawlahati', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(342, 1, 61, 'Jigatola', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(343, 1, 1063, 'Joardar Lane', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(344, 1, 1934, 'Jonopoth More Bus Stop', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(345, 1, 1150, 'Journalist Residential Area', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(346, 1, 977, 'Jurain', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(347, 1, 980, 'Kadamtoli', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(348, 1, 63, 'Kalabagan', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(349, 1, 1491, 'kalachadpur', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(350, 1, 1746, 'Kalampur', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(351, 1, 1771, 'Kalindi', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(352, 1, 64, 'Kallyanpur', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(353, 1, 252, 'Kamalapur', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(354, 1, 655, 'Kamranggirchar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(355, 1, 2702, 'Kamrangirchar Thana', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(356, 1, 1938, 'Karatitola', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(357, 1, 1556, 'Katashur', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(358, 1, 1536, 'Katghora, Savar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(359, 1, 59, 'Kathalbagan', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(360, 1, 1750, 'Kawalipara', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(361, 1, 16, 'Kawla', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(362, 1, 58, 'Kawran Bazar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(363, 1, 286, 'Kazipara', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(364, 1, 66, 'Keraniganj', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(365, 1, 1772, 'Keraniganj Abdullahpur', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(366, 1, 1773, 'Keraniganj Atibazar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(367, 1, 1774, 'Keraniganj BoshundhoraRiverview ', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(368, 1, 1770, 'Keraniganj Kaliganj', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(369, 1, 1077, 'Keraniganj Model Thana', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(370, 1, 1775, 'Keraniganj Rajendrapur', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(371, 1, 1776, 'Khejurbag', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(372, 1, 29, 'Khilgaon', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(373, 1, 178, 'Khilkhet', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(374, 1, 1777, 'Kholamura', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(375, 1, 1748, 'Khorarchar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(376, 1, 290, 'Kochukhet', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(377, 1, 1778, 'Kodomtoli.', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(378, 1, 1779, 'Kolatia', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(379, 1, 1756, 'Kolma', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(380, 1, 1780, 'Konakhola', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(381, 1, 247, 'Konapara', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(382, 1, 239, 'Kotwali (Dhaka)', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(383, 1, 2707, 'Koyla Ghat', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(384, 1, 177, 'Kuril', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(385, 1, 1551, 'Kutubkhali', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(386, 1, 260, 'Lakshmibazar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(387, 1, 57, 'Lalbag', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(388, 1, 1036, 'Lalkuthi', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(389, 1, 1498, 'Lalmatia', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(390, 1, 1540, 'LaxmiBazar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(391, 1, 1102, 'london market', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(392, 1, 1140, 'lost', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(393, 1, 1157, 'Love Road, Mirpur-2', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(394, 1, 1093, 'Madani nagar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(395, 1, 2699, 'Madbor Bazar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(396, 1, 1065, 'Malibagh  Baganbari', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(397, 1, 1060, 'Malibagh College Road', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(398, 1, 1061, 'Malibagh Lane', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(399, 1, 1064, 'Malibagh Pabna Colony', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(400, 1, 1937, 'Maloncho Road', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(401, 1, 971, 'Manda', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(402, 1, 337, 'Manikdi', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(403, 1, 251, 'Manik Nagar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(404, 1, 1158, 'Masjid Market, Mirpur 2', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(405, 1, 291, 'Matikata', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(406, 1, 255, 'Matuail', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(407, 1, 1134, 'Mazar road', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(408, 1, 1099, 'Middle Rosulbag', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(409, 1, 1553, 'Mirhazirbag', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(410, 1, 171, 'Mirpur 1', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(411, 1, 19, 'Mirpur 10', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(412, 1, 20, 'Mirpur 11', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(413, 1, 1156, 'Mirpur 11 Lalmatia', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(414, 1, 280, 'Mirpur 12', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(415, 1, 1163, 'Mirpur 12 Block A,C', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(416, 1, 1164, 'Mirpur 12 Block-Dhak, B', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(417, 1, 1176, 'Mirpur 12 Block Ta', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(418, 1, 717, 'Mirpur 13', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(419, 1, 21, 'Mirpur 14', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(420, 1, 1151, 'Mirpur 1 Market Area', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(421, 1, 22, 'Mirpur 2', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(422, 1, 283, 'Mirpur 6', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(423, 1, 1172, 'Mirpur 6 (Block C)', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(424, 1, 475, 'Mirpur 7', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(425, 1, 1159, 'Mirpur Cantonment', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(426, 1, 1174, 'Mirpur Cantonment (Ave new 3 )', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(427, 1, 281, 'Mirpur DOHS', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(428, 1, 1173, 'Mirpur DOHS (Ave new 2)', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(429, 1, 1175, 'Mirpur DOHS (Ave New 9)', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(430, 1, 1161, 'Mirpur-Rupnagar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(431, 1, 315, 'Modhubag', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(432, 1, 32, 'Mogbazar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(433, 1, 2, 'Mohakhali', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(434, 1, 11, 'Mohakhali DOHS', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(435, 1, 50, 'Mohammadpur', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(436, 1, 233, 'Monipur', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(437, 1, 1101, 'Monumia Market', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(438, 1, 34, 'Motijheel', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(439, 1, 307, 'Mugda', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(440, 1, 1096, 'mukti nagar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(441, 1, 2703, 'Munshi Hati', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(442, 1, 182, 'Nadda', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(443, 1, 10, 'Nakhalpara', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(444, 1, 1074, 'Nakhal para', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(445, 1, 1095, 'narayanpur - keshobpur', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(446, 1, 266, 'Narinda', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(447, 1, 627, 'Nawabganj (Dhaka)', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(448, 1, 1076, 'Nawabganj (Dohar)', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(449, 1, 259, 'Nawabpur', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(450, 1, 41, 'Naya Bazar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(451, 1, 1139, 'Nayanagar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(452, 1, 205, 'Nazim Uddin Road', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(453, 1, 36, 'Nazira Bazar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(454, 1, 60, 'New Elephant Road', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(455, 1, 201, 'New Market', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(456, 1, 1055, 'new paltan azimpur', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(457, 1, 1942, 'New Town R/A ', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(458, 1, 9, 'Niketan', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(459, 1, 8, 'Nikunja', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(460, 1, 961, 'Nikunja 2', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(461, 1, 210, 'Nilkhet', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(462, 1, 1092, 'Nimaikishori', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(463, 1, 1470, 'Nischintapur', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(464, 1, 1482, 'Nobinagar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(465, 1, 1500, 'Nobodoy', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(466, 1, 1471, 'Norosinhopur', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(467, 1, 1557, 'North Badda', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(468, 1, 1113, 'North Sanarpar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(469, 1, 179, 'Notun Bazar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(470, 1, 2698, 'Noyanagar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(471, 1, 1484, 'Noyarhat', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(472, 1, 1067, 'Noyatola road', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(473, 1, 316, 'Nurerchala', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(474, 1, 2035, 'On-Demand', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(475, 1, 1009, 'On-demand  transfer', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(476, 1, 18, 'Paikpara', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(477, 1, 1534, 'Pakiza, Savar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(478, 1, 975, 'Pallabi', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(479, 1, 1160, 'Pallabi Residential area', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(480, 1, 1481, 'Palli Bidyut', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(481, 1, 33, 'Paltan', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(482, 1, 750, 'Panthapath', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(483, 1, 1939, 'Paterbag', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(484, 1, 2016, 'Pathao Central FTL', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(485, 1, 2081, 'Pathao Central Inbound', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(486, 1, 2017, 'Pathao Central LTL', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(487, 1, 973, 'Pirerbagh', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(488, 1, 1480, 'Polashbari', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(489, 1, 1940, 'Polashpur', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(490, 1, 1530, 'Radio Colony, Savar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(491, 1, 1535, 'Rajashon, Savar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(492, 1, 1042, 'rajlakkhi market', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(493, 1, 28, 'Rampura', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(494, 1, 324, 'ranavola', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(495, 1, 244, 'Rayerbag', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(496, 1, 1071, 'Rayer Bazar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(497, 1, 1137, 'Razarbag Police line', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(498, 1, 1543, 'Rohitpur', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(499, 1, 2701, 'Rony Market', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(500, 1, 974, 'Rupnagar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(501, 1, 258, 'Sadarghat (Dhaka)', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(502, 1, 1941, 'Saddam Market', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(503, 1, 1472, 'Sarkar Market', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(504, 1, 1754, 'Savar Bazar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(505, 1, 1046, 'Savar-Nabinagar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(506, 1, 1755, 'Savar Thana Road', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(507, 1, 39, 'Saydabad', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(508, 1, 1936, 'Sayedabad Bus Terminal', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(509, 1, 173, 'Senpara', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(510, 1, 1502, 'Senpara Parbata', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(511, 1, 1162, 'Shagufta Block-D', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(512, 1, 1135, 'Shah Ali Bag', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(513, 1, 199, 'Shahbag', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(514, 1, 1550, 'Shahid Faruk Road', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(515, 1, 957, 'Shahid Nagar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(516, 1, 180, 'Shahjadpur', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(517, 1, 318, 'Shajahanpur', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(518, 1, 976, 'shampur', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(519, 1, 38, 'Shanir Akhra', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(520, 1, 1072, 'shankar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(521, 1, 26, 'Shantinagar ', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(522, 1, 302, 'Shegunbagicha', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(523, 1, 1542, 'Sheikhdi', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(524, 1, 1152, 'Sheikh Rasel Park', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(525, 1, 1037, 'Sher-e Bangla Nagar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(526, 1, 1133, 'Sher-E-Bangla National Cricket Stadium', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(527, 1, 174, 'Shewrapara', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(528, 1, 306, 'Shiddeshwari', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(529, 1, 1100, 'Shimrail', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(530, 1, 1474, 'Shimultola Jamgora', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(531, 1, 1532, 'Shimultola, Savar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(532, 1, 1128, 'Shishu Mela', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(533, 1, 304, 'Shobujbag', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(534, 1, 31, 'Shonalibagh', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(535, 1, 1555, 'Shukrabad', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(536, 1, 1782, 'Shuvadda', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(537, 1, 198, 'Shyamoli', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(538, 1, 1468, 'Singair Road', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(539, 1, 1492, 'Solmaid', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(540, 1, 297, 'SONY Cinema Hall', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(541, 1, 1558, 'South Badda', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(542, 1, 963, 'South Banasree', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(543, 1, 1111, 'South kafrul', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(544, 1, 1487, 'Sreepur-Kashimpur', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(545, 1, 661, 'Sutrapur', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(546, 1, 1136, 'Technical', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(547, 1, 3, 'Tejgaon', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(548, 1, 1559, 'Tejkunipara', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(549, 1, 1485, 'Tenari Savar', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(550, 1, 282, 'Tolarbag', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(551, 1, 327, 'Turag', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(552, 1, 1475, 'Unique Bus Stand', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(553, 1, 12, 'Uttara Sector 1', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(554, 1, 941, 'Uttara Sector 10', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(555, 1, 942, 'Uttara Sector 11', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(556, 1, 943, 'Uttara Sector 12', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(557, 1, 944, 'Uttara Sector 13', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(558, 1, 945, 'Uttara Sector 14', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(559, 1, 1000, 'Uttara Sector 15', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(560, 1, 1001, 'Uttara Sector 16', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(561, 1, 1002, 'Uttara Sector 17', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(562, 1, 1003, 'Uttara Sector 18', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(563, 1, 935, 'Uttara Sector 3', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(564, 1, 936, 'Uttara Sector 4', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(565, 1, 937, 'Uttara Sector 5', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(566, 1, 938, 'Uttara sector 6', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(567, 1, 939, 'Uttara Sector 7', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(568, 1, 946, 'Uttara Sector 8', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(569, 1, 940, 'Uttara Sector 9', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(570, 1, 14, 'UttarKhan', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(571, 1, 1483, 'Vadail', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(572, 1, 289, 'Vasan Tek', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(573, 1, 236, 'Vootergoli', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(574, 1, 37, 'Wari', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(575, 1, 1109, 'West Agargaon', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(576, 1, 1112, 'West Kafrul', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(577, 1, 1783, 'Zazira', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(578, 1, 1784, 'Zinzira', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(579, 1, 1758, 'Zirabo', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(580, 1, 1486, 'Zirani', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(581, 1, 1153, 'Zoo Road', '2025-11-21 12:23:10', '2025-11-21 12:23:10'),
(582, 35, 582, 'Biral', '2025-11-21 12:23:11', '2025-11-21 12:23:11'),
(583, 35, 817, 'Birampur', '2025-11-21 12:23:11', '2025-11-21 12:23:11'),
(584, 35, 811, 'Birganj', '2025-11-21 12:23:11', '2025-11-21 12:23:11'),
(585, 35, 814, 'Bochaganj', '2025-11-21 12:23:11', '2025-11-21 12:23:11'),
(586, 35, 810, 'Chirirbandar', '2025-11-21 12:23:11', '2025-11-21 12:23:11'),
(587, 35, 136, 'Dinajpur Sadar', '2025-11-21 12:23:11', '2025-11-21 12:23:11'),
(588, 35, 816, 'Fulbari', '2025-11-21 12:23:11', '2025-11-21 12:23:11'),
(589, 35, 819, 'Ghoraghat', '2025-11-21 12:23:11', '2025-11-21 12:23:11'),
(590, 35, 820, 'Hakimpur (Hili)', '2025-11-21 12:23:11', '2025-11-21 12:23:11'),
(591, 35, 812, 'Kaharol', '2025-11-21 12:23:11', '2025-11-21 12:23:11'),
(592, 35, 813, 'Khanshama', '2025-11-21 12:23:11', '2025-11-21 12:23:11'),
(593, 35, 818, 'Nawabganj Dinajpur', '2025-11-21 12:23:11', '2025-11-21 12:23:11'),
(594, 18, 922, 'Alfadanga', '2025-11-21 12:23:11', '2025-11-21 12:23:11'),
(595, 18, 923, 'Bhanga', '2025-11-21 12:23:11', '2025-11-21 12:23:11'),
(596, 18, 924, 'Boalmari', '2025-11-21 12:23:11', '2025-11-21 12:23:11'),
(597, 18, 925, 'Charbhadrashan', '2025-11-21 12:23:11', '2025-11-21 12:23:11'),
(598, 18, 114, 'Faridpur Sadar', '2025-11-21 12:23:11', '2025-11-21 12:23:11'),
(599, 18, 2001, 'Madhukhali Upazila', '2025-11-21 12:23:11', '2025-11-21 12:23:11'),
(600, 18, 926, 'Madukhali', '2025-11-21 12:23:11', '2025-11-21 12:23:11'),
(601, 18, 927, 'Nagarkanda', '2025-11-21 12:23:11', '2025-11-21 12:23:11'),
(602, 18, 928, 'Sadarpur', '2025-11-21 12:23:11', '2025-11-21 12:23:11'),
(603, 18, 929, 'Saltha', '2025-11-21 12:23:11', '2025-11-21 12:23:11'),
(604, 25, 585, 'Badarganj', '2025-11-21 12:23:33', '2025-11-21 12:23:33'),
(605, 25, 586, 'Gangachara', '2025-11-21 12:23:33', '2025-11-21 12:23:33'),
(606, 25, 796, 'Haragach Thana', '2025-11-21 12:23:33', '2025-11-21 12:23:33'),
(607, 25, 587, 'Kaunia', '2025-11-21 12:23:33', '2025-11-21 12:23:33'),
(608, 25, 801, 'Mahiganj Thana', '2025-11-21 12:23:33', '2025-11-21 12:23:33'),
(609, 25, 588, 'Mithapukur', '2025-11-21 12:23:33', '2025-11-21 12:23:33'),
(610, 25, 815, 'Parbatipur', '2025-11-21 12:23:33', '2025-11-21 12:23:33'),
(611, 25, 589, 'Pirgachha', '2025-11-21 12:23:33', '2025-11-21 12:23:33'),
(612, 25, 797, 'Pirganj Thana', '2025-11-21 12:23:33', '2025-11-21 12:23:33'),
(613, 25, 799, 'Porshurampur Thana', '2025-11-21 12:23:33', '2025-11-21 12:23:33'),
(614, 25, 798, 'Rangpur Cantonment', '2025-11-21 12:23:33', '2025-11-21 12:23:33'),
(615, 25, 126, 'Rangpur Sadar(Kotowali Thana)', '2025-11-21 12:23:33', '2025-11-21 12:23:33'),
(616, 25, 800, 'Tajhat Thana', '2025-11-21 12:23:34', '2025-11-21 12:23:34'),
(617, 51, 658, 'Ashashuni Thana', '2025-11-21 12:23:34', '2025-11-21 12:23:34'),
(618, 51, 652, 'Debhata Thana', '2025-11-21 12:23:34', '2025-11-21 12:23:34'),
(619, 51, 650, 'Kalaroa', '2025-11-21 12:23:34', '2025-11-21 12:23:34'),
(620, 51, 653, 'Kaliganj-Satkhira', '2025-11-21 12:23:34', '2025-11-21 12:23:34'),
(621, 51, 155, 'Satkhira Sadar', '2025-11-21 12:23:34', '2025-11-21 12:23:34'),
(622, 51, 659, 'Shymnagar', '2025-11-21 12:23:34', '2025-11-21 12:23:34'),
(623, 51, 651, 'Tala Thana', '2025-11-21 12:23:34', '2025-11-21 12:23:34'),
(624, 64, 662, 'Bhedorganj', '2025-11-21 12:23:35', '2025-11-21 12:23:35'),
(625, 64, 663, 'Damudhya', '2025-11-21 12:23:35', '2025-11-21 12:23:35'),
(626, 64, 664, 'Gosairhat', '2025-11-21 12:23:35', '2025-11-21 12:23:35'),
(627, 64, 665, 'Jajira', '2025-11-21 12:23:35', '2025-11-21 12:23:35'),
(628, 64, 666, 'Naria', '2025-11-21 12:23:35', '2025-11-21 12:23:35'),
(629, 64, 1073, 'Shakhipur', '2025-11-21 12:23:35', '2025-11-21 12:23:35'),
(630, 64, 168, 'Shariatpur Sadar (Palong)', '2025-11-21 12:23:35', '2025-11-21 12:23:35'),
(631, 33, 526, 'Jhinaigati', '2025-11-21 12:23:36', '2025-11-21 12:23:36'),
(632, 33, 527, 'Nakla', '2025-11-21 12:23:36', '2025-11-21 12:23:36'),
(633, 33, 528, 'Nalitabari', '2025-11-21 12:23:36', '2025-11-21 12:23:36'),
(634, 33, 134, 'Sherpur Sadar', '2025-11-21 12:23:36', '2025-11-21 12:23:36'),
(635, 33, 625, 'Sreebardi', '2025-11-21 12:23:36', '2025-11-21 12:23:36'),
(636, 10, 581, 'Belkuchi', '2025-11-21 12:23:36', '2025-11-21 12:23:36'),
(637, 10, 1029, 'Chowhali', '2025-11-21 12:23:36', '2025-11-21 12:23:36'),
(638, 10, 774, 'Kamarkhanda', '2025-11-21 12:23:36', '2025-11-21 12:23:36'),
(639, 10, 780, 'Kazipur', '2025-11-21 12:23:36', '2025-11-21 12:23:36'),
(640, 10, 779, 'Rayganj', '2025-11-21 12:23:36', '2025-11-21 12:23:36'),
(641, 10, 777, 'Salonga', '2025-11-21 12:23:36', '2025-11-21 12:23:36'),
(642, 10, 775, 'Shahjadpur - Shahjadpur', '2025-11-21 12:23:36', '2025-11-21 12:23:36'),
(643, 10, 105, 'Sirajganj Sadar', '2025-11-21 12:23:36', '2025-11-21 12:23:36'),
(644, 10, 778, 'Tarash', '2025-11-21 12:23:36', '2025-11-21 12:23:36'),
(645, 10, 776, 'Ullapara', '2025-11-21 12:23:36', '2025-11-21 12:23:36'),
(646, 45, 834, 'Bishwamvarpur', '2025-11-21 12:23:37', '2025-11-21 12:23:37'),
(647, 45, 149, 'Chhatak', '2025-11-21 12:23:37', '2025-11-21 12:23:37'),
(648, 45, 836, 'Derai', '2025-11-21 12:23:37', '2025-11-21 12:23:37'),
(649, 45, 835, 'Dharmapasha', '2025-11-21 12:23:37', '2025-11-21 12:23:37'),
(650, 45, 837, 'Dowarabazar', '2025-11-21 12:23:37', '2025-11-21 12:23:37'),
(651, 45, 619, 'Jagnnathpur', '2025-11-21 12:23:37', '2025-11-21 12:23:37'),
(652, 45, 838, 'Jamalganj', '2025-11-21 12:23:37', '2025-11-21 12:23:37'),
(653, 45, 840, 'Salla', '2025-11-21 12:23:37', '2025-11-21 12:23:37'),
(654, 45, 839, 'Shantiganj', '2025-11-21 12:23:37', '2025-11-21 12:23:37'),
(655, 45, 148, 'Sunamganj Sadar', '2025-11-21 12:23:37', '2025-11-21 12:23:37'),
(656, 45, 841, 'Tahirpur', '2025-11-21 12:23:37', '2025-11-21 12:23:37'),
(657, 3, 2456, 'Akhalia', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(658, 3, 2461, 'Amborkhana', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(659, 3, 2465, 'Badaghat', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(660, 3, 2460, 'Baghbari', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(661, 3, 611, 'Balaganj', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(662, 3, 2652, 'Bandar Bazar', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(663, 3, 461, 'Beanibazar', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(664, 3, 612, 'Bishwanath', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(665, 3, 2650, 'Boro Bazar', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(666, 3, 2647, 'Boteshwar Bazar', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(667, 3, 2649, 'Chowhatta', '2025-11-21 12:23:38', '2025-11-21 12:23:38');
INSERT INTO `zones` (`id`, `city_id`, `zone_id`, `zone_name`, `created_at`, `updated_at`) VALUES
(668, 3, 618, 'Companyganj', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(669, 3, 831, 'Dakshin Surma', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(670, 3, 613, 'Fenchuganj', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(671, 3, 615, 'Golapganj', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(672, 3, 614, 'Gowainghat', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(673, 3, 616, 'Jaintapur', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(674, 3, 2651, 'Kajal Shah', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(675, 3, 617, 'Kanaighat', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(676, 3, 2655, 'Khadimnagar', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(677, 3, 2644, 'Khadim Para', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(678, 3, 2654, 'Kumarpara', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(679, 3, 2657, 'Lama Bazar', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(680, 3, 2466, 'Lamakazi', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(681, 3, 2643, 'Mejortila', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(682, 3, 2641, 'Mirabazar', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(683, 3, 2458, 'Modina Market', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(684, 3, 832, 'Osmani Nagar', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(685, 3, 2457, 'Pathantula', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(686, 3, 2646, 'Pirer Bazar', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(687, 3, 2462, 'Sagordighi Par', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(688, 3, 89, 'Shahi Eidgah', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(689, 3, 2645, 'Shahporan ', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(690, 3, 2464, 'Shiber Bazar', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(691, 3, 2640, 'Shibganj, Sylhet', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(692, 3, 2653, 'Sobhanighat', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(693, 3, 2459, 'Subid Bazar', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(694, 3, 2642, 'Tilagor', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(695, 3, 2463, 'Tuker Bazar', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(696, 3, 2656, 'Uposhohor', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(697, 3, 1519, 'Ward No-01', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(698, 3, 833, 'Zakiganj', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(699, 3, 2648, 'Zindabazar', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(700, 13, 535, 'Bashail', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(701, 13, 536, 'Bhuapur', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(702, 13, 537, 'Delduar', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(703, 13, 675, 'Dhanbari', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(704, 13, 538, 'Ghatail', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(705, 13, 539, 'Gopalpur', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(706, 13, 540, 'Kalihati', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(707, 13, 541, 'Madhupur', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(708, 13, 542, 'Mirzapur', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(709, 13, 543, 'Nagarpur', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(710, 13, 544, 'Sakhipur', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(711, 13, 109, 'Tangail Sadar', '2025-11-21 12:23:38', '2025-11-21 12:23:38'),
(712, 36, 951, 'Baliadangi', '2025-11-21 12:23:39', '2025-11-21 12:23:39'),
(713, 36, 952, 'Haripur', '2025-11-21 12:23:39', '2025-11-21 12:23:39'),
(714, 36, 953, 'Pirganj', '2025-11-21 12:23:39', '2025-11-21 12:23:39'),
(715, 36, 954, 'Ranisankail', '2025-11-21 12:23:39', '2025-11-21 12:23:39'),
(716, 36, 955, 'Ruhiya', '2025-11-21 12:23:39', '2025-11-21 12:23:39'),
(717, 36, 137, 'Thakurgaon Sadar', '2025-11-21 12:23:39', '2025-11-21 12:23:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `areas_area_id_unique` (`area_id`),
  ADD KEY `areas_zone_id_index` (`zone_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bookings_order_id_unique` (`order_id`),
  ADD KEY `bookings_merchant_id_foreign` (`merchant_id`),
  ADD KEY `bookings_booking_operator_id_foreign` (`booking_operator_id`),
  ADD KEY `bookings_store_id_foreign` (`store_id`),
  ADD KEY `bookings_product_type_id_foreign` (`product_type_id`),
  ADD KEY `bookings_delivery_type_id_foreign` (`delivery_type_id`);

--
-- Indexes for table `booking_products`
--
ALTER TABLE `booking_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_products_booking_id_foreign` (`booking_id`),
  ADD KEY `booking_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_user_id_foreign` (`user_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cities_city_id_unique` (`city_id`);

--
-- Indexes for table `courier_platforms`
--
ALTER TABLE `courier_platforms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courier_stores`
--
ALTER TABLE `courier_stores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courier_stores_user_id_foreign` (`user_id`),
  ADD KEY `courier_stores_courier_platform_id_foreign` (`courier_platform_id`);

--
-- Indexes for table `delivery_types`
--
ALTER TABLE `delivery_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `delivery_types_slug_unique` (`slug`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designations_name_unique` (`name`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `districts_slug_unique` (`slug`),
  ADD KEY `districts_division_id_foreign` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `divisions_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hubs`
--
ALTER TABLE `hubs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hubs_user_id_foreign` (`user_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_order_id_index` (`order_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kycs`
--
ALTER TABLE `kycs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kycs_user_id_foreign` (`user_id`);

--
-- Indexes for table `merchant_couriers`
--
ALTER TABLE `merchant_couriers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `merchant_couriers_merchant_id_courier_id_unique` (`merchant_id`,`courier_id`),
  ADD KEY `merchant_couriers_courier_id_foreign` (`courier_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pathao-courier`
--
ALTER TABLE `pathao-courier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_types_slug_unique` (`slug`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `setup_charges`
--
ALTER TABLE `setup_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_movements`
--
ALTER TABLE `stock_movements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_movements_store_id_foreign` (`store_id`),
  ADD KEY `stock_movements_product_id_foreign` (`product_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stores_name_unique` (`name`);

--
-- Indexes for table `thanas`
--
ALTER TABLE `thanas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `thanas_slug_unique` (`slug`),
  ADD KEY `thanas_district_id_foreign` (`district_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `zones_zone_id_unique` (`zone_id`),
  ADD KEY `zones_city_id_index` (`city_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `booking_products`
--
ALTER TABLE `booking_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `courier_platforms`
--
ALTER TABLE `courier_platforms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courier_stores`
--
ALTER TABLE `courier_stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `delivery_types`
--
ALTER TABLE `delivery_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hubs`
--
ALTER TABLE `hubs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kycs`
--
ALTER TABLE `kycs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `merchant_couriers`
--
ALTER TABLE `merchant_couriers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=370;

--
-- AUTO_INCREMENT for table `pathao-courier`
--
ALTER TABLE `pathao-courier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `setup_charges`
--
ALTER TABLE `setup_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stock_movements`
--
ALTER TABLE `stock_movements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `thanas`
--
ALTER TABLE `thanas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=718;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_booking_operator_id_foreign` FOREIGN KEY (`booking_operator_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `bookings_delivery_type_id_foreign` FOREIGN KEY (`delivery_type_id`) REFERENCES `delivery_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_merchant_id_foreign` FOREIGN KEY (`merchant_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_product_type_id_foreign` FOREIGN KEY (`product_type_id`) REFERENCES `product_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `booking_products`
--
ALTER TABLE `booking_products`
  ADD CONSTRAINT `booking_products_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `courier_stores`
--
ALTER TABLE `courier_stores`
  ADD CONSTRAINT `courier_stores_courier_platform_id_foreign` FOREIGN KEY (`courier_platform_id`) REFERENCES `courier_platforms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courier_stores_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hubs`
--
ALTER TABLE `hubs`
  ADD CONSTRAINT `hubs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kycs`
--
ALTER TABLE `kycs`
  ADD CONSTRAINT `kycs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `merchant_couriers`
--
ALTER TABLE `merchant_couriers`
  ADD CONSTRAINT `merchant_couriers_courier_id_foreign` FOREIGN KEY (`courier_id`) REFERENCES `courier_stores` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `merchant_couriers_merchant_id_foreign` FOREIGN KEY (`merchant_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD CONSTRAINT `payment_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stock_movements`
--
ALTER TABLE `stock_movements`
  ADD CONSTRAINT `stock_movements_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stock_movements_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `thanas`
--
ALTER TABLE `thanas`
  ADD CONSTRAINT `thanas_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
