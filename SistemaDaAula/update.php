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
  
   a {
   display:block;
    border: 1px solid #ccc;
    width: 95%;
    padding: 10px;
    margin-bottom: 10px;
    background-color: black;
    color: #fff;
    cursor: pointer;
    text-decoration:none;
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
      <label>Informe o CPF:</label> <!--pedir pra o usuario informar-->
      <input type="text" name="cpf" maxlength="45" minlenght="10">
      <label>Digite o novo nome:</label>
        <input type="text" name="txtnome" maxlength="45">
        <br>
        <label>Digite o novo e-mail:</label>
        <input type="email" name="txtemail"  maxlength="50">
        <br>
        <label>Digite o novo CPF/CNPJ:</label>
        <input type="password" name="txtcpf">
        <br>
      <input type="submit" value="Atualizar" name="btn-update">
      <br>
      <a href="admin.php" style=" text-align: center;"> Tela do Administrador
      </a>
  </form>

  <?php
  if (!empty($_POST['btn-update'])){

    //atribui na váriavel o que foi digitado no input 'cpf'
    $cpf = $_POST['cpf'];
    $NovoNome = $_POST['txtnome'];
    $NovoEmail = $_POST['txtemail'];
    $NovoCpf = $_POST['txtcpf'];
    // Consulta SQL para buscar o registro do usuário
  
  $sql = "SELECT * FROM clientes WHERE nome_cli = $cpf";
    include 'conexao.php';
  // Executa a consulta SQL
  $result = $conn->query($sql);

  // Verifica se a consulta foi bem-sucedida
  if ($result) {
    
    // Obtém os dados do registro
    $row = mysqli_fetch_assoc($result);
    
    // Atualiza os dados do cliente
    $row["nm_nome_cliente"] = $NovoNome;
    $row["cd_cpf_cliente"] = $NovoCpf;
    $row["nm_email_cliente"] = $NovoEmail;

    $atualizar = "UPDATE dadosclientes SET
          nm_nome_cliente = $NovoNome,
          cd_cpf_cliente = $NovoCpf,
         nm_email_cliente = $NovoEmail
                WHERE cd_cpf_cliente = $cpf";

    // Executa a consulta SQL
    $deucerto = $conn->query($sql);
    // Verifica se a consulta foi bem-sucedida
    if ($deucerto) {
      
      // Registro atualizado com sucesso
      echo "<script>alert('Registro atualizado com sucesso!')";
      
    } else {
      
      // Erro ao atualizar o registro
      echo "Erro ao atualizar o registro: " . mysqli_error($conn);
    }
    
  } else {
    
    // Erro na consulta
    echo "Erro ao executar a consulta: " . mysqli_error($conn);
  }
  
  // Fecha a conexão com o banco de dados
  mysqli_close($conn);
  
  }
  ?>

</body>
</html>