-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Dez-2023 às 22:07
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mecanica`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `formaPagamento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `formaPagamento`) VALUES
(1, 'Cartão de crédito'),
(3, 'Pix'),
(5, 'Dinheiro físico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mecanicos`
--

CREATE TABLE `mecanicos` (
  `id_mecanico` int(11) NOT NULL,
  `salario` float NOT NULL,
  `cargo` varchar(20) NOT NULL,
  `especializacao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mecanicos`
--

INSERT INTO `mecanicos` (`id_mecanico`, `salario`, `cargo`, `especializacao`) VALUES
(2, 2500, 'Auxiliar', 'Suspensão e Freios'),
(4, 6000, 'Chefe', 'Motor a diesel'),
(6, 3000, 'Auxiliar', 'Câmbio manual');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `id_pessoa` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `endereco` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`id_pessoa`, `nome`, `cpf`, `telefone`, `endereco`) VALUES
(1, 'João Zanotti', '123.456.789-12', '(27)99999-8888', 'Alto Rio Perdido, Santa Teresa - ES'),
(2, 'Adrian Malavasi', '999.888.777-66', '(27)98765-4321', 'Várzea Alegre, Santa Teresa - ES'),
(3, 'Rickelmy Santos', '987.654.321-98', '(27)91234-5678', 'Nova Almeida, Serra - ES'),
(4, 'Eduardo Janz', '666.777.888-99', '(11)96385-2741', 'Rua São Paulo, São Paulo - SP'),
(5, 'Igor Zanotti', '444.555.666-77', '(27)91472-5836', 'Rua Martinho Lutero, Santa Maria de Jetibá - ES'),
(6, 'Rafael Capeletti', '777.888.999-66', '(27)98527-4163', 'Várzea Alegre, Santa Teresa - ES');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `id_servico` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `valor` float NOT NULL,
  `data_hora` datetime NOT NULL,
  `tempo_duracao` varchar(10) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_mecanico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id_servico`, `tipo`, `valor`, `data_hora`, `tempo_duracao`, `id_cliente`, `id_mecanico`) VALUES
(1, 'Troca de óleo do motor', 180, '2023-12-08 22:48:18', '1h30min', 3, 4),
(2, 'Troca de amortecedores', 1250, '2023-12-11 09:10:05', '2h30min', 1, 2),
(3, 'Troca do líquido de arrefecimento', 150, '2023-12-12 08:01:40', '45min', 3, 4),
(4, 'Troca da junta do cabeçote', 850, '2023-12-12 11:21:29', '4h', 1, 4);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `mecanicos`
--
ALTER TABLE `mecanicos`
  ADD PRIMARY KEY (`id_mecanico`);

--
-- Índices para tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`id_pessoa`);

--
-- Índices para tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id_servico`),
  ADD KEY `servicos_fk1` (`id_cliente`),
  ADD KEY `servicos_fk2` (`id_mecanico`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `id_pessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id_servico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_pfk` FOREIGN KEY (`id_cliente`) REFERENCES `pessoas` (`id_pessoa`);

--
-- Limitadores para a tabela `mecanicos`
--
ALTER TABLE `mecanicos`
  ADD CONSTRAINT `mecanicos_pfk` FOREIGN KEY (`id_mecanico`) REFERENCES `pessoas` (`id_pessoa`);

--
-- Limitadores para a tabela `servicos`
--
ALTER TABLE `servicos`
  ADD CONSTRAINT `servicos_fk1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `servicos_fk2` FOREIGN KEY (`id_mecanico`) REFERENCES `mecanicos` (`id_mecanico`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
