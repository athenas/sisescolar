<script src="/js/jquery.dropdownPlain.js"></script>
<link rel="stylesheet" href="/css/menu.css" type="text/css" media="screen, projection"/>
 <div style="display:inline-block; background-color:#FF0000;z-index: 9999" >
 
 <ul class="dropdown">
        	<li><a href="#">Seguranca</a>
        		<ul class="sub_menu">
        			 <li><a href="#">Alterar Senha</a></li>
        			  <li><a href="/Acesso/controle_usuario.php">Gerenciar Usuario</a>
        			  	<ul>
        			  		<li><a href="/Acesso/cadastro_usuario.php?codigo=0">Incluir</a></li>
        			  	</ul>
        			  </li>
        			 		 
        		</ul>
        	</li>
        	<li><a href="#">Cadastro</a>
        		<ul class="sub_menu">
        			<li><a href="/Pessoa/consultar.php">Consultar</a></li>
        		</ul>
        	</li>
        	<li><a href="#">Secretaria</a>
        		<ul class="sub_menu">
        			<li><a href="/Secretaria/rematricula.php">Rematricula</a></li>
        			<li><a href="/Secretaria/rematricula.php">Matricula</a></li>
        			<li><a href="/Secretaria/lista_vagas.php">Lista de Vagas</a></li>
        		</ul>
        	</li>
        	<li><a href="#">Financeiro</a>
        		<ul class="sub_menu">
        			<li><a href="#">Boletos</a>
        				<ul class="sub_menu">
        				<li><a href="/Financeiro/titulo.php">Novo Boleto</a></li>
        				<li><a href="/Financeiro/carne.php">Imprimir Carne</a></li>
        				<li><a href="/Financeiro/baixa.php">Baixar</a></li>
        				<li><a href="/construcao.php">Ajustar Boleto</a></li>
        				</ul>
        			</li>
        			
        			<li><a href="#">Relatorios</a>
        				<ul class="sub_menu">
        				<li><a href="/Relatorio/inadimplencia.php">Inadimplencia</a></li>
        				<li><a href="/construcao.php">Previsao Recebimento</a></li>
        				</ul>
        			</li>
        			
        			<li><a href="/Financeiro/enviar_arquivo_retorno.php">Capturar Retorno</a></li>
        		</ul>
        	</li>
        	<li><a href="#">Cobranca</a>
        		<ul class="sub_menu">
        			<li><a href="/Relatorio/inadimplencia.php">Relatorio Inadimplencia</a></li>
        			<li><a href="/Relatorio/carta_cobranca.php">Carta de Cobran&ccedil;a </a></li>
        			<li><a href="/Relatorio/carta_cobranca_lote.php">Carta de Cobran&ccedil;a - Lote</a></li>
        			
        			<li><a href="/Cobranca/acordo.php">Realizar Acordos</a></li>
        		</ul>
        	</li>
        	<li><a href="#">Contabilidade</a>
        		<ul class="sub_menu">
        			<li><a href="/construcao.php">Movimentacao</a></li>
        			<li><a href="/construcao.php">Cadastro de Contas</a></li>
        		</ul>
        	</li>
        	<li><a href="#">Recursos Humanos</a>
        		<ul class="sub_menu">
        			<li><a href="/construcao.php">Funcionarios</a></li>
        			<li><a href="/construcao.php">REP</a></li>
        		</ul>
        	</li>
        	<li><a href="/logout.php">Sair</a>
        </ul>
		
</div>
