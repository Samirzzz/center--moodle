-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 02:05 AM
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
-- Database: `sa-manaseti`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `name`, `uid`) VALUES
(1, 'admin samir', 1);

-- --------------------------------------------------------

--
-- Table structure for table `center`
--

CREATE TABLE `center` (
  `Cid` int(50) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `cloc` varchar(50) NOT NULL,
  `cnumber` varchar(50) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `center`
--

INSERT INTO `center` (`Cid`, `cname`, `cloc`, `cnumber`, `uid`) VALUES
(0, 'default', '[value-3]', '[value-6]', 54),
(1, 'Modern', 'sefarat', '01286749530', 52),
(4, 'Smart', 'nasr city', '01286749530', 51);

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `id` int(255) NOT NULL,
  `sid` int(255) NOT NULL,
  `sessid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pgid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `linkaddress` varchar(50) NOT NULL,
  `icons` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pgid`, `name`, `linkaddress`, `icons`, `class`) VALUES
(2, 'search and delete', 'adminsearch.php', '<iconify-icon icon=\"material-symbols:delete\"></iconify-icon>', ''),
(3, 'overview', 'adminmain.php', '<i class=\"ri-bar-chart-line\"></i>', 'active'),
(4, 'studentSearch', 'students.php', '<iconify-icon icon=\"openmoji:patient-clipboard\"></iconify-icon>', ''),
(5, 'permissions', 'permissions.php', '<iconify-icon icon=\"mingcute:user-security-line\"></iconify-icon>', ''),
(6, 'View Sessions', 'viewsession.php', '<iconify-icon icon=\"carbon:view\"></iconify-icon>', ''),
(7, 'add sessions', 'addsession.php', '<iconify-icon icon=\"basil:add-solid\"></iconify-icon>', ''),
(8, 'logout', 'logout.php', '<iconify-icon icon=\"icon-park:logout\"></iconify-icon>', ''),
(9, 'Student Home', 'studentindex.php', '<i class=\"ri-bar-chart-line\"></i>', 'active'),
(10, 'add admin', 'addadmin.php', '<iconify-icon icon=\"mdi:user-add\"></iconify-icon>', ''),
(18, 'add page', 'addpage.php', '<iconify-icon icon=\"iconoir:multiple-pages-add\"></iconify-icon>', ''),
(20, 'booking', 'enrollment.php', '<iconify-icon icon=\"tabler:brand-booking\"></iconify-icon>', ''),
(21, 'settings', 'settings.php', '<iconify-icon icon=\"uil:setting\"></iconify-icon>', ''),
(22, 'Retrieve Teachers', 'retrievedteachers.php', '<iconify-icon icon=\"fontisto:doctor\"></iconify-icon>', ''),
(23, 'admin overview', 'adminmain.php', '<i class=\"ri-bar-chart-line\"></i>', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `sessid` int(50) NOT NULL,
  `sid` int(50) DEFAULT NULL,
  `tid` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `Cid` int(50) NOT NULL,
  `price` int(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`sessid`, `sid`, `tid`, `time`, `status`, `Cid`, `price`, `date`) VALUES
(27, NULL, 15, '2:45', 'available', 1, 500, '2024-05-23'),
(28, NULL, 15, '2:45', 'available', 1, 500, '2024-05-23'),
(29, NULL, 1, '2 am', 'available', 1, 777, '2024-05-23'),
(31, NULL, 15, '2:45', 'available', 1, 500, '2024-05-23'),
(32, NULL, 1, '2:14 pm', 'available', 1, 1234, '2024-06-01'),
(34, NULL, 1, '10am', 'available', 1, 444, '2024-05-24'),
(35, NULL, 12, '1:30', 'available', 4, 150, '2024-05-31'),
(36, NULL, 14, '15:65', 'available', 4, 150, '2024-05-21'),
(37, NULL, 12, '2:44 am', 'available', 4, 121, '2024-05-24'),
(38, NULL, 12, '2:45 am', 'available', 4, 120, '2024-05-30');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` int(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `number` varchar(50) NOT NULL,
  `uid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `firstname`, `lastname`, `age`, `gender`, `address`, `number`, `uid`) VALUES
(5, 'ibrahim', 'wagih', '21', 'm', 'madinaty', '0111111', 20),
(14, 'Abdelrahman', 'Samir', '', '', 'nasr city', '01286749530', 34),
(15, 'abdelrahman', 'samir', '', '', '', '', 35),
(17, 'abdo', 'samir', '20', 'Male', 'Sefarat', '0128674953', 37),
(18, 'seif', 'sherif', '', 'Male', '', '', 39),
(20, 'Abdelrahman', 'Samir', '', '', '', '', 41),
(25, 'Abdelrahman', 'Samir', '', '', '', '', 47),
(26, 'Abdelrahman', 'Samir', '', '', '', '', 48),
(27, 'Abdelrahman', 'Samir', '', '', '', '', 49),
(29, 'seif', 'patient', '12345678', 'M', 'sas', '012251020', 59),
(30, 'doctor', 'conor', '20', 'M', '1_zbdjssdjkw', '010251525', 60),
(31, 'doc', 'seifo', '20', 'M', '1 sdhakk', '010255544', 61),
(32, 'marwan', 'mourad', '20', 'M', '1-madinaty', '0115525151', 63),
(33, 'hamada', 'mada', '23', 'M', 'madinaty', '01060094330', 65),
(34, 'ibrahim', 'wagih', '22', 'M', 'madinaty', '01060094330', 66),
(35, 'aly', 'arafat', '23', 'M', '244 d', '01551564342', 67);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `tid` int(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `number` varchar(50) NOT NULL,
  `educ` varchar(50) NOT NULL,
  `uid` int(50) NOT NULL,
  `Cid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`tid`, `firstname`, `lastname`, `subject`, `number`, `educ`, `uid`, `Cid`) VALUES
(1, 'Ahmed', 'samir', 'physics', '01286749530', 'miu', 27, 1),
(12, 'Reda', 'Elfarouk', 'Arabic', '01286749530', 'miu', 57, 4),
(13, 'Mostafa', 'Ibrahim', 'Social studies', '0101029291', 'harvard', 58, 0),
(14, 'Mohamed', 'Kamal', 'Chemistry', '011520525515', 'harvard', 62, 4),
(15, 'Youssef', 'Hossam', 'English', '02051515152', 'miu', 64, 1),
(16, 'conor', 'mcgregor', 'Biology', '01551564342', 'MIU', 68, 4);

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `utid` int(11) NOT NULL,
  `name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`utid`, `name`) VALUES
(0, 'default'),
(1, 'admin'),
(2, 'teacher'),
(3, 'center'),
(4, 'student');

-- --------------------------------------------------------

--
-- Table structure for table `usertype_pages`
--

CREATE TABLE `usertype_pages` (
  `upid` int(11) NOT NULL,
  `usertypeid` int(11) NOT NULL,
  `pageid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertype_pages`
--

INSERT INTO `usertype_pages` (`upid`, `usertypeid`, `pageid`) VALUES
(16, 0, 3),
(17, 0, 5),
(145, 3, 3),
(146, 3, 7),
(147, 3, 6),
(148, 3, 22),
(150, 2, 6),
(156, 1, 3),
(157, 1, 5),
(158, 1, 18),
(159, 1, 10),
(160, 1, 2),
(161, 4, 9),
(162, 4, 20);

-- --------------------------------------------------------

--
-- Table structure for table `user_acc`
--

CREATE TABLE `user_acc` (
  `uid` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `usertype_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_acc`
--

INSERT INTO `user_acc` (`uid`, `email`, `pass`, `usertype_id`, `image`) VALUES
(1, 'samirzzz@email.com', '12345678', 1, ''),
(10, 'test12@gmail.com', '1111', 1, ''),
(15, 'abdelrahman2108', '1234', 2, ''),
(20, 'ibrahim2105690@miuegypt.edu.eg', '123', 0, ''),
(27, 'test1322@gmail.com', '12345678', 2, 'abdelrahman.200300@gmail.com.jpg'),
(34, 'abdelrahman.200300@gmail.com', '', 0, ''),
(35, 'abdelrahman.20030440@gmail.com', '', 0, ''),
(36, 'abdelrahman.200300@gmail.com', '12345678', 2, ''),
(37, 'abdo@email.com', '12345678', 4, 'abdelrahman.200300@gmail.com.jpg'),
(39, 'seifo@email.com', '', 0, ''),
(41, 'abdelrahman.20030d0@gmail.com', '', 0, ''),
(47, 'abdelrahman.2003@gmail.com', '12345678', 0, ''),
(48, 'abdelrahman.20000@gmail.com', '12345678', 0, ''),
(49, 'abdelrahman.2300@gmail.com', '12345678', 0, ''),
(51, 'smart@gmail.com', '12345678', 3, ''),
(52, 'modern@gmail.com', '12345678', 3, ''),
(53, 'abdelrahman.200300@gmail.com', '12345678', 2, 'abdelrahman.200300@gmail.com.jpg'),
(54, 'defalut', 'defalut', 3, 'defalut'),
(57, 'samird@gmail.com', '12345678', 2, 'abdelrahman.2003000@gmail.com.jpg'),
(58, 'seifodoc@gmail.com', '12345678', 2, 'seifod@gmail.com.jpg'),
(59, 'aliarafat534@gmail.com', '12345678', 4, 'patient@gmail.com.png'),
(60, 'conorp@gmail.com', '12345678', 4, 'conorp@gmail.com.jpg'),
(61, 'seifop@gmail.com', '12345678', 4, 'seifop@gmail.com.jpg'),
(62, 'wegod@gmail.com', '12345678', 2, 'wegod@gmail.com.jpg'),
(63, 'marop@gmail.com', '12345678', 4, 'marwand@gmail.com.png'),
(64, 'alyd@gmail.com', '12345678', 2, 'alyd@gmail.com.png'),
(65, 'hamada@gmail.com', '12345678', 4, 'hamada@gmail.com.jpeg'),
(66, 'youssef@gmail.com', '12345678', 4, ''),
(67, 'aliarafat534@gmail.com', 'arafat3300', 4, ''),
(68, 'doctorreda@gmail.com', 'arafat3300', 2, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `center`
--
ALTER TABLE `center`
  ADD PRIMARY KEY (`Cid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessid` (`sessid`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pgid`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`sessid`),
  ADD KEY `Did` (`tid`),
  ADD KEY `Pid` (`sid`),
  ADD KEY `Cid` (`Cid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `Cid` (`Cid`);

--
-- Indexes for table `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`utid`);

--
-- Indexes for table `usertype_pages`
--
ALTER TABLE `usertype_pages`
  ADD PRIMARY KEY (`upid`),
  ADD KEY `pageid` (`pageid`),
  ADD KEY `usertypeid` (`usertypeid`);

--
-- Indexes for table `user_acc`
--
ALTER TABLE `user_acc`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `user_id` (`usertype_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `center`
--
ALTER TABLE `center`
  MODIFY `Cid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `pgid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `sessid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `tid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `usertypes`
--
ALTER TABLE `usertypes`
  MODIFY `utid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usertype_pages`
--
ALTER TABLE `usertype_pages`
  MODIFY `upid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `user_acc`
--
ALTER TABLE `user_acc`
  MODIFY `uid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user_acc` (`uid`);

--
-- Constraints for table `center`
--
ALTER TABLE `center`
  ADD CONSTRAINT `center_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user_acc` (`uid`);

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `enrollment_ibfk_1` FOREIGN KEY (`sessid`) REFERENCES `sessions` (`sessid`) ON DELETE CASCADE,
  ADD CONSTRAINT `enrollment_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `student` (`sid`) ON DELETE CASCADE;

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `teacher` (`tid`),
  ADD CONSTRAINT `sessions_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `student` (`sid`),
  ADD CONSTRAINT `sessions_ibfk_3` FOREIGN KEY (`Cid`) REFERENCES `center` (`Cid`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user_acc` (`uid`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user_acc` (`uid`),
  ADD CONSTRAINT `teacher_ibfk_2` FOREIGN KEY (`Cid`) REFERENCES `center` (`Cid`);

--
-- Constraints for table `usertype_pages`
--
ALTER TABLE `usertype_pages`
  ADD CONSTRAINT `usertype_pages_ibfk_1` FOREIGN KEY (`pageid`) REFERENCES `pages` (`pgid`),
  ADD CONSTRAINT `usertype_pages_ibfk_2` FOREIGN KEY (`usertypeid`) REFERENCES `usertypes` (`utid`);

--
-- Constraints for table `user_acc`
--
ALTER TABLE `user_acc`
  ADD CONSTRAINT `user_acc_ibfk_1` FOREIGN KEY (`usertype_id`) REFERENCES `usertypes` (`utid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
