-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 27 Juin 2017 à 16:35
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `framework`
--
CREATE DATABASE IF NOT EXISTS `framework` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `framework`;

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date_add` datetime NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `blog`
--

INSERT INTO `blog` (`id`, `title`, `content`, `date_add`, `id_user`) VALUES
(1, 'Hello world', 'Lorem ipsum dolor sit amet, \r\n\r\nconsectetur adipiscing elit. Curabitur tempus pharetra nunc lacinia placerat. Suspendisse maximus nec mi ut tempus. Vivamus maximus nisl dolor, \r\n\r\nvitae ornare magna gravida sit amet. Duis consectetur diam nulla, id vestibulum leo tincidunt sed. Sed dolor eros, varius sit amet nisi et, tempor sagittis quam. In fringilla finibus nulla eu pulvinar. Duis quis neque lectus. Nunc rutrum dolor a tellus fringilla blandit. Mauris pretium lacus at dolor congue, dapibus sodales augue tempus. In sem est, \r\n\r\nvulputate nec pharetra id, viverra sit amet quam. Donec lacinia aliquet consectetur. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus ac libero faucibus, placerat turpis vel, bibendum orci. Cras ut risus at metus mollis pharetra mattis id sem.', '2017-06-27 14:24:05', 1),
(2, 'Hello world', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tempus pharetra nunc lacinia placerat. Suspendisse maximus nec mi ut tempus. Vivamus maximus nisl dolor, vitae ornare magna gravida sit amet. Duis consectetur diam nulla, id vestibulum leo tincidunt sed. Sed dolor eros, varius sit amet nisi et, tempor sagittis quam. In fringilla finibus nulla eu pulvinar. Duis quis neque lectus. Nunc rutrum dolor a tellus fringilla blandit. Mauris pretium lacus at dolor congue, dapibus sodales augue tempus. In sem est, vulputate nec pharetra id, viverra sit amet quam. Donec lacinia aliquet consectetur. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus ac libero faucibus, placerat turpis vel, bibendum orci. Cras ut risus at metus mollis pharetra mattis id sem.', '2017-06-27 14:26:03', 1),
(3, 'Titre à +10 caractères', 'Quisque sit amet aliquet justo. Sed tincidunt ligula quis tellus imperdiet, at porta orci faucibus. Donec sit amet neque justo. Proin vitae sem eu magna vehicula feugiat a gravida dolor. Sed eleifend facilisis purus vel tincidunt. Etiam vel mauris at est placerat bibendum a vitae nisl. Maecenas quam elit, consequat non euismod in, congue eget diam. Morbi et lectus at lacus ornare maximus. In vel accumsan libero. Vestibulum ac nulla massa. Integer rhoncus viverra pellentesque. Suspendisse hendrerit lacinia malesuada.', '2017-06-27 14:57:51', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `role`) VALUES
(1, 'Axel', 'Wargnier', 'axel', 'axel.wargnier@wf3.fr', '$2y$10$Z4y/aNyvhg0mtzKabRepG.eQtqaZaZBd6wYg2mSNXJdBGLx8sVBsG', 'admin');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
