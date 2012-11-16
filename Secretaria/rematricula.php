<?php
	include("../verifica_logado.php");
	ini_set( "display_errors", 0);
	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 
   <title>Dados Cadastrais</title>
  <link href="/css/estilo.css" rel="stylesheet" type="text/css"> </script>
   <link href="/css/jquery-ui.css" rel="stylesheet" type="text/css"> </script>
   <script src="/js/jquery.js" type="text/javascript"></script>
   <script src="/js/jquery-ui.js" type="text/javascript"></script>
   
   
	<script>
	$(function() {
        $( "#nome" ).autocomplete({
            source: "search.php?consulta=lista",
            minLength: 2,
            select: function( event, ui ) {
            	$("#serie").val(ui.item.id);
            	$("#mat").val(ui.item.info);
            	$("#cpfresp").val(ui.item.cpfresp);
            }
        });
        
        
        
        $("#send").click(function(){ 
        	//irmao_mat = "";
       		 $.get( 
             "verifica_irmao.php",
             { serie: $("#serie").val(),cpfresp: $("#cpfresp").val() },
	             function(data) {
	                $("#irmao_mat").val(data);
	                
	                
	                
	                if ( $("#irmao_mat").val() == ""){
          	$('<div></div>').appendTo('body')
                    .html("<center><span style='font-size:small'>N&atilde;o foi encontrado nenhum irm&atilde; em serie igual ou superior <br/> Se existir favor fazer a matricula deste primeiro para n&atilde;o perder o desconto!</span></center>")
                    .dialog({
                        modal: true, title: 'Aviso', zIndex: 10000, autoOpen: true,
                        width: 'auto', resizable: false,
                        buttons: {
                            Yes: function () {
                                // $(obj).removeAttr('onclick');                                
                                // $(obj).parents('.Parent').remove();

                                $("#frm1").submit();
                            },
                            No: function () {
                                $(this).dialog("close");
                            }
                        },
                        close: function (event, ui) {
                            $(this).remove();
                        }
                    });
               }else{$("#frm1").submit();}
	                
	                
	                
	                
	                
	                
	             }
          	);
          
                
                return false;
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
            	
                <form name="frm1" id="frm1" method="post" action="verificafin.php">
                     <p><h2>ReMatricula 1/5</h2></p>
                     <div style="height:440px">
                 	 	<label for="nome">Nome: </label>
   					 	<input id="nome" name="nome" size="50" />
   					 	<br/>
   					 	<label for="nome" style='margin-top:5px'>Serie:</label>
   					 	<select id="serie"  name="serie"	>
   					 		<option value='99'>SELECIONE...</option>
							<option value='-2'>MATERNAL</option>
							<option value='-1'>PRE-I</option>
							<option value='0'>PRE-II</option>
   					 		<option value='1'>ENSINO FUNDAMENTAL I - 1&deg; Ano</option>
   					 		<option value='2'>ENSINO FUNDAMENTAL I - 2&deg; Ano</option>
   					 		<option value='3'>ENSINO FUNDAMENTAL I - 3&deg; Ano</option>
   					 		<option value='4'>ENSINO FUNDAMENTAL I - 4&deg; Ano </option>
   					 		<option value='5'>ENSINO FUNDAMENTAL I - 5&deg; Ano </option><br />
   					 		<option value='6'>ENSINO FUNDAMENTAL II - 6&deg; Ano</option>
   					 		<option value='7'>ENSINO FUNDAMENTAL II - 7&deg; Ano</option>
   					 		<option value='8'>ENSINO FUNDAMENTAL II - 8&deg; Ano</option>
   					 		<option value='9'>ENSINO FUNDAMENTAL II - 9&deg; Ano</option>
   					 		<option value='10'>ENSINO MEDIO - 1&deg; Ano</option>
   					 		<option value='11'>ENSINO MEDIO - 2&deg; Ano</option>
   					 		<option value='12'>ENSINO MEDIO - 3&deg; Ano</option>
   					 	</select>
   					 	<br/>
   					 	<label for="cpfresp" style='margin-top:5px'>CPF Resp.: </label>
   					 	<input id="cpfresp" name="cpfresp" size="15" />
   					 	<input type='hidden' name='mat' id='mat' />
   					 	<input type='hidden' name='irmao_mat' id='irmao_mat' />
   					 <br/>
   					 <button id='send' style='margin-left:360px'>Proximo</button>
   					 </div>
                 </form>
             </div>
             
             <?php include "../footer.inc" ?>
         	 
         </div>
</body>   
