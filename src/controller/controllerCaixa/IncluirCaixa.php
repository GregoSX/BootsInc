<?php

include_once '../../persistence/BD.php';
include_once '../../model/Caixa.php';
include_once '../../persistence/CaixaDAO.php';

$conn = new BD();
$conn = $conn->getConnection();

$caixadao = new CaixaDAO();
$res = $caixadao->editarCaixa($conn);

header("location: ./ListarCaixa.php");

?>