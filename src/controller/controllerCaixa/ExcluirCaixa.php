<?php

include_once '../../persistence/BD.php';
include_once '../../persistence/CaixaDAO.php';

$cpf = $_GET['cpf'];

$conn = new BD();
$conn = $conn->getConnection();

$caixadao = new CaixaDAO();
$res = $caixadao->excluirCaixa($cpf , $conn);

header("location: ./ListarCaixa.php");

?>