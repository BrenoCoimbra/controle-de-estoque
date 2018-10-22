-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Out-2018 às 00:15
-- Versão do servidor: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestao_estoque`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1536061846),
('admin', '5', 1537061020),
('admin', '6', 1537234545),
('usuario', '2', 1536072524),
('usuario', '3', 1536844677),
('usuario', '4', 1536844886);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1536061833, 1536061833),
('cliente/create', 2, NULL, NULL, NULL, 1536071327, 1536071327),
('cliente/delete', 2, NULL, NULL, NULL, 1536071436, 1536071436),
('cliente/update', 2, NULL, NULL, NULL, 1536071431, 1536071431),
('cliente/view', 2, NULL, NULL, NULL, 1536071445, 1536071445),
('fornecedor/create', 2, NULL, NULL, NULL, 1536071685, 1536071685),
('fornecedor/delete', 2, NULL, NULL, NULL, 1536071691, 1536071691),
('fornecedor/update', 2, NULL, NULL, NULL, 1536071688, 1536071688),
('fornecedor/view', 2, NULL, NULL, NULL, 1536071694, 1536071694),
('perfil/cadastrar', 2, NULL, NULL, NULL, 1536061961, 1536061961),
('perfil/cadastrar-regra', 2, NULL, NULL, NULL, 1536061974, 1536061974),
('permissao/cadastrar', 2, NULL, NULL, NULL, 1536061988, 1536061988),
('produto/adicionar', 2, NULL, NULL, NULL, 1536072460, 1536072460),
('produto/create', 2, NULL, NULL, NULL, 1536072149, 1536072149),
('produto/delete', 2, NULL, NULL, NULL, 1536072168, 1536072168),
('produto/remover', 2, NULL, NULL, NULL, 1536072466, 1536072466),
('produto/update', 2, NULL, NULL, NULL, 1536072143, 1536072143),
('produto/vender', 2, NULL, NULL, NULL, 1536072349, 1536072349),
('produto/view', 2, NULL, NULL, NULL, 1536072154, 1536072154),
('seguranca', 2, NULL, NULL, NULL, 1536072680, 1536072680),
('site', 2, NULL, NULL, NULL, 1536071169, 1536071169),
('site/cliente', 2, NULL, NULL, NULL, 1536071189, 1536071189),
('site/fornecedores', 2, NULL, NULL, NULL, 1536071183, 1536071183),
('site/produto', 2, NULL, NULL, NULL, 1536071175, 1536071175),
('site/venda', 2, NULL, NULL, NULL, 1536071193, 1536071193),
('usuario', 1, NULL, NULL, NULL, 1536072488, 1536072488),
('usuario/create', 2, NULL, NULL, NULL, 1536062052, 1536062052),
('usuario/delete', 2, NULL, NULL, NULL, 1536062054, 1536062054),
('usuario/update', 2, NULL, NULL, NULL, 1536062058, 1536062058),
('venda/delete', 2, NULL, NULL, NULL, 1536071967, 1536071967),
('venda/view', 2, NULL, NULL, NULL, 1536071984, 1536071984);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'cliente/create'),
('admin', 'cliente/delete'),
('admin', 'cliente/update'),
('admin', 'cliente/view'),
('admin', 'fornecedor/create'),
('admin', 'fornecedor/delete'),
('admin', 'fornecedor/update'),
('admin', 'fornecedor/view'),
('admin', 'perfil/cadastrar'),
('admin', 'perfil/cadastrar-regra'),
('admin', 'permissao/cadastrar'),
('admin', 'produto/adicionar'),
('admin', 'produto/create'),
('admin', 'produto/delete'),
('admin', 'produto/remover'),
('admin', 'produto/update'),
('admin', 'produto/vender'),
('admin', 'produto/view'),
('admin', 'seguranca'),
('admin', 'site'),
('admin', 'site/cliente'),
('admin', 'site/fornecedores'),
('admin', 'site/produto'),
('admin', 'site/venda'),
('admin', 'usuario/create'),
('admin', 'usuario/delete'),
('admin', 'usuario/update'),
('admin', 'venda/delete'),
('admin', 'venda/view'),
('usuario', 'cliente/create'),
('usuario', 'cliente/update'),
('usuario', 'cliente/view'),
('usuario', 'fornecedor/view'),
('usuario', 'produto/view'),
('usuario', 'venda/view');

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(17) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cnpj` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1536061126),
('m140506_102106_rbac_init', 1536061753),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1536061754),
('m180904_111405_create_produto_table', 1536061152),
('m180904_111428_create_cliente_table', 1536061173),
('m180904_111448_create_fornecedor_table', 1536061127),
('m180904_114550_create_usuario_table', 1536061665);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantidade` int(11) NOT NULL,
  `data_chegada` date NOT NULL,
  `valor_un` decimal(10,2) NOT NULL,
  `valor_tot` decimal(10,2) NOT NULL,
  `updated_at` datetime NOT NULL,
  `fornecedor_id` int(11) NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `dt_cadastro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `usuario`, `senha`, `auth_key`, `status`, `dt_cadastro`) VALUES
(1, 'Breno Coimbra', 'admin', '$2y$13$VN1mCbWJlBPz.4yyQ9FdLezgTNOQiUHC3.O9/8BIyizeGV/VY4JBq', 'KImlyx_T7BC0YnA4ZWxxWADsc5t1AM5WNMKJI6GsQWzqA2saWPp-l7RShmURcKij', 1, '2018-09-17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `id` int(11) NOT NULL,
  `data_venda` date NOT NULL,
  `qtnd_vendida` int(11) NOT NULL,
  `valor_final` decimal(10,2) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `auth_assignment_user_id_idx` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `endereco` (`endereco`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produto_id` (`fornecedor_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cliente_id` (`cliente_id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_produto_id` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedor` (`id`);

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `fk_cliente_id` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
