<?php

include_once '../../persistence/BD.php';
include_once '../../model/Pedido.php';
include_once '../../persistence/PedidoDAO.PHP';

$idProduto = $_POST['idProduto'];
$quantidade = $_POST['quantidade'];
$precoVendido = $_POST['precoVendido'];
$statusPedido = $_POST['statusPedido'];

$conn = new BD();
$conn = $conn->getConnection();

$pedido = new Pedido($idProduto, $quantidade, $precoVendido, $statusPedido);

$pedidodao = new PedidoDAO();
$res = $pedidodao->salvar($pedido, $conn);

if($res == TRUE) {
    header("location: ./ListarPedido.php");
} else {
    echo "Erro no cadastro! " . $conn->error;
}

?>