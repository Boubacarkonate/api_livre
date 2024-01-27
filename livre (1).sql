-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 15 déc. 2023 à 12:51
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `api_livre`
--

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

DROP TABLE IF EXISTS `livre`;
CREATE TABLE IF NOT EXISTS `livre` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `author` varchar(60) NOT NULL,
  `type` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `created_date` varchar(15) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id`, `title`, `author`, `type`, `description`, `created_date`, `price`) VALUES
(2, 'Unhappy new year', 'Dahlia Blake', 'roman', 'Un soir de Nouvel An. 5 soeurs en deuil. Une maison qui brûle. L’Amour.Depuis le décès de leur mère adorée, chacune des soeurs Scott est retournée à son train-train quotidien. Convoquées à Wilmington par leur père pour passer le 31 décembre en famille, elles s’attendaient à tout… sauf à une soirée faite de révélations, d’amour et de chaos.Fallon est forcée de vivre avec son mari malgré leur séparation et leur quotidien a pris des allures de guerre civile. Aimee travaille pour Satan en personne. À cause d’une météo...', '2023-12-06', '17'),
(3, 'Une histoire du conflit politique. Elections et inégalités s', 'Julia cagé', 'Politique', 'Qui vote pour qui et pourquoi ? Comment la structure sociale des élec­torats des différents courants politiques en France a-t-elle évolué de 1789 à 2022 ? En s’appuyant sur un travail inédit de numérisation des données électorales et socio-économiques des 36 000 communes de France couvrant plus de deux siècles, cet ouvrage propose une his­toire du vote et des inégalités à partir du laboratoire français.Au-delà de son intérêt historique, ce livre apporte un regard neuf sur les crises du présent et leur possible dénouement....', '2023-09-09', '27'),
(4, 'Demain - Un nouveau monde en marche', 'Cyril Dion', 'Economie', 'Et si montrer des solutions, raconter une histoire qui fait du bien était la meilleure façon de résoudre les crises écologiques, économiques et sociales que traversent nos pays ?\r\n\r\nEn 2012, Cyril Dion prend connaissance d\'une étude, menée par vingt-deux scientifiques de différents pays, annonçant la disparition possible d\'une partie de l\'humanité d\'ici à 2100. Cette nouvelle fait à peine l\'objet d\'un traitement de seconde zone dans les médias. Considérant qu\'amplifier le concert des catastrophes ne fonctionne pas, il...', '2015-11-18', '22'),
(7, 'Histoire de Jérusalem', 'Vincent Lemire', 'BD', '4 000 ans d\'une histoire universelle pour la première fois racontés dans une BD exceptionnelle. Il y a 4 000 ans, Jérusalem était une petite bourgade isolée, perchée sur une ligne de crête entre la Méditerranée et le désert. ....', '2022-10-27', '27');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
