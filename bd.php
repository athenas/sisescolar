<?php
	
	
	function consulta($database, $sql){
		include 'config.php';
		
		$database = strtolower($database);
		
		$mysqli = new mysqli($BD_SERVIDOR, $BD_USUARIO, $BD_SENHA, $database);

		$mysqli->query("SET NAMES 'utf8'");
		$mysqli->query('SET character_set_connection=utf8');
		$mysqli->query('SET character_set_client=utf8');
		$mysqli->query('SET character_set_results=utf8');


		if ($query = $mysqli->query($sql)){
			while($row = mysqli_fetch_assoc($query) ) {
				$rows[] = $row;
			}
			$mysqli->close();
		}
		return $rows;
	}
	
	

?>
