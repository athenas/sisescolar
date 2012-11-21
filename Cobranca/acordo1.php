<?php
	ini_set( "display_errors", 0);
	include("verifica_logado.php");
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
        $( "#nome" ).autocomplete({
            source: "search.php?consulta=lista",
            minLength: 2,
            select: function( event, ui ) {
            	$("#serie").val(ui.item.id);
            	$("#mat").val(ui.item.info);
               
            }
        });
        $("#dt_vcto").change(function(){
        	
        	$.ajax({
				  url: 'acordo_recalculo.php',
				  dataType: 'json',
				  data: { recalculo: "sim"
				  		, boletos: $("#boletos").val()
				  		, cpf:	$("#cpf").val()
				  		, dt_vcto: $("#dt_vcto").val()
				  		},
				  success: function(json){
				  	$("#vlrTotal").val(json.VlrTotal);
				  	$("#lbvlrTotal_1").text("1x "+json.VlrTotal);
				  	$("#lbvlrTotal_2").text("2x "+json.Vlr2);
				  	$("#lbvlrTotal_3").text("3x "+json.Vlr3);
				  	$("#desc1").val(json.Desc1);
				  	$("#desc2").val(json.Desc2);
				  	$("#vlrDesconto").val("0,00");
				  }
				  
				});
        	
        	
        	
        });
        $("input[name=parcelas]").change(function(){
        	$("#vlrDesconto").val("0,00");
        });
        $("#vlrDesconto").change(function(){
        	_descontoMaximo = "0,00";
        	if ($("#vlrTotal_1").is(':checked')){
        		_descontoMaximo = $("#desc1").val();
        	}
        	if ($("#vlrTotal_2").is(':checked')){
        		_descontoMaximo = $("#desc2").val();
        	}
        	
        	
        	 _descontoMaximo = _descontoMaximo.replace(",",".");
        	 _desconto = $(this).val();
        	 _desconto = _desconto.replace(",",".");
        	 
        	  $("#desc3").val(_descontoMaximo);
        	 
        	if ( parseFloat(_desconto) > parseFloat(_descontoMaximo)){
        		alert('Desconto não permitido');
        		$("#vlrDesconto").val("0,00");
        	}
        	
        	
        	return false;
        });
        
    });
	
    </script>
	</script>
</head>

<?php
	include('acordo_recalculo.php');
?>

<body>
       <div id="container">
            <?php include "../header.inc" ?>
            <div id="menu"><?php include "../menu.inc"; ?></div>
           
	            <div id="content">
	            	  
                     	<div id="tabs">
                     		<ul>
                     			<li><a href="#geral">Acordo / Renegocia&ccedil;&atilde;o</a></li>
                     			 			
                     		</ul>
                     	
						<div id="geral" style='height:385px;padding-left: 5px;overflow: auto '>
	                <form name="frm1" id="frm1" method="post" action="acordo2.php">
	                     <div style="height:485px">
	                 	 	<label>Vencimento</label>
	                 	 	<input id="dt_vcto" name="dt_vcto" type="text" size="15" value="<?php echo date("d/m/Y"); ?>" />
	                 	 	<br/>
	                 	 	<label>Valor Total</label>
	                 	 	<input id="vlrTotal" name="vlrTotal" type="text" size="15" value="<?php echo number_format($vlr_total,2,",","."); ?>" />
	                 	 		 	
	                 	 	<p>Opcoes</p>
	                 	 	<input type="radio"  name="parcelas" id="vlrTotal_1" value="1" />&nbsp;<label id="lbvlrTotal_1" >1x &nbsp;<?php echo number_format($vlr_total,2,",","."); ?></label>
	                 	 	<input type="radio"  name="parcelas" id="vlrTotal_2" value="2" />&nbsp;<label id="lbvlrTotal_2" >2x &nbsp;<?php echo number_format($vlr_total / 2 ,2,",","."); ?></label>
	                 	 	<input type="radio"  name="parcelas" id="vlrTotal_3" value="3" />&nbsp;<label id="lbvlrTotal_3" >3x &nbsp;<?php echo number_format($vlr_total / 3,2,",","."); ?></label>
	                 	 	</br>
	                 	 	<input type="hidden" name="cpf" id="cpf" value="<?php echo $cpf; ?>" />
	                 	 	<input type="hidden" name="boletos" id="boletos" value="<?php echo $boletos.","; ?>" />
	                 	 	<input type="hidden" name="desc1" id="desc1" value="<?php echo $desconto_total; ?>" />
	                 	 	<input type="hidden" name="desc2" id="desc2" value="<?php echo $desconto_minimo; ?>"/>
	                 	 	<input type="hidden" name="desc3" id="desc3" value="0"/>
	                 	 	
	                 	 	<br/>
	                 	 	<label>Desconto</label>
	                 	 	<input id="vlrDesconto" name="vlrDesconto" type="text" size="15" value="0,00" />
	                 	 	<br/>
	                 	 	<br/>
	                 	 	<br/>
	                 	 	
	                 	 	 <button id="btnGerar">Efetivar</button>
	   					 </div>
	   					</div>
	   					</div>
	                 </form>
	             </div>
             
             <?php include "../footer.inc" ?>
         	 
         </div>
</body>   
