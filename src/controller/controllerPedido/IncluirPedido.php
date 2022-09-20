<?php

include_once '../../persistence/BD.php';
include_once '../../model/Pedido.php';
include_once '../../persistence/PedidoDAO.PHP';

$conn = new BD();
$conn = $conn->getConnection();

$pedidodao = new PedidoDAO();
$res = $pedidodao->editarPedido($conn);

header("location: ./ListarPedido.php");

?>