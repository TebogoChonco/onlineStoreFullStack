-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Sep 29, 2023 at 10:40 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinestore1`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `ID` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL,
  `brandOrigin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`ID`, `brandName`, `brandOrigin`) VALUES
(1, 'New Brand', 'Oldest');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `colour` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `category`, `colour`) VALUES
(1, 'New', 'Black');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `orderNumber` varchar(250) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ID`, `userID`, `productID`, `orderNumber`, `address`) VALUES
(1, 1, 10, 'ORD-1139', 'sadfghfdsfg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productDescription` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `stockQuantity` decimal(8,0) NOT NULL,
  `categoryID` int(8) NOT NULL,
  `brandID` int(8) NOT NULL,
  `image` varchar(255) NOT NULL,
  `isFeatured` tinyint(1) NOT NULL,
  `isAvailable` tinyint(1) NOT NULL,
  `dateCreated` datetime NOT NULL,
  `dateUpdated` datetime NOT NULL,
  `pproductReviews` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productName`, `productDescription`, `price`, `stockQuantity`, `categoryID`, `brandID`, `image`, `isFeatured`, `isAvailable`, `dateCreated`, `dateUpdated`, `pproductReviews`) VALUES
(1, 'Candle 1', 'Price for 1 mid-sized pillar candle', 100, '15', 1, 1, 'C:/xampp/htdocs/eCommerceStore2/Images/candle1.jpg', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(2, 'Candle 2', 'Price for 1 large-sized pillar candle', 650, '50', 1, 1, 'C:/xampp/htdocs/eCommerceStore2/Images/candle2.jpg', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(3, 'Candle 3', 'Price for 1 dinner candle', 35, '10', 1, 1, 'C:/xampp/htdocs/eCommerceStore2/Images/candle3.jpg', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(4, 'Box', 'Milk carton party pack box', 45, '14', 1, 1, 'C:/xampp/htdocs/eCommerceStore2/Images/Box 1.jpg', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(5, 'Box 2', 'Rounded party pack box', 45, '6', 1, 1, 'C:/xampp/htdocs/eCommerceStore2/Images/Box 2.jpg', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(6, 'Box 3', 'Heart party pack box', 45, '18', 1, 1, 'C:/xampp/htdocs/eCommerceStore2/Images/Box 3.jpg', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(7, 'Pringles 1', 'boy-themed chip box', 50, '25', 1, 1, 'C:/xampp/htdocs/eCommerceStore2/Images/pringles1.jpg', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(8, 'Pringles 2', 'girl-themed chip box', 55, '21', 1, 1, 'C:/xampp/htdocs/eCommerceStore2/Images/Pringles 2.jpg', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(9, 'Pringles 3', 'gender neutral-themed chip box', 50, '14', 1, 1, 'C:/xampp/htdocs/eCommerceStore2/Images/Pringles 3.jpg', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(10, 'Tray 1', 'simple tray box box', 40, '16', 1, 1, 'C:/xampp/htdocs/eCommerceStore2/Images/Tray 1.jpg', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(11, 'Tray 2', '3D tray box box', 48, '16', 1, 1, 'C:/xampp/htdocs/eCommerceStore2/Images/Tray 2.jpg', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(12, 'Tray 3', 'printed 3D tray box box', 48, '41', 1, 1, 'C:/xampp/htdocs/eCommerceStore2/Images/Tray 3.jpg', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `password` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `fullname`, `email`, `phone`, `password`, `adress`) VALUES
(1, 'Tebogo', 'Tebogo T', 'tebogo@gmail.com', '0612457895', '$2y$10$7fYe9cX6eu2whz/jFGPUQe/5J73IlQh09IEDkbC2Uk.vXzeZ/K9ZS', ''),
(2, 'admin', 'admin', 'admin@gmail.com', '0645123254', '$2y$10$fY58VkZs8yVvuYu7uKU68eMfh6HREM2G0a5AeKUMt/lYtqFcmsjHi', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_userdID` (`userID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `FK_brandID` (`brandID`),
  ADD KEY `FK_categoryID` (`categoryID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_userdID` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_brandID` FOREIGN KEY (`brandID`) REFERENCES `brands` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_categoryID` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
