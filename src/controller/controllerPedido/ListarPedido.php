<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../../styles/styleLista.css">
    </head>
    <body>
        <form name="form1" method="POST" action="../../view/CadastrarPedido.html">
            <table style="text-align:center;" width="90%">
<?php

include_once '../../persistence/BD.php';
include_once '../../persistence/PedidoDAO.php';

$conn = new BD();
$conn = $conn->getConnection();

$pedidodao = new PedidoDAO();
$res = $pedidodao->listarPedido($conn);

if($res->num_rows == 0) {
?>
                <tr ><td style="text-align:center;" class="buttons" > Nenhum pedido cadastrado.</td></tr>
            </table>
            <br>
            <input type="submit" value="Adicionar pedido" class="buttons">
            <br><br>
            <input type="button" value="Voltar" onclick="location.href='../../index.html'" class="buttons" >
<?php
} else {

?>
                <tr border="1" frame="hsides" rules="rows" bgcolor='#D2691E;'>
                    <th width="9%" style="text-align:center;"> ID Pedido </th>
                    <th width="9%" style="text-align:center;"> ID Produto </th>
                    <th width="9%" style="text-align:center;"> Quantidade </th>
                    <th width="9%" style="text-align:center;"> Preço Vendido </th>
                    <th width="9%" style="text-align:center;"> Opções </th>
                </tr>
<?php
    while($linha = $res->fetch_assoc()) {
?>
                <tr bgcolor="#d3d3d3" style="text-align:center;">
                    <td> <?php echo $linha['idPedido'];  ?> </td>
                    <td> <?php echo $linha['idProduto'];?> </td>
                    <td> <?php echo $linha['quantidade']; ?>  </td>
                    <td> <?php echo $linha['precoVendido'];?> </td>
                    <td style="text-align:center;">
                        <input type="button" value="Editar" onclick="location.href='EditarPedido.php?idPedido=<?php echo $linha['idPedido'] ?>'">
                        <input type="button" value="Excluir" onclick="location.href='ExcluirPedido.php?idPedido=<?php echo $linha['idPedido'] ?>'">
                    </td>
                </tr>
<?php
    }
?>
                <tr><td colspan="12" height="5" class="buttons" ></td></tr>
            </table>
            <input type="submit" value="Adicionar pedido" class="buttons">
            <br><br>
            <input type="button" value="Voltar" onclick="location.href='../../index.html'" class="buttons" >
<?php
}
?>
        </form>
    </body>
</html>
