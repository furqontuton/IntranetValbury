-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2024 at 08:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inchat_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) NOT NULL,
  `msgid` varchar(60) NOT NULL,
  `sender` bigint(20) NOT NULL,
  `receiver` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `files` text NOT NULL,
  `date` datetime NOT NULL,
  `seen` int(11) NOT NULL DEFAULT 0,
  `received` int(11) NOT NULL DEFAULT 0,
  `deleted_sender` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_receiver` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `msgid`, `sender`, `receiver`, `message`, `files`, `date`, `seen`, `received`, `deleted_sender`, `deleted_receiver`) VALUES
(1, 'y1dkcDtHCB61BWNzORY1a7G6kGrCSxn7Yl33phNZr1IAVfNncUAmS', 35252, 50254522144544, 'test', '', '2024-07-01 11:45:20', 0, 0, 0, 0),
(2, 'y1dkcDtHCB61BWNzORY1a7G6kGrCSxn7Yl33phNZr1IAVfNncUAmS', 35252, 50254522144544, 'asdas', '', '2024-07-01 11:45:42', 0, 0, 0, 0),
(3, 'y1dkcDtHCB61BWNzORY1a7G6kGrCSxn7Yl33phNZr1IAVfNncUAmS', 35252, 50254522144544, 'gag', '', '2024-07-01 11:45:44', 0, 0, 0, 0),
(4, 'y1dkcDtHCB61BWNzORY1a7G6kGrCSxn7Yl33phNZr1IAVfNncUAmS', 35252, 50254522144544, 'agag', '', '2024-07-01 11:45:47', 0, 0, 0, 0),
(5, 'y1dkcDtHCB61BWNzORY1a7G6kGrCSxn7Yl33phNZr1IAVfNncUAmS', 35252, 50254522144544, 'asfjg', '', '2024-07-01 11:45:49', 0, 0, 0, 0),
(6, 'pFGJhJJk8US', 35252, 253040502300232405, 'ters', '', '2024-07-01 11:45:56', 0, 0, 0, 0),
(7, 'pFGJhJJk8US', 35252, 253040502300232405, 'asfa', '', '2024-07-01 11:45:57', 0, 0, 0, 0),
(8, 'pFGJhJJk8US', 35252, 253040502300232405, 'asfafg', '', '2024-07-02 02:18:00', 0, 0, 0, 0),
(9, 'pFGJhJJk8US', 35252, 253040502300232405, 'asfafg', '', '2024-07-02 02:18:00', 0, 0, 0, 0),
(10, 'pFGJhJJk8US', 35252, 253040502300232405, 'ubtv', '', '2024-07-02 02:18:04', 0, 0, 0, 0),
(11, 'pFGJhJJk8US', 35252, 253040502300232405, 'yhbyu', '', '2024-07-02 02:18:08', 0, 0, 0, 0),
(12, '0DvFlUaQr3Av12zDUa5Wdar7b608kBOKUAnboK4ZwwSTL6DTwXhLY', 35252, 41545443441305, 'jhhfgfg', '', '2024-07-02 02:18:19', 0, 0, 0, 0),
(13, '0DvFlUaQr3Av12zDUa5Wdar7b608kBOKUAnboK4ZwwSTL6DTwXhLY', 35252, 41545443441305, 'jhhfgfg', '', '2024-07-02 02:44:07', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(5) NOT NULL,
  `userid` bigint(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `password` varchar(64) NOT NULL,
  `image` varchar(500) NOT NULL,
  `date` datetime NOT NULL,
  `online` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `username`, `email`, `gender`, `password`, `image`, `date`, `online`) VALUES
(1, 35252, 'furqon', 'furqon.aryulis@kbvalbury.com', 'Male', '12345678', 'uploads/User3.png', '2024-05-28 08:40:32', 0),
(2, 41545443441305, 'si yoga', 'yoga@kbvalbury.com', 'Female', '12345678', 'uploads/user5.jpeg', '2024-05-28 08:44:10', 0),
(3, 253040502300232405, 'rangga', 'rangga@kbvalbury.com', 'Male', '12345678', '', '2024-05-28 08:53:35', 0),
(4, 322431531525151454, 'muthi', 'muthi@kbvalbury.com', 'Female', '12345678', 'uploads/User4.jpg', '2024-05-28 08:53:57', 0),
(5, 50254522144544, 'shinta', 'shinta.radianti@kbvalbury.com', 'Female', '12345678', 'uploads/Male.png', '2024-06-10 10:41:12', 0),
(6, 42442, 'pak joko', 'reiner.theobastian@kbvalbury.com', 'Female', '12345678', '', '2024-06-12 04:26:16', 0),
(7, 2143000240432405443, 'richwepe', 'richard.willyputra@kbvalbury.com', 'Male', '1234qweR', 'uploads/WhatsApp Image 2024-06-19 at 13.46.00.jpeg', '2024-06-20 03:06:07', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender` (`sender`),
  ADD KEY `receiver` (`receiver`),
  ADD KEY `date` (`date`),
  ADD KEY `deleted_sender` (`deleted_sender`),
  ADD KEY `deleted_receiver` (`deleted_receiver`),
  ADD KEY `seen` (`seen`),
  ADD KEY `msgid` (`msgid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`),
  ADD KEY `date` (`date`),
  ADD KEY `online` (`online`),
  ADD KEY `gender` (`gender`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
