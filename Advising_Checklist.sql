-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 25, 2024 at 01:33 PM
-- Server version: 8.0.35
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Advising_Checklist`
--

-- --------------------------------------------------------

--
-- Table structure for table `Adviser`
--

CREATE TABLE `Adviser` (
  `AdviserID` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `A_FirstName` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `A_MiddleName` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `A_LastName` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `AdvisingProgram` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Adviser`
--

INSERT INTO `Adviser` (`AdviserID`, `A_FirstName`, `A_MiddleName`, `A_LastName`, `AdvisingProgram`) VALUES
('A001', 'Ashlyn', NULL, 'Balangcod', 'BS Computer Science'),
('A002', 'Deegie', NULL, 'Elopre', 'BS Mathematics');

-- --------------------------------------------------------

--
-- Table structure for table `Course`
--

CREATE TABLE `Course` (
  `CourseID` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `CourseDescription` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Units` tinyint DEFAULT NULL,
  `CourseComponents` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `College` varchar(40) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Department` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `GradingBasis` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Corequisite` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Course`
--

INSERT INTO `Course` (`CourseID`, `CourseDescription`, `Units`, `CourseComponents`, `College`, `Department`, `GradingBasis`, `Corequisite`) VALUES
('ARTS 1', 'Critical Perspectives in the Arts', 3, 'Lecture', 'College of Arts and Communication', 'Department of Language, Literature, and the Arts', 'Credited', NULL),
('CMSC 11', 'Introduction to Computer Sciences', 3, 'Lecture', 'College of Science', 'Department of Mathematics and Computer Science', 'Credited', NULL),
('MATH 10', 'Mathematics, Culture and Society', 3, 'Lecture', 'College of Science', 'Department of Mathematics and Computer Science', 'Credited', NULL),
('MATH 101', 'Elementary Statistics', 3, 'Lecture', 'College of Science', 'Department of Mathematics and Computer Science', 'Credited', NULL),
('MATH 53', 'Elementary Analysis I', 5, 'Lecture', 'College of Science', 'Department of Mathematics and Computer Science', 'Credited', NULL),
('PE 1', 'Foundations of Physical Fitness', 1, 'Lecture', 'Human Kinetics Program', 'Human Kinetics Program', 'Non-credited', NULL),
('PHYSICS 101', 'Fundamental Physics I (LEC)', 4, 'Lecture', 'College of Science', 'Department of Physics', 'Credited', 'PHYSICS 101.1'),
('PHYSICS 101.1', 'Fundamental Physics I (LAB)', 1, 'Laboratory', 'College of Science', 'Department of Physics', 'Credited', 'PHYSICS 101');

-- --------------------------------------------------------

--
-- Table structure for table `CoursePrerequisite`
--

CREATE TABLE `CoursePrerequisite` (
  `CourseID` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `Prerequisite` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `CoursePrerequisite`
--

INSERT INTO `CoursePrerequisite` (`CourseID`, `Prerequisite`) VALUES
('PHYSICS 101', 'MATH 53');

-- --------------------------------------------------------

--
-- Table structure for table `ProgramChecklist`
--

CREATE TABLE `ProgramChecklist` (
  `StudentProgram` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `CourseID` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `CourseType` text COLLATE utf8mb4_general_ci,
  `PrescribedYear` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `PrescribedSemester` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `DateLastUpdated` date NOT NULL,
  `TimeLastUpdated` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ProgramChecklist`
--

INSERT INTO `ProgramChecklist` (`StudentProgram`, `CourseID`, `CourseType`, `PrescribedYear`, `PrescribedSemester`, `DateLastUpdated`, `TimeLastUpdated`) VALUES
('BS Computer Science', 'CMSC 11', 'Major', '1st Year', '1st Semester', '2024-11-25', '15:38:57'),
('BS Computer Science', 'MATH 53', 'Foundation', '1st Year', '1st Semester', '2024-11-25', '15:38:57'),
('BS Computer Science', 'MATH 101', 'Foundation', '1st Year', '1st Semester', '2024-11-25', '15:38:57'),
('BS Computer Science', 'MATH 10', 'GE Requirements', '1st Year', '1st Semester', '2024-11-25', '15:38:57'),
('BS Computer Science', 'ARTS 1', 'GE Requirements', '1st Year', '1st Semester', '2024-11-25', '15:38:57'),
('BS Computer Science', 'PE 1', 'Other Required', '1st Year', '1st Semester', '2024-11-25', '15:38:57'),
('BS Computer Science', 'PHYSICS 101', 'Foundation', '2nd Year', '1st Semester', '2024-11-25', '15:38:57'),
('BS Computer Science', 'PHYSICS 101.1', 'Foundation', '2nd Year', '1st Semester', '2024-11-25', '15:38:57');

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `StudentNumber` varchar(9) COLLATE utf8mb4_general_ci NOT NULL,
  `StudentProgram` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `AdviserID` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `S_FirstName` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `S_MiddleName` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `S_LastName` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `CurrentStanding` varchar(4) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `TotalUnitsTaken` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`StudentNumber`, `StudentProgram`, `AdviserID`, `S_FirstName`, `S_MiddleName`, `S_LastName`, `CurrentStanding`, `TotalUnitsTaken`) VALUES
('202211172', 'BS Computer Science', 'A001', 'Lea Angeli', 'Tabbu', 'Cuadra', '3rd', 100),
('202213604', 'BS Computer Science', 'A001', 'Abigail', 'Reyes', 'Pagtalunan', '1st', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `StudentCourseList`
--

CREATE TABLE `StudentCourseList` (
  `StudentNumber` varchar(9) COLLATE utf8mb4_general_ci NOT NULL,
  `CourseID` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `CourseStatus` text COLLATE utf8mb4_general_ci,
  `Grade` float DEFAULT NULL,
  `StandingTaken` varchar(3) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `AcademicYear` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Semester` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `DateSubmitted` date DEFAULT NULL,
  `TimeSubmitted` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `StudentCourseList`
--

INSERT INTO `StudentCourseList` (`StudentNumber`, `CourseID`, `CourseStatus`, `Grade`, `StandingTaken`, `AcademicYear`, `Semester`, `DateSubmitted`, `TimeSubmitted`) VALUES
('202211172', 'CMSC 11', 'Taken', 1, '1st', '2022-2023', '1st', '2024-11-25', '15:43:08'),
('202211172', 'MATH 53', 'Taken', 1, '1st', '2022-2023', '1st', '2024-11-25', '15:43:08'),
('202211172', 'MATH 101', 'Taken', 1, '1st', '2022-2023', '1st', '2024-11-25', '15:43:08'),
('202211172', 'ARTS 1', 'Taken', 1, '1st', '2022-2023', '1st', '2024-11-25', '15:43:08'),
('202211172', 'MATH 10', 'Taken', 1, '1st', '2022-2023', '1st', '2024-11-25', '15:43:08'),
('202211172', 'PE 1', 'Taken', 1, '1st', '2022-2023', '1st', '2024-11-25', '15:43:08'),
('202213604', 'CMSC 11', 'Taken', 1, '1st', '2022-2023', '1st', '2024-11-25', '15:43:08'),
('202213604', 'MATH 53', 'Taken', 1, '1st', '2022-2023', '1st', '2024-11-25', '15:43:08'),
('202213604', 'MATH 101', 'Taken', 1, '1st', '2022-2023', '1st', '2024-11-25', '15:43:08'),
('202213604', 'ARTS 1', 'Taken', 1, '1st', '2022-2023', '1st', '2024-11-25', '15:43:08'),
('202213604', 'MATH 10', 'Taken', 1, '1st', '2022-2023', '1st', '2024-11-25', '15:43:08'),
('202213604', 'PE 1', 'Taken', 1, '1st', '2022-2023', '1st', '2024-11-25', '15:43:08'),
('202213604', 'PHYSICS 101', 'Taken', 1, '2nd', '2023-2024', '1st', '2024-11-25', '15:43:08'),
('202213604', 'PHYSICS 101.1', 'Taken', 1, '2nd', '2023-2024', '1st', '2024-11-25', '15:43:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Adviser`
--
ALTER TABLE `Adviser`
  ADD PRIMARY KEY (`AdviserID`);

--
-- Indexes for table `Course`
--
ALTER TABLE `Course`
  ADD PRIMARY KEY (`CourseID`);

--
-- Indexes for table `CoursePrerequisite`
--
ALTER TABLE `CoursePrerequisite`
  ADD PRIMARY KEY (`CourseID`);

--
-- Indexes for table `ProgramChecklist`
--
ALTER TABLE `ProgramChecklist`
  ADD KEY `CourseID` (`CourseID`),
  ADD KEY `idx_StudentProgram` (`StudentProgram`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`StudentNumber`),
  ADD KEY `StudentProgram` (`StudentProgram`),
  ADD KEY `AdviserID` (`AdviserID`);

--
-- Indexes for table `StudentCourseList`
--
ALTER TABLE `StudentCourseList`
  ADD KEY `StudentNumber` (`StudentNumber`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `CoursePrerequisite`
--
ALTER TABLE `CoursePrerequisite`
  ADD CONSTRAINT `CoursePrerequisite_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `Course` (`CourseID`) ON UPDATE CASCADE;

--
-- Constraints for table `ProgramChecklist`
--
ALTER TABLE `ProgramChecklist`
  ADD CONSTRAINT `ProgramChecklist_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `Course` (`CourseID`) ON UPDATE CASCADE;

--
-- Constraints for table `Student`
--
ALTER TABLE `Student`
  ADD CONSTRAINT `Student_ibfk_1` FOREIGN KEY (`StudentProgram`) REFERENCES `ProgramChecklist` (`StudentProgram`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Student_ibfk_2` FOREIGN KEY (`AdviserID`) REFERENCES `Adviser` (`AdviserID`) ON UPDATE CASCADE;

--
-- Constraints for table `StudentCourseList`
--
ALTER TABLE `StudentCourseList`
  ADD CONSTRAINT `StudentCourseList_ibfk_1` FOREIGN KEY (`StudentNumber`) REFERENCES `Student` (`StudentNumber`) ON UPDATE CASCADE,
  ADD CONSTRAINT `StudentCourseList_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `Course` (`CourseID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
