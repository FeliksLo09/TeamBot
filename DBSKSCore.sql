-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 04, 2019 at 11:21 PM
-- Server version: 10.2.29-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u3332521_sksman`
--

-- --------------------------------------------------------

--
-- Table structure for table `p_chat`
--

CREATE TABLE `p_chat` (
  `ch_id` double NOT NULL,
  `or_id` double NOT NULL,
  `ch_text` text NOT NULL,
  `ch_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `p_orang`
--

CREATE TABLE `p_orang` (
  `or_id` double NOT NULL,
  `or_nama` varchar(200) NOT NULL,
  `or_sex` varchar(1) NOT NULL,
  `or_status` int(1) NOT NULL,
  `or_level` varchar(10) NOT NULL,
  `or_hp` varchar(14) NOT NULL,
  `or_bug` varchar(20) NOT NULL,
  `or_kode` varchar(3) NOT NULL,
  `or_company` text NOT NULL,
  `or_username` varchar(25) NOT NULL,
  `or_sukses` int(5) NOT NULL,
  `or_batal` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `p_chat`
--
ALTER TABLE `p_chat`
  ADD PRIMARY KEY (`ch_id`);

--
-- Indexes for table `p_orang`
--
ALTER TABLE `p_orang`
  ADD PRIMARY KEY (`or_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `p_chat`
--
ALTER TABLE `p_chat`
  MODIFY `ch_id` double NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
