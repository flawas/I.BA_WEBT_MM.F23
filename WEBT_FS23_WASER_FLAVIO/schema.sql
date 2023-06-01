-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql24j10.db.hostpoint.internal
-- Erstellungszeit: 22. Mai 2023 um 20:49
-- Server-Version: 10.6.12-MariaDB-log
-- PHP-Version: 7.2.34

--
-- Datenbank: `flawasch_hslu`
--
CREATE DATABASE IF NOT EXISTS `flawasch_hslu` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `flawasch_hslu`;

--
-- Tabellenstruktur für Tabelle `webt_mep`
--

DROP TABLE IF EXISTS `webt_mep`;
CREATE TABLE `webt_mep` (
  `id` int(11) NOT NULL,
  `vorname` varchar(255) NOT NULL,
  `nachname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mannschaft` varchar(255) NOT NULL,
  `geburtstag` date NOT NULL,
  `bemerkungen` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `webt_mep`
--
ALTER TABLE `webt_mep`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `webt_mep`
--
ALTER TABLE `webt_mep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;