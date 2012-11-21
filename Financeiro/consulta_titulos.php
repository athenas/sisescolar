<?php
	 include("../verifica_logado.php");
	require("../config.php");
	include_once "../bd.php";
	include_once "../geral.php";
	ini_set( "display_errors", 0);
	session_start();

	$tipo = $_REQUEST['tpConsulta'];
	$cpf = $_REQUEST['cpf'];
	$obs = $_REQUEST['obs'];
	
	$cpf = str_replace(".", "", $cpf);
	$cpf = str_replace("-", "", $cpf);
	
	if (($cpf != "") && ($tipo != "")){

		$query = "SELECT * FROM titulos where nCdPessoa = $cpf";
		
		if ($tipo == 'BX'){
			$query .=" and TipDtOcorrencia is not null";
		}
		if ($tipo == 'AT'){
			$query .=" and TipDtOcorrencia is null and dVcto < CURDATE()";
		}
		if ($tipo == 'AB'){
			$query .=" and TipDtOcorrencia is null";
		}
		if ($tipo == 'HJ'){
			$hoje = date('Y-m-d');
			$query .= " and dEmissao = '$hoje'";
		}
		if ($tipo == "ACAB"){
			$query  = "Select nNossoNumero, SeuNum, dVcto, nVlrTitulo, nVlrJuros * DATEDIFF(CURDATE(),dVcto) AS VlrJuros
						, nVlrMulta, nVlrTitulo + (nVlrJuros * DATEDIFF(CURDATE(),dVcto)) + nVlrMulta as VlrTotal
						from titulos where nCdPessoa = $cpf and TipDtocorrencia is null and dVcto < CURDATE()
						union all 
						Select nNossoNumero, SeuNum, dVcto, nVlrTitulo, 0, 0, nVlrTitulo
						from titulos where nCdPessoa = $cpf and TipDtocorrencia is null and dVcto >= CURDATE();";
		}
		if ($tipo == "ACAT"){
			$query = "Select nNossoNumero, SeuNum, dVcto, nVlrTitulo, nVlrJuros * DATEDIFF(CURDATE(),dVcto) AS VlrJuros
						, nVlrMulta, nVlrTitulo + (nVlrJuros * DATEDIFF(CURDATE(),dVcto)) + nVlrMulta as VlrTotal
					from titulos where nCdPessoa = $cpf and TipDtocorrencia is null and dVcto < CURDATE()";
		}
		$registros = consulta("athenas",$query);
	}
	
	
	
?>
<table>
<?php	
	$total = 0;
	foreach($registros as $registro){
		echo "<tr>";
		
		if (($registro['TipDtOcorrencia'] == "") && ($obs == "")) {
			echo "<td width='150px'><a href='#' class='boleto'>".$registro['nNossoNumero']."</a></td>";
		}else{
			
			echo "<td width='150px'>";
			if ($obs == 'carne'){
				echo "<input type='checkbox' name='boleto' value='".$registro['nNossoNumero']."' />&nbsp;";
			}
			echo $registro['nNossoNumero']."</td>";
		}
		echo "<td width='150px'>".$registro['SeuNum']."</td>";
		echo "<td width='100px'>".date('d/m/Y',strtotime($registro['dVcto']))."</td>";
		echo "<td width='100px'>".number_format($registro['nVlrTitulo'],2,",",".")."</td>";
		if ($obs == ""){
			if ($registro['TipDtOcorrencia'] == ""){
				 echo "<td width='100px'></td>"; 
			}else{
				echo "<td width='100px'>".date('d/m/Y',strtotime($registro['TipDtOcorrencia']))."</td>";
			}
			
			echo "<td width='100px'>".number_format($registro['nVlrPago'],2,",",".")."</td>";
		}
		if (($tipo == "ACAB") || ($tipo == "ACAT")){
			echo "<td width='100px'>".number_format($registro['nVlrMulta'],2,",",".")."</td>";
			echo "<td width='100px'>".number_format($registro['VlrJuros'],2,",",".")."</td>";
			echo "<td width='100px'>".number_format($registro['VlrTotal'],2,",",".")."</td>";
			$total = $total + $registro['VlrTotal'];
		}
		
		echo "</tr>";
	}
	if (($tipo == "ACAB") || ($tipo == "ACAT")){
			echo "<tr>";
			echo "<td></td><td></td><td></td><td></td><td></td><td></td>";
			echo "<td width='100px'>".number_format($total,2,",",".")."</td>";
			echo "</tr>";
			
		}
?>
</table>