<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>
    <div class="main-login">
        <div class="left-login">
            <h1>Faça login<br>E entre no sistema</h1>
            <img src="Login-rafiki.svg" class="left-login-image" alt="personagem animação">
        </div>
        <form method="post" action="#">

          <div class="right-login">
            <div class="card-login">
              <h1>Login</h1>
              <div class="textfield">
                <label for="nm_cli">Usuário</label>
                <input type="text" name="nm_cli" id="nm_cli" placeholder="Usuário">
                </div>
                <div class="textfield">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha_cli" id="senha_cli" placeholder="Senha">
                  </div>
                  <div class="lembrar-me">
                    <input type="checkbox" name="lembrar">
                    <label for="lembrar">Lembrar-me</label>
                </div>
                <input type="submit" value="Login">
              </div>
            </div>
          </div>
        </form>
      </body>
</html>


<?php
    // Iniciar a sessão
    session_start();
    // Verificar se o formulário foi submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obter o nome do usuário e a senha do formulário
        $nomeUsuario = $_POST["nm_cli"];
        $senhaUsuario = $_POST["senha_cli"];

        $senhaArmazenada = $usuario["senha_cli"];


        include 'conexao.php';

        // Buscar o usuário no banco de dados
        $comando = $conn->prepare("SELECT * FROM usuario WHERE nome_cli = :nm_cli");
        $comando->bindParam(":nm_cli", $nm_cli);
        $comando->execute();
        $usuario = $comando->fetch(PDO::FETCH_ASSOC);
        // Verificar se o usuário existe e a senha está correta
        if ($senhaEnviada == $senhaArmazenada) {
            // Iniciar a sessão
            $_SESSION["nm_cli"] = $usuario["nm_cli"];
            // Redirecionar para a página inicial
            header("Location: index.php");
            exit;
        } else {
            // Exibir uma mensagem de erro
            echo "Nome de usuário ou senha inválidos.";
        }
    }
    ?>

