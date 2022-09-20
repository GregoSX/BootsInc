<?php

class BD {
    private $servername = "localhost";
    private $username =  "root";
    private $password =  "senha;";
    private $bd = "bootsinc";
    private $conn = null;

    function __construct() {}

    function getConnection() {
        if($this->conn == null) {
            $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->bd);
 
        }
        if(!$this->conn) {
            die("Conexão falhou: ". $this->conn->connect_error);
        }
        return  $this->conn;
    }
}

?>