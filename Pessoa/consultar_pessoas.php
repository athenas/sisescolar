<?php
	ini_set( "display_errors", 0);
	include("../verifica_logado.php");
	require("../config.php");
	include_once "../bd.php";
	


	$value = $_REQUEST['valor'];
	$popup = $_REQUEST['popup'];
	$query = "SELECT * FROM pessoa where cNome like '%$value%' or nCdPessoa = '$value';";
	
	$registros = consulta('athenas', $query);	
?>

	<table width="100%">
		<thead>
			<tr >
				<td></td>
				<td>CPF / CNPJ</td>
				<td>Nome</td>
			</tr>
		</thead>
	
<?php
	$i = 0;
	foreach($registros as $registro){
		$i++;
		if ($i%2 == 0){
			$color = 'white';
		}else{
			$color = 'gray';
		}
		$cpf = $registro['nCdPessoa'];
		$nome = $registro['cNome'];
		
		echo "<tr style='background-color: $color'>";
		if ($popup = "sim"){
			echo "<td><a href='#' name='selecionar' cpf='$cpf' nome='$nome' >Acessar</a></td>"; 
		}else{
			echo "<td><a href='cadastro.php?cpf=$cpf' >Acessar</a></td>";
		}
		echo "<td>$cpf</td>";
		echo "<td>$nome</td>";
		echo "</tr>";
	}
	
?>

</table>
