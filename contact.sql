-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 28 jan. 2025 à 07:22
-- Version du serveur : 5.7.40
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `contact`
--

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id`, `email`, `message`, `date`) VALUES
(1, 'nawresb@gmail.com', 'jjjjjjjjj', '2025-01-07 12:07:10'),
(2, 'nawresb@gmail.com', 'hhhhhhhhmmmm', '2025-01-07 12:16:57'),
(3, 'nawresb@gmail.com', 'nnnnnnnnnnnnnnn', '2025-01-07 12:37:41'),
(4, 'nawresb@gmail.com', 'jj', '2025-01-07 13:09:30'),
(5, 'ngcg@hh', 'ghyujh', '2025-01-08 09:59:58'),
(6, 'n@jj', 'nn', '2025-01-08 13:23:01'),
(7, 'nawresb@gmail.com', 'jn', '2025-01-16 07:37:55'),
(8, 'nawresbf30@gmail.com', 'bb', '2025-01-16 07:56:11'),
(9, 'nawresb@gmail.com', 'j', '2025-01-20 08:28:26'),
(10, 'nawresb@gmail.com', 'gyh', '2025-01-27 14:42:50');

-- --------------------------------------------------------

--
-- Structure de la table `formulaire_formation`
--

DROP TABLE IF EXISTS `formulaire_formation`;
CREATE TABLE IF NOT EXISTS `formulaire_formation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `formation` varchar(255) NOT NULL,
  `message` text,
  `date_soumission` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `formulaire_formation`
--

INSERT INTO `formulaire_formation` (`id`, `nom`, `email`, `telephone`, `formation`, `message`, `date_soumission`) VALUES
(1, ' nawres', 'nawresb@gmail.com', '58183544', 'management_sst', 'hh', '2025-01-08 13:04:29'),
(2, ' nawres', 'nawresb@gmail.com', '58183544', 'qualite_eaux', 'bonjour', '2025-01-10 08:41:23'),
(3, 'Ø§Ù„Ù…ØªØ³Ù‡Ù„', 'nawresbf30@gmail.com', '12345679', 'iso_17025', ',,,,,,,,', '2025-01-16 14:54:18'),
(4, 'Ø¨Ù† ÙØ±Ø¬', 'nawresbf30@gmail.com', '12345679', 'economie_eau', 'b', '2025-01-23 07:54:21');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
