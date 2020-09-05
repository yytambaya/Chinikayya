-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2020 at 07:40 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chinikayya`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `F_NAME` varchar(40) NOT NULL,
  `L_NAME` varchar(40) NOT NULL,
  `E_ADDRESS` varchar(60) NOT NULL,
  `Passcode` varchar(40) NOT NULL,
  `Phone_no` varchar(14) NOT NULL,
  `Country` varchar(40) NOT NULL,
  `State` varchar(40) NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL,
  `DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`F_NAME`, `L_NAME`, `E_ADDRESS`, `Passcode`, `Phone_no`, `Country`, `State`, `ID`, `DATE`) VALUES
('Yakubu', 'Yusuf', 'yytyakubu@gmail.com', 'tam123', '08035444243', 'Nigeria', '0', 1, '2020-08-09 18:44:08'),
('Abba', 'Abba', 'abba@gmail.com', 'abba123', '07054321617', 'Nigeria', 'Lagos', 2, '2020-08-22 09:27:38');

-- --------------------------------------------------------

--
-- Table structure for table `customers_transaction`
--

CREATE TABLE `customers_transaction` (
  `Product_Id` int(10) UNSIGNED NOT NULL,
  `Product_Status` enum('1','0') NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Customer_Id` int(10) UNSIGNED NOT NULL,
  `Invoice_ID` varchar(100) NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers_transaction`
--

INSERT INTO `customers_transaction` (`Product_Id`, `Product_Status`, `Quantity`, `Customer_Id`, `Invoice_ID`, `ID`, `Date`) VALUES
(50, '1', 1, 2, '2114', 1, '2020-08-22 10:19:33'),
(50, '', 1, 2, '25017', 12, '2020-08-23 12:28:41'),
(50, '', 1, 2, '25019', 13, '2020-08-23 12:29:31'),
(50, '0', 1, 2, '25015', 14, '2020-08-23 12:35:52'),
(50, '0', 1, 2, '25024', 15, '2020-08-23 12:37:39');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Name` varchar(40) NOT NULL,
  `Price` double NOT NULL,
  `Image` int(10) UNSIGNED NOT NULL,
  `Category` varchar(40) NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL,
  `DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Name`, `Price`, `Image`, `Category`, `ID`, `DATE`) VALUES
('My first Book', 100, 1, 'Books', 50, '2020-08-22 19:33:14');

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

CREATE TABLE `product_info` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Product_Id` int(10) UNSIGNED NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Status` enum('0','1') NOT NULL,
  `Addition` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`ID`, `Product_Id`, `Description`, `Status`, `Addition`) VALUES
(35, 50, 'This is my first book', '1', 'But it now');

-- --------------------------------------------------------

--
-- Table structure for table `supply`
--

CREATE TABLE `supply` (
  `ProductName` varchar(40) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Customer_ID` int(10) UNSIGNED NOT NULL,
  `Status` enum('0','1') NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL,
  `DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supply`
--

INSERT INTO `supply` (`ProductName`, `Description`, `Customer_ID`, `Status`, `ID`, `DATE`) VALUES
('MyBook', 'The book', 2, '0', 1, '2020-08-10 16:50:23'),
('Land ', 'A land in ireland, Lagos', 1, '1', 2, '2020-08-22 09:29:14'),
('Speaker', 'A home speaker for listening to music', 2, '0', 3, '2020-08-22 12:05:36'),
('Mouse', 'An unused mouse from my computer set', 2, '0', 5, '2020-08-22 12:13:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `customers_transaction`
--
ALTER TABLE `customers_transaction`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Image` (`Image`);

--
-- Indexes for table `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Product_Id` (`Product_Id`);

--
-- Indexes for table `supply`
--
ALTER TABLE `supply`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers_transaction`
--
ALTER TABLE `customers_transaction`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `product_info`
--
ALTER TABLE `product_info`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `supply`
--
ALTER TABLE `supply`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
