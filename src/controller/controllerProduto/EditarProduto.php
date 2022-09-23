<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/styleEditar.css">
    <title>Editar Produto</title>
</head>
<body>
<div class="container">
<form name="form1" method="POST" action="IncluirProduto.php">
<?php

include_once '../../persistence/BD.php';
include_once '../../persistence/ProdutoDAO.php';

?>
 <center><h3>Editar produto</h3></center>
<?php
    $conn = new BD();
    $conn = $conn->getConnection();
    $sql = "SELECT produto.*
          FROM produto
          WHERE codigo=".$_GET['codigo'];
    $result = mysqli_query($conn, $sql);
    $vetor = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
  <input type="hidden" name="codigo" value="<?php echo $_GET['codigo'];  ?>">
  <table border="0" align="center" width="35%">
        <tr><td width="20%">Código:</td>
            <td colspan="2" width="90%">
            <input type="number" name="codigo" value="<?php echo @$vetor['codigo']; ?>" maxlength="14" size=auto disabled>
        </td>
        </tr>
        <tr><td width="20%">Descrição:</td>
            <td colspan="2" width="90%">
                <input type="text" name="descricao" value="<?php echo @$vetor['descricao']; ?>" maxlength="30" size=auto>
            </td>
        </tr>
        <tr><td width="20%">Preço:</td>
            <td colspan="2" width="90%">
            <input type="number" step="0.01" min="0.01" max="9999.99" name="preco" value="<?php echo @$vetor['preco']; ?>" size=auto>
        </td>
        </tr>
        <tr><td width="20%">Tamanho:</td>
            <td><input type="number" name="tamanho" value="<?php echo @$vetor['tamanho']; ?>" size=auto>
            </td>
        </tr>
        <tr><td colspan="3" align="center" class="buttons">
            <input type="submit" value="Salvar">
            <input type="button" value="Cancelar" onclick="location.href='./ListarProduto.php'">
            </td>
        </tr>
</table>
</form>
</div>
</body>
</html>
