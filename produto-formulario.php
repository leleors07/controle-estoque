<?php require_once("cabecalho.php");
require_once("logica-usuario.php");

verificaUsuario();

$produto = array("nome" => "", "descricao" => "", "preco" => "", "qt_produtos" => "1", "tipoNota" => "0");

?>

	<h1>Formulário de Produto</h1>
    <form action="adiciona-produto.php" method="post">
        <table class="tabForm">
            <?php include("produto-formulario-base.php"); ?>
            <tr>
                <td>
                	<button class="btn btn-primary" type="submit"> Cadastrar</button> 
                </td>
            </tr>

        </table>

    </form>
    
<?php require_once("rodape.php"); ?>