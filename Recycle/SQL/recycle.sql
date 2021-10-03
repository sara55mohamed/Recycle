-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2021 at 11:04 PM
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
  `id` int(11) NOT NULL,
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
(2, 'Alaa', 'mohamed', 'alaamohamed56784@gmail.com', 'Gdfghju5678', 'fghj6789', 'Cairo', 'Ain Shams', '0103456789', 'g5.jpg'),
(3, 'Ahmed', 'ali', 'ahmedalli456@gmail.com', '567sdfghjDFG', 'fghjrtyui678', 'Alexandria', 'Abees', '01245678789', 'author.png'),
(4, 'Reem', 'ahmed', 'reemahmed678@gmail.com', '56dfgDD', 'fghjerty5678', 'Giza', 'Al Wahat', '010345678', 'g6.jpg'),
(5, 'mohamed', 'remy', 'mohamedremy67890@gmail.com', 'fghjYUJIK678', 'fghj56789', 'Giza', '6th of October', '01256789', 'c1.png'),
(6, 'rania', 'ahmed', 'raniaahmed8768@gmail.com', '55Email', 'tyu67cvghj', 'Alexandria', 'Glem', '011345678', 'g2.jpg'),
(7, 'Ramy', 'mohamed', 'ramymohamed56789@gmail.com', 'dfghj5678SD', 'ghjk5678gh', 'Alexandria', 'Mandara', '012456789', 'c3.png'),
(8, 'Tarek', 'ahmed', 'tarekahmed4567@gmail.com', 'fghj56789SD', 'rtyui5678cvb', 'Cairo', 'Al Rehab', '0103456789', 'blog_3.png');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(200) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `outline` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `outline`) VALUES
(1, 'wood', '200 KG'),
(2, 'paper', '700 KG'),
(3, 'Metal', '600 KG'),
(5, 'Glass', '0 KG'),
(6, 'Plastic', '400 KG');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(200) NOT NULL,
  `matrial_type` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `date` date NOT NULL,
  `exchange_matrial` varchar(100) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `matrial_type`, `amount`, `date`, `exchange_matrial`, `customer_id`) VALUES
(18, 'metal', 30, '2021-04-08', 'Plactic', 2),
(22, 'glass', 60, '2021-04-15', 'None', 5),
(23, 'paper', 90, '2021-04-18', 'Metal', 4),
(24, 'plastic', 70, '2021-04-17', 'Metal', 7),
(25, 'glass', 50, '2021-04-17', 'Peper', 8),
(26, 'plastic', 78, '2021-04-09', 'None', 3),
(27, 'paper', 89, '2021-04-09', 'Metal', 6);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(200) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `role` varchar(20) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `salary` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `first_name`, `last_name`, `role`, `email`, `password`, `gender`, `position`, `salary`) VALUES
(1, 'Sara', 'Mohamed', 'admin', 'smohamedamer4@gmail.com', '55Email', 'femail', 'Full stack web developer', '5657$'),
(2, 'Ashton', 'Cox', 'worker', 'e.shtonl@gmail.com', '546ohgI46', 'male', 'Junior Technical Author', '350$'),
(3, 'Brenden', 'Wagner', 'worker', 'dengner@gmail.com', 'SoftwgI46546oh', 'female', 'Software Engineer', '47000$'),
(4, 'Charde', 'Marshall', 'worker', 'elhamai.core@gmail.com', 'Region6546oh', 'male', 'Regional Director', '47000$'),
(5, 'Colleen', 'Hurst', 'admin', 'en.olleemai@gmail.com', 'JarigI46546ohvasc', 'male', 'Javascript Developer', '2000$'),
(6, 'Fiona', 'Green', 'worker', 'aliona.F.Green@gmail.com', 'Ope6546oieh', 'female', 'Chief Operating Officer (COO)', '800$'),
(7, 'Finn', 'Camacho', 'admin', 'alnama.choem@gmail.com', 'SuporgI46ohp', 'female', 'Support Engineer', '8700$'),
(8, 'Gavin', 'Cortez', 'worker', 'ola.lnamhion@gmail.com', 'Teg46o', 'male', 'distributor', '23500$'),
(9, 'Herrod', 'Chandler', 'worker', 'Fireen.nam@gmail.com', 'S46546ohagI', 'male', 'Sales Assistant', '130$'),
(10, 'Hope', 'Fuentes', 'worker', 'HopeFuentes1@gmail.com', 'SegI4h6546o', 'male', 'Secretary', '13500$'),
(11, 'Heppa', 'Fuenteso', 'worker', 'Fire.hala1256@gmail.com', 'Segn6croh', 'female', 'Secretary', '13700$'),
(12, 'Houent', 'Fespe', 'worker', 'Firn.name@gmail.com', 'gI46ohry', 'male', 'Secretary', '13500$'),
(13, 'Hoen', 'Fu', 'worker', 'ireea.doof@gmail.com', 'gI546ohary46', 'female', 'Secretary', '137500$'),
(14, 'Ghade', 'Ahmed', 'worker', 'hsudhe86868@gmail.com', 'fgh567fghj', 'female', 'distributer', '173456$'),
(15, 'Jennifer', 'Loren', 'worker', 'Jenniferloren@gmail.com', 'buih78ghj89', 'female', 'Software Engineer', '64896$'),
(58, 'mena', 'mohamed', 'admin', 'sdfghj5678@gmail.com', '4567fgh', 'male', 'Backend developer', '5678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_foregin_key` (`customer_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `customer_foregin_key` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
