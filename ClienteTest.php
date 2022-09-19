<?php
require_once './src/persistence/ClienteDAO.php';
require_once './src/model/Cliente.php';


class ClienteTest extends \PHPUnit\Framework\TestCase {

    public function testCadastrarCliente(){
        $obj = new ClienteDAO();
        $servername = "localhost";
        $username = "root";
        $password = "bacon";
        $dbname = "bootsinc";
        $con = mysqli_connect($servername, $username, $password, $dbname);
        $idCliente = 2;
        $cpf = "01932409637";
        $primeiroNome = "guilherme";
        $sobrenome = "grego";
        $endereco = "alameda rio claro 501";
        $cliente = new Cliente($idCliente, $cpf, $primeiroNome, $sobrenome, $endereco);
        $this->assertEquals(true, $obj->salvar($cliente, $con));
    }

}