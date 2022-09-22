<?php

class Pedido {
    private $codProduto;
    private $quantidade;

    function __construct($codProduto, $quantidade) {
        $this->codProduto = $codProduto;
        $this->quantidade = $quantidade;
    }

    function getCodProduto() {
        return $this->codProduto;
    }

    function getQuantidade() {
        return $this->quantidade;
    }

}

?>