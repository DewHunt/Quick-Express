-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2020 at 05:55 PM
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
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(30, 'Dhaka Central Warehouse', '01612742150', 'dhakacentral@quickexpress.com.bd', NULL, 11, '$2y$10$6oDOraHJJiqdDdkhKgBP7eZn0K0DlxGhh2LVLaCbtJrXD/y8RHRvS', 1, NULL, '2020-07-03 19:48:21', '2020-08-15 17:22:43'),
(53, 'Dew Hunt', '01317243494', 'dew.fog1553@gmail.com', NULL, 14, '$2y$10$EW.MaumpvLEKiEFj1VNrPOUYyic3KV/7GGwfW8UO/cs0FRgIAA3D2', 1, NULL, '2020-07-06 15:52:48', '2020-08-17 15:21:13'),
(56, 'Badda', '01713900802', 'agent_badda@gmail.com', NULL, 8, '$2y$10$wdmwPD9LZ9XD3UP/aNCFzebuRumTO/hBDptsUcFJnZovkPwK299hq', 1, NULL, '2020-07-13 22:07:25', '2020-08-15 17:20:34'),
(58, 'Mirpur', '01713900800', 'agent_mirpur@gmail.com', NULL, 8, '$2y$10$kt3rL4.MyUnmZ8RWjN2Tg.VeFbmWBJ5vUze62dJkFIjdl3lQnh/mW', 1, NULL, '2020-07-25 17:57:06', '2020-08-15 17:20:08'),
(60, 'Dhamondi', '01713900803', 'agent_dhanmondi@gmail.com', NULL, 8, '$2y$10$3qNWFKE9t0ZPY9t.Ws1rDu0IC0uYgjWJnV.Y2PLBMVU0dRxV.mOfO', 1, NULL, '2020-08-11 15:55:51', '2020-08-15 17:20:18'),
(61, 'Uttara', '01713900804', 'agent_uttara@gmail.com', NULL, 8, '$2y$10$sCcujks3b1mveildGTGvi.fwA3A9Uc3lds0./f0sc/wTAkr8aZqly', 1, NULL, '2020-08-11 15:56:58', '2020-08-15 17:19:40'),
(62, 'Zatrabari', '01713900805', 'agent_zatrabari@gmail.com', NULL, 8, '$2y$10$F6EvVpJqTK7/.FXmaQuHnO9NVr1cPvhO4.IsPzTaXviEIWdV3217m', 1, NULL, '2020-08-11 15:57:39', '2020-08-15 17:19:21'),
(72, 'Ripon', '01418253567', 'ripon@gmail.com', NULL, 14, '$2y$10$2faQ4wTso7JjVAfJF3SAXOQ.ckhTUDwC1UIAYPXYTUjxBpQMCgpOC', 1, NULL, '2020-08-24 00:18:56', '2020-08-24 00:18:56'),
(73, 'Raihan', '01713900818', 'raihan@gmail.com', NULL, 14, '$2y$10$1PFmi8VvFwvUrOA4NIx9sOXZO6GrjmPfLRyxObYvmBuIp8zIGjhou', 1, NULL, '2020-08-24 00:20:05', '2020-08-24 00:20:05'),
(82, 'Jatrabari', '01880208040', 'sojol@quickexpress.com.bd', NULL, 8, '$2y$10$3BuJ5e0X8Y8lqIvpIVgwau8hSrLSygF0OMj1y/aNyrTEWIJgUEJ3S', 1, NULL, '2020-09-30 20:28:04', '2020-09-30 20:28:04'),
(84, 'Magical BD', '01712781700', 'magicalbd689@gmail.com', NULL, 12, '$2y$10$8iQA19JFpsZprt8m/uM1zO7xiwh9JpkO7lWd5aPzqGjoOpkMFKYKm', 1, NULL, '2020-09-30 20:35:34', '2020-09-30 20:35:34'),
(87, 'Mamunur Rashid', NULL, 'alfattah@gmail.com', 'alfattah@gmail.com', 3, '$2y$10$4yRiBpOoufotSAcD5KUXzOV.bXde6RPmZpJikckQE1B7hcQtNX9OS', 1, NULL, '2020-10-24 02:07:20', '2020-10-24 02:07:20');

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
-- Table structure for table `tbl_account_transactions`
--

CREATE TABLE `tbl_account_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `voucher_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voucher_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voucher_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coa_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coa_head_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `narration` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `debit_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `posted` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approve` tinyint(4) NOT NULL DEFAULT 0,
  `approve_by` int(11) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `delete` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_account_transactions`
--

INSERT INTO `tbl_account_transactions` (`id`, `voucher_no`, `voucher_type`, `voucher_date`, `coa_id`, `coa_head_code`, `narration`, `debit_amount`, `credit_amount`, `posted`, `approve`, `approve_by`, `active`, `delete`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(98, 'CV-1000000002', 'CV', '2020-02-01', NULL, '10201', 'Previous  Month of April-2019 forward May 2019', '60154', '0', 'I', 1, 1, 1, 0, 1, 1, '2020-02-10 18:37:10', NULL, '2020-02-10 19:03:56'),
(99, 'CV-1000000002', 'CV', '2020-02-01', NULL, '20105', 'Previous  Month of April-2019 forward May 2019', '0', '60154', 'I', 1, 1, 1, 0, 1, 1, NULL, NULL, '2020-02-10 19:03:56'),
(100, 'CV-1000000001', 'CV', '2020-02-02', NULL, '10201', 'Cash Withdrew from Se. bank CQ No 4442932 dt: 30.04.19 for Fuel, vehicle maintenance with petty cash', '500000', '0', 'I', 1, 4, 1, 0, 1, 1, '2020-02-10 18:37:25', NULL, '2020-09-03 00:14:58'),
(101, 'CV-1000000001', 'CV', '2020-02-02', NULL, '1020204', 'Cash Withdrew from Se. bank CQ No 4442932 dt: 30.04.19 for Fuel, vehicle maintenance with petty cash', '0', '500000', 'I', 1, 4, 1, 0, 1, 1, NULL, NULL, '2020-09-03 00:14:58'),
(102, 'DV-1000000001', 'DV', '2020-02-04', NULL, '10201', 'Fuel & Gas all  cars  Dhaka Metro: Jha:-12-0054, Dhaka Metro: Cha:-13-8171, Dhaka Metro: Jha:-12-0027, Dhaka Metro:Cha:-51-8023, Dhaka Metro:Cha:-53-2745', '0', '11756', 'I', 1, 1, 1, 0, 1, 1, '2020-02-10 18:37:55', NULL, '2020-07-28 01:36:20'),
(103, 'DV-1000000001', 'DV', '2020-02-04', NULL, '4020201', 'Fuel & Gas all  cars  Dhaka Metro: Jha:-12-0054, Dhaka Metro: Cha:-13-8171, Dhaka Metro: Jha:-12-0027, Dhaka Metro:Cha:-51-8023, Dhaka Metro:Cha:-53-2745', '752', '0', 'I', 1, 1, 1, 0, 1, 1, NULL, NULL, '2020-07-28 01:36:20'),
(104, 'DV-1000000001', 'DV', '2020-02-04', NULL, '4020203', 'Fuel & Gas all  cars  Dhaka Metro: Jha:-12-0054, Dhaka Metro: Cha:-13-8171, Dhaka Metro: Jha:-12-0027, Dhaka Metro:Cha:-51-8023, Dhaka Metro:Cha:-53-2745', '650', '0', 'I', 1, 1, 1, 0, 1, 1, NULL, NULL, '2020-07-28 01:36:20'),
(105, 'DV-1000000001', 'DV', '2020-02-04', NULL, '4020204', 'Fuel & Gas all  cars  Dhaka Metro: Jha:-12-0054, Dhaka Metro: Cha:-13-8171, Dhaka Metro: Jha:-12-0027, Dhaka Metro:Cha:-51-8023, Dhaka Metro:Cha:-53-2745', '750', '0', 'I', 1, 1, 1, 0, 1, 1, NULL, NULL, '2020-07-28 01:36:20'),
(106, 'DV-1000000001', 'DV', '2020-02-04', NULL, '4020205', 'Fuel & Gas all  cars  Dhaka Metro: Jha:-12-0054, Dhaka Metro: Cha:-13-8171, Dhaka Metro: Jha:-12-0027, Dhaka Metro:Cha:-51-8023, Dhaka Metro:Cha:-53-2745', '4620', '0', 'I', 1, 1, 1, 0, 1, 1, NULL, NULL, '2020-07-28 01:36:20'),
(107, 'DV-1000000001', 'DV', '2020-02-04', NULL, '4020206', 'Fuel & Gas all  cars  Dhaka Metro: Jha:-12-0054, Dhaka Metro: Cha:-13-8171, Dhaka Metro: Jha:-12-0027, Dhaka Metro:Cha:-51-8023, Dhaka Metro:Cha:-53-2745', '4984', '0', 'I', 1, 1, 1, 0, 1, 1, NULL, NULL, '2020-07-28 01:36:20'),
(108, 'DV-1000000002', 'DV', '2020-02-04', NULL, '10201', 'Cash Paid for  Class Party against  ll,lll,lV Classes item of Chips, Pepsi', '0', '11438', 'I', 1, 1, 1, 0, 1, 1, '2020-02-10 18:38:25', NULL, '2020-02-10 19:00:14'),
(109, 'DV-1000000002', 'DV', '2020-02-04', NULL, '40230', 'Cash Paid for  Class Party against  ll,lll,lV Classes item of Chips, Pepsi', '11438', '0', 'I', 1, 1, 1, 0, 1, 1, NULL, NULL, '2020-02-10 19:00:14'),
(110, 'DV-1000000003', 'DV', '2020-02-04', NULL, '10201', 'Conveyance paid to Mr. Harun', '0', '80', 'I', 1, 1, 1, 0, 1, 1, '2020-02-10 18:39:42', NULL, '2020-02-10 19:00:17'),
(111, 'DV-1000000003', 'DV', '2020-02-04', NULL, '40208', 'Conveyance paid to Mr. Harun', '80', '0', 'I', 1, 1, 1, 0, 1, 1, NULL, NULL, '2020-02-10 19:00:17'),
(112, 'DV-1000000004', 'DV', '2020-02-04', NULL, '10201', 'paid for Tifin Aya ,Driver & Security Guard', '0', '5085', 'I', 1, 1, 1, 0, 1, 1, '2020-02-10 18:41:13', NULL, '2020-02-10 19:00:32'),
(113, 'DV-1000000004', 'DV', '2020-02-04', NULL, '40227', 'paid for Tifin Aya ,Driver & Security Guard', '5085', '0', 'I', 1, 1, 1, 0, 1, 1, NULL, NULL, '2020-02-10 19:00:32'),
(116, 'DV-1000000005', 'DV', '2020-02-04', NULL, '10201', 'Entertainment for Games teacher for Babuland Field trips for Class KG-1', '0', '1500', 'I', 1, 1, 1, 0, 1, 1, '2020-02-10 18:44:04', NULL, '2020-02-10 19:00:37'),
(117, 'DV-1000000005', 'DV', '2020-02-04', NULL, '40213', 'Entertainment for Games teacher for Babuland Field trips for Class KG-1', '1500', '0', 'I', 1, 1, 1, 0, 1, 1, NULL, NULL, '2020-02-10 19:00:37'),
(118, 'DV-1000000006', 'DV', '2020-02-04', NULL, '10201', 'Entertainment for Accounts office  A/C software', '0', '320', 'I', 1, 1, 1, 0, 1, 1, '2020-02-10 18:45:15', NULL, '2020-02-10 19:01:36'),
(119, 'DV-1000000006', 'DV', '2020-02-04', NULL, '40213', 'Entertainment for Accounts office  A/C software', '320', '0', 'I', 1, 1, 1, 0, 1, 1, NULL, NULL, '2020-02-10 19:01:36'),
(120, 'DV-1000000007', 'DV', '2020-02-04', NULL, '10201', 'Electric Goods', '0', '2475', 'I', 1, 1, 1, 0, 1, 1, '2020-02-10 18:46:46', NULL, '2020-02-10 19:01:59'),
(121, 'DV-1000000007', 'DV', '2020-02-04', NULL, '40231', 'Electric Goods', '2475', '0', 'I', 1, 1, 1, 0, 1, 1, NULL, NULL, '2020-02-10 19:01:59'),
(122, 'DV-1000000008', 'DV', '2020-02-04', NULL, '10201', 'Conveyance Mr. Afridi', '0', '70', 'I', 1, 1, 1, 0, 1, 1, '2020-02-10 18:48:12', NULL, '2020-02-10 19:02:04'),
(123, 'DV-1000000008', 'DV', '2020-02-04', NULL, '40208', 'Conveyance Mr. Afridi', '70', '0', 'I', 1, 1, 1, 0, 1, 1, NULL, NULL, '2020-02-10 19:02:04'),
(128, 'DV-1000000009', 'DV', '2020-02-07', NULL, '10201', 'Head Name Boishakhi Expense', '0', '300', 'I', 1, 1, 1, 0, 1, 1, '2020-02-10 18:50:52', NULL, '2020-02-11 17:40:42'),
(129, 'DV-1000000009', 'DV', '2020-02-07', NULL, '40226', 'Head Name Boishakhi Expense', '300', '0', 'I', 1, 1, 1, 0, 1, 1, NULL, NULL, '2020-02-11 17:40:42'),
(130, 'JV-1000000001', 'JV', '2020-02-11', NULL, '30103', 'Academic Fee, Buildings, Cash at Bank, Computer Accessories (Printer & CPU)', '200', '0', 'I', 1, 1, 1, 0, 1, 1, NULL, NULL, '2020-02-11 17:40:46'),
(131, 'JV-1000000001', 'JV', '2020-02-11', NULL, '30104', 'Academic Fee, Buildings, Cash at Bank, Computer Accessories (Printer & CPU)', '0', '200', 'I', 1, 1, 1, 0, 1, 1, NULL, NULL, '2020-02-11 17:40:46'),
(132, 'JV-1000000001', 'JV', '2020-02-11', NULL, '1020201', 'Academic Fee, Buildings, Cash at Bank, Computer Accessories (Printer & CPU)', '300', '0', 'I', 1, 1, 1, 0, 1, 1, NULL, NULL, '2020-02-11 17:40:46'),
(133, 'JV-1000000001', 'JV', '2020-02-11', NULL, '10201', 'Academic Fee, Buildings, Cash at Bank, Computer Accessories (Printer & CPU)', '0', '300', 'I', 1, 1, 1, 0, 1, 1, NULL, NULL, '2020-02-11 17:40:46'),
(152, 'JV-1000000001', 'JV', '2020-02-18', NULL, '30103', 'Academic Fee, Accounts Payable', '120', '0', 'I', 1, 5, 1, 0, 1, 5, NULL, 5, '2020-02-18 05:53:01'),
(153, 'JV-1000000001', 'JV', '2020-02-18', NULL, '20101', 'Academic Fee, Accounts Payable', '0', '120', 'I', 1, 5, 1, 0, 1, 5, NULL, 5, '2020-02-18 05:53:01'),
(166, 'DV-1000000001', 'DV', '2020-02-18', NULL, NULL, 'Accounts Payable, Admission Fee', '0', '400', 'I', 1, 5, 1, 0, 1, 5, '2020-02-18 01:16:55', 5, '2020-07-28 01:36:20'),
(167, 'DV-1000000001', 'DV', '2020-02-18', NULL, '30101', 'Accounts Payable, Admission Fee', '200', '0', 'I', 1, 5, 1, 0, 1, 5, NULL, 5, '2020-07-28 01:36:20'),
(168, 'DV-1000000001', 'DV', '2020-02-18', NULL, '20101', 'Accounts Payable, Admission Fee', '200', '0', 'I', 1, 5, 1, 0, 1, 5, NULL, 5, '2020-07-28 01:36:20'),
(172, 'CV-1000000001', 'CV', '2020-02-18', NULL, '10201', 'Boishakhi Expense, Class Party', '500', '0', 'I', 1, 4, 1, 0, 1, 5, '2020-02-18 01:23:27', 5, '2020-09-03 00:14:58'),
(173, 'CV-1000000001', 'CV', '2020-02-18', NULL, '40226', 'Boishakhi Expense, Class Party', '0', '250', 'I', 1, 4, 1, 0, 1, 5, NULL, 5, '2020-09-03 00:14:58'),
(174, 'CV-1000000001', 'CV', '2020-02-18', NULL, '40230', 'Boishakhi Expense, Class Party', '0', '250', 'I', 1, 4, 1, 0, 1, 5, NULL, 5, '2020-09-03 00:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_panel_information`
--

CREATE TABLE `tbl_admin_panel_information` (
  `id` int(11) NOT NULL,
  `website_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prefix_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `developed_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `developer_website_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_one` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_one_width` int(11) DEFAULT NULL,
  `logo_one_height` int(11) DEFAULT NULL,
  `logo_two` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_two_width` int(11) DEFAULT NULL,
  `logo_two_height` int(11) DEFAULT NULL,
  `fav_icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fav_icon_width` int(11) DEFAULT NULL,
  `fav_icon_height` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin_panel_information`
--

INSERT INTO `tbl_admin_panel_information` (`id`, `website_name`, `prefix_title`, `website_title`, `developed_by`, `developer_website_link`, `logo_one`, `logo_one_width`, `logo_one_height`, `logo_two`, `logo_two_width`, `logo_two_height`, `fav_icon`, `fav_icon_width`, `fav_icon_height`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(2, 'Quick Express', '|', 'Quick Express', 'Techno Park Bangladesh', 'http://www.technoparkbd.com/', 'public/uploads/admin_logo/logo1/quick_express_logo_81642677268.jpg', 219, 63, 'public/uploads/admin_logo/logo2/website_favicon_26561815396_28168193593.png', 123, 106, 'public/uploads/admin_logo/fav_icon/website_favicon_26561815396_138924398086.png', 123, 106, 1, 4, '2020-07-07 06:07:47', 4, '2020-07-09 01:18:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agents`
--

CREATE TABLE `tbl_agents` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_role_id` int(11) DEFAULT NULL,
  `hub_id` int(11) DEFAULT NULL,
  `supporting_warehouse` int(11) DEFAULT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `tbl_agents` (`id`, `user_id`, `user_role_id`, `hub_id`, `supporting_warehouse`, `area`, `name`, `contact_person`, `district`, `phone`, `email`, `nid`, `address`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(11, 58, 8, 1, 4, '1', 'Mirpur', 'Not Fixed', NULL, '01713900800', 'agent_mirpur@gmail.com', NULL, 'Mirpur', 1, 4, '2020-07-25 17:57:06', 4, '2020-08-15 17:20:08'),
(17, 82, 8, 5, 4, NULL, 'Jatrabari', 'Sojol', NULL, '01880208040', 'sojol@quickexpress.com.bd', NULL, NULL, 1, 4, '2020-09-30 20:28:04', NULL, '2020-09-30 20:28:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_area`
--

CREATE TABLE `tbl_area` (
  `id` int(11) NOT NULL,
  `hub_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `order_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_area`
--

INSERT INTO `tbl_area` (`id`, `hub_id`, `name`, `description`, `status`, `order_by`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 1, 'Uttara', NULL, 1, 1, NULL, NULL, 4, '2020-08-17 17:04:36'),
(2, 1, 'Badda', NULL, 1, 2, NULL, NULL, 4, '2020-08-04 04:10:36'),
(3, 1, 'Rampura', NULL, 1, 3, 4, '2020-07-13 22:08:09', 4, '2020-08-04 04:16:01'),
(4, 1, 'Gulshan', NULL, 1, 4, 4, '2020-07-13 22:08:52', 4, '2020-08-04 04:10:44'),
(5, 1, 'Jatrabari', NULL, 1, 5, 4, '2020-07-13 22:09:25', 4, '2020-08-17 17:07:06'),
(6, 1, 'Dhanmondi', NULL, 1, 6, 4, '2020-07-13 22:11:55', 4, '2020-08-04 04:05:00'),
(7, 1, 'Banasree', NULL, 1, 7, 4, '2020-07-13 22:12:54', 4, '2020-08-04 04:14:58'),
(8, 1, 'Kazi Para', NULL, 1, 2, 4, '2020-07-25 17:57:45', 4, '2020-08-04 03:58:37'),
(9, 1, 'Shawra Para', NULL, 1, 3, 4, '2020-07-25 17:58:17', 4, '2020-08-04 03:59:19'),
(10, 1, 'Mirpur 1', NULL, 1, 3, 4, '2020-07-25 17:58:43', 4, '2020-08-04 03:59:28'),
(11, 1, 'Mirpur 2', NULL, 1, 5, 4, '2020-07-25 17:58:58', 4, '2020-08-04 03:59:43'),
(12, 1, 'Mirpur 6', NULL, 1, 4, 4, '2020-07-25 17:59:23', 4, '2020-08-04 03:59:53'),
(13, 1, 'Mirpur 7', NULL, 1, NULL, 4, '2020-07-25 17:59:56', 4, '2020-08-04 03:59:59'),
(14, 1, 'Mirpur 10', NULL, 1, NULL, 4, '2020-07-25 18:00:12', 4, '2020-08-04 04:00:07'),
(15, 1, 'Mirpur 11', NULL, 1, NULL, 4, '2020-07-25 18:00:29', 4, '2020-08-04 04:00:25'),
(16, 1, 'Mirpur 12', NULL, 1, NULL, 4, '2020-07-25 18:01:12', 4, '2020-08-04 04:00:31'),
(17, 1, 'Mirpur 13', NULL, 1, NULL, 4, '2020-07-25 18:01:45', 4, '2020-08-04 04:00:37'),
(18, 1, 'Mirpur 14', NULL, 1, NULL, 4, '2020-07-25 18:02:00', 4, '2020-08-04 04:00:43'),
(19, 1, 'Kalshi', NULL, 1, NULL, 4, '2020-07-25 18:03:37', 4, '2020-08-04 04:01:07'),
(20, 1, 'Mirpur DOHS', NULL, 1, NULL, 4, '2020-07-25 18:12:13', 4, '2020-08-04 04:00:54'),
(21, 1, 'Matikata', NULL, 1, NULL, 4, '2020-07-25 18:12:39', 4, '2020-08-04 04:01:17'),
(22, 1, 'Balughat', NULL, 1, NULL, 4, '2020-07-25 18:13:06', 4, '2020-08-04 04:01:33'),
(23, 1, 'Kochukhat', NULL, 1, NULL, 4, '2020-07-25 18:14:55', 4, '2020-08-04 04:01:42'),
(24, 1, 'ভাসানটেক', NULL, 1, NULL, 4, '2020-07-25 18:17:41', 4, '2020-08-04 04:02:11'),
(25, 1, 'কাফ্রুল', NULL, 1, NULL, 4, '2020-07-25 18:18:03', 4, '2020-08-04 04:02:25'),
(26, 1, 'গাবতলী, মাজার রোড', NULL, 1, NULL, 4, '2020-07-25 18:18:27', 4, '2020-08-04 04:03:03'),
(27, 1, 'জিগাতলা', NULL, 1, NULL, 4, '2020-07-25 18:20:22', 4, '2020-08-04 04:05:09'),
(28, 1, 'বসিলা', NULL, 1, NULL, 4, '2020-07-25 18:20:49', 4, '2020-08-04 04:05:20'),
(29, 1, 'মোহাম্মদপুর', NULL, 1, NULL, 4, '2020-07-25 18:27:51', 4, '2020-08-04 04:05:32'),
(30, 1, 'শ্যামলী', NULL, 1, NULL, 4, '2020-07-25 18:28:08', 4, '2020-08-04 04:05:45'),
(31, 1, 'কল্যানপুর', NULL, 1, NULL, 4, '2020-07-25 18:28:27', 4, '2020-08-04 04:05:54'),
(32, 1, 'হাজারিবাগ', NULL, 1, NULL, 4, '2020-07-25 18:31:09', 4, '2020-08-04 04:06:09'),
(33, 1, 'নিউমার্কেট', NULL, 1, NULL, 4, '2020-07-25 18:36:04', 4, '2020-08-04 04:06:31'),
(34, 1, 'এলিফেন্ট রোড', NULL, 1, NULL, 4, '2020-07-25 18:36:28', 4, '2020-08-04 04:06:58'),
(35, 1, 'কাঁঠালবাগান', NULL, 1, NULL, 4, '2020-07-25 18:36:48', 4, '2020-08-04 04:08:38'),
(36, 1, 'কলাবাগান', NULL, 1, NULL, 4, '2020-07-25 18:37:05', 4, '2020-08-04 04:08:47'),
(37, 1, 'হাতির পুল', NULL, 1, NULL, 4, '2020-07-25 18:37:19', 4, '2020-08-04 04:09:09'),
(38, 1, 'কাওরানবাজার', NULL, 1, NULL, 4, '2020-07-25 18:37:37', 4, '2020-08-04 04:09:17'),
(39, 1, 'শংকর', NULL, 1, NULL, 4, '2020-07-25 18:38:13', 4, '2020-08-04 04:09:43'),
(40, 1, 'রাজাবাজার', NULL, 1, NULL, 4, '2020-07-25 18:38:44', 4, '2020-08-04 04:09:28'),
(41, 1, 'ঢাকা ইউনিভার্সিটি', NULL, 1, NULL, 4, '2020-07-25 18:38:58', 4, '2020-08-04 04:09:54'),
(42, 1, 'আজিমপুর', NULL, 1, NULL, 4, '2020-07-25 18:39:25', 4, '2020-08-04 04:10:13'),
(43, 1, 'বাড্ডা', NULL, 1, NULL, 4, '2020-07-25 18:39:41', 4, '2020-08-07 19:58:28'),
(45, 1, 'বনানী', NULL, 1, NULL, 4, '2020-07-25 18:40:22', 4, '2020-08-04 04:11:00'),
(46, 1, 'বারিধারা', NULL, 1, NULL, 4, '2020-07-25 18:40:45', 4, '2020-08-04 04:11:20'),
(49, 5, 'খিলগাঁও', NULL, 1, NULL, 4, '2020-07-25 18:51:53', 4, '2020-10-01 07:47:24'),
(50, 1, 'Bashundhara', NULL, 1, NULL, 4, '2020-08-04 04:14:00', NULL, '2020-08-04 04:14:00'),
(51, 1, 'Basabo', NULL, 1, NULL, 4, '2020-08-04 04:17:01', NULL, '2020-08-04 04:17:01'),
(52, 1, 'Mugda', NULL, 1, NULL, 4, '2020-08-04 04:17:28', NULL, '2020-08-04 04:17:28'),
(53, 1, 'Maniknagar', NULL, 1, NULL, 4, '2020-08-04 04:17:51', NULL, '2020-08-04 04:17:51'),
(54, 5, 'Malibagh', NULL, 1, NULL, 4, '2020-08-04 04:18:28', 4, '2020-10-01 07:46:52'),
(55, 5, 'Magbazar', NULL, 1, NULL, 4, '2020-08-04 04:18:41', 4, '2020-10-01 07:46:44'),
(56, 1, 'Baili Road', NULL, 1, NULL, 4, '2020-08-04 04:19:07', NULL, '2020-08-04 04:19:07'),
(57, 1, 'Shantinagar', NULL, 1, NULL, 4, '2020-08-04 04:19:27', NULL, '2020-08-04 04:19:27'),
(58, 1, 'Shajahanpur', NULL, 1, NULL, 4, '2020-08-04 04:19:43', NULL, '2020-08-04 04:19:43'),
(59, 1, 'Bissho Road', NULL, 1, NULL, 4, '2020-08-04 04:20:11', NULL, '2020-08-04 04:20:11'),
(60, 1, 'Kamlapur', NULL, 1, NULL, 4, '2020-08-04 04:20:24', NULL, '2020-08-04 04:20:24'),
(61, 1, 'Motijhil', NULL, 1, NULL, 4, '2020-08-04 04:20:41', NULL, '2020-08-04 04:20:41'),
(62, 1, 'Paltan', NULL, 1, NULL, 4, '2020-08-04 04:20:50', NULL, '2020-08-04 04:20:50'),
(63, 1, 'Shahabagh', NULL, 1, NULL, 4, '2020-08-04 04:21:06', NULL, '2020-08-04 04:21:06'),
(65, 1, 'Eskaton', NULL, 1, NULL, 4, '2020-08-04 04:21:27', NULL, '2020-08-04 04:21:27'),
(66, 1, 'Uttara Model Town', NULL, 1, NULL, 4, '2020-08-04 04:25:31', NULL, '2020-08-04 04:25:31'),
(67, 1, 'Airport', NULL, 1, NULL, 4, '2020-08-04 04:25:49', NULL, '2020-08-04 04:25:49'),
(68, 1, 'Ashkona', NULL, 1, NULL, 4, '2020-08-04 04:26:04', NULL, '2020-08-04 04:26:04'),
(69, 1, 'Kaula', NULL, 1, NULL, 4, '2020-08-04 04:26:32', 4, '2020-08-04 04:26:42'),
(70, 1, 'Khilkhet', NULL, 1, NULL, 4, '2020-08-04 04:27:11', NULL, '2020-08-04 04:27:11'),
(71, 1, 'Nikunja', NULL, 1, NULL, 4, '2020-08-04 04:27:24', NULL, '2020-08-04 04:27:24'),
(72, 1, 'Uttar Khan', NULL, 1, NULL, 4, '2020-08-04 04:27:48', NULL, '2020-08-04 04:27:48'),
(73, 1, 'Dakkhin Khan', NULL, 1, NULL, 4, '2020-08-04 04:28:00', NULL, '2020-08-04 04:28:00'),
(74, 1, 'Tongi', NULL, 1, NULL, 4, '2020-08-04 04:29:12', NULL, '2020-08-04 04:29:12'),
(76, 5, 'Shonir Akhra', NULL, 1, NULL, 4, '2020-08-04 04:31:01', 4, '2020-10-01 07:47:17'),
(77, 1, 'Demra', NULL, 1, NULL, 4, '2020-08-04 04:31:15', NULL, '2020-08-04 04:31:15'),
(78, 1, 'Wari', NULL, 1, NULL, 4, '2020-08-04 04:31:26', NULL, '2020-08-04 04:31:26'),
(79, 1, 'Zurain', NULL, 1, NULL, 4, '2020-08-04 04:31:37', NULL, '2020-08-04 04:31:37'),
(80, 1, 'Saidabad', NULL, 1, NULL, 4, '2020-08-04 04:31:47', NULL, '2020-08-04 04:31:47'),
(81, 1, 'Puran Dhaka', NULL, 1, NULL, 4, '2020-08-04 04:31:59', NULL, '2020-08-04 04:31:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking_orders`
--

CREATE TABLE `tbl_booking_orders` (
  `id` int(11) NOT NULL,
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booked_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `sender_hub_id` int(11) DEFAULT NULL,
  `sender_area_id` int(11) DEFAULT NULL,
  `sender_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_zone_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_zone_id` int(11) DEFAULT NULL,
  `sender_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_hub_id` int(11) DEFAULT NULL,
  `receiver_area_id` int(11) DEFAULT NULL,
  `receiver_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_zone_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_zone_id` int(11) DEFAULT NULL,
  `receiver_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `courier_type_id` int(11) NOT NULL,
  `delivery_type_id` int(11) DEFAULT NULL,
  `charge_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_charge_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_charge_unit_per_uom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uom` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cod` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cod_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cod_charge_percentage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cod_charge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_charge` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_duration_id` int(11) DEFAULT NULL,
  `collection_man_id` int(11) DEFAULT NULL,
  `collection_payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_status` tinyint(4) NOT NULL DEFAULT 0,
  `collection_payment_status` tinyint(4) NOT NULL DEFAULT 0,
  `sender_goods_receieve_status` tinyint(4) NOT NULL DEFAULT 0,
  `host_warehouse_id` int(11) DEFAULT NULL,
  `host_warehouse_goods_receieve_status` tinyint(4) NOT NULL DEFAULT 0,
  `destination_warehouse_id` int(11) DEFAULT NULL,
  `destination_warehouse_goods_receieve_status` tinyint(4) NOT NULL DEFAULT 0,
  `receiver_issue_status` tinyint(4) NOT NULL DEFAULT 0,
  `receiver_goods_receieve_status` tinyint(4) NOT NULL DEFAULT 0,
  `delivery_man_id` int(11) DEFAULT NULL,
  `delivery_payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_status` tinyint(4) NOT NULL DEFAULT 0,
  `delivery_payment_status` tinyint(4) NOT NULL DEFAULT 0,
  `payment_status` tinyint(4) NOT NULL DEFAULT 0,
  `merchant_payment_status` tinyint(4) DEFAULT 0,
  `return_status` tinyint(4) NOT NULL DEFAULT 0,
  `return_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_to_client_status` tinyint(4) NOT NULL DEFAULT 0,
  `reschedule_status` tinyint(4) NOT NULL DEFAULT 0,
  `reschedule_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_booking_orders`
--

INSERT INTO `tbl_booking_orders` (`id`, `order_no`, `date`, `delivery_date`, `booked_type`, `sender_id`, `sender_hub_id`, `sender_area_id`, `sender_name`, `sender_phone`, `sender_zone_type`, `sender_zone_id`, `sender_address`, `receiver_hub_id`, `receiver_area_id`, `receiver_name`, `receiver_phone`, `receiver_zone_type`, `receiver_zone_id`, `receiver_address`, `remarks`, `courier_type_id`, `delivery_type_id`, `charge_name`, `delivery_charge_unit`, `delivery_charge_unit_per_uom`, `uom`, `cod`, `cod_amount`, `cod_charge_percentage`, `cod_charge`, `delivery_charge`, `delivery_duration_id`, `collection_man_id`, `collection_payment`, `collection_status`, `collection_payment_status`, `sender_goods_receieve_status`, `host_warehouse_id`, `host_warehouse_goods_receieve_status`, `destination_warehouse_id`, `destination_warehouse_goods_receieve_status`, `receiver_issue_status`, `receiver_goods_receieve_status`, `delivery_man_id`, `delivery_payment`, `delivery_status`, `delivery_payment_status`, `payment_status`, `merchant_payment_status`, `return_status`, `return_date`, `return_to_client_status`, `reschedule_status`, `reschedule_date`, `order_status`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(46, 'co-201001-00001', '2020-10-01', '2020-10-02', 'Merchant', 16, 1, 16, 'Magical BD', '01712781700', 'Agent', 11, 'H-02, R-08, Block - D, MIrpur - 12', 1, 15, 'Dew Hunt', '01317243494', 'Agent', 11, 'Mirpur - 11', 'Behind the mosque', 10, 1, 'Merchant To Customer - Parcel Weight Up To 5 Kg (Per Kg 5 BDT For Over 5 Kg)', '60', '20', '20', 'Yes', '1000', NULL, '10', '370', NULL, 1, '0', 0, 0, 0, NULL, 0, NULL, 0, 0, 0, 1, '0', 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 'Delivered', 1, 4, '2020-09-30 23:16:10', 4, '2020-10-24 09:54:17'),
(47, 'co-201001-00002', '2020-10-01', '2020-10-03', 'Merchant', 16, 1, 16, 'Magical BD', '01712781700', 'Agent', 11, 'H-02, R-08, Block - D, MIrpur - 12', 5, 55, 'Salman Sabbir', '01317243488', 'Agent', 17, 'Magbazar', 'Remarks - 00', 8, 1, 'Merchant To Customer - Document/Letter (Regular)', '55', '0', '1', 'Yes', '2000', NULL, '20', '75', NULL, 1, '0', 0, 0, 0, NULL, 0, NULL, 0, 0, 0, NULL, '0', 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 'Delivered', 1, 4, '2020-09-30 23:18:25', 4, '2020-10-24 06:35:43'),
(48, 'co-201001-00003', '2020-10-01', '2020-10-02', 'Merchant', 16, 1, 16, 'Magical BD', '01712781700', 'Agent', 11, 'H-02, R-08, Block - D, MIrpur - 12', 5, 54, 'Salman Sabbir', '01317243488', 'Agent', 17, 'Magbazar', 'Remarks - 01', 10, 1, 'Merchant To Customer - Parcel Weight Up To 5 Kg (Per Kg 5 BDT For Over 5 Kg)', '60', '20', '30', 'Yes', '2500', NULL, '25', '585', NULL, 1, '0', 0, 0, 0, NULL, 0, NULL, 0, 0, 0, NULL, '0', 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 'Return', 1, 4, '2020-09-30 23:20:00', 4, '2020-10-24 06:35:46'),
(49, 'co-201010-00001', '2020-10-10', '2020-10-10', 'Merchant', 16, 1, 16, 'Magical BD', '01712781700', 'Agent', 11, 'H-02, R-08, Block - D, MIrpur - 12', 1, 15, 'Dew Hunt', '01317243494', 'Agent', 11, 'Mirpur - 11', 'Parcel Over 5 Kg', 10, 1, 'Client To Client - Parcel Weight Up To 5 Kg (Per Kg 5 BDT For Over 5 Kg)', '60', '5', '9', 'Yes', '2000', '2', '20', '100', NULL, NULL, '0', 0, 0, 0, NULL, 0, NULL, 0, 0, 0, 1, '0', 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 'Pending', 1, 4, '2020-10-10 03:02:45', 4, '2020-10-24 09:54:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_charge_for_clients`
--

CREATE TABLE `tbl_charge_for_clients` (
  `id` int(11) NOT NULL,
  `service_type_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge_per_uom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_charge_for_clients`
--

INSERT INTO `tbl_charge_for_clients` (`id`, `service_type_id`, `service_id`, `name`, `charge`, `charge_per_uom`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 1, 1, 'Client To Client - Regular Business Parcels', '60', '0', 1, 4, '2020-07-10 20:20:10', 4, '2020-08-17 20:40:24'),
(2, 1, 3, 'Client To Client - Gift/Glass Item', '100', '0', 1, 4, '2020-07-10 20:21:18', 4, '2020-08-20 02:13:53'),
(3, 1, 2, 'Client To Client - Emergency Delivery (4 Hour Delivery)', '120', NULL, 1, 4, '2020-07-11 00:41:33', 4, '2020-08-17 20:40:45'),
(4, 1, 4, 'Client To Client - Food (Upto 5 Km Distance From Pick Point)', '60', NULL, 1, 4, '2020-08-17 20:41:24', NULL, '2020-08-17 20:41:24'),
(5, 1, 5, 'Client To Client - Food (Upto 10 Km Distance From Pick Point)', '120', NULL, 1, 4, '2020-08-17 20:41:42', NULL, '2020-08-17 20:41:42'),
(6, 1, 6, 'Client To Client - Food (Over 10 Km Distance From Pick Point)', '180', NULL, 1, 4, '2020-08-17 20:41:57', NULL, '2020-08-17 20:41:57'),
(7, 1, 8, 'Client To Client - Document/Letter (Regular)', '30', NULL, 1, 4, '2020-08-17 20:42:23', NULL, '2020-08-17 20:42:23'),
(8, 1, 9, 'Client To Client - Document/Letter (Emergency)', '90', NULL, 1, 4, '2020-08-17 20:43:18', NULL, '2020-08-17 20:43:18'),
(9, 1, 10, 'Client To Client - Parcel Weight Up To 5 Kg (Per Kg 5 BDT For Over 5 Kg)', '60', '5', 1, 4, '2020-08-17 21:02:35', NULL, '2020-08-17 21:02:35'),
(10, 1, 11, 'Client To Client - Pick & Ship (Receive Form Outside Dhaka)', '50', '0', 1, 4, '2020-08-17 21:09:23', NULL, '2020-08-17 21:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_charge_for_delivery_men`
--

CREATE TABLE `tbl_charge_for_delivery_men` (
  `id` int(11) NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `service_type_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_charge_for_delivery_men`
--

INSERT INTO `tbl_charge_for_delivery_men` (`id`, `service_id`, `service_type_name`, `name`, `charge`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 1, 'Collect', 'Collect - Document', '50', 1, 4, '2020-07-10 22:08:17', 4, '2020-07-10 22:21:51'),
(2, 1, 'Delivery', 'Delivery - Document', '80', 1, 4, '2020-07-10 22:08:34', 4, '2020-07-10 22:22:12'),
(3, 2, 'Collect', 'Collect - Large Parcel', '120', 1, 4, '2020-07-10 22:22:24', NULL, '2020-07-10 22:22:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_charge_for_merchants`
--

CREATE TABLE `tbl_charge_for_merchants` (
  `id` int(11) NOT NULL,
  `service_type_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `merchant_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge_per_uom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_charge_for_merchants`
--

INSERT INTO `tbl_charge_for_merchants` (`id`, `service_type_id`, `service_id`, `merchant_id`, `name`, `charge`, `charge_per_uom`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 1, 1, 7, 'Client To Client - Document', '60', NULL, 1, 4, '2020-07-12 18:16:17', 4, '2020-08-17 21:22:26'),
(2, 1, 2, 7, 'Client To Client - Emergency Delivery (4 Hour Delivery)', '120', NULL, 1, 4, '2020-07-12 18:16:38', 4, '2020-08-17 21:23:22'),
(3, 1, 3, 7, 'Client To Client - Gift/Glass Item', '100', NULL, 1, 4, '2020-07-12 18:16:50', 4, '2020-08-17 21:23:43'),
(4, 1, 4, 7, 'Client To Client - Food (Upto 5 Km Distance From Pick Point)', '60', NULL, 1, 4, '2020-07-12 18:17:09', 4, '2020-08-17 21:24:04'),
(5, 1, 5, 7, 'Client To Client - Food (Upto 10 Km Distance From Pick Point)', '120', NULL, 1, 4, '2020-07-12 18:17:57', 4, '2020-08-17 21:24:24'),
(6, 1, 6, 7, 'Client To Client - Food (Over 10 Km Distance From Pick Point)', '180', NULL, 1, 4, '2020-07-12 18:18:10', 4, '2020-08-17 21:24:41'),
(7, 1, 8, 16, 'Client To Client - Document/Letter (Regular)', '30', NULL, 1, 4, '2020-07-12 18:18:23', 4, '2020-10-10 02:55:32'),
(8, 1, 9, 7, 'Client To Client - Document/Letter (Emergency)', '90', NULL, 1, 4, '2020-07-12 18:18:56', 4, '2020-08-17 21:25:31'),
(13, 1, 1, 8, 'Client To Client - Regular Business Parcels', '60', NULL, 1, 4, NULL, 4, '2020-08-18 20:41:01'),
(14, 1, 2, 8, 'Client To Client - Emergency Delivery (4 Hour Delivery)', '120', NULL, 1, 4, NULL, 4, '2020-08-19 15:50:32'),
(15, 1, 3, 8, 'Client To Client - Gift/Glass Item', '100', NULL, 1, 4, NULL, 4, '2020-08-19 15:50:54'),
(16, 1, 4, 8, 'Client To Client - Food (Upto 5 Km Distance From Pick Point)', '60', NULL, 1, 4, NULL, 4, '2020-08-19 15:51:29'),
(17, 1, 5, 8, 'Client To Client - Food (Upto 10 Km Distance From Pick Point)', '120', NULL, 1, 4, NULL, 4, '2020-08-19 15:51:50'),
(18, 1, 6, 8, 'Client To Client - Food (Over 10 Km Distance From Pick Point)', '180', NULL, 1, 4, NULL, 4, '2020-08-19 15:52:08'),
(19, 1, 8, 8, 'Client To Client - Document/Letter (Regular)', '30', NULL, 1, 4, NULL, 4, '2020-08-19 15:52:30'),
(20, 1, 9, 8, 'Client To Client - Document/Letter (Emergency)', '90', NULL, 1, 4, NULL, 4, '2020-08-19 15:52:55'),
(21, 1, 1, 9, 'Client To Client - Regular Business Parcels', '60', NULL, 1, 4, NULL, 4, '2020-08-19 15:54:16'),
(22, 1, 2, 9, 'Client To Client - Emergency Delivery (4 Hour Delivery)', '120', NULL, 1, 4, NULL, 4, '2020-08-19 15:54:41'),
(23, 1, 3, 9, 'Client To Client - Gift/Glass Item', '100', NULL, 1, 4, NULL, 4, '2020-08-19 15:55:00'),
(24, 1, 4, 9, 'Client To Client - Food (Upto 5 Km Distance From Pick Point)', '60', NULL, 1, 4, NULL, 4, '2020-08-19 15:55:24'),
(25, 1, 5, 9, 'Client To Client - Food (Upto 10 Km Distance From Pick Point)', '120', NULL, 1, 4, NULL, 4, '2020-08-19 15:55:42'),
(26, 1, 6, 9, 'Client To Client - Food (Over 10 Km Distance From Pick Point)', '180', NULL, 1, 4, NULL, 4, '2020-08-19 15:56:01'),
(27, 1, 8, 9, 'Client To Client - Document/Letter (Regular)', '30', NULL, 1, 4, NULL, 4, '2020-08-19 15:56:36'),
(28, 1, 9, 9, 'Client To Client - Document/Letter (Emergency)', '90', NULL, 1, 4, NULL, 4, '2020-08-19 15:56:51'),
(29, 1, 10, 16, 'Client To Client - Parcel Weight Up To 5 Kg (Per Kg 5 BDT For Over 5 Kg)', '60', '5', 1, 4, NULL, 4, '2020-10-10 03:00:10'),
(30, 1, 11, 7, 'Client To Client - Pick & Ship (Receive Form Outside Dhaka)', '50', '0', 1, 4, NULL, NULL, NULL),
(31, 1, 10, 8, 'Client To Client - Parcel Weight Up To 5 Kg (Per Kg 5 BDT For Over 5 Kg)', '60', '5', 1, 4, NULL, NULL, NULL),
(32, 1, 11, 8, 'Client To Client - Pick & Ship (Receive Form Outside Dhaka)', '50', '0', 1, 4, NULL, NULL, NULL),
(33, 1, 10, 9, 'Client To Client - Parcel Weight Up To 5 Kg (Per Kg 5 BDT For Over 5 Kg)', '60', '5', 1, 4, NULL, NULL, NULL),
(34, 1, 11, 9, 'Client To Client - Pick & Ship (Receive Form Outside Dhaka)', '50', '0', 1, 4, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clients`
--

CREATE TABLE `tbl_clients` (
  `id` int(11) NOT NULL,
  `user_role_id` int(11) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coa`
--

CREATE TABLE `tbl_coa` (
  `id` int(10) UNSIGNED NOT NULL,
  `head_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `head_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_head_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `head_level` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `transaction` tinyint(4) NOT NULL DEFAULT 0,
  `general_ledger` tinyint(4) NOT NULL DEFAULT 0,
  `head_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `budget` tinyint(4) NOT NULL,
  `depreciation` tinyint(4) NOT NULL,
  `depreciation_rate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_coa`
--

INSERT INTO `tbl_coa` (`id`, `head_code`, `head_name`, `parent_head_name`, `head_level`, `active`, `transaction`, `general_ledger`, `head_type`, `budget`, `depreciation`, `depreciation_rate`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'Assets', 'COA', '0', 1, 0, 0, 'A', 0, 0, '0.00', 1, NULL, NULL),
(2, '101', 'Fixed Assets', 'Assets', '1', 1, 0, 0, 'A', 0, 0, '0.00', 1, NULL, NULL),
(21, '102', 'Current Asset', 'Assets', '1', 1, 0, 0, 'A', 0, 0, '0.00', 1, NULL, NULL),
(22, '10201', 'Cash In Hand', 'Current Asset', '2', 1, 1, 1, 'A', 0, 0, '0.00', 1, NULL, NULL),
(23, '10202', 'Cash at Bank', 'Current Asset', '2', 1, 0, 1, 'A', 0, 0, '0.00', 1, NULL, NULL),
(31, '10203', 'Account Receivable', 'Current Asset', '2', 1, 0, 0, 'A', 0, 0, '0.00', 1, NULL, NULL),
(32, '2', 'Liabilities', 'COA', '0', 1, 0, 0, 'L', 0, 0, '0.00', 1, NULL, NULL),
(33, '201', 'Current Laibalities', 'Liabilities', '1', 1, 0, 1, 'L', 0, 0, '0.00', 1, NULL, NULL),
(47, '202', 'Share Capital', 'Liabilities', '1', 1, 0, 1, 'L', 0, 0, '0.00', 1, NULL, NULL),
(50, '3', 'Income', 'COA', '0', 1, 0, 0, 'I', 0, 0, '0.00', 1, NULL, NULL),
(51, '301', 'Student Charge', 'Income', '1', 1, 0, 1, 'I', 0, 0, '0.00', 1, NULL, NULL),
(52, '30101', 'Admission Fee', 'Student Charge', '2', 1, 1, 0, 'I', 0, 0, '0.00', 1, NULL, NULL),
(53, '30102', 'Library Fee', 'Student Charge', '2', 1, 1, 0, 'I', 0, 0, '0.00', 1, NULL, NULL),
(54, '30103', 'Academic Fee', 'Student Charge', '2', 1, 1, 0, 'I', 0, 0, '0.00', 1, NULL, NULL),
(55, '30104', 'Tuition Fee', 'Student Charge', '2', 1, 1, 0, 'I', 0, 0, '0.00', 1, NULL, NULL),
(56, '4', 'Expence', 'COA', '0', 1, 0, 0, 'E', 0, 0, '0.00', 1, NULL, NULL),
(77, '302', 'Indirect Income', 'Income', '1', 1, 0, 1, 'I', 0, 0, '0.00', 1, NULL, NULL),
(89, '30105', 'Transport Fee', 'Student Charge', '2', 1, 1, 1, 'I', 0, 0, '0.00', 1, NULL, NULL),
(90, '303', 'Direct Income', 'Income', '1', 1, 0, 1, 'I', 0, 0, '0.00', 1, NULL, NULL),
(91, '30106', 'Late Fee', 'Student Charge', '2', 1, 1, 0, 'I', 0, 0, '0.00', 1, NULL, NULL),
(99, '401', 'Direct Expense ', 'Expence', '1', 1, 0, 1, 'E', 0, 0, '0.00', 1, NULL, NULL),
(100, '402', 'Indirect Expense', 'Expence', '1', 1, 0, 1, 'E', 0, 0, '0.00', 1, NULL, NULL),
(101, '203', 'Short Term Liability ', 'Liabilities', '1', 1, 0, 1, 'L', 0, 0, '0.00', 1, NULL, NULL),
(102, '10101', 'Land', 'Fixed Assets', '2', 1, 0, 1, 'A', 0, 0, '0.00', 1, NULL, NULL),
(103, '10102', 'Buildings', 'Fixed Assets', '2', 1, 0, 1, 'A', 0, 0, '0.00', 1, NULL, NULL),
(104, '10103', 'Vehicles', 'Fixed Assets', '2', 1, 0, 1, 'A', 0, 0, '0.00', 1, NULL, NULL),
(105, '10104', 'Furniture & Fixture', 'Fixed Assets', '2', 1, 0, 1, 'A', 0, 0, '0.00', 1, NULL, NULL),
(106, '10105', 'Computer Accessories (Printer & CPU)', 'Fixed Assets', '2', 1, 0, 1, 'A', 0, 0, '0.00', 1, NULL, NULL),
(107, '40201', 'Salary ', 'Indirect Expense', '2', 1, 0, 1, 'E', 0, 0, '0.00', 1, NULL, NULL),
(108, '40202', 'Fuel & Gas', 'Indirect Expense', '2', 1, 0, 1, 'E', 0, 0, '0.00', 1, NULL, NULL),
(109, '4020201', 'Dhaka Metro: Cha:-13-8171', 'Fuel & Gas', '3', 1, 1, 0, 'E', 0, 0, '0.00', 1, NULL, NULL),
(110, '4020202', 'Dhaka Metro: Cha:-52-0760', 'Fuel & Gas', '3', 1, 1, 0, 'E', 0, 0, '0.00', 1, NULL, NULL),
(111, '4020203', 'Dhaka Metro:Cha:-53-2745', 'Fuel & Gas', '3', 1, 1, 0, 'E', 0, 0, '0.00', 1, NULL, NULL),
(112, '4020204', 'Dhaka Metro:Cha:-51-8023', 'Fuel & Gas', '3', 1, 1, 0, 'E', 0, 0, '0.00', 1, NULL, NULL),
(113, '4020205', 'Dhaka Metro: Jha:-12-0027', 'Fuel & Gas', '3', 1, 1, 0, 'E', 0, 0, '0.00', 1, NULL, NULL),
(114, '4020206', 'Dhaka Metro: Jha:-12-0054', 'Fuel & Gas', '3', 1, 1, 0, 'E', 0, 0, '0.00', 1, NULL, NULL),
(115, '4020207', 'Dhaka Metro: Jha:-12-0015', 'Fuel & Gas', '3', 1, 1, 0, 'E', 0, 0, '0.00', 1, NULL, NULL),
(116, '4020208', 'Dhaka Metro: Jha:-11-0691', 'Fuel & Gas', '3', 1, 1, 0, 'E', 0, 0, '0.00', 1, NULL, NULL),
(117, '4020209', 'Dhaka Metro: Ja:-12-0971', 'Fuel & Gas', '3', 1, 1, 0, 'E', 0, 0, '0.00', 1, NULL, NULL),
(118, '4020210', 'Dhaka Metro: Ga:-28-1359', 'Fuel & Gas', '3', 1, 1, 0, 'E', 0, 0, '0.00', 1, NULL, NULL),
(119, '4020211', 'Dhaka Metro: Ga:-33-1227', 'Fuel & Gas', '3', 1, 1, 0, 'E', 0, 0, '0.00', 1, NULL, NULL),
(120, '40203', 'Repair & Maintenance', 'Indirect Expense', '2', 1, 1, 0, 'E', 0, 0, '0.00', 1, NULL, NULL),
(121, '40204', 'Paper Bill', 'Indirect Expense', '2', 1, 1, 0, 'E', 0, 0, '0.00', 1, NULL, NULL),
(122, '1020201', 'Bank Asia ', 'Cash at Bank', '3', 1, 1, 0, 'A', 0, 0, '0.00', 1, NULL, NULL),
(125, '20101', 'Accounts Payable', 'Current Laibalities', '2', 1, 1, 0, 'L', 0, 0, '0.00', 1, NULL, NULL),
(126, '20102', 'Income Taxes Payable ', 'Current Laibalities', '2', 1, 0, 1, 'L', 0, 0, '0.00', 1, NULL, NULL),
(127, '20103', 'Short Term Loans', 'Current Laibalities', '2', 1, 0, 1, 'L', 0, 0, '0.00', 1, NULL, NULL),
(128, '20104', 'Caution Money', 'Current Laibalities', '2', 1, 1, 1, 'L', 0, 0, '0.00', 1, NULL, NULL),
(129, '40205', 'Utilities Bill', 'Indirect Expense', '2', 1, 0, 1, 'E', 0, 0, '0.00', 1, NULL, NULL),
(130, '4020501', 'Electric Bill', 'Utilities Bill', '3', 1, 1, 0, 'E', 0, 0, '0.00', 1, NULL, NULL),
(131, '4020502', 'Gas Bill', 'Utilities Bill', '3', 1, 1, 0, 'E', 0, 0, '0.00', 1, NULL, NULL),
(132, '4020503', 'Wasa Bill', 'Utilities Bill', '3', 1, 1, 0, 'E', 0, 0, '0.00', 1, NULL, NULL),
(133, '4020504', 'Telephone Bill', 'Utilities Bill', '3', 1, 1, 0, 'E', 0, 0, '0.00', 1, NULL, NULL),
(134, '40206', 'Internet Bill ', 'Indirect Expense', '2', 1, 1, 1, 'E', 0, 0, '0.00', 1, NULL, NULL),
(135, '40207', 'Overtime', 'Indirect Expense', '2', 1, 1, 1, 'E', 0, 0, '0.00', 1, NULL, NULL),
(136, '40208', 'Conveyance', 'Indirect Expense', '2', 1, 1, 1, 'E', 0, 0, '0.00', 1, NULL, NULL),
(137, '40209', 'Fuel for Generator', 'Indirect Expense', '2', 1, 1, 1, 'E', 0, 0, '0.00', 1, NULL, NULL),
(138, '40210', 'Vehicle Maintenance   ', 'Indirect Expense', '2', 1, 1, 1, 'E', 0, 0, '0.00', 1, NULL, NULL),
(139, '40211', 'Donation & charity', 'Indirect Expense', '2', 1, 1, 1, 'E', 0, 0, '0.00', 1, NULL, NULL),
(140, '40212', 'Postage & courier', 'Indirect Expense', '2', 1, 1, 1, 'E', 0, 0, '0.00', 1, NULL, NULL),
(141, '40213', 'Entertainment ', 'Indirect Expense', '2', 1, 1, 1, 'E', 0, 0, '0.00', 1, NULL, NULL),
(142, '40214', 'Foundation Day ', 'Indirect Expense', '2', 1, 1, 1, 'E', 0, 0, '0.00', 1, NULL, NULL),
(143, '40215', 'Graduation Day', 'Indirect Expense', '2', 1, 1, 1, 'E', 0, 0, '0.00', 1, NULL, NULL),
(144, '40216', 'Printing & Stationary Expense', 'Indirect Expense', '2', 1, 1, 1, 'E', 0, 0, '0.00', 1, NULL, NULL),
(145, '40217', 'Repair charge', 'Indirect Expense', '2', 1, 1, 1, 'E', 0, 0, '0.00', 1, NULL, NULL),
(146, '40218', 'Furniture & Fixture Expense ', 'Indirect Expense', '2', 1, 1, 1, 'E', 0, 0, '0.00', 1, NULL, NULL),
(147, '10204', 'Cash On School Receive', 'Current Asset', '2', 1, 1, 0, 'A', 0, 0, '0.00', 1, NULL, NULL),
(149, '40219', 'Mobile Bill', 'Indirect Expense', '2', 1, 1, 0, 'E', 0, 0, '0.00', 1, NULL, NULL),
(150, '40220', 'Lunch Money & Conveyance', 'Indirect Expense', '2', 1, 1, 0, 'E', 0, 0, '0.00', 1, NULL, NULL),
(151, '40221', 'Vat Expense : Source', 'Indirect Expense', '2', 1, 1, 0, 'E', 0, 0, '0.00', 1, NULL, NULL),
(152, '40222', 'Medical Expense', 'Indirect Expense', '2', 1, 1, 0, 'E', 0, 0, '0.00', 1, NULL, NULL),
(153, '40223', 'Boishakhi Mela Expense', 'Indirect Expense', '2', 1, 1, 0, 'E', 0, 0, '0.00', 1, NULL, NULL),
(154, '40224', 'Photography Expense', 'Indirect Expense', '2', 1, 1, 0, 'E', 0, 0, '0.00', 1, NULL, NULL),
(155, '40225', 'Infant program', 'Indirect Expense', '2', 1, 1, 0, 'E', 0, 0, '0.00', 1, NULL, NULL),
(156, '40226', 'Boishakhi Expense', 'Indirect Expense', '2', 1, 1, 0, 'E', 0, 0, '0.00', 1, NULL, NULL),
(157, '40227', 'Tifin Aya ,Driver & Security Guard', 'Indirect Expense', '2', 1, 1, 0, 'E', 0, 0, '0.00', 1, NULL, NULL),
(158, '40228', 'vehicle  Spare parts', 'Indirect Expense', '2', 1, 1, 0, 'E', 0, 0, '0.00', 1, NULL, NULL),
(159, '40229', 'Photocopy Expense', 'Indirect Expense', '2', 1, 1, 0, 'E', 0, 0, '0.00', 1, NULL, NULL),
(160, '20105', 'Reserve Accounts(Previous)', 'Current Laibalities', '2', 1, 1, 0, 'L', 0, 0, '0.00', 1, NULL, NULL),
(161, '1020204', 'Southeast Bank: 0013 11100005167', 'Cash at Bank', '3', 1, 1, 0, 'A', 0, 0, '0.00', 1, NULL, NULL),
(162, '1020205', 'Shahjalal Islami Bank: 40401110000156', 'Cash at Bank', '3', 1, 1, 0, 'A', 0, 0, '0.00', 1, NULL, NULL),
(164, '40230', 'Class Party', 'Indirect Expense', '2', 1, 1, 0, 'E', 0, 0, '0.00', 1, NULL, NULL),
(165, '40231', 'Electric Goods', 'Indirect Expense', '2', 1, 1, 1, 'E', 0, 0, '0.00', 1, NULL, NULL),
(166, '1010401', 'Electric Fan', 'Furniture & Fixture', '3', 1, 1, 0, 'A', 0, 0, '0.00', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_us`
--

CREATE TABLE `tbl_contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_one` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_two` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_three` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_four` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_three` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_four` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_contact_us`
--

INSERT INTO `tbl_contact_us` (`id`, `name`, `contact_person`, `phone_one`, `phone_two`, `phone_three`, `phone_four`, `email_one`, `email_two`, `email_three`, `email_four`, `address`, `order_by`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Mirpur Branch', 'Dew Hunt', '01317243494', '01317243495', '01317243496', '01317243497', 'mirpur_branch@quickexpress.com', 'dewhunt@quickexpress.com', 'mirpur@quickexpress.com', 'mirpur@quickexpress.com', 'House #52, Road #16, Block #D, Pallabi, Mirpur, Dhaka #1216', 1, 1, 4, '2020-09-06 05:34:14', 4, '2020-09-06 06:49:26'),
(2, 'Dhanmondi Branch', 'Sajjad', '01717243494', '01717243454', '01717243414', '01717243444', 'dhanmondi_branch@quickexpress.com', 'sajjad@quickexpress.com', 'dhanmondi@quickexpress.com', 'dhanmondi@quickexpress.com', 'Dhanmondi', 2, 1, 4, '2020-09-06 06:12:47', 4, '2020-09-06 06:49:01'),
(3, 'Uttara Branch', 'Milon', '01617244494', '01617234494', '01617204494', '01617144494', 'uttara_branch@quickexpress.com', 'milon@quickexpress.com', 'uttara@quickexpress.com', 'uttara@quickexpress.com', 'Uttara', 3, 1, 4, '2020-09-06 06:14:15', 4, '2020-09-06 06:48:56'),
(4, 'Zatrabari Branch', 'Kalam', '01912244494', '01912224494', '01912224484', '01912024484', 'zatrabari_branch@quickexpress.com', 'kalam@quickexpress.com', 'zatrabari@quickexpress.com', 'zatrabari@quickexpress.com', 'Zatrabari', 4, 1, 4, '2020-09-06 06:15:44', 4, '2020-09-06 06:48:50'),
(5, 'Chittagong Branch', 'Mintu', '01517243494', '01516243494', '01516243498', '01516293498', 'chittagong_branch@quickexpress.com', 'mintu@quickexpress.com', NULL, NULL, 'Chittagong', 5, 1, 4, '2020-09-06 06:17:35', 4, '2020-09-06 06:49:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_delivery_man_payments`
--

CREATE TABLE `tbl_delivery_man_payments` (
  `id` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_man_id` int(11) DEFAULT NULL,
  `total_charge_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_delivery_man_payments`
--

INSERT INTO `tbl_delivery_man_payments` (`id`, `date`, `delivery_man_id`, `total_charge_amount`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(15, '2020-07-27', 1, '80', 1, 4, '2020-07-26 07:12:08', 4, '2020-07-26 23:21:20'),
(16, '2020-07-26', 1, '80', 1, 4, '2020-07-26 07:12:15', NULL, '2020-07-26 07:12:15'),
(18, '2020-07-26', 2, '180', 1, 4, '2020-07-26 07:51:54', NULL, '2020-07-26 07:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_delivery_man_payment_lists`
--

CREATE TABLE `tbl_delivery_man_payment_lists` (
  `id` int(11) NOT NULL,
  `delivery_man_payment_id` int(11) DEFAULT NULL,
  `booking_order_id` int(11) DEFAULT NULL,
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_delivery_man_payment_lists`
--

INSERT INTO `tbl_delivery_man_payment_lists` (`id`, `delivery_man_payment_id`, `booking_order_id`, `order_no`, `order_type`, `charge`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(40, 16, 3, 'co-200725-00003', 'Delivery', '80', 1, 4, '2020-07-26 07:12:15', NULL, '2020-07-26 07:12:15'),
(43, 18, 1, 'co-200725-00001', 'Collection', '50', 1, 4, '2020-07-26 07:51:54', NULL, '2020-07-26 07:51:54'),
(44, 18, 3, 'co-200725-00003', 'Collection', '50', 1, 4, '2020-07-26 07:51:54', NULL, '2020-07-26 07:51:54'),
(45, 18, 5, 'co-200725-00005', 'Delivery', '80', 1, 4, '2020-07-26 07:51:54', NULL, '2020-07-26 07:51:54'),
(48, 15, 1, 'co-200725-00001', 'Delivery', '80', 1, 4, '2020-07-26 23:21:20', NULL, '2020-07-26 23:21:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_delivery_men`
--

CREATE TABLE `tbl_delivery_men` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_role_id` int(11) DEFAULT NULL,
  `area_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driving_licence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bike_registration_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_delivery_men`
--

INSERT INTO `tbl_delivery_men` (`id`, `user_id`, `user_role_id`, `area_id`, `name`, `image`, `width`, `height`, `phone`, `email`, `nid`, `address`, `driving_licence`, `bike_registration_no`, `password`, `token`, `verification_code`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 53, 14, '2,10,14,15,16,17,18,11,12,13,1', 'Dew Hunt', 'public/uploads/profile_image/delivery_man/NEW_71086828580.png', NULL, NULL, '01317243494', 'dew.fog1553@gmail.com', NULL, 'House #4, Lane #3, Road #12, Block #B, Section #11, Mirpur, Pallabi, Dhaka #1216', 'DK0867682CL0007', 'Dhaka Metro-LA-44-5760', '$2y$10$Sm0ojZLSc17Zg1f5UgDTkuSXmqAeQ.zZlLAexA50lMf0KPA1iGDO6', '5ja2IjXOlcMeSb1iBSR2f6ocdSKbjNCvoKoMFgBq', '', 1, NULL, '2020-07-06 15:52:48', 4, '2020-08-17 15:21:13'),
(2, 72, 14, '10,14,15,16', 'Ripon', 'public/uploads/profile_image/delivery_man/avatar7_50717440257.png', NULL, NULL, '01418253567', 'ripon@gmail.com', '7889768831', NULL, NULL, NULL, NULL, NULL, NULL, 1, 4, '2020-08-24 00:18:56', NULL, '2020-08-24 00:18:56'),
(3, 73, 14, '2,56,4', 'Raihan', 'public/uploads/profile_image/delivery_man/avatar-cutout_44516381177.png', NULL, NULL, '01713900818', 'raihan@gmail.com', '3059962831', NULL, NULL, NULL, NULL, NULL, NULL, 1, 4, '2020-08-24 00:20:05', NULL, '2020-08-24 00:20:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_delivery_types`
--

CREATE TABLE `tbl_delivery_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `tbl_delivery_types` (`id`, `name`, `description`, `status`, `order_by`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Emergency', 'Will be delivered within 12 hours.', 1, 1, 4, '2020-07-11 23:44:02', NULL, '2020-07-11 23:59:11'),
(2, 'Regular Delivery', 'Will be delivered within 48 hours.', 1, 2, 4, '2020-07-11 23:45:21', NULL, '2020-07-11 23:59:32'),
(3, 'Next Day', 'Will be delivered within 24 hours.', 1, 3, 4, '2020-07-11 23:47:02', NULL, '2020-07-11 23:59:23');

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
(5, NULL, 'Home', 'quickExpress', 1, 1, 1, 1, 4, '2020-09-05 06:07:18', 4, '2020-09-05 06:27:06'),
(6, NULL, 'About Us', 'aboutUs', 2, 1, 1, 1, 4, '2020-09-05 06:07:31', 4, '2020-09-06 03:45:43'),
(7, NULL, 'Our Services', 'ourService', 3, 1, 1, 1, 4, '2020-09-05 06:34:18', 4, '2020-09-06 03:45:50'),
(8, NULL, 'Service Charge', 'serviceCharge', 4, 1, 1, 1, 4, '2020-09-05 06:34:38', 4, '2020-09-06 03:45:59'),
(9, NULL, 'Contact Us', 'contactUs', 5, 1, 1, 1, 4, '2020-09-05 06:35:00', 4, '2020-09-06 03:46:07'),
(10, 7, 'Parcel Delivery', 'parcelDelivery', 1, 1, 1, 1, 4, '2020-09-06 00:20:17', 4, '2020-09-06 03:46:20'),
(11, 7, 'Document Delivery', 'documentDelivery', 2, 1, 1, 1, 4, '2020-09-06 00:54:24', 4, '2020-09-06 03:46:13'),
(12, 7, 'Food Delivery', 'foodDelivery', 3, 1, 1, 1, 4, '2020-09-06 00:55:18', 4, '2020-09-06 03:46:28'),
(13, 7, 'Grocery Item', 'groceryDelivery', 4, 1, 1, 1, 4, '2020-09-06 00:55:53', 4, '2020-09-06 03:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hubs`
--

CREATE TABLE `tbl_hubs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `order_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_hubs`
--

INSERT INTO `tbl_hubs` (`id`, `name`, `description`, `status`, `order_by`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Mirpur Hub', NULL, 1, 1, 4, '2020-08-04 04:58:56', NULL, '2020-08-04 05:03:35'),
(2, 'Dhanmondi Hub', NULL, 1, 2, 4, '2020-08-04 05:03:55', NULL, '2020-08-04 05:03:55'),
(3, 'Badda Hub', NULL, 1, 3, 4, '2020-08-04 05:04:07', NULL, '2020-08-04 05:22:40'),
(4, 'Uttara Hub', NULL, 1, 4, 4, '2020-08-04 05:04:19', NULL, '2020-08-04 05:04:19'),
(5, 'Jatrabari Hub', NULL, 1, 5, 4, '2020-08-04 05:04:34', NULL, '2020-08-12 02:14:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_marchants`
--

CREATE TABLE `tbl_marchants` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_role_id` int(11) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trade_licence_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cod_charge_percentage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_charge_status` tinyint(4) NOT NULL DEFAULT 0,
  `reschedule_charge_status` tinyint(4) NOT NULL DEFAULT 0,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_marchants`
--

INSERT INTO `tbl_marchants` (`id`, `user_id`, `user_role_id`, `area`, `name`, `contact_person_name`, `contact_person_phone`, `contact_person_email`, `trade_licence_no`, `cod_charge_percentage`, `return_charge_status`, `reschedule_charge_status`, `phone`, `email`, `address`, `password`, `token`, `verification_code`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(16, 84, 12, 16, 'Magical BD', 'Mrs. Simi', '01712781700', 'magicalbd689@gmail.com', NULL, '2', 1, 0, NULL, NULL, 'H-02, R-08, Block - D, MIrpur - 12', NULL, NULL, NULL, 1, 4, '2020-09-30 20:35:34', NULL, '2020-10-17 06:14:21'),
(17, 53, 14, 14, 'Dew Hat', 'Dew Hunt', '01317243494', 'dew.fog1553@outlook.com', 'asd12345676', NULL, 0, 0, NULL, NULL, 'Mirpur - 10', '$2y$10$1ADDZ17SFr/z2MpKS3DtlOAzlzmG88t.vNkHa.K38ESUhFiPcGmGS', 'gKyaxdaKxQRi6mDlyFQ727DOWECJ69jEnGIbCXCz', '34943599463851ZGV3LmZvZzE1NTNAb3V0bG9vay5jb20=', 0, NULL, '2020-10-10 01:51:09', NULL, '2020-10-10 01:51:09'),
(18, 53, 14, 14, 'Dew Hat', 'Dew Hunt', '01317243495', 'dew.fog1553@gmail.com', 'asd12345676', NULL, 0, 0, NULL, NULL, 'Mirpur - 10', '$2y$10$a/GNSuJamhVI/3jdnaA2XOkIPe0z0RG8mUYdoOcavJNHMbujmjPsa', 'gKyaxdaKxQRi6mDlyFQ727DOWECJ69jEnGIbCXCz', '97120995140561ZGV3LmZvZzE1NTNAZ21haWwuY29t', 0, NULL, '2020-10-10 01:52:24', NULL, '2020-10-10 01:52:24');

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
(1, NULL, 'Dashboard', 'admin.index', 'fa fa-bars', 1, '1', '2020-07-08 07:10:18', '2020-07-08 07:11:03'),
(2, '39', 'Menu', 'menu.index', 'fa fa-caret', 1, '1', NULL, NULL),
(3, '39', 'Users Role', 'userRole.index', 'fa fa-bars', 4, '1', '2020-03-03 13:48:57', '2020-03-15 06:02:37'),
(4, '39', 'Menu Action Type', 'menuActionType.index', 'fa fa-bars', 2, '1', NULL, NULL),
(5, '39', 'User', 'user.index', 'fa fa-bars', 3, '1', '2020-03-14 02:06:15', '2020-03-15 06:02:33'),
(6, NULL, 'Front-End Management', 'admin.index', 'fa fa-bars', 3, '1', '2020-04-16 09:54:08', '2020-07-08 07:11:20'),
(7, '6', 'Website Information', 'websiteInformation.index', 'fa fa-caret', 1, '1', '2020-04-16 10:43:15', '2020-04-16 10:43:15'),
(8, '6', 'Menus', 'frontEndMenu.index', NULL, 2, '1', '2020-04-18 08:17:03', '2020-04-18 08:17:03'),
(10, '6', 'Social Links', 'socialLink.index', 'fa fa-caret', 3, '1', '2020-04-18 10:14:20', '2020-04-18 10:14:20'),
(11, '6', 'Sliders', 'sliders.index', 'fa fa-bars', 4, '1', '2020-04-19 08:19:58', '2020-04-19 08:19:58'),
(12, '6', 'Pages', 'page.index', 'fa fa-caret', 5, '1', '2020-05-10 05:09:10', '2020-05-10 05:09:10'),
(13, NULL, 'Basic Setup', 'admin.index', 'fa fa-bars', 4, '1', '2020-06-10 04:33:14', '2020-07-08 07:11:27'),
(14, '13', 'Agent Setup', 'agent.index', 'fa fa-caret', 4, '1', '2020-06-10 04:33:26', '2020-08-04 04:28:43'),
(15, '13', 'Subagent Setup', 'subagent.index', 'fa fa-caret', 5, '1', '2020-06-10 04:33:59', '2020-08-04 04:28:56'),
(16, '13', 'Warehouse Setup', 'warehouse.index', 'fa fa-bars', 1, '1', '2020-06-11 04:48:58', '2020-08-04 04:27:04'),
(17, '13', 'Marchant Setup', 'marchant.index', 'fa fa-caret', 6, '1', '2020-06-11 11:38:01', '2020-08-04 04:29:17'),
(18, '13', 'Client Setup', 'client.index', 'fa fa-caret', 7, '1', '2020-06-11 11:38:29', '2020-08-04 04:29:40'),
(21, NULL, 'Order Management', 'admin.index', 'fa fa-bars', 5, '1', '2020-06-15 04:48:14', '2020-07-08 07:11:35'),
(22, '21', 'Booking Order', 'bookingOrder.index', NULL, 1, '1', '2020-06-15 04:54:21', '2020-06-15 04:54:21'),
(23, '21', 'Sender Order', 'senderOrder.index', 'fa fa-bars', 2, '1', '2020-06-18 05:14:55', '2020-06-18 05:14:55'),
(24, '21', 'Receiver Order', 'receiverOrder.index', 'fa fa-bars', 3, '1', '2020-06-18 05:15:39', '2020-06-18 05:15:39'),
(25, '13', 'Delivery Man', 'deliveryMan.index', 'fa fa-bars', 9, '1', '2020-06-22 01:36:17', '2020-08-04 04:30:48'),
(26, NULL, 'Delivery Management', 'admin.index', 'fa fa-bars', 6, '1', '2020-06-23 01:05:09', '2020-07-08 07:11:41'),
(27, '26', 'Goods Collection', 'goodsCollection.index', 'fa fa-caret', 1, '1', '2020-06-23 01:19:42', '2020-06-23 01:19:42'),
(28, '26', 'Goods Delivery', 'goodsDelivery.index', 'fa fa-caret', 2, '1', '2020-06-23 01:20:10', '2020-06-23 01:20:10'),
(29, NULL, 'Warehouse Management', 'admin.index', 'fa fa-bars', 7, '1', '2020-07-01 01:45:18', '2020-07-08 07:11:48'),
(32, '29', 'Agent Receive', 'receiveFormAgent.index', 'fa fa-caret', 3, '1', '2020-07-01 05:06:42', '2020-07-04 05:40:35'),
(33, '29', 'Issue Warehouse', 'issueToWarehouse.index', NULL, 4, '1', '2020-07-01 05:07:57', '2020-07-04 05:41:28'),
(34, '29', 'Issue Agent', 'issueToAgent.index', NULL, 6, '1', '2020-07-01 05:50:00', '2020-07-04 05:41:41'),
(36, '29', 'Warehouse Receive', 'receiveFromWarehouse.index', 'fa fa-caret', 5, '1', '2020-07-04 04:06:39', '2020-07-04 05:41:00'),
(37, '13', 'Area Setup', 'areaSetup.index', NULL, 3, '1', '2020-07-06 07:04:45', '2020-08-04 04:28:05'),
(38, '39', 'Admin Information', 'adminPanelInformation.index', 'fa fa-bars', 5, '1', '2020-07-07 03:46:55', '2020-07-07 03:55:31'),
(39, NULL, 'User Management', 'admin.index', 'fa fa-bars', 2, '1', NULL, '2020-07-08 07:11:13'),
(42, NULL, 'Charge Management', 'admin.index', 'fa fa-bars', 8, '1', '2020-07-09 01:37:01', '2020-07-09 04:50:48'),
(43, '42', 'Service Type', 'serviceType.index', 'fa fa-caret', 2, '1', '2020-07-09 01:42:39', '2020-07-09 04:57:02'),
(44, '42', 'Service', 'service.index', 'fa fa-caret', 1, '1', '2020-07-09 01:43:49', '2020-07-09 04:56:47'),
(45, '42', 'Charge Setup', 'admin.index', 'fa fa-caret', 3, '1', '2020-07-09 05:41:25', '2020-07-09 05:41:25'),
(46, '45', 'For Client', 'chargeForClient.index', NULL, 1, '1', '2020-07-11 00:59:27', '2020-07-11 00:59:27'),
(47, '45', 'For Merchant', 'chargeForMerchant.index', 'fa fa-caret', 2, '1', '2020-07-11 02:47:15', '2020-07-11 02:47:15'),
(48, '45', 'For Delivery Man', 'chargeForDeliveryMen.index', 'fa fa-caret', 3, '1', '2020-07-11 03:55:55', '2020-07-11 03:55:55'),
(49, '13', 'Delivery Type', 'deliveryType.index', 'fa fa-bars', 8, '1', '2020-07-11 23:30:50', '2020-08-04 04:30:38'),
(50, NULL, 'Order Entry', 'merchantBookingOrder.index', 'fa fa-bars', 9, '1', '2020-07-12 03:48:51', '2020-07-12 04:27:37'),
(51, NULL, 'Payment Collection', 'paymentCollection.index', NULL, 10, '1', '2020-07-20 04:07:25', '2020-07-20 04:07:25'),
(52, NULL, 'Delivery Man Payment', 'deliveryManPayment.index', NULL, 11, '1', '2020-07-23 06:51:33', '2020-07-23 06:51:33'),
(53, NULL, 'Accounts Management', 'admin.index', NULL, 13, '1', '2020-07-27 23:09:22', '2020-08-25 00:39:50'),
(54, '53', 'Chart Of Accounts', 'coaSetup.index', NULL, 1, '1', '2020-07-27 23:10:20', '2020-07-27 23:10:20'),
(55, '53', 'Journal Entry', 'journalEntry.index', NULL, 2, '1', '2020-07-27 23:40:06', '2020-07-27 23:45:57'),
(56, '53', 'Debit Entry', 'debitEntry.index', NULL, 3, '1', '2020-07-27 23:46:21', '2020-07-27 23:46:21'),
(57, '53', 'Credit Entry', 'creditEntry.index', NULL, 4, '1', '2020-07-27 23:49:58', '2020-07-27 23:49:58'),
(58, '53', 'Voucher Approve', 'voucherApprove.index', NULL, 5, '1', '2020-07-27 23:55:51', '2020-07-27 23:55:51'),
(59, NULL, 'Accounts Reports', 'admin.index', NULL, 14, '1', '2020-07-28 03:04:59', '2020-08-25 00:40:07'),
(61, '59', 'COA List', 'coaList.index', NULL, 1, '1', '2020-07-28 03:06:23', '2020-07-28 03:06:23'),
(62, '59', 'Voucher List', 'voucherList.index', NULL, 2, '1', '2020-07-28 03:07:26', '2020-07-28 03:07:26'),
(63, '59', 'General Ledger', 'generalLedger.index', NULL, 3, '1', '2020-07-28 03:07:44', '2020-07-28 03:07:44'),
(64, '59', 'Transaction Ledger', 'transactionLedger.index', NULL, 4, '1', '2020-07-28 03:09:08', '2020-07-28 03:09:08'),
(65, '59', 'Cash Book', 'cashBook.index', NULL, 5, '1', '2020-07-28 03:10:06', '2020-07-28 03:10:06'),
(66, '59', 'Bank Book', 'bankBook.index', NULL, 6, '1', '2020-07-28 03:10:22', '2020-07-28 03:10:22'),
(67, '59', 'Trial Balance', 'trialBalance.index', NULL, 7, '1', '2020-07-28 03:11:01', '2020-07-28 03:11:01'),
(68, '59', 'Income Statement', 'incomeStatement.index', NULL, 8, '1', '2020-07-28 03:11:21', '2020-07-28 03:11:21'),
(69, '59', 'Receive Payment Statement', 'receivePaymentStatement.index', NULL, 9, '1', '2020-07-28 03:12:06', '2020-07-28 03:12:06'),
(70, '13', 'Hub Setup', 'hubSetup.index', NULL, 2, '1', '2020-08-04 04:26:34', '2020-08-04 04:27:27'),
(71, NULL, 'Reports', 'admin.index', NULL, 15, '1', '2020-08-23 01:06:29', '2020-09-04 22:47:13'),
(72, '71', 'Merchant History', 'merchantStatement.index', NULL, 1, '1', '2020-08-23 01:11:15', '2020-09-04 22:38:52'),
(73, '71', 'Order History', 'orderStatement.index', NULL, 2, '1', '2020-08-24 00:57:42', '2020-09-04 22:39:22'),
(74, NULL, 'Merchant Payment', 'merchantPayment.index', NULL, 12, '1', '2020-08-25 00:39:26', '2020-08-25 00:39:26'),
(75, '71', 'Payment Log', 'paymentLog.index', NULL, 5, '1', '2020-08-26 05:16:21', '2020-09-04 22:48:45'),
(76, '71', 'Collection History', 'collectionHistory.index', NULL, 3, '1', '2020-08-27 01:48:40', '2020-09-04 22:47:44'),
(77, '71', 'Top Sheet', 'topSheet.index', NULL, 6, '1', '2020-09-02 23:39:20', '2020-09-04 22:48:33'),
(78, '21', 'Return Delivery', 'returnDelivery.index', NULL, 4, '1', '2020-09-03 06:10:56', '2020-09-03 06:10:56'),
(79, '71', 'Return History', 'returnHistory.index', NULL, 4, '1', '2020-09-04 22:46:56', '2020-09-04 22:48:55'),
(80, '6', 'Contact Us', 'contactUs.index', NULL, 6, '1', '2020-09-06 03:41:56', '2020-09-06 03:41:56'),
(81, '21', 'Assigned Delivery Man', 'assignedDeliveryMan.index', NULL, 5, '1', '2020-10-01 08:04:57', '2020-10-01 08:04:57'),
(82, '21', 'Booking Order POS', 'bookingOrderPos.index', NULL, 6, '1', '2020-10-03 06:27:13', '2020-10-03 06:27:13'),
(83, '21', 'Order List', 'orderList.index', NULL, 7, '1', '2020-10-03 13:45:55', '2020-10-03 13:48:03'),
(84, '21', 'Assigned Order Status', 'assignedOrderStatus.index', NULL, 8, '1', '2020-10-10 06:45:37', '2020-10-10 06:45:37'),
(85, '21', 'Order Status List', 'orderStatusList.index', NULL, 9, '1', '2020-10-10 08:10:47', '2020-10-10 08:10:47');

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
(103, 36, 8, 'View', 'receiveFromWarehouse.view', 1, 1, '2020-07-04 04:07:08', '2020-07-04 04:07:08'),
(104, 37, 1, 'Add', 'areaSetup.add', 1, 1, '2020-07-06 07:05:12', '2020-07-06 07:05:12'),
(105, 37, 2, 'Edit', 'areaSetup.edit', 2, 1, '2020-07-06 07:05:23', '2020-07-06 07:05:23'),
(106, 37, 3, 'Status', 'areaSetup.status', 3, 1, '2020-07-06 07:05:40', '2020-07-06 07:05:40'),
(107, 37, 4, 'Delete', 'areaSetup.delete', 4, 1, '2020-07-06 07:05:50', '2020-07-06 07:05:50'),
(108, 38, 1, 'Add', 'adminPanelInformation.add', 1, 1, '2020-07-07 03:52:28', '2020-07-07 03:52:28'),
(109, 38, 2, 'Edit', 'adminPanelInformation.edit', 2, 1, '2020-07-07 03:52:38', '2020-07-07 03:52:38'),
(110, 44, 1, 'Add', 'service.add', 1, 1, '2020-07-09 05:11:16', '2020-07-09 05:11:16'),
(111, 44, 2, 'Edit', 'service.edit', 2, 1, '2020-07-09 05:11:24', '2020-07-09 05:11:24'),
(112, 44, 3, 'Status', 'service.status', 3, 1, '2020-07-09 05:11:34', '2020-07-09 05:11:34'),
(113, 44, 4, 'Delete', 'service.delete', 4, 1, '2020-07-09 05:11:45', '2020-07-09 05:11:45'),
(114, 43, 1, 'Add', 'serviceType.add', 1, 1, '2020-07-09 05:12:20', '2020-07-09 05:12:20'),
(115, 43, 2, 'Edit', 'serviceType.edit', 2, 1, '2020-07-09 05:12:27', '2020-07-09 05:12:27'),
(116, 43, 3, 'Status', 'serviceType.status', 3, 1, '2020-07-09 05:12:35', '2020-07-09 05:12:35'),
(117, 43, 4, 'Delete', 'serviceType.delete', 4, 1, '2020-07-09 05:12:50', '2020-07-09 05:12:50'),
(118, 46, 1, 'Add', 'chargeForClient.add', 1, 1, '2020-07-11 01:00:07', '2020-07-11 01:00:07'),
(119, 46, 2, 'Edit', 'chargeForClient.edit', 2, 1, '2020-07-11 01:00:15', '2020-07-11 01:01:00'),
(120, 46, 3, 'Status', 'chargeForClient.status', 3, 1, '2020-07-11 01:00:36', '2020-07-11 01:00:36'),
(121, 46, 4, 'Delete', 'chargeForClient.delete', 4, 1, '2020-07-11 01:00:45', '2020-07-11 01:00:45'),
(122, 47, 1, 'Add', 'chargeForMerchant.add', 1, 1, '2020-07-11 02:47:35', '2020-07-11 02:47:35'),
(123, 47, 2, 'Edit', 'chargeForMerchant.edit', 2, 1, '2020-07-11 02:47:42', '2020-07-11 02:47:42'),
(124, 47, 3, 'Status', 'chargeForMerchant.status', 3, 1, '2020-07-11 02:47:51', '2020-07-11 02:47:51'),
(125, 47, 4, 'Delete', 'chargeForMerchant.delete', 4, 1, '2020-07-11 02:47:59', '2020-07-11 02:47:59'),
(126, 48, 1, 'Add', 'chargeForDeliveryMen.add', 1, 1, '2020-07-11 03:56:12', '2020-07-11 03:56:12'),
(127, 48, 2, 'Edit', 'chargeForDeliveryMen.edit', 2, 1, '2020-07-11 03:56:20', '2020-07-11 03:56:20'),
(128, 48, 3, 'Status', 'chargeForDeliveryMen.status', 3, 1, '2020-07-11 03:56:28', '2020-07-11 03:56:28'),
(129, 48, 4, 'Delete', 'chargeForDeliveryMen.delete', 4, 1, '2020-07-11 03:56:36', '2020-07-11 03:56:36'),
(130, 49, 1, 'Add', 'deliveryType.add', 1, 1, '2020-07-11 23:31:14', '2020-07-11 23:31:14'),
(131, 49, 2, 'Edit', 'deliveryType.edit', 2, 1, '2020-07-11 23:31:25', '2020-07-11 23:31:25'),
(132, 49, 3, 'Status', 'deliveryType.status', 3, 1, '2020-07-11 23:31:35', '2020-07-11 23:31:35'),
(133, 49, 4, 'Delete', 'deliveryType.delete', 4, 1, '2020-07-11 23:31:44', '2020-07-11 23:31:44'),
(134, 50, 1, 'Add', 'merchantBookingOrder.add', 1, 1, '2020-07-12 03:49:49', '2020-07-12 03:49:49'),
(135, 50, 2, 'Edit', 'merchantBookingOrder.edit', 2, 1, '2020-07-12 03:49:58', '2020-07-12 03:49:58'),
(136, 50, 8, 'View', 'merchantBookingOrder.view', 3, 1, '2020-07-12 03:50:20', '2020-07-12 03:50:20'),
(137, 50, 3, 'Status', 'merchantBookingOrder.status', 4, 1, '2020-07-12 03:50:32', '2020-07-12 03:50:32'),
(138, 50, 4, 'Delete', 'merchantBookingOrder.delete', 5, 1, '2020-07-12 03:50:43', '2020-07-12 03:50:43'),
(139, 51, 1, 'Add', 'paymentCollection.add', 1, 1, '2020-07-20 04:17:34', '2020-07-20 04:17:34'),
(140, 51, 2, 'Edit', 'paymentCollection.edit', 2, 1, '2020-07-20 04:17:43', '2020-07-20 04:17:43'),
(141, 51, 3, 'Status', 'paymentCollection.staus', 3, 1, '2020-07-20 04:18:23', '2020-07-20 04:18:23'),
(142, 51, 8, 'View', 'paymentCollection.view', 4, 1, '2020-07-20 04:18:36', '2020-07-20 04:18:36'),
(143, 51, 4, 'Delete', 'paymentCollection.delete', 5, 1, '2020-07-20 04:18:50', '2020-07-20 04:18:50'),
(144, 52, 1, 'Add', 'deliveryManPayment.add', 1, 1, '2020-07-23 06:51:57', '2020-07-23 06:51:57'),
(145, 52, 2, 'Edit', 'deliveryManPayment.edit', 2, 1, '2020-07-23 06:52:07', '2020-07-23 06:52:07'),
(146, 52, 3, 'Status', 'deliveryManPayment.status', 3, 1, '2020-07-23 06:52:26', '2020-07-23 06:52:26'),
(147, 52, 8, 'View', 'deliveryManPayment.view', 4, 1, '2020-07-23 06:52:37', '2020-07-23 06:52:37'),
(148, 52, 4, 'Delete', 'deliveryManPayment.delete', 5, 1, '2020-07-23 06:52:46', '2020-07-23 06:52:46'),
(149, 55, 1, 'Add', 'journalEntry.add', 1, 1, '2020-07-27 23:40:57', '2020-07-27 23:42:47'),
(150, 55, 2, 'Edit', 'journalEntry.edit', 2, 1, '2020-07-27 23:41:18', '2020-07-27 23:43:01'),
(151, 55, 8, 'View', 'journalEntry.view', 3, 1, '2020-07-27 23:41:40', '2020-07-27 23:43:21'),
(152, 55, 11, 'Print Journal Voucher', 'journalEntry.printJournalVoucher', 4, 1, '2020-07-27 23:44:13', '2020-07-27 23:44:13'),
(153, 55, 4, 'Delete', 'journalEntry.delete', 5, 1, '2020-07-27 23:44:36', '2020-07-27 23:44:36'),
(154, 55, 3, 'Publish', 'journalEntry.publish', 6, 1, '2020-07-27 23:44:59', '2020-07-27 23:44:59'),
(155, 56, 1, 'Add', 'debitEntry.add', 1, 1, '2020-07-27 23:46:54', '2020-07-27 23:46:54'),
(156, 56, 2, 'Edit', 'debitEntry.edit', 2, 1, '2020-07-27 23:47:35', '2020-07-27 23:47:35'),
(157, 56, 8, 'View Debit Entry', 'debitEntry.view', 3, 1, '2020-07-27 23:47:55', '2020-07-27 23:49:14'),
(158, 56, 11, 'Print Debit Voucher', 'debitEntry.printDebitVoucher', 4, 1, '2020-07-27 23:48:27', '2020-07-27 23:54:22'),
(159, 56, 4, 'Delete', 'debitEntry.delete', 5, 1, '2020-07-27 23:48:44', '2020-07-27 23:48:44'),
(160, 56, 3, 'Publish', 'debitEntry.publish', 6, 1, '2020-07-27 23:48:59', '2020-07-27 23:48:59'),
(161, 57, 1, 'Add', 'creditEntry.add', 1, 1, '2020-07-27 23:50:22', '2020-07-27 23:50:22'),
(162, 57, 2, 'Edit', 'creditEntry.edit', 2, 1, '2020-07-27 23:50:35', '2020-07-27 23:50:35'),
(163, 57, 8, 'View Credit Entry', 'creditEntry.view', 3, 1, '2020-07-27 23:51:20', '2020-07-27 23:51:20'),
(164, 57, 11, 'Print Credit Voucher', 'creditEntry.printCreditVoucher', 4, 1, '2020-07-27 23:52:55', '2020-07-27 23:52:55'),
(165, 57, 4, 'Delete', 'creditEntry.delete', 5, 1, '2020-07-27 23:53:18', '2020-07-27 23:53:18'),
(166, 57, 3, 'Publish', 'creditEntry.publish', 6, 1, '2020-07-27 23:53:45', '2020-07-27 23:53:45'),
(167, 70, 1, 'Add', 'hubSetup.add', 1, 1, '2020-08-04 04:39:22', '2020-08-04 04:39:22'),
(168, 70, 2, 'Edit', 'hubSetup.edit', 2, 1, '2020-08-04 04:39:33', '2020-08-04 04:39:33'),
(169, 70, 3, 'Status', 'hubSetup.status', 3, 1, '2020-08-04 04:39:45', '2020-08-04 04:39:45'),
(170, 70, 4, 'Delete', 'hubSetup.delete', 4, 1, '2020-08-04 04:39:56', '2020-08-04 04:39:56'),
(171, 74, 1, 'Add', 'merchantPayment.add', 1, 1, '2020-08-25 00:40:52', '2020-08-25 00:40:52'),
(172, 74, 2, 'Edit', 'merchantPayment.edit', 2, 1, '2020-08-25 00:41:38', '2020-08-25 00:41:38'),
(173, 74, 3, 'Status', 'merchantPayment.status', 3, 1, '2020-08-25 00:41:52', '2020-08-25 00:41:52'),
(174, 74, 8, 'View', 'merchantPayment.view', 4, 1, '2020-08-25 01:08:55', '2020-08-25 01:08:55'),
(175, 74, 4, 'Delete', 'merchantPayment.delete', 5, 1, '2020-08-25 01:09:08', '2020-08-25 01:09:08'),
(176, 78, 8, 'View', 'returnDelivery.view', 1, 1, '2020-09-03 06:11:23', '2020-09-03 06:11:23'),
(177, 80, 1, 'Add', 'contactUs.add', 1, 1, '2020-09-06 03:42:16', '2020-09-06 03:42:16'),
(178, 80, 2, 'Edit', 'contactUs.edit', 2, 1, '2020-09-06 03:42:31', '2020-09-06 03:42:31'),
(179, 80, 3, 'Status', 'contactUs.status', 3, 1, '2020-09-06 03:42:45', '2020-09-06 03:42:45'),
(180, 80, 4, 'Delete', 'contactUs.delete', 4, 1, '2020-09-06 03:42:55', '2020-09-06 03:42:55'),
(181, 81, 1, 'Add', 'assignedDeliveryMan.add', 1, 1, '2020-10-01 08:05:23', '2020-10-01 08:05:23'),
(182, 81, 8, 'View', 'assignedDeliveryMan.view', 2, 1, '2020-10-01 08:05:41', '2020-10-01 08:05:41'),
(183, 84, 1, 'Add', 'assignedOrderStatus.add', 1, 1, '2020-10-10 06:45:56', '2020-10-10 06:45:56'),
(184, 84, 8, 'View', 'assignedOrderStatus.view', 2, 1, '2020-10-10 06:46:28', '2020-10-10 06:46:28');

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
-- Table structure for table `tbl_merchant_payment`
--

CREATE TABLE `tbl_merchant_payment` (
  `id` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `merchant_id` int(11) DEFAULT NULL,
  `total_cod_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposit_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_merchant_payment`
--

INSERT INTO `tbl_merchant_payment` (`id`, `date`, `merchant_id`, `total_cod_amount`, `total_balance`, `deposit_type`, `remarks`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(10, '2020-09-02', 8, '5000', '4830', 'Cash Payment', 'co-200822-00004 - 4830', 1, 4, '2020-09-02 00:51:44', NULL, '2020-09-02 00:51:44'),
(11, '2020-09-02', 8, '80000', '79080', 'Cash Payment', 'co-200822-00005 - 79080', 1, 4, '2020-09-02 00:51:57', NULL, '2020-09-02 00:51:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_merchant_payment_lists`
--

CREATE TABLE `tbl_merchant_payment_lists` (
  `id` int(11) NOT NULL,
  `merchant_payment_id` int(11) DEFAULT NULL,
  `booking_order_id` int(11) DEFAULT NULL,
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cod_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_charge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_merchant_payment_lists`
--

INSERT INTO `tbl_merchant_payment_lists` (`id`, `merchant_payment_id`, `booking_order_id`, `order_no`, `cod_amount`, `service_charge`, `balance`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(15, 10, 4, 'co-200822-00004', '5000', '170', '4830', 1, 4, '2020-09-02 00:51:44', NULL, '2020-09-02 00:51:44'),
(16, 11, 5, 'co-200822-00005', '80000', '920', '79080', 1, 4, '2020-09-02 00:51:57', NULL, '2020-09-02 00:51:57');

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
(5, 5, 'Home', 1, 4, '2020-09-05 06:07:18', 4, '2020-09-05 06:27:06'),
(6, 6, 'About Us', 1, 4, '2020-09-05 06:07:31', 4, '2020-09-06 03:45:43'),
(7, 7, 'Our Services', 1, 4, '2020-09-05 06:34:18', 4, '2020-09-06 00:20:30'),
(8, 8, 'Service Charge', 1, 4, '2020-09-05 06:34:39', 4, '2020-09-06 03:45:59'),
(9, 9, 'Contact Us', 1, 4, '2020-09-05 06:35:00', 4, '2020-09-06 03:46:07'),
(10, 10, 'Parcel Delivery', 1, 4, '2020-09-06 00:20:17', 4, '2020-09-06 03:46:20'),
(11, 11, 'Document Delivery', 1, 4, '2020-09-06 00:54:24', 4, '2020-09-06 03:46:14'),
(12, 12, 'Food Delivery', 1, 4, '2020-09-06 00:55:18', 4, '2020-09-06 03:46:28'),
(13, 13, 'Grocery Item', 1, 4, '2020-09-06 00:55:53', 4, '2020-09-06 03:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_collections`
--

CREATE TABLE `tbl_payment_collections` (
  `id` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `total_cod_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_delivery_charge_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_payment_collections`
--

INSERT INTO `tbl_payment_collections` (`id`, `date`, `client_type`, `client_id`, `total_cod_amount`, `total_delivery_charge_amount`, `balance`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(8, '2020-08-27', 'Merchant', 8, '85000', '1090', '83910', 1, 4, '2020-08-27 02:32:31', NULL, '2020-08-27 02:32:31'),
(9, '2020-08-27', 'Merchant', 7, '1500', '195', '1305', 1, 4, '2020-08-27 02:34:06', NULL, '2020-08-27 02:34:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_collection_lists`
--

CREATE TABLE `tbl_payment_collection_lists` (
  `id` int(11) NOT NULL,
  `payment_collection_id` int(11) DEFAULT NULL,
  `booking_order_id` int(11) DEFAULT NULL,
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cod_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_charge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_payment_collection_lists`
--

INSERT INTO `tbl_payment_collection_lists` (`id`, `payment_collection_id`, `booking_order_id`, `order_no`, `cod_amount`, `delivery_charge`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(8, 8, 4, 'co-200822-00004', '5000', '170', 1, 4, '2020-08-27 02:32:31', NULL, '2020-08-27 02:32:31'),
(9, 8, 5, 'co-200822-00005', '80000', '920', 1, 4, '2020-08-27 02:32:31', NULL, '2020-08-27 02:32:31'),
(10, 9, 2, 'co-200822-00002', '1500', '195', 1, 4, '2020-08-27 02:34:06', NULL, '2020-08-27 02:34:06');

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weighing_scale` tinyint(4) NOT NULL DEFAULT 0,
  `upto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `order_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`id`, `name`, `description`, `weighing_scale`, `upto`, `status`, `order_by`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Regular Business Parcels', 'Regular Business Parcels', 0, '0', 1, 1, 4, '2020-07-08 23:13:39', NULL, '2020-08-17 20:21:09'),
(2, 'Emergency Delivery (4 Hour Delivery)', 'Emergency Delivery (4 Hour Delivery)', 0, '0', 1, 2, 4, '2020-07-08 23:16:01', NULL, '2020-08-17 20:22:01'),
(3, 'Gift/Glass Item', 'Gift/Glass Item', 0, '0', 1, 3, 4, '2020-07-08 23:29:48', NULL, '2020-08-17 20:22:48'),
(4, 'Food (Upto 5 Km Distance From Pick Point)', 'Food (Upto 5 Km Distance From Pick Point)', 0, '0', 1, 4, 4, '2020-07-08 23:30:00', NULL, '2020-08-17 20:25:05'),
(5, 'Food (Upto 10 Km Distance From Pick Point)', 'Food (Upto 10 Km Distance From Pick Point)', 0, '0', 1, 5, 4, '2020-07-08 23:31:21', NULL, '2020-08-17 20:25:30'),
(6, 'Food (Over 10 Km Distance From Pick Point)', 'Food (Over 10 Km Distance From Pick Point)', 0, '0', 1, 6, 4, '2020-07-08 23:31:31', NULL, '2020-08-17 20:26:27'),
(8, 'Document/Letter (Regular)', 'Document/Letter (Regular)', 0, '0', 1, 7, 4, '2020-08-17 20:27:38', NULL, '2020-08-17 20:27:38'),
(9, 'Document/Letter (Emergency)', 'Document/Letter (Emergency)', 0, '0', 1, 8, 4, '2020-08-17 20:28:16', NULL, '2020-08-17 20:28:24'),
(10, 'Parcel Weight Up To 5 Kg (Per Kg 5 BDT For Over 5 Kg)', 'Parcel Weight Up To 5 Kg (Per Kg 5 BDT For Over 5 Kg)', 1, '5', 1, 9, 4, '2020-08-17 20:37:33', NULL, '2020-10-10 05:53:27'),
(11, 'Pick & Ship (Receive Form Outside Dhaka)', 'Pick & Ship (Receive Form Outside Dhaka)', 0, '0', 1, 10, 4, '2020-08-17 21:09:07', NULL, '2020-08-17 21:09:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_charges`
--

CREATE TABLE `tbl_service_charges` (
  `id` int(11) NOT NULL,
  `location_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge` int(11) DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_types`
--

CREATE TABLE `tbl_service_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `order_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_service_types`
--

INSERT INTO `tbl_service_types` (`id`, `name`, `description`, `status`, `order_by`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Client To Client', 'Client To Client', 1, 1, 4, '2020-07-09 05:38:51', NULL, '2020-07-09 05:40:03'),
(2, 'Client To Office', 'Client To Office', 1, 2, 4, '2020-07-09 05:40:16', NULL, '2020-07-09 05:40:16'),
(3, 'Office To Client', 'Office To Client', 1, 3, 4, '2020-07-09 05:40:32', NULL, '2020-07-09 05:40:32'),
(4, 'Office To Office', 'Office To Office', 1, 4, 4, '2020-07-09 05:40:46', NULL, '2020-07-09 05:40:46');

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
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(2, 'Super User', NULL, 1, 1, '1,39,2,3,4,5,38,6,7,8,10,11,12,80,13,14,15,16,17,18,25,37,49,70,21,22,78,81,82,83,84,85,42,43,44,45,46,47,48,51,52,74,53,54,55,56,57,58,59,61,62,63,64,65,66,67,68,69,71,72,73,75,76,77,79', '2,3,4,5,6,11,12,13,14,15,7,8,9,10,21,22,23,24,25,26,108,109,28,29,30,31,32,33,39,40,41,42,43,44,45,46,47,48,49,50,51,177,178,179,180,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,89,90,91,92,104,105,106,107,130,131,132,133,167,168,169,170,84,85,88,86,87,176,181,182,183,184,114,115,116,117,110,111,112,113,118,119,120,121,122,123,124,125,126,127,128,129,139,140,141,142,143,144,145,146,147,148,171,172,173,174,175,149,150,151,152,153,154,155,156,157,158,159,160,161,162,163,164,165,166', '2019-04-17 00:50:05', '2020-10-10 08:11:02'),
(3, 'Admin', NULL, 1, 1, '1,39,2,3,5', '2,3,4,11,12,13,14,15,21,22,23,24,25,26', '2019-04-17 00:52:54', '2020-07-08 12:49:14'),
(4, 'Client', NULL, 1, 1, '1', '', '2020-03-07 00:49:33', '2020-07-08 12:49:35'),
(8, 'Agent', NULL, 1, 1, '1,21,23,24', '93,94', '2020-06-10 06:39:37', '2020-07-08 12:49:25'),
(10, 'Subagnet', 8, 2, 1, '1,21,23,24', '93,94', '2020-06-10 06:42:15', '2020-07-08 12:50:09'),
(11, 'Warehouse', NULL, 1, 1, '1,29,32,33,34,36', '99,100,101,103', '2020-06-11 05:00:51', '2020-07-08 12:50:23'),
(12, 'Marchant', NULL, 1, 1, '1,50', '134,135,136,137,138', '2020-06-11 05:01:00', '2020-07-12 06:43:02'),
(14, 'Delivery Man', NULL, 1, 1, '1,26,27,28', '96,95', '2020-06-22 01:41:39', '2020-07-08 12:49:45');

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
(4, 30, 11, 'Dhaka Central Warehouse', 'Hasan Mahmud Jewel', '01612742150', 'dhakacentral@quickexpress.com.bd', 'Mirpur 12', 1, 4, '2020-07-03 19:48:21', NULL, '2020-07-13 14:33:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_website_information`
--

CREATE TABLE `tbl_website_information` (
  `id` int(11) NOT NULL,
  `website_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prefix_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `developed_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `developer_website_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_three` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_one` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_two` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fav_icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `tbl_website_information` (`id`, `website_name`, `prefix_title`, `website_title`, `website_link`, `developed_by`, `developer_website_link`, `phone_one`, `phone_two`, `phone_three`, `address`, `logo_one`, `logo_two`, `fav_icon`, `meta_title`, `meta_keyword`, `meta_description`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Quick Express', '|', 'Quick Express', 'http://www.technoparkbd.com/', 'Techno Park Bangladesh', 'http://www.technoparkbd.com/', '+880 1916 304 877', NULL, NULL, 'House #52, Road #16, Block #D, Pallabi, Mirpur, Dhaka #1216', 'public/uploads/site_logo/logo1/105643874_571111206863795_2713819376116015751_n_8188589146.jpg', 'public/uploads/site_logo/logo2/website_logo_transparent_00_32584348296.png', 'public/uploads/site_logo/fav_icon/website_favicon_26561815396_99212463332.png', 'Courier Service', NULL, 'Courier Service.', 1, 4, '2020-04-17 08:33:15', NULL, '2020-10-03 12:57:33');

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
-- Stand-in structure for view `view_account`
-- (See below for the actual view)
--
CREATE TABLE `view_account` (
`voucherNo` varchar(191)
,`voucherType` varchar(191)
,`debitHeadCode` varchar(191)
,`debitHeadname` varchar(191)
,`creditHeadcode` varchar(191)
,`creditHeadName` varchar(191)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_clients`
-- (See below for the actual view)
--
CREATE TABLE `view_clients` (
`clientId` int(11)
,`clientUserRoleId` int(11)
,`clientHubId` int(11)
,`clientAreaId` int(11)
,`clientAreaName` varchar(255)
,`clientType` varchar(8)
,`clientName` varchar(255)
,`clientPhone` varchar(255)
,`clientAddress` mediumtext
,`clientCodChargePercentage` varchar(255)
,`clientReturnChargeStatus` varchar(4)
,`clientRescheduleChargeStatus` varchar(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_merchant_statement`
-- (See below for the actual view)
--
CREATE TABLE `view_merchant_statement` (
`date` varchar(255)
,`orderNo` varchar(255)
,`clientType` varchar(255)
,`statementType` varchar(7)
,`clientId` int(11)
,`bookingCodAmount` varchar(255)
,`bookingDeliveryCharge` varchar(11)
,`paymentCodAmount` varchar(255)
,`paymentDeliveryCharge` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_top_sheet`
-- (See below for the actual view)
--
CREATE TABLE `view_top_sheet` (
`date` varchar(255)
,`orderno` varchar(255)
,`orderValue` varchar(11)
,`returnDelivery` varchar(4)
,`paymentCollection` varchar(255)
,`merchantPayment` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_voucher_approve`
-- (See below for the actual view)
--
CREATE TABLE `view_voucher_approve` (
`id` int(10) unsigned
,`voucherNo` varchar(191)
,`voucherType` varchar(191)
,`narration` mediumtext
,`date` varchar(191)
,`amount` varchar(191)
,`approve` tinyint(4)
,`approveBy` int(11)
);

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
,`zone_area` varchar(255)
,`zone_area_id` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `view_account`
--
DROP TABLE IF EXISTS `view_account`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_account`  AS  select `tab1`.`voucher_no` AS `voucherNo`,`tab1`.`voucher_type` AS `voucherType`,`tab1`.`coa_head_code` AS `debitHeadCode`,`debitcoa`.`head_name` AS `debitHeadname`,`tab2`.`coa_head_code` AS `creditHeadcode`,`creditcoa`.`head_name` AS `creditHeadName` from (((`tbl_account_transactions` `tab1` join `tbl_account_transactions` `tab2` on(`tab2`.`voucher_no` = `tab1`.`voucher_no`)) join `tbl_coa` `debitcoa` on(`debitcoa`.`head_code` = `tab1`.`coa_head_code`)) join `tbl_coa` `creditcoa` on(`creditcoa`.`head_code` = `tab2`.`coa_head_code`)) where `tab1`.`debit_amount` <> 0 and `tab2`.`credit_amount` <> 0 order by `tab1`.`voucher_no` ;

-- --------------------------------------------------------

--
-- Structure for view `view_clients`
--
DROP TABLE IF EXISTS `view_clients`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_clients`  AS  select `tbl_clients`.`id` AS `clientId`,`tbl_clients`.`user_role_id` AS `clientUserRoleId`,`tbl_area`.`hub_id` AS `clientHubId`,`tbl_clients`.`area` AS `clientAreaId`,`tbl_area`.`name` AS `clientAreaName`,'Client' AS `clientType`,`tbl_clients`.`name` AS `clientName`,`tbl_clients`.`phone` AS `clientPhone`,`tbl_clients`.`address` AS `clientAddress`,'1' AS `clientCodChargePercentage`,'0' AS `clientReturnChargeStatus`,'0' AS `clientRescheduleChargeStatus` from (`tbl_clients` left join `tbl_area` on(`tbl_area`.`id` = `tbl_clients`.`area`)) union all select `tbl_marchants`.`id` AS `clientId`,`tbl_marchants`.`user_role_id` AS `clientUserRoleId`,`tbl_area`.`hub_id` AS `clientHubId`,`tbl_marchants`.`area` AS `clientAreaId`,`tbl_area`.`name` AS `clientAreaName`,'Merchant' AS `clientType`,`tbl_marchants`.`name` AS `clientName`,`tbl_marchants`.`contact_person_phone` AS `clientPhone`,`tbl_marchants`.`address` AS `clientAddress`,`tbl_marchants`.`cod_charge_percentage` AS `clientCodChargePercentage`,`tbl_marchants`.`return_charge_status` AS `clientReturnChargeStatus`,`tbl_marchants`.`reschedule_charge_status` AS `clientRescheduleChargeStatus` from (`tbl_marchants` left join `tbl_area` on(`tbl_area`.`id` = `tbl_marchants`.`area`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_merchant_statement`
--
DROP TABLE IF EXISTS `view_merchant_statement`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_merchant_statement`  AS  select `tbl_booking_orders`.`date` AS `date`,`tbl_booking_orders`.`order_no` AS `orderNo`,`tbl_booking_orders`.`booked_type` AS `clientType`,'Booking' AS `statementType`,`tbl_booking_orders`.`sender_id` AS `clientId`,`tbl_booking_orders`.`cod_amount` AS `bookingCodAmount`,`tbl_booking_orders`.`delivery_charge` AS `bookingDeliveryCharge`,0 AS `paymentCodAmount`,0 AS `paymentDeliveryCharge` from `tbl_booking_orders` union all select `tbl_payment_collections`.`date` AS `date`,`tbl_payment_collection_lists`.`order_no` AS `orderNo`,`tbl_payment_collections`.`client_type` AS `clientType`,'Payment' AS `statementType`,`tbl_payment_collections`.`client_id` AS `clientId`,0 AS `bookingCodAmount`,0 AS `bookingDeliveryCharge`,`tbl_payment_collection_lists`.`cod_amount` AS `paymentCodAmount`,`tbl_payment_collection_lists`.`delivery_charge` AS `paymentDeliveryCharge` from (`tbl_payment_collections` left join `tbl_payment_collection_lists` on(`tbl_payment_collection_lists`.`payment_collection_id` = `tbl_payment_collections`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_top_sheet`
--
DROP TABLE IF EXISTS `view_top_sheet`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_top_sheet`  AS  select `tbl_booking_orders`.`date` AS `date`,`tbl_booking_orders`.`order_no` AS `orderno`,`tbl_booking_orders`.`delivery_charge` AS `orderValue`,`tbl_booking_orders`.`return_status` AS `returnDelivery`,'0' AS `paymentCollection`,'0' AS `merchantPayment` from `tbl_booking_orders` union all select `tbl_payment_collections`.`date` AS `date`,NULL AS `orderNo`,'0' AS `orderValue`,'0' AS `returnDelivery`,`tbl_payment_collections`.`balance` AS `paymentCollection`,'0' AS `merchantPayment` from `tbl_payment_collections` union all select `tbl_merchant_payment`.`date` AS `date`,NULL AS `orderNo`,'0' AS `orderValue`,'0' AS `returnDelivery`,'0' AS `paymentCollection`,`tbl_merchant_payment`.`total_balance` AS `merchantPayment` from `tbl_merchant_payment` ;

-- --------------------------------------------------------

--
-- Structure for view `view_voucher_approve`
--
DROP TABLE IF EXISTS `view_voucher_approve`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_voucher_approve`  AS  select `tbl_account_transactions`.`id` AS `id`,`tbl_account_transactions`.`voucher_no` AS `voucherNo`,`tbl_account_transactions`.`voucher_type` AS `voucherType`,`tbl_account_transactions`.`narration` AS `narration`,`tbl_account_transactions`.`voucher_date` AS `date`,`tbl_account_transactions`.`credit_amount` AS `amount`,`tbl_account_transactions`.`approve` AS `approve`,`tbl_account_transactions`.`approve_by` AS `approveBy` from `tbl_account_transactions` where `tbl_account_transactions`.`voucher_type` = 'DV' and `tbl_account_transactions`.`debit_amount` = 0 union all select `tbl_account_transactions`.`id` AS `id`,`tbl_account_transactions`.`voucher_no` AS `voucherNo`,`tbl_account_transactions`.`voucher_type` AS `voucherType`,`tbl_account_transactions`.`narration` AS `narration`,`tbl_account_transactions`.`voucher_date` AS `date`,`tbl_account_transactions`.`debit_amount` AS `amount`,`tbl_account_transactions`.`approve` AS `approve`,`tbl_account_transactions`.`approve_by` AS `approveBy` from `tbl_account_transactions` where `tbl_account_transactions`.`voucher_type` = 'CV' and `tbl_account_transactions`.`credit_amount` = 0 union all select `tbl_account_transactions`.`id` AS `id`,`tbl_account_transactions`.`voucher_no` AS `voucherNo`,`tbl_account_transactions`.`voucher_type` AS `voucherType`,`tbl_account_transactions`.`narration` AS `narration`,`tbl_account_transactions`.`voucher_date` AS `date`,sum(`tbl_account_transactions`.`debit_amount`) AS `amount`,`tbl_account_transactions`.`approve` AS `approve`,`tbl_account_transactions`.`approve_by` AS `approveBy` from `tbl_account_transactions` where `tbl_account_transactions`.`voucher_type` = 'JV' group by `tbl_account_transactions`.`voucher_no` union all select `tbl_account_transactions`.`id` AS `id`,`tbl_account_transactions`.`voucher_no` AS `voucherNo`,`tbl_account_transactions`.`voucher_type` AS `voucherType`,`tbl_account_transactions`.`narration` AS `narration`,`tbl_account_transactions`.`voucher_date` AS `date`,sum(`tbl_account_transactions`.`debit_amount`) AS `amount`,`tbl_account_transactions`.`approve` AS `approve`,`tbl_account_transactions`.`approve_by` AS `approveBy` from `tbl_account_transactions` where `tbl_account_transactions`.`voucher_type` = 'OB' group by `tbl_account_transactions`.`voucher_no` order by `voucherNo` ;

-- --------------------------------------------------------

--
-- Structure for view `view_zones`
--
DROP TABLE IF EXISTS `view_zones`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_zones`  AS  select `tbl_agents`.`id` AS `zone_id`,'Agent' AS `zone_type`,`tbl_agents`.`name` AS `zone_name`,`tbl_agents`.`phone` AS `zone_phone`,`tbl_agents`.`address` AS `zone_address`,`tbl_area`.`name` AS `zone_area`,`tbl_agents`.`area` AS `zone_area_id` from (`tbl_agents` left join `tbl_area` on(`tbl_area`.`id` = `tbl_agents`.`area`)) union all select `tbl_subagents`.`id` AS `zone_id`,'Subagent' AS `zone_type`,`tbl_subagents`.`name` AS `zone_name`,`tbl_subagents`.`phone` AS `zone_phone`,`tbl_subagents`.`address` AS `zone_address`,`tbl_area`.`name` AS `zone_area`,`tbl_agents`.`area` AS `zone_area_id` from ((`tbl_subagents` left join `tbl_agents` on(`tbl_agents`.`id` = `tbl_subagents`.`agent_id`)) left join `tbl_area` on(`tbl_area`.`id` = `tbl_agents`.`area`)) ;

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
-- Indexes for table `tbl_account_transactions`
--
ALTER TABLE `tbl_account_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_panel_information`
--
ALTER TABLE `tbl_admin_panel_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_agents`
--
ALTER TABLE `tbl_agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_area`
--
ALTER TABLE `tbl_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_booking_orders`
--
ALTER TABLE `tbl_booking_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_charge_for_clients`
--
ALTER TABLE `tbl_charge_for_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_charge_for_delivery_men`
--
ALTER TABLE `tbl_charge_for_delivery_men`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_charge_for_merchants`
--
ALTER TABLE `tbl_charge_for_merchants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_clients`
--
ALTER TABLE `tbl_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_coa`
--
ALTER TABLE `tbl_coa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact_us`
--
ALTER TABLE `tbl_contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_delivery_man_payments`
--
ALTER TABLE `tbl_delivery_man_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_delivery_man_payment_lists`
--
ALTER TABLE `tbl_delivery_man_payment_lists`
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
-- Indexes for table `tbl_hubs`
--
ALTER TABLE `tbl_hubs`
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
-- Indexes for table `tbl_merchant_payment`
--
ALTER TABLE `tbl_merchant_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_merchant_payment_lists`
--
ALTER TABLE `tbl_merchant_payment_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment_collections`
--
ALTER TABLE `tbl_payment_collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment_collection_lists`
--
ALTER TABLE `tbl_payment_collection_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_service_charges`
--
ALTER TABLE `tbl_service_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_service_types`
--
ALTER TABLE `tbl_service_types`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

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
-- AUTO_INCREMENT for table `tbl_account_transactions`
--
ALTER TABLE `tbl_account_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `tbl_admin_panel_information`
--
ALTER TABLE `tbl_admin_panel_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_agents`
--
ALTER TABLE `tbl_agents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_area`
--
ALTER TABLE `tbl_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tbl_booking_orders`
--
ALTER TABLE `tbl_booking_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_charge_for_clients`
--
ALTER TABLE `tbl_charge_for_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_charge_for_delivery_men`
--
ALTER TABLE `tbl_charge_for_delivery_men`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_charge_for_merchants`
--
ALTER TABLE `tbl_charge_for_merchants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_clients`
--
ALTER TABLE `tbl_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_coa`
--
ALTER TABLE `tbl_coa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `tbl_contact_us`
--
ALTER TABLE `tbl_contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_delivery_man_payments`
--
ALTER TABLE `tbl_delivery_man_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_delivery_man_payment_lists`
--
ALTER TABLE `tbl_delivery_man_payment_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbl_delivery_men`
--
ALTER TABLE `tbl_delivery_men`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_delivery_types`
--
ALTER TABLE `tbl_delivery_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_districts`
--
ALTER TABLE `tbl_districts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tbl_frontend_menu`
--
ALTER TABLE `tbl_frontend_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_hubs`
--
ALTER TABLE `tbl_hubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_marchants`
--
ALTER TABLE `tbl_marchants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_menus`
--
ALTER TABLE `tbl_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `tbl_menu_actions`
--
ALTER TABLE `tbl_menu_actions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `tbl_menu_action_type`
--
ALTER TABLE `tbl_menu_action_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_merchant_payment`
--
ALTER TABLE `tbl_merchant_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_merchant_payment_lists`
--
ALTER TABLE `tbl_merchant_payment_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_payment_collections`
--
ALTER TABLE `tbl_payment_collections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_payment_collection_lists`
--
ALTER TABLE `tbl_payment_collection_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_service_charges`
--
ALTER TABLE `tbl_service_charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_service_types`
--
ALTER TABLE `tbl_service_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
