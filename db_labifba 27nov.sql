-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 27/11/2016 às 22:08
-- Versão do servidor: 5.5.53-0+deb8u1
-- Versão do PHP: 5.6.27-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `db_labifba`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `hardware`
--

CREATE TABLE IF NOT EXISTS `hardware` (
`idHardware` int(11) NOT NULL,
  `Desc` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `hardware`
--

INSERT INTO `hardware` (`idHardware`, `Desc`) VALUES
(16, 'Ar condicionado'),
(4, 'Caixa de som'),
(1, 'Datashow HDMI'),
(6, 'Datashow VGA'),
(9, 'HD Externo'),
(8, 'Impressora'),
(15, 'Lixeira'),
(3, 'Lousa digital'),
(7, 'Notebook HP'),
(5, 'PC Dell'),
(10, 'Switches');

-- --------------------------------------------------------

--
-- Estrutura para tabela `laboratorios`
--

CREATE TABLE IF NOT EXISTS `laboratorios` (
`CodLab` int(5) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `QtdeComputadores` int(5) unsigned DEFAULT NULL,
  `Lotacao` int(5) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `laboratorios`
--

INSERT INTO `laboratorios` (`CodLab`, `Nome`, `QtdeComputadores`, `Lotacao`) VALUES
(8, 'Laboratório 1', 25, 30),
(9, 'Laboratório 4', 45, 55),
(10, 'Laboratório 3', 20, 30),
(11, 'Laboratório 2', 45, 50);

-- --------------------------------------------------------

--
-- Estrutura para tabela `lab_h`
--

CREATE TABLE IF NOT EXISTS `lab_h` (
`id` int(11) NOT NULL,
  `laboratorio` int(5) NOT NULL,
  `hardware` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `lab_h`
--

INSERT INTO `lab_h` (`id`, `laboratorio`, `hardware`) VALUES
(19, 8, 1),
(20, 8, 3),
(21, 8, 5),
(22, 8, 7),
(23, 8, 8),
(24, 9, 4),
(25, 9, 5),
(26, 9, 8),
(27, 9, 9),
(28, 9, 10),
(29, 9, 15),
(30, 9, 16),
(31, 10, 1),
(32, 10, 3),
(33, 10, 5),
(34, 10, 7),
(41, 11, 4),
(42, 11, 5),
(43, 11, 6),
(44, 11, 7);

-- --------------------------------------------------------

--
-- Estrutura para tabela `lab_s`
--

CREATE TABLE IF NOT EXISTS `lab_s` (
`id` int(11) NOT NULL,
  `laboratorio` int(5) NOT NULL,
  `software` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `lab_s`
--

INSERT INTO `lab_s` (`id`, `laboratorio`, `software`) VALUES
(8, 11, 1),
(9, 11, 4),
(10, 11, 5),
(11, 11, 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `reservas`
--

CREATE TABLE IF NOT EXISTS `reservas` (
`idReserva` int(10) unsigned NOT NULL,
  `DtHrInicio` datetime NOT NULL,
  `Usuario` varchar(30) NOT NULL,
  `Laboratorio` int(5) NOT NULL,
  `AulaFixa` tinyint(1) NOT NULL,
  `DtHrFim` datetime NOT NULL,
  `Disciplina` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `reservas`
--

INSERT INTO `reservas` (`idReserva`, `DtHrInicio`, `Usuario`, `Laboratorio`, `AulaFixa`, `DtHrFim`, `Disciplina`) VALUES
(1, '2016-10-27 10:00:00', 'florence28', 8, 0, '2016-10-27 10:20:00', NULL),
(2, '2016-11-22 08:00:00', 'manilaluzon', 9, 0, '2016-11-22 11:00:00', NULL),
(3, '2016-11-24 10:00:00', 'florence28', 11, 0, '2016-11-24 11:30:00', NULL),
(4, '2016-12-16 08:18:00', 'aa', 10, 0, '2016-11-27 13:20:00', NULL),
(5, '2016-11-28 00:00:00', 'aa', 9, 0, '2016-11-27 18:27:40', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `software`
--

CREATE TABLE IF NOT EXISTS `software` (
`idSoftware` int(11) NOT NULL,
  `Descricao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `software`
--

INSERT INTO `software` (`idSoftware`, `Descricao`) VALUES
(1, 'Geogebra 5.0'),
(4, 'Winplot'),
(5, 'Eclipse IDE'),
(6, 'NetBeans'),
(7, 'Google Earth'),
(8, 'Visual Studio');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `Login` varchar(30) NOT NULL,
  `Nome` varchar(80) NOT NULL,
  `Senha` char(40) NOT NULL DEFAULT '',
  `Email` varchar(45) DEFAULT NULL,
  `PerfilUsuario` int(1) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`Login`, `Nome`, `Senha`, `Email`, `PerfilUsuario`) VALUES
('aa', 'Áquila + Alejandro', 'a5b1d7e217aa227d5b2b8a84920780cf637960e2', NULL, 2),
('britneyde', 'Plante uma Neyde', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '', 0),
('florence28', 'Florence Welch', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'florencemachine@gmail.com', 1),
('manilaluzon', 'Manila Luzon', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'manila2ndplace@rupaul.com', 2);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `hardware`
--
ALTER TABLE `hardware`
 ADD PRIMARY KEY (`idHardware`), ADD UNIQUE KEY `Desc` (`Desc`);

--
-- Índices de tabela `laboratorios`
--
ALTER TABLE `laboratorios`
 ADD PRIMARY KEY (`CodLab`), ADD UNIQUE KEY `Nome` (`Nome`);

--
-- Índices de tabela `lab_h`
--
ALTER TABLE `lab_h`
 ADD PRIMARY KEY (`id`), ADD KEY `laboratorio` (`laboratorio`), ADD KEY `hardware` (`hardware`);

--
-- Índices de tabela `lab_s`
--
ALTER TABLE `lab_s`
 ADD PRIMARY KEY (`id`), ADD KEY `laboratorio` (`laboratorio`), ADD KEY `software` (`software`);

--
-- Índices de tabela `reservas`
--
ALTER TABLE `reservas`
 ADD PRIMARY KEY (`idReserva`,`Usuario`,`Laboratorio`), ADD KEY `fk_Reservas_Usuarios_idx` (`Usuario`), ADD KEY `fk_Reservas_Laboratorios1_idx` (`Laboratorio`);

--
-- Índices de tabela `software`
--
ALTER TABLE `software`
 ADD PRIMARY KEY (`idSoftware`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`Login`,`PerfilUsuario`), ADD KEY `fk_Usuarios_TipoUsuario1_idx` (`PerfilUsuario`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `hardware`
--
ALTER TABLE `hardware`
MODIFY `idHardware` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de tabela `laboratorios`
--
ALTER TABLE `laboratorios`
MODIFY `CodLab` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de tabela `lab_h`
--
ALTER TABLE `lab_h`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT de tabela `lab_s`
--
ALTER TABLE `lab_s`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de tabela `reservas`
--
ALTER TABLE `reservas`
MODIFY `idReserva` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de tabela `software`
--
ALTER TABLE `software`
MODIFY `idSoftware` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `lab_h`
--
ALTER TABLE `lab_h`
ADD CONSTRAINT `fk_Hardware_Laboratorios` FOREIGN KEY (`hardware`) REFERENCES `hardware` (`idHardware`) ON UPDATE CASCADE,
ADD CONSTRAINT `fk_Laboratorios_Hardware` FOREIGN KEY (`laboratorio`) REFERENCES `laboratorios` (`CodLab`) ON UPDATE CASCADE;

--
-- Restrições para tabelas `lab_s`
--
ALTER TABLE `lab_s`
ADD CONSTRAINT `fk_Laboratorios_Software` FOREIGN KEY (`laboratorio`) REFERENCES `laboratorios` (`CodLab`) ON UPDATE CASCADE,
ADD CONSTRAINT `fk_Software_Laboratorios` FOREIGN KEY (`software`) REFERENCES `software` (`idSoftware`) ON UPDATE CASCADE;

--
-- Restrições para tabelas `reservas`
--
ALTER TABLE `reservas`
ADD CONSTRAINT `fk_Reservas_Laboratorios1` FOREIGN KEY (`Laboratorio`) REFERENCES `laboratorios` (`CodLab`) ON UPDATE CASCADE,
ADD CONSTRAINT `fk_Reservas_Usuarios` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`Login`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
