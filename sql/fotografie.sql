-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 08, 2022 at 05:52 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

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

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` char(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `service_id`, `quantity`, `id_user`) VALUES
(13, 1, 100, 1),
(14, 2, 50, 1),
(24, 1, 50, 4),
(22, 2, 50, 2),
(23, 2, 50, 4),
(18, 2, 150, 3),
(21, 1, 50, 2);

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

DROP TABLE IF EXISTS `discount`;
CREATE TABLE IF NOT EXISTS `discount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codename` varchar(255) NOT NULL,
  `amount` decimal(6,4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `codename`, `amount`) VALUES
(1, 'CODE20', '0.2000');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` text NOT NULL,
  `description` longtext NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `phone`, `description`, `photo`) VALUES
(1, 'Maria Giurgiu', 'maria.giurgiu@gmail.com', '0756891223', 'safffffsa', 'poze\\angajat1.jpg'),
(3, 'Tudor Pop', 'pop_tudor@yahoo.com', '0743569022', 'jndkkkkk', 'poze\\angajat2.jpg'),
(4, 'Denisa Ilea', 'denisaa.ilea@yahoo.com', '0724199886', 'aaaa', 'poze\\angajat3.jpg'),
(5, 'Andrei Oroian', 'andrei_oroian13@gmail.com', '0785321555', 'ddd', 'poze\\angajat4.jpg'),
(6, 'Patricia Miron', 'patri.miron@gmail.com', '0765441322', 'gtrh', 'poze\\angajat5.jpg'),
(7, 'Catalin Popescu', 'catalinpopescu1@gmail.com', '0764553129', 'eee', 'poze\\angajat6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

DROP TABLE IF EXISTS `feedbacks`;
CREATE TABLE IF NOT EXISTS `feedbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` text NOT NULL,
  `servicename` varchar(255) NOT NULL,
  `feedback` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` text NOT NULL,
  `message` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `phone`, `message`) VALUES
(1, 'Lorena Rusu', 'lorena.rusu@yahoo.com', '0746648991', 'sssssssss');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phonenumb` varchar(255) NOT NULL,
  `shootdate` date NOT NULL,
  `shoottime` time NOT NULL,
  `people` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `order_id`, `name`, `phonenumb`, `shootdate`, `shoottime`, `people`, `location`) VALUES
(6, 13, 'zx', 'caxa', '2022-06-16', '16:13:00', '4', '1'),
(7, 0, 'dddd', 'xc', '2022-06-09', '14:18:00', '4', 'Parcul central Cluj-Napoca');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `servicename` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `phnumber` int(11) NOT NULL,
  `timeph` varchar(255) NOT NULL,
  `clothing` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `photo0` varchar(255) NOT NULL,
  `photo1` varchar(255) NOT NULL,
  `photo2` varchar(255) NOT NULL,
  `photo3` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `servicename`, `code`, `description`, `phnumber`, `timeph`, `clothing`, `price`, `photo0`, `photo1`, `photo2`, `photo3`) VALUES
(1, 'Portrait', '01', 'xashdui wehckj ouahduhen chmdnco uo cdijalkjkln', 3, '1:30 hours', 3, 2, 'Poze\\woman.png', 'Poze\\portrait1.jpg', 'Poze\\portrait2.jpg', 'Poze\\portrait3.jpg'),
(2, 'Couple', '02', 'jsdhcuhscj  jciljdockkm bbcjkndjwhdh kdhwuehn sdvftgd zbkshiudhwejd', 100, '2h', 2, 66, 'Poze\\couple.png', 'poze\\couple1.jpg', 'poze\\couple2.jpg', 'poze\\couple3.jpg'),
(3, 'Engagement', '03', 'e', 0, 'e', 0, 0, 'poze\\engagement.png', 'poze\\engagement1.jpg', 'poze\\engagement2.jpg', 'poze\\engagement3.jpg'),
(4, 'Wedding', '04', 'f', 0, 'f', 0, 0, 'poze\\wedding.png', 'poze\\wedding1.jpg', 'poze\\wedding2.jpg', 'poze\\wedding3.jpg'),
(5, 'Newborn', '05', 'ssssssss', 0, 'ggg', 0, 0, 'poze\\baby.png', 'poze\\newborn1.jpg', 'poze\\newborn2.jpg', 'poze\\newborn3.jpg'),
(6, 'Family', '06', 'a', 0, 'dd', 0, 0, 'poze\\family.png', 'poze\\family1.jpg', 'poze\\family2.jpg', 'poze\\family3.jpg'),
(9, 'Event', '07', 'aaaaaa', 0, 'a', 0, 0, 'poze\\event.png', 'poze\\event1.jpg', 'poze\\event2.jpg', 'poze\\event3.jpg'),
(10, 'Product', '08', 'sd', 0, 'c', 0, 0, 'poze\\product.png', 'poze\\product1.jpg', 'poze\\product2.jpg', 'poze\\product3.jpg'),
(11, 'Pet', '09', 'ddddddc', 0, 'tg', 0, 0, 'poze\\dog.png', 'poze\\pet1.jpg', 'poze\\pet2.jpg', 'poze\\pet3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'a', 'a@gmail.com', '$2y$10$E.FIwCkSegmBcOaVbCMCVe6EWyyafL3snIuTvrE0dZEUIRFXDVAuu'),
(2, 'denisa', 'denisa@yahoo.com', '$2y$10$ed9sdGguSP9CCfZNVjIAHezOy0rgxexT4LrOrG.IQceXUETa0IE.6'),
(3, 'ana', 'ana@gmail.com', '$2y$10$7s2gWnAqEzDrDaoXvmWt0exi1/TAiUHCqLj.VEPdRZq5X8uD2K6i6'),
(4, 'patricia', 'patricia@yahoo.com', '$2y$10$R3rs0Fx5KXdvsGw2D7T6jeQY11jYZ2zfH86zKqamsMHck/xi/mSqu');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
