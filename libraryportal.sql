--
-- Database: `libraryportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `facultydetails`
--

CREATE TABLE `facultydetails` (
  `FacultyId` varchar(20) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Gender` varchar(40) NOT NULL,
  `Department` varchar(20) NOT NULL,
  `DepartmentId` varchar(20) NOT NULL,
  `Designation` varchar(30) NOT NULL,
  `E-mail` varchar(30) NOT NULL,
  `ContactNo` int(20) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='faculty registration details';

-- --------------------------------------------------------

--
-- Table structure for table `studentdetails`
--

CREATE TABLE `studentdetails` (
  `StudentNo` int(10) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Course` varchar(30) NOT NULL,
  `Gender` varchar(40) NOT NULL,
  `Branch` varchar(40) NOT NULL,
  `Year` int(40) NOT NULL,
  `E-mail` varchar(40) NOT NULL,
  `City` varchar(40) NOT NULL,
  `ContactNo` int(20) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='student registration details';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `facultydetails`
--
ALTER TABLE `facultydetails`
  ADD PRIMARY KEY (`FacultyId`);

--
-- Indexes for table `studentdetails`
--
ALTER TABLE `studentdetails`
  ADD PRIMARY KEY (`StudentNo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
