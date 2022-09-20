<?php

class Venda {
    private $idVenda;
    private $idPedido;
    private $cpfCliente;
    private $valorVenda;

    function __construct($idVenda, $idPedido, $cpfCliente, $valorVenda) {
        $this->idVenda = $idVenda;
        $this->idPedido = $idPedido;
        $this->cpfCliente = $cpfCliente;
        $this->valorVenda = $valorVenda;
    }

    function getIdVenda() {
        return $this->idVenda;
    }

    function getIdPedido() {
        return $this->idPedido;
    }

    function getCpfCliente() {
        return $this->cpfCliente;
    }

    function getValorVenda() {
        return $this->valorVenda;
    }
}

?>