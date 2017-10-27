-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2017 at 12:51 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `tadmins`
--

CREATE TABLE `tadmins` (
  `fIdAdmin` int(11) UNSIGNED NOT NULL,
  `fUsername` varchar(32) DEFAULT NULL,
  `fPassword` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tadmins`
--

INSERT INTO `tadmins` (`fIdAdmin`, `fUsername`, `fPassword`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tcategorii`
--

CREATE TABLE `tcategorii` (
  `fIdCategorie` int(11) UNSIGNED NOT NULL,
  `fNumeCategorie` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tcategorii`
--

INSERT INTO `tcategorii` (`fIdCategorie`, `fNumeCategorie`) VALUES
(1, 'MENIURI'),
(2, 'APERITIVE'),
(3, 'CIORBE/SUPE'),
(4, 'FELURI PRINCIPALE'),
(5, 'GARNITURI'),
(6, 'SALATE'),
(7, 'DESERT'),
(8, 'BAUTURI');

-- --------------------------------------------------------

--
-- Table structure for table `tcomentarii`
--

CREATE TABLE `tcomentarii` (
  `fIdComentariu` int(11) UNSIGNED NOT NULL,
  `fIdProdus` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `fIdUtilizator` int(11) NOT NULL DEFAULT '0',
  `fComentariu` varchar(100) DEFAULT NULL,
  `fData` date NOT NULL DEFAULT '0000-00-00',
  `fAprobat` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `fValoareVot` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tcomentarii`
--

INSERT INTO `tcomentarii` (`fIdComentariu`, `fIdProdus`, `fIdUtilizator`, `fComentariu`, `fData`, `fAprobat`, `fValoareVot`) VALUES
(22, 0, 8, 'a fost ok', '0000-00-00', 1, 3),
(25, 0, 10, 'delicios', '0000-00-00', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tcomenzi`
--

CREATE TABLE `tcomenzi` (
  `fIdComanda` int(11) UNSIGNED NOT NULL,
  `fIdUtilizator` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `fIdCupon` int(11) DEFAULT NULL,
  `fNumeCumparator` varchar(100) DEFAULT NULL,
  `fEmailCumparator` varchar(100) DEFAULT NULL,
  `fAdresaCumparator` text,
  `fDataComanda` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tcomenzi`
--

INSERT INTO `tcomenzi` (`fIdComanda`, `fIdUtilizator`, `fIdCupon`, `fNumeCumparator`, `fEmailCumparator`, `fAdresaCumparator`, `fDataComanda`) VALUES
(7, 7, NULL, 'david', 'david@gmail.com', '26-28 Mehedinti , Cluj Napoca', '2017-07-03'),
(6, 8, NULL, 'david1', 'david1@gmail.com', 'strada abs nr 12', '2017-07-03');

-- --------------------------------------------------------

--
-- Table structure for table `tcos`
--

CREATE TABLE `tcos` (
  `fIdItem` int(11) UNSIGNED NOT NULL,
  `fIdUtilizator` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `fIdProdus` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `fCantitate` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `fIdSesiune` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tproduse`
--

CREATE TABLE `tproduse` (
  `fIdProdus` int(11) UNSIGNED NOT NULL,
  `fIdSubcategorie` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `fNumeProdus` varchar(255) NOT NULL DEFAULT '',
  `fCodProdus` varchar(50) DEFAULT NULL,
  `fImagine` varchar(100) DEFAULT NULL,
  `fDescriere` varchar(255) DEFAULT NULL,
  `fPret` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tproduse`
--

INSERT INTO `tproduse` (`fIdProdus`, `fIdSubcategorie`, `fNumeProdus`, `fCodProdus`, `fImagine`, `fDescriere`, `fPret`) VALUES
(1, 1, 'Meniul1', '12', '1.jpg', '1 Pizza Capriciossa + 1 portie Clatite Dulceata', '25'),
(11, 8, 'Supa crema de sparanghel', '11', '7.jpg', 'sparanghel,morcovi,telina,zucchini,ceapa alba', '8'),
(2, 1, 'Meniul2', '2', '1.jpg', '1 ciorba Vacuta + Snitel Pui + Cartofi Prajiti', '25'),
(10, 7, 'Ciorba de vacuta', '10', '6.jpg', 'pulpa de vita,cartofi,telina,morcovi,ardei gras,ceapa alba', '7'),
(3, 1, 'Meniul 3', '3', '1.jpg', '1 Ciorba Vacuta+ 1 Spaghete Carbonara', '25'),
(8, 5, 'Mix aperitiv de post', '8', '4.jpg', 'humus,vinete,masline verzi,pesto', '20'),
(9, 7, 'Ciorba de burta', 's1', '5.jpg', 'burta vita,ou,morcovi,usturoi,gogosari murati,smantana lichida,otet', '9'),
(4, 2, 'Meniul4', '4', '1.jpg', 'Piure de cartofi + Salata de varza', '12'),
(5, 4, 'Biftec tartar', '5', '2.jpg', 'muschi de vita,castraveti murati,ceapa alba,ou,unt,sosuri specifice,capere', '27'),
(6, 4, 'Tartar de somon', '6', '3.jpg', 'somon,somon fumee,capere,lamaie,unt,marar,chivas,sos soia', '25'),
(12, 8, 'Supa crema de rosii', '12', '9.jpg', 'rosii fresh,morcovi,telina,usturoi,ceapa alba,busuioc fresh,oregano', '7'),
(13, 10, 'Ceafa de porc grill', '13', '10.jpg', 'Ceafa de porc,rozmarin fresh,boia ardei dulce', '12'),
(14, 10, 'Piept de pui grill', '14', '11.jpg', 'piept de pui,rozmarin fresh', '10'),
(15, 10, 'Ton rosu in crusta de susan', '15', '12.jpg', 'ton rosu,susan,lamaie', '40'),
(16, 12, 'Ciuperci gratinate', '16', '13.jpg', 'ciuperci champignon fresh, mozzarella', '11'),
(17, 15, 'Brocolli grill', '17', '14.jpg', 'brocolli,unt', '8'),
(18, 13, 'Legume sote', '18', '15.jpg', 'ardei gras,usturoi,fasole verde pastai,unt,mazare boabe,conopida,baby morcov,rozmarin fresh', '9'),
(19, 15, 'Ratatouille de legume', '18', '16.jpg', 'ardei gras,ceapa rosie,ciuperci,vinete,zucchini,usturoi', '9'),
(20, 13, 'Spanac cu muguri de pin', '20', '17.jpg', 'spanac,muguri pin,rosii cherry,parmezan', '10'),
(21, 16, 'Salata cu branza Halloumi grill', '3', '18.jpg', 'branza halloumi,rucola,rosii cherry,radicchio,valeriana,baby spanac,oregano', '28'),
(22, 16, 'Salata Capresse', '22', '19.jpg', 'rosii,rosii cherry,mozzarella,busuioc fresh', '12'),
(23, 18, 'Salata mixta de vara', '23', '20.jpg', 'ardei gras,ceapa rosie,rosii,castraveti,salata verde,masline negre,oregano', '9'),
(24, 19, 'Cheese cake cu zmeura', '24', '21.jpg', 'Cheese cake cu zmeura', '15'),
(25, 20, 'Prune cu nuci', '25', '22.jpg', 'Prune cu nuci', '13');

-- --------------------------------------------------------

--
-- Table structure for table `tprodusecomenzi`
--

CREATE TABLE `tprodusecomenzi` (
  `fIdArticol` int(11) UNSIGNED NOT NULL,
  `fIdComanda` int(11) DEFAULT NULL,
  `fIdProdus` int(11) DEFAULT NULL,
  `fCantitate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tprodusecomenzi`
--

INSERT INTO `tprodusecomenzi` (`fIdArticol`, `fIdComanda`, `fIdProdus`, `fCantitate`) VALUES
(9, 6, 13, 1),
(10, 6, 17, 1),
(11, 6, 24, 1),
(12, 7, 1, 1),
(13, 7, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tsubcategorii`
--

CREATE TABLE `tsubcategorii` (
  `fIdSubcategorie` int(11) UNSIGNED NOT NULL,
  `fIdCategorie` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `fNumeSubcategorie` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tsubcategorii`
--

INSERT INTO `tsubcategorii` (`fIdSubcategorie`, `fIdCategorie`, `fNumeSubcategorie`) VALUES
(1, 1, 'FRUPT'),
(2, 1, 'POST'),
(3, 1, 'VEGETARIAN'),
(4, 2, 'FRUPT'),
(5, 2, 'POST'),
(6, 2, 'VEGETARIAN'),
(7, 3, 'FRUPT'),
(8, 3, 'POST'),
(9, 3, 'VEGETARIAN'),
(10, 4, 'FRUPT'),
(11, 4, 'POST'),
(12, 4, 'VEGETARIAN'),
(13, 5, 'FRUPT'),
(14, 5, 'POST'),
(15, 5, 'VEGETARIAN'),
(16, 6, 'FRUPT'),
(17, 6, 'POST'),
(18, 6, 'VEGETARIAN'),
(19, 7, 'FRUPT'),
(20, 7, 'POST'),
(21, 7, 'VEGETARIAN'),
(22, 8, 'FRUPT'),
(23, 8, 'POST'),
(24, 8, 'VEGETARIAN');

-- --------------------------------------------------------

--
-- Table structure for table `tutilizatori`
--

CREATE TABLE `tutilizatori` (
  `fIdUtilizator` int(11) UNSIGNED NOT NULL,
  `fNumeUtilizator` varchar(32) NOT NULL DEFAULT '',
  `fParola` varchar(32) NOT NULL DEFAULT '',
  `fEmail` varchar(150) NOT NULL DEFAULT '',
  `fAdresa` text,
  `fDataInregistrare` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutilizatori`
--

INSERT INTO `tutilizatori` (`fIdUtilizator`, `fNumeUtilizator`, `fParola`, `fEmail`, `fAdresa`, `fDataInregistrare`) VALUES
(8, 'david1', '1234asdf', 'david1@gmail.com', 'strada abs nr 12', '2017-07-03'),
(10, 'david', '1234asdf', 'david@gmail.com', 'strada mehedinti nr 26-28', '2017-07-09'),
(9, 'david3', '1234asdf', 'david3@gmail.com', 'strada alabala nr 1', '2017-07-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tadmins`
--
ALTER TABLE `tadmins`
  ADD PRIMARY KEY (`fIdAdmin`);

--
-- Indexes for table `tcategorii`
--
ALTER TABLE `tcategorii`
  ADD PRIMARY KEY (`fIdCategorie`),
  ADD UNIQUE KEY `fIdCategorie` (`fIdCategorie`),
  ADD KEY `fIdCategorie_2` (`fIdCategorie`);

--
-- Indexes for table `tcomentarii`
--
ALTER TABLE `tcomentarii`
  ADD PRIMARY KEY (`fIdComentariu`),
  ADD UNIQUE KEY `fIdComentariu` (`fIdComentariu`),
  ADD KEY `fIdComentariu_2` (`fIdComentariu`);

--
-- Indexes for table `tcomenzi`
--
ALTER TABLE `tcomenzi`
  ADD PRIMARY KEY (`fIdComanda`),
  ADD UNIQUE KEY `fIdComanda` (`fIdComanda`),
  ADD KEY `fIdComanda_2` (`fIdComanda`);

--
-- Indexes for table `tcos`
--
ALTER TABLE `tcos`
  ADD PRIMARY KEY (`fIdItem`),
  ADD UNIQUE KEY `fIdItem` (`fIdItem`),
  ADD KEY `fIdItem_2` (`fIdItem`);

--
-- Indexes for table `tproduse`
--
ALTER TABLE `tproduse`
  ADD PRIMARY KEY (`fIdProdus`),
  ADD UNIQUE KEY `fIdProdus` (`fIdProdus`),
  ADD KEY `fIdProdus_2` (`fIdProdus`);

--
-- Indexes for table `tprodusecomenzi`
--
ALTER TABLE `tprodusecomenzi`
  ADD PRIMARY KEY (`fIdArticol`);

--
-- Indexes for table `tsubcategorii`
--
ALTER TABLE `tsubcategorii`
  ADD PRIMARY KEY (`fIdSubcategorie`),
  ADD UNIQUE KEY `fIdSubcategorie` (`fIdSubcategorie`),
  ADD KEY `fIdSubcategorie_2` (`fIdSubcategorie`);

--
-- Indexes for table `tutilizatori`
--
ALTER TABLE `tutilizatori`
  ADD PRIMARY KEY (`fIdUtilizator`),
  ADD UNIQUE KEY `fIdUser` (`fIdUtilizator`),
  ADD KEY `fIdUser_2` (`fIdUtilizator`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tadmins`
--
ALTER TABLE `tadmins`
  MODIFY `fIdAdmin` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tcategorii`
--
ALTER TABLE `tcategorii`
  MODIFY `fIdCategorie` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tcomentarii`
--
ALTER TABLE `tcomentarii`
  MODIFY `fIdComentariu` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tcomenzi`
--
ALTER TABLE `tcomenzi`
  MODIFY `fIdComanda` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tcos`
--
ALTER TABLE `tcos`
  MODIFY `fIdItem` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tproduse`
--
ALTER TABLE `tproduse`
  MODIFY `fIdProdus` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tprodusecomenzi`
--
ALTER TABLE `tprodusecomenzi`
  MODIFY `fIdArticol` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tsubcategorii`
--
ALTER TABLE `tsubcategorii`
  MODIFY `fIdSubcategorie` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tutilizatori`
--
ALTER TABLE `tutilizatori`
  MODIFY `fIdUtilizator` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
