-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Nov-2017 às 12:29
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
(1, 'PC GAMER MOBA BOX II - I5 + GTX 1050 TI 4GB', 'pc1.png', '3300.00', 'Gaming', 4),
(2, 'PcGamer I5 Placa De Video GTX-1080 TI 8GB RAM-DDR4', 'pc3.jpg', '3650.00', 'Gaming', 6),
(3, 'Kit Gamer(PC-Keyborad-Mouse-HeadSet-Monitor-MousePad)', 'pc2.jpg', '5000.00', 'Gaming', 15),
(4, 'PC GAMER MOBA BOX II - I5 + GTX 1050 TI 4GB', 'pc1.png', '3300.00', 'Gaming', 4),
(16, 'PC GAMER MOBA BOX II - I5 + GTX 1050 TI 4GB', 'pc1.png', '3300.00', 'Gaming', 4),
(17, 'PcGamer I5 Placa De Video GTX-1080 TI 8GB RAM-DDR4', 'pc3.jpg', '3650.00', 'Gaming', 6),
(18, 'Kit Gamer(PC-Keyborad-Mouse-HeadSet-Monitor-MousePad)', 'pc2.jpg', '5000.00', 'Gaming', 15),
(19, 'PC GAMER MOBA BOX II - I5 + GTX 1050 TI 4GB', 'pc1.png', '3300.00', 'Gaming', 4);

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
(8, 'Josimar Martins', '413.624.753-75', '17/10/2000', 'Coronel, 94', '(84) 9.8161-3081', 'josimarjr479@gmail.com', 'jrjosimar04', '42e86ad8c7f643c002b5ecf66dd67b1a', '8f82a02697ed4ed6398940f09c21de6e.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
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
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
