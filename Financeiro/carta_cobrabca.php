<?php
	 include("../verifica_logado.php");
	require("../config.php");
	include_once "../bd.php";
	include_once "../geral.php";
	ini_set( "display_errors", 0);
	session_start();
	
	$matricula = $_SESSION['mat'];
	
	$query = "SELECT * FROM matriculado WHERE aluno_mat = '$matricula'"; 
	
	//$resultado = consulta("athenas",$query);
	
	$registro = $resultado[0];
	

	switch ($registro['serie']) {
		case 1: $curso_name = 'ENSINO FUNDAMENTAL I -  1&deg; ANO';
			break;
		case 2: $curso_name = 'ENSINO FUNDAMENTAL I -  2&deg; ANO';
			break;
		case 3: $curso_name = 'ENSINO FUNDAMENTAL I -  3&deg; ANO';
			break;
		case 4: $curso_name = 'ENSINO FUNDAMENTAL I -  4&deg; ANO';
			break;
		case 5: $curso_name = 'ENSINO FUNDAMENTAL I -  5&deg; ANO';
			break;
		case 6: $curso_name = 'ENSINO FUNDAMENTAL II -  6&deg; ANO';
			break;
		case 7: $curso_name = 'ENSINO FUNDAMENTAL II -  7&deg; ANO';
			break;
		case 8: $curso_name = 'ENSINO FUNDAMENTAL II -  8&deg; ANO';
			break;
		case 9: $curso_name = 'ENSINO FUNDAMENTAL II -  9&deg; ANO';
			break;
		case 10: $curso_name = 'ENSINO MEDIO -  1&deg; ANO';
			break;
		case 11: $curso_name = 'ENSINO MEDIO -  2&deg; ANO';
			break;
		case 12: $curso_name = 'ENSINO MEDIO -  3&deg; ANO';
			break;
		
	}
	
	$aluno_nome = $registro['aluno_nome'];
	$aluno_dtnasc = $registro['aluno_dtnasc'];
	$aluno_naturalidade = $registro['aluno_naturalidade'];;
	$aluno_nacionalidade = $registro['aluno_nacionalidade'];;
	$aluno_rgra = $registro['aluno_rg'];;
	$aluno_curso = $curso_name;
	
	$contratante_nome = $registro['resp_nome'];
	$contratante_grau_parentesco = $registro['resp_parentesco'];
	$contratante_nacionalidade = $registro['resp_nacionalidade'];
	$contratante_rg = $registro['resp_rg'];
	$contratante_cpf =$registro['resp_cpf'];
	$contratante_profissao = $registro['resp_profissao'];
	$contratante_end_residencial = $registro['resp_end_res_end']." - ".$registro['resp_end_res_bairro']." - ".$registro['resp_end_res_cidade']." - ".$registro['resp_end_res_uf'];
	$contratante_end_comercial = $registro['resp_end_com_end']." - ".$registro['resp_end_com_bairro']." - ".$registro['resp_end_com_cidade']." - ".$registro['resp_end_com_uf'];
	$contratante_tel_comercial = "(".$registro['resp_com_ddd'].")".$registro['resp_com_tel'];
	$contratante_tel_residencial =  "(".$registro['resp_res_ddd'].")".$registro['resp_res_tel'];
	$contratante_tel_celular =  "(".$registro['resp_cel_ddd'].")".$registro['resp_cel_tel'];
	$contratante_naturalidade =  $registro['resp_naturalidade'];
	$contratante_est_civil = $registro['resp_est_civ'];
	
	$valor =  $registro['val_mensalidade'];
	$qtd_parcela =  $registro['fpg_mensalidade'];
	
	$valor_parcela = 490;
	
	if ($qtd_parcela == 1){
		$qtd_parcela = 12;
	}
	
	$valor_parcela = $valor / $qtd_parcela;
	
	
	$vencimento = '5. DIA UTIL';
	$valor_extenso = htmlentities(extenso($valor),ENT_QUOTES,'UTF-8');
	
?>
<html>
<head>
	<meta charset="UTF-8" />
	
	<style type="text/css" media="all">
		
		body{
			font-family:"Times New Roman";
			font-size: 10; 
			
			
		}
		.texto{
			font-family:"Times New Roman";
			font-size: 12; 
		}
		.minititle{
			font-family:"Times New Roman";
			font-size: 8; 
			
		}
		table.tabela{
			border-width: 0.3px;
			border-spacing: 0px;
			border-style: solid;
			border-color: black;
			border-collapse: collapse;
		}
		table.tabela th {
			border-width: 0.3px;
			padding: 5px;
			border-bottom: none;
			border-color: black;
			text-align:left;
			
			
		}
		table.tabela td {
			border-width: 0.5px;
			padding: 5px;
			padding-top: 0px;
			border-style: solid;
			border-top-style:none;
			border-color: black;
			
			
		}
	.paragrafo{
		text-indent:10mm;
		text-align:justify;
		font-family:"Times New Roman";
		font-size: 14; 
		line-height: 150%;
	}
	
	table.tbassinatura{
		
	}
		
		
	</style>
	
</head>

<body>
 
<div align="center" style="width: 800px" >
<p class='paragrafo'>
	Prezado Senhor (a):  <b>Daniela Teixeira Agonilha</b>
</p>
<p class='paragrafo'>
	Vimos por meio desta informar -lhe que encontra-se em nosso poder título de sua responsabilidade acusando falta de pagamento.
</p>
<p class='paragrafo'>
	Solicitamos seu comparecimento no prazo improrrogável de 48 (quarenta e oito) horas, para regularização desta pendência.
	Deram-nos amplos poderes de negociação e estamos certos que nada poderá impedir a solução desta pendência.
</p>
	<p class='paragrafo'>Expediente:
	<br/>
	<b>
	<span style="margin-left:10mm;"> Segunda a Quinta: Das 07h00min às 16h30min </span> <br/>
	<span style="margin-left:10mm;"> Sexta-feira: Das 07h00min às 15h30min
	</b>
	</p>
</p>
<p class='paragrafo'>
	No intuito de evitar graves transtornos em sua ficha cadastral na praça, proporcionamos-lhes várias oportunidades para a regularização do débito referenciado, sem que V.S.a  levassem na devida conta a gravidade do assunto.
 	<br/>
 	<span style="margin-left:10mm;">A falta de pagamento implicará o relacionamento de sua dívida para exame de nosso setor jurídico e posterior cobrança judicial executiva.</span> 

</p>
<p class='paragrafo'>
	E por estarem assim de acordo, justas e contratadas, as partes assinam o presente instrumento particular em 02 (duas) vias de igual teor e conte&uacute;do, e para um s&oacute; efeito, na presente das testemunhas abaixo, para que produzam seus efeitos legais.
</p>
<p class='paragrafo'>
	<b>(Caso V.S.a já tenha efetuado o pagamento, favor contatar-nos pelo telefone (11) 4651-2729  para tornar este aviso sem efeito.)</b>
</p>
<p class='paragrafo'>
	Aguardando uma solução urgente para o assunto, subscrevemo-nos
</p>
<p class='paragrafo'>
Atenciosamente,
</p>
</div>
</body>
</html>