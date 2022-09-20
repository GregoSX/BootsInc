<?php

include_once '../../persistence/BD.php';
include_once '../../model/Pedido.php';
include_once '../../persistence/PedidoDAO.PHP';

$idPedido = $_POST['idPedido'];
$idProduto = $_POST['idProduto'];
$quantidade = $_POST['quantidade'];
$precoVendido = $_POST['precoVendido'];

$conn = new BD();
$conn = $conn->getConnection();

$pedido = new Pedido($idPedido, $idProduto, $quantidade, $precoVendido);

$pedidodao = new PedidoDAO();
$res = $pedidodao->salvar($pedido, $conn);

if($res == TRUE) {
    header("location: ./ListarPedido.php");
} else {
    echo "Erro no cadastro! " . $conn->error;
}

?>