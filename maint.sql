-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 14, 2016 at 04:19 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `maint`
--

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1461763652),
('m130524_201442_init', 1461763659);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `due_date` date NOT NULL,
  `responsible` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `machine` varchar(255) NOT NULL,
  `priority` int(11) NOT NULL DEFAULT '0',
  `completion` int(11) NOT NULL DEFAULT '0',
  `today` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `changed_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `responsible` (`responsible`),
  KEY `created_by` (`created_by`),
  KEY `changed_by` (`changed_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `name`, `description`, `start_date`, `due_date`, `responsible`, `location`, `machine`, `priority`, `completion`, `today`, `created`, `created_by`, `changed`, `changed_by`) VALUES
(1, 'TEST 1', 'fkdlsöakflösda\r\nfds\r\naf\r\ndsa\r\nfd\r\nsa', '2012-07-20', '2015-07-20', 1, 'Metsas', 'pole', 10, 5, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `task_file`
--

CREATE TABLE IF NOT EXISTS `task_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `file_no` int(11) NOT NULL,
  `basename` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `extension` varchar(20) NOT NULL,
  `size` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `changed_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `task_id` (`task_id`),
  KEY `created_by` (`created_by`),
  KEY `changed_by` (`changed_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `task_log`
--

CREATE TABLE IF NOT EXISTS `task_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `completion` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `changed_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `task_id` (`task_id`),
  KEY `created_by` (`created_by`),
  KEY `changed_by` (`changed_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `task_log`
--

INSERT INTO `task_log` (`id`, `task_id`, `description`, `completion`, `created`, `created_by`, `changed`, `changed_by`) VALUES
(1, 1, 'Muudatus', 10, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `last_login` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`),
  KEY `entity` (`entity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `entity_id`, `username`, `first_name`, `last_name`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 1, 'tae', '', '', 'tynhEFQ3k1aWqzD6N4xtkb4jMPUGH_Oq', '$2y$13$TCgSBsu8bNt6Yw5MDDE9hu7q1/.62dv0I2OI67xfcbEF7fT7BHZx2', 'NU_y5-N9f3QLBzzTR1DclBNOt3O_D7I3_1461765448', 'teiskop@jeldwen.com', 10, 0, 1461765433, 1461765448);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`responsible`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `task_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `task_ibfk_3` FOREIGN KEY (`changed_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `task_file`
--
ALTER TABLE `task_file`
  ADD CONSTRAINT `task_file_ibfk_3` FOREIGN KEY (`changed_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `task_file_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `task` (`id`),
  ADD CONSTRAINT `task_file_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `task_log`
--
ALTER TABLE `task_log`
  ADD CONSTRAINT `task_log_ibfk_3` FOREIGN KEY (`changed_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `task_log_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `task` (`id`),
  ADD CONSTRAINT `task_log_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
