<?php

include_once '../../persistence/BD.php';
include_once '../../persistence/ProdutoDAO.PHP';

$codigo = $_GET['codigo'];

$conn = new BD();
$conn = $conn->getConnection();

$produtodao = new ProdutoDAO();
$res = $produtodao->excluirProduto($codigo , $conn);

header("location: ./ListarProduto.php");

?>