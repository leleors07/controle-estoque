<?php require_once("logica-usuario.php"); 
logout();
$_SESSION["succes"] = "Deslogado com sucesso";
header("Location: index.php");
die();