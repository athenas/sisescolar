<?php
	ini_set( "display_errors", 0);

	@header('Content-Type: text/html; charset=utf-8');
	$fileXML = $_REQUEST['processo'].".xml";
	$xml = simplexml_load_file($fileXML);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>Dados Cadastrais</title>
   <link href="/css/estilo.css" rel="stylesheet" type="text/css"> </script>
   <link href="/css/jquery-ui.css" rel="stylesheet" type="text/css"> </script>
   <link href="/css/flexigrid.pack.css" rel="stylesheet" type="text/css"> </script>
   <script src="/js/jquery.js" type="text/javascript"></script>
   <script src="/js/jquery-ui.js" type="text/javascript"></script>
   <script src="/js/consulta_inss_historico.js" type="text/javascript"></script>
   <script src="/js/flexigrid.pack.js" type="text/javascript"></script>
   
	<script>
	$(document).ready(function(){
		$("#btnIncluir").click(function(){
			
			ddd = $("#ddd").val();
			tel = $("#telefone").val();
			
			$("#tabela").last().append("<tr><td>"+ddd+"</td><td>"+tel+"</td></tr>");
			
			$("#ddd").val("");

			return false;
		});
		
	});
	</script>
</head>

<body>
	<form>
	<label>DDD</label>
	<input type="text" id="ddd" size="5" />
	<label>Telefone</label>
	<input type="text" id="telefone" size="20" />
	<br/>
	<button id="btnIncluir"></button>
	
	<table id="tabela" >
		<thead>
			<tr>
				<td>DDD</td>
				<td>Telefone</td>
			</tr>
		</thead>
		<tr>
			<td><label>Remover</label></td>
			<td>11</td>
			<td>46535059</td>
		</tr>
		<tr>
			<td>11</td>
			<td>46573789</td>
		</tr>
	</table>
	</form>
</body> 
</html>  