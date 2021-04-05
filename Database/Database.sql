-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Apr 05, 2021 at 07:38 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(12) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `userName`, `password`, `status`, `createdDate`) VALUES
(1, 'Hiren', '66666', 1, '2021-03-20 10:21:52');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `attributeId` int(11) NOT NULL,
  `entityTypeId` enum('product','category','','') NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(20) NOT NULL,
  `inputType` varchar(20) NOT NULL,
  `backendType` varchar(64) DEFAULT NULL,
  `sortOrder` int(4) NOT NULL,
  `backendModel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`attributeId`, `entityTypeId`, `name`, `code`, `inputType`, `backendType`, `sortOrder`, `backendModel`) VALUES
(1, 'product', 'color', 'color', 'varchar', 'text', 1, '2'),
(4, 'category', 'color', 'color', 'varchar', 'text', 1, '2');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_options`
--

CREATE TABLE `attribute_options` (
  `optionId` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `attributeId` int(11) NOT NULL,
  `sortOrder` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute_options`
--

INSERT INTO `attribute_options` (`optionId`, `name`, `attributeId`, `sortOrder`) VALUES
(1, 'red', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `parentId` int(11) DEFAULT NULL,
  `name` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  `pathId` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `parentId`, `name`, `status`, `description`, `pathId`) VALUES
(1, 0, 'Bedroom', '1', NULL, '1'),
(101, 1, 'Beds', '1', '', '1=101'),
(102, 101, 'Panel Beds', '1', '', '1=101=102'),
(105, 0, 'Living room ', '1', '', '105'),
(106, 105, 'Sofa', '1', '', '105=106');

-- --------------------------------------------------------

--
-- Table structure for table `cms_page`
--

CREATE TABLE `cms_page` (
  `pageId` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `identifier` varchar(20) NOT NULL,
  `content` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerId` int(11) NOT NULL,
  `firstName` varchar(15) NOT NULL,
  `lastName` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(12) NOT NULL,
  `mobileNo` int(10) NOT NULL,
  `status` varchar(15) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `groupId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `firstName`, `lastName`, `email`, `password`, `mobileNo`, `status`, `createdDate`, `updatedDate`, `groupId`) VALUES
(2, 'Hiren', 'Patel', 'hhpatel6111@gmail.co', 'pass311', 12457854, '0', '0000-00-00 00:00:00', '2021-03-18 02:53:08', 1),
(9, 'Akshay', 'Shiyani', 'ak2701@gmail.com', 'sadak2321', 0, '0', '2021-03-18 04:12:01', '2021-03-18 08:42:01', 1),
(13, 'Archit', 'Meshiya', 'ameshiya@yahoo.com', 'Password', 0, '1', '2021-03-30 02:22:44', '2021-03-30 05:52:44', 1),
(14, 'Krunal', 'Gorasiya', 'kp0053@yahoo.com', 'kp007', 0, '1', '2021-03-31 03:28:28', '2021-03-31 06:58:28', 1),
(16, 'Dharmik', 'Tank', 'etrt@yahoo.com', 'rg34gt34', 0, '1', '2021-04-01 08:41:52', '2021-04-01 12:11:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `addressId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(15) NOT NULL,
  `state` varchar(15) NOT NULL,
  `zipcode` int(10) NOT NULL,
  `country` varchar(15) NOT NULL,
  `addressType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`addressId`, `customerId`, `address`, `city`, `state`, `zipcode`, `country`, `addressType`) VALUES
(15, 2, 'E-2,102,KRISHNA TOWNSHIP,SATE LIGHT ROAD,MOTA VARACHA', 'Surat', 'Gujarat', 0, 'India', 'Billing'),
(16, 2, 'E-2,102,KRISHNA TOWNSHIP,SATE LIGHT ROAD,MOTA VARA', 'Surat', 'Gujarat', 0, 'India', 'Shipping'),
(17, 9, '264,Hansh Society', 'SURAT', 'Gujarat', 394101, 'India', 'Billing'),
(18, 9, '264,Hansh Society', 'SURAT', 'Gujarat', 394101, 'India', 'Shipping'),
(19, 12, 'E-2,102,KRISHNA TOWNSHIP,SATE LIGHT ROAD,MOTA VARA', 'Select', 'Gujarat', 394101, 'India', 'Billing'),
(20, 12, 'E-2,102,KRISHNA TOWNSHIP,SATE LIGHT ROAD,MOTA VARA', 'Select', 'Gujarat', 394101, 'India', 'Shipping'),
(21, 13, '10,Green Park', 'SURAT', 'Gujarat', 394101, 'India', 'Billing'),
(22, 13, '10,Green Park', 'SURAT', 'Gujarat', 394101, 'India', 'Shipping'),
(23, 0, '108,GOVERNMENT ENGINEERING COLLEGE GIRLS HOSTEL,MAVDI-KANKOT ROAD,RAJKOT.', 'RAJKOT', 'Gujarat', 36005, 'India', 'Billing'),
(24, 0, '108,GOVERNMENT ENGINEERING COLLEGE GIRLS HOSTEL,MAVDI-KANKOT ROAD,RAJKOT.', 'RAJKOT', 'Gujarat', 360005, 'India', 'Shipping'),
(25, 16, '108,GOVERNMENT ENGINEERING COLLEGE GIRLS HOSTEL,MAVDI-KANKOT ROAD,RAJKOT.', 'RAJKOT', 'Gujarat', 360005, 'India', 'Billing'),
(26, 16, '108,GOVERNMENT ENGINEERING COLLEGE GIRLS HOSTEL,MAVDI-KANKOT ROAD,RAJKOT.', 'RAJKOT', 'Gujarat', 360005, 'India', 'Shipping'),
(27, 14, '10,Green Park', 'SURAT', 'Gujarat', 394101, 'India', 'Billing'),
(28, 14, '10,Green Park', 'SURAT', 'Gujarat', 394101, 'India', 'Shipping');

-- --------------------------------------------------------

--
-- Table structure for table `customer_group`
--

CREATE TABLE `customer_group` (
  `groupId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_group`
--

INSERT INTO `customer_group` (`groupId`, `name`, `status`, `createdDate`) VALUES
(1, 'retailer', 'Enabled', '0000-00-00 00:00:00'),
(2, 'Wholesaler', 'enable', '2021-03-18 07:06:46');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentId` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `code` varchar(12) NOT NULL,
  `description` varchar(150) NOT NULL,
  `status` varchar(10) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentId`, `name`, `code`, `description`, `status`, `createdDate`) VALUES
(1, 'Laptop', '65458', '66000', 'disable', '2021-03-02 16:38:06'),
(4, 'Bed', '362514', 'Full Size', 'enable', '2021-03-18 02:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(255) NOT NULL,
  `sku` int(12) NOT NULL,
  `name` varchar(15) NOT NULL,
  `price` float NOT NULL,
  `discount` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `sku`, `name`, `price`, `discount`, `quantity`, `description`, `status`, `createdDate`, `updatedDate`) VALUES
(208, 1100, 'Nokia1100', 1200, 100, 1, '4 GB RAM,8 GB ROM', '0', '2021-03-04 00:57:46', '2021-03-25 00:12:17'),
(216, 652315, 'Bed', 20000, 1000, 1, 'Full Size', '1', '2021-03-18 01:33:42', '2021-03-25 01:13:27'),
(217, 132165, 'Sofa', 25000, 0, 1, 'Flexible', '1', '2021-03-18 01:34:52', NULL),
(218, 33221, 'Night-Lamp', 1200, 100, 1, '', '1', '2021-03-24 23:31:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_group_price`
--

CREATE TABLE `product_group_price` (
  `entityId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `customerGroupId` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_group_price`
--

INSERT INTO `product_group_price` (`entityId`, `productId`, `customerGroupId`, `price`) VALUES
(1, 213, 1, 600),
(2, 208, 1, 1000),
(3, 215, 1, 1000),
(4, 215, 2, 800),
(5, 208, 2, 800),
(6, 216, 1, 19000),
(7, 216, 2, 18000);

-- --------------------------------------------------------

--
-- Table structure for table `product_media`
--

CREATE TABLE `product_media` (
  `imageId` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `label` varchar(255) NOT NULL,
  `small` tinyint(4) NOT NULL,
  `thumb` tinyint(4) NOT NULL,
  `base` tinyint(4) NOT NULL,
  `gallery` tinyint(4) NOT NULL,
  `productId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_media`
--

INSERT INTO `product_media` (`imageId`, `image`, `label`, `small`, `thumb`, `base`, `gallery`, `productId`) VALUES
(10, 'Images/Products/product1.jfif', 'product1.jfif', 0, 0, 0, 1, 208),
(11, 'Images/Products/thumb-1920-587777.png', 'thumb-1920-587777.png', 1, 1, 1, 1, 208);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shippingId` int(255) NOT NULL,
  `name` varchar(20) NOT NULL,
  `code` varchar(12) NOT NULL,
  `amount` int(10) NOT NULL,
  `description` varchar(150) NOT NULL,
  `status` varchar(10) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shippingId`, `name`, `code`, `amount`, `description`, `status`, `createdDate`) VALUES
(1, 'Mobile', '65458', 12000, 'vdsbss', 'Enabled', '2021-03-02 16:41:02'),
(3, 'Bed', '350201', 20000, 'Full size', 'enable', '2021-03-18 01:45:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`attributeId`);

--
-- Indexes for table `attribute_options`
--
ALTER TABLE `attribute_options`
  ADD PRIMARY KEY (`optionId`),
  ADD KEY `attributeId` (`attributeId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`),
  ADD KEY `parentId` (`parentId`);

--
-- Indexes for table `cms_page`
--
ALTER TABLE `cms_page`
  ADD PRIMARY KEY (`pageId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`),
  ADD KEY `groupId` (`groupId`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`addressId`);

--
-- Indexes for table `customer_group`
--
ALTER TABLE `customer_group`
  ADD PRIMARY KEY (`groupId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `product_group_price`
--
ALTER TABLE `product_group_price`
  ADD PRIMARY KEY (`entityId`);

--
-- Indexes for table `product_media`
--
ALTER TABLE `product_media`
  ADD PRIMARY KEY (`imageId`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shippingId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `attributeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attribute_options`
--
ALTER TABLE `attribute_options`
  MODIFY `optionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `cms_page`
--
ALTER TABLE `cms_page`
  MODIFY `pageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `addressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `customer_group`
--
ALTER TABLE `customer_group`
  MODIFY `groupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT for table `product_group_price`
--
ALTER TABLE `product_group_price`
  MODIFY `entityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_media`
--
ALTER TABLE `product_media`
  MODIFY `imageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shippingId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_options`
--
ALTER TABLE `attribute_options`
  ADD CONSTRAINT `attribute_options_ibfk_1` FOREIGN KEY (`attributeId`) REFERENCES `attribute` (`attributeId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
