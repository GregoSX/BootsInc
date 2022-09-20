<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/styleEditar.css">
    <title>Editar Cliente</title>
</head>
<body>
<div class="container">
<form name="form2" method="POST" action="IncluirCliente.php">
<?php

include_once '../../persistence/BD.php';
include_once '../../persistence/ClienteDAO.PHP';

?>
 <center><h3>Editar cliente</h3></center>
<?php
    $conn = new BD();
    $conn = $conn->getConnection();
    $sql = "SELECT cliente.*
          FROM cliente
          WHERE idCliente=".$_GET['idCliente'];
    $result = mysqli_query($conn, $sql);
    $vetor = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>    
  <input type="hidden" name="idCliente" value="<?php echo $_GET['idCliente'];  ?>">
  <table border="0" align="center" width="35%">
        <tr><td width="20%">ID:</td>
            <td colspan="2" width="90%">
            <input type="number" name="idCliente" value="<?php echo @$vetor['idCliente']; ?>" disabled>
        </td>
        </tr>
        <tr><td width="20%">CPF:</td>
            <td colspan="2" width="90%">
                <input type="text" name="cpf" value="<?php echo @$vetor['cpf']; ?>" size="11" disabled>
            </td>
        </tr>
        <tr><td width="20%">Nome:</td>
            <td colspan="2" width="90%">
            <input type="text" name="primeiroNome" value="<?php echo @$vetor['primeiroNome']; ?>" size="30">
        </td>
        </tr>
        <tr><td width="20%">Sobrenome:</td>
            <td><input type="text" name="sobrenome" value="<?php echo @$vetor['sobrenome']; ?>" size="70">
            </td>
        </tr>
        <tr><td width="20%">Endereço:</td>
            <td colspan="2" width="90%">
            <input type="text" name="endereco" value="<?php echo @$vetor['endereco']; ?> "size="70">
            </td>
        </tr>
        <tr><td width="20%">N° Compras:</td>
            <td colspan="2" width="90%">
            <input type="text" name="endereco" value="<?php echo @$vetor['endereco']; ?> "size="70" disabled>
            </td>
        </tr>
        <tr><td colspan="3" align="center" class="buttons">
            <input type="submit" value="Salvar">
            <input type="button" value="Cancelar" onclick="location.href='./ListarCliente.php'">
            </td>
        </tr>
</table>
</form>
</div>
</body>
</html>
