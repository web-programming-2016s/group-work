-- phpMyAdmin SQL Dump
-- version 4.4.15.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 04, 2016 at 08:43 AM
-- Server version: 5.5.47
-- PHP Version: 5.4.45

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webpr2016_islam`
--

-- --------------------------------------------------------

--
-- Table structure for table `debattle_interest`
--

CREATE TABLE IF NOT EXISTS `debattle_interest` (
  `id` int(11) NOT NULL,
  `interest` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `debattle_interest`
--

INSERT INTO `debattle_interest` (`id`, `interest`) VALUES
(4, 'Cars'),
(1, 'Football'),
(7, 'Hiking'),
(13, 'Human RIghts'),
(3, 'Kayaking'),
(18, 'Music'),
(11, 'Politics'),
(9, 'Swimming'),
(2, 'Trainspotting'),
(8, 'Travelling'),
(10, 'Walking');

-- --------------------------------------------------------

--
-- Table structure for table `debattle_request`
--

CREATE TABLE IF NOT EXISTS `debattle_request` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `challengee` varchar(255) NOT NULL,
  `motion` varchar(255) NOT NULL,
  `position` varchar(50) NOT NULL,
  `visibility` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `favcolor` varchar(50) NOT NULL,
  `characters` int(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reply` varchar(255) NOT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `debattle_request`
--

INSERT INTO `debattle_request` (`id`, `username`, `challengee`, `motion`, `position`, `visibility`, `start_date`, `end_date`, `favcolor`, `characters`, `created`, `reply`, `deleted`) VALUES
(26, '', 'dasdca', 'asdfad', 'Against', 'Closed', '2016-03-04', '2016-03-18', '', 10, '2016-03-23 11:48:22', '', '2016-03-23 12:08:02'),
(27, '', 'sdasd', 'fzxzx', 'Pro', 'Closed', '2016-03-12', '2016-03-10', '', 127, '2016-03-23 11:48:46', '', '2016-03-23 12:23:21'),
(28, '', 'bvdfgdf', 'zxcvxcv', 'Against', 'Open', '2016-03-05', '2016-03-01', '', 55, '2016-03-23 11:49:29', '', '2016-03-23 12:30:30'),
(29, '', 'asdasd', 'asdas', 'Against', 'Closed', '2016-03-04', '2016-03-04', '', 23, '2016-03-23 12:24:34', '', '2016-03-23 12:34:26'),
(30, '', 'asdasd', 'asdasd', 'Against', 'Open', '2016-03-11', '2016-03-03', '#400040', 23, '2016-03-23 12:30:48', '', '2016-03-31 16:50:07'),
(31, '', 'cvzxcv', 'zxcvc', 'Against', 'Open', '2016-03-12', '2016-03-10', '#000080', 34, '2016-03-23 12:35:20', '', '2016-03-31 16:15:52'),
(32, '', 'xcvzxc', 'cvxbxcv', 'Against', 'Open', '2016-03-05', '2016-03-23', '#004080', 127, '2016-03-23 12:35:57', '', '2016-03-31 16:15:52'),
(33, 'islam', 'xcvzxc', 'cvxbxcv', 'Against', 'Open', '2016-03-05', '2016-03-23', '#004080', 127, '2016-03-23 12:39:18', '', '2016-03-31 16:15:53'),
(34, 'islam', 'xvxcxcv', 'zxfgzf', 'Pro', 'Closed', '2016-03-02', '2016-03-31', '#800080', 33, '2016-03-30 18:15:31', '', '2016-03-31 16:15:53'),
(35, '', 'sdfsdf', 'adfadsfadsf', 'Against', 'Closed', '2016-03-12', '2016-03-23', '#ff8000', 23, '2016-03-31 07:06:54', '', '2016-03-31 16:15:54'),
(36, '', 'jfhj', 'fhgjfhj', 'Pro', 'Closed', '2016-03-10', '2016-03-17', '#ff00ff', 55, '2016-03-31 07:07:14', '', '2016-03-31 16:15:54'),
(46, '', 'dsfa', 'asdfa', 'Pro', 'Open', '2016-03-08', '2016-03-25', '#000080', 22, '2016-03-31 07:36:03', '', '2016-03-31 16:50:07'),
(47, '', 'asdSA', 'asd', 'Pro', 'Open', '2016-03-02', '2016-03-11', '#000080', 21, '2016-03-31 07:36:15', '', '2016-03-31 16:31:25'),
(48, '', 'dfadf', 'adsfadsf', 'Pro', 'Open', '2016-03-02', '2016-03-11', '#808080', 127, '2016-03-31 07:38:03', '', '2016-03-31 16:31:27'),
(49, '', 'Islam', 'MM', 'Pro', 'Open', '2016-03-08', '2016-03-25', '#408080', 112, '2016-03-31 07:56:56', '', '2016-03-31 16:15:51'),
(50, '', 'dsfgsfdg', 'sfdgsfdg', 'Against', 'Closed', '2016-03-17', '2016-03-18', '#0000ff', 33, '2016-03-31 09:24:12', '', '2016-03-31 16:31:28'),
(51, '', '', 'Here', 'Against', 'Open', '2016-03-31', '0000-00-00', '#8080ff', 100, '2016-03-31 10:04:57', '', '2016-03-31 16:31:16'),
(52, '', 'TESTTEST', 'SSSS', 'Pro', 'Open', '2016-03-17', '0000-00-00', '#ff8040', 22, '2016-03-31 10:08:47', '', '2016-03-31 16:50:01'),
(53, '', 'asdASDsd', 'ASDASDFASDF', 'Against', 'Open', '2016-03-09', '2016-03-10', '#000080', 22, '2016-03-31 10:19:27', '', '2016-03-31 16:31:24'),
(54, '', 'Hip', 'asdasd', 'Against', 'Closed', '2016-03-14', '2016-07-09', '#804000', 11, '2016-03-31 10:19:54', '', '2016-03-31 17:11:36'),
(55, 'masha', 'Sham', 'Bam', 'Pro', 'Closed', '2016-03-10', '2016-03-30', '#ff8000', 50, '2016-03-31 10:21:22', '', NULL),
(56, 'ang', 'Dobie', 'Nop', 'Against', 'Open', '2016-03-16', '2016-08-27', '#008040', 70, '2016-03-31 10:27:18', '', NULL),
(57, 'masha', 'Emna', 'Mizmouni', 'Against', 'Closed', '2016-03-09', '2016-03-26', '#ff8000', 245, '2016-03-31 16:20:50', '', NULL),
(58, '', 'rr', 'eee', 'Pro', 'Open', '2016-03-24', '0000-00-00', '#000000', 32, '2016-03-31 16:24:25', '', '2016-03-31 16:50:03'),
(59, 'masha', 'Rasha', 'THB', 'Pro', 'Open', '2016-03-10', '2016-03-10', '#400080', 30, '2016-03-31 16:31:54', '', NULL),
(60, 'ang', 'Soaad', 'Celebre', 'Against', 'Open', '2016-08-26', '2016-07-30', '#00ff00', 300, '2016-03-31 16:50:51', '', NULL),
(61, 'islam', 'Ang', 'Lamb chops rock', 'Against', 'Closed', '2001-01-20', '2002-05-20', '#000040', 63, '2016-03-31 16:51:56', 'No, they are not!', NULL),
(62, 'islam', 'Jack', 'Rent', 'Against', 'Closed', '2016-03-04', '2016-03-19', '#ff8000', 255, '2016-03-31 16:57:09', 'Pay now, you prick!', NULL),
(63, 'ang', 'Moe', 'Zaad', 'Pro', 'Open', '2016-03-17', '2016-03-26', '#800000', 289, '2016-03-31 17:12:24', '', NULL),
(64, '', 'romil@romil.ee', 'motion', 'Pro', 'Open', '2016-04-16', '2016-05-16', '#ffffff', 5, '2016-04-07 05:07:57', '', '2016-04-07 05:08:05'),
(65, 'islam', 'Masha', 'Purple hair rocks', 'Pro', 'Closed', '2016-04-28', '2016-04-30', '#00ff00', 300, '2016-04-28 08:10:21', 'No, dear! Green rocks!', NULL),
(66, 'masha', 'Lop', 'Nop', 'Pro', 'Open', '2016-03-16', '2016-08-27', '#008040', 68, '2016-04-28 10:05:21', '', NULL),
(67, '', 'Ham', 'Bam', 'Pro', 'Closed', '2016-03-10', '2016-03-30', '#ff8000', 22, '2016-04-28 10:05:30', '', '2016-04-28 10:07:16'),
(68, '', 'Ham', 'Bam', 'Pro', 'Closed', '2016-03-10', '2016-03-30', '#ff8000', 22, '2016-04-28 10:05:41', '', '2016-04-28 10:07:18'),
(69, '', 'DDD', 'Bam', 'Pro', 'Closed', '2016-03-10', '2016-03-30', '#ff8000', 22, '2016-04-28 10:07:07', '', '2016-04-28 10:08:25'),
(70, '', 'Dam', 'Bam', 'Pro', 'Closed', '2016-03-10', '2016-03-30', '#ff8000', 22, '2016-04-28 10:07:59', '', '2016-04-28 10:08:26'),
(71, '', 'Lam', 'Bam', 'Pro', 'Closed', '2016-03-10', '2016-03-30', '#ff8000', 22, '2016-04-28 10:08:32', '', '2016-04-28 10:11:06'),
(72, '', 'Booo', 'Bam', 'Pro', 'Closed', '2016-03-10', '2016-03-30', '#ff8000', 22, '2016-04-28 10:13:14', '', '2016-04-28 10:14:32'),
(73, '', 'Booo', 'Bam', 'Pro', 'Closed', '2016-03-10', '2016-03-30', '#ff8000', 22, '2016-04-28 10:14:29', '', '2016-04-28 10:14:33'),
(74, '', '1233', 'Bam', 'Pro', 'Closed', '2016-03-10', '2016-03-30', '#ff8000', 22, '2016-04-28 10:22:46', '', '2016-04-28 10:42:45'),
(75, '', 'Ma', 'Mo', 'Pro', 'Open', '2016-05-06', '2016-05-12', '#000040', 6, '2016-04-30 21:23:58', '', '2016-04-30 21:30:20'),
(76, '', 'Ma', 'Mo', 'Pro', 'Open', '2016-05-06', '2016-05-12', '#000040', 6, '2016-04-30 21:24:16', '', '2016-04-30 21:30:24'),
(77, 'islam', 'Ma', 'Mo', 'Pro', 'Open', '2016-05-06', '2016-05-12', '#000040', 6, '2016-04-30 21:25:28', '', NULL),
(78, '', 'Ma', 'Mo', 'Pro', 'Open', '2016-05-06', '2016-05-12', '#000040', 6, '2016-04-30 21:25:32', '', '2016-04-30 21:30:29'),
(79, '', 'Ma', 'Mo', 'Pro', 'Open', '2016-05-06', '2016-05-12', '#000040', 6, '2016-04-30 21:25:46', '', '2016-04-30 21:46:03'),
(80, 'islam', 'Baa', 'Laaa', 'Against', 'Open', '2016-05-04', '2016-05-05', '#ff8000', 33, '2016-04-30 21:30:08', '', NULL),
(81, 'islam', 'Man', 'Doo', 'Pro', 'Open', '2016-05-18', '2016-05-07', '#800000', 22, '2016-04-30 22:09:04', '', NULL),
(82, 'masha', 'Git', 'Hub', 'Pro', 'Closed', '2016-05-12', '2016-05-04', '#ff8000', 25, '2016-04-30 23:03:16', '', NULL),
(83, 'masha', 'islam', 'Ruby rules', 'Pro', 'Closed', '2001-01-20', '2030-11-20', '#000080', 33, '2016-05-02 19:31:26', ' Nope, they don''t', NULL),
(84, 'islam', 'Ang', 'Estonia is...', 'Pro', 'Closed', '2001-09-20', '2030-04-20', '#ffff00', 33, '2016-05-03 18:07:06', 'small country with big dreams!', NULL),
(85, 'ang', 'islam', 'asdasd', 'Pro', 'Open', '2001-01-20', '2011-01-20', '#000000', 33, '2016-05-03 22:34:43', 'Grow up!', NULL),
(86, 'ang', 'masha', 'asdasda', 'Pro', 'Open', '2001-01-20', '2002-05-20', '#000000', 55, '2016-05-03 22:35:07', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `debattle_users`
--

CREATE TABLE IF NOT EXISTS `debattle_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(128) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `debattle_users`
--

INSERT INTO `debattle_users` (`id`, `username`, `password`, `first_name`, `last_name`, `created`) VALUES
(11, 'islam', '2f236a08e096f965091d663510eb03e24f996dc66436ab1ab8da54c6336bc9dfbddaddea74227d001fd6c509c5a45a329a1e55bb66d9c79bb9528053b0770e47', 'Islam', 'Muhammad', '0000-00-00 00:00:00'),
(14, 'bob', '0416a26ba554334286b1954918ecad7ba6c33575b49df915ff3367b5cef7ecd93b1f0b436636667b27b363011543971f1c81c3151d5ef72733501c1ff33c34af', 'Bob', 'Marley', '0000-00-00 00:00:00'),
(15, 'steve', '3ea1fe205c3d228ce053d97c29a94476a18d683b70a347693d5eac9ac985c6fdb556985fc8fc17bf1e9f8980cef3340ce62760f21d14a5c9eed43424d6359e72', 'Steve', 'Jobs', '0000-00-00 00:00:00'),
(16, 'ppp', '0d35be3377874560aca59c68eeb7f971f6915a0fa17086334a0010dd0058eaf5d9b0a0a4aa26e77c6a06fe0d76df1941e9f153d3607665901c8e4bafd4d4b371', 'ppp', 'ppp', '0000-00-00 00:00:00'),
(17, 'asd', 'e54ee7e285fbb0275279143abc4c554e5314e7b417ecac83a5984a964facbaad68866a2841c3e83ddf125a2985566261c4014f9f960ec60253aebcda9513a9b4', 'asd', 'asd', '0000-00-00 00:00:00'),
(20, 'ang', 'e20a8091864e180a1d4b6279e781b0f97c094669c1d9a4848a2cead2b1e7be9e3d2e04113b36e55061f4d369f2e64e618bab33cb4a412302dee124727ead5c39', 'Angel', 'Casel', '0000-00-00 00:00:00'),
(21, 'masha', 'f8a4d605fc3868f3c16a325232222e5113b0d4a4910140d508231362f0d94c41d46a8a534e8e524db8be10206fcbc33bf9b590da34af8e7e1b239b36a8aae125', 'Masha', 'Pat', '0000-00-00 00:00:00'),
(23, 'bat', 'ec864dcbb8285d12716fee137f7ab43ee23a72e3287e4d889131b7b5992eedb7abcb11c87903d73590dfe6953eb5445ede8b4dea91419e6250a3f042ed341551', 'Bat', 'Man', '0000-00-00 00:00:00'),
(24, 'pop', 'fbb1de6cb9887c458049fb7051d17eca4c82b339e12b56c6df8777e89ad66932924cf0bfbbdbe271abd61f78d46b8a82fe8a9a94d351b2f27556bd42480ed686', 'pop', 'pop', '0000-00-00 00:00:00'),
(25, 'jack', '77c62ff676394d2e1962c6f7be65ea23b5650a3e69359b4337f9dc4ea6165afec4787529e690708b1a8c9fb89fe105c151838a9ea235f7b1763982f6256f5b92', 'Jack', 'Lord', '2016-05-02 19:38:47');

-- --------------------------------------------------------

--
-- Table structure for table `debattle_user_interest`
--

CREATE TABLE IF NOT EXISTS `debattle_user_interest` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `interests_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `debattle_user_interest`
--

INSERT INTO `debattle_user_interest` (`id`, `user_id`, `interests_id`) VALUES
(1, 15, 4),
(2, 15, 4),
(3, 15, 4),
(4, 15, 3),
(5, 15, 2),
(6, 11, 4),
(7, 11, 1),
(8, 11, 3),
(9, 11, 2),
(10, 11, 8),
(11, 14, 4),
(12, 14, 2),
(13, 14, 9),
(14, 14, 10),
(15, 11, 11),
(16, 11, 13),
(17, 11, 7),
(18, 21, 3);

-- --------------------------------------------------------

--
-- Table structure for table `messages_sample`
--

CREATE TABLE IF NOT EXISTS `messages_sample` (
  `id` int(11) NOT NULL,
  `recipient` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages_sample`
--

INSERT INTO `messages_sample` (`id`, `recipient`, `message`, `created`) VALUES
(1, 'John@smith.com', 'Howdy!', '0000-00-00 00:00:00'),
(3, 'Janet@james.com', 'I''ll be back shortly!', '0000-00-00 00:00:00'),
(4, 'Lomma@zoo.com', 'Mooo', '2016-02-25 10:21:49'),
(5, 'test@testo.com', 'I am testing', '2016-02-25 10:23:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `debattle_interest`
--
ALTER TABLE `debattle_interest`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `first_name` (`interest`);

--
-- Indexes for table `debattle_request`
--
ALTER TABLE `debattle_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `debattle_users`
--
ALTER TABLE `debattle_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `debattle_user_interest`
--
ALTER TABLE `debattle_user_interest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `interests_id` (`interests_id`);

--
-- Indexes for table `messages_sample`
--
ALTER TABLE `messages_sample`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `debattle_interest`
--
ALTER TABLE `debattle_interest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `debattle_request`
--
ALTER TABLE `debattle_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `debattle_users`
--
ALTER TABLE `debattle_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `debattle_user_interest`
--
ALTER TABLE `debattle_user_interest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `messages_sample`
--
ALTER TABLE `messages_sample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `debattle_user_interest`
--
ALTER TABLE `debattle_user_interest`
  ADD CONSTRAINT `debattle_user_interest_ibfk_2` FOREIGN KEY (`interests_id`) REFERENCES `debattle_interest` (`id`),
  ADD CONSTRAINT `debattle_user_interest_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `debattle_users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
