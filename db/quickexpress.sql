-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2020 at 07:52 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quickexpress`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `email`, `username`, `role`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Admin', NULL, 'admin@gmail.com', 'Admin', 2, '$2y$10$KSdee7hzr.8uJB89YOyV7eKvQG6uXyD45P0Fpf.FNHv9q46VCXM0i', 1, 'HftBsS0WaFhNaeki9GEnbTOdo99h14G9dS1WtBq9AJJkzUuSyNKsUxMufhEx', '2019-04-17 01:04:35', '2020-01-20 13:33:35'),
(7, 'Jisan Ahmed', NULL, 'jisanahmed06@gmail.com', 'jisan', 3, '$2y$10$KSdee7hzr.8uJB89YOyV7eKvQG6uXyD45P0Fpf.FNHv9q46VCXM0i', 1, NULL, '2019-08-30 21:43:55', '2019-11-26 22:25:40'),
(16, 'Selim Furniture', NULL, 'selimfurniture@gmail.com', 'selim', 12, '$2y$10$rIXkct985vyFfJdVrbLV..vGyQnULxPDgcpHgTUfpoTTKCiMuBhKC', 1, NULL, '2020-06-11 11:59:36', '2020-06-18 00:16:22'),
(22, 'Delivery Man Shihab', NULL, 'shihab@gmail.com', 'shihab', 14, '$2y$10$d9.4GV4FeUKYdY9V2npCJ.cO7aNwzVpZ8hBWfuFBM/4cvnzLiIUkq', 1, NULL, '2020-06-22 03:42:33', '2020-06-23 00:54:46'),
(23, 'Delivery Man Dhiman', NULL, 'dhiman@gmail.com', 'dhiman', 14, '$2y$10$AK0r/RqFXeNhSbqERqj7oOL/lcl2Ru9WPcO3FpRnWJsb.EfZ0qY6u', 1, NULL, '2020-06-22 04:20:40', '2020-07-04 01:37:27'),
(24, 'Agent One', NULL, 'agentone@gmail.com', 'agentone', 8, '$2y$10$KSdee7hzr.8uJB89YOyV7eKvQG6uXyD45P0Fpf.FNHv9q46VCXM0i', 1, NULL, '2020-07-04 01:41:03', '2020-07-04 02:53:25'),
(25, 'Agent Two', NULL, 'agenttwo@gmail.com', 'agenttwo', 8, '$2y$10$RCPWgRTIKhwF1ZOpI/qkp.QbDCW.gOlfX8P/cAlDcZjGeGYfaxC/a', 1, NULL, '2020-07-04 01:42:03', '2020-07-04 02:53:27'),
(26, 'Subagnet One', NULL, 'subagentone@gmail.com', 'subagentone', 10, '$2y$10$mbAwEnXiPJSQzPNu5.FQTOwfLfkEXHBcsqk9VikUpKo5KxpRLU0gK', 1, NULL, '2020-07-04 01:43:22', '2020-07-04 03:05:45'),
(27, 'Subagent Two', NULL, 'subagenttwo@gmail.com', 'Subagenttwo', 10, '$2y$10$RTQRzctr0/sN3TFb9h3vu.wRwp/9qtDIh3bZvmOAMuJ/eCPuPtvhS', 1, NULL, '2020-07-04 01:44:46', '2020-07-04 03:05:46'),
(28, 'Subagent Three', NULL, 'subagentthree@gmail.com', 'SubagentThree', 10, '$2y$10$RE3PwoBhilgpXQBHjq/i5eJP0qEqPCdjY84p8OP/vNPRjg460ieai', 1, NULL, '2020-07-04 01:45:41', '2020-07-04 03:05:48'),
(29, 'Dhaka South', NULL, 'dhakasouth@gmail.com', 'Dhaka South', 11, '$2y$10$wkDZD1UNsK1nIfCMoqJDpOhhqKaldP3jzLKcIXpR4SFJj3IpMq/Gu', 1, NULL, '2020-07-04 01:47:38', '2020-07-04 03:05:50'),
(30, 'Dhaka North', NULL, 'dhakanorth@gmail.com', 'Dhaka North', 11, '$2y$10$uAjLoNdVTF8jqa153SLTveU/S1WlUfvtxzeU5Zx322kEw3VJY.lp.', 1, NULL, '2020-07-04 01:48:21', '2020-07-04 03:05:55'),
(31, 'Mymensing Warehouse', NULL, 'mymensingwarehoue@gmail.com', 'Mymensing Warehouse', 11, '$2y$10$yjTrYKxJycm8iA/h4Jxyf.dCKN6UzutpgDMgJogmInpqicSAUcFAu', 1, NULL, '2020-07-04 01:49:39', '2020-07-04 03:05:57'),
(33, 'Dew Hunt', NULL, 'dewhunt@gmail.com', 'dew', 4, '$2y$10$lPUY4hJiH2dCclS.5vIHMu/tphS.UNvRlG42sLabjF3V4U3KDsjii', 1, NULL, '2020-07-04 01:50:55', '2020-07-04 02:53:28'),
(34, 'Mamunur Rashid', NULL, 'mamun@gmail.com', 'mamun', 4, '$2y$10$zroT7nYlNhKxx6W7weEEY.VUjyPInR6Tix0VEYWLGchHrsLMIe3L6', 1, NULL, '2020-07-04 01:51:59', '2020-07-04 02:53:30'),
(36, 'Mira', NULL, 'mira@gmail.com', 'Ripon', 4, '$2y$10$qd83vqeNar4b6V7pkgw4dOYaIiWsGweXBROqYGCETfgoyfHHNZH9G', 1, NULL, '2020-07-04 01:53:13', '2020-07-04 02:53:32'),
(41, 'Hira Moni Ahmed', '01317243499', '', 'hira_moni_ahmed', 4, '$2y$10$NzUX4A3IyEJXJj2xE8r3MerrQBfp4C4YDvQYD3bbvb0Ff15EJvqni', 1, NULL, '2020-07-04 11:40:38', '2020-07-04 11:50:56');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

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
-- Table structure for table `tbl_agents`
--

CREATE TABLE `tbl_agents` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_role_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_agents`
--

INSERT INTO `tbl_agents` (`id`, `user_id`, `user_role_id`, `name`, `district`, `phone`, `email`, `nid`, `address`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(8, 24, 8, 'Agent One', 'Dhaka', '01317243494', 'agentone@gmail.com', '5098768831', 'Road - 12', 1, 4, '2020-07-04 01:41:03', NULL, '2020-07-04 01:41:03'),
(9, 25, 8, 'Agent Two', 'Mymensing', '01317243494', 'agenttwo@gmail.com', '5389567031', 'Road - 12', 1, 4, '2020-07-04 01:42:04', NULL, '2020-07-04 01:42:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking_orders`
--

CREATE TABLE `tbl_booking_orders` (
  `id` int(11) NOT NULL,
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booked_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `sender_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_zone_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_zone_id` int(11) DEFAULT NULL,
  `sender_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_zone_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_zone_id` int(11) DEFAULT NULL,
  `receiver_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `courier_type_id` int(11) NOT NULL,
  `courier_unit_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_type_id` int(11) DEFAULT NULL,
  `delivery_unit_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uom` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_charge` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_man_id` int(11) DEFAULT NULL,
  `collection_status` tinyint(4) NOT NULL DEFAULT 0,
  `sender_goods_receieve_status` tinyint(4) NOT NULL DEFAULT 0,
  `host_warehouse_id` int(11) DEFAULT NULL,
  `host_warehouse_goods_receieve_status` tinyint(4) NOT NULL DEFAULT 0,
  `destination_warehouse_id` int(11) DEFAULT NULL,
  `destination_warehouse_goods_receieve_status` tinyint(4) NOT NULL DEFAULT 0,
  `receiver_issue_status` tinyint(4) NOT NULL DEFAULT 0,
  `receiver_goods_receieve_status` tinyint(4) NOT NULL DEFAULT 0,
  `delivery_man_id` int(11) DEFAULT NULL,
  `delivery_status` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_booking_orders`
--

INSERT INTO `tbl_booking_orders` (`id`, `order_no`, `date`, `booked_type`, `sender_id`, `sender_name`, `sender_phone`, `sender_zone_type`, `sender_zone_id`, `sender_address`, `receiver_name`, `receiver_phone`, `receiver_zone_type`, `receiver_zone_id`, `receiver_address`, `courier_type_id`, `courier_unit_price`, `delivery_type_id`, `delivery_unit_price`, `uom`, `delivery_charge`, `collection_man_id`, `collection_status`, `sender_goods_receieve_status`, `host_warehouse_id`, `host_warehouse_goods_receieve_status`, `destination_warehouse_id`, `destination_warehouse_goods_receieve_status`, `receiver_issue_status`, `receiver_goods_receieve_status`, `delivery_man_id`, `delivery_status`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(18, 'co-200704-00001', '2020-07-04', 'Client', 3, 'Dew Hunt', '01317243494', 'Agent', 8, 'Mirpur - 11', 'Salman Sabbir', '01317463487', 'Agent', 9, 'Gulshan', 4, '200', 1, '120', '1', '320', NULL, 0, 0, NULL, 0, NULL, 0, 0, 0, NULL, 0, 1, 4, '2020-07-04 11:38:17', NULL, '2020-07-04 11:38:17'),
(19, 'co-200704-00002', '2020-07-04', 'Client', 10, 'Hira Moni Ahmed', '01317243499', 'Subagent', 4, 'Banani', 'Rakhi', '01725847560', 'Subagent', 5, 'Mohamdpur', 2, '250', 2, '100', '1', '350', NULL, 0, 0, NULL, 0, NULL, 0, 0, 0, NULL, 0, 1, 4, '2020-07-04 11:40:38', NULL, '2020-07-04 11:50:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clients`
--

CREATE TABLE `tbl_clients` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_role_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_clients`
--

INSERT INTO `tbl_clients` (`id`, `user_id`, `user_role_id`, `name`, `phone`, `nid`, `email`, `address`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(3, 33, 4, 'Dew Hunt', '01317243494', '5089768831', 'dewhunt@gmail.com', 'Mirpur - 11', 1, 4, '2020-07-04 01:50:55', NULL, '2020-07-04 01:50:55'),
(4, 34, 4, 'Mamunur Rashid', '01317243495', '3059962831', 'mamun@gmail.com', 'Gulshan', 1, 4, '2020-07-04 01:51:59', NULL, '2020-07-04 01:51:59'),
(5, 36, 4, 'Mira', '01317243496', '7889768831', 'mira@gmail.com', 'Badda', 1, 4, '2020-07-04 01:53:13', NULL, '2020-07-04 01:53:13'),
(10, 41, 4, 'Hira Moni Ahmed', '01317243499', NULL, NULL, NULL, 1, 4, '2020-07-04 11:40:38', NULL, '2020-07-04 11:50:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_courier_types`
--

CREATE TABLE `tbl_courier_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `order_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_courier_types`
--

INSERT INTO `tbl_courier_types` (`id`, `name`, `charge`, `description`, `status`, `order_by`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Large Parcel', '300', NULL, 1, 1, 4, '2020-06-15 01:00:47', NULL, '2020-06-15 02:41:13'),
(2, 'Medium Parcel', '250', NULL, 1, 2, 4, '2020-06-15 01:07:02', NULL, '2020-06-15 02:41:24'),
(3, 'Small Parcel', '200', NULL, 1, 3, 4, '2020-06-15 01:09:41', NULL, '2020-06-15 02:41:42'),
(4, 'Document', '200', 'document', 1, 4, 4, '2020-06-15 01:09:54', NULL, '2020-06-15 02:41:02'),
(5, 'Weighing Scale', '15', NULL, 1, 5, 4, '2020-06-15 01:11:15', NULL, '2020-06-15 02:42:20'),
(7, 'Mobile/Tab', '200', 'Mobile/Tab', 1, 6, 4, '2020-06-15 01:51:13', NULL, '2020-06-15 02:41:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_delivery_men`
--

CREATE TABLE `tbl_delivery_men` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_role_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_delivery_men`
--

INSERT INTO `tbl_delivery_men` (`id`, `user_id`, `user_role_id`, `name`, `image`, `width`, `height`, `phone`, `email`, `nid`, `address`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 22, 14, 'Delivery Man Shihab', 'public/uploads/profile_image/delivery_man/avatar-cutout_11428319470.png', 600, 600, '01716967610', 'shihab@gmail.com', '3059962831', 'Mirpur', 1, 4, '2020-06-22 03:42:35', 4, '2020-06-22 04:06:14'),
(2, 23, 14, 'Delivery Man Dhiman', 'public/uploads/profile_image/delivery_man/images_76654677558.jpg', NULL, NULL, '01617243491', 'dhiman@gmail.com', '30519642831', 'Road - 12', 1, 4, '2020-06-22 04:20:41', 4, '2020-07-04 01:37:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_delivery_types`
--

CREATE TABLE `tbl_delivery_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `order_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_delivery_types`
--

INSERT INTO `tbl_delivery_types` (`id`, `name`, `charge`, `description`, `status`, `order_by`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Client To Client', '120', NULL, 1, 1, 4, '2020-06-15 03:21:07', NULL, '2020-06-15 03:24:15'),
(2, 'Client To Office', '100', NULL, 1, 2, 4, '2020-06-15 03:24:34', NULL, '2020-06-15 03:24:34'),
(3, 'Office To Office', '100', NULL, 1, 3, 4, '2020-06-16 00:43:09', NULL, '2020-06-16 00:43:09'),
(4, 'Office To Client', '130', NULL, 1, 4, 4, '2020-06-16 00:43:34', NULL, '2020-06-16 00:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_districts`
--

CREATE TABLE `tbl_districts` (
  `id` int(11) UNSIGNED NOT NULL,
  `english_name` varchar(255) DEFAULT NULL,
  `bangla_name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_districts`
--

INSERT INTO `tbl_districts` (`id`, `english_name`, `bangla_name`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Dhaka', 'ঢাকা', 1, NULL, NULL, NULL, NULL),
(2, 'Faridpur', 'ফরিদপুর', 1, NULL, NULL, NULL, NULL),
(3, 'Gazipur', 'গাজীপুর', 1, NULL, NULL, NULL, NULL),
(4, 'Gopalganj', 'গোপালগঞ্জ', 1, NULL, NULL, NULL, NULL),
(5, 'Jamalpur', 'জামালপুর', 1, NULL, NULL, NULL, NULL),
(6, 'Kishoreganj', 'কিশোরগঞ্জ', 1, NULL, NULL, NULL, NULL),
(7, 'Madaripur', 'মাদারীপুর', 1, NULL, NULL, NULL, NULL),
(8, 'Manikganj', 'মানিকগঞ্জ', 1, NULL, NULL, NULL, NULL),
(9, 'Munshiganj', 'মুন্সিগঞ্জ', 1, NULL, NULL, NULL, NULL),
(10, 'Mymensingh', 'ময়মনসিং', 1, NULL, NULL, NULL, NULL),
(11, 'Narayanganj', 'নারায়াণগঞ্জ', 1, NULL, NULL, NULL, NULL),
(12, 'Narsingdi', 'নরসিংদী', 1, NULL, NULL, NULL, NULL),
(13, 'Netrokona', 'নেত্রকোনা', 1, NULL, NULL, NULL, NULL),
(14, 'Rajbari', 'রাজবাড়ি', 1, NULL, NULL, NULL, NULL),
(15, 'Shariatpur', 'শরীয়তপুর', 1, NULL, NULL, NULL, NULL),
(16, 'Sherpur', 'শেরপুর', 1, NULL, NULL, NULL, NULL),
(17, 'Tangail', 'টাঙ্গাইল', 1, NULL, NULL, NULL, NULL),
(18, 'Bogra', 'বগুড়া', 1, NULL, NULL, NULL, NULL),
(19, 'Joypurhat', 'জয়পুরহাট', 1, NULL, NULL, NULL, NULL),
(20, 'Naogaon', 'নওগাঁ', 1, NULL, NULL, NULL, NULL),
(21, 'Natore', 'নাটোর', 1, NULL, NULL, NULL, NULL),
(22, 'Nawabganj', 'নবাবগঞ্জ', 1, NULL, NULL, NULL, NULL),
(23, 'Pabna', 'পাবনা', 1, NULL, NULL, NULL, NULL),
(24, 'Rajshahi', 'রাজশাহী', 1, NULL, NULL, NULL, NULL),
(25, 'Sirajgonj', 'সিরাজগঞ্জ', 1, NULL, NULL, NULL, NULL),
(26, 'Dinajpur', 'দিনাজপুর', 1, NULL, NULL, NULL, NULL),
(27, 'Gaibandha', 'গাইবান্ধা', 1, NULL, NULL, NULL, NULL),
(28, 'Kurigram', 'কুড়িগ্রাম', 1, NULL, NULL, NULL, NULL),
(29, 'Lalmonirhat', 'লালমনিরহাট', 1, NULL, NULL, NULL, NULL),
(30, 'Nilphamari', 'নীলফামারী', 1, NULL, NULL, NULL, NULL),
(31, 'Panchagarh', 'পঞ্চগড়', 1, NULL, NULL, NULL, NULL),
(32, 'Rangpur', 'রংপুর', 1, NULL, NULL, NULL, NULL),
(33, 'Thakurgaon', 'ঠাকুরগাঁও', 1, NULL, NULL, NULL, NULL),
(34, 'Barguna', 'বরগুনা', 1, NULL, NULL, NULL, NULL),
(35, 'Barisal', 'বরিশাল', 1, NULL, NULL, NULL, NULL),
(36, 'Bhola', 'ভোলা', 1, NULL, NULL, NULL, NULL),
(37, 'Jhalokati', 'ঝালকাঠি', 1, NULL, NULL, NULL, NULL),
(38, 'Patuakhali', 'পটুয়াখালী', 1, NULL, NULL, NULL, NULL),
(39, 'Pirojpur', 'পিরোজপুর', 1, NULL, NULL, NULL, NULL),
(40, 'Bandarban', 'বান্দরবান', 1, NULL, NULL, NULL, NULL),
(41, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', 1, NULL, NULL, NULL, NULL),
(42, 'Chandpur', 'চাঁদপুর', 1, NULL, NULL, NULL, NULL),
(43, 'Chittagong', 'চট্টগ্রাম', 1, NULL, NULL, NULL, NULL),
(44, 'Comilla', 'কুমিল্লা', 1, NULL, NULL, NULL, NULL),
(45, 'Cox\'s Bazar', 'কক্স বাজার', 1, NULL, NULL, NULL, NULL),
(46, 'Feni', 'ফেনী', 1, NULL, NULL, NULL, NULL),
(47, 'Khagrachari', 'খাগড়াছড়ি', 1, NULL, NULL, NULL, NULL),
(48, 'Lakshmipur', 'লক্ষ্মীপুর', 1, NULL, NULL, NULL, NULL),
(49, 'Noakhali', 'নোয়াখালী', 1, NULL, NULL, NULL, NULL),
(50, 'Rangamati', 'রাঙ্গামাটি', 1, NULL, NULL, NULL, NULL),
(51, 'Habiganj', 'হবিগঞ্জ', 1, NULL, NULL, NULL, NULL),
(52, 'Maulvibazar', 'মৌলভীবাজার', 1, NULL, NULL, NULL, NULL),
(53, 'Sunamganj', 'সুনামগঞ্জ', 1, NULL, NULL, NULL, NULL),
(54, 'Sylhet', 'সিলেট', 1, NULL, NULL, NULL, NULL),
(55, 'Bagerhat', 'বাগেরহাট', 1, NULL, NULL, NULL, NULL),
(56, 'Chuadanga', 'চুয়াডাঙ্গা', 1, NULL, NULL, NULL, NULL),
(57, 'Jessore', 'যশোর', 1, NULL, NULL, NULL, NULL),
(58, 'Jhenaidah', 'ঝিনাইদহ', 1, NULL, NULL, NULL, NULL),
(59, 'Khulna', 'খুলনা', 1, NULL, NULL, NULL, NULL),
(60, 'Kushtia', 'কুষ্টিয়া', 1, NULL, NULL, NULL, NULL),
(61, 'Magura', 'মাগুরা', 1, NULL, NULL, NULL, NULL),
(62, 'Meherpur', 'মেহেরপুর', 1, NULL, NULL, NULL, NULL),
(63, 'Narail', 'নড়াইল', 1, NULL, NULL, NULL, NULL),
(64, 'Satkhira', 'সাতক্ষীরা', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_frontend_menu`
--

CREATE TABLE `tbl_frontend_menu` (
  `id` int(11) NOT NULL,
  `parent_menu` int(11) DEFAULT NULL,
  `menu_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `menu_status` tinyint(4) NOT NULL DEFAULT 1,
  `footer_menu_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_frontend_menu`
--

INSERT INTO `tbl_frontend_menu` (`id`, `parent_menu`, `menu_name`, `menu_link`, `order_by`, `status`, `menu_status`, `footer_menu_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, NULL, 'Version', 'home.index', 1, 1, 1, 1, 4, '2020-04-18 08:48:30', 4, '2020-04-18 09:53:16'),
(3, 1, 'Version - 1', 'Version1.add', 1, 1, 1, 1, 4, '2020-04-18 09:30:03', NULL, '2020-04-18 09:53:20'),
(4, NULL, 'Dew Hunt', 'dewhunt.com', 2, 1, 1, 1, 4, '2020-05-10 04:56:47', 4, '2020-05-10 05:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_marchants`
--

CREATE TABLE `tbl_marchants` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_role_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menus`
--

CREATE TABLE `tbl_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_menu` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_icon` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_menus`
--

INSERT INTO `tbl_menus` (`id`, `parent_menu`, `menu_name`, `menu_link`, `menu_icon`, `order_by`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'User Management', 'admin.index', 'fa fa-bars', 1, '1', NULL, '2020-03-04 12:42:44'),
(2, '1', 'Menu', 'menu.index', 'fa fa-caret', 1, '1', NULL, NULL),
(3, '1', 'Users Role', 'userRole.index', 'fa fa-bars', 4, '1', '2020-03-03 13:48:57', '2020-03-15 06:02:37'),
(4, '1', 'Menu Action Type', 'menuActionType.index', 'fa fa-bars', 2, '1', NULL, NULL),
(5, '1', 'User', 'user.index', 'fa fa-bars', 3, '1', '2020-03-14 02:06:15', '2020-03-15 06:02:33'),
(6, NULL, 'Front-End Management', 'admin.index', 'fa fa-bars', 2, '1', '2020-04-16 09:54:08', '2020-04-16 10:40:44'),
(7, '6', 'Website Information', 'websiteInformation.index', 'fa fa-caret', 1, '1', '2020-04-16 10:43:15', '2020-04-16 10:43:15'),
(8, '6', 'Menus', 'frontEndMenu.index', NULL, 2, '1', '2020-04-18 08:17:03', '2020-04-18 08:17:03'),
(10, '6', 'Social Links', 'socialLink.index', 'fa fa-caret', 3, '1', '2020-04-18 10:14:20', '2020-04-18 10:14:20'),
(11, '6', 'Sliders', 'sliders.index', 'fa fa-bars', 4, '1', '2020-04-19 08:19:58', '2020-04-19 08:19:58'),
(12, '6', 'Pages', 'page.index', 'fa fa-caret', 5, '1', '2020-05-10 05:09:10', '2020-05-10 05:09:10'),
(13, NULL, 'Basic Setup', 'admin.index', 'fa fa-bars', 3, '1', '2020-06-10 04:33:14', '2020-06-10 04:33:14'),
(14, '13', 'Agent Setup', 'agent.index', 'fa fa-caret', 1, '1', '2020-06-10 04:33:26', '2020-06-10 04:34:09'),
(15, '13', 'Subagent Setup', 'subagent.index', 'fa fa-caret', 2, '1', '2020-06-10 04:33:59', '2020-06-10 04:33:59'),
(16, '13', 'Warehouse Setup', 'warehouse.index', 'fa fa-bars', 3, '1', '2020-06-11 04:48:58', '2020-06-11 04:48:58'),
(17, '13', 'Marchant Setup', 'marchant.index', 'fa fa-caret', 4, '1', '2020-06-11 11:38:01', '2020-06-11 11:38:37'),
(18, '13', 'Client Setup', 'client.index', 'fa fa-caret', 5, '1', '2020-06-11 11:38:29', '2020-06-11 11:38:29'),
(19, '13', 'Courier Type', 'courierType.index', 'fa fa-bars', 6, '1', '2020-06-15 00:32:16', '2020-06-15 02:11:31'),
(20, '13', 'Delivery Type', 'deliveryType.index', NULL, 7, '1', '2020-06-15 02:46:56', '2020-06-16 00:57:49'),
(21, NULL, 'Order Management', 'admin.index', 'fa fa-bars', 4, '1', '2020-06-15 04:48:14', '2020-06-15 04:52:16'),
(22, '21', 'Booking Order', 'bookingOrder.index', NULL, 1, '1', '2020-06-15 04:54:21', '2020-06-15 04:54:21'),
(23, '21', 'Sender Order', 'senderOrder.index', 'fa fa-bars', 2, '1', '2020-06-18 05:14:55', '2020-06-18 05:14:55'),
(24, '21', 'Receiver Order', 'receiverOrder.index', 'fa fa-bars', 3, '1', '2020-06-18 05:15:39', '2020-06-18 05:15:39'),
(25, '13', 'Delivery Man', 'deliveryMan.index', 'fa fa-bars', 8, '1', '2020-06-22 01:36:17', '2020-06-22 01:36:17'),
(26, NULL, 'Delivery Management', 'admin.index', 'fa fa-bars', 5, '1', '2020-06-23 01:05:09', '2020-06-23 01:05:09'),
(27, '26', 'Goods Collection', 'goodsCollection.index', 'fa fa-caret', 1, '1', '2020-06-23 01:19:42', '2020-06-23 01:19:42'),
(28, '26', 'Goods Delivery', 'goodsDelivery.index', 'fa fa-caret', 2, '1', '2020-06-23 01:20:10', '2020-06-23 01:20:10'),
(29, NULL, 'Warehouse Management', 'admin.index', 'fa fa-bars', 6, '1', '2020-07-01 01:45:18', '2020-07-01 01:45:18'),
(32, '29', 'Agent Receive', 'receiveFormAgent.index', 'fa fa-caret', 3, '1', '2020-07-01 05:06:42', '2020-07-04 05:40:35'),
(33, '29', 'Issue Warehouse', 'issueToWarehouse.index', NULL, 4, '1', '2020-07-01 05:07:57', '2020-07-04 05:41:28'),
(34, '29', 'Issue Agent', 'issueToAgent.index', NULL, 6, '1', '2020-07-01 05:50:00', '2020-07-04 05:41:41'),
(36, '29', 'Warehouse Receive', 'receiveFromWarehouse.index', 'fa fa-caret', 5, '1', '2020-07-04 04:06:39', '2020-07-04 05:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_actions`
--

CREATE TABLE `tbl_menu_actions` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_menu_id` int(11) DEFAULT NULL,
  `menu_type` int(11) DEFAULT NULL,
  `action_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_link` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_menu_actions`
--

INSERT INTO `tbl_menu_actions` (`id`, `parent_menu_id`, `menu_type`, `action_name`, `action_link`, `order_by`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 'Add', 'menu.add', 1, 1, NULL, NULL),
(3, 2, 2, 'Edit', 'menu.edit', 2, 1, NULL, NULL),
(4, 2, 3, 'Status', 'menu.status', 3, 1, NULL, NULL),
(5, 2, 8, 'View Menu Action', 'menuAction.index', 4, 1, NULL, NULL),
(6, 2, 4, 'Delete', 'menu.delete', 5, 1, NULL, NULL),
(7, 4, 1, 'Add', 'menuActionType.add', 1, 1, NULL, NULL),
(8, 4, 2, 'Edit', 'menuActionType.edit', 2, 1, NULL, NULL),
(9, 4, 3, 'Status', 'menuActionType.status', 3, 1, NULL, NULL),
(10, 4, 4, 'Delete', 'menuActionType.delete', 4, 1, NULL, NULL),
(11, 3, 1, 'Add', 'userRole.add', 1, 1, '2020-03-06 23:37:18', '2020-03-06 23:37:18'),
(12, 3, 2, 'Edit', 'userRole.edit', 2, 1, '2020-03-07 00:16:00', '2020-03-07 00:16:00'),
(13, 3, 5, 'Permission', 'userRole.permission', 3, 1, '2020-03-07 00:17:25', '2020-03-07 00:17:25'),
(14, 3, 3, 'Status', 'userRole.status', 4, 1, '2020-03-07 00:18:08', '2020-03-07 00:18:08'),
(15, 3, 4, 'Delete', 'userRole.delete', 5, 1, '2020-03-07 00:18:22', '2020-03-07 00:18:22'),
(21, 5, 1, 'Add', 'user.add', 1, 1, '2020-03-14 02:06:39', '2020-03-14 02:06:39'),
(22, 5, 2, 'Edit', 'user.edit', 2, 1, '2020-03-14 02:06:53', '2020-03-14 02:06:53'),
(23, 5, 8, 'View Profile', 'user.profile', 3, 1, '2020-03-14 02:07:32', '2020-03-14 02:07:32'),
(24, 5, 6, 'Change Password', 'user.changePassword', 4, 1, '2020-03-14 02:07:57', '2020-03-14 02:07:57'),
(25, 5, 3, 'Status', 'user.status', 5, 1, '2020-03-14 02:08:23', '2020-03-14 02:08:23'),
(26, 5, 4, 'Delete', 'user.delete', 6, 1, '2020-03-14 02:08:35', '2020-03-14 02:08:35'),
(28, 7, 1, 'Add', 'websiteInformation.add', 1, 1, '2020-04-16 11:50:12', '2020-04-16 11:50:12'),
(29, 7, 2, 'Edit', 'websiteInformation.edit', 2, 1, '2020-04-16 11:50:28', '2020-04-16 11:50:28'),
(30, 8, 1, 'Add', 'frontEndMenu.add', 1, 1, '2020-04-18 08:18:00', '2020-04-18 08:18:00'),
(31, 8, 2, 'Edit', 'frontEndMenu.edit', 2, 1, '2020-04-18 08:18:14', '2020-04-18 08:18:14'),
(32, 8, 3, 'Status', 'frontEndMenu.status', 3, 1, '2020-04-18 08:20:33', '2020-04-18 08:20:33'),
(33, 8, 4, 'Delete', 'frontEndMenu.delete', 4, 1, '2020-04-18 08:20:48', '2020-04-18 08:20:48'),
(39, 10, 1, 'Add', 'socialLink.add', 1, 1, '2020-04-18 10:14:43', '2020-04-18 10:14:43'),
(40, 10, 2, 'Edit', 'socialLink.edit', 2, 1, '2020-04-18 10:14:54', '2020-04-18 10:14:54'),
(41, 10, 3, 'Status', 'socialLink.status', 3, 1, '2020-04-18 10:15:15', '2020-04-18 10:15:15'),
(42, 10, 4, 'Delete', 'socialLink.delete', 4, 1, '2020-04-18 10:15:32', '2020-04-18 10:15:32'),
(43, 11, 1, 'Add', 'sliders.add', 1, 1, '2020-04-19 08:20:24', '2020-04-19 08:20:24'),
(44, 11, 2, 'Edit', 'sliders.edit', 2, 1, '2020-04-19 08:20:39', '2020-04-19 08:20:39'),
(45, 11, 3, 'Status', 'sliders.status', 3, 1, '2020-04-19 08:20:59', '2020-04-19 08:20:59'),
(46, 11, 4, 'Delete', 'sliders.delete', 4, 1, '2020-04-19 08:21:14', '2020-04-19 08:21:14'),
(47, 12, 1, 'Add', 'page.add', 1, 1, '2020-05-10 05:09:46', '2020-05-10 05:09:46'),
(48, 12, 2, 'Edit', 'page.edit', 2, 1, '2020-05-10 05:09:58', '2020-05-10 05:09:58'),
(49, 12, 3, 'Status', 'page.status', 3, 1, '2020-05-10 05:10:22', '2020-05-10 05:10:22'),
(50, 12, 8, 'View Posts', 'post.index', 4, 1, '2020-05-10 05:11:48', '2020-05-10 05:11:48'),
(51, 12, 4, 'Delete', 'page.delete', 5, 1, '2020-05-10 05:12:01', '2020-05-10 05:12:01'),
(52, 14, 1, 'Add', 'agent.add', 1, 1, '2020-06-10 04:34:27', '2020-06-10 04:34:27'),
(53, 14, 2, 'Edit', 'agent.edit', 2, 1, '2020-06-10 04:34:35', '2020-06-10 04:34:35'),
(54, 14, 3, 'Status', 'agent.status', 3, 1, '2020-06-10 04:34:51', '2020-06-10 04:34:51'),
(55, 14, 4, 'Delete', 'agent.delete', 4, 1, '2020-06-10 04:35:00', '2020-06-10 04:35:00'),
(56, 15, 1, 'Add', 'subagent.add', 1, 1, '2020-06-10 04:35:20', '2020-06-10 04:35:20'),
(57, 15, 2, 'Edit', 'subagent.edit', 2, 1, '2020-06-10 04:35:29', '2020-06-10 04:35:29'),
(58, 15, 3, 'Status', 'subagent.status', 3, 1, '2020-06-10 04:35:39', '2020-06-10 04:35:39'),
(59, 15, 4, 'Delete', 'subagent.delete', 4, 1, '2020-06-10 04:35:48', '2020-06-10 04:35:48'),
(60, 16, 1, 'Add', 'warehouse.add', 1, 1, '2020-06-11 04:49:23', '2020-06-11 04:49:23'),
(61, 16, 2, 'Edit', 'warehouse.edit', 2, 1, '2020-06-11 04:49:34', '2020-06-11 04:49:34'),
(62, 16, 3, 'Status', 'warehouse.status', 3, 1, '2020-06-11 04:49:45', '2020-06-11 04:49:45'),
(63, 16, 4, 'Delete', 'warehouse.delete', 4, 1, '2020-06-11 04:49:54', '2020-06-11 04:49:54'),
(64, 17, 1, 'Add', 'marchant.add', 1, 1, '2020-06-11 11:38:55', '2020-06-11 11:38:55'),
(65, 17, 2, 'Edit', 'marchant.edit', 2, 1, '2020-06-11 11:39:05', '2020-06-11 11:39:05'),
(66, 17, 3, 'Status', 'marchant.status', 3, 1, '2020-06-11 11:39:14', '2020-06-11 11:39:14'),
(67, 17, 4, 'Delete', 'marchant.delete', 4, 1, '2020-06-11 11:39:24', '2020-06-11 11:39:24'),
(68, 18, 1, 'Add', 'client.add', 1, 1, '2020-06-11 11:39:57', '2020-06-11 12:27:29'),
(69, 18, 2, 'Edit', 'client.edit', 2, 1, '2020-06-11 11:40:38', '2020-06-11 11:40:38'),
(70, 18, 3, 'Status', 'client.status', 3, 1, '2020-06-11 11:40:49', '2020-06-11 11:40:49'),
(71, 18, 4, 'Delete', 'client.delete', 4, 1, '2020-06-11 11:40:59', '2020-06-11 11:40:59'),
(72, 19, 1, 'Add', 'courierType.add', 1, 1, '2020-06-15 00:35:48', '2020-06-15 00:35:48'),
(73, 19, 2, 'Edit', 'courierType.edit', 2, 1, '2020-06-15 00:36:03', '2020-06-15 00:36:03'),
(74, 19, 3, 'Status', 'courierType.status', 3, 1, '2020-06-15 00:36:16', '2020-06-15 00:36:16'),
(75, 19, 4, 'Delete', 'courierType.delete', 4, 1, '2020-06-15 00:36:28', '2020-06-15 00:36:28'),
(76, 20, 1, 'Add', 'deliveryType.add', 1, 1, '2020-06-15 02:47:26', '2020-06-16 00:58:06'),
(77, 20, 2, 'Edit', 'deliveryType.edit', 2, 1, '2020-06-15 02:47:37', '2020-06-16 00:58:14'),
(78, 20, 3, 'Status', 'deliveryType.status', 3, 1, '2020-06-15 02:47:46', '2020-06-16 00:58:21'),
(79, 20, 4, 'Delete', 'deliveryType.delete', 4, 1, '2020-06-15 02:47:56', '2020-06-16 00:58:27'),
(84, 22, 1, 'Add', 'bookingOrder.add', 1, 1, '2020-06-15 04:54:50', '2020-06-15 04:54:50'),
(85, 22, 2, 'Edit', 'bookingOrder.edit', 2, 1, '2020-06-15 04:54:58', '2020-06-15 04:54:58'),
(86, 22, 3, 'Status', 'bookingOrder.status', 4, 1, '2020-06-15 04:55:08', '2020-06-16 05:05:05'),
(87, 22, 4, 'Delete', 'bookingOrder.delete', 5, 1, '2020-06-15 04:55:23', '2020-06-16 05:04:58'),
(88, 22, 8, 'View', 'bookingOrder.view', 3, 1, '2020-06-16 05:05:33', '2020-06-16 05:05:33'),
(89, 25, 1, 'Add', 'deliveryMan.add', 1, 1, '2020-06-22 01:38:59', '2020-06-22 01:38:59'),
(90, 25, 2, 'Edit', 'deliveryMan.edit', 2, 1, '2020-06-22 01:39:11', '2020-06-22 01:39:11'),
(91, 25, 3, 'Status', 'deliveryMan.status', 3, 1, '2020-06-22 01:39:22', '2020-06-22 01:39:22'),
(92, 25, 4, 'Delete', 'deliveryMan.delete', 4, 1, '2020-06-22 01:39:37', '2020-06-22 01:39:37'),
(93, 23, 8, 'View', 'senderOrder.view', 1, 1, '2020-06-22 04:25:26', '2020-06-22 04:25:26'),
(94, 24, 8, 'View', 'receiverOrder.view', 1, 1, '2020-06-22 04:25:57', '2020-06-22 04:25:57'),
(95, 28, 8, 'View', 'goodsDelivery.view', 1, 1, '2020-06-23 01:21:23', '2020-06-23 01:21:23'),
(96, 27, 8, 'View', 'goodsCollection.view', 1, 1, '2020-06-23 01:21:51', '2020-06-23 01:21:51'),
(99, 32, 8, 'View', 'receiveFormAgent.view', 1, 1, '2020-07-01 05:08:30', '2020-07-01 05:09:28'),
(100, 33, 8, 'View', 'issueToWarehouse.view', 1, 1, '2020-07-01 05:09:57', '2020-07-01 05:09:57'),
(101, 34, 8, 'View', 'issueToAgent.view', 1, 1, '2020-07-01 05:54:00', '2020-07-01 05:54:00'),
(103, 36, 8, 'View', 'receiveFromWarehouse.view', 1, 1, '2020-07-04 04:07:08', '2020-07-04 04:07:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_action_type`
--

CREATE TABLE `tbl_menu_action_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_menu_action_type`
--

INSERT INTO `tbl_menu_action_type` (`id`, `name`, `action_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Add', 1, 1, '2020-03-05 13:42:26', '2020-03-05 13:42:26'),
(2, 'Edit', 2, 1, '2020-03-05 13:43:02', '2020-03-05 13:43:02'),
(3, 'Publication Status', 3, 1, '2020-03-05 13:49:41', '2020-03-05 13:49:41'),
(4, 'Delete', 4, 1, '2020-03-05 13:51:00', '2020-03-05 13:51:00'),
(6, 'Permission', 5, 1, '2020-03-06 02:11:00', '2020-03-06 02:11:00'),
(7, 'Change Password', 6, 1, '2020-03-06 02:11:38', '2020-03-06 02:12:58'),
(8, 'View PopUp', 7, 1, '2020-03-06 02:11:59', '2020-03-06 02:11:59'),
(9, 'View', 8, 1, '2020-03-06 02:12:09', '2020-03-06 02:12:09'),
(10, 'Shipping Status', 9, 1, '2020-03-06 02:12:20', '2020-03-06 02:12:20'),
(11, 'Product List', 10, 1, '2020-03-06 02:12:28', '2020-03-06 02:12:28'),
(12, 'View PDF', 11, 1, '2020-03-06 02:12:39', '2020-03-06 02:12:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

CREATE TABLE `tbl_pages` (
  `id` int(11) NOT NULL,
  `frontend_menu_id` int(11) DEFAULT NULL,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_pages`
--

INSERT INTO `tbl_pages` (`id`, `frontend_menu_id`, `page_name`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 4, 'Dew Hunt', 1, 4, '2020-05-10 04:56:47', 4, '2020-05-26 18:44:44'),
(2, 4, 'Page One', 1, 4, '2020-05-10 05:42:32', 4, '2020-05-10 06:03:53'),
(4, 1, 'Version Page One', 1, 4, '2020-05-10 06:08:42', NULL, '2020-05-10 06:08:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_posts`
--

CREATE TABLE `tbl_posts` (
  `id` int(11) NOT NULL,
  `page_id` int(11) DEFAULT NULL,
  `post_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inner_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `inner_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inner_width` int(11) DEFAULT NULL,
  `inner_height` int(11) DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_posts`
--

INSERT INTO `tbl_posts` (`id`, `page_id`, `post_name`, `title`, `inner_title`, `description`, `url_link`, `icon`, `image`, `width`, `height`, `inner_image`, `inner_width`, `inner_height`, `meta_title`, `meta_keyword`, `meta_description`, `order_by`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(3, 4, 'Post One', 'Post For Vision Page', 'Inner Post For Vision Page', '<h3><span style=\"font-family: &quot;Comic Sans MS&quot;;\"><b><font color=\"#ff0000\">Description for Vision Page.</font></b></span><b style=\"background-color: rgb(255, 255, 255);\"><span style=\"font-family: &quot;Comic Sans MS&quot;;\"></span></b></h3>', 'Link for Vision Page', 'Icon For Vision Page', 'public/uploads/post_images/15941214_1648336092137702_5654391025677692098_n_172610808459.jpg', NULL, NULL, 'public/uploads/post_images/91358904_2953446438056905_333599395599613952_o_19832201615.jpg', NULL, NULL, 'Meta Title for Vision Page', 'Meta,Keyaword', 'Meta Description', 1, 1, 4, '2020-05-26 18:43:20', NULL, '2020-05-26 18:43:20'),
(4, 1, 'Dew Post', 'Dew Hunt Post', 'Dew Hunt Inner Post', '<blockquote class=\"blockquote\"><b>Dew Hunt Description.</b></blockquote>', NULL, 'Dew Hunt Icon', 'public/uploads/post_images/91349259_246886026467370_5892588859736195072_o_83553817927.jpg', 500, 400, 'public/uploads/post_images/91358904_2953446438056905_333599395599613952_o_65946152893.jpg', 600, 300, 'Dew Hunt', 'Dew Hunt', 'Description', 1, 1, 4, '2020-05-26 18:48:56', NULL, '2020-06-06 02:48:12'),
(5, 2, 'Page One Post', 'Page One title', 'Page One Inner Title', '<p>Page One Description</p>', 'Link for Page One', 'Icon For Page One', NULL, NULL, NULL, NULL, NULL, NULL, 'Meta Title for Page One', 'Page,One', 'Meta Description for Page One', 1, 1, 4, '2020-06-06 03:27:13', NULL, '2020-06-06 03:27:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sliders`
--

CREATE TABLE `tbl_sliders` (
  `id` int(11) NOT NULL,
  `first_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `third_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_sliders`
--

INSERT INTO `tbl_sliders` (`id`, `first_title`, `second_title`, `third_title`, `description`, `image`, `width`, `height`, `link`, `meta_title`, `meta_keyword`, `meta_description`, `order_by`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Title - 1', 'Title - 2', 'Title - 3', '<p>Slider Short Description.</p>', 'public/uploads/slider_image/67081606_2571169809589456_136986895279194112_n_132422349083_6137491555.jpg', 250, 150, 'link', 'meta title', 'meta,keyword', 'meta description.', 1, 1, 4, '2020-04-23 10:49:57', NULL, '2020-06-06 01:40:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social_links`
--

CREATE TABLE `tbl_social_links` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_social_links`
--

INSERT INTO `tbl_social_links` (`id`, `name`, `icon`, `link`, `status`, `order_by`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(3, 'Facebook', 'fa fa-facebook-f', 'https://www.facebook.com/SalesInvent-106120540821634/?ref=br_rs', 1, 1, NULL, '2019-12-01 05:54:34', NULL, '2020-03-02 00:02:08'),
(4, 'Twiteer', 'fa fa-twitter', 'https://twitter.com', 1, 2, NULL, '2019-12-01 05:56:55', NULL, '2020-04-18 10:38:01'),
(5, 'whatsapp', 'fa fa-whatsapp', 'https://www.whatsapp.com/', 0, 3, NULL, '2020-01-11 04:12:44', NULL, '2020-03-02 00:02:21'),
(6, 'Linkdin', 'fa fa-linkedin', 'https://bd.linkedin.com/', 0, 4, NULL, '2020-01-11 04:13:04', NULL, '2020-03-02 00:02:23'),
(7, 'Instagram', 'fa fa-instagram', 'https://www.instagram.com/', 0, 5, NULL, '2020-01-11 04:13:29', NULL, '2020-03-02 00:02:25'),
(8, 'Google Plus', 'fa fa-google-plus-g', 'http://facebook.com/', 0, 6, NULL, '2020-02-11 04:47:23', NULL, '2020-03-02 00:02:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subagents`
--

CREATE TABLE `tbl_subagents` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_role_id` int(11) DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upazila` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_subagents`
--

INSERT INTO `tbl_subagents` (`id`, `user_id`, `user_role_id`, `agent_id`, `name`, `upazila`, `phone`, `email`, `nid`, `address`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(4, 26, 10, 8, 'Subagnet One', 'Mirpur', '01317243494', 'subagentone@gmail.com', '5389567031', 'Road - 12', 1, 4, '2020-07-04 01:43:23', NULL, '2020-07-04 01:43:23'),
(5, 27, 10, 9, 'Subagent Two', 'Goforgaon', '01317243494', 'subagenttwo@gmail.com', '78689768831', 'Road - 12', 1, 4, '2020-07-04 01:44:46', NULL, '2020-07-04 01:44:46'),
(6, 28, 10, 9, 'Subagent Three', 'Trishal', '01317243494', 'subagentthree@gmail.com', '78689768831', 'Road - 12', 1, 4, '2020-07-04 01:45:41', NULL, '2020-07-04 01:45:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_upazilas`
--

CREATE TABLE `tbl_upazilas` (
  `id` int(11) UNSIGNED NOT NULL,
  `district_id` int(11) UNSIGNED DEFAULT NULL,
  `english_name` varchar(255) DEFAULT NULL,
  `bangla_name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_upazilas`
--

INSERT INTO `tbl_upazilas` (`id`, `district_id`, `english_name`, `bangla_name`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 34, 'Amtali Upazila', 'আমতলী', 1, NULL, NULL, NULL, NULL),
(2, 34, 'Bamna Upazila', 'বামনা', 1, NULL, NULL, NULL, NULL),
(3, 34, 'Barguna Sadar Upazila', 'বরগুনা সদর', 1, NULL, NULL, NULL, NULL),
(4, 34, 'Betagi Upazila', 'বেতাগি', 1, NULL, NULL, NULL, NULL),
(5, 34, 'Patharghata Upazila', 'পাথরঘাটা', 1, NULL, NULL, NULL, NULL),
(6, 34, 'Taltali Upazila', 'তালতলী', 1, NULL, NULL, NULL, NULL),
(7, 35, 'Muladi Upazila', 'মুলাদি', 1, NULL, NULL, NULL, NULL),
(8, 35, 'Babuganj Upazila', 'বাবুগঞ্জ', 1, NULL, NULL, NULL, NULL),
(9, 35, 'Agailjhara Upazila', 'আগাইলঝরা', 1, NULL, NULL, NULL, NULL),
(10, 35, 'Barisal Sadar Upazila', 'বরিশাল সদর', 1, NULL, NULL, NULL, NULL),
(11, 35, 'Bakerganj Upazila', 'বাকেরগঞ্জ', 1, NULL, NULL, NULL, NULL),
(12, 35, 'Banaripara Upazila', 'বানাড়িপারা', 1, NULL, NULL, NULL, NULL),
(13, 35, 'Gaurnadi Upazila', 'গৌরনদী', 1, NULL, NULL, NULL, NULL),
(14, 35, 'Hizla Upazila', 'হিজলা', 1, NULL, NULL, NULL, NULL),
(15, 35, 'Mehendiganj Upazila', 'মেহেদিগঞ্জ ', 1, NULL, NULL, NULL, NULL),
(16, 35, 'Wazirpur Upazila', 'ওয়াজিরপুর', 1, NULL, NULL, NULL, NULL),
(17, 36, 'Bhola Sadar Upazila', 'ভোলা সদর', 1, NULL, NULL, NULL, NULL),
(18, 36, 'Burhanuddin Upazila', 'বুরহানউদ্দিন', 1, NULL, NULL, NULL, NULL),
(19, 36, 'Char Fasson Upazila', 'চর ফ্যাশন', 1, NULL, NULL, NULL, NULL),
(20, 36, 'Daulatkhan Upazila', 'দৌলতখান', 1, NULL, NULL, NULL, NULL),
(21, 36, 'Lalmohan Upazila', 'লালমোহন', 1, NULL, NULL, NULL, NULL),
(22, 36, 'Manpura Upazila', 'মনপুরা', 1, NULL, NULL, NULL, NULL),
(23, 36, 'Tazumuddin Upazila', 'তাজুমুদ্দিন', 1, NULL, NULL, NULL, NULL),
(24, 37, 'Jhalokati Sadar Upazila', 'ঝালকাঠি সদর', 1, NULL, NULL, NULL, NULL),
(25, 37, 'Kathalia Upazila', 'কাঁঠালিয়া', 1, NULL, NULL, NULL, NULL),
(26, 37, 'Nalchity Upazila', 'নালচিতি', 1, NULL, NULL, NULL, NULL),
(27, 37, 'Rajapur Upazila', 'রাজাপুর', 1, NULL, NULL, NULL, NULL),
(28, 38, 'Bauphal Upazila', 'বাউফল', 1, NULL, NULL, NULL, NULL),
(29, 38, 'Dashmina Upazila', 'দশমিনা', 1, NULL, NULL, NULL, NULL),
(30, 38, 'Galachipa Upazila', 'গলাচিপা', 1, NULL, NULL, NULL, NULL),
(31, 38, 'Kalapara Upazila', 'কালাপারা', 1, NULL, NULL, NULL, NULL),
(32, 38, 'Mirzaganj Upazila', 'মির্জাগঞ্জ ', 1, NULL, NULL, NULL, NULL),
(33, 38, 'Patuakhali Sadar Upazila', 'পটুয়াখালী সদর', 1, NULL, NULL, NULL, NULL),
(34, 38, 'Dumki Upazila', 'ডুমকি', 1, NULL, NULL, NULL, NULL),
(35, 38, 'Rangabali Upazila', 'রাঙ্গাবালি', 1, NULL, NULL, NULL, NULL),
(36, 39, 'Bhandaria', 'ভ্যান্ডারিয়া', 1, NULL, NULL, NULL, NULL),
(37, 39, 'Kaukhali', 'কাউখালি', 1, NULL, NULL, NULL, NULL),
(38, 39, 'Mathbaria', 'মাঠবাড়িয়া', 1, NULL, NULL, NULL, NULL),
(39, 39, 'Nazirpur', 'নাজিরপুর', 1, NULL, NULL, NULL, NULL),
(40, 39, 'Nesarabad', 'নেসারাবাদ', 1, NULL, NULL, NULL, NULL),
(41, 39, 'Pirojpur Sadar', 'পিরোজপুর সদর', 1, NULL, NULL, NULL, NULL),
(42, 39, 'Zianagar', 'জিয়ানগর', 1, NULL, NULL, NULL, NULL),
(43, 40, 'Bandarban Sadar', 'বান্দরবন সদর', 1, NULL, NULL, NULL, NULL),
(44, 40, 'Thanchi', 'থানচি', 1, NULL, NULL, NULL, NULL),
(45, 40, 'Lama', 'লামা', 1, NULL, NULL, NULL, NULL),
(46, 40, 'Naikhongchhari', 'নাইখংছড়ি ', 1, NULL, NULL, NULL, NULL),
(47, 40, 'Ali kadam', 'আলী কদম', 1, NULL, NULL, NULL, NULL),
(48, 40, 'Rowangchhari', 'রউয়াংছড়ি ', 1, NULL, NULL, NULL, NULL),
(49, 40, 'Ruma', 'রুমা', 1, NULL, NULL, NULL, NULL),
(50, 41, 'Brahmanbaria Sadar Upazila', 'ব্রাহ্মণবাড়িয়া সদর', 1, NULL, NULL, NULL, NULL),
(51, 41, 'Ashuganj Upazila', 'আশুগঞ্জ', 1, NULL, NULL, NULL, NULL),
(52, 41, 'Nasirnagar Upazila', 'নাসির নগর', 1, NULL, NULL, NULL, NULL),
(53, 41, 'Nabinagar Upazila', 'নবীনগর', 1, NULL, NULL, NULL, NULL),
(54, 41, 'Sarail Upazila', 'সরাইল', 1, NULL, NULL, NULL, NULL),
(55, 41, 'Shahbazpur Town', 'শাহবাজপুর টাউন', 1, NULL, NULL, NULL, NULL),
(56, 41, 'Kasba Upazila', 'কসবা', 1, NULL, NULL, NULL, NULL),
(57, 41, 'Akhaura Upazila', 'আখাউরা', 1, NULL, NULL, NULL, NULL),
(58, 41, 'Bancharampur Upazila', 'বাঞ্ছারামপুর', 1, NULL, NULL, NULL, NULL),
(59, 41, 'Bijoynagar Upazila', 'বিজয় নগর', 1, NULL, NULL, NULL, NULL),
(60, 42, 'Chandpur Sadar', 'চাঁদপুর সদর', 1, NULL, NULL, NULL, NULL),
(61, 42, 'Faridganj', 'ফরিদগঞ্জ', 1, NULL, NULL, NULL, NULL),
(62, 42, 'Haimchar', 'হাইমচর', 1, NULL, NULL, NULL, NULL),
(63, 42, 'Haziganj', 'হাজীগঞ্জ', 1, NULL, NULL, NULL, NULL),
(64, 42, 'Kachua', 'কচুয়া', 1, NULL, NULL, NULL, NULL),
(65, 42, 'Matlab Uttar', 'মতলব উত্তর', 1, NULL, NULL, NULL, NULL),
(66, 42, 'Matlab Dakkhin', 'মতলব দক্ষিণ', 1, NULL, NULL, NULL, NULL),
(67, 42, 'Shahrasti', 'শাহরাস্তি', 1, NULL, NULL, NULL, NULL),
(68, 43, 'Anwara Upazila', 'আনোয়ারা', 1, NULL, NULL, NULL, NULL),
(69, 43, 'Banshkhali Upazila', 'বাশখালি', 1, NULL, NULL, NULL, NULL),
(70, 43, 'Boalkhali Upazila', 'বোয়ালখালি', 1, NULL, NULL, NULL, NULL),
(71, 43, 'Chandanaish Upazila', 'চন্দনাইশ', 1, NULL, NULL, NULL, NULL),
(72, 43, 'Fatikchhari Upazila', 'ফটিকছড়ি', 1, NULL, NULL, NULL, NULL),
(73, 43, 'Hathazari Upazila', 'হাঠহাজারী', 1, NULL, NULL, NULL, NULL),
(74, 43, 'Lohagara Upazila', 'লোহাগারা', 1, NULL, NULL, NULL, NULL),
(75, 43, 'Mirsharai Upazila', 'মিরসরাই', 1, NULL, NULL, NULL, NULL),
(76, 43, 'Patiya Upazila', 'পটিয়া', 1, NULL, NULL, NULL, NULL),
(77, 43, 'Rangunia Upazila', 'রাঙ্গুনিয়া', 1, NULL, NULL, NULL, NULL),
(78, 43, 'Raozan Upazila', 'রাউজান', 1, NULL, NULL, NULL, NULL),
(79, 43, 'Sandwip Upazila', 'সন্দ্বীপ', 1, NULL, NULL, NULL, NULL),
(80, 43, 'Satkania Upazila', 'সাতকানিয়া', 1, NULL, NULL, NULL, NULL),
(81, 43, 'Sitakunda Upazila', 'সীতাকুণ্ড', 1, NULL, NULL, NULL, NULL),
(82, 44, 'Barura Upazila', 'বড়ুরা', 1, NULL, NULL, NULL, NULL),
(83, 44, 'Brahmanpara Upazila', 'ব্রাহ্মণপাড়া', 1, NULL, NULL, NULL, NULL),
(84, 44, 'Burichong Upazila', 'বুড়িচং', 1, NULL, NULL, NULL, NULL),
(85, 44, 'Chandina Upazila', 'চান্দিনা', 1, NULL, NULL, NULL, NULL),
(86, 44, 'Chauddagram Upazila', 'চৌদ্দগ্রাম', 1, NULL, NULL, NULL, NULL),
(87, 44, 'Daudkandi Upazila', 'দাউদকান্দি', 1, NULL, NULL, NULL, NULL),
(88, 44, 'Debidwar Upazila', 'দেবীদ্বার', 1, NULL, NULL, NULL, NULL),
(89, 44, 'Homna Upazila', 'হোমনা', 1, NULL, NULL, NULL, NULL),
(90, 44, 'Comilla Sadar Upazila', 'কুমিল্লা সদর', 1, NULL, NULL, NULL, NULL),
(91, 44, 'Laksam Upazila', 'লাকসাম', 1, NULL, NULL, NULL, NULL),
(92, 44, 'Monohorgonj Upazila', 'মনোহরগঞ্জ', 1, NULL, NULL, NULL, NULL),
(93, 44, 'Meghna Upazila', 'মেঘনা', 1, NULL, NULL, NULL, NULL),
(94, 44, 'Muradnagar Upazila', 'মুরাদনগর', 1, NULL, NULL, NULL, NULL),
(95, 44, 'Nangalkot Upazila', 'নাঙ্গালকোট', 1, NULL, NULL, NULL, NULL),
(96, 44, 'Comilla Sadar South Upazila', 'কুমিল্লা সদর দক্ষিণ', 1, NULL, NULL, NULL, NULL),
(97, 44, 'Titas Upazila', 'তিতাস', 1, NULL, NULL, NULL, NULL),
(98, 45, 'Chakaria Upazila', 'চকরিয়া', 1, NULL, NULL, NULL, NULL),
(100, 45, 'Cox\'s Bazar Sadar Upazila', 'কক্স বাজার সদর', 1, NULL, NULL, NULL, NULL),
(101, 45, 'Kutubdia Upazila', 'কুতুবদিয়া', 1, NULL, NULL, NULL, NULL),
(102, 45, 'Maheshkhali Upazila', 'মহেশখালী', 1, NULL, NULL, NULL, NULL),
(103, 45, 'Ramu Upazila', 'রামু', 1, NULL, NULL, NULL, NULL),
(104, 45, 'Teknaf Upazila', 'টেকনাফ', 1, NULL, NULL, NULL, NULL),
(105, 45, 'Ukhia Upazila', 'উখিয়া', 1, NULL, NULL, NULL, NULL),
(106, 45, 'Pekua Upazila', 'পেকুয়া', 1, NULL, NULL, NULL, NULL),
(107, 46, 'Feni Sadar', 'ফেনী সদর', 1, NULL, NULL, NULL, NULL),
(108, 46, 'Chagalnaiya', 'ছাগল নাইয়া', 1, NULL, NULL, NULL, NULL),
(109, 46, 'Daganbhyan', 'দাগানভিয়া', 1, NULL, NULL, NULL, NULL),
(110, 46, 'Parshuram', 'পরশুরাম', 1, NULL, NULL, NULL, NULL),
(111, 46, 'Fhulgazi', 'ফুলগাজি', 1, NULL, NULL, NULL, NULL),
(112, 46, 'Sonagazi', 'সোনাগাজি', 1, NULL, NULL, NULL, NULL),
(113, 47, 'Dighinala Upazila', 'দিঘিনালা ', 1, NULL, NULL, NULL, NULL),
(114, 47, 'Khagrachhari Upazila', 'খাগড়াছড়ি', 1, NULL, NULL, NULL, NULL),
(115, 47, 'Lakshmichhari Upazila', 'লক্ষ্মীছড়ি', 1, NULL, NULL, NULL, NULL),
(116, 47, 'Mahalchhari Upazila', 'মহলছড়ি', 1, NULL, NULL, NULL, NULL),
(117, 47, 'Manikchhari Upazila', 'মানিকছড়ি', 1, NULL, NULL, NULL, NULL),
(118, 47, 'Matiranga Upazila', 'মাটিরাঙ্গা', 1, NULL, NULL, NULL, NULL),
(119, 47, 'Panchhari Upazila', 'পানছড়ি', 1, NULL, NULL, NULL, NULL),
(120, 47, 'Ramgarh Upazila', 'রামগড়', 1, NULL, NULL, NULL, NULL),
(121, 48, 'Lakshmipur Sadar Upazila', 'লক্ষ্মীপুর সদর', 1, NULL, NULL, NULL, NULL),
(122, 48, 'Raipur Upazila', 'রায়পুর', 1, NULL, NULL, NULL, NULL),
(123, 48, 'Ramganj Upazila', 'রামগঞ্জ', 1, NULL, NULL, NULL, NULL),
(124, 48, 'Ramgati Upazila', 'রামগতি', 1, NULL, NULL, NULL, NULL),
(125, 48, 'Komol Nagar Upazila', 'কমল নগর', 1, NULL, NULL, NULL, NULL),
(126, 49, 'Noakhali Sadar Upazila', 'নোয়াখালী সদর', 1, NULL, NULL, NULL, NULL),
(127, 49, 'Begumganj Upazila', 'বেগমগঞ্জ', 1, NULL, NULL, NULL, NULL),
(128, 49, 'Chatkhil Upazila', 'চাটখিল', 1, NULL, NULL, NULL, NULL),
(129, 49, 'Companyganj Upazila', 'কোম্পানীগঞ্জ', 1, NULL, NULL, NULL, NULL),
(130, 49, 'Shenbag Upazila', 'শেনবাগ', 1, NULL, NULL, NULL, NULL),
(131, 49, 'Hatia Upazila', 'হাতিয়া', 1, NULL, NULL, NULL, NULL),
(132, 49, 'Kobirhat Upazila', 'কবিরহাট ', 1, NULL, NULL, NULL, NULL),
(133, 49, 'Sonaimuri Upazila', 'সোনাইমুরি', 1, NULL, NULL, NULL, NULL),
(134, 49, 'Suborno Char Upazila', 'সুবর্ণ চর ', 1, NULL, NULL, NULL, NULL),
(135, 50, 'Rangamati Sadar Upazila', 'রাঙ্গামাটি সদর', 1, NULL, NULL, NULL, NULL),
(136, 50, 'Belaichhari Upazila', 'বেলাইছড়ি', 1, NULL, NULL, NULL, NULL),
(137, 50, 'Bagaichhari Upazila', 'বাঘাইছড়ি', 1, NULL, NULL, NULL, NULL),
(138, 50, 'Barkal Upazila', 'বরকল', 1, NULL, NULL, NULL, NULL),
(139, 50, 'Juraichhari Upazila', 'জুরাইছড়ি', 1, NULL, NULL, NULL, NULL),
(140, 50, 'Rajasthali Upazila', 'রাজাস্থলি', 1, NULL, NULL, NULL, NULL),
(141, 50, 'Kaptai Upazila', 'কাপ্তাই', 1, NULL, NULL, NULL, NULL),
(142, 50, 'Langadu Upazila', 'লাঙ্গাডু', 1, NULL, NULL, NULL, NULL),
(143, 50, 'Nannerchar Upazila', 'নান্নেরচর ', 1, NULL, NULL, NULL, NULL),
(144, 50, 'Kaukhali Upazila', 'কাউখালি', 1, NULL, NULL, NULL, NULL),
(145, 1, 'Dhamrai Upazila', 'ধামরাই', 1, NULL, NULL, NULL, NULL),
(146, 1, 'Dohar Upazila', 'দোহার', 1, NULL, NULL, NULL, NULL),
(147, 1, 'Keraniganj Upazila', 'কেরানীগঞ্জ', 1, NULL, NULL, NULL, NULL),
(148, 1, 'Nawabganj Upazila', 'নবাবগঞ্জ', 1, NULL, NULL, NULL, NULL),
(149, 1, 'Savar Upazila', 'সাভার', 1, NULL, NULL, NULL, NULL),
(150, 2, 'Faridpur Sadar Upazila', 'ফরিদপুর সদর', 1, NULL, NULL, NULL, NULL),
(151, 2, 'Boalmari Upazila', 'বোয়ালমারী', 1, NULL, NULL, NULL, NULL),
(152, 2, 'Alfadanga Upazila', 'আলফাডাঙ্গা', 1, NULL, NULL, NULL, NULL),
(153, 2, 'Madhukhali Upazila', 'মধুখালি', 1, NULL, NULL, NULL, NULL),
(154, 2, 'Bhanga Upazila', 'ভাঙ্গা', 1, NULL, NULL, NULL, NULL),
(155, 2, 'Nagarkanda Upazila', 'নগরকান্ড', 1, NULL, NULL, NULL, NULL),
(156, 2, 'Charbhadrasan Upazila', 'চরভদ্রাসন ', 1, NULL, NULL, NULL, NULL),
(157, 2, 'Sadarpur Upazila', 'সদরপুর', 1, NULL, NULL, NULL, NULL),
(158, 2, 'Shaltha Upazila', 'শালথা', 1, NULL, NULL, NULL, NULL),
(159, 3, 'Gazipur Sadar-Joydebpur', 'গাজীপুর সদর', 1, NULL, NULL, NULL, NULL),
(160, 3, 'Kaliakior', 'কালিয়াকৈর', 1, NULL, NULL, NULL, NULL),
(161, 3, 'Kapasia', 'কাপাসিয়া', 1, NULL, NULL, NULL, NULL),
(162, 3, 'Sripur', 'শ্রীপুর', 1, NULL, NULL, NULL, NULL),
(163, 3, 'Kaliganj', 'কালীগঞ্জ', 1, NULL, NULL, NULL, NULL),
(164, 3, 'Tongi', 'টঙ্গি', 1, NULL, NULL, NULL, NULL),
(165, 4, 'Gopalganj Sadar Upazila', 'গোপালগঞ্জ সদর', 1, NULL, NULL, NULL, NULL),
(166, 4, 'Kashiani Upazila', 'কাশিয়ানি', 1, NULL, NULL, NULL, NULL),
(167, 4, 'Kotalipara Upazila', 'কোটালিপাড়া', 1, NULL, NULL, NULL, NULL),
(168, 4, 'Muksudpur Upazila', 'মুকসুদপুর', 1, NULL, NULL, NULL, NULL),
(169, 4, 'Tungipara Upazila', 'টুঙ্গিপাড়া', 1, NULL, NULL, NULL, NULL),
(170, 5, 'Dewanganj Upazila', 'দেওয়ানগঞ্জ', 1, NULL, NULL, NULL, NULL),
(171, 5, 'Baksiganj Upazila', 'বকসিগঞ্জ', 1, NULL, NULL, NULL, NULL),
(172, 5, 'Islampur Upazila', 'ইসলামপুর', 1, NULL, NULL, NULL, NULL),
(173, 5, 'Jamalpur Sadar Upazila', 'জামালপুর সদর', 1, NULL, NULL, NULL, NULL),
(174, 5, 'Madarganj Upazila', 'মাদারগঞ্জ', 1, NULL, NULL, NULL, NULL),
(175, 5, 'Melandaha Upazila', 'মেলানদাহা', 1, NULL, NULL, NULL, NULL),
(176, 5, 'Sarishabari Upazila', 'সরিষাবাড়ি ', 1, NULL, NULL, NULL, NULL),
(177, 5, 'Narundi Police I.C', 'নারুন্দি', 1, NULL, NULL, NULL, NULL),
(178, 6, 'Astagram Upazila', 'অষ্টগ্রাম', 1, NULL, NULL, NULL, NULL),
(179, 6, 'Bajitpur Upazila', 'বাজিতপুর', 1, NULL, NULL, NULL, NULL),
(180, 6, 'Bhairab Upazila', 'ভৈরব', 1, NULL, NULL, NULL, NULL),
(181, 6, 'Hossainpur Upazila', 'হোসেনপুর ', 1, NULL, NULL, NULL, NULL),
(182, 6, 'Itna Upazila', 'ইটনা', 1, NULL, NULL, NULL, NULL),
(183, 6, 'Karimganj Upazila', 'করিমগঞ্জ', 1, NULL, NULL, NULL, NULL),
(184, 6, 'Katiadi Upazila', 'কতিয়াদি', 1, NULL, NULL, NULL, NULL),
(185, 6, 'Kishoreganj Sadar Upazila', 'কিশোরগঞ্জ সদর', 1, NULL, NULL, NULL, NULL),
(186, 6, 'Kuliarchar Upazila', 'কুলিয়ারচর', 1, NULL, NULL, NULL, NULL),
(187, 6, 'Mithamain Upazila', 'মিঠামাইন', 1, NULL, NULL, NULL, NULL),
(188, 6, 'Nikli Upazila', 'নিকলি', 1, NULL, NULL, NULL, NULL),
(189, 6, 'Pakundia Upazila', 'পাকুন্ডা', 1, NULL, NULL, NULL, NULL),
(190, 6, 'Tarail Upazila', 'তাড়াইল', 1, NULL, NULL, NULL, NULL),
(191, 7, 'Madaripur Sadar', 'মাদারীপুর সদর', 1, NULL, NULL, NULL, NULL),
(192, 7, 'Kalkini', 'কালকিনি', 1, NULL, NULL, NULL, NULL),
(193, 7, 'Rajoir', 'রাজইর', 1, NULL, NULL, NULL, NULL),
(194, 7, 'Shibchar', 'শিবচর', 1, NULL, NULL, NULL, NULL),
(195, 8, 'Manikganj Sadar Upazila', 'মানিকগঞ্জ সদর', 1, NULL, NULL, NULL, NULL),
(196, 8, 'Singair Upazila', 'সিঙ্গাইর', 1, NULL, NULL, NULL, NULL),
(197, 8, 'Shibalaya Upazila', 'শিবালয়', 1, NULL, NULL, NULL, NULL),
(198, 8, 'Saturia Upazila', 'সাঠুরিয়া', 1, NULL, NULL, NULL, NULL),
(199, 8, 'Harirampur Upazila', 'হরিরামপুর', 1, NULL, NULL, NULL, NULL),
(200, 8, 'Ghior Upazila', 'ঘিওর', 1, NULL, NULL, NULL, NULL),
(201, 8, 'Daulatpur Upazila', 'দৌলতপুর', 1, NULL, NULL, NULL, NULL),
(202, 9, 'Lohajang Upazila', 'লোহাজং', 1, NULL, NULL, NULL, NULL),
(203, 9, 'Sreenagar Upazila', 'শ্রীনগর', 1, NULL, NULL, NULL, NULL),
(204, 9, 'Munshiganj Sadar Upazila', 'মুন্সিগঞ্জ সদর', 1, NULL, NULL, NULL, NULL),
(205, 9, 'Sirajdikhan Upazila', 'সিরাজদিখান', 1, NULL, NULL, NULL, NULL),
(206, 9, 'Tongibari Upazila', 'টঙ্গিবাড়ি', 1, NULL, NULL, NULL, NULL),
(207, 9, 'Gazaria Upazila', 'গজারিয়া', 1, NULL, NULL, NULL, NULL),
(208, 10, 'Bhaluka', 'ভালুকা', 1, NULL, NULL, NULL, NULL),
(209, 10, 'Trishal', 'ত্রিশাল', 1, NULL, NULL, NULL, NULL),
(210, 10, 'Haluaghat', 'হালুয়াঘাট', 1, NULL, NULL, NULL, NULL),
(211, 10, 'Muktagachha', 'মুক্তাগাছা', 1, NULL, NULL, NULL, NULL),
(212, 10, 'Dhobaura', 'ধবারুয়া', 1, NULL, NULL, NULL, NULL),
(213, 10, 'Fulbaria', 'ফুলবাড়িয়া', 1, NULL, NULL, NULL, NULL),
(214, 10, 'Gaffargaon', 'গফরগাঁও', 1, NULL, NULL, NULL, NULL),
(215, 10, 'Gauripur', 'গৌরিপুর', 1, NULL, NULL, NULL, NULL),
(216, 10, 'Ishwarganj', 'ঈশ্বরগঞ্জ', 1, NULL, NULL, NULL, NULL),
(217, 10, 'Mymensingh Sadar', 'ময়মনসিং সদর', 1, NULL, NULL, NULL, NULL),
(218, 10, 'Nandail', 'নন্দাইল', 1, NULL, NULL, NULL, NULL),
(219, 10, 'Phulpur', 'ফুলপুর', 1, NULL, NULL, NULL, NULL),
(220, 11, 'Araihazar Upazila', 'আড়াইহাজার', 1, NULL, NULL, NULL, NULL),
(221, 11, 'Sonargaon Upazila', 'সোনারগাঁও', 1, NULL, NULL, NULL, NULL),
(222, 11, 'Bandar', 'বান্দার', 1, NULL, NULL, NULL, NULL),
(223, 11, 'Naryanganj Sadar Upazila', 'নারায়ানগঞ্জ সদর', 1, NULL, NULL, NULL, NULL),
(224, 11, 'Rupganj Upazila', 'রূপগঞ্জ', 1, NULL, NULL, NULL, NULL),
(225, 11, 'Siddirgonj Upazila', 'সিদ্ধিরগঞ্জ', 1, NULL, NULL, NULL, NULL),
(226, 12, 'Belabo Upazila', 'বেলাবো', 1, NULL, NULL, NULL, NULL),
(227, 12, 'Monohardi Upazila', 'মনোহরদি', 1, NULL, NULL, NULL, NULL),
(228, 12, 'Narsingdi Sadar Upazila', 'নরসিংদী সদর', 1, NULL, NULL, NULL, NULL),
(229, 12, 'Palash Upazila', 'পলাশ', 1, NULL, NULL, NULL, NULL),
(230, 12, 'Raipura Upazila, Narsingdi', 'রায়পুর', 1, NULL, NULL, NULL, NULL),
(231, 12, 'Shibpur Upazila', 'শিবপুর', 1, NULL, NULL, NULL, NULL),
(232, 13, 'Kendua Upazilla', 'কেন্দুয়া', 1, NULL, NULL, NULL, NULL),
(233, 13, 'Atpara Upazilla', 'আটপাড়া', 1, NULL, NULL, NULL, NULL),
(234, 13, 'Barhatta Upazilla', 'বরহাট্টা', 1, NULL, NULL, NULL, NULL),
(235, 13, 'Durgapur Upazilla', 'দুর্গাপুর', 1, NULL, NULL, NULL, NULL),
(236, 13, 'Kalmakanda Upazilla', 'কলমাকান্দা', 1, NULL, NULL, NULL, NULL),
(237, 13, 'Madan Upazilla', 'মদন', 1, NULL, NULL, NULL, NULL),
(238, 13, 'Mohanganj Upazilla', 'মোহনগঞ্জ', 1, NULL, NULL, NULL, NULL),
(239, 13, 'Netrakona-S Upazilla', 'নেত্রকোনা সদর', 1, NULL, NULL, NULL, NULL),
(240, 13, 'Purbadhala Upazilla', 'পূর্বধলা', 1, NULL, NULL, NULL, NULL),
(241, 13, 'Khaliajuri Upazilla', 'খালিয়াজুরি', 1, NULL, NULL, NULL, NULL),
(242, 14, 'Baliakandi Upazila', 'বালিয়াকান্দি', 1, NULL, NULL, NULL, NULL),
(243, 14, 'Goalandaghat Upazila', 'গোয়ালন্দ ঘাট', 1, NULL, NULL, NULL, NULL),
(244, 14, 'Pangsha Upazila', 'পাংশা', 1, NULL, NULL, NULL, NULL),
(245, 14, 'Kalukhali Upazila', 'কালুখালি', 1, NULL, NULL, NULL, NULL),
(246, 14, 'Rajbari Sadar Upazila', 'রাজবাড়ি সদর', 1, NULL, NULL, NULL, NULL),
(247, 15, 'Shariatpur Sadar -Palong', 'শরীয়তপুর সদর ', 1, NULL, NULL, NULL, NULL),
(248, 15, 'Damudya Upazila', 'দামুদিয়া', 1, NULL, NULL, NULL, NULL),
(249, 15, 'Naria Upazila', 'নড়িয়া', 1, NULL, NULL, NULL, NULL),
(250, 15, 'Jajira Upazila', 'জাজিরা', 1, NULL, NULL, NULL, NULL),
(251, 15, 'Bhedarganj Upazila', 'ভেদারগঞ্জ', 1, NULL, NULL, NULL, NULL),
(252, 15, 'Gosairhat Upazila', 'গোসাইর হাট ', 1, NULL, NULL, NULL, NULL),
(253, 16, 'Jhenaigati Upazila', 'ঝিনাইগাতি', 1, NULL, NULL, NULL, NULL),
(254, 16, 'Nakla Upazila', 'নাকলা', 1, NULL, NULL, NULL, NULL),
(255, 16, 'Nalitabari Upazila', 'নালিতাবাড়ি', 1, NULL, NULL, NULL, NULL),
(256, 16, 'Sherpur Sadar Upazila', 'শেরপুর সদর', 1, NULL, NULL, NULL, NULL),
(257, 16, 'Sreebardi Upazila', 'শ্রীবরদি', 1, NULL, NULL, NULL, NULL),
(258, 17, 'Tangail Sadar Upazila', 'টাঙ্গাইল সদর', 1, NULL, NULL, NULL, NULL),
(259, 17, 'Sakhipur Upazila', 'সখিপুর', 1, NULL, NULL, NULL, NULL),
(260, 17, 'Basail Upazila', 'বসাইল', 1, NULL, NULL, NULL, NULL),
(261, 17, 'Madhupur Upazila', 'মধুপুর', 1, NULL, NULL, NULL, NULL),
(262, 17, 'Ghatail Upazila', 'ঘাটাইল', 1, NULL, NULL, NULL, NULL),
(263, 17, 'Kalihati Upazila', 'কালিহাতি', 1, NULL, NULL, NULL, NULL),
(264, 17, 'Nagarpur Upazila', 'নগরপুর', 1, NULL, NULL, NULL, NULL),
(265, 17, 'Mirzapur Upazila', 'মির্জাপুর', 1, NULL, NULL, NULL, NULL),
(266, 17, 'Gopalpur Upazila', 'গোপালপুর', 1, NULL, NULL, NULL, NULL),
(267, 17, 'Delduar Upazila', 'দেলদুয়ার', 1, NULL, NULL, NULL, NULL),
(268, 17, 'Bhuapur Upazila', 'ভুয়াপুর', 1, NULL, NULL, NULL, NULL),
(269, 17, 'Dhanbari Upazila', 'ধানবাড়ি', 1, NULL, NULL, NULL, NULL),
(270, 55, 'Bagerhat Sadar Upazila', 'বাগেরহাট সদর', 1, NULL, NULL, NULL, NULL),
(271, 55, 'Chitalmari Upazila', 'চিতলমাড়ি', 1, NULL, NULL, NULL, NULL),
(272, 55, 'Fakirhat Upazila', 'ফকিরহাট', 1, NULL, NULL, NULL, NULL),
(273, 55, 'Kachua Upazila', 'কচুয়া', 1, NULL, NULL, NULL, NULL),
(274, 55, 'Mollahat Upazila', 'মোল্লাহাট ', 1, NULL, NULL, NULL, NULL),
(275, 55, 'Mongla Upazila', 'মংলা', 1, NULL, NULL, NULL, NULL),
(276, 55, 'Morrelganj Upazila', 'মরেলগঞ্জ', 1, NULL, NULL, NULL, NULL),
(277, 55, 'Rampal Upazila', 'রামপাল', 1, NULL, NULL, NULL, NULL),
(278, 55, 'Sarankhola Upazila', 'স্মরণখোলা', 1, NULL, NULL, NULL, NULL),
(279, 56, 'Damurhuda Upazila', 'দামুরহুদা', 1, NULL, NULL, NULL, NULL),
(280, 56, 'Chuadanga-S Upazila', 'চুয়াডাঙ্গা সদর', 1, NULL, NULL, NULL, NULL),
(281, 56, 'Jibannagar Upazila', 'জীবন নগর ', 1, NULL, NULL, NULL, NULL),
(282, 56, 'Alamdanga Upazila', 'আলমডাঙ্গা', 1, NULL, NULL, NULL, NULL),
(283, 57, 'Abhaynagar Upazila', 'অভয়নগর', 1, NULL, NULL, NULL, NULL),
(284, 57, 'Keshabpur Upazila', 'কেশবপুর', 1, NULL, NULL, NULL, NULL),
(285, 57, 'Bagherpara Upazila', 'বাঘের পাড়া ', 1, NULL, NULL, NULL, NULL),
(286, 57, 'Jessore Sadar Upazila', 'যশোর সদর', 1, NULL, NULL, NULL, NULL),
(287, 57, 'Chaugachha Upazila', 'চৌগাছা', 1, NULL, NULL, NULL, NULL),
(288, 57, 'Manirampur Upazila', 'মনিরামপুর ', 1, NULL, NULL, NULL, NULL),
(289, 57, 'Jhikargachha Upazila', 'ঝিকরগাছা', 1, NULL, NULL, NULL, NULL),
(290, 57, 'Sharsha Upazila', 'সারশা', 1, NULL, NULL, NULL, NULL),
(291, 58, 'Jhenaidah Sadar Upazila', 'ঝিনাইদহ সদর', 1, NULL, NULL, NULL, NULL),
(292, 58, 'Maheshpur Upazila', 'মহেশপুর', 1, NULL, NULL, NULL, NULL),
(293, 58, 'Kaliganj Upazila', 'কালীগঞ্জ', 1, NULL, NULL, NULL, NULL),
(294, 58, 'Kotchandpur Upazila', 'কোট চাঁদপুর ', 1, NULL, NULL, NULL, NULL),
(295, 58, 'Shailkupa Upazila', 'শৈলকুপা', 1, NULL, NULL, NULL, NULL),
(296, 58, 'Harinakunda Upazila', 'হাড়িনাকুন্দা', 1, NULL, NULL, NULL, NULL),
(297, 59, 'Terokhada Upazila', 'তেরোখাদা', 1, NULL, NULL, NULL, NULL),
(298, 59, 'Batiaghata Upazila', 'বাটিয়াঘাটা ', 1, NULL, NULL, NULL, NULL),
(299, 59, 'Dacope Upazila', 'ডাকপে', 1, NULL, NULL, NULL, NULL),
(300, 59, 'Dumuria Upazila', 'ডুমুরিয়া', 1, NULL, NULL, NULL, NULL),
(301, 59, 'Dighalia Upazila', 'দিঘলিয়া', 1, NULL, NULL, NULL, NULL),
(302, 59, 'Koyra Upazila', 'কয়ড়া', 1, NULL, NULL, NULL, NULL),
(303, 59, 'Paikgachha Upazila', 'পাইকগাছা', 1, NULL, NULL, NULL, NULL),
(304, 59, 'Phultala Upazila', 'ফুলতলা', 1, NULL, NULL, NULL, NULL),
(305, 59, 'Rupsa Upazila', 'রূপসা', 1, NULL, NULL, NULL, NULL),
(306, 60, 'Kushtia Sadar', 'কুষ্টিয়া সদর', 1, NULL, NULL, NULL, NULL),
(307, 60, 'Kumarkhali', 'কুমারখালি', 1, NULL, NULL, NULL, NULL),
(308, 60, 'Daulatpur', 'দৌলতপুর', 1, NULL, NULL, NULL, NULL),
(309, 60, 'Mirpur', 'মিরপুর', 1, NULL, NULL, NULL, NULL),
(310, 60, 'Bheramara', 'ভেরামারা', 1, NULL, NULL, NULL, NULL),
(311, 60, 'Khoksa', 'খোকসা', 1, NULL, NULL, NULL, NULL),
(312, 61, 'Magura Sadar Upazila', 'মাগুরা সদর', 1, NULL, NULL, NULL, NULL),
(313, 61, 'Mohammadpur Upazila', 'মোহাম্মাদপুর', 1, NULL, NULL, NULL, NULL),
(314, 61, 'Shalikha Upazila', 'শালিখা', 1, NULL, NULL, NULL, NULL),
(315, 61, 'Sreepur Upazila', 'শ্রীপুর', 1, NULL, NULL, NULL, NULL),
(316, 62, 'angni Upazila', 'আংনি', 1, NULL, NULL, NULL, NULL),
(317, 62, 'Mujib Nagar Upazila', 'মুজিব নগর', 1, NULL, NULL, NULL, NULL),
(318, 62, 'Meherpur-S Upazila', 'মেহেরপুর সদর', 1, NULL, NULL, NULL, NULL),
(319, 63, 'Narail-S Upazilla', 'নড়াইল সদর', 1, NULL, NULL, NULL, NULL),
(320, 63, 'Lohagara Upazilla', 'লোহাগাড়া', 1, NULL, NULL, NULL, NULL),
(321, 63, 'Kalia Upazilla', 'কালিয়া', 1, NULL, NULL, NULL, NULL),
(322, 64, 'Satkhira Sadar Upazila', 'সাতক্ষীরা সদর', 1, NULL, NULL, NULL, NULL),
(323, 64, 'Assasuni Upazila', 'আসসাশুনি ', 1, NULL, NULL, NULL, NULL),
(324, 64, 'Debhata Upazila', 'দেভাটা', 1, NULL, NULL, NULL, NULL),
(325, 64, 'Tala Upazila', 'তালা', 1, NULL, NULL, NULL, NULL),
(326, 64, 'Kalaroa Upazila', 'কলরোয়া', 1, NULL, NULL, NULL, NULL),
(327, 64, 'Kaliganj Upazila', 'কালীগঞ্জ', 1, NULL, NULL, NULL, NULL),
(328, 64, 'Shyamnagar Upazila', 'শ্যামনগর', 1, NULL, NULL, NULL, NULL),
(329, 18, 'Adamdighi', 'আদমদিঘী', 1, NULL, NULL, NULL, NULL),
(330, 18, 'Bogra Sadar', 'বগুড়া সদর', 1, NULL, NULL, NULL, NULL),
(331, 18, 'Sherpur', 'শেরপুর', 1, NULL, NULL, NULL, NULL),
(332, 18, 'Dhunat', 'ধুনট', 1, NULL, NULL, NULL, NULL),
(333, 18, 'Dhupchanchia', 'দুপচাচিয়া', 1, NULL, NULL, NULL, NULL),
(334, 18, 'Gabtali', 'গাবতলি', 1, NULL, NULL, NULL, NULL),
(335, 18, 'Kahaloo', 'কাহালু', 1, NULL, NULL, NULL, NULL),
(336, 18, 'Nandigram', 'নন্দিগ্রাম', 1, NULL, NULL, NULL, NULL),
(337, 18, 'Sahajanpur', 'শাহজাহানপুর', 1, NULL, NULL, NULL, NULL),
(338, 18, 'Sariakandi', 'সারিয়াকান্দি', 1, NULL, NULL, NULL, NULL),
(339, 18, 'Shibganj', 'শিবগঞ্জ', 1, NULL, NULL, NULL, NULL),
(340, 18, 'Sonatala', 'সোনাতলা', 1, NULL, NULL, NULL, NULL),
(341, 19, 'Joypurhat S', 'জয়পুরহাট সদর', 1, NULL, NULL, NULL, NULL),
(342, 19, 'Akkelpur', 'আক্কেলপুর', 1, NULL, NULL, NULL, NULL),
(343, 19, 'Kalai', 'কালাই', 1, NULL, NULL, NULL, NULL),
(344, 19, 'Khetlal', 'খেতলাল', 1, NULL, NULL, NULL, NULL),
(345, 19, 'Panchbibi', 'পাঁচবিবি', 1, NULL, NULL, NULL, NULL),
(346, 20, 'Naogaon Sadar Upazila', 'নওগাঁ সদর', 1, NULL, NULL, NULL, NULL),
(347, 20, 'Mohadevpur Upazila', 'মহাদেবপুর', 1, NULL, NULL, NULL, NULL),
(348, 20, 'Manda Upazila', 'মান্দা', 1, NULL, NULL, NULL, NULL),
(349, 20, 'Niamatpur Upazila', 'নিয়ামতপুর', 1, NULL, NULL, NULL, NULL),
(350, 20, 'Atrai Upazila', 'আত্রাই', 1, NULL, NULL, NULL, NULL),
(351, 20, 'Raninagar Upazila', 'রাণীনগর', 1, NULL, NULL, NULL, NULL),
(352, 20, 'Patnitala Upazila', 'পত্নীতলা', 1, NULL, NULL, NULL, NULL),
(353, 20, 'Dhamoirhat Upazila', 'ধামইরহাট ', 1, NULL, NULL, NULL, NULL),
(354, 20, 'Sapahar Upazila', 'সাপাহার', 1, NULL, NULL, NULL, NULL),
(355, 20, 'Porsha Upazila', 'পোরশা', 1, NULL, NULL, NULL, NULL),
(356, 20, 'Badalgachhi Upazila', 'বদলগাছি', 1, NULL, NULL, NULL, NULL),
(357, 21, 'Natore Sadar Upazila', 'নাটোর সদর', 1, NULL, NULL, NULL, NULL),
(358, 21, 'Baraigram Upazila', 'বড়াইগ্রাম', 1, NULL, NULL, NULL, NULL),
(359, 21, 'Bagatipara Upazila', 'বাগাতিপাড়া', 1, NULL, NULL, NULL, NULL),
(360, 21, 'Lalpur Upazila', 'লালপুর', 1, NULL, NULL, NULL, NULL),
(361, 21, 'Natore Sadar Upazila', 'নাটোর সদর', 1, NULL, NULL, NULL, NULL),
(362, 21, 'Baraigram Upazila', 'বড়াই গ্রাম', 1, NULL, NULL, NULL, NULL),
(363, 22, 'Bholahat Upazila', 'ভোলাহাট', 1, NULL, NULL, NULL, NULL),
(364, 22, 'Gomastapur Upazila', 'গোমস্তাপুর', 1, NULL, NULL, NULL, NULL),
(365, 22, 'Nachole Upazila', 'নাচোল', 1, NULL, NULL, NULL, NULL),
(366, 22, 'Nawabganj Sadar Upazila', 'নবাবগঞ্জ সদর', 1, NULL, NULL, NULL, NULL),
(367, 22, 'Shibganj Upazila', 'শিবগঞ্জ', 1, NULL, NULL, NULL, NULL),
(368, 23, 'Atgharia Upazila', 'আটঘরিয়া', 1, NULL, NULL, NULL, NULL),
(369, 23, 'Bera Upazila', 'বেড়া', 1, NULL, NULL, NULL, NULL),
(370, 23, 'Bhangura Upazila', 'ভাঙ্গুরা', 1, NULL, NULL, NULL, NULL),
(371, 23, 'Chatmohar Upazila', 'চাটমোহর', 1, NULL, NULL, NULL, NULL),
(372, 23, 'Faridpur Upazila', 'ফরিদপুর', 1, NULL, NULL, NULL, NULL),
(373, 23, 'Ishwardi Upazila', 'ঈশ্বরদী', 1, NULL, NULL, NULL, NULL),
(374, 23, 'Pabna Sadar Upazila', 'পাবনা সদর', 1, NULL, NULL, NULL, NULL),
(375, 23, 'Santhia Upazila', 'সাথিয়া', 1, NULL, NULL, NULL, NULL),
(376, 23, 'Sujanagar Upazila', 'সুজানগর', 1, NULL, NULL, NULL, NULL),
(377, 24, 'Bagha', 'বাঘা', 1, NULL, NULL, NULL, NULL),
(378, 24, 'Bagmara', 'বাগমারা', 1, NULL, NULL, NULL, NULL),
(379, 24, 'Charghat', 'চারঘাট', 1, NULL, NULL, NULL, NULL),
(380, 24, 'Durgapur', 'দুর্গাপুর', 1, NULL, NULL, NULL, NULL),
(381, 24, 'Godagari', 'গোদাগারি', 1, NULL, NULL, NULL, NULL),
(382, 24, 'Mohanpur', 'মোহনপুর', 1, NULL, NULL, NULL, NULL),
(383, 24, 'Paba', 'পবা', 1, NULL, NULL, NULL, NULL),
(384, 24, 'Puthia', 'পুঠিয়া', 1, NULL, NULL, NULL, NULL),
(385, 24, 'Tanore', 'তানোর', 1, NULL, NULL, NULL, NULL),
(386, 25, 'Sirajganj Sadar Upazila', 'সিরাজগঞ্জ সদর', 1, NULL, NULL, NULL, NULL),
(387, 25, 'Belkuchi Upazila', 'বেলকুচি', 1, NULL, NULL, NULL, NULL),
(388, 25, 'Chauhali Upazila', 'চৌহালি', 1, NULL, NULL, NULL, NULL),
(389, 25, 'Kamarkhanda Upazila', 'কামারখান্দা', 1, NULL, NULL, NULL, NULL),
(390, 25, 'Kazipur Upazila', 'কাজীপুর', 1, NULL, NULL, NULL, NULL),
(391, 25, 'Raiganj Upazila', 'রায়গঞ্জ', 1, NULL, NULL, NULL, NULL),
(392, 25, 'Shahjadpur Upazila', 'শাহজাদপুর', 1, NULL, NULL, NULL, NULL),
(393, 25, 'Tarash Upazila', 'তারাশ', 1, NULL, NULL, NULL, NULL),
(394, 25, 'Ullahpara Upazila', 'উল্লাপাড়া', 1, NULL, NULL, NULL, NULL),
(395, 26, 'Birampur Upazila', 'বিরামপুর', 1, NULL, NULL, NULL, NULL),
(396, 26, 'Birganj', 'বীরগঞ্জ', 1, NULL, NULL, NULL, NULL),
(397, 26, 'Biral Upazila', 'বিড়াল', 1, NULL, NULL, NULL, NULL),
(398, 26, 'Bochaganj Upazila', 'বোচাগঞ্জ', 1, NULL, NULL, NULL, NULL),
(399, 26, 'Chirirbandar Upazila', 'চিরিরবন্দর', 1, NULL, NULL, NULL, NULL),
(400, 26, 'Phulbari Upazila', 'ফুলবাড়ি', 1, NULL, NULL, NULL, NULL),
(401, 26, 'Ghoraghat Upazila', 'ঘোড়াঘাট', 1, NULL, NULL, NULL, NULL),
(402, 26, 'Hakimpur Upazila', 'হাকিমপুর', 1, NULL, NULL, NULL, NULL),
(403, 26, 'Kaharole Upazila', 'কাহারোল', 1, NULL, NULL, NULL, NULL),
(404, 26, 'Khansama Upazila', 'খানসামা', 1, NULL, NULL, NULL, NULL),
(405, 26, 'Dinajpur Sadar Upazila', 'দিনাজপুর সদর', 1, NULL, NULL, NULL, NULL),
(406, 26, 'Nawabganj', 'নবাবগঞ্জ', 1, NULL, NULL, NULL, NULL),
(407, 26, 'Parbatipur Upazila', 'পার্বতীপুর', 1, NULL, NULL, NULL, NULL),
(408, 27, 'Fulchhari', 'ফুলছড়ি', 1, NULL, NULL, NULL, NULL),
(409, 27, 'Gaibandha sadar', 'গাইবান্ধা সদর', 1, NULL, NULL, NULL, NULL),
(410, 27, 'Gobindaganj', 'গোবিন্দগঞ্জ', 1, NULL, NULL, NULL, NULL),
(411, 27, 'Palashbari', 'পলাশবাড়ী', 1, NULL, NULL, NULL, NULL),
(412, 27, 'Sadullapur', 'সাদুল্যাপুর', 1, NULL, NULL, NULL, NULL),
(413, 27, 'Saghata', 'সাঘাটা', 1, NULL, NULL, NULL, NULL),
(414, 27, 'Sundarganj', 'সুন্দরগঞ্জ', 1, NULL, NULL, NULL, NULL),
(415, 28, 'Kurigram Sadar', 'কুড়িগ্রাম সদর', 1, NULL, NULL, NULL, NULL),
(416, 28, 'Nageshwari', 'নাগেশ্বরী', 1, NULL, NULL, NULL, NULL),
(417, 28, 'Bhurungamari', 'ভুরুঙ্গামারি', 1, NULL, NULL, NULL, NULL),
(418, 28, 'Phulbari', 'ফুলবাড়ি', 1, NULL, NULL, NULL, NULL),
(419, 28, 'Rajarhat', 'রাজারহাট', 1, NULL, NULL, NULL, NULL),
(420, 28, 'Ulipur', 'উলিপুর', 1, NULL, NULL, NULL, NULL),
(421, 28, 'Chilmari', 'চিলমারি', 1, NULL, NULL, NULL, NULL),
(422, 28, 'Rowmari', 'রউমারি', 1, NULL, NULL, NULL, NULL),
(423, 28, 'Char Rajibpur', 'চর রাজিবপুর', 1, NULL, NULL, NULL, NULL),
(424, 29, 'Lalmanirhat Sadar', 'লালমনিরহাট সদর', 1, NULL, NULL, NULL, NULL),
(425, 29, 'Aditmari', 'আদিতমারি', 1, NULL, NULL, NULL, NULL),
(426, 29, 'Kaliganj', 'কালীগঞ্জ', 1, NULL, NULL, NULL, NULL),
(427, 29, 'Hatibandha', 'হাতিবান্ধা', 1, NULL, NULL, NULL, NULL),
(428, 29, 'Patgram', 'পাটগ্রাম', 1, NULL, NULL, NULL, NULL),
(429, 30, 'Nilphamari Sadar', 'নীলফামারী সদর', 1, NULL, NULL, NULL, NULL),
(430, 30, 'Saidpur', 'সৈয়দপুর', 1, NULL, NULL, NULL, NULL),
(431, 30, 'Jaldhaka', 'জলঢাকা', 1, NULL, NULL, NULL, NULL),
(432, 30, 'Kishoreganj', 'কিশোরগঞ্জ', 1, NULL, NULL, NULL, NULL),
(433, 30, 'Domar', 'ডোমার', 1, NULL, NULL, NULL, NULL),
(434, 30, 'Dimla', 'ডিমলা', 1, NULL, NULL, NULL, NULL),
(435, 31, 'Panchagarh Sadar', 'পঞ্চগড় সদর', 1, NULL, NULL, NULL, NULL),
(436, 31, 'Debiganj', 'দেবীগঞ্জ', 1, NULL, NULL, NULL, NULL),
(437, 31, 'Boda', 'বোদা', 1, NULL, NULL, NULL, NULL),
(438, 31, 'Atwari', 'আটোয়ারি', 1, NULL, NULL, NULL, NULL),
(439, 31, 'Tetulia', 'তেতুলিয়া', 1, NULL, NULL, NULL, NULL),
(440, 32, 'Badarganj', 'বদরগঞ্জ', 1, NULL, NULL, NULL, NULL),
(441, 32, 'Mithapukur', 'মিঠাপুকুর', 1, NULL, NULL, NULL, NULL),
(442, 32, 'Gangachara', 'গঙ্গাচরা', 1, NULL, NULL, NULL, NULL),
(443, 32, 'Kaunia', 'কাউনিয়া', 1, NULL, NULL, NULL, NULL),
(444, 32, 'Rangpur Sadar', 'রংপুর সদর', 1, NULL, NULL, NULL, NULL),
(445, 32, 'Pirgachha', 'পীরগাছা', 1, NULL, NULL, NULL, NULL),
(446, 32, 'Pirganj', 'পীরগঞ্জ', 1, NULL, NULL, NULL, NULL),
(447, 32, 'Taraganj', 'তারাগঞ্জ', 1, NULL, NULL, NULL, NULL),
(448, 33, 'Thakurgaon Sadar Upazila', 'ঠাকুরগাঁও সদর', 1, NULL, NULL, NULL, NULL),
(449, 33, 'Pirganj Upazila', 'পীরগঞ্জ', 1, NULL, NULL, NULL, NULL),
(450, 33, 'Baliadangi Upazila', 'বালিয়াডাঙ্গি', 1, NULL, NULL, NULL, NULL),
(451, 33, 'Haripur Upazila', 'হরিপুর', 1, NULL, NULL, NULL, NULL),
(452, 33, 'Ranisankail Upazila', 'রাণীসংকইল', 1, NULL, NULL, NULL, NULL),
(453, 51, 'Ajmiriganj', 'আজমিরিগঞ্জ', 1, NULL, NULL, NULL, NULL),
(454, 51, 'Baniachang', 'বানিয়াচং', 1, NULL, NULL, NULL, NULL),
(455, 51, 'Bahubal', 'বাহুবল', 1, NULL, NULL, NULL, NULL),
(456, 51, 'Chunarughat', 'চুনারুঘাট', 1, NULL, NULL, NULL, NULL),
(457, 51, 'Habiganj Sadar', 'হবিগঞ্জ সদর', 1, NULL, NULL, NULL, NULL),
(458, 51, 'Lakhai', 'লাক্ষাই', 1, NULL, NULL, NULL, NULL),
(459, 51, 'Madhabpur', 'মাধবপুর', 1, NULL, NULL, NULL, NULL),
(460, 51, 'Nabiganj', 'নবীগঞ্জ', 1, NULL, NULL, NULL, NULL),
(461, 51, 'Shaistagonj Upazila', 'শায়েস্তাগঞ্জ', 1, NULL, NULL, NULL, NULL),
(462, 52, 'Moulvibazar Sadar', 'মৌলভীবাজার', 1, NULL, NULL, NULL, NULL),
(463, 52, 'Barlekha', 'বড়লেখা', 1, NULL, NULL, NULL, NULL),
(464, 52, 'Juri', 'জুড়ি', 1, NULL, NULL, NULL, NULL),
(465, 52, 'Kamalganj', 'কামালগঞ্জ', 1, NULL, NULL, NULL, NULL),
(466, 52, 'Kulaura', 'কুলাউরা', 1, NULL, NULL, NULL, NULL),
(467, 52, 'Rajnagar', 'রাজনগর', 1, NULL, NULL, NULL, NULL),
(468, 52, 'Sreemangal', 'শ্রীমঙ্গল', 1, NULL, NULL, NULL, NULL),
(469, 53, 'Bishwamvarpur', 'বিসশম্ভারপুর', 1, NULL, NULL, NULL, NULL),
(470, 53, 'Chhatak', 'ছাতক', 1, NULL, NULL, NULL, NULL),
(471, 53, 'Derai', 'দেড়াই', 1, NULL, NULL, NULL, NULL),
(472, 53, 'Dharampasha', 'ধরমপাশা', 1, NULL, NULL, NULL, NULL),
(473, 53, 'Dowarabazar', 'দোয়ারাবাজার', 1, NULL, NULL, NULL, NULL),
(474, 53, 'Jagannathpur', 'জগন্নাথপুর', 1, NULL, NULL, NULL, NULL),
(475, 53, 'Jamalganj', 'জামালগঞ্জ', 1, NULL, NULL, NULL, NULL),
(476, 53, 'Sulla', 'সুল্লা', 1, NULL, NULL, NULL, NULL),
(477, 53, 'Sunamganj Sadar', 'সুনামগঞ্জ সদর', 1, NULL, NULL, NULL, NULL),
(478, 53, 'Shanthiganj', 'শান্তিগঞ্জ', 1, NULL, NULL, NULL, NULL),
(479, 53, 'Tahirpur', 'তাহিরপুর', 1, NULL, NULL, NULL, NULL),
(480, 54, 'Sylhet Sadar', 'সিলেট সদর', 1, NULL, NULL, NULL, NULL),
(481, 54, 'Beanibazar', 'বেয়ানিবাজার', 1, NULL, NULL, NULL, NULL),
(482, 54, 'Bishwanath', 'বিশ্বনাথ', 1, NULL, NULL, NULL, NULL),
(483, 54, 'Dakshin Surma Upazila', 'দক্ষিণ সুরমা', 1, NULL, NULL, NULL, NULL),
(484, 54, 'Balaganj', 'বালাগঞ্জ', 1, NULL, NULL, NULL, NULL),
(485, 54, 'Companiganj', 'কোম্পানিগঞ্জ', 1, NULL, NULL, NULL, NULL),
(486, 54, 'Fenchuganj', 'ফেঞ্চুগঞ্জ', 1, NULL, NULL, NULL, NULL),
(487, 54, 'Golapganj', 'গোলাপগঞ্জ', 1, NULL, NULL, NULL, NULL),
(488, 54, 'Gowainghat', 'গোয়াইনঘাট', 1, NULL, NULL, NULL, NULL),
(489, 54, 'Jaintiapur', 'জয়ন্তপুর', 1, NULL, NULL, NULL, NULL),
(490, 54, 'Kanaighat', 'কানাইঘাট', 1, NULL, NULL, NULL, NULL),
(491, 54, 'Zakiganj', 'জাকিগঞ্জ', 1, NULL, NULL, NULL, NULL),
(492, 54, 'Nobigonj', 'নবীগঞ্জ', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_roles`
--

CREATE TABLE `tbl_user_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_role` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `permission` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_permission` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_user_roles`
--

INSERT INTO `tbl_user_roles` (`id`, `name`, `parent_role`, `level`, `status`, `permission`, `action_permission`, `created_at`, `updated_at`) VALUES
(2, 'Super User', NULL, 1, 1, '1,2,3,4,5,6,7,8,10,11,12,13,14,15,16,17,18,19,20,25,21,22', '2,3,4,5,6,11,12,13,14,15,7,8,9,10,21,22,23,24,25,26,28,29,30,31,32,33,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,89,90,91,92,84,85,88,86,87', '2019-04-17 00:50:05', '2020-06-22 01:42:10'),
(3, 'Admin', NULL, 1, 1, '1,2,3,5', '2,3,4,11,12,13,14,15,21,22,23,24,25,26', '2019-04-17 00:52:54', '2020-06-10 23:31:43'),
(4, 'Client', NULL, 1, 1, '', '', '2020-03-07 00:49:33', '2020-06-23 00:59:21'),
(8, 'Agent', NULL, 1, 1, '21,23,24', '93,94', '2020-06-10 06:39:37', '2020-06-22 04:26:20'),
(10, 'Subagnet', 8, 2, 1, '21,23,24', '93,94', '2020-06-10 06:42:15', '2020-06-22 04:26:51'),
(11, 'Warehouse', NULL, 1, 1, '29,32,33,34,36', '99,100,101,103', '2020-06-11 05:00:51', '2020-07-04 04:07:36'),
(12, 'Marchant', NULL, 1, 1, '21,23,24', '', '2020-06-11 05:01:00', '2020-06-18 05:16:10'),
(14, 'Delivery Man', NULL, 1, 1, '26,27,28', '96,95', '2020-06-22 01:41:39', '2020-06-23 01:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warehouses`
--

CREATE TABLE `tbl_warehouses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_role_id` int(255) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_warehouses`
--

INSERT INTO `tbl_warehouses` (`id`, `user_id`, `user_role_id`, `name`, `contact_person`, `phone`, `email`, `address`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(3, 29, 11, 'Dhaka South', 'Karim', '01317243494', 'dhakasouth@gmail.com', 'Road - 12', 1, 4, '2020-07-04 01:47:38', NULL, '2020-07-04 01:47:38'),
(4, 30, 11, 'Dhaka North', 'Habib', '01317243494', 'dhakanorth@gmail.com', 'Road - 12', 1, 4, '2020-07-04 01:48:21', NULL, '2020-07-04 01:48:21'),
(5, 31, 11, 'Mymensing Warehouse', 'Jisan', '01317243494', 'mymensingwarehoue@gmail.com', 'Road - 12', 1, 4, '2020-07-04 01:49:39', NULL, '2020-07-04 01:49:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_website_information`
--

CREATE TABLE `tbl_website_information` (
  `id` int(11) NOT NULL,
  `website_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prefix_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_one` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_two` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fav_icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `developed_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_website_information`
--

INSERT INTO `tbl_website_information` (`id`, `website_name`, `prefix_title`, `website_title`, `logo_one`, `logo_two`, `fav_icon`, `developed_by`, `meta_title`, `meta_keyword`, `meta_description`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Dew Hunt', '|', 'Portfolio', 'public/uploads/site_logo/logo1/apollo-beast-making-of-2_193381422103.jpg', 'public/uploads/site_logo/logo2/Apollo-Tyres-Beast-Kampagne_188041158179.jpg', 'public/uploads/site_logo/fav_icon/67081606_2571169809589456_136986895279194112_n_38406452410.jpg', 'Dew Hunt', 'meta title', NULL, 'meta description', 1, 4, '2020-04-17 08:33:15', NULL, '2020-04-18 05:22:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_zones`
-- (See below for the actual view)
--
CREATE TABLE `view_zones` (
`zone_id` int(11)
,`zone_type` varchar(8)
,`zone_name` varchar(255)
,`zone_phone` varchar(255)
,`zone_address` mediumtext
);

-- --------------------------------------------------------

--
-- Structure for view `view_zones`
--
DROP TABLE IF EXISTS `view_zones`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_zones`  AS  select `tbl_agents`.`id` AS `zone_id`,'Agent' AS `zone_type`,`tbl_agents`.`name` AS `zone_name`,`tbl_agents`.`phone` AS `zone_phone`,`tbl_agents`.`address` AS `zone_address` from `tbl_agents` union all select `tbl_subagents`.`id` AS `zone_id`,'Subagent' AS `zone_type`,`tbl_subagents`.`name` AS `zone_name`,`tbl_subagents`.`phone` AS `zone_phone`,`tbl_subagents`.`address` AS `zone_address` from `tbl_subagents` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tbl_agents`
--
ALTER TABLE `tbl_agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_booking_orders`
--
ALTER TABLE `tbl_booking_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_clients`
--
ALTER TABLE `tbl_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_courier_types`
--
ALTER TABLE `tbl_courier_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_delivery_men`
--
ALTER TABLE `tbl_delivery_men`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_delivery_types`
--
ALTER TABLE `tbl_delivery_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_districts`
--
ALTER TABLE `tbl_districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_frontend_menu`
--
ALTER TABLE `tbl_frontend_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_marchants`
--
ALTER TABLE `tbl_marchants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menus`
--
ALTER TABLE `tbl_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu_actions`
--
ALTER TABLE `tbl_menu_actions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu_action_type`
--
ALTER TABLE `tbl_menu_action_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sliders`
--
ALTER TABLE `tbl_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_social_links`
--
ALTER TABLE `tbl_social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subagents`
--
ALTER TABLE `tbl_subagents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_upazilas`
--
ALTER TABLE `tbl_upazilas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_roles`
--
ALTER TABLE `tbl_user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_warehouses`
--
ALTER TABLE `tbl_warehouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_website_information`
--
ALTER TABLE `tbl_website_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_agents`
--
ALTER TABLE `tbl_agents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_booking_orders`
--
ALTER TABLE `tbl_booking_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_clients`
--
ALTER TABLE `tbl_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_courier_types`
--
ALTER TABLE `tbl_courier_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_delivery_men`
--
ALTER TABLE `tbl_delivery_men`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_delivery_types`
--
ALTER TABLE `tbl_delivery_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_districts`
--
ALTER TABLE `tbl_districts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tbl_frontend_menu`
--
ALTER TABLE `tbl_frontend_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_marchants`
--
ALTER TABLE `tbl_marchants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_menus`
--
ALTER TABLE `tbl_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_menu_actions`
--
ALTER TABLE `tbl_menu_actions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `tbl_menu_action_type`
--
ALTER TABLE `tbl_menu_action_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_sliders`
--
ALTER TABLE `tbl_sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_social_links`
--
ALTER TABLE `tbl_social_links`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_subagents`
--
ALTER TABLE `tbl_subagents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_upazilas`
--
ALTER TABLE `tbl_upazilas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=493;

--
-- AUTO_INCREMENT for table `tbl_user_roles`
--
ALTER TABLE `tbl_user_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_warehouses`
--
ALTER TABLE `tbl_warehouses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_website_information`
--
ALTER TABLE `tbl_website_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
