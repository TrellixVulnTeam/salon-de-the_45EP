-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 29 jan. 2021 à 12:05
-- Version du serveur :  8.0.22-0ubuntu0.20.04.3
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'actu'),
(2, 'bien-être');

-- --------------------------------------------------------

--
-- Structure de la table `couleur`
--

CREATE TABLE `couleur` (
  `id` int NOT NULL,
  `color` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `couleur`
--

INSERT INTO `couleur` (`id`, `color`) VALUES
(1, 'noir'),
(2, 'Infusion'),
(3, 'Blanc'),
(4, 'Vert'),
(5, 'Rooibos');

-- --------------------------------------------------------

--
-- Structure de la table `extension`
--

CREATE TABLE `extension` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `extension`
--

INSERT INTO `extension` (`id`, `title`) VALUES
(1, 'testext');

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

CREATE TABLE `game` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `player` int NOT NULL,
  `maximumPlayer` int DEFAULT NULL,
  `duration` time NOT NULL,
  `maximumDuration` time DEFAULT NULL,
  `difficulty` int NOT NULL,
  `maximumDifficulty` int DEFAULT NULL,
  `age` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `game`
--

INSERT INTO `game` (`id`, `name`, `extension`, `player`, `maximumPlayer`, `duration`, `maximumDuration`, `difficulty`, `maximumDifficulty`, `age`) VALUES
(4, '7 Wonders', 'Armada', 3, 7, '04:45:00', '00:00:00', 3, 0, 10),
(5, '7 Wonders Duel', 'Panthéon', 2, 0, '04:45:00', '00:00:00', 3, 0, 10),
(6, 'Abalone', '', 2, 0, '00:30:00', '00:00:00', 2, 0, 8),
(7, 'Abyss', 'Kraken', 2, 4, '01:00:00', '00:00:00', 2, 0, 10),
(8, 'Attrapes rêves', '', 2, 4, '00:15:00', '00:00:00', 1, 0, 4),
(9, 'Bandido', '', 2, 4, '00:20:00', '00:00:00', 1, 0, 6),
(10, 'Bang', '', 4, 7, '00:45:00', '00:00:00', 1, 0, 8),
(11, 'Bazar Bizarre', '2 Extensions', 2, 8, '00:30:00', '00:00:00', 1, 0, 8),
(12, 'Black Stories', '', 2, 10, '01:00:00', '00:00:00', 2, 0, 10),
(13, 'Bublee Pop', '', 2, 0, '00:30:00', '00:00:00', 1, 0, 8),
(14, 'Carré magique', '', 2, 4, '00:15:00', '00:00:00', 1, 0, 4),
(15, 'Catan', '', 3, 4, '01:30:00', '02:00:00', 3, 0, 12),
(16, 'Citadelles', '', 3, 7, '01:00:00', '00:00:00', 2, 0, 10),
(17, 'Clank !', 'Expéditions', 2, 4, '01:00:00', '01:30:00', 3, 0, 12),
(18, 'Clank ! Dans l\'espace', 'Apocalypse', 2, 4, '01:00:00', '01:30:00', 3, 0, 12),
(19, 'Columba', '', 2, 4, '00:30:00', '00:00:00', 2, 0, 8),
(20, 'Crazy Cups', 'Crazy Cups +', 2, 6, '00:10:00', '00:00:00', 1, 0, 6),
(21, 'Crypt', '', 2, 4, '00:30:00', '00:00:00', 2, 0, 12),
(22, 'Cthulhu l\'avènement', '', 2, 0, '00:40:00', '00:00:00', 3, 0, 14),
(23, 'Deep Sea Adventure', '', 2, 6, '00:30:00', '00:00:00', 2, 0, 8),
(24, 'Détective', '', 2, 5, '02:00:00', '03:00:00', 5, 0, 18),
(25, 'Dixit', '', 3, 6, '00:45:00', '00:00:00', 2, 0, 8);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `newsid` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdAt` datetime NOT NULL,
  `categoryId` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`newsid`, `title`, `content`, `createdAt`, `categoryId`, `image`) VALUES
(2, 'La pluie', 'la pluie est un phénomène naturel par lequel des gouttes d\'eau tombent des nuages vers le sol. Il s\'agit d\'une des formes les plus communes de précipitations sur Terre. Son rôle est prépondérant dans le cycle de l\'eau.', '2020-09-10 15:17:49', 1, 'pluie.jpg'),
(3, 'Le Cantal', 'Le Cantal est un département français situé dans la région Auvergne-Rhône-Alpes, dont le nom vient du massif volcanique du Cantal qui occupe le centre de son territoire. L\'Insee et la Poste lui attribuent le code 15. Sa préfecture est Aurillac. ', '2020-09-10 15:17:49', 1, 'cantal.jpg'),
(5, 'Une autre news', 'Test description', '2020-09-25 16:22:28', 1, 'croissant.jpg'),
(6, 'Ginseng', ' Le ginseng est une plante reconnue pour son effet tonique général. D’ailleurs, à cause de cet effet stimulant, il est recommandé de le consommer le matin. Les recherches montrent que le ginseng est un allié pour aider à stimuler le système immunitaire, combattre la fatigue physique et intellectuelle, ou encore pour aider les convalescents à reprendre des forces.', '2020-09-27 11:33:22', 2, 'ginseng.jpg'),
(8, 'Bougainvillier', 'Bougainvillea est un genre d\'arbustes de la famille des Nyctaginaceae.\r\n\r\nCertaines de ses espèces sont appelées bougainvillée (féminin) ou bougainvillier (masculin), notamment Bougainvillea glabra, Bougainvillea spectabilis et Bougainvillea buttiana.\r\n\r\nPhilibert Commerson a été le premier botaniste à décrire et nommer un spécimen de ce genre, récolté au Brésil lors de l\'expédition autour du monde dirigée par l\'explorateur français Louis Antoine de Bougainville. Commerson rend alors hommage à Bougainville en nommant le genre Buginvillaea, orthographe par la suite rectifiée en Bougainvillea.\r\n\r\nCe sont des arbustes épineux grimpants aux vives couleurs qui contrairement aux apparences ne sont pas dues aux fleurs. Celles-ci sont petites et blanches, et ce sont les bractées de l\'extrémité des rameaux qui les entourent qui offrent des coloris variés : rose, rouge, mauve, orange, jaune, blanc.\r\n\r\nCes plantes sont originaires des forêts tropicales humides d\'Amérique du Sud et sont largement utilisées comme plantes ornementales jusque dans les régions tempérées chaudes.\r\n\r\nIl en existe de nombreux cultivars lianescents.\r\n\r\nLe bougainvillier est considéré comme une plante magique dans les rites vaudou et antillais pour se venger des femmes méprisantes en causant leur déchéance. Il ne doit pas être confondu avec le flamboyant qui correspond aux rites funéraires.', '2021-01-28 21:49:52', 1, 'Bougainvillier.jpeg'),
(9, 'Soleil', 'Le Soleil est l’étoile du Système solaire. Dans la classification astronomique, c’est une étoile de type naine jaune d\'une masse d\'environ 1,989 1 × 1030 kg, composée d’hydrogène (75 % de la masse ou 92 % du volume) et d’hélium (25 % de la masse ou 8 % du volume)10. Le Soleil fait partie de la galaxie appelée la Voie lactée et se situe à environ 8 kpc (∼26 100 a.l.) du centre galactique, dans le bras d\'Orion. Le Soleil orbite autour du centre galactique en 225 à 250 millions d\'années (année galactique). Autour de lui gravitent la Terre (à la vitesse de 30 km/s), sept autres planètes, au moins cinq planètes naines, de très nombreux astéroïdes et comètes et une bande de poussière. Le Soleil représente à lui seul environ 99,854 % de la masse du Système solaire ainsi constitué, Jupiter représentant plus des deux tiers du reste.\r\n\r\nL’énergie solaire transmise par le rayonnement solaire rend possible la vie sur Terre par apport d\'énergie lumineuse (lumière) et d\'énergie thermique (chaleur), permettant la présence d’eau à l’état liquide et la photosynthèse des végétaux. Les UV solaires contribuent à la désinfection naturelle des eaux de surfaces et à y détruire certaines molécules indésirables (quand l\'eau n\'est pas trop turbide)11. La polarisation naturelle de la lumière solaire (y compris de nuit après diffusion ou réflexion, par la Lune ou par des matériaux tels que l’eau ou les cuticules végétales) est utilisée par de nombreuses espèces pour s’orienter.\r\n\r\nLe rayonnement solaire est aussi responsable des climats et de la plupart des phénomènes météorologiques observés sur la Terre. En effet, le bilan radiatif global de la Terre est tel que la densité thermique à la surface de la Terre est en moyenne à 99,97 % ou 99,98 % d’origine solairenote 1. Comme pour tous les autres corps, ces flux thermiques sont continuellement émis dans l’espace, sous forme de rayonnement thermique infrarouge ; la Terre restant ainsi en « équilibre dynamique ».\r\n\r\nLe demi-grand axe de l’orbite de la Terre autour du Soleil, couramment appelé « distance de la Terre au Soleil », égal à 149 597 870 700 ± 3 m1, est la définition originale de l’unité astronomique (ua). Il faut 8 minutes et 19 secondes pour que la lumière du Soleil parvienne jusqu’à la Terre12.\r\n\r\nLe symbole astronomique et astrologique du Soleil est un cercle avec un point en son centre : ⊙. ', '2021-01-28 21:52:23', 1, 'unnamed.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `the`
--

CREATE TABLE `the` (
  `teaid` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `couleurId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `the`
--

INSERT INTO `the` (`teaid`, `name`, `image`, `description`, `couleurId`) VALUES
(4, 'Thé noir Le Boudoir de l\'Impératrice', '2.jpg', 'Sans aucun doute le plus délicat de nos thés Russes. Son secret, c’est l’accord parfait d’un mélange de thés très soigné et du mariage bergamote et citron vert. Chaque élément compte dans cette recette historique si l’on souhaite obtenir le goût unique qui fait de ce mélange parfumé une grande signature.', 1),
(6, 'Infusion les Doigts de Fée', '4.jpg', 'Face aux gênes récurrentes, une infusion  délicieuse, dans un esprit parfumé de citron Zeste et de cassis fruits. Connue depuis notre Haut Moyen-âge pour ses vertus, la Reine des prés (aussi appelée herbe aux abeilles) est d’une grande douceur et d’un parfait secours pour chasser les douleurs et lutter contre leur réapparition.', 2),
(7, 'Infusion Mangue Fraîche', '5.jpg', 'Cette infusion est un festival de plantes qui donne un mélange doux et frais en bouche grâce à la présence de citronnelle.\r\n\r\nComparable à une eau de fruit naturelle. Ce mélange de plantes est associé à une note de bergamote et une pointe de thé vert matcha qui relève toute en douceur les saveurs.', 2),
(8, 'Infusion Pêche et Carotte', '6.jpg', '\r\nUn duo étonnant de carotte et de pêche pour ce mélange aux couleurs de l\'automne. C\'est comme si vous étiez au milieu d\'un marché de saveurs d\'été et d\'automne en même temps.\r\nCette infusion à la liqueur orangée jaune donne un goût à la tasse fruité avec la présence de la pêche et sucré avec la présence de la carotte, le tout parsemé de citronnelle entre douceur et rondeur... ', 2),
(9, 'Infusion Poids Plume', '7.jpg', 'Succulente boisson minceur à base de maté brésilien et de thé vert combiné aux vertus du romarin et du pissenlit, idéale pour une pause beauté. Ses arômes naturels de mandarine et citron apaisent la faim sans effort.', 2),
(10, 'Infusion après l\'Orage', '8.jpg', ' Le plus connu des mélanges Detox ici dans sa version au carré. L\'alliance de deux matés et d\'un thé vert réhaussée d\'ortie piquante et d\'huile essentielle de citron double distillation. Idéale pour les cures et les réveils difficiles. ', 2),
(11, 'Thé noir Ceylan Dimbula Elephant', '9.jpg', ' Dimbula est un jardin situé sur les hauts plateaux du Sri Lanka. Ces plantations commencent à une altitude de 1400 m. Ce thé est une spécialité unique sur l\'île, ces grandes et longues feuilles sont légèrement creusées et donnent une infusion brun clair à orangé dans la tasse. Elles sont un spectacle à elles seules.\r\nLa liqueur de notre thé noir de Ceylan Dimbula Elephant nous livre une saveur douce et fruitée très agréable. Les plus fins gourmets reconnaîtront sans aucun doute des notes de cerise.  ', 1),
(12, 'Thé blanc Cheveux d\'Ange  ', '10.jpg', ' Un thé d’une infinie finesse, composé d’un thé blanc de Pai Mu tan, d’éclats de fèves de cacao. Délicat, charmant, doux… Un thé gourmand et bien-être, sans sucre, pour se faire plaisir sans modération. .  ', 3),
(13, 'Thé noir Chez Mère Grande ', '11.jpg', 'Mettez les gateaux sur la table et préparez-vous une tasse du thé \"chez mère- grand\". Composé de rose, de rhubarbe et de violette, nous vous garantissons un instant douceur et gourmandise.\r\n\r\nUn visuel fleuri magnifique qui s\'accorde avec les services à thé que l\'on retrouve lors des Tea Time anglais.', 1),
(14, 'Thé blanc Coeur de Dragon', '12.jpg', 'Une réussite esthétique : blancheur des feuilles de thé des neiges, vert tendre des feuilles de bambou, et rouge profond des pétales de grenade. \r\n\r\nUne saveur originale : comme un souffle acidulé sur les cimes enneigées d\'une forêt de bambous.\r\n\r\nDu grand art zen.', 3),
(22, 'Infusion de Chasse l\'Hiver', '13.jpg', 'Une formidable recette dynamisante et tonique pour chasser les coups de fatigue.\r\nDans un esprit de saveurs zestes d’orange & éclats de cannelle, vous profitez de toutes les vertus du cynorhodon, du Lapacho et de la fleur de sureau. Une véritable tisane plaisir, riche et piquante, qu’une pointe de gingembre vient éclairer. Une délicieuse création qui puise sont inspiration dans l\'histoire des plantes des grands continents.', 2),
(23, 'Infusion le Financier de Central Park ', '14.jpg', 'Retrouvez dans la tasse le parfum envoûtant du financier pistache qui vient de sortir du four. Exclusivité gourmande.', 2),
(24, 'Thé noir Fleur de Violette ', '15.jpg', 'Certains se damneraient pour ses parfums que l’on retrouve si bien en confiserie ou dans un bouquet. Notre thé à la violette est une petite merveille. Parsemé de fleurs, il exalte les senteurs sucrées de la fleur de mars. Infusé, vous dégustez sa douceur en fermant les yeux alors que sur vos lèvres se dépose un parfum doux et chaleureux. Un thé que vous savourez seul pour un pur moment de détente florale, ou entre amis pour partager sa gaîté et sa fraîcheur. Le saviez vous ? En phytothérapie, on accorde à la violette des vertus antitussives.', 1),
(25, 'Happy Rooibos ! ', '16.jpg', 'Un formidable rooibos chaleureux pour les fêtes de fin d\'année! Notre création originale est aussi savoureuse que superbe, vous apprécierez et admirerez éclats de cacao, zestes d\'orange, éclats de cardamome, magnifique cannelle...\r\nUn véritable Rooibos à partager pour les fêtes de fin d\'année.', 5),
(26, 'Thé vert Jasmin Bio  ', '17.jpg', 'Le jasmin est depuis toujours associé au thé comme fleur de référence. En Chine, on le consomme exclusivement sur thé vert, pour l’association de fraîcheur qu’il propose. Ce thé incarne l’art de vivre à la Chinoise, associant tradition, plaisir et bien-être.\r\n', 4),
(27, 'Infusion la Sérénité du Pharaon', '18.jpg', 'Infusion de calme et de détente, pour aider à chasser les crises d’angoisse et à retrouver votre sérénité. Toutes les vertus de la camomille, du romarin et de la mélisse, dans un esprit chocolat/orange (éclats de fèves de cacao et écorces de fruits).\r\nPlantes connues pour leurs bienfaits depuis la haute antiquité, vous l’appréciez chaque jour dans un grand moment de détente.', 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `name`, `password`) VALUES
(1, 'simatovic.lucie@gmail.com', 'lucie', '$2a$07$jUEmYdZIgmhchlASoOseIeXC5us0/3nxwwoFadoVEXWXZ/2AjKm.y'),
(2, 'test@test.com', 'test', '$2y$10$Ac.EBReUZmpwPtHgmFDSR.dvPzbWuRXXXr3HJSPL.HKFM5SMhhoza');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `couleur`
--
ALTER TABLE `couleur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `extension`
--
ALTER TABLE `extension`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`newsid`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Index pour la table `the`
--
ALTER TABLE `the`
  ADD PRIMARY KEY (`teaid`),
  ADD KEY `categoryId` (`couleurId`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`(191));

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `couleur`
--
ALTER TABLE `couleur`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `extension`
--
ALTER TABLE `extension`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `game`
--
ALTER TABLE `game`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `newsid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `the`
--
ALTER TABLE `the`
  MODIFY `teaid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `the`
--
ALTER TABLE `the`
  ADD CONSTRAINT `the_ibfk_1` FOREIGN KEY (`couleurId`) REFERENCES `couleur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
