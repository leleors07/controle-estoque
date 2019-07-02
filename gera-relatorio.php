
<?php
$servidor    =  "localhost";                              
$usuario     =  "root";                                   
$senha       =  "";                                       
$bd          =  "cia_loja";                                          
global $title;                 
$end_fpdf    =  "fpdf/";                        
$por_pagina  =  25;                                                  
$end_final   =  "relatorios/loja_php.pdf";  
$tipo_pdf    =  "F";                                      

$conn   =   mysql_connect($servidor, $usuario, $senha);
$db     =   mysql_select_db($bd, $conn);    
$sql    =   mysql_query("SELECT * FROM produtos WHERE tipoNota <> 'xx' and qt_produtos <> 0", $conn);
$totais = mysql_query("SELECT SUM(qt_produtos) AS totalProdutos, SUM(preco*qt_produtos) AS totalPreco FROM produtos WHERE tipoNota <> 'xx'", $conn);
$row    =   mysql_num_rows($sql);           

if(!$row) { echo "Não retornou nenhum registro"; die; }
$paginas   =  ceil($row/$por_pagina);        

define("FPDF_FONTPATH", "$end_fpdf/font/");
require_once("$end_fpdf/fpdf.php");        
$pdf   =   new FPDF();
$linha_atual =  0;
$inicio      =  0;
$cont =1;  
for($x=1; $x<=$paginas; $x++) {
	$inicio      =  $linha_atual;	
	$fim         =  $linha_atual + $por_pagina;
	if($fim > $row) 
	{
		$fim = $row;
	}
	
	#$pdf->Open();                    
	$pdf->AddPage();    
	$pdf->SetFont("Arial", "B", 10); 
	
	$pdf->Cell(185, 8, utf8_decode("Página $x de $paginas"), 0, 0, 'R');  

	$pdf->SetFont("Arial", "B", 20); 
	$pdf->Ln(5); 
	$pdf->Cell(185, 8, utf8_decode("Balanço Confecções Cardoso"), 0, 0, 'L');           
	
	$pdf->SetFont("Arial", "B", 10); 
	$pdf->Ln(10); 
	//RESUMO DO BALANCO
	if($x == 1)
	{
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Cell(60,6,'Quantidade Total de Produtos: ',0,0,'L');
		$totalProdutos = mysql_result($totais,0, "totalProdutos");
		$totalProdutos = number_format($totalProdutos,0);
		$pdf->Cell(20,6,$totalProdutos,0,1,'L');
		$pdf->Cell(25,6,'Valor Total: ',0,0,'L');
		$totalPreco = mysql_result($totais,0, "totalPreco");
		$totalPreco = number_format($totalPreco,2);
		$pdf->Cell(25,6,'R$ '.$totalPreco,0,1,'L');
	}

	
	$pdf->Cell(10, 8, "", 1, 0, 'C');          
	$pdf->Cell(35, 8, "PRODUTO", 1, 0, 'L'); 
	$pdf->Cell(40, 8, utf8_decode("DESCRICÃO"), 1, 0, 'L');   
	$pdf->Cell(35, 8, "QUANTIDADE", 1, 0, 'L'); 
	$pdf->Cell(35, 8, utf8_decode("PREÇO UNIDADE"), 1, 0, 'L'); 
	$pdf->Cell(35, 8, utf8_decode("PREÇO TOTAL"), 1, 1, 'L'); 
	for($i=$inicio; $i<$fim; $i++) {
		$nota = mysql_result($sql, $i, "tipoNota") ;
		$preco = mysql_result($sql, $i, "preco") ;
		$nome = mysql_result($sql, $i, "nome");
		$nome = utf8_decode($nome);
		$descricao = mysql_result($sql, $i, "descricao");
		$descricao = utf8_decode($descricao);
		$qt_produtos = mysql_result($sql, $i, "qt_produtos") ;
			$pdf->Cell(10, 8, $cont, 1, 0, 'C');      
			$pdf->Cell(35, 8, $nome, 1, 0, 'L');    
			$pdf->Cell(40, 8, $descricao, 1, 0, 'L'); 
			$pdf->Cell(35, 8, $qt_produtos, 1, 0, 'C'); 
			$pdf->Cell(35, 8, $preco, 1, 0, 'L'); 
			$pdf->Cell(35, 8, $preco*$qt_produtos, 1, 1, 'L'); 
			$cont++;
		
		$linha_atual++;
	}
}
$pdf->Output();
?>