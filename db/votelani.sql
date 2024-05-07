-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2024 at 06:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `votelani`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `CandidateID` int(3) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Role` enum('President','Chancellor','MP') NOT NULL,
  `Party` varchar(50) DEFAULT NULL,
  `Biography` varchar(280) DEFAULT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`CandidateID`, `Name`, `Role`, `Party`, `Biography`, `Date`) VALUES
(1, 'Lazarus Chakwera', 'President', 'Malawi Congress Party', '', '2024-04-23 07:35:06'),
(2, 'Peter Mutharika', 'President', 'Democratic Progressive Party', 'Thyolo', '2024-04-23 07:33:47'),
(3, 'Atupele Muluzi', 'President', 'United Democratic Front', '', '2024-04-23 07:33:47'),
(4, 'Leonard Chimbanga', 'Chancellor', NULL, NULL, '2024-04-23 07:35:06'),
(5, 'Noel Chalamanda', 'Chancellor', NULL, NULL, '2024-04-23 07:33:47'),
(6, 'John Bande', 'MP', NULL, NULL, '2024-04-23 07:33:47'),
(7, 'Nocholas Dausi', 'MP', NULL, NULL, '2024-04-23 07:33:47'),
(9, 'Patricia Kaliati', 'MP', NULL, NULL, '2024-04-23 07:35:06');

-- --------------------------------------------------------

--
-- Table structure for table `citizen`
--

CREATE TABLE `citizen` (
  `CitizenID` int(3) NOT NULL,
  `VoterID` varchar(10) NOT NULL,
  `Registered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `citizen`
--

INSERT INTO `citizen` (`CitizenID`, `VoterID`, `Registered`) VALUES
(1, 'MW00000001', '2024-04-19 12:40:11'),
(2, 'MW00000002', '2024-04-19 12:40:11'),
(3, 'MW00000003', '2024-04-19 12:40:28'),
(4, 'MW00000004', '2024-04-19 12:40:28'),
(5, 'MW00000005', '2024-04-19 12:40:44'),
(6, 'MW00000006', '2024-04-19 12:40:44'),
(7, 'MW00000007', '2024-04-23 07:37:12'),
(8, 'MW00000008', '2024-04-23 07:37:29'),
(9, 'MW00000009', '2024-04-23 07:37:53'),
(10, 'MW00000010', '2024-04-23 07:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `EventID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `Position` enum('President','Chancellor','MP') NOT NULL,
  `Status` enum('Upcoming','Ongoing','Completed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`EventID`, `Name`, `date`, `Position`, `Status`) VALUES
(1, 'Presidential Elections 2024', '2024-04-23', 'President', 'Ongoing');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `VoteID` int(8) NOT NULL,
  `CitizenID` int(10) NOT NULL,
  `EventID` int(3) NOT NULL,
  `CandidateID` int(2) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`VoteID`, `CitizenID`, `EventID`, `CandidateID`, `Date`) VALUES
(1, 1, 1, 1, '2024-05-04 07:00:00'),
(2, 2, 1, 1, '2024-05-04 07:00:00'),
(3, 3, 1, 2, '2024-05-04 07:00:00'),
(4, 4, 1, 2, '2024-05-04 07:00:00'),
(5, 5, 1, 3, '0000-00-00 00:00:00'),
(6, 6, 1, 3, '2024-05-04 07:00:00'),
(7, 7, 1, 2, '2024-05-04 07:00:00'),
(8, 8, 1, 2, '2024-05-04 07:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`CandidateID`);

--
-- Indexes for table `citizen`
--
ALTER TABLE `citizen`
  ADD PRIMARY KEY (`CitizenID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`EventID`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`VoteID`),
  ADD KEY `CitizenID` (`CitizenID`),
  ADD KEY `CandidateID` (`CandidateID`),
  ADD KEY `EventID` (`EventID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `CandidateID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `citizen`
--
ALTER TABLE `citizen`
  MODIFY `CitizenID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `VoteID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`CitizenID`) REFERENCES `citizen` (`CitizenID`),
  ADD CONSTRAINT `votes_ibfk_2` FOREIGN KEY (`EventID`) REFERENCES `event` (`EventID`),
  ADD CONSTRAINT `votes_ibfk_3` FOREIGN KEY (`CandidateID`) REFERENCES `candidate` (`CandidateID`),
  ADD CONSTRAINT `votes_ibfk_4` FOREIGN KEY (`CandidateID`) REFERENCES `candidate` (`CandidateID`),
  ADD CONSTRAINT `votes_ibfk_5` FOREIGN KEY (`EventID`) REFERENCES `event` (`EventID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
