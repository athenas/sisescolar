<?php
	require("../config.php");
	include_once "../bd.php";
	ini_set( "display_errors", 0);
	
	
	
	 $useragent = $_SERVER['HTTP_USER_AGENT'];
 
	  if (preg_match('|MSIE ([0-9].[0-9]{1,2})|',$useragent,$matched)) {
	    $browser_version=$matched[1];
	    $browser = 'IE';
	  } elseif (preg_match( '|Opera/([0-9].[0-9]{1,2})|',$useragent,$matched)) {
	    $browser_version=$matched[1];
	    $browser = 'Opera';
	  } elseif(preg_match('|Firefox/([0-9\.]+)|',$useragent,$matched)) {
	    $browser_version=$matched[1];
	    $browser = 'Firefox';
	  } elseif(preg_match('|Chrome/([0-9\.]+)|',$useragent,$matched)) {
	    $browser_version=$matched[1];
	    $browser = 'Chrome';
	  } elseif(preg_match('|Safari/([0-9\.]+)|',$useragent,$matched)) {
	    $browser_version=$matched[1];
	    $browser = 'Safari';
	  } else {
	    // browser not recognized!
	    $browser_version = 0;
	    $browser= 'other';
	  }
	
	if (($browser == 'Firefox') && ($browser_version == 16)){

	    session_start();
		$login = $_REQUEST['login'];
		$senha = $_REQUEST['senha'];
		$_SESSION['username'] = $login;
		
		$query = "call valida_usuario('$login','$senha')";
		
		$resultado = consulta('athenas',$query);
		
		if (count($resultado) == 0 ){
			header("location:login.php?msg=err");
		}else{
			foreach($resultado as $registro){
				$_SESSION[$registro['cNmAcesso']] = $registro['bVisualizar'].$registro['bEditar'] .$registro['bIncluir'].$registro['bExcluir'].$registro['bAcessar'];
			}
			header("location:../index.php");
		}
	}else{
		header("location:login.php?msg=nav");
	}
?>

