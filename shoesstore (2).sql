-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2023 at 06:47 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoesstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `token` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `user`, `email`, `password`, `token`, `status`) VALUES
(19, 'satya', 'satyale39@gmail.com', '$2y$10$OUPkvTxmkHk8smD9v2GdYO5eNNFFpd/EttTOTsc7bgHhy6gVtDuSG', 'ad30c79fb4fd65fe5b51d017cec744', 'active'),
(20, 'satya', 'das@gmail.com', '$2y$10$F0e8E6KB8BIayvVqzGOQTO/JtlsWqsTq1crZH5SSNnDUopMUaXKDe', '1dbe12aa5c4492d724449a6e42b83b', 'inactive'),
(21, 'satya', 'webtechd7@gmail.com', '$2y$10$5Dd6Sbwcfv1iZE3KF7TZZeC84/Qg7bmMNHI.lJldDKI2wjpOl5gXq', '9e02ab105f820e26044dee463aab32', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `cookie` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `mobile`, `msg`) VALUES
(29, 'satya prasanna lenka', 'satyale39@gmail.com', '8280799142', 'hello i want to buy a new shoes ...');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `product_id` varchar(10) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pin` varchar(10) NOT NULL,
  `landmark` varchar(40) NOT NULL,
  `price` varchar(30) NOT NULL,
  `qty` varchar(20) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `product_id`, `user_id`, `state`, `city`, `pin`, `landmark`, `price`, `qty`, `time`) VALUES
(94, '34', '10', 'odisha', 'balasore', '757052', 'chandmari padia', '649', '1', '2022-10-15 01:25:59'),
(95, '41', '10', 'odisha', 'balasore', '757052', 'chandmari padia', '4735', '5', '2022-10-15 01:28:31'),
(96, '38', '10', 'odisha', 'balasore', '757052', 'chandmari padia', '4735', '2', '2022-10-15 01:28:31'),
(97, '35', '10', 'odisha', 'balasore', '757052', 'chandmari padia', '1486', '1', '2022-10-15 19:17:23'),
(98, '35', '10', 'odisha', 'balasore', '757052', 'chandmari padia', '1486', '1', '2022-10-15 19:20:49');

-- --------------------------------------------------------

--
-- Table structure for table `productdetails`
--

CREATE TABLE `productdetails` (
  `id` int(11) NOT NULL,
  `brandName` varchar(50) NOT NULL,
  `modelName` varchar(80) NOT NULL,
  `actualPrice` varchar(15) NOT NULL,
  `ourPrice` varchar(15) NOT NULL,
  `delivery` varchar(10) NOT NULL,
  `photo` mediumblob NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productdetails`
--

INSERT INTO `productdetails` (`id`, `brandName`, `modelName`, `actualPrice`, `ourPrice`, `delivery`, `photo`, `date`) VALUES
(34, 'CAMPUS ', 'HURRICANE Running Shoes For Men  (Blue)', '1299', '649', 'yes', 0x73686f65732d696d67312e706e67, '2022-10-07'),
(35, 'NIKE', 'DOWNSHIFTER 6 MSL Running Shoes For Men  (Blue)', '2995', '1486', 'no', 0x73686f65732d696d67322e706e67, '2022-10-07'),
(36, 'ADIDAS', 'StreetAhead M Running Shoes For Men  (White)', '2699', '1249', 'yes', 0x73686f65732d696d67342e706e67, '2022-10-07'),
(37, 'ADIDAS ', 'Pictoris M Running Shoes For Men  (Green)', '3799', '1799', 'yes', 0x73686f65732d696d67352e706e67, '2022-10-07'),
(38, 'PUMA ', 'Zod Runner V3 Running Shoes For Men  (Black)', '3999', '1399', 'yes', 0x73686f65732d696d67362e706e67, '2022-10-07'),
(39, 'FILA ', 'Training & Gym Shoes For Men  (Blue)', '2599', '799', 'no', 0x73686f65732d696d67372e706e67, '2022-10-07'),
(40, 'RED TAPE', 'Walking Shoes For Men  (White)', '6099', '1241', 'no', 0x73686f65732d696d67382e706e67, '2022-10-07'),
(41, 'REEBOK ', 'Stride Runner M Running Shoes For Men  (Black)', '2099', '947', 'yes', 0x73686f65732d696d67392e706e67, '2022-10-07'),
(42, 'PUMA ', 'x 1DER Marble Sneakers For Men  (Green)', '3999', '1419', 'no', 0x73686f65732d696d67342e706e67, '2022-10-07');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pin` varchar(10) NOT NULL,
  `landmark` varchar(40) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `usercookie` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `token` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `name`, `email`, `state`, `city`, `pin`, `landmark`, `mobile`, `usercookie`, `password`, `token`, `status`) VALUES
(1, 'sar', '@', 'od', 'bls', '7822', 'smaa', '8280', 'cookie', '', '', ''),
(2, 'Tanmay', 'tanmaylenka5@gmail.com', 'Odisha', 'Balasore', '757052', 'chadmari padia', '9938385315', '::1', '', '', ''),
(10, 'satya prasanna lenka', 'satyale39@gmail.com', 'odisha', 'balasore', '757052', 'chandmari padia', 'c12', '::1', '$2y$10$aoAbRDIs7cT30U1uNJsV2eLxq1d97Sls//6if0xbjGHQsZil8sJq.', '00da32d45d9c7b03b8b8ca4d543df8', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productdetails`
--
ALTER TABLE `productdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `productdetails`
--
ALTER TABLE `productdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
