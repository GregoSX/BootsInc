<?php

class Vendedor {
    private $cpf;
    private $primeiroNome;
    private $sobrenome;
    private $endereco;
    private $salario;
    private $telefone;
    private $numVendas;

    function __construct($cpf, $primeiroNome, $sobrenome, $endereco, $salario, $telefone, $numVendas) {
        $this->cpf = $cpf;
        $this->primeiroNome = $primeiroNome;
        $this->sobrenome = $sobrenome;
        $this->endereco = $endereco;
        $this->salario = $salario;
        $this->telefone = $telefone;
        $this->numVendas = $numVendas;
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

    function getSalario() {
        return $this->salario;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getNumVendas() {
        return $this->numVendas;
    }
}

?>