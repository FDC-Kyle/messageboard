-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2023 at 10:47 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `messages_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `is_show_sender` tinyint(1) NOT NULL,
  `is_shown_reciever` tinyint(1) NOT NULL,
  `time_sent` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `recipient_id`, `message`, `is_show_sender`, `is_shown_reciever`, `time_sent`) VALUES
(799, 98, 107, '12', 0, 0, '2023-11-20 02:21:46'),
(800, 107, 127, '123', 0, 0, '2023-11-20 02:22:16'),
(801, 127, 107, 'gaunsa ka?', 0, 0, '2023-11-20 02:22:29'),
(802, 127, 107, '12', 0, 0, '2023-11-20 02:26:05'),
(803, 127, 107, 'lkndshfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 0, 0, '2023-11-20 02:26:15'),
(804, 107, 127, 'wassup?', 0, 0, '2023-11-20 02:34:50'),
(805, 98, 107, 'cx', 0, 0, '2023-11-20 02:38:51'),
(819, 107, 107, '12', 0, 0, '2023-11-20 02:54:29'),
(828, 11, 107, 'test', 0, 0, '2023-11-20 02:58:31'),
(829, 11, 107, 'dsds', 0, 0, '2023-11-20 02:59:41'),
(830, 11, 107, 'as', 0, 0, '2023-11-20 02:59:45'),
(831, 11, 107, 'ds', 0, 0, '2023-11-20 02:59:49'),
(832, 11, 107, 'asdw21', 0, 0, '2023-11-20 02:59:54'),
(833, 11, 107, '123', 0, 0, '2023-11-20 02:59:58'),
(834, 11, 107, 'asds', 0, 0, '2023-11-20 03:00:04'),
(835, 98, 107, 'test', 0, 0, '2023-11-20 03:00:10'),
(836, 98, 107, 'fdgd', 0, 0, '2023-11-20 03:02:14'),
(837, 98, 107, 'sdasd', 0, 0, '2023-11-20 03:02:22'),
(839, 98, 107, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 0, 0, '2023-11-20 03:05:07'),
(840, 11, 107, '123', 0, 0, '2023-11-20 03:08:57'),
(841, 11, 107, '123', 0, 0, '2023-11-20 03:09:01'),
(842, 11, 107, '123', 0, 0, '2023-11-20 03:09:16'),
(843, 11, 107, '123', 0, 0, '2023-11-20 03:09:18'),
(844, 11, 107, '123', 0, 0, '2023-11-20 03:19:57'),
(845, 11, 107, '32', 0, 0, '2023-11-20 03:20:01'),
(846, 11, 107, '3212312', 0, 0, '2023-11-20 03:20:04'),
(847, 11, 107, '123', 0, 0, '2023-11-20 03:45:13'),
(848, 11, 107, 'ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', 0, 0, '2023-11-20 04:39:16'),
(849, 11, 107, '123', 0, 0, '2023-11-20 05:22:32'),
(850, 11, 107, '213', 0, 0, '2023-11-20 05:33:18'),
(851, 11, 107, '123', 0, 0, '2023-11-20 06:04:47'),
(853, 11, 107, 'HELLO', 0, 0, '2023-11-20 06:05:02'),
(855, 11, 107, 'test', 0, 0, '2023-11-20 06:12:05'),
(856, 11, 107, 'ds', 0, 0, '2023-11-20 06:14:07'),
(857, 11, 107, 'dsds', 0, 0, '2023-11-20 06:15:55'),
(858, 11, 107, 'hello', 0, 0, '2023-11-20 06:16:26'),
(859, 11, 107, 'sdsd', 0, 0, '2023-11-20 06:19:35'),
(860, 11, 107, 'ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', 0, 0, '2023-11-20 06:47:51'),
(861, 11, 107, 'jklkjl', 0, 0, '2023-11-20 06:50:30'),
(862, 11, 107, 'khjkh', 0, 0, '2023-11-20 06:50:51'),
(863, 11, 107, 'we', 0, 0, '2023-11-20 06:51:03'),
(864, 11, 107, 'dsds', 0, 0, '2023-11-20 06:51:25'),
(865, 11, 107, 'sds', 0, 0, '2023-11-20 06:52:02'),
(866, 11, 107, 'qwq', 0, 0, '2023-11-20 06:52:07'),
(867, 11, 107, 'qwq', 0, 0, '2023-11-20 06:52:08'),
(868, 11, 107, 'ssssssssssssssssssssssssssssssssssssssssssssssssssssss', 0, 0, '2023-11-20 07:01:54'),
(869, 11, 107, 'ssssssssssssssssssssssssssssssssssssssssssssssssssssssfffffffffff', 0, 0, '2023-11-20 07:02:02'),
(870, 11, 107, 'ewew', 0, 0, '2023-11-20 07:14:47'),
(871, 11, 107, 'ewew', 0, 0, '2023-11-20 07:22:18'),
(872, 11, 107, 'qwewqe', 0, 0, '2023-11-20 07:22:20'),
(873, 11, 107, '3232', 0, 0, '2023-11-20 07:22:36'),
(874, 11, 107, '232', 0, 0, '2023-11-20 08:16:15'),
(875, 11, 107, '2323', 0, 0, '2023-11-20 08:16:27'),
(876, 11, 107, 'ewew', 0, 0, '2023-11-20 08:17:11'),
(877, 11, 107, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 0, 0, '2023-11-20 08:20:09'),
(880, 11, 107, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 0, 0, '2023-11-20 08:30:57'),
(894, 11, 138, 'test', 0, 0, '2023-11-20 08:46:36'),
(895, 11, 138, 'sdsd', 0, 0, '2023-11-20 08:46:50'),
(896, 11, 138, 'test', 0, 0, '2023-11-20 08:47:05'),
(897, 127, 107, 'test', 0, 0, '2023-11-20 09:08:18'),
(899, 126, 107, 'resd', 0, 0, '2023-11-20 09:13:57'),
(900, 11, 140, 'rtes', 0, 0, '2023-11-20 09:19:57'),
(901, 11, 140, 'sadsad', 0, 0, '2023-11-20 09:20:04'),
(902, 108, 140, 'test', 0, 0, '2023-11-20 09:20:18'),
(903, 108, 140, 'yellow', 0, 0, '2023-11-20 09:20:26'),
(904, 11, 140, 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 0, 0, '2023-11-20 09:24:46'),
(905, 11, 140, '123', 0, 0, '2023-11-20 09:45:25');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(8) NOT NULL,
  `topic_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `body` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `topic_id`, `user_id`, `body`, `created`, `modified`) VALUES
(1, 0, 0, 'test post', '2023-11-07 03:46:51', '2023-11-07 03:46:51'),
(2, 0, 0, 'test post', '2023-11-07 03:55:18', '2023-11-07 03:55:18'),
(3, 4, 0, 'This is the post for test1', '2023-11-07 03:56:18', '2023-11-07 03:56:18'),
(4, 4, 0, 'This is the post for test1', '2023-11-07 03:56:24', '2023-11-07 03:56:24'),
(5, 4, 0, '', '2023-11-07 03:56:54', '2023-11-07 03:56:54'),
(6, 4, 0, 'this is the post for topic id 4', '2023-11-07 04:24:30', '2023-11-07 04:24:30'),
(7, 4, 0, 'this is the post for topic id 4', '2023-11-07 04:25:32', '2023-11-07 04:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `title` varchar(100) NOT NULL,
  `visible` tinyint(1) NOT NULL COMMENT '1 for visible 2 for hidden',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `user_id`, `title`, `visible`, `created`, `modified`) VALUES
(2, 0, 'another test1234', 1, '2023-11-07 02:15:32', '2023-11-07 03:02:48'),
(3, 0, 'test1', 1, '2023-11-07 02:18:23', '2023-11-07 02:18:23'),
(4, 0, 'test1', 1, '2023-11-07 02:22:53', '2023-11-07 02:22:53'),
(6, 0, 'another test1234', 1, '2023-11-07 03:25:56', '2023-11-07 03:25:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(8) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `birthdate` date NOT NULL,
  `hobby` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `full_name`, `gender`, `birthdate`, `hobby`, `created`, `modified`, `last_login`, `image`) VALUES
(11, 'dennis23', 'test@gmail.com', '12', '1234b32232', '1', '2043-05-22', 'I like coding and playing basketball during my free time.3232wew1', '2023-11-07 07:52:30', '2023-11-13 08:20:52', '0000-00-00 00:00:00', '6551ce54b9775_78c2fe190d6f82e6.png'),
(98, 'Marky', 'test@gmail.com', 'ece7178d250836696d2aa3fbaba386d1ffba5dd3', '1234', '1', '2019-02-13', 'asdjsjd', '2023-11-09 10:19:10', '2023-11-13 10:35:17', '2023-11-09 17:19:10', ''),
(107, 'michael', 'michael@gmail.com', 'ece7178d250836696d2aa3fbaba386d1ffba5dd3', 'michael jordan', 'male', '2023-11-01', '1234555', '2023-11-10 06:35:37', '2023-11-20 10:18:10', '2023-11-20 10:18:10', '655ace3f1083d_48d4512f5c912c8b.jpeg'),
(108, 'test1234', 'testtest@gmail.com', 'ece7178d250836696d2aa3fbaba386d1ffba5dd3', 'test villanueva', '1', '2023-11-08', '123', '2023-11-13 01:55:38', '2023-11-17 09:08:07', '2023-11-17 09:08:07', '655584b4f3114_fe1ae8cbaed603fb.png'),
(126, 'test123', 'test1111@gmail.com', 'ece7178d250836696d2aa3fbaba386d1ffba5dd3', '', '0', '0000-00-00', '', '2023-11-15 06:09:52', '2023-11-15 06:09:52', '2023-11-15 13:09:52', ''),
(127, 'michael1@gmail.com', 'michael1@gmail.com', 'ece7178d250836696d2aa3fbaba386d1ffba5dd3', '', '', '0000-00-00', '', '2023-11-16 10:26:06', '2023-11-20 03:34:27', '2023-11-20 03:34:27', ''),
(128, 'm2ichael@gmail.com', 'michael21@gmail.com', 'ece7178d250836696d2aa3fbaba386d1ffba5dd3', '', '', '0000-00-00', '', '2023-11-16 10:27:51', '2023-11-16 10:27:51', '0000-00-00 00:00:00', ''),
(129, 'kylev', 'new@gmail.com', 'ece7178d250836696d2aa3fbaba386d1ffba5dd3', 'kyle', 'male', '2000-11-19', 'playing basketball and coding', '2023-11-20 04:11:33', '2023-11-20 04:14:09', '0000-00-00 00:00:00', '655ace9977b83_19158d99156b8af2.jpeg'),
(130, 'michael@gmail.com', 'fdc.kylev@gmail.com', 'ece7178d250836696d2aa3fbaba386d1ffba5dd3', '', '', '0000-00-00', '', '2023-11-20 04:26:14', '2023-11-20 04:26:14', '0000-00-00 00:00:00', ''),
(131, '123', 'fdc.kyle232v@gmail.com', 'ece7178d250836696d2aa3fbaba386d1ffba5dd3', '', '', '0000-00-00', '', '2023-11-20 04:39:56', '2023-11-20 04:39:56', '0000-00-00 00:00:00', ''),
(132, '123', 'test33@gmail.com', 'ece7178d250836696d2aa3fbaba386d1ffba5dd3', '', '', '0000-00-00', '', '2023-11-20 04:40:16', '2023-11-20 04:40:16', '0000-00-00 00:00:00', ''),
(133, '12334', '3test@gmail.com', 'ece7178d250836696d2aa3fbaba386d1ffba5dd3', '', '', '0000-00-00', '', '2023-11-20 04:41:00', '2023-11-20 04:41:00', '0000-00-00 00:00:00', ''),
(134, 'm1333', 'test123@gmail.com', 'ece7178d250836696d2aa3fbaba386d1ffba5dd3', '', '', '0000-00-00', '', '2023-11-20 04:41:38', '2023-11-20 04:41:38', '0000-00-00 00:00:00', ''),
(135, '12342', 'fdc123.kylev@gmail.com', 'ece7178d250836696d2aa3fbaba386d1ffba5dd3', '1234', 'male', '2023-11-08', '1234', '2023-11-20 04:50:59', '2023-11-20 04:54:05', '0000-00-00 00:00:00', '655ad85d516b4_8b738de953e2c6cd.jpg'),
(136, '12345', 'test32@gmail.com', 'ece7178d250836696d2aa3fbaba386d1ffba5dd3', 'Kyle Villanueva', 'male', '2000-02-19', 'Playing basketball', '2023-11-20 09:33:18', '2023-11-20 09:35:50', '2023-11-20 09:35:04', '655b1a02de650_90c5f14613b7a319.jpg'),
(138, '12345', 'test323@gmail.com', 'ece7178d250836696d2aa3fbaba386d1ffba5dd3', '', '', '0000-00-00', '', '2023-11-20 09:36:25', '2023-11-20 09:37:25', '2023-11-20 09:37:25', ''),
(140, 'final_test', 'final@gmail.com', 'ece7178d250836696d2aa3fbaba386d1ffba5dd3', 'final test', 'male', '2000-02-19', 'test', '2023-11-20 10:18:59', '2023-11-20 10:19:52', '2023-11-20 10:19:09', '655b24ab35eaf_ef5a2e8db2b6ce24.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=906;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
