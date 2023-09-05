-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 03, 2023 at 03:27 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database2`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `advertID` varchar(10) NOT NULL,
  `adName` varchar(10) DEFAULT NULL,
  `adDescription` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseCode` varchar(10) NOT NULL,
  `courseTitle` varchar(50) DEFAULT NULL,
  `semester` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseCode`, `courseTitle`, `semester`) VALUES
('IA112', 'Introduction to Mathematical Security', 1),
('IT111', 'Introduction to information systems', 1);

-- --------------------------------------------------------

--
-- Table structure for table `degreeProg`
--

CREATE TABLE `degreeProg` (
  `progCode` varchar(10) NOT NULL,
  `progName` varchar(50) DEFAULT NULL,
  `dptID` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `degreeProg`
--

INSERT INTO `degreeProg` (`progCode`, `progName`, `dptID`) VALUES
('CSDFE1', 'Cyber Security and Digital Forensics Engineering', 'CSE'),
('TE1', 'Telecommunication Engineering', 'ETE');

-- --------------------------------------------------------

--
-- Table structure for table `degree_course`
--

CREATE TABLE `degree_course` (
  `courseCode` varchar(10) DEFAULT NULL,
  `progCode` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `degree_course`
--

INSERT INTO `degree_course` (`courseCode`, `progCode`) VALUES
('IT111', 'CSDFE1'),
('IT111', 'TE1'),
('IA112', 'CSDFE1'),
('IT111', 'CSDFE1');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dptID` varchar(10) NOT NULL,
  `dptName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dptID`, `dptName`) VALUES
('CSE', 'Computer Science and Engineering'),
('ETE', 'Electronics Telecommunications and Engineering'),
('IST', 'Information Systems and Technologies'),
('TE', 'Telecommunications and Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `psswd` varchar(255) DEFAULT NULL,
  `dptID` varchar(10) DEFAULT NULL,
  `supervisor` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`firstName`, `lastName`, `email`, `psswd`, `dptID`, `supervisor`) VALUES
('sample2', 'space2', 'samplespace2@st1210.com', 'password2', 'CSE', 'HOD'),
('sample3', 'space3', 'samplespace3@st1210.com', 'password3', 'ETE', 'HOD'),
('sample4', 'space4', 'samplespace4@st1210.com', 'password4', 'IST', 'HOD'),
('sample', 'space', 'samplespace@st1210.com', 'password', 'CSE', '');

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `id` int(11) NOT NULL,
  `issueID` varchar(10) DEFAULT NULL,
  `studentID` int(11) DEFAULT NULL,
  `issueName` varchar(50) DEFAULT NULL,
  `descriptions` varchar(255) DEFAULT NULL,
  `ATnumber` varchar(20) DEFAULT NULL,
  `Tnumber` varchar(20) DEFAULT NULL,
  `referenceDoc` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `issue_status` tinyint(1) DEFAULT NULL,
  `issue_comment` varchar(255) DEFAULT NULL,
  `refer_to` varchar(10) DEFAULT NULL,
  `refer_comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `randomID` int(11) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `middleName` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `ATnumber` varchar(20) DEFAULT NULL,
  `Tnumber` varchar(20) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `yos` int(1) DEFAULT NULL,
  `progCode` varchar(10) DEFAULT NULL,
  `psswd` varchar(255) DEFAULT NULL,
  `leadership` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`randomID`, `firstName`, `middleName`, `surname`, `ATnumber`, `Tnumber`, `gender`, `email`, `yos`, `progCode`, `psswd`, `leadership`) VALUES
(38, 'test', 'test', 'test', 'AT22-03-00001', '', 'M', 'sudo@gmail.com', 1, 'CSDFE1', '12345', NULL),
(39, 'test', 'test', 'test', 'AT22-03-00001', '', 'M', 'sudo@gmail.com', 1, 'CSDFE1', '12345', NULL),
(40, 'Sudo', 'anuari', 'we', 'at-00-0099', '', 'M', 'wewe@gmail.com', 1, 'CSDFE1', 'eeer', NULL),
(41, 'Sudo', 'anuari', 'we', 'at-00-0099', '', 'M', 'wewe@gmail.com', 1, 'CSDFE1', 'eeer', NULL),
(42, 'Sudo', 'anuari', 'we', 'at-00-0099', '', 'M', 'wewe@gmail.com', 1, 'CSDFE1', 'eeer', NULL),
(43, 'Sudo', 'anuari', 'we', 'at-00-0099', '', 'M', 'wewe@gmail.com', 1, 'CSDFE1', 'eeer', NULL),
(44, 'Sudo', 'anuari', 'we', 'at-00-0099', '', 'M', 'wewe@gmail.com', 1, 'CSDFE1', 'eeer', NULL),
(45, 'Sudo', 'anuari', 'we', 'at-00-0099', '', 'M', 'wewe@gmail.com', 1, 'CSDFE1', 'eeer', NULL),
(46, 'Sudo', 'anuari', 'we', 'at-00-0099', '', 'M', 'wewe@gmail.com', 1, 'CSDFE1', 'eeer', NULL),
(47, 'wwww', 'wwwww', 'wwwww', 'AT22-03-00001', '', 'M', '222222222@gmail.com', 1, 'CSDFE1', '12345678', NULL),
(48, 'wwww', 'wwwww', 'wwwww', 'AT22-03-00001', '', 'M', '222222222@gmail.com', 1, 'CSDFE1', '12345678', NULL),
(49, 'Sudo', 'test', 'sd', 'AT22-03-00001', '', 'M', 'wewe11111111@gmail.com', 1, 'CSDFE1', '123456788', NULL),
(50, 'Sudo', 'test', 'sd', 'AT22-03-00001', '', 'M', 'wewe11111111@gmail.com', 1, 'CSDFE1', '123456788', NULL),
(51, 'test', 'test', 'test', 'at-00-0000', '', 'M', 'sudo@gmail.com', 1, 'CSDFE1', '12345678', NULL),
(52, 'test', 'test', 'test', 'at-00-0000', '', 'M', 'sudo@gmail.com', 1, 'CSDFE1', '12345678', NULL),
(53, 'test', 'test', 'sd', 'qwqwqw', '', 'M', '665555554444@gmail.com', 1, 'CSDFE1', 'Abcdefghij1', NULL),
(54, 'test', 'test', 'sd', 'qwqwqw', '', 'M', '665555554444@gmail.com', 1, 'CSDFE1', 'Abcdefghij1', NULL),
(55, 'test', 'test', 'sd', 'qwqwqw', '', 'M', '665555554444@gmail.com', 1, 'CSDFE1', 'Abcdefghij1', NULL),
(56, 'test', 'test', 'sd', 'qwqwqw', '', 'M', '665555554444@gmail.com', 1, 'CSDFE1', 'Abcdefghij1', NULL),
(57, 'test', 'test', 'sd', 'qwqwqw', '', 'M', '665555554444@gmail.com', 1, 'CSDFE1', 'Abcdefghij1', NULL),
(58, 'test', 'test', 'sd', 'qwqwqw', '', 'M', '665555554444@gmail.com', 1, 'CSDFE1', 'Abcdefghij1', NULL),
(59, 'test', 'anuari', 'test', 'AT22-03-00001', '', 'F', 'sudo@gmail.com', 1, 'CSDFE1', '12345678Aa', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`advertID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseCode`);

--
-- Indexes for table `degreeProg`
--
ALTER TABLE `degreeProg`
  ADD PRIMARY KEY (`progCode`),
  ADD KEY `dptID` (`dptID`);

--
-- Indexes for table `degree_course`
--
ALTER TABLE `degree_course`
  ADD KEY `courseCode` (`courseCode`),
  ADD KEY `progCode` (`progCode`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dptID`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`email`),
  ADD KEY `dptID` (`dptID`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`randomID`),
  ADD KEY `progCode` (`progCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `randomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `degreeProg`
--
ALTER TABLE `degreeProg`
  ADD CONSTRAINT `degreeprog_ibfk_1` FOREIGN KEY (`dptID`) REFERENCES `department` (`dptID`);

--
-- Constraints for table `degree_course`
--
ALTER TABLE `degree_course`
  ADD CONSTRAINT `degree_course_ibfk_1` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`),
  ADD CONSTRAINT `degree_course_ibfk_2` FOREIGN KEY (`progCode`) REFERENCES `degreeProg` (`progCode`);

--
-- Constraints for table `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`dptID`) REFERENCES `department` (`dptID`);

--
-- Constraints for table `issues`
--
ALTER TABLE `issues`
  ADD CONSTRAINT `issues_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `student` (`randomID`),
  ADD CONSTRAINT `issues_ibfk_2` FOREIGN KEY (`email`) REFERENCES `instructor` (`email`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`progCode`) REFERENCES `degreeProg` (`progCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
