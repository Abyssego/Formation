-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 23 Février 2023 à 13:26
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestionformation`
--

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `IdFormation` int(11) NOT NULL,
  `Descriptif` varchar(100) DEFAULT NULL,
  `NomFichier` varchar(15) DEFAULT NULL,
  `Niveau` varchar(15) DEFAULT NULL,
  `IdTheme` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `formation`
--

INSERT INTO `formation` (`IdFormation`, `Descriptif`, `NomFichier`, `Niveau`, `IdTheme`) VALUES
(1, 'Choisissez le bon éditeur de text, pour partir sur de bonne base', 'htmlEditeur', 'débutant', 3),
(2, 'Apprendre à faire des tableaux avec html, vous apprendrez plus tard, à le rendre joli avec css', 'htmlTableau', 'débutant', 3),
(3, 'Apprendre à faire des formulaires efficaces pour avoir des pages approprié à vos besoin', 'htmlFormulaire', 'débutant', 3),
(4, 'Apprenez à mettre en forme vos éléments', 'cssFlexbox', 'intermédiaire', 4),
(5, 'Apprenez à modifier les éléments que vous voulez séparément', 'cssSelecteur', 'débutant', 4),
(6, 'Réalisez une barre de navigation en CSS', 'cssNavigation', 'débutant', 4),
(7, 'Créer une interface approprié à ses besoins', 'figmaFrame', 'débutant', 8),
(8, 'Installer les extensions que vous voulez pour améliorer votre application', 'figmaAddons', 'intermédiaire', 8),
(9, 'Apprenez à relier des bases de données à votre script.', 'phpBDD', 'débutant', 1),
(10, 'Apprenez à créer des formulaire grâce au PHP.', 'phpFormulaire', 'débutant', 1),
(11, 'Apprenez à utiliser des instructions conditionnelles.', 'phpComposant', 'débutant', 1),
(12, 'Utiliser la bibliothèque JavaScript pour simplifier les codes.', 'jsJquery', 'débutant', 5),
(13, 'Apprenez à utiliser la bibliothèque JavaScript de Facebook.', 'jsReact', 'débutant', 5),
(14, 'Apprenez à utiliser des instructions conditionnelles.', 'jsComposant', 'débutant', 5),
(15, 'Apprenez à filtrer les enregistrements d\'une base de données.', 'sqlWhere', 'débutant', 6),
(16, 'Apprenez à utiliser les fonctions disponibles en SQL.', 'sqlFonction', 'débutant', 6),
(17, 'Apprenez à faire des jointures, pour avoir plus de liberté dans vos requêtes.', 'sqlJointure', 'intermédiaire', 6),
(18, 'Apprenez à convertir des variables, un concept indispensable à C#.', 'c#Convert', 'débutant', 7),
(19, 'Apprenez à manipuler les classes, pour optimiser vos codes. ', 'c#Classe', 'avancé', 7),
(20, 'Apprenez à utiliser des instructions conditionnelles.', 'c#Composant', 'débutant', 7),
(21, 'Installer les extensions que vous voulez pour améliorer votre application.', 'vscodeAddons', 'débutant', 9),
(22, 'Apprenez à prendre en main, un dés meilleur éditeur de texte.', 'vscodeConfig', 'débutant', 9),
(23, 'Apprenez à prendre en main l\'outil de modification de photo.', 'pixlrConfig', 'débutant', 10),
(24, 'Apprenez à utiliser les outils mis en place pour la modification.', 'pixlrMontage', 'intermédiaire', 10),
(25, 'Découvrez les outils de photo montage, et apprenez à les manipuler.', 'pixlrOutils', 'intermédiaire', 10),
(26, 'Apprenez à créer des entités entièrement modifiable.', 'pythonPOO', 'avancé', 11),
(27, 'Apprenez à utiliser les composants, et la syntaxe de python.', 'pythonComposant', 'débutant', 11),
(28, 'Apprenez à utiliser l\'ensemble des logiciels modules sur Python.', 'pythonBiblio', 'intermédiaire', 11),
(29, 'Apprenez à modifier la police grâce à des couleurs ou la taille.', 'pointPolice', 'débutant', 12),
(30, 'Modifier les paragraphes de vos diapositives comme vous voulez.', 'pointParagraphe', 'débutant', 12),
(31, 'Apprenez à créer des dessins avec diverses forme.', 'pointDessin', 'débutant', 12),
(33, 'Codé du font-end', 'React', 'avancé', 5),
(34, 'Codé du font-end', 'React', 'debutant', 5);

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

CREATE TABLE `theme` (
  `IdTheme` int(11) NOT NULL,
  `NomTheme` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `theme`
--

INSERT INTO `theme` (`IdTheme`, `NomTheme`) VALUES
(1, 'PHP'),
(2, 'Word'),
(3, 'HTML'),
(4, 'CSS'),
(5, 'Javascript'),
(6, 'SQL'),
(7, 'C#'),
(8, 'Figma'),
(9, 'VSCode'),
(10, 'PIXLR'),
(11, 'PYTHON'),
(12, 'PowerPoint');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`IdFormation`),
  ADD KEY `IdTheme` (`IdTheme`);

--
-- Index pour la table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`IdTheme`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `IdFormation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT pour la table `theme`
--
ALTER TABLE `theme`
  MODIFY `IdTheme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `FK_FORMATION_THEME` FOREIGN KEY (`IdTheme`) REFERENCES `theme` (`IdTheme`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
