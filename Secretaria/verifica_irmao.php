<?php
	include("../verifica_logado.php");
    require("../config.php");
	include_once "../bd.php";
	ini_set( "display_errors", 0);
	
	
	$cpfresp = $_REQUEST['cpfresp'];
	$serie   = $_REQUEST['serie'];
	

	$query = "SELECT aluno_mat FROM matriculado where resp_cpf = $cpfresp and serie >= $serie";
	
	$resultado = consulta("athenas", $query);
	

	echo $resultado[0]['aluno_mat'];

?>