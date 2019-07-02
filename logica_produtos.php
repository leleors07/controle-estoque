<?php require_once("banco-produto.php");

function produtoExiste( $nome, $preco, $descricao)
{
	$produtos = listaProdutos($conexao, $nome, $preco, $descricao);
	if(produtos==null)
		return 0;
	else
		return produtos["id"];
}