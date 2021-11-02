-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 07 oct. 2021 à 14:12
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(3) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `intro` text NOT NULL,
  `conclu` text NOT NULL,
  `date_time_publication` datetime NOT NULL,
  `date_time_edition` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `intro`, `conclu`, `date_time_publication`, `date_time_edition`) VALUES
(1, 'Titre de l\'article 1 !', 'intro', 'conclu', '2021-10-05 08:12:11', '2021-10-05 08:15:08'),
(2, 'Titre de l\'article 2', 'qzdqfq', 'dfsf', '2021-10-05 08:52:20', '2021-10-05 08:52:20'),
(3, 'Titre de l\'article 3 !', 'dzqfd', 'fxfwz', '2021-10-05 08:52:55', '2021-10-05 08:52:55'),
(4, 'qfxs', 'xd', 'dxd', '2021-10-05 10:06:12', '2021-10-05 10:06:12');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
