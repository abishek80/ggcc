-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 19, 2024 at 09:22 PM
-- Server version: 8.0.40
-- PHP Version: 8.3.13

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
(1, '1', '2024-11-11', '1000000', 'GGCC', 'thirdparty', 1, 1, '2024-11-11 07:59:20', 1, '2024-11-11 07:56:57'),
(2, '2', '2024-11-06', '1000000', '', 'thirdparty', 0, 1, '2024-11-16 11:33:58', 1, '2024-11-16 11:33:58'),
(3, '22', '2024-11-11', '1000', '', 'employee', 0, 1, '2024-11-11 02:31:54', 0, NULL),
(4, '1', '2024-11-11', '1000', '', 'thirdparty', 1, 1, '2024-11-11 08:02:26', 0, NULL),
(5, '1', '2024-11-16', '1000000', '', 'thirdparty', 1, 1, '2024-11-16 11:34:39', 0, NULL),
(6, '2', '2024-11-07', '1000000', '', 'thirdparty', 0, 1, '2024-11-16 06:04:30', 0, NULL),
(7, '2', '2024-11-16', '1000000', '', 'thirdparty', 0, 1, '2024-11-16 06:05:07', 0, NULL);

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
(1, '2', '2024-11-11', '1000', 'thirdparty', 1, 1, '2024-11-16 11:35:25', 0, NULL);

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
(17, '24/00017', '2024-11-12', 'chennai', '9', 'earth_renewal', 'G Joseph Margasis', 'APPU', '9363174843', 'SRI SARAVANA AGENCIES ADHOC', 'VADAVALLI ', '', '', 16, '', '', '', '', 'EARTH RENEWAL ', '', '', NULL, NULL, '', 'not_started', 0, 0, 40, '2024-11-12 07:06:28', 1, '2024-11-16 05:00:40'),
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
(39, '24/00039', '2024-11-16', 'chennai', '9', 'earth_renewal', 'G Joseph Margasis', 'APPU', '9363174843', 'JAI SAI RAJ FUEL FIL', 'ANNUR', '', '', 36, '', '', '', '', 'EARTH RENEWAL ', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-16 05:13:56', 0, NULL),
(40, '24/00040', '2024-11-16', 'chennai', '9', 'earth_renewal', 'G Joseph Margasis', 'APPU', '9363174843', 'POOVIYA AGENCY ', 'COIMBATORE', '', '', 37, '', '', '', '', 'EARTH RENEWAL ', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-16 05:15:16', 0, NULL),
(41, '24/00041', '2024-11-16', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'IGP PETROLEUM', 'CHITRAMCODE', '', '', 38, '', '', '', '', 'ELECTRICAL COMPLAINT ', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-16 05:17:55', 0, NULL),
(42, '24/00042', '2024-11-18', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', 'UMA AGENCIES', 'PERIYANAYAKKAN PALAYAM ', '', '', 51, '', '', '', '', 'DU COMPLAINT ', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-18 07:40:45', 0, NULL),
(43, '24/00043', '2024-11-18', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', 'NARASHIMMAN AGENCIES ', 'PN PUDHUR', '', '', 52, '', '', '', '', 'STP COMPLAINT ', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-18 07:41:55', 0, NULL),
(44, '24/00044', '2024-11-18', 'chennai', '9', 'earth_renewal', 'G Joseph Margasis', 'APPU', '9363174843', 'S RAMESH & BROS', 'METTUPALAYAM ', '', '', 53, '', '', '', '', 'EARTH RENEWAL', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-18 07:43:49', 0, NULL),
(45, '24/00045', '2024-11-18', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', 'PRSAD & CO', 'UKKADAM', '', '', 54, '', '', '', '', 'ELECTRICAL COMPLAINT ', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-18 07:45:10', 0, NULL),
(46, '24/00046', '2024-11-18', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', 'RAJKAMAL AGENCIES ', 'METTUPALAYAM ', '', '', 55, '', '', '', '', 'LIGHT REPAIRING', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-18 07:46:19', 0, NULL),
(47, '24/00047', '2024-11-18', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'ARUSHYA FUELS ', 'NARIYUTHU', '', '', 56, '', '', '', '', 'SITE VISIT', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-18 07:48:39', 0, NULL),
(48, '24/00048', '2024-11-18', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'DEVI FUELS ', 'MANOOR', '', '', 57, '', '', '', '', 'SITE VISIT', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-18 07:49:47', 0, NULL),
(49, '24/00049', '2024-11-18', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'INDIRA RAJAN FUELS ', 'KANARPATTI', '', '', 58, '', '', '', '', 'SITE VISIT', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-18 07:51:08', 0, NULL),
(50, '24/00050', '2024-11-19', 'chennai', '9', 'earth_renewal', 'G Joseph Margasis', 'APPU', '9363174843', 'SELVAM AGNCIES ', 'METTUPALAYAM ', '', '', 85, '', '', '', '', 'EARTH RENEWAL ', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-19 07:23:34', 0, NULL),
(51, '24/00051', '2024-11-19', 'chennai', '9', 'maintenance', 'G Joseph Margasis', 'APPU', '9363174843', 'CHAVADI PETROLEUM ', 'BIG BAZAAR STREET ', '', '', 86, '', '', '', '', 'STABILIZER INSTALLATION ', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-19 07:24:42', 0, NULL),
(52, '24/00052', '2024-11-19', 'chennai', '9', 'earth_renewal', 'G Joseph Margasis', 'APPU', '9363174843', 'PALANI ANDAVAR AGENCIES', 'PETHIKUTTAI', '', '', 87, '', '', '', '', 'EART RENEWAL ', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-19 07:25:59', 0, NULL),
(53, '24/00053', '2024-11-18', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'APN PETROLEUM ', 'VENKATESWARAPURAM', '', '', 88, '', '', '', '', 'SITE VISIT', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-19 07:28:13', 0, NULL),
(54, '24/00054', '2024-11-18', 'chennai', '8', 'maintenance', 'J.Charles', 'APPU', '9363174843', 'MANIS A1 FUELS ', 'EDAIKAL', '', '', 89, '', '', '', '', 'SITE VISIT', '', '', NULL, NULL, '', 'inprogress', 1, 0, 40, '2024-11-19 07:29:13', 0, NULL);

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
  `esi_status` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `esi_number` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `pf_status` varchar(50) NOT NULL,
  `pf_number` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
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
(1, '24/00001', 'ggcc000', 'GGCC000', 'admin', '', 'admin', 'admin', '202cb962ac59075b964b07152d234b70', '', '', '', 'admin@ggcc.com', '1234567890', '', '', '', 'active', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, '2024-07-10 17:35:28', 0, NULL),
(2, '24/00002', 'ggcc001', 'GGCC001', 'Rajan', '', '', 'employee', '202cb962ac59075b964b07152d234b70', 'north', '1', '', '', '2334', '2', '', '2024-07-12', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '20000', '9000', '200', '', 'Not Applicable', 'yes', '123', '15000', '123', '123', 'abc', 'abc', '123', 'abc', 0, 1, 1, '2024-07-11 10:43:23', 1, '2024-07-11 16:42:18'),
(3, '24/00003', 'ggcc102', 'GGCC102', 'Nadar Bhuvana Shekar', 'ggcc', 'BCOM', 'employee_management', '202cb962ac59075b964b07152d234b70', 'mumbai', '13', 'Mumbai', 'bhuvananadar95@gmail.com', '7506455521', '4', '1995-07-27', '2019-02-01', 'active', '', '', '', '', '', '431', 'SHELL COLONY SERVICE ROAD', 'MUMBAI', 'MUMBAI', '400071', '', '', '', '', '', '', '', '', '16000', '6000', '200', 'no', 'Not Applicable', 'yes', '101420903254', '16000', 'FGMPS4413N', '654056533096', 'TMBL', 'Chembur', '218100720600445', 'TMBL0000218', 0, 0, 1, '2024-07-12 02:45:12', 1, '2024-11-10 14:43:42'),
(4, '24/00004', 'ggcc132', 'GGCC132', 'Aaditya Kumar ARK', 'ggcc', 'ZOOLOGYHONS ', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '1', 'Indore', ' aadityaku15299@gmail.com ', '8797264700', '3', '1999-02-15', '2022-06-07', 'active', '', '', '', '', '', 'NO 42', 'RAMNAGAR', 'OBRA', 'AURANAGABAD', '824124', '', '', '', '', '', '', '', '', '17000', '8000', '200', 'no', 'Not Applicable', 'yes', '101322238657', '15000', ' CHEPA9887L ', '459503303703', 'State Bank Of India', 'OBRA AURANGABAD', '20411611573', ' SBIN0012601 ', 0, 0, 1, '2024-07-13 23:56:31', 1, '2024-11-08 09:52:29'),
(5, '24/00005', 'ggcc86', 'GGCC086', 'Ajay Yadav', 'ggcc', '10TH STANDARD PASS', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '1', 'Indore', ' ajayadav42760@gmail.com ', '9589239680', '6', '1993-07-12', '2023-01-01', 'active', '', '', '', '', '', '127 B', 'DHEERAJ NAGAR ', 'INDORE', 'INDORE', '452010', '', '', '', '', '', '', '', '', '17000', '8000', '200', 'no', 'Not Applicable', 'yes', '100650291060', '15000', ' ANPPY8836N', '246797798941', 'Tamilnad Mercantile Bank Ltd', 'INDORE', '444149589239680', ' TMBL0000444 ', 0, 0, 1, '2024-07-14 00:04:57', 1, '2024-11-08 09:52:58'),
(6, '24/00006', 'ggcc84', 'GGCC084', 'P.Allwin', 'ggcc', 'DIPLOMA ( DEE)', 'employee', '202cb962ac59075b964b07152d234b70', 'chennai', '6', 'Indore', ' pallwin86@gmail.com ', '9713450011', '5', '1986-05-08', '2015-12-01', 'active', '', '', '', '', '', '5/5D', 'SOUTH KARUMPATTOOR', 'SWAMYTHOPPU POST', 'KANYAKUMARI', '629701', '', '', '', '', '', '', '', '', '25000', '20000', '200', 'no', 'Not Applicable', 'yes', '100649963586', '25000', ' ABMPA0285G ', '740110423954', 'Tamilnad Mercantile Bank Ltd', ' CHEMBUR', '218100720600073', ' TMBL0000218 ', 0, 0, 1, '2024-07-14 00:14:02', 1, '2024-11-08 10:16:20'),
(7, '24/00007', 'ggcc94', 'GGCC094', 'Prabhudayal Patel', 'ggcc', 'B.COM', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '2', 'Indore', ' ap.030792@gamil.com ', '8269532621', '6', '1992-07-07', '2017-07-01', 'active', '', '', '', '', '', '107', 'TALAVALI CHANDG', 'INDORE', 'INDORE', '453771', '', '', '', '', '', '', '', '', '20000', '8000', '200', 'no', 'Not Applicable', 'yes', '101132615953', '15000', ' CMVPP2248E ', '906294105638', 'Tamilnad Mercantile Bank Ltd', 'INDORE', '444100050300412', ' TMBL0000444 ', 0, 0, 1, '2024-07-14 00:50:25', 1, '2024-11-08 10:16:36'),
(8, '24/00008', 'ggcc105', 'GGCC105', 'Deepak Kumar Mouriya', 'ggcc', '10TH STANDARD PASS', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '1', 'Indore', ' mauryadipak079@gmail.com ', '6280321565', '6', '1993-01-01', '2019-04-01', 'active', '', '', '', '', '', '', 'BELAHARI', 'AMETHI', 'AMETHI', '227405', '', '', '', '', '', '', '', '', '15000', '8000', '200', 'no', 'Not Applicable', 'yes', '101446396581', '15000', ' DIRPM20225 ', '339321892181', 'UCO BANK', 'AMETHI', '24240110085288', ' UCBA00002424 ', 0, 0, 1, '2024-07-14 00:54:18', 1, '2024-11-08 10:03:55'),
(9, '24/00009', 'ggcc135', 'GGCC135', 'Ramashankar Prasad', 'ggcc', '', 'employee', '202cb962ac59075b964b07152d234b70', 'mumbai', '11', 'Indore', '', '123', '6', '', '2023-01-01', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '25000', '8000', '200', 'no', 'Not Applicable', 'yes', '101914491001', '15000', 'abc', 'abc', 'Punjab National Bank', 'abc', '2400000100213458', 'abc', 0, 0, 1, '2024-07-14 00:58:02', 1, '2024-11-08 10:19:30'),
(10, '24/00010', 'ggcc002', 'GGCC002', 'Praful Thandel', 'ggcc', '8TH STANDARD PASS', 'vehicle_management', '202cb962ac59075b964b07152d234b70', 'indore', '1', 'Indore', ' prafulthandel8168@gmail.com ', '9892557049', '2', '1972-08-21', '2005-11-01', 'active', '', '', '', '', '', 'NO6', '', '', '', '', '', '', '', '', '', '', '', '', '20000', '8000', '200', 'no', 'Not Applicable', 'yes', '100275120870', '15000', ' AHRPT7799K ', '645370545932', 'Tamilnad Mercantile Bank Ltd', 'Chembur', '218100050300730', ' TMBL0000218 ', 0, 0, 1, '2024-07-14 01:01:50', 1, '2024-11-11 06:33:02'),
(11, '24/00011', 'ggcc00034', 'GGCC034', 'BAPU PARSHURAM SHIRODKAR', 'ggcc', '8TH STANDARD PASS', 'employee', '202cb962ac59075b964b07152d234b70', 'mumbai', '11', 'Indore', ' sunilshirodkar70@gmail.com ', '9930552955', '2', '1971-07-08', '2008-12-01', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '25000', '8000', '200', 'no', 'Not Applicable', 'yes', '100107951357', '15000', ' BMYPS78448 ', '315188351099', 'Tamilnad Mercantile Bank Ltd', 'Chembur', '218100050300351', ' TMBL0000218 ', 0, 0, 1, '2024-07-14 01:32:33', 1, '2024-11-08 09:55:05'),
(12, '24/00012', 'ggcc00040', 'GGCC040', 'VAIBHAV VINAYAK NADKARNI', 'ggcc', '10TH STANDARD PASS', 'employee', '202cb962ac59075b964b07152d234b70', 'mumbai', '3', 'Mumbai', 'Vaibhav.n619@gmail.com', '898208218', '6', '1991-06-02', '2010-05-24', 'active', '', '', '', '', '', '1/2', 'KAILASH NAGAR', 'KALYAN EAST', 'THANE', '421306', '', '', '', '', '', '', '', '', '23000', '8000', '200', 'no', 'Not Applicable', 'yes', '100399345214', '15000', 'AJEPN9298A', '906060133460', 'TAMILNAD MERCANTILE BANK LTD', 'CHEMBUR', '218100720600103', 'TMBL0000218', 0, 0, 1, '2024-07-14 01:37:22', 1, '2024-11-08 10:03:36'),
(13, '24/00013', 'ggcc093', 'GGCC093', 'Raghunath S Parida', 'ggcc', '', 'employee', '202cb962ac59075b964b07152d234b70', 'mumbai', '3', 'Mumbai', '', '123', '6', '', '2023-01-01', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '23000', '10000', '200', 'no', 'Not Applicable', 'yes', '100290525018', '15000', 'abc', 'abc', 'Tamilnad Mercantile Bank Ltd', 'Chembur', '218100050300342', 'TMBL0000218', 0, 0, 1, '2024-07-14 01:41:42', 1, '2024-11-08 10:18:21'),
(14, '24/00014', 'ggcc037', 'GGCC037', 'Ranjeet Singh Nanade', 'ggcc', '12TH STANDARD PASS', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '2', 'Mumbai', 'rs771236@gmail.com', '9834993588', '2', '1973-03-31', '2009-05-01', 'active', '', '', '', '', '', '1', 'KALYAN MURBAD ROAD SHAHAD PHATAK', 'ULHASNAGAR 1', 'THANE', '421001', '', '', '', '', '', '', '', '', '21000', '8000', '200', 'no', 'Not Applicable', 'yes', '100307924904', '15000', 'BYDPN5255N', '469717436193', 'TAMILNAD MERCANTILE BANK LTD', 'CHEMBUR', '218100050300394', 'TMBL0000218', 0, 0, 1, '2024-07-14 01:44:33', 1, '2024-11-08 10:19:51'),
(15, '24/00015', 'ggcc043', 'GGCC043', 'Nilesh G Savratkar', 'ggcc', '', 'employee', '202cb962ac59075b964b07152d234b70', 'north', '13', '', '', '123', '2', '', '2024-07-02', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '21000', '8000', '200', 'no', 'Not Applicable', 'yes', '100255467057', '15000', 'abc', 'abc', 'Tamilnad Mercantile Bank ltd', 'Chembur', '218100720600099', '', 0, 1, 1, '2024-07-14 01:47:29', 1, '2024-08-29 10:42:20'),
(16, '24/00016', 'ggcc046', 'GGCC046', 'PRAMOD DHAKU MUNGEKAR', 'ggcc', '10TH STANDARD PASS', 'employee', '202cb962ac59075b964b07152d234b70', 'mumbai', '3', 'Mumbai', 'pramodmung1983@gmail.com', '9768671114', '6', '1983-07-25', '2011-01-01', 'active', '', '', '', '', '', '850', '', 'DEVGAD', 'SINDHUDURG ', '416630', '', '', '', '', '', '', '', '', '19000', '8000', '0', 'no', 'Not Applicable', 'yes', '100276584252', '15000', 'AXPPM5363C', '573979836689', 'TAMILNAD MERCANTILE BANK LTD', 'CHEMBUR', '218100050301639', 'TMBL0000218', 0, 0, 1, '2024-07-14 01:52:07', 1, '2024-11-08 11:32:37'),
(17, '24/00017', 'ggcc099', 'GGCC099', 'P Muthu Kumar', 'ggcc', 'B.E MECH', 'employee', '202cb962ac59075b964b07152d234b70', 'chennai', '6', 'Tamil Nadu', ' p.muthukumar@gmail.com ', '9345335433', '3', '1996-06-22', '2018-04-01', 'active', '', '', '', '', '', '8A', 'PUNNIYAVALANPURAM ', 'PANAGUDI', 'TIRUNELVELI', '627109', '', '', '', '', '', '', '', '', '22000', '8000', '200', 'no', 'Not Applicable', 'yes', '101286700652', '15000', ' CIAPM8773J ', '616433043417', 'TAMILNAD MERCANTILE BANK LTD', 'PANAGUDI', '248100050305253', ' TMBL0000248 ', 0, 0, 1, '2024-07-14 01:54:51', 1, '2024-11-08 10:15:28'),
(18, '24/00018', 'ggcc122', 'GGCC122', 'Kishor Selvam', 'ggcc', 'BSC MATHEMATICS', 'complaint_management', '202cb962ac59075b964b07152d234b70', 'chennai', '6', 'Tamil Nadu', ' kishoreselvam2013@gmail,com  ', '8939108991', '6', '1995-05-18', '2021-08-02', 'active', '', '', '', '', '', '118', 'SOUTH STREET', 'VIRUDHACHALAM', 'CUDDALORE', '606104', '', '', '', '', '', '', '', '', '15000', '7000', '200', 'no', 'Not Applicable', 'yes', '101722099112', '15000', ' HZYPK1119N ', '820176096489', 'Indian Overseas Bank', 'LOYOLA COLLAGE', '171201000031488', ' IOBA 0001712 ', 0, 0, 1, '2024-07-14 01:58:35', 1, '2024-11-10 14:41:33'),
(19, '24/00019', 'ggcc140', 'GGCC140', 'Lenin Fernondo', 'ggcc', 'ITI', 'employee', '202cb962ac59075b964b07152d234b70', 'chennai', '6', 'Tamil Nadu', ' leninfernando96@gmail.com ', '8526007539', '6', '1996-07-30', '2023-05-08', 'active', '', './uploads/employee_aadharcard/leninaadhar241023103848.pdf', './uploads/employee_pancard/leninpancard241023103757.pdf', '', '', '121', 'MATHUR ROAD ', 'VIRUDHACHALAM', 'CUDDALORE', '606104', '', '', '', '', '', '', '', '', '13000', '8000', '200', 'yes', '3416244216', 'yes', '101821078985', '13000', ' BKGPL9746K ', '316122647468', 'Indian Overseas Bank ', 'ALADI', '109401000011515', ' IDBA0001094 ', 0, 0, 1, '2024-07-14 02:02:52', 1, '2024-11-08 10:12:25'),
(20, '24/00020', 'ggcc068', 'GGCC068', 'G Joseph Margasis', 'ggcc', 'ITI', 'employee', '202cb962ac59075b964b07152d234b70', 'chennai', '9', 'Tamil Nadu', ' joyeemoriyo@gmail.com  ', '9790033091', '2', '1992-04-24', '2013-01-01', 'active', '', '', '', '', '', '328', 'FATHIMA STEET', 'PANAGUDI', 'TIRUNELVELI', '627109', '', '', '', '', '', '', '', '', '23500', '10500', '200', 'no', 'Not Applicable', 'yes', '100147893430', '15000', ' BAEPJ5184P ', '420454027796', 'Tamilnad Mercantile Bank Ltd', 'PODHANUR', '058109790033091', ' TMBL0000058 ', 0, 0, 1, '2024-07-14 06:57:49', 1, '2024-11-08 10:05:16'),
(21, '24/00021', 'ggcc116', 'GGCC116', 'Karthik K', 'ggcc', 'B.E  ELECTRICAL', 'employee', '202cb962ac59075b964b07152d234b70', 'chennai', '6', 'Tamil Nadu', ' kalaikarthik19@gmail.com  ', '9500323408', '6', '1990-06-22', '2019-12-01', 'active', '', '', '', '', '', '3*/295', 'SOUTH STREET', 'KATTUMANNAR KOIL', 'CUDDALORE', '608305', '', '', '', '', '', '', '', '', '20000', '9000', '200', 'no', 'Not Applicable', 'yes', '100190477301', '15000', ' DPQPK1078Q ', '519421550722', 'State Bank Of India', 'T.NEDUNJERI', '33798843970', ' SBIN0006239 ', 0, 0, 1, '2024-07-14 07:04:20', 1, '2024-11-08 10:10:55'),
(22, '24/00022', 'ggcc050', 'GGCC050', 'A. Ellavarasan', 'ggcc', '5 th', 'employee', '202cb962ac59075b964b07152d234b70', 'chennai', '6', 'Tamil Nadu', 'elavarasan669@gmail.com', '9003179883', '3', '1985-06-10', '2011-11-01', 'active', './uploads/employee_profile/vaibhav241023071646.jpeg', '', '', '', '', '233', 'SOUTH STREET', 'KATTUMANNAR KOIL', 'CUDDALORE', '608302', '', '', '', '233', 'SOUTH STREET', 'KATTUMANNAR KOIL', 'CUDDALORE', '608302', '23500', '10500', '200', 'no', 'Not Applicable', 'yes', '100145028944', '15000', ' ACPPE2451A ', '825351196045', 'TAMILNAD MERCANTILE BANK LTD', 'CHITHAMBARAM', '312100050301856', ' TMBL0000312 ', 0, 0, 1, '2024-07-14 07:09:43', 1, '2024-11-08 09:51:51'),
(23, '24/00023', 'ggcc082', 'GGCC082', 'A.Arulmani', 'ggcc', '', 'employee', '202cb962ac59075b964b07152d234b70', 'chennai', '9', 'Tamil Nadu', '', '9626287278', '6', '1982-11-09', '2015-09-01', 'active', '', '', '', '', '', '359', 'ROAD STREET', 'MANNARGUDI', 'CUDDALORE', '608302', '', '', '', '', '', '', '', '', '17000', '8000', '200', 'no', 'Not Applicable', 'yes', '100604454985', '15000', ' BZMPA8855M ', '929395490078', 'Tamilnad Mercantile Bank', 'CANTCNMENT PALLAVARAM', '210100050305252', 'TMBL0000210', 0, 0, 1, '2024-07-14 07:15:47', 1, '2024-11-10 14:23:04'),
(24, '24/00024', 'ggcc067', 'GGCC067', 'J.Charles', 'ggcc', 'ITI', 'employee', '202cb962ac59075b964b07152d234b70', 'chennai', '7', 'Tamil Nadu', ' charlesraja1992@gmail .com  ', '8098742317', '6', '1992-07-04', '2013-01-01', 'active', '', '', '', '', '', '4/50', 'MIDDLE STREET', 'ODAKKARAI', 'TIRUNELVELI', '627414', '', '', '', '', '', '', '', '', '23000', '8000', '200', 'no', 'Not Applicable', 'yes', '100169001751', '15000', ' BGZPC3722M ', '752236331711', 'Tamilnad Mercantile Bank Ltd', 'CHEVANMANDHADEVI ', '210100050304937', ' TMBL0000490 ', 0, 0, 1, '2024-07-14 07:20:37', 1, '2024-11-08 10:09:50'),
(25, '24/00025', 'beh03', 'BEH 03', 'CHAND BASHA BASHEER GULAM', 'bright', '', 'employee', '202cb962ac59075b964b07152d234b70', 'mumbai', '13', 'Mumbai', 'cbasha7734@gmail.com', '9082577305', '2', '', '2019-04-01', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '20000', '14000', '200', 'no', 'Not Applicable', 'yes', '100463895891', '20000', 'ABC', '123', 'TAMILNAD MERCANTILE BANK LTD', 'CHEMBUR', '218100720600074', 'TMBL0000218', 0, 0, 1, '2024-08-05 19:53:42', 1, '2024-11-08 10:03:17'),
(26, '24/00026', 'beh07', 'BEH 07', 'Munna Kumar Singh', 'bright', '', 'employee', '202cb962ac59075b964b07152d234b70', 'north', '13', '', '', '7738542303', '3', '', '2019-04-01', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '19000', '8000', '200', 'no', 'Not Applicable', 'yes', '101447717389', '15000', '123', '123', 'TAMILNAD MERCANTILE BANK LTD', 'CHEMBUR', '218100720600101', 'TMBL0000218', 0, 1, 1, '2024-08-05 19:57:55', 0, NULL),
(27, '24/00027', 'beh14', 'BEH 14', 'Prins Kumar', 'bright', '10TH STANDARD PASS', 'employee', '202cb962ac59075b964b07152d234b70', 'north', '1', '', ' princemaurya@gmail.com ', '7071341008', '6', '', '2019-04-01', 'active', '', '', '', '', '', '101', 'MAURYA BHAVAN', '', '', '', '', '', '', '', '', '', '', '', '22000', '8000', '200', 'no', 'Not Applicable', 'yes', '101447716720', '15000', ' EXVPK4254G ', '855008805154', 'Baroda Uttar Pradesh Gramin Bank', 'AMETHI', '51540100016394', 'BARB0AMETHI', 0, 1, 1, '2024-08-05 20:05:54', 1, '2024-08-20 11:02:54'),
(28, '24/00028', 'beh-031', 'BEH 031', 'Arvind', 'bright', '8TH STANDARD PASS', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '1', 'Indore', ' rajasushil15@gmail.com ', '7081607476', '6', '2000-03-01', '2022-01-01', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '14000', '8000', '200', 'no', 'Not Applicable', 'yes', '101394072650', '14000', ' CNZPA5047F ', '338087080383', 'State Bank Of India', 'Amethi', '36132203039', 'SBIN0001158', 0, 0, 1, '2024-08-07 00:22:33', 1, '2024-11-08 09:53:47'),
(29, '24/00029', 'beh-033', 'BEH 033', 'Nitesh Gurjar', 'bright', '5TH STANDARDPASS', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '1', 'Indore', ' riteshgurjar4372@gmail.com ', '8827672424', '6', '1993-01-01', '2022-01-01', 'active', '', '', '', '', '', 'NO6', 'HARDA', 'HARDA ', 'HARDA ', '461331', '', '', '', '', '', '', '', '', '16000', '8000', '200', 'no', 'Not Applicable', 'yes', '101777016329', '15000', ' DGQPG1941D ', '305374844047', 'Canara Bank', 'Harda', '4117101000884', 'CNRB0004117', 0, 0, 1, '2024-08-07 00:27:13', 1, '2024-11-08 10:14:59'),
(30, '24/00030', 'beh-034', 'BEH 034', 'Omprakash', 'bright', '5TH STANDARDPASS', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '5', 'Indore', ' omprakashsitole84@gmail.com ', '9644137920', '3', '1990-01-01', '2022-01-01', 'active', '', '', '', '', '', 'NO72', 'GRNM KILODA', 'KANNOD', 'DEWAS', '455332', '', '', '', '', '', '', '', '', '16000', '8000', '200', 'no', 'Not Applicable', 'yes', '101777016291', '15000', ' ABYPO1785H ', '896395578125', 'TAMILNAD MERCANTILE BANK LTD', 'INDORE', '444100050301038', 'TMBL0000444', 0, 0, 1, '2024-08-07 00:33:30', 1, '2024-11-08 10:15:15'),
(31, '24/00031', 'beh-035', 'BEH 035', 'Pushpendra Umath', 'bright', '12TH STANDARD PASS', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '1', 'Indore', ' thakur96rahul@gmail.com ', '9074125307', '3', '1996-06-30', '2022-01-01', 'active', '', '', '', '', '', '160', '', 'INDORE', '', '453555', '', '', '', '', '', '', '', '', '17000', '8000', '200', 'no', 'Not Applicable', 'yes', '101431668668', '15000', ' AGQPU3058C ', '427298282713', 'Punjab National Bank', 'Indore', '4622000400005702', 'PUNB0462200', 0, 0, 1, '2024-08-07 00:35:50', 1, '2024-11-08 10:18:03'),
(32, '24/00032', 'beh-039', 'BEH 039', 'Ghanshyam', 'bright', '10TH STANDARD PASS', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '1', 'Indore', ' gshah2282@gmail.com ', '9892698550', '6', '1989-03-07', '2022-11-01', 'active', '', '', '', '', '', '415', 'AYODHA COMPLEX', 'THANE WEST MUMBAI', 'THANE', '400604', '', '', '', '', '', '', '', '', '21000', '8000', '200', 'no', 'Not Applicable', 'yes', '101893490487', '15000', ' BOWPS6154J ', '389717491337', ' BHARAT BANK ', 'GOVANDI', '1410100127476', 'BCBM000015', 0, 0, 1, '2024-08-22 06:25:43', 1, '2024-11-08 10:08:49'),
(33, '24/00033', 'beh-043', 'BEH 043', 'Dheraj', 'bright', '12TH STANDARD PASS', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '1', 'Indore', '', '9621725806', '6', '2005-05-10', '2022-12-01', 'active', '', '', '', '', '', '52', '', 'BALLIA DARIYAPUR', 'BALLIA ', '277502', '', '', '', '', '', '', '', '', '15000', '5000', '200', 'yes', '1817325657', 'yes', '101902897640', '15000', ' HYYPD1530D ', '213404515950', 'UNION BANK OF INDIA ', 'CHITBARAGAON', '712902120002505', 'UBFN0571296', 0, 0, 1, '2024-08-22 06:28:59', 1, '2024-11-08 10:04:44'),
(34, '24/00034', 'beh-046', 'BEH 046', 'Gaurav Yadav', 'bright', '5TH STANDARDPASS', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '1', 'Indore', '', '9329037015', '6', '2004-01-03', '2023-04-03', 'active', '', '', '', '', '', '5', 'RETHI ROAD', 'OBEDULLAGANJ', 'RAISEN', '464993', '', '', '', '', '', '', '', '', '15000', '4000', '200', 'yes', '1017466310', 'yes', '101937727413', '15000', ' BNPPY1666P ', '562532220357', 'CANARA BANK', 'OBEDULLAGANJ', '110117774354', 'CNRB0006076', 0, 0, 1, '2024-08-22 06:31:48', 1, '2024-11-08 10:08:26'),
(35, '24/00035', 'beh-007', 'BEH 007', 'Munna Kumar Singh', 'bright', '5TH STANDARDPASS', 'employee', '202cb962ac59075b964b07152d234b70', 'mumbai', '13', 'Mumbai', 'msingh362436@gmail.com', '7738542303', '3', '1983-10-01', '2019-04-01', 'active', '', '', '', '', '', '', 'HASAPURA SONNATHU', 'BIHAR', 'AURANGABAD', '824115', '', '', '', '', '', '', '', '', '19000', '8000', '200', 'no', 'Not Applicable', 'yes', '101447717389', '15000', 'DDPPS90975', '902775525512', 'TAMILNAD MERCANTILE BANK LTD', 'CHEMBUR', '218100720600101', 'TMBL0000218', 0, 0, 1, '2024-08-22 06:34:54', 1, '2024-11-08 10:14:08'),
(36, '24/00036', 'beh-014', 'BEH 014', 'Prins Kumar', 'bright', '10TH STANDARD PASS', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '5', 'Indore', ' princemaurya7071341008@gmail.com ', '7071341008', '6', '', '2019-04-01', 'active', '', '', '', '', '', '101', 'MAURYA BHAVAN', 'AMETHI CITY', 'AMETHI', '227405', '', '', '', '', '', '', '', '', '22000', '8000', '200', 'no', 'Not Applicable', 'yes', '101447716720', '15000', ' EXVPK4254G ', '855008805154', 'BANK OF BARODA ', 'AMETHI', '8820100034965', 'BARB0AMETHI', 0, 0, 1, '2024-08-22 06:38:35', 1, '2024-11-08 10:17:24'),
(37, '24/00037', 'beh-009', 'BEH 009', 'C Anbujothi', 'bright', 'DIPLOMO EEE', 'employee', '202cb962ac59075b964b07152d234b70', 'chennai', '7', 'Tamil Nadu', ' anbuj4768@gmail.com  ', '9159499134', '2', '1978-04-29', '2019-04-01', 'active', '', '', '', '', '', '116/1', 'MATHUR ROAD ', 'VIRUDHACHALAM', 'CUDDALORE', '606104', '', '', '', '', '', '', '', '', '18000', '8000', '200', 'no', 'Not Applicable', 'yes', '101447717410', '15000', ' CYHPA8422M ', '246421000106', 'INDIAN OVERSEAS BANK ', 'ALADI', '109101000009379', 'IOBA 0001094', 0, 0, 1, '2024-08-22 06:51:38', 1, '2024-11-08 10:02:55'),
(38, '24/00038', 'beh-012', 'BEH 012', 'Jwala Singh', 'bright', '8TH ', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '5', 'Indore', '', '9135934141', '6', '1984-01-01', '2019-04-01', 'active', '', '', '', '', '', '', 'SONHATHU', 'AURANGAPAD', 'AURANGAPAD', '824115', '', '', '', '', '', '', '', '', '17000', '8000', '200', 'no', 'Not Applicable', 'yes', '100178879892', '15000', ' EUAPS4567Q ', '377026995340', 'TAMILNAD MERCANTILE BANK LTD', 'PALLAVARAM ', '210100050304981', 'TMBL0000210', 0, 0, 1, '2024-08-22 06:54:52', 1, '2024-11-08 10:10:22'),
(39, '24/00039', 'beh-024', 'BEH 024', 'Elangovan A', 'bright', '10 th', 'employee', '202cb962ac59075b964b07152d234b70', 'chennai', '6', 'Tamil Nadu', ' iniyainiya008@gmail.com  ', '9600332995', '6', '1984-05-11', '2019-08-01', 'active', '', '', '', '', '', '233A', 'SOUTH STREET', 'KATTUMANNARKOIL', 'CUDDALORE', '608302', '', '', '', '', '', '', '', '', '15000', '8000', '200', 'no', 'Not Applicable', 'yes', '101496274540', '15000', ' AEHPE7314L ', '270919480306', 'INDIAN BANK', 'KATTUMANNARKOIL', '6119254948', 'IDIB000K030', 0, 0, 1, '2024-08-24 09:50:56', 1, '2024-11-08 10:04:58'),
(40, '24/00040', 'beh-036', 'BEH036', 'Appuvelangkanni C', 'bright', 'ITI', 'complaint_management', '202cb962ac59075b964b07152d234b70', 'chennai', '6', 'Tamil Nadu', ' appuyt0007@gmail.com ', '9363174843', '6', '2002-05-12', '2022-10-01', 'active', '', '', '', '', '', '204', 'EAST STREET', 'ULUNDURPET', 'VILLUPURAM ', '607204', '', '', '', '', '', '', '', '', '15000', '6000', '200', 'yes', '5133900943b', 'yes', '101884118483', '15000', ' ESBPA4811A ', '866338965709', 'CITY UNION BANK', 'CIUB0000075', '500101013176075', 'CIUB0000075', 0, 0, 1, '2024-08-24 09:55:11', 1, '2024-11-11 06:26:35'),
(41, '24/00041', 'ggcc-114', 'GGCC114', 'TABREJ ALAM', 'ggcc', '12TH STANDARD PASS', 'employee', '202cb962ac59075b964b07152d234b70', 'mumbai', '3', 'Mumbai', 'Tabrejmusarraf96@gmail.com', '8355857114', '6', '1991-02-04', '2019-12-01', 'active', '', '', '', '', '', '02', '', 'SHEOHAR', 'SHEOHAR', '843334', '', '', '', '', '', '', '', '', '15000', '2000', '200', 'yes', 'Not Applicable', 'yes', '101547056712', '15000', 'CUCPA1348D', '560779756386', 'TAMILNAD MERCANTILE BANK LTD', 'CHEMBUR', '218149987552984', 'TMBL0000218', 0, 0, 1, '2024-08-30 00:15:40', 1, '2024-11-10 14:37:33'),
(42, '24/00042', 'beh', 'BEH', 'SADHITYA KUMAR ARK', 'bright', 'INTERMEDIATE', 'employee', '202cb962ac59075b964b07152d234b70', 'north', '3', 'Maharashtra', 'monusinghrajputra9934@gmail.com', '9934658506', '6', '2004-02-02', '2024-07-01', 'active', '', '', '', '', '', '42', 'RAMNAGAR', 'OBRA', 'AURANGABAD', '824124', '', '', '', '', '', '', '', '', '15000', '5000', '200', 'yes', '123', 'yes', '123', '15000', 'FKPPA1774P', '827254577858', 'STATE BANK OF INDIA', 'OBRA', '43097252344', 'SBIN0012601', 0, 0, 1, '2024-08-30 00:21:40', 1, '2024-10-16 07:12:28'),
(43, '24/00043', 'beh-041', 'BEH 041', 'Amaladas C', 'bright', '10TH STANDARD PASS', 'employee', '202cb962ac59075b964b07152d234b70', 'chennai', '6', 'Tamil Nadu', ' amaladassamalac199@gmail.com ', '8939253308', '3', '1991-02-16', '2022-11-01', 'active', '', '', '', '', '', '16', 'NORTH STREET', 'VIRUDHACHALAM', 'CUDDALORE', '606104', '', '', '', '', '', '', '', '', '18000', '8000', '200', 'no', 'Not Applicable', 'yes', '101577917503', '15000', ' CTQPC9947K ', '8939253308', 'CANARA BANK', 'PUVANUR', '1671101020607', 'CNRB0001671', 0, 0, 1, '2024-08-30 05:36:21', 1, '2024-11-08 09:53:14'),
(44, '24/00044', 'beh-049', 'BEH 049', 'RAJESHKUMAR R', 'bright', 'ITI', 'employee', '202cb962ac59075b964b07152d234b70', 'chennai', '6', 'Tamil Nadu', ' rajeshvijay072@gmail.com ', '9597138898', '6', '2000-05-27', '2023-09-01', 'active', '', '', '', '', '', '2*/127', 'RANGAN STREET', 'UTHAMASOZHAMANGALAM', 'CUDDALORE', '608002', '', '', '', '', '', '', '', '', '15000', '5000', '200', 'yes', '5135229884', 'yes', '102002261595', '15000', ' FTCPR0859G ', '703602796711', 'INDIAN BANK', 'ANNAMALAI NAGAR', '6365640261', 'IDIB000A024', 0, 0, 1, '2024-08-31 05:19:46', 1, '2024-11-08 10:18:52'),
(45, '24/00045', 'beh-052', 'BEH 052', 'Mathura Nayagam Athisayam', 'bright', '8th', 'employee', '202cb962ac59075b964b07152d234b70', 'mumbai', '3', 'Tamil Nadu', ' athisayam.nadar@gmail.com ', '9833804577', '6', '1990-01-18', '2023-10-01', 'active', '', '', '', '', '', '3-/17', 'CSI KOIL STREET ', 'TIRUNELVELI', 'TIRUNELVELI', '627357', '', '', '', '', '', '', '', '', '16000', '8000', '200', 'no', 'Not Applicable', 'yes', '100712674063', '15000', ' ARVPA8765A ', '826941105631', 'ICICI ', 'TIRUNELVELI', '003501571913', 'ICIC0006135', 0, 0, 1, '2024-08-31 05:24:26', 1, '2024-11-08 10:12:58'),
(46, '24/00046', 'beh-054', 'BEH 054', 'Raj Kumar ', 'bright', 'DIPLOMO EEE', 'employee', '202cb962ac59075b964b07152d234b70', 'chennai', '6', 'Tamil Nadu', ' eeeraji103@gmail.com  ', '6381190197', '6', '1997-05-05', '2024-01-01', 'active', '', '', '', '', '', '40', 'ROAD STREET', 'KATTUMANNARKOIL', 'CUDDALORE', '608302', '', '', '', '', '', '', '', '', '14000', '8000', '200', 'no', 'Not Applicable', 'yes', '101547069375', '14000', ' EPYPR4190M ', '548048232168', 'INDIAN BANK ', 'LALPET', '6372735619', 'IDIB000L001', 0, 0, 1, '2024-08-31 05:26:54', 1, '2024-11-08 10:18:39'),
(47, '24/00047', 'non', 'NON ', 'Amin Kumar ', 'bright', '', 'employee', '202cb962ac59075b964b07152d234b70', 'south', '6', '', ' amkuki@gmail.com  ', '7544953204', '6', '2001-05-24', '2024-08-01', 'active', '', '', '', '', '', '', 'ward no-1 , amaraurkritpur', 'AMARURKRITPUR', 'BEGUSARAI', '851134', '', '', '', '', '', '', '', '', '12000', '8000', '200', 'no', 'Not Applicable', 'no', 'Not Applicable', '0', ' IAOPK9743N ', '874993965491', 'MADHYA BIHAR GRAMIN BANK', 'BEGUSARAI', '38430410056391', 'PUNBOMBGB06', 0, 0, 1, '2024-08-31 05:29:55', 0, NULL),
(48, '24/00048', 'ggcc-133', 'GGCC133', 'Awadhesh Rajbhar', 'ggcc', '', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '1', 'Indore', ' avdheskumar018@gmail.com ', '8765741326', '6', '1988-01-01', '2022-06-01', 'active', '', '', '', '', '', 'NO19', 'DARIYAPUR', 'BALLIA', 'BALLIA', '277502', '', '', '', '', '', '', '', '', '19000', '8000', '200', 'no', 'Not Applicable', 'yes', '101190146261', '15000', ' DKXPR1457N ', '71922646068', 'STATE BANK OF INDIA', 'DARIYAPUR', '32377833957', ' SBIN0002537 ', 0, 0, 1, '2024-08-31 05:32:44', 1, '2024-11-08 09:54:12'),
(49, '24/00049', 'beh-086', 'BEH 086', 'Ram Khelavan Verma ', 'ggcc', '', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '1', 'Indore', '', '9580616025', '6', '1984-02-01', '2023-07-14', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '15000', '8000', '200', 'no', 'Not Applicable', 'yes', '9580616025', '15000', ' CYKPK4094E ', '354155582887', 'STATE BANK OF INDIA', 'LAMBUVA', '37140174188', ' SBIN0011331 ', 0, 0, 1, '2024-08-31 05:35:08', 1, '2024-11-08 10:19:05'),
(50, '24/00050', 'ggcc-043', 'GGCC043', 'NILESH G SAVRATKAR', 'ggcc', 'S S C PASS', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '5', 'Mumbai', 'Nileshsavratkar62@gmail.com', '8652007366', '2', '1977-08-22', '2010-11-01', 'active', '', '', '', '', '', '67', '27 CP TALAV ,WAGLE ESTATE ', 'THANE', 'THANE', '400604', '', '', '', '', '', '', '', '', '21000', '8000', '200', 'no', 'Not Applicable', 'yes', '100255467057', '15000', 'AYBPS1577P', '256751120516', 'TAMILNAD MERCANTILE BANK LTD', 'CHEMBUR', '2181007206600099', 'TMBL0000218', 0, 0, 1, '2024-09-07 01:45:53', 1, '2024-11-08 10:14:46'),
(51, '24/00051', 'ggcc-091', 'GGCC091', 'P. ARUMUGAKANI RAJA', 'ggcc', 'DIPLOMO EEE', 'employee', '202cb962ac59075b964b07152d234b70', 'chennai', '10', 'Tamil Nadu', ' arumugakaniraj875@gmail.com ', '7708134829', '6', '1977-01-19', '2016-09-01', 'active', '', '', '', '', '', '2*/405', 'OLD POST OFFICE STREET', 'KARUTHAPILLAIYUR', 'TENKASI', '627418', '', '', '', '', '', '', '', '', '20000', '8000', '200', 'no', 'Not Applicable', 'yes', '100923175836', '15000', ' CHUPA7102E ', '205789703548', 'TAMILNAD MERCANTILE BANK LTD', 'VICKRAMASINGAPURAM ', '409100050302857', ' TMBL0000409 ', 0, 0, 1, '2024-09-09 04:39:34', 1, '2024-11-08 10:15:49'),
(52, '24/00052', 'ggcc-104', 'GGCC104', 'Santosh Kumar', 'ggcc', '', 'employee', '202cb962ac59075b964b07152d234b70', 'mumbai', '11', 'Indore', '', '9561676004', '3', '', '2019-04-01', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '19000', '8000', '200', 'no', 'Not Applicable', 'yes', '101446403273', '15000', '123', '123', 'TAMILNAD MERCANTILE BANK LTD', 'CHEMBUR', '218100050302610', 'TMBL0000218', 0, 0, 1, '2024-09-09 05:24:49', 1, '2024-11-08 10:20:09'),
(53, '24/00053', 'beh-057', 'BEH 057', 'PRITAM CHADAR', 'bright', '', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '1', 'Tamil Nadu', 'xyz', '123', '6', '', '2024-07-01', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '16000', '8000', '200', 'no', 'Not Applicable', 'yes', '102103548750', '15000', '0', '0', '0', '0', '0', '0', 0, 0, 1, '2024-09-09 06:29:56', 1, '2024-11-08 10:17:45'),
(54, '24/00054', 'ggcc-119', 'GGCC119', 'Guddu Rajbhar', 'ggcc', 'ILLIRATE ', 'employee', '202cb962ac59075b964b07152d234b70', 'indore', '1', 'Indore', ' gaddurajbhr942@gmail.com ', '9167704907', '6', '1983-01-01', '2020-03-02', 'active', '', '', '', '', '', '14', 'DARIYAPUR', 'BALLIA', 'BALLIA', '277502', '', '', '', '', '', '', '', '', '16000', '8000', '200', 'no', 'Not Applicable', 'yes', '101572420729', '15000', ' CYTPR1937E ', '3449096944174', 'STATE BANK OF INDIA', 'CHITBARAGAON', '32356886132', ' SBIN0002537 ', 0, 0, 1, '2024-09-09 06:41:13', 1, '2024-11-08 10:09:35'),
(55, '24/00055', 'ggcc-07', 'GGCC07', 'DEVASAHAYA RAVI', 'ggcc', '', 'employee', '202cb962ac59075b964b07152d234b70', 'chennai', '6', 'Tamil Nadu', 'dsravigeorge@gmail.com', '9930555886', '1', '1980-07-19', '2005-11-01', 'active', '', '', '', '', '', 'ROOM NO 15, C WING HANUMAN NAGAR,', 'KALYAN EAST , KATEMANIVALLI ', 'KALYAN', 'THANE', '421306', '', '', '', '', '', '', '', '', '35000', '25000', '200', 'no', 'Not Applicable', 'yes', '100133880659', '35000', 'AODPA8868D', '670921373473', 'TAMILNAD MERCANTILE BANK LTD', 'CHEMBUR', '218109930555886', 'TMBL0000218', 0, 0, 1, '2024-09-13 04:10:41', 1, '2024-11-08 10:04:13'),
(56, '24/00056', 'ggcc-134', 'GGCC 134', 'MD IRFAN', 'ggcc', '', 'employee', 'e10adc3949ba59abbe56e057f20f883e', 'indore', '1', 'Indore', '', '7654104841', '6', '', '2022-06-01', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '13000', '1000', '200', 'yes', '3123896384', 'yes', '101563463746', '13000', 'XYZ', '123', 'STATE BANK OF INDIA', 'AUNSI', '40253671697', 'SBIN0017454', 0, 0, 1, '2024-10-16 01:54:24', 1, '2024-11-08 10:13:53'),
(57, '24/00057', 'ggcc-087', 'GGCC 087', 'Uday Sakharam Mungekar', 'ggcc', '', 'employee', 'e10adc3949ba59abbe56e057f20f883e', 'mumbai', '13', 'Mumbai', '', '9076340727', '6', '', '2019-02-01', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '15500', '1500', '200', 'yes', '3111404241', 'yes', '100867251594', '15000', 'XYZ', '123', 'TAMILNAD MERCANTILE BANK LTD', 'VASHI', '117100050302705', 'TMBL0000117', 0, 0, 1, '2024-10-16 01:58:17', 1, '2024-11-08 10:20:35'),
(58, '24/00058', 'beh-001', 'BEH001', 'KISHOR RAJARAM PARTE', 'bright', '', 'employee', 'e10adc3949ba59abbe56e057f20f883e', 'mumbai', '13', 'Mumbai', 'ABC', '9820277166', '4', '', '2019-04-01', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '25000', '15000', '200', 'no', 'Not Applicable', 'yes', '101447716731', '25000', 'XYZ', '123', 'TAMILNAD MERCANTILE BANK LTD', 'CHEMBUR', '218100050300353', 'TMBL0000218', 0, 0, 1, '2024-10-16 02:16:34', 1, '2024-11-11 06:32:15'),
(59, '24/00059', 'beh-045', 'BEH 045', 'Md Amanullah', 'bright', '', 'employee', 'e10adc3949ba59abbe56e057f20f883e', 'indore', '5', 'Mumbai', '', '8928291951', '6', '', '2023-04-01', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '15000', '5000', '200', 'yes', '1817466231', 'yes', '101716821296', '15000', 'XYZ', '123', 'CENTRAL BANK OF INDIA', ' KOTWA BAZAR', '3834574103', 'CBIN0282514', 0, 0, 1, '2024-10-16 02:20:43', 1, '2024-11-08 10:13:36');

-- --------------------------------------------------------

--
-- Table structure for table `employee_payslip`
--

CREATE TABLE `employee_payslip` (
  `id` int NOT NULL,
  `sno` varchar(100) NOT NULL,
  `employee_id` int NOT NULL,
  `employee_code` varchar(100) NOT NULL,
  `joining_date` varchar(50) NOT NULL,
  `employee_name` varchar(250) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `branch_location` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `esi_number` varchar(150) NOT NULL,
  `pf_number` varchar(150) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `bank_name` varchar(250) NOT NULL,
  `account_number` varchar(100) NOT NULL,
  `ifsc_code` varchar(50) NOT NULL,
  `pan_number` varchar(50) NOT NULL,
  `year` varchar(10) NOT NULL,
  `month` varchar(50) NOT NULL,
  `day_count` varchar(10) NOT NULL,
  `present_count` varchar(50) DEFAULT NULL,
  `absent_count` varchar(50) NOT NULL,
  `basic_pay` varchar(50) NOT NULL,
  `month_basic_pay` varchar(50) NOT NULL,
  `allowance_amount` varchar(50) NOT NULL,
  `month_allowance_amount` varchar(50) NOT NULL,
  `ot_count` varchar(50) NOT NULL,
  `ot_amount` varchar(50) NOT NULL,
  `mobile_recharge` varchar(50) DEFAULT NULL,
  `travelling_amount` varchar(50) NOT NULL,
  `incentive_amount` varchar(50) DEFAULT NULL,
  `food_expenses` varchar(10) NOT NULL,
  `pf_status` varchar(50) DEFAULT NULL,
  `pf_amount` varchar(50) DEFAULT NULL,
  `month_pf_amount` varchar(50) NOT NULL,
  `esi_status` varchar(50) DEFAULT NULL,
  `esi_amount` varchar(50) NOT NULL,
  `advance_cash` varchar(50) DEFAULT NULL,
  `professional_tax` varchar(50) NOT NULL,
  `total_earning` varchar(50) DEFAULT NULL,
  `deduction_amount` varchar(50) NOT NULL,
  `salary_amount` varchar(50) DEFAULT NULL,
  `salary_in_word` text NOT NULL,
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
(121, '24/00121', 59, 'BEH 045', '2023-04-01', 'Md Amanullah', 'Asst Technician', 'Maharashtra', '1817466231', '101716821296', 'bright', 'CENTRAL BANK OF INDIA', '3834574103', 'CBIN0282514', 'XYZ', '2024', 'october', '31', '31', '0', '15000', '15000', '5000', '5000', '0', '0', '200', '0', '0', '0', 'yes', '15000', '1800', 'yes', '152', '0', '0', '20200', '1952', '18248', 'eighteen thousand two hundred forty eight ', 0, 1, '2024-11-08 00:39:12', 0, NULL),
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
(144, '24/00144', 55, 'GGCC07', '2005-11-01', 'DEVASAHAYA RAVI', 'Manager', 'Tamil Nadu', 'Not Applicable', '100133880659', 'ggcc', 'TAMILNAD MERCANTILE BANK LTD', '218109930555886', 'TMBL0000218', 'AODPA8868D', '2024', 'august', '31', '31', '0', '35000', '35000', '25000', '25000', '0', '0', '200', '0', '0', '0', 'yes', '35000', '4200', 'no', '0', '0', '0', '60200', '4200', '56000', 'fifty six thousand', 0, 1, '2024-11-13 05:12:13', 0, NULL);

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
(6, '2024', '2024-09-30', 6, 'Poor', 'NO INFORM', 2024, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

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
(1, '24/00001', 3, 'ggcc', 1, '2024-08-31', '01', '', '', '1000', '2024-08-31', '2025-08-31', '1/M/VAS/24-25', '', '1000', '', 'taxinvoice', 'ongoing', 1, 1, '2024-08-31 04:11:54', 0, '0000-00-00 00:00:00'),
(2, '24/00002', 3, 'ggcc', 1, '2024-08-31', '2', '', '', '2000', '2024-08-31', '2025-08-31', '2', '', '2000', '', 'taxinvoice', 'ongoing', 1, 1, '2024-08-31 04:15:28', 0, '0000-00-00 00:00:00'),
(3, '24/00003', 3, 'ggcc', 3, '2024-07-01', '01', '', '', '327105.41', '2024-07-17', '2025-07-17', '3/M/VAS/24-25', '', '327105.41', '', 'taxinvoice', 'ongoing', 0, 1, '2024-08-31 04:25:06', 1, '2024-08-31 09:56:04'),
(4, '24/00004', 3, 'ggcc', 3, '2024-08-02', '03', '', '', '383419.09', '2024-08-26', '2025-08-26', '4/M/VAS/24-25', '', '383419.09', '', 'taxinvoice', 'ongoing', 0, 1, '2024-08-31 04:27:43', 0, '0000-00-00 00:00:00'),
(5, '24/00005', 3, 'ggcc', 3, '2024-08-06', '04', '', '', '263400.49', '2024-08-26', '2025-08-26', '5/M/VAS/24-25', '', '263400.49', '', 'taxinvoice', 'ongoing', 0, 1, '2024-08-31 04:29:04', 0, '0000-00-00 00:00:00'),
(6, '24/00006', 3, 'ggcc', 3, '2024-08-08', '05', '', '', '81178.5', '2024-08-27', '2025-08-27', '6/M/VAS/24-25', '', '81178.5', '', 'taxinvoice', 'ongoing', 0, 1, '2024-08-31 04:30:42', 0, '0000-00-00 00:00:00'),
(7, '24/00007', 3, 'ggcc', 3, '2024-08-13', '07', '', '', '210137.43', '2024-08-28', '2025-08-28', '8/M/VAS/24-25', '', '210137.43', '', 'taxinvoice', 'ongoing', 0, 1, '2024-08-31 04:31:33', 0, '0000-00-00 00:00:00'),
(8, '24/00008', 3, 'ggcc', 3, '2024-08-20', '11', '', '', '166355.22', '2024-08-28', '2025-08-28', '9/M/VAS/24-25', '', '166355.22', '', 'taxinvoice', 'ongoing', 0, 1, '2024-08-31 04:32:08', 0, '0000-00-00 00:00:00'),
(9, '24/00009', 3, 'ggcc', 3, '2024-08-10', '06', '', '', '215135.24', '2024-08-29', '2025-08-29', '10/M/VAS/24-25', '', '215135.24', '', 'taxinvoice', 'ongoing', 0, 1, '2024-08-31 04:32:38', 0, '0000-00-00 00:00:00'),
(10, '24/00010', 3, 'ggcc', 3, '2024-08-13', '10', '', '', '253899.96', '2024-08-29', '2025-08-29', '11/M/VAS/24-25', '', '253899.96', '', 'taxinvoice', 'ongoing', 0, 1, '2024-08-31 04:33:10', 0, '0000-00-00 00:00:00'),
(11, '24/00011', 3, 'ggcc', 3, '2024-07-20', '02/M/VAS/24-25', '', '', '404392.65', NULL, NULL, NULL, '', '', '', 'estimation', 'ongoing', 0, 1, '2024-08-31 04:51:13', 1, '2024-09-23 07:46:49'),
(12, '24/00012', 3, 'ggcc', 3, '2024-08-08', '08/M/VAS/24-25', '', '', '316717.69', '2024-09-16', '2025-09-16', '19/M/VAS/24-25', '', '316717.69', '', 'taxinvoice', 'ongoing', 0, 1, '2024-09-06 05:40:58', 1, '2024-09-23 07:47:41'),
(13, '24/00013', 3, 'ggcc', 3, '2024-08-08', '8A/M/VAS/24-25', '', '', '252378.74', '2024-09-16', '2025-09-16', '20/M/VAS/24-25', '', '252378.74', '', 'taxinvoice', 'ongoing', 0, 1, '2024-09-06 05:41:53', 1, '2024-09-23 07:48:25'),
(14, '24/00014', 3, 'ggcc', 3, '2024-09-04', '16/M/VAS/24-25', '', '', '47058.21', '2024-09-16', '2025-09-16', '18/M/VAS/24-25', '', '47058.21', '', 'taxinvoice', 'ongoing', 0, 1, '2024-09-06 05:45:12', 1, '2024-09-23 07:48:54'),
(15, '24/00015', 3, 'ggcc', 3, '2024-09-04', '17/M/VAS/24-25', './uploads/job_report/17_hpcl_-_various_outlets_flpfitting_-_vashi_ro241002093037.xls', '', '69203.41', NULL, NULL, NULL, '', '', '', 'estimation', 'ongoing', 0, 1, '2024-09-06 05:45:50', 1, '2024-10-02 09:30:37'),
(16, '24/00016', 3, 'ggcc', 3, '2024-09-04', '18/M/VAS/24-25', './uploads/job_report/18hpcl_-_saipetroleumkatai_-_vashi_robillno26241002092600.xls', '', '55751.24', '2024-09-23', '2025-09-23', '26/M/VAS/24-25', '', '55751.24', './uploads/invoice_doc/26hpcl_-_saipetroleumkatai_-_vashi_ro241002092813.pdf', 'taxinvoice', 'ongoing', 0, 1, '2024-09-06 05:46:20', 1, '2024-10-02 09:26:00'),
(17, '24/00017', 3, 'ggcc', 3, '2024-09-04', '19/M/VAS/24-25', '', '', '6574.28', '2024-09-16', '2025-09-16', '19/M/VAS/24-25', '', '6574.28', '', 'taxinvoice', 'ongoing', 0, 1, '2024-09-06 05:47:17', 1, '2024-09-23 07:50:27'),
(18, '24/00018', 3, 'ggcc', 4, '2024-09-06', '123', '', '', '1000', NULL, NULL, NULL, '', '', '', 'estimation', 'ongoing', 1, 1, '2024-09-06 06:14:11', 0, '0000-00-00 00:00:00'),
(19, '24/00019', 6, 'ggcc', 5, '2024-09-15', '1234', '', '', '123', NULL, NULL, NULL, '', '', '', 'estimation', 'ongoing', 1, 1, '2024-09-15 11:24:01', 0, '0000-00-00 00:00:00'),
(20, '24/00020', 7, 'ggcc', 11, '2024-09-17', '7', '', '', '430249.24', NULL, NULL, NULL, '', '', '', 'estimation', 'ongoing', 0, 1, '2024-09-17 19:03:17', 0, '0000-00-00 00:00:00'),
(21, '24/00021', 7, 'ggcc', 11, '2024-07-01', '16T', '', '', '234261.62', NULL, NULL, NULL, '', '', '', 'estimation', 'ongoing', 0, 1, '2024-09-17 19:05:27', 0, '0000-00-00 00:00:00'),
(22, '24/00022', 7, 'ggcc', 11, '2024-07-01', '17T', '', '', '278462.06', NULL, NULL, NULL, '', '', '', 'estimation', 'ongoing', 0, 1, '2024-09-17 19:07:07', 0, '0000-00-00 00:00:00'),
(23, '24/00023', 7, 'ggcc', 11, '2024-07-01', '18T', '', '', '377803.90', NULL, NULL, NULL, '', '', '', 'estimation', 'ongoing', 0, 1, '2024-09-17 19:08:10', 1, '2024-09-18 00:39:27'),
(24, '24/00024', 11, 'bright', 16, '2024-09-21', '2', '', '', '750', '2024-09-26', '2025-09-26', '12', '', '750', '', 'taxinvoice', 'ongoing', 0, 1, '2024-09-21 00:01:25', 0, '0000-00-00 00:00:00'),
(25, '24/00025', 3, 'ggcc', 4, '2024-08-13', '09/M/VAS/24-25', '', '', '41618.19', '2024-08-27', '2025-08-27', '7/M/VAS/24-25', '', '41618.19', '', 'taxinvoice', 'ongoing', 0, 1, '2024-09-23 01:56:31', 0, '0000-00-00 00:00:00'),
(26, '24/00026', 3, 'ggcc', 4, '2024-09-02', '14/M/VAS/24-25', '', '', '26680.12', NULL, NULL, NULL, '', '', '', 'estimation', 'ongoing', 0, 1, '2024-09-23 02:05:47', 0, '0000-00-00 00:00:00'),
(27, '24/00027', 3, 'ggcc', 4, '2024-09-02', '15/M/VAS/24-25', '', '', '23700.97', NULL, NULL, NULL, '', '', '', 'estimation', 'ongoing', 0, 1, '2024-09-23 02:06:15', 0, '0000-00-00 00:00:00'),
(28, '24/00028', 3, 'bright', 25, '2024-09-04', '20/M/VAS/24-25', '', '', ' 8,765.70 ', NULL, NULL, NULL, '', '', '', 'estimation', 'ongoing', 1, 1, '2024-09-23 02:21:13', 0, '0000-00-00 00:00:00'),
(29, '24/00029', 3, 'ggcc', 3, '2024-09-04', '20/M/VAS/24-25', './uploads/job_report/20hpcl_-_shahidmukeshjadhavpetroleum_-_vashi_robillno27241002092246.xls', '', '5074.85', '2024-08-23', '2025-08-23', '28/M/VAS/24-25', '', '5074.85', './uploads/invoice_doc/28hpcl_-_shahidmukeshjadhavpetroleum_-_vashi_ro241002092420.pdf', 'taxinvoice', 'ongoing', 0, 1, '2024-09-23 02:22:51', 1, '2024-10-02 09:22:46'),
(30, '24/00030', 3, 'ggcc', 3, '2024-09-04', '21/M/VAS/24-25', '', '', '201472.33', '2024-09-16', '2025-09-16', '17/M/VAS/24-25', '', '201472.33', '', 'taxinvoice', 'ongoing', 0, 1, '2024-09-23 02:23:32', 0, '0000-00-00 00:00:00'),
(31, '24/00031', 3, 'ggcc', 3, '2024-09-04', '22/M/VAS/24-25', '', '', '172584.47', '2024-09-16', '2025-09-16', '21/M/VAS/24-25', '', '172584.47', '', 'taxinvoice', 'ongoing', 0, 1, '2024-09-23 02:24:05', 0, '0000-00-00 00:00:00'),
(32, '24/00032', 3, 'ggcc', 3, '2024-09-04', '23/M/VAS/24-25', '', '', '256680.47', '2024-09-18', '2025-09-18', '22/M/VAS/24-25', '', '256680.47', './uploads/invoice_doc/22_hpcl_-_various_outletssafetyworks_2024_-_vashi_ro241002091502.pdf', 'taxinvoice', 'ongoing', 0, 1, '2024-09-23 02:24:30', 1, '2024-09-27 16:22:46'),
(33, '24/00033', 3, 'ggcc', 3, '2024-09-09', '24/M/VAS/24-25', './uploads/job_report/24hpcl_-_autocarecentresajgoan_-_vashi_ro241002093016.xls', '', '256497.31', NULL, NULL, NULL, '', '', '', 'estimation', 'ongoing', 0, 1, '2024-09-23 02:24:58', 1, '2024-10-02 09:30:16'),
(34, '24/00034', 11, 'ggcc', 15, '2024-10-18', '123', '', '', '1000', '2024-10-18', '2025-10-18', '123', '', '1000', './uploads/invoice_doc/08hpcl_-_various_outlets_-_new_earthpit_making_-_coimbatore_r241018095411.pdf', 'taxinvoice', 'ongoing', 0, 1, '2024-10-18 04:23:22', 0, '0000-00-00 00:00:00'),
(35, '24/00035', 5, 'ggcc', 21, '2024-10-18', '1234', './uploads/job_report/07_hpcl-_various_outlets_cvt_stabilizer_indore_ro(1)billno69241018100210.xls', '', '900', '2024-10-18', '2025-10-18', '1234', '', '900', './uploads/invoice_doc/10_hpcl-_various_outlets_maintenance_job_indore_robillno72241018100426.xls', 'taxinvoice', 'ongoing', 0, 1, '2024-10-18 04:32:10', 0, '0000-00-00 00:00:00'),
(36, '24/00036', 8, 'ggcc', 29, '2024-11-01', '12345', '', '', '1000', '2024-10-31', '2025-10-30', '1230', '', '1000', '', 'taxinvoice', 'ongoing', 0, 1, '2024-11-04 02:10:56', 0, '0000-00-00 00:00:00'),
(37, '24/00037', 13, 'ggcc', 30, '2024-11-04', '033', '', '', '1000', '2024-11-01', '2024-11-01', '1', '', '1000', '', 'taxinvoice', 'ongoing', 0, 1, '2024-11-04 02:44:18', 0, '0000-00-00 00:00:00'),
(38, '24/00038', 8, 'bright', 6, '2024-10-08', '11/TN/24-25/MDU', './uploads/job_report/11_various_outlets_power_conditioner_installation_-_madurai_robillno43241119075927.xls', '', '99871.29', '2024-11-21', '5400179027', ' 43/TN/24-25/MDU', ' 84,636.69 ', '99871.29', './uploads/invoice_doc/43various_outlets_power_conditioner_installation_-_madurai_roest11241119080059.xls', 'taxinvoice', 'ongoing', 0, 1, '2024-11-19 02:29:27', 0, '0000-00-00 00:00:00'),
(39, '24/00039', 8, 'bright', 6, '2024-10-08', '12/TN/24-25/MDU', './uploads/job_report/12_various_outlets_m_r_job_-_madurai_robillno44241119094255.xls', '', '487536.87', '2024-11-21', '5400178989', '44/TN/24-25/MDU', ' 4,13,166.84 ', '487536.87', './uploads/invoice_doc/4412_various_outlets_m_r_job_-_madurai_ro241119094421.xls', 'taxinvoice', 'ongoing', 0, 1, '2024-11-19 04:12:55', 0, '0000-00-00 00:00:00'),
(40, '24/00040', 8, 'bright', 6, '2024-10-08', '13/TN/24-25/MDU', './uploads/job_report/13_various_outlets_esd_installation_-_madurai_ro241119100501.xls', '', '71459.57', '2024-11-21', '5400179036', '45/TN/24-25/MDU', ' 60,558.96 ', '71459.57', './uploads/invoice_doc/45various_outlets_esd_installation_-_madurai_ro1241119101336.xls', 'taxinvoice', 'ongoing', 0, 1, '2024-11-19 04:35:01', 0, '0000-00-00 00:00:00'),
(41, '24/00041', 8, 'bright', 6, '2024-10-08', '14/TN/24-25/MDU', './uploads/job_report/14_hpcl_-_various_outlets_earthpit_testing_-_madurai_robillno46241119101059.xls', '', '96571.25', '2024-11-21', '5400178998', '46/TN/24-25/MDU', ' 81,840.04 ', '96571.25', './uploads/invoice_doc/46hpcl_-_various_outlets_earthpit_testing_-_madurai_ro241119101245.xls', 'taxinvoice', 'ongoing', 0, 1, '2024-11-19 04:40:59', 0, '0000-00-00 00:00:00'),
(42, '24/00042', 3, 'ggcc', 3, '2024-09-30', '26/M/VAS/24-25', './uploads/job_report/26_hpcl_-_saipetroleumkataicngwork_-_vashi_robillno36241119102849.xls', '', '1071827.94', '2024-10-15', '5400168193', '36/M/VAS/24-25', ' 9,08,328.76 ', '1071827.94', './uploads/invoice_doc/36_hpcl_-_saipetroleumkataicngwork_-_vashi_ro241119102944.pdf', 'retention', 'ongoing', 0, 1, '2024-11-19 04:58:49', 0, '0000-00-00 00:00:00');

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
(1, '24/00001', 'mumbai', '3', '13', 'active', 0, 1, '2024-11-09 15:02:41', 1, '2024-11-09 15:02:41'),
(2, '24/00002', 'chennai', '8', '24', 'active', 0, 1, '2024-11-10 13:38:15', 1, '2024-11-10 13:38:15'),
(3, '24/00003', 'chennai', '9', '20', 'active', 0, 1, '2024-11-10 13:39:05', 1, '2024-11-10 13:39:05'),
(4, '24/00004', 'chennai', '10', '51', 'active', 0, 1, '2024-11-10 13:38:41', 1, '2024-11-10 13:38:41'),
(5, '24/00005', 'chennai', '7', '37', 'active', 0, 1, '2024-11-10 13:37:11', 1, '2024-11-10 13:37:11'),
(6, '24/00006', 'mumbai', '3', '12', 'active', 0, 1, '2024-11-09 15:01:21', 1, '2024-11-09 15:01:21'),
(7, '24/00007', 'indore', '2', '14', 'active', 0, 1, '2024-11-10 13:37:54', 1, '2024-11-10 13:37:54'),
(8, '24/00008', 'mumbai', '3', '13', 'active', 1, 1, '2024-11-11 08:16:45', 1, '2024-11-10 13:39:37'),
(9, '24/00009', 'indore', '1', '5', 'active', 0, 1, '2024-11-10 08:13:31', 0, NULL),
(10, '24/00010', 'indore', '1', '31', 'active', 0, 1, '2024-11-10 08:14:44', 0, NULL),
(11, '24/00011', 'indore', '5', '50', 'active', 0, 1, '2024-11-10 08:15:13', 0, NULL),
(12, '24/00012', 'mumbai', '11', '11', 'active', 0, 1, '2024-11-10 08:15:43', 0, NULL),
(13, '24/00013', 'mumbai', '12', '12', 'active', 0, 1, '2024-11-10 08:16:08', 0, NULL),
(14, '24/00014', 'mumbai', '11', '9', 'active', 0, 1, '2024-11-10 08:28:41', 0, NULL);

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
(3, '24/00003', 'j-k-electricals-indore', 'ggcc', 'J K ELECTRICALS INDORE', 'no', 'active', 0, 1, '2024-10-03 03:48:07', 0, NULL),
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
(18, '24/00018', 'abhay-collection', 'bright', 'ABHAY COLLECTION', 'no', 'active', 0, 1, '2024-10-19 04:04:17', 0, NULL);

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
(1, 'loan', 'DEVA RAJAN', 'LOAN', 'active', 0, 1, '2024-11-11', 0, '0000-00-00'),
(2, 'deva-rajan', 'GGCC', 'DEVA RAJAN', 'active', 0, 1, '2024-11-11', 0, '0000-00-00');

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
  `expected_delivery_date` date NOT NULL,
  `from_location` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `to_location` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `material_name` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `sender_name` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `sender_number` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `receiver_name` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `receiver_number` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `pay_type` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_amt` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
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

INSERT INTO `material_shipping` (`id`, `shipping_date`, `expected_delivery_date`, `from_location`, `to_location`, `material_name`, `sender_name`, `sender_number`, `receiver_name`, `receiver_number`, `pay_type`, `shipping_amt`, `lr_copy`, `status`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '2024-11-19', '0000-00-00', 'MUMBAI', 'INDORE', 'OTHER (SWEET BOX)', 'MURUGESH', '8097738898', 'DSNND', '8097738899', 'pre_paid', '100', './uploads/lr_copy/tn11ac8991-icici-bright-online241119075842.pdf', 'notreceived', 0, 1, '2024-11-19', 0, '0000-00-00');

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
(3, '24/00003', 'ajay-fuels', 'chennai', '8', '', '', 'AJAY FUELS', 'LALUGAPURAM', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-10 08:23:36', 0, NULL),
(4, '24/00004', 'std-fuels', 'chennai', '7', '', '', 'STD FUELS', 'ARANTHANGI ROAD', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-10 08:26:09', 0, NULL),
(5, '24/00005', 'baba-petroleum', 'mumbai', '11', '', '', 'BABA PETROLEUM', 'VALSAD', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-10 08:28:12', 0, NULL),
(6, '24/00006', 'venkatesh-automobiles', 'mumbai', '3', '', '', 'VENKATESH AUTOMOBILES', 'DOMBBIVLI', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-10 08:31:59', 0, NULL),
(7, '24/00007', 'balaji-petro-services', 'indore', '1', '', '', 'BALAJI PETRO SERVICES', 'MANDLESHWAR ROAD', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-10 08:35:22', 0, NULL),
(8, '24/00008', 'shri-ganesh-petroleum', 'indore', '2', '', '', 'SHRI GANESH PETROLEUM', 'BHOURA', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-10 08:39:26', 0, NULL),
(9, '24/00009', 'rudra-petroleum', 'indore', '5', '', '', 'RUDRA PETROLEUM', 'BISANWADA', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-10 08:43:36', 0, NULL),
(10, '24/00010', 'eagle-automotive', 'chennai', '8', '', '', 'EAGLE AUTOMOTIVE', 'PANANKULAM ', '', '', '', '2024-11-11', '2025-05-10', '', '', '', '', '', '', 'active', 0, 40, '2024-11-13 16:23:00', 0, NULL),
(11, '24/00011', 'savi-transport-earth-movers', 'chennai', '8', '', '', 'SAVI TRANSPORT & EARTH MOVERS ', 'PANAGIDI', '', '', '', '2024-11-12', '2025-05-11', '', '', '', '', '', '', 'active', 0, 40, '2024-11-14 09:59:31', 0, NULL),
(12, '24/00012', 'jk-fuel-service', 'chennai', '8', '', '', 'JK FUEL SERVICE', 'VALLIYUR', '', '', '', '2024-11-12', '2025-05-11', '', '', '', '', '', '', 'active', 0, 40, '2024-11-14 10:01:05', 0, NULL),
(13, '24/00013', 'shankar-agencies', 'chennai', '8', '', '', 'SHANKAR AGENCIES ', 'KAVALKINARU', '', '', '', '2024-11-12', '2025-05-11', '', '', '', '', '', '', 'active', 0, 40, '2024-11-14 10:01:57', 0, NULL),
(14, '24/00014', 'sriram-agency', 'chennai', '9', '', '', 'SRIRAM AGENCY ', 'THEETHIPALAYAM', '', '', '', '2024-11-12', '2025-05-11', '', '', '', '', '', '', 'active', 0, 40, '2024-11-13 16:25:08', 0, NULL),
(15, '24/00015', 'cp-marthachalam-co', 'chennai', '9', '', '', 'CP MARTHACHALAM & CO', 'THADAGAM ROAD', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-12 07:05:11', 0, NULL),
(16, '24/00016', 'sri-saravana-agencies', 'chennai', '9', '', '', 'SRI SARAVANA AGENCIES ADHOC', 'VADAVALLI ', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-16 05:00:12', 1, '2024-11-16 05:00:12'),
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
(31, '24/00031', 'bhairavnath-petroleum-services', 'mumbai', '4', '', '12558920', ' BHAIRAVNATH PETROLEUM SERVICES ', 'LAVANGI', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-15 04:53:13', 0, NULL),
(32, '24/00032', 'the-coimbatore-district-consumers-co-op', 'chennai', '9', '', '', 'THE COIMBATORE DISTRICT CONSUMERS CO -OP ', 'RS PURAM', '', '', '', '2024-11-15', '2025-05-14', '', '', '', '', '', '', 'active', 0, 40, '2024-11-16 10:41:38', 0, NULL),
(33, '24/00033', 'sree-rajarajeshwari-enterprises', 'chennai', '8', '', '', 'SREE RAJARAJESHWARI ENTERPRISES', 'THARUVAI', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-15 07:12:19', 0, NULL),
(34, '24/00034', 'ramani-agencies', 'chennai', '8', '', '', 'RAMANI AGENCIES', 'KISHNAPURAM', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-15 07:13:46', 0, NULL),
(35, '24/00035', 'ashokratna-petroleum', 'mumbai', '4', '', '12540950', 'ASHOKRATNA PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-16 03:55:47', 0, NULL),
(36, '24/00036', 'jai-sai-raj-fuel-fil', 'chennai', '9', '', '', 'JAI SAI RAJ FUEL FIL', 'ANNUR', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-16 05:13:56', 0, NULL),
(37, '24/00037', 'pooviya-agency', 'chennai', '9', '', '', 'POOVIYA AGENCY ', 'COIMBATORE', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-16 05:15:16', 0, NULL),
(38, '24/00038', 'igp-petroleum', 'chennai', '8', '', '', 'IGP PETROLEUM', 'CHITRAMCODE', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-16 05:17:55', 0, NULL),
(39, '24/00039', 'bhosale-patil-highway-services', 'mumbai', '4', '', '12575960', 'BHOSALE PATIL HIGHWAY SERVICES', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-18 00:42:42', 0, NULL),
(40, '24/00040', 'gawade-petroleum', 'mumbai', '4', '', '12175700', ' GAWADE PETROLEUM, ', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-18 00:43:05', 0, NULL),
(41, '24/00041', 'digambarraoji-bagal-petroleum', 'mumbai', '4', '', '11459220', ' DIGAMBARRAOJI BAGAL PETROLEUM, ', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-18 00:43:45', 0, NULL),
(42, '24/00042', 'om-sai-services-kasegaon', 'mumbai', '4', '', '12558970', 'OM SAI SERVICES KASEGAON ', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-18 01:08:27', 0, NULL),
(43, '24/00043', 'pandurang-petroleum-services', 'mumbai', '4', '', '12561720', 'PANDURANG  PETROLEUM SERVICES', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-18 01:09:21', 0, NULL),
(44, '24/00044', 'pant-nagar-petroleum', 'mumbai', '4', '', '12575950', 'PANT NAGAR PETROLEUM, ', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-18 06:40:02', 1, '2024-11-18 06:40:02'),
(45, '24/00045', 'siddhanath-petroleum', 'mumbai', '4', '', '12596460', 'SIDDHANATH PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-18 01:10:51', 0, NULL),
(46, '24/00046', 'shri-hari-highway-services', 'mumbai', '4', '', '12611010', 'SHRI HARI HIGHWAY SERVICES', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-18 01:12:08', 0, NULL),
(47, '24/00047', 'adarsh-anand-shinde-petroleum', 'mumbai', '4', '', '41047736', 'ADARSH ANAND SHINDE PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-18 01:12:33', 0, NULL),
(48, '24/00048', 'sonai-petroleum-services', 'mumbai', '4', '', '41066762', 'SONAI PETROLEUM SERVICES', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-18 01:13:12', 0, NULL),
(49, '24/00049', 'sri-ram-highway-centre', 'mumbai', '4', '', '11019210', 'SRI RAM HIGHWAY CENTRE', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-18 01:13:48', 0, NULL),
(50, '24/00050', 'rahul-petroleum', 'mumbai', '4', '', '11014320', ' RAHUL PETROLEUM', 'PANDARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-18 01:16:04', 0, NULL),
(51, '24/00051', 'uma-agencies', 'chennai', '9', '', '', 'UMA AGENCIES', 'PERIYANAYAKKAN PALAYAM ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-18 07:40:45', 0, NULL),
(52, '24/00052', 'narashimman-agencies', 'chennai', '9', '', '', 'NARASHIMMAN AGENCIES ', 'PN PUDHUR', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-18 07:41:55', 0, NULL),
(53, '24/00053', 's-ramesh-bros', 'chennai', '9', '', '', 'S RAMESH & BROS', 'METTUPALAYAM ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-18 07:43:49', 0, NULL),
(54, '24/00054', 'prsad-co', 'chennai', '9', '', '', 'PRSAD & CO', 'UKKADAM', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-18 07:45:10', 0, NULL),
(55, '24/00055', 'rajkamal-agencies', 'chennai', '9', '', '', 'RAJKAMAL AGENCIES ', 'METTUPALAYAM ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-18 07:46:19', 0, NULL),
(56, '24/00056', 'arushya-fuels', 'chennai', '8', '', '', 'ARUSHYA FUELS ', 'NARIYUTHU', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-18 07:48:39', 0, NULL),
(57, '24/00057', 'devi-fuels', 'chennai', '8', '', '', 'DEVI FUELS ', 'MANOOR', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-18 07:49:47', 0, NULL),
(58, '24/00058', 'indira-rajan-fuels', 'chennai', '8', '', '', 'INDIRA RAJAN FUELS ', 'KANARPATTI', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-18 07:51:08', 0, NULL),
(59, '24/00059', 'amol-petroleum', 'mumbai', '4', '', '11022210', 'AMOL PETROLEUM', 'PANDARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:25:17', 0, NULL),
(60, '24/00060', 'datta-highway-station', 'mumbai', '4', '', '11025110', ' DATTA HIGHWAY STATION', 'PANDARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:25:48', 0, NULL),
(61, '24/00061', 'kade-brothers-agro-auto-centre', 'mumbai', '4', '', '11137010', ' KADE BROTHERS AGRO AUTO CENTRE', 'PANDARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:26:15', 0, NULL),
(62, '24/00062', 'a-r-shah', 'mumbai', '4', '', '11162010', 'A R SHAH', 'PANDARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:26:41', 0, NULL),
(63, '24/00063', 'digamber-petroleum', 'mumbai', '4', '100', '11215310', ' DIGAMBER PETROLEUM', 'PANDARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:27:18', 0, NULL),
(64, '24/00064', 'pandurang-petroleum', 'mumbai', '4', '', '11353610', ' PANDURANG PETROLEUM', 'PANDARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:28:09', 0, NULL),
(65, '24/00065', 'siddhi-petro-oasis', 'mumbai', '4', '', '11459780', ' SIDDHI PETRO OASIS', 'PANDARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:28:40', 0, NULL),
(66, '24/00066', 'sanjay-highway-petroleum', 'mumbai', '4', '', '12174200', ' SANJAY HIGHWAY PETROLEUM', 'PANDARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:29:02', 0, NULL),
(67, '24/00067', 'shri-siddhanath-petroleum', 'mumbai', '4', '', '12174280', ' SHRI SIDDHANATH PETROLEUM', 'PANDARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:29:22', 0, NULL),
(68, '24/00068', 'rituraj-petroleum', 'mumbai', '4', '', '12174290', ' RITURAJ PETROLEUM', 'PANDARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:30:15', 0, NULL),
(69, '24/00069', 'sumit-petroleum', 'mumbai', '4', '', '12174400', ' SUMIT PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:30:53', 0, NULL),
(70, '24/00070', 'hazare-petroleum', 'mumbai', '4', '', '12174440', ' HAZARE PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:31:30', 0, NULL),
(71, '24/00071', 'venkateshwara-fuels', 'mumbai', '4', '', '12174630', ' VENKATESHWARA FUELS', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:32:01', 0, NULL),
(72, '24/00072', 'shree-sai-vitthal-petroleum', 'mumbai', '4', '', '12174680', ' SHREE SAI VITTHAL PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:32:36', 0, NULL),
(73, '24/00073', 'shree-pandurang-petroleum', 'mumbai', '4', '', '12174740', ' SHREE PANDURANG PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:37:11', 0, NULL),
(74, '24/00074', 'p-b-patil-petroleum', 'mumbai', '4', '', '12174750', ' P B PATIL PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:37:35', 0, NULL),
(75, '24/00075', 'kshrisagar-petroleum', 'mumbai', '4', '', '12174780', ' KSHRISAGAR PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:37:56', 0, NULL),
(76, '24/00076', 'abhinav-petroleum-services', 'mumbai', '4', '', '12174790', ' ABHINAV PETROLEUM SERVICES', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:38:16', 0, NULL),
(77, '24/00077', 'sai-petroleum-services', 'mumbai', '4', '', '12174900', ' SAI PETROLEUM SERVICES', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:38:36', 0, NULL),
(78, '24/00078', 'siddharaj-petroleum', 'mumbai', '4', '100', '12175430', ' SIDDHARAJ PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:39:06', 0, NULL),
(79, '24/00079', 'm-k-petroleum', 'mumbai', '4', '', '12175560', ' M K PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:39:37', 0, NULL),
(80, '24/00080', 'phule-petroleum', 'mumbai', '4', '', '12175590', ' PHULE PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:39:56', 0, NULL),
(81, '24/00081', 'gajanan-petroleum', 'mumbai', '4', '', '12175600', ' GAJANAN PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:40:19', 0, NULL),
(82, '24/00082', 'dattatray-petroleum', 'mumbai', '4', '', '12175610', ' DATTATRAY PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:40:39', 0, NULL),
(83, '24/00083', 'kohinoor-petroleum', 'mumbai', '4', '', '12175830', ' KOHINOOR PETROLEUM', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:41:05', 0, NULL),
(84, '24/00084', 'raut-highway-services-12175840', 'mumbai', '4', '', '12175840', ' RAUT HIGHWAY SERVICES, 12175840', 'PANDHARPUR', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'active', 0, 1, '2024-11-19 01:41:30', 0, NULL),
(85, '24/00085', 'selvam-agncies', 'chennai', '9', '', '', 'SELVAM AGNCIES ', 'METTUPALAYAM ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-19 07:23:34', 0, NULL),
(86, '24/00086', 'chavadi-petroleum', 'chennai', '9', '', '', 'CHAVADI PETROLEUM ', 'BIG BAZAAR STREET ', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-19 07:24:42', 0, NULL),
(87, '24/00087', 'palani-andavar-agencies', 'chennai', '9', '', '', 'PALANI ANDAVAR AGENCIES', 'PETHIKUTTAI', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-19 07:25:59', 0, NULL),
(88, '24/00088', 'apn-petroleum', 'chennai', '8', '', '', 'APN PETROLEUM ', 'VENKATESWARAPURAM', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-19 07:28:13', 0, NULL),
(89, '24/00089', 'manis-a1-fuels', 'chennai', '8', '', '', 'MANIS A1 FUELS ', 'EDAIKAL', '', '', '', NULL, '', '', '', '', '', '', '', 'active', 0, 40, '2024-11-19 07:29:13', 0, NULL);

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
  `purchase_zone` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `purchase_date` date NOT NULL,
  `purchase_number` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `purchase_bill` text COLLATE utf8mb4_general_ci NOT NULL,
  `purchase_amount` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `payment_date` date NOT NULL,
  `payment_method` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `payment_bank` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
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

INSERT INTO `party_payment` (`id`, `sno`, `company_name`, `party_id`, `party_name`, `purchase_zone`, `purchase_date`, `purchase_number`, `purchase_bill`, `purchase_amount`, `payment_date`, `payment_method`, `payment_bank`, `status`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '24/00001', 'ggcc', 3, 'J K ELECTRICALS INDORE', '', '2024-10-03', '2395', '', '3370', '2024-10-03', 'bank', 'tmbl', 'paid', 0, 1, '2024-10-03 03:48:57', 0, '0000-00-00 00:00:00'),
(2, '24/00002', 'ggcc', 4, 'HARIPRIYA INDUSTRIAL AND TRADING CO', '', '2024-10-03', '2203', '', '4661', '0000-00-00', '', '', 'unpaid', 0, 1, '2024-10-03 05:11:16', 0, '0000-00-00 00:00:00'),
(3, '24/00003', 'ggcc', 6, 'JAIN INTERNATIONAL CHENNAI', '', '2024-09-16', '19178', '', '19258', '0000-00-00', '', '', 'unpaid', 0, 1, '2024-10-03 05:16:42', 0, '0000-00-00 00:00:00'),
(4, '24/00004', 'bright', 14, 'jayam industries', '', '2024-09-21', '376', '', '12697', '2024-10-03', 'bank', 'tmbl', 'paid', 0, 1, '2024-10-03 05:28:49', 0, '0000-00-00 00:00:00'),
(5, '24/00005', 'ggcc', 15, 'SOMESHWAR TRADING', '', '2024-10-03', '534', '', '1416', '2024-10-03', 'cash', '', 'paid', 0, 1, '2024-10-03 05:54:05', 0, '0000-00-00 00:00:00'),
(6, '24/00006', 'ggcc', 16, 'ARIHANT CABLES', '', '2024-04-11', 'AC/00442/24-25', '', '13080', '2024-07-07', 'bank', 'tmbl', 'paid', 0, 1, '2024-10-18 05:43:20', 0, '0000-00-00 00:00:00'),
(7, '24/00007', 'ggcc', 16, 'ARIHANT CABLES', '', '2024-05-02', 'AC/01315/24-25', '', '32628', '2024-07-02', 'bank', 'tmbl', 'paid', 0, 1, '2024-10-18 05:44:14', 0, '0000-00-00 00:00:00'),
(8, '24/00008', 'ggcc', 16, 'ARIHANT CABLES', '', '2024-06-15', 'AC/03295/24-25', '', '33925.00', '2024-07-16', 'bank', 'tmbl', 'paid', 0, 1, '2024-10-18 05:44:55', 0, '0000-00-00 00:00:00'),
(9, '24/00009', 'ggcc', 16, 'ARIHANT CABLES', '', '2024-06-15', 'AC/03296/24-25', '', '23234.00', '2024-07-16', 'bank', 'tmbl', 'paid', 0, 1, '2024-10-18 05:46:01', 0, '0000-00-00 00:00:00'),
(10, '24/00010', 'ggcc', 16, 'ARIHANT CABLES', '', '2024-07-06', 'AC/04352/24-25', '', '12484.00', '2024-08-20', 'bank', 'tmbl', 'paid', 0, 1, '2024-10-18 05:46:47', 0, '0000-00-00 00:00:00'),
(11, '24/00011', 'ggcc', 16, 'ARIHANT CABLES', '', '2024-07-10', 'AC/04499/24-25', '', '26138.00', '0000-00-00', '', '', 'unpaid', 0, 1, '2024-10-18 05:47:50', 0, '0000-00-00 00:00:00'),
(12, '24/00012', 'ggcc', 16, 'ARIHANT CABLES', '', '2024-07-19', 'AC/04968/24-25', '', '547876.00', '0000-00-00', '', '', 'unpaid', 0, 1, '2024-10-18 05:49:49', 0, '0000-00-00 00:00:00'),
(13, '24/00013', 'ggcc', 16, 'ARIHANT CABLES', '', '2024-07-31', 'AC/05560/24-25', '', '12098', '0000-00-00', '', '', 'unpaid', 0, 1, '2024-10-18 05:50:31', 0, '0000-00-00 00:00:00'),
(14, '24/00014', 'ggcc', 16, 'ARIHANT CABLES', '', '2024-08-12', 'AC/06204/24-25', '', '29583.00', '0000-00-00', '', '', 'unpaid', 0, 1, '2024-10-18 05:51:27', 0, '0000-00-00 00:00:00'),
(15, '24/00015', 'ggcc', 16, 'ARIHANT CABLES', '', '2024-08-12', 'AC/06154/24-25', '', '35198.00', '0000-00-00', '', '', 'unpaid', 0, 1, '2024-10-18 05:52:33', 0, '0000-00-00 00:00:00'),
(16, '24/00016', 'ggcc', 16, 'ARIHANT CABLES', '', '2024-08-20', 'AC/06506/24-25', '', '116171.00', '0000-00-00', '', '', 'unpaid', 0, 1, '2024-10-18 05:53:17', 0, '0000-00-00 00:00:00'),
(17, '24/00017', 'ggcc', 16, 'ARIHANT CABLES', '', '2024-08-28', 'AC/06907/24-25', '', '19708.00', '0000-00-00', '', '', 'unpaid', 0, 1, '2024-10-18 05:54:40', 0, '0000-00-00 00:00:00'),
(18, '24/00018', 'ggcc', 16, 'ARIHANT CABLES', '', '2024-08-28', 'AC/06900/24-25', '', '52506.00', '0000-00-00', '', '', 'unpaid', 0, 1, '2024-10-18 05:55:17', 0, '0000-00-00 00:00:00'),
(19, '24/00019', 'ggcc', 16, 'ARIHANT CABLES', '', '2024-08-30', 'AC/07080/24-25', '', '23883.00', '0000-00-00', '', '', 'unpaid', 0, 1, '2024-10-18 05:56:04', 0, '0000-00-00 00:00:00'),
(20, '24/00020', 'ggcc', 16, 'ARIHANT CABLES', '', '2024-09-13', 'AC/07696/24-25', '', '86593.00', '0000-00-00', '', '', 'unpaid', 0, 1, '2024-10-18 05:56:43', 0, '0000-00-00 00:00:00'),
(21, '24/00021', 'ggcc', 16, 'ARIHANT CABLES', '', '2024-09-18', 'AC/07857/24-25', '', '32504.00', '0000-00-00', '', '', 'unpaid', 0, 1, '2024-10-18 05:57:17', 0, '0000-00-00 00:00:00'),
(22, '24/00022', 'ggcc', 16, 'ARIHANT CABLES', '', '2024-09-25', 'AC/08290/24-25', '', '58086.00', '0000-00-00', '', '', 'unpaid', 0, 1, '2024-10-18 05:57:53', 0, '0000-00-00 00:00:00'),
(23, '24/00023', 'ggcc', 16, 'ARIHANT CABLES', '', '2024-10-01', 'AC/08614/24-25', '', '34851.00', '2024-10-18', 'bank', 'tmbl', 'paid', 0, 1, '2024-10-18 05:58:29', 0, '0000-00-00 00:00:00'),
(24, '24/00024', 'ggcc', 16, 'ARIHANT CABLES', '', '2024-10-07', 'AC/08881/24-25', '', '69703.00', '2024-07-07', 'bank', 'tmbl', 'paid', 0, 1, '2024-10-18 05:59:02', 0, '0000-00-00 00:00:00'),
(25, '24/00025', 'bright', 18, 'ABHAY COLLECTION', '', '2024-10-17', 'AC2/24-25/1818', './uploads/purchase_bill/img-20241019-wa0036241019095423.jpg', '20000', '2024-10-19', 'bank', 'tmbl', 'paid', 0, 1, '2024-10-19 04:24:23', 0, '0000-00-00 00:00:00'),
(26, '24/00026', 'ggcc', 5, 'mumbai', '', '2024-11-11', 'PERFOMA', '', '1640200', '2024-11-11', 'bank', 'tmbl', 'paid', 0, 1, '2024-11-11 04:47:27', 1, '2024-11-11 10:19:34');

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

INSERT INTO `purchase_order` (`id`, `sno`, `branch_id`, `company_name`, `po_date`, `validity_end`, `purchase_order_no`, `po_title`, `po_amount`, `po_letter`, `security_amount`, `receipt_img`, `dd_img`, `gst_number`, `gst_percentage`, `vendor_code`, `pan_number`, `hpcl_gst_number`, `hpcl_address`, `status`, `security_status`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '24/00001', 3, 'ggcc', '2024-06-11', '2026-06-11', '5300020519', 'ELECTRICAL M&R WORK VASHI SA', '6750000', '', '0', '', '', 3, '9', 1, '3', '27AAACH1118B1ZC', 'Hindustan Petroleum Corporation Ltd, D-99/500 , HPCL Terminal , TTC Industrial Area , MIDC,Turbhe , Vashi ,  Navi Mumbai. 400705', 'ongoing', 'notreceived', 1, 1, '2024-08-31 04:10:06', 0, '0000-00-00 00:00:00'),
(2, '24/00002', 3, 'ggcc', '2024-07-01', '2026-07-01', '5300021173', 'ELECTRICAL M&R WORK THANE A SA', '3000000', '', '0', '', '', 3, '9', 1, '3', '27AAACH1118B1ZC', 'Hindustan Petroleum Corporation Ltd, D-99/500 , HPCL Terminal , TTC Industrial Area , MIDC,Turbhe , Vashi , Navi Mumbai. 400705 Navi Mumbai Maharashtra India', 'ongoing', 'notreceived', 0, 1, '2024-08-31 04:10:22', 1, '2024-08-31 09:40:35'),
(3, '24/00003', 3, 'ggcc', '2024-06-11', '2026-06-11', '5300020519', 'ELECTRICAL M&R WORK VASHI SA', '7965000', '', '0', '', '', 3, '9', 1, '3', '27AAACH1118B1ZC', 'Hindustan Petroleum Corporation Ltd, D-99/500 , HPCL Terminal , TTC Industrial Area , MIDC,Turbhe , Vashi ,  Navi Mumbai. 400705', 'ongoing', 'notreceived', 0, 1, '2024-08-31 04:23:13', 1, '2024-09-06 11:19:50'),
(4, '24/00004', 3, 'ggcc', '2024-03-26', '2026-03-26', '5300018762', 'MSHSD AND CNG PANEL', '3540000', '', '0', '', '', 0, '', 0, '', '', '', 'ongoing', 'notreceived', 0, 1, '2024-09-06 05:56:41', 1, '2024-09-23 07:22:21'),
(5, '24/00005', 6, 'ggcc', '2024-06-27', '2025-06-27', '5300020866', 'ELECTRICAL M&R WORK CHENNAI RETAIL RO', '6000000', '', '120000', '', '', 2, '9', 1, '3', '33AAACH1118B1ZJ', 'Petro Bhavan , Second Floor, No 82, T T K Road, Alwarpet Chennai - 600 018. ', 'ongoing', 'notreceived', 0, 1, '2024-09-09 04:34:41', 0, '0000-00-00 00:00:00'),
(6, '24/00006', 8, 'bright', '2024-08-29', '2025-09-01', '5300023520', 'ELECTRICAL M R  FOR MDU DGL RMD TNVL TUTI KANYA SA', '3540000', '', '60000', '', '', 6, '9', 3, '4', '33AAACH1118B1ZJ', 'Third Floor Rakesh Towers , Bye pass Road, Madurai - 625 010.', 'ongoing', 'notreceived', 0, 1, '2024-09-10 05:04:14', 1, '2024-09-10 11:56:33'),
(7, '24/00007', 10, 'ggcc', '2024-08-07', '2026-08-08', '5300022636', 'ELECTRICAL M R KTYM TVM KOLLAM', '1770000', '', '15000', '', '', 2, '18', 2, '3', '32AAACH1118B1ZL', 'Tatapuram Post, Ernakulam , Cochin - 682 018.', 'ongoing', 'notreceived', 0, 1, '2024-09-10 05:11:32', 1, '2024-09-10 11:50:33'),
(8, '24/00008', 10, 'ggcc', '2024-08-07', '2026-08-08', '5300022630', 'ELECTRICAL M R EKM ALP MVT', '5310000', '', '45000', '', '', 2, '18', 2, '3', '32AAACH1118B1ZL', 'Tatapuram Post, Ernakulam , Cochin - 682 018.', 'ongoing', 'notreceived', 0, 1, '2024-09-10 05:13:50', 1, '2024-09-10 11:46:36'),
(9, '24/00009', 10, 'bright', '2024-08-07', '2026-08-08', '5300022635', 'ELECTRICAL M R KTYM TVM KOLLAM', '3540000', '', '30000', '', '', 5, '18', 3, '4', '32AAACH1118B1ZL', 'Tatapuram Post, Ernakulam , Cochin - 682 018.', 'ongoing', 'notreceived', 0, 1, '2024-09-10 06:30:00', 0, '0000-00-00 00:00:00'),
(10, '24/00010', 10, 'bright', '2024-08-07', '2026-08-08', '5300022631', 'ELECTRICAL M R EKM ALP MVT', '3540000', '', '30000', '', '', 5, '18', 3, '4', '32AAACH1118B1ZL', 'Tatapuram Post, Ernakulam , Cochin - 682 018.', 'ongoing', 'notreceived', 0, 1, '2024-09-10 06:34:29', 0, '0000-00-00 00:00:00'),
(11, '24/00011', 7, 'ggcc', '2024-05-10', '2025-05-10', '5300019888', 'ELECTRICAL M&R WORKS UNDER TRICHY  RO', '3401999', '', '33990', '', '', 2, '18', 2, '3', '33AAACH1118B1ZJ', 'HPCL MDSR Enclave 2 nd Floor Trichy', 'ongoing', 'notreceived', 0, 1, '2024-09-12 09:29:03', 0, '0000-00-00 00:00:00'),
(12, '24/00012', 12, 'bright', '2024-02-15', '2026-02-14', '5300017401', 'ELECTRICAL M&R AT NASHIK B SA', '4200000', '', '49560', '', '', 5, '9', 3, '4', '27AAACH1118BIZC', 'NASIK', 'ongoing', 'notreceived', 0, 1, '2024-09-12 09:39:43', 0, '0000-00-00 00:00:00'),
(13, '24/00013', 4, 'ggcc', '2024-01-10', '2025-09-30', '5300016283', 'M&R WORKS PANDHARPUR SALES AREA', '2700000', '', '0', '', '', 3, '9', 1, '3', '27AAACH1118B1ZC', 'SHOLAPUR', 'ongoing', 'notreceived', 0, 1, '2024-09-12 09:53:42', 0, '0000-00-00 00:00:00'),
(14, '24/00014', 11, 'ggcc', '2024-05-17', '2024-06-16', '5300020017', 'M&R JOBS VAPI SA', '3540000', '', '35400', '', '', 3, '18', 1, '3', '24AAACH1118B1ZI', '226,TP9,Water Tank Road, Nr Ambalal Park,Nr Charbhuja Complex, Karelibaugh.390018 Vadodara.Gujrat', 'ongoing', 'notreceived', 0, 1, '2024-09-18 02:01:45', 0, '0000-00-00 00:00:00'),
(15, '24/00015', 11, 'ggcc', '2024-01-05', '2025-01-05', '5300016497', 'PAINTING JOB', '2950000', '', '0', '', '', 3, '18', 1, '3', '24AAACH1118B1ZI', 'VADODRA', 'ongoing', 'notreceived', 0, 1, '2024-09-18 02:06:49', 0, '0000-00-00 00:00:00'),
(16, '24/00016', 11, 'bright', '2024-07-26', '2025-06-25', '5300020836', 'STP M&R SURAT & VAPI SA', '1416000', '', '28320', '', '', 5, '18', 3, '4', '24AAACH1118B1ZI', 'VADODARA', 'ongoing', 'notreceived', 0, 1, '2024-09-18 02:12:29', 0, '0000-00-00 00:00:00'),
(17, '24/00017', 2, 'ggcc', '2024-02-19', '2026-03-31', '5300017517', 'ELECTRICAL M&R REPAIR BHOPAL', '4720000', '', '40000', '', '', 3, '9', 1, '3', '23AAACH1118B1ZK', 'BHOPAL', 'ongoing', 'notreceived', 0, 1, '2024-09-18 02:16:51', 0, '0000-00-00 00:00:00'),
(18, '24/00018', 2, 'bright', '2024-04-25', '2026-04-30', '5300019602', 'IGBT INSTALLATION AT OUTLET', '2360000', '', '20000', '', '', 3, '9', 1, '3', '23AAACH1118B1ZK', 'BHOPAL', 'ongoing', 'notreceived', 0, 1, '2024-09-18 02:21:21', 0, '0000-00-00 00:00:00'),
(19, '24/00019', 2, 'bright', '0023-08-26', '2025-08-26', '5300012137', 'INGRESS LIGHT POLES & LED FOCUS', '6113243', '', '60000', '', '', 5, '18', 3, '4', '23AAACH1118B1ZK', 'BHOPAL', 'ongoing', 'notreceived', 0, 1, '2024-09-18 02:31:45', 0, '0000-00-00 00:00:00'),
(20, '24/00020', 2, 'bright', '2024-02-19', '2026-03-31', '5300017514', 'ELECTRICAL MAIN AND REPAIR', '7080000', '', '60000', '', '', 5, '18', 3, '4', '23AAACH1118B1ZK', 'BHOPAL', 'ongoing', 'notreceived', 0, 1, '2024-09-18 02:35:42', 0, '0000-00-00 00:00:00'),
(21, '24/00021', 5, 'ggcc', '2024-06-15', '2026-06-14', '5300020627', 'STP MAINTENANCE & REPAIR ', '4720000', '', '80000', '', '', 3, '9', 1, '3', '23AAACH1118B1ZK', 'GWALIOR', 'ongoing', 'notreceived', 0, 1, '2024-09-18 02:40:09', 0, '0000-00-00 00:00:00'),
(22, '24/00022', 5, 'ggcc', '2024-03-29', '2026-03-28', '5300018930', 'ELECTRICAL MAINTENANCE UNDER DHAR', '2542360', '', '0', '', '', 3, '18', 1, '3', '23AAACH1118B1ZK', 'INDORE', 'ongoing', 'notreceived', 1, 1, '2024-09-18 02:54:33', 0, '0000-00-00 00:00:00'),
(23, '24/00023', 5, 'bright', '2024-03-29', '2026-03-28', '5300018929', 'ELECTRICAL MAINTENANCE UNDER DHAR', '3813540', '', '0', '', '', 5, '18', 3, '4', '23AAACH1118B1ZK', 'INDORE', 'ongoing', 'notreceived', 1, 1, '2024-09-18 02:57:38', 0, '0000-00-00 00:00:00'),
(24, '24/00024', 3, 'ggcc', '2024-07-05', '2026-07-05', '5300021448', 'ELECTRICAL M&R WORK RAIGAD', '4125000', '', '0', '', '', 3, '9', 1, '3', '27AAACH1118B1ZC', 'VASHI', 'ongoing', 'notreceived', 0, 1, '2024-09-18 03:14:53', 0, '0000-00-00 00:00:00'),
(25, '24/00025', 3, 'bright', '2024-06-12', '2026-06-11', '5300020521', 'ELECTRICAL M&R VASHI SA', '1500000', '', '0', '', '', 5, '9', 3, '4', '27AAACH1118B1ZC', 'VASHI', 'ongoing', 'notreceived', 0, 1, '2024-09-18 03:24:39', 0, '0000-00-00 00:00:00'),
(26, '24/00026', 1, 'ggcc', '2024-03-29', '2026-03-28', '5300018930', 'ELECTRICAL MAINTENANCE UNDER DHAR/UJJAN', '2542360', '', '0', '', '', 0, '', 0, '', '', '', 'ongoing', 'notreceived', 0, 1, '2024-09-20 07:35:25', 0, '0000-00-00 00:00:00'),
(27, '24/00027', 1, 'bright', '2024-03-29', '2026-03-28', '5300018929', 'ELECTRICAL MAINTENANCE UNDER DHAR/UJJAIN', '3813540', '', '0', '', '', 0, '', 0, '', '', '', 'ongoing', 'notreceived', 0, 1, '2024-09-20 07:53:46', 0, '0000-00-00 00:00:00'),
(28, '24/00028', 3, 'ggcc', '2024-09-18', '2026-09-17', '5300024325', 'EV & CNG STATION WORKS THANE A & B', '4400000', '', '88000', '', '', 0, '', 0, '', '', '', 'ongoing', 'notreceived', 0, 1, '2024-10-14 04:27:48', 1, '2024-10-14 09:58:56'),
(29, '24/00029', 8, 'ggcc', '2024-10-31', '2025-10-31', '5300020520', 'ELECTRICAL M R KTYM TVM KOLLAM', '20000', '', '1000', '', '', 0, '', 0, '', '', '', 'ongoing', 'notreceived', 0, 1, '2024-11-04 02:10:12', 0, '0000-00-00 00:00:00'),
(30, '24/00030', 13, 'ggcc', '2024-11-04', '2025-11-02', '5300020522', 'ELECTRICAL M&R WORK VASHI SA', '6750000', '', '0', '', '', 0, '', 0, '', '', '', 'ongoing', 'notreceived', 0, 1, '2024-11-04 02:43:52', 0, '0000-00-00 00:00:00');

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

INSERT INTO `retention_money` (`id`, `branch_id`, `company_name`, `po_id`, `estimation_id`, `retention_date`, `taxinvoice_date`, `received_date`, `received_amount`, `retention_amount`, `tds_amount`, `wct_amount`, `hold_amount`, `bank_name`, `retention_img`, `status`, `delete_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 3, 'ggcc', 3, '32', '2024-09-18', '2025-09-18', '2024-10-14', '', '21752.62', '6528.00', '', '0', '', '', 'received', 0, 1, '2024-10-23 04:59:16', 1, '2024-10-23 10:30:24'),
(2, 8, 'ggcc', 29, '36', '2024-10-31', '2025-10-30', NULL, '', '', '', '', NULL, '', NULL, 'unreceived', 0, 1, '2024-11-04 02:10:56', 0, '0000-00-00 00:00:00'),
(3, 13, 'ggcc', 30, '37', '2024-11-01', '2024-11-01', NULL, '', '', '', '', NULL, '', NULL, 'unreceived', 0, 1, '2024-11-04 02:44:18', 0, '0000-00-00 00:00:00'),
(4, 8, 'bright', 6, '38', '0000-00-00', '0000-00-00', NULL, '', '', '', '', NULL, '', NULL, 'notreceived', 0, 1, '2024-11-19 02:30:59', 0, '0000-00-00 00:00:00'),
(5, 8, 'bright', 6, '39', '0000-00-00', '0000-00-00', NULL, '', '', '', '', NULL, '', NULL, 'notreceived', 0, 1, '2024-11-19 04:14:21', 0, '0000-00-00 00:00:00'),
(6, 8, 'bright', 6, '41', '0000-00-00', '0000-00-00', NULL, '', '', '', '', NULL, '', NULL, 'notreceived', 0, 1, '2024-11-19 04:42:45', 0, '0000-00-00 00:00:00'),
(7, 8, 'bright', 6, '40', '0000-00-00', '0000-00-00', NULL, '', '', '', '', NULL, '', NULL, 'notreceived', 0, 1, '2024-11-19 04:43:36', 0, '0000-00-00 00:00:00'),
(8, 3, 'ggcc', 3, '42', '2025-11-08', '0000-00-00', '2024-11-09', ' 9,53,743.07 ', ' 90,832.87', ' 9,084.00 ', ' 18,168.00', '0', 'tmbl', '', 'notreceived', 0, 1, '2024-11-19 04:59:44', 0, '0000-00-00 00:00:00');

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
(1, '24/00001', 'mh43-by2807', 'north', '1', 'car', '', 'Ecco', '', 'MH-43-BY-2807', '', '', '', '2025-08-04', '2024-07-12', '2024-07-12', '', '', 'active', 0, 1, '2024-09-27 18:42:50', 1, '2024-09-23 07:47:39'),
(2, '24/00002', 'mh05dp9791', 'north', '2', 'bike', '', 'ACTIVA', '', 'MH-05-DP-9791', '', '', '', '2025-01-29', '0000-00-00', '2024-01-03', '', '', 'active', 1, 1, '2024-11-11 07:24:49', 1, '2024-08-22 06:23:07'),
(3, '24/00003', 'mp09gg1880', 'north', '2', 'truck', '', 'MAHINDRA GENIO', '', 'MP-09-GG-1880', '', '', '', '2025-02-21', '2025-01-21', '2024-08-05', '', '', 'active', 0, 1, '2024-09-27 18:42:53', 0, NULL),
(4, '24/00004', 'mh43bx0102', 'north', '13', 'truck', '', 'BOLERO PICK-UP', '', 'MH-43-BX-0102', '', '', '', '2025-02-05', '2035-03-15', '2024-11-26', '', '', 'active', 0, 1, '2024-09-27 18:41:02', 0, NULL),
(5, '24/00005', 'mp09gj1268', 'indore', '2', 'truck', '', 'BOLERO PICK-UP', 'GGCC ', 'MP-09-GJ-1268', '', '', '', '2025-06-29', '2025-05-23', '2024-09-07', '', '', 'active', 0, 1, '2024-11-11 07:41:12', 1, '2024-11-11 07:41:12'),
(6, '24/00006', 'mh06cs9946', 'indore', '2', 'truck', '', 'BOLERO PLUS', 'BRIGHT  ', 'MH-06-CS-9946', '', './uploads/vehicle_rc/rc-9946241111072837.jpg', './uploads/vehicle_insurance/mh03cs9946-magma-bright-online241111072837.pdf', '2025-07-09', '2033-07-10', '2025-02-02', '', './uploads/vehicle_puc/puc-9946241111073133.jpg', 'active', 0, 1, '2024-11-11 07:31:33', 1, '2024-11-11 07:31:33'),
(7, '24/00007', 'mp09gh9231', 'indore', '5', 'truck', '', 'TATA INTRA V30', 'GGCC ', 'MP-09-GH-9231', '', './uploads/vehicle_rc/rc-9231241111072124.jpg', './uploads/vehicle_insurance/mp09gh9231-future-ggcc-online241111072124.pdf', '2025-08-10', '2025-08-05', '2025-04-09', '', './uploads/vehicle_puc/puc-9231241111072345.jpg', 'active', 0, 1, '2024-11-11 07:23:45', 1, '2024-11-11 07:23:45'),
(8, '24/00008', 'mh05eq7883', 'indore', '5', 'truck', '', 'MARUTI ECCO ', 'BRIGHT  ', 'MH-05-EQ-7883', '', './uploads/vehicle_rc/rc-7883241111070319.jpg', './uploads/vehicle_insurance/mh05eq7883-godigit-bright-online241111065806.pdf', '2025-11-08', '2026-10-11', '2025-01-01', '', './uploads/vehicle_puc/puc-7883241111070319.pdf', 'active', 0, 1, '2024-11-11 07:03:19', 1, '2024-11-11 07:03:19'),
(9, '24/00009', 'tn22ct8151', 'chennai', '6', 'truck', '', 'MAXIMMO', 'GGCC ', 'TN-22-CT-8151', '', '', './uploads/vehicle_insurance/tn22ct8151-godigit-george-online241030073039.pdf', '2025-05-15', '0000-00-00', '2025-01-10', '', './uploads/vehicle_puc/puc-8151241111065351.jpg', 'active', 0, 1, '2024-11-11 06:53:51', 1, '2024-11-11 06:53:51'),
(10, '24/00010', 'tn11aa8294', 'chennai', '8', 'truck', '', 'IMPERIO', 'GGCC ', 'TN-11-AA-8294', '', '', './uploads/vehicle_insurance/tn11aa8294-magma-george-online241030073009.pdf', '2025-06-01', '0000-00-00', '2025-07-04', '', './uploads/vehicle_puc/puc-tn11aa8294241111065542.pdf', 'active', 0, 1, '2024-11-11 06:55:42', 1, '2024-11-11 06:55:42'),
(11, '24/00011', 'tn11p0401', 'chennai', '9', 'truck', '', 'GENIO', 'GGCC ', 'TN-11-P-0401', '', '', './uploads/vehicle_insurance/tn11p0401-george-magma-online241030072806.pdf', '2025-07-28', '0000-00-00', '2025-03-05', '', './uploads/vehicle_puc/puc-0401241030072806.pdf', 'active', 0, 1, '2024-11-11 06:56:29', 1, '2024-11-11 06:56:29'),
(12, '24/00012', 'tn11u1154', 'chennai', '7', 'truck', '', 'IMPERIO', 'GGCC', 'TN-11-U-1154', '', './uploads/vehicle_rc/rc-1154_11zon241030072129.jpg', './uploads/vehicle_insurance/tn11u1154-george-futuregeneral-online241030072129.pdf', '2025-10-03', '0000-00-00', '2025-02-19', '', './uploads/vehicle_puc/puc-1154241111064301.jpg', 'active', 0, 1, '2024-11-11 06:43:02', 1, '2024-11-11 06:43:02'),
(13, '24/00013', 'tn11ba7043', 'chennai', '10', 'truck', '', 'TATA YODHA', 'BRIGHT  ', 'TN-11-BA-7043', '', './uploads/vehicle_rc/rc-7043_11zon241030071959.jpg', './uploads/vehicle_insurance/tn11ba7043-bright-futuregeneral-online241017054756.pdf', '2025-10-04', '0000-00-00', '2025-03-10', '', './uploads/vehicle_puc/puc-7043241111064000.pdf', 'active', 0, 1, '2024-11-11 06:40:00', 1, '2024-11-11 06:40:00'),
(14, '24/00014', 'tn11ac8991', 'chennai', '10', 'truck', 'diesel', 'BOLERO PICK-UP', 'BRIGHT  ', 'TN-11-AC-8991', '', './uploads/vehicle_rc/rc-tn-11-ac-8991_11zon241030072523.jpg', './uploads/vehicle_insurance/tn11ac8991-icici-bright-online241119080059.pdf', '2025-11-23', '0000-00-00', '2025-09-23', '', './uploads/vehicle_puc/puc-8991241111063821.pdf', 'active', 0, 1, '2024-11-19 08:05:05', 1, '2024-11-19 08:05:05'),
(15, '24/00015', 'tn72bw9714', 'chennai', '6', 'truck', '', 'BOLERO ', 'ANTHONY GEORGE', 'TN-72-BW-9714', '', '', './uploads/vehicle_insurance/32-tn-72-bw-9714-bajaj-george241030072440.pdf', '2024-11-29', '0000-00-00', '2025-03-10', '', './uploads/vehicle_puc/puc-9714241111063653.pdf', 'active', 0, 1, '2024-11-11 06:36:53', 1, '2024-11-11 06:36:53'),
(16, '24/00016', 'mh03be0628', 'chennai', '6', 'car', '', 'INNOVA', 'GGCC ', 'MH-03-BE-0628', '', './uploads/vehicle_rc/rc-0628241017054414.jpg', './uploads/vehicle_insurance/mh03be0628-george-icici-online241017054132.pdf', '2025-10-17', '0000-00-00', '2025-09-07', '', './uploads/vehicle_puc/puc-0628241111063326.jpg', 'active', 0, 1, '2024-11-11 06:33:27', 1, '2024-11-11 06:33:27'),
(17, '24/00017', 'mh03az8278', 'chennai', '6', 'car', '', 'TOYATO ETIOS', 'Devarajan George', 'MH-03-AZ-8278', '', './uploads/vehicle_rc/rc-mh-03-az-8278240930071858.jpg', './uploads/vehicle_insurance/mh03az8278-bajaj-bright-online240930072023.pdf', '2025-08-31', '0000-00-00', '2025-04-06', '', './uploads/vehicle_puc/puc-7367241111061115.pdf', 'active', 0, 1, '2024-11-16 04:57:39', 1, '2024-11-16 04:57:39');

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
(12, '24/00012', 4, '2024-08-25', NULL, '', '118977', '6815', 'FULL SERVICE', '', 'paid', 'online', 0, 1, '2024-08-29 01:55:38', 1, '2024-08-29 07:41:00'),
(13, '24/00013', 3, '2024-07-01', NULL, '', '450188', '4960', 'FULL SERVICE', '', 'paid', 'online', 0, 1, '2024-08-29 02:13:17', 0, '0000-00-00 00:00:00'),
(14, '24/00014', 1, '2024-05-04', NULL, '', '110131', '7235', 'FULL SERVICE', '', 'paid', 'online', 0, 1, '2024-08-29 02:44:52', 0, '0000-00-00 00:00:00'),
(15, '24/00015', 1, '2024-05-04', NULL, '', '110131', '7235', 'FULL SERVICE', '', 'paid', 'online', 0, 1, '2024-08-29 02:45:27', 0, '0000-00-00 00:00:00'),
(16, '24/00016', 1, '2024-09-23', NULL, '', '125606', '4200', 'BATTERY CHANGE\r\nEXIDE FML5-ML38B2OLA3H4M435227', '', 'paid', 'online', 0, 1, '2024-09-23 01:23:28', 1, '2024-09-23 06:56:26'),
(17, '24/00017', 17, '2024-01-23', '0000-00-00', 'tyre_change', '211792', '900', '1 TYRE CHANGED\r\n', '', 'paid', '', 0, 1, '2024-11-15 02:02:11', 0, '0000-00-00 00:00:00'),
(18, '24/00018', 17, '2024-02-06', '0000-00-00', 'maintenance', '211792', '4779', 'GENERAL SERVICE\r\n', '', 'paid', '', 0, 1, '2024-11-15 02:03:10', 0, '0000-00-00 00:00:00'),
(19, '24/00019', 17, '2024-05-23', '0000-00-00', 'maintenance', '211792', '843', 'REPAIR\r\n', '', 'paid', '', 0, 1, '2024-11-15 02:04:04', 0, '0000-00-00 00:00:00');

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
-- Indexes for table `estimation_bill`
--
ALTER TABLE `estimation_bill`
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `advancecash_received`
--
ALTER TABLE `advancecash_received`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `employee_payslip`
--
ALTER TABLE `employee_payslip`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `employee_performance`
--
ALTER TABLE `employee_performance`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `estimation_bill`
--
ALTER TABLE `estimation_bill`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `master_thirdparty`
--
ALTER TABLE `master_thirdparty`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_vendor`
--
ALTER TABLE `master_vendor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `material_shipping`
--
ALTER TABLE `material_shipping`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stock_transaction`
--
ALTER TABLE `stock_transaction`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `outlet`
--
ALTER TABLE `outlet`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `party_payment`
--
ALTER TABLE `party_payment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `retention_money`
--
ALTER TABLE `retention_money`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stock_report`
--
ALTER TABLE `stock_report`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `vehicle_service`
--
ALTER TABLE `vehicle_service`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
