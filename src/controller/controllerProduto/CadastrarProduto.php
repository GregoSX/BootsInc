<?php

include_once '../../persistence/BD.php';
include_once '../../model/Produto.php';
include_once '../../persistence/ProdutoDAO.PHP';

$codigo = $_POST['codigo'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$tamanho = $_POST['tamanho'];
$quantidadeEstoque = $_POST['quantidadeEstoque'];

$conn = new BD();
$conn = $conn->getConnection();

$prod = new Produto($codigo, $descricao, $preco, $tamanho, $quantidadeEstoque);

$produtodao = new ProdutoDAO();
$res = $produtodao->salvar($prod, $conn);

if($res == TRUE) {
    header("location: ./ListarProduto.php");
} else {
    echo "Erro no cadastro! " . $conn->error;
}

?>