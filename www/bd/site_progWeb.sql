-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Tempo de geração: 05/09/2026 às 04:51
-- Versão do servidor: 8.3.0
-- Versão do PHP: 8.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `site_progWeb`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `especies`
--

CREATE TABLE `especies` (
  `id` int NOT NULL,
  `especie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `especies`
--

INSERT INTO `especies` (`id`, `especie`) VALUES
(1, 'Cachorro'),
(2, 'Gato'),
(3, 'Pássaro'),
(4, 'Hamster'),
(5, 'Coelho'),
(6, 'Tartaruga'),
(8, 'Peixe'),
(9, 'Cobra');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pets`
--

CREATE TABLE `pets` (
  `id` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nascimento` date NOT NULL,
  `id_especie` int NOT NULL,
  `prontuario` text,
  `genero` enum('M','F') NOT NULL,
  `id_usuario` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `pets`
--

INSERT INTO `pets` (`id`, `nome`, `nascimento`, `id_especie`, `prontuario`, `genero`, `id_usuario`) VALUES
(3, 'aaa', '1111-11-11', 2, '11', 'M', 5),
(4, 'Pandora', '0001-11-11', 8, '2', 'M', 5),
(5, 'Pandora', '0242-04-23', 1, '3', 'F', 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(3, 'Giovanna Teles Silveira', 'gigiteles502@gmail.com', '$2y$10$KFg4KZg9N5LiZpWqnrFrxuJMcLeDU7FR/.CKuw04rNHFU.m7NbkMW'),
(4, 'Giovanna Teles Silveira', 'gihteles502@gmail.com', '$2y$10$LkA2nMUySWW967eEo5NTP.bkjHutfTr4p3liaoT//mObbT3qrwopq'),
(5, 'Pandora', 'gih@gmail.com', '$2y$10$QgA/Ct1NPZD4jZtsxWHpc.y9gqP7PAoGNSk5HzjIRG57nU6BVCa9m');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `especies`
--
ALTER TABLE `especies`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pet_especie` (`id_especie`),
  ADD KEY `fk_pet_usuario` (`id_usuario`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `especies`
--
ALTER TABLE `especies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `fk_pet_especie` FOREIGN KEY (`id_especie`) REFERENCES `especies` (`id`),
  ADD CONSTRAINT `fk_pet_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
