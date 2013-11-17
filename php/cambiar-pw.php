<?php
	include("sesion.php");
	include("conexion.php"); 
	$usuario = $_SESSION["usuario"];
	$actual = $_POST["actual_txt"];
	$nueva = $_POST["nueva_txt"];
	$confirmar = $_POST["confirmar_txt"];

	$consulta = "SELECT usuario FROM usuario WHERE usuario='$usuario' AND password=SHA1('$actual')";
	$ejecutar_consulta = $conexion->query($consulta);
	$regs = $ejecutar_consulta->num_rows;

	if($regs==0){
		header("Location: cambio-pw.php?error=si");
	}else if($nueva==$confirmar){
		//Actualizo la contraseña
		$consulta = "UPDATE usuario SET password=SHA1('$nueva') WHERE usuario='$usuario'";
		$ejecutar_consulta = $conexion->query($consulta);
		header("Location: cambio-pw.php?error=no");
	}
	else if($nueva!=$confirmar){
		header("Location: cambio-pw.php?error=retype");
	}
?>