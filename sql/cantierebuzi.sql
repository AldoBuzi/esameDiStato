-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 03, 2021 alle 22:11
-- Versione del server: 10.4.18-MariaDB
-- Versione PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cantierebuzi`
--
CREATE DATABASE IF NOT EXISTS `cantierebuzi` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cantierebuzi`;

-- --------------------------------------------------------

--
-- Struttura della tabella `assegnazione`
--

DROP TABLE IF EXISTS `assegnazione`;
CREATE TABLE `assegnazione` (
  `Nome` varchar(40) NOT NULL,
  `NomeOperazione` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `cantiere`
--

DROP TABLE IF EXISTS `cantiere`;
CREATE TABLE `cantiere` (
  `NumCantiere` bigint(20) NOT NULL,
  `Committente` varchar(60) NOT NULL,
  `Via` varchar(70) NOT NULL,
  `Architetto` varchar(60) NOT NULL,
  `CapoEd` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `cantiere`
--

INSERT INTO `cantiere` (`NumCantiere`, `Committente`, `Via`, `Architetto`, `CapoEd`) VALUES
(1, 'Paolo Rossi', 'Via Cosa n°23 Castiglione della pescaia', 'Michele', 'Buzi');

-- --------------------------------------------------------

--
-- Struttura della tabella `dpi`
--

DROP TABLE IF EXISTS `dpi`;
CREATE TABLE `dpi` (
  `Nome` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `indossa`
--

DROP TABLE IF EXISTS `indossa`;
CREATE TABLE `indossa` (
  `Email` varchar(40) NOT NULL,
  `Nome` varchar(40) NOT NULL,
  `NomeOperazione` varchar(40) NOT NULL,
  `Prelevato` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `operazione`
--

DROP TABLE IF EXISTS `operazione`;
CREATE TABLE `operazione` (
  `NomeOperazione` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `svolge`
--

DROP TABLE IF EXISTS `svolge`;
CREATE TABLE `svolge` (
  `NumCantiere` bigint(20) NOT NULL,
  `NomeOperazione` varchar(40) NOT NULL,
  `DataInizio` date NOT NULL,
  `DataFine` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

DROP TABLE IF EXISTS `utente`;
CREATE TABLE `utente` (
  `Email` varchar(40) NOT NULL,
  `Pass` varchar(40) NOT NULL,
  `CF` varchar(16) NOT NULL,
  `Nome` varchar(40) DEFAULT NULL,
  `Cognome` varchar(40) DEFAULT NULL,
  `DataNasc` date DEFAULT NULL,
  `LuogoNasc` varchar(40) DEFAULT NULL,
  `TipoUt` tinyint(1) NOT NULL,
  `NumCantiere` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`Email`, `Pass`, `CF`, `Nome`, `Cognome`, `DataNasc`, `LuogoNasc`, `TipoUt`, `NumCantiere`) VALUES
('aldomob00@gmail.com', 'Pass123', 'BZUDLD02B02Z115U', 'Donaldo', 'Buzi', '2002-02-02', 'Grecia', 1, 1),
('operaio@gmail.com', 'Pass1233', 'SSSFFFDDDLLL1', 'Operaio', 'Operaio', '2000-11-09', 'Italia', 0, 1),
('polo@gmail.com', 'pass', 'POLOITIS1001', 'Gabriele', 'Rossi', '1986-05-15', 'Italia', 0, 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `assegnazione`
--
ALTER TABLE `assegnazione`
  ADD PRIMARY KEY (`Nome`,`NomeOperazione`),
  ADD KEY `NomeOperazione` (`NomeOperazione`);

--
-- Indici per le tabelle `cantiere`
--
ALTER TABLE `cantiere`
  ADD PRIMARY KEY (`NumCantiere`);

--
-- Indici per le tabelle `dpi`
--
ALTER TABLE `dpi`
  ADD PRIMARY KEY (`Nome`);

--
-- Indici per le tabelle `indossa`
--
ALTER TABLE `indossa`
  ADD PRIMARY KEY (`Email`,`Nome`,`NomeOperazione`),
  ADD KEY `Nome` (`Nome`),
  ADD KEY `NomeOperazione` (`NomeOperazione`);

--
-- Indici per le tabelle `operazione`
--
ALTER TABLE `operazione`
  ADD PRIMARY KEY (`NomeOperazione`);

--
-- Indici per le tabelle `svolge`
--
ALTER TABLE `svolge`
  ADD PRIMARY KEY (`NumCantiere`,`NomeOperazione`),
  ADD KEY `NomeOperazione` (`NomeOperazione`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`Email`),
  ADD KEY `NumCantiere` (`NumCantiere`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `cantiere`
--
ALTER TABLE `cantiere`
  MODIFY `NumCantiere` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `assegnazione`
--
ALTER TABLE `assegnazione`
  ADD CONSTRAINT `assegnazione_ibfk_1` FOREIGN KEY (`Nome`) REFERENCES `dpi` (`Nome`),
  ADD CONSTRAINT `assegnazione_ibfk_2` FOREIGN KEY (`NomeOperazione`) REFERENCES `operazione` (`NomeOperazione`);

--
-- Limiti per la tabella `indossa`
--
ALTER TABLE `indossa`
  ADD CONSTRAINT `indossa_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `utente` (`Email`),
  ADD CONSTRAINT `indossa_ibfk_2` FOREIGN KEY (`Nome`) REFERENCES `assegnazione` (`Nome`),
  ADD CONSTRAINT `indossa_ibfk_3` FOREIGN KEY (`NomeOperazione`) REFERENCES `assegnazione` (`NomeOperazione`);

--
-- Limiti per la tabella `svolge`
--
ALTER TABLE `svolge`
  ADD CONSTRAINT `svolge_ibfk_1` FOREIGN KEY (`NumCantiere`) REFERENCES `cantiere` (`NumCantiere`),
  ADD CONSTRAINT `svolge_ibfk_2` FOREIGN KEY (`NomeOperazione`) REFERENCES `operazione` (`NomeOperazione`);

--
-- Limiti per la tabella `utente`
--
ALTER TABLE `utente`
  ADD CONSTRAINT `utente_ibfk_1` FOREIGN KEY (`NumCantiere`) REFERENCES `cantiere` (`NumCantiere`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
