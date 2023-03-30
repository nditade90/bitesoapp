-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: database:3306
-- Generation Time: Jan 30, 2023 at 09:49 AM
-- Server version: 10.3.35-MariaDB-1:10.3.35+maria~focal
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inkware_biteso`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_collaborateurs`
--

CREATE TABLE `admin_collaborateurs` (
  `usr_id` int(10) UNSIGNED NOT NULL,
  `usr_fname` varchar(255) DEFAULT NULL,
  `usr_lname` varchar(100) DEFAULT NULL,
  `usr_description` text DEFAULT NULL,
  `usr_email` varchar(255) DEFAULT NULL,
  `usr_telephone` varchar(100) DEFAULT NULL,
  `usr_password` varchar(255) DEFAULT NULL,
  `usr_forgotpassword` char(40) DEFAULT NULL,
  `usr_authorized` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `usr_datecreated` datetime NOT NULL,
  `collaborateur_id` tinyint(4) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_collaborateurs`
--

INSERT INTO `admin_collaborateurs` (`usr_id`, `usr_fname`, `usr_lname`, `usr_description`, `usr_email`, `usr_telephone`, `usr_password`, `usr_forgotpassword`, `usr_authorized`, `usr_datecreated`, `collaborateur_id`, `rol_id`) VALUES
(47, 'NDAYIZEYE', 'THADDEE', 'Administrateur principale', 'thaddee@fdnb.bi', '69710958', '$2y$10$DqaaM1X1fpyGPxPxODnLkeWn5BibBwjnZYuUBIywNWt42JYn2VJdy', NULL, 1, '2022-05-11 18:20:17', 1, 1),
(48, 'Hotel', 'ville', 'test', 'thandize@gmail.com', '+25712101020', 'b50b91d81da04da4ab689bf3ec10d389', NULL, 1, '2022-05-11 19:48:48', NULL, 9);

-- --------------------------------------------------------

--
-- Table structure for table `admin_controllers`
--

CREATE TABLE `admin_controllers` (
  `id` int(11) NOT NULL,
  `module` varchar(100) NOT NULL,
  `controller` varchar(100) NOT NULL,
  `table_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_controllers`
--

INSERT INTO `admin_controllers` (`id`, `module`, `controller`, `table_name`) VALUES
(1, 'gr', 'Ayants_droit', 'gr_ayants_droit'),
(2, 'gr', 'Categories', 'gr_categories'),
(3, 'gr', 'Categorie_ayant_droits', 'gr_categorie_ayant_droits'),
(4, 'datas', 'Collines', 'gr_collines'),
(5, 'datas', 'Communes', 'gr_communes'),
(6, 'gr', 'Corps_origine', 'gr_corps_origine'),
(7, 'gr', 'Departements', 'gr_departements'),
(8, 'gr', 'Documents_joints', 'gr_documents_joints'),
(9, 'datas', 'Etat_civil', 'gr_etat_civil'),
(10, 'datas', 'Ethnies', 'gr_ethnies'),
(11, 'gr', 'Fiche_carriere', 'gr_fiche_carriere'),
(12, 'gr', 'Fiche_identification', 'gr_fiche_identification'),
(13, 'gr', 'Fonctions', 'gr_fonctions'),
(14, 'gr', 'Grades', 'gr_grades'),
(15, 'gr', 'Groupes_sanguin', 'gr_groupes_sanguin'),
(16, 'gr', 'Historique_grades', 'gr_historique_grades'),
(17, 'gr', 'Historique_situations', 'gr_historique_situations'),
(18, 'gr', 'Niveaux_formation', 'gr_niveaux_formation'),
(19, 'datas', 'Pays', 'gr_pays'),
(20, 'gr', 'Promotions', 'gr_promotions'),
(21, 'datas', 'Provinces', 'gr_provinces'),
(22, 'datas', 'Religions', 'gr_religions'),
(23, 'gr', 'Services', 'gr_services'),
(24, 'datas', 'Sexes', 'gr_sexes'),
(25, 'gr', 'Situations', 'gr_situations'),
(26, 'gr', 'Sous_categories', 'gr_sous_categories'),
(27, 'gr', 'Specialites', 'gr_specialites'),
(28, 'gr', 'Statuts', 'gr_statuts'),
(29, 'gr', 'Type_documents', 'gr_type_documents'),
(30, 'gr', 'Unites', 'gr_unites'),
(31, 'mouvement', 'Absences', 'mv_absences'),
(32, 'mouvement', 'Accidents_roulage', 'mv_accidents_roulage'),
(33, 'mouvement', 'Accidents_travail', 'mv_accidents_travail'),
(34, 'mouvement', 'Actions_disciplinaires', 'mv_actions_disciplinaires'),
(35, 'mouvement', 'Avancement_grades', 'mv_avancement_grades'),
(36, 'mouvement', 'Conges', 'mv_conges'),
(37, 'mouvement', 'Cotations', 'mv_cotations'),
(38, 'mouvement', 'Dictinctions_honorifiques', 'mv_dictinctions_honorifiques'),
(39, 'mouvement', 'Dictinctions_honorifiques', 'mv_dictinctions_honorifiques'),
(40, 'mouvement', 'Dossiers_penals', 'mv_dossiers_penals'),
(41, 'mouvement', 'Entrees_en_service', 'mv_entrees_en_service'),
(42, 'mouvement', 'Etudes_faites', 'mv_etudes_faites'),
(43, 'mouvement', 'Exemptions_service', 'mv_exemptions_service'),
(44, 'mouvement', 'Fiche_mutations', 'mv_fiche_mutations'),
(45, 'mouvement', 'Formations_stages', 'mv_formations_stages'),
(46, 'mouvement', 'Missions', 'mv_missions'),
(47, 'mouvement', 'Renforcements', 'mv_renforcements'),
(48, 'mouvement', 'Sorties_service', 'mv_sorties_service'),
(49, 'mouvement', 'Stages', 'mv_stages'),
(50, 'mouvement', 'Types_conges', 'mv_types_conges'),
(51, 'mouvement', 'Types_cote', 'mv_types_cote'),
(52, 'mouvement', 'Types_etudes', 'mv_types_etudes'),
(53, 'mouvement', 'Types_infraction', 'mv_types_infraction'),
(54, 'mouvement', 'Types_missions', 'mv_types_missions'),
(55, 'mouvement', 'Types_peine', 'mv_types_peine'),
(56, 'mouvement', 'Types_punition', 'mv_types_punition'),
(57, 'mouvement', 'Types_renforcement', 'mv_types_renforcement'),
(58, 'mouvement', 'Types_sortie_service', 'mv_types_sortie_service'),
(59, 'mouvement', 'Type_distiction_honorifiques', 'mv_type_distiction_honorifiques'),
(60, 'mouvement', 'Unites_nbre', 'mv_unites_nbre');

-- --------------------------------------------------------

--
-- Table structure for table `admin_permissions`
--

CREATE TABLE `admin_permissions` (
  `per_id` int(10) UNSIGNED NOT NULL,
  `per_code` varchar(255) NOT NULL,
  `per_descr` varchar(100) DEFAULT NULL,
  `per_active` tinyint(4) NOT NULL DEFAULT 1,
  `per_datecreated` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_permissions`
--

INSERT INTO `admin_permissions` (`per_id`, `per_code`, `per_descr`, `per_active`, `per_datecreated`) VALUES
(31, 'Permission/index', 'Gestion des permissions', 2, '2022-05-11 19:28:28'),
(32, 'Role/index', 'Gestion des roles', 1, '2022-05-11 19:58:58');

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles`
--

CREATE TABLE `admin_roles` (
  `rol_id` int(10) UNSIGNED NOT NULL,
  `rol_code` varchar(255) NOT NULL,
  `rol_description` varchar(100) DEFAULT NULL,
  `rol_active` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `rol_datecreated` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_roles`
--

INSERT INTO `admin_roles` (`rol_id`, `rol_code`, `rol_description`, `rol_active`, `rol_datecreated`) VALUES
(9, 'Admin', 'Administrateur Systeme', 1, '2022-05-12 18:19:45'),
(10, 'Secretaire du systeme', 'Secretaire du systeme', 1, '2022-05-11 19:58:58');

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles_permissions`
--

CREATE TABLE `admin_roles_permissions` (
  `rol_per_id` int(10) UNSIGNED NOT NULL,
  `rol_id` int(10) UNSIGNED NOT NULL,
  `per_id` int(10) UNSIGNED NOT NULL,
  `rol_per_datecreated` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_roles_permissions`
--

INSERT INTO `admin_roles_permissions` (`rol_per_id`, `rol_id`, `per_id`, `rol_per_datecreated`) VALUES
(87, 9, 32, '2022-05-17 16:15:10'),
(89, 10, 32, '2022-05-17 16:15:18'),
(86, 9, 31, '2022-05-17 16:15:10');

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `usr_id` int(10) UNSIGNED NOT NULL,
  `usr_fname` varchar(255) DEFAULT NULL,
  `usr_lname` varchar(100) DEFAULT NULL,
  `usr_description` text DEFAULT NULL,
  `usr_email` varchar(255) DEFAULT NULL,
  `usr_telephone` varchar(100) DEFAULT NULL,
  `usr_password` varchar(255) DEFAULT NULL,
  `usr_forgotpassword` char(40) DEFAULT NULL,
  `usr_authorized` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `usr_datecreated` datetime NOT NULL,
  `collaborateur_id` tinyint(4) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`usr_id`, `usr_fname`, `usr_lname`, `usr_description`, `usr_email`, `usr_telephone`, `usr_password`, `usr_forgotpassword`, `usr_authorized`, `usr_datecreated`, `collaborateur_id`, `rol_id`) VALUES
(47, 'Administrator', 'Admin', 'Administrateur principale', 'admin@fdnb.bi', '69710958', '$2y$10$DqaaM1X1fpyGPxPxODnLkeWn5BibBwjnZYuUBIywNWt42JYn2VJdy', NULL, 1, '2022-05-11 18:20:17', 1, 1),
(48, 'Hotel', 'ville', 'test', 'thandize@gmail.com', '+25712101020', 'b50b91d81da04da4ab689bf3ec10d389', NULL, 1, '2022-05-11 19:48:48', NULL, 9),
(49, 'CIZA', 'Marc', 'test de description', 'thaddee@tic.bi', '79710958', 'ce809ac07000578fc5be7a623faa69ae', NULL, 1, '2022-06-26 15:56:56', NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('04063572e07c44e6e76de67a7eafa751f66fcfd5', '172.18.0.1', 1671282210, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313238323037343b736974655f6c616e677c733a323a226672223b757365727c733a323a223437223b),
('0b83091d851014be642afeefa46663f869741add', '172.18.0.1', 1673530765, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637333533303736343b736974655f6c616e677c733a323a226672223b),
('3a7b6f4f746dd6f1173d3bbb588027d64289ca8e', '172.18.0.1', 1675070331, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637353037303239383b736974655f6c616e677c733a323a226672223b757365727c733a323a223437223b),
('4cb4e40b4399a9af238fb0693d29201198bf23de', '172.18.0.1', 1671281749, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313238313732343b736974655f6c616e677c733a323a226672223b),
('4cd0ffcef18afade1ba1d004850d92a5b55cfbce', '172.18.0.1', 1671280133, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313238303132353b736974655f6c616e677c733a323a226672223b757365727c733a323a223437223b),
('5d829605b9b4c9be73b17ef743ddd6d15bc0dcb2', '172.18.0.1', 1671280240, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313238303132353b736974655f6c616e677c733a323a226672223b757365727c733a323a223437223b),
('6bc6896302421b5a6f8cab8ee60c06d7a9164cae', '172.18.0.1', 1671280086, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313238303035383b736974655f6c616e677c733a323a226672223b),
('81f7ec9971f3d533dace130b362dbf10c1c33590', '172.18.0.1', 1673529463, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637333532393434323b736974655f6c616e677c733a323a226672223b757365727c733a323a223437223b),
('83f5ea09268d34a5ecf893fe47de926528f9f4ed', '172.18.0.1', 1671282051, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313238313737313b736974655f6c616e677c733a323a226672223b757365727c733a323a223437223b),
('92bd3235a215f841c9b40685381f22ad109a0b48', '172.18.0.1', 1671282467, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313238323339363b736974655f6c616e677c733a323a226672223b757365727c733a323a223437223b),
('a5b2ee9a78d5318ed83727450a77c00fa1e9304a', '172.18.0.1', 1675070963, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637353037303931373b736974655f6c616e677c733a323a226672223b757365727c733a323a223437223b),
('d0a94a2489e56fe60e9bac3a99c03a0f45e19448', '172.18.0.1', 1673591976, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637333539313937343b736974655f6c616e677c733a323a226672223b),
('d3c698bccd2371ea7d61fee4cca78585a319ef62', '172.18.0.1', 1674579754, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637343537393735323b736974655f6c616e677c733a323a226672223b),
('e64ca44fe913780461b706a166d66e34926f8239', '172.18.0.1', 1673532131, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637333533323132343b736974655f6c616e677c733a323a226672223b757365727c733a323a223437223b);

-- --------------------------------------------------------

--
-- Table structure for table `gr_ayants_droit`
--

CREATE TABLE `gr_ayants_droit` (
  `id_ayant_droit` int(11) NOT NULL,
  `id_identification` int(11) NOT NULL,
  `id_categorie_ayant_droit` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenoms` varchar(100) NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `ref_extrait_naissance` varchar(64) DEFAULT NULL,
  `date_marriage` date DEFAULT NULL,
  `ref_extrait_marriage` varchar(64) DEFAULT NULL,
  `date_divorce` date DEFAULT NULL,
  `date_deces` date DEFAULT NULL,
  `ref_cert_deces` varchar(64) DEFAULT NULL,
  `prise_en_charge` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gr_ayants_droit`
--

INSERT INTO `gr_ayants_droit` (`id_ayant_droit`, `id_identification`, `id_categorie_ayant_droit`, `nom`, `prenoms`, `date_naissance`, `ref_extrait_naissance`, `date_marriage`, `ref_extrait_marriage`, `date_divorce`, `date_deces`, `ref_cert_deces`, `prise_en_charge`) VALUES
(1, 1, 2, 'CIZA', 'Math', '2021-09-21', 'RG5', '2022-07-26', 'EXTRAIT', '2022-07-13', '2022-07-18', 'DCS', '1'),
(2, 1, 2, 'Amina', 'Aline', '2021-09-21', 'RG5', '2022-07-26', 'EXTRAIT', '2022-07-13', '2022-07-18', 'DCS', '1'),
(4, 4, 1, 'MAHORO CIZA', 'Jean Chris', '2000-01-20', 'RF1010', '0000-00-00', '', '0000-00-00', '0000-00-00', '', 'Oui'),
(5, 4, 1, ' BUCUMI', 'Jean Floribert', '2000-01-03', 'RF302020', '0000-00-00', '', '0000-00-00', '0000-00-00', '', 'Oui'),
(6, 1, 2, 'THADDEE', 'NDIKUMANA', '2000-02-12', 'EXTR2020', '2003-02-20', 'RF', '2022-01-10', '2012-01-12', 'RF', 'RF');

-- --------------------------------------------------------

--
-- Table structure for table `gr_categories`
--

CREATE TABLE `gr_categories` (
  `id_categorie` int(11) NOT NULL,
  `code_categorie` varchar(8) NOT NULL,
  `nom_categorie` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gr_categories`
--

INSERT INTO `gr_categories` (`id_categorie`, `code_categorie`, `nom_categorie`) VALUES
(1, 'ct_1', 'catégorie 1'),
(2, 'ct_2', 'catégorie 2'),
(5, 'ct_3', 'Categorie 3-9'),
(6, 'ct_4', 'Categorie 6');

-- --------------------------------------------------------

--
-- Table structure for table `gr_categorie_ayant_droits`
--

CREATE TABLE `gr_categorie_ayant_droits` (
  `id_categorie_ayant_droit` int(11) NOT NULL,
  `nom_categorie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gr_categorie_ayant_droits`
--

INSERT INTO `gr_categorie_ayant_droits` (`id_categorie_ayant_droit`, `nom_categorie`) VALUES
(1, 'Categorie 3'),
(2, 'Categorie 1');

-- --------------------------------------------------------

--
-- Table structure for table `gr_collines`
--

CREATE TABLE `gr_collines` (
  `id_colline` int(11) NOT NULL,
  `code_colline` varchar(8) NOT NULL,
  `nom_colline` varchar(64) NOT NULL,
  `id_commune` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gr_collines`
--

INSERT INTO `gr_collines` (`id_colline`, `code_colline`, `nom_colline`, `id_commune`) VALUES
(1, 'c1', 'Colline 1', 1),
(2, 'c2', 'Colline 2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `gr_communes`
--

CREATE TABLE `gr_communes` (
  `id_commune` int(11) NOT NULL,
  `code_commune` varchar(8) NOT NULL,
  `nom_commune` varchar(64) NOT NULL,
  `id_province` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gr_communes`
--

INSERT INTO `gr_communes` (`id_commune`, `code_commune`, `nom_commune`, `id_province`) VALUES
(1, 'c1', 'Commune 1', 1),
(2, 'c2', 'Commune 2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `gr_corps_origine`
--

CREATE TABLE `gr_corps_origine` (
  `id_corps_origine` int(11) NOT NULL,
  `code_corps_origine` varchar(8) NOT NULL,
  `nom_corps_origine` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gr_corps_origine`
--

INSERT INTO `gr_corps_origine` (`id_corps_origine`, `code_corps_origine`, `nom_corps_origine`) VALUES
(1, 'FAB', 'Force Armé Burundaise'),
(2, 'CNDD_FDD', 'CNDD FDD'),
(3, 'FNL', 'PALUPHUTU FNL');

-- --------------------------------------------------------

--
-- Table structure for table `gr_departements`
--

CREATE TABLE `gr_departements` (
  `id_departement` int(11) NOT NULL,
  `code_departement` varchar(8) NOT NULL,
  `nom_departement` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gr_departements`
--

INSERT INTO `gr_departements` (`id_departement`, `code_departement`, `nom_departement`) VALUES
(1, 'Dep_2', 'Depart 1'),
(2, 'Dep_1', 'Depart 2');

-- --------------------------------------------------------

--
-- Table structure for table `gr_documents_joints`
--

CREATE TABLE `gr_documents_joints` (
  `id_document` int(11) NOT NULL,
  `id_type_document` int(11) NOT NULL,
  `id_identification` int(11) NOT NULL,
  `fichier_joint` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gr_etat_civil`
--

CREATE TABLE `gr_etat_civil` (
  `id_etat_civil` int(11) NOT NULL,
  `nom_etat_civil` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gr_etat_civil`
--

INSERT INTO `gr_etat_civil` (`id_etat_civil`, `nom_etat_civil`) VALUES
(2, 'Célibataire'),
(3, 'Divorce'),
(1, 'Mariée');

-- --------------------------------------------------------

--
-- Table structure for table `gr_ethnies`
--

CREATE TABLE `gr_ethnies` (
  `id_ethnie` int(11) NOT NULL,
  `code_ethnie` varchar(8) NOT NULL,
  `nom_ethnie` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gr_ethnies`
--

INSERT INTO `gr_ethnies` (`id_ethnie`, `code_ethnie`, `nom_ethnie`) VALUES
(1, 'HUTU', 'UMUHUTU'),
(2, 'TUTSI', 'UMUTUTSI'),
(3, 'TWA', 'UMUTWAS');

-- --------------------------------------------------------

--
-- Table structure for table `gr_fiche_carriere`
--

CREATE TABLE `gr_fiche_carriere` (
  `id_fiche_carriere` int(11) NOT NULL,
  `id_identification` int(11) NOT NULL DEFAULT 1,
  `id_departement` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `id_unite` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_sous_categorie` int(11) NOT NULL,
  `id_statut` int(11) NOT NULL,
  `id_fonction` int(11) NOT NULL,
  `est_candidat` enum('0','1') NOT NULL DEFAULT '0',
  `code_indemnite_risque` int(11) NOT NULL,
  `est_handicappe` int(11) NOT NULL DEFAULT 0,
  `utilise_mfp` int(11) NOT NULL DEFAULT 0,
  `date_embauche` date NOT NULL,
  `prime_sante` double NOT NULL,
  `salaire_base` double NOT NULL,
  `id_specialite` int(11) NOT NULL,
  `id_niveau_formation` int(11) NOT NULL,
  `niveau_autre` varchar(64) DEFAULT NULL,
  `ref_avancement_grade` varchar(100) NOT NULL,
  `ref_affectation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gr_fiche_carriere`
--

INSERT INTO `gr_fiche_carriere` (`id_fiche_carriere`, `id_identification`, `id_departement`, `id_service`, `id_unite`, `id_categorie`, `id_sous_categorie`, `id_statut`, `id_fonction`, `est_candidat`, `code_indemnite_risque`, `est_handicappe`, `utilise_mfp`, `date_embauche`, `prime_sante`, `salaire_base`, `id_specialite`, `id_niveau_formation`, `niveau_autre`, `ref_avancement_grade`, `ref_affectation`) VALUES
(4, 2, 2, 1, 1, 2, 3, 1, 1, '', 2000, 0, 0, '2022-02-10', 5000, 60000, 1, 8, 'BBB', 'Test', 'RF_100'),
(5, 2, 1, 1, 1, 1, 1, 1, 1, '', 2000, 0, 0, '2022-02-10', 5000, 60000, 2, 2, '', 'Test', 'RF_100'),
(6, 1, 1, 1, 1, 2, 2, 1, 1, '0', 2000, 0, 0, '2022-02-10', 5000, 60000, 2, 2, '', 'Test', 'RF_100'),
(7, 2, 1, 1, 1, 2, 4, 1, 1, '0', 2000, 0, 0, '2022-02-10', 5000, 60000, 1, 2, '', 'Test', 'RF_100'),
(8, 1, 2, 1, 1, 2, 3, 1, 1, '0', 2000, 0, 0, '2022-02-10', 5000, 60000, 1, 2, '', 'Test', 'RF_100'),
(9, 2, 1, 1, 1, 1, 1, 1, 1, '0', 2000, 0, 0, '2022-02-10', 5000, 60000, 2, 2, '', 'Test', 'RF_100'),
(10, 1, 2, 1, 1, 2, 2, 1, 1, '0', 2000, 0, 0, '2022-02-10', 5000, 60000, 2, 2, '', 'Test', 'RF_100'),
(11, 2, 1, 1, 1, 2, 4, 1, 1, '0', 2000, 0, 0, '2022-02-10', 5000, 60000, 1, 2, '', 'Test', 'RF_100'),
(12, 1, 2, 1, 1, 2, 3, 1, 1, '0', 2000, 0, 0, '2022-02-10', 5000, 60000, 1, 2, '', 'Test', 'RF_100'),
(13, 2, 1, 1, 1, 1, 1, 1, 1, '0', 2000, 0, 0, '2022-02-10', 5000, 60000, 2, 2, '', 'Test', 'RF_100'),
(14, 1, 2, 1, 1, 2, 2, 1, 1, '0', 2000, 0, 0, '2022-02-10', 5000, 60000, 2, 2, '', 'Test', 'RF_100'),
(15, 2, 1, 1, 1, 2, 4, 1, 1, '0', 2000, 0, 0, '2022-02-10', 5000, 60000, 1, 2, '', 'Test', 'RF_100'),
(16, 1, 2, 1, 1, 2, 3, 1, 1, '0', 2000, 0, 0, '2022-02-10', 5000, 60000, 1, 2, '', 'Test', 'RF_100'),
(17, 2, 1, 1, 1, 1, 1, 1, 1, '0', 2000, 0, 0, '2022-02-10', 5000, 60000, 2, 2, '', 'Test', 'RF_100'),
(19, 2, 1, 1, 1, 2, 4, 1, 1, '', 2000, 0, 0, '2022-02-10', 5000, 60000, 1, 2, '', 'Test 200', 'RF_100'),
(20, 2, 2, 2, 2, 5, 4, 2, 2, '', 1022, 0, 0, '2000-02-12', 5000, 600000, 1, 2, '', 'Test 200', 'RF85'),
(21, 4, 1, 1, 1, 6, 4, 1, 1, '', 1000, 0, 0, '2003-04-10', 2000, 350000, 1, 5, '', '2', 'RF1010'),
(23, 4, 1, 1, 5, 6, 4, 2, 2, '', 2000, 0, 0, '2000-01-02', 80000, 780000, 2, 1, '', 'AVANCE', 'RF320');

-- --------------------------------------------------------

--
-- Table structure for table `gr_fiche_identification`
--

CREATE TABLE `gr_fiche_identification` (
  `id_identification` int(11) NOT NULL,
  `matricule` varchar(64) NOT NULL,
  `nouveau_matricule` varchar(64) NOT NULL,
  `ancien_matricule` varchar(64) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `photo_psp` varchar(255) NOT NULL,
  `id_sexe` int(11) NOT NULL,
  `id_ethnie` int(11) NOT NULL,
  `id_corps_origine` int(11) NOT NULL,
  `id_etat_civil` int(11) NOT NULL,
  `nombre_enfant` int(11) NOT NULL,
  `conjoin_salarie` enum('0','1') NOT NULL,
  `date_naissance` date NOT NULL,
  `annee_naissance` int(11) NOT NULL,
  `anne_pension_min` int(11) NOT NULL,
  `annee_pension_max` int(11) NOT NULL,
  `id_pays_naissance` int(11) NOT NULL,
  `ville_naissance` varchar(100) NOT NULL,
  `id_colline` int(11) NOT NULL,
  `id_promotion` int(11) NOT NULL,
  `noms_pere` varchar(100) NOT NULL,
  `noms_mere` varchar(100) NOT NULL,
  `numero_inss` varchar(64) NOT NULL,
  `numero_mfp` varchar(64) NOT NULL,
  `numero_psp` varchar(64) NOT NULL,
  `id_religion` int(11) NOT NULL,
  `id_groupe_sanguin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gr_fiche_identification`
--

INSERT INTO `gr_fiche_identification` (`id_identification`, `matricule`, `nouveau_matricule`, `ancien_matricule`, `id_categorie`, `nom`, `prenom`, `telephone`, `email`, `photo_psp`, `id_sexe`, `id_ethnie`, `id_corps_origine`, `id_etat_civil`, `nombre_enfant`, `conjoin_salarie`, `date_naissance`, `annee_naissance`, `anne_pension_min`, `annee_pension_max`, `id_pays_naissance`, `ville_naissance`, `id_colline`, `id_promotion`, `noms_pere`, `noms_mere`, `numero_inss`, `numero_mfp`, `numero_psp`, `id_religion`, `id_groupe_sanguin`) VALUES
(1, '520', 'acf4', 'a', 1, 'CIZA', 'Aline', NULL, NULL, 'AFDE', 2, 1, 2, 1, 2, '1', '2022-06-02', 2002, 2, 1, 1, 'buja', 1, 1, 'AFREW', 'FDR3W', 'AF12', 'af2', 'adsv1', 2, 2),
(2, '7852', 'acfcs', 'a', 1, 'Mahoro', 'Eric', NULL, NULL, 'AFDE', 2, 2, 2, 1, 2, '1', '2022-06-02', 2002, 2, 1, 1, 'buja', 1, 1, 'AFREW', 'FDR3W', 'AF', 'af', 'adsv', 2, 2),
(3, 'MAT2022', 'M2020', '2020', 5, 'CIZA', 'Aline', NULL, NULL, '', 2, 1, 2, 2, 1, '', '1998-02-10', 1998, 2040, 2052, 1, 'BUJUMBURA', 1, 1, 'PERE', 'MERE', '1212', '10', '20', 1, 3),
(4, 'MAT202', 'AN232020', '635210', 5, 'MAHORO', 'Eric', NULL, NULL, '', 1, 3, 1, 2, 1, '0', '1992-01-02', 1992, 2030, 2033, 1, 'BUTANUKA', 1, 1, 'MAHORO Hilaire', 'MARARO Anitha', '2020', '3020', '1230', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `gr_fonctions`
--

CREATE TABLE `gr_fonctions` (
  `id_fonction` int(11) NOT NULL,
  `code_fonction` varchar(8) NOT NULL,
  `nom_fonction` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gr_fonctions`
--

INSERT INTO `gr_fonctions` (`id_fonction`, `code_fonction`, `nom_fonction`) VALUES
(1, 'fn1', 'Fonction 1'),
(2, 'fn2', 'Fonction 2');

-- --------------------------------------------------------

--
-- Table structure for table `gr_grades`
--

CREATE TABLE `gr_grades` (
  `id_grade` int(11) NOT NULL,
  `code_grade` varchar(8) NOT NULL,
  `nom_grade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gr_grades`
--

INSERT INTO `gr_grades` (`id_grade`, `code_grade`, `nom_grade`) VALUES
(1, 'lt_cl', 'Lieutenant-Colonel '),
(2, 'Col', 'Colonel');

-- --------------------------------------------------------

--
-- Table structure for table `gr_groupes_sanguin`
--

CREATE TABLE `gr_groupes_sanguin` (
  `id_gpe_sanguin` int(11) NOT NULL,
  `nom_gpe_sanguin` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gr_groupes_sanguin`
--

INSERT INTO `gr_groupes_sanguin` (`id_gpe_sanguin`, `nom_gpe_sanguin`) VALUES
(1, 'A+'),
(2, 'A-'),
(3, 'B+'),
(5, 'O+');

-- --------------------------------------------------------

--
-- Table structure for table `gr_historique_grades`
--

CREATE TABLE `gr_historique_grades` (
  `id_grade` int(11) NOT NULL,
  `id_identification` int(11) NOT NULL,
  `date_grade` date NOT NULL,
  `ref_avancement` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gr_historique_situations`
--

CREATE TABLE `gr_historique_situations` (
  `id_historique` int(11) NOT NULL,
  `id_situation` int(11) NOT NULL,
  `id_identification` int(11) NOT NULL,
  `date_debut` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_fin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `observation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gr_historique_situations`
--

INSERT INTO `gr_historique_situations` (`id_historique`, `id_situation`, `id_identification`, `date_debut`, `date_fin`, `observation`) VALUES
(1, 4, 1, '2022-08-29 13:28:28', '2022-08-30 13:28:28', 'Test observation 10'),
(2, 1, 1, '2022-01-01 00:00:00', '2022-04-01 00:00:00', 'Autre test de validation'),
(5, 2, 3, '2022-02-01 00:00:00', '2022-03-01 00:00:00', 'Tttt'),
(7, 4, 1, '2022-02-01 00:00:00', '2022-03-01 00:00:00', 'Test mardi'),
(10, 4, 1, '2003-10-21 00:00:00', '2004-12-02 00:00:00', 'P10 Autre observation d&#039;un autre test'),
(11, 2, 1, '2003-10-21 00:00:00', '2004-12-02 00:00:00', 'Test'),
(12, 1, 4, '2022-02-01 00:00:00', '2022-03-01 00:00:00', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `gr_niveaux_formation`
--

CREATE TABLE `gr_niveaux_formation` (
  `id_niveau_formation` int(11) NOT NULL,
  `code_niveau_formation` varchar(8) NOT NULL,
  `nom_niveau_formation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gr_niveaux_formation`
--

INSERT INTO `gr_niveaux_formation` (`id_niveau_formation`, `code_niveau_formation`, `nom_niveau_formation`) VALUES
(1, 'n1', 'Doctorat'),
(2, 'n2', 'Master'),
(3, 'n3', 'Bachelier/Licence'),
(4, 'n4', 'A1'),
(5, 'n5', 'Secondaire'),
(6, 'n6', 'Fondementaire'),
(7, 'n7', 'Primaire'),
(8, 'n8', 'Autre');

-- --------------------------------------------------------

--
-- Table structure for table `gr_pays`
--

CREATE TABLE `gr_pays` (
  `id_pays` int(11) NOT NULL,
  `code_pays` varchar(8) NOT NULL,
  `nom_pays` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gr_pays`
--

INSERT INTO `gr_pays` (`id_pays`, `code_pays`, `nom_pays`) VALUES
(1, 'bdi', 'Burundi'),
(2, 'rdc', 'RDC');

-- --------------------------------------------------------

--
-- Table structure for table `gr_promotions`
--

CREATE TABLE `gr_promotions` (
  `id_promotion` int(11) NOT NULL,
  `nom_promotion` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gr_promotions`
--

INSERT INTO `gr_promotions` (`id_promotion`, `nom_promotion`) VALUES
(1, 'Promotion 1'),
(4, 'Promotion 124'),
(5, 'Promotion 4');

-- --------------------------------------------------------

--
-- Table structure for table `gr_provinces`
--

CREATE TABLE `gr_provinces` (
  `id_province` int(11) NOT NULL,
  `code_province` varchar(8) NOT NULL,
  `nom_province` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gr_provinces`
--

INSERT INTO `gr_provinces` (`id_province`, `code_province`, `nom_province`) VALUES
(1, 'b', 'BUBANZA'),
(2, 'c', 'CIBITOKE');

-- --------------------------------------------------------

--
-- Table structure for table `gr_religions`
--

CREATE TABLE `gr_religions` (
  `id_religion` int(11) NOT NULL,
  `nom_religion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gr_religions`
--

INSERT INTO `gr_religions` (`id_religion`, `nom_religion`) VALUES
(1, 'CATHO'),
(2, 'BAPT');

-- --------------------------------------------------------

--
-- Table structure for table `gr_services`
--

CREATE TABLE `gr_services` (
  `id_service` int(11) NOT NULL,
  `code_service` varchar(8) NOT NULL,
  `nom_service` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gr_services`
--

INSERT INTO `gr_services` (`id_service`, `code_service`, `nom_service`) VALUES
(1, 'Ser_1', 'Service 1'),
(2, 'Serv_2', 'Service 2');

-- --------------------------------------------------------

--
-- Table structure for table `gr_sexes`
--

CREATE TABLE `gr_sexes` (
  `id_sexe` int(11) NOT NULL,
  `code_sexe` varchar(8) NOT NULL,
  `nom_sexe` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gr_sexes`
--

INSERT INTO `gr_sexes` (`id_sexe`, `code_sexe`, `nom_sexe`) VALUES
(1, 'H', 'Homme'),
(2, 'F', 'Femme');

-- --------------------------------------------------------

--
-- Table structure for table `gr_situations`
--

CREATE TABLE `gr_situations` (
  `id_situation` int(11) NOT NULL,
  `nom_situation` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gr_situations`
--

INSERT INTO `gr_situations` (`id_situation`, `nom_situation`) VALUES
(1, 'SItuation 1'),
(2, 'SItuation 2'),
(4, 'SItuation 3'),
(6, 'Actif');

-- --------------------------------------------------------

--
-- Table structure for table `gr_sous_categories`
--

CREATE TABLE `gr_sous_categories` (
  `id_sous_categorie` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `code_sous_categorie` varchar(8) NOT NULL,
  `nom_sous_categorie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gr_sous_categories`
--

INSERT INTO `gr_sous_categories` (`id_sous_categorie`, `id_categorie`, `code_sous_categorie`, `nom_sous_categorie`) VALUES
(1, 1, 'sct1', 'Sous categorie1'),
(2, 2, 'sct2', 'Sous categorie 2'),
(3, 2, 'sct4', 'Sous categorie 3'),
(4, 2, 'sct3', 'Sous categorie 3'),
(6, 2, 'sct6', 'Sous categorie 6');

-- --------------------------------------------------------

--
-- Table structure for table `gr_specialites`
--

CREATE TABLE `gr_specialites` (
  `id_specialite` int(11) NOT NULL,
  `code_specialite` varchar(8) NOT NULL,
  `nom_specialite` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gr_specialites`
--

INSERT INTO `gr_specialites` (`id_specialite`, `code_specialite`, `nom_specialite`) VALUES
(1, 'sp1', 'Spécialiste 1'),
(2, 'sp2', 'Spécialiste 2');

-- --------------------------------------------------------

--
-- Table structure for table `gr_statuts`
--

CREATE TABLE `gr_statuts` (
  `id_statut` int(11) NOT NULL,
  `code_statut` varchar(8) NOT NULL,
  `nom_statut` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gr_statuts`
--

INSERT INTO `gr_statuts` (`id_statut`, `code_statut`, `nom_statut`) VALUES
(1, 'st1', 'Statut 1'),
(2, 'st2', 'Statut 2');

-- --------------------------------------------------------

--
-- Table structure for table `gr_type_documents`
--

CREATE TABLE `gr_type_documents` (
  `id_type_document` int(11) NOT NULL,
  `code_type_document` varchar(8) NOT NULL,
  `nom_type_document` varchar(64) NOT NULL,
  `description` varchar(126) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gr_type_documents`
--

INSERT INTO `gr_type_documents` (`id_type_document`, `code_type_document`, `nom_type_document`, `description`) VALUES
(1, 'ATT', 'Attestations', 'Attestations'),
(2, 'DIP', 'Diplôme', 'Diplôme');

-- --------------------------------------------------------

--
-- Table structure for table `gr_unites`
--

CREATE TABLE `gr_unites` (
  `id_unite` int(11) NOT NULL,
  `code_unite` varchar(8) NOT NULL,
  `nom_unite` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gr_unites`
--

INSERT INTO `gr_unites` (`id_unite`, `code_unite`, `nom_unite`) VALUES
(1, 'Unite_1', 'Unite 1'),
(2, 'Unite2', 'Unite deux'),
(3, 'unite10', 'Unite dix'),
(5, 'UNS', 'Unite specialise');

-- --------------------------------------------------------

--
-- Table structure for table `mv_absences`
--

CREATE TABLE `mv_absences` (
  `id_absence` int(11) NOT NULL,
  `id_identification` int(11) DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `nb_jours` int(11) DEFAULT NULL,
  `nb_heures` int(11) DEFAULT NULL,
  `est_justifie` varchar(10) DEFAULT NULL,
  `justification` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mv_absences`
--

INSERT INTO `mv_absences` (`id_absence`, `id_identification`, `date_debut`, `date_fin`, `nb_jours`, `nb_heures`, `est_justifie`, `justification`) VALUES
(2, 1, '2022-01-01', '2022-12-02', 20, 32, 'Oui', 'Autre'),
(3, 1, '2003-10-21', '2003-12-02', 20, 200, 'Non', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `mv_accidents_roulage`
--

CREATE TABLE `mv_accidents_roulage` (
  `id_accident` int(11) NOT NULL,
  `id_identification` int(11) DEFAULT NULL,
  `date_accident` date DEFAULT NULL,
  `degat_charge` varchar(45) DEFAULT NULL,
  `degat_cause` varchar(45) DEFAULT NULL,
  `responsable` varchar(45) DEFAULT NULL,
  `observation` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mv_accidents_roulage`
--

INSERT INTO `mv_accidents_roulage` (`id_accident`, `id_identification`, `date_accident`, `degat_charge`, `degat_cause`, `responsable`, `observation`) VALUES
(1, 1, '2022-08-10', 'Degat test pour une demonstration', 'DEGAT cause par un conard', 'King kong', 'Observation de test for Monday1'),
(3, 1, '2022-03-30', 'Charge de degat 1', 'Cause de degat 20', 'Responsable King 10', 'Observation de test for Monday1');

-- --------------------------------------------------------

--
-- Table structure for table `mv_accidents_travail`
--

CREATE TABLE `mv_accidents_travail` (
  `id_accident` int(11) NOT NULL,
  `id_identification` int(11) DEFAULT NULL,
  `date_accident` date DEFAULT NULL,
  `nature` varchar(45) DEFAULT NULL,
  `decision` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mv_accidents_travail`
--

INSERT INTO `mv_accidents_travail` (`id_accident`, `id_identification`, `date_accident`, `nature`, `decision`) VALUES
(1, 1, '2022-08-25', 'Fragiture au niiveau du pied', 'Conge maladie 20 mois'),
(4, 1, '2022-12-07', 'Blessure', 'Conge de 10 Jours');

-- --------------------------------------------------------

--
-- Table structure for table `mv_actions_disciplinaires`
--

CREATE TABLE `mv_actions_disciplinaires` (
  `id_action_disciplinaire` int(11) NOT NULL,
  `date_ouverture` date DEFAULT NULL,
  `id_type_punition` int(11) DEFAULT NULL,
  `nb_jours_punition` int(11) DEFAULT NULL,
  `date_cloture` date DEFAULT NULL,
  `ref_cloture` varchar(45) DEFAULT NULL,
  `date_levee` date DEFAULT NULL,
  `autorite_decision` varchar(255) DEFAULT NULL,
  `ref_levee` varchar(45) DEFAULT NULL,
  `observation` text DEFAULT NULL,
  `id_identification` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mv_actions_disciplinaires`
--

INSERT INTO `mv_actions_disciplinaires` (`id_action_disciplinaire`, `date_ouverture`, `id_type_punition`, `nb_jours_punition`, `date_cloture`, `ref_cloture`, `date_levee`, `autorite_decision`, `ref_levee`, `observation`, `id_identification`) VALUES
(1, '2022-08-01', 1, 10, '2022-08-15', 'RFP10', '2022-08-16', 'Chef de poste', 'RFP22', 'test observation', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mv_avancement_grades`
--

CREATE TABLE `mv_avancement_grades` (
  `id_avancement_grade` int(11) NOT NULL,
  `id_identification` int(11) DEFAULT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `id_ancien_grade` int(11) DEFAULT NULL,
  `id_nouveau_grade` int(11) DEFAULT NULL,
  `date_avancement` date DEFAULT NULL,
  `ancien_salaire_base` double DEFAULT NULL,
  `nouveau_salaire_base` double DEFAULT NULL,
  `ref_avancement` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mv_avancement_grades`
--

INSERT INTO `mv_avancement_grades` (`id_avancement_grade`, `id_identification`, `id_categorie`, `id_ancien_grade`, `id_nouveau_grade`, `date_avancement`, `ancien_salaire_base`, `nouveau_salaire_base`, `ref_avancement`) VALUES
(1, 1, 1, 1, 2, '2022-08-01', 600000, 720000, 'Ref202211');

-- --------------------------------------------------------

--
-- Table structure for table `mv_conges`
--

CREATE TABLE `mv_conges` (
  `id_conge` int(11) NOT NULL,
  `id_identification` int(11) DEFAULT NULL,
  `id_type_conge` int(11) DEFAULT NULL,
  `exercice_annee` int(11) DEFAULT NULL,
  `nb_jours_sollicites` double DEFAULT NULL,
  `nb_jours_accordes` double DEFAULT NULL,
  `nb_jours_effectifs` double DEFAULT NULL,
  `nb_jours_prevus` double DEFAULT NULL,
  `nb_jours_disponibles` double DEFAULT NULL,
  `date_depart` date DEFAULT NULL,
  `date_retour` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mv_cotations`
--

CREATE TABLE `mv_cotations` (
  `id_cotation` int(11) NOT NULL,
  `id_identification` int(11) DEFAULT NULL,
  `id_type_cote` int(11) DEFAULT NULL,
  `code` varchar(45) NOT NULL,
  `annee` int(11) NOT NULL,
  `points1` double DEFAULT NULL,
  `points2` double DEFAULT NULL,
  `note_obtenue` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mv_cotations`
--

INSERT INTO `mv_cotations` (`id_cotation`, `id_identification`, `id_type_cote`, `code`, `annee`, `points1`, `points2`, `note_obtenue`) VALUES
(1, 1, 2, 'COTE2', 2021, 2.3, 2.6, 2.2),
(2, 4, 2, 'COTE20', 2022, 3.5, 4.2, 10.3),
(3, 4, 1, 'CT32', 2000, 3.6, 3.56, 11);

-- --------------------------------------------------------

--
-- Table structure for table `mv_dictinctions_honorifiques`
--

CREATE TABLE `mv_dictinctions_honorifiques` (
  `id_distinction` int(11) NOT NULL,
  `id_identification` int(11) DEFAULT NULL,
  `id_type_distiction` int(11) DEFAULT NULL,
  `date_distiction` date DEFAULT NULL,
  `ref_distiction` varchar(45) DEFAULT NULL,
  `observations` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mv_dictinctions_honorifiques`
--

INSERT INTO `mv_dictinctions_honorifiques` (`id_distinction`, `id_identification`, `id_type_distiction`, `date_distiction`, `ref_distiction`, `observations`) VALUES
(1, 1, 1, '2022-07-01', 'DECRET1010', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `mv_dossiers_penals`
--

CREATE TABLE `mv_dossiers_penals` (
  `id_dossier_penal` int(11) NOT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `id_type_peine` int(11) DEFAULT NULL,
  `juridiction` varchar(45) DEFAULT NULL,
  `id_type_infraction` int(11) DEFAULT NULL,
  `chef` varchar(45) DEFAULT NULL,
  `nbre` int(11) DEFAULT NULL,
  `id_unite_nbre` int(11) DEFAULT NULL,
  `id_identification` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mv_dossiers_penals`
--

INSERT INTO `mv_dossiers_penals` (`id_dossier_penal`, `date_debut`, `date_fin`, `id_type_peine`, `juridiction`, `id_type_infraction`, `chef`, `nbre`, `id_unite_nbre`, `id_identification`) VALUES
(2, '2022-01-01', '2023-01-01', 1, 'Juridction miltaire', 1, 'Chef de poste', 365, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mv_entrees_en_service`
--

CREATE TABLE `mv_entrees_en_service` (
  `id_entree_service` int(11) NOT NULL,
  `id_identification` int(11) DEFAULT NULL,
  `lieu_entree` varchar(45) DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `duree_contrat` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mv_etudes_faites`
--

CREATE TABLE `mv_etudes_faites` (
  `id_etudes` int(11) NOT NULL,
  `id_identification` int(11) DEFAULT NULL,
  `id_type_etudes` int(11) DEFAULT NULL,
  `etablissement` varchar(64) DEFAULT NULL,
  `periode_etude` varchar(100) DEFAULT NULL,
  `ref_equivalence` varchar(100) DEFAULT NULL,
  `note_obtenue` double DEFAULT NULL,
  `date_obtention` date DEFAULT NULL,
  `id_pays` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mv_etudes_faites`
--

INSERT INTO `mv_etudes_faites` (`id_etudes`, `id_identification`, `id_type_etudes`, `etablissement`, `periode_etude`, `ref_equivalence`, `note_obtenue`, `date_obtention`, `id_pays`) VALUES
(5, 1, 2, 'Universite de Test Baie1', '2001-2022', 'ERQ21', 15.02, '2022-02-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mv_exemptions_service`
--

CREATE TABLE `mv_exemptions_service` (
  `id_exemption` int(11) NOT NULL,
  `id_identification` int(11) DEFAULT NULL,
  `annee` int(11) DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `nb_jours` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mv_exemptions_service`
--

INSERT INTO `mv_exemptions_service` (`id_exemption`, `id_identification`, `annee`, `date_debut`, `date_fin`, `nb_jours`) VALUES
(1, 1, 2021, '2021-06-01', '2021-10-13', 102),
(3, 1, 2021, '2021-03-10', '2021-06-01', 60);

-- --------------------------------------------------------

--
-- Table structure for table `mv_fiche_mutations`
--

CREATE TABLE `mv_fiche_mutations` (
  `id_mutation` int(11) NOT NULL,
  `id_identification` int(11) DEFAULT NULL,
  `date_mutation` date DEFAULT NULL,
  `ref_mutation` varchar(45) DEFAULT NULL,
  `id_ancien_service` int(11) DEFAULT NULL,
  `id_nouveau_service` int(11) DEFAULT NULL,
  `id_ancienne_unite` int(11) DEFAULT NULL,
  `id_nouvelle_unite` int(11) DEFAULT NULL,
  `id_ancienne_fonction` int(11) DEFAULT NULL,
  `id_nouvelle_fonction` int(11) DEFAULT NULL,
  `observations` varchar(200) DEFAULT NULL,
  `bp` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mv_fiche_mutations`
--

INSERT INTO `mv_fiche_mutations` (`id_mutation`, `id_identification`, `date_mutation`, `ref_mutation`, `id_ancien_service`, `id_nouveau_service`, `id_ancienne_unite`, `id_nouvelle_unite`, `id_ancienne_fonction`, `id_nouvelle_fonction`, `observations`, `bp`) VALUES
(1, 1, '2022-08-15', 'MUT2020', 1, 2, 2, 3, 1, 2, 'test', 'BP'),
(3, 1, '2022-08-17', 'RF2020', 1, 2, 3, 3, 2, 2, 'Observations de COP', 'BP102010');

-- --------------------------------------------------------

--
-- Table structure for table `mv_formations_stages`
--

CREATE TABLE `mv_formations_stages` (
  `id_formation_stage` int(11) NOT NULL,
  `id_identification` int(11) DEFAULT NULL,
  `id_stage` int(11) DEFAULT NULL,
  `id_specialite` int(11) DEFAULT NULL,
  `titre_obtenu` varchar(45) DEFAULT NULL,
  `id_pays` int(11) DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `nb_mois` int(11) DEFAULT NULL,
  `montant_prime` double DEFAULT NULL,
  `ref_stage` varchar(45) DEFAULT NULL,
  `note_obtenue` double DEFAULT NULL,
  `date_specialite` date DEFAULT NULL,
  `ref_specialite` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mv_formations_stages`
--

INSERT INTO `mv_formations_stages` (`id_formation_stage`, `id_identification`, `id_stage`, `id_specialite`, `titre_obtenu`, `id_pays`, `date_debut`, `date_fin`, `nb_mois`, `montant_prime`, `ref_stage`, `note_obtenue`, `date_specialite`, `ref_specialite`) VALUES
(1, 1, 1, 1, 'testeur web', 1, '2022-08-01', '2022-08-29', 1, 360, 'RF20', 15, '2022-08-22', 'RFSP'),
(2, 1, 2, 2, 'Certificat One1', 1, '2022-01-01', '2022-03-01', 2, 500, 'REF10', 16.37, '2022-02-03', 'RF1020'),
(3, 1, 1, 2, 'Certificat OFFICE201', 1, '2022-01-01', '2022-12-02', 2, 5600, 'REF10', 10.6, '2022-02-03', 'RF1020');

-- --------------------------------------------------------

--
-- Table structure for table `mv_missions`
--

CREATE TABLE `mv_missions` (
  `id_mission` int(11) NOT NULL,
  `id_identification` int(11) DEFAULT NULL,
  `id_type_mission` int(11) DEFAULT NULL,
  `contingent` varchar(45) DEFAULT NULL,
  `bataillon` varchar(45) DEFAULT NULL,
  `fonction` varchar(45) DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mv_renforcements`
--

CREATE TABLE `mv_renforcements` (
  `id_renforcement` int(11) NOT NULL,
  `id_identification` int(11) DEFAULT NULL,
  `id_type_renforcement` int(11) DEFAULT NULL,
  `ref_renforcement` varchar(45) DEFAULT NULL,
  `titre_obtenu` varchar(45) DEFAULT NULL,
  `id_pays` int(11) DEFAULT NULL,
  `date_depart` date DEFAULT NULL,
  `date_retour` date DEFAULT NULL,
  `nb_jours` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mv_renforcements`
--

INSERT INTO `mv_renforcements` (`id_renforcement`, `id_identification`, `id_type_renforcement`, `ref_renforcement`, `titre_obtenu`, `id_pays`, `date_depart`, `date_retour`, `nb_jours`) VALUES
(1, 1, 2, 'RF1002', 'Obtenu 1', 2, '2022-05-01', '2022-07-31', 80),
(2, 1, 2, 'REF2', 'master Kiki1', 2, '2022-01-20', '2022-05-20', 150);

-- --------------------------------------------------------

--
-- Table structure for table `mv_sorties_service`
--

CREATE TABLE `mv_sorties_service` (
  `id_sortie` int(11) NOT NULL,
  `id_identification` int(11) DEFAULT NULL,
  `lieu_sortie` varchar(45) DEFAULT NULL,
  `date_rappel_arme_debut` date DEFAULT NULL,
  `date_rappel_arme_fin` date DEFAULT NULL,
  `date_sortie` date DEFAULT NULL,
  `id_genre_sortie` int(11) DEFAULT NULL,
  `ref_sortie` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mv_stages`
--

CREATE TABLE `mv_stages` (
  `id_stage` int(11) NOT NULL,
  `titre_stage` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mv_stages`
--

INSERT INTO `mv_stages` (`id_stage`, `titre_stage`) VALUES
(1, 'Stage 1'),
(2, 'Stage 2');

-- --------------------------------------------------------

--
-- Table structure for table `mv_types_conges`
--

CREATE TABLE `mv_types_conges` (
  `id_type_conge` int(11) NOT NULL,
  `type_conge` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mv_types_conges`
--

INSERT INTO `mv_types_conges` (`id_type_conge`, `type_conge`) VALUES
(1, 'Conge de maternite'),
(3, 'Conge annuelles');

-- --------------------------------------------------------

--
-- Table structure for table `mv_types_cote`
--

CREATE TABLE `mv_types_cote` (
  `id_type_cote` int(11) NOT NULL,
  `type_cote` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mv_types_cote`
--

INSERT INTO `mv_types_cote` (`id_type_cote`, `type_cote`) VALUES
(1, 'Cote un'),
(2, 'Cote deux');

-- --------------------------------------------------------

--
-- Table structure for table `mv_types_etudes`
--

CREATE TABLE `mv_types_etudes` (
  `id_types_etudes` int(11) NOT NULL,
  `type_etudes` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mv_types_etudes`
--

INSERT INTO `mv_types_etudes` (`id_types_etudes`, `type_etudes`) VALUES
(1, 'Haut niveau'),
(2, 'Bas niveau'),
(3, 'Master'),
(4, 'Doctorat');

-- --------------------------------------------------------

--
-- Table structure for table `mv_types_infraction`
--

CREATE TABLE `mv_types_infraction` (
  `id_type_infraction` int(11) NOT NULL,
  `code_infraction` varchar(45) DEFAULT NULL,
  `nom_infraction` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mv_types_infraction`
--

INSERT INTO `mv_types_infraction` (`id_type_infraction`, `code_infraction`, `nom_infraction`) VALUES
(1, 'INF1', 'Vol'),
(2, 'P2', 'Viol');

-- --------------------------------------------------------

--
-- Table structure for table `mv_types_missions`
--

CREATE TABLE `mv_types_missions` (
  `id_type_mission` int(11) NOT NULL,
  `type_mission` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mv_types_missions`
--

INSERT INTO `mv_types_missions` (`id_type_mission`, `type_mission`) VALUES
(1, 'Mission Amissom'),
(2, 'Formation miltaire');

-- --------------------------------------------------------

--
-- Table structure for table `mv_types_peine`
--

CREATE TABLE `mv_types_peine` (
  `id_type_peine` int(11) NOT NULL,
  `code_type_peine` varchar(45) DEFAULT NULL,
  `nom_type_peine` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mv_types_peine`
--

INSERT INTO `mv_types_peine` (`id_type_peine`, `code_type_peine`, `nom_type_peine`) VALUES
(1, 'Pn1', 'Prison 10 ans'),
(2, 'pn2', 'Prison 20 ans'),
(3, 'PN', 'Peine 5 ans');

-- --------------------------------------------------------

--
-- Table structure for table `mv_types_punition`
--

CREATE TABLE `mv_types_punition` (
  `id_type_punition` int(11) NOT NULL,
  `code_type_punition` varchar(45) DEFAULT NULL,
  `nom_type_punition` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mv_types_punition`
--

INSERT INTO `mv_types_punition` (`id_type_punition`, `code_type_punition`, `nom_type_punition`) VALUES
(1, 'P1', 'Pinition 15 Jours'),
(4, 'PN150', 'Punition de 15 Jours 1');

-- --------------------------------------------------------

--
-- Table structure for table `mv_types_renforcement`
--

CREATE TABLE `mv_types_renforcement` (
  `id_type_renforcement` int(11) NOT NULL,
  `type_renforcement` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mv_types_renforcement`
--

INSERT INTO `mv_types_renforcement` (`id_type_renforcement`, `type_renforcement`) VALUES
(1, 'renforcement un'),
(2, 'Renforcement deux');

-- --------------------------------------------------------

--
-- Table structure for table `mv_types_sortie_service`
--

CREATE TABLE `mv_types_sortie_service` (
  `id_type_sortie` int(11) NOT NULL,
  `type_sortie_service` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mv_types_sortie_service`
--

INSERT INTO `mv_types_sortie_service` (`id_type_sortie`, `type_sortie_service`) VALUES
(1, 'Sortie 1'),
(2, 'Sortie deuxieme');

-- --------------------------------------------------------

--
-- Table structure for table `mv_type_distiction_honorifiques`
--

CREATE TABLE `mv_type_distiction_honorifiques` (
  `id_type_distiction` int(11) NOT NULL,
  `type_distiction` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mv_type_distiction_honorifiques`
--

INSERT INTO `mv_type_distiction_honorifiques` (`id_type_distiction`, `type_distiction`) VALUES
(1, 'Distinction un'),
(2, 'Distinction deux'),
(4, 'Type de distinction trois');

-- --------------------------------------------------------

--
-- Table structure for table `mv_unites_nbre`
--

CREATE TABLE `mv_unites_nbre` (
  `id_unite_nbre` int(11) NOT NULL,
  `code_unite_nb` varchar(45) DEFAULT NULL,
  `nom_unite_nb` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mv_unites_nbre`
--

INSERT INTO `mv_unites_nbre` (`id_unite_nbre`, `code_unite_nb`, `nom_unite_nb`) VALUES
(1, 'un1', 'Unite 1'),
(2, 'un2', 'Unite 2');

-- --------------------------------------------------------

--
-- Table structure for table `user_audit_trails`
--

CREATE TABLE `user_audit_trails` (
  `user_id` varchar(128) DEFAULT NULL,
  `event` varchar(64) DEFAULT NULL,
  `table_name` varchar(64) DEFAULT NULL,
  `old_values` text DEFAULT NULL,
  `new_values` text DEFAULT NULL,
  `url` text DEFAULT NULL,
  `ip_address` text DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_audit_trails`
--

INSERT INTO `user_audit_trails` (`user_id`, `event`, `table_name`, `old_values`, `new_values`, `url`, `ip_address`, `user_agent`, `created_at`) VALUES
('47', 'insert', 'gr_fiche_identification', NULL, '{\"matricule\":\"MAT202\",\"nouveau_matricule\":\"AN232020\",\"ancien_matricule\":\"635210\",\"id_categorie\":\"5\",\"nom\":\"MAHORO\",\"prenom\":\"Eric\",\"id_sexe\":\"1\",\"id_ethnie\":\"3\",\"id_corps_origine\":\"1\",\"id_etat_civil\":\"2\",\"nombre_enfant\":\"1\",\"conjoin_salarie\":\"0\",\"date_naissance\":\"1992-01-02\",\"annee_naissance\":\"1992\",\"anne_pension_min\":\"2030\",\"annee_pension_max\":\"2033\",\"id_pays_naissance\":\"1\",\"ville_naissance\":\"BUTANUKA\",\"id_colline\":\"1\",\"id_promotion\":\"1\",\"noms_pere\":\"MAHORO Hilaire\",\"noms_mere\":\"MARARO Anitha\",\"numero_inss\":\"2020\",\"numero_mfp\":\"3020\",\"numero_psp\":\"1230\",\"id_religion\":\"2\",\"id_groupe_sanguin\":\"3\"}', '../modules/gr/controllers/Fiche_identification/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-31 10:52:02'),
('47', 'update', 'gr_fiche_identification', '{\"id_ethnie\":\"1\"}', '{\"id_ethnie\":\"2\"}', '../modules/gr/controllers/Fiche_identification/edit/3', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-31 10:59:54'),
('47', 'update', 'gr_fiche_identification', '{\"id_ethnie\":\"2\"}', '{\"id_ethnie\":\"1\"}', '../modules/gr/controllers/Fiche_identification/edit/1', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-31 11:00:13'),
('47', 'update', 'gr_fiche_identification', '{\"id_ethnie\":\"2\"}', '{\"id_ethnie\":\"1\"}', '../modules/gr/controllers/Fiche_identification/edit/3', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-31 11:00:25'),
('47', 'insert', 'gr_fiche_carriere', NULL, '{\"id_identification\":\"4\",\"id_departement\":\"1\",\"id_service\":\"1\",\"id_unite\":\"1\",\"id_categorie\":\"5\",\"id_sous_categorie\":\"4\",\"id_statut\":\"1\",\"id_fonction\":\"1\",\"est_candidat\":\"accept\",\"code_indemnite_risque\":\"1000\",\"est_handicappe\":\"accept\",\"utilise_mfp\":\"accept\",\"date_embauche\":\"2003-04-10\",\"prime_sante\":\"2000\",\"salaire_base\":\"350000\",\"id_specialite\":\"1\",\"id_niveau_formation\":\"5\",\"niveau_autre\":\"\",\"ref_avancement_grade\":\"2\",\"ref_affectation\":\"RF1010\"}', '../modules/gr/controllers/Fiche_carriere/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-31 12:19:15'),
('47', 'insert', 'gr_fiche_carriere', NULL, '{\"id_identification\":\"4\",\"id_niveau_formation\":\"3\",\"id_departement\":\"1\",\"id_service\":\"1\",\"id_unite\":\"5\",\"id_categorie\":\"5\",\"id_sous_categorie\":\"2\",\"id_statut\":\"1\",\"id_fonction\":\"1\",\"est_candidat\":\"accept\",\"code_indemnite_risque\":\"3000\",\"est_handicappe\":\"accept\",\"utilise_mfp\":\"accept\",\"date_embauche\":\"2004-04-10\",\"prime_sante\":\"6300\",\"salaire_base\":\"600000\",\"id_specialite\":\"2\",\"niveau_autre\":\"\",\"ref_avancement_grade\":\"20000\",\"ref_affectation\":\"rf3020\"}', '../modules/gr/controllers/Fiche_carriere/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-31 12:22:28'),
('47', 'update', 'gr_fiche_carriere', '{\"id_categorie\":\"5\",\"est_candidat\":\"\"}', '{\"id_categorie\":\"6\",\"est_candidat\":\"accept\"}', '../modules/gr/controllers/Fiche_carriere/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-31 12:34:25'),
('47', 'update', 'gr_fiche_carriere', '{\"id_categorie\":\"5\",\"est_candidat\":\"\"}', '{\"id_categorie\":\"6\",\"est_candidat\":\"accept\"}', '../modules/gr/controllers/Fiche_carriere/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-31 12:34:39'),
('47', 'delete', 'gr_fiche_carriere', '{\"id_fiche_carriere\":\"22\",\"id_identification\":\"4\",\"id_departement\":\"1\",\"id_service\":\"1\",\"id_unite\":\"5\",\"id_categorie\":\"6\",\"id_sous_categorie\":\"2\",\"id_statut\":\"1\",\"id_fonction\":\"1\",\"est_candidat\":\"\",\"code_indemnite_risque\":\"3000\",\"est_handicappe\":\"0\",\"utilise_mfp\":\"0\",\"date_embauche\":\"2004-04-10\",\"prime_sante\":\"6300\",\"salaire_base\":\"600000\",\"id_specialite\":\"2\",\"id_niveau_formation\":\"3\",\"niveau_autre\":\"\",\"ref_avancement_grade\":\"20000\",\"ref_affectation\":\"rf3020\"}', '{\"id_fiche_carriere\":\"22\"}', '../modules/gr/controllers/Fiche_carriere/delete/4/22', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-31 12:34:46'),
('47', 'insert', 'gr_ayants_droit', NULL, '{\"id_identification\":\"4\",\"id_categorie_ayant_droit\":\"2\",\"nom\":\"CIZA\",\"prenoms\":\"Jean\",\"date_naissance\":\"2000-01-20\",\"ref_extrait_naissance\":\"REF1010\",\"date_marriage\":\"2000-01-02\",\"ref_extrait_marriage\":\"2022\",\"date_divorce\":\"\",\"date_deces\":\"\",\"ref_cert_deces\":\"\",\"prise_en_charge\":\"Oui\"}', '../modules/gr/controllers/Ayants_droit/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-31 12:54:46'),
('47', 'insert', 'gr_ayants_droit', NULL, '{\"id_identification\":\"4\",\"id_categorie_ayant_droit\":\"1\",\"nom\":\"MAHORO\",\"prenoms\":\"Jean Chris\",\"date_naissance\":\"2000-01-20\",\"ref_extrait_naissance\":\"RF1010\",\"date_marriage\":\"\",\"ref_extrait_marriage\":\"\",\"date_divorce\":\"\",\"date_deces\":\"\",\"ref_cert_deces\":\"\",\"prise_en_charge\":\"Oui\"}', '../modules/gr/controllers/Ayants_droit/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-31 12:58:56'),
('47', 'delete', 'gr_fiche_carriere', NULL, '{\"id_fiche_carriere\":\"3\"}', '../modules/gr/controllers/Fiche_carriere/delete/4/3', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-31 12:59:10'),
('47', 'delete', 'gr_ayants_droit', '{\"id_ayant_droit\":\"3\",\"id_identification\":\"4\",\"id_categorie_ayant_droit\":\"2\",\"nom\":\"CIZA\",\"prenoms\":\"Jean\",\"date_naissance\":\"2000-01-20\",\"ref_extrait_naissance\":\"REF1010\",\"date_marriage\":\"2000-01-02\",\"ref_extrait_marriage\":\"2022\",\"date_divorce\":\"0000-00-00\",\"date_deces\":\"0000-00-00\",\"ref_cert_deces\":\"\",\"prise_en_charge\":\"Oui\"}', '{\"id_ayant_droit\":\"3\"}', '../modules/gr/controllers/Ayants_droit/delete/4/3', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-31 12:59:45'),
('47', 'update', 'gr_ayants_droit', '{\"id_identification\":\"\",\"id_categorie_ayant_droit\":\"\",\"nom\":\"\",\"prenoms\":\"\",\"date_naissance\":\"\",\"ref_extrait_naissance\":\"\",\"date_marriage\":\"\",\"ref_extrait_marriage\":\"\",\"date_divorce\":\"\",\"date_deces\":\"\",\"ref_cert_deces\":\"\",\"prise_en_charge\":\"\"}', '{\"id_identification\":\"4\",\"id_categorie_ayant_droit\":\"1\",\"nom\":\"MAHORO CIZA\",\"prenoms\":\"Jean Chris\",\"date_naissance\":\"2000-01-20\",\"ref_extrait_naissance\":\"RF1012\",\"date_marriage\":\"0000-00-00\",\"ref_extrait_marriage\":\"\",\"date_divorce\":\"0000-00-00\",\"date_deces\":\"2022-02-01\",\"ref_cert_deces\":\"\",\"prise_en_charge\":\"Oui\"}', '../modules/gr/controllers/Ayants_droit/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-31 13:07:41'),
('47', 'update', 'gr_ayants_droit', '{\"id_identification\":\"\",\"id_categorie_ayant_droit\":\"\",\"nom\":\"\",\"prenoms\":\"\",\"date_naissance\":\"\",\"ref_extrait_naissance\":\"\",\"date_marriage\":\"\",\"ref_extrait_marriage\":\"\",\"date_divorce\":\"\",\"date_deces\":\"\",\"ref_cert_deces\":\"\",\"prise_en_charge\":\"\"}', '{\"id_identification\":\"4\",\"id_categorie_ayant_droit\":\"1\",\"nom\":\"MAHORO CIZA\",\"prenoms\":\"Jean Chris\",\"date_naissance\":\"2000-01-20\",\"ref_extrait_naissance\":\"RF1010\",\"date_marriage\":\"0000-00-00\",\"ref_extrait_marriage\":\"\",\"date_divorce\":\"0000-00-00\",\"date_deces\":\"0000-00-00\",\"ref_cert_deces\":\"\",\"prise_en_charge\":\"Oui\"}', '../modules/gr/controllers/Ayants_droit/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-31 13:07:55'),
('47', 'update', 'gr_ayants_droit', '{\"nom\":\"MAHORO\"}', '{\"nom\":\"MAHORO CIZA\"}', '../modules/gr/controllers/Ayants_droit/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-31 13:08:22'),
('47', 'insert', 'gr_ayants_droit', NULL, '{\"id_identification\":\"4\",\"id_categorie_ayant_droit\":\"1\",\"nom\":\" BUCUMI\",\"prenoms\":\"Jean Floribert\",\"date_naissance\":\"2000-01-03\",\"ref_extrait_naissance\":\"RF302020\",\"date_marriage\":\"\",\"ref_extrait_marriage\":\"\",\"date_divorce\":\"\",\"date_deces\":\"\",\"ref_cert_deces\":\"\",\"prise_en_charge\":\"Oui\"}', '../modules/gr/controllers/Ayants_droit/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-31 13:09:12'),
('47', 'insert', 'mv_cotations', NULL, '{\"id_identification\":\"4\",\"id_type_cote\":\"2\",\"code\":\"COTE20\",\"annee\":\"2022\",\"points1\":\"3.5\",\"points2\":\"4.2\",\"note_obtenue\":\"10\"}', '../modules/mouvement/controllers/Cotations/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-31 13:45:20'),
('47', 'update', 'mv_cotations', '{\"note_obtenue\":\"10\"}', '{\"note_obtenue\":\"10.3\"}', '../modules/mouvement/controllers/Cotations/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-31 13:45:59'),
('47', 'insert', 'mv_cotations', NULL, '{\"id_identification\":\"4\",\"id_type_cote\":\"1\",\"code\":\"CT32\",\"annee\":\"2021\",\"points1\":\"3.6\",\"points2\":\"3.5\",\"note_obtenue\":\"11\"}', '../modules/mouvement/controllers/Cotations/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-31 13:46:25'),
('47', 'update', 'mv_cotations', '{\"annee\":\"2021\",\"points2\":\"3.5\"}', '{\"annee\":\"2000\",\"points2\":\"3.56\"}', '../modules/mouvement/controllers/Cotations/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-31 13:46:41'),
('47', 'insert', 'gr_historique_situations', NULL, '{\"id_identification\":\"4\",\"id_situation\":\"1\",\"date_debut\":\"2022-02-01\",\"date_fin\":\"2022-03-01\",\"observation\":\"Test\"}', '../modules/gr/controllers/Historique_situations/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-31 13:53:00'),
('47', 'delete', '_connections', '{\"cnt_id\":\"784\",\"usr_id\":\"47\",\"token_connection\":\"b52daaa1d74d416109a4b0aa28985c7e535518a4\",\"cnt_ip\":\"172.18.0.1\",\"cnt_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko\\/20100101 Firefox\\/103.0\",\"cnt_datecreated\":\"2022-08-31 09:31:07\"}', '\"\"', 'Authentification/logout', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-31 13:59:12'),
('47', 'insert', '_connections', NULL, 'null', 'Authentification/login', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-31 13:59:19'),
('47', 'update', 'mv_cotations', '{\"points1\":\"2.1\",\"points2\":\"2.2\"}', '{\"points1\":\"2.3\",\"points2\":\"2.6\"}', '../modules/mouvement/controllers/Cotations/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-31 14:19:52'),
('47', 'insert', '_connections', NULL, 'null', 'Authentification/login', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-31 16:17:00'),
('47', 'insert', 'gr_fiche_carriere', NULL, '{\"id_identification\":\"4\",\"id_niveau_formation\":\"1\",\"niveau_autre\":\"\",\"id_departement\":\"1\",\"id_service\":\"1\",\"id_unite\":\"5\",\"id_categorie\":\"6\",\"id_sous_categorie\":\"4\",\"id_statut\":\"2\",\"id_fonction\":\"2\",\"est_candidat\":\"accept\",\"code_indemnite_risque\":\"2000\",\"est_handicappe\":\"accept\",\"utilise_mfp\":\"accept\",\"date_embauche\":\"2000-01-02\",\"prime_sante\":\"80000\",\"salaire_base\":\"780000\",\"id_specialite\":\"2\",\"ref_avancement_grade\":\"AVANCE\",\"ref_affectation\":\"RF320\"}', '../modules/gr/controllers/Fiche_carriere/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-31 16:24:20'),
('47', 'insert', 'gr_situations', NULL, '{\"nom_situation\":\"Actif\"}', '../modules/gr/controllers/Situations/index', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-31 16:52:19'),
('47', 'insert', '_connections', NULL, 'null', 'Authentification/login', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-31 17:46:01'),
('47', 'delete', '_connections', '{\"cnt_id\":\"787\",\"usr_id\":\"47\",\"token_connection\":\"8d28aa7b9228ea7bddef56183fa7085452601e12\",\"cnt_ip\":\"172.18.0.1\",\"cnt_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko\\/20100101 Firefox\\/103.0\",\"cnt_datecreated\":\"2022-08-31 17:46:01\"}', '\"\"', 'Authentification/logout', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-31 17:47:03'),
('47', 'insert', '_connections', NULL, 'null', 'Authentification/login', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-09-01 09:20:28'),
('47', 'insert', '_connections', NULL, 'null', 'Authentification/login', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 10:31:46'),
('47', 'insert', 'mv_etudes_faites', NULL, '{\"id_identification\":\"1\",\"id_type_etudes\":\"1\",\"etablissement\":\"Universite de Test Baie\",\"periode_etude\":\"2001-2022\",\"ref_equivalence\":\"ERQ21\",\"note_obtenue\":\"15\",\"date_obtention\":\"2022-02-12\",\"id_pays\":\"1\"}', '../modules/mouvement/controllers/Etudes_faites/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 11:15:08'),
('47', 'insert', 'mv_etudes_faites', NULL, '{\"id_identification\":\"1\",\"id_type_etudes\":\"1\",\"etablissement\":\"Universite de Test Baie\",\"periode_etude\":\"2001-2022\",\"ref_equivalence\":\"ERQ21\",\"note_obtenue\":\"15\",\"date_obtention\":\"2022-02-12\",\"id_pays\":\"1\"}', '../modules/mouvement/controllers/Etudes_faites/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 11:16:42'),
('47', 'update', 'mv_etudes_faites', '{\"etablissement\":\"Universite de Test Baie\",\"periode_etude\":\"2001-2022\",\"ref_equivalence\":\"ERQ21\",\"note_obtenue\":\"15\",\"date_obtention\":\"2022-02-12\",\"id_pays\":\"1\"}', '{\"etablissement\":\"Universite de Test Baie1\",\"periode_etude\":\"2011-2022\",\"ref_equivalence\":\"ERQ22\",\"note_obtenue\":\"10\",\"date_obtention\":\"2020-02-12\",\"id_pays\":\"2\"}', '../modules/mouvement/controllers/Etudes_faites/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 11:19:40'),
('47', 'update', 'mv_etudes_faites', '{\"id_type_etudes\":\"1\",\"note_obtenue\":\"15\"}', '{\"id_type_etudes\":\"2\",\"note_obtenue\":\"15.02\"}', '../modules/mouvement/controllers/Etudes_faites/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 11:20:16'),
('47', 'delete', 'mv_etudes_faites', '{\"id_etudes\":\"3\",\"id_identification\":\"1\",\"id_type_etudes\":\"1\",\"etablissement\":\"Universite de Test Baie1\",\"periode_etude\":\"2011-2022\",\"ref_equivalence\":\"ERQ22\",\"note_obtenue\":\"10\",\"date_obtention\":\"2020-02-12\",\"id_pays\":\"2\"}', '{\"id_etudes\":\"3\"}', '../modules/mouvement/controllers/Etudes_faites/delete/1/3', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 11:20:25'),
('47', 'delete', 'mv_etudes_faites', NULL, '{\"id_etudes\":\"3\"}', '../modules/mouvement/controllers/Etudes_faites/delete/1/3', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 11:21:23'),
('47', 'insert', 'mv_etudes_faites', NULL, '{\"id_identification\":\"1\",\"id_type_etudes\":\"2\",\"etablissement\":\"Universite de Test Baie\",\"periode_etude\":\"2001-2022\",\"ref_equivalence\":\"ERQ21\",\"note_obtenue\":\"15\",\"date_obtention\":\"2020-02-12\",\"id_pays\":\"1\"}', '../modules/mouvement/controllers/Etudes_faites/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 11:22:23'),
('47', 'delete', 'mv_etudes_faites', '{\"id_etudes\":\"2\",\"id_identification\":\"1\",\"id_type_etudes\":\"2\",\"etablissement\":\"Universite de Test Baie\",\"periode_etude\":\"2001-2022\",\"ref_equivalence\":\"ERQ21\",\"note_obtenue\":\"15.02\",\"date_obtention\":\"2022-02-12\",\"id_pays\":\"1\"}', '{\"id_etudes\":\"2\"}', '../modules/mouvement/controllers/Etudes_faites/delete/1/2', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 11:27:44'),
('47', 'delete', 'mv_etudes_faites', '{\"id_etudes\":\"4\",\"id_identification\":\"1\",\"id_type_etudes\":\"2\",\"etablissement\":\"Universite de Test Baie\",\"periode_etude\":\"2001-2022\",\"ref_equivalence\":\"ERQ21\",\"note_obtenue\":\"15\",\"date_obtention\":\"2020-02-12\",\"id_pays\":\"1\"}', '{\"id_etudes\":\"4\"}', '../modules/mouvement/controllers/Etudes_faites/delete/1/4', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 11:31:23'),
('47', 'delete', 'mv_etudes_faites', '{\"id_etudes\":\"1\",\"id_identification\":\"1\",\"id_type_etudes\":\"1\",\"etablissement\":\"\\u00c9cole militaire du Burundi\",\"periode_etude\":\"2020-2022\",\"ref_equivalence\":\"EQUI2020\",\"note_obtenue\":\"15\",\"date_obtention\":\"2022-08-29\",\"id_pays\":\"1\"}', '{\"id_etudes\":\"1\"}', '../modules/mouvement/controllers/Etudes_faites/delete/1/1', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 11:32:53'),
('47', 'delete', 'mv_etudes_faites', NULL, '{\"id_etudes\":\"1\"}', '../modules/mouvement/controllers/Etudes_faites/delete/1/1', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 11:33:26'),
('47', 'insert', 'mv_etudes_faites', NULL, '{\"id_identification\":\"1\",\"id_type_etudes\":\"2\",\"etablissement\":\"Universite de Test Baie1\",\"periode_etude\":\"2001-2022\",\"ref_equivalence\":\"ERQ21\",\"note_obtenue\":\"15.02\",\"date_obtention\":\"2022-02-12\",\"id_pays\":\"1\"}', '../modules/mouvement/controllers/Etudes_faites/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 11:33:46'),
('47', 'insert', 'mv_formations_stages', NULL, '{\"id_identification\":\"1\",\"id_stage\":\"2\",\"id_specialite\":\"2\",\"titre_obtenu\":\"Certificat One1\",\"id_pays\":\"2\",\"date_debut\":\"2022-01-01\",\"date_fin\":\"2022-03-01\",\"nb_mois\":\"2\",\"montant_prime\":\"500\",\"ref_stage\":\"REF10\",\"note_obtenue\":\"16.3\",\"date_specialite\":\"2022-02-03\",\"ref_specialite\":\"RF1020\"}', '../modules/mouvement/controllers/Formations_stages/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 14:42:04'),
('47', 'insert', 'mv_formations_stages', NULL, '{\"id_identification\":\"1\",\"id_stage\":\"1\",\"id_specialite\":\"2\",\"titre_obtenu\":\"Certificat OFFICE201\",\"id_pays\":\"1\",\"date_debut\":\"2022-01-01\",\"date_fin\":\"2022-12-02\",\"nb_mois\":\"2\",\"montant_prime\":\"5000\",\"ref_stage\":\"REF10\",\"note_obtenue\":\"10.6\",\"date_specialite\":\"2022-02-03\",\"ref_specialite\":\"RF1020\"}', '../modules/mouvement/controllers/Formations_stages/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 14:43:18'),
('47', 'insert', 'mv_formations_stages', NULL, '{\"id_identification\":\"1\",\"id_stage\":\"2\",\"id_specialite\":\"2\",\"titre_obtenu\":\"Certificat OFF23\",\"id_pays\":\"2\",\"date_debut\":\"2022-02-01\",\"date_fin\":\"2022-12-02\",\"nb_mois\":\"2\",\"montant_prime\":\"500\",\"ref_stage\":\"REF10\",\"note_obtenue\":\"10\",\"date_specialite\":\"2022-02-03\",\"ref_specialite\":\"RF1020\"}', '../modules/mouvement/controllers/Formations_stages/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 14:49:04'),
('47', 'delete', 'mv_formations_stages', '{\"id_formation_stage\":\"4\",\"id_identification\":\"1\",\"id_stage\":\"2\",\"id_specialite\":\"2\",\"titre_obtenu\":\"Certificat OFF23\",\"id_pays\":\"2\",\"date_debut\":\"2022-02-01\",\"date_fin\":\"2022-12-02\",\"nb_mois\":\"2\",\"montant_prime\":\"500\",\"ref_stage\":\"REF10\",\"note_obtenue\":\"10\",\"date_specialite\":\"2022-02-03\",\"ref_specialite\":\"RF1020\"}', '{\"id_formation_stage\":\"4\"}', '../modules/mouvement/controllers/Formations_stages/delete/1/4', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 14:49:13'),
('47', 'update', 'mv_formations_stages', '{\"id_pays\":\"2\",\"note_obtenue\":\"16.3\"}', '{\"id_pays\":\"1\",\"note_obtenue\":\"16.37\"}', '../modules/mouvement/controllers/Formations_stages/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 14:49:28'),
('47', 'update', 'mv_formations_stages', '{\"montant_prime\":\"3000\"}', '{\"montant_prime\":\"360\"}', '../modules/mouvement/controllers/Formations_stages/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 14:49:46'),
('47', 'update', 'mv_formations_stages', '{\"montant_prime\":\"5000\"}', '{\"montant_prime\":\"5600\"}', '../modules/mouvement/controllers/Formations_stages/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 14:49:57'),
('47', 'insert', 'mv_avancement_grades', NULL, '{\"id_identification\":\"1\",\"id_categorie\":\"6\",\"id_ancien_grade\":\"1\",\"id_nouveau_grade\":\"2\",\"date_avancement\":\"2022-02-10\",\"ancien_salaire_base\":\"600000\",\"nouveau_salaire_base\":\"680000\",\"ref_avancement\":\"REF2010\"}', '../modules/mouvement/controllers/Avancement_grades/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 16:24:27'),
('47', 'update', 'mv_avancement_grades', '{\"ancien_salaire_base\":\"600000\"}', '{\"ancien_salaire_base\":\"620000\"}', '../modules/mouvement/controllers/Avancement_grades/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 16:24:47'),
('47', 'update', 'mv_avancement_grades', '{\"nouveau_salaire_base\":\"700000\",\"ref_avancement\":\"Ref_1020\"}', '{\"nouveau_salaire_base\":\"720000\",\"ref_avancement\":\"Ref202211\"}', '../modules/mouvement/controllers/Avancement_grades/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 16:25:07'),
('47', 'delete', 'mv_avancement_grades', '{\"id_avancement_grade\":\"2\",\"id_identification\":\"1\",\"id_categorie\":\"6\",\"id_ancien_grade\":\"1\",\"id_nouveau_grade\":\"2\",\"date_avancement\":\"2022-02-10\",\"ancien_salaire_base\":\"620000\",\"nouveau_salaire_base\":\"680000\",\"ref_avancement\":\"REF2010\"}', '{\"id_avancement_grade\":\"2\"}', '../modules/mouvement/controllers/Avancement_grades/delete/1/2', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 16:29:38'),
('47', 'insert', 'mv_fiche_mutations', NULL, '{\"id_identification\":\"1\",\"date_mutation\":\"2022-02-02\",\"ref_mutation\":\"RF Mu1010\",\"id_ancien_service\":\"1\",\"id_nouveau_service\":\"2\",\"id_ancienne_unite\":\"3\",\"id_nouvelle_unite\":\"2\",\"id_ancienne_fonction\":\"1\",\"id_nouvelle_fonction\":\"2\",\"observations\":\"Observations\",\"bp\":\"BP10\"}', '../modules/mouvement/controllers/Fiche_mutations/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 17:20:33'),
('47', 'update', 'mv_fiche_mutations', '{\"id_identification\":\"\",\"date_mutation\":\"\",\"ref_mutation\":\"\",\"id_ancien_service\":\"\",\"id_nouveau_service\":\"\",\"id_ancienne_unite\":\"\",\"id_nouvelle_unite\":\"\",\"id_ancienne_fonction\":\"\",\"id_nouvelle_fonction\":\"\",\"observations\":\"\",\"bp\":\"\"}', '{\"id_identification\":\"1\",\"date_mutation\":\"2022-08-16\",\"ref_mutation\":\"MUT20200\",\"id_ancien_service\":\"1\",\"id_nouveau_service\":\"2\",\"id_ancienne_unite\":\"2\",\"id_nouvelle_unite\":\"3\",\"id_ancienne_fonction\":\"1\",\"id_nouvelle_fonction\":\"2\",\"observations\":\"test\",\"bp\":\"BP102010\"}', '../modules/mouvement/controllers/Fiche_mutations/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 17:27:26'),
('47', 'update', 'mv_fiche_mutations', '{\"id_identification\":\"\",\"date_mutation\":\"\",\"ref_mutation\":\"\",\"id_ancien_service\":\"\",\"id_nouveau_service\":\"\",\"id_ancienne_unite\":\"\",\"id_nouvelle_unite\":\"\",\"id_ancienne_fonction\":\"\",\"id_nouvelle_fonction\":\"\",\"observations\":\"\",\"bp\":\"\"}', '{\"id_identification\":\"1\",\"date_mutation\":\"2022-08-16\",\"ref_mutation\":\"MUT2020\",\"id_ancien_service\":\"1\",\"id_nouveau_service\":\"2\",\"id_ancienne_unite\":\"2\",\"id_nouvelle_unite\":\"3\",\"id_ancienne_fonction\":\"1\",\"id_nouvelle_fonction\":\"2\",\"observations\":\"test\",\"bp\":\"BP\"}', '../modules/mouvement/controllers/Fiche_mutations/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 17:27:41'),
('47', 'update', 'mv_fiche_mutations', '{\"date_mutation\":\"2022-02-02\",\"observations\":\"Observations\"}', '{\"date_mutation\":\"2022-02-25\",\"observations\":\"Observations de test\"}', '../modules/mouvement/controllers/Fiche_mutations/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 17:28:10'),
('47', 'delete', 'mv_fiche_mutations', '{\"id_mutation\":\"2\",\"id_identification\":\"1\",\"date_mutation\":\"2022-02-25\",\"ref_mutation\":\"RF Mu1010\",\"id_ancien_service\":\"1\",\"id_nouveau_service\":\"2\",\"id_ancienne_unite\":\"3\",\"id_nouvelle_unite\":\"2\",\"id_ancienne_fonction\":\"1\",\"id_nouvelle_fonction\":\"2\",\"observations\":\"Observations de test\",\"bp\":\"BP10\"}', '{\"id_mutation\":\"2\"}', '../modules/mouvement/controllers/Fiche_mutations/delete/1/2', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 17:28:22'),
('47', 'insert', 'mv_fiche_mutations', NULL, '{\"id_identification\":\"1\",\"date_mutation\":\"2022-08-17\",\"ref_mutation\":\"RF2020\",\"id_ancien_service\":\"1\",\"id_nouveau_service\":\"2\",\"id_ancienne_unite\":\"3\",\"id_nouvelle_unite\":\"3\",\"id_ancienne_fonction\":\"2\",\"id_nouvelle_fonction\":\"2\",\"observations\":\"Observations de COP\",\"bp\":\"BP102010\"}', '../modules/mouvement/controllers/Fiche_mutations/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 17:28:54'),
('47', 'update', 'mv_actions_disciplinaires', '{\"nb_jours_punition\":\"15\",\"ref_cloture\":\"RFP1\"}', '{\"nb_jours_punition\":\"10\",\"ref_cloture\":\"RFP10\"}', '../modules/mouvement/controllers/Actions_disciplinaires/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 17:54:26'),
('47', 'insert', 'mv_actions_disciplinaires', NULL, '{\"id_identification\":\"1\",\"date_ouverture\":\"2022-03-01\",\"id_type_punition\":\"1\",\"nb_jours_punition\":\"15\",\"date_cloture\":\"2022-03-16\",\"ref_cloture\":\"REF10\",\"date_levee\":\"2022-03-16\",\"autorite_decision\":\"Chef de carriere\",\"ref_levee\":\"REF5210\",\"observation\":\"Obser\"}', '../modules/mouvement/controllers/Actions_disciplinaires/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 17:55:30'),
('47', 'delete', 'mv_actions_disciplinaires', '{\"id_action_disciplinaire\":\"2\",\"date_ouverture\":\"2022-03-01\",\"id_type_punition\":\"1\",\"nb_jours_punition\":\"15\",\"date_cloture\":\"2022-03-16\",\"ref_cloture\":\"REF10\",\"date_levee\":\"2022-03-16\",\"autorite_decision\":\"Chef de carriere\",\"ref_levee\":\"REF5210\",\"observation\":\"Obser\",\"id_identification\":\"1\"}', '{\"id_action_disciplinaire\":\"2\"}', '../modules/mouvement/controllers/Actions_disciplinaires/delete/1/2', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 17:55:36'),
('47', 'insert', '_connections', NULL, 'null', 'Authentification/login', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-06 16:01:24'),
('47', 'update', 'mv_dossiers_penals', '{\"date_fin\":\"2016-08-02\",\"id_type_infraction\":\"1\",\"nbre\":\"100\"}', '{\"date_fin\":\"2036-08-02\",\"id_type_infraction\":\"2\",\"nbre\":\"1000\"}', '../modules/mouvement/controllers/Dossiers_penals/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-06 17:39:40'),
('47', 'insert', 'mv_dossiers_penals', NULL, '{\"id_identification\":\"1\",\"date_debut\":\"2022-01-01\",\"date_fin\":\"2023-01-01\",\"id_type_peine\":\"1\",\"juridiction\":\"Juridction miltaire\",\"id_type_infraction\":\"1\",\"chef\":\"Chef de poste\",\"nbre\":\"365\",\"id_unite_nbre\":\"1\"}', '../modules/mouvement/controllers/Dossiers_penals/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-06 17:40:25'),
('47', 'delete', 'mv_dossiers_penals', '{\"id_dossier_penal\":\"1\",\"date_debut\":\"2014-08-01\",\"date_fin\":\"2036-08-02\",\"id_type_peine\":\"1\",\"juridiction\":\"Tribunal miltaire\",\"id_type_infraction\":\"2\",\"chef\":\"Chef de mission\",\"nbre\":\"1000\",\"id_unite_nbre\":\"1\",\"id_identification\":\"1\"}', '{\"id_dossier_penal\":\"1\"}', '../modules/mouvement/controllers/Dossiers_penals/delete/1/1', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-06 17:40:31'),
('47', 'update', 'mv_absences', '{\"est_justifie\":\"1\"}', '{\"est_justifie\":\"Oui\"}', '../modules/mouvement/controllers/Absences/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-06 18:16:10'),
('47', 'insert', 'mv_absences', NULL, '{\"id_identification\":\"1\",\"date_debut\":\"2022-01-01\",\"date_fin\":\"2022-12-02\",\"nb_jours\":\"20\",\"nb_heures\":\"32\",\"est_justifie\":\"Oui\",\"justification\":\"Autre\"}', '../modules/mouvement/controllers/Absences/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-06 18:16:33'),
('47', 'update', 'mv_absences', '{\"est_justifie\":\"0\"}', '{\"est_justifie\":\"Non\"}', '../modules/mouvement/controllers/Absences/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-06 18:47:50'),
('47', 'update', 'mv_absences', '{\"est_justifie\":\"0\"}', '{\"est_justifie\":\"Oui\"}', '../modules/mouvement/controllers/Absences/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-06 18:48:02'),
('47', 'delete', 'mv_absences', '{\"id_absence\":\"1\",\"id_identification\":\"1\",\"date_debut\":\"2022-07-18\",\"date_fin\":\"2022-08-02\",\"nb_jours\":\"10\",\"nb_heures\":\"12\",\"est_justifie\":\"Non\",\"justification\":\"Justified\"}', '{\"id_absence\":\"1\"}', '../modules/mouvement/controllers/Absences/delete/1/1', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-06 18:48:08'),
('47', 'insert', 'mv_renforcements', NULL, '{\"id_identification\":\"1\",\"id_type_renforcement\":\"2\",\"ref_renforcement\":\"REF2\",\"titre_obtenu\":\"master Kiki1\",\"id_pays\":\"2\",\"date_depart\":\"2022-01-20\",\"date_retour\":\"2022-05-20\",\"nb_jours\":\"150\"}', '../modules/mouvement/controllers/Renforcements/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-06 19:08:02'),
('47', 'update', 'mv_renforcements', '{\"id_identification\":\"\",\"id_type_renforcement\":\"\",\"ref_renforcement\":\"\",\"titre_obtenu\":\"\",\"id_pays\":\"\",\"date_depart\":\"\",\"date_retour\":\"\",\"nb_jours\":\"\"}', '{\"id_identification\":\"1\",\"id_type_renforcement\":\"2\",\"ref_renforcement\":\"REF2\",\"titre_obtenu\":\"master Kiki1\",\"id_pays\":\"2\",\"date_depart\":\"2022-01-20\",\"date_retour\":\"2022-05-20\",\"nb_jours\":\"100\"}', '../modules/mouvement/controllers/Renforcements/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-06 19:08:28'),
('47', 'update', 'mv_renforcements', '{\"ref_renforcement\":\"RF10\",\"id_pays\":\"1\",\"nb_jours\":\"120\"}', '{\"ref_renforcement\":\"RF1002\",\"id_pays\":\"2\",\"nb_jours\":\"80\"}', '../modules/mouvement/controllers/Renforcements/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-06 19:08:57'),
('47', 'insert', '_connections', NULL, 'null', 'Authentification/login', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-07 12:05:30'),
('47', 'insert', 'mv_dictinctions_honorifiques', NULL, '{\"id_identification\":\"1\",\"id_type_distiction\":\"2\",\"date_distiction\":\"2022-02-01\",\"ref_distiction\":\"REF1010\",\"observations\":\"Observations de test\"}', '../modules/mouvement/controllers/Dictinctions_honorifiques/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-07 13:55:22'),
('47', 'update', 'mv_dictinctions_honorifiques', '{\"date_distiction\":\"2022-08-01\",\"ref_distiction\":\"Ref\"}', '{\"date_distiction\":\"2022-07-01\",\"ref_distiction\":\"DECRET1010\"}', '../modules/mouvement/controllers/Dictinctions_honorifiques/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-07 13:55:42'),
('47', 'delete', 'mv_dictinctions_honorifiques', '{\"id_distinction\":\"2\",\"id_identification\":\"1\",\"id_type_distiction\":\"2\",\"date_distiction\":\"2022-02-01\",\"ref_distiction\":\"REF1010\",\"observations\":\"Observations de test\"}', '{\"id_distinction\":\"2\"}', '../modules/mouvement/controllers/Dictinctions_honorifiques/delete/1/2', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-07 13:55:51'),
('47', 'insert', 'mv_accidents_roulage', NULL, '{\"id_identification\":\"1\",\"date_accident\":\"2022-03-10\",\"degat_charge\":\"Charge de degat\",\"degat_cause\":\"Cause de degat\",\"responsable\":\"Responsable King\",\"observation\":\"Observation\"}', '../modules/mouvement/controllers/Accidents_roulage/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-07 14:14:59'),
('47', 'update', 'mv_accidents_roulage', '{\"date_accident\":\"2022-08-01\",\"observation\":\"Observation de test for Monday\"}', '{\"date_accident\":\"2022-08-10\",\"observation\":\"Observation de test for Monday1\"}', '../modules/mouvement/controllers/Accidents_roulage/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-07 14:15:56'),
('47', 'delete', 'mv_accidents_roulage', '{\"id_accident\":\"2\",\"id_identification\":\"1\",\"date_accident\":\"2022-03-10\",\"degat_charge\":\"Charge de degat\",\"degat_cause\":\"Cause de degat\",\"responsable\":\"Responsable King\",\"observation\":\"Observation\"}', '{\"id_accident\":\"2\"}', '../modules/mouvement/controllers/Accidents_roulage/delete/1/2', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-07 14:17:24'),
('47', 'insert', 'mv_accidents_roulage', NULL, '{\"id_identification\":\"1\",\"date_accident\":\"2022-03-30\",\"degat_charge\":\"Charge de degat 1\",\"degat_cause\":\"Cause de degat 20\",\"responsable\":\"Responsable King 10\",\"observation\":\"Observation de test for Monday1\"}', '../modules/mouvement/controllers/Accidents_roulage/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-07 14:17:52'),
('47', 'insert', 'mv_accidents_travail', NULL, '{\"id_identification\":\"1\",\"date_accident\":\"2022-03-10\",\"nature\":\"Test de nature\",\"decision\":\"Decision finale\"}', '../modules/mouvement/controllers/Accidents_travail/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-07 14:59:09'),
('47', 'update', 'mv_accidents_travail', '{\"date_accident\":\"2022-08-02\",\"decision\":\"Conge maladie 3 mois\"}', '{\"date_accident\":\"2022-08-20\",\"decision\":\"Conge maladie 20 mois\"}', '../modules/mouvement/controllers/Accidents_travail/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-07 14:59:35'),
('47', 'delete', 'mv_accidents_travail', '{\"id_accident\":\"2\",\"id_identification\":\"1\",\"date_accident\":\"2022-03-10\",\"nature\":\"Test de nature\",\"decision\":\"Decision finale\"}', '{\"id_accident\":\"2\"}', '../modules/mouvement/controllers/Accidents_travail/delete/1/2', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-07 14:59:44'),
('47', 'insert', 'mv_accidents_travail', NULL, '{\"id_identification\":\"1\",\"date_accident\":\"2022-03-30\",\"nature\":\"test\",\"decision\":\"Test\"}', '../modules/mouvement/controllers/Accidents_travail/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-07 15:46:47'),
('47', 'delete', 'mv_accidents_travail', '{\"id_accident\":\"3\",\"id_identification\":\"1\",\"date_accident\":\"2022-03-30\",\"nature\":\"test\",\"decision\":\"Test\"}', '{\"id_accident\":\"3\"}', '../modules/mouvement/controllers/Accidents_travail/delete/1/3', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-07 15:46:56'),
('47', 'update', 'mv_accidents_travail', '{\"date_accident\":\"2022-08-20\"}', '{\"date_accident\":\"2022-08-25\"}', '../modules/mouvement/controllers/Accidents_travail/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-07 15:47:06'),
('47', 'insert', 'mv_exemptions_service', NULL, '{\"id_identification\":\"1\",\"annee\":\"2022\",\"date_debut\":\"2022-02-10\",\"date_fin\":\"2022-05-12\",\"nb_jours\":\"120\"}', '../modules/mouvement/controllers/Exemptions_service/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-07 16:19:08'),
('47', 'insert', 'mv_exemptions_service', NULL, '{\"id_identification\":\"1\",\"annee\":\"2021\",\"date_debut\":\"2021-03-10\",\"date_fin\":\"2021-06-01\",\"nb_jours\":\"60\"}', '../modules/mouvement/controllers/Exemptions_service/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-07 16:20:04'),
('47', 'delete', 'mv_exemptions_service', '{\"id_exemption\":\"2\",\"id_identification\":\"1\",\"annee\":\"2022\",\"date_debut\":\"2022-02-10\",\"date_fin\":\"2022-05-12\",\"nb_jours\":\"120\"}', '{\"id_exemption\":\"2\"}', '../modules/mouvement/controllers/Exemptions_service/delete/1/2', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-07 16:20:13'),
('47', 'update', 'mv_exemptions_service', '{\"nb_jours\":\"100\"}', '{\"nb_jours\":\"102\"}', '../modules/mouvement/controllers/Exemptions_service/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-07 16:21:16'),
('47', 'insert', '_connections', NULL, 'null', 'Authentification/login', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0', '2022-09-23 17:07:46'),
('47', 'insert', '_connections', NULL, 'null', 'Authentification/login', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0', '2022-10-20 08:35:33'),
('47', 'insert', '_connections', NULL, 'null', 'Authentification/login', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0', '2022-10-20 12:01:13'),
('47', 'insert', 'mv_absences', NULL, '{\"id_identification\":\"1\",\"date_debut\":\"2003-10-21\",\"date_fin\":\"2003-12-02\",\"nb_jours\":\"20\",\"nb_heures\":\"200\",\"est_justifie\":\"Non\",\"justification\":\"Test\"}', '../modules/mouvement/controllers/Absences/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0', '2022-10-20 12:23:23'),
('47', 'insert', 'mv_absences', NULL, '{\"id_identification\":\"1\",\"date_debut\":\"2003-10-21\",\"date_fin\":\"2003-12-02\",\"nb_jours\":\"20\",\"nb_heures\":\"200\",\"est_justifie\":\"Non\",\"justification\":\"Test\"}', '../modules/mouvement/controllers/Absences/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0', '2022-10-20 12:23:42'),
('47', 'update', 'mv_absences', '{\"nb_jours\":\"20\",\"justification\":\"Test\"}', '{\"nb_jours\":\"40\",\"justification\":\"Test autre\"}', '../modules/mouvement/controllers/Absences/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0', '2022-10-20 12:24:03'),
('47', 'delete', 'mv_absences', '{\"id_absence\":\"4\",\"id_identification\":\"1\",\"date_debut\":\"2003-10-21\",\"date_fin\":\"2003-12-02\",\"nb_jours\":\"40\",\"nb_heures\":\"200\",\"est_justifie\":\"Non\",\"justification\":\"Test autre\"}', '{\"id_absence\":\"4\"}', '../modules/mouvement/controllers/Absences/delete/1/4', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0', '2022-10-20 12:24:12'),
('47', 'insert', 'mv_type_distiction_honorifiques', NULL, '{\"type_distiction\":\"Distinction deux\"}', '../modules/mouvement/controllers/Type_distiction_honorifiques/index', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0', '2022-10-20 12:30:04'),
('47', 'update', 'mv_type_distiction_honorifiques', '{\"type_distiction\":\"Distinction deux\"}', '{\"type_distiction\":\"Distinction trois\"}', '../modules/mouvement/controllers/Type_distiction_honorifiques/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0', '2022-10-20 12:33:34'),
('47', 'delete', 'mv_type_distiction_honorifiques', '{\"id_type_distiction\":\"3\",\"type_distiction\":\"Distinction trois\"}', '{\"id_type_distiction\":\"3\"}', '../modules/mouvement/controllers/Type_distiction_honorifiques/delete/3', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0', '2022-10-20 12:33:44'),
('47', 'insert', 'mv_type_distiction_honorifiques', NULL, '{\"type_distiction\":\"Type de distinction trois\"}', '../modules/mouvement/controllers/Type_distiction_honorifiques/index', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0', '2022-10-20 12:33:58'),
('47', 'insert', '_connections', NULL, 'null', 'Authentification/login', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0', '2022-10-21 11:57:58'),
('47', 'insert', '_connections', NULL, 'null', 'Authentification/login', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 15:21:35'),
('47', 'insert', 'mv_types_punition', NULL, '{\"code_type_punition\":\"PN15\",\"nom_type_punition\":\"Punition de 15 Jours\"}', '../modules/mouvement/controllers/Types_punition/index', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 15:28:59'),
('47', 'insert', 'mv_types_punition', NULL, '{\"code_type_punition\":\"PN15\",\"nom_type_punition\":\"Punition de 15 Jours\"}', '../modules/mouvement/controllers/Types_punition/index', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 15:29:22'),
('47', 'delete', 'mv_types_punition', '{\"id_type_punition\":\"2\",\"code_type_punition\":\"PN15\",\"nom_type_punition\":\"Punition de 15 Jours\"}', '{\"id_type_punition\":\"2\"}', '../modules/mouvement/controllers/Types_punition/delete/2', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 15:29:27'),
('47', 'delete', 'mv_types_punition', NULL, '{\"id_type_punition\":\"2\"}', '../modules/mouvement/controllers/Types_punition/delete/2', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 15:30:17'),
('47', 'delete', 'mv_types_punition', '{\"id_type_punition\":\"3\",\"code_type_punition\":\"PN15\",\"nom_type_punition\":\"Punition de 15 Jours\"}', '{\"id_type_punition\":\"3\"}', '../modules/mouvement/controllers/Types_punition/delete/3', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 15:31:16'),
('47', 'insert', 'mv_types_punition', NULL, '{\"code_type_punition\":\"PN15\",\"nom_type_punition\":\"Punition de 15 Jours\"}', '../modules/mouvement/controllers/Types_punition/index', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 15:31:21'),
('47', 'update', 'mv_types_punition', '{\"code_type_punition\":\"PN15\",\"nom_type_punition\":\"Punition de 15 Jours\"}', '{\"code_type_punition\":\"PN150\",\"nom_type_punition\":\"Punition de 15 Jours 1\"}', '../modules/mouvement/controllers/Types_punition/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 15:31:36'),
('47', 'insert', '_connections', NULL, 'null', 'Authentification/login', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 17:08:38'),
('47', 'insert', 'mv_types_conges', NULL, '{\"type_conge\":\"Conge de maternite\"}', '../modules/mouvement/controllers/Types_conges/index', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 17:09:09'),
('47', 'insert', 'mv_types_conges', NULL, '{\"type_conge\":\"Autre conge\"}', '../modules/mouvement/controllers/Types_conges/index', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 17:09:17'),
('47', 'insert', 'mv_types_conges', NULL, '{\"type_conge\":\"Conge annuelle\"}', '../modules/mouvement/controllers/Types_conges/index', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 17:09:24'),
('47', 'update', 'mv_types_conges', '{\"type_conge\":\"Conge annuelle\"}', '{\"type_conge\":\"Conge annuelles\"}', '../modules/mouvement/controllers/Types_conges/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 17:09:47'),
('47', 'delete', 'mv_types_conges', '{\"id_type_conge\":\"2\",\"type_conge\":\"Autre conge\"}', '{\"id_type_conge\":\"2\"}', '../modules/mouvement/controllers/Types_conges/delete/2', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 17:09:52'),
('47', 'insert', 'mv_types_etudes', NULL, '{\"type_etudes\":\"Master\"}', '../modules/mouvement/controllers/Types_etudes/index', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 17:29:52'),
('47', 'insert', 'mv_types_etudes', NULL, '{\"type_etudes\":\"Doctorat\"}', '../modules/mouvement/controllers/Types_etudes/index', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 17:29:58'),
('47', 'insert', 'mv_types_etudes', NULL, '{\"type_etudes\":\"Autre\"}', '../modules/mouvement/controllers/Types_etudes/index', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 17:30:07');
INSERT INTO `user_audit_trails` (`user_id`, `event`, `table_name`, `old_values`, `new_values`, `url`, `ip_address`, `user_agent`, `created_at`) VALUES
('47', 'update', 'mv_types_etudes', '{\"type_etudes\":\"Autre\"}', '{\"type_etudes\":\"Autre 1\"}', '../modules/mouvement/controllers/Types_etudes/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 17:30:13'),
('47', 'delete', 'mv_types_etudes', '{\"id_types_etudes\":\"5\",\"type_etudes\":\"Autre 1\"}', '{\"id_types_etudes\":\"5\"}', '../modules/mouvement/controllers/Types_etudes/delete/5', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 17:30:16'),
('47', 'insert', 'mv_types_infraction', NULL, '{\"code_infraction\":\"P6\",\"nom_infraction\":\"Infraction de test\"}', '../modules/mouvement/controllers/Types_infraction/index', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 17:44:58'),
('47', 'update', 'mv_types_infraction', '{\"code_infraction\":\"P6\",\"nom_infraction\":\"Infraction de test\"}', '{\"code_infraction\":\"P9\",\"nom_infraction\":\"Infraction de tests\"}', '../modules/mouvement/controllers/Types_infraction/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 17:45:08'),
('47', 'delete', 'mv_types_infraction', '{\"id_type_infraction\":\"3\",\"code_infraction\":\"P9\",\"nom_infraction\":\"Infraction de tests\"}', '{\"id_type_infraction\":\"3\"}', '../modules/mouvement/controllers/Types_infraction/delete/3', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 17:45:13'),
('47', 'insert', 'mv_types_missions', NULL, '{\"type_mission\":\"Mission Amissom\"}', '../modules/mouvement/controllers/Types_missions/index', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 17:57:13'),
('47', 'insert', 'mv_types_missions', NULL, '{\"type_mission\":\"Formation miltaire\"}', '../modules/mouvement/controllers/Types_missions/index', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 17:57:26'),
('47', 'insert', 'mv_types_missions', NULL, '{\"type_mission\":\"Autre formation\"}', '../modules/mouvement/controllers/Types_missions/index', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 17:57:33'),
('47', 'update', 'mv_types_missions', '{\"type_mission\":\"Autre formation\"}', '{\"type_mission\":\"Autre formation 1\"}', '../modules/mouvement/controllers/Types_missions/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 17:57:41'),
('47', 'delete', 'mv_types_missions', '{\"id_type_mission\":\"3\",\"type_mission\":\"Autre formation 1\"}', '{\"id_type_mission\":\"3\"}', '../modules/mouvement/controllers/Types_missions/delete/3', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 17:57:43'),
('47', 'insert', 'mv_types_peine', NULL, '{\"code_type_peine\":\"PN\",\"nom_type_peine\":\"Peine 5 ans\"}', '../modules/mouvement/controllers/Types_peine/index', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 18:07:29'),
('47', 'insert', 'mv_types_peine', NULL, '{\"code_type_peine\":\"pmn\",\"nom_type_peine\":\"Autre peine\"}', '../modules/mouvement/controllers/Types_peine/index', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 18:07:41'),
('47', 'update', 'mv_types_peine', '{\"code_type_peine\":\"pmn\",\"nom_type_peine\":\"Autre peine\"}', '{\"code_type_peine\":\"p2\",\"nom_type_peine\":\"Autre peine1\"}', '../modules/mouvement/controllers/Types_peine/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 18:07:53'),
('47', 'delete', 'mv_types_peine', '{\"id_type_peine\":\"4\",\"code_type_peine\":\"p2\",\"nom_type_peine\":\"Autre peine1\"}', '{\"id_type_peine\":\"4\"}', '../modules/mouvement/controllers/Types_peine/delete/4', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 18:07:56'),
('47', 'insert', 'mv_types_renforcement', NULL, '{\"type_renforcement\":\"Renforcement autre\"}', '../modules/mouvement/controllers/Types_renforcement/index', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 18:20:51'),
('47', 'update', 'mv_types_renforcement', '{\"type_renforcement\":\"Renforcement autre\"}', '{\"type_renforcement\":\"Renforcement autre 1\"}', '../modules/mouvement/controllers/Types_renforcement/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 18:20:59'),
('47', 'delete', 'mv_types_renforcement', '{\"id_type_renforcement\":\"3\",\"type_renforcement\":\"Renforcement autre 1\"}', '{\"id_type_renforcement\":\"3\"}', '../modules/mouvement/controllers/Types_renforcement/delete/3', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 18:21:10'),
('47', 'insert', 'mv_types_sortie_service', NULL, '{\"type_sortie_service\":\"Sortie 1\"}', '../modules/mouvement/controllers/Types_sortie_service/index', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 18:29:58'),
('47', 'insert', 'mv_types_sortie_service', NULL, '{\"type_sortie_service\":\"Sortie deux\"}', '../modules/mouvement/controllers/Types_sortie_service/index', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 18:30:05'),
('47', 'update', 'mv_types_sortie_service', '{\"type_sortie_service\":\"Sortie deux\"}', '{\"type_sortie_service\":\"Sortie deuxieme\"}', '../modules/mouvement/controllers/Types_sortie_service/edit', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 18:30:16'),
('47', 'insert', '_connections', NULL, 'null', 'Authentification/login', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:107.0) Gecko/20100101 Firefox/107.0', '2022-12-17 14:28:51'),
('47', 'delete', '_connections', '{\"cnt_id\":\"798\",\"usr_id\":\"47\",\"token_connection\":\"eae1aa5ab74760b9c96d249ee680c0f2c8f34e83\",\"cnt_ip\":\"172.18.0.1\",\"cnt_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:107.0) Gecko\\/20100101 Firefox\\/107.0\",\"cnt_datecreated\":\"2022-12-17 14:28:51\"}', '\"\"', 'Authentification/logout', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:107.0) Gecko/20100101 Firefox/107.0', '2022-12-17 14:28:58'),
('47', 'insert', '_connections', NULL, 'null', 'Authentification/login', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:107.0) Gecko/20100101 Firefox/107.0', '2022-12-17 14:29:02'),
('47', 'insert', '_connections', NULL, 'null', 'Authentification/login', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2022-12-17 14:56:19'),
('47', 'insert', 'gr_ayants_droit', NULL, '{\"id_identification\":\"1\",\"id_categorie_ayant_droit\":\"2\",\"nom\":\"THADDEE\",\"prenoms\":\"NDIKUMANA\",\"date_naissance\":\"2000-02-12\",\"ref_extrait_naissance\":\"EXTR2020\",\"date_marriage\":\"2003-02-20\",\"ref_extrait_marriage\":\"RF\",\"date_divorce\":\"2022-01-10\",\"date_deces\":\"2012-01-12\",\"ref_cert_deces\":\"RF\",\"prise_en_charge\":\"RF\"}', '../modules/gr/controllers/Ayants_droit/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2022-12-17 14:59:15'),
('47', 'insert', 'mv_accidents_travail', NULL, '{\"id_identification\":\"1\",\"date_accident\":\"2022-12-07\",\"nature\":\"Blessure\",\"decision\":\"Conge de 10 Jours\"}', '../modules/mouvement/controllers/Accidents_travail/add', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2022-12-17 15:00:49'),
('47', 'insert', '_connections', NULL, 'null', 'Authentification/login', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023-01-12 15:17:38'),
('47', 'insert', '_connections', NULL, 'null', 'Authentification/login', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023-01-12 16:02:05'),
('47', 'insert', '_connections', NULL, 'null', 'Authentification/login', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023-01-30 11:18:44');

-- --------------------------------------------------------

--
-- Table structure for table `_connections`
--

CREATE TABLE `_connections` (
  `cnt_id` int(10) UNSIGNED NOT NULL,
  `usr_id` int(10) UNSIGNED NOT NULL,
  `token_connection` char(40) NOT NULL,
  `cnt_ip` varchar(255) DEFAULT NULL,
  `cnt_agent` varchar(255) NOT NULL,
  `cnt_datecreated` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `_connections`
--

INSERT INTO `_connections` (`cnt_id`, `usr_id`, `token_connection`, `cnt_ip`, `cnt_agent`, `cnt_datecreated`) VALUES
(750, 47, 'b6fc48925f2a630297fb1ea60083488ccb7aea7c', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.60 Safari/537.36', '2022-05-11 18:45:47'),
(751, 47, 'd76db3d705b5bd7bc64f53549bf4e407e65f1f29', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.60 Safari/537.36', '2022-05-11 18:49:05'),
(752, 47, 'c001f9b9e723110219690493efcbd1db53c66e99', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.60 Safari/537.36', '2022-05-11 18:49:57'),
(753, 47, '472d96dfa4a298e1ccab0ecca6c8dc502db82d68', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.60 Safari/537.36', '2022-05-11 18:50:11'),
(754, 47, '54a8ff163842ef1a0ebf11ebcfca3b3318d211d1', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.60 Safari/537.36', '2022-05-11 18:50:16'),
(755, 47, '8651123b1499eb5d240dac77263ed2731af18a65', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.60 Safari/537.36', '2022-05-11 18:50:24'),
(758, 47, '441b9f895488c16fef820dae2631cf491c1b6190', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.60 Safari/537.36', '2022-05-12 19:24:59'),
(759, 47, '8743d78d76e28982afd476c6faea2c2b9a3ae5ff', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.60 Safari/537.36', '2022-05-13 15:49:32'),
(760, 47, '8b05a1e7155ddf2cda761861fcdbd5057b61e01b', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.60 Safari/537.36', '2022-05-14 17:45:32'),
(765, 47, 'f213cfcd676ac691fe76e2562293206d07fc5b41', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.60 Safari/537.36', '2022-05-16 16:44:13'),
(766, 47, 'd7c60ced9a9cc8b79f9ff8f3a71c20da9a4c0b75', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.60 Safari/537.36', '2022-05-17 15:02:08'),
(767, 47, '934e1505d142dc080c80597cd4a9ddb54ca034b5', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.61 Safari/537.36', '2022-06-11 09:38:57'),
(768, 47, '3b669bff82ffe5a706fb4c745705f14e0b4b655c', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.61 Safari/537.36', '2022-06-14 12:20:13'),
(769, 47, 'b0373c4bd76e6ceca174d30dc8d9adcc91ffc068', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.61 Safari/537.36', '2022-06-14 14:03:43'),
(770, 47, '36f4f58164d76da94f8b82c82272c1b651ac4476', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-15 11:40:29'),
(771, 47, 'a560d08272965ae380a26e903268b8511f1d3ab7', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.61 Safari/537.36', '2022-06-16 11:01:06'),
(772, 47, '3bb387f8f913a3852c14d44595a27a096ee12ede', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '2022-06-26 15:43:12'),
(773, 47, '8a9f1990d28e2cadbd4069a1353760ed1f75a989', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.53 Safari/537.36', '2022-07-01 09:19:57'),
(774, 47, '9de81a08a0d7c108b3aa50766a3abf248b7b4153', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.53 Safari/537.36', '2022-07-02 10:17:12'),
(775, 47, '48f2485b07ec599ce6ae4a03cdf9a8a91a81f3be', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '2022-07-09 15:28:51'),
(776, 47, 'c6ec972f99a8846cad50a898eb63adc9963caa89', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '2022-07-24 16:28:41'),
(777, 47, 'aaada21836dff47cd0b1043c247dbc4df05815d4', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-29 10:34:07'),
(778, 47, '42e84624487491db5c075d93d71846909bf40655', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-29 13:18:28'),
(779, 47, 'd2b5910b5c1ba1332732194720d34deaddb681dd', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-30 06:42:39'),
(780, 47, 'b09ee298907a8cf24296fe4d960816f0f7a60f78', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-30 09:29:36'),
(781, 47, '18da47afa6f07603ea85b32f0f7220a167400faa', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-30 09:49:10'),
(782, 47, '4c2567458026416b87c79bb26b62599cbbe21c3a', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-30 10:21:23'),
(783, 47, '28a669539fde8e2b240124028586e7cebe4dc265', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-30 14:15:20'),
(785, 47, '708cdf8f743cd9b95806bae6f8f4f3d8d844d2bd', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-31 13:59:19'),
(786, 47, 'f0e8da1e81cf81304e0d8b7f34ccf7f8763d2b97', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-08-31 16:17:00'),
(788, 47, '0dd5884c486676c7e6cfcec3c02dceed24acad3e', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', '2022-09-01 09:20:28'),
(789, 47, '25cb3064b79729d18879e4587ad615d99b34125e', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-05 10:31:46'),
(790, 47, '2844a8ce95badf2a4c47b411d186b606169a17de', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-06 16:01:24'),
(791, 47, 'c14be13654e7c687898c23b5f5eb4c4b66d997c7', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', '2022-09-07 12:05:30'),
(792, 47, '99440cc4809e986ddf7e442b19b932a2fc10c0cf', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0', '2022-09-23 17:07:46'),
(793, 47, '8a1b0f80ca5d518f3125bc1eb3893533475bd138', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0', '2022-10-20 08:35:33'),
(794, 47, '66601fbd58ff013fa0797298406af42b5e37cf79', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0', '2022-10-20 12:01:13'),
(795, 47, '3d3fe30e87eb6772f07f7bdb53cba79123b186f2', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0', '2022-10-21 11:57:58'),
(796, 47, 'aca6a7463513f4d112e505e0701e1ef99bc24d8c', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 15:21:35'),
(797, 47, '1ff0a3168600c8e6e741781d464e4a20b228d54e', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022-11-09 17:08:38'),
(799, 47, '79fbb549c8f106147bc837b7f556037988335ca5', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:107.0) Gecko/20100101 Firefox/107.0', '2022-12-17 14:29:02'),
(800, 47, '5f7b16464f8b89cb6da0552418119749728f23e9', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2022-12-17 14:56:19'),
(801, 47, 'eb1c7769e2af53c223c7f4d2d737164a74512dc2', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023-01-12 15:17:38'),
(802, 47, '5c4f57363c5e0806c103f849172fe0158e5fac1d', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023-01-12 16:02:05'),
(803, 47, '1bed4c9cc0887d4588f69fbd95f4b3eb210d0776', '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023-01-30 11:18:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_collaborateurs`
--
ALTER TABLE `admin_collaborateurs`
  ADD PRIMARY KEY (`usr_id`),
  ADD UNIQUE KEY `mbr_email` (`usr_email`),
  ADD UNIQUE KEY `mbr_forgotpassword` (`usr_forgotpassword`);

--
-- Indexes for table `admin_controllers`
--
ALTER TABLE `admin_controllers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_permissions`
--
ALTER TABLE `admin_permissions`
  ADD PRIMARY KEY (`per_id`),
  ADD UNIQUE KEY `per_code` (`per_code`);

--
-- Indexes for table `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`rol_id`),
  ADD UNIQUE KEY `rol_code` (`rol_code`);

--
-- Indexes for table `admin_roles_permissions`
--
ALTER TABLE `admin_roles_permissions`
  ADD PRIMARY KEY (`rol_per_id`),
  ADD KEY `rol_id` (`rol_id`),
  ADD KEY `per_id` (`per_id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`usr_id`),
  ADD UNIQUE KEY `mbr_email` (`usr_email`),
  ADD UNIQUE KEY `mbr_forgotpassword` (`usr_forgotpassword`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `gr_ayants_droit`
--
ALTER TABLE `gr_ayants_droit`
  ADD PRIMARY KEY (`id_ayant_droit`),
  ADD KEY `id_identification_idx` (`id_identification`),
  ADD KEY `id_categorie_ayant_droit_idx` (`id_categorie_ayant_droit`);

--
-- Indexes for table `gr_categories`
--
ALTER TABLE `gr_categories`
  ADD PRIMARY KEY (`id_categorie`),
  ADD UNIQUE KEY `code_categorie` (`code_categorie`);

--
-- Indexes for table `gr_categorie_ayant_droits`
--
ALTER TABLE `gr_categorie_ayant_droits`
  ADD PRIMARY KEY (`id_categorie_ayant_droit`);

--
-- Indexes for table `gr_collines`
--
ALTER TABLE `gr_collines`
  ADD PRIMARY KEY (`id_colline`),
  ADD UNIQUE KEY `code_colline` (`code_colline`),
  ADD KEY `id_commune_idx` (`id_commune`);

--
-- Indexes for table `gr_communes`
--
ALTER TABLE `gr_communes`
  ADD PRIMARY KEY (`id_commune`),
  ADD UNIQUE KEY `code_commune` (`code_commune`),
  ADD KEY `id_province_idx` (`id_province`);

--
-- Indexes for table `gr_corps_origine`
--
ALTER TABLE `gr_corps_origine`
  ADD PRIMARY KEY (`id_corps_origine`),
  ADD UNIQUE KEY `code_corps_origine` (`code_corps_origine`);

--
-- Indexes for table `gr_departements`
--
ALTER TABLE `gr_departements`
  ADD PRIMARY KEY (`id_departement`);

--
-- Indexes for table `gr_documents_joints`
--
ALTER TABLE `gr_documents_joints`
  ADD PRIMARY KEY (`id_document`),
  ADD KEY `id_type_document_idx` (`id_type_document`),
  ADD KEY `id_identification_idx` (`id_identification`);

--
-- Indexes for table `gr_etat_civil`
--
ALTER TABLE `gr_etat_civil`
  ADD PRIMARY KEY (`id_etat_civil`),
  ADD UNIQUE KEY `nom_etat_civil` (`nom_etat_civil`);

--
-- Indexes for table `gr_ethnies`
--
ALTER TABLE `gr_ethnies`
  ADD PRIMARY KEY (`id_ethnie`),
  ADD UNIQUE KEY `code_ethnie` (`code_ethnie`),
  ADD UNIQUE KEY `nom_ethnie` (`nom_ethnie`);

--
-- Indexes for table `gr_fiche_carriere`
--
ALTER TABLE `gr_fiche_carriere`
  ADD PRIMARY KEY (`id_fiche_carriere`),
  ADD KEY `id_identification_carriere_idx` (`id_identification`),
  ADD KEY `id_departement_carriere_idx` (`id_departement`),
  ADD KEY `id_service_carriere_idx` (`id_service`),
  ADD KEY `id_unite_carriere_idx` (`id_unite`),
  ADD KEY `id_categorie_carriere_idx` (`id_categorie`),
  ADD KEY `id_sous_categorie_carriere_idx` (`id_sous_categorie`),
  ADD KEY `id_statut_carriere_idx` (`id_statut`),
  ADD KEY `id_fonction_carriere_idx` (`id_fonction`),
  ADD KEY `id_specialite_carriere_idx` (`id_specialite`),
  ADD KEY `id_niveau_formation_carriere_idx` (`id_niveau_formation`);

--
-- Indexes for table `gr_fiche_identification`
--
ALTER TABLE `gr_fiche_identification`
  ADD PRIMARY KEY (`id_identification`),
  ADD UNIQUE KEY `numero_inss` (`numero_inss`),
  ADD UNIQUE KEY `numero_mfp` (`numero_mfp`),
  ADD UNIQUE KEY `numero_psp` (`numero_psp`),
  ADD KEY `id_categorie_idx` (`id_categorie`),
  ADD KEY `id_sexe_idx` (`id_sexe`),
  ADD KEY `id_ethnie_idx` (`id_ethnie`),
  ADD KEY `id_corps_origine_idx` (`id_corps_origine`),
  ADD KEY `id_etat_civil_idx` (`id_etat_civil`),
  ADD KEY `id_pays_naissance_idx` (`id_pays_naissance`),
  ADD KEY `id_colline_idx` (`id_colline`),
  ADD KEY `id_promotion_idx` (`id_promotion`),
  ADD KEY `id_religion_idx` (`id_religion`),
  ADD KEY `id_groupe_sanguin_idx` (`id_groupe_sanguin`);

--
-- Indexes for table `gr_fonctions`
--
ALTER TABLE `gr_fonctions`
  ADD PRIMARY KEY (`id_fonction`);

--
-- Indexes for table `gr_grades`
--
ALTER TABLE `gr_grades`
  ADD PRIMARY KEY (`id_grade`);

--
-- Indexes for table `gr_groupes_sanguin`
--
ALTER TABLE `gr_groupes_sanguin`
  ADD PRIMARY KEY (`id_gpe_sanguin`);

--
-- Indexes for table `gr_historique_grades`
--
ALTER TABLE `gr_historique_grades`
  ADD PRIMARY KEY (`id_grade`,`id_identification`),
  ADD KEY `id_identification_idx` (`id_identification`),
  ADD KEY `id_identification_grades_idx` (`id_identification`);

--
-- Indexes for table `gr_historique_situations`
--
ALTER TABLE `gr_historique_situations`
  ADD PRIMARY KEY (`id_historique`),
  ADD KEY `id_identification_situations_idx` (`id_identification`),
  ADD KEY `id_situation_idx` (`id_situation`);

--
-- Indexes for table `gr_niveaux_formation`
--
ALTER TABLE `gr_niveaux_formation`
  ADD PRIMARY KEY (`id_niveau_formation`);

--
-- Indexes for table `gr_pays`
--
ALTER TABLE `gr_pays`
  ADD PRIMARY KEY (`id_pays`),
  ADD UNIQUE KEY `code_pays` (`code_pays`);

--
-- Indexes for table `gr_promotions`
--
ALTER TABLE `gr_promotions`
  ADD PRIMARY KEY (`id_promotion`);

--
-- Indexes for table `gr_provinces`
--
ALTER TABLE `gr_provinces`
  ADD PRIMARY KEY (`id_province`),
  ADD UNIQUE KEY `code_province` (`code_province`);

--
-- Indexes for table `gr_religions`
--
ALTER TABLE `gr_religions`
  ADD PRIMARY KEY (`id_religion`);

--
-- Indexes for table `gr_services`
--
ALTER TABLE `gr_services`
  ADD PRIMARY KEY (`id_service`);

--
-- Indexes for table `gr_sexes`
--
ALTER TABLE `gr_sexes`
  ADD PRIMARY KEY (`id_sexe`),
  ADD UNIQUE KEY `code_sexe` (`code_sexe`),
  ADD UNIQUE KEY `nom_sexe` (`nom_sexe`);

--
-- Indexes for table `gr_situations`
--
ALTER TABLE `gr_situations`
  ADD PRIMARY KEY (`id_situation`);

--
-- Indexes for table `gr_sous_categories`
--
ALTER TABLE `gr_sous_categories`
  ADD PRIMARY KEY (`id_sous_categorie`);

--
-- Indexes for table `gr_specialites`
--
ALTER TABLE `gr_specialites`
  ADD PRIMARY KEY (`id_specialite`);

--
-- Indexes for table `gr_statuts`
--
ALTER TABLE `gr_statuts`
  ADD PRIMARY KEY (`id_statut`);

--
-- Indexes for table `gr_type_documents`
--
ALTER TABLE `gr_type_documents`
  ADD PRIMARY KEY (`id_type_document`);

--
-- Indexes for table `gr_unites`
--
ALTER TABLE `gr_unites`
  ADD PRIMARY KEY (`id_unite`);

--
-- Indexes for table `mv_absences`
--
ALTER TABLE `mv_absences`
  ADD PRIMARY KEY (`id_absence`),
  ADD KEY `id_identification_absences_idx` (`id_identification`);

--
-- Indexes for table `mv_accidents_roulage`
--
ALTER TABLE `mv_accidents_roulage`
  ADD PRIMARY KEY (`id_accident`),
  ADD KEY `identification_accidents_idx` (`id_identification`);

--
-- Indexes for table `mv_accidents_travail`
--
ALTER TABLE `mv_accidents_travail`
  ADD PRIMARY KEY (`id_accident`),
  ADD KEY `identification_acc_travail_idx` (`id_identification`);

--
-- Indexes for table `mv_actions_disciplinaires`
--
ALTER TABLE `mv_actions_disciplinaires`
  ADD PRIMARY KEY (`id_action_disciplinaire`),
  ADD KEY `id_type_punition_idx` (`id_type_punition`);

--
-- Indexes for table `mv_avancement_grades`
--
ALTER TABLE `mv_avancement_grades`
  ADD PRIMARY KEY (`id_avancement_grade`),
  ADD KEY `id_identification_avancementgrades_idx` (`id_identification`),
  ADD KEY `id_categorie_avancementgrades_idx` (`id_categorie`),
  ADD KEY `id_ancien_grade_idx` (`id_ancien_grade`),
  ADD KEY `id_nouveau_grade_idx` (`id_nouveau_grade`);

--
-- Indexes for table `mv_conges`
--
ALTER TABLE `mv_conges`
  ADD PRIMARY KEY (`id_conge`),
  ADD KEY `id_identification_conges_idx` (`id_identification`),
  ADD KEY `id_type_conge_idx` (`id_type_conge`);

--
-- Indexes for table `mv_cotations`
--
ALTER TABLE `mv_cotations`
  ADD PRIMARY KEY (`id_cotation`),
  ADD UNIQUE KEY `code_UNIQUE` (`code`),
  ADD KEY `id_identification_cotations_idx` (`id_identification`),
  ADD KEY `id_type_cotes_idx` (`id_type_cote`);

--
-- Indexes for table `mv_dictinctions_honorifiques`
--
ALTER TABLE `mv_dictinctions_honorifiques`
  ADD PRIMARY KEY (`id_distinction`),
  ADD KEY `id_identification_distinctions_idx` (`id_identification`),
  ADD KEY `id_types_distinctions_idx` (`id_type_distiction`);

--
-- Indexes for table `mv_dossiers_penals`
--
ALTER TABLE `mv_dossiers_penals`
  ADD PRIMARY KEY (`id_dossier_penal`),
  ADD KEY `id_type_peine_idx` (`id_type_peine`),
  ADD KEY `id_type_infraction_idx` (`id_type_infraction`),
  ADD KEY `id_unite_nbre_idx` (`id_unite_nbre`);

--
-- Indexes for table `mv_entrees_en_service`
--
ALTER TABLE `mv_entrees_en_service`
  ADD PRIMARY KEY (`id_entree_service`),
  ADD KEY `id_identification_services_idx` (`id_identification`);

--
-- Indexes for table `mv_etudes_faites`
--
ALTER TABLE `mv_etudes_faites`
  ADD PRIMARY KEY (`id_etudes`),
  ADD KEY `id_identification_etudes_idx` (`id_identification`),
  ADD KEY `id_types_etudes_idx` (`id_type_etudes`),
  ADD KEY `id_pays_etudes_idx` (`id_pays`);

--
-- Indexes for table `mv_exemptions_service`
--
ALTER TABLE `mv_exemptions_service`
  ADD PRIMARY KEY (`id_exemption`),
  ADD KEY `identification_exemptions_idx` (`id_identification`);

--
-- Indexes for table `mv_fiche_mutations`
--
ALTER TABLE `mv_fiche_mutations`
  ADD PRIMARY KEY (`id_mutation`),
  ADD KEY `id_identification_mutations_idx` (`id_identification`),
  ADD KEY `id_ancien_service_idx` (`id_ancien_service`),
  ADD KEY `id_nouveau_service_idx` (`id_nouveau_service`),
  ADD KEY `id_ancienne_unite_idx` (`id_ancienne_unite`),
  ADD KEY `id_nouvelle_unite_idx` (`id_nouvelle_unite`),
  ADD KEY `id_ancienne_fonction_idx` (`id_ancienne_fonction`),
  ADD KEY `id_nouvelle_fonction_idx` (`id_nouvelle_fonction`);

--
-- Indexes for table `mv_formations_stages`
--
ALTER TABLE `mv_formations_stages`
  ADD PRIMARY KEY (`id_formation_stage`),
  ADD KEY `id_identification_formations_stages_idx` (`id_identification`),
  ADD KEY `id_stage_idx` (`id_stage`),
  ADD KEY `id_specialite_formations_stages_idx` (`id_specialite`),
  ADD KEY `id_pays_idx` (`id_pays`);

--
-- Indexes for table `mv_missions`
--
ALTER TABLE `mv_missions`
  ADD PRIMARY KEY (`id_mission`),
  ADD KEY `id_identification_missions_idx` (`id_identification`),
  ADD KEY `id_type_mission_idx` (`id_type_mission`);

--
-- Indexes for table `mv_renforcements`
--
ALTER TABLE `mv_renforcements`
  ADD PRIMARY KEY (`id_renforcement`),
  ADD KEY `id_identification_renforcements_idx` (`id_identification`),
  ADD KEY `id_type_renforcement_idx` (`id_type_renforcement`),
  ADD KEY `id_pays_renforcements_idx` (`id_pays`);

--
-- Indexes for table `mv_sorties_service`
--
ALTER TABLE `mv_sorties_service`
  ADD PRIMARY KEY (`id_sortie`),
  ADD KEY `id_identification_sorties_idx` (`id_identification`),
  ADD KEY `id_genre_sorties_idx` (`id_genre_sortie`);

--
-- Indexes for table `mv_stages`
--
ALTER TABLE `mv_stages`
  ADD PRIMARY KEY (`id_stage`);

--
-- Indexes for table `mv_types_conges`
--
ALTER TABLE `mv_types_conges`
  ADD PRIMARY KEY (`id_type_conge`);

--
-- Indexes for table `mv_types_cote`
--
ALTER TABLE `mv_types_cote`
  ADD PRIMARY KEY (`id_type_cote`);

--
-- Indexes for table `mv_types_etudes`
--
ALTER TABLE `mv_types_etudes`
  ADD PRIMARY KEY (`id_types_etudes`);

--
-- Indexes for table `mv_types_infraction`
--
ALTER TABLE `mv_types_infraction`
  ADD PRIMARY KEY (`id_type_infraction`);

--
-- Indexes for table `mv_types_missions`
--
ALTER TABLE `mv_types_missions`
  ADD PRIMARY KEY (`id_type_mission`);

--
-- Indexes for table `mv_types_peine`
--
ALTER TABLE `mv_types_peine`
  ADD PRIMARY KEY (`id_type_peine`);

--
-- Indexes for table `mv_types_punition`
--
ALTER TABLE `mv_types_punition`
  ADD PRIMARY KEY (`id_type_punition`);

--
-- Indexes for table `mv_types_renforcement`
--
ALTER TABLE `mv_types_renforcement`
  ADD PRIMARY KEY (`id_type_renforcement`);

--
-- Indexes for table `mv_types_sortie_service`
--
ALTER TABLE `mv_types_sortie_service`
  ADD PRIMARY KEY (`id_type_sortie`);

--
-- Indexes for table `mv_type_distiction_honorifiques`
--
ALTER TABLE `mv_type_distiction_honorifiques`
  ADD PRIMARY KEY (`id_type_distiction`);

--
-- Indexes for table `mv_unites_nbre`
--
ALTER TABLE `mv_unites_nbre`
  ADD PRIMARY KEY (`id_unite_nbre`);

--
-- Indexes for table `_connections`
--
ALTER TABLE `_connections`
  ADD PRIMARY KEY (`cnt_id`),
  ADD UNIQUE KEY `token_connection` (`token_connection`),
  ADD KEY `mbr_id` (`usr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_collaborateurs`
--
ALTER TABLE `admin_collaborateurs`
  MODIFY `usr_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `admin_controllers`
--
ALTER TABLE `admin_controllers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `admin_permissions`
--
ALTER TABLE `admin_permissions`
  MODIFY `per_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `rol_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admin_roles_permissions`
--
ALTER TABLE `admin_roles_permissions`
  MODIFY `rol_per_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `usr_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `gr_ayants_droit`
--
ALTER TABLE `gr_ayants_droit`
  MODIFY `id_ayant_droit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gr_categories`
--
ALTER TABLE `gr_categories`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gr_categorie_ayant_droits`
--
ALTER TABLE `gr_categorie_ayant_droits`
  MODIFY `id_categorie_ayant_droit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gr_collines`
--
ALTER TABLE `gr_collines`
  MODIFY `id_colline` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gr_communes`
--
ALTER TABLE `gr_communes`
  MODIFY `id_commune` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gr_corps_origine`
--
ALTER TABLE `gr_corps_origine`
  MODIFY `id_corps_origine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gr_departements`
--
ALTER TABLE `gr_departements`
  MODIFY `id_departement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gr_documents_joints`
--
ALTER TABLE `gr_documents_joints`
  MODIFY `id_document` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gr_etat_civil`
--
ALTER TABLE `gr_etat_civil`
  MODIFY `id_etat_civil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gr_ethnies`
--
ALTER TABLE `gr_ethnies`
  MODIFY `id_ethnie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gr_fiche_carriere`
--
ALTER TABLE `gr_fiche_carriere`
  MODIFY `id_fiche_carriere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `gr_fiche_identification`
--
ALTER TABLE `gr_fiche_identification`
  MODIFY `id_identification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gr_fonctions`
--
ALTER TABLE `gr_fonctions`
  MODIFY `id_fonction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gr_grades`
--
ALTER TABLE `gr_grades`
  MODIFY `id_grade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gr_groupes_sanguin`
--
ALTER TABLE `gr_groupes_sanguin`
  MODIFY `id_gpe_sanguin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gr_historique_situations`
--
ALTER TABLE `gr_historique_situations`
  MODIFY `id_historique` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gr_niveaux_formation`
--
ALTER TABLE `gr_niveaux_formation`
  MODIFY `id_niveau_formation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gr_pays`
--
ALTER TABLE `gr_pays`
  MODIFY `id_pays` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gr_promotions`
--
ALTER TABLE `gr_promotions`
  MODIFY `id_promotion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gr_provinces`
--
ALTER TABLE `gr_provinces`
  MODIFY `id_province` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gr_religions`
--
ALTER TABLE `gr_religions`
  MODIFY `id_religion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gr_services`
--
ALTER TABLE `gr_services`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gr_sexes`
--
ALTER TABLE `gr_sexes`
  MODIFY `id_sexe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gr_situations`
--
ALTER TABLE `gr_situations`
  MODIFY `id_situation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gr_sous_categories`
--
ALTER TABLE `gr_sous_categories`
  MODIFY `id_sous_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gr_specialites`
--
ALTER TABLE `gr_specialites`
  MODIFY `id_specialite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gr_statuts`
--
ALTER TABLE `gr_statuts`
  MODIFY `id_statut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gr_type_documents`
--
ALTER TABLE `gr_type_documents`
  MODIFY `id_type_document` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gr_unites`
--
ALTER TABLE `gr_unites`
  MODIFY `id_unite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mv_absences`
--
ALTER TABLE `mv_absences`
  MODIFY `id_absence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mv_accidents_roulage`
--
ALTER TABLE `mv_accidents_roulage`
  MODIFY `id_accident` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mv_accidents_travail`
--
ALTER TABLE `mv_accidents_travail`
  MODIFY `id_accident` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mv_actions_disciplinaires`
--
ALTER TABLE `mv_actions_disciplinaires`
  MODIFY `id_action_disciplinaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mv_avancement_grades`
--
ALTER TABLE `mv_avancement_grades`
  MODIFY `id_avancement_grade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mv_conges`
--
ALTER TABLE `mv_conges`
  MODIFY `id_conge` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mv_cotations`
--
ALTER TABLE `mv_cotations`
  MODIFY `id_cotation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mv_dictinctions_honorifiques`
--
ALTER TABLE `mv_dictinctions_honorifiques`
  MODIFY `id_distinction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mv_dossiers_penals`
--
ALTER TABLE `mv_dossiers_penals`
  MODIFY `id_dossier_penal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mv_entrees_en_service`
--
ALTER TABLE `mv_entrees_en_service`
  MODIFY `id_entree_service` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mv_etudes_faites`
--
ALTER TABLE `mv_etudes_faites`
  MODIFY `id_etudes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mv_exemptions_service`
--
ALTER TABLE `mv_exemptions_service`
  MODIFY `id_exemption` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mv_fiche_mutations`
--
ALTER TABLE `mv_fiche_mutations`
  MODIFY `id_mutation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mv_formations_stages`
--
ALTER TABLE `mv_formations_stages`
  MODIFY `id_formation_stage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mv_missions`
--
ALTER TABLE `mv_missions`
  MODIFY `id_mission` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mv_renforcements`
--
ALTER TABLE `mv_renforcements`
  MODIFY `id_renforcement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mv_sorties_service`
--
ALTER TABLE `mv_sorties_service`
  MODIFY `id_sortie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mv_stages`
--
ALTER TABLE `mv_stages`
  MODIFY `id_stage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mv_types_conges`
--
ALTER TABLE `mv_types_conges`
  MODIFY `id_type_conge` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mv_types_cote`
--
ALTER TABLE `mv_types_cote`
  MODIFY `id_type_cote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mv_types_etudes`
--
ALTER TABLE `mv_types_etudes`
  MODIFY `id_types_etudes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mv_types_infraction`
--
ALTER TABLE `mv_types_infraction`
  MODIFY `id_type_infraction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mv_types_missions`
--
ALTER TABLE `mv_types_missions`
  MODIFY `id_type_mission` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mv_types_peine`
--
ALTER TABLE `mv_types_peine`
  MODIFY `id_type_peine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mv_types_punition`
--
ALTER TABLE `mv_types_punition`
  MODIFY `id_type_punition` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mv_types_renforcement`
--
ALTER TABLE `mv_types_renforcement`
  MODIFY `id_type_renforcement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mv_types_sortie_service`
--
ALTER TABLE `mv_types_sortie_service`
  MODIFY `id_type_sortie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mv_type_distiction_honorifiques`
--
ALTER TABLE `mv_type_distiction_honorifiques`
  MODIFY `id_type_distiction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mv_unites_nbre`
--
ALTER TABLE `mv_unites_nbre`
  MODIFY `id_unite_nbre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `_connections`
--
ALTER TABLE `_connections`
  MODIFY `cnt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=804;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gr_ayants_droit`
--
ALTER TABLE `gr_ayants_droit`
  ADD CONSTRAINT `id_categorie_ayant_droit` FOREIGN KEY (`id_categorie_ayant_droit`) REFERENCES `gr_categorie_ayant_droits` (`id_categorie_ayant_droit`),
  ADD CONSTRAINT `id_identification` FOREIGN KEY (`id_identification`) REFERENCES `gr_fiche_identification` (`id_identification`);

--
-- Constraints for table `gr_collines`
--
ALTER TABLE `gr_collines`
  ADD CONSTRAINT `id_commune` FOREIGN KEY (`id_commune`) REFERENCES `gr_communes` (`id_commune`);

--
-- Constraints for table `gr_communes`
--
ALTER TABLE `gr_communes`
  ADD CONSTRAINT `id_province` FOREIGN KEY (`id_province`) REFERENCES `gr_provinces` (`id_province`);

--
-- Constraints for table `gr_documents_joints`
--
ALTER TABLE `gr_documents_joints`
  ADD CONSTRAINT `id_identification_documents_joints` FOREIGN KEY (`id_identification`) REFERENCES `gr_fiche_identification` (`id_identification`),
  ADD CONSTRAINT `id_type_document_documents_joints` FOREIGN KEY (`id_type_document`) REFERENCES `gr_type_documents` (`id_type_document`);

--
-- Constraints for table `gr_fiche_carriere`
--
ALTER TABLE `gr_fiche_carriere`
  ADD CONSTRAINT `id_categorie_carriere` FOREIGN KEY (`id_categorie`) REFERENCES `gr_categories` (`id_categorie`),
  ADD CONSTRAINT `id_departement_carriere` FOREIGN KEY (`id_departement`) REFERENCES `gr_departements` (`id_departement`),
  ADD CONSTRAINT `id_fonction_carriere` FOREIGN KEY (`id_fonction`) REFERENCES `gr_fonctions` (`id_fonction`),
  ADD CONSTRAINT `id_identification_carriere` FOREIGN KEY (`id_identification`) REFERENCES `gr_fiche_identification` (`id_identification`),
  ADD CONSTRAINT `id_niveau_formation_carriere` FOREIGN KEY (`id_niveau_formation`) REFERENCES `gr_niveaux_formation` (`id_niveau_formation`),
  ADD CONSTRAINT `id_service_carriere` FOREIGN KEY (`id_service`) REFERENCES `gr_services` (`id_service`),
  ADD CONSTRAINT `id_sous_categorie_carriere` FOREIGN KEY (`id_sous_categorie`) REFERENCES `gr_sous_categories` (`id_sous_categorie`),
  ADD CONSTRAINT `id_specialite_carriere` FOREIGN KEY (`id_specialite`) REFERENCES `gr_specialites` (`id_specialite`),
  ADD CONSTRAINT `id_statut_carriere` FOREIGN KEY (`id_statut`) REFERENCES `gr_statuts` (`id_statut`),
  ADD CONSTRAINT `id_unite_carriere` FOREIGN KEY (`id_unite`) REFERENCES `gr_unites` (`id_unite`);

--
-- Constraints for table `gr_fiche_identification`
--
ALTER TABLE `gr_fiche_identification`
  ADD CONSTRAINT `id_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `gr_categories` (`id_categorie`),
  ADD CONSTRAINT `id_colline` FOREIGN KEY (`id_colline`) REFERENCES `gr_collines` (`id_colline`),
  ADD CONSTRAINT `id_corps_origine` FOREIGN KEY (`id_corps_origine`) REFERENCES `gr_corps_origine` (`id_corps_origine`),
  ADD CONSTRAINT `id_etat_civil` FOREIGN KEY (`id_etat_civil`) REFERENCES `gr_etat_civil` (`id_etat_civil`),
  ADD CONSTRAINT `id_ethnie` FOREIGN KEY (`id_ethnie`) REFERENCES `gr_ethnies` (`id_ethnie`),
  ADD CONSTRAINT `id_groupe_sanguin` FOREIGN KEY (`id_groupe_sanguin`) REFERENCES `gr_groupes_sanguin` (`id_gpe_sanguin`),
  ADD CONSTRAINT `id_pays_naissance` FOREIGN KEY (`id_pays_naissance`) REFERENCES `gr_pays` (`id_pays`),
  ADD CONSTRAINT `id_promotion` FOREIGN KEY (`id_promotion`) REFERENCES `gr_promotions` (`id_promotion`),
  ADD CONSTRAINT `id_religion` FOREIGN KEY (`id_religion`) REFERENCES `gr_religions` (`id_religion`),
  ADD CONSTRAINT `id_sexe` FOREIGN KEY (`id_sexe`) REFERENCES `gr_sexes` (`id_sexe`);

--
-- Constraints for table `gr_historique_grades`
--
ALTER TABLE `gr_historique_grades`
  ADD CONSTRAINT `id_grade_hist` FOREIGN KEY (`id_grade`) REFERENCES `gr_grades` (`id_grade`),
  ADD CONSTRAINT `id_identification_grades` FOREIGN KEY (`id_identification`) REFERENCES `gr_fiche_identification` (`id_identification`);

--
-- Constraints for table `gr_historique_situations`
--
ALTER TABLE `gr_historique_situations`
  ADD CONSTRAINT `id_identification_situations_idx` FOREIGN KEY (`id_identification`) REFERENCES `gr_fiche_identification` (`id_identification`),
  ADD CONSTRAINT `id_situation` FOREIGN KEY (`id_situation`) REFERENCES `gr_situations` (`id_situation`);

--
-- Constraints for table `mv_absences`
--
ALTER TABLE `mv_absences`
  ADD CONSTRAINT `id_identification_absences` FOREIGN KEY (`id_identification`) REFERENCES `gr_fiche_identification` (`id_identification`);

--
-- Constraints for table `mv_accidents_roulage`
--
ALTER TABLE `mv_accidents_roulage`
  ADD CONSTRAINT `identification_accidents` FOREIGN KEY (`id_identification`) REFERENCES `gr_fiche_identification` (`id_identification`);

--
-- Constraints for table `mv_accidents_travail`
--
ALTER TABLE `mv_accidents_travail`
  ADD CONSTRAINT `identification_acc_travail` FOREIGN KEY (`id_identification`) REFERENCES `gr_fiche_identification` (`id_identification`);

--
-- Constraints for table `mv_actions_disciplinaires`
--
ALTER TABLE `mv_actions_disciplinaires`
  ADD CONSTRAINT `id_type_punition` FOREIGN KEY (`id_type_punition`) REFERENCES `mv_types_punition` (`id_type_punition`);

--
-- Constraints for table `mv_avancement_grades`
--
ALTER TABLE `mv_avancement_grades`
  ADD CONSTRAINT `id_ancien_grade` FOREIGN KEY (`id_ancien_grade`) REFERENCES `gr_grades` (`id_grade`),
  ADD CONSTRAINT `id_categorieavancementgrades_` FOREIGN KEY (`id_categorie`) REFERENCES `gr_categories` (`id_categorie`),
  ADD CONSTRAINT `id_identificationavancementgrades_` FOREIGN KEY (`id_identification`) REFERENCES `gr_fiche_identification` (`id_identification`),
  ADD CONSTRAINT `id_nouveau_grade` FOREIGN KEY (`id_nouveau_grade`) REFERENCES `gr_grades` (`id_grade`);

--
-- Constraints for table `mv_conges`
--
ALTER TABLE `mv_conges`
  ADD CONSTRAINT `id_identification_conges` FOREIGN KEY (`id_identification`) REFERENCES `gr_fiche_identification` (`id_identification`),
  ADD CONSTRAINT `id_type_conge` FOREIGN KEY (`id_type_conge`) REFERENCES `mv_types_conges` (`id_type_conge`);

--
-- Constraints for table `mv_cotations`
--
ALTER TABLE `mv_cotations`
  ADD CONSTRAINT `id_identification_cotations` FOREIGN KEY (`id_identification`) REFERENCES `gr_fiche_identification` (`id_identification`),
  ADD CONSTRAINT `id_type_cotes` FOREIGN KEY (`id_type_cote`) REFERENCES `mv_types_cote` (`id_type_cote`);

--
-- Constraints for table `mv_dictinctions_honorifiques`
--
ALTER TABLE `mv_dictinctions_honorifiques`
  ADD CONSTRAINT `id_identification_distinctions` FOREIGN KEY (`id_identification`) REFERENCES `gr_fiche_identification` (`id_identification`),
  ADD CONSTRAINT `id_types_distinctions` FOREIGN KEY (`id_type_distiction`) REFERENCES `mv_type_distiction_honorifiques` (`id_type_distiction`);

--
-- Constraints for table `mv_dossiers_penals`
--
ALTER TABLE `mv_dossiers_penals`
  ADD CONSTRAINT `id_type_infraction` FOREIGN KEY (`id_type_infraction`) REFERENCES `mv_types_infraction` (`id_type_infraction`),
  ADD CONSTRAINT `id_type_peine` FOREIGN KEY (`id_type_peine`) REFERENCES `mv_types_peine` (`id_type_peine`),
  ADD CONSTRAINT `id_unite_nbre` FOREIGN KEY (`id_unite_nbre`) REFERENCES `mv_unites_nbre` (`id_unite_nbre`);

--
-- Constraints for table `mv_entrees_en_service`
--
ALTER TABLE `mv_entrees_en_service`
  ADD CONSTRAINT `id_identification_services` FOREIGN KEY (`id_identification`) REFERENCES `gr_fiche_identification` (`id_identification`);

--
-- Constraints for table `mv_etudes_faites`
--
ALTER TABLE `mv_etudes_faites`
  ADD CONSTRAINT `id_identification_etudes` FOREIGN KEY (`id_identification`) REFERENCES `gr_fiche_identification` (`id_identification`),
  ADD CONSTRAINT `id_pays_etudes` FOREIGN KEY (`id_pays`) REFERENCES `gr_pays` (`id_pays`),
  ADD CONSTRAINT `id_types_etudes` FOREIGN KEY (`id_type_etudes`) REFERENCES `mv_types_etudes` (`id_types_etudes`);

--
-- Constraints for table `mv_exemptions_service`
--
ALTER TABLE `mv_exemptions_service`
  ADD CONSTRAINT `identification_exemptions` FOREIGN KEY (`id_identification`) REFERENCES `gr_fiche_identification` (`id_identification`);

--
-- Constraints for table `mv_fiche_mutations`
--
ALTER TABLE `mv_fiche_mutations`
  ADD CONSTRAINT `id_ancien_service` FOREIGN KEY (`id_ancien_service`) REFERENCES `gr_services` (`id_service`),
  ADD CONSTRAINT `id_ancienne_fonction` FOREIGN KEY (`id_ancienne_fonction`) REFERENCES `gr_fonctions` (`id_fonction`),
  ADD CONSTRAINT `id_ancienne_unite` FOREIGN KEY (`id_ancienne_unite`) REFERENCES `gr_unites` (`id_unite`),
  ADD CONSTRAINT `id_identification_mutations` FOREIGN KEY (`id_identification`) REFERENCES `gr_fiche_identification` (`id_identification`),
  ADD CONSTRAINT `id_nouveau_service` FOREIGN KEY (`id_nouveau_service`) REFERENCES `gr_services` (`id_service`),
  ADD CONSTRAINT `id_nouvelle_fonction` FOREIGN KEY (`id_nouvelle_fonction`) REFERENCES `gr_fonctions` (`id_fonction`),
  ADD CONSTRAINT `id_nouvelle_unite` FOREIGN KEY (`id_nouvelle_unite`) REFERENCES `gr_unites` (`id_unite`);

--
-- Constraints for table `mv_formations_stages`
--
ALTER TABLE `mv_formations_stages`
  ADD CONSTRAINT `id_identification_formations_stages` FOREIGN KEY (`id_identification`) REFERENCES `gr_fiche_identification` (`id_identification`),
  ADD CONSTRAINT `id_pays` FOREIGN KEY (`id_pays`) REFERENCES `gr_pays` (`id_pays`),
  ADD CONSTRAINT `id_specialite_formations_stages` FOREIGN KEY (`id_specialite`) REFERENCES `gr_specialites` (`id_specialite`),
  ADD CONSTRAINT `id_stage` FOREIGN KEY (`id_stage`) REFERENCES `mv_stages` (`id_stage`);

--
-- Constraints for table `mv_missions`
--
ALTER TABLE `mv_missions`
  ADD CONSTRAINT `id_identification_missions` FOREIGN KEY (`id_identification`) REFERENCES `gr_fiche_identification` (`id_identification`),
  ADD CONSTRAINT `id_type_mission` FOREIGN KEY (`id_type_mission`) REFERENCES `mv_types_missions` (`id_type_mission`);

--
-- Constraints for table `mv_renforcements`
--
ALTER TABLE `mv_renforcements`
  ADD CONSTRAINT `id_identification_renforcements` FOREIGN KEY (`id_identification`) REFERENCES `gr_fiche_identification` (`id_identification`),
  ADD CONSTRAINT `id_pays_renforcements` FOREIGN KEY (`id_pays`) REFERENCES `gr_pays` (`id_pays`),
  ADD CONSTRAINT `id_type_renforcement` FOREIGN KEY (`id_type_renforcement`) REFERENCES `mv_types_renforcement` (`id_type_renforcement`);

--
-- Constraints for table `mv_sorties_service`
--
ALTER TABLE `mv_sorties_service`
  ADD CONSTRAINT `id_genre_sorties` FOREIGN KEY (`id_genre_sortie`) REFERENCES `mv_types_sortie_service` (`id_type_sortie`),
  ADD CONSTRAINT `id_identification_sorties` FOREIGN KEY (`id_identification`) REFERENCES `gr_fiche_identification` (`id_identification`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
