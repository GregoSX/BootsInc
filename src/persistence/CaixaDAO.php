<?php

class CaixaDAO {
    function __construct() {}

    function salvar($caixa, $conn) {
        $sql = "INSERT INTO caixa (cpf, primeiroNome, sobrenome, endereco, salario, telefone, numCaixa) VALUES ('" . 
                $caixa->getCpf() . "', '" .
                $caixa->getPrimeiroNome() . "', '" . 
                $caixa->getSobrenome() . "' , '".
                $caixa->getEndereco() . "' , '".
                $caixa->getSalario() . "' , '".
                $caixa->getTelefone() . "' , '". 
                $caixa->getNumCaixa() . "')";
        $res = $conn->query($sql);
        return $res;
    }

    function listarCaixa($conn) {
        $sql = "SELECT * from caixa ";
        $res = $conn->query($sql);
        return $res;
    }

    function excluirCaixa($cpf, $conn) {
        $sql = "DELETE FROM caixa WHERE cpf = $cpf";
        $res = $conn->query($sql);
        return $res;
    }

    function editarCaixa($conn) {
        $sql = "SELECT cpf FROM caixa WHERE cpf=".$_POST["cpf"];
        $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)!=0){
                $sql = "UPDATE caixa
                        SET cpf         ='".$_POST["cpf"]."',
                            primeiroNome='"   .$_POST["primeiroNome"]."',
                            sobrenome='"       .$_POST["sobrenome"]."',
                            endereco='"       .$_POST["endereco"]."',
                            salario='"       .$_POST["salario"]."',
                            telefone='"       .$_POST["telefone"]."',
                            numCaixa='"       .$_POST["numCaixa"]."'
                            WHERE cpf=".$_POST["cpf"];
        }
        mysqli_query($conn, $sql);
    }

}

?>