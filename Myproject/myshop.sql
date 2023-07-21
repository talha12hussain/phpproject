-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2023 at 07:29 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(10) NOT NULL,
  `brand_titel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_titel`) VALUES
(1, 'HP'),
(2, 'Dell'),
(3, 'Nokia'),
(4, 'Sumsange'),
(5, 'Techno');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_addres` int(10) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_addres`, `qty`) VALUES
(3, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_titel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_titel`) VALUES
(1, 'Laptops'),
(2, 'Computers'),
(3, 'Camers'),
(4, 'Tablets'),
(5, 'Mobiles'),
(6, 'Tv');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_password` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` int(10) NOT NULL,
  `customer_addres` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_country`, `customer_city`, `customer_contact`, `customer_addres`, `customer_image`, `customer_ip`) VALUES
(2, 'zorain', 'zorain@gmail.com', '123', 'Pakistan', 'lahore', 2147483647, 'korangi no 1', 'm2.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `envoice_no` int(100) NOT NULL,
  `total_product` int(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`order_id`, `customer_id`, `due_amount`, `envoice_no`, `total_product`, `order_date`, `order_status`) VALUES
(9, 2, 100, 2021812147, 1, '0000-00-00 00:00:00', 'pending'),
(10, 2, 300, 177271301, 3, '0000-00-00 00:00:00', 'pending'),
(11, 2, 100, 1690205446, 1, '0000-00-00 00:00:00', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `pending_order`
--

CREATE TABLE `pending_order` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `envoice_no` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_order`
--

INSERT INTO `pending_order` (`order_id`, `customer_id`, `envoice_no`, `product_id`, `qty`, `order_status`) VALUES
(8, 2, 2021812147, 4, 1, 0),
(9, 2, 177271301, 5, 1, 0),
(10, 2, 1690205446, 3, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_titel` text NOT NULL,
  `product_image1` text NOT NULL,
  `product_image2` text NOT NULL,
  `product_image3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_des` text NOT NULL,
  `product_keywords` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `brand_id`, `date`, `product_titel`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `product_des`, `product_keywords`, `status`) VALUES
(1, 1, 2, '2023-07-18 13:26:38', 'Mobile', 'lap1.png', 'lap1.png', 'lap1.png', 200, 'laptop', '', 'on'),
(2, 1, 2, '2023-07-18 14:47:10', 'Mobile', 'lap1.png', 'lap1.png', 'lap1.png', 200, 'laptop', '', 'on'),
(3, 6, 4, '2023-07-18 14:48:16', 'led', 'led2.png', 'led2.png', 'led2.png', 100, 'led', '', 'on'),
(4, 5, 5, '2023-07-18 14:49:12', 'Mobile', 'm2.png', 'm2.png', 'm2.png', 100, 'MOBILE', '', 'on'),
(5, 5, 5, '2023-07-19 14:37:08', 'Mobile', 'm2.png', 'm2.png', 'm2.png', 100, 'MOBILE', '', 'on');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `pending_order`
--
ALTER TABLE `pending_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pending_order`
--
ALTER TABLE `pending_order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
