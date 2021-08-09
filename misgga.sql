-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2021 at 08:09 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `vehiclenumber` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consumers`
--

INSERT INTO `consumers` (`id`, `role`, `firstname`, `lastname`, `email`, `password`, `nic`, `Billing`, `Delivery`, `city`, `contact1`, `contact2`, `picture`, `date_updated`, `delete_status`, `address`, `area`, `license`, `vehicletype`, `modal`, `vehiclenumber`) VALUES
(1, 'Customer', 'ram', 'sdf', 'ramsam@gmail.com', '202cb962ac59075b964b07152d234b70', '123123123123', 'sdfsdf', 'sdfds', 'fdsfsdf', 1234567890, 1234567890, 'C:\\xampp\\htdocs\\krishandvila\\assets\\img\\Custom\\Customers\\ram_sdf', '2021-08-09 17:04:21', 0, '', '', '', '', '', ''),
(2, 'Customer', 'gna', 'sha', 'Gan@fma.com', '202cb962ac59075b964b07152d234b70', '90595564654', '646', '654645', '465', 1234567890, 1234567890, './assets/img/custom/customers/\\gna_sha', '2021-08-09 17:50:46', 0, '', '', '', '', '', '');

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consumers`
--
ALTER TABLE `consumers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consumers`
--
ALTER TABLE `consumers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
