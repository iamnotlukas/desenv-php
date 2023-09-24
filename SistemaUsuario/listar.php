<style>
  /* aplicando estilo no emproviso*/
  body {
  font-family: sans-serif;
  }

  h1 {
  text-align: center;
  }

  span{
    font-size: 15px;
    font-weight: 800;
    color: black;
    
  }
  
</style>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listar Usuários</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500&display=swap" rel="stylesheet">
 
</head>
<body>
  
  <?php
  include 'conexao.php';

  // Query para listar todos os usuários
  $sql = "SELECT * FROM dadosclientes";
  
  $nome = "nm_nome_cliente";
  $cpf = "cd_cpf_cliente";
  $email = "nm_email_cliente";
  $id = "id_cli";
  // Executa a query
  $result = $conn->query($sql);
  
  // Verifica se a consulta foi bem-sucedida
  if ($result) {
    
    
    // Percorre os resultados da consulta
    while ($row = mysqli_fetch_assoc($result)) {
      // Exibe os dados do usuário
      
      echo "<br><span>Nome:</span> " . $row[$nome] . "<br>";
      echo "<span>CPF:</span> " . $row[$cpf] . "<br>";
      echo "<span>E-mail:</span> " . $row[$email] . "<br>";
      echo "<span>ID:</span> " . $row[$id] . "<hr>";
    }
    
  } else {
    
    // Erro na consulta
    echo "Erro ao executar a consulta: " . mysqli_error($conn);
  }

  // Fecha a conexão com o banco de dados
  mysqli_close($conn);
  
  ?>

</body>
</html>
