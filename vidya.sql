-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2018 at 03:11 AM
-- Server version: 5.6.26-log
-- PHP Version: 5.6.25

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
-- Table structure for table `librarydata`
--

CREATE TABLE `librarydata` (
  `lid` bigint(20) NOT NULL,
  `name` mediumtext NOT NULL,
  `class` mediumtext NOT NULL,
  `subject` mediumtext NOT NULL,
  `course` mediumtext NOT NULL,
  `chapter` mediumtext
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
  `password` longtext NOT NULL,
  `mobile_verified` int(11) NOT NULL DEFAULT '0',
  `bookmark` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `librarydata`
--
ALTER TABLE `librarydata`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `librarydata`
--
ALTER TABLE `librarydata`
  MODIFY `lid` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `uid` bigint(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
