-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2023 at 03:16 AM
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
-- Database: `swproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments-post`
--

CREATE TABLE `comments-post` (
  `ID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `PostID` int(11) NOT NULL,
  `Comment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments-reels`
--

CREATE TABLE `comments-reels` (
  `ID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `ReelsID` int(11) NOT NULL,
  `Comment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `followinglist`
--

CREATE TABLE `followinglist` (
  `username` varchar(50) NOT NULL,
  `following` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes-post`
--

CREATE TABLE `likes-post` (
  `PostID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes-reels`
--

CREATE TABLE `likes-reels` (
  `ReelsID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes-story`
--

CREATE TABLE `likes-story` (
  `StoryID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `username` varchar(50) NOT NULL,
  `ID` int(11) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `TimeOfPost` time NOT NULL DEFAULT current_timestamp(),
  `UploadedMedia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reels`
--

CREATE TABLE `reels` (
  `ID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `UploadedMedia` varchar(50) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `CreationDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE `story` (
  `username` varchar(50) NOT NULL,
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `UploadedMedia` varchar(50) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Creation Date` date NOT NULL DEFAULT current_timestamp(),
  `ProfilePic` varchar(50) NOT NULL,
  `Bio` varchar(50) NOT NULL,
  `Following` int(11) NOT NULL,
  `Follower` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments-post`
--
ALTER TABLE `comments-post`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `comment-postid` (`PostID`),
  ADD KEY `comment/post-username` (`username`);

--
-- Indexes for table `comments-reels`
--
ALTER TABLE `comments-reels`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `comment/reels-username` (`username`),
  ADD KEY `comment/reels-reelsID` (`ReelsID`);

--
-- Indexes for table `followinglist`
--
ALTER TABLE `followinglist`
  ADD PRIMARY KEY (`username`,`following`);

--
-- Indexes for table `likes-post`
--
ALTER TABLE `likes-post`
  ADD KEY `likes/post-postID` (`PostID`),
  ADD KEY `likes/post-username` (`username`);

--
-- Indexes for table `likes-reels`
--
ALTER TABLE `likes-reels`
  ADD KEY `likes/reels-postID` (`ReelsID`),
  ADD KEY `likes/reels-username` (`username`);

--
-- Indexes for table `likes-story`
--
ALTER TABLE `likes-story`
  ADD KEY `likes/story-username` (`username`),
  ADD KEY `likes/story-storyID` (`StoryID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `username-post` (`username`);

--
-- Indexes for table `reels`
--
ALTER TABLE `reels`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `username-reels` (`username`);

--
-- Indexes for table `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `username-story` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments-post`
--
ALTER TABLE `comments-post`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments-reels`
--
ALTER TABLE `comments-reels`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reels`
--
ALTER TABLE `reels`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `story`
--
ALTER TABLE `story`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments-post`
--
ALTER TABLE `comments-post`
  ADD CONSTRAINT `comment-postid` FOREIGN KEY (`PostID`) REFERENCES `post` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment/post-username` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments-reels`
--
ALTER TABLE `comments-reels`
  ADD CONSTRAINT `comment/reels-reelsID` FOREIGN KEY (`ReelsID`) REFERENCES `reels` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment/reels-username` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `followinglist`
--
ALTER TABLE `followinglist`
  ADD CONSTRAINT `following-username` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes-post`
--
ALTER TABLE `likes-post`
  ADD CONSTRAINT `likes/post-postID` FOREIGN KEY (`PostID`) REFERENCES `post` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes/post-username` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes-reels`
--
ALTER TABLE `likes-reels`
  ADD CONSTRAINT `likes/reels-postID` FOREIGN KEY (`ReelsID`) REFERENCES `reels` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes/reels-username` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes-story`
--
ALTER TABLE `likes-story`
  ADD CONSTRAINT `likes/story-storyID` FOREIGN KEY (`StoryID`) REFERENCES `story` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes/story-username` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `username-post` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reels`
--
ALTER TABLE `reels`
  ADD CONSTRAINT `username-reels` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `story`
--
ALTER TABLE `story`
  ADD CONSTRAINT `username-story` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
