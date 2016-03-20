-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2016 at 11:07 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yii2-ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `desctiption` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_blog_user1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `desctiption`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'ทดสอบการเขียน Blog', '<p><img src="/yii2-ecommerce/backend/web/uploads/1/ec9b606d4c-thumb-property-02.jpg"></p><p>รายละเอียดการเขียน Blog</p>', '2016-02-12 07:49:07', '2016-02-12 09:59:25', 1),
(2, 'ทดสอบการเขียน Blog', '<p><img src="/yii2-ecommerce/backend/web/uploads/1/5b8ac1bf80-property-02.jpg"></p><p>ทดสอบการเขียน Blogทดสอบการเขียน Blog<span class="redactor-invisible-space">ทดสอบการเขียน Blogทดสอบการเขียน Blog<span class="redactor-invisible-space">ทดสอบการเขียน Blog<span class="redactor-invisible-space">ทดสอบการเขียน Blog<span class="redactor-invisible-space">ทดสอบการเขียน Blog<span class="redactor-invisible-space">ทดสอบการเขียน Blog<span class="redactor-invisible-space">ทดสอบการเขียน Blog<span class="redactor-invisible-space">ทดสอบการเขียน Blog<span class="redactor-invisible-space">ทดสอบการเขียน Blog<span class="redactor-invisible-space">ทดสอบการเขียน Blog<span class="redactor-invisible-space">ทดสอบการเขียน Blog<span class="redactor-invisible-space">ทดสอบการเขียน Blog<span class="redactor-invisible-space">ทดสอบการเขียน Blog<span class="redactor-invisible-space">ทดสอบการเขียน Blogทดสอบการเขียน Blog<span class="redactor-invisible-space">ทดสอบการเขียน Blog<span class="redactor-invisible-space">ทดสอบการเขียน Blog<span class="redactor-invisible-space">ทดสอบการเขียน Blog<span class="redactor-invisible-space">ทดสอบการเขียน Blog<span class="redactor-invisible-space">ทดสอบการเขียน Blog<span class="redactor-invisible-space">ทดสอบการเขียน Blog<span class="redactor-invisible-space">ทดสอบการเขียน Blog<span class="redactor-invisible-space">ทดสอบการเขียน Blog<span class="redactor-invisible-space">ทดสอบการเขียน Blog<span class="redactor-invisible-space"></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br></p>', '2016-02-12 09:57:55', '2016-02-12 09:57:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fabric`
--

CREATE TABLE IF NOT EXISTS `fabric` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COMMENT='ผ้า' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fabric`
--

INSERT INTO `fabric` (`id`, `title`, `description`, `price`, `photo`) VALUES
(1, 'ผ้า wool', 'ผ้า wool', 2000, 'dsfsdsdfsdff.jpg'),
(2, 'ผ้า cotton', 'ผ้า cotton', 1500, 'sd3sad2f1sd5f4sdf.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `fabric_type`
--

CREATE TABLE IF NOT EXISTS `fabric_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fabric_type` varchar(100) NOT NULL COMMENT 'ชนิดผ้า',
  `description` text NOT NULL,
  `photo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fabric_type`
--

INSERT INTO `fabric_type` (`id`, `fabric_type`, `description`, `photo`) VALUES
(1, 'เสื้อเชิ้ต', 'รายละเอียด', 'sdfsdfsdfsd.jpg'),
(2, 'เสื้อสูท', 'รายละเอียด', 'fdgdhdfgdfg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE IF NOT EXISTS `gender` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gender` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `gender`) VALUES
(1, 'ชาย'),
(2, 'หญิง');

-- --------------------------------------------------------

--
-- Table structure for table `measurement`
--

CREATE TABLE IF NOT EXISTS `measurement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gender_id` int(11) NOT NULL,
  `measurement` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  KEY `fk_measurement_gender1_idx` (`gender_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COMMENT='วัดตัว' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `measurement`
--

INSERT INTO `measurement` (`id`, `gender_id`, `measurement`, `photo`, `description`) VALUES
(1, 1, 'ยาวหน้า', 'sdllfgldkfg.jpg', 'ยาวหน้า'),
(2, 1, 'ยาวหลัง', 'dflkfjlgklfkg.jpg', 'ยาวหลัง'),
(3, 2, 'ยาวหน้า', 'dfggrhghfg.jpg', 'ยาวหน้า'),
(4, 2, 'ยาวหลัง', 'lkdfgidfhldkf.jph', 'ยาวหลัง');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1455085571),
('m130524_201442_init', 1455085578);

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE IF NOT EXISTS `models` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fabric_type_id` int(11) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `ship_cost_in` int(11) NOT NULL COMMENT 'ค่าขนส่งในประเทศ',
  `ship_cost_out` int(11) NOT NULL COMMENT 'ค่าขนส่งต่่างประเทศ',
  PRIMARY KEY (`id`),
  KEY `fk_models_fablic_type1_idx` (`fabric_type_id`),
  KEY `fk_models_gender1_idx` (`gender_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `fabric_type_id`, `gender_id`, `title`, `description`, `price`, `photo`, `ship_cost_in`, `ship_cost_out`) VALUES
(1, 1, 1, 'ปกปั้น', 'ปกปั้น', 1000, 's5f178c77bd3bcc.jpg', 1000, 3000),
(2, 2, 1, '2 กระดุม', '2 กระดุม', 8000, 'f5fd78c77bd3bcc.jpg', 1000, 3000),
(3, 2, 2, '3 กระดุม', '3 กระดุม', 10000, 'ddf178c77bd3bcc.jpg', 1000, 3000),
(5, 1, 1, 'ข้อมือธรรมดา', 'ข้อมือธรรมดา', 1000, 'f5f178c77bd3bcc.jpg', 300, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `total_price` int(11) NOT NULL,
  `ship_cost` int(11) NOT NULL COMMENT 'คาขนส่งทั้งหมด',
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_order_user1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `order_date`, `total_price`, `ship_cost`, `status`) VALUES
(1, 1, '2016-02-12 03:44:34', 9500, 3000, 'true'),
(2, 1, '2016-02-12 04:29:08', 10000, 1000, 'false'),
(3, 1, '2016-02-12 09:29:41', 10000, 3000, 'true'),
(4, 1, '2016-02-12 09:48:16', 10000, 1000, 'false'),
(5, 1, '2016-02-12 09:50:01', 11500, 1000, 'true');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `paymen_date` varchar(30) DEFAULT NULL,
  `pay_amount` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_payment_order1_idx` (`order_id`),
  KEY `fk_payment_payment_method1_idx` (`payment_method_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `order_id`, `payment_method_id`, `paymen_date`, `pay_amount`) VALUES
(1, 1, 2, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 3, 2, NULL, NULL),
(4, 4, 2, NULL, NULL),
(5, 5, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE IF NOT EXISTS `payment_method` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_method` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id`, `payment_method`) VALUES
(1, 'โอนผ่านบัญชีธนาคาร\r\nกรุงไทย'),
(2, 'ชำระผ่าน PayPal');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `models_id` int(11) NOT NULL,
  `fabric_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `ship_cost` int(11) NOT NULL COMMENT 'ค่าขนส่ง',
  PRIMARY KEY (`id`),
  KEY `fk_product_models1_idx` (`models_id`),
  KEY `fk_product_fabric1_idx` (`fabric_id`),
  KEY `fk_product_order1_idx` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `models_id`, `fabric_id`, `order_id`, `total_price`, `ship_cost`) VALUES
(1, 2, 2, 1, 9500, 3000),
(2, 2, 1, 2, 10000, 1000),
(3, 2, 1, 3, 10000, 3000),
(4, 2, 1, 4, 10000, 1000),
(5, 3, 2, 5, 11500, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `product_measurement`
--

CREATE TABLE IF NOT EXISTS `product_measurement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `measurement_id` int(11) NOT NULL,
  `val` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_measurement_product1_idx` (`product_id`),
  KEY `fk_product_measurement_measurement1_idx` (`measurement_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `product_measurement`
--

INSERT INTO `product_measurement` (`id`, `product_id`, `measurement_id`, `val`) VALUES
(1, 1, 1, '30'),
(2, 1, 2, '20'),
(3, 2, 3, '30'),
(4, 2, 4, '20'),
(5, 3, 1, '20'),
(6, 3, 2, '30'),
(7, 4, 1, '30'),
(8, 4, 2, '20'),
(9, 5, 3, '30'),
(10, 5, 4, '20');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `address` text NOT NULL,
  UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  KEY `fk_profile_user1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `firstname`, `lastname`, `address`) VALUES
(1, 'มานพ', 'กองอุ่น', 'ที่อยู มานพ กองอุ่น');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE IF NOT EXISTS `shipping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `ship_method` enum('in','out') NOT NULL COMMENT 'ใน/ต่างประเทศ',
  PRIMARY KEY (`id`),
  KEY `fk_shipping_order1_idx` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `order_id`, `address`, `ship_method`) VALUES
(1, 1, 'ที่อยู มานพ กองอุ่น', 'out'),
(2, 2, 'ที่อยู มานพ กองอุ่น', 'in'),
(3, 3, 'ที่อยู มานพ กองอุ่น', 'out'),
(4, 4, 'ที่อยู มานพ กองอุ่น', 'in'),
(5, 5, 'ที่อยู มานพ กองอุ่น', 'in');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'ZV-nojpfRoHXuGTKQQLybbOJL9s-QK0g', '$2y$13$cF8XTlxzR7V43/XGw2siTe1Gy/bvrY/3wyVlAj0OYJoaKpstoUDrO', NULL, 'admin@admin.com', 5, 10, 1455170726, 1455170726);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `fk_blog_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `measurement`
--
ALTER TABLE `measurement`
  ADD CONSTRAINT `fk_measurement_gender1` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `models`
--
ALTER TABLE `models`
  ADD CONSTRAINT `fk_models_gender1` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_models_fablic_type1` FOREIGN KEY (`fabric_type_id`) REFERENCES `fabric_type` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_payment_order1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_payment_payment_method1` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_method` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_order1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_fabric1` FOREIGN KEY (`fabric_id`) REFERENCES `fabric` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_models1` FOREIGN KEY (`models_id`) REFERENCES `models` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `product_measurement`
--
ALTER TABLE `product_measurement`
  ADD CONSTRAINT `fk_product_measurement_measurement1` FOREIGN KEY (`measurement_id`) REFERENCES `measurement` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_measurement_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_profile_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `shipping`
--
ALTER TABLE `shipping`
  ADD CONSTRAINT `fk_shipping_order1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
