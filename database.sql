-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 14, 2018 at 05:44 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `artworkio`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(0, 'meto', 'meto'),
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `art`
--

CREATE TABLE `art` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `artistid` int(11) DEFAULT NULL,
  `typeid` int(11) DEFAULT NULL,
  `create_atid` int(11) DEFAULT NULL,
  `show_atid` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `imagePath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `art`
--

INSERT INTO `art` (`id`, `name`, `artistid`, `typeid`, `create_atid`, `show_atid`, `category_id`, `imagePath`) VALUES
(1, '', 1, 1, 1, 1, 2, 'images/r1.jpg'),
(2, '', 2, 2, 2, 2, 3, 'images/r2.jpg'),
(3, '', 3, 2, 3, 3, 1, 'images/r3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `first_name` varchar(40) DEFAULT NULL,
  `surname` varchar(40) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `nation` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id`, `first_name`, `surname`, `birthday`, `nation`) VALUES
(1, 'J. C.', ' Dahl', '1788-02-24', 'Norvec'),
(2, 'Salvador', ' Dali', '1904-01-23', 'Ispanya'),
(3, 'Michelangelo', ' ', '1483-01-01', 'Italya');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Heykel'),
(2, 'Resim'),
(3, 'Seramik'),
(5, 'metin');

-- --------------------------------------------------------

--
-- Table structure for table `create_at`
--

CREATE TABLE `create_at` (
  `id` int(11) NOT NULL,
  `create_date` decimal(2,0) DEFAULT NULL,
  `create_month` decimal(2,0) DEFAULT NULL,
  `create_year` decimal(4,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `create_at`
--

INSERT INTO `create_at` (`id`, `create_date`, `create_month`, `create_year`) VALUES
(1, '1', '1', '1826'),
(2, '1', '1', '1931'),
(3, '1', '1', '1501'),
(4, '5', '3', '1995'),
(5, '3', '5', '1995');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `id` int(11) NOT NULL,
  `scores` float DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `art_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`id`, `scores`, `user_id`, `art_id`) VALUES
(103, 0, 9, 1),
(104, 0, 9, 2),
(105, 0, 9, 3),
(106, 3, 10, 1),
(107, 1, 10, 2),
(108, 3, 10, 3),
(109, 4, 11, 1),
(110, 2, 11, 2),
(111, 5, 11, 3);

-- --------------------------------------------------------

--
-- Table structure for table `show_at`
--

CREATE TABLE `show_at` (
  `id` int(11) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `nation` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `show_at`
--

INSERT INTO `show_at` (`id`, `name`, `nation`) VALUES
(1, 'Frankfurt am Main', 'Almanya'),
(2, 'Barcelona Museum Of Dali', 'Ispanya'),
(3, 'Palazzo Vecchio', 'Italya'),
(4, 'mememem', 'osman');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `title` varchar(80) DEFAULT NULL,
  `start_year` decimal(4,0) DEFAULT NULL,
  `end_year` decimal(4,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `title`, `start_year`, `end_year`) VALUES
(1, 'romantizm', '1810', '1850'),
(2, 'naturalizm', '1890', '1923'),
(3, 'realizm', '1830', '1870'),
(4, 'empresyonizm', '1877', '1950'),
(5, 'postempresyonizm', '1839', '1906'),
(7, 'meememememem', '1995', '2018'),
(8, 'metin', '2018', '2018');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(40) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `trn_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `email`, `password`, `trn_date`) VALUES
(1, 'okyanus', '', 'okyanus', '0000-00-00 00:00:00'),
(2, 'oki', 'oki@a', 'e210b2d4726eb89e951f1952be84c02f', '2018-05-12 14:29:31'),
(3, 'ali', 'ali@we', '86318e52f5ed4801abe1d13d509443de', '2018-05-12 15:15:41'),
(4, 'tutu', 'tutu@i', 'bdb8c008fa551ba75f8481963f2201da', '2018-05-12 18:10:49'),
(5, 'yuki', 'yuki@i', '8b72529ec356bfa60828b4da6c2cc610', '2018-05-13 07:56:55'),
(6, 'yuyu', 'yuyu@y', 'f34d07b202eaeadf913468e95d7fcb86', '2018-05-13 08:28:13'),
(7, 'huhu', 'huhu@h', 'f3c2cefc1f3b082a56f52902484ca511', '2018-05-13 08:39:52'),
(8, 'yuoy', 'yuoy@y', 'bee7f3df8cc396c2b8dfe2d2c7d78c65', '2018-05-13 08:41:43'),
(9, 'yuoy', 'yuoy@y', 'bee7f3df8cc396c2b8dfe2d2c7d78c65', '2018-05-13 08:42:32'),
(10, 'yuoy2', 'yuoy@y', 'c6146cd64f6890ee70953b5ae774d74c', '2018-05-13 08:42:40'),
(11, 'tuan', 'tuan@2', 'd6b8cc42803ea100735c719f1d7f5e11', '2018-05-13 09:06:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `art`
--
ALTER TABLE `art`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artistid` (`artistid`),
  ADD KEY `typeid` (`typeid`),
  ADD KEY `create_atid` (`create_atid`),
  ADD KEY `show_atid` (`show_atid`),
  ADD KEY `art_ibfk_5` (`category_id`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `create_at`
--
ALTER TABLE `create_at`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `art_id` (`art_id`);

--
-- Indexes for table `show_at`
--
ALTER TABLE `show_at`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `art`
--
ALTER TABLE `art`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `create_at`
--
ALTER TABLE `create_at`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `show_at`
--
ALTER TABLE `show_at`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `art`
--
ALTER TABLE `art`
  ADD CONSTRAINT `art_ibfk_1` FOREIGN KEY (`artistid`) REFERENCES `artist` (`id`),
  ADD CONSTRAINT `art_ibfk_2` FOREIGN KEY (`typeid`) REFERENCES `type` (`id`),
  ADD CONSTRAINT `art_ibfk_3` FOREIGN KEY (`create_atid`) REFERENCES `create_at` (`id`),
  ADD CONSTRAINT `art_ibfk_4` FOREIGN KEY (`show_atid`) REFERENCES `show_at` (`id`),
  ADD CONSTRAINT `art_ibfk_5` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_ibfk_2` FOREIGN KEY (`art_id`) REFERENCES `art` (`id`),
  ADD CONSTRAINT `score_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

