-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Jul-2017 às 18:35
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bellsprout`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `basket`
--

CREATE TABLE `basket` (
  `id_basket` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `basket`
--

INSERT INTO `basket` (`id_basket`, `name`, `value`) VALUES
(1, 'Sementinha', 25),
(2, 'Broto', 32),
(3, 'Arbusto', 40);

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE `item` (
  `id_item` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `unit_name` varchar(50) DEFAULT NULL,
  `unit_weight` int(11) NOT NULL,
  `item_group` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `item`
--

INSERT INTO `item` (`id_item`, `name`, `unit_name`, `unit_weight`, `item_group`, `quantity`) VALUES
(1, 'Queijo colonial', 'Fatiado(g)', 300, 'Queijos', 0),
(2, 'Tofu', 'Inteiro(g)', 300, 'Queijos', 100),
(3, 'Alface', '1 Pé(g)', 250, 'Hortaliças', 100),
(4, 'Rúcula', '1 Maço(g)', 300, 'Hortaliças', 100),
(5, 'Couve', '1 Maço(g)', 300, 'Hortaliças', 100),
(6, 'Couve-flor', '1 Cabeça(g)', 300, 'Hortaliças', 100),
(7, 'Brócolis', '1 Cabeça(g)', 300, 'Hortaliças', 100),
(8, 'Espinafre', '1 Maço(g)', 400, 'Hortaliças', 100),
(9, 'Repolho', '1 Cabeça(kg)', 1000, 'Hortaliças', 100),
(10, 'Tomate', 'g', 500, 'Hortaliças', 100),
(11, 'Cebola', 'g', 500, 'Hortaliças', 100),
(12, 'Alho', '1 Cabeça(g)', 100, 'Hortaliças', 100),
(13, 'Pão de leite', 'g', 700, 'Pão', 100),
(14, 'Pão branco', 'g', 700, 'Pão', 100),
(15, 'Pão sem glúten', 'g', 700, 'Pão', 100),
(16, 'Pão integral', 'g', 700, 'Pão', 100),
(17, 'Cuca', 'g', 500, 'Pão', 100),
(18, 'Salame italiano', 'Inteiro(g)', 200, 'Outros', 100),
(19, 'Geléia de morango', 'Pote(g)', 200, 'Outros', 100),
(20, 'Geléia de goiaba', 'Pote(g)', 200, 'Outros', 100),
(21, 'Geléia de uva', 'Pote(g)', 200, 'Outros', 100),
(22, 'Doce de banana', 'Pote(g)', 200, 'Outros', 100),
(23, 'Doce de leite', 'Pote(g)', 200, 'Outros', 100),
(24, 'Nata', 'Pote(g)', 200, 'Outros', 100),
(25, 'Goiabada', 'g', 200, 'Outros', 100),
(26, 'Batata', 'g', 500, 'Raízes', 100),
(27, 'Batata-doce', 'g', 700, 'Raízes', 100),
(28, 'Cenoura', 'g', 500, 'Raízes', 100),
(29, 'Beterraba', 'g', 500, 'Raízes', 100),
(30, 'Mandioca', 'kg', 1, 'Raízes', 100),
(31, 'Banana', 'kg', 1, 'Frutas', 100),
(32, 'Laranja', 'g', 700, 'Frutas', 100),
(33, 'Bergamota', 'kg', 1, 'Frutas', 100),
(34, 'Maçã', 'g', 500, 'Frutas', 100),
(35, 'Pêssego', 'g', 400, 'Frutas', 100),
(36, 'Pêra', 'g', 400, 'Frutas', 100),
(37, 'Mamão', 'kg', 1, 'Frutas', 100),
(38, 'Melão', 'kg', 1, 'Frutas', 100),
(39, 'Melancia', 'kg', 3, 'Frutas', 100),
(40, 'Morango', 'g', 200, 'Frutas', 100),
(41, 'Goiaba', 'g', 400, 'Frutas', 100),
(42, 'Uva', 'kg', 1, 'Frutas', 100),
(43, 'Ovos', 'Dúzia', 1, 'Outros', 100),
(44, 'Mel', 'Pote(g)', 50, 'Outros', 100),
(47, 'Item teste', 'g', 100, 'Outros', 123),
(48, 'Item teste', 'g', 100, 'Outros', 123),
(49, 'Soja transgÃªnica', 'Saco(kg)', 2, 'Outros', 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rel_basket_item`
--

CREATE TABLE `rel_basket_item` (
  `id_rel` int(11) NOT NULL,
  `item_group` varchar(50) NOT NULL,
  `id_basket` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `rel_basket_item`
--

INSERT INTO `rel_basket_item` (`id_rel`, `item_group`, `id_basket`, `quantity`) VALUES
(1, 'Pão', 1, 1),
(2, 'Hortaliças', 1, 2),
(3, 'Raízes', 1, 2),
(4, 'Frutas', 1, 4),
(5, 'Outros/Queijos', 1, 1),
(6, 'Pão', 2, 2),
(7, 'Hortaliças', 2, 3),
(8, 'Raízes', 2, 5),
(9, 'Frutas', 2, 8),
(10, 'Outros/Queijos', 2, 2),
(11, 'Pão', 3, 3),
(12, 'Hortaliças', 3, 5),
(13, 'Raízes', 3, 7),
(14, 'Frutas', 3, 10),
(15, 'Outros/Queijos', 3, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rel_item_food_restriction`
--

CREATE TABLE `rel_item_food_restriction` (
  `id_rel` int(11) NOT NULL,
  `food_restriction` varchar(50) NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `rel_item_food_restriction`
--

INSERT INTO `rel_item_food_restriction` (`id_rel`, `food_restriction`, `id_item`) VALUES
(1, 'lactose', 0),
(2, 'lactose', 13),
(3, 'lactose', 17),
(4, 'lactose', 24),
(5, 'lactose', 23),
(6, 'gluten', 17),
(7, 'gluten', 16),
(8, 'gluten', 14),
(9, 'gluten', 13),
(11, 'vegano', 19),
(12, 'vegano', 20),
(13, 'vegano', 21),
(14, 'vegano', 22),
(15, 'vegano', 25),
(16, 'vegano', 3),
(17, 'vegano', 4),
(18, 'vegano', 5),
(19, 'vegano', 6),
(20, 'vegano', 7),
(21, 'vegano', 8),
(22, 'vegano', 9),
(23, 'vegano', 10),
(24, 'vegano', 11),
(25, 'vegano', 12),
(26, 'vegano', 26),
(27, 'vegano', 27),
(28, 'vegano', 28),
(29, 'vegano', 29),
(30, 'vegano', 30),
(31, 'vegano', 31),
(32, 'vegano', 32),
(33, 'vegano', 33),
(34, 'vegano', 34),
(35, 'vegano', 35),
(36, 'vegano', 36),
(37, 'vegano', 37),
(38, 'vegano', 38),
(39, 'vegano', 39),
(40, 'vegano', 40),
(41, 'vegano', 41),
(43, 'vegano', 42),
(44, 'gluten', 48),
(45, 'lactose', 48),
(46, 'vegano', 48),
(47, 'vegano', 49);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `permission`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 0),
(3, 'andreo', 'd20a22106c542f82e4b81b14beb53386', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_data`
--

CREATE TABLE `user_data` (
  `id_user_data` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `cpf` varchar(12) NOT NULL,
  `address` varchar(300) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `user_data`
--

INSERT INTO `user_data` (`id_user_data`, `name`, `cpf`, `address`, `phone`, `id_user`) VALUES
(1, 'Administrador', '51580237355', 'Passagem Vinte e Oito de Agosto, 573, Quarenta Horas (Coqueiro)', '91999198631', 1),
(2, 'Joaquim Hugo Henrique dos Santos', '66907321696', 'Rua JoÃ£o Francisco da Mota, 364, CatolÃ©', '83991697221', 2),
(3, 'Andreo Dias Barros', '03655471185', 'Av Ipiranga, 267, Jardim BotÃ¢nico', '51894752658', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id_basket`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `rel_basket_item`
--
ALTER TABLE `rel_basket_item`
  ADD PRIMARY KEY (`id_rel`);

--
-- Indexes for table `rel_item_food_restriction`
--
ALTER TABLE `rel_item_food_restriction`
  ADD PRIMARY KEY (`id_rel`),
  ADD KEY `id_rel` (`id_rel`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id_user_data`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
  MODIFY `id_basket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `rel_basket_item`
--
ALTER TABLE `rel_basket_item`
  MODIFY `id_rel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `rel_item_food_restriction`
--
ALTER TABLE `rel_item_food_restriction`
  MODIFY `id_rel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id_user_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
