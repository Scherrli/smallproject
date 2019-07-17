-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 13. Jul 2019 um 18:00
-- Server-Version: 10.1.37-MariaDB
-- PHP-Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `immo`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `immobilien`
--

CREATE TABLE `immobilien` (
  `Immobilien` int(11) NOT NULL,
  `Titel` varchar(255) NOT NULL,
  `Groesse` int(11) NOT NULL,
  `Lage` varchar(100) NOT NULL,
  `Dokumente` varchar(255) NOT NULL,
  `Preis` decimal(10,0) NOT NULL,
  `Bereich_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `immobilien`
--

INSERT INTO `immobilien` (`Immobilien`, `Titel`, `Groesse`, `Lage`, `Dokumente`, `Preis`, `Bereich_ID`) VALUES
(1, 'Villa', 213, '8324 Kirchberg an der Raab, Steiermark', '', '1000000', 1),
(2, 'Einfamilienhaus', 123, '8324 Kirchberg an der Raab, Steiermark', '', '400000', 1),
(3, 'Wohnung', 67, '8324 Kirchberg an der Raab, Steiermark', '', '499', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `immo_bereich`
--

CREATE TABLE `immo_bereich` (
  `ID` int(11) NOT NULL,
  `Bereich` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `immo_bereich`
--

INSERT INTO `immo_bereich` (`ID`, `Bereich`) VALUES
(1, 'Haus'),
(2, 'Wohnung');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `interessenten`
--

CREATE TABLE `interessenten` (
  `ID` int(11) NOT NULL,
  `Vorname` varchar(100) NOT NULL,
  `Nachname` varchar(100) NOT NULL,
  `PLZ` varchar(6) NOT NULL,
  `Benutzername` varchar(100) NOT NULL,
  `Passwort` varchar(255) NOT NULL,
  `Anmeldezeit` datetime DEFAULT NULL,
  `Bereich_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `interessenten`
--

INSERT INTO `interessenten` (`ID`, `Vorname`, `Nachname`, `PLZ`, `Benutzername`, `Passwort`, `Anmeldezeit`, `Bereich_ID`) VALUES
(1, 'test', 'test', '8324', 'user1', '$2y$10$lfFQ9VYrWP5ypq9kTq/ETuSePbaokoHvcjYHeTbb8N.VQXPF2jiI.', '2019-07-05 00:00:00', 1),
(2, 'test2', 'test', '8324', 'user2', '$2y$10$lfFQ9VYrWP5ypq9kTq/ETuSePbaokoHvcjYHeTbb8N.VQXPF2jiI.', '2019-07-10 06:10:00', 2),
(5, 'test3', 'test', '8324', 'user3', '$2y$10$4GwR8MN4Uf6T4Jh8AJ9PLe1NZPd4O.it.UB2Cu52P1WPuawmihzfq', '2019-07-07 17:24:37', 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `makler`
--

CREATE TABLE `makler` (
  `ID` int(11) NOT NULL,
  `Vorname` varchar(100) NOT NULL,
  `Nachname` varchar(100) NOT NULL,
  `Benutzername` varchar(100) NOT NULL,
  `Passwort` varchar(255) NOT NULL,
  `Admin-Rechte` tinyint(1) NOT NULL DEFAULT '0',
  `Bereich_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `makler`
--

INSERT INTO `makler` (`ID`, `Vorname`, `Nachname`, `Benutzername`, `Passwort`, `Admin-Rechte`, `Bereich_ID`) VALUES
(1, 'admin', 'admin', 'admin', '$2y$10$lfFQ9VYrWP5ypq9kTq/ETuSePbaokoHvcjYHeTbb8N.VQXPF2jiI.', 1, 1),
(2, 'Matthias', 'Scherr', 'scherrli', '$2y$10$lfFQ9VYrWP5ypq9kTq/ETuSePbaokoHvcjYHeTbb8N.VQXPF2jiI.', 0, 2);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `immobilien`
--
ALTER TABLE `immobilien`
  ADD PRIMARY KEY (`Immobilien`);

--
-- Indizes für die Tabelle `immo_bereich`
--
ALTER TABLE `immo_bereich`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `interessenten`
--
ALTER TABLE `interessenten`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `makler`
--
ALTER TABLE `makler`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `immobilien`
--
ALTER TABLE `immobilien`
  MODIFY `Immobilien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `immo_bereich`
--
ALTER TABLE `immo_bereich`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `interessenten`
--
ALTER TABLE `interessenten`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `makler`
--
ALTER TABLE `makler`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
