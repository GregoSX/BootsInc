<?php

include_once '../../persistence/BD.php';
include_once '../../model/Vendedor.php';
include_once '../../persistence/VendedorDAO.php';

$cpf = $_POST['cpf'];
$primeiroNome = $_POST['primeiroNome'];
$sobrenome = $_POST['sobrenome'];
$endereco = $_POST['endereco'];
$salario = $_POST['salario'];
$telefone = $_POST['telefone'];
$numVendas = $_POST['numVendas'];

$conn = new BD();
$conn = $conn->getConnection();

$vendedor = new Vendedor($cpf, $primeiroNome, $sobrenome, $endereco, $salario, $telefone, $numVendas);

$vendedordao = new VendedorDAO();
$res = $vendedordao->salvar($vendedor, $conn);

if($res == TRUE) {
    header("location: ./ListarVendedor.php");
} else {
    echo "Erro no cadastro! " . $conn->error;
}

?>