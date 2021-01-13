-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 13-Jan-2021 às 17:10
-- Versão do servidor: 8.0.22-0ubuntu0.20.04.2
-- versão do PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ordem`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `categoria_id` int NOT NULL,
  `categoria_nome` varchar(45) NOT NULL,
  `categoria_ativa` tinyint(1) DEFAULT NULL,
  `categoria_data_alteracao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `categoria_nome`, `categoria_ativa`) VALUES
(1, 'xxxxGames 1ssss', 2),
(2, 'Eletronico', 1),
(4, 'PHP', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `cliente_id` int NOT NULL,
  `cliente_data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `cliente_tipo` tinyint(1) DEFAULT NULL,
  `cliente_nome` varchar(45) NOT NULL,
  `cliente_sobrenome` varchar(150) NOT NULL,
  `cliente_data_nascimento` date NOT NULL,
  `cliente_cpf_cnpj` varchar(20) NOT NULL,
  `cliente_rg_ie` varchar(20) NOT NULL,
  `cliente_email` varchar(50) NOT NULL,
  `cliente_telefone` varchar(20) NOT NULL,
  `cliente_celular` varchar(20) NOT NULL,
  `cliente_cep` varchar(10) NOT NULL,
  `cliente_endereco` varchar(155) NOT NULL,
  `cliente_numero_endereco` varchar(20) NOT NULL,
  `cliente_bairro` varchar(45) NOT NULL,
  `cliente_complemento` varchar(145) NOT NULL,
  `cliente_cidade` varchar(105) NOT NULL,
  `cliente_estado` varchar(2) NOT NULL,
  `cliente_ativo` tinyint(1) NOT NULL,
  `cliente_obs` tinytext,
  `cliente_data_alteracao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`cliente_id`, `cliente_data_cadastro`, `cliente_tipo`, `cliente_nome`, `cliente_sobrenome`, `cliente_data_nascimento`, `cliente_cpf_cnpj`, `cliente_rg_ie`, `cliente_email`, `cliente_telefone`, `cliente_celular`, `cliente_cep`, `cliente_endereco`, `cliente_numero_endereco`, `cliente_bairro`, `cliente_complemento`, `cliente_cidade`, `cliente_estado`, `cliente_ativo`, `cliente_obs`) VALUES
(1, '2020-12-24 08:45:37', 2, 'Helionay alencar rodriguesssss', 'sampaio2222', '2020-05-27', '24.511.202/0001-64', '(25) 5555-555', 'ate@gmail.com', '(55) 4554-9888', '(55) 4554-5545', '65900-963', 'teste clinte', '14', 'bom jesue', 'perto da esquina', 'imperatriz', 'MA', 1, 'teste2'),
(2, '2020-12-27 02:46:10', 1, 'aqui teste', 'trouxa', '2020-12-26', '620.700.963-00', '25255', 'ver@gmail.com', '(65) 7999-9000', '(99) 9999-9999', '65900-0', 'teste225', '45', 'bom', 'teste', 'imperatriz', 'MA', 1, 'teste mais uma vez'),
(3, '2020-12-27 10:19:20', NULL, 'Raimundo nonato', 'sampaio', '2020-12-27', '13.778.444/0001-03', '1111', 'tecnico@gmail.com', '(63) 7999-9000', '(77) 7777-7777', '65900-020', 'Rua teste', '45', 'Bom jesus', 'sssss', 'imperatriz', 'MA', 1, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_pagar`
--

CREATE TABLE `contas_pagar` (
  `conta_pagar_id` int NOT NULL,
  `conta_pagar_fornecedor_id` int DEFAULT NULL,
  `conta_pagar_data_vencimento` date DEFAULT NULL,
  `conta_pagar_data_pagamento` datetime DEFAULT NULL,
  `conta_pagar_valor` varchar(15) DEFAULT NULL,
  `conta_pagar_status` tinyint(1) DEFAULT NULL,
  `conta_pagar_obs` tinytext,
  `conta_pagar_data_alteracao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='		';

--
-- Extraindo dados da tabela `contas_pagar`
--

INSERT INTO `contas_pagar` (`conta_pagar_id`, `conta_pagar_fornecedor_id`, `conta_pagar_data_vencimento`, `conta_pagar_data_pagamento`, `conta_pagar_valor`, `conta_pagar_status`, `conta_pagar_obs`) VALUES
(1, 1, '2021-01-01', '2020-12-31 18:46:59', '900.00', 1, 'versssss'),
(3, 4, '2021-01-02', NULL, '1,000.00', 2, 'teste de exlusão'),
(4, 4, '2021-01-09', NULL, '800.00', 2, 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_receber`
--

CREATE TABLE `contas_receber` (
  `conta_receber_id` int NOT NULL,
  `conta_receber_cliente_id` int NOT NULL,
  `conta_receber_data_vencimento` date DEFAULT NULL,
  `conta_receber_data_pagamento` datetime DEFAULT NULL,
  `conta_receber_valor` varchar(20) DEFAULT NULL,
  `conta_receber_status` tinyint(1) DEFAULT NULL,
  `conta_receber_obs` tinytext,
  `conta_receber_data_alteracao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contas_receber`
--

INSERT INTO `contas_receber` (`conta_receber_id`, `conta_receber_cliente_id`, `conta_receber_data_vencimento`, `conta_receber_data_pagamento`, `conta_receber_valor`, `conta_receber_status`, `conta_receber_obs`) VALUES
(1, 1, '2021-01-01', '2020-02-28 17:48:21', '150,226.22', 1, 'tresssssop'),
(2, 2, '2020-02-21', '2020-02-28 18:33:19', '350.00', 1, NULL),
(3, 3, '2020-02-28', '2020-02-28 17:22:47', '56.00', 2, NULL),
(4, 1, '2021-01-01', NULL, '800.00', 2, 'teste'),
(5, 1, '2021-01-09', NULL, '80,000.00', 1, 'teste de novo'),
(6, 2, '2021-01-09', NULL, '620.00', 2, 'ola povo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `formas_pagamentos`
--

CREATE TABLE `formas_pagamentos` (
  `forma_pagamento_id` int NOT NULL,
  `forma_pagamento_nome` varchar(45) DEFAULT NULL,
  `forma_pagamento_aceita_parc` tinyint(1) DEFAULT NULL,
  `forma_pagamento_ativa` tinyint(1) DEFAULT NULL,
  `forma_pagamento_data_alteracao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `formas_pagamentos`
--

INSERT INTO `formas_pagamentos` (`forma_pagamento_id`, `forma_pagamento_nome`, `forma_pagamento_aceita_parc`, `forma_pagamento_ativa`) VALUES
(1, 'Cartão de crédito', 2, 1),
(2, 'Dinheiro', 1, 1),
(3, 'Boleto bancário', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `fornecedor_id` int NOT NULL,
  `fornecedor_data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fornecedor_razao` varchar(200) DEFAULT NULL,
  `fornecedor_nome_fantasia` varchar(145) DEFAULT NULL,
  `fornecedor_cnpj` varchar(20) DEFAULT NULL,
  `fornecedor_ie` varchar(20) DEFAULT NULL,
  `fornecedor_telefone` varchar(20) DEFAULT NULL,
  `fornecedor_celular` varchar(20) DEFAULT NULL,
  `fornecedor_email` varchar(100) DEFAULT NULL,
  `fornecedor_contato` varchar(45) DEFAULT NULL,
  `fornecedor_cep` varchar(10) DEFAULT NULL,
  `fornecedor_endereco` varchar(145) DEFAULT NULL,
  `fornecedor_numero_endereco` varchar(20) DEFAULT NULL,
  `fornecedor_bairro` varchar(45) DEFAULT NULL,
  `fornecedor_complemento` varchar(45) DEFAULT NULL,
  `fornecedor_cidade` varchar(45) DEFAULT NULL,
  `fornecedor_estado` varchar(2) DEFAULT NULL,
  `fornecedor_ativo` tinyint(1) DEFAULT NULL,
  `fornecedor_obs` tinytext,
  `fornecedor_data_alteracao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`fornecedor_id`, `fornecedor_data_cadastro`, `fornecedor_razao`, `fornecedor_nome_fantasia`, `fornecedor_cnpj`, `fornecedor_ie`, `fornecedor_telefone`, `fornecedor_celular`, `fornecedor_email`, `fornecedor_contato`, `fornecedor_cep`, `fornecedor_endereco`, `fornecedor_numero_endereco`, `fornecedor_bairro`, `fornecedor_complemento`, `fornecedor_cidade`, `fornecedor_estado`, `fornecedor_ativo`, `fornecedor_obs`) VALUES
(1, '2020-12-27 20:30:59', 'ANome do fornecedores', 'Nome Ado fornecedoraa vendas limitadas', '09.134.030/0001-62', '2558888888', '(55) 5555-5555', '(85) 2222-2225', 'fone@gmail.com', '', '65900-020', 'rua são josea', '45', 'bom jesus', 'perto de nada', 'imperatriz', 'MA', 1, 'Utilize nosso gerador de CNPJ, basta clicar em &quot;Gerar CNPJ&quot; e pronto! Um novo número de CNPJ válido será gerado. Você ainda tem opção de colocar ou não os &quot;pontos&quot; entre os números.'),
(4, '2020-12-31 23:27:47', 'teste', 'Limitadas', '94.136.932/0001-00', '25588888885', '(33) 3333-3333', '(99) 9999-9999', 'fone@gmail.com', '(25) 2222-2222', '65900-0', 'rua são josea', '25', 'bom jesue', 'perto de nada', 'imperatriz', 'MA', 1, 'teste fornecedor'),
(5, '2020-12-31 23:30:31', 'Nome do fornecedorsss', 'Nome do fornecedoraa vendas limitadasaa', '50.311.369/0001-93', '6556', '(55) 5555-6666', '(99) 5555-5555', 'amem@gmail.com', '(25) 2222-2222', '58588-85', 'rua teste', '25', 'bom jesue', 'perto de nada', 'imperatriz', 'MA', 1, 'aaaaaaaaaaa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

CREATE TABLE `groups` (
  `id` mediumint UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'vendedor', 'Vendedor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(9, '127.0.0.1', 'ad@admin.com', 1610536699);

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcas`
--

CREATE TABLE `marcas` (
  `marca_id` int NOT NULL,
  `marca_nome` varchar(45) NOT NULL,
  `marca_ativa` tinyint(1) DEFAULT NULL,
  `marca_data_alteracao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `marcas`
--

INSERT INTO `marcas` (`marca_id`, `marca_nome`, `marca_ativa`, `marca_data_alteracao`) VALUES
(1, 'LG', 1, '2020-12-31 09:29:47'),
(2, 'HP', 1, '2020-12-31 10:02:58'),
(3, 'CCE', 1, '2020-12-31 10:03:03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordem_tem_servicos`
--

CREATE TABLE `ordem_tem_servicos` (
  `ordem_ts_id` int NOT NULL,
  `ordem_ts_id_servico` int DEFAULT NULL,
  `ordem_ts_id_ordem_servico` int DEFAULT NULL,
  `ordem_ts_quantidade` int DEFAULT NULL,
  `ordem_ts_valor_unitario` varchar(45) DEFAULT NULL,
  `ordem_ts_valor_desconto` varchar(45) DEFAULT NULL,
  `ordem_ts_valor_total` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela de relacionamento entre as tabelas servicos e ordem_servico';

--
-- Extraindo dados da tabela `ordem_tem_servicos`
--

INSERT INTO `ordem_tem_servicos` (`ordem_ts_id`, `ordem_ts_id_servico`, `ordem_ts_id_ordem_servico`, `ordem_ts_quantidade`, `ordem_ts_valor_unitario`, `ordem_ts_valor_desconto`, `ordem_ts_valor_total`) VALUES
(25, 3, 2, 0, NULL, '0 ', ' 0.00'),
(26, 2, 2, 80, NULL, '0 ', ' 160.00'),
(29, 1, 1, 50, NULL, '0 ', ' 100.00'),
(31, 2, 11, 80, NULL, '0 ', ' 320.00'),
(32, 3, 11, 800, NULL, '0 ', ' 1600.00'),
(39, 5, 3, 280, NULL, '0 ', ' 560.00'),
(42, 1, 12, 0, NULL, '0 ', ' 0.00'),
(43, 2, 12, 0, NULL, '0 ', ' 0.00'),
(44, 3, 12, 800, NULL, '50 ', ' 1200.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordens_servicos`
--

CREATE TABLE `ordens_servicos` (
  `ordem_servico_id` int NOT NULL,
  `ordem_servico_forma_pagamento_id` int DEFAULT NULL,
  `ordem_servico_cliente_id` int DEFAULT NULL,
  `ordem_servico_data_emissao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ordem_servico_data_conclusao` varchar(100) DEFAULT NULL,
  `ordem_servico_equipamento` varchar(80) DEFAULT NULL,
  `ordem_servico_marca_equipamento` varchar(80) DEFAULT NULL,
  `ordem_servico_modelo_equipamento` varchar(80) DEFAULT NULL,
  `ordem_servico_acessorios` tinytext,
  `ordem_servico_defeito` tinytext,
  `ordem_servico_valor_desconto` varchar(25) DEFAULT NULL,
  `ordem_servico_valor_total` varchar(25) DEFAULT NULL,
  `ordem_servico_status` tinyint(1) DEFAULT NULL,
  `ordem_servico_obs` tinytext,
  `ordem_servico_data_alteracao` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ordens_servicos`
--

INSERT INTO `ordens_servicos` (`ordem_servico_id`, `ordem_servico_forma_pagamento_id`, `ordem_servico_cliente_id`, `ordem_servico_data_emissao`, `ordem_servico_data_conclusao`, `ordem_servico_equipamento`, `ordem_servico_marca_equipamento`, `ordem_servico_modelo_equipamento`, `ordem_servico_acessorios`, `ordem_servico_defeito`, `ordem_servico_valor_desconto`, `ordem_servico_valor_total`, `ordem_servico_status`, `ordem_servico_obs`, `ordem_servico_data_alteracao`) VALUES
(1, 2, 1, '2020-02-14 20:30:35', NULL, 'Fone de ouvido', 'Awell', 'AV1801', 'Mouse e carregador', 'Não sai aúdio no lado esquerdo', 'R$ 0.00', '100.00', 1, 'teste', '2021-01-13 12:12:15'),
(2, 1, 2, '2020-02-14 20:48:53', NULL, 'Notebook gamer', 'Awell', 'FONE01', 'Mouse e carregador', 'Não carrega', 'R$ 0.00', '160.00', 0, 'ops', '2021-01-12 23:04:56'),
(3, 2, 3, '2020-02-17 23:53:26', NULL, 'Notebook Sony', 'Sony', 'FONE01', 'Mouse e carregador', 'Tela trincada', 'R$ 0.00', '560.00', 1, 'Vem buscar pela manhã', '2021-01-13 15:51:43'),
(11, 2, 3, '2021-01-13 13:55:54', NULL, 'Titan', 'honda', '2020', 'chave da moto,capacete', 'Motor batido', 'R$ 0.00', '1,920.00', 1, 'a moto veio com problema e não liga ', '2021-01-13 15:17:23'),
(12, NULL, 3, '2021-01-13 17:50:27', NULL, 'Smat TV', 'Panasonic', 'modelo 01', 'controle de tv', 'Na tela', 'R$ 1,200.00', '1,200.00', 0, 'opp de problemas ', '2021-01-13 17:57:32');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `produto_id` int NOT NULL,
  `produto_codigo` varchar(45) DEFAULT NULL,
  `produto_data_cadastro` datetime DEFAULT NULL,
  `produto_categoria_id` int NOT NULL,
  `produto_marca_id` int NOT NULL,
  `produto_fornecedor_id` int NOT NULL,
  `produto_descricao` varchar(145) DEFAULT NULL,
  `produto_unidade` varchar(25) DEFAULT NULL,
  `produto_codigo_barras` varchar(45) DEFAULT NULL,
  `produto_ncm` varchar(15) DEFAULT NULL,
  `produto_preco_custo` varchar(45) DEFAULT NULL,
  `produto_preco_venda` varchar(45) DEFAULT NULL,
  `produto_estoque_minimo` varchar(10) DEFAULT NULL,
  `produto_qtde_estoque` varchar(10) DEFAULT NULL,
  `produto_ativo` tinyint(1) DEFAULT NULL,
  `produto_obs` tinytext,
  `produto_data_alteracao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`produto_id`, `produto_codigo`, `produto_data_cadastro`, `produto_categoria_id`, `produto_marca_id`, `produto_fornecedor_id`, `produto_descricao`, `produto_unidade`, `produto_codigo_barras`, `produto_ncm`, `produto_preco_custo`, `produto_preco_venda`, `produto_estoque_minimo`, `produto_qtde_estoque`, `produto_ativo`, `produto_obs`, `produto_data_alteracao`) VALUES
(1, '72495380', NULL, 2, 1, 1, 'auditado com sucesso.', 'UN', '4545', '', '7,99', '8,99', '2', '63', 1, NULL, '2021-01-09 08:19:40'),
(2, '50412637', NULL, 2, 1, 1, 'Fone de ouvido gamer', 'UN', '9999', NULL, '112,00', '125.844,00', '1', '46', 1, '', '2020-12-31 10:06:09'),
(3, '41697502', NULL, 2, 1, 1, 'Mouse usb', 'UN', '9999', '', '10', '15,22', '2', '18', 1, NULL, '2021-01-09 08:19:53');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `servico_id` int NOT NULL,
  `servico_nome` varchar(145) DEFAULT NULL,
  `servico_preco` varchar(15) DEFAULT NULL,
  `servico_descricao` tinytext,
  `servico_ativo` tinyint(1) DEFAULT NULL,
  `servico_data_alteracao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`servico_id`, `servico_nome`, `servico_preco`, `servico_descricao`, `servico_ativo`) VALUES
(1, 'Limpeza geral aqui atualizada', '50,00', 'Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem', 1),
(2, 'Solda elétrica', '80,00', 'Solda elétrica', 1),
(3, 'Restauração de componentes teste de novo', '800,00', 'Restauração de componentes esse teste', 1),
(5, 'teste de novo', '280,00', 'teste de novo', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sistema`
--

CREATE TABLE `sistema` (
  `sistema_id` int NOT NULL,
  `sistema_razao_social` varchar(145) DEFAULT NULL,
  `sistema_nome_fantasia` varchar(145) DEFAULT NULL,
  `sistema_cnpj` varchar(25) DEFAULT NULL,
  `sistema_ie` varchar(25) DEFAULT NULL,
  `sistema_telefone_fixo` varchar(25) DEFAULT NULL,
  `sistema_telefone_movel` varchar(25) NOT NULL,
  `sistema_email` varchar(100) DEFAULT NULL,
  `sistema_site_url` varchar(100) DEFAULT NULL,
  `sistema_cep` varchar(25) DEFAULT NULL,
  `sistema_endereco` varchar(145) DEFAULT NULL,
  `sistema_numero` varchar(25) DEFAULT NULL,
  `sistema_cidade` varchar(45) DEFAULT NULL,
  `sistema_estado` varchar(2) DEFAULT NULL,
  `sistema_txt_ordem_servico` tinytext,
  `sistema_data_alteracao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sistema`
--

INSERT INTO `sistema` (`sistema_id`, `sistema_razao_social`, `sistema_nome_fantasia`, `sistema_cnpj`, `sistema_ie`, `sistema_telefone_fixo`, `sistema_telefone_movel`, `sistema_email`, `sistema_site_url`, `sistema_cep`, `sistema_endereco`, `sistema_numero`, `sistema_cidade`, `sistema_estado`, `sistema_txt_ordem_servico`) VALUES
(1, 'razaão socila5000', 'Sampaio Compensados', '11.111.111/1111-11', '55855555', '(89) 8999-8989', '(55) 4554-5545', 'sistema@sistema.com', 'wwww.teste3', '65900-963', 'voltando para teste', '45', 'imperatriz', 'ma', 'Voltando para rotina \r\n    &amp;lt;button class=&quot;btn btn-outline-secondary&quot; type=&quot;button&quot;&amp;gt;Button&amp;lt;/button&amp;gt;\r\n  &lt;/div&gt;\r\n&lt;/div&gt;');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int UNSIGNED NOT NULL,
  `last_login` int UNSIGNED DEFAULT NULL,
  `active` tinyint UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$gUyg8hPQbEL.F6mvYgEd3OXsFBlfrwT3nto.oijjLydWE4Y9GzXXa', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1610536704, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `group_id` mediumint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(27, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedores`
--

CREATE TABLE `vendedores` (
  `vendedor_id` int NOT NULL,
  `vendedor_codigo` varchar(10) NOT NULL,
  `vendedor_data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `vendedor_nome_completo` varchar(145) NOT NULL,
  `vendedor_cpf` varchar(25) NOT NULL,
  `vendedor_rg` varchar(25) NOT NULL,
  `vendedor_telefone` varchar(15) DEFAULT NULL,
  `vendedor_celular` varchar(15) DEFAULT NULL,
  `vendedor_email` varchar(45) DEFAULT NULL,
  `vendedor_cep` varchar(15) DEFAULT NULL,
  `vendedor_endereco` varchar(45) DEFAULT NULL,
  `vendedor_numero_endereco` varchar(25) DEFAULT NULL,
  `vendedor_complemento` varchar(45) DEFAULT NULL,
  `vendedor_bairro` varchar(45) DEFAULT NULL,
  `vendedor_cidade` varchar(45) DEFAULT NULL,
  `vendedor_estado` varchar(2) DEFAULT NULL,
  `vendedor_ativo` tinyint(1) DEFAULT NULL,
  `vendedor_obs` tinytext,
  `vendedor_data_alteracao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendedores`
--

INSERT INTO `vendedores` (`vendedor_id`, `vendedor_codigo`, `vendedor_data_cadastro`, `vendedor_nome_completo`, `vendedor_cpf`, `vendedor_rg`, `vendedor_telefone`, `vendedor_celular`, `vendedor_email`, `vendedor_cep`, `vendedor_endereco`, `vendedor_numero_endereco`, `vendedor_complemento`, `vendedor_bairro`, `vendedor_cidade`, `vendedor_estado`, `vendedor_ativo`, `vendedor_obs`) VALUES
(1, '09842571', '2020-01-28 04:24:17', 'Lucio Antonio de Souza', '946.873.070-00', '36.803.319-3', '', '(41) 99999-9999', 'vendedor@gmail.com', '80530-000', 'Rua das vendas', '45', '', 'Centro', 'Curitiba', 'PR', 1, 'teste1'),
(2, '03841956', '2020-01-30 01:22:27', 'Sara Betina mota', '582.071.790-23', '252/8742-98', '(99) 9999-2554', '(41) 8888-4444', 'sara@gmail.com', '80540-120', 'Rua das vendas', '45', '', 'Centro', 'aqui', 'MA', 2, 'Teste de ediçãossssss'),
(11, '18492735', '2020-12-28 20:23:47', 'Raimundo nonato sampaio', '620.700.963-00', '255555', '(17) 9999-9999', '(85) 8888-8888', 'alefesampaios@gmail.com', '65922-002', 'teste2', '515', 'perto', 'bom jesus', 'imperatriz', 'MA', 1, 'wwwwwww');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Índices para tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  ADD PRIMARY KEY (`conta_pagar_id`),
  ADD KEY `fk_conta_pagar_id_fornecedor` (`conta_pagar_fornecedor_id`);

--
-- Índices para tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  ADD PRIMARY KEY (`conta_receber_id`),
  ADD KEY `fk_conta_receber_id_cliente` (`conta_receber_cliente_id`);

--
-- Índices para tabela `formas_pagamentos`
--
ALTER TABLE `formas_pagamentos`
  ADD PRIMARY KEY (`forma_pagamento_id`);

--
-- Índices para tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`fornecedor_id`);

--
-- Índices para tabela `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`marca_id`);

--
-- Índices para tabela `ordem_tem_servicos`
--
ALTER TABLE `ordem_tem_servicos`
  ADD PRIMARY KEY (`ordem_ts_id`),
  ADD KEY `fk_ordem_ts_id_servico` (`ordem_ts_id_servico`),
  ADD KEY `fk_ordem_ts_id_ordem_servico` (`ordem_ts_id_ordem_servico`);

--
-- Índices para tabela `ordens_servicos`
--
ALTER TABLE `ordens_servicos`
  ADD PRIMARY KEY (`ordem_servico_id`),
  ADD KEY `fk_ordem_servico_id_cliente` (`ordem_servico_cliente_id`),
  ADD KEY `fk_ordem_servico_id_forma_pagto` (`ordem_servico_forma_pagamento_id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`produto_id`),
  ADD KEY `produto_categoria_id` (`produto_categoria_id`,`produto_marca_id`,`produto_fornecedor_id`),
  ADD KEY `fk_produto_marca_id` (`produto_marca_id`),
  ADD KEY `fk_produto_forncedor_id` (`produto_fornecedor_id`);

--
-- Índices para tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`servico_id`);

--
-- Índices para tabela `sistema`
--
ALTER TABLE `sistema`
  ADD PRIMARY KEY (`sistema_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Índices para tabela `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Índices para tabela `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`vendedor_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoria_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cliente_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  MODIFY `conta_pagar_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  MODIFY `conta_receber_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `formas_pagamentos`
--
ALTER TABLE `formas_pagamentos`
  MODIFY `forma_pagamento_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `fornecedor_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `marcas`
--
ALTER TABLE `marcas`
  MODIFY `marca_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `ordem_tem_servicos`
--
ALTER TABLE `ordem_tem_servicos`
  MODIFY `ordem_ts_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `ordens_servicos`
--
ALTER TABLE `ordens_servicos`
  MODIFY `ordem_servico_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `produto_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `servico_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `sistema`
--
ALTER TABLE `sistema`
  MODIFY `sistema_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `vendedor_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  ADD CONSTRAINT `fk_conta_pagar_id_fornecedor` FOREIGN KEY (`conta_pagar_fornecedor_id`) REFERENCES `fornecedores` (`fornecedor_id`);

--
-- Limitadores para a tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  ADD CONSTRAINT `fk_conta_receber_id_cliente` FOREIGN KEY (`conta_receber_cliente_id`) REFERENCES `clientes` (`cliente_id`);

--
-- Limitadores para a tabela `ordem_tem_servicos`
--
ALTER TABLE `ordem_tem_servicos`
  ADD CONSTRAINT `fk_ordem_ts_id_ordem_servico` FOREIGN KEY (`ordem_ts_id_ordem_servico`) REFERENCES `ordens_servicos` (`ordem_servico_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_ordem_ts_id_servico` FOREIGN KEY (`ordem_ts_id_servico`) REFERENCES `servicos` (`servico_id`);

--
-- Limitadores para a tabela `ordens_servicos`
--
ALTER TABLE `ordens_servicos`
  ADD CONSTRAINT `fk_ordem_servico_id_cliente` FOREIGN KEY (`ordem_servico_cliente_id`) REFERENCES `clientes` (`cliente_id`),
  ADD CONSTRAINT `fk_ordem_servico_id_forma_pagto` FOREIGN KEY (`ordem_servico_forma_pagamento_id`) REFERENCES `formas_pagamentos` (`forma_pagamento_id`);

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_produto_cat_id` FOREIGN KEY (`produto_categoria_id`) REFERENCES `categorias` (`categoria_id`),
  ADD CONSTRAINT `fk_produto_forncedor_id` FOREIGN KEY (`produto_fornecedor_id`) REFERENCES `fornecedores` (`fornecedor_id`),
  ADD CONSTRAINT `fk_produto_marca_id` FOREIGN KEY (`produto_marca_id`) REFERENCES `marcas` (`marca_id`);

--
-- Limitadores para a tabela `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
