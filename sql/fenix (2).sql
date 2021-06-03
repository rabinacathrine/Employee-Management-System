-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 06, 2020 at 05:12 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fenix`
--
CREATE DATABASE IF NOT EXISTS `fenix` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `fenix`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_code` varchar(10) NOT NULL,
  `company_name` varchar(20) NOT NULL,
  `client_name` varchar(20) NOT NULL,
  `email_id` varchar(20) NOT NULL,
  `phone` int(10) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `address3` varchar(50) NOT NULL,
  `alt_cname` varchar(20) NOT NULL,
  `alt_cnum` int(20) NOT NULL,
  `alt_cmail` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `pincode` int(6) NOT NULL,
  `fax` int(20) NOT NULL,
  `website` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `client_code`, `company_name`, `client_name`, `email_id`, `phone`, `address1`, `address2`, `address3`, `alt_cname`, `alt_cnum`, `alt_cmail`, `state`, `country`, `pincode`, `fax`, `website`) VALUES
(1, '1121', 'abc', 'Cathrine', 'rabinacathrine@gmail', 987654321, 'abc', 'def', 'ghi', 'megna', 889877656, 'megna@gmail.com', 'TamilNadu', 'India', 891231, 123, 'aaa.com'),
(2, '2834', 'Feenix', 'lyla', 's@gmail.com', 98893039, 'whh', 'uiuw', 'uwiuw', 'megna', 989736656, 'lilly@gmail.com', 'karnataka', 'india', 98988, 0, 'wix.com'),
(3, 'ff1', 'def', 'cn2', 'cn2@gmail.com', 9898288, 'nbg', 'ggg', 'ggg', 'CP', 90928989, 'cp@gmail.com', 'andhra', 'India', 9897929, 0, 'd.com'),
(4, 'CC01', 'idk', 'lisa', 'lisa@gmail.com', 882902939, 'shjh', 'hjwh', 'hwh', 'amy', 367877889, 'amy@gmail.com', 'TamilNadu', 'india', 78779, 7799, 'mn.com'),
(5, 'CC01', 'abc', 'lyla', 'rabinacathrine@gmail', 1234567890, 'abc', 'xxx', 'ddd', 'megna', 2147483647, 'megna@gmail.com', 'TamilNadu', 'India', 9998, 9878, 'mm.com');

-- --------------------------------------------------------

--
-- Table structure for table `executive`
--

CREATE TABLE IF NOT EXISTS `executive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `executive_code` varchar(20) NOT NULL,
  `executive_name` varchar(20) NOT NULL,
  `email_id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone1` int(10) NOT NULL,
  `phone2` int(10) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `address3` varchar(50) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `pincode` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `executive`
--

INSERT INTO `executive` (`id`, `executive_code`, `executive_name`, `email_id`, `password`, `phone1`, `phone2`, `address1`, `address2`, `address3`, `state`, `country`, `pincode`) VALUES
(1, '1121', 'feenix', 'feenix@gmail.com', '123', 2147483647, 2147483647, 'ajhh267', 'rtrtrw4', 'rwdwsdrw4', 'TamilNadu', 'India', 889900),
(2, '0', 'felcia', 'felcia@gmail.com', '123', 897654331, 2147483647, 'abc', 'def', 'ghi', 'TamilNadu', 'india', 12321),
(3, 'ex-121', 'loyola', 'loyola@gmail.com', '123', 7806553, 3578789, 'abc', 'def', 'ghi', 'karnataka', 'india', 354677);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `executive_code` varchar(20) NOT NULL,
  `executive_name` varchar(20) NOT NULL,
  `client_code` varchar(10) NOT NULL,
  `client_name` varchar(20) NOT NULL,
  `communication_date` date NOT NULL,
  `mocom` varchar(10) NOT NULL,
  `status_of_com` varchar(20) NOT NULL,
  `appointment_date` date NOT NULL,
  `alert_date` date NOT NULL,
  `feedback` varchar(100) NOT NULL,
  `client_req` varchar(60) NOT NULL,
  `remarks` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `executive_code`, `executive_name`, `client_code`, `client_name`, `communication_date`, `mocom`, `status_of_com`, `appointment_date`, `alert_date`, `feedback`, `client_req`, `remarks`) VALUES
(1, 'ex1', 'ex1', 'c1', 'c1', '2020-02-01', 'phone', 'Positive', '2020-02-07', '2020-02-05', 'ghi', 'abc', 'def'),
(2, 'ex2', 'ex2', 'c2', 'c2', '2020-02-04', 'phone', 'Positive', '2020-02-07', '2020-02-06', 'mnopqr', 'abcdef', 'ghijkl');

-- --------------------------------------------------------

--
-- Table structure for table `moc`
--

CREATE TABLE IF NOT EXISTS `moc` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `slno` varchar(20) NOT NULL,
  `mocom` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `moc`
--

INSERT INTO `moc` (`id`, `slno`, `mocom`) VALUES
(1, '1', 'Phone'),
(2, '2', 'phone'),
(3, '3', 'ffff'),
(4, '4', 'ddd'),
(5, '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
