-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 07-Abr-2019 às 14:35
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `livraria`
--
CREATE DATABASE IF NOT EXISTS `livraria` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `livraria`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

DROP TABLE IF EXISTS `autor`;
CREATE TABLE IF NOT EXISTS `autor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `autor`
--

INSERT INTO `autor` (`id`, `nome`) VALUES
(1, 'Mosantos de Vilar dos Telles'),
(2, 'Jonas Guanabara da Silva'),
(3, 'Joselito de Cascatinha'),
(4, 'Luis Boça'),
(5, 'Charlinho Menino Guerreiro'),
(6, 'Dona Maxima'),
(7, 'Doutor Lincon'),
(8, 'Linhares'),
(9, 'Jonny Boganville'),
(10, ' Jimmy Leroy'),
(11, 'Professor Gilmar'),
(12, 'Padre Quemedo'),
(13, 'Lagreca'),
(14, 'Dedé Carvoeiro'),
(15, 'Carlos Carne'),
(16, 'Seu Madruga'),
(17, 'Teste 123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor_livro`
--

DROP TABLE IF EXISTS `autor_livro`;
CREATE TABLE IF NOT EXISTS `autor_livro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `autor_id` int(11) NOT NULL,
  `livro_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `autor_id` (`autor_id`,`livro_id`),
  KEY `autor_id_2` (`autor_id`),
  KEY `livro_id` (`livro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `autor_livro`
--

INSERT INTO `autor_livro` (`id`, `autor_id`, `livro_id`) VALUES
(1, 1, 2),
(8, 1, 4),
(9, 1, 5),
(10, 1, 6),
(2, 2, 1),
(24, 2, 10),
(3, 3, 1),
(16, 3, 3),
(11, 3, 6),
(25, 3, 10),
(17, 4, 3),
(18, 5, 3),
(12, 5, 6),
(13, 5, 7),
(20, 11, 8),
(21, 12, 8),
(22, 14, 8),
(23, 16, 8),
(15, 16, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `cpf`, `telefone`) VALUES
(1, 'Steven Beagle', '33554488662', '219999999'),
(2, 'Dudu Marchiori', '78945873215', '2155555555'),
(3, 'Adilson Polloskki', '32145675395', '1166666666'),
(4, 'Kiko', '12345678999', '2154355646');

-- --------------------------------------------------------

--
-- Estrutura da tabela `editora`
--

DROP TABLE IF EXISTS `editora`;
CREATE TABLE IF NOT EXISTS `editora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `cnpj` varchar(14) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `editora`
--

INSERT INTO `editora` (`id`, `nome`, `website`, `cnpj`, `endereco`) VALUES
(1, 'Editora Organizações Tabajara', 'http://www.tabajara-livros.com.br', '66968328000104', '545345345'),
(2, 'Editora Mosantos LTDA', 'http://www.editora-mosantos.com.br', '80880262000127', ''),
(3, 'Editora Top das Galaxias', 'http://www.w3.org/Addressing/URL/url-spec.txt', '36215975395', ''),
(4, 'EDITORA VILA 8', 'www.vila8.org', '1654984546549', ''),
(5, 'tabajar', 'www.sdfsdf.com', '23423432', 'rua legal'),
(6, 'werwerwerwe', 'www.sdfsdf.com', '23423432', 'rua legal'),
(7, 'douglas', 'www.sdfsdf.com', '23423432', 'rua legal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `gerente_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gerente_id` (`gerente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome`, `cpf`, `gerente_id`) VALUES
(7, 'Lurdes Boça', '74832651489', NULL),
(8, 'Wallace Guilhermino', '65478932145', 7),
(9, 'Edson Wander', '54698715324', 8),
(10, 'Cláudio Ricardo', '45667789442', 7),
(11, 'Neo Labaque', '54789634128', 7),
(13, 'Renato Noiadão', '56842365142', 10),
(14, 'José Canjica Martins', '24862486248', 7),
(15, 'Carlos Calhorda', '24321589654', 8),
(16, 'Chaves', '57352187256', NULL),
(17, 'Sou Hype', '23423422342', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

DROP TABLE IF EXISTS `genero`;
CREATE TABLE IF NOT EXISTS `genero` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `genero_tree_parent_fk` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `genero`
--

INSERT INTO `genero` (`id`, `nome`, `parent_id`, `lft`, `rght`) VALUES
(1, 'Narrativo', NULL, 1, 82),
(2, 'Lírico', NULL, 83, 98),
(3, 'Dramático', NULL, 99, 106),
(4, 'Poesia', 2, 84, 85),
(5, 'Ode', 2, 86, 87),
(6, 'Sátira', 2, 88, 89),
(7, 'Hino', 2, 90, 91),
(8, 'Soneto', 2, 92, 93),
(9, 'Haicai', 2, 94, 95),
(10, 'Acróstico', 2, 96, 97),
(11, 'Romance', 1, 2, 11),
(12, 'Romance de Aprendizagem', 11, 3, 4),
(13, 'Romance Policial', 11, 5, 6),
(14, 'Romance Psicológico', 11, 7, 8),
(15, 'Romances Históricos', 11, 9, 10),
(16, 'Fábula', 1, 12, 13),
(17, 'Novela', 1, 14, 15),
(18, 'Conto', 1, 16, 17),
(19, 'Crônica', 1, 18, 19),
(20, 'Poesia Épica ou Epopeia', 1, 20, 21),
(21, 'Apocalipse Zumbi', 1, 22, 23),
(22, 'Autobiografia', 1, 24, 25),
(23, 'Biografia', 1, 26, 27),
(24, 'Chick-Lit', 1, 28, 29),
(25, 'Fantasia e Fantasia Científica', 1, 30, 31),
(26, 'Ficção Científica: na Literatura e também nas Revistas e Gibis', 1, 32, 33),
(27, 'Folhetim', 1, 34, 35),
(28, 'Horror', 1, 36, 37),
(29, 'Literatura Brutalista', 1, 38, 39),
(30, 'Literatura Fantástica', 1, 40, 41),
(31, 'Literatura Infanto-Juvenil', 1, 42, 43),
(32, 'Literatura YA – Young Adult – Jovem Adulto', 1, 44, 45),
(33, 'Metaficção', 1, 46, 47),
(34, 'Neocrítica', 1, 48, 49),
(35, 'Novelas de Cavalaria', 1, 50, 51),
(36, 'Paródia', 1, 52, 53),
(37, 'Sick-Lit', 1, 54, 55),
(38, 'Space Opera', 1, 56, 57),
(39, 'Suspense', 1, 58, 59),
(40, 'Vampirismo', 1, 60, 61),
(41, 'Literatura Gótica', 1, 62, 63),
(42, 'Literatura Esotérica', 1, 64, 65),
(43, 'Romances Espíritas', 1, 66, 67),
(44, 'Literatura de Auto-Ajuda', 1, 68, 69),
(45, 'Literatura de Negócios', 1, 70, 71),
(46, 'Literatura Steampunk', 1, 72, 73),
(47, 'Literatura Cyberpunk', 1, 74, 75),
(48, 'Literatura Espiritualista', 1, 76, 77),
(49, 'Literatura de Aventura', 1, 78, 79),
(50, 'Literatura de Guerra', 1, 80, 81),
(51, 'Farsa', 3, 100, 101),
(52, 'Tragédia', 3, 102, 103),
(53, 'Elegia', 3, 104, 105);

-- --------------------------------------------------------

--
-- Estrutura da tabela `habilitacao`
--

DROP TABLE IF EXISTS `habilitacao`;
CREATE TABLE IF NOT EXISTS `habilitacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(11) NOT NULL,
  `categoria` char(2) NOT NULL,
  `funcionario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `funcionario_id` (`funcionario_id`),
  UNIQUE KEY `funcionario_id_2` (`funcionario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `habilitacao`
--

INSERT INTO `habilitacao` (`id`, `numero`, `categoria`, `funcionario_id`) VALUES
(1, '78495162354', 'B', 7),
(2, '99885523654', 'AD', 10),
(3, '45687512598', 'C', 13),
(5, '12396348525', 'A', 11),
(6, '21575698423', 'AB', 14),
(7, '14785236548', 'C', 15),
(8, '23484562848', 'AB', 16),
(9, '44334345345', 'C', 17);

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_pedido`
--

DROP TABLE IF EXISTS `item_pedido`;
CREATE TABLE IF NOT EXISTS `item_pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pedido_id` int(11) NOT NULL,
  `livro_id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pedido_id` (`pedido_id`,`livro_id`),
  KEY `livro_id` (`livro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `item_pedido`
--

INSERT INTO `item_pedido` (`id`, `pedido_id`, `livro_id`, `quantidade`) VALUES
(1, 1, 1, 1),
(2, 1, 3, 1),
(3, 2, 5, 3),
(4, 3, 3, 1),
(5, 2, 4, 2),
(6, 5, 1, 2),
(7, 5, 2, 3),
(8, 5, 5, 4),
(9, 6, 1, 3),
(10, 6, 2, 2),
(11, 6, 6, 4),
(12, 7, 8, 2),
(13, 11, 9, 6),
(14, 12, 1, 8),
(16, 16, 1, 10),
(17, 17, 1, 5),
(18, 17, 4, 10),
(19, 17, 6, 15),
(20, 20, 4, 4),
(21, 26, 2, 5),
(22, 27, 2, 5),
(23, 28, 4, 10),
(24, 29, 2, 8),
(25, 30, 3, 42),
(28, 32, 2, 1),
(29, 33, 7, 20),
(30, 33, 3, 5),
(31, 33, 1, 2),
(32, 34, 6, 5),
(33, 34, 8, 10),
(34, 34, 5, 5),
(35, 35, 1, 24),
(36, 35, 3, 34),
(37, 35, 6, 88),
(38, 36, 1, 24),
(39, 36, 3, 34),
(40, 36, 6, 88),
(41, 38, 1, 3),
(42, 38, 3, 5),
(43, 38, 4, 44),
(44, 38, 9, 66);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

DROP TABLE IF EXISTS `livro`;
CREATE TABLE IF NOT EXISTS `livro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `preco` decimal(18,2) NOT NULL,
  `isbn` varchar(13) NOT NULL,
  `edicao` int(11) NOT NULL,
  `ano_publicacao` char(4) NOT NULL,
  `editora_id` int(11) NOT NULL,
  `genero_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `isbn` (`isbn`),
  KEY `editora_id` (`editora_id`),
  KEY `livro_genero_fk` (`genero_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`id`, `titulo`, `preco`, `isbn`, `edicao`, `ano_publicacao`, `editora_id`, `genero_id`) VALUES
(1, 'Sucesso na Vida', '39.99', '123456789112', 15, '2012', 1, 45),
(2, 'Brincadeira em Excesso Virou Bobeira', '44.01', '9876543211112', 2, '2015', 2, 22),
(3, 'Fazendo Bolos com CakePHP', '89.95', '3216547894561', 3, '2017', 1, 47),
(4, 'Vamos Investigar?', '63.22', '7849516236295', 2, '2014', 2, 28),
(5, 'Portabilidade Manual: Um Tutorial Prático', '100.99', '4568521597534', 2, '1997', 2, 18),
(6, 'Brazil Mulambo', '9.99', '1236547562111', 1, '2014', 1, 11),
(7, 'Tudo pelo estudo', '1.99', '12345678965', 1, '2002', 3, 23),
(8, 'Quem Cedo Madruga Deus Ajuda', '55.99', '9157357561', 5, '1997', 1, 13),
(9, 'Madrugando', '18.89', '5485315675165', 10, '1991', 4, 8),
(10, 'Eu entendo seu conceito mas não concordo', '1.13', '4534535325245', 1, '2017', 1, 21);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `funcionario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `funcionario_id` (`funcionario_id`),
  KEY `cliente_id` (`cliente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id`, `data`, `cliente_id`, `funcionario_id`) VALUES
(1, '2016-03-01 00:00:00', 1, 10),
(2, '2014-12-11 13:00:00', 2, 9),
(3, '2017-03-30 06:30:37', 1, 7),
(5, '2017-03-26 04:34:00', 1, 7),
(6, '2038-03-27 16:47:00', 1, 7),
(7, '2017-05-22 12:55:00', 1, 16),
(11, '2017-05-25 15:07:00', 4, 16),
(12, '2017-05-26 14:09:00', 4, 11),
(16, '2017-05-26 14:26:00', 1, 7),
(17, '2017-05-26 14:28:00', 2, 10),
(20, '2017-05-26 15:14:00', 1, 10),
(26, '2017-05-29 13:04:00', 4, 14),
(27, '2017-05-29 13:04:00', 4, 14),
(28, '2017-05-29 13:05:00', 3, 10),
(29, '2017-05-30 14:49:00', 3, 9),
(30, '2017-05-31 12:44:00', 2, 14),
(32, '2017-05-31 12:49:00', 3, 13),
(33, '2017-05-31 12:53:00', 4, 8),
(34, '2017-05-31 12:53:00', 3, 15),
(35, '2017-06-19 19:00:00', 1, 7),
(36, '2017-04-19 04:07:00', 1, 7),
(37, '2019-03-24 00:00:00', 1, 7),
(38, '2019-03-24 00:00:00', 1, 7);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `autor_livro`
--
ALTER TABLE `autor_livro`
  ADD CONSTRAINT `autor_livro_ibfk_1` FOREIGN KEY (`autor_id`) REFERENCES `autor` (`id`),
  ADD CONSTRAINT `autor_livro_ibfk_2` FOREIGN KEY (`livro_id`) REFERENCES `livro` (`id`);

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`gerente_id`) REFERENCES `funcionario` (`id`);

--
-- Limitadores para a tabela `genero`
--
ALTER TABLE `genero`
  ADD CONSTRAINT `genero_tree_parent_fk` FOREIGN KEY (`parent_id`) REFERENCES `genero` (`id`);

--
-- Limitadores para a tabela `habilitacao`
--
ALTER TABLE `habilitacao`
  ADD CONSTRAINT `habilitacao_ibfk_1` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionario` (`id`);

--
-- Limitadores para a tabela `item_pedido`
--
ALTER TABLE `item_pedido`
  ADD CONSTRAINT `item_pedido_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`),
  ADD CONSTRAINT `item_pedido_ibfk_2` FOREIGN KEY (`livro_id`) REFERENCES `livro` (`id`);

--
-- Limitadores para a tabela `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `livro_genero_fk` FOREIGN KEY (`genero_id`) REFERENCES `genero` (`id`),
  ADD CONSTRAINT `livro_ibfk_1` FOREIGN KEY (`editora_id`) REFERENCES `editora` (`id`);

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionario` (`id`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
