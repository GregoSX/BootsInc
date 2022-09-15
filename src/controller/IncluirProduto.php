<?php

include_once '../persistence/BD.php';

include_once '../persistence/BD.php';
include_once '../model/Produto.php';
include_once '../persistence/ProdutoDAO.PHP';

$conn = new BD();
$conn = $conn->getConnection();

$produtodao = new ProdutoDAO();
$res = $produtodao->editarProtudo($conn);

header("location: ./ListarProduto.php");

?>