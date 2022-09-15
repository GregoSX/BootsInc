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

    function editarProduto($conn) {
        $sql = "SELECT codProduto FROM produto WHERE codProduto=".$_POST["codProduto"];
        $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)!=0){
                $sql = "UPDATE produto
                        SET codProduto         ='".$_POST["codProduto"]."',
                            descricao='".$_POST["descricao"]."',
                            preco='"   .$_POST["preco"]."',
                            tamanho='"       .$_POST["tamanho"]."',
                            quantidadeEstoque='"       .$_POST["quantidadeEstoque"]."'
                            WHERE codProduto=".$_POST["codProduto"];
        }
        mysqli_query($conn, $sql);
    }

}

?>