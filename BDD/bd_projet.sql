-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 20, 2019 at 07:51 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_projet`
--

-- --------------------------------------------------------

--
-- Table structure for table `medecin`
--

DROP TABLE IF EXISTS `medecin`;
CREATE TABLE IF NOT EXISTS `medecin` (
  `id_medecin` int(50) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `civilite` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_medecin`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medecin`
--

INSERT INTO `medecin` (`id_medecin`, `nom`, `prenom`, `civilite`) VALUES
(1, 'Jean-claude', 'vandamme', 'M'),
(5, NULL, NULL, NULL),
(6, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `id_patient` int(11) NOT NULL AUTO_INCREMENT,
  `num_securite_social` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `code_postal` int(11) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `civilite` char(1) DEFAULT NULL,
  `lieu_naissance` varchar(50) DEFAULT NULL,
  `id_medecin` varchar(50) DEFAULT NULL,
  `Ville` varchar(50) NOT NULL,
  PRIMARY KEY (`id_patient`),
  KEY `id_medecin` (`id_medecin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rdv`
--

DROP TABLE IF EXISTS `rdv`;
CREATE TABLE IF NOT EXISTS `rdv` (
  `id_patient` int(11) NOT NULL,
  `id_medecin` varchar(50) NOT NULL,
  `id_rdv` int(11) NOT NULL AUTO_INCREMENT,
  `date_rdv` date DEFAULT NULL,
  `duree` time DEFAULT NULL,
  PRIMARY KEY (`id_patient`,`id_medecin`,`id_rdv`),
  KEY `id_medecin` (`id_medecin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
