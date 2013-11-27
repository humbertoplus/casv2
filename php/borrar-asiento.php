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