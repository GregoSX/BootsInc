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
          WHERE numero=".$_GET['numero'];
    $result = mysqli_query($conn, $sql);
    $vetor = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
  <input type="hidden" name="numero" value="<?php echo $_GET['numero'];  ?>">
  <table border="0" align="center" width="35%">
        <tr><td width="20%">Número da Venda:</td>
            <td colspan="2" width="90%">
            <input type="text" name="numero" value="<?php echo @$vetor['numero']; ?>" size=auto disabled>
        </td>
        </tr>
        <tr><td width="20%">ID Pedido:</td>
            <td colspan="2" width="90%">
                <input type="text" name="numPedido" value="<?php echo @$vetor['numPedido']; ?>" maxlength="30" size=auto disabled>
            </td>
        </tr>
        </tr>
        <tr><td width="20%">CPF Cliente:</td>
            <td><input type="number" name="cpfCliente" value="<?php echo @$vetor['cpfCliente']; ?>" size=auto disabled>
            </td>
        </tr>
        <tr><td width="20%">Desconto:</td>
            <td colspan="2" width="90%">
            <input type="number" step="1" min="0" max="100" name="desconto" value="<?php echo @$vetor['desconto']; ?>" size=auto>
        </td>
        <tr><td width="20%">Valor:</td>
            <td colspan="2" width="90%">
            <input type="number" step="0.01" min="0.01" max="9999.99" name="valor" value="<?php echo @$vetor['valor']; ?>" size=auto disabled>
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
