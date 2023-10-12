<h2>LIsta de Produtos</h2>

<?php

include 'conexao.php';

// Prepara a consulta SQL para obter todos os produtos
$sqlListar = $conn->prepare("SELECT * FROM produto");

// Executa a consulta
if ($sqlListar->execute()) {
  while ($produto = $sqlListar->fetch(PDO::FETCH_ASSOC)) {
    echo '<h2>' . $produto['nomeProduto'] . '</h2>';
    echo '<p>' . $produto['descricaoProduto'] . '</p>';
    echo '<p>R$ ' . number_format($produto['vlProduto'], 2, ',', '.') . '</p>';
    echo '<img src="' . $produto['imgLink'] . '" alt="' . $produto['nomeProduto'] . '">';
  }
} else {
  echo "Não foi possível obter os produtos";
}
?>