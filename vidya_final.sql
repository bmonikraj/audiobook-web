-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 25, 2018 at 03:58 PM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vidya`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `mid` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` mediumtext NOT NULL,
  `message` longtext NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`mid`, `name`, `message`) VALUES
(3, 'vgjhk', 'gyuhk'),
(2, 'Pk', 'hjqbkdn fwejkjbdnfwui'),
(4, 'gjhk', 'fyguj');

-- --------------------------------------------------------

--
-- Table structure for table `librarydata`
--

CREATE TABLE IF NOT EXISTS `librarydata` (
  `lid` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` mediumtext NOT NULL,
  `class` mediumtext NOT NULL,
  `subject` mediumtext NOT NULL,
  `course` mediumtext NOT NULL,
  `chapter` mediumtext,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `librarydata`
--


-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE IF NOT EXISTS `userdata` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `mobile` mediumtext,
  `email` mediumtext,
  `pwd` longtext NOT NULL,
  `mobile_verified` int(12) NOT NULL DEFAULT '0',
  `bookmark` longtext,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=93 ;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`uid`, `name`, `mobile`, `email`, `pwd`, `mobile_verified`, `bookmark`) VALUES
(92, 'Preetam', '6', 'dsf', 'dd', 1, NULL);
