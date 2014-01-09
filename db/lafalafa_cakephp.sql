-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 09, 2014 at 10:35 AM
-- Server version: 5.5.34
-- PHP Version: 5.4.6-1ubuntu1.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `git_lafalafa`
--

-- --------------------------------------------------------

--
-- Table structure for table `affiliates`
--

CREATE TABLE IF NOT EXISTS `affiliates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `url` text NOT NULL,
  `affiliate_source` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `affiliates`
--

INSERT INTO `affiliates` (`id`, `name`, `url`, `affiliate_source`) VALUES
(1, 'Komli', 'http://www.shopnineteen.com/everything-rs-299.html', 'LafaLafakomli'),
(2, 'Above 99', 'http://www.shopnineteen.com/everything-rs-299.html', 'LafaLafakomli'),
(3, 'Usefull', 'http://www.shopnineteen.com/everything-rs-299.html', 'LafaLafakomli'),
(4, 'Home & Kitchen', 'http://www.shopnineteen.com/everything-rs-299.html', 'LafaLafakomli'),
(5, 'OMG', 'OMG', 'OMG');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `image` varchar(50) NOT NULL,
  `shortdesc` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `noofclick` int(11) NOT NULL,
  `createdby` varchar(50) NOT NULL,
  `createddate` datetime NOT NULL,
  `modifiedby` varchar(50) NOT NULL,
  `modifieddate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `shortdesc`, `status`, `noofclick`, `createdby`, `createddate`, `modifiedby`, `modifieddate`) VALUES
(1, 'Filla', '', 'Filla', 1, 0, 'Admin', '2013-12-30 06:12:07', '', '0000-00-00 00:00:00'),
(2, 'Polo', '', 'Polo', 1, 0, 'Admin', '2013-12-30 06:12:20', '', '0000-00-00 00:00:00'),
(3, 'Pol shivam', '', 'polo', 0, 0, 'Admin', '2013-12-31 01:12:44', 'Admin', '2013-12-31 01:12:04');

-- --------------------------------------------------------

--
-- Table structure for table `brands_cashbacks`
--

CREATE TABLE IF NOT EXISTS `brands_cashbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cashback_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `brands_coupons`
--

CREATE TABLE IF NOT EXISTS `brands_coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `brands_stores`
--

CREATE TABLE IF NOT EXISTS `brands_stores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `store_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `brands_stores`
--

INSERT INTO `brands_stores` (`id`, `store_id`, `brand_id`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cashbacks`
--

CREATE TABLE IF NOT EXISTS `cashbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `store_id` int(11) NOT NULL,
  `affiliate_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `short_desc` varchar(250) NOT NULL,
  `price_rule` varchar(100) NOT NULL,
  `payout` int(11) NOT NULL,
  `discount` varchar(5) NOT NULL,
  `Tag` varchar(200) NOT NULL,
  `url` varchar(255) NOT NULL,
  `no_of_click` int(11) NOT NULL,
  `last_sale_track` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `expiry_date` datetime NOT NULL,
  `type` varchar(10) NOT NULL,
  `utm` varchar(200) NOT NULL,
  `affiliatekey` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `terms_cond` text NOT NULL,
  `createdby` varchar(50) NOT NULL,
  `createddate` datetime NOT NULL,
  `modifiedby` varchar(50) NOT NULL,
  `modifieddate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `cashbacks`
--

INSERT INTO `cashbacks` (`id`, `store_id`, `affiliate_id`, `name`, `short_desc`, `price_rule`, `payout`, `discount`, `Tag`, `url`, `no_of_click`, `last_sale_track`, `start_date`, `expiry_date`, `type`, `utm`, `affiliatekey`, `status`, `terms_cond`, `createdby`, `createddate`, `modifiedby`, `modifieddate`) VALUES
(1, 6, 0, '20% Flat Off Max Cap 1000/-', 'xzxzxzxz', 'PEPOMGF20PER', 21, '12121', 'eexzxzxzw', 'http://www.pepperfry.com/furniture.html', 0, 0, '2013-12-02 00:12:00', '2014-01-31 00:01:00', 'CPS', '', '', 1, '', 'Admin', '2014-01-02 06:01:26', '', '0000-00-00 00:00:00'),
(2, 6, 0, '20% Flat Off Max Cap 750/-', '', 'PEPOMG20PER', 120, '323', '', 'http://www.pepperfry.com/', 0, 0, '2013-12-02 00:12:00', '2014-01-31 00:01:00', 'CPC', '', '', 1, '', 'Admin', '2014-01-02 06:01:27', '', '0000-00-00 00:00:00'),
(3, 7, 0, 'OMG Water Purifier Sale @10% Off @ Max 750', '', 'SCWPOMG10', 123, '23232', '', 'http://www.shopclues.com/home-applliances/small-appliances-en-2/water-purifiers.html', 0, 0, '2013-12-01 00:12:00', '2014-10-31 00:10:00', '', '', '', 1, '', 'Admin', '2014-01-02 06:01:27', '', '0000-00-00 00:00:00'),
(4, 7, 0, 'OMG TV Sale @Rs.. 700 Off on Min 17000.', '', 'SCTVOMG10', 123, '23', '', 'http://www.shopclues.com/electronics/tvs/led.html', 0, 0, '2013-12-01 00:12:00', '2014-10-31 00:10:00', '', '', '', 1, '', 'Admin', '2014-01-02 06:01:27', '', '0000-00-00 00:00:00'),
(5, 7, 0, 'OMG Shoes Sale Additional 12% Off @ Max 300', '', 'SCSHOMG12', 12, '2323', '', 'http://www.shopclues.com/footwear-en.html', 0, 0, '2013-12-01 00:12:00', '2014-10-31 00:10:00', '', '', '', 1, '', 'Admin', '2014-01-02 06:01:27', '', '0000-00-00 00:00:00'),
(6, 7, 0, 'OMG Laptop Sale @Rs..500 Off.', '', 'SCCS50OMG', 123, '232', '', 'http://www.shopclues.com/computers/laptop-sale-en.html', 0, 0, '2013-12-01 00:12:00', '2014-10-31 00:10:00', '', '', '', 1, '', 'Admin', '2014-01-02 06:01:27', '', '0000-00-00 00:00:00'),
(7, 7, 0, 'OMG Laptop Sale @Rs..1500 Off.', '', 'SCCS15OMG', 123, '0', '', 'http://www.shopclues.com/computers/laptop-sale-en.html', 0, 0, '2013-12-01 00:12:00', '2014-10-31 00:10:00', '', '', '', 1, '', 'Admin', '2014-01-02 06:01:27', '', '0000-00-00 00:00:00'),
(8, 7, 0, 'OMG Laptop Sale @Rs..1000 Off.', '', 'SCCS10OMG', 0, '0', '', 'http://www.shopclues.com/computers/laptop-sale-en.html', 0, 0, '2013-12-01 00:12:00', '2014-10-31 00:10:00', '', '', '', 1, '', 'Admin', '2014-01-02 06:01:27', '', '0000-00-00 00:00:00'),
(9, 7, 0, 'OMG Jewellery Sale Additional 12% Off @ Max 400', '', 'SCOMGJEWEL', 0, '0', '', 'http://www.shopclues.com/jewelry-and-watches/jewelry.html', 0, 0, '2013-12-01 00:12:00', '2014-10-31 00:10:00', '', '', '', 1, '', 'Admin', '2014-01-02 06:01:27', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `lft` int(10) NOT NULL,
  `rght` int(10) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `shortdesc` varchar(255) NOT NULL,
  `noofclick` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `createdby` varchar(20) NOT NULL,
  `createddate` datetime NOT NULL,
  `modifiedby` varchar(20) NOT NULL,
  `modifieddate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=321 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `lft`, `rght`, `parent_id`, `image`, `shortdesc`, `noofclick`, `status`, `createdby`, `createddate`, `modifiedby`, `modifieddate`) VALUES
(1, 'Clothing', 1, 34, 0, '', 'Clothing', 0, 1, 'Admin', '2013-12-20 08:12:09', '', '0000-00-00 00:00:00'),
(2, 'Women', 2, 27, 1, '', 'Women', 0, 1, 'Admin', '2013-12-20 08:12:35', '', '0000-00-00 00:00:00'),
(3, 'Men', 28, 29, 1, '', 'Men', 0, 1, 'Admin', '2013-12-20 08:12:56', '', '0000-00-00 00:00:00'),
(4, 'Girls', 30, 31, 1, '', 'Girls', 0, 1, 'Admin', '2013-12-20 08:12:07', '', '0000-00-00 00:00:00'),
(5, 'All Clothing', 32, 33, 1, '', 'All Clothing', 0, 1, 'Admin', '2013-12-20 08:12:25', '', '0000-00-00 00:00:00'),
(6, 'Accessories', 3, 4, 2, '', 'Accessories ', 0, 1, 'Admin', '2013-12-20 08:12:47', '', '0000-00-00 00:00:00'),
(7, 'Sarees', 5, 6, 2, '', 'Sarees', 0, 1, 'Admin', '2013-12-20 08:12:52', '', '0000-00-00 00:00:00'),
(8, 'Tops and Tees', 7, 8, 2, '', 'Tops and Tees', 0, 1, 'Admin', '2013-12-20 08:12:18', '', '0000-00-00 00:00:00'),
(9, 'kurtas and ethnic wear', 9, 10, 2, '', 'kurtas and ethnic wear', 0, 1, 'Admin', '2013-12-20 08:12:56', '', '0000-00-00 00:00:00'),
(10, 'Intimates', 11, 12, 2, '', 'Intimates', 0, 1, 'Admin', '2013-12-20 08:12:48', '', '0000-00-00 00:00:00'),
(11, 'Dress Material', 13, 14, 2, '', 'Dress Material', 0, 1, 'Admin', '2013-12-20 08:12:00', '', '0000-00-00 00:00:00'),
(12, 'Sleep and Lounge', 15, 16, 2, '', 'Sleep and Lounge', 0, 1, 'Admin', '2013-12-20 08:12:33', '', '0000-00-00 00:00:00'),
(13, 'Pants and Capris', 17, 18, 2, '', 'Pants and Capris', 0, 1, 'Admin', '2013-12-20 08:12:42', '', '0000-00-00 00:00:00'),
(14, 'Suits and suit Separates', 19, 20, 2, '', 'Suits and suit Separates', 0, 1, 'Admin', '2013-12-20 08:12:48', '', '0000-00-00 00:00:00'),
(15, 'Kitchen & Home', 35, 94, 0, '', 'Kitchen & Home', 0, 1, 'Admin', '2013-12-21 08:12:34', '', '0000-00-00 00:00:00'),
(16, ' Home & Decor', 36, 61, 15, '', ' Home & Decor', 0, 1, 'Admin', '2013-12-21 08:12:52', '', '0000-00-00 00:00:00'),
(17, 'Textiles', 37, 38, 16, '', 'Textiles', 0, 1, 'Admin', '2013-12-21 08:12:55', '', '0000-00-00 00:00:00'),
(18, 'Art Prints', 39, 40, 16, '', 'Art Prints', 0, 1, 'Admin', '2013-12-21 08:12:26', '', '0000-00-00 00:00:00'),
(19, 'Clocks', 41, 42, 16, '', 'Clocks', 0, 1, 'Admin', '2013-12-21 08:12:01', '', '0000-00-00 00:00:00'),
(20, 'Decorative Sti', 43, 44, 16, '', 'Decorative Sti', 0, 1, 'Admin', '2013-12-21 08:12:33', '', '0000-00-00 00:00:00'),
(21, 'Religious', 45, 46, 16, '', 'Religious', 0, 1, 'Admin', '2013-12-21 08:12:57', '', '0000-00-00 00:00:00'),
(22, 'Kitchen Appliances', 62, 83, 15, '', 'Kitchen Appliances', 0, 1, 'Admin', '2013-12-21 08:12:24', '', '0000-00-00 00:00:00'),
(23, 'Cookware And Bakeware', 63, 64, 22, '', 'Cookware And Bakeware', 0, 1, 'Admin', '2013-12-21 08:12:51', '', '0000-00-00 00:00:00'),
(24, 'Juicers, Mixers, Blenders And Grinders', 65, 66, 22, '', 'Juicers, Mixers, Blenders And Grinders', 0, 1, 'Admin', '2013-12-21 08:12:27', '', '0000-00-00 00:00:00'),
(25, 'Jewellery', 95, 150, 0, '', 'Jewellery', 0, 1, 'Admin', '2013-12-21 08:12:59', '', '0000-00-00 00:00:00'),
(26, 'Necklaces', 96, 103, 25, '', 'Necklaces', 0, 1, 'Admin', '2013-12-21 08:12:26', '', '0000-00-00 00:00:00'),
(27, 'Pendant Necklaces', 97, 98, 26, '', 'Pendant Necklaces', 0, 1, 'Admin', '2013-12-21 08:12:48', '', '0000-00-00 00:00:00'),
(28, 'Mangalsutras', 99, 100, 26, '', 'Mangalsutras', 0, 1, 'Admin', '2013-12-21 08:12:59', '', '0000-00-00 00:00:00'),
(29, 'Chain Necklaces', 101, 102, 26, '', 'Chain Necklaces', 0, 1, 'Admin', '2013-12-21 08:12:28', 'Admin', '2013-12-24 09:12:11'),
(30, 'Electronics', 151, 232, 0, '', 'Electronics', 0, 1, 'Admin', '2013-12-21 08:12:36', '', '0000-00-00 00:00:00'),
(31, 'Mobile', 152, 157, 30, '', 'Mobile', 0, 1, 'Admin', '2013-12-21 08:12:54', 'Admin', '2013-12-21 08:12:54'),
(32, 'Camera', 158, 173, 30, '', 'Camera And Photo', 0, 1, 'Admin', '2013-12-21 08:12:07', 'Admin', '2013-12-25 01:12:10'),
(33, 'Mobile Phone Accessories', 153, 154, 31, '', 'Mobile Phone Accessories', 0, 1, 'Admin', '2013-12-21 08:12:43', '', '0000-00-00 00:00:00'),
(34, 'Mobile Phones', 155, 156, 31, '', 'Mobile Phones', 0, 1, 'Admin', '2013-12-21 08:12:06', '', '0000-00-00 00:00:00'),
(35, 'Camera Accessories', 159, 160, 32, '', 'Camera Accessories', 0, 1, 'Admin', '2013-12-21 08:12:40', '', '0000-00-00 00:00:00'),
(36, 'Digital Cameras', 161, 162, 32, '', 'Digital Cameras', 0, 1, 'Admin', '2013-12-21 08:12:09', '', '0000-00-00 00:00:00'),
(37, 'Binoculars, Telescopes And Optics', 163, 164, 32, '', 'Binoculars, Telescopes And Optics', 0, 1, 'Admin', '2013-12-21 08:12:28', '', '0000-00-00 00:00:00'),
(38, 'Spy Cameras', 165, 166, 32, '', 'Spy Cameras', 0, 1, 'Admin', '2013-12-21 08:12:52', '', '0000-00-00 00:00:00'),
(39, 'Lenses', 167, 168, 32, '', 'Lenses', 0, 1, 'Admin', '2013-12-21 08:12:15', '', '0000-00-00 00:00:00'),
(40, 'Tripods', 169, 170, 32, '', 'Tripods', 0, 1, 'Admin', '2013-12-21 08:12:36', '', '0000-00-00 00:00:00'),
(41, 'Film Cameras', 171, 172, 32, '', 'Film Cameras', 0, 1, 'Admin', '2013-12-21 08:12:55', '', '0000-00-00 00:00:00'),
(42, 'Ass', 21, 22, 2, '', 'Ass', 0, 1, '', '2013-12-22 12:12:14', '', '0000-00-00 00:00:00'),
(43, 'oooo', 23, 24, 2, '', 'oooo', 0, 1, '', '2013-12-22 12:12:15', '', '0000-00-00 00:00:00'),
(44, 'All', 233, 234, 0, '', 'All', 0, 1, 'Admin', '2013-12-23 01:12:48', '', '0000-00-00 00:00:00'),
(45, 'Sari', 25, 26, 2, '', 'Sari', 0, 1, '', '2013-12-23 05:12:41', '', '0000-00-00 00:00:00'),
(46, 'Photo Frames', 47, 48, 16, '', 'Photo Frames', 0, 1, 'Admin', '2013-12-23 06:12:00', '', '0000-00-00 00:00:00'),
(47, 'Candles', 49, 50, 16, '', 'Candles', 0, 1, 'Admin', '2013-12-23 06:12:27', '', '0000-00-00 00:00:00'),
(48, 'Vases', 51, 52, 16, '', 'Vases', 0, 1, 'Admin', '2013-12-23 06:12:04', '', '0000-00-00 00:00:00'),
(49, 'Decorative Bowls', 53, 54, 16, '', 'Decorative Bowls', 0, 1, 'Admin', '2013-12-23 06:12:29', '', '0000-00-00 00:00:00'),
(50, 'Candle Holders', 55, 56, 16, '', 'Candle Holders', 0, 1, 'Admin', '2013-12-23 06:12:22', '', '0000-00-00 00:00:00'),
(51, 'Door Signs', 57, 58, 16, '', 'Door Signs', 0, 1, 'Admin', '2013-12-23 06:12:43', '', '0000-00-00 00:00:00'),
(52, 'Artificial Plants', 59, 60, 16, '', 'Artificial Plants', 0, 1, 'Admin', '2013-12-23 06:12:06', '', '0000-00-00 00:00:00'),
(53, 'Coffee, Tea And Espresso', 67, 68, 22, '', 'Coffee, Tea And Espresso', 0, 1, 'Admin', '2013-12-23 06:12:21', '', '0000-00-00 00:00:00'),
(54, 'Cooktops', 69, 70, 22, '', 'Cooktops', 0, 1, 'Admin', '2013-12-23 06:12:44', '', '0000-00-00 00:00:00'),
(55, 'Sandwich And Toaster Presses', 71, 72, 22, '', 'Sandwich And Toaster Presses', 0, 1, 'Admin', '2013-12-23 06:12:06', '', '0000-00-00 00:00:00'),
(56, 'Microwave Ovens', 73, 74, 22, '', 'Microwave Ovens', 0, 1, 'Admin', '2013-12-23 06:12:34', '', '0000-00-00 00:00:00'),
(57, 'Food Processors', 75, 76, 22, '', 'Food Processors', 0, 1, 'Admin', '2013-12-23 06:12:58', '', '0000-00-00 00:00:00'),
(58, 'Choppers', 77, 78, 22, '', 'Choppers', 0, 1, 'Admin', '2013-12-23 06:12:18', '', '0000-00-00 00:00:00'),
(59, 'Stoves', 79, 80, 22, '', 'Stoves', 0, 1, 'Admin', '2013-12-23 06:12:38', '', '0000-00-00 00:00:00'),
(60, 'Water Purifier', 81, 82, 22, '', 'Water Purifiers', 0, 1, 'Admin', '2013-12-23 06:12:55', 'Admin', '2013-12-25 02:12:14'),
(61, 'Furniture', 84, 85, 15, '', 'Furniture', 0, 1, 'Admin', '2013-12-23 06:12:45', '', '0000-00-00 00:00:00'),
(62, 'Tableware', 86, 93, 15, '', 'Tableware', 0, 1, 'Admin', '2013-12-23 06:12:51', '', '0000-00-00 00:00:00'),
(63, 'Dishware And Serving Pieces', 87, 88, 62, '', 'Dishware And Serving Pieces', 0, 1, 'Admin', '2013-12-23 06:12:06', '', '0000-00-00 00:00:00'),
(64, 'Cutlery', 89, 90, 62, '', 'Cutlery', 0, 1, 'Admin', '2013-12-23 06:12:43', '', '0000-00-00 00:00:00'),
(65, 'Glassware', 91, 92, 62, '', 'Glassware', 0, 1, 'Admin', '2013-12-23 06:12:14', '', '0000-00-00 00:00:00'),
(66, 'Watches', 235, 248, 0, '', 'Watches', 0, 1, 'Admin', '2013-12-23 06:12:43', '', '0000-00-00 00:00:00'),
(67, 'Wristwatches', 236, 237, 66, '', 'Wristwatches', 0, 1, 'Admin', '2013-12-23 06:12:39', '', '0000-00-00 00:00:00'),
(68, 'Men', 238, 239, 66, '', 'Men', 0, 1, 'Admin', '2013-12-23 06:12:49', '', '0000-00-00 00:00:00'),
(69, 'Women', 240, 241, 66, '', 'Women', 0, 1, 'Admin', '2013-12-23 06:12:20', '', '0000-00-00 00:00:00'),
(70, 'Luxury Watches', 242, 243, 66, '', 'Luxury Watches', 0, 1, 'Admin', '2013-12-23 06:12:48', '', '0000-00-00 00:00:00'),
(71, 'Accessories', 244, 245, 66, '', 'Accessories', 0, 1, 'Admin', '2013-12-23 07:12:00', '', '0000-00-00 00:00:00'),
(72, 'Kids', 246, 247, 66, '', 'Kids', 0, 1, 'Admin', '2013-12-23 07:12:32', '', '0000-00-00 00:00:00'),
(73, 'Computers', 249, 342, 0, '', 'Computers', 0, 1, 'Admin', '2013-12-23 07:12:04', '', '0000-00-00 00:00:00'),
(74, 'Laptop', 250, 251, 73, '', 'Laptop', 0, 1, 'Admin', '2013-12-23 07:12:22', 'Admin', '2013-12-24 08:12:52'),
(75, 'Computer Accessories', 252, 275, 73, '', 'Computer Accessories', 0, 1, 'Admin', '2013-12-23 07:12:14', '', '0000-00-00 00:00:00'),
(76, 'Portable Computer Accessories', 253, 254, 75, '', 'Portable Computer Accessories', 0, 1, 'Admin', '2013-12-23 07:12:11', '', '0000-00-00 00:00:00'),
(77, 'Adapters', 255, 256, 75, '', 'Adapters', 0, 1, 'Admin', '2013-12-23 07:12:53', '', '0000-00-00 00:00:00'),
(78, 'Tablet Accessories', 257, 258, 75, '', 'Tablet Accessories', 0, 1, 'Admin', '2013-12-23 07:12:16', '', '0000-00-00 00:00:00'),
(79, 'Printer Accessories', 259, 260, 75, '', 'Printer Accessories', 0, 1, 'Admin', '2013-12-23 07:12:37', '', '0000-00-00 00:00:00'),
(80, 'Usb Gadgets', 261, 262, 75, '', 'Usb Gadgets', 0, 1, 'Admin', '2013-12-23 07:12:04', '', '0000-00-00 00:00:00'),
(81, 'Cables', 263, 264, 75, '', 'Cables', 0, 1, 'Admin', '2013-12-23 07:12:21', '', '0000-00-00 00:00:00'),
(82, 'Usb Hubs', 265, 266, 75, '', 'Usb Hubs', 0, 1, 'Admin', '2013-12-23 07:12:40', '', '0000-00-00 00:00:00'),
(83, 'Scanner Accessories', 267, 268, 75, '', 'Scanner Accessories', 0, 1, 'Admin', '2013-12-23 07:12:56', '', '0000-00-00 00:00:00'),
(84, 'Mouse Pads', 269, 270, 75, '', 'Mouse Pads', 0, 1, 'Admin', '2013-12-23 07:12:17', '', '0000-00-00 00:00:00'),
(85, 'Blank Media', 271, 272, 75, '', 'Blank Media', 0, 1, 'Admin', '2013-12-23 07:12:31', '', '0000-00-00 00:00:00'),
(86, 'Monitor Accessories', 273, 274, 75, '', 'Monitor Accessories', 0, 1, 'Admin', '2013-12-23 07:12:53', '', '0000-00-00 00:00:00'),
(88, 'Components', 276, 299, 73, '', 'Components', 0, 1, 'Admin', '2013-12-23 07:12:58', '', '0000-00-00 00:00:00'),
(89, 'Memory', 277, 278, 88, '', 'Memory', 0, 1, 'Admin', '2013-12-23 07:12:09', '', '0000-00-00 00:00:00'),
(90, 'Graphics Cards', 279, 280, 88, '', 'Graphics Cards', 0, 1, 'Admin', '2013-12-23 07:12:26', '', '0000-00-00 00:00:00'),
(91, 'Fans And Cooling', 281, 282, 88, '', 'Fans And Cooling', 0, 1, 'Admin', '2013-12-23 07:12:49', '', '0000-00-00 00:00:00'),
(92, 'Internal Hard Drives', 283, 284, 88, '', 'Internal Hard Drives', 0, 1, 'Admin', '2013-12-23 07:12:19', '', '0000-00-00 00:00:00'),
(93, 'Power Supplies', 285, 286, 88, '', 'Power Supplies', 0, 1, 'Admin', '2013-12-23 07:12:34', '', '0000-00-00 00:00:00'),
(94, 'Internal Optical Drives', 287, 288, 88, '', 'Internal Optical Drives', 0, 1, 'Admin', '2013-12-23 07:12:59', '', '0000-00-00 00:00:00'),
(95, 'Computer Cases', 289, 290, 88, '', 'Computer Cases', 0, 1, 'Admin', '2013-12-23 07:12:17', '', '0000-00-00 00:00:00'),
(96, 'Processors', 291, 292, 88, '', 'Processors', 0, 1, 'Admin', '2013-12-23 07:12:36', '', '0000-00-00 00:00:00'),
(97, 'Internal Tv Tuner And Video Editing Cards', 293, 294, 88, '', 'Internal Tv Tuner And Video Editing Cards', 0, 1, 'Admin', '2013-12-23 07:12:57', '', '0000-00-00 00:00:00'),
(98, 'Motherboards', 295, 296, 88, '', 'Motherboards', 0, 1, 'Admin', '2013-12-23 07:12:14', '', '0000-00-00 00:00:00'),
(99, 'Network Interface Cards', 297, 298, 88, '', 'Network Interface Cards', 0, 1, 'Admin', '2013-12-23 07:12:33', '', '0000-00-00 00:00:00'),
(100, 'Networking Devices', 300, 303, 73, '', 'Networking Devices', 0, 1, 'Admin', '2013-12-23 07:12:58', '', '0000-00-00 00:00:00'),
(101, 'Network Interface Cards', 301, 302, 100, '', 'Network Interface Cards', 0, 1, 'Admin', '2013-12-23 07:12:21', '', '0000-00-00 00:00:00'),
(102, 'Keyboards, Mice And Input Devices', 304, 311, 73, '', 'Keyboards, Mice And Input Devices', 0, 1, 'Admin', '2013-12-23 07:12:47', '', '0000-00-00 00:00:00'),
(103, 'Mice', 305, 306, 102, '', 'Mice', 0, 1, 'Admin', '2013-12-23 07:12:32', '', '0000-00-00 00:00:00'),
(104, 'Keyboards', 307, 308, 102, '', 'Keyboards', 0, 1, 'Admin', '2013-12-23 07:12:48', '', '0000-00-00 00:00:00'),
(105, 'Keyboard And Mouse Sets', 309, 310, 102, '', 'Keyboard And Mouse Sets', 0, 1, 'Admin', '2013-12-23 07:12:59', '', '0000-00-00 00:00:00'),
(106, 'External Devices And Data Storage', 312, 319, 73, '', 'External Devices And Data Storage', 0, 1, 'Admin', '2013-12-23 07:12:31', '', '0000-00-00 00:00:00'),
(107, 'Usb Flash Drives', 313, 314, 106, '', 'Usb Flash Drives', 0, 1, 'Admin', '2013-12-23 07:12:51', '', '0000-00-00 00:00:00'),
(108, 'External Hard Drives', 315, 316, 106, '', 'External Hard Drives', 0, 1, 'Admin', '2013-12-23 07:12:07', '', '0000-00-00 00:00:00'),
(109, 'Media Drives', 317, 318, 106, '', 'Media Drives', 0, 1, 'Admin', '2013-12-23 07:12:34', '', '0000-00-00 00:00:00'),
(110, 'Tablets', 320, 321, 73, '', 'Tablets', 0, 1, 'Admin', '2013-12-23 07:12:18', '', '0000-00-00 00:00:00'),
(111, 'Pc Speakers', 322, 323, 73, '', 'Pc Speakers', 0, 1, 'Admin', '2013-12-23 07:12:43', '', '0000-00-00 00:00:00'),
(112, 'Printers', 324, 329, 73, '', 'Printers', 0, 1, 'Admin', '2013-12-23 07:12:03', '', '0000-00-00 00:00:00'),
(113, 'Ink Printers', 325, 326, 112, '', 'Ink Printers', 0, 1, 'Admin', '2013-12-23 07:12:22', '', '0000-00-00 00:00:00'),
(114, 'Laser Printers', 327, 328, 112, '', 'Laser Printers', 0, 1, 'Admin', '2013-12-23 07:12:49', '', '0000-00-00 00:00:00'),
(115, 'Webcams And Voip Equipment', 330, 335, 73, '', 'Webcams And Voip Equipment', 0, 1, 'Admin', '2013-12-23 07:12:11', '', '0000-00-00 00:00:00'),
(116, 'Webcams', 331, 332, 115, '', 'Webcams', 0, 1, 'Admin', '2013-12-23 07:12:31', '', '0000-00-00 00:00:00'),
(117, 'Pc Headsets', 333, 334, 115, '', 'Pc Headsets', 0, 1, 'Admin', '2013-12-23 07:12:58', '', '0000-00-00 00:00:00'),
(118, 'Monitors', 336, 337, 73, '', 'Monitors', 0, 1, 'Admin', '2013-12-23 07:12:26', '', '0000-00-00 00:00:00'),
(119, 'Desktops', 338, 339, 73, '', 'Desktops', 0, 1, 'Admin', '2013-12-23 07:12:54', '', '0000-00-00 00:00:00'),
(120, 'Scanners', 340, 341, 73, '', 'Scanners', 0, 1, 'Admin', '2013-12-23 07:12:10', '', '0000-00-00 00:00:00'),
(121, 'Shoes', 343, 354, 0, '', 'Shoes And Footwear', 0, 1, 'Admin', '2013-12-23 08:12:31', 'Admin', '2013-12-25 01:12:31'),
(122, 'Men', 344, 345, 121, '', 'Men''s Shoes', 0, 1, 'Admin', '2013-12-23 08:12:59', 'Admin', '2013-12-23 08:12:23'),
(123, 'Women', 346, 347, 121, '', 'Women''s Shoes', 0, 1, 'Admin', '2013-12-23 08:12:23', 'Admin', '2013-12-23 08:12:16'),
(124, 'Kids', 348, 349, 121, '', 'Kids'' Shoes', 0, 1, 'Admin', '2013-12-23 08:12:37', 'Admin', '2013-12-23 08:12:10'),
(125, 'Boys', 350, 351, 121, '', 'Boys'' Shoes', 0, 1, 'Admin', '2013-12-23 08:12:34', '', '0000-00-00 00:00:00'),
(126, 'Girls', 352, 353, 121, '', 'Girls'' Shoes', 0, 1, 'Admin', '2013-12-23 08:12:59', '', '0000-00-00 00:00:00'),
(127, 'Home Cinema & Tv And Video', 174, 191, 30, '', 'Home Cinema, Tv And Video', 0, 1, 'Admin', '2013-12-23 08:12:04', 'Admin', '2013-12-25 02:12:57'),
(128, 'TV', 175, 176, 127, '', 'Televisions', 0, 1, 'Admin', '2013-12-23 08:12:37', 'Admin', '2013-12-25 01:12:09'),
(129, 'Home Cinema Systems', 177, 178, 127, '', 'Home Cinema Systems', 0, 1, 'Admin', '2013-12-23 08:12:13', '', '0000-00-00 00:00:00'),
(130, 'Video Players And Recorders', 179, 180, 127, '', 'Video Players And Recorders', 0, 1, 'Admin', '2013-12-23 08:12:35', '', '0000-00-00 00:00:00'),
(131, 'Dth And Accessories', 181, 182, 127, '', 'Dth And Accessories', 0, 1, 'Admin', '2013-12-23 08:12:02', '', '0000-00-00 00:00:00'),
(132, 'Projectors', 183, 184, 127, '', 'Projectors', 0, 1, 'Admin', '2013-12-23 08:12:37', '', '0000-00-00 00:00:00'),
(133, 'Dvd Players And Recorders', 185, 186, 127, '', 'Dvd Players And Recorders', 0, 1, 'Admin', '2013-12-23 08:12:56', '', '0000-00-00 00:00:00'),
(134, 'Hd Dvd Players', 187, 188, 127, '', 'Hd Dvd Players', 0, 1, 'Admin', '2013-12-23 08:12:19', '', '0000-00-00 00:00:00'),
(135, 'Blu-Ray Players And Recorders', 189, 190, 127, '', 'Blu-Ray Players And Recorders', 0, 1, 'Admin', '2013-12-23 08:12:48', '', '0000-00-00 00:00:00'),
(136, 'Hi-Fi And Audio', 192, 203, 30, '', 'Hi-Fi And Audio', 0, 1, 'Admin', '2013-12-23 08:12:18', '', '0000-00-00 00:00:00'),
(137, 'Headphones', 193, 194, 136, '', 'Headphones', 0, 1, 'Admin', '2013-12-23 08:12:42', '', '0000-00-00 00:00:00'),
(138, 'Speakers', 195, 196, 136, '', 'Speakers', 0, 1, 'Admin', '2013-12-23 08:12:07', '', '0000-00-00 00:00:00'),
(139, 'Audio Players And Recorders', 197, 198, 136, '', 'Audio Players And Recorders', 0, 1, 'Admin', '2013-12-23 08:12:29', '', '0000-00-00 00:00:00'),
(140, 'Radios', 199, 200, 136, '', 'Radios', 0, 1, 'Admin', '2013-12-23 08:12:49', '', '0000-00-00 00:00:00'),
(141, 'Compact Stereos', 201, 202, 136, '', 'Compact Stereos', 0, 1, 'Admin', '2013-12-23 08:12:26', '', '0000-00-00 00:00:00'),
(142, 'Audio And Video Accessories', 204, 211, 30, '', 'Audio And Video Accessories', 0, 1, 'Admin', '2013-12-23 08:12:51', '', '0000-00-00 00:00:00'),
(143, 'Cables', 205, 206, 142, '', 'Cables', 0, 1, 'Admin', '2013-12-23 08:12:05', '', '0000-00-00 00:00:00'),
(144, 'Remote Controls', 207, 208, 142, '', 'Remote Controls', 0, 1, 'Admin', '2013-12-23 08:12:33', '', '0000-00-00 00:00:00'),
(145, 'Splitter', 209, 210, 142, '', 'Splitter', 0, 1, 'Admin', '2013-12-23 08:12:50', '', '0000-00-00 00:00:00'),
(146, 'Portable Audio And Video', 212, 219, 30, '', 'Portable Audio And Video', 0, 1, 'Admin', '2013-12-23 08:12:39', '', '0000-00-00 00:00:00'),
(147, 'Mp3 Players', 213, 214, 146, '', 'Mp3 Players', 0, 1, 'Admin', '2013-12-23 08:12:01', '', '0000-00-00 00:00:00'),
(148, 'Mp3 Player Accessories', 215, 216, 146, '', 'Mp3 Player Accessories', 0, 1, 'Admin', '2013-12-23 08:12:35', '', '0000-00-00 00:00:00'),
(149, 'Dvd Players', 217, 218, 146, '', 'Dvd Players', 0, 1, 'Admin', '2013-12-23 08:12:57', '', '0000-00-00 00:00:00'),
(150, 'Gps And Accessories', 220, 221, 30, '', 'Gps And Accessories', 0, 1, 'Admin', '2013-12-23 08:12:26', '', '0000-00-00 00:00:00'),
(151, 'Telephones', 222, 223, 30, '', 'Telephones', 0, 1, 'Admin', '2013-12-23 08:12:28', '', '0000-00-00 00:00:00'),
(152, 'Movies And Tv Shows', 224, 229, 30, '', 'Movies And Tv Shows', 0, 1, 'Admin', '2013-12-23 08:12:12', '', '0000-00-00 00:00:00'),
(153, 'Movies', 225, 226, 152, '', 'Movies', 0, 1, 'Admin', '2013-12-23 08:12:04', '', '0000-00-00 00:00:00'),
(154, 'TV Show', 227, 228, 152, '', 'Tv Show', 0, 1, 'Admin', '2013-12-23 08:12:27', 'Admin', '2013-12-25 01:12:26'),
(155, 'Games', 230, 231, 30, '', 'Games', 0, 1, 'Admin', '2013-12-23 08:12:14', '', '0000-00-00 00:00:00'),
(156, 'Earrings', 104, 105, 25, '', 'Earrings', 0, 1, 'Admin', '2013-12-24 09:12:23', '', '0000-00-00 00:00:00'),
(157, 'Pendants', 106, 107, 25, '', 'Pendants', 0, 1, 'Admin', '2013-12-24 09:12:09', '', '0000-00-00 00:00:00'),
(159, 'Earrings', 108, 109, 25, '', 'Earrings', 0, 1, 'Admin', '2013-12-24 09:12:42', 'Admin', '2013-12-24 09:12:57'),
(160, 'Rings', 110, 111, 25, '', 'Rings', 0, 1, 'Admin', '2013-12-24 09:12:03', 'Admin', '2013-12-24 09:12:12'),
(161, 'Bracelets', 112, 113, 25, '', 'Bracelets', 0, 1, 'Admin', '2013-12-24 09:12:29', 'Admin', '2013-12-24 09:12:48'),
(162, 'Cuff Links', 114, 115, 25, '', 'Cuff Links', 0, 1, 'Admin', '2013-12-24 09:12:13', '', '0000-00-00 00:00:00'),
(163, 'Tie Pins', 116, 117, 25, '', 'Tie Pins', 0, 1, 'Admin', '2013-12-24 09:12:30', '', '0000-00-00 00:00:00'),
(164, 'Childrens Jewellery', 118, 123, 25, '', 'Childrens Jewellery', 0, 1, 'Admin', '2013-12-24 10:12:43', 'Admin', '2013-12-24 10:12:59'),
(165, 'Girls Jewellery', 119, 120, 164, '', 'Girls Jewellery', 0, 1, 'Admin', '2013-12-24 10:12:23', '', '0000-00-00 00:00:00'),
(166, 'Boys Jewellery', 121, 122, 164, '', 'Boys Jewellery', 0, 1, 'Admin', '2013-12-24 10:12:49', '', '0000-00-00 00:00:00'),
(167, 'Jewellery Sets', 124, 125, 25, '', 'Jewellery Sets', 0, 1, 'Admin', '2013-12-24 10:12:30', '', '0000-00-00 00:00:00'),
(168, 'Body Jewellery', 126, 133, 25, '', 'Body Jewellery', 0, 1, 'Admin', '2013-12-24 10:12:41', '', '0000-00-00 00:00:00'),
(169, 'Piercing Jewellery', 127, 128, 168, '', 'Piercing Jewellery', 0, 1, 'Admin', '2013-12-24 10:12:59', '', '0000-00-00 00:00:00'),
(170, 'Toe Rings', 129, 130, 168, '', 'Toe Rings', 0, 1, 'Admin', '2013-12-24 10:12:18', '', '0000-00-00 00:00:00'),
(171, 'Belly Chains', 131, 132, 168, '', 'Belly Chains', 0, 1, 'Admin', '2013-12-24 10:12:36', '', '0000-00-00 00:00:00'),
(172, 'Wedding And Engagement Rings', 134, 139, 25, '', 'Wedding And Engagement Rings', 0, 1, 'Admin', '2013-12-24 10:12:11', '', '0000-00-00 00:00:00'),
(173, 'Bridal Sets', 135, 136, 172, '', 'Bridal Sets', 0, 1, 'Admin', '2013-12-24 10:12:28', '', '0000-00-00 00:00:00'),
(174, 'Anniversary Rings', 137, 138, 172, '', 'Anniversary Rings', 0, 1, 'Admin', '2013-12-24 10:12:49', '', '0000-00-00 00:00:00'),
(175, 'Accessories', 140, 141, 25, '', 'Accessories', 0, 1, 'Admin', '2013-12-24 10:12:26', '', '0000-00-00 00:00:00'),
(176, 'Anklets', 142, 143, 25, '', 'Anklets', 0, 1, 'Admin', '2013-12-24 10:12:52', '', '0000-00-00 00:00:00'),
(177, 'Loose Gemstones', 144, 145, 25, '', 'Loose Gemstones', 0, 1, 'Admin', '2013-12-24 10:12:16', '', '0000-00-00 00:00:00'),
(178, 'Brooches And Pins', 146, 147, 25, '', 'Brooches And Pins', 0, 1, 'Admin', '2013-12-24 10:12:44', '', '0000-00-00 00:00:00'),
(179, 'Charms', 148, 149, 25, '', 'Charms', 0, 1, 'Admin', '2013-12-24 10:12:05', '', '0000-00-00 00:00:00'),
(180, 'Toys', 355, 498, 0, '', 'Toys', 0, 1, 'Admin', '2013-12-24 12:12:08', '', '0000-00-00 00:00:00'),
(181, 'Baby And Toddler Toys', 356, 375, 180, '', 'Baby And Toddler Toys', 0, 1, 'Admin', '2013-12-24 12:12:30', '', '0000-00-00 00:00:00'),
(182, 'Soft Toys', 357, 358, 181, '', 'Soft Toys', 0, 1, 'Admin', '2013-12-24 12:12:11', '', '0000-00-00 00:00:00'),
(183, 'Baby Toys', 359, 360, 181, '', 'Baby Toys', 0, 1, 'Admin', '2013-12-24 12:12:36', '', '0000-00-00 00:00:00'),
(184, 'Stacking And Plugging Toys', 361, 362, 181, '', 'Stacking And Plugging Toys', 0, 1, 'Admin', '2013-12-24 12:12:40', '', '0000-00-00 00:00:00'),
(185, 'Motor Activity Toys', 363, 364, 181, '', 'Motor Activity Toys', 0, 1, 'Admin', '2013-12-24 12:12:15', '', '0000-00-00 00:00:00'),
(186, 'Sound Toys', 365, 366, 181, '', 'Sound Toys', 0, 1, 'Admin', '2013-12-24 12:12:41', '', '0000-00-00 00:00:00'),
(187, 'Bath Toys', 367, 368, 181, '', 'Bath Toys', 0, 1, 'Admin', '2013-12-24 12:12:04', '', '0000-00-00 00:00:00'),
(188, 'Activity Play Centres', 369, 370, 181, '', 'Activity Play Centres', 0, 1, 'Admin', '2013-12-24 12:12:31', '', '0000-00-00 00:00:00'),
(189, 'Pull Along Toys', 371, 372, 181, '', 'Pull Along Toys', 0, 1, 'Admin', '2013-12-24 12:12:33', '', '0000-00-00 00:00:00'),
(190, 'Bricks And Blocks', 373, 374, 181, '', 'Bricks And Blocks', 0, 1, 'Admin', '2013-12-24 12:12:57', '', '0000-00-00 00:00:00'),
(191, 'Arts And Crafts', 376, 385, 180, '', 'Arts And Crafts', 0, 1, 'Admin', '2013-12-24 12:12:22', '', '0000-00-00 00:00:00'),
(192, 'Drawing And Painting Supplies', 377, 378, 191, '', 'Drawing And Painting Supplies', 0, 1, 'Admin', '2013-12-24 12:12:50', '', '0000-00-00 00:00:00'),
(193, 'Craft Kits', 379, 380, 191, '', 'Craft Kits', 0, 1, 'Admin', '2013-12-24 12:12:12', '', '0000-00-00 00:00:00'),
(194, 'Clay And Dough', 381, 382, 191, '', 'Clay And Dough', 0, 1, 'Admin', '2013-12-24 12:12:36', '', '0000-00-00 00:00:00'),
(195, 'Papeterie And Stickers', 383, 384, 191, '', 'Papeterie And Stickers', 0, 1, 'Admin', '2013-12-24 12:12:54', '', '0000-00-00 00:00:00'),
(196, 'Puzzles', 386, 401, 180, '', 'Puzzles', 0, 1, 'Admin', '2013-12-24 12:12:26', '', '0000-00-00 00:00:00'),
(197, 'Jigsaw Puzzles', 387, 388, 196, '', 'Jigsaw Puzzles', 0, 1, 'Admin', '2013-12-24 12:12:53', '', '0000-00-00 00:00:00'),
(198, 'Wooden Puzzles', 389, 390, 196, '', 'Wooden Puzzles', 0, 1, 'Admin', '2013-12-24 12:12:14', '', '0000-00-00 00:00:00'),
(199, 'Pegged Puzzles', 391, 392, 196, '', 'Pegged Puzzles', 0, 1, 'Admin', '2013-12-24 12:12:33', '', '0000-00-00 00:00:00'),
(200, '3-D Puzzles', 393, 394, 196, '', '3-D Puzzles', 0, 1, 'Admin', '2013-12-24 12:12:53', '', '0000-00-00 00:00:00'),
(201, 'Floor Puzzles', 395, 396, 196, '', 'Floor Puzzles', 0, 1, 'Admin', '2013-12-24 12:12:10', '', '0000-00-00 00:00:00'),
(202, 'Sudoku Puzzles', 397, 398, 196, '', 'Sudoku Puzzles', 0, 1, 'Admin', '2013-12-24 12:12:33', '', '0000-00-00 00:00:00'),
(203, 'Puzzle Mats', 399, 400, 196, '', 'Puzzle Mats', 0, 1, 'Admin', '2013-12-24 12:12:59', '', '0000-00-00 00:00:00'),
(204, 'Sport And Outdoor', 402, 411, 180, '', 'Sport And Outdoor', 0, 1, 'Admin', '2013-12-24 12:12:46', '', '0000-00-00 00:00:00'),
(205, 'Bikes, Trikes And Ride-Ons', 403, 404, 204, '', 'Bikes, Trikes And Ride-Ons', 0, 1, 'Admin', '2013-12-24 12:12:03', '', '0000-00-00 00:00:00'),
(206, 'Beanbags And Foot Bags', 405, 406, 204, '', 'Beanbags And Foot Bags', 0, 1, 'Admin', '2013-12-24 12:12:24', '', '0000-00-00 00:00:00'),
(207, 'Pools And Water Fun', 407, 408, 204, '', 'Pools And Water Fun', 0, 1, 'Admin', '2013-12-24 12:12:45', '', '0000-00-00 00:00:00'),
(208, 'Toy Sports', 409, 410, 204, '', 'Toy Sports', 0, 1, 'Admin', '2013-12-24 12:12:02', '', '0000-00-00 00:00:00'),
(209, 'Novelty And Gag Toys', 412, 417, 180, '', 'Novelty And Gag Toys', 0, 1, 'Admin', '2013-12-24 12:12:16', '', '0000-00-00 00:00:00'),
(210, 'Key Rings', 413, 414, 209, '', 'Key Rings', 0, 1, 'Admin', '2013-12-24 12:12:28', '', '0000-00-00 00:00:00'),
(211, 'Slime And Putty Toys', 415, 416, 209, '', 'Slime And Putty Toys', 0, 1, 'Admin', '2013-12-24 12:12:06', '', '0000-00-00 00:00:00'),
(212, 'Toy Figures And Playsets', 418, 425, 180, '', 'Toy Figures And Playsets', 0, 1, 'Admin', '2013-12-24 12:12:45', 'Admin', '2013-12-24 12:12:45'),
(213, 'Toy Figures', 419, 420, 212, '', 'Toy Figures', 0, 1, 'Admin', '2013-12-24 12:12:57', '', '0000-00-00 00:00:00'),
(214, 'Playsets', 421, 424, 212, '', 'Playsets', 0, 1, 'Admin', '2013-12-24 12:12:19', '', '0000-00-00 00:00:00'),
(215, 'Learning And Education', 426, 435, 180, '', 'Learning And Education', 0, 1, 'Admin', '2013-12-24 12:12:59', '', '0000-00-00 00:00:00'),
(216, 'Reading And Writing', 427, 428, 215, '', 'Reading And Writing', 0, 1, 'Admin', '2013-12-24 12:12:28', '', '0000-00-00 00:00:00'),
(217, 'Mathematics And Counting', 429, 430, 215, '', 'Mathematics And Counting', 0, 1, 'Admin', '2013-12-24 12:12:45', '', '0000-00-00 00:00:00'),
(218, 'Science', 431, 432, 215, '', 'Science', 0, 1, 'Admin', '2013-12-24 12:12:02', '', '0000-00-00 00:00:00'),
(219, 'Explorer Toys', 433, 434, 215, '', 'Explorer Toys', 0, 1, 'Admin', '2013-12-24 12:12:20', '', '0000-00-00 00:00:00'),
(220, 'Toy Playsets Electronics', 422, 423, 214, '', 'Toy Playsets Electronics', 0, 1, 'Admin', '2013-12-24 12:12:44', 'Admin', '2013-12-24 12:12:53'),
(221, 'Games', 436, 447, 180, '', 'Games', 0, 1, 'Admin', '2013-12-24 12:12:50', '', '0000-00-00 00:00:00'),
(222, 'Board Games', 437, 438, 221, '', 'Board Games', 0, 1, 'Admin', '2013-12-24 12:12:07', '', '0000-00-00 00:00:00'),
(223, 'Action And Reflex Games', 439, 440, 221, '', 'Action And Reflex Games', 0, 1, 'Admin', '2013-12-24 12:12:54', '', '0000-00-00 00:00:00'),
(224, 'Educational Games', 441, 442, 221, '', 'Educational Games', 0, 1, 'Admin', '2013-12-24 12:12:27', '', '0000-00-00 00:00:00'),
(225, 'Card Games', 443, 444, 221, '', 'Card Games', 0, 1, 'Admin', '2013-12-24 12:12:43', '', '0000-00-00 00:00:00'),
(226, 'Chess', 445, 446, 221, '', 'Chess', 0, 1, 'Admin', '2013-12-24 12:12:59', '', '0000-00-00 00:00:00'),
(227, 'Toy Vehicles And Accessories', 448, 453, 180, '', 'Toy Vehicles And Accessories', 0, 1, 'Admin', '2013-12-24 12:12:29', '', '0000-00-00 00:00:00'),
(228, 'Toy Cars And Trucks', 449, 450, 227, '', 'Toy Cars And Trucks', 0, 1, 'Admin', '2013-12-24 12:12:46', '', '0000-00-00 00:00:00'),
(229, 'Scaled Models', 451, 452, 227, '', 'Scaled Models', 0, 1, 'Admin', '2013-12-24 01:12:30', '', '0000-00-00 00:00:00'),
(230, 'Dolls And Accessories', 454, 465, 180, '', 'Dolls And Accessories', 0, 1, 'Admin', '2013-12-24 01:12:59', '', '0000-00-00 00:00:00'),
(231, 'Baby Dolls', 455, 456, 230, '', 'Baby Dolls', 0, 1, 'Admin', '2013-12-24 01:12:29', '', '0000-00-00 00:00:00'),
(232, 'Fashion Dolls', 457, 458, 230, '', 'Fashion Dolls', 0, 1, 'Admin', '2013-12-24 01:12:55', '', '0000-00-00 00:00:00'),
(233, 'Prams', 459, 460, 230, '', 'Prams', 0, 1, 'Admin', '2013-12-24 01:12:18', '', '0000-00-00 00:00:00'),
(234, 'Playsets', 461, 462, 230, '', 'Playsets', 0, 1, 'Admin', '2013-12-24 01:12:36', '', '0000-00-00 00:00:00'),
(235, 'Dollhouses', 463, 464, 230, '', 'Dollhouses', 0, 1, 'Admin', '2013-12-24 01:12:53', '', '0000-00-00 00:00:00'),
(236, 'Die-Cast And Toy Vehicles', 466, 475, 180, '', 'Die-Cast And Toy Vehicles', 0, 1, 'Admin', '2013-12-24 01:12:15', '', '0000-00-00 00:00:00'),
(237, 'Toy Trains And Accessories', 467, 468, 236, '', 'Toy Trains And Accessories', 0, 1, 'Admin', '2013-12-24 01:12:18', '', '0000-00-00 00:00:00'),
(238, 'Toy Vehicle Playsets', 469, 470, 236, '', 'Toy Vehicle Playsets', 0, 1, 'Admin', '2013-12-24 01:12:38', '', '0000-00-00 00:00:00'),
(239, 'Slot Cars  Race Tracks And Accessories', 471, 472, 236, '', 'Slot Cars, Race Tracks And Accessories', 0, 1, 'Admin', '2013-12-24 01:12:04', '', '0000-00-00 00:00:00'),
(240, 'Aircraft', 473, 474, 236, '', 'Aircraft', 0, 1, 'Admin', '2013-12-24 01:12:34', '', '0000-00-00 00:00:00'),
(241, 'Building And Construction Toys', 476, 477, 180, '', 'Building And Construction Toys', 0, 1, 'Admin', '2013-12-24 01:12:19', '', '0000-00-00 00:00:00'),
(242, 'Radio And Remote Control', 478, 479, 180, '', 'Radio And Remote Control', 0, 1, 'Admin', '2013-12-24 01:12:36', '', '0000-00-00 00:00:00'),
(243, 'Musical Toy Instruments', 480, 481, 180, '', 'Musical Toy Instruments', 0, 1, 'Admin', '2013-12-24 01:12:58', 'Admin', '2013-12-25 01:12:36'),
(244, 'Furniture And Nursery', 482, 483, 180, '', 'Furniture And Nursery', 0, 1, 'Admin', '2013-12-24 01:12:08', '', '0000-00-00 00:00:00'),
(245, 'Electronic Toys', 484, 489, 180, '', 'Electronic Toys', 0, 1, 'Admin', '2013-12-24 01:12:47', '', '0000-00-00 00:00:00'),
(246, 'Handheld Games', 485, 486, 245, '', 'Handheld Games', 0, 1, 'Admin', '2013-12-24 01:12:12', '', '0000-00-00 00:00:00'),
(247, 'Educational Computers And Accessories', 487, 488, 245, '', 'Educational Computers And Accessories', 0, 1, 'Admin', '2013-12-24 01:12:46', '', '0000-00-00 00:00:00'),
(248, 'Model Trains And Railway Sets', 490, 491, 180, '', 'Model Trains And Railway Sets', 0, 1, 'Admin', '2013-12-24 01:12:17', '', '0000-00-00 00:00:00'),
(249, 'Model Building Kits', 492, 497, 180, '', 'Model Building Kits', 0, 1, 'Admin', '2013-12-24 01:12:42', '', '0000-00-00 00:00:00'),
(250, 'Buildings', 493, 494, 249, '', 'Buildings', 0, 1, 'Admin', '2013-12-24 01:12:06', '', '0000-00-00 00:00:00'),
(251, 'Model Building Tools', 495, 496, 249, '', 'Model Building Tools', 0, 1, 'Admin', '2013-12-24 01:12:23', '', '0000-00-00 00:00:00'),
(252, 'Automotive', 499, 534, 0, '', 'Automotive', 0, 1, 'Admin', '2013-12-24 01:12:31', '', '0000-00-00 00:00:00'),
(253, 'Car Accessories', 500, 513, 252, '', 'Car Accessories', 0, 1, 'Admin', '2013-12-24 01:12:43', '', '0000-00-00 00:00:00'),
(254, 'Air Freshener', 501, 502, 253, '', 'Air Freshener', 0, 1, 'Admin', '2013-12-24 01:12:12', '', '0000-00-00 00:00:00'),
(255, 'Mats And Carpets', 503, 504, 253, '', 'Mats And Carpets', 0, 1, 'Admin', '2013-12-24 01:12:29', '', '0000-00-00 00:00:00'),
(256, 'Car Covers', 505, 506, 253, '', 'Car Covers', 0, 1, 'Admin', '2013-12-24 01:12:46', '', '0000-00-00 00:00:00'),
(257, 'Parking Assistance', 507, 508, 253, '', 'Parking Assistance', 0, 1, 'Admin', '2013-12-24 01:12:02', '', '0000-00-00 00:00:00'),
(258, 'Breakdown Assistance', 509, 510, 253, '', 'Breakdown Assistance', 0, 1, 'Admin', '2013-12-24 01:12:18', '', '0000-00-00 00:00:00'),
(259, 'Alarm Systems And Security', 511, 512, 253, '', 'Alarm Systems And Security', 0, 1, 'Admin', '2013-12-24 01:12:34', '', '0000-00-00 00:00:00'),
(260, 'Motorbike Accessories And Parts', 514, 521, 252, '', 'Motorbike Accessories And Parts', 0, 1, 'Admin', '2013-12-24 01:12:06', '', '0000-00-00 00:00:00'),
(261, 'Accessories', 515, 516, 260, '', 'Accessories', 0, 1, 'Admin', '2013-12-24 01:12:23', '', '0000-00-00 00:00:00'),
(262, 'Protective Clothing', 517, 518, 260, '', 'Protective Clothing', 0, 1, 'Admin', '2013-12-24 01:12:37', '', '0000-00-00 00:00:00'),
(263, 'Frames And Fittings', 519, 520, 260, '', 'Frames And Fittings', 0, 1, 'Admin', '2013-12-24 01:12:56', '', '0000-00-00 00:00:00'),
(264, 'Car Styling And Parts', 522, 529, 252, '', 'Car Styling And Parts', 0, 1, 'Admin', '2013-12-24 01:12:28', '', '0000-00-00 00:00:00'),
(265, 'Interior Fittings', 523, 524, 264, '', 'Interior Fittings', 0, 1, 'Admin', '2013-12-24 01:12:46', '', '0000-00-00 00:00:00'),
(266, 'Batteries And Accessories', 525, 526, 264, '', 'Batteries And Accessories', 0, 1, 'Admin', '2013-12-24 01:12:03', '', '0000-00-00 00:00:00'),
(267, 'Instruments', 527, 528, 264, '', 'Instruments', 0, 1, 'Admin', '2013-12-24 01:12:18', '', '0000-00-00 00:00:00'),
(268, 'Tools, Maintenance And Care', 530, 531, 252, '', 'Tools, Maintenance And Care', 0, 1, 'Admin', '2013-12-24 01:12:59', '', '0000-00-00 00:00:00'),
(269, 'Enthusiast Merchandise', 532, 533, 252, '', 'Enthusiast Merchandise Stickers', 0, 1, 'Admin', '2013-12-24 01:12:25', 'Admin', '2013-12-24 01:12:34'),
(270, 'Sports', 535, 570, 0, '', 'Sports And Leisure', 0, 1, 'Admin', '2013-12-24 01:12:51', '', '0000-00-00 00:00:00'),
(271, 'Exercise And Fitness', 536, 543, 270, '', 'Exercise And Fitness', 0, 1, 'Admin', '2013-12-24 01:12:12', 'Admin', '2013-12-24 01:12:43'),
(272, 'Accessories', 537, 538, 271, '', 'Accessories', 0, 1, 'Admin', '2013-12-24 01:12:48', 'Admin', '2013-12-24 01:12:07'),
(273, 'Strength Training Equipment', 539, 540, 271, '', 'Strength Training Equipment', 0, 1, 'Admin', '2013-12-24 01:12:13', 'Admin', '2013-12-24 01:12:26'),
(274, 'Aerobic Training Machines', 541, 542, 271, '', 'Aerobic Training Machines', 0, 1, 'Admin', '2013-12-24 01:12:40', 'Admin', '2013-12-24 01:12:47'),
(279, 'Cricket', 544, 555, 270, '', 'Cricket', 0, 1, 'Admin', '2013-12-24 01:12:08', '', '0000-00-00 00:00:00'),
(280, 'Bats', 545, 546, 279, '', 'Bats', 0, 1, 'Admin', '2013-12-24 01:12:59', '', '0000-00-00 00:00:00'),
(281, 'Protective Gear', 547, 548, 279, '', 'Protective Gear', 0, 1, 'Admin', '2013-12-24 01:12:24', 'Admin', '2013-12-24 01:12:37'),
(282, 'Batting Gloves', 549, 550, 279, '', 'Batting Gloves', 0, 1, 'Admin', '2013-12-24 01:12:46', '', '0000-00-00 00:00:00'),
(283, 'Balls', 551, 552, 279, '', 'Balls', 0, 1, 'Admin', '2013-12-24 01:12:03', '', '0000-00-00 00:00:00'),
(284, 'Helmets', 553, 554, 279, '', 'Helmets', 0, 1, 'Admin', '2013-12-24 01:12:21', '', '0000-00-00 00:00:00'),
(285, 'Camping And Hiking', 556, 559, 270, '', 'Camping And Hiking', 0, 1, 'Admin', '2013-12-24 01:12:53', '', '0000-00-00 00:00:00'),
(286, 'Backpacks And Bags', 557, 558, 285, '', 'Backpacks And Bags', 0, 1, 'Admin', '2013-12-24 01:12:11', '', '0000-00-00 00:00:00'),
(287, 'Badminton', 560, 561, 270, '', 'Rackets Badminton', 0, 1, 'Admin', '2013-12-24 01:12:45', '', '0000-00-00 00:00:00'),
(288, 'Sports Clothing', 562, 569, 270, '', 'Sports Clothing', 0, 1, 'Admin', '2013-12-24 01:12:11', '', '0000-00-00 00:00:00'),
(289, 'Camping And Hiking', 563, 564, 288, '', 'Camping And Hiking', 0, 1, 'Admin', '2013-12-24 01:12:47', '', '0000-00-00 00:00:00'),
(290, 'Swimwear', 565, 566, 288, '', 'Swimwear', 0, 1, 'Admin', '2013-12-24 01:12:03', '', '0000-00-00 00:00:00'),
(291, 'Cricket', 567, 568, 288, '', 'Cricket', 0, 1, 'Admin', '2013-12-24 01:12:24', 'Admin', '2013-12-24 01:12:48'),
(292, 'Beauty Health And Personal Care', 571, 574, 0, '', 'Beauty Health And Personal Care', 0, 1, 'Admin', '2013-12-25 01:12:26', 'Admin', '2013-12-25 01:12:39'),
(293, 'Health', 572, 573, 292, '', 'Health', 0, 1, 'Admin', '2013-12-25 01:12:04', '', '0000-00-00 00:00:00'),
(313, 'Luggage Bags And Travel', 575, 590, 0, '', 'Luggage, Bags And Travel', 0, 1, 'Admin', '2013-12-26 01:12:37', 'Admin', '2013-12-26 01:12:11'),
(314, 'Luggage', 576, 577, 313, '', 'Luggage', 0, 1, 'Admin', '2013-12-26 01:12:40', '', '0000-00-00 00:00:00'),
(315, 'Backpacks', 578, 579, 313, '', 'Backpacks', 0, 1, 'Admin', '2013-12-26 01:12:27', '', '0000-00-00 00:00:00'),
(316, 'Messenger And Shoulder Bags', 580, 581, 313, '', 'Messenger And Shoulder Bags', 0, 1, 'Admin', '2013-12-26 01:12:46', '', '0000-00-00 00:00:00'),
(317, 'Canvas And Beach Tote Bags', 582, 583, 313, '', 'Canvas And Beach Tote Bags', 0, 1, 'Admin', '2013-12-26 01:12:20', '', '0000-00-00 00:00:00'),
(318, 'Travel Accessories', 584, 585, 313, '', 'Travel Accessories', 0, 1, 'Admin', '2013-12-26 01:12:52', 'Admin', '2013-12-26 01:12:18'),
(319, 'Gym Bags', 586, 587, 313, '', 'Gym Bags', 0, 1, 'Admin', '2013-12-26 01:12:32', '', '0000-00-00 00:00:00'),
(320, 'Fashion Waist Packs', 588, 589, 313, '', 'Fashion Waist Packs', 0, 1, 'Admin', '2013-12-26 01:12:01', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories_cashbacks`
--

CREATE TABLE IF NOT EXISTS `categories_cashbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cashback_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `categories_cashbacks`
--

INSERT INTO `categories_cashbacks` (`id`, `cashback_id`, `category_id`, `parent_id`) VALUES
(1, 1, 15, 0),
(2, 1, 62, 0),
(3, 1, 65, 0),
(4, 2, 44, 0),
(5, 3, 15, 0),
(6, 3, 22, 0),
(7, 3, 60, 0),
(8, 4, 30, 0),
(9, 4, 127, 0),
(10, 4, 128, 0),
(11, 5, 121, 0),
(12, 6, 73, 0),
(13, 6, 74, 0),
(14, 7, 73, 0),
(15, 7, 74, 0),
(16, 8, 73, 0),
(17, 8, 74, 0),
(18, 9, 25, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories_coupons`
--

CREATE TABLE IF NOT EXISTS `categories_coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `categories_coupons`
--

INSERT INTO `categories_coupons` (`id`, `coupon_id`, `category_id`, `parent_id`) VALUES
(1, 1, 15, 0),
(2, 1, 61, 0),
(3, 2, 44, 0),
(4, 3, 15, 0),
(5, 3, 22, 0),
(6, 3, 60, 0),
(7, 4, 30, 0),
(8, 4, 127, 0),
(9, 4, 128, 0),
(10, 5, 180, 0),
(11, 5, 243, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories_stores`
--

CREATE TABLE IF NOT EXISTS `categories_stores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `store_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `categories_stores`
--

INSERT INTO `categories_stores` (`id`, `store_id`, `category_id`, `parent_id`) VALUES
(1, 1, 2, 0),
(2, 6, 15, 0),
(3, 6, 30, 0),
(4, 6, 61, 0),
(5, 6, 62, 0),
(6, 6, 31, 0),
(7, 6, 65, 0),
(8, 7, 15, 0),
(9, 7, 22, 0),
(10, 7, 62, 0),
(11, 7, 60, 0),
(12, 8, 180, 0),
(13, 8, 243, 0);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE IF NOT EXISTS `coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `store_id` int(11) NOT NULL,
  `affiliate_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `pricerule` varchar(200) NOT NULL,
  `except_category` varchar(200) NOT NULL,
  `coupon_tag` varchar(200) NOT NULL,
  `coupontype` varchar(250) NOT NULL,
  `reviews` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `start_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(1) NOT NULL,
  `coupon_code` varchar(50) NOT NULL,
  `createby` varchar(50) NOT NULL,
  `createddate` datetime NOT NULL,
  `modifiedby` varchar(50) NOT NULL,
  `modifieddate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `store_id`, `affiliate_id`, `name`, `pricerule`, `except_category`, `coupon_tag`, `coupontype`, `reviews`, `desc`, `link`, `start_date`, `end_date`, `status`, `coupon_code`, `createby`, `createddate`, `modifiedby`, `modifieddate`) VALUES
(1, 6, 0, '20% Flat Off Max Cap 1000/-', '', '', 'Furniture', '', '', '20% Flat Off Max Cap 1000/-', 'http://www.pepperfry.com/furniture.html', '2013-12-02 00:12:00', '2014-01-31 00:01:00', 1, 'PEPOMGF20PER', '', '2014-01-02 07:01:09', '', '0000-00-00 00:00:00'),
(2, 6, 0, '20% Flat Off Max Cap 750/-', '', 'Furniture', 'Furniture', '', '', '20% Flat Off Max Cap 750/-', 'http://www.pepperfry.com/', '2013-12-02 00:12:00', '2014-01-31 00:01:00', 1, 'PEPOMG20PER', '', '2014-01-02 07:01:09', '', '0000-00-00 00:00:00'),
(3, 7, 0, 'OMG Water Purifier Sale @10% Off @ Max 750', '', '', 'Water Purifier', '', '', 'OMG Water Purifier Sale @10% Off @ Max 750', 'http://www.shopclues.com/home-applliances/small-appliances-en-2/water-purifiers.html', '2013-12-01 00:12:00', '2014-10-31 00:10:00', 1, 'SCWPOMG10', '', '2014-01-02 07:01:10', '', '0000-00-00 00:00:00'),
(4, 7, 0, 'OMG TV Sale @Rs. 700 Off on Min 17000', '', '', 'TV', '', '', 'OMG TV Sale @Rs. 700 Off on Min 17000', 'http://www.shopclues.com/electronics/tvs/led.html', '2013-12-01 00:12:00', '2014-10-31 00:10:00', 1, 'SCTVOMG10', '', '2014-01-02 07:01:10', '', '0000-00-00 00:00:00'),
(5, 8, 0, 'Save 10 % on Music Instruments', '', '', 'Musical Instryments', '', '', 'Save 10 % on Music Instruments', 'http://www.snapdeal.com/products/musical-instruments?sort=plrty&MID=Novt_MusicalInstrument_MUSIC10', '2013-12-01 00:12:00', '2014-01-30 00:01:00', 1, 'MUSIC10', '', '2014-01-02 07:01:10', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `dirty_coupons`
--

CREATE TABLE IF NOT EXISTS `dirty_coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(100) NOT NULL,
  `prodid` int(11) NOT NULL,
  `prod_cat` varchar(100) NOT NULL,
  `prod_subcat` varchar(100) NOT NULL,
  `prod_subcat_2` varchar(100) NOT NULL,
  `prod_brand` varchar(100) NOT NULL,
  `prod_desc` text NOT NULL,
  `inventory_status` varchar(50) NOT NULL,
  `manufacturer` varchar(100) NOT NULL,
  `prod_px` int(11) NOT NULL,
  `prod_disc_px` int(11) NOT NULL,
  `prod_disc_value` int(11) NOT NULL,
  `prod_disc_percentage` int(11) NOT NULL,
  `disc_condition` varchar(200) NOT NULL,
  `prod_delivery` varchar(100) NOT NULL,
  `prod_delivery_2` varchar(100) NOT NULL,
  `landing_url` varchar(200) NOT NULL,
  `prod_gender` varchar(7) NOT NULL,
  `prod_size` varchar(20) NOT NULL,
  `prod_color` varchar(100) NOT NULL,
  `prod_small_img` varchar(200) NOT NULL,
  `prod_large_img` varchar(200) NOT NULL,
  `prod_return_policy` varchar(100) NOT NULL,
  `prod_warranty` varchar(200) NOT NULL,
  `store_type` varchar(20) NOT NULL,
  `feed_url` varchar(250) NOT NULL,
  `feed_data_type` varchar(20) NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` varchar(30) NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `login_tokens`
--

CREATE TABLE IF NOT EXISTS `login_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `token` char(32) NOT NULL,
  `duration` varchar(32) NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=304 ;

--
-- Dumping data for table `login_tokens`
--

INSERT INTO `login_tokens` (`id`, `user_id`, `token`, `duration`, `used`, `created`, `expires`) VALUES
(1, 1, '5ba9e622f62a5ca905614869eaaed873', '2 weeks', 0, '2013-11-27 07:27:51', '2013-12-11 07:27:51'),
(2, 1, '1987eb0109affd7383213c3a6e2b9829', '2 weeks', 0, '2013-11-27 07:35:57', '2013-12-11 07:35:57'),
(3, 1, 'ec7ed5f0e7d625c59e91df9c2555480a', '2 weeks', 0, '2013-11-27 07:36:41', '2013-12-11 07:36:41'),
(4, 1, '886164df7266a96edf8b29068de4afa9', '2 weeks', 0, '2013-11-27 07:41:34', '2013-12-11 07:41:34'),
(5, 1, '2b4ca828d8e73b4680e8dfdf68daed0b', '2 weeks', 1, '2013-11-27 07:42:38', '2013-12-11 07:42:38'),
(6, 1, 'b26528615e5de275cd49143d3d8f4d4e', '2 weeks', 0, '2013-11-27 09:03:04', '2013-12-11 09:03:04'),
(7, 1, 'a38e1880a42fc01aef10f4a0635ffc0e', '2 weeks', 0, '2013-11-28 00:55:22', '2013-12-12 00:55:22'),
(8, 1, '4672552bfdedc263d7184b229586de42', '2 weeks', 0, '2013-11-28 01:11:17', '2013-12-12 01:11:17'),
(9, 1, '3af0beff0d9f62b248f44c373dd580ae', '2 weeks', 0, '2013-11-28 01:13:02', '2013-12-12 01:13:02'),
(10, 1, '3fd6e0b6e6b4b71fa37a2aebb0407980', '2 weeks', 0, '2013-11-28 01:32:32', '2013-12-12 01:32:32'),
(11, 1, 'd6ec2dcc3a675891745948ef5303a20c', '2 weeks', 0, '2013-11-28 01:33:51', '2013-12-12 01:33:51'),
(12, 1, '3492c0c0b4e4b33cf187427eeca4c391', '2 weeks', 0, '2013-11-28 01:34:02', '2013-12-12 01:34:02'),
(13, 1, '5e00ef914b1b16ea76289384ad578848', '2 weeks', 0, '2013-11-28 01:35:15', '2013-12-12 01:35:15'),
(14, 1, 'cf56cf63306e41a2e9196ad49a0a5c59', '2 weeks', 0, '2013-11-28 01:35:31', '2013-12-12 01:35:31'),
(15, 1, '5e4d9f07354525e6cdee17618d820779', '2 weeks', 0, '2013-11-28 01:36:05', '2013-12-12 01:36:05'),
(16, 1, 'ec006a2d34271ad60d82491951a9e432', '2 weeks', 0, '2013-11-28 01:37:30', '2013-12-12 01:37:30'),
(17, 1, 'acf7dacd7eea61f0f05e79b09151e346', '2 weeks', 0, '2013-11-28 02:06:27', '2013-12-12 02:06:27'),
(18, 1, 'ed3dbe241098a14b1e3a29d7a7eb61d7', '2 weeks', 0, '2013-11-28 02:07:52', '2013-12-12 02:07:52'),
(19, 1, '0d6c23bdbc29b00f325272df1b96292e', '2 weeks', 0, '2013-11-28 02:07:55', '2013-12-12 02:07:55'),
(20, 1, '157863fde563e02ac881b974fa25346c', '2 weeks', 0, '2013-11-28 02:08:12', '2013-12-12 02:08:12'),
(21, 3, '8677b7279c00edec90736b7b587c1793', '2 weeks', 0, '2013-11-28 02:10:45', '2013-12-12 02:10:45'),
(22, 1, '5e92a37bcf2a6d63ae4df1893308bdb8', '2 weeks', 1, '2013-11-28 02:11:21', '2013-12-12 02:11:21'),
(23, 1, '114bc9f4d2ea8a66f5798305f1bd7e22', '2 weeks', 0, '2013-11-28 02:48:31', '2013-12-12 02:48:31'),
(24, 1, '97eb0f19b8051f6f38bb2dd1de5ccfcc', '2 weeks', 0, '2013-11-28 02:52:19', '2013-12-12 02:52:19'),
(25, 1, 'b28a53a79442fae254919bf77e2cf5e4', '2 weeks', 0, '2013-11-28 02:52:25', '2013-12-12 02:52:25'),
(26, 1, '527ba8e521e3216777fc469067a47b63', '2 weeks', 0, '2013-11-28 02:52:27', '2013-12-12 02:52:27'),
(27, 1, 'b6c87743da6ee3245a59056787a83405', '2 weeks', 0, '2013-11-28 02:52:38', '2013-12-12 02:52:38'),
(28, 1, '3bba07c14b67df71fed606666b254b55', '2 weeks', 0, '2013-11-28 02:52:51', '2013-12-12 02:52:51'),
(29, 1, 'd4819b46193cc6ca687edbef01f705b3', '2 weeks', 0, '2013-11-28 02:53:13', '2013-12-12 02:53:13'),
(30, 1, '36a10a34b4b816a0cc6963f5be81fa70', '2 weeks', 1, '2013-11-28 03:05:50', '2013-12-12 03:05:50'),
(31, 1, 'd9f441bf4f28a134259b3fdb6084fba0', '2 weeks', 0, '2013-11-28 03:47:41', '2013-12-12 03:47:41'),
(32, 3, 'bdce0c263d4859c28970fe9040e426ab', '2 weeks', 1, '2013-11-28 03:53:11', '2013-12-12 03:53:11'),
(33, 1, '64133bb7bd65eeb9163b4790eb4533ad', '2 weeks', 0, '2013-11-28 05:03:21', '2013-12-12 05:03:21'),
(34, 3, '70763f05bc687d45b4f75df9b1f9b99c', '2 weeks', 0, '2013-11-28 05:31:17', '2013-12-12 05:31:17'),
(35, 1, '45e587e96ad9035389b6ba76b0192966', '2 weeks', 0, '2013-11-28 05:31:51', '2013-12-12 05:31:51'),
(36, 1, '7bbb2a958e978edde0404a63a00da389', '2 weeks', 1, '2013-11-28 06:40:27', '2013-12-12 06:40:27'),
(37, 1, '59177810beae5cc33f7d2f542358069f', '2 weeks', 1, '2013-11-28 06:40:59', '2013-12-12 06:40:59'),
(38, 1, 'bbc53cc764ee808da019386698b3c9e9', '2 weeks', 0, '2013-11-28 07:18:42', '2013-12-12 07:18:42'),
(39, 1, 'f6489dc8c0e622bb4e78d5052c24b977', '2 weeks', 0, '2013-11-28 07:19:33', '2013-12-12 07:19:33'),
(40, 1, 'da2de69508f07a3d00c9ef4f6c429660', '2 weeks', 0, '2013-11-28 07:19:41', '2013-12-12 07:19:41'),
(41, 1, '0c71f58b385fc91cf63cc23186f2ee2b', '2 weeks', 0, '2013-11-28 07:19:49', '2013-12-12 07:19:49'),
(42, 1, '865e4525460913b243e0c1735fa5990e', '2 weeks', 0, '2013-11-28 07:20:15', '2013-12-12 07:20:15'),
(43, 1, '9e9abe99fccb4f214311aafa7e80a6ad', '2 weeks', 1, '2013-11-28 07:20:49', '2013-12-12 07:20:49'),
(44, 1, 'a4a6cb8afb738665ab6cde7ee31e7823', '2 weeks', 0, '2013-11-28 07:43:50', '2013-12-12 07:43:50'),
(45, 1, '8265981268cd353788d065e899bc5e52', '2 weeks', 0, '2013-11-28 07:44:06', '2013-12-12 07:44:06'),
(46, 1, '4d661e52bb6e26df0d7db68f256a8030', '2 weeks', 0, '2013-11-28 07:57:07', '2013-12-12 07:57:07'),
(47, 1, 'c47ccbecc1d853354088d24127a78d4f', '2 weeks', 0, '2013-11-28 08:14:51', '2013-12-12 08:14:51'),
(48, 1, '0201c1669f1442c3806db1513b07886d', '2 weeks', 0, '2013-11-28 08:15:15', '2013-12-12 08:15:15'),
(49, 1, '4599e50dae84083e5960a9654c727146', '2 weeks', 0, '2013-11-28 08:15:42', '2013-12-12 08:15:42'),
(50, 1, 'eafcb347ee7ed4da49b8884b6746af3a', '2 weeks', 0, '2013-11-28 08:16:03', '2013-12-12 08:16:03'),
(51, 3, 'a0ababb8d2500b01fe57b78eec57358c', '2 weeks', 0, '2013-11-28 08:28:30', '2013-12-12 08:28:30'),
(52, 1, 'caa56ffeedb85a528ad7e78ce3f7030b', '2 weeks', 0, '2013-11-28 08:45:09', '2013-12-12 08:45:09'),
(53, 1, '5cb67f7a4d963c25b894088ced3c1d06', '2 weeks', 0, '2013-11-28 13:47:16', '2013-12-12 13:47:16'),
(54, 1, '4e1ba931daeed363da89a7a9c7300c2d', '2 weeks', 0, '2013-11-28 13:48:12', '2013-12-12 13:48:12'),
(55, 1, '62e2881e3adc6655d9d7183269ea6fe0', '2 weeks', 1, '2013-11-28 14:01:38', '2013-12-12 14:01:38'),
(56, 1, '4afae652e5fbd87e4bbac83bb36594b2', '2 weeks', 0, '2013-11-28 23:12:33', '2013-12-12 23:12:33'),
(57, 1, '2f977d2b8b556f904927d1e12c5c87e1', '2 weeks', 0, '2013-11-29 00:02:42', '2013-12-13 00:02:42'),
(58, 1, '7d7d2b898c7e8c749f365e1e5baf31d4', '2 weeks', 0, '2013-11-29 00:19:59', '2013-12-13 00:19:59'),
(59, 1, '58dd52f937ad5bad6499e7d524ec7b46', '2 weeks', 1, '2013-11-29 00:24:49', '2013-12-13 00:24:49'),
(60, 1, 'd213d3daf413c2332bb75010cb794683', '2 weeks', 0, '2013-11-29 02:07:34', '2013-12-13 02:07:34'),
(61, 1, 'abef031cc05454ba70b9122eeb22fd12', '2 weeks', 1, '2013-11-29 02:20:18', '2013-12-13 02:20:18'),
(62, 1, 'a88f0f6a85a7fb35975f71331d4cdf6c', '2 weeks', 1, '2013-11-29 03:00:15', '2013-12-13 03:00:15'),
(63, 1, '646fdda435e660de7589c6f3b48b36a2', '2 weeks', 0, '2013-11-29 03:00:30', '2013-12-13 03:00:30'),
(64, 1, '824ad75b9b767ebce06140108d4740a6', '2 weeks', 0, '2013-11-29 03:14:59', '2013-12-13 03:14:59'),
(65, 1, 'c33e9929d9853190981893dd8be22cb7', '2 weeks', 0, '2013-11-29 04:47:54', '2013-12-13 04:47:54'),
(66, 3, 'f14530b3cf7de0864b997d1ebbd8bba5', '2 weeks', 0, '2013-11-29 05:13:51', '2013-12-13 05:13:51'),
(67, 1, '1811000a388384ad37619ac96fbaecda', '2 weeks', 1, '2013-11-29 05:15:21', '2013-12-13 05:15:21'),
(68, 1, '927fbb98f484df33f47512c7c876e257', '2 weeks', 0, '2013-11-29 06:25:52', '2013-12-13 06:25:52'),
(69, 1, '927b8b2d7315a7962f2a940a1af86b6d', '2 weeks', 1, '2013-11-29 06:47:32', '2013-12-13 06:47:32'),
(70, 1, 'aa6b0dcbd52d43a2e6272565dabbf3d6', '2 weeks', 0, '2013-11-29 07:23:30', '2013-12-13 07:23:30'),
(71, 1, 'c5f2c5ca600e755232378b7c54f69204', '2 weeks', 0, '2013-11-29 07:31:42', '2013-12-13 07:31:42'),
(72, 1, '7f2e217d47a2d2049436831fbab78149', '2 weeks', 1, '2013-12-01 10:05:21', '2013-12-15 10:05:21'),
(73, 1, 'c1cdcaa4439b4c701fb4645c82f4a32e', '2 weeks', 0, '2013-12-01 12:50:54', '2013-12-15 12:50:54'),
(74, 1, 'ee21bb8c259812d3b93845277c3a9114', '2 weeks', 0, '2013-12-01 13:27:59', '2013-12-15 13:27:59'),
(75, 1, '4e7eb448020785ac78b1eb0fb1eeaec4', '2 weeks', 0, '2013-12-02 01:50:02', '2013-12-16 01:50:02'),
(76, 3, '9c19d96d35a32e9c12bbf131a7050ab8', '2 weeks', 0, '2013-12-02 03:54:18', '2013-12-16 03:54:18'),
(77, 1, '579ca7181cca7341a26a07e05d7186c5', '2 weeks', 0, '2013-12-02 03:59:04', '2013-12-16 03:59:04'),
(78, 1, '917f6c1c8c558d127c306f7c27cff1c3', '2 weeks', 0, '2013-12-02 04:02:30', '2013-12-16 04:02:30'),
(79, 3, 'c576d117285a4e17aa3fb00f2f2d5898', '2 weeks', 0, '2013-12-02 04:03:37', '2013-12-16 04:03:37'),
(80, 1, 'b59392f42e28aa4b8028a520c727e26f', '2 weeks', 0, '2013-12-02 04:17:55', '2013-12-16 04:17:55'),
(81, 3, '9bde2efea218770fad66a62465d0ee9a', '2 weeks', 0, '2013-12-02 04:18:37', '2013-12-16 04:18:37'),
(82, 1, 'a82e33073b7ccbc6b518acfedf99e808', '2 weeks', 0, '2013-12-02 04:18:50', '2013-12-16 04:18:50'),
(83, 1, 'd166ba0245ad88510ad3d366ca70c45a', '2 weeks', 0, '2013-12-02 04:32:40', '2013-12-16 04:32:40'),
(84, 1, '5dd2681acecd080444742b362fa32d93', '2 weeks', 0, '2013-12-02 06:36:53', '2013-12-16 06:36:53'),
(85, 1, '9878743b96ab58b0b0327348eb895a7c', '2 weeks', 1, '2013-12-02 07:18:48', '2013-12-16 07:18:48'),
(86, 1, '27d1eadd683d11e7d6e07abecaa16dc3', '2 weeks', 0, '2013-12-02 08:41:05', '2013-12-16 08:41:05'),
(87, 1, '651c1eb22a51d46020f113bcf4d515c8', '2 weeks', 0, '2013-12-02 12:50:32', '2013-12-16 12:50:32'),
(88, 1, 'bc5778d8e2a2ec813b9c3c59dc25258f', '2 weeks', 0, '2013-12-03 00:36:58', '2013-12-17 00:36:58'),
(89, 3, 'cebbf6c5068a125ec8780bfa34f78fe5', '2 weeks', 0, '2013-12-03 01:39:25', '2013-12-17 01:39:25'),
(90, 1, '66d88dae80d4da68ef7430c1baf5323a', '2 weeks', 0, '2013-12-03 01:39:54', '2013-12-17 01:39:54'),
(91, 3, '44ebed182fac68c071e7489959648618', '2 weeks', 0, '2013-12-03 01:41:07', '2013-12-17 01:41:07'),
(92, 1, '4debd7a4a1f35094dd70f5254d6e5093', '2 weeks', 1, '2013-12-03 01:41:58', '2013-12-17 01:41:58'),
(93, 1, 'bc650e5a21c543a159b709cd9ff39755', '2 weeks', 0, '2013-12-03 04:33:43', '2013-12-17 04:33:43'),
(94, 1, '524ce8bb40d28b98618618ccc2382171', '2 weeks', 1, '2013-12-03 05:41:42', '2013-12-17 05:41:42'),
(95, 1, '4a2c649d26d7fa7d948a7946ba28b519', '2 weeks', 0, '2013-12-03 07:09:06', '2013-12-17 07:09:06'),
(96, 1, '47df0f2df3edecf9477c1f2b60427ef3', '2 weeks', 0, '2013-12-03 07:42:42', '2013-12-17 07:42:42'),
(97, 1, '58b1335c96bdf2e03638e918b932a5ce', '2 weeks', 1, '2013-12-03 08:33:38', '2013-12-17 08:33:38'),
(98, 1, 'db4093cc2b19d6be42eeb954b28b313d', '2 weeks', 0, '2013-12-03 08:33:47', '2013-12-17 08:33:47'),
(99, 1, '2cefed524c510f93fed13d7e73b6f80e', '2 weeks', 0, '2013-12-03 08:36:02', '2013-12-17 08:36:02'),
(100, 1, '059a2292e96779e31938b4ddebcaea5d', '2 weeks', 0, '2013-12-03 10:57:21', '2013-12-17 10:57:21'),
(101, 1, '67f7ad6a0f36a1eca0c74ffb9e9c6f32', '2 weeks', 1, '2013-12-03 11:11:58', '2013-12-17 11:11:58'),
(102, 1, '2e66423da8dcd904e9c68e53c4e0f457', '2 weeks', 0, '2013-12-03 12:24:03', '2013-12-17 12:24:03'),
(103, 1, '7dd8d74bf8941742aaef0e96241b15e4', '2 weeks', 0, '2013-12-03 12:53:05', '2013-12-17 12:53:05'),
(104, 1, '0b499e16922c31bccd59e13d08b2aaac', '2 weeks', 1, '2013-12-03 13:06:13', '2013-12-17 13:06:13'),
(105, 1, '3d3fd2b094065c3ef7910dd4882e2aee', '2 weeks', 0, '2013-12-04 03:11:29', '2013-12-18 03:11:29'),
(106, 1, 'e0c375d27ae7dee35ed6e42b7d45f9f4', '2 weeks', 0, '2013-12-04 04:18:33', '2013-12-18 04:18:33'),
(107, 1, 'dde827812875823213558cae611be6ef', '2 weeks', 0, '2013-12-04 04:19:03', '2013-12-18 04:19:03'),
(108, 1, 'dadedada5d7da9b04846d3d63336d80d', '2 weeks', 0, '2013-12-04 04:55:58', '2013-12-18 04:55:58'),
(109, 1, 'ed12d8d520f7581eaf7812acda03603e', '2 weeks', 0, '2013-12-04 07:33:44', '2013-12-18 07:33:44'),
(110, 1, 'd322d3d7d3491a68c029be275a226dd2', '2 weeks', 0, '2013-12-04 07:34:59', '2013-12-18 07:34:59'),
(111, 1, 'b72d258c1c7f1cbff948f37a557fbcb8', '2 weeks', 0, '2013-12-04 07:57:12', '2013-12-18 07:57:12'),
(112, 1, '69a3676bd93e82a643942097f51cc0fa', '2 weeks', 0, '2013-12-04 08:22:19', '2013-12-18 08:22:19'),
(113, 1, 'f04e0582bb8c8255f5ca8fa4cb1ea1fa', '2 weeks', 0, '2013-12-04 08:22:48', '2013-12-18 08:22:48'),
(114, 1, 'c8f716c00f0bf0eeab1932e2d0b0ca8f', '2 weeks', 0, '2013-12-04 08:28:29', '2013-12-18 08:28:29'),
(115, 1, '4e7b461585d165e64bb2b1683d428068', '2 weeks', 0, '2013-12-04 08:31:44', '2013-12-18 08:31:44'),
(116, 1, '5f4ef32684239e88822b89234b1a3937', '2 weeks', 0, '2013-12-04 08:34:52', '2013-12-18 08:34:52'),
(117, 1, 'd40b291188ee87c5e5ee84ba12c22a03', '2 weeks', 0, '2013-12-04 08:36:32', '2013-12-18 08:36:32'),
(118, 1, '22f6a987b588f85f883d0d170b9a834a', '2 weeks', 0, '2013-12-04 08:46:38', '2013-12-18 08:46:38'),
(119, 1, '2e1a5f6613a44d36a18749daa171d17a', '2 weeks', 0, '2013-12-04 08:46:47', '2013-12-18 08:46:47'),
(120, 1, '804f8018509580e41eb513c5d9b8eb52', '2 weeks', 0, '2013-12-04 08:46:58', '2013-12-18 08:46:58'),
(121, 1, '8a32e6e7e96851e9749c5f0f2ca16e6b', '2 weeks', 0, '2013-12-04 08:47:01', '2013-12-18 08:47:01'),
(122, 1, '2ce8968545b2c4d192e811554d25175a', '2 weeks', 1, '2013-12-04 08:47:15', '2013-12-18 08:47:15'),
(123, 1, '0979d52e05f427dbfde13fcbfe53000f', '2 weeks', 0, '2013-12-04 11:00:04', '2013-12-18 11:00:04'),
(124, 1, '09ff74d7e5588332d7707d3303795ce2', '2 weeks', 1, '2013-12-04 11:32:27', '2013-12-18 11:32:27'),
(125, 1, '665cd240f6ac9e5c75c3d5c795163763', '2 weeks', 0, '2013-12-04 12:38:19', '2013-12-18 12:38:19'),
(126, 1, 'f2f5f5bf5ace8de0deb4bbd85178b9a5', '2 weeks', 1, '2013-12-04 12:39:38', '2013-12-18 12:39:38'),
(127, 1, '43f419318219a47e9e982691b4fc4534', '2 weeks', 0, '2013-12-04 12:47:26', '2013-12-18 12:47:26'),
(128, 1, '35ebee23ddf61f2f726525bc8ceb2b1d', '2 weeks', 0, '2013-12-04 12:54:01', '2013-12-18 12:54:01'),
(129, 1, '7137e45b30e912c6ad5daadd44a31b59', '2 weeks', 1, '2013-12-04 13:11:34', '2013-12-18 13:11:34'),
(130, 1, 'ee81d005ce0c310f16b214f8a563a771', '2 weeks', 0, '2013-12-04 23:00:59', '2013-12-18 23:00:59'),
(131, 1, 'ea1b40ac7bd07ae6458679f5807e8276', '2 weeks', 0, '2013-12-04 23:04:19', '2013-12-18 23:04:19'),
(132, 1, 'c6958dddb1be8dff123cb17cc9710e0a', '2 weeks', 0, '2013-12-04 23:04:22', '2013-12-18 23:04:22'),
(133, 1, '31e599b06ef665c4f13fd92218152c42', '2 weeks', 1, '2013-12-04 23:05:14', '2013-12-18 23:05:14'),
(134, 1, '778832b6a432280281b984abebef834c', '2 weeks', 0, '2013-12-05 02:41:47', '2013-12-19 02:41:47'),
(135, 1, 'a845d7d92697d343d02319ac274c8980', '2 weeks', 0, '2013-12-05 04:07:36', '2013-12-19 04:07:36'),
(136, 1, '9faa0a0a7724a97b71185b8402d02f1a', '2 weeks', 0, '2013-12-05 04:08:55', '2013-12-19 04:08:55'),
(137, 1, '6f0ef08e6727f74a9e943e90b6daab80', '2 weeks', 1, '2013-12-05 04:59:05', '2013-12-19 04:59:05'),
(138, 1, 'b6efdd73f68c22cfef31dafd607b587d', '2 weeks', 0, '2013-12-05 06:39:15', '2013-12-19 06:39:15'),
(139, 1, '12b0ddeeae446b08d352247cf5d3fdd7', '2 weeks', 0, '2013-12-05 08:09:08', '2013-12-19 08:09:08'),
(140, 1, '47c64d475868de6ea1406e8075184e89', '2 weeks', 1, '2013-12-05 08:11:58', '2013-12-19 08:11:58'),
(141, 1, '2c4dcf07c6ff3058bd97302115eecb80', '2 weeks', 0, '2013-12-06 00:31:38', '2013-12-20 00:31:38'),
(142, 1, 'd0673b04641dc5ed76dfb2ca88454ee4', '2 weeks', 0, '2013-12-06 00:32:08', '2013-12-20 00:32:08'),
(143, 1, 'bcf8747c18432a77cfa60b2461c8c396', '2 weeks', 0, '2013-12-06 00:32:13', '2013-12-20 00:32:13'),
(144, 1, '126851bc0cd5d59ba6b6fad2f974cf75', '2 weeks', 0, '2013-12-06 00:32:20', '2013-12-20 00:32:20'),
(145, 1, '90ca5f4ef4a78f2d49ecf7d34f666c3e', '2 weeks', 0, '2013-12-06 00:32:24', '2013-12-20 00:32:24'),
(146, 1, '7b409ff9762f0049c32fab11d9a05728', '2 weeks', 0, '2013-12-06 00:32:44', '2013-12-20 00:32:44'),
(147, 1, 'f88a8c3ac79dd781317c3fefb9ce345f', '2 weeks', 0, '2013-12-06 00:32:49', '2013-12-20 00:32:49'),
(148, 1, 'c2c1d0faddb9a9bc9f4f01bc16e14ebc', '2 weeks', 0, '2013-12-06 00:43:18', '2013-12-20 00:43:18'),
(149, 1, '207e16d0152bed791c34a8e9c5b5a6fd', '2 weeks', 0, '2013-12-06 00:45:32', '2013-12-20 00:45:32'),
(150, 1, '13bc0376cfadca1a0fb5ceced4d5f160', '2 weeks', 0, '2013-12-06 00:47:01', '2013-12-20 00:47:01'),
(151, 1, 'cb1b8de666a1ac376695214b5dca47b3', '2 weeks', 0, '2013-12-06 00:47:22', '2013-12-20 00:47:22'),
(152, 1, '5e26421ddbb95beaee41497eb7724e72', '2 weeks', 1, '2013-12-06 01:26:19', '2013-12-20 01:26:19'),
(153, 0, '21dd9ecc80c5a07b78c4a95058a3f19a', '2 weeks', 0, '2013-12-06 02:21:47', '2013-12-20 02:21:47'),
(154, 1, 'eba7658629c20359e5ab51bbb9222552', '2 weeks', 1, '2013-12-06 03:45:59', '2013-12-20 03:45:59'),
(155, 1, 'ad64c40f20eaa9ebf1e4154fc681af88', '2 weeks', 0, '2013-12-06 05:27:18', '2013-12-20 05:27:18'),
(156, 1, '03e092c014ab44ad4749fe4535db62c9', '2 weeks', 1, '2013-12-06 05:53:24', '2013-12-20 05:53:24'),
(157, 1, '40141e78fac6a3cd3737fdc9c12ea25e', '2 weeks', 1, '2013-12-06 06:03:45', '2013-12-20 06:03:45'),
(158, 1, '12cd71fa48db2dfcd97d9eae9d403b27', '2 weeks', 1, '2013-12-06 07:47:42', '2013-12-20 07:47:42'),
(159, 1, '087e1bb73473ed2c5f999186c924bb7b', '2 weeks', 1, '2013-12-06 13:43:26', '2013-12-20 13:43:26'),
(160, 1, '70173d75a80a6e81f2e30609c881309e', '2 weeks', 0, '2013-12-06 14:19:33', '2013-12-20 14:19:33'),
(161, 1, '1e3c565dea4c7d29e2c812b6bb3a7158', '2 weeks', 0, '2013-12-06 23:29:15', '2013-12-20 23:29:15'),
(162, 1, '999c231f6f20bf63a41c0f39cc29e73b', '2 weeks', 1, '2013-12-07 11:05:18', '2013-12-21 11:05:18'),
(163, 0, '910fe72644608b165bc81f5587a70c6b', '2 weeks', 0, '2013-12-07 11:35:20', '2013-12-21 11:35:20'),
(164, 0, '2d102c6a8dcbfda4128f404d821b109d', '2 weeks', 0, '2013-12-07 11:35:20', '2013-12-21 11:35:20'),
(165, 1, 'c7f03a572920b91ed646c763abc21f54', '2 weeks', 0, '2013-12-08 03:41:51', '2013-12-22 03:41:51'),
(166, 1, 'b1de288e399bb0e61ef3b8b4c4196c79', '2 weeks', 0, '2013-12-08 03:45:24', '2013-12-22 03:45:24'),
(167, 1, 'f66d85895ed6bc31f12f7ebd9988cdd3', '2 weeks', 1, '2013-12-08 03:47:04', '2013-12-22 03:47:04'),
(168, 1, 'b6488782c79262e008a890eca6113c85', '2 weeks', 0, '2013-12-08 03:49:01', '2013-12-22 03:49:01'),
(169, 1, 'f73da5758515a264b6acfe084422ccd8', '2 weeks', 0, '2013-12-08 03:49:49', '2013-12-22 03:49:49'),
(170, 1, '83094747e4e494c098a69248f243f16b', '2 weeks', 0, '2013-12-08 03:50:35', '2013-12-22 03:50:35'),
(171, 1, '35d15385d4d2ead4cf0cabf8ec183bad', '2 weeks', 0, '2013-12-08 03:51:01', '2013-12-22 03:51:01'),
(172, 1, '2a188041949a5f3b767c00ebdd501f1d', '2 weeks', 0, '2013-12-08 03:54:55', '2013-12-22 03:54:55'),
(173, 1, '31944c8b02d23099ad812e9bc2dec36f', '2 weeks', 0, '2013-12-08 04:36:43', '2013-12-22 04:36:43'),
(174, 1, 'b36fb2a327939c39682946de53bfdac0', '2 weeks', 0, '2013-12-08 04:42:17', '2013-12-22 04:42:17'),
(175, 1, 'd4f560bf1ffed23dfc9189a9fddd306f', '2 weeks', 0, '2013-12-08 04:44:11', '2013-12-22 04:44:11'),
(176, 1, '16f44d55312ffa0eb9107ba1d0641747', '2 weeks', 0, '2013-12-08 04:58:08', '2013-12-22 04:58:08'),
(177, 1, '9168e14c725d6b29e6caf8bb7201b3bf', '2 weeks', 0, '2013-12-08 05:00:44', '2013-12-22 05:00:44'),
(178, 1, '9cbeb930245c7c9e4f9b1caf2217ff74', '2 weeks', 0, '2013-12-08 05:01:42', '2013-12-22 05:01:42'),
(179, 1, 'b85babde21e835823f19af94ba349352', '2 weeks', 0, '2013-12-08 05:07:02', '2013-12-22 05:07:02'),
(180, 1, 'dc29233935a48df4fc7e99dd587f6335', '2 weeks', 0, '2013-12-08 05:35:39', '2013-12-22 05:35:39'),
(181, 1, 'be8644e4d35cd561b5116f733e5a6012', '2 weeks', 0, '2013-12-08 05:37:48', '2013-12-22 05:37:48'),
(182, 1, '60202e277986200c9cbc2c44a3fba4b5', '2 weeks', 1, '2013-12-08 09:51:13', '2013-12-22 09:51:13'),
(183, 1, '861dd0e79ea14b4a4a9315555e27be4c', '2 weeks', 0, '2013-12-08 12:07:11', '2013-12-22 12:07:11'),
(184, 1, 'e921089dd073d350391aa67bb70fe737', '2 weeks', 0, '2013-12-08 23:39:17', '2013-12-22 23:39:17'),
(185, 1, '9692033eccaeb4b485a60b35a9dd840f', '2 weeks', 0, '2013-12-08 23:39:23', '2013-12-22 23:39:23'),
(186, 3, '2d12b063787d0c5701aea6a8ff9bed9b', '2 weeks', 1, '2013-12-09 00:40:23', '2013-12-23 00:40:23'),
(187, 1, '594d2969fdb13c01bdedea4b7a50cca0', '2 weeks', 1, '2013-12-09 00:54:14', '2013-12-23 00:54:14'),
(188, 1, 'f056b23b85ca6500099bd05d01fb9ac6', '2 weeks', 1, '2013-12-09 01:58:01', '2013-12-23 01:58:01'),
(189, 3, 'd4b6ee9d2f981cabe750c2065b24a437', '2 weeks', 1, '2013-12-09 02:03:39', '2013-12-23 02:03:39'),
(190, 3, '1f9cfb6451305f3eeb259650b0d36dd0', '2 weeks', 0, '2013-12-09 04:49:34', '2013-12-23 04:49:34'),
(191, 1, '27abf682eceb25b56be17eb6f55aa7c0', '2 weeks', 1, '2013-12-09 04:49:42', '2013-12-23 04:49:42'),
(192, 1, 'b4847bbfd2a30a8c54713d4a5b59647e', '2 weeks', 0, '2013-12-09 05:12:43', '2013-12-23 05:12:43'),
(193, 1, 'b792129588ca186f408fe99c5a659476', '2 weeks', 0, '2013-12-09 23:34:00', '2013-12-23 23:34:00'),
(194, 1, 'a3da9f945ce6c8bfb8d2d912b9f19b2c', '2 weeks', 1, '2013-12-09 23:55:08', '2013-12-23 23:55:08'),
(195, 1, 'aed749dc676e8407f0d5b7908f5ac3c0', '2 weeks', 1, '2013-12-10 01:18:05', '2013-12-24 01:18:05'),
(196, 1, '41b942859b2cc06050cbd62bb9e92334', '2 weeks', 1, '2013-12-10 02:45:33', '2013-12-24 02:45:33'),
(197, 1, 'cf88c514c72271604b07c6bacb01f2ae', '2 weeks', 1, '2013-12-10 05:26:30', '2013-12-24 05:26:30'),
(198, 1, 'caef9a5946f158c20389acd765065bf1', '2 weeks', 1, '2013-12-10 12:23:17', '2013-12-24 12:23:17'),
(199, 1, '8a6d051348d4503c46b99fde5e34d13c', '2 weeks', 1, '2013-12-11 03:08:15', '2013-12-25 03:08:15'),
(200, 1, '06eb3fbbdc1c724f8204f9c782b86fe4', '2 weeks', 1, '2013-12-11 04:41:32', '2013-12-25 04:41:32'),
(201, 1, '76d2c15f6ae897bc1a46152da386cd5c', '2 weeks', 1, '2013-12-11 07:20:02', '2013-12-25 07:20:02'),
(202, 1, '0371e59a0afd3eeebdb0407fdd021ba0', '2 weeks', 1, '2013-12-11 12:56:44', '2013-12-25 12:56:44'),
(203, 1, '00fa003b0e40c8b50cf668f32780369f', '2 weeks', 1, '2013-12-11 13:49:02', '2013-12-25 13:49:02'),
(204, 1, '4cf40090425cc0634a776846be805081', '2 weeks', 1, '2013-12-12 00:34:53', '2013-12-26 00:34:53'),
(205, 1, 'e5c8caf85d36472681e7c39c1dbb8b02', '2 weeks', 1, '2013-12-12 01:12:03', '2013-12-26 01:12:03'),
(206, 1, '6850a64bdace5fb02b11a3eab52b1367', '2 weeks', 0, '2013-12-12 02:00:46', '2013-12-26 02:00:46'),
(207, 1, '11ea8e8b2bd6bbcbea8dfdd10d581222', '2 weeks', 1, '2013-12-12 03:46:13', '2013-12-26 03:46:13'),
(208, 1, 'ff6282af3181b0ff520e6235a6f12f0e', '2 weeks', 1, '2013-12-12 04:38:10', '2013-12-26 04:38:10'),
(209, 1, '3bf38dbadda0ba0f76d892d8402c8946', '2 weeks', 1, '2013-12-12 08:44:32', '2013-12-26 08:44:32'),
(210, 1, '0288f6cd84f469d2cadc867055743cd4', '2 weeks', 0, '2013-12-13 05:23:09', '2013-12-27 05:23:09'),
(211, 1, 'a224f248575535f536a4c1e0d1dde2bb', '2 weeks', 0, '2013-12-13 05:59:52', '2013-12-27 05:59:52'),
(212, 1, 'ab96accf2a7b6c62ea86e95386793fb3', '2 weeks', 1, '2013-12-13 09:30:23', '2013-12-27 09:30:23'),
(213, 1, '0bb4a228e578fa9bed1b8ae4139ae13c', '2 weeks', 0, '2013-12-14 05:35:01', '2013-12-28 05:35:01'),
(214, 1, '7b5faf8d5a0254bae855c2f5a18d2841', '2 weeks', 1, '2013-12-14 06:22:15', '2013-12-28 06:22:15'),
(215, 1, '703b105b90852849522b8c9c59c07a24', '2 weeks', 0, '2013-12-15 23:36:23', '2013-12-29 23:36:23'),
(216, 1, 'a47b1a4a95d7fe2b9ea08ce6746fe93c', '2 weeks', 0, '2013-12-16 01:00:24', '2013-12-30 01:00:24'),
(217, 1, '2635531c50ffb423bf192ea8bf1f08ad', '2 weeks', 0, '2013-12-16 03:15:39', '2013-12-30 03:15:39'),
(218, 1, '39ddeee4a4e87fe82fdec0e7ae93d222', '2 weeks', 1, '2013-12-16 04:59:46', '2013-12-30 04:59:45'),
(219, 1, '172f56671c11a3fd2e537f156039ace9', '2 weeks', 1, '2013-12-16 11:22:14', '2013-12-30 11:22:14'),
(220, 1, '9d0a58243e173ce554cf35de005d4bef', '2 weeks', 1, '2013-12-16 12:13:09', '2013-12-30 12:13:09'),
(221, 1, 'd3236abcda3a642e1dbba5e4b4a7654a', '2 weeks', 0, '2013-12-16 14:29:39', '2013-12-30 14:29:39'),
(222, 1, '054fc7249ea5a662209bc73fbbf4e45c', '2 weeks', 1, '2013-12-17 00:07:43', '2013-12-31 00:07:43'),
(223, 1, 'cd65b8eba9af6f98803f8cf7db3ab1f2', '2 weeks', 1, '2013-12-17 01:40:32', '2013-12-31 01:40:32'),
(224, 1, '242214a040548257851ca3bacdb1bf46', '2 weeks', 0, '2013-12-17 03:55:16', '2013-12-31 03:55:16'),
(225, 1, 'a98849b0efbba50891c5bafd0f75df3c', '2 weeks', 1, '2013-12-17 04:08:07', '2013-12-31 04:08:07'),
(226, 1, '86313ac50948b0388236333deee4cfd1', '2 weeks', 1, '2013-12-17 04:55:22', '2013-12-31 04:55:22'),
(227, 1, '964a9b8236ffa5459a0eff8e6f7feffd', '2 weeks', 0, '2013-12-17 12:53:40', '2013-12-31 12:53:40'),
(228, 1, 'dfc3e99f74209b9b584d823039e42ccb', '2 weeks', 1, '2013-12-18 00:13:32', '2014-01-01 00:13:32'),
(229, 1, '4ee55e332b3ca91d5726721333077083', '2 weeks', 1, '2013-12-18 01:13:38', '2014-01-01 01:13:38'),
(230, 1, '22fb901e45727239dc8c939b85847f0f', '2 weeks', 1, '2013-12-18 01:47:12', '2014-01-01 01:47:12'),
(231, 1, '6c92a343146aa009aa3412617df2e956', '2 weeks', 0, '2013-12-18 03:39:12', '2014-01-01 03:39:12'),
(232, 1, '0ca819a681f7c527c5b500049a02f1c9', '2 weeks', 1, '2013-12-18 04:12:22', '2014-01-01 04:12:22'),
(233, 1, '72b40a913faccb816abb493961ae2b28', '2 weeks', 1, '2013-12-18 05:45:31', '2014-01-01 05:45:31'),
(234, 1, '95a834bb54aa838d2f35a7a25b7374ad', '2 weeks', 1, '2013-12-18 08:13:07', '2014-01-01 08:13:07'),
(235, 1, 'dc5c8fe3bf036b98461b31da0f5be21c', '2 weeks', 1, '2013-12-18 13:08:25', '2014-01-01 13:08:25'),
(236, 1, '18d9b600e80593d372e11d4738c5e66a', '2 weeks', 1, '2013-12-19 06:44:59', '2014-01-02 06:44:59'),
(237, 1, '3b0455b0c5abbf9a36bd769cf78f1614', '2 weeks', 1, '2013-12-19 09:27:46', '2014-01-02 09:27:46'),
(238, 1, 'f0333f3f4a98e9ce299902d117aebdce', '2 weeks', 0, '2013-12-19 13:49:16', '2014-01-02 13:49:16'),
(239, 1, '3766a94f95ed6a9938b188c1883282e7', '2 weeks', 1, '2013-12-19 13:49:16', '2014-01-02 13:49:16'),
(240, 1, '6d6a11af989a10d0c05afe0b8fc5b84e', '2 weeks', 1, '2013-12-20 00:35:36', '2014-01-03 00:35:36'),
(241, 1, 'a198a31767aebade3d4db0081bee2dff', '2 weeks', 1, '2013-12-20 03:50:09', '2014-01-03 03:50:09'),
(242, 1, '8424e2e8b08f5c7cd789b832810bf559', '2 weeks', 1, '2013-12-20 04:47:35', '2014-01-03 04:47:35'),
(243, 1, 'fb48b1902c92c4616232538e62f96a31', '2 weeks', 0, '2013-12-20 06:33:52', '2014-01-03 06:33:52'),
(244, 1, '62b7ee2a5c0d49185f0259c9d2307169', '2 weeks', 1, '2013-12-20 08:17:26', '2014-01-03 08:17:26'),
(245, 1, 'f7eb5b70b585d1a16007c8ed7ed46efa', '2 weeks', 1, '2013-12-20 09:08:36', '2014-01-03 09:08:36'),
(246, 1, '4b778c61025310599b0f6e9a60ed8d1e', '2 weeks', 1, '2013-12-20 12:12:51', '2014-01-03 12:12:51'),
(247, 1, '5a06242bdae4d661cd96288fb4d1228c', '2 weeks', 0, '2013-12-20 12:45:40', '2014-01-03 12:45:40'),
(248, 1, '34f278b6e162f4967e478f7da2c934fa', '2 weeks', 1, '2013-12-21 00:32:10', '2014-01-04 00:32:10'),
(249, 1, '7a23bbbcfddc34c3557cfcf9ce43d1d3', '2 weeks', 1, '2013-12-21 07:23:22', '2014-01-04 07:23:22'),
(250, 1, '44dd05cba63e33a7b2a92099260a1383', '2 weeks', 1, '2013-12-21 13:27:52', '2014-01-04 13:27:52'),
(251, 1, '4a5f15f9b3162f1acad4dfb412fab0e1', '2 weeks', 0, '2013-12-22 11:56:59', '2014-01-05 11:56:59'),
(252, 1, '512b5a1f492f47ec04923abbe70221fb', '2 weeks', 1, '2013-12-23 00:19:52', '2014-01-06 00:19:52'),
(253, 1, 'ce3ac93cad71678d8ce23ab6ecd6b66d', '2 weeks', 1, '2013-12-23 03:54:00', '2014-01-06 03:54:00'),
(254, 1, '9a7283a6073c228afec3a2e9b6a7b39b', '2 weeks', 1, '2013-12-23 04:21:54', '2014-01-06 04:21:54'),
(255, 1, '7791008fd10026c0980496c915897d7b', '2 weeks', 0, '2013-12-23 08:22:02', '2014-01-06 08:22:02'),
(256, 1, '6218a51d784ae7f05cd2b8124dda704b', '2 weeks', 1, '2013-12-23 12:49:29', '2014-01-06 12:49:29'),
(257, 1, '5f70fa87660204d0fd15c94604fb1ce2', '2 weeks', 1, '2013-12-24 08:34:20', '2014-01-07 08:34:20'),
(258, 1, 'c1585aff32a4bbc96a4489c2ba582d1e', '2 weeks', 1, '2013-12-24 12:23:08', '2014-01-07 12:23:08'),
(259, 1, '00add374b2420e7c66de70477b34223c', '2 weeks', 1, '2013-12-24 12:34:46', '2014-01-07 12:34:46'),
(260, 1, '5e527d389b9debe55616ea8b709f2758', '2 weeks', 1, '2013-12-25 00:51:27', '2014-01-08 00:51:27'),
(261, 1, 'ab2f0c06b9d8e8f5a5fef02055c6c9de', '2 weeks', 1, '2013-12-25 01:43:24', '2014-01-08 01:43:24'),
(262, 1, 'f0e34f8a58921d8e5d56d9a0cae6c442', '2 weeks', 1, '2013-12-25 10:00:41', '2014-01-08 10:00:41'),
(263, 1, 'd5f82440705c4b227b197d22c5e67996', '2 weeks', 0, '2013-12-25 12:50:14', '2014-01-08 12:50:14'),
(264, 1, '91288085edec88291b333df3d252c946', '2 weeks', 1, '2013-12-25 23:34:03', '2014-01-08 23:34:03'),
(265, 1, '2ccb49e36bfdd5f28fccc77520daa067', '2 weeks', 1, '2013-12-26 00:49:17', '2014-01-09 00:49:17'),
(266, 1, '9ff51c3ac9c4f69161c7b1d04c2348af', '2 weeks', 1, '2013-12-26 03:55:48', '2014-01-09 03:55:48'),
(267, 1, '26a9ad1dd235db8a5fb6a8fee69632f8', '2 weeks', 1, '2013-12-26 06:11:02', '2014-01-09 06:11:02'),
(268, 1, '927a701a01e86a599468e6d37ddbe3b2', '2 weeks', 1, '2013-12-26 07:53:44', '2014-01-09 07:53:44'),
(269, 1, 'fed6a132540b634008590d784f74fb9e', '2 weeks', 1, '2013-12-26 08:10:39', '2014-01-09 08:10:39'),
(270, 1, '5afb50a8d8e0106a6d90ef3dae45e384', '2 weeks', 0, '2013-12-26 11:42:10', '2014-01-09 11:42:10'),
(271, 1, '7fa5cbd64ec8ebabaf8c4ef20b8b4c56', '2 weeks', 1, '2013-12-27 02:33:06', '2014-01-10 02:33:06'),
(272, 1, 'b99215783797d02fa83f01d56b5dd020', '2 weeks', 0, '2013-12-27 04:30:33', '2014-01-10 04:30:33'),
(273, 1, '6a1d10acfac62481e3cc19d5d39c3829', '2 weeks', 0, '2013-12-29 01:53:09', '2014-01-12 01:53:09'),
(274, 1, 'e2f40e6098ec524ca005f6d09d8cf4d6', '2 weeks', 1, '2013-12-29 23:55:20', '2014-01-12 23:55:20'),
(275, 1, '764db2da851038ab906d736cf86e1011', '2 weeks', 0, '2013-12-30 01:08:26', '2014-01-13 01:08:26'),
(276, 1, 'a61cef6fcb4e3cf2e8c553b9911a0973', '2 weeks', 1, '2013-12-30 02:13:55', '2014-01-13 02:13:55'),
(277, 1, '2b80678a6e2ad0cd0a1ef8a96baacfcd', '2 weeks', 1, '2013-12-30 03:44:19', '2014-01-13 03:44:19'),
(278, 1, '149db2e88fb44cff8c650ec57384f973', '2 weeks', 1, '2013-12-30 05:33:20', '2014-01-13 05:33:20'),
(279, 1, '6975c5255e34765ce5668a2f3ec9ff9e', '2 weeks', 0, '2013-12-30 06:14:24', '2014-01-13 06:14:24'),
(280, 1, '5df119df375cd4507bb12ce9f1b1b4c4', '2 weeks', 1, '2013-12-31 00:13:10', '2014-01-14 00:13:10'),
(281, 1, 'ecd21e176713b61ab98fd44068bf854a', '2 weeks', 1, '2013-12-31 04:16:55', '2014-01-14 04:16:55'),
(282, 1, 'fd21e8e743885a27c6ef40e81ba8a2da', '2 weeks', 1, '2013-12-31 07:59:42', '2014-01-14 07:59:42'),
(283, 1, 'ed709eb0e67bca8fa21b0b2db67c7e44', '2 weeks', 0, '2013-12-31 09:19:24', '2014-01-14 09:19:24'),
(284, 1, '38bd93ef2299120867fb62ea3dd4ccf6', '2 weeks', 1, '2013-12-31 09:19:25', '2014-01-14 09:19:25'),
(285, 1, 'f01eb0e211d4b05b9263fb182d3602c1', '2 weeks', 0, '2013-12-31 12:26:03', '2014-01-14 12:26:03'),
(286, 1, '3448672d7a25eb6964da2e68cee3e359', '2 weeks', 0, '2013-12-31 15:00:33', '2014-01-14 15:00:33'),
(287, 1, '9eab5b544200c87d7dfbece36f4dd878', '2 weeks', 1, '2014-01-02 00:23:13', '2014-01-16 00:23:13'),
(288, 1, '6caed99ddfc73ee4b17375374b7a6198', '2 weeks', 0, '2014-01-02 04:05:29', '2014-01-16 04:05:29'),
(289, 1, 'd41246c7f5d0fa2d240d044e17af98c2', '2 weeks', 1, '2014-01-02 04:25:08', '2014-01-16 04:25:08'),
(290, 1, '6b4b51d5b631597fd993613e93a3383f', '2 weeks', 0, '2014-01-02 05:48:46', '2014-01-16 05:48:46'),
(291, 1, 'd32d2a2e15bb3170c111033dddf5b05a', '2 weeks', 1, '2014-01-02 07:12:37', '2014-01-16 07:12:37'),
(292, 1, '15441c856cca93f4e67536ab50b564d0', '2 weeks', 0, '2014-01-02 11:53:32', '2014-01-16 11:53:32'),
(293, 1, '1f52da8025495c490160b6530d5be4ba', '2 weeks', 0, '2014-01-02 12:47:51', '2014-01-16 12:47:51'),
(294, 1, 'f41bd16c2be07bd005e8a5938e145e93', '2 weeks', 0, '2014-01-02 12:48:21', '2014-01-16 12:48:21'),
(295, 1, '0be577fae9d83cd55e42470931de7305', '2 weeks', 0, '2014-01-02 13:37:05', '2014-01-16 13:37:05'),
(296, 1, 'f00a3d9f3b5ee37bf42fe9547712cf08', '2 weeks', 0, '2014-01-02 14:07:45', '2014-01-16 14:07:45'),
(297, 1, '23bd71746f19924132a1d3cb12353e68', '2 weeks', 0, '2014-01-02 23:39:11', '2014-01-16 23:39:11'),
(298, 1, '622e7c6f467dd9b1882670d69debfcf0', '2 weeks', 0, '2014-01-02 23:59:01', '2014-01-16 23:59:01'),
(299, 1, '77e8312f9b995a0ca27ec0ea603c8b05', '2 weeks', 0, '2014-01-03 00:01:30', '2014-01-17 00:01:30'),
(300, 1, '7cdb3105f794b50a586c93971d31b92e', '2 weeks', 0, '2014-01-03 04:23:00', '2014-01-17 04:23:00'),
(301, 1, 'ef3d7f03a569e0dcbf1cf1b43832c2a1', '2 weeks', 0, '2014-01-03 07:48:56', '2014-01-17 07:48:56'),
(302, 1, 'a6c28b638e3136e40b48dd885a7b2693', '2 weeks', 0, '2014-01-03 23:48:56', '2014-01-17 23:48:56'),
(303, 1, 'ff1434f96e8dbaa966fec39a8616d9d3', '2 weeks', 0, '2014-01-06 01:44:27', '2014-01-20 01:44:27');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created`, `modified`) VALUES
(1, 'sas', 'ASASASASA', '2013-12-16 02:26:45', '2013-12-16 02:28:54');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE IF NOT EXISTS `stores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `storeurl` varchar(160) NOT NULL,
  `affiliatesurl` varchar(200) NOT NULL,
  `storedesc` varchar(255) NOT NULL,
  `owner_email` varchar(150) NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `owner_mobile` varchar(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `store_offer_detail` text NOT NULL,
  `noofclick` int(11) NOT NULL,
  `createdby` varchar(50) NOT NULL,
  `createddate` datetime NOT NULL,
  `modifiedby` varchar(50) NOT NULL,
  `modifieddate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `storeurl`, `affiliatesurl`, `storedesc`, `owner_email`, `owner_name`, `owner_mobile`, `image`, `status`, `store_offer_detail`, `noofclick`, `createdby`, `createddate`, `modifiedby`, `modifieddate`) VALUES
(1, 'Flipcart', 'Flipcart', 'Flipcart', 'Flipcart', 'Flipcart', 'Flipcart', 'Flipcart', '', 1, '', 0, 'Admin', '2013-12-30 01:12:16', 'Admin', '2013-12-31 02:12:14'),
(2, 'Fashionara', 'Fashionara', 'Fashionara', 'Fashionara', '', '', '', '', 1, '', 0, 'Admin', '2013-12-30 04:12:01', '', '0000-00-00 00:00:00'),
(3, '100 Best Buy', '100 Best Buy', '', '100 Best Buy', '', '', '', '', 1, '', 0, 'Admin', '2013-12-30 04:12:46', '', '0000-00-00 00:00:00'),
(4, 'SASASAsSASAS', 'sASAsASAsAS', '', 'saSASASASASASASASSAsAs ASASA ASAS A SASAS AS ASASA', '', '', '', '', 1, '', 0, 'Admin', '2013-12-30 07:12:02', '', '0000-00-00 00:00:00'),
(5, 'saasdsadsa', 'dsadsadsadsadas', 'adasd', 'adadad', 'sdsadasd', 'sdsad', 'dsadasd', '', 1, '<ul>\r\n<li>dsdsdsdssds</li>\r\n<li>dsdsd</li>\r\n<li>dsd</li>\r\n<li>sdsd</li>\r\n<li>sd</li>\r\n<li>ddsd</li>\r\n<li>sdsds</li>\r\n<li>dsd</li>\r\n<li>ds</li>\r\n<li>dsds</li>\r\n<li>dsd</li>\r\n<li>sds</li>\r\n<li>ds</li>\r\n</ul>', 0, 'Admin', '2013-12-30 07:12:15', 'Admin', '2013-12-30 07:12:47'),
(6, 'Pepperfry', '', '', 'Pepperfry', '', '', '', '', 1, '', 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(7, 'Shopclues', '', '', 'Shopclues', '', '', '', '', 1, '', 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(8, 'Snapdeal', '', '', 'Snapdeal', '', '', '', '', 1, '', 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `desc` varchar(250) NOT NULL,
  `user_id` int(10) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `status` varchar(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(11) unsigned DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `salt` text,
  `email` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email_verified` int(1) DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '0',
  `ip_address` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`username`),
  KEY `mail` (`email`),
  KEY `users_FKIndex1` (`user_group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_group_id`, `username`, `password`, `salt`, `email`, `first_name`, `last_name`, `email_verified`, `active`, `ip_address`, `created`, `modified`) VALUES
(1, 1, 'admin', '365caef7fccbdb1ee711f084be9317a7', '1e6d99570a4d37cc29b18c4a6b06e6ed', 'admin@admin.com', 'Admin', '', 1, 1, '', '2013-11-27 17:53:01', '2013-11-27 17:53:01'),
(2, 2, 'shivam', 'fa14a97e31f6b98d2ad774f121a6e2aa', '04476f12ada60e7e5f0f9c39248e6029', 'awasthi.shivam@gmail.com', 'shivam', 'awasthi', 1, 1, NULL, '2013-11-27 07:33:51', '2013-12-02 04:01:40'),
(3, 2, 'shivam1', 'dff5a2fc9e7e5516b84ad6bed0886ab9', 'df740cac4841165f6f2a0fa0341863d0', 'shivam@shivam.com', 'awasthi', 'awasthi', 1, 1, NULL, '2013-11-28 02:10:31', '2013-11-28 03:29:48'),
(4, 2, 'pinkesh', '9d403bf5d744c49363151918426422b5', 'a8854f6285932f49fb7f62c691182575', 'pinkesh@gmail.com', 'pinkesh', 'singh', 0, 1, '127.0.0.1', '2013-12-04 13:11:17', '2013-12-04 13:11:17'),
(5, 1, 'ssas', '75b5338fcdc713afbf2bbe6e315c7da0', '36fb9fe31c9a7cc8dc9d18a6b3215bcc', 'sasasasas@admin.com', 'sasa', 'SAS', 1, 1, NULL, '2013-12-08 12:16:10', '2013-12-08 12:16:10');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `alias_name` varchar(100) DEFAULT NULL,
  `allowRegistration` int(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `name`, `alias_name`, `allowRegistration`, `created`, `modified`) VALUES
(1, 'Admin', 'Admin', 0, '2013-11-27 17:53:01', '2013-12-09 00:55:32'),
(2, 'User', 'User', 1, '2013-11-27 17:53:01', '2013-11-27 17:53:01'),
(3, 'Guest', 'Guest', 1, '2013-11-27 17:53:01', '2014-01-02 13:36:48'),
(4, 'Sales', 'sales', 1, '2013-12-09 00:56:32', '2013-12-09 00:56:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_group_permissions`
--

CREATE TABLE IF NOT EXISTS `user_group_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_group_id` int(10) unsigned NOT NULL,
  `controller` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `action` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `allowed` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=204 ;

--
-- Dumping data for table `user_group_permissions`
--

INSERT INTO `user_group_permissions` (`id`, `user_group_id`, `controller`, `action`, `allowed`) VALUES
(1, 1, 'Pages', 'display', 1),
(2, 2, 'Pages', 'display', 1),
(3, 3, 'Pages', 'display', 1),
(4, 1, 'UserGroupPermissions', 'index', 1),
(5, 2, 'UserGroupPermissions', 'index', 0),
(6, 3, 'UserGroupPermissions', 'index', 0),
(7, 1, 'UserGroupPermissions', 'update', 1),
(8, 2, 'UserGroupPermissions', 'update', 0),
(9, 3, 'UserGroupPermissions', 'update', 0),
(10, 1, 'UserGroups', 'index', 1),
(11, 2, 'UserGroups', 'index', 0),
(12, 3, 'UserGroups', 'index', 0),
(13, 1, 'UserGroups', 'addGroup', 1),
(14, 2, 'UserGroups', 'addGroup', 0),
(15, 3, 'UserGroups', 'addGroup', 0),
(16, 1, 'UserGroups', 'editGroup', 1),
(17, 2, 'UserGroups', 'editGroup', 0),
(18, 3, 'UserGroups', 'editGroup', 0),
(19, 1, 'UserGroups', 'deleteGroup', 1),
(20, 2, 'UserGroups', 'deleteGroup', 0),
(21, 3, 'UserGroups', 'deleteGroup', 0),
(22, 1, 'Users', 'index', 1),
(23, 2, 'Users', 'index', 0),
(24, 3, 'Users', 'index', 0),
(25, 1, 'Users', 'viewUser', 1),
(26, 2, 'Users', 'viewUser', 0),
(27, 3, 'Users', 'viewUser', 0),
(28, 1, 'Users', 'myprofile', 1),
(29, 2, 'Users', 'myprofile', 1),
(30, 3, 'Users', 'myprofile', 0),
(31, 1, 'Users', 'login', 1),
(32, 2, 'Users', 'login', 1),
(33, 3, 'Users', 'login', 1),
(34, 1, 'Users', 'logout', 1),
(35, 2, 'Users', 'logout', 1),
(36, 3, 'Users', 'logout', 1),
(37, 1, 'Users', 'register', 1),
(38, 2, 'Users', 'register', 1),
(39, 3, 'Users', 'register', 1),
(40, 1, 'Users', 'changePassword', 1),
(41, 2, 'Users', 'changePassword', 1),
(42, 3, 'Users', 'changePassword', 0),
(43, 1, 'Users', 'changeUserPassword', 1),
(44, 2, 'Users', 'changeUserPassword', 0),
(45, 3, 'Users', 'changeUserPassword', 0),
(46, 1, 'Users', 'addUser', 1),
(47, 2, 'Users', 'addUser', 0),
(48, 3, 'Users', 'addUser', 0),
(49, 1, 'Users', 'editUser', 1),
(50, 2, 'Users', 'editUser', 0),
(51, 3, 'Users', 'editUser', 0),
(52, 1, 'Users', 'dashboard', 1),
(53, 2, 'Users', 'dashboard', 1),
(54, 3, 'Users', 'dashboard', 0),
(55, 1, 'Users', 'deleteUser', 1),
(56, 2, 'Users', 'deleteUser', 0),
(57, 3, 'Users', 'deleteUser', 0),
(58, 1, 'Users', 'makeActive', 1),
(59, 2, 'Users', 'makeActive', 0),
(60, 3, 'Users', 'makeActive', 0),
(61, 1, 'Users', 'accessDenied', 1),
(62, 2, 'Users', 'accessDenied', 1),
(63, 3, 'Users', 'accessDenied', 1),
(64, 1, 'Users', 'userVerification', 1),
(65, 2, 'Users', 'userVerification', 1),
(66, 3, 'Users', 'userVerification', 1),
(67, 1, 'Users', 'forgotPassword', 1),
(68, 2, 'Users', 'forgotPassword', 1),
(69, 3, 'Users', 'forgotPassword', 1),
(70, 1, 'Users', 'makeActiveInactive', 1),
(71, 2, 'Users', 'makeActiveInactive', 0),
(72, 3, 'Users', 'makeActiveInactive', 0),
(73, 1, 'Users', 'verifyEmail', 1),
(74, 2, 'Users', 'verifyEmail', 0),
(75, 3, 'Users', 'verifyEmail', 0),
(76, 1, 'Users', 'activatePassword', 1),
(77, 2, 'Users', 'activatePassword', 1),
(78, 3, 'Users', 'activatePassword', 1),
(79, 1, 'Tasks', 'index', 1),
(80, 2, 'Tasks', 'index', 1),
(81, 3, 'Tasks', 'index', 1),
(82, 1, 'Tasks', 'add', 1),
(83, 2, 'Tasks', 'add', 1),
(84, 3, 'Tasks', 'add', 0),
(85, 1, 'Brands', 'index', 1),
(86, 2, 'Brands', 'index', 1),
(87, 3, 'Brands', 'index', 0),
(88, 1, 'Brands', 'view', 1),
(89, 2, 'Brands', 'view', 1),
(90, 3, 'Brands', 'view', 0),
(91, 1, 'Brands', 'add', 1),
(92, 2, 'Brands', 'add', 1),
(93, 3, 'Brands', 'add', 0),
(94, 1, 'Brands', 'edit', 1),
(95, 2, 'Brands', 'edit', 1),
(96, 3, 'Brands', 'edit', 0),
(97, 1, 'Brands', 'delete', 1),
(98, 2, 'Brands', 'delete', 1),
(99, 3, 'Brands', 'delete', 0),
(100, 1, 'Categories', 'index', 1),
(101, 2, 'Categories', 'index', 1),
(102, 3, 'Categories', 'index', 0),
(103, 1, 'Categories', 'view', 1),
(104, 2, 'Categories', 'view', 1),
(105, 3, 'Categories', 'view', 0),
(106, 1, 'Categories', 'add', 1),
(107, 2, 'Categories', 'add', 1),
(108, 3, 'Categories', 'add', 0),
(109, 1, 'Categories', 'edit', 1),
(110, 2, 'Categories', 'edit', 1),
(111, 3, 'Categories', 'edit', 0),
(112, 1, 'Categories', 'delete', 1),
(113, 2, 'Categories', 'delete', 1),
(114, 3, 'Categories', 'delete', 0),
(115, 1, 'Stores', 'delete', 1),
(116, 2, 'Stores', 'delete', 1),
(117, 3, 'Stores', 'delete', 0),
(118, 1, 'Stores', 'edit', 1),
(119, 2, 'Stores', 'edit', 1),
(120, 3, 'Stores', 'edit', 0),
(121, 1, 'Stores', 'add', 1),
(122, 2, 'Stores', 'add', 1),
(123, 3, 'Stores', 'add', 0),
(124, 1, 'Stores', 'view', 1),
(125, 2, 'Stores', 'view', 1),
(126, 3, 'Stores', 'view', 0),
(127, 1, 'Stores', 'index', 1),
(128, 2, 'Stores', 'index', 1),
(129, 3, 'Stores', 'index', 0),
(130, 1, 'Brands', 'admin_index', 1),
(131, 2, 'Brands', 'admin_index', 1),
(132, 3, 'Brands', 'admin_index', 0),
(133, 1, 'Brands', 'admin_view', 1),
(134, 2, 'Brands', 'admin_view', 1),
(135, 3, 'Brands', 'admin_view', 0),
(136, 1, 'Brands', 'admin_add', 1),
(137, 2, 'Brands', 'admin_add', 0),
(138, 3, 'Brands', 'admin_add', 0),
(139, 1, 'Brands', 'admin_edit', 1),
(140, 2, 'Brands', 'admin_edit', 0),
(141, 3, 'Brands', 'admin_edit', 0),
(142, 1, 'Brands', 'admin_delete', 1),
(143, 2, 'Brands', 'admin_delete', 0),
(144, 3, 'Brands', 'admin_delete', 0),
(145, 1, 'Categories', 'admin_index', 1),
(146, 2, 'Categories', 'admin_index', 1),
(147, 3, 'Categories', 'admin_index', 0),
(148, 1, 'Categories', 'admin_view', 1),
(149, 2, 'Categories', 'admin_view', 1),
(150, 3, 'Categories', 'admin_view', 0),
(151, 1, 'Categories', 'admin_add', 1),
(152, 2, 'Categories', 'admin_add', 0),
(153, 3, 'Categories', 'admin_add', 0),
(154, 1, 'Categories', 'admin_edit', 1),
(155, 2, 'Categories', 'admin_edit', 0),
(156, 3, 'Categories', 'admin_edit', 0),
(157, 1, 'Posts', 'index', 1),
(158, 2, 'Posts', 'index', 0),
(159, 3, 'Posts', 'index', 0),
(160, 1, 'Posts', 'view', 1),
(161, 2, 'Posts', 'view', 0),
(162, 3, 'Posts', 'view', 0),
(163, 1, 'Posts', 'add', 1),
(164, 2, 'Posts', 'add', 0),
(165, 3, 'Posts', 'add', 0),
(166, 1, 'Stores', 'admin_index', 1),
(167, 2, 'Stores', 'admin_index', 0),
(168, 3, 'Stores', 'admin_index', 0),
(169, 1, 'Stores', 'admin_view', 1),
(170, 2, 'Stores', 'admin_view', 0),
(171, 3, 'Stores', 'admin_view', 0),
(172, 1, 'Stores', 'admin_add', 1),
(173, 2, 'Stores', 'admin_add', 0),
(174, 3, 'Stores', 'admin_add', 0),
(175, 1, 'Stores', 'admin_edit', 1),
(176, 2, 'Stores', 'admin_edit', 0),
(177, 3, 'Stores', 'admin_edit', 0),
(178, 1, 'Stores', 'admin_delete', 1),
(179, 2, 'Stores', 'admin_delete', 0),
(180, 3, 'Stores', 'admin_delete', 0),
(181, 1, 'Tasks', 'admin_index', 1),
(182, 2, 'Tasks', 'admin_index', 0),
(183, 3, 'Tasks', 'admin_index', 0),
(184, 1, 'Tasks', 'admin_add', 1),
(185, 2, 'Tasks', 'admin_add', 0),
(186, 3, 'Tasks', 'admin_add', 0),
(187, 1, 'Tasks', 'admin_edit', 1),
(188, 2, 'Tasks', 'admin_edit', 0),
(189, 3, 'Tasks', 'admin_edit', 0),
(190, 1, 'Tasks', 'admin_delete', 1),
(191, 2, 'Tasks', 'admin_delete', 0),
(192, 3, 'Tasks', 'admin_delete', 0),
(193, 1, 'Users', 'emailVerification', 1),
(194, 2, 'Users', 'emailVerification', 1),
(195, 3, 'Users', 'emailVerification', 0),
(196, 1, 'Pages', 'index', 1),
(197, 2, 'Pages', 'index', 1),
(198, 3, 'Pages', 'index', 1),
(199, 1, 'Stores', 'admin_getsubcat', 1),
(200, 2, 'Stores', 'admin_getsubcat', 1),
(201, 3, 'Stores', 'admin_getsubcat', 0),
(202, 4, 'Pages', 'index', 1),
(203, 4, 'Pages', 'display', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
