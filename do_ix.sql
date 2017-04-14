-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 10, 2017 at 08:03 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `do_ix`
--
CREATE DATABASE IF NOT EXISTS `do_ix` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `do_ix`;

-- --------------------------------------------------------

--
-- Table structure for table `lutbl_items`
--

CREATE TABLE IF NOT EXISTS `lutbl_items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(200) NOT NULL,
  `item_category` varchar(100) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

--
-- Dumping data for table `lutbl_items`
--

INSERT INTO `lutbl_items` (`item_id`, `item_name`, `item_category`) VALUES
(1, 'Burgers', 'A'),
(2, 'Steak and Fries', 'A'),
(3, 'Sushi', 'A'),
(4, 'Ramen', 'A'),
(5, 'Chicken Rice', 'A'),
(6, 'Pasta', 'A'),
(7, 'Chilli Crab', 'A'),
(8, 'Roti Prata', 'A'),
(9, 'Pizza', 'A'),
(10, 'Avocado Salad', 'A'),
(11, 'Chicken Biryani', 'A'),
(12, 'Korean BBQ', 'A'),
(13, 'Pad Thai', 'A'),
(14, 'Sashimi', 'A'),
(15, 'Black Pepper Crab', 'A'),
(16, 'Korean Fried Chicken', 'A'),
(17, 'Spanish Tapas', 'A'),
(18, 'Lobster Roll', 'A'),
(19, 'Hot Pot', 'A'),
(20, 'Laksa', 'A'),
(21, 'Mookata', 'A'),
(22, 'Fish and Chips', 'A'),
(23, 'Bak Kut Teh', 'A'),
(24, 'Wanton Mee', 'A'),
(25, 'Dim Sum', 'A'),
(26, 'Xiao Long Bao', 'A'),
(27, 'BBQ Stingray', 'A'),
(28, 'Hokkien Mee', 'A'),
(29, 'Oyster Omelette', 'A'),
(30, 'Nasi Lemak', 'A'),
(31, 'Shopping', 'B'),
(32, 'Movies', 'B'),
(33, 'Jogging', 'B'),
(34, 'Yoga/meditation', 'B'),
(35, 'Visiting New Restaurants', 'B'),
(36, 'Gym', 'B'),
(37, 'Sentosa Beach', 'B'),
(38, 'Rock Climbing', 'B'),
(39, 'Indoor Skydiving', 'B'),
(40, 'Swimming', 'B'),
(41, 'Art Galleries', 'B'),
(42, 'Science Museum', 'B'),
(43, 'Hiking', 'B'),
(44, 'Cycling', 'B'),
(45, 'Reading', 'B'),
(46, 'Cooking', 'B'),
(47, 'Massage and Spa', 'B'),
(48, 'Concerts', 'B'),
(49, 'Musicals', 'B'),
(50, 'Terrarium Workshop', 'B'),
(51, 'Escape Room Game', 'B'),
(52, 'Art Jamming', 'B'),
(53, 'Zoo', 'B'),
(54, 'Amusement Park', 'B'),
(55, 'Kite Flying', 'B'),
(56, 'Picnic', 'B'),
(57, 'Champagne Brunch', 'B'),
(58, 'Cafe Hopping', 'B'),
(59, 'Cooking Class', 'B'),
(60, 'Language Class', 'B'),
(61, 'Japan', 'C'),
(62, 'Hong Kong', 'C'),
(63, 'Korea', 'C'),
(64, 'Bangkok', 'C'),
(65, 'Bali', 'C'),
(66, 'U.S. / New York', 'C'),
(67, 'U.S. / California', 'C'),
(68, 'Hawaii', 'C'),
(69, 'Phuket', 'C'),
(70, 'Staycation', 'C'),
(71, 'U.K.', 'C'),
(72, 'Iceland', 'C'),
(73, 'France', 'C'),
(74, 'Switzerland', 'C'),
(75, 'Italy', 'C'),
(76, 'Germany', 'C'),
(77, 'Sweden', 'C'),
(78, 'Norway', 'C'),
(79, 'Myanmar', 'C'),
(80, 'Malaysia', 'C'),
(81, 'Yogyakarta', 'C'),
(82, 'India', 'C'),
(83, 'Laos', 'C'),
(84, 'Cambodia', 'C'),
(85, 'Sri Lanka', 'C'),
(86, 'Turkey', 'C'),
(87, 'Iran', 'C'),
(88, 'South Africa', 'C'),
(89, 'Jordan', 'C'),
(90, 'Morocco', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ratings`
--

CREATE TABLE IF NOT EXISTS `tbl_ratings` (
  `rating_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `item_id` int(10) DEFAULT NULL,
  `rating_value` bigint(10) DEFAULT NULL,
  `user_type` tinyint(1) NOT NULL COMMENT '1=initiator 2=invitee',
  `sdt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`rating_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_ratings`
--

INSERT INTO `tbl_ratings` (`rating_id`, `user_id`, `parent_id`, `item_id`, `rating_value`, `user_type`, `sdt`, `status`) VALUES
(1, 1, NULL, 10, 5, 1, '2017-04-06 14:36:53', 1),
(2, 1, NULL, 11, 5, 1, '2017-04-06 14:36:53', 1),
(3, 1, NULL, 12, -5, 1, '2017-04-06 14:36:53', 1),
(4, 2, 1, 10, 5, 2, '2017-04-06 14:37:46', 1),
(5, 2, 1, 11, 5, 2, '2017-04-06 14:37:46', 1),
(6, 2, 1, 12, -5, 2, '2017-04-06 14:37:46', 1),
(7, 3, NULL, 2, 5, 1, '2017-04-07 10:38:35', 1),
(8, 3, NULL, 3, 4, 1, '2017-04-07 10:38:35', 1),
(9, 3, NULL, 4, 5, 1, '2017-04-07 10:38:35', 1),
(10, 4, 3, 2, 4, 2, '2017-04-07 10:38:56', 1),
(11, 4, 3, 3, 4, 2, '2017-04-07 10:38:56', 1),
(12, 4, 3, 4, 4, 2, '2017-04-07 10:38:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_result`
--

CREATE TABLE IF NOT EXISTS `tbl_result` (
  `result_id` int(10) NOT NULL AUTO_INCREMENT,
  `initiator_id` int(10) DEFAULT NULL,
  `invitee_id` int(10) DEFAULT NULL,
  `item_id` int(10) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `score` float DEFAULT NULL,
  `sdt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`result_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_result`
--

INSERT INTO `tbl_result` (`result_id`, `initiator_id`, `invitee_id`, `item_id`, `category`, `score`, `sdt`, `status`) VALUES
(1, 1, 2, 10, 'A', 0, '2017-04-06 14:37:47', 1),
(2, 1, 2, 11, 'A', 0, '2017-04-06 14:37:47', 1),
(3, 1, 2, 12, 'C', 14.1421, '2017-04-06 14:37:47', 1),
(4, 3, 4, 2, 'A', 1, '2017-04-07 10:38:56', 1),
(5, 3, 4, 3, 'A', 1.41421, '2017-04-07 10:38:56', 1),
(6, 3, 4, 4, 'A', 1, '2017-04-07 10:38:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `initiator_email` varchar(200) DEFAULT NULL,
  `initiator_name` varchar(100) DEFAULT NULL,
  `invitee_email` varchar(200) DEFAULT NULL,
  `invitee_name` varchar(100) DEFAULT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `user_type` tinyint(1) NOT NULL COMMENT '1=initiator 2=invitee',
  `sdt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `initiator_email`, `initiator_name`, `invitee_email`, `invitee_name`, `parent_id`, `user_type`, `sdt`, `status`) VALUES
(1, 'siku@email.com', 'sikandar hayat', 'nasir@email.com', 'nasir mehmood', NULL, 1, '2017-04-06 09:36:53', 1),
(2, NULL, NULL, 'nasir@email.com', 'nasir mehmood', 1, 2, '2017-04-06 09:37:46', 1),
(3, 'rahim@email.com', 'rahim', 'karim@email.com', 'karim', NULL, 1, '2017-04-07 05:38:35', 1),
(4, NULL, NULL, 'karim@email.com', 'karim', 3, 2, '2017-04-07 05:38:56', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
