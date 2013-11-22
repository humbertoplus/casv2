<?php 
if(!isset($conexion)){
	include("conexion.php");
}

$anio = $_POST["anio_slc"];
$sql = "UPDATE anio_contable SET anio_contable = $anio WHERE id = 1";
$ejecutar_consulta = $conexion->query($sql);
if($ejecutar_consulta){
	$mensaje = "El año contable se cambió a: <strong>$anio</strong>.";
	header("Location: anio-contable.php?mensaje=$mensaje");
}
?>