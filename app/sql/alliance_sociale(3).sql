-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 14 Avril 2017 à 02:42
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

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
  `history` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `activity`
--

DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `cat_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `content` text,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `activity`
--

INSERT INTO `activity` (`id`, `cat_id`, `name`, `category`, `content`, `picture`) VALUES
(1, 'A1', 'Gymnastique', 3, NULL, NULL),
(2, 'A2', 'Judo', 3, NULL, NULL),
(3, 'A3', 'Zumba', 3, NULL, NULL),
(4, 'A4', 'Randonnée', 3, NULL, NULL),
(5, 'A5', 'Accompagnement scolaire', 4, NULL, NULL),
(6, 'A6', 'Danse traditionnelle', 3, NULL, NULL),
(7, 'A7', 'Accueil de loisirs (sans hébergement)', 3, NULL, NULL),
(8, 'A8', 'Couture', 3, NULL, NULL),
(9, 'A9', 'Cuisine', 3, NULL, NULL),
(10, 'A10', 'Formation du personnel', 1, NULL, NULL),
(11, 'A11', 'Prévention et secours civique', 1, NULL, NULL),
(12, 'A12', 'BAFA', 1, NULL, NULL),
(13, 'A13', 'Autres', 5, NULL, NULL);

--
-- Déclencheurs `activity`
--
DROP TRIGGER IF EXISTS `custom_id`;
DELIMITER $$
CREATE TRIGGER `custom_id` BEFORE INSERT ON `activity` FOR EACH ROW SET NEW.cat_id = 
  CONCAT("A",COALESCE((SELECT MAX(Id)+1 from activity),1))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `cat_id`, `name`) VALUES
(1, 'CAT1', 'Formation'),
(2, 'CAT2', 'Comité des jeunes'),
(3, 'CAT3', 'Sports et loisirs'),
(4, 'CAT4', 'Education'),
(5, 'CAT5', 'Animation');

--
-- Déclencheurs `category`
--
DROP TRIGGER IF EXISTS `custom_id_category`;
DELIMITER $$
CREATE TRIGGER `custom_id_category` BEFORE INSERT ON `category` FOR EACH ROW SET NEW.cat_id = 
  CONCAT("CAT",COALESCE((SELECT MAX(Id)+1 from category),1))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `mail` varchar(255) NOT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `id_event` int(11) DEFAULT NULL,
  `start` date NOT NULL,
  `end` date DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `quota` int(11) NOT NULL DEFAULT '0',
  `id_activity` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déclencheurs `events`
--
DROP TRIGGER IF EXISTS `custom_id_event`;
DELIMITER $$
CREATE TRIGGER `custom_id_event` BEFORE INSERT ON `events` FOR EACH ROW SET NEW.id_event = 
  CONCAT("EVENT",COALESCE((SELECT MAX(Id)+1 from events),1))
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
  `visible` tinyint(1) NOT NULL,
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
(10, 'assets/medias/media58ecd0aedabb0.jpg', 0, 'A13'),
(11, 'assets/medias/media58ecd0aedb4b4.jpg', 0, 'A13'),
(12, 'assets/medias/media58ecd0aedb8cf.jpg', 0, 'A13'),
(13, 'assets/medias/media58ecef1d0b671.jpg', 0, 'A13'),
(14, 'assets/medias/media58ecef1d0f03b.mp4', 0, 'A13'),
(15, 'assets/medias/media58ecef1d0fa75.png', 0, 'A13'),
(16, 'assets/medias/media58ed398e580b2.jpg', 0, 'A13'),
(17, 'assets/medias/media58ed3a293be9e.jpg', 0, 'A13'),
(18, 'assets/medias/media58ed3aee5459e.jpg', 0, 'A13'),
(19, 'assets/medias/media58ed3b1f7fe05.jpg', 0, 'A13'),
(20, 'assets/medias/media58ed3bb6dced6.jpg', 0, 'A13');

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
(11, 'martinique', '/img/partners/url_58ed33f5d5777.jpg'),
(12, 'test partners2', '/img/partners/test partners2.jpg'),
(13, 'mqe', '/img/partners/mqe.png');

-- --------------------------------------------------------

--
-- Structure de la table `reset_psw`
--

DROP TABLE IF EXISTS `reset_psw`;
CREATE TABLE `reset_psw` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
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
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `sms` tinyint(1) NOT NULL,
  `role` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Index pour la table `category`
--
ALTER TABLE `category`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `medias`
--
ALTER TABLE `medias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `participate_to`
--
ALTER TABLE `participate_to`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
