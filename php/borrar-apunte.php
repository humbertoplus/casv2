<?php
/*~ Archivo borrar-apunte.php
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
$id = $_GET["id"];
$sql = "DELETE FROM registro WHERE id='$id'";
$ejecutar_consulta = $conexion->query($sql);
if($ejecutar_consulta){
	$mensaje = "Se ha eliminado el registro correctamente.";
	header("Location: diario.php?mensaje=$mensaje");
}
?>