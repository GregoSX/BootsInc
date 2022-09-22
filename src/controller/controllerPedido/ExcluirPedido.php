<?php

include_once '../../persistence/BD.php';
include_once '../../persistence/PedidoDAO.PHP';

$numero = $_GET['numero'];

$conn = new BD();
$conn = $conn->getConnection();

$pedidodao = new PedidoDAO();
$res = $pedidodao->excluirPedido($numero , $conn);

header("location: ./ListarPedido.php");

?>