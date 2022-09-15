<?php

include_once '../../persistence/BD.php';
include_once '../../model/Cliente.php';
include_once '../../persistence/ClienteDAO.PHP';

$conn = new BD();
$conn = $conn->getConnection();

$clientedao = new ClienteDAO();
$res = $clientedao->editarCliente($conn);

header("location: ./ListarCliente.php");

?>