<?php
include("sesion.php");
if(!isset($conexion)){
	include("conexion.php");
}
error_reporting(E_ALL ^ E_NOTICE);
$consulta = "SELECT * FROM cargos_empleados";
$ejecutar_consulta = $conexion->query($consulta);
while($registro = $ejecutar_consulta->fetch_assoc()){
	echo "<option value='";
	echo $registro["cargo"];
	echo "'";
	if($_GET["cargos_slc"]==$registro["id"]){
		echo " selected";
	}
	echo ">".$registro["id"].". ".utf8_encode($registro["cargo"])."</option>";
}
?>