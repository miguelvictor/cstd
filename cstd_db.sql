-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2015 at 11:15 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cstd_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `attractions`
--

CREATE TABLE IF NOT EXISTS `attractions` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attractions`
--

INSERT INTO `attractions` (`id`, `name`, `description`, `picture`) VALUES
(1, 'Boracay', 'For the quick pros and cons, we''ve published a blog post discussing the strengths and weaknesses of each framework, based on our experience.', '/img/img-6.jpg'),
(2, 'Palawan', 'If you''re comparing which JavaScript framework to use on your next project, save time and test your options with our AngularJS, Backbone.js, and Ember.js courses.', '/img/img-7.jpg'),
(3, 'Leyte', 'Is it everything you thought it would be? Are the results okay? How about the docs?', '/img/img-8.jpg'),
(4, 'asdasdasd', 'asdasd', '/attractions/uploads/1445369282.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(11) NOT NULL,
  `attraction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date_published` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `attraction_id`, `user_id`, `comment`, `date_published`) VALUES
(1, 3, 7, 'this is a test comment', '2015-10-18 19:18:06'),
(2, 3, 7, 'testing', '2015-10-20 09:59:26'),
(3, 3, 7, 'yehey', '2015-10-20 09:59:36'),
(4, 2, 7, 'comment', '2015-10-20 09:59:43'),
(5, 4, 7, 'fdgdfgfd', '2015-10-20 12:30:58');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `attraction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `date_published` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`attraction_id`, `user_id`, `rating`, `date_published`) VALUES
(1, 7, 5, '2015-10-18 19:27:34'),
(3, 7, 5, '2015-10-20 13:16:32'),
(2, 7, 5, '2015-10-20 13:17:10'),
(4, 7, 5, '2015-10-20 13:17:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `is_admin`) VALUES
(7, 'miguel victor', 'remulta', 'miggymigz', '$2y$10$YjEmYBJR5kykWdSywepsBetIjQUlLpnP2TWp9pjVoioLvfv2CfpK.', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attractions`
--
ALTER TABLE `attractions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attractions`
--
ALTER TABLE `attractions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
