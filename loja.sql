-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05-Dez-2017 às 03:18
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `nome`, `cpf`, `end`, `tel`, `email`, `login`, `senha`) VALUES
(3, 'Antonio Erisvan Alves Juniorr', 2147483647, 'Rua Dr. JosÃ© Torquat', 2147483647, 'junim@gmail.comm', 'euu', 'a9ce376e8e1ee15f8456b73645af36a7');

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
-- Estrutura da tabela `comentariossite`
--

CREATE TABLE `comentariossite` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comentariossite`
--

INSERT INTO `comentariossite` (`id`, `email`, `comentario`) VALUES
(1, 'eris@junior', 'Muito toooop'),
(2, 'eris@junior', 'Ruan Folgado!!!');

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
  `detalhes` text NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `image`, `preco`, `categoria`, `detalhes`, `view`) VALUES
(41, 'Teclado oex', '55eb536e70291b858b35b73438bd6f06.png', '110.00', 'Acessorio', 'Fabricante: Oex\r\nCor: Preto e Laranja', 3),
(42, 'Controle Remoto Universal', 'f1dd377e077d93e997577d546af21e24.png', '50.00', 'Gadgets', '', 0),
(43, 'Headset Gamer', 'bacda7382ae09b9877ada85ee668fcee.png', '80.00', 'Acessorio', '', 0),
(44, 'Conjunto Mouse, Teclado e Headset', '52f3f68862559272f7e5125228830e61.png', '200.00', 'Acessorio', '', 1),
(45, 'XBox One', 'dfc1d98c8ac6f73774e8c46babb50e3a.png', '2500.00', 'Gaming', '', 1),
(46, 'Playstation 4', '50a1bcf383c8cf70d8b3fa144517aff6.png', '3000.00', 'Gaming', '', 0),
(47, 'Playstation 1', '7630a0ac887aef223065d72a4a8a4850.png', '100.00', 'Gaming', '', 1),
(48, 'Super Nintendo', 'ec9e42aa21d07b7bc26def0a80774381.png', '300.00', 'Gaming', '', 0),
(50, 'Galaxy S8', '1834461d4da5c785d890751fe71678e0.png', '3000.00', 'Smartphone', '', 6),
(51, 'SmartWatch', 'ca90fe0a8f526963e3f0dfa40e296502.png', '200.00', 'Gadgets', '', 1),
(52, 'Google Glass', 'dbb8fd6048cacbbbb31dd4443444ef5f.png', '600.00', 'Gadgets', '', 0),
(53, 'Fone Bluetooth', 'cbeacfd350a149f66ddcd9efe575156a.png', '70.00', 'Gadgets', '', 0),
(54, 'Computador Gamer X', '93af4aa98e37d0ba6e2d46674398614b.jpg', '3000.00', 'Computadores', '', 5),
(55, 'Computador Gamer Y', '03f3ecf389845a1e24899c17d19fde52.jpg', '2800.00', 'Computadores', '', 1),
(56, 'Computador Gamer Z', 'a476a86ea56a15812b867341e08bd832.png', '3600.00', 'Computadores', '', 1),
(57, 'Computador Gamer ???', 'ffc1c09052b06434a4d8c052c714a1b2.png', '4000.00', 'Computadores', '', 0),
(58, 'Iphone X', '03be6740cd66485f1c3905297d4f7e2f.png', '1000000.00', 'Smartphone', 'Fabricant:\r\nMMEOLMEOM RAM:\r\nLAD,MOSFKAMP\r\nSKIANSSJT', 2);

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
(9, 'Eronheit', '121.563.213-72', '21/89/7301', 'yasdghakshbdaasbdkvsbdksaghdvsadsavdghasdvhdsad', '(88) 9.9718-7576', 'eronheit@heit.com', 'Eronheit', '774355d0d99fd6c47b38c2097471b409', 'db6a99515ad4aad2f448958abb2ac616.jpg'),
(12, 'Antonio Erisvan Alves Junior', '13176098405', '07112001', 'Rua Dr. JosÃ© Torquato', '84994661363', 'junim@gmail.comm', 'eu', 'a9ce376e8e1ee15f8456b73645af36a7', 'dc05a312a4e3545a691dcc3a3af2b658.jpg'),
(13, 'Antonio Erisvan Alves Junior', '131.760.984-05', '07/11/2001', 'Rua Dr. JosÃ© Torquato', '(84) 9.9466-1363', 'erisvan.junior.a@gmail.com', 'erisjunior', '3ec9bf632c4cfacc08156e63052c9dfe', '06d65c5f9b79a52e62b36f1d1d88a39c.jpg'),
(14, 'Antonio Erisvan Alves Junior', '131.313.131-31', '07/11/2001', 'Rua Dr. JosÃ© Torquato', '(84) 1.1213-1321', 'eronaldorose74@gmail.com', 'login', '74bcbf61609127cb6df1a5458e59cba2', 'ee067530772c0e75cb6f99fb2cf28eaf.png');

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
-- Indexes for table `comentariossite`
--
ALTER TABLE `comentariossite`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comentariossite`
--
ALTER TABLE `comentariossite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
