-- phpMyAdmin SQL Dump — Telecall (versão corrigida)
-- Correções aplicadas:
--   • senha VARCHAR(255) para suportar hash bcrypt
--   • usuario VARCHAR(30) — limite mais realista
--   • FK idusuarios em dados vincula ao usuário dono do registro
--   • Senhas dos usuários de teste convertidas para hash bcrypt

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

SET NAMES utf8mb4;

-- --------------------------------------------------------
-- Tabela: usuarios
-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idusuarios` int(10) NOT NULL AUTO_INCREMENT,
  `usuario`    varchar(30)  NOT NULL,
  `senha`      varchar(255) NOT NULL,   -- tamanho para hash bcrypt
  `tipo`       int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idusuarios`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Usuários de teste (senhas hasheadas com bcrypt)
INSERT INTO `usuarios` (`idusuarios`, `usuario`, `senha`, `tipo`) VALUES
(1,  'testee', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0),
(4,  'adminn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1);

-- ATENÇÃO: Antes de colocar em produção, crie novos usuários pelo cadastro
-- para que tenham senhas próprias geradas via password_hash().

-- --------------------------------------------------------
-- Tabela: dados
-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `dados` (
  `iddados`    int(11) NOT NULL AUTO_INCREMENT,
  `idusuarios` int(10) NOT NULL,              -- FK → usuarios.idusuarios
  `nome`       varchar(80)  NOT NULL,
  `nomemae`    varchar(80)  NOT NULL,
  `celular`    varchar(17)  NOT NULL,
  `telfixo`    varchar(16)  NOT NULL,
  `cpf`        varchar(15)  NOT NULL,
  `datanasc`   date         NOT NULL,
  `genero`     varchar(10)  NOT NULL,
  `email`      varchar(100) NOT NULL,
  `cep`        varchar(10)  NOT NULL,
  `rua`        varchar(100) NOT NULL,
  `numero`     varchar(10)  NOT NULL,
  `bairro`     varchar(60)  NOT NULL,
  `cidade`     varchar(60)  NOT NULL,
  `estado`     varchar(5)   NOT NULL,
  PRIMARY KEY (`iddados`),
  KEY `fk_dados_usuario` (`idusuarios`),
  CONSTRAINT `fk_dados_usuario`
    FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dados de exemplo vinculados ao usuário testee (idusuarios=1)
INSERT INTO `dados` (`iddados`, `idusuarios`, `nome`, `nomemae`, `celular`, `telfixo`, `cpf`, `datanasc`, `genero`, `email`, `cep`, `rua`, `numero`, `bairro`, `cidade`, `estado`) VALUES
(1, 1, 'Usuário Exemplo', 'Nome da Mãe Exemplo', '(21) 99999-9999', '(21) 3333-3333', '000.000.000-00', '2000-01-01', 'Masculino', 'exemplo@email.com', '21040-282', 'Rua da Proclamação', '1', 'Bonsucesso', 'Rio de Janeiro', 'RJ');

COMMIT;
