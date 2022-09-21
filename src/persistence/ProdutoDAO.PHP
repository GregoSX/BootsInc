<?php

class ProdutoDAO {
    function __construct() {}

    function salvar($produto, $conn) {
        $sql = "INSERT INTO produto (codigo, descricao, preco, tamanho, quantidadeEstoque) VALUES ('" .
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

    function excluirProduto($codigo, $conn) {
        $sql = "DELETE FROM produto WHERE codigo = $codigo";
        $res = $conn->query($sql);
        return $res;
    }

    function editarProduto($conn) {
        $sql = "SELECT codigo FROM produto WHERE codigo =".$_POST["codigo"];
        $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)!=0){
                $sql = "UPDATE produto
                        SET codigo         ='".$_POST["codigo"]."',
                            descricao='".$_POST["descricao"]."',
                            preco='"   .$_POST["preco"]."',
                            tamanho='"       .$_POST["tamanho"]."',
                            quantidadeEstoque='"       .$_POST["quantidadeEstoque"]."'
                            WHERE codigo=".$_POST["codigo"];
        }
        mysqli_query($conn, $sql);
    }

}

?>