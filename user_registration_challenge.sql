-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 23, 2018 at 11:31 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_registration_challenge`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `hashed_password` varchar(255) DEFAULT NULL,
  `profile_img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `hashed_password`, `profile_img`) VALUES
(13, 'Juli', 'Cheng', 'hellojuli@gmail.com', '$2y$10$9uYZ8nCDzDJSItO/vwh1QOfx2Meu59PsFzgzxeSh3xYHzVOUi1v/W', 'noimage.jpg'),
(14, 'John', 'Smith', 'hellojohn@gmail.com', '$2y$10$m7xWKV20SBqym680ImxOB.izgD0.zFbO1QUlVwRP89GSJ4Ml2Ccya', 'noimage.jpg'),
(15, 'Testing', 'Testing', 'testing@gmail.com', '$2y$10$py.vgDwVYEYU3SiHIqgL.eNnBLDlvNFycYuN1OdfO30mLaV2S0TFy', 'noimage.jpg'),
(16, 'Blah', 'BBlah', 'blah@gmail.com', '$2y$10$ABVMnwbcSOdjNR9Unh9AxOSCtTGi4Z/wb3/KBKharnua1X2M4A496', 'noimage.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
