<?php 
	function procuraAjax(){ ?>
		<script type="text/javascript" src="js/ajax.js"></script>
		<form action="produto-lista.php" method="post">
			Nome <input type="text" name="txtnome" id="txtnome"/> Preço <input type="number" step="any" name="preco" id="preco"/> 
			Descricao <input type="text" name="desc" id="desc"/>
			<button class="btn btn-info" type="submit" onclick="getDados();"> Procurar</button> 
		</form>
	<?php } ?> 