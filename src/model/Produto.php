<?php

class Produto {
    private $codProduto;
    private $descricao;
    private $preco;
    private $tamanho;
    private $quantidadeEstoque;

    function __construct($codProduto, $descricao, $preco, $tamanho, $quantidadeEstoque) {
        $this->codProduto = $codProduto;
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->tamanho = $tamanho;
        $this->quantidadeEstoque = $quantidadeEstoque;
    }

    function getCodProduto() {
        return $this->codProduto;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getPreco() {
        return $this->preco;
    }

    function getTamanho() {
        return $this->tamanho;
    }

    function getQuantidadeEstoque() {
        return $this->quantidadeEstoque;
    }
}

?>