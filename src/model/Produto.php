<?php

class Produto {
    private $codigo;
    private $descricao;
    private $preco;
    private $tamanho;

    function __construct($codigo, $descricao, $preco, $tamanho) {
        $this->codigo = $codigo;
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->tamanho = $tamanho;
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

}

?>