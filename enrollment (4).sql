-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2017 at 09:02 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enrollment`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `id` int(11) NOT NULL,
  `mission` longtext NOT NULL,
  `vission` longtext NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `mission`, `vission`, `date`) VALUES
(1, '\nTo protect and promote the right of every Filipino to quality equitable  culture-based and complete basic education where:\n\n* Students learn in a child-friendly gender-sensitive, safe and motivating environment.\n\n*Teachers facilitate learning and constantly nurture every learner.\n\n*Administrators and Staff, as stewards of institution, endure an enabling and supportive environment for effective learning to happen.\n\n*Family, community and other stakeholders are actively engaged and share responsibility for developing life-long learners.\n\n\n\n   ', '\n  We dream of Filipinos who passionately love their country and whose competencies and values enable them to realize their full potential and contribute meaningfully to building the nation.\nAs a learner-centered public institution, the Department of Education continuously improves itself to better serve its stakeholders  ', '2017-10-12');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `userlvl` varchar(255) NOT NULL,
  `kindofuser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`, `userlvl`, `kindofuser`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, 'chairman7', 'grade7', 'Grade-7', 'chairman'),
(3, 'chairman8', 'grade8', 'Grade-8', 'chairman'),
(4, 'chairman9', 'grade9', 'Grade-9', 'chairman'),
(5, 'chairman10', 'grade10', 'Grade-10', 'chairman'),
(6, 'super', 'super', 'Super Admin', 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `day` date NOT NULL,
  `event` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `day`, `event`) VALUES
(21, '2017-10-19', '             Second Periodic Exam  '),
(22, '2017-10-23', 'Sembreak For All Students'),
(23, '2017-10-23', 'Inset (Seminar) For Our Students'),
(24, '2017-11-06', '             Our Second Periodic exam shall be conducted. This to give you more time to review bt utilizing the sembreak. \r\nWe are expecting to increase the number of honors for the second grading period.');

-- --------------------------------------------------------

--
-- Table structure for table `chairman`
--

CREATE TABLE `chairman` (
  `id` int(11) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `userlvl` varchar(255) NOT NULL,
  `kindofuser` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chairman`
--

INSERT INTO `chairman` (`id`, `sname`, `fname`, `mname`, `username`, `password`, `gender`, `userlvl`, `kindofuser`, `image`) VALUES
(5, 'super', 'super', 'super', 'super', 'super', 'male', 'Super Admin', 'Super Admin', '59e65a96d58e35.00913919.jpg'),
(15, 'Admin', 'Admin', 'Admin', 'Admin', 'Admin', 'male', 'Admin', 'Admin', 'default.png'),
(17, 'anunciado', 'simeon', 'baleroso', 'chairman7', 'grade7', 'male', 'Grade-7', 'Chairman', '59e65e34e011f6.45201865.jpg'),
(18, 'jovanie', 'desquitado', 'tubo', 'chairman8', 'grade8', 'female', 'Grade-8', 'Chairman', '59e65e76785e96.82974509.jpg'),
(19, 'delacruz', 'charles', 'jamias', 'chairman9', 'grade9', 'female', 'Grade-9', 'Chairman', '59e65ea01f9716.58614836.jpg'),
(20, 'cinco', 'remberto', 'tumalin', 'chairman10', 'grade10', 'male', 'Grade-10', 'Chairman', '59e65f1056bcd9.24932439.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `enrollmentform`
--

CREATE TABLE `enrollmentform` (
  `id` int(11) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `placeofbirth` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dateofbirth` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `father` varchar(255) NOT NULL,
  `fatheroccupation` varchar(255) NOT NULL,
  `fathercontact` varchar(255) NOT NULL,
  `mother` varchar(255) NOT NULL,
  `motheroccupation` varchar(255) NOT NULL,
  `mothercontact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `elementarygraduated` varchar(255) NOT NULL,
  `average` varchar(255) NOT NULL,
  `requirements` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `process` varchar(255) NOT NULL,
  `stno` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `schoolyear` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `adviser` varchar(255) NOT NULL,
  `kindofuser` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `assesedby` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollmentform`
--

INSERT INTO `enrollmentform` (`id`, `sname`, `fname`, `mname`, `email`, `placeofbirth`, `gender`, `dateofbirth`, `age`, `grade`, `father`, `fatheroccupation`, `fathercontact`, `mother`, `motheroccupation`, `mothercontact`, `address`, `elementarygraduated`, `average`, `requirements`, `date`, `process`, `stno`, `username`, `password`, `schoolyear`, `section`, `adviser`, `kindofuser`, `image`, `assesedby`) VALUES
(378, 'anunciado', 'simeon', 'baleroso', 'simeon@yahoo.com', 'commonwealth', 'Male', '2002-02-02', '15', 'Grade-7', 'simeon anunciado', 'poreman', '639120027883', 'qweqwe', 'qweqwe', '6392415648748', 'wewqe', 'qweqwe', '90', 'FORM138/CARD,FORM137/CARD,BIRTH CERTIFICATE,GOOD MORAL', '2017-10-18', 'enrolled', 'SHS17378', 'SHS17378', 'anunciado', '2017', 'Caloocan', 'Mytty Maja T. Aduna', 'old', '', 'Chairman : anunciado, simeon baleroso'),
(382, 'anunciado', 'simeon', 'baleroso', 'simeon@yahoo.com', 'commonwealth', 'Male', '2002-02-02', '15', 'Grade-10', 'simeon anunciado', 'poreman', '639120027883', 'qweqwe', 'qweqwe', '6392415648748', 'wewqe', 'qweqwe', '75', 'NO REQUIREMENTS', '2017-10-18', 'enrolled', 'SHS17378', '', '', '2017', 'Kindness', 'Jowie G. Ignacio', 'old', '', 'Chairman : cinco, remberto tumalin'),
(383, 'anunciado', 'simeon', 'baleroso', 'simeon@yahoo.com', 'commonwealth', 'Male', '2002-02-02', '15', 'Grade-10', 'simeon anunciado', 'poreman', '639120027883', 'qweqwe', 'qweqwe', '6392415648748', 'wewqe', 'qweqwe', '75', 'NO REQUIREMENTS', '2017-10-18', 'pending', 'SHS17378', '', '', '2017', 'Kindness', 'Jowie G. Ignacio', 'old', '', 'Chairman : delacruz, charles jamias'),
(384, 'anunciado', 'simeon', 'baleroso', 'simeon@yahoo.com', 'commonwealth', 'Male', '2002-02-02', '15', 'Grade-10', 'simeon anunciado', 'poreman', '639120027883', 'qweqwe', 'qweqwe', '6392415648748', 'wewqe', 'qweqwe', '75', 'NO REQUIREMENTS', '2017-10-18', 'pending', 'SHS17378', '', '', '2017', 'Kindness', 'Jowie G. Ignacio', 'old', '', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `grade8`
--
CREATE TABLE `grade8` (
`id` int(11)
,`sectionname` varchar(255)
,`adviser` varchar(255)
,`schoolyear` varchar(255)
,`grade` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `guidelines`
--

CREATE TABLE `guidelines` (
  `id` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guidelines`
--

INSERT INTO `guidelines` (`id`, `description`, `date`) VALUES
(1, '                           \r\n\r\n  Manual Enrollment (For New / Transferee Students )\r\n\r\n1. Present the requirements for enrollment in teacher chairman.\r\n2. Fill up the Enrollment Form.\r\n3. Kindly, Get the Transaction Number\r\n4. Give the enrollment form in chairman or admin.\r\n5. Wait for the sectioning process it will announce your name from teachers.\r\n6. Get the Section Form it will pass to the adviser to proof you are enrolled in this section.\r\n\r\n\r\n\r\n\r\n                                        Manual Enrollment (For Old Students )\r\n\r\n\r\n\r\n1.Attend in the BRIGADA.\r\n2. Present the requirements for enrollment in teacher chairman.\r\n3. Fill up the Enrollment Form.\r\n4. Kindly, Get the Transaction Number\r\n5. Give the enrollment form in chairman or admin.\r\n6. Wait for the sectioning process it will announce your name from teachers.\r\n7. Get the Section Form it will pass to the adviser to proof you are enrolled in this section.\r\n\r\n\r\n\r\n\r\n                                          Online Enrollment ( For All Students )\r\n1. Attend in the BRIGADA or You can buy Journal  / Tabular of Sampaguita\r\n  (This Step will after enrolling thru online)\r\n2. Bring the Enrollment Form, to chairman or admin.\r\n\r\n\r\n       ', '2017-10-12');

-- --------------------------------------------------------

--
-- Table structure for table `london`
--

CREATE TABLE `london` (
  `id` int(11) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `london`
--

INSERT INTO `london` (`id`, `surname`, `firstname`, `middlename`, `date`) VALUES
(128, 'anunciado', 'simeon', 'qwe', '2017-08-18 00:00:00'),
(129, 'anunciado', 'simeon', 'qwe', '2017-08-18 00:00:00'),
(130, 'anunciado', 'simeon', 'qwe', '2017-08-18 00:00:00'),
(131, 'anunciado', 'simeon', 'qwe', '2017-08-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `news` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `news`, `date`) VALUES
(21, '                            October 2, 2017 Will be the BLIND AUDITION of our First THE VOICE TEEN Sampaguita. it will start 1pm at the school covered court. Participants must bring downloaded accompaniment in USB or in your cellphone. \r\n\r\n\r\nWe will choos', '2017-10-14'),
(22, 'To Our English, Filipino and ESP (Values)\r\nTeachers. Give Quiz for our students pertaining to the video, once in a year an I witness documentary by Kara David', '2017-10-14');

-- --------------------------------------------------------

--
-- Table structure for table `paris`
--

CREATE TABLE `paris` (
  `id` int(11) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paris`
--

INSERT INTO `paris` (`id`, `surname`, `firstname`, `middlename`) VALUES
(21, 'anunciado', 'simeon', 'qwe'),
(22, 'wqeqwe', 'qweqwe', 'qweqwe'),
(23, 'rosie', 'morano', 'amboy'),
(24, 'cinco', 'rembertoq', 'qweqwe'),
(25, 'cinco', 'rembertoq', 'qweqwe'),
(26, 'wqeqwe', 'qweqwe', 'qweqwe'),
(27, 'rosie', 'morano', 'amboy'),
(28, 'anunciado', 'simeon', 'qwe'),
(29, 'anunciado', 'simeon', 'qwe'),
(30, 'wqeqwe', 'qweqwe', 'qweqwe'),
(31, 'rosie', 'morano', 'amboy'),
(32, 'cinco', 'rembertoq', 'qweqwe'),
(33, 'cinco', 'rembertoq', 'qweqwe'),
(34, 'wqeqwe', 'qweqwe', 'qweqwe'),
(35, 'rosie', 'morano', 'amboy'),
(36, 'anunciado', 'simeon', 'qwe'),
(37, 'anunciado', 'simeon', 'qwe'),
(38, 'wqeqwe', 'qweqwe', 'qweqwe'),
(39, 'rosie', 'morano', 'amboy'),
(40, 'cinco', 'rembertoq', 'qweqwe'),
(41, 'cinco', 'rembertoq', 'qweqwe'),
(42, 'wqeqwe', 'qweqwe', 'qweqwe'),
(43, 'rosie', 'morano', 'amboy'),
(44, 'anunciado', 'simeon', 'qwe'),
(45, 'anunciado', 'simeon', 'qwe'),
(46, 'wqeqwe', 'qweqwe', 'qweqwe'),
(47, 'rosie', 'morano', 'amboy'),
(48, 'cinco', 'rembertoq', 'qweqwe'),
(49, 'cinco', 'rembertoq', 'qweqwe'),
(50, 'wqeqwe', 'qweqwe', 'qweqwe'),
(51, 'rosie', 'morano', 'amboy'),
(52, 'anunciado', 'simeon', 'qwe'),
(53, 'anunciado', 'simeon', 'qwe'),
(54, 'wqeqwe', 'qweqwe', 'qweqwe'),
(55, 'rosie', 'morano', 'amboy'),
(56, 'cinco', 'rembertoq', 'qweqwe'),
(57, 'cinco', 'rembertoq', 'qweqwe'),
(58, 'wqeqwe', 'qweqwe', 'qweqwe'),
(59, 'rosie', 'morano', 'amboy'),
(60, 'anunciado', 'simeon', 'qwe'),
(61, 'anunciado', 'simeon', 'qwe'),
(62, 'wqeqwe', 'qweqwe', 'qweqwe'),
(63, 'rosie', 'morano', 'amboy'),
(64, 'cinco', 'rembertoq', 'qweqwe'),
(65, 'cinco', 'rembertoq', 'qweqwe'),
(66, 'wqeqwe', 'qweqwe', 'qweqwe'),
(67, 'rosie', 'morano', 'amboy'),
(68, 'anunciado', 'simeon', 'qwe');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `image`, `text`) VALUES
(23, '59e216274210b0.47602663.jpg', 'Sampaguita Awards , Plaques and Excellence of 20 years giving values ethics for all sampaguitarians'),
(26, '59e6f5c92ef5b7.49588485.jpg', '  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n				      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n				      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n				    '),
(27, '59e6f6ec5d6b05.44553661.jpg', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n		    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n		    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n		    consequat. '),
(28, '59e6f6f5622f90.98297710.jpg', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n		    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n		    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n		    consequat. ');

-- --------------------------------------------------------

--
-- Table structure for table `registereduser`
--

CREATE TABLE `registereduser` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registereduser`
--

INSERT INTO `registereduser` (`id`, `firstname`, `lastname`, `middlename`, `email`, `pass`) VALUES
(16, 'simeon', 'simeon', 'simeon', 'simeon@yahoo.com', '234'),
(22, 'Jeanmae', 'Desqutado', 'Cortez', 'cortez@yahoo.com', '12345'),
(23, 'mariel', 'rivera', 'rucero', 'marielrose26@yahoo.com', '12345'),
(24, 'qwe', 'qwe', 'asd', 'asd@yahoo.com', '12345'),
(25, 'Cirillio', 'Estramadura', 'Wex', 'cirillio@yahoo.com', '12345'),
(26, 'Jovanie', 'Desquitado', 'Cortez', 'jovanie@yahoo.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `id` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`id`, `description`, `date`) VALUES
(2, 'For New / Transferee Enrollee\r\n\r\nRequirements :\r\n1. Form 137\r\n2. Photocopy of Birth Certificate / N.S.O\r\n3. Good Moral\r\n4. Photocopy of Certificate in Graduation or Diploma\r\n5. Bring your Guardian / Parents.\r\n6. The Date of Brigada will be anounce.\r\n\r\n\r\n________________________________________________________________________________________________________________________________________\r\n\r\nFor Old Students\r\n\r\nRequirements :\r\n1. Form 138\r\n2. Wait for the Schedule of BRIGADA ( It will be announced here).       .\r\n  ', '2017-10-14 22:38:54');

-- --------------------------------------------------------

--
-- Table structure for table `sectionlist`
--

CREATE TABLE `sectionlist` (
  `id` int(11) NOT NULL,
  `sectionname` varchar(255) NOT NULL,
  `adviser` varchar(255) NOT NULL,
  `schoolyear` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `criteria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sectionlist`
--

INSERT INTO `sectionlist` (`id`, `sectionname`, `adviser`, `schoolyear`, `grade`, `criteria`) VALUES
(1, 'London', 'Donalyn De Perio', '2017', 'Grade-8', '92'),
(2, 'Paris', 'Anthony Contrevida', '2017', 'Grade-8', '87'),
(3, 'Washington DC', 'Stella B. Aniflauni', '2017', 'Grade-8', '87a'),
(4, 'Ottawa', 'Jeana A. Vasuez', '2017', 'Grade-8', '84'),
(5, 'Brasilia', 'Lorena C. Vidallon', '2017', 'Grade-8', '84a'),
(8, 'Cairo', 'Dennis E. Draper', '2017', 'Grade-8', '80'),
(9, 'Manila', 'Janethe C. Ho', '2017', 'Grade-8', '80a'),
(10, 'Seoul', 'Junalyn B. Francisco', '2017', 'Grade-8', '80b'),
(11, 'Canberra', 'Efren D. Abjuela', '2017', 'Grade-8', '80c'),
(12, 'Wellington', 'Rita V. De leon', '2017', 'Grade-8', '75'),
(13, 'Prudence', 'Grace Joy E. Villena', '2017', 'Grade-10', '92'),
(16, 'Bravery', 'Jhoan C. Fortu', '2017', 'Grade-10', '87'),
(17, 'Loyalty', 'Rachelle S. Dela Cruz', '2017', 'Grade-10', '87a'),
(18, 'Courage', 'Myla A. Lasala', '2017', 'Grade-10', '84'),
(19, 'Dignity', 'Ma. Belynda G. Villacote', '2017', 'Grade-10', '84a'),
(20, 'Resiliency', 'Evangeline O. Espana', '2017', 'Grade-10', '80'),
(21, 'Unity', 'Robert V. Vasquez', '2017', 'Grade-10', '80a'),
(22, 'Humility', 'Jerome L. Jacolbia', '2017', 'Grade-10', '80b'),
(23, 'Perseverance', 'Lyree Kieth F. Oranza', '2017', 'Grade-10', '80c'),
(24, 'Kindness', 'Jowie G. Ignacio', '2017', 'Grade-10', '75'),
(25, 'Zimbabwe', 'Marian Manalansang', '2017', 'Grade-8', '75a'),
(26, 'Australia', 'Jun Pimentel', '2017', 'Grade-8', '75b'),
(27, 'Honesty', 'Amy Bulawan', '2017', 'Grade-10', '75a'),
(28, 'Amiability', 'Alice Recoco', '2017', 'Grade-10', '75b'),
(35, 'Davao', 'Catherine V. Edosma', '2017', 'Grade-7', '97'),
(36, 'Caloocan', 'Mytty Maja T. Aduna', '2017', 'Grade-7', '87'),
(37, 'cebu', 'Maritess A. Pagcaliwagan', '2017', 'Grade-7', '87a'),
(38, 'Laguna', 'Eden b Melegrito', '2017', 'Grade-7', '84'),
(39, 'Bulacan', 'Merwynn S. Bacay', '2017', 'Grade-7', '84a'),
(40, 'Palawan', 'Ellen F Frias', '2017', 'Grade-7', '80'),
(41, 'Bohol', 'Mary An B. Dimalanta', '2017', 'Grade-7', '80a'),
(42, 'vigan', 'Marry Grace T. Barcelon', '2017', 'Grade-7', '80a'),
(43, 'Cavite', 'Helen B. Fugen', '2017', 'Grade-7', '80b'),
(44, 'Bicol', 'Arjhodelyn B. Ancheta', '2017', 'Grade-7', '80c'),
(45, 'Bataan', 'Eluwin B.Blanca', '2017', 'Grade-7', '75'),
(46, 'Leyte', 'Henry C. Bulatan', '2017', 'Grade-7', '75a'),
(51, 'Zeus', 'Lenylyn c. lingling', '2017', 'Grade-9', '97'),
(52, 'Athena', 'Joselyn V. Marquez', '2017', 'Grade-9', '87'),
(53, 'aphrodite', 'Victorino c. Chin', '2017', 'Grade-9', '87a'),
(54, 'Artemis', 'Romie-lyn Dela Vrga', '2017', 'Grade-9', '84'),
(55, 'Pera', 'Juliet Santa inis', '2017', 'Grade-9', '84a'),
(56, 'Pionysus', 'Rita C Delos Angeles', '2017', 'Grade-9', '80'),
(57, 'poseidon', 'Abegail M rebadulla', '2017', 'Grade-9', '80a'),
(58, 'Apollo', 'David Alfredo', '2017', 'Grade-9', '80a'),
(59, 'cupid', 'Glen Borromeo', '2017', 'Grade-9', '80b'),
(60, 'Hermes', 'Roy asis', '2017', 'Grade-9', '80c'),
(61, 'Demeter', 'jeff Carranza', '2017', 'Grade-9', '75'),
(62, 'Hestia', 'Marygrace Barcelon', '2017', 'Grade-9', '75a');

-- --------------------------------------------------------

--
-- Table structure for table `studentdetails`
--

CREATE TABLE `studentdetails` (
  `id` int(11) NOT NULL,
  `stno` varchar(255) NOT NULL,
  `stname` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dateofbirth` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mothername` varchar(255) NOT NULL,
  `mothercontact` varchar(255) NOT NULL,
  `fathername` varchar(255) NOT NULL,
  `fathercontact` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentdetails`
--

INSERT INTO `studentdetails` (`id`, `stno`, `stname`, `age`, `gender`, `dateofbirth`, `address`, `mothername`, `mothercontact`, `fathername`, `fathercontact`, `username`, `password`, `image`) VALUES
(102, 'SHS17378', 'anunciado', '15', 'Male', '2002-02-02', 'wewqe', 'qweqwe', '6392415648748', 'simeon anunciado', '639120027883', 'SHS17378', 'anunciado', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `subjectlist`
--

CREATE TABLE `subjectlist` (
  `id` int(11) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `subjecttitle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjectlist`
--

INSERT INTO `subjectlist` (`id`, `grade`, `subjecttitle`) VALUES
(1, 'Grade-7', 'filipino1'),
(2, 'Grade-7', 'english1'),
(3, 'Grade-7', 'mathematics1'),
(4, 'Grade-7', 'science1'),
(5, 'Grade-7', 'aralingpanlipunan1'),
(6, 'Grade-7', 'values1'),
(7, 'Grade-7', 'mapeh1'),
(8, 'Grade-7', 'tle1'),
(9, 'Grade-8', 'filipino2'),
(10, 'Grade-8', 'english2'),
(11, 'Grade-8', 'mathematics2'),
(12, 'Grade-8', 'science2'),
(14, 'Grade-8', 'edukasyong sa pagpapakatao2'),
(15, 'Grade-8', 'mapeh2'),
(16, 'Grade-8', 'tle2'),
(17, 'Grade-9', 'filipino3'),
(18, 'Grade-9', 'english3'),
(19, 'Grade-9', 'mathematics3'),
(20, 'Grade-9', 'science3'),
(21, 'Grade-9', 'aralingpanlipunan3'),
(22, 'Grade-9', 'edukasyong sa pagpapakatao3'),
(23, 'Grade-9', 'mapeh3'),
(24, 'Grade-9', 'tle3'),
(33, 'Grade-10', 'filipino4'),
(34, 'Grade-10', 'english4'),
(35, 'Grade-10', 'mathematics4'),
(36, 'Grade-10', 'science4'),
(37, 'Grade-10', 'aralingpanlipunan4'),
(38, 'Grade-10', 'edukasyong sa pagpapakatao4'),
(39, 'Grade-10', 'mapeh4'),
(40, 'Grade-10', 'tle4'),
(41, 'Grade-8', 'Araling Panlipunan 2');

-- --------------------------------------------------------

--
-- Table structure for table `trysectioning`
--

CREATE TABLE `trysectioning` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `average` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `adviser` varchar(255) NOT NULL,
  `schoolyear` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trysectioning`
--

INSERT INTO `trysectioning` (`id`, `lastname`, `average`, `grade`, `section`, `adviser`, `schoolyear`) VALUES
(215, 'desquitado', '95', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(216, 'desquitado', '95', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(217, 'desquitado', '95', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(218, 'desquitado', '95', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(219, 'desquitado', '95', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(220, 'desquitado', '95', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(221, 'desquitado', '95', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(222, 'desquitado', '95', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(223, 'desquitado', '95', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(224, 'desquitado', '95', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(225, 'desquitado', '95', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(226, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(227, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(228, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(229, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(230, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(231, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(232, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(233, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(234, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(235, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(236, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(237, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(238, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(239, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(240, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(241, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(242, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(243, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(244, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(245, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(246, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(247, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(248, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(249, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(250, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(251, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(252, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(253, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(254, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(255, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(256, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(257, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(258, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(259, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(260, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(261, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(262, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(263, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(264, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(265, 'desquitado', '88', 'Grade-10', 'Prudence', 'Grace Joy E. Villena', '2017'),
(266, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(267, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(268, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(269, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(270, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(271, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(272, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(273, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(274, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(275, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(276, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(277, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(278, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(279, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(280, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(281, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(282, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(283, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(284, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(285, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(286, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(287, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(288, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(289, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(290, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(291, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(292, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(293, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(294, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(295, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(296, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(297, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(298, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(299, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(300, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(301, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(302, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(303, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(304, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(305, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(306, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(307, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(308, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(309, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(310, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(311, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(312, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(313, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(314, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(315, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(316, 'desquitado', '88', 'Grade-10', 'Bravery', 'Jhoan C. Fortu', '2017'),
(317, 'desquitado', '88', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(318, 'desquitado', '88', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(319, 'desquitado', '88', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(320, 'desquitado', '88', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(321, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(322, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(323, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(324, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(325, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(326, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(327, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(328, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(329, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(330, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(331, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(332, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(333, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(334, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(335, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(336, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(337, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(338, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(339, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(340, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(341, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(342, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(343, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(344, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(345, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(346, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(347, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(348, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(349, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(350, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(351, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(352, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(353, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(354, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(355, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(356, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(357, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(358, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(359, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(360, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(361, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(362, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(363, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(364, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(365, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(366, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(367, 'desquitado', '95', 'Grade-8', 'London', 'Donalyn De Perio', '2017'),
(368, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(369, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(370, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(371, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(372, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(373, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(374, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(375, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(376, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(377, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(378, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(379, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(380, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(381, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(382, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(383, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(384, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(385, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(386, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(387, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(388, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(389, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(390, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(391, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(392, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(393, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(394, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(395, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(396, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(397, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(398, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(399, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(400, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(401, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(402, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(403, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(404, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(405, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(406, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(407, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(408, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(409, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(410, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(411, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(412, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(413, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(414, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(415, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(416, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(417, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(418, 'desquitado', '95', 'Grade-8', 'Paris', 'Anthony Contrevida', '2017'),
(419, 'desquitado', '84', 'Grade-8', 'Cairo', 'Dennis E. Draper', '2017'),
(420, 'desquitado', '85', 'Grade-10', 'Resiliency', 'Evangeline O. Espana', '2017');

-- --------------------------------------------------------

--
-- Structure for view `grade8`
--
DROP TABLE IF EXISTS `grade8`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `grade8`  AS  select `sectionlist`.`id` AS `id`,`sectionlist`.`sectionname` AS `sectionname`,`sectionlist`.`adviser` AS `adviser`,`sectionlist`.`schoolyear` AS `schoolyear`,`sectionlist`.`grade` AS `grade` from `sectionlist` where (`sectionlist`.`grade` = 8) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chairman`
--
ALTER TABLE `chairman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollmentform`
--
ALTER TABLE `enrollmentform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guidelines`
--
ALTER TABLE `guidelines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `london`
--
ALTER TABLE `london`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paris`
--
ALTER TABLE `paris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registereduser`
--
ALTER TABLE `registereduser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sectionlist`
--
ALTER TABLE `sectionlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentdetails`
--
ALTER TABLE `studentdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjectlist`
--
ALTER TABLE `subjectlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trysectioning`
--
ALTER TABLE `trysectioning`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `chairman`
--
ALTER TABLE `chairman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `enrollmentform`
--
ALTER TABLE `enrollmentform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=385;
--
-- AUTO_INCREMENT for table `guidelines`
--
ALTER TABLE `guidelines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `london`
--
ALTER TABLE `london`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `paris`
--
ALTER TABLE `paris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `registereduser`
--
ALTER TABLE `registereduser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sectionlist`
--
ALTER TABLE `sectionlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `studentdetails`
--
ALTER TABLE `studentdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `subjectlist`
--
ALTER TABLE `subjectlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `trysectioning`
--
ALTER TABLE `trysectioning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=421;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
