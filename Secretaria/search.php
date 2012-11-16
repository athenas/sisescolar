<?php
	include("../verifica_logado.php");
	require("../config.php");
	include_once "../bd.php";
	ini_set( "display_errors", 0);
	header('Content-Type: text/html; charset=iso-8859-1');
	
	
	 $q=$_GET['term'];
	 $my_data=mysql_real_escape_string($q);

	$consulta = $_REQUEST['consulta'];
	if ($consulta == 'lista'){
		$query = "call listaNomes('%$my_data%');";
		$resultado = consulta("acadesc",$query);	
		foreach ($resultado as $row) { $names[] =  array( 
          'id' => $row['Classe']
        , 'label' => $row['Nome']
        , 'value' => $row['Nome']
		, 'info' => $row['Mat']
		, 'cpfresp' => $row['CPFResp']);
		 }
	
		//echo "<pre>";
		//print_r($names);
		//echo "</pre>";
		echo json_encode($names);
	}
	if ($consulta == 'matricula'){
		
		$serie = $_REQUEST['serie'];
		$query = "call consulta_matriculados($serie,'%$my_data%');";
		$resultado = consulta("athenas",$query);	
		foreach ($resultado as $row) {
		 $names[] =  array( 
          'id' => $row['aluno_mat']
        , 'label' => $row['aluno_nome']
        , 'value' => $row['Nome']);
		 }
		echo json_encode($names);
	}
	if ($consulta == 'pessoa'){
		
		$cpf = $_REQUEST['cpf'];
		$query = "Select * from pessoa where nCdPessoa = $cpf";
		$resultado = consulta("athenas",$query);	
		
		
		echo json_encode($resultado[0]);
	}
	
?>