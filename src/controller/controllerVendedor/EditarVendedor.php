<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/styleEditar.css">
    <title>Editar Vendedor</title>
</head>
<body>
<div class="container">
<form name="form2" method="POST" action="IncluirVendedor.php">
<?php

include_once '../../persistence/BD.php';
include_once '../../persistence/VendedorDAO.php';

?>
 <center><h3>Editar Vendedor</h3></center>
<?php
    $conn = new BD();
    $conn = $conn->getConnection();
    $sql = "SELECT vendedor.*
          FROM vendedor
          WHERE cpf=".$_GET['cpf'];
    $result = mysqli_query($conn, $sql);
    $vetor = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>    
  <table border="0" align="center" width="35%">
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
        <tr><td width="20%">Salario:</td>
            <td colspan="2" width="90%">
            <input type="number" name="salario" placeholder="<?php echo @$vetor['salario']; ?>" value="<?php echo @$vetor['salario']; ?> "size="70">
            </td>
        </tr>
        <tr><td width="20%">Telefone:</td>
            <td colspan="2" width="90%">
            <input type="text" name="telefone" value="<?php echo @$vetor['telefone']; ?> "size="70">
            </td>
        </tr>
        <tr><td width="20%">N° Vendas:</td>
            <td colspan="2" width="90%">
            <input type="number" name="numVendas" value="<?php echo @$vetor['numVendas']; ?> "size="70">
            </td>
        </tr>
        <tr><td colspan="3" align="center" class="buttons">
            <input type="submit" value="Salvar">
            <input type="button" value="Cancelar" onclick="location.href='./ListarVendedor.php'">
            </td>
        </tr>
</table>
</form>
</div>
</body>
</html>
