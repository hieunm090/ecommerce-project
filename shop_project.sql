-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 29, 2022 at 09:46 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Database: `php_project`

-- --------------------------------------------------------

-- Table structure for table `admins`

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(250) COLLATE utf8mb4_bin NOT NULL,
  `admin_email` text COLLATE utf8mb4_bin NOT NULL,
  `admin_password` text COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Dumping data for table `admins`

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(2, 'fu', 'fu@email.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

-- Table structure for table `orders`

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_cost` decimal(6,2) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'on_hold',
  `user_id` int(11) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `orders`

INSERT INTO `orders` (`order_id`, `order_cost`, `order_status`, `user_id`, `user_phone`, `user_city`, `user_address`, `order_date`) VALUES
(24, '599.00', 'đã vận chuyển', 1, 123456789, 'TH', 'TH', '2022-11-25 10:34:05'),
(25, '799.00', 'đã thanh toán', 1, 123456789, 'TH', 'TH', '2022-11-25 10:46:06'),
(26, '199.00', 'chưa thanh toán', 1, 123456789, 'TH', 'TH', '2022-11-25 11:05:54'),
(27, '199.00', 'thanh toán', 1, 123456789, 'TH', 'TH', '2022-11-27 05:26:02');

-- --------------------------------------------------------

-- Table structure for table `order_items`

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `order_items`

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `user_id`, `order_date`) VALUES
(36, 24, '8', 'Giày trắng', 'featured1.jpeg', '199.00', 1, 1, '2022-11-25 10:34:05'),
(37, 24, '16', 'Đồng hồ', 'watch1.jpeg', '199.00', 1, 1, '2022-11-25 10:34:05'),
(38, 24, '9', 'Túi xách xanh', 'featured2.jpeg', '199.00', 1, 1, '2022-11-25 10:34:05'),
(39, 25, '8', 'Giày trắng', 'featured1.jpeg', '199.00', 2, 1, '2022-11-25 10:46:06'),
(40, 25, '16', 'Đồng hồ', 'watch1.jpeg', '199.00', 1, 1, '2022-11-25 10:46:06'),
(41, 25, '9', 'Túi xách xanh', 'featured2.jpeg', '199.00', 1, 1, '2022-11-25 10:46:06'),
(42, 26, '8', 'Giày trắng', 'featured1.jpeg', '199.00', 1, 1, '2022-11-25 11:05:54'),
(43, 27, '8', 'Giày trắng', 'featured1.jpeg', '199.00', 1, 1, '2022-11-27 05:26:02');

-- --------------------------------------------------------

-- Table structure for table `payments`

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_id` varchar(250) NOT NULL,
  `payment_date` datetime NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `payments`

INSERT INTO `payments` (`payment_id`, `order_id`, `user_id`, `transaction_id`, `payment_date`) VALUES
(1, 26, 1, '8LX21991R8142544C', '2022-11-27 07:15:53'),
(2, 24, 1, '5N22879028176791P', '2022-11-27 07:16:54'),
(3, 25, 1, '2EP70780VM679894F', '2022-11-28 04:44:46');

-- --------------------------------------------------------

-- Table structure for table `products`

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_image4` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_special_offer` int(2) NOT NULL,
  `product_color` varchar(100) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `products`

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_special_offer`, `product_color`)VALUES
(8, 'Giày trắng', 'túi', 'Giày trắng tuyệt vời', 'White Shoes1.jpeg', 'White Shoes2.jpeg', 'White Shoes3.jpeg', 'White Shoes4.jpeg', '200.99', 0, 'trắng'),
(9, 'Túi xanh', 'túi', 'Túi xanh tuyệt vời', 'featured2.jpeg', 'featured2.jpeg', 'featured2.jpeg', 'featured2.jpeg', '199.80', 10, 'xanh'),
(10, 'Túi đen', 'túi', 'Túi đen tuyệt vời', 'featured3.jpeg', 'featured3.jpeg', 'featured3.jpeg', 'featured3.jpeg', '199.80', 0, 'đen'),
(11, 'Túi xanh dương', 'túi', 'Túi xanh dương tuyệt vời', 'featured4.jpeg', 'featured4.jpeg', 'featured4.jpeg', 'featured4.jpeg', '199.80', 0, 'xanh dương'),
(12, 'Áo khoác nâu', 'áo khoác', 'Áo khoác mùa đông', 'clothes1.jpeg', 'clothes2.jpeg', 'clothes3.jpeg', 'clothes4.jpeg', '199.80', 30, 'nâu'),
(13, 'Áo khoác đen', 'áo khoác', 'Áo khoác mùa đông', 'clothes2.jpeg', 'clothes2.jpeg', 'clothes2.jpeg', 'clothes2.jpeg', '199.80', 30, 'đen'),
(14, 'Bộ vest xanh', 'vest', 'Bộ vest tuyệt vời', 'clothes3.jpeg', 'clothes3.jpeg', 'clothes3.jpeg', 'clothes3.jpeg', '199.80', 30, 'xanh'),
(15, 'Bộ vest xanh dương', 'vest', 'Bộ vest tuyệt vời', 'clothes4.jpeg', 'clothes4.jpeg', 'clothes4.jpeg', 'clothes4.jpeg', '199.80', 30, 'xanh dương'),
(16, 'Đồng hồ', 'đồng hồ', 'Đồng hồ tuyệt vời', 'watch1.jpeg', 'watch1.jpeg', 'watch1.jpeg', 'watch1.jpeg', '199.80', 0, 'đen'),
(17, 'Đồng hồ', 'đồng hồ', 'Đồng hồ tuyệt vời', 'watch2.jpeg', 'watch2.jpeg', 'watch2.jpeg', 'watch2.jpeg', '199.80', 0, 'đen'),
(18, 'Đồng hồ', 'đồng hồ', 'Đồng hồ tuyệt vời', 'watch3.jpeg', 'watch3.jpeg', 'watch3.jpeg', 'watch3.jpeg', '199.80', 0, 'đen'),
(19, 'Đồng hồ', 'đồng hồ', 'Đồng hồ tuyệt vời', 'watch4.jpeg', 'watch4.jpeg', 'watch4.jpeg', 'watch4.jpeg', '199.80', 0, 'đen'),
(20, 'Giày thể thao', 'giày', 'Cuộc phiêu lưu bắt đầu!!!', 'shoes1.jpeg', 'shoes1.jpeg', 'shoes1.jpeg', 'shoes1.jpeg', '199.80', 20, 'đen-xanh'),
(21, 'Giày thể thao', 'giày', 'Cuộc phiêu lưu bắt đầu!!!', 'shoes2.jpeg', 'shoes2.jpeg', 'shoes2.jpeg', 'shoes2.jpeg', '199.80', 10, 'đen-vàng'),
(22, 'Giày thể thao', 'giày', 'Cuộc phiêu lưu bắt đầu!!!', 'shoes3.jpeg', 'shoes3.jpeg', 'shoes3.jpeg', 'shoes3.jpeg', '199.80', 20, 'cam-xanh'),
(23, 'Giày thể thao', 'giày', 'Cuộc phiêu lưu bắt đầu!!!', 'shoes2.jpeg', 'shoes4.jpeg', 'shoes4.jpeg', 'shoes4.jpeg', '199.80', 10, 'đen-xanh'),
(24, 'Áo khoác đen', 'áo khoác', 'Áo khoác tuyệt vời', 'featured5.jpeg', 'featured5.jpeg', 'featured5.jpeg', 'featured5.jpeg', '255.00', 20, 'đen'),
(25, 'Áo khoác đen', 'áo khoác', 'Áo khoác tuyệt vời', 'featured6.jpeg', 'featured6.jpeg', 'featured6.jpeg', 'featured6.jpeg', '299.99', 10, 'đen'),
(26, 'Áo khoác đỏ', 'áo khoác', 'Áo khoác tuyệt vời', 'featured7.jpeg', 'featured7.jpeg', 'featured7.jpeg', 'featured7.jpeg', '255.00', 20, 'đỏ'),
(27, 'Áo khoác xanh', 'áo khoác', 'Áo khoác tuyệt vời', 'featured8.jpeg', 'featured8.jpeg', 'featured8.jpeg', 'featured8.jpeg', '299.99', 10, 'xanh dương'),
(33, 'Giày xanh', 'giày', 'Giày xanh tuyệt vời', 'Blue shoes1.jpeg', 'Blue shoes2.jpeg', 'Blue shoes3.jpeg', 'Blue shoes4.jpeg', '300.00', 10, 'xanh'),
(34, 'Giày đỏ', 'giày', 'Giày đỏ phong cách mới', 'Red shoes1.jpeg', 'Red shoes2.jpeg', 'Red shoes3.jpeg', 'Red shoes4.jpeg', '350.00', 20, 'đỏ');


-- --------------------------------------------------------

-- Table structure for table `users`

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `user_email` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `user_password` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `UX_Constraint` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Dumping data for table `users`

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'fu', 'fu@email.com', 'e10adc3949ba59abbe56e057f20f883e');

COMMIT;
