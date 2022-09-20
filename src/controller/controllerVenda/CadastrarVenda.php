<?php

include_once '../../persistence/BD.php';
include_once '../../model/Venda.php';
include_once '../../persistence/VendaDAO.php';

$idVenda = $_POST['idVenda'];
$idPedido = $_POST['idPedido'];
$cpfCliente = $_POST['cpfCliente'];
$valorVenda = $_POST['valorVenda'];

$conn = new BD();
$conn = $conn->getConnection();

$caixa = new Venda($idVenda, $idPedido, $cpfCliente, $valorVenda);

$vendadao = new VendaDAO();
$res = $vendadao->salvar($caixa, $conn);

if($res == TRUE) {
    header("location: ./ListarVenda.php");
} else {
    echo "Erro no cadastro! " . $conn->error;
}

?>