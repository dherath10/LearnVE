-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 25, 2017 at 06:43 පෙ.ව.
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
  `ans_des` text NOT NULL,
  `ans_status` varchar(20) NOT NULL,
  `q_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`ans_id`, `ans_des`, `ans_status`, `q_id`) VALUES
(22, 'Lower Case', '0', 9),
(23, 'Upper Case', '0', 9),
(24, 'Capitalized', '0', 9),
(25, 'Camel Case', '0', 9),
(26, 'None of Above', '1', 9),
(27, '# This is a comment', '1', 10),
(28, '// This is a comment', '0', 10),
(29, '/* This is a comment */', '0', 10),
(30, '! This is a comment ', '0', 10),
(31, 'None of Above', '0', 10),
(32, 'my_string_1', '0', 11),
(33, '1st_string', '1', 11),
(34, 'foo', '0', 11),
(35, '_boo', '0', 11),
(36, 'MyStr', '0', 11),
(37, '1 and 2 Only', '0', 12),
(38, '2 and 4 Only', '0', 12),
(39, '1, 3 and 5 Only', '0', 12),
(40, '2, 4 and 5 Only', '1', 12),
(41, '3,4 and 5 Only', '0', 12),
(42, 'Lists ', '0', 13),
(43, 'Dictionary', '0', 13),
(44, 'Tuples ', '0', 13),
(45, 'Class', '1', 13),
(46, 'Number', '0', 13),
(47, 'eval', '1', 14),
(48, 'if', '0', 14),
(49, 'pass', '0', 14),
(50, 'continue', '0', 14),
(51, 'assert', '0', 14),
(52, 'float,list,dictionary', '1', 15),
(53, 'integer,tuple,dictionary', '0', 15),
(54, 'float,list,tuple', '0', 15),
(55, 'integer,tuple,list', '0', 15),
(56, 'float,tuple,dictionary', '0', 15),
(57, 'py python.py', '0', 16),
(58, 'py myprog.py', '0', 16),
(59, 'python myprog.py', '1', 16),
(60, 'myprog.py', '0', 16),
(61, 'None of Above', '0', 16),
(62, 'a', '0', 17),
(63, 'b', '1', 17),
(64, 'c', '0', 17),
(65, 'd', '0', 17),
(66, 'e', '0', 17),
(67, 'a', '0', 18),
(68, 'b', '1', 18),
(69, 'c', '0', 18),
(70, 'd', '0', 18),
(71, 'e', '0', 18),
(72, '3', '0', 19),
(73, '1', '1', 19),
(74, '3.2', '0', 19),
(75, 'ZeroDivisionError', '0', 19),
(76, '0', '0', 19),
(77, '1', '0', 20),
(78, '4.2', '0', 20),
(79, '4', '1', 20),
(80, 'Null', '0', 20),
(81, '0', '0', 20),
(82, '2.5', '0', 21),
(83, '2', '0', 21),
(84, '2.0', '1', 21),
(85, '1.0', '0', 21),
(86, 'None of Above', '0', 21),
(87, '50', '1', 22),
(88, '1/2', '0', 22),
(89, '0.5', '0', 22),
(90, '0', '0', 22),
(91, 'DivisionError ', '0', 22),
(92, '0', '0', 23),
(93, '1', '0', 23),
(94, 'True', '0', 23),
(95, 'False', '1', 23),
(96, 'Null', '0', 23),
(97, '1', '0', 24),
(98, '80', '0', 24),
(99, '200000', '0', 24),
(100, '5', '0', 24),
(101, '320', '1', 24),
(102, '6', '0', 25),
(103, '4', '0', 25),
(104, '7.3333333333333', '0', 25),
(105, '7', '1', 25),
(106, '0', '0', 25),
(107, '81', '0', 26),
(108, '121', '0', 26),
(109, '22', '0', 26),
(110, '-9', '1', 26),
(111, '-11', '0', 26),
(112, '0.0', '1', 27),
(113, '0', '0', 27),
(114, '200', '0', 27),
(115, '200.2', '0', 27),
(116, 'SyntaxError', '0', 27),
(117, '0', '0', 28),
(118, '0.0', '0', 28),
(119, '14', '1', 28),
(120, '40', '0', 28),
(121, '2048', '0', 28),
(122, 'Guido van Rossum', '1', 29),
(123, 'Rasmus Lerdorf', '0', 29),
(124, 'James Gosling', '0', 29),
(125, 'Yukihiro Matsumoto', '0', 29),
(126, 'Rob Pike', '0', 29),
(127, 'a compiled Language', '0', 30),
(128, 'an interpreted language', '1', 30),
(129, 'a machine language', '0', 30),
(130, 'a compiled and an interpreted language', '0', 30),
(131, 'None of Above', '0', 30),
(132, 'Yes', '0', 31),
(133, 'SyntaxError', '0', 31),
(134, 'Display Nothing', '1', 31),
(135, '#!/usr/bin/python', '0', 31),
(136, 'None of Above', '0', 31),
(137, 'No problem', '0', 32),
(138, 'line one there is a comment', '0', 32),
(139, 'There is a colon in line 4', '0', 32),
(140, 'Line 5 indentation is missing', '1', 32),
(141, 'At the end of every line semi-colon is missing', '0', 32),
(142, 'Pass', '1', 33),
(143, 'Fail', '0', 33),
(144, 'status', '0', 33),
(145, 'SyntaxError', '0', 33),
(146, 'None of Above', '0', 33),
(147, 'Fail', '0', 34),
(148, 'Pass', '0', 34),
(149, 'Display Nothing', '0', 34),
(150, 'status', '1', 34),
(151, 'None of Above', '0', 34),
(152, 'x is a positive single digit.', '1', 35),
(153, 'x is a negative digit.', '0', 35),
(154, 'x has more than 1 digit.', '0', 35),
(155, 'SyntaxError', '0', 35),
(156, 'Display Nothing', '0', 35),
(157, 'x is a positive single digit.', '1', 36),
(158, 'x is a negative digit.', '0', 36),
(159, 'x has more than 1 digit.', '0', 36),
(160, 'SyntaxError', '0', 36),
(161, 'Display Nothing', '0', 36),
(162, 'True', '0', 37),
(163, 'False', '0', 37),
(164, 'SyntaxError', '0', 37),
(165, 'true', '0', 37),
(166, 'false', '1', 37),
(167, 'A', '1', 38),
(168, 'B', '0', 38),
(169, 'A Minus', '0', 38),
(170, 'Minus', '0', 38),
(171, 'None of Above', '0', 38),
(172, 'NameError: name ''A'' is not defined', '1', 39),
(173, 'Not a candidate(Under age)', '0', 39),
(174, 'Candidate', '0', 39),
(175, 'Not a candidate(Over age)', '0', 39),
(176, 'not applicable', '0', 39),
(177, 'zero', '0', 40),
(178, 'One', '0', 40),
(179, 'more than One', '0', 40),
(180, 'more than Zero', '1', 40),
(181, 'None of Above', '0', 40),
(182, 'always', '0', 41),
(183, 'when an exception occurs', '0', 41),
(184, 'when no exception occurs', '1', 41),
(185, 'when an exception occurs in to except block', '0', 41),
(186, 'None of Above', '0', 41),
(187, '2*n', '0', 42),
(188, 'n', '1', 42),
(189, 'n-1', '0', 42),
(190, 'n+1', '0', 42),
(191, 'n-2', '0', 42),
(192, '10', '1', 43),
(193, '9', '0', 43),
(194, 'SyntaxError', '0', 43),
(195, 'Display Nothing', '0', 43),
(196, '100', '0', 43),
(197, 'p p p p', '0', 44),
(198, 'python', '0', 44),
(199, 'p p p p p', '1', 44),
(200, 'p', '0', 44),
(201, 'None of Above', '0', 44),
(202, '5', '0', 45),
(203, '6', '1', 45),
(204, '7', '0', 45),
(205, '0', '0', 45),
(206, '10', '0', 45),
(207, 'Repeat a chunk of code a given number of times', '0', 46),
(208, 'Repeat a chunk of code until a condition is true', '1', 46),
(209, 'Repeat a chunk of code until a condition is false', '0', 46),
(210, 'Repeat a chunk of code indefinitely', '0', 46),
(211, 'None of Above', '0', 46),
(212, '3 9 27 81', '0', 47),
(213, '3 9', '0', 47),
(214, '3 9 27', '1', 47),
(215, '1 2 3 4 5 6 7 8 9 10', '0', 47),
(216, 'None of Above', '0', 47),
(217, '100', '0', 48),
(218, '90', '0', 48),
(219, '10', '0', 48),
(220, '9', '0', 48),
(221, '45', '1', 48),
(222, '17 29', '0', 49),
(223, '17 29 17 29 17 29', '0', 49),
(224, '12  16 17 24 29', '0', 49),
(225, '17 17 17 29 29 29', '1', 49),
(226, '12 16 24', '0', 49),
(227, '17 29', '0', 50),
(228, '12 ', '0', 50),
(229, '12 16 24 30', '0', 50),
(230, '12 16 17 24 29 30', '0', 50),
(231, '12 16', '1', 50),
(232, '12 16', '0', 51),
(233, '12 16 17', '0', 51),
(234, '12 16 24 30', '0', 51),
(235, '17', '0', 51),
(236, '17 29', '1', 51),
(237, '100', '0', 52),
(238, '25', '0', 52),
(239, '87', '1', 52),
(240, '200', '0', 52),
(241, '100 25 87 200', '0', 52),
(242, '1', '0', 53),
(243, '16', '0', 53),
(244, '6', '0', 53),
(245, '9', '0', 53),
(246, 'None of Above', '1', 53),
(247, 'print(t[3])', '0', 54),
(248, 't[3] = 45', '1', 54),
(249, 'print(max(t))', '0', 54),
(250, 'print(len(t))', '0', 54),
(251, 'print(min(t))', '0', 54),
(252, '(1, 2, 3, 4)', '0', 55),
(253, '(2, 3)', '1', 55),
(254, '(2, 3,4)', '0', 55),
(255, '()', '0', 55),
(256, '1', '0', 55),
(257, 'd = {}', '0', 56),
(258, 'd = []', '1', 56),
(259, 'd = {â€œjohnâ€:40, â€œpeterâ€:45}', '0', 56),
(260, 'd = {40:â€johnâ€, 45:â€peterâ€}', '0', 56),
(261, 'd = {40:â€johnâ€,}', '0', 56),
(262, 'Daminda and 7', '0', 57),
(263, '7 and 6', '0', 57),
(264, 'Daminda and Herath', '1', 57),
(265, 'Herath and 6', '0', 57),
(266, 'None of Above', '0', 57),
(267, '101', '0', 58),
(268, '100', '0', 58),
(269, '100.0', '0', 58),
(270, '101.0', '1', 58),
(271, 'None of Above', '0', 58),
(272, '6', '0', 59),
(273, '7', '0', 59),
(274, '6.0', '0', 59),
(275, '7.0', '1', 59),
(276, 'None of Above', '0', 59),
(277, 'n Pro', '0', 60),
(278, 'Prog', '0', 60),
(279, 'Pro', '1', 60),
(280, 'Pyt', '0', 60),
(281, 'Python', '0', 60),
(282, 'PROGRAMIN', '1', 61),
(283, 'Programin', '0', 61),
(284, 'PRO', '0', 61),
(285, 'GRAMIN', '0', 61),
(286, 'PYTHON', '0', 61);

-- --------------------------------------------------------

--
-- Table structure for table `attempt`
--

CREATE TABLE `attempt` (
  `attempt_id` int(11) NOT NULL,
  `attempt_sdate` datetime NOT NULL,
  `attempt_fdate` datetime NOT NULL,
  `attempt_type` varchar(20) NOT NULL,
  `attempt_status` varchar(20) NOT NULL,
  `attempt_time` int(11) NOT NULL,
  `en_id` int(11) NOT NULL,
  `concept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attempt`
--

INSERT INTO `attempt` (`attempt_id`, `attempt_sdate`, `attempt_fdate`, `attempt_type`, `attempt_status`, `attempt_time`, `en_id`, `concept_id`) VALUES
(63, '2017-07-24 18:47:35', '2017-07-24 18:48:47', '1', '1', 1, 1, 1),
(64, '2017-07-24 21:24:19', '2017-07-24 21:24:53', '1', '1', 1, 7, 1),
(65, '2017-07-24 21:49:58', '2017-07-24 21:50:25', '1', '1', 1, 1, 2),
(69, '2017-07-25 00:13:54', '2017-07-25 00:14:50', '1', '1', 1, 1, 3),
(70, '2017-07-25 08:54:49', '2017-07-25 08:55:36', '1', '1', 1, 1, 4),
(71, '2017-07-25 08:57:50', '2017-07-25 08:58:52', '1', '1', 1, 8, 4),
(72, '2017-07-25 10:08:33', '2017-07-25 10:09:16', '1', '1', 1, 8, 5);

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
  `concept_code` varchar(20) NOT NULL,
  `concept_name` varchar(200) NOT NULL,
  `concept_des` text NOT NULL,
  `duration` varchar(20) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `concept`
--

INSERT INTO `concept` (`concept_id`, `concept_code`, `concept_name`, `concept_des`, `duration`, `course_id`) VALUES
(1, '1_1', 'Introduction to Python', 'In the first chapter we try to cover the overview of python programming, how to run a code, what are the python objects, keywords, how to create variables and assignment ', '10', 1),
(2, '1_2', 'Operators and Expressions in Python', 'In this chapter we cover operators in python and Operator Precedence', '3', 1),
(3, '1_3', 'Selection Control Structure in Python', 'In this section we move from sequential code that simply runs one line of code after another to conditional code where some steps are skipped. It is a very simple concept - but it is how computer software makes "choices". ', '5', 1),
(4, '1_4', 'Loop control structure', 'Loops are the way we tell Python to do something over and over. Loops are the way we build programs that stay with a problem until the problem is solved. ', '7', 1),
(5, '1_5', 'List,Tuple,Dictionary,Number and String', 'In this chapter we cover standard data types.\r\nPython has various standard data types that are used to define the operations possible on them and the storage method for each of them.\r\n\r\nPython has five standard data types Numbers, String ,List,Tuple,Dictionary', '12', 1),
(6, '1_6', 'Functions', 'We will learn about what functions are and how we can use them. In the complex programs, functions will be an essential way for us to make sense of our code.', '6', 1),
(7, '1_7', 'Handling Files', 'This chapter covers all the basic I/O functions available in Python.', '6', 1);

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
(1, 'Introduction to Python Programming', 'L#001', 'This course aims to teach everyone the basics of programming computers using Python. We cover the basics of how one constructs a program from a series of simple instructions in Python.  The course has no pre-requisites and avoids all but the simplest mathematics. Anyone with moderate computer experience should be able to master the materials in this course. Once a student completes this course, they will be ready to take more advanced programming courses.', '1', '1_1.jpg', '60', 'Active', 1),
(2, 'Introduction to R', 'L#002', 'R is rapidly becoming the leading language in data science and statistics. Today, R is the tool of choice for data science professionals in every industry and field. Whether you are full-time number cruncher, or just the occasional data analyst, R will suit your needs.\r\n\r\nThis introduction to R programming course will help you master the basics of R. In seven sections, you will cover its basic syntax, making you ready to undertake your own first data analysis using R. Starting from variables and basic operations, you will eventually learn how to handle data structures such as vectors, matrices, data frames and lists. In the final section, you will dive deeper into the graphical capabilities of R, and create your own stunning data visualizations. No prior knowledge in programming or data science is required.', '1', '1_2.png', '60', 'Active', 1),
(3, 'Basic PostgreSQL', 'L#003', 'This course helps you understand PostgreSQL quickly. You will learn PostgreSQL fast through many practical examples. We will show you not only problems but also how to solve them creatively in PostgreSQL.\r\nFirst, you will learn how to query data from a single table using basic data selection techniques such as selecting columns, sorting result set, and filtering rows. Then, you will learn about the advanced queries such as joining multiple tables, using set operations, and constructing the subquery. Finally, you will learn how to manage database tables such as creating new a table or modifying an existing table’s structure.', '2', '1_3.png\r\n', '50', 'Active', 1),
(4, 'Basic PHP Programming ', 'L#004', 'PHP is one of the simplest server-side languages out there, and it was designed primarily for web development. Learning PHP is good not only because it adds one more language to your toolbelt, but also because there is a large number of sites currently built with Wordpress, a content management system (CMS) built with PHP.\r\nBy end the end of this course, you''ll have gained familiarity with a very convenient, flexible server-side language: PHP. You''ll be exposed to many fundamental programming concepts such as data types, functions, control flow, and more.', '1', '1_4.png', '50', 'Active', 1),
(5, 'Java Programming', 'L#005', 'Java is among the most popular programming languages out there, mainly because of how versatile and compatible it is. Java can be used for a large number of things, including software development, mobile applications, and large systems development. Knowing Java opens a great deal of doors for you as a developer.\r\n\r\nIn this course you''ll be exposed to fundamental programming concepts, including object-oriented programming (OOP) using Java. ', '1', '1_5.jpg', '45', 'Active', 1),
(6, 'Machine Learning for Recommender System', 'IT3001', 'Learn how to use Amazon, Netflix, Facebook and LinkedIn''s recommender technologies to influence and increase sales.\r\nRecommender Systems have changed the way people find products, information, and even other people. They study patterns of behavior to know what someone will prefer from among a collection of things they have never experienced. The technology behind recommender systems has evolved over the past 20 years into a rich collection of tools that enable the practitioner or researcher to develop effective recommenders. Such systems are being used by companies such as Amazon, Facebook, Netflix, LinkedIn, Quora, Udemy, New York Times, etc. By taking this course, you will learn the most important of those tools, including how they work, how to use them, how to evaluate them, and their strengths and weaknesses in practice. The algorithms you will study include popularity-based systems, classification-based approach, collaborative filtering, matrix recommendation, etc.', '3', '1_6.jpg', '20', 'Active', 1),
(7, 'Django Core - A Reference Guide to Core Django Concepts', 'IT3002', 'Dive in deep to the core concepts behind the power Django framework written in Python. Using Django 1.10 with Python 3', '3', '1_7.jpg', '30', 'Active', 1),
(8, 'Learn and Understand NodeJS', 'IT2002', 'Dive deep under the hood of NodeJS. Learn V8, Express, the MEAN stack, core Javascript concepts, and more.\r\nNodeJS is a rapidy growing web server technology, and Node developers are among the highest paid in the industry. Knowing NodeJS well will get you a job or improve your current one by enabling you to build high quality, robust web applications.\r\n\r\nIn this course you will gain a deep understanding of Node, learn how NodeJS works under the hood, and how that knowledge helps you avoid common pitfalls and drastically improve your ability to debug problems.', '2', '1_8.jpg', '30', 'Active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_facilitator`
--

CREATE TABLE `course_facilitator` (
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_facilitator`
--

INSERT INTO `course_facilitator` (`course_id`, `user_id`) VALUES
(1, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `course_pre`
--

CREATE TABLE `course_pre` (
  `course_id` int(11) NOT NULL,
  `pre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_pre`
--

INSERT INTO `course_pre` (`course_id`, `pre_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 13),
(1, 14),
(2, 1),
(2, 15),
(3, 1),
(3, 9),
(3, 10),
(3, 16),
(4, 13),
(4, 14),
(4, 17),
(5, 1),
(5, 4),
(5, 5),
(5, 14),
(6, 1),
(6, 18),
(7, 2),
(7, 3),
(7, 13),
(7, 20),
(8, 13),
(8, 14),
(8, 19);

-- --------------------------------------------------------

--
-- Table structure for table `course_review`
--

CREATE TABLE `course_review` (
  `cr_id` int(11) NOT NULL,
  `learn_id` int(11) NOT NULL,
  `rating` double NOT NULL,
  `review` text NOT NULL,
  `cr_date` datetime NOT NULL,
  `course_id` int(11) NOT NULL,
  `cr_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_review`
--

INSERT INTO `course_review` (`cr_id`, `learn_id`, `rating`, `review`, `cr_date`, `course_id`, `cr_status`) VALUES
(1, 1, 4, 'Good', '0000-00-00 00:00:00', 1, '0'),
(2, 2, 3, 'Not Bad', '0000-00-00 00:00:00', 1, '0'),
(3, 1, 4, 'Good', '2017-07-16 00:00:00', 2, '0'),
(4, 1, 5, 'Very Good', '2017-07-16 20:24:54', 5, '0'),
(5, 1, 1, 'bad', '2017-07-16 20:26:14', 3, '0'),
(6, 3, 5, 'Very Good', '2017-07-17 12:37:31', 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `dis_id` int(11) NOT NULL,
  `dis_name` text NOT NULL,
  `province` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`dis_id`, `dis_name`, `province`) VALUES
(1, 'Matara', 'Southern'),
(2, 'Kaluthara', 'Western');

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `en_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `learn_id` int(11) NOT NULL,
  `en_date` date NOT NULL,
  `en_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`en_id`, `course_id`, `learn_id`, `en_date`, `en_status`) VALUES
(1, 1, 1, '2017-07-14', 'Active'),
(2, 4, 1, '2017-07-14', 'Active'),
(3, 2, 1, '2017-07-14', 'Active'),
(4, 5, 1, '2017-07-14', 'Active'),
(5, 3, 1, '2017-07-16', 'Active'),
(6, 1, 3, '2017-07-17', 'Active'),
(7, 1, 2, '2017-07-17', 'Active'),
(8, 1, 4, '2017-07-25', 'Active');

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
  `user_id` int(11) NOT NULL,
  `exp_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`exp_id`, `com_name`, `location`, `exp_to`, `exp_from`, `position`, `user_id`, `exp_status`) VALUES
(1, 'University of Colombo School of Computing\r\n', 'Colombo, Sri Lanka', 0, 0, 'Senior Lecturer', 3, 1),
(2, 'University of Colombo School of Computing\r\n', 'Colombo, Sri Lanka', 0, 0, 'Research Student', 2, 1);

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
  `learn_status` varchar(20) NOT NULL,
  `learn_pass` text NOT NULL,
  `dis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `learner`
--

INSERT INTO `learner` (`learn_id`, `learn_fname`, `learn_lname`, `reg_no`, `learn_email`, `nic`, `learn_gender`, `learn_dob`, `learn_image`, `learn_status`, `learn_pass`, `dis_id`) VALUES
(1, 'Githmi', 'Thilakarathna', 'R1001', 'pkgithmisajana@gmail.com ', '961111111v', 'Female', '1996-01-22', '1.jpg', 'Active', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1),
(2, 'Indeevari', 'Perera', 'R1002', 'indeevarip@gmail.com', '922222222V', 'Female', '1992-10-11', '2.jpg', 'Active', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2),
(3, 'Yasanthika ', 'Mathotaarachchi', 'R1003', 'yasanthikam@gmail.com ', '', 'Female', '1089-10-17', '3.jpg', 'Active', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3),
(4, 'Nuwan', 'Hemachandra', 'R1004', 'nuwanht@gmail.com ', '921234567V', 'Male', '1992-08-08', '4.jpg', 'Active', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1),
(5, 'Shashini ', 'Minshara', 'R1005', 'shashiniminsara@gmail.com ', '921345256V', 'Female', '1992-12-17', '5.jpg', 'Active', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2);

-- --------------------------------------------------------

--
-- Table structure for table `learningObject`
--

CREATE TABLE `learningObject` (
  `lo_id` int(11) NOT NULL,
  `lo_name` varchar(200) NOT NULL,
  `lo_page` varchar(200) NOT NULL,
  `concept_id` int(11) NOT NULL,
  `lo_duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `learningObject`
--

INSERT INTO `learningObject` (`lo_id`, `lo_name`, `lo_page`, `concept_id`, `lo_duration`) VALUES
(1, 'Overview of Python', '1_1_1', 1, 1),
(2, 'How to use python', '1_1_2', 1, 1),
(3, 'Python objects', '1_1_3', 1, 1),
(4, 'Variables and Assignments', '1_1_4', 1, 2),
(5, 'Python Keywords', '1_1_5', 1, 1),
(6, 'Types of operators', '1_2_1', 2, 3),
(7, 'Operators precedence', '1_2_2', 2, 1),
(8, 'if, if else and Multi-way selection', '1_3_1', 3, 1),
(10, 'Nested selection', '1_3_3', 3, 2),
(11, 'Exception Handling', '1_3_4', 3, 1),
(12, 'The for loop', '1_4_1', 4, 2),
(13, 'The while loop', '1_4_2', 4, 2),
(14, 'Nested loop', '1_4_3', 4, 2),
(15, 'break and continue', '1_4_4', 4, 1),
(16, 'Lists', '1_5_1', 5, 0),
(17, 'Tuples', '1_5_2', 5, 0),
(18, 'Dictionaries', '1_5_3', 5, 0),
(19, 'Number', '1_5_4', 5, 0),
(20, 'String', '1_5_5', 5, 0),
(21, 'Defining and Calling a function', '1_6_1', 6, 0),
(22, 'Function Arguments', '1_6_2', 6, 0),
(23, 'Return Statement', '1_6_3', 6, 0),
(24, 'Scope of variables', '1_6_4', 6, 0),
(25, 'Reading keyboard Input ', '1_7_1', 7, 0),
(26, 'Opening and Closing files', '1_7_2', 7, 0),
(27, 'Reading and Writing files', '1_7_3', 7, 0),
(28, 'File and Directory Handling', '1_7_4', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `learn_log`
--

CREATE TABLE `learn_log` (
  `ll_log` int(11) NOT NULL,
  `ll_date` date NOT NULL,
  `ll_in` time NOT NULL,
  `ll_out` datetime NOT NULL,
  `learn_id` int(11) NOT NULL,
  `ll_ip` varchar(25) NOT NULL,
  `ll_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `learn_log`
--

INSERT INTO `learn_log` (`ll_log`, `ll_date`, `ll_in`, `ll_out`, `learn_id`, `ll_ip`, `ll_status`) VALUES
(1, '2017-07-14', '12:22:13', '2017-07-17 00:00:00', 1, '127.0.0.1', 'in'),
(2, '2017-07-14', '12:22:18', '2017-07-17 00:00:00', 1, '127.0.0.1', 'in'),
(3, '2017-07-14', '12:27:10', '2017-07-17 00:00:00', 1, '127.0.0.1', 'in'),
(4, '2017-07-14', '12:27:32', '2017-07-17 00:00:00', 1, '127.0.0.1', 'in'),
(5, '2017-07-14', '12:29:26', '2017-07-17 00:00:00', 1, '127.0.0.1', 'in'),
(6, '2017-07-14', '12:29:43', '2017-07-17 00:00:00', 1, '127.0.0.1', 'in'),
(7, '2017-07-14', '12:54:23', '2017-07-17 00:00:00', 1, '127.0.0.1', 'in'),
(8, '2017-07-14', '14:19:23', '2017-07-17 00:00:00', 1, '127.0.0.1', 'in'),
(9, '2017-07-14', '14:50:19', '2017-07-17 00:00:00', 1, '127.0.0.1', 'in'),
(10, '2017-07-14', '15:34:25', '2017-07-17 00:00:00', 1, '127.0.0.1', 'in'),
(11, '2017-07-14', '15:35:37', '2017-07-17 00:00:00', 1, '127.0.0.1', 'in'),
(12, '2017-07-14', '15:37:20', '2017-07-17 00:00:00', 1, '127.0.0.1', 'in'),
(13, '2017-07-14', '15:43:08', '2017-07-17 00:00:00', 1, '127.0.0.1', 'in'),
(14, '2017-07-14', '15:44:37', '2017-07-17 00:00:00', 1, '127.0.0.1', 'in'),
(15, '2017-07-14', '15:48:13', '2017-07-17 00:00:00', 1, '127.0.0.1', 'in'),
(16, '2017-07-14', '18:40:01', '2017-07-17 00:00:00', 1, '127.0.0.1', 'in'),
(17, '2017-07-17', '00:06:59', '2017-07-17 00:00:00', 1, '127.0.0.1', 'in'),
(18, '2017-07-17', '01:33:19', '2017-07-17 00:00:00', 2, '127.0.0.1', 'in'),
(19, '2017-07-17', '02:13:34', '2017-07-17 00:00:00', 3, '127.0.0.1', 'in'),
(20, '2017-07-17', '02:28:11', '2017-07-17 00:00:00', 1, '127.0.0.1', 'in'),
(21, '2017-07-17', '12:22:21', '2017-07-17 00:00:00', 2, '127.0.0.1', 'in'),
(22, '2017-07-17', '12:30:35', '0000-00-00 00:00:00', 2, '127.0.0.1', 'in'),
(23, '2017-07-17', '12:31:38', '2017-07-17 12:31:40', 1, '127.0.0.1', 'in'),
(24, '2017-07-17', '12:32:56', '2017-07-17 12:33:00', 3, '127.0.0.1', 'out'),
(25, '2017-07-17', '12:37:14', '0000-00-00 00:00:00', 3, '127.0.0.1', 'in'),
(26, '2017-07-20', '11:14:02', '2017-07-20 20:21:40', 1, '127.0.0.1', 'out'),
(27, '2017-07-20', '20:21:55', '2017-07-20 21:35:38', 2, '127.0.0.1', 'out'),
(28, '2017-07-20', '21:35:46', '2017-07-21 01:19:50', 1, '127.0.0.1', 'out'),
(29, '2017-07-21', '01:29:52', '2017-07-21 01:47:14', 3, '127.0.0.1', 'out'),
(30, '2017-07-21', '01:52:39', '2017-07-21 01:53:13', 2, '127.0.0.1', 'out'),
(31, '2017-07-21', '01:53:20', '0000-00-00 00:00:00', 3, '127.0.0.1', 'in'),
(32, '2017-07-21', '21:52:30', '0000-00-00 00:00:00', 1, '127.0.0.1', 'in'),
(33, '2017-07-24', '12:24:28', '2017-07-24 21:23:54', 1, '127.0.0.1', 'out'),
(34, '2017-07-24', '21:24:12', '2017-07-24 21:49:33', 2, '127.0.0.1', 'out'),
(35, '2017-07-24', '21:49:51', '2017-07-25 08:57:21', 1, '127.0.0.1', 'out'),
(36, '2017-07-25', '08:57:32', '0000-00-00 00:00:00', 4, '127.0.0.1', 'in');

-- --------------------------------------------------------

--
-- Table structure for table `learn_pre`
--

CREATE TABLE `learn_pre` (
  `pre_id` int(11) NOT NULL,
  `learn_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `learn_pre`
--

INSERT INTO `learn_pre` (`pre_id`, `learn_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1),
(3, 2),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 2),
(11, 1),
(13, 1),
(14, 1);

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
('dherath10@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2),
('klj@ucsc.cmb.ac.lk', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3),
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
(5, 'Learner', 'learner.jpg'),
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

--
-- Dumping data for table `preference`
--

INSERT INTO `preference` (`pre_id`, `pre_name`, `cat_id`) VALUES
(1, 'software development', 1),
(2, 'python', 1),
(3, 'python programming', 1),
(4, 'java', 1),
(5, 'java programming', 1),
(6, 'mysql', 1),
(7, 'scala', 1),
(8, 'scala programming', 1),
(9, 'postgress sql', 1),
(10, 'pgsql', 1),
(11, 'html', 1),
(12, 'css', 1),
(13, 'web development', 1),
(14, 'programming', 1),
(15, 'R Programming', 1),
(16, 'Database', 1),
(17, 'PHP', 1),
(18, 'Machine Learning (ML)', 1),
(19, 'NodeJS', 1),
(20, 'django', 1);

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

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`qua_id`, `qua_name`, `qua_institute`, `qua_field`, `qua_to`, `qua_from`, `user_id`, `qua_des`) VALUES
(1, 'BSc', 'University of Colombo', '', 0, 0, 3, ''),
(2, 'PhD', 'University of Western Sydney', '', 0, 0, 3, ''),
(3, 'BSc', 'University of Colombo', 'Physical Science', 0, 0, 2, ''),
(4, 'MSc', 'University of Colombo School of Computing', 'Computer Science', 0, 0, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `q_id` int(11) NOT NULL,
  `q_des` text NOT NULL,
  `lev_id` int(11) NOT NULL,
  `q_type` int(11) NOT NULL,
  `q_image` text NOT NULL,
  `lo_id` int(11) NOT NULL,
  `q_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`q_id`, `q_des`, `lev_id`, `q_type`, `q_image`, `lo_id`, `q_date`) VALUES
(9, 'All keywords in Python are in', 3, 1, '', 5, '2017-07-20'),
(10, 'Consider the following statements in a python program, which of below are correct python statements?', 3, 1, '', 2, '2017-07-20'),
(11, 'Which of the following is an invalid variable?', 2, 1, '', 4, '2017-07-20'),
(12, 'Consider the following assignment statements,  which of below are syntactically correct python statements?', 4, 1, '1500517859_q1.png', 4, '2017-07-20'),
(13, 'Which of these in not a core datatype?', 2, 1, '', 3, '2017-07-20'),
(14, 'Which of the following is not a keyword?', 3, 1, '', 5, '2017-07-20'),
(15, 'Consider the following python data types in Python', 3, 1, '1500523396_q2.png', 3, '2017-07-20'),
(16, 'How to run a python file using command-line mode? Python file is saved as myprog.py', 4, 1, '', 2, '2017-07-20'),
(17, 'Consider the python code. What is the output ?', 5, 1, '1500524910_q3.png', 2, '2017-07-20'),
(18, 'Consider the python code. What is the output ?', 5, 1, '1500525293_q4.png', 2, '2017-07-20'),
(19, 'What is the output of 16%5', 1, 1, '', 6, '2017-07-21'),
(20, 'What is the output of  21/5', 1, 1, '', 6, '2017-07-21'),
(21, 'What is the output of 5.0//2', 2, 1, '', 6, '2017-07-21'),
(22, 'Consider the following statement', 2, 1, '1500656983_14.png', 6, '2017-07-21'),
(23, 'What is the value of variable z after executing the python statement z=1==2 ?', 3, 1, '', 6, '2017-07-21'),
(24, 'What is the output of ', 4, 1, '1500657388_15.png', 6, '2017-07-21'),
(25, 'Consider the following statement', 3, 1, '1500657567_16.png', 7, '2017-07-21'),
(26, 'What is the output of below statement ?', 4, 1, '1500658281_17.png', 7, '2017-07-21'),
(27, 'What is the output of below python code?', 5, 1, '1500658913_19.png', 7, '2017-07-21'),
(28, 'What is the output of below python code?', 5, 1, '1500659139_20.png', 7, '2017-07-21'),
(29, 'Who is the creator of python Language? ', 1, 1, '', 1, '2017-07-24'),
(30, 'Python language is ', 1, 1, '', 1, '2017-07-24'),
(31, 'What is the output of the following python code ?', 1, 1, '1500917170_21.png', 8, '2017-07-24'),
(32, 'What is the problem with code?', 1, 1, '1500917609_22.png', 8, '2017-07-24'),
(33, 'Select the correct output', 2, 1, '1500918561_23.png', 8, '2017-07-24'),
(34, 'Which is the correct output of the following code?', 2, 1, '1500918739_24.png', 8, '2017-07-24'),
(35, 'What will be the output?', 3, 1, '1500919381_26.png', 8, '2017-07-24'),
(37, 'Select the correct output?', 3, 1, '1500919753_27.png', 8, '2017-07-24'),
(38, 'Select the correct output?', 4, 1, '1500920741_28.png', 10, '2017-07-24'),
(39, 'What is the output of the following python code?', 4, 1, '1500921203_29.png', 10, '2017-07-25'),
(40, 'How many except statements can a try-except block have?', 5, 1, '', 11, '2017-07-25'),
(41, 'When will the else part of try-except-else be executed?', 5, 1, '', 11, '2017-07-25'),
(42, 'What is the number of iterations in the following loop', 1, 1, '1500949982_30.png', 12, '2017-07-25'),
(43, 'How many times is the print statement executed?', 1, 1, '1500950247_31.png', 12, '2017-07-25'),
(44, 'What is the output of the following?', 3, 1, '1500950609_34.png', 12, '2017-07-25'),
(45, 'How many times will the following code print "Welcome to Python"?', 2, 1, '1500950875_32.png', 13, '2017-07-25'),
(46, 'What do while-loops do?', 2, 1, '', 13, '2017-07-25'),
(47, 'What is the output of the following?', 3, 1, '1500951751_35.png', 13, '2017-07-25'),
(48, 'How many times is the print statement executed?', 5, 1, '1500952027_37.png', 14, '2017-07-25'),
(49, 'What is the output of the following?', 5, 1, '1500952429_38.png', 14, '2017-07-25'),
(50, 'What is the output of the following?', 4, 1, '1500952896_39.png', 15, '2017-07-25'),
(51, 'What is the output of the following?', 4, 1, '1500953025_40.png', 15, '2017-07-25'),
(52, 'Suppose list1,  what is the output the following code?', 1, 1, '1500955246_41.png', 16, '2017-07-25'),
(53, 'Suppose list1 is [1, 5, 9], what is sum(list1) ?', 1, 1, '', 16, '2017-07-25'),
(54, 'Suppose t = (1, 2, 4, 3), which of the following is incorrect?', 2, 1, '', 17, '2017-07-25'),
(55, 'What will be the output?', 2, 1, '1500955695_42.png', 17, '2017-07-25'),
(56, 'Which of the following statements not to create a dictionary?', 3, 1, '', 18, '2017-07-25'),
(57, ' What are the keys?', 3, 1, '1500956071_43.png', 18, '2017-07-25'),
(58, 'What is the output of following code?', 4, 1, '1500956680_44.png', 19, '2017-07-25'),
(59, 'What is round(6.5)?', 4, 1, '', 19, '2017-07-25'),
(60, 'What is the output of the following code ?', 5, 1, '1500957197_45.png', 20, '2017-07-25'),
(61, 'What is the output of the following code ?', 5, 1, '1500957397_46.png', 20, '2017-07-25');

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
  `session_id` varchar(200) NOT NULL,
  `rec_status` varchar(200) NOT NULL,
  `rec_cat` varchar(200) NOT NULL,
  `rec_score` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recommendation`
--

INSERT INTO `recommendation` (`rec_id`, `rec_type`, `id`, `rec_date`, `learn_id`, `session_id`, `rec_status`, `rec_cat`, `rec_score`) VALUES
(12, 'learningObject', 2, '2017-07-24', 1, '', 'Partial', 'sk', '50'),
(13, 'learningObject', 3, '2017-07-24', 1, '', 'Poor', 'sk', '0'),
(14, 'learningObject', 4, '2017-07-24', 2, '', 'Partial', 'sk', '50'),
(15, 'learningObject', 5, '2017-07-24', 2, '', 'Poor', 'sk', '0'),
(16, 'learningObject', 6, '2017-07-24', 1, '', 'Partial', 'sk', '67'),
(17, 'learningObject', 7, '2017-07-24', 1, '', 'Partial', 'sk', '50'),
(18, 'learningObject', 11, '2017-07-25', 1, '', 'Poor', 'sk', '0'),
(19, 'learningObject', 12, '2017-07-25', 1, '', 'Partial', 'sk', '50'),
(20, 'learningObject', 14, '2017-07-25', 1, '', 'Poor', 'sk', '0'),
(21, 'learningObject', 14, '2017-07-25', 4, '', 'Poor', 'sk', '0'),
(22, 'learningObject', 18, '2017-07-25', 4, '', 'Poor', 'sk', '0'),
(23, 'learningObject', 19, '2017-07-25', 4, '', 'Poor', 'sk', '0');

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
  `attempt_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `score` double NOT NULL,
  `ans_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`attempt_id`, `question_id`, `score`, `ans_id`) VALUES
(63, 11, 15, 33),
(63, 15, 0, 54),
(63, 16, 0, 57),
(63, 17, 30, 63),
(63, 30, 10, 128),
(64, 9, 0, 24),
(64, 11, 0, 32),
(64, 12, 25, 40),
(64, 17, 30, 63),
(64, 29, 10, 122),
(65, 20, 10, 79),
(65, 21, 15, 84),
(65, 24, 0, 99),
(65, 25, 0, 102),
(65, 27, 30, 112),
(69, 32, 10, 140),
(69, 34, 15, 150),
(69, 35, 20, 152),
(69, 39, 25, 172),
(69, 40, 0, 178),
(70, 43, 10, 192),
(70, 44, 0, 198),
(70, 46, 15, 208),
(70, 48, 0, 217),
(70, 50, 25, 231),
(71, 43, 10, 192),
(71, 44, 20, 199),
(71, 46, 15, 208),
(71, 48, 0, 218),
(71, 51, 25, 236),
(72, 53, 10, 246),
(72, 54, 15, 248),
(72, 57, 0, 263),
(72, 59, 0, 273),
(72, 60, 30, 279);

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
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `skill_id` int(11) NOT NULL,
  `skill_level` varchar(100) NOT NULL,
  `start` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  `range` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`skill_id`, `skill_level`, `start`, `end`, `range`) VALUES
(1, 'Not Applicable', 0, 0, '0'),
(2, 'Basic Knowledge', 1, 20, '1-20'),
(3, 'Novice', 21, 40, '21-40'),
(4, 'Intermediate', 41, 60, '41-60'),
(5, 'Advanced', 61, 75, '61-75'),
(6, 'Expert', 76, 100, '76-100');

-- --------------------------------------------------------

--
-- Table structure for table `skill_result`
--

CREATE TABLE `skill_result` (
  `sr_id` int(11) NOT NULL,
  `learner_id` int(11) NOT NULL,
  `concept_id` int(11) NOT NULL,
  `ep` double NOT NULL,
  `skill_level` varchar(50) NOT NULL,
  `course_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill_result`
--

INSERT INTO `skill_result` (`sr_id`, `learner_id`, `concept_id`, `ep`, `skill_level`, `course_id`, `datetime`) VALUES
(17, 1, 1, 55, 'Intermediate', 1, '2017-07-24 18:48:47'),
(18, 2, 1, 65, 'Advanced', 1, '2017-07-24 21:24:54'),
(19, 1, 2, 55, 'Intermediate', 1, '2017-07-24 21:50:25'),
(20, 1, 3, 70, 'Advanced', 1, '2017-07-25 00:14:50'),
(21, 1, 4, 50, 'Intermediate', 1, '2017-07-25 08:55:37'),
(22, 4, 4, 70, 'Advanced', 1, '2017-07-25 08:58:52'),
(23, 4, 5, 55, 'Intermediate', 1, '2017-07-25 10:09:16');

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
(1, 'Yehen', 'Tennakoon', 'Mr', 'Male', '', 1, '', 'Active'),
(2, 'Daminda', 'Herath', 'Mr', 'Male', 'Daminda is a Science graduate from University of Colombo, Sri Lanka and obtained MSc in Computer Science from University of Colombo School of Computing (UCSC) , Sri Lanka. He was an Instructor and a research assistant of the University of Colombo School of Computing (UCSC) from February 2006 - August 2008. Then He joined with private sector education field as a lecturer. He is reading Master of Philosophy (MPhil) at University of Colombo School of Computing.\r\n\r\nHe is a Member of the BCS The Chartered Institute for IT, UK, Member of the Institute of Electrical Electronics Engineering (IEEE) and Member of Computer Society of Sri Lanka (CSSL). ', 2, '2.jpg', 'Active'),
(3, 'Lakshman', 'Jayaratne', 'Dr', 'Male', '', 3, '3.jpg', 'Active');

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
-- Indexes for table `attempt`
--
ALTER TABLE `attempt`
  ADD PRIMARY KEY (`attempt_id`);

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
-- Indexes for table `course_pre`
--
ALTER TABLE `course_pre`
  ADD PRIMARY KEY (`course_id`,`pre_id`);

--
-- Indexes for table `course_review`
--
ALTER TABLE `course_review`
  ADD PRIMARY KEY (`cr_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`dis_id`);

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
  ADD PRIMARY KEY (`attempt_id`,`question_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`skill_id`);

--
-- Indexes for table `skill_result`
--
ALTER TABLE `skill_result`
  ADD PRIMARY KEY (`sr_id`);

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
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=287;
--
-- AUTO_INCREMENT for table `attempt`
--
ALTER TABLE `attempt`
  MODIFY `attempt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
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
  MODIFY `concept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `course_review`
--
ALTER TABLE `course_review`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `dis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `enroll`
--
ALTER TABLE `enroll`
  MODIFY `en_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `learn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `learningObject`
--
ALTER TABLE `learningObject`
  MODIFY `lo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `learn_log`
--
ALTER TABLE `learn_log`
  MODIFY `ll_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
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
  MODIFY `pre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `qua_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `recommendation`
--
ALTER TABLE `recommendation`
  MODIFY `rec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
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
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `skill_result`
--
ALTER TABLE `skill_result`
  MODIFY `sr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
