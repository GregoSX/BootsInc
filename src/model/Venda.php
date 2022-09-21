<?php

class Venda {
    private $idPedido;
    private $cpfVendedor;
    private $cpfCliente;
    private $valorVenda;

    function __construct($idPedido, $cpfVendedor, $cpfCliente, $valorVenda) {
        $this->idPedido = $idPedido;
        $this->cpfVendedor = $cpfVendedor;
        $this->cpfCliente = $cpfCliente;
        $this->valorVenda = $valorVenda;
    }

    function getIdPedido() {
        return $this->idPedido;
    }

    function getCpfVendedor() {
        return $this->cpfVendedor;
    }

    function getCpfCliente() {
        return $this->cpfCliente;
    }

    function getValorVenda() {
        return $this->valorVenda;
    }
}

?>