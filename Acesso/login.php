<?php
	ini_set( "display_errors", 0);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>Acesso ao Sistema</title>
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
               
            }
        });
    //    $("#send").click(function(){ ("#frm1").submit(); return false;});
    });
	
    </script>
</head>

<body>
       <div id="container">
            <?php include "../header.inc" ?>
           
            <div id="content">
            	
                <form name="frm1" id="frm1" method="post" action="verifica_login.php">
                   
                     <div style="height:510px">
                 	 <center>
                 	 	<label style='margin-top:180px'>Usuario</label>
						<input type="text" size='15' id="login" name='login' ></input>
						<label style='margin-left:45px' >Senha</label>
						<input style='margin-left:-35px'type="password" size='15' id="senha" name='senha' ></input>
						</br>
						<button style='margin-left:360px;' id="send" >Entrar</button>
						<br/>
						<?php
						 	if ($_REQUEST['msg'] == 'err'){
						 		echo "<span style='color:red;'>Usuario / Senha Invalido</span>";
						 	}
							if ($_REQUEST['msg'] == 'nav'){
						 		echo "<span style='color:red;'>Navegador e/ou versao incompativel.<br/> Usar Firefox 16 ou superior </span>";
						 	}
							  
						?>
						</center>
   				
   					 </div>
                 </form>
             </div>
             
             <?php include "../footer.inc" ?>
         	 
         </div>
</body>   
</html>
