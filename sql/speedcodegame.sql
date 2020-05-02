-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  sam. 02 mai 2020 à 17:46
-- Version du serveur :  5.7.28
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `speedcodegame`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `NumClient` smallint(6) NOT NULL,
  `NomClient` varchar(25) NOT NULL,
  `PrenomClient` varchar(25) NOT NULL,
  `CivClient` varchar(12) NOT NULL,
  `AdresseClient` varchar(25) NOT NULL,
  `VilleClient` varchar(25) NOT NULL,
  `CpClient` varchar(5) NOT NULL,
  `PaysClient` varchar(25) NOT NULL,
  PRIMARY KEY (`NumClient`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `CodeCategorie` smallint(6) NOT NULL,
  PRIMARY KEY (`CodeCategorie`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Identifiant` varchar(25) NOT NULL,
  `EmailCLient` varchar(30) NOT NULL,
  `Mdp` varchar(20) NOT NULL,
  `NumClient` smallint(6) NOT NULL,
  CONSTRAINT pk_user PRIMARY KEY (Identifiant),
  CONSTRAINT fk_user_client FOREIGN KEY (NumClient) REFERENCES client(NumClient)
);


-- --------------------------------------------------------

--
-- Structure de la table `jeuxaction`
--

DROP TABLE IF EXISTS `jeuxaction`;
CREATE TABLE IF NOT EXISTS `jeuxaction` (
  `CodeJeuxAction` smallint(6) DEFAULT NULL,
  KEY `fk_JeuxAction` (`CodeJeuxAction`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `jeuxaventure`
--

DROP TABLE IF EXISTS `jeuxaventure`;
CREATE TABLE IF NOT EXISTS `jeuxaventure` (
  `CodeJeuxAventure` smallint(6) DEFAULT NULL,
  KEY `fk_JeuxAventure` (`CodeJeuxAventure`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `CodeProd` smallint(6) NOT NULL AUTO_INCREMENT,
  `NomProd` varchar(30) NOT NULL,
  `DescProd` text,
  `CodeCategorie` smallint(10) DEFAULT NULL,
  `Prix` int(100) NOT NULL,
  PRIMARY KEY (`CodeProd`),
  KEY `fk_Produit` (`CodeCategorie`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`CodeProd`, `NomProd`, `DescProd`, `CodeCategorie`, `Prix`) VALUES
(1, 'Mount & Blade II: Bannerlord', 'Plongez dans le feu de l\'action dans Mount & Blade II : Bannerlord, l\'un des jeux les plus attendus de tous les temps. Plongez dans un monde médiéval réaliste, où les royaumes se battent constamment pour le pouvoir et les ressources. Menez une vie de guerrier, en goûtant à la réalité quotidienne des villes, en dirigeant des troupes lors de sièges et d\'énormes batailles. C\'est un RPG à ne pas oublier.', NULL, 30),
(2, 'Minecraft', 'Minecraft est un dit \"jeu bac à sable\" sur PC, qui permet à l\'utilisateur de façonner l\'univers qui l\'entoure dans les seules limites de son imagination. La version bêta actuelle parachute le joueur dans un monde généré aléatoirement et dynamiquement, où il doit survivre en exploitant les ressources environnantes.', NULL, 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
