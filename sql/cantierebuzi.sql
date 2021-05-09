-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 09, 2021 alle 21:52
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

--
-- Dump dei dati per la tabella `assegnazione`
--

INSERT INTO `assegnazione` (`Nome`, `NomeOperazione`) VALUES
('Camice protezione CAT. III, CLASSE 6', 'imbiancare'),
('Camice protezione CAT. III, CLASSE 6', 'murature'),
('Indumenti di protezione', 'demolizioni'),
('Indumenti di protezione', 'murature'),
('Indumenti di protezione', 'pavimentazioni e rivestimenti'),
('Indumento di protezioneCamice', 'murature'),
('Indumento di protezioneCamice', 'strutture a secco'),
('Occhiali', 'pavimentazioni e rivestimenti'),
('Occhiali', 'scavi'),
('Semimaschera filtrante', 'impiantistica di condizionamento'),
('Semimaschera filtrante 2', 'impermeabilizzazioni e isolamenti'),
('Semimaschera filtrante 2', 'murature'),
('Semimaschera filtrante FFP2', 'strutture a secco'),
('semimaschera filtrante, Respirator Mask', 'imbiancare'),
('semimaschera filtrante, Respirator Mask', 'piastrellare'),
('Visiera SAFEGUARD', 'impermeabilizzazioni e isolamenti');

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
(1, 'Paolo Rossi', 'Via Cosa n°23 Castiglione della pescaia', 'Michele', 'Donaldo Buzi'),
(2, 'Zakaria Korchi', 'Via lago di garda n°3, Marina', 'Daniele Viti', 'Mario Rossi'),
(3, 'Giovanni Esposito', 'Via senese n°117, Grosseto', 'Michele Bartoletti', 'Andrea Crocchi'),
(4, 'Ciro Magalli', 'Via Reggiano n°123, Grosseto', 'Marta Simp', 'Giorgio Calandrelli'),
(5, 'Lorenzo Gaspar', 'Via castiglionese n°67, Grosseto', 'Daniele Viti', 'Donaldo Buzi');

-- --------------------------------------------------------

--
-- Struttura della tabella `dpi`
--

DROP TABLE IF EXISTS `dpi`;
CREATE TABLE `dpi` (
  `Nome` varchar(40) NOT NULL,
  `Modello` varchar(60) NOT NULL,
  `Produttore` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `dpi`
--

INSERT INTO `dpi` (`Nome`, `Modello`, `Produttore`) VALUES
('Camice protezione CAT. III, CLASSE 6', 'CAM038', 'NatoapratoSrl'),
('Indumenti di protezione', 'Cuffia ProtettivaCT', 'Cantalupo 1971 Srl'),
('Indumento di protezioneCamice', 'GACR000260792', 'Aprile Stefanelli Srl'),
('Occhiali', 'Lar Safe 01', 'LAR Spa'),
('Semimaschera filtrante', '8820', 'Camerson Spa'),
('Semimaschera filtrante 2', 'KB820', 'Dispositivi Industriali Italiani Srl'),
('Semimaschera filtrante FFP2', '14340', 'D&C Srl'),
('semimaschera filtrante, Respirator Mask', 'SR 9002', 'Sara BSK Srl'),
('Visiera', 'BOB2', 'Twin Srl'),
('Visiera fissa', '06A', 'Vesta Srl'),
('Visiera in policarbonato', '06B', 'Vesta Srl'),
('Visiera One', 'Scudo-comfort One', 'Complastic Srl'),
('Visiera parafiato trasparente', 'visiera', 'Enjoy Entertainment soc.coop'),
('Visiera SAFEGUARD', 'SAFEGUARD', 'Falcon Medical Italia Srl'),
('Visiera, PLEXX ', '9000.111/CE ', 'Ravazzolo srl');

-- --------------------------------------------------------

--
-- Struttura della tabella `operazione`
--

DROP TABLE IF EXISTS `operazione`;
CREATE TABLE `operazione` (
  `NomeOperazione` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `operazione`
--

INSERT INTO `operazione` (`NomeOperazione`) VALUES
('demolizioni'),
('imbiancare'),
('impermeabilizzazioni e isolamenti'),
('impiantistica di condizionamento'),
('murature'),
('pavimentazioni e rivestimenti'),
('piastrellare'),
('scavi'),
('strutture a secco');

-- --------------------------------------------------------

--
-- Struttura della tabella `svolge`
--

DROP TABLE IF EXISTS `svolge`;
CREATE TABLE `svolge` (
  `NumCantiere` bigint(20) NOT NULL,
  `NomeOperazione` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `svolge`
--

INSERT INTO `svolge` (`NumCantiere`, `NomeOperazione`) VALUES
(1, 'murature'),
(1, 'scavi'),
(2, 'pavimentazioni e rivestimenti'),
(3, 'piastrellare'),
(3, 'strutture a secco'),
(4, 'scavi'),
(5, 'impiantistica di condizionamento');

-- --------------------------------------------------------

--
-- Struttura della tabella `svolgeoperazione`
--

DROP TABLE IF EXISTS `svolgeoperazione`;
CREATE TABLE `svolgeoperazione` (
  `NomeDPI` varchar(40) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `NumCantiere` bigint(20) NOT NULL,
  `NomeOperazione` varchar(40) NOT NULL,
  `Durata` int(11) NOT NULL,
  `Data` date NOT NULL,
  `prelevato` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `svolgeoperazione`
--

INSERT INTO `svolgeoperazione` (`NomeDPI`, `Email`, `NumCantiere`, `NomeOperazione`, `Durata`, `Data`, `prelevato`) VALUES
('Camice protezione CAT. III, CLASSE 6', 'donaldobuzi77@gmail.com', 5, 'impiantistica di condizionamento', 4, '2021-05-10', 0),
('Occhiali', 'donaldobuzi77@gmail.com', 5, 'impiantistica di condizionamento', 3, '2021-05-13', 0),
('Indumenti di protezione', 'donaldobuzi77@gmail.com', 2, 'pavimentazioni e rivestimenti', 8, '2021-05-13', 0),
('Indumento di protezioneCamice', 'operaio@gmail.com', 4, 'impiantistica di condizionamento', 1, '2021-05-16', 0),
('Camice protezione CAT. III, CLASSE 6', 'operaio@gmail.com', 2, 'piastrellare', 7, '2021-06-02', 0),
('Indumenti di protezione', 'polo@gmail.com', 5, 'piastrellare', 2, '2021-08-04', 0),
('Occhiali', 'polo@gmail.com', 2, 'scavi', 3, '2021-07-01', 0);

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
  `TipoUt` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`Email`, `Pass`, `CF`, `Nome`, `Cognome`, `DataNasc`, `LuogoNasc`, `TipoUt`) VALUES
('donaldobuzi77@gmail.com', 'Password', 'BZUDLD02B02Z115U', 'Donaldo', 'Buzi', '2002-02-02', 'Grecia', 1),
('operaio@gmail.com', 'Pass1233', 'SSSFFFDDDLLL1', 'Operaio', 'Operaio', '2000-11-09', 'Italia', 0),
('polo@gmail.com', 'pass', 'POLOITIS1001', 'Gabriele', 'Rossi', '1986-05-15', 'Italia', 0);

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
-- Indici per le tabelle `svolgeoperazione`
--
ALTER TABLE `svolgeoperazione`
  ADD PRIMARY KEY (`Email`,`NomeOperazione`,`NumCantiere`,`NomeDPI`,`Data`),
  ADD KEY `NomeOperazione` (`NomeOperazione`),
  ADD KEY `NumCantiere` (`NumCantiere`),
  ADD KEY `NomeDPI` (`NomeDPI`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`Email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `cantiere`
--
ALTER TABLE `cantiere`
  MODIFY `NumCantiere` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Limiti per la tabella `svolge`
--
ALTER TABLE `svolge`
  ADD CONSTRAINT `svolge_ibfk_1` FOREIGN KEY (`NumCantiere`) REFERENCES `cantiere` (`NumCantiere`),
  ADD CONSTRAINT `svolge_ibfk_2` FOREIGN KEY (`NomeOperazione`) REFERENCES `operazione` (`NomeOperazione`);

--
-- Limiti per la tabella `svolgeoperazione`
--
ALTER TABLE `svolgeoperazione`
  ADD CONSTRAINT `svolgeoperazione_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `utente` (`Email`) ON UPDATE CASCADE,
  ADD CONSTRAINT `svolgeoperazione_ibfk_2` FOREIGN KEY (`NomeOperazione`) REFERENCES `svolge` (`NomeOperazione`),
  ADD CONSTRAINT `svolgeoperazione_ibfk_3` FOREIGN KEY (`NumCantiere`) REFERENCES `svolge` (`NumCantiere`),
  ADD CONSTRAINT `svolgeoperazione_ibfk_4` FOREIGN KEY (`NomeDPI`) REFERENCES `assegnazione` (`Nome`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
