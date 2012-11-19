<?php
	include("../verifica_logado.php");
	ini_set( "display_errors", 0);
	require("../config.php");
	include_once "../bd.php";
	$cpf = $_REQUEST['cpf'];
	$query = "Select * from pessoa where nCdPessoa = $cpf";
	$registro = consulta("athenas", $query);
	$registro = $registro[0];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>Dados Cadastrais</title>
   <link href="/css/estilo.css" rel="stylesheet" type="text/css"> </script>
   <link href="/css/jquery-ui.css" rel="stylesheet" type="text/css"> </script>
   <script src="/js/jquery.js" type="text/javascript"></script>
   <script src="/js/jquery-ui.js" type="text/javascript"></script>
   <script src="/js/jquery_masc.js" type="text/javascript"></script>
   <script src="/js/pessoa_cadastro.js" type="text/javascript"></script>
 	
   
	<script>
	$(document).ready(function(){
		$( "#tabs" ).tabs();
		$("#nCdPessoa").mask("999.999.999-99");
		$("#cep").mask("99999-999");
		$("#tpPessoa").change(function(){
			if ($(this).val() == "F"){
				$("#nCdPessoa").mask("999.999.999-99");
			}else{
				$("#nCdPessoa").mask("99.999.999/9999-99");
			}
		});
		$("input[name=tpConsulta]").click(function(){
			_tpConsulta = $("input[name=tpConsulta]:checked").val();
			_cpf = $("#nCdPessoa").val();
			$.ajax({
			  url: '../Financeiro/consulta_titulos.php',
			 
			  data: { tpConsulta:_tpConsulta ,cpf:_cpf  },
			  
			  success: function(html){
			 	$("#financeiro_resultado").html(html); 
			  }
			  
			});
		});
		$(".boleto").live('click', function(){
			var width = 850;
		    var height = 600;
		    var left = parseInt((screen.availWidth/2) - (width/2));
		    var top = parseInt((screen.availHeight/2) - (height/2));
		    var windowFeatures = "width=" + width + ",height=" + height + ",scrollbars=yes,status,resizable,left=" + left + ",top=" + top + "screenX=" + left + ",screenY=" + top;
		   
		    window.open("../Boleto/gerarboletos.php?nCdBoleto="+$(this).text(), "Contrato", windowFeatures);
		});
	});
	</script>
</head>

<body>
       <div id="container">
            <?php include "../header.inc" ?>
            <div id="menu"><?php include "../menu.inc"; ?></div>
           
            <div id="content">
            	
                <form method="post" >
                     <p><h2>CADASTRO</h2>
                         
                     	<div id="tabs">
                     		<ul>
                     			<li><a href="#geral">Dados Gerais</a></li>
                     			<li><a href="#financeiro">Financeiro</a></li>              			
                     		</ul>
                     	
						<div id="geral" style='height:345px;padding-left: 5px '>
							<label style='margin-top:5px'>Pessoa</label>
							<select id="tpPessoa">
								<option value="F">Fisica</option>
								<option value="J">Juridica</option>
							</select>
							<br/>
							<label id="nCdPessoa_label" style="margin-top:5px">CPF</label>
							<input id="nCdPessoa" type="text" size='20' value='<?php echo str_pad($registro['nCdPessoa'],11,"0",STR_PAD_LEFT); ?>'/>
							<br/>
							<label  style="margin-top:5px">Nome</label>
							<input id="nome" name="nome" type="text" size='50'  value='<?php echo $registro['cNome']; ?>'/>
							<br/>
							<label style="margin-top:5px">CEP</label>
							<input id="cep" name="cep" type="text" size='10' value='<?php echo str_pad( $registro['nCEP'],8,"0",STR_PAD_LEFT); ?>; ?>'/>
							<br/>
							<label style="margin-top:5px">Endereco</label>
							<input id="endereco" name="endereco" size='50' type="text"  value='<?php echo $registro['cLogradouro']; ?>'/>
							
							<label  style="margin-top:5px">Numero</label>
							<input id="endereco_nr" name="endereco_nr" size='5' type="text" value='<?php echo $registro['nLogradouroNr']; ?>'/>
							
							<label  style="margin-top:5px">Complemento</label>
							<input id="endereco_complemento" name="endereco_complemento" size='10' type="text" value='<?php echo $registro['cComplemento']; ?>'/>
							<br/>
							<label  style="margin-top:5px">Bairro</label>
							<input id="bairro" name="bairro" type="text" size='30'  value='<?php echo $registro['cBairro']; ?>'/>
							
							<label  style="margin-top:5px">Cidade</label>
							<input id="cidade" name="cidade" type="text" size='30' value='<?php echo $registro['cCidade']; ?>'/>
							
							<label  style="margin-top:5px">UF</label>
							<input id="uf" name="uf" type="text" size='3' value='<?php echo $registro['cUF']; ?>'/>
						</div>
						<div id="financeiro" style='height:345px;padding-left: 5px '>
							<input name="tpConsulta" type="radio" value="AB"  >&nbsp;Abertos</input>
							<input name="tpConsulta" type="radio" value="BX" style="margin-left:15px" >&nbsp;Baixados</input>
							<input name="tpConsulta" type="radio" value="AT" style="margin-left:15px" >&nbsp;Atrasados</input>
							<input name="tpConsulta" type="radio" value="TD" style="margin-left:15px" >&nbsp;Todos</input>
							<input name="tpConsulta" type="radio" value="HJ" style="margin-left:15px" >&nbsp;Hoje</input>
							<br/>
							<br/>
							<table>
								<thead>
									<tr>
										
									<td width='150px'>Nosso Numero</td>
									<td width='150px'>Seu Numero</td>
									<td width='100px'>Vencimento</td>
									<td width='100px'>Valor Titulo</td>
									<td width='100px'>Dt. Pgto</td>
									<td width='100px'>Valor Pago</td>
									
									</tr>
								</thead>
							</table>
							<div id="financeiro_resultado" style="height:290px;overflow: auto">
								
							</div>
							
						</div>
						
						
                      </div>
                     <input type="button" value="Atualizar" class="sbtn" />  
                    
                 </form>
             </div>
             
             <?php include "../footer.inc" ?>
         	 
         </div>
</body>   