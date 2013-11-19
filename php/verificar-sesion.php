<?php 
	$sesion = $_SESSION["autentificado"];
	if($sesion==true){
		header("Location: index.php?auth=$sesion");
	}
?>