-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2014 at 07:41 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sliemapitchdb`
--
CREATE DATABASE IF NOT EXISTS `sliemapitchdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sliemapitchdb`;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE IF NOT EXISTS `bookings` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `number` varchar(20) NOT NULL,
  `no_of_people` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `side` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`booking_id`),
  KEY `side_id` (`side`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `name`, `date`, `number`, `no_of_people`, `email`, `side`, `comment`, `date_added`, `date_modified`, `status`) VALUES
(3, 'Alexander Spiteri', '2014-06-11 21:00:00', '35621896370', 2, 'mirage107@hotmail.com', 'Bar Side', 'None', '0000-00-00 00:00:00', 2014, 1),
(4, 'Alexander Spiteri', '2014-06-12 22:43:00', '35621896370', 2, 'mirage107@hotmail.com', 'Inside', 'non', '2014-06-10 22:43:37', 2014, 2),
(5, 'Alex Spiteri', '2014-06-11 23:09:00', '79281426', 2, 'mirage107@hotmail.com', 'Sea Side', 'wqwaw', '2014-06-10 23:09:23', 2014, 1),
(6, 'Alex', '2014-06-02 14:00:00', '222', 2, 'adfsdfs', 'Sea Side', 'sdasd', '2014-06-10 23:11:47', 2014, 1),
(7, 'sa', '2014-06-02 23:46:00', '3232', 3, 'sarina255@hotmail.com', 'Sea Side', 'sdsdadsasd', '2014-06-10 23:46:20', 2014, 1),
(8, 'sddcsz', '2014-06-12 14:00:00', '33223', 2, 'sarina255@hotmail.com', 'Inside', 'sasas', '2014-06-10 23:49:17', 2014, 2),
(9, 'Alexander Spiteri', '2014-06-20 14:00:00', '35621896370', 2, 'mirage107@hotmail.com', 'Gallery', '', '2014-06-10 23:59:35', 2014, 1),
(10, 'asdsa', '2014-06-03 00:03:00', '222', 22, 'sarina255@hotmail.com', 'Bar Side', '', '2014-06-11 00:03:46', 0, 1),
(11, 'asd', '2014-06-18 14:00:00', '2221', 2, 'sarina255@hotmail.com', 'Prime Side', '', '2014-06-11 00:16:12', 2014, 1),
(12, 'Alexander Spiteri', '2014-06-12 16:00:00', '35621896370', 2, 'mirage107@hotmail.com', 'Inside', '', '2014-06-11 00:20:10', 2014, 1),
(13, 'sad', '2014-06-02 00:21:00', '2', 1, 'sarina255@hotmail.com', 'Sea Side', '', '2014-06-11 00:21:35', 2014, 1),
(14, 'Alexander Spiteri', '2014-06-14 14:00:00', '35621896370', 2, 'mirage107@hotmail.com', 'Bar Side', 'KPaISDJASPOIDJSAIDASPDJSAIODSADASKPaISDJASPOIDJSAIDASPDJSAIODSADASKPaISDJASPOIDJSAIDASPDJSAIODSADASKPaISDJASPOIDJSAIDASPDJSAIODSADASKPaISDJASPOIDJSAIDASPDJSAIODSADASKPaISDJASPOIDJSAIDASPDJSAIODSADASKPaISDJASPOIDJSAIDASPDJSAIODSADASKPaISDJASPOIDJSAIDASPDJSAIODSADAS', '2014-06-11 01:48:27', 0, 0),
(15, 'Alex Spiteri AS0154MT', '2014-06-03 14:00:00', '442032876326', 3, 'aspiteri6@gmail.com', 'Sea Side', '', '2014-06-11 01:59:54', 0, 0),
(16, 'Joseph', '2014-06-12 21:00:00', 'asdasd', 3, 'hjass@gdd.com', 'Sea Side', '', '2014-06-11 12:42:44', 0, 0),
(17, 'dsdds', '2014-06-11 19:00:00', '79281426', 3, 'aspiteri6@gmail.com', 'Sea Side', '', '2014-06-11 15:38:58', 0, 0),
(18, 'zezzz', '2014-06-11 19:00:00', '442032876326', 2, 'aspiteri6@gmail.com', 'Bar Side', 'qwqw', '2014-06-11 15:43:59', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
