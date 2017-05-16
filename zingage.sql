-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 16 Mai 2017 à 16:57
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
  `poid_article` decimal(10,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id_article`, `ref_article`, `nom_article`, `nb_article`, `dim_article`, `bac_article`, `poid_article`) VALUES
(20, 'XO250OX', 'prototype', 250, '1mètre sur 4', 'Aucun', '40.000'),
(21, 'TOTO', 'TOTO', 1, '20X30', 'T3', '0.200'),
(22, 'test', 'test', 0, 'test', 'T2', '0.000'),
(23, 'GD4130-BKK1-E11A50800', 'SCANNER', 1, '20X30', 'Carton', '15.000'),
(25, '40267470', 'UHU Stick', 60, '10 x 3cm', 'Carton', '2.000'),
(26, '42930VGO0003', 'ARM ', 30, '', 'T1', '12.000'),
(27, '42921VFO0000', 'ARM FR LEFT ADJUST ZINGUE BLANC', 30, '', 'T2', '10.000');

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
  `of_scan` int(11) NOT NULL,
  `is_in_zingage` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `scan`
--

INSERT INTO `scan` (`id_scan`, `id_article`, `id_user_depart`, `id_user_retour`, `id_entreprise`, `date_scan_depart`, `date_scan_retour`, `of_scan`, `is_in_zingage`) VALUES
(191, 22, 12, NULL, 1, '2017-05-16 15:55:55', NULL, 444444, 1),
(192, 22, 12, NULL, 1, '2017-05-16 15:55:55', NULL, 444444, 1),
(193, 22, 12, NULL, 1, '2017-05-16 15:55:55', NULL, 444444, 1),
(194, 22, 12, NULL, 1, '2017-05-16 15:55:55', NULL, 444444, 1),
(195, 25, 12, NULL, 1, '2017-05-16 15:55:55', NULL, 444444, 1),
(196, 25, 12, NULL, 1, '2017-05-16 15:55:55', NULL, 444444, 1),
(197, 25, 12, NULL, 1, '2017-05-16 15:55:55', NULL, 444444, 1),
(198, 20, 12, NULL, 1, '2017-05-16 15:55:55', NULL, 444444, 1),
(199, 20, 12, NULL, 1, '2017-05-16 15:55:55', NULL, 444444, 1),
(200, 20, 12, NULL, 1, '2017-05-16 15:55:55', NULL, 444444, 1),
(201, 26, 12, NULL, 1, '2017-05-16 15:55:55', NULL, 444444, 1),
(202, 27, 12, 12, 1, '2017-05-16 15:55:55', '2017-05-16 15:58:17', 444444, 1),
(203, 27, 12, 12, 1, '2017-05-16 15:55:55', '2017-05-16 15:58:17', 444444, 1),
(204, 27, 12, 12, 1, '2017-05-16 15:55:55', '2017-05-16 15:58:17', 444444, 1);

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
(9, 'virgile.parat', 'PARAT', 'Virgile', '13m0wA4CrcIoc', 0),
(10, 'test', 'test', 'test', 'teVUmkBKOadeg', 0),
(11, 'otherdude', 'dude', 'other', 'ot0x9XP.7Nf/A', 0),
(12, 'nico', 'CHAPOCHNIKOFF', 'Nicolas', '00MI0gKiKuQ/I', 0);

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
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id_entreprise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `scan`
--
ALTER TABLE `scan`
  MODIFY `id_scan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
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
