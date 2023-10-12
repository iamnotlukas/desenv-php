<h2>LIsta de Produtos</h2>
<link rel="stylesheet" href="index.css">
<?php

include 'conexao.php';

// Prepara a consulta SQL para obter todos os produtos
$sqlListar = $conn->prepare("SELECT * FROM produto");

// Executa a consulta
if ($sqlListar->execute()) {
  while ($produto = $sqlListar->fetch(PDO::FETCH_ASSOC)) {
    echo '<h2>Nome do Produto:<span> ' . $produto['nomeProduto'] . '</span></h2>';
    echo '<p>Id do Produto: <span> ' . $produto['idProduto'] . '</span></p>';
    echo '<p>Descrição do Produto:<span> ' . $produto['descricaoProduto'] . '</span></p>';
    echo '<p>Valor do Produto: <span>R$ ' . number_format($produto['vlProduto'], 2, ',', '.') . '</span></p>';
    echo '<img style="width: 300px;" src="' . $produto['imgLink'] . '" alt="' . $produto['nomeProduto'] . '"><br><br>';
  }
} else {
  echo "Não foi possível obter os produtos";
}
 //encerrando a conexão com o banco de dados
$conn = null;

?>

<a href="index.php">
    <input type="button" value="Tela de Gestão">
</a>