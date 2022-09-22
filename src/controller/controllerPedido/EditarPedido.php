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
          WHERE numero=".$_GET['numero'];
    $result = mysqli_query($conn, $sql);
    $vetor = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
  <input type="hidden" name="numero" value="<?php echo $_GET['numero'];  ?>">
  <table border="0" align="center" width="35%">
        <tr><td width="20%">Número do Pedido:</td>
            <td colspan="2" width="90%">
            <input type="text" name="numero" value="<?php echo @$vetor['numero']; ?>" size=auto disabled>
        </td>
        </tr>
        <tr><td width="20%">Código do Produto:</td>
            <td colspan="2" width="90%">
                <input type="text" name="codProduto" value="<?php echo @$vetor['codProduto']; ?>" maxlength="30" size=auto disabled>
            </td>
        </tr>
        </tr>
        <tr><td width="20%">Quantidade:</td>
            <td><input type="number" name="quantidade" value="<?php echo @$vetor['quantidade']; ?>" size=auto>
            </td>
        </tr>
        <tr><td width="20%">Valor do Pedidoo:</td>
            <td colspan="2" width="90%">
            <input type="text" step="0.01" min="0.01" max="9999.99" name="valor" value="<?php echo @$vetor['valor']; ?>" size=auto disabled>
        </td>
        <tr><td width="20%">Status Pedido:</td>
            <td colspan="2" width="90%">
                <input type="text" name="status" value="<?php echo @$vetor['status']; ?>" size=auto disabled>
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
