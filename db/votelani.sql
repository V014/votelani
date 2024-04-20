-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2024 at 11:38 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
  `Firstname` varchar(15) NOT NULL,
  `Lastname` varchar(15) NOT NULL,
  `Nationality` varchar(15) NOT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Role` enum('President','Chancellor','MP') NOT NULL,
  `Party` varchar(30) DEFAULT NULL,
  `Village` varchar(30) DEFAULT NULL,
  `TraditionalAuthority` varchar(15) DEFAULT NULL,
  `Active` enum('Yes','No') NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`CandidateID`, `Firstname`, `Lastname`, `Nationality`, `DateOfBirth`, `Role`, `Party`, `Village`, `TraditionalAuthority`, `Active`, `Date`) VALUES
(1, 'Lazarus', 'Chakwera', 'Malawian', '1955-04-05', 'President', 'Malawi Congress Party', '', '', 'Yes', '2024-04-19 06:55:32'),
(2, 'Peter', 'Mutharika', 'Malawian', '1940-07-18', 'President', 'Democratic Progressive Party', 'Thyolo', '', 'Yes', '2024-04-19 06:55:32'),
(3, 'Atupele', 'Muluzi', 'Malawian', '1978-08-06', 'President', 'United Democratic Front', '', '', 'Yes', '2024-04-19 06:58:11'),
(4, 'Leonard', 'Chimbanga', 'Malawian', NULL, 'Chancellor', NULL, NULL, NULL, 'Yes', '2024-04-19 08:21:27'),
(5, 'Leonard', 'Chimbanga', 'Malawian', NULL, 'Chancellor', NULL, NULL, NULL, 'Yes', '2024-04-19 08:21:27'),
(6, 'Noel', 'Chalamanda', 'Malawian', NULL, 'Chancellor', NULL, NULL, NULL, 'Yes', '2024-04-19 08:21:27'),
(7, 'John', 'Bande', 'Malawian', NULL, 'MP', NULL, NULL, NULL, 'Yes', '2024-04-19 08:21:27'),
(8, 'Nocholas', 'Dausi', 'Malawian', NULL, 'MP', NULL, NULL, NULL, 'Yes', '2024-04-19 08:21:27'),
(9, 'Patricia', 'Kaliati', 'Malawian', NULL, 'MP', NULL, NULL, NULL, 'Yes', '2024-04-19 08:21:27');

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
(6, 'MW00000006', '2024-04-19 12:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `EventID` int(3) NOT NULL,
  `CitizenID` int(3) NOT NULL,
  `Location` varchar(30) NOT NULL,
  `PresidentID` int(3) NOT NULL,
  `ChancellorID` int(3) NOT NULL,
  `MPID` int(3) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  MODIFY `CitizenID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `EventID` int(3) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
