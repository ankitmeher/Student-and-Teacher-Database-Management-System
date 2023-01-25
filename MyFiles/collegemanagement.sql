-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2022 at 08:25 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `collegemanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `academicinfo`
--

CREATE TABLE `academicinfo` (
  `id` int(11) NOT NULL,
  `uroll` varchar(20) NOT NULL,
  `sm1` float DEFAULT NULL,
  `sm2` float DEFAULT NULL,
  `sm3` float DEFAULT NULL,
  `sm4` float DEFAULT NULL,
  `sm5` float DEFAULT NULL,
  `sm6` float DEFAULT NULL,
  `mark10` float NOT NULL,
  `mark12` float NOT NULL,
  `schoolname` varchar(50) NOT NULL,
  `schooladdress` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `academicinfo`
--

INSERT INTO `academicinfo` (`id`, `uroll`, `sm1`, `sm2`, `sm3`, `sm4`, `sm5`, `sm6`, `mark10`, `mark12`, `schoolname`, `schooladdress`) VALUES
(14, 'UBS19CSC-023', 100, 99, 99, 99, 99, 99, 89, 88, 'GNPS', 'khetrajpur'),
(16, 'BBBKBMNM', 0, 0, 0, 0, 0, 0, 98, 99, 'GNPS', 'jhcvjhv'),
(17, 'ASCASCASC', NULL, 0, 0, 0, 0, 0, 64, 49, 'GNPS', 'Badabazar, Haldi Mill, Sambalpur'),
(24, 'UBS19CSC-008', 65, 99, 99, 99, 99, 99, 54, 68, 'ajkscvkaaskjcb', 'sakjkcblcb');

-- --------------------------------------------------------

--
-- Table structure for table `contactinfo`
--

CREATE TABLE `contactinfo` (
  `id` int(11) NOT NULL,
  `uroll` varchar(20) NOT NULL,
  `pn` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactinfo`
--

INSERT INTO `contactinfo` (`id`, `uroll`, `pn`, `email`, `address`) VALUES
(17, 'UBS19CSC-023', '9556759083', 'abcaca@gmail.com', 'badabazar'),
(19, 'BBBKBMNM', '9556759083', 'abcaca@gmail.com', 'Badabazar, Haldi Mill, Sambalpur'),
(20, 'ASCASCASC', '9556759083', 'abcaca@gmail.com', 'Badabazar, Haldi Mill, Sambalpur'),
(27, 'UBS19CSC-008', '09556759083', 'meherankit717@gmail.com', 'Near Balkisan Ration Store, Badabazar SBP');

-- --------------------------------------------------------

--
-- Table structure for table `loginform`
--

CREATE TABLE `loginform` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `usertype` enum('admin','teacher','student','') NOT NULL,
  `pass` varchar(50) NOT NULL,
  `uid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loginform`
--

INSERT INTO `loginform` (`id`, `user`, `usertype`, `pass`, `uid`) VALUES
(11, 'ankit', 'teacher', 'ankit', 'GMUCSC-001'),
(13, 'sam', 'student', 'sam', 'UBS19CSC-008'),
(14, 'ankit717', 'admin', '@nkit', 'ADMIN'),
(17, 'ankit', 'student', 'ankit', 'UBS19CSC-023');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `notice` varchar(200) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `uid` varchar(10) NOT NULL,
  `sender` varchar(20) NOT NULL,
  `receiver` enum('both','teacher','student') NOT NULL,
  `datetime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `notice`, `subject`, `uid`, `sender`, `receiver`, `datetime`) VALUES
(5, 'qwjdkqdbjqwd', 'Hello', 'ADMIN', 'ankit717', 'both', 'June 25, 2022 12:52:46 PM'),
(6, 'ankit is a good boy ', 'yo', 'ADMIN', 'ankit717', 'teacher', 'June 25, 2022 08:40:57 PM'),
(7, 'kabcsbacbasc\r\nascljbascasc\r\nascbkasl.cnsc\r\nsacbhkaslcnasc\r\nasckbjjsabcaslcas', 'ajkbca', 'ADMIN', 'ankit717', 'student', 'June 25, 2022 08:58:55 PM'),
(8, 'Tomorrow is a holiday', 'Holiday', 'GMUCSC-001', 'ankit', 'student', 'June 25, 2022 09:04:15 PM'),
(9, 'ncmh cm nvjm  mn ', 'Hello', 'GMUCSC-001', 'ankit', 'student', 'June 25, 2022 09:15:50 PM'),
(10, 'm mvblblbm n n', 'hvkm bm ', 'ADMIN', 'ankit717', 'both', 'June 25, 2022 09:16:42 PM');

-- --------------------------------------------------------

--
-- Table structure for table `personalinfo`
--

CREATE TABLE `personalinfo` (
  `id` int(11) NOT NULL,
  `fn` varchar(20) NOT NULL,
  `mn` varchar(20) DEFAULT NULL,
  `ln` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `uroll` varchar(20) NOT NULL,
  `gender` enum('M','F','O') NOT NULL,
  `fathername` varchar(50) NOT NULL,
  `mothername` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `aadhar` varchar(12) NOT NULL,
  `cast` enum('HINDU','MUSLIM','CHRISTIAN','OTHERS') NOT NULL,
  `nationality` enum('INDIAN','OTHERS') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personalinfo`
--

INSERT INTO `personalinfo` (`id`, `fn`, `mn`, `ln`, `dob`, `uroll`, `gender`, `fathername`, `mothername`, `age`, `aadhar`, `cast`, `nationality`) VALUES
(14, 'Ankit', 'Kumar', 'Meher', '2022-06-09', 'UBS19CSC-023', 'M', 'Sanatanu Kumar Meher', 'Sanatanu Kumar Meher', 21, '744448050648', 'HINDU', 'INDIAN'),
(16, 'Ankit', 'Kumar', 'Meher', '2022-06-09', 'BBBKBMNM', 'M', 'Sanatanu Kumar Meher', 'Sanatanu Kumar Meher', 35, '744448050648', 'MUSLIM', 'INDIAN'),
(17, 'ascasc', 'Kumar', 'acasc', '2022-06-01', 'ASCASCASC', 'M', 'ascascasc', 'asc', 21, 'asc', 'HINDU', 'INDIAN'),
(24, 'Shrabani', '', 'Paadhi', '2022-06-01', 'UBS19CSC-008', 'F', 'santanu', 'kamalini', 21, '123456789101', 'HINDU', 'INDIAN');

-- --------------------------------------------------------

--
-- Table structure for table `teacherinfo`
--

CREATE TABLE `teacherinfo` (
  `id` int(11) NOT NULL,
  `fn` varchar(50) NOT NULL,
  `mn` varchar(50) DEFAULT NULL,
  `ln` varchar(50) NOT NULL,
  `gender` enum('M','F','O') NOT NULL,
  `dob` date NOT NULL,
  `phnum` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `aadhar` varchar(13) NOT NULL,
  `age` int(3) NOT NULL,
  `ql` varchar(200) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `exp` varchar(200) NOT NULL,
  `profile` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacherinfo`
--

INSERT INTO `teacherinfo` (`id`, `fn`, `mn`, `ln`, `gender`, `dob`, `phnum`, `email`, `aadhar`, `age`, `ql`, `uid`, `exp`, `profile`) VALUES
(4, 'Ankit', 'Kumar', 'Meher', 'M', '2022-06-21', '9556759083', 'abcaca@gmail.com', '744448050648', 26, 'ascajkcka', 'GMUCSC-002', 'amsckabscb', '12345'),
(5, 'Ankit', 'Kumar', 'Meher', 'M', '2022-06-03', '9556759083', 'abcaca@gmail.com', '744448050648', 21, 'mJBZKZ>N < ', 'GMUCSC-001', '8yrs', 'I am a good boy!!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academicinfo`
--
ALTER TABLE `academicinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactinfo`
--
ALTER TABLE `contactinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loginform`
--
ALTER TABLE `loginform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personalinfo`
--
ALTER TABLE `personalinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacherinfo`
--
ALTER TABLE `teacherinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academicinfo`
--
ALTER TABLE `academicinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contactinfo`
--
ALTER TABLE `contactinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `loginform`
--
ALTER TABLE `loginform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personalinfo`
--
ALTER TABLE `personalinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `teacherinfo`
--
ALTER TABLE `teacherinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
