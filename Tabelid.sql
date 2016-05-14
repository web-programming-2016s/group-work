-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 12, 2016 at 01:02 PM
-- Server version: 5.5.49
-- PHP Version: 5.4.45

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webpr2016_karoliinar`
--

-- --------------------------------------------------------

--
-- Table structure for table `homework`
--

CREATE TABLE IF NOT EXISTS `homework` (
  `id` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `Fin` varchar(255) NOT NULL,
  `Tail` varchar(255) NOT NULL,
  `Dolphin` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homework`
--

INSERT INTO `homework` (`id`, `color`, `Fin`, `Tail`, `Dolphin`, `created`, `Deleted`) VALUES
(1, 'dark grey', 'Flabby', 'not broken', '', '2016-03-03 10:32:52', '2016-05-05 08:05:47'),
(2, 'dark grey', 'Flabby', 'not broken', '', '2016-03-03 10:34:40', '2016-05-05 08:03:47'),
(3, 'dark grey', 'Straight', 'not broken', '', '2016-03-10 08:14:09', '2016-03-10 09:15:27'),
(4, 'dark grey', 'Straight', 'broken', '', '2016-03-10 09:06:39', '2016-03-10 09:15:24'),
(5, 'dark grey', 'Straight', 'not broken', '', '2016-03-10 09:16:59', '2016-05-05 07:01:08'),
(6, 'grey', 'Flabby', 'broken', '', '2016-03-10 09:17:14', '2016-03-10 09:23:44'),
(7, 'dark grey', 'Straight', 'not broken', '', '2016-03-10 09:23:24', '2016-05-05 07:01:15'),
(8, 'a', 'straight', 'ds', '', '2016-03-29 18:05:38', '2016-03-29 19:23:22'),
(9, 'sd', 'd', 'g', '', '2016-03-29 18:29:32', '2016-05-05 07:58:37'),
(10, 'd', 'straight', 'f', '', '2016-03-29 19:11:32', '2016-03-29 19:23:23'),
(11, 'Grey', 'Flabby', 'Broken', '', '2016-03-29 19:23:53', '2016-05-05 07:59:57'),
(12, 'Sd', 'A', 'Sd', '', '2016-03-31 06:41:35', '2016-03-31 06:41:42'),
(13, 'Grey', 'Flabby', 'Broken', '', '2016-04-07 06:02:07', '2016-04-07 06:02:17'),
(14, 'black', 'curved', 'just fine', '', '2016-04-17 14:59:07', '2016-05-05 08:03:58'),
(15, 'grey', 'flabby', '0', '', '2016-04-30 07:30:04', '2016-05-05 08:22:40'),
(16, 'dark grey', 'straight', '0', '', '2016-05-05 07:00:17', '2016-05-05 07:28:49'),
(17, 'grey', 'flabby', 'broken', '', '2016-05-05 07:28:35', NULL),
(18, 'dark grey', 'flabby', 'not broken', '', '2016-05-05 08:22:31', NULL),
(19, 'dark grey', 'flabby', 'broken', '', '2016-05-05 08:22:44', NULL),
(20, 'dark grey', 'flabby', 'broken', '', '2016-05-05 08:45:12', NULL),
(21, 'dark grey', 'straight', 'not broken', '', '2016-05-05 08:59:52', NULL),
(22, 'grey', 'flabby', 'broken', '', '2016-05-05 09:03:30', NULL),
(23, 'grey', 'flabby', 'broken', '', '2016-05-05 09:03:33', NULL),
(24, 'grey', 'flabby', 'broken', '', '2016-05-05 09:04:00', NULL),
(25, 'grey', 'flabby', 'broken', '', '2016-05-05 09:04:25', NULL),
(26, 'grey', 'flabby', 'broken', '', '2016-05-05 09:04:26', NULL),
(27, 'grey', 'flabby', 'broken', '', '2016-05-05 09:05:34', NULL),
(28, 'grey', 'flabby', 'not broken', '', '2016-05-05 09:05:37', NULL),
(29, 'grey', 'flabby', 'not broken', '', '2016-05-05 09:11:34', NULL),
(30, 'grey', 'flabby', 'not broken', '', '2016-05-05 09:11:48', NULL),
(31, 'grey', 'straight', 'not broken', '', '2016-05-05 09:12:04', NULL),
(32, 'grey', 'flabby', 'broken', '', '2016-05-05 09:12:06', NULL),
(33, 'grey', 'straight', 'not broken', '', '2016-05-05 09:12:15', NULL),
(34, 'grey', 'straight', 'broken', '', '2016-05-05 09:12:54', NULL),
(35, 'grey', 'flabby', 'broken', '', '2016-05-05 09:13:53', NULL),
(36, 'grey', 'straight', 'broken', '', '2016-05-05 09:14:01', NULL),
(37, 'grey', 'straight', 'broken', '', '2016-05-05 09:14:42', NULL),
(38, 'grey', 'straight', 'broken', '', '2016-05-05 09:15:15', NULL),
(39, 'grey', 'straight', 'not broken', '', '2016-05-05 09:15:21', NULL),
(40, 'dark grey', 'straight', 'broken', '', '2016-05-05 09:15:32', NULL),
(41, 'dark grey', 'straight', 'broken', '', '2016-05-05 09:31:54', NULL),
(42, 'dark grey', 'flabby', 'not broken', '', '2016-05-05 09:34:34', NULL),
(43, 'grey', 'straight', 'not broken', '', '2016-05-05 09:34:44', NULL),
(44, 'grey', 'straight', 'not broken', '', '2016-05-05 09:35:56', NULL),
(45, 'grey', 'straight', 'not broken', '', '2016-05-05 09:36:17', NULL),
(46, 'grey', 'straight', 'not broken', '', '2016-05-05 09:36:50', NULL),
(47, 'grey', 'straight', 'not broken', '', '2016-05-05 09:37:09', NULL),
(48, 'grey', 'straight', 'not broken', '', '2016-05-05 09:38:44', NULL),
(49, 'grey', 'straight', 'not broken', '', '2016-05-05 09:39:25', NULL),
(50, 'dark grey', 'straight', 'broken', '', '2016-05-05 09:40:10', NULL),
(51, 'dark grey', 'straight', 'broken', '', '2016-05-05 09:40:56', NULL),
(52, 'grey', 'flabby', 'broken', '', '2016-05-05 09:41:00', NULL),
(53, 'dark grey', 'straight', 'not broken', '', '2016-05-05 09:43:12', NULL),
(54, 'dark grey', 'straight', 'not broken', '', '2016-05-05 09:43:47', NULL),
(55, 'grey', 'flabby', 'broken', '', '2016-05-05 09:44:05', NULL),
(56, 'grey', 'flabby', 'broken', '', '2016-05-05 09:44:29', NULL),
(57, 'grey', 'flabby', 'broken', '', '2016-05-05 09:44:41', NULL),
(58, 'grey', 'flabby', 'broken', '', '2016-05-05 09:44:45', NULL),
(59, 'dark grey', 'straight', 'broken', '', '2016-05-05 09:44:50', NULL),
(60, 'grey', 'flabby', 'broken', '', '2016-05-05 09:44:54', NULL),
(61, 'grey', 'flabby', 'broken', '', '2016-05-05 09:45:12', NULL),
(62, 'grey', 'straight', 'not broken', '', '2016-05-05 09:46:22', NULL),
(63, 'dark grey', 'flabby', 'not broken', '', '2016-05-05 09:51:20', NULL),
(64, 'grey', 'straight', 'broken', '', '2016-05-11 08:58:46', NULL),
(65, 'grey', 'straight', 'not broken', '', '2016-05-11 08:59:01', NULL),
(66, 'grey', 'straight', 'not broken', '', '2016-05-11 09:01:37', NULL),
(67, 'grey', 'straight', 'not broken', '', '2016-05-11 10:01:59', NULL),
(68, 'grey', 'flabby', 'broken', '', '2016-05-11 10:04:08', NULL),
(69, 'grey', 'flabby', 'broken', '', '2016-05-11 10:04:26', NULL),
(70, 'grey', 'flabby', 'broken', '', '2016-05-11 10:05:03', NULL),
(71, 'grey', 'flabby', 'broken', '', '2016-05-11 10:05:29', NULL),
(72, 'grey', 'flabby', 'broken', '', '2016-05-11 10:05:55', NULL),
(73, 'grey', 'straight', 'broken', '', '2016-05-11 10:06:07', NULL),
(74, 'grey', 'straight', 'broken', '', '2016-05-11 10:10:01', NULL),
(75, 'grey', 'straight', 'broken', '', '2016-05-11 10:10:06', NULL),
(76, 'grey', 'flabby', 'broken', '', '2016-05-11 10:10:07', NULL),
(77, 'grey', 'flabby', 'broken', '', '2016-05-11 10:10:33', NULL),
(78, 'grey', 'flabby', 'broken', '', '2016-05-11 10:10:41', '2016-05-12 07:22:11'),
(79, 'dark grey', 'flabby', 'broken', '', '2016-05-11 10:10:47', '2016-05-12 07:18:34'),
(80, 'grey', 'flabby', 'broken', '', '2016-05-11 10:10:50', '2016-05-12 07:18:29'),
(81, 'dark grey', 'flabby', 'broken', '', '2016-05-11 10:35:37', '2016-05-12 07:16:46'),
(82, 'grey', 'flabby', 'broken', '', '2016-05-11 10:36:09', '2016-05-12 07:09:53'),
(83, 'grey', 'flabby', 'not broken', '', '2016-05-11 10:37:33', '2016-05-12 07:16:16'),
(84, 'grey', 'flabby', 'not broken', '', '2016-05-11 10:37:45', '2016-05-12 07:14:52'),
(85, 'dark grey', 'straight', 'not broken', '', '2016-05-11 10:37:52', '2016-05-12 07:14:38'),
(86, 'grey', 'straight', 'broken', '', '2016-05-12 07:09:32', '2016-05-12 07:09:45'),
(87, 'grey', 'straight', 'not broken', '', '2016-05-12 07:09:40', '2016-05-12 07:16:14'),
(88, 'dark grey', 'flabby', 'not broken', '', '2016-05-12 07:29:20', NULL),
(89, 'dark grey', 'straight', 'not broken', '', '2016-05-12 07:39:26', NULL),
(90, 'dark grey', 'flabby', 'broken', '', '2016-05-12 07:39:36', NULL),
(91, 'dark grey', 'straight', 'broken', '', '2016-05-12 07:39:41', NULL),
(92, 'dark grey', 'straight', 'broken', '', '2016-05-12 07:40:21', NULL),
(93, 'dark grey', 'straight', 'broken', '', '2016-05-12 07:40:52', NULL),
(94, 'dark grey', 'straight', 'broken', '', '2016-05-12 07:41:03', NULL),
(95, 'grey', 'flabby', 'broken', '', '2016-05-12 07:46:25', NULL),
(96, 'grey', 'flabby', 'broken', '', '2016-05-12 07:46:49', NULL),
(97, 'grey', 'flabby', 'broken', '', '2016-05-12 07:46:53', '2016-05-12 08:50:37'),
(98, 'grey', 'straight', 'broken', '', '2016-05-12 07:46:56', '2016-05-12 08:50:36'),
(99, 'grey', 'straight', 'broken', '', '2016-05-12 07:48:27', '2016-05-12 08:50:36'),
(100, 'grey', 'flabby', 'broken', '', '2016-05-12 07:48:30', '2016-05-12 08:50:36'),
(101, 'grey', 'flabby', 'broken', '', '2016-05-12 07:48:35', '2016-05-12 08:50:36'),
(102, 'grey', 'straight', 'broken', '', '2016-05-12 08:17:18', '2016-05-12 08:50:36'),
(103, 'dark grey', 'flabby', 'broken', '', '2016-05-12 08:17:25', '2016-05-12 08:50:35'),
(104, 'dark grey', 'straight', 'not broken', '', '2016-05-12 08:17:32', NULL),
(105, 'dark grey', 'flabby', 'not broken', '', '2016-05-12 08:17:36', NULL),
(106, 'dark grey', 'straight', 'broken', '', '2016-05-12 08:17:44', NULL),
(107, 'grey', 'flabby', 'broken', '', '2016-05-12 08:20:53', NULL),
(108, 'grey', 'flabby', 'broken', '', '2016-05-12 08:21:57', '2016-05-12 09:58:11'),
(109, 'grey', 'straight', 'not broken', '', '2016-05-12 08:22:02', NULL),
(110, 'grey', 'flabby', 'broken', '', '2016-05-12 08:23:59', '2016-05-12 08:50:24'),
(111, 'grey', 'flabby', 'broken', 'Not a dolphin from pool 7', '2016-05-12 08:33:45', '2016-05-12 08:50:10'),
(112, 'grey', 'straight', 'not broken', 'Jax', '2016-05-12 08:33:52', '2016-05-12 08:50:08'),
(113, 'grey', 'flabby', 'broken', 'Not a dolphin from pool 7', '2016-05-12 08:44:18', NULL),
(114, 'grey', 'flabby', 'not broken', 'Luna', '2016-05-12 08:44:21', '2016-05-12 08:50:27'),
(115, 'grey', 'flabby', 'not broken', 'Luna', '2016-05-12 08:45:38', '2016-05-12 08:50:26'),
(116, 'grey', 'straight', 'not broken', 'Jax', '2016-05-12 08:47:12', '2016-05-12 09:49:24'),
(117, 'dark grey', 'flabby', 'not broken', 'Not a dolphin from pool 7', '2016-05-12 08:50:45', NULL),
(118, 'dark grey', 'straight', 'broken', 'Summer', '2016-05-12 08:50:53', NULL),
(119, 'grey', 'flabby', 'broken', 'Not a dolphin from pool 7', '2016-05-12 08:54:02', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `homework`
--
ALTER TABLE `homework`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=120;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



--*******************





-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 14, 2016 at 05:12 PM
-- Server version: 5.5.49
-- PHP Version: 5.4.45

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webpr2016_karoliinar`
--

-- --------------------------------------------------------

--
-- Table structure for table `delfiini_tabel`
--

CREATE TABLE IF NOT EXISTS `delfiini_tabel` (
  `ID` int(11) NOT NULL,
  `Dolphin` varchar(255) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `User` int(11) NOT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delfiini_tabel`
--

INSERT INTO `delfiini_tabel` (`ID`, `Dolphin`, `Date`, `User`, `deleted`) VALUES
(1, '0', '2016-04-28 09:24:04', 0, '2016-05-05 08:07:03'),
(2, '0', '2016-04-28 09:24:20', 0, '2016-05-05 08:07:07'),
(3, '0', '2016-04-28 09:25:03', 0, '2016-05-05 08:18:54'),
(4, '0', '2016-04-28 09:25:09', 0, '2016-05-05 08:18:51'),
(5, '0', '2016-04-28 09:27:40', 0, '2016-05-05 08:18:52'),
(6, '0', '2016-04-28 09:30:04', 0, '2016-05-05 08:18:53'),
(7, '0', '2016-04-28 09:31:32', 0, '2016-05-05 08:18:50'),
(8, '0', '2016-04-28 09:33:23', 0, '2016-05-05 08:18:53'),
(9, '0', '2016-04-28 09:33:27', 0, '2016-05-05 08:18:53'),
(10, '0', '2016-04-28 09:33:44', 0, '2016-05-05 08:18:53'),
(11, 'jax', '2016-04-28 09:34:51', 0, '2016-05-05 08:18:53'),
(12, 'jax', '2016-05-05 07:55:28', 24, '2016-05-11 08:59:29'),
(13, 'jax', '2016-05-05 07:56:25', 24, '2016-05-05 09:53:28'),
(14, 'summer', '2016-05-05 08:03:54', 33, '2016-05-05 09:53:31'),
(15, 'luna', '2016-05-05 08:04:14', 33, '2016-05-11 08:59:30'),
(16, 'luna', '2016-05-05 08:22:54', 34, '2016-05-11 08:59:32'),
(17, 'Luna', '2016-05-05 08:29:55', 34, '2016-05-11 10:22:08'),
(18, 'Luna', '2016-05-05 08:30:46', 34, '2016-05-11 10:26:03'),
(19, 'Jax', '2016-05-05 08:30:50', 34, '2016-05-11 10:26:15'),
(20, 'Jax', '2016-05-05 09:52:01', 34, '2016-05-11 10:26:15'),
(21, 'Jax', '2016-05-11 08:59:26', 34, '2016-05-11 10:26:16'),
(22, 'Jax', '2016-05-11 09:02:53', 34, '2016-05-11 10:26:16'),
(23, 'Luna', '2016-05-11 10:02:14', 34, '2016-05-11 10:26:17'),
(24, 'Jax', '2016-05-11 10:11:42', 34, '2016-05-11 10:26:17'),
(25, 'Jax', '2016-05-11 10:13:52', 34, '2016-05-11 10:26:17'),
(26, 'Jax', '2016-05-11 10:14:30', 34, '2016-05-11 10:26:18'),
(27, 'Jax', '2016-05-11 10:14:49', 34, '2016-05-11 10:19:09'),
(28, 'Jax', '2016-05-11 10:15:20', 34, '2016-05-11 10:26:18'),
(29, 'Jax', '2016-05-11 10:15:31', 34, '2016-05-11 10:25:30'),
(30, 'Jax', '2016-05-11 10:17:32', 34, '2016-05-11 10:26:18'),
(31, 'Jax', '2016-05-11 10:17:48', 34, '2016-05-11 10:26:13'),
(32, 'Jax', '2016-05-11 10:17:52', 34, '2016-05-11 10:26:18'),
(33, 'Luna', '2016-05-11 10:18:17', 34, '2016-05-11 10:34:45'),
(34, 'Luna', '2016-05-11 10:19:01', 34, '2016-05-12 07:18:16'),
(35, 'Luna', '2016-05-11 10:19:06', 34, '2016-05-12 07:18:38'),
(36, 'Jax', '2016-05-11 10:25:23', 34, NULL),
(37, 'Luna', '2016-05-11 10:25:27', 34, NULL),
(38, 'Luna', '2016-05-11 10:26:08', 34, NULL),
(39, 'Luna', '2016-05-11 10:35:21', 34, NULL),
(40, 'Jax', '2016-05-11 10:36:28', 34, '2016-05-12 07:29:41'),
(41, 'Jax', '2016-05-11 10:37:24', 34, '2016-05-12 08:18:07'),
(42, 'Luna', '2016-05-12 07:09:21', 34, NULL),
(43, 'Luna', '2016-05-12 07:29:36', 34, NULL),
(44, 'Luna', '2016-05-12 07:32:32', 34, NULL),
(45, 'Jax', '2016-05-12 07:39:00', 37, NULL),
(46, 'Luna', '2016-05-12 08:18:05', 37, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delfiini_tabel`
--
ALTER TABLE `delfiini_tabel`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `delfiini_tabel`
--
ALTER TABLE `delfiini_tabel`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

