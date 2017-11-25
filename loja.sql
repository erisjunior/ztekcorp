-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Nov-2017 às 11:40
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` int(11) NOT NULL,
  `end` varchar(60) NOT NULL,
  `tel` int(15) NOT NULL,
  `email` varchar(60) NOT NULL,
  `login` varchar(60) NOT NULL,
  `senha` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `msg` text NOT NULL,
  `prod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`id`, `nome`, `email`, `msg`, `prod_id`) VALUES
(1, 'vkjnk@rnkjnf', 'gg@mn', 'Muto bom', 23),
(2, '', '', '', 23),
(3, '', '', '', 23),
(4, '', '', '', 23);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `image` varchar(150) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `image`, `preco`, `categoria`, `view`) VALUES
(22, 'aviao', 'c8ed49ceaaf4108a690988b6e032fdc9.jpg', '8700000.00', 'Gadgets', 114),
(23, 'Notbook', '54a082d61bf62741f7293f9559a0eb82.jpg', '2000.00', 'Computador', 125),
(24, 'Celular de junior', '37157d89e87c57d6ecac2dc59583e3c4.jpg', '1000.00', 'SmartPhone', 136),
(25, 'placa de video', '6cc740c4f07962f2d6c574a70afd3911.jpg', '10000.00', 'Gaming', 57),
(26, 'nada', '8430cd788d8ae50c17461c1e83edf449.jpg', '1000.00', 'Acessorio', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(40) NOT NULL,
  `nasc` varchar(40) NOT NULL,
  `end` varchar(255) NOT NULL,
  `tel` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `user` varchar(60) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `cpf`, `nasc`, `end`, `tel`, `email`, `user`, `senha`, `image`) VALUES
(8, 'Josimar Martins', '413.624.753-75', '17/10/2000', 'Coronel, 94', '(84) 9.8161-3081', 'josimarjr479@gmail.com', 'jrjosimar04', '42e86ad8c7f643c002b5ecf66dd67b1a', '8f82a02697ed4ed6398940f09c21de6e.jpg'),
(9, 'Eronheit', '121.563.213-72', '21/89/7301', 'yasdghakshbdaasbdkvsbdksaghdvsadsavdghasdvhdsad', '(88) 9.9718-7576', 'eronheit@heit.com', 'Eronheit', '774355d0d99fd6c47b38c2097471b409', 'db6a99515ad4aad2f448958abb2ac616.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
