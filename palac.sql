-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 20 Gru 2018, 06:52
-- Wersja serwera: 10.1.36-MariaDB
-- Wersja PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `palac`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `palac`
--

CREATE TABLE `palac` (
  `idgracza` int(11) NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `haslo` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `glos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `palac`
--

INSERT INTO `palac` (`idgracza`, `login`, `haslo`, `email`, `glos`) VALUES
(1, 'stasio', '$2y$10$OIqmGrKuWW1uGoJVfLQgAuNOXYpxvuIT4WwHaPj4/ksI1XrpuOVJ6', 's.piecho09@gmail.com', 3),
(6, 'damian', '$2y$10$38bCsmxKJNvgSqxGIJ1LLemUA1Z4vs54sf5BKZ/bnpFs68Hdw9iCq', 'damian@gmail.com', 0),
(7, 'marek', '$2y$10$Ltv2cfMFE4Rb3Ousxlv0COBVAKetuUPrWb7mXoczhWHc3iQ07WMtu', 'm@op.pl', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `palac`
--
ALTER TABLE `palac`
  ADD PRIMARY KEY (`idgracza`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `palac`
--
ALTER TABLE `palac`
  MODIFY `idgracza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
