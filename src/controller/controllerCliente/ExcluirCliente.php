<?php

include_once '../../persistence/BD.php';
include_once '../../persistence/ClienteDAO.PHP';

$cpf = $_GET['cpf'];

$conn = new BD();
$conn = $conn->getConnection();

$clientedao = new ClienteDAO();
$res = $clientedao->excluirCliente($cpf , $conn);

header("location: ./ListarCliente.php");

?>