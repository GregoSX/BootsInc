<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/styleEditar.css">
    <title>Editar Venda</title>
</head>
<body>
<div class="container">
<form name="form1" method="POST" action="IncluirVenda.php">
<?php

include_once '../../persistence/BD.php';
include_once '../../persistence/VendaDAO.php';

?>
 <center><h3>Editar Venda</h3></center>
<?php
    $conn = new BD();
    $conn = $conn->getConnection();
    $sql = "SELECT *
          FROM venda
          WHERE idVenda=".$_GET['idVenda'];
    $result = mysqli_query($conn, $sql);
    $vetor = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
  <input type="hidden" name="idVenda" value="<?php echo $_GET['idVenda'];  ?>">
  <table border="0" align="center" width="35%">
        <tr><td width="20%">ID Venda:</td>
            <td colspan="2" width="90%">
            <input type="text" name="idVenda" value="<?php echo @$vetor['idVenda']; ?>" size="14" disabled>
        </td>
        </tr>
        <tr><td width="20%">ID Pedido:</td>
            <td colspan="2" width="90%">
                <input type="text" name="idPedido" value="<?php echo @$vetor['idPedido']; ?>" maxlength="30" size="30" disabled>
            </td>
        </tr>
        </tr>
        <tr><td width="20%">CPF Cliente:</td>
            <td><input type="number" name="cpfCliente" value="<?php echo @$vetor['cpfCliente']; ?>" size="8" disabled>
            </td>
        </tr>
        <tr><td width="20%">Valor:</td>
            <td colspan="2" width="90%">
            <input type="number" step="0.01" min="0.01" max="9999.99" name="valorVenda" value="<?php echo @$vetor['valorVenda']; ?>" size="8">
        </td>
        <tr><td colspan="3" align="center" class="buttons">
            <input type="submit" value="Salvar">
            <input type="button" value="Cancelar" onclick="location.href='./ListarVenda.php'">
            </td>
        </tr>
</table>
</form>
</div>
</body>
</html>
