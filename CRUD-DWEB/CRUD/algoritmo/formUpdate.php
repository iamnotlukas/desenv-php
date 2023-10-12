
<h1>Local de mudar</h1>


<?php

// Obter o id do produto do formulário
$idProduto = $_POST["BuscarIdProduto"];

      // Verificar se o produto existe
      include 'conexao.php';
      
      $sqlVerificar = $conn->prepare("SELECT * FROM produto WHERE idProduto = :BuscarIdProduto;");
      $sqlVerificar->bindParam(":BuscarIdProduto", $idProduto);
      $sqlVerificar->execute();
      $total = $sqlVerificar->fetch(PDO::FETCH_ASSOC);
      header("Location: formUpdate.php");
      exit;
      
      // Verifica se o ID do produto foi enviado
      if ($idProduto == $total["idProduto"]) {
        // Mostra o formulário para alterar o produto
        echo '<h3> Altere o produto: ' . $total["nomeProduto"];
          echo '<form action="#" method="post"><br>';
          echo '<input type="hidden" name="id"' . $total["idProduto"] . '><br>';
          echo '<label>Insira o Nome do Produto</label>';
          echo '<input type="text" name="nomeAtualizar"><br>';
          echo '<label>Insira a descrição do Produto</label>';
          echo '<input type="text" name="descri"><br>';
          echo '<label>Informe o valor do Produto</label>';
        echo '<input type="number" name="vlAtualizar" step=".01" required><br><br>';
        echo '<input type="submit" value="Atualizar" name="btnAtualizar">';
        echo '</form>';
        
        // Alterar o produto
        if (!empty($_POST['btnAtualizar'])) {
          $sqlAtualizar = $conn->prepare("UPDATE produto
            nome_cli = :nomeAtualizar,
            descricaoProduto = :descri,
            vlProduto = vlAtualizar
          
            WHERE idProduto = :BuscarIdProduto;");
            $sqlAtualizar->bindParam(":BuscarIdProduto", $idProduto);
            $sqlAtualizar->execute();
  
          // Exibir uma mensagem de sucesso
          echo "<script>alert('Produto alterado com sucesso.')</script>";
        }
        else{
          "<script>alert('Erro ao executar o script')</script>";
        }
      }

      else {
        // Exibir uma mensagem de erro
        echo "<script>alert('Não foi possível alterar o produto.')</script>";
      }



?>