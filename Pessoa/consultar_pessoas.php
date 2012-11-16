<?php
	include("../verifica_logado.php");
	require("../config.php");
	include_once "../bd.php";
	ini_set( "display_errors", 0);


	$value = $_REQUEST['valor'];

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
		echo "<td><a href='cadastro.php?cpf=$cpf'>Acessar</a></td>";
		echo "<td>$cpf</td>";
		echo "<td>$nome</td>";
		echo "</tr>";
	}
	
?>

</table>
