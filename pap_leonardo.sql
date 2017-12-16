-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29-Jun-2015 às 23:36
-- Versão do servidor: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pap_leonardo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `login` varchar(16) CHARACTER SET latin1 NOT NULL,
  `senha` varchar(16) CHARACTER SET latin1 NOT NULL,
  `nome` varchar(100) CHARACTER SET latin1 NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`login`, `senha`, `nome`, `nivel`) VALUES
('a', 'a', 'Leonardo', 1),
('b', 'b', 'Leonardo', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `horarios`
--

CREATE TABLE IF NOT EXISTS `horarios` (
  `modalidade` varchar(20) NOT NULL,
  `escalao` varchar(15) NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `horario` varchar(100) NOT NULL,
  `professor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `horarios`
--

INSERT INTO `horarios` (`modalidade`, `escalao`, `sexo`, `horario`, `professor`) VALUES
('BADMINTON', 'Todos', 'Misto', '2ª feira: 13:35/14:20 4ª feira: 17:00/18:30', 'Rui Fernandes'),
('FUTSAL', 'Juvenis', 'Masculino', '4ª feira: 16:05/17:35 6ª feira: 16:05/16:50', 'Manuel Nunes'),
('RUGBY', 'Todos', 'Misto', '4ª feira: 16:05/18:20', 'Catarina Lino'),
('TÉNIS', 'Todos', 'Misto', '4ª feira: 16:05/17:35 6ª feira: 13:35/14:20', 'Ricardo Pimenta'),
('VOLEIBOL Fem.', 'Júniores', 'Feminino', '4ª feira: 17:00/18:30 6ª feira: 13:30/14:15', 'Paulo Pereira'),
('VOLEIBOL Mas.', 'Júniores', 'Masculino', '4ª feira: 17:00/18:30 5ª feira: 13:30/14:15', 'Carlos Marques');

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscricao_alunos`
--

CREATE TABLE IF NOT EXISTS `inscricao_alunos` (
  `n_processo` varchar(100) NOT NULL,
  `EE` varchar(100) NOT NULL,
  `CCEE` varchar(100) NOT NULL,
  `nome_aluno` varchar(100) NOT NULL,
  `nascimento` varchar(20) NOT NULL,
  `escalao` varchar(13) NOT NULL,
  `n_turma` varchar(100) NOT NULL,
  `turma` varchar(100) NOT NULL,
  `ano` varchar(10) NOT NULL,
  `modalidade` varchar(100) NOT NULL,
  `autorizacao` varchar(100) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `telemovel` varchar(14) NOT NULL,
  `telefonee` varchar(14) NOT NULL,
  `inscrito` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `inscricao_alunos`
--

INSERT INTO `inscricao_alunos` (`n_processo`, `EE`, `CCEE`, `nome_aluno`, `nascimento`, `escalao`, `n_turma`, `turma`, `ano`, `modalidade`, `autorizacao`, `telefone`, `telemovel`, `telefonee`, `inscrito`) VALUES
('22855', 'Dina Martins', '320983413', 'Leonardo Henriques', '1997', 'Júniores', '9', '3ºTSI', '12º', 'RUGBY', 'autorizo', '321321321', '123123123', '654456654', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`login`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
