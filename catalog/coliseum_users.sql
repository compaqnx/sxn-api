-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 09, 2014 at 04:56 PM
-- Server version: 5.1.72-cll
-- PHP Version: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `coliseum_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `atribute`
--

CREATE TABLE IF NOT EXISTS `atribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `atribute_name` varchar(255) DEFAULT NULL,
  `atribute_desc` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `atribute`
--

INSERT INTO `atribute` (`id`, `id_user`, `atribute_name`, `atribute_desc`) VALUES
(8, 1, 'Pranz', 'Mancare delicioasa '),
(7, 1, 'Mic Dejun', 'Cea mai importanta masa a zilei');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE IF NOT EXISTS `manufacturer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `manufacturer_name` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `id_user`, `manufacturer_name`) VALUES
(2, 1, 'Passage');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_product_group` int(11) DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `manufacturer` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `product_desc` text,
  `price` int(11) DEFAULT NULL,
  `id_atribute` int(11) NOT NULL,
  `date_added` date DEFAULT NULL,
  `date_modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `id_user`, `id_product_group`, `sku`, `product_name`, `model`, `manufacturer`, `quantity`, `weight`, `product_desc`, `price`, `id_atribute`, `date_added`, `date_modified`) VALUES
(8, 1, 3, NULL, 'Salata', NULL, NULL, NULL, NULL, 'Salata: castraveti, salata verde', NULL, 7, NULL, NULL),
(7, 1, 3, NULL, 'Garnitura', NULL, NULL, NULL, NULL, 'Garnitura contine la alegere: cartofi, orez', NULL, 7, NULL, NULL),
(6, 1, 3, NULL, 'Ciorba legume', NULL, NULL, NULL, NULL, 'Contine: ciorba, legume, taitei, fara sare', NULL, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_group`
--

CREATE TABLE IF NOT EXISTS `product_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `product_group_name` varchar(255) DEFAULT NULL,
  `product_group_desc` text,
  `id_atribute` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `product_group`
--

INSERT INTO `product_group` (`id`, `id_user`, `product_group_name`, `product_group_desc`, `id_atribute`) VALUES
(3, 1, 'Meniu light', 'Meniu cu mancare usoara', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(18) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `gender` varchar(15) NOT NULL DEFAULT 'undisclosed',
  `bio` text NOT NULL,
  `image_location` varchar(125) NOT NULL DEFAULT 'avatars/default_avatar.png',
  `password` varchar(512) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `email_code` varchar(100) NOT NULL,
  `time` int(11) NOT NULL,
  `confirmed` int(11) NOT NULL DEFAULT '0',
  `generated_string` varchar(35) NOT NULL DEFAULT '0',
  `ip` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `gender`, `bio`, `image_location`, `password`, `email`, `email_code`, `time`, `confirmed`, `generated_string`, `ip`) VALUES
(1, 'sorin', 'Sorin', 'B', 'Male', 'Pro', 'avatars/default_avatar.png', '$2y$12$779212316552cc07fbd39OBuHFCR6NY5//xI6Vp1u39Uw60ILZZrq', 'sorin@proclient.ro', 'code_52cc044e55f3e3.03712529', 1389102158, 1, '0', '89.121.200.106');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
