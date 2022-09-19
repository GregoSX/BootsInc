<?php

include_once '../../persistence/BD.php';
include_once '../../model/Caixa.php';
include_once '../../persistence/CaixaDAO.php';

$cpf = $_POST['cpf'];
$primeiroNome = $_POST['primeiroNome'];
$sobrenome = $_POST['sobrenome'];
$endereco = $_POST['endereco'];
$salario = $_POST['salario'];
$telefone = $_POST['telefone'];
$numCaixa = $_POST['numCaixa'];

$conn = new BD();
$conn = $conn->getConnection();

$caixa = new Caixa($cpf, $primeiroNome, $sobrenome, $endereco, $salario, $telefone, $numCaixa);

$caixadao = new CaixaDAO();
$res = $caixadao->salvar($caixa, $conn);

if($res == TRUE) {
    header("location: ./ListarCaixa.php");
} else {
    echo "Erro no cadastro! " . $conn->error;
}

?>