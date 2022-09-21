<?php

class Pedido {
    private $idProduto;
    private $quantidade;
    private $precoVendido;
    private $statusPedido;

    function __construct($idProduto, $quantidade, $precoVendido, $statusPedido) {
        $this->idProduto = $idProduto;
        $this->quantidade = $quantidade;
        $this->precoVendido = $precoVendido;
        $this->statusPedido = $statusPedido;
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

    function getStatusPedido() {
        return $this->statusPedido;
    }

}

?>