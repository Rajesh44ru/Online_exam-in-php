-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2021 at 04:07 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(4, 'CSIT', 0, '2021-11-21', '2021-11-21'),
(5, 'BCA', 0, '2021-11-21', '2021-11-21'),
(9, 'BHM', 0, '2021-12-03', '2021-12-03'),
(11, 'BE', 0, '2021-12-11', '2021-12-11'),
(12, 'BBA', 0, '2021-12-16', '2021-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `exam_date` date NOT NULL,
  `full_marks` int(50) NOT NULL,
  `exam_duration` int(50) NOT NULL,
  `terms_n_conditions` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `course_id`, `name`, `exam_date`, `full_marks`, `exam_duration`, `terms_n_conditions`, `created_at`, `updated_at`) VALUES
(6, 4, 'csit first term', '2021-12-11', 60, 60, 'terms and condition', '2021-12-08', '2021-12-08'),
(7, 5, 'Bca first term', '2021-12-16', 60, 100, 'terms and condition', '2021-12-08', '2021-12-08'),
(8, 11, 'BE FIRST TERM', '2021-12-11', 60, 60, 'TERM', '2021-12-11', '2021-12-11'),
(9, 12, 'BBA FIRST', '2021-12-15', 60, 60, 'TERM', '2021-12-16', '2021-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `address` varchar(25) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pin` int(25) NOT NULL,
  `user_type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `email`, `mobile`, `address`, `city`, `pin`, `user_type`) VALUES
(4, 'Rajesh', '12345', 'rsingh@gmail.com', '9818335585', 'kalanki', 'kathmandu', 4402, 'admin'),
(9, 'Suresh', '827ccb0eea8a706c4c34a16891f84e7b', 'sureshsingh@gmail.co', '9812122398', 'kathamndu ', 'pokhara', 4412, 'student'),
(10, 'Nikesh', '827ccb0eea8a706c4c34a16891f84e7b', 'nikesh123@gmail.com', '1552258', 'kalanki', 'chitwan', 1112, 'student');

-- --------------------------------------------------------

--
-- Table structure for table `question_list`
--

CREATE TABLE `question_list` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `subjects_id` int(11) NOT NULL,
  `ques` varchar(200) NOT NULL,
  `opt_a` varchar(50) NOT NULL,
  `opt_b` varchar(50) NOT NULL,
  `opt_c` varchar(50) NOT NULL,
  `opt_d` varchar(50) NOT NULL,
  `correct_opt` varchar(50) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_list`
--

INSERT INTO `question_list` (`id`, `exam_id`, `subjects_id`, `ques`, `opt_a`, `opt_b`, `opt_c`, `opt_d`, `correct_opt`, `created_at`, `updated_at`) VALUES
(7, 6, 1, '<p>C programming is&nbsp;</p>\r\n', 'web programming', 'object oriented', 'structured programming', 'both b and c', 'C', '2021-12-08', '2021-12-08'),
(8, 6, 1, '<p>Function declaration in C programming as</p>\r\n', 'function_name return_type(arg1,agg2..argn){};', 'return_type function_name(arg1,arg2){};', 'function_name(arg1,arg2);', 'function(arg1,arg2);', 'B', '2021-12-08', '2021-12-08'),
(9, 6, 1, '<p>In c programming &#39;int&#39; is&nbsp;</p>\r\n', 'variable', 'function', 'datatype', 'keyword', 'D', '2021-12-08', '2021-12-08'),
(10, 6, 1, '<p>int a=&quot;kathford&quot;; gives</p>\r\n', 'syntax error', 'semantic error', 'function  error', 'exception error', 'B', '2021-12-08', '2021-12-08'),
(11, 6, 1, '<p>In c programming &#39;printf()&#39; is&nbsp;&nbsp;</p>\r\n', 'input function', 'output function', 'not a function', 'both A and B', 'B', '2021-12-08', '2021-12-08'),
(12, 6, 13, '<p>The eigen value of A=[1&nbsp; 6] is<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;[5 2]</p>\r\n', '0', '-7', '7', '5', 'C', '2021-12-08', '2021-12-08'),
(13, 6, 13, '<p>if f(x)=x^2-1 ,g(x)=sinx,h(x)=x^2 then fogoh =</p>\r\n', 'sin^2.x^2 -1 ', 'sin^2 . x^2', 'sin^2.x^4', 'sin^3.x^4', 'A', '2021-12-08', '2021-12-08'),
(14, 8, 14, '<p>Worst case is measured bg</p>\r\n', 'bigoh', 'bigomega', 'bigtheda', 'fff', 'A', '2021-12-11', '2021-12-11'),
(15, 9, 15, '<p>WHAT IS MIJ</p>\r\n', 'SDD', 'SSDD', 'SDDD', 'DSF', 'B', '2021-12-16', '2021-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `student_exam`
--

CREATE TABLE `student_exam` (
  `id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `subjects_id` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `course_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 4, 'c programming', '', '2021-11-21', '2021-11-21'),
(13, 4, 'math', '', '2021-12-08', '2021-12-08'),
(14, 11, 'DSA', '', '2021-12-11', '2021-12-11'),
(15, 12, 'POM', '', '2021-12-16', '2021-12-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_list`
--
ALTER TABLE `question_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_exam`
--
ALTER TABLE `student_exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `question_list`
--
ALTER TABLE `question_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `student_exam`
--
ALTER TABLE `student_exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
