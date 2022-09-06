<?php

class ProdutoDAO {
    function __construct() {}

    function salvar($produto, $conn) {
        $sql = "INSERT INTO produto (codProduto, descricao, preco, tamanho, quantidadeEstoque) VALUES ('" . 
                $produto->getCodProduto() . "', '" . 
                $produto->getDescricao() . "', " . 
                $produto->getPreco() . ", " . 
                $produto->getTamanho() . " , ". 
                $produto->getQuantidadeEstoque() . ")";

        if($conn->query($sql) == TRUE) {
            echo "Produto cadastrado!";
        } else {
            echo "Erro no cadastro! " . $conn->error;
        }
    }

}

?>