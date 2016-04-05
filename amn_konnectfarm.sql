-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 05, 2016 at 12:33 AM
-- Server version: 5.5.42-37.1
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `amn_konnectfarm`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `product_price` int(50) NOT NULL,
  `product_quantity` varchar(100) NOT NULL,
  `product_unit` text NOT NULL,
  `description` text NOT NULL,
  `current_location` text NOT NULL,
  `negotiable` text NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pic1` text NOT NULL,
  `pic2` text NOT NULL,
  `pic3` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `product_name`, `product_price`, `product_quantity`, `product_unit`, `description`, `current_location`, `negotiable`, `upload_date`, `pic1`, `pic2`, `pic3`) VALUES
(69, 78, 'Tea plantation', 25, '30', 'kgs', 'Fresh tea picked avery morning. Book and we deliver daily', 'Kericho', 'Negotiable', '2016-03-16 11:00:03', 'images/Products/16-03-16-1458126016pic1.jpg', '', ''),
(70, 78, 'Tomatoes', 900, '7', 'crates', 'Fresh from the farm', 'Embu', 'Negotiable', '2016-03-16 11:01:58', 'images/Products/16-03-16-1458126135pic1.jpg', '', ''),
(71, 78, 'capsicums(Pilipili hoho)', 700, '5', 'Bags', 'Still fresh from the farm', 'Kericho', 'Negotiable', '2016-03-16 11:05:09', 'images/Products/16-03-16-1458126324pic1.jpg', '', ''),
(72, 78, 'Bananas', 800, '5', 'Crates', 'Fresh and sweet', 'Kisii', 'Non-negotiable', '2016-03-16 11:06:06', 'images/Products/16-03-16-1458126373pic1.jpg', '', ''),
(73, 86, 'White Potatoes ', 3000, '3', 'Bags ', 'Well preserved and healthy ', 'Nairobi', 'Negotiable', '2016-04-05 05:16:50', 'images/Products/05-04-16-1459833491pic1.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` text NOT NULL,
  `p_no` int(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `county` text NOT NULL,
  `imagepath` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `p_no`, `password`, `county`, `imagepath`) VALUES
(78, 'Elvis', 'Kirui', 'elviskkirui@gmail.com', 705758788, '09a2e0d3d4d4f6f8dd520b098031accf', 'Kericho', 'images/ppics/16-03-16-1458125624.jpg'),
(79, 'aggrey', 'koros', 'aggreykoros04@gmail.com', 703656970, 'fd03ce64a0d58cf32367c579d6f10425', 'Kericho', ''),
(80, 'john', 'kimani', 'johnkimani@gmail.com', 706892347, '25d55ad283aa400af464c76d713c07ad', 'Kirinyaga', ''),
(81, 'TIMOO', 'KIPS', 'timothy.kirui@yahoo.com', 728533538, '7bff9515c59aa552e35b3c5dc994a760', 'Kericho', ''),
(82, 'aggreykoros@gmail.com', 'aggrey', 'aggreykoros@gmail.com', 0, '65d839dd9d5df8683b495322c44fc094', 'Kericho', ''),
(83, 'Dennis', 'Njunge', 'ngugidennis7@gmail.com', 2147483647, '5a55ed0aadd183bc2e12671a5569d368', 'Kiambu', 'images/ppics/17-03-16-1458223448.png'),
(84, 'Willie', 'Bett', 'kimutaibett30@gmail.com', 707420637, '20f4ef7ae41d9455fe00ba2aa1213812', 'Bomet', 'images/ppics/21-03-16-1458558677.jpg'),
(85, 'xstfdbmi', 'xstfdbmi', 'ttswqy@orxswd.com', 0, 'd41d8cd98f00b204e9800998ecf8427e', '', ''),
(86, 'Kevin', 'Barasa', 'bkevin001@yahoo.com', 724778017, '099a3367859895f36568f1cb8506767d', 'Nairobi', 'images/ppics/05-04-16-1459833292.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=87;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
