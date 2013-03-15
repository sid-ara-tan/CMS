-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 15, 2013 at 07:52 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `course`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignedcourse`
--

CREATE TABLE IF NOT EXISTS `assignedcourse` (
  `T_Id` varchar(10) NOT NULL DEFAULT '',
  `CourseNo` varchar(10) NOT NULL DEFAULT '',
  `Sec` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`T_Id`,`CourseNo`,`Sec`),
  KEY `T_Id` (`T_Id`),
  KEY `CourseNo` (`CourseNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignedcourse`
--

INSERT INTO `assignedcourse` (`T_Id`, `CourseNo`, `Sec`) VALUES
('05001', 'CSE309', 'A'),
('05001', 'CSE309', 'B'),
('05002', 'CSE303', 'A'),
('05002', 'CSE303', 'B'),
('05002', 'CSE304', 'A1'),
('05002', 'CSE304', 'A2'),
('05002', 'CSE304', 'B1'),
('05002', 'CSE304', 'B2'),
('05003', 'CSE304', 'A2'),
('05003', 'CSE304', 'B1'),
('05003', 'CSE305', 'A'),
('05003', 'CSE305', 'B'),
('05004', 'CSE304', 'A2'),
('05004', 'CSE304', 'B1'),
('05005', 'CSE307', 'A'),
('05005', 'CSE307', 'B'),
('05005', 'CSE308', 'A1'),
('05005', 'CSE308', 'A2'),
('05005', 'CSE308', 'B2'),
('05006', 'CSE311', 'A'),
('05006', 'CSE311', 'B'),
('05007', 'CSE304', 'B2'),
('05007', 'CSE307', 'A'),
('05007', 'CSE307', 'B'),
('05007', 'CSE310', 'A1'),
('05007', 'CSE310', 'A2'),
('05007', 'CSE310', 'B1'),
('05007', 'CSE310', 'B2'),
('05008', 'CSE300', 'A1'),
('05008', 'CSE300', 'A2'),
('05008', 'CSE300', 'B1'),
('05008', 'CSE300', 'B2'),
('05008', 'CSE305', 'A'),
('05008', 'CSE305', 'B'),
('05009', 'CSE310', 'A1'),
('05009', 'CSE310', 'A2'),
('05009', 'CSE310', 'B1'),
('05009', 'CSE310', 'B2'),
('05010', 'CSE304', 'A1'),
('05011', 'CSE304', 'A1'),
('05011', 'CSE304', 'B2'),
('05012', 'CSE303', 'A'),
('05012', 'CSE303', 'B'),
('05013', 'CSE308', 'A2'),
('05013', 'CSE308', 'B1'),
('05013', 'CSE308', 'B2'),
('05014', 'CSE308', 'A1'),
('05014', 'CSE308', 'B1'),
('05015', 'CSE309', 'A'),
('05015', 'CSE309', 'B'),
('05015', 'CSE310', 'A1'),
('05015', 'CSE310', 'A2'),
('05015', 'CSE310', 'B1'),
('05015', 'CSE310', 'B2');

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE IF NOT EXISTS `authentication` (
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(64) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`username`, `password`, `email`) VALUES
('admin', '827ccb0eea8a706c4c34a16891f84e7b', 'siddhartha047@gmail.com'),
('arafat', '827ccb0eea8a706c4c34a16891f84e7b', 'arafat.swh@gmail.com'),
('siddhartha', '827ccb0eea8a706c4c34a16891f84e7b', 'siddhartha047@gmail.com'),
('tanzir', '827ccb0eea8a706c4c34a16891f84e7b', 'arafat_buet@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(255) NOT NULL DEFAULT '',
  `to` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `from`, `to`, `message`, `sent`, `recd`) VALUES
(2, '', 'robert', 'hey robert this is sid the secret', '2012-09-18 15:03:51', 1),
(3, 'secret', 'robert', 'hey robert', '2012-09-18 15:06:49', 1),
(4, 'robert', 'secret', 'hey secret', '2012-09-18 15:08:32', 1),
(5, 'secret', 'robert', 'how you doin', '2012-09-18 15:08:40', 1),
(6, 'robert', 'secret', 'good how about you', '2012-09-18 15:08:49', 1),
(7, 'secret', 'robert', 'what''s wrong with you', '2012-09-18 15:13:05', 1),
(8, 'secret', 'robert', 'what''s wrong with me? what''s is wrong with you?', '2012-09-18 15:14:32', 1),
(9, 'robert', 'secret', 'ok bad luck', '2012-09-18 15:14:47', 1),
(10, 'secret', 'robert', 'hey robert', '2012-09-18 16:19:54', 1),
(11, 'secret', 'secret', 'hey secret', '2012-09-18 16:20:05', 1),
(12, 'secret', 'robert', 'hey secre', '2012-09-18 16:20:13', 1),
(13, 'robert', 'secret', 'hey sid', '2012-09-18 16:20:57', 1),
(14, 'secret', 'robert', 'hey secret', '2012-09-18 16:21:06', 1),
(15, 'robert', 'secret', 'hey what''s up', '2012-09-18 17:00:06', 1),
(16, 'secret', 'robert', 'hey robert this is sid', '2012-09-18 18:30:40', 1),
(17, 'robert', 'secret', 'this is robet', '2012-09-18 18:31:22', 1),
(18, 'secret', 'robert', 'this is ara', '2012-09-18 18:31:36', 1),
(19, 'robert', 'secret', 'this is awesome', '2012-09-18 18:32:01', 1),
(20, 'secret', 'robert', 'isn''t', '2012-09-18 18:32:06', 1),
(21, 'secret', 'admin', 'hey admin what''s up', '2012-09-18 18:32:17', 1),
(22, 'secret', 'robert', 'this is so good', '2012-09-18 18:32:58', 1),
(23, 'robert', 'secret', 'yeh it is', '2012-09-18 18:33:03', 1),
(24, 'secret', 'admin', 'arafat', '2012-09-23 12:14:06', 1),
(25, 'secret', 'robert', 'arafat', '2012-09-23 12:14:38', 1),
(26, 'secret', 'robert', 'aladin', '2012-09-23 12:14:59', 1),
(27, 'robert', 'secret', 'hey', '2012-09-23 12:15:59', 1),
(28, 'robert', 'secret', 'hey', '2012-09-23 12:16:04', 1),
(29, 'secret', 'robert', 'so cool', '2012-09-23 12:16:17', 1),
(30, 'secret', 'robert', 'hello', '2012-09-23 12:19:33', 0),
(31, 'arafat', 'siddhartha', 'hey sid', '2012-10-11 00:18:21', 1),
(32, 'siddhartha', 'arafat', 'what''s up', '2012-10-11 00:18:26', 1),
(33, 'admin', 'arafat', 'dsdad', '2012-10-18 15:22:25', 0),
(34, 'admin', 'arafat', 'hey ara', '2013-02-17 11:34:36', 0),
(35, 'admin', 'siddhartha', 'hey what''s up', '2013-03-15 00:42:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `classinfo`
--

CREATE TABLE IF NOT EXISTS `classinfo` (
  `Dept_id` varchar(10) NOT NULL,
  `CourseNo` varchar(10) NOT NULL DEFAULT '',
  `cDay` varchar(12) NOT NULL DEFAULT '',
  `Period` int(11) NOT NULL DEFAULT '0',
  `Sec` varchar(2) NOT NULL DEFAULT '',
  `cTime` varchar(10) NOT NULL DEFAULT '',
  `Location` varchar(15) DEFAULT NULL,
  `Duration` varchar(5) DEFAULT NULL,
  `by_teacher` varchar(10) NOT NULL DEFAULT '',
  `sLevel` varchar(10) NOT NULL,
  `Term` varchar(10) NOT NULL,
  PRIMARY KEY (`CourseNo`,`cDay`,`Sec`,`Period`),
  KEY `CourseNo` (`CourseNo`),
  KEY `by_teacher` (`by_teacher`),
  KEY `by_teacher_2` (`by_teacher`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classinfo`
--

INSERT INTO `classinfo` (`Dept_id`, `CourseNo`, `cDay`, `Period`, `Sec`, `cTime`, `Location`, `Duration`, `by_teacher`, `sLevel`, `Term`) VALUES
('CSE', 'CSE303', 'Sunday', 3, 'A', '10:00 am', 'CSE102', '50', '05002', '3', '1'),
('CSE', 'CSE303', 'Sunday', 2, 'B', '09:00 am', 'CSE102', '50', '05002', '3', '1'),
('CSE', 'CSE303', 'Tuesday', 2, 'A', '09:00 am', 'CSE102', '50', '05002', '3', '1'),
('CSE', 'CSE303', 'Tuesday', 3, 'B', '10:00 am', 'CSE102', '50', '05002', '3', '1'),
('CSE', 'CSE303', 'Wednesday', 2, 'A', '09:00 am', 'CSE102', '50', '05002', '3', '1'),
('CSE', 'CSE303', 'Wednesday', 1, 'B', '08:00 am', 'CSE102', '50', '05002', '3', '1'),
('CSE', 'CSE304', 'Monday', 7, 'A2', '02:30 pm', 'CSE109', '150', '05002', '3', '1'),
('CSE', 'CSE304', 'Saturday', 7, 'B1', '02:30 pm', 'CSE109', '150', '05002', '3', '1'),
('CSE', 'CSE304', 'Sunday', 7, 'A1', '02:30 pm', 'CSE109', '150', '05001', '3', '1'),
('CSE', 'CSE305', 'Monday', 1, 'A', '08:00 am', 'CSE102', '50', '05003', '3', '1'),
('CSE', 'CSE305', 'Saturday', 5, 'B', '12:00 pm', 'CSE109', '50', '05003', '3', '1'),
('CSE', 'CSE305', 'Sunday', 1, 'A', '08:00 am', 'CSE102', '50', '05003', '3', '1'),
('CSE', 'CSE305', 'Sunday', 4, 'B', '11:00 am', 'CSE102', '50', '05003', '3', '1'),
('CSE', 'CSE305', 'Tuesday', 3, 'A', '10:00 am', 'CSE102', '50', '05003', '3', '1'),
('CSE', 'CSE305', 'Tuesday', 1, 'B', '08:00 am', 'CSE102', '50', '05003', '3', '1'),
('CSE', 'CSE307', 'Monday', 4, 'A', '11:00 am', 'CSE102', '50', '05004', '3', '1'),
('CSE', 'CSE307', 'Monday', 5, 'B', '12:00 pm', 'CSE102', '50', '05004', '3', '1'),
('CSE', 'CSE307', 'Saturday', 1, 'A', '08:00 am', 'CSE109', '50', '05004', '3', '1'),
('CSE', 'CSE307', 'Saturday', 4, 'B', '11:00 pm', 'CSE109', '50', '05004', '3', '1'),
('CSE', 'CSE307', 'Sunday', 4, 'A', '11:00 am', 'CSE102', '50', '05004', '3', '1'),
('CSE', 'CSE307', 'Sunday', 5, 'B', '12:00 pm', 'CSE102', '50', '05004', '3', '1'),
('CSE', 'CSE307', 'Wednesday', 1, 'A', '08:00 am', 'CSE102', '50', '05004', '3', '1'),
('CSE', 'CSE307', 'Wednesday', 3, 'B', '10:00 am', 'CSE102', '50', '05004', '3', '1'),
('CSE', 'CSE308', 'Tuesday', 4, 'A1', '11:00 am', 'CSE102', '150', '05004', '3', '1'),
('CSE', 'CSE308', 'Wednesday', 7, 'A2', '02:30 pm', 'CSE109', '150', '05005', '3', '1'),
('CSE', 'CSE308', 'Wednesday', 4, 'B1', '11:00 am', 'CSE109', '150', '05004', '3', '1'),
('CSE', 'CSE309', 'Monday', 2, 'A', '09:00 am', 'CSE102', '50', '05006', '3', '1'),
('CSE', 'CSE309', 'Monday', 3, 'B', '10:00 am', 'CSE102', '50', '05006', '3', '1'),
('CSE', 'CSE309', 'Saturday', 2, 'A', '09:00 am', 'CSE109', '50', '05006', '3', '1'),
('CSE', 'CSE309', 'Saturday', 3, 'B', '10:00 am', 'CSE109', '50', '05006', '3', '1'),
('CSE', 'CSE309', 'Sunday', 2, 'A', '09:00 am', 'CSE102', '50', '05007', '3', '1'),
('CSE', 'CSE309', 'Sunday', 3, 'B', '10:00 am', 'CSE102', '50', '05007', '3', '1'),
('CSE', 'CSE310', 'Saturday', 7, 'A1', '02:30 pm', 'CSE109', '50', '05007', '3', '1'),
('CSE', 'CSE310', 'Tuesday', 4, 'B1', '11:00 am', 'CSE102', '150', '05007', '3', '1'),
('CSE', 'CSE311', 'Monday', 3, 'A', '10:00 am', 'CSE102', '50', '05009', '3', '1'),
('CSE', 'CSE311', 'Monday', 2, 'B', '09:00 am', 'CSE102', '50', '05009', '3', '1'),
('CSE', 'CSE311', 'Saturday', 3, 'A', '10:00 am', 'CSE109', '50', '05010', '3', '1'),
('CSE', 'CSE311', 'Saturday', 2, 'B', '09:00 am', 'CSE109', '50', '05010', '3', '1'),
('CSE', 'CSE311', 'Wednesday', 3, 'A', '10:00 am', 'CSE102', '50', '05009', '3', '1'),
('CSE', 'CSE311', 'Wednesday', 2, 'B', '09:00 am', 'CSE102', '50', '05009', '3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_no` int(11) NOT NULL DEFAULT '0',
  `CourseNo` varchar(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `commentBy` varchar(50) NOT NULL,
  `body` text,
  `status` tinyint(4) NOT NULL,
  `senderType` varchar(25) NOT NULL,
  PRIMARY KEY (`id`,`msg_no`,`CourseNo`),
  KEY `msg_no` (`msg_no`),
  KEY `CourseNo` (`CourseNo`),
  KEY `commentBy` (`commentBy`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=93 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `msg_no`, `CourseNo`, `time`, `commentBy`, `body`, `status`, `senderType`) VALUES
(64, 52, 'CSE309', '2012-09-13 02:52:47', '0805049', 'hi', 1, 'student'),
(65, 52, 'CSE309', '2012-09-13 09:28:37', '0805048', 'kjh', 0, 'student'),
(66, 52, 'CSE309', '2012-09-13 09:30:20', '05008', 'gh', 1, 'teacher'),
(69, 2, 'CSE310', '2012-09-13 04:28:27', '0805048', 'dsfdsf', 1, 'student'),
(70, 3, 'CSE310', '2012-09-13 10:30:59', '0805048', 'dhdf', 0, 'student'),
(71, 3, 'CSE310', '2012-09-13 04:31:24', '0805048', 'vhmjgh', 1, 'student'),
(74, 1, 'CSE300', '2012-09-13 04:35:03', '0805048', 'zdf', 1, 'student'),
(75, 2, 'CSE300', '2012-09-13 10:40:40', '0805048', 'zxcvz', 0, 'student'),
(76, 2, 'CSE300', '2012-09-13 04:40:45', '0805048', 'cbc', 1, 'student'),
(77, 2, 'CSE300', '2012-09-13 11:37:28', '0805049', 'zcfzs', 0, 'student'),
(78, 56, 'CSE309', '2012-09-13 05:28:41', '0805049', 'eryter', 1, 'student'),
(79, 2, 'CSE300', '2012-09-13 05:37:24', '0805049', 'ghjfjfg', 1, 'student'),
(80, 8, 'CSE305', '2012-09-17 12:55:15', '05008', 'i give a comment', 0, 'teacher'),
(81, 8, 'CSE305', '2012-09-17 08:54:11', '05008', 'i give an ther comment', 1, 'teacher'),
(82, 4, 'CSE305', '2012-09-17 08:54:57', '05008', 'Hey arafat', 1, 'teacher'),
(83, 8, 'CSE305', '2012-09-17 08:56:28', '0805048', 'this is my comment', 1, 'student'),
(84, 8, 'CSE305', '2012-09-17 13:17:51', '05008', 'thanks', 0, 'teacher'),
(85, 8, 'CSE305', '2012-09-17 09:17:44', '05008', 'this is comment', 1, 'teacher'),
(86, 2, 'CSE300', '2012-09-18 03:17:59', '05008', 'what', 1, 'teacher'),
(87, 11, 'CSE300', '2012-09-18 03:22:43', '05008', 'i ca n downloasd', 1, 'teacher'),
(88, 6, 'CSE300', '2012-09-27 12:55:00', '05008', 'hello', 0, 'teacher'),
(89, 52, 'CSE309', '2012-09-27 13:31:06', '05001', 'i am sid', 1, 'teacher'),
(90, 9, 'CSE303', '2013-02-23 11:15:44', '05002', 'it is comment', 1, 'teacher'),
(91, 18, 'CSE303', '2013-03-14 09:53:31', '05002', 'this is a comment', 1, 'teacher'),
(92, 18, 'CSE303', '2013-03-14 09:53:43', '05002', 'this is another comment', 1, 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `CourseNo` varchar(10) NOT NULL DEFAULT '',
  `ID` int(12) NOT NULL,
  `Topic` varchar(30) DEFAULT NULL,
  `Description` text,
  `Uploader` varchar(50) DEFAULT NULL,
  `Uploader_ID` varchar(50) NOT NULL,
  `Upload_Time` timestamp NULL DEFAULT NULL,
  `File_Path` varchar(100) DEFAULT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`CourseNo`,`ID`),
  KEY `CourseNo` (`CourseNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`CourseNo`, `ID`, `Topic`, `Description`, `Uploader`, `Uploader_ID`, `Upload_Time`, `File_Path`, `status`) VALUES
('CSE303', 1, 'introduction', 'this is an introductory slide', 'Dr. A.S.M. Latiful Hoque', '05002', '2013-03-14 08:21:28', '052050.PNG', 0),
('CSE303', 2, 'Distributed Database', 'this is about distributed database', 'Dr. A.S.M. Latiful Hoque', '05002', '2013-03-14 08:22:00', 'Feb,2013_L-4,T-1.pdf', 0),
('CSE303', 3, 'sample ppt', '', 'Dr. A.S.M. Latiful Hoque', '05002', '2013-03-14 08:22:20', 'ERD.pptx', 0),
('CSE303', 4, 'Sql', '', 'Dr. A.S.M. Latiful Hoque', '05002', '2013-03-14 08:22:47', 'httpsgithub.comsid-ara-t.txt', 0),
('CSE303', 5, 'Entity relationship diagram', '', 'Dr. A.S.M. Latiful Hoque', '05002', '2013-03-14 08:23:18', 'ERD1.pptx', 0),
('CSE303', 6, 'BCNF', '', 'Dr. A.S.M. Latiful Hoque', '05002', '2013-03-14 08:24:12', 'Feb,2013_L-4,T-11.pdf', 0),
('CSE303', 7, '4NF', '', 'Dr. A.S.M. Latiful Hoque', '05002', '2013-03-14 08:24:35', 'New_Text_Document.txt', 0),
('CSE303', 8, 'B tree', '', 'Dr. A.S.M. Latiful Hoque', '05002', '2013-03-14 08:25:10', '0520501.PNG', 0);

-- --------------------------------------------------------

--
-- Table structure for table `content_archive`
--

CREATE TABLE IF NOT EXISTS `content_archive` (
  `CourseNo` varchar(10) NOT NULL DEFAULT '',
  `ID` varchar(12) NOT NULL DEFAULT '',
  `Topic` varchar(30) DEFAULT NULL,
  `Description` text,
  `Uploader` varchar(50) DEFAULT NULL,
  `Uploader_ID` varchar(50) NOT NULL,
  `Upload_Time` timestamp NULL DEFAULT NULL,
  `File_Path` varchar(100) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `Session` varchar(50) NOT NULL,
  `Timestamp` varchar(50) NOT NULL,
  PRIMARY KEY (`CourseNo`,`ID`,`Session`,`Timestamp`),
  KEY `CourseNo` (`CourseNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `CourseNo` varchar(10) NOT NULL,
  `CourseName` varchar(50) DEFAULT NULL,
  `Dept_ID` varchar(6) DEFAULT NULL,
  `sLevel` int(11) DEFAULT NULL,
  `Term` int(11) DEFAULT NULL,
  `Type` varchar(2) DEFAULT NULL,
  `Curriculam` int(11) DEFAULT NULL,
  `Credit` decimal(4,2) DEFAULT NULL,
  PRIMARY KEY (`CourseNo`),
  KEY `Dept_ID` (`Dept_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseNo`, `CourseName`, `Dept_ID`, `sLevel`, `Term`, `Type`, `Curriculam`, `Credit`) VALUES
('CSE300', 'Technical Writing', 'CSE', 3, 1, 'S', 2005, 0.75),
('CSE303', 'Database', 'CSE', 3, 1, 'TT', 2005, 3.00),
('CSE304', 'Database Sessional', 'CSE', 3, 1, 'S', 2005, 1.50),
('CSE305', 'Computer Architecture', 'CSE', 3, 1, 'TT', 2005, 3.00),
('CSE307', 'Software Engineering', 'CSE', 3, 1, 'TT', 2005, 3.00),
('CSE308', 'Software Engineering Sessional', 'CSE', 3, 1, 'S', 2005, 1.50),
('CSE309', 'Compiler', 'CSE', 3, 1, 'TT', 2005, 3.00),
('CSE310', 'Compiler Sessional', 'CSE', 3, 1, 'S', 2005, 0.75),
('CSE311', 'Data Communication', 'CSE', 3, 1, 'TT', 2005, 3.00),
('CSE321', 'Image Processing', 'CSE', 3, 2, 'TT', 2005, 3.00),
('CSE322', 'Image Processing Sessional', 'CSE', 3, 2, 'S', 2005, 1.50),
('CSE401', 'Simulation', 'CSE', 4, 1, 'TT', 2005, 3.00),
('CSE402', 'Pattern', 'CSE', 4, 1, 'TT', 2005, 3.00);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `Dept_id` varchar(6) NOT NULL,
  `Head_of_dept_id` varchar(6) DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Dept_id`, `Head_of_dept_id`, `Password`, `Name`) VALUES
('CSE', '05002', '1234', 'Computer Science and Engineering.'),
('EEE', '04001', '1234', 'Electrical and Electronics Engineering.');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE IF NOT EXISTS `exam` (
  `CourseNo` varchar(10) NOT NULL DEFAULT '',
  `Sec` varchar(3) NOT NULL DEFAULT '',
  `ID` int(11) NOT NULL,
  `eDate` date DEFAULT NULL,
  `eTime` varchar(7) DEFAULT NULL,
  `Duration` varchar(5) DEFAULT NULL,
  `Location` varchar(15) DEFAULT NULL,
  `eType` char(20) NOT NULL DEFAULT '',
  `Topic` varchar(30) DEFAULT NULL,
  `Syllabus` text NOT NULL,
  `Scheduler_ID` varchar(30) DEFAULT NULL,
  `Percentage` double NOT NULL,
  `Best` int(11) NOT NULL,
  `Total` double NOT NULL,
  PRIMARY KEY (`CourseNo`,`Sec`,`ID`),
  KEY `CourseNo` (`CourseNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`CourseNo`, `Sec`, `ID`, `eDate`, `eTime`, `Duration`, `Location`, `eType`, `Topic`, `Syllabus`, `Scheduler_ID`, `Percentage`, `Best`, `Total`) VALUES
('CSE303', 'A', 1, '2013-03-01', '08:00AM', '20', 'cse-207', 'class_test', '1', '', '05002', 0, 3, 20),
('CSE303', 'A', 2, '2013-03-05', '09:00AM', '20', 'cse-207', 'class_test', '2', 'Chapter 2', '05002', 0, 3, 20),
('CSE303', 'A', 3, '2013-03-15', '10:00AM', '20', 'cse-207', 'class_test', '3', 'chapter 2', '05002', 0, 3, 20),
('CSE303', 'A', 4, '2013-03-27', '01:00AM', '30', 'cse-207', 'class_test', '4', 'chapter 5', '05002', 0, 3, 22),
('CSE303', 'A', 11, '2013-03-01', '12:00PM', '20', 'cse208', 'attendence', '1', '', '05002', 0, 0, 0),
('CSE303', 'B', 5, '2013-03-06', '09:00AM', '30', 'cse-208', 'class_test', '1', 'chapter 2', '05002', 0, 0, 20),
('CSE303', 'B', 6, '2013-03-21', '11:00AM', '30', 'cse-208', 'class_test', '2', 'chapter 4,5,6', '05002', 0, 0, 20),
('CSE303', 'B', 9, '2013-04-04', '08:00AM', '20', 'cse-208', 'class_test', '3', 'chapter 3', '05002', 0, 0, 0),
('CSE303', 'B', 10, '2013-04-10', '12:00AM', '20', 'cse-208', 'class_test', '4', 'chapter 4', '05002', 0, 0, 0),
('CSE304', 'A1', 1, '2013-03-25', '02:30PM', '20', 'iac', 'Online', '1', '', '05002', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `exam_type`
--

CREATE TABLE IF NOT EXISTS `exam_type` (
  `CourseNo` varchar(10) NOT NULL,
  `etype` char(20) NOT NULL,
  `etypename` varchar(30) NOT NULL,
  `Description` text NOT NULL,
  `Marks_Type` varchar(10) NOT NULL,
  `Percentage` double NOT NULL,
  PRIMARY KEY (`CourseNo`,`etype`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_type`
--

INSERT INTO `exam_type` (`CourseNo`, `etype`, `etypename`, `Description`, `Marks_Type`, `Percentage`) VALUES
('CSE303', 'attendence', 'attendence', '', 'Percentage', 10),
('CSE303', 'class_test', 'class test', '4 class test will be taken', 'Percentage', 20),
('CSE303', 'term_final', 'term final', '', 'Percentage', 70),
('CSE304', 'Online', 'Online', '', 'Percentage', 0),
('CSE305', 'class_test', 'class test', '', 'Best', 0);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` int(11) NOT NULL,
  `CourseNo` varchar(10) NOT NULL,
  `topic` varchar(50) NOT NULL,
  `description` text,
  `uploader` varchar(50) NOT NULL,
  `senderType` varchar(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `filename` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`,`CourseNo`),
  KEY `CourseNo` (`CourseNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `file_id`, `CourseNo`, `topic`, `description`, `uploader`, `senderType`, `time`, `filename`, `status`) VALUES
(1, 19, 'CSE303', 'Sample file', 'this is a sample file', '0805049', 'student', '2013-03-14 10:28:07', 'httpsgithub.comsid-ara-tanGitCi.git.txt', 1),
(2, 20, 'CSE303', 'Second file', 'this is another file', '0805049', 'student', '2013-03-14 10:29:14', 'CSE_324_(Software_Development_Sessional)_Outline.docx', 1),
(3, 21, 'CSE303', 'Test', '', '0805049', 'student', '2013-03-14 10:29:37', 'CSE_324__Software_Development_Sessional__Outline.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `file_archive`
--

CREATE TABLE IF NOT EXISTS `file_archive` (
  `Session` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `CourseNo` varchar(10) NOT NULL,
  `topic` varchar(50) NOT NULL,
  `description` text,
  `uploader` varchar(50) NOT NULL,
  `senderType` varchar(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `filename` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `Timestamp` varchar(50) NOT NULL,
  PRIMARY KEY (`Session`,`id`,`CourseNo`,`Timestamp`),
  KEY `CourseNo` (`CourseNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hascourse`
--

CREATE TABLE IF NOT EXISTS `hascourse` (
  `Dept_Id` varchar(6) NOT NULL,
  `course_no` varchar(11) NOT NULL,
  PRIMARY KEY (`Dept_Id`,`course_no`),
  KEY `Dept_Id` (`Dept_Id`,`course_no`),
  KEY `course_no` (`course_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hascourse`
--

INSERT INTO `hascourse` (`Dept_Id`, `course_no`) VALUES
('CSE', 'CSE300'),
('CSE', 'CSE303'),
('CSE', 'CSE305'),
('CSE', 'CSE307');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE IF NOT EXISTS `marks` (
  `CourseNo` varchar(10) NOT NULL,
  `Sec` varchar(3) NOT NULL,
  `Exam_ID` int(11) NOT NULL,
  `S_ID` varchar(10) NOT NULL,
  `Total` double NOT NULL,
  `Marks` double NOT NULL DEFAULT '0',
  `Percentage` double NOT NULL,
  PRIMARY KEY (`CourseNo`,`Sec`,`Exam_ID`,`S_ID`),
  KEY `S_ID` (`S_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`CourseNo`, `Sec`, `Exam_ID`, `S_ID`, `Total`, `Marks`, `Percentage`) VALUES
('CSE303', 'A', 1, '0705049', 20, 18, 0),
('CSE303', 'A', 1, '0805001', 20, 19, 0),
('CSE303', 'A', 1, '0805002', 20, 17, 0),
('CSE303', 'A', 1, '0805003', 20, 20, 0),
('CSE303', 'A', 1, '0805004', 20, 20, 0),
('CSE303', 'A', 1, '0805005', 20, 11, 0),
('CSE303', 'A', 1, '0805006', 20, 12, 0),
('CSE303', 'A', 1, '0805007', 20, 13, 0),
('CSE303', 'A', 1, '0805008', 20, 14, 0),
('CSE303', 'A', 1, '0805009', 20, 0, 0),
('CSE303', 'A', 1, '0805010', 20, 0, 0),
('CSE303', 'A', 1, '0805011', 20, 0, 0),
('CSE303', 'A', 1, '0805012', 20, 0, 0),
('CSE303', 'A', 1, '0805013', 20, 0, 0),
('CSE303', 'A', 1, '0805014', 20, 0, 0),
('CSE303', 'A', 1, '0805015', 20, 0, 0),
('CSE303', 'A', 1, '0805016', 20, 0, 0),
('CSE303', 'A', 1, '0805017', 20, 0, 0),
('CSE303', 'A', 1, '0805018', 20, 0, 0),
('CSE303', 'A', 1, '0805019', 20, 0, 0),
('CSE303', 'A', 1, '0805020', 20, 0, 0),
('CSE303', 'A', 1, '0805021', 20, 0, 0),
('CSE303', 'A', 1, '0805022', 20, 0, 0),
('CSE303', 'A', 1, '0805023', 20, 0, 0),
('CSE303', 'A', 1, '0805024', 20, 0, 0),
('CSE303', 'A', 1, '0805025', 20, 0, 0),
('CSE303', 'A', 1, '0805026', 20, 0, 0),
('CSE303', 'A', 1, '0805027', 20, 0, 0),
('CSE303', 'A', 1, '0805028', 20, 0, 0),
('CSE303', 'A', 1, '0805029', 20, 0, 0),
('CSE303', 'A', 1, '0805030', 20, 0, 0),
('CSE303', 'A', 1, '0805031', 20, 0, 0),
('CSE303', 'A', 1, '0805032', 20, 0, 0),
('CSE303', 'A', 1, '0805033', 20, 0, 0),
('CSE303', 'A', 1, '0805034', 20, 0, 0),
('CSE303', 'A', 1, '0805035', 20, 0, 0),
('CSE303', 'A', 1, '0805036', 20, 0, 0),
('CSE303', 'A', 1, '0805037', 20, 0, 0),
('CSE303', 'A', 1, '0805038', 20, 0, 0),
('CSE303', 'A', 1, '0805039', 20, 0, 0),
('CSE303', 'A', 1, '0805040', 20, 0, 0),
('CSE303', 'A', 1, '0805041', 20, 0, 0),
('CSE303', 'A', 1, '0805042', 20, 0, 0),
('CSE303', 'A', 1, '0805043', 20, 0, 0),
('CSE303', 'A', 1, '0805044', 20, 0, 0),
('CSE303', 'A', 1, '0805045', 20, 0, 0),
('CSE303', 'A', 1, '0805046', 20, 0, 0),
('CSE303', 'A', 1, '0805047', 20, 0, 0),
('CSE303', 'A', 1, '0805048', 20, 0, 0),
('CSE303', 'A', 1, '0805049', 20, 0, 0),
('CSE303', 'A', 1, '0805050', 20, 0, 0),
('CSE303', 'A', 1, '0805051', 20, 0, 0),
('CSE303', 'A', 1, '0805052', 20, 0, 0),
('CSE303', 'A', 1, '0805053', 20, 0, 0),
('CSE303', 'A', 1, '0805054', 20, 0, 0),
('CSE303', 'A', 1, '0805055', 20, 0, 0),
('CSE303', 'A', 1, '0805056', 20, 0, 0),
('CSE303', 'A', 1, '0805057', 20, 0, 0),
('CSE303', 'A', 1, '0805058', 20, 0, 0),
('CSE303', 'A', 1, '0805059', 20, 0, 0),
('CSE303', 'A', 1, '0805060', 20, 0, 0),
('CSE303', 'A', 2, '0705049', 20, 20, 0),
('CSE303', 'A', 2, '0805001', 20, 12, 0),
('CSE303', 'A', 2, '0805002', 20, 13, 0),
('CSE303', 'A', 2, '0805003', 20, 14, 0),
('CSE303', 'A', 2, '0805004', 20, 15, 0),
('CSE303', 'A', 2, '0805005', 20, 0, 0),
('CSE303', 'A', 2, '0805006', 20, 0, 0),
('CSE303', 'A', 2, '0805007', 20, 0, 0),
('CSE303', 'A', 2, '0805008', 20, 0, 0),
('CSE303', 'A', 2, '0805009', 20, 0, 0),
('CSE303', 'A', 2, '0805010', 20, 0, 0),
('CSE303', 'A', 2, '0805011', 20, 0, 0),
('CSE303', 'A', 2, '0805012', 20, 0, 0),
('CSE303', 'A', 2, '0805013', 20, 0, 0),
('CSE303', 'A', 2, '0805014', 20, 0, 0),
('CSE303', 'A', 2, '0805015', 20, 0, 0),
('CSE303', 'A', 2, '0805016', 20, 0, 0),
('CSE303', 'A', 2, '0805017', 20, 0, 0),
('CSE303', 'A', 2, '0805018', 20, 0, 0),
('CSE303', 'A', 2, '0805019', 20, 0, 0),
('CSE303', 'A', 2, '0805020', 20, 0, 0),
('CSE303', 'A', 2, '0805021', 20, 0, 0),
('CSE303', 'A', 2, '0805022', 20, 0, 0),
('CSE303', 'A', 2, '0805023', 20, 0, 0),
('CSE303', 'A', 2, '0805024', 20, 0, 0),
('CSE303', 'A', 2, '0805025', 20, 0, 0),
('CSE303', 'A', 2, '0805026', 20, 0, 0),
('CSE303', 'A', 2, '0805027', 20, 0, 0),
('CSE303', 'A', 2, '0805028', 20, 0, 0),
('CSE303', 'A', 2, '0805029', 20, 0, 0),
('CSE303', 'A', 2, '0805030', 20, 0, 0),
('CSE303', 'A', 2, '0805031', 20, 0, 0),
('CSE303', 'A', 2, '0805032', 20, 0, 0),
('CSE303', 'A', 2, '0805033', 20, 0, 0),
('CSE303', 'A', 2, '0805034', 20, 0, 0),
('CSE303', 'A', 2, '0805035', 20, 0, 0),
('CSE303', 'A', 2, '0805036', 20, 0, 0),
('CSE303', 'A', 2, '0805037', 20, 0, 0),
('CSE303', 'A', 2, '0805038', 20, 0, 0),
('CSE303', 'A', 2, '0805039', 20, 0, 0),
('CSE303', 'A', 2, '0805040', 20, 0, 0),
('CSE303', 'A', 2, '0805041', 20, 0, 0),
('CSE303', 'A', 2, '0805042', 20, 0, 0),
('CSE303', 'A', 2, '0805043', 20, 0, 0),
('CSE303', 'A', 2, '0805044', 20, 0, 0),
('CSE303', 'A', 2, '0805045', 20, 0, 0),
('CSE303', 'A', 2, '0805046', 20, 0, 0),
('CSE303', 'A', 2, '0805047', 20, 0, 0),
('CSE303', 'A', 2, '0805048', 20, 0, 0),
('CSE303', 'A', 2, '0805049', 20, 0, 0),
('CSE303', 'A', 2, '0805050', 20, 0, 0),
('CSE303', 'A', 2, '0805051', 20, 0, 0),
('CSE303', 'A', 2, '0805052', 20, 0, 0),
('CSE303', 'A', 2, '0805053', 20, 0, 0),
('CSE303', 'A', 2, '0805054', 20, 0, 0),
('CSE303', 'A', 2, '0805055', 20, 0, 0),
('CSE303', 'A', 2, '0805056', 20, 0, 0),
('CSE303', 'A', 2, '0805057', 20, 0, 0),
('CSE303', 'A', 2, '0805058', 20, 0, 0),
('CSE303', 'A', 2, '0805059', 20, 0, 0),
('CSE303', 'A', 2, '0805060', 20, 0, 0),
('CSE303', 'A', 3, '0705049', 20, 10, 0),
('CSE303', 'A', 3, '0805001', 20, 20, 0),
('CSE303', 'A', 3, '0805002', 20, 11, 0),
('CSE303', 'A', 3, '0805003', 20, 12, 0),
('CSE303', 'A', 3, '0805004', 20, 15, 0),
('CSE303', 'A', 3, '0805005', 20, 18, 0),
('CSE303', 'A', 3, '0805006', 20, 14, 0),
('CSE303', 'A', 3, '0805007', 20, 0, 0),
('CSE303', 'A', 3, '0805008', 20, 0, 0),
('CSE303', 'A', 3, '0805009', 20, 0, 0),
('CSE303', 'A', 3, '0805010', 20, 0, 0),
('CSE303', 'A', 3, '0805011', 20, 0, 0),
('CSE303', 'A', 3, '0805012', 20, 0, 0),
('CSE303', 'A', 3, '0805013', 20, 0, 0),
('CSE303', 'A', 3, '0805014', 20, 0, 0),
('CSE303', 'A', 3, '0805015', 20, 0, 0),
('CSE303', 'A', 3, '0805016', 20, 0, 0),
('CSE303', 'A', 3, '0805017', 20, 0, 0),
('CSE303', 'A', 3, '0805018', 20, 0, 0),
('CSE303', 'A', 3, '0805019', 20, 0, 0),
('CSE303', 'A', 3, '0805020', 20, 0, 0),
('CSE303', 'A', 3, '0805021', 20, 0, 0),
('CSE303', 'A', 3, '0805022', 20, 0, 0),
('CSE303', 'A', 3, '0805023', 20, 0, 0),
('CSE303', 'A', 3, '0805024', 20, 0, 0),
('CSE303', 'A', 3, '0805025', 20, 0, 0),
('CSE303', 'A', 3, '0805026', 20, 0, 0),
('CSE303', 'A', 3, '0805027', 20, 0, 0),
('CSE303', 'A', 3, '0805028', 20, 0, 0),
('CSE303', 'A', 3, '0805029', 20, 0, 0),
('CSE303', 'A', 3, '0805030', 20, 0, 0),
('CSE303', 'A', 3, '0805031', 20, 0, 0),
('CSE303', 'A', 3, '0805032', 20, 0, 0),
('CSE303', 'A', 3, '0805033', 20, 0, 0),
('CSE303', 'A', 3, '0805034', 20, 0, 0),
('CSE303', 'A', 3, '0805035', 20, 0, 0),
('CSE303', 'A', 3, '0805036', 20, 0, 0),
('CSE303', 'A', 3, '0805037', 20, 0, 0),
('CSE303', 'A', 3, '0805038', 20, 0, 0),
('CSE303', 'A', 3, '0805039', 20, 0, 0),
('CSE303', 'A', 3, '0805040', 20, 0, 0),
('CSE303', 'A', 3, '0805041', 20, 0, 0),
('CSE303', 'A', 3, '0805042', 20, 0, 0),
('CSE303', 'A', 3, '0805043', 20, 0, 0),
('CSE303', 'A', 3, '0805044', 20, 0, 0),
('CSE303', 'A', 3, '0805045', 20, 0, 0),
('CSE303', 'A', 3, '0805046', 20, 0, 0),
('CSE303', 'A', 3, '0805047', 20, 0, 0),
('CSE303', 'A', 3, '0805048', 20, 0, 0),
('CSE303', 'A', 3, '0805049', 20, 0, 0),
('CSE303', 'A', 3, '0805050', 20, 0, 0),
('CSE303', 'A', 3, '0805051', 20, 0, 0),
('CSE303', 'A', 3, '0805052', 20, 0, 0),
('CSE303', 'A', 3, '0805053', 20, 0, 0),
('CSE303', 'A', 3, '0805054', 20, 0, 0),
('CSE303', 'A', 3, '0805055', 20, 0, 0),
('CSE303', 'A', 3, '0805056', 20, 0, 0),
('CSE303', 'A', 3, '0805057', 20, 0, 0),
('CSE303', 'A', 3, '0805058', 20, 0, 0),
('CSE303', 'A', 3, '0805059', 20, 0, 0),
('CSE303', 'A', 3, '0805060', 20, 0, 0),
('CSE303', 'A', 4, '0705049', 20, 16, 0),
('CSE303', 'A', 4, '0805001', 20, 14, 0),
('CSE303', 'A', 4, '0805002', 20, 17, 0),
('CSE303', 'A', 4, '0805003', 20, 18, 0),
('CSE303', 'A', 4, '0805004', 20, 19, 0),
('CSE303', 'A', 4, '0805005', 20, 20, 0),
('CSE303', 'A', 4, '0805006', 20, 11, 0),
('CSE303', 'A', 4, '0805007', 20, 12, 0),
('CSE303', 'A', 4, '0805008', 20, 0, 0),
('CSE303', 'A', 4, '0805009', 20, 0, 0),
('CSE303', 'A', 4, '0805010', 20, 0, 0),
('CSE303', 'A', 4, '0805011', 20, 0, 0),
('CSE303', 'A', 4, '0805012', 20, 0, 0),
('CSE303', 'A', 4, '0805013', 20, 0, 0),
('CSE303', 'A', 4, '0805014', 20, 0, 0),
('CSE303', 'A', 4, '0805015', 20, 0, 0),
('CSE303', 'A', 4, '0805016', 20, 0, 0),
('CSE303', 'A', 4, '0805017', 20, 0, 0),
('CSE303', 'A', 4, '0805018', 20, 0, 0),
('CSE303', 'A', 4, '0805019', 20, 0, 0),
('CSE303', 'A', 4, '0805020', 20, 0, 0),
('CSE303', 'A', 4, '0805021', 20, 0, 0),
('CSE303', 'A', 4, '0805022', 20, 0, 0),
('CSE303', 'A', 4, '0805023', 20, 0, 0),
('CSE303', 'A', 4, '0805024', 20, 0, 0),
('CSE303', 'A', 4, '0805025', 20, 0, 0),
('CSE303', 'A', 4, '0805026', 20, 0, 0),
('CSE303', 'A', 4, '0805027', 20, 0, 0),
('CSE303', 'A', 4, '0805028', 20, 0, 0),
('CSE303', 'A', 4, '0805029', 20, 0, 0),
('CSE303', 'A', 4, '0805030', 20, 0, 0),
('CSE303', 'A', 4, '0805031', 20, 0, 0),
('CSE303', 'A', 4, '0805032', 20, 0, 0),
('CSE303', 'A', 4, '0805033', 20, 0, 0),
('CSE303', 'A', 4, '0805034', 20, 0, 0),
('CSE303', 'A', 4, '0805035', 20, 0, 0),
('CSE303', 'A', 4, '0805036', 20, 0, 0),
('CSE303', 'A', 4, '0805037', 20, 0, 0),
('CSE303', 'A', 4, '0805038', 20, 0, 0),
('CSE303', 'A', 4, '0805039', 20, 0, 0),
('CSE303', 'A', 4, '0805040', 20, 0, 0),
('CSE303', 'A', 4, '0805041', 20, 0, 0),
('CSE303', 'A', 4, '0805042', 20, 0, 0),
('CSE303', 'A', 4, '0805043', 20, 0, 0),
('CSE303', 'A', 4, '0805044', 20, 0, 0),
('CSE303', 'A', 4, '0805045', 20, 0, 0),
('CSE303', 'A', 4, '0805046', 20, 0, 0),
('CSE303', 'A', 4, '0805047', 20, 0, 0),
('CSE303', 'A', 4, '0805048', 20, 0, 0),
('CSE303', 'A', 4, '0805049', 20, 0, 0),
('CSE303', 'A', 4, '0805050', 20, 0, 0),
('CSE303', 'A', 4, '0805051', 20, 0, 0),
('CSE303', 'A', 4, '0805052', 20, 0, 0),
('CSE303', 'A', 4, '0805053', 20, 0, 0),
('CSE303', 'A', 4, '0805054', 20, 0, 0),
('CSE303', 'A', 4, '0805055', 20, 0, 0),
('CSE303', 'A', 4, '0805056', 20, 0, 0),
('CSE303', 'A', 4, '0805057', 20, 0, 0),
('CSE303', 'A', 4, '0805058', 20, 0, 0),
('CSE303', 'A', 4, '0805059', 20, 0, 0),
('CSE303', 'A', 4, '0805060', 20, 0, 0),
('CSE303', 'B', 5, '0805061', 20, 20, 0),
('CSE303', 'B', 5, '0805062', 20, 20, 0),
('CSE303', 'B', 5, '0805063', 20, 11, 0),
('CSE303', 'B', 5, '0805064', 20, 10, 0),
('CSE303', 'B', 5, '0805065', 20, 15, 0),
('CSE303', 'B', 5, '0805066', 20, 18, 0),
('CSE303', 'B', 5, '0805067', 20, 16, 0),
('CSE303', 'B', 5, '0805068', 20, 0, 0),
('CSE303', 'B', 5, '0805069', 20, 0, 0),
('CSE303', 'B', 5, '0805070', 20, 0, 0),
('CSE303', 'B', 5, '0805071', 20, 0, 0),
('CSE303', 'B', 5, '0805072', 20, 0, 0),
('CSE303', 'B', 5, '0805073', 20, 0, 0),
('CSE303', 'B', 5, '0805074', 20, 0, 0),
('CSE303', 'B', 5, '0805075', 20, 0, 0),
('CSE303', 'B', 5, '0805076', 20, 0, 0),
('CSE303', 'B', 5, '0805077', 20, 0, 0),
('CSE303', 'B', 5, '0805078', 20, 0, 0),
('CSE303', 'B', 5, '0805079', 20, 0, 0),
('CSE303', 'B', 5, '0805080', 20, 0, 0),
('CSE303', 'B', 5, '0805081', 20, 0, 0),
('CSE303', 'B', 5, '0805082', 20, 0, 0),
('CSE303', 'B', 5, '0805083', 20, 0, 0),
('CSE303', 'B', 5, '0805084', 20, 0, 0),
('CSE303', 'B', 5, '0805085', 20, 0, 0),
('CSE303', 'B', 5, '0805086', 20, 0, 0),
('CSE303', 'B', 5, '0805087', 20, 0, 0),
('CSE303', 'B', 5, '0805088', 20, 0, 0),
('CSE303', 'B', 5, '0805089', 20, 0, 0),
('CSE303', 'B', 5, '0805090', 20, 0, 0),
('CSE303', 'B', 5, '0805091', 20, 0, 0),
('CSE303', 'B', 5, '0805092', 20, 0, 0),
('CSE303', 'B', 5, '0805093', 20, 0, 0),
('CSE303', 'B', 5, '0805094', 20, 0, 0),
('CSE303', 'B', 5, '0805095', 20, 0, 0),
('CSE303', 'B', 5, '0805096', 20, 0, 0),
('CSE303', 'B', 5, '0805097', 20, 0, 0),
('CSE303', 'B', 5, '0805098', 20, 0, 0),
('CSE303', 'B', 5, '0805099', 20, 0, 0),
('CSE303', 'B', 5, '0805100', 20, 0, 0),
('CSE303', 'B', 5, '0805101', 20, 0, 0),
('CSE303', 'B', 5, '0805102', 20, 0, 0),
('CSE303', 'B', 5, '0805103', 20, 0, 0),
('CSE303', 'B', 5, '0805104', 20, 0, 0),
('CSE303', 'B', 5, '0805105', 20, 0, 0),
('CSE303', 'B', 5, '0805106', 20, 0, 0),
('CSE303', 'B', 5, '0805107', 20, 0, 0),
('CSE303', 'B', 5, '0805108', 20, 0, 0),
('CSE303', 'B', 5, '0805109', 20, 0, 0),
('CSE303', 'B', 5, '0805110', 20, 0, 0),
('CSE303', 'B', 5, '0805111', 20, 0, 0),
('CSE303', 'B', 5, '0805112', 20, 0, 0),
('CSE303', 'B', 5, '0805113', 20, 0, 0),
('CSE303', 'B', 5, '0805114', 20, 0, 0),
('CSE303', 'B', 5, '0805115', 20, 0, 0),
('CSE303', 'B', 5, '0805116', 20, 0, 0),
('CSE303', 'B', 5, '0805117', 20, 0, 0),
('CSE303', 'B', 5, '0805118', 20, 0, 0),
('CSE303', 'B', 5, '0805119', 20, 0, 0),
('CSE303', 'B', 5, '0805120', 20, 0, 0),
('CSE303', 'B', 6, '0805061', 20, 20, 0),
('CSE303', 'B', 6, '0805062', 20, 20, 0),
('CSE303', 'B', 6, '0805063', 20, 12, 0),
('CSE303', 'B', 6, '0805064', 20, 13, 0),
('CSE303', 'B', 6, '0805065', 20, 14, 0),
('CSE303', 'B', 6, '0805066', 20, 15, 0),
('CSE303', 'B', 6, '0805067', 20, 16, 0),
('CSE303', 'B', 6, '0805068', 20, 17, 0),
('CSE303', 'B', 6, '0805069', 20, 18, 0),
('CSE303', 'B', 6, '0805070', 20, 19, 0),
('CSE303', 'B', 6, '0805071', 20, 0, 0),
('CSE303', 'B', 6, '0805072', 20, 0, 0),
('CSE303', 'B', 6, '0805073', 20, 0, 0),
('CSE303', 'B', 6, '0805074', 20, 0, 0),
('CSE303', 'B', 6, '0805075', 20, 0, 0),
('CSE303', 'B', 6, '0805076', 20, 0, 0),
('CSE303', 'B', 6, '0805077', 20, 0, 0),
('CSE303', 'B', 6, '0805078', 20, 0, 0),
('CSE303', 'B', 6, '0805079', 20, 0, 0),
('CSE303', 'B', 6, '0805080', 20, 0, 0),
('CSE303', 'B', 6, '0805081', 20, 0, 0),
('CSE303', 'B', 6, '0805082', 20, 0, 0),
('CSE303', 'B', 6, '0805083', 20, 0, 0),
('CSE303', 'B', 6, '0805084', 20, 0, 0),
('CSE303', 'B', 6, '0805085', 20, 0, 0),
('CSE303', 'B', 6, '0805086', 20, 0, 0),
('CSE303', 'B', 6, '0805087', 20, 0, 0),
('CSE303', 'B', 6, '0805088', 20, 0, 0),
('CSE303', 'B', 6, '0805089', 20, 0, 0),
('CSE303', 'B', 6, '0805090', 20, 0, 0),
('CSE303', 'B', 6, '0805091', 20, 0, 0),
('CSE303', 'B', 6, '0805092', 20, 0, 0),
('CSE303', 'B', 6, '0805093', 20, 0, 0),
('CSE303', 'B', 6, '0805094', 20, 0, 0),
('CSE303', 'B', 6, '0805095', 20, 0, 0),
('CSE303', 'B', 6, '0805096', 20, 0, 0),
('CSE303', 'B', 6, '0805097', 20, 0, 0),
('CSE303', 'B', 6, '0805098', 20, 0, 0),
('CSE303', 'B', 6, '0805099', 20, 0, 0),
('CSE303', 'B', 6, '0805100', 20, 0, 0),
('CSE303', 'B', 6, '0805101', 20, 0, 0),
('CSE303', 'B', 6, '0805102', 20, 0, 0),
('CSE303', 'B', 6, '0805103', 20, 0, 0),
('CSE303', 'B', 6, '0805104', 20, 0, 0),
('CSE303', 'B', 6, '0805105', 20, 0, 0),
('CSE303', 'B', 6, '0805106', 20, 0, 0),
('CSE303', 'B', 6, '0805107', 20, 0, 0),
('CSE303', 'B', 6, '0805108', 20, 0, 0),
('CSE303', 'B', 6, '0805109', 20, 0, 0),
('CSE303', 'B', 6, '0805110', 20, 0, 0),
('CSE303', 'B', 6, '0805111', 20, 0, 0),
('CSE303', 'B', 6, '0805112', 20, 0, 0),
('CSE303', 'B', 6, '0805113', 20, 0, 0),
('CSE303', 'B', 6, '0805114', 20, 0, 0),
('CSE303', 'B', 6, '0805115', 20, 0, 0),
('CSE303', 'B', 6, '0805116', 20, 0, 0),
('CSE303', 'B', 6, '0805117', 20, 0, 0),
('CSE303', 'B', 6, '0805118', 20, 0, 0),
('CSE303', 'B', 6, '0805119', 20, 0, 0),
('CSE303', 'B', 6, '0805120', 20, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `marks_archive`
--

CREATE TABLE IF NOT EXISTS `marks_archive` (
  `marks_archive_id` int(11) NOT NULL AUTO_INCREMENT,
  `Session` varchar(50) NOT NULL,
  `CourseNo` varchar(10) NOT NULL,
  `Sec` varchar(3) NOT NULL,
  `Exam_ID` int(11) NOT NULL,
  `S_ID` varchar(10) NOT NULL,
  `Total` double NOT NULL,
  `Marks` double NOT NULL,
  `Percentage` double NOT NULL,
  PRIMARY KEY (`marks_archive_id`,`Session`,`CourseNo`,`Sec`,`Exam_ID`,`S_ID`),
  KEY `S_ID` (`S_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=133 ;

--
-- Dumping data for table `marks_archive`
--

INSERT INTO `marks_archive` (`marks_archive_id`, `Session`, `CourseNo`, `Sec`, `Exam_ID`, `S_ID`, `Total`, `Marks`, `Percentage`) VALUES
(119, '', 'CSE303', 'A', 12, '0805048', 10, 7, 0),
(120, '', 'CSE303', 'A', 12, '0805049', 10, 5, 0),
(121, '', 'CSE304', 'A1', 1, '0805001', 10, 10, 0),
(122, '', 'CSE304', 'A1', 1, '0805002', 10, 9, 0),
(123, '', 'CSE304', 'A1', 2, '0805001', 20, 15, 0),
(124, '', 'CSE304', 'A1', 2, '0805002', 20, 16, 0),
(125, '', 'CSE304', 'A1', 3, '0805001', 50, 40, 0),
(126, '', 'CSE304', 'A1', 3, '0805002', 50, 38.5, 0),
(127, '', 'CSE304', 'A1', 4, '0805001', 100, 80, 0),
(128, '', 'CSE304', 'A1', 4, '0805002', 100, 78, 0),
(129, '', 'CSE304', 'A1', 5, '0805001', 20, 15, 0),
(130, '', 'CSE304', 'A1', 5, '0805002', 20, 18, 0),
(131, '', 'CSE304', 'A1', 6, '0805001', 100, 90, 0),
(132, '', 'CSE304', 'A1', 6, '0805002', 100, 92, 0);

-- --------------------------------------------------------

--
-- Table structure for table `message_group_student`
--

CREATE TABLE IF NOT EXISTS `message_group_student` (
  `CourseNo` varchar(10) NOT NULL DEFAULT '',
  `MessageNo` int(11) NOT NULL DEFAULT '0',
  `mTime` timestamp NULL DEFAULT NULL,
  `SenderInfo` varchar(50) DEFAULT NULL,
  `senderType` varchar(25) DEFAULT NULL,
  `Subject` varchar(20) DEFAULT NULL,
  `mBody` text,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`CourseNo`,`MessageNo`),
  KEY `CourseNo` (`CourseNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_group_student`
--

INSERT INTO `message_group_student` (`CourseNo`, `MessageNo`, `mTime`, `SenderInfo`, `senderType`, `Subject`, `mBody`, `status`) VALUES
('CSE300', 1, '2012-09-13 04:35:37', '0805048', 'student', 'hkjkhk', 'hjk', 1),
('CSE300', 3, '2012-09-16 03:23:26', '0805048', 'student', 'Hello world', 'Hi <br />\r\n:) looser', 1),
('CSE300', 4, '2012-09-16 03:53:29', '0805049', 'student', 'Latex', 'what is that ', 1),
('CSE300', 5, '2012-09-16 03:53:43', '0805049', 'student', 'Miktex', 'asdf', 1),
('CSE300', 6, '2012-09-16 03:54:09', '0805049', 'student', 'Winedit', 'winedit is the editor', 1),
('CSE300', 7, '2012-09-17 08:05:06', '05008', 'teacher', 'Hello', 'This is my first message<br />\r\nin this group', 0),
('CSE300', 8, '2012-09-17 08:05:51', '05008', 'teacher', 'Hello', 'This is message', 0),
('CSE300', 9, '2012-09-17 08:11:16', '05008', 'teacher', 'delete this', 'as', 0),
('CSE300', 10, '2012-09-17 08:13:42', '05008', 'teacher', 'Ss', 'sdf', 0),
('CSE303', 1, '2012-10-10 15:13:10', '0805048', 'student', 'checking pre', '        <table><br />\r\n            <tr><br />\r\n                <td>ID:</td><br />\r\n                <td>&lt;?php echo form_input(ID,set_value(ID));?&gt;</td><br />\r\n            </tr><br />\r\n            <tr><br />\r\n                <td>Password:</td><br />\r\n                <td>&lt;?php echo form_password(password);?&gt;</td><br />\r\n            </tr><br />\r\n            <tr><br />\r\n                <td></td><br />\r\n                <td>&lt;?php echo form_submit(submit,LOGIN);?&gt;</td><br />\r\n            </tr><br />\r\n        </table>', 0),
('CSE303', 3, '2012-10-14 08:23:33', '05002', 'teacher', 'sdf', 'sf', 0),
('CSE303', 4, '2013-02-21 02:46:58', '05002', 'teacher', 'Hello', 'hello buddy', 1),
('CSE303', 5, '2013-02-21 05:38:31', '05002', 'teacher', 'fdg', 'sfdg', 0),
('CSE303', 6, '2013-02-23 11:13:22', '05002', 'teacher', 'Hello', 'Hi buddy', 1),
('CSE303', 7, '2013-02-23 11:13:44', '05002', 'teacher', 'Hi guys', 'So what are u doing', 1),
('CSE303', 8, '2013-02-23 11:14:02', '05002', 'teacher', 'About thesis', 'Thesis is hard', 1),
('CSE303', 9, '2013-02-23 11:14:10', '05002', 'teacher', 'Well', 'buddy', 1),
('CSE303', 10, '2013-03-06 12:52:02', '05002', 'teacher', 'Format', 'int main(){<br />\r\n     int x;<br />\r\n     int y;<br />\r\n     return 0;<br />\r\n}', 1),
('CSE303', 11, '2013-03-07 23:49:09', '05002', 'teacher', 'adf', 'df', 1),
('CSE303', 12, '2013-03-07 23:49:13', '05002', 'teacher', 'fdf', 'dfasfd', 1),
('CSE303', 13, '2013-03-07 23:49:16', '05002', 'teacher', 'fsadfd', 'dsfdsaf', 1),
('CSE303', 14, '2013-03-07 23:49:20', '05002', 'teacher', 'fasdf', 'sadfasdfasdfasdf', 1),
('CSE303', 15, '2013-03-07 23:49:24', '05002', 'teacher', 'adfadsf', 'dsfasdfdasfdsafadsf', 1),
('CSE303', 16, '2013-03-07 23:49:27', '05002', 'teacher', 'fadsaf', 'dfadsfdf', 1),
('CSE303', 17, '2013-03-07 23:49:30', '05002', 'teacher', 'adsfadsf', 'dfdasfa', 1),
('CSE303', 18, '2013-03-12 13:46:02', '0805048', 'student', 'Notify this', 'sadf', 1),
('CSE304', 1, '2013-02-23 11:14:24', '05002', 'teacher', 'Sessional', 'so what', 1),
('CSE304', 2, '2013-02-23 11:14:47', '05002', 'teacher', 'Again', 'It is database sessional', 1),
('CSE304', 3, '2013-02-23 11:17:43', '05002', 'teacher', 'Post another ', 'message', 1),
('CSE304', 4, '2013-02-23 11:18:07', '05002', 'teacher', 'Another', 'so what', 1),
('CSE304', 5, '2013-02-23 11:18:51', '05002', 'teacher', 'Okay ', 'dude', 1),
('CSE304', 6, '2013-03-05 10:31:54', '0805001', 'student', '??????', 'sfsaf', 1),
('CSE305', 1, '2012-09-16 03:23:57', '0805048', 'student', 'Arch', 'It is a boss subj', 1),
('CSE305', 2, '2012-09-16 03:51:15', '0805048', 'student', 'interrupt', 'interrupt<br />\r\ninterrupt<br />\r\n  so what', 1),
('CSE305', 3, '2012-09-16 03:51:43', '0805048', 'student', 'Arafat', 'arafat imtiaz', 1),
('CSE305', 4, '2012-09-16 03:51:58', '0805048', 'student', 'imtiaz', 'arafat imtiaz', 1),
('CSE305', 5, '2012-09-16 03:52:36', '0805048', 'student', 'Buet', 'bangladesh university of engineering and tecnology', 1),
('CSE305', 6, '2012-09-16 03:59:13', '0805049', 'student', 'This is tanzir', 'from titumir hall', 1),
('CSE305', 7, '2012-09-16 03:59:43', '0805049', 'student', 'Buetian', 'from cse ', 1),
('CSE305', 8, '2012-09-17 08:27:45', '05008', 'teacher', 'hello', 'arafat', 1),
('CSE305', 9, '2013-02-25 07:09:55', '05008', 'teacher', 'hell', 'hh', 1),
('CSE309', 50, '2012-09-13 02:23:30', '0805049', 'student', 'fggggg', 'dfgdfgdf', 1),
('CSE309', 51, '2012-09-13 02:35:34', '0805049', 'student', 'wer', 'fs', 1),
('CSE309', 52, '2012-09-13 08:37:32', '05001', 'teacher', 'ase', 'aer', 1),
('CSE309', 53, '2012-09-13 03:26:05', '0805048', 'student', 'k[', '[k]i][', 0),
('CSE309', 54, '2012-09-13 03:30:39', '0805048', 'student', 'sdg', 'dfgd', 1),
('CSE309', 55, '2012-09-13 03:30:47', '0805048', 'student', 'dgfdg', 'gdggdfgdfgjdmu,krjythn', 1),
('CSE309', 56, '2012-09-13 03:30:53', '0805048', 'student', 'ya hello', 'dfg', 1),
('CSE310', 2, '2012-09-13 04:28:23', '0805048', 'student', 'aedaw', 'ewqeqweqwe', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `member_type` varchar(50) CHARACTER SET latin1 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `material` varchar(50) CHARACTER SET latin1 NOT NULL,
  `material_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `material_name` varchar(50) NOT NULL,
  `material_detail` varchar(50) NOT NULL DEFAULT '',
  `material_extra_info` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=245 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `member_id`, `member_type`, `date`, `material`, `material_id`, `material_name`, `material_detail`, `material_extra_info`, `status`) VALUES
(169, '05002', 'teacher', '2013-03-01 08:09:44', 'marks', 'CSE303', '14', 'A', 'updated', 1),
(170, '05002', 'teacher', '2013-03-01 08:08:56', 'marks', 'CSE303', '6', 'B', 'uploaded', 1),
(171, '05002', 'teacher', '2013-03-01 14:11:29', 'content', 'CSE303', '9', '', 'xv:Untitled.png', 0),
(172, '05002', 'teacher', '2013-03-01 14:12:46', 'message', 'CSE303', '12', '', 'zxc', 0),
(178, '0805049', 'student', '2013-03-03 08:48:31', 'comment', 'CSE309', '65', '', 'wd', 0),
(179, '0805049', 'student', '2013-03-01 08:34:00', 'comment', 'CSE309', '61', '', 'cxzcdd', 1),
(180, '0805049', 'student', '2013-03-01 08:36:07', 'comment', 'CSE309', '61', '', 'vvvvv', 1),
(181, '0805049', 'student', '2013-03-01 08:44:32', 'comment', 'CSE309', '60', '', 'dgf', 1),
(182, '0805049', 'student', '2013-03-01 08:44:50', 'comment', 'CSE309', '60', '', 'fd', 1),
(183, '0805049', 'student', '2013-03-01 08:45:25', 'comment', 'CSE309', '59', '', 'sdfds', 1),
(184, '0805049', 'student', '2013-03-01 08:45:57', 'comment', 'CSE309', '59', '', 'zx', 1),
(185, '05001', 'teacher', '2013-03-02 13:57:09', 'message', 'CSE309', '67', '', 'z', 1),
(186, '0805049', 'student', '2013-03-02 14:09:17', 'file', 'CSE309', '68', '', '154551_453144848035043_232344810115049_1915843_176', 1),
(187, '05001', 'teacher', '2013-03-02 14:11:36', 'exam', 'CSE309', '8', 'B', '01:00AM 2013-03-26', 1),
(188, '05001', 'teacher', '2013-03-03 00:05:30', 'exam', 'CSE309', '9', 'A', '10:00AM 2013-08-18', 1),
(189, '05001', 'teacher', '2013-03-03 00:17:52', 'comment', 'CSE309', '67', '', 'no', 1),
(190, '05001', 'teacher', '2013-03-03 00:18:58', 'content', 'CSE309', '4', '', 'sdsds:5692_1132136668208_13710.jpg', 1),
(191, '0805063', 'student', '2013-03-03 00:19:57', 'file', 'CSE300', '12', '', '154551_453144848035043_232344810115049_1915843_176', 1),
(192, '0805063', 'student', '2013-03-03 00:20:37', 'comment', 'CSE300', '12', '', 'dsdf', 1),
(193, '0805063', 'student', '2013-03-03 00:20:58', 'comment', 'CSE300', '6', '', 'dsds', 1),
(194, '0805049', 'student', '2013-03-03 14:43:27', 'comment', 'CSE309', '67', '', ':)', 1),
(195, '0805049', 'student', '2013-03-03 15:28:55', 'comment', 'CSE309', '67', '', '', 1),
(196, '0805049', 'student', '2013-03-03 15:29:05', 'comment', 'CSE309', '67', '', 'r', 1),
(197, '0805049', 'student', '2013-03-03 15:29:54', 'comment', 'CSE309', '67', '', 'r --delete table comment;', 1),
(198, '0805049', 'student', '2013-03-03 15:32:25', 'file', 'CSE309', '69', '', 'profile_valid.js', 1),
(199, '0805049', 'student', '2013-03-04 14:02:54', 'file', 'CSE300', '13', '', 'TF1_(11).jpg', 1),
(200, '0805049', 'student', '2013-03-04 14:08:26', 'file', 'CSE307', '1', '', 'TF1_(11).jpg', 1),
(201, '0805049', 'student', '2013-03-04 14:09:10', 'file', 'CSE308', '3', '', 'TF1_(5).jpg', 1),
(202, '0805049', 'student', '2013-03-04 14:39:35', 'file', 'CSE309', '70', '', 'TF1_(6).jpg', 1),
(203, '05002', 'teacher', '2013-03-05 00:07:52', 'message', 'CSE303', '13', '', 'abc', 1),
(204, '05002', 'teacher', '2013-03-05 00:09:15', 'exam', 'CSE303', '15', 'A', '01:00AM 2013-03-20', 1),
(205, '05002', 'teacher', '2013-03-05 00:24:24', 'exam', 'CSE304', '9', 'A1', '01:00AM 2013-03-20', 1),
(206, '05002', 'teacher', '2013-03-05 00:42:18', 'content', 'CSE304', '1', '', '1:Course_Content.pdf', 1),
(207, '05002', 'teacher', '2013-03-05 23:07:52', 'exam', 'CSE304', '10', 'A1', '01:00PM 2013-03-20', 1),
(208, '05002', 'teacher', '2013-03-05 23:09:37', 'exam', 'CSE304', '11', 'A1', '01:00AM 2013-03-07', 1),
(209, '05002', 'teacher', '2013-03-05 23:12:00', 'comment', 'CSE303', '13', '', 'qw', 1),
(210, '0805048', 'student', '2013-03-05 23:17:18', 'comment', 'CSE303', '13', '', 'a', 1),
(211, '05002', 'teacher', '2013-03-12 13:16:28', 'content', 'CSE303', '1', '', 'Upload it:536693_187942397989791_1.jpg', 1),
(212, '05002', 'teacher', '2013-03-12 18:19:27', 'exam', 'CSE303', '4', 'A', '01:00AM 2013-03-20', 0),
(213, '0805048', 'student', '2013-03-12 13:46:02', 'message', 'CSE303', '18', '', 'Notify this', 1),
(214, '05002', 'teacher', '2013-03-14 13:03:39', 'exam', 'CSE303', '1', 'A', '08:00AM 2013-03-01', 1),
(215, '05002', 'teacher', '2013-03-14 13:04:29', 'exam', 'CSE303', '2', 'A', '09:00AM 2013-03-05', 1),
(216, '05002', 'teacher', '2013-03-14 13:05:28', 'exam', 'CSE303', '3', 'A', '10:00AM 2013-03-15', 1),
(217, '05002', 'teacher', '2013-03-14 13:05:54', 'exam', 'CSE303', '4', 'A', '01:00AM 2013-03-27', 1),
(218, '05002', 'teacher', '2013-03-14 13:06:25', 'exam', 'CSE303', '5', 'B', '09:00AM 2013-03-06', 1),
(219, '05002', 'teacher', '2013-03-14 13:07:00', 'exam', 'CSE303', '6', 'B', '11:00AM 2013-03-21', 1),
(220, '05002', 'teacher', '2013-03-14 13:15:10', 'exam', 'CSE303', '7', 'B', '01:00AM 2013-04-03', 0),
(221, '05002', 'teacher', '2013-03-14 13:16:09', 'exam', 'CSE303', '8', 'B', '01:00AM 2013-04-10', 0),
(222, '05002', 'teacher', '2013-03-14 13:13:10', 'marks', 'CSE303', '1', 'A', 'uploaded', 1),
(223, '05002', 'teacher', '2013-03-14 13:14:38', 'marks', 'CSE303', '5', 'B', 'uploaded', 1),
(224, '05002', 'teacher', '2013-03-14 13:15:42', 'exam', 'CSE303', '9', 'B', '08:00AM 2013-04-04', 1),
(225, '05002', 'teacher', '2013-03-14 13:16:39', 'exam', 'CSE303', '10', 'B', '12:00AM 2013-04-10', 1),
(226, '05002', 'teacher', '2013-03-14 13:18:11', 'marks', 'CSE303', '2', 'A', 'uploaded', 1),
(227, '05002', 'teacher', '2013-03-14 13:18:48', 'marks', 'CSE303', '3', 'A', 'uploaded', 1),
(228, '05002', 'teacher', '2013-03-14 13:19:14', 'marks', 'CSE303', '4', 'A', 'uploaded', 1),
(229, '05002', 'teacher', '2013-03-14 08:21:28', 'content', 'CSE303', '1', '', 'introduction:052050.PNG', 1),
(230, '05002', 'teacher', '2013-03-14 08:22:00', 'content', 'CSE303', '2', '', 'Distributed Database:Feb,2013_L-4,T-1.pdf', 1),
(231, '05002', 'teacher', '2013-03-14 08:22:20', 'content', 'CSE303', '3', '', 'sample ppt:ERD.pptx', 1),
(232, '05002', 'teacher', '2013-03-14 08:22:47', 'content', 'CSE303', '4', '', 'Sql:httpsgithub.comsid-ara-t.txt', 1),
(233, '05002', 'teacher', '2013-03-14 08:23:18', 'content', 'CSE303', '5', '', 'Entity relationship diagram:ERD1.pptx', 1),
(234, '05002', 'teacher', '2013-03-14 08:24:12', 'content', 'CSE303', '6', '', 'BCNF:Feb,2013_L-4,T-11.pdf', 1),
(235, '05002', 'teacher', '2013-03-14 08:24:35', 'content', 'CSE303', '7', '', '4NF:New_Text_Document.txt', 1),
(236, '05002', 'teacher', '2013-03-14 08:25:10', 'content', 'CSE303', '8', '', 'B tree:0520501.PNG', 1),
(237, '05002', 'teacher', '2013-03-14 09:53:31', 'comment', 'CSE303', '18', '', 'this is a comment', 1),
(238, '05002', 'teacher', '2013-03-14 09:53:43', 'comment', 'CSE303', '18', '', 'this is another comment', 1),
(239, '0805049', 'student', '2013-03-14 10:28:07', 'file', 'CSE303', '19', '', 'httpsgithub.comsid-ara-tanGitCi.git.txt', 1),
(240, '0805049', 'student', '2013-03-14 10:29:14', 'file', 'CSE303', '20', '', 'CSE_324_(Software_Development_Sessional)_Outline.d', 1),
(241, '0805049', 'student', '2013-03-14 10:29:37', 'file', 'CSE303', '21', '', 'CSE_324__Software_Development_Sessional__Outline.p', 1),
(242, '05002', 'teacher', '2013-03-15 12:09:43', 'marks', 'CSE303', '6', 'B', 'uploaded', 1),
(243, '05002', 'teacher', '2013-03-15 12:10:56', 'exam', 'CSE303', '11', 'A', '12:00PM 2013-03-01', 1),
(244, '05002', 'teacher', '2013-03-15 12:12:00', 'exam', 'CSE304', '1', 'A1', '02:30PM 2013-03-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prerequisite`
--

CREATE TABLE IF NOT EXISTS `prerequisite` (
  `course_no_1` varchar(10) NOT NULL,
  `course_no_2` varchar(10) NOT NULL,
  PRIMARY KEY (`course_no_1`,`course_no_2`),
  KEY `course_no_1` (`course_no_1`,`course_no_2`),
  KEY `course_no_2` (`course_no_2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prerequisite`
--

INSERT INTO `prerequisite` (`course_no_1`, `course_no_2`) VALUES
('CSE303', 'CSE300'),
('CSE305', 'CSE304');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Dept_id` varchar(10) NOT NULL,
  `sLevel` varchar(10) NOT NULL,
  `Term` varchar(10) NOT NULL,
  `period` varchar(200) NOT NULL DEFAULT 'idle',
  PRIMARY KEY (`id`,`Dept_id`,`sLevel`,`Term`),
  KEY `Dept_id` (`Dept_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `Dept_id`, `sLevel`, `Term`, `period`) VALUES
(2, 'CSE', '3', '2', 'idle'),
(4, 'CSE', '1', '2', 'idle'),
(5, 'CSE', '2', '1', 'idle'),
(10, 'CSE', '3', '1', 'idle');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `S_Id` varchar(10) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Dept_id` varchar(6) DEFAULT NULL,
  `sLevel` int(11) DEFAULT NULL,
  `Term` int(11) DEFAULT NULL,
  `Sec` varchar(2) DEFAULT NULL,
  `Advisor` varchar(10) DEFAULT NULL,
  `Curriculam` int(11) DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL,
  `father_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` int(50) NOT NULL,
  PRIMARY KEY (`S_Id`),
  KEY `Dept_id` (`Dept_id`),
  KEY `Advisor` (`Advisor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`S_Id`, `Name`, `Dept_id`, `sLevel`, `Term`, `Sec`, `Advisor`, `Curriculam`, `Password`, `father_name`, `email`, `address`, `phone`) VALUES
('0705049', 'Tanzir Ul Islam Senior', 'CSE', 3, 2, 'A2', '05002', 2005, '1234', '', '', '', 0),
('0706049', 'Tanzir EEE', 'EEE', 3, 2, 'A2', NULL, 2005, '1234', '', '', '', 0),
('0805001', 'Ishat-E-Rabban', 'CSE', 3, 1, 'A1', '05006', 2005, '1234', '', '', '', 0),
('0805002', 'Radi Moahammad Reza', 'CSE', 3, 1, 'A1', '05006', 2005, '1234', '', '', '', 0),
('0805003', NULL, 'CSE', 3, 1, 'A1', '05006', NULL, 'wXEDCui4UV', '', '', '', 0),
('0805004', NULL, 'CSE', 3, 1, 'A1', '05006', NULL, 'gaTXLXqp1e', '', '', '', 0),
('0805005', NULL, 'CSE', 3, 1, 'A1', '05006', NULL, 'sgjS81RUbR', '', '', '', 0),
('0805006', NULL, 'CSE', 3, 1, 'A1', '05006', NULL, 'oIJEEewn8y', '', '', '', 0),
('0805007', 'kausar ahmed', 'CSE', 3, 1, 'A1', '05006', 2008, '1234', '', '', '', 0),
('0805008', NULL, 'CSE', 3, 1, 'A1', '05006', NULL, 'v3kZ69hgTJ', '', '', '', 0),
('0805009', NULL, 'CSE', 3, 1, 'A1', '05006', NULL, 'APMZatM2tZ', '', '', '', 0),
('0805010', 'Nahid Anjum Arafat', 'CSE', 3, 1, 'A1', '05006', NULL, '1234', '', 'nahid@yahoo.com', '', 0),
('0805011', NULL, 'CSE', 3, 1, 'A1', '05006', NULL, 'gF8H16RrC5', '', '', '', 0),
('0805012', NULL, 'CSE', 3, 1, 'A1', '05006', NULL, 'cHAbsGz1Hp', '', '', '', 0),
('0805013', NULL, 'CSE', 3, 1, 'A1', '05006', NULL, '38iRDwJ0Co', '', '', '', 0),
('0805014', NULL, 'CSE', 3, 1, 'A1', '05006', NULL, 'YDbMRUfBGI', '', '', '', 0),
('0805015', NULL, 'CSE', 3, 1, 'A1', '05006', NULL, 'Rl1JzgOHLE', '', '', '', 0),
('0805016', NULL, 'CSE', 3, 1, 'A1', '05006', NULL, '4hA8Eoq12W', '', '', '', 0),
('0805017', NULL, 'CSE', 3, 1, 'A1', '05006', NULL, 'yyUDUM0Sru', '', '', '', 0),
('0805018', NULL, 'CSE', 3, 1, 'A1', '05006', NULL, 'naBkttGbBM', '', '', '', 0),
('0805019', NULL, 'CSE', 3, 1, 'A1', '05006', NULL, '3EQBQ6FxtE', '', '', '', 0),
('0805020', NULL, 'CSE', 3, 1, 'A1', '05006', NULL, 'cuFLhMK5D7', '', '', '', 0),
('0805021', NULL, 'CSE', 3, 1, 'A1', '05006', NULL, 'XmQCzS4XUt', '', '', '', 0),
('0805022', NULL, 'CSE', 3, 1, 'A1', '05006', NULL, 'aeNcOUjq50', '', '', '', 0),
('0805023', NULL, 'CSE', 3, 1, 'A1', '05006', NULL, 'TpOZEv1bXj', '', '', '', 0),
('0805024', NULL, 'CSE', 3, 1, 'A1', '05006', NULL, 'MO9ucdguFT', '', '', '', 0),
('0805025', NULL, 'CSE', 3, 1, 'A1', '05006', NULL, 'xoqDfmrnH8', '', '', '', 0),
('0805026', NULL, 'CSE', 3, 1, 'A1', '05006', NULL, '1O47rDqmIx', '', '', '', 0),
('0805027', NULL, 'CSE', 3, 1, 'A1', '05006', NULL, '7zHdlFMCfS', '', '', '', 0),
('0805028', NULL, 'CSE', 3, 1, 'A1', '05006', NULL, '9IRRqYYgZW', '', '', '', 0),
('0805029', NULL, 'CSE', 3, 1, 'A1', '05006', NULL, 'louV0Ahdav', '', '', '', 0),
('0805030', NULL, 'CSE', 3, 1, 'A1', '05006', NULL, 'vdiNo5VMaK', '', '', '', 0),
('0805031', NULL, 'CSE', 3, 1, 'A2', '05006', 2008, 'kqO27htBVH', '', '', '', 0),
('0805032', NULL, 'CSE', 3, 1, 'A2', '05006', 2008, '1OsphUnM8H', '', '', '', 0),
('0805033', NULL, 'CSE', 3, 1, 'A2', '05006', 2008, '4zipYPjAhn', '', '', '', 0),
('0805034', NULL, 'CSE', 3, 1, 'A2', '05006', 2008, 'Gdx9hnZLSM', '', '', '', 0),
('0805035', NULL, 'CSE', 3, 1, 'A2', '05006', 2008, 'voGE9MPv1D', '', '', '', 0),
('0805036', NULL, 'CSE', 3, 1, 'A2', '05006', 2008, 'QYkMeAjx79', '', '', '', 0),
('0805037', NULL, 'CSE', 3, 1, 'A2', '05006', 2008, 'pySOmbbD9K', '', '', '', 0),
('0805038', 'saikar chakraborty', 'CSE', 3, 1, 'A2', '05006', 2008, '1234', '', '', '', 0),
('0805039', 'Madhududan bashak', 'CSE', 3, 1, 'A2', '05006', 2008, '1234', '', '', '', 0),
('0805040', 'Mir Tazbinur sharif', 'CSE', 3, 1, 'A2', '05006', 2008, '1234', 'Abul Hosain', 'tashjg@yy.cc', '', 1674123456),
('0805041', NULL, 'CSE', 3, 1, 'A2', '05006', 2008, '8IYTFeq4Bd', '', '', '', 0),
('0805042', NULL, 'CSE', 3, 1, 'A2', '05006', 2008, 'PhRRIgthxp', '', '', '', 0),
('0805043', NULL, 'CSE', 3, 1, 'A2', '05006', 2008, 'oRrLAIFZeU', '', '', '', 0),
('0805044', NULL, 'CSE', 3, 1, 'A2', '05006', 2008, 'sfZjXmLHFg', '', '', '', 0),
('0805045', NULL, 'CSE', 3, 1, 'A2', '05006', 2008, '4BTcAyunL9', '', '', '', 0),
('0805046', NULL, 'CSE', 3, 1, 'A2', '05006', 2008, 'CUqFhVUo0t', '', '', '', 0),
('0805047', 'Siddhartha Shankar Das', 'CSE', 3, 1, 'A2', '05006', 2008, '1234', '', '', '', 0),
('0805048', 'Md. Arafat Imtiaz', 'CSE', 3, 1, 'A2', '05006', 2008, '1234', '', '', '', 0),
('0805049', 'Tanzir Ul Islam', 'CSE', 3, 1, 'A2', '05006', 2008, '1234', 'Tazul Islam', 'tanzir.b@gmail.com', 'titumir hall 3008 buet dhaka,bangladesh', 1674894025),
('0805050', NULL, 'CSE', 3, 1, 'A2', '05006', 2008, 'DTxoN0Qdpr', '', '', '', 0),
('0805051', NULL, 'CSE', 3, 1, 'A2', '05006', 2008, 'bmrpzKDYwT', '', '', '', 0),
('0805052', NULL, 'CSE', 3, 1, 'A2', '05006', 2008, 'lG1UuoaHy0', '', '', '', 0),
('0805053', NULL, 'CSE', 3, 1, 'A2', '05006', 2008, 'pqdRbr0uHA', '', '', '', 0),
('0805054', NULL, 'CSE', 3, 1, 'A2', '05006', 2008, 'GM5CeeL1Xv', '', '', '', 0),
('0805055', NULL, 'CSE', 3, 1, 'A2', '05006', 2008, 'CtujqIqIHo', '', '', '', 0),
('0805056', NULL, 'CSE', 3, 1, 'A2', '05006', 2008, 'pZh6VAMLPj', '', '', '', 0),
('0805057', NULL, 'CSE', 3, 1, 'A2', '05006', 2008, 'g0cIdgB1Yd', '', '', '', 0),
('0805058', NULL, 'CSE', 3, 1, 'A2', '05006', 2008, 'xpgbWnLzdq', '', '', '', 0),
('0805059', NULL, 'CSE', 3, 1, 'A2', '05006', 2008, 'LXLH2XDv0v', '', '', '', 0),
('0805060', NULL, 'CSE', 3, 1, 'A2', '05006', 2008, '1D02llqYOJ', '', '', '', 0),
('0805061', NULL, 'CSE', 3, 1, 'B1', '05001', NULL, '20Dm8FcEiI', '', '', '', 0),
('0805062', NULL, 'CSE', 3, 1, 'B1', '05001', NULL, 'v6kxsqvZ2A', '', '', '', 0),
('0805063', NULL, 'CSE', 3, 1, 'B1', '05001', NULL, 'BtUAr7SJV0', '', '', '', 0),
('0805064', NULL, 'CSE', 3, 1, 'B1', '05001', NULL, 'mBPcjzCcfr', '', '', '', 0),
('0805065', NULL, 'CSE', 3, 1, 'B1', '05001', NULL, 'pOCbYXZnKP', '', '', '', 0),
('0805066', NULL, 'CSE', 3, 1, 'B1', '05001', NULL, 'NDABJj90DV', '', '', '', 0),
('0805067', 'Jahangir Alam', 'CSE', 3, 1, 'B1', '05001', 2005, '1234', '', '', '', 0),
('0805068', NULL, 'CSE', 3, 1, 'B1', '05001', NULL, 'Xpqt3Y7UgH', '', '', '', 0),
('0805069', NULL, 'CSE', 3, 1, 'B1', '05001', NULL, 'Diba7ftcdx', '', '', '', 0),
('0805070', NULL, 'CSE', 3, 1, 'B1', '05001', NULL, 'QuwY5znJPQ', '', '', '', 0),
('0805071', NULL, 'CSE', 3, 1, 'B1', '05001', NULL, 'IEMY2OEa3h', '', '', '', 0),
('0805072', NULL, 'CSE', 3, 1, 'B1', '05001', NULL, 'B2wscZvK5Y', '', '', '', 0),
('0805073', NULL, 'CSE', 3, 1, 'B1', '05001', NULL, 'hylL45O1w4', '', '', '', 0),
('0805074', NULL, 'CSE', 3, 1, 'B1', '05001', NULL, 'OORc7YOSaf', '', '', '', 0),
('0805075', NULL, 'CSE', 3, 1, 'B1', '05001', NULL, '9EHGGzaP5c', '', '', '', 0),
('0805076', NULL, 'CSE', 3, 1, 'B1', '05001', NULL, 'FPYrkwpfEf', '', '', '', 0),
('0805077', NULL, 'CSE', 3, 1, 'B1', '05001', NULL, '9Zmmg31HYg', '', '', '', 0),
('0805078', NULL, 'CSE', 3, 1, 'B1', '05001', NULL, 'Imia68s4Nl', '', '', '', 0),
('0805079', NULL, 'CSE', 3, 1, 'B1', '05001', NULL, 'IqjsWMZP3z', '', '', '', 0),
('0805080', NULL, 'CSE', 3, 1, 'B1', '05001', NULL, 'KodV0TAkXD', '', '', '', 0),
('0805081', NULL, 'CSE', 3, 1, 'B1', '05001', NULL, 'lElxWlKBgp', '', '', '', 0),
('0805082', NULL, 'CSE', 3, 1, 'B1', '05001', NULL, '3J3D6uJLj2', '', '', '', 0),
('0805083', NULL, 'CSE', 3, 1, 'B1', '05001', NULL, 'qH84idMbnZ', '', '', '', 0),
('0805084', NULL, 'CSE', 3, 1, 'B1', '05001', NULL, 'tODHKueFnb', '', '', '', 0),
('0805085', NULL, 'CSE', 3, 1, 'B1', '05001', NULL, 'Hiia4iEz2k', '', '', '', 0),
('0805086', 'Faruk Hossen', 'CSE', 3, 1, 'B1', '05001', 2005, '1234', '', '', '', 0),
('0805087', NULL, 'CSE', 3, 1, 'B1', '05001', NULL, 'N1rL820SCX', '', '', '', 0),
('0805088', NULL, 'CSE', 3, 1, 'B1', '05001', NULL, 'mK4maMBNuw', '', '', '', 0),
('0805089', NULL, 'CSE', 3, 1, 'B1', '05001', NULL, '3MUzQ5yoej', '', '', '', 0),
('0805090', NULL, 'CSE', 3, 1, 'B1', '05001', NULL, 'XNxwz0qjWe', '', '', '', 0),
('0805091', NULL, 'CSE', 3, 1, 'B2', '05001', NULL, 'ILqdzrVGSu', '', '', '', 0),
('0805092', NULL, 'CSE', 3, 1, 'B2', '05001', NULL, 'DuwnNmHLQo', '', '', '', 0),
('0805093', NULL, 'CSE', 3, 1, 'B2', '05001', NULL, 'Ckxms1dVta', '', '', '', 0),
('0805094', NULL, 'CSE', 3, 1, 'B2', '05001', NULL, 'v4V7QWGogl', '', '', '', 0),
('0805095', NULL, 'CSE', 3, 1, 'B2', '05001', NULL, 'XgxrDCSMov', '', '', '', 0),
('0805096', NULL, 'CSE', 3, 1, 'B2', '05001', NULL, 'DEQmnHAuRp', '', '', '', 0),
('0805097', NULL, 'CSE', 3, 1, 'B2', '05001', NULL, 'lgxSPaf8XH', '', '', '', 0),
('0805098', NULL, 'CSE', 3, 1, 'B2', '05001', NULL, 'bE9pU5oWE8', '', '', '', 0),
('0805099', NULL, 'CSE', 3, 1, 'B2', '05001', NULL, 'tqwyFgLpOR', '', '', '', 0),
('0805100', NULL, 'CSE', 3, 1, 'B2', '05001', NULL, 'yKkWpJs7g5', '', '', '', 0),
('0805101', NULL, 'CSE', 3, 1, 'B2', '05001', NULL, 'SRfLBJmXmE', '', '', '', 0),
('0805102', 'Ovi', 'CSE', 3, 1, 'B2', '05001', 2005, '1234', '', '', '', 0),
('0805103', NULL, 'CSE', 3, 1, 'B2', '05001', NULL, 'ZcY5QCyPcM', '', '', '', 0),
('0805104', NULL, 'CSE', 3, 1, 'B2', '05001', NULL, '6bcmC3sEwU', '', '', '', 0),
('0805105', NULL, 'CSE', 3, 1, 'B2', '05001', NULL, 'JtJ6pUVwas', '', '', '', 0),
('0805106', NULL, 'CSE', 3, 1, 'B2', '05001', NULL, 'BoTVqzBWI2', '', '', '', 0),
('0805107', NULL, 'CSE', 3, 1, 'B2', '05001', NULL, 'dwniGsqi4m', '', '', '', 0),
('0805108', NULL, 'CSE', 3, 1, 'B2', '05001', NULL, 'wDZF1LZLmf', '', '', '', 0),
('0805109', NULL, 'CSE', 3, 1, 'B2', '05001', NULL, 'gWm6hhg1me', '', '', '', 0),
('0805110', NULL, 'CSE', 3, 1, 'B2', '05001', NULL, 'JjLp7Jhozy', '', '', '', 0),
('0805111', NULL, 'CSE', 3, 1, 'B2', '05001', NULL, 'saK2kvWoqe', '', '', '', 0),
('0805112', NULL, 'CSE', 3, 1, 'B2', '05001', NULL, '5qCOljRGXy', '', '', '', 0),
('0805113', NULL, 'CSE', 3, 1, 'B2', '05001', NULL, 'b7TbWLVuzI', '', '', '', 0),
('0805114', 'Sakib', 'CSE', 3, 1, 'B2', '05001', 2005, '1234', '', '', '', 0),
('0805115', NULL, 'CSE', 3, 1, 'B2', '05001', NULL, 'aXF2MTuw8n', '', '', '', 0),
('0805116', NULL, 'CSE', 3, 1, 'B2', '05001', NULL, '6UyMfsR99l', '', '', '', 0),
('0805117', NULL, 'CSE', 3, 1, 'B2', '05001', NULL, 'VsoTNP2SJi', '', '', '', 0),
('0805118', NULL, 'CSE', 3, 1, 'B2', '05001', NULL, 'hAfXJcUmtZ', '', '', '', 0),
('0805119', NULL, 'CSE', 3, 1, 'B2', '05001', NULL, 'UJZke73aRU', '', '', '', 0),
('0805120', NULL, 'CSE', 3, 1, 'B2', '05001', NULL, '0H5jYR5I9f', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `takencourse`
--

CREATE TABLE IF NOT EXISTS `takencourse` (
  `Status` varchar(50) DEFAULT NULL,
  `GPA` decimal(4,2) DEFAULT NULL,
  `CourseNo` varchar(10) NOT NULL DEFAULT '',
  `S_Id` varchar(10) NOT NULL DEFAULT '',
  `Section` varchar(10) NOT NULL,
  PRIMARY KEY (`S_Id`,`CourseNo`),
  KEY `CourseNo` (`CourseNo`,`S_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `takencourse`
--

INSERT INTO `takencourse` (`Status`, `GPA`, `CourseNo`, `S_Id`, `Section`) VALUES
('Running', NULL, 'CSE303', '0705049', 'A'),
('failed', 0.00, 'CSE309', '0705049', 'A'),
('passed', 2.75, 'CSE310', '0705049', 'A2'),
('Running', NULL, 'CSE300', '0805001', 'A1'),
('Running', 0.00, 'CSE303', '0805001', 'A'),
('Running', NULL, 'CSE304', '0805001', 'A1'),
('Running', NULL, 'CSE305', '0805001', 'A'),
('Running', NULL, 'CSE307', '0805001', 'A'),
('Running', NULL, 'CSE308', '0805001', 'A1'),
('Running', NULL, 'CSE309', '0805001', 'A'),
('Running', NULL, 'CSE310', '0805001', 'A1'),
('Running', NULL, 'CSE311', '0805001', 'A'),
('Running', NULL, 'CSE300', '0805002', 'A1'),
('Running', 0.00, 'CSE303', '0805002', 'A'),
('Running', NULL, 'CSE304', '0805002', 'A1'),
('Running', NULL, 'CSE305', '0805002', 'A'),
('Running', NULL, 'CSE307', '0805002', 'A'),
('Running', NULL, 'CSE308', '0805002', 'A1'),
('Running', NULL, 'CSE309', '0805002', 'A'),
('Running', NULL, 'CSE310', '0805002', 'A1'),
('Running', NULL, 'CSE311', '0805002', 'A'),
('Running', 0.00, 'CSE303', '0805003', 'A'),
('Running', NULL, 'CSE304', '0805003', 'A1'),
('Running', NULL, 'CSE305', '0805003', 'A'),
('Running', NULL, 'CSE307', '0805003', 'A'),
('Running', NULL, 'CSE308', '0805003', 'A1'),
('Running', NULL, 'CSE309', '0805003', 'A'),
('Running', NULL, 'CSE310', '0805003', 'A1'),
('Running', NULL, 'CSE311', '0805003', 'A'),
('Running', 0.00, 'CSE303', '0805004', 'A'),
('Running', NULL, 'CSE304', '0805004', 'A1'),
('Running', NULL, 'CSE305', '0805004', 'A'),
('Running', NULL, 'CSE307', '0805004', 'A'),
('Running', NULL, 'CSE308', '0805004', 'A1'),
('Running', NULL, 'CSE309', '0805004', 'A'),
('Running', NULL, 'CSE310', '0805004', 'A1'),
('Running', NULL, 'CSE311', '0805004', 'A'),
('Running', 0.00, 'CSE303', '0805005', 'A'),
('Running', NULL, 'CSE304', '0805005', 'A1'),
('Running', NULL, 'CSE305', '0805005', 'A'),
('Running', NULL, 'CSE307', '0805005', 'A'),
('Running', NULL, 'CSE308', '0805005', 'A1'),
('Running', NULL, 'CSE309', '0805005', 'A'),
('Running', NULL, 'CSE310', '0805005', 'A1'),
('Running', NULL, 'CSE311', '0805005', 'A'),
('Running', 0.00, 'CSE303', '0805006', 'A'),
('Running', NULL, 'CSE304', '0805006', 'A1'),
('Running', NULL, 'CSE305', '0805006', 'A'),
('Running', NULL, 'CSE307', '0805006', 'A'),
('Running', NULL, 'CSE308', '0805006', 'A1'),
('Running', NULL, 'CSE309', '0805006', 'A'),
('Running', NULL, 'CSE310', '0805006', 'A1'),
('Running', NULL, 'CSE311', '0805006', 'A'),
('Running', 0.00, 'CSE303', '0805007', 'A'),
('Running', NULL, 'CSE304', '0805007', 'A1'),
('Running', NULL, 'CSE305', '0805007', 'A'),
('Running', NULL, 'CSE307', '0805007', 'A'),
('Running', NULL, 'CSE308', '0805007', 'A1'),
('Running', NULL, 'CSE309', '0805007', 'A'),
('Running', NULL, 'CSE310', '0805007', 'A1'),
('Running', NULL, 'CSE311', '0805007', 'A'),
('Running', 0.00, 'CSE303', '0805008', 'A'),
('Running', NULL, 'CSE304', '0805008', 'A1'),
('Running', NULL, 'CSE305', '0805008', 'A'),
('Running', NULL, 'CSE307', '0805008', 'A'),
('Running', NULL, 'CSE308', '0805008', 'A1'),
('Running', NULL, 'CSE309', '0805008', 'A'),
('Running', NULL, 'CSE310', '0805008', 'A1'),
('Running', NULL, 'CSE311', '0805008', 'A'),
('Running', 0.00, 'CSE303', '0805009', 'A'),
('Running', NULL, 'CSE304', '0805009', 'A1'),
('Running', NULL, 'CSE305', '0805009', 'A'),
('Running', NULL, 'CSE307', '0805009', 'A'),
('Running', NULL, 'CSE308', '0805009', 'A1'),
('Running', NULL, 'CSE309', '0805009', 'A'),
('Running', NULL, 'CSE310', '0805009', 'A1'),
('Running', NULL, 'CSE311', '0805009', 'A'),
('Running', 0.00, 'CSE303', '0805010', 'A'),
('Running', NULL, 'CSE304', '0805010', 'A1'),
('Running', NULL, 'CSE305', '0805010', 'A'),
('Running', NULL, 'CSE307', '0805010', 'A'),
('Running', NULL, 'CSE308', '0805010', 'A1'),
('Running', NULL, 'CSE309', '0805010', 'A'),
('Running', NULL, 'CSE310', '0805010', 'A1'),
('Running', NULL, 'CSE311', '0805010', 'A'),
('Running', 0.00, 'CSE303', '0805011', 'A'),
('Running', NULL, 'CSE304', '0805011', 'A1'),
('Running', NULL, 'CSE305', '0805011', 'A'),
('Running', NULL, 'CSE307', '0805011', 'A'),
('Running', NULL, 'CSE308', '0805011', 'A1'),
('Running', NULL, 'CSE309', '0805011', 'A'),
('Running', NULL, 'CSE310', '0805011', 'A1'),
('Running', NULL, 'CSE311', '0805011', 'A'),
('Running', 0.00, 'CSE303', '0805012', 'A'),
('Running', NULL, 'CSE304', '0805012', 'A1'),
('Running', NULL, 'CSE305', '0805012', 'A'),
('Running', NULL, 'CSE307', '0805012', 'A'),
('Running', NULL, 'CSE308', '0805012', 'A1'),
('Running', NULL, 'CSE309', '0805012', 'A'),
('Running', NULL, 'CSE310', '0805012', 'A1'),
('Running', NULL, 'CSE311', '0805012', 'A'),
('Running', 0.00, 'CSE303', '0805013', 'A'),
('Running', NULL, 'CSE304', '0805013', 'A1'),
('Running', NULL, 'CSE305', '0805013', 'A'),
('Running', NULL, 'CSE307', '0805013', 'A'),
('Running', NULL, 'CSE308', '0805013', 'A1'),
('Running', NULL, 'CSE309', '0805013', 'A'),
('Running', NULL, 'CSE310', '0805013', 'A1'),
('Running', NULL, 'CSE311', '0805013', 'A'),
('Running', 0.00, 'CSE303', '0805014', 'A'),
('Running', NULL, 'CSE304', '0805014', 'A1'),
('Running', NULL, 'CSE305', '0805014', 'A'),
('Running', NULL, 'CSE307', '0805014', 'A'),
('Running', NULL, 'CSE308', '0805014', 'A1'),
('Running', NULL, 'CSE309', '0805014', 'A'),
('Running', NULL, 'CSE310', '0805014', 'A1'),
('Running', NULL, 'CSE311', '0805014', 'A'),
('Running', 0.00, 'CSE303', '0805015', 'A'),
('Running', NULL, 'CSE304', '0805015', 'A1'),
('Running', NULL, 'CSE305', '0805015', 'A'),
('Running', NULL, 'CSE307', '0805015', 'A'),
('Running', NULL, 'CSE308', '0805015', 'A1'),
('Running', NULL, 'CSE309', '0805015', 'A'),
('Running', NULL, 'CSE310', '0805015', 'A1'),
('Running', NULL, 'CSE311', '0805015', 'A'),
('Running', 0.00, 'CSE303', '0805016', 'A'),
('Running', NULL, 'CSE304', '0805016', 'A1'),
('Running', NULL, 'CSE305', '0805016', 'A'),
('Running', NULL, 'CSE307', '0805016', 'A'),
('Running', NULL, 'CSE308', '0805016', 'A1'),
('Running', NULL, 'CSE309', '0805016', 'A'),
('Running', NULL, 'CSE310', '0805016', 'A1'),
('Running', NULL, 'CSE311', '0805016', 'A'),
('Running', 0.00, 'CSE303', '0805017', 'A'),
('Running', NULL, 'CSE304', '0805017', 'A1'),
('Running', NULL, 'CSE305', '0805017', 'A'),
('Running', NULL, 'CSE307', '0805017', 'A'),
('Running', NULL, 'CSE308', '0805017', 'A1'),
('Running', NULL, 'CSE309', '0805017', 'A'),
('Running', NULL, 'CSE310', '0805017', 'A1'),
('Running', NULL, 'CSE311', '0805017', 'A'),
('Running', 0.00, 'CSE303', '0805018', 'A'),
('Running', NULL, 'CSE304', '0805018', 'A1'),
('Running', NULL, 'CSE305', '0805018', 'A'),
('Running', NULL, 'CSE307', '0805018', 'A'),
('Running', NULL, 'CSE308', '0805018', 'A1'),
('Running', NULL, 'CSE309', '0805018', 'A'),
('Running', NULL, 'CSE310', '0805018', 'A1'),
('Running', NULL, 'CSE311', '0805018', 'A'),
('Running', 0.00, 'CSE303', '0805019', 'A'),
('Running', NULL, 'CSE304', '0805019', 'A1'),
('Running', NULL, 'CSE305', '0805019', 'A'),
('Running', NULL, 'CSE307', '0805019', 'A'),
('Running', NULL, 'CSE308', '0805019', 'A1'),
('Running', NULL, 'CSE309', '0805019', 'A'),
('Running', NULL, 'CSE310', '0805019', 'A1'),
('Running', NULL, 'CSE311', '0805019', 'A'),
('Running', 0.00, 'CSE303', '0805020', 'A'),
('Running', NULL, 'CSE304', '0805020', 'A1'),
('Running', NULL, 'CSE305', '0805020', 'A'),
('Running', NULL, 'CSE307', '0805020', 'A'),
('Running', NULL, 'CSE308', '0805020', 'A1'),
('Running', NULL, 'CSE309', '0805020', 'A'),
('Running', NULL, 'CSE310', '0805020', 'A1'),
('Running', NULL, 'CSE311', '0805020', 'A'),
('Running', 0.00, 'CSE303', '0805021', 'A'),
('Running', NULL, 'CSE304', '0805021', 'A1'),
('Running', NULL, 'CSE305', '0805021', 'A'),
('Running', NULL, 'CSE307', '0805021', 'A'),
('Running', NULL, 'CSE308', '0805021', 'A1'),
('Running', NULL, 'CSE309', '0805021', 'A'),
('Running', NULL, 'CSE310', '0805021', 'A1'),
('Running', NULL, 'CSE311', '0805021', 'A'),
('Running', 0.00, 'CSE303', '0805022', 'A'),
('Running', NULL, 'CSE304', '0805022', 'A1'),
('Running', NULL, 'CSE305', '0805022', 'A'),
('Running', NULL, 'CSE307', '0805022', 'A'),
('Running', NULL, 'CSE308', '0805022', 'A1'),
('Running', NULL, 'CSE309', '0805022', 'A'),
('Running', NULL, 'CSE310', '0805022', 'A1'),
('Running', NULL, 'CSE311', '0805022', 'A'),
('Running', 0.00, 'CSE303', '0805023', 'A'),
('Running', NULL, 'CSE304', '0805023', 'A1'),
('Running', NULL, 'CSE305', '0805023', 'A'),
('Running', NULL, 'CSE307', '0805023', 'A'),
('Running', NULL, 'CSE308', '0805023', 'A1'),
('Running', NULL, 'CSE309', '0805023', 'A'),
('Running', NULL, 'CSE310', '0805023', 'A1'),
('Running', NULL, 'CSE311', '0805023', 'A'),
('Running', 0.00, 'CSE303', '0805024', 'A'),
('Running', NULL, 'CSE304', '0805024', 'A1'),
('Running', NULL, 'CSE305', '0805024', 'A'),
('Running', NULL, 'CSE307', '0805024', 'A'),
('Running', NULL, 'CSE308', '0805024', 'A1'),
('Running', NULL, 'CSE309', '0805024', 'A'),
('Running', NULL, 'CSE310', '0805024', 'A1'),
('Running', NULL, 'CSE311', '0805024', 'A'),
('Running', 0.00, 'CSE303', '0805025', 'A'),
('Running', NULL, 'CSE304', '0805025', 'A1'),
('Running', NULL, 'CSE305', '0805025', 'A'),
('Running', NULL, 'CSE307', '0805025', 'A'),
('Running', NULL, 'CSE308', '0805025', 'A1'),
('Running', NULL, 'CSE309', '0805025', 'A'),
('Running', NULL, 'CSE310', '0805025', 'A1'),
('Running', NULL, 'CSE311', '0805025', 'A'),
('Running', 0.00, 'CSE303', '0805026', 'A'),
('Running', NULL, 'CSE304', '0805026', 'A1'),
('Running', NULL, 'CSE305', '0805026', 'A'),
('Running', NULL, 'CSE307', '0805026', 'A'),
('Running', NULL, 'CSE308', '0805026', 'A1'),
('Running', NULL, 'CSE309', '0805026', 'A'),
('Running', NULL, 'CSE310', '0805026', 'A1'),
('Running', NULL, 'CSE311', '0805026', 'A'),
('Running', 0.00, 'CSE303', '0805027', 'A'),
('Running', NULL, 'CSE304', '0805027', 'A1'),
('Running', NULL, 'CSE305', '0805027', 'A'),
('Running', NULL, 'CSE307', '0805027', 'A'),
('Running', NULL, 'CSE308', '0805027', 'A1'),
('Running', NULL, 'CSE309', '0805027', 'A'),
('Running', NULL, 'CSE310', '0805027', 'A1'),
('Running', NULL, 'CSE311', '0805027', 'A'),
('Running', 0.00, 'CSE303', '0805028', 'A'),
('Running', NULL, 'CSE304', '0805028', 'A1'),
('Running', NULL, 'CSE305', '0805028', 'A'),
('Running', NULL, 'CSE307', '0805028', 'A'),
('Running', NULL, 'CSE308', '0805028', 'A1'),
('Running', NULL, 'CSE309', '0805028', 'A'),
('Running', NULL, 'CSE310', '0805028', 'A1'),
('Running', NULL, 'CSE311', '0805028', 'A'),
('Running', 0.00, 'CSE303', '0805029', 'A'),
('Running', NULL, 'CSE304', '0805029', 'A1'),
('Running', NULL, 'CSE305', '0805029', 'A'),
('Running', NULL, 'CSE307', '0805029', 'A'),
('Running', NULL, 'CSE308', '0805029', 'A1'),
('Running', NULL, 'CSE309', '0805029', 'A'),
('Running', NULL, 'CSE310', '0805029', 'A1'),
('Running', NULL, 'CSE311', '0805029', 'A'),
('Running', 0.00, 'CSE303', '0805030', 'A'),
('Running', NULL, 'CSE304', '0805030', 'A1'),
('Running', NULL, 'CSE305', '0805030', 'A'),
('Running', NULL, 'CSE307', '0805030', 'A'),
('Running', NULL, 'CSE308', '0805030', 'A1'),
('Running', NULL, 'CSE309', '0805030', 'A'),
('Running', NULL, 'CSE310', '0805030', 'A1'),
('Running', NULL, 'CSE311', '0805030', 'A'),
('Running', 0.00, 'CSE303', '0805031', 'A'),
('Running', NULL, 'CSE304', '0805031', 'A2'),
('Running', NULL, 'CSE305', '0805031', 'A'),
('Running', NULL, 'CSE307', '0805031', 'A'),
('Running', NULL, 'CSE308', '0805031', 'A2'),
('Running', NULL, 'CSE309', '0805031', 'A'),
('Running', NULL, 'CSE310', '0805031', 'A2'),
('Running', NULL, 'CSE311', '0805031', 'A'),
('Running', 0.00, 'CSE303', '0805032', 'A'),
('Running', NULL, 'CSE304', '0805032', 'A2'),
('Running', NULL, 'CSE305', '0805032', 'A'),
('Running', NULL, 'CSE307', '0805032', 'A'),
('Running', NULL, 'CSE308', '0805032', 'A2'),
('Running', NULL, 'CSE309', '0805032', 'A'),
('Running', NULL, 'CSE310', '0805032', 'A2'),
('Running', NULL, 'CSE311', '0805032', 'A'),
('Running', 0.00, 'CSE303', '0805033', 'A'),
('Running', NULL, 'CSE304', '0805033', 'A2'),
('Running', NULL, 'CSE305', '0805033', 'A'),
('Running', NULL, 'CSE307', '0805033', 'A'),
('Running', NULL, 'CSE308', '0805033', 'A2'),
('Running', NULL, 'CSE309', '0805033', 'A'),
('Running', NULL, 'CSE310', '0805033', 'A2'),
('Running', NULL, 'CSE311', '0805033', 'A'),
('Running', 0.00, 'CSE303', '0805034', 'A'),
('Running', NULL, 'CSE304', '0805034', 'A2'),
('Running', NULL, 'CSE305', '0805034', 'A'),
('Running', NULL, 'CSE307', '0805034', 'A'),
('Running', NULL, 'CSE308', '0805034', 'A2'),
('Running', NULL, 'CSE309', '0805034', 'A'),
('Running', NULL, 'CSE310', '0805034', 'A2'),
('Running', NULL, 'CSE311', '0805034', 'A'),
('Running', 0.00, 'CSE303', '0805035', 'A'),
('Running', NULL, 'CSE304', '0805035', 'A2'),
('Running', NULL, 'CSE305', '0805035', 'A'),
('Running', NULL, 'CSE307', '0805035', 'A'),
('Running', NULL, 'CSE308', '0805035', 'A2'),
('Running', NULL, 'CSE309', '0805035', 'A'),
('Running', NULL, 'CSE310', '0805035', 'A2'),
('Running', NULL, 'CSE311', '0805035', 'A'),
('Running', 0.00, 'CSE303', '0805036', 'A'),
('Running', NULL, 'CSE304', '0805036', 'A2'),
('Running', NULL, 'CSE305', '0805036', 'A'),
('Running', NULL, 'CSE307', '0805036', 'A'),
('Running', NULL, 'CSE308', '0805036', 'A2'),
('Running', NULL, 'CSE309', '0805036', 'A'),
('Running', NULL, 'CSE310', '0805036', 'A2'),
('Running', NULL, 'CSE311', '0805036', 'A'),
('Running', 0.00, 'CSE303', '0805037', 'A'),
('Running', NULL, 'CSE304', '0805037', 'A2'),
('Running', NULL, 'CSE305', '0805037', 'A'),
('Running', NULL, 'CSE307', '0805037', 'A'),
('Running', NULL, 'CSE308', '0805037', 'A2'),
('Running', NULL, 'CSE309', '0805037', 'A'),
('Running', NULL, 'CSE310', '0805037', 'A2'),
('Running', NULL, 'CSE311', '0805037', 'A'),
('Running', 0.00, 'CSE303', '0805038', 'A'),
('Running', NULL, 'CSE304', '0805038', 'A2'),
('Running', NULL, 'CSE305', '0805038', 'A'),
('Running', NULL, 'CSE307', '0805038', 'A'),
('Running', NULL, 'CSE308', '0805038', 'A2'),
('Running', NULL, 'CSE309', '0805038', 'A'),
('Running', NULL, 'CSE310', '0805038', 'A2'),
('Running', NULL, 'CSE311', '0805038', 'A'),
('Running', 0.00, 'CSE303', '0805039', 'A'),
('Running', NULL, 'CSE304', '0805039', 'A2'),
('Running', NULL, 'CSE305', '0805039', 'A'),
('Running', NULL, 'CSE307', '0805039', 'A'),
('Running', NULL, 'CSE308', '0805039', 'A2'),
('Running', NULL, 'CSE309', '0805039', 'A'),
('Running', NULL, 'CSE310', '0805039', 'A2'),
('Running', NULL, 'CSE311', '0805039', 'A'),
('Running', 0.00, 'CSE303', '0805040', 'A'),
('Running', NULL, 'CSE304', '0805040', 'A2'),
('Running', NULL, 'CSE305', '0805040', 'A'),
('Running', NULL, 'CSE307', '0805040', 'A'),
('Running', NULL, 'CSE308', '0805040', 'A2'),
('Running', NULL, 'CSE309', '0805040', 'A'),
('Running', NULL, 'CSE310', '0805040', 'A2'),
('Running', NULL, 'CSE311', '0805040', 'A'),
('Running', 0.00, 'CSE303', '0805041', 'A'),
('Running', NULL, 'CSE304', '0805041', 'A2'),
('Running', NULL, 'CSE305', '0805041', 'A'),
('Running', NULL, 'CSE307', '0805041', 'A'),
('Running', NULL, 'CSE308', '0805041', 'A2'),
('Running', NULL, 'CSE309', '0805041', 'A'),
('Running', NULL, 'CSE310', '0805041', 'A2'),
('Running', NULL, 'CSE311', '0805041', 'A'),
('Running', 0.00, 'CSE303', '0805042', 'A'),
('Running', NULL, 'CSE304', '0805042', 'A2'),
('Running', NULL, 'CSE305', '0805042', 'A'),
('Running', NULL, 'CSE307', '0805042', 'A'),
('Running', NULL, 'CSE308', '0805042', 'A2'),
('Running', NULL, 'CSE309', '0805042', 'A'),
('Running', NULL, 'CSE310', '0805042', 'A2'),
('Running', NULL, 'CSE311', '0805042', 'A'),
('Running', 0.00, 'CSE303', '0805043', 'A'),
('Running', NULL, 'CSE304', '0805043', 'A2'),
('Running', NULL, 'CSE305', '0805043', 'A'),
('Running', NULL, 'CSE307', '0805043', 'A'),
('Running', NULL, 'CSE308', '0805043', 'A2'),
('Running', NULL, 'CSE309', '0805043', 'A'),
('Running', NULL, 'CSE310', '0805043', 'A2'),
('Running', NULL, 'CSE311', '0805043', 'A'),
('Running', 0.00, 'CSE303', '0805044', 'A'),
('Running', NULL, 'CSE304', '0805044', 'A2'),
('Running', NULL, 'CSE305', '0805044', 'A'),
('Running', NULL, 'CSE307', '0805044', 'A'),
('Running', NULL, 'CSE308', '0805044', 'A2'),
('Running', NULL, 'CSE309', '0805044', 'A'),
('Running', NULL, 'CSE310', '0805044', 'A2'),
('Running', NULL, 'CSE311', '0805044', 'A'),
('Running', 0.00, 'CSE303', '0805045', 'A'),
('Running', NULL, 'CSE304', '0805045', 'A2'),
('Running', NULL, 'CSE305', '0805045', 'A'),
('Running', NULL, 'CSE307', '0805045', 'A'),
('Running', NULL, 'CSE308', '0805045', 'A2'),
('Running', NULL, 'CSE309', '0805045', 'A'),
('Running', NULL, 'CSE310', '0805045', 'A2'),
('Running', NULL, 'CSE311', '0805045', 'A'),
('Running', 0.00, 'CSE303', '0805046', 'A'),
('Running', NULL, 'CSE304', '0805046', 'A2'),
('Running', NULL, 'CSE305', '0805046', 'A'),
('Running', NULL, 'CSE307', '0805046', 'A'),
('Running', NULL, 'CSE308', '0805046', 'A2'),
('Running', NULL, 'CSE309', '0805046', 'A'),
('Running', NULL, 'CSE310', '0805046', 'A2'),
('Running', NULL, 'CSE311', '0805046', 'A'),
('Running', 0.00, 'CSE303', '0805047', 'A'),
('Running', NULL, 'CSE304', '0805047', 'A2'),
('Running', NULL, 'CSE305', '0805047', 'A'),
('Running', NULL, 'CSE307', '0805047', 'A'),
('Running', NULL, 'CSE308', '0805047', 'A2'),
('Running', NULL, 'CSE309', '0805047', 'A'),
('Running', NULL, 'CSE310', '0805047', 'A2'),
('Running', NULL, 'CSE311', '0805047', 'A'),
('Running', NULL, 'CSE303', '0805048', 'A'),
('Running', NULL, 'CSE304', '0805048', 'A2'),
('Running', NULL, 'CSE305', '0805048', 'A'),
('Running', NULL, 'CSE307', '0805048', 'A'),
('Running', NULL, 'CSE308', '0805048', 'A2'),
('Running', NULL, 'CSE309', '0805048', 'A'),
('Running', NULL, 'CSE310', '0805048', 'A2'),
('Running', NULL, 'CSE311', '0805048', 'A'),
('Running', 0.00, 'CSE303', '0805049', 'A'),
('Running', NULL, 'CSE304', '0805049', 'A2'),
('Running', NULL, 'CSE305', '0805049', 'A'),
('Running', NULL, 'CSE307', '0805049', 'A'),
('Running', NULL, 'CSE308', '0805049', 'A2'),
('Running', NULL, 'CSE309', '0805049', 'A'),
('Running', NULL, 'CSE310', '0805049', 'A2'),
('Running', NULL, 'CSE311', '0805049', 'A'),
('Running', 0.00, 'CSE303', '0805050', 'A'),
('Running', NULL, 'CSE304', '0805050', 'A2'),
('Running', NULL, 'CSE305', '0805050', 'A'),
('Running', NULL, 'CSE307', '0805050', 'A'),
('Running', NULL, 'CSE308', '0805050', 'A2'),
('Running', NULL, 'CSE309', '0805050', 'A'),
('Running', NULL, 'CSE310', '0805050', 'A2'),
('Running', NULL, 'CSE311', '0805050', 'A'),
('Running', 0.00, 'CSE303', '0805051', 'A'),
('Running', NULL, 'CSE304', '0805051', 'A2'),
('Running', NULL, 'CSE305', '0805051', 'A'),
('Running', NULL, 'CSE307', '0805051', 'A'),
('Running', NULL, 'CSE308', '0805051', 'A2'),
('Running', NULL, 'CSE309', '0805051', 'A'),
('Running', NULL, 'CSE310', '0805051', 'A2'),
('Running', NULL, 'CSE311', '0805051', 'A'),
('Running', 0.00, 'CSE303', '0805052', 'A'),
('Running', NULL, 'CSE304', '0805052', 'A2'),
('Running', NULL, 'CSE305', '0805052', 'A'),
('Running', NULL, 'CSE307', '0805052', 'A'),
('Running', NULL, 'CSE308', '0805052', 'A2'),
('Running', NULL, 'CSE309', '0805052', 'A'),
('Running', NULL, 'CSE310', '0805052', 'A2'),
('Running', NULL, 'CSE311', '0805052', 'A'),
('Running', 0.00, 'CSE303', '0805053', 'A'),
('Running', NULL, 'CSE304', '0805053', 'A2'),
('Running', NULL, 'CSE305', '0805053', 'A'),
('Running', NULL, 'CSE307', '0805053', 'A'),
('Running', NULL, 'CSE308', '0805053', 'A2'),
('Running', NULL, 'CSE309', '0805053', 'A'),
('Running', NULL, 'CSE310', '0805053', 'A2'),
('Running', NULL, 'CSE311', '0805053', 'A'),
('Running', 0.00, 'CSE303', '0805054', 'A'),
('Running', NULL, 'CSE304', '0805054', 'A2'),
('Running', NULL, 'CSE305', '0805054', 'A'),
('Running', NULL, 'CSE307', '0805054', 'A'),
('Running', NULL, 'CSE308', '0805054', 'A2'),
('Running', NULL, 'CSE309', '0805054', 'A'),
('Running', NULL, 'CSE310', '0805054', 'A2'),
('Running', NULL, 'CSE311', '0805054', 'A'),
('Running', 0.00, 'CSE303', '0805055', 'A'),
('Running', NULL, 'CSE304', '0805055', 'A2'),
('Running', NULL, 'CSE305', '0805055', 'A'),
('Running', NULL, 'CSE307', '0805055', 'A'),
('Running', NULL, 'CSE308', '0805055', 'A2'),
('Running', NULL, 'CSE309', '0805055', 'A'),
('Running', NULL, 'CSE310', '0805055', 'A2'),
('Running', NULL, 'CSE311', '0805055', 'A'),
('Running', 0.00, 'CSE303', '0805056', 'A'),
('Running', NULL, 'CSE304', '0805056', 'A2'),
('Running', NULL, 'CSE305', '0805056', 'A'),
('Running', NULL, 'CSE307', '0805056', 'A'),
('Running', NULL, 'CSE308', '0805056', 'A2'),
('Running', NULL, 'CSE309', '0805056', 'A'),
('Running', NULL, 'CSE310', '0805056', 'A2'),
('Running', NULL, 'CSE311', '0805056', 'A'),
('Running', 0.00, 'CSE303', '0805057', 'A'),
('Running', NULL, 'CSE304', '0805057', 'A2'),
('Running', NULL, 'CSE305', '0805057', 'A'),
('Running', NULL, 'CSE307', '0805057', 'A'),
('Running', NULL, 'CSE308', '0805057', 'A2'),
('Running', NULL, 'CSE309', '0805057', 'A'),
('Running', NULL, 'CSE310', '0805057', 'A2'),
('Running', NULL, 'CSE311', '0805057', 'A'),
('Running', 0.00, 'CSE303', '0805058', 'A'),
('Running', NULL, 'CSE304', '0805058', 'A2'),
('Running', NULL, 'CSE305', '0805058', 'A'),
('Running', NULL, 'CSE307', '0805058', 'A'),
('Running', NULL, 'CSE308', '0805058', 'A2'),
('Running', NULL, 'CSE309', '0805058', 'A'),
('Running', NULL, 'CSE310', '0805058', 'A2'),
('Running', NULL, 'CSE311', '0805058', 'A'),
('Running', 0.00, 'CSE303', '0805059', 'A'),
('Running', NULL, 'CSE304', '0805059', 'A2'),
('Running', NULL, 'CSE305', '0805059', 'A'),
('Running', NULL, 'CSE307', '0805059', 'A'),
('Running', NULL, 'CSE308', '0805059', 'A2'),
('Running', NULL, 'CSE309', '0805059', 'A'),
('Running', NULL, 'CSE310', '0805059', 'A2'),
('Running', NULL, 'CSE311', '0805059', 'A'),
('Running', 0.00, 'CSE303', '0805060', 'A'),
('Running', NULL, 'CSE304', '0805060', 'A2'),
('Running', NULL, 'CSE305', '0805060', 'A'),
('Running', NULL, 'CSE307', '0805060', 'A'),
('Running', NULL, 'CSE308', '0805060', 'A2'),
('Running', NULL, 'CSE309', '0805060', 'A'),
('Running', NULL, 'CSE310', '0805060', 'A2'),
('Running', NULL, 'CSE311', '0805060', 'A'),
('Running', 0.00, 'CSE303', '0805061', 'B'),
('Running', NULL, 'CSE304', '0805061', 'B1'),
('Running', NULL, 'CSE305', '0805061', 'B'),
('Running', NULL, 'CSE307', '0805061', 'B'),
('Running', NULL, 'CSE308', '0805061', 'B1'),
('Running', NULL, 'CSE309', '0805061', 'B'),
('Running', NULL, 'CSE310', '0805061', 'B1'),
('Running', NULL, 'CSE311', '0805061', 'B'),
('Running', 0.00, 'CSE303', '0805062', 'B'),
('Running', NULL, 'CSE304', '0805062', 'B1'),
('Running', NULL, 'CSE305', '0805062', 'B'),
('Running', NULL, 'CSE307', '0805062', 'B'),
('Running', NULL, 'CSE308', '0805062', 'B1'),
('Running', NULL, 'CSE309', '0805062', 'B'),
('Running', NULL, 'CSE310', '0805062', 'B1'),
('Running', NULL, 'CSE311', '0805062', 'B'),
('Running', 0.00, 'CSE303', '0805063', 'B'),
('Running', NULL, 'CSE304', '0805063', 'B1'),
('Running', NULL, 'CSE305', '0805063', 'B'),
('Running', NULL, 'CSE307', '0805063', 'B'),
('Running', NULL, 'CSE308', '0805063', 'B1'),
('Running', NULL, 'CSE309', '0805063', 'B'),
('Running', NULL, 'CSE310', '0805063', 'B1'),
('Running', NULL, 'CSE311', '0805063', 'B'),
('Running', 0.00, 'CSE303', '0805064', 'B'),
('Running', NULL, 'CSE304', '0805064', 'B1'),
('Running', NULL, 'CSE305', '0805064', 'B'),
('Running', NULL, 'CSE307', '0805064', 'B'),
('Running', NULL, 'CSE308', '0805064', 'B1'),
('Running', NULL, 'CSE309', '0805064', 'B'),
('Running', NULL, 'CSE310', '0805064', 'B1'),
('Running', NULL, 'CSE311', '0805064', 'B'),
('Running', 0.00, 'CSE303', '0805065', 'B'),
('Running', NULL, 'CSE304', '0805065', 'B1'),
('Running', NULL, 'CSE305', '0805065', 'B'),
('Running', NULL, 'CSE307', '0805065', 'B'),
('Running', NULL, 'CSE308', '0805065', 'B1'),
('Running', NULL, 'CSE309', '0805065', 'B'),
('Running', NULL, 'CSE310', '0805065', 'B1'),
('Running', NULL, 'CSE311', '0805065', 'B'),
('Running', 0.00, 'CSE303', '0805066', 'B'),
('Running', NULL, 'CSE304', '0805066', 'B1'),
('Running', NULL, 'CSE305', '0805066', 'B'),
('Running', NULL, 'CSE307', '0805066', 'B'),
('Running', NULL, 'CSE308', '0805066', 'B1'),
('Running', NULL, 'CSE309', '0805066', 'B'),
('Running', NULL, 'CSE310', '0805066', 'B1'),
('Running', NULL, 'CSE311', '0805066', 'B'),
('Running', 0.00, 'CSE303', '0805067', 'B'),
('Running', NULL, 'CSE304', '0805067', 'B1'),
('Running', NULL, 'CSE305', '0805067', 'B'),
('Running', NULL, 'CSE307', '0805067', 'B'),
('Running', NULL, 'CSE308', '0805067', 'B1'),
('Running', NULL, 'CSE309', '0805067', 'B'),
('Running', NULL, 'CSE310', '0805067', 'B1'),
('Running', NULL, 'CSE311', '0805067', 'B'),
('Running', 0.00, 'CSE303', '0805068', 'B'),
('Running', NULL, 'CSE304', '0805068', 'B1'),
('Running', NULL, 'CSE305', '0805068', 'B'),
('Running', NULL, 'CSE307', '0805068', 'B'),
('Running', NULL, 'CSE308', '0805068', 'B1'),
('Running', NULL, 'CSE309', '0805068', 'B'),
('Running', NULL, 'CSE310', '0805068', 'B1'),
('Running', NULL, 'CSE311', '0805068', 'B'),
('Running', 0.00, 'CSE303', '0805069', 'B'),
('Running', NULL, 'CSE304', '0805069', 'B1'),
('Running', NULL, 'CSE305', '0805069', 'B'),
('Running', NULL, 'CSE307', '0805069', 'B'),
('Running', NULL, 'CSE308', '0805069', 'B1'),
('Running', NULL, 'CSE309', '0805069', 'B'),
('Running', NULL, 'CSE310', '0805069', 'B1'),
('Running', NULL, 'CSE311', '0805069', 'B'),
('Running', 0.00, 'CSE303', '0805070', 'B'),
('Running', NULL, 'CSE304', '0805070', 'B1'),
('Running', NULL, 'CSE305', '0805070', 'B'),
('Running', NULL, 'CSE307', '0805070', 'B'),
('Running', NULL, 'CSE308', '0805070', 'B1'),
('Running', NULL, 'CSE309', '0805070', 'B'),
('Running', NULL, 'CSE310', '0805070', 'B1'),
('Running', NULL, 'CSE311', '0805070', 'B'),
('Running', 0.00, 'CSE303', '0805071', 'B'),
('Running', NULL, 'CSE304', '0805071', 'B1'),
('Running', NULL, 'CSE305', '0805071', 'B'),
('Running', NULL, 'CSE307', '0805071', 'B'),
('Running', NULL, 'CSE308', '0805071', 'B1'),
('Running', NULL, 'CSE309', '0805071', 'B'),
('Running', NULL, 'CSE310', '0805071', 'B1'),
('Running', NULL, 'CSE311', '0805071', 'B'),
('Running', 0.00, 'CSE303', '0805072', 'B'),
('Running', NULL, 'CSE304', '0805072', 'B1'),
('Running', NULL, 'CSE305', '0805072', 'B'),
('Running', NULL, 'CSE307', '0805072', 'B'),
('Running', NULL, 'CSE308', '0805072', 'B1'),
('Running', NULL, 'CSE309', '0805072', 'B'),
('Running', NULL, 'CSE310', '0805072', 'B1'),
('Running', NULL, 'CSE311', '0805072', 'B'),
('Running', 0.00, 'CSE303', '0805073', 'B'),
('Running', NULL, 'CSE304', '0805073', 'B1'),
('Running', NULL, 'CSE305', '0805073', 'B'),
('Running', NULL, 'CSE307', '0805073', 'B'),
('Running', NULL, 'CSE308', '0805073', 'B1'),
('Running', NULL, 'CSE309', '0805073', 'B'),
('Running', NULL, 'CSE310', '0805073', 'B1'),
('Running', NULL, 'CSE311', '0805073', 'B'),
('Running', 0.00, 'CSE303', '0805074', 'B'),
('Running', NULL, 'CSE304', '0805074', 'B1'),
('Running', NULL, 'CSE305', '0805074', 'B'),
('Running', NULL, 'CSE307', '0805074', 'B'),
('Running', NULL, 'CSE308', '0805074', 'B1'),
('Running', NULL, 'CSE309', '0805074', 'B'),
('Running', NULL, 'CSE310', '0805074', 'B1'),
('Running', NULL, 'CSE311', '0805074', 'B'),
('Running', 0.00, 'CSE303', '0805075', 'B'),
('Running', NULL, 'CSE304', '0805075', 'B1'),
('Running', NULL, 'CSE305', '0805075', 'B'),
('Running', NULL, 'CSE307', '0805075', 'B'),
('Running', NULL, 'CSE308', '0805075', 'B1'),
('Running', NULL, 'CSE309', '0805075', 'B'),
('Running', NULL, 'CSE310', '0805075', 'B1'),
('Running', NULL, 'CSE311', '0805075', 'B'),
('Running', 0.00, 'CSE303', '0805076', 'B'),
('Running', NULL, 'CSE304', '0805076', 'B1'),
('Running', NULL, 'CSE305', '0805076', 'B'),
('Running', NULL, 'CSE307', '0805076', 'B'),
('Running', NULL, 'CSE308', '0805076', 'B1'),
('Running', NULL, 'CSE309', '0805076', 'B'),
('Running', NULL, 'CSE310', '0805076', 'B1'),
('Running', NULL, 'CSE311', '0805076', 'B'),
('Running', 0.00, 'CSE303', '0805077', 'B'),
('Running', NULL, 'CSE304', '0805077', 'B1'),
('Running', NULL, 'CSE305', '0805077', 'B'),
('Running', NULL, 'CSE307', '0805077', 'B'),
('Running', NULL, 'CSE308', '0805077', 'B1'),
('Running', NULL, 'CSE309', '0805077', 'B'),
('Running', NULL, 'CSE310', '0805077', 'B1'),
('Running', NULL, 'CSE311', '0805077', 'B'),
('Running', 0.00, 'CSE303', '0805078', 'B'),
('Running', NULL, 'CSE304', '0805078', 'B1'),
('Running', NULL, 'CSE305', '0805078', 'B'),
('Running', NULL, 'CSE307', '0805078', 'B'),
('Running', NULL, 'CSE308', '0805078', 'B1'),
('Running', NULL, 'CSE309', '0805078', 'B'),
('Running', NULL, 'CSE310', '0805078', 'B1'),
('Running', NULL, 'CSE311', '0805078', 'B'),
('Running', 0.00, 'CSE303', '0805079', 'B'),
('Running', NULL, 'CSE304', '0805079', 'B1'),
('Running', NULL, 'CSE305', '0805079', 'B'),
('Running', NULL, 'CSE307', '0805079', 'B'),
('Running', NULL, 'CSE308', '0805079', 'B1'),
('Running', NULL, 'CSE309', '0805079', 'B'),
('Running', NULL, 'CSE310', '0805079', 'B1'),
('Running', NULL, 'CSE311', '0805079', 'B'),
('Running', 0.00, 'CSE303', '0805080', 'B'),
('Running', NULL, 'CSE304', '0805080', 'B1'),
('Running', NULL, 'CSE305', '0805080', 'B'),
('Running', NULL, 'CSE307', '0805080', 'B'),
('Running', NULL, 'CSE308', '0805080', 'B1'),
('Running', NULL, 'CSE309', '0805080', 'B'),
('Running', NULL, 'CSE310', '0805080', 'B1'),
('Running', NULL, 'CSE311', '0805080', 'B'),
('Running', 0.00, 'CSE303', '0805081', 'B'),
('Running', NULL, 'CSE304', '0805081', 'B1'),
('Running', NULL, 'CSE305', '0805081', 'B'),
('Running', NULL, 'CSE307', '0805081', 'B'),
('Running', NULL, 'CSE308', '0805081', 'B1'),
('Running', NULL, 'CSE309', '0805081', 'B'),
('Running', NULL, 'CSE310', '0805081', 'B1'),
('Running', NULL, 'CSE311', '0805081', 'B'),
('Running', 0.00, 'CSE303', '0805082', 'B'),
('Running', NULL, 'CSE304', '0805082', 'B1'),
('Running', NULL, 'CSE305', '0805082', 'B'),
('Running', NULL, 'CSE307', '0805082', 'B'),
('Running', NULL, 'CSE308', '0805082', 'B1'),
('Running', NULL, 'CSE309', '0805082', 'B'),
('Running', NULL, 'CSE310', '0805082', 'B1'),
('Running', NULL, 'CSE311', '0805082', 'B'),
('Running', 0.00, 'CSE303', '0805083', 'B'),
('Running', NULL, 'CSE304', '0805083', 'B1'),
('Running', NULL, 'CSE305', '0805083', 'B'),
('Running', NULL, 'CSE307', '0805083', 'B'),
('Running', NULL, 'CSE308', '0805083', 'B1'),
('Running', NULL, 'CSE309', '0805083', 'B'),
('Running', NULL, 'CSE310', '0805083', 'B1'),
('Running', NULL, 'CSE311', '0805083', 'B'),
('Running', 0.00, 'CSE303', '0805084', 'B'),
('Running', NULL, 'CSE304', '0805084', 'B1'),
('Running', NULL, 'CSE305', '0805084', 'B'),
('Running', NULL, 'CSE307', '0805084', 'B'),
('Running', NULL, 'CSE308', '0805084', 'B1'),
('Running', NULL, 'CSE309', '0805084', 'B'),
('Running', NULL, 'CSE310', '0805084', 'B1'),
('Running', NULL, 'CSE311', '0805084', 'B'),
('Running', 0.00, 'CSE303', '0805085', 'B'),
('Running', NULL, 'CSE304', '0805085', 'B1'),
('Running', NULL, 'CSE305', '0805085', 'B'),
('Running', NULL, 'CSE307', '0805085', 'B'),
('Running', NULL, 'CSE308', '0805085', 'B1'),
('Running', NULL, 'CSE309', '0805085', 'B'),
('Running', NULL, 'CSE310', '0805085', 'B1'),
('Running', NULL, 'CSE311', '0805085', 'B'),
('Running', 0.00, 'CSE303', '0805086', 'B'),
('Running', NULL, 'CSE304', '0805086', 'B1'),
('Running', NULL, 'CSE305', '0805086', 'B'),
('Running', NULL, 'CSE307', '0805086', 'B'),
('Running', NULL, 'CSE308', '0805086', 'B1'),
('Running', NULL, 'CSE309', '0805086', 'B'),
('Running', NULL, 'CSE310', '0805086', 'B1'),
('Running', NULL, 'CSE311', '0805086', 'B'),
('Running', 0.00, 'CSE303', '0805087', 'B'),
('Running', NULL, 'CSE304', '0805087', 'B1'),
('Running', NULL, 'CSE305', '0805087', 'B'),
('Running', NULL, 'CSE307', '0805087', 'B'),
('Running', NULL, 'CSE308', '0805087', 'B1'),
('Running', NULL, 'CSE309', '0805087', 'B'),
('Running', NULL, 'CSE310', '0805087', 'B1'),
('Running', NULL, 'CSE311', '0805087', 'B'),
('Running', 0.00, 'CSE303', '0805088', 'B'),
('Running', NULL, 'CSE304', '0805088', 'B1'),
('Running', NULL, 'CSE305', '0805088', 'B'),
('Running', NULL, 'CSE307', '0805088', 'B'),
('Running', NULL, 'CSE308', '0805088', 'B1'),
('Running', NULL, 'CSE309', '0805088', 'B'),
('Running', NULL, 'CSE310', '0805088', 'B1'),
('Running', NULL, 'CSE311', '0805088', 'B'),
('Running', 0.00, 'CSE303', '0805089', 'B'),
('Running', NULL, 'CSE304', '0805089', 'B1'),
('Running', NULL, 'CSE305', '0805089', 'B'),
('Running', NULL, 'CSE307', '0805089', 'B'),
('Running', NULL, 'CSE308', '0805089', 'B1'),
('Running', NULL, 'CSE309', '0805089', 'B'),
('Running', NULL, 'CSE310', '0805089', 'B1'),
('Running', NULL, 'CSE311', '0805089', 'B'),
('Running', 0.00, 'CSE303', '0805090', 'B'),
('Running', NULL, 'CSE304', '0805090', 'B1'),
('Running', NULL, 'CSE305', '0805090', 'B'),
('Running', NULL, 'CSE307', '0805090', 'B'),
('Running', NULL, 'CSE308', '0805090', 'B1'),
('Running', NULL, 'CSE309', '0805090', 'B'),
('Running', NULL, 'CSE310', '0805090', 'B1'),
('Running', NULL, 'CSE311', '0805090', 'B'),
('Running', 0.00, 'CSE303', '0805091', 'B'),
('Running', NULL, 'CSE304', '0805091', 'B2'),
('Running', NULL, 'CSE305', '0805091', 'B'),
('Running', NULL, 'CSE307', '0805091', 'B'),
('Running', NULL, 'CSE308', '0805091', 'B2'),
('Running', NULL, 'CSE309', '0805091', 'B'),
('Running', NULL, 'CSE310', '0805091', 'B2'),
('Running', NULL, 'CSE311', '0805091', 'B'),
('Running', 0.00, 'CSE303', '0805092', 'B'),
('Running', NULL, 'CSE304', '0805092', 'B2'),
('Running', NULL, 'CSE305', '0805092', 'B'),
('Running', NULL, 'CSE307', '0805092', 'B'),
('Running', NULL, 'CSE308', '0805092', 'B2'),
('Running', NULL, 'CSE309', '0805092', 'B'),
('Running', NULL, 'CSE310', '0805092', 'B2'),
('Running', NULL, 'CSE311', '0805092', 'B'),
('Running', 0.00, 'CSE303', '0805093', 'B'),
('Running', NULL, 'CSE304', '0805093', 'B2'),
('Running', NULL, 'CSE305', '0805093', 'B'),
('Running', NULL, 'CSE307', '0805093', 'B'),
('Running', NULL, 'CSE308', '0805093', 'B2'),
('Running', NULL, 'CSE309', '0805093', 'B'),
('Running', NULL, 'CSE310', '0805093', 'B2'),
('Running', NULL, 'CSE311', '0805093', 'B'),
('Running', 0.00, 'CSE303', '0805094', 'B'),
('Running', NULL, 'CSE304', '0805094', 'B2'),
('Running', NULL, 'CSE305', '0805094', 'B'),
('Running', NULL, 'CSE307', '0805094', 'B'),
('Running', NULL, 'CSE308', '0805094', 'B2'),
('Running', NULL, 'CSE309', '0805094', 'B'),
('Running', NULL, 'CSE310', '0805094', 'B2'),
('Running', NULL, 'CSE311', '0805094', 'B'),
('Running', 0.00, 'CSE303', '0805095', 'B'),
('Running', NULL, 'CSE304', '0805095', 'B2'),
('Running', NULL, 'CSE305', '0805095', 'B'),
('Running', NULL, 'CSE307', '0805095', 'B'),
('Running', NULL, 'CSE308', '0805095', 'B2'),
('Running', NULL, 'CSE309', '0805095', 'B'),
('Running', NULL, 'CSE310', '0805095', 'B2'),
('Running', NULL, 'CSE311', '0805095', 'B'),
('Running', 0.00, 'CSE303', '0805096', 'B'),
('Running', NULL, 'CSE304', '0805096', 'B2'),
('Running', NULL, 'CSE305', '0805096', 'B'),
('Running', NULL, 'CSE307', '0805096', 'B'),
('Running', NULL, 'CSE308', '0805096', 'B2'),
('Running', NULL, 'CSE309', '0805096', 'B'),
('Running', NULL, 'CSE310', '0805096', 'B2'),
('Running', NULL, 'CSE311', '0805096', 'B'),
('Running', 0.00, 'CSE303', '0805097', 'B'),
('Running', NULL, 'CSE304', '0805097', 'B2'),
('Running', NULL, 'CSE305', '0805097', 'B'),
('Running', NULL, 'CSE307', '0805097', 'B'),
('Running', NULL, 'CSE308', '0805097', 'B2'),
('Running', NULL, 'CSE309', '0805097', 'B'),
('Running', NULL, 'CSE310', '0805097', 'B2'),
('Running', NULL, 'CSE311', '0805097', 'B'),
('Running', 0.00, 'CSE303', '0805098', 'B'),
('Running', NULL, 'CSE304', '0805098', 'B2'),
('Running', NULL, 'CSE305', '0805098', 'B'),
('Running', NULL, 'CSE307', '0805098', 'B'),
('Running', NULL, 'CSE308', '0805098', 'B2'),
('Running', NULL, 'CSE309', '0805098', 'B'),
('Running', NULL, 'CSE310', '0805098', 'B2'),
('Running', NULL, 'CSE311', '0805098', 'B'),
('Running', 0.00, 'CSE303', '0805099', 'B'),
('Running', NULL, 'CSE304', '0805099', 'B2'),
('Running', NULL, 'CSE305', '0805099', 'B'),
('Running', NULL, 'CSE307', '0805099', 'B'),
('Running', NULL, 'CSE308', '0805099', 'B2'),
('Running', NULL, 'CSE309', '0805099', 'B'),
('Running', NULL, 'CSE310', '0805099', 'B2'),
('Running', NULL, 'CSE311', '0805099', 'B'),
('Running', 0.00, 'CSE303', '0805100', 'B'),
('Running', NULL, 'CSE304', '0805100', 'B2'),
('Running', NULL, 'CSE305', '0805100', 'B'),
('Running', NULL, 'CSE307', '0805100', 'B'),
('Running', NULL, 'CSE308', '0805100', 'B2'),
('Running', NULL, 'CSE309', '0805100', 'B'),
('Running', NULL, 'CSE310', '0805100', 'B2'),
('Running', NULL, 'CSE311', '0805100', 'B'),
('Running', 0.00, 'CSE303', '0805101', 'B'),
('Running', NULL, 'CSE304', '0805101', 'B2'),
('Running', NULL, 'CSE305', '0805101', 'B'),
('Running', NULL, 'CSE307', '0805101', 'B'),
('Running', NULL, 'CSE308', '0805101', 'B2'),
('Running', NULL, 'CSE309', '0805101', 'B'),
('Running', NULL, 'CSE310', '0805101', 'B2'),
('Running', NULL, 'CSE311', '0805101', 'B'),
('Running', 0.00, 'CSE303', '0805102', 'B'),
('Running', NULL, 'CSE304', '0805102', 'B2'),
('Running', NULL, 'CSE305', '0805102', 'B'),
('Running', NULL, 'CSE307', '0805102', 'B'),
('Running', NULL, 'CSE308', '0805102', 'B2'),
('Running', NULL, 'CSE309', '0805102', 'B'),
('Running', NULL, 'CSE310', '0805102', 'B2'),
('Running', NULL, 'CSE311', '0805102', 'B'),
('Running', 0.00, 'CSE303', '0805103', 'B'),
('Running', NULL, 'CSE304', '0805103', 'B2'),
('Running', NULL, 'CSE305', '0805103', 'B'),
('Running', NULL, 'CSE307', '0805103', 'B'),
('Running', NULL, 'CSE308', '0805103', 'B2'),
('Running', NULL, 'CSE309', '0805103', 'B'),
('Running', NULL, 'CSE310', '0805103', 'B2'),
('Running', NULL, 'CSE311', '0805103', 'B'),
('Running', 0.00, 'CSE303', '0805104', 'B'),
('Running', NULL, 'CSE304', '0805104', 'B2'),
('Running', NULL, 'CSE305', '0805104', 'B'),
('Running', NULL, 'CSE307', '0805104', 'B'),
('Running', NULL, 'CSE308', '0805104', 'B2'),
('Running', NULL, 'CSE309', '0805104', 'B'),
('Running', NULL, 'CSE310', '0805104', 'B2'),
('Running', NULL, 'CSE311', '0805104', 'B'),
('Running', 0.00, 'CSE303', '0805105', 'B'),
('Running', NULL, 'CSE304', '0805105', 'B2'),
('Running', NULL, 'CSE305', '0805105', 'B'),
('Running', NULL, 'CSE307', '0805105', 'B'),
('Running', NULL, 'CSE308', '0805105', 'B2'),
('Running', NULL, 'CSE309', '0805105', 'B'),
('Running', NULL, 'CSE310', '0805105', 'B2'),
('Running', NULL, 'CSE311', '0805105', 'B'),
('Running', 0.00, 'CSE303', '0805106', 'B'),
('Running', NULL, 'CSE304', '0805106', 'B2'),
('Running', NULL, 'CSE305', '0805106', 'B'),
('Running', NULL, 'CSE307', '0805106', 'B'),
('Running', NULL, 'CSE308', '0805106', 'B2'),
('Running', NULL, 'CSE309', '0805106', 'B'),
('Running', NULL, 'CSE310', '0805106', 'B2'),
('Running', NULL, 'CSE311', '0805106', 'B'),
('Running', 0.00, 'CSE303', '0805107', 'B'),
('Running', NULL, 'CSE304', '0805107', 'B2'),
('Running', NULL, 'CSE305', '0805107', 'B'),
('Running', NULL, 'CSE307', '0805107', 'B'),
('Running', NULL, 'CSE308', '0805107', 'B2'),
('Running', NULL, 'CSE309', '0805107', 'B'),
('Running', NULL, 'CSE310', '0805107', 'B2'),
('Running', NULL, 'CSE311', '0805107', 'B'),
('Running', 0.00, 'CSE303', '0805108', 'B'),
('Running', NULL, 'CSE304', '0805108', 'B2'),
('Running', NULL, 'CSE305', '0805108', 'B'),
('Running', NULL, 'CSE307', '0805108', 'B'),
('Running', NULL, 'CSE308', '0805108', 'B2'),
('Running', NULL, 'CSE309', '0805108', 'B'),
('Running', NULL, 'CSE310', '0805108', 'B2'),
('Running', NULL, 'CSE311', '0805108', 'B'),
('Running', 0.00, 'CSE303', '0805109', 'B'),
('Running', NULL, 'CSE304', '0805109', 'B2'),
('Running', NULL, 'CSE305', '0805109', 'B'),
('Running', NULL, 'CSE307', '0805109', 'B'),
('Running', NULL, 'CSE308', '0805109', 'B2'),
('Running', NULL, 'CSE309', '0805109', 'B'),
('Running', NULL, 'CSE310', '0805109', 'B2'),
('Running', NULL, 'CSE311', '0805109', 'B'),
('Running', 0.00, 'CSE303', '0805110', 'B'),
('Running', NULL, 'CSE304', '0805110', 'B2'),
('Running', NULL, 'CSE305', '0805110', 'B'),
('Running', NULL, 'CSE307', '0805110', 'B'),
('Running', NULL, 'CSE308', '0805110', 'B2'),
('Running', NULL, 'CSE309', '0805110', 'B'),
('Running', NULL, 'CSE310', '0805110', 'B2'),
('Running', NULL, 'CSE311', '0805110', 'B'),
('Running', 0.00, 'CSE303', '0805111', 'B'),
('Running', NULL, 'CSE304', '0805111', 'B2'),
('Running', NULL, 'CSE305', '0805111', 'B'),
('Running', NULL, 'CSE307', '0805111', 'B'),
('Running', NULL, 'CSE308', '0805111', 'B2'),
('Running', NULL, 'CSE309', '0805111', 'B'),
('Running', NULL, 'CSE310', '0805111', 'B2'),
('Running', NULL, 'CSE311', '0805111', 'B'),
('Running', 0.00, 'CSE303', '0805112', 'B'),
('Running', NULL, 'CSE304', '0805112', 'B2'),
('Running', NULL, 'CSE305', '0805112', 'B'),
('Running', NULL, 'CSE307', '0805112', 'B'),
('Running', NULL, 'CSE308', '0805112', 'B2'),
('Running', NULL, 'CSE309', '0805112', 'B'),
('Running', NULL, 'CSE310', '0805112', 'B2'),
('Running', NULL, 'CSE311', '0805112', 'B'),
('Running', 0.00, 'CSE303', '0805113', 'B'),
('Running', NULL, 'CSE304', '0805113', 'B2'),
('Running', NULL, 'CSE305', '0805113', 'B'),
('Running', NULL, 'CSE307', '0805113', 'B'),
('Running', NULL, 'CSE308', '0805113', 'B2'),
('Running', NULL, 'CSE309', '0805113', 'B'),
('Running', NULL, 'CSE310', '0805113', 'B2'),
('Running', NULL, 'CSE311', '0805113', 'B'),
('Running', 0.00, 'CSE303', '0805114', 'B'),
('Running', NULL, 'CSE304', '0805114', 'B2'),
('Running', NULL, 'CSE305', '0805114', 'B'),
('Running', NULL, 'CSE307', '0805114', 'B'),
('Running', NULL, 'CSE308', '0805114', 'B2'),
('Running', NULL, 'CSE309', '0805114', 'B'),
('Running', NULL, 'CSE310', '0805114', 'B2'),
('Running', NULL, 'CSE311', '0805114', 'B'),
('Running', 0.00, 'CSE303', '0805115', 'B'),
('Running', NULL, 'CSE304', '0805115', 'B2'),
('Running', NULL, 'CSE305', '0805115', 'B'),
('Running', NULL, 'CSE307', '0805115', 'B'),
('Running', NULL, 'CSE308', '0805115', 'B2'),
('Running', NULL, 'CSE309', '0805115', 'B'),
('Running', NULL, 'CSE310', '0805115', 'B2'),
('Running', NULL, 'CSE311', '0805115', 'B'),
('Running', 0.00, 'CSE303', '0805116', 'B'),
('Running', NULL, 'CSE304', '0805116', 'B2'),
('Running', NULL, 'CSE305', '0805116', 'B'),
('Running', NULL, 'CSE307', '0805116', 'B'),
('Running', NULL, 'CSE308', '0805116', 'B2'),
('Running', NULL, 'CSE309', '0805116', 'B'),
('Running', NULL, 'CSE310', '0805116', 'B2'),
('Running', NULL, 'CSE311', '0805116', 'B'),
('Running', 0.00, 'CSE303', '0805117', 'B'),
('Running', NULL, 'CSE304', '0805117', 'B2'),
('Running', NULL, 'CSE305', '0805117', 'B'),
('Running', NULL, 'CSE307', '0805117', 'B'),
('Running', NULL, 'CSE308', '0805117', 'B2'),
('Running', NULL, 'CSE309', '0805117', 'B'),
('Running', NULL, 'CSE310', '0805117', 'B2'),
('Running', NULL, 'CSE311', '0805117', 'B'),
('Running', 0.00, 'CSE303', '0805118', 'B'),
('Running', NULL, 'CSE304', '0805118', 'B2'),
('Running', NULL, 'CSE305', '0805118', 'B'),
('Running', NULL, 'CSE307', '0805118', 'B'),
('Running', NULL, 'CSE308', '0805118', 'B2'),
('Running', NULL, 'CSE309', '0805118', 'B'),
('Running', NULL, 'CSE310', '0805118', 'B2'),
('Running', NULL, 'CSE311', '0805118', 'B'),
('Running', 0.00, 'CSE303', '0805119', 'B'),
('Running', NULL, 'CSE304', '0805119', 'B2'),
('Running', NULL, 'CSE305', '0805119', 'B'),
('Running', NULL, 'CSE307', '0805119', 'B'),
('Running', NULL, 'CSE308', '0805119', 'B2'),
('Running', NULL, 'CSE309', '0805119', 'B'),
('Running', NULL, 'CSE310', '0805119', 'B2'),
('Running', NULL, 'CSE311', '0805119', 'B'),
('Running', 0.00, 'CSE303', '0805120', 'B'),
('Running', NULL, 'CSE304', '0805120', 'B2'),
('Running', NULL, 'CSE305', '0805120', 'B'),
('Running', NULL, 'CSE307', '0805120', 'B'),
('Running', NULL, 'CSE308', '0805120', 'B2'),
('Running', NULL, 'CSE309', '0805120', 'B'),
('Running', NULL, 'CSE310', '0805120', 'B2'),
('Running', NULL, 'CSE311', '0805120', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `Name` varchar(50) DEFAULT NULL,
  `T_Id` varchar(10) NOT NULL,
  `Password` varchar(30) DEFAULT NULL,
  `Dept_Id` varchar(6) DEFAULT NULL,
  `Designation` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`T_Id`),
  KEY `Dept_Id` (`Dept_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`Name`, `T_Id`, `Password`, `Dept_Id`, `Designation`) VALUES
('Rajkumar Das', '05001', '1234', 'CSE', 'Assistant Professor'),
('Dr. A.S.M. Latiful Hoque', '05002', '1234', 'CSE', 'Professor'),
('Mahfuza Sarmin', '05003', '1234', 'CSE', 'Lecturer'),
('Rezwana Riaz', '05004', '1234', 'CSE', 'Lecturer'),
('Hasan Shahid Ferdous', '05005', '1234', 'CSE', 'Assistant Professor'),
('Khaled Mahmud Sahriar', '05006', '1234', 'CSE', 'Assistant Professor'),
('Mostafijur Rahman', '05007', '1234', 'CSE', 'Lecturer'),
('Sumaiya Iqbal', '05008', '1234', 'CSE', 'Lecturer'),
('Sumaiya Nazneen', '05009', '1234', 'CSE', 'Lecturer'),
('Shahriar Rouf', '05010', '1234', 'CSE', 'Lecturer'),
('Shaifur Rahman', '05011', '1234', 'CSE', 'Lecturer'),
('Dr. Eunus Ali', '05012', '1234', 'CSE', 'Assistant Professor'),
('Shahrear Iqbal', '05013', '1234', 'CSE', 'Assistant Professor'),
('Nashid Shahrear', '05014', '1234', 'CSE', 'Lecture'),
('Dr. Masroor Ali', '05015', '1234', 'CSE', 'Professor'),
('Abdus salam azad', '05550', '1234', 'CSE', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `termfinalexam`
--

CREATE TABLE IF NOT EXISTS `termfinalexam` (
  `CourseNo` varchar(10) NOT NULL DEFAULT '',
  `Sec` varchar(2) NOT NULL DEFAULT '',
  `eDate` date NOT NULL DEFAULT '0000-00-00',
  `eTime` varchar(10) NOT NULL DEFAULT '',
  `Duration` varchar(5) DEFAULT NULL,
  `Location` varchar(15) DEFAULT NULL,
  `eType` varchar(10) DEFAULT NULL,
  `Topic` varchar(30) DEFAULT NULL,
  `FileLocation` varchar(30) DEFAULT NULL,
  `S_Id` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`CourseNo`,`Sec`,`eDate`,`eTime`,`S_Id`),
  KEY `CourseNo` (`CourseNo`,`S_Id`),
  KEY `S_Id` (`S_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignedcourse`
--
ALTER TABLE `assignedcourse`
  ADD CONSTRAINT `assignedcourse_ibfk_1` FOREIGN KEY (`T_Id`) REFERENCES `teacher` (`T_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignedcourse_ibfk_2` FOREIGN KEY (`CourseNo`) REFERENCES `course` (`CourseNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `classinfo`
--
ALTER TABLE `classinfo`
  ADD CONSTRAINT `classinfo_ibfk_1` FOREIGN KEY (`CourseNo`) REFERENCES `course` (`CourseNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `classinfo_ibfk_2` FOREIGN KEY (`by_teacher`) REFERENCES `assignedcourse` (`T_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`CourseNo`) REFERENCES `course` (`CourseNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`CourseNo`) REFERENCES `course` (`CourseNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`Dept_ID`) REFERENCES `department` (`Dept_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`CourseNo`) REFERENCES `course` (`CourseNo`);

--
-- Constraints for table `hascourse`
--
ALTER TABLE `hascourse`
  ADD CONSTRAINT `hascourse_ibfk_1` FOREIGN KEY (`Dept_Id`) REFERENCES `department` (`Dept_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hascourse_ibfk_2` FOREIGN KEY (`course_no`) REFERENCES `course` (`CourseNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message_group_student`
--
ALTER TABLE `message_group_student`
  ADD CONSTRAINT `message_group_student_ibfk_1` FOREIGN KEY (`CourseNo`) REFERENCES `course` (`CourseNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prerequisite`
--
ALTER TABLE `prerequisite`
  ADD CONSTRAINT `prerequisite_ibfk_1` FOREIGN KEY (`course_no_1`) REFERENCES `course` (`CourseNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prerequisite_ibfk_2` FOREIGN KEY (`course_no_2`) REFERENCES `course` (`CourseNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`Dept_id`) REFERENCES `department` (`Dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`Dept_id`) REFERENCES `department` (`Dept_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`Advisor`) REFERENCES `teacher` (`T_Id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `takencourse`
--
ALTER TABLE `takencourse`
  ADD CONSTRAINT `takencourse_ibfk_1` FOREIGN KEY (`CourseNo`) REFERENCES `course` (`CourseNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `takencourse_ibfk_2` FOREIGN KEY (`S_Id`) REFERENCES `student` (`S_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`Dept_Id`) REFERENCES `department` (`Dept_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `termfinalexam`
--
ALTER TABLE `termfinalexam`
  ADD CONSTRAINT `termfinalexam_ibfk_1` FOREIGN KEY (`CourseNo`) REFERENCES `course` (`CourseNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `termfinalexam_ibfk_2` FOREIGN KEY (`S_Id`) REFERENCES `student` (`S_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
