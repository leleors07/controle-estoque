<?php require_once("conecta.php");
function listaProdutos($conexao, $nome, $preco, $descricao) {
    $produtos = array();
    if(empty($nome) && empty($preco) && empty($descricao)){
        $query = "select * from produtos ORDER BY `id` DESC";
        $resultado = mysqli_query($conexao, $query);
    }else{
        if(empty($preco) && empty($descricao)){
            $nome .= "%";
            $query ="select * from produtos where nome like '{$nome}'";
            $resultado = mysqli_query($conexao, $query);
        }
        else{
            if(empty($nome) && empty($descricao)){
                $query ="select * from produtos where preco = {$preco}";
                $resultado = mysqli_query($conexao, $query);
            }
            else{
                if (empty($nome) && empty($preco)) {
                    $descricao .= "%";
                    $descricao = "%".$descricao;
                    $query ="select * from produtos where descricao like '{$descricao}'";
                    $resultado = mysqli_query($conexao, $query);
                } 
                else{
                    if (empty($nome)) {
                        $descricao .= "%";
                        $query ="select * from produtos where descricao like '{$descricao}' and preco = {$preco}";
                        $resultado = mysqli_query($conexao, $query);
                    }
                    else{
                        if (empty($preco)) {
                            $nome .= "%";
                            $descricao .= "%";
                            $query ="select * from produtos where descricao like '{$descricao}' and nome like '{$nome}'";
                            $resultado = mysqli_query($conexao, $query);
                        }
                        else{
                            if (empty($descricao)) {
                                $nome .= "%";
                                $query ="select * from produtos where nome like '{$nome}' and preco = {$preco}";
                                $resultado = mysqli_query($conexao, $query);
                            }
                            else{
                                $nome .= "%";
                                $descricao .= "%";
                                $query ="select * from produtos where descricao like '{$descricao}' and nome like '{$nome}' and preco = {$preco}";
                                $resultado = mysqli_query($conexao, $query);
                            }
                        }
                    }
                }
            }
        }
    }

    while($produto = mysqli_fetch_assoc($resultado)) {
        array_push($produtos, $produto);
    }
    return $produtos;

}

function alteraProduto($conexao, $id, $nome,  $descricao, $preco, $qt_produtos, $tipoNota) {
    $query = "update produtos set nome = '{$nome}', descricao = '{$descricao}', 
                preco = {$preco}, qt_produtos = {$qt_produtos}, tipoNota = '{$tipoNota}' where id = '{$id}'";
    return mysqli_query($conexao, $query);
}


function buscaProduto($conexao, $id) {
    $query = "select * from produtos where id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

function insereProduto($conexao, $nome, $descricao, $preco, $qt_produtos, $tipoNota) {
    $query = "insert into produtos (nome, descricao, preco, qt_produtos, tipoNota) values 
                ('{$nome}', '{$descricao}', {$preco}, {$qt_produtos}, '{$tipoNota}')";
    return mysqli_query($conexao, $query);
}

function adicionaProduto($conexao, $id, $quantidade)
{
    $query = "update produtos set qt_produtos = qt_produtos + {$quantidade} where id = '{$id}'";
    return mysqli_query($conexao, $query);
}

function removeProduto($conexao, $id){
    $query = "update produtos set qt_produtos = qt_produtos - 1 where id = '{$id}'";

	return mysqli_query($conexao, $query);
}