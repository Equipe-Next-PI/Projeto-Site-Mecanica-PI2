-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/05/2026 às 01:23
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `oficina_next`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `itens_orcamento`
--

CREATE TABLE `itens_orcamento` (
  `orcamento_id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `itens_orcamento`
--

INSERT INTO `itens_orcamento` (`orcamento_id`, `servico_id`, `produto_id`, `quantidade`) VALUES
(1, 8, 17, 2),
(2, 4, NULL, 1),
(3, 1, 1, 4),
(3, 2, NULL, 1),
(4, 1, 2, 1),
(5, 3, 3, 1),
(6, 5, 13, 5),
(7, 7, 9, 1),
(8, 6, 6, 1),
(9, 2, NULL, 1),
(10, 4, 4, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `orcamentos`
--

CREATE TABLE `orcamentos` (
  `id` int(11) NOT NULL,
  `nome_cliente` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `marca_veiculo` varchar(50) NOT NULL,
  `modelo_ano` varchar(50) NOT NULL,
  `descricao_problema` text NOT NULL,
  `status` enum('pendente','lido','concluido') DEFAULT 'pendente',
  `data_pedido` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `orcamentos`
--

INSERT INTO `orcamentos` (`id`, `nome_cliente`, `email`, `celular`, `marca_veiculo`, `modelo_ano`, `descricao_problema`, `status`, `data_pedido`) VALUES
(1, 'João Silva', 'joao@email.com', '11988887777', 'Fiat', 'Uno 2015', 'Barulho na suspensão', 'pendente', '2026-05-08 20:18:16'),
(2, 'Maria Oliveira', 'maria@email.com', '11977776666', 'VW', 'Gol 2018', 'Luz da injeção acesa', 'pendente', '2026-05-08 20:18:16'),
(3, 'Carlos Souza', 'carlos@email.com', '11966665555', 'Ford', 'Ka 2019', 'Revisão geral', 'pendente', '2026-05-08 20:18:16'),
(4, 'Ana Santos', 'ana@email.com', '11955554444', 'Hyundai', 'HB20 2020', 'Troca de óleo', 'pendente', '2026-05-08 20:18:16'),
(5, 'Pedro Alves', 'pedro@email.com', '11944443333', 'Chevrolet', 'Onix 2021', 'Freio assobiando', 'pendente', '2026-05-08 20:18:16'),
(6, 'Julia Gomes', 'julia@email.com', '11933332222', 'Honda', 'Civic 2017', 'Vazamento de óleo', 'pendente', '2026-05-08 20:18:16'),
(7, 'Fernando Lima', 'fer@email.com', '11922221111', 'Toyota', 'Corolla 2016', 'Ar não gela', 'pendente', '2026-05-08 20:18:16'),
(8, 'Beatriz Costa', 'bi@email.com', '11911110000', 'Renault', 'Sandero 2014', 'Troca de correia', 'pendente', '2026-05-08 20:18:16'),
(9, 'Lucas Rocha', 'lucas@email.com', '11900009999', 'Fiat', 'Argo 2022', 'Alinhamento', 'pendente', '2026-05-08 20:18:16'),
(10, 'Patrícia Reis', 'patri@email.com', '11999998888', 'Jeep', 'Renegade 2020', 'Bateria fraca', 'pendente', '2026-05-08 20:18:16');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `estoque` int(11) NOT NULL DEFAULT 0,
  `imagem` varchar(255) NOT NULL,
  `data_cadastro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`, `estoque`, `imagem`, `data_cadastro`) VALUES
(1, 'Óleo 5W30 Sintético', 'Óleo de alta performance para motores modernos.', 145.90, 100, './assets/img/slide1.png', '2026-05-08 20:14:54'),
(2, 'Filtro de Óleo', 'Filtro blindado para retenção de impurezas.', 45.00, 50, './assets/img/slide2.png', '2026-05-08 20:14:54'),
(3, 'Pastilha de Freio', 'Jogo de pastilhas de cerâmica.', 210.00, 20, './assets/img/slide3.png', '2026-05-08 20:14:54'),
(4, 'Bateria 60Ah', 'Bateria selada com 18 meses de garantia.', 480.00, 15, './assets/img/slide1.png', '2026-05-08 20:14:54'),
(5, 'Lâmpada H7', 'Lâmpada de farol efeito xenon.', 35.00, 40, './assets/img/slide2.png', '2026-05-08 20:14:54'),
(6, 'Correia Dentada', 'Correia reforçada para motores 16V.', 180.00, 12, './assets/img/slide3.png', '2026-05-08 20:14:54'),
(7, 'Vela de Ignição', 'Vela Iridium para melhor queima.', 65.00, 80, './assets/img/slide1.png', '2026-05-08 20:14:54'),
(8, 'Amortecedor Dianteiro', 'Amortecedor pressurizado par.', 850.00, 8, './assets/img/slide2.png', '2026-05-08 20:14:54'),
(9, 'Filtro de Ar Cabine', 'Filtro com carvão ativado.', 55.00, 30, './assets/img/slide3.png', '2026-05-08 20:14:54'),
(10, 'Aditivo Radiador', 'Líquido de arrefecimento orgânico.', 38.00, 60, './assets/img/slide1.png', '2026-05-08 20:14:54'),
(11, 'Disco de Freio', 'Par de discos ventilados.', 320.00, 10, './assets/img/slide2.png', '2026-05-08 20:14:54'),
(12, 'Pneu 175/65 R14', 'Pneu urbano alta aderência.', 390.00, 24, './assets/img/slide3.png', '2026-05-08 20:14:54'),
(13, 'Fluido Câmbio AT', 'Específico para transmissões automáticas.', 95.00, 45, './assets/img/slide1.png', '2026-05-08 20:14:54'),
(14, 'Kit Embreagem', 'Platô, disco e rolamento.', 720.00, 5, './assets/img/slide2.png', '2026-05-08 20:14:54'),
(15, 'Cabo de Ignição', 'Jogo de cabos resistivos.', 115.00, 18, './assets/img/slide3.png', '2026-05-08 20:14:54'),
(16, 'Terminal Direção', 'Peça para ajuste de alinhamento.', 85.00, 14, './assets/img/slide1.png', '2026-05-08 20:14:54'),
(17, 'Bucha Balança', 'Bucha em poliuretano.', 25.00, 40, './assets/img/slide2.png', '2026-05-08 20:14:54'),
(18, 'Rolamento Roda', 'Rolamento blindado traseiro.', 155.00, 22, './assets/img/slide3.png', '2026-05-08 20:14:54'),
(19, 'Bomba d\'Água', 'Bomba com rotor metálico.', 240.00, 7, './assets/img/slide1.png', '2026-05-08 20:14:54'),
(20, 'Sensor Ré', 'Kit com 4 sensores e display.', 190.00, 11, './assets/img/slide2.png', '2026-05-08 20:14:54'),
(21, 'Óleo 5W30 Sintético', 'Óleo de alta performance para motores modernos.', 145.90, 100, './assets/img/slide1.png', '2026-05-08 20:16:11'),
(22, 'Filtro de Óleo', 'Filtro blindado para retenção de impurezas.', 45.00, 50, './assets/img/slide2.png', '2026-05-08 20:16:11'),
(23, 'Pastilha de Freio', 'Jogo de pastilhas de cerâmica.', 210.00, 20, './assets/img/slide3.png', '2026-05-08 20:16:11'),
(24, 'Bateria 60Ah', 'Bateria selada com 18 meses de garantia.', 480.00, 15, './assets/img/slide1.png', '2026-05-08 20:16:11'),
(25, 'Lâmpada H7', 'Lâmpada de farol efeito xenon.', 35.00, 40, './assets/img/slide2.png', '2026-05-08 20:16:11'),
(26, 'Correia Dentada', 'Correia reforçada para motores 16V.', 180.00, 12, './assets/img/slide3.png', '2026-05-08 20:16:11'),
(27, 'Vela de Ignição', 'Vela Iridium para melhor queima.', 65.00, 80, './assets/img/slide1.png', '2026-05-08 20:16:11'),
(28, 'Amortecedor Dianteiro', 'Amortecedor pressurizado par.', 850.00, 8, './assets/img/slide2.png', '2026-05-08 20:16:11'),
(29, 'Filtro de Ar Cabine', 'Filtro com carvão ativado.', 55.00, 30, './assets/img/slide3.png', '2026-05-08 20:16:11'),
(30, 'Aditivo Radiador', 'Líquido de arrefecimento orgânico.', 38.00, 60, './assets/img/slide1.png', '2026-05-08 20:16:11'),
(31, 'Disco de Freio', 'Par de discos ventilados.', 320.00, 10, './assets/img/slide2.png', '2026-05-08 20:16:11'),
(32, 'Pneu 175/65 R14', 'Pneu urbano alta aderência.', 390.00, 24, './assets/img/slide3.png', '2026-05-08 20:16:11'),
(33, 'Fluido Câmbio AT', 'Específico para transmissões automáticas.', 95.00, 45, './assets/img/slide1.png', '2026-05-08 20:16:11'),
(34, 'Kit Embreagem', 'Platô, disco e rolamento.', 720.00, 5, './assets/img/slide2.png', '2026-05-08 20:16:11'),
(35, 'Cabo de Ignição', 'Jogo de cabos resistivos.', 115.00, 18, './assets/img/slide3.png', '2026-05-08 20:16:11'),
(36, 'Terminal Direção', 'Peça para ajuste de alinhamento.', 85.00, 14, './assets/img/slide1.png', '2026-05-08 20:16:11'),
(37, 'Bucha Balança', 'Bucha em poliuretano.', 25.00, 40, './assets/img/slide2.png', '2026-05-08 20:16:11'),
(38, 'Rolamento Roda', 'Rolamento blindado traseiro.', 155.00, 22, './assets/img/slide3.png', '2026-05-08 20:16:11'),
(39, 'Bomba d\'Água', 'Bomba com rotor metálico.', 240.00, 7, './assets/img/slide1.png', '2026-05-08 20:16:11'),
(40, 'Sensor Ré', 'Kit com 4 sensores e display.', 190.00, 11, './assets/img/slide2.png', '2026-05-08 20:16:11');

-- --------------------------------------------------------

--
-- Estrutura para tabela `servicos`
--

CREATE TABLE `servicos` (
  `id` int(11) NOT NULL,
  `nome_servico` varchar(100) NOT NULL,
  `descricao_servico` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `servicos`
--

INSERT INTO `servicos` (`id`, `nome_servico`, `descricao_servico`) VALUES
(1, 'Troca de Óleo e Filtro', 'Escoamento do óleo antigo e substituição do filtro e óleo do motor.'),
(2, 'Alinhamento e Balanceamento', 'Ajuste da geometria da direção e balanceamento das 4 rodas.'),
(3, 'Revisão do Sistema de Freios', 'Inspeção e troca de pastilhas, discos e fluido de freio.'),
(4, 'Diagnóstico Computadorizado', 'Leitura da centralina via scanner OBD2 para apagar falhas.'),
(5, 'Manutenção de Câmbio Automático', 'Troca de fluido de transmissão e limpeza de cárter.'),
(6, 'Troca de Correia Dentada', 'Substituição da correia de distribuição e tensionadores.'),
(7, 'Higienização de Ar Condicionado', 'Limpeza do sistema de ventilação e troca do filtro de cabine.'),
(8, 'Revisão de Suspensão', 'Inspeção e troca de amortecedores, molas e buchas.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel_acesso` enum('admin','cliente') DEFAULT 'cliente',
  `data_criacao` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `sobrenome`, `email`, `senha`, `nivel_acesso`, `data_criacao`) VALUES
(1, 'Vitor', 'Hugo', 'vitor@next.com', 'admin123', 'admin', '2026-05-08 20:14:54'),
(2, 'Alickson', 'Ramos', 'alickson@next.com', 'admin123', 'admin', '2026-05-08 20:14:54'),
(3, 'Pedro', 'Henrique', 'pedro@next.com', 'admin123', 'admin', '2026-05-08 20:14:54'),
(4, 'Wallace', 'Silva', 'wallace@next.com', 'admin123', 'admin', '2026-05-08 20:14:54'),
(5, 'Ricardo', 'Mendes', 'ricardo@email.com', 'user123', 'cliente', '2026-05-08 20:14:54'),
(6, 'Maria', 'Oliveira', 'maria@email.com', 'user123', 'cliente', '2026-05-08 20:14:54'),
(7, 'Carlos', 'Santos', 'carlos@email.com', 'user123', 'cliente', '2026-05-08 20:14:54'),
(8, 'Ana', 'Costa', 'ana@email.com', 'user123', 'cliente', '2026-05-08 20:14:54'),
(9, 'Bruno', 'Ferreira', 'bruno@email.com', 'user123', 'cliente', '2026-05-08 20:14:54'),
(10, 'Juliana', 'Alves', 'juliana@email.com', 'user123', 'cliente', '2026-05-08 20:14:54'),
(11, 'Fernando', 'Lima', 'fernando@email.com', 'user123', 'cliente', '2026-05-08 20:14:54'),
(12, 'Gabriela', 'Rocha', 'gabriela@email.com', 'user123', 'cliente', '2026-05-08 20:14:54'),
(13, 'Lucas', 'Souza', 'lucas@email.com', 'user123', 'cliente', '2026-05-08 20:14:54'),
(14, 'Amanda', 'Pereira', 'amanda@email.com', 'user123', 'cliente', '2026-05-08 20:14:54'),
(15, 'Roberto', 'Nunes', 'roberto@email.com', 'user123', 'cliente', '2026-05-08 20:14:54'),
(16, 'Camila', 'Gomes', 'camila@email.com', 'user123', 'cliente', '2026-05-08 20:14:54'),
(17, 'Daniel', 'Teixeira', 'daniel@email.com', 'user123', 'cliente', '2026-05-08 20:14:54'),
(18, 'Patrícia', 'Lopes', 'patricia@email.com', 'user123', 'cliente', '2026-05-08 20:14:54'),
(19, 'Marcelo', 'Ribeiro', 'marcelo@email.com', 'user123', 'cliente', '2026-05-08 20:14:54'),
(20, 'Sônia', 'Barbosa', 'sonia@email.com', 'user123', 'cliente', '2026-05-08 20:14:54');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `itens_orcamento`
--
ALTER TABLE `itens_orcamento`
  ADD PRIMARY KEY (`orcamento_id`,`servico_id`),
  ADD KEY `servico_id` (`servico_id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Índices de tabela `orcamentos`
--
ALTER TABLE `orcamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de tabela `orcamentos`
--
ALTER TABLE `orcamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `itens_orcamento`
--
ALTER TABLE `itens_orcamento`
  ADD CONSTRAINT `itens_orcamento_ibfk_1` FOREIGN KEY (`orcamento_id`) REFERENCES `orcamentos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `itens_orcamento_ibfk_2` FOREIGN KEY (`servico_id`) REFERENCES `servicos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `itens_orcamento_ibfk_3` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
