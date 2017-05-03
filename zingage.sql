-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 03 Mai 2017 à 11:48
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
(1, 'test', 'test', 0, '0', 'test', '0.000'),
(2, 'test2', 'test', 0, '0', 'test', '0.000'),
(3, '42911VFO0000', 'Arm Fr Right Adjust Zingue Blanc', 30, '0', 'T2', '10.000'),
(5, 'GD4130-BKK1', 'Scanner', 1, '30', 'T2', '1.000'),
(6, 'tata', 'nom de tata', 80, '30x30', 'T2', '250.000'),
(7, '183338- ZT5 -0100', 'Arm Fr Right Adjust Zingue Blanc', 80, '30x30', 'T2', '10.000'),
(8, '42911 VFO 0000', 'Arm Fr Right Adjust Zingue Blanc', 30, '30x30', 'T2', '250.000'),
(9, 'hello', 'hello_world', 20, '20x50', 'baccalaurÃ', '0.000'),
(10, 'TOTO', 'TOTO', 0, 'TOTO', 'TOTO', '0.000'),
(11, 'Tarik', 'Tarik', 0, 'Tarik', 'Tarik', '0.000'),
(12, '42930VGO0002', 'ARM COMP TENSION ZINGUE', 60, '', 'T1', '8.000'),
(14, 'GD4130-BKK1-E11A50800', 'SCANNER', 1, '20X30', 'Carton', '0.200');

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
  `id_article` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_entreprise` int(11) NOT NULL,
  `date_scan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `of_scan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `scan`
--

INSERT INTO `scan` (`id_article`, `id_user`, `id_entreprise`, `date_scan`, `of_scan`) VALUES
(1, 9, 1, '0000-00-00 00:00:00', 225756),
(1, 9, 1, '0000-00-00 00:00:00', 225756),
(1, 9, 1, '0000-00-00 00:00:00', 225756),
(1, 9, 1, '0000-00-00 00:00:00', 0),
(1, 9, 1, '0000-00-00 00:00:00', 0),
(1, 9, 1, '0000-00-00 00:00:00', 0),
(1, 9, 1, '0000-00-00 00:00:00', 225756),
(1, 9, 1, '0000-00-00 00:00:00', 225756),
(1, 9, 1, '0000-00-00 00:00:00', 225756);

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
(9, 'virgile.parat', 'PARAT', 'Virgile', '13m0wA4CrcIoc', 0);

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
  ADD KEY `id_article` (`id_article`),
  ADD KEY `id_user` (`id_user`),
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
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id_entreprise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `scan`
--
ALTER TABLE `scan`
  ADD CONSTRAINT `scan_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`),
  ADD CONSTRAINT `scan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`),
  ADD CONSTRAINT `scan_ibfk_3` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id_entreprise`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
