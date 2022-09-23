<?php

include_once 'ProdutoDAO.php';

class PedidoDAO {
    function __construct() {}

    function salvar($pedido, $conn) {
        $sql = "INSERT INTO pedido (codProduto, quantidade) VALUES ('" .
                $pedido->getCodProduto() . "', " .
                $pedido->getQuantidade() . ");";
        $res = $conn->query($sql);
        $this->calcularValor($pedido, $conn);
        $this->decrementarQuantidadeProduto($pedido, $conn);
        return $res;
    }


    function decrementarQuantidadeProduto($pedido, $conn) {
        $sql = "UPDATE produto p " .
               "SET p.quantidadeEstoque = p.quantidadeEstoque - '" . $pedido->getQuantidade() . "'" .
               "WHERE p.codigo = '" . $pedido->getCodProduto() . "'";
        $res = $conn->query($sql);
        return $res;
    }

    function getCodProduto($numero, $conn) {
        $codigo = 0;
        $pedidodao = new pedidoDAO();
        $res = $pedidodao->listarPedido($conn);
        while($linha = $res->fetch_assoc()) {
            if ($linha['numero'] == $numero){
                $codigo = $linha['codProduto'];
            }
        }
        return $codigo;
    }

    function getQuantidadePedida($numero, $conn) {
        $quantidade = 0;
        $pedidodao = new pedidoDAO();
        $res = $pedidodao->listarPedido($conn);
        while($linha = $res->fetch_assoc()) {
            if ($linha['numero'] == $numero){
                $quantidade = $linha['quantidade'];
            }
        }
        return $quantidade;
    }

    function incrementarQuantidadeProduto($numero, $conn) {
        $codigo = $this-> getCodProduto($numero, $conn);
        $quantidade = $this->getQuantidadePedida($numero, $conn);
        $sql = "UPDATE produto p " .
               "SET p.quantidadeEstoque = p.quantidadeEstoque + '" . $quantidade . "' " .
               "WHERE p.codigo = '" . $codigo . "'";
        $res = $conn->query($sql);
        return $res;
    }

    function calcularValor($pedido, $conn) {
        $preco = $this->getPrecoProduto($pedido, $conn);
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
        $this->incrementarQuantidadeProduto($numero, $conn);
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