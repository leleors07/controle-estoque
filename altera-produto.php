<?php require_once ("cabecalho.php"); 
require_once("banco-produto.php");
require_once("banco-registros.php");

$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$qt_produtos = $_POST['qt_produtos'];
$tipoNota = $_POST['tipoNota'];
$id = $_POST['id'];

if(alteraProduto($conexao,$id, $nome, $descricao, $preco, $qt_produtos,$tipoNota)) {
	insereRegistro($conexao,"alteracao",$id);
?>
<p  class="text-success"> O Produto <?= $nome; ?>, <?= $preco; ?> foi alterado.</p>
<?php
} else {
    $msg = mysqli_error($conexao);
?>
<p class="text-danger">O produto <? = $nome; ?> não foi alterado: <?= $msg ?></p>
<?php
}
?>

<?php require_once ("rodape.php"); ?>