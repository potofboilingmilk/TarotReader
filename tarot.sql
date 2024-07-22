-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2024 at 05:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tarot`
--

-- --------------------------------------------------------

--
-- Table structure for table `reading`
--

CREATE TABLE `reading` (
  `ReadingID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `SpreadID` int(11) NOT NULL,
  `ReadingFlagged` tinyint(1) NOT NULL,
  `AltInterpret` varchar(512) DEFAULT NULL,
  `TarotA` tinyint(4) NOT NULL,
  `TarotB` tinyint(4) DEFAULT NULL,
  `TarotC` tinyint(4) DEFAULT NULL,
  `TarotD` tinyint(4) DEFAULT NULL,
  `TarotE` tinyint(4) DEFAULT NULL,
  `TarotF` tinyint(4) DEFAULT NULL,
  `TarotG` tinyint(4) DEFAULT NULL,
  `TarotH` tinyint(4) DEFAULT NULL,
  `TarotI` tinyint(4) DEFAULT NULL,
  `TarotJ` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spread`
--

CREATE TABLE `spread` (
  `SpreadID` int(11) NOT NULL,
  `MeaningA` varchar(255) NOT NULL,
  `MeaningB` varchar(255) DEFAULT NULL,
  `MeaningC` varchar(255) DEFAULT NULL,
  `MeaningD` varchar(255) DEFAULT NULL,
  `MeaningE` varchar(255) DEFAULT NULL,
  `MeaningF` varchar(255) DEFAULT NULL,
  `MeaningG` varchar(255) DEFAULT NULL,
  `MeaningH` varchar(255) DEFAULT NULL,
  `MeaningI` varchar(255) DEFAULT NULL,
  `MeaningJ` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tarot`
--

CREATE TABLE `tarot` (
  `TarotID` tinyint(4) NOT NULL,
  `TarotImage` varchar(128) NOT NULL,
  `TarotMeaning` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `UserMail` varchar(32) NOT NULL,
  `UserPass` varchar(32) NOT NULL,
  `UserRestricted` tinyint(1) NOT NULL,
  `UserPower` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reading`
--
ALTER TABLE `reading`
  ADD PRIMARY KEY (`ReadingID`),
  ADD UNIQUE KEY `SpreadID` (`SpreadID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `TarotA` (`TarotA`,`TarotB`,`TarotC`,`TarotD`,`TarotE`,`TarotF`,`TarotG`,`TarotH`,`TarotI`,`TarotJ`),
  ADD KEY `TarotB` (`TarotB`),
  ADD KEY `TarotC` (`TarotC`),
  ADD KEY `TarotD` (`TarotD`),
  ADD KEY `TarotE` (`TarotE`),
  ADD KEY `TarotF` (`TarotF`),
  ADD KEY `TarotG` (`TarotG`),
  ADD KEY `TarotH` (`TarotH`),
  ADD KEY `TarotI` (`TarotI`),
  ADD KEY `TarotJ` (`TarotJ`);

--
-- Indexes for table `spread`
--
ALTER TABLE `spread`
  ADD PRIMARY KEY (`SpreadID`);

--
-- Indexes for table `tarot`
--
ALTER TABLE `tarot`
  ADD PRIMARY KEY (`TarotID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserID` (`UserID`),
  ADD UNIQUE KEY `UserMail` (`UserMail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reading`
--
ALTER TABLE `reading`
  MODIFY `ReadingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spread`
--
ALTER TABLE `spread`
  MODIFY `SpreadID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reading`
--
ALTER TABLE `reading`
  ADD CONSTRAINT `reading_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reading_ibfk_10` FOREIGN KEY (`TarotI`) REFERENCES `tarot` (`TarotID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reading_ibfk_11` FOREIGN KEY (`TarotJ`) REFERENCES `tarot` (`TarotID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reading_ibfk_12` FOREIGN KEY (`SpreadID`) REFERENCES `spread` (`SpreadID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reading_ibfk_2` FOREIGN KEY (`TarotA`) REFERENCES `tarot` (`TarotID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reading_ibfk_3` FOREIGN KEY (`TarotB`) REFERENCES `tarot` (`TarotID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reading_ibfk_4` FOREIGN KEY (`TarotC`) REFERENCES `tarot` (`TarotID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reading_ibfk_5` FOREIGN KEY (`TarotD`) REFERENCES `tarot` (`TarotID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reading_ibfk_6` FOREIGN KEY (`TarotE`) REFERENCES `tarot` (`TarotID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reading_ibfk_7` FOREIGN KEY (`TarotF`) REFERENCES `tarot` (`TarotID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reading_ibfk_8` FOREIGN KEY (`TarotG`) REFERENCES `tarot` (`TarotID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reading_ibfk_9` FOREIGN KEY (`TarotH`) REFERENCES `tarot` (`TarotID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
