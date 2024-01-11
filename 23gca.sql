-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2024 at 01:53 PM
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
-- Database: `23gca`
--

-- --------------------------------------------------------

--
-- Table structure for table `dislikes`
--

CREATE TABLE `dislikes` (
  `dislike_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `ip_address` varchar(145) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dislikes`
--

INSERT INTO `dislikes` (`dislike_id`, `post_id`, `ip_address`, `created_at`) VALUES
(19, 4, '::1', '2024-01-05 09:31:58'),
(20, 2, '::1', '2024-01-05 09:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `ip_address` varchar(145) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`like_id`, `post_id`, `ip_address`, `created_at`) VALUES
(16, 5, '::1', '2024-01-05 09:28:32'),
(18, 4, '::1', '2024-01-05 09:31:57'),
(19, 2, '::1', '2024-01-05 09:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `mcq_questions`
--

CREATE TABLE `mcq_questions` (
  `id` int(11) NOT NULL,
  `question_text` text DEFAULT NULL,
  `option1` varchar(255) DEFAULT NULL,
  `option2` varchar(255) DEFAULT NULL,
  `option3` varchar(255) DEFAULT NULL,
  `option4` varchar(255) DEFAULT NULL,
  `correct_option` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mcq_questions`
--

INSERT INTO `mcq_questions` (`id`, `question_text`, `option1`, `option2`, `option3`, `option4`, `correct_option`) VALUES
(1, 'Who was the first Indian to become a qualified Actuary?', 'GS Marathe', 'NV Nayudu', 'LS Vaidyanathan', 'BK Shah', 3),
(2, 'Who were the first fellows to qualify from ASI?', 'Meena Sidhwani and R Padmaja', 'KP Narsimhan and SP Subedar', 'LS Vaidyanathan and NV Nayudu', 'NK Shinkar and R Ramakrishnan', 1),
(3, 'Which of these insurance companies was owned by Tata Group before January 1, 1973?', 'Tata AIA Life Insurance', 'TATA AIG General Insurance', 'New India Assurance', 'Oriental General Insurance Company Ltd', 3),
(4, 'When was the Actuaries Bill (before becoming the Actuaries Act) first introduced in Parliament of India?', '1997', '2000', '2002', '2006', 3),
(5, 'Who was the finance minister of India when LIC was established?', 'Jawahar Lal Nehru', 'CD Deshmukh', 'Dr Manmohan Singh', 'Yashwant Sinha', 2);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `contact` varchar(250) DEFAULT NULL,
  `member_id` varchar(250) DEFAULT NULL,
  `caption` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `name`, `email`, `contact`, `member_id`, `caption`, `image_path`, `status`, `created_at`) VALUES
(2, 'Faheem', 'sk3136537@gmail.com', '8070139237', '', 'ok', 'uploads/memes/image_6593b606022c6.png', '1', '2024-01-02 07:06:46'),
(3, 'Faheem', 'sk3136537@gmail.com', '8070139237', '', 'ok', 'uploads/memes/image_6593b71a72b20.png', '1', '2024-01-02 07:11:22'),
(4, 'Faheem', 'sk3136537@gmail.com', '8070139237', '', 'ok', 'uploads/memes/image_6593b7e35a551.jpg', '0', '2024-01-02 07:14:43'),
(5, 'Faheem', 'sk3136537@gmail.com', '8070139237', '', 'ok', 'uploads/memes/image_6593b82d4880c.jpg', '0', '2024-01-02 07:15:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pregcatour`
--

CREATE TABLE `tbl_pregcatour` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `mobile` varchar(250) DEFAULT NULL,
  `options` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pregcatour`
--

INSERT INTO `tbl_pregcatour` (`id`, `name`, `email`, `mobile`, `options`, `created_at`, `updated_at`) VALUES
(1, 'Fahim', 'sk3136537@gmail.com', '8909876543', 'option3', '2023-12-22 15:17:43', '2023-12-22 15:17:43'),
(2, 'fahim', 'sk3136537@gmail.com', '8908765432', 'option4', '2023-12-22 16:01:51', '2023-12-22 16:01:51'),
(3, 'fahim', 'sk3136537@gmail.com', '9087654324', 'option2', '2023-12-22 16:06:20', '2023-12-22 16:06:20'),
(4, 'fahim', 'sk3136537@gmail.com', '9087654324', 'option2', '2023-12-22 16:07:41', '2023-12-22 16:07:41'),
(5, 'fahim', 'sk3136537@gmail.com', '9087654324', 'option2', '2023-12-22 16:09:22', '2023-12-22 16:09:22'),
(6, 'fahim', 'sk3136537@gmail.com', '9087654324', 'option2', '2023-12-22 16:09:58', '2023-12-22 16:09:58'),
(7, 'fahim', 'sk3136537@gmail.com', '89098765432', 'option2', '2023-12-22 16:31:49', '2023-12-22 16:31:49'),
(8, 'Fahim', 'sk3136537@gmail.com', '8909876789', 'option3', '2023-12-22 16:33:35', '2023-12-22 16:33:35'),
(9, 'fahim', 'sk3136537@gmail.com', '8070139237', 'option2', '2023-12-22 16:48:15', '2023-12-22 16:48:15'),
(10, 'fahim', 'sk3136537@gmail.com', '8909876545', 'option4', '2023-12-22 16:49:23', '2023-12-22 16:49:23'),
(11, 'fahim', 'sk3136537@gmail.com', '8909876545', 'option4', '2023-12-22 17:00:22', '2023-12-22 17:00:22'),
(12, 'fahim', 'sk3136537@gmail.com', '8909876545', 'option4', '2023-12-22 17:02:02', '2023-12-22 17:02:02'),
(13, 'fahim', 'sk3136537@gmail.com', '8909876789', 'option2', '2023-12-22 17:03:03', '2023-12-22 17:03:03'),
(14, 'fahim', 'sk3136537@gmail.com', '8909876545', 'option4', '2023-12-22 17:23:57', '2023-12-22 17:23:57'),
(15, 'fahim', 'sk3136537@gmail.com', '8909876545', 'option4', '2023-12-22 17:53:45', '2023-12-22 17:53:45'),
(16, 'fahim', 'sk3136537@gmail.com', '8909876789', 'option3', '2023-12-22 17:54:54', '2023-12-22 17:54:54'),
(17, 'fahim', 'sk3136537@gmail.com', '8909876789', 'option3', '2023-12-22 17:55:33', '2023-12-22 17:55:33'),
(18, 'fahim', 'sk3136537@gmail.com', '8909876789', 'option3', '2023-12-22 17:56:41', '2023-12-22 17:56:41'),
(19, 'fahim', 'sk3136537@gmail.com', '8909876789', 'option3', '2023-12-22 17:58:15', '2023-12-22 17:58:15'),
(20, 'fahim', 'sk3136537@gmail.com', '8909876789', 'option3', '2023-12-22 17:59:24', '2023-12-22 17:59:24'),
(21, 'fahim', 'sk3136537@gmail.com', '8909876789', 'option3', '2023-12-22 18:00:10', '2023-12-22 18:00:10'),
(22, 'fahim', 'sk3136537@gmail.com', '8909876789', 'option3', '2023-12-22 18:01:02', '2023-12-22 18:01:02'),
(23, 'fahim', 'sk3136537@gmail.com', '8909876789', 'option3', '2023-12-22 18:01:50', '2023-12-22 18:01:50'),
(24, 'fahim', 'sk3136537@gmail.com', '8909876789', 'option3', '2023-12-22 18:02:11', '2023-12-22 18:02:11'),
(25, 'fahim', 'sk3136537@gmail.com', '8909876789', 'option3', '2023-12-22 18:02:30', '2023-12-22 18:02:30'),
(26, 'fahim', 'sk3136537@gmail.com', '8909876789', 'option3', '2023-12-22 18:03:39', '2023-12-22 18:03:39'),
(27, 'fahim', 'sk3136537@gmail.com', '8909876789', 'option3', '2023-12-22 18:04:52', '2023-12-22 18:04:52'),
(28, 'fahim', 'sk3136537@gmail.com', '8909876789', 'option3', '2023-12-22 18:05:25', '2023-12-22 18:05:25'),
(29, 'fahim', 'sk3136537@gmail.com', '8909876789', 'option3', '2023-12-22 18:17:45', '2023-12-22 18:17:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `surname` varchar(250) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `actuarial_assoc` varchar(200) DEFAULT NULL,
  `organization` varchar(200) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `surname`, `member_id`, `actuarial_assoc`, `organization`, `email`, `contact_no`, `status`, `created_at`) VALUES
(1, 'Faheem', 'Shaikh', 23, 'Institute & Faculty of Actuaries', 'IAI', 'sk@gmail.com', '8909877662', 1, '2024-01-10 18:31:52'),
(2, 'sumit', 'patil', 87987, 'Institute & Faculty of Actuaries', 'kjhdfkj', 'jkhj@gmail.com', '87987', 1, '2024-01-11 16:11:37'),
(3, 'jamwal', 'djfkh', 123, 'Institute & Faculty of Actuaries', 'jgdsf', 'hjg@gmail.com', 'dfdfd', 1, '2024-01-11 16:13:33'),
(4, 'larry', 'barretto', 50001, 'Casualty Actuarial Society', 'dfdf', 'larry@actuariesindia.org', '98098765443', 1, '2024-01-11 16:33:56'),
(5, 'rashi', 'patel', 50002, 'Institute & Faculty of Actuaries', 'IAI', 'rashi@actuariesindia.org', '9087890987', 1, '2024-01-11 16:51:41'),
(6, 'Sumit', 'patil', 5003, 'Casualty Actuarial Society', 'ghjdfg', 'sumit@actuariesindia.org', '8909876543', 1, '2024-01-11 17:58:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_submissions`
--

CREATE TABLE `user_submissions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `user_answer` varchar(250) DEFAULT NULL,
  `submission_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_submissions`
--

INSERT INTO `user_submissions` (`id`, `user_id`, `question_id`, `user_answer`, `submission_time`) VALUES
(1, 1, 1, '3', '2024-01-11 09:32:52'),
(2, 1, 2, '2', '2024-01-11 09:32:52'),
(3, 1, 3, '1', '2024-01-11 09:32:52'),
(4, 1, 4, '1', '2024-01-11 09:32:52'),
(5, 1, 5, '3', '2024-01-11 09:32:52'),
(6, 3, 1, '0', '2024-01-11 10:43:47'),
(7, 3, 2, '2', '2024-01-11 10:43:48'),
(8, 3, 3, '3', '2024-01-11 10:43:48'),
(9, 3, 4, '1', '2024-01-11 10:43:48'),
(10, 3, 5, '2', '2024-01-11 10:43:48'),
(11, 4, 1, '1', '2024-01-11 11:12:00'),
(12, 4, 2, '2', '2024-01-11 11:12:00'),
(13, 4, 3, '3', '2024-01-11 11:12:00'),
(14, 4, 4, '2', '2024-01-11 11:12:00'),
(15, 4, 5, '1', '2024-01-11 11:12:00'),
(16, 5, 1, '0', '2024-01-11 11:22:36'),
(17, 5, 2, '0', '2024-01-11 11:22:36'),
(18, 5, 3, '1', '2024-01-11 11:22:36'),
(19, 5, 4, '2', '2024-01-11 11:22:36'),
(20, 5, 5, '2', '2024-01-11 11:22:36'),
(21, 6, 1, '3', '2024-01-11 12:28:56'),
(22, 6, 2, '1', '2024-01-11 12:28:56'),
(23, 6, 3, '0', '2024-01-11 12:28:56'),
(24, 6, 4, '1', '2024-01-11 12:28:56'),
(25, 6, 5, '2', '2024-01-11 12:28:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dislikes`
--
ALTER TABLE `dislikes`
  ADD PRIMARY KEY (`dislike_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `mcq_questions`
--
ALTER TABLE `mcq_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pregcatour`
--
ALTER TABLE `tbl_pregcatour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_submissions`
--
ALTER TABLE `user_submissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dislikes`
--
ALTER TABLE `dislikes`
  MODIFY `dislike_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `mcq_questions`
--
ALTER TABLE `mcq_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_pregcatour`
--
ALTER TABLE `tbl_pregcatour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_submissions`
--
ALTER TABLE `user_submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
