-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Nov-2018 às 01:49
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
-- Database: `bdcrespo`
--
DROP DATABASE IF EXISTS `bdcrespo`;
CREATE DATABASE IF NOT EXISTS `bdcrespo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bdcrespo`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotoim`
--

CREATE TABLE `fotoim` (
  `Cod_Im` int(11) NOT NULL,
  `foto` longblob NOT NULL,
  `foto2` longblob,
  `foto3` longblob,
  `foto4` longblob,
  `foto5` longblob,
  `foto6` longblob,
  `foto7` longblob,
  `foto8` longblob,
  `foto9` longblob,
  `foto10` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imoveis`
--

CREATE TABLE `imoveis` (
  `Cod_Im` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `qsuite` int(11) DEFAULT NULL,
  `qquarto` int(11) NOT NULL,
  `areatotal` float NOT NULL,
  `areaconstruida` float NOT NULL,
  `qreformas` int(11) NOT NULL,
  `qvaga` int(11) NOT NULL,
  `qbanheiro` int(11) NOT NULL,
  `crad` varchar(3) NOT NULL,
  `cond` varchar(50) DEFAULT NULL,
  `cad1` varchar(30) NOT NULL,
  `cad2` varchar(30) NOT NULL,
  `cad3` varchar(30) DEFAULT NULL,
  `cad4` varchar(30) DEFAULT NULL,
  `cad5` varchar(30) DEFAULT NULL,
  `cad6` varchar(30) DEFAULT NULL,
  `cad7` varchar(30) DEFAULT NULL,
  `cad8` varchar(30) DEFAULT NULL,
  `cad9` varchar(30) DEFAULT NULL,
  `cad10` varchar(30) DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `PrecoDeVenda` decimal(9,2) NOT NULL,
  `PrecoDeAluguel` decimal(9,2) NOT NULL,
  `home` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `imoveis`
--

INSERT INTO `imoveis` (`Cod_Im`, `nome`, `tipo`, `categoria`, `bairro`, `qsuite`, `qquarto`, `areatotal`, `areaconstruida`, `qreformas`, `qvaga`, `qbanheiro`, `crad`, `cond`, `cad1`, `cad2`, `cad3`, `cad4`, `cad5`, `cad6`, `cad7`, `cad8`, `cad9`, `cad10`, `descricao`, `PrecoDeVenda`, `PrecoDeAluguel`, `home`) VALUES
(1, 'Casa', 'Apartamento', 'Compra', 'Rochdale', 1, 2, 3, 2, 1, 3, 2, 'Não', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Casa topzera', '12.00', '6.00', 1),
(2, 'Casa', 'Apartamento', 'Compra', 'Rochdale', 1, 2, 3, 2, 1, 3, 2, 'Não', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Casa topzera', '12.00', '6.00', 1),
(3, 'Casa', 'Apartamento', 'Compra', 'Rochdale', 1, 2, 3, 2, 1, 3, 2, 'Não', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Casa topzera', '12.00', '6.00', 1),
(4, 'Casa', 'Apartamento', 'Compra', 'Rochdale', 1, 2, 3, 2, 1, 3, 2, 'Não', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Casa topzera', '12.00', '6.00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `user` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`user`, `senha`) VALUES
('teste', 'teste123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fotoim`
--
ALTER TABLE `fotoim`
  ADD PRIMARY KEY (`Cod_Im`);

--
-- Indexes for table `imoveis`
--
ALTER TABLE `imoveis`
  ADD PRIMARY KEY (`Cod_Im`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `imoveis`
--
ALTER TABLE `imoveis`
  MODIFY `Cod_Im` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `fotoim`
--
ALTER TABLE `fotoim`
  ADD CONSTRAINT `fotoim_ibfk_1` FOREIGN KEY (`Cod_Im`) REFERENCES `imoveis` (`Cod_Im`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
