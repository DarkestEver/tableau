-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2017 at 12:46 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tableau`
--
CREATE DATABASE IF NOT EXISTS `tableau` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tableau`;

-- --------------------------------------------------------

--
-- Table structure for table `cmdgroups`
--

CREATE TABLE IF NOT EXISTS `cmdgroups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupid` varchar(255) DEFAULT NULL,
  `command` varchar(1024) DEFAULT NULL,
  `speech` varchar(1024) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `dashboardid` int(11) NOT NULL,
  `listofcommands` varchar(2048) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cmdgroups`
--

INSERT INTO `cmdgroups` (`id`, `groupid`, `command`, `speech`, `status`, `dashboardid`, `listofcommands`) VALUES
(1, '0', 'select case 1', 'selecting case 1', 1, 2, ' tFilter ( ''Category'',''Best Actor'',''Nomination Category for <Category>''); tFilter ( ''Date'',''2015'',''Oscar Nominations for film''); tMarkSelection ( ''Actor'',''Leonardo DiCaprio'',''Nomination Category for <Category>''); tMarkSelection ( ''Film'',''Boyhood'',''Oscar Nominations for film'');Speech(''for year 2015, Leonardo DiCaprio was nominated and won the oscar prize for movie Boyhood'');'),
(2, '0', 'select case ', '', 1, 2, ' tFilter ( ''Category'',''Best Actress'',''Nomination Category for <Category>''); tFilter ( ''Date'',''2016'',''Oscar Nominations for film''); tMarkSelection ( ''Actor'',''Cate Blanchett'',''Nomination Category for <Category>''); tMarkSelection ( ''Film'',''The Revenant'',''Oscar Nominations for film'');Speech(''for year 2016, Cate Blanchett was nominated and won the oscar prize for movie The Revenant'');');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `congkey` varchar(255) DEFAULT NULL,
  `congvalues` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `congkey`, `congvalues`, `status`) VALUES
(1, 'url', 'https://public.tableau.com/views/2016OscarNomineesforBestPicture/Oscars2016_1?:embed=yes&:display_count=no&:showVizHome=no&:toolbar=no', 1),
(2, 'wordSeprator', 'and', 1),
(3, 'startvoice', 'Hello My name is Kacie. How may I Help you! ', 1),
(4, 'startingtableauvoice', 'starting tableau voice', 1),
(5, 'stopingtableauvoice', 'Voice command deactivated – You can use your keypad or mouse to control the dashboard', 1),
(6, 'resultNoMatch', 'Command not recognized', 1),
(7, 'end', 'Speech Recognition engine stops', 1),
(8, 'errorPermissionDenied', 'permission denied', 1),
(9, 'errorPermissionBlocked', 'permission blocked', 1),
(10, 'errorNetwork', 'Network error', 1),
(11, 'error', 'There was an error!', 1),
(12, 'scrollBypx', '100', 1),
(13, 'twidth', '', 1),
(14, 'theight', '', 1),
(15, 'TableauPlaceholderDiv', 'vizContainer', 1),
(16, 'rirstloadurl', '2', 1),
(17, 'startvoicecommand', 'start tableau', 1),
(18, 'stopvoicecommand', 'stop tableau', 1),
(19, 'AppName', 'TOV', 1),
(20, 'copyright', 'Copyright © 2017. All rights reserved.', 1),
(21, 'appversion', 'Version 1.0 beta', 1),
(22, 'logourl', '', 1),
(23, 'headercolor', '#367fa9', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dashboardgroups`
--

CREATE TABLE IF NOT EXISTS `dashboardgroups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupname` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `dashboardgroups`
--

INSERT INTO `dashboardgroups` (`id`, `groupname`, `status`, `description`) VALUES
(33, 'Demogroup', 1, 'This is a demo group will be used for demo');

-- --------------------------------------------------------

--
-- Table structure for table `dashboards`
--

CREATE TABLE IF NOT EXISTS `dashboards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groups` int(11) NOT NULL,
  `dashboardname` text NOT NULL,
  `url` text NOT NULL,
  `defaultdash` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `dashboards`
--

INSERT INTO `dashboards` (`id`, `groups`, `dashboardname`, `url`, `defaultdash`, `status`) VALUES
(1, 33, 'Executive Overview', 'https://public.tableau.com/views/2016OscarNomineesforBestPicture/ExecutiveOverview_1?:embed=y&amp;:display_count=yes', 0, 1),
(2, 33, 'oscar', 'https://public.tableau.com/views/2016OscarNomineesforBestPicture/Oscars2016_1?:embed=yes&:display_count=no&:showVizHome=no&:toolbar=no', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `executive_summary`
--

CREATE TABLE IF NOT EXISTS `executive_summary` (
  `Category` varchar(100) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `Customer ID` varchar(100) DEFAULT NULL,
  `Customer Name` varchar(100) DEFAULT NULL,
  `Order Date` varchar(100) DEFAULT NULL,
  `Order ID` varchar(100) DEFAULT NULL,
  `Postal Code` varchar(100) DEFAULT NULL,
  `Product ID` varchar(100) DEFAULT NULL,
  `Product Name` varchar(100) DEFAULT NULL,
  `Region` varchar(100) DEFAULT NULL,
  `Segment` varchar(100) DEFAULT NULL,
  `Ship Date` varchar(100) DEFAULT NULL,
  `Ship Mode` varchar(100) DEFAULT NULL,
  `Ship Status` varchar(100) DEFAULT NULL,
  `State` varchar(100) DEFAULT NULL,
  `Sub-Category` varchar(100) DEFAULT NULL,
  `2013 sales` varchar(100) DEFAULT NULL,
  `Days to Ship Actual` varchar(100) DEFAULT NULL,
  `Days to Ship Scheduled` varchar(100) DEFAULT NULL,
  `Discount` varchar(100) DEFAULT NULL,
  `Number of Records` varchar(100) DEFAULT NULL,
  `Profit` varchar(100) DEFAULT NULL,
  `Profit per Customer` varchar(100) DEFAULT NULL,
  `Profit per Order` varchar(100) DEFAULT NULL,
  `Profit Ratio` varchar(100) DEFAULT NULL,
  `Quantity` varchar(100) DEFAULT NULL,
  `Row ID` varchar(100) DEFAULT NULL,
  `Sales` varchar(100) DEFAULT NULL,
  `Sales estimate` varchar(100) DEFAULT NULL,
  `Sales Forecast` varchar(100) DEFAULT NULL,
  `Sales per Customer` varchar(100) DEFAULT NULL,
  `Units estimate` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `executive_summary`
--

INSERT INTO `executive_summary` (`Category`, `City`, `Country`, `Customer ID`, `Customer Name`, `Order Date`, `Order ID`, `Postal Code`, `Product ID`, `Product Name`, `Region`, `Segment`, `Ship Date`, `Ship Mode`, `Ship Status`, `State`, `Sub-Category`, `2013 sales`, `Days to Ship Actual`, `Days to Ship Scheduled`, `Discount`, `Number of Records`, `Profit`, `Profit per Customer`, `Profit per Order`, `Profit Ratio`, `Quantity`, `Row ID`, `Sales`, `Sales estimate`, `Sales Forecast`, `Sales per Customer`, `Units estimate`) VALUES
('Technology', 'Plano', 'United States', 'AB-10255', 'Alejandro Ballentine', '2014', 'US-2013-158708', '75023', 'TEC-AC-10003133', 'Memorex Mini Travel Drive 4 GB USB 2.0 Flash Drive', 'Central', 'Home Office', '41820', 'Second Class', 'Shipped On Time', 'Texas', 'Accessories', '', '3', '3', '0.2', '1', '4', '3.57', '3.57', '0.263', '2', '1694', '14', '0.0K', '20', '13.62', '3');

-- --------------------------------------------------------

--
-- Table structure for table `jsload`
--

CREATE TABLE IF NOT EXISTS `jsload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dashboardid` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `command` varchar(255) DEFAULT NULL,
  `dimension` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `Speech` varchar(255) DEFAULT NULL,
  `TableauTable` varchar(255) DEFAULT NULL,
  `TableauSheet` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `grpid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=118 ;

--
-- Dumping data for table `jsload`
--

INSERT INTO `jsload` (`id`, `dashboardid`, `type`, `command`, `dimension`, `value`, `Speech`, `TableauTable`, `TableauSheet`, `status`, `grpid`) VALUES
(1, 2, 'tMarkSelection', 'select nomination Leonardo DiCaprio ', 'Actor', 'Leonardo DiCaprio ', 'selecting nomination Leonardo DiCaprio ', NULL, 'Nomination Category for <Category>', 1, 33),
(2, 2, 'tMarkSelection', 'select nomination Matt Damon', 'Actor', 'Matt Damon', 'selecting nomination Matt Damon', NULL, 'Nomination Category for <Category>', 1, 33),
(3, 2, 'tMarkSelection', 'select nomination Michael Fassbender', 'Actor', 'Michael Fassbender', 'selecting nomination Michael Fassbender', NULL, 'Nomination Category for <Category>', 1, 33),
(4, 2, 'tMarkSelection', 'select nomination Eddie Redmayne', 'Actor', 'Eddie Redmayne', 'selecting nomination Eddie Redmayne', NULL, 'Nomination Category for <Category>', 1, 33),
(5, 2, 'tMarkSelection', 'select nomination Bryan Cranston', 'Actor', 'Bryan Cranston', 'selecting nomination Bryan Cranston', NULL, 'Nomination Category for <Category>', 1, 33),
(6, 2, 'tMarkSelection', 'select nomination Brie Larson', 'Actor', 'Brie Larson', 'selecting nomination Brie Larson', NULL, 'Nomination Category for <Category>', 1, 33),
(7, 2, 'tMarkSelection', 'select nomination Cate Blanchett', 'Actor', 'Cate Blanchett', 'selecting nomination Cate Blanchett', NULL, 'Nomination Category for <Category>', 1, 33),
(8, 2, 'tMarkSelection', 'select nomination Saoirse Ronan', 'Actor', 'Saoirse Ronan', 'selecting nomination Saoirse Ronan', NULL, 'Nomination Category for <Category>', 1, 33),
(9, 2, 'tMarkSelection', 'select nomination Jennifer Lawrence', 'Actor', 'Jennifer Lawrence', 'selecting nomination Jennifer Lawrence', NULL, 'Nomination Category for <Category>', 1, 33),
(10, 2, 'tMarkSelection', 'select nomination Charlotte Rampling', 'Actor', 'Charlotte Rampling', 'selecting nomination Charlotte Rampling', NULL, 'Nomination Category for <Category>', 1, 33),
(11, 2, 'tMarkSelection', 'select nomination Alejandro G. Iñárritu ', 'Actor', 'Alejandro G. Iñárritu ', 'selecting nomination Alejandro G. Iñárritu ', NULL, 'Nomination Category for <Category>', 1, 33),
(12, 2, 'tMarkSelection', 'select nomination Tom McCarthy ', 'Actor', 'Tom McCarthy ', 'selecting nomination Tom McCarthy ', NULL, 'Nomination Category for <Category>', 1, 33),
(13, 2, 'tMarkSelection', 'select nomination George Miller ', 'Actor', 'George Miller ', 'selecting nomination George Miller ', NULL, 'Nomination Category for <Category>', 1, 33),
(14, 2, 'tMarkSelection', 'select nomination Adam McKay ', 'Actor', 'Adam McKay ', 'selecting nomination Adam McKay ', NULL, 'Nomination Category for <Category>', 1, 33),
(15, 2, 'tMarkSelection', 'select nomination Lenny Abrahamson ', 'Actor', 'Lenny Abrahamson ', 'selecting nomination Lenny Abrahamson ', NULL, 'Nomination Category for <Category>', 1, 33),
(16, 2, 'tMarkSelection', 'select nomination Benedict Cumberbatch', 'Actor', 'Benedict Cumberbatch', 'selecting nomination Benedict Cumberbatch', NULL, 'Nomination Category for <Category>', 1, 33),
(17, 2, 'tMarkSelection', 'select nomination Bradley Cooper', 'Actor', 'Bradley Cooper', 'selecting nomination Bradley Cooper', NULL, 'Nomination Category for <Category>', 1, 33),
(18, 2, 'tMarkSelection', 'select nomination Michael Keaton', 'Actor', 'Michael Keaton', 'selecting nomination Michael Keaton', NULL, 'Nomination Category for <Category>', 1, 33),
(19, 2, 'tMarkSelection', 'select nomination Steve Carell', 'Actor', 'Steve Carell', 'selecting nomination Steve Carell', NULL, 'Nomination Category for <Category>', 1, 33),
(20, 2, 'tMarkSelection', 'select nomination Felicity Jones', 'Actor', 'Felicity Jones', 'selecting nomination Felicity Jones', NULL, 'Nomination Category for <Category>', 1, 33),
(21, 2, 'tMarkSelection', 'select nomination Marion Cotillard', 'Actor', 'Marion Cotillard', 'selecting nomination Marion Cotillard', NULL, 'Nomination Category for <Category>', 1, 33),
(22, 2, 'tMarkSelection', 'select nomination Reese Witherspoon', 'Actor', 'Reese Witherspoon', 'selecting nomination Reese Witherspoon', NULL, 'Nomination Category for <Category>', 1, 33),
(23, 2, 'tMarkSelection', 'select nomination Rosamund Pike', 'Actor', 'Rosamund Pike', 'selecting nomination Rosamund Pike', NULL, 'Nomination Category for <Category>', 1, 33),
(24, 2, 'tMarkSelection', 'select nomination Julianne Moore', 'Actor', 'Julianne Moore', 'selecting nomination Julianne Moore', NULL, 'Nomination Category for <Category>', 1, 33),
(25, 2, 'tMarkSelection', 'select nomination Alejandro González Iñárritu', 'Actor', 'Alejandro González Iñárritu', 'selecting nomination Alejandro González Iñárritu', NULL, 'Nomination Category for <Category>', 1, 33),
(26, 2, 'tMarkSelection', 'select nomination Richard Linklater', 'Actor', 'Richard Linklater', 'selecting nomination Richard Linklater', NULL, 'Nomination Category for <Category>', 1, 33),
(27, 2, 'tMarkSelection', 'select nomination Bennett Miller', 'Actor', 'Bennett Miller', 'selecting nomination Bennett Miller', NULL, 'Nomination Category for <Category>', 1, 33),
(28, 2, 'tMarkSelection', 'select nomination Wes Anderson', 'Actor', 'Wes Anderson', 'selecting nomination Wes Anderson', NULL, 'Nomination Category for <Category>', 1, 33),
(29, 2, 'tMarkSelection', 'select nomination Morten Tyldum', 'Actor', 'Morten Tyldum', 'selecting nomination Morten Tyldum', NULL, 'Nomination Category for <Category>', 1, 33),
(30, 2, 'tMarkSelection', 'select nomination Bruce Dern', 'Actor', 'Bruce Dern', 'selecting nomination Bruce Dern', NULL, 'Nomination Category for <Category>', 1, 33),
(31, 2, 'tMarkSelection', 'select nomination Chiwetel Ejiofor', 'Actor', 'Chiwetel Ejiofor', 'selecting nomination Chiwetel Ejiofor', NULL, 'Nomination Category for <Category>', 1, 33),
(32, 2, 'tMarkSelection', 'select nomination Christian Bale', 'Actor', 'Christian Bale', 'selecting nomination Christian Bale', NULL, 'Nomination Category for <Category>', 1, 33),
(33, 2, 'tMarkSelection', 'select nomination Leonardo DiCaprio', 'Actor', 'Leonardo DiCaprio', 'selecting nomination Leonardo DiCaprio', NULL, 'Nomination Category for <Category>', 1, 33),
(34, 2, 'tMarkSelection', 'select nomination Matthew McConaughey', 'Actor', 'Matthew McConaughey', 'selecting nomination Matthew McConaughey', NULL, 'Nomination Category for <Category>', 1, 33),
(35, 2, 'tMarkSelection', 'select nomination Steve McQueen', 'Actor', 'Steve McQueen', 'selecting nomination Steve McQueen', NULL, 'Nomination Category for <Category>', 1, 33),
(36, 2, 'tMarkSelection', 'select nomination Alexander Payne', 'Actor', 'Alexander Payne', 'selecting nomination Alexander Payne', NULL, 'Nomination Category for <Category>', 1, 33),
(37, 2, 'tMarkSelection', 'select nomination David O. Russell', 'Actor', 'David O. Russell', 'selecting nomination David O. Russell', NULL, 'Nomination Category for <Category>', 1, 33),
(38, 2, 'tMarkSelection', 'select nomination Martin Scorsese', 'Actor', 'Martin Scorsese', 'selecting nomination Martin Scorsese', NULL, 'Nomination Category for <Category>', 1, 33),
(39, 2, 'tMarkSelection', 'select nomination Amy Adams', 'Actor', 'Amy Adams', 'selecting nomination Amy Adams', NULL, 'Nomination Category for <Category>', 1, 33),
(40, 2, 'tMarkSelection', 'select nomination Judi Dench', 'Actor', 'Judi Dench', 'selecting nomination Judi Dench', NULL, 'Nomination Category for <Category>', 1, 33),
(41, 2, 'tMarkSelection', 'select nomination Meryl Streep', 'Actor', 'Meryl Streep', 'selecting nomination Meryl Streep', NULL, 'Nomination Category for <Category>', 1, 33),
(42, 2, 'tMarkSelection', 'select nomination Sandra Bullock', 'Actor', 'Sandra Bullock', 'selecting nomination Sandra Bullock', NULL, 'Nomination Category for <Category>', 1, 33),
(43, 2, 'tFilter', 'select category Best Actor', 'Category', 'Best Actor', 'selecting category Best Actor', NULL, 'Nomination Category for <Category>', 1, 33),
(44, 2, 'tFilter', 'select category Best Actress', 'Category', 'Best Actress', 'selecting  category Best Actress', NULL, 'Nomination Category for <Category>', 1, 33),
(45, 2, 'tFilter', 'select category Best Director', 'Category', 'Best Director', 'selecting  category Best Director', NULL, 'Nomination Category for <Category>', 1, 33),
(46, 2, 'tFilter', 'select year 2016', 'Date', '2016', 'selecting 2016', NULL, 'Oscar Nominations for film', 1, 33),
(47, 2, 'tFilter', 'select year 2015', 'Date', '2015', 'selecting 2015', NULL, 'Oscar Nominations for film', 1, 33),
(48, 2, 'tFilter', 'select year 2014', 'Date', '2014', 'selecting 2014', NULL, 'Oscar Nominations for film', 1, 33),
(49, 2, 'tMarkSelection', 'select movie The Revenant', 'Film', 'The Revenant', 'selecting movie The Revenant', NULL, 'Oscar Nominations for film', 1, 33),
(50, 2, 'tMarkSelection', 'select movie The Martian', 'Film', 'The Martian', 'selecting movie The Martian', NULL, 'Oscar Nominations for film', 1, 33),
(51, 2, 'tMarkSelection', 'select movie Steve Jobs', 'Film', 'Steve Jobs', 'selecting movie Steve Jobs', NULL, 'Oscar Nominations for film', 1, 33),
(52, 2, 'tMarkSelection', 'select movie The Danish Girl', 'Film', 'The Danish Girl', 'selecting movie The Danish Girl', NULL, 'Oscar Nominations for film', 1, 33),
(53, 2, 'tMarkSelection', 'select movie Trumbo', 'Film', 'Trumbo', 'selecting movie Trumbo', NULL, 'Oscar Nominations for film', 1, 33),
(54, 2, 'tMarkSelection', 'select movie Room', 'Film', 'Room', 'selecting movie Room', NULL, 'Oscar Nominations for film', 1, 33),
(55, 2, 'tMarkSelection', 'select movie Carol', 'Film', 'Carol', 'selecting movie Carol', NULL, 'Oscar Nominations for film', 1, 33),
(56, 2, 'tMarkSelection', 'select movie Brooklyn', 'Film', 'Brooklyn', 'selecting movie Brooklyn', NULL, 'Oscar Nominations for film', 1, 33),
(57, 2, 'tMarkSelection', 'select movie Joy', 'Film', 'Joy', 'selecting movie Joy', NULL, 'Oscar Nominations for film', 1, 33),
(58, 2, 'tMarkSelection', 'select movie Birdman ', 'Film', 'Birdman ', 'selecting movie Birdman ', NULL, 'Oscar Nominations for film', 1, 33),
(59, 2, 'tMarkSelection', 'select movie Spotlight', 'Film', 'Spotlight', 'selecting movie Spotlight', NULL, 'Oscar Nominations for film', 1, 33),
(60, 2, 'tMarkSelection', 'select movie Mad Max: Fury Road ', 'Film', 'Mad Max: Fury Road ', 'selecting movie Mad Max: Fury Road ', NULL, 'Oscar Nominations for film', 1, 33),
(61, 2, 'tMarkSelection', 'select movie The Big Short', 'Film', 'The Big Short', 'selecting movie The Big Short', NULL, 'Oscar Nominations for film', 1, 33),
(62, 2, 'tMarkSelection', 'select movie The Imitation Game', 'Film', 'The Imitation Game', 'selecting movie The Imitation Game', NULL, 'Oscar Nominations for film', 1, 33),
(63, 2, 'tMarkSelection', 'select movie American Sniper', 'Film', 'American Sniper', 'selecting movie American Sniper', NULL, 'Oscar Nominations for film', 1, 33),
(64, 2, 'tMarkSelection', 'select movie Birdman', 'Film', 'Birdman', 'selecting movie Birdman', NULL, 'Oscar Nominations for film', 1, 33),
(65, 2, 'tMarkSelection', 'select movie Foxcatcher', 'Film', 'Foxcatcher', 'selecting movie Foxcatcher', NULL, 'Oscar Nominations for film', 1, 33),
(66, 2, 'tMarkSelection', 'select movie The Theory of Everything', 'Film', 'The Theory of Everything', 'selecting movie The Theory of Everything', NULL, 'Oscar Nominations for film', 1, 33),
(67, 2, 'tMarkSelection', 'select movie Two Days, One Night', 'Film', 'Two Days, One Night', 'selecting movie Two Days, One Night', NULL, 'Oscar Nominations for film', 1, 33),
(68, 2, 'tMarkSelection', 'select movie Wild', 'Film', 'Wild', 'selecting movie Wild', NULL, 'Oscar Nominations for film', 1, 33),
(69, 2, 'tMarkSelection', 'select movie Gone Girl', 'Film', 'Gone Girl', 'selecting movie Gone Girl', NULL, 'Oscar Nominations for film', 1, 33),
(70, 2, 'tMarkSelection', 'select movie Still Alice', 'Film', 'Still Alice', 'selecting movie Still Alice', NULL, 'Oscar Nominations for film', 1, 33),
(71, 2, 'tMarkSelection', 'select movie Boyhood', 'Film', 'Boyhood', 'selecting movie Boyhood', NULL, 'Oscar Nominations for film', 1, 33),
(72, 2, 'tMarkSelection', 'select movie The Grand Budapest Hotel', 'Film', 'The Grand Budapest Hotel', 'selecting movie The Grand Budapest Hotel', NULL, 'Oscar Nominations for film', 1, 33),
(73, 2, 'tMarkSelection', 'select movie Nebraska', 'Film', 'Nebraska', 'selecting movie Nebraska', NULL, 'Oscar Nominations for film', 1, 33),
(74, 2, 'tMarkSelection', 'select movie 12 Years a Slave', 'Film', '12 Years a Slave', 'selecting movie 12 Years a Slave', NULL, 'Oscar Nominations for film', 1, 33),
(75, 2, 'tMarkSelection', 'select movie American Hustle', 'Film', 'American Hustle', 'selecting movie American Hustle', NULL, 'Oscar Nominations for film', 1, 33),
(76, 2, 'tMarkSelection', 'select movie The Wolf of Wall Street', 'Film', 'The Wolf of Wall Street', 'selecting movie The Wolf of Wall Street', NULL, 'Oscar Nominations for film', 1, 33),
(77, 2, 'tMarkSelection', 'select movie Dallas Buyers Club', 'Film', 'Dallas Buyers Club', 'selecting movie Dallas Buyers Club', NULL, 'Oscar Nominations for film', 1, 33),
(78, 2, 'tMarkSelection', 'select movie Philomena', 'Film', 'Philomena', 'selecting movie Philomena', NULL, 'Oscar Nominations for film', 1, 33),
(79, 2, 'tMarkSelection', 'select movie August: Osage County', 'Film', 'August: Osage County', 'selecting movie August: Osage County', NULL, 'Oscar Nominations for film', 1, 33),
(80, 2, 'tMarkSelection', 'select movie Gravity', 'Film', 'Gravity', 'selecting movie Gravity', NULL, 'Oscar Nominations for film', 1, 33),
(81, 2, 'tMarkSelection', 'select movie Blue Jasmine', 'Film', 'Blue Jasmine', 'selecting movie Blue Jasmine', NULL, 'Oscar Nominations for film', 1, 33),
(88, 2, 'clearSelection', 'clear all films', 'Film', '', 'clearing all films', NULL, 'Oscar Nominations for film', 1, 33),
(89, 2, 'tClearfilter', 'clear all year', 'Date', '', 'clearing all date', NULL, 'Oscar Nominations for film', 1, 33),
(90, 2, 'clearSelection', 'clear all nomination', 'Actor', '', 'clearing all nomination', NULL, 'Nomination Category for <Category>', 1, 33),
(91, 2, 'tClearfilter', 'clear all category', 'Category', '', 'clearing all category', NULL, 'Nomination Category for <Category>', 1, 33),
(92, 2, 'tAllfilter', 'select all year', 'Date', '', 'selecting all year', NULL, 'Oscar Nominations for film', 1, 33),
(93, 2, 'tAllfilter', 'select all category', 'Category', '', 'selecting all category', NULL, 'Nomination Category for <Category>', 1, 33),
(94, 2, 'tAddfilter', 'add category Best Actor', 'Category', 'Best Actor', 'adding category Best Actor', NULL, 'Nomination Category for <Category>', 1, 33),
(95, 2, 'tAddfilter', 'add category Best Actress', 'Category', 'Best Actress', 'adding category Best Actress', NULL, 'Nomination Category for <Category>', 1, 33),
(96, 2, 'tAddfilter', 'add category Best Director', 'Category', 'Best Director', 'adding category Best Director', NULL, 'Nomination Category for <Category>', 1, 33),
(97, 2, 'tRemovefilter', 'remove category Best Actor', 'Category', 'Best Actor', 'removing Best Actor', NULL, 'Nomination Category for <Category>', 1, 33),
(98, 2, 'tRemovefilter', 'remove category Best Actress', 'Category', 'Best Actress', 'removing Best Actress', NULL, 'Nomination Category for <Category>', 1, 33),
(99, 2, 'tRemovefilter', 'remove category Best Director', 'Category', 'Best Director', 'removing Best Director', NULL, 'Nomination Category for <Category>', 1, 33),
(101, 1, 'DynamicTableCommandtHierarchyfilter', 'select City', 'Region,State,City,City', '', 'selecting city', 'executive_summary', 'CustomerRank', 1, 33),
(102, 1, 'DynamicTableCommand-tfilter', 'Order Date', 'Order Date', '', 'Order Date', 'executive_summary', 'CustomerRank', 1, 33),
(103, 1, 'tparameter', 'Select Top {number} Customers', 'Select Top N Customers', '100', '', '', '', 1, 33),
(104, 2, 'startOver', 'reset all', '', '', 'reseting all', '', '', 1, 33),
(105, 2, 'startOver', 'Start over', '', '', 'Starting over', '', '', 1, 33),
(106, 2, 'model_popup_show', 'Show help', '', 'myModal', 'showing help', '', '', 1, 33),
(107, 2, 'model_popup_hide', 'hide help', '', 'myModal', 'hiding help', '', '', 1, 33),
(108, 1, 'addValuestMarkSelection', '', '', '', '', '', '', 1, 33);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `values` text NOT NULL,
  `status` int(11) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `type`, `values`, `status`, `description`) VALUES
(1, 'tNavigate', '', 1, 'navigate one dashboard to another dashboard'),
(2, 'startOver', '', 1, 'reset current dashboard'),
(3, 'tMarkSelection', '', 1, 'select single mark on specified chart'),
(4, 'addValuestMarkSelection', '', 1, 'add marks to existing selections on specified chart'),
(5, 'removeFromtMarkSelection', '', 1, 'remove marks to existing selections on specified chart'),
(6, 'clearSelection', '', 1, 'clear all  marks to existing selections on specified chart'),
(7, 'tFilter', '', 1, 'Single value selection on Radio button or Multibox '),
(8, 'tAddfilter', '', 1, 'Filter - adding new filter'),
(9, 'tRemovefilter', '', 1, 'Filter - removing new filter'),
(10, 'tAllfilter', '', 1, 'All values'),
(11, 'tClearfilter', '', 1, 'Clearing a Filter'),
(12, 'scrollLeft', '', 1, 'Scroll left'),
(13, 'scrollRight', '', 1, 'Scroll right'),
(14, 'scrollUp', '', 1, 'Scroll up'),
(15, 'scrollDown', '', 1, 'Scroll down'),
(16, 'scrolltop', '', 1, 'Scroll top'),
(17, 'DynamicTableCommand-tfilter', '', 1, 'dynamicall create commands from database'),
(18, 'tRadioButtonAnonymusVoice', '', 1, 'Work for filter doesnot require value. It automitically check the values and search on filter if value match then it select the value from filter else only refres'),
(19, 'tMultiBoxAnonymusVoiceAdd', '', 1, 'Work for filter doesnot require value. It automitically check the values and search on filter if value match then it add selection to filter else only refresh'),
(20, 'tMultiBoxAnonymusVoiceRemove', '', 1, 'Work for filter doesnot require value. It automitically check the values and search on filter if value match then it remove selection to filter else only refresh'),
(21, 'tMultiBoxAnonymusVoiceAddSingle', '', 1, 'Work for filter doesnot require value. It automitically check the values and search on filter if value match then it remove selection to filter else only refresh'),
(22, 'tMarlSelectionAnonymusVoiceSingle', '', 1, 'Work for filter doesnot require value. It automitically check the values and search on filter if value match then it add selection to chart else only refresh'),
(23, 'tMarlSelectionAnonymusVoiceRemove', '', 1, 'Work for filter doesnot require value. It automitically check the values and search on filter if value match then it remove selection to chart else only refresh'),
(24, 'tMarlSelectionAnonymusVoiceADD', '', 1, 'Work for filter doesnot require value. It automitically check the values and search on filter if value match then it add selection to filter else only refresh'),
(25, 'DynamicTableCommand-tMark', '', 1, 'dynamicall create commands from database'),
(26, 'tHierarchyfilter', '', 1, 'for Hierarchy filters'),
(27, 'DynamicTableCommandtHierarchyfilter', '', 1, 'dynamic tHierarchyfilter'),
(28, 'tparameter', '', 1, 'set paramenter'),
(29, 'model_popup_show', '', 1, NULL),
(30, 'model_popup_hide', '', 1, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
