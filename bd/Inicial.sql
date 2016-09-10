SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+03:00";

--DROP TABLE IF EXISTS `baixas`;
CREATE TABLE IF NOT EXISTS `baixas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_rateio` int(11) NOT NULL,
  `valor` float NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--DROP TABLE IF EXISTS `cartoes`;
CREATE TABLE IF NOT EXISTS `cartoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--DROP TABLE IF EXISTS `centroscustos`;
CREATE TABLE IF NOT EXISTS `centroscustos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--DROP TABLE IF EXISTS `classificacoesfinanceiras`;
CREATE TABLE IF NOT EXISTS `classificacoesfinanceiras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--DROP TABLE IF EXISTS `faturas`;
CREATE TABLE IF NOT EXISTS `faturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cartao` int(11) NOT NULL,
  `vencimento` date NOT NULL,
  `id_titulo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_titulo` (`id_titulo`),
  KEY `id_titulo_2` (`id_titulo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--DROP TABLE IF EXISTS `faturas_itens`;
CREATE TABLE IF NOT EXISTS `faturas_itens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_fatura` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `valor` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--DROP TABLE IF EXISTS `rateios`;
CREATE TABLE IF NOT EXISTS `rateios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_centrocusto` int(11) NOT NULL,
  `id_classificacao` int(11) NOT NULL,
  `id_titulo` int(11) NOT NULL,
  `valor` float NOT NULL,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--DROP TABLE IF EXISTS `titulos`;
CREATE TABLE IF NOT EXISTS `titulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pessoa` varchar(200) DEFAULT NULL,
  `valor` float NOT NULL,
  `vencimento` date NOT NULL,
  `parcela_atual` int(11) DEFAULT NULL,
  `parcela_final` int(11) DEFAULT NULL,
  `sinal` smallint(6) NOT NULL DEFAULT '0',
  `observacao` varchar(200) DEFAULT NULL,
  `situacao` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) NOT NULL,
  `senha` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;