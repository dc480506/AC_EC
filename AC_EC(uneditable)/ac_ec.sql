-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2020 at 11:14 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

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
  `currently_active` tinyint(4) NOT NULL DEFAULT 0,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `no_of_allocated` int(11) NOT NULL DEFAULT 0,
  `email_id` varchar(50) NOT NULL,
  `timestamp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audit_course`
--

INSERT INTO `audit_course` (`cid`, `sem`, `year`, `cname`, `currently_active`, `min`, `max`, `no_of_allocated`, `email_id`, `timestamp`) VALUES
('2UST511', 5, '2020-21', 'Mobile Application Development  - iOS platform', 0, 10, 20, 0, 'IC@somaiya.edu', '2020-05-31 19:18:54'),
('2UST512', 5, '2020-21', 'Mobile Application Development - Flutter', 0, 10, 40, 0, 'IC@somaiya.edu', '2020-05-31 19:18:54'),
('2UST513', 5, '2020-21', 'VR and AR Engine Development', 0, 10, 20, 0, 'IC@somaiya.edu', '2020-05-31 19:18:54'),
('2UST514', 5, '2020-21', 'Python for Data Science', 0, 10, 40, 0, 'IC@somaiya.edu', '2020-05-31 19:18:54'),
('2UST521', 5, '2020-21', 'Microcontroller & Applications (Lab course)', 0, 10, 40, 0, 'IC@somaiya.edu', '2020-05-31 19:18:54'),
('2UST522', 5, '2020-21', '3D Printing Technology', 0, 10, 30, 0, 'IC@somaiya.edu', '2020-05-31 19:18:54'),
('2UST523', 5, '2020-21', 'FPGA Design', 0, 10, 40, 0, 'IC@somaiya.edu', '2020-05-31 19:18:54'),
('2UST524', 5, '2020-21', 'Linear algebra for Machine Learning ', 0, 10, 40, 0, 'IC@somaiya.edu', '2020-05-31 19:18:54'),
('2UST531', 5, '2020-21', 'Deep learning and Fuzzy Logic', 0, 10, 40, 0, 'IC@somaiya.edu', '2020-05-31 19:18:54'),
('2UST532', 5, '2020-21', 'R Programming for data analysis ', 0, 10, 40, 0, 'IC@somaiya.edu', '2020-05-31 19:18:54'),
('2UST533', 5, '2020-21', 'Data Networking-I (CISCO ACADEMY)', 0, 10, 40, 0, 'IC@somaiya.edu', '2020-05-31 19:18:54'),
('2UST534', 5, '2020-21', 'Consumer Electronics ', 0, 10, 80, 0, 'IC@somaiya.edu', '2020-05-31 19:18:54'),
('2UST541', 5, '2020-21', 'Development with Go', 0, 10, 20, 0, 'IC@somaiya.edu', '2020-05-31 19:18:54'),
('2UST542', 5, '2020-21', 'Development with Ruby rails', 0, 10, 20, 0, 'IC@somaiya.edu', '2020-05-31 19:18:54'),
('2UST543', 5, '2020-21', 'Cyber Security', 0, 10, 80, 0, 'IC@somaiya.edu', '2020-05-31 19:18:54'),
('2UST544', 5, '2020-21', 'Software Test Automation with Selenium', 0, 10, 20, 0, 'IC@somaiya.edu', '2020-05-31 19:18:54'),
('2UST551', 5, '2020-21', 'Sensors and Actuators', 0, 10, 40, 0, 'IC@somaiya.edu', '2020-05-31 19:18:54'),
('2UST552', 5, '2020-21', 'Introduction to Automobile Systems', 0, 10, 40, 0, 'IC@somaiya.edu', '2020-05-31 19:18:54'),
('2UST553', 5, '2020-21', 'Electric Vehicle ', 0, 10, 40, 0, 'IC@somaiya.edu', '2020-05-31 19:18:54'),
('2UST561', 5, '2020-21', 'Numerical Methods for Engineers', 0, 10, 40, 0, 'IC@somaiya.edu', '2020-05-31 19:18:54'),
('2UST562', 5, '2020-21', 'Material Chemistry for Engineers', 0, 10, 40, 0, 'IC@somaiya.edu', '2020-05-31 19:18:54'),
('2UST563', 5, '2020-21', 'Solar Photovoltaics – Principles and Applications', 0, 10, 40, 0, 'IC@somaiya.edu', '2020-05-31 19:18:54'),
('UCEC4544', 4, '2019-20', 'Basic Of Python', 1, 20, 40, 0, 'IC@somaiya.edu', '2020-05-09 20:05:50'),
('UCEC6739', 4, '2019-20', 'Python for Data Science', 1, 40, 80, 0, 'IC@somaiya.edu', '2020-05-04 18:35:52'),
('UCEC7636', 4, '2019-20', 'DBMS', 1, 15, 20, 0, 'IC@somaiya.edu', '2020-03-31 01:07:27'),
('UCEC7637', 4, '2019-20', 'BCT', 1, 30, 40, 0, 'IC@somaiya.edu', '2020-03-31 01:08:42'),
('UCEC76385', 5, '2019-20', 'Business Analysis', 1, 20, 30, 0, 'IC@somaiya.edu', '2020-03-31 01:09:36'),
('UCEC78452', 4, '2019-20', 'DC', 1, 30, 50, 0, 'IC@somaiya.edu', '2020-05-09 19:19:50'),
('UCEC871', 4, '2019-20', 'XYZ', 1, 60, 30, 0, 'IC@somaiya.edu', '2020-05-09 20:05:50'),
('UCEC8950', 4, '2019-20', 'Python for Data Science', 1, 30, 40, 0, 'IC@somaiya.edu', '2020-03-24 01:01:25'),
('UCEC9874', 4, '2019-20', 'Machine Learning ', 1, 4, 3, 0, 'IC@somaiya.edu', '2020-03-24 03:23:41');

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
('2UST511', 5, '2020-21', 1),
('2UST511', 5, '2020-21', 2),
('2UST511', 5, '2020-21', 3),
('2UST511', 5, '2020-21', 4),
('2UST511', 5, '2020-21', 5),
('2UST512', 5, '2020-21', 1),
('2UST512', 5, '2020-21', 2),
('2UST512', 5, '2020-21', 3),
('2UST512', 5, '2020-21', 4),
('2UST512', 5, '2020-21', 5),
('2UST513', 5, '2020-21', 1),
('2UST513', 5, '2020-21', 2),
('2UST513', 5, '2020-21', 3),
('2UST513', 5, '2020-21', 4),
('2UST513', 5, '2020-21', 5),
('2UST514', 5, '2020-21', 2),
('2UST514', 5, '2020-21', 3),
('2UST514', 5, '2020-21', 5),
('2UST521', 5, '2020-21', 1),
('2UST521', 5, '2020-21', 2),
('2UST521', 5, '2020-21', 4),
('2UST521', 5, '2020-21', 5),
('2UST522', 5, '2020-21', 1),
('2UST522', 5, '2020-21', 2),
('2UST522', 5, '2020-21', 3),
('2UST522', 5, '2020-21', 4),
('2UST523', 5, '2020-21', 1),
('2UST523', 5, '2020-21', 2),
('2UST523', 5, '2020-21', 4),
('2UST524', 5, '2020-21', 1),
('2UST524', 5, '2020-21', 2),
('2UST524', 5, '2020-21', 3),
('2UST524', 5, '2020-21', 4),
('2UST524', 5, '2020-21', 5),
('2UST531', 5, '2020-21', 1),
('2UST531', 5, '2020-21', 2),
('2UST531', 5, '2020-21', 3),
('2UST531', 5, '2020-21', 4),
('2UST531', 5, '2020-21', 5),
('2UST532', 5, '2020-21', 1),
('2UST532', 5, '2020-21', 2),
('2UST532', 5, '2020-21', 3),
('2UST532', 5, '2020-21', 4),
('2UST532', 5, '2020-21', 5),
('2UST533', 5, '2020-21', 1),
('2UST533', 5, '2020-21', 2),
('2UST533', 5, '2020-21', 3),
('2UST533', 5, '2020-21', 4),
('2UST533', 5, '2020-21', 5),
('2UST534', 5, '2020-21', 1),
('2UST534', 5, '2020-21', 2),
('2UST534', 5, '2020-21', 3),
('2UST534', 5, '2020-21', 4),
('2UST534', 5, '2020-21', 5),
('2UST541', 5, '2020-21', 1),
('2UST541', 5, '2020-21', 2),
('2UST541', 5, '2020-21', 3),
('2UST541', 5, '2020-21', 4),
('2UST541', 5, '2020-21', 5),
('2UST542', 5, '2020-21', 1),
('2UST542', 5, '2020-21', 2),
('2UST542', 5, '2020-21', 3),
('2UST542', 5, '2020-21', 4),
('2UST542', 5, '2020-21', 5),
('2UST543', 5, '2020-21', 1),
('2UST543', 5, '2020-21', 2),
('2UST543', 5, '2020-21', 3),
('2UST543', 5, '2020-21', 4),
('2UST543', 5, '2020-21', 5),
('2UST544', 5, '2020-21', 1),
('2UST544', 5, '2020-21', 2),
('2UST544', 5, '2020-21', 3),
('2UST544', 5, '2020-21', 4),
('2UST544', 5, '2020-21', 5),
('2UST551', 5, '2020-21', 1),
('2UST551', 5, '2020-21', 2),
('2UST551', 5, '2020-21', 3),
('2UST551', 5, '2020-21', 4),
('2UST551', 5, '2020-21', 5),
('2UST552', 5, '2020-21', 1),
('2UST552', 5, '2020-21', 2),
('2UST552', 5, '2020-21', 3),
('2UST552', 5, '2020-21', 4),
('2UST553', 5, '2020-21', 1),
('2UST553', 5, '2020-21', 2),
('2UST553', 5, '2020-21', 3),
('2UST553', 5, '2020-21', 4),
('2UST553', 5, '2020-21', 5),
('2UST561', 5, '2020-21', 1),
('2UST561', 5, '2020-21', 2),
('2UST561', 5, '2020-21', 3),
('2UST561', 5, '2020-21', 4),
('2UST561', 5, '2020-21', 5),
('2UST562', 5, '2020-21', 1),
('2UST562', 5, '2020-21', 2),
('2UST562', 5, '2020-21', 3),
('2UST562', 5, '2020-21', 4),
('2UST562', 5, '2020-21', 5),
('2UST563', 5, '2020-21', 1),
('2UST563', 5, '2020-21', 2),
('2UST563', 5, '2020-21', 3),
('2UST563', 5, '2020-21', 4),
('2UST563', 5, '2020-21', 5),
('UCEC4544', 4, '2019-20', 1),
('UCEC4544', 4, '2019-20', 2),
('UCEC4544', 4, '2019-20', 4),
('UCEC4544', 4, '2019-20', 5),
('UCEC6739', 4, '2019-20', 1),
('UCEC6739', 4, '2019-20', 2),
('UCEC6739', 4, '2019-20', 3),
('UCEC6739', 4, '2019-20', 5),
('UCEC7636', 4, '2019-20', 1),
('UCEC7636', 4, '2019-20', 2),
('UCEC7636', 4, '2019-20', 3),
('UCEC7636', 4, '2019-20', 4),
('UCEC7636', 4, '2019-20', 5),
('UCEC7637', 4, '2019-20', 1),
('UCEC7637', 4, '2019-20', 2),
('UCEC7637', 4, '2019-20', 3),
('UCEC7637', 4, '2019-20', 4),
('UCEC7637', 4, '2019-20', 5),
('UCEC76385', 5, '2019-20', 1),
('UCEC76385', 5, '2019-20', 2),
('UCEC76385', 5, '2019-20', 3),
('UCEC76385', 5, '2019-20', 5),
('UCEC78452', 4, '2019-20', 1),
('UCEC78452', 4, '2019-20', 2),
('UCEC78452', 4, '2019-20', 3),
('UCEC78452', 4, '2019-20', 4),
('UCEC78452', 4, '2019-20', 5),
('UCEC871', 4, '2019-20', 1),
('UCEC871', 4, '2019-20', 2),
('UCEC871', 4, '2019-20', 3),
('UCEC871', 4, '2019-20', 4),
('UCEC871', 4, '2019-20', 5),
('UCEC8950', 4, '2019-20', 1),
('UCEC8950', 4, '2019-20', 2),
('UCEC8950', 4, '2019-20', 3),
('UCEC9874', 4, '2019-20', 1),
('UCEC9874', 4, '2019-20', 2),
('UCEC9874', 4, '2019-20', 3),
('UCEC9874', 4, '2019-20', 4),
('UCEC9874', 4, '2019-20', 5);

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

--
-- Dumping data for table `audit_course_applicable_dept_log`
--

INSERT INTO `audit_course_applicable_dept_log` (`cid`, `sem`, `year`, `dept_id`) VALUES
('UCEC123', 3, '2018-19', 1),
('UCEC8785', 3, '2018-19', 1),
('UCEC123', 3, '2018-19', 2),
('UCEC8785', 3, '2018-19', 2),
('UCEC123', 3, '2018-19', 3),
('UCEC8785', 3, '2018-19', 3),
('UCEC123', 3, '2018-19', 4),
('UCEC8785', 3, '2018-19', 4),
('UCEC123', 3, '2018-19', 5),
('UCEC8785', 3, '2018-19', 5);

-- --------------------------------------------------------

--
-- Table structure for table `audit_course_floating_dept`
--

CREATE TABLE `audit_course_floating_dept` (
  `cid` varchar(30) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audit_course_floating_dept`
--

INSERT INTO `audit_course_floating_dept` (`cid`, `sem`, `year`, `dept_id`) VALUES
('2UST511', 5, '2020-21', 1),
('2UST512', 5, '2020-21', 1),
('2UST513', 5, '2020-21', 1),
('2UST514', 5, '2020-21', 1),
('2UST521', 5, '2020-21', 2),
('2UST522', 5, '2020-21', 2),
('2UST523', 5, '2020-21', 2),
('2UST524', 5, '2020-21', 2),
('2UST531', 5, '2020-21', 3),
('2UST532', 5, '2020-21', 3),
('2UST533', 5, '2020-21', 3),
('2UST534', 5, '2020-21', 3),
('2UST541', 5, '2020-21', 4),
('2UST542', 5, '2020-21', 4),
('2UST543', 5, '2020-21', 4),
('2UST544', 5, '2020-21', 4),
('2UST551', 5, '2020-21', 5),
('2UST552', 5, '2020-21', 5),
('2UST553', 5, '2020-21', 5),
('2UST561', 5, '2020-21', 6),
('2UST562', 5, '2020-21', 6),
('2UST563', 5, '2020-21', 6),
('UCEC4544', 4, '2019-20', 1),
('UCEC6739', 4, '2019-20', 1),
('UCEC7636', 4, '2019-20', 1),
('UCEC7637', 4, '2019-20', 2),
('UCEC76385', 5, '2019-20', 1),
('UCEC78452', 4, '2019-20', 1),
('UCEC871', 4, '2019-20', 6),
('UCEC8950', 4, '2019-20', 1),
('UCEC8950', 4, '2019-20', 4),
('UCEC9874', 4, '2019-20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `audit_course_floating_dept_log`
--

CREATE TABLE `audit_course_floating_dept_log` (
  `cid` varchar(30) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audit_course_floating_dept_log`
--

INSERT INTO `audit_course_floating_dept_log` (`cid`, `sem`, `year`, `dept_id`) VALUES
('UCEC123', 3, '2018-19', 1),
('UCEC8785', 3, '2018-19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `audit_course_log`
--

CREATE TABLE `audit_course_log` (
  `cid` varchar(15) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `no_of_allocated` int(11) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `timestamp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audit_course_log`
--

INSERT INTO `audit_course_log` (`cid`, `sem`, `year`, `cname`, `min`, `max`, `no_of_allocated`, `email_id`, `timestamp`) VALUES
('UCEC123', 3, '2018-19', 'Introduction to Python', 45, 60, 25, 'IC@somaiya.edu', '2018-05-12 11:10:00'),
('UCEC8785', 3, '2018-19', 'Python', 3, 2, 35, 'IC@somaiya.edu', '2018-05-12 11:10:00');

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
-- Table structure for table `audit_map_log`
--

CREATE TABLE `audit_map_log` (
  `newcid` varchar(15) CHARACTER SET utf8mb4 NOT NULL,
  `newsem` int(11) NOT NULL,
  `newyear` varchar(8) CHARACTER SET utf8mb4 NOT NULL,
  `oldcid` varchar(15) CHARACTER SET utf8mb4 NOT NULL,
  `oldsem` int(11) NOT NULL,
  `oldyear` varchar(8) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit_map_log`
--

INSERT INTO `audit_map_log` (`newcid`, `newsem`, `newyear`, `oldcid`, `oldsem`, `oldyear`) VALUES
('UCEC8785', 3, '2018-19', '2UST533', 3, '2020-21'),
('UCEC8785', 3, '2018-19', 'UCEC123', 3, '2018-19');

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
-- Table structure for table `current_sem_info`
--

CREATE TABLE `current_sem_info` (
  `sem_type` varchar(5) NOT NULL,
  `academic_year` varchar(10) NOT NULL,
  `started_on` varchar(30) NOT NULL,
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
  `timestamp_created` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delete_temp_tables`
--

INSERT INTO `delete_temp_tables` (`table_name`, `timestamp_created`) VALUES
('22252f_audit_course', '2020-06-05 15:4'),
('22252f_student_audit', '2020-06-05 15:4'),
('336b2f_audit_course', '2020-05-31 21:4'),
('336b2f_student_audit', '2020-05-31 21:4'),
('3ad56d_audit_course', '2020-05-31 21:5'),
('3ad56d_student_audit', '2020-05-31 21:5'),
('69bc1a_audit_course', '2020-06-01 15:2'),
('69bc1a_student_audit', '2020-06-01 15:2'),
('9a3ace_audit_course', '2020-06-01 15:2'),
('9a3ace_student_audit', '2020-06-01 15:2'),
('b7e550_audit_course', '2020-06-01 15:3'),
('b7e550_student_audit', '2020-06-01 15:3');

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
('a.chachra@somaiya.edu', 'ASC', '160977', 'Prof. Anjali', '', 'Chachra', 1, 'Asst. Professor', '', 'IC@somaiya.edu', '2020-05-31 22:51:02'),
('archana.gupta@somaiya.edu', 'AAG', '160893', 'Prof. Archana', '', 'Gupta', 1, 'Asst. Professor', '', 'IC@somaiya.edu', '2020-05-31 22:51:02'),
('babaso.aldar@somaiya.edu', 'BDA', '160997', 'Prof. Babaso', '', 'Aldar', 1, 'Asst. Professor', '', 'IC@somaiya.edu', '2020-05-31 22:51:02'),
('bhaktiraul@somaiya.edu', 'BNP', '160063', 'Prof. Bhakti', '', 'Palkar', 1, 'Asso. Professor', '', 'IC@somaiya.edu', '2020-05-31 22:51:02'),
('bharathihn@somaiya.edu', 'BHN', '160069', 'Prof. Bharathi', '', 'HN', 1, 'Asso. Professor', '', 'IC@somaiya.edu', '2020-05-31 22:51:02'),
('deepaksharma@somaiya.edu', 'DHS', '160120', 'Dr. Deepak', '', 'Sharma', 1, 'Professor', '', 'IC@somaiya.edu', '2020-05-31 22:51:02'),
('fac3@somaiya.edu', 'PR', '9', 'PQR', '', '', 2, 'Prof', '', 'IC@somaiya.edu', '2020-05-11 03:29:35'),
('faculty1@somaiya.edu', 'fac', '4', 'faculty', '', '', 1, 'Asst Prof', 'faculty', '', ''),
('faculty2@somaiya.edu', 'fac2', '6', 'faculty2', '', '', 1, 'Prof', '', '', ''),
('gopal.s@somaiya.edu', 'GSS', '160924', 'Prof. Gopal', '', 'Sonune', 1, 'Asst. Professor', '', 'IC@somaiya.edu', '2020-05-31 22:51:02'),
('jyothirao@somaiya.edu', 'JMR', '160730', 'Prof. Jyothi', '', 'Rao', 1, 'Asso. Professor', '', 'IC@somaiya.edu', '2020-05-31 22:51:02'),
('jyoti.joglekar@somaiya.edu', 'JVJ', '160993', 'Dr. Jyoti', '', 'Joglekar', 1, 'Asst. Professor', '', 'IC@somaiya.edu', '2020-05-31 22:51:02'),
('kavitakelkar@somaiya.edu', 'KMK', '160057', 'Prof. Kavita', '', 'Kelkar', 1, 'Asso. Professor', '', 'IC@somaiya.edu', '2020-05-31 22:51:02'),
('manishpotey@somaiya.edu', 'MMP', '160188', 'Dr. Manish', '', 'Potey', 1, 'Professor', '', 'IC@somaiya.edu', '2020-05-31 22:51:02'),
('neelammotwani@somaiya.edu', 'GJS', '160102', 'Prof. Grishma', '', 'Sharma', 1, 'Asst. Professor', '', 'IC@somaiya.edu', '2020-05-31 22:51:02'),
('nirmalashinde@somaiya.edu', 'NKS', '160864', 'Prof. Nirmala', '', 'Shinde', 1, 'Asst. Professor', '', 'IC@somaiya.edu', '2020-05-31 22:51:02'),
('p.bhangale@somaiya.edu', 'PYB', '160982', 'Prof. Pradnya', '', 'Bhangale', 1, 'Asst. Professor', '', 'IC@somaiya.edu', '2020-05-31 22:51:02'),
('poonambhogale@somaiya.edu', 'PMB', '160562', 'Prof. Poonam', '', 'Bhogle', 1, 'Asst. Professor', '', 'IC@somaiya.edu', '2020-05-31 22:51:02'),
('pradnyagothmare@somaiya.edu', 'PSG', '160722', 'Prof. Pradnya', '', 'Gotmare', 1, 'Asst. Professor', '', 'IC@somaiya.edu', '2020-05-31 22:51:02'),
('prasadinipadwal@somaiya.edu', 'MMK', '160101', 'Prof. Mansi', '', 'Kambli', 1, 'Asst. Professor', '', 'IC@somaiya.edu', '2020-05-31 22:51:02'),
('prasannashete@somaiya.edu', 'PJS', '160117', 'Dr. Prasanna', '', 'Shete', 1, 'Asso. Professor', '', 'IC@somaiya.edu', '2020-05-31 22:51:02'),
('rajaniaswani@somaiya.edu', 'RMP', '160064', 'Prof. Rajani', '', 'Pamnani', 1, 'Asst. Professor', '', 'IC@somaiya.edu', '2020-05-31 22:51:02'),
('rohininair@somaiya.edu', 'RAN', '160615', 'Prof. Rohini', '', 'Nair', 1, 'Asst. Professor', '', 'IC@somaiya.edu', '2020-05-31 22:51:02'),
('ruchika.rp@somaiya.edu', 'RRP', '161000', 'Prof. Ruchika', '', 'Patil', 1, 'Asst. Professor', '', 'IC@somaiya.edu', '2020-05-31 22:51:02'),
('sheetalpereira@somaiya.edu', 'SIP', '160604', 'Prof. Sheetal', '', 'Pereira', 1, 'Asst. Professor', '', 'IC@somaiya.edu', '2020-05-31 22:51:02'),
('shweta.chachra@somaiya.edu', 'SDC', '160885', 'Prof. Shweta', '', 'Chachra', 1, 'Asst. Professor', '', 'IC@somaiya.edu', '2020-05-31 22:51:02'),
('smitasankhe@somaiya.edu', 'SRS', '160639', 'Prof. Smita', '', 'Sankhe', 1, 'Asst. Professor', '', 'IC@somaiya.edu', '2020-05-31 22:51:02'),
('suchitapatil@somaiya.edu', 'PSP', '160535', 'Prof. Suchita', '', 'Patil', 1, 'Asst. Professor', '', 'IC@somaiya.edu', '2020-05-31 22:51:02'),
('swapnil.cp@somaiya.edu', 'SCP', '160989', 'Prof. Swapnil', '', 'Pawar', 1, 'Asst. Professor', '', 'IC@somaiya.edu', '2020-05-31 22:51:02'),
('swatimali@somaiya.edu', 'SNM', '160065', 'Prof. Swati', '', 'Mali', 1, 'Asst. Professor', '', 'IC@somaiya.edu', '2020-05-31 22:51:02'),
('udayjoshi@somaiya.edu', 'UBJ', '160056', 'Prof. Uday', '', 'Joshi', 1, 'Asso. Professor', '', 'IC@somaiya.edu', '2020-05-31 22:51:02'),
('vaibhav.vasani@somaiya.edu', 'VPV', '160999', 'Prof. Vaibhav', '', 'Vasani', 1, 'Asst. Professor', '', 'IC@somaiya.edu', '2020-05-31 22:51:02'),
('zaheedshaikh@somaiya.edu', 'ZSK', '160825', 'Prof. Zaheed', '', 'Shaikh', 1, 'Asst. Professor', '', 'IC@somaiya.edu', '2020-05-31 22:51:02');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_audit`
--

CREATE TABLE `faculty_audit` (
  `email_id` varchar(50) NOT NULL,
  `cid` varchar(30) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `currently_active` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_audit`
--

INSERT INTO `faculty_audit` (`email_id`, `cid`, `sem`, `year`, `currently_active`) VALUES
('a.chachra@somaiya.edu', '2UST563', 5, '2020-21', 0);

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
(3, '2020-21', 0, 'audit', 2, '2020-05-31 06:24', '2020-06-07 08:24', '2020-05-30 03:24:09', 'IC@somaiya.edu', 6, 0),
(4, '2019-20', 0, 'audit', 3, '2020-05-07 15:01', '2020-05-22 01:00', '2020-05-11 16:21:25', 'IC@somaiya.edu', 5, 0),
(5, '2019-20', 0, 'audit', 4, '2020-05-29 08:25', '2020-06-03 08:25', '2020-05-30 03:26:00', 'IC@somaiya.edu', 5, 0),
(5, '2019-20', 0, 'idc', 4, '2020-03-30 02:00', '2020-04-04 00:02', '2020-03-31 16:14:32', 'IC@somaiya.edu', 3, 0),
(5, '2020-21', 0, 'audit', 4, '2020-05-30 14:37', '2020-05-31 14:32', '2020-05-31 14:37:57', 'IC@somaiya.edu', 8, 0),
(6, '2019-20', 0, 'audit', 5, '2020-05-07 02:00', '2020-05-10 13:00', '2020-05-06 14:32:15', 'IC@somaiya.edu', 6, 0),
(7, '2019-20', 0, 'audit', 6, '2020-05-01 02:00', '2020-05-03 13:00', '2020-05-06 14:49:36', 'IC@somaiya.edu', 3, 0),
(7, '2019-20', 0, 'idc', 6, '2020-04-09 04:00', '2020-04-16 11:00', '2020-04-06 21:55:50', 'IC@somaiya.edu', 6, 0),
(8, '2019-20', 0, 'audit', 7, '2020-05-02 01:00', '2020-05-04 13:00', '2020-05-05 19:52:20', 'IC@somaiya.edu', 6, 1);

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
  `form_filled` int(11) NOT NULL DEFAULT 0,
  `adding_email_id` varchar(50) NOT NULL,
  `timestamp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`email_id`, `rollno`, `fname`, `mname`, `lname`, `year_of_admission`, `dept_id`, `current_sem`, `form_filled`, `adding_email_id`, `timestamp`) VALUES
('a.choubey@somaiya.edu', '1813130', 'AMAN', '', 'CHOUBEY', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('a.dautkhane@somaiya.edu', '1813012', 'AADITYA', '', 'DAUTKHANE', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('a.mahadevan@somaiya.edu', '1811022', 'AADITYA', '', 'MAHADEVAN', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('a.maru@somaiya.edu', '1813102', 'AAYUSH', '', 'MARU', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('a.pareri@somaiya.edu', '1814111', 'AKASH', '', 'PARERI', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('a.shridharani@somaiya.edu', '1812115', 'AKANKSHA', '', 'SHRIDHARANI', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('a.venkatadri@somaiya.edu', '1812004', 'ABHISHEK', '', 'VENKATADRI', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('aaditya.r@somaiya.edu', '1812094', 'AADITYA', '', 'RAJGOR', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('aafiya.h@somaiya.edu', '1811014', 'AAFIYA', '', 'HUSSAIN', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('aagam.mehta@somaiya.edu', '1812104', 'AAGAM', '', 'MEHTA', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('aaron.cherian@somaiya.edu', '1813069', 'AARON', '', 'CHERIAN', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('aayuse.p@somaiya.edu', '1812093', 'AAYUSE', '', 'PANCHAL', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('abhijeet.dwivedi@somaiya.edu', '1813013', 'ABHIJEET', '', 'DWIVEDI', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('abhinav.jha@somaiya.edu', '1812029', 'ABHINAV', '', 'JHA', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('abhinav.z@somaiya.edu', '1815137', 'ABHINAV', '', 'ZANVAR', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('abhiram.a@somaiya.edu', '1813001', 'ABHIRAM', '', 'A', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('abhishek.ambekar@somaiya.edu', '1815001', 'ABHISHEK', '', 'AMBEKAR', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('abhishek.padiya@somaiya.edu', '1812092', 'ABHISHEK', '', 'PADIYA', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('abhishek.potdar@somaiya.edu', '1814048', 'ABHISHEK', '', 'POTDAR', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('adarsh.rj@somaiya.edu', '1814084', 'ADARSH', '', 'JAISWAL', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('aditi.joisher@somaiya.edu', '1813086', 'ADITI', '', 'JOISHER', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('aditi.kulkarni@somaiya.edu', '1813024', 'ADITI', '', 'KULKARNI', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('aditya.datar@somaiya.edu', '1814003', 'ADITYA', '', 'DATAR', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('aditya.goud@somaiya.edu', '1812023', 'ADITYA', '', 'GOUD', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('aditya.mahesh@somaiya.edu', '1813064', 'ADITYA', '', 'MAHESH', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('aditya.shenoy@somaiya.edu', '1813057', 'ADITYA', '', 'SHENOY', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('aditya.si@somaiya.edu', '1815083', 'ADITYA', '', 'IYER', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('aditya.vaishya@somaiya.edu', '1814117', 'ADITYA', '', 'VAISHYA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('aditya06@somaiya.edu', '1815124', 'ADITYA', '', 'SHINDE', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('ahmed.layees@somaiya.edu', '1815033', 'AHMED', '', 'LAYEES', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('aiswarya.k@somaiya.edu', '1814122', 'AISWARYA', '', 'KUMAR', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('ajay.bhan@somaiya.edu', '1811128', 'AJAY', '', 'BHAN', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('ajinkya.kirkire@somaiya.edu', '1813094', 'AJINKYA', '', 'KIRKIRE', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('akash.biradar@somaiya.edu', '1712068', 'AKASH', '', 'BIRADAR', '2017', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('akhil.namboodiri@somaiya.edu', '1814042', 'AKHIL', '', 'NAMBOODIRI', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('akshar.barchha@somaiya.edu', '1811067', 'AKSHAR', '', 'BARCHHA', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('aksharan.g@somaiya.edu', '1812003', 'AKSHARAN', '', 'GANESHAN', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('akshat.ag@somaiya.edu', '1811012', 'AKSHAT', '', 'GANDHI', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('akshat.shah2@somaiya.edu', '1812059', 'AKSHAT', '', 'SHAH', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('akshata.barne@somaiya.edu', '1812066', 'AKSHATA', '', 'BARNE', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('akshit.gs@somaiya.edu', '1811042', 'AKSHIT', '', 'SHAH', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('akshit.sanchala@somaiya.edu', '1814067', 'AKSHIT', '', 'SANCHALA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('akshit.sj@somaiya.edu', '1812034', 'AKSHIT', '', 'JAIN', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('akshit.tayade@somaiya.edu', '1813106', 'AKSHIT', '', 'TAYADE', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('alfiza.s@somaiya.edu', '1811118', 'ALFIZA', '', 'SHAIKH', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('aliasgar.zm@somaiya.edu', '1815037', 'ALIASGAR', '', 'MERCHANT', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('aman.desai@somaiya.edu', '1811073', 'AMAN', '', 'DESAI', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('aman.jg@somaiya.edu', '1815082', 'AMAN', '', 'GUPTA', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('aman.khakharia@somaiya.edu', '1812033', 'AMAN', '', 'KHAKHARIA', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('aman.panchal@somaiya.edu', '1815104', 'AMAN', '', 'PANCHAL', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('amanshu.t@somaiya.edu', '1922023', 'AMANSHU', '', 'TIWARI', '2019', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('amogh.sinkar@somaiya.edu', '1811056', 'AMOGH', '', 'SINKAR', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('anchal.j@somaiya.edu', '1811015', 'ANCHAL', '', 'JAIN', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('aniket.ay@somaiya.edu', '1815067', 'ANIKET', '', 'YADAV', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('aniket.bhosale@somaiya.edu', '1811069', 'ANIKET', '', 'BHOSALE', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('aniket.choudhar@somaiya.edu', '1812074', 'ANIKET', '', 'CHOUDHAR', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('aniket.ubhare@somaiya.edu', '1812063', 'ANIKET', '', 'UBHARE', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('aniket05@somaiya.edu', '1811083', 'ANIKET', '', 'JOSHI', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('anina.pillai@somaiya.edu', '1811034', 'ANINA', '', 'PILLAI', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('anirudh.rn@somaiya.edu', '1815101', 'ANIRUDH', '', 'NAIR', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('anjali.gohil@somaiya.edu', '1811080', 'ANJALI', '', 'GOHIL', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('ankit.thakker@somaiya.edu', '1811123', 'ANKIT', '', 'THAKKER', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('annas.khan@somaiya.edu', '1812080', 'ANNAS', '', 'KHAN', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('anoushka.p@somaiya.edu', '1813107', 'ANOUSHKA', '', 'PADHI', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('anoushka.s@somaiya.edu', '1813121', 'ANOUSHKA', '', 'SHETTY', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('ansh.dugar@somaiya.edu', '1814064', 'ANSH', '', 'DUGAR', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('ansh.jain@somaiya.edu', '1811016', 'ANSH', '', 'JAIN', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('ansh.mehta@somaiya.edu', '1814090', 'ANSH', '', 'MEHTA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('anuj.sarda@somaiya.edu', '1814052', 'ANUJ', '', 'SARDA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('anushka.darade@somaiya.edu', '1814012', 'ANUSHKA', '', 'DARADE', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('anushka.sinha@somaiya.edu', '1813060', 'ANUSHKA', '', 'SINHA', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('anuvrat.m@somaiya.edu', '1812042', 'ANUVRAT', '', 'MARATHE', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('apoorv.gupta@somaiya.edu', '1814081', 'APOORV', '', 'GUPTA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('apoorva.belokar@somaiya.edu', '1815003', 'APOORVA', '', 'BELOKAR', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('arjun.sehgal@somaiya.edu', '1811041', 'ARJUN', '', 'SEHGAL', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('arkaprava.p@somaiya.edu', '1813109', 'ARKA', '', 'PAL', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('arnav.gadre@somaiya.edu', '1812079', 'ARNAV', '', 'GADRE', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('aryak.naik@somaiya.edu', '1812068', 'ARYAK', '', 'NAIK', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('asgarali.q@somaiya.edu', '1921004', 'ASGARALI', '', 'QURESHI', '2019', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('ashesh.z@somaiya.edu', '1815136', 'ASHESH', '', 'ZINJARDE', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('ashish.khare@somaiya.edu', '1813023', 'ASHISH', '', 'KHARE', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('ashutosh.rane@somaiya.edu', '1813112', 'ASHUTOSH', '', 'RANE', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('ashwini.pp@somaiya.edu', '1923009', 'ASHWINI', '', 'PATEL', '2019', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('ask1@somaiya.edu', '1813025', 'ANIKET', '', 'KULKARNI', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('asra.masrat@somaiya.edu', '1924004', 'ASRA', '', 'MASRAT', '2019', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('atharva.dave@somaiya.edu', '1814072', 'ATHARVA', '', 'DAVE', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('atharva.humar@somaiya.edu', '1815021', 'ATHARVA', '', 'HUMAR', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('atharva.kitkaru@somaiya.edu', '1814033', 'ATHARVA', '', 'KITKARU', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('atharva.mp@somaiya.edu', '1815050', 'ATHARVA', '', 'PRADHAN', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('atharva.parkar@somaiya.edu', '1812100', 'ATHARVA', '', 'PARKAR', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('atharva.sangle@somaiya.edu', '1813114', 'ATHARVA', '', 'SANGLE', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('atharva.sm@somaiya.edu', '1925008', 'ATHARVA', '', 'MEHTA', '2019', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('atharva.vibhute@somaiya.edu', '1813019', 'ATHARVA', '', 'VIBHUTE', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('avanish.batkulia@somaiya.edu', '1815068', 'AVANISH', '', 'BATKULIA', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('avinash.ks@somaiya.edu', '1814113', 'AVINASH', '', 'SHARMA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('avinash.nair@somaiya.edu', '1815022', 'AVINASH', '', 'NAIR', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('ayush.choudhary@somaiya.edu', '1815007', 'AYUSH', '', 'CHOUDHARY', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('ayush.khade@somaiya.edu', '1811087', 'AYUSH', '', 'KHADE', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('ayush.parmar@somaiya.edu', '1813036', 'AYUSH', '', 'PARMAR', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('ayush.ranjan@somaiya.edu', '1815051', 'Ayush', '', 'Ranjan', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('b.jhaveri@somaiya.edu', '1925001', 'BHAVYA', '', 'JHAVERI', '2019', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('b.poonawala@somaiya.edu', '1812072', 'BURHANUDDIN', '', 'POONAWALA', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('babita.r@somaiya.edu', '1813090', 'BABITA', '', 'RATUDI', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('bharat.choithani@somaiya.edu', '1814011', 'BHARAT', '', 'CHOITHANI', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('bhargavi.koli@somaiya.edu', '1922007', 'BHARGAVI', '', 'KOLI', '2019', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('bharvi.a@somaiya.edu', '1812064', 'BHARVI', '', 'ACHARYA', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('bhavik.bhatt@somaiya.edu', '1814007', 'BHAVIK', '', 'BHATT', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('bhavik.dhimar@somaiya.edu', '1813072', 'BHAVIK', '', 'DHIMAR', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('bhavin.jp@somaiya.edu', '1925010', 'BHAVIN', '', 'PRAJAPATI', '2019', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('bhavya.doshi1@somaiya.edu', '1815075', 'BHAVYA', '', 'DOSHI', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('bhavya.goradia@somaiya.edu', '1815081', 'BHAVYA', '', 'GORADIA', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('bhavya.mv@somaiya.edu', '1813125', 'BHAVYA', '', 'VIRA', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('bhavya.sangoi@somaiya.edu', '1925009', 'BHAVYA', '', 'SANGOI', '2019', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('bhikshiv.j@somaiya.edu', '1813021', 'BHIKSHIV', '', 'JAIN', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('bhushan.pawaskar@somaiya.edu', '1815047', 'BHUSHAN', '', 'PAWASKAR', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('bhuvnesh.s@somaiya.edu', '1811057', 'BHUVNESH', '', 'SOLANKI', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('bishandeep.a@somaiya.edu', '1811100', 'BISHANDEEP', '', 'ARORA', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('bushra.a@somaiya.edu', '1813003', 'BUSHRA', '', 'A', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('c.phadtare@somaiya.edu', '1812047', 'CHAITANYA', '', 'PHADTARE', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('chaitanya.bane@somaiya.edu', '1815138', 'CHAITANYA', '', 'BANE', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('charmee.m@somaiya.edu', '1924003', 'CHARMEE', '', 'MEHTA', '2019', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('chaturvedi.a@somaiya.edu', '1811009', 'ANIMESH', '', 'CHATURVEDI', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('chetan.dinesh@somaiya.edu', '1925012', 'CHETAN', '', 'DINESH', '2019', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('chintan.jagad@somaiya.edu', '1924001', 'CHINTAN', '', 'JAGAD', '2019', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('chintan.modi@somaiya.edu', '1811025', 'CHINTAN', '', 'MODI', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('chirag.jain1@somaiya.edu', '1813082', 'CHIRAG', '', 'JAIN', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('chirag.jhawar@somaiya.edu', '1814085', 'CHIRAG', '', 'JHAWAR', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('chiranjivi.c@somaiya.edu', '1815005', 'CHIRANJIVI', '', 'CHAUHAN', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('daidipya.s@somaiya.edu', '1813056', 'DAIDIPYA', '', 'SHARMA', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('danil.george@somaiya.edu', '1812014', 'DANIEL', '', 'GEORGE', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('darsh.parmar@somaiya.edu', '1812111', 'DARSH', '', 'PARMAR', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('darshan.as@somaiya.edu', '1813049', 'DARSHAN', '', 'SHAH', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('darshan.kalwani@somaiya.edu', '1814029', 'DARSHAN', '', 'KALWANI', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('darshan.sapariya@somaiya.edu', '1813115', 'DARSHAN', '', 'SAPARIYA', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('darshan.ss@somaiya.edu', '1814109', 'DARSHAN', '', 'SATRA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('darshit.thakkar@somaiya.edu', '1813122', 'DARSHIT', '', 'THAKKAR', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('debdatta.k@somaiya.edu', '1811092', 'DEBDATTA', '', 'KUNDU', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('deep.rs@somaiya.edu', '1815116', 'DEEP', '', 'SHAH', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('deep.shah5@somaiya.edu', '1814110', 'DEEP', '', 'SHAH', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('deep08@somaiya.edu', '1815011', 'DEEP', '', 'PATEL', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('deepa.kumari@somaiya.edu', '1814019', 'DEEPA', '', 'KUMARI', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('deepanshu.v@somaiya.edu', '1921005', 'DEEPANSHU', '', 'VANGANI', '2019', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('dev.de@somaiya.edu', '1814013', 'DEV', '', 'DE', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('dev.ss@somaiya.edu', '1814016', 'DEV', '', 'SHAH', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('dev.vora@somaiya.edu', '1814120', 'DEV', '', 'VORA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('devansh.cs@somaiya.edu', '1815117', 'DEVANSH', '', 'SHAH', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('devansh.ds@somaiya.edu', '1811111', 'DEVANSH', '', 'SHAH', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('devansh.sanghavi@somaiya.edu', '1811062', 'DEVANSH', '', 'SANGHAVI', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('dhairya.kataria@somaiya.edu', '1813091', 'DHAIRYA', '', 'KATARIA', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('dhairya.oza@somaiya.edu', '1814043', 'DHAIRYA', '', 'OZA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('dhairya.u@somaiya.edu', '1814063', 'DHAIRYA', '', 'UMRANIA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('dhairya12@somaiya.edu', '1814053', 'DHAIRYA', '', 'SHAH', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('dharm.shah@somaiya.edu', '1815052', 'DHARM', '', 'SHAH', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('dharmesh.chawda@somaiya.edu', '1814069', 'DHARMESH', '', 'CHAWDA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('dharmil17@somaiya.edu', '1922011', 'DHARMIL', '', 'SHAH', '2019', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('dheeraj.jain@somaiya.edu', '1815084', 'DHEERAJ', '', 'JAIN', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('dhiraj.jeswani@somaiya.edu', '1815087', 'DHIRAJ', '', 'JESWANI', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('dhruman.g@somaiya.edu', '1815019', 'DHRUMAN', '', 'GOHIL', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('dhruv.bid@somaiya.edu', '1813005', 'DHRUV', '', 'BID', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('dhruv.cb@somaiya.edu', '1812067', 'DHRUV', '', 'BHANUSHALI', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('dhruv.doshi@somaiya.edu', '1814002', 'DHRUV', '', 'DOSHI', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('dhruv.ganatra@somaiya.edu', '1812062', 'DHRUV', '', 'GANATRA', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('dhruv.lj@somaiya.edu', '1815024', 'DHRUV', '', 'JAIN', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('dhruv.rg@somaiya.edu', '1922013', 'DHRUV', '', 'GANDHI', '2019', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('dhruva.panchal@somaiya.edu', '1922015', 'DHRUVA', '', 'PANCHAL', '2019', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('dhundiraj.j@somaiya.edu', '1814027', 'DHUNDIRAJ', '', 'JOGALEKAR', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('dhvanit.b@somaiya.edu', '1813017', 'DHVANIT', '', 'BHIMANI', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('divya.raul@somaiya.edu', '1812051', 'DIVYA', '', 'RAUL', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('divya.rr@somaiya.edu', '1814102', 'DIVYA', '', 'RAO', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('divyansh.singh@somaiya.edu', '1813059', 'DIVYANSH', '', 'SINGH', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('dixshant.s@somaiya.edu', '1712119', 'DIXSHANT', '', 'SOLANKI', '2017', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('durva.raikar@somaiya.edu', '1812084', 'DURVA', '', 'RAIKAR', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('e.bhinderwala@somaiya.edu', '1812071', 'EBRAHIM', '', 'BHINDERWALA', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('esha.gupta@somaiya.edu', '1814025', 'ESHA', '', 'GUPTA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('esha.ponda@somaiya.edu', '1813062', 'ESHA', '', 'PONDA', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('esha.vats@somaiya.edu', '1814118', 'ESHA', '', 'VATS', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('eshaan.singh@somaiya.edu', '1815127', 'ESHAAN', '', 'SINGH', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('eshan.sharma@somaiya.edu', '1815120', 'ESHAN', '', 'SHARMA', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('fahim.h@somaiya.edu', '1815020', 'FAHIM', '', 'HASNANI', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('falguni.kumud@somaiya.edu', '1812086', 'FALGUNI', '', 'KUMUD', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('fenny.keniya@somaiya.edu', '1813051', 'FENNY', '', 'KENIYA', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('foram.makadia@somaiya.edu', '1813100', 'FORAM', '', 'MAKADIA', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('g.mahindrakar@somaiya.edu', '1812024', 'GAYATRI', '', 'MAHINDRAKAR', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('gada.d@somaiya.edu', '1814076', 'DHARMIL', '', 'GADA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('gandhar.j@somaiya.edu', '1813087', 'GANDHAR', '', 'JOSHI', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('gandhi.ps@somaiya.edu', '1815079', 'PRATIK', '', 'GANDHI', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('gaurang.patil@somaiya.edu', '1814046', 'GAURANG', '', 'PATIL', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('gaurang.thakker@somaiya.edu', '1921010', 'GAURANG', '', 'THAKKER', '2019', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('gaurav.dighe@somaiya.edu', '1922010', 'GAURAV', '', 'DIGHE', '2019', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('gaurav.khatwani@somaiya.edu', '1811090', 'GAURAV', '', 'KHATWANI', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('gopalkrishna.w@somaiya.edu', '1814062', 'GOPALKRISHNA', '', 'WAJA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('gunj.goda@somaiya.edu', '1813018', 'GUNJ', '', 'GODA', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('gurpreet.n@somaiya.edu', '1813097', 'GURPREET SINGH', '', 'NIGAM', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('h.talele@somaiya.edu', '1921002', 'HARSHAVARDHAN', '', 'TALELE', '2019', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('hansi.s@somaiya.edu', '1811108', 'HANSI', '', 'SANGHANI', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('hardik.asher@somaiya.edu', '1811002', 'HARDIK', '', 'ASHER', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('hardika.gawde@somaiya.edu', '1924005', 'HARDIKA', '', 'GAWDE', '2019', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('harsh.bm@somaiya.edu', '1814091', 'HARSH', '', 'MEHTA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('harsh.sachala@somaiya.edu', '1814105', 'HARSH', '', 'SACHALA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('harshal.pathak@somaiya.edu', '1813110', 'HARSHAL', '', 'PATHAK', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('harshid.b@somaiya.edu', '1812012', 'HARSHID', '', 'BHINDE', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('harshit.raval@somaiya.edu', '1815110', 'HARSHIT', '', 'RAVAL', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('hasti.ds@somaiya.edu', '1811043', 'HASTI', '', 'SHAH', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('heena.kasali@somaiya.edu', '1921003', 'HEENA', '', 'KASALI', '2019', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('heeral.gawade@somaiya.edu', '1923011', 'HEERAL', '', 'GAWADE', '2019', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('heet.dedhia@somaiya.edu', '1814014', 'HEET', '', 'DEDHIA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('heet.mv@somaiya.edu', '1924007', 'HEET', '', 'VORA', '2019', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('hemant.soni@somaiya.edu', '1815129', 'HEMANT', '', 'SONI', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('het.k@somaiya.edu', '1812036', 'HET', '', 'KOTHARI', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('hetvi.kothari@somaiya.edu', '1811091', 'HETVI', '', 'KOTHARI', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('hiket.vira@somaiya.edu', '1815065', 'HIKET', '', 'VIRA', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('himali.saini@somaiya.edu', '1811107', 'HIMALI', '', 'SAINI', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('himanshi.cb@somaiya.edu', '1814057', 'HIMANSHI', '', 'BHANUSHALI', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('hiral.lineswala@somaiya.edu', '1923001', 'HIRAL', '', 'LINESWALA', '2019', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('hiral.sheth@somaiya.edu', '1811054', 'HIRAL', '', 'SHETH', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('hiren23@somaiya.edu', '1815132', 'HIREN', '', 'PRAJAPATI', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('hitarth.doshi@somaiya.edu', '1922017', 'HITARTH', '', 'DOSHI', '2019', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('hriday.jani@somaiya.edu', '1812016', 'HRIDAY', '', 'JANI', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('hriday.mehta@somaiya.edu', '1813030', 'HRIDAY', '', 'MEHTA', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('hrithik.p@somaiya.edu', '1815044', 'HRITHIK', '', 'PATEL', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('hrithik.pandit@somaiya.edu', '1815106', 'HRITHIK', '', 'PANDIT', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('hrp1@somaiya.edu', '1812095', 'HARSH', '', 'PANCHAL', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('hrp2@somaiya.edu', '1813033', 'HARSH', '', 'PANCHAL', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('hsb3@somaiya.edu', '1812090', 'HIREN', '', 'BHANUSHALI', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('hss2@somaiya.edu', '1815053', 'HARSH', '', 'SHAH', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('idrees.b@somaiya.edu', '1811004', 'IDREES', '', 'BARNAGARWALA', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('isha.chinerkar@somaiya.edu', '1813079', 'ISHA', '', 'CHINDERKAR', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('isha.joglekar@somaiya.edu', '1924009', 'ISHA', '', 'JOGLEKAR', '2019', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('ishan.patil@somaiya.edu', '1812102', 'ISHAN', '', 'PATIL', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('ishan.shinde@somaiya.edu', '1815125', 'ISHAN', '', 'SHINDE', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('j.gohil@somaiya.edu', '1815142', 'JAY', '', 'GOHIL', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('j.parab@somaiya.edu', '1812097', 'JAYESH', '', 'PARAB', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jai.agarwal@somaiya.edu', '1812017', 'JAI', '', 'AGARWAL', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jai.mehta@somaiya.edu', '1814036', 'JAI', '', 'MEHTA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jaiman.shah@somaiya.edu', '1815054', 'JAIMAN', '', 'SHAH', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jaimeen.u@somaiya.edu', '1814077', 'JAIMEEN', '', 'UNAGAR', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jainam.gogree@somaiya.edu', '1812021', 'JAINAM', '', 'GOGREE', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jainam.tm@somaiya.edu', '1814008', 'JAINAM', '', 'MEHTA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jainam.z@somaiya.edu', '1814123', 'JAINAM', '', 'ZOBALIYA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jainam02@somaiya.edu', '1811085', 'JAINAM', '', 'SHAH', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jainum.s@somaiya.edu', '1814051', 'JAINUM', '', 'SANGHAVI', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jaival.singh@somaiya.edu', '1815128', 'JAIVAL', '', 'SINGH', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jas.p@somaiya.edu', '1813041', 'JAS', '', 'PRAJAPATI', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jash.jm@somaiya.edu', '1814126', 'JASH', '', 'MEHTA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jash.js@somaiya.edu', '1811082', 'JASH', '', 'SHAH', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jash12@somaiya.edu', '1814054', 'JASH', '', 'SHAH', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jash28@somaiya.edu', '1922016', 'JASH', '', 'SHAH', '2019', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jay.domadia@somaiya.edu', '1813014', 'JAY', '', 'DOMADIA', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jay.ingle@somaiya.edu', '1922004', 'JAY', '', 'INGLE', '2019', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jay.khatri@somaiya.edu', '1814087', 'JAY', '', 'KHATRI', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jay.pd@somaiya.edu', '1815076', 'JAY', '', 'DOSHI', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jay12@somaiya.edu', '1813117', 'JAY', '', 'SHAH', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jayant.yadav@somaiya.edu', '1815135', 'JAYANT', '', 'YADAV', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jaykumar.mp@somaiya.edu', '1814044', 'JAYKUMAR', '', 'PANCHAL', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jeel16@somaiya.edu', '1921012', 'JEEL', '', 'SHAH', '2019', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jenil.gosar@somaiya.edu', '1813078', 'JENIL', '', 'GOSAR', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jibitesh.s@somaiya.edu', '1812053', 'JIBITESH', '', 'SAHA', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jigar.pj@somaiya.edu', '1811018', 'JIGAR', '', 'JOSHI', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jigyassa.l@somaiya.edu', '1811020', 'JIGYASSA', '', 'LAMBA', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jil.ap@somaiya.edu', '1812046', 'JIL', '', 'PATEL', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jill25@somaiya.edu', '1814055', 'JILL', '', 'SHAH', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jinay.gada@somaiya.edu', '1811021', 'JINAY', '', 'GADA', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jjj@somaiya.edu', '1813022', 'JAY', '', 'JAIN', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jjs1@somaiya.edu', '1811112', 'JAY', '', 'SHAH', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('joel.thomas@somaiya.edu', '1815133', 'JOEL', '', 'THOMAS', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('joseph.k@somaiya.edu', '1815029', 'JOSEPH', '', 'KADANTOT', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jps1@somaiya.edu', '1815055', 'JAY', '', 'SHAH', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jubin.kamdar@somaiya.edu', '1924011', 'JUBIN', '', 'KAMDAR', '2019', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('jugal.dc@somaiya.edu', '1811071', 'JUGAL', '', 'CHAUHAN', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('junaidali.s@somaiya.edu', '1815064', 'JUNAIDALI', '', 'SURTI', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('k.deshpande@somaiya.edu', '1815014', 'KSHITIJ', '', 'DESHPANDE', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('k.jaishankar@somaiya.edu', '1811061', 'KARTHIK', '', 'JAISHANKAR', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('k.satyanarayana@somaiya.edu', '1812118', 'KARTHIK', '', 'TALAKOKKULA', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('k.ved@somaiya.edu', '1813105', 'KHUSHI', '', 'VED', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('kadam.ms@somaiya.edu', '1814001', 'MAYURESH', '', 'KADAM', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('kaitav.p@somaiya.edu', '1812099', 'KAITAV', '', 'PARIKH', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('kanksha.p@somaiya.edu', '1811104', 'KANKSHA', '', 'PANDEY', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('karan.gp@somaiya.edu', '1814096', 'KARAN', '', 'PAREKH', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('karan.nd@somaiya.edu', '1815074', 'KARAN', '', 'DEDHIA', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('karan19@somaiya.edu', '1812054', 'KARAN', '', 'SHAH', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('kartik.ladwa@somaiya.edu', '1923008', 'KARTIK', '', 'LADWA', '2019', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('kaushal.patil@somaiya.edu', '1813038', 'KAUSHAL', '', 'PATIL', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('kaushik.metha@somaiya.edu', '1811094', 'KAUSHIK', '', 'METHA', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('kaushik.naganath@somaiya.edu', '1812085', 'KAUSHIK', '', 'NAGANATH', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('kavish.bs@somaiya.edu', '1812055', 'KAVISH', '', 'SHAH', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('kedar.pednekar@somaiya.edu', '1925007', 'KEDAR', '', 'PEDNEKAR', '2019', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('keval.dk@somaiya.edu', '1814031', 'KEVAL', '', 'KARANI', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('keval.rajpara@somaiya.edu', '1812050', 'KEVAL', '', 'RAJPARA', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('kevin26@somaiya.edu', '1811044', 'KEVIN', '', 'SHAH', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('khatri.m@somaiya.edu', '1814032', 'MOHAMMEDMUDASSIR', '', 'KHATRI', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('khushi.cs@somaiya.edu', '1815098', 'KHUSHI', '', 'SHAH', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('khushil.shah@somaiya.edu', '1924008', 'KHUSHIL', '', 'SHAH', '2019', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('kiran.gaykar@somaiya.edu', '1924012', 'KIRAN', '', 'GAYKAR', '2019', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('kmb2@somaiya.edu', '1811005', 'KARAN', '', 'BHANUSHALI', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('krish.chheda@somaiya.edu', '1923007', 'KRISH', '', 'CHHEDA', '2019', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('krish.parekh@somaiya.edu', '1811031', 'KRISH', '', 'PAREKH', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('krisha.bm@somaiya.edu', '1814108', 'KRISHA', '', 'MEHTA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('krisha.panchamia@somaiya.edu', '1811102', 'KRISHA', '', 'PANCHAMIA', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('krishna.bhuva@somaiya.edu', '1925003', 'KRISHNA', '', 'BHUVA', '2019', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('krishna.sahani@somaiya.edu', '1814106', 'KRISHNA', '', 'SAHANI', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('krunal.dattani@somaiya.edu', '1814071', 'KRUNAL', '', 'DATTANI', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('krutik.c@somaiya.edu', '1815006', 'KRUTIK', '', 'CHAVDA', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('kshitij.prabhu@somaiya.edu', '1814101', 'KSHITIJ', '', 'PRABHU', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('kulkarni.sr@somaiya.edu', '1814129', 'SHREYA', '', 'KULKARNI', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('kunal.khandait@somaiya.edu', '1815092', 'KUNAL', '', 'KHANDAIT', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('kunal.sr@somaiya.edu', '1811036', 'KUNAL', '', 'RANE', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('kunj.gala@somaiya.edu', '1814021', 'KUNJ', '', 'GALA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('kushal.ds@somaiya.edu', '1815118', 'KUSHAL', '', 'SHAH', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('kushal.sg@somaiya.edu', '1812025', 'KUSHAL', '', 'GUPTA', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('labdhi.jain@somaiya.edu', '1814015', 'LABDHI', '', 'JAIN', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('lakshya.jain@somaiya.edu', '1812082', 'LAKSHYA', '', 'JAIN', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('leesa.dharod@somaiya.edu', '1814075', 'LEESA', '', 'DHAROD', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('m.baru@somaiya.edu', '1814005', 'MAHEK', '', 'BARU', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('m.merchant@somaiya.edu', '1812049', 'MUSTAFA', '', 'MERCHANT', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('m.nabeel@somaiya.edu', '1815039', 'NABEEL', '', 'M SHAFI', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('m.shegaonkar@somaiya.edu', '1813120', 'MADHURA', '', 'SHEGAONKAR', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('maaheynoor.s@somaiya.edu', '1811110', 'MAAHEY NOOR', '', 'SAYANI', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('madhura.i@somaiya.edu', '1812026', 'MADHURA', '', 'INAMDAR', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('makwana.d@somaiya.edu', '1815091', 'DARSHAN', '', 'MAKWANA', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('manan30@somaiya.edu', '1813050', 'MANAN', '', 'SHAH', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('manas.gandhi@somaiya.edu', '1811076', 'MANAS', '', 'GANDHI', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('manas.pange@somaiya.edu', '1922022', 'MANAS', '', 'PANGE', '2019', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('manas.thakker@somaiya.edu', '1814092', 'MANAS', '', 'THAKKER', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('manasi.nair@somaiya.edu', '1812087', 'MANASI', '', 'NAIR', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('manav.hirey@somaiya.edu', '1814082', 'MANAV', '', 'HIREY', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('manav.malavia@somaiya.edu', '1814088', 'MANAV', '', 'MALAVIA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('manav.punjabi@somaiya.edu', '1814049', 'MANAV', '', 'PUNJABI', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('manik.p@somaiya.edu', '1813032', 'MANIK', '', 'PAHALWAN', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('manish.parihar@somaiya.edu', '1814097', 'MANISH', '', 'PARIHAR', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('mann.daga@somaiya.edu', '1815008', 'MANN', '', 'DAGA', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('manthan.dave@somaiya.edu', '1813118', 'MANTHAN', '', 'DAVE', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('maru.jn@somaiya.edu', '1814089', 'JAY', '', 'MARU', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('mayank.chowdhary@somaiya.edu', '1811010', 'MAYANK', '', 'CHOWDHARY', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('mayank.latke@somaiya.edu', '1812040', 'MAYANK', '', 'LATKE', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('mayur.pawase@somaiya.edu', '1815046', 'MAYUR', '', 'PAWASE', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('meet.panchal1@somaiya.edu', '1921009', 'MEET', '', 'PANCHAL', '2019', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('meet10@somaiya.edu', '1812078', 'MEET', '', 'DOSHI', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('meghashyam.p@somaiya.edu', '1812045', 'MEGHASHYAM', '', 'PARAB', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('mehta.da@somaiya.edu', '1811023', 'DHAIRYA', '', 'MEHTA', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('mehta.yh@somaiya.edu', '1811024', 'YASH', '', 'MEHTA', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('mehul.bharda@somaiya.edu', '1812011', 'MEHUL', '', 'BHARDA', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('mehul.nd@somaiya.edu', '1815077', 'MEHUL', '', 'DOSHI', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('mihir.dholakia@somaiya.edu', '1811074', 'MIHIR', '', 'DHOLAKIA', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('mihir.jadhav@somaiya.edu', '1921001', 'MIHIR', '', 'JADHAV', '2019', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('mihir.mehta2@somaiya.edu', '1811093', 'MIHIR', '', 'MEHTA', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('mihir.w@somaiya.edu', '1815139', 'MIHIR', '', 'WADHWANA', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('milind.deshpande@somaiya.edu', '1811029', 'MILIND', '', 'DESHPANDE', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('misha.ashar@somaiya.edu', '1813002', 'MISHA', '', 'ASHAR', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('mistry.yr@somaiya.edu', '1812043', 'YASH', '', 'MISTRY', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('mitalee.s@somaiya.edu', '1812105', 'MITALEE', '', 'SAWANT', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('mitali.potnis@somaiya.edu', '1812048', 'MITALI', '', 'POTNIS', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('mitanshu.g@somaiya.edu', '1924010', 'MITANSHU', '', 'GADA', '2019', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('mitva.bhagat@somaiya.edu', '1812008', 'MITVA', '', 'BHAGAT', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('mohammedammar.m@somaiya.edu', '1924006', 'MOHAMMED AMMAR', '', 'MAKKI', '2019', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('mohini.pp@somaiya.edu', '1814124', 'MOHINI', '', 'PANCHAL', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('munib.m@somaiya.edu', '1815034', 'MUNIB', '', 'MAHADIK', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('murali.singh@somaiya.edu', '1813131', 'MURALI', '', 'SINGH', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('muskaan.n@somaiya.edu', '1814020', 'MUSKAAN', '', 'NANDU', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('n.namboodiri@somaiya.edu', '1811126', 'NIKHIL', '', 'NAMBOODIRI', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('n.pal@somaiya.edu', '1811101', 'NISHANT', '', 'PAL', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('nachiket.moghe@somaiya.edu', '1814039', 'NACHIKET', '', 'MOGHE', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('nadir.sayani@somaiya.edu', '1813047', 'NADIR', '', 'SAYANI', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('nakul.c@somaiya.edu', '1813068', 'NAKUL', '', 'CHAMARIYA', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('naman.as@somaiya.edu', '1811113', 'NAMAN', '', 'SHAH', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('namrit.sheth@somaiya.edu', '1812112', 'NAMRIT', '', 'SHETH', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('nandini.dey@somaiya.edu', '1813071', 'NANDINI', '', 'DEY', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('nandini.mahto@somaiya.edu', '1813073', 'NANDINI', '', 'MAHTO', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('nandita.kadam@somaiya.edu', '1811084', 'NANDITA', '', 'KADAM', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('narayan.nagwani@somaiya.edu', '1815099', 'NARAYAN', '', 'NAGWANI', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('navneet.p@somaiya.edu', '1813035', 'NAVNEET', '', 'PARAB', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('neel.desai@somaiya.edu', '1923010', 'NEEL', '', 'DESAI', '2019', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('neel.gami@somaiya.edu', '1815078', 'NEEL', '', 'GAMI', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('neelay.j@somaiya.edu', '1814024', 'NEELAY', '', 'JAGANI', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('neer.gada@somaiya.edu', '1815016', 'NEER', '', 'GADA', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('neeraj.n@somaiya.edu', '1811027', 'NEERAJ', '', 'NAIK', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('neha.mane@somaiya.edu', '1812088', 'NEHA', '', 'MANE', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('nehal.cj@somaiya.edu', '1812027', 'NEHAL', '', 'JAIN', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('nidhi.jajda@somaiya.edu', '1812028', 'NIDHI', '', 'JAJDA', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('nidhi.n@somaiya.edu', '1811028', 'NIDHI', '', 'NAIR', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('niha.ks@somaiya.edu', '1921006', 'NIHA', '', 'SHAIKH', '2019', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('nihar.merchant@somaiya.edu', '1815038', 'NIHAR', '', 'MERCHANT', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('nikhil.chaplot@somaiya.edu', '1815069', 'NIKHIL', '', 'CHAPLOT', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('nikhil.jd@somaiya.edu', '1815073', 'NIKHIL', '', 'DARJI', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('nikhil19@somaiya.edu', '1814114', 'NIKHIL', '', 'SHARMA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('nikunj.dg@somaiya.edu', '1813077', 'NIKUNJ', '', 'GOHIL', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('nilay.j@somaiya.edu', '1815028', 'NILAY', '', 'JUTHANI', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('nilay.sheth@somaiya.edu', '1811121', 'NILAY', '', 'SHETH', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('nimish.n@somaiya.edu', '1815109', 'NIMISH', '', 'NIMBALKAR', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('nimish.v@somaiya.edu', '1811060', 'NIMISH', '', 'VITHALANI', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('nimisha.chauhan@somaiya.edu', '1922012', 'NIMISHA', '', 'CHAUHAN', '2019', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('nimit.dave@somaiya.edu', '1815009', 'NIMIT', '', 'DAVE', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('ninad.devdas@somaiya.edu', '1923004', 'NINAD', '', 'DEVDAS', '2019', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('nirav.reshamwala@somaiya.edu', '1815111', 'NIRAV', '', 'RESHAMWALA', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('nisarg.vaghasiya@somaiya.edu', '1813063', 'NISARG', '', 'VAGHASIYA', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('nishant.tolia@somaiya.edu', '1815134', 'NISHANT', '', 'TOLIA', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('nishavak.n@somaiya.edu', '1814040', 'NISHAVAK', '', 'NAIK', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('nishi20@somaiya.edu', '1811045', 'NISHI', '', 'SHAH', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('nishit.rs@somaiya.edu', '1811114', 'NISHIT', '', 'SHAH', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('nupoor.panchal@somaiya.edu', '1815041', 'NUPOOR', '', 'PANCHAL', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('ojas.k@somaiya.edu', '1811064', 'OJAS', '', 'KULKARNI', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('ojasvi.naik@somaiya.edu', '1811098', 'OJASVI', '', 'NAIK', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('om.rawal@somaiya.edu', '1811037', 'OM', '', 'RAWAL', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('onkar.sanap@somaiya.edu', '1814035', 'ONKAR', '', 'SANAP', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('p.daphal@somaiya.edu', '1813009', 'PRATHAMESH', '', 'DAPHAL', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('p.sonkusare@somaiya.edu', '1925006', 'PRIYANKA', '', 'SONKUSARE', '2019', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('panchal.jj@somaiya.edu', '1815105', 'JITESH', '', 'PANCHAL', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('panchal.jr@somaiya.edu', '1813108', 'JINAL', '', 'PANCHAL', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('pandey.sk@somaiya.edu', '1811030', 'SAKSHI', '', 'PANDEY', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('pandya.kp@somaiya.edu', '1813034', 'KARAN', '', 'PANDYA', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('pankti.n@somaiya.edu', '1814045', 'PANKTI', '', 'NANAVATI', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('param.ms@somaiya.edu', '1812056', 'PARAM', '', 'SHAH', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('param.shendekar@somaiya.edu', '1814115', 'PARAM', '', 'SHENDEKAR', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('parav.s@somaiya.edu', '1815126', 'PARAV', '', 'SHINGADIYA', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('parekh.kn@somaiya.edu', '1921008', 'KINJAL', '', 'PAREKH', '2019', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('parshva.ss@somaiya.edu', '1811046', 'PARSHVA', '', 'SHAH', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('parth.gandani@somaiya.edu', '1812020', 'PARTH', '', 'GANDANI', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('parth.jm@somaiya.edu', '1811066', 'PARTH', '', 'MEHTA', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10');
INSERT INTO `student` (`email_id`, `rollno`, `fname`, `mname`, `lname`, `year_of_admission`, `dept_id`, `current_sem`, `form_filled`, `adding_email_id`, `timestamp`) VALUES
('parth.pd@somaiya.edu', '1815010', 'PARTH', '', 'DEDHIA', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('parthiv.vs@somaiya.edu', '1925002', 'PARTHIV', '', 'SHAH', '2019', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('parva.b@somaiya.edu', '1814004', 'PARVA', '', 'BARBHAYA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('patel.vr@somaiya.edu', '1813037', 'VIVEK', '', 'PATEL', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('patil.nv@somaiya.edu', '1814098', 'NEHA', '', 'PATIL', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('pavitra.n@somaiya.edu', '1815103', 'PAVITRA', '', 'NAYAK', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('piyush.chavda@somaiya.edu', '1814010', 'PIYUSH', '', 'CHAVDA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('piyush.pandey@somaiya.edu', '1812096', 'PIYUSH', '', 'PANDEY', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('pns1@somaiya.edu', '1811116', 'PARTH', '', 'N SHAH', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('poorva.kothari@somaiya.edu', '1812037', 'POORVA', '', 'KOTHARI', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('pps6@somaiya.edu', '1811115', 'PARTH', '', 'SHAH', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('prabhat.g@somaiya.edu', '1925004', 'PRABHAT', '', 'GORANE', '2019', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('pragun.m@somaiya.edu', '1813029', 'PRAGUN', '', 'MANTRI', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('praharsh.v@somaiya.edu', '1813124', 'PRAHARSH', '', 'VANKAWALA', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('prajwal.bandewar@somaiya.edu', '1815070', 'PRAJWAL', '', 'BANDEWAR', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('prajwal.bhagat@somaiya.edu', '1813066', 'PRAJWAL', '', 'BHAGAT', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('prajwal.gawde@somaiya.edu', '1813076', 'PRAJWAL', '', 'GAWDE', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('pranav.ahuja@somaiya.edu', '1811001', 'PRANAV', '', 'AHUJA', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('prasad.borkar@somaiya.edu', '1815004', 'PRASAD', '', 'BORKAR', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('prateek.pandey@somaiya.edu', '1811105', 'PRATEEK', '', 'PANDEY', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('prathamesh.kodre@somaiya.edu', '1815032', 'PRATHAMESH', '', 'KODRE', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('prathamesh.ma@somaiya.edu', '1812070', 'PRATHAMESH', '', 'ADARKAR', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('pratik.swali@somaiya.edu', '1923003', 'PRATIK', '', 'SWALI', '2019', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('preet.porwal@somaiya.edu', '1814100', 'PREET', '', 'PORWAL', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('prina.gudhka@somaiya.edu', '1814080', 'PRINA', '', 'GUDHKA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('priyank.ps@somaiya.edu', '1812106', 'PRIYANK', '', 'SHAH', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('priyanuj.b@somaiya.edu', '1813083', 'PRIYANUJ', '', 'BORDOLOI', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('prutha.patel@somaiya.edu', '1812123', 'PRUTHA', '', 'PATEL', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('pss5@somaiya.edu', '1815115', 'PRATHAMESH', '', 'SAWANT', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('pss6@somaiya.edu', '1815056', 'PARTH', '', 'SHAH', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('purav.js@somaiya.edu', '1813119', 'PURAV', '', 'SHAH', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('purva.belgamwala@somaiya.edu', '1813065', 'PURVA', '', 'BELGAMWALA', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('purvi.h@somaiya.edu', '1814023', 'PURVI', '', 'HARNIYA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('pushti.r@somaiya.edu', '1813044', 'PUSHTI', '', 'RANPURA', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('pvs1@somaiya.edu', '1811047', 'PARTH', '', 'SHAH', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rachit.hm@somaiya.edu', '1814037', 'RACHIT', '', 'MEHTA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rachit.j@somaiya.edu', '1812031', 'RACHIT', '', 'JUTHANI', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rachit.jain@somaiya.edu', '1815085', 'RACHIT', '', 'JAIN', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rachit.singh@somaiya.edu', '1815062', 'RACHIT', '', 'SINGH', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('raghvendra.s@somaiya.edu', '1813058', 'RAGHVENDRA', '', 'SHINDE', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rahil.js@somaiya.edu', '1812108', 'RAHIL', '', 'SHAH', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rahil.kanti@somaiya.edu', '1815089', 'RAHIL', '', 'KANTI', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rahil.parikh@somaiya.edu', '1811032', 'RAHIL', '', 'PARIKH', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('raj.sanghani@somaiya.edu', '1813045', 'RAJ', '', 'SANGHANI', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('raj.shah8@somaiya.edu', '1811048', 'RAJ', '', 'SHAH', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('raj.thakkar2@somaiya.edu', '1813061', 'RAJ', '', 'THAKKAR', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rajan.gaul@somaiya.edu', '1811078', 'RAJAN', '', 'GAUL', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rajat.c@somaiya.edu', '1814068', 'RAJAT', '', 'CHAUDHARI', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rajat.shah@somaiya.edu', '1815057', 'RAJAT', '', 'SHAH', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rajat.sharma@somaiya.edu', '1811120', 'RAJAT', '', 'SHARMA', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rajiv.bane@somaiya.edu', '1814083', 'RAJIV', '', 'BANE', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rajneesh.j@somaiya.edu', '1815086', 'RAJNEESH', '', 'JAIN', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('ramesh.krishnan@somaiya.edu', '1811063', 'RAMESH', '', 'KRISHNAN', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rasika.joshi@somaiya.edu', '1814086', 'RASIKA', '', 'JOSHI', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rdd@somaiya.edu', '1813074', 'RAHUL', '', 'DOSHI', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('revant.shah@somaiya.edu', '1813052', 'REVANT', '', 'SHAH', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('revathi.p@somaiya.edu', '1921011', 'REVATHI', '', 'PRIYAN', '2019', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rhea.kamath@somaiya.edu', '1815088', 'RHEA', '', 'KAMATH', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rhea23@somaiya.edu', '1813053', 'RHEA', '', 'SHAH', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rhitik.g@somaiya.edu', '1713022', 'RHITIK', '', 'GANDHI', '2017', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rhutuja.t@somaiya.edu', '1814128', 'RHUTUJA', '', 'THAKUR', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rhyme.risi@somaiya.edu', '1812103', 'RHYME', '', 'RISI', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rhythm.js@somaiya.edu', '1815058', 'RHYTHM', '', 'SHAH', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('riddhish.t@somaiya.edu', '1814058', 'RIDDHISH', '', 'THAKARE', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rishabh.cj@somaiya.edu', '1712018', 'RISHABH', '', 'JAIN', '2017', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rishabh.jogani@somaiya.edu', '1815026', 'RISHABH', '', 'JOGANI', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('ritik.dhame@somaiya.edu', '1812018', 'RITIK', '', 'DHAME', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('ritik.ds@somaiya.edu', '1814050', 'RITIK', '', 'SHAH', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('ritik.mody@somaiya.edu', '1811097', 'RITIK', '', 'MODY', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('ritwik.m@somaiya.edu', '1813116', 'RITWIK', '', 'MANDAL', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('riya.joshi@somaiya.edu', '1814028', 'RIYA', '', 'JOSHI', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('riya.tasgaonkar@somaiya.edu', '1811122', 'RIYA', '', 'TASGAONKAR', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rnd1@somaiya.edu', '1811075', 'RUSHABH', '', 'DOSHI', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rohan.shende@somaiya.edu', '1815122', 'ROHAN', '', 'SHENDE', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rohit.padia@somaiya.edu', '1812052', 'ROHIT', '', 'PADIA', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rohit.patil1@somaiya.edu', '1815108', 'ROHIT', '', 'PATIL', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rohit.ss@somaiya.edu', '1812083', 'ROHIT', '', 'SINGH', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rohit09@somaiya.edu', '1813042', 'ROHIT', '', 'SHAH', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('roma.k@somaiya.edu', '1922009', 'ROMA', '', 'KESARWANI', '2019', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('romil.us@somaiya.edu', '1714058', 'ROMIL', '', 'SONI', '2017', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('ronak.desai@somaiya.edu', '1814074', 'RONAK', '', 'DESAI', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('ronak.dg@somaiya.edu', '1811011', 'RONAK', '', 'GALA', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('ronak.singh@somaiya.edu', '1813126', 'RONAK', '', 'SINGH', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('roosheet.m@somaiya.edu', '1815036', 'ROOSHEET', '', 'MEHTA', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('ruchi.manjalkar@somaiya.edu', '1812076', 'RUCHI', '', 'MANJALKAR', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('ruchira.j@somaiya.edu', '1813088', 'RUCHIRA', '', 'JOSHI', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rudra.jog@somaiya.edu', '1815096', 'RUDRA', '', 'JOG', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rudresh.r@somaiya.edu', '1814104', 'RUDRESH', '', 'RAVAL', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rugved.bongale@somaiya.edu', '1811006', 'RUGVED', '', 'BONGALE', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rugved.j@somaiya.edu', '1815023', 'RUGVED', '', 'JABADE', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rushikesh.arande@somaiya.edu', '1815002', 'RUSHIKESH', '', 'ARANDE', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rushil.popat@somaiya.edu', '1815049', 'RUSHIL', '', 'POPAT', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rustom.m@somaiya.edu', '1813027', 'RUSTOM', '', 'MAKOOJINA', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rutik.gandhi@somaiya.edu', '1815080', 'RUTIK', '', 'GANDHI', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rutvikkumar.p@somaiya.edu', '1925011', 'RUTVIKKUMAR', '', 'PANCHAL', '2019', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('rvs1@somaiya.edu', '1922002', 'RAJ', '', 'SHAH', '2019', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('s.baradkar@somaiya.edu', '1812007', 'SHARVARI', '', 'BARADKAR', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('s.srinivasan@somaiya.edu', '1812117', 'SUDARSHAN', '', 'SRINIVASAN', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('s.suraliya@somaiya.edu', '1812061', 'SHREYANS', '', 'SURALIYA', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('saarah.khan@somaiya.edu', '1811088', 'SAARAH', '', 'KHAN', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sagar.kamat@somaiya.edu', '1814030', 'SAGAR', '', 'KAMAT', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sagar.nn@somaiya.edu', '1815013', 'SAGAR', '', 'NAIK', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sakshi.shah4@somaiya.edu', '1922003', 'SAKSHI', '', 'SHAH', '2019', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('salil.kulkarni@somaiya.edu', '1813026', 'SALIL', '', 'KULKARNI', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sameeksha.p@somaiya.edu', '1815048', 'SAMEEKSHA', '', 'POOJARY', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('samyak.z@somaiya.edu', '1813127', 'SAMYAK', '', 'ZANZARI', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sanchi.desai@somaiya.edu', '1815012', 'SANCHI', '', 'DESAI', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sanika.bagwe@somaiya.edu', '1811065', 'SANIKA', '', 'BAGWE', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sankalp.jain@somaiya.edu', '1813084', 'SANKALP', '', 'JAIN', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sanket.dp@somaiya.edu', '1813039', 'SANKET', '', 'PATIL', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sanmit.sahu@somaiya.edu', '1811038', 'SANMIT', '', 'SAHU', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sanya.shah@somaiya.edu', '1812110', 'SANYA', '', 'SHAH', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sanyam.gandhi@somaiya.edu', '1814078', 'SANYAM', '', 'GANDHI', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sanyam.gudhka@somaiya.edu', '1812081', 'SANYAM', '', 'GUDHKA', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sanyam.savla@somaiya.edu', '1811040', 'SANYAM', '', 'SAVLA', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sap3@somaiya.edu', '1922020', 'SAKSHI', '', 'PANDEY', '2019', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sarth.m@somaiya.edu', '1815097', 'SARTH', '', 'MIRASHI', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sarthak.ms@somaiya.edu', '1815059', 'SARTHAK', '', 'SHAH', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sarthak.vora@somaiya.edu', '1815066', 'SARTHAK', '', 'VORA', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sarvesh.bangad@somaiya.edu', '1811124', 'SARVESH', '', 'BANGAD', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('satra.y@somaiya.edu', '1811109', 'YASH', '', 'SATRA', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('satyam.pandey@somaiya.edu', '1812120', 'SATYAM', '', 'PANDEY', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('saud.shaikh@somaiya.edu', '1815119', 'SAUD', '', 'SHAIKH', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('saumya.gala@somaiya.edu', '1712015', 'SAUMYA', '', 'GALA', '2017', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('saurabh.nambiar@somaiya.edu', '1811099', 'SAURABH', '', 'NAMBIAR', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('saurabh.shetty@somaiya.edu', '1811055', 'SAURABH', '', 'SHETTY', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('saurav.sarkar@somaiya.edu', '1815113', 'SAURAV', '', 'SARKAR', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('saurav.yj@somaiya.edu', '1811019', 'SAURAV', '', 'JOSHI', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('savri.gandhi@somaiya.edu', '1815114', 'SAVRI', '', 'GANDHI', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sejal.chordiya@somaiya.edu', '1813008', 'SEJAL', '', 'CHORDIYA', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shabdarali.m@somaiya.edu', '1813101', 'SHABDARALI', '', 'MAREDIYA', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shah.di@somaiya.edu', '1922014', 'DHARMIL', '', 'SHAH', '2019', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shah.ts@somaiya.edu', '1813054', 'TIRTH', '', 'SHAH', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shantanu.godbole@somaiya.edu', '1811079', 'SHANTANU', '', 'GODBOLE', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sharath.p@somaiya.edu', '1813111', 'SHARATH', '', 'PUTHIYAKUNNAN', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shatayu.m@somaiya.edu', '1815095', 'SHATAYU', '', 'MEHTA', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shefali24@somaiya.edu', '1921007', 'SHEFALI', '', 'PRAJAPATI', '2019', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shelar.sa@somaiya.edu', '1811053', 'SAKSHI', '', 'SHELAR', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shelke.aa@somaiya.edu', '1811103', 'ANKITA', '', 'SHELKE', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sheth.jb@somaiya.edu', '1812002', 'JENIL', '', 'SHETH', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sheth.mj@somaiya.edu', '1812060', 'MIHIR', '', 'SHETH', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shetty.rr@somaiya.edu', '1815060', 'RAHUL', '', 'SHETTY', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shetye.y@somaiya.edu', '1815061', 'YASH', '', 'SHETYE', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shibani.p@somaiya.edu', '1922021', 'SHIBANI', '', 'PRADHAN', '2019', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shikta.das@somaiya.edu', '1813011', 'SHIKTA', '', 'DAS', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shivam.awasthi@somaiya.edu', '1813128', 'SHIVAM', '', 'AWASTHI', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shivam.bansal@somaiya.edu', '1813004', 'SHIVAM', '', 'BANSAL', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shivani.kaul@somaiya.edu', '1811086', 'SHIVANI', '', 'KAUL', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shravani.d@somaiya.edu', '1812077', 'SHRAVANI', '', 'DHOTE', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shrey.bs@somaiya.edu', '1812113', 'SHREY', '', 'SHETH', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shreya.hk@somaiya.edu', '1813096', 'SHREYA', '', 'KULKARNI', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shreya.laheri@somaiya.edu', '1922006', 'SHREYA', '', 'LAHERI', '2019', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shreya.pawar@somaiya.edu', '1923006', 'SHREYA', '', 'PAWAR', '2019', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shreya.ughade@somaiya.edu', '1814116', 'SHREYA', '', 'UGHADE', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shreyas.mm@somaiya.edu', '1811049', 'SHREYAS', '', 'MORE', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shreyas.parkar@somaiya.edu', '1812101', 'SHREYAS', '', 'PARKAR', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shreyas.sj@somaiya.edu', '1922018', 'SHREYAS', '', 'JOSHI', '2019', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shreyasi.h@somaiya.edu', '1813080', 'SHREYASI', '', 'HATWALNE', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shruti.gosain@somaiya.edu', '1814079', 'SHRUTI', '', 'GOSAIN', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shruti.kamat@somaiya.edu', '1922019', 'SHRUTI', '', 'KAMAT', '2019', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shubh.as@somaiya.edu', '1811050', 'SHUBH', '', 'SHAH', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shubh.d@somaiya.edu', '1813040', 'SHUBH', '', 'DEDHIA', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shubh.mody@somaiya.edu', '1813031', 'SHUBH', '', 'MODY', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shubh.shetiya@somaiya.edu', '1815140', 'SHUBH', '', 'SHETIYA', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shubham.bhakuni@somaiya.edu', '1814006', 'SHUBHAM', '', 'BHAKUNI', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shubham.dj@somaiya.edu', '1923005', 'SHUBHAM', '', 'JADHAV', '2019', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shubham.mj@somaiya.edu', '1815027', 'SHUBHAM', '', 'JOSHI', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('shubhankar.r@somaiya.edu', '1815112', 'SHUBHANKAR', '', 'RISWADKAR', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('siddhant.l@somaiya.edu', '1815093', 'SIDDHANT', '', 'LAKKAM', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('siddhant.shaha@somaiya.edu', '1814112', 'SIDDHANT', '', 'SHAHA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('siddhesh.mahajan@somaiya.edu', '1815035', 'SIDDHESH', '', 'MAHAJAN', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('siddhi.am@somaiya.edu', '1813028', 'SIDDHI', '', 'MALI', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('siddhi.nagvekar@somaiya.edu', '1815040', 'SIDDHI', '', 'NAGVEKAR', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('siddhi.rajwatkar@somaiya.edu', '1925005', 'SIDDHI', '', 'RAJWATKAR', '2019', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sidhant.malkar@somaiya.edu', '1812041', 'SIDHANT', '', 'MALKAR', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('simran.lopes@somaiya.edu', '1813099', 'SIMRAN', '', 'LOPES', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('smit.bb@somaiya.edu', '1811070', 'SMIT', '', 'BHATT', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('smit.ds@somaiya.edu', '1811051', 'SMIT', '', 'SHAH', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('smit.nm@somaiya.edu', '1813104', 'SMIT', '', 'MEHTA', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('smit.shet@somaiya.edu', '1815123', 'SMIT', '', 'SHET', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('smita.nayak@somaiya.edu', '1812107', 'SMITA', '', 'NAYAK', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('soham.mehta@somaiya.edu', '1815043', 'SOHAM', '', 'MEHTA', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('soumya.parekh@somaiya.edu', '1811106', 'SOUMYA', '', 'PAREKH', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sounak.das@somaiya.edu', '1814070', 'SOUNAK', '', 'DAS', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sourabh.bujawade@somaiya.edu', '1814009', 'SOURABH', '', 'BUJAWADE', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('srg1@somaiya.edu', '1815018', 'SHUBHAM', '', 'GHADIGAONKAR', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('ssm2@somaiya.edu', '1811095', 'SIDDHARTH', '', 'MISHRA', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('student2@somaiya.edu', '1711007', 'student2', 'student2', 'student2', '	2017', 1, 5, 0, 'IC@somaiya.edu', '2020-05-09 20:05:50'),
('student3@somaiya.edu', '1712003', 'Student3', 'student3', 'student3', '2017', 2, 4, 0, 'IC@somaiya.edu', '2020-05-09 20:05:50'),
('student@somaiya.edu', '1711006', 'student', 'student', 'student', '2017', 1, 3, 0, 'IC@somaiya.edu', '2020-05-09 20:05:50'),
('sudarshan.r@somaiya.edu', '1813006', 'SUDARSHAN', '', 'RAJENDRAN', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sudhir.bindu@somaiya.edu', '1811059', 'ABHISHEK', '', 'BINDU', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sudiksha.m@somaiya.edu', '1811096', 'SUDIKSHA', '', 'MISHRA', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sukhada.v@somaiya.edu', '1814119', 'SUKHADA', '', 'VIRKAR', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sukrut.kolhe@somaiya.edu', '1812015', 'SUKRUT', '', 'KOLHE', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sukruti.a@somaiya.edu', '1812009', 'SUKRUTI', '', 'AMDEKAR', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sumedh.soman@somaiya.edu', '1815063', 'SUMEDH', '', 'SOMAN', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sunil.ck@somaiya.edu', '1813098', 'CHINMAY', '', 'KUMAR', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('suparshwa.p@somaiya.edu', '1813103', 'SUPARSHWA', '', 'PATIL', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sushant.bansal@somaiya.edu', '1812006', 'SUSHANT', '', 'BANSAL', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('sushrut.b@somaiya.edu', '1715071', 'SUSHRUT', '', 'BAPORIKAR', '2017', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('swarangee.m@somaiya.edu', '1812125', 'SWARANGEE', '', 'MALHARI', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('swetha.c@somaiya.edu', '1813007', 'SWETHA', '', 'CHILVERI', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('syed.suhaib@somaiya.edu', '1814059', 'SYED', '', 'HUSSAIN', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('taher.a@somaiya.edu', '1812001', 'TAHER', '', 'AHMEDABADWALA', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('taher.d@somaiya.edu', '1815141', 'TAHER', '', 'DHORAJIWALA', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('talha.c@somaiya.edu', '1811007', 'TALHA', '', 'CHAFEKAR', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('tanay.ns@somaiya.edu', '1812116', 'TANAY', '', 'SHAH', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('tanay.parekh@somaiya.edu', '1812098', 'TANAY', '', 'PAREKH', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('tanish.chube@somaiya.edu', '1813070', 'TANISH', '', 'CHUBE', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('tanisha.ashar@somaiya.edu', '1814065', 'TANISHA', '', 'ASHAR', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('tanmay.armal@somaiya.edu', '1814099', 'TANMAY', '', 'ARMAL', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('tanmay.gorad@somaiya.edu', '1922008', 'TANMAY', '', 'GORAD', '2019', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('tanmay.shekhar@somaiya.edu', '1813020', 'TANMAY', '', 'SHEKHAR', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('tanshik.doshi@somaiya.edu', '1923002', 'TANSHIK', '', 'DOSHI', '2019', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('tanuj.jain@somaiya.edu', '1811017', 'TANUJ', '', 'JAIN', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('tanvi.bs@somaiya.edu', '1812057', 'TANVI', '', 'SHAH', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('tanvi.lakhani@somaiya.edu', '1812039', 'TANVI', '', 'LAKHANI', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('tap@somaiya.edu', '1812091', 'TANMAY', '', 'PAWAR', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('tarush.r@somaiya.edu', '1811035', 'TARUSH', '', 'RAJPUT', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('tejal.gaykar@somaiya.edu', '1923012', 'TEJAL', '', 'GAYKAR', '2019', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('tejas.jain@somaiya.edu', '1815025', 'TEJAS', '', 'JAIN', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('tejas.khanolkar@somaiya.edu', '1811089', 'TEJAS', '', 'KHANOLKAR', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('tejas.limbachiya@somaiya.edu', '1813015', 'TEJAS', '', 'LIMBACHIYA', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('tejas.np@somaiya.edu', '1815100', 'TEJAS', '', 'PATIL', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('tejas.rathod@somaiya.edu', '1813113', 'TEJAS', '', 'RATHOD', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('tirth.hs@somaiya.edu', '1811127', 'TIRTH', '', 'SHAH', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('tirth.ps@somaiya.edu', '1813055', 'TIRTH', '', 'SHAH', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('tirth.thaker@somaiya.edu', '1814061', 'TIRTH', '', 'THAKER', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('toshith.m@somaiya.edu', '1812089', 'TOSHITH', '', 'MANGLANI', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('tushar.bapecha@somaiya.edu', '1811003', 'TUSHAR', '', 'BAPECHA', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('twinkle.r@somaiya.edu', '1814103', 'TWINKLE', '', 'RATHOD', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('udit.damare@somaiya.edu', '1815072', 'UDIT', '', 'DAMARE', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('umair.kazi@somaiya.edu', '1815090', 'UMAIR', '', 'KAZI', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('upendra.b@somaiya.edu', '1812069', 'UPENDRA', '', 'BHANUSHALI', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('urmil.c@somaiya.edu', '1811008', 'URMIL', '', 'CHANDARANA', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('urvi.bheda@somaiya.edu', '1811068', 'URVI', '', 'BHEDA', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('utsav.parekh@somaiya.edu', '1924002', 'UTSAV', '', 'PAREKH', '2019', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('v.sunderraman@somaiya.edu', '1811125', 'VIGNESH', '', 'SUNDER RAMAN', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('vaibhav.katkam@somaiya.edu', '1815031', 'VAIBHAV', '', 'KATKAM', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('vaibhav.parekh@somaiya.edu', '1815042', 'VAIBHAV', '', 'PAREKH', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('vaibhavi.kundle@somaiya.edu', '1814127', 'VAIBHAVI', '', 'KUNDLE', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('vandan.k@somaiya.edu', '1813092', 'VANDAN', '', 'KHAMBHATA', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('vartika.g@somaiya.edu', '1811081', 'VARTIKA', '', 'GUPTA', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('varun.bj@somaiya.edu', '1813043', 'VARUN', '', 'JAIN', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('varun.dabi@somaiya.edu', '1815071', 'VARUN', '', 'DABI', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('varun.pandey@somaiya.edu', '1814095', 'VARUN', '', 'PANDEY', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('varun12@somaiya.edu', '1815121', 'VARUN', '', 'SHARMA', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('vatsal.kapadia@somaiya.edu', '1812032', 'VATSAL', '', 'KAPADIA', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('vatsal.pathak@somaiya.edu', '1811033', 'VATSAL', '', 'PATHAK', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('vatsal12@somaiya.edu', '1811052', 'VATSAL', '', 'SHAH', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('vedant.chandra@somaiya.edu', '1812022', 'VEDANT', '', 'CHANDRA', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('vedant.khatod@somaiya.edu', '1813093', 'VEDANT', '', 'KHATOD', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('vedant.konde@somaiya.edu', '1813129', 'VEDANT', '', 'KONDE', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('vedatma.k@somaiya.edu', '1812121', 'VEDATMA', '', 'KRITI', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('vidhi.gohel@somaiya.edu', '1812019', 'VIDHI', '', 'GOHEL', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('vidhi.sejpal@somaiya.edu', '1813048', 'VIDHI', '', 'SEJPAL', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('vighnesh.naik@somaiya.edu', '1814041', 'VIGHNESH', '', 'NAIK', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('vijayram.p@somaiya.edu', '1812073', 'VIJAYRAM', '', 'PATEL', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('vikas.rg@somaiya.edu', '1814022', 'VIKAS', '', 'GUPTA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('vimal.e3@somaiya.edu', '1813046', 'VIMAL', '', 'Sardhara', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('vineet.gadiyar@somaiya.edu', '1813075', 'VINEET', '', 'GADIYAR', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('vineeta.b@somaiya.edu', '1814066', 'VINEETA', '', 'BHUJLE', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('vinit.mundra@somaiya.edu', '1811026', 'VINIT', '', 'MUNDRA', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('vipul.bagal@somaiya.edu', '1814094', 'VIPUL', '', 'BAGAL', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('vipul.dube@somaiya.edu', '1813089', 'VIPUL', '', 'DUBE', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('virag.j@somaiya.edu', '1814026', 'VIRAG', '', 'JAIN', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('viraj.jedhe@somaiya.edu', '1813085', 'VIRAJ', '', 'JEDHE', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('viraj.joshi@somaiya.edu', '1814034', 'VIRAJ', '', 'JOSHI', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('viraj.nd@somaiya.edu', '1811072', 'VIRAJ', '', 'DOSHI', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('viraj.np@somaiya.edu', '1814047', 'VIRAJ', '', 'PATIL', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('viraj06@somaiya.edu', '1814093', 'VIRAJ', '', 'MEHTA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('vishal.salgond@somaiya.edu', '1814107', 'VISHAL', '', 'SALGOND', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('vishant.m@somaiya.edu', '1814038', 'VISHANT', '', 'MEHTA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('vistasp.edulji@somaiya.edu', '1815015', 'VISTASP', '', 'EDULJI', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('vpb@somaiya.edu', '1922001', 'VEDANT', '', 'BHANUSHALI', '2019', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('vruddhi.ms@somaiya.edu', '1811117', 'VRUDDHI', '', 'SHAH', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('vruksha.j@somaiya.edu', '1812030', 'VRUKSHA', '', 'JOSHI', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('vrushabh.rg@somaiya.edu', '1813016', 'VRUSHABH', '', 'GADA', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('vrutik.shah@somaiya.edu', '1814056', 'VRUTIK', '', 'SHAH', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('yash.chandarana@somaiya.edu', '1815094', 'YASH', '', 'CHANDARANA', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('yash.deorah@somaiya.edu', '1814073', 'YASH', '', 'DEORAH', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('yash.kalyani@somaiya.edu', '1815030', 'YASH', '', 'KALYANI', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('yash.kothiya@somaiya.edu', '1813095', 'YASH', '', 'KOTHIYA', '2018', 3, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('yash.tandon@somaiya.edu', '1811058', 'YASH', '', 'TANDON', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('yash.telange@somaiya.edu', '1815130', 'YASH', '', 'TELANGE', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('yash.thadeshwar@somaiya.edu', '1815131', 'YASH', '', 'THADESHWAR', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('yash.tulsyan@somaiya.edu', '1812119', 'YASH', '', 'TULSYAN', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('yashpal.m@somaiya.edu', '1812044', 'YASHPAL', '', 'MOMAYA', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('yashvi.pv@somaiya.edu', '1814121', 'YASHVI', '', 'VORA', '2018', 4, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('ysb1@somaiya.edu', '1812010', 'YASH', '', 'BHANUSHALI', '2018', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('yug.shah@somaiya.edu', '1811077', 'YUG', '', 'SHAH', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('yukta.pathak@somaiya.edu', '1815045', 'YUKTA', '', 'PATHAK', '2018', 5, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('yusha.sharif@somaiya.edu', '1811119', 'YUSHA', '', 'SHARIF', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('zalak.b@somaiya.edu', '1811039', 'ZALAK', '', 'BHOJANI', '2018', 1, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10'),
('zeal.mehta@somaiya.edu', '1922005', 'ZEAL', '', 'MEHTA', '2019', 2, 4, 0, 'IC@somaiya.edu', '2020-05-31 18:23:10');

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

--
-- Dumping data for table `student_audit_log`
--

INSERT INTO `student_audit_log` (`email_id`, `cid`, `sem`, `year`, `complete_status`, `student_attendence`) VALUES
('student@somaiya.edu', 'UCEC8785', 3, '2018-19', 1, 70);

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

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

CREATE TABLE `student_marks` (
  `email_id` varchar(50) NOT NULL,
  `sem` int(11) NOT NULL,
  `gpa` float NOT NULL,
  `year` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_preference_audit`
--

CREATE TABLE `student_preference_audit` (
  `email_id` varchar(50) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `rollno` varchar(20) NOT NULL,
  `timestamp` varchar(30) NOT NULL,
  `allocate_status` tinyint(4) NOT NULL DEFAULT 0,
  `no_of_valid_preferences` int(11) NOT NULL,
  `pref1` varchar(15) NOT NULL DEFAULT '',
  `pref2` varchar(15) NOT NULL DEFAULT '',
  `pref3` varchar(15) NOT NULL DEFAULT '',
  `pref4` varchar(15) NOT NULL DEFAULT '',
  `pref5` varchar(15) NOT NULL DEFAULT '',
  `pref6` varchar(15) NOT NULL DEFAULT '',
  `pref7` varchar(15) NOT NULL DEFAULT '',
  `pref8` varchar(15) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_preference_audit`
--

INSERT INTO `student_preference_audit` (`email_id`, `sem`, `year`, `rollno`, `timestamp`, `allocate_status`, `no_of_valid_preferences`, `pref1`, `pref2`, `pref3`, `pref4`, `pref5`, `pref6`, `pref7`, `pref8`) VALUES
('a.choubey@somaiya.edu', 5, '2020-21', '1813130', '2020/04/15 00:00:41', 0, 8, '2UST532', '2UST543', '2UST533', '2UST514', '2UST512', '2UST544', '2UST531', 'same as pref 1'),
('a.dautkhane@somaiya.edu', 5, '2020-21', '1813012', '2020/04/15 14:42:20', 0, 8, '2UST514', '2UST531', '2UST543', '2UST532', '2UST533', '2UST511', '2UST512', '2UST513'),
('a.mahadevan@somaiya.edu', 5, '2020-21', '1811022', '2020/04/13 14:59:40', 0, 8, '2UST513', '2UST512', '2UST531', '2UST532', '2UST541', '2UST534', '2UST542', '2UST553'),
('a.maru@somaiya.edu', 5, '2020-21', '1813102', '2020/04/13 16:06:30', 0, 8, '2UST543', '2UST514', '2UST542', '2UST512', '2UST524', '2UST563', 'same as pref 5', '2UST562'),
('a.pareri@somaiya.edu', 5, '2020-21', '1814111', '2020/04/15 00:02:47', 0, 8, '2UST512', '2UST541', '2UST543', '2UST513', '2UST542', '2UST524', '2UST511', 'same as pref 5'),
('a.shridharani@somaiya.edu', 5, '2020-21', '1812115', '2020/04/13 17:45:27', 0, 8, '2UST513', '2UST514', '2UST532', '2UST522', '2UST523', '2UST562', '2UST563', '2UST561'),
('a.venkatadri@somaiya.edu', 5, '2020-21', '1812004', '2020/04/15 18:15:47', 0, 8, '2UST543', '2UST513', '2UST531', '2UST524', '2UST532', '2UST561', '2UST551', '2UST552'),
('aaditya.r@somaiya.edu', 5, '2020-21', '1812094', '2020/04/15 10:35:33', 0, 8, '2UST553', '2UST534', '2UST513', '2UST563', '2UST512', '2UST562', '2UST561', 'same as pref 4'),
('aafiya.h@somaiya.edu', 5, '2020-21', '1811014', '2020/04/15 00:06:59', 0, 8, '2UST531', '2UST512', '2UST543', '2UST532', '2UST541', '2UST524', '2UST511', '2UST542'),
('aagam.mehta@somaiya.edu', 5, '2020-21', '1812104', '2020/04/13 14:57:36', 0, 8, '2UST543', '2UST522', '2UST552', '2UST551', '2UST541', '2UST533', '2UST511', '2UST531'),
('aaron.cherian@somaiya.edu', 5, '2020-21', '1813069', '2020/04/14 19:46:31', 0, 8, '2UST524', '2UST514', '2UST532', '2UST544', '2UST543', 'same as pref 4', 'same as pref 3', '2UST542'),
('aayuse.p@somaiya.edu', 5, '2020-21', '1812093', '2020/04/13 15:04:45', 0, 8, '2UST513', '2UST522', '2UST511', '2UST512', '2UST553', 'same as pref 4', '2UST544', '2UST541'),
('abhijeet.dwivedi@somaiya.edu', 5, '2020-21', '1813013', '2020/04/15 9:46:53', 0, 8, '2UST512', '2UST543', '2UST531', '2UST532', '2UST551', 'same as pref 5', '2UST552', '2UST553'),
('abhinav.jha@somaiya.edu', 5, '2020-21', '1812029', '2020/04/16 00:05:14', 0, 8, '2UST534', '2UST543', '2UST531', '2UST524', '2UST551', '2UST513', '2UST532', 'same as pref 5'),
('abhinav.z@somaiya.edu', 5, '2020-21', '1815137', '2020/04/15 19:55:54', 0, 8, '2UST553', '2UST543', '2UST551', '2UST534', '2UST524', '2UST513', '2UST541', 'same as pref 5'),
('abhiram.a@somaiya.edu', 5, '2020-21', '1813001', '2020/04/15 17:09:22', 0, 8, '2UST533', '2UST512', '2UST522', '2UST531', '2UST514', '2UST532', '2UST544', '2UST541'),
('abhishek.ambekar@somaiya.edu', 5, '2020-21', '1815001', '2020/04/14 21:29:59', 0, 8, '2UST553', '2UST551', '2UST563', '2UST561', '2UST562', '2UST544', '2UST542', '2UST543'),
('abhishek.padiya@somaiya.edu', 5, '2020-21', '1812092', '2020/04/13 15:30:08', 0, 8, '2UST552', '2UST551', '2UST522', '2UST524', '2UST513', '2UST531', '2UST542', '2UST553'),
('abhishek.potdar@somaiya.edu', 5, '2020-21', '1814048', '2020/04/13 16:04:43', 0, 8, '2UST513', '2UST512', '2UST541', '2UST511', '2UST531', 'same as pref 3', 'same as pref 4', '2UST542'),
('adarsh.rj@somaiya.edu', 5, '2020-21', '1814084', '2020/04/14 23:50:04', 0, 8, '2UST524', '2UST561', '2UST543', '2UST531', '2UST532', 'same as pref 1', 'same as pref 4', 'same as pref 5'),
('aditi.joisher@somaiya.edu', 5, '2020-21', '1813086', '2020/04/13 14:45:25', 0, 8, '2UST514', '2UST532', '2UST512', '2UST541', '2UST531', '2UST521', 'same as pref 5', 'same as pref 2'),
('aditi.kulkarni@somaiya.edu', 5, '2020-21', '1813024', '2020/04/14 20:58:06', 0, 8, '2UST514', '2UST524', '2UST513', '2UST533', '2UST543', '2UST552', '2UST551', '2UST534'),
('aditya.datar@somaiya.edu', 5, '2020-21', '1814003', '2020/04/15 23:48:46', 0, 8, '2UST543', 'same as pref 1', 'same as pref 1', '2UST544', 'same as pref 4', '2UST551', '2UST511', '2UST512'),
('aditya.goud@somaiya.edu', 5, '2020-21', '1812023', '2020/04/14 23:34:18', 0, 8, '2UST534', '2UST543', '2UST551', '2UST522', '2UST563', '2UST531', '2UST532', '2UST541'),
('aditya.mahesh@somaiya.edu', 5, '2020-21', '1813064', '2020/04/15 22:10:26', 0, 8, '2UST524', '2UST543', '2UST531', '2UST514', '2UST533', 'same as pref 4', 'same as pref 4', 'same as pref 4'),
('aditya.shenoy@somaiya.edu', 5, '2020-21', '1813057', '2020/04/15 21:09:17', 0, 8, '2UST543', '2UST531', '2UST552', '2UST553', '2UST522', '2UST523', 'same as pref 4', '2UST521'),
('aditya.vaishya@somaiya.edu', 5, '2020-21', '1814117', '2020/04/13 14:51:14', 0, 8, '2UST511', '2UST531', '2UST512', '2UST541', '2UST542', 'same as pref 5', 'same as pref 1', '2UST524'),
('aditya06@somaiya.edu', 5, '2020-21', '1815124', '2020/04/14 20:03:13', 0, 8, '2UST524', '2UST543', '2UST553', '2UST551', '2UST534', 'same as pref 2', '2UST513', '2UST562'),
('aiswarya.k@somaiya.edu', 5, '2020-21', '1814122', '2020/04/13 20:57:29', 0, 8, '2UST512', '2UST541', '2UST544', '2UST543', '2UST532', '2UST531', '2UST542', '2UST533'),
('ajay.bhan@somaiya.edu', 5, '2020-21', '1811128', '2020/04/14 12:00:01', 0, 8, '2UST512', '2UST511', '2UST543', '2UST524', '2UST531', '2UST544', 'same as pref 5', '2UST542'),
('ajinkya.kirkire@somaiya.edu', 5, '2020-21', '1813094', '2020/04/13 15:12:39', 0, 8, '2UST531', '2UST513', '2UST511', '2UST512', '2UST543', '2UST541', '2UST532', '2UST542'),
('akash.biradar@somaiya.edu', 5, '2020-21', '1712068', '2020/04/15 10:11:21', 0, 8, '2UST514', '2UST543', '2UST532', '2UST511', '2UST512', '2UST522', '2UST551', '2UST534'),
('akhil.namboodiri@somaiya.edu', 5, '2020-21', '1814042', '2020/04/14 21:53:05', 0, 8, '2UST512', '2UST511', '2UST531', '2UST541', '2UST542', '2UST524', '2UST543', 'same as pref 2'),
('akshar.barchha@somaiya.edu', 5, '2020-21', '1811067', '2020/04/14 23:13:20', 0, 8, '2UST541', '2UST531', '2UST513', '2UST532', '2UST544', '2UST514', '2UST534', '2UST561'),
('aksharan.g@somaiya.edu', 5, '2020-21', '1812003', '2020/04/14 20:24:31', 0, 8, '2UST543', '2UST532', '2UST521', '2UST523', '2UST514', '2UST542', '2UST511', 'same as pref 2'),
('akshat.ag@somaiya.edu', 5, '2020-21', '1811012', '2020/04/13 15:21:59', 0, 8, '2UST513', '2UST512', '2UST511', '2UST531', '2UST524', '2UST542', '2UST563', 'same as pref 1'),
('akshat.shah2@somaiya.edu', 5, '2020-21', '1812059', '2020/04/14 18:42:24', 0, 8, '2UST522', '2UST553', '2UST551', '2UST563', '2UST521', '2UST511', '2UST562', '2UST513'),
('akshata.barne@somaiya.edu', 5, '2020-21', '1812066', '2020/04/14 13:18:45', 0, 8, '2UST561', '2UST532', '2UST543', '2UST534', '2UST522', '2UST544', '2UST531', '2UST513'),
('akshit.gs@somaiya.edu', 5, '2020-21', '1811042', '2020/04/14 20:23:31', 0, 8, '2UST512', '2UST511', '2UST541', '2UST542', '2UST532', '2UST534', 'same as pref 1', 'same as pref 2'),
('akshit.sanchala@somaiya.edu', 5, '2020-21', '1814067', '2020/04/13 14:53:47', 0, 8, '2UST512', '2UST511', '2UST543', '2UST541', '2UST542', 'same as pref 4', '2UST514', 'same as pref 5'),
('akshit.sj@somaiya.edu', 5, '2020-21', '1812034', '2020/04/15 14:52:03', 0, 8, '2UST511', '2UST543', '2UST522', '2UST551', '2UST553', '2UST533', 'same as pref 2', '2UST541'),
('akshit.tayade@somaiya.edu', 5, '2020-21', '1813106', '2020/04/13 17:26:14', 0, 8, '2UST514', '2UST531', '2UST512', '2UST544', '2UST543', '2UST553', 'same as pref 4', '2UST522'),
('alfiza.s@somaiya.edu', 5, '2020-21', '1811118', '2020/04/15 12:45:18', 0, 8, '2UST512', '2UST524', '2UST541', '2UST544', '2UST543', '2UST563', '2UST532', 'same as pref 1'),
('aliasgar.zm@somaiya.edu', 5, '2020-21', '1815037', '2020/04/14 00:49:41', 0, 8, '2UST531', '2UST513', '2UST511', '2UST521', '2UST551', 'same as pref 2', '2UST533', 'same as pref 4'),
('aman.desai@somaiya.edu', 5, '2020-21', '1811073', '2020/04/13 21:36:02', 0, 8, '2UST533', '2UST543', '2UST512', '2UST542', '2UST513', '2UST541', 'same as pref 5', '2UST544'),
('aman.jg@somaiya.edu', 5, '2020-21', '1815082', '2020/04/15 19:29:21', 0, 8, '2UST553', '2UST514', '2UST543', '2UST561', '2UST513', '2UST534', '2UST541', '2UST531'),
('aman.khakharia@somaiya.edu', 5, '2020-21', '1812033', '2020/04/14 21:04:55', 0, 8, '2UST543', '2UST542', '2UST524', '2UST532', '2UST514', 'same as pref 5', 'same as pref 3', '2UST511'),
('aman.panchal@somaiya.edu', 5, '2020-21', '1815104', '2020/04/14 21:45:17', 0, 8, '2UST561', 'same as pref 1', 'same as pref 1', '2UST563', 'same as pref 4', '2UST544', '2UST513', '2UST533'),
('amanshu.t@somaiya.edu', 5, '2020-21', '1922023', '2020/04/13 17:07:37', 0, 8, '2UST512', '2UST541', '2UST531', '2UST544', '2UST533', '2UST513', '2UST542', '2UST511'),
('amogh.sinkar@somaiya.edu', 5, '2020-21', '1811056', '2020/04/13 14:52:32', 0, 8, '2UST512', '2UST544', '2UST532', '2UST543', '2UST531', 'same as pref 1', '2UST534', '2UST551'),
('anchal.j@somaiya.edu', 5, '2020-21', '1811015', '2020/04/14 22:08:36', 0, 8, '2UST511', '2UST531', '2UST512', '2UST541', '2UST542', '2UST513', '2UST544', '2UST543'),
('aniket.ay@somaiya.edu', 5, '2020-21', '1815067', '2020/04/15 19:47:51', 0, 8, '2UST531', '2UST514', '2UST543', '2UST551', '2UST553', 'same as pref 3', '2UST533', '2UST544'),
('aniket.bhosale@somaiya.edu', 5, '2020-21', '1811069', '2020/04/15 20:45:06', 0, 8, '2UST531', '2UST524', '2UST561', '2UST532', '2UST544', '2UST562', '2UST511', '2UST542'),
('aniket.choudhar@somaiya.edu', 5, '2020-21', '1812074', '2020/04/16 00:34:29', 0, 8, '2UST512', '2UST513', '2UST532', '2UST533', '2UST541', 'same as pref 3', 'same as pref 4', '2UST542'),
('aniket.ubhare@somaiya.edu', 5, '2020-21', '1812063', '2020/04/14 16:24:36', 0, 8, '2UST553', '2UST534', '2UST552', '2UST551', '2UST521', '2UST511', '2UST512', '2UST541'),
('aniket05@somaiya.edu', 5, '2020-21', '1811083', '2020/04/14 18:12:03', 0, 8, '2UST524', '2UST531', '2UST543', '2UST512', '2UST513', '2UST534', 'same as pref 3', '2UST514'),
('anina.pillai@somaiya.edu', 5, '2020-21', '1811034', '2020/04/13 15:16:28', 0, 8, '2UST513', '2UST531', '2UST512', '2UST511', '2UST542', '2UST524', '2UST543', '2UST541'),
('anirudh.rn@somaiya.edu', 5, '2020-21', '1815101', '2020/04/13 14:44:24', 0, 8, '2UST553', '2UST513', '2UST563', '2UST534', '2UST551', '2UST541', '2UST533', '2UST521'),
('anjali.gohil@somaiya.edu', 5, '2020-21', '1811080', '2020/04/15 20:18:36', 0, 8, '2UST512', '2UST513', '2UST511', '2UST532', '2UST541', '2UST524', 'same as pref 1', 'same as pref 3'),
('ankit.thakker@somaiya.edu', 5, '2020-21', '1811123', '2020/04/13 21:23:33', 0, 8, '2UST512', '2UST531', '2UST532', '2UST513', '2UST542', 'same as pref 3', '2UST524', '2UST521'),
('annas.khan@somaiya.edu', 5, '2020-21', '1812080', '2020/04/15 22:29:17', 0, 8, '2UST524', '2UST543', '2UST514', '2UST544', '2UST561', 'same as pref 5', '2UST553', '2UST562'),
('anoushka.p@somaiya.edu', 5, '2020-21', '1813107', '2020/04/14 23:59:53', 0, 8, '2UST532', '2UST543', '2UST533', '2UST514', '2UST512', 'same as pref 3', 'same as pref 1', '2UST513'),
('anoushka.s@somaiya.edu', 5, '2020-21', '1813121', '2020/04/14 22:44:27', 0, 8, '2UST543', '2UST514', '2UST512', '2UST531', '2UST532', '2UST513', '2UST544', '2UST561'),
('ansh.dugar@somaiya.edu', 5, '2020-21', '1814064', '2020/04/13 16:14:34', 0, 8, '2UST524', '2UST531', '2UST512', '2UST513', '2UST543', 'same as pref 2', 'same as pref 1', '2UST522'),
('ansh.jain@somaiya.edu', 5, '2020-21', '1811016', '2020/04/14 22:08:42', 0, 8, '2UST511', '2UST531', '2UST512', '2UST541', '2UST542', '2UST532', 'same as pref 4', 'same as pref 5'),
('ansh.mehta@somaiya.edu', 5, '2020-21', '1814090', '2020/04/14 14:12:25', 0, 8, '2UST541', '2UST542', '2UST532', '2UST524', '2UST531', '2UST523', '2UST522', 'same as pref 3'),
('anuj.sarda@somaiya.edu', 5, '2020-21', '1814052', '2020/04/14 15:59:38', 0, 8, '2UST512', '2UST541', '2UST543', '2UST542', '2UST544', 'same as pref 5', 'same as pref 2', '2UST511'),
('anushka.darade@somaiya.edu', 5, '2020-21', '1814012', '2020/04/13 18:29:24', 0, 8, '2UST512', '2UST542', '2UST541', '2UST543', '2UST544', 'same as pref 5', 'same as pref 1', '2UST561'),
('anushka.sinha@somaiya.edu', 5, '2020-21', '1813060', '2020/04/13 15:54:23', 0, 8, '2UST531', '2UST512', '2UST511', '2UST524', '2UST533', '2UST553', '2UST551', '2UST563'),
('anuvrat.m@somaiya.edu', 5, '2020-21', '1812042', '2020/04/15 20:27:44', 0, 8, '2UST522', '2UST551', '2UST513', '2UST511', '2UST561', '2UST532', '2UST531', '2UST543'),
('apoorv.gupta@somaiya.edu', 5, '2020-21', '1814081', '2020/04/13 15:15:27', 0, 8, '2UST541', '2UST544', '2UST511', '2UST513', '2UST542', 'same as pref 1', '2UST532', 'same as pref 5'),
('apoorva.belokar@somaiya.edu', 5, '2020-21', '1815003', '2020/04/13 14:47:35', 0, 8, '2UST553', '2UST551', '2UST561', '2UST512', '2UST562', '2UST514', '2UST532', '2UST543'),
('arjun.sehgal@somaiya.edu', 5, '2020-21', '1811041', '2020/04/14 11:59:48', 0, 8, '2UST512', '2UST511', '2UST543', '2UST524', '2UST531', 'same as pref 5', '2UST522', '2UST534'),
('arkaprava.p@somaiya.edu', 5, '2020-21', '1813109', '2020/04/15 12:35:03', 0, 8, '2UST524', '2UST514', '2UST532', '2UST544', '2UST541', '2UST542', '2UST513', '2UST533'),
('arnav.gadre@somaiya.edu', 5, '2020-21', '1812079', '2020/04/14 11:20:53', 0, 8, '2UST514', '2UST532', '2UST543', '2UST523', '2UST522', '2UST542', 'same as pref 2', '2UST511'),
('aryak.naik@somaiya.edu', 5, '2020-21', '1812068', '2020/04/15 22:36:18', 0, 8, '2UST524', '2UST531', '2UST543', '2UST522', '2UST552', '2UST551', '2UST534', '2UST513'),
('asgarali.q@somaiya.edu', 5, '2020-21', '1921004', '2020/04/13 14:44:32', 0, 8, '2UST512', '2UST511', '2UST531', '2UST544', '2UST513', 'same as pref 5', 'same as pref 2', '2UST532'),
('ashesh.z@somaiya.edu', 5, '2020-21', '1815136', '2020/04/15 20:00:14', 0, 8, '2UST553', '2UST543', '2UST551', '2UST534', '2UST524', '2UST542', 'same as pref 2', '2UST541'),
('ashish.khare@somaiya.edu', 5, '2020-21', '1813023', '2020/04/13 18:45:05', 0, 8, '2UST532', '2UST542', '2UST533', '2UST541', '2UST511', '2UST544', 'same as pref 4', 'same as pref 1'),
('ashutosh.rane@somaiya.edu', 5, '2020-21', '1813112', '2020/04/15 21:00:52', 0, 8, '2UST543', '2UST553', '2UST561', '2UST534', '2UST531', '2UST541', '2UST544', '2UST511'),
('ashwini.pp@somaiya.edu', 5, '2020-21', '1923009', '2020/04/13 15:33:40', 0, 8, '2UST543', '2UST514', '2UST513', '2UST512', '2UST531', '2UST522', '2UST524', '2UST541'),
('ask1@somaiya.edu', 5, '2020-21', '1813025', '2020/04/15 23:39:49', 0, 8, '2UST543', '2UST514', '2UST524', '2UST553', '2UST552', '2UST544', '2UST533', '2UST512'),
('asra.masrat@somaiya.edu', 5, '2020-21', '1924004', '2020/04/13 22:07:29', 0, 8, '2UST512', '2UST542', '2UST541', '2UST544', '2UST511', '2UST532', '2UST543', '2UST513'),
('atharva.dave@somaiya.edu', 5, '2020-21', '1814072', '2020/04/14 11:28:42', 0, 8, '2UST541', '2UST544', '2UST513', '2UST543', '2UST533', 'same as pref 2', '2UST511', '2UST524'),
('atharva.humar@somaiya.edu', 5, '2020-21', '1815021', '2020/04/15 12:37:52', 0, 8, '2UST543', '2UST513', '2UST531', '2UST553', '2UST514', 'same as pref 1', '2UST524', '2UST542'),
('atharva.kitkaru@somaiya.edu', 5, '2020-21', '1814033', '2020/04/15 20:33:52', 0, 8, '2UST512', '2UST541', '2UST531', '2UST543', '2UST532', '2UST544', '2UST533', '2UST521'),
('atharva.mp@somaiya.edu', 5, '2020-21', '1815050', '2020/04/13 15:27:40', 0, 8, '2UST553', '2UST551', '2UST521', '2UST532', '2UST561', '2UST541', '2UST533', 'same as pref 4'),
('atharva.parkar@somaiya.edu', 5, '2020-21', '1812100', '2020/04/15 11:56:57', 0, 8, '2UST524', '2UST531', '2UST543', '2UST522', '2UST513', '2UST533', '2UST523', 'same as pref 2'),
('atharva.sangle@somaiya.edu', 5, '2020-21', '1813114', '2020/04/14 20:14:52', 0, 8, '2UST512', '2UST514', '2UST532', '2UST513', '2UST553', 'same as pref 2', '2UST561', '2UST551'),
('atharva.sm@somaiya.edu', 5, '2020-21', '1925008', '2020/04/15 20:19:20', 0, 8, '2UST551', '2UST514', '2UST553', '2UST521', '2UST531', '2UST541', '2UST542', '2UST522'),
('atharva.vibhute@somaiya.edu', 5, '2020-21', '1813019', '2020/04/15 7:40:56', 0, 8, '2UST511', '2UST553', '2UST563', '2UST552', '2UST531', 'same as pref 5', '2UST521', '2UST534'),
('avanish.batkulia@somaiya.edu', 5, '2020-21', '1815068', '2020/04/14 20:17:56', 0, 8, '2UST512', '2UST543', '2UST541', '2UST524', '2UST511', 'same as pref 1', '2UST542', '2UST544'),
('avinash.ks@somaiya.edu', 5, '2020-21', '1814113', '2020/04/14 23:06:03', 0, 8, '2UST512', '2UST511', '2UST543', '2UST524', '2UST531', '2UST563', '2UST534', '2UST532'),
('avinash.nair@somaiya.edu', 5, '2020-21', '1815022', '2020/04/13 14:43:47', 0, 8, '2UST553', '2UST551', '2UST543', '2UST513', '2UST511', 'same as pref 3', '2UST544', '2UST561'),
('ayush.choudhary@somaiya.edu', 5, '2020-21', '1815007', '2020/04/15 12:22:56', 0, 8, '2UST562', '2UST553', '2UST543', '2UST563', '2UST561', 'same as pref 5', '2UST533', 'same as pref 4'),
('ayush.khade@somaiya.edu', 5, '2020-21', '1811087', '2020/04/14 11:52:59', 0, 8, '2UST531', '2UST512', '2UST541', '2UST532', '2UST513', 'same as pref 5', '2UST524', 'same as pref 1'),
('ayush.parmar@somaiya.edu', 5, '2020-21', '1813036', '2020/04/15 18:58:49', 0, 8, '2UST514', '2UST531', '2UST532', '2UST533', '2UST512', '2UST551', '2UST552', '2UST544'),
('ayush.ranjan@somaiya.edu', 5, '2020-21', '1815051', '2020/04/15 23:11:17', 0, 8, '2UST512', '2UST511', '2UST543', '2UST513', '2UST531', 'same as pref 3', 'same as pref 2', 'same as pref 5'),
('b.jhaveri@somaiya.edu', 5, '2020-21', '1925001', '2020/04/14 19:00:49', 0, 8, '2UST563', '2UST562', '2UST551', '2UST534', '2UST532', '2UST533', '2UST511', 'same as pref 5'),
('b.poonawala@somaiya.edu', 5, '2020-21', '1812072', '2020/04/15 20:16:58', 0, 8, '2UST524', '2UST534', '2UST553', '2UST543', '2UST561', '2UST531', 'same as pref 1', 'same as pref 4'),
('babita.r@somaiya.edu', 5, '2020-21', '1813090', '2020/04/15 23:29:50', 0, 8, '2UST531', '2UST513', '2UST532', '2UST511', '2UST512', '2UST544', '2UST533', 'same as pref 5'),
('bharat.choithani@somaiya.edu', 5, '2020-21', '1814011', '2020/04/13 18:58:05', 0, 8, '2UST512', '2UST542', '2UST513', '2UST511', '2UST543', '2UST541', '2UST534', '2UST524'),
('bhargavi.koli@somaiya.edu', 5, '2020-21', '1922007', '2020/04/13 22:15:51', 0, 8, '2UST543', '2UST521', '2UST563', '2UST524', '2UST551', '2UST533', '2UST523', '2UST544'),
('bharvi.a@somaiya.edu', 5, '2020-21', '1812064', '2020/04/14 15:25:25', 0, 8, '2UST534', '2UST543', '2UST522', '2UST521', '2UST513', '2UST531', '2UST542', 'same as pref 5'),
('bhavik.bhatt@somaiya.edu', 5, '2020-21', '1814007', '2020/04/13 14:48:21', 0, 8, '2UST512', '2UST544', '2UST511', '2UST541', '2UST531', '2UST524', '2UST532', '2UST542'),
('bhavik.dhimar@somaiya.edu', 5, '2020-21', '1813072', '2020/04/13 16:14:27', 0, 8, '2UST543', '2UST531', '2UST532', '2UST542', '2UST524', '2UST541', 'same as pref 3', 'same as pref 4'),
('bhavin.jp@somaiya.edu', 5, '2020-21', '1925010', '2020/04/15 17:45:06', 0, 8, '2UST563', '2UST544', '2UST542', '2UST551', '2UST553', '2UST541', '2UST532', '2UST513'),
('bhavya.doshi1@somaiya.edu', 5, '2020-21', '1815075', '2020/04/15 15:02:08', 0, 8, '2UST553', '2UST543', '2UST551', '2UST514', '2UST561', '2UST524', '2UST531', '2UST534'),
('bhavya.mv@somaiya.edu', 5, '2020-21', '1813125', '2020/04/15 16:51:12', 0, 8, '2UST543', '2UST553', '2UST533', '2UST531', '2UST551', '2UST513', 'same as pref 1', '2UST542'),
('bhavya.sangoi@somaiya.edu', 5, '2020-21', '1925009', '2020/04/15 21:56:39', 0, 8, '2UST563', '2UST553', '2UST551', '2UST544', '2UST543', '2UST561', '2UST524', 'same as pref 5'),
('bhikshiv.j@somaiya.edu', 5, '2020-21', '1813021', '2020/04/15 22:37:21', 0, 8, '2UST531', '2UST533', '2UST512', '2UST514', '2UST542', '2UST541', 'same as pref 1', '2UST543'),
('bhushan.pawaskar@somaiya.edu', 5, '2020-21', '1815047', '2020/04/15 12:52:58', 0, 8, '2UST531', '2UST514', '2UST521', '2UST553', '2UST533', '2UST532', '2UST513', '2UST541'),
('bhuvnesh.s@somaiya.edu', 5, '2020-21', '1811057', '2020/04/15 9:22:01', 0, 8, '2UST531', '2UST543', '2UST544', '2UST533', '2UST532', '2UST511', 'same as pref 2', '2UST563'),
('bishandeep.a@somaiya.edu', 5, '2020-21', '1811100', '2020/04/13 15:22:01', 0, 8, '2UST512', '2UST543', '2UST544', '2UST511', '2UST541', '2UST531', '2UST533', '2UST551'),
('bushra.a@somaiya.edu', 5, '2020-21', '1813003', '2020/04/15 23:45:54', 0, 8, '2UST543', '2UST532', '2UST531', '2UST514', '2UST533', 'same as pref 5', '2UST513', '2UST541'),
('c.phadtare@somaiya.edu', 5, '2020-21', '1812047', '2020/04/14 22:41:49', 0, 8, '2UST513', '2UST511', '2UST514', '2UST522', '2UST563', '2UST532', '2UST543', '2UST533'),
('chaitanya.bane@somaiya.edu', 5, '2020-21', '1815138', '2020/04/13 23:22:03', 0, 8, '2UST553', '2UST524', '2UST551', '2UST561', '2UST521', '2UST542', '2UST541', '2UST543'),
('charmee.m@somaiya.edu', 5, '2020-21', '1924003', '2020/04/13 17:38:13', 0, 8, '2UST532', '2UST512', '2UST531', '2UST544', '2UST511', '2UST533', 'same as pref 5', '2UST542'),
('chaturvedi.a@somaiya.edu', 5, '2020-21', '1811009', '2020/04/14 23:27:07', 0, 8, '2UST543', '2UST522', '2UST512', '2UST513', '2UST561', '2UST542', '2UST551', '2UST553'),
('chetan.dinesh@somaiya.edu', 5, '2020-21', '1925012', '2020/04/13 20:13:28', 0, 8, '2UST551', '2UST553', '2UST521', '2UST563', '2UST561', 'same as pref 2', '2UST531', 'same as pref 4'),
('chintan.jagad@somaiya.edu', 5, '2020-21', '1924001', '2020/04/15 16:28:09', 0, 8, '2UST541', '2UST542', '2UST543', '2UST533', '2UST532', 'same as pref 5', '2UST513', 'same as pref 2'),
('chintan.modi@somaiya.edu', 5, '2020-21', '1811025', '2020/04/15 20:39:06', 0, 8, '2UST512', '2UST541', '2UST532', '2UST513', '2UST542', '2UST524', 'same as pref 5', '2UST511'),
('chirag.jain1@somaiya.edu', 5, '2020-21', '1813082', '2020/04/13 15:25:04', 0, 8, '2UST531', '2UST532', '2UST533', '2UST514', '2UST524', '2UST541', 'same as pref 2', '2UST542'),
('chirag.jhawar@somaiya.edu', 5, '2020-21', '1814085', '2020/04/13 16:22:13', 0, 8, '2UST531', '2UST512', '2UST513', '2UST541', '2UST543', '2UST532', 'same as pref 3', 'same as pref 5'),
('chiranjivi.c@somaiya.edu', 5, '2020-21', '1815005', '2020/04/14 17:49:46', 0, 8, '2UST553', '2UST543', '2UST513', '2UST533', '2UST532', '2UST544', '2UST542', '2UST541'),
('daidipya.s@somaiya.edu', 5, '2020-21', '1813056', '2020/04/15 21:10:47', 0, 8, '2UST514', '2UST543', '2UST552', '2UST553', '2UST532', 'same as pref 5', '2UST531', 'same as pref 2'),
('danil.george@somaiya.edu', 5, '2020-21', '1812014', '2020/04/15 23:10:52', 0, 8, '2UST534', '2UST543', '2UST551', '2UST522', '2UST563', '2UST524', '2UST514', '2UST541'),
('darsh.parmar@somaiya.edu', 5, '2020-21', '1812111', '2020/04/13 15:49:02', 0, 8, '2UST522', 'same as pref 1', '2UST543', '2UST552', 'same as pref 1', '2UST532', '2UST541', '2UST542'),
('darshan.as@somaiya.edu', 5, '2020-21', '1813049', '2020/04/15 17:47:07', 0, 8, '2UST512', '2UST531', '2UST543', '2UST511', '2UST514', '2UST522', 'same as pref 3', 'same as pref 5'),
('darshan.kalwani@somaiya.edu', 5, '2020-21', '1814029', '2020/04/13 15:00:23', 0, 8, '2UST531', '2UST532', '2UST512', '2UST513', '2UST511', 'same as pref 3', 'same as pref 2', '2UST524'),
('darshan.sapariya@somaiya.edu', 5, '2020-21', '1813115', '2020/04/14 20:15:06', 0, 8, '2UST531', '2UST533', '2UST524', '2UST532', '2UST543', '2UST514', '2UST561', '2UST551'),
('darshan.ss@somaiya.edu', 5, '2020-21', '1814109', '2020/04/14 12:03:13', 0, 8, '2UST511', '2UST512', '2UST541', '2UST513', '2UST543', '2UST522', '2UST534', 'same as pref 4'),
('darshit.thakkar@somaiya.edu', 5, '2020-21', '1813122', '2020/04/13 14:47:47', 0, 8, '2UST543', '2UST514', '2UST532', '2UST533', 'same as pref 1', '2UST541', '2UST544', '2UST542'),
('debdatta.k@somaiya.edu', 5, '2020-21', '1811092', '2020/04/13 21:49:22', 0, 8, '2UST531', '2UST524', '2UST532', '2UST512', '2UST511', '2UST543', '2UST542', 'same as pref 4'),
('deep.rs@somaiya.edu', 5, '2020-21', '1815116', '2020/04/15 17:12:09', 0, 8, '2UST514', '2UST531', '2UST543', '2UST542', '2UST512', '2UST532', '2UST524', '2UST551'),
('deep.shah5@somaiya.edu', 5, '2020-21', '1814110', '2020/04/14 20:58:49', 0, 8, '2UST512', '2UST541', '2UST542', '2UST511', '2UST543', 'same as pref 2', 'same as pref 1', '2UST533'),
('deep08@somaiya.edu', 5, '2020-21', '1815011', '2020/04/15 15:35:50', 0, 8, '2UST543', '2UST553', '2UST551', '2UST514', '2UST513', 'same as pref 5', '2UST524', '2UST531'),
('deepa.kumari@somaiya.edu', 5, '2020-21', '1814019', '2020/04/13 22:08:09', 0, 8, '2UST512', '2UST542', '2UST541', '2UST544', '2UST511', 'same as pref 5', '2UST543', '2UST531'),
('deepanshu.v@somaiya.edu', 5, '2020-21', '1921005', '2020/04/13 18:05:21', 0, 8, '2UST531', '2UST541', '2UST512', '2UST543', '2UST524', '2UST544', 'same as pref 4', '2UST511'),
('dev.de@somaiya.edu', 5, '2020-21', '1814013', '2020/04/15 18:34:01', 0, 8, '2UST512', '2UST511', '2UST524', '2UST531', '2UST513', '2UST532', '2UST534', '2UST522'),
('dev.ss@somaiya.edu', 5, '2020-21', '1814016', '2020/04/13 15:04:33', 0, 8, '2UST513', '2UST531', '2UST512', '2UST524', '2UST553', '2UST521', '2UST514', 'same as pref 1'),
('dev.vora@somaiya.edu', 5, '2020-21', '1814120', '2020/04/13 19:52:34', 0, 8, '2UST512', '2UST541', '2UST543', '2UST511', '2UST524', '2UST532', '2UST544', 'same as pref 5'),
('devansh.cs@somaiya.edu', 5, '2020-21', '1815117', '2020/04/13 16:03:08', 0, 8, '2UST551', '2UST553', '2UST561', '2UST513', '2UST534', '2UST512', '2UST522', '2UST541'),
('devansh.ds@somaiya.edu', 5, '2020-21', '1811111', '2020/04/13 14:54:49', 0, 8, '2UST543', '2UST513', '2UST512', '2UST531', '2UST533', '2UST522', '2UST541', 'same as pref 5'),
('devansh.sanghavi@somaiya.edu', 5, '2020-21', '1811062', '2020/04/15 22:41:00', 0, 8, '2UST512', '2UST513', '2UST543', '2UST532', '2UST524', '2UST544', '2UST511', '2UST531'),
('dhairya.kataria@somaiya.edu', 5, '2020-21', '1813091', '2020/04/15 18:30:09', 0, 8, '2UST543', '2UST514', '2UST531', '2UST524', '2UST532', '2UST534', '2UST533', '2UST562'),
('dhairya.oza@somaiya.edu', 5, '2020-21', '1814043', '2020/04/15 22:36:40', 0, 8, '2UST543', '2UST512', '2UST561', '2UST553', '2UST531', '2UST511', '2UST522', '2UST532'),
('dhairya.u@somaiya.edu', 5, '2020-21', '1814063', '2020/04/13 16:18:09', 0, 8, '2UST512', '2UST511', '2UST513', '2UST542', '2UST543', '2UST532', 'same as pref 2', '2UST524'),
('dhairya12@somaiya.edu', 5, '2020-21', '1814053', '2020/04/13 14:44:37', 0, 8, '2UST512', '2UST541', '2UST543', '2UST544', '2UST542', '2UST513', '2UST531', '2UST534'),
('dharm.shah@somaiya.edu', 5, '2020-21', '1815052', '2020/04/15 13:06:16', 0, 8, '2UST553', '2UST551', '2UST543', '2UST563', '2UST514', '2UST542', '2UST513', '2UST544'),
('dharmesh.chawda@somaiya.edu', 5, '2020-21', '1814069', '2020/04/13 19:50:38', 0, 8, '2UST512', '2UST541', '2UST542', '2UST532', '2UST524', '2UST513', '2UST544', 'same as pref 7'),
('dharmil17@somaiya.edu', 5, '2020-21', '1922011', '2020/04/15 17:17:32', 0, 8, '2UST521', '2UST552', '2UST563', '2UST551', '2UST553', 'same as pref 5', 'same as pref 2', '2UST561'),
('dheeraj.jain@somaiya.edu', 5, '2020-21', '1815084', '2020/04/13 21:25:07', 0, 8, '2UST553', '2UST563', '2UST551', '2UST543', '2UST521', '2UST544', '2UST562', 'same as pref 1'),
('dhiraj.jeswani@somaiya.edu', 5, '2020-21', '1815087', '2020/04/13 21:38:33', 0, 8, '2UST553', '2UST563', '2UST551', '2UST562', '2UST514', '2UST541', '2UST522', '2UST511'),
('dhruman.g@somaiya.edu', 5, '2020-21', '1815019', '2020/04/13 14:44:17', 0, 8, '2UST553', '2UST551', '2UST563', '2UST534', '2UST513', '2UST543', '2UST524', '2UST514'),
('dhruv.bid@somaiya.edu', 5, '2020-21', '1813005', '2020/04/15 21:35:32', 0, 8, '2UST543', '2UST512', '2UST514', '2UST532', '2UST522', '2UST541', 'same as pref 4', '2UST513'),
('dhruv.cb@somaiya.edu', 5, '2020-21', '1812067', '2020/04/15 23:46:29', 0, 8, '2UST553', '2UST524', '2UST551', '2UST552', '2UST511', '2UST512', 'same as pref 5', '2UST563'),
('dhruv.doshi@somaiya.edu', 5, '2020-21', '1814002', '2020/04/14 14:42:34', 0, 8, '2UST512', '2UST511', '2UST544', '2UST542', '2UST541', '2UST524', '2UST533', '2UST531'),
('dhruv.lj@somaiya.edu', 5, '2020-21', '1815024', '2020/04/15 11:51:56', 0, 8, '2UST553', '2UST534', '2UST543', '2UST514', '2UST521', '2UST561', '2UST563', 'same as pref 5'),
('dhruv.rg@somaiya.edu', 5, '2020-21', '1922013', '2020/04/15 20:15:30', 0, 8, '2UST514', '2UST532', '2UST513', '2UST533', '2UST524', '2UST552', '2UST563', '2UST551'),
('dhruva.panchal@somaiya.edu', 5, '2020-21', '1922015', '2020/04/15 12:00:04', 0, 8, '2UST521', '2UST534', '2UST551', '2UST522', '2UST524', '2UST531', 'same as pref 4', 'same as pref 2'),
('dhundiraj.j@somaiya.edu', 5, '2020-21', '1814027', '2020/04/15 16:30:09', 0, 8, '2UST512', '2UST531', '2UST543', '2UST561', '2UST524', '2UST511', 'same as pref 1', '2UST513'),
('dhvanit.b@somaiya.edu', 5, '2020-21', '1813017', '2020/04/13 15:35:12', 0, 8, '2UST543', '2UST512', '2UST531', '2UST533', '2UST514', 'same as pref 3', 'same as pref 4', '2UST534'),
('divya.raul@somaiya.edu', 5, '2020-21', '1812051', '2020/04/13 14:47:23', 0, 8, '2UST514', '2UST532', '2UST522', '2UST534', '2UST524', '2UST513', '2UST531', 'same as pref 4'),
('divya.rr@somaiya.edu', 5, '2020-21', '1814102', '2020/04/13 19:50:10', 0, 8, '2UST531', '2UST543', '2UST513', '2UST542', '2UST512', 'same as pref 2', '2UST544', 'same as pref 1'),
('divyansh.singh@somaiya.edu', 5, '2020-21', '1813059', '2020/04/15 23:39:36', 0, 8, '2UST543', '2UST514', '2UST524', '2UST553', '2UST552', '2UST531', '2UST533', '2UST532'),
('dixshant.s@somaiya.edu', 5, '2020-21', '1712119', '2020/04/13 20:47:18', 0, 8, '2UST561', '2UST563', '2UST562', '2UST541', '2UST551', '2UST531', '2UST542', '2UST524'),
('durva.raikar@somaiya.edu', 5, '2020-21', '1812084', '2020/04/13 15:13:44', 0, 8, '2UST543', '2UST553', '2UST514', '2UST551', '2UST533', '2UST541', '2UST532', '2UST542'),
('e.bhinderwala@somaiya.edu', 5, '2020-21', '1812071', '2020/04/16 00:29:06', 0, 8, '2UST512', '2UST513', '2UST532', '2UST533', '2UST541', '2UST543', '2UST522', '2UST531'),
('esha.gupta@somaiya.edu', 5, '2020-21', '1814025', '2020/04/13 23:45:57', 0, 8, '2UST512', '2UST541', '2UST543', '2UST542', '2UST513', '2UST511', '2UST533', '2UST532'),
('esha.ponda@somaiya.edu', 5, '2020-21', '1813062', '2020/04/15 16:35:36', 0, 8, '2UST514', '2UST524', '2UST561', '2UST531', '2UST541', '2UST563', '2UST544', 'same as pref 4'),
('esha.vats@somaiya.edu', 5, '2020-21', '1814118', '2020/04/13 15:46:02', 0, 8, '2UST512', '2UST541', '2UST542', '2UST511', '2UST544', 'same as pref 3', '2UST532', '2UST513'),
('eshaan.singh@somaiya.edu', 5, '2020-21', '1815127', '2020/04/15 17:13:13', 0, 8, '2UST514', '2UST543', '2UST534', '2UST553', '2UST513', 'same as pref 3', '2UST522', 'same as pref 5'),
('eshan.sharma@somaiya.edu', 5, '2020-21', '1815120', '2020/04/14 23:36:53', 0, 8, '2UST512', '2UST543', '2UST541', '2UST524', '2UST511', '2UST542', 'same as pref 4', '2UST553'),
('fahim.h@somaiya.edu', 5, '2020-21', '1815020', '2020/04/14 20:03:33', 0, 8, '2UST561', '2UST563', '2UST551', '2UST553', '2UST533', '2UST513', '2UST543', '2UST514'),
('falguni.kumud@somaiya.edu', 5, '2020-21', '1812086', '2020/04/14 15:23:48', 0, 8, '2UST534', '2UST543', '2UST522', '2UST521', '2UST532', '2UST524', 'same as pref 5', '2UST531'),
('fenny.keniya@somaiya.edu', 5, '2020-21', '1813051', '2020/04/15 23:20:12', 0, 8, '2UST543', '2UST514', '2UST531', '2UST512', '2UST511', 'same as pref 3', 'same as pref 5', '2UST542'),
('foram.makadia@somaiya.edu', 5, '2020-21', '1813100', '2020/04/13 16:44:57', 0, 8, '2UST543', '2UST561', '2UST534', '2UST531', '2UST511', '2UST514', '2UST524', 'same as pref 1'),
('g.mahindrakar@somaiya.edu', 5, '2020-21', '1812024', '2020/04/15 23:46:56', 0, 8, '2UST543', '2UST522', '2UST534', '2UST513', '2UST514', '2UST512', '2UST511', '2UST563'),
('gada.d@somaiya.edu', 5, '2020-21', '1814076', '2020/04/13 19:58:09', 0, 8, '2UST512', '2UST541', '2UST543', '2UST511', '2UST542', '2UST551', '2UST514', 'same as pref 4'),
('gandhar.j@somaiya.edu', 5, '2020-21', '1813087', '2020/04/14 20:02:10', 0, 8, '2UST543', '2UST553', '2UST534', '2UST563', '2UST562', '2UST561', 'same as pref 4', 'same as pref 5'),
('gandhi.ps@somaiya.edu', 5, '2020-21', '1815079', '2020/04/13 15:55:46', 0, 8, '2UST543', '2UST514', '2UST532', '2UST511', 'same as pref 4', '2UST531', 'same as pref 6', '2UST512'),
('gaurang.patil@somaiya.edu', 5, '2020-21', '1814046', '2020/04/14 18:40:06', 0, 8, '2UST532', '2UST531', '2UST543', '2UST524', '2UST541', '2UST534', 'same as pref 3', '2UST514'),
('gaurang.thakker@somaiya.edu', 5, '2020-21', '1921010', '2020/04/13 14:41:43', 0, 8, '2UST512', '2UST544', '2UST542', '2UST541', '2UST511', '2UST534', '2UST563', '2UST514'),
('gaurav.dighe@somaiya.edu', 5, '2020-21', '1922010', '2020/04/15 21:38:47', 0, 8, '2UST553', 'same as pref 1', 'same as pref 1', '2UST521', '2UST552', '2UST533', '2UST524', '2UST534'),
('gaurav.khatwani@somaiya.edu', 5, '2020-21', '1811090', '2020/04/15 20:51:48', 0, 8, '2UST512', '2UST531', '2UST513', '2UST543', '2UST541', 'same as pref 2', '2UST552', '2UST551'),
('gopalkrishna.w@somaiya.edu', 5, '2020-21', '1814062', '2020/04/13 15:00:45', 0, 8, '2UST541', '2UST542', '2UST531', '2UST544', '2UST543', '2UST533', 'same as pref 1', '2UST511'),
('gunj.goda@somaiya.edu', 5, '2020-21', '1813018', '2020/04/15 14:43:15', 0, 8, '2UST543', '2UST522', '2UST532', '2UST512', '2UST514', '2UST544', '2UST513', '2UST542'),
('gurpreet.n@somaiya.edu', 5, '2020-21', '1813097', '2020/04/15 14:15:54', 0, 8, '2UST543', '2UST531', '2UST514', '2UST524', '2UST532', 'same as pref 2', 'same as pref 3', 'same as pref 3'),
('h.talele@somaiya.edu', 5, '2020-21', '1921002', '2020/04/13 15:49:08', 0, 8, '2UST531', '2UST512', '2UST511', '2UST543', '2UST533', '2UST522', '2UST551', 'same as pref 1'),
('hansi.s@somaiya.edu', 5, '2020-21', '1811108', '2020/04/15 22:55:32', 0, 8, '2UST512', '2UST513', '2UST531', '2UST541', '2UST532', '2UST561', 'same as pref 2', 'same as pref 5'),
('hardik.asher@somaiya.edu', 5, '2020-21', '1811002', '2020/04/15 22:41:30', 0, 8, '2UST512', '2UST543', '2UST542', '2UST524', '2UST541', '2UST511', '2UST533', '2UST513'),
('hardika.gawde@somaiya.edu', 5, '2020-21', '1924005', '2020/04/14 13:10:22', 0, 8, '2UST512', '2UST542', '2UST541', '2UST511', '2UST544', '2UST513', '2UST524', '2UST514'),
('harsh.bm@somaiya.edu', 5, '2020-21', '1814091', '2020/04/13 14:49:58', 0, 8, '2UST512', '2UST542', '2UST541', '2UST544', '2UST513', '2UST514', '2UST561', '2UST563'),
('harsh.sachala@somaiya.edu', 5, '2020-21', '1814105', '2020/04/13 15:11:18', 0, 8, '2UST513', '2UST522', '2UST512', '2UST544', '2UST531', '2UST543', '2UST532', '2UST521'),
('harshal.pathak@somaiya.edu', 5, '2020-21', '1813110', '2020/04/13 15:58:58', 0, 8, '2UST531', '2UST512', '2UST514', '2UST511', '2UST533', '2UST524', '2UST541', '2UST542'),
('harshid.b@somaiya.edu', 5, '2020-21', '1812012', '2020/04/15 18:20:04', 0, 8, '2UST534', '2UST543', '2UST511', '2UST551', '2UST522', 'same as pref 3', '2UST532', '2UST533'),
('harshit.raval@somaiya.edu', 5, '2020-21', '1815110', '2020/04/14 20:43:29', 0, 8, '2UST553', '2UST551', '2UST563', '2UST513', '2UST534', '2UST524', '2UST512', '2UST511'),
('hasti.ds@somaiya.edu', 5, '2020-21', '1811043', '2020/04/14 23:06:44', 0, 8, '2UST512', '2UST543', '2UST531', '2UST544', '2UST541', '2UST532', '2UST542', '2UST551'),
('heena.kasali@somaiya.edu', 5, '2020-21', '1921003', '2020/04/13 21:04:46', 0, 8, '2UST512', '2UST511', '2UST531', '2UST533', '2UST543', '2UST524', '2UST521', '2UST542'),
('heeral.gawade@somaiya.edu', 5, '2020-21', '1923011', '2020/04/15 22:30:39', 0, 8, '2UST543', '2UST531', '2UST522', '2UST563', '2UST524', '2UST513', 'same as pref 2', 'same as pref 1'),
('heet.dedhia@somaiya.edu', 5, '2020-21', '1814014', '2020/04/18 18:59:15', 0, 8, '2UST543', '2UST513', '2UST541', '2UST531', '2UST511', '2UST514', '2UST512', '2UST521'),
('heet.mv@somaiya.edu', 5, '2020-21', '1924007', '2020/04/15 16:19:20', 0, 8, '2UST512', '2UST543', '2UST513', '2UST511', '2UST541', '2UST542', '2UST532', '2UST533'),
('het.k@somaiya.edu', 5, '2020-21', '1812036', '2020/04/15 16:47:28', 0, 8, '2UST513', '2UST511', '2UST512', '2UST522', '2UST514', '2UST532', '2UST563', '2UST531'),
('hetvi.kothari@somaiya.edu', 5, '2020-21', '1811091', '2020/04/15 15:50:28', 0, 8, '2UST512', '2UST511', '2UST542', '2UST543', '2UST513', '2UST563', '2UST562', 'same as pref 4'),
('hiket.vira@somaiya.edu', 5, '2020-21', '1815065', '2020/04/14 23:06:16', 0, 8, '2UST553', '2UST543', '2UST524', '2UST551', '2UST561', '2UST542', '2UST532', '2UST511'),
('himali.saini@somaiya.edu', 5, '2020-21', '1811107', '2020/04/15 15:07:39', 0, 8, '2UST512', '2UST511', '2UST542', '2UST543', '2UST544', '2UST513', 'same as pref 3', '2UST532'),
('himanshi.cb@somaiya.edu', 5, '2020-21', '1814057', '2020/04/15 17:23:52', 0, 8, '2UST543', '2UST512', '2UST524', '2UST561', '2UST532', '2UST521', '2UST513', '2UST551'),
('hiral.lineswala@somaiya.edu', 5, '2020-21', '1923001', '2020/04/13 16:37:00', 0, 8, '2UST543', '2UST514', '2UST531', '2UST544', '2UST513', 'same as pref 1', '2UST533', '2UST534'),
('hiral.sheth@somaiya.edu', 5, '2020-21', '1811054', '2020/04/14 20:39:25', 0, 8, '2UST512', '2UST531', '2UST532', '2UST511', '2UST543', 'same as pref 1', '2UST561', '2UST514'),
('hiren23@somaiya.edu', 5, '2020-21', '1815132', '2020/04/13 15:28:11', 0, 8, '2UST551', '2UST531', '2UST514', '2UST524', '2UST553', 'same as pref 3', '2UST543', '2UST513'),
('hitarth.doshi@somaiya.edu', 5, '2020-21', '1922017', '2020/04/16 13:42:05', 0, 8, '2UST552', '2UST551', '2UST553', '2UST521', '2UST522', 'same as pref 3', '2UST514', '2UST563'),
('hriday.jani@somaiya.edu', 5, '2020-21', '1812016', '2020/04/15 22:29:22', 0, 8, '2UST534', '2UST543', '2UST551', '2UST522', '2UST563', '2UST542', '2UST544', '2UST531'),
('hrithik.p@somaiya.edu', 5, '2020-21', '1815044', '2020/04/15 18:30:27', 0, 8, '2UST553', '2UST551', '2UST543', '2UST563', '2UST561', 'same as pref 3', '2UST544', '2UST514'),
('hrithik.pandit@somaiya.edu', 5, '2020-21', '1815106', '2020/04/14 23:27:54', 0, 8, '2UST512', '2UST543', '2UST541', '2UST511', '2UST514', 'same as pref 1', '2UST542', '2UST522'),
('hrp1@somaiya.edu', 5, '2020-21', '1812095', '2020/04/13 18:03:34', 0, 8, '2UST514', '2UST543', '2UST531', '2UST532', '2UST524', '2UST513', '2UST542', '2UST544'),
('hrp2@somaiya.edu', 5, '2020-21', '1813033', '2020/04/13 15:18:36', 0, 8, '2UST514', '2UST551', '2UST543', '2UST533', '2UST524', '2UST534', '2UST542', '2UST541'),
('hsb3@somaiya.edu', 5, '2020-21', '1812090', '2020/04/15 19:50:04', 0, 8, '2UST552', '2UST553', '2UST531', '2UST534', '2UST562', '2UST561', '2UST521', '2UST563'),
('hss2@somaiya.edu', 5, '2020-21', '1815053', '2020/04/13 14:51:07', 0, 8, '2UST543', '2UST533', '2UST553', '2UST551', '2UST534', 'same as pref 1', '2UST544', 'same as pref 7'),
('idrees.b@somaiya.edu', 5, '2020-21', '1811004', '2020/04/13 15:28:52', 0, 8, '2UST533', '2UST544', '2UST543', '2UST524', '2UST512', 'same as pref 3', '2UST523', '2UST561'),
('isha.chinerkar@somaiya.edu', 5, '2020-21', '1813079', '2020/04/14 19:10:57', 0, 8, '2UST512', '2UST543', '2UST541', '2UST524', '2UST511', '2UST532', '2UST531', '2UST542'),
('isha.joglekar@somaiya.edu', 5, '2020-21', '1924009', '2020/04/15 16:19:24', 0, 8, '2UST512', '2UST543', '2UST513', '2UST511', '2UST541', '2UST561', '2UST553', '2UST521'),
('ishan.patil@somaiya.edu', 5, '2020-21', '1812102', '2020/04/15 4:19:17', 0, 8, '2UST552', '2UST553', '2UST563', '2UST513', '2UST534', '2UST542', '2UST532', '2UST533'),
('ishan.shinde@somaiya.edu', 5, '2020-21', '1815125', '2020/04/15 4:12:05', 0, 8, '2UST553', '2UST543', '2UST551', '2UST534', '2UST524', '2UST552', 'same as pref 2', '2UST513'),
('j.gohil@somaiya.edu', 5, '2020-21', '1815142', '2020/04/15 12:58:37', 0, 8, '2UST543', '2UST553', '2UST514', '2UST542', '2UST524', '2UST522', '2UST533', '2UST563'),
('j.parab@somaiya.edu', 5, '2020-21', '1812097', '2020/04/13 20:24:14', 0, 8, '2UST523', '2UST551', '2UST522', '2UST513', '2UST524', '2UST544', '2UST533', 'same as pref 4'),
('jai.agarwal@somaiya.edu', 5, '2020-21', '1812017', '2020/04/15 19:05:07', 0, 8, '2UST534', '2UST543', '2UST551', '2UST522', '2UST563', '2UST544', '2UST541', '2UST542'),
('jai.mehta@somaiya.edu', 5, '2020-21', '1814036', '2020/04/14 19:51:31', 0, 8, '2UST512', '2UST541', '2UST543', '2UST511', '2UST531', 'same as pref 5', '2UST513', 'same as pref 4'),
('jaiman.shah@somaiya.edu', 5, '2020-21', '1815054', '2020/04/13 21:27:29', 0, 8, '2UST553', '2UST551', '2UST513', '2UST534', '2UST511', '2UST544', '2UST541', 'same as pref 5'),
('jaimeen.u@somaiya.edu', 5, '2020-21', '1814077', '2020/04/14 23:50:31', 0, 8, '2UST512', '2UST513', '2UST543', '2UST541', '2UST542', '2UST533', 'same as pref 4', 'same as pref 3'),
('jainam.gogree@somaiya.edu', 5, '2020-21', '1812021', '2020/04/25 11:49:10', 0, 8, '2UST511', '2UST512', '2UST531', '2UST543', '2UST521', '2UST513', '2UST551', '2UST534'),
('jainam.tm@somaiya.edu', 5, '2020-21', '1814008', '2020/04/14 22:16:35', 0, 8, '2UST543', '2UST512', '2UST542', '2UST541', '2UST531', '2UST513', 'same as pref 3', 'same as pref 4'),
('jainam.z@somaiya.edu', 5, '2020-21', '1814123', '2020/04/13 19:46:08', 0, 8, '2UST512', '2UST511', '2UST541', '2UST513', '2UST524', 'same as pref 5', '2UST521', '2UST543'),
('jainam02@somaiya.edu', 5, '2020-21', '1811085', '2020/04/13 23:57:06', 0, 8, '2UST512', '2UST513', '2UST531', '2UST542', '2UST541', '2UST511', '2UST533', '2UST532'),
('jainum.s@somaiya.edu', 5, '2020-21', '1814051', '2020/04/14 19:51:34', 0, 8, '2UST543', '2UST524', '2UST541', '2UST512', '2UST532', 'same as pref 2', '2UST521', '2UST531'),
('jaival.singh@somaiya.edu', 5, '2020-21', '1815128', '2020/04/15 18:36:46', 0, 8, '2UST514', '2UST551', '2UST543', '2UST512', '2UST553', '2UST532', '2UST524', '2UST531'),
('jas.p@somaiya.edu', 5, '2020-21', '1813041', '2020/04/15 23:45:40', 0, 8, '2UST514', '2UST543', '2UST511', '2UST551', '2UST553', '2UST524', '2UST541', '2UST513'),
('jash.jm@somaiya.edu', 5, '2020-21', '1814126', '2020/04/13 15:37:10', 0, 8, '2UST512', '2UST511', '2UST541', '2UST544', '2UST513', '2UST524', 'same as pref 4', '2UST543'),
('jash.js@somaiya.edu', 5, '2020-21', '1811082', '2020/04/15 20:04:18', 0, 8, '2UST512', '2UST524', '2UST531', '2UST532', '2UST511', 'same as pref 2', '2UST533', 'same as pref 4'),
('jash12@somaiya.edu', 5, '2020-21', '1814054', '2020/04/14 17:48:50', 0, 8, '2UST512', '2UST511', '2UST543', '2UST513', '2UST531', 'same as pref 3', 'same as pref 3', 'same as pref 5'),
('jash28@somaiya.edu', 5, '2020-21', '1922016', '2020/04/16 13:29:43', 0, 8, '2UST521', '2UST533', '2UST523', '2UST551', '2UST512', '2UST553', '2UST514', '2UST513'),
('jay.ingle@somaiya.edu', 5, '2020-21', '1922004', '2020/04/15 21:20:27', 0, 8, '2UST511', '2UST551', '2UST553', '2UST533', 'same as pref 2', '2UST552', '2UST534', '2UST522'),
('jay.khatri@somaiya.edu', 5, '2020-21', '1814087', '2020/04/13 16:29:35', 0, 8, '2UST512', '2UST542', '2UST543', '2UST541', '2UST511', 'same as pref 3', '2UST533', '2UST544'),
('jay.pd@somaiya.edu', 5, '2020-21', '1815076', '2020/04/20 19:19:05', 0, 8, '2UST553', '2UST551', '2UST563', '2UST513', '2UST544', '2UST522', '2UST534', 'same as pref 3'),
('jay12@somaiya.edu', 5, '2020-21', '1813117', '2020/04/15 19:01:35', 0, 8, '2UST543', '2UST553', '2UST512', '2UST522', '2UST511', '2UST561', 'same as pref 2', '2UST552'),
('jayant.yadav@somaiya.edu', 5, '2020-21', '1815135', '2020/04/15 23:53:16', 0, 8, '2UST553', '2UST543', '2UST551', '2UST534', '2UST524', '2UST511', '2UST512', 'same as pref 3'),
('jaykumar.mp@somaiya.edu', 5, '2020-21', '1814044', '2020/04/13 18:14:30', 0, 8, '2UST524', '2UST512', '2UST542', '2UST541', '2UST531', '2UST514', '2UST532', 'same as pref 2'),
('jeel16@somaiya.edu', 5, '2020-21', '1921012', '2020/04/25 11:49:10', 0, 8, '2UST512', '2UST524', '2UST531', '2UST522', '2UST523', '2UST533', '2UST532', '2UST543'),
('jenil.gosar@somaiya.edu', 5, '2020-21', '1813078', '2020/04/13 14:47:05', 0, 8, '2UST543', '2UST531', '2UST534', '2UST532', '2UST522', '2UST541', '2UST511', '2UST551'),
('jibitesh.s@somaiya.edu', 5, '2020-21', '1812053', '2020/04/13 16:42:53', 0, 8, '2UST561', '2UST524', '2UST531', '2UST514', '2UST532', '2UST512', '2UST522', 'same as pref 2'),
('jigar.pj@somaiya.edu', 5, '2020-21', '1811018', '2020/04/15 1:10:10', 0, 8, '2UST543', '2UST531', '2UST511', '2UST512', '2UST541', 'same as pref 1', '2UST563', '2UST513'),
('jigyassa.l@somaiya.edu', 5, '2020-21', '1811020', '2020/04/13 16:04:48', 0, 8, '2UST513', '2UST512', '2UST543', '2UST531', '2UST532', 'same as pref 4', '2UST541', 'same as pref 5'),
('jil.ap@somaiya.edu', 5, '2020-21', '1812046', '2020/04/23 11:49:10', 0, 8, '2UST553', '2UST514', '2UST524', '2UST512', '2UST552', 'same as pref 1', 'same as pref 2', 'same as pref 3'),
('jill25@somaiya.edu', 5, '2020-21', '1814055', '2020/04/13 14:45:50', 0, 8, '2UST512', '2UST513', '2UST541', '2UST544', '2UST531', 'same as pref 2', '2UST511', '2UST532'),
('jinay.gada@somaiya.edu', 5, '2020-21', '1811021', '2020/04/15 22:34:46', 0, 8, '2UST512', '2UST544', '2UST543', '2UST541', '2UST533', 'same as pref 2', 'same as pref 3', 'same as pref 5'),
('jjj@somaiya.edu', 5, '2020-21', '1813022', '2020/04/15 15:17:49', 0, 8, '2UST514', '2UST543', '2UST531', '2UST513', '2UST532', '2UST542', '2UST541', 'same as pref 2'),
('jjs1@somaiya.edu', 5, '2020-21', '1811112', '2020/04/13 15:04:12', 0, 8, '2UST512', '2UST513', '2UST531', '2UST524', '2UST511', '2UST544', 'same as pref 5', '2UST541'),
('joel.thomas@somaiya.edu', 5, '2020-21', '1815133', '2020/04/13 15:27:35', 0, 8, '2UST551', '2UST553', '2UST563', '2UST562', '2UST561', '2UST514', '2UST534', 'same as pref 3'),
('joseph.k@somaiya.edu', 5, '2020-21', '1815029', '2020/04/15 22:24:43', 0, 8, '2UST561', '2UST562', '2UST563', '2UST553', '2UST551', '2UST533', '2UST543', '2UST513'),
('jps1@somaiya.edu', 5, '2020-21', '1815055', '2020/04/13 20:35:35', 0, 8, '2UST531', '2UST514', '2UST532', '2UST553', '2UST551', 'same as pref 3', '2UST543', '2UST513'),
('jubin.kamdar@somaiya.edu', 5, '2020-21', '1924011', '2020/04/13 15:42:21', 0, 8, '2UST512', '2UST541', '2UST542', '2UST511', '2UST532', '2UST513', '2UST543', '2UST524'),
('jugal.dc@somaiya.edu', 5, '2020-21', '1811071', '2020/04/15 15:59:26', 0, 8, '2UST512', '2UST531', '2UST511', '2UST524', '2UST543', '2UST513', '2UST553', 'same as pref 5'),
('junaidali.s@somaiya.edu', 5, '2020-21', '1815064', '2020/04/13 15:36:31', 0, 8, '2UST553', '2UST514', '2UST543', '2UST551', '2UST562', '2UST542', 'same as pref 3', '2UST532'),
('k.deshpande@somaiya.edu', 5, '2020-21', '1815014', '2020/04/13 17:05:08', 0, 8, '2UST553', '2UST563', '2UST561', '2UST534', '2UST551', 'same as pref 4', 'same as pref 2', '2UST533'),
('k.jaishankar@somaiya.edu', 5, '2020-21', '1811061', '2020/04/17 13:07:10', 0, 8, '2UST511', '2UST531', '2UST524', '2UST512', '2UST543', '2UST542', '2UST534', 'same as pref 5'),
('k.satyanarayana@somaiya.edu', 5, '2020-21', '1812118', '2020/04/14 19:39:18', 0, 8, '2UST532', '2UST513', '2UST534', '2UST551', '2UST553', '2UST531', '2UST533', '2UST512'),
('k.ved@somaiya.edu', 5, '2020-21', '1813105', '2020/04/14 19:11:01', 0, 8, '2UST512', '2UST543', '2UST541', '2UST524', '2UST511', 'same as pref 2', '2UST553', '2UST514'),
('kadam.ms@somaiya.edu', 5, '2020-21', '1814001', '2020/04/13 15:06:09', 0, 8, '2UST543', '2UST513', '2UST531', '2UST524', '2UST511', '2UST551', 'same as pref 4', '2UST533'),
('kaitav.p@somaiya.edu', 5, '2020-21', '1812099', '2020/04/13 17:54:27', 0, 8, '2UST553', '2UST552', '2UST551', '2UST534', '2UST522', '2UST513', '2UST511', '2UST512'),
('kanksha.p@somaiya.edu', 5, '2020-21', '1811104', '2020/04/14 21:17:03', 0, 8, '2UST531', '2UST543', '2UST511', '2UST512', '2UST513', 'same as pref 2', 'same as pref 5', '2UST534'),
('karan.gp@somaiya.edu', 5, '2020-21', '1814096', '2020/04/13 15:12:42', 0, 8, '2UST524', '2UST531', '2UST543', '2UST513', '2UST523', '2UST541', '2UST532', '2UST542'),
('karan.nd@somaiya.edu', 5, '2020-21', '1815074', '2020/04/15 11:04:52', 0, 8, '2UST514', '2UST543', '2UST551', '2UST513', '2UST531', '2UST523', '2UST552', '2UST524'),
('karan19@somaiya.edu', 5, '2020-21', '1812054', '2020/04/13 16:03:09', 0, 8, '2UST544', '2UST514', '2UST521', '2UST513', '2UST523', '2UST543', 'same as pref 4', '2UST541'),
('kartik.ladwa@somaiya.edu', 5, '2020-21', '1923008', '2020/04/15 13:28:47', 0, 8, '2UST543', '2UST532', '2UST522', 'same as pref 2', '2UST551', '2UST524', '2UST521', 'same as pref 5'),
('kaushal.patil@somaiya.edu', 5, '2020-21', '1813038', '2020/04/13 14:47:01', 0, 8, '2UST543', '2UST531', '2UST533', '2UST513', '2UST514', '2UST544', 'same as pref 3', '2UST551'),
('kaushik.metha@somaiya.edu', 5, '2020-21', '1811094', '2020/04/13 14:54:12', 0, 8, '2UST524', '2UST531', '2UST543', '2UST513', '2UST532', 'same as pref 3', '2UST541', '2UST562'),
('kaushik.naganath@somaiya.edu', 5, '2020-21', '1812085', '2020/04/13 21:20:58', 0, 8, '2UST513', '2UST534', '2UST563', '2UST523', '2UST522', '2UST531', '2UST542', 'same as pref 1'),
('kavish.bs@somaiya.edu', 5, '2020-21', '1812055', '2020/04/14 18:30:40', 0, 8, '2UST522', '2UST553', '2UST551', '2UST563', '2UST521', '2UST542', '2UST512', '2UST544'),
('kedar.pednekar@somaiya.edu', 5, '2020-21', '1925007', '2020/04/14 18:53:47', 0, 8, '2UST553', '2UST551', '2UST521', '2UST561', '2UST563', '2UST543', 'same as pref 1', '2UST514'),
('keval.dk@somaiya.edu', 5, '2020-21', '1814031', '2020/04/15 16:17:32', 0, 8, '2UST512', '2UST543', '2UST531', '2UST561', '2UST522', '2UST513', '2UST524', '2UST552'),
('keval.rajpara@somaiya.edu', 5, '2020-21', '1812050', '2020/04/14 21:28:19', 0, 8, '2UST543', '2UST514', '2UST532', '2UST524', '2UST523', '2UST513', '2UST533', 'same as pref 5'),
('kevin26@somaiya.edu', 5, '2020-21', '1811044', '2020/04/15 00:22:10', 0, 8, '2UST543', '2UST544', '2UST512', '2UST522', '2UST533', '2UST551', '2UST561', '2UST542'),
('khatri.m@somaiya.edu', 5, '2020-21', '1814032', '2020/04/15 20:35:55', 0, 8, '2UST512', '2UST511', '2UST532', '2UST543', '2UST513', 'same as pref 4', 'same as pref 2', '2UST524'),
('khushi.cs@somaiya.edu', 5, '2020-21', '1815098', '2020/04/14 20:01:27', 0, 8, '2UST553', '2UST513', '2UST514', '2UST561', '2UST551', '2UST552', 'same as pref 4', 'same as pref 5'),
('khushil.shah@somaiya.edu', 5, '2020-21', '1924008', '2020/04/14 22:43:49', 0, 8, '2UST512', '2UST513', '2UST511', '2UST541', '2UST542', 'same as pref 3', '2UST543', '2UST521');
INSERT INTO `student_preference_audit` (`email_id`, `sem`, `year`, `rollno`, `timestamp`, `allocate_status`, `no_of_valid_preferences`, `pref1`, `pref2`, `pref3`, `pref4`, `pref5`, `pref6`, `pref7`, `pref8`) VALUES
('kiran.gaykar@somaiya.edu', 5, '2020-21', '1924012', '2020/04/14 12:42:44', 0, 8, '2UST512', '2UST544', '2UST542', '2UST511', '2UST541', '2UST514', '2UST524', '2UST553'),
('kmb2@somaiya.edu', 5, '2020-21', '1811005', '2020/04/15 22:29:17', 0, 8, '2UST532', '2UST524', '2UST531', '2UST561', '2UST544', 'same as pref 3', '2UST553', '2UST511'),
('krish.chheda@somaiya.edu', 5, '2020-21', '1923007', '2020/04/14 23:04:33', 0, 8, '2UST514', '2UST511', '2UST512', '2UST553', '2UST552', '2UST513', 'same as pref 5', '2UST534'),
('krish.parekh@somaiya.edu', 5, '2020-21', '1811031', '2020/04/13 15:33:05', 0, 8, '2UST513', '2UST524', '2UST531', '2UST512', '2UST542', '2UST533', '2UST551', '2UST544'),
('krisha.bm@somaiya.edu', 5, '2020-21', '1814108', '2020/04/15 19:49:12', 0, 8, '2UST512', '2UST541', '2UST542', '2UST511', '2UST513', '2UST543', '2UST522', '2UST551'),
('krisha.panchamia@somaiya.edu', 5, '2020-21', '1811102', '2020/04/15 20:18:23', 0, 8, '2UST512', '2UST513', '2UST511', '2UST532', '2UST541', '2UST531', '2UST524', '2UST543'),
('krishna.bhuva@somaiya.edu', 5, '2020-21', '1925003', '2020/04/15 10:05:44', 0, 8, '2UST553', '2UST563', '2UST551', '2UST562', '2UST543', '2UST524', '2UST531', '2UST521'),
('krishna.sahani@somaiya.edu', 5, '2020-21', '1814106', '2020/04/14 23:19:55', 0, 8, '2UST512', '2UST513', '2UST524', '2UST531', '2UST543', 'same as pref 4', '2UST533', 'same as pref 3'),
('krunal.dattani@somaiya.edu', 5, '2020-21', '1814071', '2020/04/15 18:44:17', 0, 8, '2UST512', '2UST531', '2UST513', '2UST541', '2UST543', '2UST522', 'same as pref 3', 'same as pref 5'),
('krutik.c@somaiya.edu', 5, '2020-21', '1815006', '2020/04/15 10:06:27', 0, 8, '2UST553', '2UST562', '2UST551', '2UST543', '2UST514', '2UST512', '2UST511', '2UST513'),
('kshitij.prabhu@somaiya.edu', 5, '2020-21', '1814101', '2020/04/13 15:12:58', 0, 8, '2UST524', '2UST531', '2UST543', '2UST513', '2UST512', '2UST522', '2UST534', 'same as pref 1'),
('kulkarni.sr@somaiya.edu', 5, '2020-21', '1814129', '2020/04/13 23:05:23', 0, 8, '2UST512', '2UST541', '2UST543', '2UST531', '2UST532', '2UST542', 'same as pref 5', '2UST513'),
('kunal.khandait@somaiya.edu', 5, '2020-21', '1815092', '2020/04/14 22:31:46', 0, 8, '2UST543', '2UST531', '2UST551', '2UST553', '2UST524', '2UST533', 'same as pref 3', 'same as pref 4'),
('kunal.sr@somaiya.edu', 5, '2020-21', '1811036', '2020/04/15 20:39:21', 0, 8, '2UST512', '2UST541', '2UST532', '2UST513', '2UST524', 'same as pref 5', '2UST543', '2UST552'),
('kunj.gala@somaiya.edu', 5, '2020-21', '1814021', '2020/04/13 22:54:37', 0, 8, '2UST512', '2UST541', '2UST511', '2UST532', '2UST531', '2UST563', '2UST513', '2UST561'),
('kushal.ds@somaiya.edu', 5, '2020-21', '1815118', '2020/04/15 19:25:56', 0, 8, '2UST551', '2UST514', '2UST553', '2UST561', '2UST513', '2UST512', '2UST541', 'same as pref 1'),
('kushal.sg@somaiya.edu', 5, '2020-21', '1812025', '2020/04/13 14:58:21', 0, 8, '2UST552', '2UST543', '2UST534', '2UST563', '2UST562', '2UST542', '2UST511', '2UST524'),
('labdhi.jain@somaiya.edu', 5, '2020-21', '1814015', '2020/04/14 14:42:34', 0, 8, '2UST512', '2UST511', '2UST544', '2UST542', '2UST541', '2UST543', '2UST532', '2UST513'),
('lakshya.jain@somaiya.edu', 5, '2020-21', '1812082', '2020/04/15 10:11:32', 0, 8, '2UST513', '2UST553', '2UST514', '2UST523', '2UST531', '2UST512', '2UST511', '2UST524'),
('leesa.dharod@somaiya.edu', 5, '2020-21', '1814075', '2020/04/13 21:36:22', 0, 8, '2UST531', '2UST512', '2UST524', '2UST532', '2UST542', '2UST544', '2UST511', '2UST513'),
('m.baru@somaiya.edu', 5, '2020-21', '1814005', '2020/04/13 19:52:20', 0, 8, '2UST512', 'same as pref 1', '2UST511', 'same as pref 3', '2UST513', '2UST542', '2UST532', '2UST544'),
('m.merchant@somaiya.edu', 5, '2020-21', '1812049', '2020/04/16 14:32:58', 0, 8, '2UST552', '2UST551', '2UST563', '2UST553', '2UST521', 'same as pref 5', '2UST511', 'same as pref 7'),
('m.nabeel@somaiya.edu', 5, '2020-21', '1815039', '2020/04/14 17:00:49', 0, 8, '2UST553', 'same as pref 1', 'same as pref 1', '2UST551', 'same as pref 4', '2UST561', '2UST514', '2UST563'),
('m.shegaonkar@somaiya.edu', 5, '2020-21', '1813120', '2020/04/13 14:53:54', 0, 8, '2UST531', '2UST532', '2UST512', '2UST524', '2UST543', '2UST533', 'same as pref 3', '2UST541'),
('maaheynoor.s@somaiya.edu', 5, '2020-21', '1811110', '2020/04/13 22:15:39', 0, 8, '2UST512', '2UST541', '2UST524', '2UST513', '2UST542', '2UST523', '2UST562', '2UST522'),
('madhura.i@somaiya.edu', 5, '2020-21', '1812026', '2020/04/15 15:15:53', 0, 8, '2UST543', '2UST533', '2UST553', '2UST512', '2UST531', 'same as pref 4', '2UST511', '2UST534'),
('makwana.d@somaiya.edu', 5, '2020-21', '1815091', '2020/04/14 17:15:59', 0, 8, '2UST553', '2UST551', '2UST563', '2UST521', '2UST561', 'same as pref 5', '2UST531', '2UST522'),
('manan30@somaiya.edu', 5, '2020-21', '1813050', '2020/04/15 18:10:33', 0, 8, '2UST543', '2UST512', '2UST514', '2UST531', '2UST541', '2UST562', '2UST533', '2UST521'),
('manas.gandhi@somaiya.edu', 5, '2020-21', '1811076', '2020/04/14 20:49:47', 0, 8, '2UST513', '2UST541', '2UST522', '2UST542', '2UST531', 'same as pref 4', '2UST561', '2UST514'),
('manas.pange@somaiya.edu', 5, '2020-21', '1922022', '2020/04/15 22:56:28', 0, 8, '2UST534', '2UST551', '2UST512', '2UST524', '2UST521', '2UST544', '2UST513', 'same as pref 3'),
('manas.thakker@somaiya.edu', 5, '2020-21', '1814092', '2020/04/13 16:11:03', 0, 8, '2UST512', '2UST542', '2UST543', '2UST541', '2UST511', '2UST532', 'same as pref 2', 'same as pref 4'),
('manasi.nair@somaiya.edu', 5, '2020-21', '1812087', '2020/04/15 22:22:07', 0, 8, '2UST524', '2UST543', '2UST514', '2UST544', '2UST561', '2UST531', '2UST553', '2UST511'),
('manav.hirey@somaiya.edu', 5, '2020-21', '1814082', '2020/04/13 15:14:59', 0, 8, '2UST524', '2UST531', '2UST512', '2UST513', '2UST543', 'same as pref 1', 'same as pref 3', 'same as pref 5'),
('manav.malavia@somaiya.edu', 5, '2020-21', '1814088', '2020/04/13 15:15:49', 0, 8, '2UST524', '2UST531', '2UST512', '2UST513', '2UST543', 'same as pref 4', '2UST561', '2UST521'),
('manav.punjabi@somaiya.edu', 5, '2020-21', '1814049', '2020/04/14 22:31:34', 0, 8, '2UST511', '2UST512', '2UST531', '2UST524', '2UST543', '2UST514', '2UST534', '2UST561'),
('manik.p@somaiya.edu', 5, '2020-21', '1813032', '2020/04/15 21:33:01', 0, 8, '2UST512', '2UST543', '2UST541', '2UST524', '2UST511', '2UST544', '2UST522', '2UST513'),
('manish.parihar@somaiya.edu', 5, '2020-21', '1814097', '2020/04/15 22:29:29', 0, 8, '2UST512', '2UST524', '2UST543', '2UST513', '2UST541', '2UST534', '2UST514', '2UST553'),
('mann.daga@somaiya.edu', 5, '2020-21', '1815008', '2020/04/15 12:21:31', 0, 8, '2UST553', '2UST551', '2UST563', '2UST543', '2UST534', '2UST524', '2UST561', '2UST531'),
('manthan.dave@somaiya.edu', 5, '2020-21', '1813118', '2020/04/15 16:49:37', 0, 8, '2UST543', '2UST553', '2UST533', '2UST522', '2UST534', '2UST514', '2UST552', '2UST563'),
('maru.jn@somaiya.edu', 5, '2020-21', '1814089', '2020/04/15 22:55:19', 0, 8, '2UST513', '2UST512', '2UST543', '2UST541', '2UST544', '2UST524', '2UST511', '2UST542'),
('mayank.chowdhary@somaiya.edu', 5, '2020-21', '1811010', '2020/04/15 23:31:50', 0, 8, '2UST531', '2UST543', '2UST542', '2UST532', '2UST541', '2UST522', '2UST513', '2UST523'),
('mayank.latke@somaiya.edu', 5, '2020-21', '1812040', '2020/04/15 13:05:34', 0, 8, '2UST511', '2UST543', '2UST551', '2UST522', '2UST553', '2UST562', '2UST524', '2UST531'),
('mayur.pawase@somaiya.edu', 5, '2020-21', '1815046', '2020/04/14 13:06:31', 0, 8, '2UST553', '2UST513', '2UST551', '2UST543', '2UST511', 'same as pref 4', '2UST532', 'same as pref 2'),
('meet.panchal1@somaiya.edu', 5, '2020-21', '1921009', '2020/04/13 15:27:51', 0, 8, '2UST512', '2UST542', '2UST543', '2UST544', '2UST531', '2UST532', '2UST563', '2UST561'),
('meet10@somaiya.edu', 5, '2020-21', '1812078', '2020/04/15 21:09:49', 0, 8, '2UST511', '2UST512', '2UST514', '2UST533', '2UST543', '2UST524', '2UST531', 'same as pref 2'),
('meghashyam.p@somaiya.edu', 5, '2020-21', '1812045', '2020/04/15 11:13:02', 0, 8, '2UST532', '2UST544', '2UST513', '2UST553', '2UST512', '2UST531', '2UST524', '2UST522'),
('mehta.da@somaiya.edu', 5, '2020-21', '1811023', '2020/04/14 19:10:11', 0, 8, '2UST531', '2UST544', '2UST543', '2UST541', '2UST524', '2UST532', 'same as pref 1', '2UST542'),
('mehta.yh@somaiya.edu', 5, '2020-21', '1811024', '2020/04/15 22:09:54', 0, 8, '2UST531', '2UST541', '2UST543', '2UST532', '2UST544', '2UST513', '2UST511', '2UST553'),
('mehul.bharda@somaiya.edu', 5, '2020-21', '1812011', '2020/04/14 00:09:59', 0, 8, '2UST524', '2UST511', 'same as pref 1', '2UST543', 'same as pref 4', 'same as pref 1', '2UST533', '2UST542'),
('mehul.nd@somaiya.edu', 5, '2020-21', '1815077', '2020/04/14 17:29:18', 0, 8, '2UST543', '2UST563', '2UST553', '2UST551', '2UST561', '2UST562', '2UST544', '2UST542'),
('mihir.dholakia@somaiya.edu', 5, '2020-21', '1811074', '2020/04/15 18:54:56', 0, 8, '2UST512', '2UST524', '2UST531', '2UST513', '2UST511', 'same as pref 5', '2UST543', 'same as pref 2'),
('mihir.jadhav@somaiya.edu', 5, '2020-21', '1921001', '2020/04/15 2:23:49', 0, 8, '2UST512', '2UST532', '2UST541', '2UST534', '2UST543', 'same as pref 1', 'same as pref 2', '2UST511'),
('mihir.mehta2@somaiya.edu', 5, '2020-21', '1811093', '2020/04/15 22:30:45', 0, 8, '2UST531', '2UST524', '2UST532', '2UST543', '2UST512', '2UST533', '2UST511', '2UST534'),
('mihir.w@somaiya.edu', 5, '2020-21', '1815139', '2020/04/15 12:46:44', 0, 8, '2UST543', '2UST513', '2UST553', '2UST562', '2UST551', 'same as pref 2', '2UST544', '2UST542'),
('milind.deshpande@somaiya.edu', 5, '2020-21', '1811029', '2020/04/13 15:07:19', 0, 8, '2UST531', '2UST524', '2UST512', '2UST511', '2UST543', 'same as pref 1', '2UST551', '2UST544'),
('misha.ashar@somaiya.edu', 5, '2020-21', '1813002', '2020/04/15 10:41:51', 0, 8, '2UST543', '2UST512', '2UST532', '2UST531', '2UST524', 'same as pref 4', '2UST534', '2UST533'),
('mistry.yr@somaiya.edu', 5, '2020-21', '1812043', '2020/04/15 23:07:03', 0, 8, '2UST551', '2UST522', '2UST553', '2UST514', '2UST543', '2UST533', 'same as pref 3', '2UST532'),
('mitalee.s@somaiya.edu', 5, '2020-21', '1812105', '2020/04/15 22:22:09', 0, 8, '2UST524', '2UST543', '2UST514', '2UST544', '2UST561', '2UST521', '2UST532', 'same as pref 3'),
('mitali.potnis@somaiya.edu', 5, '2020-21', '1812048', '2020/04/13 15:01:37', 0, 8, '2UST532', '2UST514', '2UST542', '2UST543', '2UST524', '2UST534', 'same as pref 3', '2UST553'),
('mitanshu.g@somaiya.edu', 5, '2020-21', '1924010', '2020/04/13 17:12:05', 0, 8, '2UST531', '2UST524', '2UST543', '2UST533', '2UST512', 'same as pref 2', '2UST541', '2UST542'),
('mitva.bhagat@somaiya.edu', 5, '2020-21', '1812008', '2020/04/13 22:26:41', 0, 8, '2UST543', '2UST534', '2UST522', '2UST513', '2UST514', 'same as pref 2', '2UST531', 'same as pref 4'),
('mohammedammar.m@somaiya.edu', 5, '2020-21', '1924006', '2020/04/13 20:44:23', 0, 8, '2UST512', '2UST542', '2UST541', '2UST544', '2UST511', 'same as pref 2', '2UST552', '2UST531'),
('mohini.pp@somaiya.edu', 5, '2020-21', '1814124', '2020/04/14 21:42:32', 0, 8, '2UST512', '2UST513', '2UST531', '2UST532', '2UST541', '2UST562', 'same as pref 6', '2UST551'),
('munib.m@somaiya.edu', 5, '2020-21', '1815034', '2020/04/14 16:59:47', 0, 8, '2UST553', '2UST551', '2UST563', '2UST562', '2UST561', 'same as pref 1', 'same as pref 1', 'same as pref 1'),
('murali.singh@somaiya.edu', 5, '2020-21', '1813131', '2020/04/15 16:03:16', 0, 8, '2UST512', '2UST514', '2UST532', '2UST544', '2UST533', '2UST561', '2UST521', '2UST563'),
('muskaan.n@somaiya.edu', 5, '2020-21', '1814020', '2020/04/13 14:48:23', 0, 8, '2UST512', '2UST544', '2UST511', '2UST541', '2UST531', '2UST533', '2UST514', 'same as pref 2'),
('n.namboodiri@somaiya.edu', 5, '2020-21', '1811126', '2020/04/13 23:28:58', 0, 8, '2UST531', '2UST512', '2UST524', '2UST532', '2UST513', '2UST541', '2UST542', '2UST544'),
('n.pal@somaiya.edu', 5, '2020-21', '1811101', '2020/04/13 16:01:20', 0, 8, '2UST512', '2UST531', '2UST513', '2UST532', '2UST543', 'same as pref 5', '2UST524', '2UST511'),
('nachiket.moghe@somaiya.edu', 5, '2020-21', '1814039', '2020/04/13 17:26:52', 0, 8, '2UST512', '2UST531', '2UST513', '2UST543', '2UST541', 'same as pref 5', '2UST524', 'same as pref 4'),
('nadir.sayani@somaiya.edu', 5, '2020-21', '1813047', '2020/04/14 13:33:07', 0, 8, '2UST512', '2UST543', '2UST514', '2UST532', '2UST511', '2UST531', '2UST542', '2UST524'),
('nakul.c@somaiya.edu', 5, '2020-21', '1813068', '2020/04/13 14:48:01', 0, 8, '2UST531', '2UST524', '2UST514', '2UST543', '2UST512', 'same as pref 2', '2UST532', '2UST542'),
('naman.as@somaiya.edu', 5, '2020-21', '1811113', '2020/04/13 15:35:30', 0, 8, '2UST541', '2UST543', '2UST513', '2UST512', '2UST544', '2UST521', '2UST561', '2UST524'),
('namrit.sheth@somaiya.edu', 5, '2020-21', '1812112', '2020/04/15 16:16:59', 0, 8, '2UST524', '2UST514', '2UST532', '2UST512', '2UST541', '2UST513', 'same as pref 1', '2UST552'),
('nandini.dey@somaiya.edu', 5, '2020-21', '1813071', '2020/04/13 14:52:36', 0, 8, '2UST531', '2UST514', '2UST532', '2UST533', '2UST543', '2UST562', '2UST524', 'same as pref 5'),
('nandini.mahto@somaiya.edu', 5, '2020-21', '1813073', '2020/04/15 20:55:36', 0, 8, '2UST533', '2UST514', '2UST553', '2UST543', '2UST522', '2UST511', '2UST512', 'same as pref 5'),
('nandita.kadam@somaiya.edu', 5, '2020-21', '1811084', '2020/04/15 22:04:45', 0, 8, '2UST511', '2UST512', '2UST513', '2UST542', '2UST524', 'same as pref 5', '2UST521', '2UST563'),
('narayan.nagwani@somaiya.edu', 5, '2020-21', '1815099', '2020/04/13 22:43:11', 0, 8, '2UST551', '2UST561', '2UST562', '2UST563', '2UST553', '2UST513', '2UST543', '2UST533'),
('navneet.p@somaiya.edu', 5, '2020-21', '1813035', '2020/04/14 20:17:32', 0, 8, '2UST514', '2UST511', '2UST513', '2UST532', '2UST524', 'same as pref 4', '2UST531', '2UST542'),
('neel.desai@somaiya.edu', 5, '2020-21', '1923010', '2020/04/15 00:11:56', 0, 8, '2UST543', '2UST514', '2UST532', '2UST531', '2UST544', '2UST512', '2UST522', '2UST521'),
('neel.gami@somaiya.edu', 5, '2020-21', '1815078', '2020/04/13 16:19:03', 0, 8, '2UST543', '2UST534', '2UST562', '2UST551', '2UST563', '2UST513', '2UST532', '2UST544'),
('neelay.j@somaiya.edu', 5, '2020-21', '1814024', '2020/04/13 23:37:47', 0, 8, '2UST543', '2UST512', '2UST511', '2UST522', '2UST513', 'same as pref 3', '2UST544', '2UST532'),
('neer.gada@somaiya.edu', 5, '2020-21', '1815016', '2020/04/13 17:52:46', 0, 8, '2UST553', '2UST543', '2UST514', '2UST524', '2UST551', 'same as pref 2', '2UST522', '2UST563'),
('neeraj.n@somaiya.edu', 5, '2020-21', '1811027', '2020/04/15 11:21:17', 0, 8, '2UST512', '2UST513', '2UST533', '2UST541', '2UST524', 'same as pref 2', '2UST542', '2UST514'),
('neha.mane@somaiya.edu', 5, '2020-21', '1812088', '2020/04/14 14:31:46', 0, 8, '2UST534', '2UST543', '2UST524', '2UST521', '2UST513', '2UST532', '2UST541', '2UST514'),
('nehal.cj@somaiya.edu', 5, '2020-21', '1812027', '2020/04/15 21:22:39', 0, 8, '2UST553', '2UST551', '2UST552', '2UST513', '2UST511', '2UST542', 'same as pref 1', 'same as pref 2'),
('nidhi.jajda@somaiya.edu', 5, '2020-21', '1812028', '2020/04/14 19:45:06', 0, 8, '2UST514', '2UST532', '2UST511', '2UST524', '2UST543', '2UST531', '2UST512', '2UST522'),
('nidhi.n@somaiya.edu', 5, '2020-21', '181028', '2020/04/14 23:25:13', 0, 8, '2UST543', '2UST522', '2UST512', '2UST513', '2UST561', '2UST524', '2UST511', '2UST532'),
('niha.ks@somaiya.edu', 5, '2020-21', '1921006', '2020/04/13 21:04:43', 0, 8, '2UST512', '2UST511', '2UST531', '2UST533', '2UST543', '2UST513', '2UST541', '2UST544'),
('nihar.merchant@somaiya.edu', 5, '2020-21', '1815038', '2020/04/13 15:21:47', 0, 8, '2UST553', '2UST543', '2UST534', '2UST551', '2UST563', 'same as pref 2', '2UST522', 'same as pref 1'),
('nikhil.chaplot@somaiya.edu', 5, '2020-21', '1815069', '2020/04/13 16:35:16', 0, 8, '2UST553', '2UST563', '2UST551', '2UST561', '2UST562', '2UST532', 'same as pref 3', '2UST541'),
('nikhil.jd@somaiya.edu', 5, '2020-21', '1815073', '2020/04/15 11:46:09', 0, 8, '2UST514', '2UST543', '2UST551', '2UST563', '2UST513', '2UST522', '2UST523', 'same as pref 2'),
('nikhil19@somaiya.edu', 5, '2020-21', '1814114', '2020/04/13 15:43:18', 0, 8, '2UST512', '2UST541', '2UST542', '2UST511', '2UST544', '2UST563', '2UST534', '2UST543'),
('nikunj.dg@somaiya.edu', 5, '2020-21', '1813077', '2020/04/15 14:07:33', 0, 8, '2UST531', '2UST512', '2UST511', '2UST541', '2UST524', '2UST534', '2UST532', '2UST533'),
('nilay.j@somaiya.edu', 5, '2020-21', '1815028', '2020/04/13 15:03:12', 0, 8, '2UST553', '2UST551', '2UST563', '2UST562', '2UST561', '2UST542', '2UST541', '2UST543'),
('nilay.sheth@somaiya.edu', 5, '2020-21', '1811121', '2020/04/15 21:18:08', 0, 8, '2UST543', '2UST542', '2UST544', '2UST512', '2UST531', 'same as pref 1', '2UST534', 'same as pref 1'),
('nimish.n@somaiya.edu', 5, '2020-21', '1815109', '2020/04/14 21:26:05', 0, 8, '2UST553', '2UST551', '2UST513', '2UST512', '2UST514', '2UST544', '2UST534', '2UST533'),
('nimish.v@somaiya.edu', 5, '2020-21', '1811060', '2020/04/14 16:08:55', 0, 8, '2UST533', '2UST543', '2UST512', '2UST542', '2UST513', '2UST521', '2UST561', '2UST524'),
('nimisha.chauhan@somaiya.edu', 5, '2020-21', '1922012', '2020/04/14 19:50:53', 0, 8, '2UST511', '2UST563', '2UST513', '2UST522', '2UST534', '2UST543', '2UST523', '2UST542'),
('nimit.dave@somaiya.edu', 5, '2020-21', '1815009', '2020/04/13 14:53:06', 0, 8, '2UST553', '2UST563', '2UST561', '2UST534', '2UST551', '2UST533', '2UST531', '2UST524'),
('ninad.devdas@somaiya.edu', 5, '2020-21', '1923004', '2020/04/14 23:06:03', 0, 8, '2UST522', '2UST551', '2UST553', '2UST543', '2UST531', '2UST533', '2UST532', '2UST513'),
('nirav.reshamwala@somaiya.edu', 5, '2020-21', '1815111', '2020/04/15 21:27:28', 0, 8, '2UST514', '2UST513', '2UST543', '2UST532', '2UST531', 'same as pref 1', '2UST522', 'same as pref 5'),
('nisarg.vaghasiya@somaiya.edu', 5, '2020-21', '1813063', '2020/04/15 18:36:51', 0, 8, '2UST543', '2UST512', '2UST514', '2UST531', '2UST541', 'same as pref 4', '2UST544', 'same as pref 5'),
('nishant.tolia@somaiya.edu', 5, '2020-21', '1815134', '2020/04/14 23:12:25', 0, 8, '2UST514', '2UST543', '2UST563', '2UST553', '2UST524', '2UST512', '2UST511', 'same as pref 5'),
('nishavak.n@somaiya.edu', 5, '2020-21', '1814040', '2020/04/13 14:58:13', 0, 8, '2UST512', '2UST513', '2UST544', '2UST541', '2UST542', '2UST521', '2UST523', '2UST522'),
('nishi20@somaiya.edu', 5, '2020-21', '1811045', '2020/04/14 23:20:56', 0, 8, '2UST512', '2UST543', '2UST531', '2UST544', '2UST541', '2UST524', '2UST511', '2UST532'),
('nishit.rs@somaiya.edu', 5, '2020-21', '1811114', '2020/04/15 10:56:30', 0, 8, '2UST532', '2UST524', '2UST531', '2UST541', '2UST543', 'same as pref 4', '2UST534', 'same as pref 1'),
('nupoor.panchal@somaiya.edu', 5, '2020-21', '1815041', '2020/04/13 16:50:09', 0, 8, '2UST553', '2UST551', '2UST563', '2UST562', '2UST561', 'same as pref 4', '2UST524', '2UST534'),
('ojas.k@somaiya.edu', 5, '2020-21', '1811064', '2020/04/14 17:47:01', 0, 8, '2UST524', '2UST531', '2UST543', '2UST512', '2UST544', 'same as pref 5', '2UST532', '2UST541'),
('ojasvi.naik@somaiya.edu', 5, '2020-21', '1811098', '2020/04/13 15:16:34', 0, 8, '2UST512', '2UST511', '2UST531', '2UST513', '2UST542', 'same as pref 1', 'same as pref 2', '2UST532'),
('om.rawal@somaiya.edu', 5, '2020-21', '1811037', '2020/04/14 16:24:56', 0, 8, '2UST531', '2UST544', '2UST532', '2UST524', '2UST513', '2UST523', 'same as pref 2', 'same as pref 4'),
('onkar.sanap@somaiya.edu', 5, '2020-21', '1814035', '2020/04/15 16:17:36', 0, 8, '2UST512', '2UST543', '2UST531', '2UST561', '2UST522', 'same as pref 2', 'same as pref 5', '2UST511'),
('p.daphal@somaiya.edu', 5, '2020-21', '1813009', '2020/04/13 14:55:32', 0, 8, '2UST512', '2UST531', '2UST514', '2UST524', '2UST533', '2UST521', 'same as pref 3', 'same as pref 4'),
('p.sonkusare@somaiya.edu', 5, '2020-21', '1925006', '2020/04/15 12:09:35', 0, 8, '2UST563', '2UST551', '2UST553', '2UST562', '2UST544', '2UST511', '2UST532', '2UST513'),
('panchal.jj@somaiya.edu', 5, '2020-21', '1815105', '2020/04/14 21:24:28', 0, 8, '2UST553', '2UST563', '2UST551', '2UST521', '2UST544', '2UST543', '2UST511', '2UST524'),
('panchal.jr@somaiya.edu', 5, '2020-21', '1813108', '2020/04/15 15:50:12', 0, 8, '2UST512', '2UST524', '2UST514', '2UST531', '2UST542', '2UST541', 'same as pref 4', '2UST544'),
('pandey.sk@somaiya.edu', 5, '2020-21', '1811030', '2020/04/15 00:19:35', 0, 8, '2UST512', '2UST531', '2UST544', '2UST541', '2UST543', 'same as pref 5', '2UST563', 'same as pref 2'),
('pandya.kp@somaiya.edu', 5, '2020-21', '1813034', '2020/04/15 22:19:33', 0, 8, '2UST543', '2UST512', '2UST532', '2UST514', '2UST522', '2UST531', '2UST553', '2UST511'),
('pankti.n@somaiya.edu', 5, '2020-21', '1814045', '2020/04/14 19:50:20', 0, 8, '2UST512', '2UST541', '2UST543', '2UST511', '2UST531', 'same as pref 3', '2UST523', '2UST542'),
('param.ms@somaiya.edu', 5, '2020-21', '1812056', '2020/04/13 15:57:42', 0, 8, '2UST544', '2UST514', '2UST521', '2UST513', '2UST523', '2UST512', '2UST522', '2UST541'),
('param.shendekar@somaiya.edu', 5, '2020-21', '1814115', '2020/04/13 16:58:21', 0, 8, '2UST512', '2UST541', '2UST544', '2UST543', '2UST542', '2UST562', '2UST513', '2UST533'),
('parav.s@somaiya.edu', 5, '2020-21', '1815126', '2020/04/14 19:35:35', 0, 8, '2UST543', '2UST513', '2UST514', '2UST553', '2UST521', '2UST541', '2UST542', '2UST531'),
('parekh.kn@somaiya.edu', 5, '2020-21', '1921008', '2020/04/13 16:22:27', 0, 8, '2UST512', '2UST544', '2UST542', '2UST541', '2UST511', '2UST531', '2UST533', 'same as pref 4'),
('parshva.ss@somaiya.edu', 5, '2020-21', '1811046', '2020/04/17 1:35:42', 0, 8, '2UST512', '2UST513', '2UST532', '2UST531', '2UST524', '2UST543', 'same as pref 6', 'same as pref 6'),
('parth.gandani@somaiya.edu', 5, '2020-21', '1812020', '2020/04/15 16:24:44', 0, 8, '2UST534', '2UST543', '2UST551', '2UST522', '2UST563', '2UST511', '2UST544', '2UST512'),
('parth.jm@somaiya.edu', 5, '2020-21', '1811066', '2020/04/15 13:49:44', 0, 8, '2UST512', '2UST524', '2UST511', '2UST532', '2UST541', '2UST562', '2UST544', '2UST514'),
('parth.pd@somaiya.edu', 5, '2020-21', '1815010', '2020/04/13 14:55:34', 0, 8, '2UST553', '2UST543', '2UST562', '2UST563', '2UST534', '2UST512', 'same as pref 3', 'same as pref 4'),
('parthiv.vs@somaiya.edu', 5, '2020-21', '1925002', '2020/04/14 19:11:52', 0, 8, '2UST563', '2UST562', '2UST551', '2UST534', '2UST532', '2UST543', 'same as pref 4', '2UST544'),
('parva.b@somaiya.edu', 5, '2020-21', '1814004', '2020/04/14 21:08:24', 0, 8, '2UST512', '2UST513', '2UST541', '2UST543', '2UST542', 'same as pref 4', '2UST532', '2UST523'),
('patel.vr@somaiya.edu', 5, '2020-21', '1813037', '2020/04/15 18:01:44', 0, 8, '2UST543', '2UST512', '2UST514', '2UST531', '2UST511', '2UST524', 'same as pref 5', '2UST544'),
('patil.nv@somaiya.edu', 5, '2020-21', '1814098', '2020/04/14 19:38:31', 0, 8, '2UST524', '2UST543', '2UST544', '2UST512', '2UST513', '2UST561', '2UST514', 'same as pref 1'),
('pavitra.n@somaiya.edu', 5, '2020-21', '1815103', '2020/04/15 22:05:02', 0, 8, '2UST513', '2UST553', '2UST514', '2UST551', '2UST512', '2UST534', '2UST521', '2UST561'),
('piyush.chavda@somaiya.edu', 5, '2020-21', '1814010', '2020/04/13 15:09:43', 0, 8, '2UST512', '2UST544', '2UST543', '2UST511', 'same as pref 4', '2UST532', '2UST524', '2UST513'),
('piyush.pandey@somaiya.edu', 5, '2020-21', '1812096', '2020/04/13 15:15:50', 0, 8, '2UST551', '2UST552', '2UST522', '2UST523', '2UST524', '2UST541', '2UST532', '2UST542'),
('pns1@somaiya.edu', 5, '2020-21', '1811116', '2020/04/13 15:24:04', 0, 8, '2UST531', '2UST521', '2UST513', '2UST523', '2UST552', '2UST543', '2UST512', '2UST551'),
('poorva.kothari@somaiya.edu', 5, '2020-21', '1812037', '2020/04/16 1:14:17', 0, 8, '2UST532', '2UST514', '2UST533', '2UST524', '2UST543', '2UST513', 'same as pref 1', '2UST522'),
('pps6@somaiya.edu', 5, '2020-21', '1811115', '2020/04/13 15:06:14', 0, 8, '2UST531', '2UST532', '2UST511', '2UST544', '2UST543', '2UST552', '2UST522', '2UST562'),
('prabhat.g@somaiya.edu', 5, '2020-21', '1925004', '2020/04/14 22:04:52', 0, 8, '2UST553', '2UST563', '2UST562', '2UST561', '2UST543', '2UST513', '2UST544', 'same as pref 5'),
('pragun.m@somaiya.edu', 5, '2020-21', '1813029', '2020/04/15 23:46:05', 0, 8, '2UST543', '2UST531', '2UST532', '2UST514', '2UST512', '2UST561', '2UST541', '2UST521'),
('praharsh.v@somaiya.edu', 5, '2020-21', '1813124', '2020/04/15 15:50:07', 0, 8, '2UST512', '2UST524', '2UST514', '2UST531', '2UST542', '2UST541', '2UST513', '2UST543'),
('prajwal.bhagat@somaiya.edu', 5, '2020-21', '1813066', '2020/04/13 14:49:13', 0, 8, '2UST543', '2UST531', '2UST534', '2UST522', '2UST532', '2UST511', 'same as pref 2', '2UST524'),
('prajwal.gawde@somaiya.edu', 5, '2020-21', '1813076', '2020/04/15 18:08:37', 0, 8, '2UST514', '2UST543', '2UST512', '2UST532', '2UST531', '2UST513', '2UST541', '2UST524'),
('pranav.ahuja@somaiya.edu', 5, '2020-21', '1811001', '2020/04/14 8:22:24', 0, 8, '2UST512', '2UST541', '2UST542', '2UST543', '2UST544', '2UST524', '2UST531', '2UST513'),
('prasad.borkar@somaiya.edu', 5, '2020-21', '1815004', '2020/04/13 17:00:50', 0, 8, '2UST553', '2UST551', '2UST514', '2UST534', '2UST563', '2UST524', '2UST562', '2UST544'),
('prateek.pandey@somaiya.edu', 5, '2020-21', '1811105', '2020/04/13 15:07:16', 0, 8, '2UST512', '2UST531', '2UST511', '2UST513', '2UST532', '2UST523', 'same as pref 4', '2UST533'),
('prathamesh.kodre@somaiya.edu', 5, '2020-21', '1815032', '2020/04/14 16:15:16', 0, 8, '2UST553', '2UST534', '2UST551', '2UST563', '2UST562', 'same as pref 4', '2UST522', 'same as pref 5'),
('prathamesh.ma@somaiya.edu', 5, '2020-21', '1812070', '2020/04/15 23:25:45', 0, 8, '2UST512', '2UST543', '2UST511', '2UST553', '2UST513', '2UST522', '2UST524', '2UST514'),
('pratik.swali@somaiya.edu', 5, '2020-21', '1923003', '2020/04/15 12:59:19', 0, 8, '2UST543', '2UST513', '2UST531', '2UST552', '2UST534', 'same as pref 1', '2UST533', '2UST551'),
('preet.porwal@somaiya.edu', 5, '2020-21', '1814100', '2020/04/13 15:26:36', 0, 8, '2UST524', '2UST531', '2UST512', '2UST513', '2UST543', '2UST534', 'same as pref 5', '2UST541'),
('prina.gudhka@somaiya.edu', 5, '2020-21', '1814080', '2020/04/14 22:11:58', 0, 8, '2UST512', '2UST513', '2UST531', '2UST524', '2UST543', '2UST561', 'same as pref 4', '2UST544'),
('priyank.ps@somaiya.edu', 5, '2020-21', '1812106', '2020/04/19 16:51:27', 0, 8, '2UST543', '2UST534', '2UST511', '2UST553', '2UST542', '2UST512', 'same as pref 3', 'same as pref 2'),
('priyanuj.b@somaiya.edu', 5, '2020-21', '1813083', '2020/04/13 15:21:45', 0, 8, '2UST524', '2UST514', '2UST543', '2UST512', '2UST531', '2UST562', 'same as pref 1', '2UST513'),
('prutha.patel@somaiya.edu', 5, '2020-21', '1812123', '2020/04/13 15:23:50', 0, 8, '2UST543', '2UST553', '2UST551', '2UST533', '2UST522', '2UST512', 'same as pref 2', '2UST511'),
('pss5@somaiya.edu', 5, '2020-21', '1815115', '2020/04/15 17:41:41', 0, 8, '2UST524', '2UST514', '2UST543', '2UST561', '2UST542', '2UST532', '2UST544', '2UST513'),
('pss6@somaiya.edu', 5, '2020-21', '1815056', '2020/04/15 22:32:01', 0, 8, '2UST543', '2UST551', '2UST553', '2UST563', '2UST561', '2UST511', '2UST513', '2UST524'),
('purav.js@somaiya.edu', 5, '2020-21', '1813119', '2020/04/15 21:13:18', 0, 8, '2UST543', '2UST514', '2UST533', '2UST512', '2UST532', 'same as pref 5', '2UST524', 'same as pref 3'),
('purva.belgamwala@somaiya.edu', 5, '2020-21', '1813065', '2020/04/13 16:44:54', 0, 8, '2UST543', '2UST561', '2UST534', '2UST531', '2UST511', '2UST512', '2UST522', '2UST524'),
('purvi.h@somaiya.edu', 5, '2020-21', '1814023', '2020/04/14 21:50:52', 0, 8, '2UST512', '2UST511', '2UST531', '2UST541', '2UST542', '2UST543', '2UST524', '2UST513'),
('pushti.r@somaiya.edu', 5, '2020-21', '1813044', '2020/04/13 16:04:15', 0, 8, '2UST531', '2UST512', '2UST532', '2UST524', '2UST511', 'same as pref 1', 'same as pref 5', '2UST544'),
('pvs1@somaiya.edu', 5, '2020-21', '1811047', '2020/04/15 00:11:43', 0, 8, '2UST512', '2UST531', '2UST543', '2UST513', '2UST524', '2UST542', 'same as pref 1', 'same as pref 4'),
('rachit.hm@somaiya.edu', 5, '2020-21', '1814037', '2020/04/13 15:38:25', 0, 8, '2UST513', '2UST531', '2UST512', 'same as pref 2', '2UST511', '2UST541', '2UST543', 'same as pref 1'),
('rachit.j@somaiya.edu', 5, '2020-21', '1812031', '2020/04/14 17:28:01', 0, 8, '2UST552', '2UST553', '2UST523', '2UST551', '2UST521', '2UST532', '2UST513', '2UST543'),
('rachit.jain@somaiya.edu', 5, '2020-21', '1815085', '2020/04/15 21:58:21', 0, 8, '2UST553', '2UST563', '2UST551', '2UST514', '2UST513', '2UST531', '2UST522', 'same as pref 1'),
('rachit.singh@somaiya.edu', 5, '2020-21', '1815062', '2020/04/13 17:05:29', 0, 8, '2UST553', '2UST562', '2UST551', '2UST544', '2UST561', '2UST514', '2UST542', '2UST543'),
('raghvendra.s@somaiya.edu', 5, '2020-21', '1813058', '2020/04/16 00:05:11', 0, 8, '2UST512', '2UST543', '2UST532', '2UST531', '2UST534', '2UST522', 'same as pref 1', '2UST552'),
('rahil.js@somaiya.edu', 5, '2020-21', '1812108', '2020/04/13 14:59:43', 0, 8, '2UST543', '2UST522', '2UST552', '2UST551', '2UST541', 'same as pref 1', '2UST513', 'same as pref 4'),
('rahil.kanti@somaiya.edu', 5, '2020-21', '1815089', '2020/04/14 17:15:41', 0, 8, '2UST553', '2UST551', '2UST563', '2UST524', '2UST561', 'same as pref 1', 'same as pref 2', 'same as pref 3'),
('rahil.parikh@somaiya.edu', 5, '2020-21', '1811032', '2020/04/15 19:12:35', 0, 8, '2UST541', '2UST531', '2UST533', '2UST512', '2UST544', '2UST524', 'same as pref 2', '2UST551'),
('raj.sanghani@somaiya.edu', 5, '2020-21', '1813045', '2020/04/15 20:43:28', 0, 8, '2UST514', '2UST532', '2UST531', '2UST512', '2UST541', '2UST533', 'same as pref 5', '2UST513'),
('raj.shah8@somaiya.edu', 5, '2020-21', '1811048', '2020/04/14 21:53:16', 0, 8, '2UST513', '2UST531', '2UST541', '2UST512', '2UST532', 'same as pref 2', '2UST542', '2UST524'),
('raj.thakkar2@somaiya.edu', 5, '2020-21', '1813061', '2020/04/15 18:24:56', 0, 8, '2UST543', '2UST512', '2UST514', '2UST531', '2UST541', '2UST513', 'same as pref 2', '2UST511'),
('rajan.gaul@somaiya.edu', 5, '2020-21', '1811078', '2020/04/14 8:18:31', 0, 8, '2UST541', '2UST531', '2UST532', '2UST513', '2UST533', 'same as pref 4', '2UST524', '2UST511'),
('rajat.c@somaiya.edu', 5, '2020-21', '1814068', '2020/04/15 8:26:30', 0, 8, '2UST531', '2UST541', '2UST542', '2UST524', '2UST512', '2UST543', '2UST562', 'same as pref 6'),
('rajat.shah@somaiya.edu', 5, '2020-21', '1815057', '2020/04/13 14:59:43', 0, 8, '2UST514', '2UST524', '2UST531', '2UST553', '2UST551', 'same as pref 2', '2UST563', '2UST543'),
('rajat.sharma@somaiya.edu', 5, '2020-21', '1811120', '2020/04/13 14:55:04', 0, 8, '2UST512', '2UST513', '2UST524', '2UST531', '2UST532', '2UST511', '2UST543', '2UST544'),
('rajiv.bane@somaiya.edu', 5, '2020-21', '1814083', '2020/04/15 21:11:47', 0, 8, '2UST512', '2UST511', '2UST524', '2UST542', '2UST541', '2UST513', '2UST522', '2UST553'),
('rajneesh.j@somaiya.edu', 5, '2020-21', '1815086', '2020/04/13 19:08:42', 0, 8, '2UST532', '2UST514', '2UST551', '2UST553', '2UST563', 'same as pref 1', '2UST512', '2UST543'),
('ramesh.krishnan@somaiya.edu', 5, '2020-21', '1811063', '2020/04/14 11:55:00', 0, 8, '2UST512', '2UST541', '2UST542', '2UST544', '2UST543', '2UST532', '2UST534', '2UST513'),
('rasika.joshi@somaiya.edu', 5, '2020-21', '1814086', '2020/04/13 15:38:34', 0, 8, '2UST512', '2UST524', '2UST544', '2UST542', '2UST532', '2UST541', '2UST543', '2UST513'),
('rdd@somaiya.edu', 5, '2020-21', '1813074', '2020/04/15 19:56:51', 0, 8, '2UST514', '2UST543', '2UST512', '2UST532', '2UST531', '2UST561', '2UST521', '2UST563'),
('revant.shah@somaiya.edu', 5, '2020-21', '1813052', '2020/04/25 11:49:10', 0, 8, '2UST531', '2UST542', '2UST514', '2UST524', '2UST532', '2UST543', '2UST512', '2UST533'),
('revathi.p@somaiya.edu', 5, '2020-21', '1921011', '2020/04/14 17:28:48', 0, 8, '2UST512', '2UST542', '2UST544', '2UST541', '2UST511', '2UST562', 'same as pref 3', 'same as pref 2'),
('rhea.kamath@somaiya.edu', 5, '2020-21', '1815088', '2020/04/15 15:17:53', 0, 8, '2UST553', '2UST551', '2UST514', '2UST521', '2UST531', 'same as pref 5', '2UST524', '2UST544'),
('rhea23@somaiya.edu', 5, '2020-21', '1813053', '2020/04/13 16:29:21', 0, 8, '2UST543', '2UST531', '2UST534', '2UST563', '2UST522', 'same as pref 2', '2UST513', '2UST532'),
('rhitik.g@somaiya.edu', 5, '2020-21', '1713022', '2020/04/17 22:06:03', 0, 8, '2UST543', 'same as pref 1', '2UST552', 'same as pref 1', 'same as pref 3', '2UST531', '2UST541', '2UST542'),
('rhutuja.t@somaiya.edu', 5, '2020-21', '1814128', '2020/04/13 14:46:21', 0, 8, '2UST512', '2UST541', '2UST543', '2UST544', '2UST542', '2UST524', '2UST522', 'same as pref 1'),
('rhyme.risi@somaiya.edu', 5, '2020-21', '1812103', '2020/04/14 13:03:34', 0, 8, '2UST524', '2UST514', '2UST511', '2UST531', '2UST541', '2UST542', '2UST512', 'same as pref 3'),
('rhythm.js@somaiya.edu', 5, '2020-21', '1815058', '2020/04/13 14:54:25', 0, 8, '2UST553', '2UST513', '2UST514', '2UST524', '2UST533', '2UST511', '2UST544', '2UST532'),
('rishabh.cj@somaiya.edu', 5, '2020-21', '1712018', '2020/04/15 14:19:31', 0, 8, '2UST522', '2UST553', '2UST552', '2UST534', '2UST543', 'same as pref 1', '2UST533', '2UST544'),
('rishabh.jogani@somaiya.edu', 5, '2020-21', '1815026', '2020/04/14 22:52:45', 0, 8, '2UST553', '2UST534', '2UST563', '2UST551', '2UST562', '2UST542', '2UST544', '2UST533'),
('ritik.dhame@somaiya.edu', 5, '2020-21', '1812018', '2020/04/15 17:43:14', 0, 8, '2UST543', '2UST524', '2UST512', '2UST522', '2UST511', '2UST532', '2UST544', '2UST513'),
('ritik.ds@somaiya.edu', 5, '2020-21', '1814050', '2020/04/13 18:21:13', 0, 8, '2UST512', '2UST543', '2UST544', '2UST511', '2UST524', 'same as pref 4', '2UST563', '2UST522'),
('ritik.mody@somaiya.edu', 5, '2020-21', '1811097', '2020/04/13 22:53:48', 0, 8, '2UST531', '2UST524', '2UST512', '2UST541', '2UST544', 'same as pref 2', 'same as pref 5', '2UST543'),
('ritwik.m@somaiya.edu', 5, '2020-21', '1813116', '2020/04/14 23:01:47', 0, 8, '2UST543', '2UST514', '2UST512', '2UST531', '2UST532', '2UST524', '2UST551', 'same as pref 5'),
('riya.joshi@somaiya.edu', 5, '2020-21', '1814028', '2020/04/14 20:38:12', 0, 8, '2UST512', '2UST531', '2UST513', '2UST543', '2UST541', '2UST544', 'same as pref 5', '2UST542'),
('riya.tasgaonkar@somaiya.edu', 5, '2020-21', '1811122', '2020/04/13 23:09:28', 0, 8, '2UST531', '2UST524', '2UST512', '2UST544', '2UST541', '2UST514', '2UST534', '2UST533'),
('rnd1@somaiya.edu', 5, '2020-21', '1811075', '2020/04/15 20:20:58', 0, 8, '2UST533', '2UST544', '2UST512', '2UST524', '2UST531', '2UST511', '2UST513', '2UST521'),
('rohan.shende@somaiya.edu', 5, '2020-21', '1815122', '2020/04/15 15:55:14', 0, 8, '2UST553', '2UST544', '2UST514', '2UST551', '2UST512', '2UST532', '2UST533', '2UST541'),
('rohit.padia@somaiya.edu', 5, '2020-21', '1812052', '2020/04/13 15:12:11', 0, 8, '2UST514', '2UST524', '2UST511', '2UST532', '2UST531', 'same as pref 4', '2UST543', '2UST521'),
('rohit.patil1@somaiya.edu', 5, '2020-21', '1815108', '2020/04/15 17:41:03', 0, 8, '2UST524', '2UST514', '2UST543', '2UST561', '2UST542', '2UST541', '2UST553', '2UST551'),
('rohit.ss@somaiya.edu', 5, '2020-21', '1812083', '2020/04/15 22:40:24', 0, 8, '2UST524', '2UST543', '2UST514', '2UST544', '2UST561', '2UST531', '2UST511', 'same as pref 4'),
('rohit09@somaiya.edu', 5, '2020-21', '1813042', '2020/04/15 15:05:19', 0, 8, '2UST543', '2UST532', '2UST514', '2UST533', '2UST544', '2UST513', '2UST541', '2UST531'),
('roma.k@somaiya.edu', 5, '2020-21', '1922009', '2020/04/15 21:49:51', 0, 8, '2UST511', '2UST551', '2UST553', '2UST533', 'same as pref 2', '2UST514', '2UST563', '2UST522'),
('romil.us@somaiya.edu', 5, '2020-21', '1714058', '2020/04/15 14:39:57', 0, 8, '2UST531', '2UST524', '2UST543', '2UST561', '2UST553', '2UST544', '2UST511', '2UST513'),
('ronak.desai@somaiya.edu', 5, '2020-21', '1814074', '2020/04/13 15:19:39', 0, 8, '2UST531', '2UST513', '2UST512', '2UST541', '2UST544', '2UST521', '2UST524', 'same as pref 5'),
('ronak.dg@somaiya.edu', 5, '2020-21', '1811011', '2020/04/14 23:25:17', 0, 8, '2UST543', '2UST522', '2UST512', '2UST513', '2UST561', '2UST524', '2UST511', '2UST532'),
('ronak.singh@somaiya.edu', 5, '2020-21', '1813126', '2020/04/15 20:56:33', 0, 8, '2UST543', '2UST553', '2UST561', '2UST534', '2UST531', '2UST514', '2UST512', '2UST513'),
('roosheet.m@somaiya.edu', 5, '2020-21', '1815036', '2020/04/15 13:54:34', 0, 8, '2UST524', '2UST562', '2UST551', '2UST553', '2UST563', '2UST541', '2UST531', '2UST543'),
('ruchi.manjalkar@somaiya.edu', 5, '2020-21', '1812076', '2020/04/13 15:21:32', 0, 8, '2UST553', '2UST552', '2UST543', '2UST521', '2UST522', '2UST562', '2UST524', '2UST513'),
('ruchira.j@somaiya.edu', 5, '2020-21', '1813088', '2020/04/13 15:28:23', 0, 8, '2UST531', '2UST522', '2UST524', '2UST533', '2UST532', 'same as pref 1', '2UST521', '2UST513'),
('rudra.jog@somaiya.edu', 5, '2020-21', '1815096', '2020/04/15 18:33:51', 0, 8, '2UST513', '2UST553', '2UST563', '2UST551', '2UST512', '2UST532', 'same as pref 2', '2UST552'),
('rudresh.r@somaiya.edu', 5, '2020-21', '1814104', '2020/04/14 13:05:44', 0, 8, '2UST513', '2UST531', '2UST541', '2UST544', '2UST543', '2UST521', '2UST534', '2UST563'),
('rugved.bongale@somaiya.edu', 5, '2020-21', '1811006', '2020/04/15 14:25:46', 0, 8, '2UST531', '2UST524', '2UST541', '2UST543', '2UST544', '2UST552', '2UST522', '2UST513'),
('rugved.j@somaiya.edu', 5, '2020-21', '1815023', '2020/04/15 14:18:18', 0, 8, '2UST543', '2UST553', '2UST561', '2UST524', '2UST513', '2UST562', '2UST563', 'same as pref 6'),
('rushikesh.arande@somaiya.edu', 5, '2020-21', '1815002', '2020/04/15 18:38:34', 0, 8, '2UST513', '2UST543', '2UST553', '2UST563', '2UST562', '2UST532', '2UST544', '2UST511'),
('rushil.popat@somaiya.edu', 5, '2020-21', '1815049', '2020/04/15 13:15:38', 0, 8, '2UST514', '2UST532', '2UST553', '2UST524', '2UST533', '2UST511', '2UST541', '2UST542'),
('rustom.m@somaiya.edu', 5, '2020-21', '1813027', '2020/04/14 2:03:42', 0, 8, '2UST533', '2UST511', '2UST553', '2UST543', '2UST514', 'same as pref 4', '2UST512', 'same as pref 2'),
('rutik.gandhi@somaiya.edu', 5, '2020-21', '1815080', '2020/04/15 19:23:56', 0, 8, '2UST553', '2UST514', '2UST543', '2UST561', '2UST513', 'same as pref 3', '2UST521', '2UST511'),
('rutvikkumar.p@somaiya.edu', 5, '2020-21', '1925011', '2020/04/13 18:44:24', 0, 8, '2UST553', '2UST534', '2UST551', '2UST543', '2UST513', '2UST512', 'same as pref 5', 'same as pref 3'),
('rvs1@somaiya.edu', 5, '2020-21', '1922002', '2020/04/15 21:49:17', 0, 8, '2UST543', '2UST514', '2UST511', '2UST522', '2UST533', 'same as pref 1', '2UST541', '2UST542'),
('s.baradkar@somaiya.edu', 5, '2020-21', '1812007', '2020/04/14 21:29:34', 0, 8, '2UST543', '2UST522', '2UST534', '2UST514', '2UST544', '2UST524', '2UST531', 'same as pref 3'),
('s.srinivasan@somaiya.edu', 5, '2020-21', '1812117', '2020/04/13 20:24:30', 0, 8, '2UST523', '2UST551', '2UST522', '2UST531', '2UST543', '2UST524', '2UST513', '2UST561'),
('s.suraliya@somaiya.edu', 5, '2020-21', '1812061', '2020/04/13 15:57:45', 0, 8, '2UST544', '2UST521', '2UST514', '2UST513', '2UST523', '2UST531', 'same as pref 3', '2UST534'),
('saarah.khan@somaiya.edu', 5, '2020-21', '1811088', '2020/04/15 22:48:23', 0, 8, '2UST531', '2UST513', '2UST512', '2UST524', '2UST511', '2UST542', '2UST532', 'same as pref 4'),
('sagar.kamat@somaiya.edu', 5, '2020-21', '1814030', '2020/04/13 15:57:23', 0, 8, '2UST531', 'same as pref 1', 'same as pref 1', '2UST512', 'same as pref 4', 'same as pref 4', '2UST522', '2UST541'),
('sagar.nn@somaiya.edu', 5, '2020-21', '1815013', '2020/04/13 21:23:45', 0, 8, '2UST553', '2UST543', '2UST551', '2UST563', '2UST561', '2UST513', '2UST544', '2UST562'),
('sakshi.shah4@somaiya.edu', 5, '2020-21', '1922003', '2020/04/15 11:36:55', 0, 8, '2UST521', '2UST533', '2UST551', '2UST532', '2UST534', 'same as pref 4', '2UST553', 'same as pref 2'),
('salil.kulkarni@somaiya.edu', 5, '2020-21', '1813026', '2020/04/15 22:31:37', 0, 8, '2UST514', '2UST531', '2UST532', '2UST543', '2UST524', '2UST544', '2UST551', 'same as pref 7'),
('sameeksha.p@somaiya.edu', 5, '2020-21', '1815048', '2020/04/14 19:11:53', 0, 8, '2UST553', '2UST551', '2UST561', '2UST563', '2UST562', 'same as pref 1', '2UST552', '2UST522'),
('samyak.z@somaiya.edu', 5, '2020-21', '1813127', '2020/04/15 19:27:35', 0, 8, '2UST553', '2UST543', '2UST533', '2UST514', '2UST532', '2UST524', 'same as pref 5', '2UST562'),
('sanchi.desai@somaiya.edu', 5, '2020-21', '1815012', '2020/04/13 15:44:27', 0, 8, '2UST553', '2UST514', '2UST561', '2UST551', '2UST531', '2UST513', '2UST543', '2UST524'),
('sanika.bagwe@somaiya.edu', 5, '2020-21', '1811065', '2020/04/15 22:18:58', 0, 8, '2UST512', '2UST513', '2UST532', '2UST541', '2UST531', '2UST534', '2UST533', 'same as pref 5'),
('sankalp.jain@somaiya.edu', 5, '2020-21', '1813084', '2020/04/13 16:28:32', 0, 8, '2UST544', '2UST543', '2UST513', '2UST512', '2UST532', '2UST562', '2UST563', '2UST561'),
('sanket.dp@somaiya.edu', 5, '2020-21', '1813039', '2020/04/15 14:42:21', 0, 8, '2UST514', '2UST531', '2UST543', '2UST532', '2UST533', '2UST534', 'same as pref 2', 'same as pref 5'),
('sanmit.sahu@somaiya.edu', 5, '2020-21', '1811038', '2020/04/15 15:08:56', 0, 8, '2UST531', '2UST533', '2UST541', '2UST512', '2UST511', '2UST542', 'same as pref 3', 'same as pref 5'),
('sanya.shah@somaiya.edu', 5, '2020-21', '1812110', '2020/04/13 16:49:18', 0, 8, '2UST543', '2UST553', '2UST551', '2UST533', '2UST522', '2UST563', '2UST534', 'same as pref 4'),
('sanyam.gandhi@somaiya.edu', 5, '2020-21', '1814078', '2020/04/13 16:12:04', 0, 8, '2UST513', '2UST543', '2UST531', '2UST512', '2UST544', '2UST533', '2UST514', '2UST534'),
('sanyam.gudhka@somaiya.edu', 5, '2020-21', '1812081', '2020/04/15 20:15:45', 0, 8, '2UST524', '2UST534', '2UST553', '2UST543', '2UST561', '2UST552', '2UST563', '2UST551'),
('sanyam.savla@somaiya.edu', 5, '2020-21', '1811040', '2020/04/14 23:31:07', 0, 8, '2UST512', '2UST541', '2UST542', '2UST543', '2UST513', '2UST561', '2UST553', '2UST562'),
('sap3@somaiya.edu', 5, '2020-21', '1922020', '2020/04/14 23:34:52', 0, 8, '2UST514', '2UST563', '2UST543', '2UST534', '2UST522', '2UST544', '2UST513', '2UST542'),
('sarth.m@somaiya.edu', 5, '2020-21', '1815097', '2020/04/13 16:08:44', 0, 8, '2UST553', '2UST514', '2UST551', '2UST561', '2UST531', 'same as pref 5', '2UST513', '2UST532'),
('sarthak.ms@somaiya.edu', 5, '2020-21', '1815059', '2020/04/15 18:12:28', 0, 8, '2UST543', '2UST563', '2UST553', '2UST534', '2UST551', '2UST544', '2UST511', '2UST513'),
('sarthak.vora@somaiya.edu', 5, '2020-21', '1815066', '2020/04/14 11:57:54', 0, 8, '2UST553', '2UST551', '2UST563', '2UST561', '2UST514', '2UST533', '2UST532', '2UST513'),
('sarvesh.bangad@somaiya.edu', 5, '2020-21', '1811124', '2020/04/15 10:14:40', 0, 8, '2UST513', '2UST524', '2UST511', '2UST512', '2UST531', 'same as pref 2', '2UST543', 'same as pref 3'),
('satra.y@somaiya.edu', 5, '2020-21', '1811109', '2020/04/13 16:18:11', 0, 8, '2UST512', '2UST531', '2UST543', '2UST513', '2UST521', 'same as pref 2', '2UST563', 'same as pref 4'),
('satyam.pandey@somaiya.edu', 5, '2020-21', '1812120', '2020/04/13 18:21:51', 0, 8, '2UST543', '2UST553', '2UST531', '2UST514', '2UST512', '2UST511', '2UST513', 'same as pref 3'),
('saud.shaikh@somaiya.edu', 5, '2020-21', '1815119', '2020/04/13 16:55:14', 0, 8, '2UST553', '2UST551', '2UST531', '2UST514', '2UST561', '2UST513', 'same as pref 3', '2UST532'),
('saumya.gala@somaiya.edu', 5, '2020-21', '1712015', '2020/04/15 14:05:30', 0, 8, '2UST553', '2UST552', '2UST563', '2UST522', '2UST534', '2UST543', '2UST541', '2UST542'),
('saurabh.nambiar@somaiya.edu', 5, '2020-21', '1811099', '2020/04/14 22:44:12', 0, 8, '2UST531', '2UST541', '2UST542', '2UST524', '2UST512', 'same as pref 3', '2UST513', '2UST511'),
('saurabh.shetty@somaiya.edu', 5, '2020-21', '1811055', '2020/04/15 00:39:59', 0, 8, '2UST511', '2UST512', '2UST532', '2UST544', '2UST531', '2UST542', 'same as pref 1', '2UST513'),
('saurav.sarkar@somaiya.edu', 5, '2020-21', '18151113', '2020/04/15 15:15:29', 0, 8, '2UST553', '2UST543', '2UST561', '2UST534', '2UST514', 'same as pref 5', '2UST522', '2UST563'),
('saurav.yj@somaiya.edu', 5, '2020-21', '1811019', '2020/04/15 18:49:22', 0, 8, '2UST524', '2UST532', '2UST531', '2UST544', '2UST543', 'same as pref 5', 'same as pref 2', '2UST541'),
('savri.gandhi@somaiya.edu', 5, '2020-21', '1815114', '2020/04/15 11:49:25', 0, 8, '2UST514', '2UST524', '2UST531', '2UST553', '2UST561', '2UST522', '2UST534', '2UST551'),
('sejal.chordiya@somaiya.edu', 5, '2020-21', '1813008', '2020/04/14 17:49:07', 0, 8, '2UST543', 'same as pref 1', '2UST531', 'same as pref 3', 'same as pref 1', '2UST561', '2UST514', 'same as pref 3'),
('shabdarali.m@somaiya.edu', 5, '2020-21', '1813101', '2020/04/15 21:20:50', 0, 8, '2UST531', '2UST514', '2UST513', '2UST512', '2UST541', 'same as pref 4', '2UST524', '2UST561'),
('shah.di@somaiya.edu', 5, '2020-21', '1922014', '2020/04/16 13:30:14', 0, 8, '2UST522', '2UST551', '2UST563', '2UST521', '2UST512', 'same as pref 2', '2UST552', '2UST543'),
('shah.ts@somaiya.edu', 5, '2020-21', '1813054', '2020/04/15 18:34:50', 0, 8, '2UST543', '2UST512', '2UST514', '2UST531', '2UST562', '2UST513', '2UST533', '2UST532'),
('shantanu.godbole@somaiya.edu', 5, '2020-21', '1811079', '2020/04/13 19:21:38', 0, 8, '2UST513', '2UST541', '2UST524', '2UST542', '2UST544', '2UST552', '2UST533', 'same as pref 2'),
('sharath.p@somaiya.edu', 5, '2020-21', '1813111', '2020/04/14 20:17:03', 0, 8, '2UST531', '2UST533', '2UST524', '2UST532', '2UST543', 'same as pref 1', '2UST522', 'same as pref 5'),
('shatayu.m@somaiya.edu', 5, '2020-21', '1815095', '2020/04/14 20:14:14', 0, 8, '2UST553', '2UST513', '2UST514', '2UST561', '2UST551', '2UST541', '2UST544', 'same as pref 5'),
('shefali24@somaiya.edu', 5, '2020-21', '1921007', '2020/04/14 23:51:12', 0, 8, '2UST531', '2UST524', '2UST544', '2UST513', '2UST512', '2UST542', '2UST543', 'same as pref 2'),
('shelar.sa@somaiya.edu', 5, '2020-21', '1811053', '2020/04/15 00:09:57', 0, 8, '2UST512', '2UST531', '2UST543', '2UST544', '2UST541', 'same as pref 5', 'same as pref 4', '2UST542'),
('shelke.aa@somaiya.edu', 5, '2020-21', '1811103', '2020/04/13 23:59:45', 0, 8, '2UST512', '2UST513', '2UST531', '2UST542', '2UST541', '2UST532', 'same as pref 2', '2UST543'),
('sheth.jb@somaiya.edu', 5, '2020-21', '1812002', '2020/04/15 17:43:41', 0, 8, '2UST543', '2UST524', '2UST512', '2UST522', '2UST511', '2UST533', '2UST562', '2UST531'),
('sheth.mj@somaiya.edu', 5, '2020-21', '1812060', '2020/04/13 19:33:40', 0, 8, '2UST553', '2UST511', '2UST512', '2UST534', '2UST524', '2UST543', '2UST544', '2UST542'),
('shetty.rr@somaiya.edu', 5, '2020-21', '1815060', '2020/04/13 18:37:15', 0, 8, '2UST543', '2UST553', '2UST551', '2UST563', '2UST513', '2UST511', '2UST514', 'same as pref 4'),
('shetye.y@somaiya.edu', 5, '2020-21', '1815061', '2020/04/15 13:40:36', 0, 8, '2UST514', '2UST543', '2UST513', '2UST531', '2UST553', 'same as pref 4', 'same as pref 2', '2UST544'),
('shibani.p@somaiya.edu', 5, '2020-21', '1922021', '2020/04/15 12:14:52', 0, 8, '2UST543', '2UST563', '2UST533', '2UST551', '2UST511', 'same as pref 5', '2UST532', 'same as pref 3'),
('shikta.das@somaiya.edu', 5, '2020-21', '1813011', '2020/04/13 22:05:25', 0, 8, '2UST514', '2UST532', '2UST524', '2UST533', '2UST531', 'same as pref 2', '2UST543', '2UST513'),
('shivam.awasthi@somaiya.edu', 5, '2020-21', '1813128', '2020/04/15 18:20:00', 0, 8, '2UST532', '2UST543', '2UST512', '2UST522', '2UST541', '2UST563', '2UST561', '2UST521'),
('shivam.bansal@somaiya.edu', 5, '2020-21', '1813004', '2020/04/15 22:45:24', 0, 8, '2UST543', '2UST512', '2UST514', '2UST532', '2UST522', '2UST542', '2UST541', 'same as pref 1'),
('shivani.kaul@somaiya.edu', 5, '2020-21', '1811086', '2020/04/15 15:40:22', 0, 8, '2UST543', '2UST522', '2UST532', '2UST512', '2UST511', '2UST513', '2UST531', '2UST524'),
('shravani.d@somaiya.edu', 5, '2020-21', '1812077', '2020/04/15 22:22:07', 0, 8, '2UST524', '2UST543', '2UST514', '2UST544', '2UST561', '2UST531', '2UST553', '2UST511'),
('shrey.bs@somaiya.edu', 5, '2020-21', '1812113', '2020/04/15 23:10:40', 0, 8, '2UST534', '2UST543', '2UST513', '2UST514', '2UST522', '2UST551', '2UST521', '2UST532'),
('shreya.hk@somaiya.edu', 5, '2020-21', '1813096', '2020/04/13 14:49:05', 0, 8, '2UST543', '2UST531', '2UST534', '2UST524', '2UST532', '2UST533', '2UST514', '2UST544'),
('shreya.laheri@somaiya.edu', 5, '2020-21', '1922006', '2020/04/15 23:22:42', 0, 8, '2UST541', '2UST512', '2UST521', '2UST511', '2UST543', 'same as pref 5', 'same as pref 1', '2UST513'),
('shreya.pawar@somaiya.edu', 5, '2020-21', '1923006', '2020/04/13 15:07:37', 0, 8, '2UST543', '2UST514', '2UST513', '2UST512', '2UST533', 'same as pref 1', '2UST544', '2UST511'),
('shreya.ughade@somaiya.edu', 5, '2020-21', '1814116', '2020/04/14 13:35:59', 0, 8, '2UST512', '2UST541', '2UST544', '2UST543', '2UST532', '2UST524', '2UST551', '2UST531'),
('shreyas.mm@somaiya.edu', 5, '2020-21', '1811049', '2020/04/15 22:40:00', 0, 8, '2UST511', '2UST512', '2UST513', '2UST542', '2UST524', '2UST531', '2UST553', 'same as pref 1'),
('shreyas.parkar@somaiya.edu', 5, '2020-21', '1812101', '2020/04/14 21:16:36', 0, 8, '2UST512', '2UST511', '2UST542', '2UST541', '2UST551', '2UST524', 'same as pref 3', '2UST532'),
('shreyas.sj@somaiya.edu', 5, '2020-21', '1922018', '2020/04/16 13:37:53', 0, 8, '2UST521', '2UST522', '2UST533', '2UST553', '2UST534', '2UST512', 'same as pref 5', '2UST543'),
('shreyasi.h@somaiya.edu', 5, '2020-21', '1813080', '2020/04/16 00:59:48', 0, 8, '2UST543', '2UST561', '2UST534', '2UST531', '2UST524', 'same as pref 3', 'same as pref 2', '2UST522'),
('shruti.gosain@somaiya.edu', 5, '2020-21', '1814079', '2020/04/13 21:46:24', 0, 8, '2UST512', '2UST513', '2UST531', '2UST542', '2UST532', 'same as pref 4', 'same as pref 2', '2UST522'),
('shruti.kamat@somaiya.edu', 5, '2020-21', '1922019', '2020/04/14 19:50:54', 0, 8, '2UST511', '2UST563', '2UST513', '2UST522', '2UST534', '2UST544', '2UST532', '2UST542'),
('shubh.as@somaiya.edu', 5, '2020-21', '1811050', '2020/04/15 20:39:27', 0, 8, '2UST512', '2UST541', '2UST532', '2UST513', '2UST531', '2UST543', 'same as pref 6', '2UST542'),
('shubh.d@somaiya.edu', 5, '2020-21', '1813040', '2020/04/13 20:02:36', 0, 8, '2UST543', '2UST532', '2UST512', '2UST533', '2UST524', '2UST534', '2UST511', 'same as pref 1');
INSERT INTO `student_preference_audit` (`email_id`, `sem`, `year`, `rollno`, `timestamp`, `allocate_status`, `no_of_valid_preferences`, `pref1`, `pref2`, `pref3`, `pref4`, `pref5`, `pref6`, `pref7`, `pref8`) VALUES
('shubh.mody@somaiya.edu', 5, '2020-21', '1813031', '2020/04/15 23:13:42', 0, 8, '2UST512', '2UST511', '2UST543', '2UST514', '2UST532', '2UST542', 'same as pref 5', '2UST524'),
('shubh.shetiya@somaiya.edu', 5, '2020-21', '1815140', '2020/04/15 12:32:50', 0, 8, '2UST551', '2UST553', '2UST563', '2UST562', '2UST514', '2UST542', '2UST512', '2UST543'),
('shubham.bhakuni@somaiya.edu', 5, '2020-21', '1814006', '2020/04/13 18:57:53', 0, 8, '2UST512', '2UST542', '2UST513', '2UST511', '2UST543', '2UST544', '2UST541', '2UST532'),
('shubham.dj@somaiya.edu', 5, '2020-21', '1923005', '2020/04/14 19:31:32', 0, 8, '2UST514', '2UST563', '2UST543', '2UST534', '2UST522', '2UST531', '2UST524', '2UST551'),
('shubham.mj@somaiya.edu', 5, '2020-21', '1815027', '2020/04/15 18:15:33', 0, 8, '2UST553', '2UST551', '2UST534', '2UST563', '2UST543', '2UST533', '2UST542', '2UST511'),
('shubhankar.r@somaiya.edu', 5, '2020-21', '1815112', '2020/04/15 19:44:57', 0, 8, '2UST514', '2UST553', '2UST524', '2UST532', '2UST543', '2UST511', 'same as pref 3', '2UST544'),
('siddhant.l@somaiya.edu', 5, '2020-21', '1815093', '2020/04/13 15:58:02', 0, 8, '2UST524', '2UST521', '2UST551', '2UST562', '2UST561', '2UST544', '2UST543', '2UST534'),
('siddhant.shaha@somaiya.edu', 5, '2020-21', '1814112', '2020/04/15 18:37:04', 0, 8, '2UST512', '2UST511', '2UST533', '2UST543', '2UST513', '2UST551', '2UST521', '2UST561'),
('siddhesh.mahajan@somaiya.edu', 5, '2020-21', '1815035', '2020/04/15 12:32:13', 0, 8, '2UST543', '2UST553', '2UST513', '2UST511', '2UST512', '2UST534', '2UST561', '2UST531'),
('siddhi.rajwatkar@somaiya.edu', 5, '2020-21', '1925005', '2020/04/14 18:58:05', 0, 8, '2UST563', '2UST562', '2UST551', '2UST534', '2UST532', '2UST543', '2UST553', '2UST514'),
('sidhant.malkar@somaiya.edu', 5, '2020-21', '1812041', '2020/04/13 15:18:59', 0, 8, '2UST524', '2UST532', '2UST513', '2UST531', '2UST543', 'same as pref 5', '2UST522', '2UST541'),
('simran.lopes@somaiya.edu', 5, '2020-21', '1813099', '2020/04/14 19:10:57', 0, 8, '2UST512', '2UST543', '2UST541', '2UST524', '2UST511', '2UST532', '2UST531', '2UST542'),
('smit.bb@somaiya.edu', 5, '2020-21', '1811070', '2020/04/15 20:14:06', 0, 8, '2UST512', '2UST543', '2UST542', '2UST531', '2UST541', 'same as pref 4', '2UST511', '2UST521'),
('smit.ds@somaiya.edu', 5, '2020-21', '1811051', '2020/04/13 15:07:39', 0, 8, '2UST512', '2UST524', '2UST531', '2UST532', '2UST513', '2UST543', '2UST534', '2UST514'),
('smit.nm@somaiya.edu', 5, '2020-21', '1813104', '2020/04/15 18:09:31', 0, 8, '2UST514', '2UST543', '2UST512', '2UST532', '2UST531', '2UST544', '2UST522', '2UST534'),
('smit.shet@somaiya.edu', 5, '2020-21', '1815123', '2020/04/15 10:59:05', 0, 8, '2UST551', '2UST553', '2UST563', '2UST561', '2UST562', '2UST542', '2UST544', '2UST531'),
('smita.nayak@somaiya.edu', 5, '2020-21', '1812107', '2020/04/13 19:47:40', 0, 8, '2UST552', '2UST551', '2UST522', '2UST553', '2UST523', '2UST524', '2UST511', 'same as pref 2'),
('soham.mehta@somaiya.edu', 5, '2020-21', '1815043', '2020/04/14 17:10:36', 0, 8, '2UST553', '2UST543', '2UST513', '2UST533', '2UST532', 'same as pref 1', '2UST551', '2UST563'),
('soumya.parekh@somaiya.edu', 5, '2020-21', '1811106', '2020/04/13 23:03:02', 0, 8, '2UST531', '2UST512', '2UST524', '2UST513', '2UST544', 'same as pref 4', 'same as pref 3', '2UST511'),
('sounak.das@somaiya.edu', 5, '2020-21', '1814070', '2020/04/15 17:18:57', 0, 8, '2UST512', '2UST541', '2UST531', '2UST543', '2UST513', '2UST562', '2UST534', 'same as pref 5'),
('sourabh.bujawade@somaiya.edu', 5, '2020-21', '1814009', '2020/04/13 15:10:01', 0, 8, '2UST512', '2UST543', '2UST542', '2UST541', '2UST544', '2UST553', '2UST524', '2UST561'),
('srg1@somaiya.edu', 5, '2020-21', '1815018', '2020/04/13 14:44:58', 0, 8, '2UST553', '2UST551', '2UST561', '2UST562', '2UST512', '2UST543', '2UST522', '2UST513'),
('ssm2@somaiya.edu', 5, '2020-21', '1811095', '2020/04/14 12:40:28', 0, 8, '2UST512', '2UST531', '2UST513', '2UST511', '2UST543', '2UST523', '2UST532', 'same as pref 3'),
('sudarshan.r@somaiya.edu', 5, '2020-21', '1813006', '2020/04/15 21:33:58', 0, 8, '2UST512', '2UST541', '2UST514', '2UST532', '2UST542', '2UST531', '2UST534', '2UST533'),
('sudhir.bindu@somaiya.edu', 5, '2020-21', '1811059', '2020/04/15 21:37:36', 0, 8, '2UST512', '2UST511', '2UST531', '2UST524', '2UST543', 'same as pref 1', '2UST521', '2UST544'),
('sudiksha.m@somaiya.edu', 5, '2020-21', '1811096', '2020/04/14 23:26:02', 0, 8, '2UST543', '2UST531', '2UST512', '2UST541', '2UST524', 'same as pref 5', '2UST511', '2UST532'),
('sukhada.v@somaiya.edu', 5, '2020-21', '1814119', '2020/04/13 21:21:35', 0, 8, '2UST512', '2UST541', '2UST544', '2UST543', '2UST532', '2UST511', '2UST524', 'same as pref 4'),
('sukrut.kolhe@somaiya.edu', 5, '2020-21', '1812015', '2020/04/13 15:06:58', 0, 8, '2UST513', '2UST511', '2UST512', '2UST534', '2UST543', '2UST533', 'same as pref 5', '2UST522'),
('sukruti.a@somaiya.edu', 5, '2020-21', '1812009', '2020/04/15 23:42:06', 0, 8, '2UST534', '2UST543', '2UST553', '2UST522', '2UST552', '2UST544', '2UST541', '2UST531'),
('sumedh.soman@somaiya.edu', 5, '2020-21', '1815063', '2020/04/13 14:57:10', 0, 8, '2UST553', '2UST551', '2UST561', '2UST543', '2UST514', '2UST534', '2UST542', 'same as pref 1'),
('sunil.ck@somaiya.edu', 5, '2020-21', '1813098', '2020/04/14 14:41:49', 0, 8, '2UST531', '2UST543', '2UST513', '2UST511', '2UST514', 'same as pref 2', '2UST532', 'same as pref 3'),
('suparshwa.p@somaiya.edu', 5, '2020-21', '1813103', '2020/04/14 14:40:35', 0, 8, '2UST531', '2UST543', '2UST513', '2UST512', '2UST511', '2UST541', '2UST532', '2UST551'),
('sushant.bansal@somaiya.edu', 5, '2020-21', '1812006', '2020/04/14 21:29:01', 0, 8, '2UST543', '2UST522', '2UST534', '2UST514', '2UST544', '2UST513', '2UST533', '2UST523'),
('swarangee.m@somaiya.edu', 5, '2020-21', '1812125', '2020/04/14 13:18:43', 0, 8, '2UST561', '2UST532', '2UST543', '2UST534', '2UST522', '2UST513', '2UST524', '2UST514'),
('swetha.c@somaiya.edu', 5, '2020-21', '1813007', '2020/04/13 15:30:21', 0, 8, '2UST512', '2UST513', '2UST532', '2UST524', '2UST514', '2UST541', '2UST511', '2UST543'),
('syed.suhaib@somaiya.edu', 5, '2020-21', '1814059', '2020/04/14 19:15:49', 0, 8, '2UST543', '2UST542', '2UST541', '2UST512', '2UST511', '2UST531', '2UST532', 'same as pref 3'),
('taher.a@somaiya.edu', 5, '2020-21', '1812001', '2020/04/13 22:59:44', 0, 8, '2UST543', '2UST534', '2UST522', '2UST533', '2UST523', '2UST542', '2UST541', '2UST532'),
('taher.d@somaiya.edu', 5, '2020-21', '1815141', '2020/04/13 15:07:58', 0, 8, '2UST553', '2UST562', '2UST563', '2UST551', '2UST561', '2UST521', '2UST532', '2UST514'),
('talha.c@somaiya.edu', 5, '2020-21', '1811007', '2020/04/15 00:07:26', 0, 8, '2UST531', '2UST512', '2UST543', '2UST532', '2UST541', 'same as pref 3', '2UST533', '2UST511'),
('tanay.ns@somaiya.edu', 5, '2020-21', '1812116', '2020/04/16 00:53:33', 0, 8, '2UST543', '2UST511', '2UST512', '2UST514', 'same as pref 4', 'same as pref 2', 'same as pref 3', '2UST522'),
('tanay.parekh@somaiya.edu', 5, '2020-21', '1812098', '2020/04/13 15:01:55', 0, 8, '2UST543', '2UST522', '2UST552', '2UST551', '2UST541', '2UST542', '2UST544', 'same as pref 2'),
('tanish.chube@somaiya.edu', 5, '2020-21', '1813070', '2020/04/14 21:20:58', 0, 8, '2UST532', '2UST514', '2UST524', '2UST512', '2UST511', '2UST513', 'same as pref 4', '2UST534'),
('tanisha.ashar@somaiya.edu', 5, '2020-21', '1814065', '2020/04/17 11:36:47', 0, 8, '2UST512', '2UST511', '2UST524', '2UST532', '2UST543', '2UST514', 'same as pref 1', '2UST531'),
('tanmay.armal@somaiya.edu', 5, '2020-21', '1814099', '2020/04/14 23:45:04', 0, 8, '2UST512', '2UST531', '2UST543', '2UST513', '2UST541', 'same as pref 1', 'same as pref 4', 'same as pref 5'),
('tanmay.gorad@somaiya.edu', 5, '2020-21', '1922008', '2020/04/15 21:55:32', 0, 8, '2UST511', '2UST532', '2UST534', '2UST543', '2UST553', '2UST531', 'same as pref 3', '2UST562'),
('tanmay.shekhar@somaiya.edu', 5, '2020-21', '1813020', '2020/04/25 11:49:10', 0, 8, '2UST543', '2UST514', '2UST562', '2UST534', '2UST511', 'same as pref 1', 'same as pref 5', '2UST512'),
('tanshik.doshi@somaiya.edu', 5, '2020-21', '1923002', '2020/04/13 15:53:16', 0, 8, '2UST553', '2UST533', '2UST552', '2UST534', '2UST543', '2UST532', '2UST514', 'same as pref 5'),
('tanuj.jain@somaiya.edu', 5, '2020-21', '1811017', '2020/04/14 23:25:30', 0, 8, '2UST543', '2UST522', '2UST512', '2UST513', '2UST561', '2UST511', 'same as pref 4', '2UST532'),
('tanvi.bs@somaiya.edu', 5, '2020-21', '1812057', '2020/04/13 14:58:21', 0, 8, '2UST552', '2UST543', '2UST534', '2UST563', '2UST562', '2UST521', '2UST523', '2UST522'),
('tanvi.lakhani@somaiya.edu', 5, '2020-21', '1812039', '2020/04/15 23:10:44', 0, 8, '2UST534', '2UST543', '2UST514', '2UST513', '2UST522', '2UST561', '2UST553', '2UST521'),
('tap@somaiya.edu', 5, '2020-21', '1812091', '2020/04/15 17:27:14', 0, 8, '2UST514', '2UST512', '2UST543', '2UST532', '2UST561', '2UST541', '2UST533', '2UST552'),
('tarush.r@somaiya.edu', 5, '2020-21', '1811035', '2020/04/14 23:15:12', 0, 8, '2UST513', '2UST512', '2UST531', '2UST543', '2UST544', '2UST533', 'same as pref 5', '2UST542'),
('tejal.gaykar@somaiya.edu', 5, '2020-21', '1923012', '2020/04/14 22:49:36', 0, 8, '2UST543', '2UST511', '2UST531', '2UST522', '2UST534', '2UST561', '2UST524', 'same as pref 1'),
('tejas.jain@somaiya.edu', 5, '2020-21', '1815025', '2020/04/13 15:21:41', 0, 8, '2UST553', '2UST543', '2UST534', '2UST551', '2UST563', 'same as pref 4', '2UST513', '2UST532'),
('tejas.khanolkar@somaiya.edu', 5, '2020-21', '1811089', '2020/04/13 15:48:02', 0, 8, '2UST531', '2UST524', '2UST512', '2UST511', '2UST541', '2UST552', '2UST551', 'same as pref 6'),
('tejas.limbachiya@somaiya.edu', 5, '2020-21', '1813015', '2020/04/15 18:35:48', 0, 8, '2UST514', '2UST524', '2UST511', '2UST512', '2UST531', '2UST563', 'same as pref 2', '2UST561'),
('tejas.np@somaiya.edu', 5, '2020-21', '1815100', '2020/04/14 23:13:27', 0, 8, '2UST543', '2UST531', '2UST551', '2UST553', '2UST524', '2UST542', '2UST533', 'same as pref 5'),
('tejas.rathod@somaiya.edu', 5, '2020-21', '1813113', '2020/04/15 18:44:50', 0, 8, '2UST531', '2UST514', '2UST524', '2UST512', '2UST532', 'same as pref 4', '2UST542', '2UST541'),
('tirth.hs@somaiya.edu', 5, '2020-21', '1811127', '2020/04/13 15:12:08', 0, 8, '2UST531', '2UST511', '2UST524', '2UST513', '2UST512', '2UST533', 'same as pref 4', '2UST561'),
('tirth.ps@somaiya.edu', 5, '2020-21', '1813055', '2020/04/15 18:02:32', 0, 8, '2UST514', '2UST543', '2UST531', '2UST512', '2UST532', '2UST513', '2UST541', '2UST511'),
('tirth.thaker@somaiya.edu', 5, '2020-21', '1814061', '2020/04/13 16:04:27', 0, 8, '2UST541', '2UST542', '2UST543', '2UST512', '2UST524', 'same as pref 3', 'same as pref 2', 'same as pref 5'),
('toshith.m@somaiya.edu', 5, '2020-21', '1812089', '2020/04/15 23:48:27', 0, 8, '2UST524', '2UST531', '2UST514', '2UST541', '2UST532', '2UST544', 'same as pref 4', 'same as pref 5'),
('tushar.bapecha@somaiya.edu', 5, '2020-21', '1811003', '2020/04/15 23:41:58', 0, 8, '2UST531', '2UST543', '2UST542', '2UST532', '2UST541', '2UST533', '2UST513', '2UST512'),
('twinkle.r@somaiya.edu', 5, '2020-21', '1814103', '2020/04/15 23:01:32', 0, 8, '2UST543', '2UST524', '2UST512', '2UST513', '2UST541', '2UST553', '2UST521', '2UST532'),
('udit.damare@somaiya.edu', 5, '2020-21', '1815072', '2020/04/15 15:15:00', 0, 8, '2UST553', '2UST551', '2UST514', '2UST521', '2UST531', '2UST563', 'same as pref 2', '2UST532'),
('umair.kazi@somaiya.edu', 5, '2020-21', '1815090', '2020/04/15 20:46:30', 0, 8, '2UST553', '2UST551', '2UST563', '2UST521', '2UST543', '2UST511', '2UST524', '2UST532'),
('upendra.b@somaiya.edu', 5, '2020-21', '1812069', '2020/04/14 20:56:43', 0, 8, '2UST563', '2UST553', '2UST551', '2UST531', '2UST512', '2UST511', 'same as pref 4', '2UST532'),
('urmil.c@somaiya.edu', 5, '2020-21', '1811008', '2020/04/13 17:45:06', 0, 8, '2UST531', '2UST543', '2UST524', '2UST541', '2UST532', '2UST544', '2UST553', '2UST552'),
('urvi.bheda@somaiya.edu', 5, '2020-21', '1811068', '2020/04/15 15:44:03', 0, 8, '2UST512', '2UST511', '2UST542', '2UST541', '2UST544', 'same as pref 4', '2UST513', '2UST543'),
('utsav.parekh@somaiya.edu', 5, '2020-21', '1924002', '2020/04/14 17:34:24', 0, 8, '2UST512', '2UST544', '2UST542', '2UST532', '2UST541', '2UST513', 'same as pref 3', 'same as pref 5'),
('v.sunderraman@somaiya.edu', 5, '2020-21', '1811125', '2020/04/13 15:12:22', 0, 8, '2UST531', '2UST511', '2UST524', '2UST513', '2UST512', '2UST532', '2UST514', '2UST541'),
('vaibhav.katkam@somaiya.edu', 5, '2020-21', '1815031', '2020/04/15 17:21:12', 0, 8, '2UST553', '2UST551', '2UST563', '2UST561', '2UST543', '2UST544', '2UST541', '2UST522'),
('vaibhav.parekh@somaiya.edu', 5, '2020-21', '1815042', '2020/04/15 22:12:24', 0, 8, '2UST553', '2UST514', '2UST532', '2UST513', '2UST534', '2UST543', '2UST521', 'same as pref 3'),
('vaibhavi.kundle@somaiya.edu', 5, '2020-21', '1814127', '2020/04/13 15:39:47', 0, 8, '2UST512', '2UST524', '2UST544', '2UST542', '2UST532', 'same as pref 3', '2UST513', '2UST543'),
('vandan.k@somaiya.edu', 5, '2020-21', '1813092', '2020/04/14 19:41:46', 0, 8, '2UST524', '2UST514', '2UST543', '2UST532', '2UST511', '2UST534', '2UST512', '2UST522'),
('vartika.g@somaiya.edu', 5, '2020-21', '1811081', '2020/04/15 21:05:07', 0, 8, '2UST512', '2UST531', '2UST513', '2UST532', '2UST543', '2UST524', '2UST514', '2UST534'),
('varun.bj@somaiya.edu', 5, '2020-21', '1813043', '2020/04/16 00:08:22', 0, 8, '2UST543', '2UST533', '2UST512', '2UST514', 'same as pref 2', 'same as pref 1', '2UST522', '2UST534'),
('varun.dabi@somaiya.edu', 5, '2020-21', '1815071', '2020/04/15 12:46:14', 0, 8, '2UST543', '2UST551', '2UST553', '2UST561', '2UST544', '2UST531', '2UST563', '2UST524'),
('varun.pandey@somaiya.edu', 5, '2020-21', '1814095', '2020/04/13 16:19:17', 0, 8, '2UST512', '2UST531', '2UST543', '2UST541', '2UST542', '2UST544', 'same as pref 5', '2UST532'),
('varun12@somaiya.edu', 5, '2020-21', '1815121', '2020/04/15 00:48:54', 0, 8, '2UST512', '2UST543', '2UST541', '2UST524', '2UST511', 'same as pref 2', '2UST513', '2UST551'),
('vatsal.kapadia@somaiya.edu', 5, '2020-21', '1812032', '2020/04/15 00:35:28', 0, 8, '2UST553', '2UST552', '2UST514', '2UST532', '2UST531', '2UST544', '2UST521', '2UST551'),
('vatsal.pathak@somaiya.edu', 5, '2020-21', '1811033', '2020/04/15 19:39:07', 0, 8, '2UST541', '2UST533', '2UST531', '2UST512', '2UST544', '2UST514', '2UST513', '2UST532'),
('vatsal12@somaiya.edu', 5, '2020-21', '1811052', '2020/04/15 20:39:21', 0, 8, '2UST512', '2UST541', '2UST532', '2UST513', '2UST531', '2UST524', '2UST542', '2UST543'),
('vedant.chandra@somaiya.edu', 5, '2020-21', '1812022', '2020/04/15 23:41:58', 0, 8, '2UST534', '2UST543', '2UST553', '2UST522', '2UST552', '2UST533', '2UST513', '2UST512'),
('vedant.khatod@somaiya.edu', 5, '2020-21', '1813093', '2020/04/15 19:35:08', 0, 8, '2UST543', '2UST513', '2UST512', '2UST533', '2UST544', '2UST542', '2UST511', '2UST532'),
('vedant.konde@somaiya.edu', 5, '2020-21', '1813129', '2020/04/15 11:43:24', 0, 8, '2UST532', '2UST543', '2UST512', '2UST533', '2UST514', 'same as pref 1', '2UST544', '2UST531'),
('vedatma.k@somaiya.edu', 5, '2020-21', '1812121', '2020/04/14 20:58:48', 0, 8, '2UST514', '2UST511', '2UST513', '2UST522', '2UST543', '2UST544', 'same as pref 3', '2UST524'),
('vidhi.gohel@somaiya.edu', 5, '2020-21', '1812019', '2020/04/14 20:05:37', 0, 8, '2UST514', '2UST521', '2UST522', '2UST553', '2UST542', '2UST524', 'same as pref 2', '2UST531'),
('vidhi.sejpal@somaiya.edu', 5, '2020-21', '1813048', '2020/04/13 17:26:06', 0, 8, '2UST514', '2UST531', '2UST512', '2UST544', '2UST543', '2UST524', '2UST513', '2UST533'),
('vighnesh.naik@somaiya.edu', 5, '2020-21', '1814041', '2020/04/15 21:49:27', 0, 8, '2UST512', '2UST531', '2UST513', '2UST544', '2UST511', '2UST543', '2UST534', '2UST552'),
('vijayram.p@somaiya.edu', 5, '2020-21', '1812073', '2020/04/15 23:51:36', 0, 8, '2UST511', '2UST512', '2UST514', '2UST543', '2UST524', '2UST561', 'same as pref 5', '2UST531'),
('vikas.rg@somaiya.edu', 5, '2020-21', '1814022', '2020/04/13 14:45:38', 0, 8, '2UST512', '2UST541', '2UST542', '2UST543', '2UST513', 'same as pref 3', '2UST511', '2UST521'),
('vimal.e3@somaiya.edu', 5, '2020-21', '1813046', '2020/04/15 17:29:40', 0, 8, '2UST543', '2UST514', '2UST531', '2UST553', '2UST532', 'same as pref 1', '2UST542', '2UST513'),
('vineet.gadiyar@somaiya.edu', 5, '2020-21', '1813075', '2020/04/13 18:19:19', 0, 8, '2UST531', '2UST543', '2UST513', '2UST511', 'same as pref 2', '2UST542', '2UST552', 'same as pref 3'),
('vineeta.b@somaiya.edu', 5, '2020-21', '1814066', '2020/04/15 19:11:16', 0, 8, '2UST524', '2UST531', '2UST543', '2UST512', '2UST513', '2UST542', '2UST532', 'same as pref 1'),
('vinit.mundra@somaiya.edu', 5, '2020-21', '1811026', '2020/04/15 15:00:29', 0, 8, '2UST531', '2UST524', '2UST542', '2UST544', '2UST512', '2UST513', '2UST534', '2UST511'),
('vipul.bagal@somaiya.edu', 5, '2020-21', '1814094', '2020/04/15 23:25:07', 0, 8, '2UST521', '2UST512', '2UST522', '2UST532', '2UST511', '2UST534', '2UST552', '2UST542'),
('vipul.dube@somaiya.edu', 5, '2020-21', '1813089', '2020/04/15 23:37:42', 0, 8, '2UST543', '2UST512', '2UST513', '2UST514', '2UST562', '2UST531', '2UST533', '2UST532'),
('virag.j@somaiya.edu', 5, '2020-21', '1814026', '2020/04/15 17:36:13', 0, 8, '2UST541', '2UST512', '2UST531', '2UST511', 'same as pref 3', 'same as pref 1', '2UST553', '2UST551'),
('viraj.jedhe@somaiya.edu', 5, '2020-21', '1813085', '2020/04/13 15:22:54', 0, 8, '2UST512', '2UST543', '2UST513', '2UST544', '2UST532', '2UST514', '2UST524', '2UST534'),
('viraj.joshi@somaiya.edu', 5, '2020-21', '1814034', '2020/04/15 13:16:26', 0, 8, '2UST532', '2UST531', '2UST524', '2UST543', '2UST512', '2UST553', '2UST533', '2UST563'),
('viraj.nd@somaiya.edu', 5, '2020-21', '1811072', '2020/04/13 20:59:21', 0, 8, '2UST511', '2UST541', '2UST543', '2UST544', '2UST513', 'same as pref 5', 'same as pref 2', 'same as pref 4'),
('viraj.np@somaiya.edu', 5, '2020-21', '1814047', '2020/04/15 22:57:47', 0, 8, '2UST543', 'same as pref 1', '2UST521', '2UST512', 'same as pref 3', '2UST511', 'same as pref 4', '2UST513'),
('viraj06@somaiya.edu', 5, '2020-21', '1814093', '2020/04/13 15:15:50', 0, 8, '2UST524', '2UST531', '2UST512', '2UST513', '2UST543', 'same as pref 5', 'same as pref 1', '2UST521'),
('vishal.salgond@somaiya.edu', 5, '2020-21', '1814107', '2020/04/14 15:47:51', 0, 8, '2UST512', '2UST541', '2UST544', '2UST543', '2UST532', '2UST511', '2UST513', '2UST531'),
('vishant.m@somaiya.edu', 5, '2020-21', '1814038', '2020/04/15 14:51:42', 0, 8, '2UST543', '2UST512', '2UST511', '2UST531', '2UST541', 'same as pref 3', 'same as pref 1', '2UST522'),
('vistasp.edulji@somaiya.edu', 5, '2020-21', '1815015', '2020/04/13 15:08:39', 0, 8, '2UST553', '2UST563', '2UST561', '2UST562', '2UST551', '2UST532', '2UST542', '2UST522'),
('vpb@somaiya.edu', 5, '2020-21', '1922001', '2020/04/14 20:56:40', 0, 8, '2UST563', '2UST553', '2UST551', '2UST531', '2UST512', '2UST542', '2UST561', '2UST514'),
('vruddhi.ms@somaiya.edu', 5, '2020-21', '1811117', '2020/04/13 21:36:27', 0, 8, '2UST512', '2UST532', '2UST541', '2UST542', '2UST543', '2UST524', '2UST534', 'same as pref 5'),
('vruksha.j@somaiya.edu', 5, '2020-21', '1812030', '2020/04/15 23:47:00', 0, 8, '2UST543', '2UST522', '2UST534', '2UST513', '2UST514', '2UST542', '2UST551', 'same as pref 1'),
('vrushabh.rg@somaiya.edu', 5, '2020-21', '1813016', '2020/04/15 20:59:20', 0, 8, '2UST533', '2UST544', '2UST551', '2UST543', '2UST563', '2UST511', '2UST512', '2UST522'),
('vrutik.shah@somaiya.edu', 5, '2020-21', '1814056', '2020/04/14 15:58:46', 0, 8, '2UST512', '2UST541', '2UST543', '2UST542', '2UST544', '2UST511', '2UST513', '2UST531'),
('yash.chandarana@somaiya.edu', 5, '2020-21', '1815094', '2020/04/14 17:29:18', 0, 8, '2UST543', '2UST563', '2UST553', '2UST551', '2UST561', 'same as pref 1', '2UST511', '2UST513'),
('yash.deorah@somaiya.edu', 5, '2020-21', '1814073', '2020/04/13 15:03:03', 0, 8, '2UST513', '2UST512', '2UST524', '2UST531', '2UST541', '2UST544', '2UST534', '2UST543'),
('yash.kalyani@somaiya.edu', 5, '2020-21', '1815030', '2020/04/14 22:49:15', 0, 8, '2UST553', '2UST534', '2UST563', '2UST551', '2UST562', '2UST531', '2UST541', '2UST512'),
('yash.kothiya@somaiya.edu', 5, '2020-21', '1813095', '2020/04/13 15:19:33', 0, 8, '2UST533', '2UST532', '2UST531', '2UST524', '2UST512', '2UST511', '2UST543', 'same as pref 4'),
('yash.tandon@somaiya.edu', 5, '2020-21', '1811058', '2020/04/14 12:49:59', 0, 8, '2UST531', '2UST511', '2UST532', '2UST524', '2UST512', '2UST534', 'same as pref 3', '2UST551'),
('yash.telange@somaiya.edu', 5, '2020-21', '1815130', '2020/04/15 16:37:19', 0, 8, '2UST553', '2UST524', '2UST514', '2UST551', '2UST521', 'same as pref 1', 'same as pref 4', '2UST534'),
('yash.thadeshwar@somaiya.edu', 5, '2020-21', '1815131', '2020/04/14 21:05:30', 0, 8, '2UST551', '2UST553', '2UST561', '2UST563', '2UST524', '2UST544', '2UST532', 'same as pref 5'),
('yash.tulsyan@somaiya.edu', 5, '2020-21', '1812119', '2020/04/17 00:33:37', 0, 8, '2UST534', '2UST543', '2UST522', '2UST552', '2UST524', '2UST553', '2UST542', '2UST544'),
('yashpal.m@somaiya.edu', 5, '2020-21', '1812044', '2020/04/13 16:49:52', 0, 8, '2UST551', '2UST553', '2UST511', '2UST543', '2UST513', '2UST544', 'same as pref 4', '2UST534'),
('yashvi.pv@somaiya.edu', 5, '2020-21', '1814121', '2020/04/15 21:37:59', 0, 8, '2UST513', '2UST531', '2UST524', '2UST543', '2UST561', '2UST563', 'same as pref 4', '2UST514'),
('ysb1@somaiya.edu', 5, '2020-21', '1812010', '2020/04/14 2:52:06', 0, 8, '2UST543', '2UST534', '2UST514', '2UST522', '2UST512', '2UST524', '2UST513', '2UST531'),
('yukta.pathak@somaiya.edu', 5, '2020-21', '1815045', '2020/04/13 17:00:17', 0, 8, '2UST553', '2UST561', '2UST514', '2UST524', '2UST551', '2UST543', '2UST533', '2UST562'),
('yusha.sharif@somaiya.edu', 5, '2020-21', '1811119', '2020/04/15 14:05:41', 0, 8, '2UST544', '2UST512', '2UST511', '2UST524', '2UST532', 'same as pref 5', '2UST543', '2UST542'),
('zalak.b@somaiya.edu', 5, '2020-21', '181039', '2020/04/15 20:33:45', 0, 8, '2UST533', '2UST513', '2UST512', '2UST541', '2UST542', 'same as pref 2', 'same as pref 5', '2UST544'),
('zeal.mehta@somaiya.edu', 5, '2020-21', '1922005', '2020/04/14 16:44:27', 0, 8, '2UST512', '2UST541', '2UST532', '2UST514', '2UST513', '2UST543', '2UST521', '2UST534');

-- --------------------------------------------------------

--
-- Table structure for table `student_preference_idc`
--

CREATE TABLE `student_preference_idc` (
  `email_id` varchar(50) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `rollno` varchar(20) NOT NULL,
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
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_course`
--
ALTER TABLE `audit_course`
  ADD PRIMARY KEY (`cid`,`sem`,`year`);

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
-- Indexes for table `audit_course_floating_dept`
--
ALTER TABLE `audit_course_floating_dept`
  ADD PRIMARY KEY (`cid`,`sem`,`year`,`dept_id`),
  ADD KEY `audit_course_floating_dept_department` (`dept_id`);

--
-- Indexes for table `audit_course_floating_dept_log`
--
ALTER TABLE `audit_course_floating_dept_log`
  ADD PRIMARY KEY (`cid`,`sem`,`year`,`dept_id`),
  ADD KEY `audit_course_floating_dept_log_department` (`dept_id`);

--
-- Indexes for table `audit_course_log`
--
ALTER TABLE `audit_course_log`
  ADD PRIMARY KEY (`cid`,`sem`,`year`);

--
-- Indexes for table `audit_map`
--
ALTER TABLE `audit_map`
  ADD PRIMARY KEY (`newcid`,`newsem`,`newyear`,`oldcid`,`oldsem`,`oldyear`);

--
-- Indexes for table `audit_map_log`
--
ALTER TABLE `audit_map_log`
  ADD PRIMARY KEY (`newcid`,`newsem`,`newyear`,`oldcid`,`oldsem`,`oldyear`);

--
-- Indexes for table `current_sem_info`
--
ALTER TABLE `current_sem_info`
  ADD PRIMARY KEY (`sem_type`,`academic_year`);

--
-- Indexes for table `delete_temp_tables`
--
ALTER TABLE `delete_temp_tables`
  ADD PRIMARY KEY (`table_name`,`timestamp_created`);

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
-- Indexes for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD PRIMARY KEY (`email_id`,`sem`,`year`);

--
-- Indexes for table `student_preference_audit`
--
ALTER TABLE `student_preference_audit`
  ADD PRIMARY KEY (`email_id`,`sem`,`year`),
  ADD UNIQUE KEY `rollno` (`rollno`);

--
-- Indexes for table `student_preference_idc`
--
ALTER TABLE `student_preference_idc`
  ADD PRIMARY KEY (`email_id`,`sem`,`year`),
  ADD UNIQUE KEY `rollno` (`rollno`);

--
-- Constraints for dumped tables
--

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
-- Constraints for table `audit_course_floating_dept`
--
ALTER TABLE `audit_course_floating_dept`
  ADD CONSTRAINT `audit_course_floating_dept_audit_course` FOREIGN KEY (`cid`,`sem`,`year`) REFERENCES `audit_course` (`cid`, `sem`, `year`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `audit_course_floating_dept_department` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `audit_course_floating_dept_log`
--
ALTER TABLE `audit_course_floating_dept_log`
  ADD CONSTRAINT `audit_course_floating_dept_log_audit_course` FOREIGN KEY (`cid`,`sem`,`year`) REFERENCES `audit_course_log` (`cid`, `sem`, `year`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `audit_course_floating_dept_log_department` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `audit_map`
--
ALTER TABLE `audit_map`
  ADD CONSTRAINT `audit_map_audit_course` FOREIGN KEY (`newcid`,`newsem`,`newyear`) REFERENCES `audit_course` (`cid`, `sem`, `year`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `audit_map_log`
--
ALTER TABLE `audit_map_log`
  ADD CONSTRAINT `audit_map_log_audit_course_log` FOREIGN KEY (`newcid`,`newsem`,`newyear`) REFERENCES `audit_course_log` (`cid`, `sem`, `year`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD CONSTRAINT `student_marks_student` FOREIGN KEY (`email_id`) REFERENCES `student` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
