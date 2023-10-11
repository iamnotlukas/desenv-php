CREATE DATABASE IF NOT EXISTS sistema;
USE sistema;


CREATE TABLE IF NOT EXISTS usuario
(
  id_cli INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nome_cli VARCHAR(45) NOT NULL,
  email_cli VARCHAR(50) NOT NULL,
  senha_cli VARCHAR(16) NOT NULL
);


CREATE TABLE IF NOT EXISTS produto
(
  idProduto INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nomeProduto varchar(50) NOT NULL,
  descricaoProduto varchar(255) NOT NULL,
  vlProduto NUMBER(10,2) NOT NULL
)