<?php

include_once '../../persistence/BD.php';
include_once '../../model/Venda.php';
include_once '../../persistence/VendaDAO.php';

$numPedido = $_POST['numPedido'];
$cpfVendedor = $_POST['cpfVendedor'];
$cpfCliente = $_POST['cpfCliente'];
$desconto = $_POST['desconto'];

$conn = new BD();
$conn = $conn->getConnection();

$caixa = new Venda($numPedido, $cpfVendedor, $cpfCliente, $desconto);

$vendadao = new VendaDAO();
$res = $vendadao->salvar($caixa, $conn);

if($res == TRUE) {
    header("location: ./ListarVenda.php");
} else {
    echo "Erro no cadastro! " . $conn->error;
}

?>