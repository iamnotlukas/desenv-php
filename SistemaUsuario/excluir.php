<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Excluir Usuário</title>
  <h1>Excluir Usuário</h1>
  <style>
    body {
    font-family: sans-serif;
    }

    h1 {
   text-align: center;
    }

   form {
    margin: 0 auto;
    width: 500px;
    padding: 20px;
   border: 1px solid #ccc;
    }

    label {
    font-weight: bold;
   display: block;
   margin-bottom: 10px;
    }

    a {
      display:block;
    border: 1px solid #ccc;
    width: 95%;
    padding: 10px;
    margin-bottom: 10px;
    background-color: #000;
    color: #fff;
    cursor: pointer;
    text-decoration:none;
  }


    input {
    width: 95%;
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 10px;
   }
  

    input[type="submit"]{
    width: inherit;
    background-color: #000;
    color: #fff;
    cursor: pointer;
    }
  </style>
  
</head>
<body>
  <form method="post">
      <label>Informe o CPF:</label>
      <input type="text" name="txtcpf" maxlength="45">
      <input type="submit" value="Excluir" name="btn-excluir">
      <br>
      <a href="admin.php" style=" text-align: center;"> Tela do Administrador
      </a>
  </form>
  
  <?php
  if (!empty($_POST['btn-excluir'])){

    // incluindo a conexão com o banco e atribuindo o cpf a variavel
    include 'conexao.php';
    $cpf = $_POST['txtcpf'];
    
    // Query SQL para deletar o registro
    $sql = "DELETE FROM dadosclientes WHERE cd_cpf_cliente = $cpf";
    
    // Executa a query
    $result = $conn->query($sql);
    
    // Verifica se a consulta foi bem-sucedida
    if ($result) {
      
      // Registro deletado com sucesso
    echo "<script>alert('Usuário deletado com sucesso!');</script>";
    
  } else {
    
    // Erro ao deletar o registro
    echo "Erro ao deletar o registro: " . mysqli_error($conn);
  }
  
  // Fecha a conexão com o banco de dados
  mysqli_close($conn);
  
}
  ?>
</body>
</html>