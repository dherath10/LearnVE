-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 09, 2017 at 11:06 පෙ.ව.
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Learn`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `access_id` int(11) NOT NULL,
  `en_id` int(11) NOT NULL,
  `access_type` varchar(20) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `access_date` date NOT NULL,
  `access_time` time NOT NULL,
  `access_ip` varchar(20) NOT NULL,
  `session_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `ans_id` int(11) NOT NULL,
  `ans_type` varchar(20) NOT NULL,
  `ans_des` text NOT NULL,
  `ans_image` text NOT NULL,
  `ans_status` varchar(20) NOT NULL,
  `q_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `bm_id` int(11) NOT NULL,
  `learn_id` int(11) NOT NULL,
  `lo_id` int(11) NOT NULL,
  `bm_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Computer Science'),
(2, 'Math and Logic'),
(3, 'Data Science'),
(4, 'Information Technology ');

-- --------------------------------------------------------

--
-- Table structure for table `concept`
--

CREATE TABLE `concept` (
  `concept_id` int(11) NOT NULL,
  `concept_name` varchar(200) NOT NULL,
  `concept_des` text NOT NULL,
  `duration` varchar(20) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `con_id` int(11) NOT NULL,
  `con_title` varchar(100) NOT NULL,
  `con_type` varchar(20) NOT NULL,
  `con_path` varchar(200) NOT NULL,
  `lo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `content_review`
--

CREATE TABLE `content_review` (
  `con_id` int(11) NOT NULL,
  `learn_id` int(11) NOT NULL,
  `con_date` date NOT NULL,
  `con_rating` double NOT NULL,
  `con_review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(200) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `course_des` text NOT NULL,
  `course_level` varchar(20) NOT NULL,
  `course_image` text NOT NULL,
  `commitment` varchar(20) NOT NULL,
  `course_status` varchar(20) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_code`, `course_des`, `course_level`, `course_image`, `commitment`, `course_status`, `cat_id`) VALUES
(1, 'Introduction to Python', 'AR#001', 'This course aims to teach everyone the basics of programming computers using Python. We cover the basics of how one constructs a program from a series of simple instructions in Python.  The course has no pre-requisites and avoids all but the simplest mathematics. Anyone with moderate computer experience should be able to master the materials in this course. Once a student completes this course, they will be ready to take more advanced programming courses.', '1', '1_1.jpg', '6', 'Active', 1),
(2, 'Introduction to R', 'AR#002', 'R is rapidly becoming the leading language in data science and statistics. Today, R is the tool of choice for data science professionals in every industry and field. Whether you are full-time number cruncher, or just the occasional data analyst, R will suit your needs.\r\n\r\nThis introduction to R programming course will help you master the basics of R. In seven sections, you will cover its basic syntax, making you ready to undertake your own first data analysis using R. Starting from variables and basic operations, you will eventually learn how to handle data structures such as vectors, matrices, data frames and lists. In the final section, you will dive deeper into the graphical capabilities of R, and create your own stunning data visualizations. No prior knowledge in programming or data science is required.', '1', '1_2.png', '6', 'Active', 1),
(3, 'Basic PostgreSQL', 'AR#003', 'This course helps you understand PostgreSQL quickly. You will learn PostgreSQL fast through many practical examples. We will show you not only problems but also how to solve them creatively in PostgreSQL.\r\nFirst, you will learn how to query data from a single table using basic data selection techniques such as selecting columns, sorting result set, and filtering rows. Then, you will learn about the advanced queries such as joining multiple tables, using set operations, and constructing the subquery. Finally, you will learn how to manage database tables such as creating new a table or modifying an existing table’s structure.', '2', '1_3.png\r\n', '6', 'Active', 1),
(4, 'Basic PHP Programming ', 'AR#004', 'PHP is one of the simplest server-side languages out there, and it was designed primarily for web development. Learning PHP is good not only because it adds one more language to your toolbelt, but also because there is a large number of sites currently built with Wordpress, a content management system (CMS) built with PHP.\r\nBy end the end of this course, you''ll have gained familiarity with a very convenient, flexible server-side language: PHP. You''ll be exposed to many fundamental programming concepts such as data types, functions, control flow, and more.', '1', '1_4.png', '5', 'Active', 1),
(5, 'Java Programming', 'AR#005', 'Java is among the most popular programming languages out there, mainly because of how versatile and compatible it is. Java can be used for a large number of things, including software development, mobile applications, and large systems development. Knowing Java opens a great deal of doors for you as a developer.\r\n\r\nIn this course you''ll be exposed to fundamental programming concepts, including object-oriented programming (OOP) using Java. ', '1', '1_5.jpg', '7', 'Active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_facilitator`
--

CREATE TABLE `course_facilitator` (
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_review`
--

CREATE TABLE `course_review` (
  `cr_id` int(11) NOT NULL,
  `learn_id` int(11) NOT NULL,
  `rating` double NOT NULL,
  `review` text NOT NULL,
  `cr_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `en_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `learner_id` int(11) NOT NULL,
  `en_date` date NOT NULL,
  `en_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `exp_id` int(11) NOT NULL,
  `com_name` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `exp_to` int(11) NOT NULL,
  `exp_from` int(11) NOT NULL,
  `position` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `faq_des` text NOT NULL,
  `faq_datetime` datetime NOT NULL,
  `learn_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `function`
--

CREATE TABLE `function` (
  `fun_id` int(11) NOT NULL,
  `fun_name` varchar(200) NOT NULL,
  `module_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `function`
--

INSERT INTO `function` (`fun_id`, `fun_name`, `module_id`) VALUES
(1, 'Add User', 1),
(2, 'View User', 1),
(3, 'Update User', 1),
(4, 'Delete User', 1),
(5, 'Activate/Deactivate User', 1),
(6, 'Add Course', 2),
(7, 'View Course', 2),
(8, 'Update Course', 2),
(9, 'Activate or Deactivate Course', 2),
(10, 'View Content', 3),
(11, 'Update Content', 3),
(12, 'Add Content', 3),
(13, 'Activate or Deactivate Content', 3),
(14, 'Add Question', 4),
(15, 'Update Question', 5),
(16, 'Activate or Deactivate Question', 5),
(17, 'View Question', 5),
(18, 'Add Learner', 5),
(19, 'Update Learner', 5),
(20, 'Activate or Deactivate Learner', 5),
(21, 'View Learner', 5),
(22, 'View Recommendation', 6),
(23, 'View FAQ', 7),
(24, 'Add FAQ', 7),
(25, 'Update Replay', 8),
(26, 'Delete Reply', 7),
(27, 'Delete FAQ', 7),
(28, 'View Enrollment', 8),
(29, 'View Reference', 9),
(30, 'View Bookmark', 10),
(31, 'View Report', 11),
(32, 'View Log', 12),
(33, 'View Review', 13);

-- --------------------------------------------------------

--
-- Table structure for table `function_user`
--

CREATE TABLE `function_user` (
  `fun_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `function_user`
--

INSERT INTO `function_user` (`fun_id`, `user_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 2),
(6, 3),
(7, 2),
(7, 3),
(8, 2),
(8, 3),
(9, 2),
(9, 3),
(10, 2),
(10, 3),
(11, 2),
(11, 3),
(12, 2),
(12, 3),
(13, 2),
(13, 3),
(14, 2),
(14, 3),
(15, 2),
(15, 3),
(16, 2),
(16, 3),
(17, 2),
(17, 3),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 2),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 2),
(29, 2),
(29, 3),
(30, 2),
(30, 3),
(31, 1),
(31, 2),
(31, 3),
(32, 1),
(33, 2),
(33, 3);

-- --------------------------------------------------------

--
-- Table structure for table `learner`
--

CREATE TABLE `learner` (
  `learn_id` int(11) NOT NULL,
  `learn_fname` varchar(200) NOT NULL,
  `learn_lname` varchar(200) NOT NULL,
  `reg_no` varchar(100) NOT NULL,
  `learn_email` varchar(100) NOT NULL,
  `nic` varchar(20) NOT NULL,
  `learn_gender` varchar(20) NOT NULL,
  `learn_dob` date NOT NULL,
  `learn_image` text NOT NULL,
  `learn_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `learningObject`
--

CREATE TABLE `learningObject` (
  `lo_id` int(11) NOT NULL,
  `lo_name` varchar(200) NOT NULL,
  `lo_page` varchar(200) NOT NULL,
  `concept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `learn_log`
--

CREATE TABLE `learn_log` (
  `ll_log` int(11) NOT NULL,
  `ll_date` date NOT NULL,
  `ll_in` time NOT NULL,
  `ll_out` time NOT NULL,
  `learn_id` int(11) NOT NULL,
  `ll_ip` varchar(25) NOT NULL,
  `ll_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `learn_pre`
--

CREATE TABLE `learn_pre` (
  `pre_id` int(11) NOT NULL,
  `learn_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(11) NOT NULL,
  `proficiency` varchar(200) NOT NULL,
  `level_weigh` int(11) NOT NULL,
  `level_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `proficiency`, `level_weigh`, `level_name`) VALUES
(1, 'Very Easier', 10, 'Beginner'),
(2, 'Easier', 15, 'Beginner'),
(3, 'Medium', 20, 'Intermediate'),
(4, 'Hard', 25, 'Expert'),
(5, 'Very Hard', 30, 'Expert');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `log_in` datetime NOT NULL,
  `log_out` datetime NOT NULL,
  `log_ip` varchar(200) NOT NULL,
  `log_status` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `log_in`, `log_out`, `log_ip`, `log_status`, `user_id`) VALUES
(1, '2017-01-30 11:41:44', '0000-00-00 00:00:00', '::1', 'in', 1),
(2, '2017-01-30 12:01:48', '0000-00-00 00:00:00', '::1', 'in', 1),
(3, '2017-01-30 12:03:20', '0000-00-00 00:00:00', '::1', 'in', 1),
(4, '2017-01-30 12:15:54', '2017-01-30 12:17:45', '::1', 'in', 1),
(5, '2017-02-06 09:28:16', '0000-00-00 00:00:00', '::1', 'in', 1),
(6, '2017-02-13 09:23:23', '0000-00-00 00:00:00', '::1', 'in', 1),
(7, '2017-02-20 09:16:38', '0000-00-00 00:00:00', '::1', 'in', 1),
(8, '2017-02-24 10:17:39', '0000-00-00 00:00:00', '::1', 'in', 1),
(9, '2017-02-26 16:29:03', '0000-00-00 00:00:00', '::1', 'in', 1),
(10, '2017-02-27 09:37:08', '0000-00-00 00:00:00', '::1', 'in', 1),
(11, '2017-02-27 10:05:28', '0000-00-00 00:00:00', '::1', 'in', 1),
(12, '2017-03-06 09:50:35', '0000-00-00 00:00:00', '::1', 'in', 1),
(13, '2017-03-12 13:26:03', '0000-00-00 00:00:00', '::1', 'in', 1),
(14, '2017-03-28 13:45:20', '0000-00-00 00:00:00', '127.0.0.1', 'in', 1),
(15, '2017-06-06 09:43:40', '0000-00-00 00:00:00', '127.0.0.1', 'in', 1),
(16, '2017-06-06 12:01:23', '0000-00-00 00:00:00', '127.0.0.1', 'in', 1),
(17, '2017-06-13 09:23:56', '2017-06-13 10:32:35', '127.0.0.1', 'in', 1),
(18, '2017-06-13 10:32:56', '0000-00-00 00:00:00', '127.0.0.1', 'in', 19),
(19, '2017-06-28 10:08:19', '0000-00-00 00:00:00', '127.0.0.1', 'in', 1),
(20, '2017-06-29 11:07:38', '0000-00-00 00:00:00', '127.0.0.1', 'in', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `user_id`) VALUES
('kushan@esoft.lk', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3),
('rand@esoft.lk', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2),
('yehen@esoft.lk', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `module_id` int(11) NOT NULL,
  `module_name` varchar(200) NOT NULL,
  `module_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`module_id`, `module_name`, `module_image`) VALUES
(1, 'User', 'user.png'),
(2, 'Course', 'Course.png\r\n'),
(3, 'Content', 'content.png'),
(4, 'Question and Answer', 'qna.png'),
(5, 'Leaner', 'learner.jpg'),
(6, 'Recommentation', 'recommendation.png'),
(7, 'FAQ and Reply', 'faq.png'),
(8, 'Enrollment', 'enrollment.png'),
(9, 'Preference', 'preference.png'),
(10, 'Bookmark', 'bookmark.png'),
(11, 'Report', 'report.jpg'),
(12, 'Log and Tracking', 'log.png'),
(13, 'Review', 'review.png');

-- --------------------------------------------------------

--
-- Table structure for table `module_role`
--

CREATE TABLE `module_role` (
  `module_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_role`
--

INSERT INTO `module_role` (`module_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(2, 3),
(3, 2),
(3, 3),
(4, 2),
(4, 3),
(5, 1),
(6, 2),
(6, 3),
(7, 3),
(8, 2),
(9, 2),
(9, 3),
(10, 2),
(10, 3),
(11, 1),
(12, 1),
(12, 2),
(12, 3),
(13, 2),
(13, 3);

-- --------------------------------------------------------

--
-- Table structure for table `network`
--

CREATE TABLE `network` (
  `network_id` int(11) NOT NULL,
  `network_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `network`
--

INSERT INTO `network` (`network_id`, `network_name`) VALUES
(1, 'researchgate.net'),
(2, 'research.google.com'),
(3, 'academia.edu');

-- --------------------------------------------------------

--
-- Table structure for table `preference`
--

CREATE TABLE `preference` (
  `pre_id` int(11) NOT NULL,
  `pre_name` varchar(200) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE `qualification` (
  `qua_id` int(11) NOT NULL,
  `qua_name` varchar(200) NOT NULL,
  `qua_institute` varchar(200) NOT NULL,
  `qua_field` varchar(200) NOT NULL,
  `qua_to` int(11) NOT NULL,
  `qua_from` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `qua_des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `q_id` int(11) NOT NULL,
  `q_des` text NOT NULL,
  `lev_id` int(11) NOT NULL,
  `q_weight` int(11) NOT NULL,
  `q_image` text NOT NULL,
  `lo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recommendation`
--

CREATE TABLE `recommendation` (
  `rec_id` int(11) NOT NULL,
  `rec_type` varchar(200) NOT NULL,
  `id` int(11) NOT NULL,
  `rec_date` date NOT NULL,
  `learn_id` int(11) NOT NULL,
  `session_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `rep_id` int(11) NOT NULL,
  `rep_des` text NOT NULL,
  `rep_datetime` datetime NOT NULL,
  `rep_type` varchar(20) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `en_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `score` double NOT NULL,
  `attempt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Instructional Designer'),
(3, 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(200) NOT NULL,
  `user_lname` varchar(200) NOT NULL,
  `user_title` varchar(200) NOT NULL,
  `user_gender` varchar(20) NOT NULL,
  `user_des` text NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_image` text NOT NULL,
  `user_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fname`, `user_lname`, `user_title`, `user_gender`, `user_des`, `role_id`, `user_image`, `user_status`) VALUES
(1, 'Yehen', 'Tennakoon', 'yehen@esoft.lk', 'Male', '', 1, '', 'Active'),
(2, 'Randima', 'Wicrama', 'rand@esoft.lk', 'Male', '', 2, '', 'Active'),
(3, 'Kushan', 'Wijesinghe', 'kushan@esoft.lk', 'Male', '', 3, '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user_network`
--

CREATE TABLE `user_network` (
  `user_id` int(11) NOT NULL,
  `network_id` int(11) NOT NULL,
  `id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`access_id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`bm_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `concept`
--
ALTER TABLE `concept`
  ADD PRIMARY KEY (`concept_id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `content_review`
--
ALTER TABLE `content_review`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_facilitator`
--
ALTER TABLE `course_facilitator`
  ADD PRIMARY KEY (`course_id`,`user_id`);

--
-- Indexes for table `course_review`
--
ALTER TABLE `course_review`
  ADD PRIMARY KEY (`cr_id`);

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD PRIMARY KEY (`en_id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`exp_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `function`
--
ALTER TABLE `function`
  ADD PRIMARY KEY (`fun_id`);

--
-- Indexes for table `function_user`
--
ALTER TABLE `function_user`
  ADD PRIMARY KEY (`fun_id`,`user_id`);

--
-- Indexes for table `learner`
--
ALTER TABLE `learner`
  ADD PRIMARY KEY (`learn_id`);

--
-- Indexes for table `learningObject`
--
ALTER TABLE `learningObject`
  ADD PRIMARY KEY (`lo_id`);

--
-- Indexes for table `learn_log`
--
ALTER TABLE `learn_log`
  ADD PRIMARY KEY (`ll_log`);

--
-- Indexes for table `learn_pre`
--
ALTER TABLE `learn_pre`
  ADD PRIMARY KEY (`pre_id`,`learn_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `module_role`
--
ALTER TABLE `module_role`
  ADD PRIMARY KEY (`module_id`,`role_id`);

--
-- Indexes for table `network`
--
ALTER TABLE `network`
  ADD PRIMARY KEY (`network_id`);

--
-- Indexes for table `preference`
--
ALTER TABLE `preference`
  ADD PRIMARY KEY (`pre_id`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`qua_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `recommendation`
--
ALTER TABLE `recommendation`
  ADD PRIMARY KEY (`rec_id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`rep_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`en_id`,`question_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_network`
--
ALTER TABLE `user_network`
  ADD PRIMARY KEY (`user_id`,`network_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `access_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `bm_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `concept`
--
ALTER TABLE `concept`
  MODIFY `concept_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `content_review`
--
ALTER TABLE `content_review`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `course_review`
--
ALTER TABLE `course_review`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `enroll`
--
ALTER TABLE `enroll`
  MODIFY `en_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `function`
--
ALTER TABLE `function`
  MODIFY `fun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `learner`
--
ALTER TABLE `learner`
  MODIFY `learn_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `learningObject`
--
ALTER TABLE `learningObject`
  MODIFY `lo_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `learn_log`
--
ALTER TABLE `learn_log`
  MODIFY `ll_log` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `network`
--
ALTER TABLE `network`
  MODIFY `network_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `preference`
--
ALTER TABLE `preference`
  MODIFY `pre_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `qua_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `recommendation`
--
ALTER TABLE `recommendation`
  MODIFY `rec_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `rep_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
