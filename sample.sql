-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2016 at 08:50 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpcrud`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(32) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `unique_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 'sdsd', 'sdsdfsdfsdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'sfdsd', 'sdsdsd', '2016-10-27 00:00:00', '2016-10-27 00:00:00'),
(3, '581730ed07dc9', 'http://skyloader.net16.net/<div>http://skyloader.net16.net/<br></div><div>http://skyloader.net16.net/http://skyloader.net16.net/http://skyloader.net16.net/http://skyloader.net16.net/<br></div><div>http://skyloader.net16.net/http://skyloader.net16.net/http://skyloader.net16.net/http://skyloader.net16.net/<br></div>', '2016-10-31 12:54:21', '2016-10-31 14:37:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
