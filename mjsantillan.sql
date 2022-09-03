-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2022 at 04:47 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mjsantillan`
--

-- --------------------------------------------------------

--
-- Table structure for table `patientdata`
--

CREATE TABLE `patientdata` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `age` int(11) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `medical_condition` varchar(255) NOT NULL,
  `medications` text NOT NULL,
  `frame` varchar(255) NOT NULL,
  `lens` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `birthdate` date NOT NULL,
  `occupation` text NOT NULL,
  `referred_by` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patientdata`
--

INSERT INTO `patientdata` (`id`, `fname`, `lname`, `address`, `age`, `contact_number`, `medical_condition`, `medications`, `frame`, `lens`, `date_created`, `birthdate`, `occupation`, `referred_by`, `is_active`) VALUES
(17, 'Jane', 'Quillosa', '816 Katipunan St. Tisa Cebu City', 22, 2147483647, 'Hypertension', 'qwe', 'qwe', 'KK MC', '2022-08-28', '2022-08-29', 'asd', 'asd', 1),
(18, 'Geremy', 'Quillosa', '816 Katipunan St. Tisa Cebu City', 22, 2147483647, 'Hypertension', 'qwe', 'qwe', 'DVFT Process', '2022-08-28', '2022-08-29', 'asd', 'asd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usersdata`
--

CREATE TABLE `usersdata` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwords` varchar(255) NOT NULL,
  `is_approved` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usersdata`
--

INSERT INTO `usersdata` (`id`, `fname`, `lname`, `username`, `email`, `passwords`, `is_approved`) VALUES
(13, 'Geremy', 'Quillosa', 'Lord Gman', 'quillosageremy@gmail.com', '$2y$10$S0epcFIBxbvCx4anGUKjduQG4nk6jcIaJ9jIDTHjSXu6MXz8VAfzu', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patientdata`
--
ALTER TABLE `patientdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersdata`
--
ALTER TABLE `usersdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patientdata`
--
ALTER TABLE `patientdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `usersdata`
--
ALTER TABLE `usersdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
