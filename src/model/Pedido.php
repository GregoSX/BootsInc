<?php

class Pedido {
    private $idPedido;
    private $idProduto;
    private $quantidade;
    private $precoVendido;
    private $statusPedido;

    function __construct($idPedido, $idProduto, $quantidade, $precoVendido, $statusPedido) {
        $this->idPedido = $idPedido;
        $this->idProduto = $idProduto;
        $this->quantidade = $quantidade;
        $this->precoVendido = $precoVendido;
        $this->statusPedido = $statusPedido;
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

    function getStatusPedido() {
        return $this->statusPedido;
    }

}

?>