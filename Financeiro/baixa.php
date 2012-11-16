<?php
	ini_set( "display_errors", 0);
	setlocale(LC_ALL, NULL);
	setlocale(LC_ALL, 'pt_BR');
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

<script>
	$(function() {
		$( "#tabs" ).tabs();
		//$("#nossonumero").mask("999999999999999-9")
        $( "#btnpesq" ).click(function(){
        	
        	_nossonumero = $("#nossonumero").val()
        	$.ajax({
			  url: 'consulta_titulo2.php',
			  dataType: 'json',
			  data: { nossonumero: _nossonumero },
			  
			  success: function(json){
			  	$("#pessoa_nome").val(json.nome);
			  	$("#seunumero").val(json.seu_num);
			  	$("#vencimento").val(json.vcto);
			  	$("#valor_titulo").val(json.valor);
			  	$("#valor_desconto").val(json.desconto);
			  	$("#valor_multa").val(json.multa);
			  	$("#valor_juros").val(json.juros);
			  	$("#valor_total").val(json.total);
			  	
			 
			  
			  }
			  
			});
        	
        });
    });
	
    </script>
	</script>
</head>

<body>
       <div id="container">
            <?php include "../header.inc" ?>
            <div id="menu"><?php include "../menu.inc"; ?></div>
           
            <div id="content">
            	
                <form name="frm1" id="frm1" method="post" action="gerar_parcelas.php">
                	
                	<div id="tabs">
                     		<ul>
                     			<li><a href="#geral">Gerar Titulos</a></li>
                     			 			
                     		</ul>
                	
                  
                   <div id="geral" style='height:415px;padding-left: 5px;overflow: auto '>
                     	
                 	 	<label style="width:100">Nosso Numero</label>
                 	 	<input type="text" size="19" name="nossonumero" id="nossonumero" />
                 	 	<img src="../image/search-icon.png" name="btnpesq" id="btnpesq" height="15px" >
                 	 	<br/>
                 	 	<label style="margin-top:5px;width:100">Nome</label>
                 	 	<input type="text" size="40" name="pessoa_nome" id="pessoa_nome" readonly="readonly" />        	 
                 	 	<br/>
                 	 	<label style="margin-top:5px;width:100">Seu Numero</label>
                 	 	<input type="text" size="10" name="seunumero" id="seunumero" style="text-align:right" readonly="readonly" />
                 	 	<br/>
                 	 	<label style="margin-top:5px;width:100">Vencimento</label>
                 	 	<input type="text" size="10" name="vencimento" id="vencimento" value="" readonly="readonly" />
                 	 	<br/>
                 	 	<label style="margin-top:5px;width:100">Vlr Titulo</label>
                 	 	<input type="text" size="10" name="valor_titulo" id="valor_titulo" value="0,00" style="text-align:right" readonly="readonly" />
                 	 	<br/>
                 	 	<label style="margin-top:5px;width:100">Vlr Desconto</label>
                 	 	<input type="text" size="10" name="valor_desconto" id="valor_desconto" value="0,00" style="text-align:right"  readonly="readonly" />
                 	 	<br/>
                 	 	<label style="margin-top:5px;width:100">Vlr Multa</label>
                 	 	<input type="text" size="10" name="valor_multa" id="valor_multa" value="0,00" style="text-align:right"  readonly="readonly" />
                 	 	<br/>
                 	 	<label style="margin-top:5px;width:100">Vlr Juros</label>
                 	 	<input type="text" size="10" name="valor_juros" id="valor_juros" value="0,00" style="text-align:right" readonly="readonly"  />
                 	 	<br/>
                 	 	<label style="margin-top:5px;width:100">Vlr Total</label>
                 	 	<input type="text" size="10" name="valor_total" id="valor_total" value="0,00" style="text-align:right"  readonly="readonly" />
                 	 
                 	 	<br/>
                 	 	
                 	 	<button style="margin-top:30px;">Gerar</button>
   					 </div>
   					</div>
                 </form>
             </div>
             
             <?php include "../footer.inc" ?>
         	 
         </div>
</body>   