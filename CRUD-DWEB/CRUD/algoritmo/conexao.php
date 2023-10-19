<?php
// Arquivo de conexão

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";
try{
  // Cria uma conexão com o banco de dados
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
  echo "". $e->getMessage();
}

// Retorna a conexão
return $conn;

?>
