-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2016 at 02:46 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

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
  `Email` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `contactno` int(10) NOT NULL,
  `Address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Name`, `Email`, `Password`, `contactno`, `Address`) VALUES
('akshat', 'akshat@gmail.com', '91d3585c4023ba351e6a', 2147483647, 'allahabad'),
('akshat1', 'mayu@gmail.com', 'c4f4b2eb6d63dd4dd8af', 989999993, 'mayur'),
('Mayur Pathak', 'mayur.pathak52@gmail', 'mayur', 2147483647, 'avas vikas colony hathras'),
('mayurs', 'mayurs@gmail.com', 'mayur', 0, 'mayur\r\n'),
('mayurss', 'mayurss@gami.om', 'c4f4b2eb6d63dd4dd8af', 4394389, 'hahrs\r\n'),
('mayurss', 'mayurssss@gami.om', 'c4f4b2eb6d63dd4dd8af', 4394389, 'hahrs\r\n'),
('naksh', 'nakshatra@gmail.com', 'mayur', 89388, 'hathras'),
('Shivani', 'shivani@gmail.com', 'shivani', 9883, 'hathras\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `Bid` varchar(10) NOT NULL,
  `Bname` varchar(20) NOT NULL,
  `Subject` varchar(20) NOT NULL,
  `Author` varchar(20) NOT NULL,
  `Availability` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`Bid`, `Bname`, `Subject`, `Author`, `Availability`) VALUES
('B1234', 'Engg Chem', 'Chemistry', 'NP shaali', 'no'),
('B123456', 'NP', 'Maths', 'Shivam', 'no'),
('B124', 'C in depth', 'Programming', 'Srivastava', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `claimreturn`
--

CREATE TABLE `claimreturn` (
  `claim_return_id` int(10) NOT NULL,
  `Issue_id` int(10) NOT NULL,
  `Mid` varchar(10) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Bid` varchar(10) NOT NULL,
  `Bname` varchar(20) NOT NULL,
  `validreturndate` date NOT NULL,
  `returnclaim_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `Name` varchar(20) NOT NULL,
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
  `Name` varchar(20) NOT NULL,
  `Bid` varchar(10) NOT NULL,
  `Bname` varchar(20) NOT NULL,
  `Issue_date` date NOT NULL,
  `validreturndate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `issuestore`
--

CREATE TABLE `issuestore` (
  `Issue_id` int(10) NOT NULL,
  `Mid` int(10) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Bid` varchar(10) NOT NULL,
  `Bname` varchar(20) NOT NULL,
  `Issue_date` date NOT NULL,
  `validreturndate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `Name` varchar(20) NOT NULL,
  `Mid` varchar(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Branch` varchar(10) NOT NULL,
  `Year` varchar(4) NOT NULL,
  `ContactNo` int(10) NOT NULL,
  `Address` varchar(70) NOT NULL,
  `Book1` varchar(10) NOT NULL,
  `Book2` varchar(10) NOT NULL,
  `days` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`Name`, `Mid`, `Email`, `Password`, `Branch`, `Year`, `ContactNo`, `Address`, `Book1`, `Book2`, `days`) VALUES
('nakshu', '123', 'nakshu@gmail.com', 'nakshu', 'IT', '2019', 987654312, 'agta', '', '', 0),
('nakass', '1234', 'nakshu@gmail.com', 'mayur', 'IT', '2019', 987654323, 'hathras', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `requestbook`
--

CREATE TABLE `requestbook` (
  `Request_id` int(10) NOT NULL,
  `Mid` varchar(10) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Bid` varchar(10) NOT NULL,
  `Bname` varchar(20) NOT NULL,
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
  `Bname` varchar(20) NOT NULL,
  `Mid` varchar(10) NOT NULL,
  `Name` varchar(20) NOT NULL,
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
  `Bname` varchar(20) NOT NULL,
  `Mid` varchar(10) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `validreturndate` date NOT NULL,
  `Return_date` date NOT NULL,
  `diff` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returnstore`
--

INSERT INTO `returnstore` (`Return_id`, `Issue_id`, `Bid`, `Bname`, `Mid`, `Name`, `validreturndate`, `Return_date`, `diff`) VALUES
(14, 52, 'B0010', 'Data Base', '12IT1023', 'savita', '2015-04-28', '2015-04-20', '8'),
(15, 53, 'B0010', 'Data Base', '12IT1022', 'prajakta', '2015-04-29', '2015-04-21', '8'),
(1, 1, 'B0010', 'Data Base', '12IT1016', 'anjalee', '2015-10-12', '2015-10-04', '8'),
(1, 1, '123', 'NP Bali', '123', 'naks', '2016-09-17', '2016-09-09', '8');

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
-- Indexes for table `claimreturn`
--
ALTER TABLE `claimreturn`
  ADD PRIMARY KEY (`claim_return_id`);

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
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Mid`),
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `claimreturn`
--
ALTER TABLE `claimreturn`
  MODIFY `claim_return_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `Request_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `returnbook`
--
ALTER TABLE `returnbook`
  MODIFY `Return_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
