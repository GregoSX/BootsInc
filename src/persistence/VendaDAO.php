<?php

class VendaDAO {
    function __construct() {}

    function salvar($venda, $conn) {
        $sql = "INSERT INTO venda (idVenda, idPedido, cpfCliente, valorVenda) VALUES ('" . 
                $venda->getIdVenda() . "', '" . 
                $venda->getIdPedido() . "', '" . 
                $venda->getCpfCliente() . "', '" . 
                $venda->getValorVenda() . "')";
        $res = $conn->query($sql);
        return $res;
    }

    function listarVenda($conn) {
        $sql = "SELECT * from venda ";
        $res = $conn->query($sql);
        return $res;
    }

    function excluirVenda($idVenda, $conn) {
        $sql = "DELETE FROM venda WHERE idVenda = $idVenda";
        $res = $conn->query($sql);
        return $res;
    }

    function editarVenda($conn) {
        $sql = "SELECT idVenda FROM venda WHERE idVenda=".$_POST["idVenda"];
        $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)!=0){
                $sql = "UPDATE venda
                        SET 
                            valorVenda='"       .$_POST["valorVenda"]."'
                            WHERE idVenda=".$_POST["idVenda"];
        }
        mysqli_query($conn, $sql);
    }

}

?>