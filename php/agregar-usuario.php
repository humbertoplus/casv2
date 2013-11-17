<?php

	/******************************************************************************************************************************
	*	Archivo 'agregar-usuario.php'. Este archivo es parte del sistema contable C.A.S para la cátedra de Sistemas Contables.    *
	* 	Tiene permiso para usar este archivo bajo la licencia GPL v3. Todos los derechos reservados (C) 2013.		        	  *
	* 	Este archivo realiza el control para dar de alta a nuevos usuarios dentro del sistema.                            		  *
	******************************************************************************************************************************/
?>

<?php 
	include("conexion.php");
	$usuario = $_POST["usuario_txt"];
	$password = $_POST["password_txt"];
	$password2 = $_POST["password2_txt"];
	$tipo = $_POST["tipo_slc"];

	$consulta = "SELECT * FROM usuario WHERE usuario='$usuario'";
	$ejecutar_consulta = $conexion->query($consulta);
	$num_regs = $ejecutar_consulta->num_rows;

	if($num_regs==0){
		if($password==$password2){
			$consulta = "INSERT INTO usuario VALUES ('$usuario',SHA1('$password'),curdate(), '$tipo')";
			$ejecutar_consulta = $conexion->query($consulta);
			header("Location: crear-usuario.php?error=no&user=$usuario");
			$conexion->close();
		}
		else
		{
			header("Location: crear-usuario.php?error=retype");
		}
		
	}
	else
	{
		header("Location: crear-usuario.php?error=existe");
	}
?>