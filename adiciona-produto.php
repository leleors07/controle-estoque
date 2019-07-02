<?php require_once ("cabecalho.php"); 
require_once("banco-produto.php");
require_once("banco-registros.php");
require_once("logica-usuario.php");

verificaUsuario();

$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$qt_produtos = $_POST['qt_produtos'];
$tipoNota = $_POST['tipoNota'];
$produto = listaProdutos($conexao, $nome, $preco, $descricao);
if($produto!=null ){
	if($produto[0]['tipoNota']==$tipoNota){
		$resultado=adicionaProduto($conexao, $produto[0]['id'], $qt_produtos);
	}
else{
	$resultado=insereProduto($conexao, $nome, $descricao, $preco, $qt_produtos, $tipoNota);
    }
}
else
{
    $resultado=insereProduto($conexao, $nome, $descricao, $preco, $qt_produtos, $tipoNota);
}

if($resultado) {
	$produto = listaProdutos($conexao, $nome, $preco, $descricao);
	$idTipo = $produto[0]['id'];
	echo $idTipo;
	insereRegistro($conexao,"entrada",$idTipo);
?>
	<p class="text-success"> O Produto <?= $nome; ?>, <?= $preco; ?> foi adicionado.</p>
<?php
} else {
    $msg = mysqli_error($conexao);
?>
	<p class="text-danger">O produto <? = $nome; ?> não foi adicionado: <?= $msg ?></p>
<?php
}
?>

<?php require_once ("rodape.php"); ?>