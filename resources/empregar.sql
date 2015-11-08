-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: 31-Out-2015 às 18:15
-- Versão do servidor: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `empregar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidatos`
--

CREATE TABLE `candidatos` (
`id` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `nome` varchar(80) DEFAULT NULL,
  `telefone` varchar(16) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `candidatos`
--

INSERT INTO `candidatos` (`id`, `email`, `nome`, `telefone`, `password`) VALUES
(1, 'tiago@tiagogouvea.com.br', 'Tiago Gouvêa', '(32)98873-5683', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

CREATE TABLE `empresas` (
`id` int(11) NOT NULL,
  `razao_social` varchar(130) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `logradouro` varchar(80) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `bairro` varchar(40) DEFAULT NULL,
  `cidade` varchar(40) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `nome_fantasia` varchar(80) DEFAULT NULL,
  `cnpj` varchar(18) DEFAULT NULL,
  `atividade` varchar(40) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`id`, `razao_social`, `telefone`, `logradouro`, `numero`, `bairro`, `cidade`, `estado`, `cep`, `nome_fantasia`, `cnpj`, `atividade`) VALUES
(5, 'Inspirar Digital', '32-3025-5658', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscricoes`
--

CREATE TABLE `inscricoes` (
`id` int(11) NOT NULL,
  `id_vaga` int(11) NOT NULL,
  `id_candidato` int(11) NOT NULL,
  `data_inscricao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `entrevistar` tinyint(1) DEFAULT NULL,
  `aprovado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `inscricoes`
--

INSERT INTO `inscricoes` (`id`, `id_vaga`, `id_candidato`, `data_inscricao`, `entrevistar`, `aprovado`) VALUES
(1, 1, 1, '2015-10-31 20:00:55', NULL, NULL),
(2, 1, 1, '2015-10-31 20:09:43', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagas`
--

CREATE TABLE `vagas` (
`id` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `data_limite` date DEFAULT NULL,
  `salario` varchar(100) DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  `ativa` tinyint(1) DEFAULT NULL,
  `beneficios` text,
  `descricao` text,
  `local_selecao` text
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vagas`
--

INSERT INTO `vagas` (`id`, `id_empresa`, `titulo`, `data_limite`, `salario`, `area`, `ativa`, `beneficios`, `descricao`, `local_selecao`) VALUES
(2, 5, 'Minha vaga', '2015-11-07', 'Mínimo', 'Manutenção', 1, 'Nenhum atualmente', 'Trabalhe bem, seja feliz, conte conosco!', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidatos`
--
ALTER TABLE `candidatos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empresas`
--
ALTER TABLE `empresas`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `cnpj` (`cnpj`);

--
-- Indexes for table `inscricoes`
--
ALTER TABLE `inscricoes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vagas`
--
ALTER TABLE `vagas`
 ADD PRIMARY KEY (`id`), ADD KEY `ix_empresa` (`id_empresa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidatos`
--
ALTER TABLE `candidatos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `empresas`
--
ALTER TABLE `empresas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `inscricoes`
--
ALTER TABLE `inscricoes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vagas`
--
ALTER TABLE `vagas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `vagas`
--
ALTER TABLE `vagas`
ADD CONSTRAINT `vagas_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
