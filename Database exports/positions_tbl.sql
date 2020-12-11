-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2020 at 08:29 PM
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
-- Table structure for table `positions_tbl`
--

CREATE TABLE `positions_tbl` (
  `position_id` int(11) NOT NULL,
  `position_name` varchar(128) NOT NULL,
  `position_level` varchar(128) NOT NULL,
  `position_eligibility` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions_tbl`
--

INSERT INTO `positions_tbl` (`position_id`, `position_name`, `position_level`, `position_eligibility`) VALUES
(2, 'HEAD BOY', 'School Level', 3),
(3, 'HEAD GIRL', 'School Level', 3),
(4, 'GAMES CAPTAIN', 'School Level', 3),
(5, 'DINING HALL CAPTAIN', 'School Level', 3),
(6, 'LIBRARY CAPTAIN', 'School Level', 3),
(7, 'FORM CAPTAIN', 'Form Level', 1234),
(8, 'CLASS PREFECT', 'Class Level', 1234);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `positions_tbl`
--
ALTER TABLE `positions_tbl`
  ADD PRIMARY KEY (`position_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `positions_tbl`
--
ALTER TABLE `positions_tbl`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
