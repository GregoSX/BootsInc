<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../../styles/styleLista.css">
    </head>
    <body>
        <form name="form1" method="POST" action="../../view/CadastrarCaixa.html">
            <table style="text-align:center;" width="90%">
<?php

include_once '../../persistence/BD.php';
include_once '../../persistence/CaixaDAO.php';

$conn = new BD();
$conn = $conn->getConnection();

$caixadao = new CaixaDAO();
$res = $caixadao->listarCaixa($conn);

if($res->num_rows == 0) {
?>
            <tr ><td style="text-align:center;" class="buttons" > Nenhum caixa cadastrado.</td></tr>
            </table>
            <br>
            <input type="submit" value="Adicionar caixa" class="buttons">
            <br><br>
            <input type="button" value="Voltar" onclick="location.href='../../index.html'" class="buttons" >
<?php
} else {

?>
                <tr border="1" frame="hsides" rules="rows" bgcolor='#D2691E;'>
                    <th width="9%" style="text-align:center;"> CPF </th>
                    <th width="9%" style="text-align:center;"> Nome </th>
                    <th width="9%" style="text-align:center;"> Endereço </th>
                    <th width="9%" style="text-align:center;"> Salário </th>
                    <th width="9%" style="text-align:center;"> Telefone </th>
                    <th width="9%" style="text-align:center;"> N° Caixa </th>
                    <th width="9%" style="text-align:center;"> Opções </th>
                </tr>
<?php
    while($linha = $res->fetch_assoc()) {
?>
                <tr bgcolor="#d3d3d3" style="text-align:center;">
                    <td> <?php echo $linha['cpf'];?> </td>
                    <td> <?php echo $linha['primeiroNome']." ".$linha['sobrenome'];?> </td>
                    <td> <?php echo $linha['endereco'];?> </td>
                    <td> <?php echo $linha['salario'];?> </td>
                    <td> <?php echo $linha['telefone'];?> </td>
                    <td> <?php echo $linha['numCaixa'];?> </td>
                    <td style="text-align:center;">
                        <input type="button" value="Editar" onclick="location.href='EditarCaixa.php?cpf=<?php echo $linha['cpf'] ?>'">
                        <input type="button" value="Excluir" onclick="location.href='ExcluirCaixa.php?cpf=<?php echo $linha['cpf'] ?>'">
                    </td>
                </tr>
<?php
    }
?>
                <tr><td colspan="12" height="5" class="buttons" ></td></tr>
            </table>
            <input type="submit" value="Adicionar caixa" class="buttons">
            <br><br>
            <input type="button" value="Voltar" onclick="location.href='../../index.html'" class="buttons" >
<?php
}
?>
        </form>
    </body>
</html>
