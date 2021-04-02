-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2021 at 11:06 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinemazing`
--

-- --------------------------------------------------------

--
-- Table structure for table `users_movie_entry`
--

CREATE TABLE `users_movie_entry` (
  `id` int(11) NOT NULL,
  `movie_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ticket_no` varchar(255) NOT NULL,
  `seat_no` varchar(255) NOT NULL,
  `seats_occupied` varchar(255) NOT NULL,
  `total_payment` varchar(255) NOT NULL,
  `is_verified` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_movie_entry`
--

INSERT INTO `users_movie_entry` (`id`, `movie_name`, `username`, `email`, `ticket_no`, `seat_no`, `seats_occupied`, `total_payment`, `is_verified`) VALUES
(1, 'Palm Spring', 'Yorty03', 'troyreyes03@gmail.com', '234', 'A3, A4', '2', '-500', 'YES'),
(2, 'Palm Spring', 'Yorty03', 'troyreyes03@gmail.com', '83499', 'A3, A4', '2', '-500', 'YES'),
(3, 'Shadow in the Cloud', 'Yorty03', 'troyreyes03@gmail.com', '80263', 'C9, C10', '2', '-500', 'YES'),
(4, 'Palm Spring', 'Yorty03', 'troyreyes03@gmail.com', '23101', 'C1, C2', '2', '500', 'NO'),
(5, 'Eternals', 'Yorty03', 'troyreyes03@gmail.com', '49772', 'B1, C1', '2', '-500', 'YES'),
(6, 'Palm Spring', 'Yorty03', 'troyreyes03@gmail.com', '95336', 'C8', '1', '', 'YES'),
(7, 'The New Mutants', 'Yorty03', 'troyreyes03@gmail.com', '80715', 'B2', '1', '250', 'YES'),
(8, 'Spider-Man: No Way Home', 'Yorty03', 'troyreyes03@gmail.com', '86051', 'A3, A4, B4', '3', '750', 'YES'),
(9, 'The New Mutants', 'Yorty03', 'troyreyes03@gmail.com', '13711', 'A5', '1', '250', 'YES'),
(10, 'The New Mutants', 'Yorty03', 'troyreyes03@gmail.com', '7451', 'B6, B7, B8, B9', '1', '750', 'YES'),
(11, 'I Care A Lot', 'Yorty03', 'troyreyes03@gmail.com', '16211', 'B4, B5, B6', '1', '500', 'YES');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users_movie_entry`
--
ALTER TABLE `users_movie_entry`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_movie_entry`
--
ALTER TABLE `users_movie_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
