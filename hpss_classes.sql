-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2018 at 04:20 AM
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
(8, 'SCAMANDR', 'Fantastic Beasts and Where to Find Them', 1, 'MODULE1', 'SCIENCE', 'MATH', 'Jess', 'Danielle', 'Following the declassification of certain secret documents kept at the Ministry of Magic, the wizarding world recently released the book, Fantastic\r\nBeasts and Where to Find them to Muggle audiences. A disclaimer was included that was intended to assure Muggle readers that the book was a\r\nwork of fiction. Join us in this module to explore the facts and fiction of magical creatures in Hobsonville Point and New Zealand. All students will\r\nbe required to design experiments, collect and analyse data, and produce reports to draw conclusions. Students will be expected to bring their\r\nwands and one pair of protective dragon hide gloves.'),
(9, 'MONOPOLY', 'Monopoly', 1, 'MODULE1', 'SOCSCIENCE', 'MATH', 'Ngahuia', 'Su Min', 'This module will explore problem-solving, decision-making, business plan development, product design, production and marketing strategies. We\r\nwill also be applying mathematical skills involving numbers, linear algebra and possibly elements of chance/ probability.'),
(10, 'SURVIVE', 'Survivor on Point', 1, 'MODULE1', 'MATH', 'HPE', 'Sage', 'Tanya', 'Do you have what it takes to survive? In this module you will explore outdoor pursuits, for example, orienteering, tramping, adventure racing, high\r\nropes. You will learn about safety in the outdoors, risk management, interpersonal skills and leadership, search and rescue and you may be\r\ninvolved in organising an adventure race type activity for a group of students from across the school to compete in. To assist you with planning\r\nand taking part in these activities you will use your number knowledge to plan a trip and you will learn about grid references, bearings, loci and\r\nconstructions.'),
(11, 'QSPA1112', 'Letâ€™s Plan for South America', 1, 'SPIN1', 'MATH', '', 'Andrea Hazeldine', '', 'In this course you will build on your existing language and cultural knowledge, relating to preparation for a short-term exchange to South America.\r\nWe will learn through the topics of My World, Leisure Activities and Letâ€™s go to South America. For Level 2, you will continue to develop your\r\nunderstanding of life in Latin America through the topics of food, youth culture, leisure and indigenous identity. You will work towards being able to\r\nexpress and justify your ideas in more complex Spanish, both orally and in writing. Headphones are required for this spin. A small notebook for\r\nvocabulary is highly recommended. This is a Full Year course.'),
(12, 'ELLELEM', 'Esol Elemtary', 1, 'MODULE1', 'LANGUAGE', 'ENGLISH', 'Beth', '', 'Students have been allocated to ESOL classes. Please see Heidi before selecting your subjects to find out which ESOL class(es) you are in.\r\nThis is an elementary ESOL class is or students who have limited English. You will develop your skills in reading. writing, listening and speaking\r\nEnglish. A practical, competency-based approach will help learners in their development of grammar, vocabulary, functions, pronunciation and\r\nskills through appropriate communicative tasks. This is a Full Year course.'),
(13, 'MUD', 'Stuck in the Middle', 1, 'SPIN1', 'HPE', '', 'Elizabeth', '', 'Term one will consist of a mixture of Health and PE. We will look at the wellbeing of yourself and others. You will also make sense of how you can\r\nsupport this beyond physical fitness. There will be a component of fitness training as you will be participating in the annual Tough Guy Tough Girl\r\nMud Run. In Term Two we will look at how physical activity impacts young people. There will be a charge for entering the Tough Guy Tough Girl\r\nChallenge. There may also be additional trips.'),
(14, 'STAYWARM', 'Home insulation and carbon emission', 1, 'SPIN1', 'SCIENCE', '', 'Ghada', '', 'This spin requires you to show awareness of an aspect of heat that has an impact on everyday life. The context for this assessment task is an\r\ninvestigation comparing the effectiveness of two methods of insulating houses. You will also learn how Carbon atoms cycle through all parts of the\r\nEarth. Carbon is constantly entering the atmosphere, mainly in the form of carbon dioxide and methane. At the same time, green plants, the\r\noceans, and even rocks, are removing it. You will perform a practical experiment in groups. You will independently research the insulating effects\r\nof materials, process this information, form a conclusion, and present a report.\r\nThere will be workbook fees associated.'),
(15, 'FILMIT', 'Learn It, Write It, Film It', 1, 'MODULE2', 'ART', 'ENGLISH', 'Glenn', 'Amelia', 'In this module, students will explore and make sense of a range of dramatic and film techniques through deconstruction and analysis. We will\r\napply our understandings of these techniques in generating our own dramatic text. This course contains a performance component; the NCEA\r\nachievement standards for drama require each student to speak and perform before others. You must also be prepared to work together with\r\nothers, improvise, and get out of your comfort zone!'),
(16, 'QUIKSTEP', 'Quickstep', 1, 'SPIN1', 'ART', '', 'New Teacher', '', 'Dance in Semester 1 will be all about filling up your kete; expanding your knowledge and vocabulary of movement and understanding how your\r\nbodies can move. The main focus of this course is to build and grow your confidence as performing artists. You will select the genres of dance that\r\nare of interest to you and you will learn the stylistic techniques and movements usually associated with your chosen genre. You will have the\r\nopportunity to include personal ways of moving that emerge from improvisation and creative work.'),
(17, 'PLY', 'Ply', 1, 'SPIN1', 'TECH', '', 'Tony', '', 'The PLY SPIN requires that you design a simple seating device using plywood as the material of choice. You will produce a portfolio of work that\r\nshows the development of ideas throughout the semester which have been informed from a range of sources. Throughout the process you will\r\nthoroughly explore aesthetic and functional properties. There will be an emphasis on producing a high quality final concept that shows sustainable\r\npractice and fitness for purpose.'),
(18, 'DEVELOP', 'Developments', 1, 'SPIN1', 'ART', '', 'Kylee', '', 'Students in this class will be exploring the interactions of form, space and light through photography and sculpture.\r\nIn Term 1 students will explore conventions and techniques used in both photography and sculpture. We will focus on the use of DSLR cameras\r\nand sculptural techniques by creating multiple artworks. In Term 2 students will be building on this knowledge to plan and create an artwork which\r\ncombines both photographic and sculptural elements.\r\nNB: It is possible to choose both visual arts SPINs (TEXTURE &amp; DEVELOP). Students who choose to take both SPINs will complete an alternative\r\nstandard in this class. It will involve following the same process as the other students, however, the emphasis of your assessment will be on your\r\nfinal sculptural work.'),
(19, 'HUARERE', 'Pakimaero Huarere', 1, 'MODULE2', 'SCIENCE', 'ENGLISH', 'Raegen', 'Brendan', 'What is life like on an island of 4 million people, each fending for themselves, just trying to survive? Another thing that is hard to imagine is the\r\nfuture. What will the world be like decades from now when Earth temperatures have continued to rise? What will agriculture be like? What will\r\ncoastal communities be like? What will international relations and armed conflict be like? What would that world look like? In this Module you will\r\nlook at the implications of heat for everyday life and carry out practical investigations connected to the area of climate change. You will also\r\ndescribe and explain how significant aspects of texts communicate ideas about texts in relation to the writerâ€™s purpose. This includes describing\r\nand explaining how significant aspects of texts connect to wider contexts, such as human experience, society and the wider world.'),
(20, 'GREATWAR', 'The Great War', 1, 'MODULE2', 'ENGLISH', 'SOCSCIENCE', 'Celeste', 'Tracey', 'World War I started in July 1914. It was going to be finished in time for Christmas. It was a chance to find glory and do great deeds. Only it wasnâ€™t.\r\nIn this module, we will be looking at the different feelings people had before going to war, and what they experienced once they got there. We will\r\nuse a variety of texts (including novels, poems, films, short stories, podcasts etc) to understand the experience of those at â€œon the frontâ€. You will\r\nthen use those perspectives to generate your own text (written, oral or visual).'),
(21, 'Q1SYMTXT', 'Q1Symtxt', 1, 'SPIN1', 'ENGLISH', '', 'Wallis', '', 'This class is for identified students who will receive support with collating evidence for both their Literacy and Numeracy Portfolios at Level 1.'),
(22, 'ELLPREI', 'Esol Pre Intermediate', 1, 'MODULE2', 'ENGLISH', 'LANGUAGE', 'Beth', '', 'Students have been allocated to ESOL classes. Please see Heidi before selecting your subjects to find out which ESOL class(es) you are in. This\r\ncourse will involve working on Level 1 Unit Standards.'),
(23, 'ELLINTA', 'ESOL Intermediate A', 1, 'SPIN1', 'ENGLISH', '', 'Beth', '', 'Students have been allocated to ESOL classes. Please see Heidi before selecting your subjects to find out which ESOL class(es) you are in. This\r\ncourse will involve working on level 2 unit standards which go towards your NCEA level 2 certificate.'),
(24, 'DEEPBLUE', 'Into the deep', 1, 'SPIN2', 'SOCSCIENCE', '', 'Aidan', '', 'Have you ever wondered what mysteries lie at the bottom of the sea? Join us as we take a deep dive into the blue to discover issues facing our\r\nwatery backyard such as pollution, overfishing, marine reserves and more. We will attempt to answer questions such as: How have our native\r\ndolphin species come to be the worldâ€™s most endangered? In what ways will rising sea levels affect our coastline in future? How bad is noise\r\npollution in the oceans and can it really be responsible for the death of coral reefs?\r\nIn this course you will be required to carry out in-depth research, employ specialist software to find solutions to the complex problems facing our\r\nseas and communicate ideas about the role and importance of our planetâ€™s oceans.'),
(25, 'STALKER', 'Cereal Killer or Celery Stalker?', 1, 'SPIN2', 'TECH', '', 'Cath', '', 'Food and beverage exports account for nearly 50% of NZâ€™s income. There is unlimited potential in NZ for innovative food designers (cereal killers)\r\nand entrepreneurs (celery stalkers). In this module, you will learn how to design and produce food products safely, expand your knowledge of\r\ndifferent ingredients and food processing skills. You will be given a brief (or can design your own) for an innovative food product that features NZ\r\nproduced ingredients and will develop, trial and refine a prototype that meets the brief. If you commit to doing two semesters of Food Technology,\r\nthis could include working as part of a team, with a mentor from the commercial food sector &amp; entering your design into the 2019 NZIFST/CREST\r\nFood Innovation Challenge - a national competition run by The Royal Society in collaboration with the Massey University Institute of Food Science\r\nand Technology.'),
(26, 'ELLINTB', 'Esol Intermediate B', 1, 'MODULE2', 'ENGLISH', 'LANGUAGE', 'Maryann', '', 'Students have been allocated to ESOL classes. Please see Heidi before selecting your subjects to find out which ESOL class(es) you are in. This\r\ncourse will involve working on Level 2 Unit Standards which go towards your NCEA Level 2 certificate'),
(27, 'MARAE2', 'Te Haerenga ki te Marae', 1, 'SPIN2', 'LANGUAGE', '', 'Whaea Leoni', '', 'This is a full-year course. In this course you will develop your existing language and cultural knowledge in preparation for organising a trip to a\r\nmarae in Term 4. We will learn through the topics of te kÄinga (home life) te ao taiohi (teenage life), te hÄpori (community), te kura (school), te marae,\r\nand kai (food).'),
(28, 'ELLEIP', 'Esol English in Practice', 1, 'SPIN2', 'ENGLISH', '', 'Maryann', '', 'Students have been allocated to ESOL classes. Please see Heidi before selecting your subjects to find out which ESOL class(es) you are in.\r\nThe aim of this course is to build confidence in basic English skills. Students will work on:\r\n- Oral presentations based on a research project\r\n- Movie study and review\r\n- Writing and performing a play\r\n- Creative writing (short stories)\r\n- Poetry (including learning about language features)\r\nThere may be an opportunity for students to work on Level 1 English Credits'),
(29, 'TEXTURE', 'Texture', 1, 'SPIN2', 'TECH', '', 'Mic', '', 'A hands-on exploration of visual arts practices and techniques through a variety of media including paint, printmaking, dry media, collage, digital\r\npainting, and design. Students will advance their knowledge of compositional principles, materials, and drawing through hands-on\r\nexperimentation and inquiry-based research.\r\nTerm 1 will be comprised of experimenting with a range of media types to create a series of smaller works and researching the practices of various\r\nartists. In term 2 you will have the opportunity to develop work focusing on the media you most enjoyed working with, in Term 1, leading to a more\r\nresolved outcome.\r\nIt is possible to choose both visual arts SPINs (TEXTURE &amp; DEVELOP), and an alternative level 1 achievement standard will be given in DEVELOP.'),
(30, 'VISCOMM', 'VisComm', 1, 'SPIN2', 'TECH', '', 'Liz McHugh', '', 'In this SPIN you will choose from two disciplines, either architecture or product design. Architecture is the design of inside and outside spaces.\r\nProduct design is the design of objects and artefacts.\r\nThe Architecture Brief:\r\nWe we will be looking at garden spaces in our community and how we can provide solutions to growing fresh produce. You will design a\r\ngreenhouse structure for a chosen stakeholder.\r\nOR\r\nProduct Briefs:\r\nYou could choose from one of the product briefs on offer. Either an innovative product for new houses to be more eco-friendly ( GJ Gardner Brief)\r\nor flat pack furniture (a continuation of the Year 10 Spin).\r\nYou will produce a portfolio of work that shows the development of ideas, considering the aesthetic and functional components of your design.\r\nThere will be a focus on visual techniques such as freehand sketching, rendering, drawing and model making, to communicate your design ideas.\r\nA brief that is linked to an authentic partner will allow for more depth throughout the design process as you will be able to gain ongoing feedback.\r\nWorking alongside a partner/stakeholder you will choose a location and do a site analysis for the design brief.\r\nIf you are interested in DVC in the future, we recommend that you take this SPIN for the whole year. If you take DVC for the whole year, you will be\r\nable to access a Level 2 External Achievement Standard.'),
(31, 'MOZART', 'The Masters', 1, 'SPIN2', 'ART', '', 'LOUISE', '', 'In semester 1 you will explore every area of Music through performing in a group, listening and analysing music, composing, recording and\r\nreading/writing notation.\r\nIn semester 2 you will focus by developing and refining skills in one or two of these areas that interests you.\r\nYour individual interest and ability in music will be catered for. You just need to love music to be able to get the most from the course.'),
(32, 'GALAXY', 'Guardians of the galaxy', 2, 'SPIN1', 'MATH', '', 'Jessica', '', 'In this SPIN we will be using mathematics and statistics to explore the whole galaxy. We will be using coordinate geometry and trigonometry to look at the constellations, investigating\r\ndifferences between populations, conducting experiments to test the human mind, and making sense of other aspects of our world. In this class you are expected to have writing tools and a\r\nphysical book, as well as a scientific calculator to have in our space exploration toolbox.');

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
(4, 'test', 'student_1', 'test.student_1@hobsonvillepoint.school.nz', 9, '19901', 'Zane Larking', NULL, NULL, NULL),
(5, 'test', 'student_2', 'test.student_2@hobsonvillepoint.school.nz', 10, '19902', 'Zane Larking', NULL, NULL, NULL),
(6, 'test', 'student_3', 'test.student_3@hobsonvillepoint.school.nz', 11, '19903', 'Zane Larking', NULL, NULL, NULL),
(7, 'test', 'student_4', 'test.student_4@hobsonvillepoint.school.nz', 12, '19904', 'Zane Larking', NULL, NULL, NULL),
(8, 'test', 'student_5', 'test.student_5@hobsonvillepoint.school.nz', 13, '19905', 'Zane Larking', NULL, NULL, NULL),
(9, 'test', 'student_6', 'test.student_6@hobsonvillepoint.school.nz', 11, '19906', 'Zane Larking', NULL, NULL, NULL),
(10, 'test', 'student_7', 'test.student_7@hobsonvillepoint.school.nz', 11, '19907', 'Zane Larking', NULL, NULL, NULL),
(11, 'test', 'student_8', 'test.student_8@hobsonvillepoint.school.nz', 12, '19908', 'Zane Larking', NULL, NULL, NULL),
(12, 'test', 'student_9', 'test.student_9@hobsonvillepoint.school.nz', 9, '19909', 'Zane Larking', NULL, NULL, NULL),
(13, 'test', 'student_10', 'test.student_10@hobsonvillepoint.school.nz', 10, '19910', 'Zane Larking', NULL, NULL, NULL);

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
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`ID`, `FIRST_NAME`, `LAST_NAME`, `EMAIL`, `TIMETABLING`) VALUES
(1, 'Ghada', 'George', 'ghada.george@hobsonvillepoint.school.nz', 0),
(2, 'Glenn', 'Stewart', 'glenn.stewart@hobsonvillepoint.school.nz', 0),
(3, 'Marion', 'Clark', 'marion.clark@hobsonvillepoint.school.nz', 0),
(4, 'Zane', 'Larking', 'zane.larking@hobsonvillepoint.school.nz', 1);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
