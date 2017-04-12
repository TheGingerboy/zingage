-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 16 Janvier 2017 à 16:47
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `greenteuf`
--

-- --------------------------------------------------------

--
-- Structure de la table `gt_article`
--

CREATE TABLE IF NOT EXISTS `gt_article` (
  `id_article` int(10) NOT NULL AUTO_INCREMENT,
  `nom_article` varchar(255) NOT NULL,
  `prix_article` double NOT NULL,
  `img_article` varchar(255) NOT NULL,
  `id_categorie_article` int(10) NOT NULL,
  `description_article` text NOT NULL,
  `DateAjout` date NOT NULL,
  `dimension_article` varchar(100) NOT NULL,
  `poids_article` int(100) NOT NULL,
  `en_avant_article` int(1) NOT NULL,
  `saison_article` int(2) NOT NULL,
  `inov_article` int(2) NOT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Contenu de la table `gt_article`
--

INSERT INTO `gt_article` (`id_article`, `nom_article`, `prix_article`, `img_article`, `id_categorie_article`, `description_article`, `DateAjout`, `dimension_article`, `poids_article`, `en_avant_article`, `saison_article`, `inov_article`) VALUES
(1, 'Machine à pop corn', 20, 'PopCorn.jpg', 1, 'Pour un événement gourmand et qui donne du plaisir, offrez du pop-corn à vos invités. sucré ou salé, c', '2016-10-28', '50x50', 15, 0, 1, 0),
(2, 'Baby-foot', 50, 'BabyFoot.jpg', 1, 'Pour tous les passionnés de football, vivez votre passion du ballon rond au sein de votre fête !\r\nPetits et grands, réunissez-vous, en famille ou entre amis autour de ce babyfoot pour un match inoubliable. Avec son aspect robuste et sa finition bois, préparez-vous, à vous mesurer contre l''équipe adverse dans des parties endiablées ! Bonne ambiance et détente assurée !', '2016-12-02', '150x100', 80, 0, 0, 0),
(3, 'Chaise pliante', 5, 'chaisePliante.jpg', 1, 'Cilicia dextro qui sublimius pari montis viget late ortum minutis.', '2016-12-02', '60x30', 2, 0, 0, 0),
(4, 'Ping Pong', 20, 'PingPong.jpg', 1, 'La pluie, la neige, le gel et le soleil n''altèreront aucunement cette table de tennis de table est conçue pour des échanges par tout temps et pour longtemps. Elle permet de marquer ses premiers points dans d''excellentes conditions, puis de faire des progrès rapides avant de se décider à défier toute la famille.', '2016-12-09', '160x110', 75, 0, 0, 0),
(5, 'Table Mixage', 30, 'TableMixage.jpg', 2, 'Soyez libre de bouger et de vous éclater avec les invités de la soirée. En plus de votre ordinateur, contrôlez votre mix depuis votre smartphone ou tablette, grâce à la technologie sans fil Bluetooth et « My Remote » depuis l’app dédiée DJUCED Master.\r\nPendant la soirée, faites voter les invités pour leurs titres favoris et faites plaisir en live à votre public. La playlist votée est visible sur votre deuxième écran (tablette ou smartphone) pour la suivre en instantané.\r\nRecevez les titres, les noms d’artistes ou les messages dédicaces que les invités de la soirée aimeraient entendre. Du sur-mesure pour une soirée encore plus mémorable !', '2016-12-03', '30x20', 20, 0, 0, 0),
(6, 'Pompe à bierre', 10, 'PompeABierre.jpg', 1, 'Une conception robuste, la tireuse à bière vous offre la possibilité de devenir barman à domicile ! Vous pourrez servir des bières fraîches pression à volonté ! Le fût en métal de 6 litres comblera largement tous vos besoins et ceux de vos invités lors de soirées organisées dans votre maison ou votre appartement. L''utilisation est simplifiée au maximum. Un indicateur de température sur l''écran LCD vous informe quand la bière est à la température idéale pour la dégustation, soit 3°C ! Il y a également un indicateur de niveau de remplissage pour savoir à tout instant la quantité de bière qui reste dans le fût, et recharger à temps pour ne pas être en pénurie !', '2016-12-04', '24x50', 32, 0, 0, 0),
(7, 'Projecteur', 30, 'VideoProjecteur.jpg', 1, 'Au design soigné et facile à transporter, ce vidéoprojecteur vous permettra de faire des présentations nettes et précises, même dans un environnement lumineux.', '2016-12-04', '22x13', 10, 0, 0, 0),
(8, 'Enceintes', 10, 'Enceintes.jpg', 2, 'Paire d''enceintes puissantes à deux étages, avec un très bon rendu sonore, des basses profondes, ainsi que de nombreuses possibilités de raccordements.\r\nFacilement transportables, elles conviennent parfaitement à une utilisation scénique répétée.\r\nLe rendu sonore limpide et très bien équilibré, permet à ces enceintes de trouver leur place dans absolument tout type de manifestation, du mariage en petit comité jusqu''au concert de rock. Elles excellent tout particulièrement dans la restitution des basses, à la fois riches, profondes et intenses et ce sans aucune distorsion !', '2016-12-06', '140x60', 60, 0, 0, 0),
(9, 'Lampe de Scène', 2, 'ProjecteurLumiere.jpg', 1, 'Fabriqué, dans un aluminium de couleur noir mat, il est équipé d''un arceau métallique réglable pour une fixation au plafond voir sur un mur ou sur un pied porteur.\r\nL''alimentation se fait via un bloc secteur qui se branche à une prise femelle Jack.\r\nUne télécommande extra-plate multi-fonctions permet de commander à distance ce projecteur et de l’éteindre si nécessaire.\r\nUn petit trépied articulé permet une fixation sous la base via un filetage.', '2016-12-06', '14x8', 2, 0, 0, 0),
(10, 'Appareil Photo', 50, 'appareilPhoto.jpg', 1, 'Appareil tactile, ce qui permet de zoomer avec deux doigts ou de faire défiler les vues. Il filme en 25p ou 24p en HD 1080p. Le flash intégré est capable de contrôler à distance des flashs compatibles. Le système d’autofocus à 9 collimateurs, donne de bons résultats. L’appareil est plutôt réactif et atteint 5 images/s en rafale. Un bon reflex pour les amateurs créatifs qui gagnera à être associé à un meilleur objectif.', '2016-12-07', '20x14', 4, 1, 0, 1),
(11, 'Barbecue à Gaz ', 15, 'BBQ_Gaz.jpg', 2, 'Ce barbecue s’allume très simplement par piézo. Avec ses brûleurs indépendants, il permet de faire cuire différents aliments à plusieurs puissances. Ces brûleurs se contrôlent à l’aide de gros boutons. Les deux tablettes latérales du barbecue vous permettent de poser vos plats et aliments. Par ailleurs, l’une des tablettes peut faire office de réchauffe plats car elle est dotée d’un brûleur. Le barbecue possède 2 grilles de cuisson en fonte et amovibles, ainsi qu’une grille émaillée superposée qui garde au chaud les aliments déjà cuits.', '2016-12-07', '130x50', 30, 0, 0, 0),
(12, 'Barbecue Electrique', 10, 'BBQ_Electrique.jpg', 2, 'Organisez des barbecues toute l''année grâce au grill électrique. Même en cas de météo défavorable, cet appareil pratique vous permet de profiter de plats grillés. Et lorsque le soleil est au rendez-vous, il suffit de l''installer sur le pied qui est inclus dans la livraison, et la fête en plein air peut commencer !\r\nL''élément chauffant offre une puissance maximale de 2000W et est réglable progressivement via le thermostat. Sa forme serpentine garantit une répartition uniforme de la chaleur sur une surface d''environ 900 cm² - tous les aliments seront bien grillés, qu''ils se trouvent sur les bords ou au centre. Un témoin lumineux vous indiquera si l''appareil est allumé. Pour un nettoyage facile de la cuve de récupération des graisses, l''élément chauffant est amovible. Un commutateur de sécurité l''éteindra automatiquement s''il venait à être retiré pendant le fonctionnement de l''appareil.', '2016-12-08', '125x43', 63, 0, 0, 0),
(13, 'Appareil à Fondue', 15, 'Fondu.png', 1, 'Pour partager un moment de détente et de convivialité, la marque Proline a pensé à tout avec cette fondue !\r\nQue ce soit en famille ou lors d’une soirée entre amis,  cette fondue est l’accessoire indispensable pour faire plaisir à tous les convives. \r\nEn effet, avec  ses 6 fourchettes vous êtes sûr de profiter d’un repas rapide et convivial.\r\nD’une capacité totale de 1,3 litre, cette fondue trouvera sa place sur toutes les tables. Par ailleurs, grâce à son thermostat réglable avec témoin lumineux, vous êtes assuré de toujours atteindre la bonne température.', '2016-12-09', '50x60', 13, 1, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `gt_carte`
--

CREATE TABLE IF NOT EXISTS `gt_carte` (
  `id_carte` int(10) NOT NULL AUTO_INCREMENT,
  `num_carte` int(100) NOT NULL,
  `id_locataire` int(10) NOT NULL,
  `id_type_carte_carte` int(10) NOT NULL,
  PRIMARY KEY (`id_carte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `gt_categorie`
--

CREATE TABLE IF NOT EXISTS `gt_categorie` (
  `id_categorie` int(10) NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(50) NOT NULL,
  PRIMARY KEY (`id_categorie`),
  UNIQUE KEY `nom_categorie` (`nom_categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `gt_categorie`
--

INSERT INTO `gt_categorie` (`id_categorie`, `nom_categorie`) VALUES
(1, 'detente'),
(2, 'entretien');

-- --------------------------------------------------------

--
-- Structure de la table `gt_commande`
--

CREATE TABLE IF NOT EXISTS `gt_commande` (
  `id_commande` int(10) NOT NULL AUTO_INCREMENT,
  `id_user_commande` int(10) NOT NULL,
  `date_commande` date NOT NULL,
  `date_rendu_prevu_commande` date NOT NULL,
  `date_rendu` date DEFAULT NULL,
  PRIMARY KEY (`id_commande`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Contenu de la table `gt_commande`
--

INSERT INTO `gt_commande` (`id_commande`, `id_user_commande`, `date_commande`, `date_rendu_prevu_commande`, `date_rendu`) VALUES
(1, 2, '2016-12-02', '2016-12-03', '2016-12-04'),
(2, 3, '2016-12-05', '2016-12-09', '2016-12-09');

-- --------------------------------------------------------

--
-- Structure de la table `gt_commande_article`
--

CREATE TABLE IF NOT EXISTS `gt_commande_article` (
  `id_commandej` int(10) NOT NULL,
  `id_articlej` int(10) NOT NULL,
  `nb_article_commande` int(11) NOT NULL,
  PRIMARY KEY (`id_commandej`,`id_articlej`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `gt_commande_article`
--

INSERT INTO `gt_commande_article` (`id_commandej`, `id_articlej`, `nb_article_commande`) VALUES
(1, 5, 2),
(1, 6, 1),
(2, 1, 3),
(2, 2, 2),
(2, 3, 1),
(2, 4, 4),
(2, 5, 2),
(2, 6, 1),
(2, 7, 1),
(2, 8, 2),
(2, 9, 2),
(2, 10, 3);

-- --------------------------------------------------------

--
-- Structure de la table `gt_comment`
--

CREATE TABLE IF NOT EXISTS `gt_comment` (
  `id_comment` int(10) NOT NULL AUTO_INCREMENT,
  `titre_comment` varchar(50) NOT NULL,
  `text_comment` text NOT NULL,
  `note_comment` int(10) NOT NULL,
  `id_user_comment` int(10) NOT NULL,
  `id_article_comment` int(10) NOT NULL,
  PRIMARY KEY (`id_comment`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `gt_comment`
--

INSERT INTO `gt_comment` (`id_comment`, `titre_comment`, `text_comment`, `note_comment`, `id_user_comment`, `id_article_comment`) VALUES
(1, 'Barbecue Génial !!', 'Montius nos tumore inusitato quodam et novo ut rebellis et maiestati recalcitrantes Augustae per haec quae strepit incusat iratus nimirum quod contumacem praefectum, quid rerum ordo postulat ignorare dissimulantem formidine tenus iusserim custodiri.', 4, 1, 11),
(2, 'Problème de branchement', 'Montius nos tumore inusitato quodam et novo ut rebellis et maiestati recalcitrantes Augustae per haec quae strepit incusat iratus nimirum quod contumacem praefectum, quid rerum ordo postulat ignorare dissimulantem formidine tenus iusserim custodiri.', 2, 5, 5),
(3, 'un titre', 'coucou', 3, 2, 2),
(4, 'un titre', 'coucou', 3, 2, 2),
(5, 'un titre', 'coucou', 3, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `gt_img_site`
--

CREATE TABLE IF NOT EXISTS `gt_img_site` (
  `id_img_site` int(11) NOT NULL AUTO_INCREMENT,
  `valeur_img_site` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_img_site`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Contenu de la table `gt_img_site`
--

INSERT INTO `gt_img_site` (`id_img_site`, `valeur_img_site`) VALUES
(1, 'logoGT.png');

-- --------------------------------------------------------

--
-- Structure de la table `gt_mail_site`
--

CREATE TABLE IF NOT EXISTS `gt_mail_site` (
  `id_mail_site` int(11) NOT NULL AUTO_INCREMENT,
  `valeur_mail_site` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_mail_site`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Contenu de la table `gt_mail_site`
--

INSERT INTO `gt_mail_site` (`id_mail_site`, `valeur_mail_site`) VALUES
(1, 'contact@greenteuf.fr');

-- --------------------------------------------------------

--
-- Structure de la table `gt_partenaire`
--

CREATE TABLE IF NOT EXISTS `gt_partenaire` (
  `id_partenaire` int(11) NOT NULL AUTO_INCREMENT,
  `nom_partenaire` varchar(255) NOT NULL,
  `img_partenaire` varchar(100) NOT NULL,
  PRIMARY KEY (`id_partenaire`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `gt_partenaire`
--

INSERT INTO `gt_partenaire` (`id_partenaire`, `nom_partenaire`, `img_partenaire`) VALUES
(1, '', '2');

-- --------------------------------------------------------

--
-- Structure de la table `gt_tel_site`
--

CREATE TABLE IF NOT EXISTS `gt_tel_site` (
  `id_tel_site` int(11) NOT NULL AUTO_INCREMENT,
  `valeur_tel_site` varchar(10) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_tel_site`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Contenu de la table `gt_tel_site`
--

INSERT INTO `gt_tel_site` (`id_tel_site`, `valeur_tel_site`) VALUES
(1, '0238454545');

-- --------------------------------------------------------

--
-- Structure de la table `gt_tva`
--

CREATE TABLE IF NOT EXISTS `gt_tva` (
  `id_tva` int(11) NOT NULL AUTO_INCREMENT,
  `valeur_tva` double NOT NULL,
  PRIMARY KEY (`id_tva`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Contenu de la table `gt_tva`
--

INSERT INTO `gt_tva` (`id_tva`, `valeur_tva`) VALUES
(1, 20);

-- --------------------------------------------------------

--
-- Structure de la table `gt_type_carte`
--

CREATE TABLE IF NOT EXISTS `gt_type_carte` (
  `id_type_carte` int(10) NOT NULL AUTO_INCREMENT,
  `libelle_type_carte` varchar(255) NOT NULL,
  PRIMARY KEY (`id_type_carte`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `gt_type_carte`
--

INSERT INTO `gt_type_carte` (`id_type_carte`, `libelle_type_carte`) VALUES
(1, 'Visa'),
(2, 'MasterCard'),
(3, 'American Express'),
(4, 'JCB');

-- --------------------------------------------------------

--
-- Structure de la table `gt_user`
--

CREATE TABLE IF NOT EXISTS `gt_user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(100) NOT NULL,
  `prenom_user` varchar(100) NOT NULL,
  `mail_user` varchar(255) NOT NULL,
  `rue_user` varchar(255) NOT NULL,
  `complement_user` varchar(60) NOT NULL,
  `ville_user` varchar(255) NOT NULL,
  `cp_user` varchar(6) NOT NULL,
  `identifiant_user` varchar(50) NOT NULL,
  `mdp_user` varchar(255) NOT NULL,
  `tel_user` varchar(10) NOT NULL,
  `admin_user` int(2) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `identifiant_user` (`identifiant_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `gt_user`
--

INSERT INTO `gt_user` (`id_user`, `nom_user`, `prenom_user`, `mail_user`, `rue_user`, `complement_user`, `ville_user`, `cp_user`, `identifiant_user`, `mdp_user`, `tel_user`, `admin_user`) VALUES
(1, 'Durand', 'Michelle', 'durand.michelle@gmail.com', '3 Avenue du Générale De Gaule', '', 'Villepreux', '78340', 'dudu', 'panda48', '0110101010', 0),
(2, 'O''Brien', 'Dylan', 'obrien.dylan@gmail.com', '45 rue de Versailles', '', 'Muzy', '27650', 'Stiles', 'lydia', '0202020202', 1),
(3, 'Epi', 'Maïs', 'epidemais@gmail.com', '5 boulevard du champ', '', 'CornField', '65000', 'pitiMaïs', 'graine', '0330030303', 0),
(4, 'Flores', 'Elodie', 'flores.elodie@yahoo.com', '12 rue Edmond Rostand', 'test', 'LUCE', '28110', 'Shizawa', 'test', '0670808485', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
