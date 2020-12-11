-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2020 at 08:28 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elections`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes_tbl`
--

CREATE TABLE `classes_tbl` (
  `class_id` int(11) NOT NULL,
  `form_number` int(2) NOT NULL,
  `stream_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes_tbl`
--

INSERT INTO `classes_tbl` (`class_id`, `form_number`, `stream_name`) VALUES
(0, 0, 'Admin'),
(2, 1, 'EARTH'),
(3, 1, 'VENUS'),
(4, 1, 'MARS'),
(5, 1, 'NEPTUNE'),
(7, 2, 'MARS'),
(8, 2, 'NEPTUNE'),
(9, 2, 'JUPITER'),
(10, 2, 'VENUS'),
(11, 2, 'EARTH'),
(12, 1, 'JUPITER'),
(13, 3, 'JUPITER'),
(14, 3, 'VENUS'),
(15, 3, 'MARS'),
(16, 3, 'NEPTUNE'),
(17, 3, 'EARTH'),
(18, 4, 'JUPITER'),
(19, 4, 'VENUS'),
(20, 4, 'MARS'),
(21, 4, 'NEPTUNE'),
(22, 4, 'EARTH');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes_tbl`
--
ALTER TABLE `classes_tbl`
  ADD PRIMARY KEY (`class_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes_tbl`
--
ALTER TABLE `classes_tbl`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
