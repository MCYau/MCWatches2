-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2022 at 03:22 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcwatches`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `msg`) VALUES
(4, 'test1234', 'testemail', 'I was dealing with the same issue and could not figure it out. When I tried to link the foreign keys to my join table, the query would fail with that same 1050 error message and it would only keep the first relationship I had created.\r\n\r\nI noticed that phpmyadmin automatically gave the constraint it kept a name, I simply copied that name (under \"Constrain name\") and replaced the \"1\" with a \"2\" and ran the query again, no problem. Both relationships were saved.'),
(5, 'name1', 'test', 'hellow world 2'),
(6, 'test', 'testemail', '123231');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `orderedItem` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `totalPrice` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `orderDate` datetime NOT NULL,
  `address` varchar(255) NOT NULL,
  `zip` int(6) NOT NULL,
  `orderStatus` varchar(255) DEFAULT 'Order Received'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userName`, `orderedItem`, `quantity`, `totalPrice`, `image`, `orderDate`, `address`, `zip`, `orderStatus`) VALUES
(60, 'user1', 'Casio', 1, 600, 'image/orientstar.jpeg', '2022-07-23 15:42:28', '', 0, 'Order Received'),
(61, 'user1', 'FinePix Pro2 3D Camera', 1, 1500, 'image/facebook.png', '2022-07-23 15:47:19', '', 0, 'Order Received'),
(62, 'user1', 'Casio', 1, 600, 'image/orientstar.jpeg', '2022-07-23 15:47:19', '', 0, 'Order Received'),
(63, 'user1', 'Casio', 1, 600, 'image/orientstar.jpeg', '2022-07-23 15:50:39', '', 0, 'Order Received'),
(64, 'user1', 'Casio', 1, 600, 'image/orientstar.jpeg', '2022-07-23 15:59:35', '', 0, 'Order Received'),
(65, 'user3', 'FinePix Pro2 3D Camera', 1, 1500, 'image/facebook.png', '2022-07-23 16:15:07', '', 0, 'Order Received'),
(66, 'user3', 'Casio', 1, 600, 'image/orientstar.jpeg', '2022-07-23 16:15:07', '', 0, 'Order Received'),
(67, 'user3', 'Casio', 1, 600, 'image/orientstar.jpeg', '2022-07-23 22:15:42', '', 0, 'Order Received'),
(72, 'user1', 'test4156', 8, 8, 'image/MCwatchlogo.PNG', '2022-07-24 18:38:58', 'test address', 0, 'Order Received'),
(73, 'user1', 'test4156', 1, 1, 'image/MCwatchlogo.PNG', '2022-07-24 19:31:17', 'hello world', 0, 'Order Received'),
(74, 'user1', 'test4156', 1, 1, 'image/MCwatchlogo.PNG', '2022-07-24 19:34:12', 'you are very handsome', 999999, 'Order Received'),
(75, 'user1', 'Rolex', 1, 1500, 'image/RolexWatch.jpg', '2022-07-26 20:48:10', 'test', 12345, 'Order Received'),
(76, 'admin', 'Tag Heuer Watch', 1, 500, 'image/TagHeuerWatch.png', '2022-07-28 00:55:21', 'test', 123, 'Order Delivered'),
(77, 'admin', 'Casio G Shock Watch', 1, 200, 'image/CasioGShock.jpg', '2022-07-28 00:56:48', 'test', 123, ''),
(78, 'admin', 'Rolex', 1, 2000, 'image/RolexWatch.jpg', '2022-07-28 00:59:33', 'test', 123, 'Order Received'),
(79, 'admin', 'Tissot Watch', 1, 900, 'image/Tissot.jfif', '2022-07-28 01:00:10', 'test', 123, 'Order Received'),
(80, 'admin', 'Citizen Watch', 1, 300, 'image/Citizen.jfif', '2022-07-28 20:58:47', 'test', 123, 'In Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `descp` varchar(500) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `descp`, `code`, `image`, `price`) VALUES
(1, 'Casio G Shock Watch', 'This is a Casio G Shock Watch', 'GSH001', 'image/CasioGShock.jpg', 200.00),
(26, 'Tag Heuer Watch', 'this is a Tag Heuer watch', 'TAG123', 'image/TagHeuerWatch.png', 500.00),
(27, 'Rolex', 'This is a Rolex Watch', 'ROL1234', 'image/RolexWatch.jpg', 2000.00),
(28, 'Tommy Hilfiger Watch', 'This is a Tommy Hilfiger Watch', 'TOM123', 'image/TommyHilfiger.jpg', 600.00),
(29, 'Citizen Watch', 'This is a Citizen Watch', 'CIT001', 'image/Citizen.jfif', 300.00),
(30, 'Gucci Watch', 'This is a Gucci Watch', 'GUC001', 'image/Guuci.jfif', 800.00),
(31, 'Seiko Watch', 'Case Material: Stainless steel Dial: blue Dimensions: 42.5mm Crystal: Hardlex Water Resistance: 10 bar Crown: Push/pull Movement: 4R36 Strap/bracelet: stainless steel.', 'SEI001', 'image/Seiko.png', 900.00),
(32, 'Tissot Watch', 'This is a Tissot Watch', 'TIS001', 'image/Tissot.jfif', 900.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `isAdmin` int(11) NOT NULL DEFAULT 0,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `isAdmin`, `create_datetime`) VALUES
(1, 'admin', 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, '2022-07-21 15:18:39'),
(2, 'user1', 'user1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, '2022-07-22 15:47:45'),
(3, 'user2', 'user2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, '2022-07-23 15:48:33'),
(4, 'user3', 'user3@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, '2022-07-23 22:14:36'),
(5, 'user4', 'user4@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, '2022-07-25 01:01:40'),
(6, 'user5', 'user5@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, '2022-07-26 20:43:53'),
(29, 'user6', 'user6@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, '2022-07-28 20:55:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
