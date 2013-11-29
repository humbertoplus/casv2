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