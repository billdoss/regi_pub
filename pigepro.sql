-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 18 Septembre 2017 à 14:13
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pigepro`
--

-- --------------------------------------------------------

--
-- Structure de la table `agencepublicitaire`
--

DROP TABLE IF EXISTS `agencepublicitaire`;
CREATE TABLE IF NOT EXISTS `agencepublicitaire` (
  `idagencepub` int(11) NOT NULL AUTO_INCREMENT,
  `libagence` text NOT NULL,
  PRIMARY KEY (`idagencepub`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `annonceur`
--

DROP TABLE IF EXISTS `annonceur`;
CREATE TABLE IF NOT EXISTS `annonceur` (
  `idannonceur` int(11) NOT NULL AUTO_INCREMENT,
  `libannonceur` text NOT NULL,
  PRIMARY KEY (`idannonceur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `emplacement`
--

DROP TABLE IF EXISTS `emplacement`;
CREATE TABLE IF NOT EXISTS `emplacement` (
  `idemplacement` int(11) NOT NULL AUTO_INCREMENT,
  `libemplacement` text NOT NULL,
  PRIMARY KEY (`idemplacement`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `emplacement`
--

INSERT INTO `emplacement` (`idemplacement`, `libemplacement`) VALUES
(1, '8h'),
(2, '9h'),
(3, '10h'),
(4, '11h'),
(5, '12h'),
(6, '13h'),
(7, '14h'),
(8, '15h'),
(9, '16h'),
(10, '17h'),
(11, '18h'),
(12, '19h'),
(13, '20h'),
(14, '21h'),
(15, '22h');

-- --------------------------------------------------------

--
-- Structure de la table `format`
--

DROP TABLE IF EXISTS `format`;
CREATE TABLE IF NOT EXISTS `format` (
  `idformat` int(11) NOT NULL AUTO_INCREMENT,
  `libformat` text NOT NULL,
  PRIMARY KEY (`idformat`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `format`
--

INSERT INTO `format` (`idformat`, `libformat`) VALUES
(1, '5s'),
(2, '10s'),
(3, '15s'),
(4, '20s'),
(5, '25s'),
(6, '30s');

-- --------------------------------------------------------

--
-- Structure de la table `grilletarifaire`
--

DROP TABLE IF EXISTS `grilletarifaire`;
CREATE TABLE IF NOT EXISTS `grilletarifaire` (
  `idgrilletarif` int(11) NOT NULL AUTO_INCREMENT,
  `libgrilletarif` text CHARACTER SET utf8 NOT NULL,
  `indice` int(1) NOT NULL DEFAULT '0',
  `montantind` int(11) DEFAULT NULL,
  `cobplusprob` int(11) DEFAULT NULL COMMENT 'cobranding plusieurs produits',
  `cobunemarque` int(11) DEFAULT NULL COMMENT 'cobranding une marque',
  `cobplusmarque` int(11) DEFAULT NULL COMMENT 'cobranding plusieurs marques',
  `datedeb` date NOT NULL,
  `datefin` date DEFAULT NULL,
  `IdSupport` int(11) NOT NULL,
  PRIMARY KEY (`idgrilletarif`),
  KEY `IdSupport` (`IdSupport`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `grilletarifaire`
--

INSERT INTO `grilletarifaire` (`idgrilletarif`, `libgrilletarif`, `indice`, `montantind`, `cobplusprob`, `cobunemarque`, `cobplusmarque`, `datedeb`, `datefin`, `IdSupport`) VALUES
(8, 'Insertion test', 0, NULL, NULL, NULL, NULL, '2017-09-18', NULL, 1),
(9, 'Pack promotionnel', 0, 15000, 0, 0, 0, '2017-09-19', NULL, 2),
(10, 'pack gratuit', 1, 60000, 18000, 5000, 6000, '2017-09-19', NULL, 1),
(11, 'pack gratuit', 1, 60000, 18000, 5000, 6000, '2017-09-19', NULL, 1),
(12, 'test', 0, 75555, 0, 0, 0, '2017-09-19', NULL, 1),
(13, 'test', 0, 75555, 0, 0, 0, '2017-09-19', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `lignegrille`
--

DROP TABLE IF EXISTS `lignegrille`;
CREATE TABLE IF NOT EXISTS `lignegrille` (
  `idgrille` int(11) NOT NULL AUTO_INCREMENT,
  `prix` int(11) NOT NULL DEFAULT '0',
  `jourdesemaine` varchar(16) CHARACTER SET utf8 NOT NULL,
  `idgrilletarif` int(11) NOT NULL,
  `idformat` int(11) NOT NULL,
  `idemplacement` int(11) NOT NULL,
  PRIMARY KEY (`idgrille`),
  KEY `idgrilletarif` (`idgrilletarif`),
  KEY `idformat` (`idformat`),
  KEY `idemplacement` (`idemplacement`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lignegrille`
--

INSERT INTO `lignegrille` (`idgrille`, `prix`, `jourdesemaine`, `idgrilletarif`, `idformat`, `idemplacement`) VALUES
(3, 0, 'Lundi', 8, 4, 3);

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

DROP TABLE IF EXISTS `marque`;
CREATE TABLE IF NOT EXISTS `marque` (
  `idmarque` int(11) NOT NULL AUTO_INCREMENT,
  `libmarque` text NOT NULL,
  `idannonceur` int(11) NOT NULL,
  PRIMARY KEY (`idmarque`),
  KEY `idannonceur` (`idannonceur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `idmedia` int(11) NOT NULL AUTO_INCREMENT,
  `libmedia` text NOT NULL,
  PRIMARY KEY (`idmedia`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `media`
--

INSERT INTO `media` (`idmedia`, `libmedia`) VALUES
(1, 'TV'),
(2, 'Radio'),
(3, 'Panneau publicitaire');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `idproduit` int(11) NOT NULL AUTO_INCREMENT,
  `libproduit` text NOT NULL,
  `idmarque` int(11) NOT NULL,
  PRIMARY KEY (`idproduit`),
  KEY `idmarque` (`idmarque`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `publicite`
--

DROP TABLE IF EXISTS `publicite`;
CREATE TABLE IF NOT EXISTS `publicite` (
  `idpub` int(11) NOT NULL AUTO_INCREMENT,
  `libpub` text NOT NULL,
  `idproduit` int(11) NOT NULL,
  `idagencepub` int(11) NOT NULL,
  `datediffusion` text NOT NULL,
  `idsupport` text NOT NULL,
  `idformat` text NOT NULL,
  `idemplacement` text NOT NULL,
  PRIMARY KEY (`idpub`),
  KEY `idprod` (`idproduit`),
  KEY `idagencepub` (`idagencepub`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `support`
--

DROP TABLE IF EXISTS `support`;
CREATE TABLE IF NOT EXISTS `support` (
  `idsupport` int(11) NOT NULL AUTO_INCREMENT,
  `libsupport` text NOT NULL,
  `idmedia` int(11) NOT NULL,
  PRIMARY KEY (`idsupport`),
  KEY `idmedia` (`idmedia`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `support`
--

INSERT INTO `support` (`idsupport`, `libsupport`, `idmedia`) VALUES
(1, 'RTI1', 1),
(2, 'RTI2', 1),
(3, 'Vibe Radio', 2),
(4, 'Radio FM', 2);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `agencepublicitaire`
--
ALTER TABLE `agencepublicitaire`
  ADD CONSTRAINT `agencepublicitaire_ibfk_1` FOREIGN KEY (`idagencepub`) REFERENCES `publicite` (`idagencepub`);

--
-- Contraintes pour la table `annonceur`
--
ALTER TABLE `annonceur`
  ADD CONSTRAINT `annonceur_ibfk_1` FOREIGN KEY (`idannonceur`) REFERENCES `marque` (`idannonceur`);

--
-- Contraintes pour la table `grilletarifaire`
--
ALTER TABLE `grilletarifaire`
  ADD CONSTRAINT `grilletarifaire_ibfk_1` FOREIGN KEY (`IdSupport`) REFERENCES `support` (`idsupport`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `lignegrille`
--
ALTER TABLE `lignegrille`
  ADD CONSTRAINT `lignegrille_ibfk_1` FOREIGN KEY (`idgrilletarif`) REFERENCES `grilletarifaire` (`idgrilletarif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lignegrille_ibfk_3` FOREIGN KEY (`idemplacement`) REFERENCES `emplacement` (`idemplacement`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lignegrille_ibfk_4` FOREIGN KEY (`idformat`) REFERENCES `format` (`idformat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `marque`
--
ALTER TABLE `marque`
  ADD CONSTRAINT `marque_ibfk_1` FOREIGN KEY (`idmarque`) REFERENCES `produits` (`idmarque`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
