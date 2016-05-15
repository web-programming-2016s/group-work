-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Loomise aeg: Mai 15, 2016 kell 09:17 PM
-- Serveri versioon: 5.5.49
-- PHP versioon: 5.4.45

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Andmebaas: `webpr2016_askaks`
--

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start` varchar(255) NOT NULL,
  `ownerID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Andmete tõmmistamine tabelile `event`
--

INSERT INTO `event` (`id`, `heading`, `description`, `start`, `ownerID`) VALUES
(3, 'Test', 'Test number 3', '10:00', 1),
(4, 'Test', 'Testimine number 4', '11:00', 1),
(5, 'Test 2', 'Testimine number 5', '12:00', 2),
(6, 'Last test', 'Final test', '13:00', 2);

--
-- Indeksid tõmmistatud tabelitele
--

--
-- Indeksid tabelile `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT tõmmistatud tabelitele
--

--
-- AUTO_INCREMENT tabelile `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
