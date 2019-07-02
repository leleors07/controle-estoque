<?php error_reporting(E_ALL ^ E_NOTICE);
require_once ("mostra-alerta.php");?>

<html>
<head>
    <title>MLT</title>
    <meta charset="utf-8">
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/loja.css" rel="stylesheet" />
</head>

<body>

    <nav class="navbar navbar-default navbar-fixed-top test" >
        <div class="container">
            <div class="navbar-header">
            	<a class="navbar-brand test" href="index.php">MLT</a>
            </div>
            <div>
               <ul class="nav navbar-nav">
                   <li  ><a href="produto-formulario.php">Adiciona Produto</a></li>
                   <li><a href="produto-lista.php">Lista Produtos</a></li>
                   <li><a href="produto-lista-registros.php">Registros</a></li>
                   <li><a href="gera-relatorio.php">Gerar Relatorio</a></li>
                   <li><a href="contato.php">Sobre</a></li>
               </ul>
           </div>
       </div>
   </nav>

   <div class="container">

    <div class="principal">
        <?php mostraAlerta("success"); ?>
        <?php mostraAlerta("danger"); ?>