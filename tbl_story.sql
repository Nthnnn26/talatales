-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2024 at 09:19 AM
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
-- Database: `talatales`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_story`
--

CREATE TABLE `tbl_story` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `favorite` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_story`
--

INSERT INTO `tbl_story` (`id`, `user_id`, `category`, `favorite`, `title`, `author`, `image`, `about`) VALUES
(995, 999, 'fairy-tale', 'heart.png', 'The Doe in the Forest', 'Jack n\' Jill', 'story-2.png', 'PLACEHOLDER PLACEHOLDER PLACEHOLDER PLACEHOLDER\r\nPLACEHOLDER PLACEHOLDER PLACEHOLDER PLACEHOLDER\r\nPLACEHOLDER PLACEHOLDER PLACEHOLDER PLACEHOLDER'),
(996, 999, 'fable', 'heart.png', 'Story time stars', 'Michelle Obama', 'story-1.png', 'PLACEHOLDER PLACEHOLDER PLACEHOLDER PLACEHOLDER PLACEHOLDER PLACEHOLDER PLACEHOLDER PLACEHOLDER\r\nPLACEHOLDER PLACEHOLDER PLACEHOLDER PLACEHOLDER'),
(997, 999, 'adventure', 'heart.png', 'The Turle', 'Aesophe J', 'story-1.png', 'PLACEHOLDER PLACEHOLDER PLACEHOLDER PLACEHOLDER\r\nPLACEHOLDER PLACEHOLDER PLACEHOLDER PLACEHOLDER\r\nPLACEHOLDER PLACEHOLDER PLACEHOLDER PLACEHOLDER'),
(998, 999, 'fantasy', 'heart.png', 'The cat and Snarl', 'Tom n Jerry', 'story-3.png', 'PLACEHOLDER PLACEHOLDER PLACEHOLDER PLACEHOLDER\r\nPLACEHOLDER PLACEHOLDER PLACEHOLDER PLACEHOLDER\r\nPLACEHOLDER PLACEHOLDER PLACEHOLDER PLACEHOLDER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_story`
--
ALTER TABLE `tbl_story`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_story`
--
ALTER TABLE `tbl_story`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=999;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
