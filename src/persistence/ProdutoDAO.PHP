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
        $res = $conn->query($sql);
        return $res;
    }

    function listarProduto($conn) {
        $sql = "SELECT * from produto ";
        $res = $conn->query($sql);
        return $res;
    }

    function excluirProduto($codProduto, $conn) {
        $sql = "DELETE FROM produto WHERE codProduto = $codProduto";
        $res = $conn->query($sql);
        return $res;
    }

    function editarProduto($codProduto, $conn) {
        $sql = "SELECT produto.*
                FROM produto
                WHERE codProduto = $codProduto";
        $result = mysqli_query($conn, $sql);
        $vetor = mysqli_fetch_array($result, MYSQLI_ASSOC);
        mysqli_close($conn);
    }

}

?>