<?php

include_once '../../persistence/BD.php';
include_once '../../persistence/ClienteDAO.PHP';

$idCliente = $_GET['idCliente'];

$conn = new BD();
$conn = $conn->getConnection();

$clientedao = new ClienteDAO();
$res = $clientedao->excluirCliente($idCliente , $conn);

header("location: ./ListarCliente.php");

?>