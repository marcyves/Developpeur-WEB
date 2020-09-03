-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 26, 2019 at 11:15 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fanzine`
--
CREATE DATABASE IF NOT EXISTS `fanzine` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `fanzine`;

-- --------------------------------------------------------

--
-- Table structure for table `compose`
--

CREATE TABLE `compose` (
  `groupe_id` int(11) NOT NULL,
  `artiste_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `createur`
--

CREATE TABLE `createur` (
  `createur_id` int(11) NOT NULL,
  `createur_nom` varchar(80) COLLATE utf8_bin NOT NULL,
  `createur_prenom` varchar(80) COLLATE utf8_bin DEFAULT NULL,
  `createur_description` text COLLATE utf8_bin NOT NULL,
  `createur_type` enum('Groupe','Artiste') COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `fan_x_createur`
--

CREATE TABLE `fan_x_createur` (
  `utilisateur_id` int(11) NOT NULL,
  `createur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `fan_x_oeuvre`
--

CREATE TABLE `fan_x_oeuvre` (
  `utilisateur_id` int(11) NOT NULL,
  `oeuvre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `oeuvre`
--

CREATE TABLE `oeuvre` (
  `oeuvre_id` int(11) NOT NULL,
  `oeuvre_nom` varchar(80) COLLATE utf8_bin NOT NULL,
  `oeuvre_description` text COLLATE utf8_bin NOT NULL,
  `oeuvre_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `oeuvre_x_createur`
--

CREATE TABLE `oeuvre_x_createur` (
  `oeuvre_id` int(11) NOT NULL,
  `createur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `type_nom` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `utilisateur_id` int(11) NOT NULL,
  `utilisateur_pseudo` varchar(60) COLLATE utf8_bin NOT NULL,
  `utilisateur_passe` varchar(250) COLLATE utf8_bin NOT NULL,
  `utilisateur_prenom` varchar(80) COLLATE utf8_bin NOT NULL,
  `utilisateur_nom` varchar(80) COLLATE utf8_bin NOT NULL,
  `utilisateur_email` varchar(80) COLLATE utf8_bin NOT NULL,
  `utilisateur_avatar_url` varchar(200) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `compose`
--
ALTER TABLE `compose`
  ADD PRIMARY KEY (`groupe_id`,`artiste_id`),
  ADD KEY `createur_enfant` (`artiste_id`);

--
-- Indexes for table `createur`
--
ALTER TABLE `createur`
  ADD PRIMARY KEY (`createur_id`);

--
-- Indexes for table `fan_x_createur`
--
ALTER TABLE `fan_x_createur`
  ADD PRIMARY KEY (`utilisateur_id`,`createur_id`),
  ADD KEY `createur` (`createur_id`);

--
-- Indexes for table `fan_x_oeuvre`
--
ALTER TABLE `fan_x_oeuvre`
  ADD PRIMARY KEY (`utilisateur_id`,`oeuvre_id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`),
  ADD KEY `oeuvre` (`oeuvre_id`);

--
-- Indexes for table `oeuvre`
--
ALTER TABLE `oeuvre`
  ADD PRIMARY KEY (`oeuvre_id`),
  ADD KEY `type_oeuvre` (`oeuvre_type_id`);

--
-- Indexes for table `oeuvre_x_createur`
--
ALTER TABLE `oeuvre_x_createur`
  ADD PRIMARY KEY (`oeuvre_id`,`createur_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`utilisateur_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `createur`
--
ALTER TABLE `createur`
  MODIFY `createur_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oeuvre`
--
ALTER TABLE `oeuvre`
  MODIFY `oeuvre_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `utilisateur_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `compose`
--
ALTER TABLE `compose`
  ADD CONSTRAINT `createur_enfant` FOREIGN KEY (`artiste_id`) REFERENCES `createur` (`createur_id`),
  ADD CONSTRAINT `createur_parent` FOREIGN KEY (`groupe_id`) REFERENCES `createur` (`createur_id`);

--
-- Constraints for table `fan_x_createur`
--
ALTER TABLE `fan_x_createur`
  ADD CONSTRAINT `createur` FOREIGN KEY (`createur_id`) REFERENCES `createur` (`createur_id`),
  ADD CONSTRAINT `utilisateur_createur` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`utilisateur_id`);

--
-- Constraints for table `fan_x_oeuvre`
--
ALTER TABLE `fan_x_oeuvre`
  ADD CONSTRAINT `oeuvre` FOREIGN KEY (`oeuvre_id`) REFERENCES `oeuvre` (`oeuvre_id`),
  ADD CONSTRAINT `utilisateur` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`utilisateur_id`);

--
-- Constraints for table `oeuvre`
--
ALTER TABLE `oeuvre`
  ADD CONSTRAINT `type_oeuvre` FOREIGN KEY (`oeuvre_type_id`) REFERENCES `type` (`type_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
