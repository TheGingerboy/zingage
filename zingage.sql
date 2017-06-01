-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 01 Juin 2017 à 16:27
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `zingage`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `ref_article` varchar(50) COLLATE utf8_bin NOT NULL,
  `nom_article` varchar(100) COLLATE utf8_bin NOT NULL,
  `nb_article` int(11) DEFAULT NULL,
  `dim_article` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `bac_article` varchar(10) COLLATE utf8_bin NOT NULL,
  `poid_article` decimal(10,3) DEFAULT NULL,
  `of_article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id_article`, `ref_article`, `nom_article`, `nb_article`, `dim_article`, `bac_article`, `poid_article`, `of_article`) VALUES
(1, 'GD4130-BKK1-E11A50800', 'TOTO', 5, '20X30', 'T2', '0.200', 256895),
(2, '42930VGO0002', 'ARM COMP TENSION ZINGUE', 0, 'test', 'Aucun', '0.000', 7777777),
(3, 'test', 'SCANNER', 1, '20X30', 'T2', '15.000', 125565),
(4, 'Test', 'Ceci est un test', 666, '2x2cm', 'T3', '0.000', 67457234);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id_entreprise` int(11) NOT NULL,
  `nom_entreprise` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `entreprise`
--

INSERT INTO `entreprise` (`id_entreprise`, `nom_entreprise`) VALUES
(1, 'Honda France Manufacturing');

-- --------------------------------------------------------

--
-- Structure de la table `scan`
--

CREATE TABLE `scan` (
  `id_scan` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_user_depart` int(5) NOT NULL,
  `id_user_retour` int(5) DEFAULT NULL,
  `id_entreprise` int(11) NOT NULL,
  `date_scan_depart` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_scan_retour` datetime DEFAULT NULL,
  `is_in_zingage` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `scan`
--

INSERT INTO `scan` (`id_scan`, `id_article`, `id_user_depart`, `id_user_retour`, `id_entreprise`, `date_scan_depart`, `date_scan_retour`, `is_in_zingage`) VALUES
(29, 3, 1, 1, 1, '2017-05-23 11:14:29', '2017-04-11 12:06:46', 0),
(31, 1, 1, 1, 1, '2017-05-23 11:14:29', '2017-03-01 12:06:46', 0),
(32, 3, 1, 1, 1, '2017-05-23 11:14:29', '2017-02-01 12:06:46', 0),
(33, 3, 1, 1, 1, '2017-05-23 11:14:29', '2017-05-23 12:06:46', 0),
(34, 3, 1, 1, 1, '2017-05-23 11:14:29', '2017-05-23 18:19:11', 0),
(35, 3, 1, NULL, 1, '2017-05-23 14:41:42', NULL, 1),
(37, 4, 1, 1, 1, '2017-05-23 14:45:37', '2017-05-23 14:46:09', 0),
(38, 4, 1, 1, 1, '2017-05-23 14:45:37', '2017-05-23 14:46:09', 0),
(39, 4, 3, 1, 1, '2017-05-23 14:49:31', '2017-05-23 18:04:14', 0),
(40, 4, 1, 1, 1, '2017-05-23 14:55:17', '2017-05-23 18:17:31', 0),
(41, 3, 1, NULL, 1, '2017-05-29 10:50:09', NULL, 1),
(42, 3, 1, NULL, 1, '2017-05-29 10:50:09', NULL, 1),
(43, 3, 1, NULL, 1, '2017-05-29 10:50:09', NULL, 1),
(44, 3, 1, NULL, 1, '2017-05-29 10:50:09', NULL, 1),
(45, 3, 1, NULL, 1, '2017-05-29 10:50:09', NULL, 1),
(46, 3, 1, NULL, 1, '2017-05-29 10:50:09', NULL, 1),
(47, 4, 1, NULL, 1, '2017-05-29 11:28:08', NULL, 1),
(48, 4, 1, NULL, 1, '2017-05-29 11:28:43', NULL, 1),
(49, 4, 1, NULL, 1, '2017-05-29 11:28:43', NULL, 1),
(50, 4, 1, NULL, 1, '2017-05-29 11:28:43', NULL, 1),
(51, 4, 1, NULL, 1, '2017-05-29 11:28:43', NULL, 1),
(52, 4, 1, NULL, 1, '2017-05-29 11:28:43', NULL, 1),
(53, 1, 1, NULL, 1, '2017-05-29 11:29:23', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_user` int(11) NOT NULL,
  `identifiant_user` varchar(50) COLLATE utf8_bin NOT NULL,
  `nom_user` varchar(50) COLLATE utf8_bin NOT NULL,
  `prenom_user` varchar(50) COLLATE utf8_bin NOT NULL,
  `mdp_user` varchar(50) COLLATE utf8_bin NOT NULL,
  `role_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `identifiant_user`, `nom_user`, `prenom_user`, `mdp_user`, `role_user`) VALUES
(1, 'virgile.parat', 'PARAT', 'virgile', '13m0wA4CrcIoc', 0),
(2, 'Gingerboy', 'PARAT', 'Gingerboy', '13m0wA4CrcIoc', 0),
(3, 'Night', 'Fallon', 'Jimmy', 'ad8ZegQeUu2.6', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `id_article` (`id_article`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id_entreprise`),
  ADD KEY `id_entreprise` (`id_entreprise`);

--
-- Index pour la table `scan`
--
ALTER TABLE `scan`
  ADD PRIMARY KEY (`id_scan`),
  ADD KEY `id_scan` (`id_scan`),
  ADD KEY `id_article` (`id_article`),
  ADD KEY `id_user_depart` (`id_user_depart`),
  ADD KEY `id_user_retour` (`id_user_retour`),
  ADD KEY `id_entreprise` (`id_entreprise`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id_entreprise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `scan`
--
ALTER TABLE `scan`
  MODIFY `id_scan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `scan`
--
ALTER TABLE `scan`
  ADD CONSTRAINT `scan_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`),
  ADD CONSTRAINT `scan_ibfk_2` FOREIGN KEY (`id_user_depart`) REFERENCES `utilisateur` (`id_user`),
  ADD CONSTRAINT `scan_ibfk_3` FOREIGN KEY (`id_user_retour`) REFERENCES `utilisateur` (`id_user`),
  ADD CONSTRAINT `scan_ibfk_4` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id_entreprise`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
