-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 25, 2020 at 08:11 PM
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
(37, 'Google', 'Lily Potter', 'info@google.com', 'https://www.google.com/', '3332221111', '', 'Calgary', 'AB', 'Google is a large search engine company', ''),
(38, 'Stackoverflow', 'Severus Snape', 'info@stackoverflow.com', 'https://stackoverflow.com/', '1234023011', '', '', 'SK', 'This is a forum site for software developers.', '1'),
(40, 'Netflix', 'Rubeus Hagrid', 'info@netflix.com', 'https://www.netflix.com/ca', '5488896320', '', '', 'NU', 'This is a movie website. Sign-up and you can choose a variety of movies.', ''),
(41, 'Facebook', 'Hermione Granger', 'info@facebook.com', 'https://www.facebook.com/', '5647892012', '', '', 'MB', 'Social media site. Someone can post pictures, videos, anything, name it.', '1'),
(42, 'Microsoft', 'Bill Gates', 'info@microsoft.com', 'https://www.microsoft.com/en-ca/', '8956300012', '', '', 'QC', 'Billion-dollar company.', ''),
(44, 'NAIT', 'Draco Malfoy', 'info@nait.ca', 'https://www.nait.ca/nait/home', '7803786130', '', '', 'AB', 'A leading polytechnic committed to your success.', '1'),
(45, 'Youtube', 'Harry Smith', 'info@youtube.com', 'https://www.youtube.com/', '5789602136', '', '', 'QC', 'Video sharing site.', '1'),
(46, 'Accenture', 'Ginevra Weasley', 'info@accenture.com', 'https://www.accenture.com/ca-en', '5698745650', '', '', 'NT', 'Accenture is an IT outsourcing company. It caters wide array of industry.', '1'),
(48, 'Linkedin', 'Daniel Ong', 'info@linkedin.com', 'https://www.linkedin.com/', '5566660020', '', '', 'SK', 'Linked is a site for professionals. One can look for a job here.', ''),
(53, 'Acer', 'Lebron James', 'info@acer.com', 'https://www.acer.com/ac/en/CA/content/home', '5462003125', '', '', 'NB', 'Acer is known for computers and laptops.', '1'),
(54, 'Github', 'Steph Curry', 'info@github.com', 'https://github.com/', '6200123047', '', '', 'ON', 'Github is a site where software developers store their codes.', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arr_contacts`
--
ALTER TABLE `arr_contacts`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `arr_contacts` ADD FULLTEXT KEY `arr_bizname` (`arr_bizname`,`arr_desc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arr_contacts`
--
ALTER TABLE `arr_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
