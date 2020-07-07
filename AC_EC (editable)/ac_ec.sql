-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2020 at 06:57 PM
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
-- Database: `ac_ec`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `cid` varchar(30) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `course_type_id` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `program` varchar(3) DEFAULT NULL,
  `currently_active` tinyint(4) NOT NULL DEFAULT 0,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `timestamp` varchar(30) NOT NULL,
  `syllabus_path` varchar(150) NOT NULL DEFAULT '',
  `is_gradable` int(1) DEFAULT 1,
  `upload_timestamp` varchar(30) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course_applicable_dept`
--

CREATE TABLE `course_applicable_dept` (
  `cid` varchar(30) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `course_type_id` int(11) NOT NULL,
  `program` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course_applicable_dept_log`
--

CREATE TABLE `course_applicable_dept_log` (
  `cid` varchar(30) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `course_type_id` int(11) NOT NULL,
  `program` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course_floating_dept`
--

CREATE TABLE `course_floating_dept` (
  `cid` varchar(30) NOT NULL,
  `course_type_id` int(11) NOT NULL,
  `program` varchar(3) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course_floating_dept_log`
--

CREATE TABLE `course_floating_dept_log` (
  `cid` varchar(30) NOT NULL,
  `course_type_id` int(11) NOT NULL,
  `program` varchar(3) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course_log`
--

CREATE TABLE `course_log` (
  `cid` varchar(15) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `course_type_id` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `program` varchar(3) DEFAULT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `timestamp` varchar(30) NOT NULL,
  `syllabus_path` varchar(150) NOT NULL DEFAULT '',
  `is_gradable` int(1) DEFAULT 1,
  `upload_timestamp` varchar(30) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course_similar_map`
--

CREATE TABLE `course_similar_map` (
  `newcid` varchar(15) NOT NULL,
  `new_course_type_id` int(11) NOT NULL,
  `newsem` int(11) NOT NULL,
  `newyear` varchar(8) NOT NULL,
  `oldcid` varchar(15) NOT NULL,
  `old_course_type_id` int(11) NOT NULL,
  `oldsem` int(11) NOT NULL,
  `oldyear` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course_similar_map_log`
--

CREATE TABLE `course_similar_map_log` (
  `newcid` varchar(15) NOT NULL,
  `new_course_type_id` int(11) NOT NULL,
  `newsem` int(11) NOT NULL,
  `newyear` varchar(8) NOT NULL,
  `oldcid` varchar(15) NOT NULL,
  `old_course_type_id` int(11) NOT NULL,
  `oldsem` int(11) NOT NULL,
  `oldyear` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course_types`
--

CREATE TABLE `course_types` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `program` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_types`
--

INSERT INTO `course_types` (`id`, `name`, `program`) VALUES
(3, 'Audit Course', 'UG'),
(4, 'OET', 'UG'),
(5, 'IDC', 'PG'),
(6, 'elective 1', 'PHD');

-- --------------------------------------------------------

--
-- Table structure for table `current_sem_info`
--

CREATE TABLE `current_sem_info` (
  `sem_type` varchar(5) NOT NULL,
  `academic_year` varchar(10) NOT NULL,
  `started_on` varchar(30) NOT NULL DEFAULT current_timestamp(),
  `ended_on` varchar(30) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `currently_active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `current_sem_info`
--

INSERT INTO `current_sem_info` (`sem_type`, `academic_year`, `started_on`, `ended_on`, `email_id`, `currently_active`) VALUES
('EVEN', '2019-20', '2020-01-08 11:05:00', '', 'IC@somaiya.edu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delete_temp_tables`
--

CREATE TABLE `delete_temp_tables` (
  `table_name` varchar(50) NOT NULL,
  `timestamp_created` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delete_temp_tables`
--

INSERT INTO `delete_temp_tables` (`table_name`, `timestamp_created`) VALUES
('156ea3_audit_app_dept_course', '2020-06-22 20:47:21'),
('156ea3_audit_course', '2020-06-22 20:47:21'),
('156ea3_audit_course_info', '2020-06-22 20:47:21'),
('156ea3_pref_percent', '2020-06-22 20:47:21'),
('156ea3_pref_student_alloted', '2020-06-22 20:47:21'),
('156ea3_student_audit', '2020-06-22 20:47:21'),
('156ea3_student_pref_audit', '2020-06-22 20:47:21');

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
(2, 'ETRX'),
(3, 'EXTC'),
(4, 'IT'),
(5, 'MECH'),
(6, 'S&H');

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
  `faculty_code` varchar(15) NOT NULL DEFAULT 'Aa',
  `employee_id` varchar(30) NOT NULL DEFAULT '2112',
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `post` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `timestamp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`email_id`, `faculty_code`, `employee_id`, `fname`, `mname`, `lname`, `dept_id`, `post`, `username`, `added_by`, `timestamp`) VALUES
('fac3@somaiya.edu', 'PR', '9', 'PQR', '', '', 2, 'Prof', '', 'IC@somaiya.edu', '2020-05-11 03:29:35'),
('faculty1@somaiya.edu', 'fac', '4', 'faculty', '', '', 1, 'Asst Prof', 'faculty', '', ''),
('faculty2@somaiya.edu', 'fac2', '6', 'faculty2', '', '', 1, 'Prof', '', '', '');

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
('faculty1@somaiya.edu', 'PHD'),
('faculty2@somaiya.edu', 'PHD');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_coordinator`
--

CREATE TABLE `faculty_coordinator` (
  `email_id` varchar(50) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `start_date` varchar(15) NOT NULL,
  `end_date` varchar(15) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `timestamp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_course_alloted`
--

CREATE TABLE `faculty_course_alloted` (
  `email_id` varchar(50) NOT NULL,
  `cid` varchar(30) NOT NULL,
  `course_type_id` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `currently_active` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_course_alloted_log`
--

CREATE TABLE `faculty_course_alloted_log` (
  `email_id` varchar(50) NOT NULL,
  `cid` varchar(30) NOT NULL,
  `course_type_id` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `currently_active` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `form_id` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `program` varchar(3) DEFAULT NULL,
  `form_type` varchar(10) NOT NULL,
  `curr_sem` int(11) NOT NULL,
  `currently_active` tinyint(4) NOT NULL DEFAULT 0,
  `start_timestamp` varchar(30) NOT NULL,
  `end_timestamp` varchar(30) NOT NULL,
  `timestamp_created` varchar(30) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `no_of_preferences` int(11) NOT NULL,
  `allocate_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `form_applicable_dept`
--

CREATE TABLE `form_applicable_dept` (
  `form_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `form_course_category_map`
--

CREATE TABLE `form_course_category_map` (
  `form_id` int(11) NOT NULL,
  `course_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hide_student_course`
--

CREATE TABLE `hide_student_course` (
  `email_id` varchar(50) NOT NULL,
  `cid` varchar(15) NOT NULL,
  `course_type_id` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `cname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hod`
--

CREATE TABLE `hod` (
  `hod_email_id` varchar(50) NOT NULL,
  `faculty_email_id` varchar(50) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `start_date` varchar(15) NOT NULL,
  `end_date` varchar(15) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `timestamp` varchar(30) NOT NULL
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
  `program` varchar(3) DEFAULT NULL,
  `current_sem` int(11) NOT NULL,
  `form_filled` int(11) NOT NULL DEFAULT 0,
  `adding_email_id` varchar(50) NOT NULL,
  `timestamp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`email_id`, `rollno`, `fname`, `mname`, `lname`, `year_of_admission`, `dept_id`, `program`, `current_sem`, `form_filled`, `adding_email_id`, `timestamp`) VALUES
('student_100@somaiya.edu', '200', 'student_100', 'student_middle_100', 'student_last100', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_101@somaiya.edu', '201', 'student_101', 'student_middle_101', 'student_last101', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_102@somaiya.edu', '202', 'student_102', 'student_middle_102', 'student_last102', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_103@somaiya.edu', '203', 'student_103', 'student_middle_103', 'student_last103', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_104@somaiya.edu', '204', 'student_104', 'student_middle_104', 'student_last104', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_105@somaiya.edu', '205', 'student_105', 'student_middle_105', 'student_last105', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_106@somaiya.edu', '206', 'student_106', 'student_middle_106', 'student_last106', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_107@somaiya.edu', '207', 'student_107', 'student_middle_107', 'student_last107', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_108@somaiya.edu', '208', 'student_108', 'student_middle_108', 'student_last108', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_109@somaiya.edu', '209', 'student_109', 'student_middle_109', 'student_last109', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_10@somaiya.edu', '110', 'student_10', 'student_middle_10', 'student_last10', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_110@somaiya.edu', '210', 'student_110', 'student_middle_110', 'student_last110', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_111@somaiya.edu', '211', 'student_111', 'student_middle_111', 'student_last111', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_112@somaiya.edu', '212', 'student_112', 'student_middle_112', 'student_last112', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_113@somaiya.edu', '213', 'student_113', 'student_middle_113', 'student_last113', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_114@somaiya.edu', '214', 'student_114', 'student_middle_114', 'student_last114', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_115@somaiya.edu', '215', 'student_115', 'student_middle_115', 'student_last115', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_116@somaiya.edu', '216', 'student_116', 'student_middle_116', 'student_last116', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_117@somaiya.edu', '217', 'student_117', 'student_middle_117', 'student_last117', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_118@somaiya.edu', '218', 'student_118', 'student_middle_118', 'student_last118', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_119@somaiya.edu', '219', 'student_119', 'student_middle_119', 'student_last119', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_11@somaiya.edu', '111', 'student_11', 'student_middle_11', 'student_last11', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_120@somaiya.edu', '220', 'student_120', 'student_middle_120', 'student_last120', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_121@somaiya.edu', '221', 'student_121', 'student_middle_121', 'student_last121', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_122@somaiya.edu', '222', 'student_122', 'student_middle_122', 'student_last122', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_123@somaiya.edu', '223', 'student_123', 'student_middle_123', 'student_last123', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_124@somaiya.edu', '224', 'student_124', 'student_middle_124', 'student_last124', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_125@somaiya.edu', '225', 'student_125', 'student_middle_125', 'student_last125', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_126@somaiya.edu', '226', 'student_126', 'student_middle_126', 'student_last126', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_127@somaiya.edu', '227', 'student_127', 'student_middle_127', 'student_last127', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_128@somaiya.edu', '228', 'student_128', 'student_middle_128', 'student_last128', '2019', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_129@somaiya.edu', '229', 'student_129', 'student_middle_129', 'student_last129', '2019', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_12@somaiya.edu', '112', 'student_12', 'student_middle_12', 'student_last12', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_130@somaiya.edu', '230', 'student_130', 'student_middle_130', 'student_last130', '2019', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_131@somaiya.edu', '231', 'student_131', 'student_middle_131', 'student_last131', '2019', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_132@somaiya.edu', '232', 'student_132', 'student_middle_132', 'student_last132', '2019', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_133@somaiya.edu', '233', 'student_133', 'student_middle_133', 'student_last133', '2019', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_134@somaiya.edu', '234', 'student_134', 'student_middle_134', 'student_last134', '2019', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_135@somaiya.edu', '235', 'student_135', 'student_middle_135', 'student_last135', '2019', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_136@somaiya.edu', '236', 'student_136', 'student_middle_136', 'student_last136', '2019', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_137@somaiya.edu', '237', 'student_137', 'student_middle_137', 'student_last137', '2019', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_138@somaiya.edu', '238', 'student_138', 'student_middle_138', 'student_last138', '2019', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_139@somaiya.edu', '239', 'student_139', 'student_middle_139', 'student_last139', '2019', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_13@somaiya.edu', '113', 'student_13', 'student_middle_13', 'student_last13', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_140@somaiya.edu', '240', 'student_140', 'student_middle_140', 'student_last140', '2017', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_141@somaiya.edu', '241', 'student_141', 'student_middle_141', 'student_last141', '2017', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_142@somaiya.edu', '242', 'student_142', 'student_middle_142', 'student_last142', '2017', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_143@somaiya.edu', '243', 'student_143', 'student_middle_143', 'student_last143', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_144@somaiya.edu', '244', 'student_144', 'student_middle_144', 'student_last144', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_145@somaiya.edu', '245', 'student_145', 'student_middle_145', 'student_last145', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_146@somaiya.edu', '246', 'student_146', 'student_middle_146', 'student_last146', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_147@somaiya.edu', '247', 'student_147', 'student_middle_147', 'student_last147', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_148@somaiya.edu', '248', 'student_148', 'student_middle_148', 'student_last148', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_149@somaiya.edu', '249', 'student_149', 'student_middle_149', 'student_last149', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_14@somaiya.edu', '114', 'student_14', 'student_middle_14', 'student_last14', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_150@somaiya.edu', '250', 'student_150', 'student_middle_150', 'student_last150', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_151@somaiya.edu', '251', 'student_151', 'student_middle_151', 'student_last151', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_152@somaiya.edu', '252', 'student_152', 'student_middle_152', 'student_last152', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_153@somaiya.edu', '253', 'student_153', 'student_middle_153', 'student_last153', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_154@somaiya.edu', '254', 'student_154', 'student_middle_154', 'student_last154', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_155@somaiya.edu', '255', 'student_155', 'student_middle_155', 'student_last155', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_156@somaiya.edu', '256', 'student_156', 'student_middle_156', 'student_last156', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_157@somaiya.edu', '257', 'student_157', 'student_middle_157', 'student_last157', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_158@somaiya.edu', '258', 'student_158', 'student_middle_158', 'student_last158', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_159@somaiya.edu', '259', 'student_159', 'student_middle_159', 'student_last159', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_15@somaiya.edu', '115', 'student_15', 'student_middle_15', 'student_last15', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_160@somaiya.edu', '260', 'student_160', 'student_middle_160', 'student_last160', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_161@somaiya.edu', '261', 'student_161', 'student_middle_161', 'student_last161', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_162@somaiya.edu', '262', 'student_162', 'student_middle_162', 'student_last162', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_163@somaiya.edu', '263', 'student_163', 'student_middle_163', 'student_last163', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_164@somaiya.edu', '264', 'student_164', 'student_middle_164', 'student_last164', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_165@somaiya.edu', '265', 'student_165', 'student_middle_165', 'student_last165', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_166@somaiya.edu', '266', 'student_166', 'student_middle_166', 'student_last166', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_167@somaiya.edu', '267', 'student_167', 'student_middle_167', 'student_last167', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_168@somaiya.edu', '268', 'student_168', 'student_middle_168', 'student_last168', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_169@somaiya.edu', '269', 'student_169', 'student_middle_169', 'student_last169', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_16@somaiya.edu', '116', 'student_16', 'student_middle_16', 'student_last16', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_170@somaiya.edu', '270', 'student_170', 'student_middle_170', 'student_last170', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_171@somaiya.edu', '271', 'student_171', 'student_middle_171', 'student_last171', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_172@somaiya.edu', '272', 'student_172', 'student_middle_172', 'student_last172', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_173@somaiya.edu', '273', 'student_173', 'student_middle_173', 'student_last173', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_174@somaiya.edu', '274', 'student_174', 'student_middle_174', 'student_last174', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_175@somaiya.edu', '275', 'student_175', 'student_middle_175', 'student_last175', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_176@somaiya.edu', '276', 'student_176', 'student_middle_176', 'student_last176', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_177@somaiya.edu', '277', 'student_177', 'student_middle_177', 'student_last177', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_178@somaiya.edu', '278', 'student_178', 'student_middle_178', 'student_last178', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_179@somaiya.edu', '279', 'student_179', 'student_middle_179', 'student_last179', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_17@somaiya.edu', '117', 'student_17', 'student_middle_17', 'student_last17', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_180@somaiya.edu', '280', 'student_180', 'student_middle_180', 'student_last180', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_181@somaiya.edu', '281', 'student_181', 'student_middle_181', 'student_last181', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_182@somaiya.edu', '282', 'student_182', 'student_middle_182', 'student_last182', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_183@somaiya.edu', '283', 'student_183', 'student_middle_183', 'student_last183', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_184@somaiya.edu', '284', 'student_184', 'student_middle_184', 'student_last184', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_185@somaiya.edu', '285', 'student_185', 'student_middle_185', 'student_last185', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_186@somaiya.edu', '286', 'student_186', 'student_middle_186', 'student_last186', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_187@somaiya.edu', '287', 'student_187', 'student_middle_187', 'student_last187', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_188@somaiya.edu', '288', 'student_188', 'student_middle_188', 'student_last188', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_189@somaiya.edu', '289', 'student_189', 'student_middle_189', 'student_last189', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_18@somaiya.edu', '118', 'student_18', 'student_middle_18', 'student_last18', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_190@somaiya.edu', '290', 'student_190', 'student_middle_190', 'student_last190', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_191@somaiya.edu', '291', 'student_191', 'student_middle_191', 'student_last191', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_192@somaiya.edu', '292', 'student_192', 'student_middle_192', 'student_last192', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_193@somaiya.edu', '293', 'student_193', 'student_middle_193', 'student_last193', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_194@somaiya.edu', '294', 'student_194', 'student_middle_194', 'student_last194', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_195@somaiya.edu', '295', 'student_195', 'student_middle_195', 'student_last195', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_196@somaiya.edu', '296', 'student_196', 'student_middle_196', 'student_last196', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_197@somaiya.edu', '297', 'student_197', 'student_middle_197', 'student_last197', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_198@somaiya.edu', '298', 'student_198', 'student_middle_198', 'student_last198', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_199@somaiya.edu', '299', 'student_199', 'student_middle_199', 'student_last199', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_19@somaiya.edu', '119', 'student_19', 'student_middle_19', 'student_last19', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_1@somaiya.edu', '101', 'student_1', 'student_middle_1', 'student_last1', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_200@somaiya.edu', '300', 'student_200', 'student_middle_200', 'student_last200', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_201@somaiya.edu', '301', 'student_201', 'student_middle_201', 'student_last201', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_202@somaiya.edu', '302', 'student_202', 'student_middle_202', 'student_last202', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_203@somaiya.edu', '303', 'student_203', 'student_middle_203', 'student_last203', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_204@somaiya.edu', '304', 'student_204', 'student_middle_204', 'student_last204', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_205@somaiya.edu', '305', 'student_205', 'student_middle_205', 'student_last205', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_206@somaiya.edu', '306', 'student_206', 'student_middle_206', 'student_last206', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_207@somaiya.edu', '307', 'student_207', 'student_middle_207', 'student_last207', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_208@somaiya.edu', '308', 'student_208', 'student_middle_208', 'student_last208', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_209@somaiya.edu', '309', 'student_209', 'student_middle_209', 'student_last209', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_20@somaiya.edu', '120', 'student_20', 'student_middle_20', 'student_last20', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_210@somaiya.edu', '310', 'student_210', 'student_middle_210', 'student_last210', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_211@somaiya.edu', '311', 'student_211', 'student_middle_211', 'student_last211', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_212@somaiya.edu', '312', 'student_212', 'student_middle_212', 'student_last212', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_213@somaiya.edu', '313', 'student_213', 'student_middle_213', 'student_last213', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_214@somaiya.edu', '314', 'student_214', 'student_middle_214', 'student_last214', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_215@somaiya.edu', '315', 'student_215', 'student_middle_215', 'student_last215', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_216@somaiya.edu', '316', 'student_216', 'student_middle_216', 'student_last216', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_217@somaiya.edu', '317', 'student_217', 'student_middle_217', 'student_last217', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_218@somaiya.edu', '318', 'student_218', 'student_middle_218', 'student_last218', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_219@somaiya.edu', '319', 'student_219', 'student_middle_219', 'student_last219', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_21@somaiya.edu', '121', 'student_21', 'student_middle_21', 'student_last21', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_220@somaiya.edu', '320', 'student_220', 'student_middle_220', 'student_last220', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_221@somaiya.edu', '321', 'student_221', 'student_middle_221', 'student_last221', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_222@somaiya.edu', '322', 'student_222', 'student_middle_222', 'student_last222', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_223@somaiya.edu', '323', 'student_223', 'student_middle_223', 'student_last223', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_224@somaiya.edu', '324', 'student_224', 'student_middle_224', 'student_last224', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_225@somaiya.edu', '325', 'student_225', 'student_middle_225', 'student_last225', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_226@somaiya.edu', '326', 'student_226', 'student_middle_226', 'student_last226', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_227@somaiya.edu', '327', 'student_227', 'student_middle_227', 'student_last227', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_228@somaiya.edu', '328', 'student_228', 'student_middle_228', 'student_last228', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_229@somaiya.edu', '329', 'student_229', 'student_middle_229', 'student_last229', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_22@somaiya.edu', '122', 'student_22', 'student_middle_22', 'student_last22', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_230@somaiya.edu', '330', 'student_230', 'student_middle_230', 'student_last230', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_231@somaiya.edu', '331', 'student_231', 'student_middle_231', 'student_last231', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_232@somaiya.edu', '332', 'student_232', 'student_middle_232', 'student_last232', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_233@somaiya.edu', '333', 'student_233', 'student_middle_233', 'student_last233', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_234@somaiya.edu', '334', 'student_234', 'student_middle_234', 'student_last234', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_235@somaiya.edu', '335', 'student_235', 'student_middle_235', 'student_last235', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_236@somaiya.edu', '336', 'student_236', 'student_middle_236', 'student_last236', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_237@somaiya.edu', '337', 'student_237', 'student_middle_237', 'student_last237', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_238@somaiya.edu', '338', 'student_238', 'student_middle_238', 'student_last238', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_239@somaiya.edu', '339', 'student_239', 'student_middle_239', 'student_last239', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_23@somaiya.edu', '123', 'student_23', 'student_middle_23', 'student_last23', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_240@somaiya.edu', '340', 'student_240', 'student_middle_240', 'student_last240', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_241@somaiya.edu', '341', 'student_241', 'student_middle_241', 'student_last241', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_242@somaiya.edu', '342', 'student_242', 'student_middle_242', 'student_last242', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_243@somaiya.edu', '343', 'student_243', 'student_middle_243', 'student_last243', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_244@somaiya.edu', '344', 'student_244', 'student_middle_244', 'student_last244', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_245@somaiya.edu', '345', 'student_245', 'student_middle_245', 'student_last245', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_246@somaiya.edu', '346', 'student_246', 'student_middle_246', 'student_last246', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_247@somaiya.edu', '347', 'student_247', 'student_middle_247', 'student_last247', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_248@somaiya.edu', '348', 'student_248', 'student_middle_248', 'student_last248', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_249@somaiya.edu', '349', 'student_249', 'student_middle_249', 'student_last249', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_24@somaiya.edu', '124', 'student_24', 'student_middle_24', 'student_last24', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_250@somaiya.edu', '350', 'student_250', 'student_middle_250', 'student_last250', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_251@somaiya.edu', '351', 'student_251', 'student_middle_251', 'student_last251', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_252@somaiya.edu', '352', 'student_252', 'student_middle_252', 'student_last252', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_253@somaiya.edu', '353', 'student_253', 'student_middle_253', 'student_last253', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_254@somaiya.edu', '354', 'student_254', 'student_middle_254', 'student_last254', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_255@somaiya.edu', '355', 'student_255', 'student_middle_255', 'student_last255', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_256@somaiya.edu', '356', 'student_256', 'student_middle_256', 'student_last256', '2018', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_257@somaiya.edu', '357', 'student_257', 'student_middle_257', 'student_last257', '2019', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_258@somaiya.edu', '358', 'student_258', 'student_middle_258', 'student_last258', '2019', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_259@somaiya.edu', '359', 'student_259', 'student_middle_259', 'student_last259', '2019', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_25@somaiya.edu', '125', 'student_25', 'student_middle_25', 'student_last25', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_260@somaiya.edu', '360', 'student_260', 'student_middle_260', 'student_last260', '2019', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_261@somaiya.edu', '361', 'student_261', 'student_middle_261', 'student_last261', '2019', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_262@somaiya.edu', '362', 'student_262', 'student_middle_262', 'student_last262', '2019', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_263@somaiya.edu', '363', 'student_263', 'student_middle_263', 'student_last263', '2019', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_264@somaiya.edu', '364', 'student_264', 'student_middle_264', 'student_last264', '2019', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_265@somaiya.edu', '365', 'student_265', 'student_middle_265', 'student_last265', '2019', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_266@somaiya.edu', '366', 'student_266', 'student_middle_266', 'student_last266', '2019', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_267@somaiya.edu', '367', 'student_267', 'student_middle_267', 'student_last267', '2019', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_268@somaiya.edu', '368', 'student_268', 'student_middle_268', 'student_last268', '2019', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_269@somaiya.edu', '369', 'student_269', 'student_middle_269', 'student_last269', '2019', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_26@somaiya.edu', '126', 'student_26', 'student_middle_26', 'student_last26', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_270@somaiya.edu', '370', 'student_270', 'student_middle_270', 'student_last270', '2019', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_271@somaiya.edu', '371', 'student_271', 'student_middle_271', 'student_last271', '2019', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_272@somaiya.edu', '372', 'student_272', 'student_middle_272', 'student_last272', '2019', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_273@somaiya.edu', '373', 'student_273', 'student_middle_273', 'student_last273', '2019', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_274@somaiya.edu', '374', 'student_274', 'student_middle_274', 'student_last274', '2019', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_275@somaiya.edu', '375', 'student_275', 'student_middle_275', 'student_last275', '2019', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_276@somaiya.edu', '376', 'student_276', 'student_middle_276', 'student_last276', '2019', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_277@somaiya.edu', '377', 'student_277', 'student_middle_277', 'student_last277', '2019', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_278@somaiya.edu', '378', 'student_278', 'student_middle_278', 'student_last278', '2019', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_279@somaiya.edu', '379', 'student_279', 'student_middle_279', 'student_last279', '2019', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_27@somaiya.edu', '127', 'student_27', 'student_middle_27', 'student_last27', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_280@somaiya.edu', '380', 'student_280', 'student_middle_280', 'student_last280', '2017', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_281@somaiya.edu', '381', 'student_281', 'student_middle_281', 'student_last281', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_282@somaiya.edu', '382', 'student_282', 'student_middle_282', 'student_last282', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_283@somaiya.edu', '383', 'student_283', 'student_middle_283', 'student_last283', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_284@somaiya.edu', '384', 'student_284', 'student_middle_284', 'student_last284', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_285@somaiya.edu', '385', 'student_285', 'student_middle_285', 'student_last285', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_286@somaiya.edu', '386', 'student_286', 'student_middle_286', 'student_last286', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_287@somaiya.edu', '387', 'student_287', 'student_middle_287', 'student_last287', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_288@somaiya.edu', '388', 'student_288', 'student_middle_288', 'student_last288', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_289@somaiya.edu', '389', 'student_289', 'student_middle_289', 'student_last289', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_28@somaiya.edu', '128', 'student_28', 'student_middle_28', 'student_last28', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_290@somaiya.edu', '390', 'student_290', 'student_middle_290', 'student_last290', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_291@somaiya.edu', '391', 'student_291', 'student_middle_291', 'student_last291', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_292@somaiya.edu', '392', 'student_292', 'student_middle_292', 'student_last292', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_293@somaiya.edu', '393', 'student_293', 'student_middle_293', 'student_last293', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_294@somaiya.edu', '394', 'student_294', 'student_middle_294', 'student_last294', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_295@somaiya.edu', '395', 'student_295', 'student_middle_295', 'student_last295', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_296@somaiya.edu', '396', 'student_296', 'student_middle_296', 'student_last296', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_297@somaiya.edu', '397', 'student_297', 'student_middle_297', 'student_last297', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_298@somaiya.edu', '398', 'student_298', 'student_middle_298', 'student_last298', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_299@somaiya.edu', '399', 'student_299', 'student_middle_299', 'student_last299', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_29@somaiya.edu', '129', 'student_29', 'student_middle_29', 'student_last29', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_2@somaiya.edu', '102', 'student_2', 'student_middle_2', 'student_last2', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_300@somaiya.edu', '400', 'student_300', 'student_middle_300', 'student_last300', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_301@somaiya.edu', '401', 'student_301', 'student_middle_301', 'student_last301', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_302@somaiya.edu', '402', 'student_302', 'student_middle_302', 'student_last302', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_303@somaiya.edu', '403', 'student_303', 'student_middle_303', 'student_last303', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_304@somaiya.edu', '404', 'student_304', 'student_middle_304', 'student_last304', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_305@somaiya.edu', '405', 'student_305', 'student_middle_305', 'student_last305', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_306@somaiya.edu', '406', 'student_306', 'student_middle_306', 'student_last306', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_307@somaiya.edu', '407', 'student_307', 'student_middle_307', 'student_last307', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_308@somaiya.edu', '408', 'student_308', 'student_middle_308', 'student_last308', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_309@somaiya.edu', '409', 'student_309', 'student_middle_309', 'student_last309', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_30@somaiya.edu', '130', 'student_30', 'student_middle_30', 'student_last30', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_310@somaiya.edu', '410', 'student_310', 'student_middle_310', 'student_last310', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_311@somaiya.edu', '411', 'student_311', 'student_middle_311', 'student_last311', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_312@somaiya.edu', '412', 'student_312', 'student_middle_312', 'student_last312', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_313@somaiya.edu', '413', 'student_313', 'student_middle_313', 'student_last313', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_314@somaiya.edu', '414', 'student_314', 'student_middle_314', 'student_last314', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_315@somaiya.edu', '415', 'student_315', 'student_middle_315', 'student_last315', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_316@somaiya.edu', '416', 'student_316', 'student_middle_316', 'student_last316', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_317@somaiya.edu', '417', 'student_317', 'student_middle_317', 'student_last317', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_318@somaiya.edu', '418', 'student_318', 'student_middle_318', 'student_last318', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_319@somaiya.edu', '419', 'student_319', 'student_middle_319', 'student_last319', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_31@somaiya.edu', '131', 'student_31', 'student_middle_31', 'student_last31', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_320@somaiya.edu', '420', 'student_320', 'student_middle_320', 'student_last320', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_321@somaiya.edu', '421', 'student_321', 'student_middle_321', 'student_last321', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_322@somaiya.edu', '422', 'student_322', 'student_middle_322', 'student_last322', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_323@somaiya.edu', '423', 'student_323', 'student_middle_323', 'student_last323', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_324@somaiya.edu', '424', 'student_324', 'student_middle_324', 'student_last324', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_325@somaiya.edu', '425', 'student_325', 'student_middle_325', 'student_last325', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_326@somaiya.edu', '426', 'student_326', 'student_middle_326', 'student_last326', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_327@somaiya.edu', '427', 'student_327', 'student_middle_327', 'student_last327', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_328@somaiya.edu', '428', 'student_328', 'student_middle_328', 'student_last328', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_329@somaiya.edu', '429', 'student_329', 'student_middle_329', 'student_last329', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_32@somaiya.edu', '132', 'student_32', 'student_middle_32', 'student_last32', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_330@somaiya.edu', '430', 'student_330', 'student_middle_330', 'student_last330', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_331@somaiya.edu', '431', 'student_331', 'student_middle_331', 'student_last331', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_332@somaiya.edu', '432', 'student_332', 'student_middle_332', 'student_last332', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_333@somaiya.edu', '433', 'student_333', 'student_middle_333', 'student_last333', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_334@somaiya.edu', '434', 'student_334', 'student_middle_334', 'student_last334', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_335@somaiya.edu', '435', 'student_335', 'student_middle_335', 'student_last335', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_336@somaiya.edu', '436', 'student_336', 'student_middle_336', 'student_last336', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_337@somaiya.edu', '437', 'student_337', 'student_middle_337', 'student_last337', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_338@somaiya.edu', '438', 'student_338', 'student_middle_338', 'student_last338', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_339@somaiya.edu', '439', 'student_339', 'student_middle_339', 'student_last339', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_33@somaiya.edu', '133', 'student_33', 'student_middle_33', 'student_last33', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_340@somaiya.edu', '440', 'student_340', 'student_middle_340', 'student_last340', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_341@somaiya.edu', '441', 'student_341', 'student_middle_341', 'student_last341', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_342@somaiya.edu', '442', 'student_342', 'student_middle_342', 'student_last342', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_343@somaiya.edu', '443', 'student_343', 'student_middle_343', 'student_last343', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_344@somaiya.edu', '444', 'student_344', 'student_middle_344', 'student_last344', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_345@somaiya.edu', '445', 'student_345', 'student_middle_345', 'student_last345', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_346@somaiya.edu', '446', 'student_346', 'student_middle_346', 'student_last346', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_347@somaiya.edu', '447', 'student_347', 'student_middle_347', 'student_last347', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_348@somaiya.edu', '448', 'student_348', 'student_middle_348', 'student_last348', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_349@somaiya.edu', '449', 'student_349', 'student_middle_349', 'student_last349', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_34@somaiya.edu', '134', 'student_34', 'student_middle_34', 'student_last34', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_350@somaiya.edu', '450', 'student_350', 'student_middle_350', 'student_last350', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_351@somaiya.edu', '451', 'student_351', 'student_middle_351', 'student_last351', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_352@somaiya.edu', '452', 'student_352', 'student_middle_352', 'student_last352', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_353@somaiya.edu', '453', 'student_353', 'student_middle_353', 'student_last353', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_354@somaiya.edu', '454', 'student_354', 'student_middle_354', 'student_last354', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_355@somaiya.edu', '455', 'student_355', 'student_middle_355', 'student_last355', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_356@somaiya.edu', '456', 'student_356', 'student_middle_356', 'student_last356', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_357@somaiya.edu', '457', 'student_357', 'student_middle_357', 'student_last357', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_358@somaiya.edu', '458', 'student_358', 'student_middle_358', 'student_last358', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_359@somaiya.edu', '459', 'student_359', 'student_middle_359', 'student_last359', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_35@somaiya.edu', '135', 'student_35', 'student_middle_35', 'student_last35', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_360@somaiya.edu', '460', 'student_360', 'student_middle_360', 'student_last360', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_361@somaiya.edu', '461', 'student_361', 'student_middle_361', 'student_last361', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_362@somaiya.edu', '462', 'student_362', 'student_middle_362', 'student_last362', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_363@somaiya.edu', '463', 'student_363', 'student_middle_363', 'student_last363', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_364@somaiya.edu', '464', 'student_364', 'student_middle_364', 'student_last364', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_365@somaiya.edu', '465', 'student_365', 'student_middle_365', 'student_last365', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_366@somaiya.edu', '466', 'student_366', 'student_middle_366', 'student_last366', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_367@somaiya.edu', '467', 'student_367', 'student_middle_367', 'student_last367', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_368@somaiya.edu', '468', 'student_368', 'student_middle_368', 'student_last368', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_369@somaiya.edu', '469', 'student_369', 'student_middle_369', 'student_last369', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_36@somaiya.edu', '136', 'student_36', 'student_middle_36', 'student_last36', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_370@somaiya.edu', '470', 'student_370', 'student_middle_370', 'student_last370', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_371@somaiya.edu', '471', 'student_371', 'student_middle_371', 'student_last371', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_372@somaiya.edu', '472', 'student_372', 'student_middle_372', 'student_last372', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_373@somaiya.edu', '473', 'student_373', 'student_middle_373', 'student_last373', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_374@somaiya.edu', '474', 'student_374', 'student_middle_374', 'student_last374', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_375@somaiya.edu', '475', 'student_375', 'student_middle_375', 'student_last375', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_376@somaiya.edu', '476', 'student_376', 'student_middle_376', 'student_last376', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_377@somaiya.edu', '477', 'student_377', 'student_middle_377', 'student_last377', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_378@somaiya.edu', '478', 'student_378', 'student_middle_378', 'student_last378', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_379@somaiya.edu', '479', 'student_379', 'student_middle_379', 'student_last379', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_37@somaiya.edu', '137', 'student_37', 'student_middle_37', 'student_last37', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_380@somaiya.edu', '480', 'student_380', 'student_middle_380', 'student_last380', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_381@somaiya.edu', '481', 'student_381', 'student_middle_381', 'student_last381', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_382@somaiya.edu', '482', 'student_382', 'student_middle_382', 'student_last382', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_383@somaiya.edu', '483', 'student_383', 'student_middle_383', 'student_last383', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_384@somaiya.edu', '484', 'student_384', 'student_middle_384', 'student_last384', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_385@somaiya.edu', '485', 'student_385', 'student_middle_385', 'student_last385', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_386@somaiya.edu', '486', 'student_386', 'student_middle_386', 'student_last386', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_387@somaiya.edu', '487', 'student_387', 'student_middle_387', 'student_last387', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_388@somaiya.edu', '488', 'student_388', 'student_middle_388', 'student_last388', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_389@somaiya.edu', '489', 'student_389', 'student_middle_389', 'student_last389', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_38@somaiya.edu', '138', 'student_38', 'student_middle_38', 'student_last38', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_390@somaiya.edu', '490', 'student_390', 'student_middle_390', 'student_last390', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_391@somaiya.edu', '491', 'student_391', 'student_middle_391', 'student_last391', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_392@somaiya.edu', '492', 'student_392', 'student_middle_392', 'student_last392', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23');
INSERT INTO `student` (`email_id`, `rollno`, `fname`, `mname`, `lname`, `year_of_admission`, `dept_id`, `program`, `current_sem`, `form_filled`, `adding_email_id`, `timestamp`) VALUES
('student_393@somaiya.edu', '493', 'student_393', 'student_middle_393', 'student_last393', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_394@somaiya.edu', '494', 'student_394', 'student_middle_394', 'student_last394', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_395@somaiya.edu', '495', 'student_395', 'student_middle_395', 'student_last395', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_396@somaiya.edu', '496', 'student_396', 'student_middle_396', 'student_last396', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_397@somaiya.edu', '497', 'student_397', 'student_middle_397', 'student_last397', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_398@somaiya.edu', '498', 'student_398', 'student_middle_398', 'student_last398', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_399@somaiya.edu', '499', 'student_399', 'student_middle_399', 'student_last399', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_39@somaiya.edu', '139', 'student_39', 'student_middle_39', 'student_last39', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_3@somaiya.edu', '103', 'student_3', 'student_middle_3', 'student_last3', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_400@somaiya.edu', '500', 'student_400', 'student_middle_400', 'student_last400', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_401@somaiya.edu', '501', 'student_401', 'student_middle_401', 'student_last401', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_402@somaiya.edu', '502', 'student_402', 'student_middle_402', 'student_last402', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_403@somaiya.edu', '503', 'student_403', 'student_middle_403', 'student_last403', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_404@somaiya.edu', '504', 'student_404', 'student_middle_404', 'student_last404', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_405@somaiya.edu', '505', 'student_405', 'student_middle_405', 'student_last405', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_406@somaiya.edu', '506', 'student_406', 'student_middle_406', 'student_last406', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_407@somaiya.edu', '507', 'student_407', 'student_middle_407', 'student_last407', '2018', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_408@somaiya.edu', '508', 'student_408', 'student_middle_408', 'student_last408', '2019', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_409@somaiya.edu', '509', 'student_409', 'student_middle_409', 'student_last409', '2019', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_40@somaiya.edu', '140', 'student_40', 'student_middle_40', 'student_last40', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_410@somaiya.edu', '510', 'student_410', 'student_middle_410', 'student_last410', '2019', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_411@somaiya.edu', '511', 'student_411', 'student_middle_411', 'student_last411', '2019', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_412@somaiya.edu', '512', 'student_412', 'student_middle_412', 'student_last412', '2019', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_413@somaiya.edu', '513', 'student_413', 'student_middle_413', 'student_last413', '2019', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_414@somaiya.edu', '514', 'student_414', 'student_middle_414', 'student_last414', '2019', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_415@somaiya.edu', '515', 'student_415', 'student_middle_415', 'student_last415', '2019', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_416@somaiya.edu', '516', 'student_416', 'student_middle_416', 'student_last416', '2019', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_417@somaiya.edu', '517', 'student_417', 'student_middle_417', 'student_last417', '2019', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_418@somaiya.edu', '518', 'student_418', 'student_middle_418', 'student_last418', '2019', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_419@somaiya.edu', '519', 'student_419', 'student_middle_419', 'student_last419', '2019', 3, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_41@somaiya.edu', '141', 'student_41', 'student_middle_41', 'student_last41', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_420@somaiya.edu', '520', 'student_420', 'student_middle_420', 'student_last420', '2017', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_421@somaiya.edu', '521', 'student_421', 'student_middle_421', 'student_last421', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_422@somaiya.edu', '522', 'student_422', 'student_middle_422', 'student_last422', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_423@somaiya.edu', '523', 'student_423', 'student_middle_423', 'student_last423', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_424@somaiya.edu', '524', 'student_424', 'student_middle_424', 'student_last424', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_425@somaiya.edu', '525', 'student_425', 'student_middle_425', 'student_last425', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_426@somaiya.edu', '526', 'student_426', 'student_middle_426', 'student_last426', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_427@somaiya.edu', '527', 'student_427', 'student_middle_427', 'student_last427', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_428@somaiya.edu', '528', 'student_428', 'student_middle_428', 'student_last428', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_429@somaiya.edu', '529', 'student_429', 'student_middle_429', 'student_last429', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_42@somaiya.edu', '142', 'student_42', 'student_middle_42', 'student_last42', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_430@somaiya.edu', '530', 'student_430', 'student_middle_430', 'student_last430', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_431@somaiya.edu', '531', 'student_431', 'student_middle_431', 'student_last431', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_432@somaiya.edu', '532', 'student_432', 'student_middle_432', 'student_last432', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_433@somaiya.edu', '533', 'student_433', 'student_middle_433', 'student_last433', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_434@somaiya.edu', '534', 'student_434', 'student_middle_434', 'student_last434', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_435@somaiya.edu', '535', 'student_435', 'student_middle_435', 'student_last435', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_436@somaiya.edu', '536', 'student_436', 'student_middle_436', 'student_last436', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_437@somaiya.edu', '537', 'student_437', 'student_middle_437', 'student_last437', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_438@somaiya.edu', '538', 'student_438', 'student_middle_438', 'student_last438', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_439@somaiya.edu', '539', 'student_439', 'student_middle_439', 'student_last439', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_43@somaiya.edu', '143', 'student_43', 'student_middle_43', 'student_last43', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_440@somaiya.edu', '540', 'student_440', 'student_middle_440', 'student_last440', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_441@somaiya.edu', '541', 'student_441', 'student_middle_441', 'student_last441', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_442@somaiya.edu', '542', 'student_442', 'student_middle_442', 'student_last442', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_443@somaiya.edu', '543', 'student_443', 'student_middle_443', 'student_last443', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_444@somaiya.edu', '544', 'student_444', 'student_middle_444', 'student_last444', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_445@somaiya.edu', '545', 'student_445', 'student_middle_445', 'student_last445', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_446@somaiya.edu', '546', 'student_446', 'student_middle_446', 'student_last446', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_447@somaiya.edu', '547', 'student_447', 'student_middle_447', 'student_last447', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_448@somaiya.edu', '548', 'student_448', 'student_middle_448', 'student_last448', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_449@somaiya.edu', '549', 'student_449', 'student_middle_449', 'student_last449', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_44@somaiya.edu', '144', 'student_44', 'student_middle_44', 'student_last44', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_450@somaiya.edu', '550', 'student_450', 'student_middle_450', 'student_last450', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_451@somaiya.edu', '551', 'student_451', 'student_middle_451', 'student_last451', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_452@somaiya.edu', '552', 'student_452', 'student_middle_452', 'student_last452', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_453@somaiya.edu', '553', 'student_453', 'student_middle_453', 'student_last453', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_454@somaiya.edu', '554', 'student_454', 'student_middle_454', 'student_last454', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_455@somaiya.edu', '555', 'student_455', 'student_middle_455', 'student_last455', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_456@somaiya.edu', '556', 'student_456', 'student_middle_456', 'student_last456', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_457@somaiya.edu', '557', 'student_457', 'student_middle_457', 'student_last457', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_458@somaiya.edu', '558', 'student_458', 'student_middle_458', 'student_last458', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_459@somaiya.edu', '559', 'student_459', 'student_middle_459', 'student_last459', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_45@somaiya.edu', '145', 'student_45', 'student_middle_45', 'student_last45', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_460@somaiya.edu', '560', 'student_460', 'student_middle_460', 'student_last460', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_461@somaiya.edu', '561', 'student_461', 'student_middle_461', 'student_last461', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_462@somaiya.edu', '562', 'student_462', 'student_middle_462', 'student_last462', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_463@somaiya.edu', '563', 'student_463', 'student_middle_463', 'student_last463', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_464@somaiya.edu', '564', 'student_464', 'student_middle_464', 'student_last464', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_465@somaiya.edu', '565', 'student_465', 'student_middle_465', 'student_last465', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_466@somaiya.edu', '566', 'student_466', 'student_middle_466', 'student_last466', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_467@somaiya.edu', '567', 'student_467', 'student_middle_467', 'student_last467', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_468@somaiya.edu', '568', 'student_468', 'student_middle_468', 'student_last468', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_469@somaiya.edu', '569', 'student_469', 'student_middle_469', 'student_last469', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_46@somaiya.edu', '146', 'student_46', 'student_middle_46', 'student_last46', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_470@somaiya.edu', '570', 'student_470', 'student_middle_470', 'student_last470', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_471@somaiya.edu', '571', 'student_471', 'student_middle_471', 'student_last471', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_472@somaiya.edu', '572', 'student_472', 'student_middle_472', 'student_last472', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_473@somaiya.edu', '573', 'student_473', 'student_middle_473', 'student_last473', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_474@somaiya.edu', '574', 'student_474', 'student_middle_474', 'student_last474', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_475@somaiya.edu', '575', 'student_475', 'student_middle_475', 'student_last475', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_476@somaiya.edu', '576', 'student_476', 'student_middle_476', 'student_last476', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_477@somaiya.edu', '577', 'student_477', 'student_middle_477', 'student_last477', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_478@somaiya.edu', '578', 'student_478', 'student_middle_478', 'student_last478', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_479@somaiya.edu', '579', 'student_479', 'student_middle_479', 'student_last479', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_47@somaiya.edu', '147', 'student_47', 'student_middle_47', 'student_last47', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_480@somaiya.edu', '580', 'student_480', 'student_middle_480', 'student_last480', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_481@somaiya.edu', '581', 'student_481', 'student_middle_481', 'student_last481', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_482@somaiya.edu', '582', 'student_482', 'student_middle_482', 'student_last482', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_483@somaiya.edu', '583', 'student_483', 'student_middle_483', 'student_last483', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_484@somaiya.edu', '584', 'student_484', 'student_middle_484', 'student_last484', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_485@somaiya.edu', '585', 'student_485', 'student_middle_485', 'student_last485', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_486@somaiya.edu', '586', 'student_486', 'student_middle_486', 'student_last486', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_487@somaiya.edu', '587', 'student_487', 'student_middle_487', 'student_last487', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_488@somaiya.edu', '588', 'student_488', 'student_middle_488', 'student_last488', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_489@somaiya.edu', '589', 'student_489', 'student_middle_489', 'student_last489', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_48@somaiya.edu', '148', 'student_48', 'student_middle_48', 'student_last48', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_490@somaiya.edu', '590', 'student_490', 'student_middle_490', 'student_last490', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_491@somaiya.edu', '591', 'student_491', 'student_middle_491', 'student_last491', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_492@somaiya.edu', '592', 'student_492', 'student_middle_492', 'student_last492', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_493@somaiya.edu', '593', 'student_493', 'student_middle_493', 'student_last493', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_494@somaiya.edu', '594', 'student_494', 'student_middle_494', 'student_last494', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_495@somaiya.edu', '595', 'student_495', 'student_middle_495', 'student_last495', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_496@somaiya.edu', '596', 'student_496', 'student_middle_496', 'student_last496', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_497@somaiya.edu', '597', 'student_497', 'student_middle_497', 'student_last497', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_498@somaiya.edu', '598', 'student_498', 'student_middle_498', 'student_last498', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_499@somaiya.edu', '599', 'student_499', 'student_middle_499', 'student_last499', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_49@somaiya.edu', '149', 'student_49', 'student_middle_49', 'student_last49', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_4@somaiya.edu', '104', 'student_4', 'student_middle_4', 'student_last4', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_500@somaiya.edu', '600', 'student_500', 'student_middle_500', 'student_last500', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_501@somaiya.edu', '601', 'student_501', 'student_middle_501', 'student_last501', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_502@somaiya.edu', '602', 'student_502', 'student_middle_502', 'student_last502', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_503@somaiya.edu', '603', 'student_503', 'student_middle_503', 'student_last503', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_504@somaiya.edu', '604', 'student_504', 'student_middle_504', 'student_last504', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_505@somaiya.edu', '605', 'student_505', 'student_middle_505', 'student_last505', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_506@somaiya.edu', '606', 'student_506', 'student_middle_506', 'student_last506', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_507@somaiya.edu', '607', 'student_507', 'student_middle_507', 'student_last507', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_508@somaiya.edu', '608', 'student_508', 'student_middle_508', 'student_last508', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_509@somaiya.edu', '609', 'student_509', 'student_middle_509', 'student_last509', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_50@somaiya.edu', '150', 'student_50', 'student_middle_50', 'student_last50', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_510@somaiya.edu', '610', 'student_510', 'student_middle_510', 'student_last510', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_511@somaiya.edu', '611', 'student_511', 'student_middle_511', 'student_last511', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_512@somaiya.edu', '612', 'student_512', 'student_middle_512', 'student_last512', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_513@somaiya.edu', '613', 'student_513', 'student_middle_513', 'student_last513', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_514@somaiya.edu', '614', 'student_514', 'student_middle_514', 'student_last514', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_515@somaiya.edu', '615', 'student_515', 'student_middle_515', 'student_last515', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_516@somaiya.edu', '616', 'student_516', 'student_middle_516', 'student_last516', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_517@somaiya.edu', '617', 'student_517', 'student_middle_517', 'student_last517', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_518@somaiya.edu', '618', 'student_518', 'student_middle_518', 'student_last518', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_519@somaiya.edu', '619', 'student_519', 'student_middle_519', 'student_last519', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_51@somaiya.edu', '151', 'student_51', 'student_middle_51', 'student_last51', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_520@somaiya.edu', '620', 'student_520', 'student_middle_520', 'student_last520', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_521@somaiya.edu', '621', 'student_521', 'student_middle_521', 'student_last521', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_522@somaiya.edu', '622', 'student_522', 'student_middle_522', 'student_last522', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_523@somaiya.edu', '623', 'student_523', 'student_middle_523', 'student_last523', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_524@somaiya.edu', '624', 'student_524', 'student_middle_524', 'student_last524', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_525@somaiya.edu', '625', 'student_525', 'student_middle_525', 'student_last525', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_526@somaiya.edu', '626', 'student_526', 'student_middle_526', 'student_last526', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_527@somaiya.edu', '627', 'student_527', 'student_middle_527', 'student_last527', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_528@somaiya.edu', '628', 'student_528', 'student_middle_528', 'student_last528', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_529@somaiya.edu', '629', 'student_529', 'student_middle_529', 'student_last529', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_52@somaiya.edu', '152', 'student_52', 'student_middle_52', 'student_last52', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_530@somaiya.edu', '630', 'student_530', 'student_middle_530', 'student_last530', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_531@somaiya.edu', '631', 'student_531', 'student_middle_531', 'student_last531', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_532@somaiya.edu', '632', 'student_532', 'student_middle_532', 'student_last532', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_533@somaiya.edu', '633', 'student_533', 'student_middle_533', 'student_last533', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_534@somaiya.edu', '634', 'student_534', 'student_middle_534', 'student_last534', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_535@somaiya.edu', '635', 'student_535', 'student_middle_535', 'student_last535', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_536@somaiya.edu', '636', 'student_536', 'student_middle_536', 'student_last536', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_537@somaiya.edu', '637', 'student_537', 'student_middle_537', 'student_last537', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_538@somaiya.edu', '638', 'student_538', 'student_middle_538', 'student_last538', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_539@somaiya.edu', '639', 'student_539', 'student_middle_539', 'student_last539', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_53@somaiya.edu', '153', 'student_53', 'student_middle_53', 'student_last53', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_540@somaiya.edu', '640', 'student_540', 'student_middle_540', 'student_last540', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_541@somaiya.edu', '641', 'student_541', 'student_middle_541', 'student_last541', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_542@somaiya.edu', '642', 'student_542', 'student_middle_542', 'student_last542', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_543@somaiya.edu', '643', 'student_543', 'student_middle_543', 'student_last543', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_544@somaiya.edu', '644', 'student_544', 'student_middle_544', 'student_last544', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_545@somaiya.edu', '645', 'student_545', 'student_middle_545', 'student_last545', '2018', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_546@somaiya.edu', '646', 'student_546', 'student_middle_546', 'student_last546', '2019', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_547@somaiya.edu', '647', 'student_547', 'student_middle_547', 'student_last547', '2019', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_548@somaiya.edu', '648', 'student_548', 'student_middle_548', 'student_last548', '2019', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_549@somaiya.edu', '649', 'student_549', 'student_middle_549', 'student_last549', '2019', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_54@somaiya.edu', '154', 'student_54', 'student_middle_54', 'student_last54', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_550@somaiya.edu', '650', 'student_550', 'student_middle_550', 'student_last550', '2019', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_551@somaiya.edu', '651', 'student_551', 'student_middle_551', 'student_last551', '2019', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_552@somaiya.edu', '652', 'student_552', 'student_middle_552', 'student_last552', '2019', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_553@somaiya.edu', '653', 'student_553', 'student_middle_553', 'student_last553', '2019', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_554@somaiya.edu', '654', 'student_554', 'student_middle_554', 'student_last554', '2019', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_555@somaiya.edu', '655', 'student_555', 'student_middle_555', 'student_last555', '2019', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_556@somaiya.edu', '656', 'student_556', 'student_middle_556', 'student_last556', '2019', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_557@somaiya.edu', '657', 'student_557', 'student_middle_557', 'student_last557', '2019', 4, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_558@somaiya.edu', '658', 'student_558', 'student_middle_558', 'student_last558', '2017', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_559@somaiya.edu', '659', 'student_559', 'student_middle_559', 'student_last559', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_55@somaiya.edu', '155', 'student_55', 'student_middle_55', 'student_last55', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_560@somaiya.edu', '660', 'student_560', 'student_middle_560', 'student_last560', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_561@somaiya.edu', '661', 'student_561', 'student_middle_561', 'student_last561', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_562@somaiya.edu', '662', 'student_562', 'student_middle_562', 'student_last562', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_563@somaiya.edu', '663', 'student_563', 'student_middle_563', 'student_last563', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_564@somaiya.edu', '664', 'student_564', 'student_middle_564', 'student_last564', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_565@somaiya.edu', '665', 'student_565', 'student_middle_565', 'student_last565', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_566@somaiya.edu', '666', 'student_566', 'student_middle_566', 'student_last566', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_567@somaiya.edu', '667', 'student_567', 'student_middle_567', 'student_last567', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_568@somaiya.edu', '668', 'student_568', 'student_middle_568', 'student_last568', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_569@somaiya.edu', '669', 'student_569', 'student_middle_569', 'student_last569', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_56@somaiya.edu', '156', 'student_56', 'student_middle_56', 'student_last56', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_570@somaiya.edu', '670', 'student_570', 'student_middle_570', 'student_last570', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_571@somaiya.edu', '671', 'student_571', 'student_middle_571', 'student_last571', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_572@somaiya.edu', '672', 'student_572', 'student_middle_572', 'student_last572', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_573@somaiya.edu', '673', 'student_573', 'student_middle_573', 'student_last573', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_574@somaiya.edu', '674', 'student_574', 'student_middle_574', 'student_last574', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_575@somaiya.edu', '675', 'student_575', 'student_middle_575', 'student_last575', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_576@somaiya.edu', '676', 'student_576', 'student_middle_576', 'student_last576', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_577@somaiya.edu', '677', 'student_577', 'student_middle_577', 'student_last577', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_578@somaiya.edu', '678', 'student_578', 'student_middle_578', 'student_last578', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_579@somaiya.edu', '679', 'student_579', 'student_middle_579', 'student_last579', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_57@somaiya.edu', '157', 'student_57', 'student_middle_57', 'student_last57', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_580@somaiya.edu', '680', 'student_580', 'student_middle_580', 'student_last580', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_581@somaiya.edu', '681', 'student_581', 'student_middle_581', 'student_last581', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_582@somaiya.edu', '682', 'student_582', 'student_middle_582', 'student_last582', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_583@somaiya.edu', '683', 'student_583', 'student_middle_583', 'student_last583', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_584@somaiya.edu', '684', 'student_584', 'student_middle_584', 'student_last584', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_585@somaiya.edu', '685', 'student_585', 'student_middle_585', 'student_last585', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_586@somaiya.edu', '686', 'student_586', 'student_middle_586', 'student_last586', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_587@somaiya.edu', '687', 'student_587', 'student_middle_587', 'student_last587', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_588@somaiya.edu', '688', 'student_588', 'student_middle_588', 'student_last588', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_589@somaiya.edu', '689', 'student_589', 'student_middle_589', 'student_last589', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_58@somaiya.edu', '158', 'student_58', 'student_middle_58', 'student_last58', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_590@somaiya.edu', '690', 'student_590', 'student_middle_590', 'student_last590', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_591@somaiya.edu', '691', 'student_591', 'student_middle_591', 'student_last591', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_592@somaiya.edu', '692', 'student_592', 'student_middle_592', 'student_last592', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_593@somaiya.edu', '693', 'student_593', 'student_middle_593', 'student_last593', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_594@somaiya.edu', '694', 'student_594', 'student_middle_594', 'student_last594', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_595@somaiya.edu', '695', 'student_595', 'student_middle_595', 'student_last595', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_596@somaiya.edu', '696', 'student_596', 'student_middle_596', 'student_last596', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_597@somaiya.edu', '697', 'student_597', 'student_middle_597', 'student_last597', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_598@somaiya.edu', '698', 'student_598', 'student_middle_598', 'student_last598', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_599@somaiya.edu', '699', 'student_599', 'student_middle_599', 'student_last599', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_59@somaiya.edu', '159', 'student_59', 'student_middle_59', 'student_last59', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_5@somaiya.edu', '105', 'student_5', 'student_middle_5', 'student_last5', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_600@somaiya.edu', '700', 'student_600', 'student_middle_600', 'student_last600', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_601@somaiya.edu', '701', 'student_601', 'student_middle_601', 'student_last601', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_602@somaiya.edu', '702', 'student_602', 'student_middle_602', 'student_last602', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_603@somaiya.edu', '703', 'student_603', 'student_middle_603', 'student_last603', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_604@somaiya.edu', '704', 'student_604', 'student_middle_604', 'student_last604', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_605@somaiya.edu', '705', 'student_605', 'student_middle_605', 'student_last605', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_606@somaiya.edu', '706', 'student_606', 'student_middle_606', 'student_last606', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_607@somaiya.edu', '707', 'student_607', 'student_middle_607', 'student_last607', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_608@somaiya.edu', '708', 'student_608', 'student_middle_608', 'student_last608', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_609@somaiya.edu', '709', 'student_609', 'student_middle_609', 'student_last609', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_60@somaiya.edu', '160', 'student_60', 'student_middle_60', 'student_last60', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_610@somaiya.edu', '710', 'student_610', 'student_middle_610', 'student_last610', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_611@somaiya.edu', '711', 'student_611', 'student_middle_611', 'student_last611', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_612@somaiya.edu', '712', 'student_612', 'student_middle_612', 'student_last612', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_613@somaiya.edu', '713', 'student_613', 'student_middle_613', 'student_last613', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_614@somaiya.edu', '714', 'student_614', 'student_middle_614', 'student_last614', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_615@somaiya.edu', '715', 'student_615', 'student_middle_615', 'student_last615', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_616@somaiya.edu', '716', 'student_616', 'student_middle_616', 'student_last616', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_617@somaiya.edu', '717', 'student_617', 'student_middle_617', 'student_last617', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_618@somaiya.edu', '718', 'student_618', 'student_middle_618', 'student_last618', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_619@somaiya.edu', '719', 'student_619', 'student_middle_619', 'student_last619', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_61@somaiya.edu', '161', 'student_61', 'student_middle_61', 'student_last61', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_620@somaiya.edu', '720', 'student_620', 'student_middle_620', 'student_last620', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_621@somaiya.edu', '721', 'student_621', 'student_middle_621', 'student_last621', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_622@somaiya.edu', '722', 'student_622', 'student_middle_622', 'student_last622', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_623@somaiya.edu', '723', 'student_623', 'student_middle_623', 'student_last623', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_624@somaiya.edu', '724', 'student_624', 'student_middle_624', 'student_last624', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_625@somaiya.edu', '725', 'student_625', 'student_middle_625', 'student_last625', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_626@somaiya.edu', '726', 'student_626', 'student_middle_626', 'student_last626', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_627@somaiya.edu', '727', 'student_627', 'student_middle_627', 'student_last627', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_628@somaiya.edu', '728', 'student_628', 'student_middle_628', 'student_last628', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_629@somaiya.edu', '729', 'student_629', 'student_middle_629', 'student_last629', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_62@somaiya.edu', '162', 'student_62', 'student_middle_62', 'student_last62', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_630@somaiya.edu', '730', 'student_630', 'student_middle_630', 'student_last630', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_631@somaiya.edu', '731', 'student_631', 'student_middle_631', 'student_last631', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_632@somaiya.edu', '732', 'student_632', 'student_middle_632', 'student_last632', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_633@somaiya.edu', '733', 'student_633', 'student_middle_633', 'student_last633', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_634@somaiya.edu', '734', 'student_634', 'student_middle_634', 'student_last634', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_635@somaiya.edu', '735', 'student_635', 'student_middle_635', 'student_last635', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_636@somaiya.edu', '736', 'student_636', 'student_middle_636', 'student_last636', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_637@somaiya.edu', '737', 'student_637', 'student_middle_637', 'student_last637', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_638@somaiya.edu', '738', 'student_638', 'student_middle_638', 'student_last638', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_639@somaiya.edu', '739', 'student_639', 'student_middle_639', 'student_last639', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_63@somaiya.edu', '163', 'student_63', 'student_middle_63', 'student_last63', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_640@somaiya.edu', '740', 'student_640', 'student_middle_640', 'student_last640', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_641@somaiya.edu', '741', 'student_641', 'student_middle_641', 'student_last641', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_642@somaiya.edu', '742', 'student_642', 'student_middle_642', 'student_last642', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_643@somaiya.edu', '743', 'student_643', 'student_middle_643', 'student_last643', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_644@somaiya.edu', '744', 'student_644', 'student_middle_644', 'student_last644', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_645@somaiya.edu', '745', 'student_645', 'student_middle_645', 'student_last645', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_646@somaiya.edu', '746', 'student_646', 'student_middle_646', 'student_last646', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_647@somaiya.edu', '747', 'student_647', 'student_middle_647', 'student_last647', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_648@somaiya.edu', '748', 'student_648', 'student_middle_648', 'student_last648', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_649@somaiya.edu', '749', 'student_649', 'student_middle_649', 'student_last649', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_64@somaiya.edu', '164', 'student_64', 'student_middle_64', 'student_last64', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_650@somaiya.edu', '750', 'student_650', 'student_middle_650', 'student_last650', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_651@somaiya.edu', '751', 'student_651', 'student_middle_651', 'student_last651', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_652@somaiya.edu', '752', 'student_652', 'student_middle_652', 'student_last652', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_653@somaiya.edu', '753', 'student_653', 'student_middle_653', 'student_last653', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_654@somaiya.edu', '754', 'student_654', 'student_middle_654', 'student_last654', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_655@somaiya.edu', '755', 'student_655', 'student_middle_655', 'student_last655', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_656@somaiya.edu', '756', 'student_656', 'student_middle_656', 'student_last656', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_657@somaiya.edu', '757', 'student_657', 'student_middle_657', 'student_last657', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_658@somaiya.edu', '758', 'student_658', 'student_middle_658', 'student_last658', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_659@somaiya.edu', '759', 'student_659', 'student_middle_659', 'student_last659', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_65@somaiya.edu', '165', 'student_65', 'student_middle_65', 'student_last65', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_660@somaiya.edu', '760', 'student_660', 'student_middle_660', 'student_last660', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_661@somaiya.edu', '761', 'student_661', 'student_middle_661', 'student_last661', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_662@somaiya.edu', '762', 'student_662', 'student_middle_662', 'student_last662', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_663@somaiya.edu', '763', 'student_663', 'student_middle_663', 'student_last663', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_664@somaiya.edu', '764', 'student_664', 'student_middle_664', 'student_last664', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_665@somaiya.edu', '765', 'student_665', 'student_middle_665', 'student_last665', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_666@somaiya.edu', '766', 'student_666', 'student_middle_666', 'student_last666', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_667@somaiya.edu', '767', 'student_667', 'student_middle_667', 'student_last667', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_668@somaiya.edu', '768', 'student_668', 'student_middle_668', 'student_last668', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_669@somaiya.edu', '769', 'student_669', 'student_middle_669', 'student_last669', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_66@somaiya.edu', '166', 'student_66', 'student_middle_66', 'student_last66', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_670@somaiya.edu', '770', 'student_670', 'student_middle_670', 'student_last670', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_671@somaiya.edu', '771', 'student_671', 'student_middle_671', 'student_last671', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_672@somaiya.edu', '772', 'student_672', 'student_middle_672', 'student_last672', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_673@somaiya.edu', '773', 'student_673', 'student_middle_673', 'student_last673', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_674@somaiya.edu', '774', 'student_674', 'student_middle_674', 'student_last674', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_675@somaiya.edu', '775', 'student_675', 'student_middle_675', 'student_last675', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_676@somaiya.edu', '776', 'student_676', 'student_middle_676', 'student_last676', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_677@somaiya.edu', '777', 'student_677', 'student_middle_677', 'student_last677', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_678@somaiya.edu', '778', 'student_678', 'student_middle_678', 'student_last678', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_679@somaiya.edu', '779', 'student_679', 'student_middle_679', 'student_last679', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_67@somaiya.edu', '167', 'student_67', 'student_middle_67', 'student_last67', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_680@somaiya.edu', '780', 'student_680', 'student_middle_680', 'student_last680', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_681@somaiya.edu', '781', 'student_681', 'student_middle_681', 'student_last681', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_682@somaiya.edu', '782', 'student_682', 'student_middle_682', 'student_last682', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_683@somaiya.edu', '783', 'student_683', 'student_middle_683', 'student_last683', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_684@somaiya.edu', '784', 'student_684', 'student_middle_684', 'student_last684', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23');
INSERT INTO `student` (`email_id`, `rollno`, `fname`, `mname`, `lname`, `year_of_admission`, `dept_id`, `program`, `current_sem`, `form_filled`, `adding_email_id`, `timestamp`) VALUES
('student_685@somaiya.edu', '785', 'student_685', 'student_middle_685', 'student_last685', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_686@somaiya.edu', '786', 'student_686', 'student_middle_686', 'student_last686', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_687@somaiya.edu', '787', 'student_687', 'student_middle_687', 'student_last687', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_688@somaiya.edu', '788', 'student_688', 'student_middle_688', 'student_last688', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_689@somaiya.edu', '789', 'student_689', 'student_middle_689', 'student_last689', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_68@somaiya.edu', '168', 'student_68', 'student_middle_68', 'student_last68', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_690@somaiya.edu', '790', 'student_690', 'student_middle_690', 'student_last690', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_691@somaiya.edu', '791', 'student_691', 'student_middle_691', 'student_last691', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_692@somaiya.edu', '792', 'student_692', 'student_middle_692', 'student_last692', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_693@somaiya.edu', '793', 'student_693', 'student_middle_693', 'student_last693', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_694@somaiya.edu', '794', 'student_694', 'student_middle_694', 'student_last694', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_695@somaiya.edu', '795', 'student_695', 'student_middle_695', 'student_last695', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_696@somaiya.edu', '796', 'student_696', 'student_middle_696', 'student_last696', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_697@somaiya.edu', '797', 'student_697', 'student_middle_697', 'student_last697', '2018', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_698@somaiya.edu', '798', 'student_698', 'student_middle_698', 'student_last698', '2019', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_699@somaiya.edu', '799', 'student_699', 'student_middle_699', 'student_last699', '2019', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_69@somaiya.edu', '169', 'student_69', 'student_middle_69', 'student_last69', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_6@somaiya.edu', '106', 'student_6', 'student_middle_6', 'student_last6', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_700@somaiya.edu', '800', 'student_700', 'student_middle_700', 'student_last700', '2019', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_701@somaiya.edu', '801', 'student_701', 'student_middle_701', 'student_last701', '2019', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_702@somaiya.edu', '802', 'student_702', 'student_middle_702', 'student_last702', '2019', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_703@somaiya.edu', '803', 'student_703', 'student_middle_703', 'student_last703', '2019', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_704@somaiya.edu', '804', 'student_704', 'student_middle_704', 'student_last704', '2019', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_705@somaiya.edu', '805', 'student_705', 'student_middle_705', 'student_last705', '2019', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_706@somaiya.edu', '806', 'student_706', 'student_middle_706', 'student_last706', '2019', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_707@somaiya.edu', '807', 'student_707', 'student_middle_707', 'student_last707', '2019', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_708@somaiya.edu', '808', 'student_708', 'student_middle_708', 'student_last708', '2019', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_709@somaiya.edu', '809', 'student_709', 'student_middle_709', 'student_last709', '2019', 5, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_70@somaiya.edu', '170', 'student_70', 'student_middle_70', 'student_last70', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_710@somaiya.edu', '810', 'student_710', 'student_middle_710', 'student_last710', '2017', 2, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_71@somaiya.edu', '171', 'student_71', 'student_middle_71', 'student_last71', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_72@somaiya.edu', '172', 'student_72', 'student_middle_72', 'student_last72', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_73@somaiya.edu', '173', 'student_73', 'student_middle_73', 'student_last73', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_74@somaiya.edu', '174', 'student_74', 'student_middle_74', 'student_last74', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_75@somaiya.edu', '175', 'student_75', 'student_middle_75', 'student_last75', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_76@somaiya.edu', '176', 'student_76', 'student_middle_76', 'student_last76', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_77@somaiya.edu', '177', 'student_77', 'student_middle_77', 'student_last77', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_78@somaiya.edu', '178', 'student_78', 'student_middle_78', 'student_last78', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_79@somaiya.edu', '179', 'student_79', 'student_middle_79', 'student_last79', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_7@somaiya.edu', '107', 'student_7', 'student_middle_7', 'student_last7', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_80@somaiya.edu', '180', 'student_80', 'student_middle_80', 'student_last80', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_81@somaiya.edu', '181', 'student_81', 'student_middle_81', 'student_last81', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_82@somaiya.edu', '182', 'student_82', 'student_middle_82', 'student_last82', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_83@somaiya.edu', '183', 'student_83', 'student_middle_83', 'student_last83', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_84@somaiya.edu', '184', 'student_84', 'student_middle_84', 'student_last84', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_85@somaiya.edu', '185', 'student_85', 'student_middle_85', 'student_last85', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_86@somaiya.edu', '186', 'student_86', 'student_middle_86', 'student_last86', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_87@somaiya.edu', '187', 'student_87', 'student_middle_87', 'student_last87', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_88@somaiya.edu', '188', 'student_88', 'student_middle_88', 'student_last88', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_89@somaiya.edu', '189', 'student_89', 'student_middle_89', 'student_last89', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_8@somaiya.edu', '108', 'student_8', 'student_middle_8', 'student_last8', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_90@somaiya.edu', '190', 'student_90', 'student_middle_90', 'student_last90', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_91@somaiya.edu', '191', 'student_91', 'student_middle_91', 'student_last91', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_92@somaiya.edu', '192', 'student_92', 'student_middle_92', 'student_last92', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_93@somaiya.edu', '193', 'student_93', 'student_middle_93', 'student_last93', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_94@somaiya.edu', '194', 'student_94', 'student_middle_94', 'student_last94', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_95@somaiya.edu', '195', 'student_95', 'student_middle_95', 'student_last95', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_96@somaiya.edu', '196', 'student_96', 'student_middle_96', 'student_last96', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_97@somaiya.edu', '197', 'student_97', 'student_middle_97', 'student_last97', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_98@somaiya.edu', '198', 'student_98', 'student_middle_98', 'student_last98', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_99@somaiya.edu', '199', 'student_99', 'student_middle_99', 'student_last99', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23'),
('student_9@somaiya.edu', '109', 'student_9', 'student_middle_9', 'student_last9', '2018', 1, 'UG', 4, 0, 'IC@somaiya.edu', '2020-07-06 16:03:23');

-- --------------------------------------------------------

--
-- Table structure for table `student_audit`
--

CREATE TABLE `student_audit` (
  `email_id` varchar(50) NOT NULL,
  `cid` varchar(30) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `currently_active` tinyint(4) NOT NULL DEFAULT 0,
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

-- --------------------------------------------------------

--
-- Table structure for table `student_form`
--

CREATE TABLE `student_form` (
  `form_id` int(11) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `form_filled` tinyint(4) NOT NULL DEFAULT 0,
  `timestamp` varchar(30) NOT NULL DEFAULT '',
  `currently_active` tinyint(4) NOT NULL DEFAULT 0,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_form_log`
--

CREATE TABLE `student_form_log` (
  `form_id` int(11) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `form_filled` tinyint(4) NOT NULL DEFAULT 0,
  `timestamp` varchar(30) NOT NULL DEFAULT '',
  `currently_active` tinyint(4) NOT NULL DEFAULT 0,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

CREATE TABLE `student_marks` (
  `email_id` varchar(50) NOT NULL,
  `rollno` varchar(20) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `gpa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_preferences`
--

CREATE TABLE `student_preferences` (
  `form_id` int(11) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(9) NOT NULL,
  `currently_active` int(1) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `prefered_cid` varchar(30) NOT NULL,
  `prefered_course_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_preferences_log`
--

CREATE TABLE `student_preferences_log` (
  `form_id` int(11) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(9) NOT NULL,
  `currently_active` int(1) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `prefered_cid` varchar(30) NOT NULL,
  `prefered_course_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`cid`,`sem`,`year`,`course_type_id`) USING BTREE,
  ADD KEY `course_type_id_fk` (`course_type_id`);

--
-- Indexes for table `course_applicable_dept`
--
ALTER TABLE `course_applicable_dept`
  ADD PRIMARY KEY (`cid`,`sem`,`year`,`dept_id`,`course_type_id`,`program`) USING BTREE,
  ADD KEY `dept_audit_course_applicable` (`dept_id`),
  ADD KEY `course_type_id_dept_applicable_fk` (`course_type_id`);

--
-- Indexes for table `course_applicable_dept_log`
--
ALTER TABLE `course_applicable_dept_log`
  ADD PRIMARY KEY (`cid`,`sem`,`year`,`dept_id`,`course_type_id`,`program`) USING BTREE,
  ADD KEY `dept_audit_course_applicable` (`dept_id`),
  ADD KEY `course_type_id_dept_applicable_fk` (`course_type_id`);

--
-- Indexes for table `course_floating_dept`
--
ALTER TABLE `course_floating_dept`
  ADD PRIMARY KEY (`cid`,`sem`,`year`,`dept_id`,`course_type_id`,`program`) USING BTREE,
  ADD KEY `audit_course_floating_dept_department` (`dept_id`),
  ADD KEY `audit_course_floating_dept_course_type` (`course_type_id`);

--
-- Indexes for table `course_floating_dept_log`
--
ALTER TABLE `course_floating_dept_log`
  ADD PRIMARY KEY (`cid`,`sem`,`year`,`dept_id`,`course_type_id`,`program`) USING BTREE,
  ADD KEY `audit_course_floating_dept_department` (`dept_id`),
  ADD KEY `audit_course_floating_dept_course_type` (`course_type_id`);

--
-- Indexes for table `course_log`
--
ALTER TABLE `course_log`
  ADD PRIMARY KEY (`cid`,`sem`,`year`,`course_type_id`) USING BTREE,
  ADD KEY `course_type_id_log_fk` (`course_type_id`);

--
-- Indexes for table `course_similar_map`
--
ALTER TABLE `course_similar_map`
  ADD PRIMARY KEY (`newcid`,`new_course_type_id`,`newsem`,`newyear`,`oldcid`,`old_course_type_id`,`oldsem`,`oldyear`) USING BTREE,
  ADD KEY `map_new_course_type_id_fk` (`new_course_type_id`),
  ADD KEY `map_old_course_type_id_fk` (`old_course_type_id`);

--
-- Indexes for table `course_similar_map_log`
--
ALTER TABLE `course_similar_map_log`
  ADD PRIMARY KEY (`newcid`,`new_course_type_id`,`newsem`,`newyear`,`oldcid`,`old_course_type_id`,`oldsem`,`oldyear`) USING BTREE,
  ADD KEY `map_new_course_type_id_fk` (`new_course_type_id`),
  ADD KEY `map_old_course_type_id_fk` (`old_course_type_id`);

--
-- Indexes for table `course_types`
--
ALTER TABLE `course_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `current_sem_info`
--
ALTER TABLE `current_sem_info`
  ADD PRIMARY KEY (`sem_type`,`academic_year`);

--
-- Indexes for table `delete_temp_tables`
--
ALTER TABLE `delete_temp_tables`
  ADD PRIMARY KEY (`table_name`,`timestamp_created`) USING BTREE;

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
  ADD UNIQUE KEY `faculty_code` (`faculty_code`,`employee_id`),
  ADD KEY `faculty_department` (`dept_id`);

--
-- Indexes for table `faculty_certification`
--
ALTER TABLE `faculty_certification`
  ADD PRIMARY KEY (`email_id`,`course_certified`);

--
-- Indexes for table `faculty_coordinator`
--
ALTER TABLE `faculty_coordinator`
  ADD PRIMARY KEY (`email_id`,`dept_id`,`start_date`,`end_date`),
  ADD KEY `faculty_coordinator_department` (`dept_id`);

--
-- Indexes for table `faculty_course_alloted`
--
ALTER TABLE `faculty_course_alloted`
  ADD PRIMARY KEY (`email_id`,`cid`,`course_type_id`,`sem`,`year`) USING BTREE,
  ADD KEY `faculty_audit_audit_course` (`cid`,`sem`,`year`),
  ADD KEY `facuty_audit_course` (`course_type_id`,`cid`,`sem`,`year`);

--
-- Indexes for table `faculty_course_alloted_log`
--
ALTER TABLE `faculty_course_alloted_log`
  ADD PRIMARY KEY (`email_id`,`cid`,`course_type_id`,`sem`,`year`) USING BTREE,
  ADD KEY `faculty_audit_audit_course` (`cid`,`sem`,`year`),
  ADD KEY `facuty_audit_course` (`course_type_id`,`cid`,`sem`,`year`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`form_id`);

--
-- Indexes for table `form_applicable_dept`
--
ALTER TABLE `form_applicable_dept`
  ADD PRIMARY KEY (`form_id`,`dept_id`),
  ADD KEY `form_applicable_dept_department` (`dept_id`);

--
-- Indexes for table `form_course_category_map`
--
ALTER TABLE `form_course_category_map`
  ADD PRIMARY KEY (`form_id`,`course_type_id`),
  ADD KEY `form_course_Type_map_course` (`course_type_id`);

--
-- Indexes for table `hide_student_course`
--
ALTER TABLE `hide_student_course`
  ADD PRIMARY KEY (`email_id`,`cid`,`sem`,`year`,`course_type_id`) USING BTREE,
  ADD KEY `hide_student_course_course` (`cid`,`sem`,`year`,`course_type_id`);

--
-- Indexes for table `hod`
--
ALTER TABLE `hod`
  ADD PRIMARY KEY (`hod_email_id`,`start_date`,`end_date`,`dept_id`,`faculty_email_id`) USING BTREE,
  ADD KEY `hod_department` (`dept_id`),
  ADD KEY `hod_faculty` (`faculty_email_id`);

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
  ADD KEY `student_form_Student` (`email_id`),
  ADD KEY `student_form_form` (`form_id`);

--
-- Indexes for table `student_form_log`
--
ALTER TABLE `student_form_log`
  ADD KEY `student_form_Student` (`email_id`),
  ADD KEY `student_form_form` (`form_id`);

--
-- Indexes for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD PRIMARY KEY (`email_id`,`sem`,`year`,`rollno`) USING BTREE;

--
-- Indexes for table `student_preferences`
--
ALTER TABLE `student_preferences`
  ADD PRIMARY KEY (`form_id`,`email_id`,`prefered_cid`,`prefered_course_type_id`),
  ADD KEY `pref_student` (`email_id`),
  ADD KEY `pref_course` (`prefered_course_type_id`,`prefered_cid`);

--
-- Indexes for table `student_preferences_log`
--
ALTER TABLE `student_preferences_log`
  ADD PRIMARY KEY (`form_id`,`email_id`,`prefered_cid`,`prefered_course_type_id`),
  ADD KEY `pref_student` (`email_id`),
  ADD KEY `pref_course` (`prefered_course_type_id`,`prefered_cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_types`
--
ALTER TABLE `course_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_type_id_fk` FOREIGN KEY (`course_type_id`) REFERENCES `course_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_applicable_dept`
--
ALTER TABLE `course_applicable_dept`
  ADD CONSTRAINT `audit_course_audit_course_applicable` FOREIGN KEY (`cid`,`sem`,`year`) REFERENCES `course` (`cid`, `sem`, `year`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_type_id_dept_applicable_fk` FOREIGN KEY (`course_type_id`) REFERENCES `course_types` (`id`),
  ADD CONSTRAINT `dept_audit_course_applicable` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_floating_dept`
--
ALTER TABLE `course_floating_dept`
  ADD CONSTRAINT `audit_course_floating_dept_audit_course` FOREIGN KEY (`cid`,`sem`,`year`) REFERENCES `course` (`cid`, `sem`, `year`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `audit_course_floating_dept_course_type` FOREIGN KEY (`course_type_id`) REFERENCES `course_types` (`id`),
  ADD CONSTRAINT `audit_course_floating_dept_department` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_log`
--
ALTER TABLE `course_log`
  ADD CONSTRAINT `course_type_id_log_fk` FOREIGN KEY (`course_type_id`) REFERENCES `course_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `course_similar_map`
--
ALTER TABLE `course_similar_map`
  ADD CONSTRAINT `map_new_course_type_id_fk` FOREIGN KEY (`new_course_type_id`) REFERENCES `course_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `map_old_course_type_id_fk` FOREIGN KEY (`old_course_type_id`) REFERENCES `course_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `faculty_certification`
--
ALTER TABLE `faculty_certification`
  ADD CONSTRAINT `faculty_certification_faculty` FOREIGN KEY (`email_id`) REFERENCES `faculty` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty_coordinator`
--
ALTER TABLE `faculty_coordinator`
  ADD CONSTRAINT `faculty_coordinator_department` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faculty_coordinator_faculty` FOREIGN KEY (`email_id`) REFERENCES `faculty` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty_course_alloted`
--
ALTER TABLE `faculty_course_alloted`
  ADD CONSTRAINT `facuty_audit_course` FOREIGN KEY (`course_type_id`,`cid`,`sem`,`year`) REFERENCES `course` (`course_type_id`, `cid`, `sem`, `year`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facuty_audit_faculty` FOREIGN KEY (`email_id`) REFERENCES `faculty` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form_applicable_dept`
--
ALTER TABLE `form_applicable_dept`
  ADD CONSTRAINT `form_applicable_dept_department` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form_applicable_dept_form_id` FOREIGN KEY (`form_id`) REFERENCES `form` (`form_id`);

--
-- Constraints for table `form_course_category_map`
--
ALTER TABLE `form_course_category_map`
  ADD CONSTRAINT `form_course_Type_map_course` FOREIGN KEY (`course_type_id`) REFERENCES `course_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form_course_Type_map_form_id` FOREIGN KEY (`form_id`) REFERENCES `form` (`form_id`) ON UPDATE CASCADE;

--
-- Constraints for table `hide_student_course`
--
ALTER TABLE `hide_student_course`
  ADD CONSTRAINT `hide_student_course_course` FOREIGN KEY (`cid`,`sem`,`year`,`course_type_id`) REFERENCES `course` (`cid`, `sem`, `year`, `course_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hide_student_course_student` FOREIGN KEY (`email_id`) REFERENCES `student` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hod`
--
ALTER TABLE `hod`
  ADD CONSTRAINT `hod_department` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hod_faculty` FOREIGN KEY (`faculty_email_id`) REFERENCES `faculty` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_department` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_audit`
--
ALTER TABLE `student_audit`
  ADD CONSTRAINT `student_audit_audit_course` FOREIGN KEY (`cid`,`sem`,`year`) REFERENCES `course` (`cid`, `sem`, `year`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_audit_student` FOREIGN KEY (`email_id`) REFERENCES `student` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_audit_log`
--
ALTER TABLE `student_audit_log`
  ADD CONSTRAINT `student_audit_log_ibfk_1` FOREIGN KEY (`cid`,`sem`,`year`) REFERENCES `course_log` (`cid`, `sem`, `year`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_form`
--
ALTER TABLE `student_form`
  ADD CONSTRAINT `student_form_Student` FOREIGN KEY (`email_id`) REFERENCES `student` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_form_form` FOREIGN KEY (`form_id`) REFERENCES `form` (`form_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD CONSTRAINT `student_marks_student` FOREIGN KEY (`email_id`) REFERENCES `student` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_preferences`
--
ALTER TABLE `student_preferences`
  ADD CONSTRAINT `pref_course` FOREIGN KEY (`prefered_course_type_id`,`prefered_cid`) REFERENCES `course` (`course_type_id`, `cid`),
  ADD CONSTRAINT `pref_form_id` FOREIGN KEY (`form_id`) REFERENCES `form` (`form_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pref_student` FOREIGN KEY (`email_id`) REFERENCES `student` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
