<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Deletar Produto</title>
</head>
<body>
  <h1>Deletar Produto</h1>
  <form action="#" method="post">
    <label>Informe o nome do Produto:</label>
    <input type="text" name="txtDeletarProduto">
    <br><br>
    <input type="submit" value="Deletar" name="btnDeletar">
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