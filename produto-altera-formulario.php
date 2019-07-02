<?php require_once("cabecalho.php");
require_once("banco-produto.php"); 

$id = $_GET['id'];
$produto = buscaProduto($conexao, $id);
?>

	<h1>Alterando Produto</h1>
    <form action="altera-produto.php" method="post">
        <input type="hidden" name="id" value="<?=$produto['id']?>">
        <table class="tabForm">
            <?php include("produto-formulario-base.php"); ?>
            <tr>
                <td>
                	<button class="btn btn-primary" type="submit"> Alterar</button> 
                </td>
            </tr>

        </table>

    </form>
    
<?php require_once("rodape.php"); ?>