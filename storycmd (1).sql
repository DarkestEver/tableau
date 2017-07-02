-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2017 at 10:59 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tableau`
--

-- --------------------------------------------------------

--
-- Table structure for table `storycmd`
--

CREATE TABLE `storycmd` (
  `id` int(11) NOT NULL,
  `groups` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `command` varchar(255) DEFAULT NULL,
  `dimension` varchar(255) DEFAULT NULL,
  `value` varchar(2048) DEFAULT NULL,
  `Speech` varchar(255) DEFAULT NULL,
  `TableauTable` varchar(255) DEFAULT NULL,
  `TableauSheet` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `grpid` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `createdon` date DEFAULT NULL,
  `modifiedon` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storycmd`
--

INSERT INTO `storycmd` (`id`, `groups`, `type`, `command`, `dimension`, `value`, `Speech`, `TableauTable`, `TableauSheet`, `status`, `grpid`, `order`, `time`, `userid`, `createdon`, `modifiedon`) VALUES
(133, 36, 'tSwitchDashboard', NULL, '', '', '', NULL, 'https://public.tableau.com/views/OscarAwardsvs/2016?:embed=y&:display_count=yes?%3Aembed=y&%3AshowVizHome=no&%3Adisplay_count=y', 1, 0, 1, 0, 5, NULL, NULL),
(134, 36, 'tMarkSelection', NULL, 'Actor', 'Bryan Cranston', 'Bryan Cranston won an academy award for the role  Dalton Trumbo in the movie  Trumbo was nominated for his 1st oscar nomination', NULL, 'Best Actor - 2016.', 1, 0, 1, 12, 5, NULL, NULL),
(135, 36, 'tMarkSelection', NULL, 'Actor', 'Eddie Redmayne', 'Eddie Redmayne won an   academy award for the role  Lili Elbe  Einar Wegener in the movie  The Danish Girl was nominated for his 2nd oscar nomination', NULL, 'Best Actor - 2016.', 1, 0, 2, 12, 5, NULL, NULL),
(136, 36, 'tMarkSelection', NULL, 'Actor', 'Matt Damon', 'Matt Damon won an academy award for the role  Mark Watney in the movie  The Martian was nominated for his 3rd oscar nomination', NULL, 'Best Actor - 2016.', 1, 0, 3, 12, 5, NULL, NULL),
(137, 36, 'tMarkSelection', NULL, 'Actor', 'Michael Fassbender', 'Michael Fassbender won an academy award for the role  Steve Jobs in the movie  Steve Jobs was nominated for his 2nd oscar nomination', NULL, 'Best Actor - 2016.', 1, 0, 4, 12, 5, NULL, NULL),
(138, 36, 'tMarkSelection', NULL, 'Actor', 'Leonardo DiCaprio', 'Leonardo DiCaprio won an academy award for the role  Jordan Belfort in the movie  The Wolf of Wall Street was nominated for his 4th oscar nomination', NULL, 'Best Actor - 2016.', 1, 0, 5, 12, 5, NULL, NULL),
(139, 36, 'tMarkSelection', NULL, 'Actor', 'Brie Larson', 'Brie Larson won an academy   award for the role  Joy Ma Newsome in the movie  Room was nominated for her 1st oscar nomination', NULL, 'Best Actress-2016.', 1, 0, 10, 12, 5, NULL, NULL),
(140, 36, 'tMarkSelection', NULL, 'Actor', 'Cate Blanchett', 'Cate Blanchett won an academy award for the role  Carol Aird in the movie  Carol was nominated for her 7th oscar nomination', NULL, 'Best Actress-2016.', 1, 0, 6, 12, 5, NULL, NULL),
(141, 36, 'tMarkSelection', NULL, 'Actor', 'Charlotte Rampling', 'Charlotte Rampling won an academy award for the role  Kate Mercer in the movie  45 Years was nominated for her 1st oscar nomination', NULL, 'Best Actress-2016.', 1, 0, 7, 12, 5, NULL, NULL),
(142, 36, 'tMarkSelection', NULL, 'Actor', 'Jennifer Lawrence', 'Jennifer Lawrence won an academy award for the role  Joy Mangano in the movie  Joy was nominated for her 4th oscar nomination', NULL, 'Best Actress-2016.', 1, 0, 8, 12, 5, NULL, NULL),
(143, 36, 'tMarkSelection', NULL, 'Actor', 'Saoirse Ronan', 'Saoirse Ronan won an academy award for the role  Eilis Lacey in the movie  Brooklyn was nominated for her 2nd oscar nomination', NULL, 'Best Actress-2016.', 1, 0, 9, 12, 5, NULL, NULL),
(144, 36, 'tMarkSelection', NULL, 'Actor', 'Adam McKay', 'Adam McKay  won an academy award for the role  The Big Short in the movie  The Big Short was nominated for his 1st oscar nomination', NULL, 'Best Director-2016 .', 1, 0, 11, 12, 5, NULL, NULL),
(145, 36, 'tMarkSelection', NULL, 'Actor', 'Alejandro G. Iñárritu', 'Alejandro González Iñárritu won an academy award for the role  Birdman in the movie  Birdman was nominated for his 1st oscar nomination', NULL, 'Best Director-2016 .', 1, 0, 15, 12, 5, NULL, NULL),
(146, 36, 'tMarkSelection', NULL, 'Actor', 'George Miller', 'George Miller  won an academy award for the role  Mad Max: Fury Road  in the movie  Mad Max: Fury Road  was nominated for his 1st oscar nomination', NULL, 'Best Director-2016 .', 1, 0, 12, 12, 5, NULL, NULL),
(147, 36, 'tMarkSelection', NULL, 'Actor', 'Lenny Abrahamson', 'Lenny Abrahamson  won an academy award for the role  Room in the movie  Room was nominated for his 1st oscar nomination', NULL, 'Best Director-2016 .', 1, 0, 13, 12, 5, NULL, NULL),
(148, 36, 'tMarkSelection', NULL, 'Actor', 'Tom McCarthy', 'Tom McCarthy  won an academy award for the role  Spotlight in the movie  Spotlight was nominated for his 1st oscar nomination', NULL, 'Best Director-2016 .', 1, 0, 14, 12, 5, NULL, NULL),
(149, 36, 'stopStory', NULL, '', '', 'Story end', NULL, '', 1, 0, 1, 3, 5, NULL, NULL),
(150, 36, 'tSwitchDashboard', NULL, '', '', '', NULL, 'https://public.tableau.com/views/OscarAwardsvs/2015?:embed=y&:display_count=yes?%3Aembed=y&%3AshowVizHome=no&%3Adisplay_count=y', 1, 1, 1, 0, 5, NULL, NULL),
(151, 36, 'tMarkSelection', NULL, 'Actor', 'Benedict Cumberbatch', 'Benedict Cumberbatch won an academy award for the role  Alan Turing in the movie  The Imitation Game was nominated for his 1st oscar nomination', NULL, 'Best Actor-2015.', 1, 1, 1, 12, 5, NULL, NULL),
(152, 36, 'tMarkSelection', NULL, 'Actor', 'Bradley Cooper', 'Bradley Cooper won an academy award for the role  Chris Kyle in the movie  American Sniper was nominated for his 3rd oscar nomination', NULL, 'Best Actor-2015.', 1, 1, 2, 12, 5, NULL, NULL),
(153, 36, 'tMarkSelection', NULL, 'Actor', 'Michael Keaton', 'Michael Keaton won an academy award for the role  Riggan Thomson in the movie  Birdman was nominated for his 1st oscar nomination', NULL, 'Best Actor-2015.', 1, 1, 3, 12, 5, NULL, NULL),
(154, 36, 'tMarkSelection', NULL, 'Actor', 'Steve Carell', 'Steve Carell won an academy award for the role  John du Pont in the movie  Foxcatcher was nominated for his 1st oscar nomination', NULL, 'Best Actor-2015.', 1, 1, 4, 12, 5, NULL, NULL),
(155, 36, 'tMarkSelection', NULL, 'Actor', 'Eddie Redmayne', 'Eddie Redmayne won an   academy award for the role  Lili Elbe  Einar Wegener in the movie  The Danish Girl was nominated for his 2nd oscar nomination', NULL, 'Best Actor-2015.', 1, 1, 5, 12, 5, NULL, NULL),
(156, 36, 'tMarkSelection', NULL, 'Actor', 'Felicity Jones', 'Felicity Jones won an academy award for the role  Jane Wilde-Hawking in the movie  The Theory of Everything was nominated for her 1st oscar nomination', NULL, 'Best Actress-2015.', 1, 1, 6, 12, 5, NULL, NULL),
(157, 36, 'tMarkSelection', NULL, 'Actor', 'Julianne Moore', 'Julianne Moore won an academy award for the role  Alice Daly-Howland in the movie  Still Alice was nominated for her 5th oscar nomination', NULL, 'Best Actress-2015.', 1, 1, 10, 12, 5, NULL, NULL),
(158, 36, 'tMarkSelection', NULL, 'Actor', 'Marion Cotillard', 'Marion Cotillard won an academy award for the role  Sandra Bya in the movie  Two Days, One Night was nominated for her 2nd oscar nomination', NULL, 'Best Actress-2015.', 1, 1, 7, 12, 5, NULL, NULL),
(159, 36, 'tMarkSelection', NULL, 'Actor', 'Reese Witherspoon', 'Reese Witherspoon won an academy award for the role  Cheryl Strayed in the movie  Wild was nominated for her 2nd oscar nomination', NULL, 'Best Actress-2015.', 1, 1, 8, 12, 5, NULL, NULL),
(160, 36, 'tMarkSelection', NULL, 'Actor', 'Rosamund Pike', 'Rosamund Pike won an academy award for the role  Amy Elliott-Dunne in the movie  Gone Girl was nominated for her 1st oscar nomination', NULL, 'Best Actress-2015.', 1, 1, 9, 12, 5, NULL, NULL),
(161, 36, 'tMarkSelection', NULL, 'Actor', 'Alejandro G. Iñárritu', 'Alejandro González Iñárritu won an academy award for the role  Birdman in the movie  Birdman was nominated for his 1st oscar nomination', NULL, 'Best Director-2015 .', 1, 1, 15, 12, 5, NULL, NULL),
(162, 36, 'tMarkSelection', NULL, 'Actor', 'Bennett Miller', 'Bennett Miller won an academy award for the role  Foxcatcher in the movie  Foxcatcher was nominated for his 1st oscar nomination', NULL, 'Best Director-2015 .', 1, 1, 11, 12, 5, NULL, NULL),
(163, 36, 'tMarkSelection', NULL, 'Actor', 'Morten Tyldum', 'Morten Tyldum won an academy award for the role  The Imitation Game in the movie  The Imitation Game was nominated for his 1st oscar nomination', NULL, 'Best Director-2015 .', 1, 1, 12, 12, 5, NULL, NULL),
(164, 36, 'tMarkSelection', NULL, 'Actor', 'Richard Linklater', 'Richard Linklater won an academy award for the role  Boyhood in the movie  Boyhood was nominated for his 1st oscar nomination', NULL, 'Best Director-2015 .', 1, 1, 13, 12, 5, NULL, NULL),
(165, 36, 'tMarkSelection', NULL, 'Actor', 'Wes Anderson', 'Wes Anderson won an academy award for the role  The Grand Budapest Hotel in the movie  The Grand Budapest Hotel was nominated for his 1st oscar nomination', NULL, 'Best Director-2015 .', 1, 1, 14, 12, 5, NULL, NULL),
(166, 36, 'stopStory', NULL, '', '', 'Story end', NULL, '', 1, 1, 1, 6, 5, NULL, NULL),
(167, 36, 'tSwitchDashboard', NULL, '', '', '', NULL, 'https://public.tableau.com/views/OscarAwardsvs/2014?:embed=y&:display_count=yes?%3Aembed=y&%3AshowVizHome=no&%3Adisplay_count=y', 1, 2, 1, 0, 5, NULL, NULL),
(168, 36, 'tMarkSelection', NULL, 'Actor', 'Bruce Dern', 'Bruce Dern won an academy award for the role  Woodrow Woody Grant in the movie  Nebraska was nominated for his 2nd oscar nomination', NULL, 'Best Actor- 2014.', 1, 2, 1, 12, 5, NULL, NULL),
(169, 36, 'tMarkSelection', NULL, 'Actor', 'Chiwetel Ejiofor', 'Chiwetel Ejiofor won an academy award for the role  Solomon   Northup in the movie  12 Years a Slave was nominated for his 1st oscar nomination', NULL, 'Best Actor- 2014.', 1, 2, 1, 12, 5, NULL, NULL),
(170, 36, 'tMarkSelection', NULL, 'Actor', 'Christian Bale', 'Christian Bale won an academy award for the role  Irving Rosenfeld in the movie  American Hustle was nominated for his 2nd oscar nomination', NULL, 'Best Actor- 2014.', 1, 2, 3, 12, 5, NULL, NULL),
(171, 36, 'tMarkSelection', NULL, 'Actor', 'Leonardo DiCaprio', 'Leonardo DiCaprio won an academy award for the role  Jordan Belfort in the movie  The Wolf of Wall Street was nominated for his 4th oscar nomination', NULL, 'Best Actor- 2014.', 1, 2, 4, 12, 5, NULL, NULL),
(172, 36, 'tMarkSelection', NULL, 'Actor', 'Matthew McConaughey', 'Matthew McConaughey won an academy award for the role  Ron Woodroof in the movie  Dallas Buyers Club was nominated for his 1st oscar nomination', NULL, 'Best Actor- 2014.', 1, 2, 5, 12, 5, NULL, NULL),
(173, 36, 'tMarkSelection', NULL, 'Actor', 'Alexander Payne', 'Alexander Payne won an academy award for the role  Nebraska in the movie  Nebraska was nominated for his 1st oscar nomination', NULL, 'Best Director- 2014.', 1, 2, 11, 12, 5, NULL, NULL),
(174, 36, 'tMarkSelection', NULL, 'Actor', 'David O. Russell', 'David O. Russell won an academy award for the role  American Hustle in the movie  American Hustle was nominated for his 1st oscar nomination', NULL, 'Best Director- 2014.', 1, 2, 12, 12, 5, NULL, NULL),
(175, 36, 'tMarkSelection', NULL, 'Actor', 'Martin Scorsese', 'Martin Scorsese won an academy award for the role  The Wolf of Wall Street in the movie  The Wolf of Wall Street was nominated for his 1st oscar nomination', NULL, 'Best Director- 2014.', 1, 2, 13, 12, 5, NULL, NULL),
(176, 36, 'tMarkSelection', NULL, 'Actor', 'Steve McQueen', 'Steve McQueen won an academy award for the role  12 Years a Slave in the movie  12 Years a Slave was nominated for his 1st oscar nomination', NULL, 'Best Director- 2014.', 1, 2, 14, 12, 5, NULL, NULL),
(177, 36, 'tMarkSelection', NULL, 'Actor', 'Alfonso Cuarón', 'Alfonso Cuarón won an academy award for the role  Gravity in the movie  Gravity was nominated for his 1st oscar nomination', NULL, 'Best Director- 2014.', 1, 2, 15, 12, 5, NULL, NULL),
(178, 36, 'tMarkSelection', NULL, 'Actor', 'Amy Adams', 'Amy Adams won an academy award for the role  Sydney Prosser  Lady Edith Greensly in the movie  American Hustle was nominated for her 5th oscar nomination', NULL, 'Best Actress-2014.', 1, 2, 6, 12, 5, NULL, NULL),
(179, 36, 'tMarkSelection', NULL, 'Actor', 'Judi Dench', 'Judi Dench won an academy award for the role  Philomena Lee in the movie  Philomena was nominated for her 7th oscar nomination', NULL, 'Best Actress-2014.', 1, 2, 7, 12, 5, NULL, NULL),
(180, 36, 'tMarkSelection', NULL, 'Actor', 'Meryl Streep', 'Meryl Streep won an academy award for the role  Violet Weston in the movie  August: Osage County was nominated for her 18th oscar nomination', NULL, 'Best Actress-2014.', 1, 2, 8, 12, 5, NULL, NULL),
(181, 36, 'tMarkSelection', NULL, 'Actor', 'Sandra Bullock', 'Sandra Bullock won an academy award for the role  Ryan Stone in the movie  Gravity was nominated for her 2nd oscar nomination', NULL, 'Best Actress-2014.', 1, 2, 9, 12, 5, NULL, NULL),
(182, 36, 'tMarkSelection', NULL, 'Actor', 'Cate Blanchett', 'Cate Blanchett won an academy award for the role  Carol Aird in the movie  Carol was nominated for her 7th oscar nomination', NULL, 'Best Actress-2014.', 1, 2, 10, 12, 5, NULL, NULL),
(183, 36, 'stopStory', NULL, '', '', 'Story end', NULL, '', 1, 2, 1, 6, 5, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `storycmd`
--
ALTER TABLE `storycmd`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `storycmd`
--
ALTER TABLE `storycmd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
