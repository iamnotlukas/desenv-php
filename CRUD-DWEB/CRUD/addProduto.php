<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adicionar Produto</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="main-login">
        <form method="post" action="#">

          <div class="right-login" style="flex-wrap:wrap;">
            <div class="card-login">
              <h1>Adicionar Produto</h1>
              <div class="textfield">
                <label>Nome do Produto:</label><br>
                   <input type="text" name="nomeProduto" required>
                </div>
                <div class="textfield">
                   <label>Descrição do Produto:</label><br>
                     <input type="text" name="descricaoProduto" required>
                  </div>
                  <div class="textfield">
                  <label>Valor do Produto:</label><br>
                       <input type="number" name="vlProduto" step=".01" required>
                  </div>
                  <div class="textfield">
                     <label>Link da Imagem:</label><br>
                        <input type="text" name="imgLink">
                  </div>
                  
                </div>
                <input type="submit" value="Adicionar" name="btnAdicionar">
                <br>
                <a href="index.php">
                  <input type="button" value="Tela de Gestão">
                </a>
                </div>
            </div>
          </div>
        </form>
      </body>
</html>


<?php
  if (!empty($_POST['btnAdicionar'])){
  try{

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

    if ($sqlInserir->execute()) {
      echo "<script>alert('Produto adicionado com sucesso')</script>";
    } else {
      echo "<script>alert('Não foi possível deletar o pro')</script>duto";
    }
    // Fechar a conexão com o banco de dados
    $conn = null;
  }
  catch(PDOException $e){
    echo $sqlInserir . "<br>" . $e->getMessage();
}

}

?>
