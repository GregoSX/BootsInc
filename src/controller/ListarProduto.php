<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../styles/styleLista.css">
    </head>
    <body>
        <form name="form1" method="POST" action="../view/CadastrarProduto.html">
            <table align="center" width="90%">
<?php

include_once '../persistence/BD.php';
include_once '../persistence/ProdutoDAO.PHP';

$conn = new BD();
$conn = $conn->getConnection();

$produtodao = new ProdutoDAO();
$res = $produtodao->listarProduto($conn);

if($res->num_rows == 0) {
?>
                <tr ><td align="center" class="buttons"> Nenhum produto cadastrado.</td></tr>
                <tr ><td align="center" class="buttons"> <input type="submit" value="Adicionar produto"></td></tr>
<?php
} else {

?>
                <tr border="1" frame="hsides" rules="rows" bgcolor="grey">
                    <th width="9%" align="center"> Código </th>
                    <th width="9%" align="center"> Descrição </th>
                    <th width="9%" align="center"> Preço </th>
                    <th width="9%" align="center"> Tamanho </th>
                    <th width="9%" align="center"> Quantidade </th>
                    <th width="9%" align="center"> Opções </th>
                </tr>
<?php
    while($linha = $res->fetch_assoc()) {
?>
                <tr bgcolor="#d3d3d3" align="center">
                    <td> <?php echo $linha['codProduto'];  ?> </td> 
                    <td> <?php echo $linha['descricao'];?> </td> 
                    <td> <?php echo $linha['preco']; ?>  </td> 
                    <td> <?php echo $linha['tamanho'];?> </td> 
                    <td> <?php echo $linha['quantidadeEstoque'];?>  </td> 
                    <td align="center">
                        <input type="button" value="Editar" onclick="location.href='EditarProduto.php?codProduto=<?php echo $linha['codProduto'] ?>'">
                        <input type="button" value="Excluir" onclick="location.href='ExcluirProduto.php?codProduto=<?php echo $linha['codProduto'] ?>'">
                    </td>
                </tr>
<?php
    }
?>   
                <tr bgcolor="grey"><td colspan="12" height="5" class="buttons"></td></tr>
                <tr><td colspan="12" align="center" class="buttons"><input type="submit" value="Adicionar produto"></td></tr>
            </table> 
    
<?php
}
?>
        </form>
    </body>
</html>
