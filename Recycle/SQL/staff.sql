-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2021 at 12:36 PM
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
(1, 'Sara', 'Mohamed', 'admin', 'smohamedamer4@gmail.com', '55Email', 'female', 'Full stack web developer', '5678$'),
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
(15, 'Jennifer', 'Loren', 'worker', 'Jenniferloren@gmail.com', 'buih78ghj89', 'female', 'Software Engineer', '64896$');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
