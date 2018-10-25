-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2018 at 02:04 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hpss_classes`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `CODE` text NOT NULL,
  `NAME` text NOT NULL,
  `QUAL` int(11) NOT NULL,
  `TYPE` text NOT NULL,
  `SUBJECT1` text NOT NULL,
  `SUBJECT2` text,
  `TEACHER1` text NOT NULL,
  `TEACHER2` text,
  `DESCRIPTION` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`CODE`, `NAME`, `QUAL`, `TYPE`, `SUBJECT1`, `SUBJECT2`, `TEACHER1`, `TEACHER2`, `DESCRIPTION`) VALUES
('CLIFI', 'Climate Fiction', 1, 'MODULE2', 'SCIENCE', 'ENGLISH', 'Ros', 'Cindy', 'Description of the class Climate Fiction.'),
('GAMES23', 'Games', 1, 'FLOORTIME2', 'MATH', 'MATH', 'Glen', '', ''),
('HIGHPOT', 'Highway potter', 1, 'MODULE1', 'SOCSCIENCE', 'SCIENCE', 'Aidan', 'Cairan', 'WHOOSH!!!\r\nImagine the prospect of commuting to and from work on a magical flying broomstick.'),
('OMG', 'OMG', 1, 'MODULE2', 'MATH', 'HPE', 'Zane', 'Jack', 'what is OMG'),
('WHEELIE', 'Spinning Wheels', 1, 'SPIN1', 'TECH', 'MATH', 'Tony', '', 'I just needed to test spins...'),
('METHLAB', 'Methematic', 1, 'MODULE1', 'MATH', 'SCIENCE', 'Jessica', 'Andrea', 'Ever wonder how much panadol it would take to overdose?'),
('1234567', 'english', 1, 'SPIN2', 'ENGLISH', 'MATH', 'Ros', '', 'Your standard English class.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
