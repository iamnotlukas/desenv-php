<!DOCTYPE html>
<html>
<body>

<h2>Adicionar Produto</h2>

<form action="#" method="post">
  Nome do Produto:<br>
  <input type="text" name="nomeProduto" required>
  <br>-
  Descrição do Produto:<br>
  <input type="text" name="descricaoProduto" required>
  <br>
  Valor do Produto:<br>
  <input type="number" name="vlProduto" step=".01" required>
  <br>
  Link da Imagem:<br>
  <input type="text" name="imgLink" required>
  <br><br>
  <input type="submit" value="Inserir">
</form> 

</body>
</html>


<?php

include 'conexao.php'; 

$sqlInserir = $conn->prepare("INSERT INTO produto (nomeProduto, descricaoProduto, vlProduto, imgLink) VALUES (:nomeProduto, :descricaoProduto, :vlProduto, :imgLink)");

$nomeProduto = $_POST['nomeProduto'];
$descricaoProduto = $_POST['descricaoProduto'];
$vlProduto = $_POST['vlProduto'];
$imgLink = $_POST['imgLink']; // Pega o link da imagem do formulário

$sqlInserir->bindParam(':nomeProduto', $nomeProduto);
$sqlInserir->bindParam(':descricaoProduto', $descricaoProduto);
$sqlInserir->bindParam(':vlProduto', $vlProduto);
$sqlInserir->bindParam(':imgLink', $imgLink);

// Executa a consulta
if ($sqlInserir->execute()) {
  echo "Novo registro criado com sucesso";
} else {
  echo "Não foi possível criar o registro";
}
  // Fechar a conexão com o banco de dados
  $conn = null;
?>

?>