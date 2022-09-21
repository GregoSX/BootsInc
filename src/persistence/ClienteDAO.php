<?php

class ClienteDAO {
    function __construct() {}

    function salvar($cliente, $conn) {
        $sql = "INSERT INTO cliente (cpf, primeiroNome, sobrenome, endereco) VALUES ('" .
                $cliente->getCpf() . "', '" .
                $cliente->getPrimeiroNome() . "', '" .
                $cliente->getSobrenome() . "' , '".
                $cliente->getEndereco() . "')";
        $res = $conn->query($sql);
        return $res;
    }

    function listarCliente($conn) {
        $sql = "SELECT * from cliente ";
        $res = $conn->query($sql);
        return $res;
    }

    function excluirCliente($cpf, $conn) {
        $sql = "DELETE FROM cliente WHERE cpf = $cpf";
        $res = $conn->query($sql);
        return $res;
    }

    function editarCliente($conn) {
        $sql = "SELECT cpf FROM cliente WHERE cpf=".$_POST["cpf"];
        $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)!=0){
                $sql = "UPDATE cliente
                        SET cpf         ='".$_POST["cpf"]."',
                            primeiroNome='"   .$_POST["primeiroNome"]."',
                            sobrenome='"       .$_POST["sobrenome"]."',
                            endereco='"       .$_POST["endereco"]."'
                            WHERE cpf=".$_POST["cpf"];
        }
        mysqli_query($conn, $sql);
    }

}

?>