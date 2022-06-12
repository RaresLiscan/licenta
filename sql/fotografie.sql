-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2022 at 10:00 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fotografie`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` char(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'adminioana', 'a026c9cd01af86e9f3b853aa80359bf3'),
(3, 'adminelena', 'd854983e6f143b851defb62ba973335e');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `service_id`, `quantity`, `id_user`) VALUES
(13, 1, 100, 1),
(14, 2, 50, 1),
(24, 1, 50, 4),
(27, 2, 50, 2),
(20, 2, 50, 4),
(18, 2, 150, 3),
(21, 1, 50, 2),
(33, 2, 50, 11),
(39, 1, 1, -1),
(25, 1, 50, 11),
(38, 2, 1, -1),
(40, 2, 1, -1),
(41, 2, 1, 8),
(42, 12, 2, -1);

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` int(11) NOT NULL,
  `codename` varchar(255) NOT NULL,
  `amount` decimal(6,4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `codename`, `amount`) VALUES
(1, 'CODE20', '0.2000');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` text NOT NULL,
  `description` longtext NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `phone`, `description`, `photo`) VALUES
(1, 'Maria Giurgiu', 'maria.giurgiu@gmail.com', '0756891223', 'safffffsa', 'poze\\angajat1.jpg'),
(3, 'Tudor Pop', 'pop_tudor@yahoo.com', '0743569022', 'jndkkkkk', 'poze\\angajat2.jpg'),
(4, 'Denisa Ilea', 'denisaa.ilea@yahoo.com', '0724199886', 'aaaa', 'poze\\angajat3.jpg'),
(5, 'Andrei Oroian', 'andrei_oroian13@gmail.com', '0785321555', 'ddd', 'poze\\angajat4.jpg'),
(6, 'Patricia Miron', 'patri.miron@gmail.com', '0765441322', 'gtrh', 'poze\\angajat5.jpg'),
(7, 'Catalin Popescu', 'catalinpopescu1@gmail.com', '0764553129', 'eee', 'poze\\angajat6.jpg'),
(9, 'Catalin Vale', 'catalin.vale5@gmail.com', '+40740172335', 'Beau', 'poze/vale.jpg'),
(10, 'Rares Liscan', 'liscanrares@gmail.com', '+40740172335', 'Maine ma pensionez', 'poze/rares.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` text NOT NULL,
  `servicename` varchar(255) NOT NULL,
  `feedback` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `name`, `email`, `phone`, `servicename`, `feedback`) VALUES
(1, 'Lorena Rusu', 'lorena.rusu@yahoo.com', '0746648991', '1', 'mnjk'),
(2, 'Lorena Rusu', 'lorena.rusu@yahoo.com', '0746648991', '1', 'm m');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` text NOT NULL,
  `message` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `phone`, `message`) VALUES
(1, 'Lorena Rusu', 'lorena.rusu@yahoo.com', '0746648991', 'sssssssss');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phonenumb` varchar(255) NOT NULL,
  `shootdate` date NOT NULL,
  `shoottime` time NOT NULL,
  `people` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `order_id`, `name`, `phonenumb`, `shootdate`, `shoottime`, `people`, `location`) VALUES
(6, 13, 'zx', 'caxa', '2022-06-16', '16:13:00', '4', '1'),
(7, 22, 'dddd', 'xc', '2022-06-09', '14:18:00', '4', 'Parcul central Cluj-Napoca'),
(16, 27, 'rares', 'wer', '2022-06-30', '15:07:00', '1', 'Parc Iulius Cluj-Napoca'),
(27, 36, 'Rares Liscan', '0740172335', '2022-06-16', '09:00:00', '2', 'Parc Iulius Cluj-Napoca'),
(17, 27, 'rares', 'wer', '2022-06-30', '15:07:00', '1', 'Parc Iulius Cluj-Napoca'),
(26, 35, 'Liscan Rares', '0740172335', '2022-06-16', '10:00:00', '2', 'Gradina Botanica Cluj-Napoca'),
(29, 38, 'Liscan Rares', '0740172335', '2022-06-16', '09:00:00', '3', 'Parc Iulius Cluj-Napoca'),
(28, 37, 'Rares :oscam', '0740172335', '2022-06-16', '09:30:00', '2', 'Parc Iulius Cluj-Napoca'),
(25, 25, 'Liscan Rares', '0740172335', '2022-06-11', '12:00:00', '2', 'Parc Iulius Cluj-Napoca'),
(30, 39, 'Liscan Rares', '0740017233', '2022-06-30', '07:00:00', '1', 'Parcul central Cluj-Napoca'),
(31, 40, 'Liscan Rares', '0740172335', '2022-06-16', '13:00:00', '2', 'Castel Bontida');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `servicename` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `phnumber` int(11) NOT NULL,
  `timeph` int(255) NOT NULL,
  `clothing` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `photo0` varchar(255) NOT NULL,
  `photo1` varchar(255) NOT NULL,
  `photo2` varchar(255) NOT NULL,
  `photo3` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `servicename`, `code`, `description`, `phnumber`, `timeph`, `clothing`, `price`, `photo0`, `photo1`, `photo2`, `photo3`) VALUES
(1, 'Portrait', '01', 'xashdui wehckj ouahduhen chmdnco uo cdijalkjkln', 180, 180, 5, 2, 'Poze\\woman.png', 'Poze\\portrait1.jpg', 'Poze\\portrait2.jpg', 'Poze\\portrait3.jpg'),
(2, 'Couple', '02', 'jsdhcuhscj  jciljdockkm bbcjkndjwhdh kdhwuehn sdvftgd zbkshiudhwejd', 100, 180, 2, 66, 'Poze\\couple.png', 'poze\\couple1.jpg', 'poze\\couple2.jpg', 'poze\\couple3.jpg'),
(3, 'Engagement', '03', 'e', 30, 120, 1, 50, 'poze\\engagement.png', 'poze\\engagement1.jpg', 'poze\\engagement2.jpg', 'poze\\engagement3.jpg'),
(4, 'Wedding', '04', 'f', 50, 90, 1, 30, 'poze\\wedding.png', 'poze\\wedding1.jpg', 'poze\\wedding2.jpg', 'poze\\wedding3.jpg'),
(5, 'Newborn', '05', 'ssssssss', 20, 60, 1, 50, 'poze\\baby.png', 'poze\\newborn1.jpg', 'poze\\newborn2.jpg', 'poze\\newborn3.jpg'),
(6, 'Family', '06', 'a', 70, 30, 2, 100, 'poze\\family.png', 'poze\\family1.jpg', 'poze\\family2.jpg', 'poze\\family3.jpg'),
(9, 'Event', '07', 'aaaaaa', 200, 360, 2, 300, 'poze\\event.png', 'poze\\event1.jpg', 'poze\\event2.jpg', 'poze\\event3.jpg'),
(10, 'Product', '08', 'sd', 10, 200, 0, 50, 'poze\\product.png', 'poze\\product1.jpg', 'poze\\product2.jpg', 'poze\\product3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'a', 'a@gmail.com', '$2y$10$E.FIwCkSegmBcOaVbCMCVe6EWyyafL3snIuTvrE0dZEUIRFXDVAuu'),
(2, 'denisa', 'denisa@yahoo.com', '$2y$10$ed9sdGguSP9CCfZNVjIAHezOy0rgxexT4LrOrG.IQceXUETa0IE.6'),
(3, 'ana', 'ana@gmail.com', '$2y$10$7s2gWnAqEzDrDaoXvmWt0exi1/TAiUHCqLj.VEPdRZq5X8uD2K6i6'),
(4, 'patricia', 'patricia@yahoo.com', '$2y$10$R3rs0Fx5KXdvsGw2D7T6jeQY11jYZ2zfH86zKqamsMHck/xi/mSqu'),
(7, 'Rares Liscan', 'liscanrares@yahoo.com', '$2y$10$eDG0Oi37h936dj.E41u17OtGlwSKApIivJvVLQasmSv5muQlx/MjK'),
(8, 'rares', 'liscanrares@gmail.com', '$2y$10$WqVZGxTJ7qCqMkFauN0W6O0R1DVl5MQuWuw2ZU/cyREVYFIcgMwPm'),
(9, 'rares1', 'liscanrares@gmail.com', '$2y$10$kCemHOOFceDXLjyesIT7SOZr30zqwJtArTdu3l45VFt/m99RZP1Ei'),
(10, 'rares12', 'liscanrares@gmail.com', '$2y$10$Xod6caGKD9jZVxl3CxiMauIoxIzXB7402NjJyjowFaNp7hfSqM/Du'),
(11, 'rares233', 'liscanrares@gmail.com', '$2y$10$5Fq./iHQPFm5hNrRyMnH5eCZxzPuQoMyDSW9RV0gQo4c6Ukio8S5G');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
