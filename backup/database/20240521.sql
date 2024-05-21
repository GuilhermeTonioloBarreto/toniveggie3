-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 21/05/2024 às 03:38
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
(0, 'nulo', 1, 0, '2024-05-20 02:27:37'),
(54, 'pizza', 2, 0, '2024-05-18 04:29:27'),
(97, 'vagem', 2, 46, '2024-05-19 11:17:56'),
(98, 'fejao', 2, 46, '2024-05-19 11:20:19'),
(104, 'morango', 3, 0, '2024-05-20 01:19:24'),
(105, 'manga', 3, 47, '2024-05-20 01:19:39'),
(109, 'suco de limão', 1, 46, '2024-05-21 02:37:15');

-- --------------------------------------------------------

--
-- Estrutura para tabela `receitas`
--

CREATE TABLE `receitas` (
  `id` int(11) NOT NULL,
  `usuarioId` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `descricao` varchar(300) DEFAULT NULL,
  `quantidadeDePorcoes` int(11) NOT NULL,
  `i1` int(11) NOT NULL,
  `i2` int(11) NOT NULL,
  `i3` int(11) NOT NULL,
  `i4` int(11) NOT NULL,
  `i5` int(11) NOT NULL,
  `i6` int(11) NOT NULL,
  `i7` int(11) NOT NULL,
  `i8` int(11) NOT NULL,
  `i9` int(11) NOT NULL,
  `i10` int(11) NOT NULL,
  `i11` int(11) NOT NULL,
  `i12` int(11) NOT NULL,
  `i13` int(11) NOT NULL,
  `i14` int(11) NOT NULL,
  `i15` int(11) NOT NULL,
  `i16` int(11) NOT NULL,
  `i17` int(11) NOT NULL,
  `i18` int(11) NOT NULL,
  `i19` int(11) NOT NULL,
  `i20` int(11) NOT NULL,
  `i21` int(11) NOT NULL,
  `i22` int(11) NOT NULL,
  `i23` int(11) NOT NULL,
  `i24` int(11) NOT NULL,
  `i25` int(11) NOT NULL,
  `i26` int(11) NOT NULL,
  `i27` int(11) NOT NULL,
  `i28` int(11) NOT NULL,
  `i29` int(11) NOT NULL,
  `i30` int(11) NOT NULL,
  `q1` int(11) NOT NULL,
  `q2` int(11) NOT NULL,
  `q3` int(11) NOT NULL,
  `q4` int(11) NOT NULL,
  `q5` int(11) NOT NULL,
  `q6` int(11) NOT NULL,
  `q7` int(11) NOT NULL,
  `q8` int(11) NOT NULL,
  `q9` int(11) NOT NULL,
  `q10` int(11) NOT NULL,
  `q11` int(11) NOT NULL,
  `q12` int(11) NOT NULL,
  `q13` int(11) NOT NULL,
  `q14` int(11) NOT NULL,
  `q15` int(11) NOT NULL,
  `q16` int(11) NOT NULL,
  `q17` int(11) NOT NULL,
  `q18` int(11) NOT NULL,
  `q19` int(11) NOT NULL,
  `q20` int(11) NOT NULL,
  `q21` int(11) NOT NULL,
  `q22` int(11) NOT NULL,
  `q23` int(11) NOT NULL,
  `q24` int(11) NOT NULL,
  `q25` int(11) NOT NULL,
  `q26` int(11) NOT NULL,
  `q27` int(11) NOT NULL,
  `q28` int(11) NOT NULL,
  `q29` int(11) NOT NULL,
  `q30` int(11) NOT NULL,
  `preparo` varchar(10000) NOT NULL,
  `dataDeCriacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Índices de tabela `receitas`
--
ALTER TABLE `receitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuarios` (`usuarioId`),
  ADD KEY `fk_alimentos1` (`i1`),
  ADD KEY `fk_alimentos2` (`i2`),
  ADD KEY `fk_alimentos3` (`i3`),
  ADD KEY `fk_alimentos4` (`i4`),
  ADD KEY `fk_alimentos5` (`i5`),
  ADD KEY `fk_alimentos6` (`i6`),
  ADD KEY `fk_alimentos7` (`i7`),
  ADD KEY `fk_alimentos8` (`i8`),
  ADD KEY `fk_alimentos9` (`i9`),
  ADD KEY `fk_alimentos10` (`i10`),
  ADD KEY `fk_alimentos11` (`i11`),
  ADD KEY `fk_alimentos12` (`i12`),
  ADD KEY `fk_alimentos13` (`i13`),
  ADD KEY `fk_alimentos14` (`i14`),
  ADD KEY `fk_alimentos15` (`i15`),
  ADD KEY `fk_alimentos16` (`i16`),
  ADD KEY `fk_alimentos17` (`i17`),
  ADD KEY `fk_alimentos18` (`i18`),
  ADD KEY `fk_alimentos19` (`i19`),
  ADD KEY `fk_alimentos20` (`i20`),
  ADD KEY `fk_alimentos21` (`i21`),
  ADD KEY `fk_alimentos22` (`i22`),
  ADD KEY `fk_alimentos23` (`i23`),
  ADD KEY `fk_alimentos24` (`i24`),
  ADD KEY `fk_alimentos25` (`i25`),
  ADD KEY `fk_alimentos26` (`i26`),
  ADD KEY `fk_alimentos27` (`i27`),
  ADD KEY `fk_alimentos28` (`i28`),
  ADD KEY `fk_alimentos29` (`i29`),
  ADD KEY `fk_alimentos30` (`i30`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT de tabela `receitas`
--
ALTER TABLE `receitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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

--
-- Restrições para tabelas `receitas`
--
ALTER TABLE `receitas`
  ADD CONSTRAINT `fk_alimentos1` FOREIGN KEY (`i1`) REFERENCES `alimentos` (`id`),
  ADD CONSTRAINT `fk_alimentos10` FOREIGN KEY (`i10`) REFERENCES `alimentos` (`id`),
  ADD CONSTRAINT `fk_alimentos11` FOREIGN KEY (`i11`) REFERENCES `alimentos` (`id`),
  ADD CONSTRAINT `fk_alimentos12` FOREIGN KEY (`i12`) REFERENCES `alimentos` (`id`),
  ADD CONSTRAINT `fk_alimentos13` FOREIGN KEY (`i13`) REFERENCES `alimentos` (`id`),
  ADD CONSTRAINT `fk_alimentos14` FOREIGN KEY (`i14`) REFERENCES `alimentos` (`id`),
  ADD CONSTRAINT `fk_alimentos15` FOREIGN KEY (`i15`) REFERENCES `alimentos` (`id`),
  ADD CONSTRAINT `fk_alimentos16` FOREIGN KEY (`i16`) REFERENCES `alimentos` (`id`),
  ADD CONSTRAINT `fk_alimentos17` FOREIGN KEY (`i17`) REFERENCES `alimentos` (`id`),
  ADD CONSTRAINT `fk_alimentos18` FOREIGN KEY (`i18`) REFERENCES `alimentos` (`id`),
  ADD CONSTRAINT `fk_alimentos19` FOREIGN KEY (`i19`) REFERENCES `alimentos` (`id`),
  ADD CONSTRAINT `fk_alimentos2` FOREIGN KEY (`i2`) REFERENCES `alimentos` (`id`),
  ADD CONSTRAINT `fk_alimentos20` FOREIGN KEY (`i20`) REFERENCES `alimentos` (`id`),
  ADD CONSTRAINT `fk_alimentos21` FOREIGN KEY (`i21`) REFERENCES `alimentos` (`id`),
  ADD CONSTRAINT `fk_alimentos22` FOREIGN KEY (`i22`) REFERENCES `alimentos` (`id`),
  ADD CONSTRAINT `fk_alimentos23` FOREIGN KEY (`i23`) REFERENCES `alimentos` (`id`),
  ADD CONSTRAINT `fk_alimentos24` FOREIGN KEY (`i24`) REFERENCES `alimentos` (`id`),
  ADD CONSTRAINT `fk_alimentos25` FOREIGN KEY (`i25`) REFERENCES `alimentos` (`id`),
  ADD CONSTRAINT `fk_alimentos26` FOREIGN KEY (`i26`) REFERENCES `alimentos` (`id`),
  ADD CONSTRAINT `fk_alimentos27` FOREIGN KEY (`i27`) REFERENCES `alimentos` (`id`),
  ADD CONSTRAINT `fk_alimentos28` FOREIGN KEY (`i28`) REFERENCES `alimentos` (`id`),
  ADD CONSTRAINT `fk_alimentos29` FOREIGN KEY (`i29`) REFERENCES `alimentos` (`id`),
  ADD CONSTRAINT `fk_alimentos3` FOREIGN KEY (`i3`) REFERENCES `alimentos` (`id`),
  ADD CONSTRAINT `fk_alimentos30` FOREIGN KEY (`i30`) REFERENCES `alimentos` (`id`),
  ADD CONSTRAINT `fk_alimentos4` FOREIGN KEY (`i4`) REFERENCES `alimentos` (`id`),
  ADD CONSTRAINT `fk_alimentos5` FOREIGN KEY (`i5`) REFERENCES `alimentos` (`id`),
  ADD CONSTRAINT `fk_alimentos6` FOREIGN KEY (`i6`) REFERENCES `alimentos` (`id`),
  ADD CONSTRAINT `fk_alimentos7` FOREIGN KEY (`i7`) REFERENCES `alimentos` (`id`),
  ADD CONSTRAINT `fk_alimentos8` FOREIGN KEY (`i8`) REFERENCES `alimentos` (`id`),
  ADD CONSTRAINT `fk_alimentos9` FOREIGN KEY (`i9`) REFERENCES `alimentos` (`id`),
  ADD CONSTRAINT `fk_usuarios` FOREIGN KEY (`usuarioId`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
