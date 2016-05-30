-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 12, 2016 at 12:25 PM
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
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(128) NOT NULL,
  `player` enum('0','1','2','') NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Name`, `username`, `password`, `player`) VALUES
(15, 'mr.bean', 'mr.beannn', 'd6f644b19812e97b5d871658d6d3400ecd4787faeb9b8990c1e7608288664be77257104a58d033bcf1a0e0945ff06468ebe53e2dff36e248424c7273117dac09', '2'),
(16, 'marika', 'marika', 'c5524368dbd991382604ef68cd07ab19e85c54c359174c73894536ffbd3def32ed8b134199798dea0a4d07d29f16eaab85211cbf7fdfc0379efd1a2d65881125', '1'),
(17, 'b', 'bb', '5edc1c6a4390075a3ca27f4d4161c46b374b1c3b2d63f846db6fff0c513203c3ac3b14a24a6f09d8bf21407a4842113b5d9aa359d266299c3d6cf9e92db66dbe', '1'),
(18, '', 'mike', 'a91d24d7eab7683bc73b857d42dfc48a9577c600ccb5e7d7adabab54eebc112232f3de2539208f22a560ad320d1f2cda5a5f1a127baf6bf871b0e282c2b85220', '1'),
(19, 'ben', 'ben', 'ben', '2'),
(20, '', 'new', 'e4971aab8f53dfcbbdbe993d9e87a14ece370bad543818827b65d857af6b3ff3496dc4f9befa8c6ca3cc412969af583533b2b3bc231e271e6eb7515942d4af57', '2'),
(22, '', 'lil', 'c59bf9f1f955a6dc958f62c49f691b2fe4e07f52efe953bfbaa6160461454960c90fed2f4065ed183664005fe378be76197aa531003da857ba5b34d9d986dc06', '2'),
(25, '', 'dima', '673ab7bacd36278b1ad3388d034ac37a1f031604daf9560b630244647745d6e29f225e854a75789da393971ef226ef3d4c6201c45440d333b77398f7f22c5e6c', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
