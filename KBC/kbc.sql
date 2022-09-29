-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 01 Avril 2021 à 07:49
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `kbc`
--

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

CREATE TABLE IF NOT EXISTS `marque` (
  `id_Marque` varchar(10) NOT NULL,
  `nom_Marque` varchar(50) NOT NULL,
  PRIMARY KEY (`id_Marque`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `marque`
--

INSERT INTO `marque` (`id_Marque`, `nom_Marque`) VALUES
('3EC', '3 CONCEPT EYES'),
('APIEU', 'APIEU'),
('ATOPALM', 'ATOPALM - REAL BARRIER'),
('BANILA', 'BANILA CO');

-- --------------------------------------------------------

--
-- Structure de la table `peau`
--

CREATE TABLE IF NOT EXISTS `peau` (
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`libelle`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `peau`
--

INSERT INTO `peau` (`libelle`) VALUES
('Anti-âge'),
('Peau grasse'),
('Peau mixte'),
('Peau normale'),
('Peau sèche');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id_Prod` int(10) NOT NULL AUTO_INCREMENT,
  `nom_Prod` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `type_peau` varchar(20) NOT NULL,
  `marque` varchar(10) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `image_Prod` varchar(50) NOT NULL,
  `type_Soins` varchar(10) NOT NULL,
  PRIMARY KEY (`id_Prod`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id_Prod`, `nom_Prod`, `description`, `type_peau`, `marque`, `prix`, `image_Prod`, `type_Soins`) VALUES
(1, 'CLEAN IT ZERO CLEANSING BALM nourishing', 'Maa', 'Peau mixte', '3EC', '4.50', 'images/DEM001.png', 'DEM'),
(2, 'Test', 'Produit teste', 'Peau sèche', '', '12.50', 'images/navbar.jpg', 'DEM'),
(3, 'Nettoyant teste', 'Teste', 'Peau grasse', 'ATOPALM', '10.99', 'images/logo.png', 'NET'),
(4, 'Teste 2', 'Teste nettoyant 2 ', 'Peau sèche', 'ATOPALM', '10.99', 'images/DEM001.png', 'NET'),
(5, 'Test Exfo', 'Teste', 'Peau acnéique', '3 EC', '42.99', 'images/Original 3.png', 'EXFO'),
(8, 'Teste origin', 'Produit teste', 'Peau acnéique', '3 EC', '16.50', 'images/Original 3.png', 'DEM');

-- --------------------------------------------------------

--
-- Structure de la table `soins`
--

CREATE TABLE IF NOT EXISTS `soins` (
  `id_Soins` varchar(5) NOT NULL,
  `nom_Soins` varchar(500) NOT NULL,
  PRIMARY KEY (`id_Soins`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `soins`
--

INSERT INTO `soins` (`id_Soins`, `nom_Soins`) VALUES
('DEM', 'Démaquillant'),
('NET', 'Nettoyant'),
('EXFO', 'Exfoliant'),
('TON', 'Tonifiant'),
('TRAI', 'Traitement');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_Utilisateur` int(10) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(10) NOT NULL,
  PRIMARY KEY (`id_Utilisateur`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_Utilisateur`, `login`, `password`, `role`) VALUES
(1, 'admin', 'admin1', 'admin'),
(2, 'user2', 'test', 'client');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
