-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Nov-2023 às 21:37
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
-- Banco de dados: `unitec`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `id_article_user` int(11) NOT NULL,
  `nome_article_user` varchar(220) NOT NULL,
  `titulo_article` varchar(200) NOT NULL,
  `desc_article` varchar(200) NOT NULL,
  `name_article` varchar(100) NOT NULL,
  `path_article` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `article`
--

INSERT INTO `article` (`id_article`, `id_article_user`, `nome_article_user`, `titulo_article`, `desc_article`, `name_article`, `path_article`) VALUES
(120, 1, 'Vitor Capeleti Gomes', 'TESTE COM VITOR CAPELETI', 'TESTE', 'Os desafios da ética e da moral na sociedade contemp redação.pdf', 'arquivos/65382ad3dff55.pdf'),
(121, 2, 'Machado de Assis', 'TESTE COM MACHADO DE ASSIS', 'TESTE', 'Os desafios da ética e da moral na sociedade contemp redação.pdf', 'arquivos/65382aefb530f.pdf'),
(122, 3, 'Felipe Santos', 'TESTE COM FELIPE SANTOS', 'TESTE', 'Os desafios da ética e da moral na sociedade contemp redação.pdf', 'arquivos/65382b0f6fcb2.pdf'),
(123, 1, 'Vitor Capeleti Gomes', 'esse é um teste para testar o tamanho que o texto pode chegar para que seja possível testar', 'esse é um teste para testar o tamanho que o texto pode chegar para que seja possível testar', 'redacao_militares.pdf', 'arquivos/65385cb3da0a6.pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `id_user_feedback` int(11) NOT NULL,
  `desc_feedback` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `id_user_feedback`, `desc_feedback`) VALUES
(1, 2, 'teste de descricao'),
(2, 1, 'teste com vitor'),
(3, 1, 'último teste'),
(4, 5, 'uou');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nome_user` varchar(220) NOT NULL,
  `email_user` varchar(220) NOT NULL,
  `senha_user` varchar(220) NOT NULL,
  `data_user` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id_user`, `nome_user`, `email_user`, `senha_user`, `data_user`) VALUES
(1, 'Vitor Capeleti Gomes', 'teste@gmail.com', '123456', '2023-09-08'),
(2, 'Machado de Assis', 'teste1@gmail.com', '123456', '2023-09-03'),
(3, 'Felipe Santos', 'teste2@gmail.com', '123', '2023-09-03'),
(5, 'Usuário', 'usuario@gmail.com', 'usuario', '2008-02-21');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `user_article` (`id_article_user`);

--
-- Índices para tabela `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`),
  ADD KEY `user_feedback` (`id_user_feedback`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT de tabela `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `user_article` FOREIGN KEY (`id_article_user`) REFERENCES `user` (`id_user`);

--
-- Limitadores para a tabela `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `user_feedback` FOREIGN KEY (`id_user_feedback`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
