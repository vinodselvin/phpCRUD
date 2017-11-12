-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2017 at 06:24 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

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
-- Table structure for table `mytable`
--

CREATE TABLE `mytable` (
  `year` varchar(4) NOT NULL,
  `programming` varchar(4) NOT NULL,
  `biology` varchar(5) NOT NULL,
  `maths` int(11) DEFAULT NULL,
  `physics` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mytable`
--

INSERT INTO `mytable` (`year`, `programming`, `biology`, `maths`, `physics`) VALUES
('1980', '70', '52', 145, '75'),
('1981', '77', '51', 156, '80'),
('1982', '81', '55', 169, '79'),
('1983', '78', '55', 171, '91'),
('1984', '80', '55', 187, '102'),
('1985', '79', '53', 199, '103'),
('1986', '79', '54', 204, '102'),
('1987', '78', '53', 218, '104'),
('1988', '75', '51', 232, '105'),
('1989', '78', '48', 233, '106'),
('1990', '76', '51', 233, '112'),
('1991', '73', '55', 232, '111'),
('1992', '70', '52', 240, '122'),
('1993', '69', '50', 256, '122'),
('1994', '74', '50', 273, '131'),
('1995', '71', '51', 286, '128'),
('1996', '71', '53', 283, '129'),
('1997', '76', '51', 292, '126'),
('1998', '81', '49', 298, '132'),
('1999', '80', '53', 313, '142'),
('2000', '77', '59', 321, '152'),
('2001', '82', '63', 338, '162'),
('2002', '88', '67', 337, '171'),
('2003', '90', '69', 338, '177'),
('2004', '90', '75', 338, '183'),
('2005', '92', '80', 351, '180'),
('2006', '93', '87', 367, '188'),
('2007', '91', '91', 375, '186'),
('2008', '90', '96', 374, '195'),
('2009', '97', '97', 385, '207'),
('2010', '104', '101', 401, '206'),
('2011', '111', '106', 403, '205'),
('2012', '115', '105', 417, '204'),
('2013', '117', '108', 420, '211'),
('2014', '121', '107', 436, '217'),
('2015', '121', '104', 449, '216'),
('year', 'prog', 'biolo', NULL, 'physics');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mytable`
--
ALTER TABLE `mytable`
  ADD PRIMARY KEY (`year`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
