-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 20/05/2024 às 01:52
-- Versão do servidor: 10.11.6-MariaDB-1:10.11.6+maria~ubu2204
-- Versão do PHP: 8.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `toniveggieDatabase`
--
CREATE DATABASE IF NOT EXISTS `toniveggieDatabase` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `toniveggieDatabase`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `alimentos`
--

CREATE TABLE `alimentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `unidadeDeMedidaId` int(11) NOT NULL,
  `usuarioId` int(11) NOT NULL,
  `dataDeCriacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `alimentos`
--

INSERT INTO `alimentos` (`id`, `nome`, `unidadeDeMedidaId`, `usuarioId`, `dataDeCriacao`) VALUES
(54, 'pizza', 1, 0, '2024-05-18 04:29:27'),
(97, 'vagem', 1, 46, '2024-05-19 11:17:56'),
(98, 'fejao', 2, 46, '2024-05-19 11:20:19'),
(104, 'morango', 2, 0, '2024-05-20 01:19:24'),
(105, 'manga', 3, 47, '2024-05-20 01:19:39');

-- --------------------------------------------------------

--
-- Estrutura para tabela `unidadesDeMedida`
--

CREATE TABLE `unidadesDeMedida` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `abreviacao` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `unidadesDeMedida`
--

INSERT INTO `unidadesDeMedida` (`id`, `nome`, `abreviacao`) VALUES
(1, 'mililitro', 'ml'),
(2, 'gramas', 'g'),
(3, 'unidade', 'un');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`) VALUES
(48, 'barreto'),
(46, 'guilherme'),
(47, 'toniolo'),
(0, 'usuario geral');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alimentos`
--
ALTER TABLE `alimentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_estado_fisico` (`unidadeDeMedidaId`),
  ADD KEY `fk_users` (`usuarioId`);

--
-- Índices de tabela `unidadesDeMedida`
--
ALTER TABLE `unidadesDeMedida`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`nome`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alimentos`
--
ALTER TABLE `alimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de tabela `unidadesDeMedida`
--
ALTER TABLE `unidadesDeMedida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `alimentos`
--
ALTER TABLE `alimentos`
  ADD CONSTRAINT `fk_unidade_de_medida` FOREIGN KEY (`unidadeDeMedidaId`) REFERENCES `unidadesDeMedida` (`id`),
  ADD CONSTRAINT `fk_users` FOREIGN KEY (`usuarioId`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
