-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2023 at 11:24 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manson`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `pimg` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_country` text NOT NULL,
  `admin_job` varchar(255) NOT NULL,
  `admin_about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `pimg`, `admin_contact`, `admin_country`, `admin_job`, `admin_about`) VALUES
(2, '   Admind', 'admin@mail.com', '', 'logo.jpg', '', '   India', 'Front-End Developer', '  Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical  ');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `catname` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `catname`, `status`) VALUES
(448, 'TEST', 0),
(449, 'MOHANGILL', 0),
(450, 'rohit', 0),
(451, 'suman', 0),
(452, 'irfan', 0),
(453, 'TEST', 0),
(454, 'test', 0),
(455, 'test', 0),
(456, 'show', 0),
(457, 'show', 0),
(458, 'md', 0),
(459, 'HELLO', 0);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `coupon_id` varchar(12) NOT NULL,
  `ret_id` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `draw_coupon`
--

CREATE TABLE `draw_coupon` (
  `id` int(11) NOT NULL,
  `draw_id` int(11) NOT NULL DEFAULT 0,
  `coupon_id` int(11) NOT NULL DEFAULT 0,
  `award` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `draw_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lucky_draws`
--

CREATE TABLE `lucky_draws` (
  `draw_id` int(11) NOT NULL,
  `draw_name` varchar(400) NOT NULL,
  `draw_date1` varchar(12) DEFAULT NULL,
  `draw_date2` varchar(12) DEFAULT NULL,
  `draw_award` varchar(200) DEFAULT NULL,
  `status` int(1) DEFAULT 0,
  `real_date` varchar(12) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mason_coupons`
--

CREATE TABLE `mason_coupons` (
  `id` int(11) NOT NULL,
  `mas_id` int(11) NOT NULL DEFAULT 0,
  `coupon_id` varchar(12) NOT NULL DEFAULT '0',
  `ret_id` int(11) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `measurement`
--

CREATE TABLE `measurement` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(1) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `sub_type_id` int(11) NOT NULL,
  `height` varchar(255) NOT NULL,
  `width` varchar(255) NOT NULL,
  `ht` varchar(255) NOT NULL,
  `cft` varchar(255) NOT NULL,
  `cmt` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `price` float NOT NULL,
  `remark` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `type_id`, `sub_type_id`, `height`, `width`, `ht`, `cft`, `cmt`, `qty`, `price`, `remark`, `status`, `date`) VALUES
(1, 459, 0, 0, '4354', ' 4354354', ' 43543543', ' 43543543', ' 43543', 0, 43, '435435435435435', 0, '2023-09-21 08:44:33'),
(2, 457, 0, 0, '4354', ' 345435', ' 435435', ' 43543', ' 43535435', 0, 0, 'taa34545435', 0, '2023-09-21 09:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `ptype`
--

CREATE TABLE `ptype` (
  `id` int(1) NOT NULL,
  `ptname` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `subtype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ptype`
--

INSERT INTO `ptype` (`id`, `ptname`, `status`, `subtype`) VALUES
(81, 'mohan', 0, '448'),
(82, 'irfan', 0, '458'),
(83, 'IRFAN', 0, '458'),
(84, 'suman', 0, '459');

-- --------------------------------------------------------

--
-- Table structure for table `recharge_amount`
--

CREATE TABLE `recharge_amount` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recharge_amount`
--

INSERT INTO `recharge_amount` (`id`, `amount`, `status`, `date`) VALUES
(1, 500, 0, '2023-08-28 10:38:04'),
(2, 3000, 0, '2023-08-28 10:38:32'),
(3, 5000, 0, '2023-08-28 10:38:32'),
(4, 10000, 0, '2023-08-28 10:38:44'),
(5, 17000, 0, '2023-08-28 10:38:44'),
(6, 25000, 0, '2023-08-28 10:38:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uid` varchar(55) NOT NULL,
  `name` varchar(111) NOT NULL,
  `mobile` varchar(111) NOT NULL,
  `email` varchar(111) NOT NULL,
  `pimg` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL,
  `area` varchar(400) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `address` tinytext DEFAULT NULL,
  `bal` varchar(20) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `ip_add` varchar(111) NOT NULL,
  `last_login` varchar(111) NOT NULL,
  `ref_user_id` int(11) NOT NULL DEFAULT 0,
  `refcode` varchar(111) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uid`, `name`, `mobile`, `email`, `pimg`, `password`, `area`, `city`, `address`, `bal`, `status`, `date`, `ip_add`, `last_login`, `ref_user_id`, `refcode`) VALUES
(17, 'vzmcPw4AM6', 'abhi', '999999999', '', '', '999999', NULL, NULL, NULL, '0', 0, '2023-08-24 03:07:07', '', '', 0, NULL),
(20, 'H8LerVAPxF', 'new', '9999999988', '', '', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, '0', 0, '2023-09-02 10:39:06', '::1', '1693633419', 0, 'y5hk3tvl'),
(21, 'xYmrCWiF3M', 'alok', '9999999993', '', '', 'bad220c335d0c1f53548f6acdb17e265', NULL, NULL, NULL, '0', 0, '2023-09-02 10:41:08', '', '', 22, '72we30hn'),
(22, 'ezsjfbUkqW', 'alok', '9999999997', '', '', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, NULL, '400', 0, '2023-09-02 10:43:08', '::1', '1694497652', 20, 'wkx0uy3f'),
(24, 'l3vXy6nxs8', 'King ', '8409042426', '', '', '14b61fecd674c2768ad3ce61302b1d51', NULL, NULL, NULL, '0', 0, '2023-09-03 23:12:06', '117.99.224.74', '1693987085', 17, 'y41hzo69'),
(25, 'IzohR5Zu83', 'Dharmpal ', '9587158755', '', '', '6fe8fefaf7ae62a739f7848ea3fbaa53', NULL, NULL, NULL, '0', 0, '2023-09-03 23:23:48', '110.226.164.248', '1693797834', 22, 'obt3p16v'),
(26, '7o9lun56pE', 'Md Sami', '9883553963', '', '', 'b6bab1751f4c5ef74d078bdd6496bf55', NULL, NULL, NULL, '0', 0, '2023-09-04 08:07:55', '152.58.178.161', '1694404745', 0, 'bq9g1zdv'),
(27, 'C5vlIxeL8R', 'Raja', '9088810343', '', '', 'c9410e0761da88a62bb60be176789c11', NULL, NULL, NULL, '0', 0, '2023-09-05 05:51:12', '152.58.178.161', '1694404722', 26, 'xfjmid91'),
(28, 'Vl9d0SRELB', 'alok', '7777777779', '', '', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, NULL, '85', 0, '2023-09-06 03:36:46', '', '', 0, 'hdjv6cp5'),
(29, 'lOvhfpSsBy', 'alok', '1111111112', '', '', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, NULL, '85', 0, '2023-09-06 03:38:17', '', '', 24, '42zjmyu5'),
(30, '', '', '+917428268734', 'pwsharmaz@gmail.com', '', 'Password@1233re32r', NULL, 'Tilak Nagarwer', 'admin@werwermail.com', '0', 0, '2023-09-16 17:04:02', '', '', 0, NULL),
(31, '', 'sanjay', '+917428268734', 'sanjay@gmail.com', '', 'Password@123', NULL, 'Tilak Nagar', 'bihar', '0', 0, '2023-09-16 17:07:17', '', '', 0, NULL),
(32, '', 'test', '4512451278', 'admin@mail.com', '', '123456', NULL, 'Ahmedabad', '1674, OPP HAJAPATEL NIOLE, NR NC BODYWALA CLG TANKSHAL RD KALUPUR, AHAMEDBAD, Ahmedabad, Gujarat, 38001', '0', 0, '2023-09-18 00:46:57', '', '', 0, NULL),
(33, '', '', '', '', '', '', NULL, '', '', '0', 0, '2023-09-18 02:14:17', '', '', 0, NULL),
(34, '', 'Ahmedabad', '4512451278', 'admin@mail.com', '', '123456', NULL, 'Ahmedabad', '1674, OPP HAJAPATEL NIOLE, NR NC BODYWALA CLG TANKSHAL RD KALUPUR, AHAMEDBAD, Ahmedabad, Gujarat, 38001', '0', 0, '2023-09-20 05:24:39', '', '', 0, NULL),
(35, '', 'Ahmedabad', '4512451278', 'admin@mail.com', '', '123456', NULL, 'Ahmedabad', '1674, OPP HAJAPATEL NIOLE, NR NC BODYWALA CLG TANKSHAL RD KALUPUR, AHAMEDBAD, Ahmedabad, Gujarat, 38001', '0', 0, '2023-09-20 05:27:50', '', '', 0, NULL),
(36, '', 'mdirfan', '', '', '', '', NULL, '', '', '0', 0, '2023-09-20 05:30:04', '', '', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_incomes`
--

CREATE TABLE `user_incomes` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `level` int(1) NOT NULL DEFAULT 0,
  `ref_user_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_incomes`
--

INSERT INTO `user_incomes` (`id`, `uid`, `plan_id`, `amount`, `date`, `level`, `ref_user_id`) VALUES
(1, 22, 7, 2400, '2023-08-30', 1, 21),
(2, 22, 7, 2400, '2023-09-04', 0, 0),
(3, 22, 7, 2400, '2023-09-04', 0, 0),
(4, 19, 2, 85, '2023-09-04', 0, 0),
(5, 19, 7, 2400, '2023-09-05', 0, 0),
(6, 17, 7, 2400, '2023-09-05', 0, 0),
(7, 19, 2, 85, '2023-09-05', 0, 0),
(8, 20, 7, 2400, '2023-09-05', 0, 0),
(9, 22, 7, 2400, '2023-09-05', 0, 0),
(10, 20, 7, 480, '2023-09-05', 1, 22),
(11, 22, 7, 72, '2023-09-04', 2, 22),
(12, 20, 7, 2400, '2023-09-06', 0, 0),
(13, 22, 7, 2400, '2023-09-06', 0, 0),
(14, 19, 2, 85, '2023-09-06', 0, 0),
(15, 26, 2, 85, '2023-09-06', 0, 0),
(16, 20, 7, 2400, '2023-09-07', 0, 0),
(17, 22, 7, 2400, '2023-09-07', 0, 0),
(18, 20, 7, 2400, '2023-09-08', 0, 0),
(19, 22, 7, 2400, '2023-09-08', 0, 0),
(20, 20, 7, 2400, '2023-09-10', 0, 0),
(21, 22, 7, 2400, '2023-09-10', 0, 0),
(22, 19, 2, 85, '2023-09-10', 0, 0),
(23, 26, 2, 85, '2023-09-10', 0, 0),
(24, 27, 2, 85, '2023-09-10', 0, 0),
(25, 26, 2, 17, '2023-09-10', 1, 27),
(26, 21, 2, 3, '2023-09-10', 2, 27),
(27, 22, 2, 2, '2023-09-10', 3, 27),
(28, 20, 7, 2400, '2023-09-11', 0, 0),
(29, 22, 7, 2400, '2023-09-11', 0, 0),
(30, 19, 2, 85, '2023-09-11', 0, 0),
(31, 26, 2, 85, '2023-09-11', 0, 0),
(32, 27, 2, 85, '2023-09-11', 0, 0),
(33, 26, 2, 17, '2023-09-11', 1, 27),
(34, 21, 2, 3, '2023-09-11', 2, 27),
(35, 22, 2, 2, '2023-09-11', 3, 27);

-- --------------------------------------------------------

--
-- Table structure for table `user_plans`
--

CREATE TABLE `user_plans` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `price` varchar(111) NOT NULL,
  `status` int(11) NOT NULL,
  `start_date` varchar(111) NOT NULL,
  `end_date` varchar(111) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_plans`
--

INSERT INTO `user_plans` (`id`, `uid`, `plan_id`, `price`, `status`, `start_date`, `end_date`, `created_at`) VALUES
(18, 20, 7, '25000', 0, '2023-08-29', '2023-12-27', '2023-08-29 15:21:35'),
(29, 22, 7, '25000', 0, '2023-08-29', '2023-12-27', '2023-08-29 15:39:24'),
(30, 19, 2, '500', 0, '2023-08-29', '2023-12-27', '2023-08-29 15:40:19'),
(31, 26, 2, '500', 0, '2023-09-06', '2024-01-04', '2023-09-06 15:16:44'),
(32, 27, 2, '500', 0, '2023-09-10', '2024-01-08', '2023-09-10 12:40:32');

-- --------------------------------------------------------

--
-- Table structure for table `use_bank_details`
--

CREATE TABLE `use_bank_details` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `bank_ac` varchar(111) DEFAULT NULL,
  `full_name` varchar(111) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `bank_nme` varchar(111) NOT NULL,
  `ifsc` varchar(111) NOT NULL,
  `status` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `use_bank_details`
--

INSERT INTO `use_bank_details` (`id`, `uid`, `bank_ac`, `full_name`, `phone`, `bank_nme`, `ifsc`, `status`, `date`, `created_at`) VALUES
(5, 19, '456456', 'sanjay', '46456', 'sbi', '456456', 0, '2023-08-25 12:45:10', '2023-08-25 07:15:10'),
(6, 19, '345436456', 'sbi bnk', '4645645654', 'Ravi', '43rtdfg', 0, '2023-08-25 13:15:24', '2023-08-25 07:45:24'),
(17, 22, '2147483647', 'alok ', '9873944502', 'icici bank', 'icic0937', 0, '2023-09-04 07:09:34', '2023-09-04 11:09:34'),
(18, 22, '276237277', 'abc', '839389399', 'KOTAK MAHINDRA', 'KOTA00927', 0, '2023-09-04 07:16:42', '2023-09-04 11:16:42'),
(19, 23, '2147483647', 'Md Sami', '9883553963', 'State Bank of India', 'SBIN0014308', 0, '2023-09-04 07:59:31', '2023-09-04 11:59:31'),
(20, 26, '2147483647', 'Md Sami', '9883553963', 'State Bank of India', 'SBIN0014308', 0, '2023-09-04 08:16:41', '2023-09-04 12:16:41'),
(21, 26, '40358849562', 'Md Sami', '9883553963', 'State Bank of India', 'SBIN0014308', 0, '2023-09-06 02:32:06', '2023-09-06 06:32:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `draw_coupon`
--
ALTER TABLE `draw_coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lucky_draws`
--
ALTER TABLE `lucky_draws`
  ADD PRIMARY KEY (`draw_id`);

--
-- Indexes for table `mason_coupons`
--
ALTER TABLE `mason_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `measurement`
--
ALTER TABLE `measurement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ptype`
--
ALTER TABLE `ptype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recharge_amount`
--
ALTER TABLE `recharge_amount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_incomes`
--
ALTER TABLE `user_incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_plans`
--
ALTER TABLE `user_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `use_bank_details`
--
ALTER TABLE `use_bank_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=460;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `draw_coupon`
--
ALTER TABLE `draw_coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lucky_draws`
--
ALTER TABLE `lucky_draws`
  MODIFY `draw_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mason_coupons`
--
ALTER TABLE `mason_coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `measurement`
--
ALTER TABLE `measurement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ptype`
--
ALTER TABLE `ptype`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `recharge_amount`
--
ALTER TABLE `recharge_amount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_incomes`
--
ALTER TABLE `user_incomes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user_plans`
--
ALTER TABLE `user_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `use_bank_details`
--
ALTER TABLE `use_bank_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
