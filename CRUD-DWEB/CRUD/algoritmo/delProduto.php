<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Deletar Produto</title>
  <link rel="stylesheet" href="index.css">
</head>
<body>
  <h1>Deletar Produto</h1>
 <form action="#" method="post" style="width: inherit;margin: 0 auto;display: contents;">
    <label>Informe o ID do Produto:</label>
    <br>
    <input type="number" name="txtDeletarProduto">
    <br><br>
    <input type="submit" value="Deletar" name="btnDeletar">
    <a href="index.php">
       <input type="button" value="Tela de Gestão">
     </a>
  </form>
</body>
</html>

<?php

// Iniciar a sessão
session_start();

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter o id do produto do formulário
    $idProduto = $_POST["txtDeletarProduto"];

    // Verificar se o produto existe
    include 'conexao.php';

    $comando = $conn->prepare("SELECT COUNT(*) AS total
    FROM produto
    WHERE idProduto = :idProduto;");
    $comando->bindParam(":idProduto", $idProduto);
    $comando->execute();
    $total = $comando->fetch()["total"];

    // Excluir o produto
    if ($total == 1) {
        $comando = $conn->prepare("DELETE FROM produto WHERE idProduto = :idProduto;");
        $comando->bindParam(":idProduto", $idProduto);
        $comando->execute();

        // Exibir uma mensagem de sucesso
        echo "<script>alert('Produto excluído com sucesso.')</script>";
    } else {
        // Exibir uma mensagem de erro
        echo "<script>alert('Não foi possível excluir o produto.')</script>";
    }
}

?>
