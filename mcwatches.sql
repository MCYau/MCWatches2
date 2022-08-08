-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2022 at 05:41 PM
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
(11, 'Annie', 'annie@gmail.com', 'May I know do you have any store in Singapore?'),
(12, 'Jessica', 'jessica90@hotmail.com', 'What is the delivery charges?'),
(13, 'Jamie', 'jamiejamie@hotmail.com', 'Any promotion for this months?'),
(16, 'ANDY', 'ANDY@HOTMAIL.COM', 'DO YOU HAVE CONTACT NUMBER?');

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
(83, 'user1', 'Casio G-Shock GM-110SN-2A', 3, 1107, 'image/GShockWatch.webp', '2022-08-08 00:24:17', '289 Jurong East St 30', 640289, 'In Delivery'),
(84, 'user1', 'Citizen HAKUTO-R', 1, 3500, 'image/CitizenWatch.jpg', '2022-08-08 00:24:17', '289 Jurong East St 30', 640289, 'In Delivery'),
(85, 'user1', 'Tissot PR 100 SPORT CHIC CHRONOGRAPH', 2, 1880, 'image/Tissot.jfif', '2022-08-08 00:24:17', '289 Jurong East St 30', 640289, 'Order Received'),
(86, 'user2', 'Tag Heuer Formula 1 X Red Bull Racing', 1, 2800, 'image/TagHeuerWatch.webp', '2022-08-08 00:27:17', '369 Paris Ris Dr 3', 510369, 'Order Delivered'),
(87, 'user2', 'Gucci YA141501 Diamantissima', 4, 5000, 'image/GucciWatch.jfif', '2022-08-08 00:27:17', '369 Paris Ris Dr 3', 510369, 'Order Received'),
(88, 'user3', 'Rolex GMT-MASTER II', 5, 575000, 'image/RolexWatch.png', '2022-08-08 00:28:57', '1 Serangoon Cres ', 550288, 'Order Received'),
(89, 'admin', 'Tommy Hilfiger Blue Men\'s Watch', 1, 400, 'image/TommyHilfigerWatch.webp', '2022-08-08 00:31:29', '50 One-north Cres', 637896, 'Order Received'),
(90, 'admin', 'Seiko SSB377P1 QUARTZ CHRONOGRAPH', 1, 900, 'image/Seiko.png', '2022-08-08 00:31:29', '50 One-north Cres', 637896, 'Order Delivered'),
(91, 'annie', 'Tommy Hilfiger Blue Men\'s Watch', 1, 400, 'image/TommyHilfigerWatch.webp', '2022-08-08 19:39:19', 'Blk 222 Ang Mo Kio Avenue 1', 560222, 'Order Received'),
(92, 'annie', 'Constellation Coaxial Master ', 1, 5000, 'image/OG001.png', '2022-08-08 19:39:19', 'Blk 222 Ang Mo Kio Avenue 1', 560222, 'Order Received'),
(93, 'annie', 'Citizen HAKUTO-R', 1, 3500, 'image/CitizenWatch.jpg', '2022-08-08 19:39:19', 'Blk 222 Ang Mo Kio Avenue 1', 560222, 'Order Received');

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
(1, 'Casio G-Shock GM-110SN-2A', 'Light up the dark with watches inspired by the neon glow of late-night skylines.\r\nEvoking midnight darkness, the matte black urethane band provides the perfect canvas for the multicolored ribbons of light that adorn the urban sky at night.', 'GSH001', 'image/GShockWatch.webp', 369.00),
(26, 'Tag Heuer Formula 1 X Red Bull Racing', 'Speed into victory with the TAG Heuer Formula 1 Red Bull Racing Special Edition. The sportive look and dynamic design of this unique collection makes for a bold, action-packed chronograph that sets the pace by celebrating two...', 'TAG123', 'image/TagHeuerWatch.webp', 2800.00),
(28, 'Tommy Hilfiger Blue Men\'s Watch', 'An elevated classic with a new twist. This automatic collection features a skeleton dial with an exposed sub eye. The 45 MM case is available in Stainless-Steel and Black IP, paired with H-Link bracelets, Italian Leather Strap, and Rubber straps. 5 ATM', 'TOM123', 'image/TommyHilfigerWatch.webp', 400.00),
(29, 'Citizen HAKUTO-R', 'Created as the second collaboration with the HAKUTO-R Japanese lunar exploration program and ispace, this limited-edition model depicts the unique lunar surface patterns with newly developed Recrystallized Titanium.', 'CIT001', 'image/CitizenWatch.jpg', 3500.00),
(30, 'Gucci YA141501 Diamantissima', 'Gucci Diamantissima stainless steel watch\r\nStyle number: YA141501\r\nDeployment clasp fastening\r\nRound face, quartz movement, diamante pattern dial with Gucci logo at 12 o’clock, patent leather strap\r\nDiameter: 27mm\r\nWater resistant up to 50m\r\nTwo-year warranty\r\nMade in Switzerland', 'GUC001', 'image/GucciWatch.jfif', 1250.00),
(31, 'Seiko SSB377P1 QUARTZ CHRONOGRAPH', 'Case Diameter: 41.5 mm\r\nCase Thickness: -\r\nCase Length: -\r\nGlass: Hardlex\r\nCase Material: Stainless steel\r\nBand Material: Stainless steel\r\nThree-Fold Clasp With Push-Button Release\r\nDate display\r\nSmall second hand\r\nWater Resistant: 10 BAR', 'SEI001', 'image/Seiko.png', 900.00),
(32, 'Tissot PR 100 SPORT CHIC CHRONOGRAPH', 'With different styles to choose from, every woman will find something to love in these Sport&Chic watches that are also practical, thanks to indexes and hands set with luminescent materials providing perfect visibility. ', 'TIS001', 'image/Tissot.jfif', 940.00),
(39, 'Rolex GMT-MASTER II', 'This model features a meteorite dial and a two-colour Cerachrom bezel insert in red and blue ceramic. Designed to show the time in two different time zones simultaneously during intercontinental flights, the GMT-Master II has come to be recognized for its robustness and versatile appearance.', 'ROL123', 'image/RolexWatch.png', 115000.00),
(47, 'Tonda Pf Micro-rotor Steel Platinum ', 'The Tonda PF is an entirely new collection of timepieces within the Tonda family, featuring Parmigiani Fleurier’s most distinctive complications from the outset. This includes the Tonda PF Micro-Rotor, a slim, pared-down, high-end two-hander with platinum micro-rotor. The Tonda PF Chronograph features an almost flush dial and an integrated high frequency chronograph movement.', 'TON001', 'image/TON001.png', 2000.00),
(49, 'Constellation Coaxial Master ', 'The dramatic and enduring design of the OMEGA Constellation is characterised by its famous half moons, as well as the claw on the side of the case. This 41 mm 18K yellow gold model features a polished black ceramic bezel with Roman numerals in Ceragold, a sun brushed black dial and a date window at the 6 o clock position. The hands, OMEGA logo, Constellation star and facetted indexes are all in 18K yellow gold.\r\n', 'OG001', 'image/OG001.png', 5000.00);

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
(29, 'user6', 'user6@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, '2022-07-28 20:55:55'),
(31, 'annie', 'annie@gmail.com', 'a21810a01d3fe0df4291d7d3e7abbd1c', 0, '2022-08-08 08:38:28'),
(32, 'andy', 'andy@hotmail.com', 'da41bceff97b1cf96078ffb249b3d66e', 0, '2022-08-08 19:07:13');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
