-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 06/12/2023 às 18:49
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `carrinho`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho_compras`
--

CREATE TABLE `carrinho_compras` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `carrinho_compras`
--

INSERT INTO `carrinho_compras` (`id`, `id_produto`, `id_usuario`) VALUES
(9, 2, 3),
(10, 8, 3),
(11, 3, 1),
(12, 4, 1),
(13, 3, 1),
(14, 3, 1),
(15, 3, 1),
(16, 5, 1),
(17, 4, 1),
(18, 2, 1),
(19, 8, 1),
(20, 9, 1),
(21, 7, 1),
(22, 2, 4),
(23, 2, 4),
(24, 2, 4),
(25, 7, 4),
(26, 3, 5),
(27, 2, 6),
(28, 3, 6),
(29, 4, 6),
(34, 3, 10),
(35, 5, 10),
(36, 8, 10),
(37, 7, 10),
(38, 4, 10),
(39, 4, 10),
(40, 7, 11),
(41, 4, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `email` varchar(150) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `senha` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `email`, `cpf`, `senha`) VALUES
(1, 'Vitor Cesar', 'vitorcesarsouza7@gmail.com', '50332518809', '202cb962ac59075b964b07152d234b70'),
(3, 'Vitin', 'vitin@gmail.com', '50332518801', '202cb962ac59075b964b07152d234b70'),
(4, 'luciene', 'lu-barbosa20111@hotmail.com', '3337445565', '82da99fac0414ce93414ea1cb0c3eec7'),
(5, 'Cesar', 'cesar@gmail.com', '1', '202cb962ac59075b964b07152d234b70'),
(6, 'jose', 'souzafilho39@outlook.com', '12332232232', '202cb962ac59075b964b07152d234b70'),
(10, 'Vitin', 'vitin_oficial@gmail.com', '000', '202cb962ac59075b964b07152d234b70'),
(11, 'a', 'a@gmail.com', 'a', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` varchar(45) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `descricao`, `categoria`, `quantidade`, `preco`, `img`) VALUES
(2, 'Apple iPhone 13 (128 GB) - Meia-noite', 'Apple iPhone 13 (128 GB) - Meia-noite', 'smartphone', 5, '3999', 'https://m.media-amazon.com/images/I/41rfDU6FGqL._AC_SX679_.jpg'),
(3, 'Samsung Galaxy S23 5G 128GB', 'Samsung Galaxy S23 5G 128GB - 8GB RAM', 'smartphone', 5, '3510', 'https://m.media-amazon.com/images/I/61XWTf2no8L._AC_SX679_.jpg'),
(4, 'Samsung Galaxy S21 FE 128GB', 'Samsung Galaxy S21 FE 128GB - 6GB RAM', 'smartphone', 5, '1799', 'https://m.media-amazon.com/images/I/71Eqf5pjUiL._AC_SX679_.jpg'),
(5, 'Samsung Galaxy S23 Ultra 5G 256GB', 'Samsung Galaxy S23 Ultra 5G 256GB - 12GB RAM', 'smartphone', 5, '5999', 'https://m.media-amazon.com/images/I/61aEbAwahaL._AC_SX679_.jpg'),
(6, 'Apple iPhone 13 (128GB) - Estelar', 'Apple iPhone 13 (128GB) ', 'smartphone', 5, '4499', 'https://m.media-amazon.com/images/I/41t1UNX2zHL._AC_SX679_.jpg'),
(7, 'Samsung Galaxy A34 128GB', 'Samsung Galaxy A34 128GB - 6GB RAM', 'smartphone', 5, '1599', 'https://m.media-amazon.com/images/I/51rqC8CMyzL._AC_SX679_.jpg'),
(8, 'Smartphone Xiaomi Note 12S', 'Smartphone Xiaomi Note 12S 128GB - 8GB RAM', 'smartphone', 5, '1199', 'https://m.media-amazon.com/images/I/61LvXyda+6L._AC_SX679_.jpg'),
(9, 'Smartphone Xiaomi POCO X5 Pro ', 'Smartphone Xiaomi POCO X5 Pro - 256 / 8GB', 'smartphone', 5, '1939', 'https://m.media-amazon.com/images/I/61qgJ64LKuL._AC_SX679_.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `carrinho_compras`
--
ALTER TABLE `carrinho_compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produto` (`id_produto`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carrinho_compras`
--
ALTER TABLE `carrinho_compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `carrinho_compras`
--
ALTER TABLE `carrinho_compras`
  ADD CONSTRAINT `carrinho_compras_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`),
  ADD CONSTRAINT `carrinho_compras_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `cliente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
