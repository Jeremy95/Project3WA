-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 19 Février 2015 à 13:19
-- Version du serveur: 5.5.40-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `minichat`
--
CREATE DATABASE IF NOT EXISTS `minichat` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `minichat`;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_author` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `id_author`, `content`, `date`) VALUES
(6, 5, 'Hey !', '2015-02-19 12:08:58'),
(7, 6, 'Hey bob !', '2015-02-19 12:09:09'),
(8, 6, 'how''s it going ?', '2015-02-19 12:09:17'),
(9, 7, '''sup guys ?', '2015-02-19 12:09:41');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(5, 'bob', '$2y$10$/p4k2pQa5T3Qt7KAsvMjtOvG8XhUaZ2V71XhikctBrJjVLD3i8NX.'),
(6, 'alice', '$2y$10$2V367G3RaGxKUySdo3/qeuOaFREWCoutdZ9oyXG6SIK8pYl.9IBg2'),
(7, 'jack', '$2y$10$1ANnrzMbWPJtiCBexDd1nejdRE9bEm4EQpfSqydFwnafrPjNtN5d2');