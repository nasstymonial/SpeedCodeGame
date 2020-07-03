-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  ven. 03 juil. 2020 à 02:01
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

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
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`NumClient`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_commande` date NOT NULL,
  `total` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `etat` enum('en cours de traitement','envoyé','livré') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'en cours de traitement',
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `date_commande`, `total`, `id_user`, `etat`) VALUES
(5, '2020-07-03', 20, 3, 'en cours de traitement'),
(6, '2020-07-03', 110, 3, 'en cours de traitement');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `CodeProd` smallint(6) NOT NULL AUTO_INCREMENT,
  `NomProd` varchar(30) NOT NULL,
  `DescProd` text,
  `Prix` double(10,2) NOT NULL,
  `vedette` varchar(25) NOT NULL,
  `categorie` varchar(25) NOT NULL,
  PRIMARY KEY (`CodeProd`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`CodeProd`, `NomProd`, `DescProd`, `Prix`, `vedette`, `categorie`) VALUES
(1, 'Mount &amp; Blade II: Bannerlo', 'Plongez dans le feu de l\'action dans Mount &amp; Blade II : Bannerlord, l\'un des jeux les plus attendus de tous les temps. Plongez dans un monde médiéval réaliste, où les royaumes se battent constamment pour le pouvoir et les ressources. Menez une vie de guerrier, en goûtant à la réalité quotidienne des villes, en dirigeant des troupes lors de sièges et d\'énormes batailles. C\'est un RPG à ne pas oublier.', 30.00, 'oui', 'rpg'),
(2, 'Minecraft', 'Minecraft est un dit \"jeu bac à sable\" sur PC, qui permet à l\'utilisateur de façonner l\'univers qui l\'entoure dans les seules limites de son imagination. La version bêta actuelle parachute le joueur dans un monde généré aléatoirement et dynamiquement, où il doit survivre en exploitant les ressources environnantes.', 5.00, 'oui', 'créatif'),
(3, 'Age of Empires II: Definitive ', 'Découvrez les campagnes d\'origine comme vous ne les aviez jamais vues, ainsi que les meilleures extensions, et parcourez plus de 200 heures de gameplay et 1 000 ans d\'histoire humaine. Affrontez d\'autres joueurs en ligne avec 35 civilisations différentes et dominez le monde à travers les âges.', 20.00, 'oui', 'stratégie'),
(4, 'Red Dead Redemption 2', 'Red Dead Redemption 2, le jeu épique en monde ouvert de Rockstar Games acclamé par la critique et le mieux noté de cette génération de consoles, arrive maintenant sur PC avec du contenu inédit pour le mode Histoire, des améliorations graphiques et bien plus.', 60.00, 'oui', 'action'),
(5, 'The Elder Scrolls V: Skyrim Sp', 'Lauréat de plus de 200 récompenses du Jeu de l\'année ! Skyrim Special Edition apporte un souffle nouveau à cette aventure épique, avec force détail. La Special Edition comprend le célèbre jeu et les contenus additionnels, avec graphismes et effets remasterisés, rayons divins volumétriques, profondeur de champ dynamique, reflets et plus encore. Skyrim Special Edition apporte en outre toute la puissance des mods PC sur console.  Nouvelles quêtes, environnements, personnages, dialogue, armure, armes et plus encore... l\'expérience est sans limite.', 40.00, 'non', 'rpg'),
(6, 'PLAYERUNKNOWN\'S BATTLEGROUNDS', 'PLAYERUNKNOWN\'S BATTLEGROUNDS is a battle royale shooter that pits 100 players against each other in a struggle for survival. Gather supplies and outwit your opponents to become the last person standing.', 30.00, 'non', 'battle royal'),
(7, 'Rocket League', 'Football et voitures font bon ménage dans cette suite basée sur les lois de la physique du grand classique tant apprécié, Supersonic Acrobatic Rocket-Powered Battle-Cars !\r\n\r\nJeu d\'action et de sport futuriste, Rocket League met le joueur aux commandes de véhicules dotés de turbos permettant de foncer dans des ballons pour marquer d\'incroyables buts ou de faire des arrêts d\'anthologie dans des arènes variées et riches en détails.', 20.00, 'non', 'sport'),
(8, 'STAR WARS Jedi: Fallen Order', 'Une aventure galactique vous attend dans Star Wars Jedi: Fallen Order, un nouveau jeu d\'action-aventure à la 3e personne, développé par Respawn Entertainment. Dans ce jeu narratif en solo, vous incarnez un Padawan Jedi qui a échappé de justesse à la purge de l\'Ordre 66 après les événements de l\'Épisode 3 : La revanche des Sith. Afin de reconstruire l\'Ordre Jedi, vous devez rassembler les pièces de votre passé brisé pour terminer votre entraînement, développer de nouvelles capacités de la Force et apprendre à maîtriser votre célèbre sabre laser, tout en gardant une longueur d\'avance sur l\'Empire et ses Inquisiteurs sans merci.', 36.00, 'non', 'action'),
(9, 'DARK SOUL III - Season Pass', 'Lauréat du gamescom Award 2015 dans la catégorie \"Meilleur RPG\" et détenteur de plus de 35 récompenses et nominations à l\'E3, Dark Souls III vous replongera dans son monde impitoyable de ruines teinté de désespoir. Enrichissez votre expérience de Dark Souls III avec le Season Pass et obtenez l\'accès à 2 DLC épiques à petit prix. Venez découvrir de nouveaux boss, ennemis, cartes, armes et armures. Préparez-vous à embrasser les ténèbres... encore une fois !', 25.00, 'non', 'rpg'),
(10, 'TrackMania² Stadium', 'TrackMania² Stadium est un jeu de course rapide et complètement fou ! Facile à prendre en main, son gameplay profond et purement basé sur les compétences des joueurs en a fait un succès sur la scène eSports depuis des années. Enfin, TrackMania² Stadium offre un contenu riche et varié, apporté par les joueurs grâce aux puissants outils de création de circuits, de voitures et de modes de jeu.', 5.00, 'oui', 'course'),
(11, 'Metro Exodus', 'Créé par 4A Games, Metro Exodus est un jeu de tir à la 1re personne axé sur la narration, qui mélange affrontements brutaux et infiltration avec exploration et survival horror dans un univers ultra-immersif.', 40.00, 'non', 'fps'),
(12, 'Assassin\'s Creed Odyssey', 'Forgez votre destin dans Assassin\'s Creed Odyssey.\r\nPassez de paria à légende vivante lors d\'une odyssée durant laquelle vous découvrirez votre passé et changerez le destin de la Grèce.\r\n\r\nPARTICIPEZ À DES BATAILLES ÉPIQUES\r\nDémontrez vos compétences de combat lors de vastes batailles entre Athènes et Sparte opposant des centaines de soldats, ou éperonnez et dispersez des flottes entières au cours de batailles navales en mer Égée.', 20.00, 'non', 'aventure'),
(13, 'Fifa 20', 'FIFA 20 pour PC est le dernier né des nombreux jeux de la FIFA qui permettent aux joueurs d\'affronter une équipe de football (qu\'il s\'agisse d\'une toute nouvelle équipe non testée ou testée, ou d\'une équipe immédiatement reconnaissable par tous ceux qui regardent la télévision le samedi après-midi) et de la faire passer en première division de la Ligue ou dans tout autre tournoi où elle veut tenter de se faire une place.', 20.00, 'non', 'sport'),
(14, 'Call of Duty: Modern Warfare', 'Engagez-vous dans des combats multijoueurs palpitants, participez à des expériences coopératives d\'opérations spéciales et plongez dans l\'arène massive de Battle Royale avec Warzone.', 60.00, 'non', 'fps'),
(15, 'Grand Theft Auto V', 'Lorsqu\'un jeune arnaqueur, un braqueur de banque à la retraite et un terrifiant psychopathe se retrouvent piégés par de grands criminels, le gouvernement américain et l\'industrie du divertissement, ils décident de se lancer dans une série de braquages pour survivre dans une ville sans pitié, où ils ne peuvent se fier à personne, même entre eux.', 30.00, 'oui', 'action'),
(16, 'Garry\'s Mod', 'Garry\'s Mod est une boîte à outils graphique. À l\'inverse des jeux normaux, aucun but ni objectif n\'est prédéfini. Nous vous donnons les outils et vous faites le reste.\r\nPrenez des objets et faites-en ce que vous voulez pour créer tout ce qui vous passe par la tête : une voiture, une roquette, une catapulte ou quelque chose qui n\'a pas encore de nom... À vous de voir.\r\nEt si la construction n\'est pas votre fort, ne vous inquiétez pas ! Vous pouvez mettre une pléiade de personnages dans des positions très embarrassantes.', 10.00, 'non', 'créatif'),
(17, 'Tom Clancy\'s Rainbow Six Siege', 'Maîtrisez l’art de la destruction et les gadgets dans Tom Clancy\'s Rainbow Six Siege. Faites face à des combats rapprochés intenses, affrontements mortels, tactiques, jeu d’équipe et actions explosives à chaque moment. Découvrez une nouvelle ère d\'échanges de tir féroces et une stratégie experte dans la lignée des anciens volets de la série Tom Clancy’s Rainbow Six.', 20.00, 'non', 'aventure'),
(18, 'PAYDAY 2', 'PAYDAY 2 est un jeu de tir coopératif bourré d\'action qui permet jusqu\'à quatre joueurs d\'incarner une fois de plus les braqueurs originaux du célèbre gang PAYDAY, Dallas, Hoxton, Wolf et Chains, qui débarquent à Washington DC pour une série de crimes épiques.', 10.00, 'oui', 'fps'),
(19, 'RESIDENT EVIL 3', 'Jill Valentine fait partie des derniers témoins des atrocités commises par Umbrella à Raccoon City. Pour l\'empêcher de parler, Umbrella a fait appel à son arme secrète, Nemesis !\r\n\r\nComprend également Resident Evil Resistance, un nouveau jeu multijoueurs à 1 contre 4 se déroulant dans l\'univers de Resident Evil, au cours duquel quatre survivants doivent affronter le cruel Mastermind.', 60.00, 'non', 'survie'),
(20, 'OVERWATCH', 'Overwatch sur PC est un jeu de tir à la première personne multijoueur en équipe développé par Blizzard Entertainment, qui est également connu pour les jeux très populaires de World of Warcraft et leurs dérivés.\r\n\r\nUne fois que les joueurs s\'inscrivent, ils sont répartis en deux équipes de six avec d’autres joueurs. Chaque joueur peut choisir parmi 30 personnages au maximum (dans le jeu, on les appelle des héros). Les personnages sont tous personnalisables : incluant des traits de personnalité et physiques charmants et originaux. Ces particularités peuvent inclure un joli sourire, une mèche de cheveux qui tombe sur leur visage à un moment donné, et de nombreuses autres caractéristiques subtiles mais non négligeables.', 20.00, 'non', 'fps');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `motdepasse`) VALUES
(1, 'Foo', 'foodefou@gmail.com', '$2y$10$SYr1U.rCVl0JVEdjzWs9zu3NYzLSxDY8erYOdmlw5M/8c5AlFW0ne'),
(3, 'Nass', 'nass@gmail.com', '$2y$10$.EwUazN2TAVLH6IlcR2YGuw/KzshEziox8P5WL1scCJCQNFWgG6di'),
(4, 'toto', 'toto@gmail.com', '$2y$10$C4rihETaRbzje7a3kn9wkeWNxU1tJh0TMhdfRg/N/MGR3w96UGgw6'),
(5, 'administrateur', 'admin@speedcodegame.com', '$2y$10$KUdcM36.6EDOWCIIXjrf3eE.NqlvI072F8GXzt2ODTGTwd3ftd2Ie');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
