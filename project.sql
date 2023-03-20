-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 20 mars 2023 à 23:14
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `project`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_c` int(20) NOT NULL,
  `libelle_c` varchar(50) NOT NULL,
  `description_c` text NOT NULL,
  `image_c` varchar(120) NOT NULL,
  `id_parent` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_c`, `libelle_c`, `description_c`, `image_c`, `id_parent`) VALUES
(10, 'Gym', 'Being physically active can improve your brain health, help manage weight, reduce the risk of disease, strengthen bones and muscles, and improve your ability to do everyday activities. Adults who sit less and do any amount of moderate-to-vigorous physical activity gain some health benefits.', '63d5817f7c22d.jpg', 0),
(11, 'Swim', '                        builds endurance, muscle strength and cardiovascular fitness. helps you maintain a healthy weight, healthy heart and lungs. tones muscles and builds strength. provides an all-over body workout, as nearly all of your muscles are used during swimming.                    ', '63d584770589c.jpg', 0),
(12, 'Hiking', '                        You want to burn the most calories: Go for a hike\r\nHiking outdoors, surrounded by nature, boosts your outlook, according to studies. While you can burn around 100 calories per mile walking, you can easily double that figure when hiking                    ', '63d5848874956.jpg', 0),
(13, 'Camping', 'While camping, you will likely explore new surrounds and keep active. This increased exercise has been well-documented – from the Heart Foundation to the Department of Health – as having myriad physical and mental benefits. These include combatting health problems and disease and improving your mood and energy levels.', '63d5835a76335.jpg', 0),
(14, 'Clothes', 'Clothing (also known as clothes, garments, dress, apparel, or attire) is any item worn on the body. Typically, clothing is made of fabrics or textiles, but over time it has included garments made from animal skin and other thin sheets of materials and natural products found in the environment, put together. The wearing of clothing is mostly restricted to human beings and is a feature of all human societies. ', '63d5839741956.jpg', 0),
(15, 'Tennis', 'Tennis is a racket sport that is played either individually against a single opponent (singles) or between two teams of two players each (doubles).', '63d583bea3eff.jpg', 0),
(16, 'Outdoor', 'Outdoor activities expose us to new terrains and challenge us to go out of our comfort zone. This leads us to put our adaptation skills into action and also boosts our sense of adventure.', '63d5841f94e5a.jpg', 0),
(17, 'Sport', 'Sports is exercise/physical activity with fun, \'masti\'. Sports is exercise/physical activity with an objective and definite aim. Sports is exercise/physical activity with a purpose to overcome adversities and win. Playing sports helps release pressure and tension in a healthy and controlled way.                    ', '63d584562effe.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `images_prd`
--

CREATE TABLE `images_prd` (
  `id_img` int(11) NOT NULL,
  `libelle_img` varchar(120) NOT NULL,
  `id_prd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `images_prd`
--

INSERT INTO `images_prd` (`id_img`, `libelle_img`, `id_prd`) VALUES
(3, '63c9640a5b7fa.jpg', 0),
(4, '63c9640a735e1.jpg', 0),
(14, '63da7a48b949c.jpg', 4),
(19, '63da887f70e0b.jpg', 5),
(20, '63db8cadcb6b3.png', 6),
(21, '63e251be28208.jpg', 2),
(23, '63e2a708afb9d.jpg', 1),
(27, '63e2a9a47d200.jpg', 7),
(28, '63e2ab1c3b580.jpg', 8),
(29, '63e2ac64d1c43.jpg', 9),
(33, '63e2ba480f781.png', 3),
(35, '63e516ca2eb62.jpg', 4),
(36, '63e96cfbae85c.jpg', 10);

-- --------------------------------------------------------

--
-- Structure de la table `images_selling`
--

CREATE TABLE `images_selling` (
  `id_img` int(11) NOT NULL,
  `libelle_img` varchar(120) NOT NULL,
  `id_s` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `images_selling`
--

INSERT INTO `images_selling` (`id_img`, `libelle_img`, `id_s`) VALUES
(0, '63e51b0feb888.jpg', 5),
(0, '63e51b533ff9b.jpg', 6),
(0, '63e51bfb05811.jpg', 7),
(0, '63e51c51d9455.jpg', 8);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id_p` int(30) NOT NULL,
  `libelle_p` varchar(50) NOT NULL,
  `description_p` text NOT NULL,
  `prix_p` float NOT NULL,
  `id_cat` int(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id_p`, `libelle_p`, `description_p`, `prix_p`, `id_cat`, `id_user`, `status`) VALUES
(3, 'Racket', 'A racket, or racquet, is a sports implement used for striking a ball or shuttlecock in games such as squash, tennis, racquetball, badminton and padel. In the strictest sense a racket consists of a handled frame with an open hoop across which a network of strings is stretched tightly.', 15, 15, 2, 3),
(4, 'Tent', 'It is a portable shelter that can be carried great distances and set up and taken down easily. Tents come in many sizes and shapes. Tremendously large circus types are capable of accommodating hundreds of people. Small camping tents can usually hold only a few persons.', 120, 13, 2, 3),
(5, 'football', 'Football, also called association football or soccer, is a game involving two teams of 11 players who try to maneuver the ball into the other team\'s goal without using their hands or arms. The team that scores more goals wins. Football is the world\'s most popular ball game in numbers of participants and spectators.', 60, 17, 2, 2),
(7, 'Lantern', 'a lamp with a transparent case protecting the flame or electric bulb, and typically having a handle by which it may be carried or hung.', 22, 16, 6, 3),
(8, 'ACE Tennis Bag 45L', 'The distinguishing feature is that they are modular backpacks, meaning that they have compartments specifically designed to hold your tennis ', 85, 15, 6, 2),
(9, 'Cap', 'Tennis cap or a sports visor (also called a sun visor or visor cap) is a type of crownless hat consisting simply of a visor or brim with a strap encircling', 15, 15, 6, 2),
(10, 'dumbbele', 'a short bar with a weight at each end, used typically in pairs for exercise or muscle-building.', 15, 10, 6, 2);

-- --------------------------------------------------------

--
-- Structure de la table `selling`
--

CREATE TABLE `selling` (
  `id_s` int(11) NOT NULL,
  `libelle_s` varchar(50) NOT NULL,
  `description_s` text NOT NULL,
  `prix_s` float NOT NULL,
  `id_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `selling`
--

INSERT INTO `selling` (`id_s`, `libelle_s`, `description_s`, `prix_s`, `id_cat`) VALUES
(5, 'Treadmill', 'A treadmill is a piece of exercise equipment that has a belt that loops around, driven by a motor.', 200, 10),
(6, 'Mikasa Handball', 'Handball: This game is also among the most popular team sports in the world. It is played between two teams of seven players each. A handball match has two periods of thirty minutes with a break of ten minutes.', 70, 17),
(8, 'T-shirt', 'a short-sleeved casual top, generally made of cotton, having the shape of a T when spread out flat.', 20, 14);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_u` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `motdepasse` varchar(50) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_u`, `nom`, `prenom`, `email`, `motdepasse`, `telephone`, `role`) VALUES
(1, 'mohamed', 'ben radhwen', 'hamalov4@gmail.com', '123963', '99903321', 'admin'),
(2, 'hamdi', 'auok', 'hamdi@gmail.com', '789456', '996633', 'annonceur'),
(3, 'rabiye', 'bouden', 'rabiye@gmail.com', '741852', '774411', 'annonceur'),
(4, 'habib', 'radhwen', 'benradhouene.habib@gmail.com', '123147', '27654882', 'annonceur'),
(5, 'adem', 'mahmoud', 'ademking4@gmail.com', 'ademdouble', '23879181', 'annonceur'),
(6, 'sabrine', 'radhwen', 'benradhouane.sabrine@gmail.com', '789123', '27654832', 'annonceur'),
(7, 'joud', 'radhwen', 'joud@gmail.com', 'jouda', '562135', 'annonceur'),
(25, '', '', '', '', '', 'annonceur'),
(26, '', '', '', '', '', 'annonceur'),
(27, '', '', '', '', '', 'annonceur'),
(28, '', '', '', '', '', 'annonceur');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_c`);

--
-- Index pour la table `images_prd`
--
ALTER TABLE `images_prd`
  ADD PRIMARY KEY (`id_img`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_p`);

--
-- Index pour la table `selling`
--
ALTER TABLE `selling`
  ADD PRIMARY KEY (`id_s`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_c` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `images_prd`
--
ALTER TABLE `images_prd`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_p` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `selling`
--
ALTER TABLE `selling`
  MODIFY `id_s` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
