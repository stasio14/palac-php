-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 20 Gru 2018, 06:50
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
-- Struktura tabeli dla tabeli `wynik`
--

CREATE TABLE `wynik` (
  `idgry` int(40) NOT NULL,
  `nazwa_gry` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `glos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `wynik`
--

INSERT INTO `wynik` (`idgry`, `nazwa_gry`, `glos`) VALUES
(1, 'P. A. D.', 14),
(2, 'Untitled', 10),
(3, 'Illumni\'s Fun Theme!!!', 0),
(4, 'solider', 0),
(5, 'latające papugi', 0),
(6, 'Kalkulator_B', 9),
(7, 'gra elementy', 0),
(8, 'Take The Ball', 0),
(9, 'Wyjście do kina.', 0),
(10, 'labirynt nie do przejścia', 0),
(11, 'cs go simulator ', 0),
(12, 'słownik angielskiego', 0),
(13, 'odejmowanie', 0),
(14, 'pisanie słów', 0),
(15, 'dodawanie', 0),
(16, 'pisanie', 0),
(17, 'taniec nietoperza', 0),
(18, 'tajemnicza planeta', 0),
(19, 'rysownik', 0),
(20, 'kosmiczne rysowanie', 0),
(21, 'rysowanie 2', 0),
(22, 'rysowanie', 0),
(23, 'Gra Baba Jaga', 0),
(24, 'kosmiczny berek', 0),
(25, 'spacer', 0),
(26, 'awaria', 0),
(27, 'Scratch sie bawi na placu zabaw', 0),
(28, 'zabawa w chowanego', 0),
(29, 'czy jest dobre', 0),
(30, 'matematykaj', 0),
(31, 'tabliczka mnożenie_w', 0),
(32, 'kolorowy świat', 0),
(33, 'taniec_w', 0),
(34, 'gra 2_w', 0),
(35, 'coś dziwnego', 0),
(36, 'tabliczka mnożenia_I', 0),
(37, 'Green ball jumper', 0),
(38, 'pilka', 0),
(39, 'gra-2', 0),
(40, 'Padaczka.exe', 0),
(41, 'Walentynki', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `wynik`
--
ALTER TABLE `wynik`
  ADD PRIMARY KEY (`idgry`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `wynik`
--
ALTER TABLE `wynik`
  MODIFY `idgry` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
