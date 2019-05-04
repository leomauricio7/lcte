-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Maio-2019 às 21:35
-- Versão do servidor: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lcte`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `editais`
--

CREATE TABLE `editais` (
  `id` int(11) NOT NULL,
  `ano` year(4) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `lei` varchar(500) NOT NULL,
  `dataRetirada` date DEFAULT NULL,
  `horaCertame` time DEFAULT NULL,
  `dataCertame` date NOT NULL,
  `descricao` text NOT NULL,
  `link_aviso` varchar(300) DEFAULT NULL,
  `link_edital` varchar(300) DEFAULT NULL,
  `termo_adesao` varchar(220) DEFAULT NULL,
  `contrato` varchar(220) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `id_situacao` int(11) NOT NULL,
  `tags` varchar(300) NOT NULL,
  `dia` varchar(2) NOT NULL,
  `mes` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `editais`
--

INSERT INTO `editais` (`id`, `ano`, `id_tipo`, `lei`, `dataRetirada`, `horaCertame`, `dataCertame`, `descricao`, `link_aviso`, `link_edital`, `termo_adesao`, `contrato`, `created`, `id_situacao`, `tags`, `dia`, `mes`) VALUES
(16, 2017, 5, 'Sem Lei', NULL, NULL, '2019-05-24', 'Teste LicitaÃ§Ã£o EdiÃ§Ã£o', NULL, NULL, 'Termo.pdf', 'Contrato.pdf', '2018-10-04', 1, 'Teste, LicitaÃ§Ã£o', '04', 'Oct'),
(17, 2017, 5, 'nos termos da Lei Federal 10.520 de 17/07/2002, subsidiada pela Lei nÂº 8.666 de 21 junho de 1993', NULL, NULL, '2018-10-25', '005-2017 - ContrataÃ§Ã£o de empresa para prestaÃ§Ã£o de serviÃ§os de manutenÃ§Ã£o preventiva, corretiva e assistÃªncia tÃ©cnica (com reposiÃ§Ã£o de peÃ§as e acessÃ³rios originais) e reboque de veÃ­culos pertencentes Ã  PMBJ', NULL, NULL, 'Termo.pdf', 'Contrato.pdf', '2018-10-04', 1, '005-2017 - ContrataÃ§Ã£o de empresa para prestaÃ§Ã£o de serviÃ§os de manutenÃ§Ã£o preventiva, corretiva e assistÃªncia tÃ©cnica (com reposiÃ§Ã£o de peÃ§as e acessÃ³rios originais) e reboque de veÃ­culos pertencentes Ã  PMBJ', '04', 'Oct'),
(18, 2017, 5, 'Sem Lei', NULL, NULL, '2018-10-04', 'Teste LicitaÃ§Ã£o inexigibilidade', NULL, NULL, 'Termo.pdf', 'Contrato.pdf', '2018-10-04', 1, 'Teste, LicitaÃ§Ã£o', '04', 'Oct'),
(19, 2018, 6, 'nos termos da Lei Federal 10.520 de 17/07/2002, subsidiada pela Lei nÂº 8.666 de 21 junho de 1993', NULL, NULL, '2018-10-04', 'Teste LicitaÃ§Ã£o adesÃ£o carona', NULL, NULL, 'Termo.pdf', 'Contrato.pdf', '2018-10-04', 1, 'Teste, LicitaÃ§Ã£o', '04', 'Oct'),
(21, 2018, 1, 'nos termos da Lei Federal 10.520 de 17/07/2002, subsidiada pela Lei nÂº 8.666 de 21 junho de 1993', '2018-10-04', '12:00:00', '2019-06-21', 'Teste LicitaÃ§Ã£o ediÃ§Ã£o', 'Aviso 012.pdf', 'Edital 012.pdf', NULL, NULL, '2018-10-04', 1, 'Teste, LicitaÃ§Ã£o', '04', 'Oct');

-- --------------------------------------------------------

--
-- Estrutura da tabela `edital_analise_recursos`
--

CREATE TABLE `edital_analise_recursos` (
  `id_analise_recurso` int(11) NOT NULL,
  `id_edital` int(11) NOT NULL,
  `pdf` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `edital_analise_recursos`
--

INSERT INTO `edital_analise_recursos` (`id_analise_recurso`, `id_edital`, `pdf`) VALUES
(9, 21, 'Analise 012-1.pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `edital_anos`
--

CREATE TABLE `edital_anos` (
  `id` int(11) NOT NULL,
  `ano` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `edital_anos`
--

INSERT INTO `edital_anos` (`id`, `ano`) VALUES
(1, 2014),
(2, 2015),
(3, 2016),
(4, 2017),
(5, 2018),
(8, 2019),
(9, 2020);

-- --------------------------------------------------------

--
-- Estrutura da tabela `edital_arps`
--

CREATE TABLE `edital_arps` (
  `id_arp` int(11) NOT NULL,
  `id_edital` int(11) NOT NULL,
  `pdf` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `edital_arps`
--

INSERT INTO `edital_arps` (`id_arp`, `id_edital`, `pdf`) VALUES
(9, 21, 'ARP 012.pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `edital_documentos`
--

CREATE TABLE `edital_documentos` (
  `id_documento` int(11) NOT NULL,
  `id_edital` int(11) NOT NULL,
  `pdf` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `edital_documentos`
--

INSERT INTO `edital_documentos` (`id_documento`, `id_edital`, `pdf`) VALUES
(19, 21, 'Termo.pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `edital_extratos`
--

CREATE TABLE `edital_extratos` (
  `id_extrato` int(11) NOT NULL,
  `id_edital` int(11) NOT NULL,
  `pdf` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `edital_extratos`
--

INSERT INTO `edital_extratos` (`id_extrato`, `id_edital`, `pdf`) VALUES
(9, 21, 'Resultado 012.pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `edital_recursos`
--

CREATE TABLE `edital_recursos` (
  `id_recurso` int(11) NOT NULL,
  `id_edital` int(11) NOT NULL,
  `pdf` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `edital_recursos`
--

INSERT INTO `edital_recursos` (`id_recurso`, `id_edital`, `pdf`) VALUES
(9, 21, 'Recurso 012.pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `edital_situacao`
--

CREATE TABLE `edital_situacao` (
  `id` int(11) NOT NULL,
  `situacao` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `edital_situacao`
--

INSERT INTO `edital_situacao` (`id`, `situacao`) VALUES
(1, 'Aberto'),
(2, 'Encerrado'),
(3, 'Cancelado'),
(4, 'Inpugnado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `edital_tipo`
--

CREATE TABLE `edital_tipo` (
  `id` int(11) NOT NULL,
  `tipo` varchar(255) CHARACTER SET latin1 NOT NULL,
  `pasta` varchar(300) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `edital_tipo`
--

INSERT INTO `edital_tipo` (`id`, `tipo`, `pasta`) VALUES
(1, 'Carta Convite', 'carta-convite'),
(2, 'Chamada Pública', 'chamada-publica'),
(3, 'Pregão Presencial', 'pregao-presencial'),
(4, 'Tomada de Preço', 'tomada-de-preco'),
(5, 'Inexigibilidade', 'inexigibilidade'),
(6, 'Adesão/Carona', 'adesao-carona');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `url` varchar(220) NOT NULL,
  `legenda` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pages`
--

INSERT INTO `pages` (`id`, `nome`, `url`, `legenda`) VALUES
(9, 'Home', 'home', 'PÃ¡gina Inicial do Sistema'),
(10, 'Cadastrar UsuÃ¡rios', 'cadastra-usuario', 'PÃ¡gina de cadastrar usuÃ¡rios'),
(11, 'Listar usuÃ¡rios', 'usuarios', 'PÃ¡gina de listar usuÃ¡rios Cadastrados'),
(13, 'Editar usuÃ¡rio', 'edit-usuario', 'Pagina de Editar UsuÃ¡rio'),
(14, 'Cadastrar PÃ¡gina', 'cadastra-pagina', 'Cadastrar PÃ¡ginas'),
(15, 'Lista PÃ¡ginas', 'paginas', 'PÃ¡ginas Cadastradas'),
(16, 'Editar PÃ¡ginas', 'edit-pagina', 'Editar PÃ¡ginas'),
(17, 'Lista Niveis de Acesso', 'niveis-de-acessos', 'NÃ­veis de Acesso Cadastrados'),
(18, 'Editar Niveis de Acesso', 'edit-nivel-de-acesso', 'PÃ¡gina de editar os NÃ­veis de Acesso'),
(19, 'Cadastrar NÃ­vel de Acesso', 'cadastra-nivel-de-acesso', 'PÃ¡gina de Cadastrar NÃ­vel de Acesso'),
(20, 'Excluir pÃ¡ginas ', 'delete-pagina', 'PermissÃ£o para excluir pÃ¡ginas'),
(21, 'Excluir UsuÃ¡rios', 'delete-usuario', 'Deletar UsuÃ¡rios'),
(22, 'Excluir NÃ­vel de Acesso', 'delete-nivel-de-acesso', 'Deletar nÃ­vel de acesso'),
(23, 'Exporta Base de Dados', 'exporta-base-dados', 'PÃ¡gina para importar o banco de dados'),
(24, 'Exportar tabela do banco de dados', 'exporta-planilha', 'PÃ¡gina para exporta Tabela'),
(25, 'Importa Planilha ', 'importa-planilha', 'Importa planilha do Excel para o banco de dados'),
(26, 'Importa Banco de Dados', 'importa-base-dados', 'Importa banco de dados para o sistema'),
(27, 'Listar PermissÃµes', 'permissoes', 'Visualiza as permissÃµes'),
(28, 'Desbloquear PermissÃ£o', 'processa_permissao', 'FunÃ§Ã£o para habilitar/desabilitar permissÃ£o'),
(29, 'Alterar ordem de acesso dos usuÃ¡rios', 'altera-ordem', 'FunÃ§Ã£o de permitir alterar a ordem prioridade do usuÃ¡rio'),
(30, 'Cadastrar LicitaÃ§Ã£o', 'cadastra-licitacao', 'Pagina de publicar licitaÃ§Ãµes'),
(31, 'Editar LicitaÃ§Ãµes', 'edit-licitacao', 'PÃ¡gina de fazer alteraÃ§Ãµes em licitaÃ§Ãµes ja publicadas'),
(32, 'Excluir LicitaÃ§Ãµes', 'delete-licitacao', 'PermissÃ£o para deletar editais pubicados'),
(33, 'Lista LicitaÃ§Ãµes', 'licitacoes', 'LicitaÃ§Ãµes Cadastradas'),
(34, 'Detalhar LicitaÃ§Ã£o', 'view-licitacao', 'Pagina com os detalhes da licitaÃ§Ã£o selecionada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `senha` varchar(220) NOT NULL,
  `img` varchar(220) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_situacao` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `_token` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `email`, `cpf`, `senha`, `img`, `id_tipo`, `id_situacao`, `created`, `modified`, `_token`) VALUES
(1, 'Leonardo Mauricio', 'leomauricio7@gmail.com', '01759890448', '$2y$10$ccbh9Ic4Ohop77jSGW/e3.fLtSsJ3qiDq94DZPto/nnIZfHFrNJV6', 'user.png', 1, 1, '2018-10-01 00:00:00', '2018-10-02 20:55:29', '09e22602166464ff488ddb2035bea4b672081e1f4090ce49eb6146acc8b3af27'),
(12, 'Teste usuÃ¡rio', 'teste@gmail.com', '28566796926', '$2y$10$msuig2Abq6z6Z7LL87aS/OMtlrY7QaME/D8l77/Sp/H6LqEC44KtK', '_LNO4840.jpg', 6, 1, '2018-10-02 15:10:23', '2019-05-03 22:18:01', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_permision`
--

CREATE TABLE `user_permision` (
  `id` int(11) NOT NULL,
  `id_user_tipo` int(11) NOT NULL DEFAULT '0',
  `id_situacao_permission` int(11) NOT NULL DEFAULT '0',
  `id_page` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user_permision`
--

INSERT INTO `user_permision` (`id`, `id_user_tipo`, `id_situacao_permission`, `id_page`) VALUES
(8, 1, 1, 9),
(9, 2, 0, 9),
(10, 6, 1, 9),
(12, 10, 1, 9),
(13, 11, 0, 9),
(14, 12, 0, 9),
(15, 1, 1, 10),
(16, 2, 0, 10),
(17, 6, 0, 10),
(19, 10, 0, 10),
(20, 11, 0, 10),
(21, 12, 0, 10),
(22, 1, 1, 11),
(23, 2, 0, 11),
(24, 6, 0, 11),
(26, 10, 0, 11),
(27, 11, 0, 11),
(28, 12, 0, 11),
(36, 1, 1, 13),
(37, 2, 0, 13),
(38, 6, 0, 13),
(39, 10, 0, 13),
(40, 11, 0, 13),
(41, 12, 0, 13),
(42, 1, 1, 14),
(43, 2, 0, 14),
(44, 6, 0, 14),
(45, 10, 0, 14),
(46, 11, 0, 14),
(47, 12, 0, 14),
(48, 1, 1, 15),
(49, 2, 0, 15),
(50, 6, 0, 15),
(51, 10, 0, 15),
(52, 11, 0, 15),
(53, 12, 0, 15),
(54, 1, 1, 16),
(55, 2, 0, 16),
(56, 6, 0, 16),
(57, 10, 0, 16),
(58, 11, 0, 16),
(59, 12, 0, 16),
(60, 1, 1, 17),
(61, 2, 0, 17),
(62, 6, 0, 17),
(63, 10, 0, 17),
(64, 11, 0, 17),
(65, 12, 0, 17),
(66, 1, 1, 18),
(67, 2, 0, 18),
(68, 6, 0, 18),
(69, 10, 0, 18),
(70, 11, 0, 18),
(71, 12, 0, 18),
(72, 1, 1, 19),
(73, 2, 0, 19),
(74, 6, 0, 19),
(75, 10, 0, 19),
(76, 11, 0, 19),
(77, 12, 0, 19),
(78, 1, 1, 20),
(79, 2, 0, 20),
(80, 6, 0, 20),
(81, 10, 0, 20),
(82, 11, 0, 20),
(83, 12, 0, 20),
(84, 1, 1, 21),
(85, 2, 0, 21),
(86, 6, 0, 21),
(87, 10, 0, 21),
(88, 11, 0, 21),
(89, 12, 0, 21),
(90, 1, 1, 22),
(91, 2, 0, 22),
(92, 6, 0, 22),
(93, 10, 0, 22),
(94, 11, 0, 22),
(95, 12, 0, 22),
(96, 1, 0, 23),
(97, 2, 0, 23),
(98, 6, 0, 23),
(99, 10, 0, 23),
(100, 11, 0, 23),
(101, 12, 0, 23),
(102, 1, 0, 24),
(103, 2, 0, 24),
(104, 6, 0, 24),
(105, 10, 0, 24),
(106, 11, 0, 24),
(107, 12, 0, 24),
(108, 1, 0, 25),
(109, 2, 0, 25),
(110, 6, 0, 25),
(111, 10, 0, 25),
(112, 11, 0, 25),
(113, 12, 0, 25),
(114, 1, 0, 26),
(115, 2, 0, 26),
(116, 6, 0, 26),
(117, 10, 0, 26),
(118, 11, 0, 26),
(119, 12, 0, 26),
(120, 1, 1, 27),
(121, 2, 0, 27),
(122, 6, 0, 27),
(123, 10, 0, 27),
(124, 11, 0, 27),
(125, 12, 0, 27),
(126, 1, 1, 28),
(127, 2, 0, 28),
(128, 6, 0, 28),
(129, 10, 0, 28),
(130, 11, 0, 28),
(131, 12, 0, 28),
(132, 1, 1, 29),
(133, 2, 0, 29),
(134, 6, 0, 29),
(135, 10, 0, 29),
(136, 11, 0, 29),
(137, 12, 0, 29),
(138, 1, 0, 30),
(139, 2, 0, 30),
(140, 6, 1, 30),
(141, 10, 0, 30),
(142, 11, 0, 30),
(143, 12, 0, 30),
(144, 1, 0, 31),
(145, 2, 0, 31),
(146, 6, 1, 31),
(147, 10, 0, 31),
(148, 11, 0, 31),
(149, 12, 0, 31),
(150, 1, 0, 32),
(151, 2, 0, 32),
(152, 6, 1, 32),
(153, 10, 0, 32),
(154, 11, 0, 32),
(155, 12, 0, 32),
(156, 1, 0, 33),
(157, 2, 0, 33),
(158, 6, 1, 33),
(159, 10, 0, 33),
(160, 11, 0, 33),
(161, 12, 0, 33),
(162, 1, 0, 34),
(163, 2, 0, 34),
(164, 6, 1, 34),
(165, 10, 0, 34),
(166, 11, 0, 34),
(167, 12, 0, 34);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_situacao`
--

CREATE TABLE `user_situacao` (
  `id` int(11) NOT NULL,
  `situacao` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user_situacao`
--

INSERT INTO `user_situacao` (`id`, `situacao`) VALUES
(1, 'Ativo'),
(2, 'Inativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_situacao_permission`
--

CREATE TABLE `user_situacao_permission` (
  `id` int(11) NOT NULL,
  `permissao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user_situacao_permission`
--

INSERT INTO `user_situacao_permission` (`id`, `permissao`) VALUES
(0, 'Bloqueado'),
(1, 'Liberado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_tipo`
--

CREATE TABLE `user_tipo` (
  `id` int(11) NOT NULL,
  `tipo` varchar(220) NOT NULL,
  `ordem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user_tipo`
--

INSERT INTO `user_tipo` (`id`, `tipo`, `ordem`) VALUES
(1, 'Super Administrador', 1),
(2, 'Pregoeiro', 5),
(6, 'Administrador', 2),
(10, 'EstÃ¡giario', 6),
(11, 'Financeiro', 4),
(12, 'Publicador', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `editais`
--
ALTER TABLE `editais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo` (`id_tipo`),
  ADD KEY `situacao` (`id_situacao`);

--
-- Indexes for table `edital_analise_recursos`
--
ALTER TABLE `edital_analise_recursos`
  ADD PRIMARY KEY (`id_analise_recurso`),
  ADD KEY `id_edital` (`id_edital`);

--
-- Indexes for table `edital_anos`
--
ALTER TABLE `edital_anos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edital_arps`
--
ALTER TABLE `edital_arps`
  ADD PRIMARY KEY (`id_arp`),
  ADD KEY `id_edital` (`id_edital`);

--
-- Indexes for table `edital_documentos`
--
ALTER TABLE `edital_documentos`
  ADD PRIMARY KEY (`id_documento`),
  ADD KEY `id_edital` (`id_edital`);

--
-- Indexes for table `edital_extratos`
--
ALTER TABLE `edital_extratos`
  ADD PRIMARY KEY (`id_extrato`),
  ADD KEY `id_edital` (`id_edital`);

--
-- Indexes for table `edital_recursos`
--
ALTER TABLE `edital_recursos`
  ADD PRIMARY KEY (`id_recurso`),
  ADD KEY `id_edital` (`id_edital`);

--
-- Indexes for table `edital_situacao`
--
ALTER TABLE `edital_situacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edital_tipo`
--
ALTER TABLE `edital_tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_tipo` (`id_tipo`),
  ADD KEY `id_situacao` (`id_situacao`);

--
-- Indexes for table `user_permision`
--
ALTER TABLE `user_permision`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_tipo` (`id_user_tipo`),
  ADD KEY `id_situacao_permission` (`id_situacao_permission`),
  ADD KEY `id_page` (`id_page`);

--
-- Indexes for table `user_situacao`
--
ALTER TABLE `user_situacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_situacao_permission`
--
ALTER TABLE `user_situacao_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tipo`
--
ALTER TABLE `user_tipo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `editais`
--
ALTER TABLE `editais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `edital_analise_recursos`
--
ALTER TABLE `edital_analise_recursos`
  MODIFY `id_analise_recurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `edital_anos`
--
ALTER TABLE `edital_anos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `edital_arps`
--
ALTER TABLE `edital_arps`
  MODIFY `id_arp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `edital_documentos`
--
ALTER TABLE `edital_documentos`
  MODIFY `id_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `edital_extratos`
--
ALTER TABLE `edital_extratos`
  MODIFY `id_extrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `edital_recursos`
--
ALTER TABLE `edital_recursos`
  MODIFY `id_recurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `edital_situacao`
--
ALTER TABLE `edital_situacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `edital_tipo`
--
ALTER TABLE `edital_tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user_permision`
--
ALTER TABLE `user_permision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;
--
-- AUTO_INCREMENT for table `user_situacao`
--
ALTER TABLE `user_situacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_situacao_permission`
--
ALTER TABLE `user_situacao_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_tipo`
--
ALTER TABLE `user_tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `editais`
--
ALTER TABLE `editais`
  ADD CONSTRAINT `situacao-edital` FOREIGN KEY (`id_situacao`) REFERENCES `edital_situacao` (`id`),
  ADD CONSTRAINT `tipo-edital` FOREIGN KEY (`id_tipo`) REFERENCES `edital_tipo` (`id`);

--
-- Limitadores para a tabela `edital_analise_recursos`
--
ALTER TABLE `edital_analise_recursos`
  ADD CONSTRAINT `edital-analise-recursos` FOREIGN KEY (`id_edital`) REFERENCES `editais` (`id`);

--
-- Limitadores para a tabela `edital_arps`
--
ALTER TABLE `edital_arps`
  ADD CONSTRAINT `arp-edital` FOREIGN KEY (`id_edital`) REFERENCES `editais` (`id`);

--
-- Limitadores para a tabela `edital_documentos`
--
ALTER TABLE `edital_documentos`
  ADD CONSTRAINT `documentos-edital` FOREIGN KEY (`id_edital`) REFERENCES `editais` (`id`);

--
-- Limitadores para a tabela `edital_extratos`
--
ALTER TABLE `edital_extratos`
  ADD CONSTRAINT `extratos-edital` FOREIGN KEY (`id_edital`) REFERENCES `editais` (`id`);

--
-- Limitadores para a tabela `edital_recursos`
--
ALTER TABLE `edital_recursos`
  ADD CONSTRAINT `recursos-edital` FOREIGN KEY (`id_edital`) REFERENCES `editais` (`id`);

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `situacao-do-usuario` FOREIGN KEY (`id_situacao`) REFERENCES `user_situacao` (`id`),
  ADD CONSTRAINT `tipo-de-usuario` FOREIGN KEY (`id_tipo`) REFERENCES `user_tipo` (`id`);

--
-- Limitadores para a tabela `user_permision`
--
ALTER TABLE `user_permision`
  ADD CONSTRAINT `pagina-permissao` FOREIGN KEY (`id_page`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `situacao-permissao` FOREIGN KEY (`id_situacao_permission`) REFERENCES `user_situacao_permission` (`id`),
  ADD CONSTRAINT `tipo-usuario` FOREIGN KEY (`id_user_tipo`) REFERENCES `user_tipo` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
