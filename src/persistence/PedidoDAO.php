<?php

include 'ProdutoDAO.php';

class PedidoDAO {
    function __construct() {}

    function salvar($pedido, $conn) {
        $sql = "INSERT INTO pedido (codProduto, quantidade) VALUES ('" .
                $pedido->getCodProduto() . "', " .
                $pedido->getQuantidade() . ");";
        $res = $conn->query($sql);
        $this->calcularValor($pedido, $conn);
        return $res;
    }

    function calcularValor($pedido, $conn) {
        $preco = $this->getPrecoProduto($pedido, $conn);
        echo($preco);
        $sql = "UPDATE pedido p, produto s " .
               "SET p.valor = p.quantidade * '" . $preco . "' " .
               "WHERE p.codProduto = '" . $pedido->getCodProduto() . "'";
        $res = $conn->query($sql);
        return $res;
    }

    function getPrecoProduto($pedido, $conn) {
        $preco = 0;
        $produtodao = new ProdutoDAO();
        $res = $produtodao->listarProduto($conn);
        while($linha = $res->fetch_assoc()) {
            if ($linha['codigo'] == $pedido->getCodProduto()){
                $preco = $linha['preco'];
            }
        }
        return $preco;
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