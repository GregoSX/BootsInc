<?php

class Venda {
    private $numPedido;
    private $cpfVendedor;
    private $cpfCliente;
    private $desconto;

    function __construct($numPedido, $cpfVendedor, $cpfCliente, $desconto) {
        $this->numPedido = $numPedido;
        $this->cpfVendedor = $cpfVendedor;
        $this->cpfCliente = $cpfCliente;
        $this->desconto = $desconto;
    }

    function getNumPedido() {
        return $this->numPedido;
    }

    function getCpfVendedor() {
        return $this->cpfVendedor;
    }

    function getCpfCliente() {
        return $this->cpfCliente;
    }

    function getDesconto() {
        return $this->desconto;
    }

}

?>