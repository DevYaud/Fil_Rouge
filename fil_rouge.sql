- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 27, 2025 at 11:42 AM
-- Server version: 10.6.21-MariaDB
-- PHP Version: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sc1zuna1689_fil_rouge`
--
CREATE DATABASE IF NOT EXISTS `sc1zuna1689_fil_rouge` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci;
USE `sc1zuna1689_fil_rouge`;

-- --------------------------------------------------------

--
-- Table structure for table `ACCOMPAGNATEUR`
--

CREATE TABLE `ACCOMPAGNATEUR` (
  `Id_Accompagnateur` smallint(5) UNSIGNED NOT NULL,
  `Id_Specialite` smallint(5) UNSIGNED DEFAULT NULL,
  `Id_personnel` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ACTIVITE`
--

CREATE TABLE `ACTIVITE` (
  `Id_activite` smallint(5) UNSIGNED NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `groupe` varchar(20) DEFAULT NULL,
  `nb_max` tinyint(4) DEFAULT NULL,
  `Id_Specialite` smallint(5) UNSIGNED DEFAULT NULL,
  `Id_thematique` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `ACTIVITE`
--

INSERT INTO `ACTIVITE` (`Id_activite`, `nom`, `description`, `groupe`, `nb_max`, `Id_Specialite`, `Id_thematique`) VALUES
(1, 'Football', 'Match et entrainement de football', 'Groupe A', 10, NULL, NULL),
(2, 'Théâtre', 'Atelier d improvisation', 'Groupe B', 15, NULL, NULL),
(3, 'Jeux societe', ' Jeux ludiques pour enfants', 'Groupe C', 8, NULL, NULL),
(4, 'Football petits', 'Football adapte aux plus petits', 'Groupe C', 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ALLERGENE`
--

CREATE TABLE `ALLERGENE` (
  `Id_allergene` smallint(5) UNSIGNED NOT NULL,
  `Nom` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ANIMATEUR`
--

CREATE TABLE `ANIMATEUR` (
  `Id_Animateur` smallint(5) UNSIGNED NOT NULL,
  `BAFA` enum('aucun','BAFA','BAFD') DEFAULT NULL,
  `Id_personnel` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `ANIMATEUR`
--

INSERT INTO `ANIMATEUR` (`Id_Animateur`, `BAFA`, `Id_personnel`) VALUES
(3, 'BAFA', 1),
(4, 'aucun', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Animé_Evenement`
--

CREATE TABLE `Animé_Evenement` (
  `Id_Event` smallint(5) UNSIGNED DEFAULT NULL,
  `Id_Animateur` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `COMPETENCE`
--

CREATE TABLE `COMPETENCE` (
  `Id_Compétence` smallint(5) UNSIGNED NOT NULL,
  `Nom` varchar(20) DEFAULT NULL,
  `Note_niveau` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `COMPETENCE`
--

INSERT INTO `COMPETENCE` (`Id_Compétence`, `Nom`, `Note_niveau`) VALUES
(1, 'Natation', 5),
(2, 'Peinture', 3);

-- --------------------------------------------------------

--
-- Table structure for table `COMPTE_ADMIN`
--

CREATE TABLE `COMPTE_ADMIN` (
  `Id_admin` smallint(5) UNSIGNED NOT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `mot_de_passe` varchar(64) DEFAULT NULL,
  `Id_connexion` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `COMPTE_ADMIN`
--

INSERT INTO `COMPTE_ADMIN` (`Id_admin`, `mail`, `mot_de_passe`, `Id_connexion`) VALUES
(3, 'animateur1@example.com', 'hashedpassword2', 3),
(4, 'animateur2@email.fr', 'lemotdepass', 4);

-- --------------------------------------------------------

--
-- Table structure for table `CONTIENT`
--

CREATE TABLE `CONTIENT` (
  `Id_allergene` smallint(5) UNSIGNED DEFAULT NULL,
  `Id_repas` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ENFANT`
--

CREATE TABLE `ENFANT` (
  `Id_enfant` smallint(5) UNSIGNED NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `groupe` varchar(20) DEFAULT NULL,
  `situation_handicap` enum('moteur','moteur grave','psychique','psychique grave','aucun') DEFAULT NULL,
  `type_regime` enum('Vegetarien','Vegan','Sans gluten','Halal','Kasher','aucun') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `ENFANT`
--

INSERT INTO `ENFANT` (`Id_enfant`, `nom`, `date_naissance`, `groupe`, `situation_handicap`, `type_regime`) VALUES
(1, 'Lucas Dupont', '2015-06-12', 'Groupe A', 'moteur', 'Halal'),
(2, 'Emma Martin', '2016-09-24', 'Groupe B', 'psychique', 'Vegetarien'),
(3, 'Thomas Martin', '2016-09-24', 'Groupe B', 'aucun', 'aucun'),
(4, 'Marie Dupont', '2018-09-02', 'Groupe A', 'aucun', 'aucun'),
(5, 'Julius Montana', '2021-06-01', 'Groupe C', 'aucun', 'Sans gluten'),
(6, 'Sofiane Montana', '2020-02-01', 'Groupe C', 'aucun', 'Sans gluten');

-- --------------------------------------------------------

--
-- Table structure for table `ETABLISSEMENT`
--

CREATE TABLE `ETABLISSEMENT` (
  `SIRET` varchar(14) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nom` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `adresse` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `EVENEMENT`
--

CREATE TABLE `EVENEMENT` (
  `Id_Event` smallint(5) UNSIGNED NOT NULL,
  `commentaire` varchar(255) DEFAULT NULL,
  `debut` datetime DEFAULT NULL,
  `fin` datetime DEFAULT NULL,
  `Id_activite` smallint(5) UNSIGNED DEFAULT NULL,
  `Id_personnel` smallint(5) UNSIGNED DEFAULT NULL,
  `Id_inscription` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `EVENEMENT`
--

INSERT INTO `EVENEMENT` (`Id_Event`, `commentaire`, `debut`, `fin`, `Id_activite`, `Id_personnel`, `Id_inscription`) VALUES
(1, 'Superbe match de football ce samedi', '2025-03-29 16:00:00', '2025-03-29 18:00:00', 1, 3, NULL),
(2, 'Vieux football', '2025-03-06 10:00:00', '2025-03-06 00:00:00', 1, 4, NULL),
(3, 'Football ce midi', '2025-03-27 00:00:00', '2025-03-27 14:00:00', 1, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `FACTURE`
--

CREATE TABLE `FACTURE` (
  `Id_facture` smallint(5) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `montant` decimal(6,2) DEFAULT NULL,
  `echeance` date DEFAULT NULL,
  `est_paye` tinyint(1) DEFAULT NULL,
  `ID_tuteur` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `FACTURE`
--

INSERT INTO `FACTURE` (`Id_facture`, `date`, `montant`, `echeance`, `est_paye`, `ID_tuteur`) VALUES
(1, '2024-03-08', 25.00, '2024-05-01', 1, 1),
(2, '2024-03-10', 25.00, '2024-05-01', 1, 1),
(3, '2024-04-08', 25.00, '2024-06-01', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `INSCRIPTION`
--

CREATE TABLE `INSCRIPTION` (
  `Id_inscription` mediumint(8) UNSIGNED NOT NULL,
  `date_inscription` datetime DEFAULT NULL,
  `presence` tinyint(1) DEFAULT NULL,
  `Id_enfant` smallint(5) UNSIGNED DEFAULT NULL,
  `Id_repas` smallint(5) UNSIGNED DEFAULT NULL,
  `Id_Event` smallint(5) UNSIGNED DEFAULT NULL,
  `Id_facture` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `PARENTE`
--

CREATE TABLE `PARENTE` (
  `Id_enfant` smallint(5) UNSIGNED DEFAULT NULL,
  `Id_tuteur` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `PARENTE`
--

INSERT INTO `PARENTE` (`Id_enfant`, `Id_tuteur`) VALUES
(2, 2),
(2, 3),
(3, 2),
(3, 3),
(5, 4),
(6, 4),
(1, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `PARTICIPE`
--

CREATE TABLE `PARTICIPE` (
  `Id_Event` smallint(5) UNSIGNED DEFAULT NULL,
  `Id_personnel` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `PATHO`
--

CREATE TABLE `PATHO` (
  `Id_allergene` smallint(5) UNSIGNED DEFAULT NULL,
  `Id_enfant` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `PERSONNEL`
--

CREATE TABLE `PERSONNEL` (
  `Id_personnel` smallint(5) UNSIGNED NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `salaire` decimal(7,2) DEFAULT NULL,
  `est_directeur` tinyint(1) DEFAULT NULL,
  `SIRET` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `PERSONNEL`
--

INSERT INTO `PERSONNEL` (`Id_personnel`, `nom`, `prenom`, `date_naissance`, `salaire`, `est_directeur`, `SIRET`) VALUES
(3, 'Marc', 'Berg', '1985-04-21', 3200.50, 1, NULL),
(4, 'Bernard', 'Luc', '1992-07-15', 2500.00, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `PREFERENCES`
--

CREATE TABLE `PREFERENCES` (
  `Id_activite` smallint(5) UNSIGNED DEFAULT NULL,
  `Id_enfant` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `PROGRESSION`
--

CREATE TABLE `PROGRESSION` (
  `Id_enfant` smallint(5) UNSIGNED DEFAULT NULL,
  `Id_Compétence` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `RAPPORT`
--

CREATE TABLE `RAPPORT` (
  `Id_rapport` smallint(5) UNSIGNED NOT NULL,
  `Commentaire` varchar(255) DEFAULT NULL,
  `info_Comportement` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `Id_enfant` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `RAPPORT`
--

INSERT INTO `RAPPORT` (`Id_rapport`, `Commentaire`, `info_Comportement`, `date`, `Id_enfant`) VALUES
(1, 'Tout le monde a bien suivi le cours', 'Eleve trÃ¨s turbulent. Il m\'a fortement dÃ©plu', '2025-03-26', 1),
(2, 'TrÃ¨s bon cours', 'Je me suis trompÃ© c\'est une crÃ¨me', '2025-03-26', 1),
(3, 'Rapport Test ', 'Une vrai frippouille', '2025-03-26', 1),
(4, 'Une creme', 'Je retire ce que je vient de dire', '2025-03-27', 1),
(5, 'Tres gentil', 'Extremement gentil', '2025-03-27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `REPAS`
--

CREATE TABLE `REPAS` (
  `Id_repas` smallint(5) UNSIGNED NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `entree` varchar(20) DEFAULT NULL,
  `plat` varchar(20) DEFAULT NULL,
  `dessert` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `REPAS`
--

INSERT INTO `REPAS` (`Id_repas`, `nom`, `entree`, `plat`, `dessert`, `date`) VALUES
(1, 'Dejeuner 1', NULL, 'Superbe plat', 'Dessert moyen', '0000-00-00'),
(2, 'Samedi Gras', 'Superbe entre super ', 'Superbe plat', 'Arizona', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `REUNION`
--

CREATE TABLE `REUNION` (
  `Id_reunion` smallint(5) UNSIGNED NOT NULL,
  `date` datetime DEFAULT NULL,
  `Id_personnel` smallint(5) UNSIGNED DEFAULT NULL,
  `Id_tuteur` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `SATISFACTION`
--

CREATE TABLE `SATISFACTION` (
  `Id_satisfaction` smallint(5) UNSIGNED NOT NULL,
  `sujet` varchar(50) DEFAULT NULL,
  `note` tinyint(3) UNSIGNED DEFAULT NULL,
  `SIRET` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `SPECIALITE`
--

CREATE TABLE `SPECIALITE` (
  `Id_Specialite` smallint(5) UNSIGNED NOT NULL,
  `Nom` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `THEMATIQUE`
--

CREATE TABLE `THEMATIQUE` (
  `Id_thematique` smallint(5) UNSIGNED NOT NULL,
  `Nom` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `TUTEUR`
--

CREATE TABLE `TUTEUR` (
  `Id_tuteur` smallint(5) UNSIGNED NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `IBAN` varchar(34) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `TUTEUR`
--

INSERT INTO `TUTEUR` (`Id_tuteur`, `nom`, `email`, `telephone`, `adresse`, `IBAN`) VALUES
(1, 'Sophie Dupont', 'sophie.dupont@example.com', '0601020304', '12 rue des Lilas, Lyon', 'FR7630004000031234567890185'),
(2, 'Jean Martin', 'jean.martin@example.com', '0605060708', '34 avenue Victor Hugo, Villeurbanne', 'FR7630004000039876543210123'),
(3, 'Pascale Martin', 'p.martin@example.com', '0635960708', '34 avenue Victor Hugo, Villeurbanne', 'FR7630004000039876543210123'),
(4, 'Antoine Montana', 'ant.montana@mail.com', '0788138809', '1 rue de la Paix, Paris', 'FR7630004000099876547310123');

-- --------------------------------------------------------

--
-- Table structure for table `UTILISATEUR`
--

CREATE TABLE `UTILISATEUR` (
  `Id_utilisateur` smallint(5) UNSIGNED NOT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `mot_de_passe` varchar(64) DEFAULT NULL,
  `Id_connexion` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `UTILISATEUR`
--

INSERT INTO `UTILISATEUR` (`Id_utilisateur`, `mail`, `mot_de_passe`, `Id_connexion`) VALUES
(1, 'sophie.dupont@example.com', 'hashedpassword1', 1),
(2, 'jean.martin@example.com', 'hashedpassword23', 2),
(3, 'ant.montana@mail.com', 'hashedpword23', 4),
(4, 'p.martin@example.com', 'hashedpw', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ACCOMPAGNATEUR`
--
ALTER TABLE `ACCOMPAGNATEUR`
  ADD PRIMARY KEY (`Id_Accompagnateur`),
  ADD KEY `Id_Specialite` (`Id_Specialite`),
  ADD KEY `Id_personnel` (`Id_personnel`);

--
-- Indexes for table `ACTIVITE`
--
ALTER TABLE `ACTIVITE`
  ADD PRIMARY KEY (`Id_activite`),
  ADD KEY `Id_Specialite` (`Id_Specialite`),
  ADD KEY `Id_thematique` (`Id_thematique`);

--
-- Indexes for table `ALLERGENE`
--
ALTER TABLE `ALLERGENE`
  ADD PRIMARY KEY (`Id_allergene`);

--
-- Indexes for table `ANIMATEUR`
--
ALTER TABLE `ANIMATEUR`
  ADD PRIMARY KEY (`Id_Animateur`),
  ADD KEY `Id_personnel` (`Id_personnel`);

--
-- Indexes for table `Animé_Evenement`
--
ALTER TABLE `Animé_Evenement`
  ADD KEY `Id_Event` (`Id_Event`),
  ADD KEY `Id_Animateur` (`Id_Animateur`);

--
-- Indexes for table `COMPETENCE`
--
ALTER TABLE `COMPETENCE`
  ADD PRIMARY KEY (`Id_Compétence`);

--
-- Indexes for table `COMPTE_ADMIN`
--
ALTER TABLE `COMPTE_ADMIN`
  ADD PRIMARY KEY (`Id_admin`),
  ADD KEY `Id_connexion` (`Id_connexion`);

--
-- Indexes for table `CONTIENT`
--
ALTER TABLE `CONTIENT`
  ADD KEY `Id_allergene` (`Id_allergene`),
  ADD KEY `Id_repas` (`Id_repas`);

--
-- Indexes for table `ENFANT`
--
ALTER TABLE `ENFANT`
  ADD PRIMARY KEY (`Id_enfant`);

--
-- Indexes for table `ETABLISSEMENT`
--
ALTER TABLE `ETABLISSEMENT`
  ADD PRIMARY KEY (`SIRET`);

--
-- Indexes for table `EVENEMENT`
--
ALTER TABLE `EVENEMENT`
  ADD PRIMARY KEY (`Id_Event`),
  ADD KEY `Id_activite` (`Id_activite`),
  ADD KEY `Id_personnel` (`Id_personnel`),
  ADD KEY `Id_inscription` (`Id_inscription`);

--
-- Indexes for table `FACTURE`
--
ALTER TABLE `FACTURE`
  ADD PRIMARY KEY (`Id_facture`),
  ADD KEY `ID_tuteur` (`ID_tuteur`);

--
-- Indexes for table `INSCRIPTION`
--
ALTER TABLE `INSCRIPTION`
  ADD PRIMARY KEY (`Id_inscription`),
  ADD KEY `Id_enfant` (`Id_enfant`),
  ADD KEY `Id_repas` (`Id_repas`),
  ADD KEY `Id_Event` (`Id_Event`),
  ADD KEY `Id_facture` (`Id_facture`);

--
-- Indexes for table `PARENTE`
--
ALTER TABLE `PARENTE`
  ADD KEY `Id_enfant` (`Id_enfant`),
  ADD KEY `Id_tuteur` (`Id_tuteur`);

--
-- Indexes for table `PARTICIPE`
--
ALTER TABLE `PARTICIPE`
  ADD KEY `Id_Event` (`Id_Event`),
  ADD KEY `Id_personnel` (`Id_personnel`);

--
-- Indexes for table `PATHO`
--
ALTER TABLE `PATHO`
  ADD KEY `Id_allergene` (`Id_allergene`),
  ADD KEY `Id_enfant` (`Id_enfant`);

--
-- Indexes for table `PERSONNEL`
--
ALTER TABLE `PERSONNEL`
  ADD PRIMARY KEY (`Id_personnel`),
  ADD KEY `SIRET` (`SIRET`);

--
-- Indexes for table `PREFERENCES`
--
ALTER TABLE `PREFERENCES`
  ADD KEY `Id_activite` (`Id_activite`),
  ADD KEY `Id_enfant` (`Id_enfant`);

--
-- Indexes for table `PROGRESSION`
--
ALTER TABLE `PROGRESSION`
  ADD KEY `Id_enfant` (`Id_enfant`),
  ADD KEY `Id_Compétence` (`Id_Compétence`);

--
-- Indexes for table `RAPPORT`
--
ALTER TABLE `RAPPORT`
  ADD PRIMARY KEY (`Id_rapport`),
  ADD KEY `Id_enfant` (`Id_enfant`);

--
-- Indexes for table `REPAS`
--
ALTER TABLE `REPAS`
  ADD PRIMARY KEY (`Id_repas`);

--
-- Indexes for table `REUNION`
--
ALTER TABLE `REUNION`
  ADD PRIMARY KEY (`Id_reunion`),
  ADD KEY `Id_personnel` (`Id_personnel`),
  ADD KEY `Id_tuteur` (`Id_tuteur`);

--
-- Indexes for table `SATISFACTION`
--
ALTER TABLE `SATISFACTION`
  ADD PRIMARY KEY (`Id_satisfaction`),
  ADD KEY `SIRET` (`SIRET`);

--
-- Indexes for table `SPECIALITE`
--
ALTER TABLE `SPECIALITE`
  ADD PRIMARY KEY (`Id_Specialite`);

--
-- Indexes for table `THEMATIQUE`
--
ALTER TABLE `THEMATIQUE`
  ADD PRIMARY KEY (`Id_thematique`);

--
-- Indexes for table `TUTEUR`
--
ALTER TABLE `TUTEUR`
  ADD PRIMARY KEY (`Id_tuteur`);

--
-- Indexes for table `UTILISATEUR`
--
ALTER TABLE `UTILISATEUR`
  ADD PRIMARY KEY (`Id_utilisateur`),
  ADD KEY `Id_connexion` (`Id_connexion`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ACCOMPAGNATEUR`
--
ALTER TABLE `ACCOMPAGNATEUR`
  MODIFY `Id_Accompagnateur` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ACTIVITE`
--
ALTER TABLE `ACTIVITE`
  MODIFY `Id_activite` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ALLERGENE`
--
ALTER TABLE `ALLERGENE`
  MODIFY `Id_allergene` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ANIMATEUR`
--
ALTER TABLE `ANIMATEUR`
  MODIFY `Id_Animateur` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `COMPETENCE`
--
ALTER TABLE `COMPETENCE`
  MODIFY `Id_Compétence` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `COMPTE_ADMIN`
--
ALTER TABLE `COMPTE_ADMIN`
  MODIFY `Id_admin` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ENFANT`
--
ALTER TABLE `ENFANT`
  MODIFY `Id_enfant` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `EVENEMENT`
--
ALTER TABLE `EVENEMENT`
  MODIFY `Id_Event` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `FACTURE`
--
ALTER TABLE `FACTURE`
  MODIFY `Id_facture` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `INSCRIPTION`
--
ALTER TABLE `INSCRIPTION`
  MODIFY `Id_inscription` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `PERSONNEL`
--
ALTER TABLE `PERSONNEL`
  MODIFY `Id_personnel` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `RAPPORT`
--
ALTER TABLE `RAPPORT`
  MODIFY `Id_rapport` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `REPAS`
--
ALTER TABLE `REPAS`
  MODIFY `Id_repas` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `REUNION`
--
ALTER TABLE `REUNION`
  MODIFY `Id_reunion` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `SATISFACTION`
--
ALTER TABLE `SATISFACTION`
  MODIFY `Id_satisfaction` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `SPECIALITE`
--
ALTER TABLE `SPECIALITE`
  MODIFY `Id_Specialite` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `THEMATIQUE`
--
ALTER TABLE `THEMATIQUE`
  MODIFY `Id_thematique` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `TUTEUR`
--
ALTER TABLE `TUTEUR`
  MODIFY `Id_tuteur` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `UTILISATEUR`
--
ALTER TABLE `UTILISATEUR`
  MODIFY `Id_utilisateur` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ACCOMPAGNATEUR`
--
ALTER TABLE `ACCOMPAGNATEUR`
  ADD CONSTRAINT `ACCOMPAGNATEUR_ibfk_1` FOREIGN KEY (`Id_Specialite`) REFERENCES `SPECIALITE` (`Id_Specialite`),
  ADD CONSTRAINT `ACCOMPAGNATEUR_ibfk_2` FOREIGN KEY (`Id_personnel`) REFERENCES `PERSONNEL` (`Id_personnel`);

--
-- Constraints for table `ACTIVITE`
--
ALTER TABLE `ACTIVITE`
  ADD CONSTRAINT `ACTIVITE_ibfk_1` FOREIGN KEY (`Id_Specialite`) REFERENCES `SPECIALITE` (`Id_Specialite`),
  ADD CONSTRAINT `ACTIVITE_ibfk_2` FOREIGN KEY (`Id_thematique`) REFERENCES `THEMATIQUE` (`Id_thematique`);

--
-- Constraints for table `ANIMATEUR`
--
ALTER TABLE `ANIMATEUR`
  ADD CONSTRAINT `ANIMATEUR_ibfk_1` FOREIGN KEY (`Id_personnel`) REFERENCES `PERSONNEL` (`Id_personnel`);

--
-- Constraints for table `Animé_Evenement`
--
ALTER TABLE `Animé_Evenement`
  ADD CONSTRAINT `Animé_Evenement_ibfk_1` FOREIGN KEY (`Id_Event`) REFERENCES `EVENEMENT` (`Id_Event`),
  ADD CONSTRAINT `Animé_Evenement_ibfk_2` FOREIGN KEY (`Id_Animateur`) REFERENCES `ANIMATEUR` (`Id_Animateur`);

--
-- Constraints for table `COMPTE_ADMIN`
--
ALTER TABLE `COMPTE_ADMIN`
  ADD CONSTRAINT `COMPTE_ADMIN_ibfk_1` FOREIGN KEY (`Id_connexion`) REFERENCES `PERSONNEL` (`Id_personnel`);

--
-- Constraints for table `CONTIENT`
--
ALTER TABLE `CONTIENT`
  ADD CONSTRAINT `CONTIENT_ibfk_1` FOREIGN KEY (`Id_allergene`) REFERENCES `ALLERGENE` (`Id_allergene`),
  ADD CONSTRAINT `CONTIENT_ibfk_2` FOREIGN KEY (`Id_repas`) REFERENCES `REPAS` (`Id_repas`);

--
-- Constraints for table `EVENEMENT`
--
ALTER TABLE `EVENEMENT`
  ADD CONSTRAINT `EVENEMENT_ibfk_1` FOREIGN KEY (`Id_activite`) REFERENCES `ACTIVITE` (`Id_activite`),
  ADD CONSTRAINT `EVENEMENT_ibfk_2` FOREIGN KEY (`Id_personnel`) REFERENCES `PERSONNEL` (`Id_personnel`),
  ADD CONSTRAINT `EVENEMENT_ibfk_3` FOREIGN KEY (`Id_inscription`) REFERENCES `INSCRIPTION` (`Id_inscription`);

--
-- Constraints for table `FACTURE`
--
ALTER TABLE `FACTURE`
  ADD CONSTRAINT `FACTURE_ibfk_1` FOREIGN KEY (`ID_tuteur`) REFERENCES `TUTEUR` (`Id_tuteur`);

--
-- Constraints for table `INSCRIPTION`
--
ALTER TABLE `INSCRIPTION`
  ADD CONSTRAINT `INSCRIPTION_ibfk_1` FOREIGN KEY (`Id_enfant`) REFERENCES `ENFANT` (`Id_enfant`),
  ADD CONSTRAINT `INSCRIPTION_ibfk_2` FOREIGN KEY (`Id_repas`) REFERENCES `REPAS` (`Id_repas`),
  ADD CONSTRAINT `INSCRIPTION_ibfk_3` FOREIGN KEY (`Id_Event`) REFERENCES `EVENEMENT` (`Id_Event`),
  ADD CONSTRAINT `INSCRIPTION_ibfk_4` FOREIGN KEY (`Id_facture`) REFERENCES `FACTURE` (`Id_facture`);

--
-- Constraints for table `PARENTE`
--
ALTER TABLE `PARENTE`
  ADD CONSTRAINT `PARENTE_ibfk_1` FOREIGN KEY (`Id_enfant`) REFERENCES `ENFANT` (`Id_enfant`),
  ADD CONSTRAINT `PARENTE_ibfk_2` FOREIGN KEY (`Id_tuteur`) REFERENCES `TUTEUR` (`Id_tuteur`);

--
-- Constraints for table `PARTICIPE`
--
ALTER TABLE `PARTICIPE`
  ADD CONSTRAINT `PARTICIPE_ibfk_1` FOREIGN KEY (`Id_Event`) REFERENCES `EVENEMENT` (`Id_Event`),
  ADD CONSTRAINT `PARTICIPE_ibfk_2` FOREIGN KEY (`Id_personnel`) REFERENCES `PERSONNEL` (`Id_personnel`);

--
-- Constraints for table `PATHO`
--
ALTER TABLE `PATHO`
  ADD CONSTRAINT `PATHO_ibfk_1` FOREIGN KEY (`Id_allergene`) REFERENCES `ALLERGENE` (`Id_allergene`),
  ADD CONSTRAINT `PATHO_ibfk_2` FOREIGN KEY (`Id_enfant`) REFERENCES `ENFANT` (`Id_enfant`);

--
-- Constraints for table `PERSONNEL`
--
ALTER TABLE `PERSONNEL`
  ADD CONSTRAINT `PERSONNEL_ibfk_1` FOREIGN KEY (`SIRET`) REFERENCES `ETABLISSEMENT` (`SIRET`);

--
-- Constraints for table `PREFERENCES`
--
ALTER TABLE `PREFERENCES`
  ADD CONSTRAINT `PREFERENCES_ibfk_1` FOREIGN KEY (`Id_activite`) REFERENCES `ACTIVITE` (`Id_activite`),
  ADD CONSTRAINT `PREFERENCES_ibfk_2` FOREIGN KEY (`Id_enfant`) REFERENCES `ENFANT` (`Id_enfant`);

--
-- Constraints for table `PROGRESSION`
--
ALTER TABLE `PROGRESSION`
  ADD CONSTRAINT `PROGRESSION_ibfk_1` FOREIGN KEY (`Id_enfant`) REFERENCES `ENFANT` (`Id_enfant`),
  ADD CONSTRAINT `PROGRESSION_ibfk_2` FOREIGN KEY (`Id_Compétence`) REFERENCES `COMPETENCE` (`Id_Compétence`);

--
-- Constraints for table `RAPPORT`
--
ALTER TABLE `RAPPORT`
  ADD CONSTRAINT `RAPPORT_ibfk_1` FOREIGN KEY (`Id_enfant`) REFERENCES `ENFANT` (`Id_enfant`);

--
-- Constraints for table `REUNION`
--
ALTER TABLE `REUNION`
  ADD CONSTRAINT `REUNION_ibfk_1` FOREIGN KEY (`Id_personnel`) REFERENCES `PERSONNEL` (`Id_personnel`),
  ADD CONSTRAINT `REUNION_ibfk_2` FOREIGN KEY (`Id_tuteur`) REFERENCES `TUTEUR` (`Id_tuteur`);

--
-- Constraints for table `SATISFACTION`
--
ALTER TABLE `SATISFACTION`
  ADD CONSTRAINT `SATISFACTION_ibfk_1` FOREIGN KEY (`SIRET`) REFERENCES `ETABLISSEMENT` (`SIRET`);

--
-- Constraints for table `UTILISATEUR`
--
ALTER TABLE `UTILISATEUR`
  ADD CONSTRAINT `UTILISATEUR_ibfk_1` FOREIGN KEY (`Id_connexion`) REFERENCES `TUTEUR` (`Id_tuteur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
