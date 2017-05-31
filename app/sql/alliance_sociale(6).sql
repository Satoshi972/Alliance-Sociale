-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 31 Mai 2017 à 16:42
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `alliance_sociale`
--
CREATE DATABASE IF NOT EXISTS `alliance_sociale` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `alliance_sociale`;

-- --------------------------------------------------------

--
-- Structure de la table `about`
--

DROP TABLE IF EXISTS `about`;
CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `word` text NOT NULL,
  `history` text NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `about`
--

INSERT INTO `about` (`id`, `word`, `history`, `description`) VALUES
(1, 'Le projet d’animations collectives familles est une partie intégrante du projet de centre social. Par des actions spécifiques, il permet de renforcer les axes d’intervention transversaux et de compléter une offre de réponses en rapport aux éléments de diagnostics qui construisent le projet d’animation globale du Centre social.', 'Le projet d’animations collectives familles est une partie intégrante du projet de centre social. Par des actions spécifiques, il permet de renforcer les axes d’intervention transversaux et de compléter une offre de réponses en rapport aux éléments de diagnostics qui construisent le projet d’animation globale du Centre social.', 'assets/vid/centre_social.mp4');

-- --------------------------------------------------------

--
-- Structure de la table `activity`
--

DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `act_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `content` text,
  `picture` varchar(255) DEFAULT NULL,
  `form` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `activity`
--

INSERT INTO `activity` (`id`, `act_id`, `name`, `content`, `picture`, `form`) VALUES
(1, 'A1', 'Gymnastique', NULL, NULL, ''),
(2, 'A2', 'Judo', 'Le judo (littéralement voie de la souplesse) a été créé en tant que pédagogie physique, mentale et morale au japon par Jigorō Kanō en 1882. Il est généralement catégorisé comme un art martial moderne, qui a par la suite évolué en sport de combat et en sport Olympique. Sa caractéristique la plus proéminente est son élément compétitif dont l\'objectif est soit de projeter, soit d\'amener l\'adversaire au sol, de l\'immobiliser (Techniques de maîtrise), ou de l\'obliger à abandonner à l\'aide de clés articulaires et d\'étranglements. Les frappes et coups à main nue ainsi que les armes font aussi partie du judo mais seulement sous la forme pré-arrangée (kata) et ne sont pas autorisés en judo de compétition ni en pratique libre', 'assets/img/picture_5910a1b6b681d.jpg', ''),
(3, 'A3', 'Zumba', NULL, NULL, ''),
(4, 'A4', 'Randonnée', NULL, NULL, ''),
(5, 'A5', 'Accompagnement scolaire', NULL, NULL, ''),
(6, 'A6', 'Danse traditionnelle', NULL, NULL, ''),
(7, 'A7', 'Accueil de loisirs (sans hébergement)', NULL, NULL, ''),
(8, 'A8', 'Couture', 'Une couture est l\'assemblage de deux ou plusieurs pièces à l\'aide de fil à coudre, soit manuellement avec une aiguille, soit en utilisant une machine à coudre ou une surjeteuse. La couture est utilisée dans la fabrication des vêtements, du linge de maison (draps, mouchoirs...), des éléments de décoration (nappes, rideaux, tentures ...), des chaussures, de la maroquinerie (bagages, sacs...). La première utilisation connue du mot daterait du XIVe siècle1.\r\n\r\nLa couture des bords des plaies et incisions contribue en chirurgie à la rapidité et qualité de leur cicatrisation. On parle dans ce domaine de « suture » et les fils ont la particularité d\'être dégradés par le corps (« résorbables »), comme l\'est le catgut.', 'assets/img/picture_59108b7176fb7.jpg', ''),
(9, 'A9', 'Cuisine', NULL, NULL, ''),
(10, 'A10', 'Formation du personnel', NULL, NULL, ''),
(11, 'A11', 'Prévention et secours civique', NULL, NULL, ''),
(12, 'A12', 'BAFA', NULL, NULL, ''),
(13, 'A13', 'Autres', NULL, NULL, ''),
(14, 'A14', 'Text 3', 'lorem ipsum', 'assets/img/activity/img_591b9cb7e6c0d.jpg', ''),
(15, 'A15', 'Text 3', 'lorem ipsum', 'assets/img/activity/img_591b9d1024123.jpg', 'Exercice Stage Pawoka.pdf.pdf'),
(16, 'A16', 'Aloe vera', 'ycyffifiyygy', 'assets/img/activity/img_591e138222469.jpg', 'Exercice Stage Pawoka.pdf.pdf'),
(17, 'A17', 'Menthe', 'yftufhgvhhg', 'assets/img/activity/img_591e15af77848.png', 'assets/form/Exercice Stage Pawoka.pdf.pdf'),
(18, 'A18', 'Aloe vera', 'pikachu', 'assets/img/activity/img_591f9c92a5618.jpg', 'assets/form/Exercice Stage Pawoka.pdf.pdf');

--
-- Déclencheurs `activity`
--
DROP TRIGGER IF EXISTS `custom_id`;
DELIMITER $$
CREATE TRIGGER `custom_id` BEFORE INSERT ON `activity` FOR EACH ROW SET NEW.act_id = 
  CONCAT("A",COALESCE((SELECT MAX(Id)+1 from activity),1))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `mail` varchar(255) NOT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `contacts`
--

INSERT INTO `contacts` (`id`, `date`, `title`, `content`, `mail`, `statut`) VALUES
(2, '2017-05-04 13:06:59', 'pikachu', 'lorem ipsum', 't@g.co', 0),
(3, '2017-05-04 13:17:49', 'pikachu', 'lorem ipsum', 't@g.co', 0),
(5, '2017-05-04 19:27:49', 'pikachu', 'lorem ipsum', 't@g.co', 0),
(6, '2017-05-04 19:29:34', 'pikachu', 'lorem ipsum', 't@g.co', 0),
(7, '2017-05-04 19:30:23', 'pikachu', 'lorem ipsum', 't@g.co', 1),
(8, '2017-05-04 19:33:38', 'pikachu', 'lorem ipsum', 't@g.co', 0),
(9, '2017-05-04 19:35:42', 'pikachu', 'lorem ipsum', 't@g.co', 0),
(10, '2017-05-04 19:36:32', 'pikachu', 'lorem ipsum', 't@g.co', 0),
(11, '2017-05-04 19:37:33', 'pikachu', 'lorem ipsum', 't@g.co', 0),
(12, '2017-05-04 19:46:22', 'pikachu', 'formContent', 't@g.co', 0),
(13, '2017-05-04 19:53:00', 'TOTOTOHV', 'lolilolioloiloliolko', 't@g.co', 0),
(14, '2017-05-04 19:57:23', 'TOTOTOHV', 'lolilolioloiloliolko', 't@g.co', 0),
(15, '2017-05-04 20:01:20', 'TOTOTOHV', 'lolilolioloiloliolko', 't@g.co', 0),
(16, '2017-05-04 20:03:25', 'TOTOTOHV', 'lolilolioloiloliolko', 't@g.co', 0),
(17, '2017-05-04 20:04:50', 'TOTOTOHV', 'lolilolioloiloliolko', 't@g.co', 0),
(18, '2017-05-04 20:05:17', 'TOTOTOHV', 'lolilolioloiloliolko', 't@g.co', 0),
(19, '2017-05-04 20:05:49', 'TOTOTOHV', 'lolilolioloiloliolko', 't@g.co', 0),
(20, '2017-05-04 20:06:24', 'TOTOTOHV', 'lolilolioloiloliolko', 't@g.co', 0),
(21, '2017-05-04 20:06:56', 'TOTOTOHV', 'lolilolioloiloliolko', 't@g.co', 0),
(22, '2017-05-04 20:08:30', 'TOTOTOHV', 'lolilolioloiloliolko', 't@g.co', 0),
(23, '2017-05-04 20:09:56', 'TOTOTOHV', 'lolilolioloiloliolko', 't@g.co', 0),
(24, '2017-05-04 20:10:34', 'TOTOTOHV', 'lolilolioloiloliolko', 't@g.co', 0),
(25, '2017-05-04 20:11:20', 'toto', 'lolilolioloiloliolko', 't@g.co', 0),
(26, '2017-05-04 20:12:43', 'TOTOTOHV', 'lolilolilol', 't@g.co', 0),
(27, '2017-05-04 20:13:21', 'Test pour Jordan', 'ujyfyvfj', 't@g.co', 0),
(28, '2017-05-04 20:18:37', 'Test ajout', 'lol', 't@g.co', 0),
(29, '2017-05-04 20:25:40', 'TOTOTOHV', 'Envoyer message', 't@g.co', 0),
(30, '2017-05-04 20:29:22', 'TOTOTOHV', 'Envoyer message', 't@g.co', 0),
(31, '2017-05-04 20:30:28', 'TOTOTOHV', 'Envoyer message', 't@g.co', 0),
(32, '2017-05-04 23:49:11', 'pikachu', 'test', 't@g.co', 0),
(33, '2017-05-05 00:00:43', 'pikachu', 'Votre formulaire a bien été envoyé', 't@g.co', 0),
(34, '2017-05-05 00:01:32', 'pikachu', 'lol', 't@g.co', 0),
(35, '2017-05-05 00:02:03', 'pikachu', 'Votre formulaire a bien été envoyé', 't@g.co', 0),
(36, '2017-05-05 00:07:58', 'pikachu', 'Votre formulaire a bien été envoyé', 't@g.co', 0),
(37, '2017-05-05 00:08:44', 'pikachu', 'Votre formulaire a bien été envoyé', 't@g.co', 0),
(38, '2017-05-05 00:09:34', 'pikachu', 'Votre formulaire a bien été envoyé', 't@g.co', 0),
(39, '2017-05-05 00:10:10', 'pikachu', 'Votre formulaire a bien été envoyé', 't@g.co', 0),
(40, '2017-05-05 00:11:04', 'pikachu', 'toto', 't@g.co', 0),
(41, '2017-05-05 00:11:30', 'pikachu', 'totototo', 't@g.co', 0),
(42, '2017-05-05 08:11:25', 'pikachu', 'test', 't@g.co', 0),
(43, '2017-05-05 08:31:43', 'pikachu', 'test', 't@g.co', 0),
(44, '2017-05-05 11:15:57', 'demande de tarifs', 'je souhaite pratiquer un sport \r\npuis je connaitre vos activités sportives ? et vos tarifs?', 'jugjty@hotmail.fr', 1),
(45, '2017-05-10 00:00:00', 'test', 'lorem ipsum', 't@g.co', 1);

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `id_event` varchar(255) DEFAULT NULL,
  `start` date NOT NULL,
  `end` date DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `quota` int(11) NOT NULL DEFAULT '0',
  `id_activity` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `events`
--

INSERT INTO `events` (`id`, `id_event`, `start`, `end`, `title`, `content`, `quota`, `id_activity`, `picture`) VALUES
(13, 'EVT13', '2017-05-22', '2017-05-29', 'La croisière s\'amuse', 'Venez nombreux !!!!', 30, 'A13', 'assets/medias/img_590ca153cd244.jpg'),
(2, 'EVT2', '2017-04-13', NULL, 'Test2', 'Jordan est le meileur', 0, 'A13', 'assets/medias/media58ed3aee5459e.jpg 	'),
(12, 'EVT12', '2017-04-01', NULL, 'Test pour Jordan', 'tototo', 1, 'A6', 'assets/medias/img_58f4e0715a305.png'),
(4, 'EVT4', '2017-05-25', '2017-05-21', 'Test 4', 'Cédric nous soutiens !!!!', 0, 'A13', 'assets/medias/img_590fd9a4e7f13.jpg'),
(5, 'EVT5', '2017-11-20', NULL, 'test 5', 'L\'anniversaire de Ruddy', 0, 'A3', 'assets/medias/media58f14bcc94962.jpg'),
(6, 'EVT6', '2017-03-14', '2017-04-21', 'Test1', '', 1, 'A2', 'assets/medias/media58ed3a293be9e.jpg 	'),
(7, 'EVT7', '2017-04-13', '2017-04-28', 'Test 3', 'Céline nous attends a la ligne depuis 7j', 18, 'A11', 'assets/medias/media58ed3b1f7fe05.jpg'),
(8, 'EVT8', '2017-04-13', '2017-04-28', 'Test 3', 'Céline nous attends a la ligne depuis 7j', 18, 'A11', 'assets/medias/media58ed3b1f7fe05.jpg'),
(9, 'EVT9', '2017-04-13', '2017-04-28', 'Test 3', 'Céline nous attends a la ligne depuis 7j', 18, 'A11', 'assets/medias/media58ed3b1f7fe05.jpg'),
(10, 'EVT10', '2017-04-01', NULL, 'toto', 'enfin ca devrais passer', 0, 'A1', 'assets/medias/img_58f403af323ab.png'),
(11, 'EVT11', '2017-04-01', NULL, 'TOTOTOHV', 'test test test test', 0, 'A13', ''),
(14, 'EVT14', '2017-05-20', NULL, 'Test ajout', 'lorem ipsum', 0, 'A13', 'assets/medias/img_59136a66b6842.jpg'),
(15, 'EVT15', '2017-05-04', '2017-05-20', 'Test ajout 2', 'lorem ipsum 2', 29, 'A13', 'assets/medias/img_5913522319234.jpg');

--
-- Déclencheurs `events`
--
DROP TRIGGER IF EXISTS `custom_id_event`;
DELIMITER $$
CREATE TRIGGER `custom_id_event` BEFORE INSERT ON `events` FOR EACH ROW SET NEW.id_event = 
  CONCAT("EVT",COALESCE((SELECT MAX(Id)+1 from events),1))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `medias`
--

DROP TABLE IF EXISTS `medias`;
CREATE TABLE `medias` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '0',
  `id_related` varchar(255) NOT NULL DEFAULT 'A13'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Contenu de la table `medias`
--

INSERT INTO `medias` (`id`, `url`, `visible`, `id_related`) VALUES
(1, 'assets/img/img_58ebc74b2dd5c.jpg', 0, 'A13'),
(2, 'assets/img/img_58ebc7a732066.jpg', 0, 'A13'),
(3, 'assets/img/img_58ebc7ac78ebb.jpg', 0, 'A13'),
(4, 'assets/medias/media58eccf9a867c0.jpg', 0, 'A13'),
(5, 'assets/medias/media58eccf9a87488.jpg', 0, 'A13'),
(6, 'assets/medias/media58eccf9a87937.jpg', 0, 'A13'),
(7, 'assets/medias/media58eccfc9cb620.jpg', 0, 'A13'),
(8, 'assets/medias/media58eccfc9cbf7b.jpg', 0, 'A13'),
(9, 'assets/medias/media58eccfc9cc3a1.jpg', 0, 'A13'),
(13, 'assets/medias/media58ecef1d0b671.jpg', 0, 'A13'),
(16, 'assets/medias/media58ed398e580b2.jpg', 0, 'A13'),
(17, 'assets/medias/media58ed3a293be9e.jpg', 0, 'A13'),
(19, 'assets/medias/media58ed3b1f7fe05.jpg', 0, 'A13'),
(20, 'assets/medias/media58ed3bb6dced6.jpg', 0, 'A13'),
(21, 'assets/medias/media58f14bcc94962.jpg', 0, 'A13'),
(22, 'assets/medias/media58f14bcc94ed2.jpg', 0, 'A13'),
(23, 'assets/medias/media58f14bcc952da.jpg', 0, 'A13'),
(24, 'assets/medias/media58f14bcc956a5.jpg', 0, 'A13'),
(25, 'assets/medias/media58f14bcc95a82.jpg', 0, 'A13'),
(26, 'assets/medias/media58f28a2b5d667.jpg', 1, 'A5'),
(27, 'assets/medias/media58f28a2b5e4c1.jpg', 1, 'A5'),
(28, 'assets/medias/media590ca2e3e7c00.jpg', 1, 'EVT13'),
(29, 'assets/medias/media590ca2e3e94c1.jpg', 1, 'EVT13'),
(30, 'assets/medias/media59176e7c1e969.jpg', 1, 'EVT10'),
(31, 'assets/medias/media591770ed636bc.jpg', 0, 'EVT13'),
(32, 'assets/medias/media59208cae199d8.jpg', 0, 'EVT13'),
(33, 'assets/medias/media592096373956b.jpg', 0, 'EVT13'),
(34, 'assets/medias/media5920963739f52.jpg', 0, 'EVT13'),
(35, 'assets/medias/media592096373a93d.jpg', 0, 'EVT13'),
(36, 'assets/medias/media592096373b25c.jpg', 0, 'EVT13'),
(37, 'assets/medias/media5920966158643.png', 0, 'EVT13'),
(38, 'assets/medias/media59209661592ad.jpg', 0, 'EVT13'),
(39, 'assets/medias/media5920966159b45.jpg', 0, 'EVT13'),
(40, 'assets/medias/media592096615a528.jpg', 0, 'EVT13'),
(41, 'assets/medias/media592096615af65.jpg', 0, 'EVT13'),
(42, 'assets/medias/media592096730888f.png', 0, 'EVT13'),
(43, 'assets/medias/media5920967309461.jpg', 0, 'EVT13'),
(44, 'assets/medias/media5920967309fef.jpg', 0, 'EVT13'),
(45, 'assets/medias/media592096730aade.jpg', 0, 'EVT13'),
(46, 'assets/medias/media592096730b509.jpg', 0, 'EVT13');

-- --------------------------------------------------------

--
-- Structure de la table `participate_to`
--

DROP TABLE IF EXISTS `participate_to`;
CREATE TABLE `participate_to` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_events` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `partners`
--

DROP TABLE IF EXISTS `partners`;
CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `partners`
--

INSERT INTO `partners` (`id`, `name`, `url`) VALUES
(7, 'Espace Sud', '/img/partners/Espace Sud.png'),
(8, 'Simar', '/img/partners/Simar.png'),
(9, 'Caf', '/img/partners/Caf.png'),
(10, 'DRJSCS', '/img/partners/DRJSCS.png'),
(11, 'AS', '/img/partners/AS.png');

-- --------------------------------------------------------

--
-- Structure de la table `reset_psw`
--

DROP TABLE IF EXISTS `reset_psw`;
CREATE TABLE `reset_psw` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'member'),
(2, 'admin'),
(3, 'editor');

-- --------------------------------------------------------

--
-- Structure de la table `site_info`
--

DROP TABLE IF EXISTS `site_info`;
CREATE TABLE `site_info` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `header` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `site_info`
--

INSERT INTO `site_info` (`id`, `logo`, `header`, `address`, `schedule`, `phone`) VALUES
(1, 'img', 'img', 'RESIDENCE GAIAC\r\nLE MARIN', 'Lundi à Vendredi: 08:00 - 17:00\r\nSamedi 09:00 - 12h, 14:00 - 17:00\r\nDimanche: FERME', '0696 74 76 58');

-- --------------------------------------------------------

--
-- Structure de la table `suscribe_to`
--

DROP TABLE IF EXISTS `suscribe_to`;
CREATE TABLE `suscribe_to` (
  `id` int(11) NOT NULL,
  `id_usr` int(11) DEFAULT NULL,
  `activity` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `suscribe_to`
--

INSERT INTO `suscribe_to` (`id`, `id_usr`, `activity`) VALUES
(19, 5, 'Aloe vera'),
(18, 5, 'Autres'),
(17, 5, 'Cuisine'),
(16, 4, 'Couture'),
(15, 4, 'Accueil de loisirs (sans hébergement)'),
(14, 4, 'Randonnée'),
(13, 4, 'Judo'),
(12, 4, 'Gymnastique'),
(20, 6, 'Gymnastique'),
(21, 6, 'Judo'),
(22, 6, 'Zumba'),
(23, 6, 'Randonnée'),
(24, 6, 'Accompagnement scolaire'),
(25, 6, 'Danse traditionnelle'),
(26, 6, 'Accueil de loisirs (sans hébergement)'),
(27, 6, 'Couture'),
(28, 6, 'Cuisine'),
(29, 6, 'Formation du personnel'),
(30, 6, 'Prévention et secours civique'),
(31, 6, 'BAFA'),
(32, 6, 'Autres'),
(33, 6, 'Text 3'),
(34, 6, 'Aloe vera'),
(35, 6, 'Menthe'),
(36, 7, 'Gymnastique'),
(37, 7, 'Judo'),
(38, 7, 'Danse traditionnelle'),
(39, 7, 'Cuisine');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `caf` varchar(255) NOT NULL,
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `phone`, `role`, `password`, `caf`, `birthday`) VALUES
(4, 'toto', 'toto', 'toto@t.co', '0123456789', 'admin', '$2y$10$B0ZxKCO9TS6LEC4LldVlkOeMxD2DnvuUi0amlMQ9k0sh3ZMCHiBGG', '0123456', '2017-05-01'),
(5, 'Ruddy', 'MARIE-LUCE', 'ruddy.marieluce@gmail.com', '0123456789', 'editor', '$2y$10$yhTjoDEzkvS1z.ucNH0.Zufuc49izHyOe6GnbJgvaLM9zoMKsi2E.', '0123456', '1993-11-20'),
(6, 'jsdfvh', 'jhqhfvn', 'pikachu@pokemon.co', '0236959595', 'admin', '$2y$10$Ms8Rh461a8e3Whg4gG37D.YUKLkqHjykSu06AAuJi0OXlrEiiBokK', '0123456', '2017-05-02'),
(7, 'Satoshi', 'TAJIRI', 'nintendo@nintendo.co', '0123456789', 'member', '$2y$10$9PpJnEf09Rxo1t8R/R5pou/SyLTZDoWS/ZhI0mHUAYYYZ7o8Wuowu', '0123456', '2017-05-05');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `participate_to`
--
ALTER TABLE `participate_to`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_events` (`id_events`);

--
-- Index pour la table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reset_psw`
--
ALTER TABLE `reset_psw`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `site_info`
--
ALTER TABLE `site_info`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `suscribe_to`
--
ALTER TABLE `suscribe_to`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usr` (`id_usr`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `medias`
--
ALTER TABLE `medias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT pour la table `participate_to`
--
ALTER TABLE `participate_to`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `reset_psw`
--
ALTER TABLE `reset_psw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `site_info`
--
ALTER TABLE `site_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `suscribe_to`
--
ALTER TABLE `suscribe_to`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `participate_to`
--
ALTER TABLE `participate_to`
  ADD CONSTRAINT `participate_to_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
