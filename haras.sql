-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Máquina: 127.0.0.1
-- Data de Criação: 27-Maio-2015 às 18:42
-- Versão do servidor: 5.5.34
-- versão do PHP: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `haras`
--
CREATE DATABASE IF NOT EXISTS `darabas_haras` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `darabas_haras`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `config`
--

CREATE TABLE IF NOT EXISTS `Config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomesite` varchar(50) NOT NULL,
  `qtdanuncio` varchar(2) NOT NULL,
  `creci` varchar(6) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `celular1` varchar(30) NOT NULL,
  `celular2` varchar(30) NOT NULL,
  `celular3` varchar(30) NOT NULL,
  `celular4` varchar(30) NOT NULL,
  `exibircreci` varchar(20) NOT NULL,
  `crecipessoafisica` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `Usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `nascimento` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `ultimaMudanca` datetime NOT NULL,
  `tipoUsuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Animal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `registro` varchar(50) NOT NULL,
  `nascimento` datetime NOT NULL,
  `sexo` varchar(2) NOT NULL,
  `pelagem` varchar(50) NOT NULL,
  `dna` varchar(50) NOT NULL,
  `video` varchar(100) NOT NULL,
  `descricao` varchar(5000) NOT NULL,
  `raca` int(11) NOT NULL,
  `pai` int(11) NOT NULL,
  `mae` int(11) NOT NULL,
  `pagina` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Raca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `origem` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Imagemanimal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `animal` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Exposicao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `data` datetime NOT NULL,
  `local` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Imagemexposicao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `exposicao` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Animalpremiacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  `animal` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Tipovenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Venda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(100) NOT NULL,
  `valor` float NOT NULL,
  `animal` int(11) NOT NULL,
  `animal2` int(11) NOT NULL,
  `tipovenda` int(11) NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Pagina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `posicao` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Geral` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cds` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

insert into Geral(id,cds) values(null, 'true');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
