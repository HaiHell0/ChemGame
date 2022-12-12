-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2022 at 01:00 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chemgame`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ADMIN_ID` int(10) UNSIGNED NOT NULL,
  `USERNAME` varchar(48) DEFAULT NULL,
  `PASSWORD` varchar(48) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ADMIN_ID`, `USERNAME`, `PASSWORD`) VALUES
(2, 'u', 'p'),
(3, '', ''),
(4, 'sdfg', 'sdfg'),
(5, 'aaa', 'aaa'),
(6, 'aaaa', 'aaaa');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `GAME_ID` int(10) UNSIGNED NOT NULL,
  `USER_ID` int(10) UNSIGNED NOT NULL,
  `GAME_TYPE_ID` int(10) UNSIGNED NOT NULL,
  `CONFIG` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `GAME_NAME` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`GAME_ID`, `USER_ID`, `GAME_TYPE_ID`, `CONFIG`, `GAME_NAME`, `category`) VALUES
(28, 1, 3, 'dirPhp', 'dirCss', 'dirJs'),
(55, 1, 3, 'placeholder', 'Test game', 'science');

-- --------------------------------------------------------

--
-- Table structure for table `gametype`
--

CREATE TABLE `gametype` (
  `GAME_TYPE_ID` int(10) UNSIGNED NOT NULL,
  `ADMIN_ID` int(10) UNSIGNED NOT NULL,
  `GAME_NAME` varchar(48) DEFAULT NULL,
  `PHP` varchar(225) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `CSS` varchar(225) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `JS` varchar(225) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gametype`
--

INSERT INTO `gametype` (`GAME_TYPE_ID`, `ADMIN_ID`, `GAME_NAME`, `PHP`, `CSS`, `JS`) VALUES
(3, 2, 'Test game ', 'dirPhp', 'dirCss', 'dirJs'),
(8, 5, 'aaa test game type', 'C:\\xampp\\htdocs\\ChemGame/GameType/aaa test game type/aaa test game type.php', 'C:\\xampp\\htdocs\\ChemGame/GameType/aaa test game type/aaa test game type.css', 'C:\\xampp\\htdocs\\ChemGame/GameType/aaa test game type/aaa test game type.js');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USER_ID` int(10) UNSIGNED NOT NULL,
  `USERNAME` varchar(48) DEFAULT NULL,
  `PASSWORD` varchar(48) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `USERNAME`, `PASSWORD`) VALUES
(1, 'Test', 'Test'),
(2, 'aaa', 'aaa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ADMIN_ID`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`GAME_ID`),
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `GAME_TYPE_ID` (`GAME_TYPE_ID`);

--
-- Indexes for table `gametype`
--
ALTER TABLE `gametype`
  ADD PRIMARY KEY (`GAME_TYPE_ID`),
  ADD KEY `ADMIN_ID` (`ADMIN_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ADMIN_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `GAME_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `gametype`
--
ALTER TABLE `gametype`
  MODIFY `GAME_TYPE_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USER_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_2` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `game_ibfk_3` FOREIGN KEY (`GAME_TYPE_ID`) REFERENCES `gametype` (`GAME_TYPE_ID`) ON DELETE CASCADE;

--
-- Constraints for table `gametype`
--
ALTER TABLE `gametype`
  ADD CONSTRAINT `gametype_ibfk_1` FOREIGN KEY (`ADMIN_ID`) REFERENCES `admin` (`ADMIN_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
