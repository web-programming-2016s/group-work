-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 12, 2016 at 12:21 PM
-- Server version: 5.5.49
-- PHP Version: 5.4.45

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webpr2016_marvin`
--

-- --------------------------------------------------------

--
-- Table structure for table `Correct_clues`
--

CREATE TABLE IF NOT EXISTS `Correct_clues` (
  `id` int(11) NOT NULL,
  `code` int(10) NOT NULL,
  `player` int(3) NOT NULL,
  `clue` varchar(255) NOT NULL,
  `fake` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Correct_clues`
--

INSERT INTO `Correct_clues` (`id`, `code`, `player`, `clue`, `fake`) VALUES
(11, 101010, 1, 'clue 10', 'fake clue 10'),
(12, 110110, 2, 'clue 11', 'fake clue 11'),
(13, 121212, 2, 'clue 12', 'fake clue 12'),
(14, 131313, 2, 'clue 13', 'fake clue 13'),
(15, 141414, 2, 'clue 14', 'fake clue 14'),
(16, 151515, 2, 'clue 15', 'fake clue 15'),
(17, 161616, 2, 'clue 16', 'fake clue 16'),
(18, 171717, 2, 'clue 17', 'fake clue 17'),
(19, 181818, 2, 'clue 18', 'fake clue 18'),
(20, 191919, 2, 'clue 19', 'fake clue 19'),
(21, 202020, 2, 'clue 20', 'fake clue 20'),
(22, 111111, 1, 'clue 1', 'fake clue 1'),
(23, 222222, 1, 'clue 2', 'fake clue 2'),
(24, 333333, 1, 'clue 3', 'fake clue 3'),
(25, 444444, 1, 'clue 4', 'fake clue 4'),
(26, 555555, 1, 'clue 5', 'fake clue 5'),
(27, 666666, 1, 'clue 6', 'fake clue 6'),
(28, 777777, 1, 'clue 7', 'fake clue 7'),
(29, 888888, 1, 'clue 8', 'fake clue 8'),
(30, 999999, 1, 'clue 9', 'fake clue 9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Correct_clues`
--
ALTER TABLE `Correct_clues`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Correct_clues`
--
ALTER TABLE `Correct_clues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
