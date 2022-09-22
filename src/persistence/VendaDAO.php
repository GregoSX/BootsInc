<?php

class VendaDAO {
    function __construct() {}

    function salvar($venda, $conn) {
        $sql = "INSERT INTO venda (numPedido, cpfVendedor, cpfCliente, desconto) VALUES ('" .
                $venda->getNumPedido() . "', '" .
                $venda->getCpfVendedor() . "', '" .
                $venda->getCpfCliente() . "', '" .
                $venda->getDesconto() . "')";
        $res = $conn->query($sql);
        return $res;
    }

    function listarVenda($conn) {
        $sql = "SELECT * from venda ";
        $res = $conn->query($sql);
        return $res;
    }

    function excluirVenda($numero, $conn) {
        $sql = "DELETE FROM venda WHERE numero = $numero";
        $res = $conn->query($sql);
        return $res;
    }

    function editarVenda($conn) {
        $sql = "SELECT numero FROM venda WHERE numero=".$_POST["numero"];
        $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)!=0){
                $sql = "UPDATE venda
                        SET
                            desconto='"       .$_POST["desconto"]."'
                            WHERE numero=".$_POST["numero"];
        }
        mysqli_query($conn, $sql);
    }

}

?>