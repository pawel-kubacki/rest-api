-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 12 Kwi 2023, 23:32
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `rest`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `surname` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `date_of_saving` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `clients`
--

INSERT INTO `clients` (`id`, `firstname`, `surname`, `email`, `password`, `date_of_saving`) VALUES
(7, 'Paweł', 'Pawełek', 'pawel@pawel.wp.pl', '$2y$10$iySjBr7JI5EQRLV1fHJtruekVdAdLNStWDFFK0QXMxj2WieDMWCeC', '2023-03-27 11:54:26'),
(8, 'Kasia', 'Kasiunia', 'kasia@kasia.wp.pl', '$2y$10$5UTNlfcPBGQhfDM2q/JfO.tKNGS75kYlkEb/wt3nexjoVmsFVrpFq', '2023-03-27 11:56:12'),
(9, 'Maciek', 'Maciej', 'maciek@maciek.wp.pl', '$2y$10$P5zEDmWEdW8TLgw2TYTorOeSAEGW/eqOeJoIK8a4S7QokTmNqrYpi', '2023-03-27 12:01:54'),
(10, 'Maciek', 'Maciej', 'maciek@maciek.wp.pl', '$2y$10$vM0MeduUtrWmZSol44bTnOPvaDfwZr3okFuBkOX6WQJF5mZzbKpxK', '2023-03-27 12:01:59'),
(14, 'Adam', 'Adamczyk', 'adam@adam.wp.pl', '$2y$10$Ph2bpMyBoM4mRslQAOYXDuGzrOC9DUrI9XCxor8po0EJKV04.XGRq', '2023-03-29 18:58:16'),
(15, 'Iga', 'Iga', 'iga@iga.wp.pl', '$2y$10$wbx8FAOcQ5qBtR9pJeBts.sPuXvZR1hnpqPg.OgFayFg73THEjRdG', '2023-03-30 23:09:33'),
(24, 'Staś', 'Stanisław', 'stanislaw@stanislaw.wp.pl', '$2y$10$BzT//OTYTFnBfbio.yfWi.tljJBc2L9gepNSTBZR.Sz.9swrJVyXC', '2023-04-01 00:52:37');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `clients_data`
--

CREATE TABLE `clients_data` (
  `id` int(11) NOT NULL,
  `id_of_client` int(11) NOT NULL,
  `assigned_employee` text NOT NULL,
  `recently_purchased` text NOT NULL,
  `total_amount` decimal(10,0) NOT NULL,
  `assigned_car` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `clients_data`
--

INSERT INTO `clients_data` (`id`, `id_of_client`, `assigned_employee`, `recently_purchased`, `total_amount`, `assigned_car`) VALUES
(1, 8, 'Employee Bartek', 'opony', '1000', 'Volvo'),
(2, 24, 'Employee Daria', 'silnik', '3000', 'Mercedes'),
(3, 10, 'Employee Maria', 'samochód', '100000', 'Audi'),
(4, 9, 'Employee Zbigniew', 'camping', '40000', 'BMW'),
(5, 7, 'Employee Mariusz', 'rozrząd', '1500', 'Volkswagen'),
(6, 14, 'Employee Agnieszka', 'Zestaw kół', '2500', 'Opel'),
(7, 15, 'Employee Jarek', 'karoseria', '5500', 'Mazda');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `used_cars`
--

CREATE TABLE `used_cars` (
  `id` int(11) NOT NULL,
  `model` text NOT NULL,
  `id_of_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `used_cars`
--

INSERT INTO `used_cars` (`id`, `model`, `id_of_client`) VALUES
(1, 'BMW, Mazda', 24),
(2, 'Opel, Ford, Dacia', 10),
(3, 'Peugeot, Renault, Fiat', 8),
(4, 'Mazda, Audi', 9),
(5, 'Toyota', 7),
(6, 'BMW, Toyota, Fiat', 14),
(7, 'Nissan, Kia, Audi', 15);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `clients_data`
--
ALTER TABLE `clients_data`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `used_cars`
--
ALTER TABLE `used_cars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT dla tabeli `clients_data`
--
ALTER TABLE `clients_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `used_cars`
--
ALTER TABLE `used_cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
