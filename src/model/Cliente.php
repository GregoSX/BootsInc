<?php

class Cliente {
    private $idCliente;
    private $cpf;
    private $primeiroNome;
    private $sobrenome;
    private $nasc;

    function __construct($idCliente, $cpf, $primeiroNome, $sobrenome, $nasc) {
        $this->idCliente = $idCliente;
        $this->cpf = $cpf;
        $this->primeiroNome = $primeiroNome;
        $this->sobrenome = $sobrenome;
        $this->nasc = $nasc;
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

    function getNasc() {
        return $this->nasc;
    }
}

?>