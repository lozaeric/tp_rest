-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2016 at 04:37 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ojeador`
--
CREATE DATABASE IF NOT EXISTS `ojeador` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ojeador`;

-- --------------------------------------------------------

--
-- Table structure for table `jugador`
--

DROP TABLE IF EXISTS `jugador`;
CREATE TABLE IF NOT EXISTS `jugador` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `posicion` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `jugador`
--

INSERT INTO `jugador` (`id`, `nombre`, `posicion`) VALUES
(8, 'Javier Mascherano', 'Delantero'),
(9, 'Marcos Rojo', 'Defensor'),
(10, 'Sergio Romero', 'Arquero'),
(11, 'Martin Demichelis', 'Defensor'),
(12, 'Lucas Biglia', 'Mediocampista'),
(13, 'Lio', 'Delantero');

-- --------------------------------------------------------

--
-- Table structure for table `ojeo`
--

DROP TABLE IF EXISTS `ojeo`;
CREATE TABLE IF NOT EXISTS `ojeo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idJugador` int(10) unsigned NOT NULL,
  `comentario` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `costoPase` int(10) unsigned NOT NULL,
  `clubActual` varchar(25) NOT NULL,
  PRIMARY KEY (`id`,`idJugador`),
  KEY `fk_jugador_id` (`idJugador`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `ojeo`
--

INSERT INTO `ojeo` (`id`, `idJugador`, `comentario`, `fecha`, `costoPase`, `clubActual`) VALUES
(7, 8, '', '2016-01-05', 250000, 'Barcelona'),
(8, 10, '', '2016-01-03', 250036, 'Manchester United'),
(9, 13, '', '2016-01-02', 9999999, 'Barcelona'),
(10, 13, '', '2015-01-02', 9999998, 'Barcelona'),
(11, 12, '', '2016-04-10', 11000, 'Lazio');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  `password` char(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `password`) VALUES
(1, 'Eric', '9500');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ojeo`
--
ALTER TABLE `ojeo`
  ADD CONSTRAINT `fk_jugador_id` FOREIGN KEY (`idJugador`) REFERENCES `jugador` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
