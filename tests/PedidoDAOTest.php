<?php

    use PHPUnit\Framework\TestCase;

    class PedidoDAOTest extends TestCase
    {
        public function testGetNumPedido() {
            $bd = new BD();
            $conn = $bd->getConnection();
            $vendadao = new PedidoDAO();
            $this->assertSame('20', $vendadao->getQuantidadePedida(1, $conn));
        }
    }

?>

