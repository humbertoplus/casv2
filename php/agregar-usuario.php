<?php
/*~ Archivo agregar-usuario.php
.---------------------------------------------------------------------------.
|    Software: CAS - Computerized Accountancy System                        |
|     Versión: 1.0                                                          |
|   Lenguajes: PHP, HTML, CSS3 y Javascript                                 |
| ------------------------------------------------------------------------- |
|   Autores: Ricardo Vigil (alexcontreras@outlook.com)                      |
|          : Vanessa Campos                                                 |
|          : Ingrid Aguilar                                                 |
|          : Jhosseline Rodriguez                                           |
| Copyright (C) 2013, FIA-UES. Todos los derechos reservados.               |
| ------------------------------------------------------------------------- |
|                                                                           |
| Este archivo es parte del sistema de contabilidad C.A.S para la cátedra   |
| de Sistemas Contables de la Facultad de Ingeniería y Arquitectura de la   |
| Universidad de El Salvador.                                               |
|                                                                           |
'---------------------------------------------------------------------------'
*/
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