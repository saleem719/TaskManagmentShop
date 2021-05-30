-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2020 at 06:09 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(250) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `Password`) VALUES
(1, 'Saleem baig', 'saleem123@gmail.com', '123'),
(2, 'Rizwan', 'vip@gmail.com', '123'),
(3, 'Abid', 'abid@gmail.com', '123'),
(4, 'Asim', 'asim@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`) VALUES
(1, 'Java developer'),
(2, 'PHP developers'),
(3, 'Front end developers'),
(4, 'Node JS developer '),
(5, 'Graphic designers '),
(6, 'Laravel programmer ');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `group_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `Assign_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `due_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task_name`, `description`, `group_id`, `status`, `Assign_date`, `due_date`) VALUES
(27, 'School management system', 'School management systemSchool management systemSchool management systemSchool management systemSchool management system', 4, 'Pending', '2020-12-09 16:24:50', '2020-12-04'),
(28, 'Online Job portal ', 'My job', 3, 'Completed', '2020-12-09 16:32:10', '2020-12-07'),
(29, 'Online gaming portal', 'Online gaming portalOnline gaming portalOnline gaming portalOnline gaming portalOnline gaming portal', 2, 'Completed', '2020-12-09 16:45:02', '2020-12-17'),
(30, 'Library management System', 'Library management SystemLibrary management SystemLibrary management SystemLibrary management System', 4, 'Completed', '2020-12-09 16:57:43', '2020-12-16'),
(31, 'Online fitness trainers', 'Online fitness trainersOnline fitness trainersOnline fitness trainers', 2, 'Pending', '2020-12-10 20:37:52', '2020-12-26'),
(32, 'Banner design ', 'Banner design Banner design Banner design Banner design Banner design ', 5, 'Completed', '2020-12-12 20:01:54', '2020-12-31'),
(33, 'Attendance system on Java ', 'Attendance system on Java Attendance system on Java Attendance system on Java Attendance system on Java ', 1, 'Pending', '2020-12-13 10:07:20', '2020-12-26');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(222) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `email`, `password`, `mobile_no`, `group_id`) VALUES
(16, 'Saleem baig', 'saleem@gmail.com', '123', '03402117654', 2),
(17, 'Faizan', 'faizan@gmail.com', '1234', '0340211754', 3),
(18, 'Fida', 'fida@gmail.com', '1234', '03402117654', 3),
(19, 'Imran khan', 'imran@gmail.com', '123', '343255234', 4),
(20, 'Nasir', 'nasir@gmail.com', '123', '5566678999', 2),
(21, 'Mubeen ', 'mubeen@gmail.com', '123', '03402117654', 5),
(22, 'muntaha', 'mun@gmail.com', '123', '03402117563', 5),
(23, 'kami', 'kami@gmail.com', '123', '242325252353', 5),
(24, 'Abdul', 'abdul@gmail.com', '123', '0456788', 1),
(25, 'Basit', 'Basit@gmail.com', '123', 'rtertret', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
