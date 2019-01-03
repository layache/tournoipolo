-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 03, 2019 at 06:52 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `metweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `Equipe`
--

CREATE TABLE `Equipe` (
  `idequipe` int(11) NOT NULL,
  `nomequipe` varchar(64) NOT NULL,
  `niveauequipe` int(250) NOT NULL,
  `logoequipe` varchar(266) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `joueurs`
--

CREATE TABLE `joueurs` (
  `idjoueur` int(11) NOT NULL,
  `nomjoueur` varchar(64) NOT NULL,
  `prenomjoueur` varchar(64) NOT NULL,
  `niveaujoueur` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `joueurs`
--

INSERT INTO `joueurs` (`idjoueur`, `nomjoueur`, `prenomjoueur`, `niveaujoueur`) VALUES
(1, 'RIGAUX', 'BRIEUC', 6),
(2, 'Ngoumou', 'Pierre-Henri ', 5),
(3, 'DELFOSSE', 'CLÉMENT', 5),
(4, 'CLAVEL', 'STANISLAS', 2),
(5, 'GOSSET', 'CLÉMENT', 3),
(6, 'GOSSET', 'CLÉMENT', 3),
(7, 'RIGAUX', 'BRIEUC', 6),
(8, 'Ngoumou', 'Pierre-Henri ', 5),
(9, 'DELFOSSE', 'CLÉMENT', 5),
(10, 'CLAVEL', 'STANISLAS', 2),
(11, 'GOSSET', 'CLÉMENT', 3),
(12, 'GOSSET', 'CLÉMENT', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Equipe`
--
ALTER TABLE `Equipe`
  ADD PRIMARY KEY (`idequipe`);

--
-- Indexes for table `joueurs`
--
ALTER TABLE `joueurs`
  ADD PRIMARY KEY (`idjoueur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `joueurs`
--
ALTER TABLE `joueurs`
  MODIFY `idjoueur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
