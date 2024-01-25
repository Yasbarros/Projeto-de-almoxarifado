-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 20-Jun-2022 às 23:16
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `login`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `codProd` int(11) NOT NULL,
  `vendedor` int(11) NOT NULL,
  `nomeProd` varchar(200) COLLATE utf8_unicode_520_ci NOT NULL,
  `data-cadas` datetime NOT NULL DEFAULT current_timestamp(),
  `fornecedor` varchar(300) COLLATE utf8_unicode_520_ci NOT NULL,
  `custo` float NOT NULL,
  `valorVenda` float NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`codProd`, `vendedor`, `nomeProd`, `data-cadas`, `fornecedor`, `custo`, `valorVenda`, `quantidade`) VALUES
(1, 2, 'Detergente', '2022-06-19 18:47:59', 'Ype', 1.4, 2.8, 20),
(2, 2, 'Chocolate', '2022-06-19 19:26:41', 'Nestlé', 1.2, 2.4, 12),
(3, 2, 'Doce', '2022-06-19 19:48:25', 'Nestlé', 2, 2, 30),
(4, 2, 'Brigadeiro', '2022-06-19 19:50:13', 'Nestlé', 40, 80, 27),
(5, 2, 'Geladeira', '2022-06-19 20:04:25', 'Eletrolux', 1399.4, 2000, 4),
(6, 2, 'Forno', '2022-06-19 20:04:55', 'Brastemp', 800, 1200, 12),
(7, 2, 'Fogão', '2022-06-19 21:27:15', 'Eletrolux', 600, 800, 0),
(12, 2, 'Ração', '2022-06-19 22:26:22', 'Whiskas', 3.1, 5, 20);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`codProd`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `codProd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
