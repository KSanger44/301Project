-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 12:38 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surg`
--

-- --------------------------------------------------------

--
-- Table structure for table `alert`
--

CREATE TABLE `alert` (
  `aID` int(11) NOT NULL,
  `type` varchar(45) DEFAULT NULL,
  `procID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `dID` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `areacode` int(3) NOT NULL,
  `prefix` int(3) NOT NULL,
  `phone` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`dID`, `name`, `email`, `areacode`, `prefix`, `phone`) VALUES
(1, 'Dudley Doolittle, MD', 'dlittle@hospital.com', 608, 663, 2826),
(2, 'Stephen Strange, PhD', 'strangedoc@hotmail.com', 123, 777, 3333);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `pID` int(11) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `height` int(2) DEFAULT NULL,
  `weight` int(3) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `pw` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pID`, `fname`, `lname`, `height`, `weight`, `status`, `email`, `pw`) VALUES
(1, 'Kyle', 'Sanger', 72, 165, 'p', 'ksanger@edgewood.edu', '12345'),
(2, 'Eddie', 'Eagle', 84, 280, 's', 'eeagle@edgewood.edu', 'pw'),
(3, 'Hamilton', 'Urglar', 60, 200, 'c', 'hamburglar@edgewood.edu', 'burger');

-- --------------------------------------------------------

--
-- Table structure for table `procs`
--

CREATE TABLE `procs` (
  `procID` int(11) NOT NULL,
  `pID` int(11) NOT NULL,
  `dID` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `desc` longtext DEFAULT NULL,
  `checkin` tinyint(1) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `procs`
--

INSERT INTO `procs` (`procID`, `pID`, `dID`, `name`, `desc`, `checkin`, `date`, `time`) VALUES
(1, 1, 1, 'Appendectomy', 'Before your procedure, you’ll take antibiotics to fight infection. You’ll get general anesthesia, meaning you’ll be asleep for the procedure. The doctor removes your appendix through a 4-inch-long cut or with a device called a laparoscope. You can move roughly 12 hours after surgery. You should be able to go back to your normal routine in 2 to 3 weeks.', 0, '2022-11-26', '34:34:02.000000'),
(2, 2, 1, 'Cataract surgery', 'You\'ll be prescribed eyedrops to take and asked not to eat solid food 6 hours before your surgery. Your eye will be numbed. You will be awake during the surgery and may see light but you will not feel or see what the surgeon is doing. The lens with the cataract is broken up, removed, and replaced. Incisions will heal on their own. A shield is placed over your eye to protect it. You\'ll wait in a recovery area for 15-30 minutes before you\'re able to go home.', 0, '2022-11-28', '17:37:16.000000'),
(3, 3, 2, 'Coronary Bypass', 'Coronary bypass surgery redirects blood around a section of a blocked or partially blocked artery in your heart. The procedure involves taking a healthy blood vessel from your leg, arm or chest and connecting it below and above the blocked arteries in your heart. You should be able to sit in a chair after 1 day, walk after 3 days, and walk up and down stairs after 5 or 6 days. Most people make a full recovery within 12 weeks of the operation', 1, '2022-12-02', '20:40:11.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alert`
--
ALTER TABLE `alert`
  ADD PRIMARY KEY (`aID`),
  ADD KEY `procID` (`procID`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`dID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pID`);

--
-- Indexes for table `procs`
--
ALTER TABLE `procs`
  ADD PRIMARY KEY (`procID`),
  ADD KEY `pID` (`pID`,`dID`),
  ADD KEY `DOCTOR_FK` (`dID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alert`
--
ALTER TABLE `alert`
  MODIFY `aID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `dID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `procs`
--
ALTER TABLE `procs`
  MODIFY `procID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alert`
--
ALTER TABLE `alert`
  ADD CONSTRAINT `ALERT_FK` FOREIGN KEY (`procID`) REFERENCES `procs` (`procID`);

--
-- Constraints for table `procs`
--
ALTER TABLE `procs`
  ADD CONSTRAINT `DOCTOR_FK` FOREIGN KEY (`dID`) REFERENCES `doctor` (`dID`),
  ADD CONSTRAINT `PATIENT_FK` FOREIGN KEY (`pID`) REFERENCES `patient` (`pID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
