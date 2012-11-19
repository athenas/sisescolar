<?php
	ini_set( "display_errors", 1);
	include("../verifica_logado.php");
	require("../config.php");
	include_once "../bd.php";
	
	
	$nosso_numero	= $_REQUEST['nossonumero'];
	$dtmovsql		= date('Y-m-d');
	$pago			= $_REQUEST['valor_total'];
	$pago			= str_replace(".", "", $pago);
	$pago			= str_replace(",", ".", $pago);
		
	$desconto		= $_REQUEST['valor_desconto'];
	$desconto		= str_replace(".", "", $desconto);
	$desconto		= str_replace(",", ".", $desconto);
	
	$juros			= $_REQUEST['valor_juros'];
	$juros			= str_replace(".", "", $juros);
	$juros			= str_replace(",", ".", $juros);
	
	$multa			= $_REQUEST['valor_multa'];
	$multa			= str_replace(".", "", $multa);
	$multa			= str_replace(",", ".", $multa);
	
	$acrescimos		= $juros + $multa;
	$liquido		= $pago;
	
	
	
	$query = "call baixar_titulo('$nosso_numero','$dtmovsql',$pago,$desconto,$acrescimos
								,$juros,$multa,$liquido,0,null,null,99,99,99)";
	
	

	$resultado = consulta('athenas',$query);
	
	echo $resultado[0]['resposta'];
?>