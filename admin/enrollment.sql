-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2017 at 02:10 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`) VALUES
(1, 'admin', 'admin');

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
(3, '2017-08-09', 'Distribution of Report Cards - 1st Grading'),
(4, '2017-10-28', 'Distributions of Report Card - 2nd Grading'),
(5, '2017-09-06', 'asdas');

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
  `schoolyear` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `adviser` varchar(255) NOT NULL,
  `kindofuser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollmentform`
--

INSERT INTO `enrollmentform` (`id`, `sname`, `fname`, `mname`, `email`, `placeofbirth`, `gender`, `dateofbirth`, `age`, `grade`, `father`, `fatheroccupation`, `fathercontact`, `mother`, `motheroccupation`, `mothercontact`, `address`, `elementarygraduated`, `average`, `requirements`, `date`, `process`, `stno`, `schoolyear`, `section`, `adviser`, `kindofuser`) VALUES
(66, 'Dela Cruz', 'Charles', 'Jamias', 'simeon@yahoo.com', 'Cubao Q.City', 'Male', '2017-08-11', '20', 'Grade-8', 'juan', 'wqe', 'wqe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', '75', 'BIRTH CERTIFICATE,GOOD MORAL', '2017-08-20', 'enrolled', 'A12', '2017', 'Brasilia', 'Lorena C. Vidallon', 'old'),
(73, 'Desquitado', 'Jeanmae', 'Cortez', 'cortez@yahoo.com', 'sad', 'Female', '2017-08-06', '13', 'Grade-8', 'asd', 'asd', 'ad', 'asd', 'asd', 'asd', 'asdsd', 'highschool', '95', 'NO REQUIREMENTS', '2017-08-23', 'enrolled', 'A11', '2017', 'Brasilia', 'Lorena C. Vidallon', 'old'),
(86, 'Cinco', 'Rem', 'sad', 'wew@yahoo.com', 'asda', 'Male', '2017-09-02', '12', 'Grade-8', 'Rem1', 'Engineer', '0949', 'Rem2', 'House Wife', '0929', 'Commonwealth Quezon City', 'PUP', '75', 'FORM138/CARD,FORM137,BIRTH CERTIFICATE,GOOD MORAL', '0000-00-00', 'enrolled', 'A14', '2017', 'London', 'Donalyn De Perio', 'old'),
(87, 'Desquitado', 'Maria Pesha', 'Cortez', 'maria@yahoo.com', 'Quezon City', 'Female', '2017-09-07', '14', 'Grade-10', 'Jose Desquitado', 'Contractor', '09295844243', 'Mary Jane Desquitado', 'House Wife', '09490600820', 'Neil Property Upper Banlat Tandang Sora Q. City', 'New Era High School', '92', 'NO REQUIREMENTS', '2017-09-01', 'enrolled', 'A13', '2017', 'Loyalty', 'Rachelle S. Dela Cruz', 'old'),
(88, 'rivera', 'mariel', 'rucero', 'marielrose26@yahoo.com', 'Quezon City', 'Female', '2017-09-16', '20', 'Grade-8', 'Jose Desquitado', 'Contractor', '09490600820', 'Mary Jane Desquitado', 'House Wife', '09295844243', 'Neil Property Upper Banlat Tandang Sora Q. City', 'New Era High School', '95', 'FORM138/CARD,FORM137,BIRTH CERTIFICATE,GOOD MORAL', '2017-09-04', 'enrolled', 'A18', '2017', 'London', 'Donalyn De Perio', 'old');

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
(23, 'mariel', 'rivera', 'rucero', 'marielrose26@yahoo.com', '12345');

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
(1, 'London', 'Donalyn De Perio', '2017', 'Grade-8', '90'),
(2, 'Paris', 'Anthony Contrevida', '2017', 'Grade-8', '88'),
(3, 'Washington DC', 'Stella B. Aniflauni', '2017', 'Grade-8', 'A'),
(4, 'Ottawa', 'Jeana A. Vasuez', '2017', 'Grade-8', 'B'),
(5, 'Brasilia', 'Lorena C. Vidallon', '2017', 'Grade-8', 'C'),
(8, 'Cairo', 'Dennis E. Draper', '2017', 'Grade-8', 'D'),
(9, 'Manila', 'Janethe C. Ho', '2017', 'Grade-8', 'E'),
(10, 'Seoul', 'Junalyn B. Francisco', '2017', 'Grade-8', 'F'),
(11, 'Canberra', 'Efren D. Abjuela', '2017', 'Grade-8', 'G'),
(12, 'Wellington', 'Rita V. De leon', '2017', 'Grade-8', 'H'),
(13, 'Prudence', 'Grace Joy E. Villena', '2017', 'Grade-10', '90'),
(16, 'Bravery', 'Jhoan C. Fortu', '2017', 'Grade-10', '88'),
(17, 'Loyalty', 'Rachelle S. Dela Cruz', '2017', 'Grade-10', ''),
(18, 'Courage', 'Myla A. Lasala', '2017', 'Grade-10', ''),
(19, 'Dignity', 'Ma. Belynda G. Villacote', '2017', 'Grade-10', ''),
(20, 'Resiliency', 'Evangeline O. Espana', '2017', 'Grade-10', ''),
(21, 'Unity', 'Robert V. Vasquez', '2017', 'Grade-10', ''),
(22, 'Humility', 'Jerome L. Jacolbia', '2017', 'Grade-10', ''),
(23, 'Perseverance', 'Lyree Kieth F. Oranza', '2017', 'Grade-10', ''),
(24, 'Kindness', 'Jowie G. Ignacio', '2017', 'Grade-10', '');

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
(6, 'Grade-7', 'edukasyong sa pagpapakatao1'),
(7, 'Grade-7', 'mapeh1'),
(8, 'Grade-7', 'tle1'),
(9, 'Grade-8', 'filipino2'),
(10, 'Grade-8', 'english2'),
(11, 'Grade-8', 'mathematics2'),
(12, 'Grade-8', 'science2'),
(13, 'Grade-8', 'aralingpanlipunan2'),
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
(34, 'grade10', 'english4'),
(35, 'grade10', 'mathematics4'),
(36, 'grade10', 'science4'),
(37, 'grade10', 'aralingpanlipunan4'),
(38, 'grade10', 'edukasyong sa pagpapakatao4'),
(39, 'grade10', 'mapeh4'),
(40, 'grade10', 'tle4');

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
(320, 'desquitado', '88', 'Grade-8', 'London', 'Donalyn De Perio', '2017');

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
-- Indexes for table `enrollmentform`
--
ALTER TABLE `enrollmentform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `london`
--
ALTER TABLE `london`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paris`
--
ALTER TABLE `paris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registereduser`
--
ALTER TABLE `registereduser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sectionlist`
--
ALTER TABLE `sectionlist`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `enrollmentform`
--
ALTER TABLE `enrollmentform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `london`
--
ALTER TABLE `london`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
--
-- AUTO_INCREMENT for table `paris`
--
ALTER TABLE `paris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `registereduser`
--
ALTER TABLE `registereduser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `sectionlist`
--
ALTER TABLE `sectionlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `subjectlist`
--
ALTER TABLE `subjectlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `trysectioning`
--
ALTER TABLE `trysectioning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
