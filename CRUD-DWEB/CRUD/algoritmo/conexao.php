<?php
// Arquivo de conexão

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

// Arquivo de criação do banco de dados

try {

// Cria o banco de dados
$conn = new PDO("mysql:host=$servername", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sqlCriarDatabase = $conn->query("CREATE DATABASE IF NOT EXISTS $dbname");

// Fecha a conexão após criar o banco de dados
$conn = null;

// Estabelece uma nova conexão com o banco de dados recém-criado
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Cria as tabelas
$sqlCriarDatabase = $conn->query("CREATE TABLE IF NOT EXISTS usuario (
id_cli INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nome_cli VARCHAR(45) NOT NULL,
email_cli VARCHAR(50) NOT NULL,
senha_cli VARCHAR(16) NOT NULL
);");

$sqlCriarDatabase = $conn->query("CREATE TABLE IF NOT EXISTS produto (
idProduto INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nomeProduto varchar(50) NOT NULL,
descricaoProduto varchar(255) NOT NULL,
vlProduto NUMERIC(10,2) NOT NULL,
imgLink VARCHAR(255) NOT NULL
);");

echo "<script>alert('Sistema criado com sucesso!')</script>;";

} catch (PDOException $e) {
echo "<script>alert('Erro ao criar o sistema!')</script>";
}

// Fecha a conexão com o banco de dados
$conn = null;

?>
