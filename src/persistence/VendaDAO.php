<?php

include_once 'VendedorDAO.php';
include_once 'ClienteDAO.php';
include_once 'ProdutoDAO.php';
include_once 'PedidoDAO.php';

class VendaDAO {
    function __construct() {}

    function salvar($venda, $conn) {
        $sql = "INSERT INTO venda (numPedido, cpfVendedor, cpfCliente, desconto) VALUES ('" .
                $venda->getNumPedido() . "', '" .
                $venda->getCpfVendedor() . "', '" .
                $venda->getCpfCliente() . "', '" .
                $venda->getDesconto() . "')";
        $res = $conn->query($sql);
        $this->calcularValor($venda, $conn);
        $this->incrementarCompraCliente($venda, $conn);
        return $res;
    }

    function getValorPedido($venda, $conn) {
        $valor = 0;
        $pedidodao = new PedidoDAO();
        $res = $pedidodao->listarPedido($conn);
        while($linha = $res->fetch_assoc()) {
            if ($linha['numPedido'] == $venda->getNumPedido()){
                $valor = $linha['valor'];
            }
        }
        return $valor;
    }

    function calcularValor($venda, $conn) {
        $valor = $this->getValorPedido($venda, $conn);
        echo($preco);
        $sql = "UPDATE venda v, pedido p " .
               "SET v.valor = p.valor - p.valor * 0.01 * '" .
                    $venda->getDesconto() . "' " .
               "WHERE p.numero = '" . $venda->getnumPedido() . "'";
        $res = $conn->query($sql);
        return $res;
    }

    function getCPFCliente($numero, $conn) {
        $cpf = 0;
        $vendadao = new vendaDAO();
        $res = $vendadao->listarVenda($conn);
        while($linha = $res->fetch_assoc()) {
            if ($linha['numero'] == $numero){
                $cpf = $linha['cpfCliente'];
            }
        }
        return $cpf;
    }

    function incrementarCompraCliente($venda, $conn) {
        $sql = "UPDATE cliente c " .
               "SET c.numCompras = c.numCompras + 1 " .
               "WHERE c.cpf = '" . $venda->getCpfCliente() . "'";
        $res = $conn->query($sql);
        return $res;
    }

    function decrementarCompraCliente($numero, $conn) {
        $cpf = $this->getCPFCliente($numero, $conn);
        $sql = "UPDATE cliente c " .
               "SET c.numCompras = c.numCompras - 1 " .
               "WHERE c.cpf = '" . $cpf . "'";
        $res = $conn->query($sql);
        return $res;
    }

    function listarVenda($conn) {
        $sql = "SELECT * from venda ";
        $res = $conn->query($sql);
        return $res;
    }

    function excluirVenda($numero, $conn) {
        $this->decrementarCompraCliente($numero, $conn);
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