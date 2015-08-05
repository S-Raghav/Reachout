-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2015 at 06:01 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `reachout`
--

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE IF NOT EXISTS `bids` (
  `bidder_id` varchar(10) DEFAULT NULL,
  `post_id` varchar(50) NOT NULL,
  `bid_value` decimal(10,2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grievance`
--

CREATE TABLE IF NOT EXISTS `grievance` (
  `post_id` varchar(20) DEFAULT NULL,
  `required` bigint(20) DEFAULT NULL,
  `current` bigint(20) DEFAULT NULL,
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `type` varchar(20) NOT NULL,
  `poster_id` varchar(10) NOT NULL,
  `content` longtext NOT NULL,
  `highest_bid` decimal(10,2) NOT NULL,
  `domain` varchar(10) NOT NULL,
  `post_id` varchar(50) NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`post_id`),
  UNIQUE KEY `post_id` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supporters`
--

CREATE TABLE IF NOT EXISTS `supporters` (
  `post_id` varchar(20) DEFAULT NULL,
  `supporter` varchar(10) DEFAULT NULL,
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_auth`
--

CREATE TABLE IF NOT EXISTS `user_auth` (
  `name` varchar(20) NOT NULL,
  `id` varchar(10) NOT NULL,
  `password` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `locality` varchar(100) NOT NULL,
  `reliability` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_auth`
--

INSERT INTO `user_auth` (`name`, `id`, `password`, `email`, `locality`, `reliability`) VALUES
('raghav', 'root', 'tceedu', 'a', 'b', 0),
('raghav', 'suit', 'sasa', 'ccc', 'bypass', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bids`
--
ALTER TABLE `bids`
  ADD CONSTRAINT `bids_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE;

--
-- Constraints for table `grievance`
--
ALTER TABLE `grievance`
  ADD CONSTRAINT `grievance_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE;

--
-- Constraints for table `supporters`
--
ALTER TABLE `supporters`
  ADD CONSTRAINT `supporters_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
