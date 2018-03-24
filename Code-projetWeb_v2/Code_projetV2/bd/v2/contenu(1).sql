-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 22 mars 2018 à 16:08
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jgg_site`
--

-- --------------------------------------------------------

--
-- Structure de la table `actions`
--

CREATE TABLE `actions` (
  `ID_ACT` int(3) NOT NULL,
  `TITRE_ACT` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `LIEU_ACT` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `DATE_ACT` date NOT NULL,
  `SUJET_ACT` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `actions`
--

INSERT INTO `actions` (`ID_ACT`, `TITRE_ACT`, `LIEU_ACT`, `DATE_ACT`, `SUJET_ACT`) VALUES
(1, 'Réunion d''informatio', 'Saint Aubin', '0000-00-00', 'venez boire des coups et parler de génération.s');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `ID_ART` int(3) NOT NULL,
  `AUTEUR_ART` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TITRE_ART` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `CONTENU_ART` text COLLATE utf8_unicode_ci NOT NULL,
  `RESUME_ART` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `DATE_ART` date NOT NULL,
  `IMG_ART` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `VALIDE_ART` tinyint(1) NOT NULL DEFAULT '0',
  `VISIBLE_ART` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`ID_ART`, `AUTEUR_ART`, `TITRE_ART`, `CONTENU_ART`, `RESUME_ART`, `DATE_ART`, `VALIDE_ART`, `VISIBLE_ART`) VALUES
(1, 'JJ Rousseau', 'Pulpa Colada', 'C''est les meilleurs votez pour eux', 'Votez pour eux !', '0000-00-00', 0, 0),
(2, 'JJ Rousseau', 'Pulpa Colada2', 'C''est les meilleurs votez pour eux', 'Votez pour eux !', '0000-00-00', 0, 0),
(3, 'JJ Rousseau', 'Pulpa Colada3', 'C''est les meilleurs votez pour eux', 'Votez pour eux !', '0000-00-00', 0, 0),
(4, 'JJ Rousseau', 'Pulpa Colada4', 'C''est les meilleurs votez pour eux', 'Votez pour eux !', '0000-00-00', 0, 0),
(5, 'JJ Rousseau', 'Pulpa Colada5', 'C''est les meilleurs votez pour eux', 'Votez pour eux !', '0000-00-00', 0, 0),
(6, 'titi', 'dddddddddddddddddddd', 'ddddddddddddddddddddddddddddddddddd', 'ddddddddddddddddddddddd', '2018-03-22', 0, 0),
(7, 'titi', 'dddddddddddddddddddd', 'ddddddddddddddddddddddddddddddddddd', 'ddddddddddddddddddddddd', '2018-03-22', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `comites`
--

CREATE TABLE `comites` (
  `ID_COM` int(11) NOT NULL,
  `NOM_COM` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PRESENTATION_COM` text COLLATE utf8_unicode_ci NOT NULL,
  `CONTACT_COM` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `LIEU_COM` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `comites`
--

INSERT INTO `comites` (`ID_COM`, `NOM_COM`, `PRESENTATION_COM`, `CONTACT_COM`, `LIEU_COM`) VALUES
(1, 'Comités les Jeunes G', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww', 'Paul Puig sur facebo', 'Bordeaux');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `ID_COMM` int(5) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `ID_ART` int(11) NOT NULL,
  `DATE_COMM` date NOT NULL,
  `TEXT_COMM` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL,
  `NOM_USER` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `PRENOM_USER` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `PASSWORD_USER` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `MAIL_USER` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ZIPCODE_USER` int(5) NOT NULL,
  `LABEL_ROLE_USER` enum('INSCRIT','MEMBRE','MOD','ADMIN') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'INSCRIT',
  `ACTIF_USER` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID_USER`, `NOM_USER`, `PRENOM_USER`, `PASSWORD_USER`, `MAIL_USER`, `ZIPCODE_USER`, `LABEL_ROLE_USER`, `ACTIF_USER`) VALUES
(1, 'Keith', 'Richards', 'satisfaction', 'krichards@ensc.fr', 33000, 'MOD', 1),
(2, 'Benoit', 'H', '2017', 'bhamon@ensc.fr', 33000, 'ADMIN', 1),
(3, 'Bernard', 'Claverie', 'ensc', 'bclaverie@ensc.fr', 33000, 'INSCRIT', 1),
(4, 'Bill', 'Gates', 'microsoft', 'bgates@ensc.fr', 33000, 'MEMBRE', 1),
(5, 'titi', 'toto', '11111111', 'titi@toto.fr', 2000, 'ADMIN', 1),
(6, 'fffffffffffffffffff', 'ffffffffffffffffffff', '11111111', 'tata@titi.fr', 25896, 'INSCRIT', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`ID_ACT`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`ID_ART`);

--
-- Index pour la table `comites`
--
ALTER TABLE `comites`
  ADD PRIMARY KEY (`ID_COM`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`ID_COMM`),
  ADD KEY `FK_ID_USER` (`ID_USER`),
  ADD KEY `FK_ID_ART` (`ID_ART`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actions`
--
ALTER TABLE `actions`
  MODIFY `ID_ACT` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `ID_ART` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `comites`
--
ALTER TABLE `comites`
  MODIFY `ID_COM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `ID_COMM` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `FK_ID_ART` FOREIGN KEY (`ID_ART`) REFERENCES `articles` (`ID_ART`),
  ADD CONSTRAINT `FK_ID_USER` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
