Acessos
          				<div>
          					<table>
          						<?php
          							$query = "call listPerfil(".$registro['nCdPerfil'].");";
          							$acessos = consulta("athenas",$query);
									foreach($acessos as $acesso){
										echo "<tr>";
											echo "<td>".$acesso['cGrupo']."</td>";
											echo "<td>".$acesso['cNmAcesso']."</td>";
											if ($acesso['cTpAcesso'] =="E" ){
												echo "<td></td><td></td><td></td><td></td>";
												echo "<td><input type='checkbox' id='acesso".$acesso['nCdAcesso']."' value='".$acesso['nCdAcesso']."' ";
												if ($acesso['bAcesso'] == "1"){
													echo "checked=\"checked\"";
												}
												echo" /></td>";
											}else{
												
											}
										echo "</tr>";
									}
          						?>
          					</table>
          				</div>