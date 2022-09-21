<?php

class PedidoDAO {
    function __construct() {}

    function salvar($pedido, $conn) {
        $sql = "INSERT INTO pedido (idProduto, quantidade, precoVendido) VALUES ('" .
                $pedido->getIdProduto() . "', " .
                $pedido->getQuantidade() . ", " .
                $pedido->getPrecoVendido() . ")";
        $res = $conn->query($sql);
        return $res;
    }

    function listarPedido($conn) {
        $sql = "SELECT * from pedido ";
        $res = $conn->query($sql);
        return $res;
    }

    function excluirPedido($idPedido, $conn) {
        $sql = "DELETE FROM pedido WHERE idPedido = $idPedido";
        $res = $conn->query($sql);
        return $res;
    }

    function editarPedido($conn) {
        $sql = "SELECT idPedido FROM pedido WHERE idPedido=".$_POST["idPedido"];
        $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)!=0){
                $sql = "UPDATE pedido
                        SET
                            quantidade='"   .$_POST["quantidade"]."',
                            precoVendido='"       .$_POST["precoVendido"]."'
                            WHERE idPedido=".$_POST["idPedido"];
        }
        mysqli_query($conn, $sql);
    }

}

?>