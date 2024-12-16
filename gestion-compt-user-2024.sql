-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 21 juin 2024 à 11:46
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion-compt-user-2024`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirmation_token` varchar(255) DEFAULT NULL,
  `confirmed_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `confirmation_token`, `confirmed_at`) VALUES
(6, 'admas', 'dominikmciangessi@gmail.com', '$2y$10$nn8USztgDKax7tvNEs7eeOhVRvwAsVxIxYntVGO6gi1TW6UmlHgdK', 'BjDpTaseUtQtilj3GTJ6Sl8CDJ5OdS86cQFiwxI88mCTj7Nu3LHFH0zh3nQYstnxOK8RZfSWGlIOhdkgZRmi5EEQckmyUz9mkgjv', NULL),
(11, 'mmmpp', 'departemobile@gmail.com', '$2y$10$bZ0QL9ja3S61rzCt8S/eO.yVlBhZ9PIMLcaOOBsvQoh5q9do/rcni', NULL, '2024-06-20 15:32:25'),
(12, 'fdsfsqds', 'mciagnessi@gmail.com', '$2y$10$nPut10t4K3J56CRob2fWheMkZUSNRyrZnNq4zRzreZ3nR9xBmY6.6', NULL, '2024-06-20 16:03:56'),
(13, 'jhgjhgj', 'styliste@seco.com', '$2y$10$7KBSGECIVtOcDf8njPK7E.MIzdRY8pvkZGOaicKNzuFN4CQRX2Ixq', NULL, '2024-06-20 16:04:42');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
