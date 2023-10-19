<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/index.css">
    <title>Atualizar</title>
</head>
<body>
    
        <form method="post" action="#">
         
              <h1>Atualizar Produto</h1>
           
                <label>Insira o ID do Produto:</label>
                <input type="number" name="BuscarIdProduto" placeholder="Informe o ID do produto">
                <br>
                <label for="nm_cli">Novo nome do produto: </label>
                <input type="text" name="NovoNome" placeholder="Informe o novo nome do Produto">
              <br>
                <label>Nova Descrição</label>
                <input type="text" name="NovaDescri" placeholder="Informe a nova descrição do produto">
                <br>   
                <label>Informe o novo valor</label>
                <input type="password" name="NovoValor" placeholder="Informe o novo valor">
                <input type="submit" value="Atualizar" name="btnAtualizar">
                <br>
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
if (!empty($_POST['btnAtualizar'])) {

  // Obter o id do produto do formulário
  $idProduto =$_POST["BuscarIdProduto"];
  
  try{
    
      // Verificar se o produto existe
      include 'conexao.php';
      
      //obter os valores que o usuário digitou
      $nomeAtulizar = $_POST['NovoNome'];
      $descri = $_POST['NovaDescri'];
      $novoValor = $_POST['NovoValor'];
      
      $idProduto == $_POST['BuscarIdProduto'];
      
      // Alterar o produto
          $sqlAtualizar = $conn->prepare("UPDATE produto SET
            nomeProduto = :nomeAtualizar,
            descricaoProduto = :descriAtualizar,
            vlProduto = :vlAtualizar
          
            WHERE idProduto = :BuscarIdProduto");

            $sqlAtualizar->bindParam(":nomeAtualizar", $nomeAtulizar);
            $sqlAtualizar->bindParam(":descriAtualizar", $descri); 
            $sqlAtualizar->bindParam(":vlAtualizar", $novoValor);
            $sqlAtualizar->bindParam(":BuscarIdProduto", $idProduto);

           

            //se executar
            if ($sqlAtualizar->execute()){
              echo '<script>alert("Produto alterado com sucesso!")</script>';
            }
            
            else{
              echo '<script>alert("Não foi possível alterar o produto!")<s/cript>';
            }
            


  } //mostrando erro caso o try dê errado
    catch(PDOException $e){
      echo "Error: " . $e->getMessage();
  }

      //encerrando a conexão com o banco de dados
      $conn = null; 
 }
  
?>