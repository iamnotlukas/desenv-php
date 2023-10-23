<?php
// Criação do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

try {
  // Cria o banco de dados
  $sqlCriarDatabase = "CREATE DATABASE IF NOT EXISTS $dbname";
  $conn = new PDO("mysql:host=$servername", $username, $password); // Conecta sem especificar o banco de dados
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->exec($sqlCriarDatabase);
  echo "Banco de dados criado com sucesso <br>";
  $conn = null;
} catch (PDOException $e) {
  echo $sqlCriarDatabase . "<br>" . $e->getMessage();
}

// Criação das tabelas
try {
  $sqlCriarTabelas = "
    CREATE TABLE IF NOT EXISTS usuario (
      id_cli INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      nome_cli VARCHAR(45) NOT NULL,
      email_cli VARCHAR(50) NOT NULL,
      senha_cli VARCHAR(16) NOT NULL
    );

    CREATE TABLE IF NOT EXISTS produto (
      idProduto INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      nomeProduto varchar(50) NOT NULL,
      descricaoProduto varchar(255) NOT NULL,
      vlProduto NUMERIC(10,2) NOT NULL,
      imgLink VARCHAR(255) NOT NULL
    );
  ";

  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); // Conecta ao banco de dados 'sistema'
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->exec($sqlCriarTabelas);
  echo "Tabelas do banco de dados criadas com sucesso";
  $conn = null;

  // Redireciona para a página de cadastro
  header("Location: ../algoritmo/cad.php");
} catch (PDOException $e) {
  echo $sqlCriarTabelas . "<br>" . $e->getMessage();
}

?>
