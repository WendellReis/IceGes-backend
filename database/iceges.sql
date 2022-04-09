-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Jan-2022 às 19:08
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `iceges`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `catalogo`
--

CREATE TABLE `catalogo` (
  `idCatalogo` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `catalogo`
--

INSERT INTO `catalogo` (`idCatalogo`, `nome`) VALUES
(1, 'Catalogo Sol e Neve');

-- --------------------------------------------------------

--
-- Estrutura da tabela `encomenda`
--

CREATE TABLE `encomenda` (
  `status` bit(1) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `descricao` varchar(30) DEFAULT NULL,
  `idEncomenda` int(11) NOT NULL,
  `dataFim` varchar(20) DEFAULT NULL,
  `dataInicio` varchar(20) DEFAULT NULL,
  `idSorveteria` int(11) DEFAULT NULL,
  `codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `encomenda`
--

INSERT INTO `encomenda` (`status`, `quantidade`, `descricao`, `idEncomenda`, `dataFim`, `dataInicio`, `idSorveteria`, `codigo`) VALUES
(b'0', 10, 'Picole de Chocolate', 2, '2022-01-12 21:11:00', '2022-01-09 15:03:07', 1, 2001),
(b'1', 10, 'Picole de Limao', 3, '2022-01-14 08:45:15', '2022-01-10 11:19:58', 1, 2003),
(b'0', 20, 'Paleta de Manga', 4, '2022-01-14 08:45:15', '2022-01-13 20:17:07', 1, 3004),
(b'1', 5, 'Sorvete de Flocos', 5, NULL, '2022-01-17 14:30:27', 1, 1006),
(b'0', 10, 'Picole de Uva', 6, '2022-01-17 14:59:26', '2022-01-17 14:59:05', 1, 2004);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gerente`
--

CREATE TABLE `gerente` (
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `senha` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `gerente`
--

INSERT INTO `gerente` (`cpf`, `nome`, `email`, `telefone`, `senha`) VALUES
('14208221607', '', 'lucassantos@gmail.com', '32998850404', '12345');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `qtdEstoque` int(11) DEFAULT NULL,
  `qtdVendida` int(11) DEFAULT NULL,
  `qtdDisponivel` int(11) DEFAULT NULL,
  `codigo` int(11) NOT NULL,
  `descricao` varchar(30) DEFAULT NULL,
  `idCatalogo` int(11) DEFAULT NULL,
  `categoria` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`qtdEstoque`, `qtdVendida`, `qtdDisponivel`, `codigo`, `descricao`, `idCatalogo`, `categoria`) VALUES
(5, 2, 5, 1001, 'Sorvete de Uva', 1, 'Sorvete'),
(0, 30, 13, 1002, 'Sorvete de Manga', 1, 'Sorvete'),
(10, 23, 10, 1005, 'Sorvete de Goiaba', 1, 'Sorvete'),
(10, 40, 10, 1006, 'Sorvete de Flocos', 1, 'Sorvete'),
(10, 23, 5, 1008, 'Sorvete de Morango', 1, 'Sorvete'),
(50, 13, 3, 2001, 'Picole de Chocolate', 1, 'Picole'),
(0, 60, 15, 2002, 'Picole de Maracuja', 1, 'Picole'),
(95, 42, 13, 2003, 'Picole de Limao', 1, 'Picole'),
(8, 50, 10, 2004, 'Picole de Uva', 1, 'Picole'),
(11, 35, 1, 2005, 'Picole de Açai', 1, 'Picole'),
(12, 9, 10, 3001, 'Paleta de Uva', 1, 'Artesanal'),
(3, 12, 33, 3002, 'Paleta de Morango', 1, 'Artesanal'),
(15, 14, 12, 3003, 'Paleta de Creme', 1, 'Artesanal'),
(18, 22, 22, 3004, 'Paleta de Chocolate', 1, 'Artesanal'),
(21, 17, 31, 3005, 'Paleta de Manga', 1, 'Artesanal'),
(17, 5, 12, 4001, 'Casquinha', 1, 'Outros'),
(3, 9, 8, 4002, 'Calda de Chocolate', 1, 'Outros'),
(16, 14, 9, 4003, 'Calda de Morango', 1, 'Outros'),
(12, 12, 12, 4004, 'Calda de Uva', 1, 'Outros'),
(23, 11, 4, 4005, 'Calda de Creme', 1, 'Outros');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sorveteria`
--

CREATE TABLE `sorveteria` (
  `idSorveteria` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `cep` varchar(12) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `rua` varchar(30) DEFAULT NULL,
  `rota` varchar(15) DEFAULT NULL,
  `cpfGerente` varchar(11) DEFAULT NULL,
  `idCatalogo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sorveteria`
--

INSERT INTO `sorveteria` (`idSorveteria`, `nome`, `cep`, `cidade`, `bairro`, `rua`, `rota`, `cpfGerente`, `idCatalogo`) VALUES
(1, 'Sol e Neve', '36795000', 'Leopoldina', 'Centro', 'Antonio Chaves', 'Semanal', '14208221607', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `catalogo`
--
ALTER TABLE `catalogo`
  ADD PRIMARY KEY (`idCatalogo`);

--
-- Índices para tabela `encomenda`
--
ALTER TABLE `encomenda`
  ADD PRIMARY KEY (`idEncomenda`),
  ADD KEY `idSorveteria` (`idSorveteria`);

--
-- Índices para tabela `gerente`
--
ALTER TABLE `gerente`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `idCatalogo` (`idCatalogo`);

--
-- Índices para tabela `sorveteria`
--
ALTER TABLE `sorveteria`
  ADD PRIMARY KEY (`idSorveteria`),
  ADD KEY `cpf` (`cpfGerente`),
  ADD KEY `idCatalogo` (`idCatalogo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `catalogo`
--
ALTER TABLE `catalogo`
  MODIFY `idCatalogo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `encomenda`
--
ALTER TABLE `encomenda`
  MODIFY `idEncomenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `sorveteria`
--
ALTER TABLE `sorveteria`
  MODIFY `idSorveteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `encomenda`
--
ALTER TABLE `encomenda`
  ADD CONSTRAINT `encomenda_ibfk_1` FOREIGN KEY (`idSorveteria`) REFERENCES `sorveteria` (`idSorveteria`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`idCatalogo`) REFERENCES `catalogo` (`idCatalogo`);

--
-- Limitadores para a tabela `sorveteria`
--
ALTER TABLE `sorveteria`
  ADD CONSTRAINT `sorveteria_ibfk_1` FOREIGN KEY (`cpfGerente`) REFERENCES `gerente` (`cpf`),
  ADD CONSTRAINT `sorveteria_ibfk_2` FOREIGN KEY (`idCatalogo`) REFERENCES `catalogo` (`idCatalogo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
