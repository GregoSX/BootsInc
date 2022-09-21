<?php

class Produto {
    private $codigo;
    private $descricao;
    private $preco;
    private $tamanho;
    private $quantidadeEstoque;

    function __construct($codigo, $descricao, $preco, $tamanho, $quantidadeEstoque) {
        $this->codigo = $codigo;
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->tamanho = $tamanho;
        $this->quantidadeEstoque = $quantidadeEstoque;
    }

    function getCodProduto() {
        return $this->codigo;
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