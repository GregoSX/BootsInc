<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../../styles/styleLista.css">
    </head>
    <body>
        <form name="form1" method="POST" action="../../view/CadastrarProduto.html">
            <table style="text-align:center;" width="90%">
<?php

include_once '../../persistence/BD.php';
include_once '../../persistence/ProdutoDAO.php';

$conn = new BD();
$conn = $conn->getConnection();

$produtodao = new ProdutoDAO();
$res = $produtodao->listarProduto($conn);

if($res->num_rows == 0) {
?>
                <tr ><td style="text-align:center;" class="buttons" > Nenhum produto cadastrado.</td></tr>
            </table>
            <br>
            <input type="submit" value="Adicionar produto" class="buttons">
            <br><br>
            <input type="button" value="Voltar" onclick="location.href='../../index.html'" class="buttons" >
<?php
} else {

?>
                <tr border="1" frame="hsides" rules="rows" bgcolor='#D2691E;'>
                    <th width="9%" style="text-align:center;"> Código </th>
                    <th width="9%" style="text-align:center;"> Descrição </th>
                    <th width="9%" style="text-align:center;"> Preço </th>
                    <th width="9%" style="text-align:center;"> Tamanho </th>
                    <th width="9%" style="text-align:center;"> Quantidade </th>
                    <th width="9%" style="text-align:center;"> Opções </th>
                </tr>
<?php
    while($linha = $res->fetch_assoc()) {
?>
                <tr bgcolor="#d3d3d3" style="text-align:center;">
                    <td> <?php echo $linha['codigo'];  ?> </td>
                    <td> <?php echo $linha['descricao'];?> </td>
                    <td> <?php echo $linha['preco']; ?>  </td>
                    <td> <?php echo $linha['tamanho'];?> </td>
                    <td> <?php echo $linha['quantidadeEstoque'];?>  </td>
                    <td style="text-align:center;">
                        <input type="button" value="Editar" onclick="location.href='EditarProduto.php?codigo=<?php echo $linha['codigo'] ?>'">
                        <input type="button" value="Excluir" onclick="location.href='ExcluirProduto.php?codigo=<?php echo $linha['codigo'] ?>'">
                    </td>
                </tr>
<?php
    }
?>
                <tr><td colspan="12" height="5" class="buttons" ></td></tr>
            </table>
            <input type="submit" value="Adicionar produto" class="buttons">
            <br><br>
            <input type="button" value="Voltar" onclick="location.href='../../index.html'" class="buttons" >
<?php
}
?>
        </form>
    </body>
</html>
