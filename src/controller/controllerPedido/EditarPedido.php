<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/styleEditar.css">
    <title>Editar Pedido</title>
</head>
<body>
<div class="container">
<form name="form1" method="POST" action="IncluirPedido.php">
<?php

include_once '../../persistence/BD.php';
include_once '../../persistence/PedidoDAO.php';

?>
 <center><h3>Editar pedido</h3></center>
<?php
    $conn = new BD();
    $conn = $conn->getConnection();
    $sql = "SELECT *
          FROM pedido
          WHERE idPedido=".$_GET['idPedido'];
    $result = mysqli_query($conn, $sql);
    $vetor = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
  <input type="hidden" name="idPedido" value="<?php echo $_GET['idPedido'];  ?>">
  <table border="0" align="center" width="35%">
        <tr><td width="20%">ID Pedido:</td>
            <td colspan="2" width="90%">
            <input type="text" name="idPedido" value="<?php echo @$vetor['idPedido']; ?>" size="14" disabled>
        </td>
        </tr>
        <tr><td width="20%">ID Produto:</td>
            <td colspan="2" width="90%">
                <input type="text" name="idProduto" value="<?php echo @$vetor['idProduto']; ?>" maxlength="30" size="30" disabled>
            </td>
        </tr>
        </tr>
        <tr><td width="20%">Quantidade:</td>
            <td><input type="number" name="quantidade" value="<?php echo @$vetor['quantidade']; ?>" size="8">
            </td>
        </tr>
        <tr><td width="20%">Preço Vendido:</td>
            <td colspan="2" width="90%">
            <input type="number" step="0.01" min="0.01" max="9999.99" name="precoVendido" value="<?php echo @$vetor['precoVendido']; ?>" size="8">
        </td>
        <tr><td width="20%">Status Pedido:</td>
            <td colspan="2" width="90%">
                <input type="text" name="statusPedido" value="<?php echo @$vetor['statusPedido']; ?>" size="30" disabled>
            </td>
        </tr>
        <tr><td colspan="3" align="center" class="buttons">
            <input type="submit" value="Salvar">
            <input type="button" value="Cancelar" onclick="location.href='./ListarPedido.php'">
            </td>
        </tr>
</table>
</form>
</div>
</body>
</html>
