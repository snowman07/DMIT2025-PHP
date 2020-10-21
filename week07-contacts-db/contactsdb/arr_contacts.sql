-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 21, 2020 at 11:46 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adomingo4_dmit2025`
--

-- --------------------------------------------------------

--
-- Table structure for table `arr_contacts`
--

CREATE TABLE `arr_contacts` (
  `id` int(11) NOT NULL,
  `arr_bizname` varchar(255) NOT NULL,
  `arr_name` varchar(255) NOT NULL,
  `arr_email` varchar(255) NOT NULL,
  `arr_website` varchar(255) NOT NULL,
  `arr_phone` varchar(255) NOT NULL,
  `arr_address` varchar(255) NOT NULL,
  `arr_city` varchar(255) NOT NULL,
  `arr_prov` varchar(255) NOT NULL,
  `arr_desc` text NOT NULL,
  `arr_newsletter` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arr_contacts`
--

INSERT INTO `arr_contacts` (`id`, `arr_bizname`, `arr_name`, `arr_email`, `arr_website`, `arr_phone`, `arr_address`, `arr_city`, `arr_prov`, `arr_desc`, `arr_newsletter`) VALUES
(1, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', ''),
(2, 'arr group of company', 'arr', 'email add@ yahoo.com', 'wwwww', '44566', 'ellerslie', 'edomnton', 'alberta', 'This is a test', ''),
(3, 'business test', 'Arr Belrey Domingo', 'domingo.arrbelrey@gmail.com', 'https://github.com/', '4455566', '6104 10 Avenue SW', 'Edmonton', 'AB', '', ''),
(4, 'test 2', 'harry potter', 'domingo.arrbelrey@gmail.com', 'https://github.com/', '4545578', '6104 10 Avenue SW', 'Edmonton', 'AB', 'removed boolean nesletter bec there\'s an error', ''),
(27, 'business test', 'Arr Belrey Domingo', 'domingo.arrbelrey@gmail.com', 'https://github.com/', '7777777777777777777', '6104 10 Avenue SW', 'Edmonton', 'AB', '', '1'),
(28, 'business test', 'Arr Belrey Domingo', 'domingo.arrbelrey@gmail.com', 'https://github.com/', '3467', '6104 10 Avenue SW', 'Edmonton', 'AB', '', '1'),
(29, 'business test', 'Arr Belrey Domingo', 'domingo.arrbelrey@gmail.com', 'https://github.com/', '8888888888888', '6104 10 Avenue SW', 'Edmonton', 'AB', 'no newsletter', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arr_contacts`
--
ALTER TABLE `arr_contacts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arr_contacts`
--
ALTER TABLE `arr_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
