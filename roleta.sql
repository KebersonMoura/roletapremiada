-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14-Dez-2022 às 17:21
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brisanetgestao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `roleta`
--

CREATE TABLE `roleta` (
  `id` int(11) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `resultado` varchar(255) NOT NULL,
  `premio` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `roleta`
--

INSERT INTO `roleta` (`id`, `codigo`, `resultado`, `premio`, `nome`, `telefone`, `data`) VALUES
(1, '333', 'NAO FOI DESTA VEZ', '0', 'KEBERSON MOURA CARVALHO', '', ''),
(2, '444', 'VOCE GANHOU UM BRINDE', '6', 'PAULO', '85986721697', '22/11/2022'),
(3, '111', 'VOCE GANHOU UM BRINDE', '7', 'ANDREZZA', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `roleta`
--
ALTER TABLE `roleta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `roleta`
--
ALTER TABLE `roleta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
