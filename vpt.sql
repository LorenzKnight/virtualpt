-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 17, 2019 at 07:42 AM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vpt`
--

-- --------------------------------------------------------

--
-- Table structure for table `programs_request`
--

CREATE TABLE `programs_request` (
  `id` int(11) NOT NULL,
  `case_no` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pt_id` int(11) NOT NULL,
  `usr_current_weight` double(8,2) NOT NULL,
  `usr_current_height` double(8,2) NOT NULL,
  `usr_desired_weight` double(8,2) NOT NULL,
  `usr_desired_height` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id_request` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `day` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `usr_height` double(8,2) DEFAULT NULL,
  `usr_weight` double(8,2) DEFAULT NULL,
  `usr_biceps` double(8,2) DEFAULT NULL,
  `usr_chest` double(8,2) DEFAULT NULL,
  `usr_waist` double(8,2) DEFAULT NULL,
  `usr_hips` double(8,2) DEFAULT NULL,
  `usr_thigh` double(8,2) DEFAULT NULL,
  `usr_fat` double(8,2) DEFAULT NULL,
  `usr_weight_goal` double(8,2) DEFAULT NULL,
  `usr_biceps_goal` double(8,2) DEFAULT NULL,
  `usr_chest_goal` double(8,2) DEFAULT NULL,
  `usr_waist_goal` double(8,2) DEFAULT NULL,
  `usr_hips_goal` double(8,2) DEFAULT NULL,
  `usr_thigh_goal` double(8,2) DEFAULT NULL,
  `usr_fat_goal` double(8,2) DEFAULT NULL,
  `id_pt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id_request`, `id_user`, `date`, `day`, `month`, `year`, `time`, `usr_height`, `usr_weight`, `usr_biceps`, `usr_chest`, `usr_waist`, `usr_hips`, `usr_thigh`, `usr_fat`, `usr_weight_goal`, `usr_biceps_goal`, `usr_chest_goal`, `usr_waist_goal`, `usr_hips_goal`, `usr_thigh_goal`, `usr_fat_goal`, `id_pt`) VALUES
(1, 13, '2019-07-14 15:09:01', '14', '7', '2019', '15:09:01', 78.00, 79.00, 15.00, 40.00, 45.00, 55.00, 30.00, 15.00, 80.00, 17.00, 50.00, 50.00, 60.00, 40.00, 10.00, 4),
(2, 13, '2019-07-16 15:40:55', '16', '7', '2019', '15:40:55', 78.00, 79.00, 15.00, 40.00, 45.00, 55.00, 30.00, 15.00, 80.00, 17.00, 50.00, 50.00, 60.00, 40.00, 10.00, 4),
(3, 13, '2019-07-19 13:18:55', '19', '7', '2019', '13:18:55', 78.00, 79.00, 15.00, 40.00, 45.00, 55.00, 30.00, 15.00, 100.00, 18.00, 60.00, 55.00, 75.00, 50.00, 5.00, 0),
(4, 13, '2019-07-22 11:06:29', '22', '7', '2019', '11:06:29', 78.00, 79.00, 15.00, 40.00, 45.00, 55.00, 30.00, 15.00, 100.00, 18.00, 50.00, 55.00, 60.00, 50.00, 5.00, 3),
(5, 13, '2019-07-22 11:19:34', '22', '7', '2019', '11:19:34', 78.00, 79.00, 15.00, 40.00, 45.00, 55.00, 30.00, 15.00, 100.00, 18.00, 50.00, 55.00, 60.00, 50.00, 5.00, 0),
(6, 13, '2019-07-22 11:27:50', '22', '7', '2019', '11:27:50', 78.00, 79.00, 15.00, 40.00, 45.00, 55.00, 30.00, 15.00, 30.00, 20.00, 60.00, 40.00, 50.00, 60.00, 0.00, 4),
(7, 13, '2019-08-01 15:25:28', '1', '8', '2019', '15:25:28', 78.00, 79.00, 15.00, 40.00, 45.00, 55.00, 30.00, 15.00, 80.00, 18.00, 50.00, 50.00, 60.00, 40.00, 10.00, 4);

-- --------------------------------------------------------

--
-- Table structure for table `routines`
--

CREATE TABLE `routines` (
  `id_routines` int(11) NOT NULL,
  `r_name` varchar(255) DEFAULT NULL,
  `r_description` text,
  `r_category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `id_training` int(11) NOT NULL,
  `given_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `name` varchar(15) DEFAULT NULL,
  `surname` varchar(15) DEFAULT NULL,
  `profilephoto` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `pt_type` int(11) DEFAULT NULL,
  `pt_experience` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `status`, `name`, `surname`, `profilephoto`, `year`, `month`, `day`, `country`, `city`, `rank`, `pt_type`, `pt_experience`) VALUES
(1, 'joellorenzo.k@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Johan', 'Persson', NULL, 0, '', 0, '', '', 2, 1, 0),
(2, 'joel@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Joel', 'Knight', NULL, 0, '', 0, '', '', 2, 1, 0),
(3, 'ramon@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Ramon', 'Ramos', NULL, 0, '', 0, '', '', 2, 1, 0),
(4, 'julio@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Julio', 'Santana', NULL, 0, '', 0, '', '', 2, 1, 0),
(5, 'ronie@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Ronie', 'Svensson', NULL, 1990, 'April', 4, 'Sweden', 'Gothenburg', 3, NULL, NULL),
(6, 'joel@mail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Joel', 'Knight', NULL, 1984, 'September', 3, NULL, NULL, 5, NULL, NULL),
(13, 'r_typ3@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Lorenz', 'Knight', NULL, 1990, 'April', 4, NULL, NULL, 5, NULL, NULL),
(14, 'r_typ4@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usr_current_status`
--

CREATE TABLE `usr_current_status` (
  `id_current_status` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `usr_weight` double(8,2) DEFAULT NULL,
  `usr_height` double(8,2) DEFAULT NULL,
  `usr_biceps` double(8,2) DEFAULT NULL,
  `usr_chest` double(8,2) DEFAULT NULL,
  `usr_waist` double(8,2) DEFAULT NULL,
  `usr_hips` double(8,2) DEFAULT NULL,
  `usr_thigh` double(8,2) DEFAULT NULL,
  `usr_fat` double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usr_current_status`
--

INSERT INTO `usr_current_status` (`id_current_status`, `id_user`, `usr_weight`, `usr_height`, `usr_biceps`, `usr_chest`, `usr_waist`, `usr_hips`, `usr_thigh`, `usr_fat`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 13, 79.00, 78.00, 15.00, 40.00, 45.00, 55.00, 30.00, 15.00);

-- --------------------------------------------------------

--
-- Table structure for table `usr_goals`
--

CREATE TABLE `usr_goals` (
  `id_goals` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `day` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `usr_weight_goal` double(8,2) DEFAULT NULL,
  `usr_biceps_goal` double(8,2) DEFAULT NULL,
  `usr_chest_goal` double(8,2) DEFAULT NULL,
  `usr_waist_goal` double(8,2) DEFAULT NULL,
  `usr_hips_goal` double(8,2) DEFAULT NULL,
  `usr_thigh_goal` double(8,2) DEFAULT NULL,
  `usr_fat_goal` double(8,2) DEFAULT NULL,
  `id_pt` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usr_goals`
--

INSERT INTO `usr_goals` (`id_goals`, `id_user`, `date`, `day`, `month`, `year`, `time`, `usr_weight_goal`, `usr_biceps_goal`, `usr_chest_goal`, `usr_waist_goal`, `usr_hips_goal`, `usr_thigh_goal`, `usr_fat_goal`, `id_pt`) VALUES
(2, 13, '2019-07-12 15:20:15', '12', '7', '2019', '15:20:15', 80.00, 17.00, 50.00, 50.00, 60.00, 40.00, 10.00, NULL),
(3, 13, '2019-07-12 15:25:40', '12', '7', '2019', '15:25:40', 80.00, 17.00, 50.00, 50.00, 60.00, 40.00, 10.00, NULL),
(4, 13, '2019-07-12 15:27:07', '12', '7', '2019', '15:27:07', 80.00, 17.00, 50.00, 50.00, 60.00, 40.00, 10.00, 100),
(5, 13, '2019-07-14 15:06:25', '14', '7', '2019', '15:06:25', 80.00, 17.00, 50.00, 50.00, 60.00, 40.00, 10.00, 100),
(6, 13, '2019-07-14 15:06:32', '14', '7', '2019', '15:06:32', 80.00, 17.00, 50.00, 50.00, 60.00, 40.00, 10.00, 100),
(7, 13, '2019-07-19 13:18:38', '19', '7', '2019', '13:18:38', 100.00, 18.00, 60.00, 55.00, 75.00, 50.00, 5.00, 0),
(8, 13, '2019-07-22 11:02:22', '22', '7', '2019', '11:02:22', 100.00, 18.00, 50.00, 55.00, 60.00, 50.00, 5.00, 3),
(9, 13, '2019-07-22 11:07:17', '22', '7', '2019', '11:07:17', 100.00, 18.00, 50.00, 55.00, 60.00, 50.00, 5.00, 0),
(10, 13, '2019-07-22 11:27:23', '22', '7', '2019', '11:27:23', 30.00, 20.00, 60.00, 40.00, 50.00, 60.00, 0.00, 4),
(11, NULL, '2019-07-27 12:32:42', '27', '7', '2019', '12:32:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(12, NULL, '2019-07-27 12:33:00', '27', '7', '2019', '12:33:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(13, NULL, '2019-07-27 12:33:09', '27', '7', '2019', '12:33:09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(14, 13, '2019-08-01 15:25:15', '1', '8', '2019', '15:25:15', 80.00, 18.00, 50.00, 50.00, 60.00, 40.00, 10.00, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `programs_request`
--
ALTER TABLE `programs_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id_request`);

--
-- Indexes for table `routines`
--
ALTER TABLE `routines`
  ADD PRIMARY KEY (`id_routines`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id_training`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `usr_current_status`
--
ALTER TABLE `usr_current_status`
  ADD PRIMARY KEY (`id_current_status`);

--
-- Indexes for table `usr_goals`
--
ALTER TABLE `usr_goals`
  ADD PRIMARY KEY (`id_goals`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `programs_request`
--
ALTER TABLE `programs_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `routines`
--
ALTER TABLE `routines`
  MODIFY `id_routines` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `id_training` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `usr_current_status`
--
ALTER TABLE `usr_current_status`
  MODIFY `id_current_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usr_goals`
--
ALTER TABLE `usr_goals`
  MODIFY `id_goals` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
