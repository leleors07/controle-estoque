<?php require_once("cabecalho.php"); 
require_once("banco-produto.php");
require_once("procura-ajax.php");
 ?>

<p>Pesquisar produto:</p>
<?php
 procuraAjax(); ?>
<?php 
// Verifica se foi informado nome ou preco para minerar o que mostrar na tabela
if (isset($_POST["txtnome"]) and isset($_POST["preco"]) and isset($_POST["desc"])) {
	$nome = $_POST["txtnome"]; 
	$preco = $_POST["preco"];
    $descricao = $_POST["desc"]?>
	<!-- Cria a tabela com os produtos -->
	<table class="table table-bordered" >
		<tr class="info">
			<td>Produto</td>
			<td>Preço</td>
			<td>Descriçao</td>
			<td>Quantidade</td>
			<td>Observação</td>
            <td>Preço Real</td>
			<td>Preço Total</td>
			<td> </td>
			<td> </td>
		</tr>
		
		<?php 
			$produtos = listaProdutos($conexao, $nome, $preco, $descricao);
	        if($produtos==null )
	        { ?>
	            <p class="alert-danger">Não foram encontrados registros!</p>
	       <?php }
			foreach ($produtos as $produto) :
				if ($produto['qt_produtos']!=0) {
					?>
					<tr>
						<td><?=$produto['nome'] ?></td>
						<td><?=$produto['preco'] ?></td>
						<td><?= substr($produto['descricao'],0 ,15)?></td>
						<td><?=$produto['qt_produtos'] ?></td>
						<?php if (!$produto['tipoNota']==0) {?>
							<td><?=$produto['tipoNota'] ?></td>
	                        			<td><?=$produto['preco']*2?></td>
						<?php 
							$precototal = ($produto['preco']*2)*$produto['qt_produtos'];
						}else{?>
	                        			<td><?=$produto[''] ?></td> 
	                        			<td><?=$produto['preco'] ?></td>
	                    	<?php 
							$precototal = $produto['preco']*$produto['qt_produtos'];
						} ?>
						<td><?=$precototal ?></td>
						<td><a class="btn btn-primary" href="produto-altera-formulario.php?id=<?=$produto['id']?>">Alterar</a>
						</td>
						<td>
							<form action="remove-produto.php" method="post">
								<input type="hidden" name="id" value="<?=$produto['id']?>"/>
								<button class="btn btn-danger">Remover</button>
							</form>
						</td>
					</tr>
			<?php 
					$somatoriopreco += $precototal;
					$somatorioproduto += $produto['qt_produtos'];
				}
			endforeach ?>
		<p class="alert-success"><font size="3">Quantidade Total de Produtos: <?=$somatorioproduto ?> </p>
		<p class="alert-success"><font size="3">Preço Total dos Produtos : <?=$somatoriopreco ?></p>
	</table>
<?php }else{ ?>
	      <p class="alert-danger">Não foram encontrados registros!</p>
<?php } ?>
<?php include("rodape.php"); ?>