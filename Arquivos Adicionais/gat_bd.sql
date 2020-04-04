-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Mar-2020 às 01:09
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gat`
--
CREATE DATABASE IF NOT EXISTS `gat` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `gat`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `login_admin` varchar(50) NOT NULL,
  `senha_admin` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id_admin`, `login_admin`, `senha_admin`) VALUES
(1, 'admin', '97db1846570837fce6ff62a408f1c26a');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(100) NOT NULL,
  `sobrenome_cliente` varchar(200) NOT NULL,
  `nickname_cliente` varchar(100) NOT NULL,
  `fone1_cliente` varchar(15) NOT NULL,
  `fone2_cliente` varchar(15) NOT NULL,
  `email_cliente` varchar(100) NOT NULL,
  `senha_cliente` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome_cliente`, `sobrenome_cliente`, `nickname_cliente`, `fone1_cliente`, `fone2_cliente`, `email_cliente`, `senha_cliente`) VALUES
(1, 'Victor', 'Falcão', 'victor', '(87)9.9920-1888', '(87)9.8111-9313', 'victorfalcao33@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 'Ze', 'da Silva', 'xxx', '(87)9.9917-1048', '(87)9.8109-5213', 'ze@gmail.com', '202cb962ac59075b964b07152d234b70'),
(3, 'wil', 'hawk', 'wil', '(87)9.96620-188', '(87)9.8130-9313', 'www@gmail.com', '202cb962ac59075b964b07152d234b70'),
(4, 'daniely', 'domingos', 'dani', '(87)9.9966-5588', '(87)9.8125-9510', 'dani@gmail.com', '202cb962ac59075b964b07152d234b70'),
(5, 'vinicios', 'silva', 'vini', '(87)9.99220-187', '(87)9.8251-9313', 'vini@gmail.com', '202cb962ac59075b964b07152d234b70'),
(7, 'Max', 'Winter', 'maxxx', '(81)9.9285-4218', '(81)9.8854-9852', 'maxwinter@gmail.com', '202cb962ac59075b964b07152d234b70'),
(8, 'gustavo', 'batista', 'gugu', '(95)9.9856-1202', '(95)9.2056-1296', 'gugu@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `id_servico` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `cod_servico` varchar(8) NOT NULL,
  `modelo_servico` varchar(100) NOT NULL,
  `imei1_servico` bigint(15) NOT NULL,
  `imei2_servico` bigint(15) NOT NULL,
  `cor_servico` varchar(20) NOT NULL,
  `defeito_servico` varchar(500) NOT NULL,
  `statos_servico` varchar(100) NOT NULL,
  `data_time_servico` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id_servico`, `id_cliente`, `cod_servico`, `modelo_servico`, `imei1_servico`, `imei2_servico`, `cor_servico`, `defeito_servico`, `statos_servico`, `data_time_servico`) VALUES
(1, 1, '4a5e2d9c', 'J3', 123456789012345, 543210987654321, 'preto', 'touch', 'ok', '2020-03-18 21:47:38'),
(2, 4, '85e9bca0', 'Moto G3', 123456789012345, 123456789032154, 'branco', 'touch', 'em andamento', '2020-03-11 08:27:19'),
(3, 2, '9ac60b55', 'J1 mini', 123456789012347, 185246798215045, 'dourado', 'microfone', 'pronto', '2020-03-30 12:13:08'),
(4, 3, 'ed4785ca', 'LG B220', 123456789012345, 125158021548750, 'preto', 'teclado', 'pronto', '2020-03-01 15:13:16'),
(5, 5, '87edc45a', 'S10', 123456789012345, 852852852852741, 'preto', 'placa', 'aguardando peças', '2020-04-02 12:13:55'),
(6, 1, '4bd4a023', 'Mi A2', 111111111111111, 123456789012334, 'Dourado', 'placa', 'AGUARDANDO ORÇAMENTO', '2020-04-02 17:46:34');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `login_admin` (`login_admin`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `nickname_cliente` (`nickname_cliente`);

--
-- Índices para tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`id_servico`),
  ADD UNIQUE KEY `cod_servico` (`cod_servico`),
  ADD KEY `id_clien_serv` (`id_cliente`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `id_servico` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `servico`
--
ALTER TABLE `servico`
  ADD CONSTRAINT `id_clien_serv` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
