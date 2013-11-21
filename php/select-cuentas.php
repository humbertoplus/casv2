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