-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2022 at 09:16 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aglet-tc`
--

-- --------------------------------------------------------

--
-- Table structure for table `tc_favourites`
--

CREATE TABLE `tc_favourites` (
  `id` int(11) NOT NULL,
  `tc_movie_id` varchar(55) NOT NULL,
  `tc_movie_title` varchar(55) NOT NULL,
  `tc_movie_img` text NOT NULL,
  `tc_release_date` year(4) NOT NULL,
  `tc_movie_overview` text NOT NULL,
  `tc_movie_url` text NOT NULL,
  `tc_liked_by` varchar(55) NOT NULL,
  `tc_date_liked` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tc_favourites`
--

INSERT INTO `tc_favourites` (`id`, `tc_movie_id`, `tc_movie_title`, `tc_movie_img`, `tc_release_date`, `tc_movie_overview`, `tc_movie_url`, `tc_liked_by`, `tc_date_liked`) VALUES
(22, '642885', 'Hocus Pocus 2', 'https://image.tmdb.org/t/p/w500/7ze7YNmUaX81ufctGqt0AgHxRtL.jpg', 2022, 'It’s been 29 years since someone lit the Black Flame Candle and resurrected the 17th-century sisters, and they are looking for revenge. Now it is up to three high-school students to stop the ravenous witches from wreaking a new kind of havoc on Salem before dawn on All Hallow’s Eve.', '', '', '2022-10-13 15:08:00'),
(23, '960704', 'Fullmetal Alchemist: The Final Alchemy', 'https://image.tmdb.org/t/p/w500/AeyiuQUUs78bPkz18FY3AzNFF8b.jpg', 2022, 'The Elric brothers’ long and winding journey comes to a close in this epic finale, where they must face off against an unworldly, nationwide threat.', '', '', '2022-10-13 15:09:53'),
(24, '760161', 'Orphan: First Kill', 'https://image.tmdb.org/t/p/w500/pHkKbIRoCe7zIFvqan9LFSaQAde.jpg', 2022, 'After escaping from an Estonian psychiatric facility, Leena Klammer travels to America by impersonating Esther, the missing daughter of a wealthy family. But when her mask starts to slip, she is put against a mother who will protect her family from the murderous “child” at any cost.', '', '', '2022-10-13 15:12:39'),
(25, '429473', 'Lou', 'https://image.tmdb.org/t/p/w500/djM2s4wSaATn4jVB33cV05PEbV7.jpg', 2022, 'A young girl is kidnapped during a powerful storm. Her mother joins forces with her mysterious neighbour to set off in pursuit of the kidnapper. Their journey will test their limits and expose the dark secrets of their past.', '', '', '2022-10-13 15:12:58'),
(30, '960704', 'Fullmetal Alchemist: The Final Alchemy', 'https://image.tmdb.org/t/p/w500/AeyiuQUUs78bPkz18FY3AzNFF8b.jpg', 2022, 'The Elric brothers’ long and winding journey comes to a close in this epic finale, where they must face off against an unworldly, nationwide threat.', '', 'jointheteam', '2022-10-13 22:21:39'),
(31, '760161', 'Orphan: First Kill', 'https://image.tmdb.org/t/p/w500/pHkKbIRoCe7zIFvqan9LFSaQAde.jpg', 2022, 'After escaping from an Estonian psychiatric facility, Leena Klammer travels to America by impersonating Esther, the missing daughter of a wealthy family. But when her mask starts to slip, she is put against a mother who will protect her family from the murderous “child” at any cost.', '', 'jointheteam', '2022-10-13 22:21:42');

-- --------------------------------------------------------

--
-- Table structure for table `tc_inbox`
--

CREATE TABLE `tc_inbox` (
  `id` int(11) NOT NULL,
  `tc_from` varchar(255) NOT NULL,
  `tc_msg` text NOT NULL,
  `tc_email` varchar(255) NOT NULL,
  `tc_status` varchar(55) NOT NULL,
  `tc_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tc_inbox`
--

INSERT INTO `tc_inbox` (`id`, `tc_from`, `tc_msg`, `tc_email`, `tc_status`, `tc_date`) VALUES
(1, 'jjk', 'jbnnmbn', 'kjj@jkj.xom', 'Unread', '2022-10-13 14:10:56'),
(2, 'jjk', 'jbnnmbn', 'kjj@jkj.xom', 'Unread', '2022-10-13 14:16:03'),
(3, 'jjk', 'jbnnmbn', 'kjj@jkj.xom', 'Unread', '2022-10-13 14:17:11');

-- --------------------------------------------------------

--
-- Table structure for table `tc_users`
--

CREATE TABLE `tc_users` (
  `id` int(11) NOT NULL,
  `tc_username` varchar(55) NOT NULL,
  `tc_email` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `tc_favourites` varchar(55) NOT NULL DEFAULT '0',
  `tc_password` text NOT NULL,
  `tc_role` varchar(55) NOT NULL DEFAULT 'subscriber',
  `log_attempts` tinyint(4) NOT NULL DEFAULT 0,
  `blocked_until` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tc_users`
--

INSERT INTO `tc_users` (`id`, `tc_username`, `tc_email`, `created`, `tc_favourites`, `tc_password`, `tc_role`, `log_attempts`, `blocked_until`) VALUES
(1, 'jointheteam', 'jointheteam@aglet.co.za', '2022-10-10 14:38:10', '0', 'bc5b20e2010c48452541558eea70cf69', 'subscriber', 0, '00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tc_favourites`
--
ALTER TABLE `tc_favourites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tc_inbox`
--
ALTER TABLE `tc_inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tc_users`
--
ALTER TABLE `tc_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tc_favourites`
--
ALTER TABLE `tc_favourites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tc_inbox`
--
ALTER TABLE `tc_inbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tc_users`
--
ALTER TABLE `tc_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
