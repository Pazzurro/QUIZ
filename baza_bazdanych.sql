-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 19 Paź 2022, 09:03
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `quiz`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `answears`
--

CREATE TABLE `answears` (
  `id` int(11) NOT NULL,
  `content` longtext DEFAULT NULL,
  `isCorrect` tinyint(4) DEFAULT NULL,
  `Questions_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `answears`
--

INSERT INTO `answears` (`id`, `content`, `isCorrect`, `Questions_id`) VALUES
(1, '1', 0, 1),
(2, '5', 0, 1),
(3, '4', 1, 1),
(4, 'Renderowania obrazu', 1, 2),
(5, 'Generowania dźwięku', 0, 2),
(6, 'Chłodzenia komputera', 0, 2),
(7, '2540 x 1440', 0, 3),
(8, '1366 x 726', 0, 3),
(9, '1920 x 1080', 1, 3),
(10, 'PNG', 0, 4),
(11, 'TIFF', 0, 4),
(12, 'MP4', 1, 4),
(17, 'Biały', 0, 5),
(18, 'Żółty', 0, 5),
(19, 'Czarny', 1, 5),
(20, 'Pies', 0, 6),
(21, 'Łosoś', 1, 6),
(22, 'Sum', 1, 6),
(23, 'Kot', 0, 6),
(24, 'Dorsz', 1, 6),
(25, 'Merkury', 1, 7),
(26, 'Pluton', 0, 7),
(27, 'Ceres', 0, 7),
(28, 'Jowisz', 1, 7),
(29, 'Ziemia', 1, 7),
(30, 'Micro Jack', 0, 9),
(31, 'HDMI', 1, 9),
(32, 'Display Port', 1, 9),
(33, 'Ethernet', 0, 9),
(34, 'Berlin', 0, 10),
(35, 'Wiedeń', 0, 10),
(36, 'Sosnowiec', 1, 10),
(37, 'Radom', 1, 10),
(38, '24 godziny', 1, 8),
(39, '12 godzin', 0, 8),
(40, '3600 minut', 0, 8),
(41, '4 * 6 godzin', 1, 8);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `content` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `questions`
--

INSERT INTO `questions` (`id`, `content`) VALUES
(1, '2 + 2 to:'),
(2, 'Karta graficzna słuzy do generowania:'),
(3, 'Rozdzielczość FullHD wynosi:'),
(4, 'Plikiem graficznym nie jest:'),
(5, 'Kolorem czarnym jest:'),
(6, 'Rybą jest:'),
(7, 'Planetami układu słonecznego są'),
(8, 'Dzień trwa:'),
(9, 'Kablem do przesyłania obrazu są:'),
(10, 'Które miasto znajduje się w Polsce');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `students`
--

INSERT INTO `students` (`id`, `name`, `surname`) VALUES
(1, 'Damian', 'Kapral'),
(2, 'Janusz', 'Nowak'),
(3, 'Agata', 'Dąb');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `students_has_tests`
--

CREATE TABLE `students_has_tests` (
  `id` int(11) NOT NULL,
  `Students_id` int(11) NOT NULL,
  `Tests_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tests`
--

CREATE TABLE `tests` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tests_has_questions`
--

CREATE TABLE `tests_has_questions` (
  `id` varchar(45) NOT NULL,
  `Questions_id` int(11) NOT NULL,
  `Tests_id` int(11) NOT NULL,
  `questions_amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `answears`
--
ALTER TABLE `answears`
  ADD PRIMARY KEY (`id`,`Questions_id`);

--
-- Indeksy dla tabeli `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `students_has_tests`
--
ALTER TABLE `students_has_tests`
  ADD PRIMARY KEY (`Students_id`,`Tests_id`,`id`);

--
-- Indeksy dla tabeli `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `tests_has_questions`
--
ALTER TABLE `tests_has_questions`
  ADD PRIMARY KEY (`Questions_id`,`Tests_id`,`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `answears`
--
ALTER TABLE `answears`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT dla tabeli `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
