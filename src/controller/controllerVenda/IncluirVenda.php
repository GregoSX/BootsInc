<?php

include_once '../../persistence/BD.php';
include_once '../../model/Venda.php';
include_once '../../persistence/VendaDAO.php';

$conn = new BD();
$conn = $conn->getConnection();

$vendadao = new VendaDAO();
$res = $vendadao->editarVenda($conn);

header("location: ./ListarVenda.php");

?>