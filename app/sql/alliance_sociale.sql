-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 11 Avril 2017 à 16:19
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  7.1.1

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
  `picture` int(11) NOT NULL,
  `img1` varchar(255) NOT NULL,
  `img2` varchar(255) NOT NULL,
  `img3` varchar(255) NOT NULL,
  `img4` varchar(255) NOT NULL,
  `img5` varchar(255) NOT NULL,
  `img6` varchar(255) NOT NULL,
  `img7` varchar(255) NOT NULL,
  `img8` varchar(255) NOT NULL,
  `img9` varchar(255) NOT NULL
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
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `activity`
--

INSERT INTO `activity` (`id`, `cat_id`, `name`, `category`) VALUES
(1, 'A1', 'Gymnastique', 3),
(2, 'A2', 'Judo', 3),
(3, 'A3', 'Zumba', 3),
(4, 'A4', 'Randonnée', 3),
(5, 'A5', 'Accompagnement scolaire', 4),
(6, 'A6', 'Danse traditionnelle', 3),
(7, 'A7', 'Accueil de loisirs (sans hébergement)', 3),
(8, 'A8', 'Couture', 3),
(9, 'A9', 'Cuisine', 3),
(10, 'A10', 'Formation du personnel', 1),
(11, 'A11', 'Prévention et secours civique', 1),
(12, 'A12', 'BAFA', 1),
(13, 'A13', 'Autres', 5);

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
-- Structure de la table `big_events`
--

DROP TABLE IF EXISTS `big_events`;
CREATE TABLE `big_events` (
  `id` int(11) NOT NULL,
  `big_id` varchar(255) DEFAULT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `quota` int(11) NOT NULL,
  `id_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déclencheurs `big_events`
--
DROP TRIGGER IF EXISTS `custom_id_big`;
DELIMITER $$
CREATE TRIGGER `custom_id_big` BEFORE INSERT ON `big_events` FOR EACH ROW SET NEW.big_id = 
  CONCAT("BIG",COALESCE((SELECT MAX(Id)+1 from big_events),1))
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
  `staut` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `little_events`
--

DROP TABLE IF EXISTS `little_events`;
CREATE TABLE `little_events` (
  `id` int(11) NOT NULL,
  `lit_id` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `quota` int(11) NOT NULL,
  `hour` time NOT NULL,
  `id_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déclencheurs `little_events`
--
DROP TRIGGER IF EXISTS `custom_id_little`;
DELIMITER $$
CREATE TRIGGER `custom_id_little` BEFORE INSERT ON `little_events` FOR EACH ROW SET NEW.lit_id = 
  CONCAT("LIT",COALESCE((SELECT MAX(Id)+1 from little_events),1))
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
  `visible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Contenu de la table `medias`
--

INSERT INTO `medias` (`id`, `url`, `visible`) VALUES
(1, 'assets/img/img_58ebc74b2dd5c.jpg', 0),
(2, 'assets/img/img_58ebc7a732066.jpg', 0),
(3, 'assets/img/img_58ebc7ac78ebb.jpg', 0),
(4, 'assets/medias/media58eccf9a867c0.jpg', 0),
(5, 'assets/medias/media58eccf9a87488.jpg', 0),
(6, 'assets/medias/media58eccf9a87937.jpg', 0),
(7, 'assets/medias/media58eccfc9cb620.jpg', 0),
(8, 'assets/medias/media58eccfc9cbf7b.jpg', 0),
(9, 'assets/medias/media58eccfc9cc3a1.jpg', 0),
(10, 'assets/medias/media58ecd0aedabb0.jpg', 0),
(11, 'assets/medias/media58ecd0aedb4b4.jpg', 0),
(12, 'assets/medias/media58ecd0aedb8cf.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `media_of`
--

DROP TABLE IF EXISTS `media_of`;
CREATE TABLE `media_of` (
  `id` int(11) NOT NULL,
  `id_media` int(11) NOT NULL,
  `id_related` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `schedule` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Index pour la table `big_events`
--
ALTER TABLE `big_events`
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
-- Index pour la table `little_events`
--
ALTER TABLE `little_events`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `media_of`
--
ALTER TABLE `media_of`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `participate_to`
--
ALTER TABLE `participate_to`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_events` (`id_events`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `big_events`
--
ALTER TABLE `big_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT pour la table `little_events`
--
ALTER TABLE `little_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `medias`
--
ALTER TABLE `medias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `media_of`
--
ALTER TABLE `media_of`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `participate_to`
--
ALTER TABLE `participate_to`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
