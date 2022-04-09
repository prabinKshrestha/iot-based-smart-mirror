-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 09, 2019 at 06:14 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartmirror`
--

-- --------------------------------------------------------

--
-- Table structure for table `igc_todo`
--

CREATE TABLE `igc_todo` (
  `todo_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `todo_type` int(11) DEFAULT NULL,
  `todo_detail` text NOT NULL,
  `assign_date` varchar(255) NOT NULL,
  `assign_by` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `publish_status` enum('0','1') NOT NULL,
  `delete_status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `igc_users`
--

CREATE TABLE `igc_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date_created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  `last_login` datetime NOT NULL,
  `status` enum('1','0') DEFAULT NULL,
  `permission` enum('0','1') DEFAULT NULL,
  `delete_status` enum('1','0') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `igc_users`
--

INSERT INTO `igc_users` (`user_id`, `username`, `email`, `password`, `date_created`, `updated`, `last_login`, `status`, `permission`, `delete_status`) VALUES
(1, 'dipesh', 'dipesh@gmail.com', '4836ef6544c209a5b6ac0df4d496d0e1', '2019-06-09 21:14:37', NULL, '2019-06-09 21:14:37', '1', '1', '0'),
(2, 'shishir', 'shishir@gmail.com', '7b1fd2d96f079dc3401a3062134ab9cc', '2019-06-09 21:15:04', '2019-06-09 21:15:13', '2019-06-09 21:15:04', '1', '1', '1'),
(3, 'shreekar', 'shreekar@gmail.com', 'b86488e134757fe986404c602c421f9f', '2019-06-08 13:41:40', NULL, '2019-06-08 13:41:40', '1', '1', '0'),
(4, 'prabin', 'prabin2026@gmail.com', 'ad6925e47d7c16db917cb36bd80a640b', '2019-06-08 00:00:00', NULL, '2019-06-08 13:53:52', '1', '0', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `igc_todo`
--
ALTER TABLE `igc_todo`
  ADD PRIMARY KEY (`todo_id`);

--
-- Indexes for table `igc_users`
--
ALTER TABLE `igc_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `igc_todo`
--
ALTER TABLE `igc_todo`
  MODIFY `todo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `igc_users`
--
ALTER TABLE `igc_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
