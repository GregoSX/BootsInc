<?php

class VendedorDAO {
    function __construct() {}

    function salvar($vendedor, $conn) {
        $sql = "INSERT INTO vendedor (cpf, primeiroNome, sobrenome, endereco, salario, telefone) VALUES ('" .
                $vendedor->getCpf() . "', '" .
                $vendedor->getPrimeiroNome() . "', '" .
                $vendedor->getSobrenome() . "' , '".
                $vendedor->getEndereco() . "' , '".
                $vendedor->getSalario() . "' , '".
                $vendedor->getTelefone() . "')";
        $res = $conn->query($sql);
        return $res;
    }

    function listarVendedor($conn) {
        $sql = "SELECT * from vendedor ";
        $res = $conn->query($sql);
        return $res;
    }

    function excluirVendedor($cpf, $conn) {
        $sql = "DELETE FROM vendedor WHERE cpf = $cpf";
        $res = $conn->query($sql);
        return $res;
    }

    function editarVendedor($conn) {
        $sql = "SELECT cpf FROM vendedor WHERE cpf=".$_POST["cpf"];
        $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)!=0){
                $sql = "UPDATE vendedor
                        SET cpf         ='".$_POST["cpf"]."',
                            primeiroNome='"   .$_POST["primeiroNome"]."',
                            sobrenome='"       .$_POST["sobrenome"]."',
                            endereco='"       .$_POST["endereco"]."',
                            salario='"       .$_POST["salario"]."',
                            telefone='"       .$_POST["telefone"]."'
                            WHERE cpf=".$_POST["cpf"];
        }
        mysqli_query($conn, $sql);
    }

}

?>