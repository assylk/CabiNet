-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 18 mars 2024 à 14:02
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cabinetDB`
--

-- --------------------------------------------------------

--
-- Structure de la table `tblappointment`
--

CREATE TABLE `tblappointment` (
  `ID` int(10) NOT NULL,
  `AppointmentNumber` int(10) DEFAULT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `CIN` int(8) DEFAULT NULL,
  `MobileNumber` bigint(20) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `AppointmentDate` date DEFAULT NULL,
  `AppointmentTime` time DEFAULT NULL,
  `Specialization` varchar(250) DEFAULT NULL,
  `Doctor` varchar(255) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `ApplyDate` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(250) DEFAULT NULL,
  `Status` varchar(250) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Ordannance` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `tblappointment`
--

INSERT INTO `tblappointment` (`ID`, `AppointmentNumber`, `Name`, `CIN`, `MobileNumber`, `Email`, `AppointmentDate`, `AppointmentTime`, `Specialization`, `Doctor`, `Message`, `ApplyDate`, `Remark`, `Status`, `UpdationDate`, `Ordannance`) VALUES
(1, 160845649, 'Monta', NULL, 123456789, 'monta@gmail.com', '2024-03-07', '11:11:00', '2', '6', 'test', '2024-03-06 09:39:36', 'ke', 'Approved', '2024-03-17 23:53:21', 'keskes'),
(16, 324918990, 'Assyl', 12123123, 2132232132, 'Assyl@gmail.com', '2024-03-17', '12:23:00', '6', '6', 'zadzza', '2024-03-16 11:50:34', 'dazd', 'Approved', '2024-03-17 23:31:48', 'dadzad'),
(23, 483448490, 'assyssss', 121, 121, 'Assyl@gmail.com', '2024-03-28', '04:01:00', NULL, '6', 'zaazd', '2024-03-16 20:30:19', NULL, NULL, '2024-03-17 16:55:46', NULL),
(24, 487256640, 'bes', NULL, 2132232132, 'bes@gmail.com', '2024-03-19', '10:00:00', '6', '6', 'besbes', '2024-03-17 23:26:49', NULL, NULL, '2024-03-17 23:34:49', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tbldoctor`
--

CREATE TABLE `tbldoctor` (
  `ID` int(5) NOT NULL,
  `FullName` varchar(250) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Specialization` varchar(250) DEFAULT NULL,
  `Password` varchar(259) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `tbldoctor`
--

INSERT INTO `tbldoctor` (`ID`, `FullName`, `MobileNumber`, `Email`, `Specialization`, `Password`, `CreationDate`) VALUES
(1, 'Dr. Anusakha Singh', 9787979798, 'anu@gmail.com', '1', 'f925916e2754e5e03f75dd58a5733251', '2022-11-09 15:01:11'),
(2, 'Dr. Pradeep Chauhan', 6464654646, 'pra@gmail.com', '2', '202cb962ac59075b964b07152d234b70', '2022-11-09 15:01:59'),
(3, 'Garima Singh', 14253625, 'gs123@test.com', '7', 'f925916e2754e5e03f75dd58a5733251', '2022-11-11 01:28:44'),
(4, 'Shiv Kumar Singh', 1231231230, 'skmr123@test.com', '4', 'f925916e2754e5e03f75dd58a5733251', '2022-11-11 01:54:44'),
(5, 'xxx', 1212, 'xx@yahoo.com', '12', '908f112ebaf3916228c8769fe0d1fb31', '2024-03-02 13:14:39'),
(6, 'Dr.Ba3nanou Hamm', 12345678, 'ba3@yahoo.com', '6', '202cb962ac59075b964b07152d234b70', '2024-03-06 09:37:20');

-- --------------------------------------------------------

--
-- Structure de la table `tblordonnance`
--

CREATE TABLE `tblordonnance` (
  `id` int(11) NOT NULL,
  `appoID` bigint(10) NOT NULL,
  `ordonnance` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tblordonnance`
--

INSERT INTO `tblordonnance` (`id`, `appoID`, `ordonnance`, `remark`) VALUES
(1, 321, 'zazda', 'zdzdaz'),
(2, 12312, 'zdzdzaz', 'dzazz');

-- --------------------------------------------------------

--
-- Structure de la table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL,
  `Timing` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `Timing`) VALUES
(1, 'aboutus', 'About Us', '<div><font color=\"#202124\" face=\"arial, sans-serif\"><b>Our mission declares our purpose of existence as a company and our objectives.</b></font></div><div><font color=\"#202124\" face=\"arial, sans-serif\"><b><br></b></font></div><div><font color=\"#202124\" face=\"arial, sans-serif\"><b>To give every customer much more than what he/she asks for in terms of quality, selection, value for money and customer service, by understanding local tastes and preferences and innovating constantly to eventually provide an unmatched experience in jewellery shopping.</b></font></div>', NULL, NULL, NULL, ''),
(2, 'contactus', 'Contact Us', '890,Sector 62, Gyan Sarovar, GAIL Noida(Delhi/NCR)', 'info@gmail.com', 7896541239, NULL, '10:30 am to 7:30 pm');

-- --------------------------------------------------------

--
-- Structure de la table `tblpatient`
--

CREATE TABLE `tblpatient` (
  `id` int(11) NOT NULL,
  `Name` int(255) NOT NULL,
  `MobileNumber` bigint(10) NOT NULL,
  `Email` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tblsalle`
--

CREATE TABLE `tblsalle` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tblsalle`
--

INSERT INTO `tblsalle` (`id`, `status`) VALUES
(1, 'true'),
(2, 'true');

-- --------------------------------------------------------

--
-- Structure de la table `tblsecretaire`
--

CREATE TABLE `tblsecretaire` (
  `ID` int(5) NOT NULL,
  `FullName` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `MobileNumber` bigint(10) NOT NULL,
  `Email` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Password` varchar(259) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tblsecretaire`
--

INSERT INTO `tblsecretaire` (`ID`, `FullName`, `MobileNumber`, `Email`, `Password`, `CreationDate`) VALUES
(3, 'M.Dalanda', 14253625, 'dalanda@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-03-02 13:24:15');

-- --------------------------------------------------------

--
-- Structure de la table `tblspecialization`
--

CREATE TABLE `tblspecialization` (
  `ID` int(5) NOT NULL,
  `Specialization` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `tblspecialization`
--

INSERT INTO `tblspecialization` (`ID`, `Specialization`, `CreationDate`) VALUES
(1, 'Orthopedics', '2022-11-09 14:22:33'),
(2, 'Internal Medicine', '2022-11-09 14:23:42'),
(3, 'Obstetrics and Gynecology', '2022-11-09 14:24:14'),
(4, 'Dermatology', '2022-11-09 14:24:42'),
(5, 'Pediatrics', '2022-11-09 14:25:06'),
(6, 'Radiology', '2022-11-09 14:25:31'),
(7, 'General Surgery', '2022-11-09 14:25:52'),
(8, 'Ophthalmology', '2022-11-09 14:27:18'),
(9, 'Family Medicine', '2022-11-09 14:27:52'),
(10, 'Chest Medicine', '2022-11-09 14:28:32'),
(11, 'Anesthesia', '2022-11-09 14:29:12'),
(12, 'Pathology', '2022-11-09 14:29:51'),
(13, 'ENT', '2022-11-09 14:30:13');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tblappointment`
--
ALTER TABLE `tblappointment`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `tbldoctor`
--
ALTER TABLE `tbldoctor`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `tblordonnance`
--
ALTER TABLE `tblordonnance`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tblsalle`
--
ALTER TABLE `tblsalle`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tblsecretaire`
--
ALTER TABLE `tblsecretaire`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `tblspecialization`
--
ALTER TABLE `tblspecialization`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tblappointment`
--
ALTER TABLE `tblappointment`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `tbldoctor`
--
ALTER TABLE `tbldoctor`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `tblordonnance`
--
ALTER TABLE `tblordonnance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tblsalle`
--
ALTER TABLE `tblsalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tblsecretaire`
--
ALTER TABLE `tblsecretaire`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tblspecialization`
--
ALTER TABLE `tblspecialization`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
