-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 22-Abr-2021 às 18:47
-- Versão do servidor: 8.0.21
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `artan`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipe`
--

DROP TABLE IF EXISTS `equipe`;
CREATE TABLE IF NOT EXISTS `equipe` (
  `eq_id` int NOT NULL AUTO_INCREMENT,
  `fk_op_id` int NOT NULL,
  `fk_pj_id` int NOT NULL,
  PRIMARY KEY (`eq_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `equipe`
--

INSERT INTO `equipe` (`eq_id`, `fk_op_id`, `fk_pj_id`) VALUES
(2, 1, 0),
(3, 1, 0),
(4, 1, 0),
(5, 1, 0),
(6, 1, 12),
(7, 1, 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `objetivo`
--

DROP TABLE IF EXISTS `objetivo`;
CREATE TABLE IF NOT EXISTS `objetivo` (
  `ob_name` varchar(50) NOT NULL,
  `ob_description` varchar(100) NOT NULL,
  `ob_id` int NOT NULL AUTO_INCREMENT,
  `valor_meta` int NOT NULL,
  `tipo-meta` varchar(3) NOT NULL,
  `ativo` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`ob_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `operador`
--

DROP TABLE IF EXISTS `operador`;
CREATE TABLE IF NOT EXISTS `operador` (
  `op_name` varchar(50) NOT NULL,
  `op_user` varchar(15) NOT NULL,
  `op_pass` varchar(20) NOT NULL,
  `op_role` varchar(15) NOT NULL,
  `op_id` int NOT NULL AUTO_INCREMENT,
  `removed` bit(1) NOT NULL DEFAULT b'0',
  `op_mail` varchar(50) NOT NULL,
  PRIMARY KEY (`op_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `operador`
--

INSERT INTO `operador` (`op_name`, `op_user`, `op_pass`, `op_role`, `op_id`, `removed`, `op_mail`) VALUES
('Emanuel Borges', '70010972170', '123456', 'system', 1, b'0', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

DROP TABLE IF EXISTS `projeto`;
CREATE TABLE IF NOT EXISTS `projeto` (
  `pj_id` int NOT NULL AUTO_INCREMENT,
  `pj_name` varchar(25) NOT NULL,
  `inicio` date NOT NULL,
  `final` date NOT NULL,
  `empresa` text NOT NULL,
  PRIMARY KEY (`pj_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `projeto`
--

INSERT INTO `projeto` (`pj_id`, `pj_name`, `inicio`, `final`, `empresa`) VALUES
(13, 'Almoxarifado', '2021-04-10', '2021-04-29', 'Artan');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
