<?php
/*~ Archivo select-usuario.php
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
//Incluyo el archivo de la conexión a la BD
include("sesion.php");
if(!isset($conexion)){
	include("conexion.php");
}
error_reporting(E_ALL ^ E_NOTICE);
$consulta = "SELECT usuario FROM usuario ORDER BY usuario";
//Ejecuto el query
$ejecutar_consulta = $conexion->query($consulta);
//Con un while recorro todos los registros generados de la consulta anterior
//Construyo las opciones del select de forma dinámica con los registros de la consulta
while ($registro = $ejecutar_consulta->fetch_assoc()) {
	echo "<option value='".utf8_encode($registro["usuario"])."'";
	if($_GET["usuario_slc"]==$registro["usuario"])
	{
		echo " selected";
	}
	echo ">" . utf8_encode($registro["usuario"])."</option>";
}
// $conexion->close();
?>