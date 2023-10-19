<?php
// Arquivo de criação do sistema

// Inclui o arquivo de conexão
include 'conexao.php';

// Cria o banco de dados
$conn->query("CREATE DATABASE IF NOT EXISTS $dbname");

// Fecha a conexão
$conn = null;

// Cria a tabela "produto"
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sqlCriarDatabase = $conn->query("CREATE TABLE IF NOT EXISTS produto (
idProduto INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nomeProduto varchar(50) NOT NULL,
descricaoProduto varchar(255) NOT NULL,
vlProduto NUMERIC(10,2) NOT NULL,
imgLink VARCHAR(255) NOT NULL
);");

// Fecha a conexão
$conn = null;

?>