-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 28, 2024 at 02:32 PM
-- Server version: 8.0.40
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nithitec_ggcc`
--

-- --------------------------------------------------------

--
-- Table structure for table `advancecash_loan`
--

CREATE TABLE `advancecash_loan` (
  `id` int NOT NULL,
  `employee_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `advancecash_date` date NOT NULL,
  `advancecash_amount` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `remarks` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `delete_status` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `advancecash_loan`
--

INSERT INTO `advancecash_loan` (`id`, `employee_id`, `advancecash_date`, `advancecash_amount`, `remarks`, `type`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '1', '2024-11-27', '1000000', 'LOAN', 'thirdparty', 0, 1, '2024-11-26 13:47:36', 0, NULL),
(2, '21', '2024-11-27', '10000', 'LAND', 'employee', 1, 1, '2024-12-04 11:18:25', 1, '2024-11-26 19:21:01'),
(3, '21', '2024-11-28', '10000', 'GOLD', 'employee', 1, 1, '2024-12-04 11:18:20', 1, '2024-11-26 19:20:49'),
(4, '2', '2024-11-27', '30000', 'INDORE SCRAB', 'thirdparty', 0, 1, '2024-11-27 10:28:55', 0, NULL),
(5, '2', '2024-11-29', '9000', 'vashi', 'thirdparty', 0, 1, '2024-11-29 06:18:17', 0, NULL),
(6, '3', '2024-12-04', '1000', '', 'employee', 1, 1, '2024-12-04 11:18:49', 0, NULL),
(7, '44', '2024-12-04', '20000', '10000/- SALARY \r\n10000/- TRF FROM VAIBHAV', 'employee', 0, 1, '2024-12-05 07:25:34', 1, '2024-12-05 07:25:34'),
(8, '23', '2024-12-04', '13500', 'NEW MOBILE', 'employee', 1, 1, '2024-12-04 11:21:35', 0, NULL),
(9, '31', '2024-12-04', '12000', 'NEW MOBILE', 'employee', 0, 1, '2024-12-04 05:47:40', 0, NULL),
(10, '23', '2024-11-29', '25000', 'OP.  BALANCE', 'employee', 0, 1, '2024-12-04 11:21:25', 1, '2024-12-04 11:21:25'),
(11, '23', '2024-12-04', '13500', 'NEW MOBILE', 'employee', 0, 1, '2024-12-04 05:52:09', 0, NULL),
(12, '14', '2024-12-09', '165000', 'Loan Opening Balance on December 2024', 'employee', 0, 1, '2024-12-09 09:52:29', 0, NULL),
(13, '20', '2024-12-09', '195000', 'Loan Opening Balance On December 2024', 'employee', 0, 1, '2024-12-09 09:53:32', 0, NULL),
(14, '50', '2024-12-09', '160000', 'Loan Opening Balance On December 2024', 'employee', 0, 1, '2024-12-09 09:54:08', 0, NULL),
(15, '16', '2024-12-09', '170000', 'Loan Opening Balance On December 2024', 'employee', 0, 1, '2024-12-09 09:54:34', 0, NULL),
(16, '22', '2024-12-09', '210000', 'Loan Opening Balance On December 2024', 'employee', 0, 1, '2024-12-09 09:55:30', 0, NULL),
(17, '6', '2024-12-09', '170000', 'Loan Opening Balance On December 2024', 'employee', 0, 1, '2024-12-09 09:56:04', 0, NULL),
(18, '3', '2024-12-09', '135000', 'Loan Opening Balance On December 2024', 'thirdparty', 0, 1, '2024-12-09 09:58:13', 0, NULL),
(19, '10', '2024-12-09', '49000', 'Loan Opening Balance On December 2024', 'employee', 0, 1, '2024-12-09 09:59:21', 0, NULL),
(20, '13', '2024-12-09', '35000', 'Loan Opening Balance On December 2024', 'employee', 0, 1, '2024-12-09 09:59:54', 0, NULL),
(21, '36', '2024-12-09', '20000', 'Loan Opening Balance On December 2024', 'employee', 0, 1, '2024-12-09 10:00:29', 0, NULL),
(22, '4', '2024-12-09', '70000', 'OPENING BALANCE AS ON DECEMBER 2024', 'employee', 0, 1, '2024-12-09 10:10:54', 0, NULL),
(23, '32', '2024-12-09', '10000', 'OPENING BALANCE AS ON DECEMBER 2024', 'employee', 0, 1, '2024-12-09 10:11:28', 0, NULL),
(24, '24', '2024-12-09', '200000', 'OPENING BALANCE AS ON DECEMBER 2024', 'employee', 0, 1, '2024-12-09 10:12:29', 0, NULL),
(25, '39', '2024-12-09', '5000', 'OPENING BALANCE AS ON DECEMBER 2024', 'employee', 0, 1, '2024-12-09 10:14:50', 0, NULL),
(26, '37', '2024-12-09', '20000', 'OPENING BALANCE AS ON DECEMBER 2024', 'employee', 0, 1, '2024-12-09 10:15:20', 0, NULL),
(27, '9', '2024-12-09', '15000', 'OPENING BALANCE AS ON DECEMBER 2024', 'employee', 0, 1, '2024-12-09 10:15:52', 0, NULL),
(28, '29', '2024-12-09', '10000', 'OPENING BALANCE AS ON DECEMBER 2024', 'employee', 0, 1, '2024-12-09 10:16:29', 0, NULL),
(29, '5', '2024-12-09', '50000', 'OPENING BALANCE AS ON DECEMBER 2024', 'employee', 0, 1, '2024-12-09 10:16:56', 0, NULL),
(30, '21', '2024-12-09', '5000', 'OPENING BALANCE AS ON DECEMBER 2024', 'employee', 0, 1, '2024-12-09 10:17:47', 0, NULL),
(31, '19', '2024-12-09', '30000', 'OPENING BALANCE AS ON DECEMBER 2024', 'employee', 0, 1, '2024-12-09 10:18:17', 0, NULL),
(32, '45', '2024-12-09', '15000', 'OPENING BALANCE AS ON DECEMBER 2024', 'employee', 0, 1, '2024-12-09 10:22:38', 0, NULL),
(33, '8', '2024-12-09', '20000', 'OPENING BALANCE AS ON DECEMBER 2024', 'employee', 0, 1, '2024-12-09 10:23:25', 0, NULL),
(34, '43', '2024-12-09', '35000', 'OPENING BALANCE AS ON DECEMBER 2024', 'employee', 0, 1, '2024-12-09 10:26:52', 0, NULL),
(35, '12', '2024-12-09', '9000', 'OPENING BALANCE AS ON DECEMBER 2024', 'employee', 0, 1, '2024-12-09 10:30:45', 0, NULL),
(36, '41', '2024-12-09', '5000', 'OPENING BALANCE AS ON DECEMBER 2024', 'employee', 0, 1, '2024-12-09 10:32:24', 0, NULL),
(37, '28', '2024-12-09', '10000', 'OPENING BALANCE AS ON DECEMBER 2024', 'employee', 0, 1, '2024-12-09 10:34:21', 0, NULL),
(38, '4', '2024-12-09', '105000', 'OPENING BALANCE AS ON DECEMBER 2024', 'thirdparty', 0, 1, '2024-12-09 10:40:18', 0, NULL),
(39, '5', '2024-12-09', '30000', 'OPENING BALANCE AS ON DECEMBER 2024', 'thirdparty', 0, 1, '2024-12-09 10:40:40', 0, NULL),
(40, '6', '2024-12-09', '15000', 'OPENING BALANCE AS ON DECEMBER 2024', 'thirdparty', 0, 1, '2024-12-09 10:41:02', 0, NULL),
(41, '58', '2024-12-09', '406000', 'OPENING BALANCE AS ON DECEMBER 2024\r\n', 'employee', 0, 1, '2024-12-09 10:42:04', 0, NULL),
(42, '58', '2024-12-12', '20000', 'BANK TRANSFER', 'employee', 0, 1, '2024-12-12 09:07:02', 0, NULL),
(43, '48', '2024-12-17', '20000', 'LOAN AMOUNT TRANSFER FROM KESHREE', 'employee', 0, 1, '2024-12-18 06:24:37', 0, NULL),
(44, '52', '2024-12-17', '30000', 'LOAN AMOUNT TRANSFER FROM KESHREE', 'employee', 0, 1, '2024-12-18 06:25:05', 0, NULL),
(45, '3', '2024-12-19', '10000', 'MOBILE', 'employee', 1, 1, '2024-12-24 10:06:16', 1, '2024-12-24 10:05:24'),
(46, '24', '2024-12-21', '50000', 'CASH PAID RAJAN', 'employee', 0, 1, '2024-12-21 23:33:50', 0, NULL),
(47, '24', '2024-12-22', '50000', 'LOAN TAKEN BY CASH', 'employee', 1, 3, '2024-12-23 06:38:35', 0, NULL),
(48, '3', '2024-12-04', '7000', 'MOBILE', 'employee', 0, 1, '2024-12-24 04:42:30', 0, NULL),
(49, '7', '2024-12-28', '10000', '', 'thirdparty', 0, 1, '2024-12-28 06:03:38', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `advancecash_received`
--

CREATE TABLE `advancecash_received` (
  `id` int NOT NULL,
  `employee_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `received_date` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `received_amount` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `delete_status` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `advancecash_received`
--

INSERT INTO `advancecash_received` (`id`, `employee_id`, `received_date`, `received_amount`, `type`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '21', '2024-11-27', '1000', 'employee', 1, 1, '2024-12-09 15:49:16', 0, NULL),
(2, '21', '2024-11-28', '2000', 'employee', 1, 1, '2024-12-09 15:49:06', 0, NULL),
(3, '23', '2024-11-01', '0', 'employee', 0, 1, '2024-12-05 01:17:53', 0, NULL),
(4, '3', '2024-12-23', '7000', 'employee', 0, 1, '2024-12-23 09:50:08', 0, NULL),
(5, '3', '2024-12-23', '7000', 'employee', 1, 1, '2024-12-24 10:12:59', 0, NULL),
(6, '3', '2024-12-23', '10000', 'employee', 1, 1, '2024-12-24 10:12:51', 0, NULL),
(7, '6', '2024-12-25', '15000', 'thirdparty', 0, 1, '2024-12-28 06:04:49', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branch_pettycash`
--

CREATE TABLE `branch_pettycash` (
  `id` int NOT NULL,
  `month` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `year` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `paid_date` date NOT NULL,
  `branch` int NOT NULL,
  `title` int NOT NULL,
  `amount` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `remarks` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('not_paid','paid') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'not_paid',
  `delete_status` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch_pettycash`
--

INSERT INTO `branch_pettycash` (`id`, `month`, `year`, `paid_date`, `branch`, `title`, `amount`, `remarks`, `status`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'december', '2024', '2024-12-26', 10, 4, '1000', 'V#5655 Servicing', 'not_paid', 0, 1, '2024-12-26 05:24:19', 0, NULL),
(2, 'december', '2024', '2024-12-26', 6, 1, '1000', 'Fuel', 'not_paid', 0, 1, '2024-12-26 05:28:19', 0, NULL),
(3, 'january', '2024', '2025-01-01', 6, 1, '1000', 'Fuel', 'not_paid', 1, 1, '2024-12-28 11:41:57', 0, NULL),
(4, 'december', '2024', '2024-12-26', 6, 1, '1000', '', 'not_paid', 0, 1, '2024-12-26 06:10:22', 0, NULL),
(5, 'january', '2024', '2025-01-02', 11, 1, '1000', '', 'not_paid', 1, 1, '2024-12-28 11:41:36', 0, NULL),
(6, 'december', '2024', '2024-12-28', 11, 1, '1000', '', 'not_paid', 1, 1, '2024-12-28 13:53:03', 0, NULL),
(7, 'december', '2024', '2024-12-28', 1, 1, '1000', '', 'not_paid', 0, 1, '2024-12-28 08:16:27', 0, NULL),
(8, 'december', '2024', '2024-12-28', 11, 3, '10000', '', 'not_paid', 1, 1, '2024-12-28 13:53:07', 0, NULL),
(9, 'december', '2024', '2024-12-28', 11, 1, '2000', '', 'not_paid', 1, 1, '2024-12-28 13:53:12', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int NOT NULL,
  `sno` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `zone` varchar(100) NOT NULL,
  `branch` varchar(350) NOT NULL,
  `work_type` varchar(100) NOT NULL,
  `assign_to` varchar(250) NOT NULL,
  `complainter_name` varchar(250) NOT NULL,
  `complainter_number` varchar(50) NOT NULL,
  `outlet_name` varchar(250) NOT NULL,
  `outlet_location` varchar(350) NOT NULL,
  `contact_name` varchar(250) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `outlet_id` int NOT NULL,
  `old_outlet_name` varchar(250) NOT NULL,
  `old_outlet_location` varchar(350) NOT NULL,
  `old_contact_name` varchar(250) NOT NULL,
  `old_contact_number` varchar(50) NOT NULL,
  `description` longtext NOT NULL,
  `job_remarks` text NOT NULL,
  `job_report` text NOT NULL,
  `checking_date` date DEFAULT NULL,
  `renewal_date` date DEFAULT NULL,
  `earthing_report` text NOT NULL,
  `status` enum('not_started','inprogress','completed') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `outlet_exists` int NOT NULL,
  `delete_status` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `sno`, `date`, `zone`, `branch`, `work_type`, `assign_to`, `complainter_name`, `complainter_number`, `outlet_name`, `outlet_location`, `contact_name`, `contact_number`, `outlet_id`, `old_outlet_name`, `old_outlet_location`, `old_contact_name`, `old_contact_number`, `description`, `job_remarks`, `job_report`, `checking_date`, `renewal_date`, `earthing_report`, `status`, `outlet_exists`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '24/00001', '2024-11-10', 'mumbai', '3', 'maintenance', 'VAIBHAV VINAYAK NADKARNI', 'RAJAN', '9920667756', 'GURUKRIPA AUTO SERVICE', 'SANPADA', '', '', 1, '', '', '', '', 'EARTHPIT TESTONG', '', '', NULL, NULL, '', 'inprogress', 1, 0, 1, '2024-11-10 08:05:40', 0, NULL),
(2, '24/00002', '2024-11-10', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'RAJAN', '9920667756', 'SRI BALAKUMARRAN AGENCY', 'PEELEMEDU', '', '', 2, '', '', '', '', 'RVI Light Reparing', 'work completed', './uploads/job_letter/c4a75ff9-98dc-44db-8e63-d316d984ad01241114095537.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 1, '2024-11-10 08:21:57', 0, NULL),
(3, '24/00003', '2024-11-10', 'chennai', '8', 'maintenance', 'J.Charles', 'RAJAN', '9920667756', 'AJAY FUELS', 'LALUGAPURAM', '', '', 3, '', '', '', '', 'SAFTY VISIT', 'work completed', './uploads/job_letter/d4072259-494d-4465-8771-4242b9f232b7241114095636.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 1, '2024-11-10 08:23:36', 0, NULL),
(4, '24/00004', '2024-11-10', 'chennai', '7', 'maintenance', 'C Anbujothi', 'RAJAN', '9920667756', 'STD FUELS', 'ARANTHANGI ROAD', '', '', 4, '', '', '', '', 'STP COMPLAINT', 'work completed', './uploads/job_letter/840a33b8-a11c-4122-9f7a-4ff3f8cd721c241114095748.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 1, '2024-11-10 08:26:09', 0, NULL),
(5, '24/00005', '2024-11-10', 'mumbai', '11', 'maintenance', 'BAPU PARSHURAM SHIRODKAR', 'RAJAN', '9920667756', 'BABA PETROLEUM', 'VALSAD', '', '', 5, '', '', '', '', 'CANOPY LIGHT REPARING', '', '', NULL, NULL, '', 'inprogress', 1, 0, 1, '2024-11-10 08:28:12', 0, NULL),
(6, '24/00006', '2024-11-10', 'mumbai', '3', 'maintenance', 'Raghunath S Parida', 'RAJAN', '9920667756', 'VENKATESH AUTOMOBILES', 'DOMBBIVLI', '', '', 6, '', '', '', '', 'EARTHING TESTING', '', '', NULL, NULL, '', 'inprogress', 1, 0, 1, '2024-11-10 08:31:59', 0, NULL),
(7, '24/00007', '2024-11-10', 'indore', '1', 'maintenance', 'Pushpendra Umath', 'RAJAN', '9920667756', 'BALAJI PETRO SERVICES', 'MANDLESHWAR ROAD', '', '', 7, '', '', '', '', 'EARTHPIT TESTING', '', '', NULL, NULL, '', 'inprogress', 1, 0, 1, '2024-11-10 08:35:22', 0, NULL),
(8, '24/00008', '2024-11-10', 'indore', '2', 'maintenance', 'Ranjeet Singh Nanade', 'RAJAN', '9920667756', 'SHRI GANESH PETROLEUM', 'BHOURA', '', '', 8, '', '', '', '', 'AUTOMATION POWER SUPPLY', '', '', NULL, NULL, '', 'inprogress', 1, 0, 1, '2024-11-10 08:39:26', 0, NULL),
(9, '24/00009', '2024-11-10', 'indore', '5', 'maintenance', 'NILESH G SAVRATKAR', 'RAJAN', '9920667756', 'RUDRA PETROLEUM', 'BISANWADA', '', '', 9, '', '', '', '', 'IGBT REPARING', '', '', NULL, NULL, '', 'inprogress', 1, 0, 1, '2024-11-10 08:43:36', 0, NULL),
(10, '24/00010', '2024-11-11', 'chennai', '8', 'earth_renewal', 'J.Charles', 'APPU', '9363174843', 'EAGLE AUTOMOTIVE', 'PANANKULAM ', '', '', 10, '', '', '', '', 'EARTH PIT RENEWAL ', 'RENEW WORK COMPLETED', './uploads/job_letter/d45d8df9-d46d-4ddf-831d-3ca7cf003347241111081832.jpg', '2024-11-11', '2025-05-10', './uploads/earthing_report/15664520_mshsdeagleautomotive_11nov_unsigned241111081832.pdf', 'completed', 1, 0, 40, '2024-11-11 02:39:57', 0, NULL),
(11, '24/00011', '2024-11-11', 'mumbai', '3', 'maintenance', 'Raghunath S Parida', 'RAJAN', '123', '', '', '', '', 1, 'GURUKRIPA AUTO SERVICE', 'SANPADA', '', '', 'TEST', '', '', NULL, NULL, '', 'inprogress', 0, 0, 40, '2024-11-11 03:04:15', 0, NULL),
(12, '24/00012', '2024-11-12', 'chennai', '8', 'earth_renewal', 'J.Charles', 'APPU', '9363174843', 'SAVI TRANSPORT & EARTH MOVERS ', 'PANAGIDI', '', '', 11, '', '', '', '', 'EARTH RENEWAL ', 'RENEW WORK COMPLETED', './uploads/job_letter/af3c7411-9666-4004-b4c0-327397f1bf3f241114095931.jpg', '2024-11-12', '2025-05-11', './uploads/earthing_report/15939210_savtransports&earthmovers,madurai,15939210_12nov_unsigned241114095931.pdf', 'completed', 1, 0, 40, '2024-11-12 06:56:44', 0, NULL),
(13, '24/00013', '2024-11-12', 'chennai', '8', 'earth_renewal', 'J.Charles', 'APPU', '9363174843', 'JK FUEL SERVICE', 'VALLIYUR', '', '', 12, '', '', '', '', 'EARTH RENEWAL ', 'RENEW WORK COMPLETED', './uploads/job_letter/1a7c90e9-8da2-415a-b995-70cf46344d11241114100105.jpg', '2024-11-12', '2025-05-11', './uploads/earthing_report/15790010_mshsdj.k.fuelservice_12nov_unsigned241114100105.pdf', 'completed', 1, 0, 40, '2024-11-12 06:58:29', 0, NULL),
(14, '24/00014', '2024-11-12', 'chennai', '8', 'earth_renewal', 'J.Charles', 'APPU', '9363174843', 'SHANKAR AGENCIES ', 'KAVALKINARU', '', '', 13, '', '', '', '', 'EARTH RENEWAL ', 'RENEW WORK COMPLETED', './uploads/job_letter/8bfcc318-2cbf-4ee1-98c8-04b5fa2a3286241114100157.jpg', '2024-11-12', '2025-05-11', './uploads/earthing_report/12882110_mshsdshankaragencies_12nov_unsigned241114100157.pdf', 'completed', 1, 0, 40, '2024-11-12 07:00:34', 0, NULL),
(15, '24/00015', '2024-11-12', 'chennai', '9', 'earth_renewal', 'G Joseph Margasis', 'APPU', '9363174843', 'SRIRAM AGENCY ', 'THEETHIPALAYAM', '', '', 14, '', '', '', '', 'EARTH RENEWAL ', 'work completed', './uploads/job_letter/59983217-1b05-442c-abd0-d1fad2ed7dc7241113072840.jpg', '2024-11-12', '2025-05-11', './uploads/earthing_report/15395010_mshsdsairamagency_12nov_unsigned241113072840.pdf', 'completed', 1, 0, 40, '2024-11-12 07:03:35', 0, NULL),
(16, '24/00016', '2024-11-12', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', 'CP MARTHACHALAM & CO', 'THADAGAM ROAD', '', '', 15, '', '', '', '', 'AUTOMATION SYSTEM REMOVING ', 'work completed', './uploads/job_letter/fad1350b-d860-4fe2-80c9-0f7f75198b9c241113125608.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-11-12 07:05:11', 0, NULL),
(17, '24/00017', '2024-11-12', 'chennai', '9', 'earth_renewal', 'G Joseph Margasis', 'APPU', '9363174843', 'SRI SARAVANA AGENCIES', 'VADAVALLI ', '', '', 16, '', '', '', '', 'EARTH RENEWAL ', '', '', NULL, NULL, '', 'inprogress', 0, 0, 40, '2024-11-12 07:06:28', 1, '2024-11-30 16:46:00'),
(18, '24/00018', '2024-11-12', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', 'RV AGENCY ', 'GANAPATHI', '', '', 17, '', '', '', '', 'CVT COMPLAINT ', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-12 07:12:03', 0, NULL),
(19, '24/00019', '2024-11-12', 'chennai', '9', 'earth_renewal', 'G Joseph Margasis', 'APPU', '9363174843', 'BALAJI SERVICE SATION ', 'IDIKARAI', '', '', 18, '', '', '', '', 'EARTH RENEWAL ', 'RENEW WORK COMPLETED', './uploads/job_letter/2b00f445-4944-4ead-b768-34fc540774d3241113125517.jpg', '2024-11-12', '2025-05-11', './uploads/earthing_report/untitled241113125517.pdf', 'completed', 1, 0, 40, '2024-11-12 07:13:25', 0, NULL),
(20, '24/00020', '2024-11-12', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'SRI KRISHNA AGENCIES ', 'ORATHANADU ', '', '', 19, '', '', '', '', 'CANOPY LIGHT REPAIRING ', 'work completed', './uploads/job_letter/e6be65c5-8e64-44a0-b736-55c93226edbd241114100338.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-11-12 07:15:16', 0, NULL),
(21, '24/00021', '2024-11-12', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'TAMIL ENIYAA FUEL STATION ', 'ARIMALAM', '', '', 20, '', '', '', '', 'ELECTRICAL COMLAINT ', 'work completed', './uploads/job_letter/b74e1d22-e951-4df0-bb66-3e8406336a61241114100241.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-11-12 07:17:22', 0, NULL),
(22, '24/00022', '2024-11-13', 'chennai', '9', 'earth_renewal', 'G Joseph Margasis', 'APPU', '9363174843', '', '', '', '', 17, 'RV AGENCY ', 'GANAPATHI', '', '', 'EARTH RENEWAL', 'RENEW WORK COMPLETED', './uploads/job_letter/db2db144-62e4-40c8-aeab-43e69c3180ba241113125311.jpg', '2024-11-13', '2025-05-12', './uploads/earthing_report/15344510_mshsdsrirvagency_13nov_signed(1)241113125311.pdf', 'completed', 0, 0, 40, '2024-11-13 06:20:11', 0, NULL),
(23, '24/00023', '2024-11-13', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', 'TRIVIKRAMMA AGENCIES', 'KK CHAVADI ', '', '', 21, '', '', '', '', 'PRINTER ISSUE', 'work completed', './uploads/job_letter/efbb9b09-306f-433f-99bf-3db9805b0a89241113125122.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-11-13 06:21:34', 0, NULL),
(24, '24/00024', '2024-11-13', 'chennai', '9', 'earth_renewal', 'G Joseph Margasis', 'APPU', '9363174843', 'KARAMADAI LORRY OWNERS ASSOCIATION', 'KARAMADAI', '', '', 22, '', '', '', '', 'EARTH RENEWAL', 'RENEW WORK COMPLETED', './uploads/job_letter/dfd64e42-8373-496c-b966-8c673492551a241114101753.jpg', '2024-11-13', '2025-05-12', './uploads/earthing_report/12898010_mshsdkaramadailorryownersasson,12898010_13nov_signed-1241114101753.pdf', 'completed', 1, 0, 40, '2024-11-13 06:23:43', 0, NULL),
(25, '24/00025', '2024-11-13', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'PLA AGENCIES ADHOC ', 'ALANGUDI', '', '', 23, '', '', '', '', 'LIGHT REPAIRING', 'RENEW WORK COMPLETED', './uploads/job_letter/44486f3e-b917-4689-9559-4d5e64a60c8f241114101059.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-11-13 06:27:23', 0, NULL),
(26, '24/00026', '2024-11-13', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'SIVARAMAN & CO', 'THANJAVUR', '', '', 24, '', '', '', '', 'RVI REPAIRING ', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-13 06:28:44', 0, NULL),
(27, '24/00027', '2024-11-13', 'chennai', '8', 'earth_renewal', 'J.Charles', 'APPU', '9363174843', 'HOGAN FUELS', 'ARALVAIMOZHI', '', '', 25, '', '', '', '', 'EARTH RENEWAL', 'RENEW WORK COMPLETED', './uploads/job_letter/a59274bd-662a-4b21-96eb-fe6e4d1eef7b241114100754.jpg', '2024-11-13', '2025-05-12', './uploads/earthing_report/15943910_mshsdhoganfuels_13nov_unsigned241114100754.pdf', 'completed', 1, 0, 40, '2024-11-13 06:32:05', 0, NULL),
(28, '24/00028', '2024-11-13', 'chennai', '8', 'earth_renewal', 'J.Charles', 'APPU', '9363174843', 'G. JOHNSLY MOSES PETROLEUM ', 'KALIANKADU', '', '', 26, '', '', '', '', 'EARTH RENEWAL ', 'RENEW WORK COMPLETED', './uploads/job_letter/69d7a227-f6bf-49fc-ae9e-6077f5434b15241114100723.jpg', '2024-11-13', '2025-05-12', './uploads/earthing_report/12858310_johnslymoses,12858310_13nov_unsigned241114100723.pdf', 'completed', 1, 0, 40, '2024-11-13 06:58:29', 0, NULL),
(29, '24/00029', '2024-11-13', 'chennai', '8', 'earth_renewal', 'J.Charles', 'APPU', '9363174843', 'D. SANKAR & CO ', 'RAMAVARMAPURAM ', '', '', 27, '', '', '', '', 'EARTH RENEWAL ', 'RENEW WORK COMPLETED', './uploads/job_letter/8bfcc318-2cbf-4ee1-98c8-04b5fa2a3286241114100641.jpg', '2024-11-13', '2025-05-12', './uploads/earthing_report/12882110_mshsdshankaragencies_12nov_unsigned241114100641.pdf', 'completed', 1, 0, 40, '2024-11-13 06:59:46', 0, NULL),
(30, '24/00030', '2024-11-14', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', '', '', '', '', 15, 'CP MARTHACHALAM & CO', 'THADAGAM ROAD', '', '', 'ELECTRICAL COMPLAINT ', 'work completed', './uploads/job_letter/657c99bd-fbab-41c4-b149-90ff9ddcdf0f241115054851.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-11-14 06:05:11', 0, NULL),
(31, '24/00031', '2024-11-14', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', '', '', '', '', 21, 'TRIVIKRAMMA AGENCIES', 'KK CHAVADI ', '', '', 'ELECTRICAL COMPLAINT ', 'work completed', './uploads/job_letter/96e93fcd-20ed-484f-ba1b-6b2762b4a9bb241115054918.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-11-14 06:07:02', 0, NULL),
(32, '24/00032', '2024-11-14', 'chennai', '9', 'project_work', 'G Joseph Margasis', 'APPU', '9363174843', 'AGNI BALAJI AGENCIES ', 'POLLACHI ', '', '', 28, '', '', '', '', 'NEW PANEL INSTALLATION ', 'work completed', './uploads/job_letter/b1c2c911-78ca-4c0c-a093-eec612d986ec241116103816.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-11-14 06:08:41', 0, NULL),
(33, '24/00033', '2024-11-14', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'SIVARAMAN & CO ', 'VALLAM ROAD', '', '', 24, 'SIVARAMAN & CO', 'THANJAVUR', '', '', 'ELECTRICAL ISSUE', '', '', NULL, NULL, '', 'inprogress', 0, 0, 40, '2024-11-14 06:12:22', 0, NULL),
(34, '24/00034', '2024-11-14', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'SRI JAYAM AGENCY ADHOC ', 'ORATHANADU ', '', '', 29, '', '', '', '', 'STP COMPLAINT ', 'work completed', './uploads/job_letter/2a2de1d3-4023-43c1-b87c-133c2e4e0195241115055046.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-11-14 06:17:54', 0, NULL),
(35, '24/00035', '2024-11-14', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'ANGARAJULU NAIDU & SONS', 'ADIRAMAPATTINAM ', '', '', 30, '', '', '', '', 'LOAD SHARING', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-14 06:20:52', 0, NULL),
(36, '24/00036', '2024-11-15', 'chennai', '9', 'earth_renewal', 'G Joseph Margasis', 'APPU', '9363174843', 'THE COIMBATORE DISTRICT CONSUMERS CO -OP ', 'RS PURAM', '', '', 32, '', '', '', '', 'EARTH RENEWAL', 'RENEW WORK COMPLETED', './uploads/job_letter/e40eb63f-ae23-436b-8a27-05a539958f63241116104138.jpg', '2024-11-15', '2025-05-14', './uploads/earthing_report/15439010_mshsdchinthamanicopsupermarketfuels_15nov_unsigned241116104138.pdf', 'completed', 1, 0, 40, '2024-11-15 07:09:56', 0, NULL),
(37, '24/00037', '2024-11-15', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'SREE RAJARAJESHWARI ENTERPRISES', 'THARUVAI', '', '', 33, '', '', '', '', 'ELECTRICAL COMPLAINT', 'work completed', './uploads/job_letter/4b22c0d0-8ba1-4ef0-8578-6640e6e4df46241116103929.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-11-15 07:12:19', 0, NULL),
(38, '24/00038', '2024-11-15', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'RAMANI AGENCIES', 'KISHNAPURAM', '', '', 34, '', '', '', '', 'STP COMPLAINT', 'work completed', './uploads/job_letter/d0fcfe00-abbc-4cf4-9806-2e4362cfbf95241116103905.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-11-15 07:13:46', 0, NULL),
(39, '24/00039', '2024-11-16', 'chennai', '9', 'earth_renewal', 'G Joseph Margasis', 'APPU', '9363174843', 'JAI SAI RAJ FUEL FIL', 'ANNUR', '', '', 36, '', '', '', '', 'EARTH RENEWAL ', 'RENEW WORK COMPLETED', './uploads/job_letter/3b9a6474-6e91-45c2-822e-ddf64cfeec4b241120092926.jpg', '2024-11-16', '2025-05-15', './uploads/earthing_report/doc-20241116-wa0021.241120092926.pdf', 'completed', 1, 0, 40, '2024-11-16 05:13:56', 0, NULL),
(40, '24/00040', '2024-11-16', 'chennai', '9', 'earth_renewal', 'G Joseph Margasis', 'APPU', '9363174843', 'POOVIYA AGENCY ', 'COIMBATORE', '', '', 37, '', '', '', '', 'EARTH RENEWAL ', 'RENEW WORK COMPLETED', './uploads/job_letter/f571d46a-c25e-4bbd-9cd8-4d41869bcc8c241120093107.jpg', '2024-11-16', '2025-05-15', './uploads/earthing_report/15655210_mshsdpoovyaagency,15655210_16nov_signed-1241120093107.pdf', 'completed', 1, 0, 40, '2024-11-16 05:15:16', 0, NULL),
(41, '24/00041', '2024-11-16', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'IGP PETROLEUM', 'CHITRAMCODE', '', '', 38, '', '', '', '', 'ELECTRICAL COMPLAINT ', 'work completed', './uploads/job_letter/a8fe1315-b8f1-46b3-ba5f-86f19969a7ee241120093152.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-11-16 05:17:55', 0, NULL),
(42, '24/00042', '2024-11-18', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', 'UMA AGENCIES', 'PERIYANAYAKKAN PALAYAM ', '', '', 51, '', '', '', '', 'DU COMPLAINT ', 'work completed', './uploads/job_letter/f80ca116-c18e-41ff-b78c-913d4c6e741e241120093234.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-11-18 07:40:45', 0, NULL),
(43, '24/00043', '2024-11-18', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', 'NARASHIMMAN AGENCIES ', 'PN PUDHUR', '', '', 52, '', '', '', '', 'STP COMPLAINT ', 'work completed', './uploads/job_letter/620be7a3-beaa-45ac-a0c3-6acb34624af7241120093658.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-11-18 07:41:55', 0, NULL),
(44, '24/00044', '2024-11-18', 'chennai', '9', 'earth_renewal', 'G Joseph Margasis', 'APPU', '9363174843', 'S RAMESH & BROS', 'METTUPALAYAM ', '', '', 53, '', '', '', '', 'EARTH RENEWAL', 'work completed', './uploads/job_letter/1bb1df56-af42-47bb-babb-d19e4b4b27df241120093633.jpg', '2024-11-18', '2025-05-17', './uploads/earthing_report/12839510_mshsdsramesh&bros_18nov_unsigned241120093633.pdf', 'completed', 1, 0, 40, '2024-11-18 07:43:49', 0, NULL),
(45, '24/00045', '2024-11-18', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', 'PRSAD & CO', 'UKKADAM', '', '', 54, '', '', '', '', 'ELECTRICAL COMPLAINT ', 'work completed', './uploads/job_letter/3feb7008-f352-443c-9403-9d0620387fc7241120093529.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-11-18 07:45:10', 0, NULL),
(46, '24/00046', '2024-11-18', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', 'RAJKAMAL AGENCIES ', 'METTUPALAYAM ', '', '', 55, '', '', '', '', 'LIGHT REPAIRING', 'work completed', './uploads/job_letter/998727d1-ce27-411d-98a6-bcafe752ae7a241120093500.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-11-18 07:46:19', 0, NULL),
(47, '24/00047', '2024-11-18', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'ARUSHYA FUELS ', 'NARIYUTHU', '', '', 56, '', '', '', '', 'SITE VISIT', 'work completed', './uploads/job_letter/34f9b6de-ee0a-4111-bf3c-30d7fd97b546241120093930.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-11-18 07:48:39', 0, NULL),
(48, '24/00048', '2024-11-18', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'DEVI FUELS ', 'MANOOR', '', '', 57, '', '', '', '', 'SITE VISIT', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-18 07:49:47', 0, NULL),
(49, '24/00049', '2024-11-18', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'INDIRA RAJAN FUELS ', 'KANARPATTI', '', '', 58, '', '', '', '', 'SITE VISIT', 'work completed', './uploads/job_letter/d2811e9c-d5e7-4efc-9833-8b961197c0a6241120094147.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-11-18 07:51:08', 0, NULL),
(50, '24/00050', '2024-11-19', 'chennai', '9', 'earth_renewal', 'G Joseph Margasis', 'APPU', '9363174843', 'SELVAM AGNCIES ', 'METTUPALAYAM ', '', '', 85, '', '', '', '', 'EARTH RENEWAL ', 'RENEW WORK COMPLETED', './uploads/job_letter/b54eee02-4208-4c9e-b8ca-e03faad920b1241120093430.jpg', '2024-11-19', '2025-05-18', './uploads/earthing_report/12869210_mshsdselvamagencies_19nov_unsigned241120093430.pdf', 'completed', 1, 0, 40, '2024-11-19 07:23:34', 0, NULL),
(51, '24/00051', '2024-11-19', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', 'CHAVADI PETROLEUM ', 'BIG BAZAAR STREET ', '', '', 86, '', '', '', '', 'STABILIZER INSTALLATION ', 'work completed', './uploads/job_letter/abd6613c-f950-43f5-a0be-a53232b20e93241120093349.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-11-19 07:24:42', 0, NULL),
(52, '24/00052', '2024-11-19', 'chennai', '9', 'earth_renewal', 'G Joseph Margasis', 'APPU', '9363174843', 'PALANI ANDAVAR AGENCIES', 'PETHIKUTTAI', '', '', 87, '', '', '', '', 'EART RENEWAL ', 'RENEW WORK COMPLETED', './uploads/job_letter/7c56b59c-a6aa-4355-93a5-915bea9e9f1a241120093311.jpg', '2024-11-19', '2025-05-18', './uploads/earthing_report/15140310_mshsdpalaniandavaaragencies_19nov_unsigned-1241120093311.pdf', 'completed', 1, 0, 40, '2024-11-19 07:25:59', 0, NULL),
(53, '24/00053', '2024-11-18', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'APN PETROLEUM ', 'VENKATESWARAPURAM', '', '', 88, '', '', '', '', 'SITE VISIT', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-19 07:28:13', 0, NULL),
(54, '24/00054', '2024-11-18', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'MANIS A1 FUELS ', 'EDAIKAL', '', '', 89, '', '', '', '', 'SITE VISIT', 'work completed', './uploads/job_letter/c2e42d9b-7964-41c6-8864-92d84269779f241120093758.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-11-19 07:29:13', 0, NULL),
(55, '24/00055', '2024-11-16', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'SCS AGENCIES ', 'ARANTHANGI', '', '', 90, '', '', '', '', 'PYLON REPAIRING ', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-20 04:24:15', 0, NULL),
(56, '24/00056', '2024-11-18', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'HP OFFICE', 'TRICHY', '', '', 91, '', '', '', '', 'LIGHT REPAIRING ', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-20 04:25:36', 0, NULL),
(57, '24/00057', '2024-11-19', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'SIRAJ', 'KARANTHAI,THANJAVUR', '', '', 92, '', '', '', '', 'STP COMPLAINT', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-20 04:26:53', 0, NULL),
(58, '24/00058', '2024-11-19', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'KOUSHIK AGENCIES ', 'KABISTHALAM', '', '', 93, '', '', '', '', 'STP COMPLAINT ', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-20 04:28:20', 0, NULL),
(59, '24/00059', '2024-11-19', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'UMA TRADERS ADHOC ', 'TIRUNELVELI', '', '', 94, '', '', '', '', 'SITE VISIT', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-20 04:33:41', 0, NULL),
(60, '24/00060', '2024-11-19', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'SRI PON FUELS ', 'CHITTHARCHARAM', '', '', 95, '', '', '', '', 'SITE VISIT', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-20 04:34:50', 0, NULL),
(61, '24/00061', '2024-11-19', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'SRI SUNDARI ENTERPRISES ', 'DEVARKULAM', '', '', 96, '', '', '', '', 'SITE VISIT', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-20 04:35:50', 0, NULL),
(62, '24/00062', '2024-11-19', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'VALLIYAMMAI FUELS ', 'VANNIKOENDAL ', '', '', 97, '', '', '', '', 'SITE VISIT', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-20 04:37:14', 0, NULL),
(63, '24/00063', '2024-11-19', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'SRI SARAVANA & CO ', 'KEELA KALANGAL', '', '', 98, '', '', '', '', 'SITE VISIT', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-20 04:38:30', 0, NULL),
(64, '24/00064', '2024-11-20', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'GEETH PETROS', 'THIRUVIRUTHANPULLEY', '', '', 99, '', '', '', '', 'ELECTRICAL COMPLAINT ', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-20 04:39:45', 0, NULL),
(65, '24/00065', '2024-11-20', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'SREE RARAJESHWARI ENTERPRISES ', 'THARUVAI', '', '', 100, '', '', '', '', 'ELECTRICAL COMPLAINT ', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-20 04:42:22', 0, NULL),
(66, '24/00066', '2024-11-20', 'chennai', '9', 'earth_renewal', 'G Joseph Margasis', 'APPU', '9363174843', 'SELVA VINAYAGA TRADINGS ', 'KARUMATHAMPATTY', '', '', 101, '', '', '', '', 'EARTH RENEWAL', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-20 04:50:05', 0, NULL),
(67, '24/00067', '2024-11-20', 'chennai', '9', 'earth_renewal', 'G Joseph Margasis', 'APPU', '9363174843', 'SAM PETROLEUM ', 'KARUMATHAMPATTY', '', '', 102, '', '', '', '', 'EARTH RENEWAL ', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-20 04:51:36', 0, NULL),
(68, '24/00068', '2024-11-20', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', 'P MADALAIMUTHU & SONS ', 'COIMBATORE ', '', '', 103, '', '', '', '', 'SITE VISIT', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-20 04:53:23', 0, NULL),
(69, '24/00069', '2024-11-20', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'SIVARAMAN & CO ADHOC ', 'TRICHY', '', '', 104, '', '', '', '', 'ELECTRICAL COMPLAINT ', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-20 05:01:16', 0, NULL),
(70, '24/00070', '2024-11-21', 'chennai', '9', 'earth_renewal', 'G Joseph Margasis', 'APPU', '9363174843', 'SKP PETROLEUM ', 'KADUVETTIPALAYAM ', '', '', 105, '', '', '', '', 'EARTH RENEWAL ', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-21 06:53:41', 0, NULL),
(71, '24/00071', '2024-11-21', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', 'SRT FUELS', 'VADAKKU THOTTAM ', '', '', 106, '', '', '', '', 'AUTOMATION EARTH ISSUE\r\n', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-21 06:54:59', 0, NULL),
(72, '24/00072', '2024-11-21', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', 'ANGAALAMMAN FUELS ', 'VILANKURICHI ', '', '', 107, '', '', '', '', 'RVI REPAIRING', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-21 06:56:22', 0, NULL),
(73, '24/00073', '2024-11-21', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'MARUTHI FUELS', 'SETHUBAVA CHATRAM', '', '', 108, '', '', '', '', 'ELECTRICAL COMPLAINT ', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-21 07:00:28', 0, NULL),
(74, '24/00074', '2024-11-21', 'chennai', '8', 'earth_renewal', 'J.Charles', 'APPU', '9363174843', 'ROHAN PETROLEUM ', 'CHINNAMUTTOM ', '', '', 109, '', '', '', '', 'EARTH RENEWAL ', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-21 07:02:40', 0, NULL),
(75, '24/00075', '2024-11-21', 'chennai', '8', 'earth_renewal', 'J.Charles', 'APPU', '9363174843', 'MARUTHI PETROLEUM ', 'THOVALAI ', '', '', 110, '', '', '', '', 'EARTH RENEWAL ', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-21 07:03:44', 0, NULL),
(76, '24/00076', '2024-11-23', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'SCHEDULED', '8939108991', 'HP AUTO CENTER ,KOLAR ', 'KOLAR ', '', '', 111, '', '', '', '', 'EARTH RENEWEL ', 'WORK COMPLETED', './uploads/job_letter/4b6296b2-7110-4322-827d-196de5b24a4e241123113248.jpg', '2024-11-23', '2025-05-22', './uploads/earthing_report/12686650_mshsdhpautocenterkolar,12686650_23nov_unsigned241123113248.pdf', 'completed', 1, 0, 18, '2024-11-23 06:00:40', 0, NULL),
(77, '24/00077', '2024-11-23', 'indore', '2', 'maintenance', 'Ranjeet Singh Nanade', 'SCHEDULED', '8939108991', 'UNITED SALS & SERVICE STATION ', 'PANJAB BAGH', '', '', 112, '', '', '', '', 'EARTH RENEWEL ', 'WORK COMPLETED', './uploads/job_letter/eaaa3ef8-4539-46d5-a126-c124aa07984e241123113814.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 18, '2024-11-23 06:07:34', 0, NULL),
(78, '24/00078', '2024-11-23', 'indore', '2', 'maintenance', 'Ranjeet Singh Nanade', 'ALLWIN ', '9713450011', 'PANJAB SERVICE STATION ', 'LAL GHATI ', '', '', 113, '', '', '', '', 'WORK COMPLETED \r\n', 'WORK COMPLETED', './uploads/job_letter/1251b352-20c3-4247-aa4c-26bd5ccb9f26241123114119.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 18, '2024-11-23 06:10:00', 0, NULL),
(79, '24/00079', '2024-11-23', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'SCHEDULED', '8939108991', 'AMD PETROLEUM ', 'BARKHEDI KALAN', '', '', 114, '', '', '', '', 'WORK COMPLETED', 'WORK COMPLETED', './uploads/job_letter/8d194b30-798b-4436-8c8a-7adae156ae93241123114451.jpg', '2024-11-23', '2025-05-22', './uploads/earthing_report/12582440_amdpetroleum,12582440_23nov_unsigned241123114451.pdf', 'completed', 1, 0, 18, '2024-11-23 06:13:51', 0, NULL),
(80, '24/00080', '2024-11-23', 'indore', '1', 'earth_renewal', 'Ajay Yadav', 'SCHEDULED', '8939108991', 'SAI AMRUT FUELS ', 'ATAHEDA', '', '', 115, '', '', '', '', 'WORK COMPLETED ', 'WORK COMPLETED ', './uploads/job_letter/92af60a1-a40a-4a75-abfb-5a10e1e16f7f241123114944.jpg', '2024-11-23', '2025-05-22', './uploads/earthing_report/12459850_mshsdsaiamrutfuels_23nov_signed241123114944.pdf', 'completed', 1, 0, 18, '2024-11-23 06:18:25', 0, NULL),
(81, '24/00081', '2024-11-23', 'indore', '1', 'earth_renewal', 'Ajay Yadav', 'SCHEDULED', '8939108991', 'SHRI SAI KALMAL FUELS ', 'HATOD ', '', '', 116, '', '', '', '', 'EARTH RENEWEL ', 'WORK COMPLETED', './uploads/job_letter/322fee44-6684-4971-9e30-748ac3886834241123115257.jpg', '2024-11-23', '2025-05-22', './uploads/earthing_report/12588720_mshsdshrisaikamalfuels,12588720_23nov_unsigned241123115257.pdf', 'completed', 1, 0, 18, '2024-11-23 06:21:27', 0, NULL),
(82, '24/00082', '2024-11-23', 'mumbai', '12', 'maintenance', 'VAIBHAV VINAYAK NADKARNI', 'KISHORE', '8939108991', 'SHREE RADHAKRISHNA PETROLEUM', 'PIMPALGAON KHAMB', '', '', 117, '', '', '', '', 'PCD INSTALLATION ', 'WORK COMPLETED', './uploads/job_letter/7ef42234-1755-4663-9ebb-e539c74c66de241123121636.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 18, '2024-11-23 06:46:08', 0, NULL),
(83, '24/00083', '2024-11-23', 'mumbai', '11', 'project_work', 'BAPU PARSHURAM SHIRODKAR', 'ALLWIN ', '9713450011', 'METHA PETROLEUM ADHOC ', 'VAPI TOWN ', '', '', 118, '', '', '', '', 'KERB WALL PAINTING WORK ', 'WORK COMPLETED', './uploads/job_letter/7e299ac8-9390-4bca-a30a-df6f8d7711ea241123122214.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 18, '2024-11-23 06:51:42', 0, NULL),
(84, '24/00084', '2024-11-22', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'SRI ENTERPRISES ', 'PAVOORCHATRAM', '', '', 119, '', '', '', '', 'SAFETY VISIT', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-23 06:59:33', 0, NULL),
(85, '24/00085', '2024-11-22', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'NARMATHA AGENCIES', 'SURANDAI ', '', '', 120, '', '', '', '', 'SAFETY VISIT', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-23 07:00:38', 0, NULL),
(86, '24/00086', '2024-11-22', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'JANBU ADHOC ', 'TIRUNELVELI', '', '', 121, '', '', '', '', 'SAFETY VISIT', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-23 07:01:41', 0, NULL),
(87, '24/00087', '2024-11-22', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'J PADMA ', 'KADAVUNALLUR', '', '', 122, '', '', '', '', 'SAFETY VISIT', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-23 07:02:27', 0, NULL),
(88, '24/00088', '2024-11-23', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'SS AGENCIES ', 'SIVAGIRI', '', '', 123, '', '', '', '', 'SAFETY VISIT', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-23 07:03:26', 0, NULL),
(89, '24/00089', '2024-11-23', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'PE SAKTHINARAYANAN', 'TIRUNELVELI', '', '', 124, '', '', '', '', 'SAFETY VISIT', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-23 07:04:26', 0, NULL),
(90, '24/00090', '2024-11-23', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'SRI TRUPATHI FUELS ', 'SATHIRAPATTI', '', '', 125, '', '', '', '', 'SAFETY VISIT', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-23 07:05:24', 0, NULL),
(91, '24/00091', '2024-11-23', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'JEYADHANU AGENCIES ', 'TIRUVENGADAM', '', '', 126, '', '', '', '', 'SAFETY VISIT', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-23 07:06:35', 0, NULL),
(92, '24/00092', '2024-11-23', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'SHRI DHANDAYUTHAPANI AGENCIES ', 'KARIVALAMVANDANALLUR', '', '', 127, '', '', '', '', 'SAFETY VISIT', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-23 07:08:11', 0, NULL),
(93, '24/00093', '2024-11-23', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'KUMARAN AGENCIES ', 'SAKRANKOIL', '', '', 128, '', '', '', '', 'SAFETY VISIT', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-23 07:09:13', 0, NULL),
(94, '24/00094', '2024-11-23', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'SRI DHANALAKSHMI OIL & RICE MILLS ', 'SANKARANKOIL', '', '', 129, '', '', '', '', 'SAFETY VISIT', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-23 07:10:21', 0, NULL),
(95, '24/00095', '2024-11-22', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', 'NK ENTERPRISES', 'CHENNI MALAI', '', '', 130, '', '', '', '', 'YARD LIGHT \r\n', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-23 07:20:40', 0, NULL),
(96, '24/00096', '2024-11-23', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', 'TRIVIKRAMMA AGENCIES ', 'KK CHAVADI ', '', '', 21, 'TRIVIKRAMMA AGENCIES', 'KK CHAVADI ', '', '', 'ELECTRICAL COMPLAINT \r\n', '', '', NULL, NULL, '', 'inprogress', 0, 0, 40, '2024-11-23 07:22:32', 0, NULL),
(97, '24/00097', '2024-11-23', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', 'GKP OILS', 'KOVILMEDU PIRIVU ', '', '', 131, '', '', '', '', 'ELECTRICAL COMPLAINT ', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-23 07:23:53', 0, NULL),
(98, '24/00098', '2024-11-25', 'indore', '1', 'earth_renewal', 'P.Allwin', 'RAJAN', '9920667756', 'BETMA FILLING STATION', 'INDORE W', '', '', 132, '', '', '', '', 'EARTH PIT TESTING', '', '', NULL, NULL, '', 'inprogress', 1, 0, 1, '2024-11-25 10:39:32', 0, NULL),
(99, '24/00099', '2024-11-27', 'mumbai', '12', 'maintenance', 'Raghunath S Parida', 'RAJAN', '123', '', '', '', '', 117, 'SHREE RADHAKRISHNA PETROLEUM', 'PIMPALGAON KHAMB', '', '', 'TEST', '', '', NULL, NULL, '', 'inprogress', 0, 0, 1, '2024-11-26 13:08:52', 0, NULL),
(100, '24/00100', '2024-11-29', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'RAJAN', '123', '', '', '', '', 40, ' GAWADE PETROLEUM, ', 'PANDHARPUR', '', '', 'EARTH PIT TESTING', '', '', NULL, NULL, '', 'inprogress', 0, 0, 1, '2024-11-29 02:50:11', 0, NULL),
(101, '24/00101', '2024-11-29', 'mumbai', '3', 'project_work', 'Vaibhav Vinayak Nadkarni', 'rajan', '133', 'ZOJWALLA PETROLEUM', 'KALYAN', '', '', 133, '', '', '', '', 'CNG WORK', 'CABLE', './uploads/job_letter/ganeshavisarajan-620x465[1]241129115556.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 1, '2024-11-29 06:23:54', 0, NULL),
(102, '24/00102', '2024-12-01', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'RAJAN', '123', 'SHIVKRUPA PETROLEUM', 'MACHNUR', 'Solapur', '', 134, '', '', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-01at18.42.44241211062709.jpeg', '2024-12-01', '2025-05-31', './uploads/earthing_report/12175400_mshsdshivkrupapetroleum_01dec_signed241211062709.pdf', 'completed', 1, 0, 1, '2024-12-01 07:45:17', 0, NULL),
(103, '24/00103', '2024-12-01', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'RAJAN', '123', 'Choudhari petroleum', 'Mohal', 'Solapur', '', 135, '', '', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-01at17.34.30241211062237.jpeg', '2024-12-01', '2025-05-31', './uploads/earthing_report/12595120_mshsdchoudharipetroleum_01dec_signed-1241211062237.pdf', 'completed', 1, 0, 1, '2024-12-01 07:48:24', 0, NULL),
(104, '24/00104', '2024-12-01', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'RAJAN', '123', 'AWATADE PETROLEUM', 'Mangalwedha', 'SOLAPUR', '', 136, '', '', '', '', 'Earthpit Testing', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-01at16.05.22241211061950.jpeg', '2024-12-01', '2025-05-31', './uploads/earthing_report/12611020_awtadepetroleum_01dec_unsigned241211061950.pdf', 'completed', 1, 0, 1, '2024-12-01 07:50:57', 0, NULL),
(105, '24/00105', '2024-12-01', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'RAJAN', '123', '', '', '', '', 70, ' HAZARE PETROLEUM', 'PANDHARPUR', '', '', 'EARTHPIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-01at14.19.03241211061801.jpeg', '2024-12-01', '2025-05-31', './uploads/earthing_report/12174440_mshsdhazarepetroleum_01dec_unsigned241211061801.pdf', 'completed', 0, 0, 1, '2024-12-01 07:53:11', 0, NULL),
(106, '24/00106', '2024-12-01', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'RAJAN', '123', '', '', '', '', 74, ' P B PATIL PETROLEUM', 'PANDHARPUR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-01at12.46.09241211061435.jpeg', '2024-12-01', '2025-05-31', './uploads/earthing_report/12174750_mshsdpbpatilpetroleum_01dec_unsigned241211061435.pdf', 'completed', 0, 0, 1, '2024-12-01 07:54:02', 0, NULL),
(107, '24/00107', '2024-12-01', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'RAJAN', '123', '', '', '', '', 62, 'A R SHAH', 'PANDARPUR', '', '', 'EARTHPIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-11at11.36.21241211060759.jpeg', '2024-12-01', '2025-05-31', './uploads/earthing_report/11162012_arshah_01dec_unsigned241211060759.pdf', 'completed', 0, 0, 1, '2024-12-01 07:55:28', 0, NULL),
(108, '24/00108', '2024-11-30', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'RAJAN', '123', '', '', '', '', 63, ' DIGAMBER PETROLEUM', 'PANDARPUR', '', '', 'EARTHPIT TESTING', '', '', NULL, NULL, '', 'inprogress', 0, 0, 1, '2024-12-01 07:56:45', 0, NULL),
(109, '24/00109', '2024-11-30', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'RAJAN', '123', '', '', '', '', 71, ' VENKATESHWARA FUELS', 'PANDHARPUR', '', '', 'EARTHPIT TESTING', '', '', NULL, NULL, '', 'inprogress', 0, 0, 1, '2024-12-01 07:58:05', 0, NULL),
(110, '24/00110', '2024-11-30', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'RAJAN', '123', '', '', '', '', 62, 'A R SHAH', 'PANDARPUR', '', '', 'EARTPIT TESTING', '', '', NULL, NULL, '', 'inprogress', 0, 1, 1, '2024-12-01 08:02:42', 0, NULL),
(111, '24/00111', '2024-11-30', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'RAJAN', '123', '', '', '', '', 42, 'OM SAI SERVICES KASEGAON ', 'PANDHARPUR', '', '', 'EARTHPIT TESTING', '', '', NULL, NULL, '', 'inprogress', 0, 0, 1, '2024-12-01 08:05:37', 0, NULL),
(112, '24/00112', '2024-11-30', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'RAJAN', '123', '', '', '', '', 78, ' SIDDHARAJ PETROLEUM', 'PANDHARPUR', '', '', 'EARTHPIT TESTING', '', '', NULL, NULL, '', 'inprogress', 0, 0, 1, '2024-12-01 08:08:03', 0, NULL),
(113, '24/00113', '2024-11-29', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'RAJAN', '123', 'JAYPRAKASH BILE PETROLEUM', 'SANGOLA', '', '', 137, '', '', '', '', 'EARTHPIT TESTING', '', '', NULL, NULL, '', 'inprogress', 1, 0, 1, '2024-12-01 08:11:15', 0, NULL),
(114, '24/00114', '2024-12-02', 'indore', '1', 'maintenance', 'Pushpendra Umath', 'AJAY', '123', 'MAA GAYATRI FILLING STATION', 'DEWAS', '', '', 138, '', '', '', '', 'ELECTRICAL POLE DISCONNETED', '', '', NULL, NULL, '', 'inprogress', 1, 0, 1, '2024-12-02 04:30:05', 0, NULL),
(115, '24/00115', '2024-12-02', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'AJAY', '123', '', '', '', '', 81, ' GAJANAN PETROLEUM', 'PANDHARPUR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-02at09.38.52241202103142.jpeg', '2024-12-02', '2025-06-01', './uploads/earthing_report/12175600_mshsdgajananpetroleum_02dec_unsigned241202103142.pdf', 'completed', 0, 0, 1, '2024-12-02 04:35:06', 0, NULL),
(116, '24/00116', '2024-12-02', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'AJAY', '123', '', '', '', '', 31, ' BHAIRAVNATH PETROLEUM SERVICES ', 'LAVANGI', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-02at13.14.11241202103821.jpeg', '2024-12-02', '2025-06-01', './uploads/earthing_report/12558920_mshsdbhairavnathpetroleumservices,12558920_02dec_unsigned-1(1)241202103821.pdf', 'completed', 0, 0, 1, '2024-12-02 05:05:27', 0, NULL),
(117, '24/00117', '2024-12-02', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'AJAY', '123', 'RUBIRAJ PETROLEUM', 'PANDHARPUR', '', '', 150, '', '', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-02at16.15.19241211071437.jpeg', '2024-12-02', '2025-06-01', './uploads/earthing_report/rubyrajearthpittestingcert241211071437.pdf', 'completed', 1, 0, 1, '2024-12-02 05:13:06', 0, NULL),
(118, '24/00118', '2024-12-02', 'indore', '1', 'earth_renewal', 'Ajay Yadav', 'AJAY', '123', 'JAI JINENDRA PETRO SERVICES', 'DHAR', '', '', 151, '', '', '', '', 'EARTH PIT CHECKING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-02at14.06.15241202105753.jpeg', '2024-12-02', '2025-06-01', './uploads/earthing_report/12555870_mshsdjaijinendrapetroservices_02dec_unsigned-1241202105753.pdf', 'completed', 1, 0, 1, '2024-12-02 05:27:18', 0, NULL),
(119, '24/00119', '2024-12-02', 'indore', '1', 'earth_renewal', 'Ajay Yadav', 'AJAY', '123', 'SHRI GURU KRUPA SERVICE CENTRE', 'DHAR', '', '', 152, '', '', '', '', 'EARTH PIT RENEWAL', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-02at16.19.26241202110244.jpeg', '2024-12-02', '2025-06-01', './uploads/earthing_report/12543290_mshsdshrigurukrupaservicecentre_02dec_unsigned241202110244.pdf', 'completed', 1, 0, 1, '2024-12-02 05:31:53', 0, NULL),
(120, '24/00120', '2024-12-02', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'AJAY', '123', '', '', '', '', 44, 'PANT NAGAR PETROLEUM, ', 'PANDHARPUR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-02at18.02.07241211071831.jpeg', '2024-12-02', '2025-06-01', './uploads/earthing_report/12575950_pantnagarpetroleum,12575950_02dec_unsigned241211071831.pdf', 'completed', 0, 0, 1, '2024-12-02 06:55:13', 0, NULL),
(121, '24/00121', '2024-12-03', 'indore', '1', 'earth_renewal', 'Ajay Yadav', 'AJAY', '123', 'LAXMIKANTAM FILLING STATION', 'DHAR', '', '', 153, '', '', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-03at12.07.32241203065305.jpeg', '2024-12-03', '2025-06-02', './uploads/earthing_report/12595880_laxmikantamfillingstation_03dec_unsigned241203065305.pdf', 'completed', 1, 0, 1, '2024-12-03 01:17:23', 0, NULL),
(122, '24/00122', '2024-12-03', 'indore', '1', 'earth_renewal', 'Ajay Yadav', 'AJAY', '123', 'SHREE PETROLEUM', 'DHAR', '', '', 154, '', '', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-03at11.33.47241203065955.jpeg', '2024-12-03', '2025-06-02', './uploads/earthing_report/12594590_mshsdshreepetroleum_03dec_unsigned-1241203065955.pdf', 'completed', 1, 0, 1, '2024-12-03 01:29:21', 0, NULL),
(123, '24/00123', '2024-12-01', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 155, 'SONI & SONS FUEL STATION', 'Sehore', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-01at12.23.56241203071210.jpeg', '2024-12-01', '2025-05-31', './uploads/earthing_report/12582450_mshsdsoni&sonsfuelstation,12582450_01dec_unsigned241203071210.pdf', 'completed', 0, 0, 1, '2024-12-03 01:40:37', 0, NULL),
(124, '24/00124', '2024-12-01', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 156, 'SAHU FUEL POINT', 'Sehore', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-01at13.55.37241203071742.jpeg', '2024-12-01', '2025-05-31', './uploads/earthing_report/12580180_mshsdsahufuelpoint,12580180_01dec_unsigned-1241203071742.pdf', 'completed', 0, 0, 1, '2024-12-03 01:46:54', 0, NULL),
(125, '24/00125', '2024-12-01', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 157, 'SHREE VYAS FUEL POINT', 'Sehore', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-01at15.22.12241203073157.jpeg', '2024-12-01', '2025-05-31', './uploads/earthing_report/12571880_mshsdshreevyasfuelpoint,12571880_01dec_unsigned241203073157.pdf', 'completed', 0, 0, 1, '2024-12-03 02:00:34', 0, NULL),
(126, '24/00126', '2024-12-01', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 158, 'SURAJ SERVICE STATION', 'Sehore', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-01at16.36.39241203073700.jpeg', '2024-12-01', '2025-05-31', './uploads/earthing_report/12587350_mshsdsurajservicestation_01dec_unsigned-1241203073700.pdf', 'completed', 0, 0, 1, '2024-12-03 02:06:13', 0, NULL),
(127, '24/00127', '2024-12-01', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 159, 'RAGHU DIESELS', 'Sehore', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-01at18.11.16241203074602.jpeg', '2024-12-01', '2025-05-31', './uploads/earthing_report/12519240_mshsdraghudiesels_01dec_unsigned241203074602.pdf', 'completed', 0, 0, 1, '2024-12-03 02:13:43', 0, NULL),
(128, '24/00128', '2024-12-02', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 160, 'CAPITAL AUTO SERVICE', 'Sehore', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-02at12.39.29241203074940.jpeg', '2024-12-02', '2025-06-01', './uploads/earthing_report/12781820_mshsdcapitalautoservice,12781820_02dec_unsigned241203074940.pdf', 'completed', 0, 0, 1, '2024-12-03 02:19:11', 0, NULL),
(129, '24/00129', '2024-12-02', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 161, 'MEHER FILLING STATION', 'Sehore', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-02at14.29.22241203075413.jpeg', '2024-12-02', '2025-06-01', './uploads/earthing_report/12225600_mshsdmeherfillingstation,kotri,12225600_02dec_unsigned241203075413.pdf', 'completed', 0, 0, 1, '2024-12-03 02:23:44', 0, NULL),
(130, '24/00130', '2024-12-02', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 162, 'G.D. GAUTAM ENERGY STATION', 'Sehore', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-02at16.28.45241203080015.jpeg', '2024-12-02', '2025-06-01', './uploads/earthing_report/12572710_mshsdg.d.gautamenergystation,12572710_02dec_unsigned241203080015.pdf', 'completed', 0, 0, 1, '2024-12-03 02:29:44', 0, NULL),
(131, '24/00131', '2024-12-02', 'indore', '2', 'maintenance', 'Ranjeet Singh Nanade', 'AJAY', '123', 'TRIVENI FUEL SERVICES', 'BETUL', '', '', 163, '', '', '', '', 'MAINTAINANCE', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-02at19.20.11241203080741.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 1, '2024-12-03 02:37:04', 0, NULL),
(132, '24/00132', '2024-12-03', 'indore', '2', 'maintenance', 'Ranjeet Singh Nanade', 'AJAY', '123', 'ADHOC CHANDRAS 69A PETROL JUNCTION', 'BHOPAL', '', '', 263, '', '', '', '', 'YARD POLE LIGHT REPAIRING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-03at15.21.01241204075450.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 1, '2024-12-04 02:24:01', 0, NULL),
(133, '24/00133', '2024-12-03', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 264, 'GANDHI FUELS', 'Sehore', '', '', 'EARTH PIT TESTIING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-03at18.42.41241204080102.jpeg', '2024-12-03', '2025-06-02', './uploads/earthing_report/12513290_mshsdgandhifuels,kalapipal_03dec_unsigned241204080102.pdf', 'completed', 0, 0, 1, '2024-12-04 02:30:30', 0, NULL),
(134, '24/00134', '2024-12-04', 'indore', '2', 'maintenance', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 265, 'IBRAHIM ALI IMDAD ALI', 'BHOPAL', '', '', 'ELECTRICAL DU CABLE ISSUE', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-04at13.22.09241204080751.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 1, '2024-12-04 02:37:23', 0, NULL),
(135, '24/00135', '2024-12-06', 'indore', '1', 'maintenance', 'Ajay Yadav', 'Kishor ', '123', '', '', '', '', 469, ' VASUNIA FUEL CENTER', 'JHABUA', '', '', 'Earthing Testing ', '', '', NULL, NULL, '', 'inprogress', 0, 1, 2, '2024-12-06 06:30:31', 0, NULL),
(136, '24/00136', '2024-12-06', 'indore', '1', 'earth_renewal', 'Ajay Yadav', 'Ajay', '123', '', '', '', '', 475, ' BHANDARI PETROLEUM', 'JHABUA', '', '', 'Earthing testing', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-06at14.42.02241207065645.jpeg', '2024-12-06', '2025-06-05', './uploads/earthing_report/12534910_mshsdbhandaripetroleum_06dec_unsigned241207065645.pdf', 'completed', 0, 0, 61, '2024-12-06 08:06:32', 0, NULL),
(137, '24/00137', '2024-12-07', 'indore', '1', 'earth_renewal', 'Ajay Yadav', 'AJAY', '123', '', '', '', '', 400, ' ADHOC DAWAR PETROLEUM', 'ALIRAJPUR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-07at10.17.14241207045931.jpeg', '0000-00-00', '0000-00-00', './uploads/earthing_report/12592680_mshsdadhocdawarpetroleum_07dec_unsigned241207045931.pdf', 'completed', 0, 0, 1, '2024-12-06 23:29:02', 0, NULL),
(138, '24/00138', '2024-12-06', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 404, ' ARNEJA AUTO CENTRE', 'BARWANI', '', '', 'EARTH PIT TESTING - PUMP NAME CHANGED FROM RAGHAV FUELSTATION TO ARNEJA\r\n', 'JOB REPORT ON RAGHAV FUEL STATION', './uploads/job_letter/arnejajobreport241207053952.pdf', '2024-12-06', '2025-06-05', './uploads/earthing_report/arnejajobreport241207053952.pdf', 'completed', 0, 0, 1, '2024-12-07 00:08:51', 0, NULL),
(139, '24/00139', '2024-12-06', 'indore', '1', 'earth_renewal', 'Ajay Yadav', 'AJAY', '123', '', '', '', '', 469, ' VASUNIA FUEL CENTER', 'JHABUA', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-06at17.27.36241207061521.jpeg', '2024-12-06', '2025-06-05', './uploads/earthing_report/12505570_mshsdvasuniafuelcenter_06dec_unsigned-1241207061521.pdf', 'completed', 0, 0, 1, '2024-12-07 00:44:42', 0, NULL);
INSERT INTO `complaint` (`id`, `sno`, `date`, `zone`, `branch`, `work_type`, `assign_to`, `complainter_name`, `complainter_number`, `outlet_name`, `outlet_location`, `contact_name`, `contact_number`, `outlet_id`, `old_outlet_name`, `old_outlet_location`, `old_contact_name`, `old_contact_number`, `description`, `job_remarks`, `job_report`, `checking_date`, `renewal_date`, `earthing_report`, `status`, `outlet_exists`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(140, '24/00140', '2024-12-06', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 420, ' RAVJI FUELS', 'BARWANI', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/ravjifuelsjobreport241207070634.pdf', '2024-12-06', '2025-06-05', './uploads/earthing_report/12594630_mshsdravjifuels_06dec_unsigned241207070634.pdf', 'completed', 0, 0, 1, '2024-12-07 01:11:05', 0, NULL),
(141, '24/00141', '2024-12-06', 'indore', '1', 'earth_renewal', 'Ajay Yadav', 'AJAY', '123', '', '', '', '', 466, ' VASUNIA PETROLEUM', 'JHABUA', '', '', 'EARH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-06at15.59.12241207065456.jpeg', '2024-12-06', '2025-06-05', './uploads/earthing_report/11769900_msvasuniapetroleum,11769900_06dec_unsigned241207065456.pdf', 'completed', 0, 0, 1, '2024-12-07 01:24:27', 0, NULL),
(142, '24/00142', '2024-12-06', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 414, ' MANGALI FUELS', 'BARWANI', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-06at13.38.15241207070121.jpeg', '2024-12-06', '2025-06-05', './uploads/earthing_report/whatsappimage2024-12-06at13.38.15241207070121.jpeg', 'completed', 0, 0, 1, '2024-12-07 01:30:52', 0, NULL),
(143, '24/00143', '2024-12-06', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 405, ' RAJPAL&CO', 'BARWANI', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/rajpal&co_06dec_jobreport241207071111.pdf', '2024-12-06', '2025-06-05', './uploads/earthing_report/11654010_mshsdrajpal&co_06dec_unsigned241207071111.pdf', 'completed', 0, 0, 1, '2024-12-07 01:40:44', 0, NULL),
(144, '24/00144', '2024-12-06', 'indore', '1', 'earth_renewal', 'Ajay Yadav', 'AJAY', '123', '', '', '', '', 467, ' SURYA PETROLEUM', 'JHABUA', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-06at11.32.06241207071307.jpeg', '2024-12-06', '2025-06-05', './uploads/earthing_report/12254200_mshsdsuryapetroleum_06dec_unsigned241207071307.pdf', 'completed', 0, 0, 1, '2024-12-07 01:42:42', 0, NULL),
(145, '24/00145', '2024-12-06', 'indore', '1', 'earth_renewal', 'Ajay Yadav', 'AJAY', '123', '', '', '', '', 474, ' SHRI MARUTI AUTOMOBILES', 'JHABUA', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-06at10.11.14241207072334.jpeg', '2024-12-06', '2025-06-05', './uploads/earthing_report/12532490_shrimarutiautomobiles,12532490_06dec_unsigned-1241207072334.pdf', 'completed', 0, 0, 1, '2024-12-07 01:52:58', 0, NULL),
(146, '24/00146', '2024-12-05', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 416, ' RAAVEE INDHAN', 'BARWANI', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-07at15.44.41241207104341.jpeg', '2024-12-07', '2025-06-06', './uploads/earthing_report/12587470_mshsdraaveeindhan_05dec_signed241207104341.pdf', 'completed', 0, 0, 1, '2024-12-07 02:00:32', 0, NULL),
(147, '24/00147', '2024-12-05', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 419, ' THE BHAGATSINGH FUELS', 'BARWANI', '', '', 'EARTHPIT TESTING', 'JOB COMPLETED', './uploads/job_letter/thebhagatsinghfueljobreport241207075551.pdf', '2024-12-05', '2025-06-04', './uploads/earthing_report/12588700_thebhagatsinghfuel,12588700_05dec_unsigned241207075551.pdf', 'completed', 0, 0, 1, '2024-12-07 02:25:20', 0, NULL),
(148, '24/00148', '2024-12-05', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 418, ' VISHWAMANGAL FUELS OZAR', 'BARWANI', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/12588670_mshsdvishwamangalfuelsozar_jobreport241207075836.pdf', '2024-12-05', '2025-06-04', './uploads/earthing_report/12588670_mshsdvishwamangalfuelsozar_05dec_unsigned241207075836.pdf', 'completed', 0, 0, 1, '2024-12-07 02:28:05', 0, NULL),
(149, '24/00149', '2024-12-05', 'indore', '1', 'earth_renewal', 'Ajay Yadav', 'AJAY', '123', '', '', '', '', 465, ' AMIT AUTO SERVICE CENTRE', 'JHABUA', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-05at17.56.28241207080149.jpeg', '2024-12-05', '2025-06-04', './uploads/earthing_report/11506750_mshsdamitautoservicecentre_05dec_unsigned241207080149.pdf', 'completed', 0, 0, 1, '2024-12-07 02:31:24', 0, NULL),
(150, '24/00150', '2024-12-05', 'indore', '1', 'earth_renewal', 'Ajay Yadav', 'AJAY', '123', '', '', '', '', 482, ' PRATHVI FUEL CENTER', 'JHABUA', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-05at16.59.32241207080415.jpeg', '2024-12-05', '2025-06-04', './uploads/earthing_report/12587570_mshsdprathvifuelcenter_05dec_signed241207080415.pdf', 'completed', 0, 0, 1, '2024-12-07 02:33:46', 0, NULL),
(151, '24/00151', '2024-12-05', 'indore', '1', 'maintenance', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 407, ' MAA BIJASAN FILLING STATION', 'BARWANI', '', '', 'YARD POLE AND CANOPY REPAIR', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-05at16.07.55241207081803.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 1, '2024-12-07 02:47:36', 0, NULL),
(152, '24/00152', '2024-12-05', 'indore', '1', 'earth_renewal', 'Ajay Yadav', 'AJAY', '123', '', '', '', '', 477, ' AASHIRWAD AUTOMOBILES', 'JHABUA', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-05at15.32.18241207092627.jpeg', '2024-12-05', '2025-06-04', './uploads/earthing_report/12546620_mshsdaashirwadautomobiles,12546620_05dec_unsigned241207092627.pdf', 'completed', 0, 0, 1, '2024-12-07 03:55:56', 0, NULL),
(153, '24/00153', '2024-12-05', 'indore', '1', 'earth_renewal', 'Ajay Yadav', 'AJAY', '123', '', '', '', '', 480, ' VAISHNAVI ENTERPRISES', 'JHABUA', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-05at13.55.41241207093247.jpeg', '2024-12-05', '2025-06-04', './uploads/earthing_report/12583400_mshsdvaishnavienterprises_05dec_unsigned241207093247.pdf', 'completed', 0, 0, 1, '2024-12-07 04:02:11', 0, NULL),
(154, '24/00154', '2024-12-05', 'indore', '1', 'earth_renewal', 'Ajay Yadav', 'AJAY', '123', '', '', '', '', 476, ' SHRI NAKODA FILLING CENTRE', 'JHABUA', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-05at12.38.06241207093631.jpeg', '2024-12-05', '2025-06-04', './uploads/earthing_report/12537220_mshsdshrinakodafillingcentre_05dec_unsigned-1241207093631.pdf', 'completed', 0, 0, 1, '2024-12-07 04:05:31', 0, NULL),
(155, '24/00155', '2024-12-05', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 407, ' MAA BIJASAN FILLING STATION', 'BARWANI', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/12514430_mshsdmaabijasanfillingstation_05jobreport241207095841.pdf', '2024-12-05', '2025-06-04', './uploads/earthing_report/12514430_mshsdmaabijasanfillingstation_05dec_unsigned241207095841.pdf', 'completed', 0, 0, 61, '2024-12-07 04:27:50', 0, NULL),
(156, '24/00156', '2024-12-05', 'indore', '1', 'maintenance', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 410, ' MAA DARBAAR FUEL STATION', 'BARWANI', '', '', 'YARD POLE AND CVT ISSUE', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-05at10.12.16241207100217.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-07 04:31:53', 0, NULL),
(157, '24/00157', '2024-12-05', 'indore', '1', 'earth_renewal', 'Ajay Yadav', 'AJAY', '123', '', '', '', '', 472, ' SAI KRITI PETROLEUM', 'JHABUA', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-05at09.41.38241207100500.jpeg', '2024-12-05', '2025-06-04', './uploads/earthing_report/12532420_saikratipetroleum,12532420_05dec_unsigned-1241207100500.pdf', 'completed', 0, 0, 61, '2024-12-07 04:34:21', 0, NULL),
(158, '24/00158', '2024-12-04', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 410, ' MAA DARBAAR FUEL STATION', 'BARWANI', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/12546650_mshsdmaadarbaarfuelstation_04dec_jobreport241207101249.pdf', '2024-12-04', '2025-06-03', './uploads/earthing_report/12546650_mshsdmaadarbaarfuelstation_04dec_unsigned241207101249.pdf', 'completed', 0, 0, 61, '2024-12-07 04:40:34', 0, NULL),
(159, '24/00159', '2024-12-04', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 425, ' SHRINATHJI AUTO CENTRE', 'DHAR', '', '', 'EARTH PIT RENEWAL', 'JOB COMPLETE', './uploads/job_letter/11591120_mshsdshrinathjiautocentre_04decjobreport241207102105.pdf', '2024-12-04', '2025-06-03', './uploads/earthing_report/11591120_mshsdshrinathjiautocentre_04dec_unsigned241207102105.pdf', 'completed', 0, 0, 1, '2024-12-07 04:50:16', 0, NULL),
(160, '24/00160', '2024-12-04', 'indore', '1', 'earth_renewal', 'Ajay Yadav', 'AJAY', '123', '', '', '', '', 454, ' JAY SHREE FILLING STATION', 'DHAR', '', '', 'EARHT PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-04at17.28.19241207103607.jpeg', '2024-12-04', '2025-06-03', './uploads/earthing_report/whatsappimage2024-12-04at17.28.19241207103607.jpeg', 'completed', 0, 0, 1, '2024-12-07 05:05:31', 0, NULL),
(161, '24/00161', '2024-12-04', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 435, ' DHAMNOD AUTO CENTRE', 'DHAR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/12505580_dhamnodautocenter,12505580_04jobreport241207104125.pdf', '2024-12-04', '2025-06-03', './uploads/earthing_report/12505580_dhamnodautocenter,12505580_04dec_unsigned241207104125.pdf', 'completed', 0, 0, 1, '2024-12-07 05:10:43', 0, NULL),
(162, '24/00162', '2024-12-04', 'indore', '1', 'earth_renewal', 'Ajay Yadav', 'AJAY', '123', '', '', '', '', 455, ' TANTED FUEL POINT', 'DHAR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-04at15.40.43241207110407.jpeg', '2024-12-04', '2025-06-03', './uploads/earthing_report/12580740_tantedfuelpoint,12580740_04dec_signed241207110407.pdf', 'completed', 0, 0, 1, '2024-12-07 05:33:05', 0, NULL),
(163, '24/00163', '2024-12-04', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 484, 'HADPL Cube Stop', 'DHAR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/12608610_hadplcubestop_04jobreport241207111359.pdf', '2024-12-04', '2025-06-03', './uploads/earthing_report/12608610_hadplcubestop_04dec_unsigned241207111359.pdf', 'completed', 0, 0, 1, '2024-12-07 05:43:15', 0, NULL),
(164, '24/00164', '2024-12-04', 'indore', '1', 'earth_renewal', 'Ajay Yadav', 'AJAY', '123', '', '', '', '', 427, ' MANDLECHA PETROLEUM', 'DHAR', '', '', 'EARTH PIT TESTIING', 'JOB COMLETED', './uploads/job_letter/whatsappimage2024-12-04at14.32.48241207111722.jpeg', '2024-12-04', '2025-06-03', './uploads/earthing_report/11768500_mandlechapetroleumrajgarh,11768500_04dec_unsigned241207111722.pdf', 'completed', 0, 0, 1, '2024-12-07 05:46:49', 0, NULL),
(165, '24/00165', '2024-12-03', 'indore', '1', 'earth_renewal', 'Ajay Yadav', 'AJAY', '123', '', '', '', '', 447, ' HARSHIT FUELS', 'DHAR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-03at17.08.39241207112146.jpeg', '2024-12-03', '2025-06-02', './uploads/earthing_report/12543240_mshsdharshitfuels_03dec_unsigned241207112146.pdf', 'completed', 0, 0, 1, '2024-12-07 05:51:00', 0, NULL),
(166, '24/00166', '2024-12-03', 'indore', '1', 'earth_renewal', 'Ajay Yadav', 'AJAY', '123', '', '', '', '', 446, ' AMKA JHAMKA PETROLEUM', 'DHAR', '', '', 'EARTH PIT TESTING', 'JOB COMPLESTED', './uploads/job_letter/whatsappimage2024-12-03at14.25.27241207112725.jpeg', '2024-12-03', '2025-06-02', './uploads/earthing_report/12540750_amkajhamkapetroleum,12540750_03dec_unsigned241207112725.pdf', 'completed', 0, 0, 1, '2024-12-07 05:56:07', 0, NULL),
(167, '24/00167', '2024-12-03', 'indore', '1', 'earth_renewal', 'Ajay Yadav', 'AJAY', '123', '', '', '', '', 423, ' SIDDHARTH SER STATION', 'DHAR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-03at12.44.25241207113453.jpeg', '2024-12-03', '2025-06-02', './uploads/earthing_report/11496210_siddharthservicestation,11496210_03dec_unsigned241207113453.pdf', 'completed', 0, 0, 1, '2024-12-07 06:03:58', 0, NULL),
(168, '24/00168', '2024-12-03', 'indore', '1', 'maintenance', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 308, 'MOBILE STATION', 'INDORE EAST', '', '', 'CVT ISSUE', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-03at12.38.37241207113816.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 1, '2024-12-07 06:07:51', 0, NULL),
(169, '24/00169', '2024-12-01', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', 'CHAVADI PETROLEUM & CO ', 'KG CHAVADI', '', '', 485, '', '', '', '', 'DU BOARD ISSUE', 'work completed', './uploads/job_letter/2241207123602.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-07 06:48:23', 0, NULL),
(170, '24/00170', '2024-12-02', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', 'G.KHALEEL RAHMAN', 'TIRUPUR', '', '', 486, '', '', '', '', 'LIGHT REPARING ', 'work completed', './uploads/job_letter/16ca3569-1a19-41fd-9eda-84ea0b5aed18241207123641.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-07 06:49:39', 0, NULL),
(171, '24/00171', '2024-12-02', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', 'VENKATESWARA FUEL SERVICE ', 'PERUNDURAI ', '', '', 487, '', '', '', '', 'LIGHT REPAIRING \r\n', 'work completed', './uploads/job_letter/2.241207123748.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-07 06:50:48', 0, NULL),
(172, '24/00172', '2024-12-02', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', 'VENKATESWARA FUEL SERVICE ADHOC ', 'PERUNDURAI ', '', '', 488, '', '', '', '', 'LIGHT REPAIRING ', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-12-07 06:52:36', 0, NULL),
(173, '24/00173', '2024-12-03', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', '', '', '', '', 17, 'RV AGENCY ', 'GANAPATHI', '', '', 'CVT ISSUE', '', '', NULL, NULL, '', 'inprogress', 0, 1, 40, '2024-12-07 06:53:52', 0, NULL),
(174, '24/00174', '2024-12-04', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', '', '', '', '', 485, 'CHAVADI PETROLEUM & CO ', 'KG CHAVADI', '', '', 'STP ISSUE', 'work completed', './uploads/job_letter/4241207123852.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-07 06:54:45', 0, NULL),
(175, '24/00175', '2024-12-04', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', 'CK DAWOOD & CO ', 'SATHY ROAD ', '', '', 489, '', '', '', '', 'PANEL DRESSING WORK ', 'work completed', './uploads/job_letter/50969cb2-b5b5-4a2f-bb29-0e206fa22f1c241207123829.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-07 06:56:05', 0, NULL),
(176, '24/00176', '2024-12-06', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', 'MUTHUKUMARASAMY AGENCY ', 'MADHUKARAI', '', '', 490, '', '', '', '', 'CVT ISSUE\r\n', 'work completed', './uploads/job_letter/36f5955a-7deb-4965-b15a-ed46d06cfd35241207123810.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-07 06:58:11', 0, NULL),
(177, '24/00177', '2024-12-03', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'GANAPATHY AGENCY ', 'CUDDALORE ', '', '', 491, '', '', '', '', 'ELECTRICAL COMPLAINT ', 'work completed', './uploads/job_letter/931fa48d-9449-40b9-8214-a496f4f63e99241207125020.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-07 07:11:11', 0, NULL),
(178, '24/00178', '2024-12-03', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'MKS AGENCIES ', 'CUDDALORE', '', '', 492, '', '', '', '', 'ELECTRICAL ISSUE', 'work completed', './uploads/job_letter/mks241207125003.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-07 07:14:17', 0, NULL),
(179, '24/00179', '2024-12-06', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'JSV FUELS ', 'NAGAI ROAD', '', '', 493, '', '', '', '', 'LIGHT REPAIRING ', 'work completed', './uploads/job_letter/d2734263-4696-4915-8480-f350ebdf800d241207124934.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-07 07:15:22', 0, NULL),
(180, '24/00180', '2024-12-06', 'chennai', '7', 'private_work', 'C Anbujothi', 'APPU', '9363174843', 'NANI FUEL STATION ', 'TRICHY ', '', '', 494, '', '', '', '', 'LIGHT REPAIRING \r\n', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-12-07 07:16:39', 0, NULL),
(181, '24/00181', '2024-12-02', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'KAVITHA TRADERS ', 'RADHAPURAM, ', '', '', 495, '', '', '', '', 'STP ISSUE', 'work completed', './uploads/job_letter/28b57ce3-2611-49e3-ba2f-65a224088c69241211125027.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-07 07:21:26', 0, NULL),
(182, '24/00182', '2024-12-02', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'SALSON ', 'THOPPUR', '', '', 496, '', '', '', '', 'STP ISSUE ', 'work completed', './uploads/job_letter/5f511903-8881-46ba-91ff-d3f449798ae5241211125101.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-07 07:22:18', 0, NULL),
(183, '24/00183', '2024-12-03', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'NADARAJAN PETROLEUM ', 'THINGAL NAGAR', '', '', 497, '', '', '', '', 'ELECTRICAL ISSUE ', 'work completed', './uploads/job_letter/nadarajan3241207130428.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-07 07:23:19', 0, NULL),
(184, '24/00184', '2024-12-04', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', '', '', '', '', 497, 'NADARAJAN PETROLEUM ', 'THINGAL NAGAR', '', '', 'CABLE LAYING DU', 'work completed', './uploads/job_letter/nadarajan4241207130405.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-07 07:24:15', 0, NULL),
(185, '24/00185', '2024-12-05', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'AJAY FUELS ', 'GANDINAGAR', '', '', 3, 'AJAY FUELS', 'LALUGAPURAM', '', '', 'ELECTRICAL ISSUE ', 'work completed', './uploads/job_letter/ajay241207130342.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-07 07:25:43', 0, NULL),
(186, '24/00186', '2024-12-06', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'J PADMA ', 'KADAYANALLUR', '', '', 122, 'J PADMA ', 'KADAVUNALLUR', '', '', 'LIGHT REPAIRING ', 'work completed', './uploads/job_letter/padma241207130318.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-07 07:26:51', 0, NULL),
(187, '24/00187', '2024-12-06', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'SREE VENKATESHWARA FUELS ', 'KARUNGULAM ', '', '', 498, '', '', '', '', 'STP  ISSUE', 'work completed', './uploads/job_letter/venkatesh241207130302.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-07 07:28:46', 0, NULL),
(188, '24/00188', '2024-12-07', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'SRI SARAVANA & CO ', '', '', '', 98, 'SRI SARAVANA & CO ', 'KEELA KALANGAL', '', '', 'LIGHT REPAIRING ', 'work completed', './uploads/job_letter/saravana241207130239.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-07 07:30:04', 0, NULL),
(189, '24/00189', '2024-12-09', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 392, ' BATRA FUELS', 'INDORE WEST', '', '', 'EARTHING TESTING', 'JOB COMPLETED', './uploads/job_letter/jobreport241210123111.docx', '2024-12-09', '2025-06-08', './uploads/earthing_report/earthingtestingcertificat241210123111.pdf', 'completed', 0, 0, 1, '2024-12-10 07:00:27', 0, NULL),
(190, '24/00190', '2024-12-09', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 383, ' PRAGATI FILLING STATION', 'INDORE WEST', '', '', 'EATHING TESTING', 'JOB COMPLETED', './uploads/job_letter/jobreport241210123426.pdf', '2024-12-09', '2025-06-08', './uploads/earthing_report/earthpitcertificate241210123426.pdf', 'completed', 0, 0, 1, '2024-12-10 07:03:58', 0, NULL),
(191, '24/00191', '2024-12-09', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 386, ' MAA RENUKA FILLING STATION', 'INDORE WEST', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/jobreport241210123828.pdf', '2024-12-09', '2025-06-08', './uploads/earthing_report/earthpitcertificate241210123828.pdf', 'completed', 0, 0, 1, '2024-12-10 07:08:00', 0, NULL),
(192, '24/00192', '2024-12-07', 'indore', '1', 'earth_renewal', 'Ajay Yadav', 'AJAY', '123', '', '', '', '', 437, ' SHANKHESWER PARSHV FILLING STATION', 'DHAR', '', '', 'ERTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-07at17.29.03241210124225.jpeg', '2024-12-07', '2025-06-06', './uploads/earthing_report/12516980_mshsdshankheswerparshvfillingstation_07dec_unsigned241210124225.pdf', 'completed', 0, 0, 1, '2024-12-10 07:11:48', 0, NULL),
(193, '24/00193', '2024-12-10', 'chennai', '7', 'maintenance', 'C Anbujothi', 'RAJAN', '123', 'ADHOC   R K PETROLEUM', 'THIRUNAGESWARAM', '', '', 499, '', '', '', '', 'YARD POLE CABLE FAULT', '', '', NULL, NULL, '', 'inprogress', 1, 0, 1, '2024-12-10 11:15:11', 0, NULL),
(194, '24/00194', '2024-12-07', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', 'RMS AGENCY ', 'PUNJAIPULLAMPATTI', '', '', 500, '', '', '', '', 'ELECTRICAL ISSUE', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-12-10 23:10:32', 0, NULL),
(195, '24/00195', '2024-12-07', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', '', '', '', '', 489, 'CK DAWOOD & CO ', 'SATHY ROAD ', '', '', 'ELECTRICAL ISSUE', 'work completed', './uploads/job_letter/00eba03e-8249-438f-b9f1-689fbe5de961241211101625.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-10 23:12:04', 0, NULL),
(196, '24/00196', '2024-12-09', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', '', '', '', '', 55, 'RAJKAMAL AGENCIES ', 'METTUPALAYAM ', '', '', 'ELECTRICAL COMPLAINT \r\n', 'work completed', './uploads/job_letter/1ff79ceb-498c-495b-8835-33232da77c17241211113326.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-10 23:13:23', 0, NULL),
(197, '24/00197', '2024-12-09', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', '', '', '', '', 51, 'UMA AGENCIES', 'PERIYANAYAKKAN PALAYAM ', '', '', 'ELECTRICAL COMPLAINT ', 'work completed', './uploads/job_letter/49579321-7108-42bd-bb88-6f3ca3a4997b241211113359.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-10 23:14:32', 0, NULL),
(198, '24/00198', '2024-12-10', 'chennai', '9', 'earth_renewal', 'G Joseph Margasis', 'APPU', '9363174843', 'SRI BALAVASAVI SERVICE STATION ', 'COONOOR', '', '', 501, '', '', '', '', 'EARTH RENEWAL ', 'RENEW WORK COMPLETED', './uploads/job_letter/bd87772e-7c63-48e2-80bb-484660dce75c241211113625.jpg', '2024-12-10', '2025-06-09', './uploads/earthing_report/12839720_mshsdbalavasaviservicestation_10dec_unsigned241211113625.pdf', 'completed', 1, 0, 40, '2024-12-10 23:17:17', 0, NULL),
(199, '24/00199', '2024-12-10', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', '', '', '', '', 501, 'SRI BALAVASAVI SERVICE STATION ', 'COONOOR', '', '', 'CVT COMPLAINT', 'work completed', './uploads/job_letter/d42e2d2f-0ad1-4dec-bf3c-c849011a4d50241211113716.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-10 23:18:48', 0, NULL),
(200, '24/00200', '2024-12-10', 'chennai', '9', 'earth_renewal', 'G Joseph Margasis', 'APPU', '9363174843', 'SREE R GEETHA AGENCIES ', 'OOTY', '', '', 502, '', '', '', '', 'EARTH RENEWAL ', 'RENEW WORK COMPLETED', './uploads/job_letter/f9234f93-f517-4584-ab4c-94cb42f8a71a241211113753.jpg', '2024-12-10', '2025-06-09', './uploads/earthing_report/untitled241211113753.pdf', 'completed', 1, 0, 40, '2024-12-10 23:20:14', 0, NULL),
(201, '24/00201', '2024-12-10', 'chennai', '9', 'earth_renewal', 'G Joseph Margasis', 'APPU', '9363174843', 'THE NILGIRI PETROLEUM ', 'OOTY', '', '', 503, '', '', '', '', 'EARTH RENEWAL', 'RENEW WORK COMPLETED', './uploads/job_letter/aea60568-ed0f-464a-bc66-8ae10b6bbdf5241211113832.jpg', '2024-12-10', '2025-06-09', './uploads/earthing_report/12839020_mshsdthenilgiripetroleumco_10dec_unsigned241211113832.pdf', 'completed', 1, 0, 40, '2024-12-10 23:21:29', 0, NULL),
(202, '24/00202', '2024-12-10', 'chennai', '9', 'earth_renewal', 'G Joseph Margasis', 'APPU', '9363174843', 'TRIBAL RESEARCH CENTRE FUEL STATION ', 'OOTY', '', '', 504, '', '', '', '', 'EARTH RENEWAL ', 'RENEW WORK COMPLETED', './uploads/job_letter/5ceebca1-bc08-442d-adc8-0ca4fa82e5ed241211113934.jpg', '2024-12-10', '2025-06-09', './uploads/earthing_report/15439110_mshsdtribalresearchcentrefuelstn_10dec_unsigned241211113934.pdf', 'completed', 1, 0, 40, '2024-12-10 23:23:48', 0, NULL),
(203, '24/00203', '2024-12-10', 'chennai', '9', 'earth_renewal', 'G Joseph Margasis', 'APPU', '9363174843', 'C GOVINDAN & CO ', 'OOTY', '', '', 505, '', '', '', '', 'EARTH RENEWAL ', 'RENEW WORK COMPLETED', './uploads/job_letter/61cded47-e089-4eed-85eb-3c204fd68adb241211114031.jpg', '2024-12-10', '2025-06-09', './uploads/earthing_report/12966010_mshsdcgovindan&co_10dec_unsigned241211114031.pdf', 'completed', 1, 0, 40, '2024-12-10 23:25:09', 0, NULL),
(204, '24/00204', '2024-12-10', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', 'CK DAWOOD & CO ', 'SATHY ROAD', '', '', 489, 'CK DAWOOD & CO ', 'SATHY ROAD ', '', '', 'STP COMPLAINT ', 'work completed', './uploads/job_letter/ae979975-abd8-4ba7-9c3a-4527724c02c1241211114108.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-10 23:28:00', 0, NULL),
(205, '24/00205', '2024-12-11', 'chennai', '9', 'earth_renewal', 'G Joseph Margasis', 'APPU', '9363174843', 'GOLDEN PETROLEUM ', 'OOTY', '', '', 506, '', '', '', '', 'EARTH RENEWAL \r\n', 'NOT ADDED TO ONLINE LIST', './uploads/job_letter/c502ff65-ba56-4491-9374-6e685284338a241211114218.jpg', '2024-12-11', '2025-06-10', '', 'completed', 1, 0, 40, '2024-12-10 23:33:32', 0, NULL),
(206, '24/00206', '2024-12-02', 'chennai', '8', 'earth_renewal', 'J.Charles', 'APPU', '9363174843', 'SELVA FUEL POINT ', 'VALLIOR', '', '', 507, '', '', '', '', 'EARTH RENEWAL ', 'RENEW WORK COMPLETED', './uploads/job_letter/9eefb439-a2b2-4d47-8a8c-3b3fdd4392ab241211125352.jpg', '2024-12-09', '2025-06-08', './uploads/earthing_report/15941210_selvafuels,15941210_04nov_unsigned241211125352.pdf', 'completed', 1, 0, 40, '2024-12-10 23:36:08', 0, NULL),
(207, '24/00207', '2024-12-09', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'EAGLE AUTO MOTIVE', 'PANNANKULAM', '', '', 508, '', '', '', '', 'TREATMENT CHART FIXING ', 'work completed', './uploads/job_letter/7645912f-fba6-41e8-a8ae-29a4bc8f7783241211124802.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-10 23:38:35', 0, NULL),
(208, '24/00208', '2024-12-09', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'AS KANI FUELS ', 'PERUMALPURAM ', '', '', 509, '', '', '', '', 'TREATMENT CHART FIXING ', 'work completed', './uploads/job_letter/ef0d16a6-8d61-41fc-9298-ec4b33c136ff241211124837.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-10 23:39:52', 0, NULL),
(209, '24/00209', '2024-12-09', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'JAWAN ENTERPRISES', 'TENKASI ', '', '', 510, '', '', '', '', 'STP COMPLAINT ', 'work completed', './uploads/job_letter/5fc2e6ce-2836-473f-9da9-16e1030dfbe9241211124921.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-10 23:41:45', 40, '2024-12-11 11:35:13'),
(210, '24/00210', '2024-12-10', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'SRI SUNDARI ENTERPRISES ', '', '', '', 96, 'SRI SUNDARI ENTERPRISES ', 'DEVARKULAM', '', '', 'LIGHT REPAIRING ', 'work completed', './uploads/job_letter/90d380cb-635e-4898-9c14-22d16b3902c4241211124946.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-10 23:42:51', 0, NULL),
(211, '24/00211', '2024-12-10', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'JAWAN ENTERPRISES ', 'TENKASI ', '', '', 511, '', '', '', '', 'STP ISSUE', '', '', NULL, NULL, '', 'inprogress', 1, 1, 40, '2024-12-11 00:42:07', 0, NULL),
(212, '24/00212', '2024-12-03', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'AJAY', '123', '', '', '', '', 65, ' SIDDHI PETRO OASIS', 'PANDARPUR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-03at10.30.48241211072524.jpeg', '2024-12-03', '2025-06-02', './uploads/earthing_report/11459780_mshsdsiddhipetrooasis_03dec_unsigned241211072524.pdf', 'completed', 0, 0, 1, '2024-12-11 01:50:27', 0, NULL),
(213, '24/00213', '2024-12-03', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'AJAY', '123', '', '', '', '', 169, 'SAMARTH PETROLEUM', 'PANDHARPUR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-03at11.33.42241211072911.jpeg', '2024-12-03', '2025-06-02', './uploads/earthing_report/12590910_mshsdsamarthpetroleum_03dec_unsigned241211072911.pdf', 'completed', 0, 0, 1, '2024-12-11 01:58:17', 0, NULL),
(214, '24/00214', '2024-12-03', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'AJAY', '123', '', '', '', '', 181, 'SHRI NATH PETROLEUM', 'PANDHARPUR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-03at13.09.24241211073456.jpeg', '2024-12-03', '2025-06-02', './uploads/earthing_report/12561710_mshsdshrinathpetroleum_03dec_unsigned241211073456.pdf', 'completed', 0, 0, 1, '2024-12-11 02:03:12', 0, NULL),
(215, '24/00215', '2024-12-03', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'AJAY', '123', '', '', '', '', 168, 'HINDAKESARI PETROLEUM', 'SOLAPUR 2', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-03at15.26.34241211074714.jpeg', '2024-12-03', '2025-06-02', './uploads/earthing_report/12590900_mshsdhindakesaripetroleum_03dec_unsigned241211074714.pdf', 'completed', 0, 0, 1, '2024-12-11 02:16:04', 0, NULL),
(216, '24/00216', '2024-12-03', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'AJAY', '123', '', '', '', '', 187, 'LAXMI NARAYAN PETROLEUM', 'PANDHARPUR', '', '', 'EARTH PIT TESTING', 'Job completed', './uploads/job_letter/1000248900_11zon241211075651.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 1, 1, '2024-12-11 02:21:06', 0, NULL),
(217, '24/00217', '2024-12-03', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'AJAY', '123', '', '', '', '', 187, 'LAXMI NARAYAN PETROLEUM', 'PANDHARPUR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-11at13.26.14241211080208.jpeg', '2024-12-03', '2025-06-02', './uploads/earthing_report/12589220_mshsdlaxminarayanpetroleum,12589220_03dec_unsigned241211080208.pdf', 'completed', 0, 0, 1, '2024-12-11 02:29:27', 0, NULL),
(218, '24/00218', '2024-12-03', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'AJAY', '123', '', '', '', '', 188, 'GAVKARE PETROLEUM', 'SOLAPUR 2', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-03at18.57.07241211092054.jpeg', '2024-12-03', '2025-06-02', './uploads/earthing_report/12590460_mshsdgavkarepetroleum_03dec_unsigned241211092054.pdf', 'completed', 0, 0, 1, '2024-12-11 03:50:10', 0, NULL),
(219, '24/00219', '2024-12-04', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'AJAY', '123', '', '', '', '', 147, 'DATTAKRUPA PETROLEUM', 'PANDHARPUR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-04at09.29.40241211092431.jpeg', '2024-12-04', '2025-06-03', './uploads/earthing_report/12581090_mshsddattakrupapetroleum,12581090_04dec_unsigned241211092431.pdf', 'completed', 0, 0, 1, '2024-12-11 03:53:53', 0, NULL),
(220, '24/00220', '2024-12-04', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'AJAY', '123', '', '', '', '', 64, ' PANDURANG PETROLEUM', 'PANDARPUR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-04at11.13.32241211092908.jpeg', '2024-12-04', '2025-06-03', './uploads/earthing_report/11353610_mshsdpandurangpetroleum,11353610_04dec_unsigned241211092908.pdf', 'completed', 0, 0, 1, '2024-12-11 03:58:27', 0, NULL),
(221, '24/00221', '2024-12-04', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'AJAY', '123', '', '', '', '', 164, 'VISHAL SAKSHI PETROLEUM', 'PANDHARPUR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-04at12.09.08241211093137.jpeg', '2024-12-04', '2025-06-03', './uploads/earthing_report/12590840_mshsdvishalsakshipetroleum_04dec_unsigned241211093137.pdf', 'completed', 0, 0, 1, '2024-12-11 04:01:02', 0, NULL),
(222, '24/00222', '2024-12-04', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'AJAY', '123', '', '', '', '', 79, ' M K PETROLEUM', 'PANDHARPUR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-04at13.34.45241211093535.jpeg', '2024-12-04', '2025-06-03', './uploads/earthing_report/12175560_mshsdmkpetroleum,12175560_04dec_unsigned241211093535.pdf', 'completed', 0, 0, 1, '2024-12-11 04:04:51', 0, NULL),
(223, '24/00223', '2024-12-04', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'AJAY', '123', '', '', '', '', 72, ' SHREE SAI VITTHAL PETROLEUM', 'PANDHARPUR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-04at15.18.02241211093833.jpeg', '2024-12-04', '2025-06-03', './uploads/earthing_report/12174680_mshsdshreesaivitthalpetroleum_04dec_unsigned241211093833.pdf', 'completed', 0, 0, 1, '2024-12-11 04:07:49', 0, NULL),
(224, '24/00224', '2024-12-02', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', '', '', '', '', 17, 'RV AGENCY ', 'GANAPATHI', '', '', 'CVT ISSUE', '', '', NULL, NULL, '', 'inprogress', 0, 0, 40, '2024-12-11 04:40:18', 0, NULL),
(225, '24/00225', '2024-12-04', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'AJAY', '123', '', '', '', '', 170, 'SHRI SWAMI SAMARTHA PETROLEUM', 'PANDHARPUR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-04at16.40.37241211103627.jpeg', '2024-12-04', '2025-06-03', './uploads/earthing_report/12598680_shri_swami_samarth_petroleum_04dec_unsigned241211103627.pdf', 'completed', 0, 0, 1, '2024-12-11 05:03:02', 0, NULL),
(226, '24/00226', '2024-12-04', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'AJAY', '123', '', '', '', '', 148, 'BANGOSAVI PETROLEUM', 'PANDHARPUR', '', '', 'earth pit testing', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-04at18.25.55241211110714.jpeg', '2024-12-04', '2025-06-03', './uploads/earthing_report/12581100_mshsdbangosavipetroleum,12581100_04dec_unsigned241211110714.pdf', 'completed', 0, 0, 1, '2024-12-11 05:21:21', 0, NULL),
(227, '24/00227', '2024-12-05', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'AJAY', '123', '', '', '', '', 35, 'ASHOKRATNA PETROLEUM', 'PANDHARPUR', '', '', 'earth pit testing', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-05at10.45.50241211111516.jpeg', '2024-12-05', '2025-06-04', './uploads/earthing_report/ashokratna241211111516.pdf', 'completed', 0, 0, 1, '2024-12-11 05:44:42', 0, NULL),
(228, '24/00228', '2024-12-05', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'AJAY', '123', '', '', '', '', 512, 'RAMAJI PETROLEUM', 'Pandharpur', '', '', 'erth pit testing', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-05at12.27.37241211112256.jpeg', '2024-12-05', '2025-06-04', './uploads/earthing_report/sramajipetroleum_05dec_unsigned241211112256.pdf', 'completed', 0, 0, 1, '2024-12-11 05:52:03', 0, NULL),
(229, '24/00229', '2024-12-05', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'AJAY', '123', '', '', '', '', 61, ' KADE BROTHERS AGRO AUTO CENTRE', 'PANDARPUR', '', '', 'earth pit testing', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-05at13.46.10241211114219.jpeg', '2024-12-05', '2025-06-04', './uploads/earthing_report/11137010_mshsdkadebrothersagroautocentre_05dec_unsigned241211114219.pdf', 'completed', 0, 0, 1, '2024-12-11 06:05:31', 0, NULL),
(230, '24/00230', '2024-12-11', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', 'KOVAI FUEL POINT', 'KRISHNARAYAPURAM ', '', '', 513, '', '', '', '', 'PYLON COMPLAINT', 'work completed', './uploads/job_letter/fb84f1d8-527d-44a6-86f5-db38c5af8046241211114427.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-11 06:13:58', 0, NULL),
(231, '24/00231', '2024-12-05', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'AJAY', '123', '', '', '', '', 166, 'SUNCHAYA PETROLEUM', 'SOLAPUR 2', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-05at15.01.01241211114613.jpeg', '2024-12-05', '2025-06-04', './uploads/earthing_report/12590860_mshsdsunchayapetroleum_05dec_unsigned241211114613.pdf', 'completed', 0, 0, 1, '2024-12-11 06:15:43', 0, NULL),
(232, '24/00232', '2024-12-11', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', 'TUCAS ', 'THUDIYALUR', '', '', 514, '', '', '', '', 'ELECTRICAL ISSUE', 'work completed', './uploads/job_letter/5afd66a6-68fe-421a-9f67-bcef4b8ac690241211114753.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-11 06:15:48', 0, NULL),
(233, '24/00233', '2024-12-11', 'chennai', '9', 'earth_renewal', 'G Joseph Margasis', 'APPU', '9363174843', 'EDATHUSSERY PETROLEUM ', 'OOTY', '', '', 515, '', '', '', '', 'EARTH RENEWAL', 'RENEW WORK COMPLETED', './uploads/job_letter/87ec42d5-fea2-47db-9ce7-ff83bebed552241211114825.jpg', '2024-12-11', '2025-06-10', './uploads/earthing_report/15652510_mshsdedapputhuserilpetroleums_11dec_unsigned241211114825.pdf', 'completed', 1, 0, 40, '2024-12-11 06:17:17', 0, NULL),
(234, '24/00234', '2024-12-05', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'AJAY', '123', '', '', '', '', 39, 'BHOSALE PATIL HIGHWAY SERVICES', 'PANDHARPUR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-05at16.30.27241211114817.jpeg', '2024-12-05', '2025-06-04', './uploads/earthing_report/12575960_bhosalepatilhighwayservice,12575960_05dec_unsigned241211114817.pdf', 'completed', 0, 0, 1, '2024-12-11 06:17:34', 0, NULL),
(235, '24/00235', '2024-12-05', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'AJAY', '123', '', '', '', '', 516, 'KAMALSAI PETROLEUM', 'Pandharpur', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-05at18.29.10241211115648.jpeg', '2024-12-05', '2025-06-04', './uploads/earthing_report/12565170_mshsdkamalsaipetroleum_05dec_unsigned241211115648.pdf', 'completed', 0, 0, 1, '2024-12-11 06:25:55', 0, NULL),
(236, '24/00236', '2024-12-06', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'AJAY', '123', '', '', '', '', 517, 'SANT SAVTA MALI PETROLEUM', 'Pandharpur', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-06at09.12.17241211120151.jpeg', '2024-12-06', '2025-06-05', './uploads/earthing_report/12559660_mshsdsantsavtamalipetroleum,12559660_06dec_unsigned241211120151.pdf', 'completed', 0, 0, 1, '2024-12-11 06:31:18', 0, NULL),
(237, '24/00237', '2024-12-06', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'AJAY', '123', '', '', '', '', 518, 'SHRI MAYURESHWAR PETROLEUM', 'Pandharpur', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-06at10.54.58241211121228.jpeg', '2024-12-06', '2025-06-05', './uploads/earthing_report/12582840_mshsdshrimayureshwarpetroleum_06dec_unsigned241211121228.pdf', 'completed', 0, 0, 1, '2024-12-11 06:41:01', 0, NULL),
(238, '24/00238', '2024-12-06', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'AJAY', '123', '', '', '', '', 49, 'SRI RAM HIGHWAY CENTRE', 'PANDHARPUR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-06at12.18.59241211121653.jpeg', '2024-12-06', '2025-06-05', './uploads/earthing_report/11019210_mshsdsriramhighwaycentre,12558920_06dec_unsigned241211121653.pdf', 'completed', 0, 0, 1, '2024-12-11 06:45:26', 0, NULL),
(239, '24/00239', '2024-12-06', 'mumbai', '4', 'earth_renewal', 'Raghunath S Parida', 'AJAY', '123', '', '', '', '', 519, 'SHAMBHURAJE PETROLEUM', 'Pandharpur', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-06at13.08.32241211123032.jpeg', '2024-12-06', '2025-06-05', './uploads/earthing_report/12528490_mshsdshambhurajepetroleum_06dec_unsigned241211123032.pdf', 'completed', 0, 0, 1, '2024-12-11 06:59:27', 0, NULL),
(240, '24/00240', '2024-12-11', 'chennai', '7', 'private_work', 'C Anbujothi', 'APPU', '9363174843', 'VASANTHAM AGENCIES ', 'TINDIVANAM', '', '', 520, '', '', '', '', 'POWER FACTOR INSTALLATION ', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-12-11 07:03:45', 0, NULL),
(241, '24/00241', '2024-12-11', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', '', '', '', '', 38, 'IGP PETROLEUM', 'CHITRAMCODE', '', '', 'STP ISSUE', 'work completed', './uploads/job_letter/68e1e10d-8ce5-41bd-9913-4cd9efe29c61241211125417.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-11 07:06:03', 0, NULL),
(242, '24/00242', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 521, 'Sudha Sagar Fuel Station', 'Bhopal Retail S.A.', '', '', 'EARTH PIT TESTING\r\n', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-13at15.31.21241216071432.jpeg', '2024-12-13', '2025-06-12', './uploads/earthing_report/12582570_sudhasagarfuelstation_13dec_unsigned241216071432.pdf', 'completed', 0, 0, 1, '2024-12-12 02:18:43', 0, NULL),
(243, '24/00243', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 522, ' Ansh Fuel Station', 'Hoshangabad Retail S.A.', '', '', 'EARTH PIT TESTING\r\n', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-25at16.23.34241228070631.jpeg', '2024-12-25', '2025-06-24', './uploads/earthing_report/12562180_mshsdanshfuelstation_25dec_unsigned241228070631.pdf', 'completed', 0, 0, 1, '2024-12-12 02:19:29', 0, NULL),
(244, '24/00244', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'Ajay', '123', '', '', '', '', 524, ' Adheesh Fuel', 'Sehore Retail S.A.', '', '', 'Earth pit testing\r\n', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-13at17.03.58241216071245.jpeg', '2024-12-13', '2025-06-12', './uploads/earthing_report/12539120_mshsdadheeshfuel,12539120_13dec_unsigned241216071245.pdf', 'completed', 0, 0, 61, '2024-12-12 02:22:13', 0, NULL),
(245, '24/00245', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 525, ' Shakunala Devi Filling Center', 'Sehore Retail S.A.', '', '', 'ERTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-15at13.36.26241216054456.jpeg', '2024-12-15', '2025-06-14', './uploads/earthing_report/12686900_mshsdshakunaladevifillingcenter_15dec_unsigned-1241216054456.pdf', 'completed', 0, 0, 1, '2024-12-12 02:22:44', 0, NULL),
(246, '24/00246', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 523, ' Yadav Sales & Service', 'Hoshangabad Retail S.A.', '', '', 'EARTH PIT TESTING\r\n', '', '', NULL, NULL, '', 'not_started', 0, 0, 1, '2024-12-12 02:23:28', 0, NULL),
(247, '24/00247', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 526, 'Shivgeeta Filling Station', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/jr241220114429.jpeg', '2024-12-16', '2025-06-15', './uploads/earthing_report/whatsappimage2024-12-16at13.04.10(1)241220114429.jpeg', 'completed', 0, 0, 1, '2024-12-12 02:24:32', 0, NULL),
(248, '24/00248', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 527, ' Ma Gayatri Filling Station-Gudrawa', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-20at16.09.36241220104421.jpeg', '2024-12-17', '2025-06-16', './uploads/earthing_report/epr241220104421.jpeg', 'completed', 0, 0, 1, '2024-12-12 02:25:13', 0, NULL),
(249, '24/00249', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 528, ' Neelkamal Kurawar', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', '', '', NULL, NULL, '', 'inprogress', 0, 1, 1, '2024-12-12 02:26:30', 0, NULL),
(250, '24/00250', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 529, 'Azad Petrol Pump', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-15at16.14.41241216052019.jpeg', '2024-12-15', '2025-06-14', './uploads/earthing_report/12588310_mshsdazadpetrolpump_15dec_unsigned241216052019.pdf', 'completed', 0, 0, 1, '2024-12-12 02:27:12', 0, NULL),
(251, '24/00251', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 530, '    Rajkumar Fuel Centre', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-16at18.14.44241220103515.jpeg', '2024-12-16', '2025-06-15', './uploads/earthing_report/12686890_mshsdrajkumarfuelcentre_16dec_unsigned-1241220103515.pdf', 'completed', 0, 0, 1, '2024-12-12 02:28:02', 0, NULL),
(252, '24/00252', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 531, ' Maa Pitambara Filling Station', 'Sehore Retail S.A.', '', '', 'ERTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-17at18.50.52241220062431.jpeg', '2024-12-17', '2025-06-16', './uploads/earthing_report/whatsappimage2024-12-17at18.50.53241220062431.jpeg', 'completed', 0, 0, 1, '2024-12-12 02:28:38', 0, NULL),
(253, '24/00253', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 532, 'Moolchand Hiralal Chhapiheda', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', '', '', NULL, NULL, '', 'not_started', 0, 0, 1, '2024-12-12 02:29:33', 0, NULL),
(254, '24/00254', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 533, ' Taj Filling Station', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-18at18.03.07241219114722.jpeg', '2024-12-18', '2025-06-17', './uploads/earthing_report/ept241219114722.jpeg', 'completed', 0, 0, 1, '2024-12-12 02:30:22', 0, NULL),
(255, '24/00255', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 534, ' Pragati Filling Station', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/jr241219111723.jpeg', '2024-12-18', '2025-06-17', './uploads/earthing_report/whatsappimage2024-12-18at12.46.37241219111723.jpeg', 'completed', 0, 0, 1, '2024-12-12 02:31:07', 0, NULL),
(256, '24/00256', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 535, ' Ajay Highway Agar', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/jr241219112510.jpeg', '2024-12-18', '2025-06-17', './uploads/earthing_report/whatsappimage2024-12-18at15.00.11241219112510.jpeg', 'completed', 0, 0, 1, '2024-12-12 02:32:12', 0, NULL),
(257, '24/00257', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 536, ' Gopal Ji Fuels', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTINIG', '', '', NULL, NULL, '', 'not_started', 0, 0, 1, '2024-12-12 02:32:53', 0, NULL),
(258, '24/00258', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 537, 'Devchand Dhapani Fillings', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-16at11.33.16241220114003.jpeg', '2024-12-16', '2025-06-15', './uploads/earthing_report/12581880_mshsddevchanddhapanifillings_16dec_unsigned-1241220114003.pdf', 'completed', 0, 0, 1, '2024-12-12 02:34:07', 0, NULL),
(259, '24/00259', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 538, ' Prayag Filling Station', 'Vidisha Retail S A', '', '', 'EARTH PITTESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-11at13.16.25241212120632.jpeg', '2024-12-11', '2025-06-10', './uploads/earthing_report/12587390_mshsdprayagfillingstation_11dec_unsigned-1241212120632.pdf', 'completed', 0, 0, 1, '2024-12-12 02:35:00', 0, NULL),
(260, '24/00260', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 539, ' J N Patel Fuels', 'Vidisha Retail S A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-12at11.41.29241212120031.jpeg', '2024-12-12', '2025-06-11', './uploads/earthing_report/12582490_mshsdjnpatelfuels,12582490_12dec_unsigned241212120031.pdf', 'completed', 0, 0, 1, '2024-12-12 02:35:45', 0, NULL);
INSERT INTO `complaint` (`id`, `sno`, `date`, `zone`, `branch`, `work_type`, `assign_to`, `complainter_name`, `complainter_number`, `outlet_name`, `outlet_location`, `contact_name`, `contact_number`, `outlet_id`, `old_outlet_name`, `old_outlet_location`, `old_contact_name`, `old_contact_number`, `description`, `job_remarks`, `job_report`, `checking_date`, `renewal_date`, `earthing_report`, `status`, `outlet_exists`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(261, '24/00261', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 540, ' Tomar Petrol Pump', 'Vidisha Retail S A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-14at13.57.41241216063256.jpeg', '2024-12-14', '2025-06-13', './uploads/earthing_report/12582320_mshsdtomarpetrolpump_14dec_unsigned241216063256.pdf', 'completed', 0, 0, 1, '2024-12-12 02:36:31', 0, NULL),
(262, '24/00262', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 541, 'Siyote Fuels , Sultanpur', 'Vidisha Retail S A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-11at18.34.40241212115629.jpeg', '2024-12-12', '2025-06-11', './uploads/earthing_report/12571870_siyotefuels,sultanpur,12571870_11dec_unsigned241212115629.pdf', 'completed', 0, 0, 1, '2024-12-12 02:37:21', 0, NULL),
(263, '24/00263', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 542, ' Chainpur Filling Station', 'Vidisha Retail S A', '', '', 'EARTH PIT TESTING\r\n', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-18at17.11.44241219115204.jpeg', '2024-12-18', '2025-06-17', './uploads/earthing_report/12580890_mshsdchainpurfillingstation,12580890_18dec_unsigned241219115204.pdf', 'completed', 0, 0, 61, '2024-12-12 03:44:23', 0, NULL),
(264, '24/00264', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 543, ' Adhoc Jaithari Filling Station', 'Vidisha Retail S A', '', '', 'EARTH PIT TESTING', '', '', NULL, NULL, '', 'not_started', 0, 0, 61, '2024-12-12 03:45:22', 0, NULL),
(265, '24/00265', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 544, ' Diesel Sales And Service', 'Vidisha Retail S A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/jr241214115528.jpeg', '2024-12-12', '2025-06-11', './uploads/earthing_report/whatsappimage2024-12-12at13.37.02241214115528.jpeg', 'completed', 0, 1, 61, '2024-12-12 03:46:22', 0, NULL),
(266, '24/00266', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 545, 'Adhoc Kundalli Filling Station', 'Vidisha Retail S A', '', '', 'EARTH PIT TESTING', '', '', NULL, NULL, '', 'not_started', 0, 0, 61, '2024-12-12 03:47:44', 0, NULL),
(267, '24/00267', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 546, ' Shriram Sales & Service', 'Vidisha Retail S A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-21at18.05.43241224110905.jpeg', '2024-12-21', '2025-06-20', './uploads/earthing_report/11508210_mshsdshriramsales&service_21dec_unsigned241224110905.pdf', 'completed', 0, 0, 61, '2024-12-12 03:48:23', 0, NULL),
(268, '24/00268', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 547, ' Yashashwini Filling Station', 'Vidisha Retail S A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-17at11.12.01241219120614.jpeg', '2024-12-17', '2025-06-16', './uploads/earthing_report/12502340_mshsdyashashwinifillingstation_17dec_unsigned241219120614.pdf', 'completed', 0, 0, 61, '2024-12-12 03:50:52', 0, NULL),
(269, '24/00269', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 548, ' Adhoc Aalampur Filling Station', 'Vidisha Retail S A', '', '', 'EARTH PIT TESTING\r\n', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-12at13.37.02241216071856.jpeg', '2024-12-12', '2025-06-11', './uploads/earthing_report/12881970_mshsdadhocaalampurfillingstation,12881970_12dec_unsigned241216071856.pdf', 'completed', 0, 0, 61, '2024-12-12 03:51:42', 0, NULL),
(270, '24/00270', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 549, ' Shree Shastri Petroleum', 'Vidisha Retail S A', '', '', 'EARTH PIT TESTING\r\n', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-15at15.54.24241216052421.jpeg', '2024-12-15', '2025-06-14', './uploads/earthing_report/12582390_mshsdshreeshastripetroleum_15dec_unsigned241216052421.pdf', 'completed', 0, 0, 61, '2024-12-12 03:52:37', 0, NULL),
(271, '24/00271', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 550, ' Aalampur Filling Station', 'Vidisha Retail S A', '', '', 'EARTHPIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-13at18.17.13241216065621.jpeg', '2024-12-13', '2025-06-12', './uploads/earthing_report/12551720_mshsdaalampurfillingstation,12551720_13dec_unsigned241216065621.pdf', 'completed', 0, 0, 61, '2024-12-12 03:53:44', 0, NULL),
(272, '24/00272', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 551, ' Kundali Filling Station', 'Vidisha Retail S A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-16at14.45.24241220115740.jpeg', '2024-12-16', '2025-06-15', './uploads/earthing_report/12581840_mshsdkundalifillingstation,12581840_16dec_unsigned-1241220115740.pdf', 'completed', 0, 0, 61, '2024-12-12 03:54:29', 0, NULL),
(273, '24/00273', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 552, ' Maruti Petroleum', 'Vidisha Retail S A', '', '', 'EARH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-17at14.06.39241220052634.jpeg', '2024-12-17', '2025-06-16', './uploads/earthing_report/12586460_mshsdmarutipetroleum_17dec_unsigned241220052634.pdf', 'completed', 0, 0, 61, '2024-12-12 03:55:20', 0, NULL),
(274, '24/00274', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 553, ' Adhoc Bina Refinary Ser Station', 'Vidisha Retail S A', '', '', 'EARTH PIT TESTIING ', '', '', NULL, NULL, '', 'not_started', 0, 0, 61, '2024-12-12 03:56:18', 0, NULL),
(275, '24/00275', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 554, 'Kanak Fuel Station', 'Vidisha Retail S A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-18at14.05.49241219111933.jpeg', '2024-12-18', '2025-06-17', './uploads/earthing_report/12533820_kanakfuelstation,12533820_18dec_unsigned-2241219111933.pdf', 'completed', 0, 0, 61, '2024-12-12 03:57:11', 0, NULL),
(276, '24/00276', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 555, ' Mahadev Fuel Station', 'Vidisha Retail S A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-11at16.49.33241212120417.jpeg', '2024-12-11', '2025-06-10', './uploads/earthing_report/12586480_mshsdmahadevfuelstation_11dec_unsigned241212120418.pdf', 'completed', 0, 0, 61, '2024-12-12 03:58:52', 0, NULL),
(277, '24/00277', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 556, ' Shiv Kripa Fuel', 'Vidisha Retail S A', '', '', 'EARTH PIT TESTIG', '', '', NULL, NULL, '', 'not_started', 0, 0, 61, '2024-12-12 04:01:02', 0, NULL),
(278, '24/00278', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 557, 'Shubham Dcm Transport', 'Vidisha Retail S A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-11at12.04.20241212123056.jpeg', '2024-12-11', '2025-06-10', './uploads/earthing_report/11725800_shubhamdcmtransport,11725800_11dec_unsigned-1241212123056.pdf', 'completed', 0, 0, 61, '2024-12-12 04:01:46', 0, NULL),
(279, '24/00279', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 558, ' Jai Maa Filling Station', 'Vidisha Retail S A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-15at12.26.10241216055257.jpeg', '2024-12-15', '2025-06-14', './uploads/earthing_report/12516630_mshsdjaimaafillingstation_15dec_unsigned241216055257.pdf', 'completed', 0, 0, 61, '2024-12-12 04:04:51', 0, NULL),
(280, '24/00280', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 559, ' Motilal Fuel Station', 'Vidisha Retail S A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-13at17.01.02241216070933.jpeg', '2024-12-13', '2025-06-12', './uploads/earthing_report/12587180_mshsdmotilalfuelstation_13dec_unsigned241216070933.pdf', 'completed', 0, 0, 61, '2024-12-12 04:07:29', 0, NULL),
(281, '24/00281', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 560, ' Tejashwani Filling Station', 'Vidisha Retail S A', '', '', 'EARTH PIT TSTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-18at16.04.15241219114134.jpeg', '2024-12-18', '2025-06-17', './uploads/earthing_report/12514770_mshsdtejashwanifillingstation_18dec_unsigned-1241219114134.pdf', 'completed', 0, 0, 61, '2024-12-12 04:09:30', 0, NULL),
(282, '24/00282', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 561, ' Aarya Petroleum', 'Vidisha Retail S A', '', '', 'EARTH PIT TSTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-16at17.18.43241220103727.jpeg', '2024-12-16', '2025-06-15', './uploads/earthing_report/12553440_mshsdaaryapetroleum_16dec_unsigned241220103727.pdf', 'completed', 0, 0, 61, '2024-12-12 04:24:47', 0, NULL),
(283, '24/00283', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 562, ' Jai Mata Dee Fuel Station', 'Vidisha Retail S A', '', '', 'EARTH PIT TESTING', '', '', NULL, NULL, '', 'not_started', 0, 0, 61, '2024-12-12 04:26:47', 0, NULL),
(284, '24/00284', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 563, ' Sultanganj Filling Station', 'Vidisha Retail S A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/jr241216062306.jpeg', '2024-12-14', '2025-06-13', './uploads/earthing_report/whatsappimage2024-12-14at16.58.41241216062307.jpeg', 'completed', 0, 0, 61, '2024-12-12 04:27:31', 0, NULL),
(285, '24/00285', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 564, ' Rajendra Singh & Bros', 'Vidisha Retail S A', '', '', 'EARTH PIT TESTING\r\n', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-18at18.20.54241219115437.jpeg', '2024-12-18', '2025-06-17', './uploads/earthing_report/11496010_mshsdrajendrasingh&bros_18dec_unsigned241219115437.pdf', 'completed', 0, 0, 61, '2024-12-12 04:29:20', 0, NULL),
(286, '24/00286', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 565, ' Amar Petrol Pump', 'Vidisha Retail S A', '', '', 'EARTH PIT TESTING', '', '', NULL, NULL, '', 'not_started', 0, 0, 61, '2024-12-12 04:31:03', 0, NULL),
(287, '24/00287', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 565, ' Amar Petrol Pump', 'Vidisha Retail S A', '', '', 'EARTH PIT TESTING', '', '', NULL, NULL, '', 'not_started', 0, 0, 61, '2024-12-12 04:31:04', 0, NULL),
(288, '24/00288', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 566, ' Maruti Diesels', 'Vidisha Retail S A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-15at14.36.35241216054139.jpeg', '2024-12-15', '2025-06-14', './uploads/earthing_report/12522420_mshsdmarutidiesels_15dec_unsigned-1241216054139.pdf', 'completed', 0, 0, 61, '2024-12-12 04:31:55', 0, NULL),
(289, '24/00289', '2024-12-11', 'chennai', '9', 'earth_renewal', 'G Joseph Margasis', 'APPU', '9363174843', 'BLUE STAR', 'OOTY', '', '', 611, '', '', '', '', 'EARTH RENEWAL ', 'RENEW WORK COMPLETED', './uploads/job_letter/246dce68-f886-48cc-aced-7bf1de1d2197241212101106.jpg', '2024-12-11', '2025-06-10', './uploads/earthing_report/15096500_mshsdbluestar,15096500_11dec_unsigned241212101106.pdf', 'completed', 1, 0, 40, '2024-12-12 04:38:12', 0, NULL),
(290, '24/00290', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 567, 'G S Petroleum', 'Vidisha Retail S A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-17at15.56.01241220053341.jpeg', '2024-12-17', '2025-06-16', './uploads/earthing_report/12582370_gspetroleum,12582370_17dec_unsigned241220053341.pdf', 'completed', 0, 0, 61, '2024-12-12 04:41:22', 0, NULL),
(291, '24/00291', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 568, ' Atwal Petro', 'Vidisha Retail S A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-12at18.08.59241214120116.jpeg', '2024-12-12', '2025-06-11', './uploads/earthing_report/12526370_mshsdatwalpetro_12dec_unsigned241214120116.pdf', 'completed', 0, 0, 61, '2024-12-12 04:42:10', 0, NULL),
(292, '24/00292', '2024-12-12', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', '', '', '', '', 33, 'SREE RAJARAJESHWARI ENTERPRISES', 'THARUVAI', '', '', 'PYLON COMPLAINT ', 'work completed', './uploads/job_letter/a28df0d1-08bb-4c0d-be5a-a1f8fd99dd3f241212101553.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-12 04:42:21', 0, NULL),
(293, '24/00293', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 569, ' Mala Fuel Service', 'Vidisha Retail S A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/jr241216065114.jpeg', '2024-12-14', '2025-06-13', './uploads/earthing_report/whatsappimage2024-12-14at12.12.49241216065114.jpeg', 'completed', 0, 0, 61, '2024-12-12 04:43:01', 0, NULL),
(294, '24/00294', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 570, ' Happy Petroleum', 'Vidisha Retail S A', '', '', 'EARTH PIT TESTING', '', '', NULL, NULL, '', 'not_started', 0, 0, 61, '2024-12-12 04:43:37', 0, NULL),
(295, '24/00295', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 571, ' Jaithari Filling Station', 'Vidisha Retail S A', '', '', 'EARTH PIT TESING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-16at19.18.04241220102625.jpeg', '2024-12-16', '2025-06-15', './uploads/earthing_report/12581830_mshsdjaitharifillingstation,12581830_16dec_unsigned241220102625.pdf', 'completed', 0, 0, 61, '2024-12-12 04:44:17', 0, NULL),
(296, '24/00296', '2024-12-12', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', '', '', '', '', 509, 'AS KANI FUELS ', 'PERUMALPURAM ', '', '', 'STP COMPLAINT ', 'work completed', './uploads/job_letter/66f69330-81d7-4d24-aac5-ef5f5c3df43a241212101615.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-12 04:44:18', 0, NULL),
(297, '24/00297', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 572, ' Sardar Filling Station', 'Vidisha Retail S A', '', '', 'EARTHH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-14at12.13.34241216064900.jpeg', '2024-12-14', '2025-06-13', './uploads/earthing_report/12586450_mshsdsardarfillingstation_14dec_unsigned-1241216064900.pdf', 'completed', 0, 0, 61, '2024-12-12 04:45:27', 0, NULL),
(298, '24/00298', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 573, ' Raguvanshi Krishi Sewa Kendra', 'Vidisha Retail S A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-15at17.53.26241216050611.jpeg', '2024-12-15', '2025-06-14', './uploads/earthing_report/11748010_mshsdraguvanshikrishisewakendra_15dec_unsigned241216050611.pdf', 'completed', 0, 0, 61, '2024-12-12 04:46:11', 0, NULL),
(299, '24/00299', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 574, ' Parshvanath Petroleum', 'Vidisha Retail S A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-15at10.31.51241216055548.jpeg', '2024-12-15', '2025-06-14', './uploads/earthing_report/12582550_mshsdparshvanathpetroleum_15dec_unsigned241216055548.pdf', 'completed', 0, 0, 61, '2024-12-12 04:47:20', 0, NULL),
(300, '24/00300', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 576, ' Maa Karma Petrol Pump', 'Vidisha Retail S A', '', '', 'EARTH PIT TESTING\r\n', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-12at17.14.06241212114844.jpeg', '2024-12-12', '2025-06-11', './uploads/earthing_report/12582340_mshsdmaakarmapetrolpump,12582340_12dec_unsigned-1241212114844.pdf', 'completed', 0, 0, 61, '2024-12-12 04:48:03', 0, NULL),
(301, '24/00301', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 575, ' Jai Durge Filling Station', 'Vidisha Retail S A', '', '', 'EARH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-20at10.04.39241224111505.jpeg', '2024-12-20', '2025-06-19', './uploads/earthing_report/12558120_mshsdjaidurgefillingstation_20dec_signed241224111506.pdf', 'completed', 0, 0, 61, '2024-12-12 04:49:05', 0, NULL),
(302, '24/00302', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 577, 'Bapu Shree Cargo', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', '', '', NULL, NULL, '', 'not_started', 0, 0, 61, '2024-12-12 04:56:49', 0, NULL),
(303, '24/00303', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 578, 'Adhoc Gandhi Fuels', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING\r\n', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-20at16.23.52241220110838.jpeg', '2024-12-19', '2025-06-18', './uploads/earthing_report/12687000_adhocgandhifuels_19dec_unsigned241220110838.pdf', 'completed', 0, 0, 61, '2024-12-12 04:57:47', 0, NULL),
(304, '24/00304', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 579, 'Prabha Refuelling Station', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/jr241219114430.jpeg', '2024-12-18', '2025-06-17', './uploads/earthing_report/whatsappimage2024-12-18at16.47.29241219114430.jpeg', 'completed', 0, 0, 61, '2024-12-12 04:58:30', 0, NULL),
(305, '24/00305', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 580, 'Bajrang Krupa Fuels', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/jr241219115705.jpeg', '2024-12-18', '2025-06-17', './uploads/earthing_report/whatsappimage2024-12-18at19.06.53241219115705.jpeg', 'completed', 0, 0, 61, '2024-12-12 04:59:02', 0, NULL),
(306, '24/00306', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 581, 'Biaora Sales & Service', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-13at18.01.44241216065842.jpeg', '2024-12-13', '2025-06-12', './uploads/earthing_report/11480510_mshsdbiaorasales&service_13dec_unsigned241216065842.pdf', 'completed', 0, 0, 61, '2024-12-12 04:59:31', 0, NULL),
(307, '24/00307', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 582, 'Shri Lala Automobile', 'Bhopal Retail S.A.', '', '', 'EARTH PIT TESTING', '', '', NULL, NULL, '', 'not_started', 0, 0, 61, '2024-12-12 05:00:19', 0, NULL),
(308, '24/00308', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 583, 'Adhoc Maa Ganga Filling Station', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/adhocmaaganga241220093501.jpeg', '2024-12-19', '2025-06-18', './uploads/earthing_report/12881870_adhocmaagangafillingstation_19dec_unsigned-1241220093501.pdf', 'completed', 0, 0, 61, '2024-12-12 05:01:03', 0, NULL),
(309, '24/00309', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 584, 'Shrinathji Fuels Ashta', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', '', '', NULL, NULL, '', 'not_started', 0, 0, 61, '2024-12-12 05:01:41', 0, NULL),
(310, '24/00310', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 585, 'Madhav Energy Station', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-14at15.45.28241216062618.jpeg', '2024-12-14', '2025-06-13', './uploads/earthing_report/12580190_mshsdmadhavenergystation_14dec_unsigned-1241216062618.pdf', 'completed', 0, 0, 61, '2024-12-12 05:02:22', 0, NULL),
(311, '24/00311', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 586, 'Jai Baba Petrol Pump', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', '', '', NULL, NULL, '', 'not_started', 0, 0, 61, '2024-12-12 05:02:59', 0, NULL),
(312, '24/00312', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 587, 'Anil Transport Co', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/aniljr241219121857.jpeg', '2024-12-17', '2025-06-16', './uploads/earthing_report/12580930_aniltransportco,12580930_17dec_unsigned241219121857.pdf', 'completed', 0, 0, 61, '2024-12-12 05:03:54', 0, NULL),
(313, '24/00313', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 588, 'Hariom Petrol Pump', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-20at14.49.48241220093556.jpeg', '2024-12-19', '2025-06-18', './uploads/earthing_report/12586980_mshsdhariompetrolpump_19dec_unsigned241220093556.pdf', 'completed', 0, 0, 61, '2024-12-12 05:04:31', 0, NULL),
(314, '24/00314', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 589, 'Power Fuels', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', '', '', NULL, NULL, '', 'not_started', 0, 0, 1, '2024-12-12 05:05:40', 0, NULL),
(315, '24/00315', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 590, 'Sidha Vinayak Fuel Center', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', '', '', NULL, NULL, '', 'not_started', 0, 0, 61, '2024-12-12 05:10:00', 0, NULL),
(316, '24/00316', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 591, 'Shree Siddhveer Petroleum', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', '', '', NULL, NULL, '', 'not_started', 0, 0, 61, '2024-12-12 05:11:18', 0, NULL),
(317, '24/00317', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 592, 'Pavitra Moti Filling Stn', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-16at16.33.25241226113417.jpeg', '2024-12-16', '2025-06-15', './uploads/earthing_report/12881860_pavitramotifillingstn_16dec_unsigned-1241226113417.pdf', 'completed', 0, 0, 61, '2024-12-12 05:12:04', 0, NULL),
(318, '24/00318', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 593, 'Police Welfare Fuel Centre-Biaora', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-14at18.32.44241226105202.jpeg', '2024-12-14', '2025-06-13', './uploads/earthing_report/12881850_mshsdpolicewelfarefuelcentre-biaora_14dec_unsigned-1241226105202.pdf', 'completed', 0, 0, 61, '2024-12-12 05:12:45', 0, NULL),
(319, '24/00319', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 594, 'Adhoc Anil Transport Co.', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', '', '', NULL, NULL, '', 'not_started', 0, 0, 61, '2024-12-12 05:13:35', 0, NULL),
(320, '24/00320', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 595, 'Shri Siddhanath Fuels', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', '', '', NULL, NULL, '', 'not_started', 0, 0, 61, '2024-12-12 05:14:43', 0, NULL),
(321, '24/00321', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 596, 'Patel Filling Station', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/jr241220091123.jpeg', '2024-12-19', '2025-06-18', './uploads/earthing_report/whatsappimage2024-12-19at12.35.21241220091123.jpeg', 'completed', 0, 0, 61, '2024-12-12 05:15:42', 0, NULL),
(322, '24/00322', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 597, 'Mahakaal Filling Station', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/mjr241220100834.jpeg', '2024-12-19', '2025-06-18', './uploads/earthing_report/whatsappimage2024-12-19at15.52.15241220100834.jpeg', 'completed', 0, 0, 61, '2024-12-12 05:16:19', 0, NULL),
(323, '24/00323', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 598, 'Anandilal Champalal Agarwal', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-15at12.29.28241216054936.jpeg', '2024-12-15', '2025-06-14', './uploads/earthing_report/11516011_hsdanandilalchampalalagarwal,11516011_15dec_unsigned241216054936.pdf', 'completed', 0, 0, 61, '2024-12-12 05:17:44', 0, NULL),
(324, '24/00324', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 599, 'Hp Auto Centre Ashta', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', '', '', NULL, NULL, '', 'not_started', 0, 0, 61, '2024-12-12 05:18:55', 0, NULL),
(325, '24/00325', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 600, 'Shri Siddarth Petrol Pump', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', '', '', NULL, NULL, '', 'not_started', 0, 0, 61, '2024-12-12 05:21:00', 0, NULL),
(326, '24/00326', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 601, 'Hare Krishanan Petroleum', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', '', '', NULL, NULL, '', 'not_started', 0, 0, 61, '2024-12-12 05:22:12', 0, NULL),
(327, '24/00327', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 602, 'Purshottam Filling Station', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-19at17.04.12241220101100.jpeg', '2024-12-19', '2025-06-18', './uploads/earthing_report/etc241220101100.jpeg', 'completed', 0, 0, 61, '2024-12-12 05:24:24', 0, NULL),
(328, '24/00328', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 603, 'Ms A C Agrawal', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-14at14.57.57241216063046.jpeg', '2024-12-14', '2025-06-13', './uploads/earthing_report/11516010_msacagrawal,11516010_14dec_signed-1241216063046.pdf', 'completed', 0, 0, 61, '2024-12-12 05:25:29', 0, NULL),
(329, '24/00329', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 604, 'Sauhard Petroleum Malikhedi', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', '', '', NULL, NULL, '', 'not_started', 0, 0, 61, '2024-12-12 05:26:25', 0, NULL),
(330, '24/00330', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 605, 'Kesar Petroleum Jethdajod', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', '', '', NULL, NULL, '', 'not_started', 0, 0, 61, '2024-12-12 05:27:07', 0, NULL),
(331, '24/00331', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 606, 'Anand Filling Centre, Shajapur', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', '', '', NULL, NULL, '', 'not_started', 0, 0, 61, '2024-12-12 05:27:45', 0, NULL),
(332, '24/00332', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 607, 'Aarambh Filling Station', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', '', '', NULL, NULL, '', 'not_started', 0, 0, 61, '2024-12-12 05:28:41', 0, NULL),
(333, '24/00333', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 608, 'National Filling Station', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', '', '', NULL, NULL, '', 'not_started', 0, 0, 61, '2024-12-12 05:29:25', 0, NULL),
(334, '24/00334', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 609, 'Raj Freight', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-15at17.22.51241216051301.jpeg', '2024-12-15', '2025-06-14', './uploads/earthing_report/11579200_mshsdrajfreight,bilapura,11579200_15dec_unsigned241216051301.pdf', 'completed', 0, 0, 61, '2024-12-12 05:30:03', 0, NULL),
(335, '24/00335', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 610, 'Marwadi Filling Station', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-18at11.10.22241219111035.jpeg', '2024-12-18', '2025-06-17', './uploads/earthing_report/eptr241219111035.jpeg', 'completed', 0, 0, 61, '2024-12-12 05:30:44', 0, NULL),
(336, '24/00336', '2024-12-12', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 612, 'Patel Petroleum', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', '', '', NULL, NULL, '', 'not_started', 0, 0, 61, '2024-12-12 05:33:35', 0, NULL),
(337, '24/00337', '2024-12-12', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 613, 'ANMOL FILLING STATION', 'Bhopal Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-12at15.36.47241212114632.jpeg', '2024-12-12', '2025-06-11', './uploads/earthing_report/12519450_anmolfillingstation_12dec_unsigned241212114632.pdf', 'completed', 0, 0, 61, '2024-12-12 05:44:50', 0, NULL),
(338, '24/00338', '2024-12-11', 'indore', '2', 'maintenance', 'Prabhudayal Patel', 'AJAY', '123', 'Bhagyashree Petroleum', 'BHOPAL', '', '', 614, '', '', '', '', 'stabilizer issue', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-11at20.45.07241212121308.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 61, '2024-12-12 06:42:13', 0, NULL),
(339, '24/00339', '2024-12-12', 'indore', '2', 'maintenance', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 615, 'Fateh Guru Govind Singh Fuels', 'BHOPAL', '', '', 'EV CHARGER INSTALLATION', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-12at13.03.26241212122247.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-12 06:52:14', 0, NULL),
(340, '24/00340', '2024-12-11', 'indore', '2', 'maintenance', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 616, 'Seth Tulsiram Rameshwar', 'BHOPAL', '', '', 'section motor issue', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-11at16.37.45241212122856.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-12 06:58:30', 0, NULL),
(341, '24/00341', '2024-12-11', 'indore', '2', 'maintenance', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 114, 'AMD PETROLEUM ', 'BARKHEDI KALAN', '', '', 'DU POWER SUPPLY ISSUE', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-10at16.10.29241212123412.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-12 07:02:52', 0, NULL),
(342, '24/00342', '2024-12-13', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', '', '', '', '', 55, 'BSV & BROS ADHOC ', 'GANDHIPURAM', '', '', 'GENSET COMPLAIT', 'work completed', './uploads/job_letter/75098634-2ad9-49ce-86f0-be331add15b6241214120111.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-13 05:04:16', 40, '2024-12-13 12:13:47'),
(343, '24/00343', '2024-12-13', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'SRI VENKATESH AGENCIES ', 'CHERANMAHADEVI ', '', '', 617, '', '', '', '', 'LIGHT REPAIRING ', 'work completed', './uploads/job_letter/e822c8ae-54ea-4927-ad2c-6b5c4987a24b241213115348.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-13 05:14:20', 0, NULL),
(344, '24/00344', '2024-12-13', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'PANDIYAN AUTOMOBILES LTD ', 'PALAYAMKOTTAI ', '', '', 618, '', '', '', '', 'SITE VISITE', 'work completed', './uploads/job_letter/a7ae07c0-737f-4606-ac98-92c743eeb278241213115417.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-13 05:16:50', 0, NULL),
(345, '24/00345', '2024-12-13', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'JAY LAKSHMI ENERGY ', 'TIRUNELVELI', '', '', 619, '', '', '', '', '\r\nTREATMENT CHART FIXING ', 'work completed', './uploads/job_letter/268e327d-ec30-4fcc-b82c-22ba522b3375241213115532.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-13 05:33:36', 0, NULL),
(346, '24/00346', '2024-12-13', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'UMA TRADERS ADHOC ', '', '', '', 94, 'UMA TRADERS ADHOC ', 'TIRUNELVELI', '', '', 'ELECTRICAL COMPLAINT ', 'work completed', './uploads/job_letter/68cdc442-d7fc-40f0-9c9c-0d689317d75d241213115558.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-13 05:35:09', 0, NULL),
(347, '24/00347', '2024-12-13', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', '', '', '', '', 499, 'ADHOC   R K PETROLEUM', 'THIRUNAGESWARAM', '', '', 'LIGHT REPAIRING ', 'work completed', './uploads/job_letter/6eb0dce8-b802-42ec-bcc9-81af23ba4128241213122008.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-13 05:40:04', 0, NULL),
(348, '24/00348', '2024-12-13', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'EDATHUVA FUELS ', 'CHATRAM ', '', '', 620, '', '', '', '', 'SAFTY WORK ', 'work completed', './uploads/job_letter/414afd33-d531-4034-aeef-072a4245df35241213120922.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-13 05:42:28', 40, '2024-12-13 12:07:25'),
(349, '24/00349', '2024-12-13', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'NOREEN ENTERPRISES', 'ADUTHURAI', '', '', 621, '', '', '', '', 'CVT COMPLAINT ', 'work completed', './uploads/job_letter/9ecc7a58-7cdb-445c-936e-eac6a68b9641241213122041.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-13 05:44:03', 0, NULL),
(350, '24/00350', '2024-12-13', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'MKS AGENCIES ', 'THANJAVUR ', '', '', 622, '', '', '', '', 'SAFETY WORK ', 'work completed', './uploads/job_letter/77b3cefd-21e0-4694-9560-febe59f44610241213122517.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-13 05:47:09', 40, '2024-12-13 12:24:48'),
(351, '24/00351', '2024-12-13', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'JAYAGANESAN', 'THANJAVUR', '', '', 623, '', '', '', '', 'SAFETY WORK ', 'work completed', './uploads/job_letter/1e38ec0b-587a-4dc8-89f0-e2c440bccd77241213122538.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-13 05:54:49', 0, NULL),
(352, '24/00352', '2024-12-13', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'KARUNYA AGENCIES ADHOC ', 'THANJAVUR', '', '', 624, '', '', '', '', 'EARTH DIAGRAM FIXING ', 'work completed', './uploads/job_letter/7dacb238-ce19-43f6-8d3e-c9ae2f17416d241213122611.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-13 05:57:39', 0, NULL),
(353, '24/00353', '2024-12-13', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'SRI BALAVINAYAGAR AGENCIES ', 'THANJAVUR', '', '', 625, '', '', '', '', 'CVT COMPLAINT ', 'work completed', './uploads/job_letter/a9227bfe-b25b-4238-a547-bb134f539a36241213122634.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-13 05:59:08', 0, NULL),
(354, '24/00354', '2024-12-04', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 626, 'ADHOC MAHIMA FILLING STATION', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-04at13.30.35241213115150.jpeg', '2024-12-04', '2025-06-03', './uploads/earthing_report/12686960_adhocmahimafillingstation_04dec_unsigned-1241213115150.pdf', 'completed', 0, 0, 61, '2024-12-13 06:20:57', 0, NULL),
(355, '24/00355', '2024-12-04', 'indore', '2', 'maintenance', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 626, 'ADHOC MAHIMA FILLING STATION', 'Sehore Retail S.A.', '', '', 'AUTOMATION PANNEL ISSUE', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-04at13.33.37241213115402.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-13 06:23:26', 0, NULL),
(356, '24/00356', '2024-12-04', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 627, 'SHIV SHAKTI FILLING CENTER', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING\r\n', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-04at15.17.49241213115952.jpeg', '2024-12-04', '2025-06-03', './uploads/earthing_report/12556310_mshsdshivshaktifillingcenter_04dec_unsigned241213115952.pdf', 'completed', 0, 0, 61, '2024-12-13 06:29:09', 0, NULL),
(357, '24/00357', '2024-12-04', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 628, 'ABHIMANYU FILLING STATION', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-04at17.18.15241213120443.jpeg', '2024-12-04', '2025-06-03', './uploads/earthing_report/12548950_mshsdabhimanyufillingstation_04dec_unsigned241213120443.pdf', 'completed', 0, 0, 61, '2024-12-13 06:33:54', 0, NULL),
(358, '24/00358', '2024-12-04', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 629, 'ANNAPURNA PETROL PUMP', 'Sehore', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-04at18.38.30(1)241213121356.jpeg', '2024-12-04', '2025-06-03', './uploads/earthing_report/eathpitcerificate241213121356.jpeg', 'completed', 0, 0, 61, '2024-12-13 06:42:38', 0, NULL),
(359, '24/00359', '2024-12-05', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 630, 'MAHIMA FILLING STATION', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-05at13.11.23241213121806.jpeg', '2024-12-05', '2025-06-04', './uploads/earthing_report/12686950_mshsdmahimafillingstation_05dec_unsigned241213121807.pdf', 'completed', 0, 0, 61, '2024-12-13 06:47:08', 0, NULL),
(360, '24/00360', '2024-12-05', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 631, 'SHRI BALAJI FUELS', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-05at14.26.35241213122102.jpeg', '2024-12-05', '2025-06-04', './uploads/earthing_report/41032639_shribalajifuels_05dec_unsigned241213122102.pdf', 'completed', 0, 0, 61, '2024-12-13 06:50:18', 0, NULL),
(361, '24/00361', '2024-12-05', 'indore', '2', 'maintenance', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 557, 'Shubham Dcm Transport', 'Vidisha Retail S A', '', '', 'CANOPY LIGHT ISSUE', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-05at14.51.05241213122426.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-13 06:53:53', 0, NULL),
(362, '24/00362', '2024-12-05', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 632, 'Ishan filling station', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-05at18.13.55241213122806.jpeg', '2024-12-05', '2025-06-04', './uploads/earthing_report/12553470_ishanfillingstation.nasrullahganj_05dec_unsigned241213122806.pdf', 'completed', 0, 0, 61, '2024-12-13 06:57:26', 0, NULL),
(363, '24/00363', '2024-12-13', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'SANTHI AGENCY ', 'THANJAVUR', '', '', 633, '', '', '', '', 'SAFETY WORK ', 'work completed', './uploads/job_letter/dce05698-2127-49fa-ae61-7cdcf78c8647241213122930.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-13 06:59:05', 0, NULL),
(364, '24/00364', '2024-12-05', 'indore', '2', 'maintenance', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 632, 'Ishan filling station', 'Sehore Retail S.A.', '', '', 'UPS ISSUE', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-05at18.22.52241213123101.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-13 06:59:59', 0, NULL),
(365, '24/00365', '2024-12-13', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'Ajay', '123', '', '', '', '', 449, ' JAI JINENDRA PETROLEUM', 'DHAR', '', '', 'Earth pit testing', 'Job completed', './uploads/job_letter/screenshot_2024-12-13-22-51-53-786_com.google.android.apps.docs241213172853.jpg', '2024-12-13', '2025-06-12', './uploads/earthing_report/12546660_mshsdjaijinendrapetroleum_13dec_unsigned241213172854.pdf', 'completed', 0, 0, 61, '2024-12-13 11:54:04', 0, NULL),
(366, '24/00366', '2024-12-06', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 634, 'SHIVANI FILLING STATION', 'Sehore Retail S.A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-06at11.49.19241214100349.jpeg', '2024-12-06', '2025-06-05', './uploads/earthing_report/12523230_mshsdshivanifillingstation_05dec_unsigned241214100349.pdf', 'completed', 0, 0, 61, '2024-12-14 04:32:50', 0, NULL),
(367, '24/00367', '2024-12-06', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 635, ' VISHAL SER STATION', 'Sehore Retail S.A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-06at14.49.58241214100939.jpeg', '2024-12-06', '2025-06-05', './uploads/earthing_report/11503110_mshsdvishalserstation_06dec_unsigned241214100939.pdf', 'completed', 0, 0, 61, '2024-12-14 04:38:58', 0, NULL),
(368, '24/00368', '2024-12-06', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 636, 'NEW KASTURI FUEL CENTRE', 'Sehore Retail S.A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-06at15.49.26241214101320.jpeg', '2024-12-06', '2025-06-05', './uploads/earthing_report/12580950_mshsdnewkasturifuelcentre_06dec_unsigned241214101320.pdf', 'completed', 0, 0, 61, '2024-12-14 04:42:39', 0, NULL),
(369, '24/00369', '2024-12-06', 'indore', '2', 'maintenance', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 637, 'RADHA & KRISHNA FILLING STATION', 'BHOPAL', '', '', 'AUTOMATION POWER SUPPLY DUO ISSUE', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-06at16.24.18241214101938.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-14 04:49:06', 0, NULL),
(370, '24/00370', '2024-12-14', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', 'KOVAI FUEL POINT', '', '', '', 513, 'KOVAI FUEL POINT', 'KRISHNARAYAPURAM ', '', '', 'COMPLAINT ', 'work completed', './uploads/job_letter/714a013b-b86e-4d6e-8510-129f6adc13c5241214120144.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-14 04:50:42', 0, NULL),
(371, '24/00371', '2024-12-06', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 638, 'SUGAN SWARNIMA PATEL FILLING STATION', 'Sehore Retail S.A', '', '', 'EARTH PIT TESTING\r\n', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-06at17.34.04241214102307.jpeg', '2024-12-06', '2025-06-05', './uploads/earthing_report/12572790_mshsdsuganswarnimapatelfillingstati_06dec_signed-1241214102307.pdf', 'completed', 0, 0, 61, '2024-12-14 04:52:34', 0, NULL),
(372, '24/00372', '2024-12-06', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 636, 'NEW KASTURI FUEL CENTRE', 'Sehore Retail S.A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-06at19.36.10241214102648.jpeg', '2024-12-06', '2025-06-05', './uploads/earthing_report/12272900_mshsdkasturifuelcentre_06dec_unsigned241214102648.pdf', 'completed', 0, 0, 61, '2024-12-14 04:56:05', 0, NULL),
(373, '24/00373', '2024-12-14', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'BEST FUELS ', 'THANJAVUR ', '', '', 640, '', '', '', '', 'ELECTRICAL COMPLAINT ', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-12-14 05:07:08', 0, NULL),
(374, '24/00374', '2024-12-14', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'SP PETROLEUM', 'PATTUKOTTAI ', '', '', 641, '', '', '', '', 'LIGHT REPAIRING ', 'work completed', './uploads/job_letter/a4ae3e54-f846-42bf-8264-1223b55c371f241214120441.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-14 05:08:50', 0, NULL),
(375, '24/00375', '2024-12-14', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'RAJHAM VEERAPPA ENTERPRISES', 'PERAVURANI', '', '', 642, '', '', '', '', 'CVT STABILIZER ', 'work completed', './uploads/job_letter/3d948d73-bd53-4027-959a-46c5c3158711241214120509.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-14 05:11:46', 0, NULL),
(376, '24/00376', '2024-12-07', 'indore', '2', 'project_work', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 643, 'SREE CHATURBHUJ DHARAMVATI PETRO', 'Sehore Retail S.A', '', '', 'EARTH PIT TESTING', '', '', NULL, NULL, '', 'inprogress', 0, 1, 61, '2024-12-14 05:24:47', 0, NULL),
(377, '24/00377', '2024-12-07', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 643, 'SREE CHATURBHUJ DHARAMVATI PETRO', 'Sehore Retail S.A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-07at12.57.32241214105742.jpeg', '2024-12-07', '2025-06-06', './uploads/earthing_report/12562170_mshsdsreechaturbhujdharamvatipetro._07dec_unsigned241214105742.pdf', 'completed', 0, 0, 61, '2024-12-14 05:27:12', 0, NULL),
(378, '24/00378', '2024-12-07', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 644, 'SHRI NANA KAWADI FILLING STATION', 'Sehore Retail S.A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-07at15.16.58241214110317.jpeg', '2024-12-07', '2025-06-06', './uploads/earthing_report/12572780_mshsdshrinanakawadifillingstation_07dec_unsigned241214110317.pdf', 'completed', 0, 0, 61, '2024-12-14 05:32:37', 0, NULL),
(379, '24/00379', '2024-12-07', 'indore', '2', 'maintenance', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 645, 'MADHAV PETROLEUM', 'VIDISHA', '', '', 'CVT ISSUE', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-07at16.55.39241214110836.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-14 05:38:08', 0, NULL),
(380, '24/00380', '2024-12-07', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 646, 'Mukati Petrol Pump Asta', 'Sehore Retail S.A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-07at18.25.20241214112102.jpeg', '2024-12-07', '2025-06-06', './uploads/earthing_report/12271700_mukatipetrolpumpasta_07dec_signed-1241214112102.pdf', 'completed', 0, 0, 61, '2024-12-14 05:50:14', 0, NULL),
(381, '24/00381', '2024-12-08', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 647, 'S K FUEL STATION', 'Sehore Retail S.A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-08at13.26.10241214112742.jpeg', '2024-12-08', '2025-06-07', './uploads/earthing_report/12516650_mshsdskfuelstation_08dec_unsigned241214112742.pdf', 'completed', 0, 0, 61, '2024-12-14 05:56:06', 0, NULL),
(382, '24/00382', '2024-12-08', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 648, 'MAA GANGA PETROL PUMP', 'Sehore Retail S.A', '', '', 'EARTH PIT TESTING\r\n', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-08at16.29.37241214113050.jpeg', '2024-12-08', '2025-06-07', './uploads/earthing_report/12572720_mshsdmaagangapetrolpump_08dec_unsigned241214113050.pdf', 'completed', 0, 0, 61, '2024-12-14 06:00:09', 0, NULL),
(383, '24/00383', '2024-12-08', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 649, 'JAGRATI FUEL STATION', 'Sehore Retail S.A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-08at17.33.19241214113405.jpeg', '2024-12-08', '2025-06-07', './uploads/earthing_report/12588300_mshsdjagratifuelstation_08dec_unsigned241214113405.pdf', 'completed', 0, 0, 61, '2024-12-14 06:03:15', 0, NULL);
INSERT INTO `complaint` (`id`, `sno`, `date`, `zone`, `branch`, `work_type`, `assign_to`, `complainter_name`, `complainter_number`, `outlet_name`, `outlet_location`, `contact_name`, `contact_number`, `outlet_id`, `old_outlet_name`, `old_outlet_location`, `old_contact_name`, `old_contact_number`, `description`, `job_remarks`, `job_report`, `checking_date`, `renewal_date`, `earthing_report`, `status`, `outlet_exists`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(384, '24/00384', '2024-12-09', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 650, 'PRADHAN PETROLEUM', 'Sehore Retail S.A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-09at15.52.34241214113736.jpeg', '2024-12-09', '2025-06-08', './uploads/earthing_report/12555580_mshsdpradhanpetroleum_09dec_unsigned241214113736.pdf', 'completed', 0, 0, 61, '2024-12-14 06:07:00', 0, NULL),
(385, '24/00385', '2024-12-09', 'indore', '2', 'maintenance', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 650, 'PRADHAN PETROLEUM', 'Sehore Retail S.A', '', '', 'LOOSE CONNECTION IN PANNEL', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-09at15.54.39241214113921.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-14 06:08:49', 0, NULL),
(386, '24/00386', '2024-12-09', 'indore', '2', 'maintenance', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 634, 'SHIVANI FILLING STATION', 'Sehore Retail S.A', '', '', 'STP ISSUE', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-09at19.59.27241214114149.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-14 06:11:03', 0, NULL),
(387, '24/00387', '2024-12-10', 'indore', '2', 'maintenance', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 651, 'AKANT AUTOMOBILES', 'VIDISHA', '', '', 'PANNEL ISSUE\r\n', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-10at14.29.44241214114658.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-14 06:15:43', 0, NULL),
(388, '24/00388', '2024-12-10', 'indore', '2', 'maintenance', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 651, 'AKANT AUTOMOBILES', 'VIDISHA', '', '', 'PANNEL ISSUE\r\n', '', '', NULL, NULL, '', 'not_started', 0, 1, 61, '2024-12-14 06:15:43', 0, NULL),
(389, '24/00389', '2024-12-10', 'indore', '2', 'maintenance', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 651, 'AKANT AUTOMOBILES', 'VIDISHA', '', '', 'PANNEL ISSUE\r\n', '', '', NULL, NULL, '', 'not_started', 0, 1, 61, '2024-12-14 06:15:43', 0, NULL),
(390, '24/00390', '2024-12-13', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 528, ' Neelkamal Kurawar', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-13at13.11.54241214120800.jpeg', '2024-12-13', '2025-06-12', './uploads/earthing_report/11725600_mshsdneelkamalkurawar,11725600_13dec_unsigned241214120800.pdf', 'completed', 0, 0, 61, '2024-12-14 06:37:28', 0, NULL),
(391, '24/00391', '2024-12-14', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', '', '', '', '', 4, 'STD FUELS', 'ARANTHANGI ROAD', '', '', 'ELECTRICAL ISSUE', 'work completed', './uploads/job_letter/3bb026eb-bd47-420f-9c9c-01d2b2adfeba241214120906.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-14 06:38:33', 0, NULL),
(392, '24/00392', '2024-12-13', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 652, 'Shree Govind Energy', 'Bhopal Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-13at14.13.12241214121530.jpeg', '2024-12-13', '2025-06-12', './uploads/earthing_report/12881940_shreegovindenergy_13dec_unsigned241214121530.pdf', 'completed', 0, 0, 61, '2024-12-14 06:43:56', 0, NULL),
(393, '24/00393', '2024-12-13', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 653, 'BALAJI FUELS', 'Sehore Retail S.A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-13at14.36.32241214122922.jpeg', '2024-12-13', '2025-06-12', './uploads/earthing_report/12543170_mshsdbalajifuels_13dec_unsigned-1241214122922.pdf', 'completed', 0, 0, 61, '2024-12-14 06:57:37', 0, NULL),
(394, '24/00394', '2024-12-13', 'indore', '2', 'maintenance', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 159, 'RAGHU DIESELS', 'Sehore', '', '', 'MCCB TRIP ISSUE', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-13at15.05.44241214123147.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-14 07:01:03', 0, NULL),
(395, '24/00395', '2024-12-14', 'chennai', '9', 'private_work', 'G Joseph Margasis', 'APPU', '9363174843', '', '', '', '', 513, 'KOVAI FUEL POINT', 'KRISHNARAYAPURAM ', '', '', 'CVT -  3 NOS', 'work completed', './uploads/job_letter/714a013b-b86e-4d6e-8510-129f6adc13c5241218064807.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-14 07:24:59', 0, NULL),
(396, '24/00396', '2024-12-15', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 544, ' Diesel Sales And Service', 'Vidisha Retail S A', '', '', 'EATH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-14at18.14.15241216061042.jpeg', '2024-12-15', '2025-06-14', './uploads/earthing_report/11512110_mshsddieselsalesandservice,11512110_14dec_unsigned-1241216061042.pdf', 'completed', 0, 0, 1, '2024-12-16 00:40:02', 0, NULL),
(397, '24/00397', '2024-12-15', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 654, 'JAI MADA DI PETROL PUMP', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-14at17.08.01241216061939.jpeg', '2024-12-15', '2025-06-14', './uploads/earthing_report/12271600_mshsdjaimadadipetrolpump_14dec_unsigned-1241216061939.pdf', 'completed', 0, 0, 1, '2024-12-16 00:49:08', 0, NULL),
(398, '24/00398', '2024-12-14', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 655, 'MADHURAM SALES', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-14at12.25.17241216064112.jpeg', '2024-12-14', '2025-06-13', './uploads/earthing_report/12524320_mshsdmadhuramsales_14dec_unsigned241216064112.pdf', 'completed', 0, 0, 1, '2024-12-16 01:10:38', 0, NULL),
(399, '24/00399', '2024-12-16', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', '', '', '', '', 21, 'TRIVIKRAMMA AGENCIES', 'KK CHAVADI ', '', '', 'AUTOMAION STAND FAUNDATION WORK ', 'work completed', './uploads/job_letter/dd6ec27d-ad15-41dc-97d8-c34535056a7b241220115149.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-17 07:03:14', 0, NULL),
(400, '24/00400', '2024-12-16', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', '', '', '', '', 513, 'KOVAI FUEL POINT', 'KRISHNARAYAPURAM ', '', '', 'STP ISSUE', 'work completed', './uploads/job_letter/a2a7e0c8-11f6-4fa9-bb97-6b9bda12f696241218064918.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-17 07:03:55', 0, NULL),
(401, '24/00401', '2024-12-17', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', '', '', '', '', 2, 'SRI BALAKUMARRAN AGENCY', 'PEELEMEDU', '', '', 'CVT COMPLAINT ', 'work completed', './uploads/job_letter/500335e8-4c92-4239-828f-6195a448d1f3241218094044.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-17 07:07:41', 0, NULL),
(402, '24/00402', '2024-12-17', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', '', '', '', '', 52, 'NARASHIMMAN AGENCIES ', 'PN PUDHUR', '', '', 'STP ISSUE', 'work completed', './uploads/job_letter/83c42ff3-1450-4758-bcd5-c8da041e70a3241218094109.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-17 07:11:40', 0, NULL),
(403, '24/00403', '2024-12-17', 'chennai', '8', 'earth_renewal', 'J.Charles', 'APPU', '9363174843', 'SHAJ FUELS ', 'PATHAMADAI', '', '', 656, '', '', '', '', 'EARTH RENEWAL', 'RENEW WORK COMPLETED', './uploads/job_letter/c2176d6d-0604-4769-9a14-daf2013d070b241218094407.jpg', '2024-12-17', '2025-06-16', './uploads/earthing_report/61aef81b-95c6-4a48-bab3-d6630506eca6241218094407.jpg', 'completed', 1, 0, 40, '2024-12-17 07:14:51', 0, NULL),
(404, '24/00404', '2024-12-16', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'MPVR PETROLEUM ', 'THANJAVUR ', '', '', 657, '', '', '', '', 'EARTH DIAGRAM FIXING ', 'work completed', './uploads/job_letter/782bd222-5491-4d14-947e-66cf545badbd241218094559.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-17 07:20:09', 0, NULL),
(405, '24/00405', '2024-12-16', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'GEORGE FUELS ', 'TRICHY', '', '', 658, '', '', '', '', 'ELECTRICAL ISSUE ', 'work completed', './uploads/job_letter/002dd333-63b1-4d3f-8cd9-abc14eba56d3241218094626.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-17 07:21:32', 0, NULL),
(406, '24/00406', '2024-12-17', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'SRI SWETHA AGENCIES ', 'THANJAVUR', '', '', 659, '', '', '', '', 'ELECTRICAL ISSUE ', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-12-17 07:23:34', 0, NULL),
(407, '24/00407', '2024-12-17', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'DELTA FUELS ', 'THANJAVUR', '', '', 660, '', '', '', '', 'ELECTRICAL ISSUE', 'work completed', './uploads/job_letter/73a5ab86-ebba-450a-b866-af26b65be2f7241218094730.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-17 07:25:08', 0, NULL),
(408, '24/00408', '2024-12-17', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'BR AGENCIES ', 'THANJAVUR', '', '', 661, '', '', '', '', 'ELECTRICAL ISSUE ', 'work completed', './uploads/job_letter/28f17b0c-6a4b-4153-8fdb-86b0cb14abaf241218094847.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-17 07:26:16', 0, NULL),
(409, '24/00409', '2024-12-17', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'EBENEEZER FUELS ', 'THANJAVUR ', '', '', 662, '', '', '', '', 'ELECTRICAL ISSUE', 'work completed', './uploads/job_letter/4fcfe536-0853-4002-ad3d-1f8a5ba2d96b241218094930.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-17 07:34:54', 0, NULL),
(410, '24/00410', '2024-12-18', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', '', '', '', '', 97, 'VALLIYAMMAI FUELS ', 'VANNIKOENDAL ', '', '', 'PYLON REPAIRING ', 'work completed', './uploads/job_letter/8fd5f3ff-7768-4fb7-a5af-3426ff0ba11f241220120104.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-18 04:21:28', 0, NULL),
(411, '24/00411', '2024-12-17', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 663, 'Shree Hari Petroleum', 'Bhopal Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-17at11.32.12241219121732.jpeg', '2024-12-17', '2025-06-16', './uploads/earthing_report/41071234_shreeharipetroleum_17dec_unsigned-1241219121732.pdf', 'completed', 0, 0, 1, '2024-12-19 06:43:43', 0, NULL),
(412, '24/00412', '2024-12-18', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', 'CKLUNT', 'THIRUMALAYAMPALAYAM', '', '', 664, '', '', '', '', 'UPS FAULT ', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-12-19 07:15:36', 0, NULL),
(413, '24/00413', '2024-12-19', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'SRI MEENAKSHI CHIDAMBARAM ', 'PERAMBALUR', '', '', 665, '', '', '', '', 'ELECTRICAL COMPLAINT ', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-12-19 07:18:12', 0, NULL),
(414, '24/00414', '2024-12-18', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'MK VEERASAMY AGENCIES ADHOC ', 'THANJAVUR ', '', '', 666, '', '', '', '', 'STP ISSUE', 'work completed', './uploads/job_letter/acc86318-cd20-4bba-b6c2-de52fff66d72241220121110.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-19 07:21:26', 0, NULL),
(415, '24/00415', '2024-12-19', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', '', '', '', '', 658, 'GEORGE FUELS ', 'TRICHY', '', '', 'SAFETY WORK ', 'work completed', './uploads/job_letter/8e35b9bc-e640-421d-b61b-09f5a93ac57c241220121302.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-19 07:24:18', 0, NULL),
(416, '24/00416', '2024-12-18', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', '', '', '', '', 119, 'SRI ENTERPRISES ', 'PAVOORCHATRAM', '', '', 'SAFETY WORK ', 'work completed', './uploads/job_letter/467956e8-e37e-4689-96c6-5747bb28f3b9241220120136.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-19 07:26:35', 0, NULL),
(417, '24/00417', '2024-12-18', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', '', '', '', '', 89, 'MANIS A1 FUELS ', 'EDAIKAL', '', '', 'RUBBER MAT FIXING ', 'work completed', './uploads/job_letter/b4c9d666-09a8-482a-9c5a-63479c5ed80c241220120217.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-19 07:27:57', 0, NULL),
(418, '24/00418', '2024-12-19', 'chennai', '8', 'earth_renewal', 'J.Charles', 'APPU', '9363174843', 'MAHARAJA AGENCY ', 'PETTAI ', '', '', 667, '', '', '', '', 'EARTH RENEWAL', 'RENEW WORK COMPLETED', './uploads/job_letter/8b9e55af-2df9-4b07-b1fb-d9f4bb23583e241220120323.jpg', '2024-12-19', '2025-06-18', './uploads/earthing_report/19-12-2024maharajaagency_19dec_unsigned241220120323.pdf', 'completed', 1, 0, 40, '2024-12-19 07:29:39', 0, NULL),
(419, '24/00419', '2024-12-19', 'chennai', '8', 'earth_renewal', 'J.Charles', 'APPU', '9363174843', '', '', '', '', 3, 'AJAY FUELS', 'LALUGAPURAM', '', '', 'EARTH RENEWAL ', 'RENEW WORK COMPLETED', './uploads/job_letter/3dbb88ed-d45f-4fc4-9d81-0db04ebe968f241220120435.jpg', '2024-12-19', '2025-06-18', './uploads/earthing_report/19-12-2024ajayfuels_19dec_unsigned-1241220120435.pdf', 'completed', 0, 0, 40, '2024-12-19 07:30:33', 0, NULL),
(420, '24/00420', '2024-12-19', 'chennai', '8', 'earth_renewal', 'J.Charles', 'APPU', '9363174843', 'ARASAN & CO ', 'MADURAI ', '', '', 668, '', '', '', '', 'EARTH RENEWAL ', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-12-19 07:32:18', 0, NULL),
(421, '24/00421', '2024-12-17', 'indore', '2', 'maintenance', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 112, 'UNITED SALS & SERVICE STATION ', 'PANJAB BAGH', '', '', 'section motor issues', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-17at12.35.12241220051801.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 1, '2024-12-19 23:47:31', 0, NULL),
(422, '24/00422', '2024-12-17', 'indore', '2', 'maintenance', 'Prabhudayal Patel', 'AJAY', '123', 'SHIVDEEP PETROLEUM', 'BHOPAL', '', '', 669, '', '', '', '', 'SUPPLY ISSUE', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-17at13.32.53241220052408.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 1, '2024-12-19 23:53:20', 0, NULL),
(423, '24/00423', '2024-12-17', 'indore', '2', 'maintenance', 'Prabhudayal Patel', 'AJAY', '123', 'SALUJA SALE & SERVICE', 'BHOPAL', '', '', 670, '', '', '', '', 'SECTION MOTOR ISSUE', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-17at15.26.57241220053024.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 1, '2024-12-19 23:58:55', 0, NULL),
(424, '24/00424', '2024-12-17', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 671, 'Adhoc Motilal Fuel Station', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-17at17.46.56241220060709.jpeg', '2024-12-17', '2025-06-16', './uploads/earthing_report/41073073_adhocmotilalfuelstation_17dec_unsigned241220060709.pdf', 'completed', 0, 0, 61, '2024-12-20 00:36:35', 0, NULL),
(425, '24/00425', '2024-12-18', 'indore', '2', 'maintenance', 'Prabhudayal Patel', 'AJAY', '123', 'DEEP SERVICE STATION', 'BHOPAL', '', '', 672, '', '', '', '', 'SECTION MOTOR ISSUE', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-18at14.42.53241220063457.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 61, '2024-12-20 01:03:30', 0, NULL),
(426, '24/00426', '2024-12-16', 'indore', '2', 'maintenance', 'Prabhudayal Patel', 'AJAY', '123', 'GURU FILLING STATION', 'BHOPAL', '', '', 673, '', '', '', '', 'EV CHARGER INSTALLATION', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-18at17.23.52241220064253.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 61, '2024-12-20 01:11:51', 0, NULL),
(427, '24/00427', '2024-12-19', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 674, 'RUDRANI FILLING STATION', 'BHOPAL', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-19at10.36.43241220075658.jpeg', '2024-12-19', '2025-06-18', './uploads/earthing_report/ept241220075658.jpeg', 'completed', 0, 0, 61, '2024-12-20 02:26:05', 0, NULL),
(428, '24/00428', '2024-12-19', 'indore', '2', 'earth_renewal', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 675, 'SAMARTH HARIOM FUEL STATION', 'BHOPAL', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-19at11.36.11241220081235.jpeg', '2024-12-19', '2025-06-18', './uploads/earthing_report/41028133_samarthhariomfuelstation_19dec_unsigned241220081235.pdf', 'completed', 0, 0, 61, '2024-12-20 02:40:32', 0, NULL),
(429, '24/00429', '2024-12-19', 'indore', '2', 'maintenance', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 564, ' Rajendra Singh & Bros', 'Vidisha Retail S A', '', '', 'Automation Earthing issue', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-19at19.07.09241220100422.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-20 04:27:54', 0, NULL),
(430, '24/00430', '2024-12-19', 'indore', '2', 'earth_renewal', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 676, 'ADHOC SHRINATHJI FUELS', 'Sehore Retail S.A.', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-20at16.23.55241220111512.jpeg', '2024-12-19', '2025-06-18', './uploads/earthing_report/41068510_adhocshrinathjifuels_19dec_unsigned241220111512.pdf', 'completed', 0, 0, 61, '2024-12-20 05:44:39', 0, NULL),
(431, '24/00431', '2024-12-20', 'chennai', '8', 'earth_renewal', 'J.Charles', 'APPU', '9363174843', 'AISWARYA FUELS ', 'PUDUKULAM', '', '', 677, '', '', '', '', 'EARTH RENEWAL ', 'RENEW WORK COMPLETED', './uploads/job_letter/d6bcb1bf-4d8e-4319-8a0d-81c176f45a1f241220120943.jpg', '2024-12-20', '2025-06-19', './uploads/earthing_report/20-12-2024aiswaryafuels_20dec_unsigned241220120943.pdf', 'completed', 1, 0, 40, '2024-12-20 06:37:42', 0, NULL),
(432, '24/00432', '2024-12-20', 'chennai', '8', 'earth_renewal', 'J.Charles', 'APPU', '9363174843', 'HAYAGRIVA AGENCY ', 'KEELAKALLUR', '', '', 678, '', '', '', '', 'EARTH RENEWAL ', 'RENEW WORK COMPLETED', './uploads/job_letter/8de56b63-6c8e-4da9-8b34-e5d09787cd20241220121022.jpg', '2024-12-20', '2025-06-19', './uploads/earthing_report/20-12-2024hayagrivyaagency,15161210_20dec_unsigned241220121022.pdf', 'completed', 1, 0, 40, '2024-12-20 06:38:49', 0, NULL),
(433, '24/00433', '2024-12-20', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'PANDIAN AGENCIES ', 'THANJAVUR', '', '', 679, '', '', '', '', 'M SEAL FIXING WORK ', 'work completed', './uploads/job_letter/ba14943a-081a-4f31-8430-7281cf939ce8241220122351.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-20 06:45:22', 0, NULL),
(434, '24/00434', '2024-12-20', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'SATHYA DHARMA AGENCIES ', 'THIRUKATTUPALLI', '', '', 680, '', '', '', '', 'EARTH DIAGRAM FIXING WORK ', 'work completed', './uploads/job_letter/560e6186-9261-42a2-927a-7e664ce7c220241220122410.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-20 06:47:03', 0, NULL),
(435, '24/00435', '2024-12-20', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'VV & SONS AGENCIES ', 'THANJAVUR', '', '', 681, '', '', '', '', 'EARTH DIAGRAMFIXING WORK ', 'work completed', './uploads/job_letter/99d09a0c-85ce-4ab6-a5aa-49cbd2c67d0d241220122432.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-20 06:48:12', 0, NULL),
(436, '24/00436', '2024-12-20', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'SRI RAMAJAYAM AGENCIES ADHOC ', 'TRICHY ', '', '', 682, '', '', '', '', 'EARTH DIAGRAM FIXING ', 'work completed', './uploads/job_letter/da78d295-664b-4a65-b77e-ac53e34cf693241220122501.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-20 06:50:19', 0, NULL),
(437, '24/00437', '2024-12-20', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'SRI RANGAA AGENCIES ', 'AYYAMPETTAI', '', '', 683, '', '', '', '', 'EARTH DIAGRAM FIXING ', 'work completed', './uploads/job_letter/3ba171f6-a3c6-4109-a154-51c9e63e35c0241223125546.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-20 06:51:35', 0, NULL),
(438, '24/00438', '2024-12-20', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'SRI RAMAJAYAM AGENCIES', 'THANJAVUR ', '', '', 684, '', '', '', '', 'EARTH DIAGRAM FIXING WORK ', 'work completed', './uploads/job_letter/da78d295-664b-4a65-b77e-ac53e34cf693241223125613.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-20 06:52:54', 0, NULL),
(439, '24/00439', '2024-12-20', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', '', '', '', '', 21, 'TRIVIKRAMMA AGENCIES', 'KK CHAVADI ', '', '', 'STP ISSUE', 'work completed', './uploads/job_letter/083bf59c-6c29-441b-865f-a15fad717f6b241221123637.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-21 06:21:31', 0, NULL),
(440, '24/00440', '2024-12-21', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', '', '', '', '', 21, 'TRIVIKRAMMA AGENCIES', 'KK CHAVADI ', '', '', 'AUTOMATION CABLE LAYING ', 'work completed', './uploads/job_letter/99f04845-ecef-4dc3-9622-ecdf3d9c3d82241221123738.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-21 06:22:06', 0, NULL),
(441, '24/00441', '2024-12-21', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'PK PETROLEUM AGENCIES ', 'THANJAVUR', '', '', 685, '', '', '', '', 'EARTH DIAGRAM FIXING ', 'work completed', './uploads/job_letter/834986f8-8558-4b28-a45a-893c1a81c59d241223125637.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-21 06:24:30', 0, NULL),
(442, '24/00442', '2024-12-21', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'SIVARAMAN & CO', '', '', '', 24, 'SIVARAMAN & CO', 'THANJAVUR', '', '', 'EARTH DIAGRAM FIXING ', '', '', NULL, NULL, '', 'inprogress', 0, 0, 40, '2024-12-21 06:25:32', 0, NULL),
(443, '24/00443', '2024-12-21', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'WAHAB PETOL BUNK ADHOC ', 'TRICHY', '', '', 686, '', '', '', '', 'EARTH DIAGRAM FIXING', 'work completed', './uploads/job_letter/fbc331c3-6a90-46ef-8405-d5638786e30c241223125712.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-21 06:28:02', 0, NULL),
(444, '24/00444', '2024-12-21', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', '', '', '', '', 92, 'SIRAJ', 'KARANTHAI,THANJAVUR', '', '', 'EARTH DIAGRAM FIXING \r\n', 'work completed', './uploads/job_letter/98d0737b-a5f8-4f08-b6e3-f710a087026d241223125735.jpg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 40, '2024-12-21 06:32:57', 0, NULL),
(445, '24/00445', '2024-12-23', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', 'RAJKAMALAGENCIES ', 'COIMBATORE', '', '', 687, '', '', '', '', 'PYLON COMPLAINT ', 'work completed', './uploads/job_letter/555badd8-560c-4bae-9876-08ef885b9416241223125510.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-23 06:00:18', 0, NULL),
(446, '24/00446', '2024-12-21', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'AKM AGENCY ', 'THANJAVUR ', '', '', 688, '', '', '', '', 'M SEAL FIXING WORK ', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-12-23 06:23:10', 0, NULL),
(447, '24/00447', '2024-12-23', 'chennai', '7', 'maintenance', 'C Anbujothi', 'APPU', '9363174843', 'YASOTHA AGENCIES ', 'THANJAVUR', '', '', 689, '', '', '', '', 'UNLOADING CLIP FIXING', 'work completed', './uploads/job_letter/7bbbd44b-5ea6-4101-97c5-a5824c8307ab241223125918.jpg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 40, '2024-12-23 07:28:57', 0, NULL),
(448, '24/00448', '2024-12-23', 'indore', '2', 'maintenance', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 532, 'Moolchand Hiralal Chhapiheda', 'Sehore Retail S.A.', '', '', 'STABILIZER AND CVT ISSUE', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-23at18.04.46241224100843.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-24 04:37:30', 0, NULL),
(449, '24/00449', '2024-12-22', 'indore', '2', 'maintenance', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 159, 'RAGHU DIESELS', 'Sehore', '', '', 'DU JUNCTION PROBLEM', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-22at13.25.22241224101205.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-24 04:41:23', 0, NULL),
(450, '24/00450', '2024-12-22', 'indore', '2', 'maintenance', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 690, 'SEHORE SERVICE CENTRE', 'Sehore Retail S.A.', '', '', 'MCCB NOT WORKING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-22at16.17.31241224102338.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-24 04:50:23', 0, NULL),
(451, '24/00451', '2024-12-21', 'indore', '2', 'maintenance', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 691, 'PRADEEP FILLING STATION', 'BHOPAL', '', '', 'SECTIN MOTOR ISSUE', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-21at17.42.46241224105755.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-24 05:26:50', 0, NULL),
(452, '24/00452', '2024-12-20', 'indore', '2', 'maintenance', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 547, ' Yashashwini Filling Station', 'Vidisha Retail S A', '', '', 'DU STP SIGNAL ISSUE', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-20at13.22.57241224113007.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-24 05:59:13', 0, NULL),
(453, '24/00453', '2024-12-20', 'indore', '2', 'maintenance', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 692, 'RACHNA SALES AND SERVICE', 'BHOPAL', '', '', 'PAYLON REPAIRING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-20at15.12.54241224113959.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-24 06:08:29', 0, NULL),
(454, '24/00454', '2024-12-14', 'indore', '2', 'maintenance', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 693, 'R K PETROLEUM', 'VIDISHA', '', '', 'CANNOPY LIGHT ISSUE', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-14at18.27.50241226104914.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-26 05:17:42', 0, NULL),
(455, '24/00455', '2024-12-15', 'indore', '2', 'maintenance', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 694, 'SHIV NANDINI PETROLEUM', 'Bhopal ', '', '', 'IGBT ISSUE', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-15at13.27.37241226110854.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-26 05:35:22', 0, NULL),
(456, '24/00456', '2024-12-16', 'indore', '2', 'maintenance', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 695, 'SOLANKI PETROLEUM', 'VIDISHA', '', '', 'STP ISSUE', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-16at15.58.21241226113209.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-26 06:01:06', 0, NULL),
(457, '24/00457', '2024-12-16', 'indore', '2', 'maintenance', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 696, 'SHREE SIDDHESHWARI SALES', 'VIDISHA', '', '', 'PRINTER POWER SUPPLY CABLE LAYING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-16at17.11.11241226114007.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-26 06:09:43', 0, NULL),
(458, '24/00458', '2024-12-19', 'indore', '2', 'maintenance', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 564, ' Rajendra Singh & Bros', 'Vidisha Retail S A', '', '', 'AUTOMATION EARTHING ISSUE', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-19at19.07.09241226120806.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-26 06:36:24', 0, NULL),
(459, '24/00459', '2024-12-24', 'indore', '2', 'maintenance', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 697, 'VIJAYPAL SALES and SERVICE', 'Bhopal ', '', '', 'UPS NOT WORKING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-24at14.10.32241226121610.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-26 06:45:31', 0, NULL),
(460, '24/00460', '2024-12-25', 'indore', '2', 'maintenance', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 698, 'KRISHAK DIESEL CENTRE', 'V', '', '', 'SECTION MOTOR ISSUE', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-24at15.08.20241226122114.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-26 06:50:49', 0, NULL),
(461, '24/00461', '2024-12-24', 'indore', '2', 'maintenance', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 111, 'HP AUTO CENTER ,KOLAR ', 'KOLAR ', '', '', 'STP MOTOR ISSUE', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-24at17.29.31241226122509.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-26 06:54:13', 0, NULL),
(462, '24/00462', '2024-12-24', 'indore', '2', 'maintenance', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 699, 'SHRI JI KISAN SEVA KENDRA', 'VIDISHA', '', '', 'TANK CABLE LAYING\r\n', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-24at18.21.50241226123116.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-26 07:00:43', 0, NULL),
(463, '24/00463', '2024-12-25', 'indore', '2', 'maintenance', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 670, 'SALUJA SALE & SERVICE', 'BHOPAL', '', '', 'CVT ISSUE', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-25at13.41.39241226124016.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-26 07:09:59', 0, NULL),
(464, '24/00464', '2024-12-25', 'indore', '2', 'maintenance', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 700, 'BASANT SALES and SERVICE', 'HOSHANGABAD', '', '', 'STABILIER ISSUE', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-25at18.44.35241226124816.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-26 07:17:10', 0, NULL),
(465, '24/00465', '2024-12-26', 'indore', '1', 'maintenance', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 350, ' KANCHAN FUELS', 'DEWAS', '', '', 'WIFI MODERM FITING\r\n', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-26at15.41.40241227045936.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-26 23:28:58', 0, NULL),
(466, '24/00466', '2024-12-26', 'indore', '1', 'maintenance', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 282, 'PC AUTO SERVICE', 'INDORE-EAST', '', '', 'AUTOMATION UPS FITTING\r\n', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-26at11.30.20241227050358.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-26 23:33:30', 0, NULL),
(467, '24/00467', '2024-12-24', 'indore', '1', 'maintenance', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 296, 'AMOL FILLING STATION', 'INDORE EAST', '', '', 'AUTOMATION CABLE LAYING WORK\r\n', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-24at17.01.20241227051833.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-26 23:48:16', 0, NULL),
(468, '24/00468', '2024-12-23', 'indore', '1', 'maintenance', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 284, ' S SHASHIKANT & BROTHERS', 'INDORE-EAST', '', '', 'VISIT FOR SAFETY OFFICER\r\n', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-23at16.18.13241227052311.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-26 23:52:55', 0, NULL),
(469, '24/00469', '2024-12-23', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 322, ' MANDLOI FUELS', 'INDORE EAST', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', '', '2024-12-23', '2025-06-22', './uploads/earthing_report/12591840_mandloifuels,12591840_23dec_unsigned241227052637.pdf', 'completed', 0, 1, 61, '2024-12-26 23:56:05', 0, NULL),
(470, '24/00470', '2024-12-23', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 322, ' MANDLOI FUELS', 'INDORE EAST', '', '', 'EARTH PIT RENEWAL', 'JOB COMPLETED', './uploads/job_letter/newmicrosoftworddocument241227053108.docx', '2024-12-23', '2025-06-22', './uploads/earthing_report/12591840_mandloifuels,12591840_23dec_unsigned241227053110.pdf', 'completed', 0, 0, 61, '2024-12-27 00:00:44', 0, NULL),
(471, '24/00471', '2024-12-23', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 316, ' KRISHNA ENTERPRISES', 'INDORE EAST', '', '', 'EARTH PIT TESTING\r\n', 'JOB COMPLETED', './uploads/job_letter/pdfgallery_20241223_1208381241227054431.pdf', '2024-12-23', '2025-06-22', './uploads/earthing_report/12585390_krishnaenterprises,12585390_23dec_unsigned-1241227054432.pdf', 'completed', 0, 0, 61, '2024-12-27 00:13:14', 0, NULL),
(472, '24/00472', '2024-12-19', 'indore', '1', 'maintenance', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 701, 'KEERTI FUEL ZONE', 'KHANDWA', '', '', 'STABILIZER FITTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-19at19.07.58241227055547.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-27 00:25:08', 0, NULL),
(473, '24/00473', '2024-12-19', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 448, ' CHAUHAN FUELS', 'DHAR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/chauhanjobreport241227060835.pdf', '2024-12-18', '2025-06-17', './uploads/earthing_report/12543250_chauhanfuels,12543250_18dec_unsigned241227060835.pdf', 'completed', 0, 0, 61, '2024-12-27 00:28:46', 0, NULL),
(474, '24/00474', '2024-12-18', 'indore', '1', 'maintenance', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 457, ' VINAYAK PETROLEUM', 'DHAR', '', '', 'EARTH PIT TESTING', '', '', NULL, NULL, '', 'inprogress', 0, 1, 61, '2024-12-27 00:42:44', 0, NULL),
(475, '24/00475', '2024-12-18', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 457, ' VINAYAK PETROLEUM', 'DHAR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/jr241227061625.pdf', '2024-12-18', '2025-06-17', './uploads/earthing_report/12586440_mshsdvinayakpetroleum_18dec_unsigned241227061625.pdf', 'completed', 0, 0, 61, '2024-12-27 00:45:50', 0, NULL),
(476, '24/00476', '2024-12-18', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 424, ' G V AGRAWAL', 'DHAR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-18at17.57.52241227061951.jpeg', '2024-12-18', '2025-06-17', './uploads/earthing_report/11535010_mshsdgvagrawal_18dec_unsigned241227061951.pdf', 'completed', 0, 0, 61, '2024-12-27 00:48:56', 0, NULL),
(477, '24/00477', '2024-12-18', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 451, ' RUDRAKSHA PETRO STATION', 'DHAR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/jr241227062340.pdf', '2024-12-18', '2025-06-17', './uploads/earthing_report/12563470_mshsdrudrakshapetrostation_18dec_unsigned241227062341.pdf', 'completed', 0, 0, 61, '2024-12-27 00:53:11', 0, NULL),
(478, '24/00478', '2024-12-18', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 462, ' SHREE RAMA KANHAIYA FUELS', 'DHAR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/jr241227064344.pdf', '2024-12-18', '2025-06-17', './uploads/earthing_report/12590820_mshsdshreeramakanhaiyafuels_18dec_unsigned241227064346.pdf', 'completed', 0, 0, 61, '2024-12-27 01:12:26', 0, NULL),
(479, '24/00479', '2024-12-18', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 439, ' SIDDHIVINAYAK FUELS', 'DHAR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/jr241227065053.pdf', '2024-12-18', '2025-06-17', './uploads/earthing_report/12522540_mshsdsiddhivinayakfuels_18dec_unsigned241227065055.pdf', 'completed', 0, 0, 61, '2024-12-27 01:20:21', 0, NULL),
(480, '24/00480', '2024-12-18', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 702, 'Muvel Filling Station', 'Dhar Retail S.A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/jr241227065637.pdf', '2024-12-18', '2025-06-17', './uploads/earthing_report/41072628_muvelfillingstation_18dec_unsigned241227065639.pdf', 'completed', 0, 0, 61, '2024-12-27 01:25:50', 0, NULL),
(481, '24/00481', '2024-12-17', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 408, ' SHRI SAI FUEL CENTRE', 'BARWANI', '', '', 'EARH PIT TESTING', '', '', NULL, NULL, '', 'not_started', 0, 1, 61, '2024-12-27 01:31:05', 0, NULL),
(482, '24/00482', '2024-12-17', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 408, ' SHRI SAI FUEL CENTRE', 'BARWANI', '', '', 'EARH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/jr241227070304.pdf', '2024-12-17', '2025-06-16', './uploads/earthing_report/12514470_srisaifuelcenter_17dec_unsigned241227070304.pdf', 'completed', 0, 0, 61, '2024-12-27 01:31:37', 0, NULL),
(483, '24/00483', '2024-12-17', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 417, ' AAROHI PETROLEUM', 'BARWANI', '', '', 'EARTH PIT TESTING - OUTLET WAS CLOSED', 'JOB COMPLETED', './uploads/job_letter/jr241227070837.pdf', '2024-12-17', '2025-06-16', './uploads/earthing_report/12587480_mshsdaarohipetroleum_17dec_unsigned241227070837.pdf', 'completed', 0, 0, 61, '2024-12-27 01:37:35', 0, NULL),
(484, '24/00484', '2024-12-17', 'indore', '1', 'maintenance', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 407, ' MAA BIJASAN FILLING STATION', 'BARWANI', '', '', 'STABILIZER FIXING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-17at16.46.42241227071113.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-27 01:40:45', 0, NULL),
(485, '24/00485', '2024-12-17', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 406, ' SAI AUTO SERVICE', 'BARWANI', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/jr241227071412.pdf', '2024-12-17', '2025-06-16', './uploads/earthing_report/12500700_mshsdsaiautoservice_17dec_unsigned241227071413.pdf', 'completed', 0, 0, 61, '2024-12-27 01:43:33', 0, NULL),
(486, '24/00486', '2024-12-17', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 411, ' SHRI SAI BALAJI PETROLEUM', 'BARWANI', '', '', 'EARTH PIT TESTIING\r\n', 'JOB COMPLETED', './uploads/job_letter/jr241227071806.pdf', '2024-12-17', '2025-06-16', './uploads/earthing_report/12546700_mshsdshrisaibalajipetroleum,12546700_17dec_unsigned241227071806.pdf', 'completed', 0, 0, 61, '2024-12-27 01:47:38', 0, NULL),
(487, '24/00487', '2024-12-17', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 703, 'Sankalp Fuel Station', 'Dhar Retail S.A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/jr241227072401.pdf', '2024-12-17', '2025-06-16', './uploads/earthing_report/12527530_sankalpfuelstationhpclpetrolpump_17dec_unsigned-1241227072403.pdf', 'completed', 0, 0, 61, '2024-12-27 01:53:25', 0, NULL),
(488, '24/00488', '2024-12-16', 'indore', '1', 'earth_renewal', 'Ajay Yadav', 'AJAY', '123', '', '', '', '', 415, ' RADHE FUEL CENTER', 'BARWANI', '', '', 'EARTH PIT  TESTING\r\n', 'JOB COMPLETED', './uploads/job_letter/jr241227072853.pdf', '2024-12-16', '2025-06-15', './uploads/earthing_report/12585400_mshsdradhefuelcenter_16dec_unsigned241227072855.pdf', 'completed', 0, 0, 61, '2024-12-27 01:58:21', 0, NULL),
(489, '24/00489', '2024-12-16', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 413, ' MARIA FUEL STATION', 'BARWANI', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/jr241227073337.pdf', '2024-12-16', '2025-06-15', './uploads/earthing_report/12576180_mariafuelstation_16dec_unsigned241227073337.pdf', 'completed', 0, 0, 61, '2024-12-27 02:03:03', 0, NULL),
(490, '24/00490', '2024-12-16', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 421, ' SHREE TIRUPATI BALAJI FUELS', 'BARWANI', '', '', 'EARTH PIT TESTING\r\n', 'JOB COMPLETED', './uploads/job_letter/jr241227073627.pdf', '2024-12-16', '2025-06-15', './uploads/earthing_report/12882030_shreetirupatibalajifuels_16dec_unsigned241227073628.pdf', 'completed', 0, 0, 61, '2024-12-27 02:05:51', 0, NULL),
(491, '24/00491', '2024-12-16', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 403, ' D P PATEL', 'BARWANI', '', '', 'EARTH PIT TESTING\r\n', 'JOB COMPLETED', './uploads/job_letter/jr241227074128.pdf', '2024-12-16', '2025-06-15', './uploads/earthing_report/11480310_d.p.patelbarwani,11480310_16dec_unsigned241227074129.pdf', 'completed', 0, 0, 61, '2024-12-27 02:10:28', 0, NULL),
(492, '24/00492', '2024-12-16', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 443, ' SATYAM SHIVAM PETROLEUM', 'DHAR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/jr241227085715.pdf', '2024-12-16', '2025-06-15', './uploads/earthing_report/12534930_mshsdsatyamshivampetroleum_16dec_unsigned241227085717.pdf', 'completed', 0, 0, 61, '2024-12-27 03:26:48', 0, NULL),
(493, '24/00493', '2024-12-16', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 428, ' ABHINAV AUTO', 'DHAR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/jr241227085942.pdf', '2024-12-16', '2025-06-15', './uploads/earthing_report/11769100_mshsdabhinavauto_16dec_unsigned241227085944.pdf', 'completed', 0, 0, 61, '2024-12-27 03:28:37', 0, NULL),
(494, '24/00494', '2024-12-15', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 436, ' SHRI KRISHNA PETROLEUM', 'DHAR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/jr241227090718.pdf', '2024-12-15', '2025-06-14', './uploads/earthing_report/12516910_mshsdshrikrishnapetroleum_15dec_unsigned241227090718.pdf', 'completed', 0, 0, 61, '2024-12-27 03:34:14', 0, NULL),
(495, '24/00495', '2024-12-15', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 453, ' SARVOTTAM FUEL STATION', 'DHAR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/jr241227090952.pdf', '2024-12-15', '2025-06-14', './uploads/earthing_report/12583750_mshsdsarvottamfuelstation_15dec_unsigned241227090952.pdf', 'completed', 0, 0, 61, '2024-12-27 03:39:16', 0, NULL),
(496, '24/00496', '2024-12-15', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 398, ' NARAYAN PETROLEUM', 'ALIRAJPUR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/jr241227091253.pdf', '2024-12-15', '2025-06-14', './uploads/earthing_report/12534920_mshsdnarayanpetroleum_15dec_unsigned241227091255.pdf', 'completed', 0, 0, 61, '2024-12-27 03:42:16', 0, NULL),
(497, '24/00497', '2024-12-15', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 395, ' RAHI PETROLEUM', 'ALIRAJPUR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/jr241227091610.pdf', '2024-12-15', '2025-06-14', './uploads/earthing_report/12254300_mshsdrahipetroleum_15dec_unsigned241227091610.pdf', 'completed', 0, 0, 61, '2024-12-27 03:45:41', 0, NULL),
(498, '24/00498', '2024-12-15', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 399, ' RISHIKA FILLING STATION', 'ALIRAJPUR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/jr241227092200.pdf', '2024-12-15', '2025-06-14', './uploads/earthing_report/12563450_mshsdrishikafillingstation_15dec_unsigned241227092200.pdf', 'completed', 0, 0, 61, '2024-12-27 03:51:10', 0, NULL),
(499, '24/00499', '2024-12-15', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 402, ' VINAYAK FUEL STATION', 'ALIRAJPUR', '', '', 'EARTH PIT TESING', 'JOB COMPLETED', './uploads/job_letter/1241227092514.pdf', '2024-12-15', '2025-06-14', './uploads/earthing_report/17601970_vinayakfuelstation_15dec_unsigned241227092516.pdf', 'completed', 0, 0, 61, '2024-12-27 03:53:48', 0, NULL),
(500, '24/00500', '2024-12-15', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 397, ' RADHE PETROLEUM', 'ALIRAJPUR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/docscannerdec15,202410-55am241227093347.pdf', '2024-12-15', '2025-06-14', './uploads/earthing_report/12530060_mshsdradhepetroleum_14dec_unsigned241227093347.pdf', 'completed', 0, 0, 61, '2024-12-27 04:01:58', 0, NULL),
(501, '24/00501', '2024-12-14', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 450, ' BAGHEL FILLING STATION', 'DHAR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/jr241227093843.pdf', '2024-12-14', '2025-06-13', './uploads/earthing_report/12563350_mshsdbaghelfillingstation_14dec_unsigned241227093845.pdf', 'completed', 0, 0, 61, '2024-12-27 04:07:56', 0, NULL),
(502, '24/00502', '2024-12-14', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 460, ' LAKSHYA PETROLEUM', 'DHAR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/1241227095916.pdf', '2024-12-14', '2025-06-13', './uploads/earthing_report/12590810_mshsdlakshyapetroleum_14dec_unsigned241227095917.pdf', 'completed', 0, 0, 61, '2024-12-27 04:23:21', 0, NULL),
(503, '24/00503', '2024-12-14', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 464, ' RATHORE PETROLEUM', 'DHAR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-14at16.19.01241227100204.jpeg', '2024-12-14', '2025-06-13', './uploads/earthing_report/12595900_mshsdrathorepetroleum_14dec_unsigned241227100204.pdf', 'completed', 0, 0, 61, '2024-12-27 04:31:00', 0, NULL),
(504, '24/00504', '2024-12-14', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 431, ' MANGALAM PETROLEUM', 'DHAR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-14at15.11.06241227100557.jpeg', '2024-12-14', '2025-06-13', './uploads/earthing_report/12253900_manglumpetroelum,12253900_14dec_unsigned241227100557.pdf', 'completed', 0, 0, 61, '2024-12-27 04:35:17', 0, NULL),
(505, '24/00505', '2024-12-14', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 704, 'SOLANKI FUEL STATION', 'Dhar Retail S.A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-14at13.22.19241227102002.jpeg', '2024-12-14', '2025-06-13', './uploads/earthing_report/41069247_solankifuelstation_14dec_unsigned241227102002.pdf', 'completed', 0, 0, 61, '2024-12-27 04:49:24', 0, NULL),
(506, '24/00506', '2024-12-14', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 433, ' MEHAR & SONS', 'DHAR', '', '', 'EARTH PITTESTING\r\n', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-14at11.14.34241227102318.jpeg', '2024-12-14', '2025-06-13', './uploads/earthing_report/12340910_mshsdmehar&sons_14dec_unsigned241227102318.pdf', 'completed', 0, 0, 61, '2024-12-27 04:52:45', 0, NULL),
(507, '24/00507', '2024-12-13', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 449, ' JAI JINENDRA PETROLEUM', 'DHAR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/1241227103318.pdf', '2024-12-14', '2025-06-13', './uploads/earthing_report/12546660_mshsdjaijinendrapetroleum_13dec_unsigned241227103318.pdf', 'completed', 0, 0, 61, '2024-12-27 04:58:10', 0, NULL),
(508, '24/00508', '2024-12-13', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 459, ' PAWAN TANAY ENERGY STATION', 'DHAR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', '', '2024-12-13', '2025-06-12', './uploads/earthing_report/12590800_mshsdpawantanayenergystation_13dec_unsigned241227103644.pdf', 'completed', 0, 0, 61, '2024-12-27 05:06:06', 0, NULL),
(509, '24/00509', '2024-12-13', 'indore', '1', 'maintenance', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 438, ' BHARTI FILL & FLY', 'DHAR', '', '', 'CVT REPAIRING WORK', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-13at16.45.02241227104204.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-27 05:11:11', 0, NULL),
(510, '24/00510', '2024-12-13', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 438, ' BHARTI FILL & FLY', 'DHAR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', '', '2024-12-13', '2025-06-12', './uploads/earthing_report/12521620_mshsdbhartifill&fly_13dec_unsigned241227104627.pdf', 'completed', 0, 0, 61, '2024-12-27 05:15:40', 0, NULL);
INSERT INTO `complaint` (`id`, `sno`, `date`, `zone`, `branch`, `work_type`, `assign_to`, `complainter_name`, `complainter_number`, `outlet_name`, `outlet_location`, `contact_name`, `contact_number`, `outlet_id`, `old_outlet_name`, `old_outlet_location`, `old_contact_name`, `old_contact_number`, `description`, `job_remarks`, `job_report`, `checking_date`, `renewal_date`, `earthing_report`, `status`, `outlet_exists`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(511, '24/00511', '2024-12-13', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 452, ' PREMA SHREE FUEL CENTRE', 'DHAR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/a241227105435.pdf', '2024-12-13', '2025-06-12', './uploads/earthing_report/12563480_mshsdpremashreefuelcentre_13dec_unsigned241227105436.pdf', 'completed', 0, 0, 61, '2024-12-27 05:21:08', 0, NULL),
(512, '24/00512', '2024-12-12', 'indore', '1', 'maintenance', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 374, ' SUPREME AUTO CENTRE', 'INDORE WEST', '', '', 'AIR COMPRESSOR LAYING CABLE\r\n', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-12at19.53.20241227105832.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-27 05:27:44', 0, NULL),
(513, '24/00513', '2024-12-12', 'indore', '1', 'maintenance', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 350, ' KANCHAN FUELS', 'DEWAS', '', '', 'AUTOMATION', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-12at13.55.00241227110410.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-27 05:33:30', 0, NULL),
(514, '24/00514', '2024-12-12', 'indore', '1', 'maintenance', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 335, ' BABA FUEL STATION', 'DEWAS', '', '', 'CANNOPY LIGHT ISSUE', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-12at12.45.40241227111008.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-27 05:35:55', 0, NULL),
(515, '24/00515', '2024-12-09', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 391, ' SHAKAMBHARI FUELS', 'INDORE WEST', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/jr241227111556.pdf', '2024-12-09', '2025-06-08', './uploads/earthing_report/ept241227111557.pdf', 'completed', 0, 0, 61, '2024-12-27 05:45:18', 0, NULL),
(516, '24/00516', '2024-12-07', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 468, ' BAPOO PETROLEUM', 'JHABUA', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-07at15.20.19241227113055.jpeg', '2024-12-07', '2025-06-06', './uploads/earthing_report/12505520_mshsdbapoopetroleum,12505520_07dec_unsigned241227113055.pdf', 'completed', 0, 0, 61, '2024-12-27 05:59:14', 0, NULL),
(517, '24/00517', '2024-12-07', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 401, ' MAA PARVATI FUEL STATION', 'ALIRAJPUR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/a241227113539.jpeg', '2024-12-07', '2025-06-06', './uploads/earthing_report/whatsappimage2024-12-07at13.22.02241227113539.jpeg', 'completed', 0, 0, 61, '2024-12-27 06:04:23', 0, NULL),
(518, '24/00518', '2024-12-07', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 396, ' DAWAR PETROLEUM', 'ALIRAJPUR', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/a241227113826.jpeg', '2024-12-07', '2025-06-06', './uploads/earthing_report/12254500_mshsddawarpetroleum_07dec_unsigned241227113826.pdf', 'completed', 0, 0, 61, '2024-12-27 06:07:52', 0, NULL),
(519, '24/00519', '2024-12-06', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 478, ' BHANDARI HIGHWAY PETROLEUM', 'JHABUA', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-06at12.48.23241227115928.jpeg', '2024-12-06', '2025-06-05', './uploads/earthing_report/ept241227115928.jpeg', 'completed', 0, 0, 61, '2024-12-27 06:14:35', 0, NULL),
(520, '24/00520', '2024-12-02', 'indore', '1', 'maintenance', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 328, ' AMIR BROTHERS DEWAS', 'DEWAS', '', '', 'DU ELECTRIC ISSUES', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-02at17.57.07241227122906.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-27 06:58:25', 0, NULL),
(521, '24/00521', '2024-12-02', 'indore', '1', 'earth_renewal', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 705, 'Jai Jitendra Petro Service', 'Indore West Retail S.A', '', '', 'EARTH PIT TESTING', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-02at17.40.25241227123919.jpeg', '2024-12-02', '2025-06-01', './uploads/earthing_report/12608540_jaijitendrapetroservice_02dec_unsigned-1241227123919.pdf', 'completed', 0, 0, 61, '2024-12-27 07:08:37', 0, NULL),
(522, '24/00522', '2024-12-26', 'indore', '1', 'maintenance', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 290, 'MADHUR FUEL STATION', 'INDORE EAST', '', '', 'VOLTAZ ISSUE', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-26at17.55.32241228053207.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-28 00:01:37', 0, NULL),
(523, '24/00523', '2024-12-27', 'indore', '1', 'maintenance', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 300, 'LAMBODAR ENTERPRISES', 'INDORE EAST', '', '', 'UPS AND BATTERY FIXING\r\n', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-27at15.11.41241228053419.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-28 00:04:00', 0, NULL),
(524, '24/00524', '2024-12-27', 'indore', '1', 'maintenance', 'Pushpendra Umath', 'AJAY', '123', '', '', '', '', 300, 'LAMBODAR ENTERPRISES', 'INDORE EAST', '', '', 'CANNOPY LIGHT ', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-27at15.11.42241228053713.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-28 00:06:53', 0, NULL),
(525, '24/00525', '2024-12-27', 'indore', '2', 'maintenance', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 706, 'ADHOC VANSHIKA FUEL FILLING CENTRE', 'HOSHANGABAD', '', '', 'CVT ISSUE & YARD POLE CABLE LAYING\r\n', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-27at21.07.18241228060813.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-28 00:37:43', 0, NULL),
(526, '24/00526', '2024-12-27', 'indore', '2', 'maintenance', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 157, 'SHREE VYAS FUEL POINT', 'Sehore', '', '', 'CVT STABILIZER ISSUE', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-27at19.05.26241228061340.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-28 00:42:34', 0, NULL),
(527, '24/00527', '2024-12-27', 'indore', '2', 'maintenance', 'Ranjeet Singh Nanade', 'AJAY', '123', '', '', '', '', 707, 'HP AUTO CENTER P & T CHOURAHA', 'Bhopal ', '', '', 'POWER & HSD SECTION MOTOR', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-27at17.14.34241228065017.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-28 01:19:59', 0, NULL),
(528, '24/00528', '2024-12-27', 'indore', '2', 'maintenance', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 568, ' Atwal Petro', 'Vidisha Retail S A', '', '', 'STABILIZER AND  CVT ISSUE ', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-27at15.10.19241228065244.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-28 01:21:30', 0, NULL),
(529, '24/00529', '2024-12-26', 'indore', '2', 'maintenance', 'Prabhudayal Patel', 'AJAY', '123', 'NEW PACHOURI FILLING STATION', 'Bhopal ', '', '', 708, '', '', '', '', 'ROTARY SWITH ISSUE\r\n', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-26at22.54.10241228065810.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 1, 0, 61, '2024-12-28 01:27:26', 0, NULL),
(530, '24/00530', '2024-12-26', 'indore', '2', 'maintenance', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 709, 'NEW STAR DIESEL WORKS', 'VIDISHA', '', '', 'SECTION MOTOR ISSUE\r\n', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-26at20.04.24241228070134.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-28 01:31:14', 0, NULL),
(531, '24/00531', '2024-12-26', 'indore', '2', 'maintenance', 'Prabhudayal Patel', 'AJAY', '123', '', '', '', '', 710, 'Patidar Next Gen Energy', 'Bhopal ', '', '', '10KVA LIGHT SINGLE PHASE INSTALLATION\r\n', 'JOB COMPLETED', './uploads/job_letter/whatsappimage2024-12-26at17.36.37241228071310.jpeg', '0000-00-00', '0000-00-00', '', 'completed', 0, 0, 61, '2024-12-28 01:42:34', 0, NULL),
(532, '24/00532', '2024-12-23', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'sr', '', '', '', 119, 'SRI ENTERPRISES ', 'PAVOORCHATRAM', '', '', 'pump complaint ', '', '', NULL, NULL, '', 'not_started', 0, 0, 40, '2024-12-28 08:16:28', 0, NULL),
(533, '24/00533', '2024-12-26', 'chennai', '8', 'earth_renewal', 'J.Charles', 'APPU', '9363174843', 'MARGERY FUELS', 'TIRUNELVELI', '', '', 711, '', '', '', '', 'EARTH RENEWAL ', '', '', NULL, NULL, '', 'not_started', 1, 0, 40, '2024-12-28 08:18:50', 0, NULL),
(534, '24/00534', '2024-12-26', 'chennai', '8', 'earth_renewal', 'J.Charles', 'APPU', '9363174843', '', '', '', '', 33, 'SREE RAJARAJESHWARI ENTERPRISES', 'THARUVAI', '', '', 'EARTH RENEWAL ', '', '', NULL, NULL, '', 'not_started', 0, 0, 40, '2024-12-28 08:19:42', 0, NULL),
(535, '24/00535', '2024-12-26', 'chennai', '8', 'earth_renewal', 'J.Charles', 'APPU', '9363174843', '', '', '', '', 99, 'GEETH PETROS', 'THIRUVIRUTHANPULLEY', '', '', 'EARTH RENEWAL ', '', '', NULL, NULL, '', 'not_started', 0, 0, 40, '2024-12-28 08:20:37', 0, NULL),
(536, '24/00536', '2024-12-26', 'chennai', '8', 'earth_renewal', 'J.Charles', 'APPU', '9363174843', 'SHRI PABANASA PERUNAL AGENCY ', 'THIRUVIRUTHANPULLEY ', '', '', 712, '', '', '', '', 'EARTH RENEWAL ', '', '', NULL, NULL, '', 'not_started', 1, 0, 40, '2024-12-28 08:22:09', 0, NULL),
(537, '24/00537', '2024-12-27', 'chennai', '8', 'earth_renewal', 'J.Charles', 'APPU', '9363174843', 'LAKSHMI PRIYA AGENCIES ', 'RADHAPURAM ', '', '', 713, '', '', '', '', 'EARTH RENEWAL ', '', '', NULL, NULL, '', 'not_started', 1, 0, 40, '2024-12-28 08:23:11', 0, NULL),
(538, '24/00538', '2024-12-27', 'chennai', '8', 'earth_renewal', 'J.Charles', 'APPU', '9363174843', 'SEA TOP PETROLEUM ', 'KEELAMANAKUDY', '', '', 714, '', '', '', '', 'EARTH RENEWAL ', '', '', NULL, NULL, '', 'not_started', 1, 0, 40, '2024-12-28 08:24:03', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int NOT NULL,
  `sno` varchar(100) NOT NULL,
  `token` varchar(250) NOT NULL,
  `employee_code` varchar(100) NOT NULL,
  `employee_name` varchar(250) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `education` varchar(250) NOT NULL,
  `permission` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `zone` varchar(100) NOT NULL,
  `branch` varchar(250) NOT NULL,
  `branch_location` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_number` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `doj` varchar(50) NOT NULL,
  `status` varchar(11) NOT NULL,
  `profile_img` text,
  `aadharcard_img` text,
  `pancard_img` text,
  `bankbook_img` text,
  `licence_img` text,
  `house_no` varchar(350) NOT NULL,
  `street` varchar(350) NOT NULL,
  `city` varchar(350) NOT NULL,
  `district` varchar(350) NOT NULL,
  `pincode` varchar(350) NOT NULL,
  `contact_name` varchar(350) NOT NULL,
  `contact_relative` varchar(350) NOT NULL,
  `contact_phone_number` varchar(350) NOT NULL,
  `contact_house_no` varchar(350) NOT NULL,
  `contact_street` varchar(350) NOT NULL,
  `contact_city` varchar(350) NOT NULL,
  `contact_district` varchar(350) NOT NULL,
  `contact_pincode` varchar(350) NOT NULL,
  `basic_pay` varchar(50) NOT NULL,
  `allowance_amount` varchar(50) NOT NULL,
  `mobile_recharge` varchar(50) NOT NULL,
  `esi_status` varchar(50) NOT NULL,
  `esi_number` varchar(100) NOT NULL,
  `pf_status` varchar(50) NOT NULL,
  `pf_number` varchar(100) NOT NULL,
  `pf_amount` varchar(50) NOT NULL,
  `pan_number` varchar(50) NOT NULL,
  `aadhar_number` varchar(50) NOT NULL,
  `bank_name` varchar(250) NOT NULL,
  `bank_branch_name` varchar(250) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `ifsc_code` varchar(50) NOT NULL,
  `is_admin` int NOT NULL,
  `delete_status` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `sno`, `token`, `employee_code`, `employee_name`, `company_name`, `education`, `permission`, `password`, `zone`, `branch`, `branch_location`, `email`, `mobile_number`, `designation`, `dob`, `doj`, `status`, `profile_img`, `aadharcard_img`, `pancard_img`, `bankbook_img`, `licence_img`, `house_no`, `street`, `city`, `district`, `pincode`, `contact_name`, `contact_relative`, `contact_phone_number`, `contact_house_no`, `contact_street`, `contact_city`, `contact_district`, `contact_pincode`, `basic_pay`, `allowance_amount`, `mobile_recharge`, `esi_status`, `esi_number`, `pf_status`, `pf_number`, `pf_amount`, `pan_number`, `aadhar_number`, `bank_name`, `bank_branch_name`, `account_number`, `ifsc_code`, `is_admin`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '24/0001', 'admin', 'admin', 'admin', '', '', 'admin', '202cb962ac59075b964b07152d234b70', '', '', '', '', '1234567890', '', '', '0000-00-00', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, '2024-07-10 18:13:23', 1, '2024-07-11 16:42:18'),
(2, '24/0002', 'ggcc-001', 'GGCC 001', 'Rajan', 'ggcc', '', 'employee', '202cb962ac59075b964b07152d234b70', 'north', '1', '', '', '9920667756', '2', '', '2024-07-12', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '20000', '9000', '200', '', 'Not Applicable', 'yes', '123', '15000', '123', '123', 'abc', 'abc', '123', 'abc', 0, 1, 1, '2024-07-10 18:13:23', 1, '2024-07-11 16:42:18'),
(3, '24/0003', 'ggcc-102', 'GGCC 102', 'Nadar Bhuvana Shekar', 'ggcc', 'BCOM', 'employee', '202cb962ac59075b964b07152d234b70', 'mumbai', '13', 'Mumbai', 'bhuvananadar95@gmail.com', '7506455521', '4', '1995-07-27', '2019-02-01', 'active', '', '', '', '', '', '431', 'SHELL COLONY SERVICE ROAD', 'MUMBAI', 'MUMBAI', '400071', '', '', '', '', '', '', '', '', '16000', '6000', '200', 'no', 'Not Applicable', 'yes', '101420903254', '16000', 'FGMPS4413N', '654056533096', 'TMBL', 'Chembur', '218100720600445', 'TMBL0000218', 0, 0, 1, '2024-07-11 10:15:12', 1, '2024-11-30 07:48:50'),
(4, '24/0004', 'ggcc-132', 'GGCC 132', 'Aaditya Kumar ARK', 'ggcc', 'ZOOLOGYHONS', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '1', 'Indore', ' aadityaku15299@gmail.com', '8797264700', '3', '1999-02-15', '2022-06-07', 'active', '', '', '', '', '', 'NO 42', 'RAMNAGAR', 'OBRA', 'AURANAGABAD', '824124', '', '', '', '', '', '', '', '', '17000', '8000', '200', 'no', 'Not Applicable', 'yes', '101322238657', '15000', ' CHEPA9887L', '459503303703', 'State Bank Of India', 'OBRA AURANGABAD', '20411611573', ' SBIN0012601', 0, 0, 1, '2024-07-13 07:26:31', 1, '2024-11-08 09:52:29'),
(5, '24/0005', 'ggcc-086', 'GGCC 086', 'Ajay Yadav', 'ggcc', '10TH STANDARD PASS', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '1', 'Indore', ' ajayadav42760@gmail.com', '9589239680', '6', '1993-07-12', '2023-01-01', 'active', '', '', '', '', '', '127 B', 'DHEERAJ NAGAR', 'INDORE', 'INDORE', '452010', '', '', '', '', '', '', '', '', '17000', '8000', '200', 'no', 'Not Applicable', 'yes', '100650291060', '15000', ' ANPPY8836N', '246797798941', 'Tamilnad Mercantile Bank Ltd', 'INDORE', '444149589239680', ' TMBL0000444', 0, 0, 1, '2024-07-13 07:34:57', 1, '2024-11-08 09:52:58'),
(6, '24/0006', 'ggcc-084', 'GGCC 084', 'P.Allwin', 'ggcc', 'DIPLOMA ( DEE)', 'employee', '202cb962ac59075b964b07152d234b70', 'chennai', '6', 'Indore', ' pallwin86@gmail.com', '9713450011', '5', '1986-05-08', '2015-12-01', 'active', '', '', '', '', '', '5/5D', 'SOUTH KARUMPATTOOR', 'SWAMYTHOPPU POST', 'KANYAKUMARI', '629701', '', '', '', '', '', '', '', '', '25000', '20000', '200', 'no', 'Not Applicable', 'yes', '100649963586', '25000', ' ABMPA0285G', '740110423954', 'Tamilnad Mercantile Bank Ltd', ' CHEMBUR', '218100720600073', ' TMBL0000218', 0, 0, 1, '2024-07-13 07:44:02', 1, '2024-11-08 10:16:20'),
(7, '24/0007', 'ggcc-094', 'GGCC 094', 'Prabhudayal Patel', 'ggcc', 'B.COM', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '2', 'Indore', ' ap.030792@gamil.com', '8269532621', '6', '1992-07-07', '2017-07-01', 'active', '', '', '', '', '', '107', 'TALAVALI CHANDG', 'INDORE', 'INDORE', '453771', '', '', '', '', '', '', '', '', '20000', '8000', '200', 'no', 'Not Applicable', 'yes', '101132615953', '15000', ' CMVPP2248E', '906294105638', 'Tamilnad Mercantile Bank Ltd', 'INDORE', '444100050300412', ' TMBL0000444', 0, 0, 1, '2024-07-13 08:20:25', 1, '2024-11-08 10:16:36'),
(8, '24/0008', 'ggcc-105', 'GGCC 105', 'Deepak Kumar Mouriya', 'ggcc', '10TH STANDARD PASS', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '1', 'Indore', ' mauryadipak079@gmail.com', '6280321565', '6', '1993-01-01', '2019-04-01', 'active', '', '', '', '', '', '', 'BELAHARI', 'AMETHI', 'AMETHI', '227405', '', '', '', '', '', '', '', '', '15000', '8000', '200', 'no', 'Not Applicable', 'yes', '101446396581', '15000', ' DIRPM20225', '339321892181', 'UCO BANK', 'AMETHI', '24240110085288', ' UCBA00002424', 0, 0, 1, '2024-07-13 08:24:18', 1, '2024-11-08 10:03:55'),
(9, '24/0009', 'ggcc-135', 'GGCC 135', 'Ramashankar Prasad', 'ggcc', '', 'employee', '202cb962ac59075b964b07152d234b70', 'mumbai', '11', 'Indore', '', '7887920107', '6', '', '2023-01-01', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '25000', '8000', '200', 'no', 'Not Applicable', 'yes', '101914491001', '15000', 'abc', 'abc', 'Punjab National Bank', 'abc', '2400000100213458', 'abc', 0, 0, 1, '2024-07-13 08:28:02', 1, '2024-12-05 08:08:59'),
(10, '24/00010', 'ggcc-002', 'GGCC 002', 'Praful Thandel', 'ggcc', '8TH STANDARD PASS', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '1', 'Indore', ' prafulthandel8168@gmail.com', '9892557049', '2', '1972-08-21', '2005-11-01', 'active', '', '', '', '', '', 'NO6', '', '', '', '', '', '', '', '', '', '', '', '', '20000', '8000', '200', 'no', 'Not Applicable', 'yes', '100275120870', '15000', ' AHRPT7799K', '645370545932', 'Tamilnad Mercantile Bank Ltd', 'Chembur', '218100050300730', ' TMBL0000218', 0, 0, 1, '2024-07-13 08:31:50', 1, '2024-11-11 06:33:02'),
(11, '24/00011', 'ggcc-034', 'GGCC 034', 'Bapu Parshuram Shirodkar', 'ggcc', '8TH STANDARD PASS', 'employee', '202cb962ac59075b964b07152d234b70', 'mumbai', '11', 'Indore', ' sunilshirodkar70@gmail.com', '9930552955', '2', '1971-07-08', '2008-12-01', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '25000', '8000', '200', 'no', 'Not Applicable', 'yes', '100107951357', '15000', ' BMYPS78448', '315188351099', 'Tamilnad Mercantile Bank Ltd', 'Chembur', '218100050300351', ' TMBL0000218', 0, 0, 1, '2024-07-13 09:02:33', 1, '2024-11-08 09:55:05'),
(12, '24/00012', 'ggcc-040', 'GGCC 040', 'Vaibhav Vinayak Nadkarni', 'ggcc', '10TH STANDARD PASS', 'employee', '202cb962ac59075b964b07152d234b70', 'mumbai', '3', 'Mumbai', 'Vaibhav.n619@gmail.com', '898208218', '6', '1991-06-02', '2010-05-24', 'active', '', '', '', '', '', '1/2', 'KAILASH NAGAR', 'KALYAN EAST', 'THANE', '421306', '', '', '', '', '', '', '', '', '23000', '8000', '200', 'no', 'Not Applicable', 'yes', '100399345214', '15000', 'AJEPN9298A', '906060133460', 'TAMILNAD MERCANTILE BANK LTD', 'CHEMBUR', '218100720600103', 'TMBL0000218', 0, 0, 1, '2024-07-13 09:07:22', 1, '2024-11-08 10:03:36'),
(13, '24/00013', 'ggcc-093', 'GGCC 093', 'Raghunath S Parida', 'ggcc', '', 'employee', '202cb962ac59075b964b07152d234b70', 'mumbai', '3', 'Mumbai', '', '7769962846', '6', '', '2023-01-01', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '23000', '10000', '200', 'no', 'Not Applicable', 'yes', '100290525018', '15000', 'abc', 'abc', 'Tamilnad Mercantile Bank Ltd', 'Chembur', '218100050300342', 'TMBL0000218', 0, 0, 1, '2024-07-13 09:11:42', 1, '2024-12-05 08:15:24'),
(14, '24/00014', 'ggcc-037', 'GGCC 037', 'Ranjeet Singh Nanade', 'ggcc', '12TH STANDARD PASS', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '2', 'Mumbai', 'rs771236@gmail.com', '9834993588', '2', '1973-03-31', '2009-05-01', 'active', '', '', '', '', '', '1', 'KALYAN MURBAD ROAD SHAHAD PHATAK', 'ULHASNAGAR 1', 'THANE', '421001', '', '', '', '', '', '', '', '', '21000', '8000', '200', 'no', 'Not Applicable', 'yes', '100307924904', '15000', 'BYDPN5255N', '469717436193', 'TAMILNAD MERCANTILE BANK LTD', 'CHEMBUR', '218100050300394', 'TMBL0000218', 0, 0, 1, '2024-07-13 09:14:33', 1, '2024-11-08 10:19:51'),
(15, '24/00015', 'ggcc-043', 'GGCC 043', 'Nilesh G Savratkar', 'ggcc', '', 'employee', '202cb962ac59075b964b07152d234b70', 'north', '13', '', '', '123', '2', '', '2024-07-02', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '21000', '8000', '200', 'no', 'Not Applicable', 'yes', '100255467057', '15000', 'abc', 'abc', 'Tamilnad Mercantile Bank ltd', 'Chembur', '218100720600099', '', 0, 1, 1, '2024-07-13 09:17:29', 1, '2024-08-29 10:42:20'),
(16, '24/00016', 'ggcc-046', 'GGCC 046', 'Pramod Dhaku Mungekar', 'ggcc', '10TH STANDARD PASS', 'employee', '202cb962ac59075b964b07152d234b70', 'mumbai', '3', 'Mumbai', 'pramodmung1983@gmail.com', '9768671114', '6', '1983-07-25', '2011-01-01', 'active', '', '', '', '', '', '850', '', 'DEVGAD', 'SINDHUDURG', '416630', '', '', '', '', '', '', '', '', '19000', '8000', '0', 'no', 'Not Applicable', 'yes', '100276584252', '15000', 'AXPPM5363C', '573979836689', 'TAMILNAD MERCANTILE BANK LTD', 'CHEMBUR', '218100050301639', 'TMBL0000218', 0, 0, 1, '2024-07-13 09:22:07', 1, '2024-11-08 11:32:37'),
(17, '24/00017', 'ggcc-099', 'GGCC 099', 'P Muthu Kumar', 'ggcc', 'B.E MECH', 'employee', '202cb962ac59075b964b07152d234b70', 'chennai', '6', 'Tamil Nadu', ' p.muthukumar@gmail.com', '9345335433', '3', '1996-06-22', '2018-04-01', 'active', '', '', '', '', '', '8A', 'PUNNIYAVALANPURAM', 'PANAGUDI', 'TIRUNELVELI', '627109', '', '', '', '', '', '', '', '', '22000', '8000', '200', 'no', 'Not Applicable', 'yes', '101286700652', '15000', ' CIAPM8773J', '616433043417', 'TAMILNAD MERCANTILE BANK LTD', 'PANAGUDI', '248100050305253', ' TMBL0000248', 0, 0, 1, '2024-07-13 09:24:51', 1, '2024-11-08 10:15:28'),
(18, '24/00018', 'ggcc-122', 'GGCC 122', 'Kishor Selvam', 'ggcc', 'BSC MATHEMATICS', 'employee', '202cb962ac59075b964b07152d234b70', 'chennai', '6', 'Tamil Nadu', ' kishoreselvam2013@gmail,com', '8939108991', '6', '1995-05-18', '2021-08-02', 'active', '', '', '', '', '', '118', 'SOUTH STREET', 'VIRUDHACHALAM', 'CUDDALORE', '606104', '', '', '', '', '', '', '', '', '15000', '8000', '200', 'no', 'Not Applicable', 'yes', '101722099112', '15000', ' HZYPK1119N', '820176096489', 'Indian Overseas Bank', 'LOYOLA COLLAGE', '171201000031488', ' IOBA 0001712', 0, 0, 1, '2024-07-13 09:28:35', 1, '2024-12-02 08:10:19'),
(19, '24/00019', 'ggcc-140', 'GGCC 140', 'Lenin Fernondo', 'ggcc', 'ITI', 'employee', '202cb962ac59075b964b07152d234b70', 'chennai', '6', 'Tamil Nadu', ' leninfernando96@gmail.com', '8526007539', '6', '1996-07-30', '2023-05-08', 'active', '', './uploads/employee_aadharcard/leninaadhar241023103848.pdf', './uploads/employee_pancard/leninpancard241023103757.pdf', '', '', '121', 'MATHUR ROAD', 'VIRUDHACHALAM', 'CUDDALORE', '606104', '', '', '', '', '', '', '', '', '14000', '8000', '200', 'yes', '3416244216', 'yes', '101821078985', '13000', ' BKGPL9746K', '316122647468', 'Indian Overseas Bank', 'ALADI', '109401000011515', ' IDBA0001094', 0, 0, 1, '2024-07-13 09:32:52', 1, '2024-12-02 08:10:48'),
(20, '24/00020', 'ggcc-068', 'GGCC 068', 'G Joseph Margasis', 'ggcc', 'ITI', 'employee', '202cb962ac59075b964b07152d234b70', 'chennai', '9', 'Tamil Nadu', ' joyeemoriyo@gmail.com', '9790033091', '2', '1992-04-24', '2013-01-01', 'active', '', '', '', '', '', '328', 'FATHIMA STEET', 'PANAGUDI', 'TIRUNELVELI', '627109', '', '', '', '', '', '', '', '', '23500', '10500', '200', 'no', 'Not Applicable', 'yes', '100147893430', '15000', ' BAEPJ5184P', '420454027796', 'Tamilnad Mercantile Bank Ltd', 'PODHANUR', '058109790033091', ' TMBL0000058', 0, 0, 1, '2024-07-13 14:27:49', 1, '2024-11-08 10:05:16'),
(21, '24/00021', 'ggcc-116', 'GGCC 116', 'Karthik K', 'ggcc', 'B.E  ELECTRICAL', 'employee', '202cb962ac59075b964b07152d234b70', 'chennai', '6', 'Tamil Nadu', ' kalaikarthik19@gmail.com', '9500323408', '6', '1990-06-22', '2019-12-01', 'active', '', '', '', '', '', '3*/295', 'SOUTH STREET', 'KATTUMANNAR KOIL', 'CUDDALORE', '608305', '', '', '', '', '', '', '', '', '20000', '9000', '200', 'no', 'Not Applicable', 'yes', '100190477301', '15000', ' DPQPK1078Q', '519421550722', 'State Bank Of India', 'T.NEDUNJERI', '33798843970', ' SBIN0006239', 0, 0, 1, '2024-07-13 14:34:20', 1, '2024-11-08 10:10:55'),
(22, '24/00022', 'ggcc-050', 'GGCC 050', 'A. Ellavarasan', 'ggcc', '5 th', 'employee', '202cb962ac59075b964b07152d234b70', 'chennai', '6', 'Tamil Nadu', 'elavarasan669@gmail.com', '9003179883', '3', '1985-06-10', '2011-11-01', 'active', './uploads/employee_profile/vaibhav241023071646.jpeg', '', '', '', '', '233', 'SOUTH STREET', 'KATTUMANNAR KOIL', 'CUDDALORE', '608302', '', '', '', '233', 'SOUTH STREET', 'KATTUMANNAR KOIL', 'CUDDALORE', '608302', '23500', '10500', '200', 'no', 'Not Applicable', 'yes', '100145028944', '15000', ' ACPPE2451A', '825351196045', 'TAMILNAD MERCANTILE BANK LTD', 'CHITHAMBARAM', '312100050301856', ' TMBL0000312', 0, 0, 1, '2024-07-13 14:39:43', 1, '2024-12-10 16:33:10'),
(23, '24/00023', 'ggcc-082', 'GGCC 082', 'A.Arulmani', 'ggcc', '', 'employee', '202cb962ac59075b964b07152d234b70', 'chennai', '9', 'Tamil Nadu', '', '9626287278', '6', '1982-11-09', '2015-09-01', 'active', '', '', '', '', '', '359', 'ROAD STREET', 'MANNARGUDI', 'CUDDALORE', '608302', '', '', '', '', '', '', '', '', '17000', '8000', '200', 'no', 'Not Applicable', 'yes', '100604454985', '15000', ' BZMPA8855M', '929395490078', 'Tamilnad Mercantile Bank', 'CANTCNMENT PALLAVARAM', '210100050305252', 'TMBL0000210', 0, 0, 1, '2024-07-13 14:45:47', 1, '2024-11-10 14:23:04'),
(24, '24/00024', 'ggcc-067', 'GGCC 067', 'J.Charles', 'ggcc', 'ITI', 'employee', '202cb962ac59075b964b07152d234b70', 'chennai', '7', 'Tamil Nadu', ' charlesraja1992@gmail .com', '8098742317', '6', '1992-07-04', '2013-01-01', 'active', '', '', '', '', '', '4/50', 'MIDDLE STREET', 'ODAKKARAI', 'TIRUNELVELI', '627414', '', '', '', '', '', '', '', '', '23000', '8000', '200', 'no', 'Not Applicable', 'yes', '100169001751', '15000', ' BGZPC3722M', '752236331711', 'Tamilnad Mercantile Bank Ltd', 'CHEVANMANDHADEVI', '210100050304937', ' TMBL0000490', 0, 0, 1, '2024-07-13 14:50:37', 1, '2024-11-08 10:09:50'),
(25, '24/00025', 'beh-003', 'BEH 003', 'Chand Basha Basheer Gulam', 'bright', '', 'employee', '202cb962ac59075b964b07152d234b70', 'mumbai', '13', 'Mumbai', 'cbasha7734@gmail.com', '9082577305', '2', '1985-12-07', '2019-04-01', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '20000', '14000', '200', 'no', 'Not Applicable', 'yes', '100463895891', '20000', 'AJIPG4035A', '477969354128', 'TAMILNAD MERCANTILE BANK LTD', 'CHEMBUR', '218100720600074', 'TMBL0000218', 0, 0, 1, '2024-08-05 03:23:42', 1, '2024-12-07 09:41:35'),
(26, '24/00026', 'beh-008', 'BEH 008', 'Munna Kumar Singh', 'bright', '', 'employee', '202cb962ac59075b964b07152d234b70', 'north', '13', '', '', '7738542303', '3', '', '2019-04-01', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '19000', '8000', '200', 'no', 'Not Applicable', 'yes', '101447717389', '15000', '123', '123', 'TAMILNAD MERCANTILE BANK LTD', 'CHEMBUR', '218100720600101', 'TMBL0000218', 0, 1, 1, '2024-08-05 03:27:55', 0, NULL),
(27, '24/00027', 'beh-014', 'BEH 014', 'Prins Kumar', 'bright', '10TH STANDARD PASS', 'employee', '202cb962ac59075b964b07152d234b70', 'north', '1', '', ' princemaurya@gmail.com', '7071341008', '6', '', '2019-04-01', 'active', '', '', '', '', '', '101', 'MAURYA BHAVAN', '', '', '', '', '', '', '', '', '', '', '', '22000', '8000', '200', 'no', 'Not Applicable', 'yes', '101447716720', '15000', ' EXVPK4254G', '855008805154', 'Baroda Uttar Pradesh Gramin Bank', 'AMETHI', '51540100016394', 'BARB0AMETHI', 0, 1, 1, '2024-08-05 03:35:54', 1, '2024-08-20 11:02:54'),
(28, '24/00028', 'beh-031', 'BEH 031', 'Arvind', 'bright', '8TH STANDARD PASS', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '1', 'Indore', ' rajasushil15@gmail.com', '7081607476', '6', '2000-03-01', '2022-01-01', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '14000', '8000', '200', 'no', 'Not Applicable', 'yes', '101394072650', '14000', ' CNZPA5047F', '338087080383', 'State Bank Of India', 'Amethi', '36132203039', 'SBIN0001158', 0, 0, 1, '2024-08-06 07:52:33', 1, '2024-11-08 09:53:47'),
(29, '24/00029', 'beh-033', 'BEH 033', 'Nitesh Gurjar', 'bright', '5TH STANDARDPASS', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '1', 'Indore', ' riteshgurjar4372@gmail.com', '8827672424', '6', '1993-01-01', '2022-01-01', 'active', '', '', '', '', '', 'NO6', 'HARDA', 'HARDA', 'HARDA', '461331', '', '', '', '', '', '', '', '', '16000', '8000', '200', 'no', 'Not Applicable', 'yes', '101777016329', '15000', ' DGQPG1941D', '305374844047', 'Canara Bank', 'Harda', '4117101000884', 'CNRB0004117', 0, 0, 1, '2024-08-06 07:57:13', 1, '2024-11-08 10:14:59'),
(30, '24/00030', 'beh-034', 'BEH 034', 'Omprakash', 'bright', '5TH STANDARDPASS', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '5', 'Indore', ' omprakashsitole84@gmail.com', '9644137920', '3', '1990-01-01', '2022-01-01', 'active', '', '', '', '', '', 'NO72', 'GRNM KILODA', 'KANNOD', 'DEWAS', '455332', '', '', '', '', '', '', '', '', '16000', '8000', '200', 'no', 'Not Applicable', 'yes', '101777016291', '15000', ' ABYPO1785H', '896395578125', 'TAMILNAD MERCANTILE BANK LTD', 'INDORE', '444100050301038', 'TMBL0000444', 0, 0, 1, '2024-08-06 08:03:30', 1, '2024-11-08 10:15:15'),
(31, '24/00031', 'beh-035', 'BEH 035', 'Pushpendra Umath', 'bright', '12TH STANDARD PASS', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '1', 'Indore', ' thakur96rahul@gmail.com', '9074125307', '3', '1996-06-30', '2022-01-01', 'active', '', '', '', '', '', '160', '', 'INDORE', '', '453555', '', '', '', '', '', '', '', '', '17000', '8000', '200', 'no', 'Not Applicable', 'yes', '101431668668', '15000', ' AGQPU3058C', '427298282713', 'Punjab National Bank', 'Indore', '4622000400005702', 'PUNB0462200', 0, 0, 1, '2024-08-06 08:05:50', 1, '2024-11-08 10:18:03'),
(32, '24/00032', 'beh-039', 'BEH 039', 'Ghanshyam', 'bright', '10TH STANDARD PASS', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '1', 'Indore', ' gshah2282@gmail.com', '9892698550', '6', '1989-03-07', '2022-11-01', 'active', '', '', '', '', '', '415', 'AYODHA COMPLEX', 'THANE WEST MUMBAI', 'THANE', '400604', '', '', '', '', '', '', '', '', '21000', '8000', '200', 'no', 'Not Applicable', 'yes', '101893490487', '15000', ' BOWPS6154J', '389717491337', ' BHARAT BANK', 'GOVANDI', '1410100127476', 'BCBM000015', 0, 0, 1, '2024-08-21 13:55:43', 1, '2024-11-08 10:08:49'),
(33, '24/00033', 'beh-043', 'BEH 043', 'Dheraj', 'bright', '12TH STANDARD PASS', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '1', 'Indore', '', '9621725806', '6', '2005-05-10', '2022-12-01', 'active', '', '', '', '', '', '52', '', 'BALLIA DARIYAPUR', 'BALLIA', '277502', '', '', '', '', '', '', '', '', '15000', '5000', '200', 'yes', '1817325657', 'yes', '101902897640', '15000', ' HYYPD1530D', '213404515950', 'UNION BANK OF INDIA', 'CHITBARAGAON', '712902120002505', 'UBFN0571296', 0, 0, 1, '2024-08-21 13:58:59', 1, '2024-11-08 10:04:44'),
(34, '24/00034', 'beh-046', 'BEH 046', 'Gaurav Yadav', 'bright', '5TH STANDARDPASS', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '1', 'Indore', '', '9329037015', '6', '2004-01-03', '2023-04-03', 'active', '', '', '', '', '', '5', 'RETHI ROAD', 'OBEDULLAGANJ', 'RAISEN', '464993', '', '', '', '', '', '', '', '', '15000', '6000', '200', 'yes', '1017466310', 'yes', '101937727413', '15000', ' BNPPY1666P', '562532220357', 'CANARA BANK', 'OBEDULLAGANJ', '110117774354', 'CNRB0006076', 0, 0, 1, '2024-08-21 14:01:48', 1, '2024-12-04 07:47:50'),
(35, '24/00035', 'beh-007', 'BEH 007', 'Munna Kumar Singh', 'bright', '5TH STANDARDPASS', 'employee', '202cb962ac59075b964b07152d234b70', 'mumbai', '13', 'Mumbai', 'msingh362436@gmail.com', '7738542303', '3', '1983-10-01', '2019-04-01', 'active', '', '', '', '', '', '', 'HASAPURA SONNATHU', 'BIHAR', 'AURANGABAD', '824115', '', '', '', '', '', '', '', '', '19000', '8000', '200', 'no', 'Not Applicable', 'yes', '101447717389', '15000', 'DDPPS90975', '902775525512', 'TAMILNAD MERCANTILE BANK LTD', 'CHEMBUR', '218100720600101', 'TMBL0000218', 0, 0, 1, '2024-08-21 14:04:54', 1, '2024-11-08 10:14:08'),
(36, '24/00036', 'beh-015', 'BEH 015', 'Prins Kumar', 'bright', '10TH STANDARD PASS', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '5', 'Indore', ' princemaurya7071341008@gmail.com', '7071341008', '6', '', '2019-04-01', 'active', '', '', '', '', '', '101', 'MAURYA BHAVAN', 'AMETHI CITY', 'AMETHI', '227405', '', '', '', '', '', '', '', '', '22000', '8000', '200', 'no', 'Not Applicable', 'yes', '101447716720', '15000', ' EXVPK4254G', '855008805154', 'BANK OF BARODA', 'AMETHI', '8820100034965', 'BARB0AMETHI', 0, 0, 1, '2024-08-21 14:08:35', 1, '2024-11-08 10:17:24'),
(37, '24/00037', 'beh-009', 'BEH 009', 'C Anbujothi', 'bright', 'DIPLOMO EEE', 'employee', '202cb962ac59075b964b07152d234b70', 'chennai', '7', 'Tamil Nadu', ' anbuj4768@gmail.com', '9159499134', '2', '1978-04-29', '2019-04-01', 'active', '', '', '', '', '', '116/1', 'MATHUR ROAD', 'VIRUDHACHALAM', 'CUDDALORE', '606104', '', '', '', '', '', '', '', '', '18000', '8000', '200', 'no', 'Not Applicable', 'yes', '101447717410', '15000', ' CYHPA8422M', '246421000106', 'INDIAN OVERSEAS BANK', 'ALADI', '109101000009379', 'IOBA 0001094', 0, 0, 1, '2024-08-21 14:21:38', 1, '2024-11-08 10:02:55'),
(38, '24/00038', 'beh-012', 'BEH 012', 'Jwala Singh', 'bright', '8TH', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '5', 'Indore', '', '9135934141', '6', '1984-01-01', '2019-04-01', 'active', '', '', '', '', '', '', 'SONHATHU', 'AURANGAPAD', 'AURANGAPAD', '824115', '', '', '', '', '', '', '', '', '17000', '8000', '200', 'no', 'Not Applicable', 'yes', '100178879892', '15000', ' EUAPS4567Q', '377026995340', 'TAMILNAD MERCANTILE BANK LTD', 'PALLAVARAM', '210100050304981', 'TMBL0000210', 0, 0, 1, '2024-08-21 14:24:52', 1, '2024-11-08 10:10:22'),
(39, '24/00039', 'beh-024', 'BEH 024', 'Elangovan A', 'bright', '10 th', 'employee', '202cb962ac59075b964b07152d234b70', 'chennai', '6', 'Tamil Nadu', ' iniyainiya008@gmail.com', '9600332995', '6', '1984-05-11', '2019-08-01', 'active', '', '', '', '', '', '233A', 'SOUTH STREET', 'KATTUMANNARKOIL', 'CUDDALORE', '608302', '', '', '', '', '', '', '', '', '16000', '8000', '200', 'no', 'Not Applicable', 'yes', '101496274540', '15000', ' AEHPE7314L', '270919480306', 'INDIAN BANK', 'KATTUMANNARKOIL', '6119254948', 'IDIB000K030', 0, 0, 1, '2024-08-23 17:20:56', 1, '2024-12-04 07:47:01'),
(40, '24/00040', 'beh-036', 'BEH 036', 'Appuvelangkanni C', 'bright', 'ITI', 'employee', '202cb962ac59075b964b07152d234b70', 'chennai', '6', 'Tamil Nadu', ' appuyt0007@gmail.com', '9363174843', '6', '2002-05-12', '2022-10-01', 'active', '', '', '', '', '', '204', 'EAST STREET', 'ULUNDURPET', 'VILLUPURAM', '607204', '', '', '', '', '', '', '', '', '15000', '7000', '200', 'yes', '5133900943b', 'yes', '101884118483', '15000', ' ESBPA4811A', '866338965709', 'CITY UNION BANK', 'CIUB0000075', '500101013176075', 'CIUB0000075', 0, 0, 1, '2024-08-23 17:25:11', 1, '2024-12-04 07:47:16'),
(41, '24/00041', 'ggcc-114', 'GGCC 114', 'Tabrej Alam', 'ggcc', '12TH STANDARD PASS', 'employee', '202cb962ac59075b964b07152d234b70', 'mumbai', '3', 'Mumbai', 'Tabrejmusarraf96@gmail.com', '8355857114', '6', '1991-02-04', '2019-12-01', 'active', '', '', '', '', '', '02', '', 'SHEOHAR', 'SHEOHAR', '843334', '', '', '', '', '', '', '', '', '15000', '2000', '200', 'yes', 'Not Applicable', 'yes', '101547056712', '15000', 'CUCPA1348D', '560779756386', 'TAMILNAD MERCANTILE BANK LTD', 'CHEMBUR', '218149987552984', 'TMBL0000218', 0, 0, 1, '2024-08-29 07:45:40', 1, '2024-11-10 14:37:33'),
(42, '24/00042', 'beh-040', 'BEH 040', 'Sadhitya Kumar ARK', 'bright', 'INTERMEDIATE', 'employee', '202cb962ac59075b964b07152d234b70', 'north', '3', 'Maharashtra', 'monusinghrajputra9934@gmail.com', '9934658506', '6', '2004-02-02', '2024-07-01', 'active', '', '', '', '', '', '42', 'RAMNAGAR', 'OBRA', 'AURANGABAD', '824124', '', '', '', '', '', '', '', '', '15000', '5000', '200', 'yes', '123', 'yes', '123', '15000', 'FKPPA1774P', '827254577858', 'STATE BANK OF INDIA', 'OBRA', '43097252344', 'SBIN0012601', 0, 0, 1, '2024-08-29 07:51:40', 1, '2024-10-16 07:12:28'),
(43, '24/00043', 'beh-041', 'BEH 041', 'Amaladas C', 'bright', '10TH STANDARD PASS', 'employee', '202cb962ac59075b964b07152d234b70', 'chennai', '6', 'Tamil Nadu', ' amaladassamalac199@gmail.com', '8939253308', '3', '1991-02-16', '2022-11-01', 'active', '', '', '', '', '', '16', 'NORTH STREET', 'VIRUDHACHALAM', 'CUDDALORE', '606104', '', '', '', '', '', '', '', '', '18000', '8000', '200', 'no', 'Not Applicable', 'yes', '101577917503', '15000', ' CTQPC9947K', '8939253308', 'CANARA BANK', 'PUVANUR', '1671101020607', 'CNRB0001671', 0, 0, 1, '2024-08-29 13:06:21', 1, '2024-11-08 09:53:14'),
(44, '24/00044', 'beh-049', 'BEH 049', 'Rajeshkumar R', 'bright', 'ITI', 'employee', '202cb962ac59075b964b07152d234b70', 'chennai', '6', 'Tamil Nadu', ' rajeshvijay072@gmail.com', '9597138898', '6', '2000-05-27', '2023-09-01', 'active', '', '', '', '', '', '2*/127', 'RANGAN STREET', 'UTHAMASOZHAMANGALAM', 'CUDDALORE', '608002', '', '', '', '', '', '', '', '', '15000', '5000', '200', 'yes', '5135229884', 'yes', '102002261595', '15000', ' FTCPR0859G', '703602796711', 'INDIAN BANK', 'ANNAMALAI NAGAR', '6365640261', 'IDIB000A024', 0, 0, 1, '2024-08-30 12:49:46', 1, '2024-11-08 10:18:52'),
(45, '24/00045', 'beh-052', 'BEH 052', 'Mathura Nayagam Athisayam', 'bright', '8th', 'employee', '202cb962ac59075b964b07152d234b70', 'mumbai', '3', 'Tamil Nadu', ' athisayam.nadar@gmail.com', '9833804577', '6', '1990-01-18', '2023-10-01', 'active', '', '', '', '', '', '3-/17', 'CSI KOIL STREET', 'TIRUNELVELI', 'TIRUNELVELI', '627357', '', '', '', '', '', '', '', '', '17000', '8000', '200', 'no', 'Not Applicable', 'yes', '100712674063', '15000', ' ARVPA8765A', '826941105631', 'ICICI', 'TIRUNELVELI', '003501571913', 'ICIC0006135', 0, 0, 1, '2024-08-30 12:54:26', 1, '2024-12-04 07:47:33'),
(46, '24/00046', 'beh-054', 'BEH 054', 'Raj Kumar', 'bright', 'DIPLOMO EEE', 'employee', '202cb962ac59075b964b07152d234b70', 'chennai', '6', 'Tamil Nadu', ' eeeraji103@gmail.com', '6381190197', '6', '1997-05-05', '2024-01-01', 'active', '', '', '', '', '', '40', 'ROAD STREET', 'KATTUMANNARKOIL', 'CUDDALORE', '608302', '', '', '', '', '', '', '', '', '14000', '8000', '200', 'no', 'Not Applicable', 'yes', '101547069375', '14000', ' EPYPR4190M', '548048232168', 'INDIAN BANK', 'LALPET', '6372735619', 'IDIB000L001', 0, 0, 1, '2024-08-30 12:56:54', 1, '2024-11-08 10:18:39'),
(47, '24/00047', 'beh-058', 'BEH 070', 'Amin Kumar', 'bright', '', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '1', 'Mumbai', ' amkuki@gmail.com', '7544953204', '6', '2001-05-24', '2024-08-01', 'active', '', '', '', '', '', '', 'ward no-1 , amaraurkritpur', 'AMARURKRITPUR', 'BEGUSARAI', '851134', '', '', '', '', '', '', '', '', '12000', '8000', '200', 'no', 'Not Applicable', 'no', 'Not Applicable', '0', ' IAOPK9743N', '874993965491', 'MADHYA BIHAR GRAMIN BANK', 'BEGUSARAI', '38430410056391', 'PUNBOMBGB06', 0, 0, 1, '2024-08-30 12:59:55', 1, '2024-12-02 05:22:23'),
(48, '24/00048', 'ggcc-133', 'GGCC 133', 'Awadhesh Rajbhar', 'ggcc', '', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '1', 'Indore', ' avdheskumar018@gmail.com', '8765741326', '6', '1988-01-01', '2022-06-01', 'active', '', '', '', '', '', 'NO19', 'DARIYAPUR', 'BALLIA', 'BALLIA', '277502', '', '', '', '', '', '', '', '', '19000', '8000', '200', 'no', 'Not Applicable', 'yes', '101190146261', '15000', ' DKXPR1457N', '71922646068', 'STATE BANK OF INDIA', 'DARIYAPUR', '32377833957', ' SBIN0002537', 0, 0, 1, '2024-08-30 13:02:44', 1, '2024-11-08 09:54:12'),
(49, '24/00049', 'beh-086', 'BEH 086', 'Ram Khelavan Verma', 'ggcc', '', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '1', 'Indore', '', '9580616025', '6', '1984-02-01', '2023-07-14', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '15000', '8000', '200', 'no', 'Not Applicable', 'yes', '9580616025', '15000', ' CYKPK4094E', '354155582887', 'STATE BANK OF INDIA', 'LAMBUVA', '37140174188', ' SBIN0011331', 0, 0, 1, '2024-08-30 13:05:08', 1, '2024-11-08 10:19:05'),
(50, '24/00050', 'ggcc-044', 'GGCC 044', 'Nilesh G Savratkar', 'ggcc', 'S S C PASS', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '5', 'Mumbai', 'Nileshsavratkar62@gmail.com', '8652007366', '2', '1977-08-22', '2010-11-01', 'active', '', '', '', '', '', '67', '27 CP TALAV ,WAGLE ESTATE', 'THANE', 'THANE', '400604', '', '', '', '', '', '', '', '', '21000', '8000', '200', 'no', 'Not Applicable', 'yes', '100255467057', '15000', 'AYBPS1577P', '256751120516', 'TAMILNAD MERCANTILE BANK LTD', 'CHEMBUR', '2181007206600099', 'TMBL0000218', 0, 0, 1, '2024-09-06 09:15:53', 1, '2024-11-08 10:14:46'),
(51, '24/00051', 'ggcc-091', 'GGCC 091', 'P. Arumugakani Raja', 'ggcc', 'DIPLOMO EEE', 'employee', '202cb962ac59075b964b07152d234b70', 'chennai', '10', 'Tamil Nadu', ' arumugakaniraj875@gmail.com', '7708134829', '6', '1977-01-19', '2016-09-01', 'active', '', '', '', '', '', '2*/405', 'OLD POST OFFICE STREET', 'KARUTHAPILLAIYUR', 'TENKASI', '627418', '', '', '', '', '', '', '', '', '20000', '8000', '200', 'no', 'Not Applicable', 'yes', '100923175836', '15000', ' CHUPA7102E', '205789703548', 'TAMILNAD MERCANTILE BANK LTD', 'VICKRAMASINGAPURAM', '409100050302857', ' TMBL0000409', 0, 0, 1, '2024-09-08 12:09:34', 1, '2024-11-08 10:15:49'),
(52, '24/00052', 'ggcc-104', 'GGCC 104', 'Santosh Kumar', 'ggcc', '', 'employee', '202cb962ac59075b964b07152d234b70', 'mumbai', '11', 'Indore', '', '9561676004', '3', '', '2019-04-01', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '19000', '8000', '200', 'no', 'Not Applicable', 'yes', '101446403273', '15000', '123', '123', 'TAMILNAD MERCANTILE BANK LTD', 'CHEMBUR', '218100050302610', 'TMBL0000218', 0, 0, 1, '2024-09-08 12:54:49', 1, '2024-11-08 10:20:09'),
(53, '24/00053', 'beh-057', 'BEH 057', 'Pritam Chadar', 'bright', '', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '1', 'Tamil Nadu', 'xyz', '123', '6', '', '2024-07-01', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '16000', '8000', '200', 'no', 'Not Applicable', 'yes', '102103548750', '15000', '0', '0', '0', '0', '0', '0', 0, 0, 1, '2024-09-08 13:59:56', 1, '2024-11-08 10:17:45'),
(54, '24/00054', 'ggcc-119', 'GGCC 119', 'Guddu Rajbhar', 'ggcc', 'ILLIRATE', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '1', 'Indore', ' gaddurajbhr942@gmail.com', '9167704907', '6', '1983-01-01', '2020-03-02', 'active', '', '', '', '', '', '14', 'DARIYAPUR', 'BALLIA', 'BALLIA', '277502', '', '', '', '', '', '', '', '', '16000', '8000', '200', 'no', 'Not Applicable', 'yes', '101572420729', '15000', ' CYTPR1937E', '3449096944174', 'STATE BANK OF INDIA', 'CHITBARAGAON', '32356886132', ' SBIN0002537', 0, 0, 1, '2024-09-08 14:11:13', 1, '2024-11-08 10:09:35'),
(55, '24/00055', 'ggcc-007', 'GGCC 007', 'Devasahaya Ravi', 'ggcc', '', 'employee', '202cb962ac59075b964b07152d234b70', 'chennai', '6', 'Tamil Nadu', 'dsravigeorge@gmail.com', '9930555886', '1', '1980-07-19', '2005-11-01', 'active', '', '', '', '', '', 'ROOM NO 15, C WING HANUMAN NAGAR,', 'KALYAN EAST , KATEMANIVALLI', 'KALYAN', 'THANE', '421306', '', '', '', '', '', '', '', '', '35000', '25000', '200', 'no', 'Not Applicable', 'yes', '100133880659', '35000', 'AODPA8868D', '670921373473', 'TAMILNAD MERCANTILE BANK LTD', 'CHEMBUR', '218109930555886', 'TMBL0000218', 0, 0, 1, '2024-09-12 11:40:41', 1, '2024-11-08 10:04:13'),
(56, '24/00056', 'ggcc-134', 'GGCC 134', 'MD Irfan', 'ggcc', '', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '1', 'Indore', '', '7654104841', '6', '', '2022-06-01', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '13000', '2000', '200', 'yes', '3123896384', 'yes', '101563463746', '13000', 'XYZ', '123', 'STATE BANK OF INDIA', 'AUNSI', '40253671697', 'SBIN0017454', 0, 0, 1, '2024-10-15 09:24:24', 1, '2024-12-02 08:12:27'),
(57, '24/00057', 'ggcc-087', 'GGCC 087', 'Uday Sakharam Mungekar', 'ggcc', '', 'employee', '202cb962ac59075b964b07152d234b70', 'mumbai', '13', 'Mumbai', '', '9076340727', '6', '', '2019-02-01', 'inactive', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '15500', '1500', '200', 'yes', '3111404241', 'yes', '100867251594', '15000', 'XYZ', '123', 'TAMILNAD MERCANTILE BANK LTD', 'VASHI', '117100050302705', 'TMBL0000117', 0, 0, 1, '2024-10-15 09:28:17', 1, '2024-12-02 08:11:38'),
(58, '24/00058', 'beh-001', 'BEH 001', 'Kishor Rajaram Parte', 'bright', '', 'employee', '202cb962ac59075b964b07152d234b70', 'mumbai', '13', 'Mumbai', 'krparte11@gmail.com', '9820277166', '4', '1977-11-21', '2019-04-01', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '25000', '15000', '200', 'no', 'Not Applicable', 'yes', '101447716731', '25000', 'AOAPP2731D', '721340294790', 'TAMILNAD MERCANTILE BANK LTD', 'CHEMBUR', '218100050300353', 'TMBL0000218', 0, 0, 1, '2024-10-15 09:46:34', 1, '2024-12-05 08:13:08'),
(59, '24/00059', 'beh-045', 'BEH 045', 'Md Amanullah', 'bright', '', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '5', 'Mumbai', '', '8928291951', '6', '', '2023-04-01', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '15000', '6000', '200', 'yes', '1817466231', 'yes', '101716821296', '15000', 'XYZ', '123', 'CENTRAL BANK OF INDIA', ' KOTWA BAZAR', '3834574103', 'CBIN0282514', 0, 0, 1, '2024-10-15 09:50:43', 1, '2024-12-04 07:46:42'),
(60, '24/00060', 'beh-00058', 'BEH 058', 'AJAY SITARAM KHEDEKAR', 'bright', 'B. COM', 'employee', '202cb962ac59075b964b07152d234b70', 'mumbai', '13', 'Mumbai', 'ajkhedekar84@gmail.com', '9167398109', '4', '1984-04-19', '2024-11-01', 'active', '', '', '', '', '', 'ROOM NO. 3, PAGE CHAWL, GAONDEVI NAGAR, KOKANI PADA', 'S N DUBE ROAD, ', 'DAHISAR (EAST)', 'MUMBAI', '400068', '', '', '', '', '', '', '', '', '20000', '9000', '200', 'no', 'Not Applicable', 'yes', '102124556252', '15000', 'BMGPK1254H', '651268929989', 'BANK OF MAHARASHTRA', 'DAHISAR (EAST)', '60209425216', 'MAHB0000964', 0, 0, 1, '2024-12-01 23:49:59', 1, '2024-12-02 05:21:46');

-- --------------------------------------------------------

--
-- Table structure for table `employee_expenses`
--

CREATE TABLE `employee_expenses` (
  `id` int NOT NULL,
  `month` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `year` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `employee_id` int NOT NULL,
  `amount` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `remarks` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `delete_status` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_expenses`
--

INSERT INTO `employee_expenses` (`id`, `month`, `year`, `date`, `employee_id`, `amount`, `remarks`, `status`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'december', '2024', '2024-12-14', 22, '1000', 'EXP', 'disbursed', 1, 1, '2024-12-28 11:43:10', 0, NULL),
(2, 'december', '2024', '2024-12-14', 22, '100', 'ABC', 'expenses', 1, 1, '2024-12-28 11:46:23', 0, NULL),
(3, 'december', '2024', '2024-12-15', 22, '75', 'ABC', 'expenses', 1, 1, '2024-12-28 11:46:15', 0, NULL),
(4, 'december', '2024', '2024-12-23', 22, '2000', 'ABC', 'disbursed', 1, 1, '2024-12-28 11:43:05', 0, NULL),
(5, 'december', '2024', '2024-12-22', 5, '0', '', 'expenses', 1, 1, '2024-12-25 19:12:00', 0, NULL),
(6, 'december', '2024', '2024-12-23', 25, '10000', '', 'disbursed', 0, 1, '2024-12-26 03:14:08', 0, NULL),
(7, 'december', '2024', '2024-12-26', 37, '1000', '', 'expenses', 0, 1, '2024-12-26 06:11:38', 0, NULL),
(8, 'december', '2024', '2024-12-26', 20, '5000', 'CASH', 'expenses', 0, 1, '2024-12-26 06:12:15', 0, NULL),
(9, 'december', '2024', '2024-12-26', 20, '10000', '', 'disbursed', 0, 1, '2024-12-26 06:12:55', 0, NULL),
(10, 'january', '2024', '2025-02-01', 20, '5000', 'FEB', 'disbursed', 0, 1, '2024-12-26 06:13:58', 0, NULL),
(11, 'january', '2024', '2025-01-16', 20, '2250', '', 'expenses', 0, 1, '2024-12-26 11:48:25', 1, '2024-12-26 11:48:25'),
(12, 'february', '2024', '2025-02-04', 20, '7000', 'CASH', 'disbursed', 0, 1, '2024-12-26 06:15:47', 0, NULL),
(13, 'february', '2024', '2025-02-12', 20, '1000', '', 'disbursed', 0, 1, '2024-12-26 06:19:35', 0, NULL),
(14, 'february', '2024', '2025-02-19', 20, '25000', '', 'disbursed', 0, 1, '2024-12-26 06:20:14', 0, NULL),
(15, 'january', '2024', '2025-01-08', 20, '5000', '', 'expenses', 0, 1, '2024-12-26 06:20:47', 0, NULL),
(16, 'february', '2024', '2025-01-16', 20, '1000', 'DISCOUNT', 'expenses', 0, 1, '2024-12-26 06:40:42', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_leave`
--

CREATE TABLE `employee_leave` (
  `id` int NOT NULL,
  `employee_id` int NOT NULL,
  `leave_date` date NOT NULL,
  `return_joining_date` date NOT NULL,
  `reason` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `replacement_name` int NOT NULL,
  `leave_count` int DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `status` enum('not_join','joined') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'not_join',
  `delete_status` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_leave`
--

INSERT INTO `employee_leave` (`id`, `employee_id`, `leave_date`, `return_joining_date`, `reason`, `replacement_name`, `leave_count`, `join_date`, `status`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 3, '2024-12-09', '2024-12-16', 'PERSONAL', 3, 0, '2024-12-16', 'joined', 0, 1, '2024-12-23 19:34:07', 1, '2024-12-23 19:34:07'),
(2, 8, '2024-12-01', '2024-12-10', 'MARRAGE', 0, 0, '2024-12-10', 'joined', 0, 1, '2024-12-23 13:54:41', 1, '2024-12-10 15:40:05'),
(3, 38, '2024-12-01', '2024-12-15', 'YEARLY', 0, NULL, '0000-00-00', 'not_join', 0, 1, '2024-12-23 13:54:43', 0, NULL),
(4, 35, '2024-12-01', '2024-12-21', 'YEARLY', 0, 0, '2024-12-23', 'joined', 0, 1, '2024-12-24 11:04:00', 1, '2024-12-24 11:04:00'),
(5, 33, '2024-12-01', '2024-12-15', 'PERSONAL', 0, 0, '2024-12-15', 'joined', 0, 1, '2024-12-23 19:48:47', 1, '2024-12-23 19:48:47'),
(6, 36, '2024-12-01', '2024-12-30', 'MARRAGE', 0, 0, '0000-00-00', 'joined', 0, 1, '2024-12-24 11:02:31', 1, '2024-12-24 11:02:31'),
(7, 28, '2024-12-01', '2024-12-25', 'PERSONAL', 0, NULL, '0000-00-00', 'not_join', 0, 1, '2024-12-23 13:54:51', 0, NULL),
(8, 42, '2024-12-07', '2024-12-25', 'EMERGENCY DEATH', 32, NULL, '0000-00-00', 'not_join', 0, 1, '2024-12-23 13:54:53', 0, NULL),
(9, 14, '2024-12-30', '2025-01-07', 'PERSONAL', 14, NULL, NULL, 'not_join', 1, 1, '2024-12-28 11:45:11', 0, NULL),
(10, 14, '2024-12-30', '2025-01-07', 'PERSONAL', 14, NULL, NULL, 'not_join', 0, 1, '2024-12-28 06:19:10', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_payslip`
--

CREATE TABLE `employee_payslip` (
  `id` int NOT NULL,
  `sno` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `employee_id` int NOT NULL,
  `employee_code` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `joining_date` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `employee_name` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `designation` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `branch_location` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `esi_number` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `pf_number` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `company_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `bank_name` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `account_number` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `ifsc_code` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `pan_number` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `year` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `month` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `day_count` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `present_count` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `absent_count` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `basic_pay` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `month_basic_pay` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `allowance_amount` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `month_allowance_amount` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `ot_count` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `ot_amount` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `mobile_recharge` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `travelling_amount` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `incentive_amount` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `food_expenses` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `pf_status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pf_amount` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `month_pf_amount` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `esi_status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `esi_amount` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `advance_cash` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `professional_tax` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `total_earning` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deduction_amount` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `salary_amount` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `salary_in_word` text COLLATE utf8mb4_general_ci NOT NULL,
  `delete_status` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_payslip`
--

INSERT INTO `employee_payslip` (`id`, `sno`, `employee_id`, `employee_code`, `joining_date`, `employee_name`, `designation`, `branch_location`, `esi_number`, `pf_number`, `company_name`, `bank_name`, `account_number`, `ifsc_code`, `pan_number`, `year`, `month`, `day_count`, `present_count`, `absent_count`, `basic_pay`, `month_basic_pay`, `allowance_amount`, `month_allowance_amount`, `ot_count`, `ot_amount`, `mobile_recharge`, `travelling_amount`, `incentive_amount`, `food_expenses`, `pf_status`, `pf_amount`, `month_pf_amount`, `esi_status`, `esi_amount`, `advance_cash`, `professional_tax`, `total_earning`, `deduction_amount`, `salary_amount`, `salary_in_word`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(4, '24/00004', 22, 'GGCC050', '2011-11-01', 'A. Ellavarasan', 'Driver', 'Tamil Nadu', 'Not Applicable', '100145028944', 'ggcc', 'Tamilnad Mercantile Bank Ltdabc', '312100050301856', ' TMBL0000312 ', ' ACPPE2451A ', '2024', 'september', '30', '30', '0', '23500', '23500', '10500', '10500', '2.5', '3917', '200', '0', '0', '', 'yes', '15000', '1800', 'no', '0', '0', '0', '38117', '1800', '36317', 'thirty six thousand three hundred seventeen ', 0, 1, '2024-10-16 02:31:47', 0, NULL),
(5, '24/00005', 23, 'GGCC082', '2015-09-01', 'A.Arulmani', 'Asst Technician', 'Tamil Nadu', 'Not Applicable', '100604454985', 'ggcc', 'Tamilnad Mercantile Bank', '210100050305252', 'TMBL0000210', ' BZMPA8855M ', '2024', 'september', '30', '29', '1', '17000', '16433', '8000', '7733', '0.5', '567', '200', '0', '0', '', 'yes', '15000', '1740', 'no', '0', '0', '0', '24933', '1740', '23193', 'twenty three thousand one hundred ninety three ', 0, 1, '2024-10-16 02:31:47', 0, NULL),
(6, '24/00006', 4, 'GGCC132', '2022-06-07', 'Aaditya Kumar ARK', 'Driver', 'Madhya Pradesh', 'Not Applicable', '101322238657', 'ggcc', 'State Bank Of India', '20411611573', ' SBIN0012601 ', ' CHEPA9887L ', '2024', 'september', '30', '30', '0', '17000', '17000', '8000', '8000', '2', '2267', '200', '0', '0', '', 'yes', '15000', '1800', 'no', '0', '0', '0', '27467', '1800', '25667', 'twenty five thousand six hundred sixty seven ', 0, 1, '2024-10-16 02:31:47', 0, NULL),
(7, '24/00007', 5, 'GGCC086', '2023-01-01', 'Ajay Yadav', 'Asst Technician', 'Madhya Pradesh', 'Not Applicable', '100650291060', 'ggcc', 'Tamilnad Mercantile Bank Ltd', '444149589239680', ' TMBL0000444 ', ' ANPPY8836N', '2024', 'september', '30', '28', '2', '17000', '15867', '8000', '7467', '2', '2267', '200', '0', '1400', '', 'yes', '15000', '1680', 'no', '0', '0', '0', '27201', '1680', '25521', 'twenty five thousand five hundred twenty one ', 0, 1, '2024-10-16 02:31:47', 0, NULL),
(8, '24/00008', 48, 'GGCC133', '2022-06-01', 'Awadhesh Rajbhar', 'Asst Technician', 'Madhya Pradesh', 'Not Applicable', '101190146261', 'ggcc', 'STATE BANK OF INDIA', '32377833957', ' SBIN0002537 ', ' DKXPR1457N ', '2024', 'september', '30', '30', '0', '19000', '19000', '8000', '8000', '0.5', '633', '200', '0', '0', '', 'yes', '15000', '1800', 'no', '0', '0', '0', '27833', '1800', '26033', 'twenty six thousand thirty three ', 0, 1, '2024-10-16 02:31:47', 0, NULL),
(9, '24/00009', 11, 'GGCC034', '2008-12-01', 'BAPU PARSHURAM SHIRODKAR', 'Technician', 'Madhya Pradesh', 'Not Applicable', '100107951357', 'ggcc', 'Tamilnad Mercantile Bank Ltd', '218100050300351', ' TMBL0000218 ', ' BMYPS78448 ', '2024', 'september', '30', '23', '7', '25000', '19167', '8000', '6133', '0.5', '833', '200', '0', '0', '', 'yes', '15000', '1380', 'no', '0', '0', '0', '26333', '1380', '24953', 'twenty four thousand nine hundred fifty three ', 0, 1, '2024-10-16 02:31:47', 0, NULL),
(10, '24/00010', 55, 'GGCC07', '2005-11-01', 'DEVASAHAYA RAVI', 'Manager', 'Tamil Nadu', 'Not Applicable', '100133880659', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '218109930555886', 'TMBL0000218', 'AODPA8868D', '2024', 'september', '30', '30', '0', '35000', '35000', '25000', '25000', '0', '0', '200', '0', '0', '', 'yes', '35000', '4200', 'no', '0', '0', '0', '60200', '4200', '56000', 'fifty six thousand', 0, 1, '2024-10-16 02:31:47', 0, NULL),
(11, '24/00011', 20, 'GGCC068', '2013-01-01', 'G Joseph Margasis', 'Technician', 'Tamil Nadu', 'Not Applicable', '100147893430', 'ggcc', 'Tamilnad Mercantile Bank Ltd', '058109790033091', ' TMBL0000058 ', ' BAEPJ5184P ', '2024', 'september', '30', '29', '1', '23500', '22717', '10500', '10150', '0', '0', '200', '0', '0', '', 'yes', '15000', '1740', 'no', '0', '0', '0', '33067', '1740', '31327', 'thirty one thousand three hundred twenty seven ', 0, 1, '2024-10-16 02:31:47', 0, NULL),
(12, '24/00012', 54, 'GGCC119', '2020-03-02', 'Guddu Rajbhar', 'Asst Technician', 'Madhya Pradesh', 'Not Applicable', '101572420729', 'ggcc', 'STATE BANK OF INDIA', '32356886132', ' SBIN0002537 ', ' CYTPR1937E ', '2024', 'september', '30', '29', '1', '16000', '15467', '8000', '7733', '1', '1067', '200', '0', '0', '', 'yes', '15000', '1740', 'no', '0', '0', '0', '24467', '1740', '22727', 'twenty two thousand seven hundred twenty seven ', 0, 1, '2024-10-16 02:31:47', 0, NULL),
(13, '24/00013', 24, 'GGCC067', '2013-01-01', 'J.Charles', 'Asst Technician', 'Tamil Nadu', 'Not Applicable', '100169001751', 'ggcc', 'Tamilnad Mercantile Bank Ltd', '210100050304937', ' TMBL0000490 ', ' BGZPC3722M ', '2024', 'september', '30', '29', '1', '23000', '22233', '8000', '7733', '0.5', '767', '200', '0', '0', '', 'yes', '15000', '1740', 'no', '0', '0', '0', '30933', '1740', '29193', 'twenty nine thousand one hundred ninety three ', 0, 1, '2024-10-16 02:31:47', 0, NULL),
(14, '24/00014', 21, 'GGCC116', '2019-12-01', 'Karthik K', 'Asst Technician', 'Tamil Nadu', 'Not Applicable', '100190477301', 'ggcc', 'State Bank Of India', '33798843970', ' SBIN0006239 ', ' DPQPK1078Q ', '2024', 'september', '30', '20', '10', '20000', '13333', '9000', '6000', '0.5', '667', '200', '0', '0', '', 'yes', '15000', '1200', 'no', '0', '0', '0', '20200', '1200', '19000', 'nineteen thousand', 0, 1, '2024-10-16 02:31:47', 0, NULL),
(21, '24/00021', 3, 'GGCC102', '2019-02-01', 'Nadar Bhuvana Shekar', 'Accountant', 'Maharashtra', 'Not Applicable', '101420903254', 'ggcc', 'TMBL', '218100720600445', 'TMBL0000218', 'FGMPS4413N', '2024', 'september', '30', '25', '5', '16000', '13333', '6000', '5000', '0', '0', '200', '0', '3000', '', 'yes', '16000', '1600', 'no', '0', '0', '0', '21533', '1600', '19933', 'nineteen thousand nine hundred thirty three ', 0, 1, '2024-10-16 02:40:48', 0, NULL),
(22, '24/00022', 50, 'GGCC043', '2010-11-01', 'NILESH G SAVRATKAR', 'Technician', 'Maharashtra', 'Not Applicable', '100255467057', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '2181007206600099', 'TMBL0000218', 'AYBPS1577P', '2024', 'september', '30', '18', '12', '21000', '12600', '8000', '4800', '0.5', '700', '200', '0', '0', '', 'yes', '15000', '1080', 'no', '0', '0', '200', '18300', '1280', '17020', 'seventeen thousand twenty ', 0, 1, '2024-10-16 02:40:48', 0, NULL),
(23, '24/00023', 17, 'GGCC099', '2018-04-01', 'P Muthu Kumar', 'Driver', 'Tamil Nadu', 'Not Applicable', '101286700652', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '248100050305253', ' TMBL0000248 ', ' CIAPM8773J ', '2024', 'september', '30', '30', '0', '22000', '22000', '8000', '8000', '1', '1467', '200', '0', '0', '', 'yes', '15000', '1800', 'no', '0', '0', '0', '31667', '1800', '29867', 'twenty nine thousand eight hundred sixty seven ', 0, 1, '2024-10-16 02:40:48', 0, NULL),
(24, '24/00024', 51, 'GGCC091', '2016-09-01', 'P. ARUMUGAKANI RAJA', 'Asst Technician', 'Tamil Nadu', 'Not Applicable', '100923175836', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '409100050302857', ' TMBL0000409 ', ' CHUPA7102E ', '2024', 'september', '30', '28', '2', '20000', '18667', '8000', '7467', '0.5', '667', '200', '0', '0', '', 'yes', '15000', '1680', 'no', '0', '0', '0', '27001', '1680', '25321', 'twenty five thousand three hundred twenty one ', 0, 1, '2024-10-16 02:40:48', 0, NULL),
(25, '24/00025', 6, 'GGCC084', '2015-12-01', 'P.Allwin', 'Supervisor', 'Madhya Pradesh', 'Not Applicable', '100649963586', 'ggcc', 'Tamilnad Mercantile Bank Ltd', '218100720600073', ' TMBL0000218 ', ' ABMPA0285G ', '2024', 'september', '30', '29', '1', '25000', '24167', '20000', '19333', '0', '0', '200', '0', '5000', '', 'yes', '25000', '2900', 'no', '0', '0', '0', '48700', '2900', '45800', 'forty five thousand eight hundred ', 0, 1, '2024-10-16 02:40:48', 0, NULL),
(26, '24/00026', 7, 'GGCC094', '2017-07-01', 'Prabhudayal Patel', 'Asst Technician', 'Madhya Pradesh', 'Not Applicable', '101132615953', 'ggcc', 'Tamilnad Mercantile Bank Ltd', '444100050300412', ' TMBL0000444 ', ' CMVPP2248E ', '2024', 'september', '30', '30', '0', '20000', '20000', '8000', '8000', '4', '5333', '200', '0', '0', '', 'yes', '15000', '1800', 'no', '0', '0', '0', '33533', '1800', '31733', 'thirty one thousand seven hundred thirty three ', 0, 1, '2024-10-16 02:40:48', 0, NULL),
(27, '24/00027', 10, 'GGCC002', '2005-11-01', 'Praful Thandel', 'Technician', 'Madhya Pradesh', 'Not Applicable', '100275120870', 'ggcc', 'Tamilnad Mercantile Bank Ltd', '218100050300730', ' TMBL0000218 ', ' AHRPT7799K ', '2024', 'september', '30', '24', '6', '20000', '16000', '8000', '6400', '0', '0', '200', '0', '1400', '', 'yes', '15000', '1440', 'no', '0', '0', '0', '24000', '1440', '22560', 'twenty two thousand five hundred sixty ', 0, 1, '2024-10-16 02:40:48', 0, NULL),
(28, '24/00028', 16, 'GGCC046', '2011-01-01', 'PRAMOD DHAKU MUNGEKAR', 'Asst Technician', 'Maharashtra', 'Not Applicable', '100276584252', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '218100050301639', 'TMBL0000218', 'AXPPM5363C', '2024', 'september', '30', '28', '2', '19000', '17733', '8000', '7467', '2', '2533', '200', '0', '0', '', 'yes', '15000', '1680', 'no', '0', '200', '0', '27933', '1880', '26053', 'twenty six thousand fifty three ', 0, 1, '2024-10-16 02:40:48', 0, NULL),
(29, '24/00029', 13, 'GGCC093', '2023-01-01', 'Raghunath S Parida', 'Asst Technician', 'Madhya Pradesh', 'Not Applicable', '100290525018', 'ggcc', 'Tamilnad Mercantile Bank Ltd', '218100050300342', 'TMBL0000218', 'abc', '2024', 'september', '30', '29', '1', '23000', '22233', '10000', '9667', '1.5', '2300', '200', '0', '0', '', 'yes', '15000', '1740', 'no', '0', '0', '0', '34400', '1740', '32660', 'thirty two thousand six hundred sixty ', 0, 1, '2024-10-16 02:40:48', 0, NULL),
(30, '24/00030', 49, 'BEH 086', '2023-07-14', 'Ram Khelavan Verma ', 'Asst Technician', 'Madhya Pradesh', 'Not Applicable', '9580616025', 'ggcc', 'STATE BANK OF INDIA', '37140174188', ' SBIN0011331 ', ' CYKPK4094E ', '2024', 'september', '30', '8', '22', '15000', '4000', '8000', '2133', '1', '1000', '200', '0', '0', '', 'yes', '15000', '480', 'no', '0', '0', '0', '7333', '480', '6853', 'six thousand eight hundred fifty three ', 0, 1, '2024-10-16 02:40:48', 0, NULL),
(31, '24/00031', 9, 'GGCC135', '2023-01-01', 'Ramashankar Prasad', 'Asst Technician', 'Madhya Pradesh', 'Not Applicable', '101914491001', 'ggcc', 'Punjab National Bank', '2400000100213458', 'abc', 'abc', '2024', 'september', '30', '30', '0', '25000', '25000', '8000', '8000', '0', '0', '200', '0', '0', '', 'yes', '15000', '1800', 'no', '0', '0', '0', '33200', '1800', '31400', 'thirty one thousand four hundred ', 0, 1, '2024-10-16 02:40:48', 0, NULL),
(32, '24/00032', 14, 'GGCC037', '2009-05-01', 'Ranjeet Singh Nanade', 'Technician', 'Maharashtra', 'Not Applicable', '100307924904', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '218100050300394', 'TMBL0000218', 'BYDPN5255N', '2024', 'september', '30', '26', '4', '21000', '18200', '8000', '6933', '0.5', '700', '200', '0', '0', '', 'yes', '15000', '1560', 'no', '0', '200', '0', '26033', '1760', '24273', 'twenty four thousand two hundred seventy three ', 0, 1, '2024-10-16 02:40:48', 0, NULL),
(33, '24/00033', 52, 'GGCC104', '2019-04-01', 'Santosh Kumar', 'Driver', 'Madhya Pradesh', 'Not Applicable', '101446403273', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '218100050302610', 'TMBL0000218', '123', '2024', 'september', '30', '30', '0', '19000', '19000', '8000', '8000', '0.5', '633', '200', '0', '0', '', 'yes', '15000', '1800', 'no', '0', '0', '0', '27833', '1800', '26033', 'twenty six thousand thirty three ', 0, 1, '2024-10-16 02:40:48', 0, NULL),
(34, '24/00034', 41, 'GGCC114', '2019-12-01', 'TABREJ ALAM', 'Asst Technician', 'Maharashtra', 'Not Applicable', '101547056712', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '218149987552984', 'TMBL0000218', 'CUCPA1348D', '2024', 'september', '30', '28', '2', '15000', '14000', '2000', '1867', '2.5', '2500', '200', '0', '0', '', 'yes', '15000', '1680', 'no', '0', '200', '0', '18567', '1880', '16687', 'sixteen thousand six hundred eighty seven ', 0, 1, '2024-10-16 02:40:48', 0, NULL),
(36, '24/00036', 12, 'GGCC040', '2010-05-24', 'VAIBHAV VINAYAK NADKARNI', 'Asst Technician', 'Madhya Pradesh', 'Not Applicable', '100399345214', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '218100720600103', 'TMBL0000218', 'AJEPN9298A', '2024', 'september', '30', '26', '4', '23000', '19933', '8000', '6933', '2.5', '3833', '200', '0', '0', '', 'yes', '15000', '1560', 'no', '0', '0', '0', '30899', '1560', '29339', 'twenty nine thousand three hundred thirty nine ', 0, 1, '2024-10-16 02:40:48', 0, NULL),
(40, '24/00040', 43, 'BEH 041', '2022-11-01', 'Amaladas C', 'Driver', 'Tamil Nadu', 'Not Applicable', '101577917503', 'bright', 'CANARA BANK', '1671101020607', 'CNRB0001671', ' CTQPC9947K ', '2024', 'september', '30', '26', '4', '18000', '15600', '8000', '6933', '0', '0', '200', '0', '0', '', 'yes', '15000', '1560', 'no', '0', '0', '0', '22733', '1560', '21173', 'twenty one thousand one hundred seventy three ', 0, 1, '2024-10-16 02:52:41', 0, NULL),
(42, '24/00042', 28, 'BEH 031', '2022-01-01', 'Arvind', 'Asst Technician', 'Madhya Pradesh', 'Not Applicable', '101394072650', 'bright', 'State Bank Of India', '36132203039', 'SBIN0001158', ' CNZPA5047F ', '2024', 'september', '30', '30', '0', '14000', '14000', '8000', '8000', '1', '933', '200', '0', '1400', '', 'yes', '14000', '1680', 'no', '0', '0', '0', '24533', '1680', '22853', 'twenty two thousand eight hundred fifty three ', 0, 1, '2024-10-16 02:52:41', 0, NULL),
(43, '24/00043', 37, 'BEH 009', '2019-04-01', 'C Anbujothi', 'Technician', 'Tamil Nadu', 'Not Applicable', '101447717410', 'bright', 'INDIAN OVERSEAS BANK ', '109101000009379', 'IOBA 0001094', ' CYHPA8422M ', '2024', 'september', '30', '30', '0', '18000', '18000', '8000', '8000', '0', '0', '200', '0', '0', '', 'yes', '15000', '1800', 'no', '0', '0', '0', '26200', '1800', '24400', 'twenty four thousand four hundred ', 0, 1, '2024-10-16 02:52:41', 0, NULL),
(44, '24/00044', 25, 'BEH 03', '2019-04-01', 'CHAND BASHA BASHEER GULAM', 'Technician', 'Maharashtra', 'Not Applicable', '100463895891', 'bright', 'TAMILNAD MERCANTILE BANK LTD', '218100720600074', 'TMBL0000218', 'ABC', '2024', 'september', '30', '29', '1', '20000', '19333', '14000', '13533', '0', '0', '200', '0', '5000', '', 'yes', '20000', '2320', 'no', '0', '0', '200', '38066', '2520', '35546', 'thirty five thousand five hundred forty six ', 0, 1, '2024-10-16 02:52:41', 0, NULL),
(45, '24/00045', 33, 'BEH 043', '2022-12-01', 'Dheraj', 'Asst Technician', 'Madhya Pradesh', '1817325657', '101902897640', 'bright', 'UNION BANK OF INDIA ', '712902120002505', 'UBFN0571296', ' HYYPD1530D ', '2024', 'september', '30', '30', '0', '15000', '15000', '5000', '5000', '1', '1000', '200', '0', '1400', '', 'yes', '15000', '1800', 'yes', 'NaN', '0', '0', '22600', 'NaN', 'NaN', '', 0, 1, '2024-10-16 02:52:41', 0, NULL),
(46, '24/00046', 39, 'BEH 024', '2019-08-01', 'Elangovan A', 'Asst Technician', 'Tamil Nadu', 'Not Applicable', '101496274540', 'bright', 'INDIAN BANK', '6119254948', 'IDIB000K030', ' AEHPE7314L ', '2024', 'september', '30', '30', '0', '15000', '15000', '8000', '8000', '0', '0', '200', '0', '0', '', 'yes', '15000', '1800', 'no', '0', '0', '0', '23200', '1800', '21400', 'twenty one thousand four hundred ', 0, 1, '2024-10-16 02:52:41', 0, NULL),
(48, '24/00048', 32, 'BEH 039', '2022-11-01', 'Ghanshyam', 'Asst Technician', 'Madhya Pradesh', 'Not Applicable', '101636545769', 'bright', ' BHARAT BANK ', '1410100127476', 'BCBM000015', ' BOWPS6154J ', '2024', 'september', '30', '30', '0', '21000', '21000', '8000', '8000', '0.5', '700', '200', '0', '0', '', 'yes', '15000', '1800', 'no', '0', '0', '0', '29900', '1800', '28100', 'twenty eight thousand one hundred ', 0, 1, '2024-10-16 02:52:41', 0, NULL),
(49, '24/00049', 38, 'BEH 012', '2019-04-01', 'Jwala Singh', 'Asst Technician', 'Tamil Nadu', 'Not Applicable', '100178879892', 'bright', 'TAMILNAD MERCANTILE BANK LTD', '210100050304981', 'TMBL0000210', ' EUAPS4567Q ', '2024', 'september', '30', '30', '0', '17000', '17000', '8000', '8000', '2', '2267', '200', '0', '0', '', 'yes', '15000', '1800', 'no', '0', '0', '0', '27467', '1800', '25667', 'twenty five thousand six hundred sixty seven ', 0, 1, '2024-10-16 02:52:41', 0, NULL),
(50, '24/00050', 58, 'BEH 001', '2019-04-01', 'KISHOR RAJARAM PARTE', 'Accountant', 'Maharashtra', 'Not Applicable', '101447716731', 'bright', 'TAMILNAD MERCANTILE BANK LTD', '218100050300353', 'TMBL0000218', 'XYZ', '2024', 'september', '30', '29', '1', '25000', '24167', '15000', '14500', '0', '0', '200', '0', '0', '', 'yes', '25000', '2900', 'no', '0', '200', '0', '38867', '3100', '35767', 'thirty five thousand seven hundred sixty seven ', 0, 1, '2024-10-16 02:52:41', 0, NULL),
(51, '24/00051', 45, 'BEH 052', '2023-10-01', 'Mathura Nayagam Athisayam', 'Asst Technician', 'Tamil Nadu', 'Not Applicable', '100712674063', 'bright', 'ICICI ', '003501571913', 'ICIC0006135', ' ARVPA8765A ', '2024', 'september', '30', '15', '15', '16000', '8000', '8000', '4000', '2.5', '2667', '200', '0', '0', '', 'yes', '15000', '900', 'no', '0', '0', '0', '14867', '900', '13967', 'thirteen thousand nine hundred sixty seven ', 0, 1, '2024-10-16 02:52:41', 0, NULL),
(53, '24/00053', 35, 'BEH 007', '2019-04-01', 'Munna Kumar Singh', 'Driver', 'Maharashtra', 'Not Applicable', '101447717389', 'bright', 'TAMILNAD MERCANTILE BANK LTD', '218100720600101', 'TMBL0000218', 'DDPPS90975', '2024', 'september', '30', '30', '0', '19000', '19000', '8000', '8000', '2', '2533', '200', '0', '0', '', 'yes', '15000', '1800', 'no', '0', '0', '0', '29733', '1800', '27933', 'twenty seven thousand nine hundred thirty three ', 0, 1, '2024-10-16 02:52:41', 0, NULL),
(54, '24/00054', 29, 'BEH 033', '2022-01-01', 'Nitesh Gurjar', 'Asst Technician', 'Madhya Pradesh', 'Not Applicable', '101777016329', 'bright', 'Canara Bank', '4117101000884', 'CNRB0004117', ' DGQPG1941D ', '2024', 'september', '30', '25', '5', '16000', '13333', '8000', '6667', '2', '2133', '200', '0', '1400', '', 'yes', '15000', '1500', 'no', '0', '0', '0', '23733', '1500', '22233', 'twenty two thousand two hundred thirty three ', 0, 1, '2024-10-16 03:44:21', 0, NULL),
(55, '24/00055', 30, 'BEH 034', '2022-01-01', 'Omprakash', 'Driver', 'Madhya Pradesh', 'Not Applicable', '101777016291', 'bright', 'TAMILNAD MERCANTILE BANK LTD', '444100050301038', 'TMBL0000444', ' ABYPO1785H ', '2024', 'september', '30', '29', '1', '16000', '15467', '8000', '7733', '2.5', '2667', '200', '0', '0', '', 'yes', '15000', '1740', 'no', '0', '0', '0', '26067', '1740', '24327', 'twenty four thousand three hundred twenty seven ', 0, 1, '2024-10-16 03:44:21', 0, NULL),
(56, '24/00056', 36, 'BEH 014', '2019-04-01', 'Prins Kumar', 'Asst Technician', 'Madhya Pradesh', 'Not Applicable', '101447716720', 'bright', 'BANK OF BARODA ', '8820100034965', 'BARB0AMETHI', ' EXVPK4254G ', '2024', 'september', '30', '29', '1', '22000', '21267', '8000', '7733', '1.5', '2200', '200', '0', '1400', '', 'yes', '15000', '1740', 'no', '0', '0', '0', '32800', '1740', '31060', 'thirty one thousand sixty ', 0, 1, '2024-10-16 03:44:21', 0, NULL),
(57, '24/00057', 53, 'BEH 057', '2024-07-01', 'PRITAM CHADAR', 'Asst Technician', 'Madhya Pradesh', 'Not Applicable', '102103548750', 'bright', '0', '0', '0', '0', '2024', 'september', '30', '29', '1', '16000', '15467', '8000', '7733', '1.5', '1600', '200', '0', '0', '', 'yes', '15000', '1740', 'no', '0', '0', '0', '25000', '1740', '23260', 'twenty three thousand two hundred sixty ', 0, 1, '2024-10-16 03:44:21', 0, NULL),
(58, '24/00058', 31, 'BEH 035', '2022-01-01', 'Pushpendra Umath', 'Driver', 'Madhya Pradesh', 'Not Applicable', '101431668668', 'bright', 'Punjab National Bank', '4622000400005702', 'PUNB0462200', ' AGQPU3058C ', '2024', 'september', '30', '30', '0', '17000', '17000', '8000', '8000', '1', '1133', '200', '0', '1400', '', 'yes', '15000', '1800', 'no', '0', '0', '0', '27733', '1800', '25933', 'twenty five thousand nine hundred thirty three ', 0, 1, '2024-10-16 03:44:21', 0, NULL),
(59, '24/00059', 46, 'BEH 054', '2024-01-01', 'Raj Kumar ', 'Asst Technician', 'Tamil Nadu', 'Not Applicable', '101547069375', 'bright', 'INDIAN BANK ', '6372735619', 'IDIB000L001', ' EPYPR4190M ', '2024', 'september', '30', '26', '4', '14000', '12133', '8000', '6933', '0', '0', '200', '0', '0', '', 'yes', '14000', '1456', 'no', '0', '0', '0', '19266', '1456', '17810', 'seventeen thousand eight hundred ten ', 0, 1, '2024-10-16 03:44:21', 0, NULL),
(61, '24/00061', 42, 'BEH', '2024-07-01', 'SADHITYA KUMAR ARK', 'Asst Technician', 'Maharashtra', '123', '123', 'bright', 'STATE BANK OF INDIA', '43097252344', 'SBIN0012601', 'FKPPA1774P', '2024', 'september', '30', '0', '30', '15000', '0', '5000', '0', '0', '0', '200', '0', '0', '', 'yes', '15000', '0', 'yes', 'NaN', '0', '0', '200', 'NaN', 'NaN', '', 0, 1, '2024-10-16 03:44:21', 0, NULL),
(63, '24/00063', 56, 'GGCC 134', '2022-06-01', 'MD IRFAN', 'Asst Technician', 'Madhya Pradesh', '3123896384', '101563463746', 'ggcc', 'STATE BANK OF INDIA', '40253671697', 'SBIN0017454', 'XYZ', '2024', 'september', '30', '27', '3', '13000', '11700', '1000', '900', '2', '1733', '200', '1400', '4000', '', 'yes', '13000', '1404', 'yes', '149', '10000', '0', '19933', '11553', '8380', 'eight thousand three hundred eighty ', 0, 1, '2024-10-17 00:25:38', 0, NULL),
(64, '24/00064', 34, 'BEH 046', '2023-04-03', 'Gaurav Yadav', 'Asst Technician', 'Madhya Pradesh', '1017466310', '101937727413', 'bright', 'CANARA BANK', '110117774354', 'CNRB0006076', ' BNPPY1666P ', '2024', 'september', '30', '30', '0', '15000', '15000', '4000', '4000', '2.5', '2500', '200', '0', '0', '', 'yes', '15000', '1800', 'yes', '163', '0', '0', '21700', '1963', '19737', 'nineteen thousand seven hundred thirty seven ', 0, 1, '2024-10-19 01:43:13', 0, NULL),
(65, '24/00065', 59, 'BEH 045', '2023-04-01', 'Md Amanullah', 'Asst Technician', 'Maharashtra', '1817466231', '101716821296', 'bright', 'CENTRAL BANK OF INDIA', '3834574103', 'CBIN0282514', 'XYZ', '2024', 'september', '30', '29', '1', '15000', '14500', '5000', '4833', '0.5', '500', '200', '0', '1400', '', 'yes', '15000', '1740', 'yes', '161', '0', '0', '21433', '1901', '19532', 'nineteen thousand five hundred thirty two ', 0, 1, '2024-10-19 01:43:13', 0, NULL),
(67, '24/00067', 57, 'GGCC 087', '2019-02-01', 'Uday Sakharam Mungekar', 'Asst Technician', 'Maharashtra', '3111404241', '100867251594', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '117100050302705', 'TMBL0000117', 'XYZ', '2024', 'september', '30', '2', '28', '15500', '1033', '1500', '100', '0.5', '517', '200', '0', '0', '', 'yes', '15000', '120', 'yes', '14', '0', '0', '1850', '134', '1716', 'one thousand seven hundred sixteen ', 0, 1, '2024-10-19 01:44:50', 0, NULL),
(68, '24/00068', 18, 'GGCC122', '2021-08-02', 'Kishor Selvam', 'Asst Technician', 'Tamil Nadu', 'Not Applicable', '101722099112', 'ggcc', 'Indian Overseas Bank', '171201000031488', ' IOBA 0001712 ', ' HZYPK1119N ', '2024', 'september', '30', '30', '0', '15000', '15000', '7000', '7000', '0', '0', '200', '0', '0', '', 'yes', '15000', '1800', 'no', '0', '0', '0', '22200', '1800', '20400', 'twenty thousand four hundred ', 0, 1, '2024-10-26 01:27:10', 0, NULL),
(69, '24/00069', 19, 'GGCC140', '2023-05-08', 'Lenin Fernondo', 'Asst Technician', 'Tamil Nadu', '3416244216', '101821078985', 'ggcc', 'Indian Overseas Bank ', '109401000011515', ' IDBA0001094 ', ' BKGPL9746K ', '2024', 'september', '30', '27', '3', '13000', '11700', '8000', '7200', '0.5', '433', '200', '0', '0', '', 'yes', '13000', '1404', 'yes', '146', '0', '0', '19533', '1550', '17983', 'seventeen thousand nine hundred eighty three ', 0, 1, '2024-10-26 01:27:10', 0, NULL),
(71, '24/00071', 44, 'BEH 049', '2023-09-01', 'RAJESHKUMAR R', 'Asst Technician', 'Tamil Nadu', '5135229884', '102002261595', 'bright', 'INDIAN BANK', '6365640261', 'IDIB000A024', ' FTCPR0859G ', '2024', 'september', '30', '18', '12', '15000', '9000', '5000', '3000', '0', '0', '200', '0', '0', '', 'yes', '15000', '1080', 'yes', '92', '0', '0', '12200', '1172', '11028', 'eleven thousand twenty eight ', 0, 1, '2024-10-26 01:31:08', 0, NULL),
(72, '24/00072', 40, 'BEH 036', '2022-10-01', 'Appuvelangkanni C', 'Asst Technician', 'Tamil Nadu', '5133900943b', '101884118483', 'bright', 'CITY UNION BANK', '500101013176075', 'CIUB0000075', ' ESBPA4811A ', '2024', 'september', '30', '25', '5', '15000', '12500', '6000', '5000', '0', '0', '200', '0', '0', '', 'yes', '15000', '1500', 'yes', '133', '0', '0', '17700', '1633', '16067', 'sixteen thousand sixty seven ', 0, 1, '2024-10-26 01:33:12', 0, NULL),
(73, '24/00073', 13, 'GGCC093', '2023-01-01', 'Raghunath S Parida', 'Asst Technician', 'Madhya Pradesh', 'Not Applicable', '100290525018', 'ggcc', 'Tamilnad Mercantile Bank Ltd', '218100050300342', 'TMBL0000218', 'abc', '2024', 'august', '31', '17', '14', '23000', '12613', '10000', '5484', '1.5', '2226', '200', '0', '0', '', 'yes', '15000', '987', 'no', '0', '5000', '0', '20523', '5987', '14536', 'fourteen thousand five hundred thirty six ', 0, 1, '2024-10-29 02:13:57', 0, NULL),
(77, '24/00077', 22, 'GGCC050', '2011-11-01', 'A. Ellavarasan', 'Driver', 'Tamil Nadu', 'Not Applicable', '100145028944', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '312100050301856', ' TMBL0000312 ', ' ACPPE2451A ', '2024', 'march', '31', '31', '0', '23500', '23500', '10500', '10500', '2', '3032', '200', '1000', '400', '600', 'yes', '15000', '1800', 'no', '0', '132', '300', '39232', '2232', '37000', 'thirty seven thousand', 1, 1, '2024-11-06 16:41:02', 0, NULL),
(78, '24/00078', 22, 'GGCC050', '2011-11-01', 'A. Ellavarasan', 'Driver', 'Tamil Nadu', 'Not Applicable', '100145028944', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '312100050301856', ' TMBL0000312 ', ' ACPPE2451A ', '2024', 'october', '31', '31', '0', '23500', '23500', '10500', '10500', '1.5', '2274', '200', '0', '0', '0', 'yes', '15000', '1800', 'no', '0', '0', '0', '36474', '1800', '34674', 'thirty four thousand six hundred seventy four ', 0, 1, '2024-11-08 00:16:06', 0, NULL),
(79, '24/00079', 23, 'GGCC082', '2015-09-01', 'A.Arulmani', 'Asst Technician', 'Tamil Nadu', 'Not Applicable', '100604454985', 'ggcc', 'Tamilnad Mercantile Bank', '210100050305252', 'TMBL0000210', ' BZMPA8855M ', '2024', 'october', '31', '28', '3', '17000', '15355', '8000', '7226', '0.5', '548', '200', '0', '0', '0', 'yes', '15000', '1626', 'no', '0', '0', '0', '23329', '1626', '21703', 'twenty one thousand seven hundred three ', 0, 1, '2024-11-08 00:16:07', 0, NULL),
(80, '24/00080', 4, 'GGCC132', '2022-06-07', 'Aaditya Kumar ARK', 'Driver', 'Madhya Pradesh', 'Not Applicable', '101322238657', 'ggcc', 'State Bank Of India', '20411611573', ' SBIN0012601 ', ' CHEPA9887L ', '2024', 'october', '31', '31', '0', '17000', '17000', '8000', '8000', '2', '2194', '200', '0', '0', '0', 'yes', '15000', '1800', 'no', '0', '0', '0', '27394', '1800', '25594', 'twenty five thousand five hundred ninety four ', 0, 1, '2024-11-08 00:16:07', 0, NULL),
(81, '24/00081', 5, 'GGCC086', '2023-01-01', 'Ajay Yadav', 'Asst Technician', 'Madhya Pradesh', 'Not Applicable', '100650291060', 'ggcc', 'Tamilnad Mercantile Bank Ltd', '444149589239680', ' TMBL0000444 ', ' ANPPY8836N', '2024', 'october', '31', '30', '1', '17000', '16452', '8000', '7742', '0', '0', '200', '3000', '0', '2000', 'yes', '15000', '1742', 'no', '0', '0', '0', '29394', '1742', '27652', 'twenty seven thousand six hundred fifty two ', 0, 1, '2024-11-08 00:16:07', 0, NULL),
(82, '24/00082', 48, 'GGCC133', '2022-06-01', 'Awadhesh Rajbhar', 'Asst Technician', 'Madhya Pradesh', 'Not Applicable', '101190146261', 'ggcc', 'STATE BANK OF INDIA', '32377833957', ' SBIN0002537 ', ' DKXPR1457N ', '2024', 'october', '31', '30', '1', '19000', '18387', '8000', '7742', '0.5', '613', '200', '0', '0', '0', 'yes', '15000', '1742', 'no', '0', '0', '0', '26942', '1742', '25200', 'twenty five thousand two hundred ', 0, 1, '2024-11-08 00:16:07', 0, NULL),
(83, '24/00083', 11, 'GGCC034', '2008-12-01', 'BAPU PARSHURAM SHIRODKAR', 'Technician', 'Madhya Pradesh', 'Not Applicable', '100107951357', 'ggcc', 'Tamilnad Mercantile Bank Ltd', '218100050300351', ' TMBL0000218 ', ' BMYPS78448 ', '2024', 'october', '31', '28', '3', '25000', '22581', '8000', '7226', '0', '0', '200', '3000', '0', '2000', 'yes', '15000', '1626', 'no', '0', '0', '0', '35007', '1626', '33381', 'thirty three thousand three hundred eighty one ', 0, 1, '2024-11-08 00:16:07', 0, NULL),
(84, '24/00084', 55, 'GGCC07', '2005-11-01', 'DEVASAHAYA RAVI', 'Manager', 'Tamil Nadu', 'Not Applicable', '100133880659', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '218109930555886', 'TMBL0000218', 'AODPA8868D', '2024', 'october', '31', '31', '0', '35000', '35000', '25000', '25000', '0', '0', '200', '0', '0', '0', 'yes', '35000', '4200', 'no', '0', '0', '0', '60200', '4200', '56000', 'fifty six thousand', 0, 1, '2024-11-08 00:16:07', 0, NULL),
(85, '24/00085', 20, 'GGCC068', '2013-01-01', 'G Joseph Margasis', 'Technician', 'Tamil Nadu', 'Not Applicable', '100147893430', 'ggcc', 'Tamilnad Mercantile Bank Ltd', '058109790033091', ' TMBL0000058 ', ' BAEPJ5184P ', '2024', 'october', '31', '31', '0', '23500', '23500', '10500', '10500', '0.5', '758', '200', '3000', '0', '2000', 'yes', '15000', '1800', 'no', '0', '0', '0', '39958', '1800', '38158', 'thirty eight thousand one hundred fifty eight ', 0, 1, '2024-11-08 00:16:07', 0, NULL),
(86, '24/00086', 54, 'GGCC119', '2020-03-02', 'Guddu Rajbhar', 'Asst Technician', 'Madhya Pradesh', 'Not Applicable', '101572420729', 'ggcc', 'STATE BANK OF INDIA', '32356886132', ' SBIN0002537 ', ' CYTPR1937E ', '2024', 'october', '31', '31', '0', '16000', '16000', '8000', '8000', '1.5', '1548', '200', '0', '0', '0', 'yes', '15000', '1800', 'no', '0', '0', '0', '25748', '1800', '23948', 'twenty three thousand nine hundred forty eight ', 0, 1, '2024-11-08 00:16:07', 0, NULL),
(87, '24/00087', 24, 'GGCC067', '2013-01-01', 'J.Charles', 'Asst Technician', 'Tamil Nadu', 'Not Applicable', '100169001751', 'ggcc', 'Tamilnad Mercantile Bank Ltd', '210100050304937', ' TMBL0000490 ', ' BGZPC3722M ', '2024', 'october', '31', '31', '0', '23000', '23000', '8000', '8000', '0.5', '742', '200', '0', '0', '0', 'yes', '15000', '1800', 'no', '0', '0', '0', '31942', '1800', '30142', 'thirty thousand one hundred forty two ', 0, 1, '2024-11-08 00:16:07', 0, NULL),
(88, '24/00088', 21, 'GGCC116', '2019-12-01', 'Karthik K', 'Asst Technician', 'Tamil Nadu', 'Not Applicable', '100190477301', 'ggcc', 'State Bank Of India', '33798843970', ' SBIN0006239 ', ' DPQPK1078Q ', '2024', 'october', '31', '29', '2', '20000', '18710', '9000', '8419', '1.5', '1935', '200', '0', '0', '0', 'yes', '15000', '1684', 'no', '0', '0', '0', '29264', '1684', '27580', 'twenty seven thousand five hundred eighty ', 0, 1, '2024-11-08 00:16:07', 0, NULL),
(89, '24/00089', 18, 'GGCC122', '2021-08-02', 'Kishor Selvam', 'Asst Technician', 'Tamil Nadu', 'Not Applicable', '101722099112', 'ggcc', 'Indian Overseas Bank', '171201000031488', ' IOBA 0001712 ', ' HZYPK1119N ', '2024', 'october', '31', '27', '4', '15000', '13064', '7000', '6097', '0.5', '484', '200', '2500', '0', '2500', 'yes', '15000', '1568', 'no', '0', '0', '0', '24845', '1568', '23277', 'twenty three thousand two hundred seventy seven ', 0, 1, '2024-11-08 00:16:07', 0, NULL),
(90, '24/00090', 19, 'GGCC140', '2023-05-08', 'Lenin Fernondo', 'Asst Technician', 'Tamil Nadu', '3416244216', '101821078985', 'ggcc', 'Indian Overseas Bank ', '109401000011515', ' IDBA0001094 ', ' BKGPL9746K ', '2024', 'october', '31', '28', '3', '13000', '11742', '8000', '7226', '0', '0', '200', '0', '0', '0', 'yes', '13000', '1409', 'yes', '144', '0', '0', '19168', '1553', '17615', 'seventeen thousand six hundred fifteen ', 0, 1, '2024-11-08 00:16:07', 0, NULL),
(91, '24/00091', 56, 'GGCC 134', '2022-06-01', 'MD IRFAN', 'Asst Technician', 'Madhya Pradesh', '3123896384', '101563463746', 'ggcc', 'STATE BANK OF INDIA', '40253671697', 'SBIN0017454', 'XYZ', '2024', 'october', '31', '29', '2', '13000', '12161', '1000', '936', '1.5', '1258', '200', '0', '0', '0', 'yes', '13000', '1459', 'yes', '109', '0', '0', '14555', '1568', '12987', 'twelve thousand nine hundred eighty seven ', 0, 1, '2024-11-08 00:16:07', 0, NULL),
(92, '24/00092', 3, 'GGCC102', '2019-02-01', 'Nadar Bhuvana Shekar', 'Accountant', 'Maharashtra', 'Not Applicable', '101420903254', 'ggcc', 'TMBL', '218100720600445', 'TMBL0000218', 'FGMPS4413N', '2024', 'october', '31', '20', '11', '16000', '10323', '6000', '3871', '0', '0', '200', '0', '3000', '0', 'yes', '16000', '1239', 'no', '0', '0', '0', '17394', '1239', '16155', 'sixteen thousand one hundred fifty five ', 0, 1, '2024-11-08 00:16:07', 0, NULL),
(94, '24/00094', 17, 'GGCC099', '2018-04-01', 'P Muthu Kumar', 'Driver', 'Tamil Nadu', 'Not Applicable', '101286700652', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '248100050305253', ' TMBL0000248 ', ' CIAPM8773J ', '2024', 'october', '31', '30', '1', '22000', '21290', '8000', '7742', '0', '0', '200', '0', '0', '0', 'yes', '15000', '1742', 'no', '0', '0', '0', '29232', '1742', '27490', 'twenty seven thousand four hundred ninety ', 0, 1, '2024-11-08 00:16:07', 0, NULL),
(95, '24/00095', 51, 'GGCC091', '2016-09-01', 'P. ARUMUGAKANI RAJA', 'Asst Technician', 'Tamil Nadu', 'Not Applicable', '100923175836', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '409100050302857', ' TMBL0000409 ', ' CHUPA7102E ', '2024', 'october', '31', '28', '3', '20000', '18064', '8000', '7226', '0.5', '645', '200', '3000', '0', '2000', 'yes', '15000', '1626', 'no', '0', '0', '0', '31135', '1626', '29509', 'twenty nine thousand five hundred nine ', 0, 1, '2024-11-08 00:16:07', 0, NULL),
(96, '24/00096', 6, 'GGCC084', '2015-12-01', 'P.Allwin', 'Supervisor', 'Madhya Pradesh', 'Not Applicable', '100649963586', 'ggcc', 'Tamilnad Mercantile Bank Ltd', '218100720600073', ' TMBL0000218 ', ' ABMPA0285G ', '2024', 'october', '31', '31', '0', '25000', '25000', '20000', '20000', '0', '0', '200', '0', '5000', '0', 'yes', '25000', '3000', 'no', '0', '0', '0', '50200', '3000', '47200', 'forty seven thousand two hundred ', 0, 1, '2024-11-08 00:16:07', 0, NULL),
(97, '24/00097', 7, 'GGCC094', '2017-07-01', 'Prabhudayal Patel', 'Asst Technician', 'Madhya Pradesh', 'Not Applicable', '101132615953', 'ggcc', 'Tamilnad Mercantile Bank Ltd', '444100050300412', ' TMBL0000444 ', ' CMVPP2248E ', '2024', 'october', '31', '31', '0', '20000', '20000', '8000', '8000', '3', '3871', '200', '2000', '0', '3000', 'yes', '15000', '1800', 'no', '0', '0', '0', '37071', '1800', '35271', 'thirty five thousand two hundred seventy one ', 0, 1, '2024-11-08 00:16:07', 0, NULL),
(98, '24/00098', 10, 'GGCC002', '2005-11-01', 'Praful Thandel', 'Technician', 'Madhya Pradesh', 'Not Applicable', '100275120870', 'ggcc', 'Tamilnad Mercantile Bank Ltd', '218100050300730', ' TMBL0000218 ', ' AHRPT7799K ', '2024', 'october', '31', '31', '0', '20000', '20000', '8000', '8000', '0', '0', '200', '0', '0', '0', 'yes', '15000', '1800', 'no', '0', '0', '0', '28200', '1800', '26400', 'twenty six thousand four hundred ', 0, 1, '2024-11-08 00:16:07', 0, NULL),
(100, '24/00100', 13, 'GGCC093', '2023-01-01', 'Raghunath S Parida', 'Asst Technician', 'Madhya Pradesh', 'Not Applicable', '100290525018', 'ggcc', 'Tamilnad Mercantile Bank Ltd', '218100050300342', 'TMBL0000218', 'abc', '2024', 'october', '31', '31', '0', '23000', '23000', '10000', '10000', '5', '7419', '200', '3000', '0', '2000', 'yes', '15000', '1800', 'no', '0', '0', '0', '45619', '1800', '43819', 'forty three thousand eight hundred nineteen ', 0, 1, '2024-11-08 00:16:07', 0, NULL),
(101, '24/00101', 49, 'BEH 086', '2023-07-14', 'Ram Khelavan Verma ', 'Asst Technician', 'Madhya Pradesh', 'Not Applicable', '9580616025', 'ggcc', 'STATE BANK OF INDIA', '37140174188', ' SBIN0011331 ', ' CYKPK4094E ', '2024', 'october', '31', '31', '0', '15000', '15000', '8000', '8000', '1', '968', '200', '0', '0', '0', 'yes', '15000', '1800', 'no', '0', '0', '0', '24168', '1800', '22368', 'twenty two thousand three hundred sixty eight ', 0, 1, '2024-11-08 00:16:07', 0, NULL),
(102, '24/00102', 9, 'GGCC135', '2023-01-01', 'Ramashankar Prasad', 'Asst Technician', 'Madhya Pradesh', 'Not Applicable', '101914491001', 'ggcc', 'Punjab National Bank', '2400000100213458', 'abc', 'abc', '2024', 'october', '31', '31', '0', '25000', '25000', '8000', '8000', '1', '1613', '200', '0', '0', '0', 'yes', '15000', '1800', 'no', '0', '0', '0', '34813', '1800', '33013', 'thirty three thousand thirteen ', 0, 1, '2024-11-08 00:16:07', 0, NULL),
(104, '24/00104', 52, 'GGCC104', '2019-04-01', 'Santosh Kumar', 'Driver', 'Madhya Pradesh', 'Not Applicable', '101446403273', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '218100050302610', 'TMBL0000218', '123', '2024', 'october', '31', '31', '0', '19000', '19000', '8000', '8000', '0.5', '613', '200', '2000', '0', '3000', 'yes', '15000', '1800', 'no', '0', '0', '0', '32813', '1800', '31013', 'thirty one thousand thirteen ', 0, 1, '2024-11-08 00:16:07', 0, NULL),
(106, '24/00106', 57, 'GGCC 087', '2019-02-01', 'Uday Sakharam Mungekar', 'Asst Technician', 'Maharashtra', '3111404241', '100867251594', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '117100050302705', 'TMBL0000117', 'XYZ', '2024', 'october', '31', '0', '31', '15500', '0', '1500', '0', '0', '0', '200', '0', '0', '0', 'yes', '15000', '0', 'yes', '2', '0', '0', '200', '2', '198', 'one hundred ninety eight ', 1, 1, '2024-11-08 05:59:26', 0, NULL),
(107, '24/00107', 12, 'GGCC040', '2010-05-24', 'VAIBHAV VINAYAK NADKARNI', 'Asst Technician', 'Madhya Pradesh', 'Not Applicable', '100399345214', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '218100720600103', 'TMBL0000218', 'AJEPN9298A', '2024', 'october', '31', '31', '0', '23000', '23000', '8000', '8000', '3.5', '5194', '200', '3000', '0', '2000', 'yes', '15000', '1800', 'no', '0', '0', '0', '41394', '1800', '39594', 'thirty nine thousand five hundred ninety four ', 0, 1, '2024-11-08 00:16:07', 0, NULL),
(108, '24/00108', 43, 'BEH 041', '2022-11-01', 'Amaladas C', 'Driver', 'Tamil Nadu', 'Not Applicable', '101577917503', 'bright', 'CANARA BANK', '1671101020607', 'CNRB0001671', ' CTQPC9947K ', '2024', 'october', '31', '31', '0', '18000', '18000', '8000', '8000', '1', '1161', '200', '0', '0', '0', 'yes', '15000', '1800', 'no', '0', '0', '0', '27361', '1800', '25561', 'twenty five thousand five hundred sixty one ', 0, 1, '2024-11-08 00:39:12', 0, NULL),
(109, '24/00109', 40, 'BEH 036', '2022-10-01', 'Appuvelangkanni C', 'Asst Technician', 'Tamil Nadu', '5133900943b', '101884118483', 'bright', 'CITY UNION BANK', '500101013176075', 'CIUB0000075', ' ESBPA4811A ', '2024', 'october', '31', '31', '0', '15000', '15000', '6000', '6000', '0', '0', '200', '3000', '0', '2000', 'yes', '15000', '1800', 'yes', '197', '0', '0', '26200', '1997', '24203', 'twenty four thousand two hundred three ', 0, 1, '2024-11-08 00:39:12', 0, NULL),
(110, '24/00110', 28, 'BEH 031', '2022-01-01', 'Arvind', 'Asst Technician', 'Madhya Pradesh', 'Not Applicable', '101394072650', 'bright', 'State Bank Of India', '36132203039', 'SBIN0001158', ' CNZPA5047F ', '2024', 'october', '31', '31', '0', '14000', '14000', '8000', '8000', '1', '903', '200', '0', '0', '0', 'yes', '14000', '1680', 'no', '0', '0', '0', '23103', '1680', '21423', 'twenty one thousand four hundred twenty three ', 0, 1, '2024-11-08 00:39:12', 0, NULL),
(111, '24/00111', 37, 'BEH 009', '2019-04-01', 'C Anbujothi', 'Technician', 'Tamil Nadu', 'Not Applicable', '101447717410', 'bright', 'INDIAN OVERSEAS BANK ', '109101000009379', 'IOBA 0001094', ' CYHPA8422M ', '2024', 'october', '31', '30', '1', '18000', '17420', '8000', '7742', '0.5', '581', '200', '3000', '0', '2000', 'yes', '15000', '1742', 'no', '0', '0', '0', '30943', '1742', '29201', 'twenty nine thousand two hundred one ', 0, 1, '2024-11-08 00:39:12', 0, NULL),
(112, '24/00112', 25, 'BEH 03', '2019-04-01', 'CHAND BASHA BASHEER GULAM', 'Technician', 'Maharashtra', 'Not Applicable', '100463895891', 'bright', 'TAMILNAD MERCANTILE BANK LTD', '218100720600074', 'TMBL0000218', 'ABC', '2024', 'october', '31', '31', '0', '20000', '20000', '14000', '14000', '0.5', '645', '200', '0', '5000', '0', 'yes', '20000', '2400', 'no', '0', '0', '0', '39845', '2400', '37445', 'thirty seven thousand four hundred forty five ', 0, 1, '2024-11-08 00:39:12', 0, NULL),
(114, '24/00114', 33, 'BEH 043', '2022-12-01', 'Dheraj', 'Asst Technician', 'Madhya Pradesh', '1817325657', '101902897640', 'bright', 'UNION BANK OF INDIA ', '712902120002505', 'UBFN0571296', ' HYYPD1530D ', '2024', 'october', '31', '31', '0', '15000', '15000', '5000', '5000', '1.5', '1452', '200', '0', '0', '0', 'yes', '15000', '1800', 'yes', '162', '0', '0', '21652', '1962', '19690', 'nineteen thousand six hundred ninety ', 0, 1, '2024-11-08 00:39:12', 0, NULL),
(115, '24/00115', 39, 'BEH 024', '2019-08-01', 'Elangovan A', 'Asst Technician', 'Tamil Nadu', 'Not Applicable', '101496274540', 'bright', 'INDIAN BANK', '6119254948', 'IDIB000K030', ' AEHPE7314L ', '2024', 'october', '31', '28', '3', '15000', '13548', '8000', '7226', '0', '0', '200', '0', '0', '0', 'yes', '15000', '1626', 'no', '0', '0', '0', '20974', '1626', '19348', 'nineteen thousand three hundred forty eight ', 0, 1, '2024-11-08 00:39:12', 0, NULL),
(116, '24/00116', 34, 'BEH 046', '2023-04-03', 'Gaurav Yadav', 'Asst Technician', 'Madhya Pradesh', '1017466310', '101937727413', 'bright', 'CANARA BANK', '110117774354', 'CNRB0006076', ' BNPPY1666P ', '2024', 'october', '31', '28', '3', '15000', '13548', '4000', '3613', '2', '1935', '200', '0', '0', '0', 'yes', '15000', '1626', 'yes', '145', '0', '0', '19296', '1771', '17525', 'seventeen thousand five hundred twenty five ', 0, 1, '2024-11-08 00:39:12', 0, NULL),
(117, '24/00117', 32, 'BEH 039', '2022-11-01', 'Ghanshyam', 'Asst Technician', 'Madhya Pradesh', 'Not Applicable', '101893490487', 'bright', ' BHARAT BANK ', '1410100127476', 'BCBM000015', ' BOWPS6154J ', '2024', 'october', '31', '16', '15', '21000', '10839', '8000', '4129', '3.5', '4742', '200', '0', '0', '0', 'yes', '15000', '929', 'no', '0', '0', '0', '19910', '929', '18981', 'eighteen thousand nine hundred eighty one ', 0, 1, '2024-11-08 00:39:12', 0, NULL),
(118, '24/00118', 38, 'BEH 012', '2019-04-01', 'Jwala Singh', 'Asst Technician', 'Tamil Nadu', 'Not Applicable', '100178879892', 'bright', 'TAMILNAD MERCANTILE BANK LTD', '210100050304981', 'TMBL0000210', ' EUAPS4567Q ', '2024', 'october', '31', '31', '0', '17000', '17000', '8000', '8000', '0', '0', '200', '0', '0', '0', 'yes', '15000', '1800', 'no', '0', '0', '0', '25200', '1800', '23400', 'twenty three thousand four hundred ', 0, 1, '2024-11-08 00:39:12', 0, NULL),
(119, '24/00119', 58, 'BEH 001', '2019-04-01', 'KISHOR RAJARAM PARTE', 'Accountant', 'Maharashtra', 'Not Applicable', '101447716731', 'bright', 'TAMILNAD MERCANTILE BANK LTD', '218100050300353', 'TMBL0000218', 'XYZ', '2024', 'october', '31', '31', '0', '25000', '25000', '15000', '15000', '0', '0', '200', '0', '0', '0', 'yes', '25000', '3000', 'no', '0', '0', '0', '40200', '3000', '37200', 'thirty seven thousand two hundred ', 0, 1, '2024-11-08 00:39:12', 0, NULL),
(120, '24/00120', 45, 'BEH 052', '2023-10-01', 'Mathura Nayagam Athisayam', 'Asst Technician', 'Tamil Nadu', 'Not Applicable', '100712674063', 'bright', 'ICICI ', '003501571913', 'ICIC0006135', ' ARVPA8765A ', '2024', 'october', '31', '28', '3', '16000', '14452', '8000', '7226', '0', '0', '200', '0', '0', '0', 'yes', '15000', '1626', 'no', '0', '0', '0', '21878', '1626', '20252', 'twenty thousand two hundred fifty two ', 0, 1, '2024-11-08 00:39:12', 0, NULL),
(121, '24/00121', 59, 'BEH 045', '2023-04-01', 'Md Amanullah', 'Asst Technician', 'Maharashtra', '1817466231', '101716821296', 'bright', 'CENTRAL BANK OF INDIA', '3834574103', 'CBIN0282514', 'XYZ', '2024', 'october', '31', '31', '0', '15000', '15000', '5000', '5000', '0', '0', '200', '0', '0', '0', 'yes', '15000', '1800', 'yes', '152', '0', '0', '20200', '1952', '18248', 'eighteen thousand two hundred forty eight ', 1, 1, '2024-12-05 10:02:26', 0, NULL),
(122, '24/00122', 35, 'BEH 007', '2019-04-01', 'Munna Kumar Singh', 'Driver', 'Maharashtra', 'Not Applicable', '101447717389', 'bright', 'TAMILNAD MERCANTILE BANK LTD', '218100720600101', 'TMBL0000218', 'DDPPS90975', '2024', 'october', '31', '31', '0', '19000', '19000', '8000', '8000', '1.5', '1839', '200', '0', '0', '0', 'yes', '15000', '1800', 'no', '0', '0', '0', '29039', '1800', '27239', 'twenty seven thousand two hundred thirty nine ', 0, 1, '2024-11-08 00:39:12', 0, NULL),
(123, '24/00123', 29, 'BEH 033', '2022-01-01', 'Nitesh Gurjar', 'Asst Technician', 'Madhya Pradesh', 'Not Applicable', '101777016329', 'bright', 'Canara Bank', '4117101000884', 'CNRB0004117', ' DGQPG1941D ', '2024', 'october', '31', '31', '0', '16000', '16000', '8000', '8000', '0.5', '516', '200', '0', '0', '0', 'yes', '15000', '1800', 'no', '0', '0', '0', '24716', '1800', '22916', 'twenty two thousand nine hundred sixteen ', 0, 1, '2024-11-08 00:39:12', 0, NULL),
(124, '24/00124', 30, 'BEH 034', '2022-01-01', 'Omprakash', 'Driver', 'Madhya Pradesh', 'Not Applicable', '101777016291', 'bright', 'TAMILNAD MERCANTILE BANK LTD', '444100050301038', 'TMBL0000444', ' ABYPO1785H ', '2024', 'october', '31', '29', '2', '16000', '14968', '8000', '7484', '0.5', '516', '200', '0', '0', '0', 'yes', '15000', '1684', 'no', '0', '0', '0', '23168', '1684', '21484', 'twenty one thousand four hundred eighty four ', 0, 1, '2024-11-08 00:39:12', 0, NULL),
(125, '24/00125', 36, 'BEH 014', '2019-04-01', 'Prins Kumar', 'Asst Technician', 'Madhya Pradesh', 'Not Applicable', '101447716720', 'bright', 'BANK OF BARODA ', '8820100034965', 'BARB0AMETHI', ' EXVPK4254G ', '2024', 'october', '31', '27', '4', '22000', '19161', '8000', '6968', '1', '1419', '200', '0', '0', '0', 'yes', '15000', '1568', 'no', '0', '0', '0', '27748', '1568', '26180', 'twenty six thousand one hundred eighty ', 0, 1, '2024-11-08 00:39:12', 0, NULL),
(126, '24/00126', 53, 'BEH 057', '2024-07-01', 'PRITAM CHADAR', 'Asst Technician', 'Madhya Pradesh', 'Not Applicable', '102103548750', 'bright', '0', '0', '0', '0', '2024', 'october', '31', '28', '3', '16000', '14452', '8000', '7226', '2.5', '2581', '200', '0', '0', '0', 'yes', '15000', '1626', 'no', '0', '0', '0', '24459', '1626', '22833', 'twenty two thousand eight hundred thirty three ', 0, 1, '2024-11-08 00:39:12', 0, NULL),
(127, '24/00127', 31, 'BEH 035', '2022-01-01', 'Pushpendra Umath', 'Driver', 'Madhya Pradesh', 'Not Applicable', '101431668668', 'bright', 'Punjab National Bank', '4622000400005702', 'PUNB0462200', ' AGQPU3058C ', '2024', 'october', '31', '31', '0', '17000', '17000', '8000', '8000', '2', '2194', '200', '3000', '0', '2000', 'yes', '15000', '1800', 'no', '0', '0', '0', '32394', '1800', '30594', 'thirty thousand five hundred ninety four ', 0, 1, '2024-11-08 00:39:12', 0, NULL),
(128, '24/00128', 46, 'BEH 054', '2024-01-01', 'Raj Kumar ', 'Asst Technician', 'Tamil Nadu', 'Not Applicable', '101547069375', 'bright', 'INDIAN BANK ', '6372735619', 'IDIB000L001', ' EPYPR4190M ', '2024', 'october', '31', '28', '3', '14000', '12645', '8000', '7226', '1.5', '1355', '200', '00', '0', '0', 'yes', '14000', '1517', 'no', '0', '0', '0', '21426', '1517', '19909', 'nineteen thousand nine hundred nine ', 0, 1, '2024-11-08 00:39:12', 0, NULL),
(129, '24/00129', 44, 'BEH 049', '2023-09-01', 'RAJESHKUMAR R', 'Asst Technician', 'Tamil Nadu', '5135229884', '102002261595', 'bright', 'INDIAN BANK', '6365640261', 'IDIB000A024', ' FTCPR0859G ', '2024', 'october', '31', '28', '3', '15000', '13548', '5000', '4516', '0.5', '484', '200', '0', '0', '0', 'yes', '15000', '1626', 'yes', '141', '0', '0', '18748', '1767', '16981', 'sixteen thousand nine hundred eighty one ', 0, 1, '2024-11-08 00:39:12', 0, NULL),
(131, '24/00131', 50, 'GGCC043', '2010-11-01', 'NILESH G SAVRATKAR', 'Technician', 'Mumbai', 'Not Applicable', '100255467057', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '2181007206600099', 'TMBL0000218', 'AYBPS1577P', '2024', 'october', '31', '31', '0', '21000', '21000', '8000', '8000', '1', '1355', '200', '0', '0', '0', 'yes', '15000', '1800', 'no', '0', '0', '200', '30555', '2000', '28555', 'twenty eight thousand five hundred fifty five ', 0, 1, '2024-11-08 05:59:20', 0, NULL),
(133, '24/00133', 14, 'GGCC037', '2009-05-01', 'Ranjeet Singh Nanade', 'Technician', 'Mumbai', 'Not Applicable', '100307924904', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '218100050300394', 'TMBL0000218', 'BYDPN5255N', '2024', 'october', '31', '28', '3', '21000', '18968', '8000', '7226', '0', '0', '200', '3000', '0', '0', 'yes', '15000', '1626', 'no', '0', '0', '200', '29394', '1826', '27568', 'twenty seven thousand five hundred sixty eight ', 0, 1, '2024-11-08 05:59:21', 0, NULL),
(135, '24/00135', 16, 'GGCC046', '2011-01-01', 'PRAMOD DHAKU MUNGEKAR', 'Asst Technician', 'Mumbai', 'Not Applicable', '100276584252', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '218100050301639', 'TMBL0000218', 'AXPPM5363C', '2024', 'october', '31', '25', '6', '19000', '15323', '8000', '6452', '4', '4903', '0', '0', '0', '0', 'yes', '15000', '1452', 'no', '0', '0', '200', '26678', '1652', '25026', 'twenty five thousand twenty six ', 0, 1, '2024-11-08 06:03:23', 0, NULL);
INSERT INTO `employee_payslip` (`id`, `sno`, `employee_id`, `employee_code`, `joining_date`, `employee_name`, `designation`, `branch_location`, `esi_number`, `pf_number`, `company_name`, `bank_name`, `account_number`, `ifsc_code`, `pan_number`, `year`, `month`, `day_count`, `present_count`, `absent_count`, `basic_pay`, `month_basic_pay`, `allowance_amount`, `month_allowance_amount`, `ot_count`, `ot_amount`, `mobile_recharge`, `travelling_amount`, `incentive_amount`, `food_expenses`, `pf_status`, `pf_amount`, `month_pf_amount`, `esi_status`, `esi_amount`, `advance_cash`, `professional_tax`, `total_earning`, `deduction_amount`, `salary_amount`, `salary_in_word`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(136, '24/00136', 41, 'GGCC114', '2019-12-01', 'TABREJ ALAM', 'Asst Technician', 'Mumbai', 'Not Applicable', '101547056712', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '218149987552984', 'TMBL0000218', 'CUCPA1348D', '2024', 'october', '31', '30', '1', '15000', '14516', '2000', '1935', '3', '2903', '200', '3000', '0', '0', 'yes', '15000', '1742', 'yes', '169', '0', '200', '22554', '2111', '20443', 'twenty thousand four hundred forty three ', 0, 1, '2024-11-08 06:08:08', 0, NULL),
(137, '24/00137', 8, 'GGCC105', '2019-04-01', 'Deepak Kumar Mouriya', 'Asst Technician', 'Indore', 'Not Applicable', '101446396581', 'ggcc', 'UCO BANK', '24240110085288', ' UCBA00002424 ', ' DIRPM20225 ', '2024', 'october', '31', '11', '20', '15000', '5323', '8000', '2839', '0.5', '484', '200', '0', '0', '0', 'yes', '15000', '639', 'no', '0', '0', '0', '8846', '639', '8207', 'eight thousand two hundred seven ', 0, 1, '2024-11-11 04:22:06', 0, NULL),
(138, '24/00138', 6, 'GGCC084', '2015-12-01', 'P.Allwin', 'Supervisor', 'Indore', 'Not Applicable', '100649963586', 'ggcc', 'Tamilnad Mercantile Bank Ltd', '218100720600073', ' TMBL0000218 ', ' ABMPA0285G ', '2024', 'july', '31', '31', '0', '25000', '25000', '20000', '20000', '0', '0', '200', '0', '5000', '0', 'yes', '25000', '3000', 'no', '0', '0', '0', '50200', '3000', '47200', 'forty seven thousand two hundred ', 0, 1, '2024-11-11 06:37:22', 0, NULL),
(139, '24/00139', 6, 'GGCC084', '2015-12-01', 'P.Allwin', 'Supervisor', 'Indore', 'Not Applicable', '100649963586', 'ggcc', 'Tamilnad Mercantile Bank Ltd', '218100720600073', ' TMBL0000218 ', ' ABMPA0285G ', '2024', 'august', '31', '31', '0', '25000', '25000', '20000', '20000', '0', '0', '200', '0', '5000', '0', 'yes', '25000', '3000', 'no', '0', '0', '0', '50200', '3000', '47200', 'forty seven thousand two hundred ', 0, 1, '2024-11-11 06:38:37', 0, NULL),
(140, '24/00140', 55, 'GGCC07', '2005-11-01', 'DEVASAHAYA RAVI', 'Manager', 'Tamil Nadu', 'Not Applicable', '100133880659', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '218109930555886', 'TMBL0000218', 'AODPA8868D', '2024', 'april', '30', '30', '0', '35000', '35000', '25000', '25000', '0', '0', '200', '0', '0', '0', 'yes', '35000', '4200', 'no', '0', '0', '0', '60200', '4200', '56000', 'fifty six thousand', 0, 1, '2024-11-13 05:10:05', 0, NULL),
(141, '24/00141', 55, 'GGCC07', '2005-11-01', 'DEVASAHAYA RAVI', 'Manager', 'Tamil Nadu', 'Not Applicable', '100133880659', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '218109930555886', 'TMBL0000218', 'AODPA8868D', '2024', 'may', '31', '31', '0', '35000', '35000', '25000', '25000', '0', '0', '200', '0', '0', '0', 'yes', '35000', '4200', 'no', '0', '0', '0', '60200', '4200', '56000', 'fifty six thousand', 0, 1, '2024-11-13 05:10:36', 0, NULL),
(142, '24/00142', 55, 'GGCC07', '2005-11-01', 'DEVASAHAYA RAVI', 'Manager', 'Tamil Nadu', 'Not Applicable', '100133880659', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '218109930555886', 'TMBL0000218', 'AODPA8868D', '2024', 'june', '30', '30', '0', '35000', '35000', '25000', '25000', '0', '0', '200', '0', '0', '0', 'yes', '35000', '4200', 'no', '0', '0', '0', '60200', '4200', '56000', 'fifty six thousand', 0, 1, '2024-11-13 05:11:11', 0, NULL),
(143, '24/00143', 55, 'GGCC07', '2005-11-01', 'DEVASAHAYA RAVI', 'Manager', 'Tamil Nadu', 'Not Applicable', '100133880659', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '218109930555886', 'TMBL0000218', 'AODPA8868D', '2024', 'july', '31', '31', '0', '35000', '35000', '25000', '25000', '0', '0', '200', '0', '0', '0', 'yes', '35000', '4200', 'no', '0', '0', '0', '60200', '4200', '56000', 'fifty six thousand', 0, 1, '2024-11-13 05:11:57', 0, NULL),
(144, '24/00144', 55, 'GGCC07', '2005-11-01', 'DEVASAHAYA RAVI', 'Manager', 'Tamil Nadu', 'Not Applicable', '100133880659', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '218109930555886', 'TMBL0000218', 'AODPA8868D', '2024', 'august', '31', '31', '0', '35000', '35000', '25000', '25000', '0', '0', '200', '0', '0', '0', 'yes', '35000', '4200', 'no', '0', '0', '0', '60200', '4200', '56000', 'fifty six thousand', 0, 1, '2024-11-13 05:12:13', 0, NULL),
(145, '24/00145', 60, 'BEH00058', '2024-11-01', 'AJAY SITARAM KHEDEKAR', 'Accountant', 'Mumbai', 'Not Applicable', '102124556252', 'bright', 'BANK OF MAHARASHTRA', '60209425216', 'MAHB0000964', 'BMGPK1254H', '2024', 'november', '30', '30', '0', '20000', '20000', '9000', '9000', '0', '0', '200', '0', '0', '0', 'yes', '15000', '1800', 'no', '0', '0', '200', '29200', '2000', '27200', 'twenty seven thousand two hundred ', 0, 1, '2024-12-04 02:25:43', 0, NULL),
(146, '24/00146', 43, 'BEH 041', '2022-11-01', 'Amaladas C', 'Driver', 'Tamil Nadu', 'Not Applicable', '101577917503', 'bright', 'CANARA BANK', '1671101020607', 'CNRB0001671', ' CTQPC9947K', '2024', 'november', '30', '28', '2', '18000', '16800', '8000', '7467', '0.5', '600', '200', '0', '0', '0', 'yes', '15000', '1680', 'no', '0', '0', '0', '25067', '1680', '23387', 'twenty three thousand three hundred eighty seven ', 0, 1, '2024-12-04 02:25:43', 0, NULL),
(147, '24/00147', 47, 'BEH 070', '2024-08-01', 'Amin Kumar', 'Asst Technician', 'Mumbai', 'Not Applicable', 'Not Applicable', 'bright', 'MADHYA BIHAR GRAMIN BANK', '38430410056391', 'PUNBOMBGB06', ' IAOPK9743N', '2024', 'november', '30', '0', '30', '12000', '0', '8000', '0', '0', '0', '200', '0', '0', '0', 'no', '0', '0', 'no', '0', '0', '0', '200', '0', '200', 'two hundred ', 0, 1, '2024-12-04 02:25:44', 0, NULL),
(148, '24/00148', 40, 'BEH 036', '2022-10-01', 'Appuvelangkanni C', 'Asst Technician', 'Tamil Nadu', '5133900943b', '101884118483', 'bright', 'CITY UNION BANK', '500101013176075', 'CIUB0000075', ' ESBPA4811A', '2024', 'november', '30', '28', '2', '15000', '14000', '7000', '6533', '0', '0', '200', '3000', '0', '2000', 'yes', '15000', '1680', 'yes', '193', '0', '0', '25733', '1873', '23860', 'twenty three thousand eight hundred sixty ', 0, 1, '2024-12-04 02:25:44', 0, NULL),
(149, '24/00149', 28, 'BEH 031', '2022-01-01', 'Arvind', 'Asst Technician', 'Indore', 'Not Applicable', '101394072650', 'bright', 'State Bank Of India', '36132203039', 'SBIN0001158', ' CNZPA5047F', '2024', 'november', '30', '19', '11', '14000', '8867', '8000', '5067', '1', '933', '200', '0', '0', '0', 'yes', '14000', '1064', 'no', '0', '0', '0', '15067', '1064', '14003', 'fourteen thousand three ', 0, 1, '2024-12-04 02:25:44', 0, NULL),
(150, '24/00150', 37, 'BEH 009', '2019-04-01', 'C Anbujothi', 'Technician', 'Tamil Nadu', 'Not Applicable', '101447717410', 'bright', 'INDIAN OVERSEAS BANK', '109101000009379', 'IOBA 0001094', ' CYHPA8422M', '2024', 'november', '30', '27', '3', '18000', '16200', '8000', '7200', '0', '0', '200', '3000', '0', '2000', 'yes', '15000', '1620', 'no', '0', '0', '0', '28600', '1620', '26980', 'twenty six thousand nine hundred eighty ', 0, 1, '2024-12-04 02:25:44', 0, NULL),
(151, '24/00151', 25, 'BEH 003', '2019-04-01', 'Chand Basha Basheer Gulam', 'Technician', 'Mumbai', 'Not Applicable', '100463895891', 'bright', 'TAMILNAD MERCANTILE BANK LTD', '218100720600074', 'TMBL0000218', 'ABC', '2024', 'november', '30', '30', '0', '20000', '20000', '14000', '14000', '0', '0', '200', '0', '5000', '0', 'yes', '20000', '2400', 'no', '0', '0', '200', '39200', '2600', '36600', 'thirty six thousand six hundred ', 0, 1, '2024-12-04 02:25:44', 0, NULL),
(152, '24/00152', 33, 'BEH 043', '2022-12-01', 'Dheraj', 'Asst Technician', 'Indore', '1817325657', '101902897640', 'bright', 'UNION BANK OF INDIA', '712902120002505', 'UBFN0571296', ' HYYPD1530D', '2024', 'november', '30', '11', '19', '15000', '5500', '5000', '1833', '1', '1000', '200', '0', '0', '0', 'yes', '15000', '660', 'yes', '64', '0', '0', '8533', '724', '7809', 'seven thousand eight hundred nine ', 0, 1, '2024-12-04 02:25:44', 0, NULL),
(153, '24/00153', 39, 'BEH 024', '2019-08-01', 'Elangovan A', 'Asst Technician', 'Tamil Nadu', 'Not Applicable', '101496274540', 'bright', 'INDIAN BANK', '6119254948', 'IDIB000K030', ' AEHPE7314L', '2024', 'november', '30', '26', '4', '16000', '13867', '8000', '6933', '0', '0', '200', '0', '0', '0', 'yes', '15000', '1560', 'no', '0', '5000', '0', '21000', '6560', '14440', 'fourteen thousand four hundred forty ', 0, 1, '2024-12-04 02:25:44', 0, NULL),
(154, '24/00154', 34, 'BEH 046', '2023-04-03', 'Gaurav Yadav', 'Asst Technician', 'Indore', '1017466310', '101937727413', 'bright', 'CANARA BANK', '110117774354', 'CNRB0006076', ' BNPPY1666P', '2024', 'november', '30', '30', '0', '15000', '15000', '6000', '6000', '4', '4000', '200', '0', '0', '0', 'yes', '15000', '1800', 'yes', '189', '0', '0', '25200', '1989', '23211', 'twenty three thousand two hundred eleven ', 0, 1, '2024-12-04 02:25:44', 0, NULL),
(155, '24/00155', 32, 'BEH 039', '2022-11-01', 'Ghanshyam', 'Asst Technician', 'Indore', 'Not Applicable', '101893490487', 'bright', ' BHARAT BANK', '1410100127476', 'BCBM000015', ' BOWPS6154J', '2024', 'november', '30', '3', '27', '21000', '2100', '8000', '800', '0', '0', '200', '0', '0', '0', 'yes', '15000', '180', 'no', '0', '0', '0', '3100', '180', '2920', 'two thousand nine hundred twenty ', 0, 1, '2024-12-04 02:25:44', 0, NULL),
(156, '24/00156', 38, 'BEH 012', '2019-04-01', 'Jwala Singh', 'Asst Technician', 'Indore', 'Not Applicable', '100178879892', 'bright', 'TAMILNAD MERCANTILE BANK LTD', '210100050304981', 'TMBL0000210', ' EUAPS4567Q', '2024', 'november', '30', '0', '30', '17000', '0', '8000', '0', '0', '0', '200', '0', '0', '0', 'yes', '15000', '0', 'no', '0', '0', '0', '200', '0', '200', 'two hundred ', 0, 1, '2024-12-04 02:25:44', 0, NULL),
(157, '24/00157', 58, 'BEH 001', '2019-04-01', 'Kishor Rajaram Parte', 'Accountant', 'Mumbai', 'Not Applicable', '101447716731', 'bright', 'TAMILNAD MERCANTILE BANK LTD', '218100050300353', 'TMBL0000218', 'XYZ', '2024', 'november', '30', '30', '0', '25000', '25000', '15000', '15000', '0', '0', '200', '0', '0', '0', 'yes', '25000', '3000', 'no', '0', '10000', '200', '40200', '13200', '27000', 'twenty seven thousand', 0, 1, '2024-12-04 02:25:44', 0, NULL),
(158, '24/00158', 45, 'BEH 052', '2023-10-01', 'Mathura Nayagam Athisayam', 'Asst Technician', 'Tamil Nadu', 'Not Applicable', '100712674063', 'bright', 'ICICI', '003501571913', 'ICIC0006135', ' ARVPA8765A', '2024', 'november', '30', '29', '1', '17000', '16433', '8000', '7733', '0.5', '567', '200', '0', '0', '0', 'yes', '15000', '1740', 'no', '0', '5000', '0', '24933', '6740', '18193', 'eighteen thousand one hundred ninety three ', 0, 1, '2024-12-04 02:25:44', 0, NULL),
(160, '24/00160', 35, 'BEH 007', '2019-04-01', 'Munna Kumar Singh', 'Driver', 'Mumbai', 'Not Applicable', '101447717389', 'bright', 'TAMILNAD MERCANTILE BANK LTD', '218100720600101', 'TMBL0000218', 'DDPPS90975', '2024', 'november', '30', '0', '30', '19000', '0', '8000', '0', '0', '0', '200', '0', '0', '0', 'yes', '15000', '0', 'no', '0', '0', '0', '200', '0', '200', 'two hundred ', 0, 1, '2024-12-04 02:25:44', 0, NULL),
(161, '24/00161', 29, 'BEH 033', '2022-01-01', 'Nitesh Gurjar', 'Asst Technician', 'Indore', 'Not Applicable', '101777016329', 'bright', 'Canara Bank', '4117101000884', 'CNRB0004117', ' DGQPG1941D', '2024', 'november', '30', '29', '1', '16000', '15467', '8000', '7733', '0', '0', '200', '0', '0', '0', 'yes', '15000', '1740', 'no', '0', '0', '0', '23400', '1740', '21660', 'twenty one thousand six hundred sixty ', 0, 1, '2024-12-04 02:25:44', 0, NULL),
(162, '24/00162', 30, 'BEH 034', '2022-01-01', 'Omprakash', 'Driver', 'Indore', 'Not Applicable', '101777016291', 'bright', 'TAMILNAD MERCANTILE BANK LTD', '444100050301038', 'TMBL0000444', ' ABYPO1785H', '2024', 'november', '30', '29', '1', '16000', '15467', '8000', '7733', '0', '0', '200', '0', '0', '0', 'yes', '15000', '1740', 'no', '0', '0', '0', '23400', '1740', '21660', 'twenty one thousand six hundred sixty ', 0, 1, '2024-12-04 02:25:44', 0, NULL),
(163, '24/00163', 36, 'BEH 015', '2019-04-01', 'Prins Kumar', 'Asst Technician', 'Indore', 'Not Applicable', '101447716720', 'bright', 'BANK OF BARODA', '8820100034965', 'BARB0AMETHI', ' EXVPK4254G', '2024', 'november', '30', '0', '30', '22000', '0', '8000', '0', '0', '0', '200', '0', '0', '0', 'yes', '15000', '0', 'no', '0', '0', '0', '200', '0', '200', 'two hundred ', 0, 1, '2024-12-04 02:25:44', 0, NULL),
(164, '24/00164', 53, 'BEH 057', '2024-07-01', 'Pritam Chadar', 'Asst Technician', 'Tamil Nadu', 'Not Applicable', '102103548750', 'bright', '0', '0', '0', '0', '2024', 'november', '30', '25', '5', '16000', '13333', '8000', '6667', '1', '1067', '200', '0', '0', '0', 'yes', '15000', '1500', 'no', '0', '0', '0', '21267', '1500', '19767', 'nineteen thousand seven hundred sixty seven ', 0, 1, '2024-12-04 02:25:44', 0, NULL),
(165, '24/00165', 31, 'BEH 035', '2022-01-01', 'Pushpendra Umath', 'Driver', 'Indore', 'Not Applicable', '101431668668', 'bright', 'Punjab National Bank', '4622000400005702', 'PUNB0462200', ' AGQPU3058C', '2024', 'november', '30', '30', '0', '17000', '17000', '8000', '8000', '2', '2267', '200', '3000', '0', '2000', 'yes', '15000', '1800', 'no', '0', '0', '0', '32467', '1800', '30667', 'thirty thousand six hundred sixty seven ', 0, 1, '2024-12-04 02:25:44', 0, NULL),
(166, '24/00166', 46, 'BEH 054', '2024-01-01', 'Raj Kumar', 'Asst Technician', 'Tamil Nadu', 'Not Applicable', '101547069375', 'bright', 'INDIAN BANK', '6372735619', 'IDIB000L001', ' EPYPR4190M', '2024', 'november', '30', '25', '5', '14000', '11667', '8000', '6667', '0', '0', '200', '0', '0', '0', 'yes', '14000', '1400', 'no', '0', '0', '0', '18534', '1400', '17134', 'seventeen thousand one hundred thirty four ', 0, 1, '2024-12-04 02:25:44', 0, NULL),
(167, '24/00167', 44, 'BEH 049', '2023-09-01', 'Rajeshkumar R', 'Asst Technician', 'Tamil Nadu', '5135229884', '102002261595', 'bright', 'INDIAN BANK', '6365640261', 'IDIB000A024', ' FTCPR0859G', '2024', 'november', '30', '24', '6', '15000', '12000', '5000', '4000', '0.5', '500', '200', '3000', '5000', '2000', 'yes', '15000', '1440', 'yes', '200', '0', '0', '26700', '1640', '25060', 'twenty five thousand sixty ', 0, 1, '2024-12-04 02:25:44', 0, NULL),
(168, '24/00168', 42, 'BEH 040', '2024-07-01', 'Sadhitya Kumar ARK', 'Asst Technician', 'Maharashtra', '123', '123', 'bright', 'STATE BANK OF INDIA', '43097252344', 'SBIN0012601', 'FKPPA1774P', '2024', 'november', '30', '0', '30', '15000', '0', '5000', '0', '0', '0', '200', '0', '0', '0', 'yes', '15000', '0', 'yes', '2', '0', '0', '200', '2', '198', 'one hundred ninety eight ', 0, 1, '2024-12-04 02:25:44', 0, NULL),
(169, '24/00169', 22, 'GGCC 050', '2011-11-01', 'A. Ellavarasan', 'Driver', 'Tamil Nadu', 'Not Applicable', '100145028944', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '312100050301856', ' TMBL0000312', ' ACPPE2451A', '2024', 'november', '30', '19', '11', '23500', '14883', '10500', '6650', '0', '0', '200', '0', '0', '0', 'yes', '15000', '1140', 'no', '0', '5000', '0', '21733', '6140', '15593', 'fifteen thousand five hundred ninety three ', 0, 1, '2024-12-05 01:17:53', 0, NULL),
(170, '24/00170', 23, 'GGCC 082', '2015-09-01', 'A.Arulmani', 'Asst Technician', 'Tamil Nadu', 'Not Applicable', '100604454985', 'ggcc', 'Tamilnad Mercantile Bank', '210100050305252', 'TMBL0000210', ' BZMPA8855M', '2024', 'november', '30', '15', '15', '17000', '8500', '8000', '4000', '0.5', '567', '200', '0', '0', '0', 'yes', '15000', '900', 'no', '0', '0', '0', '13267', '900', '12367', 'twelve thousand three hundred sixty seven ', 0, 1, '2024-12-05 01:17:53', 0, NULL),
(171, '24/00171', 4, 'GGCC 132', '2022-06-07', 'Aaditya Kumar ARK', 'Driver', 'Indore', 'Not Applicable', '101322238657', 'ggcc', 'State Bank Of India', '20411611573', ' SBIN0012601', ' CHEPA9887L', '2024', 'november', '30', '30', '0', '17000', '17000', '8000', '8000', '1', '1133', '200', '0', '0', '0', 'yes', '15000', '1800', 'no', '0', '0', '0', '26333', '1800', '24533', 'twenty four thousand five hundred thirty three ', 0, 1, '2024-12-05 01:17:53', 0, NULL),
(172, '24/00172', 5, 'GGCC 086', '2023-01-01', 'Ajay Yadav', 'Asst Technician', 'Indore', 'Not Applicable', '100650291060', 'ggcc', 'Tamilnad Mercantile Bank Ltd', '444149589239680', ' TMBL0000444', ' ANPPY8836N', '2024', 'november', '30', '30', '0', '17000', '17000', '8000', '8000', '0', '0', '200', '0', '0', '0', 'yes', '15000', '1800', 'no', '0', '0', '0', '25200', '1800', '23400', 'twenty three thousand four hundred ', 0, 1, '2024-12-05 01:17:53', 0, NULL),
(173, '24/00173', 48, 'GGCC 133', '2022-06-01', 'Awadhesh Rajbhar', 'Asst Technician', 'Indore', 'Not Applicable', '101190146261', 'ggcc', 'STATE BANK OF INDIA', '32377833957', ' SBIN0002537', ' DKXPR1457N', '2024', 'november', '30', '28', '2', '19000', '17733', '8000', '7467', '0', '0', '200', '0', '0', '0', 'yes', '15000', '1680', 'no', '0', '0', '0', '25400', '1680', '23720', 'twenty three thousand seven hundred twenty ', 0, 1, '2024-12-05 01:17:53', 0, NULL),
(174, '24/00174', 11, 'GGCC 034', '2008-12-01', 'Bapu Parshuram Shirodkar', 'Technician', 'Indore', 'Not Applicable', '100107951357', 'ggcc', 'Tamilnad Mercantile Bank Ltd', '218100050300351', ' TMBL0000218', ' BMYPS78448', '2024', 'november', '30', '29', '1', '25000', '24167', '8000', '7733', '0', '0', '200', '3000', '0', '2000', 'yes', '15000', '1740', 'no', '0', '0', '0', '37100', '1740', '35360', 'thirty five thousand three hundred sixty ', 0, 1, '2024-12-05 01:17:53', 0, NULL),
(175, '24/00175', 8, 'GGCC 105', '2019-04-01', 'Deepak Kumar Mouriya', 'Asst Technician', 'Indore', 'Not Applicable', '101446396581', 'ggcc', 'UCO BANK', '24240110085288', ' UCBA00002424', ' DIRPM20225', '2024', 'november', '30', '19', '11', '15000', '9500', '8000', '5067', '1.5', '1500', '200', '0', '0', '0', 'yes', '15000', '1140', 'no', '0', '0', '0', '16267', '1140', '15127', 'fifteen thousand one hundred twenty seven ', 0, 1, '2024-12-05 01:17:53', 0, NULL),
(176, '24/00176', 55, 'GGCC 007', '2005-11-01', 'Devasahaya Ravi', 'Manager', 'Tamil Nadu', 'Not Applicable', '100133880659', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '218109930555886', 'TMBL0000218', 'AODPA8868D', '2024', 'november', '30', '30', '0', '35000', '35000', '25000', '25000', '0', '0', '200', '3000', '0', '2000', 'yes', '35000', '4200', 'no', '0', '0', '0', '65200', '4200', '61000', 'sixty one thousand', 0, 1, '2024-12-05 01:17:53', 0, NULL),
(177, '24/00177', 20, 'GGCC 068', '2013-01-01', 'G Joseph Margasis', 'Technician', 'Tamil Nadu', 'Not Applicable', '100147893430', 'ggcc', 'Tamilnad Mercantile Bank Ltd', '058109790033091', ' TMBL0000058', ' BAEPJ5184P', '2024', 'november', '30', '30', '0', '23500', '23500', '10500', '10500', '0.5', '783', '200', '3000', '0', '2000', 'yes', '15000', '1800', 'no', '0', '0', '0', '39983', '1800', '38183', 'thirty eight thousand one hundred eighty three ', 0, 1, '2024-12-05 01:17:53', 0, NULL),
(178, '24/00178', 54, 'GGCC 119', '2020-03-02', 'Guddu Rajbhar', 'Asst Technician', 'Indore', 'Not Applicable', '101572420729', 'ggcc', 'STATE BANK OF INDIA', '32356886132', ' SBIN0002537', ' CYTPR1937E', '2024', 'november', '30', '29', '1', '16000', '15467', '8000', '7733', '1', '1067', '200', '0', '0', '0', 'yes', '15000', '1740', 'no', '0', '0', '0', '24467', '1740', '22727', 'twenty two thousand seven hundred twenty seven ', 0, 1, '2024-12-05 01:17:53', 0, NULL),
(179, '24/00179', 24, 'GGCC 067', '2013-01-01', 'J.Charles', 'Asst Technician', 'Tamil Nadu', 'Not Applicable', '100169001751', 'ggcc', 'Tamilnad Mercantile Bank Ltd', '210100050304937', ' TMBL0000490', ' BGZPC3722M', '2024', 'november', '30', '29', '1', '23000', '22233', '8000', '7733', '0', '0', '200', '3000', '0', '2000', 'yes', '15000', '1740', 'no', '0', '0', '0', '35166', '1740', '33426', 'thirty three thousand four hundred twenty six ', 0, 1, '2024-12-05 01:17:53', 0, NULL),
(180, '24/00180', 21, 'GGCC 116', '2019-12-01', 'Karthik K', 'Asst Technician', 'Tamil Nadu', 'Not Applicable', '100190477301', 'ggcc', 'State Bank Of India', '33798843970', ' SBIN0006239', ' DPQPK1078Q', '2024', 'november', '30', '23', '7', '20000', '15333', '9000', '6900', '0.5', '667', '200', '0', '0', '0', 'yes', '15000', '1380', 'no', '0', '0', '0', '23100', '1380', '21720', 'twenty one thousand seven hundred twenty ', 0, 1, '2024-12-05 01:17:53', 0, NULL),
(181, '24/00181', 18, 'GGCC 122', '2021-08-02', 'Kishor Selvam', 'Asst Technician', 'Tamil Nadu', 'Not Applicable', '101722099112', 'ggcc', 'Indian Overseas Bank', '171201000031488', ' IOBA 0001712', ' HZYPK1119N', '2024', 'november', '30', '25', '5', '15000', '12500', '8000', '6667', '0', '0', '200', '3000', '0', '2000', 'yes', '15000', '1500', 'no', '0', '0', '0', '24367', '1500', '22867', 'twenty two thousand eight hundred sixty seven ', 0, 1, '2024-12-05 01:17:53', 0, NULL),
(182, '24/00182', 19, 'GGCC 140', '2023-05-08', 'Lenin Fernondo', 'Asst Technician', 'Tamil Nadu', '3416244216', '101821078985', 'ggcc', 'Indian Overseas Bank', '109401000011515', ' IDBA0001094', ' BKGPL9746K', '2024', 'november', '30', '25', '5', '14000', '11667', '8000', '6667', '0', '0', '200', '0', '0', '0', 'yes', '13000', '1300', 'yes', '139', '0', '0', '18534', '1439', '17095', 'seventeen thousand ninety five ', 0, 1, '2024-12-05 01:17:53', 0, NULL),
(183, '24/00183', 56, 'GGCC 134', '2022-06-01', 'MD Irfan', 'Asst Technician', 'Indore', '3123896384', '101563463746', 'ggcc', 'STATE BANK OF INDIA', '40253671697', 'SBIN0017454', 'XYZ', '2024', 'november', '30', '30', '0', '13000', '13000', '2000', '2000', '1', '867', '200', '3000', '8000', '2000', 'yes', '13000', '1560', 'yes', '218', '5000', '0', '29067', '6778', '22289', 'twenty two thousand two hundred eighty nine ', 0, 1, '2024-12-05 01:17:53', 0, NULL),
(184, '24/00184', 3, 'GGCC 102', '2019-02-01', 'Nadar Bhuvana Shekar', 'Accountant', 'Mumbai', 'Not Applicable', '101420903254', 'ggcc', 'TMBL', '218100720600445', 'TMBL0000218', 'FGMPS4413N', '2024', 'november', '30', '25', '5', '16000', '13333', '6000', '5000', '0', '0', '200', '0', '3000', '0', 'yes', '16000', '1600', 'no', '0', '0', '0', '21533', '1600', '19933', 'nineteen thousand nine hundred thirty three ', 0, 1, '2024-12-05 01:17:53', 0, NULL),
(185, '24/00185', 50, 'GGCC 044', '2010-11-01', 'Nilesh G Savratkar', 'Technician', 'Mumbai', 'Not Applicable', '100255467057', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '2181007206600099', 'TMBL0000218', 'AYBPS1577P', '2024', 'november', '30', '29', '1', '21000', '20300', '8000', '7733', '0', '0', '200', '0', '0', '0', 'yes', '15000', '1740', 'no', '0', '0', '200', '28233', '1940', '26293', 'twenty six thousand two hundred ninety three ', 0, 1, '2024-12-05 01:17:53', 0, NULL),
(186, '24/00186', 17, 'GGCC 099', '2018-04-01', 'P Muthu Kumar', 'Driver', 'Tamil Nadu', 'Not Applicable', '101286700652', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '248100050305253', ' TMBL0000248', ' CIAPM8773J', '2024', 'november', '30', '30', '0', '22000', '22000', '8000', '8000', '0.5', '733', '200', '0', '0', '0', 'yes', '15000', '1800', 'no', '0', '0', '0', '30933', '1800', '29133', 'twenty nine thousand one hundred thirty three ', 0, 1, '2024-12-05 01:17:53', 0, NULL),
(187, '24/00187', 51, 'GGCC 091', '2016-09-01', 'P. Arumugakani Raja', 'Asst Technician', 'Tamil Nadu', 'Not Applicable', '100923175836', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '409100050302857', ' TMBL0000409', ' CHUPA7102E', '2024', 'november', '30', '30', '0', '20000', '20000', '8000', '8000', '1', '1333', '200', '3000', '0', '2000', 'yes', '15000', '1800', 'no', '0', '0', '0', '34533', '1800', '32733', 'thirty two thousand seven hundred thirty three ', 0, 1, '2024-12-05 01:17:53', 0, NULL),
(188, '24/00188', 6, 'GGCC 084', '2015-12-01', 'P.Allwin', 'Supervisor', 'Indore', 'Not Applicable', '100649963586', 'ggcc', 'Tamilnad Mercantile Bank Ltd', '218100720600073', ' TMBL0000218', ' ABMPA0285G', '2024', 'november', '30', '30', '0', '25000', '25000', '20000', '20000', '0', '0', '200', '0', '0', '0', 'yes', '25000', '3000', 'no', '0', '0', '0', '45200', '3000', '42200', 'forty two thousand two hundred ', 0, 1, '2024-12-05 01:17:53', 0, NULL),
(189, '24/00189', 7, 'GGCC 094', '2017-07-01', 'Prabhudayal Patel', 'Asst Technician', 'Indore', 'Not Applicable', '101132615953', 'ggcc', 'Tamilnad Mercantile Bank Ltd', '444100050300412', ' TMBL0000444', ' CMVPP2248E', '2024', 'november', '30', '30', '0', '20000', '20000', '8000', '8000', '4.5', '6000', '200', '3000', '0', '2000', 'yes', '15000', '1800', 'no', '0', '0', '0', '39200', '1800', '37400', 'thirty seven thousand four hundred ', 0, 1, '2024-12-05 01:17:53', 0, NULL),
(190, '24/00190', 10, 'GGCC 002', '2005-11-01', 'Praful Thandel', 'Technician', 'Indore', 'Not Applicable', '100275120870', 'ggcc', 'Tamilnad Mercantile Bank Ltd', '218100050300730', ' TMBL0000218', ' AHRPT7799K', '2024', 'november', '30', '13', '17', '20000', '8667', '8000', '3467', '0', '0', '200', '0', '0', '0', 'yes', '15000', '780', 'no', '0', '5000', '0', '12334', '5780', '6554', 'six thousand five hundred fifty four ', 0, 1, '2024-12-05 01:17:53', 0, NULL),
(191, '24/00191', 16, 'GGCC 046', '2011-01-01', 'Pramod Dhaku Mungekar', 'Asst Technician', 'Mumbai', 'Not Applicable', '100276584252', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '218100050301639', 'TMBL0000218', 'AXPPM5363C', '2024', 'november', '30', '23', '7', '19000', '14567', '8000', '6133', '0', '0', '0', '0', '0', '0', 'yes', '15000', '1380', 'no', '0', '10000', '0', '20700', '11380', '9320', 'nine thousand three hundred twenty ', 0, 1, '2024-12-05 01:17:53', 0, NULL),
(192, '24/00192', 13, 'GGCC 093', '2023-01-01', 'Raghunath S Parida', 'Asst Technician', 'Mumbai', 'Not Applicable', '100290525018', 'ggcc', 'Tamilnad Mercantile Bank Ltd', '218100050300342', 'TMBL0000218', 'abc', '2024', 'november', '30', '30', '0', '23000', '23000', '10000', '10000', '1', '1533', '200', '3000', '0', '2000', 'yes', '15000', '1800', 'no', '0', '0', '0', '39733', '1800', '37933', 'thirty seven thousand nine hundred thirty three ', 0, 1, '2024-12-05 01:17:53', 0, NULL),
(193, '24/00193', 49, 'BEH 086', '2023-07-14', 'Ram Khelavan Verma', 'Asst Technician', 'Indore', 'Not Applicable', '9580616025', 'ggcc', 'STATE BANK OF INDIA', '37140174188', ' SBIN0011331', ' CYKPK4094E', '2024', 'november', '30', '30', '0', '15000', '15000', '8000', '8000', '0', '0', '200', '0', '0', '0', 'yes', '15000', '1800', 'no', '0', '0', '0', '23200', '1800', '21400', 'twenty one thousand four hundred ', 0, 1, '2024-12-05 01:17:53', 0, NULL),
(194, '24/00194', 9, 'GGCC 135', '2023-01-01', 'Ramashankar Prasad', 'Asst Technician', 'Indore', 'Not Applicable', '101914491001', 'ggcc', 'Punjab National Bank', '2400000100213458', 'abc', 'abc', '2024', 'november', '30', '30', '0', '25000', '25000', '8000', '8000', '0', '0', '200', '0', '0', '0', 'yes', '15000', '1800', 'no', '0', '00', '0', '33200', '1800', '31400', 'thirty one thousand four hundred ', 0, 1, '2024-12-05 01:17:53', 0, NULL),
(195, '24/00195', 14, 'GGCC 037', '2009-05-01', 'Ranjeet Singh Nanade', 'Technician', 'Mumbai', 'Not Applicable', '100307924904', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '218100050300394', 'TMBL0000218', 'BYDPN5255N', '2024', 'november', '30', '29', '1', '21000', '20300', '8000', '7733', '1', '1400', '200', '0', '0', '0', 'yes', '15000', '1740', 'no', '0', '7500', '200', '29633', '9440', '20193', 'twenty thousand one hundred ninety three ', 0, 1, '2024-12-05 01:17:53', 0, NULL),
(196, '24/00196', 52, 'GGCC 104', '2019-04-01', 'Santosh Kumar', 'Driver', 'Indore', 'Not Applicable', '101446403273', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '218100050302610', 'TMBL0000218', '123', '2024', 'november', '30', '30', '0', '19000', '19000', '8000', '8000', '0', '0', '200', '0', '0', '0', 'yes', '15000', '1800', 'no', '0', '0', '0', '27200', '1800', '25400', 'twenty five thousand four hundred ', 0, 1, '2024-12-05 01:17:53', 0, NULL),
(197, '24/00197', 41, 'GGCC 114', '2019-12-01', 'Tabrej Alam', 'Asst Technician', 'Mumbai', 'Not Applicable', '101547056712', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '218149987552984', 'TMBL0000218', 'CUCPA1348D', '2024', 'november', '30', '28', '2', '15000', '14000', '2000', '1867', '1', '1000', '200', '2000', '0', '0', 'yes', '15000', '1680', 'yes', '143', '5000', '200', '19067', '7023', '12044', 'twelve thousand forty four ', 0, 1, '2024-12-05 01:17:53', 0, NULL),
(198, '24/00198', 12, 'GGCC 040', '2010-05-24', 'Vaibhav Vinayak Nadkarni', 'Asst Technician', 'Mumbai', 'Not Applicable', '100399345214', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '218100720600103', 'TMBL0000218', 'AJEPN9298A', '2024', 'november', '30', '30', '0', '23000', '23000', '8000', '8000', '2', '3067', '200', '3000', '0', '2000', 'yes', '15000', '1800', 'no', '0', '0', '0', '39267', '1800', '37467', 'thirty seven thousand four hundred sixty seven ', 0, 1, '2024-12-05 01:17:53', 0, NULL),
(200, '24/00200', 59, 'BEH 045', '2023-04-01', 'Md Amanullah', 'Asst Technician', 'Mumbai', '1817466231', '101716821296', 'bright', 'CENTRAL BANK OF INDIA', '3834574103', 'CBIN0282514', 'XYZ', '2024', 'november', '30', '28', '2', '15000', '14000', '6000', '5600', '0', '0', '200', '0', '0', '0', 'yes', '15000', '1680', 'yes', '149', '0', '200', '19800', '2029', '17771', 'seventeen thousand seven hundred seventy one ', 0, 1, '2024-12-05 04:33:15', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_performance`
--

CREATE TABLE `employee_performance` (
  `id` int NOT NULL,
  `year` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `employee_id` int NOT NULL,
  `rating` varchar(250) NOT NULL,
  `remarks` longtext NOT NULL,
  `created_at` int NOT NULL,
  `created_by` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` int NOT NULL,
  `updated_by` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_performance`
--

INSERT INTO `employee_performance` (`id`, `year`, `date`, `employee_id`, `rating`, `remarks`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, '2024', '2024-09-19', 14, 'Poor', 'NOT INFORMED', 2024, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(2, '2024', '2024-09-20', 5, 'Bad', 'SCRAB', 2024, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(3, '2024', '2024-09-25', 11, 'Poor', 'SAZGON CABLE LAYING NOT INFORMED TO INCHARGE', 2024, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(4, '2024', '2024-10-01', 6, 'Poor', 'NO INFORM', 2024, '2024-10-03 12:53:39', 2024, '0000-00-00 00:00:00'),
(5, '2024', '2024-10-02', 6, 'Poor', 'NO INFORM', 2024, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(6, '2024', '2024-09-30', 6, 'Poor', 'NO INFORM', 2024, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(7, '2024', '2024-12-06', 8, 'Poor', 'NOT joined duty on time 5-12-2024', 2024, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(8, '2024', '2024-12-09', 6, 'Bad', 'NO PHONE CALL', 2024, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(9, '2024', '2024-12-10', 6, 'Poor', 'NO PHONE CALL', 2024, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee_transfer`
--

CREATE TABLE `employee_transfer` (
  `id` int NOT NULL,
  `date` date NOT NULL,
  `employee_name` int NOT NULL,
  `from_branch` int NOT NULL,
  `to_branch` int NOT NULL,
  `remarks` text COLLATE utf8mb4_general_ci NOT NULL,
  `return_date` date NOT NULL,
  `day_count` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `delete_status` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_transfer`
--

INSERT INTO `employee_transfer` (`id`, `date`, `employee_name`, `from_branch`, `to_branch`, `remarks`, `return_date`, `day_count`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '2024-12-27', 24, 8, 13, '', '0000-00-00', '', 0, 1, '2024-12-26 03:13:16', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `estimation_bill`
--

CREATE TABLE `estimation_bill` (
  `id` int NOT NULL,
  `sno` varchar(50) NOT NULL,
  `branch_id` int NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `po_id` int NOT NULL,
  `estimation_date` date NOT NULL,
  `estimation_number` varchar(100) NOT NULL,
  `job_report` text,
  `gst_amount` varchar(50) NOT NULL,
  `estimation_amount` varchar(100) NOT NULL,
  `taxinvoice_date` date DEFAULT NULL,
  `callup_number` varchar(50) DEFAULT NULL,
  `taxinvoice_number` varchar(100) DEFAULT NULL,
  `net_amount` varchar(50) NOT NULL,
  `taxinvoice_amount` varchar(100) NOT NULL,
  `taxinvoice_doc` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `po_status` varchar(50) NOT NULL,
  `delete_status` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estimation_bill`
--

INSERT INTO `estimation_bill` (`id`, `sno`, `branch_id`, `company_name`, `po_id`, `estimation_date`, `estimation_number`, `job_report`, `gst_amount`, `estimation_amount`, `taxinvoice_date`, `callup_number`, `taxinvoice_number`, `net_amount`, `taxinvoice_amount`, `taxinvoice_doc`, `status`, `po_status`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '24/00001', 7, 'ggcc', 3, '2024-10-07', '08/TN/24-25/TRY', './uploads/job_report/08_hpcl_-_various_outlets_earthpit_testing_-_trichy_ro241130102557.xls', '', '195058.72', '2024-10-11', '5400167467', '44/TN/24-25/TRY', '195058.72 ', '195058.72', './uploads/invoice_doc/44hpcl_-_various_outlets_earthpit_testing_-_trichy_roest8241130102656.pdf', 'retention', 'ongoing', 1, 1, '2024-11-30 04:55:57', 0, '0000-00-00 00:00:00'),
(2, '24/00002', 7, 'ggcc', 6, '2024-10-07', '08/TN/24-25/TRY', './uploads/job_report/08_hpcl_-_various_outlets_earthpit_testing_-_trichy_ro241219064707.xls', '', '195058.72', '2024-10-11', '5400167467', '44/TN/24-25/TRY', '165304', '195058.72', './uploads/invoice_doc/44hpcl_-_various_outlets_earthpit_testing_-_trichy_roest8241219064813.pdf', 'retention', 'ongoing', 0, 1, '2024-12-19 01:17:07', 0, '0000-00-00 00:00:00'),
(3, '24/00003', 3, 'ggcc', 7, '2024-09-25', ' 24/M/VAS/24-25', './uploads/job_report/24hpcl_-_autocarecentresajgoan_-_vashi_ro241221092816.xls', '', '256497.31', '2024-10-14', '5400166924', '35/M/VAS/24-25', '37028.69 ', '43693.85 ', '', 'retention', 'ongoing', 0, 1, '2024-12-21 03:58:16', 0, '0000-00-00 00:00:00'),
(4, '24/00004', 7, 'bright', 8, '2024-10-05', '02/TN/24-25/TRY', './uploads/job_report/02_hpcl_-_various_outlets_panel_board_dressing_work_-_trichy_rosalebill73mh241223065042.xls', '', '353952.11', '2024-10-14', '5400167459', '73/TN/24-25/TRY', '299959.42', '353952.11', './uploads/invoice_doc/73hpcl_-_various_outlets_panel_board_dressing_work_-_trichy_ro241223065204.pdf', 'retention', 'ongoing', 0, 3, '2024-12-23 01:20:42', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `file_manage`
--

CREATE TABLE `file_manage` (
  `id` int NOT NULL,
  `file_name` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `file_url` text COLLATE utf8mb4_general_ci NOT NULL,
  `file_doc` text COLLATE utf8mb4_general_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_general_ci NOT NULL,
  `delete_status` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `file_manage`
--

INSERT INTO `file_manage` (`id`, `file_name`, `file_url`, `file_doc`, `remarks`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'GGCC Login Detail', 'https://docs.google.com/spreadsheets/d/1cQsvm2aCSVSBv-YlH4KYIp-tayhCEcDIyVWQKjR1pmU/edit?usp=sharing', '', '', 0, 1, '2024-12-28 13:43:28', 1, '2024-12-28 13:43:28');

-- --------------------------------------------------------

--
-- Table structure for table `login_permission`
--

CREATE TABLE `login_permission` (
  `id` int NOT NULL,
  `employee_id` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `login_code` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `mobile_number` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` text COLLATE utf8mb4_general_ci NOT NULL,
  `permission` text COLLATE utf8mb4_general_ci NOT NULL,
  `is_admin` int NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_general_ci NOT NULL,
  `delete_status` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_permission`
--

INSERT INTO `login_permission` (`id`, `employee_id`, `token`, `login_code`, `name`, `mobile_number`, `password`, `permission`, `is_admin`, `status`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '1', 'admin', 'admin', 'admin', '1234567890', '81dc9bdb52d04dc20036dbd8313ed055', '[\"admin\"]', 1, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(2, '2', 'ggcc-001', 'GGCC 001', 'Rajan', '9920667756', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 1, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(3, '3', 'ggcc-102', 'GGCC 102', 'Nadar Bhuvana Shekar', '7506455521', '202cb962ac59075b964b07152d234b70', '[\"employee\",\"complaint_management\",\"purchase_management\",\"partypayment_management\",\"employee_management\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 1, '2024-12-06 05:08:12'),
(4, '4', 'ggcc-132', 'GGCC 132', 'Aaditya Kumar ARK', '8797264700', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 1, '2024-12-06 05:07:06'),
(5, '5', 'ggcc-086', 'GGCC 086', 'Ajay Yadav', '9589239680', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 1, '2024-12-06 05:07:25'),
(6, '6', 'ggcc-084', 'GGCC 084', 'P.Allwin', '9713450011', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 1, '2024-12-06 05:07:37'),
(7, '7', 'ggcc-094', 'GGCC 094', 'Prabhudayal Patel', '8269532621', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(8, '8', 'ggcc-105', 'GGCC 105', 'Deepak Kumar Mouriya', '6280321565', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(9, '9', 'ggcc-135', 'GGCC 135', 'Ramashankar Prasad', '7887920107', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 1, '2024-12-05 08:08:59'),
(10, '10', 'ggcc-002', 'GGCC 002', 'Praful Thandel', '9892557049', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(11, '11', 'ggcc-034', 'GGCC 034', 'Bapu Parshuram Shirodkar', '9930552955', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(12, '12', 'ggcc-040', 'GGCC 040', 'Vaibhav Vinayak Nadkarni', '898208218', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(13, '13', 'ggcc-093', 'GGCC 093', 'Raghunath S Parida', '7769962846', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 1, '2024-12-05 08:15:24'),
(14, '14', 'ggcc-037', 'GGCC 037', 'Ranjeet Singh Nanade', '9834993588', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(15, '15', 'ggcc-043', 'GGCC 043', 'Nilesh G Savratkar', '123', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 1, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(16, '16', 'ggcc-046', 'GGCC 046', 'Pramod Dhaku Mungekar', '9768671114', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(17, '17', 'ggcc-099', 'GGCC 099', 'P Muthu Kumar', '9345335433', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(18, '18', 'ggcc-122', 'GGCC 122', 'Kishor Selvam', '8939108991', '202cb962ac59075b964b07152d234b70', '[\"employee\",\"complaint_management\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 1, '2024-12-04 08:33:08'),
(19, '19', 'ggcc-140', 'GGCC 140', 'Lenin Fernondo', '8526007539', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 1, '2024-12-02 08:10:48'),
(20, '20', 'ggcc-068', 'GGCC 068', 'G Joseph Margasis', '9790033091', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(21, '21', 'ggcc-116', 'GGCC 116', 'Karthik K', '9500323408', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(22, '22', 'ggcc-050', 'GGCC 050', 'A. Ellavarasan', '9003179883', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 1, '2024-12-10 16:33:10'),
(23, '23', 'ggcc-082', 'GGCC 082', 'A.Arulmani', '9626287278', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(24, '24', 'ggcc-067', 'GGCC 067', 'J.Charles', '8098742317', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(25, '25', 'beh-003', 'BEH 003', 'Chand Basha Basheer Gulam', '9082577305', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 1, '2024-12-07 09:41:35'),
(26, '26', 'beh-008', 'BEH 008', 'Munna Kumar Singh', '7738542303', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 1, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(27, '27', 'beh-014', 'BEH 014', 'Prins Kumar', '7071341008', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 1, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(28, '28', 'beh-031', 'BEH 031', 'Arvind', '7081607476', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(29, '29', 'beh-033', 'BEH 033', 'Nitesh Gurjar', '8827672424', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(30, '30', 'beh-034', 'BEH 034', 'Omprakash', '9644137920', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(31, '31', 'beh-035', 'BEH 035', 'Pushpendra Umath', '9074125307', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(32, '32', 'beh-039', 'BEH 039', 'Ghanshyam', '9892698550', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(33, '33', 'beh-043', 'BEH 043', 'Dheraj', '9621725806', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(34, '34', 'beh-046', 'BEH 046', 'Gaurav Yadav', '9329037015', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 1, '2024-12-04 07:47:50'),
(35, '35', 'beh-007', 'BEH 007', 'Munna Kumar Singh', '7738542303', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(36, '36', 'beh-015', 'BEH 015', 'Prins Kumar', '7071341008', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(37, '37', 'beh-009', 'BEH 009', 'C Anbujothi', '9159499134', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(38, '38', 'beh-012', 'BEH 012', 'Jwala Singh', '9135934141', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(39, '39', 'beh-024', 'BEH 024', 'Elangovan A', '9600332995', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 1, '2024-12-04 07:47:01'),
(40, '40', 'beh-036', 'BEH 036', 'Appuvelangkanni C', '9363174843', '202cb962ac59075b964b07152d234b70', '[\"employee\",\"complaint_management\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 1, '2024-12-04 08:32:01'),
(41, '41', 'ggcc-114', 'GGCC 114', 'Tabrej Alam', '8355857114', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(42, '42', 'beh-040', 'BEH 040', 'Sadhitya Kumar Ark', '9934658506', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(43, '43', 'beh-041', 'BEH 041', 'Amaladas C', '8939253308', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(44, '44', 'beh-049', 'BEH 049', 'Rajeshkumar R', '9597138898', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 1, '2024-12-06 05:11:57'),
(45, '45', 'beh-052', 'BEH 052', 'Mathura Nayagam Athisayam', '9833804577', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 1, '2024-12-04 07:47:33'),
(46, '46', 'beh-054', 'BEH 054', 'Raj Kumar ', '6381190197', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(47, '47', 'beh-058', 'BEH 070', 'Amin Kumar', '7544953204', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 1, '2024-12-02 05:22:23'),
(48, '48', 'ggcc-133', 'GGCC 133', 'Awadhesh Rajbhar', '8765741326', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(49, '49', 'beh-086', 'BEH 086', 'Ram Khelavan Verma', '9580616025', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(50, '50', 'ggcc-044', 'GGCC 044', 'Nilesh G Savratkar', '8652007366', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(51, '51', 'ggcc-091', 'GGCC 091', 'P. Arumugakani Raja', '7708134829', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(52, '52', 'ggcc-104', 'GGCC 104', 'Santosh Kumar', '9561676004', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(53, '53', 'beh-057', 'BEH 057', 'Pritam Chadar', '123', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(54, '54', 'ggcc-119', 'GGCC 119', 'Guddu Rajbhar', '9167704907', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(55, '55', 'ggcc-007', 'GGCC 007', 'Devasahaya Ravi', '9930555886', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 0, '0000-00-00 00:00:00'),
(56, '56', 'ggcc-134', 'GGCC 134', 'MD Irfan', '7654104841', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 1, '2024-12-02 08:12:27'),
(57, '57', 'ggcc-087', 'GGCC 087', 'Uday Sakharam Mungekar', '9076340727', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'inactive', 0, 1, '2024-11-22 19:56:04', 1, '2024-12-02 08:11:38'),
(58, '58', 'beh-001', 'BEH 001', 'Kishor Rajaram Parte', '9820277166', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 1, '2024-12-05 08:13:08'),
(59, '59', 'beh-045', 'BEH 045', 'Md Amanullah', '8928291951', '202cb962ac59075b964b07152d234b70', '[\"employee\"]', 0, 'active', 0, 1, '2024-11-22 19:56:04', 1, '2024-12-04 07:46:42'),
(60, '', '12345', '12345', 'MURUGESH', '8097738898', '202cb962ac59075b964b07152d234b70', '[\"vehicle_management\",\"stock_management\"]', 0, 'active', 0, 1, '2024-11-29 07:46:26', 0, '0000-00-00 00:00:00'),
(61, '60', 'beh-00058', 'BEH 0058', 'AJAY SITARAM KHEDEKAR', '9167398109', '202cb962ac59075b964b07152d234b70', '[\"employee\",\"complaint_management\",\"stock_management\"]', 0, 'active', 0, 1, '2024-12-02 05:19:59', 1, '2024-12-06 12:04:22');

-- --------------------------------------------------------

--
-- Table structure for table `master_branch`
--

CREATE TABLE `master_branch` (
  `id` int NOT NULL,
  `sno` varchar(100) NOT NULL,
  `token` varchar(250) NOT NULL,
  `zone` varchar(100) NOT NULL,
  `branch` varchar(250) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `delete_status` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_branch`
--

INSERT INTO `master_branch` (`id`, `sno`, `token`, `zone`, `branch`, `status`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '24/00001', 'indore', 'indore', 'Indore', 'active', 0, 1, '2024-11-08 09:48:34', 1, '2024-11-08 09:48:34'),
(2, '24/00002', 'bhopal', 'indore', 'Bhopal', 'active', 0, 1, '2024-11-08 09:46:30', 1, '2024-11-08 09:46:30'),
(3, '24/00003', 'vashi', 'mumbai', 'Vashi', 'active', 0, 1, '2024-11-08 09:49:52', 1, '2024-11-08 09:49:52'),
(4, '24/00004', 'solapur', 'mumbai', 'Solapur', 'active', 0, 1, '2024-11-10 13:28:52', 1, '2024-11-10 13:28:52'),
(5, '24/00005', 'gwalior', 'indore', 'Gwalior', 'active', 0, 1, '2024-11-08 09:48:24', 1, '2024-11-08 09:48:24'),
(6, '24/00006', 'chennai', 'chennai', 'Chennai', 'active', 0, 1, '2024-11-08 09:47:49', 1, '2024-11-08 09:47:49'),
(7, '24/00007', 'trichy', 'chennai', 'Trichy', 'active', 0, 1, '2024-11-08 09:49:43', 1, '2024-11-08 09:49:43'),
(8, '24/00008', 'madurai', 'chennai', 'Madurai', 'active', 0, 1, '2024-11-08 09:48:44', 1, '2024-11-08 09:48:44'),
(9, '24/00009', 'coimbatore', 'chennai', 'Coimbatore', 'active', 0, 1, '2024-11-08 09:48:13', 1, '2024-11-08 09:48:13'),
(10, '24/00010', 'cochin', 'chennai', 'Cochin', 'active', 0, 1, '2024-11-08 09:47:58', 1, '2024-11-08 09:47:58'),
(11, '24/00011', 'baroda', 'mumbai', 'Baroda', 'active', 0, 1, '2024-11-08 09:46:04', 1, '2024-11-08 09:46:04'),
(12, '24/00012', 'nashik', 'mumbai', 'Nashik', 'active', 0, 1, '2024-11-08 09:49:21', 1, '2024-11-08 09:49:21'),
(13, '24/00013', 'mumbai', 'mumbai', 'Mumbai', 'active', 0, 1, '2024-11-08 09:49:11', 1, '2024-11-08 09:49:11');

-- --------------------------------------------------------

--
-- Table structure for table `master_designation`
--

CREATE TABLE `master_designation` (
  `id` int NOT NULL,
  `sno` varchar(100) NOT NULL,
  `token` varchar(250) NOT NULL,
  `designation` varchar(250) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `delete_status` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_designation`
--

INSERT INTO `master_designation` (`id`, `sno`, `token`, `designation`, `status`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '24/00001', 'manager', 'Manager', 'active', 0, 1, '2024-07-11 07:24:16', 0, NULL),
(2, '24/00002', 'technician', 'Technician', 'active', 0, 1, '2024-09-13 13:19:59', 1, '2024-09-13 13:19:59'),
(3, '24/00003', 'driver', 'Driver', 'active', 0, 1, '2024-07-11 10:53:46', 0, NULL),
(4, '24/00004', 'accountant', 'Accountant', 'active', 0, 1, '2024-07-11 10:53:59', 0, NULL),
(5, '24/00005', 'supervisor', 'Supervisor', 'active', 0, 1, '2024-07-11 10:54:20', 0, NULL),
(6, '24/00006', 'asst-technician', 'Asst Technician', 'active', 0, 1, '2024-07-14 00:06:41', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_gst`
--

CREATE TABLE `master_gst` (
  `id` int NOT NULL,
  `sno` varchar(100) NOT NULL,
  `token` varchar(250) NOT NULL,
  `gst_number` varchar(250) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `delete_status` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_gst`
--

INSERT INTO `master_gst` (`id`, `sno`, `token`, `gst_number`, `status`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '24/00001', '27admpg4943rizs', '27ADMPG4943RIZS', 'active', 1, 1, '2024-07-11 07:56:17', 0, NULL),
(2, '24/00002', '33abmpn9959n1zm', '33ABMPN9959N1ZM', 'active', 0, 1, '2024-07-11 02:04:04', 0, NULL),
(3, '24/00003', '27abmpn9959n1zf', '27ABMPN9959N1ZF', 'active', 0, 1, '2024-07-11 02:26:02', 0, NULL),
(4, '24/00004', '23abmpn9959n1zn', '23ABMPN9959N1ZN', 'active', 0, 1, '2024-09-05 20:45:50', 0, NULL),
(5, '24/00005', '27admpg4943r1zs', '27ADMPG4943R1ZS', 'active', 0, 1, '2024-09-05 20:46:14', 0, NULL),
(6, '24/00006', '33admpg4943r1zz', '33ADMPG4943R1ZZ', 'active', 0, 1, '2024-09-05 20:48:36', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_incharge`
--

CREATE TABLE `master_incharge` (
  `id` int NOT NULL,
  `sno` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `zone` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `branch` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `employee` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'active',
  `delete_status` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_incharge`
--

INSERT INTO `master_incharge` (`id`, `sno`, `zone`, `branch`, `employee`, `status`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '24/00001', 'mumbai', '4', '13', 'active', 0, 1, '2024-11-29 08:18:29', 1, '2024-11-29 08:18:29'),
(2, '24/00002', 'chennai', '8', '24', 'active', 0, 1, '2024-11-10 08:08:15', 1, '2024-11-10 13:38:15'),
(3, '24/00003', 'chennai', '9', '20', 'active', 0, 1, '2024-11-10 08:09:05', 1, '2024-11-10 13:39:05'),
(4, '24/00004', 'chennai', '10', '51', 'active', 0, 1, '2024-11-10 08:08:41', 1, '2024-11-10 13:38:41'),
(5, '24/00005', 'chennai', '7', '37', 'active', 0, 1, '2024-11-10 08:07:11', 1, '2024-11-10 13:37:11'),
(6, '24/00006', 'mumbai', '3', '12', 'active', 0, 1, '2024-11-09 09:31:21', 1, '2024-11-09 15:01:21'),
(7, '24/00007', 'indore', '2', '14', 'active', 0, 1, '2024-11-10 08:07:54', 1, '2024-11-10 13:37:54'),
(8, '24/00008', 'mumbai', '3', '13', 'active', 1, 1, '2024-11-11 02:46:45', 1, '2024-11-10 13:39:37'),
(9, '24/00009', 'indore', '1', '5', 'active', 0, 1, '2024-11-10 02:43:31', 0, NULL),
(10, '24/00010', 'indore', '1', '31', 'active', 0, 1, '2024-11-10 02:44:44', 0, NULL),
(11, '24/00011', 'indore', '5', '50', 'active', 0, 1, '2024-11-10 02:45:13', 0, NULL),
(12, '24/00012', 'mumbai', '11', '11', 'active', 0, 1, '2024-11-10 02:45:43', 0, NULL),
(13, '24/00013', 'mumbai', '12', '12', 'active', 0, 1, '2024-11-10 02:46:08', 0, NULL),
(14, '24/00014', 'mumbai', '11', '9', 'active', 0, 1, '2024-11-10 02:58:41', 0, NULL),
(15, '24/00015', 'indore', '2', '7', 'active', 0, 1, '2024-12-04 02:42:35', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_material`
--

CREATE TABLE `master_material` (
  `id` int NOT NULL,
  `sno` varchar(100) NOT NULL,
  `token` varchar(250) NOT NULL,
  `material_name` varchar(250) NOT NULL,
  `category` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `delete_status` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_material`
--

INSERT INTO `master_material` (`id`, `sno`, `token`, `material_name`, `category`, `type`, `status`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '24/00001', 'contractor', '1 - ABB CONTACTOR - 16/25/30 AMPS', '-', 'CONTRACTOR', 'active', 0, 1, '2024-09-27 06:37:24', 1, '2024-09-27 06:37:24'),
(2, '24/00002', '12-v7a', '2 - BATTERY - 12V/7A', '12 V/7A', 'BATTERY', 'active', 0, 1, '2024-09-27 06:38:11', 1, '2024-09-27 06:38:11'),
(3, '24/00003', '12v26a', '3 - BATTERY-12V/26A', '12V/26A', 'BATTERY', 'active', 0, 1, '2024-09-27 06:38:48', 1, '2024-09-27 06:38:48'),
(4, '24/00004', '4-cable-copper-armd-25x3c', '4 - CABLE COPPER ARMD - 2.5X3C', 'CABLE', 'ARMOURED', 'active', 0, 1, '2024-09-27 06:36:19', 1, '2024-09-27 06:36:19'),
(5, '24/00005', '5-cable-copper-armd25x4c', '5 - CABLE COPPER ARMD-2.5X4C', 'CABLE', 'ARMOURED', 'active', 0, 1, '2024-09-27 07:07:29', 1, '2024-09-27 07:07:29'),
(6, '24/00006', '6-cable-copper-armd-6x3c', '6 - CABLE COPPER ARMD 6X3C', 'CABLE', 'ARMOURED', 'active', 0, 1, '2024-09-27 07:07:49', 1, '2024-09-27 07:07:49'),
(7, '24/00007', '7-cable-copper-armd10x4c', '7 - CABLE COPPER ARMD-10X4C', 'CABLE', 'ARMOURED', 'active', 0, 1, '2024-09-27 07:08:14', 1, '2024-09-27 07:08:14'),
(8, '24/00008', '8-cable-alum-armd16x4c', '8 - CABLE ALUM ARMD-16X4C', 'CABLE', 'ARMOURED', 'active', 0, 1, '2024-09-27 07:08:48', 1, '2024-09-27 07:08:48'),
(9, '24/00009', '9-cable-alum-armd-25x4c', '9 - CABLE ALUM ARMD- 25X4C', 'CABLE', 'ARMOURED', 'active', 0, 1, '2024-09-27 07:09:16', 1, '2024-09-27 07:09:16'),
(10, '24/00010', '10-cable-copper-flexi-25x3c', '10 - CABLE COPPER FLEXI- 2.5X3C', 'CABLE', 'FLEXIBLE', 'active', 0, 1, '2024-09-27 07:09:42', 1, '2024-09-27 07:09:42'),
(11, '24/00011', '11-cable-copper-flexi-6x4c', '11 - CABLE COPPER FLEXI- 6X4C', 'CABLE', 'FLEXIBLE', 'active', 0, 1, '2024-09-27 07:10:05', 1, '2024-09-27 07:10:05'),
(12, '24/00012', '12-cable-copper-flexi-10x4c', '12 - CABLE COPPER FLEXI - 10X4C', 'CABLE', 'FLEXIBLE', 'active', 0, 1, '2024-09-27 07:10:25', 1, '2024-09-27 07:10:25'),
(13, '24/00013', '13-cable-automation-05x2pair', '13 - CABLE AUTOMATION  - 0.5X2PAIR', 'CABLE', 'AUTOMATION', 'active', 0, 1, '2024-09-27 07:11:57', 1, '2024-09-27 07:11:57'),
(14, '24/00014', '6-mm', '14 - COPPER BRADED WIRE- 6MM', '-', '6 MM', 'active', 0, 1, '2024-09-27 07:12:52', 1, '2024-09-27 07:12:52'),
(15, '24/00015', '15-capacitor175mfd', '15 - CAPACITOR-17.5MFD', 'FOR STP', '17.5 MFD', 'active', 0, 1, '2024-09-27 07:13:20', 1, '2024-09-27 07:13:20'),
(16, '24/00016', '16-capacitor20mfd', '16 - CAPACITOR-20MFD', 'FOR STP', '20 MFD', 'active', 0, 1, '2024-09-27 07:13:45', 1, '2024-09-27 07:13:45'),
(17, '24/00017', '17-capacitor25mfd', '17 - CAPACITOR-25MFD', 'FOR STP', '25 MFD', 'active', 0, 1, '2024-09-27 07:14:02', 1, '2024-09-27 07:14:02'),
(18, '24/00018', '18-cvt-500vanew', '18 - CVT - 500VA-NEW', '(NEW)', '500 VA', 'active', 0, 1, '2024-09-27 07:15:13', 1, '2024-09-27 07:15:13'),
(19, '24/00019', '19-cvt-500va-old-working', '19 - CVT 500VA -OLD WORKING', '(OLD working)', '500 VA', 'active', 0, 1, '2024-09-27 07:14:57', 1, '2024-09-27 07:14:57'),
(20, '24/00020', 'metal', '20 - CABLE TRAY-150X50-METAL', 'Metal', '150 X 50', 'active', 0, 1, '2024-09-27 07:15:47', 1, '2024-09-27 07:15:47'),
(21, '24/00021', 'metal', '21 - CABLE TRAY-350X50-METAL', 'METAL', '350 X 50', 'active', 0, 1, '2024-09-27 07:16:15', 1, '2024-09-27 07:16:15'),
(22, '24/00022', '22-crocodile-clipselarthing', '22 - CROCODILE CLIPS-ELARTHING ', 'EARTHING CLIP', 'N/A', 'active', 0, 1, '2024-09-27 07:16:44', 1, '2024-09-27 07:16:44'),
(23, '24/00023', '23-earthing-chamber18x18pvc', '23 - EARTHING CHAMBER-18X18-PVC', 'PVC', '18X18', 'active', 0, 1, '2024-09-27 07:17:05', 1, '2024-09-27 07:17:05'),
(24, '24/00024', '24-earthing-chamber18x18cast-iron', '24 - EARTHING CHAMBER-18X18-CAST IRON', 'CAST IRON ', '18', 'active', 0, 1, '2024-09-27 07:18:16', 1, '2024-09-27 07:18:16'),
(25, '24/00025', '25-earthing-name-platebig', '25 - EARTHING NAME PLATE-BIG', '(18X9)', 'BIG', 'active', 0, 1, '2024-09-27 07:18:52', 1, '2024-09-27 07:18:52'),
(26, '24/00026', '26-earthing-name-platesmall', '26 - EARTHING NAME PLATE-SMALL', '(11X7)', 'SMALL', 'active', 0, 1, '2024-09-27 07:19:10', 1, '2024-09-27 07:19:10'),
(27, '24/00027', '27-earthing-boxunloading', '27 - EARTHING BOX-UNLOADING', 'UNLOADING ', 'N/A', 'active', 0, 1, '2024-09-27 07:19:30', 1, '2024-09-27 07:19:30'),
(28, '24/00028', '28-earthing-gi-pipe10ft', '28 - EARTHING GI PIPE-10FT', 'GI ', '10 FT', 'active', 0, 1, '2024-09-27 07:19:48', 1, '2024-09-27 07:19:48'),
(29, '24/00029', '29-earthing-gi-pipe-c-clamp', '29 - EARTHING GI PIPE- C CLAMP', 'C CLAMP', 'N/A', 'active', 0, 1, '2024-09-27 07:21:19', 1, '2024-09-27 07:21:19'),
(30, '24/00030', '30-earthing-patti26x3', '30 - EARTHING PATTI-26X3', 'GI STRIP', '25 X 3', 'active', 0, 1, '2024-09-27 07:22:49', 1, '2024-09-27 07:22:49'),
(31, '24/00031', '31-emergengy-push-buttonmetal', '31 - EMERGENGY PUSH BUTTON-METAL', '-', 'Metal ', 'active', 0, 1, '2024-09-27 07:23:41', 1, '2024-09-27 07:23:41'),
(32, '24/00032', '32-funnel50mm', '32 - FUNNEL-50MM', 'EARTHING PIPE ', '50mm', 'active', 0, 1, '2024-09-27 07:24:02', 1, '2024-09-27 07:24:02'),
(33, '24/00033', 'gland-flp', '33 - GLAND FLP', 'PUMP', 'BIG', 'active', 0, 1, '2024-08-03 12:20:39', 0, NULL),
(34, '24/00034', 'gland-flp', '34 - GLAND FLP', 'FLEXIBLE', 'SMALL', 'active', 0, 1, '2024-08-03 12:20:40', 0, NULL),
(35, '24/00035', 'hand-glose', '35 - HAND GLOSE', '-', '11KV', 'active', 0, 1, '2024-08-03 12:20:42', 0, NULL),
(36, '24/00036', 'junction-box', '36 - JUNCTION BOX', '-', 'METAL ', 'active', 0, 1, '2024-08-03 12:20:43', 0, NULL),
(37, '24/00037', 'junction-box', '37 - JUNCTION BOX', '-', 'FLAME PROOF', 'active', 0, 1, '2024-08-03 12:20:44', 0, NULL),
(38, '24/00038', '38-led-fitting3050w', '38 - LED FITTING-30/50W', 'HOARDING', '30/50 W', 'active', 0, 1, '2024-09-27 07:24:21', 1, '2024-09-27 07:24:21'),
(39, '24/00039', '39-led-fitting80w', '39 - LED FITTING-80W', 'CANOPY LIGHT', '80W', 'active', 0, 1, '2024-09-27 07:24:36', 1, '2024-09-27 07:24:36'),
(40, '24/00040', '40-led-fitting90w', '40 - LED FITTING-90W', 'STREET LIGHT', '90W', 'active', 0, 1, '2024-09-27 07:24:48', 1, '2024-09-27 07:24:48'),
(41, '24/00041', '41-led-fitting10w-tube-light', '41 - LED FITTING-10W TUBE LIGHT', 'TUBE LIGHT', '10W', 'active', 0, 1, '2024-09-27 07:25:36', 1, '2024-09-27 07:25:36'),
(42, '24/00042', '42-led-fitting20w-tube-light', '42 - LED FITTING-20W TUBE LIGHT', 'TUBE LIGHT', '20W', 'active', 0, 1, '2024-09-27 07:25:55', 1, '2024-09-27 07:25:55'),
(43, '24/00043', 'led-driver', '43 - LED DRIVER', '12 VOLT', '10 Amp ', 'active', 0, 1, '2024-08-03 12:20:54', 0, NULL),
(44, '24/00044', 'led-driver', '44 - LED DRIVER', '12 VOLT', '20AMP ', 'active', 0, 1, '2024-08-03 12:20:55', 0, NULL),
(45, '24/00045', '45-led-driver-ninja100w', '45 - LED DRIVER NINJA-100W', 'BLUE BAND 12V', '100W', 'active', 0, 1, '2024-09-27 07:26:06', 1, '2024-09-27 07:26:06'),
(46, '24/00046', '46-led-driver60w750ma', '46 - LED DRIVER-60W/750MA', 'CANOPY ', '60W / 750MA', 'active', 0, 1, '2024-09-27 07:26:26', 1, '2024-09-27 07:26:26'),
(47, '24/00047', '47-led-driver-philip-canopy75w', '47 - LED DRIVER PHILIP CANOPY-75W', 'YARD POLE', '75W ', 'active', 0, 1, '2024-09-27 07:26:58', 1, '2024-09-27 07:26:58'),
(48, '24/00048', '48-led-driver-canopy60w', '48 - LED DRIVER CANOPY-60W', 'YARD POLE', '60W', 'active', 0, 1, '2024-09-27 07:27:13', 1, '2024-09-27 07:27:13'),
(49, '24/00049', '49-mcb6ampsp', '49 - MCB-6AMP-S/P', 'S/P', '6AMP', 'active', 0, 1, '2024-09-27 07:27:29', 1, '2024-09-27 07:27:29'),
(50, '24/00050', '50-mcb16ampsp', '50 - MCB-16AMP-S/P', 'S/P', '16AMP', 'active', 0, 1, '2024-09-27 07:28:38', 1, '2024-09-27 07:28:38'),
(51, '24/00051', '51-mcb6ampdp', '51 - MCB-6AMP-D/P', 'D/P', '6AMP', 'active', 0, 1, '2024-09-27 07:28:51', 1, '2024-09-27 07:28:51'),
(52, '24/00052', '52-mcb16ampdp', '52 - MCB-16AMP-D/P', 'D/P', '16AMP', 'active', 0, 1, '2024-09-27 07:29:13', 1, '2024-09-27 07:29:13'),
(53, '24/00053', '53-mcb32ampdp', '53 - MCB-32AMP-D/P', 'D/P', '32AMP', 'active', 0, 1, '2024-09-27 07:29:35', 1, '2024-09-27 07:29:35'),
(54, '24/00054', '54-mcb32amptp', '54 - MCB-32AMP-T/P', 'TP', '32AMP', 'active', 0, 1, '2024-09-27 07:29:57', 1, '2024-09-27 07:29:57'),
(55, '24/00055', '55-mcb63amptp', '55 - MCB-63AMP-T/P', 'TP', '63AMP', 'active', 0, 1, '2024-09-27 07:30:16', 1, '2024-09-27 07:30:16'),
(56, '24/00056', '56-mcb32amp4pole', '56 - MCB-32AMP-4POLE', '4 POLE', '32AMP', 'active', 0, 1, '2024-09-27 07:30:56', 1, '2024-09-27 07:30:56'),
(57, '24/00057', '57-mcb63amp4pole', '57 - MCB-63AMP-4POLE', '4 POLE', '63AMP', 'active', 0, 1, '2024-09-27 07:30:40', 1, '2024-09-27 07:30:40'),
(58, '24/00058', '58-mccb100amp3pole', '58 - MCCB-100AMP-3POLE', '3 POLE', '100 Amp', 'active', 0, 1, '2024-09-27 07:31:30', 1, '2024-09-27 07:31:30'),
(59, '24/00059', '59-mccb-boxlt', '59 - MCCB BOX-L&T', 'L & T', 'N/A', 'active', 0, 1, '2024-09-27 07:31:49', 1, '2024-09-27 07:31:49'),
(60, '24/00060', '60-modular-box6am', '60 - MODULAR BOX-6AM ', 'ROMA', '6M', 'active', 0, 1, '2024-09-27 07:32:06', 1, '2024-09-27 07:32:06'),
(61, '24/00061', '61-modular-plate6m', '61 - MODULAR PLATE-6M', 'ROMA', '6M', 'active', 0, 1, '2024-09-27 07:42:26', 1, '2024-09-27 07:42:26'),
(62, '24/00062', '62-online-ups1-kva', '62 - ONLINE UPS-1 KVA', 'INBUILD', '1 KVA', 'active', 0, 1, '2024-09-27 07:42:47', 1, '2024-09-27 07:42:47'),
(63, '24/00063', '63-online-ups3-kva', '63 - ONLINE UPS-3 KVA', '-', '3 KVA', 'active', 0, 1, '2024-09-27 07:43:05', 1, '2024-09-27 07:43:05'),
(64, '24/00064', '64-panel-board25-kva', '64 - PANEL BOARD-25 KVA', '-', '25KVA', 'active', 0, 1, '2024-09-27 07:43:23', 1, '2024-09-27 07:43:23'),
(65, '24/00065', '65-panel-board50-kva', '65 - PANEL BOARD-50 KVA', '-', '50 KVA', 'active', 0, 1, '2024-09-27 07:43:36', 1, '2024-09-27 07:43:36'),
(66, '24/00066', '66-relay-stp220v-ac', '66 - RELAY STP-220V AC', 'Black', '220V AC', 'active', 0, 1, '2024-09-27 07:44:01', 1, '2024-09-27 07:44:01'),
(67, '24/00067', '67-relay-stp24v-dc', '67 - RELAY STP-24V DC', '-', '24V DC', 'active', 0, 1, '2024-09-27 07:44:31', 1, '2024-09-27 07:44:31'),
(68, '24/00068', '68-rubber-mat2mm', '68 - RUBBER MAT-2MM', 'IS 15652', '2mm', 'active', 0, 1, '2024-09-27 07:44:51', 1, '2024-09-27 07:44:51'),
(69, '24/00069', '69-rotary-switch63amp', '69 - ROTARY SWITCH-63AMP', '-', '63 AMP', 'active', 0, 1, '2024-09-27 07:45:07', 1, '2024-09-27 07:45:07'),
(70, '24/00070', '70-rotary-switch-box63amp', '70 - ROTARY SWITCH BOX-63AMP', '-', '63 AMP', 'active', 0, 1, '2024-09-27 07:45:22', 1, '2024-09-27 07:45:22'),
(71, '24/00071', 'shock-treatment-chart', '71 - SHOCK TREATMENT CHART', '-', 'N/A', 'active', 0, 1, '2024-08-03 12:21:30', 0, NULL),
(72, '24/00072', '72-stabilizer5-kvanew', '72 - STABILIZER-5 KVA-NEW', 'NEW', '5 KVA', 'active', 0, 1, '2024-09-27 07:46:01', 1, '2024-09-27 07:46:01'),
(73, '24/00073', '73-stabilizer6-kva-old-working', '73 - STABILIZER-6 KVA - OLD WORKING', 'OLD (working)', '5 KVA', 'active', 0, 1, '2024-09-27 07:46:20', 1, '2024-09-27 07:46:20'),
(74, '24/00074', '74-shunt-releasedu-100', '74 - SHUNT RELEASE-DU 100', 'L & T', 'D U 100', 'active', 0, 1, '2024-09-27 07:46:50', 1, '2024-09-27 07:46:50'),
(75, '24/00075', '75-switch-10-amp', '75 - SWITCH- 10 -AMP', 'ROMA', '10 Amp', 'active', 0, 1, '2024-09-30 06:58:16', 1, '2024-09-30 06:58:16'),
(76, '24/00076', '76-switch16-amp', '76 - SWITCH-16 AMP', 'ROMA', '16 Amp', 'active', 0, 1, '2024-09-30 06:58:46', 1, '2024-09-30 06:58:46'),
(77, '24/00077', '77-socket10amp', '77 - SOCKET-10-AMP', 'ROMA', '10 Amp', 'active', 0, 1, '2024-09-30 06:59:08', 1, '2024-09-30 06:59:08'),
(78, '24/00078', '78-socket16-amp', '78 - SOCKET-16 AMP', 'ROMA', '16 Amp', 'active', 0, 1, '2024-09-30 06:59:24', 1, '2024-09-30 06:59:24'),
(79, '24/00079', '79-stp-box-new', '79 - STP BOX - NEW', 'NEW', 'N/A', 'active', 0, 1, '2024-09-30 06:59:40', 1, '2024-09-30 06:59:40'),
(80, '24/00080', '80-stp-box-repairing', '80 - STP BOX - REPAIRING', 'REPAIRING', 'N/A', 'active', 0, 1, '2024-09-30 06:59:58', 1, '2024-09-30 06:59:58'),
(81, '24/00081', 'wire', '81 - WIRE', '-', '1.sqmm', 'active', 0, 1, '2024-08-03 12:21:54', 0, NULL),
(82, '24/00082', 'wire', '82 - WIRE - 1.5 SQMM', '-WIRE', '1. 5 sq mm', 'active', 0, 1, '2024-09-30 07:00:18', 1, '2024-09-30 07:00:18'),
(83, '24/00083', 'wire', '83 - WIRE - 2.5SQMM ', 'WIRE', '2.5 sq mm', 'active', 0, 1, '2024-09-30 07:00:38', 1, '2024-09-30 07:00:38'),
(84, '24/00084', 'wire', '84 - WIRE - 4 SQMM', 'WIRE', '4.sqmm', 'active', 0, 1, '2024-09-30 07:01:01', 1, '2024-09-30 07:01:01'),
(85, '24/00085', '85-wire-6-sqmm', '85 - WIRE - 6 SQMM', 'GREEN', '6 sq mm', 'active', 0, 1, '2024-09-30 07:01:22', 1, '2024-09-30 07:01:22'),
(86, '24/00086', '86-wire-10-sqmm', '86 - WIRE - 10 SQMM', 'GREEN', '10.sqmm', 'active', 0, 1, '2024-09-30 07:01:38', 1, '2024-09-30 07:01:38'),
(87, '24/00087', 'green-wire', '87 - WIRE - 16 SQMM', 'GREEN WIRE', '16.sqmm', 'active', 0, 1, '2024-09-30 07:02:06', 1, '2024-09-30 07:02:06'),
(101, '24/00101', '7kg-motor-(stabilizer)', '101 - 7Kg Motor (Stabilizer)', '-', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(102, '24/00102', 'aluminium-armoured-cable', '102 - Aluminium Armoured Cable', '90 SqmmX4C', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(103, '24/00103', 'battery', '103 - BATTERY', '42Ah', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(104, '24/00104', 'bcp-board-(for-stabilizer)', '104 - BCP Board (For Stabilizer)', '-', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(105, '24/00105', 'cable-automation-sheilded-armd', '105 - CABLE AUTOMATION SHEILDED ARMD', '0.5 X 4 Pair', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(106, '24/00106', 'cable-aluminium-armoured', '106 - CABLE ALUMINIUM ARMOURED', '120SQM X 4C', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(107, '24/00107', 'cable-aluminium-armoured', '107 - CABLE ALUMINIUM ARMOURED', '90Sq.mm X 4C', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(108, '24/00108', 'cable-tray', '108 - Cable Tray', '300 X 50 mm', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(109, '24/00109', 'cable-tray', '109 - Cable Tray', '150 X 50mm', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(110, '24/00110', 'capacitor-for-motor', '110 - CAPACITOR FOR MOTOR', '100 - 120V', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(111, '24/00111', 'capacitor-for-cvt', '111 - CAPACITOR FOR CVT', '10 MFD', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(112, '24/00112', 'capacitor-for-cvt', '112 - CAPACITOR FOR CVT', '12.5 MFD', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(113, '24/00113', 'capacitor-for-cvt', '113 - CAPACITOR FOR CVT', '15 MFD', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(114, '24/00114', 'cfl-lamp', '114 - CFL LAMP', '85W', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(115, '24/00115', 'cfl-lamp', '115 - CFL LAMP', '35W', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(116, '24/00116', 'choke', '116 - CHOKE', '250W', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(117, '24/00117', 'choke', '117 - CHOKE', '150W', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(118, '24/00118', 'choke', '118 - CHOKE', '70W', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(119, '24/00119', 'choke', '119 - CHOKE', '35W', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(120, '24/00120', 'cvt', '120 - CVT', '1 KVA', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(121, '24/00121', 'driver', '121 - DRIVER', '100W', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(122, '24/00122', 'driver', '122 - DRIVER', '120W', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(123, '24/00123', 'driver-plate', '123 - DRIVER PLATE', '150W', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(124, '24/00124', 'earth-chamber-cement', '124 - Earth Chamber Cement', '18 X18', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(125, '24/00125', 'earth-plate', '125 - EARTH PLATE', '-', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(126, '24/00126', 'fuse-carrier', '126 - FUSE CARRIER', '32 AMPS', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(127, '24/00127', 'fuse-carrier', '127 - FUSE CARRIER', '63 AMPS', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(128, '24/00128', 'fuse-carrier', '128 - FUSE CARRIER', '100AMPS', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(129, '24/00129', 'gland-pvc', '129 - GLAND - PVC', 'PG-11', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(130, '24/00130', 'gland-pvc', '130 - GLAND - PVC', 'PG-21', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(131, '24/00131', 'gland-commercial', '131 - GLAND COMMERCIAL', '(18mm) - 3/4', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(132, '24/00132', 'gland-commercial', '132 - GLAND COMMERCIAL', '(25mm) - 1', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(133, '24/00133', 'gland-commercial', '133 - GLAND COMMERCIAL', '(28mm) - 1 1/8', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(134, '24/00134', 'gland-commercial', '134 - GLAND COMMERCIAL', '(32mm) - 1 1/4', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(135, '24/00135', 'holder', '135 - HOLDER', '150W', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(136, '24/00136', 'ignitor', '136 - IGNITOR', '-', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(137, '24/00137', 'indicator', '137 - INDICATOR', 'R, Y, B', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(138, '24/00138', 'led-driver', '138 - LED DRIVER', '50W', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(139, '24/00139', 'led-fitting-tube-light', '139 - LED FITTING TUBE LIGHT', '10W', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(140, '24/00140', 'led-fitting-tube-light', '140 - LED FITTING TUBE LIGHT', '20W', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(141, '24/00141', 'main-switch', '141 - Main Switch', '125 Amps', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(142, '24/00142', 'mcb-2-pole', '142 - MCB 2 Pole', '20 Amps', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(143, '24/00143', 'mcb-2-pole', '143 - MCB 2 Pole', '40 Amps', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(144, '24/00144', 'metal-lamp', '144 - METAL LAMP', '250W', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(145, '24/00145', 'metal-lamp', '145 - METAL LAMP', '150W', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(146, '24/00146', 'metal-lamp', '146 - METAL LAMP', '70W', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(147, '24/00147', 'mushroom-switch', '147 - Mushroom Switch', '3M', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(148, '24/00148', 'no', '148 - NO', '-', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(149, '24/00149', 'old-cvt-(scrab)', '149 - OLD CVT (SCRAB)', 'SCRAB', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(150, '24/00150', 'old-stabilizer-(scrab)', '150 - OLD STABILIZER (SCRAB)', 'SCRAB', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(151, '24/00151', 'pl-lamp', '151 - PL Lamp', '36W', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(152, '24/00152', 'rotry-switch', '152 - ROTRY SWITCH', '40 Amps', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(153, '24/00153', 'service-cvt-gpc-make', '153 - SERVICE CVT GPC MAKE', '500VA', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(154, '24/00154', 'service-stabilizer-gpc-make', '154 - SERVICE STABILIZER GPC MAKE', '5 KVA', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(155, '24/00155', 'stabilizer-old', '155 - STABILIZER OLD', '30KVA', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(156, '24/00156', 'stabilizer-stand', '156 - STABILIZER STAND', '3 WAY', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(157, '24/00157', 'stopper-for-junction-box', '157 - STOPPER FOR JUNCTION BOX', '-', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(158, '24/00158', 'stp-motor', '158 - STP MOTOR', '0.75 HP', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(159, '24/00159', 'stp-motor', '159 - STP MOTOR', '1.5 HP', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(160, '24/00160', 'tube-light', '160 - TUBE LIGHT', '35W', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(161, '24/00161', 'variac', '161 - VARIAC', '20 Amps', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(162, '24/00162', 'voltmeter', '162 - VOLTMETER', '0 - 500V', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(163, '24/00163', 'voltmeter-cvt', '163 - VOLTMETER CVT', '0 - 300V', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(164, '24/00164', 'modular-box', '164 - MODULAR BOX', '3 M', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL),
(165, '24/00165', 'modular-plate', '165 - MODULAR PLATE', '3M', '-', 'active', 0, 1, '2024-07-24 19:09:37', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_pan`
--

CREATE TABLE `master_pan` (
  `id` int NOT NULL,
  `sno` varchar(100) NOT NULL,
  `token` varchar(250) NOT NULL,
  `pan_number` varchar(250) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `delete_status` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_pan`
--

INSERT INTO `master_pan` (`id`, `sno`, `token`, `pan_number`, `status`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '24/00001', '27abmpn9959n1zf', '27ABMPN9959N1ZF', 'active', 1, 1, '2024-07-11 13:16:53', 0, NULL),
(2, '24/00002', '27abmpn99591zf', '27ABMPN99591ZF', 'active', 1, 1, '2024-07-11 13:23:48', 0, NULL),
(3, '24/00003', 'abmpn9959n', 'ABMPN9959N', 'active', 0, 1, '2024-07-11 07:54:12', 0, NULL),
(4, '24/00004', 'admpg4943r', 'ADMPG4943R', 'active', 0, 1, '2024-09-06 02:14:21', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_party`
--

CREATE TABLE `master_party` (
  `id` int NOT NULL,
  `sno` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `company_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `party_name` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `msme` enum('no','yes') COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'active',
  `delete_status` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_party`
--

INSERT INTO `master_party` (`id`, `sno`, `token`, `company_name`, `party_name`, `msme`, `status`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '24/00001', 'renuka-electric-trading-co', 'bright', 'RENUKA Electric & Trading Co', 'no', 'active', 0, 1, '2024-09-27 05:26:46', 1, '2024-09-27 05:26:46'),
(2, '24/00002', 'renuka-electric-trading-co', 'ggcc', 'RENUKA Electric & Trading Co', 'no', 'active', 0, 1, '2024-09-27 10:37:15', 0, NULL),
(3, '24/00003', 'j-k-electricals-indore', 'ggcc', 'J K ELECTRICALS INDORE', 'no', 'active', 1, 1, '2024-12-01 14:04:11', 0, NULL),
(4, '24/00004', 'haripriya-industrial-and-trading-co', 'ggcc', 'HARIPRIYA INDUSTRIAL AND TRADING CO', 'no', 'active', 0, 1, '2024-10-03 05:10:11', 0, NULL),
(5, '24/00005', 'deltron-electricals', 'ggcc', 'DELTRON ELECTRICALS', 'no', 'active', 0, 1, '2024-10-03 05:12:19', 0, NULL),
(6, '24/00006', 'jain-international-chennai', 'ggcc', 'JAIN INTERNATIONAL CHENNAI', 'no', 'active', 0, 1, '2024-10-03 05:15:37', 0, NULL),
(7, '24/00007', 'paramtronics', 'ggcc', 'PARAMTRONICS', 'no', 'active', 0, 1, '2024-10-03 05:17:41', 0, NULL),
(8, '24/00008', 'om-pipe-traders', 'ggcc', 'OM PIPE TRADERS', 'no', 'active', 0, 1, '2024-10-03 05:18:08', 0, NULL),
(9, '24/00009', 'eps-pcb-technologies', 'ggcc', 'EPS PCB TECHNOLOGIES', 'no', 'active', 0, 1, '2024-10-03 05:19:02', 0, NULL),
(10, '24/00010', 's-m-electricals', 'ggcc', 'S M ELECTRICALS', 'no', 'active', 0, 1, '2024-10-03 05:19:33', 0, NULL),
(11, '24/00011', 's-m-electricals', 'bright', 'S M ELECTRICALS', 'no', 'active', 0, 1, '2024-10-03 05:19:49', 0, NULL),
(12, '24/00012', 'amg-techno-solutions', 'bright', 'AMG TECHNO SOLUTIONS', 'no', 'active', 0, 1, '2024-10-03 05:20:30', 0, NULL),
(13, '24/00013', 'raj-safety-equipments-and-hardware', 'ggcc', 'RAJ SAFETY EQUIPMENTS AND HARDWARE', 'no', 'active', 0, 1, '2024-10-03 05:21:35', 0, NULL),
(14, '24/00014', 'jayam-industries', 'bright', 'jayam industries', 'no', 'active', 0, 1, '2024-10-03 05:27:49', 0, NULL),
(15, '24/00015', 'someshwar-trading', 'ggcc', 'SOMESHWAR TRADING', 'no', 'active', 0, 1, '2024-10-03 05:53:25', 0, NULL),
(16, '24/00016', 'arihant-cables', 'ggcc', 'ARIHANT CABLES', 'no', 'active', 0, 1, '2024-10-18 05:40:49', 0, NULL),
(17, '24/00017', 'abhay-collection', 'ggcc', 'ABHAY COLLECTION', 'no', 'active', 0, 1, '2024-10-19 04:02:58', 0, NULL),
(18, '24/00018', 'abhay-collection', 'bright', 'ABHAY COLLECTION', 'no', 'active', 0, 1, '2024-10-19 04:04:17', 0, NULL),
(19, '24/00019', 'jk-electrical', 'ggcc', 'JK ELECTRICAL', 'no', 'active', 0, 1, '2024-12-01 13:54:08', 1, '2024-12-01 13:54:08'),
(20, '24/00020', 'r-k-electrical-electronics', 'ggcc', 'R K ELECTRICAL & ELECTRONICS', 'no', 'active', 0, 1, '2024-12-01 08:36:18', 0, NULL),
(21, '24/00021', 'hariom-hardware', 'bright', 'HARIOM HARDWARE', 'no', 'active', 0, 1, '2024-12-03 04:29:11', 0, NULL),
(22, '24/00022', 'mobilecom', 'ggcc', '@Mobile.Com', 'no', 'active', 0, 1, '2024-12-04 03:09:08', 0, NULL),
(23, '24/00023', 'nilesh-petro-tech-solutions', 'bright', 'NILESH PETRO TECH SOLUTIONS', 'no', 'active', 0, 1, '2024-12-05 02:26:08', 0, NULL),
(24, '24/00024', 'jyoti-trading-co', 'bright', 'JYOTI TRADING CO', 'no', 'active', 0, 1, '2024-12-05 02:29:32', 0, NULL),
(25, '24/00025', 'valison-company', 'ggcc', 'VALISON & COMPANY', 'no', 'active', 0, 1, '2024-12-06 04:08:58', 0, NULL),
(26, '24/00026', 'fusion-electricals', 'ggcc', 'FUSION ELECTRICALS', 'no', 'active', 0, 1, '2024-12-07 02:29:26', 0, NULL),
(27, '24/00027', 'heet-electricals-trading', 'bright', 'HEET ELECTRICALS TRADING', 'no', 'active', 0, 1, '2024-12-07 03:43:58', 0, NULL),
(28, '24/00028', 'ruchi-paints', 'ggcc', 'RUCHI PAINTS', 'no', 'active', 0, 1, '2024-12-10 09:58:00', 0, NULL),
(29, '24/00029', 'tropex-electronics', 'bright', 'TROPEX ELECTRONICS', 'no', 'active', 0, 1, '2024-12-10 10:03:01', 0, NULL),
(30, '24/00030', 'mahalaxmi-traders', 'bright', 'MAHALAXMI TRADERS', 'no', 'active', 0, 1, '2024-12-10 10:06:42', 0, NULL),
(31, '24/00031', 'car-shringar', 'bright', 'CAR SHRINGAR', 'no', 'active', 0, 1, '2024-12-12 09:00:36', 0, NULL),
(32, '24/00032', 'haripriya-industrial-and-trading-co', 'bright', 'HARIPRIYA INDUSTRIAL AND TRADING CO', 'no', 'active', 0, 1, '2024-12-19 09:55:48', 0, NULL),
(33, '24/00033', 'ajit-power-solution-pvt-ltd', 'ggcc', 'AJIT POWER SOLUTION PVT LTD', 'no', 'active', 0, 1, '2024-12-19 09:58:54', 0, NULL),
(34, '24/00034', 'ramesh-earthing-corporation', 'ggcc', 'RAMESH EARTHING CORPORATION', 'no', 'active', 0, 1, '2024-12-19 10:03:08', 0, NULL),
(35, '24/00035', 'paramount-corporation', 'bright', 'PARAMOUNT CORPORATION', 'no', 'active', 0, 1, '2024-12-19 10:12:08', 0, NULL),
(36, '24/00036', 'gst', 'ggcc', 'GST', 'no', 'active', 1, 1, '2024-12-19 16:15:53', 0, NULL),
(37, '24/00037', 'gst', 'bright', 'GST', 'no', 'active', 1, 1, '2024-12-19 16:15:48', 0, NULL),
(38, '24/00038', 'sagar-electrical', 'bright', 'SAGAR ELECTRICAL', 'no', 'active', 0, 1, '2024-12-20 00:11:52', 0, NULL),
(39, '24/00039', 'hasti-digital-prints', 'bright', 'HASTI DIGITAL PRINTS', 'no', 'active', 0, 1, '2024-12-20 00:16:29', 0, NULL),
(40, '24/00040', 'rohit-trading-co', 'bright', 'ROHIT TRADING CO', 'no', 'active', 0, 1, '2024-12-20 00:19:16', 0, NULL),
(41, '24/00041', 'jain-international', 'bright', 'JAIN INTERNATIONAL', 'no', 'active', 0, 1, '2024-12-28 05:36:57', 0, NULL),
(42, '24/00042', 'ss-power-control', 'bright', 'SS POWER CONTROL', 'no', 'active', 0, 1, '2024-12-28 05:39:06', 0, NULL),
(43, '24/00043', 'matrix-power-tech-system', 'bright', 'MATRIX POWER TECH SYSTEM', 'no', 'active', 0, 1, '2024-12-28 05:41:12', 0, NULL),
(44, '24/00044', 'shree-vinayak-battery-invr-sale-and-ser', 'bright', 'SHREE VINAYAK BATTERY INVR SALE AND SER', 'no', 'active', 0, 1, '2024-12-28 05:44:36', 0, NULL),
(45, '24/00045', 'lakshmi-sales-corporation', 'bright', 'LAKSHMI SALES CORPORATION', 'no', 'active', 0, 1, '2024-12-28 05:52:25', 0, NULL),
(46, '24/00046', 'sagar-electrical', 'ggcc', 'SAGAR ELECTRICAL', 'no', 'active', 0, 1, '2024-12-28 05:56:08', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_pettycash`
--

CREATE TABLE `master_pettycash` (
  `id` int NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'active',
  `delete_status` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_pettycash`
--

INSERT INTO `master_pettycash` (`id`, `token`, `title`, `status`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'fuel', 'FUEL', 'active', 0, 1, '2024-12-01 08:46:13', 0, NULL),
(2, 'salary', 'SALARY', 'active', 0, 1, '2024-12-01 08:46:40', 0, NULL),
(3, 'rent', 'RENT', 'active', 0, 1, '2024-12-04 03:06:14', 0, NULL),
(4, 'vehical-repairng', 'VEHICAL REPAIRNG', 'active', 0, 1, '2024-12-04 03:07:07', 0, NULL),
(5, 'gst', 'GST', 'active', 0, 1, '2024-12-19 10:46:14', 0, NULL),
(6, 'loan', 'LOAN', 'active', 0, 1, '2024-12-19 10:56:39', 0, NULL),
(7, 'home-loan', 'HOME LOAN ', 'active', 0, 1, '2024-12-19 10:57:00', 0, NULL),
(8, 'society-maintanence-office', 'SOCIETY MAINTANENCE OFFICE', 'active', 0, 1, '2024-12-19 10:58:28', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_thirdparty`
--

CREATE TABLE `master_thirdparty` (
  `id` int NOT NULL,
  `token` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `thirdparty_name` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_general_ci NOT NULL,
  `delete_status` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` date NOT NULL,
  `updated_by` int NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_thirdparty`
--

INSERT INTO `master_thirdparty` (`id`, `token`, `thirdparty_name`, `remarks`, `status`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'deva-rajan', 'DEVA RAJAN', 'LOAN', 'active', 0, 1, '2024-11-26', 0, '0000-00-00'),
(2, 'scrab', 'SCRAB', 'SCRAB', 'active', 0, 1, '2024-11-27', 0, '0000-00-00'),
(3, 'sanjay', 'SANJAY', 'Loan Opening Balance On December 2024', 'active', 0, 1, '2024-12-09', 0, '0000-00-00'),
(4, 'tinku', 'TINKU', 'OPENING BALANCE AS ON DECEMBER 2024', 'active', 0, 1, '2024-12-09', 0, '0000-00-00'),
(5, 'mintu', 'MINTU', 'OPENING BALANCE AS ON DECEMBER 2024', 'active', 0, 1, '2024-12-09', 0, '0000-00-00'),
(6, 'uday', 'UDAY', 'OPENING BALANCE AS ON DECEMBER 2024', 'active', 0, 1, '2024-12-09', 0, '0000-00-00'),
(7, 'das-church', 'DAS CHURCH', 'LOAN', 'active', 0, 1, '2024-12-28', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `master_vendor`
--

CREATE TABLE `master_vendor` (
  `id` int NOT NULL,
  `sno` varchar(100) NOT NULL,
  `token` varchar(250) NOT NULL,
  `vendor_name` varchar(250) NOT NULL,
  `vendor_code` varchar(250) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `delete_status` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_vendor`
--

INSERT INTO `master_vendor` (`id`, `sno`, `token`, `vendor_name`, `vendor_code`, `status`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '24/00001', 'george-general-const-co', 'HINDUSTAN PETROLEUM CORPORATION LIMITED', '50034894', 'active', 0, 1, '2024-09-10 11:44:38', 1, '2024-09-10 11:44:38'),
(2, '24/00002', '50023214', 'HINDUSTAN PETROLEUM CORPORATION LIMITED', '50023214', 'active', 0, 1, '2024-09-13 13:19:20', 1, '2024-09-13 13:19:20'),
(3, '24/00003', '50013546', 'HINDUSTAN PETROLEUM CORPORATION LIMITED', '50013546', 'active', 0, 1, '2024-09-10 06:14:56', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `material_shipping`
--

CREATE TABLE `material_shipping` (
  `id` int NOT NULL,
  `shipping_date` date NOT NULL,
  `from_location` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `to_location` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `material_name` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `sender_name` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `sender_number` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `receiver_name` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `receiver_number` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bill_copy` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lr_copy` text COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `delete_status` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` date NOT NULL,
  `updated_by` int NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `material_shipping`
--

INSERT INTO `material_shipping` (`id`, `shipping_date`, `from_location`, `to_location`, `material_name`, `sender_name`, `sender_number`, `receiver_name`, `receiver_number`, `shipping_type`, `bill_copy`, `lr_copy`, `status`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '2024-11-29', 'TIRCHY', 'MUMBAI', 'L & T CONTRACTOR', 'ANBU', '', '', '', 'S.R.S.TRAVELS', '', './uploads/lr_copy/vehicledriversheet241129081413.pdf', 'received', 1, 60, '2024-11-29', 60, '2024-11-29'),
(2, '2024-11-29', 'VASHI', 'INDORE', 'MIX', 'RAJAN', '123', 'RAJAN', '123', 'BUS', '', '', 'received', 1, 1, '2024-11-29', 0, '0000-00-00'),
(3, '2024-11-29', 'VASHI', 'BHOPAL', 'MIX', 'CHAND', '', '', '', 'BUS', '', '', 'received', 1, 1, '2024-11-29', 0, '0000-00-00'),
(4, '2024-11-30', 'VASHI', 'INDORE', 'MIX', 'RAJAN', '123', 'ABI', '123', 'BUS', '', '', 'notreceived', 1, 1, '2024-11-30', 0, '0000-00-00'),
(5, '2024-12-02', 'GWALIOR', 'MUMBAI', 'JOB REPORT', 'NILESH', '', '', '', 'ST COURIER', '', './uploads/lr_copy/img-20241202-wa0065241202070809.jpg', 'notreceived', 1, 60, '2024-12-02', 60, '2024-12-02'),
(6, '2024-12-02', '9', '13', 'JOB REPORT', 'JOSEPH', '', '', '', 'ST COURIER', '', '', 'notreceived', 1, 60, '2024-12-02', 1, '2024-12-04'),
(7, '2024-12-02', '9', '8', 'BILL REPORT', 'NILESH', '', '', '', 'INDIAN POST', '', '', 'notreceived', 1, 60, '2024-12-02', 1, '2024-12-04'),
(8, '2024-12-05', '11', '6', 'WIRE GREEN', '', '', '', '', 'MY LOGISTIC ', '', '', 'notreceived', 1, 60, '2024-12-05', 0, '0000-00-00'),
(9, '2024-12-02', '6', '8', 'STP BOARD - 4NOS', 'APPU', '', 'NILESH', '', 'METTUR TRANSPORT', '', '', 'received', 0, 60, '2024-12-05', 60, '2024-12-05'),
(10, '2024-12-02', '1', '5', 'PANEL BOARD -2 NOS', 'PUSHPENDRA', '', 'NILESH', '', 'MY LOGISTIC ', '', '', 'received', 0, 60, '2024-12-05', 0, '0000-00-00'),
(11, '2024-12-02', '2', '5', 'DRY FRUIT, MIX MATERIAL', 'DAYAL', '', 'NILESH', '', 'VERMA TRAVELS', '', '', 'received', 0, 60, '2024-12-05', 0, '0000-00-00'),
(12, '2024-12-03', '11', '13', 'BILLS', 'SANTOSH', '', 'AJAY', '', 'ANJANI COURIER', '', '', 'received', 0, 60, '2024-12-05', 60, '2024-12-17'),
(13, '2024-12-03', '13', '1', 'STABILIZER', 'CHAND', '', 'PUSHPENDRA', '', 'VRL-1090310030', '', '', 'received', 0, 60, '2024-12-05', 60, '2024-12-17'),
(14, '2024-12-06', '6', '8', '75W DRIVER - 30,LED STRIP - 6, PUSHBUTTON - 5', 'APPU', '', 'CHARLES', '', 'BUS- A1', '', '', 'received', 0, 60, '2024-12-17', 0, '0000-00-00'),
(15, '2024-12-07', '6', '7', 'NEW CVT - 3, STABILIZER - 3', 'APPU', '', 'ANBU', '', 'BUS- A1', '', '', 'received', 0, 60, '2024-12-17', 0, '0000-00-00'),
(16, '2024-12-07', '1', '5', 'PVC TRAY AND OTHER MATERIALS', 'PUSHPENDRA', '', 'NILESH', '', 'INTERCITY LOGISTIC', '', '', 'received', 0, 60, '2024-12-17', 0, '0000-00-00'),
(17, '2024-12-07', '7', '6', 'BILLS', 'ANBU', '', 'APPU', '', 'PROFESSIONAL', '', '', 'received', 0, 60, '2024-12-17', 0, '0000-00-00'),
(18, '2024-12-07', '13', '1', 'EARTHING STICKERS', 'CHAND', '', 'PUSHPENDRA', '', 'BARIWAL TRANSPORT', '', '', 'received', 0, 60, '2024-12-17', 0, '0000-00-00'),
(19, '2024-12-09', '6', '9', 'CVT-2, STABILIZER -2', 'APPU', '', 'JOSEPH', '', 'BUS- A1', '', '', 'received', 0, 60, '2024-12-17', 0, '0000-00-00'),
(20, '2024-12-09', '5', '1', 'ROTARY SWITCH', 'NILESH', '', 'PUSHPENDRA', '', 'INTERCITY TRANSPORT', '', '', 'received', 0, 60, '2024-12-17', 0, '0000-00-00'),
(21, '2024-12-10', '6', '13', 'PURCHASE BILLS', 'APPU', '', 'AJAY', '', 'POST', '', '', 'received', 0, 60, '2024-12-17', 0, '0000-00-00'),
(22, '2024-12-10', '1', '5', 'PANEL', 'PUSHPENDRA', '', 'NILESH', '', 'MY LOGISTIC', '', '', 'received', 0, 60, '2024-12-17', 0, '0000-00-00'),
(23, '2024-12-10', '1', '13', 'ROTARY SWITCH', 'PUSHPENDRA', '', 'CHAND', '', 'CITIZEN TRANSPORT', '', '', 'received', 0, 60, '2024-12-17', 0, '0000-00-00'),
(24, '2024-12-10', '7', '8', 'STP CARD', 'ANBU ', '', 'CHARLES', '', 'BUS', '', '', 'received', 0, 60, '2024-12-17', 0, '0000-00-00'),
(25, '2024-12-10', '7', '8', 'STP CARD', 'ANBU ', '', 'CHARLES', '', 'BUS', '', '', 'received', 0, 60, '2024-12-17', 0, '0000-00-00'),
(26, '2024-12-11', '1', '5', 'CROCODILE CLIP - 50 10 SQMM - 50', 'PUSHPENDRA', '', 'AJAY', '', 'KAMLA KARGO', '', '', 'received', 0, 60, '2024-12-17', 0, '0000-00-00'),
(27, '2024-12-12', '13', '7', '2.5 X 4C  - 300 MTRS', 'VENDOR', '', 'ANBU', '', 'VRL ', '', '', 'received', 0, 60, '2024-12-17', 60, '2024-12-23'),
(28, '2024-12-12', '13', '1', 'SHUNT COIL', 'CHAND', '', 'PUSHPENDRA', '', 'CITIZEN TRANSPORT', '', '', 'received', 0, 60, '2024-12-18', 0, '0000-00-00'),
(29, '2024-12-12', '13', '6', 'EARTHING STICKER AND 17.5 MFD ', 'CHAND', '', 'APPU', '', 'S.R.S.TRAVELS', '', '', 'received', 0, 60, '2024-12-18', 60, '2024-12-23'),
(30, '2024-12-12', '13', '2', 'AUTOMATION CABLE - 300MTRS', 'VENDOR', '', '', '', 'VRL 1080255033', '', '', 'notreceived', 0, 60, '2024-12-18', 60, '2024-12-18'),
(31, '2024-12-12', '13', '5', 'AUTOMATION CABLE - 200MTRS', 'VENDOR', '', 'NILESH', '', 'VRL - 1080255032', '', '', 'received', 0, 60, '2024-12-18', 60, '2024-12-23'),
(32, '2024-12-13', '1', '5', 'SHUNT COIL', 'PUSHPENDRA', '', 'NILESH', '', 'INTERCITY LOGISTIC', '', '', 'received', 0, 60, '2024-12-18', 0, '0000-00-00'),
(33, '2024-12-13', '7', '9', '3 NEW CVT', 'ANBU', '', 'JOSEPH', '', 'POST', '', '', 'received', 0, 60, '2024-12-18', 0, '0000-00-00'),
(34, '2024-12-14', '2', '5', 'MCCB - 2NOS , STABILIZER - 2 NOS', 'DAYAL', '', 'IRFAN', '', 'VERMA TRAVELS', '', '', 'received', 0, 60, '2024-12-18', 0, '0000-00-00'),
(35, '2024-12-16', '6', '8', 'EARTHING STICKERS', 'APPU', '', 'CHARLES', '', 'BUS', '', '', 'received', 0, 60, '2024-12-19', 60, '2024-12-19'),
(36, '2024-12-17', '1', '5', 'RUBBER MAT - 5 NOS', 'PUSHPENDRA', '', 'NILESH', '', 'INTERCITY LOGISTIC', '', '', 'received', 0, 60, '2024-12-19', 60, '2024-12-23');

-- --------------------------------------------------------

--
-- Table structure for table `stock_transaction`
--

CREATE TABLE `stock_transaction` (
  `id` int NOT NULL,
  `date` date NOT NULL,
  `type` varchar(50) NOT NULL,
  `zone` varchar(50) NOT NULL,
  `from_branch` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `to_branch` varchar(50) NOT NULL,
  `outlet_name` varchar(250) NOT NULL,
  `material_id` int NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `delete_status` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock_transaction`
--

INSERT INTO `stock_transaction` (`id`, `date`, `type`, `zone`, `from_branch`, `method`, `to_branch`, `outlet_name`, `material_id`, `quantity`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '2024-11-27', 'stockin', 'mumbai', '13', 'buy', '', '', 5, '100', 1, 1, '2024-11-27 11:47:34', 0, '0000-00-00 00:00:00'),
(2, '2024-11-27', 'stockout', 'mumbai', '13', 'outlet', '', '', 5, '50', 1, 1, '2024-11-27 11:48:32', 0, '0000-00-00 00:00:00'),
(3, '2024-10-23', 'stockin', 'mumbai', '8', 'buy', '', '', 4, '100', 1, 1, '2024-11-27 11:54:01', 0, '0000-00-00 00:00:00'),
(4, '2024-10-23', 'stockin', 'mumbai', '8', 'buy', '', '', 4, '100', 1, 1, '2024-11-27 11:54:01', 0, '0000-00-00 00:00:00'),
(5, '2024-10-29', 'stockout', 'mumbai', '13', 'outlet', '', '', 5, '25', 1, 1, '2024-11-27 11:56:16', 0, '0000-00-00 00:00:00'),
(6, '2024-11-29', 'stockin', 'mumbai', '13', 'buy', '', '', 5, '100', 1, 1, '2024-11-29 03:28:36', 0, '0000-00-00 00:00:00'),
(7, '2024-11-29', 'stockin', 'mumbai', '13', 'buy', '', '', 2, '10', 1, 1, '2024-11-29 03:29:29', 0, '0000-00-00 00:00:00'),
(8, '2024-11-29', 'stockout', 'mumbai', '13', 'outlet', '', '', 2, '5', 1, 1, '2024-11-29 03:30:18', 0, '0000-00-00 00:00:00'),
(9, '2024-11-29', 'stockout', 'mumbai', '13', 'transfer', '10', '', 5, '100', 1, 1, '2024-11-29 03:51:20', 0, '0000-00-00 00:00:00'),
(10, '2024-11-29', 'stockin', '', '10', 'transfer', '13', '', 5, '100', 1, 1, '2024-11-29 03:51:20', 0, '0000-00-00 00:00:00'),
(11, '2024-11-29', 'stockin', 'indore', '2', 'buy', '', '', 62, '1', 1, 1, '2024-11-29 06:15:23', 0, '0000-00-00 00:00:00'),
(12, '2024-11-29', 'stockout', 'indore', '2', 'outlet', '', '', 62, '1', 1, 1, '2024-11-29 06:16:22', 0, '0000-00-00 00:00:00'),
(13, '2024-11-29', 'stockin', 'indore', '2', 'buy', '', '', 62, '1', 1, 1, '2024-11-29 06:39:46', 0, '0000-00-00 00:00:00'),
(14, '2024-11-29', 'stockin', 'indore', '2', 'buy', '', '', 75, '1', 1, 1, '2024-11-29 06:42:32', 0, '0000-00-00 00:00:00'),
(15, '2024-11-29', 'stockin', 'indore', '2', 'buy', '', '', 33, '1', 1, 1, '2024-11-29 06:42:32', 0, '0000-00-00 00:00:00'),
(16, '2024-11-29', 'stockin', 'indore', '2', 'buy', '', '', 35, '3', 1, 1, '2024-11-29 06:42:32', 0, '0000-00-00 00:00:00'),
(17, '2024-11-29', 'stockin', 'indore', '2', 'buy', '', '', 69, '9', 1, 1, '2024-11-29 06:42:32', 0, '0000-00-00 00:00:00'),
(18, '2024-11-29', 'stockout', 'indore', '2', 'outlet', '2', 'ZOJWALLA PETROLEUM', 33, '1', 1, 1, '2024-11-29 06:45:38', 0, '0000-00-00 00:00:00'),
(19, '2024-11-29', 'stockout', 'indore', '2', 'outlet', '2', 'ZOJWALLA PETROLEUM', 75, '1', 1, 1, '2024-11-29 06:45:38', 0, '0000-00-00 00:00:00'),
(20, '2024-11-29', 'stockout', 'indore', '2', 'outlet', '2', 'ZOJWALLA PETROLEUM', 35, '1', 1, 1, '2024-11-29 06:45:38', 0, '0000-00-00 00:00:00'),
(21, '2024-11-29', 'stockout', 'indore', '2', 'outlet', '2', 'ZOJWALLA PETROLEUM', 75, '', 1, 1, '2024-11-29 06:45:38', 0, '0000-00-00 00:00:00'),
(22, '2024-11-29', 'stockin', 'mumbai', '13', 'buy', '', '', 1, '0', 1, 1, '2024-11-29 06:47:39', 0, '0000-00-00 00:00:00'),
(23, '2024-11-29', 'stockin', 'mumbai', '13', 'buy', '', '', 1, '0', 1, 1, '2024-11-29 06:48:29', 0, '0000-00-00 00:00:00'),
(24, '2024-11-29', 'stockin', 'mumbai', '13', 'buy', '', '', 2, '0', 1, 1, '2024-11-29 06:48:29', 0, '0000-00-00 00:00:00'),
(25, '2024-11-29', 'stockin', 'mumbai', '13', 'buy', '', '', 3, '0', 1, 1, '2024-11-29 06:48:29', 0, '0000-00-00 00:00:00'),
(26, '2024-11-29', 'stockin', 'mumbai', '13', 'buy', '', '', 4, '00', 1, 1, '2024-11-29 06:48:29', 0, '0000-00-00 00:00:00'),
(27, '2024-11-29', 'stockin', 'mumbai', '13', 'buy', '', '', 5, '0', 1, 1, '2024-11-29 06:48:29', 0, '0000-00-00 00:00:00'),
(28, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 1, '', 0, 1, '2024-12-01 07:25:33', 0, '0000-00-00 00:00:00'),
(29, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 2, '', 0, 1, '2024-12-01 07:25:33', 0, '0000-00-00 00:00:00'),
(30, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 3, '', 0, 1, '2024-12-01 07:25:33', 0, '0000-00-00 00:00:00'),
(31, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 5, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(32, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 6, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(33, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 7, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(34, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 8, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(35, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 9, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(36, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 10, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(37, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 11, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(38, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 12, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(39, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 13, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(40, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 14, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(41, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 15, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(42, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 16, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(43, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 17, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(44, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 18, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(45, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 19, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(46, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 20, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(47, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 21, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(48, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 22, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(49, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 23, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(50, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 24, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(51, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 25, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(52, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 26, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(53, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 27, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(54, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 28, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(55, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 29, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(56, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 30, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(57, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 31, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(58, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 32, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(59, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 33, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(60, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 34, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(61, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 35, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(62, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 36, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(63, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 37, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(64, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 38, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(65, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 39, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(66, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 40, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(67, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 41, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(68, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 42, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(69, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 43, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(70, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 44, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(71, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 45, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(72, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 46, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(73, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 47, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(74, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 48, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(75, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 49, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(76, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 51, '', 0, 1, '2024-12-01 07:29:32', 0, '0000-00-00 00:00:00'),
(77, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 52, '0', 0, 1, '2024-12-01 07:31:54', 0, '0000-00-00 00:00:00'),
(78, '2024-12-01', 'stockin', 'mumbai', '3', 'buy', '', '', 1, '01', 0, 1, '2024-12-01 07:33:56', 0, '0000-00-00 00:00:00'),
(79, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 0, '2', 1, 1, '2024-12-01 23:53:55', 0, '0000-00-00 00:00:00'),
(80, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 4, '353', 0, 1, '2024-12-01 23:53:55', 0, '0000-00-00 00:00:00'),
(81, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 6, '62', 0, 1, '2024-12-01 23:53:55', 0, '0000-00-00 00:00:00'),
(82, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 8, '37', 0, 1, '2024-12-01 23:53:55', 0, '0000-00-00 00:00:00'),
(83, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 10, '90', 0, 1, '2024-12-01 23:53:55', 0, '0000-00-00 00:00:00'),
(84, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 13, '11', 0, 1, '2024-12-01 23:53:55', 0, '0000-00-00 00:00:00'),
(85, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 16, '2', 0, 1, '2024-12-01 23:53:55', 0, '0000-00-00 00:00:00'),
(86, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 18, '5', 0, 1, '2024-12-01 23:53:55', 0, '0000-00-00 00:00:00'),
(87, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 20, '84', 0, 1, '2024-12-01 23:53:55', 0, '0000-00-00 00:00:00'),
(88, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 21, '28', 0, 1, '2024-12-01 23:53:55', 0, '0000-00-00 00:00:00'),
(89, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 22, '67', 0, 1, '2024-12-01 23:53:55', 0, '0000-00-00 00:00:00'),
(90, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 23, '2', 0, 1, '2024-12-01 23:53:55', 0, '0000-00-00 00:00:00'),
(91, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 26, '40', 0, 1, '2024-12-01 23:53:55', 0, '0000-00-00 00:00:00'),
(92, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 27, '5', 0, 1, '2024-12-01 23:53:55', 0, '0000-00-00 00:00:00'),
(93, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 28, '1', 0, 1, '2024-12-01 23:53:55', 0, '0000-00-00 00:00:00'),
(94, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 29, '5', 0, 1, '2024-12-01 23:53:55', 0, '0000-00-00 00:00:00'),
(95, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 30, '72', 0, 1, '2024-12-01 23:53:55', 0, '0000-00-00 00:00:00'),
(96, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 0, '3', 1, 1, '2024-12-01 23:53:55', 0, '0000-00-00 00:00:00'),
(97, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 33, '44', 0, 1, '2024-12-01 23:53:55', 0, '0000-00-00 00:00:00'),
(98, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 34, '20', 0, 1, '2024-12-01 23:53:55', 0, '0000-00-00 00:00:00'),
(99, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 2, '2', 0, 1, '2024-12-02 00:24:19', 0, '0000-00-00 00:00:00'),
(100, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 35, '5', 0, 1, '2024-12-02 00:24:19', 0, '0000-00-00 00:00:00'),
(101, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 36, '16', 0, 1, '2024-12-02 00:24:19', 0, '0000-00-00 00:00:00'),
(102, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 39, '2', 0, 1, '2024-12-02 00:24:19', 0, '0000-00-00 00:00:00'),
(103, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 45, '9', 0, 1, '2024-12-02 00:24:19', 0, '0000-00-00 00:00:00'),
(104, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 47, '18', 0, 1, '2024-12-02 00:24:19', 0, '0000-00-00 00:00:00'),
(105, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 48, '1', 0, 1, '2024-12-02 00:24:19', 0, '0000-00-00 00:00:00'),
(106, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 49, '11', 0, 1, '2024-12-02 00:24:19', 0, '0000-00-00 00:00:00'),
(107, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 52, '4', 0, 1, '2024-12-02 00:24:19', 0, '0000-00-00 00:00:00'),
(108, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 58, '3', 0, 1, '2024-12-02 00:24:19', 0, '0000-00-00 00:00:00'),
(109, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 59, '3', 0, 1, '2024-12-02 00:24:19', 0, '0000-00-00 00:00:00'),
(110, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 61, '2', 0, 1, '2024-12-02 00:24:19', 0, '0000-00-00 00:00:00'),
(111, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 63, '1', 0, 1, '2024-12-02 00:24:19', 0, '0000-00-00 00:00:00'),
(112, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 66, '10', 0, 1, '2024-12-02 00:24:19', 0, '0000-00-00 00:00:00'),
(113, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 67, '1', 0, 1, '2024-12-02 00:24:19', 0, '0000-00-00 00:00:00'),
(114, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 68, '8', 0, 1, '2024-12-02 00:24:19', 0, '0000-00-00 00:00:00'),
(115, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 69, '2', 0, 1, '2024-12-02 00:24:19', 0, '0000-00-00 00:00:00'),
(116, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 70, '1', 0, 1, '2024-12-02 00:40:06', 0, '0000-00-00 00:00:00'),
(117, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 71, '3', 0, 1, '2024-12-02 00:40:06', 0, '0000-00-00 00:00:00'),
(118, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 72, '5', 0, 1, '2024-12-02 00:40:06', 0, '0000-00-00 00:00:00'),
(119, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 73, '4', 0, 1, '2024-12-02 00:40:06', 0, '0000-00-00 00:00:00'),
(120, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 74, '3', 0, 1, '2024-12-02 00:40:06', 0, '0000-00-00 00:00:00'),
(121, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 76, '2', 0, 1, '2024-12-02 00:40:06', 0, '0000-00-00 00:00:00'),
(122, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 77, '1', 0, 1, '2024-12-02 00:40:06', 0, '0000-00-00 00:00:00'),
(123, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 81, '60', 0, 1, '2024-12-02 00:40:06', 0, '0000-00-00 00:00:00'),
(124, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 85, '150', 0, 1, '2024-12-02 00:40:06', 0, '0000-00-00 00:00:00'),
(125, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 86, '68', 0, 1, '2024-12-02 00:40:06', 0, '0000-00-00 00:00:00'),
(126, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 111, '8', 0, 1, '2024-12-02 00:45:39', 0, '0000-00-00 00:00:00'),
(127, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 112, '22', 0, 1, '2024-12-02 00:45:39', 0, '0000-00-00 00:00:00'),
(128, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 113, '1', 0, 1, '2024-12-02 00:45:39', 0, '0000-00-00 00:00:00'),
(129, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 117, '1', 0, 1, '2024-12-02 00:45:39', 0, '0000-00-00 00:00:00'),
(130, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 121, '2', 0, 1, '2024-12-02 00:45:39', 0, '0000-00-00 00:00:00'),
(131, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 129, '61', 0, 1, '2024-12-02 00:45:39', 0, '0000-00-00 00:00:00'),
(132, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 130, '170', 0, 1, '2024-12-02 00:45:39', 0, '0000-00-00 00:00:00'),
(133, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 131, '90', 0, 1, '2024-12-02 00:45:39', 0, '0000-00-00 00:00:00'),
(134, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 132, '38', 0, 1, '2024-12-02 00:45:39', 0, '0000-00-00 00:00:00'),
(135, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 133, '15', 0, 1, '2024-12-02 00:45:39', 0, '0000-00-00 00:00:00'),
(136, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 134, '33', 0, 1, '2024-12-02 00:45:39', 0, '0000-00-00 00:00:00'),
(137, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 137, '42', 0, 1, '2024-12-02 00:45:39', 0, '0000-00-00 00:00:00'),
(138, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 149, '9', 0, 1, '2024-12-02 00:48:31', 0, '0000-00-00 00:00:00'),
(139, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 150, '7', 0, 1, '2024-12-02 00:48:31', 0, '0000-00-00 00:00:00'),
(141, '2024-12-03', 'stockin', 'chennai', '6', 'buy', '', '', 4, '0', 1, 1, '2024-12-03 04:26:04', 0, '0000-00-00 00:00:00'),
(142, '2024-12-03', 'stockin', 'chennai', '9', 'buy', '', '', 4, '0', 1, 1, '2024-12-03 04:26:32', 0, '0000-00-00 00:00:00'),
(143, '2024-12-03', 'stockin', 'chennai', '10', 'buy', '', '', 4, '0', 1, 1, '2024-12-03 04:26:47', 0, '0000-00-00 00:00:00'),
(144, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 32, '3', 0, 1, '2024-12-05 01:02:30', 0, '0000-00-00 00:00:00'),
(145, '2024-12-02', 'stockin', 'indore', '1', 'buy', '', '', 157, '68', 0, 0, '2024-12-05 06:35:48', 1, '2024-12-05 06:35:48'),
(146, '2024-12-02', 'stockin', 'mumbai', '3', 'buy', '', '', 65, '1', 0, 1, '2024-12-06 00:24:42', 0, '0000-00-00 00:00:00'),
(147, '2024-12-05', 'stockout', 'indore', '1', 'outlet', '', '', 47, '1', 0, 61, '2024-12-19 01:33:58', 0, '0000-00-00 00:00:00'),
(148, '2024-12-05', 'stockout', 'indore', '1', 'outlet', '', '', 18, '1', 0, 61, '2024-12-19 01:33:58', 0, '0000-00-00 00:00:00'),
(149, '2024-12-07', 'stockout', 'indore', '1', 'transfer', '5', '', 85, '150', 0, 61, '2024-12-19 01:35:26', 0, '0000-00-00 00:00:00'),
(150, '2024-12-07', 'stockout', 'indore', '1', 'transfer', '5', '', 131, '50', 0, 61, '2024-12-19 01:35:26', 0, '0000-00-00 00:00:00'),
(151, '2024-12-07', 'stockout', 'indore', '1', 'transfer', '5', '', 21, '24', 0, 61, '2024-12-19 01:35:26', 0, '0000-00-00 00:00:00'),
(152, '2024-12-07', 'stockin', '', '5', 'transfer', '1', '', 85, '150', 0, 61, '2024-12-19 01:35:26', 0, '0000-00-00 00:00:00'),
(153, '2024-12-07', 'stockin', '', '5', 'transfer', '1', '', 131, '50', 0, 61, '2024-12-19 01:35:26', 0, '0000-00-00 00:00:00'),
(154, '2024-12-07', 'stockin', '', '5', 'transfer', '1', '', 21, '24', 0, 61, '2024-12-19 01:35:26', 0, '0000-00-00 00:00:00'),
(155, '2024-12-07', 'stockout', 'indore', '1', 'transfer', '5', '', 69, '2', 0, 61, '2024-12-19 01:36:20', 0, '0000-00-00 00:00:00'),
(156, '2024-12-07', 'stockout', 'indore', '1', 'transfer', '5', '', 10, '90', 0, 61, '2024-12-19 01:36:20', 0, '0000-00-00 00:00:00'),
(157, '2024-12-07', 'stockin', '', '5', 'transfer', '1', '', 69, '2', 0, 61, '2024-12-19 01:36:20', 0, '0000-00-00 00:00:00'),
(158, '2024-12-07', 'stockin', '', '5', 'transfer', '1', '', 10, '90', 0, 61, '2024-12-19 01:36:20', 0, '0000-00-00 00:00:00'),
(159, '2024-12-07', 'stockout', 'indore', '1', 'outlet', '', 'vasuniya fuel centre', 26, '1', 0, 61, '2024-12-19 01:38:47', 0, '0000-00-00 00:00:00'),
(160, '2024-12-04', 'stockout', 'indore', '1', 'outlet', '', 'HADPL CUBE STOP', 26, '1', 0, 61, '2024-12-19 01:47:34', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `outlet`
--

CREATE TABLE `outlet` (
  `id` int NOT NULL,
  `sno` varchar(100) NOT NULL,
  `token` varchar(250) NOT NULL,
  `zone` varchar(100) NOT NULL,
  `branch` varchar(350) NOT NULL,
  `outlet_type` varchar(100) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `outlet_name` varchar(350) NOT NULL,
  `outlet_location` varchar(350) NOT NULL,
  `contact_name` varchar(250) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `earthing_chamber` varchar(10) NOT NULL,
  `checking_date` date DEFAULT NULL,
  `renewal_date` varchar(100) NOT NULL,
  `cvt` varchar(10) NOT NULL,
  `stabilizer` varchar(10) NOT NULL,
  `stp` varchar(10) NOT NULL,
  `yard_pole` varchar(10) NOT NULL,
  `canopy_light` varchar(10) NOT NULL,
  `pump` varchar(10) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `delete_status` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `outlet`
--

INSERT INTO `outlet` (`id`, `sno`, `token`, `zone`, `branch`, `outlet_type`, `customer_id`, `outlet_name`, `outlet_location`, `contact_name`, `contact_number`, `earthing_chamber`, `checking_date`, `renewal_date`, `cvt`, `stabilizer`, `stp`, `yard_pole`, `canopy_light`, `pump`, `status`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '24/00001', 'gurukripa-auto-service', 'mumbai', '3', '', '', 'GURUKRIPA AUTO SERVICE', 'SANPADA', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-10 08:05:40', 0, NULL),
(2, '24/00002', 'sri-balakumarran-agency', 'chennai', '9', '', '', 'SRI BALAKUMARRAN AGENCY', 'PEELEMEDU', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-10 08:21:57', 0, NULL),
(3, '24/00003', 'ajay-fuels', 'chennai', '8', '', '', 'AJAY FUELS', 'LALUGAPURAM', '', '', '', '2024-12-19', '2025-06-18', '', '', '', '', '', '', 'active', 0, 1, '2024-12-20 12:04:35', 0, NULL),
(4, '24/00004', 'std-fuels', 'chennai', '7', '', '', 'STD FUELS', 'ARANTHANGI ROAD', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-10 08:26:09', 0, NULL),
(5, '24/00005', 'baba-petroleum', 'mumbai', '11', '', '', 'BABA PETROLEUM', 'VALSAD', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-10 08:28:12', 0, NULL),
(6, '24/00006', 'venkatesh-automobiles', 'mumbai', '3', '', '', 'VENKATESH AUTOMOBILES', 'DOMBBIVLI', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-10 08:31:59', 0, NULL),
(7, '24/00007', 'balaji-petro-services', 'indore', '1', '', '12579670', 'BALAJI PETRO SERVICES', 'MANDLESHWAR ROAD', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 09:57:30', 1, '2024-12-04 09:57:30'),
(8, '24/00008', 'shri-ganesh-petroleum', 'indore', '2', '', '', 'SHRI GANESH PETROLEUM', 'BHOURA', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-10 08:39:26', 0, NULL),
(9, '24/00009', 'rudra-petroleum', 'indore', '5', '', '', 'RUDRA PETROLEUM', 'BISANWADA', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-10 08:43:36', 0, NULL),
(10, '24/00010', 'eagle-automotive', 'chennai', '8', '', '', 'EAGLE AUTOMOTIVE', 'PANANKULAM ', '', '', '', '2024-11-11', '2025-05-10', '', '', '', '', '', '', 'active', 0, 40, '2024-11-13 16:23:00', 0, NULL),
(11, '24/00011', 'savi-transport-earth-movers', 'chennai', '8', '', '', 'SAVI TRANSPORT & EARTH MOVERS ', 'PANAGIDI', '', '', '', '2024-11-12', '2025-05-11', '', '', '', '', '', '', 'active', 0, 40, '2024-11-14 09:59:31', 0, NULL),
(12, '24/00012', 'jk-fuel-service', 'chennai', '8', '', '', 'JK FUEL SERVICE', 'VALLIYUR', '', '', '', '2024-11-12', '2025-05-11', '', '', '', '', '', '', 'active', 0, 40, '2024-11-14 10:01:05', 0, NULL),
(13, '24/00013', 'shankar-agencies', 'chennai', '8', '', '', 'SHANKAR AGENCIES ', 'KAVALKINARU', '', '', '', '2024-11-12', '2025-05-11', '', '', '', '', '', '', 'active', 0, 40, '2024-11-14 10:01:57', 0, NULL),
(14, '24/00014', 'sriram-agency', 'chennai', '9', '', '', 'SRIRAM AGENCY ', 'THEETHIPALAYAM', '', '', '', '2024-11-12', '2025-05-11', '', '', '', '', '', '', 'active', 0, 40, '2024-11-13 16:25:08', 0, NULL),
(15, '24/00015', 'cp-marthachalam-co', 'chennai', '9', '', '', 'CP MARTHACHALAM & CO', 'THADAGAM ROAD', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-12 07:05:11', 0, NULL),
(16, '24/00016', 'sri-saravana-agencies', 'chennai', '9', '', '', 'SRI SARAVANA AGENCIES', 'VADAVALLI ', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-30 16:46:00', 1, '2024-11-30 16:46:00'),
(17, '24/00017', 'rv-agency', 'chennai', '9', '', '', 'RV AGENCY ', 'GANAPATHI', '', '', '', '2024-11-13', '2025-05-12', '', '', '', '', '', '', 'active', 0, 40, '2024-11-13 12:53:11', 0, NULL),
(18, '24/00018', 'balaji-service-sation', 'chennai', '9', '', '', 'BALAJI SERVICE SATION ', 'IDIKARAI', '', '', '', '2024-11-12', '2025-05-11', '', '', '', '', '', '', 'active', 0, 40, '2024-11-13 16:25:03', 0, NULL),
(19, '24/00019', 'sri-krishna-agencies', 'chennai', '7', '', '', 'SRI KRISHNA AGENCIES ', 'ORATHANADU ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-12 07:15:16', 0, NULL),
(20, '24/00020', 'tamil-eniyaa-fuel-station', 'chennai', '7', '', '', 'TAMIL ENIYAA FUEL STATION ', 'ARIMALAM', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-12 07:17:22', 0, NULL),
(21, '24/00021', 'trivikramma-agencies', 'chennai', '9', '', '', 'TRIVIKRAMMA AGENCIES', 'KK CHAVADI ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-13 06:21:34', 0, NULL),
(22, '24/00022', 'karamadai-lorry-owners-association', 'chennai', '9', '', '', 'KARAMADAI LORRY OWNERS ASSOCIATION', 'KARAMADAI', '', '', '', '2024-11-13', '2025-05-12', '', '', '', '', '', '', 'active', 0, 40, '2024-11-14 10:17:53', 0, NULL),
(23, '24/00023', 'pla-agencies-adhoc', 'chennai', '7', '', '', 'PLA AGENCIES ADHOC ', 'ALANGUDI', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-13 06:27:23', 0, NULL),
(24, '24/00024', 'sivaraman-co', 'chennai', '7', '', '', 'SIVARAMAN & CO', 'THANJAVUR', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-13 06:28:44', 0, NULL),
(25, '24/00025', 'hogan-fuels', 'chennai', '8', '', '', 'HOGAN FUELS', 'ARALVAIMOZHI', '', '', '', '2024-11-13', '2025-05-12', '', '', '', '', '', '', 'active', 0, 40, '2024-11-14 10:07:54', 0, NULL),
(26, '24/00026', 'g-johnsly-moses-petroleum', 'chennai', '8', '', '', 'G. JOHNSLY MOSES PETROLEUM ', 'KALIANKADU', '', '', '', '2024-11-13', '2025-05-12', '', '', '', '', '', '', 'active', 0, 40, '2024-11-14 10:07:23', 0, NULL),
(27, '24/00027', 'd-sankar-co', 'chennai', '8', '', '', 'D. SANKAR & CO ', 'RAMAVARMAPURAM ', '', '', '', '2024-11-13', '2025-05-12', '', '', '', '', '', '', 'active', 0, 40, '2024-11-14 10:06:41', 0, NULL),
(28, '24/00028', 'agni-balaji-agencies', 'chennai', '9', '', '', 'AGNI BALAJI AGENCIES ', 'POLLACHI ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-14 06:08:41', 0, NULL),
(29, '24/00029', 'sri-jayam-agency-adhoc', 'chennai', '7', '', '', 'SRI JAYAM AGENCY ADHOC ', 'ORATHANADU ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-14 06:17:54', 0, NULL),
(30, '24/00030', 'angarajulu-naidu-sons', 'chennai', '7', '', '', 'ANGARAJULU NAIDU & SONS', 'ADIRAMAPATTINAM ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-14 06:20:52', 0, NULL),
(31, '24/00031', 'bhairavnath-petroleum-services', 'mumbai', '4', '', '12558920', ' BHAIRAVNATH PETROLEUM SERVICES ', 'LAVANGI', '', '', '', '2024-12-02', '2025-06-01', '', '', '', '', '', '', 'active', 0, 1, '2024-12-02 10:38:21', 0, NULL),
(32, '24/00032', 'the-coimbatore-district-consumers-co-op', 'chennai', '9', '', '', 'THE COIMBATORE DISTRICT CONSUMERS CO -OP ', 'RS PURAM', '', '', '', '2024-11-15', '2025-05-14', '', '', '', '', '', '', 'active', 0, 40, '2024-11-16 10:41:38', 0, NULL),
(33, '24/00033', 'sree-rajarajeshwari-enterprises', 'chennai', '8', '', '', 'SREE RAJARAJESHWARI ENTERPRISES', 'THARUVAI', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-15 07:12:19', 0, NULL),
(34, '24/00034', 'ramani-agencies', 'chennai', '8', '', '', 'RAMANI AGENCIES', 'KISHNAPURAM', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-15 07:13:46', 0, NULL),
(35, '24/00035', 'ashokratna-petroleum', 'mumbai', '4', '', '12540950', 'ASHOKRATNA PETROLEUM', 'PANDHARPUR', '', '', '', '2024-12-05', '2025-06-04', '', '', '', '', '', '', 'active', 0, 1, '2024-12-11 11:15:17', 0, NULL),
(36, '24/00036', 'jai-sai-raj-fuel-fil', 'chennai', '9', '', '', 'JAI SAI RAJ FUEL FIL', 'ANNUR', '', '', '', '2024-11-16', '2025-05-15', '', '', '', '', '', '', 'active', 0, 40, '2024-11-20 09:29:26', 0, NULL),
(37, '24/00037', 'pooviya-agency', 'chennai', '9', '', '', 'POOVIYA AGENCY ', 'COIMBATORE', '', '', '', '2024-11-16', '2025-05-15', '', '', '', '', '', '', 'active', 0, 40, '2024-11-20 09:31:07', 0, NULL),
(38, '24/00038', 'igp-petroleum', 'chennai', '8', '', '', 'IGP PETROLEUM', 'CHITRAMCODE', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-16 05:17:55', 0, NULL),
(39, '24/00039', 'bhosale-patil-highway-services', 'mumbai', '4', '', '12575960', 'BHOSALE PATIL HIGHWAY SERVICES', 'PANDHARPUR', '', '', '', '2024-12-05', '2025-06-04', '', '', '', '', '', '', 'active', 0, 1, '2024-12-11 11:48:17', 0, NULL),
(40, '24/00040', 'gawade-petroleum', 'mumbai', '4', '', '12175700', ' GAWADE PETROLEUM, ', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-18 00:43:05', 0, NULL),
(41, '24/00041', 'digambarraoji-bagal-petroleum', 'mumbai', '4', '', '11459220', ' DIGAMBARRAOJI BAGAL PETROLEUM, ', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-18 00:43:45', 0, NULL),
(42, '24/00042', 'om-sai-services-kasegaon', 'mumbai', '4', '', '12558970', 'OM SAI SERVICES KASEGAON ', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-18 01:08:27', 0, NULL),
(43, '24/00043', 'pandurang-petroleum-services', 'mumbai', '4', '', '12561720', 'PANDURANG  PETROLEUM SERVICES', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-18 01:09:21', 0, NULL),
(44, '24/00044', 'pant-nagar-petroleum', 'mumbai', '4', '', '12575950', 'PANT NAGAR PETROLEUM, ', 'PANDHARPUR', '', '', '', '2024-12-02', '2025-06-01', '', '', '', '', '', '', 'active', 0, 1, '2024-12-11 07:18:31', 1, '2024-11-18 06:40:02'),
(45, '24/00045', 'siddhanath-petroleum', 'mumbai', '4', '', '12596460', 'SIDDHANATH PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-18 01:10:51', 0, NULL),
(46, '24/00046', 'shri-hari-highway-services', 'mumbai', '4', '', '12611010', 'SHRI HARI HIGHWAY SERVICES', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-18 01:12:08', 0, NULL),
(47, '24/00047', 'adarsh-anand-shinde-petroleum', 'mumbai', '4', '', '41047736', 'ADARSH ANAND SHINDE PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-18 01:12:33', 0, NULL),
(48, '24/00048', 'sonai-petroleum-services', 'mumbai', '4', '', '41066762', 'SONAI PETROLEUM SERVICES', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-18 01:13:12', 0, NULL),
(49, '24/00049', 'sri-ram-highway-centre', 'mumbai', '4', '', '11019210', 'SRI RAM HIGHWAY CENTRE', 'PANDHARPUR', '', '', '', '2024-12-06', '2025-06-05', '', '', '', '', '', '', 'active', 0, 1, '2024-12-11 12:16:53', 0, NULL),
(50, '24/00050', 'rahul-petroleum', 'mumbai', '4', '', '11014320', ' RAHUL PETROLEUM', 'PANDARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-18 01:16:04', 0, NULL),
(51, '24/00051', 'uma-agencies', 'chennai', '9', '', '', 'UMA AGENCIES', 'PERIYANAYAKKAN PALAYAM ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-18 07:40:45', 0, NULL),
(52, '24/00052', 'narashimman-agencies', 'chennai', '9', '', '', 'NARASHIMMAN AGENCIES ', 'PN PUDHUR', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-18 07:41:55', 0, NULL),
(53, '24/00053', 's-ramesh-bros', 'chennai', '9', '', '', 'S RAMESH & BROS', 'METTUPALAYAM ', '', '', '', '2024-11-18', '2025-05-17', '', '', '', '', '', '', 'active', 0, 40, '2024-11-20 09:36:33', 0, NULL),
(54, '24/00054', 'prsad-co', 'chennai', '9', '', '', 'PRSAD & CO', 'UKKADAM', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-18 07:45:10', 0, NULL),
(55, '24/00055', 'rajkamal-agencies', 'chennai', '9', '', '', 'BSV & BROS ADHOC ', 'GANDHIPURAM', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-13 12:13:47', 40, '2024-12-13 12:13:47'),
(56, '24/00056', 'arushya-fuels', 'chennai', '8', '', '', 'ARUSHYA FUELS ', 'NARIYUTHU', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-18 07:48:39', 0, NULL),
(57, '24/00057', 'devi-fuels', 'chennai', '8', '', '', 'DEVI FUELS ', 'MANOOR', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-18 07:49:47', 0, NULL),
(58, '24/00058', 'indira-rajan-fuels', 'chennai', '8', '', '', 'INDIRA RAJAN FUELS ', 'KANARPATTI', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-18 07:51:08', 0, NULL),
(59, '24/00059', 'amol-petroleum', 'mumbai', '4', '', '11022210', 'AMOL PETROLEUM', 'PANDARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:25:17', 0, NULL),
(60, '24/00060', 'datta-highway-station', 'mumbai', '4', '', '11025110', ' DATTA HIGHWAY STATION', 'PANDARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:25:48', 0, NULL),
(61, '24/00061', 'kade-brothers-agro-auto-centre', 'mumbai', '4', '', '11137010', ' KADE BROTHERS AGRO AUTO CENTRE', 'PANDARPUR', '', '', '', '2024-12-05', '2025-06-04', '', '', '', '', '', '', 'active', 0, 1, '2024-12-11 11:42:19', 0, NULL),
(62, '24/00062', 'a-r-shah', 'mumbai', '4', '', '11162010', 'A R SHAH', 'PANDARPUR', '', '', '', '2024-12-01', '2025-05-31', '', '', '', '', '', '', 'active', 0, 1, '2024-12-11 06:07:59', 1, '2024-12-03 08:27:41'),
(63, '24/00063', 'digamber-petroleum', 'mumbai', '4', '100', '11215310', ' DIGAMBER PETROLEUM', 'PANDARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:27:18', 0, NULL),
(64, '24/00064', 'pandurang-petroleum', 'mumbai', '4', '', '11353610', ' PANDURANG PETROLEUM', 'PANDARPUR', '', '', '', '2024-12-04', '2025-06-03', '', '', '', '', '', '', 'active', 0, 1, '2024-12-11 09:29:08', 0, NULL),
(65, '24/00065', 'siddhi-petro-oasis', 'mumbai', '4', '', '11459780', ' SIDDHI PETRO OASIS', 'PANDARPUR', '', '', '', '2024-12-03', '2025-06-02', '', '', '', '', '', '', 'active', 0, 1, '2024-12-11 07:25:24', 0, NULL),
(66, '24/00066', 'sanjay-highway-petroleum', 'mumbai', '4', '', '12174200', ' SANJAY HIGHWAY PETROLEUM', 'PANDARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:29:02', 0, NULL),
(67, '24/00067', 'shri-siddhanath-petroleum', 'mumbai', '4', '', '12174280', ' SHRI SIDDHANATH PETROLEUM', 'PANDARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:29:22', 0, NULL),
(68, '24/00068', 'rituraj-petroleum', 'mumbai', '4', '', '12174290', ' RITURAJ PETROLEUM', 'PANDARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:30:15', 0, NULL),
(69, '24/00069', 'sumit-petroleum', 'mumbai', '4', '', '12174400', ' SUMIT PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:30:53', 0, NULL),
(70, '24/00070', 'hazare-petroleum', 'mumbai', '4', '', '12174440', ' HAZARE PETROLEUM', 'PANDHARPUR', '', '', '', '2024-12-01', '2025-05-31', '', '', '', '', '', '', 'active', 0, 1, '2024-12-11 06:18:01', 0, NULL),
(71, '24/00071', 'venkateshwara-fuels', 'mumbai', '4', '', '12174630', ' VENKATESHWARA FUELS', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:32:01', 0, NULL),
(72, '24/00072', 'shree-sai-vitthal-petroleum', 'mumbai', '4', '', '12174680', ' SHREE SAI VITTHAL PETROLEUM', 'PANDHARPUR', '', '', '', '2024-12-04', '2025-06-03', '', '', '', '', '', '', 'active', 0, 1, '2024-12-11 09:38:33', 0, NULL),
(73, '24/00073', 'shree-pandurang-petroleum', 'mumbai', '4', '', '12174740', ' SHREE PANDURANG PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:37:11', 0, NULL),
(74, '24/00074', 'p-b-patil-petroleum', 'mumbai', '4', '', '12174750', ' P B PATIL PETROLEUM', 'PANDHARPUR', '', '', '', '2024-12-01', '2025-05-31', '', '', '', '', '', '', 'active', 0, 1, '2024-12-11 06:14:35', 0, NULL),
(75, '24/00075', 'kshrisagar-petroleum', 'mumbai', '4', '', '12174780', ' KSHRISAGAR PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:37:56', 0, NULL),
(76, '24/00076', 'abhinav-petroleum-services', 'mumbai', '4', '', '12174790', ' ABHINAV PETROLEUM SERVICES', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:38:16', 0, NULL),
(77, '24/00077', 'sai-petroleum-services', 'mumbai', '4', '', '12174900', ' SAI PETROLEUM SERVICES', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:38:36', 0, NULL),
(78, '24/00078', 'siddharaj-petroleum', 'mumbai', '4', '100', '12175430', ' SIDDHARAJ PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:39:06', 0, NULL),
(79, '24/00079', 'm-k-petroleum', 'mumbai', '4', '', '12175560', ' M K PETROLEUM', 'PANDHARPUR', '', '', '', '2024-12-04', '2025-06-03', '', '', '', '', '', '', 'active', 0, 1, '2024-12-11 09:35:35', 0, NULL),
(80, '24/00080', 'phule-petroleum', 'mumbai', '4', '', '12175590', ' PHULE PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:39:56', 0, NULL),
(81, '24/00081', 'gajanan-petroleum', 'mumbai', '4', '', '12175600', ' GAJANAN PETROLEUM', 'PANDHARPUR', '', '', '', '2024-12-02', '2025-06-01', '', '', '', '', '', '', 'active', 0, 1, '2024-12-02 10:31:43', 0, NULL),
(82, '24/00082', 'dattatray-petroleum', 'mumbai', '4', '', '12175610', ' DATTATRAY PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:40:39', 0, NULL),
(83, '24/00083', 'kohinoor-petroleum', 'mumbai', '4', '', '12175830', ' KOHINOOR PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:41:05', 0, NULL),
(84, '24/00084', 'raut-highway-services-12175840', 'mumbai', '4', '', '12175840', ' RAUT HIGHWAY SERVICES, 12175840', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:41:30', 0, NULL),
(85, '24/00085', 'selvam-agncies', 'chennai', '9', '', '', 'SELVAM AGNCIES ', 'METTUPALAYAM ', '', '', '', '2024-11-19', '2025-05-18', '', '', '', '', '', '', 'active', 0, 40, '2024-11-20 09:34:30', 0, NULL),
(86, '24/00086', 'chavadi-petroleum', 'chennai', '9', '', '', 'CHAVADI PETROLEUM ', 'BIG BAZAAR STREET ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-19 07:24:42', 0, NULL),
(87, '24/00087', 'palani-andavar-agencies', 'chennai', '9', '', '', 'PALANI ANDAVAR AGENCIES', 'PETHIKUTTAI', '', '', '', '2024-11-19', '2025-05-18', '', '', '', '', '', '', 'active', 0, 40, '2024-11-20 09:33:11', 0, NULL),
(88, '24/00088', 'apn-petroleum', 'chennai', '8', '', '', 'APN PETROLEUM ', 'VENKATESWARAPURAM', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-19 07:28:13', 0, NULL),
(89, '24/00089', 'manis-a1-fuels', 'chennai', '8', '', '', 'MANIS A1 FUELS ', 'EDAIKAL', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-19 07:29:13', 0, NULL),
(90, '24/00090', 'scs-agencies', 'chennai', '7', '', '', 'SCS AGENCIES ', 'ARANTHANGI', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-20 04:24:15', 0, NULL),
(91, '24/00091', 'hp-office', 'chennai', '7', '', '', 'HP OFFICE', 'TRICHY', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-20 04:25:36', 0, NULL),
(92, '24/00092', 'siraj', 'chennai', '7', '', '', 'SIRAJ', 'KARANTHAI,THANJAVUR', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-20 04:26:53', 0, NULL),
(93, '24/00093', 'koushik-agencies', 'chennai', '7', '', '', 'KOUSHIK AGENCIES ', 'KABISTHALAM', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-20 04:28:20', 0, NULL),
(94, '24/00094', 'uma-traders-adhoc', 'chennai', '8', '', '', 'UMA TRADERS ADHOC ', 'TIRUNELVELI', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-20 04:33:41', 0, NULL),
(95, '24/00095', 'sri-pon-fuels', 'chennai', '8', '', '', 'SRI PON FUELS ', 'CHITTHARCHARAM', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-20 04:34:50', 0, NULL),
(96, '24/00096', 'sri-sundari-enterprises', 'chennai', '8', '', '', 'SRI SUNDARI ENTERPRISES ', 'DEVARKULAM', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-20 04:35:50', 0, NULL),
(97, '24/00097', 'valliyammai-fuels', 'chennai', '8', '', '', 'VALLIYAMMAI FUELS ', 'VANNIKOENDAL ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-20 04:37:14', 0, NULL),
(98, '24/00098', 'sri-saravana-co', 'chennai', '8', '', '', 'SRI SARAVANA & CO ', 'KEELA KALANGAL', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-20 04:38:30', 0, NULL),
(99, '24/00099', 'geeth-petros', 'chennai', '8', '', '', 'GEETH PETROS', 'THIRUVIRUTHANPULLEY', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-20 04:39:45', 0, NULL),
(100, '24/00100', 'sree-rarajeshwari-enterprises', 'chennai', '8', '', '', 'SREE RARAJESHWARI ENTERPRISES ', 'THARUVAI', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-20 04:42:22', 0, NULL),
(101, '24/00101', 'selva-vinayaga-tradings', 'chennai', '9', '', '', 'SELVA VINAYAGA TRADINGS ', 'KARUMATHAMPATTY', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-20 04:50:05', 0, NULL),
(102, '24/00102', 'sam-petroleum', 'chennai', '9', '', '', 'SAM PETROLEUM ', 'KARUMATHAMPATTY', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-20 04:51:36', 0, NULL),
(103, '24/00103', 'p-madalaimuthu-sons', 'chennai', '9', '', '', 'P MADALAIMUTHU & SONS ', 'COIMBATORE ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-20 04:53:23', 0, NULL),
(104, '24/00104', 'sivaraman-co-adhoc', 'chennai', '7', '', '', 'SIVARAMAN & CO ADHOC ', 'TRICHY', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-20 05:01:16', 0, NULL),
(105, '24/00105', 'skp-petroleum', 'chennai', '9', '', '', 'SKP PETROLEUM ', 'KADUVETTIPALAYAM ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-21 06:53:41', 0, NULL),
(106, '24/00106', 'srt-fuels', 'chennai', '9', '', '', 'SRT FUELS', 'VADAKKU THOTTAM ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-21 06:54:59', 0, NULL),
(107, '24/00107', 'angaalamman-fuels', 'chennai', '9', '', '', 'ANGAALAMMAN FUELS ', 'VILANKURICHI ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-21 06:56:22', 0, NULL),
(108, '24/00108', 'maruthi-fuels', 'chennai', '7', '', '', 'MARUTHI FUELS', 'SETHUBAVA CHATRAM', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-21 07:00:28', 0, NULL),
(109, '24/00109', 'rohan-petroleum', 'chennai', '8', '', '', 'ROHAN PETROLEUM ', 'CHINNAMUTTOM ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-21 07:02:40', 0, NULL),
(110, '24/00110', 'maruthi-petroleum', 'chennai', '8', '', '', 'MARUTHI PETROLEUM ', 'THOVALAI ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-21 07:03:44', 0, NULL),
(111, '24/00111', 'hp-auto-center-kolar', 'indore', '2', '', '', 'HP AUTO CENTER ,KOLAR ', 'KOLAR ', '', '', '', '2024-11-23', '2025-05-22', '', '', '', '', '', '', 'active', 0, 18, '2024-11-23 11:32:47', 0, NULL),
(112, '24/00112', 'united-sals-service-station', 'indore', '2', '', '', 'UNITED SALS & SERVICE STATION ', 'PANJAB BAGH', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 18, '2024-11-23 06:07:34', 0, NULL),
(113, '24/00113', 'panjab-service-station', 'indore', '2', '', '', 'PANJAB SERVICE STATION ', 'LAL GHATI ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 18, '2024-11-23 06:10:00', 0, NULL),
(114, '24/00114', 'amd-petroleum', 'indore', '2', '', '', 'AMD PETROLEUM ', 'BARKHEDI KALAN', '', '', '', '2024-11-23', '2025-05-22', '', '', '', '', '', '', 'active', 0, 18, '2024-11-23 11:44:51', 0, NULL),
(115, '24/00115', 'sai-amrut-fuels', 'indore', '1', '', '12509830', 'SAI AMRUT FUELS ', 'ATAHEDA', '', '', '', '2024-11-23', '2025-05-22', '', '', '', '', '', '', 'active', 0, 18, '2024-12-04 09:56:01', 1, '2024-12-04 09:56:01'),
(116, '24/00116', 'shri-sai-kalmal-fuels', 'indore', '1', '', '12588720', 'SHRI SAI KAMAL FUELS ', 'HATOD ', '', '', '', '2024-11-23', '2025-05-22', '', '', '', '', '', '', 'active', 0, 18, '2024-12-04 09:54:57', 1, '2024-12-04 09:54:57'),
(117, '24/00117', 'shree-radhakrishna-petroleum', 'mumbai', '12', '', '', 'SHREE RADHAKRISHNA PETROLEUM', 'PIMPALGAON KHAMB', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 18, '2024-11-23 06:46:08', 0, NULL),
(118, '24/00118', 'metha-petroleum-adhoc', 'mumbai', '11', '', '', 'METHA PETROLEUM ADHOC ', 'VAPI TOWN ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 18, '2024-11-23 06:51:42', 0, NULL),
(119, '24/00119', 'sri-enterprises', 'chennai', '8', '', '', 'SRI ENTERPRISES ', 'PAVOORCHATRAM', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-23 06:59:33', 0, NULL),
(120, '24/00120', 'narmatha-agencies', 'chennai', '8', '', '', 'NARMATHA AGENCIES', 'SURANDAI ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-23 07:00:38', 0, NULL),
(121, '24/00121', 'janbu-adhoc', 'chennai', '8', '', '', 'JANBU ADHOC ', 'TIRUNELVELI', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-23 07:01:41', 0, NULL),
(122, '24/00122', 'j-padma', 'chennai', '8', '', '', 'J PADMA ', 'KADAVUNALLUR', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-23 07:02:27', 0, NULL),
(123, '24/00123', 'ss-agencies', 'chennai', '8', '', '', 'SS AGENCIES ', 'SIVAGIRI', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-23 07:03:26', 0, NULL),
(124, '24/00124', 'pe-sakthinarayanan', 'chennai', '8', '', '', 'PE SAKTHINARAYANAN', 'TIRUNELVELI', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-23 07:04:26', 0, NULL),
(125, '24/00125', 'sri-trupathi-fuels', 'chennai', '8', '', '', 'SRI TRUPATHI FUELS ', 'SATHIRAPATTI', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-23 07:05:24', 0, NULL),
(126, '24/00126', 'jeyadhanu-agencies', 'chennai', '8', '', '', 'JEYADHANU AGENCIES ', 'TIRUVENGADAM', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-23 07:06:35', 0, NULL),
(127, '24/00127', 'shri-dhandayuthapani-agencies', 'chennai', '8', '', '', 'SHRI DHANDAYUTHAPANI AGENCIES ', 'KARIVALAMVANDANALLUR', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-23 07:08:11', 0, NULL),
(128, '24/00128', 'kumaran-agencies', 'chennai', '8', '', '', 'KUMARAN AGENCIES ', 'SAKRANKOIL', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-23 07:09:13', 0, NULL),
(129, '24/00129', 'sri-dhanalakshmi-oil-rice-mills', 'chennai', '8', '', '', 'SRI DHANALAKSHMI OIL & RICE MILLS ', 'SANKARANKOIL', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-23 07:10:21', 0, NULL),
(130, '24/00130', 'nk-enterprises', 'chennai', '9', '', '', 'NK ENTERPRISES', 'CHENNI MALAI', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-23 07:20:40', 0, NULL),
(131, '24/00131', 'gkp-oils', 'chennai', '9', '', '', 'GKP OILS', 'KOVILMEDU PIRIVU ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-23 07:23:53', 0, NULL),
(132, '24/00132', 'betma-filling-station', 'indore', '1', '', '12509820', 'BETMA FILLING STATION', 'INDORE W', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 09:50:34', 1, '2024-12-04 09:50:34'),
(133, '24/00133', 'zojwalla-petroleum', 'mumbai', '3', '', '', 'ZOJWALLA PETROLEUM', 'KALYAN', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-29 06:23:54', 0, NULL),
(134, '24/00134', 'shivkrupa-petroleum', 'mumbai', '4', '', '', 'SHIVKRUPA PETROLEUM', 'MACHNUR', 'Solapur', '', '', '2024-12-01', '2025-05-31', '', '', '', '', '', '', 'active', 0, 1, '2024-12-11 06:27:09', 0, NULL),
(135, '24/00135', 'choudhari-petroleum', 'mumbai', '4', '', '', 'Choudhari petroleum', 'Mohal', 'Solapur', '', '', '2024-12-01', '2025-05-31', '', '', '', '', '', '', 'active', 0, 1, '2024-12-11 06:22:37', 0, NULL),
(136, '24/00136', 'awatade-petroleum', 'mumbai', '4', '', '', 'AWATADE PETROLEUM', 'Mangalwedha', 'SOLAPUR', '', '', '2024-12-01', '2025-05-31', '', '', '', '', '', '', 'active', 0, 1, '2024-12-11 06:19:50', 0, NULL),
(137, '24/00137', 'jayprakash-bile-petroleum', 'mumbai', '4', '', '', 'JAYPRAKASH BILE PETROLEUM', 'SANGOLA', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-01 08:11:15', 0, NULL),
(138, '24/00138', 'maa-gayatri-filling-station', 'indore', '1', '', '12563410', 'MAA GAYATRI FILLING STATION', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 09:46:43', 1, '2024-12-04 09:46:43'),
(139, '24/00139', 'surwase-petroleum', 'mumbai', '4', '', '12528290', 'SURWASE PETROLEUM', 'SOLAPUR 2', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-02 04:44:38', 0, NULL),
(140, '24/00140', 'om-sai-raj-petroleum', 'mumbai', '4', '', '12528520', 'OM SAI RAJ PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-02 04:46:53', 0, NULL),
(141, '24/00141', 'karmayogi-petroleum', 'mumbai', '4', '', '12558930', 'KARMAYOGI PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-02 04:50:58', 0, NULL),
(142, '24/00142', 'aadhya-petroleum', 'mumbai', '4', '', '12559000', 'AADHYA PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-02 04:51:40', 0, NULL),
(143, '24/00143', 'shyam-petroleum', 'mumbai', '4', '', '12559640', 'SHYAM PETROLEUM', 'SOLAPUR 2', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-02 04:52:18', 0, NULL),
(144, '24/00144', 'ghorpade-petroleum', 'mumbai', '4', '', '12559700', 'GHORPADE PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-02 04:53:08', 0, NULL),
(145, '24/00145', 'sudarshan-highway-station', 'mumbai', '4', '', '12562900', 'SUDARSHAN HIGHWAY STATION', 'SOLAPUR 2', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-02 04:54:05', 0, NULL),
(146, '24/00146', 'abhinav-petroleum', 'mumbai', '4', '', '12568650', 'ABHINAV PETROLEUM', 'SOLAPUR 2', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-02 04:54:46', 0, NULL),
(147, '24/00147', 'dattakrupa-petroleum', 'mumbai', '4', '', '12581090', 'DATTAKRUPA PETROLEUM', 'PANDHARPUR', '', '', '', '2024-12-04', '2025-06-03', '', '', '', '', '', '', 'active', 0, 1, '2024-12-11 09:24:31', 0, NULL),
(148, '24/00148', 'bangosavi-petroleum', 'mumbai', '4', '', '12581100', 'BANGOSAVI PETROLEUM', 'PANDHARPUR', '', '', '', '2024-12-04', '2025-06-03', '', '', '', '', '', '', 'active', 0, 1, '2024-12-11 11:07:14', 0, NULL),
(149, '24/00149', 'pritam-petroleum', 'mumbai', '4', '', '12587780', 'PRITAM PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-02 04:56:59', 0, NULL),
(150, '24/00150', 'rubiraj-petroleum', 'mumbai', '4', '', '', 'RUBIRAJ PETROLEUM', 'PANDHARPUR', '', '', '', '2024-12-02', '2025-06-01', '', '', '', '', '', '', 'active', 0, 1, '2024-12-11 07:14:37', 0, NULL),
(151, '24/00151', 'jai-jinendra-petro-services', 'indore', '1', '', '12555870', 'JAI JINENDRA PETRO SERVICES', 'DHAR', '', '', '', '2024-12-02', '2025-06-01', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 09:42:36', 1, '2024-12-04 09:42:36'),
(152, '24/00152', 'shri-guru-krupa-service-centre', 'indore', '1', '', '12543290', 'SHRI GURU KRUPA SERVICE CENTRE', 'DHAR', '', '', '', '2024-12-02', '2025-06-01', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 09:45:59', 1, '2024-12-04 09:45:59'),
(153, '24/00153', 'laxmikantam-filling-station', 'indore', '1', '', '12595880', 'LAXMIKANTAM FILLING STATION', 'DHAR', '', '', '', '2024-12-03', '2025-06-02', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 09:45:06', 1, '2024-12-04 09:45:06'),
(154, '24/00154', 'shree-petroleum', 'indore', '1', '', '12594590', 'SHREE PETROLEUM', 'DHAR', '', '', '', '2024-12-03', '2025-06-02', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 09:43:51', 1, '2024-12-04 09:43:51'),
(155, '24/00155', 'soni-sons-fuel-station', 'indore', '2', '', '12582450', 'SONI & SONS FUEL STATION', 'Sehore', '', '', '', '2024-12-01', '2025-05-31', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 07:12:10', 0, NULL),
(156, '24/00156', 'sahu-fuel-point', 'indore', '2', '', '12580180', 'SAHU FUEL POINT', 'Sehore', '', '', '', '2024-12-01', '2025-05-31', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 07:17:42', 0, NULL),
(157, '24/00157', 'shree-vyas-fuel-point', 'indore', '2', '', '12571880', 'SHREE VYAS FUEL POINT', 'Sehore', '', '', '', '2024-12-01', '2025-05-31', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 07:31:57', 0, NULL),
(158, '24/00158', 'suraj-service-station', 'indore', '2', '', '12587350', 'SURAJ SERVICE STATION', 'Sehore', '', '', '', '2024-12-01', '2025-05-31', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 07:37:00', 0, NULL),
(159, '24/00159', 'raghu-diesels', 'indore', '2', '', '12519240', 'RAGHU DIESELS', 'Sehore', '', '', '', '2024-12-01', '2025-05-31', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 07:46:02', 0, NULL),
(160, '24/00160', 'capital-auto-service', 'indore', '2', '', '12781820', 'CAPITAL AUTO SERVICE', 'Sehore', '', '', '', '2024-12-02', '2025-06-01', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 07:49:40', 0, NULL),
(161, '24/00161', 'meher-filling-station', 'indore', '2', '', '12225600', 'MEHER FILLING STATION', 'Sehore', '', '', '', '2024-12-02', '2025-06-01', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 07:54:13', 0, NULL),
(162, '24/00162', 'gd-gautam-energy-station', 'indore', '2', '', '12572710', 'G.D. GAUTAM ENERGY STATION', 'Sehore', '', '', '', '2024-12-02', '2025-06-01', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 08:00:15', 0, NULL),
(163, '24/00163', 'triveni-fuel-services', 'indore', '2', '', '', 'TRIVENI FUEL SERVICES', 'BETUL', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 02:37:04', 0, NULL),
(164, '24/00164', 'vishal-sakshi-petroleum', 'mumbai', '4', '', '12590840', 'VISHAL SAKSHI PETROLEUM', 'PANDHARPUR', '', '', '', '2024-12-04', '2025-06-03', '', '', '', '', '', '', 'active', 0, 1, '2024-12-11 09:31:37', 0, NULL),
(165, '24/00165', 'greenstar-petroleum-services', 'mumbai', '4', '', '12590850', 'GREENSTAR PETROLEUM SERVICES', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 02:47:39', 0, NULL),
(166, '24/00166', 'sunchaya-petroleum', 'mumbai', '4', '', '12590860', 'SUNCHAYA PETROLEUM', 'SOLAPUR 2', '', '', '', '2024-12-05', '2025-06-04', '', '', '', '', '', '', 'active', 0, 1, '2024-12-11 11:46:13', 0, NULL),
(167, '24/00167', 'krishi-utpanna-bazar-samiti-sangol', 'mumbai', '4', '', '12590870', 'KRISHI UTPANNA BAZAR SAMITI SANGOL', 'SOLAPUR 2', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 02:49:58', 0, NULL),
(168, '24/00168', 'hindakesari-petroleum', 'mumbai', '4', '', '12590900', 'HINDAKESARI PETROLEUM', 'SOLAPUR 2', '', '', '', '2024-12-03', '2025-06-02', '', '', '', '', '', '', 'active', 0, 1, '2024-12-11 07:47:14', 0, NULL),
(169, '24/00169', 'samarth-petroleum', 'mumbai', '4', '', '12590910', 'SAMARTH PETROLEUM', 'PANDHARPUR', '', '', '', '2024-12-03', '2025-06-02', '', '', '', '', '', '', 'active', 0, 1, '2024-12-11 07:29:11', 0, NULL),
(170, '24/00170', 'shri-swami-samartha-petroleum', 'mumbai', '4', '', '12595140', 'SHRI SWAMI SAMARTHA PETROLEUM', 'PANDHARPUR', '', '', '', '2024-12-04', '2025-06-03', '', '', '', '', '', '', 'active', 0, 1, '2024-12-11 10:36:28', 0, NULL),
(171, '24/00171', 'krishi-utpana-bajar-samiti-akluj', 'mumbai', '4', '', '12581040', 'KRISHI UTPANA BAJAR SAMITI AKLUJ', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 02:59:27', 0, NULL),
(172, '24/00172', 'awtade-petroleum', 'mumbai', '4', '', '12611020', 'AWTADE PETROLEUM', 'SOLAPUR 2', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 03:00:13', 0, NULL),
(173, '24/00173', 'krishi-utpanna-bazar-samiti-mals', 'mumbai', '4', '', '12697470', 'KRISHI UTPANNA BAZAR SAMITI MALS', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 03:01:47', 0, NULL),
(174, '24/00174', 'sonai-petroleum', 'mumbai', '4', '', '12698680', 'SONAI PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 03:03:21', 0, NULL),
(175, '24/00175', 'sonaj-and-company', 'mumbai', '4', '', '11239020', ' SONAJ AND COMPANY', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 03:49:50', 0, NULL),
(176, '24/00176', 'ishwar-petroleum', 'mumbai', '4', '', '12173860', 'ISHWAR PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 03:51:47', 0, NULL),
(177, '24/00177', 'ali-petroleum', 'mumbai', '4', '', '12175820', 'ALI PETROLEUM', 'SOLAPUR 2', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 03:52:51', 0, NULL),
(178, '24/00178', 'chandramouli-petroleum', 'mumbai', '4', '', '12528260', 'CHANDRAMOULI PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 03:53:40', 0, NULL),
(179, '24/00179', 'shri-siddhi-petroleum', 'mumbai', '4', '', '12528680', 'SHRI SIDDHI PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 03:54:35', 0, NULL),
(180, '24/00180', 'ganpatrao-kshirsagar-petroleum', 'mumbai', '4', '', '12540940', 'GANPATRAO KSHIRSAGAR PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 03:55:11', 0, NULL),
(181, '24/00181', 'shri-nath-petroleum', 'mumbai', '4', '', '12561710', 'SHRI NATH PETROLEUM', 'PANDHARPUR', '', '', '', '2024-12-03', '2025-06-02', '', '', '', '', '', '', 'active', 0, 1, '2024-12-11 07:34:56', 0, NULL),
(182, '24/00182', 'rajaram-magar-patil-petroleum', 'mumbai', '4', '', '12561750', 'RAJARAM MAGAR PATIL PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 03:56:32', 0, NULL),
(183, '24/00183', 'padminivasantrao-kharade-petroleum', 'mumbai', '4', '', '12565110', 'PADMINIVASANTRAO KHARADE PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 03:58:38', 0, NULL),
(184, '24/00184', 'kale-petroleum-services', 'mumbai', '13', '', '12577900', 'KALE PETROLEUM SERVICES', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 03:59:35', 0, NULL),
(185, '24/00185', 'nagnathrao-patalepatil-petroleum', 'mumbai', '4', '', '12583320', 'NAGNATHRAO PATALE-PATIL PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 04:02:53', 0, NULL),
(186, '24/00186', 'shri-ganesh-petroleum', 'mumbai', '4', '', '12589210', 'SHRI GANESH PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 04:03:42', 0, NULL),
(187, '24/00187', 'laxmi-narayan-petroleum', 'mumbai', '4', '', '12589220', 'LAXMI NARAYAN PETROLEUM', 'PANDHARPUR', '', '', '', '2024-12-03', '2025-06-02', '', '', '', '', '', '', 'active', 0, 1, '2024-12-11 08:02:08', 0, NULL),
(188, '24/00188', 'gavkare-petroleum', 'mumbai', '4', '', '12590460', 'GAVKARE PETROLEUM', 'SOLAPUR 2', '', '', '', '2024-12-03', '2025-06-02', '', '', '', '', '', '', 'active', 0, 1, '2024-12-11 09:20:54', 0, NULL),
(189, '24/00189', 'saniya-petroleum-kandalgaon', 'mumbai', '4', '', '41052025', 'SANIYA PETROLEUM, KANDALGAON', 'SOLAPUR 2', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 04:06:54', 0, NULL),
(190, '24/00190', 'yadav-petroleum', 'mumbai', '4', '', '12595190', 'YADAV PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 04:07:36', 0, NULL),
(191, '24/00191', 'bt-khurana', 'mumbai', '4', '', '11006121', 'BT KHURANA', 'PARBHANI', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 04:09:41', 0, NULL),
(192, '24/00192', 'adhoc-tirupati-petroleum', 'mumbai', '4', '', '41066682', 'ADHOC TIRUPATI PETROLEUM', 'PARBHANI', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 04:10:36', 0, NULL),
(193, '24/00193', 'sakshi-petroleum', 'mumbai', '12', '', '41058507', 'SAKSHI PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 04:26:01', 0, NULL),
(194, '24/00194', 'b-m-patil', 'mumbai', '12', '', '41058562', ' B M PATIL', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 04:26:40', 0, NULL),
(195, '24/00195', 'adhoc-narmada-petroleum', 'mumbai', '12', '', '41064802', 'ADHOC NARMADA PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 04:27:15', 0, NULL),
(196, '24/00196', 'tryambakraj-petroleum', 'mumbai', '12', '', '41066661', 'TRYAMBAKRAJ PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 04:28:00', 0, NULL),
(197, '24/00197', 'piyush-energy', 'mumbai', '12', '', '41066665', 'PIYUSH ENERGY', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 04:28:56', 0, NULL),
(198, '24/00198', 'hare-krishna-petroleum', 'mumbai', '12', '', '41067368', 'HARE KRISHNA PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 04:29:45', 0, NULL),
(199, '24/00199', 'adhoc-ekvira-petroleum', 'mumbai', '12', '', '41069006', 'ADHOC EKVIRA PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 04:30:28', 0, NULL),
(200, '24/00200', 'dlk-petroleum', 'mumbai', '12', '', '41069473', 'DLK PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 04:40:10', 0, NULL),
(201, '24/00201', 'adhoc-santosh-petroleum', 'mumbai', '12', '', '41071206', 'ADHOC SANTOSH PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 04:40:58', 0, NULL),
(202, '24/00202', 't-v-gujarathi', 'mumbai', '12', '', '41000006', 'T V GUJARATHI', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 04:41:59', 0, NULL),
(203, '24/00203', 'n-m-petroleum', 'mumbai', '12', '', '41024291', 'N & M PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 04:43:12', 0, NULL),
(204, '24/00204', 'suvidya-petroleum', 'mumbai', '12', '', '41034402', 'SUVIDYA PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 23:51:06', 0, NULL),
(205, '24/00205', 'adhoc-jadhav-petroleum', 'mumbai', '12', '', '41036702', 'ADHOC JADHAV PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 23:51:43', 0, NULL),
(206, '24/00206', 'sahyadri-petroleum', 'mumbai', '12', '', '41039326', 'SAHYADRI PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 23:52:37', 0, NULL),
(207, '24/00207', 'asmitatai-dighavkar-petroleum', 'mumbai', '12', '', '41039328', 'ASMITATAI DIGHAVKAR PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 23:53:12', 0, NULL),
(208, '24/00208', 'tuljabhavani-petroleum', 'mumbai', '12', '', '41040590', 'TULJABHAVANI PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 23:53:50', 0, NULL),
(209, '24/00209', 'mahadev-petroleum', 'mumbai', '12', '', '41040593', 'MAHADEV PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 23:54:19', 0, NULL),
(210, '24/00210', 'uday-petrol-pump', 'mumbai', '12', '', '41040609', 'UDAY PETROL PUMP', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 23:54:52', 0, NULL),
(211, '24/00211', 'kausalya-petroleum', 'mumbai', '12', '', '41040612', 'KAUSALYA PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 23:55:26', 0, NULL),
(212, '24/00212', 'suchandra-fuelents-llp', 'mumbai', '12', '', '41041817', 'SUCHANDRA FUELENTS LLP', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 23:56:04', 0, NULL),
(213, '24/00213', 'shree-ram-petrol-pump', 'mumbai', '12', '', '41041820', ' SHREE RAM PETROL PUMP', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 23:56:40', 0, NULL),
(214, '24/00214', 'prathamyash-petroleum', 'mumbai', '12', '', '41042895', 'PRATHAMYASH PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 23:57:12', 0, NULL),
(215, '24/00215', 'kansara-petroleum', 'mumbai', '12', '', '41043391', 'KANSARA PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 23:57:55', 0, NULL),
(216, '24/00216', 'p-e-gomase-petroleum', 'mumbai', '12', '', '41044111', ' P E GOMASE PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 23:58:26', 0, NULL),
(217, '24/00217', 'matoshri-petroleum', 'mumbai', '12', '', '41045462', 'MATOSHRI PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 23:58:57', 0, NULL),
(218, '24/00218', 'jadhav-petroleum', 'mumbai', '12', '', '41045475', 'JADHAV PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-03 23:59:32', 0, NULL),
(219, '24/00219', 'shri-khambeshwar-petroleum', 'mumbai', '12', '', '41045527', 'SHRI KHAMBESHWAR PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 00:39:10', 0, NULL),
(220, '24/00220', 'pooja-petroleum', 'mumbai', '12', '', '41046346', 'POOJA PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 00:39:56', 0, NULL),
(221, '24/00221', 'shivanjali-petroleum', 'mumbai', '12', '', '41046347', 'SHIVANJALI PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 00:40:35', 0, NULL),
(222, '24/00222', 'shri-krushna-petroleum', 'mumbai', '12', '', '41046348', 'SHRI KRUSHNA PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 00:41:16', 0, NULL),
(223, '24/00223', 'akash-petroleum', 'mumbai', '12', '', '41047712', 'AKASH PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 00:41:56', 0, NULL),
(224, '24/00224', 'shri-swami-samarth-petroleum', 'mumbai', '12', '', '41047725', 'SHRI SWAMI SAMARTH PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 00:42:34', 0, NULL),
(225, '24/00225', 'sanjivani-auto-fuels', 'mumbai', '12', '', '41047737', 'SANJIVANI AUTO FUELS', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 00:43:06', 0, NULL),
(226, '24/00226', 'sanjivani-petrolium-pandurli', 'mumbai', '12', '', '41047749', 'SANJIVANI PETROLIUM, PANDURLI', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 00:43:42', 0, NULL),
(227, '24/00227', 'j-n-gaikwad-petroleum', 'mumbai', '12', '', '41047777', 'J N GAIKWAD PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 00:44:19', 0, NULL),
(228, '24/00228', 'lakshatara-petroleum', 'mumbai', '12', '', '41047786', 'LAKSHATARA PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 00:44:57', 0, NULL),
(229, '24/00229', 'shivshakti-petroleum', 'mumbai', '12', '', '41047796', 'SHIVSHAKTI PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 00:51:34', 0, NULL),
(230, '24/00230', 'pratiksha-petroleum', 'mumbai', '12', '', '41047836', 'PRATIKSHA PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 00:52:53', 0, NULL),
(231, '24/00231', 'sai-nanda-petroleum', 'mumbai', '12', '', '41047842', 'SAI NANDA PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 00:53:47', 0, NULL),
(232, '24/00232', 'adishakti-petroleum', 'mumbai', '12', '', '41047859', 'ADISHAKTI PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 00:54:39', 0, NULL),
(233, '24/00233', 'minakshi-enterprises', 'mumbai', '12', '', '41047864', 'MINAKSHI ENTERPRISES', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 00:55:45', 0, NULL),
(234, '24/00234', 'sayhadri-petroleum', 'mumbai', '12', '', '41047870', 'SAYHADRI PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 01:00:49', 0, NULL),
(235, '24/00235', 'jagdamba-petroleum', 'mumbai', '12', '', '41047872', 'JAGDAMBA PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 01:01:25', 0, NULL),
(236, '24/00236', 'priyanka-petroleum', 'mumbai', '12', '', '41047878', 'PRIYANKA PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 01:01:59', 0, NULL),
(237, '24/00237', 'atrey-automobiles', 'mumbai', '12', '', '41047880', 'ATREY AUTOMOBILES', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 01:02:32', 0, NULL);
INSERT INTO `outlet` (`id`, `sno`, `token`, `zone`, `branch`, `outlet_type`, `customer_id`, `outlet_name`, `outlet_location`, `contact_name`, `contact_number`, `earthing_chamber`, `checking_date`, `renewal_date`, `cvt`, `stabilizer`, `stp`, `yard_pole`, `canopy_light`, `pump`, `status`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(238, '24/00238', 'pandav-petroleum', 'mumbai', '12', '', '41047886', 'PANDAV PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 01:03:03', 0, NULL),
(239, '24/00239', 'shri-kuber-fuel-station', 'mumbai', '12', '', '41047892', 'SHRI KUBER FUEL STATION', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 01:03:41', 0, NULL),
(240, '24/00240', 'saptshrungi-fuels-station', 'mumbai', '12', '', '41048548', 'SAPTSHRUNGI FUELS STATION', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 01:04:16', 0, NULL),
(241, '24/00241', 'vishal-petroleum', 'mumbai', '12', '', '41049671', 'VISHAL PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 01:04:46', 0, NULL),
(242, '24/00242', 'pratik-fuel-plaza', 'mumbai', '12', '', '41050022', 'PRATIK FUEL PLAZA', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 01:05:18', 0, NULL),
(243, '24/00243', 'suman-petroleum', 'mumbai', '12', '', '41050103', 'SUMAN PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 01:05:54', 0, NULL),
(244, '24/00244', 'parvati-filling-station', 'mumbai', '12', '', '41050815', 'PARVATI FILLING STATION', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 01:06:29', 0, NULL),
(245, '24/00245', 'madhav-petroleum', 'mumbai', '12', '', '41050819', 'MADHAV PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 01:07:04', 0, NULL),
(246, '24/00246', 'auto-care-centre-x', 'mumbai', '12', '', '41051042', 'AUTO CARE CENTRE X', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 01:07:37', 0, NULL),
(247, '24/00247', 'abhinav-fuel-plaza', 'mumbai', '12', '', '41051277', 'ABHINAV FUEL PLAZA', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 01:08:54', 0, NULL),
(248, '24/00248', 'shri-sai-petroleum', 'mumbai', '12', '', '41051607', 'SHRI SAI PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 01:09:37', 0, NULL),
(249, '24/00249', 'chintamani-petroleum', 'mumbai', '12', '', '41051609', 'CHINTAMANI PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 01:10:16', 0, NULL),
(250, '24/00250', 'kothule-petroleum', 'mumbai', '12', '', '41051610', 'KOTHULE PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 01:10:51', 0, NULL),
(251, '24/00251', 'kousalya-petroleum', 'mumbai', '12', '', '41051710', 'KOUSALYA PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 01:11:31', 0, NULL),
(252, '24/00252', 'radhakrishna-petroleum', 'mumbai', '12', '', '41051716', 'RADHAKRISHNA PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 01:14:28', 0, NULL),
(253, '24/00253', 'agra-road-motor-service', 'mumbai', '12', '', '41051969', 'AGRA ROAD MOTOR SERVICE', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 01:15:12', 0, NULL),
(254, '24/00254', 'bela-auto-service', 'mumbai', '12', '', '41051976', 'BELA AUTO SERVICE', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 01:15:49', 0, NULL),
(255, '24/00255', 'p-g-palija', 'mumbai', '12', '', '41051985', 'P G PALIJA', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 01:17:14', 0, NULL),
(256, '24/00256', 'j-r-mehta-sons', 'mumbai', '12', '', '41051990', 'J R MEHTA & SONS', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 01:17:49', 0, NULL),
(257, '24/00257', 'k-r-boob', 'mumbai', '12', '', '41052407', 'K R BOOB', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 01:18:44', 0, NULL),
(258, '24/00258', 'arkay-service-garage', 'mumbai', '12', '', '41052690', 'ARKAY SERVICE GARAGE', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 01:23:13', 0, NULL),
(259, '24/00259', 'panchavati-auto-service', 'mumbai', '12', '', '41053733', 'PANCHAVATI AUTO SERVICE', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 01:23:42', 0, NULL),
(260, '24/00260', 'suyog-petroleum', 'mumbai', '12', '', '41067317', 'SUYOG PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 01:24:12', 0, NULL),
(261, '24/00261', 'adhoc-manjule-petroleum', 'mumbai', '12', '', '41071235', 'ADHOC MANJULE PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 01:24:53', 0, NULL),
(262, '24/00262', 'adhoc-kansara-petroleum', 'mumbai', '12', '', '41071270', 'ADHOC KANSARA PETROLEUM', 'NASHIK', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 01:25:36', 0, NULL),
(263, '24/00263', 'adhoc-chandras-69a-petrol-junction', 'indore', '2', '', '', 'ADHOC CHANDRAS 69A PETROL JUNCTION', 'BHOPAL', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 02:24:01', 0, NULL),
(264, '24/00264', 'gandhi-fuels', 'indore', '2', '', '12513290', 'GANDHI FUELS', 'Sehore', '', '', '', '2024-12-03', '2025-06-02', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 08:01:02', 0, NULL),
(265, '24/00265', 'ibrahim-ali-imdad-ali', 'indore', '2', '', '', 'IBRAHIM ALI IMDAD ALI', 'BHOPAL', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 02:36:36', 0, NULL),
(266, '24/00266', 'gopal-stores', 'indore', '1', '', '11480610', 'GOPAL STORES', 'INDORE-EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 10:00:59', 1, '2024-12-04 10:00:59'),
(267, '24/00267', 'mshsd-ashok-petrol-company', 'indore', '1', '', '11480710', 'ASHOK PETROL COMPANY', 'INDORE-EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 10:03:36', 1, '2024-12-04 10:03:36'),
(268, '24/00268', 'mshsd-adhoc-betma-filling-station', 'indore', '1', '', '12594600', 'ADHOC BETMA FILLING STATION', 'INDORE-EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 10:03:23', 1, '2024-12-04 10:03:23'),
(269, '24/00269', 'fazalkhan-p-khan-co', 'indore', '1', '', '11480910', 'FAZALKHAN P KHAN & CO', 'INDORE-EA', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 04:33:09', 0, NULL),
(270, '24/00270', 'kashyap-company-rajmohalla-rd', 'indore', '1', '', '11481110', 'KASHYAP & COMPANY RAJMOHALLA RD', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 04:35:05', 0, NULL),
(271, '24/00271', 'kashyap-company-dhar', 'indore', '1', '', '11481111', 'KASHYAP & COMPANY DHAR', 'INDORE-EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 04:36:19', 0, NULL),
(272, '24/00272', 'mannalal-lachhiram-sons', 'indore', '1', '', '11481210', ' MANNALAL LACHHIRAM & SONS', 'INDORE-EA', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 04:38:32', 0, NULL),
(273, '24/00273', 'mannalal-lachhiram', 'indore', '1', '', '11481211', 'MANNALAL LACHHIRAM', 'INDORE-EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 04:39:35', 0, NULL),
(274, '24/00274', 'vijet', 'indore', '1', '', '11481310', 'Vijet', 'INDORE-EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 04:41:25', 0, NULL),
(275, '24/00275', 'ramgopal-mangal', 'indore', '1', '', '11481410', 'RAMGOPAL MANGAL', 'INDORE-EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 04:42:06', 0, NULL),
(276, '24/00276', 'gopikrishan-chhogalal', 'indore', '1', '', '11481810', 'GOPIKRISHAN CHHOGALAL MHOW', 'INDORE-EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 10:15:17', 1, '2024-12-04 10:15:17'),
(277, '24/00277', 'gopikrishan-chhogalal-sudamanagar-ind', 'indore', '1', '', '11481811', ' GOPIKRISHAN CHHOGALAL SUDAMANAGAR Ind', 'INDORE-EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 04:46:26', 0, NULL),
(278, '24/00278', 'adhoc-swastik-petroleum', 'indore', '1', '', '12882300', 'ADHOC SWASTIK PETROLEUM', 'INDORE-EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 04:47:08', 0, NULL),
(279, '24/00279', 'ajanta-bus-service', 'indore', '1', '', '11506660', 'AJANTA BUS SERVICE', 'INDORE-EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 04:47:49', 0, NULL),
(280, '24/00280', 'jai-girnari-enterprises', 'indore', '1', '', '11506890', ' JAI GIRNARI ENTERPRISES', 'INDORE-EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 04:48:31', 0, NULL),
(281, '24/00281', 'choudhary-highway-service', 'indore', '1', '', '11516110', 'CHOUDHARY HIGHWAY SERVICE', 'INDORE-EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 04:49:25', 0, NULL),
(282, '24/00282', 'pc-auto-service', 'indore', '1', '', '11547210', 'PC AUTO SERVICE', 'INDORE-EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 04:50:05', 0, NULL),
(283, '24/00283', 'noshirwan-co', 'indore', '1', '', '11553010', 'NOSHIRWAN & CO', 'INDORE-EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 04:50:45', 0, NULL),
(284, '24/00284', 's-shashikant-brothers', 'indore', '1', '', '11554010', ' S SHASHIKANT & BROTHERS', 'INDORE-EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 04:51:40', 0, NULL),
(285, '24/00285', 'lakshmi-service-station', 'indore', '1', '', '11556010', 'LAKSHMI SERVICE STATION', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 05:03:55', 0, NULL),
(286, '24/00286', 'sunshine-filling-station', 'indore', '1', '', '11715400', 'SUNSHINE FILLING STATION', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 05:04:29', 0, NULL),
(287, '24/00287', 'siddhivinayak-filling-centre', 'indore', '1', '', '11769400', 'SIDDHIVINAYAK FILLING CENTRE', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 05:05:13', 0, NULL),
(288, '24/00288', 'khandelwal-filling-station', 'indore', '1', '', '12252540', 'KHANDELWAL FILLING STATION', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 05:05:49', 0, NULL),
(289, '24/00289', 'chunpya-filling-station', 'indore', '1', '', '12253600', 'CHUNPYA FILLING STATION', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 05:06:17', 0, NULL),
(290, '24/00290', 'madhur-fuel-station', 'indore', '1', '', '12514490', 'MADHUR FUEL STATION', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 05:08:03', 0, NULL),
(291, '24/00291', 'shri-uttam-petro-point', 'indore', '1', '', '12518360', 'SHRI UTTAM PETRO POINT', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 05:08:33', 0, NULL),
(292, '24/00292', 'maheshwari-filling-station', 'indore', '1', '', '12521660', 'MAHESHWARI FILLING STATION', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 05:09:16', 0, NULL),
(293, '24/00293', 'i-p-fuels-station', 'indore', '1', '', '12522550', 'I P FUELS STATION', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 05:10:03', 0, NULL),
(294, '24/00294', 'virmat-filling-station', 'indore', '1', '', '12525320', 'VIRMAT FILLING STATION', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 05:30:16', 0, NULL),
(295, '24/00295', 'solanki-sales-and-service', 'indore', '1', '', '12526470', 'SOLANKI SALES AND SERVICE', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 05:31:14', 0, NULL),
(296, '24/00296', 'amol-filling-station', 'indore', '1', '', '12530080', 'AMOL FILLING STATION', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 05:31:51', 0, NULL),
(297, '24/00297', 'kaatyayan-energy', 'indore', '1', '', '12532440', 'KAATYAYAN ENERGY', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 05:32:27', 0, NULL),
(298, '24/00298', 'shree-ganesh-filling-station', 'indore', '1', '', '12532460', 'SHREE GANESH FILLING STATION', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 05:42:31', 0, NULL),
(299, '24/00299', 'anya-energies', 'indore', '1', '', '12532500', 'ANYA ENERGIES', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 05:42:57', 0, NULL),
(300, '24/00300', 'lambodar-enterprises', 'indore', '1', '', '12534950', 'LAMBODAR ENTERPRISES', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 05:53:12', 0, NULL),
(301, '24/00301', 'raghuvanshi-filling-station', 'indore', '1', '', '12534960', 'RAGHUVANSHI FILLING STATION', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 05:53:38', 0, NULL),
(302, '24/00302', 'sai-shakti-fuels', 'indore', '1', '', '12537240', 'SAI SHAKTI FUELS', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 05:54:14', 0, NULL),
(303, '24/00303', 'shraddha-filling-station', 'indore', '1', '', '12540720', 'SHRADDHA FILLING STATION', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 05:54:43', 0, NULL),
(304, '24/00304', 'shri-rajput-petroleum', 'indore', '1', '', '12552180', 'SHRI RAJPUT PETROLEUM', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 05:55:17', 0, NULL),
(305, '24/00305', 'maruti-fuels-indore', 'indore', '1', '', '12552200', 'MARUTI FUELS INDORE', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 05:55:52', 0, NULL),
(306, '24/00306', 'krishna-filling-station', 'indore', '1', '', '12553780', 'KRISHNA FILLING STATION', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 05:57:57', 0, NULL),
(307, '24/00307', 'gurukripa-sales-service', 'indore', '1', '', '12553800', ' GURUKRIPA SALES & SERVICE', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 05:58:45', 0, NULL),
(308, '24/00308', 'mobile-station', 'indore', '1', '', '12766600', 'MOBILE STATION', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 05:59:24', 0, NULL),
(309, '24/00309', 'umiya-fuel-station', 'indore', '1', '', '12563360', ' UMIYA FUEL STATION', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:03:02', 0, NULL),
(310, '24/00310', 'hans-filling-station', 'indore', '1', '', '12572650', ' HANS FILLING STATION', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:04:23', 0, NULL),
(311, '24/00311', 'swapnil-fuel-station', 'indore', '1', '', '12580760', ' SWAPNIL FUEL STATION', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:05:53', 0, NULL),
(312, '24/00312', 'rau-fuel-station', 'indore', '1', '', '12579610', ' RAU FUEL STATION', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:06:25', 0, NULL),
(313, '24/00313', 'goswami-filling-station', 'indore', '1', '', '12583800', ' GOSWAMI FILLING STATION', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:29:05', 0, NULL),
(314, '24/00314', 'shree-mahakaleshwar-fuels', 'indore', '1', '', '12580750', ' SHREE MAHAKALESHWAR FUELS', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 12:00:39', 1, '2024-12-04 12:00:39'),
(315, '24/00315', 'sagar-fuels-energy', 'indore', '1', '', '12585350', ' SAGAR FUELS & ENERGY', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:31:09', 0, NULL),
(316, '24/00316', 'krishna-enterprises', 'indore', '1', '', '12585390', ' KRISHNA ENTERPRISES', 'INDORE EAST', '', '', '', '2024-12-23', '2025-06-22', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 05:44:32', 0, NULL),
(317, '24/00317', 'swastik-petroleum', 'indore', '1', '', '12586330', ' SWASTIK PETROLEUM', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:32:13', 0, NULL),
(318, '24/00318', 'gurukripa-petroleum-agregurukripa-petroleum-co', 'indore', '1', '', '12587060', ' GURUKRIPA PETROLEUM (Agre-GURUKRIPA PETROLEUM CO.)', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:32:43', 0, NULL),
(319, '24/00319', 'bhadouriya-fuel-station', 'indore', '1', '', '12588680', ' BHADOURIYA FUEL STATION', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:33:11', 0, NULL),
(320, '24/00320', 'shiv-shakti-service-station', 'indore', '1', '', '12588640', ' SHIV SHAKTI SERVICE STATION', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:34:09', 0, NULL),
(321, '24/00321', 'balaji-fuels-malikhedi', 'indore', '1', '', '12579630', ' BALAJI FUELS MALIKHEDI', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:34:40', 0, NULL),
(322, '24/00322', 'mandloi-fuels', 'indore', '1', '', '12591840', ' MANDLOI FUELS', 'INDORE EAST', '', '', '', '2024-12-23', '2025-06-22', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 05:26:38', 0, NULL),
(323, '24/00323', 'kanchan-shree-fuels', 'indore', '1', '', '12594610', ' KANCHAN SHREE FUELS', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:36:44', 0, NULL),
(324, '24/00324', 'shree-balaji-filling-station', 'indore', '1', '', '12590730', ' SHREE BALAJI FILLING STATION', 'INDORE EAST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:37:22', 0, NULL),
(325, '24/00325', 'chhabra-service-centre', 'indore', '1', '', '11470110', ' CHHABRA SERVICE CENTRE', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 12:09:11', 1, '2024-12-04 12:09:11'),
(326, '24/00326', 'kshipra-filling-ser-co', 'indore', '1', '', '11481610', 'KSHIPRA FILLING & SER CO', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:38:40', 0, NULL),
(327, '24/00327', 'bharat-highway-services', 'indore', '1', '', '11506690', ' BHARAT HIGHWAY SERVICES', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:39:46', 0, NULL),
(328, '24/00328', 'amir-brothers-dewas', 'indore', '1', '', '11543010', ' AMIR BROTHERS DEWAS', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:40:31', 0, NULL),
(329, '24/00329', 'amir-brothers-bilawli', 'indore', '1', '', '11543011', 'AMIR BROTHERS BILAWLI', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:41:21', 0, NULL),
(330, '24/00330', 'sainath-filling-station', 'indore', '1', '', '11670101', ' SAINATH FILLING STATION', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:41:58', 0, NULL),
(331, '24/00331', 'kasturi-highway', 'indore', '1', '', '11715800', ' KASTURI HIGHWAY', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:42:27', 0, NULL),
(332, '24/00332', 'jsfilling-centre', 'indore', '1', '', '11768100', ' J.S.FILLING CENTRE', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:42:55', 0, NULL),
(333, '24/00333', 'gangotri-filling-station', 'indore', '1', '', '11768800', ' GANGOTRI FILLING STATION', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:43:24', 0, NULL),
(334, '24/00334', 'holani-filling-point', 'indore', '1', '', '12253300', ' HOLANI FILLING POINT', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:43:52', 0, NULL),
(335, '24/00335', 'baba-fuel-station', 'indore', '1', '', '12254800', ' BABA FUEL STATION', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:44:56', 0, NULL),
(336, '24/00336', 'maa-tulja-sales-service-centre', 'indore', '1', '', '12340940', 'MAA TULJA SALES & SERVICE CENTRE', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:45:43', 0, NULL),
(337, '24/00337', 'samruddhi-petroleum', 'indore', '1', '', '12340980', ' SAMRUDDHI PETROLEUM', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:47:06', 0, NULL),
(338, '24/00338', 'maa-chamunda-filling-station', 'indore', '1', '', '12505540', 'MAA CHAMUNDA FILLING STATION', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:47:39', 0, NULL),
(339, '24/00339', 'agrawal-filling-station', 'indore', '1', '', '12518340', ' AGRAWAL FILLING STATION', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:48:42', 0, NULL),
(340, '24/00340', 'savitri-service-station', 'indore', '1', '', '12518370', 'SAVITRI SERVICE STATION', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:49:31', 0, NULL),
(341, '24/00341', 'dewas-petroleum', 'indore', '1', '', '12522520', 'DEWAS PETROLEUM', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:50:07', 0, NULL),
(342, '24/00342', 'ghanshyam-petroleum-service', 'indore', '1', '', '12526480', ' GHANSHYAM PETROLEUM SERVICE', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:50:39', 0, NULL),
(343, '24/00343', 'barfa-filling-station', 'indore', '1', '', '12532450', ' BARFA FILLING STATION', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:52:01', 0, NULL),
(344, '24/00344', 'shree-sailaxmi-fuels', 'indore', '1', '', '12535100', ' SHREE SAILAXMI FUELS', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:52:30', 0, NULL),
(345, '24/00345', 'purna-maa-petroleum', 'indore', '1', '', '12540760', ' PURNA MAA PETROLEUM', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:52:55', 0, NULL),
(346, '24/00346', 'sukhmani-fuels-sales', 'indore', '1', '', '12540770', ' SUKHMANI FUELS & SALES', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:53:25', 0, NULL),
(347, '24/00347', 'balaji-petroleum', 'indore', '1', '', '12546610', ' BALAJI PETROLEUM', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:53:52', 0, NULL),
(348, '24/00348', 'sanwariya-filling-center', 'indore', '1', '', '12552170', ' SANWARIYA FILLING CENTER', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:54:22', 0, NULL),
(349, '24/00349', 'lucky-fuels', 'indore', '1', '', '12553760', ' LUCKY FUELS', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:54:59', 0, NULL),
(350, '24/00350', 'kanchan-fuels', 'indore', '1', '', '12553790', ' KANCHAN FUELS', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:55:37', 0, NULL),
(351, '24/00351', 'adhoc-ghanshyam-petroleum-service-pipalrawa', 'indore', '1', '', '12555810', ' ADHOC GHANSHYAM PETROLEUM SERVICE (Pipalrawa)', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:56:17', 0, NULL),
(352, '24/00352', 'krishna-fuels', 'indore', '1', '', '12557270', ' KRISHNA FUELS', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:56:42', 0, NULL),
(353, '24/00353', 'parmar-fuels', 'indore', '1', '', '12560240', ' PARMAR FUELS', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:57:06', 0, NULL),
(354, '24/00354', 'siddhi-vinayak-fuel-center', 'indore', '1', '', '12560260', ' SIDDHI VINAYAK FUEL CENTER', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:57:34', 0, NULL),
(355, '24/00355', 'jigisha-fuel', 'indore', '1', '', '12572680', ' JIGISHA FUEL', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:58:10', 0, NULL),
(356, '24/00356', 'vijay-laxmi-filling-station', 'indore', '1', '', '12580710', ' VIJAY LAXMI FILLING STATION', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:58:43', 0, NULL),
(357, '24/00357', 'dharti-fuels', 'indore', '1', '', '12580780', ' DHARTI FUELS', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:59:09', 0, NULL),
(358, '24/00358', 'shri-goverdhan-fuel-station', 'indore', '1', '', '12583710', ' SHRI GOVERDHAN FUEL STATION', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 06:59:34', 0, NULL),
(359, '24/00359', 'shri-sanwariya-fuels', 'indore', '1', '', '12585320', ' SHRI SANWARIYA FUELS', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 07:00:15', 0, NULL),
(360, '24/00360', 'mahakal-fuels', 'indore', '1', '', '12586420', ' MAHAKAL FUELS', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 07:01:15', 0, NULL),
(361, '24/00361', 'giriraj-fuels', 'indore', '1', '', '12587070', ' GIRIRAJ FUELS', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 07:01:50', 0, NULL),
(362, '24/00362', 'katare-filling-station', 'indore', '1', '', '12588650', ' KATARE FILLING STATION', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 07:02:20', 0, NULL),
(363, '24/00363', 'aske-fuel-station', 'indore', '1', '', '17601350', ' ASKE FUEL STATION', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 07:02:52', 0, NULL),
(364, '24/00364', 'gurjar-fuel-station', 'indore', '1', '', '17601360', ' GURJAR FUEL STATION', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 07:03:20', 0, NULL),
(365, '24/00365', 'vijeta-fuels', 'indore', '1', '', '17601310', ' VIJETA FUELS', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 07:03:48', 0, NULL),
(366, '24/00366', 'akansha-petroleum-and-fuels', 'indore', '1', '', '17601340', ' AKANSHA PETROLEUM AND FUELS', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 07:04:13', 0, NULL),
(367, '24/00367', 'shree-nath-ji-filling-station', 'indore', '1', '', '17601320', ' SHREE NATH JI FILLING STATION', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 07:04:40', 0, NULL),
(368, '24/00368', 'maa-kalka-filling-station', 'indore', '1', '', '12592660', ' MAA KALKA FILLING STATION', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 07:05:03', 0, NULL),
(369, '24/00369', 'keshav-petroleum', 'indore', '1', '', '12594720', ' KESHAV PETROLEUM', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 07:05:28', 0, NULL),
(370, '24/00370', 'giriraj-filling-station', 'indore', '1', '', '12596300', ' GIRIRAJ FILLING STATION', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 07:05:54', 0, NULL),
(371, '24/00371', 'anadi-fuels', 'indore', '1', '', '17601990', ' ANADI FUELS', 'DEWAS', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 07:06:18', 0, NULL),
(372, '24/00372', 'gati-corporation-ltd', 'indore', '1', '', '11481520', ' GATI CORPORATION LTD', 'INDORE WEST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 23:41:26', 0, NULL),
(373, '24/00373', 'super-diesels', 'indore', '1', '', '11499110', ' SUPER DIESELS', 'INDORE WEST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 23:41:53', 0, NULL),
(374, '24/00374', 'supreme-auto-centre', 'indore', '1', '', '11558020', ' SUPREME AUTO CENTRE', 'INDORE WEST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 23:42:24', 0, NULL),
(375, '24/00375', 'damini-filling-station', 'indore', '1', '', '11670600', ' DAMINI FILLING STATION', 'INDORE WEST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 23:42:57', 0, NULL),
(376, '24/00376', 'paliwal-fuels', 'indore', '1', '', '11715900', ' PALIWAL FUELS', 'INDORE WEST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 23:43:34', 0, NULL),
(377, '24/00377', 'soni-sons', 'indore', '1', '', '12254400', ' SONI & SONS', 'INDORE WEST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 23:44:21', 0, NULL),
(378, '24/00378', 'shakti-fuel-station', 'indore', '1', '', '12505530', ' SHAKTI FUEL STATION', 'INDORE WEST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 23:45:39', 0, NULL),
(379, '24/00379', 'maa-parvati-fuel-point', 'indore', '1', '', '12516950', ' MAA PARVATI FUEL POINT', 'INDORE WEST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 23:46:07', 0, NULL),
(380, '24/00380', 'new-sunidhi-petroleum', 'indore', '1', '', '12522560', ' NEW SUNIDHI PETROLEUM', 'INDORE WEST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 23:52:53', 0, NULL),
(381, '24/00381', 'patidar-filling-station', 'indore', '1', '', '12522590', ' PATIDAR FILLING STATION', 'INDORE WEST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 23:53:38', 0, NULL),
(382, '24/00382', 'patidar-fuel-station', 'indore', '1', '', '12530030', ' PATIDAR FUEL STATION', 'INDORE WEST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 23:54:10', 0, NULL),
(383, '24/00383', 'pragati-filling-station', 'indore', '1', '', '12530050', ' PRAGATI FILLING STATION', 'INDORE WEST', '', '', '', '2024-12-09', '2025-06-08', '', '', '', '', '', '', 'active', 0, 1, '2024-12-10 12:34:26', 0, NULL),
(384, '24/00384', 'sainath-sales-and-service', 'indore', '1', '', '12535020', ' SAINATH SALES AND SERVICE', 'INDORE WEST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 23:55:08', 0, NULL),
(385, '24/00385', 'shri-sai-fuel-sales-and-service', 'indore', '1', '', '12535030', ' SHRI SAI FUEL SALES AND SERVICE', 'INDORE WEST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 23:55:37', 0, NULL),
(386, '24/00386', 'maa-renuka-filling-station', 'indore', '1', '', '12540740', ' MAA RENUKA FILLING STATION', 'INDORE WEST', '', '', '', '2024-12-09', '2025-06-08', '', '', '', '', '', '', 'active', 0, 1, '2024-12-10 12:38:28', 0, NULL),
(387, '24/00387', 'adhoc-akash-filling-station-raukhedi', 'indore', '1', '', '12594750', ' ADHOC AKASH FILLING STATION (Raukhedi)', 'INDORE WEST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 23:56:49', 0, NULL),
(388, '24/00388', 'r-k-fuels', 'indore', '1', '', '12585380', ' R K FUELS', 'INDORE WEST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 23:57:26', 0, NULL),
(389, '24/00389', 'landmark-filling-station', 'indore', '1', '', '12585310', '  LANDMARK FILLING STATION', 'INDORE WEST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 23:57:58', 0, NULL),
(390, '24/00390', 'shri-ram-fuel-station', 'indore', '1', '', '12585310', ' SHRI RAM FUEL STATION', 'INDORE WEST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-04 23:58:46', 0, NULL),
(391, '24/00391', 'shakambhari-fuels', 'indore', '1', '', '17601380', ' SHAKAMBHARI FUELS', 'INDORE WEST', '', '', '', '2024-12-09', '2025-06-08', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 11:15:59', 0, NULL),
(392, '24/00392', 'batra-fuels', 'indore', '1', '', '17601390', ' BATRA FUELS', 'INDORE WEST', '', '', '', '2024-12-09', '2025-06-08', '', '', '', '', '', '', 'active', 0, 1, '2024-12-10 12:31:12', 0, NULL),
(393, '24/00393', 'naharshah-petroleum', 'indore', '1', '', '12590770', ' NAHARSHAH PETROLEUM', 'INDORE WEST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-05 00:00:32', 0, NULL),
(394, '24/00394', 'binjaliya-fuels-and-energy', 'indore', '1', '', '17601420', ' BINJALIYA FUELS AND ENERGY', 'INDORE WEST', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-05 00:01:52', 0, NULL),
(395, '24/00395', 'rahi-petroleum', 'indore', '1', '', '12254300', ' RAHI PETROLEUM', 'ALIRAJPUR', '', '', '', '2024-12-15', '2025-06-14', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 09:16:10', 1, '2024-12-05 05:33:59'),
(396, '24/00396', 'dawar-petroleum', 'indore', '1', '', '12254500', ' DAWAR PETROLEUM', 'ALIRAJPUR', '', '', '', '2024-12-07', '2025-06-06', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 11:38:26', 0, NULL),
(397, '24/00397', 'radhe-petroleum', 'indore', '1', '', '12530060', ' RADHE PETROLEUM', 'ALIRAJPUR', '', '', '', '2024-12-15', '2025-06-14', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 09:33:48', 0, NULL),
(398, '24/00398', 'narayan-petroleum', 'indore', '1', '', '12534920', ' NARAYAN PETROLEUM', 'ALIRAJPUR', '', '', '', '2024-12-15', '2025-06-14', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 09:12:55', 1, '2024-12-05 05:35:50'),
(399, '24/00399', 'rishika-filling-station', 'indore', '1', '', '12563450', ' RISHIKA FILLING STATION', 'ALIRAJPUR', '', '', '', '2024-12-15', '2025-06-14', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 09:22:00', 0, NULL),
(400, '24/00400', 'adhoc-dawar-petroleum', 'indore', '1', '', '12592680', ' ADHOC DAWAR PETROLEUM', 'ALIRAJPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-05 00:06:56', 0, NULL),
(401, '24/00401', 'maa-parvati-fuel-station', 'indore', '1', '', '12594650', ' MAA PARVATI FUEL STATION', 'ALIRAJPUR', '', '', '', '2024-12-07', '2025-06-06', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 11:35:39', 0, NULL),
(402, '24/00402', 'vinayak-fuel-station', 'indore', '1', '', '17601970', ' VINAYAK FUEL STATION', 'ALIRAJPUR', '', '', '', '2024-12-15', '2025-06-14', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 09:25:16', 0, NULL),
(403, '24/00403', 'd-p-patel', 'indore', '1', '', '11480310', ' D P PATEL', 'BARWANI', '', '', '', '2024-12-16', '2025-06-15', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 07:41:30', 0, NULL),
(404, '24/00404', 'arneja-auto-centre', 'indore', '1', '', '11506630', ' ARNEJA AUTO CENTRE', 'BARWANI', '', '', '', '2024-12-06', '2025-06-05', '', '', '', '', '', '', 'active', 0, 1, '2024-12-07 05:39:52', 0, NULL),
(405, '24/00405', 'rajpalco', 'indore', '1', '', '11654010', ' RAJPAL&CO', 'BARWANI', '', '', '', '2024-12-06', '2025-06-05', '', '', '', '', '', '', 'active', 0, 1, '2024-12-07 07:11:11', 0, NULL),
(406, '24/00406', 'sai-auto-service', 'indore', '1', '', '12500700', ' SAI AUTO SERVICE', 'BARWANI', '', '', '', '2024-12-17', '2025-06-16', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 07:14:14', 0, NULL),
(407, '24/00407', 'maa-bijasan-filling-station', 'indore', '1', '', '12514430', ' MAA BIJASAN FILLING STATION', 'BARWANI', '', '', '', '2024-12-05', '2025-06-04', '', '', '', '', '', '', 'active', 0, 1, '2024-12-07 09:58:41', 0, NULL),
(408, '24/00408', 'shri-sai-fuel-centre', 'indore', '1', '', '12514470', ' SHRI SAI FUEL CENTRE', 'BARWANI', '', '', '', '2024-12-17', '2025-06-16', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 07:03:04', 0, NULL),
(409, '24/00409', 'gole-filling-station', 'indore', '1', '', '12527530', ' GOLE FILLING STATION', 'BARWANI', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-05 00:43:58', 0, NULL),
(410, '24/00410', 'maa-darbaar-fuel-station', 'indore', '1', '', '12546650', ' MAA DARBAAR FUEL STATION', 'BARWANI', '', '', '', '2024-12-04', '2025-06-03', '', '', '', '', '', '', 'active', 0, 1, '2024-12-07 10:12:49', 0, NULL),
(411, '24/00411', 'shri-sai-balaji-petroleum', 'indore', '1', '', '12546700', ' SHRI SAI BALAJI PETROLEUM', 'BARWANI', '', '', '', '2024-12-17', '2025-06-16', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 07:18:06', 0, NULL),
(412, '24/00412', 'shree-sai-fuel-centre', 'indore', '1', '', '12555890', ' SHREE SAI FUEL CENTRE', 'BARWANI', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-05 00:45:29', 0, NULL),
(413, '24/00413', 'maria-fuel-station', 'indore', '1', '', '12576180', ' MARIA FUEL STATION', 'BARWANI', '', '', '', '2024-12-16', '2025-06-15', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 07:33:37', 0, NULL),
(414, '24/00414', 'mangali-fuels', 'indore', '1', '', '12583760', ' MANGALI FUELS', 'BARWANI', '', '', '', '2024-12-06', '2025-06-05', '', '', '', '', '', '', 'active', 0, 1, '2024-12-07 07:01:21', 0, NULL),
(415, '24/00415', 'radhe-fuel-center', 'indore', '1', '', '12585400', ' RADHE FUEL CENTER', 'BARWANI', '', '', '', '2024-12-16', '2025-06-15', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 07:28:55', 0, NULL),
(416, '24/00416', 'raavee-indhan', 'indore', '1', '', '12587470', ' RAAVEE INDHAN', 'BARWANI', '', '', '', '2024-12-07', '2025-06-06', '', '', '', '', '', '', 'active', 0, 1, '2024-12-07 10:43:41', 0, NULL),
(417, '24/00417', 'aarohi-petroleum', 'indore', '1', '', '12587480', ' AAROHI PETROLEUM', 'BARWANI', '', '', '', '2024-12-17', '2025-06-16', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 07:08:37', 0, NULL),
(418, '24/00418', 'vishwamangal-fuels-ozar', 'indore', '1', '', '12588670', ' VISHWAMANGAL FUELS OZAR', 'BARWANI', '', '', '', '2024-12-05', '2025-06-04', '', '', '', '', '', '', 'active', 0, 1, '2024-12-07 07:58:36', 0, NULL),
(419, '24/00419', 'the-bhagatsingh-fuels', 'indore', '1', '', '12588700', ' THE BHAGATSINGH FUELS', 'BARWANI', '', '', '', '2024-12-05', '2025-06-04', '', '', '', '', '', '', 'active', 0, 1, '2024-12-07 07:55:51', 0, NULL),
(420, '24/00420', 'ravji-fuels', 'indore', '1', '', '12594630', ' RAVJI FUELS', 'BARWANI', '', '', '', '2024-12-06', '2025-06-05', '', '', '', '', '', '', 'active', 0, 1, '2024-12-07 07:06:34', 0, NULL),
(421, '24/00421', 'shree-tirupati-balaji-fuels', 'indore', '1', '', '12882030', ' SHREE TIRUPATI BALAJI FUELS', 'BARWANI', '', '', '', '2024-12-16', '2025-06-15', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 07:36:28', 0, NULL),
(422, '24/00422', 'dhar-auto-service', 'indore', '1', '', '11047310', ' DHAR AUTO SERVICE', 'DHAR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-05 00:51:05', 0, NULL),
(423, '24/00423', 'siddharth-ser-station', 'indore', '1', '', '11496210', ' SIDDHARTH SER STATION', 'DHAR', '', '', '', '2024-12-03', '2025-06-02', '', '', '', '', '', '', 'active', 0, 1, '2024-12-07 11:34:53', 0, NULL),
(424, '24/00424', 'g-v-agrawal', 'indore', '1', '', '11535010', ' G V AGRAWAL', 'DHAR', '', '', '', '2024-12-18', '2025-06-17', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 06:19:51', 0, NULL),
(425, '24/00425', 'shrinathji-auto-centre', 'indore', '1', '', '11591120', ' SHRINATHJI AUTO CENTRE', 'DHAR', '', '', '', '2024-12-04', '2025-06-03', '', '', '', '', '', '', 'active', 0, 1, '2024-12-07 10:21:05', 0, NULL),
(426, '24/00426', 'gupta-auto-service', 'indore', '1', '', '11689020', ' GUPTA AUTO SERVICE', 'DHAR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-05 00:53:10', 0, NULL),
(427, '24/00427', 'mandlecha-petroleum', 'indore', '1', '', '11768500', ' MANDLECHA PETROLEUM', 'DHAR', '', '', '', '2024-12-04', '2025-06-03', '', '', '', '', '', '', 'active', 0, 1, '2024-12-07 11:17:22', 0, NULL),
(428, '24/00428', 'abhinav-auto', 'indore', '1', '', '11769100', ' ABHINAV AUTO', 'DHAR', '', '', '', '2024-12-16', '2025-06-15', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 08:59:44', 0, NULL),
(429, '24/00429', 'the-baghel-filling-station', 'indore', '1', '', '11769500', ' THE BAGHEL FILLING STATION', 'DHAR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-05 01:26:02', 0, NULL),
(430, '24/00430', 'nityanand-petroleum', 'indore', '1', '', '12253500', ' NITYANAND PETROLEUM', 'DHAR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-05 05:17:26', 0, NULL),
(431, '24/00431', 'mangalam-petroleum', 'indore', '1', '', '12253900', ' MANGALAM PETROLEUM', 'DHAR', '', '', '', '2024-12-14', '2025-06-13', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 10:05:57', 0, NULL),
(432, '24/00432', 'shahid-tomar-filling-station', 'indore', '1', '', '12254100', ' SHAHID TOMAR FILLING STATION', 'DHAR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-05 05:19:05', 0, NULL),
(433, '24/00433', 'mehar-sons', 'indore', '1', '', '12340910', ' MEHAR & SONS', 'DHAR', '', '', '', '2024-12-14', '2025-06-13', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 10:23:18', 0, NULL),
(434, '24/00434', 'narmada-petroleum', 'indore', '1', '', '12340950', ' NARMADA PETROLEUM', 'DHAR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-05 05:20:26', 0, NULL),
(435, '24/00435', 'dhamnod-auto-centre', 'indore', '1', '', '12505580', ' DHAMNOD AUTO CENTRE', 'DHAR', '', '', '', '2024-12-04', '2025-06-03', '', '', '', '', '', '', 'active', 0, 1, '2024-12-07 10:41:25', 0, NULL),
(436, '24/00436', 'shri-krishna-petroleum', 'indore', '1', '', '12516910', ' SHRI KRISHNA PETROLEUM', 'DHAR', '', '', '', '2024-12-15', '2025-06-14', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 09:07:18', 0, NULL),
(437, '24/00437', 'shankheswer-parshv-filling-station', 'indore', '1', '', '12516980', ' SHANKHESWER PARSHV FILLING STATION', 'DHAR', '', '', '', '2024-12-07', '2025-06-06', '', '', '', '', '', '', 'active', 0, 1, '2024-12-10 12:42:25', 0, NULL),
(438, '24/00438', 'bharti-fill-fly', 'indore', '1', '', '12521620', ' BHARTI FILL & FLY', 'DHAR', '', '', '', '2024-12-13', '2025-06-12', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 10:46:27', 0, NULL),
(439, '24/00439', 'siddhivinayak-fuels', 'indore', '1', '', '12522540', ' SIDDHIVINAYAK FUELS', 'DHAR', '', '', '', '2024-12-18', '2025-06-17', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 06:50:55', 0, NULL),
(440, '24/00440', 'kunal-filling-station', 'indore', '1', '', '12525330', ' KUNAL FILLING STATION', 'DHAR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-05 05:24:26', 0, NULL),
(441, '24/00441', 'hardik-petro-point', 'indore', '1', '', '12526490', ' HARDIK PETRO POINT', 'DHAR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-05 05:25:13', 0, NULL),
(442, '24/00442', 'sai-muskan-fuels', 'indore', '1', '', '12530020', ' SAI MUSKAN FUELS', 'DHAR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-05 05:25:46', 0, NULL),
(443, '24/00443', 'satyam-shivam-petroleum', 'indore', '1', '', '12534930', ' SATYAM SHIVAM PETROLEUM', 'DHAR', '', '', '', '2024-12-16', '2025-06-15', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 08:57:17', 0, NULL),
(444, '24/00444', 'gupta-filling-center', 'indore', '1', '', '12535080', ' GUPTA FILLING CENTER', 'DHAR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-05 05:30:08', 0, NULL),
(445, '24/00445', 'kanchan-manna-sons', 'indore', '1', '', '12540710', ' KANCHAN MANNA & SONS', 'DHAR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-05 05:30:49', 0, NULL),
(446, '24/00446', 'amka-jhamka-petroleum', 'indore', '1', '', '12540750', ' AMKA JHAMKA PETROLEUM', 'DHAR', '', '', '', '2024-12-03', '2025-06-02', '', '', '', '', '', '', 'active', 0, 1, '2024-12-07 11:27:25', 0, NULL),
(447, '24/00447', 'harshit-fuels', 'indore', '1', '', '12543240', ' HARSHIT FUELS', 'DHAR', '', '', '', '2024-12-03', '2025-06-02', '', '', '', '', '', '', 'active', 0, 1, '2024-12-07 11:21:46', 0, NULL),
(448, '24/00448', 'chauhan-fuels', 'indore', '1', '', '12543250', ' CHAUHAN FUELS', 'DHAR', '', '', '', '2024-12-18', '2025-06-17', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 06:08:35', 0, NULL),
(449, '24/00449', 'jai-jinendra-petroleum', 'indore', '1', '', '12546660', ' JAI JINENDRA PETROLEUM', 'DHAR', '', '', '', '2024-12-14', '2025-06-13', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 10:33:18', 0, NULL),
(450, '24/00450', 'baghel-filling-station', 'indore', '1', '', '12563350', ' BAGHEL FILLING STATION', 'DHAR', '', '', '', '2024-12-14', '2025-06-13', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 09:38:45', 0, NULL),
(451, '24/00451', 'rudraksha-petro-station', 'indore', '1', '', '12563470', ' RUDRAKSHA PETRO STATION', 'DHAR', '', '', '', '2024-12-18', '2025-06-17', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 06:23:41', 0, NULL),
(452, '24/00452', 'prema-shree-fuel-centre', 'indore', '1', '', '12563480', ' PREMA SHREE FUEL CENTRE', 'DHAR', '', '', '', '2024-12-13', '2025-06-12', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 10:54:37', 0, NULL),
(453, '24/00453', 'sarvottam-fuel-station', 'indore', '1', '', '12583750', ' SARVOTTAM FUEL STATION', 'DHAR', '', '', '', '2024-12-15', '2025-06-14', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 09:09:52', 0, NULL),
(454, '24/00454', 'jay-shree-filling-station', 'indore', '1', '', '12583790', ' JAY SHREE FILLING STATION', 'DHAR', '', '', '', '2024-12-04', '2025-06-03', '', '', '', '', '', '', 'active', 0, 1, '2024-12-07 10:36:07', 0, NULL),
(455, '24/00455', 'tanted-fuel-point', 'indore', '1', '', '12580740', ' TANTED FUEL POINT', 'DHAR', '', '', '', '2024-12-04', '2025-06-03', '', '', '', '', '', '', 'active', 0, 1, '2024-12-07 11:04:07', 0, NULL),
(456, '24/00456', 'akshat-petroleum', 'indore', '1', '', '12586430', ' AKSHAT PETROLEUM', 'DHAR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-05 05:55:16', 0, NULL),
(457, '24/00457', 'vinayak-petroleum', 'indore', '1', '', '12586440', ' VINAYAK PETROLEUM', 'DHAR', '', '', '', '2024-12-18', '2025-06-17', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 06:16:25', 0, NULL),
(458, '24/00458', 'raamesh-petroleum', 'indore', '1', '', '12587500', ' RAAMESH PETROLEUM', 'DHAR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-05 05:56:38', 0, NULL),
(459, '24/00459', 'pawan-tanay-energy-station', 'indore', '1', '', '12590800', ' PAWAN TANAY ENERGY STATION', 'DHAR', '', '', '', '2024-12-13', '2025-06-12', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 10:36:44', 0, NULL),
(460, '24/00460', 'lakshya-petroleum', 'indore', '1', '', '12590810', ' LAKSHYA PETROLEUM', 'DHAR', '', '', '', '2024-12-14', '2025-06-13', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 09:59:17', 0, NULL),
(461, '24/00461', 'adhoc-shri-guru-krupa-service-cen-dasai', 'indore', '1', '', '12590970', ' ADHOC SHRI GURU KRUPA SERVICE CEN (Dasai)', 'DHAR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-05 05:58:12', 0, NULL),
(462, '24/00462', 'shree-rama-kanhaiya-fuels', 'indore', '1', '', '12590820', ' SHREE RAMA KANHAIYA FUELS', 'DHAR', '', '', '', '2024-12-18', '2025-06-17', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 06:43:46', 0, NULL),
(463, '24/00463', 'luniya-sons', 'indore', '1', '', '12592670', ' LUNIYA & SONS', 'DHAR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-05 05:59:18', 0, NULL),
(464, '24/00464', 'rathore-petroleum', 'indore', '1', '', '12595900', ' RATHORE PETROLEUM', 'DHAR', '', '', '', '2024-12-14', '2025-06-13', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 10:02:04', 0, NULL),
(465, '24/00465', 'amit-auto-service-centre', 'indore', '1', '', '11506750', ' AMIT AUTO SERVICE CENTRE', 'JHABUA', '', '', '', '2024-12-05', '2025-06-04', '', '', '', '', '', '', 'active', 0, 1, '2024-12-07 08:01:49', 0, NULL),
(466, '24/00466', 'vasunia-petroleum', 'indore', '1', '', '11769900', ' VASUNIA PETROLEUM', 'JHABUA', '', '', '', '2024-12-06', '2025-06-05', '', '', '', '', '', '', 'active', 0, 1, '2024-12-07 06:54:56', 0, NULL),
(467, '24/00467', 'surya-petroleum', 'indore', '1', '', '12254200', ' SURYA PETROLEUM', 'JHABUA', '', '', '', '2024-12-06', '2025-06-05', '', '', '', '', '', '', 'active', 0, 1, '2024-12-07 07:13:07', 0, NULL),
(468, '24/00468', 'bapoo-petroleum', 'indore', '1', '', '12505520', ' BAPOO PETROLEUM', 'JHABUA', '', '', '', '2024-12-07', '2025-06-06', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 11:30:55', 0, NULL),
(469, '24/00469', 'vasunia-fuel-center', 'indore', '1', '', '12505570', ' VASUNIA FUEL CENTER', 'JHABUA', '', '', '', '2024-12-06', '2025-06-05', '', '', '', '', '', '', 'active', 0, 1, '2024-12-07 06:15:21', 0, NULL);
INSERT INTO `outlet` (`id`, `sno`, `token`, `zone`, `branch`, `outlet_type`, `customer_id`, `outlet_name`, `outlet_location`, `contact_name`, `contact_number`, `earthing_chamber`, `checking_date`, `renewal_date`, `cvt`, `stabilizer`, `stp`, `yard_pole`, `canopy_light`, `pump`, `status`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(470, '24/00470', 'adhoc-aashirwad-automobiles-sai-deep', 'indore', '1', '', '12589760', ' ADHOC AASHIRWAD AUTOMOBILES (Sai Deep)', 'JHABUA', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-05 06:05:54', 0, NULL),
(471, '24/00471', 'shree-navkar-automobiles', 'indore', '1', '', '12532410', ' SHREE NAVKAR AUTOMOBILES', 'JHABUA', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-05 11:39:50', 1, '2024-12-05 11:39:50'),
(472, '24/00472', 'sai-kriti-petroleum', 'indore', '1', '', '12532420', ' SAI KRITI PETROLEUM', 'JHABUA', '', '', '', '2024-12-05', '2025-06-04', '', '', '', '', '', '', 'active', 0, 1, '2024-12-07 10:05:00', 0, NULL),
(473, '24/00473', 'bhandari-fuels', 'indore', '1', '', '12532430', ' BHANDARI FUELS', 'JHABUA', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-05 06:11:01', 0, NULL),
(474, '24/00474', 'shri-maruti-automobiles', 'indore', '1', '', '12532490', ' SHRI MARUTI AUTOMOBILES', 'JHABUA', '', '', '', '2024-12-06', '2025-06-05', '', '', '', '', '', '', 'active', 0, 1, '2024-12-07 07:23:34', 0, NULL),
(475, '24/00475', 'bhandari-petroleum', 'indore', '1', '', '12534910', ' BHANDARI PETROLEUM', 'JHABUA', '', '', '', '2024-12-06', '2025-06-05', '', '', '', '', '', '', 'active', 0, 1, '2024-12-07 06:56:45', 0, NULL),
(476, '24/00476', 'shri-nakoda-filling-centre', 'indore', '1', '', '12537220', ' SHRI NAKODA FILLING CENTRE', 'JHABUA', '', '', '', '2024-12-05', '2025-06-04', '', '', '', '', '', '', 'active', 0, 1, '2024-12-07 09:36:31', 0, NULL),
(477, '24/00477', 'aashirwad-automobiles', 'indore', '1', '', '12546620', ' AASHIRWAD AUTOMOBILES', 'JHABUA', '', '', '', '2024-12-05', '2025-06-04', '', '', '', '', '', '', 'active', 0, 1, '2024-12-07 09:26:27', 0, NULL),
(478, '24/00478', 'bhandari-highway-petroleum', 'indore', '1', '', '12546670', ' BHANDARI HIGHWAY PETROLEUM', 'JHABUA', '', '', '', '2024-12-06', '2025-06-05', '', '', '', '', '', '', 'active', 0, 1, '2024-12-27 11:59:28', 0, NULL),
(479, '24/00479', 'maa-baglamukhi-fuel', 'indore', '1', '', '12552130', ' MAA BAGLAMUKHI FUEL', 'JHABUA', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-05 06:15:56', 0, NULL),
(480, '24/00480', 'vaishnavi-enterprises', 'indore', '1', '', '12583400', ' VAISHNAVI ENTERPRISES', 'JHABUA', '', '', '', '2024-12-05', '2025-06-04', '', '', '', '', '', '', 'active', 0, 1, '2024-12-07 09:32:47', 0, NULL),
(481, '24/00481', 'charbhuja-nath-fuels', 'indore', '1', '', '12587490', ' CHARBHUJA NATH FUELS', 'JHABUA', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-05 06:17:17', 0, NULL),
(482, '24/00482', 'prathvi-fuel-center', 'indore', '1', '', '12587570', ' PRATHVI FUEL CENTER', 'JHABUA', '', '', '', '2024-12-05', '2025-06-04', '', '', '', '', '', '', 'active', 0, 1, '2024-12-07 08:04:15', 0, NULL),
(483, '24/00483', 'shree-narayan-fuel-station', 'indore', '1', '', '12592690', ' SHREE NARAYAN FUEL STATION', 'JHABUA', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-05 06:18:24', 0, NULL),
(484, '24/00484', 'hadpl-cube-stop', 'indore', '1', '', '12608610', 'HADPL Cube Stop', 'DHAR', '', '', '', '2024-12-04', '2025-06-03', '', '', '', '', '', '', 'active', 0, 1, '2024-12-07 11:13:59', 0, NULL),
(485, '24/00485', 'chavadi-petroleum-co', 'chennai', '9', '', '', 'CHAVADI PETROLEUM & CO ', 'KG CHAVADI', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-07 06:48:23', 0, NULL),
(486, '24/00486', 'gkhaleel-rahman', 'chennai', '9', '', '', 'G.KHALEEL RAHMAN', 'TIRUPUR', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-07 06:49:39', 0, NULL),
(487, '24/00487', 'venkateswara-fuel-service', 'chennai', '9', '', '', 'VENKATESWARA FUEL SERVICE ', 'PERUNDURAI ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-07 06:50:48', 0, NULL),
(488, '24/00488', 'venkateswara-fuel-service-adhoc', 'chennai', '9', '', '', 'VENKATESWARA FUEL SERVICE ADHOC ', 'PERUNDURAI ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-07 06:52:36', 0, NULL),
(489, '24/00489', 'ck-dawood-co', 'chennai', '9', '', '', 'CK DAWOOD & CO ', 'SATHY ROAD ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-07 06:56:05', 0, NULL),
(490, '24/00490', 'muthukumarasamy-agency', 'chennai', '9', '', '', 'MUTHUKUMARASAMY AGENCY ', 'MADHUKARAI', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-07 06:58:11', 0, NULL),
(491, '24/00491', 'ganapathy-agency', 'chennai', '7', '', '', 'GANAPATHY AGENCY ', 'CUDDALORE ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-07 07:11:11', 0, NULL),
(492, '24/00492', 'mks-agencies', 'chennai', '7', '', '', 'MKS AGENCIES ', 'CUDDALORE', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-07 07:14:17', 0, NULL),
(493, '24/00493', 'jsv-fuels', 'chennai', '7', '', '', 'JSV FUELS ', 'NAGAI ROAD', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-07 07:15:22', 0, NULL),
(494, '24/00494', 'nani-fuel-station', 'chennai', '7', '', '', 'NANI FUEL STATION ', 'TRICHY ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-07 07:16:39', 0, NULL),
(495, '24/00495', 'kavitha-traders', 'chennai', '8', '', '', 'KAVITHA TRADERS ', 'RADHAPURAM, ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-07 07:21:26', 0, NULL),
(496, '24/00496', 'salson', 'chennai', '8', '', '', 'SALSON ', 'THOPPUR', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-07 07:22:18', 0, NULL),
(497, '24/00497', 'nadarajan-petroleum', 'chennai', '8', '', '', 'NADARAJAN PETROLEUM ', 'THINGAL NAGAR', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-07 07:23:19', 0, NULL),
(498, '24/00498', 'sree-venkateshwara-fuels', 'chennai', '8', '', '', 'SREE VENKATESHWARA FUELS ', 'KARUNGULAM ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-07 07:28:46', 0, NULL),
(499, '24/00499', 'adhoc-r-k-petroleum', 'chennai', '7', '', '', 'ADHOC   R K PETROLEUM', 'THIRUNAGESWARAM', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-10 11:15:11', 0, NULL),
(500, '24/00500', 'rms-agency', 'chennai', '9', '', '', 'RMS AGENCY ', 'PUNJAIPULLAMPATTI', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-10 23:10:32', 0, NULL),
(501, '24/00501', 'sri-balavasavi-service-station', 'chennai', '9', '', '', 'SRI BALAVASAVI SERVICE STATION ', 'COONOOR', '', '', '', '2024-12-10', '2025-06-09', '', '', '', '', '', '', 'active', 0, 40, '2024-12-11 11:36:25', 0, NULL),
(502, '24/00502', 'sree-r-geetha-agencies', 'chennai', '9', '', '', 'SREE R GEETHA AGENCIES ', 'OOTY', '', '', '', '2024-12-10', '2025-06-09', '', '', '', '', '', '', 'active', 0, 40, '2024-12-11 11:37:53', 0, NULL),
(503, '24/00503', 'the-nilgiri-petroleum', 'chennai', '9', '', '', 'THE NILGIRI PETROLEUM ', 'OOTY', '', '', '', '2024-12-10', '2025-06-09', '', '', '', '', '', '', 'active', 0, 40, '2024-12-11 11:38:32', 0, NULL),
(504, '24/00504', 'tribal-research-centre-fuel-station', 'chennai', '9', '', '', 'TRIBAL RESEARCH CENTRE FUEL STATION ', 'OOTY', '', '', '', '2024-12-10', '2025-06-09', '', '', '', '', '', '', 'active', 0, 40, '2024-12-11 11:39:34', 0, NULL),
(505, '24/00505', 'c-govindan-co', 'chennai', '9', '', '', 'C GOVINDAN & CO ', 'OOTY', '', '', '', '2024-12-10', '2025-06-09', '', '', '', '', '', '', 'active', 0, 40, '2024-12-11 11:40:31', 0, NULL),
(506, '24/00506', 'golden-petroleum', 'chennai', '9', '', '', 'GOLDEN PETROLEUM ', 'OOTY', '', '', '', '2024-12-11', '2025-06-10', '', '', '', '', '', '', 'active', 0, 40, '2024-12-11 11:42:18', 0, NULL),
(507, '24/00507', 'selva-fuel-point', 'chennai', '8', '', '', 'SELVA FUEL POINT ', 'VALLIOR', '', '', '', '2024-12-09', '2025-06-08', '', '', '', '', '', '', 'active', 0, 40, '2024-12-11 12:53:52', 0, NULL),
(508, '24/00508', 'eagle-auto-motive', 'chennai', '8', '', '', 'EAGLE AUTO MOTIVE', 'PANNANKULAM', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-10 23:38:35', 0, NULL),
(509, '24/00509', 'as-kani-fuels', 'chennai', '8', '', '', 'AS KANI FUELS ', 'PERUMALPURAM ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-10 23:39:52', 0, NULL),
(510, '24/00510', 'jawan-enterprises', 'chennai', '9', '', '', 'JAWAN ENTERPRISES', 'TENKASI ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-11 11:35:13', 40, '2024-12-11 11:35:13'),
(511, '24/00511', 'jawan-enterprises', 'chennai', '8', '', '', 'JAWAN ENTERPRISES ', 'TENKASI ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-11 00:42:08', 0, NULL),
(512, '24/00512', 'ramaji-petroleum', 'mumbai', '4', '', '12568650', 'RAMAJI PETROLEUM', 'Pandharpur', '', '', '', '2024-12-05', '2025-06-04', '', '', '', '', '', '', 'active', 0, 1, '2024-12-11 11:22:56', 0, NULL),
(513, '24/00513', 'kovai-fuel-point', 'chennai', '9', '', '', 'KOVAI FUEL POINT', 'KRISHNARAYAPURAM ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-11 06:13:58', 0, NULL),
(514, '24/00514', 'tucas', 'chennai', '9', '', '', 'TUCAS ', 'THUDIYALUR', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-11 06:15:48', 0, NULL),
(515, '24/00515', 'edathussery-petroleum', 'chennai', '9', '', '', 'EDATHUSSERY PETROLEUM ', 'OOTY', '', '', '', '2024-12-11', '2025-06-10', '', '', '', '', '', '', 'active', 0, 40, '2024-12-11 11:48:25', 0, NULL),
(516, '24/00516', 'kamalsai-petroleum', 'mumbai', '4', '', '12565170', 'KAMALSAI PETROLEUM', 'Pandharpur', '', '', '', '2024-12-05', '2025-06-04', '', '', '', '', '', '', 'active', 0, 1, '2024-12-11 11:56:48', 0, NULL),
(517, '24/00517', 'sant-savta-mali-petroleum', 'mumbai', '4', '', '12559660', 'SANT SAVTA MALI PETROLEUM', 'Pandharpur', '', '', '', '2024-12-06', '2025-06-05', '', '', '', '', '', '', 'active', 0, 1, '2024-12-11 12:01:51', 0, NULL),
(518, '24/00518', 'shri-mayureshwar-petroleum', 'mumbai', '4', '', '12582840', 'SHRI MAYURESHWAR PETROLEUM', 'Pandharpur', '', '', '', '2024-12-06', '2025-06-05', '', '', '', '', '', '', 'active', 0, 1, '2024-12-11 12:12:28', 0, NULL),
(519, '24/00519', 'shambhuraje-petroleum', 'mumbai', '4', '', '12528490', 'SHAMBHURAJE PETROLEUM', 'Pandharpur', '', '', '', '2024-12-06', '2025-06-05', '', '', '', '', '', '', 'active', 0, 1, '2024-12-11 12:30:32', 0, NULL),
(520, '24/00520', 'vasantham-agencies', 'chennai', '7', '', '', 'VASANTHAM AGENCIES ', 'TINDIVANAM', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-11 07:03:45', 0, NULL),
(521, '24/00521', 'sudha-sagar-fuel-station', 'indore', '2', '', '12582570', 'Sudha Sagar Fuel Station', 'Bhopal Retail S.A.', '', '', '', '2024-12-13', '2025-06-12', '', '', '', '', '', '', 'active', 0, 1, '2024-12-16 07:14:32', 0, NULL),
(522, '24/00522', 'ansh-fuel-station', 'indore', '2', '', '12562180', ' Ansh Fuel Station', 'Hoshangabad Retail S.A.', '', '', '', '2024-12-25', '2025-06-24', '', '', '', '', '', '', 'active', 0, 1, '2024-12-28 07:06:31', 0, NULL),
(523, '24/00523', 'yadav-sales-service', 'indore', '2', '', '12533920', ' Yadav Sales & Service', 'Hoshangabad Retail S.A.', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-12 05:43:27', 1, '2024-12-12 05:43:27'),
(524, '24/00524', 'adheesh-fuel', 'indore', '2', '', '12539120', ' Adheesh Fuel', 'Sehore Retail S.A.', '', '', '', '2024-12-13', '2025-06-12', '', '', '', '', '', '', 'active', 0, 1, '2024-12-16 07:12:45', 0, NULL),
(525, '24/00525', 'shakunala-devi-filling-center', 'indore', '2', '', '12686900', ' Shakunala Devi Filling Center', 'Sehore Retail S.A.', '', '', '', '2024-12-15', '2025-06-14', '', '', '', '', '', '', 'active', 0, 1, '2024-12-16 05:44:56', 0, NULL),
(526, '24/00526', 'shivgeeta-filling-station', 'indore', '2', '', '12579180', 'Shivgeeta Filling Station', 'Sehore Retail S.A.', '', '', '', '2024-12-16', '2025-06-15', '', '', '', '', '', '', 'active', 0, 1, '2024-12-20 11:44:29', 0, NULL),
(527, '24/00527', 'ma-gayatri-filling-stationgudrawa', 'indore', '2', '', '12577200', ' Ma Gayatri Filling Station-Gudrawa', 'Sehore Retail S.A.', '', '', '', '2024-12-17', '2025-06-16', '', '', '', '', '', '', 'active', 0, 1, '2024-12-20 10:44:21', 0, NULL),
(528, '24/00528', 'neelkamal-kurawar', 'indore', '2', '', '11725600', ' Neelkamal Kurawar', 'Sehore Retail S.A.', '', '', '', '2024-12-13', '2025-06-12', '', '', '', '', '', '', 'active', 0, 1, '2024-12-14 12:08:00', 0, NULL),
(529, '24/00529', 'azad-petrol-pump', 'indore', '2', '', '12588310', 'Azad Petrol Pump', 'Sehore Retail S.A.', '', '', '', '2024-12-15', '2025-06-14', '', '', '', '', '', '', 'active', 0, 1, '2024-12-16 05:20:19', 0, NULL),
(530, '24/00530', 'rajkumar-fuel-centre', 'indore', '2', '', '12686890', '    Rajkumar Fuel Centre', 'Sehore Retail S.A.', '', '', '', '2024-12-16', '2025-06-15', '', '', '', '', '', '', 'active', 0, 1, '2024-12-20 10:35:15', 0, NULL),
(531, '24/00531', 'maa-pitambara-filling-station', 'indore', '2', '', '12536370', ' Maa Pitambara Filling Station', 'Sehore Retail S.A.', '', '', '', '2024-12-17', '2025-06-16', '', '', '', '', '', '', 'active', 0, 1, '2024-12-20 06:24:31', 0, NULL),
(532, '24/00532', 'moolchand-hiralal-chhapiheda', 'indore', '2', '', '11478610', 'Moolchand Hiralal Chhapiheda', 'Sehore Retail S.A.', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-12 00:20:12', 0, NULL),
(533, '24/00533', 'taj-filling-station', 'indore', '2', '', '12586990', ' Taj Filling Station', 'Sehore Retail S.A.', '', '', '', '2024-12-18', '2025-06-17', '', '', '', '', '', '', 'active', 0, 1, '2024-12-19 11:47:22', 0, NULL),
(534, '24/00534', 'pragati-filling-station', 'indore', '2', '', '12881830', ' Pragati Filling Station', 'Sehore Retail S.A.', '', '', '', '2024-12-18', '2025-06-17', '', '', '', '', '', '', 'active', 0, 1, '2024-12-19 11:17:23', 0, NULL),
(535, '24/00535', 'ajay-highway-agar', 'indore', '2', '', '12122700', ' Ajay Highway Agar', 'Sehore Retail S.A.', '', '', '', '2024-12-18', '2025-06-17', '', '', '', '', '', '', 'active', 0, 1, '2024-12-19 11:25:10', 0, NULL),
(536, '24/00536', 'gopal-ji-fuels', 'indore', '2', '', '12536390', ' Gopal Ji Fuels', 'Sehore Retail S.A.', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-12 00:23:40', 0, NULL),
(537, '24/00537', 'devchand-dhapani-fillings', 'indore', '2', '', '12581880', 'Devchand Dhapani Fillings', 'Sehore Retail S.A.', '', '', '', '2024-12-16', '2025-06-15', '', '', '', '', '', '', 'active', 0, 1, '2024-12-20 11:40:03', 0, NULL),
(538, '24/00538', 'prayag-filling-station', 'indore', '2', '', '12587390', ' Prayag Filling Station', 'Vidisha Retail S A', '', '', '', '2024-12-11', '2025-06-10', '', '', '', '', '', '', 'active', 0, 1, '2024-12-12 12:06:32', 1, '2024-12-12 05:58:28'),
(539, '24/00539', 'j-n-patel-fuels', 'indore', '2', '', '12582490', ' J N Patel Fuels', 'Vidisha Retail S A', '', '', '', '2024-12-12', '2025-06-11', '', '', '', '', '', '', 'active', 0, 1, '2024-12-12 12:00:31', 1, '2024-12-12 05:59:01'),
(540, '24/00540', 'tomar-petrol-pump', 'indore', '2', '', '12582320', ' Tomar Petrol Pump', 'Vidisha Retail S A', '', '', '', '2024-12-14', '2025-06-13', '', '', '', '', '', '', 'active', 0, 1, '2024-12-16 06:32:56', 1, '2024-12-12 05:59:29'),
(541, '24/00541', 'siyote-fuels-sultanpur', 'indore', '2', '', '12571870', 'Siyote Fuels , Sultanpur', 'Vidisha Retail S A', '', '', '', '2024-12-12', '2025-06-11', '', '', '', '', '', '', 'active', 0, 1, '2024-12-12 11:56:29', 1, '2024-12-12 05:59:49'),
(542, '24/00542', 'chainpur-filling-station', 'indore', '2', '', '12580890', ' Chainpur Filling Station', 'Vidisha Retail S A', '', '', '', '2024-12-18', '2025-06-17', '', '', '', '', '', '', 'active', 0, 1, '2024-12-19 11:52:04', 1, '2024-12-12 05:58:41'),
(543, '24/00543', 'adhoc-jaithari-filling-station', 'indore', '2', '', '12881960', ' Adhoc Jaithari Filling Station', 'Vidisha Retail S A', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-12 00:30:29', 0, NULL),
(544, '24/00544', 'diesel-sales-and-service', 'indore', '2', '', '11512110', ' Diesel Sales And Service', 'Vidisha Retail S A', '', '', '', '2024-12-15', '2025-06-14', '', '', '', '', '', '', 'active', 0, 1, '2024-12-16 06:10:42', 0, NULL),
(545, '24/00545', 'adhoc-kundalli-filling-station', 'indore', '2', '', '41067616', 'Adhoc Kundalli Filling Station', 'Vidisha Retail S A', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-12 00:33:28', 0, NULL),
(546, '24/00546', 'shriram-sales-service', 'indore', '2', '', '11508210', ' Shriram Sales & Service', 'Vidisha Retail S A', '', '', '', '2024-12-21', '2025-06-20', '', '', '', '', '', '', 'active', 0, 1, '2024-12-24 11:09:05', 0, NULL),
(547, '24/00547', 'yashashwini-filling-station', 'indore', '2', '', '12502340', ' Yashashwini Filling Station', 'Vidisha Retail S A', '', '', '', '2024-12-17', '2025-06-16', '', '', '', '', '', '', 'active', 0, 1, '2024-12-19 12:06:14', 0, NULL),
(548, '24/00548', 'adhoc-aalampur-filling-station', 'indore', '2', '', '12881970', ' Adhoc Aalampur Filling Station', 'Vidisha Retail S A', '', '', '', '2024-12-12', '2025-06-11', '', '', '', '', '', '', 'active', 0, 1, '2024-12-16 07:18:56', 0, NULL),
(549, '24/00549', 'shree-shastri-petroleum', 'indore', '2', '', '12582390', ' Shree Shastri Petroleum', 'Vidisha Retail S A', '', '', '', '2024-12-15', '2025-06-14', '', '', '', '', '', '', 'active', 0, 1, '2024-12-16 05:24:21', 0, NULL),
(550, '24/00550', 'aalampur-filling-station', 'indore', '2', '', '12551720', ' Aalampur Filling Station', 'Vidisha Retail S A', '', '', '', '2024-12-13', '2025-06-12', '', '', '', '', '', '', 'active', 0, 1, '2024-12-16 06:56:21', 0, NULL),
(551, '24/00551', 'kundali-filling-station', 'indore', '2', '', '12581840', ' Kundali Filling Station', 'Vidisha Retail S A', '', '', '', '2024-12-16', '2025-06-15', '', '', '', '', '', '', 'active', 0, 1, '2024-12-20 11:57:40', 0, NULL),
(552, '24/00552', 'maruti-petroleum', 'indore', '2', '', '12586460', ' Maruti Petroleum', 'Vidisha Retail S A', '', '', '', '2024-12-17', '2025-06-16', '', '', '', '', '', '', 'active', 0, 1, '2024-12-20 05:26:34', 0, NULL),
(553, '24/00553', 'adhoc-bina-refinary-ser-station', 'indore', '2', '', '12686810', ' Adhoc Bina Refinary Ser Station', 'Vidisha Retail S A', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-12 00:54:36', 0, NULL),
(554, '24/00554', 'kanak-fuel-station', 'indore', '2', '', '12533820', 'Kanak Fuel Station', 'Vidisha Retail S A', '', '', '', '2024-12-18', '2025-06-17', '', '', '', '', '', '', 'active', 0, 1, '2024-12-19 11:19:33', 0, NULL),
(555, '24/00555', 'mahadev-fuel-station', 'indore', '2', '', '12586480', ' Mahadev Fuel Station', 'Vidisha Retail S A', '', '', '', '2024-12-11', '2025-06-10', '', '', '', '', '', '', 'active', 0, 1, '2024-12-12 12:04:18', 0, NULL),
(556, '24/00556', 'shiv-kripa-fuel', 'indore', '2', '', '12555540', ' Shiv Kripa Fuel', 'Vidisha Retail S A', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-12 00:56:11', 0, NULL),
(557, '24/00557', 'shubham-dcm-transport', 'indore', '2', '', '11725800', 'Shubham Dcm Transport', 'Vidisha Retail S A', '', '', '', '2024-12-11', '2025-06-10', '', '', '', '', '', '', 'active', 0, 1, '2024-12-12 12:30:56', 0, NULL),
(558, '24/00558', 'jai-maa-filling-station', 'indore', '2', '', '12516630', ' Jai Maa Filling Station', 'Vidisha Retail S A', '', '', '', '2024-12-15', '2025-06-14', '', '', '', '', '', '', 'active', 0, 1, '2024-12-16 05:52:57', 0, NULL),
(559, '24/00559', 'motilal-fuel-station', 'indore', '2', '', '12587180', ' Motilal Fuel Station', 'Vidisha Retail S A', '', '', '', '2024-12-13', '2025-06-12', '', '', '', '', '', '', 'active', 0, 1, '2024-12-16 07:09:33', 0, NULL),
(560, '24/00560', 'tejashwani-filling-station', 'indore', '2', '', '12514770', ' Tejashwani Filling Station', 'Vidisha Retail S A', '', '', '', '2024-12-18', '2025-06-17', '', '', '', '', '', '', 'active', 0, 1, '2024-12-19 11:41:34', 0, NULL),
(561, '24/00561', 'aarya-petroleum', 'indore', '2', '', '12553440', ' Aarya Petroleum', 'Vidisha Retail S A', '', '', '', '2024-12-16', '2025-06-15', '', '', '', '', '', '', 'active', 0, 1, '2024-12-20 10:37:27', 0, NULL),
(562, '24/00562', 'jai-mata-dee-fuel-station', 'indore', '2', '', '12519220', ' Jai Mata Dee Fuel Station', 'Vidisha Retail S A', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-12 00:59:37', 0, NULL),
(563, '24/00563', 'sultanganj-filling-station', 'indore', '2', '', '12558140', ' Sultanganj Filling Station', 'Vidisha Retail S A', '', '', '', '2024-12-14', '2025-06-13', '', '', '', '', '', '', 'active', 0, 1, '2024-12-16 06:23:07', 0, NULL),
(564, '24/00564', 'rajendra-singh-bros', 'indore', '2', '', '11496010', ' Rajendra Singh & Bros', 'Vidisha Retail S A', '', '', '', '2024-12-18', '2025-06-17', '', '', '', '', '', '', 'active', 0, 1, '2024-12-19 11:54:37', 0, NULL),
(565, '24/00565', 'amar-petrol-pump', 'indore', '2', '', '11725500', ' Amar Petrol Pump', 'Vidisha Retail S A', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-12 01:01:10', 0, NULL),
(566, '24/00566', 'maruti-diesels', 'indore', '2', '', '12522420', ' Maruti Diesels', 'Vidisha Retail S A', '', '', '', '2024-12-15', '2025-06-14', '', '', '', '', '', '', 'active', 0, 1, '2024-12-16 05:41:39', 0, NULL),
(567, '24/00567', 'g-s-petroleum', 'indore', '2', '', '12582370', 'G S Petroleum', 'Vidisha Retail S A', '', '', '', '2024-12-17', '2025-06-16', '', '', '', '', '', '', 'active', 0, 1, '2024-12-20 05:33:41', 0, NULL),
(568, '24/00568', 'atwal-petro', 'indore', '2', '', '12526370', ' Atwal Petro', 'Vidisha Retail S A', '', '', '', '2024-12-12', '2025-06-11', '', '', '', '', '', '', 'active', 0, 1, '2024-12-14 12:01:16', 0, NULL),
(569, '24/00569', 'mala-fuel-service', 'indore', '2', '', '12502370', ' Mala Fuel Service', 'Vidisha Retail S A', '', '', '', '2024-12-14', '2025-06-13', '', '', '', '', '', '', 'active', 0, 1, '2024-12-16 06:51:14', 0, NULL),
(570, '24/00570', 'happy-petroleum', 'indore', '2', '', '12781860', ' Happy Petroleum', 'Vidisha Retail S A', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-12 01:15:20', 0, NULL),
(571, '24/00571', 'jaithari-filling-station', 'indore', '2', '', '12581830', ' Jaithari Filling Station', 'Vidisha Retail S A', '', '', '', '2024-12-16', '2025-06-15', '', '', '', '', '', '', 'active', 0, 1, '2024-12-20 10:26:25', 0, NULL),
(572, '24/00572', 'sardar-filling-station', 'indore', '2', '', '12586450', ' Sardar Filling Station', 'Vidisha Retail S A', '', '', '', '2024-12-14', '2025-06-13', '', '', '', '', '', '', 'active', 0, 1, '2024-12-16 06:49:01', 0, NULL),
(573, '24/00573', 'raguvanshi-krishi-sewa-kendra', 'indore', '2', '', '11748010', ' Raguvanshi Krishi Sewa Kendra', 'Vidisha Retail S A', '', '', '', '2024-12-15', '2025-06-14', '', '', '', '', '', '', 'active', 0, 1, '2024-12-16 05:06:11', 0, NULL),
(574, '24/00574', 'parshvanath-petroleum', 'indore', '2', '', '12582550', ' Parshvanath Petroleum', 'Vidisha Retail S A', '', '', '', '2024-12-15', '2025-06-14', '', '', '', '', '', '', 'active', 0, 1, '2024-12-16 05:55:48', 0, NULL),
(575, '24/00575', 'jai-durge-filling-station', 'indore', '2', '', '12558120', ' Jai Durge Filling Station', 'Vidisha Retail S A', '', '', '', '2024-12-20', '2025-06-19', '', '', '', '', '', '', 'active', 0, 1, '2024-12-24 11:15:06', 0, NULL),
(576, '24/00576', 'maa-karma-petrol-pump', 'indore', '2', '', '12582340', ' Maa Karma Petrol Pump', 'Vidisha Retail S A', '', '', '', '2024-12-12', '2025-06-11', '', '', '', '', '', '', 'active', 0, 1, '2024-12-12 11:48:44', 0, NULL),
(577, '24/00577', 'bapu-shree-cargo', 'indore', '2', '', '11502910', 'Bapu Shree Cargo', 'Sehore Retail S.A.', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-12 01:38:12', 0, NULL),
(578, '24/00578', 'adhoc-gandhi-fuels', 'indore', '2', '', '12687000', 'Adhoc Gandhi Fuels', 'Sehore Retail S.A.', '', '', '', '2024-12-19', '2025-06-18', '', '', '', '', '', '', 'active', 0, 1, '2024-12-20 11:08:38', 0, NULL),
(579, '24/00579', 'prabha-refuelling-station', 'indore', '2', '', '12580910', 'Prabha Refuelling Station', 'Sehore Retail S.A.', '', '', '', '2024-12-18', '2025-06-17', '', '', '', '', '', '', 'active', 0, 1, '2024-12-19 11:44:30', 0, NULL),
(580, '24/00580', 'bajrang-krupa-fuels', 'indore', '2', '', '12689100', 'Bajrang Krupa Fuels', 'Sehore Retail S.A.', '', '', '', '2024-12-18', '2025-06-17', '', '', '', '', '', '', 'active', 0, 1, '2024-12-19 11:57:05', 0, NULL),
(581, '24/00581', 'biaora-sales-service', 'indore', '2', '', '11480510', 'Biaora Sales & Service', 'Sehore Retail S.A.', '', '', '', '2024-12-13', '2025-06-12', '', '', '', '', '', '', 'active', 0, 1, '2024-12-16 06:58:42', 0, NULL),
(582, '24/00582', 'shri-lala-automobile', 'indore', '2', '', '12593940', 'Shri Lala Automobile', 'Bhopal Retail S.A.', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-12 01:41:41', 0, NULL),
(583, '24/00583', 'adhoc-maa-ganga-filling-station', 'indore', '2', '', '12881870', 'Adhoc Maa Ganga Filling Station', 'Sehore Retail S.A.', '', '', '', '2024-12-19', '2025-06-18', '', '', '', '', '', '', 'active', 0, 1, '2024-12-20 09:35:01', 0, NULL),
(584, '24/00584', 'shrinathji-fuels-ashta', 'indore', '2', '', '12572580', 'Shrinathji Fuels Ashta', 'Sehore Retail S.A.', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-12 01:44:54', 0, NULL),
(585, '24/00585', 'madhav-energy-station', 'indore', '2', '', '12580190', 'Madhav Energy Station', 'Sehore Retail S.A.', '', '', '', '2024-12-14', '2025-06-13', '', '', '', '', '', '', 'active', 0, 1, '2024-12-16 06:26:18', 0, NULL),
(586, '24/00586', 'jai-baba-petrol-pump', 'indore', '2', '', '12272600', 'Jai Baba Petrol Pump', 'Sehore Retail S.A.', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-12 01:46:13', 0, NULL),
(587, '24/00587', 'anil-transport-co', 'indore', '2', '', '12580930', 'Anil Transport Co', 'Sehore Retail S.A.', '', '', '', '2024-12-17', '2025-06-16', '', '', '', '', '', '', 'active', 0, 1, '2024-12-19 12:18:57', 0, NULL),
(588, '24/00588', 'hariom-petrol-pump', 'indore', '2', '', '12586980', 'Hariom Petrol Pump', 'Sehore Retail S.A.', '', '', '', '2024-12-19', '2025-06-18', '', '', '', '', '', '', 'active', 0, 1, '2024-12-20 09:35:56', 0, NULL),
(589, '24/00589', 'power-fuels', 'indore', '2', '', '12580940', 'Power Fuels', 'Sehore Retail S.A.', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-12 01:48:12', 0, NULL),
(590, '24/00590', 'sidha-vinayak-fuel-center', 'indore', '2', '', '12524360', 'Sidha Vinayak Fuel Center', 'Sehore Retail S.A.', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-12 01:49:01', 0, NULL),
(591, '24/00591', 'shree-siddhveer-petroleum', 'indore', '2', '', '12686970', 'Shree Siddhveer Petroleum', 'Sehore Retail S.A.', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-12 01:49:46', 0, NULL),
(592, '24/00592', 'pavitra-moti-filling-stn', 'indore', '2', '', '12881860', 'Pavitra Moti Filling Stn', 'Sehore Retail S.A.', '', '', '', '2024-12-16', '2025-06-15', '', '', '', '', '', '', 'active', 0, 1, '2024-12-26 11:34:17', 0, NULL),
(593, '24/00593', 'police-welfare-fuel-centrebiaora', 'indore', '2', '', '12881850', 'Police Welfare Fuel Centre-Biaora', 'Sehore Retail S.A.', '', '', '', '2024-12-14', '2025-06-13', '', '', '', '', '', '', 'active', 0, 1, '2024-12-26 10:52:02', 0, NULL),
(594, '24/00594', 'adhoc-anil-transport-co', 'indore', '2', '', '12548970', 'Adhoc Anil Transport Co.', 'Sehore Retail S.A.', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-12 01:52:20', 0, NULL),
(595, '24/00595', 'shri-siddhanath-fuels', 'indore', '2', '', '12588360', 'Shri Siddhanath Fuels', 'Sehore Retail S.A.', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-12 01:52:58', 0, NULL),
(596, '24/00596', 'patel-filling-station', 'indore', '2', '', '12580920', 'Patel Filling Station', 'Sehore Retail S.A.', '', '', '', '2024-12-19', '2025-06-18', '', '', '', '', '', '', 'active', 0, 1, '2024-12-20 09:11:23', 0, NULL),
(597, '24/00597', 'mahakaal-filling-station', 'indore', '2', '', '12556360', 'Mahakaal Filling Station', 'Sehore Retail S.A.', '', '', '', '2024-12-19', '2025-06-18', '', '', '', '', '', '', 'active', 0, 1, '2024-12-20 10:08:34', 0, NULL),
(598, '24/00598', 'anandilal-champalal-agarwal', 'indore', '2', '', '11516011', 'Anandilal Champalal Agarwal', 'Sehore Retail S.A.', '', '', '', '2024-12-15', '2025-06-14', '', '', '', '', '', '', 'active', 0, 1, '2024-12-16 05:49:36', 0, NULL),
(599, '24/00599', 'hp-auto-centre-ashta', 'indore', '2', '', '12781850', 'Hp Auto Centre Ashta', 'Sehore Retail S.A.', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-12 01:56:00', 0, NULL),
(600, '24/00600', 'shri-siddarth-petrol-pump', 'indore', '2', '', '12586220', 'Shri Siddarth Petrol Pump', 'Sehore Retail S.A.', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-12 01:56:33', 0, NULL),
(601, '24/00601', 'hare-krishanan-petroleum', 'indore', '2', '', '12588350', 'Hare Krishanan Petroleum', 'Sehore Retail S.A.', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-12 01:57:07', 0, NULL),
(602, '24/00602', 'purshottam-filling-station', 'indore', '2', '', '12553450', 'Purshottam Filling Station', 'Sehore Retail S.A.', '', '', '', '2024-12-19', '2025-06-18', '', '', '', '', '', '', 'active', 0, 1, '2024-12-20 10:11:00', 0, NULL),
(603, '24/00603', 'ms-a-c-agrawal', 'indore', '2', '', '11516010', 'Ms A C Agrawal', 'Sehore Retail S.A.', '', '', '', '2024-12-14', '2025-06-13', '', '', '', '', '', '', 'active', 0, 1, '2024-12-16 06:30:46', 0, NULL),
(604, '24/00604', 'sauhard-petroleum-malikhedi', 'indore', '2', '', '11577800', 'Sauhard Petroleum Malikhedi', 'Sehore Retail S.A.', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-12 01:59:12', 0, NULL),
(605, '24/00605', 'kesar-petroleum-jethdajod', 'indore', '2', '', '12225900', 'Kesar Petroleum Jethdajod', 'Sehore Retail S.A.', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-12 02:00:00', 0, NULL),
(606, '24/00606', 'anand-filling-centre-shajapur', 'indore', '2', '', '12513220', 'Anand Filling Centre, Shajapur', 'Sehore Retail S.A.', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-12 02:00:38', 0, NULL),
(607, '24/00607', 'aarambh-filling-station', 'indore', '2', '', '12580170', 'Aarambh Filling Station', 'Sehore Retail S.A.', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-12 02:01:11', 0, NULL),
(608, '24/00608', 'national-filling-station', 'indore', '2', '', '12563080', 'National Filling Station', 'Sehore Retail S.A.', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-12 02:01:53', 0, NULL),
(609, '24/00609', 'raj-freight', 'indore', '2', '', '11579200', 'Raj Freight', 'Sehore Retail S.A.', '', '', '', '2024-12-15', '2025-06-14', '', '', '', '', '', '', 'active', 0, 1, '2024-12-16 05:13:01', 0, NULL),
(610, '24/00610', 'marwadi-filling-station', 'indore', '2', '', '12686700', 'Marwadi Filling Station', 'Sehore Retail S.A.', '', '', '', '2024-12-18', '2025-06-17', '', '', '', '', '', '', 'active', 0, 1, '2024-12-19 11:10:35', 0, NULL),
(611, '24/00611', 'blue-star', 'chennai', '9', '', '', 'BLUE STAR', 'OOTY', '', '', '', '2024-12-11', '2025-06-10', '', '', '', '', '', '', 'active', 0, 40, '2024-12-12 10:11:05', 0, NULL),
(612, '24/00612', 'patel-petroleum', 'indore', '2', '', '12587330', 'Patel Petroleum', 'Sehore Retail S.A.', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 61, '2024-12-12 05:32:25', 0, NULL),
(613, '24/00613', 'anmol-filling-station', 'indore', '2', '', '12519450', 'ANMOL FILLING STATION', 'Bhopal Retail S.A.', '', '', '', '2024-12-12', '2025-06-11', '', '', '', '', '', '', 'active', 0, 61, '2024-12-12 11:46:32', 0, NULL),
(614, '24/00614', 'bhagyashree-petroleum', 'indore', '2', '', '', 'Bhagyashree Petroleum', 'BHOPAL', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 61, '2024-12-12 06:42:13', 0, NULL),
(615, '24/00615', 'fateh-guru-govind-singh-fuels', 'indore', '2', '', '', 'Fateh Guru Govind Singh Fuels', 'BHOPAL', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 61, '2024-12-12 06:48:33', 0, NULL),
(616, '24/00616', 'seth-tulsiram-rameshwar', 'indore', '2', '', '', 'Seth Tulsiram Rameshwar', 'BHOPAL', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 61, '2024-12-12 06:56:25', 0, NULL),
(617, '24/00617', 'sri-venkatesh-agencies', 'chennai', '8', '', '', 'SRI VENKATESH AGENCIES ', 'CHERANMAHADEVI ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-13 05:14:20', 0, NULL),
(618, '24/00618', 'pandiyan-automobiles-ltd', 'chennai', '8', '', '', 'PANDIYAN AUTOMOBILES LTD ', 'PALAYAMKOTTAI ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-13 05:16:50', 0, NULL),
(619, '24/00619', 'jay-lakshmi-energy', 'chennai', '8', '', '', 'JAY LAKSHMI ENERGY ', 'TIRUNELVELI', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-13 05:33:36', 0, NULL),
(620, '24/00620', 'mks-agencies', 'chennai', '8', '', '', 'EDATHUVA FUELS ', 'CHATRAM ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-13 12:07:25', 40, '2024-12-13 12:07:25'),
(621, '24/00621', 'noreen-enterprises', 'chennai', '7', '', '', 'NOREEN ENTERPRISES', 'ADUTHURAI', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-13 05:44:03', 0, NULL),
(622, '24/00622', 'shankar-agency', 'chennai', '7', '', '', 'MKS AGENCIES ', 'THANJAVUR ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-13 12:24:48', 40, '2024-12-13 12:24:48'),
(623, '24/00623', 'jayaganesan', 'chennai', '7', '', '', 'JAYAGANESAN', 'THANJAVUR', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-13 05:54:49', 0, NULL),
(624, '24/00624', 'karunya-agencies-adhoc', 'chennai', '7', '', '', 'KARUNYA AGENCIES ADHOC ', 'THANJAVUR', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-13 05:57:39', 0, NULL),
(625, '24/00625', 'sri-balavinayagar-agencies', 'chennai', '7', '', '', 'SRI BALAVINAYAGAR AGENCIES ', 'THANJAVUR', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-13 05:59:08', 0, NULL),
(626, '24/00626', 'adhoc-mahima-filling-station', 'indore', '2', '', '12686960', 'ADHOC MAHIMA FILLING STATION', 'Sehore Retail S.A.', '', '', '', '2024-12-04', '2025-06-03', '', '', '', '', '', '', 'active', 0, 61, '2024-12-13 11:51:50', 0, NULL),
(627, '24/00627', 'shiv-shakti-filling-center', 'indore', '2', '', '12556310 ', 'SHIV SHAKTI FILLING CENTER', 'Sehore Retail S.A.', '', '', '', '2024-12-04', '2025-06-03', '', '', '', '', '', '', 'active', 0, 61, '2024-12-13 11:59:53', 0, NULL),
(628, '24/00628', 'abhimanyu-filling-station', 'indore', '2', '', '12548950', 'ABHIMANYU FILLING STATION', 'Sehore Retail S.A.', '', '', '', '2024-12-04', '2025-06-03', '', '', '', '', '', '', 'active', 0, 61, '2024-12-13 12:04:44', 0, NULL),
(629, '24/00629', 'annapurna-petrol-pump', 'indore', '2', '', '12123200', 'ANNAPURNA PETROL PUMP', 'Sehore', '', '', '', '2024-12-04', '2025-06-03', '', '', '', '', '', '', 'active', 0, 61, '2024-12-13 12:13:56', 0, NULL),
(630, '24/00630', 'mahima-filling-station', 'indore', '2', '', '12686950', 'MAHIMA FILLING STATION', 'Sehore Retail S.A.', '', '', '', '2024-12-05', '2025-06-04', '', '', '', '', '', '', 'active', 0, 61, '2024-12-13 12:18:07', 0, NULL),
(631, '24/00631', 'shri-balaji-fuels', 'indore', '2', '', '41032639', 'SHRI BALAJI FUELS', 'Sehore Retail S.A.', '', '', '', '2024-12-05', '2025-06-04', '', '', '', '', '', '', 'active', 0, 61, '2024-12-13 12:21:02', 0, NULL),
(632, '24/00632', 'ishan-filling-station', 'indore', '2', '', '12553470', 'Ishan filling station', 'Sehore Retail S.A.', '', '', '', '2024-12-05', '2025-06-04', '', '', '', '', '', '', 'active', 0, 61, '2024-12-13 12:28:06', 0, NULL),
(633, '24/00633', 'santhi-agency', 'chennai', '7', '', '', 'SANTHI AGENCY ', 'THANJAVUR', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-13 06:59:05', 0, NULL),
(634, '24/00634', 'shivani-filling-station', 'indore', '2', '', '12523230', 'SHIVANI FILLING STATION', 'Sehore Retail S.A', '', '', '', '2024-12-06', '2025-06-05', '', '', '', '', '', '', 'active', 0, 61, '2024-12-14 10:03:49', 0, NULL),
(635, '24/00635', 'vishal-ser-station', 'indore', '2', '', '11503110', ' VISHAL SER STATION', 'Sehore Retail S.A', '', '', '', '2024-12-06', '2025-06-05', '', '', '', '', '', '', 'active', 0, 61, '2024-12-14 10:09:39', 0, NULL),
(636, '24/00636', 'new-kasturi-fuel-centre', 'indore', '2', '', '12580950', 'NEW KASTURI FUEL CENTRE', 'Sehore Retail S.A', '', '', '', '2024-12-06', '2025-06-05', '', '', '', '', '', '', 'active', 0, 61, '2024-12-14 10:13:20', 0, NULL),
(637, '24/00637', 'radha-krishna-filling-station', 'indore', '2', '', '', 'RADHA & KRISHNA FILLING STATION', 'BHOPAL', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 61, '2024-12-14 04:47:37', 0, NULL),
(638, '24/00638', 'sugan-swarnima-patel-filling-station', 'indore', '2', '', '12572790', 'SUGAN SWARNIMA PATEL FILLING STATION', 'Sehore Retail S.A', '', '', '', '2024-12-06', '2025-06-05', '', '', '', '', '', '', 'active', 0, 61, '2024-12-14 10:23:07', 0, NULL),
(639, '24/00639', 'kasturi-fuel-centre', 'indore', '2', '', '12272900', 'KASTURI FUEL CENTRE', 'Sehore Retail S.A', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 61, '2024-12-14 04:55:35', 0, NULL),
(640, '24/00640', 'best-fuels', 'chennai', '7', '', '', 'BEST FUELS ', 'THANJAVUR ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-14 05:07:08', 0, NULL),
(641, '24/00641', 'sp-petroleum', 'chennai', '7', '', '', 'SP PETROLEUM', 'PATTUKOTTAI ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-14 05:08:50', 0, NULL),
(642, '24/00642', 'rajham-veerappa-enterprises', 'chennai', '7', '', '', 'RAJHAM VEERAPPA ENTERPRISES', 'PERAVURANI', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-14 05:11:46', 0, NULL),
(643, '24/00643', 'sree-chaturbhuj-dharamvati-petro', 'indore', '2', '', '12562170', 'SREE CHATURBHUJ DHARAMVATI PETRO', 'Sehore Retail S.A', '', '', '', '2024-12-07', '2025-06-06', '', '', '', '', '', '', 'active', 0, 61, '2024-12-14 10:57:42', 0, NULL),
(644, '24/00644', 'shri-nana-kawadi-filling-station', 'indore', '2', '', '12572780', 'SHRI NANA KAWADI FILLING STATION', 'Sehore Retail S.A', '', '', '', '2024-12-07', '2025-06-06', '', '', '', '', '', '', 'active', 0, 61, '2024-12-14 11:03:17', 0, NULL),
(645, '24/00645', 'madhav-petroleum', 'indore', '2', '', '12580860', 'MADHAV PETROLEUM', 'VIDISHA', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 61, '2024-12-14 05:37:31', 0, NULL),
(646, '24/00646', 'mukati-petrol-pump-asta', 'indore', '2', '', '12271700', 'Mukati Petrol Pump Asta', 'Sehore Retail S.A', '', '', '', '2024-12-07', '2025-06-06', '', '', '', '', '', '', 'active', 0, 61, '2024-12-14 11:21:02', 0, NULL),
(647, '24/00647', 's-k-fuel-station', 'indore', '2', '', '12516650', 'S K FUEL STATION', 'Sehore Retail S.A', '', '', '', '2024-12-08', '2025-06-07', '', '', '', '', '', '', 'active', 0, 61, '2024-12-14 11:27:42', 0, NULL),
(648, '24/00648', 'maa-ganga-petrol-pump', 'indore', '2', '', '12572720', 'MAA GANGA PETROL PUMP', 'Sehore Retail S.A', '', '', '', '2024-12-08', '2025-06-07', '', '', '', '', '', '', 'active', 0, 61, '2024-12-14 11:30:50', 0, NULL),
(649, '24/00649', 'jagrati-fuel-station', 'indore', '2', '', '12588300', 'JAGRATI FUEL STATION', 'Sehore Retail S.A', '', '', '', '2024-12-08', '2025-06-07', '', '', '', '', '', '', 'active', 0, 61, '2024-12-14 11:34:05', 0, NULL),
(650, '24/00650', 'pradhan-petroleum', 'indore', '2', '', '12555580', 'PRADHAN PETROLEUM', 'Sehore Retail S.A', '', '', '', '2024-12-09', '2025-06-08', '', '', '', '', '', '', 'active', 0, 61, '2024-12-14 11:37:36', 0, NULL),
(651, '24/00651', 'akant-automobiles', 'indore', '2', '', '11576140', 'AKANT AUTOMOBILES', 'VIDISHA', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 61, '2024-12-14 06:14:04', 0, NULL),
(652, '24/00652', 'shree-govind-energy', 'indore', '2', '', '12881940', 'Shree Govind Energy', 'Bhopal Retail S.A.', '', '', '', '2024-12-13', '2025-06-12', '', '', '', '', '', '', 'active', 0, 61, '2024-12-14 12:15:30', 0, NULL),
(653, '24/00653', 'balaji-fuels', 'indore', '2', '', '12543170', 'BALAJI FUELS', 'Sehore Retail S.A', '', '', '', '2024-12-13', '2025-06-12', '', '', '', '', '', '', 'active', 0, 61, '2024-12-14 12:29:22', 0, NULL),
(654, '24/00654', 'jai-mada-di-petrol-pump', 'indore', '2', '', '12271600', 'JAI MADA DI PETROL PUMP', 'Sehore Retail S.A.', '', '', '', '2024-12-15', '2025-06-14', '', '', '', '', '', '', 'active', 0, 1, '2024-12-16 06:19:39', 0, NULL),
(655, '24/00655', 'madhuram-sales', 'indore', '2', '', '12524320', 'MADHURAM SALES', 'Sehore Retail S.A.', '', '', '', '2024-12-14', '2025-06-13', '', '', '', '', '', '', 'active', 0, 1, '2024-12-16 06:41:12', 0, NULL),
(656, '24/00656', 'shaj-fuels', 'chennai', '8', '', '', 'SHAJ FUELS ', 'PATHAMADAI', '', '', '', '2024-12-17', '2025-06-16', '', '', '', '', '', '', 'active', 0, 40, '2024-12-18 09:44:07', 0, NULL),
(657, '24/00657', 'mpvr-petroleum', 'chennai', '7', '', '', 'MPVR PETROLEUM ', 'THANJAVUR ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-17 07:20:09', 0, NULL),
(658, '24/00658', 'george-fuels', 'chennai', '7', '', '', 'GEORGE FUELS ', 'TRICHY', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-17 07:21:32', 0, NULL),
(659, '24/00659', 'sri-swetha-agencies', 'chennai', '7', '', '', 'SRI SWETHA AGENCIES ', 'THANJAVUR', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-17 07:23:34', 0, NULL),
(660, '24/00660', 'delta-fuels', 'chennai', '7', '', '', 'DELTA FUELS ', 'THANJAVUR', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-17 07:25:08', 0, NULL),
(661, '24/00661', 'br-agencies', 'chennai', '7', '', '', 'BR AGENCIES ', 'THANJAVUR', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-17 07:26:16', 0, NULL),
(662, '24/00662', 'ebeneezer-fuels', 'chennai', '7', '', '', 'EBENEEZER FUELS ', 'THANJAVUR ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-17 07:34:54', 0, NULL),
(663, '24/00663', 'shree-hari-petroleum', 'indore', '2', '', '41071234', 'Shree Hari Petroleum', 'Bhopal Retail S.A.', '', '', '', '2024-12-17', '2025-06-16', '', '', '', '', '', '', 'active', 0, 1, '2024-12-19 12:17:32', 0, NULL),
(664, '24/00664', 'cklunt', 'chennai', '9', '', '', 'CKLUNT', 'THIRUMALAYAMPALAYAM', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-19 07:15:36', 0, NULL),
(665, '24/00665', 'sri-meenakshi-chidambaram', 'chennai', '7', '', '', 'SRI MEENAKSHI CHIDAMBARAM ', 'PERAMBALUR', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-19 07:18:12', 0, NULL),
(666, '24/00666', 'mk-veerasamy-agencies-adhoc', 'chennai', '7', '', '', 'MK VEERASAMY AGENCIES ADHOC ', 'THANJAVUR ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-19 07:21:26', 0, NULL),
(667, '24/00667', 'maharaja-agency', 'chennai', '8', '', '', 'MAHARAJA AGENCY ', 'PETTAI ', '', '', '', '2024-12-19', '2025-06-18', '', '', '', '', '', '', 'active', 0, 40, '2024-12-20 12:03:22', 0, NULL),
(668, '24/00668', 'arasan-co', 'chennai', '8', '', '', 'ARASAN & CO ', 'MADURAI ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-19 07:32:18', 0, NULL),
(669, '24/00669', 'shivdeep-petroleum', 'indore', '2', '', '', 'SHIVDEEP PETROLEUM', 'BHOPAL', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-19 23:53:20', 0, NULL),
(670, '24/00670', 'saluja-sale-service', 'indore', '2', '', '', 'SALUJA SALE & SERVICE', 'BHOPAL', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 1, '2024-12-19 23:58:55', 0, NULL),
(671, '24/00671', 'adhoc-motilal-fuel-station', 'indore', '2', '', '41073073', 'Adhoc Motilal Fuel Station', 'Sehore Retail S.A.', '', '', '', '2024-12-17', '2025-06-16', '', '', '', '', '', '', 'active', 0, 61, '2024-12-20 06:07:09', 0, NULL),
(672, '24/00672', 'deep-service-station', 'indore', '2', '', '', 'DEEP SERVICE STATION', 'BHOPAL', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 61, '2024-12-20 01:03:30', 0, NULL),
(673, '24/00673', 'guru-filling-station', 'indore', '2', '', '', 'GURU FILLING STATION', 'BHOPAL', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 61, '2024-12-20 01:11:51', 0, NULL),
(674, '24/00674', 'rudrani-filling-station', 'indore', '2', '', '12566120', 'RUDRANI FILLING STATION', 'BHOPAL', '', '', '', '2024-12-19', '2025-06-18', '', '', '', '', '', '', 'active', 0, 61, '2024-12-20 07:56:58', 0, NULL),
(675, '24/00675', 'samarth-hariom-fuel-station', 'indore', '2', '', '12881930', 'SAMARTH HARIOM FUEL STATION', 'BHOPAL', '', '', '', '2024-12-19', '2025-06-18', '', '', '', '', '', '', 'active', 0, 61, '2024-12-20 08:12:35', 61, '2024-12-20 08:09:33'),
(676, '24/00676', 'adhoc-shrinathji-fuels', 'indore', '2', '', '41068510', 'ADHOC SHRINATHJI FUELS', 'Sehore Retail S.A.', '', '', '', '2024-12-19', '2025-06-18', '', '', '', '', '', '', 'active', 0, 61, '2024-12-20 11:15:12', 0, NULL),
(677, '24/00677', 'aiswarya-fuels', 'chennai', '8', '', '', 'AISWARYA FUELS ', 'PUDUKULAM', '', '', '', '2024-12-20', '2025-06-19', '', '', '', '', '', '', 'active', 0, 40, '2024-12-20 12:09:43', 0, NULL),
(678, '24/00678', 'hayagriva-agency', 'chennai', '8', '', '', 'HAYAGRIVA AGENCY ', 'KEELAKALLUR', '', '', '', '2024-12-20', '2025-06-19', '', '', '', '', '', '', 'active', 0, 40, '2024-12-20 12:10:23', 0, NULL),
(679, '24/00679', 'pandian-agencies', 'chennai', '7', '', '', 'PANDIAN AGENCIES ', 'THANJAVUR', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-20 06:45:22', 0, NULL),
(680, '24/00680', 'sathya-dharma-agencies', 'chennai', '7', '', '', 'SATHYA DHARMA AGENCIES ', 'THIRUKATTUPALLI', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-20 06:47:03', 0, NULL),
(681, '24/00681', 'vv-sons-agencies', 'chennai', '7', '', '', 'VV & SONS AGENCIES ', 'THANJAVUR', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-20 06:48:12', 0, NULL),
(682, '24/00682', 'sri-ramajayam-agencies-adhoc', 'chennai', '7', '', '', 'SRI RAMAJAYAM AGENCIES ADHOC ', 'TRICHY ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-20 06:50:19', 0, NULL),
(683, '24/00683', 'sri-rangaa-agencies', 'chennai', '7', '', '', 'SRI RANGAA AGENCIES ', 'AYYAMPETTAI', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-20 06:51:35', 0, NULL),
(684, '24/00684', 'sri-ramajayam-agencies', 'chennai', '7', '', '', 'SRI RAMAJAYAM AGENCIES', 'THANJAVUR ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-20 06:52:54', 0, NULL),
(685, '24/00685', 'pk-petroleum-agencies', 'chennai', '7', '', '', 'PK PETROLEUM AGENCIES ', 'THANJAVUR', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-21 06:24:30', 0, NULL),
(686, '24/00686', 'wahab-petol-bunk-adhoc', 'chennai', '7', '', '', 'WAHAB PETOL BUNK ADHOC ', 'TRICHY', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-21 06:28:02', 0, NULL),
(687, '24/00687', 'rajkamalagencies', 'chennai', '9', '', '', 'RAJKAMALAGENCIES ', 'COIMBATORE', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-23 06:00:18', 0, NULL),
(688, '24/00688', 'akm-agency', 'chennai', '7', '', '', 'AKM AGENCY ', 'THANJAVUR ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-23 06:23:10', 0, NULL),
(689, '24/00689', 'yasotha-agencies', 'chennai', '7', '', '', 'YASOTHA AGENCIES ', 'THANJAVUR', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-23 07:28:57', 0, NULL),
(690, '24/00690', 'sehore-service-centre', 'indore', '2', '', '11652010', 'SEHORE SERVICE CENTRE', 'Sehore Retail S.A.', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 61, '2024-12-24 04:48:27', 0, NULL),
(691, '24/00691', 'pradeep-filling-station', 'indore', '2', '', '', 'PRADEEP FILLING STATION', 'BHOPAL', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 61, '2024-12-24 05:25:20', 0, NULL),
(692, '24/00692', 'rachna-sales-and-service', 'indore', '2', '', '12271300', 'RACHNA SALES AND SERVICE', 'BHOPAL', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 61, '2024-12-24 06:07:13', 0, NULL),
(693, '24/00693', 'r-k-petroleum', 'indore', '2', '', '12781830', 'R K PETROLEUM', 'VIDISHA', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 61, '2024-12-26 05:16:33', 0, NULL),
(694, '24/00694', 'shiv-nandini-petroleum', 'indore', '2', '', '', 'SHIV NANDINI PETROLEUM', 'Bhopal ', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 61, '2024-12-26 05:34:33', 0, NULL),
(695, '24/00695', 'solanki-petroleum', 'indore', '2', '', '12580880', 'SOLANKI PETROLEUM', 'VIDISHA', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 61, '2024-12-26 05:59:37', 0, NULL),
(696, '24/00696', 'shree-siddheshwari-sales', 'indore', '2', '', '', 'SHREE SIDDHESHWARI SALES', 'VIDISHA', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 61, '2024-12-26 06:08:30', 0, NULL);
INSERT INTO `outlet` (`id`, `sno`, `token`, `zone`, `branch`, `outlet_type`, `customer_id`, `outlet_name`, `outlet_location`, `contact_name`, `contact_number`, `earthing_chamber`, `checking_date`, `renewal_date`, `cvt`, `stabilizer`, `stp`, `yard_pole`, `canopy_light`, `pump`, `status`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(697, '24/00697', 'vijaypal-sales-and-service', 'indore', '2', '', '12553490', 'VIJAYPAL SALES and SERVICE', 'Bhopal ', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 61, '2024-12-26 06:42:58', 0, NULL),
(698, '24/00698', 'krishak-diesel-centre', 'indore', '2', '', '11304610', 'KRISHAK DIESEL CENTRE', 'V', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 61, '2024-12-26 06:49:43', 0, NULL),
(699, '24/00699', 'shri-ji-kisan-seva-kendra', 'indore', '2', '', '12533850', 'SHRI JI KISAN SEVA KENDRA', 'VIDISHA', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 61, '2024-12-26 06:59:47', 0, NULL),
(700, '24/00700', 'basant-sales-and-service', 'indore', '2', '', '12536360', 'BASANT SALES and SERVICE', 'HOSHANGABAD', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 61, '2024-12-26 07:16:10', 0, NULL),
(701, '24/00701', 'keerti-fuel-zone', 'indore', '1', '', '', 'KEERTI FUEL ZONE', 'KHANDWA', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 61, '2024-12-27 00:23:48', 0, NULL),
(702, '24/00702', 'muvel-filling-station', 'indore', '1', '', '41072628', 'Muvel Filling Station', 'Dhar Retail S.A', '', '', '', '2024-12-18', '2025-06-17', '', '', '', '', '', '', 'active', 0, 61, '2024-12-27 06:56:39', 0, NULL),
(703, '24/00703', 'sankalp-fuel-station', 'indore', '1', '', '12527530', 'Sankalp Fuel Station', 'Dhar Retail S.A', '', '', '', '2024-12-17', '2025-06-16', '', '', '', '', '', '', 'active', 0, 61, '2024-12-27 07:24:03', 0, NULL),
(704, '24/00704', 'solanki-fuel-station', 'indore', '1', '', '41069247', 'SOLANKI FUEL STATION', 'Dhar Retail S.A', '', '', '', '2024-12-14', '2025-06-13', '', '', '', '', '', '', 'active', 0, 61, '2024-12-27 10:20:02', 0, NULL),
(705, '24/00705', 'jai-jitendra-petro-service', 'indore', '1', '', '12608540', 'Jai Jitendra Petro Service', 'Indore West Retail S.A', '', '', '', '2024-12-02', '2025-06-01', '', '', '', '', '', '', 'active', 0, 61, '2024-12-27 12:39:19', 0, NULL),
(706, '24/00706', 'adhoc-vanshika-fuel-filling-centre', 'indore', '2', '', '', 'ADHOC VANSHIKA FUEL FILLING CENTRE', 'HOSHANGABAD', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 61, '2024-12-28 00:36:19', 0, NULL),
(707, '24/00707', 'hp-auto-center-p-t-chouraha', 'indore', '2', '', '12686710', 'HP AUTO CENTER P & T CHOURAHA', 'Bhopal ', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 61, '2024-12-28 01:17:43', 0, NULL),
(708, '24/00708', 'new-pachouri-filling-station', 'indore', '2', '', '', 'NEW PACHOURI FILLING STATION', 'Bhopal ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 61, '2024-12-28 01:27:26', 0, NULL),
(709, '24/00709', 'new-star-diesel-works', 'indore', '2', '', '11531120', 'NEW STAR DIESEL WORKS', 'VIDISHA', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 61, '2024-12-28 01:30:03', 0, NULL),
(710, '24/00710', 'patidar-next-gen-energy', 'indore', '2', '', '', 'Patidar Next Gen Energy', 'Bhopal ', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 61, '2024-12-28 01:41:17', 0, NULL),
(711, '24/00711', 'margery-fuels', 'chennai', '8', '', '', 'MARGERY FUELS', 'TIRUNELVELI', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-28 08:18:50', 0, NULL),
(712, '24/00712', 'shri-pabanasa-perunal-agency', 'chennai', '8', '', '', 'SHRI PABANASA PERUNAL AGENCY ', 'THIRUVIRUTHANPULLEY ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-28 08:22:09', 0, NULL),
(713, '24/00713', 'lakshmi-priya-agencies', 'chennai', '8', '', '', 'LAKSHMI PRIYA AGENCIES ', 'RADHAPURAM ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-28 08:23:11', 0, NULL),
(714, '24/00714', 'sea-top-petroleum', 'chennai', '8', '', '', 'SEA TOP PETROLEUM ', 'KEELAMANAKUDY', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-12-28 08:24:03', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `party_payment`
--

CREATE TABLE `party_payment` (
  `id` int NOT NULL,
  `sno` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `company_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `party_id` int NOT NULL,
  `party_name` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `purchase_zone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `purchase_date` date NOT NULL,
  `validityend_date` date DEFAULT NULL,
  `purchase_number` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `purchase_bill` text COLLATE utf8mb4_general_ci NOT NULL,
  `purchase_amount` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `delete_status` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `party_payment`
--

INSERT INTO `party_payment` (`id`, `sno`, `company_name`, `party_id`, `party_name`, `purchase_zone`, `purchase_date`, `validityend_date`, `purchase_number`, `purchase_bill`, `purchase_amount`, `status`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '24/00001', 'ggcc', 19, 'JK ELECTRICAL', 'indore', '2024-11-30', '2025-01-14', 'JKEE/24-25/053', '', '155760', 'paid', 0, 1, '2024-12-01 08:25:46', 1, '2024-12-01 13:57:26'),
(2, '24/00002', 'bright', 21, 'HARIOM HARDWARE', 'mumbai', '2024-12-03', '2024-12-03', 'HW/0725/24-25', '', '3337', 'paid', 0, 1, '2024-12-03 04:30:20', 1, '2024-12-03 10:05:05'),
(3, '24/00003', 'bright', 23, 'NILESH PETRO TECH SOLUTIONS', 'mumbai', '2024-12-05', '2025-01-20', '106', '', '36400', 'paid', 0, 1, '2024-12-05 02:27:50', 1, '2024-12-10 15:30:35'),
(4, '24/00004', 'bright', 24, 'JYOTI TRADING CO', 'mumbai', '2024-11-18', '2025-01-02', '1288', '', '1398', 'unpaid', 0, 1, '2024-12-05 02:30:28', 0, '0000-00-00 00:00:00'),
(5, '24/00005', 'ggcc', 25, 'VALISON & COMPANY', 'mumbai', '2024-11-16', '2024-12-31', '1211463', '', '51029', 'paid', 0, 1, '2024-12-06 04:10:20', 1, '2024-12-20 07:43:39'),
(6, '24/00006', 'ggcc', 26, 'FUSION ELECTRICALS', 'indore', '2024-12-07', '2025-01-22', '955', '', '3140', 'paid', 0, 1, '2024-12-07 02:30:11', 1, '2024-12-07 08:00:35'),
(7, '24/00007', 'ggcc', 2, 'RENUKA Electric & Trading Co', 'mumbai', '2024-12-07', '2025-01-22', 'RE-002273/24-25', '', '9261', 'unpaid', 1, 1, '2024-12-07 02:49:18', 0, '0000-00-00 00:00:00'),
(8, '24/00008', 'ggcc', 2, 'RENUKA Electric & Trading Co', 'mumbai', '2024-12-07', '2025-01-22', 'RE-002373/24-25', '', '9261', 'unpaid', 0, 1, '2024-12-07 02:52:39', 0, '0000-00-00 00:00:00'),
(9, '24/00009', 'bright', 27, 'HEET ELECTRICALS TRADING', 'mumbai', '2024-12-07', '2025-01-22', '6767', '', '2753', 'paid', 0, 1, '2024-12-07 03:47:36', 1, '2024-12-07 09:18:50'),
(10, '24/00010', 'bright', 27, 'HEET ELECTRICALS TRADING', 'mumbai', '2024-12-09', '2025-01-24', '6772', './uploads/purchase_bill/sales_6772_2024-25(1)241209072824.pdf', '4248', 'unpaid', 0, 1, '2024-12-09 01:58:24', 0, '0000-00-00 00:00:00'),
(11, '24/00011', 'ggcc', 28, 'RUCHI PAINTS', 'mumbai', '2024-12-10', '2025-01-25', '65', '', '10530', 'paid', 0, 1, '2024-12-10 09:59:09', 1, '2024-12-10 15:29:27'),
(12, '24/00012', 'bright', 29, 'TROPEX ELECTRONICS', 'indore', '2024-12-02', '2025-01-17', '395', '', '113280', 'unpaid', 0, 1, '2024-12-10 10:04:13', 0, '0000-00-00 00:00:00'),
(13, '24/00013', 'bright', 29, 'TROPEX ELECTRONICS', 'indore', '2024-12-10', '2025-01-25', '409', '', '103840', 'unpaid', 0, 1, '2024-12-10 10:05:08', 0, '0000-00-00 00:00:00'),
(14, '24/00014', 'bright', 30, 'MAHALAXMI TRADERS', 'mumbai', '2024-12-09', '2025-01-24', '13218', '', '13924', 'paid', 0, 1, '2024-12-10 10:07:43', 1, '2024-12-10 15:38:44'),
(15, '24/00015', 'bright', 1, 'RENUKA Electric & Trading Co', 'mumbai', '2024-12-12', '2025-01-27', '2322', '', '2634', 'unpaid', 0, 1, '2024-12-12 08:52:40', 0, '0000-00-00 00:00:00'),
(16, '24/00016', 'bright', 31, 'CAR SHRINGAR', 'mumbai', '2024-12-12', '2025-01-27', '3281', '', '40100', 'paid', 0, 1, '2024-12-12 09:01:33', 1, '2024-12-19 15:22:14'),
(17, '24/00017', 'bright', 32, 'HARIPRIYA INDUSTRIAL AND TRADING CO', 'mumbai', '2024-12-18', '2025-02-02', '2325', '', '24485', 'unpaid', 0, 1, '2024-12-19 09:57:13', 0, '0000-00-00 00:00:00'),
(18, '24/00018', 'ggcc', 33, 'AJIT POWER SOLUTION PVT LTD', 'indore', '2024-12-17', '2025-02-01', '5339', '', '88638', 'unpaid', 0, 1, '2024-12-19 10:00:07', 0, '0000-00-00 00:00:00'),
(19, '24/00019', 'ggcc', 34, 'RAMESH EARTHING CORPORATION', 'mumbai', '2024-11-29', '2025-01-13', '2660', '', '5960', 'unpaid', 0, 1, '2024-12-19 10:06:21', 0, '0000-00-00 00:00:00'),
(20, '24/00020', 'ggcc', 2, 'RENUKA Electric & Trading Co', 'mumbai', '2024-11-27', '2025-01-11', '2185', '', '4850', 'unpaid', 0, 1, '2024-12-19 10:08:56', 0, '0000-00-00 00:00:00'),
(21, '24/00021', 'bright', 35, 'PARAMOUNT CORPORATION', 'mumbai', '2024-11-09', '2024-12-24', '1899', '', '5310', 'unpaid', 0, 1, '2024-12-19 10:17:28', 0, '0000-00-00 00:00:00'),
(22, '24/00022', 'bright', 35, 'PARAMOUNT CORPORATION', 'mumbai', '2024-11-09', '2024-12-24', '1900', '', '6490', 'unpaid', 0, 1, '2024-12-19 10:17:55', 0, '0000-00-00 00:00:00'),
(23, '24/00023', 'bright', 35, 'PARAMOUNT CORPORATION', 'mumbai', '2024-11-11', '2024-12-26', '1913', '', '18048', 'unpaid', 0, 1, '2024-12-19 10:18:27', 0, '0000-00-00 00:00:00'),
(24, '24/00024', 'bright', 35, 'PARAMOUNT CORPORATION', 'mumbai', '2024-11-21', '2025-01-05', '1979', '', '18048', 'unpaid', 0, 1, '2024-12-19 10:18:56', 1, '2024-12-20 05:32:19'),
(25, '24/00025', 'bright', 35, 'PARAMOUNT CORPORATION', 'mumbai', '2024-11-22', '2025-01-06', '2010', '', '29240', 'unpaid', 0, 1, '2024-12-19 10:19:26', 0, '0000-00-00 00:00:00'),
(26, '24/00026', 'bright', 35, 'PARAMOUNT CORPORATION', 'mumbai', '2024-11-27', '2025-01-11', '2031', '', '14620', 'unpaid', 0, 1, '2024-12-19 10:20:09', 0, '0000-00-00 00:00:00'),
(27, '24/00027', 'bright', 35, 'PARAMOUNT CORPORATION', 'mumbai', '2024-11-27', '2025-01-11', '2032', '', '14620', 'unpaid', 0, 1, '2024-12-19 10:20:43', 0, '0000-00-00 00:00:00'),
(28, '24/00028', 'ggcc', 8, 'OM PIPE TRADERS', 'mumbai', '2024-12-20', '2025-02-04', '3719', '', '26996', 'paid', 0, 1, '2024-12-20 00:10:27', 1, '2024-12-20 05:40:46'),
(29, '24/00029', 'bright', 38, 'SAGAR ELECTRICAL', 'chennai', '2024-12-19', '2025-02-03', '21', '', '103840', 'paid', 0, 1, '2024-12-20 00:12:50', 1, '2024-12-20 05:44:51'),
(30, '24/00030', 'bright', 39, 'HASTI DIGITAL PRINTS', 'mumbai', '2024-12-18', '2025-02-02', '372', '', '57020', 'unpaid', 0, 1, '2024-12-20 00:17:13', 0, '0000-00-00 00:00:00'),
(31, '24/00031', 'bright', 39, 'HASTI DIGITAL PRINTS', 'mumbai', '2024-12-18', '2025-02-02', '371', '', '58740', 'unpaid', 0, 1, '2024-12-20 00:18:19', 0, '0000-00-00 00:00:00'),
(32, '24/00032', 'bright', 40, 'ROHIT TRADING CO', 'mumbai', '2024-12-06', '2025-01-21', '1953', '', '10632', 'unpaid', 0, 1, '2024-12-20 00:20:44', 0, '0000-00-00 00:00:00'),
(33, '24/00033', 'bright', 40, 'ROHIT TRADING CO', 'mumbai', '2024-11-16', '2024-12-31', '1824', '', '9947', 'unpaid', 0, 1, '2024-12-20 00:21:40', 0, '0000-00-00 00:00:00'),
(34, '24/00034', 'bright', 41, 'JAIN INTERNATIONAL', 'chennai', '2024-12-28', '2025-02-12', '13801', '', '19258', 'paid', 0, 1, '2024-12-28 05:37:47', 1, '2024-12-28 11:08:14'),
(35, '24/00035', 'bright', 42, 'SS POWER CONTROL', 'chennai', '2024-12-28', '2025-02-12', '113', '', '50150', 'unpaid', 0, 1, '2024-12-28 05:40:09', 0, '0000-00-00 00:00:00'),
(36, '24/00036', 'ggcc', 8, 'OM PIPE TRADERS', 'mumbai', '2024-12-28', '2025-02-12', '3835', '', '4996', 'paid', 0, 1, '2024-12-28 05:42:36', 1, '2024-12-28 11:12:53'),
(37, '24/00037', 'bright', 44, 'SHREE VINAYAK BATTERY INVR SALE AND SER', 'indore', '2024-12-27', '2025-02-11', 'A000633', '', '17664', 'paid', 0, 1, '2024-12-28 05:45:39', 1, '2024-12-28 11:15:59'),
(38, '24/00038', 'bright', 45, 'LAKSHMI SALES CORPORATION', 'chennai', '2024-12-28', '2025-02-12', '5062', '', '3717', 'paid', 0, 1, '2024-12-28 05:53:16', 1, '2024-12-28 11:24:06'),
(39, '24/00039', 'ggcc', 46, 'SAGAR ELECTRICAL', 'mumbai', '2024-12-23', '2025-02-07', '20', '', '218300', 'unpaid', 0, 1, '2024-12-28 05:57:18', 0, '0000-00-00 00:00:00'),
(40, '24/00040', 'ggcc', 46, 'SAGAR ELECTRICAL', 'mumbai', '2024-12-24', '2025-02-08', '22', '', '51920', 'unpaid', 0, 1, '2024-12-28 05:57:53', 0, '0000-00-00 00:00:00'),
(41, '24/00041', 'ggcc', 46, 'SAGAR ELECTRICAL', 'mumbai', '2024-12-24', '2025-02-08', '021', '', '51920', 'unpaid', 0, 1, '2024-12-28 05:59:15', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `party_payment_received`
--

CREATE TABLE `party_payment_received` (
  `id` int NOT NULL,
  `party_payment_id` int NOT NULL,
  `party_id` int NOT NULL,
  `payment_date` date NOT NULL,
  `payment_amount` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `payment_method` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `delete_status` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `party_payment_received`
--

INSERT INTO `party_payment_received` (`id`, `party_payment_id`, `party_id`, `payment_date`, `payment_amount`, `payment_method`, `status`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 1, 19, '2024-11-30', '100000', 'tmbl', 'paid', 0, 1, '2024-12-01 08:26:55', 0, '0000-00-00 00:00:00'),
(2, 1, 19, '2024-11-30', '55760', 'tmbl', 'paid', 0, 1, '2024-12-01 08:27:26', 0, '0000-00-00 00:00:00'),
(3, 2, 21, '2024-12-03', '3337', 'tmbl', 'paid', 1, 1, '2024-12-03 04:30:58', 0, '0000-00-00 00:00:00'),
(4, 2, 21, '2024-12-03', '1000', 'tmbl', 'paid', 1, 1, '2024-12-03 04:32:07', 0, '0000-00-00 00:00:00'),
(5, 2, 21, '2024-12-03', '2337', 'tmbl', 'paid', 1, 1, '2024-12-03 04:32:26', 0, '0000-00-00 00:00:00'),
(6, 2, 21, '2024-12-03', '1000', 'tmbl', 'paid', 1, 1, '2024-12-03 04:33:03', 0, '0000-00-00 00:00:00'),
(7, 2, 21, '2024-12-03', '1000', 'tmbl', 'paid', 0, 1, '2024-12-03 04:33:46', 0, '0000-00-00 00:00:00'),
(8, 2, 21, '2024-12-03', '2337', 'tmbl', 'paid', 0, 1, '2024-12-03 04:35:05', 0, '0000-00-00 00:00:00'),
(9, 6, 26, '2024-12-07', '3140', 'tmbl', 'paid', 0, 1, '2024-12-07 02:30:35', 0, '0000-00-00 00:00:00'),
(10, 7, 2, '2024-12-07', '1000', 'cash', 'paid', 0, 1, '2024-12-07 02:50:02', 0, '0000-00-00 00:00:00'),
(11, 9, 27, '2024-12-07', '2753', 'tmbl', 'paid', 0, 1, '2024-12-07 03:48:50', 0, '0000-00-00 00:00:00'),
(12, 11, 28, '2024-12-10', '10530', 'tmbl', 'paid', 0, 1, '2024-12-10 09:59:27', 0, '0000-00-00 00:00:00'),
(13, 3, 23, '2024-12-10', '36400', 'tmbl', 'paid', 0, 1, '2024-12-10 10:00:35', 0, '0000-00-00 00:00:00'),
(14, 14, 30, '2024-12-09', '13924', 'tmbl', 'paid', 0, 1, '2024-12-10 10:08:44', 0, '0000-00-00 00:00:00'),
(15, 16, 31, '2024-12-12', '40100', 'tmbl', 'paid', 0, 1, '2024-12-19 09:52:14', 0, '0000-00-00 00:00:00'),
(16, 28, 8, '2024-12-20', '26996', 'tmbl', 'paid', 0, 1, '2024-12-20 00:10:46', 0, '0000-00-00 00:00:00'),
(17, 29, 38, '2024-12-20', '50000', 'tmbl', 'paid', 0, 1, '2024-12-20 00:13:16', 0, '0000-00-00 00:00:00'),
(18, 29, 38, '2024-12-20', '53840', 'tmbl', 'paid', 0, 1, '2024-12-20 00:14:51', 0, '0000-00-00 00:00:00'),
(19, 5, 25, '2024-12-20', '51029', 'tmbl', 'paid', 0, 1, '2024-12-20 02:13:39', 0, '0000-00-00 00:00:00'),
(20, 34, 41, '2024-12-28', '19258', 'tmbl', 'paid', 0, 1, '2024-12-28 05:38:14', 0, '0000-00-00 00:00:00'),
(21, 36, 8, '2024-12-28', '4996', 'tmbl', 'paid', 0, 1, '2024-12-28 05:42:53', 0, '0000-00-00 00:00:00'),
(22, 37, 44, '2024-12-28', '17664', 'tmbl', 'paid', 0, 1, '2024-12-28 05:45:59', 0, '0000-00-00 00:00:00'),
(23, 38, 45, '2024-12-28', '3717', 'tmbl', 'paid', 0, 1, '2024-12-28 05:54:06', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id` int NOT NULL,
  `sno` varchar(50) NOT NULL,
  `branch_id` int NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `po_date` date NOT NULL,
  `validity_end` date NOT NULL,
  `purchase_order_no` varchar(100) NOT NULL,
  `po_title` varchar(100) NOT NULL,
  `po_amount` varchar(100) NOT NULL,
  `po_letter` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `security_amount` varchar(100) NOT NULL,
  `receipt_img` text,
  `dd_img` text,
  `gst_number` int DEFAULT NULL,
  `gst_percentage` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `vendor_code` int DEFAULT NULL,
  `pan_number` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hpcl_gst_number` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hpcl_address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` varchar(50) NOT NULL,
  `security_received_date` date DEFAULT NULL,
  `security_status` enum('notreceived','received') NOT NULL,
  `delete_status` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`id`, `sno`, `branch_id`, `company_name`, `po_date`, `validity_end`, `purchase_order_no`, `po_title`, `po_amount`, `po_letter`, `security_amount`, `receipt_img`, `dd_img`, `gst_number`, `gst_percentage`, `vendor_code`, `pan_number`, `hpcl_gst_number`, `hpcl_address`, `status`, `security_received_date`, `security_status`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '24/00001', 6, 'ggcc', '2024-11-27', '2024-11-27', '123', 'TEST', '10000000', '', '1000', '', '', 0, '', 0, '', '', '', 'ongoing', NULL, 'notreceived', 1, 1, '2024-11-26 07:43:06', 1, '2024-11-26 18:43:39'),
(2, '24/00002', 2, 'bright', '2023-08-26', '2025-08-26', '5300012137', 'INGRESS LIGHT POLES AND LED FOCUS', '5180715.73', '', '60000', '', '', 0, '', 0, '', '', '', 'ongoing', NULL, 'notreceived', 0, 1, '2024-11-28 21:06:47', 0, '0000-00-00 00:00:00'),
(3, '24/00003', 7, 'ggcc', '2024-05-10', '2025-05-10', '5300019888', 'ELECTRICAL M&R WORKS UNDER TRICHY RO', '2883050.76', './uploads/purchase_order_letter/5300019888electricalm&rworksundertrichyro241130102440.pdf', '33990', '', '', 0, '', 0, '', '', '', 'ongoing', NULL, 'notreceived', 1, 1, '2024-11-29 23:24:40', 1, '2024-11-30 10:31:12'),
(4, '24/00004', 3, 'ggcc', '2023-03-26', '2026-03-26', '5300018762', 'MS HSD CNG PANEL', '3000000', './uploads/purchase_order_letter/5300018762_mshsd_cng_panel_23.03.2024241210155544.pdf', '0', '', '', 0, '', 0, '', '', '', 'ongoing', NULL, 'notreceived', 0, 1, '2024-12-10 04:55:45', 0, '0000-00-00 00:00:00'),
(5, '24/00005', 3, 'ggcc', '2024-07-01', '2026-07-01', '5300021173', 'MR THANE SA', '3000000', './uploads/purchase_order_letter/5300021173_electrical_m_r_work_thane_a_sa__vc__george241210162450.pdf', '0', '', '', 0, '', 0, '', '', '', 'ongoing', NULL, 'notreceived', 0, 1, '2024-12-10 05:24:50', 0, '0000-00-00 00:00:00'),
(6, '24/00006', 7, 'ggcc', '2024-05-10', '2025-05-10', '5300019888', 'ELECTRICAL M&R WORKS UNDER TRICHY RO', '2883050.76', './uploads/purchase_order_letter/5300019888electricalm&rworksundertrichyro241219064549.pdf', '33990', '', '', 0, '', 0, '', '', '', 'ongoing', NULL, 'notreceived', 0, 1, '2024-12-18 19:45:49', 0, '0000-00-00 00:00:00'),
(7, '24/00007', 3, 'ggcc', '2024-06-12', '2026-06-11', '5300020519', 'ELECTRICAL M&R WORK VASHI SA', '6750000', './uploads/purchase_order_letter/5300020519_ELECTRICAL_M_R_WORK_VASHI_SA.pdf', '00', '', '', 0, '', 0, '', '', '', 'ongoing', NULL, 'notreceived', 0, 1, '2024-12-21 03:43:43', 1, '2024-12-21 09:46:54'),
(8, '24/00008', 7, 'bright', '2024-10-18', '2025-10-17', '5300012664', 'M&R ELECTRICAL TRICHY RRO', '4000000', '', '40000', '', '', 0, '', 0, '', '', '', 'ongoing', NULL, 'notreceived', 0, 3, '2024-12-23 01:19:22', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `retention_money`
--

CREATE TABLE `retention_money` (
  `id` int NOT NULL,
  `branch_id` int NOT NULL,
  `company_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `po_id` int NOT NULL,
  `estimation_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `retention_date` date NOT NULL,
  `taxinvoice_date` date NOT NULL,
  `received_date` date DEFAULT NULL,
  `received_amount` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `retention_amount` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `tds_amount` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `wct_amount` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `hold_amount` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bank_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `retention_img` text COLLATE utf8mb4_general_ci,
  `retention_received_date` date DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `delete_status` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `retention_money`
--

INSERT INTO `retention_money` (`id`, `branch_id`, `company_name`, `po_id`, `estimation_id`, `retention_date`, `taxinvoice_date`, `received_date`, `received_amount`, `retention_amount`, `tds_amount`, `wct_amount`, `hold_amount`, `bank_name`, `retention_img`, `retention_received_date`, `status`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 7, 'ggcc', 3, '1', '2025-11-03', '0000-00-00', '2024-11-04', '195058.72', '16530.40', '1654.00', '3308.00', '0', 'tmbl', '', '2024-11-30', 'received', 0, 1, '2024-11-30 04:56:56', 1, '2024-11-30 17:10:15'),
(2, 7, 'ggcc', 6, '2', '2025-11-03', '0000-00-00', '2024-11-04', '173566.32', '16530.40', '1654.00', '3308.00', '0', 'tmbl', '', NULL, 'notreceived', 0, 1, '2024-12-19 01:18:13', 0, '0000-00-00 00:00:00'),
(4, 3, 'ggcc', 7, '3', '2025-11-08', '0000-00-00', '2024-11-09', '38877.96', '3702.89', '371', '742', '0', 'tmbl', '', NULL, 'notreceived', 0, 1, '2024-12-21 04:30:21', 0, '0000-00-00 00:00:00'),
(5, 7, 'bright', 8, '4', '2025-11-03', '0000-00-00', '2024-11-04', '314956.17', '29995.94', '3000', '6000', '0', 'tmbl', '', NULL, 'notreceived', 0, 3, '2024-12-23 01:22:06', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `salary_increment`
--

CREATE TABLE `salary_increment` (
  `id` int NOT NULL,
  `date` date NOT NULL,
  `employee_id` int NOT NULL,
  `old_salary_amount` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `increment_amount` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `new_salary_amount` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `delete_status` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary_increment`
--

INSERT INTO `salary_increment` (`id`, `date`, `employee_id`, `old_salary_amount`, `increment_amount`, `new_salary_amount`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '2024-11-01', 40, '22000', '', '1000', 0, 1, '2024-12-12 09:10:37', 0, NULL),
(2, '2024-11-01', 45, '25000', '', '1000', 0, 1, '2024-12-12 09:10:59', 0, NULL),
(3, '2024-11-01', 59, '21000', '', '1000', 0, 1, '2024-12-12 09:11:39', 0, NULL),
(4, '2024-11-01', 39, '24000', '', '1000', 0, 1, '2024-12-12 09:12:32', 0, NULL),
(5, '2024-11-01', 18, '23000', '', '1000', 0, 1, '2024-12-12 09:13:02', 0, NULL),
(6, '2024-11-01', 19, '22000', '', '1000', 0, 1, '2024-12-12 09:13:25', 0, NULL),
(7, '2024-11-01', 56, '15000', '', '1000', 0, 1, '2024-12-12 09:14:40', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stock_report`
--

CREATE TABLE `stock_report` (
  `id` int NOT NULL,
  `sno` varchar(50) NOT NULL,
  `year` varchar(11) NOT NULL,
  `month` varchar(50) NOT NULL,
  `branch` int NOT NULL,
  `material_id` int NOT NULL,
  `material_count` varchar(50) NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock_report`
--

INSERT INTO `stock_report` (`id`, `sno`, `year`, `month`, `branch`, `material_id`, `material_count`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(2, '', '2024', 'december', 2, 1, '100', 1, '2024-12-05 02:11:17', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int NOT NULL,
  `sno` varchar(100) NOT NULL,
  `token` varchar(250) NOT NULL,
  `zone` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `vehicle_type` varchar(100) NOT NULL,
  `fuel_type` varchar(10) NOT NULL,
  `vehicle_name` varchar(250) NOT NULL,
  `owner_name` varchar(100) NOT NULL,
  `vehicle_number` varchar(100) NOT NULL,
  `vehicle_photo` text,
  `vehicle_rc` text,
  `vehicle_insurance` text,
  `renewal_date` date DEFAULT NULL,
  `fc_renewal_date` date DEFAULT NULL,
  `puc_renewal_date` date DEFAULT NULL,
  `vehicle_fc_img` text NOT NULL,
  `vehicle_puc_img` text NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `delete_status` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `sno`, `token`, `zone`, `branch`, `vehicle_type`, `fuel_type`, `vehicle_name`, `owner_name`, `vehicle_number`, `vehicle_photo`, `vehicle_rc`, `vehicle_insurance`, `renewal_date`, `fc_renewal_date`, `puc_renewal_date`, `vehicle_fc_img`, `vehicle_puc_img`, `status`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '24/00001', 'mh43-by2807', 'indore', '1', 'car', 'cng', 'ECCO - MH-43-BY-2807', 'GGCC', 'MH-43-BY-2807', '', './uploads/vehicle_rc/mh43by2807241206060554.jpg', './uploads/vehicle_insurance/mh43by2807-bajaj-ggcc-online241206060554.pdf', '2025-08-04', '2024-07-12', '2025-08-12', '', './uploads/vehicle_puc/puc-2807241206060554.jpg', 'active', 0, 1, '2024-12-23 07:52:28', 60, '2024-12-23 07:52:28'),
(2, '24/00002', 'mh05dp9791', 'north', '2', 'bike', '', 'ACTIVA', '', 'MH-05-DP-9791', '', '', '', '2025-01-29', '0000-00-00', '2024-01-03', '', '', 'active', 1, 1, '2024-11-11 07:24:49', 1, '2024-08-22 06:23:07'),
(3, '24/00003', 'mp09gg1880', 'indore', '5', 'truck', 'diesel', ' GENIO - MP-09-GG-1880', 'ANTHONY GEORGE', 'MP-09-GG-1880', '', './uploads/vehicle_rc/rc-1880241206055637.pdf', './uploads/vehicle_insurance/34-mp-09-gg-1880-magma-george241206055637.pdf', '2025-02-21', '2025-01-21', '2025-01-05', '', './uploads/vehicle_puc/puc-1880241206055813.jpg', 'active', 0, 1, '2024-12-23 07:52:58', 60, '2024-12-23 07:52:58'),
(4, '24/00004', 'mh43bx0102', 'mumbai', '13', 'truck', 'diesel', 'PICK-UP - MH-43-BX-0102', 'GGCC ', 'MH-43-BX-0102', '', './uploads/vehicle_rc/rc-0102241206055159.pdf', './uploads/vehicle_insurance/15-mh-43-bx-0102-icici-george241206055159.pdf', '2025-02-05', '2035-03-15', '2024-11-26', '', '', 'active', 0, 1, '2024-12-23 07:54:29', 60, '2024-12-23 07:54:29'),
(5, '24/00005', 'mp09gj1268', 'indore', '2', 'truck', 'diesel', ' PICK-UP - MP-09-GJ-1268', 'GGCC ', 'MP-09-GJ-1268', '', './uploads/vehicle_rc/rc-1268241205082446.pdf', './uploads/vehicle_insurance/mp09gj1268-future-ggcc-online-compressed241205083058.pdf', '2025-06-29', '2025-05-23', '2025-09-07', '', './uploads/vehicle_puc/puc-1268241206055948.jpg', 'active', 0, 1, '2024-12-23 07:54:02', 60, '2024-12-23 07:54:02'),
(6, '24/00006', 'mh06cs9946', 'indore', '2', 'truck', 'diesel', 'BOLERO - MH-03-CS-0946', 'BRIGHT  ', 'MH-03-CS-9946', '', './uploads/vehicle_rc/rc-9946241111072837.jpg', './uploads/vehicle_insurance/mh03cs9946-magma-bright-online241111072837.pdf', '2025-07-09', '2033-07-10', '2025-02-02', '', './uploads/vehicle_puc/puc-9946241111073133.jpg', 'active', 0, 1, '2024-12-23 07:54:58', 60, '2024-12-23 07:54:58'),
(7, '24/00007', 'mp09gh9231', 'indore', '5', 'truck', 'diesel', 'INTRA V30 - MP-09-GH-9231', 'GGCC ', 'MP-09-GH-9231', '', './uploads/vehicle_rc/rc-9231241111072124.jpg', './uploads/vehicle_insurance/mp09gh9231-future-ggcc-online241111072124.pdf', '2025-08-10', '2025-08-05', '2025-04-09', '', './uploads/vehicle_puc/puc-9231241111072345.jpg', 'active', 0, 1, '2024-12-23 07:55:55', 60, '2024-12-23 07:55:55'),
(8, '24/00008', 'mh05eq7883', 'indore', '5', 'truck', 'cng', 'ECCO - MH-05-EQ-7883 ', 'BRIGHT  ', 'MH-05-EQ-7883', '', './uploads/vehicle_rc/rc-7883241111070319.jpg', './uploads/vehicle_insurance/mh05eq7883-godigit-bright-online241111065806.pdf', '2025-11-08', '2026-10-11', '2025-12-10', '', './uploads/vehicle_puc/0102241212060503.pdf', 'active', 0, 1, '2024-12-23 07:57:08', 60, '2024-12-23 07:57:08'),
(9, '24/00009', 'tn22ct8151', 'chennai', '6', 'truck', 'diesel', 'MAXIMMO - TN-22-CT-8151', 'GGCC ', 'TN-22-CT-8151', '', '', './uploads/vehicle_insurance/tn22ct8151-godigit-george-online241030073039.pdf', '2025-05-15', '0000-00-00', '2025-01-10', '', './uploads/vehicle_puc/puc-8151241111065351.jpg', 'active', 0, 1, '2024-12-23 07:56:28', 60, '2024-12-23 07:56:28'),
(10, '24/00010', 'tn11aa8294', 'chennai', '8', 'truck', 'diesel', 'IMPERIO - TN-11-AA-8294', 'GGCC ', 'TN-11-AA-8294', '', '', './uploads/vehicle_insurance/tn11aa8294-magma-george-online241030073009.pdf', '2025-06-01', '0000-00-00', '2025-07-04', '', './uploads/vehicle_puc/puc-tn11aa8294241111065542.pdf', 'active', 0, 1, '2024-12-23 07:46:55', 60, '2024-12-23 07:46:55'),
(11, '24/00011', 'tn11p0401', 'chennai', '9', 'truck', 'diesel', 'GENIO - TN-11-P-0401', 'GGCC ', 'TN-11-P-0401', '', '', './uploads/vehicle_insurance/tn11p0401-george-magma-online241030072806.pdf', '2025-07-28', '0000-00-00', '2025-03-05', '', './uploads/vehicle_puc/puc-0401241030072806.pdf', 'active', 0, 1, '2024-12-23 07:47:23', 60, '2024-12-23 07:47:23'),
(12, '24/00012', 'tn11u1154', 'chennai', '7', 'truck', 'diesel', 'IMPERIO - TN-11-U-1154', 'GGCC', 'TN-11-U-1154', '', './uploads/vehicle_rc/rc-1154_11zon241030072129.jpg', './uploads/vehicle_insurance/tn11u1154-george-futuregeneral-online241030072129.pdf', '2025-10-03', '0000-00-00', '2025-02-19', '', './uploads/vehicle_puc/puc-1154241111064301.jpg', 'active', 0, 1, '2024-12-23 07:47:48', 60, '2024-12-23 07:47:48'),
(13, '24/00013', 'tn11ba7043', 'chennai', '10', 'truck', 'diesel', 'YODHA - TN-11-BA-7043', 'BRIGHT  ', 'TN-11-BA-7043', '', './uploads/vehicle_rc/rc-7043_11zon241030071959.jpg', './uploads/vehicle_insurance/tn11ba7043-bright-futuregeneral-online241017054756.pdf', '2025-10-04', '0000-00-00', '2025-03-10', '', './uploads/vehicle_puc/puc-7043241111064000.pdf', 'active', 0, 1, '2024-12-23 07:48:17', 60, '2024-12-23 07:48:17'),
(14, '24/00014', 'tn11ac8991', 'chennai', '10', 'truck', 'diesel', 'BOLERO TN-11-AC-8991', 'BRIGHT  ', 'TN-11-AC-8991', '', './uploads/vehicle_rc/rc-tn-11-ac-8991_11zon241030072523.jpg', './uploads/vehicle_insurance/tn11ac8991-icici-bright-online241119080059.pdf', '2025-11-23', '0000-00-00', '2025-09-23', '', './uploads/vehicle_puc/puc-8991241111063821.pdf', 'active', 0, 1, '2024-12-23 07:48:48', 60, '2024-12-23 07:48:48'),
(15, '24/00015', 'tn72bw9714', 'chennai', '6', 'truck', 'diesel', 'BOLERO  - TN-72-BW-9714', 'ANTHONY GEORGE', 'TN-72-BW-9714', '', '', './uploads/vehicle_insurance/tn-72-bw-9714-future-online241202071532.pdf', '2025-11-29', '0000-00-00', '2025-03-10', '', './uploads/vehicle_puc/puc-9714241111063653.pdf', 'active', 0, 1, '2024-12-23 07:49:14', 60, '2024-12-23 07:49:14'),
(16, '24/00016', 'mh03be0628', 'chennai', '6', 'car', 'diesel', 'INNOVA - MH-03-BE-0628', 'GGCC ', 'MH-03-BE-0628', '', './uploads/vehicle_rc/rc-0628241017054414.jpg', './uploads/vehicle_insurance/mh03be0628-george-icici-online241017054132.pdf', '2025-10-17', '0000-00-00', '2025-09-07', '', './uploads/vehicle_puc/puc-0628241111063326.jpg', 'active', 0, 1, '2024-12-23 07:49:40', 60, '2024-12-23 07:49:40'),
(17, '24/00017', 'mh03az8278', 'chennai', '6', 'car', 'diesel', ' ETIOS - MH-03-AZ-8278', 'Devarajan George', 'MH-03-AZ-8278', '', './uploads/vehicle_rc/rc-mh-03-az-8278240930071858.jpg', './uploads/vehicle_insurance/mh03az8278-bajaj-bright-online240930072023.pdf', '2025-08-31', '0000-00-00', '2025-05-06', '', './uploads/vehicle_puc/puc-8278241122070416.jpg', 'active', 0, 1, '2024-12-23 07:50:14', 60, '2024-12-23 07:50:14'),
(18, '24/00018', 'mh05dp9791', 'mumbai', '13', 'bike', 'petrol', 'ACTIVA - MH-05-DP-9791', 'BRIGHT  ', 'MH-05-DP-9791', '', './uploads/vehicle_rc/rc-9791241206062453.pdf', './uploads/vehicle_insurance/1-mh-05-dp-9791-bright-godigit241206062453.pdf', '2025-01-29', '0000-00-00', '2025-08-05', '', './uploads/vehicle_puc/puc-9791241206062453.pdf', 'active', 0, 60, '2024-12-23 07:50:52', 60, '2024-12-23 07:50:52'),
(19, '24/00019', 'mh05cl0785', 'mumbai', '13', 'bike', 'petrol', 'ACTIVA - MH-05-CL-0785', 'ANTHONY GEORGE', 'MH-05-CL-0785', '', './uploads/vehicle_rc/rc-0785241206063400.jpg', './uploads/vehicle_insurance/14-mh05cl0785-godigit-george241206063037.pdf', '2025-01-29', '0000-00-00', '0000-00-00', '', '', 'active', 0, 60, '2024-12-23 07:51:27', 60, '2024-12-23 07:51:27'),
(20, '24/00020', 'mp09qd1785', 'indore', '2', 'bike', 'petrol', 'UNICORN - MP-09-QD-1785', 'ANTHONY GEORGE', 'MP-09-QD-1785', '', './uploads/vehicle_rc/rc-1785241206064150.pdf', './uploads/vehicle_insurance/33-mp-09-qd-1785-godigit-george241206064150.pdf', '2025-02-02', '0000-00-00', '0000-00-00', '', '', 'active', 0, 60, '2024-12-23 07:44:12', 60, '2024-12-23 07:44:12'),
(21, '24/00021', 'mp09ub8294', 'indore', '2', 'bike', 'petrol', 'ACTIVA - MP-09-UB-8294', 'GGCC ', 'MP-09-UB-8294', '', './uploads/vehicle_rc/rc-8294241206064422.pdf', './uploads/vehicle_insurance/16-mp-09-ub-8294-godigit-george241206064422.pdf', '2025-02-13', '0000-00-00', '0000-00-00', '', '', 'active', 0, 60, '2024-12-23 07:44:45', 60, '2024-12-23 07:44:45'),
(22, '24/00022', 'mh03cl8022', 'mumbai', '13', 'bike', 'petrol', ' UNICORN - MH-03-CL-8022', 'ANTHONY GEORGE', 'MH-03-CL-8022', '', './uploads/vehicle_rc/rc-mh-03-cl-8022241206074959.jpg', './uploads/vehicle_insurance/17-mh-03-cl-8022-godogit-george241206071655.pdf', '2025-04-07', '0000-00-00', '0000-00-00', '', '', 'active', 0, 60, '2024-12-23 07:45:17', 60, '2024-12-23 07:45:17'),
(23, '24/00023', 'mp09mm7565', 'indore', '5', 'bike', 'petrol', ' FASCINO - MP-08-MM-7565', 'GGCC ', 'MP-08-MM-7565', '', './uploads/vehicle_rc/rc-mp08mm7565241206072757.jpg', './uploads/vehicle_insurance/mp08mm7565-icici-george-cash241206072757.pdf', '2027-06-15', '0000-00-00', '0000-00-00', '', '', 'active', 0, 60, '2024-12-23 07:45:45', 60, '2024-12-23 07:45:45'),
(24, '24/00024', 'mh03cr4534', 'mumbai', '13', 'bike', 'petrol', ' UNICORN - MH-03-CR-4534', 'DEVARAJAN GEORGE', 'MH-03-CR-4534', '', './uploads/vehicle_rc/rc-mh-03-cr-4534241206080213.jpg', './uploads/vehicle_insurance/mh03cr4534-godigit-bright-cash241206080428.pdf', '2025-07-17', '0000-00-00', '2025-10-17', '', './uploads/vehicle_puc/puc-4534241206080429.jpg', 'active', 0, 60, '2024-12-23 07:46:16', 60, '2024-12-23 07:46:16'),
(25, '24/00025', 'mh05ca8807', 'mumbai', '13', 'bike', 'petrol', 'UNICORN - MH-05-CA-8807', 'DEVARAJAN GEORGE', 'MH-05-CA-8807', '', './uploads/vehicle_rc/rc-8807241206080853.pdf', './uploads/vehicle_insurance/mh05ca8807-icici-bright-online241206080853.pdf', '2025-10-31', '0000-00-00', '2025-10-28', '', './uploads/vehicle_puc/puc-8807241206080937.jpg', 'active', 0, 60, '2024-12-23 07:43:41', 60, '2024-12-23 07:43:41'),
(26, '24/00026', 'mh43bt4671', 'mumbai', '13', 'bike', 'petrol', 'UNICORN - MH-43-BT-4671', 'GGCC ', 'MH-43-BT-4671', '', './uploads/vehicle_rc/rc-4671241206081707.pdf', './uploads/vehicle_insurance/mh43bt4671-godigit-ggcc-cash241206081707.pdf', '2025-11-19', '0000-00-00', '0000-00-00', '', '', 'active', 0, 60, '2024-12-23 07:43:11', 60, '2024-12-23 07:43:11'),
(27, '24/00027', 'mh05bx7367', 'mumbai', '13', 'bike', 'petrol', ' UNICORN - MH-05-BX-7367', 'DEVASAHAYA RAVI ANTHONY', 'MH-05-BX-7367', '', './uploads/vehicle_rc/rc-7367241206082224.pdf', './uploads/vehicle_insurance/mh05bx7367-godigit-ravisir-cash241206082224.pdf', '2025-12-05', '0000-00-00', '2025-03-11', '', './uploads/vehicle_puc/puc-7367241206082225.jpg', 'active', 0, 60, '2024-12-23 07:42:38', 60, '2024-12-23 07:42:38'),
(28, '24/00028', 'mh01bb6297', 'mumbai', '13', 'car', 'petrol', ' DZIRE -  MH-01-BB-6297', 'DEVARAJAN GEORGE', 'MH-01-BB-6297', '', './uploads/vehicle_rc/rc-mh-01-bb-6297241211061024.jpg', './uploads/vehicle_insurance/2-mh-01-bb-6297-magma-bright241211061024.pdf', '2025-03-21', '0000-00-00', '2025-06-08', '', '', 'active', 0, 60, '2024-12-23 07:41:49', 60, '2024-12-23 07:41:49'),
(29, '24/00029', 'tn72at8151', 'chennai', '6', 'bike', 'petrol', 'UNICORN - TN-72-AT-8151', 'ANTHONY GEORGE', 'TN-72-AT-8151', '', './uploads/vehicle_rc/rc-tn-72-at-8151-min241213072038.jpg', './uploads/vehicle_insurance/22-tn-72-at-8151-newindia-george241213071850.pdf', '2025-02-10', '0000-00-00', '0000-00-00', '', '', 'active', 0, 60, '2024-12-23 07:41:09', 60, '2024-12-23 07:41:09'),
(30, '24/00030', 'tn72bz7096', 'chennai', '6', 'bike', 'petrol', 'CB SHINE - TN-72-BZ-7096', 'ANTHONY GEORGE', 'TN-72-BZ-7096', '', './uploads/vehicle_rc/rc-tn-72-bz-7096241213072526.jpg', './uploads/vehicle_insurance/23-tn-72-bz-7096-newindia-george241213072528.pdf', '2025-02-15', '0000-00-00', '0000-00-00', '', '', 'active', 0, 60, '2024-12-23 07:40:38', 60, '2024-12-23 07:40:38'),
(31, '24/00031', 'tn72at2911', 'chennai', '6', 'bike', 'petrol', 'TVS PEP - TN-72-AT-2911', 'MARIA RATHIKA', 'TN-72-AT-2911', '', './uploads/vehicle_rc/rc-tn-72-ay-2911-min241213073034.jpg', './uploads/vehicle_insurance/tn-72-at-2291-godogit-mariyarathika241213072918.pdf', '2025-03-26', '0000-00-00', '0000-00-00', '', '', 'active', 0, 60, '2024-12-27 07:38:40', 60, '2024-12-27 07:38:40'),
(32, '24/00032', 'mh03cb3399', 'mumbai', '13', 'car', 'petrol', 'VENTO - MH-03-CB-3399', 'DEVARAJAN GEORGE', 'MH-03-CB-3399', '', './uploads/vehicle_rc/rc-3399241213073533.pdf', './uploads/vehicle_insurance/mh03cb3399-godigit-bright-online241213073533.pdf', '2025-04-07', '2031-04-06', '2025-06-21', '', '', 'active', 0, 60, '2024-12-27 07:39:06', 60, '2024-12-27 07:39:06'),
(33, '24/00033', 'tn11av0493', 'chennai', '6', 'bike', 'petrol', 'UNICORN - TN-11-AV-0493', 'GGCC ', 'TN-11-AV-0493', '', './uploads/vehicle_rc/rc-tn-11-av-0493241213073743.jpg', './uploads/vehicle_insurance/tn11p0401-george-magma-online241213073743.pdf', '2025-04-20', '0000-00-00', '2025-03-07', '', './uploads/vehicle_puc/puc-7367241213073846.jpg', 'active', 0, 60, '2024-12-23 07:39:17', 60, '2024-12-23 07:39:17'),
(34, '24/00034', 'tn11ap1530', 'chennai', '6', 'bike', 'petrol', 'ACTIVA - TN-11-AP-1530', 'GGCC ', 'TN-11-AP-1530', '', './uploads/vehicle_rc/rc-tn-11-ap-1530241213074202.jpg', './uploads/vehicle_insurance/tn11ap1530-icici-ggcc-cash241213074202.pdf', '2027-07-31', '0000-00-00', '2025-03-08', '', '', 'active', 0, 60, '2024-12-23 07:38:34', 60, '2024-12-23 07:38:34'),
(35, '24/00035', 'tn11ap1639', 'chennai', '6', 'bike', 'petrol', 'CB UNICORN - TN-11-AP-1639', 'GGCC ', 'TN-11-AP-1639', '', './uploads/vehicle_rc/rc-tn-11-ap-1639241213074600.jpg', './uploads/vehicle_insurance/tn11ap1639-newindia-ggcc-cash241213074600.pdf', '2025-07-31', '0000-00-00', '2025-03-08', '', '', 'active', 0, 60, '2024-12-23 07:03:09', 60, '2024-12-23 07:03:09'),
(36, '24/00036', 'tn72by4748', 'chennai', '6', 'bike', 'petrol', ' UNICORN TN72-BY-4748', 'DEVARAJAN GEORGE', 'TN-72-BY-4748', '', './uploads/vehicle_rc/rc-tn72by4748241213074938.jpg', './uploads/vehicle_insurance/tn-72-by-474-bajaj-bright-cash241213074938.pdf', '2025-09-27', '0000-00-00', '2025-03-04', '', '', 'active', 0, 60, '2024-12-23 07:59:53', 60, '2024-12-23 07:59:53'),
(37, '24/00037', 'tn72by5558', 'chennai', '6', 'bike', 'petrol', ' UNICORN TN72-BY-5558', 'DEVARAJAN GEORGE', 'TN-72-BY-5558', '', './uploads/vehicle_rc/rc-tn-72-by-5558-min241213080246.jpg', './uploads/vehicle_insurance/tn72by5558-bajaj-bright-cash241213080141.pdf', '2025-09-29', '0000-00-00', '2025-04-06', '', '', 'active', 0, 60, '2024-12-23 07:59:41', 60, '2024-12-23 07:59:41'),
(38, '24/00038', 'mp09dv8125', 'indore', '1', 'truck', 'diesel', 'PICK UP  - MP09-DV-8125', 'BRIGHT  ', 'MP-09-DV-8125', '', '', '', '2025-08-28', '2026-10-17', '2025-10-18', '', '', 'active', 0, 60, '2024-12-27 07:35:43', 60, '2024-12-27 07:35:43'),
(39, '24/00039', 'mh03da8487', 'mumbai', '13', 'car', 'diesel', ' XUV 500 MH-03-DA-8487', 'DEVARAJAN GEORGE', 'MH-03-DA-8487', '', './uploads/vehicle_rc/rc-8487241213081929.pdf', './uploads/vehicle_insurance/mh03da8487-icici-bright-online241213081929.pdf', '2025-10-21', '2033-08-03', '2025-10-31', '', '', 'active', 0, 60, '2024-12-27 07:36:40', 60, '2024-12-27 07:36:40'),
(40, '24/00040', 'mp09af1302', 'indore', '1', 'truck', 'diesel', 'BOLERO - MP-09-AF-1302', 'BRIGHT  ', 'MP-09-AF-1302', '', '', '', '2025-10-10', '2026-10-19', '2025-12-25', '', '', 'active', 0, 60, '2024-12-27 07:28:29', 60, '2024-12-27 07:28:29');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_fuel`
--

CREATE TABLE `vehicle_fuel` (
  `id` int NOT NULL,
  `filling_date` date NOT NULL,
  `branch` int NOT NULL,
  `vehicle_id` int NOT NULL,
  `vehicle_km` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `amount` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `driver_name` int NOT NULL,
  `delete_status` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_fuel`
--

INSERT INTO `vehicle_fuel` (`id`, `filling_date`, `branch`, `vehicle_id`, `vehicle_km`, `amount`, `driver_name`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '2024-12-12', 2, 4, '111495', '4369', 49, 0, 1, '2024-12-12 09:32:44', 0, NULL),
(2, '2024-12-16', 6, 17, '100', '1000', 22, 0, 1, '2024-12-16 10:39:55', 0, NULL),
(3, '2024-12-16', 13, 36, '50000', '500', 41, 1, 60, '2024-12-18 06:10:09', 0, NULL),
(4, '2024-12-01', 11, 14, '125402', '1000', 4, 1, 60, '2024-12-18 06:11:08', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_service`
--

CREATE TABLE `vehicle_service` (
  `id` int NOT NULL,
  `sno` varchar(100) NOT NULL,
  `vehicle_id` int NOT NULL,
  `service_date` varchar(100) NOT NULL,
  `next_service_date` date DEFAULT NULL,
  `service_category` varchar(150) NOT NULL,
  `service_km` varchar(250) NOT NULL,
  `service_cost` varchar(50) NOT NULL,
  `description` longtext NOT NULL,
  `service_bill` text NOT NULL,
  `status` enum('pending','paid') NOT NULL,
  `method` enum('online','cash') NOT NULL,
  `delete_status` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_service`
--

INSERT INTO `vehicle_service` (`id`, `sno`, `vehicle_id`, `service_date`, `next_service_date`, `service_category`, `service_km`, `service_cost`, `description`, `service_bill`, `status`, `method`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '24/00001', 8, '2024-07-13', NULL, '', '82074', '2360', 'OIL SERVICE', '', 'paid', 'cash', 1, 1, '2024-08-29 01:02:28', 0, '0000-00-00 00:00:00'),
(2, '24/00002', 8, '2024-07-13', NULL, '', '82074', '2360', 'OIL SERVICE', '', 'paid', 'cash', 1, 1, '2024-08-29 01:02:28', 0, '0000-00-00 00:00:00'),
(3, '24/00003', 8, '2024-01-17', NULL, '', '70089', '8060', 'FULL  SERVICE', '', 'paid', 'online', 0, 1, '2024-08-29 01:02:30', 1, '2024-08-29 06:37:29'),
(4, '24/00004', 8, '2024-07-13', NULL, '', '82074', '2360', 'OIL SERVICE', '', 'paid', 'cash', 0, 1, '2024-08-29 01:02:30', 0, '0000-00-00 00:00:00'),
(5, '24/00005', 7, '2024-06-01', NULL, '', '137488', '10678', 'FULL SERVICE', '', 'paid', 'online', 0, 1, '2024-08-29 01:11:26', 0, '0000-00-00 00:00:00'),
(6, '24/00006', 7, '2024-06-01', NULL, '', '137488', '10678', 'FULL SERVICE', '', 'paid', 'online', 0, 1, '2024-08-29 01:11:26', 0, '0000-00-00 00:00:00'),
(7, '24/00007', 6, '2024-06-16', NULL, '', '250549', '4700', 'SERVICE', '', 'paid', 'online', 0, 1, '2024-08-29 01:13:59', 0, '0000-00-00 00:00:00'),
(8, '24/00008', 4, '2024-01-08', NULL, '', '98879', '3915', 'FULL SERVICE', '', 'paid', 'online', 1, 1, '2024-08-29 01:54:51', 0, '0000-00-00 00:00:00'),
(9, '24/00009', 4, '2024-01-08', NULL, '', '98879', '3915', 'FULL SERVICE', '', 'paid', 'online', 1, 1, '2024-08-29 01:54:51', 0, '0000-00-00 00:00:00'),
(10, '24/00010', 4, '2024-01-08', NULL, '', '98879', '3915', 'FULL SERVICE', '', 'paid', 'online', 1, 1, '2024-08-29 01:54:52', 0, '0000-00-00 00:00:00'),
(11, '24/00011', 4, '2024-01-08', NULL, '', '98879', '3915', 'FULL SERVICE', '', 'paid', 'online', 0, 1, '2024-08-29 01:55:34', 0, '0000-00-00 00:00:00'),
(12, '24/00012', 4, '2024-08-25', '2024-12-01', 'maintenance', '118977', '6815', 'FULL SERVICE', '', 'paid', 'online', 0, 1, '2024-08-29 01:55:38', 60, '2024-12-10 08:27:33'),
(13, '24/00013', 3, '2024-07-01', NULL, '', '450188', '4960', 'FULL SERVICE', '', 'paid', 'online', 0, 1, '2024-08-29 02:13:17', 0, '0000-00-00 00:00:00'),
(14, '24/00014', 1, '2024-05-04', NULL, '', '110131', '7235', 'FULL SERVICE', '', 'paid', 'online', 0, 1, '2024-08-29 02:44:52', 0, '0000-00-00 00:00:00'),
(15, '24/00015', 1, '2024-05-04', NULL, '', '110131', '7235', 'FULL SERVICE', '', 'paid', 'online', 0, 1, '2024-08-29 02:45:27', 0, '0000-00-00 00:00:00'),
(16, '24/00016', 1, '2024-09-23', NULL, '', '125606', '4200', 'BATTERY CHANGE\r\nEXIDE FML5-ML38B2OLA3H4M435227', '', 'paid', 'online', 0, 1, '2024-09-23 01:23:28', 1, '2024-09-23 06:56:26'),
(17, '24/00017', 17, '2024-01-23', '0000-00-00', 'tyre_change', '211792', '900', '1 TYRE CHANGED\r\n', '', 'paid', '', 0, 1, '2024-11-15 02:02:11', 0, '0000-00-00 00:00:00'),
(18, '24/00018', 17, '2024-02-06', '0000-00-00', 'maintenance', '211792', '4779', 'GENERAL SERVICE\r\n', '', 'paid', '', 0, 1, '2024-11-15 02:03:10', 0, '0000-00-00 00:00:00'),
(19, '24/00019', 17, '2024-05-23', '0000-00-00', 'maintenance', '211792', '843', 'REPAIR\r\n', '', 'paid', '', 0, 1, '2024-11-15 02:04:04', 60, '2024-12-10 08:25:02'),
(20, '24/00020', 8, '2024-12-11', '0000-00-00', 'maintenance', '93183', '3600', 'ENGINE OIL , FILTER CHANGE,  AND CHECKING ALL PARTS, GEAR OIL. WHEEL ALLIGNMENT , AND FULL WASHING', '', 'paid', 'online', 0, 60, '2024-12-12 00:28:58', 0, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advancecash_loan`
--
ALTER TABLE `advancecash_loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advancecash_received`
--
ALTER TABLE `advancecash_received`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_pettycash`
--
ALTER TABLE `branch_pettycash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_expenses`
--
ALTER TABLE `employee_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_leave`
--
ALTER TABLE `employee_leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_payslip`
--
ALTER TABLE `employee_payslip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_performance`
--
ALTER TABLE `employee_performance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_transfer`
--
ALTER TABLE `employee_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estimation_bill`
--
ALTER TABLE `estimation_bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_manage`
--
ALTER TABLE `file_manage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_permission`
--
ALTER TABLE `login_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_branch`
--
ALTER TABLE `master_branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_designation`
--
ALTER TABLE `master_designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_gst`
--
ALTER TABLE `master_gst`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_incharge`
--
ALTER TABLE `master_incharge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_material`
--
ALTER TABLE `master_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_pan`
--
ALTER TABLE `master_pan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_party`
--
ALTER TABLE `master_party`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_pettycash`
--
ALTER TABLE `master_pettycash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_thirdparty`
--
ALTER TABLE `master_thirdparty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_vendor`
--
ALTER TABLE `master_vendor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_shipping`
--
ALTER TABLE `material_shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_transaction`
--
ALTER TABLE `stock_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outlet`
--
ALTER TABLE `outlet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party_payment`
--
ALTER TABLE `party_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party_payment_received`
--
ALTER TABLE `party_payment_received`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retention_money`
--
ALTER TABLE `retention_money`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_increment`
--
ALTER TABLE `salary_increment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_report`
--
ALTER TABLE `stock_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_fuel`
--
ALTER TABLE `vehicle_fuel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_service`
--
ALTER TABLE `vehicle_service`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advancecash_loan`
--
ALTER TABLE `advancecash_loan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `advancecash_received`
--
ALTER TABLE `advancecash_received`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `branch_pettycash`
--
ALTER TABLE `branch_pettycash`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=539;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `employee_expenses`
--
ALTER TABLE `employee_expenses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employee_leave`
--
ALTER TABLE `employee_leave`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employee_payslip`
--
ALTER TABLE `employee_payslip`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `employee_performance`
--
ALTER TABLE `employee_performance`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employee_transfer`
--
ALTER TABLE `employee_transfer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `estimation_bill`
--
ALTER TABLE `estimation_bill`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `file_manage`
--
ALTER TABLE `file_manage`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_permission`
--
ALTER TABLE `login_permission`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `master_branch`
--
ALTER TABLE `master_branch`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `master_designation`
--
ALTER TABLE `master_designation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `master_gst`
--
ALTER TABLE `master_gst`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `master_incharge`
--
ALTER TABLE `master_incharge`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `master_material`
--
ALTER TABLE `master_material`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `master_pan`
--
ALTER TABLE `master_pan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `master_party`
--
ALTER TABLE `master_party`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `master_pettycash`
--
ALTER TABLE `master_pettycash`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `master_thirdparty`
--
ALTER TABLE `master_thirdparty`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `master_vendor`
--
ALTER TABLE `master_vendor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `material_shipping`
--
ALTER TABLE `material_shipping`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `stock_transaction`
--
ALTER TABLE `stock_transaction`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `outlet`
--
ALTER TABLE `outlet`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=715;

--
-- AUTO_INCREMENT for table `party_payment`
--
ALTER TABLE `party_payment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `party_payment_received`
--
ALTER TABLE `party_payment_received`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `retention_money`
--
ALTER TABLE `retention_money`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `salary_increment`
--
ALTER TABLE `salary_increment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stock_report`
--
ALTER TABLE `stock_report`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `vehicle_fuel`
--
ALTER TABLE `vehicle_fuel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicle_service`
--
ALTER TABLE `vehicle_service`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
