<?php require_once("cabecalho.php"); 
require_once("banco-produto.php");
require_once("banco-registros.php");
?>

	<!-- Cria a tabela com os produtos -->
<table class="table" >
	<tr class="info">
		<td>Transação</td>
		<td>Produto</td>
		<td>Preço</td>
		<td>Descriçao</td>
		<td>Quantidade</td>
		<td>Observação</td>
		<td>Data</td>
	</tr>
	
	<?php 
		$registros = listaRegistros($conexao);
        if($registros==null )
        { ?>
            <p class="alert-danger">Não foram encontrados registros!</p>
       <?php }
		foreach ($registros as $registro) :
			$produto = buscaProduto($conexao,$registro['idTipo']);
			?>
			<tr>
				<td><?=strtoupper($registro['tipoReg']) ?></td>
				<td><?=$produto['nome'] ?></td>
				<td><?=$produto['preco'] ?></td>
				<td><?= substr($produto['descricao'],0 ,15)?></td>
				<td><?=$produto['qt_produtos'] ?></td>
				<?php if (!$produto['tipoNota']==0) {?>
					<td><?=$produto['tipoNota'] ?></td>
				<?php }else{?>
                    			<td><?=$produto[''] ?></td> 
				<?php } ?>
				<td><?=$registro['dataReg'] ?></td>
			</tr>
		<?php endforeach ?>
</table>
<?php include("rodape.php"); ?>