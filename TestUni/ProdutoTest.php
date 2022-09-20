<?php
require_once '../src/persistence/ProdutoDAO.php';
require_once '../src/model/Produto.php';


class ProdutoTest extends \PHPUnit\Framework\TestCase {

    public function testCadastrarProduto(){
        $obj = new ProdutoDAO();
        $servername = "127.0.0.1";
        $username = "root";
        $password = "Guizin123;";
        $dbname = "bootsinc";
        $con = mysqli_connect($servername, $username, $password, $dbname);
        $codProduto = 2;
        $descricao = "puma";
        $preco = 2;
        $tamanho = 2;
        $quantidadeEstoque = 2;
        $cliente = new Produto($codProduto, $descricao, $preco, $tamanho, $quantidadeEstoque);
        $this->assertEquals(true, $obj->salvar($cliente, $con));
    }

    public function testListarProduto(){
        $obj = new ProdutoDAO();
        $servername = "127.0.0.1";
        $username = "root";
        $password = "Guizin123;";
        $dbname = "bootsinc";
        $con = mysqli_connect($servername, $username, $password, $dbname);
        $this->assertEquals(true, $obj->listarProduto($con));
    }

    public function testRemoverFuncionario(){
        $obj = new ProdutoDAO();
        $servername = "127.0.0.1";
        $username = "root";
        $password = "Guizin123;";
        $dbname = "bootsinc";
        $con=mysqli_connect($servername, $username, $password, $dbname);
        $this->assertEquals(true, $obj->excluirProduto(2, $con));
    }

}