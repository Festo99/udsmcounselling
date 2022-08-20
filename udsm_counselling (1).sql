-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2022 at 01:40 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `udsm_counselling`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `issuefaced` varchar(100) NOT NULL,
  `counsellor` varchar(100) NOT NULL,
  `dates` date NOT NULL,
  `datestime` time NOT NULL,
  `statuses` varchar(100) NOT NULL,
  `messages` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `issuefaced`, `counsellor`, `dates`, `datestime`, `statuses`, `messages`) VALUES
(1500, 'Pyscho-social', 'Henry Daniels', '2022-05-13', '12:47:00', '0', 'hello'),
(1501, 'Pyscho-social', 'Cristina Groves', '2022-06-22', '13:47:00', 'Active', 'hello doctor i have critical thinking about life and soooooooo'),
(1502, 'Health', 'Marie Wells', '2022-04-30', '13:50:00', 'Active', 'unyama tu'),
(1503, 'Education', 'Marie Wells', '2022-05-19', '15:49:00', '0', 'i have something in my education results'),
(1504, 'Financial', 'Cristina Groves', '2022-05-19', '14:59:00', 'Active', 'hello doctor, i need your help on loss '),
(1505, 'Education', 'Marie Wells', '2022-05-28', '23:43:00', 'Active', 'be there');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `counsellor_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `chattext` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `counsellor`
--

CREATE TABLE `counsellor` (
  `counsellor_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `passwd` varchar(15) NOT NULL,
  `dbirth` varchar(15) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `prof` varchar(100) NOT NULL,
  `addresses` varchar(100) NOT NULL,
  `phone` int(13) NOT NULL,
  `biog` varchar(100) NOT NULL,
  `usertype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counsellor`
--

INSERT INTO `counsellor` (`counsellor_id`, `fname`, `lname`, `username`, `email`, `passwd`, `dbirth`, `gender`, `prof`, `addresses`, `phone`, `biog`, `usertype`) VALUES
(3, 'JUMA', 'SHAIBU', 'jumakbs', 'jumakbs@gmail.com', '12345', '2022-05-28T22:3', 'on', 'hello', 'COICT', 716865555, 'hello', 'admin'),
(4, 'JAMES', 'SOAP', 'soapjames', 'jamessoap@gmail.com', '12345', '2022-05-29T03:4', 'Male', 'Pychological', 'UDBS', 716865555, 'doctor of brain', 'counsellor'),
(5, 'OSILA', 'JOE', 'osilaosila', 'osilajoe@gmail.com', '12345', '2022-05-29T01:2', 'Male', 'Economist', 'BUZA KANISANI', 756432189, 'working busy', 'counsellor'),
(6, 'JESSE', 'XIBONA', 'xibonajesse', 'jesse@gmail.com', '12345', '2022-05-18T14:1', 'Male', 'Pychological', 'GOMZ', 768904523, 'phd', 'counsellor');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `dayweek` varchar(100) NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL,
  `messages` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `dayweek`, `starttime`, `endtime`, `messages`) VALUES
(1, 'Wedsday', '22:58:00', '02:00:00', 'helor'),
(2, 'Saturday', '08:30:00', '12:30:00', 'Be ontime'),
(3, 'Friday', '09:30:00', '14:40:00', 'be there'),
(4, 'Wedsday', '16:18:00', '18:21:00', 'yu');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(13) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(10) NOT NULL,
  `nida` varchar(20) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `counsellor_id` (`counsellor_id`);

--
-- Indexes for table `counsellor`
--
ALTER TABLE `counsellor`
  ADD PRIMARY KEY (`counsellor_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `counsellor`
--
ALTER TABLE `counsellor`
  MODIFY `counsellor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(13) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `counsellor_id` FOREIGN KEY (`counsellor_id`) REFERENCES `counsellor` (`counsellor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_id` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
