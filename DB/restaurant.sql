-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2023 at 11:28 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `username`, `password`) VALUES
(1, 'Ibrahem', 'Badawi', '321'),
(2, 'Khalil', 'Badawi', '147'),
(7, 'IbrahemJB', 'Badawi', 'IBJ');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Featured` varchar(30) NOT NULL,
  `Active` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `Image`, `Featured`, `Active`) VALUES
(5, 'momo', '../images/category/menu-momo.jpg', 'Yes', 'No'),
(8, 'Pizza', '../images/category/menu-pizza.jpg', 'Yes', 'Yes'),
(9, 'burger', '../images/category/menu-burger.jpg', 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `Price` double NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Featured` varchar(30) NOT NULL,
  `Active` varchar(20) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `title`, `Price`, `Image`, `Featured`, `Active`, `cat_id`, `Description`) VALUES
(12, 'pizza', 10, '../images/foods/food-pizza.jpg', 'Yes', 'No', 8, 'pizza food'),
(17, 'Huborger', 15, '../images/foods/burger.jpg', 'Yes', 'No', 9, 'Purger food'),
(21, 'momo', 5, '../images/foods/momo.jpg', 'Yes', 'Yes', 5, 'momo food'),
(23, 'momo', 7, '../images/category/menu-momo.jpg', 'Yes', 'Yes', 5, 'momo double');

-- --------------------------------------------------------

--
-- Table structure for table `order_food`
--

CREATE TABLE `order_food` (
  `id` int(11) NOT NULL,
  `Food` varchar(255) DEFAULT NULL,
  `Price` double DEFAULT NULL,
  `Qty` int(30) DEFAULT NULL,
  `Total` double DEFAULT NULL,
  `Order_date` datetime DEFAULT NULL,
  `Status_order` varchar(50) DEFAULT NULL,
  `Customer_name` varchar(50) DEFAULT NULL,
  `Contact` int(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_food`
--

INSERT INTO `order_food` (`id`, `Food`, `Price`, `Qty`, `Total`, `Order_date`, `Status_order`, `Customer_name`, `Contact`, `Email`, `Address`) VALUES
(2, 'piza', 10, 2, 20, '2023-06-14 17:59:54', 'Active', 'IBJ', 595918648, 'ibrahim918648@gmail.com', 'Gaza'),
(4, 'burger', 10, 2, 20, '2023-06-13 17:20:46', 'UnActive', 'Ibrahem Badawi', 595918648, 'ib.j.badawi@gmail.com', 'TAL ALHAWA- UCAS'),
(15, 'momo', 5, 2, 10, '2023-06-17 05:54:46', 'Avtive', 'Ibrahem Badawi', 561918648, 'ib.j.badawi@gmail.com', 'TAL ALHAWA- UCAS'),
(16, 'momo', 7, 4, 28, '2023-06-17 21:08:56', 'Active', 'Ibrahem Badawi', 66666, 'ibrahim918648@gmail.com', 'street 8'),
(17, 'pizza', 10, 2, 20, '2023-06-18 10:49:39', 'Active', 'Ibrahem Badawi', 99999, 'ibrahim918648@gmail.com', 'street 8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_food` (`cat_id`);

--
-- Indexes for table `order_food`
--
ALTER TABLE `order_food`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `order_food`
--
ALTER TABLE `order_food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `cat_food` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
