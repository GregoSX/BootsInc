<?php

include_once '../../persistence/BD.php';
include_once '../../persistence/VendaDAO.PHP';

$numero = $_GET['numero'];

$conn = new BD();
$conn = $conn->getConnection();

$vendadao = new VendaDAO();
$res = $vendadao->excluirVenda($numero , $conn);

header("location: ./ListarVenda.php");

?>