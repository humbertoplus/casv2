<?php
/*~ Archivo select-cuentas.php
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
if(!isset($conexion)){
	include("conexion.php");
}
error_reporting(E_ALL ^ E_NOTICE);
$consulta = "SELECT * FROM cuentas";
$ejecutar_consulta = $conexion->query($consulta);
while($registro = $ejecutar_consulta->fetch_assoc()){
	echo "<option value='";
	echo $registro["codigo_cuenta"];
	echo "'";
	if($_GET["cuentas_slc"]==$registro["codigo_cuenta"]){
		echo " selected";
	}
	echo ">".$registro["codigo_cuenta"].". ".utf8_encode($registro["nombre_cuenta"])."</option>";
}
?>