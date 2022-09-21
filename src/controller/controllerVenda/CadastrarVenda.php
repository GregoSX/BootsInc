<?php

include_once '../../persistence/BD.php';
include_once '../../model/Venda.php';
include_once '../../persistence/VendaDAO.php';

$idPedido = $_POST['idPedido'];
$cpfVendedor = $_POST['cpfVendedor'];
$cpfCliente = $_POST['cpfCliente'];
$valorVenda = $_POST['valorVenda'];

$conn = new BD();
$conn = $conn->getConnection();

$caixa = new Venda($idPedido, $cpfVendedor, $cpfCliente, $valorVenda);

$vendadao = new VendaDAO();
$res = $vendadao->salvar($caixa, $conn);

if($res == TRUE) {
    header("location: ./ListarVenda.php");
} else {
    echo "Erro no cadastro! " . $conn->error;
}

?>