<?php

class Cliente {
    private $idCliente;
    private $cpf;
    private $primeiroNome;
    private $sobrenome;
    private $endereco;

    function __construct($idCliente, $cpf, $primeiroNome, $sobrenome, $endereco) {
        $this->idCliente = $idCliente;
        $this->cpf = $cpf;
        $this->primeiroNome = $primeiroNome;
        $this->sobrenome = $sobrenome;
        $this->endereco = $endereco;
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
}

?>