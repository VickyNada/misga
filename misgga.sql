-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2021 at 07:55 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `misgga`
--

-- --------------------------------------------------------

--
-- Table structure for table `consumers`
--

CREATE TABLE `consumers` (
  `id` int(11) NOT NULL,
  `role` int(10) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nic` varchar(15) NOT NULL,
  `drivinglicense` varchar(20) NOT NULL,
  `expirydate` date NOT NULL,
  `Billing` varchar(250) NOT NULL,
  `Delivery` varchar(250) NOT NULL,
  `city` varchar(15) NOT NULL,
  `contact1` int(20) NOT NULL,
  `contact2` int(20) NOT NULL,
  `picture` varchar(250) NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `delete_status` int(1) NOT NULL,
  `active_status` int(11) NOT NULL,
  `area` varchar(250) NOT NULL,
  `farm_name` varchar(100) NOT NULL,
  `pass_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consumers`
--

INSERT INTO `consumers` (`id`, `role`, `first_name`, `last_name`, `email`, `password`, `nic`, `drivinglicense`, `expirydate`, `Billing`, `Delivery`, `city`, `contact1`, `contact2`, `picture`, `date_updated`, `delete_status`, `active_status`, `area`, `farm_name`, `pass_status`) VALUES
(34, 3, 'Rose', 'D Carter', 'Rose@gmail.com', '202cb962ac59075b964b07152d234b70', '123123123123', '', '0000-00-00', '4391 Corbin Branch Road', '56, Rock road, Colombo', 'Colombo', 2147483647, 1234433344, './assets/img/custom/customers/1628781532a3.jpg', '2021-08-12 15:18:52', 0, 0, '', '', 0),
(36, 5, 'Thomas', 'Wood', 'Thomas@gmail.com', '202cb962ac59075b964b07152d234b70', '23323232323', 'B123456', '2021-08-31', '2358 Biddie Lane', '', 'Tennessee', 1234567890, 2147483647, './assets/img/custom/deliveryusers/1628786342.jpg', '2021-08-12 16:39:02', 0, 0, '', '', 0),
(42, 4, 'Romana', 'D Carter', 'Roamana@gmail.com', '202cb962ac59075b964b07152d234b70', '12212121212', '', '0000-00-00', '16/5, Station Road, Wattala', '15/5, Bus Lane, Wattala', 'Wattala', 2147483647, 2147483647, './assets/img/custom/farmers/1628791310a3.jpg', '2021-08-12 18:01:50', 0, 0, '56', 'Dairy World', 0),
(43, 4, 'Peter', 'Cummings', 'Peter@gmail.com', '202cb962ac59075b964b07152d234b70', '12212121212', '', '0000-00-00', '4391 Corbin Branch Road', '15/5, Bus Lane, Wattala', 'Wattala', 1234567890, 1234567890, './assets/img/custom/farmers/1628791521a2.jpg', '2021-08-12 18:05:21', 0, 0, '56', 'Dairy World', 0),
(44, 4, 'Lois', 'Hanneman', 'Hanneman@gmail.com', '202cb962ac59075b964b07152d234b70', '12212121212', '', '0000-00-00', '16/5, Station Road, Wattala', '56, Rock road, Colombo', 'Tennessee', 1234567890, 2147483647, './assets/img/custom/farmers/1628791608a4.jpg', '2021-08-12 18:06:48', 0, 0, '56', 'Bunny Farm', 0),
(45, 5, 'Patrick', 'Benson', 'Patrick@gmail.com', '202cb962ac59075b964b07152d234b70', '12212121212', 'B123456', '2021-08-27', '16/5, Station Road, Wattala', '', 'Minnosota', 1234567890, 2147483647, './assets/img/custom/deliveryusers/1628793811a7.jpg', '2021-08-12 18:43:31', 0, 0, '', '', 0),
(46, 5, 'Vicky', 'nadaraja', 'vickynada@gmail.com', 'cd56235491d3141bc47ae90a6b59aa00', '930412511', 'asdasd', '2021-07-08', 'ds', '', 'KDSKL', 756485811, 0, './assets/img/custom/deliveryusers/16291297111628956487man-avatar-profile-P9MYWR.jpg', '2021-08-16 16:01:51', 0, 0, '', '', 0),
(47, 5, 'pathuma', 'nadaraja', 'pathuma@gmail.com', '202cb962ac59075b964b07152d234b70', '930412511', 'asdasd', '2021-09-02', 'ds', '', 'dsf', 756485811, 0, './assets/img/custom/deliveryusers/16291319741628956487man-avatar-profile-P9MYWR.jpg', '2021-08-16 16:39:34', 0, 0, '', '', 0),
(48, 3, 'Vicky', 'nadaraja', 'pathuma@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02', '930412511', '', '0000-00-00', 'sdfdsf', 'sd', 'SD', 756485811, 756485811, './assets/img/custom/customers/16291326001628956487man-avatar-profile-P9MYWR.jpg', '2021-08-16 16:50:00', 0, 0, '', '', 0),
(49, 5, 'asdasd', 'asdasd', 'asdasd@gmail.com', '202cb962ac59075b964b07152d234b70', '930412511', '232323', '2021-08-02', 'sasdsad', '', 'sad', 756485811, 0, './assets/img/custom/deliveryusers/1629136506', '2021-08-16 17:55:06', 0, 2, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `farmer_corps`
--

CREATE TABLE `farmer_corps` (
  `id` int(100) NOT NULL,
  `farmer_id` int(100) NOT NULL,
  `corp_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `farmer_corps`
--

INSERT INTO `farmer_corps` (`id`, `farmer_id`, `corp_id`) VALUES
(6, 42, 122),
(7, 42, 125),
(8, 42, 122),
(9, 42, 123),
(10, 42, 125);

-- --------------------------------------------------------

--
-- Table structure for table `farm_images`
--

CREATE TABLE `farm_images` (
  `id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `farm_images`
--

INSERT INTO `farm_images` (`id`, `farmer_id`, `picture`) VALUES
(21, 42, './assets/img/custom/farmers/1628791310p_big1.jpg'),
(22, 42, './assets/img/custom/farmers/1628791310p_big2.jpg'),
(23, 42, './assets/img/custom/farmers/1628791310p_big3.jpg'),
(26, 43, './assets/img/custom/farmers/1628791521p1.jpg'),
(27, 43, './assets/img/custom/farmers/1628791521p2.jpg'),
(28, 43, './assets/img/custom/farmers/1628791521p3.jpg'),
(29, 43, './assets/img/custom/farmers/1628791521p4.jpg'),
(30, 43, './assets/img/custom/farmers/1628791521p5.jpg'),
(31, 44, './assets/img/custom/farmers/1628791608p7.jpg'),
(32, 44, './assets/img/custom/farmers/1628791608p8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_master`
--

CREATE TABLE `inventory_master` (
  `id` int(11) NOT NULL,
  `Itemcode` int(11) NOT NULL,
  `itemname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_code` int(11) NOT NULL,
  `Item_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storage_id` int(11) NOT NULL,
  `additional_details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Item_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createddate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_modified` timestamp NOT NULL DEFAULT current_timestamp(),
  `createdby` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_master`
--

INSERT INTO `inventory_master` (`id`, `Itemcode`, `itemname`, `unit`, `category_code`, `Item_category`, `storage_id`, `additional_details`, `Item_status`, `createddate`, `last_modified`, `createdby`, `delete_status`) VALUES
(122, 100, 'Apple', '1', 0, '2', 1, 'Apple from australia', '1', '2021-08-14 15:12:29', '2021-08-14 15:12:29', '165', 0),
(123, 101, 'Water', '3', 0, '1', 1, '123', '1', '2021-08-14 15:32:51', '2021-08-14 15:32:51', '165', 0),
(125, 102, 'Orange', '1', 0, '2', 3, 'wwe', '1', '2021-08-14 15:47:09', '2021-08-14 15:47:09', '165', 0),
(126, 103, 'Avacado', '1', 0, '2', 2, 'qqwe', '1', '2021-08-14 15:58:50', '2021-08-14 15:58:35', '165', 0);

-- --------------------------------------------------------

--
-- Table structure for table `itemcategory`
--

CREATE TABLE `itemcategory` (
  `id` int(11) NOT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `itemcategory`
--

INSERT INTO `itemcategory` (`id`, `category`, `description`, `status`, `created_date`, `delete_status`) VALUES
(1, 'Fruit', 'freshfruit', '2', '2021-08-15 23:27:06', 0),
(6, 'Fruit', 'dry fruit', '2', '2021-08-15 23:49:33', 0),
(7, 'Vegitable', 'asd', '1', '2021-08-16 00:04:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `id` int(11) NOT NULL,
  `storage_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `storage_types`
--

CREATE TABLE `storage_types` (
  `id` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `storage_types`
--

INSERT INTO `storage_types` (`id`, `type`) VALUES
(13, 'Light Cooler Storage'),
(14, 'Heavy Cooler Storage'),
(15, 'Warehouse 1');

-- --------------------------------------------------------

--
-- Table structure for table `storage_types_vol`
--

CREATE TABLE `storage_types_vol` (
  `id` int(11) NOT NULL,
  `type_id` int(50) NOT NULL,
  `size` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vol` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `storage_types_vol`
--

INSERT INTO `storage_types_vol` (`id`, `type_id`, `size`, `vol`) VALUES
(5, 13, 'Small', 12),
(6, 13, 'Medium', 3),
(7, 13, 'Large', 4),
(8, 13, 'XL', 4),
(9, 13, 'XXL', 1),
(10, 14, 'Small', 20),
(11, 14, 'Medium', 20),
(12, 15, 'Small', 14),
(13, 15, 'Medium', 13),
(14, 15, 'Large', 43);

-- --------------------------------------------------------

--
-- Table structure for table `unitmeasure`
--

CREATE TABLE `unitmeasure` (
  `id` int(11) NOT NULL,
  `unitname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unitmeasure`
--

INSERT INTO `unitmeasure` (`id`, `unitname`, `description`, `created_by`, `created_date`, `delete_status`) VALUES
(1, 'Kilogram', 'Kilogram', 'avalable', '2021-08-14 23:11:17', 1),
(2, 'kilogramasd', 'kilogram', '165', '2021-08-14 23:59:39', 0),
(8, 'kilogram', 'gram', '165', '2021-08-15 00:30:52', 1),
(9, 'kilogram', 'kilogram', '165', '2021-08-15 00:35:22', 1),
(10, 'bottle', 'bottle', '165', '2021-08-15 21:24:59', 1),
(11, 'Gram', 'Gram', '165', '2021-08-16 20:01:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` int(11) NOT NULL,
  `active_status` int(11) NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `first_name`, `last_name`, `email`, `delete_status`, `active_status`, `password`, `pass_status`) VALUES
(164, 1, 'Admin', 'user', 'admin@admin.com', 0, 0, '202cb962ac59075b964b07152d234b70', 0),
(165, 1, 'Vicky', 'Nadaraja', 'Vickynada@gmail.com', 0, 0, '202cb962ac59075b964b07152d234b70', 0),
(240, 1, 'warriors ', 'warriors ', 'warriors', 0, 0, '202cb962ac59075b964b07152d234b70', 0),
(260, 2, 'John', 'doe', 'john@gmail.com', 0, 0, '202cb962ac59075b964b07152d234b70', 0),
(270, 0, 'Double', 'Patch', 'asdfw@c.com', 0, 0, '', 1),
(271, 1, '123', '234', 'qw@gmail.com', 1, 0, '', 1),
(272, 1, 'meow', 'teacher', 'asas@gmokj.com', 0, 0, '', 1),
(273, 0, 'Dog', 'Anna', 'Dog@gmail.com', 0, 0, '', 1),
(274, 1, 'ram', 'sam', 'ramsam@gmail.com', 0, 0, '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_images`
--

CREATE TABLE `vehicle_images` (
  `id` int(11) NOT NULL,
  `deliveryuser_id` int(11) NOT NULL,
  `image_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_images`
--

INSERT INTO `vehicle_images` (`id`, `deliveryuser_id`, `image_type`, `image`) VALUES
(1, 45, 'dril', './assets/img/custom/deliveryusers/1628793811zender_logo.png'),
(2, 45, 'revl', './assets/img/custom/deliveryusers/1628793811starter_logo.jpg'),
(3, 45, 'ins', './assets/img/custom/deliveryusers/1628793811rails_logo.png'),
(4, 45, 'vb', './assets/img/custom/deliveryusers/1628793811rails_logo.png'),
(5, 46, 'dril', './assets/img/custom/deliveryusers/16291297111628956487man-avatar-profile-P9MYWR.jpg'),
(6, 46, 'revl', './assets/img/custom/deliveryusers/16291297111628956487man-avatar-profile-P9MYWR.jpg'),
(7, 46, 'ins', './assets/img/custom/deliveryusers/16291297111628956487man-avatar-profile-P9MYWR.jpg'),
(8, 46, 'vb', './assets/img/custom/deliveryusers/16291297121628956487man-avatar-profile-P9MYWR.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_info`
--

CREATE TABLE `vehicle_info` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `vehicle_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_model` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regnumber` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_info`
--

INSERT INTO `vehicle_info` (`id`, `userId`, `vehicle_type`, `manufacturer`, `vehicle_model`, `regnumber`) VALUES
(5, 36, 'VAN', 'Totota', 'KDH', 'CAA-1234'),
(6, 45, 'Car', 'Honda', 'Grace', 'CAA-1234'),
(7, 46, 'Car', 'Hero', 'adasd', 'asdasd'),
(8, 47, 'Motor bikes', 'Bajaj', 'adasd', 'asdasd'),
(9, 49, 'Car', 'Hero', 'sdasd', 'sadasd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consumers`
--
ALTER TABLE `consumers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmer_corps`
--
ALTER TABLE `farmer_corps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farmer_id` (`farmer_id`),
  ADD KEY `corp_id` (`corp_id`);

--
-- Indexes for table `farm_images`
--
ALTER TABLE `farm_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farmer_id` (`farmer_id`);

--
-- Indexes for table `inventory_master`
--
ALTER TABLE `inventory_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itemcategory`
--
ALTER TABLE `itemcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storage_types`
--
ALTER TABLE `storage_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storage_types_vol`
--
ALTER TABLE `storage_types_vol`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unitmeasure`
--
ALTER TABLE `unitmeasure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_images`
--
ALTER TABLE `vehicle_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deliveryuser_id` (`deliveryuser_id`);

--
-- Indexes for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_userid` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consumers`
--
ALTER TABLE `consumers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `farmer_corps`
--
ALTER TABLE `farmer_corps`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `farm_images`
--
ALTER TABLE `farm_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `inventory_master`
--
ALTER TABLE `inventory_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `itemcategory`
--
ALTER TABLE `itemcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `storage_types`
--
ALTER TABLE `storage_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `storage_types_vol`
--
ALTER TABLE `storage_types_vol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `unitmeasure`
--
ALTER TABLE `unitmeasure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;

--
-- AUTO_INCREMENT for table `vehicle_images`
--
ALTER TABLE `vehicle_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `farmer_corps`
--
ALTER TABLE `farmer_corps`
  ADD CONSTRAINT `farmer_corps_ibfk_1` FOREIGN KEY (`corp_id`) REFERENCES `inventory_master` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `farmer_corps_ibfk_2` FOREIGN KEY (`farmer_id`) REFERENCES `consumers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `farm_images`
--
ALTER TABLE `farm_images`
  ADD CONSTRAINT `fk_farmerid` FOREIGN KEY (`farmer_id`) REFERENCES `consumers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `vehicle_images`
--
ALTER TABLE `vehicle_images`
  ADD CONSTRAINT `fk_deliverid` FOREIGN KEY (`deliveryuser_id`) REFERENCES `consumers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  ADD CONSTRAINT `fk_userid` FOREIGN KEY (`userId`) REFERENCES `consumers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
