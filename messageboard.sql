-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2023 at 08:42 AM
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
-- Database: `messageboard`
--

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
(913, 11, 107, '123', 0, 0, '2023-11-21 01:12:48'),
(914, 127, 107, '123', 0, 0, '2023-11-21 01:15:45'),
(915, 107, 127, 'nag unsa ka?', 0, 0, '2023-11-21 01:16:00'),
(916, 127, 107, 'wala', 0, 0, '2023-11-21 01:16:15'),
(917, 127, 107, '1', 0, 0, '2023-11-21 01:16:33'),
(918, 127, 107, '11', 0, 0, '2023-11-21 01:16:36'),
(919, 127, 107, '1111', 0, 0, '2023-11-21 01:16:38'),
(920, 127, 107, '1111', 0, 0, '2023-11-21 01:16:39'),
(921, 127, 107, '1111', 0, 0, '2023-11-21 01:16:40'),
(922, 127, 107, '1111', 0, 0, '2023-11-21 01:16:41'),
(923, 127, 107, '1111', 0, 0, '2023-11-21 01:16:42'),
(924, 127, 107, '1111', 0, 0, '2023-11-21 01:16:42'),
(925, 127, 107, '1111', 0, 0, '2023-11-21 01:16:43'),
(926, 127, 107, '1111', 0, 0, '2023-11-21 01:16:44'),
(927, 127, 107, '1111', 0, 0, '2023-11-21 01:16:44'),
(929, 11, 107, '123', 0, 0, '2023-11-21 01:43:55'),
(930, 11, 107, '123', 0, 0, '2023-11-21 01:44:02'),
(931, 11, 107, '213', 0, 0, '2023-11-21 01:45:08'),
(932, 11, 107, '1111111111111111111111111111111111111111111111111111111111111', 0, 0, '2023-11-21 02:28:59'),
(933, 11, 107, '1111111111111111111111111111111111111111111111111111111111111', 0, 0, '2023-11-21 02:29:03'),
(934, 11, 107, '123', 0, 0, '2023-11-21 02:29:29'),
(935, 11, 107, '232', 0, 0, '2023-11-21 02:29:35'),
(936, 98, 107, '123', 0, 0, '2023-11-21 02:34:37'),
(937, 11, 107, '232', 0, 0, '2023-11-21 02:34:46'),
(938, 98, 107, '123', 0, 0, '2023-11-21 02:51:53'),
(939, 127, 107, 'test', 0, 0, '2023-11-21 02:52:03'),
(940, 11, 144, '123', 0, 0, '2023-11-21 05:17:21'),
(941, 11, 145, '123', 0, 0, '2023-11-21 05:22:19'),
(942, 11, 145, '123', 0, 0, '2023-11-21 05:22:23'),
(943, 11, 146, '123', 0, 0, '2023-11-21 05:24:01'),
(946, 11, 107, '123', 0, 0, '2023-11-21 07:30:12');

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
(107, 'michael', 'michael@gmail.com', 'ece7178d250836696d2aa3fbaba386d1ffba5dd3', 'michael jordan', 'male', '2023-11-01', '1234555', '2023-11-10 06:35:37', '2023-11-21 08:40:14', '2023-11-21 08:40:14', '655ace3f1083d_48d4512f5c912c8b.jpeg'),
(108, 'test1234', 'testtest@gmail.com', 'ece7178d250836696d2aa3fbaba386d1ffba5dd3', 'test villanueva', '1', '2023-11-08', '123', '2023-11-13 01:55:38', '2023-11-17 09:08:07', '2023-11-17 09:08:07', '655584b4f3114_fe1ae8cbaed603fb.png'),
(126, 'test123', 'test1111@gmail.com', 'ece7178d250836696d2aa3fbaba386d1ffba5dd3', '', '0', '0000-00-00', '', '2023-11-15 06:09:52', '2023-11-15 06:09:52', '2023-11-15 13:09:52', ''),
(127, 'michael1@gmail.com', 'michael1@gmail.com', 'ece7178d250836696d2aa3fbaba386d1ffba5dd3', '', '', '0000-00-00', '', '2023-11-16 10:26:06', '2023-11-21 02:14:35', '2023-11-21 02:14:35', ''),
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
(140, 'final_test', 'final@gmail.com', 'ece7178d250836696d2aa3fbaba386d1ffba5dd3', 'final test', 'male', '2000-02-19', 'test', '2023-11-20 10:18:59', '2023-11-20 10:19:52', '2023-11-20 10:19:09', '655b24ab35eaf_ef5a2e8db2b6ce24.jpg'),
(141, '12345', 'test333@gmail.com', 'ece7178d250836696d2aa3fbaba386d1ffba5dd3', '', '', '0000-00-00', '', '2023-11-20 10:55:12', '2023-11-20 10:55:12', '0000-00-00 00:00:00', ''),
(142, '12345', 'test1@gmail.com', 'ece7178d250836696d2aa3fbaba386d1ffba5dd3', '', '', '0000-00-00', '', '2023-11-21 04:02:30', '2023-11-21 04:02:30', '0000-00-00 00:00:00', ''),
(143, '12345', '12@gmail.com', 'ece7178d250836696d2aa3fbaba386d1ffba5dd3', '', '', '0000-00-00', '', '2023-11-21 06:11:51', '2023-11-21 06:11:51', '0000-00-00 00:00:00', ''),
(144, 'final_test', 'test3232@gmail.com', 'ece7178d250836696d2aa3fbaba386d1ffba5dd3', 'final test', 'male', '2000-02-19', 'ggffgfg', '2023-11-21 06:15:09', '2023-11-21 06:16:52', '2023-11-21 06:16:52', '655c3d0b59fcd_b4b3545c578145fa.jpg'),
(145, 'michael@gmail.com', 'test32332322@gmail.com', 'ece7178d250836696d2aa3fbaba386d1ffba5dd3', '', '', '0000-00-00', '', '2023-11-21 06:22:13', '2023-11-21 06:22:43', '0000-00-00 00:00:00', ''),
(146, 'michael@gmail.com323', 'teewst3232@gmail.com', 'ece7178d250836696d2aa3fbaba386d1ffba5dd3', '', '', '0000-00-00', '', '2023-11-21 06:23:54', '2023-11-21 06:23:54', '0000-00-00 00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=947;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
