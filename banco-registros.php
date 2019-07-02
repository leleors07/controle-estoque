<?php require_once("conecta.php");
function insereRegistro($conexao, $tipoReg, $idTipo)
{
	$query = "insert into registros (tipoReg, idTipo) values 
                ('{$tipoReg}',{$idTipo})";
    return mysqli_query($conexao, $query);
}

function listaRegistros($conexao)
{
    $registros = array();
    $query = "select * from registros ORDER BY `dataReg` DESC";
    $resultado = mysqli_query($conexao, $query);
    while($registro = mysqli_fetch_assoc($resultado)) {
        array_push($registros, $registro);
    }

    return $registros;
}