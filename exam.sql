-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2025 at 10:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `course_tbl`
--

CREATE TABLE `course_tbl` (
  `c_id` int(11) NOT NULL,
  `course_name` text NOT NULL,
  `course_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_tbl`
--

INSERT INTO `course_tbl` (`c_id`, `course_name`, `course_status`) VALUES
(1, 'HTML', 1),
(2, 'CSS', 1),
(3, 'PHP', 1),
(4, 'C LANGUAGE', 1),
(5, 'C++', 1),
(6, 'JAVA', 1),
(7, 'Javascript', 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `q_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `options` text NOT NULL,
  `ans` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`q_id`, `course_id`, `topic_id`, `question`, `options`, `ans`) VALUES
(1, 4, 7, 'Which control structure is used to repeatedly execute a block of code in C ?', 'nested if,if statement,switch case,while loop', 'd'),
(2, 4, 7, 'What is the result of the expression 5 > 3 && 4 < 6 in C ?', 'true,false,1,0', 'a'),
(3, 4, 7, 'if then else if is also known as....', 'nested if,if with else,if else if ladder,if without else', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `topic_tbl`
--

CREATE TABLE `topic_tbl` (
  `t_id` int(11) NOT NULL,
  `topic_name` text NOT NULL,
  `course_id` int(11) NOT NULL,
  `topic_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topic_tbl`
--

INSERT INTO `topic_tbl` (`t_id`, `topic_name`, `course_id`, `topic_status`) VALUES
(2, 'table layout', 1, 1),
(3, 'header', 2, 1),
(7, 'control statement', 4, 1),
(8, 'while loop', 4, 1),
(9, 'do while loop', 4, 1),
(11, 'for loop', 4, 1),
(12, 'array', 4, 1),
(13, 'string', 4, 1),
(14, 'udf', 4, 1),
(15, 'class object', 5, 1),
(16, 'inheritance', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `exam_id` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `name`, `email`, `password`, `course_id`, `status`, `exam_id`) VALUES
(1, 'Ravi Jasoliya', 'languagepdf@gmail.com', '123', 1, 0, '4'),
(2, 'Jaydeep thummar', 'jaydeepthummar@gmail.com', '159', 3, 0, '4'),
(3, 'chirag', 'chirag@gmail.com', '123', 1, 0, '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_tbl`
--
ALTER TABLE `course_tbl`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `topic_tbl`
--
ALTER TABLE `topic_tbl`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course_tbl`
--
ALTER TABLE `course_tbl`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `topic_tbl`
--
ALTER TABLE `topic_tbl`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
