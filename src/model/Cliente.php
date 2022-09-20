<?php

class Cliente {
    private $idCliente;
    private $cpf;
    private $primeiroNome;
    private $sobrenome;
    private $endereco;
    private $numCompras;

    function __construct($idCliente, $cpf, $primeiroNome, $sobrenome, $endereco, $numCompras) {
        $this->idCliente = $idCliente;
        $this->cpf = $cpf;
        $this->primeiroNome = $primeiroNome;
        $this->sobrenome = $sobrenome;
        $this->endereco = $endereco;
        $this->numCompras = $numCompras;
    }

    function getIdCliente() {
        return $this->idCliente;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getPrimeiroNome() {
        return $this->primeiroNome;
    }

    function getSobrenome() {
        return $this->sobrenome;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getNumCompras(){
        return $this->numCompras;
    }
}

?>