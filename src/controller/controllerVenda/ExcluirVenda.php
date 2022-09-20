<?php

include_once '../../persistence/BD.php';
include_once '../../persistence/VendaDAO.PHP';

$idVenda = $_GET['idVenda'];

$conn = new BD();
$conn = $conn->getConnection();

$vendadao = new VendaDAO();
$res = $vendadao->excluirVenda($idVenda , $conn);

header("location: ./ListarVenda.php");

?>