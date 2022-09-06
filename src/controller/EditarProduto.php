<?php

include_once '../persistence/BD.php';
include_once '../persistence/ProdutoDAO.PHP';

$codProduto = $_GET['codProduto'];

$conn = new BD();
$conn = $conn->getConnection();

$produtodao = new ProdutoDAO();
$res = $produtodao->editarProduto($codProduto , $conn);

header("location: ./ListarProduto.php");

?>