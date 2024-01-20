-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2024 at 03:08 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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
-- Table structure for table `meme_users`
--

CREATE TABLE `meme_users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `member_id` varchar(50) DEFAULT NULL,
  `actuarial_association` varchar(100) DEFAULT NULL,
  `organisation` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `meme_image_url` varchar(255) DEFAULT NULL,
  `meme_text` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meme_users`
--

INSERT INTO `meme_users` (`id`, `full_name`, `member_id`, `actuarial_association`, `organisation`, `email`, `contact`, `meme_image_url`, `meme_text`, `created_at`, `status`) VALUES
(1, 'faheem', '2', 'Institute of Actuaries of India', 'iai', 'faheem@actuariesindia.org', '85201236988', 'uploads/memes/logo.jpg', NULL, '2024-01-18 19:49:19', 1),
(2, 'faheem', '2', 'Institute of Actuaries of India', 'iai', 'faheem@actuariesindia.org', '85201236988', 'uploads/memes/logo.jpg', NULL, '2024-01-18 19:50:51', 1),
(3, 'faheem', '2323', 'Institute of Actuaries of India', 'iai', 'sk3136537@gmail.com', '85214785698', NULL, 'okokookokkokk', '2024-01-18 20:11:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `meme_votes`
--

CREATE TABLE `meme_votes` (
  `id` int(11) NOT NULL,
  `user_ip` varchar(250) DEFAULT NULL,
  `meme_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `speakers`
--

CREATE TABLE `speakers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `salutation` varchar(10) DEFAULT NULL,
  `type` enum('VIP','NON VIP') DEFAULT NULL,
  `status` int(20) DEFAULT 1,
  `order_number` int(11) DEFAULT NULL,
  `url_slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `speakers`
--

INSERT INTO `speakers` (`id`, `name`, `designation`, `bio`, `linkedin`, `profile_image`, `salutation`, `type`, `status`, `order_number`, `url_slug`) VALUES
(2, 'Debasish Panda', 'Chairperson<br>Insurance Regulatory and Development Authority of India', '<p>Mr. Debasish Panda, Chairman at the Insurance Regulatory and Development Authority of India (IRDAI) is an officer of the Indian Administrative Services from the 1987 batch of the Uttar Pradesh cadre. He hails from the state of Odisha.</p>\\r\\n\\r\\n<p>Mr. Panda holds a postgraduate degree in Physics and has also completed a Master&#39;s in Developmental Management. Additionally, he holds an M. Phil degree in Environmental Sciences and has undergone foreign training programs in Public Administration in the United States and the Philippines.</p>\\r\\n\\r\\n<p>He has held various important positions within the Government of India, including Secretary in Department of Financial Services in the Ministry of Finance, Joint Secretary in the Ministry of Health &amp; Family Welfare beside a stint in the Ministry of Commerce. He has also been the District Magistrate and Collector of the districts of Tehri-Garhwal, Uttarkashi, Deoria and Gaziabad in Uttar Pradesh. He was also the Principal Secretary &ndash; Agriculture &amp; cooperation and Home affairs. He also held the position of CEO of the Greater Noida Industrial Development Authority.</p>\\r\\n\\r\\n<p>He has rich experience in the sectors of Rural Development, Public Works, Urban Development, Agriculture and Cooperation, Home Affairs, Commerce, Health and Financial Services etc.</p>\\r\\n\\r\\n<p>Additional information:</p>\\r\\n\\r\\n<p>He is known for his approach for bringing in reforms and transforming / significant changes &ndash; with the help of technology.</p>\\r\\n\\r\\n<p>Mr. Panda&#39;s impressive career includes pioneering the Dial 112 &ndash; Police Emergency Response System, a game-changing initiative that saved lives during emergencies. His contributions extended to enhancing law enforcement efficiency as the Principal Secretary, Department of Home, Government of Uttar Pradesh.</p>\\r\\n\\r\\n<p>Since taking up his role at IRDAI, Mr. Panda has initiated a comprehensive reform agenda with the overarching goal of achieving &quot;Insurance for all&quot; by 2047. His visionary leadership has brought about ease of doing business, operational ease and flexibility, reduction in compliance burden and costs in the insurance sector thereby fostering a more inclusive and accessible insurance landscape. He has adopted a customer centric approach keeping the interests of policyholders at the forefront. He is credited, and rightfully so, for bringing in progressive, supportive, facilitative and a forward looking regulatory architecture in insurance sector.</p>\\r\\n\\r\\n<p>Mr. Panda&#39;s relentless efforts and forward-thinking approach have undeniably eased the lives of the common man and exemplify his dedication towards welfare of public interests, leading to the growth and development of the nation as a whole.</p>\\r\\n', '', 'Shri Debasish Panda.png', 'Shri', 'VIP', 1, 2, 'debasish-panda'),
(4, 'CHARLES COWLING', 'President', '<p>Charles is the President of the International Actuarial Association. He has helped to lead on many of their initiatives and key projects, including partnering with a number of other supranational organisations. He is currently helping to lead the IAA&rsquo;s work around AI and the role of the actuary of the future. Charles is also the Chief Actuary of Mercer in the UK. He has acted as principal actuarial adviser to several multinational companies and their pension schemes and has advised on global de-risking projects.</p>\\r\\n\\r\\n<p>Charles has pioneered the use of modern corporate finance techniques in actuarial work and was Chairman of the Institute and Faculty of Actuaries&rsquo; (IFoA&rsquo;s) Discount Rate Steering Committee which led the UK Profession&#39;s research into the use of discount rates in actuarial work. He is a member of the Council of the IFoA and has chaired their Pensions Board and their International Board. Charles is the author of a number of research papers and a regular speaker at conferences around the world.</p>\\r\\n\\r\\n<p>Charles is a Fellow of the Institute of Actuaries. He has a BSc from Durham University and he is also a Chartered Mathematician, a Chartered Scientist and a Fellow of the Institute of Mathematics and its Applications. &nbsp;He is also a recently ordained minister in the Church of England.</p>\\r\\n', '', 'charles.png', 'Mr', 'NON VIP', 1, 4, 'charles-cowling');

--
-- Triggers `speakers`
--
DELIMITER $$
CREATE TRIGGER `update_order_number` BEFORE INSERT ON `speakers` FOR EACH ROW BEGIN
    -- Set the order_number column with the value from the auto-incremented id column
    SET NEW.order_number = (SELECT AUTO_INCREMENT FROM information_schema.tables WHERE table_name = 'speakers' AND table_schema = DATABASE());
END
$$
DELIMITER ;

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
(1, 'faheem', 'kjdhf', 0, 'Institute & Faculty of Actuaries', 'iai', 'djkfa@gmail.com', '9076543212', 1, '2024-01-12 16:14:37'),
(2, 'faheem', 'djhfjk', 15, 'Institute of Actuaries of India', 'jdhfkj', 'jfhjdhfjk@gmail.com', '9887777727', 1, '2024-01-12 16:26:22'),
(3, 'sdjfjhskfh', 'kjhjkh', 16, 'Institute of Actuaries of India', 'hghjg', 'hjgjhghj@gmail.com', '9876543213', 1, '2024-01-12 16:27:29');

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
-- Indexes for dumped tables
--

--
-- Indexes for table `mcq_questions`
--
ALTER TABLE `mcq_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meme_users`
--
ALTER TABLE `meme_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meme_votes`
--
ALTER TABLE `meme_votes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `speakers`
--
ALTER TABLE `speakers`
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
-- AUTO_INCREMENT for table `mcq_questions`
--
ALTER TABLE `mcq_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `meme_users`
--
ALTER TABLE `meme_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `meme_votes`
--
ALTER TABLE `meme_votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `speakers`
--
ALTER TABLE `speakers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pregcatour`
--
ALTER TABLE `tbl_pregcatour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_submissions`
--
ALTER TABLE `user_submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
