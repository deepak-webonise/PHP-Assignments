-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 12, 2014 at 08:37 PM
-- Server version: 5.5.38
-- PHP Version: 5.3.10-1ubuntu3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bookShelf`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `author` varchar(30) NOT NULL,
  `publisher` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `bookshelfId` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bookshelfId` (`bookshelfId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `publisher`, `description`, `bookshelfId`) VALUES
(27, 'Fire of Wings II', 'APJ Abdul Kalam', 'Indian', 'asasasasas', 7),
(28, 'Fire of Wings II', 'APJ Abdul Kalam', 'Indian', 'Fire of Wings', 8),
(29, 'dsds', 'dsdsds', 'dsdsds', 'sddsd', 9);

-- --------------------------------------------------------

--
-- Table structure for table `bookshelf`
--

CREATE TABLE IF NOT EXISTS `bookshelf` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `uid` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `bookshelf`
--

INSERT INTO `bookshelf` (`id`, `name`, `uid`) VALUES
(6, 'Comedy1', 11),
(7, 'Politics', 11),
(8, 'Cinemax', 13),
(9, 'Abc', 11);

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE IF NOT EXISTS `temp` (
  `a` int(1) NOT NULL,
  `b` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`a`, `b`) VALUES
(3, '1');

-- --------------------------------------------------------

--
-- Table structure for table `userFiles`
--

CREATE TABLE IF NOT EXISTS `userFiles` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `orignalName` tinytext NOT NULL,
  `userId` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `userFiles`
--

INSERT INTO `userFiles` (`id`, `name`, `orignalName`, `userId`) VALUES
(5, '11_638181897_MyStory.txt', 'MyStory.txt', 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`) VALUES
(11, 'abc', 'abc', 'abc@abc.com', 'abc'),
(12, 'xyz', 'xyz', 'xyz@xyz.com', 'd16fb36f0911f878998c'),
(13, 'deepak', 'kabbur', 'abc@abc.com', 'Deepak123');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`bookshelfId`) REFERENCES `bookshelf` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bookshelf`
--
ALTER TABLE `bookshelf`
  ADD CONSTRAINT `bookshelf_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userFiles`
--
ALTER TABLE `userFiles`
  ADD CONSTRAINT `userFiles_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
