<?php

    use PHPUnit\Framework\TestCase;

    class VendaDAOTest extends TestCase
    {
        public function testGetNumPedido() {
            $bd = new BD();
            $conn = $bd->getConnection();
            $vendadao = new VendaDAO();
            $this->assertSame('1', $vendadao->getNumPedido(3, $conn));
            $this->assertSame('47474747474', $vendadao->getCPFCliente(3, $conn));
        }
    }

?>

