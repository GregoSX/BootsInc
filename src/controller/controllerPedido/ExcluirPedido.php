<?php

include_once '../../persistence/BD.php';
include_once '../../persistence/PedidoDAO.PHP';

$idPedido = $_GET['idPedido'];

$conn = new BD();
$conn = $conn->getConnection();

$pedidodao = new PedidoDAO();
$res = $pedidodao->excluirPedido($idPedido , $conn);

header("location: ./ListarPedido.php");

?>