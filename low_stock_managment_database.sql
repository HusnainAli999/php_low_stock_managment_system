-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2023 at 01:39 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `low_stock_managment_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `low_stock_products`
--

CREATE TABLE `low_stock_products` (
  `id` int(11) NOT NULL,
  `brand` text NOT NULL,
  `type` text NOT NULL,
  `stock_limit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `low_stock_products`
--

INSERT INTO `low_stock_products` (`id`, `brand`, `type`, `stock_limit`) VALUES
(13, 'Addidas', 'Sneakers', 110);

-- --------------------------------------------------------

--
-- Table structure for table `products_table`
--

CREATE TABLE `products_table` (
  `product_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `brand` text NOT NULL,
  `type` text NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `add_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_table`
--

INSERT INTO `products_table` (`product_id`, `title`, `brand`, `type`, `price`, `quantity`, `add_at`) VALUES
(1, 'Shoes with red color with soft layer', 'Nike', 'Sneakers', 1500, 49, '2023-12-24 07:50:06'),
(2, 'Shoes with black upper layer', 'Addidas', 'Sneakers', 2000, 28, '2023-12-24 07:50:06'),
(3, 'metro shoes available', 'Metro', 'Boots', 5600, 69, '2023-12-24 07:50:09'),
(4, 'Green and whjte shoes of addidas new addition', 'Addidas', 'Loafers', 6500, 100, '2023-12-24 07:50:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `low_stock_products`
--
ALTER TABLE `low_stock_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_table`
--
ALTER TABLE `products_table`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `low_stock_products`
--
ALTER TABLE `low_stock_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products_table`
--
ALTER TABLE `products_table`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
