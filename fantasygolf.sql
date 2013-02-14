-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 14, 2013 at 05:16 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fantasygolf`
--

-- --------------------------------------------------------

--
-- Table structure for table `courseholes`
--

CREATE TABLE IF NOT EXISTS `courseholes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `tbox` varchar(255) NOT NULL,
  `hole_num` int(11) NOT NULL,
  `yards` int(11) NOT NULL,
  `par` int(11) NOT NULL,
  `handicap` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `courseholes`
--

INSERT INTO `courseholes` (`id`, `course_id`, `tbox`, `hole_num`, `yards`, `par`, `handicap`, `image`) VALUES
(72, 9, 'gold', 18, 290, 4, 15, NULL),
(71, 9, 'gold', 17, 545, 5, 3, NULL),
(70, 9, 'gold', 16, 360, 4, 7, NULL),
(69, 9, 'gold', 15, 178, 3, 13, NULL),
(68, 9, 'gold', 14, 545, 5, 1, NULL),
(67, 9, 'gold', 13, 171, 3, 11, NULL),
(66, 9, 'gold', 12, 490, 5, 9, NULL),
(65, 9, 'gold', 11, 143, 3, 17, NULL),
(64, 9, 'gold', 10, 400, 4, 5, NULL),
(63, 9, 'gold', 9, 410, 4, 6, NULL),
(62, 9, 'gold', 8, 325, 4, 12, NULL),
(61, 9, 'gold', 7, 365, 4, 10, NULL),
(60, 9, 'gold', 6, 164, 3, 14, NULL),
(59, 9, 'gold', 5, 515, 5, 4, NULL),
(58, 9, 'gold', 4, 140, 3, 16, NULL),
(57, 9, 'gold', 3, 415, 4, 2, NULL),
(56, 9, 'gold', 2, 150, 3, 18, NULL),
(55, 9, 'gold', 1, 395, 4, 8, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coursenames`
--

CREATE TABLE IF NOT EXISTS `coursenames` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `course_name` (`course_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `coursenames`
--

INSERT INTO `coursenames` (`id`, `course_name`) VALUES
(9, 'Meadow Oaks');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `tbox` varchar(255) NOT NULL,
  `rating` decimal(2,1) NOT NULL,
  `slope` int(11) NOT NULL,
  `outyds` int(11) NOT NULL,
  `inyds` int(11) NOT NULL,
  `totalyds` int(11) NOT NULL,
  `par` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_id`, `tbox`, `rating`, `slope`, `outyds`, `inyds`, `totalyds`, `par`, `image`) VALUES
(9, 9, 'gold', '9.9', 121, 2879, 3122, 6001, 70, '');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`) VALUES
(1, 'fantasygolf'),
(2, 'player'),
(3, 'course'),
(4, 'tournament'),
(5, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `displayname` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `module_id`, `name`, `displayname`, `status`) VALUES
(1, 1, 'login', 'Login', 1),
(2, 5, 'addUser', 'Add Users', 1),
(3, 2, 'addCourse', 'Add Courses', 1),
(4, 5, 'editUser', 'Edit Users', 1),
(5, 2, 'editCourse', 'Edit Courses', 1),
(6, 1, 'register', 'Register', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rolepermissions`
--

CREATE TABLE IF NOT EXISTS `rolepermissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `rolepermissions`
--

INSERT INTO `rolepermissions` (`id`, `role_id`, `permission_id`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 3),
(4, 2, 4),
(5, 2, 5),
(6, 1, 1),
(7, 1, 3),
(8, 1, 5),
(9, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `displayname` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `displayname`, `status`) VALUES
(1, 'player', 'Player', 1),
(2, 'admin', 'Administrator', 1),
(3, 'guest', 'Guest', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usercourses`
--

CREATE TABLE IF NOT EXISTS `usercourses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `usercourses`
--

INSERT INTO `usercourses` (`id`, `user_id`, `course_id`) VALUES
(1, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

CREATE TABLE IF NOT EXISTS `userroles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email2` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `startdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `handicap` float DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `email2`, `firstname`, `lastname`, `middlename`, `dob`, `startdate`, `handicap`, `status`) VALUES
(1, 'clayreiche@gmail.com', 'reiche', NULL, 'Clay', 'Reiche', 'Brandon', '1973-02-21 00:00:00', '2011-09-02 15:33:07', 13, 1),
(2, 'creiche@igov.com', 'reiche', NULL, 'Chuck', 'Reiche', 'Patrick', '1971-01-25 00:00:00', '2013-02-13 17:10:43', 9, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
