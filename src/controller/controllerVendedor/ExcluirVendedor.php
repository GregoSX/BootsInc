<?php

include_once '../../persistence/BD.php';
include_once '../../persistence/VendedorDAO.php';

$cpf = $_GET['cpf'];

$conn = new BD();
$conn = $conn->getConnection();

$vendedordao = new VendedorDAO();
$res = $vendedordao->excluirVendedor($cpf , $conn);

header("location: ./ListarVendedor.php");

?>