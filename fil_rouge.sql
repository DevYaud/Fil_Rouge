-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 24, 2025 at 03:08 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `ACCOMPAGNATEUR`
--

CREATE TABLE `ACCOMPAGNATEUR` (
  `Id_Accompagnateur` smallint(5) UNSIGNED NOT NULL,
  `Id_Specialite` smallint(5) UNSIGNED DEFAULT NULL,
  `Id_personnel` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ACCOMPAGNATEUR`
--

INSERT INTO `ACCOMPAGNATEUR` (`Id_Accompagnateur`, `Id_Specialite`, `Id_personnel`) VALUES
(1, 1, 1),
(2, 2, 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ACTIVITE`
--

INSERT INTO `ACTIVITE` (`Id_activite`, `nom`, `description`, `groupe`, `nb_max`, `Id_Specialite`, `Id_thematique`) VALUES
(1, 'Football', 'Match et entraînement de football', 'Groupe A', 10, 1, 1),
(2, 'Théâtre', 'Atelier dimprovisation', 'Groupe B', 15, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ALLERGENE`
--

CREATE TABLE `ALLERGENE` (
  `Id_allergene` smallint(5) UNSIGNED NOT NULL,
  `Nom` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ANIMATEUR`
--

CREATE TABLE `ANIMATEUR` (
  `Id_Animateur` smallint(5) UNSIGNED NOT NULL,
  `BAFA` enum('aucun','BAFA','BAFD') DEFAULT NULL,
  `Id_personnel` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ANIMATEUR`
--

INSERT INTO `ANIMATEUR` (`Id_Animateur`, `BAFA`, `Id_personnel`) VALUES
(1, 'BAFA', 1),
(2, 'aucun', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Animé_Evenement`
--

CREATE TABLE `Animé_Evenement` (
  `Id_Event` smallint(5) UNSIGNED DEFAULT NULL,
  `Id_Animateur` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `COMPETENCE`
--

CREATE TABLE `COMPETENCE` (
  `Id_Compétence` smallint(5) UNSIGNED NOT NULL,
  `Nom` varchar(20) DEFAULT NULL,
  `Note_niveau` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `COMPETENCE`
--

INSERT INTO `COMPETENCE` (`Id_Compétence`, `Nom`, `Note_niveau`) VALUES
(1, 'Natation', 5),
(2, 'Peinture', 3);

-- --------------------------------------------------------

--
-- Table structure for table `CONTIENT`
--

CREATE TABLE `CONTIENT` (
  `Id_allergene` smallint(5) UNSIGNED DEFAULT NULL,
  `Id_repas` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ENFANT`
--

CREATE TABLE `ENFANT` (
  `Id_enfant` smallint(5) UNSIGNED NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `groupe` varchar(20) DEFAULT NULL,
  `situation_handicap` enum('moteur','moteur grave','psychique','psychique grave') DEFAULT NULL,
  `type_regime` enum('Végétarien','Végan','Sans gluten','Halal','Kasher') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ENFANT`
--

INSERT INTO `ENFANT` (`Id_enfant`, `nom`, `date_naissance`, `groupe`, `situation_handicap`, `type_regime`) VALUES
(1, 'Lucas Dupont', '2015-06-12', 'Groupe A', 'moteur', 'Halal'),
(2, 'Emma Martin', '2016-09-24', 'Groupe B', 'psychique', 'Végétarien'),
(3, 'Lucas Dupont', '2015-06-12', 'Groupe A', 'moteur', 'Halal'),
(4, 'Emma Martin', '2016-09-24', 'Groupe B', 'psychique', 'Végétarien');

-- --------------------------------------------------------

--
-- Table structure for table `ETABLISSEMENT`
--

CREATE TABLE `ETABLISSEMENT` (
  `SIRET` varchar(14) NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `Id_inscription` mediumint(8) UNSIGNED DEFAULT NULL,
  `places_disponibles` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `EVENEMENT`
--

INSERT INTO `EVENEMENT` (`Id_Event`, `commentaire`, `debut`, `fin`, `Id_activite`, `Id_personnel`, `Id_inscription`, `places_disponibles`) VALUES
(1, 'Tournoi de foot', '2024-10-10 10:00:00', '2024-10-10 12:00:00', 1, 1, 1, NULL),
(2, 'Spectacle de théâtre', '2024-10-15 18:00:00', '2024-10-15 20:00:00', 2, 2, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `FACTURE`
--

CREATE TABLE `FACTURE` (
  `Id_facture` smallint(5) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `montant` decimal(6,2) DEFAULT NULL,
  `echeance` date DEFAULT NULL,
  `ID_inscription` mediumint(8) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `FACTURE`
--

INSERT INTO `FACTURE` (`Id_facture`, `date`, `montant`, `echeance`, `ID_inscription`) VALUES
(1, '2024-10-01', 150.75, '2024-10-15', 1),
(2, '2024-10-02', 100.00, '2024-10-16', 2);

-- --------------------------------------------------------

--
-- Table structure for table `INSCRIPTION`
--

CREATE TABLE `INSCRIPTION` (
  `Id_inscription` mediumint(8) UNSIGNED NOT NULL,
  `date_inscription` datetime DEFAULT NULL,
  `presence` tinyint(1) DEFAULT NULL,
  `Id_enfant` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `INSCRIPTION`
--

INSERT INTO `INSCRIPTION` (`Id_inscription`, `date_inscription`, `presence`, `Id_enfant`) VALUES
(1, '2024-09-10 08:30:00', 1, 1),
(2, '2024-09-12 09:00:00', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `PARENTE`
--

CREATE TABLE `PARENTE` (
  `Id_enfant` smallint(5) UNSIGNED DEFAULT NULL,
  `Id_tuteur` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
(3, 'Dupont', 'Marie', '1985-04-21', 3200.50, 1, '12345678901234'),
(4, 'Bernard', 'Luc', '1992-07-15', 2500.00, 0, '12345678901234');

-- --------------------------------------------------------

--
-- Table structure for table `PREFERENCES`
--

CREATE TABLE `PREFERENCES` (
  `Id_activite` smallint(5) UNSIGNED DEFAULT NULL,
  `Id_enfant` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `PREFERENCES`
--

INSERT INTO `PREFERENCES` (`Id_activite`, `Id_enfant`) VALUES
(1, 1),
(2, 2);

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
(1, 'Bonne progression en natation.', 'Très attentif en classe.', '2024-09-20', 1),
(2, 'Difficultés en théâtre.', 'Besoin dencadrement.', '2024-09-21', 2);

-- --------------------------------------------------------

--
-- Table structure for table `REPAS`
--

CREATE TABLE `REPAS` (
  `Id_repas` smallint(5) UNSIGNED NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `entrée` varchar(20) DEFAULT NULL,
  `plat` varchar(20) DEFAULT NULL,
  `dessert` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `ID_inscription` mediumint(8) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `REPAS`
--

INSERT INTO `REPAS` (`Id_repas`, `nom`, `entrée`, `plat`, `dessert`, `date`, `ID_inscription`) VALUES
(1, 'Déjeuner 1', 'Salade', 'Poulet rôti', 'Tarte aux pommes', '2024-09-15', 1),
(2, 'Dîner 1', 'Soupe', 'Poisson grillé', 'Fruit', '2024-09-16', 2);

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

--
-- Dumping data for table `REUNION`
--

INSERT INTO `REUNION` (`Id_reunion`, `date`, `Id_personnel`, `Id_tuteur`) VALUES
(1, '2024-09-30 14:00:00', 1, 1),
(2, '2024-10-05 16:00:00', 2, 2);

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

--
-- Dumping data for table `SATISFACTION`
--

INSERT INTO `SATISFACTION` (`Id_satisfaction`, `sujet`, `note`, `SIRET`) VALUES
(1, 'Qualité des repas', 4, '12345678901234'),
(2, 'Organisation des activités', 5, '12345678901234');

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
(1, 'Sophie Dubois', 'sophie.dubois@example.com', '0601020304', '12 rue des Lilas, Lyon', 'FR7630004000031234567890185'),
(2, 'Jean Lefevre', 'jean.lefevre@example.com', '0605060708', '34 avenue Victor Hugo, Villeurbanne', 'FR7630004000039876543210123'),
(3, 'Sophie Dubois', 'sophie.dubois@example.com', '0601020304', '12 rue des Lilas, Lyon', 'FR7630004000031234567890185'),
(4, 'Jean Lefevre', 'jean.lefevre@example.com', '0605060708', '34 avenue Victor Hugo, Villeurbanne', 'FR7630004000039876543210123');

-- --------------------------------------------------------

--
-- Table structure for table `UTILISATEUR`
--

CREATE TABLE `UTILISATEUR` (
  `Id_utilisateur` smallint(5) UNSIGNED NOT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `mot_de_passe` varchar(64) DEFAULT NULL,
  `Id_connexion` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `UTILISATEUR`
--

INSERT INTO `UTILISATEUR` (`Id_utilisateur`, `mail`, `mot_de_passe`, `Id_connexion`) VALUES
(1, 'parent1@example.com', 'hashedpassword1', 1),
(2, 'animateur1@example.com', 'hashedpassword2', 2);

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
  ADD KEY `ID_inscription` (`ID_inscription`);

--
-- Indexes for table `INSCRIPTION`
--
ALTER TABLE `INSCRIPTION`
  ADD PRIMARY KEY (`Id_inscription`),
  ADD KEY `Id_enfant` (`Id_enfant`);

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
  ADD PRIMARY KEY (`Id_repas`),
  ADD KEY `ID_inscription` (`ID_inscription`);

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
  MODIFY `Id_Accompagnateur` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ACTIVITE`
--
ALTER TABLE `ACTIVITE`
  MODIFY `Id_activite` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ALLERGENE`
--
ALTER TABLE `ALLERGENE`
  MODIFY `Id_allergene` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ANIMATEUR`
--
ALTER TABLE `ANIMATEUR`
  MODIFY `Id_Animateur` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `COMPETENCE`
--
ALTER TABLE `COMPETENCE`
  MODIFY `Id_Compétence` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ENFANT`
--
ALTER TABLE `ENFANT`
  MODIFY `Id_enfant` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `EVENEMENT`
--
ALTER TABLE `EVENEMENT`
  MODIFY `Id_Event` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `FACTURE`
--
ALTER TABLE `FACTURE`
  MODIFY `Id_facture` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `INSCRIPTION`
--
ALTER TABLE `INSCRIPTION`
  MODIFY `Id_inscription` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `PERSONNEL`
--
ALTER TABLE `PERSONNEL`
  MODIFY `Id_personnel` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `RAPPORT`
--
ALTER TABLE `RAPPORT`
  MODIFY `Id_rapport` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `REPAS`
--
ALTER TABLE `REPAS`
  MODIFY `Id_repas` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `REUNION`
--
ALTER TABLE `REUNION`
  MODIFY `Id_reunion` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `SATISFACTION`
--
ALTER TABLE `SATISFACTION`
  MODIFY `Id_satisfaction` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `Id_utilisateur` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `FACTURE_ibfk_1` FOREIGN KEY (`ID_inscription`) REFERENCES `INSCRIPTION` (`Id_inscription`);

--
-- Constraints for table `INSCRIPTION`
--
ALTER TABLE `INSCRIPTION`
  ADD CONSTRAINT `INSCRIPTION_ibfk_1` FOREIGN KEY (`Id_enfant`) REFERENCES `ENFANT` (`Id_enfant`);

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
-- Constraints for table `REPAS`
--
ALTER TABLE `REPAS`
  ADD CONSTRAINT `REPAS_ibfk_1` FOREIGN KEY (`ID_inscription`) REFERENCES `INSCRIPTION` (`Id_inscription`);

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
  ADD CONSTRAINT `UTILISATEUR_ibfk_1` FOREIGN KEY (`Id_connexion`) REFERENCES `TUTEUR` (`Id_tuteur`),
  ADD CONSTRAINT `UTILISATEUR_ibfk_2` FOREIGN KEY (`Id_connexion`) REFERENCES `PERSONNEL` (`Id_personnel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
