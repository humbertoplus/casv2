<?php
/*~ Archivo actualiza.php
.---------------------------------------------------------------------------.
|    Software: CAS - Computerized Accountancy System                        |
|     Versión: 2.0                                                          |
|   Lenguajes: PHP, HTML, CSS3 y Javascript                                 |
| ------------------------------------------------------------------------- |
|   Autor: Ricardo Vigil (alexcontreras@outlook.com)                        |
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
error_reporting(E_ALL ^ E_NOTICE);

if(!isset($conexion))
{ 
	include("conexion.php");
}

include("funciones.php");
$q = $_GET["q"];

if($q=="subcuentas")
{
	$sql = "SELECT * FROM subcuentas";
	$ejecutar_consulta = $conexion->query($sql);

	while($regs = $ejecutar_consulta->fetch_assoc())
	{
		actualizarCuentas($conexion, $regs["codigo_subcuenta"]);
	}

	$mensaje="Se actualizaron los saldos de todas las subcuentas.";
	header("Location: actualizar.php?mensaje=$mensaje");

} else if($q=="cuentas")
{
	$sql = "SELECT * FROM cuentas";
	$ejecutar_consulta = $conexion->query($sql);
	
	while($regs = $ejecutar_consulta->fetch_assoc())
	{
		actualizarCuentas($conexion, $regs["codigo_cuenta"]);
		saldosCuentas($conexion, $regs["codigo_cuenta"]);
	}

	$mensaje="Se actualizaron los saldos de todas las cuentas.";
	header("Location: actualizar.php?mensaje=$mensaje");
}

?>