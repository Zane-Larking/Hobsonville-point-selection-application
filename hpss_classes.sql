-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2018 at 08:26 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

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
  `ID` int(11) NOT NULL,
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

INSERT INTO `classes` (`ID`, `CODE`, `NAME`, `QUAL`, `TYPE`, `SUBJECT1`, `SUBJECT2`, `TEACHER1`, `TEACHER2`, `DESCRIPTION`) VALUES
(1, 'CLIFI', 'Climate Fiction', 1, 'MODULE2', 'SCIENCE', 'ENGLISH', 'Ros', 'Cindy', 'Description of the class Climate Fiction.'),
(2, 'GAMES23', 'Games', 1, 'FLOORTIME2', 'MATH', 'MATH', 'Glen', '', ''),
(3, 'HIGHPOT', 'Highway potter', 1, 'MODULE1', 'SOCSCIENCE', 'SCIENCE', 'Aidan', 'Cairan', 'WHOOSH!!!\r\nImagine the prospect of commuting to and from work on a magical flying broomstick.'),
(4, 'OMG', 'OMG', 1, 'MODULE2', 'MATH', 'HPE', 'Zane', 'Jack', 'what is OMG'),
(5, 'WHEELIE', 'Spinning Wheels', 1, 'SPIN1', 'TECH', 'MATH', 'Tony', '', 'I just needed to test spins...'),
(6, 'METHLAB', 'Methematic', 1, 'MODULE1', 'MATH', 'SCIENCE', 'Jessica', 'Andrea', 'Ever wonder how much panadol it would take to overdose?'),
(7, '1234567', 'english', 1, 'SPIN2', 'ENGLISH', 'MATH', 'Ros', '', 'Your standard English class.');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(32) NOT NULL,
  `LAST_NAME` varchar(32) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `YEAR_LEVEL` tinyint(1) NOT NULL,
  `HPSS_NUM` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ID`, `FIRST_NAME`, `LAST_NAME`, `EMAIL`, `YEAR_LEVEL`, `HPSS_NUM`) VALUES
(1, 'Zane', 'Larking', 'zane.larking@hobsonvillepoint.school.nz', 12, '16015');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(32) NOT NULL,
  `LAST_NAME` varchar(32) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `TIMETABLING` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
