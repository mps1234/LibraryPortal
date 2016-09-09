-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2016 at 06:29 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libraryportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookdetails`
--

CREATE TABLE `bookdetails` (
  `ISBN` int(25) NOT NULL,
  `BookName` varchar(60) DEFAULT NULL,
  `AuthorName` varchar(60) DEFAULT NULL,
  `Edition` varchar(10) DEFAULT NULL,
  `Publication` varchar(60) DEFAULT NULL,
  `NoOfBooks` int(20) DEFAULT NULL,
  `genre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bookissue`
--

CREATE TABLE `bookissue` (
  `ISBN` int(45) NOT NULL,
  `issueId` int(11) NOT NULL,
  `issueDate` date NOT NULL,
  `returnDate` date NOT NULL,
  `studentNo` int(7) NOT NULL,
  `facultyNo` int(10) NOT NULL,
  `NoOfBooks` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentId` int(20) NOT NULL,
  `department` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `facultydetails`
--

CREATE TABLE `facultydetails` (
  `facultyNo` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `department` varchar(30) NOT NULL,
  `contactNo` int(12) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentdetail`
--

CREATE TABLE `studentdetail` (
  `studentNo` int(7) NOT NULL,
  `name` varchar(60) NOT NULL,
  `branch` varchar(60) NOT NULL,
  `year` int(4) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contactNo` int(15) NOT NULL,
  `city` varchar(60) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookdetails`
--
ALTER TABLE `bookdetails`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department`),
  ADD UNIQUE KEY `department` (`department`);

--
-- Indexes for table `facultydetails`
--
ALTER TABLE `facultydetails`
  ADD PRIMARY KEY (`facultyNo`);

--
-- Indexes for table `studentdetail`
--
ALTER TABLE `studentdetail`
  ADD UNIQUE KEY `studentNo` (`studentNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookdetails`
--
ALTER TABLE `bookdetails`
  MODIFY `ISBN` int(25) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
