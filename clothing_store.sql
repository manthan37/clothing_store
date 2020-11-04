-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 04, 2020 at 08:08 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clothing_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`username`, `password`) VALUES
('admin', 'admin'),
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_id` varchar(60) NOT NULL,
  `seller_name` varchar(60) NOT NULL,
  `customer_email` varchar(60) NOT NULL,
  `customer_name` varchar(60) NOT NULL,
  `total` float NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `seller_name`, `customer_email`, `customer_name`, `total`, `status`) VALUES
(11, '19', 'm2m', 'manthan', 'manthan kyada', 199, 'ordered'),
(12, '8', 'm2m', 'manthan', 'manthan kyada', 1699, 'ordered'),
(13, '7', 'm2m', 'manthan', 'manthan kyada', 199, 'ordered'),
(14, '6', 'Durga seller', 'manthan', 'manthan kyada', 799, 'ordered'),
(15, '8', 'm2m', 'manthan', 'manthan kyada', 1699, 'ordered');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `seller` varchar(60) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `category` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `is_available` varchar(10) NOT NULL,
  `product_review` float NOT NULL,
  `size` varchar(60) NOT NULL,
  `image` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `seller`, `gender`, `category`, `description`, `price`, `is_available`, `product_review`, `size`, `image`) VALUES
(4, 'jeans', 'Durga seller', 'male', 'bottom wear', 'nice fabric denim jeans', 599, 'yes', 4.9, '32, 34, 36', '1603498034jeans1.jpg'),
(6, 'crossfit watch', 'Durga seller', 'male', 'watches', 'Amazing watch', 799, 'yes', 4.8, 'all', '1603498254watch1.png'),
(7, 'Casual tshirt', 'm2m', 'male', 'top wear', 'Cotton fabric thisrt', 199, 'yes', 5, 'S, M, L, XL, XXL', '1603501079tshirt1.jpg'),
(8, 'nike shoes', 'm2m', 'female', 'sheos', 'Amazin fit for men and women ', 1699, 'yes', 5, '8, 9, 10, 11', '1603501845shoes2.jpg'),
(13, 'jeans', 'Durga seller', 'female', 'bottom wear', 'extremely stretchable material', 1299, 'yes', 4.3, '28, 30, 32, 34', '1603600813fjeans1.jpg'),
(14, 'perfume', 'Durga seller', 'male', 'perfumes', 'skinn long lasting perfume', 999, 'yes', 4.2, ' - ', '1603600906perfume1.jpg'),
(15, 'shoes', 'Durga seller', 'female', 'sheos', 'running shoes', 499, 'no', 3.2, '9, 10, 11', '1603601366shoes1.jpg'),
(17, 'jeans', 'm2m', 'female', 'bottom wear', 'skinny teared regular blue jenas', 1099, 'no', 4.9, '28, 30, 32, 34', '1603602042fjeans2.jpg'),
(18, 'perfume', 'm2m', 'male', 'perfumes', 'premium GUCCI perfume', 1699, 'no', 5, ' - ', '1603602143perfume2.jpg'),
(19, 'tshirt', 'm2m', 'male', 'top wear', 'round neck perfect fit tshirt', 199, 'yes', 4.3, 'S, M, L, XL, XXL', '1603602489tshirt2.jpg'),
(20, 'tshirt', 'm2m', 'female', 'top wear', 'white round neck tshirt', 199, 'yes', 3.4, 'M, L, XL', '1603602569tshirt4.jpg'),
(21, 'jeans', 'm2m', 'male', 'bottom wear', 'regular fit jeans', 599, 'no', 4.4, '32, 34, 36, 38', '1603602661jeans3.jpg'),
(23, 'jeans', 'Durga seller', 'female', 'bottom wear', 'perfect fit jeans', 599, 'no', 4.5, '28, 30, 32', '1603603786fjeans3.jpg'),
(24, 'perfume', 'Durga seller', 'male', 'perfumes', 'premium jaguar scent', 1599, 'yes', 5, ' - ', '1603603876perfume3.jpg'),
(25, 'shoes', 'Durga seller', 'male', 'sheos', 'nike running shoes', 1999, 'yes', 4.8, '8, 9, 10, 11', '1603603956shoes4.jpg'),
(26, 'female top', 'Durga seller', 'female', 'top wear', '100% cotton jeans top', 299, 'yes', 4.8, 'M, L, XL', '1603604246ftop1.jpg'),
(27, 'female top', 'Durga seller', 'female', 'top wear', 'stretchable top ', 199, 'no', 4.6, 'S, M, L, XL', '1603604338ftop2.jpg'),
(28, 'jeans', 'Durga seller', 'male', 'bottom wear', 'regular fit blue jeans', 599, 'no', 4.4, '30, 32, 34, 36', '1603604401jeans2.jpg'),
(29, 'shoes', 'm2m', 'male', 'sheos', 'casual cum party wear shoes', 1499, 'yes', 4.3, '9, 10, 11', '1603604771shoes3.jpg'),
(30, 'tshirt', 'm2m', 'male', 'top wear', 'Polo neck tshirt', 299, 'no', 4.5, 'S, M, L, XL', '1603604889tshirt3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` int(20) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `name`, `email`, `address`, `mobile`, `password`) VALUES
(2, 'Durga seller', 'durga@seller', '32,geajknr, 4njaiw', '9988776655', '123'),
(10, 'm2m', 'm2m@seller', '32,frbu', '9898989898', '123');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `profile_image` varchar(200) DEFAULT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `address`, `profile_image`, `password`) VALUES
(45, 'hivkh', 'ihkuhbk', '76976t', 'bkhj', '1603379035', '123'),
(47, 'final', 'fafbsv', '213141', 'vfsrv', '1603376800crop.jpg', '123'),
(48, 'manthan kyada', 'manthan', '9913742562', '37, deepmala', '1603678050crop.jpg', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
