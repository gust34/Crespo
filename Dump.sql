-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17-Nov-2018 às 20:34
-- Versão do servidor: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crespo`
--
DROP DATABASE IF EXISTS `bdcrespo`;
CREATE DATABASE IF NOT EXISTS `bdcrespo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bdcrespo`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--
-- Criação: 01-Nov-2018 às 17:59
--

CREATE TABLE `adm` (
  `User` varchar(100) NOT NULL,
  `Senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `adm`:
--

--
-- Extraindo dados da tabela `adm`
--

INSERT INTO `adm` (`User`, `Senha`) VALUES
('Admin', 'password123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imóveis`
--
-- Criação: 01-Nov-2018 às 18:44
--

CREATE TABLE `imoveis` (
  `Cod_Im` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `PrecoDeVenda` decimal(15,2) NOT NULL,
  `PrecoDeAluguel` decimal(15,2) NOT NULL,
  `PrecoUnitario` decimal(15,2) NOT NULL,
  `Tipo` varchar(20) NOT NULL,
  `Rua` varchar(100) NOT NULL,
  `N` int(11) NOT NULL,
  `Compl` varchar(300) DEFAULT NULL,
  `Bairro` varchar(100) NOT NULL,
  `Cidade` varchar(100) NOT NULL,
  `Estado` varchar(100) NOT NULL,
  `QVaga` int(11) NOT NULL,
  `QDormitorio` int(11) NOT NULL,
  `QSuite` int(11) NOT NULL,
  `QBanheiro` int(11) NOT NULL,
  `QReformas` int(11) NOT NULL,
  `AreaConstruida` float NOT NULL,
  `AreaReformada` float NOT NULL,
  `AreaUtil` float NOT NULL,
  `Caracteristicas` varchar(300) DEFAULT NULL,
  `Sobre` varchar(400) DEFAULT NULL,
  `CondFec` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `imóveis`:
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`User`);

--
-- Indexes for table `imóveis`
--
ALTER TABLE `imoveis`
  ADD PRIMARY KEY (`Cod_Im`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `imóveis`
--
ALTER TABLE `imoveis`
  MODIFY `Cod_Im` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
