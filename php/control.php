<?php
/*~ Archivo control.php
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
		setcookie("sesion",$_SESSION["autentificado"],time()+3600,"/");
		header("Location: home.php");
	}

	else
	{
		header("Location: ../index.php?error=si");
	}
?>