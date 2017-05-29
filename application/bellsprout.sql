-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Maio-2017 às 18:55
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE `item` (
  `id_item` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `unit_name` varchar(50) NOT NULL,
  `unit_weight` int(11) NOT NULL,
  `item_group` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `id_basket` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rel_basket_item`
--
ALTER TABLE `rel_basket_item`
  MODIFY `id_rel` int(11) NOT NULL AUTO_INCREMENT;
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
