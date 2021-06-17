-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 01:36 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE `campaign` (
  `id` int(11) NOT NULL,
  `ztime` timestamp NULL DEFAULT current_timestamp(),
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `minDis` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reg_time` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_time` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `end_time` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zactive` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`id`, `ztime`, `name`, `minDis`, `reg_time`, `start_time`, `end_time`, `zactive`) VALUES
(1, '2021-05-27 15:58:58', 'Testing Campaing', '100', '2021-05-07', '2021-05-29', '2021-05-01', 1),
(2, '2021-05-27 15:58:58', 'Testing Another Campaing', '100', '2021-06-01', '2021-06-11', '2021-06-25', 1),
(3, '2021-05-27 15:58:58', 'Friday Cyclon', '100', '2021-06-10', '2021-06-11', '2021-06-12', 1),
(4, '2021-05-27 15:58:58', 'Special Cyclon', '100', '2021-06-06', '2021-06-25', '2021-06-30', 1),
(5, '2021-05-27 15:58:58', 'Eid Days', '100', '2021-06-06', '2021-06-11', '2021-06-12', 1),
(6, '2021-05-27 15:58:58', 'New Years', '100', '2021-06-08', '2021-06-11', '2021-06-12', 1),
(7, '2021-05-28 20:03:06', 'Hello One', '10', '2021-05-01', '2021-06-05', '2021-07-02', 1),
(8, '2021-05-28 21:24:37', 'Hello One Two', '12', '2021-05-01', '2021-05-31', '2021-06-05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `campaign_reg_shop`
--

CREATE TABLE `campaign_reg_shop` (
  `id` int(11) NOT NULL,
  `ztime` timestamp NULL DEFAULT current_timestamp(),
  `campaign_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `campaign_reg_shop`
--

INSERT INTO `campaign_reg_shop` (`id`, `ztime`, `campaign_id`, `shop_id`) VALUES
(1, '2021-05-28 20:50:50', 6, 1),
(2, '2021-05-28 22:18:48', 8, 1),
(3, '2021-05-28 22:23:53', 7, 2),
(4, '2021-05-28 22:39:15', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `xdate` date DEFAULT NULL,
  `xname` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdesc` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `userid` int(11) DEFAULT NULL,
  `zactive` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Accept'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `ztime`, `xdate`, `xname`, `slug`, `xdesc`, `parent_id`, `userid`, `zactive`) VALUES
(1, '2021-05-24 15:18:03', '2021-05-24', 'Jewelry', 'Jewelry', 'Jewelry Itmes', 0, 1, 'Accept'),
(2, '2021-05-24 15:18:58', '2021-05-24', 'Traditonal Jewelry', 'Traditonal-Jewelry', 'Traditonal-Jewelry Itmes', 0, 1, 'Accept'),
(3, '2021-05-24 15:19:54', '2021-05-24', 'Antiqe Jewelry', 'Antiqe-jewelry', 'Antiqe Jewelry Items', 0, 1, 'Accept'),
(4, '2021-05-24 15:20:18', '2021-05-24', 'Bridal Jewelry', 'Bridal-Jewelry', 'Bridal Jewelry Items', 0, 1, 'Accept'),
(5, '2021-05-24 15:20:40', '2021-05-24', 'Sharee', 'Sharee', 'Sharee Items', 0, 1, 'Accept'),
(6, '2021-05-24 15:21:02', '2021-05-24', 'Indian Sharee', 'Indian-Sharee', 'Indian Sharee Items', 0, 1, 'Accept'),
(7, '2021-05-24 15:21:30', '2021-05-24', 'Katan', 'Katan-sharee-bd', 'Katan  sharee  in Bangladesh', 0, 1, 'Accept'),
(8, '2021-05-24 15:22:10', '2021-05-24', 'Jamdani Sharee', 'Jamdani-sharee', 'Jamdani Sharee Items', 0, 1, 'Accept'),
(9, '2021-05-24 15:22:28', '2021-05-24', '80 Count', '80-Count', '80 Count', 0, 1, 'Accept'),
(10, '2021-05-24 15:22:44', '2021-05-24', '120 Count', '120-Count', '120 Count', 0, 1, 'Accept'),
(11, '2021-05-24 17:07:53', '2021-05-24', 'Traditonal Jewelry', 'Traditonal-Jewelry', 'Traditonal-Jewelry Itmes ha', 0, 1, 'Accept');

-- --------------------------------------------------------

--
-- Table structure for table `customeraddress`
--

CREATE TABLE `customeraddress` (
  `id` int(11) NOT NULL,
  `xname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xmobile` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xemail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cusid` int(11) NOT NULL,
  `xadd` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `zactive` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customeraddress`
--

INSERT INTO `customeraddress` (`id`, `xname`, `xmobile`, `xemail`, `cusid`, `xadd`, `zactive`) VALUES
(1, 'Nafis Chonchol', '01641377742', 'nafischonchol@gmail.com', 1, 'Dhaka', 'Live'),
(2, 'Nafis Chonchol', '01742263748', 'nafis@gmail.com', 1, 'Mirpur', 'Live'),
(3, 'Tk', '01567892341', 'tk@gmail.com', 2, 'Dharat,Tangail', 'Live'),
(4, 'Tk', '01567892341', 'tk@gmail.com', 2, 'Mirpur', 'Live');

-- --------------------------------------------------------

--
-- Table structure for table `enlist`
--

CREATE TABLE `enlist` (
  `id` int(11) NOT NULL,
  `xitemid` int(11) NOT NULL,
  `xsourceid` int(11) NOT NULL,
  `xmrp` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `disAmt` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stock` int(11) DEFAULT 1,
  `zactive` int(20) NOT NULL DEFAULT 1,
  `enlistType` int(11) NOT NULL DEFAULT 1,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `xdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `enlist`
--

INSERT INTO `enlist` (`id`, `xitemid`, `xsourceid`, `xmrp`, `disAmt`, `stock`, `zactive`, `enlistType`, `ztime`, `xdate`) VALUES
(1, 7, 0, '1200', '1080', 23, 1, 2, '2021-05-26 05:00:13', '2021-05-26'),
(2, 3, 1, '1500', '1350', 10, 1, 1, '2021-05-26 05:02:36', '2021-05-26'),
(3, 7, 1, '9900', '9300', 900, 0, 2, '2021-05-26 16:40:15', '2021-05-26'),
(4, 8, 1, '1500', '1350', 10, 0, 2, '2021-05-26 19:22:06', '2021-05-26'),
(5, 8, 2, '2500', '1925', 21, 1, 3, '2021-05-26 19:22:49', '2021-05-26'),
(6, 6, 1, '', '', 0, 1, 3, '2021-05-27 10:17:16', '2021-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `ztime` timestamp NULL DEFAULT NULL,
  `addressid` int(11) DEFAULT NULL,
  `xsourceid` int(11) NOT NULL,
  `invoice` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `order_form` int(11) NOT NULL DEFAULT 1,
  `zactive` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `ztime`, `addressid`, `xsourceid`, `invoice`, `order_form`, `zactive`) VALUES
(1, '2021-05-25 13:04:18', 1, 1, 'VS2105251', 1, 'Shipped'),
(2, '2021-05-25 13:04:18', 3, 1, 'VS2105252', 1, 'Confirmed'),
(3, '2021-05-25 13:04:18', 3, 1, 'VS2105253', 1, 'Confirmed'),
(17, '2021-05-25 13:04:18', 3, 1, 'VS2105254', 1, 'Processing'),
(18, '2021-05-25 13:04:18', 3, 1, 'VS21052516', 1, 'Processing'),
(19, '2021-05-25 13:04:18', 3, 1, 'VS2105255', 1, 'Picked'),
(20, '2021-05-25 13:04:18', 2, 1, 'VS2105256', 1, 'Shipped'),
(21, '2021-05-25 13:04:18', 2, 1, 'VS2105257', 1, 'Processing'),
(22, '2021-05-25 13:04:18', 2, 1, 'VS2105258', 1, 'Delivered'),
(23, '2021-05-25 13:04:18', 1, 1, 'VS2105259', 1, 'Pending'),
(24, '2021-05-25 13:04:18', 1, 1, 'VS21052510', 1, 'Processing'),
(25, '2021-05-25 13:04:18', 1, 1, 'VS21052511', 1, 'Picked'),
(26, '2021-05-25 13:04:18', 4, 1, 'VS21052512', 1, 'Shipped'),
(27, '2021-05-25 13:04:18', 4, 1, 'VS21052513', 1, 'Processing'),
(28, '2021-05-25 13:04:18', 2, 1, 'VS21052514', 1, 'Delivered'),
(29, '2021-05-25 13:04:18', 4, 1, 'VS21052515', 1, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `xdate` date DEFAULT NULL,
  `sku` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `invoice` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xitemid` int(11) NOT NULL,
  `xqty` int(11) NOT NULL,
  `xunitmrp` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `disAmt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unitsale` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `ztime`, `xdate`, `sku`, `invoice`, `xitemid`, `xqty`, `xunitmrp`, `disAmt`, `unitsale`) VALUES
(1, '2021-05-25 13:13:58', '2021-05-25', 'MT-01', 'VS2105251', 7, 2, '1500', '1350', '1350'),
(2, '2021-05-25 13:17:29', '2021-05-25', 'Ad-11', 'VS2105252', 8, 5, '1500', '1350', '1350'),
(3, '2021-05-25 13:17:29', '2021-05-25', 'Ad-10', 'VS2105251', 8, 5, '1500', '1500', '1500');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `xdate` date DEFAULT NULL,
  `invoice` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `zactive` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `ztime`, `xdate`, `invoice`, `zactive`, `note`) VALUES
(0, '2021-05-26 06:31:47', NULL, 'VS2105251', 'Pending', 'Pending Product'),
(1, '2021-05-26 06:31:47', NULL, 'VS2105251', 'Confirmed', 'Confirmed Product'),
(2, '2021-05-26 06:31:47', NULL, 'VS2105251', 'Processing', 'Processing Product'),
(4, '2021-05-26 07:43:05', '2021-05-26', 'VS2105251', 'Picked', 'Picked Now'),
(5, '2021-05-26 06:31:47', NULL, 'VS2105252', 'Pending', 'Processing Product'),
(6, '2021-05-26 21:19:58', '2021-05-26', 'VS2105251', 'Shipped', 'Pro');

-- --------------------------------------------------------

--
-- Table structure for table `payment_transection`
--

CREATE TABLE `payment_transection` (
  `id` int(11) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `invoice` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `transectionAmt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `method` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transectionType` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'Payment'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_transection`
--

INSERT INTO `payment_transection` (`id`, `ztime`, `invoice`, `transectionAmt`, `method`, `transectionType`) VALUES
(1, '2021-05-25 20:12:19', 'VS2105252', '100', 'Nagad', 'Payment');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `item_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seller_id` int(11) NOT NULL DEFAULT 1,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_path` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seitems`
--

CREATE TABLE `seitems` (
  `xitemid` int(10) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` timestamp NULL DEFAULT NULL,
  `xdate` date DEFAULT NULL,
  `bizid` int(11) NOT NULL DEFAULT 100,
  `xtitle` varchar(500) DEFAULT NULL,
  `xsourceid` int(30) NOT NULL DEFAULT 0,
  `sku` varchar(50) DEFAULT NULL,
  `tag` varchar(200) DEFAULT NULL,
  `xdesc` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xlongdesc` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_path` varchar(300) DEFAULT NULL,
  `xcat` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsubcat` varchar(100) DEFAULT NULL,
  `xbrand` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `zactive` varchar(20) NOT NULL DEFAULT 'Pending',
  `xcolor` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsize` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `zemail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xemail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xrecflag` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seitems`
--

INSERT INTO `seitems` (`xitemid`, `ztime`, `zutime`, `xdate`, `bizid`, `xtitle`, `xsourceid`, `sku`, `tag`, `xdesc`, `xlongdesc`, `file_path`, `xcat`, `xsubcat`, `xbrand`, `zactive`, `xcolor`, `xsize`, `zemail`, `xemail`, `xrecflag`) VALUES
(1, '2021-05-24 06:18:57', '2021-05-24 18:00:00', '2021-05-24', 100, 'Add New Product For Enlist', 1, 'Ad-02', 'Add Nd, Kodo', 'Add New Product For Enlist', NULL, 'products/Rb0u72SyVXweuVjQr5ac1vewKcQzvpxn7Mf8RFG3.jpg,products/PAvpy2mFqIpJWMzrfUh5cVs4n0x6xdd6ByasgEzf.jpg', 'Jamdani Sharee', NULL, 'Nafis Chocnhoco', 'Accepted', NULL, NULL, NULL, NULL, 'Live'),
(3, '2021-05-24 17:52:57', '2021-05-24 18:00:00', '2021-05-24', 100, 'Add New Product For Enlist', 1, 'Ad-04', 'Add Nd, Kodo', 'Add New Product For Enlist', NULL, 'products/Rb0u72SyVXweuVjQr5ac1vewKcQzvpxn7Mf8RFG3.jpg,products/PAvpy2mFqIpJWMzrfUh5cVs4n0x6xdd6ByasgEzf.jpg', 'Jamdani Sharee', NULL, 'Nafis Chocnhoco', 'Enlisted', NULL, NULL, NULL, NULL, 'Live'),
(4, '2021-05-25 04:56:10', '2021-05-24 18:00:00', '2021-05-25', 100, 'Add New Product For Enlist', 1, 'Mt-01', 'Add Nd, Kodo', 'Add New Product For Enlist', NULL, 'products/Rb0u72SyVXweuVjQr5ac1vewKcQzvpxn7Mf8RFG3.jpg,products/PAvpy2mFqIpJWMzrfUh5cVs4n0x6xdd6ByasgEzf.jpg', 'Jamdani Sharee', NULL, 'Nafis Chocnhoco', 'Pending', NULL, NULL, NULL, NULL, 'Live'),
(6, '2021-05-24 06:36:47', '2021-05-24 18:00:00', '2021-05-24', 100, 'Add New Product For Enlist', 2, 'Ad-03', 'Add Nd, Kodo', 'Add New Product For Enlist', NULL, 'products/Rb0u72SyVXweuVjQr5ac1vewKcQzvpxn7Mf8RFG3.jpg,products/PAvpy2mFqIpJWMzrfUh5cVs4n0x6xdd6ByasgEzf.jpg', 'Jamdani Sharee', NULL, 'Nafis Chocnhoco', 'Accepted', NULL, NULL, NULL, NULL, 'Live'),
(7, '2021-05-25 05:01:01', '2021-05-24 18:00:00', '2021-05-25', 100, 'New Bridal Jewelry For Girls | HayMama', 1, 'Ad-10', 'Add Nd, Kodo', 'Add New Product For Enlist', NULL, 'products/Rb0u72SyVXweuVjQr5ac1vewKcQzvpxn7Mf8RFG3.jpg,products/PAvpy2mFqIpJWMzrfUh5cVs4n0x6xdd6ByasgEzf.jpg', 'Jamdani Sharee', NULL, 'Nafis Chocnhoco', 'Enlisted', NULL, NULL, NULL, NULL, 'Live'),
(8, '2021-05-25 05:21:21', '2021-05-24 18:00:00', '2021-05-25', 100, 'Other Product For Order', 2, 'Ad-11', 'Add Nd, Kodo', 'Add New Product For Enlist', NULL, 'products/default.jpg', 'Jamdani Sharee', NULL, 'Nafis Chocnhoco', 'Enlisted', NULL, NULL, NULL, NULL, 'Live'),
(9, '2021-05-25 05:30:01', '2021-05-24 18:00:00', '2021-05-25', 100, 'Add New Product For Enlist', 2, 'Ad-01', 'Add Nd, Kodo', 'Add New Product For Enlist', NULL, 'products/Rb0u72SyVXweuVjQr5ac1vewKcQzvpxn7Mf8RFG3.jpg,products/PAvpy2mFqIpJWMzrfUh5cVs4n0x6xdd6ByasgEzf.jpg', 'Jamdani Sharee', NULL, 'Nafis Chocnhoco', 'Enlisted', NULL, NULL, NULL, NULL, 'Live'),
(10, '2021-05-25 05:39:44', '2021-05-24 18:00:00', '2021-05-25', 100, 'Add New Product For Enlist', 2, 'Ad-01', 'Add Nd, Kodo', 'Add New Product For Enlist', NULL, 'products/KXTXlJ6BeZiKc0NiCd7FO5zwova2EgNvSSgDw6a1.jpg', 'Jamdani Sharee', NULL, 'Nafis Chocnhoco', 'Pending', NULL, NULL, NULL, NULL, 'Live'),
(11, '2021-05-28 20:00:58', NULL, '2021-05-28', 100, 'Hello One', 1, 'hello', 'Hello One', 'Hello one', NULL, 'products/AiUoghhci6I1WKuKwQGRzZAAkjah0EaaZ9FgFMeG.jpg', 'Traditonal Jewelry', NULL, 'Hello', 'Pending', NULL, NULL, NULL, NULL, 'Live');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `xdate` date DEFAULT NULL,
  `xtime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `password`, `ztime`, `xdate`, `xtime`) VALUES
(1, 'Nafis', 'nafischonchol@gmail.com', '01641377742', '$2y$10$scdhIDnoC1ol93jbN4EG8OgiZ9m.wkfKczO1zVN35gv4tYDJYIyka', '2021-04-21 06:34:12', '2021-04-21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_users`
--

CREATE TABLE `vendor_users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shopname` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xmobile` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shopid` int(11) DEFAULT NULL,
  `logo_path` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shop_contact_no` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shop_desc` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_path` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_branch` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_account_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_account_number` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_routing_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bank_id` int(11) NOT NULL DEFAULT 1,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `xdate` date DEFAULT NULL,
  `zactive` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pending',
  `zrole` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'vendor-admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vendor_users`
--

INSERT INTO `vendor_users` (`id`, `name`, `shopname`, `email`, `xmobile`, `password`, `shopid`, `logo_path`, `shop_contact_no`, `shop_desc`, `file_path`, `bank_name`, `bank_branch`, `bank_account_name`, `bank_account_number`, `bank_routing_number`, `bank_id`, `ztime`, `xdate`, `zactive`, `zrole`) VALUES
(1, 'Admin', 'vShop', 'admin@vshop.com', '01742263748', '$2y$10$jMOTjiXMdpXE/7r/6ovA.OfrnUauHTR7Tlw0UvZYuTyVjkot.J/za', NULL, 'logo/PVJEjVC5Jz76uFLxDQEB3wtcAt0lZ4RIrYL9t7uP.jpg', '016453289540', 'This is not the first time Gayle has decided to go back to a team that he previously represented. The T20 maestro played four seasons for his home franchise Jamaica Tallawahs, winning two titles with them before jumping ship to St.', 'shop_photo/ogtbO2vpijCtBucN6XTRHuZVjU2GEDlMu0htXQtV.jpg', 'Sonali Bank', 'Kawran Bazar', 'Tk Shop', '3232323', '898098098', 1, '2021-05-23 19:59:34', NULL, 'Accept', 'vendor-admin'),
(2, 'Nafis Chonchol', 'Nc Shop', 'nafis@vshop.com', '01641377742', '$2y$10$GnAV8B2Pr4aEMKDFHBNB9uqylzka19pi9JFCopWs0hWx.C8JQxvyW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1, '2021-05-27 12:58:07', NULL, 'Pending', 'vendor-admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaign_reg_shop`
--
ALTER TABLE `campaign_reg_shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customeraddress`
--
ALTER TABLE `customeraddress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enlist`
--
ALTER TABLE `enlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoice` (`invoice`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_transection`
--
ALTER TABLE `payment_transection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seitems`
--
ALTER TABLE `seitems`
  ADD PRIMARY KEY (`xitemid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_users`
--
ALTER TABLE `vendor_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campaign`
--
ALTER TABLE `campaign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `campaign_reg_shop`
--
ALTER TABLE `campaign_reg_shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customeraddress`
--
ALTER TABLE `customeraddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `enlist`
--
ALTER TABLE `enlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_transection`
--
ALTER TABLE `payment_transection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seitems`
--
ALTER TABLE `seitems`
  MODIFY `xitemid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendor_users`
--
ALTER TABLE `vendor_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
