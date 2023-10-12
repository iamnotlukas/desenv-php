<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

// Tenta conectar-se ao MySQL
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Erro de conexão
    die("Erro de conexão: " . $e->getMessage());
}
?>
