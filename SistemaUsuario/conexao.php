<?php
    $hostname = "localhost";
    $bancodedados = "clientes";
    $usuario = "root";
    $senha = "";

    $conn = new mysqli($hostname, $usuario, $senha, $bancodedados);
    if ($conn->connect_errno) {
        echo "falha ao conectar:(" . $conn->connect_errno . ")" . $conn->connect_errno;
    }
    else
        echo "Conectado ao Banco de Dados";

?>