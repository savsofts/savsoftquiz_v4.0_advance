-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2017 at 05:26 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `savsoftquiz_v4.0`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `data` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `class_coment`
--

CREATE TABLE `class_coment` (
  `content_id` int(11) NOT NULL,
  `generated_time` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `content_by` int(11) NOT NULL,
  `published` int(11) NOT NULL DEFAULT '0',
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class_gid`
--

CREATE TABLE `class_gid` (
  `clgid` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `gid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `live_class`
--

CREATE TABLE `live_class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(1000) NOT NULL,
  `initiated_by` int(11) NOT NULL,
  `initiated_time` int(11) NOT NULL,
  `closed_time` int(11) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `savsoft_answers`
--

CREATE TABLE `savsoft_answers` (
  `aid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `q_option` text NOT NULL,
  `uid` int(11) NOT NULL,
  `score_u` float NOT NULL DEFAULT '0',
  `rid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `savsoft_category`
--

CREATE TABLE `savsoft_category` (
  `cid` int(11) NOT NULL,
  `category_name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `savsoft_category`
--

INSERT INTO `savsoft_category` (`cid`, `category_name`) VALUES
(1, 'General knowledge'),
(2, 'Math');

-- --------------------------------------------------------

--
-- Table structure for table `savsoft_group`
--

CREATE TABLE `savsoft_group` (
  `gid` int(11) NOT NULL,
  `group_name` varchar(1000) NOT NULL,
  `price` float NOT NULL,
  `valid_for_days` int(11) NOT NULL DEFAULT '0',
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `savsoft_group`
--

INSERT INTO `savsoft_group` (`gid`, `group_name`, `price`, `valid_for_days`, `description`) VALUES
(1, 'Free', 0, 0, '10 Free quiz'),
(3, 'Premium-1', 100, 90, '100 Quizzes'),
(4, 'Group 3', 2500, 90, '<p>Unlimites quizzes.</p>\r\n<p>Phone support</p>');

-- --------------------------------------------------------

--
-- Table structure for table `savsoft_level`
--

CREATE TABLE `savsoft_level` (
  `lid` int(11) NOT NULL,
  `level_name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `savsoft_level`
--

INSERT INTO `savsoft_level` (`lid`, `level_name`) VALUES
(1, 'Easy'),
(2, 'Difficult');

-- --------------------------------------------------------

--
-- Table structure for table `savsoft_notification`
--

CREATE TABLE `savsoft_notification` (
  `nid` int(11) NOT NULL,
  `notification_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(100) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `click_action` varchar(100) DEFAULT NULL,
  `notification_to` varchar(1000) DEFAULT NULL,
  `response` text,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `savsoft_options`
--

CREATE TABLE `savsoft_options` (
  `oid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `q_option` text NOT NULL,
  `q_option_match` varchar(1000) DEFAULT NULL,
  `score` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `savsoft_options`
--

INSERT INTO `savsoft_options` (`oid`, `qid`, `q_option`, `q_option_match`, `score`) VALUES
(46, 6, 'Good Morning', 'Good Night', 0.25),
(47, 6, 'Honda', 'BMW', 0.25),
(48, 6, 'Keyboard', 'CPU', 0.25),
(49, 6, 'Red', 'Green', 0.25),
(51, 7, 'Blue, Sky Blue', NULL, 1),
(52, 3, '4', NULL, 0.5),
(53, 3, '5', NULL, 0),
(54, 3, 'Four', NULL, 0.5),
(55, 3, 'Six', NULL, 0),
(56, 1, 'Patiala', NULL, 0),
(57, 1, 'New Delhi', NULL, 1),
(58, 1, 'Chandigarh', NULL, 0),
(59, 1, 'Mumbai', NULL, 0),
(76, 14, 'A', 'B', 0.25),
(77, 14, 'C', 'D', 0.25),
(78, 14, 'E', 'F', 0.25),
(79, 14, 'G', 'H', 0.25),
(81, 15, 'Washington, Washington D.C', NULL, 1),
(82, 13, '<p>five</p>', NULL, 0),
(83, 13, '<p>40</p>', NULL, 0.5),
(84, 13, '<p>fourty</p>', NULL, 0.5),
(85, 13, '<p>six</p>', NULL, 0),
(86, 12, '<p>five</p>', NULL, 0),
(87, 12, '<p>14</p>', NULL, 1),
(88, 12, '<p>three</p>', NULL, 0),
(89, 12, '<p>six</p>', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `savsoft_payment`
--

CREATE TABLE `savsoft_payment` (
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `amount` float NOT NULL,
  `paid_date` int(11) NOT NULL,
  `payment_gateway` varchar(100) NOT NULL DEFAULT 'Paypal',
  `payment_status` varchar(100) NOT NULL DEFAULT 'Pending',
  `transaction_id` varchar(1000) NOT NULL,
  `other_data` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `savsoft_qbank`
--

CREATE TABLE `savsoft_qbank` (
  `qid` int(11) NOT NULL,
  `question_type` varchar(100) NOT NULL DEFAULT 'Multiple Choice Single Answer',
  `question` text NOT NULL,
  `description` text NOT NULL,
  `cid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `no_time_served` int(11) NOT NULL DEFAULT '0',
  `no_time_corrected` int(11) NOT NULL DEFAULT '0',
  `no_time_incorrected` int(11) NOT NULL DEFAULT '0',
  `no_time_unattempted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `savsoft_qbank`
--

INSERT INTO `savsoft_qbank` (`qid`, `question_type`, `question`, `description`, `cid`, `lid`, `no_time_served`, `no_time_corrected`, `no_time_incorrected`, `no_time_unattempted`) VALUES
(1, 'Multiple Choice Single Answer', 'What is the capital of INDIA?', 'New Delhi', 2, 1, 15, 11, 2, 2),
(3, 'Multiple Choice Multiple Answer', 'What is 2+2=?', '4', 2, 1, 15, 10, 2, 3),
(6, 'Match the Column', 'Match the Following', '', 1, 1, 10, 5, 1, 4),
(7, 'Short Answer', 'What is the color of sky?', '', 1, 1, 10, 4, 1, 5),
(8, 'Long Answer', 'Write an essay on INDIA. (250 words )', '', 1, 1, 4, 0, 0, 3),
(12, 'Multiple Choice Single Answer', '<p>What is 12+2 = ?</p>', '<p>Here is description or explanation</p>', 1, 2, 5, 2, 1, 2),
(13, 'Multiple Choice Multiple Answer', '<p>What is 32+8 = ?&nbsp;</p>', '<p>Here is description or explanation</p>', 1, 2, 5, 2, 0, 3),
(14, 'Match the Column', 'Match the column', 'Here is description or explanation', 1, 2, 0, 0, 0, 0),
(15, 'Short Answer', '<p>What is the capital of USA</p>', '<p>Here is description or explanation</p>', 1, 2, 0, 0, 0, 0),
(16, 'Long Answer', '<p>Write about Globalization in 250 words</p>', '<p>Here is description or explanation</p>', 2, 2, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `savsoft_qcl`
--

CREATE TABLE `savsoft_qcl` (
  `qcl_id` int(11) NOT NULL,
  `quid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `noq` int(11) NOT NULL,
  `i_correct` text NOT NULL,
  `i_incorrect` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `savsoft_qcl`
--

INSERT INTO `savsoft_qcl` (`qcl_id`, `quid`, `cid`, `lid`, `noq`, `i_correct`, `i_incorrect`) VALUES
(71, 2, 1, 1, 3, '1', '0'),
(72, 2, 3, 1, 1, '1', '0'),
(73, 2, 2, 1, 1, '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `savsoft_quiz`
--

CREATE TABLE `savsoft_quiz` (
  `quid` int(11) NOT NULL,
  `quiz_name` varchar(1000) NOT NULL,
  `description` text NOT NULL,
  `start_date` int(11) NOT NULL,
  `end_date` int(11) NOT NULL,
  `gids` text NOT NULL,
  `qids` text NOT NULL,
  `noq` int(11) NOT NULL,
  `correct_score` text NOT NULL,
  `incorrect_score` text NOT NULL,
  `ip_address` text NOT NULL,
  `duration` int(11) NOT NULL DEFAULT '10',
  `maximum_attempts` int(11) NOT NULL DEFAULT '1',
  `pass_percentage` float NOT NULL DEFAULT '50',
  `view_answer` int(11) NOT NULL DEFAULT '1',
  `camera_req` int(11) NOT NULL DEFAULT '1',
  `question_selection` int(11) NOT NULL DEFAULT '1',
  `gen_certificate` int(11) NOT NULL DEFAULT '0',
  `certificate_text` text,
  `with_login` int(11) NOT NULL DEFAULT '1',
  `quiz_template` varchar(100) NOT NULL DEFAULT 'Default'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `savsoft_quiz`
--
INSERT INTO `savsoft_quiz` (`quid`, `quiz_name`, `description`, `start_date`, `end_date`, `gids`, `qids`, `noq`, `correct_score`, `incorrect_score`, `ip_address`, `duration`, `maximum_attempts`, `pass_percentage`, `view_answer`, `camera_req`, `question_selection`, `gen_certificate`, `certificate_text`, `with_login`, `quiz_template`) VALUES
(1, 'Sample Quiz', '<p>Sample Quiz Sample Quiz</p>', 1460344840, 1522502169, '3,1', '1,3,12,13', 4, '1', '0', '', 1000, 10, 50, 1, 0, 0, 0, NULL, 1, 'Default'),
(2, 'Sample Quiz 2', '<p>Sample Quiz 2</p>', 1457687593, 1522502169, '1,3,4', '', 5, '1', '0', '', 100, 10, 50, 1, 0, 1, 1, 'ID: #{result_id}<br>\r\n \r\n<br><br>\r\n<center>\r\n<font style=''font-size:32px;''>Certificate</font><br><br><br>\r\n<h4>This is certified that {first_name}  {last_name} has attempted the quiz ''{quiz_name}'' and obtained {percentage_obtained}% marks.<br>\r\nHis/her result status is {status}<br>\r\n</h4>\r\n\r\n</center>\r\n<br><br><br><br><br><br> \r\n{qr_code}<br>\r\nDate: {generated_date}', 1, 'Default'),
(3, 'Quiz with advance template', '', 1490966169, 1522502169, '1,3,4', '1,3,6,7', 4, '1,1,1,1', '-0.33,-0.33,-0.33,-0.33', '', 10, 10, 50, 1, 0, 0, 0, NULL, 1, 'Advance');

-- --------------------------------------------------------

--
-- Table structure for table `savsoft_result`
--

CREATE TABLE `savsoft_result` (
  `rid` int(11) NOT NULL,
  `quid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `result_status` varchar(100) NOT NULL DEFAULT 'Open',
  `start_time` int(11) NOT NULL,
  `end_time` int(11) NOT NULL,
  `categories` text NOT NULL,
  `category_range` text NOT NULL,
  `r_qids` text NOT NULL,
  `individual_time` text NOT NULL,
  `total_time` int(11) NOT NULL DEFAULT '0',
  `score_obtained` float NOT NULL DEFAULT '0',
  `percentage_obtained` float NOT NULL DEFAULT '0',
  `attempted_ip` varchar(100) NOT NULL,
  `score_individual` text NOT NULL,
  `photo` varchar(100) NOT NULL,
  `manual_valuation` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `savsoft_users`
--

CREATE TABLE `savsoft_users` (
  `uid` int(11) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `contact_no` varchar(1000) DEFAULT NULL,
  `connection_key` varchar(1000) DEFAULT NULL,
  `gid` int(11) NOT NULL DEFAULT '1',
  `su` int(11) NOT NULL DEFAULT '0',
  `subscription_expired` int(11) NOT NULL DEFAULT '0',
  `verify_code` int(11) NOT NULL DEFAULT '0',
  `wp_user` varchar(100) DEFAULT NULL,
  `registered_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `photo` varchar(1000) DEFAULT NULL,
  `user_status` varchar(100) NOT NULL DEFAULT 'Active',
  `web_token` varchar(1000) DEFAULT NULL,
  `android_token` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `savsoft_users`
--

INSERT INTO `savsoft_users` (`uid`, `password`, `email`, `first_name`, `last_name`, `contact_no`, `connection_key`, `gid`, `su`, `subscription_expired`, `verify_code`, `wp_user`, `registered_date`, `photo`, `user_status`, `web_token`, `android_token`) VALUES
(1, '21232f297a57a5a743894a0e4a801fc3', 'admin@example.com', 'Admin', 'Admin', '1234567890', NULL, 1, 1, 1776290400, 0, '', '2017-04-20 11:22:38', NULL, 'Active', 'dnwIpQWkxyA:APA91bFZLhdxZnPcNareTyHnJRikJGqaT7qh9DF4jSmyKSOq1rv6k7uwgmaQ4_K7jT3WNNUeKRdRQYsNf_OZaQZ7i5nKI_CjA6QGPwPsL5_D7ShPTtsuIwTkr0CuGx0RS7oAVNg_bImc', NULL),
(5, 'e10adc3949ba59abbe56e057f20f883e', 'user@example.com', 'User', 'User', '1234567890', '123', 1, 0, 2122569000, 0, '', '2017-04-20 11:22:38', NULL, 'Active', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_coment`
--
ALTER TABLE `class_coment`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `class_gid`
--
ALTER TABLE `class_gid`
  ADD PRIMARY KEY (`clgid`);

--
-- Indexes for table `live_class`
--
ALTER TABLE `live_class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `savsoft_answers`
--
ALTER TABLE `savsoft_answers`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `savsoft_category`
--
ALTER TABLE `savsoft_category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `savsoft_group`
--
ALTER TABLE `savsoft_group`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `savsoft_level`
--
ALTER TABLE `savsoft_level`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `savsoft_notification`
--
ALTER TABLE `savsoft_notification`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `savsoft_options`
--
ALTER TABLE `savsoft_options`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `savsoft_payment`
--
ALTER TABLE `savsoft_payment`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `savsoft_qbank`
--
ALTER TABLE `savsoft_qbank`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `savsoft_qcl`
--
ALTER TABLE `savsoft_qcl`
  ADD PRIMARY KEY (`qcl_id`);

--
-- Indexes for table `savsoft_quiz`
--
ALTER TABLE `savsoft_quiz`
  ADD PRIMARY KEY (`quid`);

--
-- Indexes for table `savsoft_result`
--
ALTER TABLE `savsoft_result`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `savsoft_users`
--
ALTER TABLE `savsoft_users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class_coment`
--
ALTER TABLE `class_coment`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `class_gid`
--
ALTER TABLE `class_gid`
  MODIFY `clgid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `live_class`
--
ALTER TABLE `live_class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `savsoft_answers`
--
ALTER TABLE `savsoft_answers`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `savsoft_category`
--
ALTER TABLE `savsoft_category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `savsoft_group`
--
ALTER TABLE `savsoft_group`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `savsoft_level`
--
ALTER TABLE `savsoft_level`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `savsoft_notification`
--
ALTER TABLE `savsoft_notification`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `savsoft_options`
--
ALTER TABLE `savsoft_options`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `savsoft_payment`
--
ALTER TABLE `savsoft_payment`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `savsoft_qbank`
--
ALTER TABLE `savsoft_qbank`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `savsoft_qcl`
--
ALTER TABLE `savsoft_qcl`
  MODIFY `qcl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `savsoft_quiz`
--
ALTER TABLE `savsoft_quiz`
  MODIFY `quid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `savsoft_result`
--
ALTER TABLE `savsoft_result`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `savsoft_users`
--
ALTER TABLE `savsoft_users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
