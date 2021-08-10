-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2021 at 07:59 PM
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
CREATE DATABASE IF NOT EXISTS `misgga` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `misgga`;

-- --------------------------------------------------------

--
-- Table structure for table `consumers`
--

CREATE TABLE `consumers` (
  `id` int(11) NOT NULL,
  `role` enum('Customer','Farmer','Deliveryuser') NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nic` varchar(15) NOT NULL,
  `Billing` varchar(250) NOT NULL,
  `Delivery` varchar(250) NOT NULL,
  `city` varchar(15) NOT NULL,
  `contact1` int(20) NOT NULL,
  `contact2` int(20) NOT NULL,
  `picture` varchar(250) NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `delete_status` int(1) NOT NULL,
  `address` varchar(250) NOT NULL,
  `area` varchar(250) NOT NULL,
  `license` varchar(15) NOT NULL,
  `vehicletype` varchar(50) NOT NULL,
  `modal` varchar(50) NOT NULL,
  `vehiclenumber` varchar(15) NOT NULL,
  `farm_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consumers`
--

INSERT INTO `consumers` (`id`, `role`, `firstname`, `lastname`, `email`, `password`, `nic`, `Billing`, `Delivery`, `city`, `contact1`, `contact2`, `picture`, `date_updated`, `delete_status`, `address`, `area`, `license`, `vehicletype`, `modal`, `vehiclenumber`, `farm_name`) VALUES
(29, 'Customer', 'Vicky', 'nada', 'Customer1@gmail.com', '202cb962ac59075b964b07152d234b70', '930412511', 'ds', 'KSDJKDS', 'sd', 756485811, 756485811, './assets/img/custom/customers/\\1628617424', '2021-08-10 17:43:44', 0, '', '', '', '', '', '', ''),
(30, 'Farmer', 'Vicky', 'nadaraja', 'Customer1@gmail.com', '202cb962ac59075b964b07152d234b70', '930412511', 'ds', 'KSDJKDS', 'sd', 756485811, 756485811, './assets/img/custom/farmers/\\1628617496', '2021-08-10 17:44:56', 0, '', '99', '', '', '', '', 'FARM');

-- --------------------------------------------------------

--
-- Table structure for table `farm_images`
--

CREATE TABLE `farm_images` (
  `id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `regnumber` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driving_license` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consumers`
--
ALTER TABLE `consumers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farm_images`
--
ALTER TABLE `farm_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farmer_id` (`farmer_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `farm_images`
--
ALTER TABLE `farm_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;

--
-- AUTO_INCREMENT for table `vehicle_images`
--
ALTER TABLE `vehicle_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

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
