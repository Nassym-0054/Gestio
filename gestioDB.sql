-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 31, 2020 at 01:58 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestioDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(20) NOT NULL,
  `statut_super` tinyint(1) DEFAULT NULL,
  `nom_admin` varchar(20) DEFAULT NULL,
  `prenom_admin` varchar(20) DEFAULT NULL,
  `email_admin` varchar(50) DEFAULT NULL,
  `fonction` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `statut_super`, `nom_admin`, `prenom_admin`, `email_admin`, `fonction`) VALUES
('ADM#001', NULL, 'ALASSANE', 'Nassym', 'nassym@gmail.com', 'Directeur');

-- --------------------------------------------------------

--
-- Table structure for table `emploi_du_temps`
--

CREATE TABLE `emploi_du_temps` (
  `id_emploi` bigint(20) NOT NULL,
  `jour` date DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  `id_Prof` varchar(20) DEFAULT NULL,
  `id_classe` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `matricule` int(11) NOT NULL,
  `nom_etu` varchar(20) DEFAULT NULL,
  `prenoms_etu` varchar(50) DEFAULT NULL,
  `sexe_etu` varchar(10) DEFAULT NULL,
  `email_etu` varchar(50) DEFAULT NULL,
  `num_tel` varchar(50) DEFAULT NULL,
  `specialite_etu` varchar(255) DEFAULT NULL,
  `niveau_etu_max` varchar(20) DEFAULT NULL,
  `annee_universitaire` varchar(15) DEFAULT NULL,
  `pays_origine` varchar(20) DEFAULT NULL,
  `ville_origine` varchar(20) DEFAULT NULL,
  `date_naiss` date DEFAULT NULL,
  `nom_papa` varchar(20) DEFAULT NULL,
  `prenom_papa` varchar(20) DEFAULT NULL,
  `num_tel_papa` varchar(20) DEFAULT NULL,
  `nom_maman` varchar(20) DEFAULT NULL,
  `prenom_maman` varchar(20) DEFAULT NULL,
  `num_tel_maman` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`matricule`, `nom_etu`, `prenoms_etu`, `sexe_etu`, `email_etu`, `num_tel`, `specialite_etu`, `niveau_etu_max`, `annee_universitaire`, `pays_origine`, `ville_origine`, `date_naiss`, `nom_papa`, `prenom_papa`, `num_tel_papa`, `nom_maman`, `prenom_maman`, `num_tel_maman`) VALUES
(13384921, 'SAIZONOU', 'Waris', 'homme', 'waris@gmail.com', '99082113', 'Sécurité informatique', 'Licence 1', '2019-2020', 'Bénin', 'Porto-Novo', '2020-07-21', 'AKIBO', 'pere', '91821198', 'AKOTEGNON', 'Rosine', '92821198'),
(13384922, 'AKOTENOU', 'Généreux', 'homme', 'fghjk@gmail.com', '99082113', 'Sécurité informatique', 'Licence 2', '2019-2020', 'Bénin', 'sd', '2018-06-20', 'AKOTENOU', 'Serge', '91821198', 'AKOTEGNOU', 'mere', '92821198');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `id_eval` int(11) NOT NULL,
  `note1` int(2) DEFAULT NULL,
  `code_mat` int(20) DEFAULT NULL,
  `matricule` int(20) DEFAULT NULL,
  `note2` int(11) NOT NULL,
  `moyenne` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`id_eval`, `note1`, `code_mat`, `matricule`, `note2`, `moyenne`) VALUES
(25, 12, 2, 13384921, 12, 12),
(26, 13, 2, 13384922, 13, 13),
(27, 14, 1, 13384921, 17, 15),
(28, 13, 1, 13384922, 18, 15);

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `idUti` varchar(255) DEFAULT NULL,
  `pseudo` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`idUti`, `pseudo`, `message`, `date`, `image`) VALUES
(NULL, NULL, 'CECI EST UN TEST', NULL, NULL),
(NULL, NULL, 'OK', NULL, NULL),
(NULL, NULL, 'okok', '2020-07-28 12:40:31', NULL),
(NULL, NULL, 'fqhhuvsd\r\n', '2020-07-30 21:26:54', NULL),
(NULL, NULL, 'sgdhfgh', '2020-07-30 21:28:25', NULL),
(NULL, NULL, 'fvkjh:jl,kl', '2020-07-30 21:32:33', NULL),
(NULL, 'Waris', 'hoho\r\n', NULL, NULL),
(NULL, 'Jeudida', 'coucou', NULL, NULL),
(NULL, 'Jeudida', 'yo', NULL, NULL),
(NULL, 'Jeudida', 'test echo choco bravo', NULL, NULL),
(NULL, 'Jeudida', 'je deborde d\'imagination film est tropje sais @redfox', NULL, NULL),
(NULL, 'Jeudida', 'c\'est encore moi', NULL, NULL),
(NULL, 'Waris', 'test etudiant. maidaive maidaive.', NULL, NULL),
(NULL, 'Nassym', 'coucou', NULL, NULL),
(NULL, 'Nassym', 'ok it work', NULL, NULL),
(NULL, 'Waris', 'test1\r\n', NULL, NULL),
(NULL, 'Jeudida', 'test2', NULL, NULL),
(NULL, 'Nassym', 'test3.fin', NULL, NULL),
(NULL, 'Nassym', 'Fin de la version 1.0 de gestio | ce 30/07/2020 a 00:48', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `historique_cours`
--

CREATE TABLE `historique_cours` (
  `id` int(11) NOT NULL,
  `nom_cours` varchar(255) NOT NULL,
  `date_envoie` datetime NOT NULL,
  `paths` varchar(255) NOT NULL,
  `code_mat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `historique_cours`
--

INSERT INTO `historique_cours` (`id`, `nom_cours`, `date_envoie`, `paths`, `code_mat`) VALUES
(9, 'Recueil d\'epreuves L1-2.pdf', '2020-07-21 13:11:10', 'traitementProf/coursended/Recueil d\'epreuves L1-2.pdf', '1'),
(10, 'Corrigés des exercices.pdf', '2020-07-21 14:10:59', 'traitementProf/coursended/Corrigés des exercices.pdf', '2');

-- --------------------------------------------------------

--
-- Table structure for table `historique_emploi_du_temps`
--

CREATE TABLE `historique_emploi_du_temps` (
  `id` int(11) NOT NULL,
  `date_envoie` datetime NOT NULL,
  `lien` varchar(255) NOT NULL,
  `nom_pdf` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `historique_emploi_du_temps`
--

INSERT INTO `historique_emploi_du_temps` (`id`, `date_envoie`, `lien`, `nom_pdf`) VALUES
(6, '2020-07-21 13:05:06', 'traitementAdmin/schedule_sent/emploi_du_temps.pdf', 'emploi_du_temps.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `image_profil`
--

CREATE TABLE `image_profil` (
  `id` int(11) NOT NULL,
  `lien_photo` varchar(255) DEFAULT NULL,
  `id_user` varchar(255) DEFAULT NULL,
  `date_enregistrement` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image_profil`
--

INSERT INTO `image_profil` (`id`, `lien_photo`, `id_user`, `date_enregistrement`) VALUES
(4, 'traitementProf/prof_image/qJtRSfZrHd3ZUOmsr8gi.PNG', 'PRF#002', '2020-07-24 22:55:15'),
(5, 'traitementProf/prof_image/vmatPEqtxpXOTNLMniu6.jpg', 'PRF#002', '2020-07-24 23:14:36'),
(6, 'traitementProf/prof_image/f1D3jPxIK26kb5whUego.jpg', 'PRF#002', '2020-07-24 23:15:16'),
(9, 'traitement/student_image/vmatPEqtxpXOTNLMniu6.jpg', '13384921', '2020-07-24 23:59:29'),
(13, 'traitementAdmin/admin_image/IMG_20200309_103905_3~2.jpg', 'ADM#001', '2020-07-31 01:27:48');

-- --------------------------------------------------------

--
-- Table structure for table `matiere`
--

CREATE TABLE `matiere` (
  `id_mat` int(20) NOT NULL,
  `nom_mat` varchar(50) DEFAULT NULL,
  `coef` int(2) DEFAULT NULL,
  `UE` varchar(50) DEFAULT NULL,
  `id_prof1` varchar(20) DEFAULT NULL,
  `id_prof2` int(20) DEFAULT NULL,
  `id_prof3` int(20) DEFAULT NULL,
  `id_prof4` int(20) DEFAULT NULL,
  `id_prof5` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matiere`
--

INSERT INTO `matiere` (`id_mat`, `nom_mat`, `coef`, `UE`, `id_prof1`, `id_prof2`, `id_prof3`, `id_prof4`, `id_prof5`) VALUES
(1, 'Analyse', NULL, NULL, 'PRF#001', NULL, NULL, NULL, NULL),
(2, 'Probabilite', NULL, NULL, 'PRF#002', NULL, NULL, NULL, NULL),
(3, 'Algebre Matricielle', NULL, NULL, 'PRF#003', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `niveau_scolaire`
--

CREATE TABLE `niveau_scolaire` (
  `id_classe` int(20) NOT NULL,
  `surnom` varchar(20) NOT NULL,
  `id_respo_1` int(20) NOT NULL,
  `id_respo_2` int(20) NOT NULL,
  `id_respo_3` int(20) NOT NULL,
  `id_respo_4` int(20) NOT NULL,
  `id_respo_5` int(20) NOT NULL,
  `id_respo_6` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `paiement`
--

CREATE TABLE `paiement` (
  `id_paiement` int(20) NOT NULL,
  `matricule` int(20) NOT NULL,
  `ty_paiement` varchar(20) NOT NULL,
  `valeur_paiement` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `professeur`
--

CREATE TABLE `professeur` (
  `id_Prof` varchar(20) NOT NULL,
  `nom_prof` varchar(20) DEFAULT NULL,
  `prenom_prof` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `quota_heure` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professeur`
--

INSERT INTO `professeur` (`id_Prof`, `nom_prof`, `prenom_prof`, `email`, `quota_heure`) VALUES
('PRF#002', 'KPATI', 'Jeudida', 'exauce@gmail.com', 23),
('PRF#003', 'DAVAKAN', 'Jeffrey', 'jeffjosky@gmail.com', 35);

-- --------------------------------------------------------

--
-- Table structure for table `profil_ecole`
--

CREATE TABLE `profil_ecole` (
  `id` int(11) NOT NULL,
  `nom_ecole` varchar(255) NOT NULL,
  `nom_universite` varchar(255) NOT NULL,
  `img_logo` varchar(255) NOT NULL,
  `img_acceuil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profil_ecole`
--

INSERT INTO `profil_ecole` (`id`, `nom_ecole`, `nom_universite`, `img_logo`, `img_acceuil`) VALUES
(8, 'UAC', 'IFRI', 'traitementAdmin/img_profil/logoifri.webp', 'traitementAdmin/img_profil/equipeGestio.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

CREATE TABLE `publication` (
  `id_pub` int(11) NOT NULL,
  `titre_pub` varchar(255) DEFAULT NULL,
  `messages` text DEFAULT NULL,
  `date_envoie` datetime DEFAULT NULL,
  `id_publisher` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publication`
--

INSERT INTO `publication` (`id_pub`, `titre_pub`, `messages`, `date_envoie`, `id_publisher`) VALUES
(10, 'Projet-Probabilité', 'Les projects de fin de semestre sont a rendre le 12/06/20 à 00:00 au mail gestio@support.com', '2020-07-23 22:22:41', 'PRF#002'),
(11, 'REPRISE DES COURS', 'Bonjour Cher apprenants je me dois de vous informer que la repise des cours est prevu pour le 12 Septembre dans l\'enceinte de l\'IFRI. Votre présence est obligatoire dans le respects des normes vestimentaires tels que vous les connaissez. A très bientot.', '2020-07-23 22:25:45', 'ADM#001'),
(13, 'RELEVE DE NOTES', ' Les bulletins du 1er et 2eme semestre sont actuellement disponible au secretariat de l\'IFRI. Les frais de retraits s\'élevent a 500F.', '2020-07-24 00:53:37', 'ADM#001');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_user` int(20) NOT NULL,
  `user_pass` varchar(255) DEFAULT NULL,
  `email_user` varchar(50) DEFAULT NULL,
  `id_admin` varchar(20) DEFAULT NULL,
  `id_prof` varchar(20) DEFAULT NULL,
  `id_etu` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `user_pass`, `email_user`, `id_admin`, `id_prof`, `id_etu`) VALUES
(48, '$2y$10$1aBlfFeDRV1edm9qMwNXiu4Luxs.hDkQNrQ.NtxRsu2DnclBjZFLG', NULL, 'ADM#015', NULL, NULL),
(49, '$2y$10$yImXTUWw2cdN3BZVosxH/uY5iFSQfcOeeBbTTMus5jjQwtJyjLkKm', NULL, 'ADM#016', NULL, NULL),
(50, '$2y$10$8gnCUj8tfMgPkGqdqsvSMetqszEtl01U9VLFXE33uqJNIir8N5mw2', NULL, 'ADM#200', NULL, NULL),
(52, '$2y$10$N9j8Yyo5kdGpACws0EJg/eb8JTof8dCs6pjjox4nAAMrsqoOzZPMO', NULL, NULL, 'PRF#002', NULL),
(53, '$2y$10$AeMnru3zQCiV73hPwhkB8ux7tn6h1Ixl/O./l.4duxfAOBIoabOF2', NULL, NULL, 'PRF#003', NULL),
(54, '$2y$10$As0dNFbk8ZXr.7tCTbbzo.xFLlSvL5BGjkTsxFx8cxJLlMIUwLTPS', NULL, 'ADM#001', NULL, NULL),
(65, '$2y$10$rxq.6FtU1Qb6Y2qcyVqXX.HVH0yNAxG5aECvzAEZ7wAFvlLm4Djd6', NULL, NULL, NULL, '13384921');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `emploi_du_temps`
--
ALTER TABLE `emploi_du_temps`
  ADD PRIMARY KEY (`id_emploi`),
  ADD KEY `id_Prof` (`id_Prof`,`id_classe`),
  ADD KEY `id_classe` (`id_classe`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`matricule`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`id_eval`),
  ADD KEY `code_mat` (`code_mat`,`matricule`),
  ADD KEY `matricule` (`matricule`);

--
-- Indexes for table `historique_cours`
--
ALTER TABLE `historique_cours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `historique_emploi_du_temps`
--
ALTER TABLE `historique_emploi_du_temps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_profil`
--
ALTER TABLE `image_profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`id_mat`),
  ADD KEY `id_prof1` (`id_prof1`,`id_prof2`,`id_prof3`,`id_prof4`,`id_prof5`),
  ADD KEY `id_prof2` (`id_prof2`),
  ADD KEY `id_prof3` (`id_prof3`),
  ADD KEY `id_prof4` (`id_prof4`),
  ADD KEY `id_prof5` (`id_prof5`);

--
-- Indexes for table `niveau_scolaire`
--
ALTER TABLE `niveau_scolaire`
  ADD PRIMARY KEY (`id_classe`),
  ADD KEY `id_respo_1` (`id_respo_1`,`id_respo_2`,`id_respo_3`,`id_respo_4`,`id_respo_5`,`id_respo_6`),
  ADD KEY `id_respo_5` (`id_respo_5`),
  ADD KEY `id_respo_2` (`id_respo_2`),
  ADD KEY `id_respo_6` (`id_respo_6`),
  ADD KEY `id_respo_3` (`id_respo_3`),
  ADD KEY `id_respo_4` (`id_respo_4`);

--
-- Indexes for table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`id_paiement`),
  ADD KEY `matricule` (`matricule`);

--
-- Indexes for table `professeur`
--
ALTER TABLE `professeur`
  ADD PRIMARY KEY (`id_Prof`);

--
-- Indexes for table `profil_ecole`
--
ALTER TABLE `profil_ecole`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id_pub`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_admin` (`id_admin`,`id_prof`,`id_etu`),
  ADD KEY `id_prof` (`id_prof`),
  ADD KEY `id_etu` (`id_etu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emploi_du_temps`
--
ALTER TABLE `emploi_du_temps`
  MODIFY `id_emploi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `id_eval` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `historique_cours`
--
ALTER TABLE `historique_cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `historique_emploi_du_temps`
--
ALTER TABLE `historique_emploi_du_temps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `image_profil`
--
ALTER TABLE `image_profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `profil_ecole`
--
ALTER TABLE `profil_ecole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `publication`
--
ALTER TABLE `publication`
  MODIFY `id_pub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emploi_du_temps`
--
ALTER TABLE `emploi_du_temps`
  ADD CONSTRAINT `emploi_du_temps_ibfk_1` FOREIGN KEY (`id_classe`) REFERENCES `niveau_scolaire` (`id_classe`) ON UPDATE CASCADE;

--
-- Constraints for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `evaluation_ibfk_1` FOREIGN KEY (`code_mat`) REFERENCES `matiere` (`id_mat`) ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluation_ibfk_2` FOREIGN KEY (`matricule`) REFERENCES `etudiant` (`matricule`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
