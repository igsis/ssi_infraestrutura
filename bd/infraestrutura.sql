-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Jun-2018 às 20:21
-- Versão do servidor: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infraestrutura`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrators`
--

CREATE TABLE `administrators` (
  `id` int(11) NOT NULL,
  `login` varchar(10) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `local` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `administrators`
--

INSERT INTO `administrators` (`id`, `login`, `password`, `local`, `phone`, `email`, `dateCreated`) VALUES
(1, 'admin', 'cf6b9ac0c80a6a14852d7a43773a3e9b', 'Administrador SMC', '(11) 3397-0146', 'stidesenvolvimento@prefeitura.sp.gov.br', '2018-06-21 20:37:14'),
(2, 'admin123', '', 'desenvolvimento', '(11) 3397-0146', 'stidesenvolvimento@prefeitura.sp.gov.br', '2018-06-21 23:38:50'),
(3, '', 'd41d8cd98f00b204e9800998ecf8427e', 'Teste de Adm', '11', '', '2018-06-26 12:53:23'),
(4, 'adm2', '7390ff71652df1ebac786e07abe0be0d', 'Adm de Teste', '(11) 3397-0110', 'lutchelloprodutora@gmail.com', '2018-06-26 12:56:21'),
(5, 'tcb', '7390ff71652df1ebac786e07abe0be0d', 'São Paulo', '(11) 3397-0110', 'stidesecmento@prefeitura.sp.gov.br', '2018-06-26 14:46:33'),
(6, 'lucas123', '7390ff71652df1ebac786e07abe0be0d', 'Guarulhos', '(11) 96532-5228', 'stidesenvolvrefeitura.sp.gov.br', '2018-06-26 14:48:15'),
(7, 'admin12345', '7390ff71652df1ebac786e07abe0be0d', 'São Paulop', '(11) 3397-0110', 'stidesenvolento@prefeitura.sp.gov.br', '2018-06-26 14:53:38'),
(8, 'abc', '7390ff71652df1ebac786e07abe0be0d', 'abc', '(11) 11111-1111', 'lgabriele@prefeitura.sp.gov.br', '2018-06-26 14:55:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrators_users`
--

CREATE TABLE `administrators_users` (
  `users_id` int(11) NOT NULL,
  `admininstrators_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `administrators_users`
--

INSERT INTO `administrators_users` (`users_id`, `admininstrators_id`) VALUES
(1, 1),
(4, 2),
(13, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `id` int(2) NOT NULL,
  `category` varchar(120) NOT NULL,
  `published` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `category`, `published`) VALUES
(1, 'Hidráulica', 1),
(2, 'Alvenaria', 1),
(3, 'Pintura', 1),
(4, 'Elétrica (lâmpada, tomada, etc.)', 1),
(5, 'Serralheria', 1),
(6, 'Carpintaria', 1),
(7, 'Marcenaria', 1),
(8, 'Manutenção de Equipamentos', 1),
(9, 'Telhado', 1),
(10, 'Jardinagem', 1),
(11, 'Categoria nova', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `role` varchar(45) NOT NULL,
  `published` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `employees`
--

INSERT INTO `employees` (`id`, `name`, `role`, `published`) VALUES
(1, 'João', 'Carpinteiro', 1),
(2, 'pereira', 'guarita', 1),
(3, 'teste', 'zxcxcc', 1),
(4, 'Lucas Aparecido de Jesus', 'Técnico', 1),
(5, 'Grayce de Deus', 'Funcionária', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `employees_problems`
--

CREATE TABLE `employees_problems` (
  `problems_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `toolMaterial` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `employees_problems`
--

INSERT INTO `employees_problems` (`problems_id`, `employee_id`, `toolMaterial`) VALUES
(1, 1, 'chave'),
(20, 2, 'toolMaterial'),
(20, 3, 'Teste de ferramenta'),
(20, 2, 'pá'),
(26, 1, 'cimento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `problems_id` int(11) NOT NULL,
  `administrator_id` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `note` longtext NOT NULL,
  `private` tinyint(1) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `notes`
--

INSERT INTO `notes` (`id`, `problems_id`, `administrator_id`, `users_id`, `note`, `private`, `date`) VALUES
(1, 2, NULL, 1, 'teste de nota no banco', 0, '2018-06-21 22:47:40'),
(2, 1, 1, NULL, 'jfhh', 1, '2018-06-21 23:11:11'),
(3, 2, 1, 1, 'uy', 0, '2018-06-22 15:31:38'),
(5, 1, NULL, 1, 'nota 2', 0, '2018-06-22 06:24:38'),
(7, 1, NULL, 1, 'nota de teste 3', 0, '2018-06-23 18:35:24'),
(8, 1, NULL, 1, 'nota de teste 3', 0, '2018-06-23 18:40:59'),
(9, 1, NULL, 1, 'nota de teste 3', 0, '2018-06-23 18:41:09'),
(10, 1, NULL, 1, 'nota de teste 4', 0, '2018-06-23 18:41:42'),
(11, 1, NULL, 1, 'nota de teste 4', 0, '2018-06-23 18:42:22'),
(12, 1, NULL, 1, 'nota de teste 4', 0, '2018-06-23 18:42:40'),
(13, 8, NULL, 1, 'Nota de pintura', 0, '2018-06-23 18:52:04'),
(15, 20, 1, NULL, 'dfghjk', 0, '2018-06-24 19:07:28'),
(16, 20, 1, NULL, 'dfghjk', 0, '2018-06-24 19:09:15'),
(17, 20, 1, NULL, 'abc teste', 1, '2018-06-24 19:13:06'),
(18, 26, 1, NULL, 'Nota 1', 1, '2018-06-24 20:02:54'),
(19, 26, 1, NULL, 'Nota 2', 0, '2018-06-24 20:03:04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `priorities`
--

CREATE TABLE `priorities` (
  `id` int(1) NOT NULL,
  `priority` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `priorities`
--

INSERT INTO `priorities` (`id`, `priority`) VALUES
(2, 'Alta'),
(3, 'Baixa'),
(1, 'Normal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `problems`
--

CREATE TABLE `problems` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `local` varchar(100) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `contact` varchar(20) NOT NULL,
  `priorities_id` int(1) NOT NULL,
  `categories_id` int(2) NOT NULL,
  `description` longtext NOT NULL,
  `solution` longtext,
  `startDate` datetime NOT NULL,
  `inProgress` datetime NOT NULL,
  `closedate` datetime DEFAULT NULL,
  `problem_status_id` int(1) NOT NULL,
  `administrators_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `problems`
--

INSERT INTO `problems` (`id`, `users_id`, `local`, `phone`, `email`, `contact`, `priorities_id`, `categories_id`, `description`, `solution`, `startDate`, `inProgress`, `closedate`, `problem_status_id`, `administrators_id`) VALUES
(1, 1, 'teste', '40028922', 'teste@teste.com', '99999999', 2, 8, 'teste final', 'teste s', '2018-06-21 22:24:29', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(2, 1, 'teste', '40028922', 'teste@teste.com', 'adfgh', 2, 8, 'teste final', 'teste s', '2018-06-21 22:44:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(3, 1, 'Teatro Mundo da Lua', '40028922', 'teste@teste.com', 'Lucas', 2, 8, 'teste final', 'teste s', '2018-06-21 23:26:45', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(4, 1, 'Teatro Mundo da Lua', '40028922', 'teste@teste.com', 'Lucas', 2, 8, 'teste final', 'teste s', '2018-06-22 15:20:06', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(5, 1, 'Teste', '', '', 'Patrícia', 2, 8, 'teste final', 'teste s', '2018-06-22 21:04:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(8, 1, 'Teatro Mundo da Lua', '(11) 3397-0110', 'teste@teste.com', 'Lucas', 2, 8, 'teste final', 'teste s', '2018-06-23 17:20:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(9, 1, 'Teatro Mundo da Lua', '(11) 3397-0146', 'teste@teste.com', 'Lorelei', 2, 8, 'teste final', 'teste s', '2018-06-23 19:28:34', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(10, 1, 'Teatro Mundo da Lua', '(11) 3397-0111', 'email@teste.com', 'Lore', 2, 8, 'teste final', 'teste s', '2018-06-23 19:30:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(11, 1, 'Teatro Mundo da Lua', '(11) 3397-0146', 'teste@teste.com', 'Lucas', 2, 8, 'teste final', 'teste s', '2018-06-24 11:30:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(20, 1, 'Teatro Mundo da Lua', '(11) 3397-0146', 'teste@teste.com', 'Lucas', 2, 8, 'teste final', 'teste s', '2018-06-24 13:36:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(21, 1, 'Teatro Mundo da Lua', '(11) 3397-0146', 'teste@teste.com', 'Lucas', 2, 8, 'teste final', 'teste s', '2018-06-24 13:38:05', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(23, 1, 'Teatro Mundo da Lua', '(11) 3397-0146', 'teste@teste.com', 'Lucas', 2, 8, 'teste final', 'teste s', '2018-06-24 19:47:41', '2018-06-28 12:29:21', '2018-06-28 12:30:01', 2, 1),
(24, 1, 'Teatro Mundo da Lua', '(11) 3397-0146', 'teste@teste.com', 'Lucas', 2, 8, 'teste final', 'teste s', '2018-06-24 19:56:47', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(25, 1, 'Teatro Mundo da Lua', '(11) 3397-0146', 'teste@teste.com', 'Lucas', 2, 8, 'teste final', 'teste s', '2018-06-24 19:59:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(26, 1, 'Teatro Mundo da Lua', '(11) 3397-0146', 'teste@teste.com', 'Lucas', 2, 8, 'teste final', 'teste s', '2018-06-24 20:02:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(27, 1, 'Teatro Mundo da Lua', '(11) 3397-0146', 'teste@teste.com', 'Lucas', 2, 8, 'teste final', 'teste s', '2018-06-24 20:54:05', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(28, 1, 'Teatro Mundo da Lua', '(11) 3397-0146', 'teste@teste.com', 'Lucas', 2, 8, 'teste final', 'teste s', '2018-06-24 20:59:08', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(29, 1, 'Teatro Mundo da Lua', '(11) 3397-0146', 'teste@teste.com', 'Lucas', 2, 8, 'teste final', 'teste s', '2018-06-24 21:00:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(30, 1, 'Teatro Mundo da Lua', '(11) 3397-0110', 'teste@teste.com', 'Lorelei', 3, 2, 'ffffffffffffff', 'ffff', '2018-06-28 12:48:45', '2018-06-28 12:48:45', '0000-00-00 00:00:00', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `problem_status`
--

CREATE TABLE `problem_status` (
  `id` int(1) NOT NULL,
  `status` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `problem_status`
--

INSERT INTO `problem_status` (`id`, `status`) VALUES
(1, 'Aberto'),
(3, 'Em andamento'),
(2, 'Fechado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `regions`
--

CREATE TABLE `regions` (
  `id` int(1) NOT NULL,
  `region` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `regions`
--

INSERT INTO `regions` (`id`, `region`) VALUES
(5, 'Centro'),
(3, 'Leste'),
(1, 'Norte'),
(4, 'Oeste'),
(2, 'Sul');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `local` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `idRegion` int(1) DEFAULT NULL,
  `operatingHours` varchar(100) DEFAULT NULL,
  `historicalBuilding` tinyint(1) DEFAULT NULL,
  `dateCreated` datetime NOT NULL,
  `dateLastAccess` datetime DEFAULT NULL,
  `user_status_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `local`, `phone`, `email`, `contact`, `address`, `idRegion`, `operatingHours`, `historicalBuilding`, `dateCreated`, `dateLastAccess`, `user_status_id`) VALUES
(1, 'lorelei', '957eee38b5090493f53f22f926219021', 'Teatro Mundo da Lua', '(11) 3397-0146', 'teste@teste.com', 'Lucas', 'rua abc, 123', 1, '15:00/19:00', 0, '2018-06-23 13:00:00', '2018-06-24 11:30:21', 1),
(4, 'teste2', '957eee38b5090493f53f22f926219021', 'Teatro Mundo da', '(11) 3397-0146', 'teste1@teste.com', 'Teste', 'rua abc, 123', 1, '15:00/19:00', 0, '2018-06-23 13:00:00', '2018-06-24 11:30:21', 1),
(7, 'teste2', '7390ff71652df1ebac786e07abe0be0d', 'Teste de Lorelei', '1133970110', 'stidesenvolvimento@prefeitura.sp.gov.br', 'Lore', 'Avenida São João, 473', 4, 'De segunda à sexta das 10h às 18. De sábado e domingo das 15h às 22h', 1, '2018-06-25 11:37:38', NULL, 1),
(8, 'teste3', '7390ff71652df1ebac786e07abe0be0d', 'Biblioteca Mário', '1133970146', 'sti@prefeitura.sp.gov.br', 'Lorelei', 'Avenida São João, 473 - 9º andar - República', 5, 'De segunda à sexta das 10h às 18. De sábado e domingo das 15h às 22h', 1, '2018-06-25 11:44:15', NULL, 1),
(13, 'ttt', '7390ff71652df1ebac786e07abe0be0d', 'ttt', '111', '111@111.com', '111c', 'Avenida São João, 473', 5, 'De segunda à sexta das 10h às 18. De sábado e domingo das 15h às 22h', 1, '2018-06-25 11:49:20', NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_status`
--

CREATE TABLE `user_status` (
  `id` int(1) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user_status`
--

INSERT INTO `user_status` (`id`, `status`) VALUES
(1, 'Ativo'),
(2, 'Desativado');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `administrators_users`
--
ALTER TABLE `administrators_users`
  ADD KEY `fk_administrators_idx` (`admininstrators_id`),
  ADD KEY `fk_users_idx` (`users_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_UNIQUE` (`category`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees_problems`
--
ALTER TABLE `employees_problems`
  ADD KEY `fk_emploees_idx` (`problems_id`),
  ADD KEY `fk_employee_idx` (`employee_id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_notes_problems_idx` (`problems_id`),
  ADD KEY `fk_notes_administrators_idx` (`administrator_id`),
  ADD KEY `fk_notes_users_idx` (`users_id`);

--
-- Indexes for table `priorities`
--
ALTER TABLE `priorities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `priority_UNIQUE` (`priority`);

--
-- Indexes for table `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_problems_user_idx` (`users_id`),
  ADD KEY `fk_problems_proprieties_idx` (`priorities_id`),
  ADD KEY `fk_problems_categories_idx` (`categories_id`),
  ADD KEY `fk_problems_administrators_idx` (`administrators_id`),
  ADD KEY `fk_problems_status_idx` (`problem_status_id`);

--
-- Indexes for table `problem_status`
--
ALTER TABLE `problem_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `status_UNIQUE` (`status`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `region_UNIQUE` (`region`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `dapartment_UNIQUE` (`local`),
  ADD KEY `fk_regios_users_idx` (`idRegion`),
  ADD KEY `fk_user_status_users_idx` (`user_status_id`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `status_UNIQUE` (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `priorities`
--
ALTER TABLE `priorities`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `problems`
--
ALTER TABLE `problems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `problem_status`
--
ALTER TABLE `problem_status`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `administrators_users`
--
ALTER TABLE `administrators_users`
  ADD CONSTRAINT `fk_administrators` FOREIGN KEY (`admininstrators_id`) REFERENCES `administrators` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `employees_problems`
--
ALTER TABLE `employees_problems`
  ADD CONSTRAINT `fk_employee` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_problems` FOREIGN KEY (`problems_id`) REFERENCES `problems` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `fk_notes_administrators` FOREIGN KEY (`administrator_id`) REFERENCES `administrators` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_notes_problems` FOREIGN KEY (`problems_id`) REFERENCES `problems` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_notes_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `problems`
--
ALTER TABLE `problems`
  ADD CONSTRAINT `fk_problems_administrators` FOREIGN KEY (`administrators_id`) REFERENCES `administrators` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_problems_categories` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_problems_proprieties` FOREIGN KEY (`priorities_id`) REFERENCES `priorities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_problems_status` FOREIGN KEY (`problem_status_id`) REFERENCES `problem_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_problems_users` FOREIGN KEY (`users_id`) REFERENCES `administrators_users` (`users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_regios_users` FOREIGN KEY (`idRegion`) REFERENCES `regions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_status_users` FOREIGN KEY (`user_status_id`) REFERENCES `user_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
