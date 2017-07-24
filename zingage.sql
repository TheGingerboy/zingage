-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 12 Juillet 2017 à 11:58
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
(2, '42930VGO0002', 'ARM COMP TENSION ZINGUE', 0, 'test', 'Aucun', '0.000', 77777),
(3, 'test', 'SCANNER', 1, '20X30', 'T2', '15.000', 125565),
(4, 'Test', 'Ceci est un test', 666, '2x2cm', 'T3', '0.000', 67457234),
(5, 't', 'ARM COMP TENSION ZINGUE', 20, '10*15', 'T1', '50.000', 6035395),
(6, '306832008000', 'bouteille d''eau', 6, '27.5cm', 'T1', '1.250', 12326480),
(7, '213443378124', 'boîte en carton ', 10, '20 x 45 x 13', 'Carton', '250.150', 634525),
(8, '42940VGO0002', 'Arm Comp RL RR adj Zingue Blanc', 20, '', 'T1', '11.000', 666666),
(9, '42911VFO0000', 'ttt', 1309, '', 'T1', '15.000', 15);

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
  `id_zingeur` int(11) NOT NULL,
  `date_scan_depart` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_scan_retour` datetime DEFAULT NULL,
  `is_in_zingage` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `scan`
--

INSERT INTO `scan` (`id_scan`, `id_article`, `id_user_depart`, `id_user_retour`, `id_entreprise`, `id_zingeur`, `date_scan_depart`, `date_scan_retour`, `is_in_zingage`) VALUES
(13, 5, 1, NULL, 1, 12, '2017-06-26 18:05:20', NULL, 1),
(14, 5, 1, NULL, 1, 12, '2017-06-26 18:05:20', NULL, 1),
(15, 5, 1, NULL, 1, 12, '2017-06-26 18:05:20', NULL, 1),
(16, 5, 1, NULL, 1, 12, '2017-06-26 18:05:20', NULL, 1),
(17, 5, 1, NULL, 1, 12, '2017-06-26 18:05:20', NULL, 1),
(18, 5, 1, NULL, 1, 12, '2017-06-26 18:05:20', NULL, 1),
(19, 5, 1, NULL, 1, 12, '2017-06-26 18:05:20', NULL, 1),
(20, 5, 1, NULL, 1, 12, '2017-06-26 18:05:20', NULL, 1),
(21, 7, 1, 1, 1, 12, '2017-06-28 17:43:37', '2017-06-28 17:45:57', 0),
(22, 7, 1, 1, 1, 12, '2017-06-28 17:43:37', '2017-06-28 17:45:57', 0),
(23, 5, 1, NULL, 1, 12, '2017-06-28 17:44:05', NULL, 1),
(24, 7, 1, 1, 1, 12, '2017-06-28 17:45:07', '2017-06-28 17:45:57', 0),
(25, 7, 1, 1, 1, 12, '2017-06-28 17:47:46', '2017-06-28 17:48:18', 0),
(26, 9, 1, NULL, 1, 12, '2017-06-29 16:51:22', NULL, 1),
(27, 9, 1, NULL, 1, 12, '2017-06-29 16:51:22', NULL, 1);

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
(1, 'virgile.parat', 'PARAT', 'virgile', 'GbRXLq2Gs39Ro', 1),
(11, 'test', 'test', 'test', 'GbNn/FxJdldqs', 0);

-- --------------------------------------------------------

--
-- Structure de la table `zingeur`
--

CREATE TABLE `zingeur` (
  `id_zingeur` int(11) NOT NULL,
  `nom_zingeur` varchar(50) COLLATE utf8_bin NOT NULL,
  `num_adr_zingeur` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `rue_adr_zingeur` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `compl_adr_zingeur` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `ville_adr_zingeur` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `cp_adr_zingeur` int(11) DEFAULT NULL,
  `pays_adr_zingeur` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `zingeur`
--

INSERT INTO `zingeur` (`id_zingeur`, `nom_zingeur`, `num_adr_zingeur`, `rue_adr_zingeur`, `compl_adr_zingeur`, `ville_adr_zingeur`, `cp_adr_zingeur`, `pays_adr_zingeur`) VALUES
(12, 'Test Zingeur', '36 bis', 'Rue du savoir', 'CEDEX 454', 'Orléans', 45150, 'FRANCE');

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
  ADD KEY `id_entreprise` (`id_entreprise`),
  ADD KEY `id_zingeur` (`id_zingeur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `zingeur`
--
ALTER TABLE `zingeur`
  ADD PRIMARY KEY (`id_zingeur`),
  ADD KEY `id_zingeur` (`id_zingeur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id_entreprise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `scan`
--
ALTER TABLE `scan`
  MODIFY `id_scan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `zingeur`
--
ALTER TABLE `zingeur`
  MODIFY `id_zingeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
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
  ADD CONSTRAINT `scan_ibfk_4` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id_entreprise`),
  ADD CONSTRAINT `scan_ibfk_5` FOREIGN KEY (`id_zingeur`) REFERENCES `zingeur` (`id_zingeur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
