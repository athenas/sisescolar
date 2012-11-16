<script src="/js/jquery.dropdownPlain.js"></script>
<link rel="stylesheet" href="/css/menu.css" type="text/css" media="screen, projection"/>
 <div style="display:inline-block; background-color:#FF0000" >
 
 <ul class="dropdown">
        	<li><a href="#">Seguranca</a>
        		<ul class="sub_menu">
        			 <li><a href="#">Alterar Senha</a></li>
        			 <?php
        			 session_start();
        			 if (isset($_SESSION['bGerUsu'])){
        			 	echo "<li><a href=\"/seguranca/gerusuario/lista.php\">Gerenciar Usuario</a>";
	        			echo " 	<ul>";
	        			echo " 		<li><a href=\"/seguranca/gerusuario/novousuario.php\">Incluir</a></li>";
	        			echo " 	</ul>";
	        			echo " </li>";
        			 }
        			 
        			 ?>        			 
        		</ul>
        	</li>
        	
        	 <?php
        			 session_start();
        			 if (isset($_SESSION['bCarga'])){
        			 	
						echo "<li><a href=\"/Importacao/index.php\">Carga</a>";
			        	echo "	<ul class=\"sub_menu\">";     	
			        	echo "	</ul>";
			        	echo "</li>";
						
					 }
        			 	
			 ?>			
        	
        	
        	<li><a href="#">Consulta Federal</a>
        		<ul class="sub_menu">
        		<?php
        			 session_start();
        			 if (isset($_SESSION['bFederalCompleto'])){
        			 	
						echo "<li>";
	        			echo "	<a href=\"#\">Completa</a>";
	        			echo "	<ul>";
	        			echo "		<li><a href=\"/consulta/federal/completa.php?metodo=cpf\">Por CPF</a></li>";
	        			echo "		<li><a href=\"/consulta/federal/completa.php?metodo=matricula\">Por Matricula + Orgao</a></li>";        					
	        			echo "	</ul>";
        			 	echo "</li>";
						
					 }
					 
					 if (isset($_SESSION['bFederalCadastro'])){
        			 	
						echo "<li>";
	        			echo "	<a href=\"#\">Dados Cadastrais</a>";
	        			echo "	<ul>";
	        			echo "		<li><a href=\"/consulta/federal/dados_cadastrais.php?metodo=cpf\">Por CPF</a></li>";
	        			echo "		<li><a href=\"/consulta/federal/dados_cadastrais.php?metodo=matricula\">Por Matricula + Orgao</a></li> ";       					
	        			echo "	</ul>";
        			 	echo "</li>";
						
					 }
					 
					 if (isset($_SESSION['bFederalLN'])){
        			 	
						echo "<li>";
	        			echo "	<a href=\"#\">Restri&ccedil;&atilde;o de Cr&eacute;dito</a>";
	        			echo "	<ul>";
	        			echo "		<li><a href=\"/consulta/federal/restricao.php?metodo=cpf\">Por CPF</a></li>";
	        			echo "		<li><a href=\"/consulta/federal/restricao.php?metodo=matricula\">Por Matricula + Orgao</a></li>";     					
	        			echo "	</ul>";
        			 	echo "</li>";
						
					 }
					 
					 if (isset($_SESSION['bFederalMargem'])){
        			 	
						echo "<li>";
	        			echo "	<a href=\"#\">Margem</a>";
	        			echo "	<ul>";
	        			echo "		<li><a href=\"/consulta/federal/margem.php?metodo=cpf\">Por CPF</a></li>";
	        			echo "		<li><a href=\"/consulta/federal/margem.php?metodo=matricula\">Por Matricula + Orgao</a></li>";     					
	        			echo "	</ul>";
        			 	echo "</li>";
						
					 }
					 
					 if (isset($_SESSION['bFederalDesconto'])){
        			 	
						echo "<li>";
	        			echo "	<a href=\"#\">Descontos</a>";
	        			echo "	<ul>";
	        			echo "		<li><a href=\"/consulta/federal/descontos.php?metodo=cpf\">Por CPF</a></li>";
	        			echo "		<li><a href=\"/consulta/federal/descontos.php?metodo=matricula\">Por Matricula + Orgao</a></li>";     					
	        			echo "	</ul>";
        			 	echo "</li>";
						
					 }
        			 	
			 	?>		
        		</ul>
        	</li>
        	<?php if (isset($_SESSION['bMarinhaLancamento'])){
        		
	        	echo "<li><a href=\"#\">Consulta Marinha</a>";
	        	echo "	<ul class=\"sub_menu\">";
	        	echo "		<li><a href=\"#\">Descontos</a>";
	        	echo "			<ul>";
	        	echo "				<li><a href=\"/consulta/marinha/descontos.php?metodo=cpf\">CPF</a></li>";
	        	echo "				<li><a href=\"/consulta/marinha/descontos.php?metodo=matricula\">Matricula</a></li>";
	        	echo "			</ul>";
	        	echo "		</li>";
	        	echo "	</ul>";
	        	echo "</li>";
			}
			?>
			<?php if (isset($_SESSION['bINSSlancamento'])){
        		echo "<li><a href=\"#\">Consulta INSS</a>";
        		echo "<ul class=\"sub_menu\">";
        		echo "	<li><a href=\"/consulta/inss/historico.php\">Historico</a></li>";
        		echo "</ul>";
        		echo "</li>";
				}
        	?>
        	<li><a href="#">Secretaria</a>
        		<ul class="sub_menu">
        			 <li><a href="#">Rematricula</a></li>
        			 <li><a href="#">Matricula</a></li>
    			 </ul>
			 </li>
			 <li><a href="#">Financeiro</a>
        		<ul class="sub_menu">
        			 <li><a href="#">Sacado</a></li>
        			 <li><a href="#">Título</a></li>
    			 </ul>
			 </li>
        	
        </ul>
		
</div>