<?php

class PedidoDAO {
    function __construct() {}

    function salvar($pedido, $conn) {
        $sql = "INSERT INTO pedido (codProduto, quantidade) VALUES ('" .
                $pedido->getCodProduto() . "', " .
                $pedido->getQuantidade() . ");";
        $res = $conn->query($sql);
        return $res;
    }

    function listarPedido($conn) {
        $sql = "SELECT * from pedido ";
        $res = $conn->query($sql);
        return $res;
    }

    function excluirPedido($numero, $conn) {
        $sql = "DELETE FROM pedido WHERE numero = $numero";
        $res = $conn->query($sql);
        return $res;
    }

    function editarPedido($conn) {
        $sql = "SELECT numero FROM pedido WHERE numero=".$_POST["numero"];
        $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)!=0){
                $sql = "UPDATE pedido
                        SET
                            quantidade='"   .$_POST["quantidade"]."'
                            WHERE numero=".$_POST["numero"];
        }
        mysqli_query($conn, $sql);
    }

}

?>