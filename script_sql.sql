-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 14, 2020 at 12:18 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `openbook`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `autoInc` () RETURNS INT(10) BEGIN
        DECLARE getCount INT(11);

        SET getCount = (
            SELECT COUNT(Id_livre)
            FROM projet) + 1;

        RETURN getCount;
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `candidater`
--

CREATE TABLE `candidater` (
  `Statut` text NOT NULL COMMENT 'en cours, valide, refus',
  `Id_utilisateur` int(255) NOT NULL,
  `Id_projet` int(255) NOT NULL,
  `Id_personnage` int(255) NOT NULL,
  `Id_candidature` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidater`
--

INSERT INTO `candidater` (`Statut`, `Id_utilisateur`, `Id_projet`, `Id_personnage`, `Id_candidature`) VALUES
('en cours', 10, 1, 1, 2),
('en cours', 10, 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `commenter`
--

CREATE TABLE `commenter` (
  `Id_utilisateur` int(11) NOT NULL,
  `Id_livre` int(11) NOT NULL,
  `Date_comment` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lire`
--

CREATE TABLE `lire` (
  `Id_utilisateur` int(11) NOT NULL,
  `Id_livre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Table structure for table `livre`
--

CREATE TABLE `livre` (
  `Id_livre` int(11) NOT NULL,
  `Date_P` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `Nb_pages` int(11) DEFAULT NULL,
  `Titre` varchar(50) DEFAULT NULL,
  `Genre` varchar(20) DEFAULT NULL,
  `Resume` text,
  `Contenu` text,
  `Id_projet` int(11) NOT NULL,
  `etat` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `livre`
--

INSERT INTO `livre` (`Id_livre`, `Date_P`, `image`, `Nb_pages`, `Titre`, `Genre`, `Resume`, `Contenu`, `Id_projet`, `etat`) VALUES
(1, NULL, NULL, NULL, 'Histoire de ma vie', 'Romance', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, 1, 'Terminer');

-- --------------------------------------------------------

--
-- Table structure for table `participer`
--

CREATE TABLE `participer` (
  `Id_utilisateur` int(255) NOT NULL,
  `Id_projet` int(255) NOT NULL,
  `Id_personnage` int(255) NOT NULL,
  `Id_participer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personnages`
--

CREATE TABLE `personnages` (
  `Id_personnages` int(255) NOT NULL,
  `Nom_P` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `Description_P` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `id_projet_personnage` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `personnages`
--

INSERT INTO `personnages` (`Id_personnages`, `Nom_P`, `Description_P`, `id_projet_personnage`) VALUES
(1, 'Paul Eric', 'Etudiant', 1),
(2, 'Joanna ', 'Etudiante', 1),
(3, 'Alexandre', 'Voyageur aimant l\'aventure', 2),
(4, 'Damas', 'Ecrivain aimant le spectacle', 2),
(5, 'Meo', 'Le dormeur', 3),
(6, 'Rio', 'Le danseur', 3);

-- --------------------------------------------------------

--
-- Table structure for table `projet`
--

CREATE TABLE `projet` (
  `Id_projet` int(255) NOT NULL,
  `Langue` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `Resume` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `Genre` varchar(20) COLLATE utf8_general_mysql500_ci NOT NULL,
  `Date_limite_cand` date NOT NULL,
  `auteur` int(255) NOT NULL,
  `Titre` varchar(100) COLLATE utf8_general_mysql500_ci NOT NULL,
  `Contenu` text COLLATE utf8_general_mysql500_ci,
  `etat` text COLLATE utf8_general_mysql500_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `projet`
--

INSERT INTO `projet` (`Id_projet`, `Langue`, `Resume`, `Genre`, `Date_limite_cand`, `auteur`, `Titre`, `Contenu`, `etat`) VALUES
(1, 'Français', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Romance', '2020-12-15', 13, 'Histoire de ma vie', '                                                                          Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.      \r\n\r\nLe lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.          \r\n\r\nLe lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.   \r\nLe lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.                                     ', 'Terminer'),
(2, 'Français', 'Un voyage est un déplacement dans l\'espace, contraint, effectué vers un point plus ou moins éloigné dans un but personnel (par exemple tourisme) ou professionnel (affaires) ou autre (guerre, réfugiés politiques ou climatiques), déplacements motivés par des activités sportives ou socio-culturelles ou de grands événements. ', 'Aventure', '2020-12-16', 10, 'Le voyage', NULL, 'en cours'),
(3, 'Chinois', 'Raconte l\'histoire d\'une longue nuit de veille', 'Poésie', '2020-12-19', 10, 'La nuit', '                                                                    L\'histoire commence dans les années 60            \r\n\r\nAlors que le nombre de zones inaccessibles, non cartographiées ou inconnues diminuaient, le voyage s\'est considérablement développé et démocratisé, au cours du XXe siècle avec l\'avènement de moyens de transports modernes de plus en plus rapides et confortables, le chemin de fer d\'abord, puis l\'automobile et l\'avion. Cette évolution s\'est faite avec des conséquences négatives croissantes sur le plan de la consommation d\'énergie et de carburants fossiles, de fragmentation des paysages et écosystèmes par les infrastructures de transport et d\'émission de gaz à effet de serre et autres polluants.                 ', 'Terminer');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `Id_utilisateur` int(255) NOT NULL,
  `Nom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Prenom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Pseudo` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `Date_inscription_U` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pass` text COLLATE utf8_general_mysql500_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`Id_utilisateur`, `Nom`, `Prenom`, `email`, `Pseudo`, `Date_inscription_U`, `pass`) VALUES
(10, 'Dago', 'Annie', 'annie@yahoo.fr', 'Annie', '2020-12-04 23:29:28', '$2y$10$yUAX1IZjFnGyhSb09U9JW.deeYGJD/fgKtK.iSIOwZraok.HEFgcy'),
(11, 'Ramp', 'Celia', 'celia@yahoo.fr', 'celia_ramp', '2020-12-04 23:46:42', '$2y$10$.wV3w4IvSkLCZ8Ns78Gn5eaHlnm.JtRN03QbBy5/wmMRN01QfZEt.'),
(12, 'Dupond', 'Jean', 'jean@yahoo.fr', 'jean_p', '2020-12-06 13:28:43', '$2y$10$qU2NOCWOTVFGGlpnWL.M3OWHv2ZXwnzhDaAw4J.Hs2NdqjQL0OkNq'),
(13, 'Paul', 'Pierre', 'paulo@gmail.com', 'paulo', '2020-12-06 16:59:53', '$2y$10$Wg.VuCHwiKQoPrW1vKY8gOXScskXW4TNOA4mr6gxmu1jMa/DQZBCy'),
(14, 'Invite', 'modele', 'invite@gmail.com', 'utilisateur1', '2020-12-11 21:03:33', '$2y$10$AoDuJ6u6JeFtGI1FQovf1O8OOtk73U9XV5ir3MsQYHPaBcSCQ5S.W'),
(15, 'invite2', 'utilisateur2', 'aze@gmail;com', 'utlisateur2', '2020-12-11 21:05:13', '$2y$10$vNZKZcw/wEVwfaOw1Jjia.gkY5yLop5Qetb3efRmolPW.v/IG2y1G'),
(16, 'utile', 'ateur', 'azeerty@gmail.com', 'Jean', '2020-12-11 21:07:43', '$2y$10$zShfi8HQM9UoujsPsfPxyePqA7AMqkdyypdhXjf/ivi2gfcLvrY4C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidater`
--
ALTER TABLE `candidater`
  ADD PRIMARY KEY (`Id_candidature`),
  ADD KEY `FOREIGN KEY` (`Id_utilisateur`),
  ADD KEY `FK_candidater_projet` (`Id_projet`),
  ADD KEY `FK_candidater_personnage` (`Id_personnage`);

--
-- Indexes for table `commenter`
--
ALTER TABLE `commenter`
  ADD PRIMARY KEY (`Date_comment`),
  ADD KEY `FOREIGN KEY` (`Id_utilisateur`),
  ADD KEY `Id_livre` (`Id_livre`);

--
-- Indexes for table `lire`
--
ALTER TABLE `lire`
  ADD KEY `Id_utilisateur` (`Id_utilisateur`,`Id_livre`),
  ADD KEY `Id_livre` (`Id_livre`);

--
-- Indexes for table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`Id_livre`),
  ADD KEY `FK_livre_projet` (`Id_projet`);

--
-- Indexes for table `participer`
--
ALTER TABLE `participer`
  ADD PRIMARY KEY (`Id_participer`),
  ADD KEY `Id_utilisateur` (`Id_utilisateur`,`Id_projet`),
  ADD KEY `Id_projet` (`Id_projet`),
  ADD KEY `FK_participer_personnage` (`Id_personnage`);

--
-- Indexes for table `personnages`
--
ALTER TABLE `personnages`
  ADD PRIMARY KEY (`Id_personnages`),
  ADD KEY `id_projet_personnage` (`id_projet_personnage`);

--
-- Indexes for table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`Id_projet`),
  ADD UNIQUE KEY `Titre` (`Titre`),
  ADD KEY `FK_projet_utilisateur` (`auteur`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`Id_utilisateur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidater`
--
ALTER TABLE `candidater`
  MODIFY `Id_candidature` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `livre`
--
ALTER TABLE `livre`
  MODIFY `Id_livre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `participer`
--
ALTER TABLE `participer`
  MODIFY `Id_participer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personnages`
--
ALTER TABLE `personnages`
  MODIFY `Id_personnages` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `projet`
--
ALTER TABLE `projet`
  MODIFY `Id_projet` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `Id_utilisateur` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidater`
--
ALTER TABLE `candidater`
  ADD CONSTRAINT `FK_candidater_personnage` FOREIGN KEY (`Id_personnage`) REFERENCES `personnages` (`Id_personnages`),
  ADD CONSTRAINT `FK_candidater_projet` FOREIGN KEY (`Id_projet`) REFERENCES `projet` (`Id_projet`),
  ADD CONSTRAINT `FK_candidater_utilisateur` FOREIGN KEY (`Id_utilisateur`) REFERENCES `utilisateur` (`Id_utilisateur`);

--
-- Constraints for table `commenter`
--
ALTER TABLE `commenter`
  ADD CONSTRAINT `FK_livre` FOREIGN KEY (`Id_livre`) REFERENCES `livre` (`Id_livre`),
  ADD CONSTRAINT `FK_utlisateur` FOREIGN KEY (`Id_utilisateur`) REFERENCES `utilisateur` (`Id_utilisateur`);

--
-- Constraints for table `lire`
--
ALTER TABLE `lire`
  ADD CONSTRAINT `FK_lire_livre` FOREIGN KEY (`Id_livre`) REFERENCES `livre` (`Id_livre`),
  ADD CONSTRAINT `FK_lire_utilisateur` FOREIGN KEY (`Id_utilisateur`) REFERENCES `utilisateur` (`Id_utilisateur`);

--
-- Constraints for table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `FK_livre_projet` FOREIGN KEY (`Id_projet`) REFERENCES `projet` (`Id_projet`);

--
-- Constraints for table `participer`
--
ALTER TABLE `participer`
  ADD CONSTRAINT `FK_participer_personnage` FOREIGN KEY (`Id_personnage`) REFERENCES `personnages` (`Id_personnages`),
  ADD CONSTRAINT `FK_participer_projet` FOREIGN KEY (`Id_projet`) REFERENCES `projet` (`Id_projet`),
  ADD CONSTRAINT `FK_participer_utilisateur` FOREIGN KEY (`Id_utilisateur`) REFERENCES `utilisateur` (`Id_utilisateur`);

--
-- Constraints for table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `FK_projet_utilisateur` FOREIGN KEY (`auteur`) REFERENCES `utilisateur` (`Id_utilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
