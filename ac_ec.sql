-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 10, 2020 at 12:38 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `AC_EC`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_course`
--

CREATE TABLE `audit_course` (
  `cid` varchar(30) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(4) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `no_of_allocated` int(11) NOT NULL DEFAULT 0,
  `email_id` varchar(50) NOT NULL,
  `timestamp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audit_course`
--

INSERT INTO `audit_course` (`cid`, `sem`, `year`, `cname`, `dept_id`, `min`, `max`, `no_of_allocated`, `email_id`, `timestamp`) VALUES
('UCEC136', 4, '2019', 'Flutter', 1, 30, 80, 0, 'IC@somaiya.edu', '2020-03-09 13:29:51'),
('UCEC153', 4, '2019', 'Android Programming', 1, 20, 80, 0, 'IC@somaiya.edu', '2020-03-09 13:25:40');

-- --------------------------------------------------------

--
-- Table structure for table `audit_course_log`
--

CREATE TABLE `audit_course_log` (
  `cid` varchar(15) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(4) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `no_of_allocated` int(11) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `timestamp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audit_course_log`
--

INSERT INTO `audit_course_log` (`cid`, `sem`, `year`, `cname`, `dept_id`, `min`, `max`, `no_of_allocated`, `email_id`, `timestamp`) VALUES
('UCEC123', 5, '2019', 'Python', 1, 45, 60, 25, 'IC@somaiya.edu', '4545');

-- --------------------------------------------------------

--
-- Table structure for table `audit_form`
--

CREATE TABLE `audit_form` (
  `sem` int(11) NOT NULL,
  `year` varchar(4) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `timestamp_created` varchar(30) NOT NULL,
  `start_timestamp` varchar(30) NOT NULL,
  `end_timestamp` varchar(30) NOT NULL,
  `no_of_preferences` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audit_form`
--

INSERT INTO `audit_form` (`sem`, `year`, `email_id`, `timestamp_created`, `start_timestamp`, `end_timestamp`, `no_of_preferences`) VALUES
(4, '2019', 'IC@somaiya.edu', '2020-03-10 17:03:43', '2020-03-19 19:00', '2020-03-20 08:00', 8);

-- --------------------------------------------------------

--
-- Table structure for table `audit_map`
--

CREATE TABLE `audit_map` (
  `newcid` varchar(15) NOT NULL,
  `newsem` int(11) NOT NULL,
  `newyear` varchar(4) NOT NULL,
  `oldcid` varchar(15) NOT NULL,
  `oldsem` int(11) NOT NULL,
  `oldyear` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`) VALUES
(1, 'Comp');

-- --------------------------------------------------------

--
-- Table structure for table `external_faculty`
--

CREATE TABLE `external_faculty` (
  `username` varchar(20) NOT NULL,
  `organization` varchar(100) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `date_of_joining` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `external_faculty_certification`
--

CREATE TABLE `external_faculty_certification` (
  `username` varchar(20) NOT NULL,
  `course_certified` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `email_id` varchar(50) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `post` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`email_id`, `fname`, `mname`, `lname`, `dept_id`, `post`, `username`) VALUES
('faculty@somaiya.edu', 'Fac', 'fac', 'Fac', 1, 'Asst. Prof', 'faculty');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_audit`
--

CREATE TABLE `faculty_audit` (
  `email_id` varchar(50) NOT NULL,
  `cid` varchar(30) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_audit_log`
--

CREATE TABLE `faculty_audit_log` (
  `email_id` varchar(50) NOT NULL,
  `cid` varchar(30) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_certification`
--

CREATE TABLE `faculty_certification` (
  `email_id` varchar(50) NOT NULL,
  `course_certified` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_coordinator`
--

CREATE TABLE `faculty_coordinator` (
  `email_id` varchar(50) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `start_date` varchar(15) NOT NULL,
  `end_date` varchar(15) NOT NULL,
  `hod_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hide_student_audit_course`
--

CREATE TABLE `hide_student_audit_course` (
  `email_id` varchar(50) NOT NULL,
  `cid` varchar(15) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hod`
--

CREATE TABLE `hod` (
  `email_id` varchar(50) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `start_date` varchar(15) NOT NULL,
  `end_date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login_role`
--

CREATE TABLE `login_role` (
  `username` varchar(20) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `password_set` tinyint(4) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_role`
--

INSERT INTO `login_role` (`username`, `email_id`, `password`, `password_set`, `role`) VALUES
('facco', 'facco@somaiya.edu', 'facco', 1, 'faculty_co'),
('faculty', 'faculty@somaiya.edu', 'faculty', 1, 'faculty'),
('IC', 'IC@somaiya.edu', 'IC', 1, 'inst_coor'),
('student', 'student@somaiya.edu', 'student', 1, 'student');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `email_id` varchar(50) NOT NULL,
  `rollno` varchar(20) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `year_of_admission` varchar(4) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `current_sem` int(11) NOT NULL,
  `form_filled` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`email_id`, `rollno`, `fname`, `mname`, `lname`, `year_of_admission`, `dept_id`, `current_sem`, `form_filled`) VALUES
('student@somaiya.edu', '1711006', 'student', 'student', 'student', '2017', 1, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_audit`
--

CREATE TABLE `student_audit` (
  `email_id` varchar(50) NOT NULL,
  `cid` varchar(30) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(4) NOT NULL,
  `complete_status` tinyint(4) NOT NULL,
  `student_attendance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_audit_log`
--

CREATE TABLE `student_audit_log` (
  `email_id` varchar(50) NOT NULL,
  `cid` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(4) CHARACTER SET utf8mb4 NOT NULL,
  `complete_status` tinyint(4) NOT NULL,
  `student_attendence` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_audit_log`
--

INSERT INTO `student_audit_log` (`email_id`, `cid`, `sem`, `year`, `complete_status`, `student_attendence`) VALUES
('student@somaiya.edu', 'UCEC123', 5, '2019', 1, 55);

-- --------------------------------------------------------

--
-- Table structure for table `student_preference_audit`
--

CREATE TABLE `student_preference_audit` (
  `email_id` varchar(50) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(4) NOT NULL,
  `timestamp` varchar(15) NOT NULL,
  `allocate_status` tinyint(4) NOT NULL DEFAULT 0,
  `pref1` varchar(15) NOT NULL,
  `pref2` varchar(15) NOT NULL,
  `pref3` varchar(15) NOT NULL,
  `pref4` varchar(15) NOT NULL,
  `pref5` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_course`
--
ALTER TABLE `audit_course`
  ADD PRIMARY KEY (`cid`,`sem`,`year`),
  ADD KEY `audit_course_dept` (`dept_id`);

--
-- Indexes for table `audit_course_log`
--
ALTER TABLE `audit_course_log`
  ADD PRIMARY KEY (`cid`,`sem`,`year`);

--
-- Indexes for table `audit_form`
--
ALTER TABLE `audit_form`
  ADD PRIMARY KEY (`sem`,`year`) USING BTREE;

--
-- Indexes for table `audit_map`
--
ALTER TABLE `audit_map`
  ADD PRIMARY KEY (`newcid`,`newsem`,`newyear`,`oldcid`,`oldsem`,`oldyear`),
  ADD KEY `audit_map_audit_course_log` (`oldcid`,`oldsem`,`oldyear`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `external_faculty`
--
ALTER TABLE `external_faculty`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `external_faculty_certification`
--
ALTER TABLE `external_faculty_certification`
  ADD PRIMARY KEY (`username`,`course_certified`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`email_id`),
  ADD KEY `faculty_department` (`dept_id`);

--
-- Indexes for table `faculty_audit`
--
ALTER TABLE `faculty_audit`
  ADD PRIMARY KEY (`email_id`,`cid`,`sem`,`year`),
  ADD KEY `faculty_audit_audit_course` (`cid`,`sem`,`year`);

--
-- Indexes for table `faculty_audit_log`
--
ALTER TABLE `faculty_audit_log`
  ADD PRIMARY KEY (`email_id`,`cid`,`sem`,`year`),
  ADD KEY `faculty_audit_log_audit_log` (`cid`,`sem`,`year`);

--
-- Indexes for table `faculty_certification`
--
ALTER TABLE `faculty_certification`
  ADD PRIMARY KEY (`email_id`,`course_certified`);

--
-- Indexes for table `faculty_coordinator`
--
ALTER TABLE `faculty_coordinator`
  ADD PRIMARY KEY (`email_id`,`start_date`,`end_date`),
  ADD KEY `faculty_coordinator_hod` (`hod_id`),
  ADD KEY `faculty_coordinator_department` (`dept_id`);

--
-- Indexes for table `hide_student_audit_course`
--
ALTER TABLE `hide_student_audit_course`
  ADD PRIMARY KEY (`email_id`,`cid`,`sem`,`year`),
  ADD KEY `hide_student_audit_course_audit_course` (`cid`,`sem`,`year`);

--
-- Indexes for table `hod`
--
ALTER TABLE `hod`
  ADD PRIMARY KEY (`email_id`,`start_date`,`end_date`);

--
-- Indexes for table `login_role`
--
ALTER TABLE `login_role`
  ADD PRIMARY KEY (`email_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`email_id`),
  ADD UNIQUE KEY `rollno` (`rollno`),
  ADD KEY `student_department` (`dept_id`);

--
-- Indexes for table `student_audit`
--
ALTER TABLE `student_audit`
  ADD PRIMARY KEY (`email_id`,`sem`,`year`),
  ADD KEY `student_audit_audit_course` (`cid`,`sem`,`year`);

--
-- Indexes for table `student_audit_log`
--
ALTER TABLE `student_audit_log`
  ADD PRIMARY KEY (`email_id`,`sem`,`year`),
  ADD KEY `student_audit_log_ibfk_1` (`cid`,`sem`,`year`);

--
-- Indexes for table `student_preference_audit`
--
ALTER TABLE `student_preference_audit`
  ADD PRIMARY KEY (`email_id`,`sem`,`year`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audit_course`
--
ALTER TABLE `audit_course`
  ADD CONSTRAINT `audit_course_dept` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `audit_map`
--
ALTER TABLE `audit_map`
  ADD CONSTRAINT `audit_map_audit_course_log` FOREIGN KEY (`oldcid`,`oldsem`,`oldyear`) REFERENCES `audit_course_log` (`cid`, `sem`, `year`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `external_faculty_certification`
--
ALTER TABLE `external_faculty_certification`
  ADD CONSTRAINT `external_faculty_certification_external_faculty_username` FOREIGN KEY (`username`) REFERENCES `external_faculty` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_department` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `faculty_audit`
--
ALTER TABLE `faculty_audit`
  ADD CONSTRAINT `faculty_audit_audit_course` FOREIGN KEY (`cid`,`sem`,`year`) REFERENCES `audit_course` (`cid`, `sem`, `year`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facuty_audit_faculty` FOREIGN KEY (`email_id`) REFERENCES `faculty` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty_audit_log`
--
ALTER TABLE `faculty_audit_log`
  ADD CONSTRAINT `faculty_audit_log_audit_log` FOREIGN KEY (`cid`,`sem`,`year`) REFERENCES `audit_course_log` (`cid`, `sem`, `year`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faculty_audit_log_faculty` FOREIGN KEY (`email_id`) REFERENCES `faculty` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty_certification`
--
ALTER TABLE `faculty_certification`
  ADD CONSTRAINT `faculty_certification_faculty` FOREIGN KEY (`email_id`) REFERENCES `faculty` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty_coordinator`
--
ALTER TABLE `faculty_coordinator`
  ADD CONSTRAINT `faculty_coordinator_department` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faculty_coordinator_hod` FOREIGN KEY (`hod_id`) REFERENCES `hod` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hide_student_audit_course`
--
ALTER TABLE `hide_student_audit_course`
  ADD CONSTRAINT `hide_student_audit_course_audit_course` FOREIGN KEY (`cid`,`sem`,`year`) REFERENCES `audit_course` (`cid`, `sem`, `year`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hide_student_audit_course_student` FOREIGN KEY (`email_id`) REFERENCES `student` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_department` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_audit`
--
ALTER TABLE `student_audit`
  ADD CONSTRAINT `student_audit_audit_course` FOREIGN KEY (`cid`,`sem`,`year`) REFERENCES `audit_course` (`cid`, `sem`, `year`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_audit_student` FOREIGN KEY (`email_id`) REFERENCES `student` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_audit_log`
--
ALTER TABLE `student_audit_log`
  ADD CONSTRAINT `student_audit_log_ibfk_1` FOREIGN KEY (`cid`,`sem`,`year`) REFERENCES `audit_course_log` (`cid`, `sem`, `year`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_preference_audit`
--
ALTER TABLE `student_preference_audit`
  ADD CONSTRAINT `student_preference_audit_student` FOREIGN KEY (`email_id`) REFERENCES `student` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
