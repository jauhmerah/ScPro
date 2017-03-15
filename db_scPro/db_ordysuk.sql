-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2017 at 09:00 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_ordysuk`
--

-- --------------------------------------------------------

--
-- Table structure for table `process`
--

CREATE TABLE IF NOT EXISTS `process` (
  `pr_id` int(11) NOT NULL AUTO_INCREMENT,
  `pr_desc` text NOT NULL,
  `pr_color` text NOT NULL COMMENT 'Color Status',
  PRIMARY KEY (`pr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Table structure for table `ship`
--

CREATE TABLE IF NOT EXISTS `ship` (
  `sh_id` int(11) NOT NULL AUTO_INCREMENT,
  `cl_id` int(11) NOT NULL,
  `us_id` int(11) NOT NULL,
  `sh_totalPrice` int(11) NOT NULL,
  `sh_deposit` int(11) NOT NULL,
  `sh_bank` text NOT NULL,
  `sh_invoice` text NOT NULL,
  `sh_sendDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sh_arrivedate` timestamp NOT NULL,
  `sh_note` text NOT NULL,
  `st_id` int(11) NOT NULL,
  `sh_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sh_invenCheck` text NOT NULL,
  `it_id` int(11) NOT NULL,
  `pr_id` int(11) NOT NULL DEFAULT '1',
  `sh_del` tinyint(1) NOT NULL DEFAULT '0',
  `sh_paid` int(11) NOT NULL DEFAULT '0',
  `sh_acc` tinyint(1) NOT NULL DEFAULT '0',
  `sh_ver` int(11) NOT NULL DEFAULT '2' COMMENT 'Old Version',
  PRIMARY KEY (`sh_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=515 ;

-- --------------------------------------------------------

--
-- Table structure for table `ship_ext`
--

CREATE TABLE IF NOT EXISTS `ship_ext` (
  `shex_id` int(11) NOT NULL AUTO_INCREMENT,
  `sh_id` int(11) NOT NULL,
  `sh_dateline` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sh_finishdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cu_id` int(11) NOT NULL COMMENT 'Currency',
  `sh_wide` int(11) NOT NULL,
  `sh_shipcom` text NOT NULL,
  `sh_shipopt` text NOT NULL,
  `dec_id` text NOT NULL COMMENT 'Declare Item',
  `sh_declarePrice` int(11) NOT NULL COMMENT 'Declare Price',
  `sh_traking` decimal(10,0) NOT NULL COMMENT 'change to shipping price',
  `sh_invAtt` text NOT NULL,
  `sh_msds` text NOT NULL,
  `sh_coo` text NOT NULL,
  `sh_smallcb` text NOT NULL,
  `sh_bigcb` text NOT NULL,
  PRIMARY KEY (`shex_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=512 ;

-- --------------------------------------------------------

--
-- Table structure for table `ship_item`
--

CREATE TABLE IF NOT EXISTS `ship_item` (
  `si_id` int(11) NOT NULL AUTO_INCREMENT,
  `shex_id` int(11) NOT NULL,
  `ty2_id` int(11) NOT NULL,
  `ni_id` int(11) NOT NULL,
  `si_price` double NOT NULL,
  `si_qty` int(11) NOT NULL,
  PRIMARY KEY (`si_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2909 ;

-- --------------------------------------------------------

--
-- Table structure for table `ship_log`
--

CREATE TABLE IF NOT EXISTS `ship_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
