<?php

	/**********************************************************************************************************************
	*	Archivo 'control.php'. Este archivo es parte del sistema contable C.A.S para la cátedra de Sistemas Contables.    *
	* 	Tiene permiso para usar este archivo bajo la licencia GPL v3. Todos los derechos reservados (C) 2013.		      *
	* 	Este archivo controla la lógica de inicio de sesión y permite el manejo de la misma.                   		      *
	**********************************************************************************************************************/
?>
<?php 
	include("conexion.php");

	$usuario = $_POST["user_txt"];
	$password = $_POST["password_txt"];
	$consulta = "SELECT usuario FROM usuario WHERE usuario='$usuario' AND password=SHA1('$password')";
	
	$ejecutar_consulta = $conexion->query($consulta);

	$regs = $ejecutar_consulta->num_rows;
	
	if($regs!=0)
	{
		session_start();

		$_SESSION["autentificado"]=true;
		$_SESSION["usuario"]=$_POST["user_txt"];
		setcookie("sesion",$_SESSION["autentificado"],time()+86400,"/");


		header("Location: home.php");
	}

	else
	{
		header("Location: ../index.php?error=si");
	}
?>