<?php

include_once '../../persistence/BD.php';
include_once '../../model/Pedido.php';
include_once '../../persistence/PedidoDAO.PHP';

$codProduto = $_POST['codProduto'];
$quantidade = $_POST['quantidade'];

$conn = new BD();
$conn = $conn->getConnection();

$pedido = new Pedido($codProduto, $quantidade);

$pedidodao = new PedidoDAO();
$res = $pedidodao->salvar($pedido, $conn);

if($res == TRUE) {
    header("location: ./ListarPedido.php");
} else {
    echo "Erro no cadastro! " . $conn->error;
}

?>