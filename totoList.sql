-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 18, 2021 at 08:10 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `totoList`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `home`
-- (See below for the actual view)
--
CREATE TABLE `home` (
  `id` int(11),
  `title` varchar(50),
  `body` text,
  `date` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `marked`
--

CREATE TABLE `marked` (
  `id` int(11) NOT NULL,
  `for_` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marked`
--

INSERT INTO `marked` (`id`, `for_`) VALUES
(15, 9);

-- --------------------------------------------------------

--
-- Stand-in structure for view `markeds`
-- (See below for the actual view)
--
CREATE TABLE `markeds` (
  `id` int(11),
  `title` varchar(50),
  `body` text,
  `date` timestamp,
  `for_` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`id`, `title`, `body`, `date`) VALUES
(8, 'About code', 'e8 fpa7g fp78ag p87 agdp789wg p87 aw78', '2020-12-22 09:54:50'),
(9, 'Lorem ipsum', 'sakd iausfiu agsfiu sgfiusag ;ius', '2020-12-22 09:55:03'),
(10, 'Lorem ipsum', 'fffffffffffffffffffff', '2021-05-03 11:10:34');

-- --------------------------------------------------------

--
-- Structure for view `home`
--
DROP TABLE IF EXISTS `home`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `home`  AS SELECT `todos`.`id` AS `id`, `todos`.`title` AS `title`, `todos`.`body` AS `body`, `todos`.`date` AS `date` FROM `todos` WHERE !(`todos`.`id` in (select `marked`.`for_` from `marked`)) ORDER BY `todos`.`date` DESC ;

-- --------------------------------------------------------

--
-- Structure for view `markeds`
--
DROP TABLE IF EXISTS `markeds`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `markeds`  AS SELECT `todos`.`id` AS `id`, `todos`.`title` AS `title`, `todos`.`body` AS `body`, `todos`.`date` AS `date`, `m`.`for_` AS `for_` FROM (`todos` join (select `marked`.`for_` AS `for_` from `marked`) `m` on(`todos`.`id` = `m`.`for_`)) ORDER BY `todos`.`date` DESC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `marked`
--
ALTER TABLE `marked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `marked`
--
ALTER TABLE `marked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
