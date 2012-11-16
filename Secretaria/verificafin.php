<?php
	include("../verifica_logado.php");
	require("../config.php");
	include_once "../bd.php";
	ini_set( "display_errors", 0);
	
    session_start();
	$_SESSION['serie'] = $_REQUEST['serie'];
	$_SESSION['mat'] = $_REQUEST['mat'];
	$_SESSION['irmao_mat'] = $_REQUEST['irmao_mat'];
	$_SESSION['responsavel_cpf'] = $_REQUEST['cpfresp'];
	$cpf_resp = $_REQUEST['cpfresp'];

	$matricula = $_REQUEST['mat'];
	
	$query = "call verifica_financeiro('2012','$matricula',$cpf_resp);";
	$resultado = consulta('athenas',$query);
	
	if (($resultado[0]['QtdBol'] == 0) || ($resultado[0]['QtdBolAbt'] > 1)){
		header("location:procurar_financeiro.php");
	}else{
	
		$query = "SELECT 1 FROM matriculado WHERE aluno_mat = '$matricula'"; 
		$resultado = consulta('athenas',$query);
		
		if ( count($resultado) > 0){
			header("location:rematricula5.php");
		}else{
			header("location:rematricula4.php");
		}
	}
	
?>
