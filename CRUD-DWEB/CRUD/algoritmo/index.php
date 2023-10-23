<?php
// Inicia a sessão PHP
session_start();

// Verifica se as tabelas do banco de dados foram criadas
if (!file_exists("../BancoDeDados/create.php")) {
  // Redireciona para a página de criação do banco de dados
  header("Location: ../BancoDeDados/create.php");
  exit;
}

// Verifica se o usuário está autenticado
if (!isset($_SESSION['usuarioLogin'])) {
  // Redireciona para a página de login
  header("Location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tela do Administrador</title>
  <link rel="stylesheet" href="../style/index.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>
  <h1>Tela do Administrador</h1>
  <div class="container">
    <a href="delProduto.php">
      <input type="submit" value="Excluir Produto">
    </a>
    <a href="addProduto.php">
      <input type="submit" value="Cadastrar Produto">
    </a>
    <a href="listarProduto.php">
      <input type="submit" value="Listar Produto">
    </a>
    <a href="formUpdate.php">
      <input type="submit" value="Atualizar Produto">
    </a>
  </div>
</body>
</html>





