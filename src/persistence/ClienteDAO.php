<?php

class ClienteDAO {
    function __construct() {}

    function salvar($cliente, $conn) {
        $sql = "INSERT INTO cliente (idCliente, cpf, primeiroNome, sobrenome, nasc) VALUES ('" . 
                $cliente->getIdCliente() . "', '" . 
                $cliente->getCpf() . "', " . 
                $cliente->getPrimeiroNome() . ", " . 
                $cliente->getSobrenome() . " , ". 
                $cliente->getNasc() . ")";
        $res = $conn->query($sql);
        return $res;
    }

    function listarCliente($conn) {
        $sql = "SELECT * from cliente ";
        $res = $conn->query($sql);
        return $res;
    }

    function excluirCliente($idCliente, $conn) {
        $sql = "DELETE FROM cliente WHERE idCliente = $idCliente";
        $res = $conn->query($sql);
        return $res;
    }

    function editarCliente($conn) {
        $sql = "SELECT idCliente FROM cliente WHERE idCliente=".$_POST["idCliente"];
        $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)!=0){
                $sql = "UPDATE cliente
                        SET idCliente         ='".$_POST["idCliente"]."',
                            cpf='".$_POST["cpf"]."',
                            primeiroNome='"   .$_POST["primeiroNome"]."',
                            sobrenome='"       .$_POST["sobrenome"]."',
                            nasc='"       .$_POST["nasc"]."'
                            WHERE idCliente=".$_POST["idCliente"];
        }
        mysqli_query($conn, $sql);
    }

}

?>