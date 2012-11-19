<?php
	ini_set( "display_errors", 0);
   include("../verifica_logado.php");
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
		$( "#btnpesq" ).click(function(){
        	_cpf = $("#cpf").val()
        	$.ajax({
			  url: '../Secretaria/search.php',
			  dataType: 'json',
			  data: { consulta: 'pessoa',cpf:_cpf  },
			  
			  success: function(json){
			  	$("#pessoa_nome").val(json.cNome);
			 
			  
			  }
			  
			});
        	
        });
        $("input[name=tpConsulta]").click(function(){
			_tpConsulta = $("input[name=tpConsulta]:checked").val();
			_cpf = $("#cpf").val();
			$.ajax({
			  url: '../Financeiro/consulta_titulos.php',
			 
			  data: { tpConsulta:_tpConsulta ,cpf:_cpf, obs:'carne'  },
			  
			  success: function(html){
			 	$("#titulos_resultado").html(html); 
			  }
			  
			});
		});
		$("#btnGerar").click(function(){
			_valores = "";
			$('input[name=boleto]:checked').each(function(){
				_valores = _valores + $(this).val() +';';
				
				var width = 850;
			    var height = 600;
			    var left = parseInt((screen.availWidth/2) - (width/2));
			    var top = parseInt((screen.availHeight/2) - (height/2));
			    var windowFeatures = "width=" + width + ",height=" + height + ",scrollbars=yes,status,resizable,left=" + left + ",top=" + top + "screenX=" + left + ",screenY=" + top;
			   
			    window.open("../Boleto/gerarboletos.php?nCdBoleto="+_valores, "Contrato", windowFeatures);
				
				
				
			});
			return false;
			
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
                     
                         
                     	<div id="tabs">
                     		<ul>
                     			<li><a href="#geral">Imprimir Carne</a></li>
                     			 			
                     		</ul>
                     	
						<div id="geral" style='height:385px;padding-left: 5px;overflow: auto '>
						  <label style="margin-top:15px">CPF</label>
						  <input id="cpf" name="cpf" type="text" size="15" title="CPF / Nome" />
						  <img src="../image/search-icon.png" name="btnpesq" id="btnpesq" height="15px" >
						  <br/>
	                 	  <label style="margin-top:5px;">Nome</label>
	                 	  <input type="text" size="40" name="pessoa_nome" id="pessoa_nome" />
	                 	  <br/>
	                 	  <input name="tpConsulta" type="radio" value="AB" style="margin-top:5px;" >&nbsp;Abertos</input>
						  <input name="tpConsulta" type="radio" value="AT" style="margin-left:15px" >&nbsp;Atrasados</input>
						  <input name="tpConsulta" type="radio" value="HJ" style="margin-left:15px" >&nbsp;Hoje</input>
						  <table>
								<thead>
									<tr>
										
									<td width='150px'>Nosso Numero</td>
									<td width='150px'>Seu Numero</td>
									<td width='100px'>Vencimento</td>
									<td width='100px'>Valor Titulo</td>
									
									
									</tr>
								</thead>
							</table>
						  <div id="titulos_resultado" style="height:260px;overflow: auto"></div>
						  <button style="margin-left: 680px" id="btnGerar">Imprimir</button>
						</div>
					
						
                      </div>
                     
                     </p>
                 </form>
             </div>
             
             <?php include "../footer.inc" ?>
         	 
         </div>
</body>   