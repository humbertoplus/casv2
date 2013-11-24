<?php
/*~ Archivo cambiar-pw.php
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
		header("Location: cambio-pw.php?error=si&has=has-error");
	}else if($nueva==$confirmar){
		//Actualizo la contraseña
		$consulta = "UPDATE usuario SET password=SHA1('$nueva') WHERE usuario='$usuario'";
		$ejecutar_consulta = $conexion->query($consulta);
		header("Location: cambio-pw.php?error=no&has=has-success");
	}
	else if($nueva!=$confirmar){
		header("Location: cambio-pw.php?error=retype&has=has-warning");
	}
?>