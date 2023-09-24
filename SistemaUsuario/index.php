<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h1>Cadastre-se</h1>
    <form method="post" action="#">
        <label>Nome:</label>
        <input type="text" name="txtnome" maxlength="45">
        <br>
        <label>E-mail:</label>
        <input type="email" name="txtemail"  maxlength="50">
        <br>
        <label>CPF/CNPJ:</label>
        <input type="password" name="txtcpf">
        <br>
        <input type="submit" value="Cadastrar" name="btncadastro">
    </form>
</body>
</html>

<?php

if (!empty($_POST['btncadastro'])){
    $nome = $_POST['txtnome'];
    $email = $_POST['txtemail'];
    $cpf = $_POST['txtcpf'];

    try{
        //colcoando o arquivo de conexão para realizar a conexão
        include 'conexao.php';
        //executando a query com as variáveis
        $sql = "INSERT INTO dadosclientes (nm_nome_cliente, nm_email_cliente, cd_cpf_cliente) VALUES ('$nome','$email', '$cpf')";
        $result = $conn->query($sql);

        //usando JavaScript para mandar alerta que o cadastro foi cnoncluido
        echo "<script>alert('Cadastrado com sucesso!');</script>";
    }

    catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }

    //encerrando a conexão com o banco de dados
    $conn = null;
    
}

?>


