-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2019 at 03:41 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `Class_ID` int(11) NOT NULL,
  `Section` varchar(20) DEFAULT NULL,
  `Subject_Code` varchar(20) DEFAULT NULL,
  `Semester` varchar(16) DEFAULT NULL,
  `Academic_Year` char(9) DEFAULT NULL,
  `Schedule_Day` varchar(10) DEFAULT NULL,
  `Schedule_Time` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`Class_ID`, `Section`, `Subject_Code`, `Semester`, `Academic_Year`, `Schedule_Day`, `Schedule_Time`) VALUES
(5, '1', 'TLE-1', '2', '2018-2019', 'mon-tue', '10:00-12:00'),
(7, '1', '12', '2', '2018-2019', 'mon-tue', '11:00-12:00'),
(9, '3', 'BSed', '3', '2018-2019', 'tue-wed', '10:00-12:00'),
(10, '3A', '12', 'First Seme', '2018-2019', 'tue-wed', '10:00-12:00'),
(11, '2', '12', 'Second Semester', '2018-2019', 'mon-tue', '11:00-12:00');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Student_ID` varchar(20) NOT NULL,
  `First_Name` varchar(20) DEFAULT NULL,
  `Last_Name` varchar(20) DEFAULT NULL,
  `Middle_Initial` char(1) DEFAULT NULL,
  `Name_Extension` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Student_ID`, `First_Name`, `Last_Name`, `Middle_Initial`, `Name_Extension`) VALUES
('1115023', 'Julie Jane', 'Dumon', '-', ''),
('12300', 'Diane', 'CordeÃ±o', 'B', ''),
('456456', 'Edwin', 'Ending', 'E', 'III'),
('6106160028', 'Kenna Lou', 'Eseos', 'A', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_class`
--

CREATE TABLE `student_class` (
  `Student_ID` varchar(20) DEFAULT NULL,
  `Class_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_class`
--

INSERT INTO `student_class` (`Student_ID`, `Class_ID`) VALUES
('1115023', 5);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `Subject_Code` varchar(20) NOT NULL,
  `Subject_Title` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Subject_Code`, `Subject_Title`) VALUES
('12', 'twintwin'),
('BSed', 'Math'),
('TLE-1', 'Education');

-- --------------------------------------------------------

--
-- Table structure for table `take_attendance`
--

CREATE TABLE `take_attendance` (
  `Student_ID` varchar(20) DEFAULT NULL,
  `Time_Stamp` varchar(15) DEFAULT NULL,
  `Class_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`Class_ID`),
  ADD KEY `Subject_Code` (`Subject_Code`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Student_ID`);

--
-- Indexes for table `student_class`
--
ALTER TABLE `student_class`
  ADD KEY `Student_ID` (`Student_ID`),
  ADD KEY `Class_ID` (`Class_ID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`Subject_Code`);

--
-- Indexes for table `take_attendance`
--
ALTER TABLE `take_attendance`
  ADD KEY `Student_ID` (`Student_ID`),
  ADD KEY `Class_ID` (`Class_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `Class_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`Subject_Code`) REFERENCES `subject` (`Subject_Code`);

--
-- Constraints for table `student_class`
--
ALTER TABLE `student_class`
  ADD CONSTRAINT `student_class_ibfk_1` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`Student_ID`),
  ADD CONSTRAINT `student_class_ibfk_2` FOREIGN KEY (`Class_ID`) REFERENCES `class` (`Class_ID`);

--
-- Constraints for table `take_attendance`
--
ALTER TABLE `take_attendance`
  ADD CONSTRAINT `take_attendance_ibfk_1` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`Student_ID`),
  ADD CONSTRAINT `take_attendance_ibfk_2` FOREIGN KEY (`Class_ID`) REFERENCES `class` (`Class_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
