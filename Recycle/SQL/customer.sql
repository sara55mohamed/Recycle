-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2021 at 10:25 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recycle`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(200) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL UNIQUE,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `first_name`, `last_name`, `email`, `password`, `address`, `city`, `area`, `phone`, `image`) VALUES
(1, 'Hany', 'ahmed', 'hanyahmed345678@gmail.com', 'dfghj5678fghjF', 'dfgh567cvb', 'Cairo', 'Ain Shams', '01134578990', 'c2.png'),
(2, 'Alaa', 'mohamed', 'alaamohamed56784@gmail.com', 'Gdfghju5678', 'fghj6789', 'Cairo', 'Ain Shams', '0103456789', 'g5.jpg'),
(3, 'Ahmed', 'ali', 'ahmedalli456@gmail.com', '567sdfghjDFG', 'fghjrtyui678', 'Alexandria', 'Abees', '01245678789', 'author.png'),
(4, 'Reem', 'ahmed', 'reemahmed678@gmail.com', '56dfgDD', 'fghjerty5678', 'Giza', 'Al Wahat', '010345678', 'g6.jpg'),
(5, 'mohamed', 'remy', 'mohamedremy67890@gmail.com', 'fghjYUJIK678', 'fghj56789', 'Giza', '6th of October', '01256789', 'c1.png'),
(6, 'rania', 'ahmed', 'raniaahmed8768@gmail.com', '55Email', 'tyu67cvghj', 'Alexandria', 'Glem', '011345678', 'g2.jpg'),
(7, 'Ramy', 'mohamed', 'ramymohamed56789@gmail.com', 'dfghj5678SD', 'ghjk5678gh', 'Alexandria', 'Mandara', '012456789', 'c3.png'),
(8, 'Tarek', 'ahmed', 'tarekahmed4567@gmail.com', 'fghj56789SD', 'rtyui5678cvb', 'Cairo', 'Al Rehab', '0103456789', 'blog_3.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
