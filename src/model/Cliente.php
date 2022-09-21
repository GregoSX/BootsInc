<?php

class Cliente {
    private $cpf;
    private $primeiroNome;
    private $sobrenome;
    private $endereco;
    private $numCompras;

    function __construct($cpf, $primeiroNome, $sobrenome, $endereco) {
        $this->cpf = $cpf;
        $this->primeiroNome = $primeiroNome;
        $this->sobrenome = $sobrenome;
        $this->endereco = $endereco;
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