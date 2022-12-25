-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2022 at 10:10 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reli`
--

-- --------------------------------------------------------

--
-- Table structure for table `organizatori`
--

CREATE TABLE `organizatori` (
  `idOrganizatora` int(6) UNSIGNED NOT NULL,
  `ime` varchar(30) NOT NULL,
  `prezime` varchar(30) NOT NULL,
  `korisnickoIme` varchar(50) NOT NULL,
  `lozinka` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organizatori`
--

INSERT INTO `organizatori` (`idOrganizatora`, `ime`, `prezime`, `korisnickoIme`, `lozinka`) VALUES
(1, 'Milosav', 'Živković', 'milosavzivkovic04@gmail.com', 'somi1234'),
(2, 'Ana', 'Luković', 'alukovic04@gmail.com', 'ana1234'),
(3, 'Nikola', 'Krsmanović', 'nikola@gmail.com', 'krsman1234'),
(5, 'Sara', 'Vesković', 'sara@gmail.com', 'sara1234'),
(6, 'Pera', 'Perić', 'pera@gmail.com', 'pera1234');

-- --------------------------------------------------------

--
-- Table structure for table `prijave`
--

CREATE TABLE `prijave` (
  `idPrijave` int(6) UNSIGNED NOT NULL,
  `drzava` varchar(30) DEFAULT NULL,
  `datumOdrzavanja` date DEFAULT NULL,
  `takmicar` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prijave`
--

INSERT INTO `prijave` (`idPrijave`, `drzava`, `datumOdrzavanja`, `takmicar`) VALUES
(1, 'Argentina', '2023-01-03', 'Predrag'),
(2, 'Grčka', '2023-02-03', 'Predrag'),
(3, 'Nemačka', '2023-03-08', 'Predrag'),
(4, 'Monako', '2023-08-17', 'Predrag'),
(5, 'Monako', '2023-01-20', 'Andrija'),
(6, 'Švedska', '2023-03-01', 'Andrija'),
(7, 'Novi Zeland', '2023-04-13', 'Andrija'),
(8, 'Portugal', '2024-01-11', 'Andrija'),
(9, 'Monako', '2023-08-17', 'Andrija'),
(11, 'Monako', '2023-01-20', 'Nikola'),
(15, 'Švedska', '2023-03-01', 'Nikola'),
(16, 'Finska', '2024-08-13', 'Predrag'),
(17, 'Portugal', '2024-01-11', 'Predrag'),
(20, 'Monako', '2023-01-20', 'Predrag'),
(21, 'Argentina', '2023-01-03', 'Jovan'),
(22, 'Grčka', '2023-02-03', 'Jovan'),
(23, 'Švedska', '2023-03-01', 'Jovan'),
(24, 'Nemačka', '2023-03-08', 'Jovan'),
(25, 'Novi Zeland', '2023-04-13', 'Jovan'),
(26, 'Monako', '2023-08-17', 'Jovan'),
(27, 'Finska', '2024-08-13', 'Jovan'),
(28, 'Švedska', '2023-03-01', 'Predrag');

-- --------------------------------------------------------

--
-- Table structure for table `takmicari`
--

CREATE TABLE `takmicari` (
  `idTakmicara` int(6) UNSIGNED NOT NULL,
  `ime` varchar(30) NOT NULL,
  `prezime` varchar(30) NOT NULL,
  `korisnickoIme` varchar(50) NOT NULL,
  `lozinka` varchar(30) NOT NULL,
  `brojGodina` int(11) NOT NULL,
  `automobil` varchar(60) NOT NULL,
  `jacinaMotora` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `takmicari`
--

INSERT INTO `takmicari` (`idTakmicara`, `ime`, `prezime`, `korisnickoIme`, `lozinka`, `brojGodina`, `automobil`, `jacinaMotora`) VALUES
(1, 'Andrija', 'Baščarević', 'brzina@gmail.com', 'andrija123', 24, 'Audi A6', 120),
(2, 'Predrag', 'Babić', 'pedja@gmail.com', 'pedja123', 21, 'Porshe 911 GT3 RS', 510),
(4, 'Milena', 'Živković', 'milena@gmail.com', 'milena123', 23, 'Honda Civic TypeR', 120),
(5, 'Nikola', 'Rogonjić', 'rogonja@gmail.com', 'rogonja123', 30, 'VW Polo 1.4 gr.N', 220),
(6, 'Veljko', 'Kostović', 'kosta@gmail.com', 'kosta123', 28, 'pezo 106 N1400', 200),
(7, 'Jovana', 'Jaćović', 'jovana@gmail.com', 'jovana123', 27, 'honda integra type r', 250),
(8, 'Jovan', 'Jovanović', 'jovan@gmail.com', 'jovan123', 34, 'yugo', 80),
(9, 'Lazar', 'Stefanović', 'lazar@gmail.com', 'lazar123', 22, 'golf', 120);

-- --------------------------------------------------------

--
-- Table structure for table `trke`
--

CREATE TABLE `trke` (
  `idTrke` int(6) UNSIGNED NOT NULL,
  `drzava` varchar(30) NOT NULL,
  `datum` date NOT NULL,
  `organizator` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trke`
--

INSERT INTO `trke` (`idTrke`, `drzava`, `datum`, `organizator`) VALUES
(1, 'Argentina', '2023-01-03', 'Milosav'),
(2, 'Monako', '2023-08-17', 'Milosav'),
(3, 'Švedska', '2023-03-01', 'Nikola'),
(4, 'Grčka', '2023-02-03', 'Ana'),
(5, 'Portugal', '2024-01-11', 'Ana'),
(6, 'Nemačka', '2023-03-08', 'Sara'),
(7, 'Monako', '2023-01-20', 'Sara'),
(8, 'Novi Zeland', '2023-04-13', 'Nikola'),
(9, 'Finska', '2024-08-13', 'Sara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `organizatori`
--
ALTER TABLE `organizatori`
  ADD PRIMARY KEY (`idOrganizatora`);

--
-- Indexes for table `prijave`
--
ALTER TABLE `prijave`
  ADD PRIMARY KEY (`idPrijave`);

--
-- Indexes for table `takmicari`
--
ALTER TABLE `takmicari`
  ADD PRIMARY KEY (`idTakmicara`);

--
-- Indexes for table `trke`
--
ALTER TABLE `trke`
  ADD PRIMARY KEY (`idTrke`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `organizatori`
--
ALTER TABLE `organizatori`
  MODIFY `idOrganizatora` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prijave`
--
ALTER TABLE `prijave`
  MODIFY `idPrijave` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `takmicari`
--
ALTER TABLE `takmicari`
  MODIFY `idTakmicara` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `trke`
--
ALTER TABLE `trke`
  MODIFY `idTrke` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
