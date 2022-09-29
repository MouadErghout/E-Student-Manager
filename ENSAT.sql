-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 08 juin 2022 à 10:41
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `element_module`
--

CREATE TABLE `element_module` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `designation` varchar(40) DEFAULT NULL,
  `VH` varchar(40) DEFAULT NULL,
  `poids` float DEFAULT NULL CHECK (`poids` > 0 and `poids` <= 100),
  `code_module` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `element_module`
--

INSERT INTO `element_module` (`id`, `code`, `designation`, `VH`, `poids`, `code_module`) VALUES
(1, 'GINF111', 'Analyse numérique', '21h', 1, 'GINF11'),
(2, 'GINF112', 'Statistiques', '21h', 1, 'GINF11'),
(3, 'GINF113', 'Optimisation', '21h', 1, 'GINF11'),
(4, 'GSTR321', 'Protocoles et concepts de routage', '21h', 1, 'GSTR32'),
(5, 'GSTR322', 'Commutation de réseaux local', '21h', 1, 'GSTR32'),
(6, 'GSTR323', 'Technologies WAN', '21h', 1, 'GSTR32');

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

CREATE TABLE `eleve` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `nom` varchar(40) DEFAULT NULL,
  `prenom` varchar(40) DEFAULT NULL,
  `niveau` varchar(20) DEFAULT NULL,
  `code_fil` varchar(20) DEFAULT NULL,
  `login` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `eleve`
--

INSERT INTO `eleve` (`id`, `code`, `nom`, `prenom`, `niveau`, `code_fil`, `login`) VALUES
(20, '12038442', 'BOULOUQAT', 'Jawad', 'GINF1', 'GINF', 'jawad.boulouqat'),
(21, '19345600', 'ERGHOUT', 'Mouad', 'GINF1', 'GINF', 'mouad.erghout'),
(22, '134f45g', 'MAFTOUHI', 'Bilal', 'GINF2', 'GINF', 'bilal.maftouhi'),
(23, '1208087y', 'ERGHOUT', 'Anas', 'GINF2', 'GINF', 'anas.erghout'),
(24, '12986734nh', 'ZAOUI', 'Oussama', 'GSTR1', 'GSTR', 'oussama.zaoui'),
(25, 'BH124354', 'BOULOUQAT', 'Ahmed', 'GSTR1', 'GSTR', 'ahmed.boulouqat'),
(26, 'LK121243', 'ALAMI', 'Saad', 'GINF2', 'GINF', 'saad.alami');

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `designation` varchar(40) DEFAULT NULL,
  `responsable` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`id`, `code`, `designation`, `responsable`) VALUES
(1, 'GINF', 'Génie informatique', 'badir.hasssan'),
(2, 'GSTR', 'Génie des réseaux et télécommunication', 'mariam.tanana');

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `designation` varchar(40) DEFAULT NULL,
  `niveau` varchar(40) DEFAULT NULL,
  `semestre` varchar(20) DEFAULT NULL,
  `code_fil` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`id`, `code`, `designation`, `niveau`, `semestre`, `code_fil`) VALUES
(1, 'GINF11', 'Maths pour l\'ingénieur', 'GINF1', 'S1', 'GINF'),
(2, 'GSTR32', 'Réseaux2', 'GSTR2', 'S1', 'GSTR');

-- --------------------------------------------------------

--
-- Structure de la table `moyenne`
--

CREATE TABLE `moyenne` (
  `id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `code_fil` varchar(20) NOT NULL,
  `niveau` varchar(20) DEFAULT NULL,
  `moyenne` float DEFAULT NULL CHECK (`moyenne` >= 0 and `moyenne` <= 20)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `moyenne`
--

INSERT INTO `moyenne` (`id`, `login`, `code_fil`, `niveau`, `moyenne`) VALUES
(8, 'jawad.boulouqat', 'GINF', 'GINF1', 0),
(9, 'mouad.erghout', 'GINF', 'GINF1', 0),
(10, 'bilal.maftouhi', 'GINF', 'GINF2', 0),
(11, 'anas.erghout', 'GINF', 'GINF2', 0),
(12, 'oussama.zaoui', 'GSTR', 'GSTR1', 0),
(13, 'ahmed.boulouqat', 'GSTR', 'GSTR1', 0),
(14, 'saad.alami', 'GINF', 'GINF2', 0);

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `code_elm_module` varchar(20) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `note` float DEFAULT NULL CHECK (`note` >= 0 and `note` <= 20)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`id`, `login`, `code_elm_module`, `designation`, `note`) VALUES
(99, 'jawad.boulouqat', 'GINF111', 'Analyse numérique', 0),
(100, 'jawad.boulouqat', 'GINF112', 'Statistiques', 0),
(101, 'jawad.boulouqat', 'GINF113', 'Optimisation', 0),
(102, 'jawad.boulouqat', 'GINF121', 'Traitement du signal', 0),
(103, 'jawad.boulouqat', 'GINF122', 'Probalités', 0),
(104, 'jawad.boulouqat', 'GINF131', 'Electronique analogique', 0),
(105, 'jawad.boulouqat', 'GINF132', 'Electronique numerique', 0),
(106, 'jawad.boulouqat', 'GINF141', 'Structure de données / Langage C*', 0),
(107, 'jawad.boulouqat', 'GINF142', 'Programmation Web PHP', 0),
(108, 'jawad.boulouqat', 'GINF151', 'Bases de données relationnelles', 0),
(109, 'jawad.boulouqat', 'GINF152', 'Concepts fondamentaux des réseaux', 0),
(110, 'jawad.boulouqat', 'GINF161', 'Méthodologie de PP', 0),
(111, 'jawad.boulouqat', 'GINF162', 'Développement personnel', 0),
(112, 'jawad.boulouqat', 'GINF163', 'Anglais1 & Espagnol1', 0),
(113, 'jawad.boulouqat', 'GINF211', 'POO en C++', 0),
(114, 'jawad.boulouqat', 'GINF212', 'Programmation web avec PHP 5', 0),
(115, 'jawad.boulouqat', 'GINF221', 'Méthodes de modélisation de BD', 0),
(116, 'jawad.boulouqat', 'GINF222', 'Manipulation et développement des BDR', 0),
(117, 'jawad.boulouqat', 'GINF223', 'Programmation PLSQL', 0),
(118, 'jawad.boulouqat', 'GINF231', 'Recherche Opérationnelle', 0),
(119, 'jawad.boulouqat', 'GINF232', 'Théorie des Graphes', 0),
(120, 'jawad.boulouqat', 'GINF241', 'Protocoles; et adressage des réseaux', 0),
(121, 'jawad.boulouqat', 'GINF242', 'Technologies des réseaux', 0),
(122, 'jawad.boulouqat', 'GINF243', 'TP réseaux(Cisco)', 0),
(123, 'jawad.boulouqat', 'GINF251', 'Micro-architectures des processeurs', 0),
(124, 'jawad.boulouqat', 'GINF252', 'Système dexploitation Linux', 0),
(125, 'jawad.boulouqat', 'GINF253', 'TP assembleur', 0),
(126, 'jawad.boulouqat', 'GINF261', 'Gestion des entreprises 1', 0),
(127, 'jawad.boulouqat', 'GINF262', 'Comptabilité', 0),
(128, 'jawad.boulouqat', 'GINF263', 'Economie 1', 0),
(129, 'mouad.erghout', 'GINF111', 'Analyse numérique', 0),
(130, 'mouad.erghout', 'GINF112', 'Statistiques', 0),
(131, 'mouad.erghout', 'GINF113', 'Optimisation', 0),
(132, 'mouad.erghout', 'GINF121', 'Traitement du signal', 0),
(133, 'mouad.erghout', 'GINF122', 'Probalités', 0),
(134, 'mouad.erghout', 'GINF131', 'Electronique analogique', 0),
(135, 'mouad.erghout', 'GINF132', 'Electronique numerique', 0),
(136, 'mouad.erghout', 'GINF141', 'Structure de données / Langage C*', 0),
(137, 'mouad.erghout', 'GINF142', 'Programmation Web PHP', 0),
(138, 'mouad.erghout', 'GINF151', 'Bases de données relationnelles', 0),
(139, 'mouad.erghout', 'GINF152', 'Concepts fondamentaux des réseaux', 0),
(140, 'mouad.erghout', 'GINF161', 'Méthodologie de PP', 0),
(141, 'mouad.erghout', 'GINF162', 'Développement personnel', 0),
(142, 'mouad.erghout', 'GINF163', 'Anglais1 & Espagnol1', 0),
(143, 'mouad.erghout', 'GINF211', 'POO en C++', 0),
(144, 'mouad.erghout', 'GINF212', 'Programmation web avec PHP 5', 0),
(145, 'mouad.erghout', 'GINF221', 'Méthodes de modélisation de BD', 0),
(146, 'mouad.erghout', 'GINF222', 'Manipulation et développement des BDR', 0),
(147, 'mouad.erghout', 'GINF223', 'Programmation PLSQL', 0),
(148, 'mouad.erghout', 'GINF231', 'Recherche Opérationnelle', 0),
(149, 'mouad.erghout', 'GINF232', 'Théorie des Graphes', 0),
(150, 'mouad.erghout', 'GINF241', 'Protocoles; et adressage des réseaux', 0),
(151, 'mouad.erghout', 'GINF242', 'Technologies des réseaux', 0),
(152, 'mouad.erghout', 'GINF243', 'TP réseaux(Cisco)', 0),
(153, 'mouad.erghout', 'GINF251', 'Micro-architectures des processeurs', 0),
(154, 'mouad.erghout', 'GINF252', 'Système dexploitation Linux', 0),
(155, 'mouad.erghout', 'GINF253', 'TP assembleur', 0),
(156, 'mouad.erghout', 'GINF261', 'Gestion des entreprises 1', 0),
(157, 'mouad.erghout', 'GINF262', 'Comptabilité', 0),
(158, 'mouad.erghout', 'GINF263', 'Economie 1', 0),
(159, 'bilal.maftouhi', 'GINF311', 'Programmation Orientée Objet:Java', 0),
(160, 'bilal.maftouhi', 'GINF312', 'XML&Application', 0),
(161, 'bilal.maftouhi', 'GINF321', 'Assurance contrôle qualité(ISO 9001)', 0),
(162, 'bilal.maftouhi', 'GINF322', 'Cycle de Vie Logiciel et Méthodes agiles', 0),
(163, 'bilal.maftouhi', 'GINF323', 'Maîtrise et optimisation des processus', 0),
(164, 'bilal.maftouhi', 'GINF331', 'Modélisation orienté objet UML', 0),
(165, 'bilal.maftouhi', 'GINF132', 'Interaction Homme Machine', 0),
(166, 'bilal.maftouhi', 'GINF341', 'Optimisation et Qualité de Base de données', 0),
(167, 'bilal.maftouhi', 'GINF342', 'Administration et Sécurité des Bases de données', 0),
(168, 'bilal.maftouhi', 'GINF343', 'Base de données NoSQL', 0),
(169, 'bilal.maftouhi', 'GINF351', 'Administration systèmes', 0),
(170, 'bilal.maftouhi', 'GINF352', 'Programmation systèmes', 0),
(171, 'bilal.maftouhi', 'GINF361', 'Espagnol2, Allemand', 0),
(172, 'bilal.maftouhi', 'GINF362', 'Anglais professionnel', 0),
(173, 'bilal.maftouhi', 'GINF363', 'Techniques de Comminucation', 0),
(174, 'bilal.maftouhi', 'GINF411', 'Introduction à J2EE', 0),
(175, 'bilal.maftouhi', 'GINF412', 'Programmation C#', 0),
(176, 'bilal.maftouhi', 'GINF421', 'Gestion des données complexes', 0),
(177, 'bilal.maftouhi', 'GINF422', 'Gestion des données distribuées', 0),
(178, 'bilal.maftouhi', 'GINF423', 'Cloud Computing& Infogérance', 0),
(179, 'bilal.maftouhi', 'GINF431', 'Traitement dImage', 0),
(180, 'bilal.maftouhi', 'GINF432', 'Vision numérique', 0),
(181, 'bilal.maftouhi', 'GINF433', 'Processus Stochastique', 0),
(182, 'bilal.maftouhi', 'GINF441', 'Programmation Déclarative', 0),
(183, 'bilal.maftouhi', 'GINF442', 'Technique Algorithmique Avancée', 0),
(184, 'bilal.maftouhi', 'GINF451', 'Sécurité des systèmes', 0),
(185, 'bilal.maftouhi', 'GINF452', 'Cryptographie', 0),
(186, 'bilal.maftouhi', 'GINF461', 'Economie&Comtabilité2', 0),
(187, 'bilal.maftouhi', 'GINF462', 'Projets Collectifs & Stages', 0),
(188, 'bilal.maftouhi', 'GINF463', 'Management de Projet', 0),
(189, 'anas.erghout', 'GINF311', 'Programmation Orientée Objet:Java', 0),
(190, 'anas.erghout', 'GINF312', 'XML&Application', 0),
(191, 'anas.erghout', 'GINF321', 'Assurance contrôle qualité(ISO 9001)', 0),
(192, 'anas.erghout', 'GINF322', 'Cycle de Vie Logiciel et Méthodes agiles', 0),
(193, 'anas.erghout', 'GINF323', 'Maîtrise et optimisation des processus', 0),
(194, 'anas.erghout', 'GINF331', 'Modélisation orienté objet UML', 0),
(195, 'anas.erghout', 'GINF132', 'Interaction Homme Machine', 0),
(196, 'anas.erghout', 'GINF341', 'Optimisation et Qualité de Base de données', 0),
(197, 'anas.erghout', 'GINF342', 'Administration et Sécurité des Bases de données', 0),
(198, 'anas.erghout', 'GINF343', 'Base de données NoSQL', 0),
(199, 'anas.erghout', 'GINF351', 'Administration systèmes', 0),
(200, 'anas.erghout', 'GINF352', 'Programmation systèmes', 0),
(201, 'anas.erghout', 'GINF361', 'Espagnol2, Allemand', 0),
(202, 'anas.erghout', 'GINF362', 'Anglais professionnel', 0),
(203, 'anas.erghout', 'GINF363', 'Techniques de Comminucation', 0),
(204, 'anas.erghout', 'GINF411', 'Introduction à J2EE', 0),
(205, 'anas.erghout', 'GINF412', 'Programmation C#', 0),
(206, 'anas.erghout', 'GINF421', 'Gestion des données complexes', 0),
(207, 'anas.erghout', 'GINF422', 'Gestion des données distribuées', 0),
(208, 'anas.erghout', 'GINF423', 'Cloud Computing& Infogérance', 0),
(209, 'anas.erghout', 'GINF431', 'Traitement dImage', 0),
(210, 'anas.erghout', 'GINF432', 'Vision numérique', 0),
(211, 'anas.erghout', 'GINF433', 'Processus Stochastique', 0),
(212, 'anas.erghout', 'GINF441', 'Programmation Déclarative', 0),
(213, 'anas.erghout', 'GINF442', 'Technique Algorithmique Avancée', 0),
(214, 'anas.erghout', 'GINF451', 'Sécurité des systèmes', 0),
(215, 'anas.erghout', 'GINF452', 'Cryptographie', 0),
(216, 'anas.erghout', 'GINF461', 'Economie&Comtabilité2', 0),
(217, 'anas.erghout', 'GINF462', 'Projets Collectifs & Stages', 0),
(218, 'anas.erghout', 'GINF463', 'Management de Projet', 0),
(219, 'oussama.zaoui', 'GSTR111', 'Analyse numérique', 0),
(220, 'oussama.zaoui', 'GSTR112', 'Statistiques', 0),
(221, 'oussama.zaoui', 'GINF113', 'Optimisation', 0),
(222, 'oussama.zaoui', 'GSTR121', 'Traitement du signal', 0),
(223, 'oussama.zaoui', 'GSTR122', 'TP Signal', 0),
(224, 'oussama.zaoui', 'GSTR131', 'Electronique analogique', 0),
(225, 'oussama.zaoui', 'GSTR132', 'Electronique numerique', 0),
(226, 'oussama.zaoui', 'GSTR141', 'Ondes électromagnétiques dans la matière', 0),
(227, 'oussama.zaoui', 'GSTR142', 'Lignes de transmission', 0),
(228, 'oussama.zaoui', 'GSTR151', 'Automatique liniéaire', 0),
(229, 'oussama.zaoui', 'GSTR152', 'Concepts fondamentaux des réseaux', 0),
(230, 'oussama.zaoui', 'GSTR161', 'Méthodologie de PP', 0),
(231, 'oussama.zaoui', 'GSTR162', 'Développement personnel', 0),
(232, 'oussama.zaoui', 'GSTR163', 'Anglais1 & Espagnol1', 0),
(233, 'oussama.zaoui', 'GSTR211', 'Micro-architectures des processeurs ASM', 0),
(234, 'oussama.zaoui', 'GSTR212', 'TP Electronique', 0),
(235, 'oussama.zaoui', 'GSTR221', 'POO(Java)', 0),
(236, 'oussama.zaoui', 'GSTR222', 'Bases de Données & UML', 0),
(237, 'oussama.zaoui', 'GSTR231', 'Recherche Opérationnelle', 0),
(238, 'oussama.zaoui', 'GSTR232', 'Théorie des Graphes', 0),
(239, 'oussama.zaoui', 'GSTR241', 'Protocoles; et adressage des réseaux', 0),
(240, 'oussama.zaoui', 'GSTR242', 'Technologies des réseaux', 0),
(241, 'oussama.zaoui', 'GSTR243', 'TP réseaux(Cisco)', 0),
(242, 'oussama.zaoui', 'GSTR251', 'Commmutation analogiques', 0),
(243, 'oussama.zaoui', 'GSTR252', 'Théorie de lInformation et codage', 0),
(244, 'oussama.zaoui', 'GSTR261', 'Gestion des entreprises 1', 0),
(245, 'oussama.zaoui', 'GSTR262', 'Comptabilité', 0),
(246, 'oussama.zaoui', 'GSTR263', 'Economie 1', 0),
(247, 'ahmed.boulouqat', 'GSTR111', 'Analyse numérique', 0),
(248, 'ahmed.boulouqat', 'GSTR112', 'Statistiques', 0),
(249, 'ahmed.boulouqat', 'GINF113', 'Optimisation', 0),
(250, 'ahmed.boulouqat', 'GSTR121', 'Traitement du signal', 0),
(251, 'ahmed.boulouqat', 'GSTR122', 'TP Signal', 0),
(252, 'ahmed.boulouqat', 'GSTR131', 'Electronique analogique', 0),
(253, 'ahmed.boulouqat', 'GSTR132', 'Electronique numerique', 0),
(254, 'ahmed.boulouqat', 'GSTR141', 'Ondes électromagnétiques dans la matière', 0),
(255, 'ahmed.boulouqat', 'GSTR142', 'Lignes de transmission', 0),
(256, 'ahmed.boulouqat', 'GSTR151', 'Automatique liniéaire', 0),
(257, 'ahmed.boulouqat', 'GSTR152', 'Concepts fondamentaux des réseaux', 0),
(258, 'ahmed.boulouqat', 'GSTR161', 'Méthodologie de PP', 0),
(259, 'ahmed.boulouqat', 'GSTR162', 'Développement personnel', 0),
(260, 'ahmed.boulouqat', 'GSTR163', 'Anglais1 & Espagnol1', 0),
(261, 'ahmed.boulouqat', 'GSTR211', 'Micro-architectures des processeurs ASM', 0),
(262, 'ahmed.boulouqat', 'GSTR212', 'TP Electronique', 0),
(263, 'ahmed.boulouqat', 'GSTR221', 'POO(Java)', 0),
(264, 'ahmed.boulouqat', 'GSTR222', 'Bases de Données & UML', 0),
(265, 'ahmed.boulouqat', 'GSTR231', 'Recherche Opérationnelle', 0),
(266, 'ahmed.boulouqat', 'GSTR232', 'Théorie des Graphes', 0),
(267, 'ahmed.boulouqat', 'GSTR241', 'Protocoles; et adressage des réseaux', 0),
(268, 'ahmed.boulouqat', 'GSTR242', 'Technologies des réseaux', 0),
(269, 'ahmed.boulouqat', 'GSTR243', 'TP réseaux(Cisco)', 0),
(270, 'ahmed.boulouqat', 'GSTR251', 'Commmutation analogiques', 0),
(271, 'ahmed.boulouqat', 'GSTR252', 'Théorie de lInformation et codage', 0),
(272, 'ahmed.boulouqat', 'GSTR261', 'Gestion des entreprises 1', 0),
(273, 'ahmed.boulouqat', 'GSTR262', 'Comptabilité', 0),
(274, 'ahmed.boulouqat', 'GSTR263', 'Economie 1', 0),
(275, 'saad.alami', 'GINF311', 'Programmation Orientée Objet:Java', 0),
(276, 'saad.alami', 'GINF312', 'XML&Application', 0),
(277, 'saad.alami', 'GINF321', 'Assurance contrôle qualité(ISO 9001)', 0),
(278, 'saad.alami', 'GINF322', 'Cycle de Vie Logiciel et Méthodes agiles', 0),
(279, 'saad.alami', 'GINF323', 'Maîtrise et optimisation des processus', 0),
(280, 'saad.alami', 'GINF331', 'Modélisation orienté objet UML', 0),
(281, 'saad.alami', 'GINF132', 'Interaction Homme Machine', 0),
(282, 'saad.alami', 'GINF341', 'Optimisation et Qualité de Base de données', 0),
(283, 'saad.alami', 'GINF342', 'Administration et Sécurité des Bases de données', 0),
(284, 'saad.alami', 'GINF343', 'Base de données NoSQL', 0),
(285, 'saad.alami', 'GINF351', 'Administration systèmes', 0),
(286, 'saad.alami', 'GINF352', 'Programmation systèmes', 0),
(287, 'saad.alami', 'GINF361', 'Espagnol2, Allemand', 0),
(288, 'saad.alami', 'GINF362', 'Anglais professionnel', 0),
(289, 'saad.alami', 'GINF363', 'Techniques de Comminucation', 0),
(290, 'saad.alami', 'GINF411', 'Introduction à J2EE', 0),
(291, 'saad.alami', 'GINF412', 'Programmation C#', 0),
(292, 'saad.alami', 'GINF421', 'Gestion des données complexes', 0),
(293, 'saad.alami', 'GINF422', 'Gestion des données distribuées', 0),
(294, 'saad.alami', 'GINF423', 'Cloud Computing& Infogérance', 0),
(295, 'saad.alami', 'GINF431', 'Traitement dImage', 0),
(296, 'saad.alami', 'GINF432', 'Vision numérique', 0),
(297, 'saad.alami', 'GINF433', 'Processus Stochastique', 0),
(298, 'saad.alami', 'GINF441', 'Programmation Déclarative', 0),
(299, 'saad.alami', 'GINF442', 'Technique Algorithmique Avancée', 0),
(300, 'saad.alami', 'GINF451', 'Sécurité des systèmes', 0),
(301, 'saad.alami', 'GINF452', 'Cryptographie', 0),
(302, 'saad.alami', 'GINF461', 'Economie&Comtabilité2', 0),
(303, 'saad.alami', 'GINF462', 'Projets Collectifs & Stages', 0),
(304, 'saad.alami', 'GINF463', 'Management de Projet', 0);

-- --------------------------------------------------------

--
-- Structure de la table `responsable_filiere`
--

CREATE TABLE `responsable_filiere` (
  `id` int(11) NOT NULL,
  `nom` varchar(40) DEFAULT NULL,
  `prenom` varchar(40) DEFAULT NULL,
  `departement` varchar(200) DEFAULT NULL,
  `login` varchar(20) NOT NULL,
  `code_fil` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `responsable_filiere`
--

INSERT INTO `responsable_filiere` (`id`, `nom`, `prenom`, `departement`, `login`, `code_fil`) VALUES
(6, 'BADIR', 'Hassan', 'InfoMath', 'badir.hassan', 'GINF'),
(8, 'TANANA', 'Mariam', 'Réseaux et Télécommunictaion', 'mariam.tanana', 'GSTR');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `type` varchar(200) DEFAULT NULL CHECK (`type` in ('Admin','Responsable_filiere','Eleve'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `password`, `email`, `type`) VALUES
(1, 'Admin', 'Admin', 'email0', 'Admin'),
(9, 'badir.hassan', '123', 'email1', 'Responsable_filiere'),
(21, 'mariam.tanana', '123', 'mariam.tanana.5@gmail.com', 'Responsable_filiere'),
(32, 'jawad.boulouqat', '123', 'jawad.boulouqat.5@gmail.com', 'Eleve'),
(33, 'mouad.erghout', '123', 'mouad.erghout.5@gmail.com', 'Eleve'),
(34, 'bilal.maftouhi', '123', 'bilal.maftouhi.5@gmail.com', 'Eleve'),
(35, 'anas.erghout', '123', 'anas.erghout.5@gmail.com', 'Eleve'),
(37, 'oussama.zaoui', '123', 'oussama.zaoui.5@gmail.com', 'Eleve'),
(38, 'ahmed.boulouqat', '123', 'ahmed.boulouqat.5@gmail.com', 'Eleve'),
(39, 'saad.alami', '123', 'saad.alami.5@gmail.com', 'Eleve');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `element_module`
--
ALTER TABLE `element_module`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `code_module` (`code_module`);

--
-- Index pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Index pour la table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `code_fil` (`code_fil`);

--
-- Index pour la table `moyenne`
--
ALTER TABLE `moyenne`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login` (`login`),
  ADD KEY `code_fil` (`code_fil`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`,`login`,`code_elm_module`);

--
-- Index pour la table `responsable_filiere`
--
ALTER TABLE `responsable_filiere`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `element_module`
--
ALTER TABLE `element_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `eleve`
--
ALTER TABLE `eleve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `moyenne`
--
ALTER TABLE `moyenne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=305;

--
-- AUTO_INCREMENT pour la table `responsable_filiere`
--
ALTER TABLE `responsable_filiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `element_module`
--
ALTER TABLE `element_module`
  ADD CONSTRAINT `element_module_ibfk_1` FOREIGN KEY (`code_module`) REFERENCES `module` (`code`);

--
-- Contraintes pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD CONSTRAINT `eleve_ibfk_1` FOREIGN KEY (`login`) REFERENCES `utilisateur` (`login`);

--
-- Contraintes pour la table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `module_ibfk_1` FOREIGN KEY (`code_fil`) REFERENCES `filiere` (`code`);

--
-- Contraintes pour la table `moyenne`
--
ALTER TABLE `moyenne`
  ADD CONSTRAINT `moyenne_ibfk_1` FOREIGN KEY (`login`) REFERENCES `eleve` (`login`),
  ADD CONSTRAINT `moyenne_ibfk_2` FOREIGN KEY (`code_fil`) REFERENCES `filiere` (`code`);

--
-- Contraintes pour la table `responsable_filiere`
--
ALTER TABLE `responsable_filiere`
  ADD CONSTRAINT `responsable_filiere_ibfk_1` FOREIGN KEY (`login`) REFERENCES `utilisateur` (`login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
