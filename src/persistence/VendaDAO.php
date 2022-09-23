<?php

include_once 'VendedorDAO.php';
include_once 'ClienteDAO.php';
include_once 'ProdutoDAO.php';
include_once 'PedidoDAO.php';
include_once 'VendedorDAO.php';

class VendaDAO {
    function __construct() {}

    function salvar($venda, $conn) {
        $sql = "INSERT INTO venda (numPedido, cpfVendedor, cpfCliente, valorPedido, desconto) VALUES ('" .
                $venda->getNumPedido() . "', '" .
                $venda->getCpfVendedor() . "', '" .
                $venda->getCpfCliente() . "', '" .
                $this->getValorPedido($venda, $conn) . "', '" .
                $venda->getDesconto() . "')";
        $res = $conn->query($sql);
        $this->efetivarPedido($venda, $conn);
        $this->incrementarCompraCliente($venda, $conn);
        $this->incrementarVendaVendedor($venda, $conn);
        $this->calcularValorVenda($venda, $conn);
        return $res;
    }

    function efetivarPedido($venda, $conn) {
        $sql = "UPDATE pedido p " .
               "SET p.status = 'Efetuado'" .
               "WHERE p.numero = '" . $venda->getnumPedido() . "'";
        $res = $conn->query($sql);
        return $res;
    }

    function desafetivarPedido($numero, $conn) {
        $numPedido = $this->getNumPedido($numero, $conn);
        $sql = "UPDATE pedido p " .
               "SET p.status = 'Pendente'" .
               "WHERE p.numero = '" . $numPedido . "'";
        $res = $conn->query($sql);
        return $res;
    }

    function getNumPedido($numero, $conn) {
        $numPedido = 0;
        $vendadao = new vendaDAO();
        $res = $vendadao->listarVenda($conn);
        while($linha = $res->fetch_assoc()) {
            if ($linha['numero'] == $numero){
                $numPedido = $linha['numPedido'];
            }
        }
        return $numPedido;
    }

    function getValorPedido($venda, $conn) {
        $valorPedido = 0;
        $pedidodao = new PedidoDAO();
        $res = $pedidodao->listarPedido($conn);
        while($linha = $res->fetch_assoc()) {
            if ($linha['numero'] == $venda->getNumPedido()){
                $valorPedido = $linha['valor'];
            }
        }
        return $valorPedido;
    }

    function calcularValorVenda($venda, $conn) {
        $valorPedido = $this->getValorPedido($venda, $conn);
        $sql = "UPDATE venda v, pedido p " .
               "SET v.valorVenda = v.valorPedido - v.valorPedido * 0.01 * '" .
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

    function getCPFVendedor($numero, $conn) {
        $cpf = 0;
        $vendadao = new vendaDAO();
        $res = $vendadao->listarVenda($conn);
        while($linha = $res->fetch_assoc()) {
            if ($linha['numero'] == $numero){
                $cpf = $linha['cpfVendedor'];
            }
        }
        return $cpf;
    }

    function incrementarVendaVendedor($venda, $conn) {
        $sql = "UPDATE vendedor v " .
               "SET v.numVendas = v.numVendas + 1 " .
               "WHERE v.cpf = '" . $venda->getCpfVendedor() . "'";
        $res = $conn->query($sql);
        return $res;
    }

    function decrementarVendaVendedor($numero, $conn) {
        $cpf = $this->getCPFVendedor($numero, $conn);
        $sql = "UPDATE vendedor v " .
               "SET v.numVendas = v.numVendas - 1 " .
               "WHERE v.cpf = '" . $cpf . "'";
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
        $this->decrementarVendaVendedor($numero, $conn);
        $this->desafetivarPedido($numero, $conn);
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
                        valorVenda = venda.valorPedido - venda.valorPedido * 0.01 * '" . $_POST["desconto"] . "',
                        desconto='" . $_POST["desconto"] . "'
                    WHERE numero = '" . $_POST["numero"] . "'";
        }
        mysqli_query($conn, $sql);
    }

}

?>