<?php

class Pedido {
    private $idPedido;
    private $idProduto;
    private $quantidade;
    private $precoVendido;

    function __construct($idPedido, $idProduto, $quantidade, $precoVendido) {
        $this->idPedido = $idPedido;
        $this->idProduto = $idProduto;
        $this->quantidade = $quantidade;
        $this->precoVendido = $precoVendido;
    }

    function getIdPedido() {
        return $this->idPedido;
    }

    function getIdProduto() {
        return $this->idProduto;
    }

    function getQuantidade() {
        return $this->quantidade;
    }

    function getPrecoVendido() {
        return $this->precoVendido;
    }
}

?>