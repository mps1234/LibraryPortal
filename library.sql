-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2016 at 08:16 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Name` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `contactno` varchar(30) NOT NULL,
  `Address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Name`, `Email`, `Password`, `contactno`, `Address`) VALUES
('Akshat', 'akshatsrivastava2@gmail.com', '202cb962ac59075b964b07152d234b70', '1236547890', 'asddjsad');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `Bid` varchar(10) NOT NULL,
  `Bname` varchar(50) NOT NULL,
  `Subject` varchar(50) NOT NULL,
  `Author` varchar(50) NOT NULL,
  `No_of_books` int(10) NOT NULL,
  `Availability` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`Bid`, `Bname`, `Subject`, `Author`, `No_of_books`, `Availability`) VALUES
('B12', 'dsac', 'sdsad', 'asd', 9, 'yes'),
('B79', 'Akshat', 'Maths', 'Akshat', 8, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `bookrecommend`
--

CREATE TABLE `bookrecommend` (
  `Bid` varchar(20) NOT NULL,
  `recommend` varchar(3) NOT NULL,
  `Bname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookrecommend`
--

INSERT INTO `bookrecommend` (`Bid`, `recommend`, `Bname`) VALUES
('B79', 'yes', 'Akshat');

-- --------------------------------------------------------

--
-- Table structure for table `claimreturn`
--

CREATE TABLE `claimreturn` (
  `claim_return_id` int(10) NOT NULL,
  `Issue_id` int(10) NOT NULL,
  `Mid` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Bid` varchar(10) NOT NULL,
  `Bname` varchar(50) NOT NULL,
  `validreturndate` date NOT NULL,
  `returnclaim_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `facultydetails`
--

CREATE TABLE `facultydetails` (
  `name` varchar(50) NOT NULL,
  `facultyNo` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `department` varchar(30) NOT NULL,
  `year` int(4) NOT NULL,
  `contactNo` text NOT NULL,
  `address` varchar(60) NOT NULL,
  `Book1` varchar(50) NOT NULL,
  `Book2` varchar(50) NOT NULL,
  `days` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facultydetails`
--

INSERT INTO `facultydetails` (`name`, `facultyNo`, `email`, `password`, `department`, `year`, `contactNo`, `address`, `Book1`, `Book2`, `days`) VALUES
('Akshat', 1513101, 'akshatsrivastava2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'IT', 1, '8802072703', 'Allahabad', '', '', 0),
('Akshat Kumar Srivastava', 4569873, 'tanyabaranwal394@gmail.com', '202cb962ac59075b964b07152d234b70', 'IT', 1, '4569871230', 'dkfjk', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `finepaid`
--

CREATE TABLE `finepaid` (
  `Fine_pay_id` int(11) NOT NULL,
  `Fine_id` int(11) NOT NULL,
  `Issue_id` int(11) NOT NULL,
  `Return_id` int(11) NOT NULL,
  `Bid` varchar(10) NOT NULL,
  `Mid` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Amount` int(10) NOT NULL,
  `payment_date` timestamp(1) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

-- --------------------------------------------------------

--
-- Table structure for table `fine_unpaid`
--

CREATE TABLE `fine_unpaid` (
  `Fine_id` int(10) NOT NULL,
  `Issue_id` int(10) NOT NULL,
  `Return_id` int(10) NOT NULL,
  `Bid` varchar(10) NOT NULL,
  `Mid` varchar(10) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Issue_date` date NOT NULL,
  `Return_date` date NOT NULL,
  `diff` varchar(10) NOT NULL,
  `Amount` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `issuebook`
--

CREATE TABLE `issuebook` (
  `Issue_id` int(10) NOT NULL,
  `Request_id` int(10) NOT NULL,
  `Mid` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Bid` varchar(10) NOT NULL,
  `Bname` varchar(50) NOT NULL,
  `Issue_date` date NOT NULL,
  `validreturndate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issuebook`
--

INSERT INTO `issuebook` (`Issue_id`, `Request_id`, `Mid`, `Name`, `Bid`, `Bname`, `Issue_date`, `validreturndate`) VALUES
(1, 1, '1234567', 'Nakshatra', 'B79', 'Akshat', '2016-09-21', '2016-09-29');

-- --------------------------------------------------------

--
-- Table structure for table `issuestore`
--

CREATE TABLE `issuestore` (
  `Issue_id` int(10) NOT NULL,
  `Mid` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Bid` varchar(10) NOT NULL,
  `Bname` varchar(50) NOT NULL,
  `Issue_date` date NOT NULL,
  `validreturndate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issuestore`
--

INSERT INTO `issuestore` (`Issue_id`, `Mid`, `Name`, `Bid`, `Bname`, `Issue_date`, `validreturndate`) VALUES
(1, 1234567, 'Nakshatra', 'B79', 'Akshat', '2016-09-24', '2016-10-02'),
(12, 1234569, 'sdkjf', 'B12', 'dsac', '2016-09-23', '2016-09-15'),
(13, 1234569, 'sdkjf', 'B79', 'Akshat', '2016-09-23', '2016-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `library_code`
--

CREATE TABLE `library_code` (
  `code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `library_code`
--

INSERT INTO `library_code` (`code`) VALUES
('mayur');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `Name` varchar(50) NOT NULL,
  `Mid` varchar(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Branch` varchar(10) NOT NULL,
  `Year` varchar(4) NOT NULL,
  `ContactNo` varchar(20) NOT NULL,
  `Address` varchar(70) NOT NULL,
  `Book1` varchar(50) NOT NULL,
  `Book2` varchar(50) NOT NULL,
  `days` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`Name`, `Mid`, `Email`, `Password`, `Branch`, `Year`, `ContactNo`, `Address`, `Book1`, `Book2`, `days`) VALUES
('sdkjf', '1234569', 'tanyabaranwal394@gmail.com', '202cb962ac59075b964b07152d234b70', 'IT', '1', '1230456987', 'hhdskfhs', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `requestbook`
--

CREATE TABLE `requestbook` (
  `Request_id` int(10) NOT NULL,
  `Mid` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Bid` varchar(10) NOT NULL,
  `Bname` varchar(50) NOT NULL,
  `requestdate` date NOT NULL,
  `requestexpirydays` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `returnbook`
--

CREATE TABLE `returnbook` (
  `Return_id` int(10) NOT NULL,
  `Issue_id` int(10) NOT NULL,
  `claim_return_id` int(10) NOT NULL,
  `Bid` varchar(10) NOT NULL,
  `Bname` varchar(50) NOT NULL,
  `Mid` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `validreturndate` date NOT NULL,
  `Return_date` date NOT NULL,
  `diff` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `returnstore`
--

CREATE TABLE `returnstore` (
  `Return_id` int(10) NOT NULL,
  `Issue_id` int(10) NOT NULL,
  `Bid` varchar(10) NOT NULL,
  `Bname` varchar(50) NOT NULL,
  `Mid` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `validreturndate` date NOT NULL,
  `Return_date` date NOT NULL,
  `diff` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returnstore`
--

INSERT INTO `returnstore` (`Return_id`, `Issue_id`, `Bid`, `Bname`, `Mid`, `Name`, `validreturndate`, `Return_date`, `diff`) VALUES
(1, 1, '123', 'NP Bali', '', 'naks', '2016-09-17', '2016-09-09', '8'),
(1, 1, 'B0010', 'Data Base', '', 'anjalee', '2015-10-12', '2015-10-04', '8'),
(15, 53, 'B0010', 'Data Base', '', 'prajakta', '2015-04-29', '2015-04-21', '8'),
(14, 52, 'B0010', 'Data Base', '', 'savita', '2015-04-28', '2015-04-20', '8'),
(1, 1, 'B79', 'Akshat', '1234567', 'sdfjh', '2016-09-27', '2016-09-19', '8'),
(1, 2, 'B12', 'dsac', '1513101', 'Aska', '2016-09-29', '2016-09-21', '8');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`link`) VALUES
('uploads/17-bomb-3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`Bid`);

--
-- Indexes for table `bookrecommend`
--
ALTER TABLE `bookrecommend`
  ADD PRIMARY KEY (`Bid`);

--
-- Indexes for table `claimreturn`
--
ALTER TABLE `claimreturn`
  ADD PRIMARY KEY (`claim_return_id`);

--
-- Indexes for table `facultydetails`
--
ALTER TABLE `facultydetails`
  ADD PRIMARY KEY (`facultyNo`),
  ADD UNIQUE KEY `facultyNo` (`facultyNo`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `fine_unpaid`
--
ALTER TABLE `fine_unpaid`
  ADD PRIMARY KEY (`Fine_id`);

--
-- Indexes for table `issuebook`
--
ALTER TABLE `issuebook`
  ADD PRIMARY KEY (`Issue_id`);

--
-- Indexes for table `issuestore`
--
ALTER TABLE `issuestore`
  ADD PRIMARY KEY (`Issue_id`);

--
-- Indexes for table `library_code`
--
ALTER TABLE `library_code`
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Mid`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `RollNo` (`Mid`);

--
-- Indexes for table `requestbook`
--
ALTER TABLE `requestbook`
  ADD PRIMARY KEY (`Request_id`);

--
-- Indexes for table `returnbook`
--
ALTER TABLE `returnbook`
  ADD PRIMARY KEY (`Return_id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD UNIQUE KEY `link` (`link`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `claimreturn`
--
ALTER TABLE `claimreturn`
  MODIFY `claim_return_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fine_unpaid`
--
ALTER TABLE `fine_unpaid`
  MODIFY `Fine_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `issuebook`
--
ALTER TABLE `issuebook`
  MODIFY `Issue_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `requestbook`
--
ALTER TABLE `requestbook`
  MODIFY `Request_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `returnbook`
--
ALTER TABLE `returnbook`
  MODIFY `Return_id` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
