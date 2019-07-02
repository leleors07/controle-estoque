<?php include("cabecalho.php"); 
require_once("banco-produto.php");
require_once("banco-registros.php");
require_once("logica-usuario.php");

$id = $_POST['id'];
removeProduto($conexao, $id);
insereRegistro($conexao,"saida",$id);
$_SESSION["success"] = "Produto removido com sucesso.";
header("Location: produto-lista.php");
die();
?>