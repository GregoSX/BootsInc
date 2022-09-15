<?php

include_once '../../persistence/BD.php';
include_once '../../model/Cliente.php';
include_once '../../persistence/ClienteDAO.PHP';

$idCliente = $_POST['idCliente'];
$cpf = $_POST['cpf'];
$primeiroNome = $_POST['primeiroNome'];
$sobrenome = $_POST['sobrenome'];
$nasc = $_POST['nasc'];

$conn = new BD();
$conn = $conn->getConnection();

$cliente = new Cliente($idCliente, $cpf, $primeiroNome, $sobrenome, $nasc);

$clientedao = new ClienteDAO();
$res = $clientedao->salvar($cliente, $conn);

if($res == TRUE) {
    header("location: ./ListarCliente.php");
} else {
    echo "Erro no cadastro! " . $conn->error;
}

?>