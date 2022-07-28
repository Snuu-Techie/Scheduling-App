-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220727.b0c4426a43
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2022 at 10:47 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schedule`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `num` int(11) NOT NULL,
  `id` varchar(100) NOT NULL,
  `attendee` varchar(200) NOT NULL,
  `ap_date` date NOT NULL,
  `ap_time` time NOT NULL,
  `ap_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`num`, `id`, `attendee`, `ap_date`, `ap_time`, `ap_type`) VALUES
(1, 'Baba@schedule.com', 'John Smith', '2022-08-05', '23:03:00', 'Task'),
(2, 'Baba@schedule.com', 'John Smith , Lesego Paul', '2022-07-31', '23:08:00', 'Call'),
(3, 'Baba@schedule.com', 'John Smith , Lesego Paul, Lerato Sauce', '2022-08-02', '01:12:00', 'Email'),
(4, 'katlego@schedule.com', 'Katlego moilwa', '2022-07-11', '10:13:00', 'Task'),
(5, 'katlego@schedule.com', 'Katlego moilwa, Tloyo Mutoa', '2022-07-06', '10:13:00', 'Task'),
(6, 'katlego@schedule.com', 'Katlego moilwa, Bosego Kosego', '2022-07-05', '12:26:00', 'Email'),
(7, 'katlego@schedule.com', 'Katlego moilwa, Bosego Kosego, Marapo Marapo', '2022-07-14', '12:52:00', 'Email');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_type`
--

CREATE TABLE `appointment_type` (
  `id` int(11) NOT NULL,
  `app_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment_type`
--

INSERT INTO `appointment_type` (`id`, `app_type`) VALUES
(1, 'Email'),
(2, 'Call'),
(3, 'Task');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `pass`, `fullname`, `phone`, `user_type`) VALUES
('lesleymmusi@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Lesley Mmusi', '76776690', 'Agent'),
('john@schedule.com', '25d55ad283aa400af464c76d713c07ad', 'John Smith', '78990099', 'Admin'),
('katlego@schedule.com', '25d55ad283aa400af464c76d713c07ad', 'Katlego moilwa', '898989889', 'Agent'),
('Baba@schedule.com', '25d55ad283aa400af464c76d713c07ad', 'Baba Moss', '87865454', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `appointment_type`
--
ALTER TABLE `appointment_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `appointment_type`
--
ALTER TABLE `appointment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
