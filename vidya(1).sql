-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2018 at 08:08 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vidya`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `mid` bigint(20) NOT NULL,
  `name` mediumtext NOT NULL,
  `message` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `librarydata` (
  `lid` bigint(20) NOT NULL,
  `name` mediumtext NOT NULL,
  `class` mediumtext NOT NULL,
  `subject` mediumtext NOT NULL,
  `course` mediumtext NOT NULL,
  `chapter` mediumtext,
  `file_ext` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `uid` bigint(20) NOT NULL,
  `name` tinytext NOT NULL,
  `mobile` mediumtext,
  `email` mediumtext,
  `pwd` longtext NOT NULL,
  `mobile_verified` int(11) NOT NULL DEFAULT '0',
  `bookmark` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`uid`, `name`, `mobile`, `email`, `pwd`, `mobile_verified`, `bookmark`) VALUES
(54, 'hhhjjq', '78', NULL, 'ww', 1, NULL),
(92, 'Preetam', '6', 'dsf', 'dd', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `librarydata`
--
ALTER TABLE `librarydata`
  ADD UNIQUE KEY `lid` (`lid`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `mid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `librarydata`
--
ALTER TABLE `librarydata`
  MODIFY `lid` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `uid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
