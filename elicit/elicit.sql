-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2026 at 09:25 AM
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
-- Database: `elicit`
--

-- --------------------------------------------------------

--
-- Table structure for table `audience_qa`
--

CREATE TABLE `audience_qa` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `text` mediumtext NOT NULL,
  `is_anonymous` tinyint(1) DEFAULT 0,
  `is_highlighted` tinyint(1) DEFAULT 0,
  `is_answered` tinyint(1) DEFAULT 0,
  `is_archived` tinyint(1) DEFAULT 0,
  `likes` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audience_qa`
--

INSERT INTO `audience_qa` (`id`, `event_id`, `text`, `is_anonymous`, `is_highlighted`, `is_answered`, `is_archived`, `likes`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'What is the circumference of the circle?', 0, 0, 0, 0, 2, '2025-11-15 08:48:27', 'T202403723N', '2026-05-06 00:22:22', NULL),
(2, 1, 'How to get the diameter of a circle?', 1, 1, 0, 0, 1, '2025-11-15 08:50:51', 'T202403723N', '2026-05-06 00:22:17', NULL),
(3, 1, 'Who landed first on the moon', 1, 0, 0, 0, 1, '2025-11-18 06:44:20', 'T202403723N', '2026-01-28 05:47:58', NULL),
(4, 1, 'What is e=mc2', 0, 0, 0, 0, 6, '2025-11-18 07:55:20', 'T202403723N', '2026-05-06 01:26:20', NULL),
(7, 3, 'What is the design standard used by developers?', 1, 0, 0, 0, 2, '2025-12-02 02:52:36', 'T202403723N', '2026-01-15 09:22:56', NULL),
(8, 3, 'Which tools are most useful when designing wireframes? Adobe XD, FIgma or Canva?', 0, 1, 0, 0, 0, '2025-12-02 02:53:18', 'T202011334', '2026-01-15 09:23:33', NULL),
(9, 1, 'How to get a web developer job if the market is too saturated', 0, 0, 0, 0, 0, '2026-01-31 11:10:42', 'T202412066', '2026-01-31 11:10:42', NULL),
(10, 7, 'What\'s the trending language?', 0, 0, 0, 0, 0, '2026-02-04 06:45:26', 'T202403723N', '2026-02-04 06:45:26', NULL),
(11, 7, 'Test', 0, 0, 0, 0, 0, '2026-02-04 06:45:43', 'T202403723N', '2026-02-04 12:52:08', NULL),
(12, 7, 'Test', 1, 0, 0, 0, 1, '2026-02-04 06:45:51', 'T202403723N', '2026-03-21 04:48:40', NULL),
(13, 7, 'Inheritance', 0, 0, 0, 0, 0, '2026-02-20 02:31:02', 'T202111318', '2026-02-25 07:02:17', NULL),
(14, 9, 'What are the five concepts in OOP?', 0, 0, 0, 0, 0, '2026-02-20 05:31:27', 'T202412066', '2026-02-20 05:31:59', NULL),
(15, 7, '....', 0, 0, 0, 0, 0, '2026-02-25 07:02:29', 'T202403723N', '2026-03-10 12:52:27', NULL),
(16, 7, 'yyy', 1, 0, 0, 0, 0, '2026-02-25 07:03:27', 'T202403723N', '2026-03-10 13:09:04', NULL),
(17, 10, 'test', 0, 0, 0, 0, 0, '2026-02-25 07:09:35', 'T202403723N', '2026-02-25 07:09:35', NULL),
(18, 7, 'New question', 0, 0, 0, 1, 0, '2026-03-21 04:45:12', 'T202311986', '2026-03-21 04:49:49', NULL),
(19, 7, 'What are the common design patterns that programmers should follow?', 1, 0, 0, 0, 3, '2026-03-21 04:49:03', 'T202311986', '2026-05-07 02:37:53', NULL),
(20, 7, 'What is the difference between method overloading and method overriding?', 1, 0, 1, 0, 0, '2026-03-21 04:49:28', 'T202311986', '2026-03-21 04:49:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `audience_qa_likes`
--

CREATE TABLE `audience_qa_likes` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `identification` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audience_qa_likes`
--

INSERT INTO `audience_qa_likes` (`id`, `question_id`, `identification`, `timestamp`) VALUES
(1, 4, 'T202410634', '2026-05-06 01:25:55'),
(3, 19, 'T202311986', '2026-05-07 02:36:36'),
(4, 19, 'T202111318', '2026-05-07 02:37:14'),
(5, 19, 'T202403723N', '2026-05-07 02:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `code`, `name`, `start_date`, `end_date`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, '3718438', 'Paraverse Launch Day 1', '2027-11-08', '2027-11-12', '2025-11-14 00:21:02', 'T202403723N', '2026-03-13 12:13:12', 'T202403723N'),
(2, '7456533', 'Paraverse Quest', '2025-11-24', '2025-11-24', '2025-11-20 06:20:21', 'T202403723N', '2026-03-11 10:28:56', NULL),
(3, '3880123', 'UI/UX Conference 2025', '2026-01-05', '2026-01-10', '2025-12-02 02:39:45', 'T202403723N', '2025-12-02 02:39:45', NULL),
(4, '7712542', 'Test', '2025-12-19', '2025-12-29', '2025-12-19 06:32:11', 'T201802481F', '2025-12-19 06:34:11', NULL),
(6, '2611678323', 'Hackathon 2026', '2026-03-09', '2026-03-14', '2026-01-25 23:46:29', 'T202403723N', '2026-03-11 10:29:26', NULL),
(7, '610450771', 'CyberPH Workshop', '2026-03-23', '2026-03-23', '2026-02-04 06:39:44', 'T202403723N', '2026-03-13 12:13:33', 'T202403723N'),
(8, '515139535', 'How to learn Basic Web Development?', '2026-02-04', '2026-02-04', '2026-02-04 06:51:38', 'T202403723N', '2026-03-13 12:15:25', 'T202403723N'),
(9, '2546348631', 'Web Development Bootcamp', '2026-02-23', '2026-02-27', '2026-02-20 05:30:37', 'T202403723N', '2026-02-20 05:30:37', NULL),
(10, '3468078870', 'EdITHABLE Episode 1', '2026-03-04', '2026-03-05', '2026-02-25 07:07:44', 'T202403723N', '2026-03-13 12:14:21', 'T202403723N'),
(11, '3612838363', 'Battle of the Bands', '2026-08-25', '2026-08-28', '2026-03-13 02:18:25', 'T202403723N', '2026-03-13 12:15:40', 'T202403723N'),
(12, '3471877458', 'Proof of Concept', '2026-03-16', '2026-03-21', '2026-03-13 12:14:48', 'T202403723N', '2026-03-17 09:11:29', 'T202403723N'),
(13, '1578645924', 'Brett Durham', '2026-04-01', '2026-04-02', '2026-03-19 03:10:20', 'T202403723N', '2026-03-19 03:10:20', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `events_sorted_view`
-- (See below for the actual view)
--
CREATE TABLE `events_sorted_view` (
`id` int(11)
,`code` varchar(50)
,`name` varchar(255)
,`start_date` date
,`end_date` date
,`created_at` timestamp
,`created_by` varchar(20)
,`updated_at` timestamp
,`updated_by` varchar(20)
,`sort_group` int(1)
,`sort_value` bigint(18)
);

-- --------------------------------------------------------

--
-- Table structure for table `event_attendees`
--

CREATE TABLE `event_attendees` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `identification` varchar(20) NOT NULL,
  `first_seen` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `multiple_choice_options`
--

CREATE TABLE `multiple_choice_options` (
  `id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL,
  `option` mediumtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `multiple_choice_options`
--

INSERT INTO `multiple_choice_options` (`id`, `poll_id`, `option`, `created_at`, `updated_at`) VALUES
(253, 27, 'One', '2026-02-14 06:23:48', '2026-02-14 06:23:48'),
(254, 27, 'Two', '2026-02-14 06:23:48', '2026-02-14 06:23:48'),
(255, 27, 'Three', '2026-02-14 06:23:48', '2026-02-14 06:23:48'),
(256, 27, 'Four', '2026-02-14 06:23:48', '2026-02-14 06:23:48'),
(257, 27, 'Five', '2026-02-14 06:23:48', '2026-02-14 06:23:48'),
(258, 27, 'Six', '2026-02-14 06:23:48', '2026-02-14 06:23:48'),
(285, 29, 'Single Responsibility Principle', '2026-02-20 01:33:56', '2026-03-03 07:40:52'),
(291, 29, 'Liskov Substitution Principle', '2026-02-20 01:36:13', '2026-02-20 08:40:07'),
(301, 29, 'Interface Segregation Principle', '2026-02-20 02:15:04', '2026-02-20 03:20:41'),
(302, 29, 'Dependency Inversion Principle', '2026-02-20 02:15:04', '2026-02-20 03:20:52'),
(310, 29, 'Open/Closed Principle', '2026-02-20 03:21:31', '2026-02-20 03:21:31'),
(315, 32, 'Udemy', '2026-02-20 05:36:16', '2026-02-20 05:36:16'),
(316, 32, 'Linkedin Learning', '2026-02-20 05:36:16', '2026-02-20 05:36:16'),
(317, 32, 'Youtube', '2026-02-20 05:36:16', '2026-02-20 05:36:16'),
(370, 39, NULL, '2026-02-23 03:36:28', '2026-03-03 03:16:55'),
(406, 38, '3443534', '2026-02-23 13:11:09', '2026-03-03 03:19:39'),
(407, 38, '34234234', '2026-02-23 13:11:09', '2026-03-03 03:19:29'),
(807, 40, NULL, '2026-02-25 07:11:26', '2026-02-25 07:11:26'),
(808, 40, NULL, '2026-02-25 07:11:26', '2026-02-25 07:11:26'),
(830, 39, NULL, '2026-02-26 02:50:25', '2026-02-26 02:50:25'),
(831, 39, NULL, '2026-02-26 02:50:25', '2026-02-26 02:50:25'),
(832, 38, '234234', '2026-02-26 06:33:46', '2026-03-03 03:19:29'),
(843, 44, NULL, '2026-03-06 09:14:39', '2026-03-06 09:14:39'),
(844, 44, NULL, '2026-03-06 09:14:39', '2026-03-06 09:14:39'),
(845, 45, NULL, '2026-03-10 12:34:39', '2026-03-10 12:34:39'),
(846, 45, NULL, '2026-03-10 12:34:39', '2026-03-10 12:34:39'),
(865, 46, NULL, '2026-03-21 12:11:08', '2026-03-21 12:11:08'),
(866, 46, NULL, '2026-03-21 12:11:08', '2026-03-21 12:11:08'),
(867, 46, NULL, '2026-03-21 12:11:08', '2026-03-21 12:11:08'),
(868, 46, NULL, '2026-03-21 12:11:08', '2026-03-21 12:11:08'),
(871, 29, NULL, '2026-03-21 13:04:30', '2026-03-21 13:04:30');

-- --------------------------------------------------------

--
-- Table structure for table `multiple_choice_polls`
--

CREATE TABLE `multiple_choice_polls` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `question` mediumtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `multiple_choice_polls`
--

INSERT INTO `multiple_choice_polls` (`id`, `event_id`, `question`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(27, 1, 'Question', '2026-02-13 11:32:30', 'T202403723N', '2026-02-14 02:09:34', 'T202403723N'),
(29, 7, 'What does the SOLID principle stand for?', '2026-02-20 00:09:57', 'T202403723N', '2026-02-23 02:45:59', 'T202403723N'),
(32, 9, 'Where is your go-to platform to learn new programming language?', '2026-02-20 05:35:26', 'T202403723N', '2026-02-20 05:35:59', 'T202403723N'),
(38, 7, '345', '2026-02-21 08:43:04', 'T202403723N', '2026-02-26 06:33:48', 'T202403723N'),
(39, 7, NULL, '2026-02-23 03:36:28', 'T202403723N', '2026-02-23 03:36:28', NULL),
(40, 10, 'Somethinmg', '2026-02-25 07:11:26', 'T202403723N', '2026-02-25 07:11:35', 'T202403723N'),
(44, 7, NULL, '2026-03-06 09:14:39', 'T202412066', '2026-03-06 09:14:39', NULL),
(45, 7, NULL, '2026-03-10 12:34:39', 'T202403723N', '2026-03-10 12:34:39', NULL),
(46, 7, NULL, '2026-03-21 12:10:59', 'T202403723N', '2026-03-21 12:10:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `multiple_choice_responses`
--

CREATE TABLE `multiple_choice_responses` (
  `id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `multiple_choice_responses`
--

INSERT INTO `multiple_choice_responses` (`id`, `poll_id`, `option_id`, `created_at`, `created_by`) VALUES
(1, 27, 255, '2026-02-14 07:48:03', 'T202403723N'),
(7, 29, 285, '2026-02-20 01:37:42', 'T202403723N'),
(8, 29, 291, '2026-02-20 02:19:08', 'T202111318'),
(9, 29, 285, '2026-02-20 03:19:08', 'T202410634'),
(11, 32, 316, '2026-02-20 05:36:30', 'T202412066'),
(12, 32, 317, '2026-02-20 05:36:38', 'T202403723N'),
(20, 38, 406, '2026-02-25 07:00:16', 'T202403723N'),
(23, 29, 310, '2026-03-10 12:34:30', 'T202503937N'),
(24, 40, 807, '2026-03-11 01:42:23', 'T202411588'),
(25, 29, 291, '2026-03-11 01:45:23', 'T202411588');

-- --------------------------------------------------------

--
-- Table structure for table `open_text_polls`
--

CREATE TABLE `open_text_polls` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `question` mediumtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `open_text_polls`
--

INSERT INTO `open_text_polls` (`id`, `event_id`, `question`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(12, 1, 'New rating', '2026-01-28 11:12:25', 'T202403723N', '2026-02-03 09:19:39', 'T202403723N'),
(20, 7, 'What are the five concepts in OOP?', '2026-02-04 06:41:07', 'T202403723N', '2026-02-20 03:00:13', 'T202403723N'),
(26, 2, 'Untitled', '2026-02-05 00:17:41', 'T202403723N', '2026-02-05 00:17:41', NULL),
(27, 7, 'Untitled', '2026-02-05 01:36:27', 'T202403723N', '2026-02-05 01:36:27', NULL),
(33, 1, NULL, '2026-02-10 12:31:05', 'T202403723N', '2026-02-10 12:32:05', 'T202403723N'),
(34, 9, 'What is the first thing that comes to your mind when u hear encapsulation?', '2026-02-20 05:33:25', 'T202403723N', '2026-02-20 05:33:51', 'T202403723N'),
(35, 10, 'sssssss', '2026-02-25 07:16:23', 'T202403723N', '2026-02-25 07:16:33', 'T202403723N'),
(36, 7, NULL, '2026-03-10 12:35:32', 'T202403723N', '2026-03-10 12:35:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `open_text_responses`
--

CREATE TABLE `open_text_responses` (
  `id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL,
  `response` mediumtext NOT NULL,
  `is_anonymous` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `open_text_responses`
--

INSERT INTO `open_text_responses` (`id`, `poll_id`, `response`, `is_anonymous`, `created_at`, `created_by`) VALUES
(4, 12, 'JAVA', 0, '2026-01-31 01:02:22', 'T202403723N'),
(5, 12, 'Python', 0, '2026-01-31 02:52:23', 'T202412066'),
(6, 12, 'PHP', 1, '2026-01-31 02:55:07', 'T202412066'),
(9, 12, 'HTML, CSS', 1, '2026-01-31 11:07:59', 'T202403723N'),
(10, 12, 'React', 0, '2026-01-31 12:08:34', 'T202111662'),
(11, 20, 'Java', 0, '2026-02-04 06:48:18', 'T202403723N'),
(12, 20, 'Python', 0, '2026-02-04 06:48:25', 'T202403723N'),
(13, 20, 'CSS', 0, '2026-02-04 06:48:30', 'T202403723N'),
(14, 20, 'CSS', 0, '2026-02-04 06:48:33', 'T202403723N'),
(15, 12, 'TEST 2', 0, '2026-02-04 11:18:28', 'T202403723N'),
(16, 20, 'Inheritance', 0, '2026-02-20 02:31:13', 'T202111318'),
(17, 20, 'Polymorphism', 0, '2026-02-20 02:31:42', 'T201510283'),
(18, 20, 'Encapsulation', 0, '2026-02-20 02:57:10', 'T202412066'),
(19, 20, 'Abstract', 0, '2026-02-20 02:59:49', 'T202410634'),
(20, 34, 'Protecting methods and variables from public access', 0, '2026-02-20 05:34:23', 'T202412066'),
(21, 34, 'It is one of the five concepts in OOP', 0, '2026-02-20 05:35:04', 'T202403723N'),
(22, 35, 'asdasdasdas', 0, '2026-02-25 07:16:35', 'T202403723N'),
(23, 35, 'sadasdsa', 0, '2026-02-25 07:16:46', 'T202403723N'),
(24, 35, 'TTTT', 0, '2026-02-25 07:17:40', 'T202403723N'),
(25, 35, 'Test', 0, '2026-03-11 01:42:05', 'T202411588'),
(26, 20, 'Single Responsibility Principle', 0, '2026-03-17 04:38:04', 'T202403723N'),
(27, 20, 'Interface?', 0, '2026-03-21 04:50:41', 'T202311986'),
(28, 20, 'Private and Public classes', 1, '2026-03-21 04:50:57', 'T202311986');

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `polls`
--

INSERT INTO `polls` (`id`, `name`, `description`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Audience Q&A', 'Let participants submit questions and vote for their favorites.', '2025-11-13 01:09:21', 'T202403723N', '2025-11-13 01:09:21', NULL),
(2, 'Multiple choice', 'Ask participants to choose from a list of answers.', '2025-11-13 01:09:21', 'T202403723N', '2025-11-13 01:09:21', NULL),
(3, 'Word cloud', 'Visualize the most popular responses as a cloud of words.', '2025-11-13 01:09:21', 'T202403723N', '2025-11-13 01:09:21', NULL),
(4, 'Open text', 'Ask participants to answer in their own words.', '2025-11-13 01:09:21', 'T202403723N', '2025-11-13 01:09:21', NULL),
(5, 'Ranking', 'Ask participants to rank a list of options in their preferred order.', '2025-11-13 01:09:21', 'T202403723N', '2025-11-13 01:09:21', NULL),
(6, 'Rating', 'Let participants submit their rating on a scale you set.', '2025-11-13 01:09:21', 'T202403723N', '2025-11-13 01:09:21', NULL),
(7, 'Quiz', 'Run a fun quiz with leaderboard at the end.', '2025-11-13 01:09:21', 'T202403723N', '2025-11-13 01:09:21', NULL),
(8, 'Survey', 'Collect feedback from participants with a survey.', '2025-11-13 01:09:21', 'T202403723N', '2025-11-13 01:09:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ranking_options`
--

CREATE TABLE `ranking_options` (
  `id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL,
  `option` mediumtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ranking_options`
--

INSERT INTO `ranking_options` (`id`, `poll_id`, `option`, `created_at`, `updated_at`) VALUES
(21, 11, NULL, '2026-02-25 07:58:48', '2026-02-25 07:58:48'),
(22, 11, NULL, '2026-02-25 07:58:48', '2026-02-25 07:58:48'),
(23, 12, NULL, '2026-02-25 08:54:00', '2026-02-25 08:54:00'),
(24, 12, NULL, '2026-02-25 08:54:00', '2026-02-25 08:54:00'),
(29, 15, 'one option', '2026-02-25 09:48:53', '2026-03-03 10:08:14'),
(30, 15, 'hotdog', '2026-02-25 09:48:53', '2026-03-03 10:07:52'),
(78, 18, NULL, '2026-02-26 06:41:04', '2026-03-03 09:20:19'),
(80, 15, 'fdgdfgdf', '2026-02-26 12:58:05', '2026-03-03 10:00:31'),
(86, 15, NULL, '2026-02-27 11:06:12', '2026-03-03 07:29:14'),
(87, 15, NULL, '2026-02-27 11:06:12', '2026-03-03 10:08:30'),
(88, 15, 'R', '2026-02-27 11:06:12', '2026-03-03 07:23:10'),
(91, 18, NULL, '2026-02-27 11:19:36', '2026-03-21 13:03:35'),
(123, 22, NULL, '2026-03-21 12:10:20', '2026-03-21 12:10:20'),
(127, 22, NULL, '2026-03-21 12:10:30', '2026-03-21 12:10:30'),
(128, 22, NULL, '2026-03-21 12:10:30', '2026-03-21 12:10:30'),
(129, 22, NULL, '2026-03-21 12:10:30', '2026-03-21 12:10:30'),
(134, 18, NULL, '2026-03-21 12:14:11', '2026-03-21 12:14:11'),
(137, 22, NULL, '2026-03-21 12:54:33', '2026-03-21 12:54:33'),
(146, 18, NULL, '2026-03-21 12:59:12', '2026-03-21 12:59:12'),
(150, 15, NULL, '2026-03-23 04:52:26', '2026-03-23 04:52:26'),
(151, 15, NULL, '2026-03-23 04:52:26', '2026-03-23 04:52:26'),
(160, 18, NULL, '2026-03-23 04:52:49', '2026-03-23 04:52:49'),
(161, 23, 'Java', '2026-03-23 06:14:08', '2026-03-23 06:14:34'),
(162, 23, 'Python', '2026-03-23 06:14:08', '2026-03-23 06:14:39'),
(247, 23, 'React', '2026-03-23 06:15:39', '2026-03-23 06:15:39'),
(248, 23, 'PHP', '2026-03-23 06:15:39', '2026-03-23 06:15:39'),
(249, 23, 'Javascript', '2026-03-23 06:15:39', '2026-03-23 06:15:39'),
(250, 23, 'C', '2026-03-23 06:15:39', '2026-03-23 06:15:39'),
(251, 23, 'HTML', '2026-03-23 06:15:39', '2026-03-23 06:15:39'),
(252, 23, 'CSS', '2026-03-23 06:15:39', '2026-03-23 06:15:39'),
(253, 23, 'Typescript', '2026-03-23 06:15:39', '2026-03-23 06:15:39'),
(254, 23, 'Angular', '2026-03-23 06:15:39', '2026-03-23 06:15:39'),
(255, 23, 'Node.js', '2026-03-23 06:15:39', '2026-03-23 06:15:39'),
(256, 23, 'Typescript', '2026-03-23 06:15:39', '2026-03-23 06:15:39'),
(257, 23, 'COBOL', '2026-03-23 06:15:39', '2026-03-23 06:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `ranking_polls`
--

CREATE TABLE `ranking_polls` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `question` mediumtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ranking_polls`
--

INSERT INTO `ranking_polls` (`id`, `event_id`, `question`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(11, 10, NULL, '2026-02-25 07:58:48', 'T202403723N', '2026-02-25 07:58:48', NULL),
(12, 10, NULL, '2026-02-25 08:54:00', 'T202403723N', '2026-02-25 08:54:00', NULL),
(15, 7, NULL, '2026-02-25 09:48:53', 'T202403723N', '2026-02-25 09:48:53', NULL),
(18, 7, 'New Ranking [UPDATED]', '2026-02-26 06:41:04', 'T202403723N', '2026-02-26 08:24:48', 'T202403723N'),
(22, 7, NULL, '2026-03-21 12:10:20', 'T202403723N', '2026-03-21 12:10:20', NULL),
(23, 11, 'Rank the top 3 programming languages you are proficient in', '2026-03-23 06:14:08', 'T202403723N', '2026-03-23 06:14:29', 'T202403723N');

-- --------------------------------------------------------

--
-- Table structure for table `ranking_responses`
--

CREATE TABLE `ranking_responses` (
  `id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ranking_responses`
--

INSERT INTO `ranking_responses` (`id`, `poll_id`, `option_id`, `rank`, `created_at`, `created_by`) VALUES
(2, 18, 91, 2, '2026-03-02 08:25:27', 'T202403723N'),
(3, 18, 78, 3, '2026-03-02 08:25:27', 'T202403723N'),
(4, 18, 78, 1, '2026-03-03 02:23:47', 'T202412066'),
(6, 18, 78, 1, '2026-03-03 02:36:12', 'T201510283'),
(7, 18, 91, 2, '2026-03-03 02:36:12', 'T201510283'),
(10, 18, 91, 2, '2026-03-03 02:58:28', 'D202510495'),
(11, 18, 78, 3, '2026-03-03 02:58:28', 'D202510495'),
(14, 18, 91, 2, '2026-03-03 09:21:19', 'T202410634'),
(15, 18, 78, 1, '2026-03-03 09:22:48', 'T202111318'),
(16, 18, 78, 1, '2026-03-03 09:23:44', 'T200500624N'),
(17, 18, 91, 2, '2026-03-03 09:23:44', 'T200500624N'),
(18, 12, 24, 1, '2026-03-11 01:42:38', 'T202411588'),
(19, 12, 23, 2, '2026-03-11 01:42:38', 'T202411588'),
(20, 15, 29, 1, '2026-03-11 01:45:56', 'T202411588'),
(21, 15, 80, 2, '2026-03-11 01:45:56', 'T202411588'),
(22, 15, 88, 3, '2026-03-11 01:45:56', 'T202411588'),
(24, 18, 134, 1, '2026-03-21 13:01:36', 'T202311986'),
(25, 18, 146, 1, '2026-03-21 13:03:50', 'T202410366'),
(26, 23, 251, 1, '2026-03-23 06:16:21', 'T202411588'),
(27, 23, 252, 2, '2026-03-23 06:16:21', 'T202411588'),
(28, 23, 249, 3, '2026-03-23 06:16:21', 'T202411588'),
(29, 23, 248, 4, '2026-03-23 06:16:21', 'T202411588'),
(30, 23, 161, 5, '2026-03-23 06:16:21', 'T202411588');

-- --------------------------------------------------------

--
-- Table structure for table `rating_polls`
--

CREATE TABLE `rating_polls` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `question` mediumtext DEFAULT NULL,
  `min_rating` int(11) DEFAULT 1,
  `max_rating` int(11) DEFAULT 5,
  `rating_type` enum('stars','emojis') DEFAULT 'stars',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating_polls`
--

INSERT INTO `rating_polls` (`id`, `event_id`, `question`, `min_rating`, `max_rating`, `rating_type`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(3, 3, 'Rate your satisfaction with the speaker\'s presentation', 1, 5, 'stars', '2025-12-02 03:11:31', 'T202011334', '2025-12-02 03:11:44', 'T202011334'),
(22, 3, 'Rate the relevance of the presentation to the current issues in the country', 1, 5, 'stars', '2026-01-12 10:52:53', 'T202403723N', '2026-01-12 10:53:44', 'T202403723N'),
(29, 1, 'Rate the speaker\'s knowledge on the topic', 1, 5, 'stars', '2026-01-15 12:42:27', 'T202111662', '2026-01-15 12:43:08', 'T202111662'),
(42, 1, 'What is your favorite programming language?', 1, 5, 'stars', '2026-01-27 11:57:55', 'T202403723N', '2026-02-04 10:23:44', 'T202403723N'),
(62, 7, 'Rate your satisfaction with the presentation proper', 1, 5, 'stars', '2026-02-04 06:40:04', 'T202403723N', '2026-02-20 03:13:54', 'T202403723N'),
(69, 6, NULL, 1, 5, 'stars', '2026-02-05 00:17:51', 'T202403723N', '2026-02-10 12:55:56', 'T202403723N'),
(70, 6, 'fgfhfg', 1, 5, 'stars', '2026-02-05 01:17:45', 'T202403723N', '2026-02-10 12:57:45', 'T202403723N'),
(71, 7, 'fgdfgfdgdf', 1, 5, 'stars', '2026-02-05 03:06:03', 'T202403723N', '2026-02-20 03:36:11', 'T202403723N'),
(76, 1, NULL, 1, 5, 'stars', '2026-02-10 11:57:54', 'T202403723N', '2026-02-11 08:29:45', 'T202403723N'),
(77, 9, 'How satisfied are you with the speaker\'s presentation', 1, 5, 'stars', '2026-02-20 05:32:04', 'T202403723N', '2026-02-20 05:32:22', 'T202403723N'),
(81, 7, NULL, 1, 5, 'stars', '2026-03-10 12:35:50', 'T202403723N', '2026-03-10 12:35:50', NULL),
(82, 7, NULL, 1, 5, 'stars', '2026-03-10 13:05:58', 'T202403723N', '2026-03-10 13:05:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rating_responses`
--

CREATE TABLE `rating_responses` (
  `id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating_responses`
--

INSERT INTO `rating_responses` (`id`, `poll_id`, `rating`, `created_at`, `created_by`) VALUES
(16, 42, 4, '2026-01-29 08:22:37', 'T202403723N'),
(17, 42, 2, '2026-01-31 11:33:58', 'T202412066'),
(18, 62, 3, '2026-02-04 06:41:38', 'T202403723N'),
(19, 70, 2, '2026-02-10 12:56:52', 'T202403723N'),
(20, 62, 2, '2026-02-20 03:08:17', 'T201510283'),
(21, 62, 2, '2026-02-20 03:10:48', 'T202210904'),
(22, 77, 4, '2026-02-20 05:33:10', 'T202412066'),
(23, 81, 3, '2026-03-10 12:35:57', 'T202503937N'),
(24, 22, 3, '2026-03-11 01:43:06', 'T202411588'),
(25, 62, 5, '2026-03-11 01:43:50', 'T202411588'),
(26, 81, 2, '2026-03-11 01:47:10', 'T202411588');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `poll_type` varchar(50) NOT NULL,
  `poll_id` int(11) NOT NULL,
  `is_open` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `event_id`, `poll_type`, `poll_id`, `is_open`, `created_at`, `updated_at`) VALUES
(19, 3, 'rating', 3, 0, '2025-12-02 03:11:57', '2026-03-11 01:42:51'),
(25, 4, 'q&a', 1, 1, '2025-12-19 06:32:36', '2025-12-19 06:32:36'),
(40, 3, 'rating', 22, 1, '2026-01-12 11:35:45', '2026-03-11 01:43:16'),
(77, 1, 'rating', 29, 0, '2026-01-15 12:43:12', '2026-01-27 11:26:03'),
(87, 1, 'q&a', 1, 1, '2026-01-17 12:33:33', '2026-05-06 00:22:00'),
(88, 3, 'q&a', 1, 1, '2026-01-26 00:29:46', '2026-01-26 00:29:46'),
(89, 6, 'q&a', 1, 1, '2026-01-26 00:29:58', '2026-01-26 00:29:58'),
(92, 1, 'rating', 42, 0, '2026-01-27 12:10:16', '2026-03-31 07:19:29'),
(95, 1, 'open-text', 12, 0, '2026-01-28 12:18:46', '2026-03-31 07:19:31'),
(96, 1, 'rating', 1, 0, '2026-01-28 12:19:52', '2026-01-28 12:20:07'),
(102, 1, 'open-text', 13, 0, '2026-01-31 12:07:46', '2026-01-31 12:07:47'),
(107, 7, 'rating', 62, 0, '2026-02-04 06:40:49', '2026-03-23 06:42:55'),
(108, 7, 'open-text', 20, 0, '2026-02-04 06:41:24', '2026-03-23 06:42:59'),
(109, 7, 'q&a', 1, 1, '2026-02-04 06:44:56', '2026-03-06 09:14:36'),
(119, 1, 'open-text', 33, 0, '2026-02-10 12:31:13', '2026-03-31 07:19:30'),
(120, 1, 'rating', 76, 0, '2026-02-10 12:49:07', '2026-03-31 07:19:29'),
(121, 6, 'rating', 70, 1, '2026-02-10 12:56:14', '2026-02-10 12:57:13'),
(122, 6, 'rating', 69, 0, '2026-02-10 12:56:16', '2026-02-10 12:57:13'),
(123, 1, 'multiple-choice', 27, 1, '2026-02-13 11:33:15', '2026-03-31 07:36:23'),
(125, 7, 'multiple-choice', 29, 0, '2026-02-20 01:34:41', '2026-03-23 06:43:10'),
(126, 7, 'rating', 71, 0, '2026-02-20 02:19:38', '2026-03-23 06:42:54'),
(128, 7, 'open-text', 27, 0, '2026-02-20 03:31:44', '2026-03-23 06:42:57'),
(130, 9, 'q&a', 1, 1, '2026-02-20 05:31:05', '2026-02-20 05:31:05'),
(131, 9, 'rating', 77, 0, '2026-02-20 05:33:02', '2026-03-31 07:18:28'),
(132, 9, 'open-text', 34, 0, '2026-02-20 05:33:58', '2026-03-31 07:18:29'),
(133, 9, 'multiple-choice', 32, 1, '2026-02-20 05:36:22', '2026-03-31 07:18:29'),
(137, 7, 'multiple-choice', 38, 0, '2026-02-21 08:43:09', '2026-03-23 06:43:07'),
(138, 7, 'multiple-choice', 39, 0, '2026-02-25 06:59:14', '2026-03-23 06:43:04'),
(143, 10, 'multiple-choice', 40, 0, '2026-02-25 07:11:40', '2026-03-25 11:25:16'),
(145, 10, 'open-text', 35, 0, '2026-02-25 07:16:32', '2026-03-25 11:25:15'),
(149, 7, 'ranking', 18, 0, '2026-02-26 06:42:37', '2026-04-29 08:34:34'),
(151, 7, 'ranking', 15, 0, '2026-03-03 03:13:31', '2026-04-29 08:34:33'),
(154, 7, 'word-cloud', 2, 0, '2026-03-03 12:43:28', '2026-04-29 08:34:30'),
(155, 7, 'word-cloud', 1, 0, '2026-03-09 13:14:39', '2026-04-29 08:34:30'),
(156, 7, 'rating', 81, 0, '2026-03-10 12:35:53', '2026-03-23 06:42:53'),
(157, 10, 'q&a', 1, 1, '2026-03-10 13:05:20', '2026-03-10 13:05:20'),
(158, 10, 'ranking', 12, 0, '2026-03-11 01:42:29', '2026-03-25 11:25:17'),
(160, 7, 'word-cloud', 5, 0, '2026-03-11 01:46:03', '2026-04-29 08:34:32'),
(161, 7, 'word-cloud', 4, 0, '2026-03-11 01:46:10', '2026-04-29 08:34:32'),
(162, 7, 'word-cloud', 3, 0, '2026-03-11 01:46:12', '2026-04-29 08:34:31'),
(163, 11, 'ranking', 23, 1, '2026-03-23 06:15:55', '2026-03-25 10:19:22'),
(164, 7, 'ranking', 22, 1, '2026-03-23 06:37:30', '2026-04-29 08:34:34'),
(165, 7, 'multiple-choice', 45, 0, '2026-03-23 06:42:36', '2026-03-23 06:43:04'),
(166, 7, 'multiple-choice', 46, 0, '2026-03-23 06:42:37', '2026-03-23 06:43:03'),
(167, 7, 'open-text', 36, 0, '2026-03-23 06:42:43', '2026-03-23 06:42:55'),
(168, 7, 'rating', 82, 0, '2026-03-23 06:42:47', '2026-03-23 06:42:52'),
(169, 10, 'ranking', 11, 1, '2026-03-25 11:25:17', '2026-03-27 06:39:03');

-- --------------------------------------------------------

--
-- Table structure for table `word_cloud_polls`
--

CREATE TABLE `word_cloud_polls` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `question` mediumtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `word_cloud_polls`
--

INSERT INTO `word_cloud_polls` (`id`, `event_id`, `question`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 7, NULL, '2026-03-03 11:26:52', 'T202403723N', '2026-03-03 11:26:52', NULL),
(2, 7, 'Common programming tools', '2026-03-03 11:30:18', 'T202403723N', '2026-03-03 11:31:08', 'T202403723N'),
(3, 7, NULL, '2026-03-10 12:34:44', 'T202403723N', '2026-03-10 12:34:44', NULL),
(4, 7, NULL, '2026-03-10 12:34:52', 'T202403723N', '2026-03-10 12:34:52', NULL),
(5, 7, NULL, '2026-03-10 13:05:53', 'T202403723N', '2026-03-10 13:05:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `word_cloud_responses`
--

CREATE TABLE `word_cloud_responses` (
  `id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL,
  `response` mediumtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `word_cloud_responses`
--

INSERT INTO `word_cloud_responses` (`id`, `poll_id`, `response`, `created_at`, `created_by`) VALUES
(1, 2, 'Python', '2026-03-05 11:50:02', 'T202403723N'),
(2, 2, 'Python', '2026-03-05 11:50:02', 'T202303460N'),
(3, 2, 'Python', '2026-03-05 11:50:02', 'T202303655N'),
(4, 2, 'Python', '2026-03-05 11:50:02', 'T202303453N'),
(5, 2, 'Python', '2026-03-05 11:50:02', 'T202303452N'),
(6, 2, 'JavaScript', '2026-03-05 11:50:02', 'C202200001'),
(7, 2, 'JavaScript', '2026-03-05 11:50:02', 'T201802493F'),
(8, 2, 'JavaScript', '2026-03-05 11:50:02', 'T201301344F'),
(9, 2, 'JavaScript', '2026-03-05 11:50:02', 'T201802658F'),
(10, 2, 'Java', '2026-03-05 11:50:02', 'T201802609F'),
(11, 2, 'Java', '2026-03-05 11:50:02', 'T201802814F'),
(12, 2, 'Java', '2026-03-05 11:50:02', 'T201802484F'),
(13, 2, 'C++', '2026-03-05 11:50:02', 'T202103240F'),
(14, 2, 'C++', '2026-03-05 11:50:02', 'T200900912F'),
(15, 2, 'C#', '2026-03-05 11:50:02', 'T201602031F'),
(16, 2, 'C#', '2026-03-05 11:50:02', 'T201903061F'),
(17, 2, 'Ruby', '2026-03-05 11:50:02', 'T200000284F'),
(18, 2, 'Ruby', '2026-03-05 11:50:02', 'T201902927F'),
(19, 2, 'PHP', '2026-03-05 11:50:02', 'T202303519N'),
(20, 2, 'PHP', '2026-03-05 11:50:02', 'T202203429F'),
(21, 2, 'Swift', '2026-03-05 11:50:02', 'T201802482F'),
(22, 2, 'Swift', '2026-03-05 11:50:02', 'T202303472F'),
(23, 2, 'Kotlin', '2026-03-05 11:50:02', 'T202203368F'),
(24, 2, 'Kotlin', '2026-03-05 11:50:02', 'A202300485F'),
(25, 2, 'Go', '2026-03-05 11:50:02', 'D201900166F'),
(26, 2, 'Go', '2026-03-05 11:50:02', 'A202200415F'),
(27, 2, 'Rust', '2026-03-05 11:50:02', 'T201802775F'),
(28, 2, 'Rust', '2026-03-05 11:50:02', 'T201001031F'),
(29, 2, 'TypeScript', '2026-03-05 11:50:02', 'A202300459F'),
(30, 2, 'TypeScript', '2026-03-05 11:50:02', 'A201001000F'),
(31, 2, 'HTML', '2026-03-05 11:50:02', 'T201101167N'),
(32, 2, 'HTML', '2026-03-05 11:50:02', 'A202300488F'),
(33, 2, 'CSS', '2026-03-05 11:50:02', 'A202200330F'),
(34, 2, 'CSS', '2026-03-05 11:50:02', 'D202100320F'),
(35, 2, 'React', '2026-03-05 11:50:02', 'T201802796F'),
(36, 2, 'React', '2026-03-05 11:50:02', 'D202100312F'),
(37, 2, 'React', '2026-03-05 11:50:02', 'A202300482F'),
(38, 2, 'React', '2026-03-05 11:50:02', 'T201910047'),
(39, 2, 'Angular', '2026-03-05 11:50:02', 'D202200411F'),
(40, 2, 'Angular', '2026-03-05 11:50:02', 'A201900243F'),
(41, 2, 'Vue.js', '2026-03-05 11:50:02', 'D202200452F'),
(42, 2, 'Vue.js', '2026-03-05 11:50:02', 'D201900168F'),
(43, 2, 'Node.js', '2026-03-05 11:50:02', 'D201800162F'),
(44, 2, 'Node.js', '2026-03-05 11:50:02', 'D201800043F'),
(45, 2, 'Node.js', '2026-03-05 11:50:02', 'A202300474F'),
(46, 2, 'Express.js', '2026-03-05 11:50:02', 'A202300489F'),
(47, 2, 'Express.js', '2026-03-05 11:50:02', 'T201401558F'),
(48, 2, 'Django', '2026-03-05 11:50:02', 'A202300511F'),
(49, 2, 'Django', '2026-03-05 11:50:02', 'A202200335F'),
(50, 2, 'Flask', '2026-03-05 11:50:02', 'A202300456F'),
(51, 2, 'Flask', '2026-03-05 11:50:02', 'T202203392F'),
(52, 2, 'Spring Boot', '2026-03-05 11:50:02', 'A202200368N'),
(53, 2, 'Spring Boot', '2026-03-05 11:50:02', 'A202300496F'),
(54, 2, 'Laravel', '2026-03-05 11:50:02', 'A202200331F'),
(55, 2, 'Laravel', '2026-03-05 11:50:02', 'D202300468F'),
(56, 2, 'Ruby on Rails', '2026-03-05 11:50:02', 'A202200341F'),
(57, 2, 'Ruby on Rails', '2026-03-05 11:50:02', 'A202300495F'),
(58, 2, 'TensorFlow', '2026-03-05 11:50:02', 'A202300475F'),
(59, 2, 'TensorFlow', '2026-03-05 11:50:02', 'T202103143F'),
(60, 2, 'PyTorch', '2026-03-05 11:50:02', 'A202200354F'),
(61, 2, 'PyTorch', '2026-03-05 11:50:02', 'A202200359F'),
(62, 2, 'Docker', '2026-03-05 11:50:02', 'A202300483F'),
(63, 2, 'Docker', '2026-03-05 11:50:02', 'T202203403F'),
(64, 2, 'Docker', '2026-03-05 11:50:02', 'A202300468F'),
(65, 2, 'Kubernetes', '2026-03-05 11:50:02', 'T200700774F'),
(66, 2, 'Kubernetes', '2026-03-05 11:50:02', 'T201802749F'),
(67, 2, 'Git', '2026-03-05 11:50:02', 'A202200317F'),
(68, 2, 'Git', '2026-03-05 11:50:02', 'T200900947F'),
(69, 2, 'Git', '2026-03-05 11:50:02', 'T201802694N'),
(70, 2, 'GitHub', '2026-03-05 11:50:02', 'A202200418F'),
(71, 2, 'GitHub', '2026-03-05 11:50:02', 'T200900950F'),
(72, 2, 'GitLab', '2026-03-05 11:50:02', 'T202203382N'),
(73, 2, 'GitLab', '2026-03-05 11:50:02', 'T201401581N'),
(74, 2, 'Jenkins', '2026-03-05 11:50:02', 'A202100280F'),
(75, 2, 'Jenkins', '2026-03-05 11:50:02', 'T201602042N'),
(76, 2, 'Travis CI', '2026-03-05 11:50:02', 'D202200456F'),
(77, 2, 'Travis CI', '2026-03-05 11:50:02', 'T202203428N'),
(78, 2, 'VS Code', '2026-03-05 11:50:02', 'T202203278F'),
(79, 2, 'VS Code', '2026-03-05 11:50:02', 'T202103197N'),
(80, 2, 'IntelliJ IDEA', '2026-03-05 11:50:02', 'A202300457F'),
(81, 2, 'IntelliJ IDEA', '2026-03-05 11:50:02', 'D200900928F'),
(82, 2, 'Eclipse', '2026-03-05 11:50:02', 'D202310026'),
(83, 2, 'Eclipse', '2026-03-05 11:50:02', 'D201900239F'),
(84, 2, 'Postman', '2026-03-05 11:50:02', 'A20231000293'),
(85, 2, 'Postman', '2026-03-05 11:50:02', 'T202303477F'),
(86, 2, 'MySQL', '2026-03-05 11:50:02', 'T202311263'),
(87, 2, 'MySQL', '2026-03-05 11:50:02', 'T202312554'),
(88, 2, 'PostgreSQL', '2026-03-05 11:50:02', 'T202312306'),
(89, 2, 'PostgreSQL', '2026-03-05 11:50:02', 'T202310410'),
(90, 2, 'MongoDB', '2026-03-05 11:50:02', 'A20231000027'),
(91, 2, 'MongoDB', '2026-03-05 11:50:02', 'T202311574'),
(92, 2, 'Redis', '2026-03-05 11:50:02', 'T202312183'),
(93, 2, 'Redis', '2026-03-05 11:50:02', 'D202310188'),
(94, 2, 'AWS', '2026-03-05 11:50:02', 'D202310089'),
(95, 2, 'AWS', '2026-03-05 11:50:02', 'T202210030'),
(96, 2, 'AWS', '2026-03-05 11:50:02', 'T202311527'),
(97, 2, 'Microsoft Azure', '2026-03-05 11:50:02', 'A20231000095'),
(98, 2, 'Microsoft Azure', '2026-03-05 11:50:02', 'T202311907'),
(99, 2, 'Google Cloud Platform', '2026-03-05 11:50:02', 'T202311574'),
(100, 2, 'Google Cloud Platform', '2026-03-05 11:50:02', 'T202311907'),
(104, 2, 'Python', '2026-03-05 12:36:08', 'T202410634'),
(105, 2, 'VS Code', '2026-03-05 12:39:33', 'T201510283'),
(109, 2, 'Postman', '2026-03-05 13:08:29', 'T202412066'),
(110, 2, 'Git Hub', '2026-03-05 13:08:29', 'T202412066'),
(111, 2, 'VS Code', '2026-03-05 13:08:29', 'T202412066'),
(129, 2, 'HTML', '2026-03-06 04:49:46', 'T202111318'),
(130, 2, 'HTML', '2026-03-06 04:53:59', 'D202510495'),
(131, 2, 'Trello', '2026-03-06 04:58:16', 'T202210904'),
(132, 2, 'Jupyter Notebook', '2026-03-06 04:58:16', 'T202210904'),
(133, 2, 'Python', '2026-03-06 04:58:16', 'T202210904'),
(134, 2, 'Asana', '2026-03-09 11:03:43', 'T202411588'),
(135, 2, 'IntelliJ', '2026-03-09 11:10:32', 'T202311986'),
(136, 2, 'Pycharm', '2026-03-09 11:10:32', 'T202311986'),
(137, 2, 'Eclipse', '2026-03-09 11:10:32', 'T202311986'),
(139, 2, 'PyCharm', '2026-03-09 23:31:55', 'T200500624N'),
(140, 2, 'Android Studio', '2026-03-09 23:31:55', 'T200500624N'),
(141, 2, 'Ruby', '2026-03-10 03:02:46', 'T202503937N'),
(142, 2, 'Camunda', '2026-03-10 03:02:46', 'T202503937N'),
(143, 2, 'Python', '2026-03-10 03:02:46', 'T202503937N'),
(156, 2, 'Stack Overflow', '2026-03-10 12:21:21', 'T202410366'),
(157, 2, 'Python', '2026-03-10 12:21:21', 'T202410366'),
(158, 2, 'XAMPP', '2026-03-10 12:21:21', 'T202410366'),
(159, 2, 'PostgreSQL', '2026-03-10 12:21:21', 'T202410366'),
(160, 1, 'Test', '2026-03-10 12:35:07', 'T202503937N'),
(161, 3, 'Microsoft API', '2026-03-11 01:46:35', 'T202411588'),
(162, 1, 'Test', '2026-03-11 01:46:50', 'T202411588');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audience_qa`
--
ALTER TABLE `audience_qa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `audience_qa_likes`
--
ALTER TABLE `audience_qa_likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user_question` (`identification`,`question_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `event_attendees`
--
ALTER TABLE `event_attendees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_event_attendee` (`event_id`,`identification`),
  ADD KEY `identification` (`identification`);

--
-- Indexes for table `multiple_choice_options`
--
ALTER TABLE `multiple_choice_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poll_id` (`poll_id`);

--
-- Indexes for table `multiple_choice_polls`
--
ALTER TABLE `multiple_choice_polls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `multiple_choice_responses`
--
ALTER TABLE `multiple_choice_responses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user_vote` (`poll_id`,`created_by`),
  ADD KEY `option_id` (`option_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `open_text_polls`
--
ALTER TABLE `open_text_polls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `open_text_responses`
--
ALTER TABLE `open_text_responses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poll_id` (`poll_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `ranking_options`
--
ALTER TABLE `ranking_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poll_id` (`poll_id`);

--
-- Indexes for table `ranking_polls`
--
ALTER TABLE `ranking_polls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `ranking_responses`
--
ALTER TABLE `ranking_responses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user_vote` (`poll_id`,`option_id`,`created_by`),
  ADD KEY `option_id` (`option_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `rating_polls`
--
ALTER TABLE `rating_polls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `rating_responses`
--
ALTER TABLE `rating_responses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poll_id` (`poll_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_session` (`event_id`,`poll_type`,`poll_id`);

--
-- Indexes for table `word_cloud_polls`
--
ALTER TABLE `word_cloud_polls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `word_cloud_responses`
--
ALTER TABLE `word_cloud_responses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poll_id` (`poll_id`),
  ADD KEY `created_by` (`created_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audience_qa`
--
ALTER TABLE `audience_qa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `audience_qa_likes`
--
ALTER TABLE `audience_qa_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `event_attendees`
--
ALTER TABLE `event_attendees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `multiple_choice_options`
--
ALTER TABLE `multiple_choice_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=872;

--
-- AUTO_INCREMENT for table `multiple_choice_polls`
--
ALTER TABLE `multiple_choice_polls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `multiple_choice_responses`
--
ALTER TABLE `multiple_choice_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `open_text_polls`
--
ALTER TABLE `open_text_polls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `open_text_responses`
--
ALTER TABLE `open_text_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ranking_options`
--
ALTER TABLE `ranking_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `ranking_polls`
--
ALTER TABLE `ranking_polls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `ranking_responses`
--
ALTER TABLE `ranking_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `rating_polls`
--
ALTER TABLE `rating_polls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `rating_responses`
--
ALTER TABLE `rating_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `word_cloud_polls`
--
ALTER TABLE `word_cloud_polls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `word_cloud_responses`
--
ALTER TABLE `word_cloud_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

-- --------------------------------------------------------

--
-- Structure for view `events_sorted_view`
--
DROP TABLE IF EXISTS `events_sorted_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `events_sorted_view`  AS SELECT `events`.`id` AS `id`, `events`.`code` AS `code`, `events`.`name` AS `name`, `events`.`start_date` AS `start_date`, `events`.`end_date` AS `end_date`, `events`.`created_at` AS `created_at`, `events`.`created_by` AS `created_by`, `events`.`updated_at` AS `updated_at`, `events`.`updated_by` AS `updated_by`, CASE WHEN curdate() between `events`.`start_date` and `events`.`end_date` THEN 1 WHEN `events`.`start_date` > curdate() THEN 2 ELSE 3 END AS `sort_group`, CASE WHEN curdate() between `events`.`start_date` and `events`.`end_date` THEN unix_timestamp(`events`.`start_date`) WHEN `events`.`start_date` > curdate() THEN unix_timestamp(`events`.`start_date`) ELSE -unix_timestamp(`events`.`end_date`) END AS `sort_value` FROM `events` ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audience_qa`
--
ALTER TABLE `audience_qa`
  ADD CONSTRAINT `audience_qa_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `audience_qa_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `edith`.`accounts` (`identification`),
  ADD CONSTRAINT `audience_qa_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `edith`.`accounts` (`identification`);

--
-- Constraints for table `audience_qa_likes`
--
ALTER TABLE `audience_qa_likes`
  ADD CONSTRAINT `audience_qa_likes_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `audience_qa` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `edith`.`accounts` (`identification`),
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `edith`.`accounts` (`identification`);

--
-- Constraints for table `event_attendees`
--
ALTER TABLE `event_attendees`
  ADD CONSTRAINT `event_attendees_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_attendees_ibfk_2` FOREIGN KEY (`identification`) REFERENCES `edith`.`accounts` (`identification`);

--
-- Constraints for table `multiple_choice_options`
--
ALTER TABLE `multiple_choice_options`
  ADD CONSTRAINT `multiple_choice_options_ibfk_1` FOREIGN KEY (`poll_id`) REFERENCES `multiple_choice_polls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `multiple_choice_polls`
--
ALTER TABLE `multiple_choice_polls`
  ADD CONSTRAINT `multiple_choice_polls_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `multiple_choice_polls_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `edith`.`accounts` (`identification`),
  ADD CONSTRAINT `multiple_choice_polls_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `edith`.`accounts` (`identification`);

--
-- Constraints for table `multiple_choice_responses`
--
ALTER TABLE `multiple_choice_responses`
  ADD CONSTRAINT `multiple_choice_responses_ibfk_1` FOREIGN KEY (`poll_id`) REFERENCES `multiple_choice_polls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `multiple_choice_responses_ibfk_2` FOREIGN KEY (`option_id`) REFERENCES `multiple_choice_options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `multiple_choice_responses_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `edith`.`accounts` (`identification`);

--
-- Constraints for table `open_text_polls`
--
ALTER TABLE `open_text_polls`
  ADD CONSTRAINT `open_text_polls_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `open_text_polls_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `edith`.`accounts` (`identification`),
  ADD CONSTRAINT `open_text_polls_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `edith`.`accounts` (`identification`);

--
-- Constraints for table `open_text_responses`
--
ALTER TABLE `open_text_responses`
  ADD CONSTRAINT `open_text_responses_ibfk_1` FOREIGN KEY (`poll_id`) REFERENCES `open_text_polls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `open_text_responses_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `edith`.`accounts` (`identification`);

--
-- Constraints for table `polls`
--
ALTER TABLE `polls`
  ADD CONSTRAINT `polls_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `edith`.`accounts` (`identification`),
  ADD CONSTRAINT `polls_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `edith`.`accounts` (`identification`);

--
-- Constraints for table `ranking_options`
--
ALTER TABLE `ranking_options`
  ADD CONSTRAINT `ranking_options_ibfk_1` FOREIGN KEY (`poll_id`) REFERENCES `ranking_polls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ranking_polls`
--
ALTER TABLE `ranking_polls`
  ADD CONSTRAINT `ranking_polls_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ranking_polls_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `edith`.`accounts` (`identification`),
  ADD CONSTRAINT `ranking_polls_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `edith`.`accounts` (`identification`);

--
-- Constraints for table `ranking_responses`
--
ALTER TABLE `ranking_responses`
  ADD CONSTRAINT `ranking_responses_ibfk_1` FOREIGN KEY (`poll_id`) REFERENCES `ranking_polls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ranking_responses_ibfk_2` FOREIGN KEY (`option_id`) REFERENCES `ranking_options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ranking_responses_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `edith`.`accounts` (`identification`);

--
-- Constraints for table `rating_polls`
--
ALTER TABLE `rating_polls`
  ADD CONSTRAINT `rating_polls_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rating_polls_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `edith`.`accounts` (`identification`),
  ADD CONSTRAINT `rating_polls_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `edith`.`accounts` (`identification`);

--
-- Constraints for table `rating_responses`
--
ALTER TABLE `rating_responses`
  ADD CONSTRAINT `rating_responses_ibfk_1` FOREIGN KEY (`poll_id`) REFERENCES `rating_polls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rating_responses_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `edith`.`accounts` (`identification`);

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `word_cloud_polls`
--
ALTER TABLE `word_cloud_polls`
  ADD CONSTRAINT `word_cloud_polls_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `word_cloud_polls_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `edith`.`accounts` (`identification`),
  ADD CONSTRAINT `word_cloud_polls_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `edith`.`accounts` (`identification`);

--
-- Constraints for table `word_cloud_responses`
--
ALTER TABLE `word_cloud_responses`
  ADD CONSTRAINT `word_cloud_responses_ibfk_1` FOREIGN KEY (`poll_id`) REFERENCES `word_cloud_polls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `word_cloud_responses_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `edith`.`accounts` (`identification`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
