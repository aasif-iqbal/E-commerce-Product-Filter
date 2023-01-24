-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 23, 2023 at 01:22 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Product_filter`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brands`
--

CREATE TABLE `tbl_brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_brands`
--

INSERT INTO `tbl_brands` (`brand_id`, `brand_name`, `status`) VALUES
(1, 'Flying Machine', 1),
(2, 'Jack & Jones', 1),
(3, 'H&M', 1),
(4, 'WRONG', 1),
(5, 'Roadster', 1),
(6, 'Tommy Hilfiger', 1),
(7, 'Puma', 1),
(8, 'United Colors of Benetton', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `parent_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`category_id`, `category_name`, `parent_category_id`) VALUES
(1, 'Men', 0),
(2, 'Women', 0),
(3, 'Baby & Kids', 0),
(4, 'T-shirts', 1),
(5, 'Formal Shirts', 1),
(6, 'Casual Shirts', 1),
(7, 'Jackets & Sweatshirts', 1),
(8, 'Kurtas & suits', 2),
(9, 'Ethnic Dresses', 2),
(10, 'Dupattas & Shawls', 2),
(11, 'Kurtis, Tunics & Tops', 2),
(12, 'Track Pants & Pyjamas', 3),
(13, 'T-Shirts', 3),
(14, 'Clothing Sets', 3),
(15, 'Dungarees & Jumpsuits', 3),
(16, 'Jeans', 1),
(17, 'Gowns', 2),
(19, 'Jeans', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_colors`
--

CREATE TABLE `tbl_colors` (
  `color_id` int(11) NOT NULL,
  `color_name` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_colors`
--

INSERT INTO `tbl_colors` (`color_id`, `color_name`, `status`) VALUES
(1, 'Red', 1),
(2, 'Black', 1),
(3, 'Blue', 1),
(4, 'Green', 1),
(5, 'Yellow', 1),
(6, 'Pink', 1),
(7, 'Brown', 1),
(8, 'Gray', 1),
(9, 'White', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` int(11) NOT NULL,
  `product_parent_cat_id` int(11) NOT NULL,
  `product_child_cat_id` int(11) NOT NULL,
  `product_brand_id` int(11) NOT NULL,
  `product_color_id` int(2) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_short_description` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_mrp` float NOT NULL,
  `product_discount` int(11) NOT NULL,
  `product_actual_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_model_no` varchar(255) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `product_parent_cat_id`, `product_child_cat_id`, `product_brand_id`, `product_color_id`, `product_name`, `product_short_description`, `product_description`, `product_mrp`, `product_discount`, `product_actual_price`, `product_quantity`, `product_model_no`, `product_color`, `product_size`, `product_image`, `status`) VALUES
(1, 1, 4, 2, 6, 'Solid Round Neck T-shirt', 'Men Pink Solid Round Neck T-shirt', '<p>Solid Round Neck T-shirt</p>\r\n<p>Solid Round Neck T-shirt</p>\r\n', 499, 40, 299.4, 3, 'NMAGCQJ', 'Pink', 'S,M,L,XL', 'image/casual-wear-mens-t-shirt-351.jpg', 1),
(2, 1, 4, 4, 9, 'Printed Slim Fit T-shirt', 'White Printed Slim Fit T-shirt', '<p>Printed Slim Fit T-shirt</p>\r\n<p>Printed Slim Fit T-shirt</p>\r\n', 699, 30, 489.3, 2, 'HD6GZ5R', 'White', 'S,M,L,XXL', 'image/p2.jpeg', 1),
(3, 1, 4, 5, 4, 'Striped Round Neck T-shirt', 'Men Black-Olive Green Striped Round Neck T-shirt', '<p>Men Black &amp; Olive Green Striped Round Neck T-shirt</p>\r\n', 650, 20, 520, 2, 'IPAXRWG', 'Green', 'M,L,XL', 'image/w2.jpeg', 1),
(4, 1, 4, 8, 4, 'Colour blocked T-shirt', 'Men Green-Black Colour blocked T-shirt', '<p>Colour blocked T-shirt</p>\r\n<p>Colour blocked T-shirt</p>\r\n', 800, 25, 600, 2, 'ZB3CMXF', 'Green', 'M,L,XXL', 'image/p1.jpg', 1),
(5, 1, 4, 6, 6, 'Solid Round Neck T-shirt', 'Men Pink Solid Round Neck T-shirt', '<p>Men Pink Solid Round Neck T-shirt</p>\r\n', 599, 30, 419.3, 2, '3PBN0WA', 'Pink', 'S,M,L,XL', 'image/POLO-T-SHIRT.jpg', 1),
(6, 1, 4, 1, 2, 'Printed Longline T-shirt', 'Men Black Printed Longline T-shirt', '<p>Men Black Tshirt</p>\r\n', 499, 25, 374.25, 2, '25YJ6XK', 'Black', 'S,M,L,XL', 'image/tshirt-unisex-200x300.jpg', 1),
(7, 1, 5, 3, 2, 'Slim Fit Solid Formal Shirt', 'Men Black Slim Fit Solid Formal Shirt', '<p>formal</p>\r\n', 1399, 50, 699.5, 7, '5894KO6', 'Black', 'S,M,L,XL', 'image/SHRT12BLK-A_300x300.jpg', 1),
(8, 1, 5, 2, 9, 'Slim Fit Solid Formal Shirt', 'Men White Slim Fit Solid Formal Shirt', '<p>Formal</p>\r\n', 1000, 20, 800, 2, 'WLC3Q09', 'White', 'S,M,L,XL', 'image/a.jpg', 1),
(9, 1, 5, 1, 3, 'Slim Fit Solid Formal Shirt', 'Men Blue Smart Slim Fit Solid Formal Shirt', '<p>Slim Fit Solid Formal Shirt</p>\r\n', 1400, 20, 1120, 2, '1S3TNW7', 'Blue', 'S,M,L,XL', 'image/blue.jpeg', 1),
(10, 1, 16, 1, 3, 'Slim Tapered Stretchable Jeans', 'Men Blue Slim Tapered Mid-Rise Clean Look Stretchable Jeans', '<p>Slim Tapered Mid-Rise Clean Look Stretchable Jeans</p>\r\n', 1999, 20, 1599.2, 7, '6TAW8H5', 'Blue', 'M,L,XL', 'image/men-s-jeans-930.jpg', 1),
(11, 1, 16, 5, 4, 'Slim Fit Stretchable Jeans', 'Men Green Slim Fit Mid-Rise Clean Look Stretchable Jeans', '<p>Men Green Slim Fit Mid-Rise Clean Look Stretchable Jeans</p>\r\n', 2500, 30, 1750, 1, 'FL4HGBA', 'Green', 'S,M,L,XL', 'image/item_L_22459991_30601857.jpg', 1),
(12, 1, 16, 4, 7, 'Khaki Slim Fit Stretchable Jeans', 'Men Khaki Slim Fit Mid-Rise Clean Look Stretchable Jeans', '<p>Men Khaki Slim Fit Mid-Rise Clean Look Stretchable Jeans</p>\r\n', 2800, 30, 1960, 12, '3PK492H', 'Brown', 'S,M,L,XL', 'image/imagesoio.jpeg', 1),
(13, 1, 12, 3, 9, 'H&M T-shirt', 'H&M T-shirt', 'H&M T-shirt', 1200, 50, 600, 1, 'NMAGCQK', 'White', 'M,L,XL', 'image/1.jpg', 1),
(14, 1, 13, 4, 2, 'WRONG Black T-Shirt', 'WRONG Black T-Shirt', 'WRONG Black T-Shirt', 1400, 40, 840, 9, 'NMAGCQF', 'Black', 'S,M,L,XL', 'image/2.jpg', 1),
(15, 1, 12, 3, 9, 'T-Shirt', 'T-Shirt', 'T-Shirt', 1200, 50, 600, 15, 'NMAGCQK', 'White', 'M,L,XL', 'image/3.jpg', 1),
(16, 1, 12, 3, 9, 'T-Shirt', 'T-Shirt', 'T-Shirt', 1200, 50, 600, 15, 'NMAGCQK', 'White', 'M,L,XL', 'image/4.jpg', 1),
(17, 1, 12, 3, 9, 'T-Shirt', 'T-Shirt', 'T-Shirt', 1200, 50, 600, 15, 'NMAGCQK', 'White', 'M,L,XL', 'image/5.jpg', 1),
(18, 1, 12, 3, 9, 'T-Shirt', 'T-Shirt', 'T-Shirt', 1200, 50, 600, 15, 'NMAGCQK', 'White', 'M,L,XL', 'image/6.jpg', 1),
(19, 1, 12, 3, 9, 'T-Shirt', 'T-Shirt', 'T-Shirt', 1200, 50, 600, 15, 'NMAGCQK', 'White', 'M,L,XL', 'image/7.jpg', 1),
(20, 1, 12, 3, 9, 'T-Shirt', 'T-Shirt', 'T-Shirt', 1200, 50, 600, 15, 'NMAGCQK', 'White', 'M,L,XL', 'image/8.jpg', 1),
(21, 1, 12, 3, 9, 'T-Shirt', 'T-Shirt', 'T-Shirt', 1200, 50, 600, 15, 'NMAGCQK', 'White', 'M,L,XL', 'image/9.jpg', 1),
(22, 1, 12, 3, 9, 'T-Shirt', 'T-Shirt', 'T-Shirt', 1200, 50, 600, 15, 'NMAGCQK', 'White', 'M,L,XL', 'image/10.jpg', 1),
(23, 1, 12, 3, 9, 'T-Shirt', 'T-Shirt', 'T-Shirt', 1200, 50, 600, 15, 'NMAGCQK', 'White', 'M,L,XL', 'image/11.jpg', 1),
(24, 1, 12, 3, 9, 'T-Shirt', 'T-Shirt', 'T-Shirt', 1200, 50, 600, 15, 'NMAGCQK', 'White', 'M,L,XL', 'image/12.jpg', 1),
(25, 1, 12, 3, 9, 'T-Shirt', 'T-Shirt', 'T-Shirt', 1200, 50, 600, 15, 'NMAGCQK', 'White', 'M,L,XL', 'image/13.jpg', 1),
(26, 1, 12, 3, 9, 'T-Shirt', 'T-Shirt', 'T-Shirt', 1200, 50, 600, 15, 'NMAGCQK', 'White', 'M,L,XL', 'image/14.jpg', 1),
(27, 1, 12, 3, 9, 'T-Shirt', 'T-Shirt', 'T-Shirt', 1200, 50, 600, 15, 'NMAGCQK', 'White', 'M,L,XL', 'image/15.jpg', 1),
(28, 1, 12, 3, 9, 'T-Shirt', 'T-Shirt', 'T-Shirt', 1200, 50, 600, 15, 'NMAGCQK', 'White', 'M,L,XL', 'image/16.jpg', 1),
(29, 1, 12, 3, 9, 'T-Shirt', 'T-Shirt', 'T-Shirt', 1200, 50, 600, 15, 'NMAGCQK', 'White', 'M,L,XL', 'image/17.jpg', 1),
(30, 1, 12, 3, 9, 'T-Shirt', 'T-Shirt', 'T-Shirt', 1200, 50, 600, 15, 'NMAGCQK', 'White', 'M,L,XL', 'image/18.jpg', 1),
(31, 1, 12, 3, 9, 'T-Shirt', 'T-Shirt', 'T-Shirt', 1200, 50, 600, 15, 'NMAGCQK', 'White', 'M,L,XL', 'image/19.jpg', 1),
(32, 1, 12, 3, 9, 'T-Shirt', 'T-Shirt', 'T-Shirt', 1200, 50, 600, 15, 'NMAGCQK', 'White', 'M,L,XL', 'image/20.jpg', 1),
(33, 1, 12, 3, 9, 'T-Shirt', 'T-Shirt', 'T-Shirt', 1200, 50, 600, 15, 'NMAGCQK', 'White', 'M,L,XL', 'image/21.jpg', 1),
(34, 1, 12, 3, 9, 'T-Shirt', 'T-Shirt', 'T-Shirt', 1200, 50, 600, 15, 'NMAGCQK', 'White', 'M,L,XL', 'image/22.jpg', 1),
(35, 1, 12, 3, 9, 'T-Shirt', 'T-Shirt', 'T-Shirt', 1200, 50, 600, 15, 'NMAGCQK', 'White', 'M,L,XL', 'image/23.jpg', 1),
(36, 1, 12, 3, 9, 'T-Shirt', 'T-Shirt', 'T-Shirt', 1200, 50, 600, 15, 'NMAGCQK', 'White', 'M,L,XL', 'image/24.jpg', 1),
(37, 1, 12, 3, 9, 'T-Shirt', 'T-Shirt', 'T-Shirt', 1200, 50, 600, 15, 'NMAGCQK', 'White', 'M,L,XL', 'image/25.jpg', 1),
(38, 1, 12, 3, 9, 'T-Shirt', 'T-Shirt', 'T-Shirt', 1200, 50, 600, 15, 'NMAGCQK', 'White', 'M,L,XL', 'image/26.jpg', 1),
(39, 1, 12, 3, 9, 'T-Shirt', 'T-Shirt', 'T-Shirt', 1200, 50, 600, 15, 'NMAGCQK', 'White', 'M,L,XL', 'image/27.jpg', 1),
(40, 1, 12, 3, 9, 'T-Shirt', 'T-Shirt', 'T-Shirt', 1200, 50, 600, 15, 'NMAGCQK', 'White', 'M,L,XL', 'image/28.jpg', 1),
(41, 1, 12, 3, 9, 'T-Shirt', 'T-Shirt', 'T-Shirt', 1200, 50, 600, 15, 'NMAGCQK', 'White', 'M,L,XL', 'image/29.jpg', 1),
(42, 1, 12, 3, 9, 'T-Shirt', 'T-Shirt', 'T-Shirt', 1200, 50, 600, 15, 'NMAGCQK', 'White', 'M,L,XL', 'image/30.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sizes`
--

CREATE TABLE `tbl_sizes` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sizes`
--

INSERT INTO `tbl_sizes` (`size_id`, `size_name`, `status`) VALUES
(1, 'S', 1),
(2, 'M', 1),
(3, 'L', 1),
(4, 'XL', 1),
(5, 'XXL', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_brands`
--
ALTER TABLE `tbl_brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_colors`
--
ALTER TABLE `tbl_colors`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_sizes`
--
ALTER TABLE `tbl_sizes`
  ADD PRIMARY KEY (`size_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_brands`
--
ALTER TABLE `tbl_brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_colors`
--
ALTER TABLE `tbl_colors`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_sizes`
--
ALTER TABLE `tbl_sizes`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
