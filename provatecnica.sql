-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16-Abr-2016 às 12:33
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `provatecnica`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` mediumint(9) NOT NULL,
  `nome` varchar(300) COLLATE utf8_bin NOT NULL,
  `cpf` varchar(15) COLLATE utf8_bin NOT NULL,
  `rg` varchar(14) COLLATE utf8_bin NOT NULL,
  `telefone` varchar(14) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nome`, `cpf`, `rg`, `telefone`) VALUES
(1, 'Thiago Serrano', '416.366.298-73', '41.224.889-X', '(14)997101563'),
(4, 'Teste de cadastro', '416.366.521-89', '41.224.889-X', '(14) 3227-2602'),
(5, 'Teste de cadastro', '416.366.521-12', '41.224.889-X', '(14) 3227-2602'),
(6, 'teste', '131.231.231-32', '13.123.123-1', '(13) 1231-3131'),
(7, 'Avaliador', '123.123.123-12', '43.121.235-4', '(12) 3661-3423');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `nome` varchar(300) COLLATE utf8_bin NOT NULL,
  `login` varchar(30) COLLATE utf8_bin NOT NULL,
  `senha` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`nome`, `login`, `senha`) VALUES
('Avaliador', 'Avaliador', 'ce82c57aab865dae90504262304b70f9'),
('Thiago Serrano', 'Desenvolvedor', 'd42d0ac94b49920b9db773905fa3069c'),
('Teste cadastro com md5', 'Desenvolvedora', 'b1a6c7e309fd5eee5218bcd3294d0b3d'),
('Ser Muito Foda', 'SerFoda', '1f6cf6ca538a6e3eea6c38f8180398ff'),
('Ser Muito Foda', 'SerFoda1', '1f6cf6ca538a6e3eea6c38f8180398ff');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `idServ` int(11) NOT NULL,
  `nomeserv` varchar(300) COLLATE utf8_bin NOT NULL,
  `valorserv` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicoscontratados`
--

CREATE TABLE `servicoscontratados` (
  `idServCon` mediumint(9) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idServico` int(11) NOT NULL,
  `tempoini` varchar(300) COLLATE utf8_bin NOT NULL,
  `tempofinal` varchar(300) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login`);

--
-- Indexes for table `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`idServ`);

--
-- Indexes for table `servicoscontratados`
--
ALTER TABLE `servicoscontratados`
  ADD PRIMARY KEY (`idServCon`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `servicos`
--
ALTER TABLE `servicos`
  MODIFY `idServ` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `servicoscontratados`
--
ALTER TABLE `servicoscontratados`
  MODIFY `idServCon` mediumint(9) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
