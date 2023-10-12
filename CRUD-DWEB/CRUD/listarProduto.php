<h2>LIsta de Produtos</h2>

<?php

include 'conexao.php';

// Prepara a consulta SQL para obter todos os produtos
$sqlListar = $conn->prepare("SELECT * FROM produto");

// Executa a consulta
if ($sqlListar->execute()) {
  while ($produto = $sqlListar->fetch(PDO::FETCH_ASSOC)) {
    echo '<h2>Nome do Produto: ' . $produto['nomeProduto'] . '</h2>';
    echo '<p>Id do Produto: ' . $produto['idProduto'] . '</p>';
    echo '<p>Descrição do Produto: ' . $produto['descricaoProduto'] . '</p>';
    echo '<p>Valor do Produto: R$ ' . number_format($produto['vlProduto'], 2, ',', '.') . '</p>';
    echo '<img src="' . $produto['imgLink'] . '" alt="' . $produto['nomeProduto'] . '"><br><br>';
  }
} else {
  echo "Não foi possível obter os produtos";
}
 //encerrando a conexão com o banco de dados
$conn = null;

?>