-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2019 at 01:00 AM
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
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `aid` int(11) NOT NULL,
  `uid` varchar(128) NOT NULL,
  `date` datetime NOT NULL,
  `application` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`aid`, `uid`, `date`, `application`) VALUES
(1, '14', '2019-03-17 22:37:31', 'I don&#039;t want to have any classes!'),
(8, '4', '2019-03-17 22:47:05', 'I chose 0 classes as I thought they were the ones that would benefit me in the future.');

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
  `HPSS_NUM` varchar(6) NOT NULL,
  `COACH` varchar(64) NOT NULL,
  `SELECTIONS_M&S` text,
  `SELECTIONS_F` text,
  `SELECTIONS_P` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ID`, `FIRST_NAME`, `LAST_NAME`, `EMAIL`, `YEAR_LEVEL`, `HPSS_NUM`, `COACH`, `SELECTIONS_M&S`, `SELECTIONS_F`, `SELECTIONS_P`) VALUES
(1, 'Zane', 'Larking', 'zane.larking@hobsonvillepoint.school.nz', 12, '16015', 'Marion Clark', NULL, NULL, NULL),
(2, 'Jack', 'Freeth', 'jack.freeth@hobsonvillepoint.school.nz', 12, '16069', 'Ghada George', NULL, NULL, NULL),
(3, 'Jack', 'Gjaltema', 'jack.gjaltema@hobsonvillepoint.school.nz', 12, '16096', 'Glenn Stewart', NULL, NULL, NULL),
(4, 'test', 'student_1', 'test.student_1@hobsonvillepoint.school.nz', 9, '19901', 'Zane Larking', '', NULL, NULL),
(5, 'test', 'student_2', 'test.student_2@hobsonvillepoint.school.nz', 10, '19902', 'Zane Larking', NULL, NULL, NULL),
(6, 'test', 'student_3', 'test.student_3@hobsonvillepoint.school.nz', 11, '19903', 'Zane Larking', NULL, NULL, NULL),
(7, 'test', 'student_4', 'test.student_4@hobsonvillepoint.school.nz', 12, '19904', 'Zane Larking', NULL, NULL, NULL),
(8, 'test', 'student_5', 'test.student_5@hobsonvillepoint.school.nz', 13, '19905', 'Zane Larking', NULL, NULL, NULL),
(9, 'test', 'student_6', 'test.student_6@hobsonvillepoint.school.nz', 11, '19906', 'Zane Larking', NULL, NULL, NULL),
(10, 'test', 'student_7', 'test.student_7@hobsonvillepoint.school.nz', 11, '19907', 'Zane Larking', NULL, NULL, NULL),
(11, 'test', 'student_8', 'test.student_8@hobsonvillepoint.school.nz', 12, '19908', 'Zane Larking', NULL, NULL, NULL),
(12, 'test', 'student_9', 'test.student_9@hobsonvillepoint.school.nz', 9, '19909', 'Zane Larking', NULL, NULL, NULL),
(13, 'test', 'student_10', 'test.student_10@hobsonvillepoint.school.nz', 10, '19910', 'Zane Larking', NULL, NULL, NULL),
(14, 'No', 'Internet', 'No.Internet@gmail.com', 11, '9999', 'Test Teacher', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(32) NOT NULL,
  `LAST_NAME` varchar(32) NOT NULL,
  `KAMAR_CODE` tinytext NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `HAS_HUB` tinyint(1) NOT NULL,
  `PRIVILEGES` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`ID`, `FIRST_NAME`, `LAST_NAME`, `KAMAR_CODE`, `EMAIL`, `HAS_HUB`, `PRIVILEGES`) VALUES
(81, 'Tracey', 'Abbott', 'ABBTR', 'tracey.abbott@hobsonvillepoint.school.nz', 1, 1),
(82, 'Josiah', 'Afu', 'AFUJO', 'josiah.afu@hobsonvillepoint.school.nz', 1, 1),
(83, 'Su Min', 'Ahn', 'AHNSU', 'sumin.ahn@hobsonvillepoint.school.nz', 1, 1),
(84, 'Celeste', 'Baker', 'BAKCE', 'celeste.baker@hobsonvillepoint.school.nz', 1, 1),
(85, 'Brendan', 'Bowie', 'BOWBR', 'brendan.bowie@hobsonvillepoint.school.nz', 1, 1),
(86, 'Rosamund', 'Britton', 'BRIRO', 'ros.britton@hobsonvillepoint.school.nz', 1, 1),
(87, 'Heidi', 'Burris', 'BURHE', 'heidi.burris@hobsonvillepoint.school.nz', 1, 1),
(88, 'Marion', 'Clark', 'CLAMA', 'marion.clark@hobsonvillepoint.school.nz', 1, 1),
(89, 'Toni', 'Cliffin', 'CLIFT', 'toni.cliffin@hobsonvillepoint.school.nz', 1, 1),
(90, 'Aidan', 'Daly', 'DALAI', 'aidan.daly@hobsonvillepoint.school.nz', 1, 1),
(91, 'Nikki', 'Dowling', 'DOWNI', 'nicola.dowling@hobsonvillepoint.school.nz', 1, 1),
(92, 'Cairan', 'Finnerty', 'FINCA', 'cairan.finnerty@hobsonvillepoint.school.nz', 1, 1),
(93, 'Ghada', 'George', 'GEOGH', 'ghada.george@hobsonvillepoint.school.nz', 1, 1),
(94, 'Kogi', 'Govender', 'GOVKO', 'kogi.govender@hobsonvillepoint.school.nz', 1, 1),
(95, 'Maryann', 'Green', 'GREMA', 'maryann.green@hobsonvillepoint.school.nz', 1, 1),
(96, 'Wallis', 'Grout-Brown', 'GROWA', 'wallis.grout-brown@hobsonvillepoint.school.nz', 1, 1),
(97, 'Tanya', 'Killip', 'KILTA', 'tanya.killip@hobsonvillepoint.school.nz', 1, 1),
(98, 'Beth', 'Knight', 'KNIBE', 'beth.knight@hobsonvillepoint.school.nz', 1, 1),
(99, 'Dhiren', 'Lal', 'LALDH', 'dhiren.lal@hobsonvillepoint.school.nz', 1, 2),
(100, 'Cath', 'Lewis', 'LEWCA', 'cath.lewis@hobsonvillepoint.school.nz', 1, 1),
(101, 'Jill', 'MacDonald', 'MACJI', 'jill.macdonald@hobsonvillepoint.school.nz', 1, 1),
(102, 'Sage', 'Magele', 'MAGSA', 'sage.magele@hobsonvillepoint.school.nz', 1, 1),
(103, 'Amelia', 'McGregor', 'MCGAM', 'amelia.mcgregor@hobsonvillepoint.school.nz', 1, 1),
(104, 'Liz', 'McHugh', 'MCHLI', 'elizabeth.mchugh@hobsonvillepoint.school.nz', 1, 1),
(105, 'Jan', 'Menzies', 'MENJA', 'janice.menzies@hobsonvillepoint.school.nz', 1, 1),
(106, 'Danielle', 'Myburgh', 'MYBDA', 'danielle.myburgh@hobsonvillepoint.school.nz', 1, 1),
(107, 'Kylee', 'Newbold', 'NEWKY', 'kylee.newbold@hobsonvillepoint.school.nz', 1, 1),
(108, 'Elizabeth', 'Samuel', 'SAMEL', 'elizabeth.samuel@hobsonvillepoint.school.nz', 1, 1),
(109, 'Jessica', 'Simons', 'SIMJE', 'jessica.simons@hobsonvillepoint.school.nz', 1, 1),
(110, 'Rebecca', 'Smye-Rumsby', 'SMYRE', 'rebecca.smye-rumsby@hobsonvillepoint.school.nz', 1, 1),
(111, 'Glenn', 'Stewart', 'STEGL', 'glenn.stewart@hobsonvillepoint.school.nz', 1, 1),
(112, 'Pauline', 'Toleafoa', 'TOLPA', 'pauline.toleafoa@hobsonvillepoint.school.nz', 1, 1),
(113, 'Andrea', 'Tritton', 'TRIAN', 'andrea.tritton@hobsonvillepoint.school.nz', 1, 2),
(114, 'Mic', 'Watts', 'WATMI', 'mic.watts@hobsonvillepoint.school.nz', 1, 1),
(115, 'Nick', 'Whiting', 'WHINI', 'nick.whiting@hobsonvillepoint.school.nz', 1, 1),
(116, 'Leoni', 'Williams', 'WILLE', 'leoni.williams@hobsonvillepoint.school.nz', 1, 1),
(117, 'Zane', 'Larking', 'LARZA', 'zane.larking@hobsonvillepoint.school.nz', 1, 3),
(118, 'Tracey', 'Abbott', 'ABBTR', 'tracey.abbott@hobsonvillepoint.school.nz', 1, 1),
(119, 'Josiah', 'Afu', 'AFUJO', 'josiah.afu@hobsonvillepoint.school.nz', 1, 1),
(120, 'Su Min', 'Ahn', 'AHNSU', 'sumin.ahn@hobsonvillepoint.school.nz', 1, 1),
(121, 'Celeste', 'Baker', 'BAKCE', 'celeste.baker@hobsonvillepoint.school.nz', 1, 1),
(122, 'Brendan', 'Bowie', 'BOWBR', 'brendan.bowie@hobsonvillepoint.school.nz', 1, 1),
(123, 'Rosamund', 'Britton', 'BRIRO', 'ros.britton@hobsonvillepoint.school.nz', 1, 1),
(124, 'Heidi', 'Burris', 'BURHE', 'heidi.burris@hobsonvillepoint.school.nz', 1, 1),
(125, 'Marion', 'Clark', 'CLAMA', 'marion.clark@hobsonvillepoint.school.nz', 1, 1),
(126, 'Toni', 'Cliffin', 'CLIFT', 'toni.cliffin@hobsonvillepoint.school.nz', 1, 1),
(127, 'Aidan', 'Daly', 'DALAI', 'aidan.daly@hobsonvillepoint.school.nz', 1, 1),
(128, 'Nikki', 'Dowling', 'DOWNI', 'nicola.dowling@hobsonvillepoint.school.nz', 1, 1),
(129, 'Cairan', 'Finnerty', 'FINCA', 'cairan.finnerty@hobsonvillepoint.school.nz', 1, 1),
(130, 'Ghada', 'George', 'GEOGH', 'ghada.george@hobsonvillepoint.school.nz', 1, 1),
(131, 'Kogi', 'Govender', 'GOVKO', 'kogi.govender@hobsonvillepoint.school.nz', 1, 1),
(132, 'Maryann', 'Green', 'GREMA', 'maryann.green@hobsonvillepoint.school.nz', 1, 1),
(133, 'Wallis', 'Grout-Brown', 'GROWA', 'wallis.grout-brown@hobsonvillepoint.school.nz', 1, 1),
(134, 'Tanya', 'Killip', 'KILTA', 'tanya.killip@hobsonvillepoint.school.nz', 1, 1),
(135, 'Beth', 'Knight', 'KNIBE', 'beth.knight@hobsonvillepoint.school.nz', 1, 1),
(136, 'Dhiren', 'Lal', 'LALDH', 'dhiren.lal@hobsonvillepoint.school.nz', 1, 2),
(137, 'Cath', 'Lewis', 'LEWCA', 'cath.lewis@hobsonvillepoint.school.nz', 1, 1),
(138, 'Jill', 'MacDonald', 'MACJI', 'jill.macdonald@hobsonvillepoint.school.nz', 1, 1),
(139, 'Sage', 'Magele', 'MAGSA', 'sage.magele@hobsonvillepoint.school.nz', 1, 1),
(140, 'Amelia', 'McGregor', 'MCGAM', 'amelia.mcgregor@hobsonvillepoint.school.nz', 1, 1),
(141, 'Liz', 'McHugh', 'MCHLI', 'elizabeth.mchugh@hobsonvillepoint.school.nz', 1, 1),
(142, 'Jan', 'Menzies', 'MENJA', 'janice.menzies@hobsonvillepoint.school.nz', 1, 1),
(143, 'Danielle', 'Myburgh', 'MYBDA', 'danielle.myburgh@hobsonvillepoint.school.nz', 1, 1),
(144, 'Kylee', 'Newbold', 'NEWKY', 'kylee.newbold@hobsonvillepoint.school.nz', 1, 1),
(145, 'Elizabeth', 'Samuel', 'SAMEL', 'elizabeth.samuel@hobsonvillepoint.school.nz', 1, 1),
(146, 'Jessica', 'Simons', 'SIMJE', 'jessica.simons@hobsonvillepoint.school.nz', 1, 1),
(147, 'Rebecca', 'Smye-Rumsby', 'SMYRE', 'rebecca.smye-rumsby@hobsonvillepoint.school.nz', 1, 1),
(148, 'Glenn', 'Stewart', 'STEGL', 'glenn.stewart@hobsonvillepoint.school.nz', 1, 1),
(149, 'Pauline', 'Toleafoa', 'TOLPA', 'pauline.toleafoa@hobsonvillepoint.school.nz', 1, 1),
(150, 'Andrea', 'Tritton', 'TRIAN', 'andrea.tritton@hobsonvillepoint.school.nz', 1, 2),
(151, 'Mic', 'Watts', 'WATMI', 'mic.watts@hobsonvillepoint.school.nz', 1, 1),
(152, 'Nick', 'Whiting', 'WHINI', 'nick.whiting@hobsonvillepoint.school.nz', 1, 1),
(153, 'Leoni', 'Williams', 'WILLE', 'leoni.williams@hobsonvillepoint.school.nz', 1, 1),
(154, 'Zane', 'Larking', 'LARZA', 'zane.larking@hobsonvillepoint.school.nz', 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`aid`);

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
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
