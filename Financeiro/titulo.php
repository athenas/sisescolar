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
   
   
	<script>
	$(function() {
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
                     	
                 	 	<label>CPF</label>
                 	 	<input type="text" size="15" name="cpf" id="cpf" />
                 	 	<img src="../image/search-icon.png" name="btnpesq" id="btnpesq" height="15px" >
                 	 	<br/>
                 	 	<label style="margin-top:5px;">Nome</label>
                 	 	<input type="text" size="40" name="pessoa_nome" id="pessoa_nome" />
                 	 	<br/>
                 	 	<label style="margin-top:5px;">Referencia</label>
                 	 	<select id="ref" name="ref">
                 	 		<option value="1">1 - Mensalidade</option>
                 	 		<option value="2">2 - Material Didatico</option>
                 	 		<option value="3">3 - Uniforme</option>
                 	 		<option value="4">4 - Documentacao</option>
                 	 		<option value="5">5 - Seguro</option>
                 	 		<option value="6">6 - Dosimentro</option>
                 	 		<option value="7">7 - Acordo</option>
                 	 		<option value="9">9 - Outros</option>
                 	 	</select>
                 	 
                 	 	<br/>
                 	 	<label style="margin-top:5px;">Qtd Parcela</label>
                 	 	<input type="text" size="8" name="titulo_qtd" value="1" style="text-align:right"/>
                 	 	<br/>
                 	 	<label style="margin-top:5px;">Vlr Parcela</label>
                 	 	<input type="text" size="8" name="titulo_valor" style="text-align:right"/>
          
                 	 	<br/>
                 	 	<label style="margin-top:5px;">Vlr Desconto</label>
                 	 	<input type="text" size="8" name="titulo_deconto" value="0,00" style="text-align:right" />
                 	 	<br/>
                 	 
                 	 	<label style="margin-top:5px;">Vencimento</label>
                 	 	<input type="text" size="6" name="titulo_vencimento" value="5"/>
                 	 	<input type="radio" name="titulo_tp_vencimento" value="DU" checked="checked" > Dia Util </input>
                 	 	<input type="radio" name="titulo_tp_vencimento" value="DM"> Dia do Mês </input>
                 	 	<br/>
                 	 	<label style="margin-top:5px;">Primeiro Vcto</label>
                 	 	<select name="mes_inicio">
                 	 		<?php 
                 	 			$mes = date('m');
								$ano = date('Y');
                 	 			for($i = 0; $i <= 6; $i++){
                 	 				$vcto = mktime(0,0,0,$mes+$i,1,$ano);
                 	 				$value = date('Ym',$vcto);
									$display =  strftime("%B/%Y",  $vcto );  
                 	 				echo "<option  value='$value'>$display</option>"; 
								}
                 	 		
                 	 		?>
                 	 	</select>
                 	 	<br/>
                 	 	
                 	 	<button style="margin-top:30px;">Gerar</button>
   					 </div>
   					</div>
                 </form>
             </div>
             
             <?php include "../footer.inc" ?>
         	 
         </div>
</body>   