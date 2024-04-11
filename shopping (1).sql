-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2024 at 05:57 AM
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
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_sess` char(50) NOT NULL,
  `cart_itemcode` varchar(50) NOT NULL,
  `cart_quantity` smallint(6) NOT NULL,
  `cart_item_name` varchar(100) DEFAULT NULL,
  `cart_price` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `user_id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `complete_name` varchar(50) DEFAULT NULL,
  `address_line1` varchar(255) DEFAULT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `zipcode` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `cellphone_no` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`user_id`, `type`, `email_address`, `password`, `complete_name`, `address_line1`, `address_line2`, `city`, `state`, `zipcode`, `country`, `cellphone_no`) VALUES
(1, '', 'alice.liddell@gmail.com', '*C803B1C9A354848885C1FF2A593FB90507ACAE51', 'Alice Liddell', 'Wonderland, Alice Library', '', 'London', 'Westminster', 'SW1A0AA', 'England', '123456789'),
(2, 'seller', 'maya@mail.com', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 'Maya Beer', 'My address', '', 'South Jakarta', 'Jakarta', '12430', 'Indonesia', '085714437190');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_no` int(6) NOT NULL,
  `order_date` date DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `customer_name` varchar(50) DEFAULT NULL,
  `shipping_address_line1` varchar(255) DEFAULT NULL,
  `shipping_address_line2` varchar(255) DEFAULT NULL,
  `shipping_city` varchar(50) DEFAULT NULL,
  `shipping_state` varchar(50) DEFAULT NULL,
  `shipping_country` varchar(50) DEFAULT NULL,
  `shipping_zipcode` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE `orders_details` (
  `order_no` int(6) NOT NULL,
  `item_code` varchar(20) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `quantity` smallint(6) NOT NULL,
  `price` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `order_no` int(6) NOT NULL,
  `order_date` date DEFAULT NULL,
  `amount_paid` decimal(7,2) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `customer_name` varchar(50) DEFAULT NULL,
  `payment_type` varchar(20) DEFAULT NULL,
  `name_on_card` varchar(30) DEFAULT NULL,
  `card_number` varchar(20) DEFAULT NULL,
  `expiration_date` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productfeatures`
--

CREATE TABLE `productfeatures` (
  `item_code` varchar(20) NOT NULL,
  `feature1` varchar(255) DEFAULT NULL,
  `feature2` varchar(255) DEFAULT NULL,
  `feature3` varchar(255) DEFAULT NULL,
  `feature4` varchar(255) DEFAULT NULL,
  `feature5` varchar(255) DEFAULT NULL,
  `feature6` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productfeatures`
--

INSERT INTO `productfeatures` (`item_code`, `feature1`, `feature2`, `feature3`, `feature4`, `feature5`, `feature6`) VALUES
('LVB001', 'Author: H.P. Lovecraft', 'Genre: Horror', 'Language: English', 'Pages: 224', 'Publisher: Penguin Classics', 'Release Date: March 15, 2016'),
('LVB002', 'Author: H.P. Lovecraft', 'Genre: Horror', 'Language: English', 'Pages: 304', 'Publisher: Penguin Classics', 'Release Date: November 5, 2019'),
('LVB003', 'Author: H.P. Lovecraft', 'Genre: Horror', 'Language: English', 'Pages: 400', 'Publisher: Penguin Classics', 'Release Date: September 5, 2017');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `item_code` varchar(20) NOT NULL,
  `item_name` varchar(150) NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `model_number` varchar(30) NOT NULL,
  `weight` varchar(20) DEFAULT NULL,
  `dimension` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `quantity` smallint(6) NOT NULL,
  `price` decimal(7,2) DEFAULT NULL,
  `imagename` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`item_code`, `item_name`, `brand_name`, `model_number`, `weight`, `dimension`, `description`, `category`, `quantity`, `price`, `imagename`) VALUES
('LVB001', 'The Call of Cthulhu', 'H.P. Lovecraft', 'ISBN-9781981003130', '0.5 kg', '5 x 0.5 x 8 inches', 'The Call of Cthulhu is a short story by H. P. Lovecraft. Written in the summer of 1926, it was first published in the pulp magazine Weird Tales, in February 1928.', 'Books', 50, 10.99, 'cthulhu.jpg'),
('LVB002', 'At the Mountains of Madness', 'H.P. Lovecraft', 'ISBN-9780345329455', '0.6 kg', '5.2 x 0.6 x 8 inches', 'At the Mountains of Madness is a science fiction-horror novella by American author H. P. Lovecraft, written in February/March 1931 and rejected that year by Weird Tales editor Farnsworth Wright on the grounds of its length.', 'Books', 40, 12.99, 'azathoth.jpg'),
('LVB003', 'The Shadow over Innsmouth', 'H.P. Lovecraft', 'ISBN-9781981012231', '0.7 kg', '5.5 x 0.7 x 8 inches', 'The Shadow over Innsmouth is a horror novella by American author H. P. Lovecraft, written in November-December 1931. It forms part of the Cthulhu Mythos, using its motif of a malign undersea civilization.', 'Books', 35, 11.49, 'nyarlathotep.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`user_id`) USING BTREE;

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_no` int(6) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
