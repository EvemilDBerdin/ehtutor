-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2022 at 07:40 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ehtutor`
--

-- --------------------------------------------------------

--
-- Table structure for table `in_out`
--

CREATE TABLE `in_out` (
  `id` int(11) NOT NULL,
  `status` text NOT NULL,
  `time_in` varchar(50) NOT NULL,
  `time_out` varchar(50) NOT NULL,
  `datenow` varchar(50) NOT NULL,
  `student_info_id` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL COMMENT '0-active,1-inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `in_out`
--

INSERT INTO `in_out` (`id`, `status`, `time_in`, `time_out`, `datenow`, `student_info_id`, `is_deleted`) VALUES
(8, 'success', '2022-11-25 07:28:59pm', '2022-11-25 12:35:58pm', '2022-11-24', 1, 0),
(10, 'success', '2022-11-25 07:41:31pm', '2022-11-25 12:41:41pm', '2022-11-24', 1, 0),
(11, 'success', '2022-11-25 07:42:20pm', '2022-11-25 12:43:31pm', '2022-11-25', 1, 0),
(12, 'success', '2022-11-28 05:41:42pm', '2022-11-28 05:41:44pm', '2022-11-28', 1, 0),
(13, 'success', '2022-12-02 01:50:07pm', '2022-12-02 01:50:09pm', '2022-12-01', 1, 0),
(14, 'success', '2022-12-02 02:14:04pm', '2022-12-02 02:14:07pm', '2022-12-02', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `idnumber` int(11) NOT NULL,
  `address` text NOT NULL,
  `section` varchar(50) NOT NULL,
  `fblink` text NOT NULL,
  `password` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '0-user, 2-deleted, 3-lock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `firstname`, `middlename`, `lastname`, `idnumber`, `address`, `section`, `fblink`, `password`, `status`) VALUES
(1, 'test2', 'hello', 'ylanan', 123123, 'bulacao', 'c', 'https://localhost/ehtutor/admin/studentdata.php', '202cb962ac59075b964b07152d234b70', 3),
(2, 'firstname1', 'middlename1', 'lastname1', 12312, 'address1', 'section1', 'fblink1', '1231', 0),
(3, 'Hoyt', 'Cleo Burt', 'Hewitt', 703, 'Quas fugiat anim eiu', 'Lorem fuga Nulla qu', 'https://www.jusyzisod.ws', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 0),
(4, 'Alika', 'Amela Hines', 'Espinoza', 840, 'Sed incididunt sunt ', 'Iusto inventore ipsa', 'https://www.nedob.tv', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 0),
(5, 'Odessa', 'Uriel Sloan', 'Swanson', 985, 'Laudantium labore e', 'Officia omnis animi', 'https://www.gisesuj.cc', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `address` text NOT NULL,
  `zipcode` text NOT NULL,
  `telephone` text NOT NULL,
  `gender` varchar(50) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0-user, 1-admin, 2-deleted, 3-lock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `middlename`, `lastname`, `email`, `password`, `address`, `zipcode`, `telephone`, `gender`, `status`) VALUES
(1, 'evemil', 'degami', 'berdin', 'evemil.berdin@proweaver.net', '202cb962ac59075b964b07152d234b70', 'purok rambo, babag lapu-lapu city, cebu', '6015', '09390277063', 'male', 2),
(2, 'Stacey', 'Shellie Coffey', 'West', 'baziwuger@mailinator.com', '202cb962ac59075b964b07152d234b70', 'Ipsum eligendi sit ', '96530', '+1 (137) 878-8611', 'others', 3),
(3, 'Brent', 'Dante Sexton', 'Terrell', 'xyki@mailinator.com', '3ab3934dcc721e180a7ee28755066ed5', 'Velit ut lorem labor', '54305', '+1 (813) 125-9456', 'others', 0),
(4, 'Candice', 'Sierra Tyler', 'Valentine', 'patowuq@mailinator.com', '4de9b8cbcfdb3a7afac4dfa9c1c2678d', 'Animi et dolorem di', '60519', '+1 (761) 239-3461', 'others', 0),
(5, 'Stephen', 'Angela Tran', 'Gaines', 'mypam@mailinator.com', '878289f22e695449ef0c6aaa44fdd727', 'Quia voluptas quia i', '53903', '+1 (373) 636-8773', 'female', 0),
(6, 'Justine', 'Geoffrey Hickman', 'Mcmahon', 'poloteroke@mailinator.com', '1ae10c8813ee1e8bdd2d26fe6ab41cc5', 'Saepe qui id offici', '10203', '+1 (962) 826-1088', 'others', 0),
(7, 'Kibo', 'Raja Ingram', 'Combs', 'wogel@mailinator.com', '07d0af3553d0eb4665410317a478740f', 'Iure ab qui sint fug', '62476', '+1 (827) 387-3048', 'female', 0),
(8, 'Cade', 'Roth Dawson', 'Foreman', 'xuxuki@mailinator.com', 'b0558320f16e2397902ef93a5ee3e663', 'Ut recusandae Autem', '63442', '+1 (411) 422-7747', 'male', 0),
(9, 'Nissim', 'Shaeleigh Walter', 'Stout', 'kiwexi@mailinator.com', '267f2b20fdea06af56a6b5cab29a9b83', 'Ut nobis laudantium', '79036', '+1 (856) 741-3949', 'others', 0),
(10, 'Coby', 'Clark Bernard', 'Rhodes', 'jipyb@mailinator.com', '53bc74e38810123b63e10010f9a270e7', 'Sit provident sunt', '38952', '+1 (854) 421-1568', 'male', 0),
(11, 'qe', 'q', 'q', 'webtestreceive@gmail.com', 'f1622c8326385039a34c75ba7dae0c96', 'qwe', 'qwe', 'qwe', 'male', 0),
(12, 'qwewq', 'qweq', 'qweq', 'webtestreceive@gmail.com', '76d80224611fc919a5d54f0ff9fba446', 'qwe', 'qwe', 'qwe', 'male', 0),
(13, 'qweqwe', 'qweqweq', 'qweqw', 'webtestreceive@gmail.com', 'f1622c8326385039a34c75ba7dae0c96', 'qwe', 'qweqw', 'qweq', 'male', 0),
(14, 'Richard', 'August Malone', 'Floyd', 'lotyc@mailinator.com', 'ebcb090197cb314114938fc3b91b3865', 'Quam aut nulla omnis', '37152', '+1 (869) 334-4958', 'others', 0),
(15, 'ian', 'unknown', 'pelayo', 'ian@gmail.com', '123', 'pit-os', '6000', '123456', 'male', 0),
(16, 'Michelle', 'Robin Romero', 'Maddox', 'qupobixy@mailinator.com', '5aa9c40cef03e829b453a5fdb07d03b7', 'Ipsum doloribus volu', '26704', '+1 (937) 311-5648', 'others', 0),
(17, 'Whitney', 'Alexandra Fox', 'Browning', 'setujah@mailinator.com', 'a270a58d6c0b246e68f7292686a6ff79', 'Et magni corrupti m', '17720', '+1 (117) 731-4831', 'others', 0),
(18, 'Lesley', 'Randall Nelson', 'Wooten', 'syso@mailinator.com', '5f8466d94fd5d8342724c8ee5e6b2367', 'Velit do fuga Adip', '49981', '+1 (821) 435-4421', 'male', 0),
(19, 'Maggy', 'Ursa York', 'Owens', 'namep@mailinator.com', 'af9b880b15395606244f6d5f776b18f1', 'Impedit duis lorem ', '41469', '+1 (194) 502-7181', 'male', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `in_out`
--
ALTER TABLE `in_out`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `in_out`
--
ALTER TABLE `in_out`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
