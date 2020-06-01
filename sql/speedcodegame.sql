-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  lun. 01 juin 2020 à 17:17
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
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `CodeCategorie` smallint(6) NOT NULL,
  PRIMARY KEY (`CodeCategorie`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`CodeProd`, `NomProd`, `DescProd`, `CodeCategorie`, `Prix`) VALUES
(1, 'Mount & Blade II: Bannerlord', 'Plongez dans le feu de l\'action dans Mount & Blade II : Bannerlord, l\'un des jeux les plus attendus de tous les temps. Plongez dans un monde médiéval réaliste, où les royaumes se battent constamment pour le pouvoir et les ressources. Menez une vie de guerrier, en goûtant à la réalité quotidienne des villes, en dirigeant des troupes lors de sièges et d\'énormes batailles. C\'est un RPG à ne pas oublier.', NULL, 30),
(2, 'Minecraft', 'Minecraft est un dit \"jeu bac à sable\" sur PC, qui permet à l\'utilisateur de façonner l\'univers qui l\'entoure dans les seules limites de son imagination. La version bêta actuelle parachute le joueur dans un monde généré aléatoirement et dynamiquement, où il doit survivre en exploitant les ressources environnantes.', NULL, 5),
(3, 'Age of Empires II: Definitive ', 'Découvrez les campagnes d\'origine comme vous ne les aviez jamais vues, ainsi que les meilleures extensions, et parcourez plus de 200 heures de gameplay et 1 000 ans d\'histoire humaine. Affrontez d\'autres joueurs en ligne avec 35 civilisations différentes et dominez le monde à travers les âges.', NULL, 20),
(4, 'Red Dead Redemption 2', 'Red Dead Redemption 2, le jeu épique en monde ouvert de Rockstar Games acclamé par la critique et le mieux noté de cette génération de consoles, arrive maintenant sur PC avec du contenu inédit pour le mode Histoire, des améliorations graphiques et bien plus.', NULL, 60),
(5, 'The Elder Scrolls V: Skyrim Sp', 'Lauréat de plus de 200 récompenses du Jeu de l\'année ! Skyrim Special Edition apporte un souffle nouveau à cette aventure épique, avec force détail. La Special Edition comprend le célèbre jeu et les contenus additionnels, avec graphismes et effets remasterisés, rayons divins volumétriques, profondeur de champ dynamique, reflets et plus encore. Skyrim Special Edition apporte en outre toute la puissance des mods PC sur console.  Nouvelles quêtes, environnements, personnages, dialogue, armure, armes et plus encore... l\'expérience est sans limite.', NULL, 40),
(6, 'PLAYERUNKNOWN\'S BATTLEGROUNDS', 'PLAYERUNKNOWN\'S BATTLEGROUNDS is a battle royale shooter that pits 100 players against each other in a struggle for survival. Gather supplies and outwit your opponents to become the last person standing.', NULL, 30),
(7, 'Rocket League', 'Football et voitures font bon ménage dans cette suite basée sur les lois de la physique du grand classique tant apprécié, Supersonic Acrobatic Rocket-Powered Battle-Cars !\r\n\r\nJeu d\'action et de sport futuriste, Rocket League met le joueur aux commandes de véhicules dotés de turbos permettant de foncer dans des ballons pour marquer d\'incroyables buts ou de faire des arrêts d\'anthologie dans des arènes variées et riches en détails.', NULL, 20),
(8, 'STAR WARS Jedi: Fallen Order', 'Une aventure galactique vous attend dans Star Wars Jedi: Fallen Order, un nouveau jeu d\'action-aventure à la 3e personne, développé par Respawn Entertainment. Dans ce jeu narratif en solo, vous incarnez un Padawan Jedi qui a échappé de justesse à la purge de l\'Ordre 66 après les événements de l\'Épisode 3 : La revanche des Sith. Afin de reconstruire l\'Ordre Jedi, vous devez rassembler les pièces de votre passé brisé pour terminer votre entraînement, développer de nouvelles capacités de la Force et apprendre à maîtriser votre célèbre sabre laser, tout en gardant une longueur d\'avance sur l\'Empire et ses Inquisiteurs sans merci.', NULL, 36),
(9, 'DARK SOUL III - Season Pass', 'Lauréat du gamescom Award 2015 dans la catégorie \"Meilleur RPG\" et détenteur de plus de 35 récompenses et nominations à l\'E3, Dark Souls III vous replongera dans son monde impitoyable de ruines teinté de désespoir. Enrichissez votre expérience de Dark Souls III avec le Season Pass et obtenez l\'accès à 2 DLC épiques à petit prix. Venez découvrir de nouveaux boss, ennemis, cartes, armes et armures. Préparez-vous à embrasser les ténèbres... encore une fois !', NULL, 25),
(10, 'TrackMania² Stadium', 'TrackMania² Stadium est un jeu de course rapide et complètement fou ! Facile à prendre en main, son gameplay profond et purement basé sur les compétences des joueurs en a fait un succès sur la scène eSports depuis des années. Enfin, TrackMania² Stadium offre un contenu riche et varié, apporté par les joueurs grâce aux puissants outils de création de circuits, de voitures et de modes de jeu.', NULL, 5),
(11, 'Metro Exodus', 'Créé par 4A Games, Metro Exodus est un jeu de tir à la 1re personne axé sur la narration, qui mélange affrontements brutaux et infiltration avec exploration et survival horror dans un univers ultra-immersif.', NULL, 40),
(12, 'Assassin\'s Creed Odyssey', 'Forgez votre destin dans Assassin\'s Creed Odyssey.\r\nPassez de paria à légende vivante lors d\'une odyssée durant laquelle vous découvrirez votre passé et changerez le destin de la Grèce.\r\n\r\nPARTICIPEZ À DES BATAILLES ÉPIQUES\r\nDémontrez vos compétences de combat lors de vastes batailles entre Athènes et Sparte opposant des centaines de soldats, ou éperonnez et dispersez des flottes entières au cours de batailles navales en mer Égée.', NULL, 20),
(13, 'Fifa 20', 'FIFA 20 pour PC est le dernier né des nombreux jeux de la FIFA qui permettent aux joueurs d\'affronter une équipe de football (qu\'il s\'agisse d\'une toute nouvelle équipe non testée ou testée, ou d\'une équipe immédiatement reconnaissable par tous ceux qui regardent la télévision le samedi après-midi) et de la faire passer en première division de la Ligue ou dans tout autre tournoi où elle veut tenter de se faire une place.', NULL, 20),
(14, 'Call of Duty: Modern Warfare', 'Engagez-vous dans des combats multijoueurs palpitants, participez à des expériences coopératives d\'opérations spéciales et plongez dans l\'arène massive de Battle Royale avec Warzone.', NULL, 60),
(15, 'Grand Theft Auto V', 'Lorsqu\'un jeune arnaqueur, un braqueur de banque à la retraite et un terrifiant psychopathe se retrouvent piégés par de grands criminels, le gouvernement américain et l\'industrie du divertissement, ils décident de se lancer dans une série de braquages pour survivre dans une ville sans pitié, où ils ne peuvent se fier à personne, même entre eux.', NULL, 30),
(16, 'Garry\'s Mod', 'Garry\'s Mod est une boîte à outils graphique. À l\'inverse des jeux normaux, aucun but ni objectif n\'est prédéfini. Nous vous donnons les outils et vous faites le reste.\r\nPrenez des objets et faites-en ce que vous voulez pour créer tout ce qui vous passe par la tête : une voiture, une roquette, une catapulte ou quelque chose qui n\'a pas encore de nom... À vous de voir.\r\nEt si la construction n\'est pas votre fort, ne vous inquiétez pas ! Vous pouvez mettre une pléiade de personnages dans des positions très embarrassantes.', NULL, 10),
(17, 'Tom Clancy\'s Rainbow Six Siege', 'Maîtrisez l’art de la destruction et les gadgets dans Tom Clancy\'s Rainbow Six Siege. Faites face à des combats rapprochés intenses, affrontements mortels, tactiques, jeu d’équipe et actions explosives à chaque moment. Découvrez une nouvelle ère d\'échanges de tir féroces et une stratégie experte dans la lignée des anciens volets de la série Tom Clancy’s Rainbow Six.', NULL, 20),
(18, 'PAYDAY 2', 'PAYDAY 2 est un jeu de tir coopératif bourré d\'action qui permet jusqu\'à quatre joueurs d\'incarner une fois de plus les braqueurs originaux du célèbre gang PAYDAY, Dallas, Hoxton, Wolf et Chains, qui débarquent à Washington DC pour une série de crimes épiques.', NULL, 10),
(19, 'RESIDENT EVIL 3', 'Jill Valentine fait partie des derniers témoins des atrocités commises par Umbrella à Raccoon City. Pour l\'empêcher de parler, Umbrella a fait appel à son arme secrète, Nemesis !\r\n\r\nComprend également Resident Evil Resistance, un nouveau jeu multijoueurs à 1 contre 4 se déroulant dans l\'univers de Resident Evil, au cours duquel quatre survivants doivent affronter le cruel Mastermind.', NULL, 60),
(20, 'OVERWATCH', 'Overwatch sur PC est un jeu de tir à la première personne multijoueur en équipe développé par Blizzard Entertainment, qui est également connu pour les jeux très populaires de World of Warcraft et leurs dérivés.\r\n\r\nUne fois que les joueurs s\'inscrivent, ils sont répartis en deux équipes de six avec d’autres joueurs. Chaque joueur peut choisir parmi 30 personnages au maximum (dans le jeu, on les appelle des héros). Les personnages sont tous personnalisables : incluant des traits de personnalité et physiques charmants et originaux. Ces particularités peuvent inclure un joli sourire, une mèche de cheveux qui tombe sur leur visage à un moment donné, et de nombreuses autres caractéristiques subtiles mais non négligeables.', NULL, 20);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `motdepasse`) VALUES
(1, 'Foo', 'foo@gmail.com', '$2y$10$SYr1U.rCVl0JVEdjzWs9zu3NYzLSxDY8erYOdmlw5M/8c5AlFW0ne');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
