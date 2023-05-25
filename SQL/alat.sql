-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 18, 2022 at 01:23 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `egmont`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin1', '2022');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary`
--

CREATE TABLE `beneficiary` (
  `sn` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `ben_name` varchar(255) NOT NULL,
  `acc_num` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `swift_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `card_request`
--

CREATE TABLE `card_request` (
  `sn` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `card_type` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE `credit` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `from_acc` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `acc_name` varchar(255) NOT NULL,
  `acc_num` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `swift_code` varchar(255) NOT NULL,
  `narration` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `sn` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `fixed_fee` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `tran_type` varchar(255) NOT NULL,
  `from_acc` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `acc_name` varchar(255) NOT NULL,
  `acc_num` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `swift_code` varchar(255) NOT NULL,
  `narration` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `userid`, `fullname`, `tran_type`, `from_acc`, `amount`, `acc_name`, `acc_num`, `bank_name`, `swift_code`, `narration`, `date`) VALUES
(11, '7', 'Ruth john', 'Funds Transfer', '3137031017', '500', 'Drake Lilwayne', '3137024788', 'Zaphir Bank', 'NIL', 'Test', '2022-12-18 12:31:58'),
(12, '7', 'Ruth john', 'Funds Transfer', '3137031017', '500', 'Drake Lilwayne', '3137024788', 'Zaphir Bank', 'NIL', 'another test', '2022-12-18 12:37:59'),
(13, '7', 'Ruth john', 'Funds Transfer', '3137031017', '100', 'Jeffrey Benson', '123456789765432', 'Barclays', 'HBEDB13', 'sdfvbgcv', '2022-12-18 13:01:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `m_status` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `acc_num` varchar(255) NOT NULL,
  `acc_type` varchar(255) NOT NULL,
  `balance` decimal(19,2) NOT NULL,
  `savings` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `app_num` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `upload_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `title`, `fname`, `lname`, `gender`, `dob`, `m_status`, `occupation`, `street`, `city`, `state`, `postcode`, `country`, `email`, `phone`, `password`, `acc_num`, `acc_type`, `balance`, `savings`, `status`, `app_num`, `code`, `date`, `image`, `upload_time`) VALUES
(7, 'Mrs', 'Ruth', 'john', 'female', '19-05-2017', 'married', 'cook', 'no 13 street', 'asaba', 'delta', '234r3', 'nigeria', 'ruth@gmail.com', '080129939299', '1234', '3137031017', 'savings', '397.50', '0', 'verified', '12348992', '0', '2022-06-03 12:33:55', 'default.jpg', '2022-06-03 12:33:55'),
(8, 'Mr', 'Drake', 'Lilwayne', '', '', '', '', '', '', '', '', '', 'theweeknd@gmail.com', '12345678', '1234', '3137024788', 'savings', '1000.00', '', 'verified', '2022078', '0', '2022-12-18 12:21:47', 'default.jpg', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beneficiary`
--
ALTER TABLE `beneficiary`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `card_request`
--
ALTER TABLE `card_request`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `credit`
--
ALTER TABLE `credit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
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
-- AUTO_INCREMENT for table `beneficiary`
--
ALTER TABLE `beneficiary`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `card_request`
--
ALTER TABLE `card_request`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `credit`
--
ALTER TABLE `credit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
