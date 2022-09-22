<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../../styles/styleLista.css">
    </head>
    <body>
        <form name="form1" method="POST" action="../../view/CadastrarVenda.html">
            <table style="text-align:center;" width="90%">
<?php

include_once '../../persistence/BD.php';
include_once '../../persistence/VendaDAO.php';

$conn = new BD();
$conn = $conn->getConnection();

$vendadao = new VendaDAO();
$res = $vendadao->listarVenda($conn);

if($res->num_rows == 0) {
?>
                <tr ><td style="text-align:center;" class="buttons" > Nenhuma venda cadastrada.</td></tr>
            </table>
            <br>
            <input type="submit" value="Adicionar venda" class="buttons">
            <br><br>
            <input type="button" value="Voltar" onclick="location.href='../../index.html'" class="buttons" >
<?php
} else {

?>
                <tr border="1" frame="hsides" rules="rows" bgcolor='#D2691E;'>
                    <th width="9%" style="text-align:center;"> ID Pedido </th>
                    <th width="9%" style="text-align:center;"> CPF Vendedor </th>
                    <th width="9%" style="text-align:center;"> CPF Cliente </th>
                    <th width="9%" style="text-align:center;"> Desconto </th>
                    <th width="9%" style="text-align:center;"> Valor </th>
                    <th width="9%" style="text-align:center;"> Opções </th>
                </tr>
<?php
    while($linha = $res->fetch_assoc()) {
?>
                <tr bgcolor="#d3d3d3" style="text-align:center;">
                    <td> <?php echo $linha['numPedido'];?> </td>
                    <td> <?php echo $linha['cpfVendedor']; ?>  </td>
                    <td> <?php echo $linha['cpfCliente']; ?>  </td>
                    <td> <?php echo $linha['desconto'];?> </td>
                    <td> <?php echo $linha['valor'];?> </td>
                    <td style="text-align:center;">
                        <input type="button" value="Editar" onclick="location.href='EditarVenda.php?numero=<?php echo $linha['numero'] ?>'">
                        <input type="button" value="Excluir" onclick="location.href='ExcluirVenda.php?numero=<?php echo $linha['numero'] ?>'">
                    </td>
                </tr>
<?php
    }
?>
                <tr><td colspan="12" height="5" class="buttons" ></td></tr>
            </table>
            <input type="submit" value="Adicionar venda" class="buttons">
            <br><br>
            <input type="button" value="Voltar" onclick="location.href='../../index.html'" class="buttons" >
<?php
}
?>
        </form>
    </body>
</html>
