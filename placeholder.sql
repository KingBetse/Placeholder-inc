-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3309
-- Generation Time: Jun 23, 2023 at 12:19 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `placeholder`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `id` bigint(19) NOT NULL,
  `user_id` bigint(19) NOT NULL,
  `post_id` bigint(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `accepted` int(1) NOT NULL,
  `CV` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`id`, `user_id`, `post_id`, `description`, `accepted`, `CV`) VALUES
(33, 441875, 817806585, 'qwerreq', 1, 'uploads/CV/FLAT - Ch-1.pdf'),
(34, 6933339, 3227131606, 'weewewew', 0, 'uploads/CV/(SRE) (Software Requirement Engineering) Final Exam.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` bigint(19) NOT NULL,
  `user_id` bigint(19) NOT NULL,
  `post_id` bigint(19) NOT NULL,
  `job_title` text NOT NULL,
  `job_type` text NOT NULL,
  `work_location` text NOT NULL,
  `vacancies` int(5) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `has_image` tinyint(1) NOT NULL,
  `needed` varchar(5) NOT NULL,
  `work_experiance` varchar(3) NOT NULL,
  `salary` int(6) NOT NULL,
  `skills` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `closed` varchar(100) NOT NULL,
  `likes` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `post_id`, `job_title`, `job_type`, `work_location`, `vacancies`, `image`, `has_image`, `needed`, `work_experiance`, `salary`, `skills`, `date`, `closed`, `likes`) VALUES
(1, 0, 3502194, 'music producer', 'producer', 'addis abebe nerar kebena', 4, '', 0, '', '2', 70000, '', '2023-03-23 07:47:39', 'applicantse will die ', 0),
(2, 3426, 1155, 'atabi', 'libs atabi', 'ketema', 4, '', 0, 'male', '3', 300, '', '2023-03-23 07:54:23', 'i am king', 0),
(3, 3426, 52294, 'po po atabi', 'atabi', 'geter', 1, '', 0, 'femal', ' 2', 2, '', '2023-03-23 07:57:34', 'open', 0),
(5, 6933339, 9571220, 'ekekam', 'makek', 'r nf house', 3, 'uploads/346-3468379_tokyo-ghoul-wallpaper-4k.jpg', 0, 'male', ' 2', 90, '', '2023-04-14 07:20:52', 'untill we find the best akaki', 0),
(6, 4603431, 9356, 'we need hit man ', 'hit man', '4kilo betemenegeset', 1, '', 0, 'male', ' 10', 1000000, '', '2023-04-02 06:56:39', 'untill we find the best hit man', 0),
(7, 6933339, 9089, ' i need a hard disk', 'finder', 'tulu dmtu', 1, 'uploads/346-3468379_tokyo-ghoul-wallpaper-4k.jpg', 0, 'male', ' 3', 2000, '', '2023-04-14 07:20:52', 'just find it', 0),
(8, 4748, 18782305, 'video edit madereg yemichil', 'video editor', 'anywhere', 2, '', 0, 'male', ' 3', 500, '', '2023-04-10 07:57:17', 'if any one id=s qualified', 0),
(16, 6933339, 787464063, 'des yemil neger', 'wagwan', 'geter', 1, 'uploads/346-3468379_tokyo-ghoul-wallpaper-4k.jpg', 0, 'both', ' 4', 21322, '', '2023-04-14 07:20:52', 'closed ', 0),
(17, 6933339, 926542945, 'des yemil neger', 'wagwan', 'geter', 1, 'uploads/346-3468379_tokyo-ghoul-wallpaper-4k.jpg', 0, 'both', ' 4', 21322, '', '2023-04-14 07:20:52', 'closed ', 0),
(18, 6933339, 817806585, 'des yemil neger', 'wagwan', 'geter', 1, 'uploads/346-3468379_tokyo-ghoul-wallpaper-4k.jpg', 0, 'both', ' 4', 21322, '', '2023-04-14 07:20:52', 'closed ', 0),
(19, 6933339, 5951, 'wagwan', 'selametegna', 'norway', 1, 'uploads/346-3468379_tokyo-ghoul-wallpaper-4k.jpg', 0, 'both', ' 3', 50000, '', '2023-04-14 07:20:52', 'applicantse will die ', 0),
(21, 64136, 936, 'ere gude', 'wad', 'police', 1, 'uploads/maxresdefault.jpg', 0, 'both', ' 2', 90, '', '2023-05-12 07:12:05', 'open', 0),
(22, 64136, 591, 'atabi', 'libs atabi', 'ketema', 1, 'uploads/maxresdefault.jpg', 0, 'both', ' 0+', 50000, '', '2023-05-12 07:12:05', 'i am king', 0),
(24, 64136, 5180785, 'eka atabi', 'producer', 'geter', 2, 'uploads/maxresdefault.jpg', 0, 'male', ' 3', 3434, '', '2023-05-12 07:12:05', 'closed ', 0),
(25, 1956150429, 270516, 'ekekam', 'miake', 'around figa', 2, '', 0, 'male', ' 3', 70000, '', '2023-05-28 11:21:18', 'untill we find the best akaki', 0),
(26, 2278910, 1524170, 'music producer', 'producer', 'addis abebe nerar kebena', 1, '', 0, 'both', ' 5+', 70000, '', '2023-06-05 06:31:06', 'qqqqwww', 0),
(27, 441875, 8899330, 'atabi', 'libs atabi', 'addis abebe nerar kebena', 1, '', 0, 'male', ' 2', 500, '', '2023-06-18 00:01:36', 'open', 0),
(28, 6933339, 16684509, 'ekekam', 'libs atabi', 'norway', 3, '', 0, 'male', ' 3', 4353, '', '2023-06-22 09:45:27', 'i am king', 0),
(29, 858, 3227131606, 'ekekam', 'atabi', 'anywhere', 2, '', 0, 'male', ' 1', 70000, '', '2023-06-22 18:35:09', 'closed ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_skill`
--

CREATE TABLE `post_skill` (
  `id` smallint(6) NOT NULL,
  `post_id` int(19) NOT NULL,
  `skills` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_skill`
--

INSERT INTO `post_skill` (`id`, `post_id`, `skills`) VALUES
(1, 8899330, 'Another Job'),
(2, 3502194, 'Frontend'),
(3, 16684509, 'Frontend'),
(4, 16684509, 'Fullstack'),
(5, 2147483647, 'Frontend'),
(6, 2147483647, 'Fullstack'),
(7, 2147483647, 'Business');

-- --------------------------------------------------------

--
-- Table structure for table `saved`
--

CREATE TABLE `saved` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saved`
--

INSERT INTO `saved` (`id`, `user_id`, `post_id`) VALUES
(1, 0, 16684509),
(2, 1, 4),
(3, 6933339, 16684509),
(4, 6933339, 16684509),
(5, 6933339, 16684509),
(6, 6933339, 3502194);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(10) NOT NULL,
  `user_id` int(19) NOT NULL,
  `skill` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `user_id`, `skill`) VALUES
(1, 441875, 'Frontend'),
(2, 441875, 'Backend'),
(3, 441875, 'tutoring'),
(4, 441875, 'Graphic Design'),
(5, 441875, 'Translator'),
(6, 6933339, 'Frontend'),
(7, 6933339, 'Backend'),
(8, 6933339, 'Graphic Design');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(19) NOT NULL,
  `user_id` bigint(19) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `url_address` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `phone_number` int(19) NOT NULL,
  `education` varchar(19) NOT NULL,
  `birth_date` date NOT NULL,
  `country` varchar(100) NOT NULL,
  `skills` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL,
  `user` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `first_name`, `last_name`, `gender`, `email`, `password`, `url_address`, `date`, `phone_number`, `education`, `birth_date`, `country`, `skills`, `image`, `user`) VALUES
(1, 6933339, 'wagwan', 'wee', 'male', 'wagwan@gmail.com', '12345678', '', '2023-06-09 19:49:43', 5443211, 'Undergraduate', '6666-02-04', 'America', '', '', '0'),
(2, 2278910, 'abebe', 'kebede', '', '12@345', 'qwertyui', '', '2023-04-25 18:26:13', 0, '', '0000-00-00', '', '', '', '0'),
(9, 64136, 'ab', 'yo', 'male', 'king.betse@gmail.com', 'qwerqwer', '', '2023-05-22 07:41:01', 2147483647, 'Highschool', '1223-03-21', 'Ethiopia', '', 'uploads/maxresdefault.jpg', '0'),
(10, 3426, 'motr', 'qwsc', 'female', '44@qq', 'qweqweqwe', '', '2023-04-22 20:12:52', 4563456, 'Postgraduate', '0007-07-07', 'Nepal', '', '', '0'),
(14, 1543368807, '', '', '', 'wagwan@gmail.co', 'qweqweqwe', '', '2023-04-22 20:12:52', 0, '', '0000-00-00', '', '', '', '0'),
(15, 3866636635, '', '', '', '12@3452', 'qweqweqwe', '', '2023-04-22 20:12:52', 0, '', '0000-00-00', '', '', '', '0'),
(16, 745514986, 'qweqwe', 'dfgdfg', 'male', '6556656@ee', 'qweqweqwe', '', '2023-04-22 20:12:52', 23223, 'Highschool', '0002-02-22', 'Nepal', '', '', '0'),
(17, 228836235, '', '', '', '45@3i', 'qweqweqwe', '', '2023-04-22 20:12:52', 0, '', '0000-00-00', '', '', '', '0'),
(18, 30535, '', '', '', 'bhuujm@w', 'qweqweqwe', '', '2023-04-22 20:12:52', 0, '', '0000-00-00', '', '', '', '0'),
(19, 4603431, '', '', '', '12@12', 'qweqweqwe', '', '2023-04-22 20:12:52', 0, '', '0000-00-00', '', '', '', '0'),
(20, 626636972, '', '', '', 'wag@dmail.vum', 'qweqweqwe', '', '2023-04-22 20:12:52', 0, '', '0000-00-00', '', '', '', '0'),
(21, 781653216, 'gemechu', 'feyesa', 'male', 'buburahi@gmail.com', 'qweqweqwe', '', '2023-04-22 20:12:52', 9092311, 'Highschool', '0001-01-31', 'Japan', '', '', '0'),
(22, 867338, '', '', '', '1212@wqw.ppp', 'qweqweqwe', '', '2023-04-22 20:12:52', 0, '', '0000-00-00', '', '', '', '0'),
(23, 4748, 'kechste', 'tesfaye', 'male', 'kech@gmail.com', 'qweqweqwe', '', '2023-04-22 20:12:52', 2147483647, 'Education', '2002-02-02', 'America', '', '', '0'),
(24, 424789804, 'heran', 'belay', 'male', 'heran.belay@gmail.com', 'asdfasdfasdf', '', '2023-05-28 09:21:19', 2147483647, 'Undergraduate', '2002-03-09', 'Japan', '', 'uploads/photo_2023-04-13_19-33-43.jpg', '0'),
(25, 1956150429, 'baby', 'demlash', 'male', 'baby@gmail.com', 'qwerasdf', '', '2023-05-28 11:10:22', 2234324, 'Undergraduate', '2001-02-03', 'America', '', 'uploads/anime.jpg', '0'),
(26, 7963029953, 'abenezer', 'tesfaye', 'female', 'abena@gmail.com', 'qweqweqwe', '', '2023-06-05 19:17:52', 2147483647, 'Highschool', '2343-03-04', 'Japan', '', 'uploads/20230103_164708.jpg', '0'),
(27, 441875, 'test', 'test', 'both', 'test@gmial.com', '12345678', '', '2023-06-09 06:54:10', 12345678, 'Highschool', '9876-05-06', 'America', '', '', '0'),
(28, 606521, '', '', '', 'test@gmail.com', '12345678', '', '2023-06-06 09:59:42', 0, '', '0000-00-00', '', '', '', '0'),
(29, 21578, '', '', '', 'gemechu@gmail.com', 'asdfzxcf', '', '2023-06-09 06:48:50', 0, '', '0000-00-00', '', '', '', '0'),
(51, 858, 'w', 'w', 'male', 'q@g.com', 'q@g.coms', '', '2023-06-22 12:35:54', 0, '', '3344-01-31', 'America', '', 'uploads/anime.jpg', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `job_title` (`job_title`(768)),
  ADD KEY `job_type` (`job_type`(768)),
  ADD KEY `work_location` (`work_location`(768)),
  ADD KEY `needed` (`needed`),
  ADD KEY `work_experiance` (`work_experiance`),
  ADD KEY `salary` (`salary`),
  ADD KEY `date` (`date`),
  ADD KEY `closed` (`closed`),
  ADD KEY `has_index` (`has_image`);
ALTER TABLE `post` ADD FULLTEXT KEY `job_title_2` (`job_title`);
ALTER TABLE `post` ADD FULLTEXT KEY `job_type_2` (`job_type`);
ALTER TABLE `post` ADD FULLTEXT KEY `work_location_2` (`work_location`);

--
-- Indexes for table `post_skill`
--
ALTER TABLE `post_skill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved`
--
ALTER TABLE `saved`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `first_name` (`first_name`),
  ADD KEY `last_name` (`last_name`),
  ADD KEY `gender` (`gender`),
  ADD KEY `email` (`email`),
  ADD KEY `url_address` (`url_address`),
  ADD KEY `date` (`date`),
  ADD KEY `phone_number` (`phone_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `post_skill`
--
ALTER TABLE `post_skill`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `saved`
--
ALTER TABLE `saved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
