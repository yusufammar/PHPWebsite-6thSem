-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 01, 2021 at 08:38 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo2`
--

-- --------------------------------------------------------

--
-- Table structure for table `authorfiles`
--

DROP TABLE IF EXISTS `authorfiles`;
CREATE TABLE IF NOT EXISTS `authorfiles` (
  `email` varchar(30) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `published` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `papersreviewers`
--

DROP TABLE IF EXISTS `papersreviewers`;
CREATE TABLE IF NOT EXISTS `papersreviewers` (
  `paper` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `reviewer` varchar(255) NOT NULL,
  `grade` int(5) DEFAULT NULL,
  `comments` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `system1`
--

DROP TABLE IF EXISTS `system1`;
CREATE TABLE IF NOT EXISTS `system1` (
  `email` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `typ` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system1`
--

INSERT INTO `system1` (`email`, `pass`, `typ`) VALUES
('admin', 'pass', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
