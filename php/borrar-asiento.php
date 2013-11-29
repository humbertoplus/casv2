<?php
/*~ Archivo borrar-asiento.php
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
error_reporting(0);
if(!isset($conexion)){ include("conexion.php"); }
$transaccion = $_GET["transaccion"];
$sql = "DELETE FROM registro WHERE transaccion='$transaccion'";
$ejecutar_consulta = $conexion->query($sql);
if(ejecutar_consulta){
	$mensaje = "Asiento eliminado con éxito.";
	header("Location: diario.php?mensaje=$mensaje");
}
?>