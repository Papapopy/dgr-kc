-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 07 Août 2023 à 16:15
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `espace_membre`
--

-- --------------------------------------------------------

--
-- Structure de la table `article1`
--

CREATE TABLE IF NOT EXISTS `article1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contenu` varchar(3000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_time_publication` datetime NOT NULL,
  `categorie` varchar(255) CHARACTER SET utf8 NOT NULL,
  `resume` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `article1`
--

INSERT INTO `article1` (`id`, `titre`, `contenu`, `date_time_publication`, `categorie`, `resume`) VALUES
(1, 'Le Gouv de KONGO CENTRAL', 'Arrêté depuis le 25 mars dernier pour un détournement présumé des deniers publics, le directeur général de la Direction générale des recettes du Kongo-Central (DGRKC), Richard Mavoka, a été libéré de la prison centrale de Matadi ce jeudi 30 mars 2023.\n', '2023-05-29 20:13:15', 'Actualite', 'Le Directeur Général de la Direction générale des recettes du Kongo-Central (DGRKC), Richard Mavoka.'),
(2, 'Le Directeur de Recouvrement', '&lt;p&gt;En mission depuis le 25 Avril dernier pour une &amp;eacute;valuation pr&amp;eacute;sum&amp;eacute; des deniers publics, le directeur g&amp;eacute;n&amp;eacute;ral de la Direction g&amp;eacute;n&amp;eacute;rale des recettes du Kongo-Central (DGRKC), Richard Mavoka, a &amp;eacute;t&amp;eacute; lib&amp;eacute;r&amp;eacute; de la prison centrale de Matadi ce jeudi 30 mars 2023.&lt;/p&gt;\r\n', '2023-05-30 21:53:36', 'Actualite', 'Arrêté depuis le 25 mars dernier pour un détournement présumé des deniers publics.'),
(3, 'L''étude', '&lt;p&gt;&lt;strong&gt;Bonjour&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;on est &lt;em&gt;mercredi&lt;/em&gt;&lt;/strong&gt;&lt;/p&gt;\r\n', '2023-05-31 16:03:53', 'Communiqué', 'Richard Mavoka, a été libéré de la prison centrale de Matadi ce jeudi 30 mars 2023.'),
(4, 'Election', '&lt;p&gt;Au sein de la R&amp;eacute;gie Provinciale&lt;/p&gt;\r\n\r\n&lt;p&gt;le Service Sociale organise les &amp;eacute;l&amp;eacute;ctions pour le poste de Coach, capitaine etc&lt;/p&gt;\r\n', '2023-07-12 00:20:16', 'Divers', '');

-- --------------------------------------------------------

--
-- Structure de la table `assujeti`
--

CREATE TABLE IF NOT EXISTS `assujeti` (
  `numassu` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `motdepasse` varchar(100) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `commune` varchar(100) NOT NULL,
  `quartier` varchar(100) NOT NULL,
  `avenue` varchar(100) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `nif` varchar(20) NOT NULL,
  `rccm` varchar(20) NOT NULL,
  `repertoir` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `phone2` varchar(15) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`numassu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `assujetti`
--

CREATE TABLE IF NOT EXISTS `assujetti` (
  `NTD` bigint(20) NOT NULL AUTO_INCREMENT,
  `nom_entite` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `nom_nature` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `Nif` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `Rccm` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `Rs_Nom` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `Sigle` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `Num_Avenue` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `quartier_assuj` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `Commune_Assuj` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `Ville_assuj` varchar(100) NOT NULL,
  `Territoire_assuj` varchar(100) NOT NULL,
  `num_telephone1` varchar(20) NOT NULL,
  `num_telephone2` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `numrep` varchar(100) NOT NULL,
  PRIMARY KEY (`NTD`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `assujetti`
--

INSERT INTO `assujetti` (`NTD`, `nom_entite`, `nom_nature`, `Nif`, `Rccm`, `Rs_Nom`, `Sigle`, `Num_Avenue`, `quartier_assuj`, `Commune_Assuj`, `Ville_assuj`, `Territoire_assuj`, `num_telephone1`, `num_telephone2`, `email`, `numrep`) VALUES
(1, 'KASANGULU', 'Morale', '11', '5', 'RAM', 'RA', 'KIS', 'LOM', 'MB', 'MBAZA', 'KI', '08945', '08533', 'mputu.mayelaj@dgr-kc.cd', '22');

-- --------------------------------------------------------

--
-- Structure de la table `chart_data`
--

CREATE TABLE IF NOT EXISTS `chart_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(10) NOT NULL,
  `month` varchar(50) NOT NULL,
  `profit` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `chart_data`
--

INSERT INTO `chart_data` (`id`, `year`, `month`, `profit`) VALUES
(1, '2020', 'Janvier', '4500'),
(2, '2020', 'Fevrier', '5000'),
(3, '2020', 'Mars', '3900'),
(4, '2020', 'Avril', '6500'),
(5, '2021', 'Janvier', '5500'),
(6, '2021', 'Fevrier', '5700');

-- --------------------------------------------------------

--
-- Structure de la table `entite_fiscale`
--

CREATE TABLE IF NOT EXISTS `entite_fiscale` (
  `NumEntite` int(20) NOT NULL,
  `nom_entite` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`NumEntite`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `entite_fiscale`
--

INSERT INTO `entite_fiscale` (`NumEntite`, `nom_entite`) VALUES
(1, 'KASANGULU'),
(2, 'MADIMBA'),
(3, 'MBANZA-NGUNGU'),
(4, 'SONGOLOLO'),
(5, 'MOANDA'),
(6, 'BOMA'),
(7, 'TSHELA'),
(8, 'LUKULA'),
(9, 'SEKE BANZA'),
(10, 'MATADI');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE IF NOT EXISTS `membre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `classe` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id`, `pseudo`, `mail`, `motdepasse`, `avatar`, `classe`) VALUES
(1, 'Dalmathy LUKAU', 'daluk@gmail.com', '123', '', 'Redact'),
(2, 'MPUTU MAYELA', 'mputu.mayelaj@dgr-kc.cd', '123', '2.png', 'Admin'),
(3, 'Christian NKANI', 'orlymbumba@gmail.com', '123', '', 'Autre'),
(5, 'Jpsiane BOKWE', 'jpskoba@gmail.com', '123', '', ''),
(6, 'Grace NZIMBU', 'gaga.nzimbu@dgr-kc.cd', '111', '', ''),
(7, 'Guy LUMANAKIO', 'guy.lumanakio@dgr-kc.cd', '123', '7.jpg', 'Stat'),
(8, 'Gracetutu', 'mputu@dgr-kc.cd', '123', '', ''),
(9, 'RIchard MAVOKA', 'richard.mavoka@dgr-kc.cd', '123', '9.jpg', 'Dg');

-- --------------------------------------------------------

--
-- Structure de la table `month`
--

CREATE TABLE IF NOT EXISTS `month` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `realisation` varchar(70) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `assignation` varchar(20) NOT NULL,
  `mois` varchar(20) NOT NULL,
  `observation` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `month`
--

INSERT INTO `month` (`id`, `realisation`, `assignation`, `mois`, `observation`) VALUES
(1, '800', 'Janvier', 'Jan', ''),
(2, '300', 'Fevrier', 'Fev', ''),
(3, '600', 'Mars', 'Mars', ''),
(4, '400', 'Avril', 'Avril', ''),
(5, '100', 'Mai', 'Mai', ''),
(6, '750', '1000', 'Juillet', ''),
(13, '2000', '1050', '2023-06', 'RAS'),
(14, '855', '855', '2023-09', 'TRES BIEN'),
(15, '2000', '55', '2023-12', 'RRE'),
(16, '2000', '1050', '2023-08', 'gytdfuoilmgoiyvfo_i'),
(17, '7777', '55', '2023-07', 'pour boire');

-- --------------------------------------------------------

--
-- Structure de la table `nature_juridique`
--

CREATE TABLE IF NOT EXISTS `nature_juridique` (
  `NumNJ` int(20) NOT NULL,
  `nom_nature` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`NumNJ`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `nature_juridique`
--

INSERT INTO `nature_juridique` (`NumNJ`, `nom_nature`) VALUES
(1, 'Physique '),
(2, 'Morale');

-- --------------------------------------------------------

--
-- Structure de la table `pdf_file`
--

CREATE TABLE IF NOT EXISTS `pdf_file` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `pdf` varchar(300) CHARACTER SET utf8 NOT NULL,
  `date1` date NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `pdf_file`
--

INSERT INTO `pdf_file` (`id`, `pdf`, `date1`, `description`) VALUES
(1, 'js.pdf', '2023-07-15', 'Premier essaie'),
(3, 'philosophie.pdf', '0000-00-00', ''),
(4, 'philosophie.pdf', '0000-00-00', ''),
(5, 'js.pdf', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Structure de la table `propriete`
--

CREATE TABLE IF NOT EXISTS `propriete` (
  `code_decla` bigint(20) NOT NULL,
  `nature_propriete` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `date_decla` date NOT NULL,
  `adresse_phys` varchar(100) CHARACTER SET utf8 NOT NULL,
  `rang` varchar(25) CHARACTER SET utf8 NOT NULL,
  `superficie` varchar(100) CHARACTER SET utf8 NOT NULL,
  `taux` varchar(25) NOT NULL,
  `montant` varchar(25) NOT NULL,
  PRIMARY KEY (`code_decla`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `propriete`
--

INSERT INTO `propriete` (`code_decla`, `nature_propriete`, `date_decla`, `adresse_phys`, `rang`, `superficie`, `taux`, `montant`) VALUES
(0, 'Villa', '2023-08-06', '', '1er Rang', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `recettesynt`
--

CREATE TABLE IF NOT EXISTS `recettesynt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date1` date NOT NULL,
  `rawbank` varchar(255) NOT NULL,
  `fbnbank` varchar(255) NOT NULL,
  `bgfibank` varchar(255) NOT NULL,
  `accessbank` varchar(255) NOT NULL,
  `ecobank` varchar(255) NOT NULL,
  `sofibanque` varchar(255) CHARACTER SET utf8 NOT NULL,
  `equitybank` varchar(255) CHARACTER SET utf8 NOT NULL,
  `total` varchar(255) NOT NULL,
  `cumul` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `recettesynt`
--

INSERT INTO `recettesynt` (`id`, `date1`, `rawbank`, `fbnbank`, `bgfibank`, `accessbank`, `ecobank`, `sofibanque`, `equitybank`, `total`, `cumul`) VALUES
(1, '2023-06-22', '1000000', '550000', '250400', '700000', '540000', '900000', '50500', '300000 FC', '3000000'),
(7, '2023-06-25', '1000', '500', '740', '32000', '75000', '50000', '120000', '300000 FC', '300000'),
(8, '2023-06-26', '45000', '15000', '5000', '25000', '10000', '5500', '10000', '115500 FC', '115500'),
(9, '2023-07-31', '50', '150', '7100', '630', '788', '301', '7777', '0000', '000');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pp` varchar(255) NOT NULL DEFAULT 'pp.png',
  `nif` varchar(50) NOT NULL,
  `rccm` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `fname`, `username`, `password`, `pp`, `nif`, `rccm`) VALUES
(1, 'POPY', 'MPUTU1', '111', 'pp.png', '', ''),
(2, 'Popy', 'mputu.mayelaj@dgr-kc.cd', '$2y$10$nX8Gs/0loJwkwYi5RM4.0exh/8Bd.wKsvM33XyR9o5K3PuYQkr8xm', 'pp.png', '', ''),
(3, 'Guy LUMANAKIO', 'guy.lumanakio@dgr-kc.cd', '$2y$10$sq5hQy8g0jhYLNrknDgbKe1IeRC7Qmy0CJ2OGIZNs1nKBOv8wfRKu', 'guy.lumanakio@dgr-kc.cd64c3c26362cb07.39423293.jpg', '', ''),
(4, 'Guy LUMANAKIO', 'guy.lumanakio@dgr-kc.cd', '$2y$10$P/v9DgdKj/73lqe..nXlze5aDx03BT53wzzbZv3shz75dIEi0lenC', 'guy.lumanakio@dgr-kc.cd64c3cedb91a0b9.53672926.jpg', '', ''),
(5, 'Barbara LOKA', 'Bloka', '$2y$10$QwtghaQBKdKwfBhRKN8WZe94mJIUvtv9DXJ7Di2ZF9Fpa0pb7nSJ.', 'Bloka64c520de491fc7.01459400.jpg', '', ''),
(6, 'Richard MAVOKA MANKATU', 'richard.mavoka@dgr-kc.cd', '$2y$10$JUE7Mu2GrVn0n4HsvqK60.En53MuZDlpZh1Bzx9bDGDGp0yj6wgeS', 'richard.mavoka@dgr-kc.cd64c52d53e99be8.37570673.jpg', '', ''),
(7, 'Christian NKANI', 'christian.nkani@dgr-kc.cd', '$2y$10$Mh1WriomM0Uqbdy79u48xeJ1yxBWb/TqSHC1G43jsTjSiBV1XPbX6', 'christian.nkani@dgr-kc.cd64c66c9180a034.42065265.png', '224KC2023', ''),
(8, 'Horly NIONGO', 'horly.niongo@dgr-kc.cd', '$2y$10$4mEfwQTq.pZQD/OB4XIftOnVcRBpy8I9c9FTAhs4gHumqeCms7owK', 'horly.niongo@dgr-kc.cd64c7bb6be72ac3.32294787.png', 'xxxx', 'xxxx');

-- --------------------------------------------------------

--
-- Structure de la table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `videos`
--

INSERT INTO `videos` (`id`, `name`) VALUES
(1, 'https://www.youtube.com/watch?v=S7V0-QvYbdo'),
(2, 'https://www.youtube.com/watch?v=8DN5ai3XJPk'),
(3, 'https://www.youtube.com/watch?v=iTRiuFIWV54'),
(4, 'https://www.youtube.com/watch?v=7bA0gTroJjw');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
