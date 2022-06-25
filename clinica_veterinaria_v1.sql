-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Nov-2020 às 23:26
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `clinica_veterinaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `animal`
--

CREATE TABLE `animal` (
  `idanimal` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  `sexo` varchar(1) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `idraca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `animal`
--

INSERT INTO `animal` (`idanimal`, `nome`, `data_nascimento`, `sexo`, `idcliente`, `data_cadastro`, `idraca`) VALUES
(3, 'Murfino', '2019-06-30', 'm', 1, '2020-11-30 10:36:32', 6),
(4, 'Godofredo', '2019-10-10', 'm', 6, '2020-11-30 15:05:31', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `idpessoa` int(11) NOT NULL,
  `cpf` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idcliente`, `idpessoa`, `cpf`) VALUES
(1, 1, '04932084374'),
(3, 3, '12345678901'),
(5, 5, '98484884848'),
(6, 14, '12345678900');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `idendereco` int(11) NOT NULL,
  `rua` varchar(200) NOT NULL,
  `numero` varchar(30) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `cep` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`idendereco`, `rua`, `numero`, `bairro`, `uf`, `cidade`, `cep`) VALUES
(1, 'RUA FILEMON NOGUEIRA', '505', 'CENTRO', 'PI', 'CORRENTE', '64980000'),
(2, 'RAIMUNDO LUSTOSA NOGUEIRA ', '888', 'CENTRO', 'PI', 'PARNAGUÁ', '64970-000'),
(3, 'RUA OSCAR NOGUEIRA', '86', 'SHIS', 'PI', 'PARNAGUÁ', '64970000'),
(5, 'RUA PROJETADA', '444', 'CENTRO', 'TO', 'TOCANTINS', '64980000'),
(8, 'RUA PROJETADA', '33', 'NOVA CORRENTE', 'PI', 'CORRENTE', '64980000'),
(9, 'MALHADINHA', '33', 'NOVA CORRENTE', 'PI', 'CORRENTE', '64980000'),
(12, 'MALHADINHA', '', 'ZONA RURAL', 'PI', 'PARNAGUá', '64970000'),
(13, 'MALHADINHA', '00', 'ZONA RURAL', 'PI', 'PARNAGUA', '64970000'),
(14, 'RUA PROJETADA', '00', 'BELEM', 'PI', 'PARNAGUA', '64970000'),
(15, 'FILEMON NOGUEIRA ', '2429', 'CENTRO', 'PI', 'CORRENTE', '64980000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `especie`
--

CREATE TABLE `especie` (
  `idespecie` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `especie`
--

INSERT INTO `especie` (`idespecie`, `nome`) VALUES
(1, 'Cachorro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `idfuncionario` int(11) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `idpessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`idfuncionario`, `codigo`, `idpessoa`) VALUES
(1, 'ifpi22', 7),
(2, 'pa001', 8),
(5, 'pa334', 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `idpessoa` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sexo` char(1) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefone` varchar(20) NOT NULL,
  `idendereco` int(11) NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`idpessoa`, `nome`, `sexo`, `email`, `telefone`, `idendereco`, `data_cadastro`) VALUES
(1, 'OBERIS DOS SANTOS NASCIMENTO', 'M', 'oberis2010@gmail.com', '89999087987', 1, '2020-11-29 11:57:44'),
(3, 'ELETICIA DOS SANTOS NASCIMENTO', 'F', 'eleticia@gmail.com', '89981010810', 3, '2020-11-29 15:30:14'),
(5, 'JAIRON NASCIMENTO SANTOS', 'M', 'jairon@teste.com.br', '8484747477747', 5, '2020-11-29 21:23:27'),
(7, 'FELIPE SANTOS', 'M', 'felipe@felipe.com.br', '8999900000000', 8, '2020-11-30 09:00:14'),
(8, 'ALCINEIDE DOS SANTTOS', 'F', 'alcineide@teste.com.br', '8999900009888', 9, '2020-11-30 09:12:23'),
(11, 'ALCINEIDE DOS SANTTOS', 'F', 'alcineide@teste.com.br', '8999900009888', 12, '2020-11-30 09:15:47'),
(12, 'JAILTON DOS SANTOS NASCIMENTO', 'M', 'jailton@teste.com.br', '8998194949494', 13, '2020-11-30 11:30:09'),
(13, 'RUBIA SANTOS', 'F', 'rubia@teste.com.br', '8998194945444', 14, '2020-11-30 11:32:49'),
(14, 'WEDNA PEREIRA ', 'F', 'wednaj1@gmail.com', '89999074333', 15, '2020-11-30 15:03:33');

-- --------------------------------------------------------

--
-- Estrutura da tabela `raca`
--

CREATE TABLE `raca` (
  `idraca` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `idespecie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `raca`
--

INSERT INTO `raca` (`idraca`, `nome`, `idespecie`) VALUES
(4, 'pinte', 1),
(5, 'Pastor Alemão', 1),
(6, 'Não Definida', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblogin`
--

CREATE TABLE `tblogin` (
  `idlogin` int(11) NOT NULL,
  `idfuncionario` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tratamento`
--

CREATE TABLE `tratamento` (
  `idtratamento` int(11) NOT NULL,
  `data_inicio` date NOT NULL DEFAULT current_timestamp(),
  `hora` varchar(10) NOT NULL,
  `idveterinario` int(11) NOT NULL,
  `idanimal` int(11) NOT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `valor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tratamento`
--

INSERT INTO `tratamento` (`idtratamento`, `data_inicio`, `hora`, `idveterinario`, `idanimal`, `tipo`, `valor`) VALUES
(1, '2020-12-01', '21:38', 1, 3, 'Banho', 50),
(2, '2020-12-02', '10:40', 2, 4, 'Pelagem', 100),
(3, '2020-12-04', '09:41', 2, 3, 'Pelagem', 100);

-- --------------------------------------------------------

--
-- Estrutura da tabela `veterinario`
--

CREATE TABLE `veterinario` (
  `idveterinario` int(11) NOT NULL,
  `registro` varchar(255) NOT NULL,
  `idpessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `veterinario`
--

INSERT INTO `veterinario` (`idveterinario`, `registro`, `idpessoa`) VALUES
(1, '20000', 12),
(2, '222', 13);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`idanimal`),
  ADD UNIQUE KEY `unicidade` (`nome`,`idcliente`,`data_nascimento`),
  ADD KEY `animal_fk0` (`idcliente`),
  ADD KEY `animal_fk2` (`idraca`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `cliente_fk1` (`idpessoa`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`idendereco`);

--
-- Índices para tabela `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`idespecie`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idfuncionario`),
  ADD UNIQUE KEY `codgio` (`codigo`),
  ADD KEY `funcionario_fk0` (`idpessoa`);

--
-- Índices para tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`idpessoa`),
  ADD UNIQUE KEY `idendereco` (`idendereco`);

--
-- Índices para tabela `raca`
--
ALTER TABLE `raca`
  ADD PRIMARY KEY (`idraca`),
  ADD KEY `raca_fk0` (`idespecie`);

--
-- Índices para tabela `tblogin`
--
ALTER TABLE `tblogin`
  ADD PRIMARY KEY (`idlogin`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `login_fk0` (`idfuncionario`) USING BTREE;

--
-- Índices para tabela `tratamento`
--
ALTER TABLE `tratamento`
  ADD PRIMARY KEY (`idtratamento`),
  ADD KEY `tratamento_fk0` (`idveterinario`),
  ADD KEY `tratamento_fk1` (`idanimal`);

--
-- Índices para tabela `veterinario`
--
ALTER TABLE `veterinario`
  ADD PRIMARY KEY (`idveterinario`),
  ADD UNIQUE KEY `registro` (`registro`),
  ADD UNIQUE KEY `idpessoa` (`idpessoa`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `animal`
--
ALTER TABLE `animal`
  MODIFY `idanimal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `idendereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `especie`
--
ALTER TABLE `especie`
  MODIFY `idespecie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idfuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `idpessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `raca`
--
ALTER TABLE `raca`
  MODIFY `idraca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tratamento`
--
ALTER TABLE `tratamento`
  MODIFY `idtratamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `veterinario`
--
ALTER TABLE `veterinario`
  MODIFY `idveterinario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_fk0` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `animal_fk2` FOREIGN KEY (`idraca`) REFERENCES `raca` (`idraca`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_fk1` FOREIGN KEY (`idpessoa`) REFERENCES `pessoa` (`idpessoa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `raca`
--
ALTER TABLE `raca`
  ADD CONSTRAINT `raca_fk0` FOREIGN KEY (`idespecie`) REFERENCES `especie` (`idespecie`);

--
-- Limitadores para a tabela `tblogin`
--
ALTER TABLE `tblogin`
  ADD CONSTRAINT `tblogin_ibfk_1` FOREIGN KEY (`idfuncionario`) REFERENCES `funcionario` (`idfuncionario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
