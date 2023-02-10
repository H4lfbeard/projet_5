-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 10 fév. 2023 à 16:05
-- Version du serveur :  5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet5_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `hat` text NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `hat`, `content`, `creation_date`) VALUES
(28, 'Projet 1 | Définir sa stratégie d\'apprentissage ', 'Dans cet article nous allons voir ensemble comment j\'ai définis ma stratégie d\'apprentissage', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Sed malesuada eget quam ut condimentum. Cras sit amet gravida nisi, ac rutrum arcu. Phasellus tincidunt nunc eu blandit congue. Nullam a felis vitae neque porttitor laoreet eget sit amet metus. Integer et tincidunt enim, sit amet convallis erat. Proin finibus dapibus tristique. Donec ultricies elit sit amet risus congue, at placerat ex mollis. Donec lorem mauris, tincidunt a ornare vitae, volutpat vel felis.\r\n\r\nSed sed pharetra dui. Donec sollicitudin mi sit amet ipsum ornare malesuada. Sed facilisis ornare ex ut tristique. Ut massa purus, mollis nec congue vel, scelerisque id risus. Sed quis nisi ultricies mi auctor rutrum ac vel diam. Integer dictum, eros a laoreet varius, lorem nisi fringilla nibh, sit amet bibendum tellus lorem ut dolor. Fusce vehicula justo ut tempus hendrerit. Suspendisse potenti. Ut eget sem at enim placerat tristique vel quis nisl. Maecenas et eros finibus, finibus neque vitae, faucibus orci. Etiam facilisis mi metus, a facilisis risus pretium vel. Nunc rhoncus metus risus, vitae congue urna interdum et. Duis sit amet diam molestie, lacinia tortor sit amet, commodo eros. ', '2023-02-10 15:46:04'),
(29, 'Projet 2 | Intégrer un thème wordpress pour un client', 'Dans cet article nous allons voir ensemble comment j\'ai intégré un thème wordpress', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Sed malesuada eget quam ut condimentum. Cras sit amet gravida nisi, ac rutrum arcu. Phasellus tincidunt nunc eu blandit congue. Nullam a felis vitae neque porttitor laoreet eget sit amet metus. Integer et tincidunt enim, sit amet convallis erat. Proin finibus dapibus tristique. Donec ultricies elit sit amet risus congue, at placerat ex mollis. Donec lorem mauris, tincidunt a ornare vitae, volutpat vel felis.\r\n\r\nSed sed pharetra dui. Donec sollicitudin mi sit amet ipsum ornare malesuada. Sed facilisis ornare ex ut tristique. Ut massa purus, mollis nec congue vel, scelerisque id risus. Sed quis nisi ultricies mi auctor rutrum ac vel diam. Integer dictum, eros a laoreet varius, lorem nisi fringilla nibh, sit amet bibendum tellus lorem ut dolor. Fusce vehicula justo ut tempus hendrerit. Suspendisse potenti. Ut eget sem at enim placerat tristique vel quis nisl. Maecenas et eros finibus, finibus neque vitae, faucibus orci. Etiam facilisis mi metus, a facilisis risus pretium vel. Nunc rhoncus metus risus, vitae congue urna interdum et. Duis sit amet diam molestie, lacinia tortor sit amet, commodo eros. ', '2023-02-10 15:46:50'),
(30, 'Projet 3 | Analyser les besoins d\'un client pour son festival de films', 'Dans cet article nous allons voir ensemble comment j\'ai réalisé une maquette de site à l\'aide de HTML / CSS', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Sed malesuada eget quam ut condimentum. Cras sit amet gravida nisi, ac rutrum arcu. Phasellus tincidunt nunc eu blandit congue. Nullam a felis vitae neque porttitor laoreet eget sit amet metus. Integer et tincidunt enim, sit amet convallis erat. Proin finibus dapibus tristique. Donec ultricies elit sit amet risus congue, at placerat ex mollis. Donec lorem mauris, tincidunt a ornare vitae, volutpat vel felis.\r\n\r\nSed sed pharetra dui. Donec sollicitudin mi sit amet ipsum ornare malesuada. Sed facilisis ornare ex ut tristique. Ut massa purus, mollis nec congue vel, scelerisque id risus. Sed quis nisi ultricies mi auctor rutrum ac vel diam. Integer dictum, eros a laoreet varius, lorem nisi fringilla nibh, sit amet bibendum tellus lorem ut dolor. Fusce vehicula justo ut tempus hendrerit. Suspendisse potenti. Ut eget sem at enim placerat tristique vel quis nisl. Maecenas et eros finibus, finibus neque vitae, faucibus orci. Etiam facilisis mi metus, a facilisis risus pretium vel. Nunc rhoncus metus risus, vitae congue urna interdum et. Duis sit amet diam molestie, lacinia tortor sit amet, commodo eros. ', '2023-02-10 15:47:52'),
(31, 'Projet 4 | Conception de la solution technique d\'ExpressFood', 'Dans cet article nous allons voir ensemble comment gérer la solution technique d\'une application de restauration en ligne', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Sed malesuada eget quam ut condimentum. Cras sit amet gravida nisi, ac rutrum arcu. Phasellus tincidunt nunc eu blandit congue. Nullam a felis vitae neque porttitor laoreet eget sit amet metus. Integer et tincidunt enim, sit amet convallis erat. Proin finibus dapibus tristique. Donec ultricies elit sit amet risus congue, at placerat ex mollis. Donec lorem mauris, tincidunt a ornare vitae, volutpat vel felis.\r\n\r\nSed sed pharetra dui. Donec sollicitudin mi sit amet ipsum ornare malesuada. Sed facilisis ornare ex ut tristique. Ut massa purus, mollis nec congue vel, scelerisque id risus. Sed quis nisi ultricies mi auctor rutrum ac vel diam. Integer dictum, eros a laoreet varius, lorem nisi fringilla nibh, sit amet bibendum tellus lorem ut dolor. Fusce vehicula justo ut tempus hendrerit. Suspendisse potenti. Ut eget sem at enim placerat tristique vel quis nisl. Maecenas et eros finibus, finibus neque vitae, faucibus orci. Etiam facilisis mi metus, a facilisis risus pretium vel. Nunc rhoncus metus risus, vitae congue urna interdum et. Duis sit amet diam molestie, lacinia tortor sit amet, commodo eros. ', '2023-02-10 15:49:08'),
(32, 'Projet 5 | Créer un blog en PHP', 'Dans cet article nous allons voir ensemble comment un blog from scratch à l\'aide de PHP', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Sed malesuada eget quam ut condimentum. Cras sit amet gravida nisi, ac rutrum arcu. Phasellus tincidunt nunc eu blandit congue. Nullam a felis vitae neque porttitor laoreet eget sit amet metus. Integer et tincidunt enim, sit amet convallis erat. Proin finibus dapibus tristique. Donec ultricies elit sit amet risus congue, at placerat ex mollis. Donec lorem mauris, tincidunt a ornare vitae, volutpat vel felis.\r\n\r\nSed sed pharetra dui. Donec sollicitudin mi sit amet ipsum ornare malesuada. Sed facilisis ornare ex ut tristique. Ut massa purus, mollis nec congue vel, scelerisque id risus. Sed quis nisi ultricies mi auctor rutrum ac vel diam. Integer dictum, eros a laoreet varius, lorem nisi fringilla nibh, sit amet bibendum tellus lorem ut dolor. Fusce vehicula justo ut tempus hendrerit. Suspendisse potenti. Ut eget sem at enim placerat tristique vel quis nisl. Maecenas et eros finibus, finibus neque vitae, faucibus orci. Etiam facilisis mi metus, a facilisis risus pretium vel. Nunc rhoncus metus risus, vitae congue urna interdum et. Duis sit amet diam molestie, lacinia tortor sit amet, commodo eros. ', '2023-02-10 15:49:51');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `author` varchar(256) NOT NULL,
  `author_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `validity` tinyint(1) DEFAULT '0',
  `comment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `article_id`, `author`, `author_id`, `comment`, `validity`, `comment_date`) VALUES
(60, 24, 'Thomas', 25, 'super commentaire', 1, '2023-02-08 19:17:49'),
(64, 28, 'Utilisateur', 64, 'Voici mon commentaire sur le projet 1', 1, '2023-02-10 16:06:53'),
(65, 29, 'Utilisateur', 64, 'Voici mon commentaire sur le projet 2', 1, '2023-02-10 16:07:10'),
(66, 30, 'Utilisateur', 64, 'Voici mon commentaire sur le projet 3', 1, '2023-02-10 16:07:20'),
(67, 31, 'Utilisateur', 64, 'Voici mon commentaire sur le projet 4', 1, '2023-02-10 16:07:30'),
(68, 32, 'Utilisateur', 64, 'Voici mon nouveau commentaire sur le projet 5', 1, '2023-02-10 16:11:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `user_role` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `password`, `user_role`) VALUES
(25, 'Thomas', 'tomtom.humbert@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$bU5QUDUuSTluaS5qaW1VNQ$3QbB64YNYV88Use00RG40BM5pbJk+98sWqyU7M+omC8', 'ADMIN'),
(64, 'Utilisateur', 'utilisateur@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$NFA3eUpvMk5ic3R3Zjh0dg$uxbnNAjydWGzSB7fmD5mmZKOQ3HNstNq6kMI8cONp2E', 'USER');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
