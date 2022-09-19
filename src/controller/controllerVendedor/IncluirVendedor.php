<?php

include_once '../../persistence/BD.php';
include_once '../../model/Vendedor.php';
include_once '../../persistence/VendedorDAO.php';

$conn = new BD();
$conn = $conn->getConnection();

$vendedordao = new VendedorDAO();
$res = $vendedordao->editarVendedor($conn);

header("location: ./ListarVendedor.php");

?>