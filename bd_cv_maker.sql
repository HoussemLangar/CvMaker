-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 10 mars 2024 à 21:23
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bd_cv_maker`
--

-- --------------------------------------------------------

--
-- Structure de la table `cv`
--

DROP TABLE IF EXISTS `cv`;
CREATE TABLE IF NOT EXISTS `cv` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description_profil` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nom_prenom` varchar(30) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `linkedin` varchar(50) NOT NULL,
  `competences` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nom_entreprise` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `poste_occupe` varchar(20) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `description_exp` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nom_ecole` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `diplome_obtenu` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `annee_debut` date NOT NULL,
  `annee_fin` date NOT NULL,
  `domaine_etude` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `langues` varchar(50) NOT NULL,
  `photo` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `token` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=149 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cv`
--

INSERT INTO `cv` (`id`, `description_profil`, `nom_prenom`, `adresse`, `telephone`, `email`, `linkedin`, `competences`, `nom_entreprise`, `poste_occupe`, `date_debut`, `date_fin`, `description_exp`, `nom_ecole`, `diplome_obtenu`, `annee_debut`, `annee_fin`, `domaine_etude`, `langues`, `photo`, `token`) VALUES
(147, 'J’ai obtenu mon baccalauréat en sciences informatique en 2022,\r\net actuellement je suis un étudiant en 2éme année de Licence en\r\nInformatique de Gestion \"Business Computing\" : E-Business à\r\nl’Ecole Supérieure des Sciences Economiques et Commerciales\r\nde Tunis. Je suis un travailleur acharné, j\'apprends vite, j\'ai\r\nl\'esprit d\'équipe et je réussis bien sous pression', 'HOUSSEM LANGAR', 'Brij takelsa', '51393409', 'houssemlangar3@gmail.com', 'linkedin.com/in/houssem-langar/', 'Langages : Javascript , Python , HTML 5 , CSS , php , SQL , C, Java .\r\nOutils : Visual Studio , Arduino , GIT, GitHub, Oracle, Oracle\r\nDatabase, MySQL Workbench, Word , Excel, Access, Powerpoint ,\r\nAdobePhotoshop, Adobe premiere pro , Adobe illustrator .\r\nSGBD : Oracle , MySql , PLSQL ,SQL server .\r\n\r\n Systéme d\'exploitation : Windows , Ubuntu ,CentOs . ', 'SIEGE SOCIAL DE La Banque Tunisienne de Solidarité', 'Stages En Entreprise', '2023-07-01', '2023-08-01', 'Conception et développement d\'une application web pour le\r\nsuivi des demandes d\'amélioration de siège.', 'Ecole Supérieure des Sciences Economiques et Commerciales de Tunis.', 'Licence en Informatique de Gestion \"Business Computing\"', '2023-09-01', '2025-09-01', 'E-Business', 'Français, Anglais, Espagnol, Arabe', 'logo.png', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE3MTAwOTk1MjcsImV4cCI6MTcxMDEwMzEyNywiaXNzIjoidm90cmVfZG9tYWluZSIsImRhdGEiOnsiaWQiOjU1LCJkZWYiOiJ1c2VyIn19.5RvPxGiZxcOZE0Vzonv_8ZMoM35VSAsnyuyFkCCa-24'),
(148, 'J’ai obtenu mon baccalauréat en sciences informatique en 2022,\r\net actuellement je suis un étudiant en 2éme année de Licence en\r\nInformatique de Gestion \"Business Computing\" : E-Business à\r\nl’Ecole Supérieure des Sciences Economiques et Commerciales\r\nde Tunis. Je suis un travailleur acharné, j\'apprends vite, j\'ai\r\nl\'esprit d\'équipe et je réussis bien sous pression.\r\n', 'Houssem Langar', 'Brij takelsa', '+216 51 393 409', 'houssemlangar3@gmail.com', 'linkedin.com/in/houssem-langar/', 'Langages : Javascript , Python , HTML 5 , CSS , php , SQL , C, Java .\r\nOutils : Visual Studio , Arduino , GIT, GitHub, Oracle, Oracle\r\nDatabase, MySQL Workbench, Word , Excel, Access, Powerpoint ,\r\nAdobePhotoshop, Adobe premiere pro , Adobe illustrator .\r\nSGBD : Oracle , MySql , PLSQL ,SQL server .\r\n\r\n Systéme d\'exploitation : Windows , Ubuntu ,CentOs . ', 'SIEGE SOCIAL DE La Banque Tunisienne de Solidarité', 'Stages En Entreprise', '2023-07-01', '2023-08-01', 'Conception et développement d\'une application web pour le\r\nsuivi des demandes d\'amélioration de siège.', 'Ecole Supérieure des Sciences Economiques et Commerciales de Tunis.', 'Licence en Informatique de Gestion \"Business Computing\"', '2023-09-01', '2025-09-01', 'E-Business', 'Français, Anglais, Espagnol, Arabe', 'logo.png', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE3MTAwNzkyNjksImV4cCI6MTcxMDA4Mjg2OSwiaXNzIjoidm90cmVfZG9tYWluZSIsImRhdGEiOnsiaWQiOjU1fX0.21iv6IgDjSgB5VV-hStCQmBeTxu3EkmSZJA_-O0flVo');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_prenom` varchar(30) NOT NULL,
  `nom_utilisateur` varchar(30) NOT NULL,
  `mot_de_passe` varchar(30) NOT NULL,
  `def` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id`, `nom_prenom`, `nom_utilisateur`, `mot_de_passe`, `def`) VALUES
(64, 'houssem langar', 'langar', '123456', 'admin'),
(55, 'user', 'user', '123456', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
