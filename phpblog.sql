-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 22, 2023 at 11:40 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(11) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `admin_email`, `admin_password`, `admin_name`) VALUES
(1, 'admin@gmail.com', '1111', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_des` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_des`) VALUES
(1, 'Php', 'aaa'),
(2, 'Node.js', 'Amet ut provident '),
(3, 'Laravel', 'Amet ut provident ');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_content` text DEFAULT NULL,
  `post_img` varchar(255) DEFAULT NULL,
  `post_ctg` int(11) DEFAULT NULL,
  `post_author` varchar(255) DEFAULT NULL,
  `post_date` datetime DEFAULT NULL,
  `post_comment_count` int(11) DEFAULT NULL,
  `post_summery` text DEFAULT NULL,
  `post_tag` varchar(255) DEFAULT NULL,
  `post_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_content`, `post_img`, `post_ctg`, `post_author`, `post_date`, `post_comment_count`, `post_summery`, `post_tag`, `post_status`) VALUES
(1, 'a', 'aaa', 'as', 1, 'dsf', '2023-09-11 11:47:56', NULL, 'a', 'aa', 1),
(2, 'Rerum qui sed et omn', 'Et ut perferendis id', '', 2, 'Admin', '2023-09-21 16:28:33', 3, 'Alias quam quibusdam', 'Suscipit sunt sit v', 1),
(3, 'Rerum qui sed et omn', 'Et ut perferendis id', '', 2, 'Admin', '2023-09-21 16:28:56', 3, 'Alias quam quibusdam', 'Suscipit sunt sit v', 1),
(4, 'laravel', 'Vero incidunt nisi ', 'test.jpg', 3, 'Admin', '2023-09-21 17:37:17', 3, 'Dolor aperiam tenetu', 'Sequi et nostrud opt', 1),
(5, 'Alias et in nulla co', 'Sequi voluptas ut do', 'photo_2023-03-18_16-54-50.jpg', 2, 'Admin', '2023-09-22 15:09:48', 3, 'Culpa possimus iur', 'Autem laudantium et', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `post_with_ctg`
-- (See below for the actual view)
--
CREATE TABLE `post_with_ctg` (
`post_title` varchar(255)
,`post_content` text
,`post_img` varchar(255)
,`post_author` varchar(255)
,`post_date` datetime
,`post_comment_count` int(11)
,`post_summery` text
,`post_tag` varchar(255)
,`post_status` int(11)
,`cat_id` int(11)
,`cat_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `post_with_ctg`
--
DROP TABLE IF EXISTS `post_with_ctg`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `post_with_ctg`  AS SELECT `posts`.`post_title` AS `post_title`, `posts`.`post_content` AS `post_content`, `posts`.`post_img` AS `post_img`, `posts`.`post_author` AS `post_author`, `posts`.`post_date` AS `post_date`, `posts`.`post_comment_count` AS `post_comment_count`, `posts`.`post_summery` AS `post_summery`, `posts`.`post_tag` AS `post_tag`, `posts`.`post_status` AS `post_status`, `category`.`cat_id` AS `cat_id`, `category`.`cat_name` AS `cat_name` FROM (`posts` join `category` on(`posts`.`post_ctg` * `category`.`cat_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
