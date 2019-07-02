
<tr>
	<td>Quantidade</td>
	<td><input class="form-control" type="number" name="qt_produtos" value="<?=$produto['qt_produtos']?>"></td>
</tr>
<tr>
    <td>Nome</td>
    <td> <input class="form-control" type="text" name="nome" value="<?=$produto['nome']?>"></td>
</tr>
<tr>
    <td>Preço</td>
    <td><input class="form-control" type="number" step="0.01" name="preco" value="<?=$produto['preco']?>"></td>
</tr>
<tr>    
	<td>Descrição</td> 
	<td><textarea class="form-control" name="descricao"><?=$produto['descricao']?></textarea></td>
</tr>
<tr>
    <td>Observação <font size="1">(0 é com nota)</font></td>
    <td> <input class="form-control" type="text" name="tipoNota" value="<?=$produto['tipoNota']?>"></td> 