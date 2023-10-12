<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cad.css">
    <title>Cadastro</title>
</head>
<body>
    <div class="main-login">
        <div class="left-login">
            <h1>Cadastre-se<br>E entre no sistema</h1>
            <img src="cadastro.svg" class="left-login-image" alt="personagem animação">
        </div>
        <form method="post" action="#">
          <div class="right-login">
            <div class="card-login">
              <h1>Cadastro</h1>
              <div class="textfield">
                <label for="nm_cli">Nome</label>
                <input type="text" name="txtnome" placeholder="Nome do Usuário">
                </div>

                <div class="textfield">
                <label for="nm_cli">E-mail</label>
                <input type="text" name="txtemail" placeholder="Informe o E-mail">
                </div>

                <div class="textfield">
                    <label for="senha">Senha</label>
                    <input type="password" name="txtsenha" placeholder="Informe a Senha">
                  </div>
                <input type="submit" value="Cadastre-se" name="btncadastro">
              </div>
            </div>
          </div>
        </form>
      </body>
</html>



<?php

if (!empty($_POST['btncadastro'])){
    $nome = $_POST['txtnome'];
    $email = $_POST['txtemail'];
    $senha = $_POST['txtsenha'];

    try{   
        //colcoando o arquivo de conexão para realizar a conexão
        include 'conexao.php';
        //verificando se o e-mail já existe no banco de dados
        $sqlEmail = "SELECT COUNT(*) AS total FROM usuario WHERE email_cli = '$email'";
        $resultEmail = $conn->query($sqlEmail);
        $rowEmail = $resultEmail->fetch();

        if ($rowEmail['total'] > 0){
            echo "<script>alert('E-mail já cadastrado!');</script>";
        }
        //executando a query com as variáveis
        $sql = "INSERT INTO usuario (nome_cli, email_cli, senha_cli) VALUES ('$nome','$email', '$senha')";
        $conn->exec($sql);

        //usando JavaScript para mandar alerta que o cadastro foi cnoncluido
        echo "<script>alert('Cadastrado com sucesso!');</script>";
    }

    catch(PDOException $e){
        echo $sqlEmail . "<br>" . $e->getMessage();
    }

    //encerrando a conexão com o banco de dados
    $conn = null;
    
}

?>