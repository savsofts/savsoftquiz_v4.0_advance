ALTER TABLE `savsoft_quiz` ADD `quiz_template` VARCHAR(100) NOT NULL DEFAULT 'Default' AFTER `with_login`;

ALTER TABLE `savsoft_group` ADD `description` TEXT NOT NULL AFTER `valid_for_days`;


ALTER TABLE `savsoft_qcl` ADD `i_correct` TEXT NOT NULL AFTER `noq`, ADD `i_incorrect` TEXT NOT NULL AFTER `i_correct`;

ALTER TABLE `savsoft_quiz` CHANGE `correct_score` `correct_score` TEXT NOT NULL, CHANGE `incorrect_score` `incorrect_score` TEXT NOT NULL;

ALTER TABLE `savsoft_users` ADD `wp_user` VARCHAR(100) NULL AFTER `verify_code`;

ALTER TABLE `savsoft_users` ADD `registered_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `wp_user`;

ALTER TABLE `savsoft_users` ADD `photo` VARCHAR(1000) NULL AFTER `registered_date`;

ALTER TABLE `savsoft_users` ADD `user_status` VARCHAR(100) NOT NULL DEFAULT 'Active' AFTER `photo`;

ALTER TABLE `savsoft_payment` ADD `other_data` TEXT NULL AFTER `transaction_id`;

ALTER TABLE `savsoft_users` CHANGE `email` `email` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `first_name` `first_name` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `last_name` `last_name` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `contact_no` `contact_no` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;





--
-- Table structure for table `savsoft_notification`
--

CREATE TABLE `savsoft_notification` (
  `nid` int(11) NOT NULL,
  `notification_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(100) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `click_action` varchar(100) DEFAULT NULL,
  `notification_to` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `savsoft_notification`
--
ALTER TABLE `savsoft_notification`
  ADD PRIMARY KEY (`nid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `savsoft_notification`
--
ALTER TABLE `savsoft_notification`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



ALTER TABLE `savsoft_notification` ADD `response` TEXT NULL AFTER `notification_to`;

ALTER TABLE `savsoft_users` ADD `web_token` VARCHAR(1000) NULL AFTER `user_status`, ADD `android_token` VARCHAR(1000) NULL AFTER `web_token`;


ALTER TABLE `savsoft_notification` ADD `uid` INT NOT NULL AFTER `response`;






