-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2020 at 08:26 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ac_ec`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_course`
--

CREATE TABLE `audit_course` (
  `cid` varchar(30) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
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
('UCEC121', 5, '2019-20', 'ABC', 1, 3, 70, 0, 'IC@somaiya.edu', '2020-03-24 17:37:13'),
('UCEC135', 5, '2019-20', 'Digital Electronics', 3, 20, 60, 0, 'IC@somaiya.edu', '2020-03-24 03:04:04'),
('UCEC4896', 5, '2019-20', 'Flutter ', 1, 30, 50, 0, 'facco_comp@somaiya.edu', '2020-04-03 19:14:00'),
('UCEC67398', 5, '2019-20', 'Python for Data Science', 2, 1, 1, 0, 'IC@somaiya.edu', '2020-05-04 18:35:52'),
('UCEC7636', 6, '2019-20', 'DBMS', 1, 30, 80, 0, 'IC@somaiya.edu', '2020-03-31 01:07:27'),
('UCEC7637', 6, '2019-20', 'BCT', 2, 30, 40, 0, 'IC@somaiya.edu', '2020-03-31 01:08:42'),
('UCEC7638', 6, '2019-20', 'Business Analytics', 2, 40, 50, 0, 'IC@somaiya.edu', '2020-03-31 01:09:36'),
('UCEC764272', 5, '2019-20', 'JHSKSN', 1, 30, 70, 0, 'facco_comp@somaiya.edu', '2020-05-04 18:40:43'),
('UCEC8950', 6, '2019-20', 'Python for Data Science', 1, 30, 40, 0, 'IC@somaiya.edu', '2020-03-24 01:01:25'),
('UCEC8951', 5, '2019-20', 'PQR', 3, 20, 40, 0, 'IC@somaiya.edu', '2020-03-24 18:03:34'),
('UCEC8952', 5, '2019-20', 'UVW', 5, 20, 30, 0, 'IC@somaiya.edu', '2020-03-24 18:04:59'),
('UCEC8953', 5, '2019-20', 'XYZ', 3, 15, 30, 0, 'IC@somaiya.edu', '2020-03-24 18:05:34'),
('UCEC8958', 5, '2019-20', 'GHI', 4, 15, 30, 0, 'IC@somaiya.edu', '2020-03-24 18:06:41'),
('UCEC9874', 6, '2019-20', 'Machine Learning ', 3, 30, 40, 0, 'IC@somaiya.edu', '2020-03-24 03:23:41');

-- --------------------------------------------------------

--
-- Table structure for table `audit_course_applicable_dept`
--

CREATE TABLE `audit_course_applicable_dept` (
  `cid` varchar(30) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audit_course_applicable_dept`
--

INSERT INTO `audit_course_applicable_dept` (`cid`, `sem`, `year`, `dept_id`) VALUES
('UCEC121', 5, '2019-20', 1),
('UCEC121', 5, '2019-20', 2),
('UCEC121', 5, '2019-20', 3),
('UCEC121', 5, '2019-20', 4),
('UCEC121', 5, '2019-20', 5),
('UCEC135', 5, '2019-20', 2),
('UCEC135', 5, '2019-20', 3),
('UCEC135', 5, '2019-20', 4),
('UCEC4896', 5, '2019-20', 1),
('UCEC4896', 5, '2019-20', 2),
('UCEC4896', 5, '2019-20', 3),
('UCEC4896', 5, '2019-20', 4),
('UCEC4896', 5, '2019-20', 5),
('UCEC67398', 5, '2019-20', 1),
('UCEC67398', 5, '2019-20', 2),
('UCEC67398', 5, '2019-20', 3),
('UCEC67398', 5, '2019-20', 4),
('UCEC67398', 5, '2019-20', 5),
('UCEC7636', 6, '2019-20', 1),
('UCEC7636', 6, '2019-20', 2),
('UCEC7636', 6, '2019-20', 3),
('UCEC7636', 6, '2019-20', 4),
('UCEC7636', 6, '2019-20', 5),
('UCEC7637', 6, '2019-20', 1),
('UCEC7637', 6, '2019-20', 2),
('UCEC7637', 6, '2019-20', 3),
('UCEC7637', 6, '2019-20', 4),
('UCEC7637', 6, '2019-20', 5),
('UCEC7638', 6, '2019-20', 2),
('UCEC7638', 6, '2019-20', 3),
('UCEC7638', 6, '2019-20', 5),
('UCEC764272', 5, '2019-20', 1),
('UCEC764272', 5, '2019-20', 2),
('UCEC764272', 5, '2019-20', 3),
('UCEC764272', 5, '2019-20', 4),
('UCEC764272', 5, '2019-20', 5),
('UCEC8950', 6, '2019-20', 1),
('UCEC8950', 6, '2019-20', 2),
('UCEC8951', 5, '2019-20', 1),
('UCEC8951', 5, '2019-20', 2),
('UCEC8951', 5, '2019-20', 3),
('UCEC8951', 5, '2019-20', 4),
('UCEC8951', 5, '2019-20', 5),
('UCEC8952', 5, '2019-20', 1),
('UCEC8952', 5, '2019-20', 2),
('UCEC8952', 5, '2019-20', 3),
('UCEC8952', 5, '2019-20', 4),
('UCEC8952', 5, '2019-20', 5),
('UCEC8953', 5, '2019-20', 1),
('UCEC8953', 5, '2019-20', 2),
('UCEC8953', 5, '2019-20', 3),
('UCEC8953', 5, '2019-20', 4),
('UCEC8953', 5, '2019-20', 5),
('UCEC8958', 5, '2019-20', 1),
('UCEC8958', 5, '2019-20', 2),
('UCEC8958', 5, '2019-20', 3),
('UCEC8958', 5, '2019-20', 4),
('UCEC8958', 5, '2019-20', 5),
('UCEC9874', 6, '2019-20', 1),
('UCEC9874', 6, '2019-20', 2),
('UCEC9874', 6, '2019-20', 3),
('UCEC9874', 6, '2019-20', 4),
('UCEC9874', 6, '2019-20', 5);

-- --------------------------------------------------------

--
-- Table structure for table `audit_course_applicable_dept_log`
--

CREATE TABLE `audit_course_applicable_dept_log` (
  `cid` varchar(30) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `audit_course_log`
--

CREATE TABLE `audit_course_log` (
  `cid` varchar(15) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
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
-- Table structure for table `audit_map`
--

CREATE TABLE `audit_map` (
  `newcid` varchar(15) NOT NULL,
  `newsem` int(11) NOT NULL,
  `newyear` varchar(8) NOT NULL,
  `oldcid` varchar(15) NOT NULL,
  `oldsem` int(11) NOT NULL,
  `oldyear` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `closed_elective_dept_form`
--

CREATE TABLE `closed_elective_dept_form` (
  `sem` int(11) NOT NULL,
  `year` varchar(8) CHARACTER SET utf8mb4 NOT NULL,
  `form_type` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `no` int(11) NOT NULL DEFAULT 0,
  `dept_id` int(11) NOT NULL,
  `curr_sem` int(11) NOT NULL,
  `start_timestamp` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `end_timestamp` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `timestamp_created` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `email_id` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `no_of_preferences` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `closed_elective_dept_form`
--

INSERT INTO `closed_elective_dept_form` (`sem`, `year`, `form_type`, `no`, `dept_id`, `curr_sem`, `start_timestamp`, `end_timestamp`, `timestamp_created`, `email_id`, `no_of_preferences`) VALUES
(4, '2017-18', 'closed ele', 1, 1, 5, '2020-03-30 14:35', '2020-04-03 03:59', '2020-04-01 23:19:52', 'facco@somaiya.edu', 6);

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
(1, 'Comp'),
(2, 'IT'),
(3, 'EXTC'),
(4, 'ETRX'),
(5, 'MECH');

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
('abc@somaiya.edu', 'ABC', 'EFG', '', 1, 'Asst Prof', ''),
('faculty@somaiya.edu', 'faculty', '', '', 1, 'Asst Prof', 'faculty');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_audit`
--

CREATE TABLE `faculty_audit` (
  `email_id` varchar(50) NOT NULL,
  `cid` varchar(30) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_audit_log`
--

CREATE TABLE `faculty_audit_log` (
  `email_id` varchar(50) NOT NULL,
  `cid` varchar(30) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_certification`
--

CREATE TABLE `faculty_certification` (
  `email_id` varchar(50) NOT NULL,
  `course_certified` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_certification`
--

INSERT INTO `faculty_certification` (`email_id`, `course_certified`) VALUES
('abc@somaiya.edu', 'PHD'),
('faculty@somaiya.edu', 'PHD');

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

--
-- Dumping data for table `faculty_coordinator`
--

INSERT INTO `faculty_coordinator` (`email_id`, `dept_id`, `start_date`, `end_date`, `hod_id`) VALUES
('facco_comp@somaiya.edu', 1, '2019-05-03', '2021-04-02', 'hodcomp@somaiya.edu');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_idc`
--

CREATE TABLE `faculty_idc` (
  `email_id` varchar(50) NOT NULL,
  `cid` varchar(30) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_idc_log`
--

CREATE TABLE `faculty_idc_log` (
  `email_id` varchar(50) NOT NULL,
  `cid` varchar(30) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `no` int(11) NOT NULL DEFAULT 0,
  `form_type` varchar(10) NOT NULL,
  `curr_sem` int(11) NOT NULL,
  `start_timestamp` varchar(30) NOT NULL,
  `end_timestamp` varchar(30) NOT NULL,
  `timestamp_created` varchar(30) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `no_of_preferences` int(11) NOT NULL,
  `allocate_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`sem`, `year`, `no`, `form_type`, `curr_sem`, `start_timestamp`, `end_timestamp`, `timestamp_created`, `email_id`, `no_of_preferences`, `allocate_status`) VALUES
(5, '2019-20', 0, 'audit', 4, '2020-05-04 07:00', '2020-05-04 17:00', '2020-05-04 18:47:28', 'IC@somaiya.edu', 4, 0),
(5, '2019-20', 0, 'idc', 4, '2020-03-30 02:00', '2020-04-04 00:02', '2020-03-31 16:14:32', 'IC@somaiya.edu', 3, 0),
(7, '2019-20', 0, 'idc', 6, '2020-04-09 04:00', '2020-04-16 11:00', '2020-04-06 21:55:50', 'IC@somaiya.edu', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hide_student_audit_course`
--

CREATE TABLE `hide_student_audit_course` (
  `email_id` varchar(50) NOT NULL,
  `cid` varchar(15) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `cname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hide_student_audit_course`
--

INSERT INTO `hide_student_audit_course` (`email_id`, `cid`, `sem`, `year`, `cname`) VALUES
('student2@somaiya.edu', 'UCEC7637', 6, '2019-20', 'BCT'),
('student@somaiya.edu', 'UCEC121', 5, '2019-20', 'ABC');

-- --------------------------------------------------------

--
-- Table structure for table `hide_student_idc`
--

CREATE TABLE `hide_student_idc` (
  `email_id` varchar(50) NOT NULL,
  `cid` varchar(30) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `cname` varchar(50) NOT NULL
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

--
-- Dumping data for table `hod`
--

INSERT INTO `hod` (`email_id`, `dept_id`, `start_date`, `end_date`) VALUES
('hodcomp@somaiya.edu', 1, '12-12-2019', '04-04-2022');

-- --------------------------------------------------------

--
-- Table structure for table `idc`
--

CREATE TABLE `idc` (
  `cid` varchar(30) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `max` int(11) NOT NULL,
  `min` int(11) NOT NULL,
  `no_of_allocated` int(11) NOT NULL,
  `timestamp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `idc`
--

INSERT INTO `idc` (`cid`, `sem`, `year`, `cname`, `dept_id`, `email_id`, `max`, `min`, `no_of_allocated`, `timestamp`) VALUES
('UCEC321', 5, '2019-20', 'Blockchain Technology', 2, 'IC@somaiya.edu', 70, 40, 0, '2020-03-24 14:08:46'),
('UCEC3547', 5, '2019-20', 'Cyber Security Awareness', 2, 'IC@somaiya.edu', 60, 40, 0, '2020-03-31 16:36:35'),
('UCEC3645', 5, '2019-20', 'Microprocessor', 1, 'IC@somaiya.edu', 80, 40, 0, '2020-03-24 15:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `idc_applicable_dept`
--

CREATE TABLE `idc_applicable_dept` (
  `cid` varchar(30) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `idc_applicable_dept`
--

INSERT INTO `idc_applicable_dept` (`cid`, `sem`, `year`, `dept_id`) VALUES
('UCEC321', 5, '2019-20', 1),
('UCEC321', 5, '2019-20', 2),
('UCEC321', 5, '2019-20', 3),
('UCEC3547', 5, '2019-20', 1),
('UCEC3547', 5, '2019-20', 2),
('UCEC3547', 5, '2019-20', 3),
('UCEC3547', 5, '2019-20', 4),
('UCEC3645', 5, '2019-20', 2),
('UCEC3645', 5, '2019-20', 4),
('UCEC3645', 5, '2019-20', 5);

-- --------------------------------------------------------

--
-- Table structure for table `idc_applicable_dept_log`
--

CREATE TABLE `idc_applicable_dept_log` (
  `cid` varchar(30) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `idc_log`
--

CREATE TABLE `idc_log` (
  `cid` varchar(30) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `max` int(11) NOT NULL,
  `min` int(11) NOT NULL,
  `no_of_allocated` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `instituitional_coordinator`
--

CREATE TABLE `instituitional_coordinator` (
  `email_id` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `start_date` varchar(15) CHARACTER SET utf8mb4 NOT NULL,
  `end_date` varchar(15) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('facco_comp', 'facco_comp@somaiya.edu', 'facco_comp', 1, 'faculty_co'),
('faculty', 'faculty@somaiya.edu', 'faculty', 1, 'faculty'),
('hodcomp', 'hodcomp@somaiya.edu', 'hodcomp', 1, 'hod'),
('IC', 'IC@somaiya.edu', 'IC', 1, 'inst_coor'),
('student2', 'student2@somaiya.edu', 'student2', 1, 'student'),
('student3', 'student3@somaiya.edu', 'student3', 1, 'student'),
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
  `year_of_admission` varchar(8) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `current_sem` int(11) NOT NULL,
  `form_filled` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`email_id`, `rollno`, `fname`, `mname`, `lname`, `year_of_admission`, `dept_id`, `current_sem`, `form_filled`) VALUES
('student2@somaiya.edu', '1711007', 'student2', 'student2', 'student2', '	2017', 1, 5, 0),
('student3@somaiya.edu', '1712003', 'Student3', 'student3', 'student3', '2017', 2, 4, 0),
('student@somaiya.edu', '1711006', 'student', 'student', 'student', '2017', 1, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_audit`
--

CREATE TABLE `student_audit` (
  `email_id` varchar(50) NOT NULL,
  `cid` varchar(30) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `complete_status` tinyint(4) NOT NULL DEFAULT 0,
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
  `year` varchar(8) CHARACTER SET utf8mb4 NOT NULL,
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
-- Table structure for table `student_form`
--

CREATE TABLE `student_form` (
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `no` int(11) NOT NULL,
  `form_type` varchar(10) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `timestamp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_form`
--

INSERT INTO `student_form` (`sem`, `year`, `no`, `form_type`, `email_id`, `timestamp`) VALUES
(6, '2019-20', 0, 'audit', 'student2@somaiya.edu', '2020-03-31 15:49:27'),
(5, '2019-20', 0, 'audit', 'student3@somaiya.edu', '2020-05-04 21:59:28'),
(5, '2019-20', 0, 'audit', 'student@somaiya.edu', '2020-05-04 21:57:45');

-- --------------------------------------------------------

--
-- Table structure for table `student_preference_audit`
--

CREATE TABLE `student_preference_audit` (
  `email_id` varchar(50) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `timestamp` varchar(30) NOT NULL,
  `allocate_status` tinyint(4) NOT NULL DEFAULT 0,
  `no_of_valid_preferences` int(11) NOT NULL,
  `pref1` varchar(15) NOT NULL,
  `pref2` varchar(15) NOT NULL,
  `pref3` varchar(15) NOT NULL,
  `pref4` varchar(15) NOT NULL,
  `pref5` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_preference_audit`
--

INSERT INTO `student_preference_audit` (`email_id`, `sem`, `year`, `timestamp`, `allocate_status`, `no_of_valid_preferences`, `pref1`, `pref2`, `pref3`, `pref4`, `pref5`) VALUES
('student2@somaiya.edu', 6, '2019-20', '2020-03-31 15:49:27', 0, 3, 'UCEC8950', 'UCEC9874', 'UCEC7636', '', ''),
('student3@somaiya.edu', 5, '2019-20', '2020-05-04 21:59:28', 0, 4, 'UCEC67398', 'UCEC121', 'UCEC8953', 'UCEC8952', ''),
('student@somaiya.edu', 5, '2019-20', '2020-05-04 21:57:45', 0, 4, 'UCEC67398', 'UCEC8951', 'UCEC4896', 'UCEC8952', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_preference_idc`
--

CREATE TABLE `student_preference_idc` (
  `email_id` varchar(50) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `timestamp` varchar(30) NOT NULL,
  `allocate_status` tinyint(11) NOT NULL DEFAULT 0,
  `no_of_valid_preferences` int(11) NOT NULL,
  `pref1` varchar(30) NOT NULL,
  `pref2` varchar(30) NOT NULL,
  `pref3` varchar(30) NOT NULL,
  `pref4` varchar(30) NOT NULL,
  `pref5` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_preference_idc`
--

INSERT INTO `student_preference_idc` (`email_id`, `sem`, `year`, `timestamp`, `allocate_status`, `no_of_valid_preferences`, `pref1`, `pref2`, `pref3`, `pref4`, `pref5`) VALUES
('student3@somaiya.edu', 5, '2019-20', '2020-03-31 16:39:35', 0, 3, 'UCEC3645', 'UCEC3547', 'UCEC321', '', '');

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
-- Indexes for table `audit_course_applicable_dept`
--
ALTER TABLE `audit_course_applicable_dept`
  ADD PRIMARY KEY (`cid`,`sem`,`year`,`dept_id`),
  ADD KEY `dept_audit_course_applicable` (`dept_id`);

--
-- Indexes for table `audit_course_applicable_dept_log`
--
ALTER TABLE `audit_course_applicable_dept_log`
  ADD PRIMARY KEY (`sem`,`year`,`dept_id`,`cid`),
  ADD KEY `audit_course_applicable_audit_course_log` (`cid`,`sem`,`year`),
  ADD KEY `audit_course_applicable_dept` (`dept_id`);

--
-- Indexes for table `audit_course_log`
--
ALTER TABLE `audit_course_log`
  ADD PRIMARY KEY (`cid`,`sem`,`year`);

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
-- Indexes for table `faculty_idc`
--
ALTER TABLE `faculty_idc`
  ADD PRIMARY KEY (`sem`,`cid`,`year`,`email_id`) USING BTREE,
  ADD KEY `faculty_idc_faculty` (`email_id`),
  ADD KEY `faculty_idc_idc` (`cid`,`sem`,`year`);

--
-- Indexes for table `faculty_idc_log`
--
ALTER TABLE `faculty_idc_log`
  ADD PRIMARY KEY (`email_id`,`cid`,`sem`,`year`),
  ADD KEY `faculty_idc_log_idc_log` (`cid`,`sem`,`year`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`sem`,`no`,`year`,`form_type`) USING BTREE;

--
-- Indexes for table `hide_student_audit_course`
--
ALTER TABLE `hide_student_audit_course`
  ADD PRIMARY KEY (`email_id`,`cid`,`sem`,`year`),
  ADD KEY `hide_student_audit_course_audit_course` (`cid`,`sem`,`year`);

--
-- Indexes for table `hide_student_idc`
--
ALTER TABLE `hide_student_idc`
  ADD PRIMARY KEY (`email_id`,`cid`,`sem`,`year`),
  ADD KEY `hide_student_idc_idc` (`cid`,`sem`,`year`);

--
-- Indexes for table `hod`
--
ALTER TABLE `hod`
  ADD PRIMARY KEY (`email_id`,`start_date`,`end_date`);

--
-- Indexes for table `idc`
--
ALTER TABLE `idc`
  ADD PRIMARY KEY (`cid`,`sem`,`year`),
  ADD KEY `idc_department` (`dept_id`);

--
-- Indexes for table `idc_applicable_dept`
--
ALTER TABLE `idc_applicable_dept`
  ADD PRIMARY KEY (`cid`,`sem`,`year`,`dept_id`),
  ADD KEY `idc_applicable_dept_dept` (`dept_id`);

--
-- Indexes for table `idc_applicable_dept_log`
--
ALTER TABLE `idc_applicable_dept_log`
  ADD PRIMARY KEY (`cid`,`sem`,`year`,`dept_id`),
  ADD KEY `idc_applicable_department_dept_log` (`dept_id`);

--
-- Indexes for table `idc_log`
--
ALTER TABLE `idc_log`
  ADD PRIMARY KEY (`cid`,`sem`,`year`),
  ADD KEY `idc_log_department` (`dept_id`);

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
-- Indexes for table `student_form`
--
ALTER TABLE `student_form`
  ADD PRIMARY KEY (`year`,`no`,`form_type`,`email_id`,`sem`) USING BTREE,
  ADD KEY `student_form_student` (`email_id`);

--
-- Indexes for table `student_preference_audit`
--
ALTER TABLE `student_preference_audit`
  ADD PRIMARY KEY (`email_id`,`sem`,`year`);

--
-- Indexes for table `student_preference_idc`
--
ALTER TABLE `student_preference_idc`
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
-- Constraints for table `audit_course_applicable_dept`
--
ALTER TABLE `audit_course_applicable_dept`
  ADD CONSTRAINT `audit_course_audit_course_applicable` FOREIGN KEY (`cid`,`sem`,`year`) REFERENCES `audit_course` (`cid`, `sem`, `year`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dept_audit_course_applicable` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `audit_course_applicable_dept_log`
--
ALTER TABLE `audit_course_applicable_dept_log`
  ADD CONSTRAINT `audit_course_applicable_audit_course_log` FOREIGN KEY (`cid`,`sem`,`year`) REFERENCES `audit_course_log` (`cid`, `sem`, `year`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `audit_course_applicable_dept` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `faculty_idc`
--
ALTER TABLE `faculty_idc`
  ADD CONSTRAINT `faculty_idc_faculty` FOREIGN KEY (`email_id`) REFERENCES `faculty` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faculty_idc_idc` FOREIGN KEY (`cid`,`sem`,`year`) REFERENCES `idc` (`cid`, `sem`, `year`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty_idc_log`
--
ALTER TABLE `faculty_idc_log`
  ADD CONSTRAINT `faculty_idc_log_faculty` FOREIGN KEY (`email_id`) REFERENCES `faculty` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faculty_idc_log_idc_log` FOREIGN KEY (`cid`,`sem`,`year`) REFERENCES `idc_log` (`cid`, `sem`, `year`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hide_student_audit_course`
--
ALTER TABLE `hide_student_audit_course`
  ADD CONSTRAINT `hide_student_audit_course_audit_course` FOREIGN KEY (`cid`,`sem`,`year`) REFERENCES `audit_course` (`cid`, `sem`, `year`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hide_student_audit_course_student` FOREIGN KEY (`email_id`) REFERENCES `student` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hide_student_idc`
--
ALTER TABLE `hide_student_idc`
  ADD CONSTRAINT `hide_student_idc_idc` FOREIGN KEY (`cid`,`sem`,`year`) REFERENCES `idc` (`cid`, `sem`, `year`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hide_student_idc_student` FOREIGN KEY (`email_id`) REFERENCES `student` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `idc`
--
ALTER TABLE `idc`
  ADD CONSTRAINT `idc_department` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `idc_applicable_dept`
--
ALTER TABLE `idc_applicable_dept`
  ADD CONSTRAINT `idc_applicable_dept_dept` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idc_applicable_dept_idc` FOREIGN KEY (`cid`,`sem`,`year`) REFERENCES `idc` (`cid`, `sem`, `year`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `idc_applicable_dept_log`
--
ALTER TABLE `idc_applicable_dept_log`
  ADD CONSTRAINT `idc_applicable_department_dept_log` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idc_applicable_idc_log` FOREIGN KEY (`cid`,`sem`,`year`) REFERENCES `idc_log` (`cid`, `sem`, `year`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `idc_log`
--
ALTER TABLE `idc_log`
  ADD CONSTRAINT `idc_log_department` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `student_form`
--
ALTER TABLE `student_form`
  ADD CONSTRAINT `student_form_student` FOREIGN KEY (`email_id`) REFERENCES `student` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_preference_audit`
--
ALTER TABLE `student_preference_audit`
  ADD CONSTRAINT `student_preference_audit_student` FOREIGN KEY (`email_id`) REFERENCES `student` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_preference_idc`
--
ALTER TABLE `student_preference_idc`
  ADD CONSTRAINT `student_preference_idc_student` FOREIGN KEY (`email_id`) REFERENCES `student` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
