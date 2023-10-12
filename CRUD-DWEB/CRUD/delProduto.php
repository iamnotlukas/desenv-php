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
    <label>Informe o nome do Produto:</label>
    <br>
    <input type="text" name="txtDeletarProduto" spellcheck="false" data-ms-editor="true">
    <br><br>
    <input type="submit" value="Deletar" name="btnDeletar">
    <a href="index.php">
       <input type="button" value="Tela de Gestão">
     </a>
  </form>
</body>
</html>

<?php
if (!empty($_POST['btnDeletar'])){
  try{

    //incluir o arquivo que fiz para conectar com o banco de dados
    include 'conexao.php';
    
    // Prepara a consulta SQL para deletar o produto
    $sqlDeletar = $conn->prepare("DELETE FROM produto WHERE nomeProduto = :txtDeletarProduto");
    
    $nomeProduto = $_POST['txtDeletarProduto'];
    
    $sqlDeletar->bindParam(':txtDeletarProduto', $nomeProduto);
    
    // Executa a consulta
    if ($sqlDeletar->execute()) {
      echo "Produto deletado com sucesso";
    } else {
      echo "Não foi possível deletar o produto";
    }
  }
    catch(PDOException $e){
      echo $sqlDeletar . "<br>" . $e->getMessage();
  }
  
  //encerrando a conexão com o banco de dados
  $conn = null;
}

?>