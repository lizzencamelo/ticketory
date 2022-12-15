-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 11:09 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticketory`
--

-- --------------------------------------------------------

--
-- Table structure for table `concerts`
--

CREATE TABLE `concerts` (
  `event_id` int(11) NOT NULL,
  `venue_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `concert_name` varchar(150) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(10) NOT NULL,
  `event_price` int(10) DEFAULT NULL,
  `event_capacity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `concerts`
--

INSERT INTO `concerts` (`event_id`, `venue_id`, `artist_id`, `concert_name`, `date`, `time`, `event_price`, `event_capacity`) VALUES
(1, 11, 1, 'Shania Twain: Queen Of Me', '2023-01-28', '7:00 pm', 1300, 12636),
(2, 12, 1, 'Shania Twain: Queen Of Me', '2023-04-29', '7:30 pm', 1300, 17459),
(3, 13, 1, 'Shania Twain: Queen Of Me', '2023-05-30', '7:30 pm', 1300, 20106),
(4, 14, 2, 'Taylor Swift: The Eras', '2023-03-25', '7:30 pm', 1200, 61000),
(5, 15, 2, 'Taylor Swift: The Eras', '2023-04-22', '7:30 pm', 1200, 72215),
(6, 16, 2, 'Taylor Swift: The Eras', '2023-05-12', '7:30 pm', 1200, 67593),
(7, 17, 3, 'The EAGLES: Hotel California', '2023-02-21', '7:00 pm', 1400, 17557),
(8, 3, 3, 'The EAGLES: Hotel California', '2023-03-01', '7:00 pm', 1400, 18422),
(9, 17, 11, 'Ultraviolence', '2023-02-21', '7:00 pm', 1000, 17556),
(10, 18, 5, 'Bruno Mars Las Vegas ', '2023-01-27', '7:00 pm', 2500, 6367),
(11, 18, 5, 'Bruno Mars Las Vegas ', '2023-02-01', '7:00 pm', 2500, 6388),
(12, 18, 6, 'Maroon 5: The Las Vegas Residency', '2023-03-24', '7:00 pm', 1300, 6393),
(13, 18, 6, 'Maroon 5: The Las Vegas Residency', '2023-03-25', '7:00 pm', 1300, 6400),
(14, 18, 6, 'Maroon 5: The Las Vegas Residency', '2023-06-01', '7:30 pm', 1300, 6400),
(15, 18, 6, 'Maroon 5: The Las Vegas Residency', '2023-04-05', '7:00 pm', 1300, 6400),
(16, 19, 7, 'Poptopia ', '2022-12-23', '7:00 pm', 1400, 20355),
(17, 20, 8, 'Ed Sheeran Tour', '2023-02-10', '7:00 pm', 2850, 65890),
(18, 21, 8, 'Ed Sheeran Tour', '2023-03-12', '7:30 pm', 2850, 61500),
(19, 18, 9, 'Lana Del Ray: Born To Die', '2022-12-20', '8:00 pm', 3400, 63982),
(20, 8, 10, 'Lana Del Ray: Paradise', '2022-12-21', '8:00 pm', 3400, 79996),
(21, 16, 10, 'Lana Del Ray: Paradise', '2023-05-19', '8:00 pm', 3400, 67580),
(22, 16, 10, 'Lana Del Ray: Paradise', '2023-02-19', '8:00 pm', 3400, 67594),
(23, 16, 11, 'Lana Del Ray: Ultraviolence', '2022-12-27', '8:00 pm', 6500, 67594),
(24, 16, 10, 'Lana Del Ray: Ultraviolence', '2023-01-27', '8:00 pm', 6500, 67590),
(25, 16, 10, 'Lana Del Ray: Ultraviolence', '2023-02-27', '8:00 pm', 6500, 67594);

--
-- Triggers `concerts`
--
DELIMITER $$
CREATE TRIGGER `initialise_concert_event_capacity` BEFORE INSERT ON `concerts` FOR EACH ROW SET new.event_capacity = (SELECT venue_capacity FROM venues WHERE venue_id = new.venue_id)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
  `event_id` int(11) NOT NULL,
  `venue_id` int(11) NOT NULL,
  `game_name` varchar(150) NOT NULL,
  `sport_name` varchar(150) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(10) NOT NULL,
  `event_price` int(10) DEFAULT NULL,
  `event_capacity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`event_id`, `venue_id`, `game_name`, `sport_name`, `date`, `time`, `event_price`, `event_capacity`) VALUES
(1, 6, 'Indiana Pacers vs. LA Clippers', 'Basketball', '2022-12-31', '3:00 pm', 7600, 19999),
(2, 1, 'Memphis Grizzlies vs. Sacramento Kings', 'Basketball', '2023-01-01', '7:00 pm', 7300, 18118),
(3, 2, 'LA Clippers vs. Miami HEAT', 'Basketball', '2023-01-02', '7:30 pm', 7200, 19992),
(4, 2, 'Los Angeles Lakers vs. Miami Heat', 'Basketball', '2023-01-04', '7:00 pm', 7200, 20000),
(5, 3, 'Phoenix Suns vs. Miami Heat', 'Basketball', '2023-01-06', '8:00 pm', 7600, 18420),
(6, 4, 'Miami Heat vs. Brooklyn Nets', 'Basketball', '2023-01-08', '6:00 pm', 7300, 20999),
(7, 6, 'Indiana Pacers vs. Charlotte Hornets', 'Basketball', '2023-01-08', '5:00 pm', 7300, 20000),
(8, 6, 'Indiana Pacers vs. Atlanta Hawks', 'Basketball', '2023-01-13', '7:00 pm', 7200, 19996),
(9, 6, 'Indiana Pacers vs. Memphis Grizzlies', 'Basketball', '2023-01-14', '7:00 pm', 7200, 20000),
(10, 5, 'Atlanta Hawks vs. Miami Heat', 'Basketball', '2023-01-16', '3:30 pm', 7600, 21000),
(11, 3, 'Phoenix Suns vs. Indiana Pacers', 'Basketball', '2023-01-21', '7:00 pm', 7300, 18422),
(12, 4, 'Miami Heat vs. Boston Celtics', 'Basketball', '2023-01-24', '7:30 pm', 7600, 21000),
(13, 6, 'Indiana Pacers vs. Chicago Bulls', 'Basketball', '2023-01-24', '7:00 pm', 7200, 20000),
(14, 7, 'Orlando Magic v Indiana Pacers', 'Basketball', '2023-01-25', '7:00 pm', 7300, 20000),
(15, 4, 'Miami Heat vs. Orlando Magic', 'Basketball', '2023-01-27', '8:00 pm', 7600, 21000),
(16, 8, 'Dallas Cowboys vs. New York Giants', 'Football', '2023-01-24', '1:00 pm', 12, 80000),
(17, 10, 'Miami Dolphins v. Houston Texans', 'Football', '2023-01-27', '12:00 pm', 12300, 65326),
(18, 9, 'New York Giants vs. Philadelphia Eagles', 'Football', '2023-01-31', '1:00 pm', 12, 82500),
(19, 8, 'Dallas Cowboys vs. Houston Texans', 'Football', '2023-02-01', '12:00 pm', 12300, 80000),
(20, 9, 'New York Giants vs. Houston Texans', 'Football', '2023-02-10', '1:00 pm', 12300, 82499);

--
-- Triggers `sports`
--
DELIMITER $$
CREATE TRIGGER `initialise_sports_event_capacity` BEFORE INSERT ON `sports` FOR EACH ROW SET new.event_capacity = (SELECT venue_capacity FROM venues WHERE venue_id = new.venue_id)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticket_id` int(11) NOT NULL,
  `ticket_holder_id` int(11) NOT NULL,
  `event_category` varchar(10) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `ticket_holder_id`, `event_category`, `event_id`) VALUES
(158, 2, 'sports', 1),
(159, 2, 'sports', 2),
(160, 2, 'sports', 5),
(170, 2, 'concerts', 11),
(171, 2, 'concerts', 19);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `phone_number`, `email`, `password`) VALUES
(2, 'Jane', '2147483647', 'janedoe@email.com', 'e1770cefc174d55219edcab48f3c91905eb5bd9b'),
(13, 'Lui Kim', '7893494373', 'luikim@email.com', 'beb7d4cb6cc02ab5de864b4acdca14380269b04c');

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `venue_id` int(11) NOT NULL,
  `venue_name` varchar(150) NOT NULL,
  `location` varchar(250) NOT NULL,
  `venue_capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`venue_id`, `venue_name`, `location`, `venue_capacity`) VALUES
(1, 'FedExForum', 'Memphis, TN', 18119),
(2, 'Crypto Arena', 'Los Angeles, CA', 20000),
(3, 'Footprint Center', 'Phoenix, AZ', 18422),
(4, 'FTX Arena', 'Miami, FL', 21000),
(5, 'State Farm Arena', 'Indianapolis, IN', 21000),
(6, 'Gainbridge Fieldhouse', 'Indianapolis, IN', 20000),
(7, 'Amway Center', 'Orlando, FL', 20000),
(8, 'AT&T Stadium', 'Arlington, TX', 80000),
(9, 'MetLife Stadium', 'East Rutherford, NJ', 82500),
(10, 'Hard Rock Stadium', 'Miami, FL', 65326),
(11, 'Spokane Arena ', 'Spokane, WA', 12638),
(12, 'Climate Pledge Arena ', 'Seattle, WA', 17459),
(13, 'Ak-Chin Pavilion ', 'Phoenix, AZ', 20106),
(14, 'Allegiant Stadium ', 'Las Vegas , NV', 61000),
(15, 'NRG Stadium ', 'Houston, TX', 72220),
(16, 'Lincoln Financial Field', 'Philadelphia, PA', 67594),
(17, 'SAP Center at San Jose ', 'San Jose, CA', 17562),
(18, 'Dolby Live', 'Las Vegas, NV', 64000),
(19, 'Capital One Arena ', 'Washington, DC', 20356),
(20, 'Raymond James Stadium', 'Tampa, FL', 65890),
(21, 'Soldier Field', 'Chicago, IL', 61500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `concerts`
--
ALTER TABLE `concerts`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `concert_venue_fk` (`venue_id`);

--
-- Indexes for table `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `sport_venue_fk` (`venue_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `ticket_user_fk` (`ticket_holder_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`venue_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `concerts`
--
ALTER TABLE `concerts`
  ADD CONSTRAINT `concert_venue_fk` FOREIGN KEY (`venue_id`) REFERENCES `venues` (`venue_id`);

--
-- Constraints for table `sports`
--
ALTER TABLE `sports`
  ADD CONSTRAINT `sport_venue_fk` FOREIGN KEY (`venue_id`) REFERENCES `venues` (`venue_id`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `ticket_user_fk` FOREIGN KEY (`ticket_holder_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
