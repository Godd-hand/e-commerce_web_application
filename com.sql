-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2023 at 11:56 AM
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
-- Database: `com`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(4) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `date_of_birth` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `password` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `date_of_birth`, `email`, `user_name`, `password`) VALUES
(1, 'Edidiong', 'Effiong', '1998-10-21', 'edidiongeffiong6744@gmail.com', 'Eddybest674', 123456789),
(2, 'Edidiong', 'Effiong', '1998-10-21', 'edidiongeffiong056@gmail.com', 'Eddybest', 123456789),
(3, '', '', '', '', '', 0),
(4, 'George', 'Thomas', '30/12/1994', 'tgeorge6000gmail.com', 'george', 12345);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(150) NOT NULL,
  `heading` varchar(150) NOT NULL,
  `body` longtext NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `images` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(150) NOT NULL,
  `images` varchar(300) DEFAULT NULL,
  `title` varchar(30) NOT NULL,
  `description` longtext DEFAULT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `images`, `title`, `description`, `price`) VALUES
(33, 'WhatsApp Image 2023-04-04 at 12.33.12 PM.jpeg', 'Toner', 'very afforadble', '12.00'),
(34, 'WhatsApp Image 2023-04-04 at 12.33.11 PM.jpeg', 'Face washs', 'dbfbdjbvdbgvjbvbj', '10.00'),
(39, 'toner.jpeg', 'Face Scrub', 'gjvhtrtyhvjrdtghvcdrghvctrfghvgfgv', '14.00'),
(41, 'serum.jpeg', 'Face Scrub', 'kjfueb.dvuulsgvuigudgfudguvugduhdufhud', '3.00'),
(42, 'WhatsApp Image 2023-04-04 at 12.33.11 PM.jpeg', 'scrub', 'ghjkbdfghjkjghhjkh', '4.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `date_of_birth` int(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `date_of_birth`, `email`, `password`) VALUES
(6, 'Godwin', 'Alex', 1990, 'godwin23@gmail.com', 12),
(8, 'Daniel', 'James', 1999, 'dan@gmail.com', 12345),
(9, 'Angela', 'Nelson', 2001, 'angela@gmail.com', 12345),
(10, 'Moses', 'Simon', 1990, 'moses@gmail.com', 12345),
(11, 'George', 'Thomas', 1934, 'george@mail.com', 12345);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
