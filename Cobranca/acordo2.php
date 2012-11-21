<?
	require("../config.php");
	include_once "../bd.php";
	include_once "../geral.php";
	ini_set( "display_errors", 1);
	session_start();
	
	$cpf 			= $_REQUEST['cpf'];
	$usuario 		= $_SESSION['nCdUsuario'];
	$parcelas 		= $_REQUEST['parcelas'];
	$valor 			= $_REQUEST['vlrTotal'];
	$primeiroVcto 	= $_REQUEST['dt_vcto'];
	$boletos 		= $_REQUEST['boletos'];
	$desconto		= $_REQUEST['vlrDesconto'];
	
	$boletos = substr($boletos, 0, strlen($boletos)-1);
	
	list($dia,$mes,$ano) = explode("/",$primeiroVcto);
	$primeiroVcto = "$ano-$mes-$dia";
	
	$valor 			= str_replace(".", "", $valor);
	$valor 			= str_replace(",", ".", $valor);
	
	$dataSql = date("Y-m-d");
	
	$query  = "call gerar_acordo($cpf,$usuario,$parcelas,$valor,'$primeiroVcto')";
	
	echo "<br/>".$query."<br/>";
	
	$resultado = consulta('athenas',$query);
	
	$nCdAcordo = $resultado[0]['nCdAcordo'];
	
	//Baixa os Boletos
	$boletos = split(',',$boletos);
	foreach($boletos as $boleto){
		$query = "call baixar_titulo('$boleto','$dataSql',0,0,0
				 ,0,0,0,0,'$dataSql','$dataSql','00','00','00','98',$nCdAcordo);";
		echo $query."<br/>";
		consulta('athenas', $query);
	}
	

	//Gera NossoNumero
	$query = "SELECT * FROM Titulos where nCdPessoa = $cpf and nNossoNumero is null";
	echo $query."<br/>";
	$resultado = consulta('athenas',$query);
	foreach($resultado as $registro){
		$nCdBoleto = $registro['nCdBoleto'];
		$nosso_numero = gerarNossoNumero($nCdBoleto);
		$query = "UPDATE Titulos set nNossoNumero = '$nosso_numero' where nCdBoleto = $nCdBoleto";
		echo $query."<br/>";
		consulta('athenas',$query);
	}
?>